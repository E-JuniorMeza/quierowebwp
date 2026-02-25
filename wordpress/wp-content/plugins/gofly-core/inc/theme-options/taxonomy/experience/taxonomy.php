<?php
add_action('csf_loaded', function () {

    if (class_exists('CSF')) {

        $prefix = 'egns_experience_price';

        // Create taxonomy options
        CSF::createTaxonomyOptions($prefix, array(
            'taxonomy'  => 'experience-service',
            'data_type' => 'serialize',
        ));

        // Create pricing taxonomy
        CSF::createSection($prefix, array(
            'fields' => array(
                array(
                    'id'    => 'experience_service_price',
                    'type'  => 'number',
                    'title' => esc_html__('Price', 'gofly-core'),
                    'desc'  => esc_html__('Include the desired service price for each package.', 'gofly-core'),
                ),
            )
        ));
    }
});
