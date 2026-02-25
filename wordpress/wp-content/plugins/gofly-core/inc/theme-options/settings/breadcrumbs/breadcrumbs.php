<?php
/*-------------------------------------------------------
		  ** Breadcrumbs Options
--------------------------------------------------------*/

CSF::createSection($prefix, array(
	'title'  => esc_html__('Breadcrumb', 'gofly-core'),
	'id'     => 'breadcrumb_options',
	'icon'   => 'fa fa-sliders',
	'fields' => array(
		array(
			'type'    => 'subheading',
			'content' => '<h3>' . esc_html__('Breadcrumb Options', 'gofly-core') . '</h3>'
		),
		array(
			'id'      => 'breadcrumb_enable',
			'title'   => esc_html__('Enable Breadcrumb', 'gofly-core'),
			'type'    => 'switcher',
			'desc'    => wp_kses(__('You can turn <mark>ON/OFF</mark> to show, hide breadcrumb globally', 'gofly-core'), wp_kses_allowed_html('post')),
			'default' => true,
		),
		array(
			'id'         => 'breadcrumb_title_text',
			'type'       => 'text',
			'title'      => esc_html__('Breadcrumb Title', 'gofly-core'),
			'dependency' => array('breadcrumb_enable', '==', 'true'),
		),
		array(
			'id'         => 'breadcrumb_background_color',
			'type'       => 'color',
			'title'      => 'Background Color',
			'default'    => '#1781FE',
			'desc'       => esc_html__('set the banner background color', 'gofly-core'),
			'dependency' => array('breadcrumb_enable', '==', 'true'),
		),
		array(
			'id'      => 'breadcrumb_bg_image',
			'type'    => 'media',
			'title'   => esc_html__('Background Image', 'gofly-core'),
			'desc'    => esc_html__('set the banner background image', 'gofly-core'),
			'default' => array(
				'url'       => esc_url(EGNS_CORE_THEME_OPTIONS_IMAGES . '/breadcrumb/breadcrumb-bg.webp'),
				'id'        => 'breadcrumb-img',
				'thumbnail' => esc_url(EGNS_CORE_THEME_OPTIONS_IMAGES . '/breadcrumb/breadcrumb-bg.webp'),
				'alt'       => esc_attr('breadcrumb-img'),
				'title'     => esc_html('Breadcrumb'),
			),
			'dependency' => array('breadcrumb_enable', '==', 'true'),
		),
	)
));
