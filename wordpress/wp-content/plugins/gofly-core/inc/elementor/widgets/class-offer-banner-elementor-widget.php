<?php

namespace Elementor;

if (!defined('ABSPATH')) exit;  // Exit if accessed directly

use Elementor\core\Schemes;
use Elementor\Group_Control_Typography;
use Egns_Core\Egns_Helper;

class Gofly_Offer_Banner_Widget extends Widget_Base
{

    public function get_name()
    {
        return 'gofly_offer_banner';
    }

    public function get_title()
    {
        return esc_html__('EG Offer Banner', 'gofly-core');
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
            'gofly_offer_banner_genaral',
            [
                'label' => esc_html__('General', 'gofly-core')
            ]
        );

        $this->add_control(
            'gofly_offer_banners_style_selection',
            [
                'label'   => esc_html__('Offer Banner Styles', 'gofly-core'),
                'type'    => Controls_Manager::SELECT,
                'options' => [
                    'style_one'   => esc_html__('Style One', 'gofly-core'),
                    'style_two'   => esc_html__('Style Two', 'gofly-core'),
                    'style_three' => esc_html__('Style Three', 'gofly-core'),
                    'style_four'  => esc_html__('Style Four', 'gofly-core'),
                    'style_five'  => esc_html__('Style Five', 'gofly-core'),
                ],
                'default' => 'style_one',
            ]
        );

        $this->add_control(
            'gofly_offer_banner_header_switcher',
            [
                'label'        => esc_html__("Show Header?", 'gofly-core'),
                'type'         => \Elementor\Controls_Manager::SWITCHER,
                'label_on'     => esc_html__('Enable', 'gofly-core'),
                'label_off'    => esc_html__('Disable', 'gofly-core'),
                'return_value' => 'yes',
                'default'      => 'yes',
                'condition'    => [
                    'gofly_offer_banners_style_selection' => ['style_one'],
                ]
            ]
        );

        $this->add_control(
            'gofly_offer_banner_switcher',
            [
                'label'        => esc_html__("Show Offer Banner?", 'gofly-core'),
                'type'         => \Elementor\Controls_Manager::SWITCHER,
                'label_on'     => esc_html__('Enable', 'gofly-core'),
                'label_off'    => esc_html__('Disable', 'gofly-core'),
                'return_value' => 'yes',
                'default'      => 'yes',
                'condition'    => [
                    'gofly_offer_banners_style_selection' => ['style_two'],
                ]
            ]
        );

        $this->add_control(
            'gofly_offer_banner_general_subtitle',
            [
                'label'       => esc_html__('Sub-title', 'gofly-core'),
                'type'        => \Elementor\Controls_Manager::TEXT,
                'default'     => esc_html__('Limited Offer', 'gofly-core'),
                'placeholder' => esc_html__('write your sub-title here', 'gofly-core'),
                'label_block' => true,
                'condition'   => [
                    'gofly_offer_banners_style_selection' => ['style_four'],
                ]
            ]
        );

        $this->add_control(
            'gofly_offer_banner_general_title',
            [
                'label'       => esc_html__('Title', 'gofly-core'),
                'type'        => \Elementor\Controls_Manager::TEXT,
                'default'     => esc_html__('Offer Banners', 'gofly-core'),
                'placeholder' => esc_html__('write your title here', 'gofly-core'),
                'label_block' => true,
                'condition'   => [
                    'gofly_offer_banners_style_selection' => ['style_one', 'style_four'],
                ]
            ]
        );

        $this->add_control(
            'gofly_offer_banner_general_desc',
            [
                'label'       => esc_html__('Descriptin', 'gofly-core'),
                'type'        => \Elementor\Controls_Manager::TEXTAREA,
                'default'     => wp_kses('A curated list of the most popular travel packages based on different destinations.', wp_kses_allowed_html('post')),
                'placeholder' => esc_html__('write your description here', 'gofly-core'),
                'label_block' => true,
                'condition'   => [
                    'gofly_offer_banners_style_selection' => ['style_one'],
                ]
            ]
        );

        $repeater = new \Elementor\Repeater();

        $repeater->add_control(
            'gofly_offer_banner_images',
            [
                'label'   => esc_html__('Images', 'gofly-core'),
                'type'    => \Elementor\Controls_Manager::MEDIA,
                'default' => [
                    'url' => \Elementor\Utils::get_placeholder_image_src(),
                ],
            ]
        );

        $repeater->add_control(
            'gofly_offer_banner_images_link',
            [
                'label'   => esc_html__('URL', 'gofly-core'),
                'type'    => \Elementor\Controls_Manager::URL,
                'default' => [
                    'url' => '#',
                ],
            ]
        );

        $this->add_control(
            'gofly_offer_slide_images',
            [
                'label'     => esc_html__('Images', 'gofly-core'),
                'type'      => \Elementor\Controls_Manager::REPEATER,
                'fields'    => $repeater->get_controls(),
                'condition' => [
                    'gofly_offer_banners_style_selection' => ['style_one', 'style_two', 'style_three'],
                ]
            ]
        );

        $this->add_control(
            'gofly_offer_banner_two_card_title',
            [
                'label'       => esc_html__('Title', 'gofly-core'),
                'type'        => \Elementor\Controls_Manager::TEXT,
                'default'     => wp_kses('To Go Your Desire Place Through our <span>GoFLy.</span>', wp_kses_allowed_html('post')),
                'placeholder' => esc_html__('write your title here', 'gofly-core'),
                'label_block' => true,
                'condition'   => [
                    'gofly_offer_banners_style_selection' => ['style_two'],
                ]
            ]
        );

        $this->add_control(
            'gofly_offer_banner_two_card_button',
            [
                'label'       => esc_html__('Button Label', 'gofly-core'),
                'type'        => \Elementor\Controls_Manager::TEXT,
                'default'     => esc_html__('View All Package.', 'gofly-core'),
                'placeholder' => esc_html__('write your label here', 'gofly-core'),
                'label_block' => true,
                'condition'   => [
                    'gofly_offer_banners_style_selection' => ['style_two'],
                ]
            ]
        );

        $this->add_control(
            'gofly_offer_banner_two_card_button_link',
            [
                'label'       => esc_html__('Button URL', 'gofly-core'),
                'type'        => \Elementor\Controls_Manager::URL,
                'default'     => ['#'],
                'placeholder' => esc_html__('https://yourlink.com', 'gofly-core'),
                'label_block' => true,
                'condition'   => [
                    'gofly_offer_banners_style_selection' => ['style_two'],
                ]
            ]
        );

        $repeater = new \Elementor\Repeater();

        $repeater->add_control(
            'gofly_offer_banner_card_list_icon',
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
            'gofly_offer_banner_card_list_title',
            [
                'label'       => esc_html__('Title', 'gofly-core'),
                'type'        => \Elementor\Controls_Manager::TEXT,
                'default'     => esc_html__('One Click Booking.', 'gofly-core'),
                'placeholder' => esc_html__('write your label here', 'gofly-core'),
                'label_block' => true,
            ]
        );

        $repeater->add_control(
            'gofly_offer_banner_card_list_desc',
            [
                'label'       => esc_html__('Description', 'gofly-core'),
                'type'        => \Elementor\Controls_Manager::TEXTAREA,
                'default'     => esc_html__('You can hassle-free and fast tour & travel package booking by GoFly.', 'gofly-core'),
                'placeholder' => esc_html__('write your label here', 'gofly-core'),
                'label_block' => true,
            ]
        );

        $this->add_control(
            'gofly_offer_banner_card_items',
            [
                'label'   => esc_html__('Booking Features', 'gofly-core'),
                'type'    => \Elementor\Controls_Manager::REPEATER,
                'fields'  => $repeater->get_controls(),
                'default' => [
                    [
                        'gofly_offer_banner_card_list_title' => esc_html('One Click Booking'),
                        'gofly_offer_banner_card_list_desc'  => esc_html('You can hassle-free and fast tour & travel package booking by GoFly.'),
                    ],
                    [
                        'gofly_offer_banner_card_list_title' => esc_html('Deals & Discounts'),
                        'gofly_offer_banner_card_list_desc'  => esc_html('Agencies have special discounts on flights, hotels, & packages.'),
                    ],
                    [
                        'gofly_offer_banner_card_list_title' => esc_html('Local Guidance'),
                        'gofly_offer_banner_card_list_desc'  => esc_html('Travel agencies have experienced professionals guidance.'),
                    ],
                ],
                'condition'   => [
                    'gofly_offer_banners_style_selection' => ['style_two'],
                ]
            ]
        );


        $this->add_control(
            'gofly_offer_banner_bg_images',
            [
                'label'   => esc_html__('Image', 'gofly-core'),
                'type'    => \Elementor\Controls_Manager::MEDIA,
                'default' => [
                    'url' => \Elementor\Utils::get_placeholder_image_src(),
                ],
                'condition'   => [
                    'gofly_offer_banners_style_selection' => ['style_two', 'style_four'],
                ]
            ]
        );

        $this->add_control(
            'gofly_offer_banner_bg_vector_baloon_image',
            [
                'label'   => esc_html__('Moving Baloon Image', 'gofly-core'),
                'type'    => \Elementor\Controls_Manager::MEDIA,
                'default' => [
                    'url' => \Elementor\Utils::get_placeholder_image_src(),
                ],
                'condition'   => [
                    'gofly_offer_banners_style_selection' => ['style_four'],
                ]
            ]
        );

        $this->add_control(
            'gofly_offer_banner_bg_vector_image1',
            [
                'label'   => esc_html__('Background Vector Image 1', 'gofly-core'),
                'type'    => \Elementor\Controls_Manager::MEDIA,
                'default' => [
                    'url' => \Elementor\Utils::get_placeholder_image_src(),
                ],
                'condition'   => [
                    'gofly_offer_banners_style_selection' => ['style_four'],
                ]
            ]
        );

        $this->add_control(
            'gofly_offer_banner_bg_vector_image2',
            [
                'label'   => esc_html__('Background Vector Image 2', 'gofly-core'),
                'type'    => \Elementor\Controls_Manager::MEDIA,
                'default' => [
                    'url' => \Elementor\Utils::get_placeholder_image_src(),
                ],
                'condition'   => [
                    'gofly_offer_banners_style_selection' => ['style_four'],
                ]
            ]
        );

        $this->add_control(
            'gofly_offer_banner_four_button_label',
            [
                'label'       => esc_html__('Label', 'gofly-core'),
                'type'        => \Elementor\Controls_Manager::TEXT,
                'default'     => esc_html__('Grab The Deal Now', 'gofly-core'),
                'placeholder' => esc_html__('write your label here', 'gofly-core'),
                'label_block' => true,
                'condition'   => [
                    'gofly_offer_banners_style_selection' => 'style_four',
                ]
            ]
        );

        $this->add_control(
            'gofly_offer_banner_four_button_link',
            [
                'label'       => esc_html__('Link', 'gofly-core'),
                'type'        => \Elementor\Controls_Manager::URL,
                'default'     => ['url' => '#'],
                'placeholder' => esc_html__('write your url here', 'gofly-core'),
                'label_block' => true,
                'condition'   => [
                    'gofly_offer_banners_style_selection' => 'style_four',
                ]
            ]
        );


        //content for style five start


        $repeater = new \Elementor\Repeater();

        $repeater->add_control(
            'gofly_offer_banner_style_five_title',
            [
                'label'       => esc_html__('Title', 'gofly-core'),
                'type'        => \Elementor\Controls_Manager::TEXT,
                'default'     => esc_html__('Paragliding 35% off in All Destination.', 'gofly-core'),
                'placeholder' => esc_html__('write your label here', 'gofly-core'),
                'label_block' => true,
            ]
        );

        $repeater->add_control(
            'gofly_offer_banner_style_five_content_list',
            [
                'label'       => esc_html__('Content List', 'gofly-core'),
                'type'        => \Elementor\Controls_Manager::TEXTAREA,
                'default'     => wp_kses('', wp_kses_allowed_html('post')),
                'placeholder' => esc_html__('write your text here', 'gofly-core'),
                'label_block' => true,
            ]
        );

        $repeater->add_control(
            'gofly_offer_banner_style_five_content_list_notice',
            [
                'type'        => \Elementor\Controls_Manager::NOTICE,
                'notice_type' => 'warning',
                'dismissible' => true,
                'heading'     => esc_html__('Note', 'gofly-core'),
                'content'     => esc_html__('Enter each item on a new line. Press Enter after each item to add it as a new list entry.', 'gofly-core'),
            ]
        );

        $repeater->add_control(
            'gofly_offer_banner_style_five_content_button_label',
            [
                'label'       => esc_html__('Button Label', 'gofly-core'),
                'type'        => \Elementor\Controls_Manager::TEXT,
                'default'     => esc_html__('View All Activities', 'gofly-core'),
                'placeholder' => esc_html__('write your label here', 'gofly-core'),
                'label_block' => true,
            ]
        );

        $repeater->add_control(
            'gofly_offer_banner_style_five_content_button_label_url',
            [
                'label'       => esc_html__('Button Link/URL', 'gofly-core'),
                'type'        => \Elementor\Controls_Manager::URL,
                'default'     => ['url' => '#'],
                'placeholder' => esc_html__('write your url here', 'gofly-core'),
                'label_block' => true,
            ]
        );

        $repeater->add_control(
            'gofly_offer_banner_style_five_content_banner_image',
            [
                'label'   => esc_html__('Banner Image', 'gofly-core'),
                'type'    => \Elementor\Controls_Manager::MEDIA,
                'default' => [
                    'url' => \Elementor\Utils::get_placeholder_image_src(),
                ],
            ]
        );

        $repeater->add_control(
            'gofly_offer_banner_style_five_content_banner_shape_image',
            [
                'label'   => esc_html__('Banner Shape Image', 'gofly-core'),
                'type'    => \Elementor\Controls_Manager::MEDIA,
                'default' => [
                    'url' => \Elementor\Utils::get_placeholder_image_src(),
                ],
            ]
        );

        $this->add_control(
            'gofly_offer_banner_style_five_repeater_list',
            [
                'label'   => esc_html__('List', 'gofly-core'),
                'type'    => \Elementor\Controls_Manager::REPEATER,
                'fields'  => $repeater->get_controls(),
                'default' => [
                    [
                        'gofly_offer_banner_style_five_title' => esc_html('Paragliding 35% off in All Destination.'),
                    ],
                    [
                        'gofly_offer_banner_style_five_title' => esc_html('Snowboarding 30% Off – All Winter Spots!'),
                    ],
                    [
                        'gofly_offer_banner_style_five_title' => esc_html('Get 30% Off Scuba Adventures'),
                    ],
                ],
                'title_field' => '{{{ gofly_offer_banner_style_five_title }}}',
                'condition'   => [
                    'gofly_offer_banners_style_selection' => 'style_five',
                ]
            ]
        );



        $this->end_controls_section();

        //============Style One Start=============//

        $this->start_controls_section(
            'gofly_offer_banner_header_styles',
            [
                'label'     => esc_html__('Header Styles', 'gofly-core'),
                'tab'       => Controls_Manager::TAB_STYLE,
                'condition' => [
                    'gofly_offer_banners_style_selection' => ['style_one'],
                ]
            ]
        );

        $this->add_control(
            'gofly_offer_banner_general_title_style',
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
                'name'     => 'gofly_offer_banner_general_title_typ',
                'selector' => '{{WRAPPER}} .section-title h2',

            ]
        );

        $this->add_control(
            'gofly_offer_banner_general_title_color',
            [
                'label'     => esc_html__('Color', 'gofly-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}}  .section-title h2' => 'color: {{VALUE}};',

                ],
            ]
        );

        $this->add_control(
            'gofly_offer_banner_general_desc_style',
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
                'name'     => 'gofly_offer_banner_general_desc_typ',
                'selector' => '{{WRAPPER}} .section-title p',

            ]
        );

        $this->add_control(
            'gofly_offer_banner_general_desc_color',
            [
                'label'     => esc_html__('Color', 'gofly-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}}  .section-title p' => 'color: {{VALUE}};',

                ],
            ]
        );

        $this->end_controls_section();

        // Card Image Style
        $this->start_controls_section(
            'gofly_offer_banner_card_image_styles',
            [
                'label'     => esc_html__('Image Styles', 'gofly-core'),
                'tab'       => Controls_Manager::TAB_STYLE,
                'condition' => [
                    'gofly_offer_banners_style_selection' => ['style_one'],
                ]
            ]
        );

        $this->add_control(
            'gofly_offer_banner_card_image_style',
            [
                'label'     => esc_html__('Image Border Radius', 'gofly-core'),
                'type'      => \Elementor\Controls_Manager::HEADING,
                'separator' => 'after',
            ]
        );

        $this->add_responsive_control(
            'gofly_offer_banner_image_radius',
            [
                'label'      => esc_html__(
                    'Border Radius',
                    'gofly-core'
                ),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%'],
                'selectors'  => [
                    '{{WRAPPER}} .home1-offer-section img' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'
                ]
            ]
        );

        $this->end_controls_section();

        // Card Buttons Style
        $this->start_controls_section(
            'gofly_offer_banner_pagination_styles',
            [
                'label'     => esc_html__('Pagination Styles', 'gofly-core'),
                'tab'       => Controls_Manager::TAB_STYLE,
                'condition' => [
                    'gofly_offer_banners_style_selection' => ['style_one'],
                ]
            ]
        );

        $this->add_control(
            'gofly_offer_banner_pagination_bullets',
            [
                'label'     => esc_html__('Bullets', 'gofly-core'),
                'type'      => \Elementor\Controls_Manager::HEADING,
                'separator' => 'after',
            ]
        );

        $this->add_control(
            'gofly_offer_banner_pagination_color',
            [
                'label'     => esc_html__('Background Color', 'gofly-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}}  .paginations .swiper-pagination-bullet' => 'background-color: {{VALUE}};',

                ],
            ]
        );

        $this->add_control(
            'gofly_offer_banner_card_button_hover_color',
            [
                'label'     => esc_html__('Active Background Color', 'gofly-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}}  .paginations .swiper-pagination-bullet.swiper-pagination-bullet-active' => 'background-color: {{VALUE}};',

                ],
            ]
        );

        $this->end_controls_section();

        //============Style One End=============//

        //============Style Two =============//

        // Card Image Style
        $this->start_controls_section(
            'gofly_offer_banner_two_card_image_styles',
            [
                'label'     => esc_html__('Image Styles', 'gofly-core'),
                'tab'       => Controls_Manager::TAB_STYLE,
                'condition' => [
                    'gofly_offer_banners_style_selection' => ['style_two'],
                ]
            ]
        );

        $this->add_control(
            'gofly_offer_banner_two_card_image_style',
            [
                'label'     => esc_html__('Image Border Radius', 'gofly-core'),
                'type'      => \Elementor\Controls_Manager::HEADING,
                'separator' => 'after',
            ]
        );

        $this->add_responsive_control(
            'gofly_offer_banner_two_image_radius',
            [
                'label'      => esc_html__(
                    'Border Radius',
                    'gofly-core'
                ),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%'],
                'selectors'  => [
                    '{{WRAPPER}} .home3-offer-and-service-section .offer-area a img' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'
                ]
            ]
        );

        $this->end_controls_section();

        // Style 2 Card Contents Style
        $this->start_controls_section(
            'gofly_offer_banner_two_card_contents_styles',
            [
                'label'     => esc_html__('Card Contents', 'gofly-core'),
                'tab'       => Controls_Manager::TAB_STYLE,
                'condition' => [
                    'gofly_offer_banners_style_selection' => ['style_two'],
                ]
            ]
        );

        $this->add_responsive_control(
            'gofly_offer_banner_two_card_radius',
            [
                'label'      => esc_html__(
                    'Border Radius',
                    'gofly-core'
                ),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%'],
                'selectors'  => [
                    '{{WRAPPER}} .service-wrapper' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'
                ]
            ]
        );

        $this->add_control(
            'gofly_offer_banner_two_card_title_style',
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
                'name'     => 'gofly_offer_banner_two_card_title_style_typ',
                'selector' => '{{WRAPPER}} .service-wrapper.three .section-title h2',

            ]
        );

        $this->add_control(
            'gofly_offer_banner_two_card_title_style_color',
            [
                'label'     => esc_html__('Color', 'gofly-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}}  .service-wrapper.three .section-title h2' => 'color: {{VALUE}};',

                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'label'    => esc_html__('Typography', 'gofly-core'),
                'name'     => 'gofly_offer_banner_two_card_title_span_style_typ',
                'selector' => '{{WRAPPER}} .service-wrapper.three .section-title h2 span',

            ]
        );

        $this->add_control(
            'gofly_offer_banner_two_card_title_span_style_color',
            [
                'label'     => esc_html__('Color', 'gofly-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}}  .service-wrapper.three .section-title h2 span' => 'color: {{VALUE}};',

                ],
            ]
        );

        $this->add_control(
            'gofly_offer_banner_two_card_button_style',
            [
                'label'     => esc_html__('Card Button', 'gofly-core'),
                'type'      => \Elementor\Controls_Manager::HEADING,
                'separator' => 'after',
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'label'    => esc_html__('Typography', 'gofly-core'),
                'name'     => 'gofly_offer_banner_two_card_button_typ',
                'selector' => '{{WRAPPER}} .service-wrapper.three .section-title a',

            ]
        );

        $this->add_control(
            'gofly_offer_banner_two_card_button_color',
            [
                'label'     => esc_html__('Color', 'gofly-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}}  .service-wrapper.three .section-title a' => 'color: {{VALUE}};',

                ],
            ]
        );

        $this->add_control(
            'gofly_offer_banner_two_card_button_hover_color',
            [
                'label'     => esc_html__('Hover Color', 'gofly-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}}  .service-wrapper.three .section-title a:hover' => 'color: {{VALUE}};',

                ],
            ]
        );

        $this->add_control(
            'gofly_offer_banner_two_card_list_style',
            [
                'label'     => esc_html__('List Item', 'gofly-core'),
                'type'      => \Elementor\Controls_Manager::HEADING,
                'separator' => 'after',
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'label'    => esc_html__('Typography', 'gofly-core'),
                'name'     => 'gofly_offer_banner_two_card_list_title_style_typ',
                'selector' => '{{WRAPPER}} .service-wrapper .service-list .single-service .content h4',

            ]
        );

        $this->add_control(
            'gofly_offer_banner_two_card_list_title_style_color',
            [
                'label'     => esc_html__('Color', 'gofly-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}}  .service-wrapper .service-list .single-service .content h4' => 'color: {{VALUE}};',

                ],
            ]
        );

        $this->add_control(
            'gofly_offer_banner_two_card_list_desc_style',
            [
                'label'     => esc_html__('List Description', 'gofly-core'),
                'type'      => \Elementor\Controls_Manager::HEADING,
                'separator' => 'after',
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'label'    => esc_html__('Typography', 'gofly-core'),
                'name'     => 'gofly_offer_banner_two_card_list_desc_style_typ',
                'selector' => '{{WRAPPER}} .service-wrapper .service-list .single-service .content p',

            ]
        );

        $this->add_control(
            'gofly_offer_banner_two_card_list_desc_style_color',
            [
                'label'     => esc_html__('Color', 'gofly-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}}  .service-wrapper .service-list .single-service .content p' => 'color: {{VALUE}};',

                ],
            ]
        );

        $this->add_control(
            'gofly_offer_banner_two_card_list_icon_style',
            [
                'label'     => esc_html__('Icons', 'gofly-core'),
                'type'      => \Elementor\Controls_Manager::HEADING,
                'separator' => 'after',
            ]
        );

        $this->add_control(
            'gofly_offer_banner_two_card_list_icon_bg_color',
            [
                'label'     => esc_html__('Background Color', 'gofly-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .service-wrapper .service-list .single-service .icon' => 'background-color: {{VALUE}};',

                ],
            ]
        );

        $this->add_control(
            'gofly_offer_banner_two_card_list_icon_second_bg_color',
            [
                'label'     => esc_html__('Background Color 2', 'gofly-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .service-wrapper .service-list .single-service:nth-child(2) .icon' => 'background-color: {{VALUE}};',

                ],
            ]
        );

        $this->add_control(
            'gofly_offer_banner_two_card_list_icon_color',
            [
                'label'     => esc_html__('Icon color', 'gofly-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .service-wrapper .service-list .single-service .icon svg' => 'fill: {{VALUE}};',

                ],
            ]
        );

        $this->end_controls_section();
        //============Style Two =============//

        //============Style Three =============//

        // Banner Image Style
        $this->start_controls_section(
            'gofly_offer_banner_three_card_image_styles',
            [
                'label'     => esc_html__('Image Styles', 'gofly-core'),
                'tab'       => Controls_Manager::TAB_STYLE,
                'condition' => [
                    'gofly_offer_banners_style_selection' => ['style_three'],
                ]
            ]
        );

        $this->add_control(
            'gofly_offer_banner_three_card_image_style',
            [
                'label'     => esc_html__('Image Border Radius', 'gofly-core'),
                'type'      => \Elementor\Controls_Manager::HEADING,
                'separator' => 'after',
            ]
        );

        $this->add_responsive_control(
            'gofly_offer_banner_three_image_radius',
            [
                'label'      => esc_html__(
                    'Border Radius',
                    'gofly-core'
                ),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%'],
                'selectors'  => [
                    '{{WRAPPER}} .home4-offer-slider-section a img' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'
                ]
            ]
        );

        $this->add_control(
            'gofly_offer_banner_three_pagination',
            [
                'label'     => esc_html__('Pagination', 'gofly-core'),
                'type'      => \Elementor\Controls_Manager::HEADING,
                'separator' => 'after',
            ]
        );

        $this->add_control(
            'gofly_offer_banner_three_pagination_color',
            [
                'label'     => esc_html__('Background Color', 'gofly-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}}  .paginations .swiper-pagination-bullet' => 'background-color: {{VALUE}};',

                ],
            ]
        );

        $this->add_control(
            'gofly_offer_banner_three_card_button_hover_color',
            [
                'label'     => esc_html__('Active Background Color', 'gofly-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}}  .paginations.two .swiper-pagination-bullet.swiper-pagination-bullet-active' => 'background-color: {{VALUE}};',

                ],
            ]
        );

        $this->end_controls_section();

        //============Style Three end =============//

        //============Style Four =============//

        // Banner Image Style
        $this->start_controls_section(
            'gofly_offer_banner_four_card_image_styles',
            [
                'label'     => esc_html__('Image Styles', 'gofly-core'),
                'tab'       => Controls_Manager::TAB_STYLE,
                'condition' => [
                    'gofly_offer_banners_style_selection' => ['style_four'],
                ]
            ]
        );

        $this->add_control(
            'gofly_offer_banner_four_subtitle_style',
            [
                'label'     => esc_html__('Sub-title', 'gofly-core'),
                'type'      => \Elementor\Controls_Manager::HEADING,
                'separator' => 'after',
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'label'    => esc_html__('Typography', 'gofly-core'),
                'name'     => 'gofly_offer_banner_four_subtitle_style_typ',
                'selector' => '{{WRAPPER}} .home2-offer-banner-section .offer-banner-wrap .offer-banner-content > span',

            ]
        );

        $this->add_control(
            'gofly_offer_banner_four_subtitle_style_color',
            [
                'label'     => esc_html__('Color', 'gofly-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}}  .home2-offer-banner-section .offer-banner-wrap .offer-banner-content > span' => 'color: {{VALUE}};',

                ],
            ]
        );

        $this->add_control(
            'gofly_offer_banner_four_subtitle_bg_style_color',
            [
                'label'     => esc_html__('Background Color', 'gofly-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}}  .home2-offer-banner-section .offer-banner-wrap .offer-banner-content > span' => 'background-color: {{VALUE}};',

                ],
            ]
        );

        $this->add_control(
            'gofly_offer_banner_four_subtitle_border_style_color',
            [
                'label'     => esc_html__('Border Color', 'gofly-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}}  .home2-offer-banner-section .offer-banner-wrap .offer-banner-content > span' => 'border-color: {{VALUE}};',

                ],
            ]
        );

        $this->add_control(
            'gofly_offer_banner_four_title_style',
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
                'name'     => 'gofly_offer_banner_four_title_style_typ',
                'selector' => '{{WRAPPER}} .home2-offer-banner-section .offer-banner-wrap .offer-banner-content h2',

            ]
        );

        $this->add_control(
            'gofly_offer_banner_four_title_style_color',
            [
                'label'     => esc_html__('Color', 'gofly-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}}  .home2-offer-banner-section .offer-banner-wrap .offer-banner-content h2' => 'color: {{VALUE}};',

                ],
            ]
        );

        $this->add_control(
            'gofly_offer_banner_four_card_image_style',
            [
                'label'     => esc_html__('Image Border Radius', 'gofly-core'),
                'type'      => \Elementor\Controls_Manager::HEADING,
                'separator' => 'after',
            ]
        );

        $this->add_responsive_control(
            'gofly_offer_banner_four_image_radius',
            [
                'label'      => esc_html__(
                    'Border Radius',
                    'gofly-core'
                ),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%'],
                'selectors'  => [
                    '{{WRAPPER}} .home4-offer-slider-section a img' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'
                ]
            ]
        );

        $this->add_control(
            'gofly_offer_banner_four_pagination',
            [
                'label'     => esc_html__('Pagination', 'gofly-core'),
                'type'      => \Elementor\Controls_Manager::HEADING,
                'separator' => 'after',
            ]
        );

        $this->add_control(
            'gofly_offer_banner_four_pagination_color',
            [
                'label'     => esc_html__('Background Color', 'gofly-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}}  .paginations .swiper-pagination-bullet' => 'background-color: {{VALUE}};',

                ],
            ]
        );

        $this->add_control(
            'gofly_offer_banner_four_card_button_hover_color',
            [
                'label'     => esc_html__('Active Background Color', 'gofly-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}}  .paginations.two .swiper-pagination-bullet.swiper-pagination-bullet-active' => 'background-color: {{VALUE}};',

                ],
            ]
        );

        $this->add_control(
            'gofly_offer_banner_four_button_general_style',
            [
                'label'     => esc_html__('General Style', 'gofly-core'),
                'type'      => \Elementor\Controls_Manager::HEADING,
                'separator' => 'after',
            ]
        );

        // Tabs
        $this->start_controls_tabs(
            'gofly_offer_banner_four_button_tabs'
        );

        $this->start_controls_tab(
            'gofly_offer_banner_four_button_normal_style_tab',
            [
                'label' => esc_html__(
                    'Normal',
                    'gofly-core'
                ),
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'label'    => esc_html__('Typography', 'gofly-core'),
                'name'     => 'gofly_offer_banner_four_button_normal_label_typ',
                'selector' => '{{WRAPPER}} .primary-btn1',

            ]
        );

        $this->add_control(
            'gofly_offer_banner_four_button_normal_label_color',
            [
                'label'     => esc_html__('Color', 'gofly-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}}  .primary-btn1' => 'color: {{VALUE}};',

                ],
            ]
        );

        $this->add_control(
            'gofly_offer_banner_four_button_normal_icon_color',
            [
                'label'     => esc_html__('Icon Color', 'gofly-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}}  .primary-btn1 svg' => 'fill: {{VALUE}};',

                ],
            ]
        );

        $this->add_control(
            'gofly_offer_banner_four_button_normal_background_color',
            [
                'label'     => esc_html__('Background Color', 'gofly-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}}  .primary-btn1' => 'background: {{VALUE}};',

                ],
            ]
        );

        $this->add_responsive_control(
            'gofly_offer_banner_four_button_normal_margin',
            [
                'label' => esc_html__(
                    'Margin',
                    'gofly-core'
                ),
                'type'       => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors'  => [
                    '{{WRAPPER}} .primary-btn1' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'gofly_offer_banner_four_button_normal_padding',
            [
                'label'      => esc_html__(
                    'Padding',
                    'gofly-core'
                ),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%'],
                'selectors'  => [
                    '{{WRAPPER}} .primary-btn1' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'
                ]
            ]
        );

        $this->add_group_control(
            \Elementor\Group_Control_Border::get_type(),
            [
                'name'     => 'border',
                'selector' => '{{WRAPPER}} .primary-btn1',
            ]
        );

        $this->add_responsive_control(
            'gofly_offer_banner_four_button_normal_border_radius',
            [
                'label'      => esc_html__(
                    'Border Radius',
                    'gofly-core'
                ),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%'],
                'selectors'  => [
                    '{{WRAPPER}} .primary-btn1' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'
                ]
            ]
        );

        $this->end_controls_tab();

        // Hover start
        $this->start_controls_tab(
            'gofly_offer_banner_four_button_hover_tab',
            [
                'label' => esc_html__('Hover', 'gofly-core'),
            ]
        );

        $this->add_control(
            'gofly_offer_banner_four_button_hover_tab_color',
            [
                'label'     => esc_html__('Color', 'gofly-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}}  .primary-btn1:hover' => 'color: {{VALUE}};',

                ],
            ]
        );

        $this->add_control(
            'gofly_offer_banner_four_button_hover_tab_icon_color',
            [
                'label'     => esc_html__('Icon Color', 'gofly-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}}  .primary-btn1:hover svg' => 'fill: {{VALUE}};',

                ],
            ]
        );

        $this->add_control(
            'gofly_offer_banner_four_button_hover_tab_background_color',
            [
                'label'     => esc_html__('Background Color', 'gofly-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .primary-btn1::after' => 'background-color: {{VALUE}};',
                ],
            ]
        );

        $this->end_controls_tab();
        $this->end_controls_tabs();

        $this->end_controls_section();

        //============Style Four end =============//

        //============Style Five Start =============//

        $this->start_controls_section(
            'gofly_offer_banner_style_five_general',
            [
                'label'     => esc_html__('Styles', 'gofly-core'),
                'tab'       => Controls_Manager::TAB_STYLE,
                'condition' => [
                    'gofly_offer_banners_style_selection' => ['style_five'],
                ]
            ]
        );

        $this->add_control(
            'gofly_offer_banner_style_five_general_section',
            [
                'label'     => esc_html__('Global Section', 'gofly-core'),
                'type'      => \Elementor\Controls_Manager::HEADING,
                'separator' => 'after',
            ]
        );

        $this->add_control(
            'gofly_offer_banner_style_five_general_section_bg_color',
            [
                'label'     => esc_html__('Background Color', 'gofly-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .home7-offer-banner-section .banner-wrapper' => 'background-color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'gofly_offer_banner_style_five_general_title',
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
                'name'     => 'gofly_offer_banner_style_five_general_title_typ',
                'selector' => '{{WRAPPER}} .home7-offer-banner-section .banner-wrapper .banner-content h2',

            ]
        );

        $this->add_control(
            'gofly_offer_banner_style_five_general_title_color',
            [
                'label'     => esc_html__('Color', 'gofly-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .home7-offer-banner-section .banner-wrapper .banner-content h2' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'gofly_offer_banner_style_five_general_list_item',
            [
                'label'     => esc_html__('List Items', 'gofly-core'),
                'type'      => \Elementor\Controls_Manager::HEADING,
                'separator' => 'after',
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'label'    => esc_html__('Typography', 'gofly-core'),
                'name'     => 'gofly_offer_banner_style_five_general_list_item_typ',
                'selector' => '{{WRAPPER}} .home7-offer-banner-section .banner-wrapper .banner-content ul li',

            ]
        );

        $this->add_control(
            'gofly_offer_banner_style_five_general_list_item_color',
            [
                'label'     => esc_html__('Color', 'gofly-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .home7-offer-banner-section .banner-wrapper .banner-content ul li' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'gofly_offer_banner_style_five_general_list_item_icon_color',
            [
                'label'     => esc_html__('Icon Color', 'gofly-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .home7-offer-banner-section .banner-wrapper .banner-content ul li svg' => 'fill: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'gofly_offer_banner_style_five_general_button',
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
                'name'     => 'gofly_offer_banner_style_five_general_button_typ',
                'selector' => '{{WRAPPER}} .primary-btn1.four',

            ]
        );

        $this->add_control(
            'gofly_offer_banner_style_five_general_button_color',
            [
                'label'     => esc_html__('Color', 'gofly-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .primary-btn1.four' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'gofly_offer_banner_style_five_general_button_hover_color',
            [
                'label'     => esc_html__('Hover Color', 'gofly-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .primary-btn1.four:hover' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'gofly_offer_banner_style_five_general_button_icon_color',
            [
                'label'     => esc_html__('Icon Color', 'gofly-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .home7-offer-banner-section .banner-wrapper .banner-content .primary-btn1 svg' => 'fill: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'gofly_offer_banner_style_five_general_button_hover_icon_color',
            [
                'label'     => esc_html__('Hover Icon Color', 'gofly-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .home7-offer-banner-section .banner-wrapper .banner-content .primary-btn1:hover svg' => 'fill: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'gofly_offer_banner_style_five_general_button_bg_color',
            [
                'label'     => esc_html__('Background Color', 'gofly-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .home7-offer-banner-section .banner-wrapper .banner-content .primary-btn1' => 'background-color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'gofly_offer_banner_style_five_general_button_hover_bg_color',
            [
                'label'     => esc_html__('Hover Background Color', 'gofly-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .home7-offer-banner-section .banner-wrapper .banner-content .primary-btn1::after' => 'background-color: {{VALUE}};',
                ],
            ]
        );

        $this->end_controls_section();
    }
    protected function render()
    {

        $settings = $this->get_settings_for_display();

        if (is_admin()): ?>
            <script>
                var swiper = new Swiper(".home1-offer-slider", {
                    slidesPerView: 1,
                    speed: 1500,
                    spaceBetween: 24,
                    autoplay: {
                        delay: 2500, // Autoplay duration in milliseconds
                        disableOnInteraction: false,
                    },
                    pagination: {
                        el: ".swiper-pagination1",
                        clickable: true,
                    },
                    breakpoints: {
                        280: {
                            slidesPerView: 1,
                        },
                        386: {
                            slidesPerView: 1,
                        },
                        576: {
                            slidesPerView: 1,
                        },
                        768: {
                            slidesPerView: 2,
                        },
                        992: {
                            slidesPerView: 3,
                        },
                        1200: {
                            slidesPerView: 3,
                        },
                        1400: {
                            slidesPerView: 3,
                        },
                    },
                });

                var swiper = new Swiper(".home4-offer-slider", {
                    slidesPerView: 1,
                    speed: 1500,
                    spaceBetween: 24,
                    autoplay: {
                        delay: 2500, // Autoplay duration in milliseconds
                        disableOnInteraction: false,
                    },
                    pagination: {
                        el: ".swiper-pagination2",
                        clickable: true,
                    },
                });

                var swiper = new Swiper(".home7-offer-banner-slider", {
                    slidesPerView: 1,
                    speed: 1500,
                    spaceBetween: 24,
                    autoplay: {
                        delay: 3000,
                        pauseOnMouseEnter: true,
                        disableOnInteraction: false,
                    },
                    effect: "fade",
                    fadeEffect: {
                        crossFade: true,
                    },
                    navigation: {
                        nextEl: ".banner-slider-next",
                        prevEl: ".banner-slider-prev",
                    },
                    pagination: {
                        el: ".banner-pagination",
                        clickable: true,
                    },
                });
            </script>
        <?php endif; ?>

        <?php if ($settings['gofly_offer_banners_style_selection'] == 'style_one'): ?>
            <div class="home1-offer-section">
                <div class="container">
                    <?php if ($settings['gofly_offer_banner_header_switcher'] == 'yes'): ?>
                        <div class="row justify-content-center mb-50 wow animate fadeInDown" data-wow-delay="200ms" data-wow-duration="1500ms">
                            <div class="col-lg-6">
                                <div class="section-title text-center">
                                    <?php if (!empty($settings['gofly_offer_banner_general_title'])): ?>
                                        <h2><?php echo esc_html($settings['gofly_offer_banner_general_title']); ?></h2>
                                    <?php endif; ?>
                                    <?php if (!empty($settings['gofly_offer_banner_general_desc'])): ?>
                                        <p><?php echo esc_html($settings['gofly_offer_banner_general_desc']); ?></p>
                                    <?php endif; ?>
                                </div>
                            </div>
                        </div>
                    <?php endif; ?>
                    <div class="swiper home1-offer-slider mb-40">
                        <div class="swiper-wrapper">
                            <?php foreach ($settings['gofly_offer_slide_images'] as $image): ?>
                                <div class="swiper-slide">
                                    <a href="<?php echo esc_url($image['gofly_offer_banner_images_link']['url']); ?>"><img src="<?php echo esc_url($image['gofly_offer_banner_images']['url']); ?>" alt="<?php echo esc_attr__('image', 'gofly-core'); ?>"></a>
                                </div>
                            <?php endforeach; ?>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-12 d-flex justify-content-center">
                            <div class="swiper-pagination1 paginations"></div>
                        </div>
                    </div>
                </div>
            </div>
        <?php endif; ?>

        <!-- Style Two -->
        <?php if ($settings['gofly_offer_banners_style_selection'] == 'style_two'): ?>
            <div class="home3-offer-and-service-section">
                <div class="container">
                    <?php if ($settings['gofly_offer_banner_switcher'] == 'yes'): ?>
                        <div class="offer-area">
                            <div class="row g-4">
                                <?php foreach ($settings['gofly_offer_slide_images'] as $image): ?>
                                    <div class="col-lg-6 wow animate fadeInLeft" data-wow-delay="200ms" data-wow-duration="1500ms">
                                        <a href="<?php echo esc_url($image['gofly_offer_banner_images_link']['url']) ?>"><img src="<?php echo esc_url($image['gofly_offer_banner_images']['url']); ?>" alt="<?php echo esc_attr__('image', 'gofly-core'); ?>"></a>
                                    </div>
                                <?php endforeach; ?>
                            </div>
                        </div>
                    <?php endif; ?>
                    <div class="service-wrapper three wow animate fadeInUp" data-wow-delay="200ms" data-wow-duration="1500ms" <?php echo !empty($settings['gofly_offer_banner_bg_images']) ? 'style="background-image: url(' . $settings['gofly_offer_banner_bg_images']['url'] . '), linear-gradient(180deg, #FFF2E2 0%, #FFF2E2 100%)"' : ''; ?>>
                        <div class="section-title">
                            <?php if (! empty($settings['gofly_offer_banner_two_card_title'])): ?>
                                <h2><?php echo wp_kses($settings['gofly_offer_banner_two_card_title'], wp_kses_allowed_html('post')); ?></h2>
                            <?php endif; ?>
                            <?php if (! empty($settings['gofly_offer_banner_two_card_button'])): ?>
                                <a href="<?php echo esc_url($settings['gofly_offer_banner_two_card_button_link']['url']); ?>">
                                    <?php echo esc_html($settings['gofly_offer_banner_two_card_button'], 'gofly-core'); ?>
                                    <svg width="10" height="10" viewBox="0 0 10 10" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M1 9L9 1M9 1C7.22222 1.33333 3.33333 2 1 1M9 1C8.66667 2.66667 8 6.33333 9 9" stroke-width="1.5" stroke-linecap="round" />
                                    </svg>
                                </a>
                            <?php endif; ?>
                        </div>
                        <ul class="service-list wow animate fadeInUp" data-wow-delay="200ms" data-wow-duration="1500ms">
                            <?php foreach ($settings['gofly_offer_banner_card_items'] as $item): ?>
                                <li class="single-service">
                                    <div class="icon">
                                        <?php \Elementor\Icons_Manager::render_icon($item['gofly_offer_banner_card_list_icon'], ['aria-hidden' => 'true']); ?>
                                    </div>
                                    <div class="content">
                                        <?php if (!empty($item['gofly_offer_banner_card_list_title'])): ?>
                                            <h4><?php echo esc_html($item['gofly_offer_banner_card_list_title']); ?></h4>
                                        <?php endif; ?>
                                        <?php if (!empty($item['gofly_offer_banner_card_list_desc'])): ?>
                                            <p><?php echo esc_html($item['gofly_offer_banner_card_list_desc']); ?></p>
                                        <?php endif; ?>
                                    </div>
                                </li>
                            <?php endforeach; ?>
                        </ul>
                    </div>
                </div>
            </div>
        <?php endif; ?>

        <!-- Style Three -->
        <?php if ($settings['gofly_offer_banners_style_selection'] == 'style_three'): ?>
            <div class="home4-offer-slider-section">
                <div class="container">
                    <div class="row mb-40">
                        <div class="col-lg-12">
                            <div class="swiper home4-offer-slider">
                                <div class="swiper-wrapper">
                                    <?php foreach ($settings['gofly_offer_slide_images'] as $image): ?>
                                        <div class="swiper-slide">
                                            <a href="<?php echo esc_url($image['gofly_offer_banner_images_link']['url']); ?>"><img src="<?php echo esc_url($image['gofly_offer_banner_images']['url']); ?>" alt="<?php echo esc_attr__('image', 'gofly-core'); ?>"></a>
                                        </div>
                                    <?php endforeach; ?>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-12 d-flex justify-content-center">
                            <div class="swiper-pagination2 paginations two"></div>
                        </div>
                    </div>
                </div>
            </div>
        <?php endif; ?>

        <!-- Style Four -->
        <?php if ($settings['gofly_offer_banners_style_selection'] == 'style_four'): ?>
            <div class="home2-offer-banner-section">
                <div class="container">
                    <div class="offer-banner-wrap">
                        <div class="offer-banner-content wow animate fadeInLeft" data-wow-delay="200ms" data-wow-duration="1500ms">
                            <?php if (!empty($settings['gofly_offer_banner_general_subtitle'])): ?>
                                <span><?php echo esc_html($settings['gofly_offer_banner_general_subtitle']); ?></span>
                            <?php endif; ?>
                            <?php if (!empty($settings['gofly_offer_banner_general_title'])): ?>
                                <h2><?php echo esc_html($settings['gofly_offer_banner_general_title']); ?></h2>
                            <?php endif; ?>
                            <?php if (!empty($settings['gofly_offer_banner_four_button_label'])): ?>
                                <a href="<?php echo esc_url($settings['gofly_offer_banner_four_button_link']['url']); ?>" class="primary-btn1 two black-bg">
                                    <span>
                                        <?php echo esc_html($settings['gofly_offer_banner_four_button_label']); ?>
                                        <svg width="10" height="10" viewBox="0 0 10 10" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M9.73535 1.14746C9.57033 1.97255 9.32924 3.26406 9.24902 4.66797C9.16817 6.08312 9.25559 7.5453 9.70214 8.73633C9.84754 9.12406 9.65129 9.55659 9.26367 9.70215C8.9001 9.83849 8.4969 9.67455 8.32812 9.33398L8.29785 9.26367L8.19921 8.98438C7.73487 7.5758 7.67054 5.98959 7.75097 4.58203C7.77875 4.09598 7.82525 3.62422 7.87988 3.17969L1.53027 9.53027C1.23738 9.82317 0.762615 9.82317 0.469722 9.53027C0.176829 9.23738 0.176829 8.76262 0.469722 8.46973L6.83593 2.10254C6.3319 2.16472 5.79596 2.21841 5.25 2.24902C3.8302 2.32862 2.2474 2.26906 0.958003 1.79102L0.704097 1.68945L0.635738 1.65527C0.303274 1.47099 0.157578 1.06102 0.310542 0.704102C0.463655 0.347333 0.860941 0.170391 1.22363 0.28418L1.29589 0.310547L1.48828 0.387695C2.47399 0.751207 3.79966 0.827571 5.16601 0.750977C6.60111 0.670504 7.97842 0.428235 8.86132 0.262695L9.95312 0.0585938L9.73535 1.14746Z"></path>
                                        </svg>
                                    </span>
                                    <span>
                                        <?php echo esc_html($settings['gofly_offer_banner_four_button_label']); ?>
                                        <svg width="10" height="10" viewBox="0 0 10 10" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M9.73535 1.14746C9.57033 1.97255 9.32924 3.26406 9.24902 4.66797C9.16817 6.08312 9.25559 7.5453 9.70214 8.73633C9.84754 9.12406 9.65129 9.55659 9.26367 9.70215C8.9001 9.83849 8.4969 9.67455 8.32812 9.33398L8.29785 9.26367L8.19921 8.98438C7.73487 7.5758 7.67054 5.98959 7.75097 4.58203C7.77875 4.09598 7.82525 3.62422 7.87988 3.17969L1.53027 9.53027C1.23738 9.82317 0.762615 9.82317 0.469722 9.53027C0.176829 9.23738 0.176829 8.76262 0.469722 8.46973L6.83593 2.10254C6.3319 2.16472 5.79596 2.21841 5.25 2.24902C3.8302 2.32862 2.2474 2.26906 0.958003 1.79102L0.704097 1.68945L0.635738 1.65527C0.303274 1.47099 0.157578 1.06102 0.310542 0.704102C0.463655 0.347333 0.860941 0.170391 1.22363 0.28418L1.29589 0.310547L1.48828 0.387695C2.47399 0.751207 3.79966 0.827571 5.16601 0.750977C6.60111 0.670504 7.97842 0.428235 8.86132 0.262695L9.95312 0.0585938L9.73535 1.14746Z"></path>
                                        </svg>
                                    </span>
                                </a>
                            <?php endif; ?>
                        </div>
                        <?Php if (! empty($settings['gofly_offer_banner_bg_images'])): ?>
                            <div class="offer-banner-img">
                                <img src="<?php echo esc_url($settings['gofly_offer_banner_bg_images']['url']); ?>" alt="<?php echo esc_attr__('banner-background-image', 'gofly-core'); ?>">
                            </div>
                        <?php endif; ?>
                        <?Php if (! empty($settings['gofly_offer_banner_bg_vector_image1'])): ?>
                            <img src="<?php echo esc_url($settings['gofly_offer_banner_bg_vector_image1']['url']); ?>" alt="<?php echo esc_attr("image") ?>" class="vector1">
                        <?php endif; ?>
                        <?Php if (! empty($settings['gofly_offer_banner_bg_vector_image2'])): ?>
                            <img src="<?php echo esc_url($settings['gofly_offer_banner_bg_vector_image2']['url']); ?>" alt="<?php echo esc_attr("image") ?>" class="vector2">
                        <?php endif; ?>
                    </div>
                </div>
                <?Php if (! empty($settings['gofly_offer_banner_bg_vector_baloon_image'])): ?>
                    <img src="<?php echo esc_url($settings['gofly_offer_banner_bg_vector_baloon_image']['url']); ?>" alt="<?php echo esc_attr__('image', 'gofly-core'); ?>" class="vector">
                <?php endif; ?>
            </div>
        <?php endif; ?>


        <?php if ($settings['gofly_offer_banners_style_selection'] == 'style_five'): ?>
            <div class="home7-offer-banner-section">
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-xl-10">
                            <div class="banner-wrapper">
                                <div class="swiper home7-offer-banner-slider">
                                    <div class="swiper-wrapper">
                                        <?php foreach ($settings['gofly_offer_banner_style_five_repeater_list'] as $data): ?>
                                            <div class="swiper-slide">
                                                <div class="banner-slider-wrap">
                                                    <div class="banner-content">
                                                        <?php if (!empty($data['gofly_offer_banner_style_five_title'])): ?>
                                                            <h2><?php echo esc_html($data['gofly_offer_banner_style_five_title']); ?></h2>
                                                        <?php endif; ?>
                                                        <?php if (!empty($data['gofly_offer_banner_style_five_content_list'])): ?>
                                                            <ul>
                                                                <?php
                                                                $raw_content = $data['gofly_offer_banner_style_five_content_list'] ?? '';

                                                                $lines = explode("\n", $raw_content);

                                                                foreach ($lines as $line) {
                                                                    echo '<li>   <svg width="18" height="18" viewBox="0 0 18 18" xmlns="http://www.w3.org/2000/svg">
                                                        <circle cx = "9" cy = "9" r = "9"></circle>
                                                        <path   d  = "M13.6193 7.07207L8.05899 12.6354C7.97039 12.721 7.85809 12.7654 7.74589 12.7654C7.68769 12.7655 7.63004 12.754 7.57629 12.7317C7.52253 12.7094 7.47373 12.6767 7.43269 12.6354L4.38069 9.58337C4.20639 9.41197 4.20639 9.13137 4.38069 8.95707L5.45909 7.87567C5.62459 7.71027 5.91999 7.71027 6.08549 7.87567L7.74589 9.53607L11.9146 5.36438C11.9557 5.32322 12.0044 5.29055 12.0581 5.26825C12.1118 5.24594 12.1694 5.23443 12.2275 5.23438C12.3456 5.23438 12.4579 5.28168 12.5406 5.36438L13.619 6.44587C13.7936 6.62017 13.7936 6.90077 13.6193 7.07207Z"></path>
                                                    </svg>' . $line . '</li>';
                                                                }
                                                                ?>
                                                            </ul>
                                                        <?php endif; ?>
                                                        <?php if (!empty($data['gofly_offer_banner_style_five_content_button_label'])): ?>
                                                            <a href="<?php echo esc_url($data['gofly_offer_banner_style_five_content_button_label_url']['url']); ?>" class="primary-btn1 two four">
                                                                <span>
                                                                    <?php echo esc_html($data['gofly_offer_banner_style_five_content_button_label']); ?>
                                                                    <svg width="10" height="10" viewBox="0 0 10 10" xmlns="http://www.w3.org/2000/svg">
                                                                        <path d="M9.73535 1.14746C9.57033 1.97255 9.32924 3.26406 9.24902 4.66797C9.16817 6.08312 9.25559 7.5453 9.70214 8.73633C9.84754 9.12406 9.65129 9.55659 9.26367 9.70215C8.9001 9.83849 8.4969 9.67455 8.32812 9.33398L8.29785 9.26367L8.19921 8.98438C7.73487 7.5758 7.67054 5.98959 7.75097 4.58203C7.77875 4.09598 7.82525 3.62422 7.87988 3.17969L1.53027 9.53027C1.23738 9.82317 0.762615 9.82317 0.469722 9.53027C0.176829 9.23738 0.176829 8.76262 0.469722 8.46973L6.83593 2.10254C6.3319 2.16472 5.79596 2.21841 5.25 2.24902C3.8302 2.32862 2.2474 2.26906 0.958003 1.79102L0.704097 1.68945L0.635738 1.65527C0.303274 1.47099 0.157578 1.06102 0.310542 0.704102C0.463655 0.347333 0.860941 0.170391 1.22363 0.28418L1.29589 0.310547L1.48828 0.387695C2.47399 0.751207 3.79966 0.827571 5.16601 0.750977C6.60111 0.670504 7.97842 0.428235 8.86132 0.262695L9.95312 0.0585938L9.73535 1.14746Z"></path>
                                                                    </svg>
                                                                </span>
                                                                <span>
                                                                    <?php echo esc_html($data['gofly_offer_banner_style_five_content_button_label']); ?>
                                                                    <svg width="10" height="10" viewBox="0 0 10 10" xmlns="http://www.w3.org/2000/svg">
                                                                        <path d="M9.73535 1.14746C9.57033 1.97255 9.32924 3.26406 9.24902 4.66797C9.16817 6.08312 9.25559 7.5453 9.70214 8.73633C9.84754 9.12406 9.65129 9.55659 9.26367 9.70215C8.9001 9.83849 8.4969 9.67455 8.32812 9.33398L8.29785 9.26367L8.19921 8.98438C7.73487 7.5758 7.67054 5.98959 7.75097 4.58203C7.77875 4.09598 7.82525 3.62422 7.87988 3.17969L1.53027 9.53027C1.23738 9.82317 0.762615 9.82317 0.469722 9.53027C0.176829 9.23738 0.176829 8.76262 0.469722 8.46973L6.83593 2.10254C6.3319 2.16472 5.79596 2.21841 5.25 2.24902C3.8302 2.32862 2.2474 2.26906 0.958003 1.79102L0.704097 1.68945L0.635738 1.65527C0.303274 1.47099 0.157578 1.06102 0.310542 0.704102C0.463655 0.347333 0.860941 0.170391 1.22363 0.28418L1.29589 0.310547L1.48828 0.387695C2.47399 0.751207 3.79966 0.827571 5.16601 0.750977C6.60111 0.670504 7.97842 0.428235 8.86132 0.262695L9.95312 0.0585938L9.73535 1.14746Z"></path>
                                                                    </svg>
                                                                </span>
                                                            </a>
                                                        <?php endif; ?>
                                                    </div>
                                                    <?php if (!empty($data['gofly_offer_banner_style_five_content_banner_image']['url'])): ?>
                                                        <div class="banner-img-wrapper">
                                                            <div class="single-img">
                                                                <img src="<?php echo esc_url($data['gofly_offer_banner_style_five_content_banner_image']['url']); ?>" alt="<?php echo esc_attr__('banner-image', 'gofly-core'); ?>">
                                                            </div>
                                                            <?php if (!empty($data['gofly_offer_banner_style_five_content_banner_shape_image']['url'])): ?>
                                                                <img src="<?php echo esc_url($data['gofly_offer_banner_style_five_content_banner_shape_image']['url']); ?>" alt="<?php echo esc_attr__('banner-image', 'gofly-core'); ?>" class="banner-img-shape">
                                                            <?php endif; ?>
                                                        </div>
                                                    <?php endif; ?>
                                                </div>
                                            </div>
                                        <?php endforeach; ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        <?php endif; ?>

<?php

    }
}

Plugin::instance()->widgets_manager->register(new Gofly_Offer_Banner_Widget());
