<div class="search">
	
	<div id="search-bar" class="search-bar">
		
		<form method="get" id="search-form" action="<?php echo esc_url( home_url() ); ?>" >
			<input class="text" type="text" name="s" id="s" placeholder="<?php echo esc_attr_e('Search ...', 'fletwp') ?>" required />

			<label for="mySubmit" class="search-icon"><i class="fas fa-search"></i></label>
    		<input id="mySubmit" type="submit" name="submit" value="<?php echo esc_attr_e('Submit','fletwp'); ?>" class="hidden" >
	
			
		</form>

		
	</div>
		
</div>