<?php
/*-----------------------------------
    PAGE BARNER SECTION
------------------------------------*/

CSF::createSection(
	$prefix,
	array(
		'title'  => esc_html__('Breadcrumb', 'gofly-core'),
		'parent' => 'page_meta_option',
		'fields' => array(
			array(
				'type'    => 'subheading',
				'content' => esc_html__('Breadcrumb Options', 'gofly-core'),
			),
			array(
				'id'      => 'breadcrumb_enable_page',
				'type'    => 'switcher',
				'title'   => esc_html__('Enable Breadcrumb', 'gofly-core'),
				'desc'    => esc_html__('If you want to show or hide page banner you can toggle ( ON / OFF ).', 'gofly-core'),
				'default' => true,
			),
			array(
				'id'         => 'page_breadcrumb_title_text',
				'type'       => 'text',
				'title'      => esc_html__('Breadcrumb title', 'gofly-core'),
				'dependency' => array('breadcrumb_enable_page', '==', 'true'),
			),
			array(
				'id'         => 'breadcrumb_page_bg_color',
				'type'       => 'color',
				'title'      => esc_html__('Breadcrumb Background Color', 'gofly-core'),
				'dependency' => array('breadcrumb_enable_page', '==', 'true'),
			),
			array(
				'id'         => 'breadcrumb_page_bg_image',
				'type'       => 'media',
				'title'      => esc_html__('Breadcrumb Background Image', 'gofly-core'),
				'desc'       => esc_html__('Set the banner background image', 'gofly-core'),
				'dependency' => array('breadcrumb_enable_page', '==', 'true'),
			),
		)
	)
);
