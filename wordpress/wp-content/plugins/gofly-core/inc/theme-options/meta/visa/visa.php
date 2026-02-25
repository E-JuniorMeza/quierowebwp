<?php
add_action('csf_loaded', function () {
    // Control core classes for avoid errors
    if (class_exists('CSF')) {

        // Create a metabox
        CSF::createMetabox("EGNS_VISA_META_ID", array(
            'id'              => 'visa_meta_option',
            'title'           => 'Visa Meta Informations',
            'post_type'       => 'visa',
            'context'         => 'normal',
            'priority'        => 'high',
            'show_restore'    => true,
            'enqueue_webfont' => true,
            'async_webfont'   => false,
            'output_css'      => false,
            'nav'             => 'normal',
            'theme'           => 'dark',
        ));


        // General Info
        CSF::createSection("EGNS_VISA_META_ID", array(
            'parent' => 'visa_meta_option',
            'title'  => 'General',
            'fields' => array(
                array(
                    'type'    => 'subheading',
                    'content' => 'General',
                ),
                array(
                    'id'      => 'visa_process_time',
                    'type'    => 'text',
                    'title'   => 'Process Time',
                    'default' => '(15 - 30) Days',
                ),
                array(
                    'id'      => 'visa_apply_form_shortcode',
                    'type'    => 'text',
                    'title'   => 'Online Application Form',
                    'default' => '[contact-form-7 title="Visa Application Form"]',
                ),
                array(
                    'id'      => 'visa_advertisement_btn',
                    'type'    => 'checkbox',
                    'title'   => 'Advertisement Iframe ?',
                    'label'   => 'Yes, Please do it.',
                    'default' => false
                ),
                array(
                    'id'         => 'visa_advertisement_img',
                    'type'       => 'media',
                    'title'      => 'Advertisement Image',
                    'dependency' => array('visa_advertisement_btn', '==', 'false'),
                ),
                array(
                    'id'       => 'visa_advertisement_code',
                    'type'     => 'code_editor',
                    'title'    => 'Iframe',
                    'settings' => array(
                        'theme' => 'dracula',
                    ),
                    'dependency' => array('visa_advertisement_btn', '==', 'true'),
                ),
            )
        ));

        // Visa Criterias
        CSF::createSection("EGNS_VISA_META_ID", array(
            'parent' => 'visa_meta_option',
            'title'  => 'Visa Criterias',
            'fields' => array(
                array(
                    'type'    => 'subheading',
                    'content' => esc_html__('Visa Criterias Tabs', 'gofly-core'),
                ),
                array(
                    'id'           => 'visa_criterias_lists',
                    'type'         => 'group',
                    'button_title' => esc_html__('Add Criteria', 'gofly-core'),
                    'fields'       => array(
                        array(
                            'id'      => 'visa_criterias_name',
                            'type'    => 'text',
                            'title'   => esc_html__('Criteria Name', 'gofly-core'),
                            'default' => esc_html__('Tourist Visa', 'gofly-core'),
                        ),
                        array(
                            'id'      => 'visa_criterias_icon',
                            'title'   => esc_html__('Icon', 'gofly-core'),
                            'type'    => 'media',
                            'class'   => 'egns_desc',
                            'default' => array(
                                'url'       => esc_url(EGNS_CORE_THEME_OPTIONS_IMAGES . '/icons/tourist.svg'),
                                'id'        => 'criterias_icon',
                                'thumbnail' => esc_url(EGNS_CORE_THEME_OPTIONS_IMAGES . '/icons/tourist.svg'),
                                'alt'       => esc_attr('icon'),
                                'title'     => esc_html('Icon'),
                            ),
                            'desc' => wp_kses(__('You can upload customize icon here', 'gofly-core'), wp_kses_allowed_html('post')),
                        ),
                        array(
                            'id'      => 'visa_applicant_type',
                            'type'    => 'radio',
                            'inline'  => true,
                            'title'   => esc_html__('Applicant Type', 'gofly-core'),
                            'options' => array(
                                'spouse' => 'Spouse',
                                'group'  => 'Group',
                                'single' => 'Per Person',
                            ),
                            'default' => 'single'
                        ),
                        array(
                            'id'         => 'visa_applicant_limit',
                            'type'       => 'number',
                            'title'      => esc_html__('Applicant limit', 'gofly-core'),
                            'default'    => 5,
                            'dependency' => array('visa_applicant_type', 'any', 'group,spouse'),
                        ),
                        array(
                            'id'      => 'visa_processing_price',
                            'type'    => 'number',
                            'title'   => 'Regular Price',
                            'default' => 8000,
                            'desc'    => wp_kses('Do not use any currency symbol here. To change your currency <a href="/wp-admin/admin.php?page=wc-settings#pricing_options-description" target="_blank">Click Here</a>', wp_kses_allowed_html('post')),
                        ),
                        array(
                            'id'      => 'visa_processing_price_sale_check',
                            'type'    => 'checkbox',
                            'title'   => 'Sale Price',
                            'label'   => 'Need discount price?',
                            'default' => false,
                        ),
                        array(
                            'id'         => 'visa_processing_price_sale',
                            'type'       => 'number',
                            'title'      => 'Discount amount',
                            'default'    => 7500,
                            'dependency' => array('visa_processing_price_sale_check', '==', 'true'),
                        ),
                        array(
                            'id'      => 'visa_entry_type',
                            'type'    => 'radio',
                            'title'   => 'Visa Entries',
                            'inline'  => true,
                            'options' => array(
                                'single'   => 'Single',
                                'double'   => 'Double',
                                'multiple' => 'Multiple',
                            ),
                            'default' => 'multiple',
                        ),
                        array(
                            'id'      => 'visa_validity_time',
                            'type'    => 'text',
                            'title'   => 'Visa Validity',
                            'default' => '90 Days',
                        ),
                        array(
                            'id'      => 'visa_exclusives',
                            'type'    => 'textarea',
                            'title'   => 'Exclusive',
                            'class'   => 'egns_desc',
                            'default' => 'Exclusive Offers – Access travel, dining, and shopping deals.',
                        ),
                        // Nested
                        array(
                            'id'           => 'visa_requirment_list',
                            'type'         => 'group',
                            'title'        => 'Requirment list',
                            'button_title' => esc_html__('Add Requirment', 'gofly-core'),
                            'fields'       => array(
                                array(
                                    'id'      => 'visa_requirment_title',
                                    'type'    => 'text',
                                    'title'   => 'Title',
                                    'default' => 'Documents Requirement',
                                ),
                                array(
                                    'id'      => 'visa_requirment_details',
                                    'type'    => 'wp_editor',
                                    'height'  => '100px',
                                    'title'   => 'Requirement details',
                                    'default' => 'Photocopies of Passport Bio-Data Page & past visas (if any).',
                                    'desc'    => 'Only use the "Editor list" when creating the default design.',
                                ),
                            ),
                            'default'   => array(
                                array(
                                    'visa_requirment_title'   => 'Documents Requirement',
                                    'visa_requirment_details' => 'Valid Passport (Minimum 6 months validity beyond your travel dates).',
                                ),
                            )
                        ),

                        // Note & Rejection 
                        array(
                            'type'    => 'subheading',
                            'content' => 'Rejection Reasons',
                        ),
                        array(
                            'id'      => 'visa_rejection_title',
                            'type'    => 'text',
                            'title'   => 'Title',
                            'default' => 'Visa Rejection Reasons',
                        ),
                        array(
                            'id'      => 'visa_rejection_details',
                            'type'    => 'wp_editor',
                            'title'   => 'Rejection details',
                            'height'  => '100px',
                            'default' => 'Lack of strong ties to home country.',
                            'desc'    => 'Only use the "Editor list" when creating the default design.',
                        ),
                        array(
                            'id'      => 'visa_rejection_image',
                            'type'    => 'media',
                            'title'   => 'Rejection Image',
                            'library' => 'image',
                            'default' => array(
                                'url'       => esc_url(EGNS_CORE_THEME_OPTIONS_IMAGES . '/others/visa-rejection-img.png'),
                                'id'        => 'reject_thumb',
                                'thumbnail' => esc_url(EGNS_CORE_THEME_OPTIONS_IMAGES . '/others/visa-rejection-img.png'),
                                'alt'       => esc_attr('thumb'),
                                'title'     => esc_html('Thumb'),
                            ),
                        ),
                        array(
                            'type'    => 'subheading',
                            'content' => 'Important Note',
                        ),
                        array(
                            'id'      => 'visa_note_title',
                            'type'    => 'text',
                            'title'   => 'Title',
                            'default' => 'Important Note',
                        ),
                        array(
                            'id'      => 'visa_note_details',
                            'type'    => 'wp_editor',
                            'title'   => 'Note details',
                            'height'  => '100px',
                            'default' => 'Not all applicants need to submit these additional documents.',
                            'desc'    => 'Only use the "Editor list" when creating the default design.',
                        ),

                    ),
                    'default'   => array(
                        array(
                            'visa_criterias_name' => 'Tourist Visa',
                            'visa_criterias_icon' => array(
                                'url'       => esc_url(EGNS_CORE_THEME_OPTIONS_IMAGES . '/icons/tourist.svg'),
                                'id'        => 'criterias_icon',
                                'thumbnail' => esc_url(EGNS_CORE_THEME_OPTIONS_IMAGES . '/icons/tourist.svg'),
                                'alt'       => esc_attr('icon'),
                                'title'     => esc_html('Icon'),
                            ),
                            'visa_applicant_type'   => 'single',
                            'visa_processing_price' => 8000,
                            'visa_entry_type'       => 'multiple',
                            'visa_process_time'     => '(15 - 30) Days',
                            'visa_validity_time'    => '90 Days',
                            'visa_exclusives'       => 'Exclusive Offers – Access travel, dining, and shopping deals.',
                            'visa_requirment_list'  => array(
                                array(
                                    'visa_requirment_title'   => 'Documents Requirement',
                                    'visa_requirment_details' => 'Valid Passport (Minimum 6 months validity beyond your travel dates).',
                                ),
                            ),
                            'visa_rejection_title'   => 'Visa Rejection Reasons',
                            'visa_rejection_details' => 'Insufficient financial proof.',
                            'visa_rejection_image'   => array(
                                'url'       => esc_url(EGNS_CORE_THEME_OPTIONS_IMAGES . '/others/visa-rejection-img.png'),
                                'id'        => 'reject_thumb',
                                'thumbnail' => esc_url(EGNS_CORE_THEME_OPTIONS_IMAGES . '/others/visa-rejection-img.png'),
                                'alt'       => esc_attr('thumb'),
                                'title'     => esc_html('Thumb'),
                            ),
                            'visa_note_title'   => 'Important Note',
                            'visa_note_details' => 'Not all applicants need to submit these additional documents.',
                        ),
                        array(
                            'visa_criterias_name' => 'Business Visa',
                            'visa_criterias_icon' => array(
                                'url'       => esc_url(EGNS_CORE_THEME_OPTIONS_IMAGES . '/icons/tourist.svg'),
                                'id'        => 'criterias_icon',
                                'thumbnail' => esc_url(EGNS_CORE_THEME_OPTIONS_IMAGES . '/icons/tourist.svg'),
                                'alt'       => esc_attr('icon'),
                                'title'     => esc_html('Icon'),
                            ),
                            'visa_applicant_type'   => 'single',
                            'visa_processing_price' => 10000,
                            'visa_entry_type'       => 'multiple',
                            'visa_process_time'     => '(15 - 30) Days',
                            'visa_validity_time'    => '90 Days',
                            'visa_exclusives'       => 'Exclusive Offers – Access travel, dining, and shopping deals.',
                            'visa_requirment_list'  => array(
                                array(
                                    'visa_requirment_title'   => 'Documents Requirement',
                                    'visa_requirment_details' => 'Valid Passport (Minimum 6 months validity beyond your travel dates).',
                                ),
                            ),
                            'visa_rejection_title'   => 'Visa Rejection Reasons',
                            'visa_rejection_details' => 'Insufficient financial proof.',
                            'visa_rejection_image'   => array(
                                'url'       => esc_url(EGNS_CORE_THEME_OPTIONS_IMAGES . '/others/visa-rejection-img.png'),
                                'id'        => 'reject_thumb',
                                'thumbnail' => esc_url(EGNS_CORE_THEME_OPTIONS_IMAGES . '/others/visa-rejection-img.png'),
                                'alt'       => esc_attr('thumb'),
                                'title'     => esc_html('Thumb'),
                            ),
                            'visa_note_title'   => 'Important Note',
                            'visa_note_details' => 'Not all applicants need to submit these additional documents.',
                        ),
                    ),
                ),
            )
        ));
    }
});
