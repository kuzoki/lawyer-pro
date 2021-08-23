<div class="search">
	
	<div id="search-bar" class="search-bar">
		
		<form method="get" id="search-form" action="<?php esc_url(home_url('url')); ?>" >
			<input class="text" type="text" name="s" id="s" placeholder="<?php echo esc_attr_e("Search ...", "fletwp") ?>" required />

			<label for="mySubmit" class="search-icon"><i class="fas fa-search"></i></label>
    		<input id="mySubmit" type="submit" name="submit" value="<?php echo esc_html__('Submit','fletwp'); ?>" class="hidden" >
	
			
		</form>

		
	</div>
		
</div>