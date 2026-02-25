<?php

namespace Elementor;

if (!defined('ABSPATH')) exit;  // Exit if accessed directly

use Elementor\core\Schemes;
use Egns_Core\Egns_Helper;

class Gofly_About_Widget extends Widget_Base
{

    public function get_name()
    {
        return 'gofly_about';
    }

    public function get_title()
    {
        return esc_html__('EG About', 'gofly-core');
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

        //=====================General=======================//

        $this->start_controls_section(
            'gofly_about_genaral',
            [
                'label' => esc_html__('General', 'gofly-core')
            ]
        );

        $this->add_control(
            'gofly_about_genaral_style_selection',
            [
                'label'   => esc_html__('Select Style', 'gofly-core'),
                'type'    => Controls_Manager::SELECT,
                'options' => [
                    'style_one'   => esc_html__('Style One', 'gofly-core'),
                    'style_two'   => esc_html__('Style Two', 'gofly-core'),
                    'style_three' => esc_html__('Style Three', 'gofly-core'),
                    'style_four'  => esc_html__('Style Four', 'gofly-core'),
                    'style_five'  => esc_html__('Style Five', 'gofly-core'),
                    'style_six'   => esc_html__('Style Six', 'gofly-core'),
                ],
                'default' => 'style_one',
            ]
        );

        $this->add_control(
            'gofly_about_genaral_style_one_bg_image',
            [
                'label'   => esc_html__('Background Image', 'gofly-core'),
                'type'    => \Elementor\Controls_Manager::MEDIA,
                'default' => [
                    'url' => \Elementor\Utils::get_placeholder_image_src(),
                ],
                'media_types' => ['image'],
                'condition'   => [
                    'gofly_about_genaral_style_selection' => ['style_one', 'style_two', 'style_three'],
                ]
            ]
        );

        $this->add_control(
            'gofly_about_genaral_header_subtitle',
            [
                'label'       => esc_html__('Subtitle', 'gofly-core'),
                'type'        => \Elementor\Controls_Manager::TEXT,
                'default'     => wp_kses('#1 Booking Agency', wp_kses_allowed_html('post')),
                'placeholder' => esc_html__('write your title here', 'gofly-core'),
                'label_block' => true,
                'condition'   => [
                    'gofly_about_genaral_style_selection' => ['style_five'],
                ],
            ]
        );

        $this->add_control(
            'gofly_about_genaral_header_title',
            [
                'label'       => esc_html__('Title', 'gofly-core'),
                'type'        => \Elementor\Controls_Manager::TEXT,
                'default'     => wp_kses('Your Trustpoint, GoFly Best for Travel Agency.', wp_kses_allowed_html('post')),
                'placeholder' => esc_html__('write your title here', 'gofly-core'),
                'label_block' => true,
                'condition'   => [
                    'gofly_about_genaral_style_selection' => ['style_one', 'style_three', 'style_four', 'style_five', 'style_six']
                ],
            ]
        );

        $this->add_control(
            'gofly_about_two_genaral_header_title',
            [
                'label'       => esc_html__('Title', 'gofly-core'),
                'type'        => \Elementor\Controls_Manager::TEXT,
                'default'     => wp_kses('Why We’re Best Agency', wp_kses_allowed_html('post')),
                'placeholder' => esc_html__('write your title here', 'gofly-core'),
                'label_block' => true,
                'condition'   => [
                    'gofly_about_genaral_style_selection' => 'style_two',
                ],
            ]
        );

        $this->add_control(
            'gofly_about_two_genaral_header_short_description',
            [
                'label'       => esc_html__('Short Description', 'gofly-core'),
                'type'        => \Elementor\Controls_Manager::TEXT,
                'default'     => wp_kses('Welcome to GoFly Travel Agency – Your Gateway to Unforgettable Journeys!', wp_kses_allowed_html('post')),
                'placeholder' => esc_html__('write your short description here', 'gofly-core'),
                'label_block' => true,
                'condition'   => [
                    'gofly_about_genaral_style_selection' => ['style_two', 'style_four']
                ],
            ]
        );

        $this->add_control(
            'gofly_about_genaral_header_description',
            [
                'label'       => esc_html__('Description', 'gofly-core'),
                'type'        => \Elementor\Controls_Manager::TEXTAREA,
                'default'     => wp_kses("<span>At GoFly Travel Agency, we are passionate about creating exceptional travel experiences.</span> Whether you're looking for a relaxing beach vacation, an adventurous trek, a luxurious getaway, or a cultural expedition.", wp_kses_allowed_html('post')),
                'placeholder' => esc_html__('write your description here', 'gofly-core'),
                'label_block' => true,
                'condition'   => [
                    'gofly_about_genaral_style_selection' => ['style_one', 'style_two', 'style_three', 'style_four']
                ],
            ]
        );

        $this->add_control(
            'gofly_about_five_genaral_header_description',
            [
                'label'   => esc_html__('Description', 'gofly-core'),
                'type'    => \Elementor\Controls_Manager::WYSIWYG,
                'default' => esc_html__('GoFly Travel Agency is a trusted name in the travel industry, offering seamless travel planning, personalized itineraries, and unforgettable adventures. With years of experience and a network of global partners, we ensure a hassle-free and memorable journey for every traveler.

It’s your ultimate gateway to thrilling travel experiences, specializing in adventure tourism, paragliding tours, and mountain expeditions. Whether you seek breathtaking sky-high journeys, serene nature escapes, or cultural explorations, we craft tailor-made itineraries to fuel your wanderlust.', 'gofly-core'),
                'placeholder' => esc_html__('Type your description here', 'gofly-core'),
                'condition'   => [
                    'gofly_about_genaral_style_selection' => ['style_five', 'style_six']
                ],
            ]
        );

        $this->add_control(
            'gofly_about_two_genaral_header_button_label',
            [
                'label'       => esc_html__('Button Label', 'gofly-core'),
                'type'        => \Elementor\Controls_Manager::TEXT,
                'default'     => esc_html__('About More GoFly', 'gofly-core'),
                'placeholder' => esc_html__('write your label here', 'gofly-core'),
                'label_block' => true,
                'condition'   => [
                    'gofly_about_genaral_style_selection' => ['style_two', 'style_four', 'style_five', 'style_six']
                ],
            ]
        );

        $this->add_control(
            'gofly_about_two_genaral_header_button_label_url',
            [
                'label'       => esc_html__('Button Link/URL', 'gofly-core'),
                'type'        => \Elementor\Controls_Manager::URL,
                'default'     => ['url' => '#'],
                'placeholder' => esc_html__('write your url here', 'gofly-core'),
                'label_block' => true,
                'condition'   => [
                    'gofly_about_genaral_style_selection' => ['style_two', 'style_four', 'style_five', 'style_six']
                ],
            ]
        );

        $this->add_control(
            'gofly_about_two_genaral_banner_image',
            [
                'label'   => esc_html__('Banner Image', 'gofly-core'),
                'type'    => \Elementor\Controls_Manager::MEDIA,
                'default' => [
                    'url' => \Elementor\Utils::get_placeholder_image_src(),
                ],
                'condition'   => [
                    'gofly_about_genaral_style_selection' => 'style_two',
                ],
            ]
        );

        $repeater = new \Elementor\Repeater();

        $repeater->add_control(
            'gofly_about_content_list_title',
            [
                'label'       => esc_html__('Content Title', 'gofly-core'),
                'type'        => \Elementor\Controls_Manager::TEXT,
                'default'     => esc_html__('Affordable Travel', 'gofly-core'),
                'placeholder' => esc_html__('write your text here', 'gofly-core'),
                'label_block' => true,
            ]
        );

        $this->add_control(
            'gofly_about_content_list',
            [
                'label'   => esc_html__('Content List', 'gofly-core'),
                'type'    => \Elementor\Controls_Manager::REPEATER,
                'fields'  => $repeater->get_controls(),
                'default' => [
                    [
                        'gofly_about_content_list_title' => esc_html('Affordable Travel'),

                    ],
                    [
                        'gofly_about_content_list_title' => esc_html('Trusted Experience'),
                    ],
                    [
                        'gofly_about_content_list_title' => esc_html('Effortless Booking Process'),
                    ],
                ],
                'title_field' => '{{{ gofly_about_content_list_title }}}',
                'condition'   => [
                    'gofly_about_genaral_style_selection' => ['style_three'],
                ],
            ]
        );

        $this->add_control(
            'gofly_about_genaral_counter_area',
            [
                'label'     => esc_html__('Counter Area', 'gofly-core'),
                'type'      => \Elementor\Controls_Manager::HEADING,
                'separator' => 'after',
                'condition' => [
                    'gofly_about_genaral_style_selection' => ['style_one', 'style_three'],
                ],
            ]
        );


        $this->add_control(
            'gofly_about_genaral_counter_area_icon',
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
                'condition'   => [
                    'gofly_about_genaral_style_selection' => 'style_one',
                ],
            ]
        );

        $this->add_control(
            'gofly_about_genaral_counter_area_counter_number',
            [
                'label'       => esc_html__('Counter Number', 'gofly-core'),
                'type'        => \Elementor\Controls_Manager::TEXT,
                'default'     => esc_html__('1', 'gofly-core'),
                'placeholder' => esc_html__('write your text here', 'gofly-core'),
                'label_block' => true,
                'condition'   => [
                    'gofly_about_genaral_style_selection' => ['style_one', 'style_three'],
                ],
            ]
        );

        $this->add_control(
            'gofly_about_genaral_counter_area_counter_sign',
            [
                'label'       => esc_html__('Counter Sign', 'gofly-core'),
                'type'        => \Elementor\Controls_Manager::TEXT,
                'default'     => esc_html__('+', 'gofly-core'),
                'placeholder' => esc_html__('write your text here', 'gofly-core'),
                'label_block' => true,
                'condition'   => [
                    'gofly_about_genaral_style_selection' => ['style_one', 'style_three'],
                ],
            ]
        );

        $this->add_control(
            'gofly_about_genaral_counter_area_counter_title',
            [
                'label'       => esc_html__('Counter Title', 'gofly-core'),
                'type'        => \Elementor\Controls_Manager::TEXT,
                'default'     => wp_kses('Years <br> of Experience', wp_kses_allowed_html('post')),
                'placeholder' => esc_html__('write your title here', 'gofly-core'),
                'label_block' => true,
                'condition'   => [
                    'gofly_about_genaral_style_selection' => ['style_one', 'style_three'],
                ],
            ]
        );

        $this->add_control(
            'gofly_about_genaral_counter_area_two',
            [
                'label'     => esc_html__('Counter Two', 'gofly-core'),
                'type'      => \Elementor\Controls_Manager::HEADING,
                'separator' => 'after',
                'condition' => [
                    'gofly_about_genaral_style_selection' => ['style_three'],
                ],
            ]
        );

        $this->add_control(
            'gofly_about_genaral_counter_area_five',
            [
                'label'     => esc_html__('Counter', 'gofly-core'),
                'type'      => \Elementor\Controls_Manager::HEADING,
                'separator' => 'after',
                'condition' => [
                    'gofly_about_genaral_style_selection' => ['style_five', 'style_six'],
                ],
            ]
        );

        $this->add_control(
            'gofly_about_genaral_counter_area_two_gallery',
            [
                'label'      => esc_html__('Add Images', 'gofly-core'),
                'type'       => \Elementor\Controls_Manager::GALLERY,
                'show_label' => false,
                'default'    => [],
                'condition'  => [
                    'gofly_about_genaral_style_selection' => ['style_three', 'style_five', 'style_six'],
                ],
            ]
        );

        $this->add_control(
            'gofly_about_genaral_counter_area_two_number',
            [
                'label'       => esc_html__('Counter Number', 'gofly-core'),
                'type'        => \Elementor\Controls_Manager::TEXT,
                'default'     => esc_html__('1', 'gofly-core'),
                'placeholder' => esc_html__('write your text here', 'gofly-core'),
                'label_block' => true,
                'condition'   => [
                    'gofly_about_genaral_style_selection' => ['style_three', 'style_five', 'style_six'],
                ],
            ]
        );

        $this->add_control(
            'gofly_about_genaral_counter_area_two_sign',
            [
                'label'       => esc_html__('Counter Sign', 'gofly-core'),
                'type'        => \Elementor\Controls_Manager::TEXT,
                'default'     => esc_html__('+', 'gofly-core'),
                'placeholder' => esc_html__('write your text here', 'gofly-core'),
                'label_block' => true,
                'condition'   => [
                    'gofly_about_genaral_style_selection' => ['style_three', 'style_five', 'style_six'],
                ],
            ]
        );

        $this->add_control(
            'gofly_about_genaral_counter_area_two_title',
            [
                'label'       => esc_html__('Counter Title', 'gofly-core'),
                'type'        => \Elementor\Controls_Manager::TEXT,
                'default'     => wp_kses('Years of Experience', wp_kses_allowed_html('post')),
                'placeholder' => esc_html__('write your title here', 'gofly-core'),
                'label_block' => true,
                'condition'   => [
                    'gofly_about_genaral_style_selection' => ['style_three', 'style_five', 'style_six'],
                ],
            ]
        );

        $this->add_control(
            'gofly_about_genaral_counter_area_two_button_label',
            [
                'label'       => esc_html__('Button Label', 'gofly-core'),
                'type'        => \Elementor\Controls_Manager::TEXT,
                'default'     => esc_html__('About More GoFly', 'gofly-core'),
                'placeholder' => esc_html__('write your label here', 'gofly-core'),
                'label_block' => true,
                'condition'   => [
                    'gofly_about_genaral_style_selection' => ['style_three'],
                ],
            ]
        );

        $this->add_control(
            'gofly_about_genaral_counter_area_two_button_url',
            [
                'label'       => esc_html__('Button Link/URL', 'gofly-core'),
                'type'        => \Elementor\Controls_Manager::URL,
                'default'     => ['url' => '#'],
                'placeholder' => esc_html__('write your url here', 'gofly-core'),
                'label_block' => true,
                'condition'   => [
                    'gofly_about_genaral_style_selection' => ['style_three'],
                ],
            ]
        );

        $this->add_control(
            'gofly_about_genaral_counter_area_three',
            [
                'label'     => esc_html__('Counter Three', 'gofly-core'),
                'type'      => \Elementor\Controls_Manager::HEADING,
                'separator' => 'after',
                'condition' => [
                    'gofly_about_genaral_style_selection' => ['style_three'],
                ],
            ]
        );

        $this->add_control(
            'gofly_about_genaral_counter_area_six',
            [
                'label'     => esc_html__('Counter Two', 'gofly-core'),
                'type'      => \Elementor\Controls_Manager::HEADING,
                'separator' => 'after',
                'condition' => [
                    'gofly_about_genaral_style_selection' => ['style_six'],
                ],
            ]
        );

        $this->add_control(
            'gofly_about_genaral_counter_area_three_icon',
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
                'condition'   => [
                    'gofly_about_genaral_style_selection' => 'style_three',
                ],
            ]
        );

        $this->add_control(
            'gofly_about_genaral_counter_area_three_number',
            [
                'label'       => esc_html__('Counter Number', 'gofly-core'),
                'type'        => \Elementor\Controls_Manager::TEXT,
                'default'     => esc_html__('26', 'gofly-core'),
                'placeholder' => esc_html__('write your text here', 'gofly-core'),
                'label_block' => true,
                'condition'   => [
                    'gofly_about_genaral_style_selection' => ['style_three', 'style_six'],
                ],
            ]
        );

        $this->add_control(
            'gofly_about_genaral_counter_area_three_sign',
            [
                'label'       => esc_html__('Counter Sign', 'gofly-core'),
                'type'        => \Elementor\Controls_Manager::TEXT,
                'default'     => esc_html__('K+', 'gofly-core'),
                'placeholder' => esc_html__('write your text here', 'gofly-core'),
                'label_block' => true,
                'condition'   => [
                    'gofly_about_genaral_style_selection' => ['style_three', 'style_six'],
                ],
            ]
        );

        $this->add_control(
            'gofly_about_genaral_counter_area_three_title',
            [
                'label'       => esc_html__('Counter Title', 'gofly-core'),
                'type'        => \Elementor\Controls_Manager::TEXT,
                'default'     => wp_kses('Tour Completed', wp_kses_allowed_html('post')),
                'placeholder' => esc_html__('write your title here', 'gofly-core'),
                'label_block' => true,
                'condition'   => [
                    'gofly_about_genaral_style_selection' => ['style_three', 'style_six'],
                ],
            ]
        );

        $this->add_control(
            'gofly_about_genaral_counter_area_five_icon',
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
                'condition'   => [
                    'gofly_about_genaral_style_selection' => ['style_five'],
                ],
            ]
        );

        $this->add_control(
            'gofly_about_genaral_counter_area_three_about_image_one',
            [
                'label'   => esc_html__('About Image One', 'gofly-core'),
                'type'    => \Elementor\Controls_Manager::MEDIA,
                'default' => [
                    'url' => \Elementor\Utils::get_placeholder_image_src(),
                ],
                'condition'   => [
                    'gofly_about_genaral_style_selection' => ['style_three', 'style_five', 'style_six'],
                ],
            ]
        );

        $this->add_control(
            'gofly_about_genaral_counter_area_three_about_image_two',
            [
                'label'   => esc_html__('About Image Two', 'gofly-core'),
                'type'    => \Elementor\Controls_Manager::MEDIA,
                'default' => [
                    'url' => \Elementor\Utils::get_placeholder_image_src(),
                ],
                'condition'   => [
                    'gofly_about_genaral_style_selection' => ['style_three', 'style_five'],
                ],
            ]
        );

        $this->add_control(
            'gofly_about_genaral_counter_area_three_about_image_three',
            [
                'label'   => esc_html__('About Image Three', 'gofly-core'),
                'type'    => \Elementor\Controls_Manager::MEDIA,
                'default' => [
                    'url' => \Elementor\Utils::get_placeholder_image_src(),
                ],
                'condition'   => [
                    'gofly_about_genaral_style_selection' => ['style_three'],
                ],
            ]
        );

        $this->add_control(
            'gofly_about_style_six_vector_image',
            [
                'label'       => esc_html__('Vector Image', 'gofly-core'),
                'type'        => \Elementor\Controls_Manager::MEDIA,
                'media_types' => ['svg', 'image'],
                'default'     => [
                    'url' => \Elementor\Utils::get_placeholder_image_src(),
                ],
                'condition'   => [
                    'gofly_about_genaral_style_selection' => ['style_six'],
                ],
            ]
        );

        $this->end_controls_section();


        $this->start_controls_section(
            'gofly_about_gallery_genaral',
            [
                'label'     => esc_html__('Gallary Section', 'gofly-core'),
                'condition' => [
                    'gofly_about_genaral_style_selection' => 'style_one',
                ],
            ]
        );


        $this->add_control(
            'gofly_about_gallery_genaral_icon_image',
            [
                'label'       => esc_html__('Logo Image', 'gofly-core'),
                'type'        => \Elementor\Controls_Manager::MEDIA,
                'media_types' => ['svg'],
                'default'     => [
                    'url' => \Elementor\Utils::get_placeholder_image_src(),
                ]
            ]
        );

        $this->add_control(
            'gofly_about_gallery_genaral_banner_image_one',
            [
                'label'   => esc_html__('Banner Image One', 'gofly-core'),
                'type'    => \Elementor\Controls_Manager::MEDIA,
                'default' => [
                    'url' => \Elementor\Utils::get_placeholder_image_src(),
                ],
            ]
        );

        $this->add_control(
            'gofly_about_gallery_genaral_banner_image_two',
            [
                'label'   => esc_html__('Banner Image Two', 'gofly-core'),
                'type'    => \Elementor\Controls_Manager::MEDIA,
                'default' => [
                    'url' => \Elementor\Utils::get_placeholder_image_src(),
                ],
            ]
        );

        $this->add_control(
            'gofly_about_gallery_genaral_vector_image',
            [
                'label'   => esc_html__('Vector Image', 'gofly-core'),
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

        $this->end_controls_section();


        $this->start_controls_section(
            'gofly_about_service_genaral',
            [
                'label'     => esc_html__('Service Section', 'gofly-core'),
                'condition' => [
                    'gofly_about_genaral_style_selection' => 'style_one',
                ],
            ]
        );

        $this->add_control(
            'gofly_about_service_genaral_title',
            [
                'label'       => esc_html__('Title', 'gofly-core'),
                'type'        => \Elementor\Controls_Manager::TEXT,
                'default'     => wp_kses('We Provide to Smart Services', wp_kses_allowed_html('post')),
                'placeholder' => esc_html__('write your title here', 'gofly-core'),
                'label_block' => true,
            ]
        );


        $repeater = new \Elementor\Repeater();

        $repeater->add_control(
            'gofly_about_service_genaral_content_icon',
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
            'gofly_about_service_genaral_content_service_title',
            [
                'label'       => esc_html__('Title', 'gofly-core'),
                'type'        => \Elementor\Controls_Manager::TEXT,
                'default'     => wp_kses('Hotel <br> Booking', wp_kses_allowed_html('post')),
                'placeholder' => esc_html__('write your title here', 'gofly-core'),
                'label_block' => true,
            ]
        );

        $repeater->add_control(
            'gofly_about_service_genaral_content_service_title_url',
            [
                'label'       => esc_html__('URL/Link', 'gofly-core'),
                'type'        => \Elementor\Controls_Manager::URL,
                'default'     => ['url' => '#'],
                'placeholder' => esc_html__('write your url here', 'gofly-core'),
                'label_block' => true,
            ]
        );

        $this->add_control(
            'gofly_about_service_genaral_content_service_list',
            [
                'label'   => esc_html__('Service List', 'gofly-core'),
                'type'    => \Elementor\Controls_Manager::REPEATER,
                'fields'  => $repeater->get_controls(),
                'default' => [
                    [
                        'gofly_about_service_genaral_content_service_title' => wp_kses('Hotel <br> Booking', wp_kses_allowed_html('post')),
                    ],
                    [
                        'gofly_about_service_genaral_content_service_title' => wp_kses('Top <br> Destinations', wp_kses_allowed_html('post')),
                    ],
                    [
                        'gofly_about_service_genaral_content_service_title' => wp_kses('Visa <br> Processing', wp_kses_allowed_html('post')),
                    ],
                    [
                        'gofly_about_service_genaral_content_service_title' => wp_kses('Tour <br> Experineces', wp_kses_allowed_html('post')),
                    ],
                    [
                        'gofly_about_service_genaral_content_service_title' => wp_kses('Customize <br> Package', wp_kses_allowed_html('post')),
                    ],
                    [
                        'gofly_about_service_genaral_content_service_title' => wp_kses('Adventure <br> Travel', wp_kses_allowed_html('post')),
                    ],
                ],
                'title_field' => '{{{ gofly_about_service_genaral_content_service_title }}}',
            ]
        );


        $this->add_control(
            'gofly_about_genaral_rating_area',
            [
                'label'     => esc_html__('Rating Area', 'gofly-core'),
                'type'      => \Elementor\Controls_Manager::HEADING,
                'separator' => 'after',
                'condition' => [
                    'gofly_about_genaral_style_selection' => 'style_one',
                ],
            ]
        );

        $this->add_control(
            'gofly_about_genaral_rating_area_title',
            [
                'label'       => esc_html__('Title', 'gofly-core'),
                'type'        => \Elementor\Controls_Manager::TEXT,
                'default'     => wp_kses('Excellent!', wp_kses_allowed_html('post')),
                'placeholder' => esc_html__('write your title here', 'gofly-core'),
                'label_block' => true,
            ]
        );

        $this->add_control(
            'gofly_about_genaral_rating_area_icon_image',
            [
                'label'       => esc_html__('Rating Image', 'gofly-core'),
                'type'        => \Elementor\Controls_Manager::MEDIA,
                'media_types' => ['svg', 'image'],
                'default'     => [
                    'url' => \Elementor\Utils::get_placeholder_image_src(),
                ]
            ]
        );

        $this->add_control(
            'gofly_about_genaral_rating_area_description',
            [
                'label'       => esc_html__('Description', 'gofly-core'),
                'type'        => \Elementor\Controls_Manager::TEXTAREA,
                'default'     => wp_kses('5.0 Rating out of 5.0 based on <span>24K+ reviews</span>', wp_kses_allowed_html('post')),
                'placeholder' => esc_html__('write your title here', 'gofly-core'),
                'label_block' => true,
            ]
        );

        $this->add_control(
            'gofly_about_genaral_rating_area_logo_image',
            [
                'label'       => esc_html__('Logo Image', 'gofly-core'),
                'type'        => \Elementor\Controls_Manager::MEDIA,
                'media_types' => ['svg', 'image'],
                'default'     => [
                    'url' => \Elementor\Utils::get_placeholder_image_src(),
                ]
            ]
        );

        $this->add_control(
            'gofly_about_genaral_rating_area_logo_image_url',
            [
                'label'       => esc_html__('Logo URL/Link', 'gofly-core'),
                'type'        => \Elementor\Controls_Manager::URL,
                'default'     => ['url' => '#'],
                'placeholder' => esc_html__('write your url here', 'gofly-core'),
                'label_block' => true,
            ]
        );

        $this->end_controls_section();

        $this->start_controls_section(
            'gofly_about_service_two_rating',
            [
                'label'     => esc_html__('Rating Section', 'gofly-core'),
                'condition' => [
                    'gofly_about_genaral_style_selection' => 'style_two',
                ],
            ]
        );

        $repeater = new \Elementor\Repeater();

        $repeater->add_control(
            'gofly_about_service_two_rating_style_selection',
            [
                'label'   => esc_html__('Select Style', 'gofly-core'),
                'type'    => Controls_Manager::SELECT,
                'options' => [
                    'trustpilot'  => esc_html__('Trustpilot', 'gofly-core'),
                    'tripadvisor' => esc_html__('Tripadvisor', 'gofly-core'),
                ],
                'default' => 'trustpilot',
            ]
        );

        $repeater->add_control(
            'gofly_about_service_two_rating_number',
            [
                'label'       => esc_html__('Rating Number', 'gofly-core'),
                'type'        => \Elementor\Controls_Manager::TEXT,
                'default'     => esc_html__('4.5', 'gofly-core'),
                'placeholder' => esc_html__('write your text here', 'gofly-core'),
                'label_block' => true,
            ]
        );

        $repeater->add_control(
            'gofly_about_service_two_rating_url_link',
            [
                'label'       => esc_html__('Rating URL/Link', 'gofly-core'),
                'type'        => \Elementor\Controls_Manager::URL,
                'default'     => ['url' => '#'],
                'placeholder' => esc_html__('write your url here', 'gofly-core'),
                'label_block' => true,
            ]
        );

        $repeater->add_control(
            'gofly_about_service_two_rating_company_logo',
            [
                'label'       => esc_html__('Logo Image', 'gofly-core'),
                'type'        => \Elementor\Controls_Manager::MEDIA,
                'media_types' => ['svg', 'image'],
                'default'     => [
                    'url' => \Elementor\Utils::get_placeholder_image_src(),
                ]
            ]
        );

        $repeater->add_control(
            'gofly_about_service_two_rating_title',
            [
                'label'       => esc_html__('Rating Title', 'gofly-core'),
                'type'        => \Elementor\Controls_Manager::TEXT,
                'default'     => esc_html__('Reviews', 'gofly-core'),
                'placeholder' => esc_html__('write your text here', 'gofly-core'),
                'label_block' => true,
            ]
        );

        $repeater->add_control(
            'gofly_about_service_two_rating_icon_image',
            [
                'label'       => esc_html__('Rating Icon Image', 'gofly-core'),
                'type'        => \Elementor\Controls_Manager::MEDIA,
                'media_types' => ['svg', 'image'],
                'default'     => [
                    'url' => \Elementor\Utils::get_placeholder_image_src(),
                ]
            ]
        );

        $this->add_control(
            'gofly_about_service_two_rating_list',
            [
                'label'   => esc_html__('Content List', 'gofly-core'),
                'type'    => \Elementor\Controls_Manager::REPEATER,
                'fields'  => $repeater->get_controls(),
                'default' => [
                    [
                        'gofly_about_service_two_rating_title' => esc_html('Reviews'),

                    ],
                    [
                        'gofly_about_service_two_rating_title' => esc_html(''),
                    ],
                ],
                'title_field' => '{{{ gofly_about_service_two_rating_title }}}',
            ]
        );

        $this->end_controls_section();

        //============Style Four Content=============//

        $this->start_controls_section(
            'gofly_about_video_area',
            [
                'label'     => esc_html__('Video Section', 'gofly-core'),
                'condition' => [
                    'gofly_about_genaral_style_selection' => 'style_four',
                ],
            ]
        );

        $this->add_control(
            'gofly_about_video_area_banner_image',
            [
                'label'   => esc_html__('Banner Image', 'gofly-core'),
                'type'    => \Elementor\Controls_Manager::MEDIA,
                'default' => [
                    'url' => \Elementor\Utils::get_placeholder_image_src(),
                ],
            ]
        );

        $this->add_control(
            'gofly_about_video_area_video_select_type',
            [
                'label'   => esc_html__('Select Type', 'gofly-core'),
                'type'    => \Elementor\Controls_Manager::SELECT,
                'options' => [
                    'upload' => esc_html__('Upload', 'gofly-core'),
                    'url'    => esc_html__('URL/Link', 'gofly-core'),
                ],
                'default' => 'upload',
            ]
        );

        $this->add_control(
            'gofly_video_with_contact_genaral_video_area_upload',
            [
                'label'       => esc_html__('Choose Video File', 'gofly-core'),
                'type'        => \Elementor\Controls_Manager::MEDIA,
                'media_types' => ['video'],
                'condition'   => [
                    'gofly_about_video_area_video_select_type' => 'upload',
                ],

            ]
        );

        $this->add_control(
            'gofly_video_with_contact_genaral_video_area_upload_link',
            [
                'label'   => esc_html__('Video URL/Link', 'gofly-core'),
                'type'    => \Elementor\Controls_Manager::URL,
                'options' => ['url', 'is_external', 'nofollow'],
                'default' => [
                    'url'         => '#',
                    'is_external' => true,
                    'nofollow'    => true,
                ],
                'label_block' => true,
                'condition'   => [
                    'gofly_about_video_area_video_select_type' => 'url',
                ],

            ]
        );

        $this->add_control(
            'gofly_video_with_contact_genaral_video_area_vector_image',
            [
                'label'   => esc_html__('Vector Image', 'gofly-core'),
                'type'    => \Elementor\Controls_Manager::MEDIA,
                'default' => [
                    'url' => \Elementor\Utils::get_placeholder_image_src(),
                ],
                'media_types' => ['image', 'svg'],
            ]
        );


        $this->end_controls_section();

        $this->start_controls_section(
            'gofly_about_four_counter_section',
            [
                'label'     => esc_html__('Counter Section', 'gofly-core'),
                'condition' => [
                    'gofly_about_genaral_style_selection' => 'style_four',
                ],
            ]
        );

        $repeater = new \Elementor\Repeater();

        $repeater->add_control(
            'gofly_about_four_counter_section_icon',
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
            'gofly_about_four_counter_section_counter_number',
            [
                'label'       => esc_html__('Counter Number', 'gofly-core'),
                'type'        => \Elementor\Controls_Manager::TEXT,
                'default'     => esc_html__('1', 'gofly-core'),
                'placeholder' => esc_html__('write your text here', 'gofly-core'),
                'label_block' => true,
            ]
        );

        $repeater->add_control(
            'gofly_about_four_counter_section_counter_sign',
            [
                'label'       => esc_html__('Counter Sign', 'gofly-core'),
                'type'        => \Elementor\Controls_Manager::TEXT,
                'default'     => esc_html__('K+', 'gofly-core'),
                'placeholder' => esc_html__('write your text here', 'gofly-core'),
                'label_block' => true,
            ]
        );


        $repeater->add_control(
            'gofly_about_four_counter_section_counter_title',
            [
                'label'       => esc_html__('Counter Title', 'gofly-core'),
                'type'        => \Elementor\Controls_Manager::TEXT,
                'default'     => wp_kses('Tour Completed', wp_kses_allowed_html('post')),
                'placeholder' => esc_html__('write your title here', 'gofly-core'),
                'label_block' => true,
            ]
        );

        $this->add_control(
            'gofly_about_service_four_counter_list',
            [
                'label'   => esc_html__('Counter List', 'gofly-core'),
                'type'    => \Elementor\Controls_Manager::REPEATER,
                'fields'  => $repeater->get_controls(),
                'default' => [
                    [
                        'gofly_about_four_counter_section_counter_title' => esc_html('Tour Completed'),
                    ],
                    [
                        'gofly_about_four_counter_section_counter_title' => esc_html('Travel Experience'),
                    ],
                    [
                        'gofly_about_four_counter_section_counter_title' => esc_html('Happy Traveler'),
                    ],
                    [
                        'gofly_about_four_counter_section_counter_title' => esc_html('Retention Rate'),
                    ],
                ],
                'title_field' => '{{{ gofly_about_four_counter_section_counter_title }}}',
            ]
        );


        $this->end_controls_section();


        //============Style One Start=============//

        $this->start_controls_section(
            'gofly_about_style_general',
            [
                'label'     => esc_html__('Styles', 'gofly-core'),
                'tab'       => Controls_Manager::TAB_STYLE,
                'condition' => [
                    'gofly_about_genaral_style_selection' => 'style_one',
                ],
            ]
        );

        $this->add_control(
            'gofly_about_style_general_global_section',
            [
                'label'     => esc_html__('Global Section', 'gofly-core'),
                'type'      => \Elementor\Controls_Manager::HEADING,
                'separator' => 'after',
            ]
        );

        $this->add_control(
            'gofly_about_style_general_global_section_bg_color',
            [
                'label' => esc_html__('Background Color', 'gofly-core'),
                'type'  => Controls_Manager::COLOR,
            ]
        );

        $this->add_control(
            'gofly_about_style_general_header_title',
            [
                'label'     => esc_html__('Header Title', 'gofly-core'),
                'type'      => \Elementor\Controls_Manager::HEADING,
                'separator' => 'after',
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'label'    => esc_html__('Typography', 'gofly-core'),
                'name'     => 'gofly_about_style_general_header_title_typ',
                'selector' => '{{WRAPPER}} .section-title h2',

            ]
        );

        $this->add_control(
            'gofly_about_style_general_header_title_color',
            [
                'label'     => esc_html__('Color', 'gofly-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .section-title h2' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'gofly_about_style_general_header_description',
            [
                'label'     => esc_html__('Header Description', 'gofly-core'),
                'type'      => \Elementor\Controls_Manager::HEADING,
                'separator' => 'after',
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'label'    => esc_html__('Typography', 'gofly-core'),
                'name'     => 'gofly_about_style_general_header_description_typ',
                'selector' => '{{WRAPPER}} .section-title p',

            ]
        );

        $this->add_control(
            'gofly_about_style_general_header_description_color',
            [
                'label'     => esc_html__('Color', 'gofly-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .section-title p' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'gofly_about_style_general_header_description_span_color',
            [
                'label'     => esc_html__('Span Color', 'gofly-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .home2-about-section .section-title p span' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'gofly_about_style_general_counter_area',
            [
                'label'     => esc_html__('Counter Area', 'gofly-core'),
                'type'      => \Elementor\Controls_Manager::HEADING,
                'separator' => 'before',
            ]
        );

        $this->add_control(
            'gofly_about_style_general_counter_area_icon',
            [
                'label'     => esc_html__('Icon', 'gofly-core'),
                'type'      => \Elementor\Controls_Manager::HEADING,
                'separator' => 'after',
            ]
        );

        $this->add_control(
            'gofly_about_style_general_counter_area_icon_size',
            [
                'label'      => esc_html__('Icon Size', 'gofly-core'),
                'type'       => \Elementor\Controls_Manager::SLIDER,
                'size_units' => ['px', '%', 'rem', 'custom'],
                'range'      => [
                    'px' => [
                        'min'  => 0,
                        'max'  => 100,
                        'step' => 1,
                    ],
                    '%' => [
                        'min' => 0,
                        'max' => 100,
                    ],
                ],
                'default' => [
                    'unit' => 'px',
                    'size' => 63,
                ],
                'selectors' => [
                    '{{WRAPPER}} .home2-about-section .counter-area svg' => 'width: {{SIZE}}{{UNIT}};',
                ],
            ]
        );


        $this->add_control(
            'gofly_about_style_general_counter_area_icon_color',
            [
                'label'     => esc_html__('Color', 'gofly-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .home2-about-section .counter-area svg' => 'fill: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'gofly_about_style_general_counter_area_counter_number',
            [
                'label'     => esc_html__('Counter Number', 'gofly-core'),
                'type'      => \Elementor\Controls_Manager::HEADING,
                'separator' => 'after',
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'label'    => esc_html__('Typography', 'gofly-core'),
                'name'     => 'gofly_about_style_general_counter_area_counter_number_typ',
                'selector' => '{{WRAPPER}} .home2-about-section .counter-area .single-counter h2',

            ]
        );

        $this->add_control(
            'gofly_about_style_general_counter_area_counter_number_color',
            [
                'label'     => esc_html__('Color', 'gofly-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .home2-about-section .counter-area .single-counter h2' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'gofly_about_style_general_counter_area_counter_sign',
            [
                'label'     => esc_html__('Counter Sign', 'gofly-core'),
                'type'      => \Elementor\Controls_Manager::HEADING,
                'separator' => 'after',
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'label'    => esc_html__('Typography', 'gofly-core'),
                'name'     => 'gofly_about_style_general_counter_area_counter_sign_typ',
                'selector' => '{{WRAPPER}} .home2-about-section .counter-area .single-counter h2 sup',

            ]
        );

        $this->add_control(
            'gofly_about_style_general_counter_area_counter_sign_color',
            [
                'label'     => esc_html__('Color', 'gofly-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .home2-about-section .counter-area .single-counter h2 sup' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'gofly_about_style_general_counter_area_counter_title',
            [
                'label'     => esc_html__('Counter Title', 'gofly-core'),
                'type'      => \Elementor\Controls_Manager::HEADING,
                'separator' => 'after',
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'label'    => esc_html__('Typography', 'gofly-core'),
                'name'     => 'gofly_about_style_general_counter_area_counter_title_typ',
                'selector' => '{{WRAPPER}} .home2-about-section .counter-area .single-counter span',

            ]
        );

        $this->add_control(
            'gofly_about_style_general_counter_area_counter_title_color',
            [
                'label'     => esc_html__('Color', 'gofly-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .home2-about-section .counter-area .single-counter span' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'gofly_about_style_general_gallery_area',
            [
                'label'     => esc_html__('Gallery Area', 'gofly-core'),
                'type'      => \Elementor\Controls_Manager::HEADING,
                'separator' => 'before',
            ]
        );

        $this->add_control(
            'gofly_about_style_general_gallery_area_logo',
            [
                'label'     => esc_html__('Logo', 'gofly-core'),
                'type'      => \Elementor\Controls_Manager::HEADING,
                'separator' => 'after',
            ]
        );

        $this->add_control(
            'gofly_about_style_general_gallery_area_logo_bg_color',
            [
                'label'     => esc_html__('Background Color', 'gofly-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .home2-about-section .about-img-wrap .logo' => 'background-color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'gofly_about_style_general_gallery_area_vector_image',
            [
                'label'     => esc_html__('Vector Image', 'gofly-core'),
                'type'      => \Elementor\Controls_Manager::HEADING,
                'separator' => 'after',
            ]
        );

        $this->add_control(
            'gofly_about_style_general_gallery_area_vector_image_color',
            [
                'label'     => esc_html__('Color', 'gofly-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .home2-about-section .about-img-wrap .vector' => 'fill: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'gofly_about_style_general_service_area',
            [
                'label'     => esc_html__('Service Area', 'gofly-core'),
                'type'      => \Elementor\Controls_Manager::HEADING,
                'separator' => 'before',
            ]
        );

        $this->add_control(
            'gofly_about_style_general_service_area_bg_color',
            [
                'label'     => esc_html__('Background Color', 'gofly-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .home2-about-section .service-area .single-service' => 'background-color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'gofly_about_style_general_service_area_title',
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
                'name'     => 'gofly_about_style_general_service_area_title_typ',
                'selector' => '{{WRAPPER}} .home2-about-section .service-area h6',

            ]
        );

        $this->add_control(
            'gofly_about_style_general_service_area_title_color',
            [
                'label'     => esc_html__('Color', 'gofly-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .home2-about-section .service-area h6' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'gofly_about_style_general_service_area_content_icon',
            [
                'label'     => esc_html__('Content Icon', 'gofly-core'),
                'type'      => \Elementor\Controls_Manager::HEADING,
                'separator' => 'after',
            ]
        );

        $this->add_control(
            'gofly_about_style_general_service_area_content_icon_size',
            [
                'label'      => esc_html__('Icon Size', 'gofly-core'),
                'type'       => \Elementor\Controls_Manager::SLIDER,
                'size_units' => ['px', '%', 'rem', 'custom'],
                'range'      => [
                    'px' => [
                        'min'  => 0,
                        'max'  => 100,
                        'step' => 1,
                    ],
                    '%' => [
                        'min' => 0,
                        'max' => 100,
                    ],
                ],
                'default' => [
                    'unit' => 'px',
                    'size' => 30,
                ],
                'selectors' => [
                    '{{WRAPPER}} .home2-about-section .service-area .single-service a svg' => 'width: {{SIZE}}{{UNIT}};',
                ],
            ]
        );

        $this->add_control(
            'gofly_about_style_general_service_area_content_icon_color',
            [
                'label'     => esc_html__('Color', 'gofly-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .home2-about-section .service-area .single-service a svg' => 'fill: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'gofly_about_style_general_service_area_content_icon_hover_color',
            [
                'label'     => esc_html__('Hover Color', 'gofly-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .home2-about-section .service-area .single-service a:hover svg' => 'fill: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'gofly_about_style_general_service_area_content_title',
            [
                'label'     => esc_html__('Content Title', 'gofly-core'),
                'type'      => \Elementor\Controls_Manager::HEADING,
                'separator' => 'after',
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'label'    => esc_html__('Typography', 'gofly-core'),
                'name'     => 'gofly_about_style_general_service_area_content_title_typ',
                'selector' => '{{WRAPPER}} .home2-about-section .service-area .single-service a:hover',

            ]
        );

        $this->add_control(
            'gofly_about_style_general_service_area_content_title_color',
            [
                'label'     => esc_html__('Color', 'gofly-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .home2-about-section .service-area .single-service a' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'gofly_about_style_general_service_area_content_title_hover_color',
            [
                'label'     => esc_html__('Hover Color', 'gofly-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .home2-about-section .service-area .single-service a:hover' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'gofly_about_style_general_rating_area',
            [
                'label'     => esc_html__('Rating Area', 'gofly-core'),
                'type'      => \Elementor\Controls_Manager::HEADING,
                'separator' => 'before',
            ]
        );

        $this->add_control(
            'gofly_about_style_general_rating_area_title',
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
                'name'     => 'gofly_about_style_general_rating_area_title_typ',
                'selector' => '{{WRAPPER}} .home2-about-section .rating-area > span',

            ]
        );

        $this->add_control(
            'gofly_about_style_general_rating_area_title_color',
            [
                'label'     => esc_html__('Color', 'gofly-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .home2-about-section .rating-area > span' => 'color: {{VALUE}};',
                ],
            ]
        );


        $this->add_control(
            'gofly_about_style_general_rating_area_description',
            [
                'label'     => esc_html__('Description', 'gofly-core'),
                'type'      => \Elementor\Controls_Manager::HEADING,
                'separator' => 'after',
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'label'    => esc_html__('Typography', 'gofly-core'),
                'name'     => 'gofly_about_style_general_rating_area_description_typ',
                'selector' => '{{WRAPPER}} .home2-about-section .rating-area p',

            ]
        );

        $this->add_control(
            'gofly_about_style_general_rating_area_description_color',
            [
                'label'     => esc_html__('Color', 'gofly-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .home2-about-section .rating-area p' => 'color: {{VALUE}};',
                ],
            ]
        );
        $this->end_controls_section();

        //============Style Two Start=============//

        $this->start_controls_section(
            'gofly_about_style_two_general',
            [
                'label'     => esc_html__('Styles', 'gofly-core'),
                'tab'       => Controls_Manager::TAB_STYLE,
                'condition' => [
                    'gofly_about_genaral_style_selection' => 'style_two',
                ],
            ]
        );

        $this->add_control(
            'gofly_about_style_two_general_header_title',
            [
                'label'     => esc_html__('Header Title', 'gofly-core'),
                'type'      => \Elementor\Controls_Manager::HEADING,
                'separator' => 'after',
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'label'    => esc_html__('Typography', 'gofly-core'),
                'name'     => 'gofly_about_style_two_general_header_title_typ',
                'selector' => '{{WRAPPER}} .section-title h2',

            ]
        );

        $this->add_control(
            'gofly_about_style_two_general_header_title_color',
            [
                'label'     => esc_html__('Color', 'gofly-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .section-title h2' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'gofly_about_style_two_general_short_description',
            [
                'label'     => esc_html__('Short Description', 'gofly-core'),
                'type'      => \Elementor\Controls_Manager::HEADING,
                'separator' => 'after',
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'label'    => esc_html__('Typography', 'gofly-core'),
                'name'     => 'gofly_about_style_two_general_short_description_typ',
                'selector' => '{{WRAPPER}} .home3-about-section .about-content .section-title h4',

            ]
        );

        $this->add_control(
            'gofly_about_style_two_general_short_description_color',
            [
                'label'     => esc_html__('Color', 'gofly-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .home3-about-section .about-content .section-title h4' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'gofly_about_style_two_general_description',
            [
                'label'     => esc_html__('Description', 'gofly-core'),
                'type'      => \Elementor\Controls_Manager::HEADING,
                'separator' => 'after',
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'label'    => esc_html__('Typography', 'gofly-core'),
                'name'     => 'gofly_about_style_two_general_description_typ',
                'selector' => '{{WRAPPER}} .section-title p',

            ]
        );

        $this->add_control(
            'gofly_about_style_two_general_description_color',
            [
                'label'     => esc_html__('Color', 'gofly-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .section-title p' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'gofly_about_style_two_general_button',
            [
                'label'     => esc_html__('Button', 'gofly-core'),
                'type'      => \Elementor\Controls_Manager::HEADING,
                'separator' => 'after',
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'label'    => esc_html__('Typography', 'gofly-core'),
                'name'     => 'gofly_about_style_two_general_button_typ',
                'selector' => '{{WRAPPER}} .home3-about-section .about-content .section-title a',

            ]
        );

        $this->add_control(
            'gofly_about_style_two_general_button_color',
            [
                'label'     => esc_html__('Color', 'gofly-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .home3-about-section .about-content .section-title a' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'gofly_about_style_two_general_button_hover_color',
            [
                'label'     => esc_html__('Hover Color', 'gofly-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .home3-about-section .about-content .section-title a:hover' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'gofly_about_style_two_general_button_icon_color',
            [
                'label'     => esc_html__('Icon Color', 'gofly-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .home3-about-section .about-content .section-title a svg' => 'stroke: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'gofly_about_style_two_general_button_icon_hover_color',
            [
                'label'     => esc_html__('Hover Icon Color', 'gofly-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .home3-about-section .about-content .section-title a:hover svg' => 'stroke: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'gofly_about_style_two_general_rating_area',
            [
                'label'     => esc_html__('Rating Area', 'gofly-core'),
                'type'      => \Elementor\Controls_Manager::HEADING,
                'separator' => 'before',
            ]
        );

        $this->add_control(
            'gofly_about_style_two_general_rating_area_border_color',
            [
                'label'     => esc_html__('Border Color', 'gofly-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .home3-about-section .about-content .review-area' => 'border: 1px solid {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'gofly_about_style_two_general_rating_area_bg_color',
            [
                'label'     => esc_html__('Background Color', 'gofly-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .home3-about-section .about-content .review-area' => 'background-color: {{VALUE}};',
                ],
            ]
        );


        $this->add_control(
            'gofly_about_style_two_general_rating_area_number',
            [
                'label'     => esc_html__('Rating Number', 'gofly-core'),
                'type'      => \Elementor\Controls_Manager::HEADING,
                'separator' => 'after',
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'label'    => esc_html__('Typography', 'gofly-core'),
                'name'     => 'gofly_about_style_two_general_rating_area_number_typ',
                'selector' => '{{WRAPPER}} .home3-about-section .about-content .review-area .single-rating strong',

            ]
        );

        $this->add_control(
            'gofly_about_style_two_general_rating_area_number_color',
            [
                'label'     => esc_html__('Color', 'gofly-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .home3-about-section .about-content .review-area .single-rating strong' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'gofly_about_style_two_general_rating_area_number_border_color',
            [
                'label'     => esc_html__('Border Color', 'gofly-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .home3-about-section .about-content .review-area .single-rating strong' => 'border: 1px solid {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'gofly_about_style_two_general_rating_area_number_bg_color',
            [
                'label'     => esc_html__('Background Color', 'gofly-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .home3-about-section .about-content .review-area .single-rating strong' => 'background-color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'gofly_about_style_two_general_rating_area_divider',
            [
                'label'     => esc_html__('Divider', 'gofly-core'),
                'type'      => \Elementor\Controls_Manager::HEADING,
                'separator' => 'after',
            ]
        );

        $this->add_control(
            'gofly_about_style_two_general_rating_area_divider_color',
            [
                'label'     => esc_html__('Color', 'gofly-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .home3-about-section .about-content .review-area .divider' => 'fill: {{VALUE}};',
                ],
            ]
        );

        $this->end_controls_section();

        //============Style Three Start=============//

        $this->start_controls_section(
            'gofly_about_style_three_general',
            [
                'label'     => esc_html__('Styles', 'gofly-core'),
                'tab'       => Controls_Manager::TAB_STYLE,
                'condition' => [
                    'gofly_about_genaral_style_selection' => 'style_three',
                ],
            ]
        );

        $this->add_control(
            'gofly_about_style_three_general_global_section',
            [
                'label'     => esc_html__('Global Section', 'gofly-core'),
                'type'      => \Elementor\Controls_Manager::HEADING,
                'separator' => 'after',
            ]
        );

        $this->add_control(
            'gofly_about_style_three_general_global_section_color',
            [
                'label' => esc_html__('Background Color', 'gofly-core'),
                'type'  => Controls_Manager::COLOR,
            ]
        );


        $this->add_control(
            'gofly_about_style_three_general_title',
            [
                'label'     => esc_html__('Header Title', 'gofly-core'),
                'type'      => \Elementor\Controls_Manager::HEADING,
                'separator' => 'after',
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'label'    => esc_html__('Typography', 'gofly-core'),
                'name'     => 'gofly_about_style_three_general_title_typ',
                'selector' => '{{WRAPPER}} .section-title h2',

            ]
        );

        $this->add_control(
            'gofly_about_style_three_general_title_color',
            [
                'label'     => esc_html__('Color', 'gofly-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .section-title h2' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'gofly_about_style_three_general_description',
            [
                'label'     => esc_html__('Description', 'gofly-core'),
                'type'      => \Elementor\Controls_Manager::HEADING,
                'separator' => 'after',
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'label'    => esc_html__('Typography', 'gofly-core'),
                'name'     => 'gofly_about_style_three_general_description_typ',
                'selector' => '{{WRAPPER}} .section-title p',

            ]
        );

        $this->add_control(
            'gofly_about_style_three_general_description_color',
            [
                'label'     => esc_html__('Color', 'gofly-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .section-title p' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'gofly_about_style_three_general_content_list',
            [
                'label'     => esc_html__('Content List', 'gofly-core'),
                'type'      => \Elementor\Controls_Manager::HEADING,
                'separator' => 'after',
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'label'    => esc_html__('Typography', 'gofly-core'),
                'name'     => 'gofly_about_style_three_general_content_list_typ',
                'selector' => '{{WRAPPER}} .home4-about-section .about-wrapper .about-content > ul li',

            ]
        );

        $this->add_control(
            'gofly_about_style_three_general_content_list_color',
            [
                'label'     => esc_html__('Color', 'gofly-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .home4-about-section .about-wrapper .about-content > ul li' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'gofly_about_style_three_general_content_list_icon_color',
            [
                'label'     => esc_html__('Icon Color', 'gofly-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .home4-about-section .about-wrapper .about-content > ul li svg' => 'fill: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'gofly_about_style_three_general_content_list_bg_color',
            [
                'label'     => esc_html__('Background Color', 'gofly-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .home4-about-section .about-wrapper .about-content > ul li' => 'background-color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'gofly_about_style_three_general_counter_area_one',
            [
                'label'     => esc_html__('Counter Area One', 'gofly-core'),
                'type'      => \Elementor\Controls_Manager::HEADING,
                'separator' => 'before',
            ]
        );

        $this->add_control(
            'gofly_about_style_three_general_counter_area_one_number',
            [
                'label'     => esc_html__('Counter Number', 'gofly-core'),
                'type'      => \Elementor\Controls_Manager::HEADING,
                'separator' => 'after',
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'label'    => esc_html__('Typography', 'gofly-core'),
                'name'     => 'gofly_about_style_three_general_counter_area_one_number_typ',
                'selector' => '{{WRAPPER}} .home4-about-section .about-wrapper .about-content .counter-wrapper .single-counter h2',

            ]
        );

        $this->add_control(
            'gofly_about_style_three_general_counter_area_one_number_color',
            [
                'label'     => esc_html__('Color', 'gofly-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .home4-about-section .about-wrapper .about-content .counter-wrapper .single-counter h2' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'gofly_about_style_three_general_counter_area_one_sign',
            [
                'label'     => esc_html__('Counter Sign', 'gofly-core'),
                'type'      => \Elementor\Controls_Manager::HEADING,
                'separator' => 'after',
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'label'    => esc_html__('Typography', 'gofly-core'),
                'name'     => 'gofly_about_style_three_general_counter_area_one_sign_typ',
                'selector' => '{{WRAPPER}} .home4-about-section .about-wrapper .about-content .counter-wrapper .single-counter h2 sup',

            ]
        );

        $this->add_control(
            'gofly_about_style_three_general_counter_area_one_sign_color',
            [
                'label'     => esc_html__('Color', 'gofly-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .home4-about-section .about-wrapper .about-content .counter-wrapper .single-counter h2 sup' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'gofly_about_style_three_general_counter_area_one_title',
            [
                'label'     => esc_html__('Counter Title', 'gofly-core'),
                'type'      => \Elementor\Controls_Manager::HEADING,
                'separator' => 'after',
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'label'    => esc_html__('Typography', 'gofly-core'),
                'name'     => 'gofly_about_style_three_general_counter_area_one_title_typ',
                'selector' => '{{WRAPPER}} .home4-about-section .about-wrapper .about-content .counter-wrapper .single-counter span',

            ]
        );

        $this->add_control(
            'gofly_about_style_three_general_counter_area_one_title_color',
            [
                'label'     => esc_html__('Color', 'gofly-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .home4-about-section .about-wrapper .about-content .counter-wrapper .single-counter span' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'gofly_about_style_three_general_counter_area_two',
            [
                'label'     => esc_html__('Counter Area Two', 'gofly-core'),
                'type'      => \Elementor\Controls_Manager::HEADING,
                'separator' => 'before',
            ]
        );

        $this->add_control(
            'gofly_about_style_three_general_counter_area_two_number',
            [
                'label'     => esc_html__('Counter Two', 'gofly-core'),
                'type'      => \Elementor\Controls_Manager::HEADING,
                'separator' => 'after',
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'label'    => esc_html__('Typography', 'gofly-core'),
                'name'     => 'gofly_about_style_three_general_counter_area_two_number_typ',
                'selector' => '{{WRAPPER}} .home4-about-section .about-wrapper .about-content .counter-wrapper .counter-area h6',

            ]
        );

        $this->add_control(
            'gofly_about_style_three_general_counter_area_two_number_color',
            [
                'label'     => esc_html__('Color', 'gofly-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .home4-about-section .about-wrapper .about-content .counter-wrapper .counter-area h6' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'gofly_about_style_three_general_counter_divider',
            [
                'label'     => esc_html__('Divider', 'gofly-core'),
                'type'      => \Elementor\Controls_Manager::HEADING,
                'separator' => 'after',
            ]
        );

        $this->add_control(
            'gofly_about_style_three_general_counter_divider_color',
            [
                'label'     => esc_html__('Color', 'gofly-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .home4-about-section .about-wrapper .about-content .divider' => 'fill: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'gofly_about_style_three_general_counter_area_button',
            [
                'label'     => esc_html__('Button', 'gofly-core'),
                'type'      => \Elementor\Controls_Manager::HEADING,
                'separator' => 'after',
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'label'    => esc_html__('Typography', 'gofly-core'),
                'name'     => 'gofly_about_style_three_general_counter_area_button_typ',
                'selector' => '{{WRAPPER}} .home4-about-section .about-wrapper .about-content .btn-area .about-btn',

            ]
        );

        $this->add_control(
            'gofly_about_style_three_general_counter_area_button_color',
            [
                'label'     => esc_html__('Color', 'gofly-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .home4-about-section .about-wrapper .about-content .btn-area .about-btn' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'gofly_about_style_three_general_counter_area_button_hover_color',
            [
                'label'     => esc_html__('Hover Color', 'gofly-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .home4-about-section .about-wrapper .about-content .btn-area .about-btn:hover' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'gofly_about_style_three_general_counter_area_button_icon_color',
            [
                'label'     => esc_html__('Icon Color', 'gofly-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .home4-about-section .about-wrapper .about-content .btn-area .about-btn svg' => 'stroke: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'gofly_about_style_three_general_counter_area_button_hover_icon_color',
            [
                'label'     => esc_html__('Hover Icon Color', 'gofly-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .home4-about-section .about-wrapper .about-content .btn-area .about-btn:hover svg' => 'stroke: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'gofly_about_style_three_general_counter_area_three',
            [
                'label'     => esc_html__('Counter Area Three', 'gofly-core'),
                'type'      => \Elementor\Controls_Manager::HEADING,
                'separator' => 'before',
            ]
        );

        $this->add_control(
            'gofly_about_style_three_general_counter_area_three_bg_color',
            [
                'label'     => esc_html__('Background Color', 'gofly-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .home4-about-section .about-wrapper .about-img-grp .single-grp .counter-wrapper' => 'background-color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'gofly_about_style_three_general_counter_area_three_icon',
            [
                'label'     => esc_html__('Counter Icon', 'gofly-core'),
                'type'      => \Elementor\Controls_Manager::HEADING,
                'separator' => 'after',
            ]
        );

        $this->add_control(
            'gofly_about_style_three_general_counter_area_three_icon_size',
            [
                'label'      => esc_html__('Icon Size', 'gofly-core'),
                'type'       => \Elementor\Controls_Manager::SLIDER,
                'size_units' => ['px', '%', 'rem', 'custom'],
                'range'      => [
                    'px' => [
                        'min'  => 0,
                        'max'  => 100,
                        'step' => 1,
                    ],
                    '%' => [
                        'min' => 0,
                        'max' => 100,
                    ],
                ],
                'default' => [
                    'unit' => 'px',
                    'size' => 63,
                ],
                'selectors' => [
                    '{{WRAPPER}} .home4-about-section .about-wrapper .about-img-grp .single-grp .counter-wrapper .vector' => 'width: {{SIZE}}{{UNIT}};',
                ],
            ]
        );

        $this->add_control(
            'gofly_about_style_three_general_counter_area_three_icon_color',
            [
                'label'     => esc_html__('Icon Color', 'gofly-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .home4-about-section .about-wrapper .about-img-grp .single-grp .counter-wrapper .vector' => 'fill: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'gofly_about_style_three_general_counter_area_three_counter_number',
            [
                'label'     => esc_html__('Counter Number', 'gofly-core'),
                'type'      => \Elementor\Controls_Manager::HEADING,
                'separator' => 'after',
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'label'    => esc_html__('Typography', 'gofly-core'),
                'name'     => 'gofly_about_style_three_general_counter_area_three_counter_number_typ',
                'selector' => '{{WRAPPER}} .home4-about-section .about-wrapper .about-img-grp .single-grp .counter-wrapper .counter-area h2 strong',

            ]
        );

        $this->add_control(
            'gofly_about_style_three_general_counter_area_three_counter_number_color',
            [
                'label'     => esc_html__('Color', 'gofly-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .home4-about-section .about-wrapper .about-img-grp .single-grp .counter-wrapper .counter-area h2 strong' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'gofly_about_style_three_general_counter_area_three_counter_sign',
            [
                'label'     => esc_html__('Counter Sign', 'gofly-core'),
                'type'      => \Elementor\Controls_Manager::HEADING,
                'separator' => 'after',
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'label'    => esc_html__('Typography', 'gofly-core'),
                'name'     => 'gofly_about_style_three_general_counter_area_three_counter_sign_typ',
                'selector' => '{{WRAPPER}} .home4-about-section .about-wrapper .about-img-grp .single-grp .counter-wrapper .counter-area h2',

            ]
        );

        $this->add_control(
            'gofly_about_style_three_general_counter_area_three_counter_sign_color',
            [
                'label'     => esc_html__('Color', 'gofly-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .home4-about-section .about-wrapper .about-img-grp .single-grp .counter-wrapper .counter-area h2' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'gofly_about_style_three_general_counter_area_three_counter_title',
            [
                'label'     => esc_html__('Counter Title', 'gofly-core'),
                'type'      => \Elementor\Controls_Manager::HEADING,
                'separator' => 'after',
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'label'    => esc_html__('Typography', 'gofly-core'),
                'name'     => 'gofly_about_style_three_general_counter_area_three_counter_title_typ',
                'selector' => '{{WRAPPER}} .home4-about-section .about-wrapper .about-img-grp .single-grp .counter-wrapper .counter-area span',

            ]
        );

        $this->add_control(
            'gofly_about_style_three_general_counter_area_three_counter_title_color',
            [
                'label'     => esc_html__('Color', 'gofly-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .home4-about-section .about-wrapper .about-img-grp .single-grp .counter-wrapper .counter-area span' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->end_controls_section();

        //============Style Four Start=============//

        $this->start_controls_section(
            'gofly_about_style_four_general',
            [
                'label'     => esc_html__('Styles', 'gofly-core'),
                'tab'       => Controls_Manager::TAB_STYLE,
                'condition' => [
                    'gofly_about_genaral_style_selection' => 'style_four',
                ],
            ]
        );

        $this->add_control(
            'gofly_about_style_four_general_title',
            [
                'label'     => esc_html__('Header Title', 'gofly-core'),
                'type'      => \Elementor\Controls_Manager::HEADING,
                'separator' => 'after',
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'label'    => esc_html__('Typography', 'gofly-core'),
                'name'     => 'gofly_about_style_four_general_title_typ',
                'selector' => '{{WRAPPER}} .section-title h2',

            ]
        );

        $this->add_control(
            'gofly_about_style_four_general_title_color',
            [
                'label'     => esc_html__('Color', 'gofly-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .section-title h2' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'gofly_about_style_four_general_short_description',
            [
                'label'     => esc_html__('Short Description', 'gofly-core'),
                'type'      => \Elementor\Controls_Manager::HEADING,
                'separator' => 'after',
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'label'    => esc_html__('Typography', 'gofly-core'),
                'name'     => 'gofly_about_style_four_general_short_description_typ',
                'selector' => '{{WRAPPER}} .home5-about-section .about-content .section-title h4',

            ]
        );

        $this->add_control(
            'gofly_about_style_four_general_short_description_color',
            [
                'label'     => esc_html__('Color', 'gofly-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .home5-about-section .about-content .section-title h4' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'gofly_about_style_four_general_description',
            [
                'label'     => esc_html__('Description', 'gofly-core'),
                'type'      => \Elementor\Controls_Manager::HEADING,
                'separator' => 'after',
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'label'    => esc_html__('Typography', 'gofly-core'),
                'name'     => 'gofly_about_style_four_general_description_typ',
                'selector' => '{{WRAPPER}} .home5-about-section .about-content .section-title p',

            ]
        );

        $this->add_control(
            'gofly_about_style_four_general_description_color',
            [
                'label'     => esc_html__('Color', 'gofly-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .home5-about-section .about-content .section-title p' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'gofly_about_style_four_general_button',
            [
                'label'     => esc_html__('Button', 'gofly-core'),
                'type'      => \Elementor\Controls_Manager::HEADING,
                'separator' => 'after',
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'label'    => esc_html__('Typography', 'gofly-core'),
                'name'     => 'gofly_about_style_four_general_button_typ',
                'selector' => '{{WRAPPER}} .home5-about-section .about-content .section-title a',

            ]
        );

        $this->add_control(
            'gofly_about_style_four_general_button_color',
            [
                'label'     => esc_html__('Color', 'gofly-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .home5-about-section .about-content .section-title a' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'gofly_about_style_four_general_button_hover_color',
            [
                'label'     => esc_html__('Hover Color', 'gofly-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .home5-about-section .about-content .section-title a:hover' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'gofly_about_style_four_general_button_icon_color',
            [
                'label'     => esc_html__('Icon Color', 'gofly-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .home5-about-section .about-content .section-title a svg' => 'stroke: {{VALUE}};',
                ],
            ]
        );


        $this->add_control(
            'gofly_about_style_four_general_button_icon_hover_color',
            [
                'label'     => esc_html__('Hover Icon Color', 'gofly-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .home5-about-section .about-content .section-title a:hover svg' => 'stroke: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'gofly_about_style_four_general_video_icon',
            [
                'label'     => esc_html__('Video Icon', 'gofly-core'),
                'type'      => \Elementor\Controls_Manager::HEADING,
                'separator' => 'after',
            ]
        );

        $this->add_control(
            'gofly_about_style_four_general_video_icon_color',
            [
                'label'     => esc_html__('Color', 'gofly-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .home5-about-section .about-video-area .play-btn i' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'gofly_about_style_four_general_video_icon_waves_color',
            [
                'label'     => esc_html__('Waves Color', 'gofly-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .home5-about-section .about-video-area .play-btn .waves-block .waves' => 'background: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'gofly_about_style_four_general_video_icon_bg_color',
            [
                'label'     => esc_html__('Background Color', 'gofly-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .home5-about-section .about-video-area .play-btn' => 'background-color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'gofly_about_style_four_general_counter_section',
            [
                'label'     => esc_html__('Counter Section', 'gofly-core'),
                'type'      => \Elementor\Controls_Manager::HEADING,
                'separator' => 'before',
            ]
        );

        $this->add_control(
            'gofly_about_style_four_general_counter_section_bg_color',
            [
                'label'     => esc_html__('Background Color', 'gofly-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .home5-about-section .counter-area .single-counter' => 'background-color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'gofly_about_style_four_general_counter_section_icon',
            [
                'label'     => esc_html__('Counter Icon', 'gofly-core'),
                'type'      => \Elementor\Controls_Manager::HEADING,
                'separator' => 'after',
            ]
        );

        $this->add_control(
            'gofly_about_style_four_general_counter_section_icon_size',
            [
                'label'      => esc_html__('Icon Size', 'gofly-core'),
                'type'       => \Elementor\Controls_Manager::SLIDER,
                'size_units' => ['px', '%', 'rem', 'custom'],
                'range'      => [
                    'px' => [
                        'min'  => 0,
                        'max'  => 100,
                        'step' => 1,
                    ],
                    '%' => [
                        'min' => 0,
                        'max' => 100,
                    ],
                ],
                'default' => [
                    'unit' => 'px',
                    'size' => 63,
                ],
                'selectors' => [
                    '{{WRAPPER}} .home5-about-section .counter-area .single-counter .icon svg' => 'width: {{SIZE}}{{UNIT}};',
                ],
            ]
        );

        $this->add_control(
            'gofly_about_style_four_general_counter_section_icon_color',
            [
                'label'     => esc_html__('Icon Color', 'gofly-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .home5-about-section .counter-area .single-counter .icon svg' => 'fill: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'gofly_about_style_four_general_counter_section_number',
            [
                'label'     => esc_html__('Counter Number', 'gofly-core'),
                'type'      => \Elementor\Controls_Manager::HEADING,
                'separator' => 'after',
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'label'    => esc_html__('Typography', 'gofly-core'),
                'name'     => 'gofly_about_style_four_general_counter_section_number_typ',
                'selector' => '{{WRAPPER}} .home5-about-section .counter-area .single-counter .content h2 strong',

            ]
        );

        $this->add_control(
            'gofly_about_style_four_general_counter_section_number_color',
            [
                'label'     => esc_html__('Color', 'gofly-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .home5-about-section .counter-area .single-counter .content h2 strong' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'gofly_about_style_four_general_counter_section_sign',
            [
                'label'     => esc_html__('Counter Sign', 'gofly-core'),
                'type'      => \Elementor\Controls_Manager::HEADING,
                'separator' => 'after',
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'label'    => esc_html__('Typography', 'gofly-core'),
                'name'     => 'gofly_about_style_four_general_counter_section_sign_typ',
                'selector' => '{{WRAPPER}} .home5-about-section .counter-area .single-counter .content h2',

            ]
        );

        $this->add_control(
            'gofly_about_style_four_general_counter_section_sign_color',
            [
                'label'     => esc_html__('Color', 'gofly-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .home5-about-section .counter-area .single-counter .content h2' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'gofly_about_style_four_general_counter_section_title',
            [
                'label'     => esc_html__('Counter Title', 'gofly-core'),
                'type'      => \Elementor\Controls_Manager::HEADING,
                'separator' => 'after',
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'label'    => esc_html__('Typography', 'gofly-core'),
                'name'     => 'gofly_about_style_four_general_counter_section_title_typ',
                'selector' => '{{WRAPPER}} .home5-about-section .counter-area .single-counter .content span',

            ]
        );

        $this->add_control(
            'gofly_about_style_four_general_counter_section_title_color',
            [
                'label'     => esc_html__('Color', 'gofly-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .home5-about-section .counter-area .single-counter .content span' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->end_controls_section();

        //============Style Two Start=============//

        $this->start_controls_section(
            'gofly_about_style_five_general',
            [
                'label'     => esc_html__('Styles', 'gofly-core'),
                'tab'       => Controls_Manager::TAB_STYLE,
                'condition' => [
                    'gofly_about_genaral_style_selection' => 'style_five',
                ],
            ]
        );

        $this->add_control(
            'gofly_about_style_five_general_header_subtitle',
            [
                'label'     => esc_html__('Header Subtitle', 'gofly-core'),
                'type'      => \Elementor\Controls_Manager::HEADING,
                'separator' => 'after',
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'label'    => esc_html__('Typography', 'gofly-core'),
                'name'     => 'gofly_about_style_five_general_header_subtitle_typ',
                'selector' => '{{WRAPPER}} .home6-about-section .section-title span',

            ]
        );

        $this->add_control(
            'gofly_about_style_five_general_header_subtitle_color',
            [
                'label'     => esc_html__('Color', 'gofly-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .home6-about-section .section-title span' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'gofly_about_style_five_general_header_subtitle_bg_color',
            [
                'label'     => esc_html__('Background Color', 'gofly-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .home6-about-section .section-title span' => 'background-color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'gofly_about_style_five_general_header_title',
            [
                'label'     => esc_html__('Header Title', 'gofly-core'),
                'type'      => \Elementor\Controls_Manager::HEADING,
                'separator' => 'after',
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'label'    => esc_html__('Typography', 'gofly-core'),
                'name'     => 'gofly_about_style_five_general_header_title_typ',
                'selector' => '{{WRAPPER}} .section-title h2',

            ]
        );

        $this->add_control(
            'gofly_about_style_five_general_header_title_color',
            [
                'label'     => esc_html__('Color', 'gofly-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .section-title h2' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'gofly_about_style_five_general_header_description',
            [
                'label'     => esc_html__('Description', 'gofly-core'),
                'type'      => \Elementor\Controls_Manager::HEADING,
                'separator' => 'after',
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'label'    => esc_html__('Typography', 'gofly-core'),
                'name'     => 'gofly_about_style_five_general_header_description_typ',
                'selector' => '{{WRAPPER}} .home6-about-section .about-wrapper .about-content p',

            ]
        );

        $this->add_control(
            'gofly_about_style_five_general_header_description_color',
            [
                'label'     => esc_html__('Color', 'gofly-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .home6-about-section .about-wrapper .about-content p' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'gofly_about_style_five_general_header_button',
            [
                'label'     => esc_html__('Button', 'gofly-core'),
                'type'      => \Elementor\Controls_Manager::HEADING,
                'separator' => 'after',
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'label'    => esc_html__('Typography', 'gofly-core'),
                'name'     => 'gofly_about_style_five_general_header_button_typ',
                'selector' => '{{WRAPPER}} .primary-btn1.three.black-bg',

            ]
        );

        $this->add_control(
            'gofly_about_style_five_general_header_button_color',
            [
                'label'     => esc_html__('Color', 'gofly-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .primary-btn1.three.black-bg' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'gofly_about_style_five_general_header_button_hover_color',
            [
                'label'     => esc_html__('Hover Color', 'gofly-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .primary-btn1.three.black-bg' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'gofly_about_style_five_general_header_button_icon_color',
            [
                'label'     => esc_html__('Icon Color', 'gofly-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .primary-btn1 > span svg' => 'fill: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'gofly_about_style_five_general_header_button_icon_hover_color',
            [
                'label'     => esc_html__('Icon Hover Color', 'gofly-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .primary-btn1:hover > span svg' => 'fill: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'gofly_about_style_five_general_header_button_bg_color',
            [
                'label'     => esc_html__('Background Color', 'gofly-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .primary-btn1.three.black-bg' => 'background-color: {{VALUE}};',
                ],
            ]
        );


        $this->add_control(
            'gofly_about_style_five_general_counter_text',
            [
                'label'     => esc_html__('Counter Text', 'gofly-core'),
                'type'      => \Elementor\Controls_Manager::HEADING,
                'separator' => 'after',
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'label'    => esc_html__('Typography', 'gofly-core'),
                'name'     => 'gofly_about_style_five_general_counter_text_typ',
                'selector' => '{{WRAPPER}} .home6-about-section .about-wrapper .about-content .btn-and-counter-area .counter-area h6',

            ]
        );

        $this->add_control(
            'gofly_about_style_five_general_counter_text_color',
            [
                'label'     => esc_html__('Color', 'gofly-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .home6-about-section .about-wrapper .about-content .btn-and-counter-area .counter-area h6' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'gofly_about_style_five_general_banner_icon',
            [
                'label'     => esc_html__('Banner Icon', 'gofly-core'),
                'type'      => \Elementor\Controls_Manager::HEADING,
                'separator' => 'after',
            ]
        );

        $this->add_control(
            'gofly_about_style_five_general_banner_icon_size',
            [
                'label'      => esc_html__('Icon Size', 'gofly-core'),
                'type'       => \Elementor\Controls_Manager::SLIDER,
                'size_units' => ['px', '%', 'rem', 'custom'],
                'range'      => [
                    'px' => [
                        'min'  => 0,
                        'max'  => 100,
                        'step' => 1,
                    ],
                    '%' => [
                        'min' => 0,
                        'max' => 100,
                    ],
                ],
                'default' => [
                    'unit' => 'px',
                    'size' => 63,
                ],
                'selectors' => [
                    '{{WRAPPER}} .home6-about-section .about-wrapper .about-img-area .icon svg' => 'width: {{SIZE}}{{UNIT}};',
                ],
            ]
        );

        $this->add_control(
            'gofly_about_style_five_general_banner_icon_color',
            [
                'label'     => esc_html__('Color', 'gofly-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .home6-about-section .about-wrapper .about-img-area .icon svg' => 'fill: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'gofly_about_style_five_general_banner_icon_bg_color',
            [
                'label'     => esc_html__('Background Color', 'gofly-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .home6-about-section .about-wrapper .about-img-area .icon' => 'background-color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'gofly_about_style_five_general_banner_icon_bg_two_color',
            [
                'label'     => esc_html__('Background Color Two', 'gofly-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .home6-about-section .about-wrapper .about-img-area .icon::before' => 'background-color: {{VALUE}};',
                ],
            ]
        );

        $this->end_controls_section();

        //============Style Six Start=============//

        $this->start_controls_section(
            'gofly_about_style_six_general',
            [
                'label'     => esc_html__('Styles', 'gofly-core'),
                'tab'       => Controls_Manager::TAB_STYLE,
                'condition' => [
                    'gofly_about_genaral_style_selection' => 'style_six',
                ],
            ]
        );

        $this->add_control(
            'gofly_about_style_six_general_title',
            [
                'label'     => esc_html__('Header Title', 'gofly-core'),
                'type'      => \Elementor\Controls_Manager::HEADING,
                'separator' => 'after',
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'label'    => esc_html__('Typography', 'gofly-core'),
                'name'     => 'gofly_about_style_six_general_title_typ',
                'selector' => '{{WRAPPER}} .section-title h2',

            ]
        );

        $this->add_control(
            'gofly_about_style_six_general_title_color',
            [
                'label'     => esc_html__('Color', 'gofly-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .section-title h2' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'gofly_about_style_six_general_description',
            [
                'label'     => esc_html__('Description', 'gofly-core'),
                'type'      => \Elementor\Controls_Manager::HEADING,
                'separator' => 'after',
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'label'    => esc_html__('Typography', 'gofly-core'),
                'name'     => 'gofly_about_style_six_general_description_typ',
                'selector' => '{{WRAPPER}} .home7-about-section .about-content .content p',

            ]
        );

        $this->add_control(
            'gofly_about_style_six_general_description_color',
            [
                'label'     => esc_html__('Color', 'gofly-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .home7-about-section .about-content .content p' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'gofly_about_style_six_general_button',
            [
                'label'     => esc_html__('Button', 'gofly-core'),
                'type'      => \Elementor\Controls_Manager::HEADING,
                'separator' => 'after',
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'label'    => esc_html__('Typography', 'gofly-core'),
                'name'     => 'gofly_about_style_six_general_button_typ',
                'selector' => '{{WRAPPER}} .primary-btn1.four.black-bg',

            ]
        );

        $this->add_control(
            'gofly_about_style_six_general_button_color',
            [
                'label'     => esc_html__('Color', 'gofly-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .primary-btn1.four.black-bg' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'gofly_about_style_six_general_button_hover_color',
            [
                'label'     => esc_html__('Hover Color', 'gofly-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .primary-btn1.four.black-bg:hover' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'gofly_about_style_six_general_button_icon_color',
            [
                'label'     => esc_html__('Icon Color', 'gofly-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .primary-btn1.four.black-bg svg' => 'fill: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'gofly_about_style_six_general_button_icon_hover_color',
            [
                'label'     => esc_html__('Hover Icon Color', 'gofly-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .primary-btn1.four.black-bg:hover svg' => 'fill: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'gofly_about_style_six_general_button_bg_color',
            [
                'label'     => esc_html__('Background Color', 'gofly-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .primary-btn1.four.black-bg' => 'background-color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'gofly_about_style_six_general_button_hover_bg_color',
            [
                'label'     => esc_html__('Hover Background Color', 'gofly-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .primary-btn1.four.black-bg::after' => 'background-color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'gofly_about_style_six_general_counter_text',
            [
                'label'     => esc_html__('Counter Text', 'gofly-core'),
                'type'      => \Elementor\Controls_Manager::HEADING,
                'separator' => 'after',
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'label'    => esc_html__('Typography', 'gofly-core'),
                'name'     => 'gofly_about_style_six_general_counter_text_typ',
                'selector' => '{{WRAPPER}} .home7-about-section .about-content .btn-and-counter-area .counter-area h6',

            ]
        );

        $this->add_control(
            'gofly_about_style_six_general_counter_text_color',
            [
                'label'     => esc_html__('Color', 'gofly-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .home7-about-section .about-content .btn-and-counter-area .counter-area h6' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'gofly_about_style_six_general_counter_two_area',
            [
                'label'     => esc_html__('Counter Two Area', 'gofly-core'),
                'type'      => \Elementor\Controls_Manager::HEADING,
                'separator' => 'before',
            ]
        );

        $this->add_control(
            'gofly_about_style_six_general_counter_two_area_bg_color',
            [
                'label'     => esc_html__('Background Color', 'gofly-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .home7-about-section .about-img-area .counter-wrapper .single-counter' => 'background-color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'gofly_about_style_six_general_counter_two_area_bg_two_color',
            [
                'label'     => esc_html__('Background Color Two', 'gofly-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .home7-about-section .about-img-area .counter-wrapper' => 'background-color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'gofly_about_style_six_general_counter_two_area_number',
            [
                'label'     => esc_html__('Counter Number', 'gofly-core'),
                'type'      => \Elementor\Controls_Manager::HEADING,
                'separator' => 'after',
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'label'    => esc_html__('Typography', 'gofly-core'),
                'name'     => 'gofly_about_style_six_general_counter_two_area_number_typ',
                'selector' => '{{WRAPPER}} .home7-about-section .about-img-area .counter-wrapper .single-counter h2 strong',

            ]
        );

        $this->add_control(
            'gofly_about_style_six_general_counter_two_area_number_color',
            [
                'label'     => esc_html__('Color', 'gofly-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .home7-about-section .about-img-area .counter-wrapper .single-counter h2 strong' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'gofly_about_style_six_general_counter_two_area_sign',
            [
                'label'     => esc_html__('Counter Sign', 'gofly-core'),
                'type'      => \Elementor\Controls_Manager::HEADING,
                'separator' => 'after',
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'label'    => esc_html__('Typography', 'gofly-core'),
                'name'     => 'gofly_about_style_six_general_counter_two_area_sign_typ',
                'selector' => '{{WRAPPER}} .home7-about-section .about-img-area .counter-wrapper .single-counter h2 span',

            ]
        );

        $this->add_control(
            'gofly_about_style_six_general_counter_two_area_sign_color',
            [
                'label'     => esc_html__('Color', 'gofly-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .home7-about-section .about-img-area .counter-wrapper .single-counter h2 span' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'gofly_about_style_six_general_counter_two_area_title',
            [
                'label'     => esc_html__('Counter Title', 'gofly-core'),
                'type'      => \Elementor\Controls_Manager::HEADING,
                'separator' => 'after',
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'label'    => esc_html__('Typography', 'gofly-core'),
                'name'     => 'gofly_about_style_six_general_counter_two_area_title_typ',
                'selector' => '{{WRAPPER}} .home7-about-section .about-img-area .counter-wrapper .single-counter span',

            ]
        );

        $this->add_control(
            'gofly_about_style_six_general_counter_two_area_title_color',
            [
                'label'     => esc_html__('Color', 'gofly-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .home7-about-section .about-img-area .counter-wrapper .single-counter span' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->end_controls_section();
    }
    protected function render()
    {

        $settings = $this->get_settings_for_display();

?>

        <?php if ($settings['gofly_about_genaral_style_selection'] == 'style_one'): ?>
            <div class="home2-about-section" style="background-image: url(<?php echo esc_url($settings['gofly_about_genaral_style_one_bg_image']['url']); ?>), linear-gradient(180deg, <?php echo esc_attr($settings['gofly_about_style_general_global_section_bg_color']); ?> 0%, <?php echo esc_attr($settings['gofly_about_style_general_global_section_bg_color']); ?> 100%)">
                <div class="container">
                    <div class="row mb-60">
                        <div class="col-lg-6 wow animate fadeInLeft" data-wow-delay="200ms" data-wow-duration="1500ms">
                            <div class="about-content">
                                <div class="section-title">
                                    <?php if (!empty($settings['gofly_about_genaral_header_title'])): ?>
                                        <h2><?php echo esc_html($settings['gofly_about_genaral_header_title']); ?></h2>
                                    <?php endif; ?>
                                    <?php if (!empty($settings['gofly_about_genaral_header_description'])): ?>
                                        <p><?php echo wp_kses($settings['gofly_about_genaral_header_description'], wp_kses_allowed_html('post')); ?></p>
                                    <?php endif; ?>
                                </div>
                                <div class="counter-area">
                                    <?php if (!empty($settings['gofly_about_genaral_counter_area_icon'])): ?>
                                        <?php \Elementor\Icons_Manager::render_icon($settings['gofly_about_genaral_counter_area_icon'], ['aria-hidden' => 'true']); ?>
                                    <?php endif; ?>
                                    <div class="single-counter">
                                        <h2><?php if (!empty($settings['gofly_about_genaral_counter_area_counter_number'])) : ?><strong class="counter"><?php echo esc_html($settings['gofly_about_genaral_counter_area_counter_number']); ?></strong><?php endif; ?><?php if (!empty($settings['gofly_about_genaral_counter_area_counter_sign'])) : ?><sup><?php echo esc_html($settings['gofly_about_genaral_counter_area_counter_sign']); ?></sup><?php endif; ?></h2>
                                        <?php if (!empty($settings['gofly_about_genaral_counter_area_counter_title'])): ?>
                                            <span><?php echo wp_kses($settings['gofly_about_genaral_counter_area_counter_title'], wp_kses_allowed_html('post')); ?></span>
                                        <?php endif; ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6 d-lg-block d-none wow animate fadeInRight" data-wow-delay="200ms" data-wow-duration="1500ms">
                            <div class="about-img-wrap">
                                <div class="row align-items-end g-xl-4 g-lg-2 g-4">
                                    <?php if (!empty($settings['gofly_about_gallery_genaral_banner_image_one']['url'])): ?>
                                        <div class="col-lg-6">
                                            <div class="single-img">
                                                <img src="<?php echo esc_url($settings['gofly_about_gallery_genaral_banner_image_one']['url']); ?>" alt="<?php echo esc_attr__('banner-image-one', 'gofly-core'); ?>">
                                            </div>
                                        </div>
                                    <?php endif; ?>
                                    <?php if (!empty($settings['gofly_about_gallery_genaral_banner_image_two']['url'])): ?>
                                        <div class="col-lg-6">
                                            <div class="single-img">
                                                <img src="<?php echo esc_url($settings['gofly_about_gallery_genaral_banner_image_two']['url']); ?>" alt="<?php echo esc_attr__('banner-image-one', 'gofly-core'); ?>">
                                            </div>
                                        </div>
                                </div>
                            <?php endif; ?>
                            <?php if (!empty($settings['gofly_about_gallery_genaral_icon_image']['url'])): ?>
                                <div class="logo">
                                    <img src="<?php echo esc_url($settings['gofly_about_gallery_genaral_icon_image']['url']); ?>" alt="<?php echo esc_attr__('logo-image', 'gofly-core'); ?>">
                                </div>
                            <?php endif; ?>
                            <?php if (!empty($settings['gofly_about_gallery_genaral_vector_image'])): ?>
                                <?php \Elementor\Icons_Manager::render_icon($settings['gofly_about_gallery_genaral_vector_image'], ['aria-hidden' => 'true']); ?>
                            <?php endif; ?>
                            </div>
                        </div>
                    </div>

                    <div class="service-area wow animate fadeInUp" data-wow-delay="200ms" data-wow-duration="1500ms">
                        <?php if (!empty($settings['gofly_about_service_genaral_title'])): ?>
                            <h6><?php echo esc_html($settings['gofly_about_service_genaral_title']); ?></h6>
                        <?php endif; ?>
                        <div class="row row-cols-xl-6 row-cols-lg-5 row-cols-md-3 row-cols-sm-2 row-cols-1 g-xxl-4 g-xl-3 g-lg-3 g-4">
                            <?php foreach ($settings['gofly_about_service_genaral_content_service_list'] as $service_list): ?>
                                <div class="col">
                                    <?php if (!empty($service_list['gofly_about_service_genaral_content_service_title'])): ?>
                                        <div class="single-service">
                                            <a href="<?php echo esc_url($service_list['gofly_about_service_genaral_content_service_title_url']['url']); ?>">
                                                <?php if (!empty($service_list['gofly_about_service_genaral_content_icon'])): ?>
                                                    <?php \Elementor\Icons_Manager::render_icon($service_list['gofly_about_service_genaral_content_icon'], ['aria-hidden' => 'true']); ?>
                                                <?php endif; ?>
                                                <?php if (!empty($service_list['gofly_about_service_genaral_content_service_title'])): ?>
                                                    <?php echo wp_kses($service_list['gofly_about_service_genaral_content_service_title'], wp_kses_allowed_html('post')); ?>
                                                <?php endif; ?>
                                            </a>
                                        </div>
                                    <?php endif; ?>
                                </div>
                            <?php endforeach; ?>
                        </div>
                    </div>
                    <div class="rating-area wow animate fadeInUp" data-wow-delay="200ms" data-wow-duration="1500ms">
                        <?php if (!empty($settings['gofly_about_genaral_rating_area_title'])): ?>
                            <span><?php echo esc_html($settings['gofly_about_genaral_rating_area_title']); ?></span>
                        <?php endif; ?>
                        <?php if (!empty($settings['gofly_about_genaral_rating_area_icon_image']['url'])): ?>
                            <img src="<?php echo esc_url($settings['gofly_about_genaral_rating_area_icon_image']['url']); ?>" alt="<?php echo esc_attr__('icon-image', 'gofly-core'); ?>">
                        <?php endif; ?>
                        <div class="text-and-logo">
                            <?php if (!empty($settings['gofly_about_genaral_rating_area_description'])): ?>
                                <p><?php echo wp_kses($settings['gofly_about_genaral_rating_area_description'], wp_kses_allowed_html('post')); ?></p>
                            <?php endif; ?>
                            <?php if (!empty($settings['gofly_about_genaral_rating_area_logo_image']['url'])): ?>
                                <a href="<?php echo esc_url($settings['gofly_about_genaral_rating_area_logo_image_url']['url']); ?>"><img src="<?php echo esc_url($settings['gofly_about_genaral_rating_area_logo_image']['url']); ?>" alt="<?php echo esc_attr__('logo-image', 'gofly-core'); ?>"></a>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            </div>
        <?php endif; ?>

        <?php if ($settings['gofly_about_genaral_style_selection'] == 'style_two'): ?>
            <div class="home3-about-section">
                <div class="container">
                    <div class="about-wrapper" <?php if (!empty($settings['gofly_about_genaral_style_one_bg_image']['url'])) : ?> style="background-image: url(<?php echo esc_url($settings['gofly_about_genaral_style_one_bg_image']['url']); ?>)" <?php endif; ?>>
                        <div class="row align-items-center justify-content-between">
                            <div class="col-xl-6 col-lg-7 wow animate fadeInLeft" data-wow-delay="200ms" data-wow-duration="1500ms">
                                <div class="about-content">
                                    <div class="section-title">
                                        <?php if (!empty($settings['gofly_about_two_genaral_header_title'])): ?>
                                            <h2><?php echo esc_html($settings['gofly_about_two_genaral_header_title']); ?></h2>
                                        <?php endif; ?>
                                        <?php if (!empty($settings['gofly_about_two_genaral_header_short_description'])): ?>
                                            <h4><?php echo esc_html($settings['gofly_about_two_genaral_header_short_description']); ?></h4>
                                        <?php endif; ?>
                                        <?php if (!empty($settings['gofly_about_genaral_header_description'])): ?>
                                            <p><?php echo wp_kses($settings['gofly_about_genaral_header_description'], wp_kses_allowed_html('post')); ?></p>
                                        <?php endif; ?>
                                        <?php if (!empty($settings['gofly_about_two_genaral_header_button_label'])): ?>
                                            <a href="<?php echo esc_url($settings['gofly_about_two_genaral_header_button_label_url']['url']); ?>">
                                                <?php echo esc_html($settings['gofly_about_two_genaral_header_button_label']); ?>
                                                <svg width="10" height="10" viewBox="0 0 10 10" xmlns="http://www.w3.org/2000/svg">
                                                    <path d="M1 9L9 1M9 1C7.22222 1.33333 3.33333 2 1 1M9 1C8.66667 2.66667 8 6.33333 9 9" stroke-width="1.5" stroke-linecap="round" />
                                                </svg>
                                            </a>
                                        <?php endif; ?>
                                    </div>
                                    <div class="review-area">
                                        <?php foreach ($settings['gofly_about_service_two_rating_list'] as $rating) : ?>
                                            <?php if ($rating['gofly_about_service_two_rating_style_selection'] == 'tripadvisor'): ?>
                                                <a href="<?php echo esc_url($rating['gofly_about_service_two_rating_url_link']['url']); ?>" class="single-rating">
                                                    <?php if (!empty($rating['gofly_about_service_two_rating_number'])): ?>
                                                        <strong><?php echo esc_html($rating['gofly_about_service_two_rating_number']); ?></strong>
                                                    <?php endif; ?>
                                                    <div class="tripadvisor-rating">
                                                        <?php if (!empty($rating['gofly_about_service_two_rating_company_logo']['url'])): ?>
                                                            <img src="<?php echo esc_url($rating['gofly_about_service_two_rating_company_logo']['url']); ?>" alt="<?php echo esc_attr__('logo-image', 'gofly-core'); ?>">
                                                        <?php endif; ?>
                                                        <div class="rating-area">
                                                            <?php if (!empty($rating['gofly_about_service_two_rating_title'])): ?>
                                                                <span><?php echo esc_html($rating['gofly_about_service_two_rating_title']); ?></span>
                                                            <?php endif; ?>
                                                            <?php if (!empty($rating['gofly_about_service_two_rating_icon_image']['url'])): ?>
                                                                <img src="<?php echo esc_html($rating['gofly_about_service_two_rating_icon_image']['url']); ?>" alt="<?php echo esc_attr__('icon-image', 'gofly-core'); ?>">
                                                            <?php endif; ?>
                                                        </div>
                                                    </div>
                                                </a>
                                            <?php else: ?>
                                                <a href="<?php echo esc_url($rating['gofly_about_service_two_rating_url_link']['url']); ?>" class="single-rating">
                                                    <?php if (!empty($rating['gofly_about_service_two_rating_number'])): ?>
                                                        <strong><?php echo esc_html($rating['gofly_about_service_two_rating_number']); ?></strong>
                                                    <?php endif; ?>
                                                    <div class="trustpilot-rating">
                                                        <?php if (!empty($rating['gofly_about_service_two_rating_company_logo']['url'])): ?>
                                                            <img src="<?php echo esc_url($rating['gofly_about_service_two_rating_company_logo']['url']); ?>" alt="<?php echo esc_attr__('logo-image', 'gofly-core'); ?>">
                                                        <?php endif; ?>
                                                        <div class="rating-area">
                                                            <?php if (!empty($rating['gofly_about_service_two_rating_icon_image']['url'])): ?>
                                                                <img src="<?php echo esc_html($rating['gofly_about_service_two_rating_icon_image']['url']); ?>" alt="<?php echo esc_attr__('icon-image', 'gofly-core'); ?>">
                                                            <?php endif; ?>
                                                        </div>
                                                    </div>
                                                </a>
                                            <?php endif; ?>
                                            <svg class="divider" width="6" height="54" viewBox="0 0 6 54" xmlns="http://www.w3.org/2000/svg">
                                                <path d="M3.5 5L5.88675 0H0.113249L2.5 5H3.5ZM2.5 49L0.113249 54H5.88675L3.5 49H2.5ZM2.5 4.5V49.5H3.5V4.5H2.5Z" />
                                            </svg>
                                        <?php endforeach; ?>
                                    </div>
                                </div>
                            </div>
                            <?php if (!empty($settings['gofly_about_two_genaral_banner_image']['url'])): ?>
                                <div class="col-lg-5 d-lg-block d-none wow animate fadeInRight" data-wow-delay="200ms" data-wow-duration="1500ms">
                                    <div class="about-img">
                                        <img src="<?php echo esc_url($settings['gofly_about_two_genaral_banner_image']['url']); ?>" alt="<?php echo esc_attr__('banner-image', 'gofly-core'); ?>">
                                    </div>
                                </div>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            </div>
        <?php endif; ?>

        <?php if ($settings['gofly_about_genaral_style_selection'] == 'style_three') : ?>
            <div class="home4-about-section" <?php if (!empty($settings['gofly_about_genaral_style_one_bg_image']['url'])): ?> style="background-image: url(<?php echo esc_url($settings['gofly_about_genaral_style_one_bg_image']['url']); ?>), linear-gradient(180deg, <?php echo esc_attr($settings['gofly_about_style_three_general_global_section_color']); ?> 0%, <?php echo esc_attr($settings['gofly_about_style_three_general_global_section_color']); ?> 100%)" <?php endif; ?>>
                <div class="container">
                    <div class="about-wrapper">
                        <div class="row justify-content-between">
                            <div class="col-xl-5 col-lg-6 wow animate fadeInLeft" data-wow-delay="200ms" data-wow-duration="1500ms">
                                <div class="about-content">
                                    <div class="section-title">
                                        <?php if (!empty($settings['gofly_about_genaral_header_title'])): ?>
                                            <h2><?php echo esc_html($settings['gofly_about_genaral_header_title']); ?></h2>
                                        <?php endif; ?>
                                        <?php if (!empty($settings['gofly_about_genaral_header_description'])): ?>
                                            <p><?php echo wp_kses($settings['gofly_about_genaral_header_description'], wp_kses_allowed_html('post')); ?></p>
                                        <?php endif; ?>
                                    </div>
                                    <ul>
                                        <?php foreach ($settings['gofly_about_content_list'] as $content_list): ?>
                                            <?php if (!empty($content_list['gofly_about_content_list_title'])) : ?>
                                                <li>
                                                    <svg width="18" height="18" viewBox="0 0 18 18" xmlns="http://www.w3.org/2000/svg">
                                                        <path
                                                            d="M6.24999 16.2334C6.18965 16.2334 6.13035 16.2177 6.07799 16.1877C6.02563 16.1577 5.98201 16.1146 5.95146 16.0625C4.65758 13.8582 1.20971 9.16675 1.17503 9.1196C1.12576 9.05264 1.10224 8.97019 1.10876 8.88731C1.11528 8.80444 1.15141 8.72668 1.21054 8.66825L2.2704 7.62096C2.32798 7.56406 2.40368 7.52914 2.48433 7.52227C2.56499 7.51541 2.64551 7.53702 2.71188 7.58337L6.17781 10.0035C8.48209 7.04337 10.6235 5.00047 12.0309 3.79676C13.6085 2.44735 14.6115 1.84099 14.6535 1.81572C14.7073 1.78342 14.7688 1.76636 14.8316 1.76636H16.5462C16.6163 1.76635 16.6849 1.78767 16.7426 1.82749C16.8004 1.86731 16.8447 1.92376 16.8697 1.98934C16.8947 2.05493 16.8991 2.12656 16.8825 2.19473C16.8658 2.2629 16.8288 2.32439 16.7764 2.37105C14.2345 4.6349 11.5919 8.23189 9.82257 10.8506C7.89924 13.6972 6.56405 16.0353 6.55079 16.0586C6.52074 16.1114 6.47733 16.1553 6.42494 16.186C6.37254 16.2167 6.31299 16.233 6.25227 16.2334L6.24999 16.2334Z" />
                                                    </svg>
                                                    <?php echo esc_html($content_list['gofly_about_content_list_title']); ?>
                                                </li>
                                            <?php endif; ?>
                                        <?php endforeach; ?>
                                    </ul>
                                    <div class="counter-wrapper">
                                        <div class="single-counter">
                                            <h2><?php if (!empty($settings['gofly_about_genaral_counter_area_counter_number'])) : ?><strong class="counter"><?php echo esc_html($settings['gofly_about_genaral_counter_area_counter_number']); ?></strong><?php endif; ?><sup><?php echo esc_html($settings['gofly_about_genaral_counter_area_counter_sign']); ?></sup></h2>
                                            <?php if (!empty($settings['gofly_about_genaral_counter_area_counter_title'])): ?>
                                                <span><?php echo wp_kses($settings['gofly_about_genaral_counter_area_counter_title'], wp_kses_allowed_html('post')); ?></span>
                                            <?php endif; ?>
                                        </div>
                                        <div class="counter-area">
                                            <ul class="counter-img-grp">
                                                <?php foreach ($settings['gofly_about_genaral_counter_area_two_gallery'] as $image): ?>
                                                    <li><img src="<?php echo esc_url($image['url']); ?>" alt="<?php echo esc_attr__('gallery-images', 'gofly-core'); ?>"></li>
                                                <?php endforeach; ?>
                                            </ul>
                                            <h6> <strong><?php if (!empty($settings['gofly_about_genaral_counter_area_two_number'])) : ?><span class="counter"><?php echo esc_html($settings['gofly_about_genaral_counter_area_two_number']); ?></span><?php endif; ?><?php echo esc_html($settings['gofly_about_genaral_counter_area_two_sign']); ?></strong><?php if (!empty($settings['gofly_about_genaral_counter_area_two_title'])) : ?><?php echo wp_kses($settings['gofly_about_genaral_counter_area_two_title'], wp_kses_allowed_html('post')); ?><?php endif; ?></h6>
                                        </div>
                                    </div>
                                    <svg class="divider" width="536" height="6" viewBox="0 0 536 6" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M5 2.5L0 0.113249V5.88675L5 3.5V2.5ZM531 3.5L536 5.88675V0.113249L531 2.5V3.5ZM4.5 3.5H531.5V2.5H4.5V3.5Z" />
                                    </svg>
                                    <?php if (!empty($settings['gofly_about_genaral_counter_area_two_button_label'])): ?>
                                        <div class="btn-area">
                                            <a href="<?php echo esc_url($settings['gofly_about_genaral_counter_area_two_button_url']['url']); ?>" class="about-btn">
                                                <?php echo esc_html($settings['gofly_about_genaral_counter_area_two_button_label']); ?>
                                                <svg width="10" height="10" viewBox="0 0 10 10" xmlns="http://www.w3.org/2000/svg">
                                                    <path d="M1 9L9 1M9 1C7.22222 1.33333 3.33333 2 1 1M9 1C8.66667 2.66667 8 6.33333 9 9" stroke-width="1.5" stroke-linecap="round" />
                                                </svg>
                                            </a>
                                        </div>
                                    <?php endif; ?>
                                </div>
                            </div>
                            <div class="col-lg-6 d-lg-flex d-none justify-content-lg-end wow animate fadeInRight" data-wow-delay="200ms" data-wow-duration="1500ms">
                                <div class="about-img-grp">
                                    <div class="single-grp">
                                        <div class="counter-wrapper">
                                            <div class="counter-area">
                                                <h2><?php if (!empty($settings['gofly_about_genaral_counter_area_three_number'])): ?><strong><?php echo esc_html($settings['gofly_about_genaral_counter_area_three_number']); ?></strong><?php endif; ?><?php if (!empty($settings['gofly_about_genaral_counter_area_three_number'])): ?><?php echo esc_html($settings['gofly_about_genaral_counter_area_three_sign']); ?><?php endif; ?></h2>
                                                <?php if (!empty($settings['gofly_about_genaral_counter_area_three_title'])) : ?>
                                                    <span><?php echo esc_html($settings['gofly_about_genaral_counter_area_three_title']); ?></span>
                                                <?php endif; ?>
                                            </div>
                                            <?php if (!empty($settings['gofly_about_genaral_counter_area_three_icon'])): ?>
                                                <?php \Elementor\Icons_Manager::render_icon($settings['gofly_about_genaral_counter_area_three_icon'], ['aria-hidden' => 'true']); ?>
                                            <?php endif; ?>
                                        </div>
                                        <?php if (!empty($settings['gofly_about_genaral_counter_area_three_about_image_one']['url'])): ?>
                                            <div class="single-img">
                                                <img src="<?php echo esc_url($settings['gofly_about_genaral_counter_area_three_about_image_one']['url']); ?>" alt="<?php echo esc_attr__('image-one', 'gofly-core'); ?>">
                                            </div>
                                        <?php endif; ?>
                                    </div>
                                    <div class="single-grp">
                                        <?php if (!empty($settings['gofly_about_genaral_counter_area_three_about_image_two']['url'])): ?>
                                            <div class="single-img two">
                                                <img src="<?php echo esc_url($settings['gofly_about_genaral_counter_area_three_about_image_two']['url']); ?>" alt="<?php echo esc_attr__('image-two', 'gofly-core'); ?>">
                                            </div>
                                        <?php endif; ?>
                                        <?php if (!empty($settings['gofly_about_genaral_counter_area_three_about_image_three']['url'])): ?>
                                            <div class="single-img three">
                                                <img src="<?php echo esc_url($settings['gofly_about_genaral_counter_area_three_about_image_three']['url']); ?>" alt="<?php echo esc_attr__('image-three', 'gofly-core'); ?>">
                                            </div>
                                        <?php endif; ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        <?php endif; ?>

        <?php if ($settings['gofly_about_genaral_style_selection'] == 'style_four'): ?>
            <div class="home5-about-section">
                <div class="container">
                    <div class="row align-items-center mb-60 gy-5">
                        <div class="col-lg-6 wow animate fadeInLeft" data-wow-delay="200ms" data-wow-duration="1500ms">
                            <div class="about-content">
                                <div class="section-title">
                                    <?php if (!empty($settings['gofly_about_genaral_header_title'])): ?>
                                        <h2><?php echo esc_html($settings['gofly_about_genaral_header_title']); ?></h2>
                                    <?php endif; ?>
                                    <?php if (!empty($settings['gofly_about_two_genaral_header_short_description'])): ?>
                                        <h4><?php echo wp_kses($settings['gofly_about_two_genaral_header_short_description'], wp_kses_allowed_html('post')); ?></h4>
                                    <?php endif; ?>
                                    <?php if (!empty($settings['gofly_about_genaral_header_description'])): ?>
                                        <p><?php echo wp_kses($settings['gofly_about_genaral_header_description'], wp_kses_allowed_html('post')); ?></p>
                                    <?php endif; ?>
                                    <?php if (!empty($settings['gofly_about_two_genaral_header_button_label'])): ?>
                                        <a href="<?php echo esc_url($settings['gofly_about_two_genaral_header_button_label_url']['url']); ?>">
                                            <?php echo esc_html($settings['gofly_about_two_genaral_header_button_label']); ?>
                                            <svg width="10" height="10" viewBox="0 0 10 10" xmlns="http://www.w3.org/2000/svg">
                                                <path d="M1 9L9 1M9 1C7.22222 1.33333 3.33333 2 1 1M9 1C8.66667 2.66667 8 6.33333 9 9" stroke-width="1.5" stroke-linecap="round" />
                                            </svg>
                                        </a>
                                    <?php endif; ?>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6 wow animate fadeInRight" data-wow-delay="200ms" data-wow-duration="1500ms">
                            <div class="about-video-area">
                                <?php if (!empty($settings['gofly_about_video_area_banner_image']['url'])): ?>
                                    <img src="<?php echo esc_url($settings['gofly_about_video_area_banner_image']['url']); ?>" alt="<?php echo esc_attr__('banner-image', 'gofly-core'); ?>">
                                <?php endif; ?>
                                <a data-fancybox="video-player" href="<?php if ($settings['gofly_about_video_area_video_select_type'] == 'upload'): ?><?php echo esc_url($settings['gofly_video_with_contact_genaral_video_area_upload']['url']); ?><?php else: ?><?php echo esc_url($settings['gofly_video_with_contact_genaral_video_area_upload_link']['url']); ?><?php endif; ?>" class="play-btn">
                                    <i class="bi bi-play-fill"></i>
                                    <div class="waves-block">
                                        <div class="waves wave-1"></div>
                                        <div class="waves wave-2"></div>
                                        <div class="waves wave-3"></div>
                                    </div>
                                </a>
                                <?php if (!empty($settings['gofly_video_with_contact_genaral_video_area_vector_image']['url'])): ?>
                                    <div class="video-vector">
                                        <img src="<?php echo esc_url($settings['gofly_video_with_contact_genaral_video_area_vector_image']['url']); ?>" alt="<?php echo esc_attr__('vector-image', 'gofly-core'); ?>">
                                    </div>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                    <div class="counter-area">
                        <div class="row g-4">
                            <?php
                            $classes     = array('', 'orange', 'blue', 'green');
                            $class_count = count($classes);
                            foreach ($settings['gofly_about_service_four_counter_list'] as  $index => $counter):
                                $class = $classes[$index % $class_count]; ?>
                                <div class="col-lg-3 col-sm-6 wow animate fadeInUp" data-wow-delay="200ms" data-wow-duration="1500ms">
                                    <div class="single-counter">
                                        <?php if (!empty($counter['gofly_about_four_counter_section_icon'])): ?>
                                            <div class="icon <?php echo esc_attr($class); ?>">
                                                <?php \Elementor\Icons_Manager::render_icon($counter['gofly_about_four_counter_section_icon'], ['aria-hidden' => 'true']); ?>
                                            </div>
                                        <?php endif; ?>
                                        <div class="content">
                                            <h2><?php if (!empty($counter['gofly_about_four_counter_section_counter_number'])) : ?><strong class="counter"><?php echo esc_html($counter['gofly_about_four_counter_section_counter_number']); ?></strong><?php endif; ?><?php echo esc_html($counter['gofly_about_four_counter_section_counter_sign']); ?></h2>
                                            <?php if (!empty($counter['gofly_about_four_counter_section_counter_title'])): ?>
                                                <span><?php echo esc_html($counter['gofly_about_four_counter_section_counter_title']); ?></span>
                                            <?php endif; ?>
                                        </div>
                                    </div>
                                </div>
                            <?php endforeach; ?>
                        </div>
                    </div>
                </div>
            </div>
        <?php endif; ?>

        <?php if ($settings['gofly_about_genaral_style_selection'] == 'style_five'): ?>
            <div class="home6-about-section">
                <div class="container">
                    <div class="row justify-content-center wow animate fadeInDown" data-wow-delay="200ms" data-wow-duration="1500ms">
                        <div class="col-xl-6 col-lg-8">
                            <div class="section-title text-center">
                                <?php if (!empty($settings['gofly_about_genaral_header_subtitle'])): ?>
                                    <span><?php echo esc_html($settings['gofly_about_genaral_header_subtitle']); ?></span>
                                <?php endif; ?>
                                <?php if (!empty($settings['gofly_about_genaral_header_title'])): ?>
                                    <h2><?php echo esc_html($settings['gofly_about_genaral_header_title']); ?></h2>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                    <svg class="divider" height="6" viewBox="0 0 1320 6" xmlns="http://www.w3.org/2000/svg">
                        <path
                            d="M5 2.5L0 0.113249V5.88675L5 3.5V2.5ZM1315 3.5L1320 5.88675V0.113249L1315 2.5V3.5ZM4.5 3.5H1315.5V2.5H4.5V3.5Z" />
                    </svg>
                    <div class="about-wrapper">
                        <div class="row justify-content-between gy-5">
                            <div class="col-xl-6 col-lg-7 wow animate fadeInLeft" data-wow-delay="200ms" data-wow-duration="1500ms">
                                <div class="about-content">
                                    <?php if (!empty($settings['gofly_about_five_genaral_header_description'])): ?>
                                        <p><?php echo wp_kses($settings['gofly_about_five_genaral_header_description'], wp_kses_allowed_html('post')); ?></p>
                                    <?php endif; ?>
                                    <div class="btn-and-counter-area">
                                        <?php if (!empty($settings['gofly_about_two_genaral_header_button_label'])): ?>
                                            <a href="<?php echo esc_url($settings['gofly_about_two_genaral_header_button_label_url']['url']); ?>" class="primary-btn1 two black-bg three">
                                                <span>
                                                    <?php echo esc_html($settings['gofly_about_two_genaral_header_button_label']); ?>
                                                    <svg width="10" height="10" viewBox="0 0 10 10" xmlns="http://www.w3.org/2000/svg">
                                                        <path
                                                            d="M9.73535 1.14746C9.57033 1.97255 9.32924 3.26406 9.24902 4.66797C9.16817 6.08312 9.25559 7.5453 9.70214 8.73633C9.84754 9.12406 9.65129 9.55659 9.26367 9.70215C8.9001 9.83849 8.4969 9.67455 8.32812 9.33398L8.29785 9.26367L8.19921 8.98438C7.73487 7.5758 7.67054 5.98959 7.75097 4.58203C7.77875 4.09598 7.82525 3.62422 7.87988 3.17969L1.53027 9.53027C1.23738 9.82317 0.762615 9.82317 0.469722 9.53027C0.176829 9.23738 0.176829 8.76262 0.469722 8.46973L6.83593 2.10254C6.3319 2.16472 5.79596 2.21841 5.25 2.24902C3.8302 2.32862 2.2474 2.26906 0.958003 1.79102L0.704097 1.68945L0.635738 1.65527C0.303274 1.47099 0.157578 1.06102 0.310542 0.704102C0.463655 0.347333 0.860941 0.170391 1.22363 0.28418L1.29589 0.310547L1.48828 0.387695C2.47399 0.751207 3.79966 0.827571 5.16601 0.750977C6.60111 0.670504 7.97842 0.428235 8.86132 0.262695L9.95312 0.0585938L9.73535 1.14746Z" />
                                                    </svg>
                                                </span>
                                                <span>
                                                    <?php echo esc_html($settings['gofly_about_two_genaral_header_button_label']); ?>
                                                    <svg width="10" height="10" viewBox="0 0 10 10" xmlns="http://www.w3.org/2000/svg">
                                                        <path
                                                            d="M9.73535 1.14746C9.57033 1.97255 9.32924 3.26406 9.24902 4.66797C9.16817 6.08312 9.25559 7.5453 9.70214 8.73633C9.84754 9.12406 9.65129 9.55659 9.26367 9.70215C8.9001 9.83849 8.4969 9.67455 8.32812 9.33398L8.29785 9.26367L8.19921 8.98438C7.73487 7.5758 7.67054 5.98959 7.75097 4.58203C7.77875 4.09598 7.82525 3.62422 7.87988 3.17969L1.53027 9.53027C1.23738 9.82317 0.762615 9.82317 0.469722 9.53027C0.176829 9.23738 0.176829 8.76262 0.469722 8.46973L6.83593 2.10254C6.3319 2.16472 5.79596 2.21841 5.25 2.24902C3.8302 2.32862 2.2474 2.26906 0.958003 1.79102L0.704097 1.68945L0.635738 1.65527C0.303274 1.47099 0.157578 1.06102 0.310542 0.704102C0.463655 0.347333 0.860941 0.170391 1.22363 0.28418L1.29589 0.310547L1.48828 0.387695C2.47399 0.751207 3.79966 0.827571 5.16601 0.750977C6.60111 0.670504 7.97842 0.428235 8.86132 0.262695L9.95312 0.0585938L9.73535 1.14746Z" />
                                                    </svg>
                                                </span>
                                            </a>
                                        <?php endif; ?>
                                        <div class="counter-area">
                                            <ul class="counter-img-grp">
                                                <?php foreach ($settings['gofly_about_genaral_counter_area_two_gallery'] as $image): ?>
                                                    <li><img src="<?php echo esc_url($image['url']); ?>" alt="<?php echo esc_attr__('gallery-images', 'gofly-core'); ?>"></li>
                                                <?php endforeach; ?>
                                            </ul>
                                            <h6> <strong><?php if (!empty($settings['gofly_about_genaral_counter_area_two_number'])) : ?><span class="counter"><?php echo esc_html($settings['gofly_about_genaral_counter_area_two_number']); ?></span><?php endif; ?><?php if (!empty($settings['gofly_about_genaral_counter_area_two_sign'])) : ?><?php echo esc_html($settings['gofly_about_genaral_counter_area_two_sign']); ?><?php endif; ?></strong> <?php echo wp_kses($settings['gofly_about_genaral_counter_area_two_title'], wp_kses_allowed_html('post')); ?></h6>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-5 wow animate fadeInRight" data-wow-delay="200ms" data-wow-duration="1500ms">
                                <div class="about-img-area">
                                    <?php if (!empty($settings['gofly_about_genaral_counter_area_five_icon'])): ?>
                                        <div class="icon">
                                            <?php \Elementor\Icons_Manager::render_icon($settings['gofly_about_genaral_counter_area_five_icon'], ['aria-hidden' => 'true']); ?>
                                        </div>
                                    <?php endif; ?>
                                    <div class="row g-xl-4 g-lg-3 g-md-4 g-2">
                                        <?php if (!empty($settings['gofly_about_genaral_counter_area_three_about_image_one']['url'])): ?>
                                            <div class="col-5">
                                                <div class="single-img">
                                                    <img src="<?php echo esc_url($settings['gofly_about_genaral_counter_area_three_about_image_one']['url']); ?>" alt="<?php echo esc_attr__('banner-image-one', 'gofly-core'); ?>">
                                                </div>
                                            </div>
                                        <?php endif; ?>
                                        <?php if (!empty($settings['gofly_about_genaral_counter_area_three_about_image_two']['url'])): ?>
                                            <div class="col-7">
                                                <div class="single-img">
                                                    <img src="<?php echo esc_url($settings['gofly_about_genaral_counter_area_three_about_image_two']['url']); ?>" alt="<?php echo esc_attr__('banner-image-one', 'gofly-core'); ?>">
                                                </div>
                                            </div>
                                        <?php endif; ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        <?php endif; ?>

        <?php if ($settings['gofly_about_genaral_style_selection'] == 'style_six'): ?>
            <div class="home7-about-section">
                <div class="container">
                    <div class="row gy-5 justify-content-between">
                        <div class="col-xl-5 col-lg-6 wow animate fadeInLeft" data-wow-delay="200ms" data-wow-duration="1500ms">
                            <div class="about-content">
                                <?php if (!empty($settings['gofly_about_genaral_header_title'])): ?>
                                    <div class="section-title">
                                        <h2><?php echo esc_html($settings['gofly_about_genaral_header_title']); ?></h2>
                                    </div>
                                <?php endif; ?>
                                <div class="content">
                                    <?php if (!empty($settings['gofly_about_five_genaral_header_description'])): ?>
                                        <p><?php echo wp_kses($settings['gofly_about_five_genaral_header_description'], wp_kses_allowed_html('post')); ?></p>
                                    <?php endif; ?>
                                </div>
                                <div class="btn-and-counter-area">
                                    <?php if (!empty($settings['gofly_about_two_genaral_header_button_label'])): ?>
                                        <a href="<?php echo esc_url($settings['gofly_about_two_genaral_header_button_label_url']['url']); ?>" class="primary-btn1 two four black-bg">
                                            <span>
                                                <?php echo esc_html($settings['gofly_about_two_genaral_header_button_label']); ?>
                                                <svg width="10" height="10" viewBox="0 0 10 10" xmlns="http://www.w3.org/2000/svg">
                                                    <path d="M9.73535 1.14746C9.57033 1.97255 9.32924 3.26406 9.24902 4.66797C9.16817 6.08312 9.25559 7.5453 9.70214 8.73633C9.84754 9.12406 9.65129 9.55659 9.26367 9.70215C8.9001 9.83849 8.4969 9.67455 8.32812 9.33398L8.29785 9.26367L8.19921 8.98438C7.73487 7.5758 7.67054 5.98959 7.75097 4.58203C7.77875 4.09598 7.82525 3.62422 7.87988 3.17969L1.53027 9.53027C1.23738 9.82317 0.762615 9.82317 0.469722 9.53027C0.176829 9.23738 0.176829 8.76262 0.469722 8.46973L6.83593 2.10254C6.3319 2.16472 5.79596 2.21841 5.25 2.24902C3.8302 2.32862 2.2474 2.26906 0.958003 1.79102L0.704097 1.68945L0.635738 1.65527C0.303274 1.47099 0.157578 1.06102 0.310542 0.704102C0.463655 0.347333 0.860941 0.170391 1.22363 0.28418L1.29589 0.310547L1.48828 0.387695C2.47399 0.751207 3.79966 0.827571 5.16601 0.750977C6.60111 0.670504 7.97842 0.428235 8.86132 0.262695L9.95312 0.0585938L9.73535 1.14746Z"></path>
                                                </svg>
                                            </span>
                                            <span>
                                                <?php echo esc_html($settings['gofly_about_two_genaral_header_button_label']); ?>
                                                <svg width="10" height="10" viewBox="0 0 10 10" xmlns="http://www.w3.org/2000/svg">
                                                    <path d="M9.73535 1.14746C9.57033 1.97255 9.32924 3.26406 9.24902 4.66797C9.16817 6.08312 9.25559 7.5453 9.70214 8.73633C9.84754 9.12406 9.65129 9.55659 9.26367 9.70215C8.9001 9.83849 8.4969 9.67455 8.32812 9.33398L8.29785 9.26367L8.19921 8.98438C7.73487 7.5758 7.67054 5.98959 7.75097 4.58203C7.77875 4.09598 7.82525 3.62422 7.87988 3.17969L1.53027 9.53027C1.23738 9.82317 0.762615 9.82317 0.469722 9.53027C0.176829 9.23738 0.176829 8.76262 0.469722 8.46973L6.83593 2.10254C6.3319 2.16472 5.79596 2.21841 5.25 2.24902C3.8302 2.32862 2.2474 2.26906 0.958003 1.79102L0.704097 1.68945L0.635738 1.65527C0.303274 1.47099 0.157578 1.06102 0.310542 0.704102C0.463655 0.347333 0.860941 0.170391 1.22363 0.28418L1.29589 0.310547L1.48828 0.387695C2.47399 0.751207 3.79966 0.827571 5.16601 0.750977C6.60111 0.670504 7.97842 0.428235 8.86132 0.262695L9.95312 0.0585938L9.73535 1.14746Z"></path>
                                                </svg>
                                            </span>
                                        </a>
                                    <?php endif; ?>
                                    <div class="counter-area">
                                        <ul class="counter-img-grp">
                                            <?php foreach ($settings['gofly_about_genaral_counter_area_two_gallery'] as $image): ?>
                                                <li><img src="<?php echo esc_url($image['url']); ?>" alt="<?php echo esc_attr__('gallery-images', 'gofly-core'); ?>"></li>
                                            <?php endforeach; ?>
                                        </ul>
                                        <h6> <strong><?php if (!empty($settings['gofly_about_genaral_counter_area_two_number'])) : ?><span class="counter"><?php echo esc_html($settings['gofly_about_genaral_counter_area_two_number']); ?></span><?php endif; ?><?php if (!empty($settings['gofly_about_genaral_counter_area_two_sign'])) : ?><?php echo esc_html($settings['gofly_about_genaral_counter_area_two_sign']); ?><?php endif; ?></strong><?php if (!empty($settings['gofly_about_genaral_counter_area_two_title'])) : ?><?php echo wp_kses($settings['gofly_about_genaral_counter_area_two_title'], wp_kses_allowed_html('post')); ?><?php endif; ?></h6>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6 wow animate fadeInRight" data-wow-delay="200ms" data-wow-duration="1500ms">
                            <div class="about-img-area">
                                <?php if (!empty($settings['gofly_about_genaral_counter_area_three_about_image_one']['url'])): ?>
                                    <div class="about-img">
                                        <img src="<?php echo esc_url($settings['gofly_about_genaral_counter_area_three_about_image_one']['url']); ?>" alt="<?php echo esc_attr__('about-image-one', 'gofly-core'); ?>">
                                    </div>
                                <?php endif; ?>
                                <div class="counter-wrapper">
                                    <div class="single-counter">
                                        <h2><?php if (!empty($settings['gofly_about_genaral_counter_area_three_number'])) : ?><strong class="counter"><?php echo esc_html($settings['gofly_about_genaral_counter_area_three_number']); ?></strong><?php endif; ?><?php if (!empty($settings['gofly_about_genaral_counter_area_three_sign'])) : ?><span><?php echo esc_html($settings['gofly_about_genaral_counter_area_three_sign']); ?></span><?php endif; ?></h2>
                                        <?php if (!empty($settings['gofly_about_genaral_counter_area_three_title'])): ?><span><?php echo wp_kses($settings['gofly_about_genaral_counter_area_three_title'], wp_kses_allowed_html('post')); ?></span><?php endif; ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <?php if (!empty($settings['gofly_about_style_six_vector_image']['url'])): ?>
                    <img src="<?php echo esc_url($settings['gofly_about_style_six_vector_image']['url']); ?>" alt="<?php echo esc_attr__('vector-image', 'gofly-core'); ?>" class="vector">
                <?php endif; ?>
            </div>
        <?php endif; ?>

<?php

    }
}

Plugin::instance()->widgets_manager->register(new Gofly_About_Widget());
