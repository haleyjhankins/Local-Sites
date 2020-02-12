<form action="<?php echo site_url() ?>" method="get" id="searchform">   
   	<fieldset class="search">
    <div>
		<input type="text" name="s" id="search" title="<?php _e('Search', 'Cosmopolitan');?>" class="field" onFocus='this.value="";' value="<?php the_search_query(); ?>" />
   		<button type="submit" class="btn" name="search" id="search-submit"></button>
	</div>
    </fieldset>
</form>
