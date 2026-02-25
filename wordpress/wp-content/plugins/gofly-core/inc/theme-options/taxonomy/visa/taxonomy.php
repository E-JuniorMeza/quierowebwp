<?php
add_action('csf_loaded', function () {

    if (class_exists('CSF')) {

        $prefix = 'egns_visa_flag';

        // Create taxonomy options
        CSF::createTaxonomyOptions($prefix, array(
            'taxonomy'  => 'visa-countries',
            'data_type' => 'serialize',
        ));

        // Create pricing taxonomy
        CSF::createSection($prefix, array(
            'fields' => array(
                array(
                    'id'    => 'visa_country_flag',
                    'type'  => 'media',
                    'title' => wp_kses_post('Country Flag'),
                ),
            )
        ));
    }
});
