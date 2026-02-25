<?php
CSF::createSection($prefix, array(
    'parent' => 'theme_general_options',
    'title'  => esc_html__('Typography', 'gofly-core'),
    'id'     => 'typography_options',
    'icon'   => 'fas fa-pen-nib',
    'fields' => array(
        array(
            'type'    => 'subheading',
            'content' => '<h3>' . esc_html__('Typography ', 'gofly-core') . '</h3>',
        ),

        // Start Fonts
        array(
            'id'             => 'font_manrope',
            'type'           => 'typography',
            'title'          => esc_html__('Body Font "Manrope"', 'gofly-core'),
            'color'          => false,
            'font_size'      => false,
            'text_align'     => false,
            'font_style'     => false,
            'line_height'    => false,
            'letter_spacing' => false,
            'text_transform' => false,
            'preview'        => 'always',
            'desc'           => wp_kses(__("Replace Font <mark> Manrope</mark>.", 'gofly-core'), wp_kses_allowed_html('post')),
        ),

        array(
            'id'             => 'font_dmsans',
            'type'           => 'typography',
            'title'          => esc_html__('Custom Font "DM Sans"', 'gofly-core'),
            'color'          => false,
            'font_size'      => false,
            'text_align'     => false,
            'font_style'     => false,
            'line_height'    => false,
            'letter_spacing' => false,
            'text_transform' => false,
            'preview'        => 'always',
            'desc'           => wp_kses(__("Replace Font <mark> DM Sans</mark>.", 'gofly-core'), wp_kses_allowed_html('post')),
        ),


        array(
            'id'             => 'font_billy',
            'type'           => 'typography',
            'title'          => esc_html__('Custom Font "Billy Ohio"', 'gofly-core'),
            'color'          => false,
            'font_size'      => false,
            'text_align'     => false,
            'font_style'     => false,
            'line_height'    => false,
            'letter_spacing' => false,
            'text_transform' => false,
            'preview'        => 'always',
            'desc'           => wp_kses(__("Replace Font <mark> Billy Ohio</mark>.", 'gofly-core'), wp_kses_allowed_html('post')),
        ),

        // End Fonts 

    ),
));
