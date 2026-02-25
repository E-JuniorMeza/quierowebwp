<?php
/*-------------------------------------------------------
		  ** Blog Page  Options
--------------------------------------------------------*/

CSF::createSection($prefix, array(
	'parent' => 'blog_settings',
	'id'     => 'blog_post_options',
	'title'  => esc_html__('Blog Post', 'gofly-core'),
	'icon'   => 'fa fa-list-ul',
	'fields' => array(
		// A Subheading
		array(
			'type'    => 'subheading',
			'content' => esc_html__('Archive page', 'gofly-core'),
		),
		array(
			'id'      => 'blog_layout_options',
			'title'   => esc_html__('Blog Layout', 'gofly-core'),
			'type'    => 'image_select',
			'options' => array(
				'standard'     => EGNS_CORE_THEME_OPTIONS_IMAGES . '/blog/standard.png',
				'grid'         => EGNS_CORE_THEME_OPTIONS_IMAGES . '/blog/grid.png',
				'grid-sidebar' => EGNS_CORE_THEME_OPTIONS_IMAGES . '/blog/grid_side.jpg',
			),
			'default' => 'standard',
			'desc'    => wp_kses(__('You can set <mark>blog layout</mark> for blog archive page', 'gofly-core'), wp_kses_allowed_html('post')),
		),
		// A Subheading
		array(
			'type'    => 'subheading',
			'content' => esc_html__('Details page', 'gofly-core'),
		),
		array(
			'id'      => 'single_post_related_post_section_title',
			'type'    => 'text',
			'title'   => esc_html__('Related post section title', 'gofly-core'),
			'default' => esc_html__('You May Also Like', 'gofly-core'),
		),
		array(
			'id'      => 'single_post_related_post_sec_desc',
			'type'    => 'textarea',
			'class'   => 'egns_desc',
			'title'   => esc_html__('Related post title short description', 'gofly-core'),
			'default' => esc_html__('A curated list of the most popular travel packages based on different destinations.', 'gofly-core'),
		),
	),

));
