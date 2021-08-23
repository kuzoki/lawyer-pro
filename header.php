<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package flitwp_Template
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php  bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="https://gmpg.org/xfn/11">
	<link rel="icon" href="<?= esc_url(get_field('company_fav_icon', 'option')) ?>">

	<?php wp_head(); ?>
    
</head>

<body <?php body_class(); ?>>
<?php wp_body_open(); ?>
	 <!-- HEADER SECTION -->
	<header class="header">
        <div class="top-nav group" id="top-nav">
            <div class="top-head group">
                <div class="container px-0 d-flex justify-content-between align-items-center py-3">
					<div class="logo">
						<?php 
							
							if(get_field( "company_logo", "option" )):
						?> 
							<a href="/"><img src="<?= get_field( "company_logo", "option" ); ?>" alt="logo"></a>
						<?php 
							else: 
								if ( function_exists( 'the_custom_logo' ) ) {
									the_custom_logo();
								} 
							endif;
						?>		
					</div>
					<!--Free Consultation  -->
					
					<div class="consultation">
						<div class="icon"><i class="fas fa-phone"></i></div>   
						<p>
							Free Consultation : 
							<a class="tel" href="tel:<?= esc_attr(get_field( "main_phone_number", "option" )); ?>"><?= esc_html(get_field( "main_phone_number", "option" )); ?></a> 
						
						</p>
					</div>
					<div class="toggle-btn">
						<span class="line-1"></span>
						<span class="line-2"></span>
						<span class="line-3"></span>
					</div>
				</div>
            </div>
            <!-- MAIN NAVBAR -->
            <div class="d-flex align-items-center justify-content-between main-navbar container" id="main-navbar">
                    <div class="list-navbar">
						<?php
							wp_nav_menu(
								array(
									'theme_location' => 'menu-1',
									'menu_id'        => 'menu_main',
									'menu_class'           => 'nav-items group',
								)
							);
							
						?>
					</div>
					<?php $cta_button = get_field('contact_us_block_cta_button', 'option'); ?>
					
					<?php if($cta_button): ?>
						<a href="<?= esc_url($cta_button['url']) ?>" class="cta-btn round-btn-secondary display-none">Get Free Quote</a>
					<?php endif; ?>   
					
                    
            </div>
            <!-- RESPONSIVE MENU-->
            <div class="responsive-navbar">
                <div class="responsive-nav">
                    <div class="menu-data">
                        <?php
                            wp_nav_menu(
                                array(
                                    'theme_location' => 'menu-1',
                                    'menu_id'        => 'menu_nav',
                                    'menu_class'           => 'menu-items group',
                                )
                            );
                        ?>
                    </div>
                </div>
            </div>
        </div>
</header>     
       

        
   

    
    