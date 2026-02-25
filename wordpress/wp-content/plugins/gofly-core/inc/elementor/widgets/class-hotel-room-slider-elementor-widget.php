<?php

namespace Elementor;

if (!defined('ABSPATH')) exit;  // Exit if accessed directly

use Elementor\core\Schemes;
use Elementor\Group_Control_Typography;
use Egns_Core\Egns_Helper;

class Gofly_Hotel_Room_Slider_Widget extends Widget_Base
{

    public function get_name()
    {
        return 'gofly_hotel_room_slider';
    }

    public function get_title()
    {
        return esc_html__('EG Hotel Room Slider', 'gofly-core');
    }

    public function get_icon()
    {
        return 'egns-widget-icon';
    }

    public function get_categories()
    {
        return ['gofly_hotel'];
    }

    protected function register_controls()
    {

        //=====================General=======================//

        $this->start_controls_section(
            'gofly_hotel_room_slider_genaral',
            [
                'label' => esc_html__('General', 'gofly-core')
            ]
        );
        $this->add_control(
            'gofly_hotel_room_slider_general_title',
            [
                'label'       => esc_html__('Title', 'gofly-core'),
                'type'        => \Elementor\Controls_Manager::TEXT,
                'default'     => esc_html__('Hotel Rooms', 'gofly-core'),
                'placeholder' => esc_html__('write your title here', 'gofly-core'),
                'label_block' => true,
            ]
        );
        $this->add_control(
            'gofly_hotel_room_slider_general_desc',
            [
                'label'       => esc_html__('Descriptin', 'gofly-core'),
                'type'        => \Elementor\Controls_Manager::TEXTAREA,
                'default'     => esc_html__('A curated list of the most popular travel packages based on different destinations.', 'gofly-core'),
                'placeholder' => esc_html__('write your description here', 'gofly-core'),
                'label_block' => true,
            ]
        );
        // Post Query 
        $this->add_control(
            'gofly_hotel_grid_query_area',
            [
                'label'     => esc_html__('Post Query', 'gofly-core'),
                'type'      => \Elementor\Controls_Manager::HEADING,
                'separator' => 'after',
            ]
        );
        $this->add_control(
            'gofly_hotel_grid_order',
            [
                'label'   => esc_html__('Order', 'gofly-core'),
                'type'    => Controls_Manager::SELECT,
                'options' => [
                    'asc'  => esc_html__('Ascending', 'gofly-core'),
                    'desc' => esc_html__('Descending', 'gofly-core')
                ],
                'default' => 'desc',
            ]
        );
        $this->add_control(
            'gofly_hotel_grid_orderby',
            [
                'label'   => esc_html__('Order By', 'gofly-core'),
                'type'    => Controls_Manager::SELECT,
                'default' => 'ID',
                'options' => [
                    'ID'         => esc_html__('Post Id', 'gofly-core'),
                    'author'     => esc_html__('Post Author', 'gofly-core'),
                    'title'      => esc_html__('Title', 'gofly-core'),
                    'post_date'  => esc_html__('Date', 'gofly-core'),
                    'rand'       => esc_html__('Random', 'gofly-core'),
                    'menu_order' => esc_html__('Menu Order', 'gofly-core'),
                ],
            ]
        );
        $this->add_control(
            'gofly_hotel_grid_post_per_page',
            [
                'label'   => esc_html__('Posts Per Page', 'gofly-core'),
                'type'    => Controls_Manager::NUMBER,
                'default' => 6,
            ]
        );
        $this->add_control(
            'gofly_hotel_grid_selected_cat',
            [
                'label'       => esc_html__('Hotel Category', 'gofly-core'),
                'type'        => \Elementor\Controls_Manager::SELECT2,
                'label_block' => true,
                'multiple'    => true,
                'options'     => \Egns_Core\Egns_Helper::get_post_terms_options('hotel-category'),
                'description' => esc_html__('Show hotel post only selected category', 'gofly-core'),
            ]
        );
        $this->add_control(
            'gofly_hotel_grid_post_list',
            [
                'label'       => esc_html__('Hotel Room lists', 'gofly-core'),
                'type'        => \Elementor\Controls_Manager::SELECT2,
                'label_block' => true,
                'multiple'    => true,
                'options'     => \Egns_Core\Egns_Helper::get_post_list_options('hotel'),
                'description' => esc_html__('Selected posts appear only when linked to an hotel category. By default, all selected posts are visible.', 'gofly-core'),
            ]
        );


        $this->end_controls_section();

        //============Style One Start=============//

        $this->start_controls_section(
            'gofly_hotel_room_slider_header_styles',
            [
                'label' => esc_html__('Header Styles', 'gofly-core'),
                'tab'   => Controls_Manager::TAB_STYLE,
            ]
        );
        $this->add_control(
            'gofly_hotel_room_slider_general_title_style',
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
                'name'     => 'gofly_hotel_room_slider_general_title_typ',
                'selector' => '{{WRAPPER}} .section-title h2',
            ]
        );
        $this->add_control(
            'gofly_hotel_room_slider_general_title_color',
            [
                'label'     => esc_html__('Color', 'gofly-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}}  .section-title h2' => 'color: {{VALUE}};',
                ],
            ]
        );
        $this->add_control(
            'gofly_hotel_room_slider_general_desc_style',
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
                'name'     => 'gofly_hotel_room_slider_general_desc_typ',
                'selector' => '{{WRAPPER}} .section-title p',
            ]
        );
        $this->add_control(
            'gofly_hotel_room_slider_general_desc_color',
            [
                'label'     => esc_html__('Color', 'gofly-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}}  .section-title p' => 'color: {{VALUE}};',
                ],
            ]
        );
        $this->end_controls_section();
        // Card Style
        $this->start_controls_section(
            'gofly_hotel_room_slider_card_styles',
            [
                'label' => esc_html__('Card Styles', 'gofly-core'),
                'tab'   => Controls_Manager::TAB_STYLE,
            ]
        );
        $this->add_control(
            'gofly_hotel_room_slider_card_bg_color',
            [
                'label'     => esc_html__('Background Color', 'gofly-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}}  .hotel-card' => 'background-color: {{VALUE}};',
                ],
            ]
        );
        $this->add_control(
            'gofly_hotel_room_slider_card_border_color',
            [
                'label'     => esc_html__('Border Color', 'gofly-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}}  .hotel-card' => 'border-color: {{VALUE}};',
                ],
            ]
        );
        $this->add_responsive_control(
            'gofly_hotel_room_slider_card_border_radius',
            [
                'label'      => esc_html__(
                    'Border Radius',
                    'gofly-core'
                ),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%'],
                'selectors'  => [
                    '{{WRAPPER}} .hotel-card' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'
                ]
            ]
        );
        $this->add_control(
            'gofly_hotel_room_slider_card_title_style',
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
                'name'     => 'gofly_hotel_room_slider_card_title_typ',
                'selector' => '{{WRAPPER}} .hotel-card .hotel-content h5 a',
            ]
        );
        $this->add_control(
            'gofly_hotel_room_slider_card_title_color',
            [
                'label'     => esc_html__('Color', 'gofly-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}}  .hotel-card .hotel-content h5 a' => 'color: {{VALUE}};',
                ],
            ]
        );
        $this->add_control(
            'gofly_hotel_room_slider_card_title_hover_color',
            [
                'label'     => esc_html__('Hover Color', 'gofly-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}}  .hotel-card .hotel-content h5 a:hover' => 'color: {{VALUE}};',
                ],
            ]
        );
        $this->add_control(
            'gofly_hotel_room_slider_info_style',
            [
                'label'     => esc_html__('Hotel Info', 'gofly-core'),
                'type'      => \Elementor\Controls_Manager::HEADING,
                'separator' => 'after',
            ]
        );
        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'label'    => esc_html__('Location Typography', 'gofly-core'),
                'name'     => 'gofly_hotel_room_slider_location_typ',
                'selector' => '{{WRAPPER}} .hotel-card .hotel-content .location-area .location a',
            ]
        );
        $this->add_control(
            'gofly_hotel_room_slider_location_color',
            [
                'label'     => esc_html__('Location Color', 'gofly-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}}  .hotel-card .hotel-content .location-area .location a' => 'color: {{VALUE}};',
                ],
            ]
        );
        $this->add_control(
            'gofly_hotel_room_slider_location_hover_color',
            [
                'label'     => esc_html__('Location Hover Color', 'gofly-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}}  .hotel-card .hotel-content .location-area .location a:hover' => 'color: {{VALUE}};',
                ],
            ]
        );
        $this->add_control(
            'gofly_hotel_room_slider_map_icon_color',
            [
                'label'     => esc_html__('Icon Color', 'gofly-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}}  .hotel-card .hotel-content .location-area .location svg' => 'fill: {{VALUE}};',
                ],
            ]
        );
        $this->add_control(
            'gofly_hotel_room_slider_info_map_button_color',
            [
                'label'     => esc_html__('Map Button Color', 'gofly-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}}  .hotel-card .hotel-content .location-area .map-view' => 'color: {{VALUE}};',
                ],
            ]
        );
        $this->add_control(
            'gofly_hotel_room_slider_info_map_button_hover_color',
            [
                'label'     => esc_html__('Map Button Hover Color', 'gofly-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}}  .hotel-card .hotel-content .location-area .map-view:hover' => 'color: {{VALUE}};',
                ],
            ]
        );
        $this->add_control(
            'gofly_hotel_room_slider_info_map_button_icon_color',
            [
                'label'     => esc_html__('Map Button Icon Color', 'gofly-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}}  .hotel-card .hotel-content .location-area .map-view svg' => 'fill: {{VALUE}};',
                ],
            ]
        );
        $this->add_control(
            'gofly_hotel_room_slider_info_map_button_hover_icon_color',
            [
                'label'     => esc_html__('Map Button Icon Hover Color', 'gofly-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}}  .hotel-card .hotel-content .location-area .map-view:hover svg' => 'fill: {{VALUE}};',
                ],
            ]
        );
        $this->add_control(
            'gofly_hotel_room_slider_facilities_style',
            [
                'label'     => esc_html__('Hotel Facilities', 'gofly-core'),
                'type'      => \Elementor\Controls_Manager::HEADING,
                'separator' => 'after',
            ]
        );
        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'label'    => esc_html__('Typography', 'gofly-core'),
                'name'     => 'gofly_hotel_room_slider_facility_typ',
                'selector' => '{{WRAPPER}} .hotel-card .hotel-content .hotel-feature-list li',
            ]
        );
        $this->add_control(
            'gofly_hotel_room_slider_facility_color',
            [
                'label'     => esc_html__('Color', 'gofly-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}}  .hotel-card .hotel-content .hotel-feature-list li' => 'color: {{VALUE}};',
                ],
            ]
        );
        $this->add_control(
            'gofly_hotel_room_slider_facility_icon_color',
            [
                'label'     => esc_html__('Icon Color', 'gofly-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}}  .hotel-card .hotel-content .hotel-feature-list li svg' => 'fill: {{VALUE}};',
                ],
            ]
        );
        $this->add_control(
            'gofly_hotel_room_slider_facility_icon_border_color',
            [
                'label'     => esc_html__('Icon Border Color', 'gofly-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}}  .hotel-card .hotel-content .hotel-feature-list li svg rect' => 'stroke: {{VALUE}};',
                ],
            ]
        );
        $this->add_control(
            'gofly_hotel_room_slider_cancel_style',
            [
                'label'     => esc_html__('Room Cancel', 'gofly-core'),
                'type'      => \Elementor\Controls_Manager::HEADING,
                'separator' => 'after',
            ]
        );
        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'label'    => esc_html__('Typography', 'gofly-core'),
                'name'     => 'gofly_hotel_room_slider_cancellation_typ',
                'selector' => '{{WRAPPER}} .hotel-card .hotel-content .cancellation span',
            ]
        );

        $this->add_control(
            'gofly_hotel_room_slider_cancel_color',
            [
                'label'     => esc_html__('Color', 'gofly-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}}  .hotel-card .hotel-content .cancellation span' => 'color: {{VALUE}};',
                ],
            ]
        );
        $this->add_control(
            'gofly_hotel_room_slider_cancel_icon_color',
            [
                'label'     => esc_html__('Icon Color', 'gofly-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}}  .hotel-card .hotel-content .cancellation svg' => 'fill: {{VALUE}};',
                ],
            ]
        );
        $this->add_control(
            'gofly_hotel_room_slider_cancel_icon_bg_color',
            [
                'label'     => esc_html__('Icon Background Color', 'gofly-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}}  .hotel-card .hotel-content .cancellation svg rect' => 'fill: {{VALUE}};',
                ],
            ]
        );
        $this->add_control(
            'gofly_hotel_room_slider_price_style',
            [
                'label'     => esc_html__('Room Price', 'gofly-core'),
                'type'      => \Elementor\Controls_Manager::HEADING,
                'separator' => 'after',
            ]
        );
        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'label'    => esc_html__('Text Typography', 'gofly-core'),
                'name'     => 'gofly_hotel_room_slider_price_text_typ',
                'selector' => '{{WRAPPER}} .hotel-card .hotel-content .btn-and-price-area .price-area h6',
            ]
        );
        $this->add_control(
            'gofly_hotel_room_slider_price_text_color',
            [
                'label'     => esc_html__('Text Color', 'gofly-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}}  .hotel-card .hotel-content .btn-and-price-area .price-area h6' => 'color: {{VALUE}};',
                ],
            ]
        );
        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'label'    => esc_html__('Price Typography', 'gofly-core'),
                'name'     => 'gofly_hotel_room_slider_price_typ',
                'selector' => '{{WRAPPER}} .hotel-card .hotel-content .btn-and-price-area .price-area span',
            ]
        );
        $this->add_control(
            'gofly_hotel_room_slider_price_color',
            [
                'label'     => esc_html__('Price Color', 'gofly-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}}  .hotel-card .hotel-content .btn-and-price-area .price-area span' => 'color: {{VALUE}};',
                ],
            ]
        );
        $this->add_control(
            'gofly_hotel_room_slider_review_style',
            [
                'label'     => esc_html__('Room Review', 'gofly-core'),
                'type'      => \Elementor\Controls_Manager::HEADING,
                'separator' => 'after',
            ]
        );
        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'label'    => esc_html__('Text Typography', 'gofly-core'),
                'name'     => 'gofly_hotel_room_slider_review_text_typ',
                'selector' => '{{WRAPPER}} .hotel-card .hotel-content .rating-area span',
            ]
        );
        $this->add_control(
            'gofly_hotel_room_slider_review_text_color',
            [
                'label'     => esc_html__('Text Color', 'gofly-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}}  .hotel-card .hotel-content .rating-area span' => 'color: {{VALUE}};',
                ],
            ]
        );
        $this->add_control(
            'gofly_hotel_room_slider_review_star_color',
            [
                'label'     => esc_html__('Star Color', 'gofly-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}}  .hotel-card .hotel-content .rating-area .star li i' => 'color: {{VALUE}};',
                ],
            ]
        );
        $this->end_controls_section();
        // Card Image Style
        $this->start_controls_section(
            'gofly_hotel_room_slider_card_image_styles',
            [
                'label' => esc_html__('Image Styles', 'gofly-core'),
                'tab'   => Controls_Manager::TAB_STYLE,
            ]
        );
        $this->add_control(
            'gofly_hotel_room_slider_card_image_style',
            [
                'label'     => esc_html__('Image Border Radius', 'gofly-core'),
                'type'      => \Elementor\Controls_Manager::HEADING,
                'separator' => 'after',
            ]
        );
        $this->add_responsive_control(
            'gofly_hotel_room_slider_card_image_radius',
            [
                'label'      => esc_html__(
                    'Border Radius',
                    'gofly-core'
                ),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%'],
                'selectors'  => [
                    '{{WRAPPER}} .hotel-card .package-img-wrap .package-img img' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'
                ]
            ]
        );
        $this->end_controls_section();
        // Card Buttons Style
        $this->start_controls_section(
            'gofly_hotel_room_slider_card_buttons_styles',
            [
                'label' => esc_html__('Buttons Styles', 'gofly-core'),
                'tab'   => Controls_Manager::TAB_STYLE,
            ]
        );
        $this->add_control(
            'gofly_hotel_room_slider_card_main_button',
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
                'name'     => 'gofly_hotel_room_slider_card_button_typ',
                'selector' => '{{WRAPPER}} .hotel-card .hotel-content .btn-and-price-area .primary-btn1',
            ]
        );
        $this->add_control(
            'gofly_hotel_room_slider_card_button_color',
            [
                'label'     => esc_html__('Color', 'gofly-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}}  .hotel-card .hotel-content .btn-and-price-area .primary-btn1' => 'color: {{VALUE}};',
                ],
            ]
        );
        $this->add_control(
            'gofly_hotel_room_slider_card_button_hover_color',
            [
                'label'     => esc_html__('Hover Color', 'gofly-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}}  .hotel-card .hotel-content .btn-and-price-area .primary-btn1:hover' => 'color: {{VALUE}};',
                ],
            ]
        );
        $this->add_control(
            'gofly_hotel_room_slider_card_button_icon_color',
            [
                'label'     => esc_html__('Icon Color', 'gofly-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}}  .primary-btn1 > span svg' => 'fill: {{VALUE}};',
                ],
            ]
        );
        $this->add_control(
            'gofly_hotel_room_slider_card_button_hover_icon_color',
            [
                'label'     => esc_html__('Hover Icon Color', 'gofly-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}}  .primary-btn1:hover > span svg' => 'fill: {{VALUE}};',
                ],
            ]
        );
        $this->add_control(
            'gofly_hotel_room_slider_card_button_bg_color',
            [
                'label'     => esc_html__('Background Color', 'gofly-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}}  .hotel-card .hotel-content .btn-and-price-area .primary-btn1' => 'background-color: {{VALUE}};',
                ],
            ]
        );
        $this->add_control(
            'gofly_hotel_room_slider_card_button_hover_bg_color',
            [
                'label'     => esc_html__('Hover BG Color', 'gofly-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}}  .primary-btn1::after' => 'background-color: {{VALUE}};',
                ],
            ]
        );
        $this->add_responsive_control(
            'gofly_hotel_room_slider_card_button_radius',
            [
                'label'      => esc_html__(
                    'Border Radius',
                    'gofly-core'
                ),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%'],
                'selectors'  => [
                    '{{WRAPPER}} .hotel-card .primary-btn1' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'
                ]
            ]
        );
        $this->add_control(
            'gofly_hotel_room_slider_card_badge',
            [
                'label'     => esc_html__('Badge Style', 'gofly-core'),
                'type'      => \Elementor\Controls_Manager::HEADING,
                'separator' => 'after',
            ]
        );
        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'label'    => esc_html__('Typography', 'gofly-core'),
                'name'     => 'gofly_hotel_room_slider_card_badge_typ',
                'selector' => '{{WRAPPER}} .hotel-card .hotel-img-wrap .batch span',
            ]
        );

        $this->add_control(
            'gofly_hotel_room_slider_card_badge_color',
            [
                'label'     => esc_html__('Color', 'gofly-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}}  .hotel-card .hotel-img-wrap .batch span' => 'color: {{VALUE}};',
                ],
            ]
        );
        $this->add_control(
            'gofly_hotel_room_slider_card_badge_bg_color',
            [
                'label'     => esc_html__('Background Color', 'gofly-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}}  .hotel-card .hotel-img-wrap .batch span' => 'background-color: {{VALUE}};',
                ],
            ]
        );
        $this->add_responsive_control(
            'gofly_hotel_room_slider_card_badge_radius',
            [
                'label'      => esc_html__(
                    'Border Radius',
                    'gofly-core'
                ),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%'],
                'selectors'  => [
                    '{{WRAPPER}} .hotel-card .hotel-img-wrap .batch span' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'
                ]
            ]
        );
        $this->end_controls_section();

        //============Style End=============//

    }
    protected function render()
    {

        $settings = $this->get_settings_for_display();

        $cat_ids           = $settings['gofly_hotel_grid_selected_cat'];
        $selected_post_ids = $settings['gofly_hotel_grid_post_list'];

        $args = array(
            'post_type'      => 'hotel',
            'order'          => $settings['gofly_hotel_grid_order'],
            'orderby'        => $settings['gofly_hotel_grid_orderby'],
            'posts_per_page' => $settings['gofly_hotel_grid_post_per_page'],
            'post_status'    => 'publish',
            'offset'         => 0,
        );

        if (!empty($cat_ids)) {
            $args['tax_query'] = array(
                array(
                    'taxonomy' => 'hotel-category',
                    'field'    => 'slug',
                    'terms'    => $cat_ids,
                    'operator' => 'IN',
                ),
            );
        }

        // Add Included posts
        if (!empty($selected_post_ids)) {
            $args['post__in'] = $selected_post_ids;
        }

        $Query = new \WP_Query($args);
?>


        <?php if (is_admin()) : ?>
            <script>
                var swiper = new Swiper(".home1-trip-slider", {
                    slidesPerView: 1,
                    speed: 1500,
                    spaceBetween: 24,
                    autoplay: {
                        delay: 2500, // Autoplay duration in milliseconds
                        pauseOnMouseEnter: true,
                        disableOnInteraction: false,
                    },
                    pagination: {
                        el: ".swiper-pagination2",
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
                            spaceBetween: 15,
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
            </script>
        <?php endif; ?>


        <div class="relevant-package-section pt-100">
            <div class="container">
                <div class="row justify-content-center mb-50">
                    <div class="col-xl-6 col-lg-8">
                        <div class="section-title text-center">
                            <?php if (!empty($settings['gofly_hotel_room_slider_general_title'])) : ?>
                                <h2><?php echo esc_html($settings['gofly_hotel_room_slider_general_title']); ?></h2>
                            <?php endif; ?>
                            <?php if (!empty($settings['gofly_hotel_room_slider_general_desc'])) : ?>
                                <p><?php echo esc_html($settings['gofly_hotel_room_slider_general_desc']); ?></p>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
                <div class="row mb-40">
                    <div class="col-lg-12">
                        <div class="swiper home1-trip-slider">
                            <div class="swiper-wrapper">

                                <?php
                                while ($Query->have_posts()) {
                                    $Query->the_post();
                                    $is_featured    = get_post_meta(get_the_ID(), '_is_featured', true);
                                    $hotel_location = wp_get_post_terms(get_the_ID(), 'hotel-location');
                                ?>
                                    <div class="swiper-slide">
                                        <div class="hotel-card">
                                            <?php if (has_post_thumbnail()): ?>
                                                <div class="hotel-img-wrap">
                                                    <a href="<?php the_permalink() ?>" class="hotel-img">
                                                        <?php the_post_thumbnail() ?>
                                                    </a>
                                                    <div class="batch">
                                                        <?php if (Egns_Helper::hotel_has_sale_price(get_the_ID())): ?>
                                                            <span><?php echo esc_html__('Sale on!',  'gofly-core') ?></span>
                                                        <?php endif; ?>
                                                        <?php if ($is_featured == 1): ?>
                                                            <span class="yellow-bg"><?php echo esc_html__('Featured',  'gofly-core') ?></span>
                                                        <?php endif; ?>
                                                    </div>
                                                </div>
                                            <?php endif; ?>
                                            <div class="hotel-content">
                                                <?php if (class_exists('Post_Rating_Shortcode')): ?>
                                                    <div class="rating-area">
                                                        <?php echo do_shortcode('[post_rating_count]'); ?>
                                                    </div>
                                                <?php endif; ?>
                                                <h5><a href="<?php the_permalink() ?>"><?php the_title() ?></a></h5>
                                                <div class="location-area">
                                                    <?php if (!empty($hotel_location)): ?>
                                                        <div class="location">
                                                            <svg width="14" height="14" viewBox="0 0 14 14" xmlns="http://www.w3.org/2000/svg">
                                                                <path
                                                                    d="M6.83615 0C3.77766 0 1.28891 2.48879 1.28891 5.54892C1.28891 7.93837 4.6241 11.8351 6.05811 13.3994C6.25669 13.6175 6.54154 13.7411 6.83615 13.7411C7.13076 13.7411 7.41561 13.6175 7.6142 13.3994C9.04821 11.8351 12.3834 7.93833 12.3834 5.54892C12.3834 2.48879 9.89464 0 6.83615 0ZM7.31469 13.1243C7.18936 13.2594 7.02008 13.3342 6.83615 13.3342C6.65222 13.3342 6.48295 13.2594 6.35761 13.1243C4.95614 11.5959 1.69584 7.79515 1.69584 5.54896C1.69584 2.7134 4.00067 0.406933 6.83615 0.406933C9.67164 0.406933 11.9765 2.7134 11.9765 5.54896C11.9765 7.79515 8.71617 11.5959 7.31469 13.1243Z" />
                                                                <path
                                                                    d="M6.83618 8.54554C8.4624 8.54554 9.7807 7.22723 9.7807 5.60102C9.7807 3.9748 8.4624 2.65649 6.83618 2.65649C5.20997 2.65649 3.89166 3.9748 3.89166 5.60102C3.89166 7.22723 5.20997 8.54554 6.83618 8.54554Z" />
                                                            </svg>
                                                            <?php
                                                            if (!empty($hotel_location) && !is_wp_error($hotel_location)) {
                                                                $child_term  = null;
                                                                $parent_term = null;

                                                                foreach ($hotel_location as $term) {
                                                                    if ($term->parent == 0) {
                                                                        $parent_term = $term;
                                                                    } else {
                                                                        $child_term = $term;
                                                                        break;
                                                                    }
                                                                }
                                                                if ($child_term) {
                                                                    $parent = get_term($child_term->parent, 'hotel-location');
                                                                    if ($parent && !is_wp_error($parent)) {
                                                                        echo '<a href="' . esc_url(get_term_link($parent->term_id)) . '">'
                                                                            . esc_html($parent->name) . '</a> <i class="bi bi-arrow-right"></i> ';
                                                                    }
                                                                    echo '<a href="' . esc_url(get_term_link($child_term->term_id)) . '">'
                                                                        . esc_html($child_term->name) . '</a>';
                                                                } elseif ($parent_term) {
                                                                    echo '<a href="' . esc_url(get_term_link($parent_term->term_id)) . '">'
                                                                        . esc_html($parent_term->name) . '</a>';
                                                                }
                                                            }
                                                            ?>
                                                        </div>
                                                    <?php endif ?>
                                                    <?php if (!empty(Egns_Helper::egns_get_hotel_value('hotel_location_link_with_lbl', 'text'))): ?>
                                                        <a href=" <?php echo esc_url(Egns_Helper::egns_get_hotel_value('hotel_location_link_with_lbl', 'url')) ?>" class="map-view" target=" <?php echo esc_attr(Egns_Helper::egns_get_hotel_value('hotel_location_link_with_lbl', 'target')) ?>">
                                                            <?php echo esc_html(Egns_Helper::egns_get_hotel_value('hotel_location_link_with_lbl', 'text')) ?>
                                                            <svg width="9" height="9" viewBox="0 0 9 9" xmlns="http://www.w3.org/2000/svg">
                                                                <path
                                                                    d="M4.22358 9H1.52534C1.07358 9 0.690381 8.85586 0.41792 8.5834C0.145459 8.31093 0.00131836 7.92597 0.00131836 7.47246C-0.000439453 5.51777 -0.000439453 3.75293 0.00131836 2.07597C0.00131836 1.62422 0.147217 1.24101 0.421436 0.970309C0.695654 0.699606 1.07886 0.555466 1.53237 0.555466H3.32534C3.54507 0.555466 3.72437 0.620505 3.84565 0.743552C3.95464 0.852536 4.01089 1.00371 4.00913 1.17949C4.00562 1.55215 3.74194 1.79121 3.33413 1.79297H1.5394C1.29331 1.79297 1.2353 1.85097 1.2353 2.10058V7.4584C1.2353 7.70625 1.29331 7.7625 1.54116 7.7625H6.89897C7.14683 7.7625 7.20483 7.70625 7.20483 7.45664V5.66367C7.20483 5.25586 7.44741 4.99043 7.82007 4.98867H7.82358C8.198 4.98867 8.44058 5.25058 8.44058 5.65664V5.82539C8.44233 6.37558 8.44233 6.94511 8.44058 7.5041C8.43882 7.93828 8.29292 8.31093 8.0187 8.58164C7.74448 8.85234 7.37183 8.99648 6.93589 8.99824H4.22358V9Z" />
                                                                <path
                                                                    d="M3.89929 5.67422C3.69011 5.67422 3.48444 5.53535 3.38776 5.32969C3.26823 5.0748 3.31921 4.79883 3.52487 4.58965C3.78151 4.32949 4.04519 4.06758 4.30007 3.81445L4.57077 3.54551L5.4444 2.67715C5.91374 2.21133 6.38132 1.74551 6.8489 1.27793C6.85769 1.26914 6.86647 1.26035 6.87526 1.2498C6.5905 1.24453 5.97351 1.24102 5.63073 1.23926C5.43561 1.23926 5.27038 1.17598 5.15436 1.05645C5.04362 0.943945 4.98561 0.789258 4.98737 0.611719C4.99089 0.247852 5.24929 0.00351562 5.62897 0.00175781C6.09655 0 6.56061 0 7.02644 0C7.49929 0 7.93698 0 8.36589 0.00175781C8.74733 0.00175781 8.99519 0.246094 8.99694 0.622266C9.00046 1.5627 9.00046 2.49434 8.99694 3.39434C8.99519 3.75644 8.74206 4.01133 8.38171 4.01133C8.02136 4.01133 7.76823 3.7582 7.76472 3.39785C7.76296 3.21328 7.7612 2.92676 7.75944 2.64902C7.75769 2.44512 7.75769 2.25 7.75593 2.11992C7.74186 2.13223 7.72956 2.14453 7.71726 2.15684C7.44655 2.4293 7.17585 2.7 6.90515 2.97246C6.1071 3.77402 5.28269 4.60371 4.46706 5.41406C4.3405 5.53711 4.18229 5.62324 4.01179 5.66367C3.97312 5.6707 3.9362 5.67422 3.89929 5.67422Z" />
                                                            </svg>
                                                        </a>
                                                    <?php endif ?>
                                                </div>
                                                <ul class="hotel-feature-list">
                                                    <?php
                                                    $feature_lists = Egns_Helper::egns_get_hotel_value('hotel_card_highlights_features');
                                                    $lists         = explode("\n", $feature_lists);
                                                    foreach ((array) $lists as $list) {
                                                    ?>
                                                        <li>
                                                            <svg width="14" height="14" viewBox="0 0 14 14" xmlns="http://www.w3.org/2000/svg">
                                                                <rect x="0.5" y="0.5" width="13" height="13" rx="6.5" />
                                                                <path
                                                                    d="M10.6947 5.45777L6.24644 9.90841C6.17556 9.97689 6.08572 10.0124 5.99596 10.0124C5.9494 10.0125 5.90328 10.0033 5.86027 9.98548C5.81727 9.96763 5.77822 9.94144 5.7454 9.90841L3.3038 7.46681C3.16436 7.32969 3.16436 7.10521 3.3038 6.96577L4.16652 6.10065C4.29892 5.96833 4.53524 5.96833 4.66764 6.10065L5.99596 7.42897L9.33092 4.09161C9.36377 4.05868 9.40278 4.03255 9.44573 4.01471C9.48868 3.99686 9.53473 3.98766 9.58124 3.98761C9.67572 3.98761 9.76556 4.02545 9.83172 4.09161L10.6944 4.95681C10.8341 5.09625 10.8341 5.32073 10.6947 5.45777Z" />
                                                            </svg>
                                                            <?php echo esc_html($list) ?>
                                                        </li>
                                                    <?php } ?>
                                                </ul>
                                                <div class="cancellation">
                                                    <svg width="14" height="14" viewBox="0 0 14 14" xmlns="http://www.w3.org/2000/svg">
                                                        <rect width="14" height="14" rx="7" />
                                                        <path
                                                            d="M10.6947 5.45777L6.24644 9.90841C6.17556 9.97689 6.08572 10.0124 5.99596 10.0124C5.9494 10.0125 5.90328 10.0033 5.86027 9.98548C5.81727 9.96763 5.77822 9.94144 5.7454 9.90841L3.3038 7.46681C3.16436 7.32969 3.16436 7.10521 3.3038 6.96577L4.16652 6.10065C4.29892 5.96833 4.53524 5.96833 4.66764 6.10065L5.99596 7.42897L9.33092 4.09161C9.36377 4.05868 9.40278 4.03255 9.44573 4.01471C9.48868 3.99686 9.53473 3.98766 9.58124 3.98761C9.67572 3.98761 9.76556 4.02545 9.83172 4.09161L10.6944 4.95681C10.8341 5.09625 10.8341 5.32073 10.6947 5.45777Z" />
                                                    </svg>
                                                    <span><?php echo esc_html(Egns_Helper::egns_get_hotel_value('hotel_cancellation_label')) ?></span>
                                                </div>
                                                <div class="btn-and-price-area">
                                                    <a href="<?php the_permalink() ?>" class="primary-btn1">
                                                        <span>
                                                            <?php echo esc_html__('Book Now',  'gofly-core') ?>
                                                            <svg width="10" height="10" viewBox="0 0 10 10" xmlns="http://www.w3.org/2000/svg">
                                                                <path
                                                                    d="M9.73535 1.14746C9.57033 1.97255 9.32924 3.26406 9.24902 4.66797C9.16817 6.08312 9.25559 7.5453 9.70214 8.73633C9.84754 9.12406 9.65129 9.55659 9.26367 9.70215C8.9001 9.83849 8.4969 9.67455 8.32812 9.33398L8.29785 9.26367L8.19921 8.98438C7.73487 7.5758 7.67054 5.98959 7.75097 4.58203C7.77875 4.09598 7.82525 3.62422 7.87988 3.17969L1.53027 9.53027C1.23738 9.82317 0.762615 9.82317 0.469722 9.53027C0.176829 9.23738 0.176829 8.76262 0.469722 8.46973L6.83593 2.10254C6.3319 2.16472 5.79596 2.21841 5.25 2.24902C3.8302 2.32862 2.2474 2.26906 0.958003 1.79102L0.704097 1.68945L0.635738 1.65527C0.303274 1.47099 0.157578 1.06102 0.310542 0.704102C0.463655 0.347333 0.860941 0.170391 1.22363 0.28418L1.29589 0.310547L1.48828 0.387695C2.47399 0.751207 3.79966 0.827571 5.16601 0.750977C6.60111 0.670504 7.97842 0.428235 8.86132 0.262695L9.95312 0.0585938L9.73535 1.14746Z" />
                                                            </svg>
                                                        </span>
                                                        <span>
                                                            <?php echo esc_html__('Book Now',  'gofly-core') ?>
                                                            <svg width="10" height="10" viewBox="0 0 10 10" xmlns="http://www.w3.org/2000/svg">
                                                                <path
                                                                    d="M9.73535 1.14746C9.57033 1.97255 9.32924 3.26406 9.24902 4.66797C9.16817 6.08312 9.25559 7.5453 9.70214 8.73633C9.84754 9.12406 9.65129 9.55659 9.26367 9.70215C8.9001 9.83849 8.4969 9.67455 8.32812 9.33398L8.29785 9.26367L8.19921 8.98438C7.73487 7.5758 7.67054 5.98959 7.75097 4.58203C7.77875 4.09598 7.82525 3.62422 7.87988 3.17969L1.53027 9.53027C1.23738 9.82317 0.762615 9.82317 0.469722 9.53027C0.176829 9.23738 0.176829 8.76262 0.469722 8.46973L6.83593 2.10254C6.3319 2.16472 5.79596 2.21841 5.25 2.24902C3.8302 2.32862 2.2474 2.26906 0.958003 1.79102L0.704097 1.68945L0.635738 1.65527C0.303274 1.47099 0.157578 1.06102 0.310542 0.704102C0.463655 0.347333 0.860941 0.170391 1.22363 0.28418L1.29589 0.310547L1.48828 0.387695C2.47399 0.751207 3.79966 0.827571 5.16601 0.750977C6.60111 0.670504 7.97842 0.428235 8.86132 0.262695L9.95312 0.0585938L9.73535 1.14746Z" />
                                                            </svg>
                                                        </span>
                                                    </a>
                                                    <?php echo Egns_Helper::hotel_global_starting_price(get_the_ID()) ?>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                <?php
                                };
                                wp_reset_postdata();
                                ?>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-12 d-flex justify-content-center">
                        <div class="swiper-pagination2 paginations"></div>
                    </div>
                </div>
            </div>
        </div>

<?php

    }
}

Plugin::instance()->widgets_manager->register(new Gofly_Hotel_Room_Slider_Widget());
