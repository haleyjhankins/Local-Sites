<?php 

function square_element( $atts ) {
	$atts = extract( shortcode_atts( array(
		'link'=>'#',
		'image'=>'/wp-content/themes/infinite/assets/img/default-square.jpg',
		'title'=>'Why TKU',
		'icon'=>'/wp-content/themes/infinite/assets/img/icons/shield.png'
		),$atts ) );

		ob_start();  ?>
		<div class="medium-4 columns square-block__wrap left hover-click">
			<div class="square-block squared" style="background: url('<?php echo $image; ?>') no-repeat;">
				<div class="outer">
					<div class="inner text-center">
						<a href="<?php echo $link; ?>"><div class="text-center uppercase white sans fwnormal mb1"><?php echo $title; ?></div></strong></a>
						<img src="<?php echo $icon; ?>" alt="<?php echo $title; ?>">
					</div>
				</div>
			</div>
		</div>

		<?php
		$ret = ob_get_contents();
		ob_end_clean();
		return $ret;
	}
	add_shortcode( 'square','square_element' );



?>