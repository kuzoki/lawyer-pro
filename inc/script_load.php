<?php


/*

    Enqueue scripts and My Custom styles and script.

*/ 
function load_stylesheets()
{
	
    wp_register_style('reset', get_template_directory_uri().'/css/reset.css', array(), rand( 1, 999), 'all');
	wp_enqueue_style('reset');
	wp_register_style('fontawesome','//use.fontawesome.com/releases/v5.7.2/css/all.css', array(), false, 'all');
	wp_enqueue_style('fontawesome');

    wp_register_style('fonts','//fonts.googleapis.com/css?family=Lora:400,400i,700,700i|Montserrat:300,400,500,600,700,800,900', array(), false, 'all');
	wp_enqueue_style('fonts');

    wp_register_style('boostrap','https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css', array(), false, 'all');
	wp_enqueue_style('boostrap');
	
    wp_register_style('flexslider', get_template_directory_uri().'/css/flexslider.css', array(), false, 'all');
	wp_enqueue_style('flexslider');

    wp_register_style('global_style', get_template_directory_uri().'/css/global-style.css', array(), rand( 1, 999 ), 'all');
	wp_enqueue_style('global_style');

	wp_register_style('main_style', get_template_directory_uri().'/css/app.css', array(), rand( 1, 999 ), 'all');
	wp_enqueue_style('main_style');
}

add_action('wp_enqueue_scripts', 'load_stylesheets');

/*

    Load Scripts Files For ArtTemplate

*/ 

function loadjs()
{
    wp_register_script('jq', get_template_directory_uri().'/js/jquery-3.3.1.min.js', "", 0, true);
    wp_enqueue_script('jq');
    

    wp_register_script('jqueryflexslider', get_template_directory_uri().'/js/jquery.flexslider.js', "", 1, true);
    wp_enqueue_script('jqueryflexslider');

    wp_register_script('tweenMax', '//cdnjs.cloudflare.com/ajax/libs/gsap/2.1.0/TweenMax.min.js', "", 1, true);
    wp_enqueue_script('tweenMax');
    wp_register_script('ScrollMagic', '//cdnjs.cloudflare.com/ajax/libs/ScrollMagic/2.0.6/ScrollMagic.min.js', "", 1, true);
    wp_enqueue_script('ScrollMagic');
    wp_register_script('addIndicators', '//cdnjs.cloudflare.com/ajax/libs/ScrollMagic/2.0.6/plugins/debug.addIndicators.min.js', "", 1, true);
    wp_enqueue_script('addIndicators');
    wp_register_script('animation', '//cdnjs.cloudflare.com/ajax/libs/ScrollMagic/2.0.6/plugins/animation.gsap.js', "", 1, true);
    wp_enqueue_script('animation');

    wp_register_script('jqueryslicknav', get_template_directory_uri().'/js/jquery.slicknav.js', "", 1, true);
    wp_enqueue_script('jqueryslicknav');

    

	wp_register_script('app', get_template_directory_uri().'/js/main.js', "", 1, true);
    wp_enqueue_script('app');

	wp_register_script('over-app', get_template_directory_uri().'/js/app.js', "", 1, true);
    wp_enqueue_script('over-app');
}
add_action('wp_enqueue_scripts', 'loadjs');