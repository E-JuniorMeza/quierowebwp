<?php
add_action('csf_loaded', function () {

    if (class_exists('CSF')) {
        /*-----------------------------------
	    PAGE METABOX SECTION
	   ------------------------------------*/
        CSF::createMetabox("EGNS_TOUR_META_ID", array(
            'id'              => 'tour_meta_option',
            'title'           => esc_html__('Tour Custom Informations', 'gofly-core'),
            'post_type'       => 'tour',
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
        CSF::createSection("EGNS_TOUR_META_ID", array(
            'parent' => 'tour_meta_option',
            'title'  => esc_html__('General', 'gofly-core'),
            'fields' => array(
                array(
                    'type'    => 'subheading',
                    'content' => esc_html__('General Information', 'gofly-core'),
                ),
                array(
                    'id'    => 'tour_feature_image_gallery',
                    'type'  => 'gallery',
                    'title' => esc_html__('Featured Image Gallery', 'gofly-core'),
                ),
                array(
                    'id'      => 'tour_feature_video_source',
                    'type'    => 'radio',
                    'title'   => esc_html__('Featured Video Source', 'gofly-core'),
                    'options' => array(
                        'url'    => 'URL',
                        'upload' => 'Upload',
                    ),
                    'inline'  => true,
                    'default' => 'url',
                ),
                array(
                    'id'         => 'tour_feature_video_uplaod',
                    'type'       => 'media',
                    'title'      => esc_html__('Upload Video', 'gofly-core'),
                    'library'    => 'video',
                    'dependency' => array('tour_feature_video_source', '==', 'upload')
                ),
                array(
                    'id'          => 'tour_feature_video_link',
                    'type'        => 'text',
                    'title'       => esc_html__('Video Link', 'gofly-core'),
                    'placeholder' => 'http://www.example.com/uploads/home1-banner-video.mp4',
                    'dependency'  => array('tour_feature_video_source', '==', 'url')
                ),
                array(
                    'id'          => 'tour_destination_select',
                    'type'        => 'select',
                    'title'       => esc_html__('Select Tour Destination', 'gofly-core'),
                    'placeholder' => esc_html__('Select Tour Destination', 'gofly-core'),
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
                    'id'          => 'tour_experience_select',
                    'type'        => 'select',
                    'title'       => esc_html__('Select Tour Experience', 'gofly-core'),
                    'placeholder' => esc_html__('Select Tour Experience', 'gofly-core'),
                    'chosen'      => true,
                    'chosen'      => true,
                    'multiple'    => true,
                    'options'     => 'posts',
                    'query_args'  => array(
                        'post_type' => 'experience'
                    ),
                    'width' => '100%',
                ),
                array(
                    'id'      => 'tour_experience_tip',
                    'type'    => 'textarea',
                    'title'   => esc_html__('Experience Tip', 'gofly-core'),
                    'default' => wp_kses_post('Including Activities <span>Scuba Diving, Zip-lining, Rafting &amp; Rock Climbing</span> with this premium package.'),
                ),
                array(
                    'id'      => 'tour_inclusion_tip',
                    'type'    => 'textarea',
                    'title'   => esc_html__('Inclusion Tip', 'gofly-core'),
                    'default' => wp_kses_post('This package covers <span>Accommodation, Daily Meals, Entry Fees &amp; Local Transfers</span> to ensure a worry-free trip.'),
                ),
                array(
                    'id'      => 'tour_package_info_list',
                    'type'    => 'textarea',
                    'title'   => esc_html__('Package Info', 'gofly-core'),
                    'default' => 'Crystal-Clear Waters Luxury Overwater Villas Dolphin Watching',
                    'desc'    => 'Press "Enter" to continue on a new line.',
                ),
            )
        ));

        // tour pricing
        CSF::createSection("EGNS_TOUR_META_ID", array(
            'parent' => 'tour_pricing_meta_option',
            'title'  => esc_html__('Trip Pack Price', 'gofly-core'),
            'fields' => array(
                array(
                    'type'    => 'subheading',
                    'content' => esc_html__('Pricing Section', 'gofly-core'),
                ),

                // Trip Duration 
                array(
                    'id'      => 'tour_price_type',
                    'type'    => 'radio',
                    'title'   => esc_html__('Pricing Type', 'gofly-core'),
                    'inline'  => true,
                    'options' => array(
                        'per_person' => esc_html__('Per Person', 'gofly-core'),
                        'per_group'  => esc_html__('Per Group', 'gofly-core'),
                    ),
                    'default' => 'per_person',
                ),
                array(
                    'id'      => 'tour_duration_day',
                    'type'    => 'text',
                    'title'   => 'Duration (Days)',
                    'default' => '5 Days',
                ),
                array(
                    'id'      => 'tour_duration_night',
                    'type'    => 'text',
                    'title'   => 'Duration (Nights)',
                    'default' => '6 Nights',
                ),

                // Travelers 
                array(
                    'id'      => 'tour_traveler_min',
                    'type'    => 'number',
                    'title'   => 'Minimum Travelers',
                    'default' => 5,
                    'desc'    => 'Minimum number of people allowed on the trip',
                ),
                array(
                    'id'      => 'tour_traveler_max',
                    'type'    => 'number',
                    'title'   => 'Maximum Travelers',
                    'default' => 20,
                    'desc'    => 'Maximum number of people allowed on the trip',
                ),

                // Cancellation Time 
                array(
                    'id'      => 'tour_cancellation_enable',
                    'type'    => 'switcher',
                    'title'   => 'Enable Cancellation Time',
                    'desc'    => 'Free cancellation available until the tour start date.',
                    'default' => false,
                ),
                array(
                    'id'         => 'tour_cancellation_time',
                    'type'       => 'text',
                    'title'      => 'Cancellation Time',
                    'default'    => 'Cancel before 7:00 AM on September 30, 2025 for a full refund',
                    'desc'       => 'Cancellation Warning*',
                    'dependency' => array('tour_cancellation_enable', '==', 'true'),
                ),

                // Group Flied 
                array(
                    'type'    => 'subheading',
                    'content' => esc_html__('Trip Package list', 'gofly-core'),
                ),

                array(
                    'id'                     => 'tour_pricing_package',
                    'type'                   => 'group',
                    'button_title'           => 'Add Package',
                    'accordion_title_number' => true,
                    'fields'                 => array(
                        array(
                            'id'      => 'tour_pricing_package_title',
                            'type'    => 'text',
                            'title'   => esc_html__('Title', 'gofly-core'),
                            'default' => esc_html__('Thailand with Phi Phi Islands.', 'gofly-core'),
                        ),
                        array(
                            'id'      => 'tour_pricing_package_type',
                            'type'    => 'text',
                            'title'   => esc_html__('Package Type', 'gofly-core'),
                            'default' => esc_html__('Private Tour', 'gofly-core'),
                        ),
                        array(
                            'id'        => 'tour_booking_date',
                            'type'      => 'datetime',
                            'title'     => esc_html__('Booking Date', 'gofly-core'),
                            'subtitle'  => esc_html__('Booking date with "Begin" and "End" tour.', 'gofly-core'),
                            'from_to'   => true,
                            'text_from' => esc_html__('Start Date*', 'gofly-core'),
                            'text_to'   => esc_html__('End Date', 'gofly-core'),
                            'settings'  => array(
                                'minDate' => 'today',
                            )
                        ),
                        array(
                            'id'    => 'trip_price_table',
                            'type'  => 'pricing_table',
                            'title' => esc_html__('Trip Price Table', 'gofly-core'),
                        ),
                        array(
                            'id'            => 'tour_pricing_package_desc',
                            'type'          => 'wp_editor',
                            'title'         => esc_html__('Description', 'gofly-core'),
                            'tinymce'       => true,
                            'quicktags'     => true,
                            'media_buttons' => true,
                            'height'        => '100px',
                            'default'       => wp_kses_post('<p>An 11-night journey covering Bangkok <i class="bi bi-arrow-right"></i>
                                                River Kwai <i class="bi bi-arrow-right"></i> Chiang Rai <i class="bi bi-arrow-right"></i> Chiang Mai <i class="bi bi-arrow-right"></i> Phi Phi <i class="bi bi-arrow-right"></i> Phuket.</p>'),
                        ),
                    ),
                    'default'   => array(
                        array(
                            'tour_pricing_package_title' => 'Thailand with Phi Phi Islands.',
                            'tour_pricing_package_type'  => 'Private Tour',
                            'tour_pricing_package_desc'  => wp_kses_post('<p>An 11-night journey covering Bangkok <i class="bi bi-arrow-right"></i>
                                                River Kwai <i class="bi bi-arrow-right"></i> Chiang Rai <i class="bi bi-arrow-right"></i> Chiang Mai <i class="bi bi-arrow-right"></i> Phi Phi <i class="bi bi-arrow-right"></i> Phuket.</p>'),
                        ),
                        array(
                            'tour_pricing_package_title' => 'Jordan Classic Tour.',
                            'tour_pricing_package_type'  => 'Family Tour',
                            'tour_pricing_package_desc'  => wp_kses_post('<p>An 11-night journey covering Bangkok <i class="bi bi-arrow-right"></i>
                                                River Kwai <i class="bi bi-arrow-right"></i> Chiang Rai <i class="bi bi-arrow-right"></i> Chiang Mai <i class="bi bi-arrow-right"></i> Phi Phi <i class="bi bi-arrow-right"></i> Phuket.</p>'),
                        ),
                        array(
                            'tour_pricing_package_title' => 'Maldives Group Island Hopping Tour.',
                            'tour_pricing_package_type'  => 'Group Tour',
                            'tour_pricing_package_desc'  => wp_kses_post('<p>An 11-night journey covering Bangkok <i class="bi bi-arrow-right"></i>
                                                River Kwai <i class="bi bi-arrow-right"></i> Chiang Rai <i class="bi bi-arrow-right"></i> Chiang Mai <i class="bi bi-arrow-right"></i> Phi Phi <i class="bi bi-arrow-right"></i> Phuket.</p>'),
                        ),
                    ),
                ),

            ),
        ));

        // tour itinerary
        CSF::createSection("EGNS_TOUR_META_ID", array(
            'parent' => 'tour_meta_option',
            'title'  => esc_html__('Trip Travel Route', 'gofly-core'),
            'fields' => array(
                array(
                    'type'    => 'subheading',
                    'content' => esc_html__('ITINERARY', 'gofly-core'),
                ),
                array(
                    'id'      => 'tour_itinerary_title',
                    'type'    => 'text',
                    'title'   => esc_html__('Title', 'gofly-core'),
                    'default' => 'Tour Itinerary',
                ),
                array(
                    'id'      => 'tour_itinerary_expand_btn',
                    'type'    => 'checkbox',
                    'title'   => esc_html__('Expand Button ?', 'gofly-core'),
                    'label'   => esc_html__('Yes, Please do it.', 'gofly-core'),
                    'default' => true,
                ),
                array(
                    'id'                     => 'tour_itinerary_group',
                    'type'                   => 'group',
                    'button_title'           => esc_html__('Add Itinerary Item', 'gofly-core'),
                    'accordion_title_number' => true,
                    'fields'                 => array(
                        array(
                            'id'      => 'tour_itinerary_location_name',
                            'type'    => 'text',
                            'class'   => 'egns_txt',
                            'title'   => esc_html__('Name with deaprture', 'gofly-core'),
                            'default' => wp_kses_post('Paris, France <span>( Deaprture: <strong>8:00 am - 8:30am</strong> )</span>'),
                        ),
                        array(
                            'id'      => 'tour_itinerary_location_icon',
                            'type'    => 'media',
                            'title'   => esc_html__('Location Icon', 'gofly-core'),
                            'default' => array(
                                'url'       => esc_url(EGNS_CORE_THEME_OPTIONS_IMAGES . '/icons/location-icon.svg'),
                                'id'        => 'itinerary_location_icon',
                                'thumbnail' => esc_url(EGNS_CORE_THEME_OPTIONS_IMAGES . '/icons/location-icon.svg'),
                                'alt'       => esc_attr('icon'),
                                'title'     => esc_html('Icon'),
                            ),
                        ),
                        // Nested Group 
                        array(
                            'id'           => 'tour_itinerary_steps',
                            'type'         => 'group',
                            'title'        => esc_html__('Steps list', 'gofly-core'),
                            'button_title' => esc_html__('Add Step', 'gofly-core'),
                            'fields'       => array(
                                array(
                                    'id'      => 'itinerary_step_label',
                                    'type'    => 'text',
                                    'class'   => 'egns_txt',
                                    'title'   => esc_html__('Label', 'gofly-core'),
                                    'default' => esc_html__('Day-01 &nbsp;&nbsp; Eiffel Tower – The symbol of France', 'gofly-core'),
                                ),
                                array(
                                    'id'      => 'itinerary_content',
                                    'type'    => 'wp_editor',
                                    'title'   => esc_html__('Content', 'gofly-core'),
                                    'default' => esc_html__('The Eiffel Tower is the heart of Paris and offers a variety of exciting activities for visitors. As like, climb the Eiffel Tower, take the elevator to the summit, sunset & night view, picnic at champ de mars & bike tour around the Eiffel Tower.', 'gofly-core'),
                                ),
                                // Nested nested Group 
                                array(
                                    'id'           => 'tour_itinerary_steps_facility',
                                    'type'         => 'group',
                                    'title'        => esc_html__('Facilities', 'gofly-core'),
                                    'button_title' => esc_html__('Add Facilities', 'gofly-core'),
                                    'fields'       => array(
                                        array(
                                            'id'      => 'tour_itinerary_steps_facility_label',
                                            'type'    => 'text',
                                            'class'   => 'egns_txt',
                                            'title'   => esc_html__('Label', 'gofly-core'),
                                            'default' => esc_html__('Transport', 'gofly-core'),
                                        ),
                                        array(
                                            'id'      => 'tour_itinerary_steps_facility_icon',
                                            'type'    => 'media',
                                            'title'   => esc_html__('Icon', 'gofly-core'),
                                            'default' => array(
                                                'url'       => esc_url(EGNS_CORE_THEME_OPTIONS_IMAGES . '/icons/transport.svg'),
                                                'id'        => 'steps_facility_icon',
                                                'thumbnail' => esc_url(EGNS_CORE_THEME_OPTIONS_IMAGES . '/icons/transport.svg'),
                                                'alt'       => esc_attr('icon'),
                                                'title'     => esc_html('Icon'),
                                            ),
                                        ),
                                        array(
                                            'id'      => 'tour_itinerary_steps_facility_content',
                                            'type'    => 'text',
                                            'class'   => 'egns_txt',
                                            'title'   => esc_html__('Content', 'gofly-core'),
                                            'default' => esc_html__('Car, Flight, Boat', 'gofly-core'),
                                        ),
                                        array(
                                            'id'      => 'tour_itinerary_steps_facility_btn',
                                            'type'    => 'link',
                                            'title'   => esc_html__('Button label with link', 'gofly-core'),
                                            'default' => array(
                                                'url'    => 'http://example.com/',
                                                'text'   => 'View Hotel',
                                                'target' => '_blank'
                                            ),
                                        ),

                                    ),
                                ),
                            ),
                        ),
                    ),
                    'default'   => array(
                        array(
                            'tour_itinerary_location_name' => wp_kses_post('Paris, France <span>( Deaprture: <strong>8:00 am - 8:30am</strong> )</span>'),
                            'tour_itinerary_steps'         => array(
                                array(
                                    'itinerary_step_label'          => 'Day-01 &nbsp;&nbsp; Eiffel Tower – The symbol of France',
                                    'itinerary_content'             => 'The Eiffel Tower is the heart of Paris and offers a variety of exciting activities for visitors. As like, climb the Eiffel Tower, take the elevator to the summit, sunset & night view, picnic at champ de mars & bike tour around the Eiffel Tower.',
                                    'tour_itinerary_steps_facility' => array(
                                        array(
                                            'tour_itinerary_steps_facility_label'   => 'Transport',
                                            'tour_itinerary_steps_facility_content' => 'Car, Flight, Boat',
                                            'tour_itinerary_steps_facility_btn'     => array(
                                                'url'    => 'http://example.com/',
                                                'text'   => 'View Hotel',
                                                'target' => '_blank'
                                            ),
                                        ),
                                    ),
                                ),
                            ),
                        ),
                    ),



                ),
            ),
        ));

        // tour sub-locations
        CSF::createSection("EGNS_TOUR_META_ID", array(
            'parent' => 'tour_meta_option',
            'title'  => esc_html__('Destination Location', 'gofly-core'),
            'fields' => array(
                array(
                    'type'    => 'subheading',
                    'content' => esc_html__('Destination under sub-location', 'gofly-core'),
                ),
                // Location group loop
                array(
                    'id'                     => 'tour_sub_location_list',
                    'type'                   => 'group',
                    'button_title'           => 'Add Location',
                    'accordion_title_number' => true,
                    'fields'                 => array(
                        array(
                            'id'      => 'tour_sub_location_name',
                            'type'    => 'text',
                            'title'   => esc_html__('Location Name', 'gofly-core'),
                            'default' => 'Eiffel Tower, France',
                        ),
                        array(
                            'id'      => 'tour_sub_location_duration',
                            'type'    => 'text',
                            'title'   => esc_html__('Spend Duration', 'gofly-core'),
                            'default' => '02 Days',
                        ),
                        array(
                            'id'    => 'tour_sub_location_img',
                            'type'  => 'media',
                            'class' => 'egns_desc',
                            'title' => esc_html__('Location Image', 'gofly-core'),
                        ),
                        // Activities
                        array(
                            'type'    => 'subheading',
                            'content' => esc_html__('Tour Activities Per Day', 'gofly-core'),
                        ),
                        // Nested loop group
                        array(
                            'id'           => 'tour_sngl_activity_list',
                            'type'         => 'group',
                            'button_title' => 'Add Activities',
                            'fields'       => array(
                                array(
                                    'id'      => 'tour_sngl_duration_lbl',
                                    'type'    => 'text',
                                    'title'   => esc_html__('Duration label', 'gofly-core'),
                                    'default' => 'Day-01',
                                ),
                                array(
                                    'id'          => 'tour_destination_location_select',
                                    'type'        => 'select',
                                    'title'       => esc_html__('Select Destination Location', 'gofly-core'),
                                    'placeholder' => esc_html__('Select Tour Locations', 'gofly-core'),
                                    'chosen'      => true,
                                    'multiple'    => true,
                                    'options'     => 'categories',
                                    'query_args'  => array(
                                        'taxonomy' => 'destination-location',
                                        'value'    => 'slug',
                                    ),
                                    'width' => '100%',
                                    'desc'  => wp_kses_post('Easily add new location or edit content—just <a href="/wp-admin/edit-tags.php?taxonomy=destination-location&post_type=destination" target="_blank">click here</a>.'),
                                ),
                            ),
                            'default'   => array(
                                array(
                                    'tour_sngl_duration_lbl' => 'Day-01',
                                ),
                            ),
                        ),
                        // Accommodation 
                        array(
                            'type'    => 'subheading',
                            'content' => esc_html__('Accommodation', 'gofly-core'),
                        ),
                        array(
                            'id'      => 'tour_sub_location_accommodation_opt',
                            'type'    => 'checkbox',
                            'title'   => esc_html__('Select From Hotel', 'gofly-core'),
                            'label'   => 'Yes, Please do it.',
                            'default' => false,
                        ),
                        // dynamic data 
                        array(
                            'id'          => 'tour_accommodation_hotel_select',
                            'type'        => 'select',
                            'title'       => esc_html__('Accommodation Hotel', 'gofly-core'),
                            'placeholder' => esc_html__('choose hotel', 'gofly-core'),
                            'options'     => 'posts',
                            'chosen'      => true,
                            'query_args'  => array(
                                'post_type'      => 'hotel',
                                'posts_per_page' => -1,
                            ),
                            'settings' => array(
                                'width' => '250px',
                            ),
                            'dependency' => array('tour_sub_location_accommodation_opt', '==', 'true'),
                        ),
                        // Manual data 
                        array(
                            'id'         => 'tour_sub_location_accommodation_img',
                            'type'       => 'media',
                            'class'      => 'egns_desc',
                            'title'      => esc_html__('Thumbnail', 'gofly-core'),
                            'dependency' => array('tour_sub_location_accommodation_opt', '==', 'false'),

                        ),
                        array(
                            'id'         => 'tour_sub_location_accommodation_title',
                            'type'       => 'text',
                            'title'      => esc_html__('Title', 'gofly-core'),
                            'default'    => 'Rajnonikanto Hotel, San Diego',
                            'dependency' => array('tour_sub_location_accommodation_opt', '==', 'false'),
                        ),
                        array(
                            'id'      => 'tour_sub_location_accommodation_loc',
                            'type'    => 'link',
                            'title'   => esc_html__('Location with link', 'gofly-core'),
                            'default' => array(
                                'url'    => 'https://www.google.com/maps',
                                'text'   => 'San Fransico',
                                'target' => '_blank'
                            ),
                            'dependency' => array('tour_sub_location_accommodation_opt', '==', 'false'),
                        ),
                        array(
                            'id'         => 'tour_sub_location_accommodation_desc',
                            'type'       => 'wp_editor',
                            'title'      => esc_html__('Description', 'gofly-core'),
                            'default'    => "Whether you're visiting Paris for a romantic getaway, an adventure, or a luxury vacation, finding the right accommodation with excellent facilities enhances your experience.",
                            'dependency' => array('tour_sub_location_accommodation_opt', '==', 'false'),
                        ),
                        array(
                            'id'         => 'tour_sub_location_accommodation_feature',
                            'type'       => 'textarea',
                            'title'      => esc_html__('Feature', 'gofly-core'),
                            'default'    => 'Comfortable & Stylish Rooms.',
                            'desc'       => esc_html__('Press "Enter" to continue on a new line.', 'gofly-core'),
                            'dependency' => array('tour_sub_location_accommodation_opt', '==', 'false'),
                        ),
                        // Transport
                        array(
                            'type'    => 'subheading',
                            'content' => esc_html__('Transport', 'gofly-core'),
                        ),
                        array(
                            'id'      => 'tour_sub_location_transport_title',
                            'type'    => 'text',
                            'title'   => esc_html__('Title', 'gofly-core'),
                            'default' => 'Public Transport in Paris :',
                        ),
                        array(
                            'id'      => 'tour_sub_location_transport_list',
                            'type'    => 'textarea',
                            'class'   => 'egns_desc',
                            'title'   => esc_html__('Feature', 'gofly-core'),
                            'default' => wp_kses_post('<strong>Paris Metro</strong> (Subway)'),
                            'desc'    => esc_html__('Press "Enter" to continue on a new line.', 'gofly-core'),
                        ),
                        array(
                            'id'      => 'tour_sub_location_transport_facilities_title',
                            'type'    => 'text',
                            'title'   => esc_html__('Traveler Facilities Title', 'gofly-core'),
                            'default' => 'Facilities for Traveler-',
                        ),
                        array(
                            'id'      => 'tour_sub_location_transport_facilities_list',
                            'type'    => 'textarea',
                            'class'   => 'egns_desc',
                            'title'   => esc_html__('Traveler Facilities list', 'gofly-core'),
                            'default' => 'Fast & budget-friendly way to travel.',
                            'desc'    => esc_html__('Press "Enter" to continue on a new line.', 'gofly-core'),
                        ),
                    ),
                    'default'   => array(
                        array(
                            'tour_sub_location_name'                => 'Eiffel Tower, France',
                            'tour_sub_location_duration'            => '02 Days',
                            'tour_sub_location_accommodation_title' => 'Rajnonikanto Hotel, San Diego',
                            'tour_sub_location_accommodation_loc'   => array(
                                'url'    => 'https://www.google.com/maps',
                                'text'   => 'San Fransico',
                                'target' => '_blank'
                            ),
                            'tour_sub_location_accommodation_desc'         => "Whether you're visiting Paris for a romantic getaway, an adventure, or a luxury vacation, finding the right accommodation with excellent facilities enhances your experience.",
                            'tour_sub_location_accommodation_feature'      => 'Comfortable & Stylish Rooms.',
                            'tour_sub_location_transport_title'            => 'Public Transport in Paris :',
                            'tour_sub_location_transport_list'             => wp_kses_post('<strong>Paris Metro</strong> (Subway)'),
                            'tour_sub_location_transport_facilities_title' => 'Facilities for Traveler-',
                            'tour_sub_location_transport_facilities_list'  => 'Fast & budget-friendly way to travel.',
                            'tour_sngl_activity_list'                      => array(
                                array(
                                    'tour_sngl_duration_lbl' => 'Day-01',
                                ),
                            ),
                        ),
                    ),
                ),


            ),
        ));

        // tour Location Map
        CSF::createSection("EGNS_TOUR_META_ID", array(
            'parent' => 'tour_meta_option',
            'title'  => esc_html__('Destination Location Map', 'gofly-core'),
            'fields' => array(
                array(
                    'type'    => 'subheading',
                    'content' => esc_html__('Map Location', 'gofly-core'),
                ),
                array(
                    'id'      => 'tour_location_enable_disable_option',
                    'title'   => esc_html__('Enable', 'gofly-core'),
                    'type'    => 'switcher',
                    'desc'    => esc_html__('You can set to ON/OFF view map from card', 'gofly-core'),
                    'default' => true,
                ),
                array(
                    'id'       => 'tour_iframe_code',
                    'type'     => 'code_editor',
                    'title'    => esc_html__('Map iframe code', 'gofly-core'),
                    'default'  => '<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d193325.0481540361!2d-74.06757856146028!3d40.79052383652264!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x89c24fa5d33f083b%3A0xc80b8f06e177fe62!2sNew%20York%2C%20NY%2C%20USA!5e0!3m2!1sen!2sbd!4v1660366711448!5m2!1sen!2sbd" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>',
                    'sanitize' => false,
                    'settings' => array(
                        'lineWrapping' => true,
                    ),
                    'dependency' => array('tour_location_enable_disable_option', '==', 'true'),
                    'desc'       => esc_html__('"This iframe map only belongs to card."', 'gofly-core'),
                ),
            ),
        ));
    }
});
