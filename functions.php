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

/**
 * Essential theme supports
 * */
function theme_setup(){
    /** automatic feed link*/
    add_theme_support( 'automatic-feed-links' );
 
    /** tag-title **/
    add_theme_support( 'title-tag' );
 
    /** post formats */
    // $post_formats = array('aside','image','gallery','video','audio','link','quote','status');
    // add_theme_support( 'post-formats', $post_formats);
 
    /** post thumbnail **/
    add_theme_support( 'post-thumbnails' );
 
    /** HTML5 support **/
    add_theme_support( 'html5', array( 'comment-list', 'comment-form', 'search-form', 'gallery', 'caption' ) );
 
    /** refresh widgest **/
    add_theme_support( 'customize-selective-refresh-widgets' );
 
    /** custom background **/
    $bg_defaults = array(
        'default-image'          => '',
        'default-preset'         => 'default',
        'default-size'           => 'cover',
        'default-repeat'         => 'no-repeat',
        'default-attachment'     => 'scroll',
    );
    add_theme_support( 'custom-background', $bg_defaults );
 
    /** custom header **/
    $header_defaults = array(
        'default-image'          => '',
        'width'                  => 300,
        'height'                 => 60,
        'flex-height'            => true,
        'flex-width'             => true,
        'default-text-color'     => '',
        'header-text'            => true,
        'uploads'                => true,
    );
    add_theme_support( 'custom-header', $header_defaults );
 
    /** custom log **/
    add_theme_support( 'custom-logo', array(
        'height'      => 60,
        'width'       => 400,
        'flex-height' => true,
        'flex-width'  => true,
        'header-text' => array( 'site-title', 'site-description' ),
    ) );
 
     // This theme uses wp_nav_menu() in one location.
		register_nav_menus(
			array(
				'menu-1' => esc_html__( 'Primary Header Menu', 'fletwp' ),
				'footer-menu-left' => esc_html__( 'Footer Left', 'fletwp' ),
				'footer-menu-right' => esc_html__( 'Footer Right', 'fletwp' ),
				'footer-social-media' => esc_html__( 'Footer Social Media', 'fletwp' ),
				
			)
		);   
 
}
add_action('after_setup_theme','theme_setup');

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
			'name'          => esc_html__( 'Sidebar', 'fletwp' ),
			'id'            => 'sidebar-1',
			'description'   => esc_html__( 'Add widgets here.', 'fletwp' ),
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



// Acf Custom Page Option
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




// Styling 

function WordPress_customize_css(){ 
	$main_color = get_field('main_theme_color' , 'option');
	$secondary_color = get_field('secondary_theme_color' , 'option');
	$default_color = get_field('default_theme_color' , 'option');
	$text_color = get_field('text_body_color' , 'option');
?>
    <style>
        :root {
            --main-color: <?php if($main_color): echo esc_attr($main_color); else : echo '#003471'; endif?>;
            --secondary-color: <?php if($secondary_color): echo esc_attr($secondary_color); else : echo '#d29449'; endif?>;
			--default-color: <?php if($default_color): echo esc_attr($default_color); else : echo '#000000'; endif?>;
			--text-color: <?php if($text_color): echo esc_attr($text_color); else : echo '#5a5c5f'; endif?>;
        }
              
		
    </style>
<?php }
add_action( 'wp_head', 'WordPress_customize_css');