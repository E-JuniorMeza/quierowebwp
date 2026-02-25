<?php
add_action('csf_loaded', function () {

    if (class_exists('CSF')) {
        /*-----------------------------------
	    PAGE METABOX SECTION
	   ------------------------------------*/
        CSF::createMetabox("EGNS_EXPERIENCE_META_ID", array(
            'id'              => 'experience_meta_option',
            'title'           => esc_html__('Tour Custom Informations', 'gofly-core'),
            'post_type'       => 'experience',
            'context'         => 'normal',
            'priority'        => 'high',
            'show_restore'    => true,
            'enqueue_webfont' => true,
            'async_webfont'   => false,
            'output_css'      => false,
            'nav'             => 'normal',
            'theme'           => 'dark',
        ));


        /*-----------------------------------
		REQUIRE META FILES
	   ------------------------------------*/

        // General Info
        CSF::createSection("EGNS_EXPERIENCE_META_ID", array(
            'parent' => 'experience_meta_option',
            'title'  => esc_html__('General', 'gofly-core'),
            'fields' => array(
                array(
                    'type'    => 'subheading',
                    'content' => esc_html__('General Information', 'gofly-core'),
                ),
                array(
                    'id'    => 'experience_featured_image_gallery',
                    'type'  => 'gallery',
                    'title' => esc_html__('Featured Image Gallery', 'gofly-core'),
                ),
                array(
                    'id'      => 'experience_featured_video_source',
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
                    'id'         => 'experience_featured_video_uplaod',
                    'type'       => 'media',
                    'class'      => 'egns_desc',
                    'title'      => esc_html__('Upload Video', 'gofly-core'),
                    'library'    => 'video',
                    'dependency' => array('experience_featured_video_source', '==', 'upload')
                ),
                array(
                    'id'         => 'experience_featured_video_link',
                    'type'       => 'text',
                    'title'      => esc_html__('Video Link', 'gofly-core'),
                    'dependency' => array('experience_featured_video_source', '==', 'url')
                ),
                array(
                    'id'      => 'experience_maximum_ticket',
                    'type'    => 'number',
                    'title'   => 'Maximum Booking limit',
                    'default' => 20,
                ),
                array(
                    'id'      => 'experience_minimum_age',
                    'type'    => 'number',
                    'title'   => 'Minimum Age Requirement',
                    'default' => 14,
                ),
                array(
                    'id'      => 'experience_duration_hour',
                    'type'    => 'text',
                    'title'   => 'Activities Duration',
                    'default' => '01 Hour',
                ),
                // Cancellation Time 
                array(
                    'id'      => 'experience_cancellation_enable',
                    'type'    => 'switcher',
                    'title'   => 'Enable Cancellation Time',
                    'desc'    => 'Free cancellation available until the experience start date.',
                    'default' => false,
                ),
                array(
                    'id'         => 'experience_cancellation_time',
                    'type'       => 'text',
                    'title'      => 'Cancellation Time',
                    'desc'       => 'Hours',
                    'dependency' => array('experience_cancellation_enable', '==', 'true'),
                ),
                array(
                    'id'          => 'experience_destination_select',
                    'type'        => 'select',
                    'title'       => esc_html__('Select Destination', 'gofly-core'),
                    'placeholder' => esc_html__('Select Experience Destination', 'gofly-core'),
                    'chosen'      => true,
                    'multiple'    => true,
                    'options'     => 'posts',
                    'query_args'  => array(
                        'post_type'      => 'destination',
                        'posts_per_page' => -1,
                    ),
                    'width' => '100%',
                ),
                array(
                    'id'      => 'experience_pack_info_list',
                    'type'    => 'textarea',
                    'title'   => esc_html__('Package-info', 'gofly-core'),
                    'default' => 'Thrilling Aerial Adventure',
                    'desc'    => 'Press "Enter" to continue on a new line.',
                ),
            )
        ));

        // experience pricing
        CSF::createSection("EGNS_EXPERIENCE_META_ID", array(
            'parent' => 'experience_pricing_meta_option',
            'title'  => esc_html__('Pricing Package', 'gofly-core'),
            'fields' => array(
                array(
                    'type'    => 'subheading',
                    'content' => esc_html__('Experience Package list', 'gofly-core'),
                ),
                // Group Flied
                array(
                    'id'                     => 'experience_pricing_package',
                    'type'                   => 'group',
                    'button_title'           => 'Add Experience Package ',
                    'accordion_title_number' => true,
                    'fields'                 => array(
                        array(
                            'id'      => 'experience_pricing_package_title',
                            'type'    => 'text',
                            'title'   => esc_html__('Package Title', 'gofly-core'),
                            'default' => esc_html__('Costa Rica Zip-line', 'gofly-core'),
                        ),
                        array(
                            'id'            => 'experience_pricing_package_desc',
                            'type'          => 'wp_editor',
                            'title'         => esc_html__('Package Description', 'gofly-core'),
                            'tinymce'       => true,
                            'quicktags'     => true,
                            'media_buttons' => true,
                            'height'        => '100px',
                            'default'       => wp_kses_post('<p>An 11-night journey covering Bangkok <i class="bi bi-arrow-right"></i> River Kwai <i class="bi bi-arrow-right"></i> Chiang Rai <i class="bi bi-arrow-right"></i> Chiang Mai <i class="bi bi-arrow-right"></i> Phi Phi <i class="bi bi-arrow-right"></i> Phuket.</p>'),
                        ),
                        array(
                            'id'         => 'experience_pricing_package_typ',
                            'type'       => 'text',
                            'title'      => esc_html__('Package label', 'gofly-core'),
                            'default'    => esc_html__('Group Tour', 'gofly-core'),
                        ),
                        array(
                            'id'        => 'experience_booking_date',
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
                            'id'      => 'experience_price',
                            'type'    => 'number',
                            'width'   => '100%',
                            'title'   => esc_html__('Regular Price', 'gofly-core'),
                            'default' => 79,
                            'desc'    => wp_kses(__('Do not use any currency symbol here. To change your currency <a href="/wp-admin/admin.php?page=wc-settings#pricing_options-description" target="_blank">Click Here</a>', 'gofly-core'), wp_kses_allowed_html('post')),
                        ),
                        array(
                            'id'      => 'experience_price_sale_check',
                            'type'    => 'checkbox',
                            'title'   => esc_html__('Sale Price', 'gofly-core'),
                            'label'   => esc_html__('Need Discount Sale Price?', 'gofly-core'),
                            'default' => false,
                        ),
                        array(
                            'id'         => 'experience_price_sale',
                            'type'       => 'number',
                            'title'      => esc_html__('Discount Price', 'gofly-core'),
                            'default'    => 55,
                            'dependency' => array('experience_price_sale_check', '==', 'true'),
                        ),
                    ),
                    'default'   => array(
                        array(
                            'experience_pricing_package_title' => 'Costa Rica Zip-line',
                            'experience_pricing_package_desc'  => wp_kses_post('<p>An 11-night journey covering Bangkok <i class="bi bi-arrow-right"></i> River Kwai <i class="bi bi-arrow-right"></i> Chiang Rai <i class="bi bi-arrow-right"></i> Chiang Mai <i class="bi bi-arrow-right"></i> Phi Phi <i class="bi bi-arrow-right"></i> Phuket.</p>'),
                            'experience_pricing_package_typ'   => 'Group Activitiy',
                            'experience_price'                 => 79,
                        ),
                        array(
                            'experience_pricing_package_title' => 'Thailand Canopy',
                            'experience_pricing_package_desc'  => wp_kses_post('<p>An 11-night journey covering Bangkok <i class="bi bi-arrow-right"></i> River Kwai <i class="bi bi-arrow-right"></i> Chiang Rai <i class="bi bi-arrow-right"></i> Chiang Mai <i class="bi bi-arrow-right"></i> Phi Phi <i class="bi bi-arrow-right"></i> Phuket.</p>'),
                            'experience_pricing_package_typ'   => 'Private Activitiy',
                            'experience_price'                 => 85,
                        ),
                    ),
                ),

            ),
        ));

        // experience includes and excludes
        CSF::createSection(
            "EGNS_EXPERIENCE_META_ID",
            array(
                'parent' => 'experience_meta_option',
                'title'  => esc_html__('Experience & Inclusion Tooltip', 'gofly-core'),
                'fields' => array(
                    array(
                        'type'    => 'subheading',
                        'content' => esc_html__('Experience & Inclusion', 'gofly-core'),
                    ),
                    array(
                        'id'      => 'experience_tooltip_content',
                        'type'    => 'textarea',
                        'title'   => esc_html__('Experience', 'gofly-core'),
                        'desc'    => 'Add card tooltips content',
                        'default' => wp_kses_post('Including Activities <span>Scuba Diving, Zip-lining, Rafting &amp; Rock Climbing</span> with this premium package.'),
                    ),
                    array(
                        'id'      => 'inclusion_tooltip_content',
                        'type'    => 'textarea',
                        'title'   => esc_html__('Inclusion', 'gofly-core'),
                        'desc'    => 'Add card tooltips content',
                        'default' => wp_kses_post('This package covers <span>Accommodation, Daily Meals, Entry Fees &amp; Local Transfers</span> to ensure a worry-free trip.'),
                    ),

                ),
            )
        );
    }
});
