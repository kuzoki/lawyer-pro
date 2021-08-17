<?php 


 /*
    @package Alex Template

    ===============================
         Side Bar Setting
    ===============================

*/



function lawyer_blog_template_widgets_init() {
	register_sidebar(
		array(
			'name'          => esc_html__( 'Sidebar', 'lawyer-blog-template' ),
			'id'            => 'sidebar-1',
			'description'   => esc_html__( 'Add widgets here.', 'lawyer-blog-template' ),
			'before_widget' => '<div id="%1$s" class="sidebar-sec">',
			'after_widget'  => '</div>',
			'before_title'  => '<h2 class="in-title">',
			'after_title'   => '</h2>',
		)
	);
}
add_action( 'widgets_init', 'lawyer_blog_template_widgets_init' );