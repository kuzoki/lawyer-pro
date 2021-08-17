<?php
/**
 * lawyer-Blog Template functions 
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package lawyer-Blog_Template
 */



function test_custom_post_type(){
    $url = get_template_directory_uri(  );
    
    register_post_type( 'testimonials', 
        array(  
            'rewrite' => array('slug'=> 'testimonials'),
            'labels' => array(
                'name' => 'Testimonials',	
                'singular_name' => 'Testimonial',	
                'add_new_item' => 'Add New Testimonials',
                'edit_item' => 'Edit Testimonials',
                  

            ),
            'menu_icon' => 'dashicons-star-filled',
            'public'=> true,
            'has_archive' => true,
            'supports' => array(
                'title', 'thumbnail', 
            )
            
        ) 
    );
    register_post_type( 'practice-Areas', 
        array(  
            'rewrite' => array('slug'=> 'practice-areas'),
            'labels' => array(
                'name' => 'Practice Areas',	
                'singular_name' => 'Practice Area',	
                'add_new_item' => 'Add New Practice Area',
                'edit_item' => 'Edit Practice Area',

            ),
            'menu_icon' => 'dashicons-format-aside',
            'public'=> true,
            'has_archive' => true,
            'supports' => array(
                'title', 'thumbnail', 
            )
        ) 
    );
    register_post_type( 'faq', 
        array(  
            'rewrite' => array('slug'=> 'faq'),
            'labels' => array(
                'name' => 'FAQs',	
                'singular_name' => 'FAQ',	
                'add_new_item' => 'Add New FAQ',
                'edit_item' => 'Edit FAQ',

            ),
            'menu_icon' => 'dashicons-editor-help',
            'public'=> true,
            'has_archive' => true,
            'supports' => array(
                'title', 'thumbnail', 
            )
        ) 
    );
    register_post_type( 'team', 
        array(  
            'rewrite' => array('slug'=> 'team'),
            'labels' => array(
                'name' => 'Team Members',	
                'singular_name' => 'Team Member',	
                'add_new_item' => 'Add New Team Member',
                'edit_item' => 'Edit Team Member',

            ),
            'menu_icon'  => 'dashicons-id-alt',
            'public'=> true,
            'has_archive' => true,
            'supports' => array(
                'title', 'thumbnail', 
            )
        ) 
    );
}
add_action( 'init', 'test_custom_post_type' );