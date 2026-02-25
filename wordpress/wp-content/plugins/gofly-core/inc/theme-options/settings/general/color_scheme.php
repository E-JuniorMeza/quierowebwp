<?php
CSF::createSection($prefix, array(
    'parent' => 'theme_general_options',
    'title'  => esc_html__('Colors', 'gofly-core'),
    'id'     => 'color_scheme_options',
    'icon'   => 'fas fa-paint-brush fa-fw',
    'fields' => array(
        array(
            'type'    => 'subheading',
            'content' => '<h3>' . esc_html__('Colors ', 'gofly-core') . '</h3>',
        ),

        array(
            'id'      => 'primary_theme_color',
            'type'    => 'color',
            'title'   => esc_html__('Primary Color', 'gofly-core'),
            'desc'    => wp_kses(__("Choose the <mark>Primary Color</mark> for this website.", 'gofly-core'), wp_kses_allowed_html('post')),
        ),
        array(
            'id'      => 'primary_theme_color_opc',
            'type'    => 'color',
            'title'   => esc_html__('RGB Primary Color', 'gofly-core'),
            'desc'    => wp_kses(__("Choose solid color <mark>Auto Convert</mark> RGB for this website.", 'gofly-core'), wp_kses_allowed_html('post')),
        ),
    ),
));
