<?php
add_action('csf_loaded', function () {

    if (class_exists('CSF')) {

        // Set a unique slug-like ID
        $prefix = 'egns_menu_options';

        // Create profile options
        CSF::createNavMenuOptions($prefix, array(
            'data_type'    => 'serialize',
            'context'      => 'normal',
            'priority'     => 'default',
            'show_restore' => true,
        ));

        // Create a section
        CSF::createSection($prefix, array(
            'fields' => array(
                array(
                    'id'      => 'enabel_mega_menu',
                    'type'    => 'checkbox',
                    'title'   => esc_html__('Mega Menu', 'gofly-core'),
                    'label'   => esc_html__('Yes, Please do it.', 'gofly-core'),
                    'class'   => 'only-parent-menu',
                    'default' => false,
                ),
                array(
                    'id'          => 'mega_menu_list',
                    'type'        => 'select',
                    'title'       => esc_html__('Mega Menu List', 'gofly-core'),
                    'placeholder' => esc_html__('Select an menu', 'gofly-core'),
                    'options'     => Egns_Core\Egns_Helper::get_post_list_options('mega-menu'),
                    'dependency'  => array('enabel_mega_menu', '==', 'true'),
                    'class'       => 'only-parent-menu',
                ),

            )
        ));
    }
});
