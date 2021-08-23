<?php


/*

    Enqueue scripts and My Custom styles and script.

*/ 
function load_stylesheets()
{
	
    wp_register_style('reset', get_template_directory_uri().'/css/reset.css', array(), rand( 1, 999), 'all');
	wp_enqueue_style('reset');
	wp_register_style('font_awesome', get_template_directory_uri().'/fonts/fontawesome/fontawesome-all.css', rand( 1, 999), false, 'all');
	wp_enqueue_style('font_awesome');

    wp_register_style('fonts','//fonts.googleapis.com/css?family=Lora:400,400i,700,700i|Montserrat:300,400,500,600,700,800,900', array(), false, 'all');
	wp_enqueue_style('fonts');

    wp_register_style('bootstrap',get_template_directory_uri().'/css/bootstrap.min.css', array(), false, 'all');
	wp_enqueue_style('bootstrap');
	
    wp_register_style('flex_slider', get_template_directory_uri().'/css/flexslider.css', array(), false, 'all');
	wp_enqueue_style('flex_slider');

    wp_register_style('global_style', get_template_directory_uri().'/css/global-style.css', array(), rand( 1, 999 ), 'all');
	wp_enqueue_style('global_style');

	wp_register_style('main_style', get_template_directory_uri().'/css/app.css', array(), rand( 1, 999 ), 'all');
	wp_enqueue_style('main_style');
}

add_action('wp_enqueue_scripts', 'load_stylesheets');

/*

    Load Scripts Files For ArtTemplate

*/ 

function load_js()
{
    wp_register_script('jq', get_template_directory_uri().'/js/jquery-3.3.1.min.js', "", 0, true);
    wp_enqueue_script('jq');
    

    wp_register_script('jqueryflexslider', get_template_directory_uri().'/js/jquery.flexslider.js', "", 1, true);
    wp_enqueue_script('jqueryflexslider');

    wp_register_script('tween_Max', get_template_directory_uri().'/js/TweenMax.min.js', "", 1, true);
    wp_enqueue_script('tween_Max');
    
    wp_register_script('ScrollMagic', get_template_directory_uri().'/js/ScrollMagic.min.js', "", 1, true);
    wp_enqueue_script('ScrollMagic');
   
    wp_register_script('animation', get_template_directory_uri().'/js/animation.gsap.js', "", 1, true);
    wp_enqueue_script('animation');

	wp_register_script('app', get_template_directory_uri().'/js/main.js', "", 1, true);
    wp_enqueue_script('app');

	wp_register_script('over-app', get_template_directory_uri().'/js/app.js', "", 1, true);
    wp_enqueue_script('over-app');
}
add_action('wp_enqueue_scripts', 'load_js');