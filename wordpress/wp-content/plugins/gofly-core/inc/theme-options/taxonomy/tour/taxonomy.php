<?php
add_action('csf_loaded', function () {

    if (class_exists('CSF')) {

        $prefix = 'egns_tour_price';

        // Create taxonomy options
        CSF::createTaxonomyOptions($prefix, array(
            'taxonomy'  => 'tour-pricing-category',
            'data_type' => 'serialize',
        ));

        // Create pricing taxonomy
        CSF::createSection($prefix, array(
            'fields' => array(
                array(
                    'id'    => 'tour_price_cat_min_age',
                    'type'  => 'text',
                    'title' => esc_html__('Min age', 'gofly-core'),
                ),
                array(
                    'id'    => 'tour_price_cat_max_age',
                    'type'  => 'text',
                    'title' => esc_html__('Max age', 'gofly-core'),
                ),
            )
        ));


        $svc_prefix = 'egns_tour_service';

        // Create taxonomy options
        CSF::createTaxonomyOptions($svc_prefix, array(
            'taxonomy'  => 'tour-service',
            'data_type' => 'serialize',
        ));

        // Create pricing taxonomy
        CSF::createSection($svc_prefix, array(
            'fields' => array(
                array(
                    'id'    => 'tour_service_price',
                    'type'  => 'text',
                    'title' => esc_html__('Price', 'gofly-core'),
                ),
                array(
                    'id'      => 'tour_service_suffix_price',
                    'type'    => 'select',
                    'title'   => esc_html__('Suffix Price', 'gofly-core'),
                    'options' => array(
                        'perhour'    => 'Per Hour',
                        'perperson'  => 'Per person',
                        'perpackage' => 'Per Package',
                    ),
                    'default' => 'perpackage',
                ),
            )
        ));
    }
});
