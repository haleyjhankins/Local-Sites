<?php
/*** The template for displaying Search Results pages. ***/

get_header(); ?>
	
<?php
/*** The template for displaying Search Results pages. ***/

get_header(); ?>
	
<!-- Search Term -->
<div class="pagebgd">
    <div class="container_12">
        <div class="grid_6_no_margin">
            <div class="pagetitle">
                <?php printf( __( 'Search Results for: %s', 'Cosmopolitan' ), '<em>' . get_search_query() . '</em>' ); ?>
            </div>
        </div>
        <div class="grid_6_no_margin">
    		 <?php get_search_form(); ?>
    	</div>
        <div class="clearnospacing"></div>
    </div>
</div>
<div class="divider_shadow"></div>
<div class="pagecontents">
	<div class="container_12" id="masonry-grid">
		<?php if ( have_posts() ) : ?>
            <?php get_template_part( 'loop-archive', 'search' );?>
        <?php else : ?>
            <div id="post-0" class="post no-results not-found">
                <h4><?php _e( 'Nothing Found', 'Cosmopolitan' ); ?></h4>
                <div class="entry-content">
                    <p><?php _e( 'Sorry, but nothing matched your search criteria. Please try again with some different keywords.', 'Cosmopolitan' ); ?></p>
                 </div><!-- .entry-content -->
            </div><!-- #post-0 -->
        <?php endif; ?>
	</div>
</div>

<?php get_footer(); ?>