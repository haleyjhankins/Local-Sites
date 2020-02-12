<?php
/** The template for displaying 404 pages (Not Found). **/

get_header(); ?>

<!-- Title -->
<div class="pagebgd">
	<div class="container_12">
		<div class="grid_6_no_margin">
    		<div class="pagetitle">
            	<?php _e('Error 404: Page Not Found', 'Cosmopolitan') ?>
            </div>
    	</div>
    	<div class="grid_6_no_margin">
    		 <?php get_search_form(); ?>
    	</div>
	</div>
</div>
<div class="divider_shadow"></div>    
<div class="pagecontents">
    <div class="container_12">
        <div class="contentbox">
           	<h2>
            	<?php _e('Sorry, the page or file you requested may have been moved or deleted.', 'Cosmopolitan')?>
            </h2>
			
			<p>
				<?php _e('It seems the page you were trying to reach has been moved or does not exist any more. Please use our search form to find what you were looking for. If the problem persists, don\'t hesitate to contact us.', 'Cosmopolitan')?>
			</p>
		
		</div>
		<div class="clearsmall"></div>
    </div>
</div>

<?php get_footer(); ?>