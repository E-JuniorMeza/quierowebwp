<?php
CSF::createSection($prefix, array(
    'parent' => 'header_options',
    'title'  => esc_html__('Header Options', 'gofly-core'),
    'id'     => 'theme_header_style_options',
    'icon'   => 'fab fa-algolia',
    'fields' => array(
        array(
            'type'    => 'subheading',
            'content' => '<h3>' . esc_html__('Look Header Layout', 'gofly-core') . '</h3>'
        ),
        array(
            'id'      => 'header_menu_style',
            'type'    => 'image_select',
            'class'   => 'egns_header_select',
            'options' => array(
                'header_one'   => esc_url(EGNS_CORE_THEME_OPTIONS_IMAGES . '/header/header-one.png'),
                'header_two'   => esc_url(EGNS_CORE_THEME_OPTIONS_IMAGES . '/header/header-two.png'),
                'header_three' => esc_url(EGNS_CORE_THEME_OPTIONS_IMAGES . '/header/header-three.png'),
                'header_four'  => esc_url(EGNS_CORE_THEME_OPTIONS_IMAGES . '/header/header-four.png'),
                'header_five'  => esc_url(EGNS_CORE_THEME_OPTIONS_IMAGES . '/header/header-five.png'),
                'header_six'   => esc_url(EGNS_CORE_THEME_OPTIONS_IMAGES . '/header/header-six.png'),
                'header_seven' => esc_url(EGNS_CORE_THEME_OPTIONS_IMAGES . '/header/header-seven.png'),
                'header_eight' => esc_url(EGNS_CORE_THEME_OPTIONS_IMAGES . '/header/header-eight.png'),
            ),
            'default' => 'header_one',
        ),

        /*************** Header One content ***************/
        array(
            'type'       => 'subheading',
            'content'    => '<h4>' . esc_html__('Header One Content', 'gofly-core') . '</h4>',
            'dependency' => array('header_menu_style', '==', 'header_one')
        ),
        array(
            'id'         => 'header_one_contact_lists',
            'type'       => 'repeater',
            'title'      => esc_html__('Contact list', 'gofly-core'),
            'dependency' => array('header_menu_style', '==', 'header_one'),
            'fields'     => array(
                array(
                    'id'      => 'header_info_icon',
                    'title'   => esc_html__('Icon', 'gofly-core'),
                    'type'    => 'media',
                    'default' => array(
                        'url'       => esc_url(EGNS_CORE_THEME_OPTIONS_IMAGES . '/icons/whatsapp-icon.svg'),
                        'id'        => 'icon_list',
                        'thumbnail' => esc_url(EGNS_CORE_THEME_OPTIONS_IMAGES . '/icons/whatsapp-icon.svg'),
                        'alt'       => esc_attr('icon'),
                        'title'     => esc_html('Icon'),
                    ),
                ),
                array(
                    'id'      => 'header_info_label',
                    'type'    => 'text',
                    'title'   => esc_html__('Label', 'gofly-core'),
                    'default' => esc_html__('WhatsApp', 'gofly-core'),
                ),
                array(
                    'id'           => 'header_info_link',
                    'type'         => 'link',
                    'title'        => esc_html__('Add Text & Link', 'gofly-core'),
                    'add_title'    => esc_html__('Add Content', 'gofly-core'),
                    'edit_title'   => esc_html__('Edit Content', 'gofly-core'),
                    'remove_title' => esc_html__('Remove Content', 'gofly-core'),
                    'default'      => array(
                        'url'  => 'wa.me/91345533865',
                        'text' => '+91 345 533 865',
                    ),
                ),
            ),
            'default'   => array(
                array(
                    'header_info_icon' => array(
                        'url'       => esc_url(EGNS_CORE_THEME_OPTIONS_IMAGES . '/icons/whatsapp-icon.svg'),
                        'id'        => 'icon_list',
                        'thumbnail' => esc_url(EGNS_CORE_THEME_OPTIONS_IMAGES . '/icons/whatsapp-icon.svg'),
                        'alt'       => esc_attr('icon'),
                        'title'     => esc_html('Icon'),
                    ),
                    'header_info_label' => 'WhatsApp',
                    'header_info_link'  => array(
                        'url'    => 'wa.me/91345533865',
                        'text'   => '+91 345 533 865',
                        'target' => '_blank'
                    ),

                ),
                array(
                    'header_info_icon' => array(
                        'url'       => esc_url(EGNS_CORE_THEME_OPTIONS_IMAGES . '/icons/mail-icon.svg'),
                        'id'        => 'icon_list',
                        'thumbnail' => esc_url(EGNS_CORE_THEME_OPTIONS_IMAGES . '/icons/mail-icon.svg'),
                        'alt'       => esc_attr('icon'),
                        'title'     => esc_html('Icon'),
                    ),
                    'header_info_label' => 'Mail Support',
                    'header_info_link'  => array(
                        'url'    => 'mailto:info@example.com',
                        'text'   => 'info@example.com',
                        'target' => '_blank'
                    ),
                ),
                array(
                    'header_info_icon' => array(
                        'url'       => esc_url(EGNS_CORE_THEME_OPTIONS_IMAGES . '/icons/live-chat.svg'),
                        'id'        => 'icon_list',
                        'thumbnail' => esc_url(EGNS_CORE_THEME_OPTIONS_IMAGES . '/icons/live-chat.svg'),
                        'alt'       => esc_attr('icon'),
                        'title'     => esc_html('Icon'),
                    ),
                    'header_info_label' => 'More Inquery',
                    'header_info_link'  => array(
                        'url'    => 'wa.me/91345533865',
                        'text'   => '+91 345 533 865',
                        'target' => '_blank'
                    ),
                ),
            )
        ),
        array(
            'type'       => 'subheading',
            'content'    => '<h4>' . esc_html__('Support And Language Area', 'gofly-core') . '</h4>',
            'dependency' => array('header_menu_style', '==', 'header_one')
        ),
        array(
            'id'           => 'header_support_button_link_and_text',
            'type'         => 'link',
            'title'        => esc_html__('Support Text & Link', 'gofly-core'),
            'add_title'    => esc_html__('Add Content', 'gofly-core'),
            'edit_title'   => esc_html__('Edit Content', 'gofly-core'),
            'remove_title' => esc_html__('Remove Content', 'gofly-core'),
            'default'      => array(
                'url'  => '#',
                'text' => 'Need Help?',
            ),
            'dependency' => array('header_menu_style', '==', 'header_one'),
        ),
        array(
            'id'         => 'header_language_enable',
            'title'      => esc_html__('Language switcher', 'gofly-core'),
            'type'       => 'switcher',
            'desc'       => wp_kses(__('you can set <mark>Yes / No</mark> to enable/disable Language switcher', 'gofly-core'),  wp_kses_allowed_html('post')),
            'default'    => true,
            'dependency' => array('header_menu_style', '==', 'header_one'),
        ),
        array(
            'id'         => 'header_language_shortcode',
            'type'       => 'text',
            'title'      => esc_html__('Add language shortcode', 'gofly-core'),
            'default'    => '[language]',
            'dependency' => array(
                array('header_language_enable', '==', 'true'),
                array('header_menu_style', '==', 'header_one'),
            ),
        ),
        array(
            'id'         => 'header_login_switcher',
            'type'       => 'switcher',
            'title'      => esc_html__('Login Button', 'gofly-core'),
            'label'      => esc_html__('Do you want activate it ?', 'gofly-core'),
            'default'    => true,
            'dependency' => array('header_menu_style', '==', 'header_one'),
        ),

        /*************** End Header One content ***************/


        /*************** End Header Two content ***************/
        array(
            'type'       => 'subheading',
            'content'    => '<h4>' . esc_html__('Header Two Content', 'gofly-core') . '</h4>',
            'dependency' => array('header_menu_style', '==', 'header_two')
        ),

        array(
            'id'      => 'header_two_info_icon',
            'title'   => esc_html__('Icon', 'gofly-core'),
            'type'    => 'media',
            'default' => array(
                'url'       => esc_url(EGNS_CORE_THEME_OPTIONS_IMAGES . '/icons/phone-contact-icon.svg'),
                'id'        => 'icon_list',
                'thumbnail' => esc_url(EGNS_CORE_THEME_OPTIONS_IMAGES . '/icons/phone-contact-icon.svg'),
                'alt'       => esc_attr('icon'),
                'title'     => esc_html('Icon'),
            ),
            'dependency' => array('header_menu_style', '==', 'header_two')
        ),
        array(
            'id'         => 'header_two_info_label',
            'type'       => 'text',
            'title'      => esc_html__('Label', 'gofly-core'),
            'default'    => esc_html__('Need Help?', 'gofly-core'),
            'dependency' => array('header_menu_style', '==', 'header_two')
        ),
        array(
            'id'           => 'header_two_info_link',
            'type'         => 'link',
            'title'        => esc_html__('Contact Text & Link', 'gofly-core'),
            'add_title'    => esc_html__('Add Content', 'gofly-core'),
            'edit_title'   => esc_html__('Edit Content', 'gofly-core'),
            'remove_title' => esc_html__('Remove Content', 'gofly-core'),
            'default'      => array(
                'url'  => 'tel:91345533865',
                'text' => '+91 345 533 865',
            ),
            'dependency' => array('header_menu_style', '==', 'header_two')
        ),

        array(
            'id'         => 'header_two_login_switcher',
            'type'       => 'switcher',
            'title'      => esc_html__('Login Button', 'gofly-core'),
            'label'      => esc_html__('Do you want activate it ?', 'gofly-core'),
            'default'    => true,
            'dependency' => array('header_menu_style', '==', 'header_two'),
        ),

        /*************** End Header Two content ***************/


        /*************** Header three content ***************/
        array(
            'type'       => 'subheading',
            'content'    => '<h4>' . esc_html__('Header Three Content', 'gofly-core') . '</h4>',
            'dependency' => array('header_menu_style', '==', 'header_three')
        ),

        array(
            'id'      => 'header_three_info_icon',
            'title'   => esc_html__('Icon', 'gofly-core'),
            'type'    => 'media',
            'default' => array(
                'url'       => esc_url(EGNS_CORE_THEME_OPTIONS_IMAGES . '/icons/phone-contact-icon.svg'),
                'id'        => 'icon_list',
                'thumbnail' => esc_url(EGNS_CORE_THEME_OPTIONS_IMAGES . '/icons/phone-contact-icon.svg'),
                'alt'       => esc_attr('icon'),
                'title'     => esc_html('Icon'),
            ),
            'dependency' => array('header_menu_style', '==', 'header_three')
        ),
        array(
            'id'         => 'header_three_info_label',
            'type'       => 'text',
            'title'      => esc_html__('Label', 'gofly-core'),
            'default'    => esc_html__('Need Help?', 'gofly-core'),
            'dependency' => array('header_menu_style', '==', 'header_three')
        ),
        array(
            'id'           => 'header_three_info_link',
            'type'         => 'link',
            'title'        => esc_html__('Contact Text & Link', 'gofly-core'),
            'add_title'    => esc_html__('Add Content', 'gofly-core'),
            'edit_title'   => esc_html__('Edit Content', 'gofly-core'),
            'remove_title' => esc_html__('Remove Content', 'gofly-core'),
            'default'      => array(
                'url'  => 'tel:91345533865',
                'text' => '+91 345 533 865',
            ),
            'dependency' => array('header_menu_style', '==', 'header_three')
        ),

        array(
            'id'         => 'header_three_login_switcher',
            'type'       => 'switcher',
            'title'      => esc_html__('Login Button', 'gofly-core'),
            'label'      => esc_html__('Do you want activate it ?', 'gofly-core'),
            'default'    => true,
            'dependency' => array('header_menu_style', '==', 'header_three'),
        ),


        /*************** End Header three content ***************/


        /*************** Header four content ***************/
        array(
            'type'       => 'subheading',
            'content'    => '<h4>' . esc_html__('Header Four Content', 'gofly-core') . '</h4>',
            'dependency' => array('header_menu_style', '==', 'header_four')
        ),

        array(
            'id'      => 'header_four_info_icon',
            'title'   => esc_html__('Icon', 'gofly-core'),
            'type'    => 'media',
            'default' => array(
                'url'       => esc_url(EGNS_CORE_THEME_OPTIONS_IMAGES . '/icons/phone-contact-icon.svg'),
                'id'        => 'icon_list',
                'thumbnail' => esc_url(EGNS_CORE_THEME_OPTIONS_IMAGES . '/icons/phone-contact-icon.svg'),
                'alt'       => esc_attr('icon'),
                'title'     => esc_html('Icon'),
            ),
            'dependency' => array('header_menu_style', '==', 'header_four')
        ),
        array(
            'id'         => 'header_four_info_label',
            'type'       => 'text',
            'title'      => esc_html__('Label', 'gofly-core'),
            'default'    => esc_html__('Need Help?', 'gofly-core'),
            'dependency' => array('header_menu_style', '==', 'header_four')
        ),
        array(
            'id'           => 'header_four_info_link',
            'type'         => 'link',
            'title'        => esc_html__('Contact Text & Link', 'gofly-core'),
            'add_title'    => esc_html__('Add Content', 'gofly-core'),
            'edit_title'   => esc_html__('Edit Content', 'gofly-core'),
            'remove_title' => esc_html__('Remove Content', 'gofly-core'),
            'default'      => array(
                'url'  => 'tel:91345533865',
                'text' => '+91 345 533 865',
            ),
            'dependency' => array('header_menu_style', '==', 'header_four')
        ),

        array(
            'id'         => 'header_four_login_switcher',
            'type'       => 'switcher',
            'title'      => esc_html__('Login Button', 'gofly-core'),
            'label'      => esc_html__('Do you want activate it ?', 'gofly-core'),
            'default'    => true,
            'dependency' => array('header_menu_style', '==', 'header_four'),
        ),

        array(
            'id'         => 'header_offer_text_switcher',
            'type'       => 'switcher',
            'title'      => 'Enable Topbar',
            'label'      => 'Do you want activate it ?',
            'default'    => true,
            'dependency' => array(
                array('header_menu_style', '==', 'header_four'),
            )
        ),

        array(
            'type'       => 'subheading',
            'content'    => '<h4>' . esc_html__('Offer Text Slider', 'gofly-core') . '</h4>',
            'dependency' => array(
                array('header_menu_style', '==', 'header_four'),
                array('header_offer_text_switcher', '==', 'true')
            ),
        ),

        array(
            'id'         => 'header_four_offer_text_list',
            'type'       => 'repeater',
            'title'      => esc_html__('Offer List', 'gofly-core'),
            'dependency' => array(
                array('header_menu_style', '==', 'header_four'),
                array('header_offer_text_switcher', '==', 'true')
            ),
            'fields'     => array(
                array(
                    'id'      => 'header_four_offer_text',
                    'type'    => 'text',
                    'title'   => esc_html__('Label', 'gofly-core'),
                    'default' => wp_kses(__('One-Click Booking, Upto <strong>FLAT 30%</strong> Discount of Haneymoon Tours.', 'gofly-core'), wp_kses_allowed_html('post')),
                ),
                array(
                    'id'           => 'header_four_offer_link',
                    'type'         => 'link',
                    'title'        => esc_html__('Add Link', 'gofly-core'),
                    'add_title'    => esc_html__('Add Content', 'gofly-core'),
                    'edit_title'   => esc_html__('Edit Content', 'gofly-core'),
                    'remove_title' => esc_html__('Remove Content', 'gofly-core'),
                    'default'      => array(
                        'url' => '#',
                    ),
                ),
            ),
            'default'   => array(
                array(
                    'header_four_offer_text' => wp_kses(__('One-Click Booking, Upto <strong>FLAT 30%</strong> Discount of Haneymoon Tours', 'gofly-core'), wp_kses_allowed_html('post')),
                    'header_four_offer_link' => array(
                        'url'    => '#',
                        'target' => '_blank'
                    ),

                ),
                array(
                    'header_four_offer_text' => wp_kses(__('Customize Your Trip Plan and Get <strong>Special Discounts</strong> Instantly', 'gofly-core'), wp_kses_allowed_html('post')),
                    'header_four_offer_link' => array(
                        'url'    => '#',
                        'target' => '_blank'
                    ),
                ),
                array(
                    'header_four_offer_text' => wp_kses(__('Enjoy Family Holiday Packages with <strong>Flexible Payment Options</strong>', 'gofly-core'), wp_kses_allowed_html('post')),
                    'header_four_offer_link' => array(
                        'url'    => '#',
                        'target' => '_blank'
                    ),
                ),
            )
        ),

        /*************** End Header four content ***************/


        /*************** Header five content ***************/
        array(
            'type'       => 'subheading',
            'content'    => '<h4>' . esc_html__('Header Five Content', 'gofly-core') . '</h4>',
            'dependency' => array('header_menu_style', '==', 'header_five')
        ),

        array(
            'id'      => 'header_five_info_icon',
            'title'   => esc_html__('Icon', 'gofly-core'),
            'type'    => 'media',
            'default' => array(
                'url'       => esc_url(EGNS_CORE_THEME_OPTIONS_IMAGES . '/icons/phone-contact-icon.svg'),
                'id'        => 'icon_list',
                'thumbnail' => esc_url(EGNS_CORE_THEME_OPTIONS_IMAGES . '/icons/phone-contact-icon.svg'),
                'alt'       => esc_attr('icon'),
                'title'     => esc_html('Icon'),
            ),
            'dependency' => array('header_menu_style', '==', 'header_five')
        ),
        array(
            'id'         => 'header_five_info_label',
            'type'       => 'text',
            'title'      => esc_html__('Label', 'gofly-core'),
            'default'    => esc_html__('Need Help?', 'gofly-core'),
            'dependency' => array('header_menu_style', '==', 'header_five')
        ),
        array(
            'id'           => 'header_five_info_link',
            'type'         => 'link',
            'title'        => esc_html__('Contact Text & Link', 'gofly-core'),
            'add_title'    => esc_html__('Add Content', 'gofly-core'),
            'edit_title'   => esc_html__('Edit Content', 'gofly-core'),
            'remove_title' => esc_html__('Remove Content', 'gofly-core'),
            'default'      => array(
                'url'  => 'tel:91345533865',
                'text' => '+91 345 533 865',
            ),
            'dependency' => array('header_menu_style', '==', 'header_five')
        ),
        array(
            'id'         => 'header_five_login_switcher',
            'type'       => 'switcher',
            'title'      => esc_html__('Login Button', 'gofly-core'),
            'label'      => esc_html__('Do you want activate it ?', 'gofly-core'),
            'default'    => true,
            'dependency' => array('header_menu_style', '==', 'header_five'),
        ),
        array(
            'id'           => 'header_five_login_button_link_and_text',
            'type'         => 'link',
            'title'        => esc_html__('Button Link', 'gofly-core'),
            'add_title'    => esc_html__('Add Content', 'gofly-core'),
            'edit_title'   => esc_html__('Edit Content', 'gofly-core'),
            'remove_title' => esc_html__('Remove Content', 'gofly-core'),
            'default'      => array(
                'url'  => '#',
                'text' => 'Login',
            ),
            'dependency' => array('header_menu_style', '==', 'header_five'),
        ),


        /*************** End Header five content ***************/


        /*************** Header six content ***************/
        array(
            'type'       => 'subheading',
            'content'    => '<h4>' . esc_html__('Header Six Content', 'gofly-core') . '</h4>',
            'dependency' => array('header_menu_style', '==', 'header_six')
        ),
        array(
            'type'       => 'subheading',
            'content'    => '<h4>' . esc_html__('Contact Section', 'gofly-core') . '</h4>',
            'dependency' => array('header_menu_style', '==', 'header_six')
        ),

        array(
            'id'      => 'header_six_contact_phone_icon',
            'title'   => esc_html__('Icon', 'gofly-core'),
            'type'    => 'media',
            'default' => array(
                'url'       => esc_url(EGNS_CORE_THEME_OPTIONS_IMAGES . '/icons/phone-contact-icon.svg'),
                'id'        => 'icon_list',
                'thumbnail' => esc_url(EGNS_CORE_THEME_OPTIONS_IMAGES . '/icons/phone-contact-icon.svg'),
                'alt'       => esc_attr('icon'),
                'title'     => esc_html('Icon'),
            ),
            'dependency' => array('header_menu_style', '==', 'header_six'),
        ),
        array(
            'id'           => 'header_six_contact_phone_link',
            'type'         => 'link',
            'title'        => esc_html__('Add Text & Link', 'gofly-core'),
            'add_title'    => esc_html__('Add Content', 'gofly-core'),
            'edit_title'   => esc_html__('Edit Content', 'gofly-core'),
            'remove_title' => esc_html__('Remove Content', 'gofly-core'),
            'default'      => array(
                'url'  => 'tel:997636844568',
                'text' => '+99-763 684 4568',
            ),
            'dependency' => array('header_menu_style', '==', 'header_six'),
        ),

        array(
            'id'      => 'header_six_contact_email_icon',
            'title'   => esc_html__('Icon', 'gofly-core'),
            'type'    => 'media',
            'default' => array(
                'url'       => esc_url(EGNS_CORE_THEME_OPTIONS_IMAGES . '/icons/email-contact-icon.svg'),
                'id'        => 'icon_list',
                'thumbnail' => esc_url(EGNS_CORE_THEME_OPTIONS_IMAGES . '/icons/email-contact-icon.svg'),
                'alt'       => esc_attr('icon'),
                'title'     => esc_html('Icon'),
            ),
            'dependency' => array('header_menu_style', '==', 'header_six'),
        ),
        array(
            'id'           => 'header_six_contact_email_link',
            'type'         => 'link',
            'title'        => esc_html__('Add Text & Link', 'gofly-core'),
            'add_title'    => esc_html__('Add Content', 'gofly-core'),
            'edit_title'   => esc_html__('Edit Content', 'gofly-core'),
            'remove_title' => esc_html__('Remove Content', 'gofly-core'),
            'default'      => array(
                'url'  => 'mailto:info@example.com',
                'text' => 'info@example.com',
            ),
            'dependency' => array('header_menu_style', '==', 'header_six'),
        ),
        array(
            'type'       => 'subheading',
            'content'    => '<h4>' . esc_html__('Support And Language Area', 'gofly-core') . '</h4>',
            'dependency' => array('header_menu_style', '==', 'header_six')
        ),
        array(
            'id'           => 'header_six_contact_support_text_and_link',
            'type'         => 'link',
            'title'        => esc_html__('Support Text & Link', 'gofly-core'),
            'add_title'    => esc_html__('Add Content', 'gofly-core'),
            'edit_title'   => esc_html__('Edit Content', 'gofly-core'),
            'remove_title' => esc_html__('Remove Content', 'gofly-core'),
            'default'      => array(
                'url'  => '#',
                'text' => 'Need Help?',
            ),
            'dependency' => array('header_menu_style', '==', 'header_six')
        ),
        array(
            'id'         => 'header_six_language_enable',
            'title'      => esc_html__('Language switcher', 'gofly-core'),
            'type'       => 'switcher',
            'desc'       => wp_kses(__('you can set <mark>Yes / No</mark> to enable/disable Language switcher', 'gofly-core'),  wp_kses_allowed_html('post')),
            'default'    => true,
            'dependency' => array('header_menu_style', '==', 'header_six'),
        ),
        array(
            'id'         => 'header_six_language_shortcode',
            'type'       => 'text',
            'title'      => esc_html__('Add language shortcode', 'gofly-core'),
            'default'    => '[language]',
            'dependency' => array(
                array('header_six_language_enable', '==', 'true'),
                array('header_menu_style', '==', 'header_six'),
            ),
        ),
        array(
            'id'         => 'header_six_login_switcher',
            'type'       => 'switcher',
            'title'      => esc_html__('Login Button', 'gofly-core'),
            'label'      => esc_html__('Do you want activate it ?', 'gofly-core'),
            'default'    => true,
            'dependency' => array('header_menu_style', '==', 'header_six'),
        ),

        /*************** Header Seven content ***************/
        array(
            'type'       => 'subheading',
            'content'    => '<h4>' . esc_html__('Header Seven Content', 'gofly-core') . '</h4>',
            'dependency' => array('header_menu_style', '==', 'header_seven')
        ),
        array(
            'type'       => 'subheading',
            'content'    => '<h4>' . esc_html__('Support And Language Area', 'gofly-core') . '</h4>',
            'dependency' => array('header_menu_style', '==', 'header_seven')
        ),
        array(
            'id'           => 'header_seven_contact_support_text_and_link',
            'type'         => 'link',
            'title'        => esc_html__('Support Text & Link', 'gofly-core'),
            'add_title'    => esc_html__('Add Content', 'gofly-core'),
            'edit_title'   => esc_html__('Edit Content', 'gofly-core'),
            'remove_title' => esc_html__('Remove Content', 'gofly-core'),
            'default'      => array(
                'url'  => '#',
                'text' => 'Need Help?',
            ),
            'dependency' => array('header_menu_style', '==', 'header_seven')
        ),
        array(
            'id'         => 'header_seven_language_enable',
            'title'      => esc_html__('Language switcher', 'gofly-core'),
            'type'       => 'switcher',
            'desc'       => wp_kses(__('you can set <mark>Yes / No</mark> to enable/disable Language switcher', 'gofly-core'),  wp_kses_allowed_html('post')),
            'default'    => true,
            'dependency' => array('header_menu_style', '==', 'header_seven'),
        ),
        array(
            'id'         => 'header_seven_language_shortcode',
            'type'       => 'text',
            'title'      => esc_html__('Add language shortcode', 'gofly-core'),
            'default'    => '[language]',
            'dependency' => array(
                array('header_six_language_enable', '==', 'true'),
                array('header_menu_style', '==', 'header_seven'),
            ),
        ),
        array(
            'id'         => 'header_seven_login_switcher',
            'type'       => 'switcher',
            'title'      => esc_html__('Login Button', 'gofly-core'),
            'label'      => esc_html__('Do you want activate it ?', 'gofly-core'),
            'default'    => true,
            'dependency' => array('header_menu_style', '==', 'header_seven'),
        ),

        /*************** Header eight content ***************/
        array(
            'type'       => 'subheading',
            'content'    => '<h4>' . esc_html__('Header Eight Content', 'gofly-core') . '</h4>',
            'dependency' => array('header_menu_style', '==', 'header_eight')
        ),
        array(
            'id'         => 'header_eight_language_enable',
            'title'      => esc_html__('Language switcher', 'gofly-core'),
            'type'       => 'switcher',
            'desc'       => wp_kses(__('you can set <mark>Yes / No</mark> to enable/disable Language switcher', 'gofly-core'),  wp_kses_allowed_html('post')),
            'default'    => true,
            'dependency' => array('header_menu_style', '==', 'header_eight'),
        ),
        array(
            'id'         => 'header_eight_language_shortcode',
            'type'       => 'text',
            'title'      => esc_html__('Add language shortcode', 'gofly-core'),
            'default'    => '[language]',
            'dependency' => array(
                array('header_six_language_enable', '==', 'true'),
                array('header_menu_style', '==', 'header_eight'),
            ),
        ),
        array(
            'type'       => 'subheading',
            'content'    => '<h4>' . esc_html__('Contact Area', 'gofly-core') . '</h4>',
            'dependency' => array('header_menu_style', '==', 'header_eight')
        ),
        array(
            'id'      => 'header_eight_info_icon',
            'title'   => esc_html__('Icon', 'gofly-core'),
            'type'    => 'media',
            'default' => array(
                'url'       => esc_url(EGNS_CORE_THEME_OPTIONS_IMAGES . '/icons/phone-contact-icon.svg'),
                'id'        => 'icon_list',
                'thumbnail' => esc_url(EGNS_CORE_THEME_OPTIONS_IMAGES . '/icons/phone-contact-icon.svg'),
                'alt'       => esc_attr('icon'),
                'title'     => esc_html('Icon'),
            ),
            'dependency' => array('header_menu_style', '==', 'header_eight')
        ),
        array(
            'id'         => 'header_eight_info_label',
            'type'       => 'text',
            'title'      => esc_html__('Label', 'gofly-core'),
            'default'    => esc_html__('Need Help?', 'gofly-core'),
            'dependency' => array('header_menu_style', '==', 'header_eight')
        ),
        array(
            'id'           => 'header_eight_info_link',
            'type'         => 'link',
            'title'        => esc_html__('Add Text & Link', 'gofly-core'),
            'add_title'    => esc_html__('Add Content', 'gofly-core'),
            'edit_title'   => esc_html__('Edit Content', 'gofly-core'),
            'remove_title' => esc_html__('Remove Content', 'gofly-core'),
            'default'      => array(
                'url'  => 'wa.me/91345533865',
                'text' => '+91 345 533 865',
            ),
            'dependency' => array('header_menu_style', '==', 'header_eight')
        ),
        array(
            'id'           => 'header_eight_login_button_link_and_text',
            'type'         => 'link',
            'title'        => esc_html__('Button Text & Link', 'gofly-core'),
            'add_title'    => esc_html__('Add Content', 'gofly-core'),
            'edit_title'   => esc_html__('Edit Content', 'gofly-core'),
            'remove_title' => esc_html__('Remove Content', 'gofly-core'),
            'default'      => array(
                'url'  => '#',
                'text' => 'Login',
            ),
            'dependency' => array('header_menu_style', '==', 'header_eight'),
        ),

        /*************** End Header six content ***************/

    ),
));
