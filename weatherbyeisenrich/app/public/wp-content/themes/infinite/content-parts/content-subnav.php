<?php if( !is_front_page() ) { ?>
<div class="light-grey-bg pv1 hide-for-small">
	<ul class="subPage-nav">
		<?php
		global $id;
		$parentId= wp_get_post_parent_id( $post_ID );
		if ($parentId != '') {
		wp_list_pages("title_li=&child_of=$parentId&sort_column=menu_order");
		}
		else {
			wp_list_pages("title_li=&child_of=$id&sort_column=menu_order");
		} ?>
	</ul>
</div>
<?php }
?>
