<?php

function egns_core_widgets_init()
{
	// register_sidebar(array(
	// 	'name'          => esc_html__('Footer One Widget', 'gofly-core'),
	// 	'id'            => 'footer_one',
	// 	'before_widget' => '<div id="%1$s" class="footer-widget %2$s">',
	// 	'after_widget'  => '</div>',
	// 	'before_title'  => '<div class="widget-title"><h4>',
	// 	'after_title'   => '</h4></div>',
	// ));
	// register_sidebar(array(
	// 	'name'          => esc_html__('Footer Two Widget', 'gofly-core'),
	// 	'id'            => 'footer_two',
	// 	'before_widget' => '<div id="%1$s" class="footer-widget %2$s">',
	// 	'after_widget'  => '</div>',
	// 	'before_title'  => '<div class="widget-title"><h4>',
	// 	'after_title'   => '</h4></div>'
	// ));
	// register_sidebar(array(
	// 	'name'          => esc_html__('Footer Three Widget', 'gofly-core'),
	// 	'id'            => 'footer_three',
	// 	'before_widget' => '<div id="%1$s" class="footer-widget %2$s">',
	// 	'after_widget'  => '</div>',
	// 	'before_title'  => '<div class="widget-title"><h4>',
	// 	'after_title'   => '</h4></div>'
	// ));
	register_sidebar(array(
		'name'          => esc_html__('Shop Sidebar', 'gofly-core'),
		'id'            => 'shop_sidebar',
		'before_widget' => '<div id="%1$s" class="single-widgets %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<div class="widget-title"><h5>',
		'after_title'   => '</h5></div>',
	));
}

add_action('widgets_init', 'egns_core_widgets_init');
