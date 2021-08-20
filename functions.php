<?php
/**
 * Flitwp Template functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package Flitwp Template
 */

if ( ! defined( '_S_VERSION' ) ) {
	// Replace the version number of the theme on each release.
	define( '_S_VERSION', '1.0.0' );
}

if ( ! function_exists( 'flit_wp_template_setup' ) ) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function flit_wp_template_setup() {
		/*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 * If you're building a theme based on flit-wp Template, use a find and replace
		 * to change 'flit-wp-template' to the name of your theme in all the template files.
		 */
		load_theme_textdomain( 'flit-wp-template', get_template_directory() . '/languages' );

		// Add default posts and comments RSS feed links to head.
		add_theme_support( 'automatic-feed-links' );

		/*
		 * Let WordPress manage the document title.
		 * By adding theme support, we declare that this theme does not use a
		 * hard-coded <title> tag in the document head, and expect WordPress to
		 * provide it for us.
		 */
		add_theme_support( 'title-tag' );

		/*
		 * Enable support for Post Thumbnails on posts and pages.
		 *
		 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
		 */
		add_theme_support( 'post-thumbnails' );

		// This theme uses wp_nav_menu() in one location.
		register_nav_menus(
			array(
				'menu-1' => esc_html__( 'Primary Header Menu', 'flit-wp-template' ),
				'footer-menu-left' => esc_html__( 'Footer Left', 'flit-wp-template' ),
				'footer-menu-right' => esc_html__( 'Footer Right', 'flit-wp-template' ),
				'footer-social-media' => esc_html__( 'Footer Social Media', 'flit-wp-template' ),
				
			)
		);

		/*
		 * Switch default core markup for search form, comment form, and comments
		 * to output valid HTML5.
		 */
		add_theme_support(
			'html5',
			array(
				'search-form',
				'comment-form',
				'comment-list',
				'gallery',
				'caption',
				'style',
				'script',
			)
		);

		// Set up the WordPress core custom background feature.
		add_theme_support(
			'custom-background',
			apply_filters(
				'flit_wp_template_custom_background_args',
				array(
					'default-color' => 'ffffff',
					'default-image' => '',
				)
			)
		);

		// Add theme support for selective refresh for widgets.
		add_theme_support( 'customize-selective-refresh-widgets' );

		/**
		 * Add support for core custom logo.
		 *
		 * @link https://codex.wordpress.org/Theme_Logo
		 */
		add_theme_support(
			'custom-logo',
			array(
				'height'      => 250,
				'width'       => 250,
				'flex-width'  => true,
				'flex-height' => true,
			)
		);
	}
endif;
add_action( 'after_setup_theme', 'flit_wp_template_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function flit_wp_template_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'flit_wp_template_content_width', 640 );
}
add_action( 'after_setup_theme', 'flit_wp_template_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function flit_wp_template_widgets_init() {
	register_sidebar(
		array(
			'name'          => esc_html__( 'Sidebar', 'flit-wp-template' ),
			'id'            => 'sidebar-1',
			'description'   => esc_html__( 'Add widgets here.', 'flit-wp-template' ),
			'before_widget' => '<div id="%1$s" class="sidebar-sec">',
			'after_widget'  => '</div>',
			'before_title'  => '<h2 class="side-section-title">',
			'after_title'   => '</h2>',
		)
	);
}
add_action( 'widgets_init', 'flit_wp_template_widgets_init' );



/**
 * Enqueue scripts and My Custom styles and script.
*/

require get_template_directory() . '/inc/script_load.php';








/*
 	 	Filter Search In post Only

*/

function SearchFilter($query) {
    if ($query->is_search) {
        $query->set('post_type', 'post');
    }
    return $query;
}
add_filter('pre_get_posts','SearchFilter');



	


/*
    @package flit wp Template

    ============================================
        Required Plugin Setting (TGM)
    =============================================

*/

//require_once get_template_directory() . '/inc/class-tgm-plugin-activation.php';
//require_once get_template_directory() . '/inc/required-plugins.php';





/**
 * Register a custom post type page.
 */

	
	require get_template_directory() . '/inc/custom-post-type.php';










	if( function_exists('acf_add_options_page') ) {
	
		acf_add_options_page(array(
			'page_title' 	=> 'Theme General Settings',
			'menu_title'	=> 'Theme Settings',
			'menu_slug' 	=> 'theme-general-settings',
			'capability'	=> 'edit_posts',
			'icon_url' => 'dashicons-admin-generic',
			'redirect'		=> false
		));

		acf_add_options_sub_page(array(
			'page_title' 	=> 'Company Global Information',
			'menu_title'	=> 'Association Info ',
			'parent_slug'	=> 'theme-general-settings',
		));
		
		
		
	}
	


require get_template_directory() . '/inc/comment-fun.php';
require get_template_directory() . '/inc/function-sidebar.php';


require get_template_directory() . '/inc/facebook-widget.php';

require get_template_directory() . '/inc/tag-widget.php';

require get_template_directory() . '/inc/category-widget.php';

require get_template_directory() . '/inc/last-post-widget.php';



// Styling 

function WordPress_customize_css(){ 
	$main_color = get_field('main_theme_color' , 'option');
	$secondary_color = get_field('secondary_theme_color' , 'option');
	$default_color = get_field('default_theme_color' , 'option');
	$text_color = get_field('text_body_color' , 'option');
?>
    <style>
        :root {
            --main-color: <?php if($main_color): echo $main_color; else : echo '#003471'; endif?>;
            --secondary-color: <?php if($secondary_color): echo $secondary_color; else : echo '#d29449'; endif?>;
			--default-color: <?php if($default_color): echo $default_color; else : echo '#000000'; endif?>;
			--text-color: <?php if($text_color): echo $text_color; else : echo '#5a5c5f'; endif?>;
        }
              
		
    </style>
<?php }
add_action( 'wp_head', 'WordPress_customize_css');