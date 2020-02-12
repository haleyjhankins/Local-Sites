<?php 

class PortfolioWalker extends Walker_Category {
    function start_el(&$output, $category, $depth, $args) {
		extract($args);
 
		$cat_name = esc_attr( $category->name );
		$cat_name = apply_filters( 'list_cats', $cat_name, $category );
		$link = '<a href="#" ';
		$link .= 'title="' . esc_attr( strip_tags( apply_filters( 'category_description', $category->description, $category ) ) ) . '"';
		//$link .= 'rel="'.$category->slug.'" ';
		$link .= '>';
		$link .= $cat_name . '</a>';
		if ( 'list' == $args['style'] ) {
			$output .= "\t<li";
			$class = $category->slug;
			if ( !empty($current_category) ) {
				$_current_category = get_term( $current_category, $category->taxonomy );
				if ( $category->term_id == $current_category )
					$class .=  ' current-cat';
				elseif ( $category->term_id == $_current_category->parent )
					$class .=  ' current-cat-parent';
			}
			$output .=  ' class="' . $class . '"';
			$output .= ">$link\n";
		} else {
			$output .= "\t$link<br />\n";
		}
	}
}
            

?>