<?php

namespace Elementor;

if (!defined('ABSPATH')) exit;  // Exit if accessed directly

use Elementor\core\Schemes;
use Elementor\Group_Control_Typography;
use Egns_Core\Egns_Helper;

class Gofly_Featured_Hotel_Widget extends Widget_Base
{

    public function get_name()
    {
        return 'gofly_featured_hotel';
    }

    public function get_title()
    {
        return esc_html__('EG Hotel Featured', 'gofly-core');
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
            'gofly_hotel_featured_section',
            [
                'label' => esc_html__('General', 'gofly-core')
            ]
        );

        $this->add_control(
            'custom_panel_notice',
            [
                'type'        => \Elementor\Controls_Manager::NOTICE,
                'notice_type' => 'warning',
                'dismissible' => true,
                'heading'     => esc_html__('Notice', 'gofly-core'),
                'content'     => esc_html__('This Widgets only for custom post "Hotel" details page.', 'gofly-core'),
            ]
        );

        $this->add_control(
            'gofly_hotel_featured_section_bg_image',
            [
                'label'   => esc_html__('Header Background Image', 'gofly-core'),
                'type'    => \Elementor\Controls_Manager::MEDIA,
                'default' => [
                    'url' => \Elementor\Utils::get_placeholder_image_src(),
                ],
            ]
        );

        $this->add_control(
            'gofly_hotel_featured_section_slider_navigation',
            [
                'label'        => esc_html__('Show Pagination?', 'gofly-core'),
                'type'         => \Elementor\Controls_Manager::SWITCHER,
                'label_on'     => esc_html__('Enable', 'gofly-core'),
                'label_off'    => esc_html__('Disable', 'gofly-core'),
                'return_value' => 'yes',
                'default'      => 'yes',
            ]
        );

        $this->end_controls_section();

        //============Style One Start=============//

        $this->start_controls_section(
            'gofly_hotel_room_header_styles',
            [
                'label' => esc_html__('Header Styles', 'gofly-core'),
                'tab'   => Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_control(
            'gofly_hotel_room_header_area',
            [
                'label'     => esc_html__('General Style', 'gofly-core'),
                'type'      => \Elementor\Controls_Manager::HEADING,
                'separator' => 'after',
            ]
        );

        $this->add_control(
            'gofly_hotel_room_header_area_bg',
            [
                'label'     => esc_html__('Background Color', 'gofly-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .breadcrumb-section.four' => 'background-color: {{VALUE}};',

                ],
            ]
        );

        $this->add_control(
            'gofly_hotel_room_header_area_title',
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
                'name'     => 'gofly_hotel_room_header_area_title_typ',
                'selector' => '{{WRAPPER}} .breadcrumb-section.four .banner-content h1',

            ]
        );

        $this->add_control(
            'gofly_hotel_room_header_area_title_color',
            [
                'label'     => esc_html__('Color', 'gofly-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}}  .breadcrumb-section.four .banner-content h1' => 'color: {{VALUE}};',

                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'label'    => esc_html__('Subtitle Typography', 'gofly-core'),
                'name'     => 'gofly_hotel_room_header_area_subtitle_typ',
                'selector' => '{{WRAPPER}} .breadcrumb-section.four .banner-content .rating-area span',

            ]
        );

        $this->add_control(
            'gofly_hotel_room_header_area_subtitle_color',
            [
                'label'     => esc_html__('Subtitle Color', 'gofly-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .breadcrumb-section.four .banner-content .rating-area span' => 'color: {{VALUE}};',

                ],
            ]
        );

        $this->add_control(
            'gofly_hotel_room_header_map_btn',
            [
                'label'     => esc_html__('Map Button', 'gofly-core'),
                'type'      => \Elementor\Controls_Manager::HEADING,
                'separator' => 'after',
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'label'    => esc_html__('Typography', 'gofly-core'),
                'name'     => 'gofly_hotel_room_header_map_btn_typ',
                'selector' => '{{WRAPPER}} .breadcrumb-section.four .banner-content .location-area .map-view',

            ]
        );

        $this->add_control(
            'gofly_hotel_room_header_map_btn_color',
            [
                'label'     => esc_html__('Color', 'gofly-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .breadcrumb-section.four .banner-content .location-area .map-view' => 'color: {{VALUE}};',

                ],
            ]
        );

        $this->add_control(
            'gofly_hotel_room_header_map_btn_icon_color',
            [
                'label'     => esc_html__('Icon Color', 'gofly-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .breadcrumb-section.four .banner-content .location-area .map-view svg' => 'fill: {{VALUE}};',

                ],
            ]
        );

        $this->add_control(
            'gofly_hotel_room_header_map_btn_hover_color',
            [
                'label'     => esc_html__('Hover Color', 'gofly-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .breadcrumb-section.four .banner-content .location-area .map-view:hover' => 'color: {{VALUE}};',

                ],
            ]
        );

        $this->add_control(
            'gofly_hotel_room_header_map_btn_icon_hover_color',
            [
                'label'     => esc_html__('Icon Hover Color', 'gofly-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .breadcrumb-section.four .banner-content .location-area .map-view:hover svg' => 'fill: {{VALUE}};',

                ],
            ]
        );

        $this->add_control(
            'gofly_hotel_room_header_image_area',
            [
                'label'     => esc_html__('Images', 'gofly-core'),
                'type'      => \Elementor\Controls_Manager::HEADING,
                'separator' => 'after',
            ]
        );

        $this->add_responsive_control(
            'gofly_hotel_room_header_image_area_radius',
            [
                'label'      => esc_html__(
                    'Image Area Border Radius',
                    'gofly-core'
                ),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%'],
                'selectors'  => [
                    '{{WRAPPER}} .hotel-dt-gallery-section .room-img-group' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'
                ]
            ]
        );

        $this->add_control(
            'gofly_hotel_room_header_image_area_bg',
            [
                'label'     => esc_html__('Background Color', 'gofly-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .hotel-dt-gallery-section .room-img-group' => 'background-color: {{VALUE}};',

                ],
            ]
        );

        $this->add_control(
            'gofly_hotel_room_header_image_area_border_color',
            [
                'label'     => esc_html__('Border Color', 'gofly-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .hotel-dt-gallery-section .room-img-group' => 'border-color: {{VALUE}};',

                ],
            ]
        );

        $this->add_responsive_control(
            'gofly_hotel_room_header_image_area_image_radius',
            [
                'label'      => esc_html__(
                    'Image Border Radius',
                    'gofly-core'
                ),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%'],
                'selectors'  => [
                    '{{WRAPPER}} .hotel-dt-gallery-section .room-img-group .gallery-img-wrap img' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'
                ]
            ]
        );

        $this->add_control(
            'gofly_hotel_room_header_slider_button_bg',
            [
                'label'     => esc_html__('Slider Button Background Color', 'gofly-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .hotel-dt-gallery-section .room-img-group .gallery-img-wrap .hotel-dt-gallery-slider .slider-btn-grp .slider-btn' => 'background-color: {{VALUE}};',

                ],
            ]
        );

        $this->add_control(
            'gofly_hotel_room_header_slider_button_hover_bg',
            [
                'label'     => esc_html__('Slider Button Hover BG Color', 'gofly-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .hotel-dt-gallery-section .room-img-group .gallery-img-wrap .hotel-dt-gallery-slider .slider-btn-grp .slider-btn:hover' => 'background-color: {{VALUE}};',

                ],
            ]
        );

        $this->add_control(
            'gofly_hotel_room_header_slider_button_icon',
            [
                'label'     => esc_html__('Slider Button Icon Color', 'gofly-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .hotel-dt-gallery-section .room-img-group .gallery-img-wrap .hotel-dt-gallery-slider .slider-btn-grp .slider-btn svg' => 'fill: {{VALUE}};',

                ],
            ]
        );

        $this->add_control(
            'gofly_hotel_room_header_slider_button_icon_hover',
            [
                'label'     => esc_html__('Slider Button Icon Hover Color', 'gofly-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .hotel-dt-gallery-section .room-img-group .gallery-img-wrap .hotel-dt-gallery-slider .slider-btn-grp .slider-btn:hover svg' => 'fill: {{VALUE}};',

                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'label'    => esc_html__('Video Button Typography', 'gofly-core'),
                'name'     => 'gofly_hotel_room_header_video_btn_typ',
                'selector' => '{{WRAPPER}} .hotel-dt-gallery-section .room-img-group .gallery-img-wrap.two.active a',

            ]
        );

        $this->add_control(
            'gofly_hotel_room_header_video_btn_color',
            [
                'label'     => esc_html__('Video Button Color', 'gofly-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .hotel-dt-gallery-section .room-img-group .gallery-img-wrap.two.active a' => 'color: {{VALUE}};',

                ],
            ]
        );

        $this->add_control(
            'gofly_hotel_room_header_video_btn_icon_color',
            [
                'label'     => esc_html__('Video Button Icon Color', 'gofly-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .hotel-dt-gallery-section .room-img-group .gallery-img-wrap.two.active a i' => 'color: {{VALUE}};',

                ],
            ]
        );

        $this->add_control(
            'gofly_hotel_room_header_video_overlay_color',
            [
                'label'     => esc_html__('Video Overlay Color', 'gofly-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .hotel-dt-gallery-section .room-img-group .gallery-img-wrap.two a' => 'background-color: {{VALUE}};',

                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'label'    => esc_html__('Image Button Typography', 'gofly-core'),
                'name'     => 'gofly_hotel_room_header_image_btn_typ',
                'selector' => '{{WRAPPER}} .hotel-dt-gallery-section .room-img-group .gallery-img-wrap.two.active button',

            ]
        );

        $this->add_control(
            'gofly_hotel_room_header_image_btn_color',
            [
                'label'     => esc_html__('Image Button Color', 'gofly-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .hotel-dt-gallery-section .room-img-group .gallery-img-wrap.two.active button' => 'color: {{VALUE}};',

                ],
            ]
        );

        $this->add_control(
            'gofly_hotel_room_header_image_btn_icon_color',
            [
                'label'     => esc_html__('Image Button Icon Color', 'gofly-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .hotel-dt-gallery-section .room-img-group .gallery-img-wrap.two.active button i' => 'color: {{VALUE}};',

                ],
            ]
        );

        $this->add_control(
            'gofly_hotel_room_header_image_overlay_color',
            [
                'label'     => esc_html__('Image Overlay Color', 'gofly-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .hotel-dt-gallery-section .room-img-group .gallery-img-wrap.two button' => 'background-color: {{VALUE}};',

                ],
            ]
        );

        $this->end_controls_section();

        //============Style End=============//

    }
    protected function render()
    {

        $settings = $this->get_settings_for_display();

        $id = get_the_ID();

        $hotel_location = get_the_terms($id, 'hotel-location');

        $gallery_btn    = Egns_Helper::egns_get_hotel_value('hotel_gallery_btn_lbl');
        $gallery_images = Egns_Helper::egns_get_hotel_value('hotel_featured_gallery');
        $image_ids      = explode(',', $gallery_images);
        $length         = count($image_ids);


        $video_on     = Egns_Helper::egns_get_hotel_value('hotel_intro_video_switch');
        $video_link   = Egns_Helper::egns_get_hotel_value('hotel_intro_video_link');
        $video_poster = Egns_Helper::egns_get_hotel_value('hotel_intro_video_poster', 'url');
        $video_btn    = Egns_Helper::egns_get_hotel_value('hotel_intro_video_btn_lbl');
        $full_address = Egns_Helper::egns_get_hotel_value('hotel_full_address');





?>


        <div class="breadcrumb-section four" <?php echo !empty($settings['gofly_hotel_featured_section_bg_image']) ? 'style="background-image: url(' . esc_url($settings['gofly_hotel_featured_section_bg_image']['url']) . ');"' : ''; ?>>
            <div class="container">
                <div class="banner-content">
                    <?php if (class_exists('Post_Rating_Shortcode')): ?>
                        <?php echo do_shortcode('[post_rating]'); ?>
                    <?php endif; ?>
                    <h1><?php the_title() ?></h1>
                    <div class="location-area">
                        <?php if (!empty($full_address)): ?>
                            <div class="location">
                                <svg width="14" height="14" viewBox="0 0 14 14" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M6.83615 0C3.77766 0 1.28891 2.48879 1.28891 5.54892C1.28891 7.93837 4.6241 11.8351 6.05811 13.3994C6.25669 13.6175 6.54154 13.7411 6.83615 13.7411C7.13076 13.7411 7.41561 13.6175 7.6142 13.3994C9.04821 11.8351 12.3834 7.93833 12.3834 5.54892C12.3834 2.48879 9.89464 0 6.83615 0ZM7.31469 13.1243C7.18936 13.2594 7.02008 13.3342 6.83615 13.3342C6.65222 13.3342 6.48295 13.2594 6.35761 13.1243C4.95614 11.5959 1.69584 7.79515 1.69584 5.54896C1.69584 2.7134 4.00067 0.406933 6.83615 0.406933C9.67164 0.406933 11.9765 2.7134 11.9765 5.54896C11.9765 7.79515 8.71617 11.5959 7.31469 13.1243Z"></path>
                                    <path d="M6.83618 8.54554C8.4624 8.54554 9.7807 7.22723 9.7807 5.60102C9.7807 3.9748 8.4624 2.65649 6.83618 2.65649C5.20997 2.65649 3.89166 3.9748 3.89166 5.60102C3.89166 7.22723 5.20997 8.54554 6.83618 8.54554Z"></path>
                                </svg>
                                <b><?php echo esc_html($full_address) ?></b>
                            </div>
                        <?php elseif (!empty($hotel_location)): ?>
                            <div class="location">
                                <svg width="14" height="14" viewBox="0 0 14 14" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M6.83615 0C3.77766 0 1.28891 2.48879 1.28891 5.54892C1.28891 7.93837 4.6241 11.8351 6.05811 13.3994C6.25669 13.6175 6.54154 13.7411 6.83615 13.7411C7.13076 13.7411 7.41561 13.6175 7.6142 13.3994C9.04821 11.8351 12.3834 7.93833 12.3834 5.54892C12.3834 2.48879 9.89464 0 6.83615 0ZM7.31469 13.1243C7.18936 13.2594 7.02008 13.3342 6.83615 13.3342C6.65222 13.3342 6.48295 13.2594 6.35761 13.1243C4.95614 11.5959 1.69584 7.79515 1.69584 5.54896C1.69584 2.7134 4.00067 0.406933 6.83615 0.406933C9.67164 0.406933 11.9765 2.7134 11.9765 5.54896C11.9765 7.79515 8.71617 11.5959 7.31469 13.1243Z"></path>
                                    <path d="M6.83618 8.54554C8.4624 8.54554 9.7807 7.22723 9.7807 5.60102C9.7807 3.9748 8.4624 2.65649 6.83618 2.65649C5.20997 2.65649 3.89166 3.9748 3.89166 5.60102C3.89166 7.22723 5.20997 8.54554 6.83618 8.54554Z"></path>
                                </svg>
                                <?php
                                if (!empty($hotel_location) && !is_wp_error($hotel_location)) {
                                    // Find if there's a child term among the assigned ones
                                    $child_term  = null;
                                    $parent_term = null;

                                    foreach ($hotel_location as $term) {
                                        if ($term->parent == 0) {
                                            $parent_term = $term;  // save parent
                                        } else {
                                            $child_term = $term;  // save child (prioritize child)
                                            break;    // stop at first child
                                        }
                                    }

                                    if ($child_term) {
                                        // Show parent → child
                                        $parent = get_term($child_term->parent, 'hotel-location');
                                        if ($parent && !is_wp_error($parent)) {
                                            echo '<a href="' . esc_url(get_term_link($parent->term_id)) . '">'
                                                . esc_html($parent->name) . '</a> <i class="bi bi-arrow-right"></i> ';
                                        }
                                        echo '<a href="' . esc_url(get_term_link($child_term->term_id)) . '">'
                                            . esc_html($child_term->name) . '</a>';
                                    } elseif ($parent_term) {
                                        // Only parent assigned
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
                                    <path d="M4.22358 9H1.52534C1.07358 9 0.690381 8.85586 0.41792 8.5834C0.145459 8.31093 0.00131836 7.92597 0.00131836 7.47246C-0.000439453 5.51777 -0.000439453 3.75293 0.00131836 2.07597C0.00131836 1.62422 0.147217 1.24101 0.421436 0.970309C0.695654 0.699606 1.07886 0.555466 1.53237 0.555466H3.32534C3.54507 0.555466 3.72437 0.620505 3.84565 0.743552C3.95464 0.852536 4.01089 1.00371 4.00913 1.17949C4.00562 1.55215 3.74194 1.79121 3.33413 1.79297H1.5394C1.29331 1.79297 1.2353 1.85097 1.2353 2.10058V7.4584C1.2353 7.70625 1.29331 7.7625 1.54116 7.7625H6.89897C7.14683 7.7625 7.20483 7.70625 7.20483 7.45664V5.66367C7.20483 5.25586 7.44741 4.99043 7.82007 4.98867H7.82358C8.198 4.98867 8.44058 5.25058 8.44058 5.65664V5.82539C8.44233 6.37558 8.44233 6.94511 8.44058 7.5041C8.43882 7.93828 8.29292 8.31093 8.0187 8.58164C7.74448 8.85234 7.37183 8.99648 6.93589 8.99824H4.22358V9Z"></path>
                                    <path d="M3.89929 5.67422C3.69011 5.67422 3.48444 5.53535 3.38776 5.32969C3.26823 5.0748 3.31921 4.79883 3.52487 4.58965C3.78151 4.32949 4.04519 4.06758 4.30007 3.81445L4.57077 3.54551L5.4444 2.67715C5.91374 2.21133 6.38132 1.74551 6.8489 1.27793C6.85769 1.26914 6.86647 1.26035 6.87526 1.2498C6.5905 1.24453 5.97351 1.24102 5.63073 1.23926C5.43561 1.23926 5.27038 1.17598 5.15436 1.05645C5.04362 0.943945 4.98561 0.789258 4.98737 0.611719C4.99089 0.247852 5.24929 0.00351562 5.62897 0.00175781C6.09655 0 6.56061 0 7.02644 0C7.49929 0 7.93698 0 8.36589 0.00175781C8.74733 0.00175781 8.99519 0.246094 8.99694 0.622266C9.00046 1.5627 9.00046 2.49434 8.99694 3.39434C8.99519 3.75644 8.74206 4.01133 8.38171 4.01133C8.02136 4.01133 7.76823 3.7582 7.76472 3.39785C7.76296 3.21328 7.7612 2.92676 7.75944 2.64902C7.75769 2.44512 7.75769 2.25 7.75593 2.11992C7.74186 2.13223 7.72956 2.14453 7.71726 2.15684C7.44655 2.4293 7.17585 2.7 6.90515 2.97246C6.1071 3.77402 5.28269 4.60371 4.46706 5.41406C4.3405 5.53711 4.18229 5.62324 4.01179 5.66367C3.97312 5.6707 3.9362 5.67422 3.89929 5.67422Z"></path>
                                </svg>
                            </a>
                        <?php endif ?>
                    </div>
                </div>
            </div>
        </div>

        <div class="hotel-dt-gallery-section mb-100">
            <div class="container">
                <div class="room-img-group">
                    <?php if (!empty($gallery_images)): ?>
                        <div class="row g-2">
                            <div class="col-lg-6">
                                <div class="gallery-img-wrap">
                                    <div class="swiper hotel-dt-gallery-slider">
                                        <div class="swiper-wrapper">
                                            <?php if (has_post_thumbnail()): ?>
                                                <div class="swiper-slide">
                                                    <?php the_post_thumbnail() ?>
                                                </div>
                                            <?php endif; ?>
                                            <?php foreach ((array) $image_ids as $image): ?>
                                                <div class="swiper-slide">
                                                    <img src="<?php echo esc_url(wp_get_attachment_url($image)) ?>" alt="<?php echo esc_attr__('image', 'gofly-core') ?>">
                                                </div>
                                            <?php endforeach; ?>
                                        </div>
                                        <?php if ($settings['gofly_hotel_featured_section_slider_navigation'] == 'yes'): ?>
                                            <div class="slider-btn-grp">
                                                <div class="slider-btn hotel-dt-gallery-slider-prev">
                                                    <svg width="12" height="12" viewBox="0 0 12 12" xmlns="http://www.w3.org/2000/svg">
                                                        <path
                                                            d="M4.84554 6.00254L9.33471 1.51317C9.45832 1.38985 9.52632 1.22498 9.52632 1.04917C9.52632 0.873268 9.45832 0.708488 9.33471 0.584976L8.94135 0.191805C8.81793 0.0680975 8.65295 0 8.47715 0C8.30134 0 8.13656 0.0680975 8.01305 0.191805L2.66798 5.53678C2.54398 5.66068 2.47608 5.82624 2.47657 6.00224C2.47608 6.17902 2.54388 6.34439 2.66798 6.46839L8.00808 11.8082C8.13159 11.9319 8.29637 12 8.47227 12C8.64808 12 8.81286 11.9319 8.93647 11.8082L9.32973 11.415C9.58564 11.1591 9.58564 10.7425 9.32973 10.4867L4.84554 6.00254Z" />
                                                    </svg>
                                                </div>
                                                <div class="slider-btn hotel-dt-gallery-slider-next">
                                                    <svg width="12" height="12" viewBox="0 0 12 12" xmlns="http://www.w3.org/2000/svg">
                                                        <path
                                                            d="M7.15446 6.00254L2.66529 1.51317C2.54168 1.38985 2.47368 1.22498 2.47368 1.04917C2.47368 0.873268 2.54168 0.708488 2.66529 0.584976L3.05865 0.191805C3.18207 0.0680975 3.34705 0 3.52285 0C3.69866 0 3.86344 0.0680975 3.98695 0.191805L9.33202 5.53678C9.45602 5.66068 9.52392 5.82624 9.52343 6.00224C9.52392 6.17902 9.45612 6.34439 9.33202 6.46839L3.99192 11.8082C3.86841 11.9319 3.70363 12 3.52773 12C3.35192 12 3.18714 11.9319 3.06353 11.8082L2.67027 11.415C2.41436 11.1591 2.41436 10.7425 2.67027 10.4867L7.15446 6.00254Z" />
                                                    </svg>
                                                </div>
                                            </div>
                                        <?php endif; ?>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="row g-2">
                                    <?php
                                    if ($length >= 3) {
                                        $last_three = array_slice($image_ids, -3);
                                        $first_two  = array_slice($last_three, 0, 2);
                                        $last_one   = $last_three[2];

                                        foreach ((array) $first_two as $image) { ?>
                                            <div class="col-6">
                                                <div class="gallery-img-wrap">
                                                    <a data-fancybox="gallery-01" href="<?php echo esc_url(wp_get_attachment_url($image)) ?>">
                                                        <img src="<?php echo esc_url(wp_get_attachment_url($image)) ?>" alt="<?php echo esc_attr("image") ?>">
                                                    </a>
                                                </div>
                                            </div>
                                        <?php
                                        };
                                        ?>
                                        <?php if ($video_on == true && !empty($video_poster)): ?>
                                            <div class="col-6">
                                                <div class="gallery-img-wrap two active">
                                                    <img src="<?php echo esc_url($video_poster) ?>" alt="<?php echo esc_attr("image") ?>">
                                                    <a data-fancybox="gallery-01" href="<?php echo esc_url($video_link) ?>"><i class="bi bi-play-circle"></i> <?php echo esc_html($video_btn) ?></a>
                                                </div>
                                            </div>
                                        <?php endif; ?>
                                        <div class="col-6">
                                            <div class="gallery-img-wrap two active">
                                                <img src="<?php echo esc_url(wp_get_attachment_url($last_one)) ?>" alt="<?php echo esc_attr("image") ?>">
                                                <button class="StartSlideShowFirstImage"><i class="bi bi-plus-lg"></i> <?php echo esc_html($gallery_btn) ?></button>
                                            </div>
                                        </div>
                                    <?php
                                    } else {
                                    ?>
                                        <?php
                                        $last_three = array_slice($image_ids, -3);
                                        foreach ((array) $last_three as $image) {
                                        ?>
                                            <div class="col-6">
                                                <div class="gallery-img-wrap">
                                                    <a data-fancybox="gallery-01" href="<?php echo esc_url(wp_get_attachment_url($image)) ?>">
                                                        <img src="<?php echo esc_url(wp_get_attachment_url($image)) ?>" alt="<?php echo esc_attr("image") ?>">
                                                    </a>
                                                </div>
                                            </div>
                                    <?php
                                        };
                                    }
                                    ?>
                                </div>
                            </div>
                        </div>
                    <?php else: ?>
                        <?php the_post_thumbnail() ?>
                    <?php endif; ?>
                </div>
            </div>
        </div>
        <div class="others-image-wrap d-none">
            <?php if (has_post_thumbnail()): ?>
                <a href="<?php echo esc_url(get_the_post_thumbnail_url()) ?>" data-fancybox="images"></a>
            <?php endif; ?>
            <?php foreach ((array) $image_ids as $image) { ?>
                <a href="<?php echo esc_url(wp_get_attachment_url($image)) ?>" data-fancybox="images"></a>
            <?php } ?>
        </div>

<?php

    }
}

Plugin::instance()->widgets_manager->register(new Gofly_Featured_Hotel_Widget());
