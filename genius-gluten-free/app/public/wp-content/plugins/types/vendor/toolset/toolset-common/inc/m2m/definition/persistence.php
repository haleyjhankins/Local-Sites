<?php

/**
 * Handles the persistence of relationship definitions, from IToolset_Relationship_Definition object to a wpdb call.
 *
 * For internal purposes of the m2m API only. Use Toolset_Relationship_Definition_Repository().
 *
 * @since 2.5.2
 */
class Toolset_Relationship_Definition_Persistence {


	/** @var wpdb */
	private $wpdb;


	/** @var Toolset_Relationship_Definition_Translator */
	private $definition_translator;


	/** @var Toolset_Relationship_Table_Name */
	private $table_name;


	public function __construct(
		wpdb $wpdb_di = null,
		Toolset_Relationship_Definition_Translator $definition_translator_di = null,
		Toolset_Relationship_Table_Name $table_name_di = null
	) {

		if( null === $wpdb_di ) {
			global $wpdb;
			$this->wpdb = $wpdb;
		} else {
			$this->wpdb = $wpdb_di;
		}

		$this->definition_translator = (
			null === $definition_translator_di
				? new Toolset_Relationship_Definition_Translator()
				: $definition_translator_di
		);

		$this->table_name = (
			null === $table_name_di
				? new Toolset_Relationship_Table_Name()
				: $table_name_di
		);

	}



	/**
	 * Update a single relationship definition.
	 *
	 * @param Toolset_Relationship_Definition $relationship_definition
	 */
	public function persist_definition( Toolset_Relationship_Definition $relationship_definition ) {
		$row = $this->definition_translator->to_database_row( $relationship_definition );
		$row = $this->update_definition_type_sets( $relationship_definition, $row );
		$this->wpdb->update(
			$this->table_name->relationship_table(),
			$row,
			array( 'id' => $relationship_definition->get_row_id() ),
			$this->definition_translator->get_database_row_formats(),
			'%s'
		);
	}


	/**
	 * Insert a new relationship definition record into the database.
	 *
	 * @param Toolset_Relationship_Definition $relationship_definition
	 *
	 * @return null|Toolset_Relationship_Definition
	 */
	public function insert_definition( Toolset_Relationship_Definition $relationship_definition ) {
		$row = $this->definition_translator->to_database_row( $relationship_definition );
		$row = $this->update_definition_type_sets( $relationship_definition, $row );

		$this->wpdb->insert(
			$this->table_name->relationship_table(),
			$row,
			$this->definition_translator->get_database_row_formats()
		);

		// Create a new relationship definition instance from the exact data that has been sent to the
		// database (row ID and type set IDs).
		$row['id'] = $this->wpdb->insert_id;
		$row['parent_types_set_id'] = $row['parent_types'];
		$row['child_types_set_id'] = $row['child_types'];

		// Work around some differences caused between the data sent when updating relationship
		// rows and data retrieved when querying (and appending the concatenated list of parent
		// and child types).
		$definition_array = $relationship_definition->get_definition_array();
		$row['parent_types'] = implode(
			Toolset_Relationship_Database_Operations::GROUP_CONCAT_DELIMITER,
			$definition_array[ Toolset_Relationship_Definition::DA_PARENT_TYPE ][ Toolset_Relationship_Element_Type::DA_TYPES ]
		);
		$row['child_types'] = implode(
			Toolset_Relationship_Database_Operations::GROUP_CONCAT_DELIMITER,
			$definition_array[ Toolset_Relationship_Definition::DA_CHILD_TYPE ][ Toolset_Relationship_Element_Type::DA_TYPES ]
		);

		$updated_relationship_definition = $this->definition_translator->from_database_row( (object) $row );

		return $updated_relationship_definition;
	}


	/**
	 * Delete a relationship definition record from the database.
	 *
	 * @param Toolset_Relationship_Definition $relationship_definition
	 */
	public function delete_definition( Toolset_Relationship_Definition $relationship_definition ) {

		foreach( Toolset_Relationship_Role::parent_child_role_names() as $role_name ) {
			$set_id = $relationship_definition->get_element_type_set_id( $role_name );

			if( 0 === $set_id ) {
				continue;
			}

			$this->wpdb->delete(
				$this->table_name->type_set_table(),
				array( 'set_id' => $set_id ),
				'%d'
			);
		}

		$this->wpdb->delete(
			$this->table_name->relationship_table(),
			array( 'slug' => $relationship_definition->get_slug() ),
			'%s'
		);
	}


	/**
	 * Persist type sets for parent and child roles and update the to-be-saved database row with
	 * a new set_id if it changed.
	 *
	 * @param Toolset_Relationship_Definition $definition
	 * @param array $definition_row
	 *
	 * @return array Updated definition row.
	 */
	private function update_definition_type_sets( $definition, $definition_row ) {
		$definition_row['child_types'] = $this->update_type_set(
			$definition->get_child_type()->get_types(),
			$definition->get_element_type_set_id( Toolset_Relationship_Role::CHILD )
		);

		$definition_row['parent_types'] = $this->update_type_set(
			$definition->get_parent_type()->get_types(),
			$definition->get_element_type_set_id( Toolset_Relationship_Role::PARENT )
		);

		return $definition_row;
	}


	/**
	 * Update a type set in the database.
	 *
	 * @param string[] $types
	 * @param int $set_id Previously used set_id or 0.
	 *
	 * @return int set_id that was used in the end.
	 */
	private function update_type_set( $types, $set_id ) {
		if( 0 === $set_id ) {
			$set_id = $this->get_next_free_set_id();
		} else {
			// set_id doesn't change but we need to overwrite the whole set
			$this->delete_type_set( $set_id );
		}

		foreach( $types as $type ) {
			$this->insert_type( $type, $set_id );
		}

		return $set_id;
	}


	/**
	 * Determine a next free set_id in the type set table.
	 *
	 * @return int
	 */
	private function get_next_free_set_id() {
		$type_set_table = $this->table_name->type_set_table();
		$last_set_id = (int) $this->wpdb->get_var( "SELECT MAX(set_id) FROM {$type_set_table}" );
		return ( $last_set_id + 1 );
	}


	/**
	 * Insert a single type record into the type set table.
	 *
	 * @param string $type
	 * @param int $set_id
	 */
	private function insert_type( $type, $set_id ) {
		$this->wpdb->insert(
			$this->table_name->type_set_table(),
			array(
				'set_id' => $set_id,
				'type' => $type
			),
			array( '%d', '%s' )
		);
	}


	/**
	 * Delete a whole type set from the type set table.
	 *
	 * @param int $set_id
	 */
	private function delete_type_set( $set_id ) {
		$this->wpdb->delete(
			$this->table_name->type_set_table(),
			array( 'set_id' => $set_id ),
			'%d'
		);
	}


}
