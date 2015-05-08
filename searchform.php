<form method="get" class="searchform themeform" action="<?php echo home_url('/'); ?>">
	<div>
		<input type="text" class="search" name="s" placeholder="<?php _e('To search, type and press enter','hueman'); ?>"  value="<?php echo get_search_query(); ?>" />
	</div>
</form>