<?php

namespace Elementor;

if (!defined('ABSPATH')) exit;  // Exit if accessed directly

use Elementor\core\Schemes;
use Egns_Core\Egns_Helper;

class Gofly_Footer_Widget extends Widget_Base
{

    public function get_name()
    {
        return 'gofly_footer';
    }

    public function get_title()
    {
        return esc_html__('EG Footer', 'gofly-core');
    }

    public function get_icon()
    {
        return 'egns-widget-icon';
    }

    public function get_categories()
    {
        return ['gofly_widgets'];
    }

    protected function register_controls()
    {

        //=====================Genaral=======================//

        $this->start_controls_section(
            'gofly_footer_general_area',
            [
                'label' => esc_html__('Genaral', 'gofly-core')
            ]
        );

        $this->add_control(
            'gofly_footer_one_general_area_style_selection',
            [
                'label'   => esc_html__('Select Style', 'gofly-core'),
                'type'    => Controls_Manager::SELECT,
                'options' => [
                    'style_one' => esc_html__('Style One', 'gofly-core'),
                    'style_two' => esc_html__('Style Two', 'gofly-core'),
                ],
                'default' => 'style_one',
            ]
        );

        $this->add_control(
            'gofly_footer_one_general_area_style_color',
            [
                'label'   => esc_html__('Built-In Color Scheme', 'gofly-core'),
                'type'    => Controls_Manager::SELECT,
                'options' => [
                    'style_one'   => esc_html__('Style One', 'gofly-core'),
                    'style_two'   => esc_html__('Style Two', 'gofly-core'),
                    'style_three' => esc_html__('Style Three', 'gofly-core'),
                    'style_four'  => esc_html__('Style Four', 'gofly-core'),
                    'style_five'  => esc_html__('Style Five', 'gofly-core'),
                ],
                'default'   => 'style_one',
                'condition' => [
                    'gofly_footer_one_general_area_style_selection' => ['style_two'],
                ]
            ]
        );

        $this->end_controls_section();

        //=====================Inquiry Area=======================//

        $this->start_controls_section(
            'gofly_footer_one_inquiry_area',
            [
                'label'     => esc_html__('Inquiry Section', 'gofly-core'),
                'condition' => [
                    'gofly_footer_one_general_area_style_selection' => ['style_one'],
                ]
            ]
        );

        $this->add_control(
            'gofly_footer_one_inquiry_area_icon',
            [
                'label'   => esc_html__('Icon Image', 'gofly-core'),
                'type'    => \Elementor\Controls_Manager::ICONS,
                'default' => [
                    'value'   => 'fas fa-circle',
                    'library' => 'fa-solid',
                ],
                'recommended' => [
                    'fa-solid' => [
                        'circle',
                        'dot-circle',
                        'square-full',
                    ],
                    'fa-regular' => [
                        'circle',
                        'dot-circle',
                        'square-full',
                    ],
                ],
            ]
        );

        $this->add_control(
            'gofly_footer_one_inquiry_area_title_text',
            [
                'label'       => esc_html__('Title', 'gofly-core'),
                'type'        => \Elementor\Controls_Manager::TEXT,
                'default'     => esc_html__('To More Inquiry', 'gofly-core'),
                'placeholder' => esc_html__('write your title text here', 'gofly-core'),
                'label_block' => true,
            ]
        );

        $this->add_control(
            'gofly_footer_one_inquiry_area_content_text',
            [
                'label'       => esc_html__('Content', 'gofly-core'),
                'type'        => \Elementor\Controls_Manager::TEXT,
                'default'     => esc_html__('Don’t hesitate Call to GoFly.', 'gofly-core'),
                'placeholder' => esc_html__('write your content text here', 'gofly-core'),
                'label_block' => true,
            ]
        );

        $this->end_controls_section();

        //=====================Contact Area=======================//

        $this->start_controls_section(
            'gofly_footer_one_contact_area',
            [
                'label' => esc_html__('Contact Section', 'gofly-core')
            ]
        );

        $this->add_control(
            'gofly_footer_one_contact_area_contact_header_title',
            [
                'label'       => esc_html__('Contact Header Title', 'gofly-core'),
                'type'        => \Elementor\Controls_Manager::TEXT,
                'default'     => esc_html__('Contact Info', 'gofly-core'),
                'placeholder' => esc_html__('write your text here', 'gofly-core'),
                'label_block' => true,
                'condition'   => [
                    'gofly_footer_one_general_area_style_selection' => ['style_two'],
                ]
            ]
        );

        $repeater = new \Elementor\Repeater();

        $repeater->add_control(
            'gofly_footer_one_contact_area_icon',
            [
                'label'   => esc_html__('Icon Image', 'gofly-core'),
                'type'    => \Elementor\Controls_Manager::ICONS,
                'default' => [
                    'value'   => 'fas fa-circle',
                    'library' => 'fa-solid',
                ],
                'recommended' => [
                    'fa-solid' => [
                        'circle',
                        'dot-circle',
                        'square-full',
                    ],
                    'fa-regular' => [
                        'circle',
                        'dot-circle',
                        'square-full',
                    ],
                ],
            ]
        );

        $repeater->add_control(
            'gofly_footer_one_contact_area_title',
            [
                'label'   => esc_html__('Title', 'gofly-core'),
                'type'    => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html__('WhatsApp', 'gofly-core'),

                'placeholder' => esc_html__('write your text here', 'gofly-core'),
                'label_block' => true,
            ]
        );

        $repeater->add_control(
            'gofly_footer_one_contact_selection',
            [
                'label'   => esc_html__('Select Type', 'gofly-core'),
                'type'    => Controls_Manager::SELECT,
                'options' => [
                    'phone'  => esc_html__('Phone', 'gofly-core'),
                    'email'  => esc_html__('Email', 'gofly-core'),
                    'custom' => esc_html__('Custom Link', 'gofly-core'),
                ],
                'default' => 'phone',
            ]
        );

        $repeater->add_control(
            'gofly_footer_one_contact_area_phone_number',
            [
                'label'       => esc_html__('Phone Number', 'gofly-core'),
                'type'        => \Elementor\Controls_Manager::TEXT,
                'default'     => esc_html__('+91 345 533 865', 'gofly-core'),
                'placeholder' => esc_html__('write your text here', 'gofly-core'),
                'label_block' => true,
                'condition'   => [
                    'gofly_footer_one_contact_selection' => ['phone'],
                ]
            ]
        );

        $repeater->add_control(
            'gofly_footer_one_contact_area_email_address',
            [
                'label'       => esc_html__('Email Address', 'gofly-core'),
                'type'        => \Elementor\Controls_Manager::TEXT,
                'default'     => esc_html__('info@example.com', 'gofly-core'),
                'placeholder' => esc_html__('write your text here', 'gofly-core'),
                'label_block' => true,
                'condition'   => [
                    'gofly_footer_one_contact_selection' => ['email'],
                ]
            ]
        );

        $repeater->add_control(
            'gofly_footer_one_contact_area_custom_text',
            [
                'label'       => esc_html__('Custom Text', 'gofly-core'),
                'type'        => \Elementor\Controls_Manager::TEXT,
                'default'     => esc_html__('GoFly', 'gofly-core'),
                'placeholder' => esc_html__('write your text here', 'gofly-core'),
                'label_block' => true,
                'condition'   => [
                    'gofly_footer_one_contact_selection' => ['custom'],
                ]
            ]
        );

        $repeater->add_control(
            'gofly_footer_one_contact_area_custom_link_url',
            [
                'label'   => esc_html__('Custom URL/Link', 'gofly-core'),
                'type'    => \Elementor\Controls_Manager::URL,
                'options' => ['url', 'is_external', 'nofollow'],
                'default' => [
                    'url'         => '#',
                    'is_external' => true,
                    'nofollow'    => true,
                    // 'custom_attributes' => '',
                ],
                'label_block' => true,
                'condition'   => [
                    'gofly_footer_one_contact_selection' => ['custom'],
                ]
            ]
        );


        $this->add_control(
            'gofly_footer_one_contact_area_contact_list',
            [
                'label'   => esc_html__('Contact List', 'gofly-core'),
                'type'    => \Elementor\Controls_Manager::REPEATER,
                'fields'  => $repeater->get_controls(),
                'default' => [
                    [
                        'gofly_footer_one_contact_area_title'           => esc_html('WhatsApp'),
                        'gofly_footer_one_contact_selection'            => esc_html('custom'),
                        'gofly_footer_one_contact_area_custom_text'     => esc_html('+91 345 533 865'),
                        'gofly_footer_one_contact_area_custom_link_url' => esc_html('https://wa.me/91345533865'),
                    ],
                    [
                        'gofly_footer_one_contact_area_title'         => esc_html('Mail Us'),
                        'gofly_footer_one_contact_selection'          => esc_html('email'),
                        'gofly_footer_one_contact_area_email_address' => esc_html('info@example.com'),

                    ],
                    [
                        'gofly_footer_one_contact_area_title'        => esc_html('Call Us'),
                        'gofly_footer_one_contact_selection'         => esc_html('phone'),
                        'gofly_footer_one_contact_area_phone_number' => esc_html('+91 456 453 345'),
                    ],

                ],
                'title_field' => '{{{ gofly_footer_one_contact_area_title }}}',
            ]
        );

        $this->end_controls_section();


        //=====================Logo And Additional Info=======================//

        $this->start_controls_section(
            'gofly_footer_one_logo_and_addition_info_social_area',
            [
                'label' => esc_html__('Logo and Social Section', 'gofly-core')
            ]
        );


        $this->add_control(
            'gofly_footer_one_logo_and_addition_info_logo_area',
            [
                'label'     => esc_html__('Logo and Additional Info', 'gofly-core'),
                'type'      => \Elementor\Controls_Manager::HEADING,
                'separator' => 'after',
            ]
        );

        $this->add_control(
            'gofly_footer_one_logo_and_addition_info_logo',
            [
                'label'   => esc_html__('Logo Image', 'gofly-core'),
                'type'    => \Elementor\Controls_Manager::MEDIA,
                'default' => [
                    'url' => \Elementor\Utils::get_placeholder_image_src(),
                ],
            ]
        );

        $this->add_control(
            'gofly_footer_one_logo_and_addition_info_logo_url',
            [
                'label'   => esc_html__('Logo URL/Link', 'gofly-core'),
                'type'    => \Elementor\Controls_Manager::URL,
                'options' => ['url', 'is_external', 'nofollow'],
                'default' => [
                    'url'         => '#',
                    'is_external' => true,
                    'nofollow'    => true,
                    // 'custom_attributes' => '',
                ],
                'label_block' => true,
            ]
        );

        $this->add_control(
            'gofly_footer_one_logo_and_addition_info_logo_title',
            [
                'label'       => esc_html__('Title', 'gofly-core'),
                'type'        => \Elementor\Controls_Manager::TEXT,
                'default'     => esc_html__('GoFly Travel Agency', 'gofly-core'),
                'placeholder' => esc_html__('write your text here', 'gofly-core'),
                'label_block' => true,
            ]
        );

        $this->add_control(
            'gofly_footer_one_logo_and_addition_info_logo_address',
            [
                'label'       => esc_html__('Address', 'gofly-core'),
                'type'        => \Elementor\Controls_Manager::TEXT,
                'default'     => esc_html__('Skyline Plaza, 5th Floor, 123 Main Street Los Angeles, CA 90001, USA', 'gofly-core'),
                'placeholder' => esc_html__('write your text here', 'gofly-core'),
                'label_block' => true,
            ]
        );

        $this->add_control(
            'gofly_footer_one_logo_and_addition_info_logo_address_url',
            [
                'label'   => esc_html__('Address URL/Link', 'gofly-core'),
                'type'    => \Elementor\Controls_Manager::URL,
                'options' => ['url', 'is_external', 'nofollow'],
                'default' => [
                    'url'         => '#',
                    'is_external' => true,
                    'nofollow'    => true,
                    // 'custom_attributes' => '',
                ],
                'label_block' => true,
            ]
        );

        $this->add_control(
            'gofly_footer_one_logo_and_addition_info_social_area_sec',
            [
                'label'     => esc_html__('Social Area', 'gofly-core'),
                'type'      => \Elementor\Controls_Manager::HEADING,
                'separator' => 'after',
            ]
        );

        $repeater = new \Elementor\Repeater();

        $repeater->add_control(
            'gofly_footer_one_logo_and_addition_info_social_area_sec_icon',
            [
                'label'   => esc_html__('Icon', 'gofly-core'),
                'type'    => \Elementor\Controls_Manager::ICONS,
                'default' => [
                    'value'   => 'fas fa-circle',
                    'library' => 'fa-solid',
                ],
                'recommended' => [
                    'fa-solid' => [
                        'circle',
                        'dot-circle',
                        'square-full',
                    ],
                    'fa-regular' => [
                        'circle',
                        'dot-circle',
                        'square-full',
                    ],
                ],
            ]
        );

        $repeater->add_control(
            'gofly_footer_one_logo_and_addition_info_social_area_sec_social_url',
            [
                'label'       => esc_html__('Social Link/URL', 'gofly-core'),
                'type'        => \Elementor\Controls_Manager::URL,
                'placeholder' => esc_html__('https://your-link.com', 'gofly-core'),
                'options'     => ['url', 'is_external', 'nofollow'],
                'default'     => [
                    'url'         => '#',
                    'is_external' => true,
                    'nofollow'    => true,
                    // 'custom_attributes' => '',
                ],
                'label_block' => true,

            ]
        );

        $this->add_control(
            'gofly_footer_one_logo_and_addition_info_social_area_sec_list',
            [
                'label'   => esc_html__('Social Icon List', 'gofly-core'),
                'type'    => \Elementor\Controls_Manager::REPEATER,
                'fields'  => $repeater->get_controls(),
                'default' => [
                    [
                        'gofly_footer_one_logo_and_addition_info_social_area_sec_icon' => [
                            'value'   => 'bx bxl-facebook',
                            'library' => 'bootstrap-icons',
                        ],
                    ],
                    [
                        'gofly_footer_one_logo_and_addition_info_social_area_sec_icon' => [
                            'value'   => 'bx bxl-linkedin',
                            'library' => 'boxicons',
                        ],
                    ],
                    [
                        'gofly_footer_one_logo_and_addition_info_social_area_sec_icon' => [
                            'value'   => 'bx bxl-youtube',
                            'library' => 'boxicons',
                        ],
                    ],
                    [
                        'gofly_footer_one_logo_and_addition_info_social_area_sec_icon' => [
                            'value'   => 'bx bxl-instagram-alt',
                            'library' => 'boxicons',
                        ],
                    ],
                ],
            ]
        );

        $this->end_controls_section();

        //=====================Language and Custom Link Area=======================//

        $this->start_controls_section(
            'gofly_footer_one_language_and_custom_link',
            [
                'label' => esc_html__('Language and Custom Link Section', 'gofly-core')
            ]
        );

        $this->add_control(
            'gofly_footer_one_language_and_custom_language_switcher',
            [
                'label'        => esc_html__("Show Language Translator?", 'gofly-core'),
                'type'         => \Elementor\Controls_Manager::SWITCHER,
                'label_on'     => esc_html__('Enable', 'gofly-core'),
                'label_off'    => esc_html__('Disable', 'gofly-core'),
                'return_value' => 'yes',
                'default'      => 'yes',
            ]
        );

        $this->add_control(
            'gofly_footer_one_language_and_custom_link_language_shortcode_area',
            [
                'label'     => esc_html__('Language Translation Shortcode', 'gofly-core'),
                'type'      => \Elementor\Controls_Manager::HEADING,
                'separator' => 'after',
                'condition' => [
                    'gofly_footer_one_language_and_custom_language_switcher' => 'yes',
                ]
            ]
        );

        $this->add_control(
            'gofly_footer_one_language_and_custom_link_language_shortcode',
            [
                'label'       => esc_html__('Shortcode', 'gofly-core'),
                'type'        => \Elementor\Controls_Manager::TEXT,
                'default'     => '[ Shortcode ]',
                'placeholder' => esc_html__('write your title here', 'gofly-core'),
                'label_block' => true,
                'condition'   => [
                    'gofly_footer_one_language_and_custom_language_switcher' => 'yes',
                ]
            ]
        );

        $this->add_control(
            'gofly_footer_one_language_and_custom_image_link_switcher',
            [
                'label'        => esc_html__("Show Image Link?", 'gofly-core'),
                'type'         => \Elementor\Controls_Manager::SWITCHER,
                'label_on'     => esc_html__('Enable', 'gofly-core'),
                'label_off'    => esc_html__('Disable', 'gofly-core'),
                'return_value' => 'yes',
                'default'      => 'yes',
            ]
        );

        $this->add_control(
            'gofly_footer_one_language_and_custom_link_area',
            [
                'label'     => esc_html__('Image Link Area', 'gofly-core'),
                'type'      => \Elementor\Controls_Manager::HEADING,
                'separator' => 'after',
                'condition' => [
                    'gofly_footer_one_language_and_custom_image_link_switcher' => 'yes',
                ]
            ]
        );

        $this->add_control(
            'gofly_footer_one_language_and_custom_link_area_icon_image',
            [
                'label'   => esc_html__('Icon Image', 'gofly-core'),
                'type'    => \Elementor\Controls_Manager::MEDIA,
                'default' => [
                    'url' => \Elementor\Utils::get_placeholder_image_src(),
                ],
                'condition' => [
                    'gofly_footer_one_language_and_custom_image_link_switcher' => 'yes',
                ]
            ]
        );

        $this->add_control(
            'gofly_footer_one_language_and_custom_link_area_icon_image_url',
            [
                'label'       => esc_html__('Icon Image Link/URL', 'gofly-core'),
                'type'        => \Elementor\Controls_Manager::URL,
                'placeholder' => esc_html__('https://your-link.com', 'gofly-core'),
                'options'     => ['url', 'is_external', 'nofollow'],
                'default'     => [
                    'url'         => '#',
                    'is_external' => true,
                    'nofollow'    => true,
                    // 'custom_attributes' => '',
                ],
                'label_block' => true,
                'condition'   => [
                    'gofly_footer_one_language_and_custom_image_link_switcher' => 'yes',
                ]


            ]
        );

        $this->end_controls_section();

        //=====================Menu One Section=======================//

        $this->start_controls_section(
            'gofly_footer_menu_one_section',
            [
                'label' => esc_html__('Menu One Section', 'gofly-core')
            ]
        );

        $this->add_control(
            'gofly_footer_menu_one_section_title',
            [
                'label'       => esc_html__('Menu Title', 'gofly-core'),
                'type'        => \Elementor\Controls_Manager::TEXT,
                'default'     => esc_html__('Top Destination', 'gofly-core'),
                'placeholder' => esc_html__('write your menu title here', 'gofly-core'),
                'label_block' => true,

            ]
        );

        $repeater = new \Elementor\Repeater();

        $repeater->add_control(
            'gofly_footer_menu_one_section_content_title',
            [
                'label'       => esc_html__('Content Title', 'gofly-core'),
                'type'        => \Elementor\Controls_Manager::TEXT,
                'default'     => wp_kses('Maldives Tour', wp_kses_allowed_html('post')),
                'placeholder' => esc_html__('write your content title here', 'gofly-core'),
                'label_block' => true,
            ]
        );

        $repeater->add_control(
            'gofly_footer_menu_one_section_content_title_url',
            [
                'label'   => esc_html__('URL/Link', 'gofly-core'),
                'type'    => \Elementor\Controls_Manager::URL,
                'options' => ['url', 'is_external', 'nofollow'],
                'default' => [
                    'url'         => '#',
                    'is_external' => true,
                    'nofollow'    => true,
                ],
                'label_block' => true,
            ]
        );

        $this->add_control(
            'gofly_footer_menu_one_section_content_list',
            [
                'label'   => esc_html__('Content List', 'gofly-core'),
                'type'    => \Elementor\Controls_Manager::REPEATER,
                'fields'  => $repeater->get_controls(),
                'default' => [
                    [
                        'gofly_footer_menu_one_section_content_title' => esc_html('Maldives Tour'),

                    ],
                    [
                        'gofly_footer_menu_one_section_content_title' => esc_html('Bali, Indonesia Tour'),

                    ],
                    [
                        'gofly_footer_menu_one_section_content_title' => esc_html('Thailand Tour'),

                    ],
                    [
                        'gofly_footer_menu_one_section_content_title' => esc_html('Philippines Tour'),

                    ],
                    [
                        'gofly_footer_menu_one_section_content_title' => esc_html('Hawaii, USA Tour'),

                    ],
                    [
                        'gofly_footer_menu_one_section_content_title' => esc_html('Switzerland Tour'),

                    ],
                    [
                        'gofly_footer_menu_one_section_content_title' => esc_html('New Zealand Tour'),

                    ],
                    [
                        'gofly_footer_menu_one_section_content_title' => esc_html('Costa Rica Tour'),

                    ],
                    [
                        'gofly_footer_menu_one_section_content_title' => esc_html('Peru (Machu Picchu)'),

                    ],
                    [
                        'gofly_footer_menu_one_section_content_title' => esc_html('Paris, France Tour'),

                    ],
                    [
                        'gofly_footer_menu_one_section_content_title' => esc_html('Rome, Italy Tour'),

                    ],

                ],
                'title_field' => '{{{ gofly_footer_menu_one_section_content_title }}}',
            ]
        );

        $this->end_controls_section();

        //=====================Menu Two Section=======================//

        $this->start_controls_section(
            'gofly_footer_menu_two_section',
            [
                'label' => esc_html__('Menu Two Section', 'gofly-core')
            ]
        );

        $this->add_control(
            'gofly_footer_menu_two_section_title',
            [
                'label'       => esc_html__('Menu Title', 'gofly-core'),
                'type'        => \Elementor\Controls_Manager::TEXT,
                'default'     => esc_html__('Popular Search', 'gofly-core'),
                'placeholder' => esc_html__('write your menu title here', 'gofly-core'),
                'label_block' => true,

            ]
        );

        $repeater = new \Elementor\Repeater();

        $repeater->add_control(
            'gofly_footer_menu_two_section_content_title',
            [
                'label'       => esc_html__('Content Title', 'gofly-core'),
                'type'        => \Elementor\Controls_Manager::TEXT,
                'default'     => wp_kses('Adventure', wp_kses_allowed_html('post')),
                'placeholder' => esc_html__('write your content title here', 'gofly-core'),
                'label_block' => true,
            ]
        );

        $repeater->add_control(
            'gofly_footer_menu_two_section_content_title_url',
            [
                'label'   => esc_html__('URL/Link', 'gofly-core'),
                'type'    => \Elementor\Controls_Manager::URL,
                'options' => ['url', 'is_external', 'nofollow'],
                'default' => [
                    'url'         => '#',
                    'is_external' => true,
                    'nofollow'    => true,
                ],
                'label_block' => true,
            ]
        );

        $this->add_control(
            'gofly_footer_menu_two_section_content_list',
            [
                'label'   => esc_html__('Content List', 'gofly-core'),
                'type'    => \Elementor\Controls_Manager::REPEATER,
                'fields'  => $repeater->get_controls(),
                'default' => [
                    [
                        'gofly_footer_menu_two_section_content_title' => esc_html('Adventure'),

                    ],
                    [
                        'gofly_footer_menu_two_section_content_title' => esc_html('Hiking & Stiking'),

                    ],
                    [
                        'gofly_footer_menu_two_section_content_title' => esc_html('Holiday Packages'),

                    ],
                    [
                        'gofly_footer_menu_two_section_content_title' => esc_html('Flights And Hotels'),

                    ],
                    [
                        'gofly_footer_menu_two_section_content_title' => esc_html('Honeymoon Trip'),

                    ],
                    [
                        'gofly_footer_menu_two_section_content_title' => esc_html('Bali Vacation Package'),

                    ],
                    [
                        'gofly_footer_menu_two_section_content_title' => esc_html('Desert Safari'),

                    ],
                    [
                        'gofly_footer_menu_two_section_content_title' => esc_html('Last-Minute Deals'),

                    ],
                    [
                        'gofly_footer_menu_two_section_content_title' => esc_html('Summer Vacation'),

                    ],
                    [
                        'gofly_footer_menu_two_section_content_title' => esc_html('Wildlife Safari'),

                    ],
                    [
                        'gofly_footer_menu_two_section_content_title' => esc_html('Dubai Luxury Tours'),

                    ],

                ],
                'title_field' => '{{{ gofly_footer_menu_two_section_content_title }}}',
            ]
        );

        $this->end_controls_section();

        //=====================Menu Three Section=======================//

        $this->start_controls_section(
            'gofly_footer_menu_three_section',
            [
                'label'     => esc_html__('Menu Three Section', 'gofly-core'),
                'condition' => [
                    'gofly_footer_one_general_area_style_selection' => ['style_one'],
                ]
            ]
        );

        $this->add_control(
            'gofly_footer_menu_three_section_title',
            [
                'label'       => esc_html__('Menu Title', 'gofly-core'),
                'type'        => \Elementor\Controls_Manager::TEXT,
                'default'     => esc_html__('Resources', 'gofly-core'),
                'placeholder' => esc_html__('write your menu title here', 'gofly-core'),
                'label_block' => true,

            ]
        );

        $repeater = new \Elementor\Repeater();

        $repeater->add_control(
            'gofly_footer_menu_three_section_content_title',
            [
                'label'       => esc_html__('Content Title', 'gofly-core'),
                'type'        => \Elementor\Controls_Manager::TEXT,
                'default'     => wp_kses('About GoFly', wp_kses_allowed_html('post')),
                'placeholder' => esc_html__('write your content title here', 'gofly-core'),
                'label_block' => true,
            ]
        );

        $repeater->add_control(
            'gofly_footer_menu_three_section_content_title_url',
            [
                'label'   => esc_html__('URL/Link', 'gofly-core'),
                'type'    => \Elementor\Controls_Manager::URL,
                'options' => ['url', 'is_external', 'nofollow'],
                'default' => [
                    'url'         => '#',
                    'is_external' => true,
                    'nofollow'    => true,
                ],
                'label_block' => true,
            ]
        );

        $this->add_control(
            'gofly_footer_menu_three_section_content_list',
            [
                'label'   => esc_html__('Content List', 'gofly-core'),
                'type'    => \Elementor\Controls_Manager::REPEATER,
                'fields'  => $repeater->get_controls(),
                'default' => [
                    [
                        'gofly_footer_menu_three_section_content_title' => esc_html('About GoFly'),

                    ],
                    [
                        'gofly_footer_menu_three_section_content_title' => esc_html('Health & Safety Measure'),

                    ],
                    [
                        'gofly_footer_menu_three_section_content_title' => esc_html('Visa Processing'),

                    ],
                    [
                        'gofly_footer_menu_three_section_content_title' => esc_html('Customize Tour'),

                    ],
                    [
                        'gofly_footer_menu_three_section_content_title' => esc_html('Traveler Reviews'),

                    ],
                    [
                        'gofly_footer_menu_three_section_content_title' => esc_html('Terms & Condition'),

                    ],
                    [
                        'gofly_footer_menu_three_section_content_title' => esc_html('Sitemap'),

                    ],
                ],
                'title_field' => '{{{ gofly_footer_menu_three_section_content_title }}}',
            ]
        );

        $this->end_controls_section();

        //=====================Copyright Section=======================//

        $this->start_controls_section(
            'gofly_footer_one_copyright_and_payment_method_section',
            [
                'label' => esc_html__('Copyright Section', 'gofly-core')
            ]
        );

        $this->add_control(
            'gofly_footer_one_copyright_and_payment_method_section_copyright_text',
            [
                'label'       => esc_html__('Copyright Text', 'gofly-core'),
                'type'        => \Elementor\Controls_Manager::TEXT,
                'default'     => wp_kses('Copyright 2025 <a href="https://www.egenslab.com/">Egens Lab</a> | All Right Reserved.', wp_kses_allowed_html('post')),
                'placeholder' => esc_html__('write your text here', 'gofly-core'),
                'label_block' => true,

            ]
        );

        $this->add_control(
            'gofly_footer_one_copyright_and_payment_method_section_method_area',
            [
                'label'     => esc_html__('Payment Method Area', 'gofly-core'),
                'type'      => \Elementor\Controls_Manager::HEADING,
                'separator' => 'after',
            ]
        );

        $this->add_control(
            'gofly_footer_one_copyright_and_payment_method_section_method_area_text',
            [
                'label'       => esc_html__('Title', 'gofly-core'),
                'type'        => \Elementor\Controls_Manager::TEXT,
                'default'     => esc_html__('Accepted Payment Methods :', 'gofly-core'),
                'placeholder' => esc_html__('write your title here', 'gofly-core'),
                'label_block' => true,
            ]
        );

        $this->add_control(
            'gofly_footer_one_copyright_and_payment_method_section_method_area_text_gallery',
            [
                'label'      => esc_html__('Add Payment Method Images', 'gofly-core'),
                'type'       => \Elementor\Controls_Manager::GALLERY,
                'show_label' => true,
                'default'    => [],
            ]
        );

        $this->end_controls_section();

        //style start 

        $this->start_controls_section(
            'gofly_footer_one_style_general',
            [
                'label'     => esc_html__('Inquiery Section', 'gofly-core'),
                'tab'       => Controls_Manager::TAB_STYLE,
                'condition' => [
                    'gofly_footer_one_general_area_style_selection' => ['style_one'],
                ]
            ]
        );

        $this->add_control(
            'gofly_footer_one_style_general_icon',
            [
                'label'     => esc_html__('Icon', 'gofly-core'),
                'type'      => \Elementor\Controls_Manager::HEADING,
                'separator' => 'after',
            ]
        );

        $this->add_control(
            'gofly_footer_one_style_general_icon_color',
            [
                'label'     => esc_html__('Color', 'gofly-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .footer-section .footer-contact-wrap .inquiry-area svg' => 'fill: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'gofly_footer_one_style_general_title',
            [
                'label'     => esc_html__('Title', 'gofly-core'),
                'type'      => \Elementor\Controls_Manager::HEADING,
                'separator' => 'after',
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'label'    => esc_html__('Typography', 'gofly-core'),
                'name'     => 'gofly_footer_one_style_general_title_typ',
                'selector' => '{{WRAPPER}} .footer-section .footer-contact-wrap .inquiry-area .content h6',

            ]
        );

        $this->add_control(
            'gofly_footer_one_style_general_title_color',
            [
                'label'     => esc_html__('Color', 'gofly-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .footer-section .footer-contact-wrap .inquiry-area .content h6' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'gofly_footer_one_style_general_content',
            [
                'label'     => esc_html__('Content', 'gofly-core'),
                'type'      => \Elementor\Controls_Manager::HEADING,
                'separator' => 'after',
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'label'    => esc_html__('Typography', 'gofly-core'),
                'name'     => 'gofly_footer_one_style_general_content_typ',
                'selector' => '{{WRAPPER}} .footer-section .footer-contact-wrap .inquiry-area .content span',

            ]
        );

        $this->add_control(
            'gofly_footer_one_style_general_content_color',
            [
                'label'     => esc_html__('Color', 'gofly-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .footer-section .footer-contact-wrap .inquiry-area .content span' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->end_controls_section();


        $this->start_controls_section(
            'gofly_footer_one_style_contact_section',
            [
                'label'     => esc_html__('Contact Section', 'gofly-core'),
                'tab'       => Controls_Manager::TAB_STYLE,
                'condition' => [
                    'gofly_footer_one_general_area_style_selection' => ['style_one'],
                ]
            ]
        );

        $this->add_control(
            'gofly_footer_one_style_contact_section_icon',
            [
                'label'     => esc_html__('Icon', 'gofly-core'),
                'type'      => \Elementor\Controls_Manager::HEADING,
                'separator' => 'after',
            ]
        );

        $this->add_control(
            'gofly_footer_one_style_contact_section_icon_stroke_color',
            [
                'label'     => esc_html__('Stroke Color', 'gofly-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .footer-section .footer-contact-wrap ul.contact-area li.single-contact .icon svg' => 'stroke: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'gofly_footer_one_style_contact_section_icon_bg_color',
            [
                'label'     => esc_html__('Background Color', 'gofly-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .footer-section .footer-contact-wrap .contact-area .single-contact .icon' => 'background-color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'gofly_footer_one_style_contact_section_title',
            [
                'label'     => esc_html__('Title', 'gofly-core'),
                'type'      => \Elementor\Controls_Manager::HEADING,
                'separator' => 'after',
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'label'    => esc_html__('Typography', 'gofly-core'),
                'name'     => 'gofly_footer_one_style_contact_section_title_typ',
                'selector' => '{{WRAPPER}} .footer-section .footer-contact-wrap .contact-area .single-contact .content span',

            ]
        );

        $this->add_control(
            'gofly_footer_one_style_contact_section_title_color',
            [
                'label'     => esc_html__('Color', 'gofly-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .footer-section .footer-contact-wrap .contact-area .single-contact .content span' => 'color: {{VALUE}};',
                ],
            ]
        );


        $this->add_control(
            'gofly_footer_one_style_contact_section_content',
            [
                'label'     => esc_html__('Content', 'gofly-core'),
                'type'      => \Elementor\Controls_Manager::HEADING,
                'separator' => 'after',
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'label'    => esc_html__('Typography', 'gofly-core'),
                'name'     => 'gofly_footer_one_style_contact_section_content_typ',
                'selector' => '{{WRAPPER}} .footer-section .footer-contact-wrap .contact-area .single-contact .content a',

            ]
        );

        $this->add_control(
            'gofly_footer_one_style_contact_section_content_color',
            [
                'label'     => esc_html__('Color', 'gofly-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .footer-section .footer-contact-wrap .contact-area .single-contact .content a' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'gofly_footer_one_style_contact_section_content_hover_color',
            [
                'label'     => esc_html__('Hover Color', 'gofly-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .footer-section .footer-contact-wrap .contact-area .single-contact .content a:hover' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->end_controls_section();


        $this->start_controls_section(
            'gofly_footer_one_style_logo_and_additional_info',
            [
                'label' => esc_html__('Logo And Social Section', 'gofly-core'),
                'tab'   => Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_control(
            'gofly_footer_one_style_logo_and_additional_info_tilte',
            [
                'label'     => esc_html__('Title', 'gofly-core'),
                'type'      => \Elementor\Controls_Manager::HEADING,
                'separator' => 'after',
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'label'    => esc_html__('Typography', 'gofly-core'),
                'name'     => 'gofly_footer_one_style_logo_and_additional_info_tilte_typ',
                'selector' => '{{WRAPPER}} .footer-section .footer-menu-wrap .footer-logo-and-addition-info .address-area span',

            ]
        );

        $this->add_control(
            'gofly_footer_one_style_logo_and_additional_info_tilte_color',
            [
                'label'     => esc_html__('Color', 'gofly-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .footer-section .footer-menu-wrap .footer-logo-and-addition-info .address-area span' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'gofly_footer_one_style_logo_and_additional_info_content',
            [
                'label'     => esc_html__('Content', 'gofly-core'),
                'type'      => \Elementor\Controls_Manager::HEADING,
                'separator' => 'after',
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'label'    => esc_html__('Typography', 'gofly-core'),
                'name'     => 'gofly_footer_one_style_logo_and_additional_info_content_typ',
                'selector' => '{{WRAPPER}} .footer-section .footer-menu-wrap .footer-logo-and-addition-info .address-area a',

            ]
        );

        $this->add_control(
            'gofly_footer_one_style_logo_and_additional_info_content_color',
            [
                'label'     => esc_html__('Color', 'gofly-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .footer-section .footer-menu-wrap .footer-logo-and-addition-info .address-area a' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'gofly_footer_one_style_logo_and_additional_info_content_hover_color',
            [
                'label'     => esc_html__('Hover Color', 'gofly-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .footer-section .footer-menu-wrap .footer-logo-and-addition-info .address-area a:hover' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'gofly_footer_one_style_logo_and_social_icon',
            [
                'label'     => esc_html__('Social Icon', 'gofly-core'),
                'type'      => \Elementor\Controls_Manager::HEADING,
                'separator' => 'after',
            ]
        );

        $this->add_control(
            'gofly_footer_one_style_logo_and_social_icon_color',
            [
                'label'     => esc_html__('Color', 'gofly-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .footer-section .footer-menu-wrap .footer-logo-and-addition-info .social-list li a i' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'gofly_footer_one_style_logo_and_social_hover_icon_color',
            [
                'label'     => esc_html__('Hover Color', 'gofly-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .footer-section .footer-menu-wrap .footer-logo-and-addition-info .social-list li a:hover i' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'gofly_footer_one_style_logo_and_social_icon_bg_color',
            [
                'label'     => esc_html__('Background Color', 'gofly-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .footer-section .footer-menu-wrap .footer-logo-and-addition-info .social-list li a' => 'background-color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'gofly_footer_one_style_logo_and_social_icon_hover_bg_color',
            [
                'label'     => esc_html__('Hover Background Color', 'gofly-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .footer-section .footer-menu-wrap .footer-logo-and-addition-info .social-list li a:hover' => 'background-color: {{VALUE}};',
                ],
            ]
        );

        $this->end_controls_section();

        $this->start_controls_section(
            'gofly_footer_one_style_language_and_custom_link_section',
            [
                'label' => esc_html__('Language and Custom Link Section', 'gofly-core'),
                'tab'   => Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_control(
            'gofly_footer_one_style_language_and_custom_link_section_border',
            [
                'label'     => esc_html__('Section', 'gofly-core'),
                'type'      => \Elementor\Controls_Manager::HEADING,
                'separator' => 'after',
            ]
        );

        $this->add_control(
            'gofly_footer_one_style_language_and_custom_link_section_border_color',
            [
                'label'     => esc_html__('Border Color', 'gofly-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .footer-section .footer-menu-wrap .language-area' => 'border: 1px solid {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'gofly_footer_one_style_language_and_custom_link_section_dropdown_icon_color',
            [
                'label'     => esc_html__('Dropdown Icon Color', 'gofly-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .footer-section .footer-menu-wrap .language-area .language-btn i' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'gofly_footer_one_style_language_and_custom_link_section_icon',
            [
                'label'     => esc_html__('Icon', 'gofly-core'),
                'type'      => \Elementor\Controls_Manager::HEADING,
                'separator' => 'after',
            ]
        );

        $this->add_control(
            'gofly_footer_one_style_language_and_custom_link_section_icon_color',
            [
                'label'     => esc_html__('Color', 'gofly-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .footer-section .footer-menu-wrap .language-area .language-btn svg' => 'fill: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'gofly_footer_one_style_language_and_custom_link_section_label',
            [
                'label'     => esc_html__('Label', 'gofly-core'),
                'type'      => \Elementor\Controls_Manager::HEADING,
                'separator' => 'after',
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'label'    => esc_html__('Typography', 'gofly-core'),
                'name'     => 'gofly_footer_one_style_language_and_custom_link_section_label_typ',
                'selector' => '{{WRAPPER}} .footer-section .footer-menu-wrap .language-area .language-btn span',

            ]
        );

        $this->add_control(
            'gofly_footer_one_style_language_and_custom_link_section_label_color',
            [
                'label'     => esc_html__('Color', 'gofly-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .footer-section .footer-menu-wrap .language-area .language-btn span' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'gofly_footer_one_style_language_and_custom_link_section_language_list',
            [
                'label'     => esc_html__('Language List', 'gofly-core'),
                'type'      => \Elementor\Controls_Manager::HEADING,
                'separator' => 'after',
            ]
        );

        $this->add_control(
            'gofly_footer_one_style_language_and_custom_link_section_language_list_color',
            [
                'label'     => esc_html__('Color', 'gofly-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .footer-section .footer-menu-wrap .language-area .language-list li a' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'gofly_footer_one_style_language_and_custom_link_section_language_list_hover_color',
            [
                'label'     => esc_html__('Hover Color', 'gofly-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .footer-section .footer-menu-wrap .language-area .language-list li a:hover' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'gofly_footer_one_style_language_and_custom_link_section_language_list_border_color',
            [
                'label'     => esc_html__('Border Color', 'gofly-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .footer-section .footer-menu-wrap .language-area .language-list' => 'border: 1px solid {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'gofly_footer_one_style_language_and_custom_link_section_language_list_bg_color',
            [
                'label'     => esc_html__('Background Color', 'gofly-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .footer-section .footer-menu-wrap .language-area .language-list' => 'background-color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'gofly_footer_one_style_language_and_custom_link_section_language_list_hover_bg_color',
            [
                'label'     => esc_html__('Hover Background Color', 'gofly-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .footer-section .footer-menu-wrap .language-area .language-list li a:hover' => 'background-color: {{VALUE}};',
                ],
            ]
        );

        $this->end_controls_section();

        $this->start_controls_section(
            'gofly_footer_one_style_menu',
            [
                'label' => esc_html__('Menu Section', 'gofly-core'),
                'tab'   => Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_control(
            'gofly_footer_one_style_menu_title',
            [
                'label'     => esc_html__('Title', 'gofly-core'),
                'type'      => \Elementor\Controls_Manager::HEADING,
                'separator' => 'after',
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'label'    => esc_html__('Typography', 'gofly-core'),
                'name'     => 'gofly_footer_one_style_menu_title_typ',
                'selector' => '{{WRAPPER}} .footer-section .footer-menu-wrap .footer-widget .widget-title h5',

            ]
        );

        $this->add_control(
            'gofly_footer_one_style_menu_title_color',
            [
                'label'     => esc_html__('Color', 'gofly-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .footer-section .footer-menu-wrap .footer-widget .widget-title h5' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'gofly_footer_one_style_menu_content',
            [
                'label'     => esc_html__('Content', 'gofly-core'),
                'type'      => \Elementor\Controls_Manager::HEADING,
                'separator' => 'after',
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'label'    => esc_html__('Typography', 'gofly-core'),
                'name'     => 'gofly_footer_one_style_menu_content_typ',
                'selector' => '{{WRAPPER}} .footer-section .footer-menu-wrap .footer-widget .widget-list li a',

            ]
        );

        $this->add_control(
            'gofly_footer_one_style_menu_content_color',
            [
                'label'     => esc_html__('Color', 'gofly-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .footer-section .footer-menu-wrap .footer-widget .widget-list li a' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'gofly_footer_one_style_menu_content_hover_color',
            [
                'label'     => esc_html__('Hover Color', 'gofly-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .footer-section .footer-menu-wrap .footer-widget .widget-list li a:hover' => 'color: {{VALUE}};',
                ],
            ]
        );


        $this->end_controls_section();

        $this->start_controls_section(
            'gofly_footer_two_style_contact_section',
            [
                'label'     => esc_html__('Contact Section', 'gofly-core'),
                'tab'       => Controls_Manager::TAB_STYLE,
                'condition' => [
                    'gofly_footer_one_general_area_style_selection' => ['style_two'],
                ]
            ]
        );

        $this->add_control(
            'gofly_footer_two_style_contact_section_title',
            [
                'label'     => esc_html__('Title', 'gofly-core'),
                'type'      => \Elementor\Controls_Manager::HEADING,
                'separator' => 'after',
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'label'    => esc_html__('Typography', 'gofly-core'),
                'name'     => 'gofly_footer_two_style_contact_section_title_typ',
                'selector' => '{{WRAPPER}} .footer-section .footer-menu-wrap .footer-widget .contact-list .single-contact .content span',

            ]
        );

        $this->add_control(
            'gofly_footer_two_style_contact_section_title_color',
            [
                'label'     => esc_html__('Color', 'gofly-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .footer-section .footer-menu-wrap .footer-widget .contact-list .single-contact .content span' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'gofly_footer_two_style_contact_section_content',
            [
                'label'     => esc_html__('Content', 'gofly-core'),
                'type'      => \Elementor\Controls_Manager::HEADING,
                'separator' => 'after',
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'label'    => esc_html__('Typography', 'gofly-core'),
                'name'     => 'gofly_footer_two_style_contact_section_content_typ',
                'selector' => '{{WRAPPER}} .footer-section .footer-menu-wrap .footer-widget .contact-list .single-contact .content a',

            ]
        );

        $this->add_control(
            'gofly_footer_two_style_contact_section_content_color',
            [
                'label'     => esc_html__('Color', 'gofly-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .footer-section .footer-menu-wrap .footer-widget .contact-list .single-contact .content a' => 'color: {{VALUE}};',
                ],
            ]
        );


        $this->add_control(
            'gofly_footer_two_style_contact_section_content_hover_color',
            [
                'label'     => esc_html__('Hover Color', 'gofly-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .footer-section .footer-menu-wrap .footer-widget .contact-list .single-contact .content a:hover' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->end_controls_section();



        $this->start_controls_section(
            'gofly_footer_one_style_copyright_section',
            [
                'label' => esc_html__('Copyright Section', 'gofly-core'),
                'tab'   => Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_control(
            'gofly_footer_one_style_copyright_section_payment_method_section',
            [
                'label'     => esc_html__('Section', 'gofly-core'),
                'type'      => \Elementor\Controls_Manager::HEADING,
                'separator' => 'after',
            ]
        );

        $this->add_control(
            'gofly_footer_one_style_copyright_section_payment_method_section_border_top',
            [
                'label'     => esc_html__('Border Top Color', 'gofly-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .footer-section .footer-bottom' => 'border-top: 1px solid {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'gofly_footer_one_style_copyright_section_copyright_text',
            [
                'label'     => esc_html__('Copyright Text', 'gofly-core'),
                'type'      => \Elementor\Controls_Manager::HEADING,
                'separator' => 'after',
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'label'    => esc_html__('Typography', 'gofly-core'),
                'name'     => 'gofly_footer_one_style_copyright_section_copyright_text_typ',
                'selector' => '{{WRAPPER}} .footer-section .footer-bottom .copyright-and-payment-method-area p',

            ]
        );

        $this->add_control(
            'gofly_footer_one_style_copyright_section_copyright_text_color',
            [
                'label'     => esc_html__('Color', 'gofly-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .footer-section .footer-bottom .copyright-and-payment-method-area p' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'gofly_footer_one_style_copyright_section_copyright_text_secondary_color',
            [
                'label'     => esc_html__('Secondary Color', 'gofly-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .footer-section .footer-bottom .copyright-and-payment-method-area p a' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'gofly_footer_one_style_copyright_section_copyright_text_secondary_hover_color',
            [
                'label'     => esc_html__('Secondary Hover Color', 'gofly-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .footer-section .footer-bottom .copyright-and-payment-method-area p a:hover' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'gofly_footer_one_style_copyright_section_payment_method_title',
            [
                'label'     => esc_html__('Payment Method Title', 'gofly-core'),
                'type'      => \Elementor\Controls_Manager::HEADING,
                'separator' => 'after',
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'label'    => esc_html__('Typography', 'gofly-core'),
                'name'     => 'gofly_footer_one_style_copyright_section_payment_method_title_typ',
                'selector' => '{{WRAPPER}} .footer-section .footer-bottom .copyright-and-payment-method-area .payment-method-area span',

            ]
        );

        $this->add_control(
            'gofly_footer_one_style_copyright_section_payment_method_title_color',
            [
                'label'     => esc_html__('Color', 'gofly-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .footer-section .footer-bottom .copyright-and-payment-method-area .payment-method-area span' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->end_controls_section();
    }
    protected function render()
    {

        $settings = $this->get_settings_for_display();
?>

        <?php if ($settings['gofly_footer_one_general_area_style_selection'] == 'style_one'): ?>
            <footer class="footer-section">
                <div class="container">
                    <div class="footer-contact-wrap">
                        <div class="inquiry-area">
                            <?php \Elementor\Icons_Manager::render_icon($settings['gofly_footer_one_inquiry_area_icon'], ['aria-hidden' => 'true']); ?>
                            <div class="content">
                                <?php if (!empty($settings['gofly_footer_one_inquiry_area_title_text'])): ?>
                                    <h6><?php echo esc_html($settings['gofly_footer_one_inquiry_area_title_text']); ?></h6>
                                <?php endif; ?>
                                <?php if (!empty($settings['gofly_footer_one_inquiry_area_content_text'])): ?>
                                    <span><?php echo esc_html($settings['gofly_footer_one_inquiry_area_content_text']); ?></span>
                                <?php endif; ?>
                            </div>
                        </div>
                        <ul class="contact-area">
                            <?php foreach ($settings['gofly_footer_one_contact_area_contact_list'] as $contact_data): ?>
                                <li class="single-contact">
                                    <?php if (!empty($contact_data['gofly_footer_one_contact_area_icon'])): ?>
                                        <div class="icon">
                                            <?php \Elementor\Icons_Manager::render_icon($contact_data['gofly_footer_one_contact_area_icon'], ['aria-hidden' => 'true']); ?>
                                        </div>
                                    <?php endif; ?>
                                    <div class="content">
                                        <?php if (!empty($contact_data['gofly_footer_one_contact_area_title'])): ?>
                                            <span><?php echo esc_html($contact_data['gofly_footer_one_contact_area_title']); ?></span>
                                        <?php endif; ?>
                                        <?php if ($contact_data['gofly_footer_one_contact_selection'] == 'phone'): ?>
                                            <a href="tel:<?php echo preg_replace('/\D/', '', $contact_data['gofly_footer_one_contact_area_phone_number']); ?>"><?php echo esc_html($contact_data['gofly_footer_one_contact_area_phone_number']); ?></a>
                                        <?php elseif ($contact_data['gofly_footer_one_contact_selection'] == 'email'): ?>
                                            <a href="mailto:<?php echo esc_html($contact_data['gofly_footer_one_contact_area_email_address']); ?>"><?php echo esc_html($contact_data['gofly_footer_one_contact_area_email_address']); ?></a>
                                        <?php elseif ($contact_data['gofly_footer_one_contact_selection'] == 'custom'): ?>
                                            <a href="<?php echo esc_url($contact_data['gofly_footer_one_contact_area_custom_link_url']['url']); ?>"><?php echo esc_html($contact_data['gofly_footer_one_contact_area_custom_text']); ?></a>
                                        <?php endif; ?>
                                    </div>
                                </li>
                            <?php endforeach; ?>
                        </ul>
                    </div>
                    <svg class="divider" width="1320" height="6" viewBox="0 0 1320 6" xmlns="http://www.w3.org/2000/svg">
                        <path
                            d="M5 2.5L0 0.113249V5.88675L5 3.5V2.5ZM1315 3.5L1320 5.88675V0.113249L1315 2.5V3.5ZM4.5 3.5H1315.5V2.5H4.5V3.5Z" />
                    </svg>
                    <div class="footer-menu-wrap">
                        <div class="row gy-md-4 gy-5">
                            <div class="col-lg-3 col-md-4 col-sm-6">
                                <div class="footer-logo-and-addition-info">
                                    <?php if (!empty($settings['gofly_footer_one_logo_and_addition_info_logo']['url'])): ?>
                                        <a href="<?php echo esc_url($settings['gofly_footer_one_logo_and_addition_info_logo_url']['url']); ?>" class="footer-logo">
                                            <img src="<?php echo esc_url($settings['gofly_footer_one_logo_and_addition_info_logo']['url']); ?>" alt="<?php echo esc_attr__('logo-image', 'gofly-core'); ?>">
                                        </a>
                                    <?php endif; ?>
                                    <div class="address-area">
                                        <?php if (!empty($settings['gofly_footer_one_logo_and_addition_info_logo_title'])): ?>
                                            <span><?php echo esc_html($settings['gofly_footer_one_logo_and_addition_info_logo_title']); ?></span>
                                        <?php endif; ?>
                                        <?php if (!empty($settings['gofly_footer_one_logo_and_addition_info_logo_address'])): ?>
                                            <a href="<?php echo esc_url($settings['gofly_footer_one_logo_and_addition_info_logo_address_url']['url']); ?>"><?php echo esc_html($settings['gofly_footer_one_logo_and_addition_info_logo_address']); ?></a>
                                        <?php endif; ?>
                                    </div>
                                    <ul class="social-list">
                                        <?php foreach ($settings['gofly_footer_one_logo_and_addition_info_social_area_sec_list'] as $data):
                                            $icon = $data['gofly_footer_one_logo_and_addition_info_social_area_sec_icon'];
                                        ?>
                                            <li>
                                                <a href="<?php echo esc_url($data['gofly_footer_one_logo_and_addition_info_social_area_sec_social_url']['url']); ?>">
                                                    <?php if (!empty($icon['value'])): ?>
                                                        <i class="<?php echo esc_attr($icon['value']); ?>"></i>
                                                    <?php endif; ?>
                                                </a>
                                            </li>
                                        <?php endforeach; ?>
                                    </ul>
                                    <?php if ($settings['gofly_footer_one_language_and_custom_language_switcher'] == 'yes') : ?>
                                        <?php if (!empty($settings['gofly_footer_one_language_and_custom_link_language_shortcode'])): ?>
                                            <div class="language-area">
                                                <?php echo do_shortcode($settings['gofly_footer_one_language_and_custom_link_language_shortcode']); ?>
                                            </div>
                                        <?php endif; ?>
                                    <?php endif; ?>
                                    <?php if ($settings['gofly_footer_one_language_and_custom_image_link_switcher'] == 'yes') : ?>
                                        <?php if (!empty($settings['gofly_footer_one_language_and_custom_link_area_icon_image_url']['url'])): ?>
                                            <a href="<?php echo esc_url($settings['gofly_footer_one_language_and_custom_link_area_icon_image_url']['url']); ?>"><img src="<?php echo esc_url($settings['gofly_footer_one_language_and_custom_link_area_icon_image']['url']); ?>" alt="<?php echo esc_attr__('icon-image', 'gofly-core'); ?>"></a>
                                        <?php endif; ?>
                                    <?php endif; ?>
                                </div>
                            </div>
                            <div class="col-lg-3 col-md-4 col-sm-6 d-flex justify-content-md-end">
                                <div class="footer-widget">
                                    <?php if (!empty($settings['gofly_footer_menu_one_section_title'])): ?>
                                        <div class="widget-title">
                                            <h5><?php echo esc_html($settings['gofly_footer_menu_one_section_title']); ?></h5>
                                        </div>
                                    <?php endif; ?>
                                    <ul class="widget-list">
                                        <?php foreach ($settings['gofly_footer_menu_one_section_content_list'] as $menu_one): ?>
                                            <?php if (!empty($menu_one['gofly_footer_menu_one_section_content_title'])) : ?>
                                                <li><a href="<?php echo esc_url($menu_one['gofly_footer_menu_one_section_content_title_url']['url']); ?>"><?php echo esc_html($menu_one['gofly_footer_menu_one_section_content_title']); ?></a></li>
                                            <?php endif; ?>
                                        <?php endforeach; ?>
                                    </ul>
                                </div>
                            </div>
                            <div class="col-lg-3 col-md-4 col-sm-6 d-flex justify-content-md-end">
                                <div class="footer-widget">
                                    <?php if (!empty($settings['gofly_footer_menu_two_section_title'])): ?>
                                        <div class="widget-title">
                                            <h5><?php echo esc_html($settings['gofly_footer_menu_two_section_title']); ?></h5>
                                        </div>
                                    <?php endif; ?>
                                    <ul class="widget-list">
                                        <?php foreach ($settings['gofly_footer_menu_two_section_content_list'] as $menu_two): ?>
                                            <?php if (!empty($menu_two['gofly_footer_menu_two_section_content_title'])) : ?>
                                                <li><a href="<?php echo esc_url($menu_two['gofly_footer_menu_two_section_content_title_url']['url']); ?>"><?php echo esc_html($menu_two['gofly_footer_menu_two_section_content_title']); ?></a></li>
                                            <?php endif ?>
                                        <?php endforeach; ?>
                                    </ul>
                                </div>
                            </div>
                            <div class="col-lg-3 col-sm-6 d-flex justify-content-lg-end">
                                <div class="footer-widget">
                                    <?php if (!empty($settings['gofly_footer_menu_three_section_title'])): ?>
                                        <div class="widget-title">
                                            <h5><?php echo esc_html($settings['gofly_footer_menu_three_section_title']); ?></h5>
                                        </div>
                                    <?php endif; ?>
                                    <ul class="widget-list">
                                        <?php foreach ($settings['gofly_footer_menu_three_section_content_list'] as $menu_three): ?>
                                            <?php if (!empty($menu_three['gofly_footer_menu_three_section_content_title'])) : ?>
                                                <li><a href="<?php echo esc_url($menu_three['gofly_footer_menu_three_section_content_title_url']['url']); ?>"><?php echo esc_html($menu_three['gofly_footer_menu_three_section_content_title']); ?></a></li>
                                            <?php endif; ?>
                                        <?php endforeach; ?>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="footer-bottom">
                    <div class="container">
                        <div class="copyright-and-payment-method-area">
                            <?php if (!empty($settings['gofly_footer_one_copyright_and_payment_method_section_copyright_text'])): ?>
                                <p><?php echo wp_kses($settings['gofly_footer_one_copyright_and_payment_method_section_copyright_text'], wp_kses_allowed_html('post'))  ?></p>
                            <?php endif; ?>
                            <div class="payment-method-area">
                                <?php if (!empty($settings['gofly_footer_one_copyright_and_payment_method_section_method_area_text'])): ?>
                                    <span><?php echo esc_html($settings['gofly_footer_one_copyright_and_payment_method_section_method_area_text']); ?></span>
                                <?php endif; ?>
                                <ul>
                                    <?php
                                    $gallery_images = $this->get_settings_for_display('gofly_footer_one_copyright_and_payment_method_section_method_area_text_gallery');

                                    if (!empty($gallery_images) && is_array($gallery_images)): ?>
                                        <ul class="footer-payment-methods">
                                            <?php foreach ($gallery_images as $image): ?>
                                                <li>
                                                    <img src="<?php echo esc_url($image['url']); ?>" alt="<?php echo esc_attr(get_post_meta($image['id'], '_wp_attachment_image_alt', true)); ?>">
                                                </li>
                                            <?php endforeach; ?>
                                        </ul>
                                    <?php endif; ?>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </footer>
        <?php endif; ?>

        <?php if ($settings['gofly_footer_one_general_area_style_selection'] == 'style_two'): ?>
            <footer class="footer-section <?php echo esc_html((['style_one' => '', 'style_two' => 'two', 'style_three' => 'three', 'style_four' => 'four', 'style_five' => 'five'][$settings['gofly_footer_one_general_area_style_color']] ?? '')); ?>">
                <div class="container">
                    <div class="footer-menu-wrap">
                        <div class="row gy-md-4 gy-5">
                            <div class="col-lg-3 col-md-4 col-sm-6">
                                <div class="footer-logo-and-addition-info">
                                    <?php if (!empty($settings['gofly_footer_one_logo_and_addition_info_logo']['url'])): ?>
                                        <a href="<?php echo esc_url($settings['gofly_footer_one_logo_and_addition_info_logo_url']['url']); ?>" class="footer-logo">
                                            <img src="<?php echo esc_url($settings['gofly_footer_one_logo_and_addition_info_logo']['url']); ?>" alt="<?php echo esc_attr__('logo-image', 'gofly-core'); ?>">
                                        </a>
                                    <?php endif; ?>
                                    <div class="address-area">
                                        <?php if (!empty($settings['gofly_footer_one_logo_and_addition_info_logo_title'])): ?>
                                            <span><?php echo esc_html($settings['gofly_footer_one_logo_and_addition_info_logo_title']); ?></span>
                                        <?php endif; ?>
                                        <?php if (!empty($settings['gofly_footer_one_logo_and_addition_info_logo_address'])): ?>
                                            <a href="<?php echo esc_url($settings['gofly_footer_one_logo_and_addition_info_logo_address_url']['url']); ?>"><?php echo esc_html($settings['gofly_footer_one_logo_and_addition_info_logo_address']); ?></a>
                                        <?php endif; ?>
                                    </div>
                                    <ul class="social-list">
                                        <?php foreach ($settings['gofly_footer_one_logo_and_addition_info_social_area_sec_list'] as $data):
                                            $icon = $data['gofly_footer_one_logo_and_addition_info_social_area_sec_icon'];
                                        ?>
                                            <li>
                                                <a href="<?php echo esc_url($data['gofly_footer_one_logo_and_addition_info_social_area_sec_social_url']['url']); ?>">
                                                    <?php if (!empty($icon['value'])): ?>
                                                        <i class="<?php echo esc_attr($icon['value']); ?>"></i>
                                                    <?php endif; ?>
                                                </a>
                                            </li>
                                        <?php endforeach; ?>
                                    </ul>
                                    <?php if ($settings['gofly_footer_one_language_and_custom_language_switcher'] == 'yes') : ?>
                                        <?php if (!empty($settings['gofly_footer_one_language_and_custom_link_language_shortcode'])): ?>
                                            <div class="language-area">
                                                <?php echo do_shortcode($settings['gofly_footer_one_language_and_custom_link_language_shortcode']); ?>
                                            </div>
                                        <?php endif; ?>
                                    <?php endif; ?>
                                    <?php if ($settings['gofly_footer_one_language_and_custom_image_link_switcher'] == 'yes') : ?>
                                        <?php if (!empty($settings['gofly_footer_one_language_and_custom_link_area_icon_image_url']['url'])): ?>
                                            <a href="<?php echo esc_url($settings['gofly_footer_one_language_and_custom_link_area_icon_image_url']['url']); ?>"><img src="<?php echo esc_url($settings['gofly_footer_one_language_and_custom_link_area_icon_image']['url']); ?>" alt="<?php echo esc_attr__('icon-image', 'gofly-core'); ?>"></a>
                                        <?php endif; ?>
                                    <?php endif; ?>
                                </div>
                            </div>
                            <div class="col-lg-3 col-md-4 col-sm-6 d-flex justify-content-md-end">
                                <div class="footer-widget">
                                    <?php if (!empty($settings['gofly_footer_menu_one_section_title'])): ?>
                                        <div class="widget-title">
                                            <h5><?php echo esc_html($settings['gofly_footer_menu_one_section_title']); ?></h5>
                                        </div>
                                    <?php endif; ?>
                                    <ul class="widget-list">
                                        <?php foreach ($settings['gofly_footer_menu_one_section_content_list'] as $menu_one): ?>
                                            <?php if (!empty($menu_one['gofly_footer_menu_one_section_content_title'])) : ?>
                                                <li><a href="<?php echo esc_url($menu_one['gofly_footer_menu_one_section_content_title_url']['url']); ?>"><?php echo esc_html($menu_one['gofly_footer_menu_one_section_content_title']); ?></a></li>
                                            <?php endif; ?>
                                        <?php endforeach; ?>
                                    </ul>
                                </div>
                            </div>
                            <div class="col-lg-3 col-md-4 col-sm-6 d-flex justify-content-md-end">
                                <div class="footer-widget">
                                    <?php if (!empty($settings['gofly_footer_menu_two_section_title'])): ?>
                                        <div class="widget-title">
                                            <h5><?php echo esc_html($settings['gofly_footer_menu_two_section_title']); ?></h5>
                                        </div>
                                    <?php endif; ?>
                                    <ul class="widget-list">
                                        <?php foreach ($settings['gofly_footer_menu_two_section_content_list'] as $menu_two): ?>
                                            <?php if (!empty($menu_two['gofly_footer_menu_two_section_content_title'])) : ?>
                                                <li><a href="<?php echo esc_url($menu_two['gofly_footer_menu_two_section_content_title_url']['url']); ?>"><?php echo esc_html($menu_two['gofly_footer_menu_two_section_content_title']); ?></a></li>
                                            <?php endif ?>
                                        <?php endforeach; ?>
                                    </ul>
                                </div>
                            </div>
                            <div class="col-lg-3 col-sm-6 d-flex justify-content-lg-end">
                                <div class="footer-widget">
                                    <?php if (!empty($settings['gofly_footer_one_contact_area_contact_header_title'])): ?>
                                        <div class="widget-title">
                                            <h5><?php echo esc_html($settings['gofly_footer_one_contact_area_contact_header_title']); ?></h5>
                                        </div>
                                    <?php endif; ?>
                                    <ul class="contact-list">
                                        <?php foreach ($settings['gofly_footer_one_contact_area_contact_list'] as $contact_data): ?>
                                            <li class="single-contact">
                                                <?php if (!empty($contact_data['gofly_footer_one_contact_area_icon'])): ?>
                                                    <div class="icon">
                                                        <?php \Elementor\Icons_Manager::render_icon($contact_data['gofly_footer_one_contact_area_icon'], ['aria-hidden' => 'true']); ?>
                                                    </div>
                                                <?php endif; ?>
                                                <div class="content">
                                                    <?php if (!empty($contact_data['gofly_footer_one_contact_area_title'])): ?>
                                                        <span><?php echo esc_html($contact_data['gofly_footer_one_contact_area_title']); ?></span>
                                                    <?php endif; ?>
                                                    <?php if ($contact_data['gofly_footer_one_contact_selection'] == 'phone'): ?>
                                                        <a href="tel:<?php echo preg_replace('/\D/', '', $contact_data['gofly_footer_one_contact_area_phone_number']); ?>"><?php echo esc_html($contact_data['gofly_footer_one_contact_area_phone_number']); ?></a>
                                                    <?php elseif ($contact_data['gofly_footer_one_contact_selection'] == 'email'): ?>
                                                        <a href="mailto:<?php echo esc_html($contact_data['gofly_footer_one_contact_area_email_address']); ?>"><?php echo esc_html($contact_data['gofly_footer_one_contact_area_email_address']); ?></a>
                                                    <?php elseif ($contact_data['gofly_footer_one_contact_selection'] == 'custom'): ?>
                                                        <a href="<?php echo esc_url($contact_data['gofly_footer_one_contact_area_custom_link_url']['url']); ?>"><?php echo esc_html($contact_data['gofly_footer_one_contact_area_custom_text']); ?></a>
                                                    <?php endif; ?>
                                                </div>
                                            </li>
                                        <?php endforeach; ?>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="footer-bottom">
                    <div class="container">
                        <div class="copyright-and-payment-method-area">
                            <?php if (!empty($settings['gofly_footer_one_copyright_and_payment_method_section_copyright_text'])): ?>
                                <p><?php echo wp_kses($settings['gofly_footer_one_copyright_and_payment_method_section_copyright_text'], wp_kses_allowed_html('post'))  ?></p>
                            <?php endif; ?>
                            <div class="payment-method-area">
                                <?php if (!empty($settings['gofly_footer_one_copyright_and_payment_method_section_method_area_text'])): ?>
                                    <span><?php echo esc_html($settings['gofly_footer_one_copyright_and_payment_method_section_method_area_text']); ?></span>
                                <?php endif; ?>
                                <ul>
                                    <?php
                                    $gallery_images = $this->get_settings_for_display('gofly_footer_one_copyright_and_payment_method_section_method_area_text_gallery');

                                    if (!empty($gallery_images) && is_array($gallery_images)): ?>
                                        <ul class="footer-payment-methods">
                                            <?php foreach ($gallery_images as $image): ?>
                                                <li>
                                                    <img src="<?php echo esc_url($image['url']); ?>" alt="<?php echo esc_attr(get_post_meta($image['id'], '_wp_attachment_image_alt', true)); ?>">
                                                </li>
                                            <?php endforeach; ?>
                                        </ul>
                                    <?php endif; ?>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </footer>
        <?php endif; ?>
<?php

    }
}

Plugin::instance()->widgets_manager->register(new Gofly_Footer_Widget());
