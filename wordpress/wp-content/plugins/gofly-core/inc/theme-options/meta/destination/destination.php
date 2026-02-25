<?php
add_action('csf_loaded', function () {

    if (class_exists('CSF')) {

        /*-----------------------------------
	            PAGE METABOX SECTION
	    ------------------------------------*/
        CSF::createMetabox(
            "EGNS_DESTINATION_META_ID",
            array(
                'id'              => 'destination_meta_option',
                'title'           => esc_html__('Destination Custom Informations', 'gofly-core'),
                'post_type'       => 'destination',
                'context'         => 'normal',
                'priority'        => 'high',
                'show_restore'    => true,
                'enqueue_webfont' => true,
                'async_webfont'   => false,
                'output_css'      => false,
                'nav'             => 'normal',
                'theme'           => 'dark',
            )
        );


        /*-----------------------------------
		        REQUIRE META FILES
	    ------------------------------------*/

        // General
        CSF::createSection(
            "EGNS_DESTINATION_META_ID",
            array(
                'title'  => esc_html__('General Info', 'gofly-core'),
                'fields' => array(
                    array(
                        'id'      => 'destination_related_tours',
                        'title'   => esc_html__("Related Tours ON/OFF", 'gofly-core'),
                        'type'    => 'switcher',
                        'desc'    => wp_kses(__("You can <mark>ON/OFF</mark> Avaible Tours section.", 'gofly-core'), wp_kses_allowed_html('post')),
                        'default' => true,
                    ),
                    array(
                        'id'    => 'destination_feature_gallery',
                        'type'  => 'gallery',
                        'title' => esc_html__('Featured Image gallery', 'gofly-core'),
                    ),
                    array(
                        'id'      => 'destination_feature_video_source',
                        'type'    => 'radio',
                        'title'   => esc_html__('Video Source', 'gofly-core'),
                        'options' => array(
                            'url'    => 'URL',
                            'upload' => 'Upload',
                        ),
                        'inline'  => true,
                        'default' => 'url',
                    ),
                    array(
                        'id'         => 'destination_feature_video_uplaod',
                        'type'       => 'media',
                        'title'      => esc_html__('Upload Video', 'gofly-core'),
                        'library'    => 'video',
                        'dependency' => array('destination_feature_video_source', '==', 'upload')
                    ),
                    array(
                        'id'         => 'destination_feature_video_link',
                        'type'       => 'text',
                        'title'      => esc_html__('Video Link', 'gofly-core'),
                        'dependency' => array('destination_feature_video_source', '==', 'url')
                    ),
                    array(
                        'id'    => 'destination_country_flag',
                        'type'  => 'media',
                        'class' => 'egns_desc',
                        'title' => esc_html__('Country flag', 'gofly-core'),
                    ),

                    array(
                        'id'      => 'destination_departure',
                        'type'    => 'text',
                        'title'   => esc_html__('Destination Departure', 'gofly-core'),
                        'desc'    => wp_kses(__("You can set the <mark>Departure</mark> value together with the count.", 'gofly-core'), wp_kses_allowed_html('post')),
                        'default' => '240 departure',
                    ),
                    array(
                        'id'      => 'destination_guest_travelled',
                        'type'    => 'text',
                        'title'   => esc_html__('Guest Travelled', 'gofly-core'),
                        'desc'    => wp_kses(__("How many <mark>guests</mark> have visited here so far?", 'gofly-core'), wp_kses_allowed_html('post')),
                        'default' => '15,786 guest travelled.',
                    ),
                ),
            )
        );
    }
});
