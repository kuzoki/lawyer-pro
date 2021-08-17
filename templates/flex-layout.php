<?php
/**
 * Template Name: flitwp Layouts Content
 * Template Post Type: post, page
 *
 * @package WordPress
 * @subpackage flitWp
 * @since flitWp 1.0
 */

get_header();

$flexibleDirectory = get_template_directory() . '/components';

if (have_rows('layout_theme')):
    while (have_rows('layout_theme')): the_row();

        // Case: Hero
        if (get_row_layout() == 'hero'):
            require "{$flexibleDirectory}/hero.php"; 
         
            
        // Case : Small Hero    
        elseif(get_row_layout() == 'small-hero'):
            require "{$flexibleDirectory}/small-hero.php";

        // Trust Badges Logos    
        elseif(get_row_layout() == 'trust-badges-logos'):
            require "{$flexibleDirectory}/trust-badges-logos.php";

        // About Section layouts     

        elseif(get_row_layout() == 'about_section_layouts'):
            require "{$flexibleDirectory}/about-section-layouts.php";

        // Testimonial Section layouts     

        elseif(get_row_layout() == 'testimonials'):
            require "{$flexibleDirectory}/testimonials.php";
        
        // Practice Area Slider     
        elseif(get_row_layout() == 'practice-areas'):
            require "{$flexibleDirectory}/practice-areas.php";
        
        // Team Slider    
        elseif(get_row_layout() == 'team_slider'):
            require "{$flexibleDirectory}/team-slider.php";  
        
        // Faqs Section    
        elseif(get_row_layout() == 'faqs'):
            require "{$flexibleDirectory}/faq.php";  

        // Banner Block    
        elseif(get_row_layout() == 'banner_block'):
            require "{$flexibleDirectory}/banner-block.php";  
        
        // Contact Section    
        elseif(get_row_layout() == 'contact_section'):
            require "{$flexibleDirectory}/contact-section.php"; 
            
        // Last News Section    
        elseif(get_row_layout() == 'last_news'):
            require "{$flexibleDirectory}/last-news.php";   
        
        // Team Member Grid News Section    
        elseif(get_row_layout() == 'team_grid'):
            require "{$flexibleDirectory}/team-grid.php";

        // Practice Area Grid News Section    
        elseif(get_row_layout() == 'practice_areas_grid'):
            require "{$flexibleDirectory}/practice-areas-grid.php";       
            
        endif;
        
     endwhile;
endif;





get_footer();


