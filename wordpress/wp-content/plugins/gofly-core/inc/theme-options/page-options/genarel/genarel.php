<?php
/*-----------------------------------
PAGE MENU SECTION
------------------------------------*/
CSF::createSection(
    $prefix,
    array(
        'title'  => esc_html__('Header', 'gofly-core'),
        'parent' => 'page_meta_option',
        'fields' => array(
            //Page Header Options
            array(
                'type'    => 'subheading',
                'content' => esc_html__('Header Options', 'gofly-core'),
            ),
            array(
                'id'      => 'page_main_header_enable',
                'type'    => 'select',
                'title'   => esc_html__('Main Header', 'gofly-core'),
                'desc'    => wp_kses(__('you can enable/disable <mark>Main Header </mark> for header section', 'gofly-core'), wp_kses_allowed_html('post')),
                'options' => array(
                    'enable'  => esc_html('Enable'),
                    'disable' => esc_html('Disable'),
                ),
                'default' => 1
            ),
            array(
                'id'      => 'page_header_menu_style',
                'title'   => esc_html__('Select Style', 'gofly-core'),
                'type'    => 'image_select',
                'class'   => 'egns_header_select',
                'options' => array(
                    'default'      => esc_url(EGNS_CORE_THEME_OPTIONS_IMAGES . '/header/default.png'),
                    'header_one'   => esc_url(EGNS_CORE_THEME_OPTIONS_IMAGES . '/header/header-one.png'),
                    'header_two'   => esc_url(EGNS_CORE_THEME_OPTIONS_IMAGES . '/header/header-two.png'),
                    'header_three' => esc_url(EGNS_CORE_THEME_OPTIONS_IMAGES . '/header/header-three.png'),
                    'header_four'  => esc_url(EGNS_CORE_THEME_OPTIONS_IMAGES . '/header/header-four.png'),
                    'header_five'  => esc_url(EGNS_CORE_THEME_OPTIONS_IMAGES . '/header/header-five.png'),
                    'header_six'   => esc_url(EGNS_CORE_THEME_OPTIONS_IMAGES . '/header/header-six.png'),
                    'header_seven' => esc_url(EGNS_CORE_THEME_OPTIONS_IMAGES . '/header/header-seven.png'),
                    'header_eight' => esc_url(EGNS_CORE_THEME_OPTIONS_IMAGES . '/header/header-eight.png'),
                ),
                'desc'       => wp_kses(__('you can select <mark>Header Style </mark> for header section', 'gofly-core'), wp_kses_allowed_html('post')),
                'default'    => 'default',
                'dependency' => array('page_main_header_enable', '==', 'enable'),
            ),
            array(
                'id'         => 'page_header_logo',
                'title'      => esc_html__('Logo', 'gofly-core'),
                'type'       => 'media',
                'desc'       => wp_kses(__('you can upload <mark>Header Logo</mark> for header', 'gofly-core'), wp_kses_allowed_html('post')),
                'dependency' => array('page_main_header_enable', '==', 'enable'),
            ),

            array(
                'id'         => 'page_header_mobile_logo',
                'title'      => esc_html__('Mobile Logo', 'gofly-core'),
                'type'       => 'media',
                'desc'       => wp_kses(__('You can upload <mark>Header Mobile Logo</mark> for header', 'gofly-core'), wp_kses_allowed_html('post')),
                'dependency' => array('page_main_header_enable', '==', 'enable'),
            ),
            array(
                'id'         => 'page_header_sidebar_logo',
                'title'      => esc_html__('Sidebar Logo', 'gofly-core'),
                'type'       => 'media',
                'desc'       => wp_kses(__('you can upload <mark>Sticky Logo</mark> for header three, header five and header seven only.', 'gofly-core'), wp_kses_allowed_html('post')),
                'dependency' => array(
                    array('page_main_header_enable', '==', 'enable'),
                    array('page_header_menu_style', 'any', 'header_seven,header_six,header_five,header_three'),
                ),
            ),

        ),
    )
);

// Footer Options

CSF::createSection(
    $prefix,
    array(
        'title'  => esc_html__('Footer', 'gofly-core'),
        'parent' => 'page_meta_option',
        'fields' => array(
            //Page Footer Options
            array(
                'type'    => 'subheading',
                'content' => esc_html__('Footer Options', 'gofly-core'),
            ),

            array(
                'id'      => 'page_main_footer_enable',
                'type'    => 'select',
                'title'   => esc_html__('Main footer', 'gofly-core'),
                'desc'    => wp_kses(__('You can enable/disable <mark>Main Footer </mark> for this page', 'gofly-core'), wp_kses_allowed_html('post')),
                'options' => array(
                    'enable'  => esc_html('Enable'),
                    'disable' => esc_html('Disable'),
                ),
                'default' => 1
            ),
            array(
                'id'      => 'page_footer_layout',
                'title'   => esc_html__('Select Style', 'gofly-core'),
                'type'    => 'image_select',
                'options' => array(
                    'default'      => esc_url(EGNS_CORE_THEME_OPTIONS_IMAGES . '/header/default.png'),
                    'footer_one'   => esc_url(EGNS_CORE_THEME_OPTIONS_IMAGES . '/footer/footer-one.png'),
                    'footer_two'   => esc_url(EGNS_CORE_THEME_OPTIONS_IMAGES . '/footer/footer-two.png'),
                    'footer_three' => esc_url(EGNS_CORE_THEME_OPTIONS_IMAGES . '/footer/footer-three.png'),
                    'footer_four'  => esc_url(EGNS_CORE_THEME_OPTIONS_IMAGES . '/footer/footer-four.png'),
                    'footer_five'  => esc_url(EGNS_CORE_THEME_OPTIONS_IMAGES . '/footer/footer-five.png'),
                    'footer_six'   => esc_url(EGNS_CORE_THEME_OPTIONS_IMAGES . '/footer/footer-six.png'),
                    'footer_seven' => esc_url(EGNS_CORE_THEME_OPTIONS_IMAGES . '/footer/footer-seven.png'),
                    'footer_eight' => esc_url(EGNS_CORE_THEME_OPTIONS_IMAGES . '/footer/footer-eight.png'),
                ),
                'desc'       => wp_kses(__('You can select <mark>Footer Style </mark> for this page', 'gofly-core'), wp_kses_allowed_html('post')),
                'default'    => 'default',
                'dependency' => array('page_main_footer_enable', '==', 'enable'),
            ),

        ),
    )
);
