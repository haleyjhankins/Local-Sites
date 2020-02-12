<?php
	// Register Custom Post Type
	function menus_cpt() {

		$labels = array(
			'name'                => _x( 'Menus', 'Post Type General Name', 'FoundationPress' ),
			'singular_name'       => _x( 'Menu', 'Post Type Singular Name', 'FoundationPress' ),
			'menu_name'           => __( 'Menus', 'FoundationPress' ),
			'name_admin_bar'      => __( 'Menus', 'FoundationPress' ),
			'parent_item_colon'   => __( 'Parent Menu:', 'FoundationPress' ),
			'all_items'           => __( 'All Menus', 'FoundationPress' ),
			'add_new_item'        => __( 'Add New Menu', 'FoundationPress' ),
			'add_new'             => __( 'Add New', 'FoundationPress' ),
			'new_item'            => __( 'New Menu', 'FoundationPress' ),
			'edit_item'           => __( 'Edit Menu', 'FoundationPress' ),
			'update_item'         => __( 'Update Menu', 'FoundationPress' ),
			'view_item'           => __( 'View Menu', 'FoundationPress' ),
			'search_items'        => __( 'Search Menu', 'FoundationPress' ),
			'not_found'           => __( 'Not found', 'FoundationPress' ),
			'not_found_in_trash'  => __( 'Not found in Trash', 'FoundationPress' ),
		);
		$args = array(
			'label'               => __( 'menus', 'FoundationPress' ),
			'description'         => __( 'Menus CPT', 'FoundationPress' ),
			'labels'              => $labels,
			'supports'            => array( 'title', 'custom-fields', ),
			'hierarchical'        => false,
			'public'              => true,
			'show_ui'             => true,
			'show_in_menu'        => true,
			'menu_position'       => 5,
			'show_in_admin_bar'   => true,
			'show_in_nav_menus'   => true,
			'can_export'          => true,
			'has_archive'         => false,
			'exclude_from_search' => false,
			'publicly_queryable'  => true,
			'capability_type'     => 'page',
		);
		register_post_type( 'menus', $args );

	}

	// Hook into the 'init' action
	add_action( 'init', 'menus_cpt', 0 );

	if(function_exists("register_field_group"))
	{
		register_field_group(array (
			'id' => 'acf_menus',
			'title' => 'Menus',
			'fields' => array (
				array (
					'key' => 'field_55b119f3aacbc',
					'label' => 'Menu PDF',
					'name' => 'menu_pdf',
					'type' => 'file',
					'required' => 1,
					'save_format' => 'url',
					'library' => 'all',
				),
			),
			'location' => array (
				array (
					array (
						'param' => 'post_type',
						'operator' => '==',
						'value' => 'menus',
						'order_no' => 0,
						'group_no' => 0,
					),
				),
			),
			'options' => array (
				'position' => 'normal',
				'layout' => 'no_box',
				'hide_on_screen' => array (
				),
			),
			'menu_order' => 0,
		));
	}

 ?>
