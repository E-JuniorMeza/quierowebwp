<?php
add_action('csf_loaded', function () {

    if (class_exists('CSF')) {

        /*-----------------------------------
	            PAGE METABOX SECTION
	    ------------------------------------*/
        CSF::createMetabox(
            "EGNS_HOTEL_META_ID",
            array(
                'id'              => 'hotel_meta_option',
                'title'           => esc_html__('Hotel Custom Informations', 'gofly-core'),
                'post_type'       => 'hotel',
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

        // Hotel General
        CSF::createSection("EGNS_HOTEL_META_ID", array(
            'parent' => 'hotel_meta_option',
            'title'  => esc_html__('General', 'gofly-core'),
            'fields' => array(
                array(
                    'id'    => 'hotel_featured_gallery',
                    'type'  => 'gallery',
                    'title' => esc_html__('Featured Gallery', 'gofly-core'),
                    'desc'  => esc_html__('Upload at least 3 images showing the proper structure.', 'gofly-core'),
                ),
                array(
                    'id'      => 'hotel_intro_video_switch',
                    'title'   => esc_html__("Intro Video", 'gofly-core'),
                    'type'    => 'switcher',
                    'desc'    => esc_html__('Videos related to the featured gallery. If the gallery has at least 3 images or empty value, videos will automatically be hidden.', 'gofly-core'),
                    'default' => true,
                ),
                array(
                    'id'         => 'hotel_intro_video_link',
                    'type'       => 'text',
                    'title'      => esc_html__('Video link', 'gofly-core'),
                    'default'    => 'https://www.youtube.com/watch?v=UJEUwEJ6gH4',
                    'dependency' => array('hotel_intro_video_switch', '==', 'true'),
                ),
                array(
                    'id'         => 'hotel_intro_video_poster',
                    'type'       => 'media',
                    'class'      => 'egns_desc',
                    'title'      => esc_html__('Video Poster', 'gofly-core'),
                    'dependency' => array('hotel_intro_video_switch', '==', 'true'),
                ),
                array(
                    'id'         => 'hotel_intro_video_btn_lbl',
                    'type'       => 'text',
                    'title'      => esc_html__('Video Button label', 'gofly-core'),
                    'default'    => 'Watch Video',
                    'dependency' => array('hotel_intro_video_switch', '==', 'true'),
                ),
                array(
                    'id'      => 'hotel_gallery_btn_lbl',
                    'type'    => 'text',
                    'title'   => esc_html__('Gallery Button label', 'gofly-core'),
                    'default' => 'View More Images',
                ),
                array(
                    'id'      => 'hotel_full_address',
                    'type'    => 'text',
                    'title'   => esc_html__('Hotel Address', 'gofly-core'),
                    'default' => 'Grand Prince Hotel Dhaka Bangladesh.',
                ),
                array(
                    'id'      => 'hotel_location_link_with_lbl',
                    'type'    => 'link',
                    'title'   => esc_html__('Map Button label with link', 'gofly-core'),
                    'default' => array(
                        'url'    => 'https://www.google.com/maps',
                        'text'   => 'View Map',
                        'target' => '_blank'
                    ),
                ),
                array(
                    'id'      => 'hotel_cancellation_policy',
                    'title'   => esc_html__("Cancellation Policy", 'gofly-core'),
                    'type'    => 'switcher',
                    'default' => true,
                ),
                array(
                    'id'         => 'hotel_cancellation_label',
                    'type'       => 'text',
                    'title'      => esc_html__('Cancellation label', 'gofly-core'),
                    'default'    => 'Free Cancellation Policy',
                    'dependency' => array('hotel_cancellation_policy', '==', 'true'),
                ),
                // A Subheading
                array(
                    'type'    => 'subheading',
                    'content' => esc_html__('Custom Information', 'gofly-core'),
                ),
                array(
                    'id'      => 'hotel_card_highlights_features',
                    'type'    => 'textarea',
                    'class'   => 'egns_desc',
                    'title'   => esc_html__('Card Highlights Features', 'gofly-core'),
                    'default' => 'Free Wi-Fi',
                    'desc'    => esc_html__('Press "Enter" to continue on a new line.', 'gofly-core'),
                ),
            ),
        ));

        // Hotel pricing
        CSF::createSection("EGNS_HOTEL_META_ID", array(
            'parent' => 'hotel_pricing_meta_option',
            'title'  => esc_html__('Pricing Package', 'gofly-core'),
            'fields' => array(
                array(
                    'type'    => 'subheading',
                    'content' => esc_html__('Hotel Package list', 'gofly-core'),
                ),
                // Group Flied
                array(
                    'id'                     => 'hotel_pricing_package',
                    'type'                   => 'group',
                    'button_title'           => 'Add Hotel Package',
                    'accordion_title_number' => true,
                    'fields'                 => array(
                        array(
                            'id'      => 'hotel_pricing_package_title',
                            'type'    => 'text',
                            'title'   => esc_html__('Package Name', 'gofly-core'),
                            'default' => esc_html__('Premium Comfort Suite', 'gofly-core'),
                        ),
                        array(
                            'id'      => 'hotel_pricing_package_typ',
                            'type'    => 'text',
                            'title'   => esc_html__('Package label', 'gofly-core'),
                            'default' => esc_html__('Premium Room', 'gofly-core'),
                        ),
                        array(
                            'id'        => 'hotel_booking_date',
                            'type'      => 'datetime',
                            'title'     => esc_html__('Booking Date', 'gofly-core'),
                            'subtitle'  => esc_html__('Add Booking Date with "Begin" and "End"', 'gofly-core'),
                            'from_to'   => true,
                            'text_from' => esc_html__('Start Date*', 'gofly-core'),
                            'text_to'   => esc_html__('End Date', 'gofly-core'),
                            'settings'  => array(
                                'minDate' => 'today',
                            )
                        ),
                        array(
                            'id'      => 'hotel_price',
                            'type'    => 'number',
                            'width'   => '100%',
                            'title'   => esc_html__('Regular Price', 'gofly-core'),
                            'default' => 79,
                            'desc'    => wp_kses(__('Do not use any currency symbol here. To change your currency <a href="/wp-admin/admin.php?page=wc-settings#pricing_options-description" target="_blank">Click Here</a>', 'gofly-core'), wp_kses_allowed_html('post')),
                        ),
                        array(
                            'id'      => 'hotel_price_sale_check',
                            'type'    => 'checkbox',
                            'title'   => esc_html__('Sale Price', 'gofly-core'),
                            'label'   => esc_html__('Need Discount Sale Price?', 'gofly-core'),
                            'default' => false,
                        ),
                        array(
                            'id'         => 'hotel_price_sale',
                            'type'       => 'number',
                            'title'      => esc_html__('Discount Price', 'gofly-core'),
                            'default'    => 55,
                            'dependency' => array('hotel_price_sale_check', '==', 'true'),
                        ),
                        array(
                            'id'    => 'hotel_package_room_gallery',
                            'type'  => 'gallery',
                            'title' => esc_html__('Room Gallery', 'gofly-core'),
                        ),
                        array(
                            'id'      => 'hotel_additional_services',
                            'type'    => 'textarea',
                            'class'   => 'egns_desc',
                            'title'   => esc_html__('Package Additional Services', 'gofly-core'),
                            'default' => 'Spa & Wellness.',
                            'desc'    => esc_html__('Press "Enter" to continue on a new line.', 'gofly-core'),
                        ),
                        array(
                            'id'            => 'hotel_pricing_package_desc',
                            'type'          => 'wp_editor',
                            'title'         => esc_html__('Package Description', 'gofly-core'),
                            'tinymce'       => true,
                            'quicktags'     => true,
                            'media_buttons' => true,
                            'height'        => '100px',
                            'default'       => wp_kses_post('<p>Guests can pre-set room ambiance—temperature, lighting, media settings—for a home-like arrival experience.</p>'),
                        ),
                    ),
                    'default'   => array(
                        array(
                            'hotel_pricing_package_title' => 'Premium Comfort Suite',
                            'hotel_pricing_package_desc'  => wp_kses_post('<p>Guests can pre-set room ambiance—temperature, lighting, media settings—for a home-like arrival experience.</p>'),
                            'hotel_pricing_package_typ'   => 'Premium Room',
                            'hotel_price'                 => 79,
                        ),
                        array(
                            'hotel_pricing_package_title' => 'Superior Comfort Suite',
                            'hotel_pricing_package_desc'  => wp_kses_post('<p>Guests can pre-set room ambiance—temperature, lighting, media settings—for a home-like arrival experience.</p>'),
                            'hotel_pricing_package_typ'   => 'Superior Room',
                            'hotel_price'                 => 85,
                        ),
                    ),
                ),

            ),
        ));
    }
});
