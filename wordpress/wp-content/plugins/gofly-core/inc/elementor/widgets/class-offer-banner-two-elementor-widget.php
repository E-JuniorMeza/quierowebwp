<?php

namespace Elementor;

if (!defined('ABSPATH')) exit;  // Exit if accessed directly

use Elementor\core\Schemes;
use Egns_Core\Egns_Helper;

class Gofly_Offer_Banner_Two_Widget extends Widget_Base
{

    public function get_name()
    {
        return 'gofly_offer_banner_two';
    }

    public function get_title()
    {
        return esc_html__('EG Offer Banner Two', 'gofly-core');
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
            'gofly_offer_banner_two_genaral',
            [
                'label' => esc_html__('General', 'gofly-core')
            ]
        );


        $this->add_control(
            'gofly_offer_banner_two_genaral_style_selection',
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

        $repeater = new \Elementor\Repeater();

        $repeater->add_control(
            'gofly_offer_banner_two_genaral_offer_bg_image',
            [
                'label'   => esc_html__('Background Image', 'gofly-core'),
                'type'    => \Elementor\Controls_Manager::MEDIA,
                'default' => [
                    'url' => \Elementor\Utils::get_placeholder_image_src(),
                ],
                'media_types' => ['image'],
            ]
        );

        $repeater->add_control(
            'gofly_offer_banner_two_genaral_offer_percentage',
            [
                'label'       => esc_html__('Offer Percentage', 'gofly-core'),
                'type'        => \Elementor\Controls_Manager::TEXT,
                'default'     => esc_html__('30%', 'gofly-core'),
                'placeholder' => esc_html__('write your text here', 'gofly-core'),
                'label_block' => true,
            ]
        );

        $repeater->add_control(
            'gofly_offer_banner_two_genaral_offer_discrount_label',
            [
                'label'       => esc_html__('Discount Label', 'gofly-core'),
                'type'        => \Elementor\Controls_Manager::TEXT,
                'default'     => esc_html__('discount', 'gofly-core'),
                'placeholder' => esc_html__('write your text here', 'gofly-core'),
                'label_block' => true,
            ]
        );

        $repeater->add_control(
            'gofly_offer_banner_two_genaral_offer_location_label',
            [
                'label'       => esc_html__('Location Label', 'gofly-core'),
                'type'        => \Elementor\Controls_Manager::TEXT,
                'default'     => esc_html__('Hokkaido, Japan', 'gofly-core'),
                'placeholder' => esc_html__('write your text here', 'gofly-core'),
                'label_block' => true,
            ]
        );

        $repeater->add_control(
            'gofly_offer_banner_two_genaral_offer_time_duration',
            [
                'label'       => esc_html__('Duration Label', 'gofly-core'),
                'type'        => \Elementor\Controls_Manager::TEXT,
                'default'     => esc_html__('05 Days, 04 Nights', 'gofly-core'),
                'placeholder' => esc_html__('write your text here', 'gofly-core'),
                'label_block' => true,
            ]
        );

        $repeater->add_control(
            'gofly_offer_banner_two_genaral_offer_button_label',
            [
                'label'       => esc_html__('Button Label', 'gofly-core'),
                'type'        => \Elementor\Controls_Manager::TEXT,
                'default'     => esc_html__('Book Now', 'gofly-core'),
                'placeholder' => esc_html__('write your label here', 'gofly-core'),
                'label_block' => true,
            ]
        );

        $repeater->add_control(
            'gofly_offer_banner_two_genaral_offer_button_label_url',
            [
                'label'       => esc_html__('Button Link/URL', 'gofly-core'),
                'type'        => \Elementor\Controls_Manager::URL,
                'default'     => ['url' => '#'],
                'placeholder' => esc_html__('write your url here', 'gofly-core'),
                'label_block' => true,

            ]
        );

        $this->add_control(
            'gofly_offer_banner_two_genaral_content_list',
            [
                'label'   => esc_html__('Content List', 'gofly-core'),
                'type'    => \Elementor\Controls_Manager::REPEATER,
                'fields'  => $repeater->get_controls(),
                'default' => [
                    [
                        'gofly_offer_banner_two_genaral_offer_location_label' => esc_html('Pokhara, Nepal'),

                    ],
                    [
                        'gofly_offer_banner_two_genaral_offer_location_label' => esc_html('Hokkaido, Japan'),
                    ],
                    [
                        'gofly_offer_banner_two_genaral_offer_location_label' => esc_html('Banff, Canada'),
                    ],
                ],
                'title_field' => '{{{ gofly_offer_banner_two_genaral_offer_location_label }}}',
                'condition'   => [
                    'gofly_offer_banner_two_genaral_style_selection' => ['style_one'],
                ]
            ]
        );



        $repeater = new \Elementor\Repeater();


        $repeater->add_control(
            'gofly_offer_banner_two_genaral_video_type_selection',
            [
                'label'   => esc_html__('Select Type', 'gofly-core'),
                'type'    => Controls_Manager::SELECT,
                'options' => [
                    'image' => esc_html__('Image', 'gofly-core'),
                    'video' => esc_html__('Video', 'gofly-core'),
                ],
                'default' => 'image',
            ]
        );

        $repeater->add_control(
            'gofly_offer_banner_two_genaral_two_activitiy_name_bg_image',
            [
                'label'   => esc_html__('Background Image', 'gofly-core'),
                'type'    => \Elementor\Controls_Manager::MEDIA,
                'default' => [
                    'url' => \Elementor\Utils::get_placeholder_image_src(),
                ],
                'media_types' => ['image'],
                'condition'   => [
                    'gofly_offer_banner_two_genaral_video_type_selection' => ['image'],
                ]
            ]
        );

        $repeater->add_control(
            'gofly_offer_banner_two_genaral_two_activitiy_name_bg_video',
            [
                'label'       => esc_html__('Background Video', 'gofly-core'),
                'type'        => \Elementor\Controls_Manager::MEDIA,
                'media_types' => ['video'],
                'default'     => [
                    'url' => \Elementor\Utils::get_placeholder_image_src(),
                ],
                'condition' => [
                    'gofly_offer_banner_two_genaral_video_type_selection' => ['video'],
                ]
            ]
        );

        $repeater->add_control(
            'gofly_offer_banner_two_genaral_two_activitiy_name',
            [
                'label'       => esc_html__('Activity Name', 'gofly-core'),
                'type'        => \Elementor\Controls_Manager::TEXT,
                'default'     => esc_html__('Scuba Driving', 'gofly-core'),
                'placeholder' => esc_html__('write your text here', 'gofly-core'),
                'label_block' => true,
            ]
        );

        $repeater->add_control(
            'gofly_offer_banner_two_genaral_two_activitiy_button',
            [
                'label'       => esc_html__('Button Label', 'gofly-core'),
                'type'        => \Elementor\Controls_Manager::TEXT,
                'default'     => esc_html__('View All Package', 'gofly-core'),
                'placeholder' => esc_html__('write your label here', 'gofly-core'),
                'label_block' => true,
            ]
        );

        $repeater->add_control(
            'gofly_offer_banner_two_genaral_two_activitiy_button_url',
            [
                'label'       => esc_html__('Button Link/URL', 'gofly-core'),
                'type'        => \Elementor\Controls_Manager::URL,
                'default'     => ['url' => '#'],
                'placeholder' => esc_html__('write your url here', 'gofly-core'),
                'label_block' => true,

            ]
        );

        $this->add_control(
            'gofly_offer_banner_two_genaral_two_content_list',
            [
                'label'   => esc_html__('Content List', 'gofly-core'),
                'type'    => \Elementor\Controls_Manager::REPEATER,
                'fields'  => $repeater->get_controls(),
                'default' => [
                    [
                        'gofly_offer_banner_two_genaral_two_activitiy_name' => esc_html('Scuba Driving'),

                    ],
                    [
                        'gofly_offer_banner_two_genaral_two_activitiy_name' => esc_html('Surfing'),
                    ],
                    [
                        'gofly_offer_banner_two_genaral_two_activitiy_name' => esc_html('Water Rafting'),
                    ],
                ],
                'title_field' => '{{{ gofly_offer_banner_two_genaral_two_activitiy_name }}}',
                'condition'   => [
                    'gofly_offer_banner_two_genaral_style_selection' => ['style_two'],
                ]
            ]
        );

        $this->end_controls_section();

        //=====================style One start=======================//


        $this->start_controls_section(
            'gofly_offer_banner_two_style_genaral',
            [
                'label'     => esc_html__('Styles', 'gofly-core'),
                'tab'       => Controls_Manager::TAB_STYLE,
                'condition' => [
                    'gofly_offer_banner_two_genaral_style_selection' => ['style_one'],
                ]
            ]
        );

        $this->add_control(
            'gofly_offer_banner_two_style_genaral_global_section',
            [
                'label'     => esc_html__('Global Section', 'gofly-core'),
                'type'      => \Elementor\Controls_Manager::HEADING,
                'separator' => 'after',
            ]
        );

        $this->add_control(
            'gofly_offer_banner_two_style_genaral_global_section_bg_color',
            [
                'label'     => esc_html__('Background Color', 'gofly-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .home6-offer-banner-section .banner-wrapper .banner-content-wrap .banner-content::before' => 'background-color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'gofly_offer_banner_two_style_genaral_discount_number',
            [
                'label'     => esc_html__('Discount Number', 'gofly-core'),
                'type'      => \Elementor\Controls_Manager::HEADING,
                'separator' => 'after',
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'label'    => esc_html__('Typography', 'gofly-core'),
                'name'     => 'gofly_offer_banner_two_style_genaral_discount_number_typ',
                'selector' => '{{WRAPPER}} .home6-offer-banner-section .banner-wrapper .banner-content-wrap .banner-content .discount-area h2',

            ]
        );

        $this->add_control(
            'gofly_offer_banner_two_style_genaral_discount_number_color',
            [
                'label'     => esc_html__('Color', 'gofly-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .home6-offer-banner-section .banner-wrapper .banner-content-wrap .banner-content .discount-area h2' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'gofly_offer_banner_two_style_genaral_discount_title',
            [
                'label'     => esc_html__('Discount Title', 'gofly-core'),
                'type'      => \Elementor\Controls_Manager::HEADING,
                'separator' => 'after',
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'label'    => esc_html__('Typography', 'gofly-core'),
                'name'     => 'gofly_offer_banner_two_style_genaral_discount_title_typ',
                'selector' => '{{WRAPPER}} .home6-offer-banner-section .banner-wrapper .banner-content-wrap .banner-content .discount-area span',

            ]
        );

        $this->add_control(
            'gofly_offer_banner_two_style_genaral_discount_title_color',
            [
                'label'     => esc_html__('Color', 'gofly-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .home6-offer-banner-section .banner-wrapper .banner-content-wrap .banner-content .discount-area span' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'gofly_offer_banner_two_style_genaral_location_title',
            [
                'label'     => esc_html__('Location Title', 'gofly-core'),
                'type'      => \Elementor\Controls_Manager::HEADING,
                'separator' => 'after',
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'label'    => esc_html__('Typography', 'gofly-core'),
                'name'     => 'gofly_offer_banner_two_style_genaral_location_title_typ',
                'selector' => '{{WRAPPER}} .home6-offer-banner-section .banner-wrapper .banner-content-wrap .banner-content .location-area h3',

            ]
        );

        $this->add_control(
            'gofly_offer_banner_two_style_genaral_location_title_color',
            [
                'label'     => esc_html__('Color', 'gofly-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .home6-offer-banner-section .banner-wrapper .banner-content-wrap .banner-content .location-area h3' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'gofly_offer_banner_two_style_genaral_location_duration',
            [
                'label'     => esc_html__('Location Duration', 'gofly-core'),
                'type'      => \Elementor\Controls_Manager::HEADING,
                'separator' => 'after',
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'label'    => esc_html__('Typography', 'gofly-core'),
                'name'     => 'gofly_offer_banner_two_style_genaral_location_duration_typ',
                'selector' => '{{WRAPPER}} .home6-offer-banner-section .banner-wrapper .banner-content-wrap .banner-content .location-area span',

            ]
        );

        $this->add_control(
            'gofly_offer_banner_two_style_genaral_location_duration_color',
            [
                'label'     => esc_html__('Color', 'gofly-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .home6-offer-banner-section .banner-wrapper .banner-content-wrap .banner-content .location-area span' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'gofly_offer_banner_two_style_genaral_button',
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
                'name'     => 'gofly_offer_banner_two_style_genaral_button_typ',
                'selector' => '{{WRAPPER}} .home6-offer-banner-section .banner-wrapper .banner-content-wrap .btn-area .primary-btn1',

            ]
        );

        $this->add_control(
            'gofly_offer_banner_two_style_genaral_button_color',
            [
                'label'     => esc_html__('Color', 'gofly-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .home6-offer-banner-section .banner-wrapper .banner-content-wrap .btn-area .primary-btn1' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'gofly_offer_banner_two_style_genaral_button_hover_color',
            [
                'label'     => esc_html__('Hover Color', 'gofly-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .primary-btn1:hover' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'gofly_offer_banner_two_style_genaral_button_icon_color',
            [
                'label'     => esc_html__('Icon Color', 'gofly-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .primary-btn1 > span svg' => 'fill: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'gofly_offer_banner_two_style_genaral_button_icon_hover_color',
            [
                'label'     => esc_html__('Hover Icon Color', 'gofly-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .primary-btn1:hover > span svg' => 'fill: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'gofly_offer_banner_two_style_genaral_button_bg_color',
            [
                'label'     => esc_html__('Background Color', 'gofly-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .home6-offer-banner-section .banner-wrapper .banner-content-wrap .btn-area .primary-btn1' => 'background-color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'gofly_offer_banner_two_style_genaral_button_bg_hover_color',
            [
                'label'     => esc_html__('Hover Background Color', 'gofly-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .home6-offer-banner-section .banner-wrapper .banner-content-wrap .btn-area .primary-btn1::after' => 'background-color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'gofly_offer_banner_two_style_genaral_pagination',
            [
                'label'     => esc_html__('Pagination', 'gofly-core'),
                'type'      => \Elementor\Controls_Manager::HEADING,
                'separator' => 'after',
            ]
        );

        $this->add_control(
            'gofly_offer_banner_two_style_genaral_pagination_color',
            [
                'label'     => esc_html__('Color', 'gofly-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .home6-offer-banner-section .slider-btn-grp .slider-btn svg' => 'fill: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'gofly_offer_banner_two_style_genaral_pagination_hover_color',
            [
                'label'     => esc_html__('Hover Color', 'gofly-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .home6-offer-banner-section .slider-btn-grp .slider-btn:hover svg' => 'fill: {{VALUE}};',
                ],
            ]
        );


        $this->add_control(
            'gofly_offer_banner_two_style_genaral_pagination_border_color',
            [
                'label'     => esc_html__('Border Color', 'gofly-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .home6-offer-banner-section .slider-btn-grp .slider-btn' => 'border: 1px solid {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'gofly_offer_banner_two_style_genaral_pagination_bg_color',
            [
                'label'     => esc_html__('Background Color', 'gofly-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .home6-offer-banner-section .slider-btn-grp .slider-btn' => 'background-color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'gofly_offer_banner_two_style_genaral_pagination_bg_hover_color',
            [
                'label'     => esc_html__('Hover Background Color', 'gofly-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .home6-offer-banner-section .slider-btn-grp .slider-btn:hover' => 'background-color: {{VALUE}};',
                ],
            ]
        );

        $this->end_controls_section();


        //=====================style One start=======================//


        $this->start_controls_section(
            'gofly_offer_banner_two_style_two_genaral',
            [
                'label'     => esc_html__('Styles', 'gofly-core'),
                'tab'       => Controls_Manager::TAB_STYLE,
                'condition' => [
                    'gofly_offer_banner_two_genaral_style_selection' => ['style_two'],
                ]
            ]
        );

        $this->add_control(
            'gofly_offer_banner_two_style_two_genaral_activity_name',
            [
                'label'     => esc_html__('Activity Name', 'gofly-core'),
                'type'      => \Elementor\Controls_Manager::HEADING,
                'separator' => 'after',
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'label'    => esc_html__('Typography', 'gofly-core'),
                'name'     => 'gofly_offer_banner_two_style_two_genaral_activity_name_typ',
                'selector' => '{{WRAPPER}} .home6-activity-banner-section .banner-content h2',

            ]
        );

        $this->add_control(
            'gofly_offer_banner_two_style_two_genaral_activity_name_color',
            [
                'label'     => esc_html__('Color', 'gofly-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .home6-activity-banner-section .banner-content h2' => 'color: {{VALUE}};',
                ],
            ]
        );


        $this->add_control(
            'gofly_offer_banner_two_style_two_genaral_activity_button',
            [
                'label'     => esc_html__('Activity Button', 'gofly-core'),
                'type'      => \Elementor\Controls_Manager::HEADING,
                'separator' => 'after',
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'label'    => esc_html__('Typography', 'gofly-core'),
                'name'     => 'gofly_offer_banner_two_style_two_genaral_activity_button_typ',
                'selector' => '{{WRAPPER}} .home6-activity-banner-section .banner-content a',

            ]
        );

        $this->add_control(
            'gofly_offer_banner_two_style_two_genaral_activity_button_color',
            [
                'label'     => esc_html__('Color', 'gofly-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .home6-activity-banner-section .banner-content a' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'gofly_offer_banner_two_style_two_genaral_activity_button_hover_color',
            [
                'label'     => esc_html__('Hover Color', 'gofly-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .home6-activity-banner-section .banner-content a:hover' => 'color: {{VALUE}};',
                ],
            ]
        );


        $this->end_controls_section();
    }
    protected function render()
    {

        $settings = $this->get_settings_for_display();

?>

        <?php if (is_admin()): ?>
            <script>
                var swiper4 = new Swiper(".home6-offer-sm-img-slider", {
                    spaceBetween: 25,
                    slidesPerView: 1,
                    freeMode: false,
                    watchSlidesProgress: true,
                    loop: true,
                    breakpoints: {
                        280: {
                            slidesPerView: 2,
                        },
                        350: {
                            slidesPerView: 3,
                            spaceBetween: 10,
                        },
                        576: {
                            slidesPerView: 3,
                            spaceBetween: 15,
                        },
                        768: {
                            slidesPerView: 3,
                            spaceBetween: 15,
                        },
                        992: {
                            slidesPerView: 3,
                            spaceBetween: 15,
                        },
                        1200: {
                            slidesPerView: 3,
                            spaceBetween: 20,
                        },
                        1400: {
                            slidesPerView: 3,
                        },
                    },
                });

                var swiper = new Swiper(".home6-offer-banner-slider", {
                    slidesPerView: 1,
                    speed: 1500,
                    spaceBetween: 24,
                    loop: true,
                    autoplay: {
                        delay: 2500, // Autoplay duration in milliseconds
                        disableOnInteraction: false,
                    },
                    effect: "fade",
                    fadeEffect: {
                        crossFade: true,
                    },
                    navigation: {
                        nextEl: ".offer-banner-slider-next",
                        prevEl: ".offer-banner-slider-prev",
                    },
                    thumbs: {
                        swiper: swiper4,
                    },
                });

                var swiper5 = new Swiper(".home6-activity-sm-img-slider", {
                    spaceBetween: 25,
                    slidesPerView: 1,
                    freeMode: false,
                    watchSlidesProgress: true,
                    loop: true,
                    breakpoints: {
                        280: {
                            slidesPerView: 2,
                        },
                        350: {
                            slidesPerView: 3,
                            spaceBetween: 10,
                        },
                        576: {
                            slidesPerView: 3,
                            spaceBetween: 15,
                        },
                        768: {
                            slidesPerView: 3,
                            spaceBetween: 15,
                        },
                        992: {
                            slidesPerView: 3,
                            spaceBetween: 15,
                        },
                        1200: {
                            slidesPerView: 3,
                            spaceBetween: 20,
                        },
                        1400: {
                            slidesPerView: 3,
                        },
                    },
                });

                var swiper = new Swiper(".home6-activity-banner-slider", {
                    slidesPerView: 1,
                    speed: 1500,
                    spaceBetween: 24,
                    loop: true,
                    autoplay: {
                        delay: 2500, // Autoplay duration in milliseconds
                        disableOnInteraction: false,
                    },
                    effect: "fade",
                    fadeEffect: {
                        crossFade: true,
                    },
                    navigation: {
                        nextEl: ".offer-banner-slider-next",
                        prevEl: ".offer-banner-slider-prev",
                    },
                    thumbs: {
                        swiper: swiper5,
                    },
                });
            </script>
        <?php endif; ?>

        <?php if ($settings['gofly_offer_banner_two_genaral_style_selection'] == 'style_one'): ?>
            <div class="home6-offer-banner-section">
                <div class="swiper home6-offer-banner-slider">
                    <div class="swiper-wrapper">
                        <?php foreach ($settings['gofly_offer_banner_two_genaral_content_list'] as $data): ?>
                            <div class="swiper-slide">
                                <div class="banner-wrapper" style="background-image: linear-gradient(180deg, rgba(0, 0, 0, 0) 74.86%, rgba(0, 0, 0, 0.8) 100%), url(<?php echo esc_url($data['gofly_offer_banner_two_genaral_offer_bg_image']['url']); ?>);">
                                    <div class="container">
                                        <div class="row justify-content-center">
                                            <div class="col-xl-6 col-lg-8 col-md-10">
                                                <div class="banner-content-wrap">
                                                    <div class="banner-content">
                                                        <div class="discount-area">
                                                            <?php if (!empty($data['gofly_offer_banner_two_genaral_offer_percentage'])): ?>
                                                                <h2><?php echo esc_html($data['gofly_offer_banner_two_genaral_offer_percentage']); ?></h2>
                                                            <?php endif; ?>
                                                            <?php if (!empty($data['gofly_offer_banner_two_genaral_offer_discrount_label'])): ?>
                                                                <span><?php echo esc_html($data['gofly_offer_banner_two_genaral_offer_discrount_label']); ?></span>
                                                            <?php endif; ?>
                                                        </div>
                                                        <div class="location-area">
                                                            <?php if (!empty($data['gofly_offer_banner_two_genaral_offer_location_label'])): ?>
                                                                <h3><?php echo esc_html($data['gofly_offer_banner_two_genaral_offer_location_label']); ?></h3>
                                                            <?php endif; ?>
                                                            <?php if (!empty($data['gofly_offer_banner_two_genaral_offer_time_duration'])): ?>
                                                                <span><?php echo esc_html($data['gofly_offer_banner_two_genaral_offer_time_duration']); ?></span>
                                                            <?php endif; ?>
                                                        </div>
                                                        <span class="vector1"></span>
                                                        <span class="vector2"></span>
                                                    </div>
                                                    <?php if (!empty($data['gofly_offer_banner_two_genaral_offer_button_label'])): ?>
                                                        <div class="btn-area">
                                                            <a href="<?php echo esc_url($data['gofly_offer_banner_two_genaral_offer_button_label_url']['url']); ?>" class="primary-btn1 two">
                                                                <span>
                                                                    <?php echo esc_html($data['gofly_offer_banner_two_genaral_offer_button_label']); ?>
                                                                    <svg width="10" height="10" viewBox="0 0 10 10" xmlns="http://www.w3.org/2000/svg">
                                                                        <path d="M9.73535 1.14746C9.57033 1.97255 9.32924 3.26406 9.24902 4.66797C9.16817 6.08312 9.25559 7.5453 9.70214 8.73633C9.84754 9.12406 9.65129 9.55659 9.26367 9.70215C8.9001 9.83849 8.4969 9.67455 8.32812 9.33398L8.29785 9.26367L8.19921 8.98438C7.73487 7.5758 7.67054 5.98959 7.75097 4.58203C7.77875 4.09598 7.82525 3.62422 7.87988 3.17969L1.53027 9.53027C1.23738 9.82317 0.762615 9.82317 0.469722 9.53027C0.176829 9.23738 0.176829 8.76262 0.469722 8.46973L6.83593 2.10254C6.3319 2.16472 5.79596 2.21841 5.25 2.24902C3.8302 2.32862 2.2474 2.26906 0.958003 1.79102L0.704097 1.68945L0.635738 1.65527C0.303274 1.47099 0.157578 1.06102 0.310542 0.704102C0.463655 0.347333 0.860941 0.170391 1.22363 0.28418L1.29589 0.310547L1.48828 0.387695C2.47399 0.751207 3.79966 0.827571 5.16601 0.750977C6.60111 0.670504 7.97842 0.428235 8.86132 0.262695L9.95312 0.0585938L9.73535 1.14746Z"></path>
                                                                    </svg>
                                                                </span>
                                                                <span>
                                                                    <?php echo esc_html($data['gofly_offer_banner_two_genaral_offer_button_label']); ?>
                                                                    <svg width="10" height="10" viewBox="0 0 10 10" xmlns="http://www.w3.org/2000/svg">
                                                                        <path d="M9.73535 1.14746C9.57033 1.97255 9.32924 3.26406 9.24902 4.66797C9.16817 6.08312 9.25559 7.5453 9.70214 8.73633C9.84754 9.12406 9.65129 9.55659 9.26367 9.70215C8.9001 9.83849 8.4969 9.67455 8.32812 9.33398L8.29785 9.26367L8.19921 8.98438C7.73487 7.5758 7.67054 5.98959 7.75097 4.58203C7.77875 4.09598 7.82525 3.62422 7.87988 3.17969L1.53027 9.53027C1.23738 9.82317 0.762615 9.82317 0.469722 9.53027C0.176829 9.23738 0.176829 8.76262 0.469722 8.46973L6.83593 2.10254C6.3319 2.16472 5.79596 2.21841 5.25 2.24902C3.8302 2.32862 2.2474 2.26906 0.958003 1.79102L0.704097 1.68945L0.635738 1.65527C0.303274 1.47099 0.157578 1.06102 0.310542 0.704102C0.463655 0.347333 0.860941 0.170391 1.22363 0.28418L1.29589 0.310547L1.48828 0.387695C2.47399 0.751207 3.79966 0.827571 5.16601 0.750977C6.60111 0.670504 7.97842 0.428235 8.86132 0.262695L9.95312 0.0585938L9.73535 1.14746Z"></path>
                                                                    </svg>
                                                                </span>
                                                            </a>
                                                        </div>
                                                    <?php endif; ?>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    </div>
                </div>
                <div class="btn-and-img-area">
                    <div class="container">
                        <div class="slider-btn-grp">
                            <div class="slider-btn offer-banner-slider-prev">
                                <svg width="16" height="16" viewBox="0 0 16 16" xmlns="http://www.w3.org/2000/svg">
                                    <g>
                                        <path fill-rule="evenodd" clip-rule="evenodd" d="M0 7.31421H16V8.68564H0V7.31421Z" />
                                        <path fill-rule="evenodd" clip-rule="evenodd"
                                            d="M0.685714 8.68569C3.9104 8.68569 6.54629 5.84958 6.54629 2.82512V2.1394H5.17486V2.82512C5.17486 5.12181 3.12412 7.31426 0.685714 7.31426H0V8.68569H0.685714Z" />
                                        <path fill-rule="evenodd" clip-rule="evenodd"
                                            d="M0.685714 7.31421C3.9104 7.31421 6.54629 10.1503 6.54629 13.1748V13.8605H5.17486V13.1748C5.17486 10.879 3.12412 8.68564 0.685714 8.68564H0V7.31421H0.685714Z" />
                                    </g>
                                </svg>
                            </div>
                            <div class="swiper home6-offer-sm-img-slider">
                                <div class="swiper-wrapper">
                                    <?php foreach ($settings['gofly_offer_banner_two_genaral_content_list'] as $data): ?>
                                        <?php if (!empty($data['gofly_offer_banner_two_genaral_offer_bg_image']['url'])) : ?>
                                            <div class="swiper-slide">
                                                <div class="offer-sm-img">
                                                    <img src="<?php echo esc_url($data['gofly_offer_banner_two_genaral_offer_bg_image']['url']); ?>" alt="<?php echo esc_attr__('banner-image', 'gofly-core'); ?>">
                                                </div>
                                            </div>
                                        <?php endif; ?>
                                    <?php endforeach; ?>
                                </div>
                            </div>
                            <div class="slider-btn offer-banner-slider-next">
                                <svg width="16" height="16" viewBox="0 0 16 16" xmlns="http://www.w3.org/2000/svg">
                                    <g>
                                        <path fill-rule="evenodd" clip-rule="evenodd" d="M16 7.31421H-3.8147e-06V8.68564H16V7.31421Z" />
                                        <path fill-rule="evenodd" clip-rule="evenodd"
                                            d="M15.3143 8.68569C12.0896 8.68569 9.45371 5.84958 9.45371 2.82512V2.1394H10.8251V2.82512C10.8251 5.12181 12.8759 7.31426 15.3143 7.31426H16V8.68569H15.3143Z" />
                                        <path fill-rule="evenodd" clip-rule="evenodd"
                                            d="M15.3143 7.31421C12.0896 7.31421 9.45371 10.1503 9.45371 13.1748V13.8605H10.8251V13.1748C10.8251 10.879 12.8759 8.68564 15.3143 8.68564H16V7.31421H15.3143Z" />
                                    </g>
                                </svg>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        <?php endif; ?>

        <?php if ($settings['gofly_offer_banner_two_genaral_style_selection'] == 'style_two'): ?>
            <div class="home6-activity-banner-section">
                <div class="swiper home6-activity-banner-slider">
                    <div class="swiper-wrapper">
                        <?php foreach ($settings['gofly_offer_banner_two_genaral_two_content_list'] as $data): ?>
                            <?php if ($data['gofly_offer_banner_two_genaral_video_type_selection'] == 'image') : ?>
                                <div class="swiper-slide">
                                    <div class="banner-wrapper" style="background-image: linear-gradient(180deg, rgba(0, 0, 0, 0.15) 0%, rgba(0, 0, 0, 0.15) 100%), url(<?php echo esc_url($data['gofly_offer_banner_two_genaral_two_activitiy_name_bg_image']['url']); ?>);">
                                        <div class="container">
                                            <div class="banner-content">
                                                <?php if (!empty($data['gofly_offer_banner_two_genaral_two_activitiy_name'])): ?>
                                                    <h2><?php echo esc_html($data['gofly_offer_banner_two_genaral_two_activitiy_name']); ?></h2>
                                                <?php endif; ?>
                                                <?php if (!empty($data['gofly_offer_banner_two_genaral_two_activitiy_button'])): ?>
                                                    <a href="<?php echo esc_url($data['gofly_offer_banner_two_genaral_two_activitiy_button_url']['url']); ?>"><?php echo esc_html($data['gofly_offer_banner_two_genaral_two_activitiy_button']); ?></a>
                                                <?php endif; ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            <?php else: ?>
                                <div class="swiper-slide">
                                    <div class="video-wrapper">
                                        <?php if (!empty($data['gofly_offer_banner_two_genaral_two_activitiy_name_bg_video']['url'])): ?>
                                            <div class="banner-video-area">
                                                <video autoplay loop muted playsinline src="<?php echo esc_url($data['gofly_offer_banner_two_genaral_two_activitiy_name_bg_video']['url']); ?>"></video>
                                            </div>
                                        <?php endif; ?>
                                        <div class="banner-content-wrap">
                                            <div class="container">
                                                <div class="banner-content">
                                                    <?php if (!empty($data['gofly_offer_banner_two_genaral_two_activitiy_name'])): ?>
                                                        <h2><?php echo esc_html($data['gofly_offer_banner_two_genaral_two_activitiy_name']); ?></h2>
                                                    <?php endif; ?>
                                                    <?php if (!empty($data['gofly_offer_banner_two_genaral_two_activitiy_button'])): ?>
                                                        <a href="<?php echo esc_url($data['gofly_offer_banner_two_genaral_two_activitiy_button_url']['url']); ?>"><?php echo esc_html($data['gofly_offer_banner_two_genaral_two_activitiy_button']); ?></a>
                                                    <?php endif; ?>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            <?php endif; ?>
                        <?php endforeach; ?>
                    </div>
                </div>
                <div class="sm-img-area">
                    <div class="swiper home6-activity-sm-img-slider">
                        <div class="swiper-wrapper">
                            <?php foreach ($settings['gofly_offer_banner_two_genaral_two_content_list'] as $data): ?>
                                <div class="swiper-slide">
                                    <div class="activity-sm-img">
                                        <?php if ($data['gofly_offer_banner_two_genaral_video_type_selection'] == 'image') : ?>
                                            <?php if (!empty($data['gofly_offer_banner_two_genaral_two_activitiy_name_bg_image']['url'])): ?>
                                                <img src="<?php echo esc_url($data['gofly_offer_banner_two_genaral_two_activitiy_name_bg_image']['url']); ?>" alt="<?php echo esc_attr__('background-image', 'gofly-core'); ?>">
                                            <?php endif; ?>
                                        <?php else : ?>
                                            <?php if (!empty($data['gofly_offer_banner_two_genaral_two_activitiy_name_bg_video']['url'])): ?>
                                                <video autoplay loop muted playsinline src="<?php echo esc_url($data['gofly_offer_banner_two_genaral_two_activitiy_name_bg_video']['url']); ?>"></video>
                                            <?php endif; ?>
                                        <?php endif; ?>
                                    </div>
                                </div>
                            <?php endforeach; ?>
                        </div>
                    </div>
                </div>
            </div>
        <?php endif; ?>

<?php

    }
}

Plugin::instance()->widgets_manager->register(new Gofly_Offer_Banner_Two_Widget());
