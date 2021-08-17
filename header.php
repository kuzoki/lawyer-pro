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
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="https://gmpg.org/xfn/11">

	<?php wp_head(); ?>
    
</head>

<body <?php body_class(); ?>>
	
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
							<a class="tel" href="tel:<?= get_field( "main_phone_number", "option" ); ?>"><?= get_field( "main_phone_number", "option" ); ?></a> 
						
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
					
					<a href="http://lawyer.local/contact/" taregt="_blank" class="cta-btn round-btn-secondary display-none">Get Free Quote</a>
					
                    
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
       

        
   

    
    