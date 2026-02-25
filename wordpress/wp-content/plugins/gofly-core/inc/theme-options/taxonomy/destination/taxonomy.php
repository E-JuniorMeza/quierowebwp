<?php
add_action('csf_loaded', function () {

    if (class_exists('CSF')) {

        // Location meta fields 
        $prefix_loc = 'egns_taxonomy_location';

        // Create taxonomy options
        CSF::createTaxonomyOptions($prefix_loc, array(
            'taxonomy'  => 'destination-location',
            'data_type' => 'serialize',
        ));

        // Create location taxonomy
        CSF::createSection($prefix_loc, array(
            'fields' => array(
                array(
                    'id'    => 'destination_location_thumb',
                    'type'  => 'media',
                    'title' => wp_kses_post('<h4>Thumbnail</h4>'),
                ),
            )
        ));

        // Continen meta fields 
        $prefix = 'egns_taxonomy_continen';

        // Create taxonomy options
        CSF::createTaxonomyOptions($prefix, array(
            'taxonomy'  => 'destination-continent',
            'data_type' => 'serialize',
        ));

        // Create location taxonomy
        CSF::createSection($prefix, array(
            'fields' => array(
                array(
                    'id'    => 'destination_continen_thumb',
                    'type'  => 'media',
                    'title' => wp_kses_post('Thumbnail'),
                ),
            )
        ));
    }
});
