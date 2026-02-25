<?php
CSF::createSection($prefix, array(
    'parent' => 'theme_general_options',
    'title'  => esc_html__('Basic', 'gofly-core'),
    'id'     => 'basic_options',
    'icon'   => 'fab fa-pied-piper-alt fa-fw',
    'fields' => array(
        array(
            'type'    => 'subheading',
            'content' => '<h3>' . esc_html__('General ', 'gofly-core') . '</h3>',
        ),

        array(
            'id'      => 'header_scroll_enable',
            'title'   => esc_html__('Scroll Top', 'gofly-core'),
            'type'    => 'switcher',
            'desc'    => wp_kses(__('You can set <mark>ON/OFF</mark> to scroll top button', 'gofly-core'), wp_kses_allowed_html('post')),
            'default' => true,
        ),
        array(
            'id'      => 'header_sticky_enable',
            'title'   => esc_html__('Sticky Header', 'gofly-core'),
            'type'    => 'switcher',
            'desc'    => wp_kses(__('You can set <mark>ON/OFF</mark> to sticky Header One & Four', 'gofly-core'), wp_kses_allowed_html('post')),
            'default' => true,
        ),
        array(
            'id'      => 'rtl_enable',
            'title'   => esc_html__('LRT to RTL Convert', 'gofly-core'),
            'type'    => 'switcher',
            'desc'    => wp_kses_post('You can set <mark>ON / OFF</mark> to enable-disable LRT to RTL'),
            'default' => false,
        ),
    ),

));
