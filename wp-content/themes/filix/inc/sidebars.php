<?php 

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function filix_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Primary Sidebar', 'filix' ),
		'id'            => 'blog-sidebar',
		'description'   => esc_html__( 'Add widgets here.', 'filix' ),
		'before_widget' => '<div id="%1$s" class="widget %2$s sidebar-widget widget_about">',
		'after_widget'  => '</div>',
		'before_title'  => '<h2 class="widget_title">',
		'after_title'   => '</h2>',
	) );
}
add_action( 'widgets_init', 'filix_widgets_init' );