<?php

namespace Elementor;

if (!defined('ABSPATH')) exit;  // Exit if accessed directly

use Egns_Core;
use Elementor\core\Schemes;
use Egns_Core\Egns_Helper;

class Gofly_Tour_Sub_Location_Widget extends Widget_Base
{

    public function get_name()
    {
        return 'gofly_tour_sub_location';
    }

    public function get_title()
    {
        return esc_html__('EG Tour Sub-location', 'gofly-core');
    }

    public function get_icon()
    {
        return 'egns-widget-icon';
    }

    public function get_categories()
    {
        return ['gofly_tour'];
    }

    protected function register_controls()
    {

        //===================== Content =======================//

        $this->start_controls_section(
            'gofly_tour_subloc_content_section',
            [
                'label' => esc_html__('Content', 'gofly-core')
            ]
        );
        $this->add_control(
            'tour_custom_panel_notice',
            [
                'type'        => \Elementor\Controls_Manager::NOTICE,
                'notice_type' => 'warning',
                'dismissible' => true,
                'heading'     => esc_html__('Notice', 'gofly-core'),
                'content'     => esc_html__('This Widgets only for custom post "Tour" details page.', 'gofly-core'),
            ]
        );

        $this->end_controls_section();


        //===================== Content Style =======================//

        $this->start_controls_section(
            'gofly_tour_subloc_style_section',
            [
                'label' => esc_html__('General', 'gofly-core'),
                'tab'   => \Elementor\Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_control(
            'gofly_tour_subloc_style_section_location_title',
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
                'name'     => 'gofly_tour_subloc_style_section_location_title_typ',
                'selector' => '{{WRAPPER}} .location-card .location-content h6 a',

            ]
        );

        $this->add_control(
            'gofly_tour_subloc_style_section_location_title_color',
            [
                'label'     => esc_html__('Color', 'gofly-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .location-card .location-content h6 a' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'gofly_tour_subloc_style_section_location_hover_title',
            [
                'label'     => esc_html__('Hover Color', 'gofly-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .location-card .location-content h6 a:hover' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'gofly_tour_subloc_style_section_location_day',
            [
                'label'     => esc_html__('Location Day', 'gofly-core'),
                'type'      => \Elementor\Controls_Manager::HEADING,
                'separator' => 'after',
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'label'    => esc_html__('Typography', 'gofly-core'),
                'name'     => 'gofly_tour_subloc_style_section_location_day_typ',
                'selector' => '{{WRAPPER}} .location-card .location-content span',

            ]
        );

        $this->add_control(
            'gofly_tour_subloc_style_section_location_day_color',
            [
                'label'     => esc_html__('Color', 'gofly-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .location-card .location-content span' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'gofly_tour_subloc_style_section_location_modal_title',
            [
                'label'     => esc_html__('Modal Title', 'gofly-core'),
                'type'      => \Elementor\Controls_Manager::HEADING,
                'separator' => 'after',
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'label'    => esc_html__('Typography', 'gofly-core'),
                'name'     => 'gofly_tour_subloc_style_section_location_modal_title_typ',
                'selector' => '{{WRAPPER}} .modal-title',

            ]
        );

        $this->add_control(
            'gofly_tour_subloc_style_section_location_modal_title_color',
            [
                'label'     => esc_html__('Color', 'gofly-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .modal-title' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'gofly_tour_subloc_style_section_location_modal_close_button',
            [
                'label'     => esc_html__('Modal Close Button', 'gofly-core'),
                'type'      => \Elementor\Controls_Manager::HEADING,
                'separator' => 'after',
            ]
        );

        $this->add_control(
            'gofly_tour_subloc_style_section_location_modal_close_button_icon_color',
            [
                'label'     => esc_html__('Icon Color', 'gofly-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .location-details-modal .modal-dialog .modal-content .close-btn svg' => 'fill: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'gofly_tour_subloc_style_section_location_modal_close_button_icon_hover_color',
            [
                'label'     => esc_html__('Icon Hover Color', 'gofly-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .location-details-modal .modal-dialog .modal-content .close-btn:hover svg' => 'fill: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'gofly_tour_subloc_style_section_location_modal_close_button_icon_bg_color',
            [
                'label'     => esc_html__('Background Color', 'gofly-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .location-details-modal .modal-dialog .modal-content .close-btn' => 'background-color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'gofly_tour_subloc_style_section_location_modal_close_button_icon_hover_bg_color',
            [
                'label'     => esc_html__('Hover Background Color', 'gofly-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .location-details-modal .modal-dialog .modal-content .close-btn:hover' => 'background-color: {{VALUE}};',
                ],
            ]
        );


        $this->add_control(
            'gofly_tour_subloc_style_section_location_modal_tab',
            [
                'label'     => esc_html__('Tab', 'gofly-core'),
                'type'      => \Elementor\Controls_Manager::HEADING,
                'separator' => 'before',
            ]
        );


        $this->add_control(
            'gofly_tour_subloc_style_section_location_modal_tab_title_active',
            [
                'label'     => esc_html__('Tab Title ( Active )', 'gofly-core'),
                'type'      => \Elementor\Controls_Manager::HEADING,
                'separator' => 'after',
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'label'    => esc_html__('Typography', 'gofly-core'),
                'name'     => 'gofly_tour_subloc_style_section_location_modal_tab_title_active_typ',
                'selector' => '{{WRAPPER}} .location-details-modal .modal-dialog .modal-content .modal-body .nav-pills .nav-item .nav-link.active',

            ]
        );


        $this->add_control(
            'gofly_tour_subloc_style_section_location_modal_tab_title_active_color',
            [
                'label'     => esc_html__('Color', 'gofly-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .location-details-modal .modal-dialog .modal-content .modal-body .nav-pills .nav-item .nav-link.active' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'gofly_tour_subloc_style_section_location_modal_tab_title_active_icon_color',
            [
                'label'     => esc_html__('Icon Color', 'gofly-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .location-details-modal .modal-dialog .modal-content .modal-body .nav-pills .nav-item .nav-link.active svg' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'gofly_tour_subloc_style_section_location_modal_tab_title_active_bg_color',
            [
                'label'     => esc_html__('Background Color', 'gofly-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .location-details-modal .modal-dialog .modal-content .modal-body .nav-pills .nav-item .nav-link.active' => 'background-color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'gofly_tour_subloc_style_section_location_modal_tab_title_inactive',
            [
                'label'     => esc_html__('Tab Title ( Inactive )', 'gofly-core'),
                'type'      => \Elementor\Controls_Manager::HEADING,
                'separator' => 'after',
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'label'    => esc_html__('Typography', 'gofly-core'),
                'name'     => 'gofly_tour_subloc_style_section_location_modal_tab_title_inactive_typ',
                'selector' => '{{WRAPPER}} .location-details-modal .modal-dialog .modal-content .modal-body .nav-pills .nav-item .nav-link',

            ]
        );

        $this->add_control(
            'gofly_tour_subloc_style_section_location_modal_tab_title_inactive_color',
            [
                'label'     => esc_html__('Color', 'gofly-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .location-details-modal .modal-dialog .modal-content .modal-body .nav-pills .nav-item .nav-link' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'gofly_tour_subloc_style_section_location_modal_tab_title_inactive_hover_color',
            [
                'label'     => esc_html__('Hover Color', 'gofly-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .location-details-modal .modal-dialog .modal-content .modal-body .nav-pills .nav-item .nav-link:hover' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'gofly_tour_subloc_style_section_location_modal_tab_title_inactive_icon_color',
            [
                'label'     => esc_html__('Icon Color', 'gofly-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .location-details-modal .modal-dialog .modal-content .modal-body .nav-pills .nav-item .nav-link svg' => 'fill: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'gofly_tour_subloc_style_section_location_modal_tab_title_inactive_icon_hover_color',
            [
                'label'     => esc_html__('Hover Icon Color', 'gofly-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .location-details-modal .modal-dialog .modal-content .modal-body .nav-pills .nav-item .nav-link svg' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'gofly_tour_subloc_style_section_location_modal_tab_title_inactive_bg_color',
            [
                'label'     => esc_html__('Background Color', 'gofly-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .location-details-modal .modal-dialog .modal-content .modal-body .nav-pills .nav-item .nav-link' => 'background-color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'gofly_tour_subloc_style_section_location_modal_tab_title_inactive_hover_bg_color',
            [
                'label'     => esc_html__('Hover Background Color', 'gofly-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .location-details-modal .modal-dialog .modal-content .modal-body .nav-pills .nav-item .nav-link:hover' => 'background-color: {{VALUE}};',
                ],
            ]
        );

        $this->end_controls_section();


        $this->start_controls_section(
            'gofly_tour_subloc_style_tour_activities',
            [
                'label' => esc_html__('Tour Activities', 'gofly-core'),
                'tab'   => \Elementor\Controls_Manager::TAB_STYLE,
            ]
        );



        $this->end_controls_section();
    }
    protected function render()
    {

        $settings = $this->get_settings_for_display();

        $id = get_the_ID();

        $location_list = Egns_Helper::egns_get_tour_value('tour_sub_location_list');

?>
        <?php if (is_admin()): ?>
            <script>
                var swiper = new Swiper(".package-dt-location-slider", {
                    slidesPerView: 1,
                    speed: 1500,
                    spaceBetween: 24,
                    autoplay: {
                        delay: 2500,
                        pauseOnMouseEnter: true,
                        disableOnInteraction: false,
                    },
                    navigation: {
                        nextEl: ".location-slider-next",
                        prevEl: ".location-slider-prev",
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
                            slidesPerView: 2,
                        },
                        768: {
                            slidesPerView: 3,
                        },
                        992: {
                            slidesPerView: 3,
                            spaceBetween: 15,
                        },
                        1200: {
                            slidesPerView: 3,
                            spaceBetween: 15,
                        },
                        1400: {
                            slidesPerView: 3,
                        },
                    },
                });
            </script>
        <?php endif; ?>

        <div class="location-slider-wrap">
            <div class="location-slider-area">
                <div class="swiper package-dt-location-slider">
                    <div class="swiper-wrapper">
                        <?php foreach ($location_list as $key => $location): ?>
                            <div class="swiper-slide">
                                <div class="location-card">
                                    <a href="#" class="location-img" data-bs-toggle="modal" data-bs-target="#packageLocationModal<?php echo esc_attr($key) ?>">
                                        <img src="<?php echo esc_url($location['tour_sub_location_img']['url']) ?>" alt="<?php echo esc_html__('image', 'gofly-core') ?>">
                                    </a>
                                    <div class="location-content">
                                        <h6>
                                            <a href="#" data-bs-toggle="modal" data-bs-target="#packageLocationModal<?php echo esc_attr($key) ?>"><?php echo esc_html($location['tour_sub_location_name']) ?></a>
                                        </h6>
                                        <span>(<?php echo esc_html($location['tour_sub_location_duration']) ?>)</span>
                                    </div>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    </div>
                </div>
                <div class="slider-btn-grp two">
                    <div class="slider-btn location-slider-prev">
                        <svg width="12" height="14" viewBox="0 0 12 14"
                            xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M10.3125 0.704152C10.4758 0.323658 10.9172 0.147472 11.2979 0.310597C11.6784 0.473872 11.8545 0.915329 11.6914 1.29595C10.8482 3.26297 9.18494 4.61712 7.42871 5.59282C6.36908 6.1815 5.24241 6.64833 4.18848 7.03618C5.31592 7.51881 6.52685 8.12012 7.6416 8.79693C8.54322 9.34436 9.39912 9.95095 10.1025 10.5958C10.7986 11.2338 11.3891 11.9489 11.6982 12.7217C11.852 13.1063 11.6648 13.5425 11.2803 13.6963C10.8957 13.85 10.4595 13.6629 10.3057 13.2784C10.1148 12.8013 9.70522 12.2662 9.08887 11.7012C8.47993 11.1431 7.71047 10.5931 6.8623 10.0782C5.16463 9.04752 3.21635 8.19586 1.76465 7.71196L-0.370117 7.00005L1.76465 6.28814C3.27361 5.78515 5.08312 5.18062 6.7002 4.28228C8.31881 3.38305 9.6556 2.23687 10.3125 0.704152Z" />
                        </svg>
                    </div>
                    <div class="slider-btn location-slider-next">
                        <svg width="12" height="14" viewBox="0 0 12 14"
                            xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M0.719771 13.6962C1.10432 13.85 1.54057 13.6628 1.69438 13.2783C1.88527 12.8012 2.29482 12.2661 2.91118 11.7011C3.52012 11.1429 4.28957 10.593 5.13774 10.0781C6.83541 9.04741 8.78369 8.19576 10.2354 7.71186L12.3702 6.99995L10.2354 6.28803C8.72643 5.78505 6.91691 5.18052 5.29985 4.28218C3.68124 3.38295 2.34442 2.23677 1.68754 0.70405C1.52426 0.323573 1.0828 0.147379 0.702193 0.310495C0.321714 0.473783 0.145522 0.915242 0.308638 1.29585C1.15178 3.26288 2.81511 4.61702 4.57133 5.59272C5.63078 6.1813 6.75681 6.64924 7.81059 7.03706C6.68348 7.5196 5.4728 8.12025 4.35844 8.79682C3.45684 9.34426 2.60092 9.95086 1.89751 10.5957C1.20147 11.2337 0.610934 11.9488 0.301802 12.7216C0.148089 13.1062 0.33524 13.5424 0.719771 13.6962Z" />
                        </svg>
                    </div>
                </div>
            </div>
        </div>

        <?php
        foreach ($location_list as $key => $location):
            $uniqID = uniqid();
        ?>
            <div class="modal location-details-modal fade" id="packageLocationModal<?php echo esc_attr($key) ?>" tabindex="-1" aria-labelledby="packageLocationModal<?php echo esc_attr($key) ?>Label" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                        <button type="button" class="close-btn" data-bs-dismiss="modal" aria-label="Close">
                            <svg width="10" height="10" viewBox="0 0 10 10" xmlns="http://www.w3.org/2000/svg">
                                <path
                                    d="M2.00247 0.500545C1.79016 0.505525 1.58918 0.582706 1.4362 0.735547L0.694403 1.479C0.345704 1.82743 0.389689 2.43243 0.79164 2.83493L3.00694 5.05341L0.79164 7.27092C0.389689 7.67328 0.345566 8.27842 0.694403 8.62753L1.4362 9.37044C1.7849 9.71872 2.38879 9.67543 2.7913 9.27293L5.00659 7.05473L7.22189 9.27293C7.62467 9.67543 8.22898 9.71872 8.57699 9.37044L9.31989 8.62753C9.6679 8.27856 9.62461 7.67342 9.22182 7.27092L7.00653 5.05341L9.22182 2.83493C9.62461 2.43243 9.6679 1.82743 9.31989 1.479L8.57699 0.735547C8.22898 0.386433 7.62467 0.430557 7.22189 0.833614L5.00659 3.05126L2.7913 0.833753C2.56515 0.606635 2.27482 0.493906 2.00247 0.500545Z" />
                            </svg>
                        </button>
                        <div class="modal-header">
                            <h4 class="modal-title" id="packageLocationModal<?php echo esc_attr($key) ?>Label"><?php echo esc_html($location['tour_sub_location_name'] . ' : ' . $location['tour_sub_location_duration']) ?></h4>
                        </div>
                        <div class="modal-body">
                            <ul class="nav nav-pills" id="pills-tab<?php echo esc_attr($uniqID) ?>" role="tablist">
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link active" id="pills-activities<?php echo esc_attr($key) ?>-tab" data-bs-toggle="pill" data-bs-target="#pills-activities<?php echo esc_attr($key) ?>" type="button" role="tab" aria-controls="pills-activities<?php echo esc_attr($key) ?>" aria-selected="true">
                                        <svg width="16" height="16" viewBox="0 0 16 16" xmlns="http://www.w3.org/2000/svg">
                                            <g>
                                                <path fill-rule="evenodd" clip-rule="evenodd"
                                                    d="M7.99978 15.1112C2.14378 15.1112 0.888672 13.8561 0.888672 8.00006C0.888672 2.14406 2.14378 0.888947 7.99978 0.888947C13.8558 0.888947 15.1109 2.14406 15.1109 8.00006C15.1109 13.8561 13.8558 15.1112 7.99978 15.1112ZM10.0005 4.7515C9.94844 4.65679 9.87145 4.57812 9.77789 4.52402C9.68432 4.46991 9.57773 4.44243 9.46967 4.44455C9.36161 4.44667 9.25618 4.47831 9.16481 4.53604C9.07344 4.59378 8.9996 4.6754 8.95128 4.77209L6.49334 9.68795L5.40795 7.7145C5.35682 7.62152 5.28165 7.54398 5.19032 7.48997C5.09898 7.43597 4.99481 7.40747 4.8887 7.40747H3.85167C3.52439 7.40747 3.25909 7.67278 3.25909 8.00006C3.25909 8.32734 3.52439 8.59264 3.85167 8.59264H4.53834L5.99912 11.2486C6.05121 11.3433 6.1282 11.4219 6.22177 11.476C6.31534 11.5301 6.42192 11.5576 6.52998 11.5555C6.63804 11.5534 6.74346 11.5218 6.83483 11.464C6.9262 11.4063 7.00005 11.3247 7.04837 11.228L9.50631 6.3122L10.5917 8.28564C10.6428 8.37862 10.718 8.45617 10.8093 8.51018C10.9007 8.56418 11.0048 8.59267 11.1109 8.59267H12.148C12.4752 8.59267 12.7405 8.32736 12.7405 8.00009C12.7405 7.67281 12.4752 7.4075 12.148 7.4075H11.4613L10.0005 4.7515Z" />
                                            </g>
                                        </svg>
                                        <?php echo esc_html__('Tour Activities', 'gofly-core') ?>
                                    </button>
                                </li>
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link" id="pills-accommodation<?php echo esc_attr($key) ?>-tab" data-bs-toggle="pill" data-bs-target="#pills-accommodation<?php echo esc_attr($key) ?>" type="button" role="tab" aria-controls="pills-accommodation<?php echo esc_attr($key) ?>" aria-selected="false">
                                        <svg width="16" height="16" viewBox="0 0 16 16" xmlns="http://www.w3.org/2000/svg">
                                            <path
                                                d="M9.82319 1.65145L9.10418 2.3548L9.27418 3.34814C9.30165 3.51015 9.17758 3.65982 9.01118 3.65982C8.92088 3.65982 8.96778 3.67185 7.99883 3.16048L7.11082 3.62915C6.91581 3.73208 6.68654 3.56621 6.72348 3.34814L6.89348 2.3548L6.17447 1.65145C6.0162 1.49678 6.10487 1.22858 6.32247 1.19678L7.31515 1.05211L7.75949 0.148765C7.85716 -0.0494382 8.14036 -0.0497382 8.23817 0.148765L8.6825 1.05211L9.67519 1.19678C9.89319 1.22865 9.98112 1.49712 9.82319 1.65145ZM5.21629 3.01617L5.18479 2.8325C5.30809 2.7123 5.44626 2.61543 5.38569 2.42906C5.32516 2.2428 5.15519 2.24536 4.98602 2.22076L4.90355 2.05366C4.80595 1.85586 4.52298 1.85572 4.42528 2.05366L4.34281 2.22076C4.17241 2.24553 4.00367 2.24266 3.94314 2.42906C3.8826 2.61533 4.02164 2.71317 4.14404 2.8325L4.11254 3.01617C4.07527 3.23354 4.30407 3.39998 4.49948 3.29728L4.66438 3.21054C4.83322 3.29934 4.87005 3.32791 4.95335 3.32791C5.11789 3.32791 5.24435 3.17971 5.21629 3.01617ZM2.88292 4.34953L2.85142 4.16586C2.97472 4.04565 3.11289 3.94879 3.05232 3.76242C2.99179 3.57615 2.82182 3.57871 2.65265 3.55411L2.57018 3.38701C2.47258 3.18921 2.18961 3.18908 2.09191 3.38701L2.00944 3.55411C1.83904 3.57888 1.6703 3.57601 1.60977 3.76242C1.54923 3.94869 1.68827 4.04652 1.81067 4.16586L1.77917 4.34953C1.7419 4.5669 1.97071 4.73333 2.16611 4.63063L2.33101 4.5439C2.49985 4.6327 2.53668 4.66126 2.61998 4.66126C2.78452 4.66126 2.91099 4.51306 2.88292 4.34953ZM11.885 3.01617L11.8535 2.8325C11.9768 2.7123 12.115 2.61543 12.0544 2.42906C11.9939 2.2428 11.8239 2.24536 11.6547 2.22076C11.5785 2.06626 11.5291 1.90502 11.3332 1.90502C11.1373 1.90502 11.0872 2.06746 11.0116 2.22076L10.8272 2.24756C10.6089 2.2793 10.5213 2.54837 10.6794 2.70244L10.8128 2.8325C10.7837 3.00231 10.7288 3.16181 10.8874 3.27698C11.0458 3.39211 11.1818 3.29011 11.3332 3.21054C11.502 3.29934 11.5388 3.32791 11.6221 3.32791C11.7866 3.32791 11.9131 3.17971 11.885 3.01617ZM14.2184 4.34953L14.1869 4.16586C14.3102 4.04565 14.4484 3.94879 14.3878 3.76242C14.3273 3.57615 14.1573 3.57871 13.9881 3.55411C13.9119 3.39961 13.8625 3.23838 13.6665 3.23838C13.4707 3.23838 13.4206 3.40081 13.3449 3.55411L13.1605 3.58091C12.9423 3.61265 12.8547 3.88172 13.0127 4.03579L13.1462 4.16586C13.117 4.33566 13.0622 4.49516 13.2208 4.61033C13.3792 4.72546 13.5152 4.62346 13.6665 4.5439C13.8354 4.6327 13.8722 4.66126 13.9555 4.66126C14.12 4.66126 14.2464 4.51306 14.2184 4.34953ZM4.07074 15.7257C4.0753 15.8759 3.95447 16 3.80417 16H2.39871C1.80961 16 1.33203 15.5224 1.33203 14.9333V9.5999C1.33203 9.01079 1.80961 8.53322 2.39871 8.53322H3.79873C3.946 8.53322 4.0654 8.65289 4.0654 8.80016C4.0651 13.8222 4.0567 15.2656 4.07074 15.7257ZM3.16539 11.1999C3.16539 11.1292 3.1373 11.0614 3.08729 11.0114C3.03727 10.9614 2.96945 10.9333 2.89872 10.9333C2.828 10.9333 2.76017 10.9614 2.71016 11.0114C2.66015 11.0614 2.63205 11.1292 2.63205 11.1999V12.3333C2.63205 12.404 2.66015 12.4718 2.71016 12.5218C2.76017 12.5719 2.828 12.5999 2.89872 12.5999C2.96945 12.5999 3.03727 12.5719 3.08729 12.5218C3.1373 12.4718 3.16539 12.404 3.16539 12.3333V11.1999ZM14.6656 9.5999V14.9333C14.6656 15.5224 14.188 16 13.5989 16H12.1937C12.0434 16 11.9225 15.8759 11.9271 15.7257C11.9412 15.2664 11.9325 13.8251 11.9322 8.80016C11.9322 8.65289 12.0516 8.53322 12.1989 8.53322H13.5989C14.188 8.53322 14.6656 9.01079 14.6656 9.5999ZM13.3655 11.1999C13.3655 11.1292 13.3374 11.0614 13.2874 11.0114C13.2374 10.9614 13.1696 10.9333 13.0989 10.9333C13.0281 10.9333 12.9603 10.9614 12.9103 11.0114C12.8603 11.0614 12.8322 11.1292 12.8322 11.1999V12.3333C12.8322 12.404 12.8603 12.4718 12.9103 12.5218C12.9603 12.5719 13.0281 12.5999 13.0989 12.5999C13.1696 12.5999 13.2374 12.5719 13.2874 12.5218C13.3374 12.4718 13.3655 12.404 13.3655 12.3333V11.1999ZM7.33212 16H8.66547C8.7362 16 8.80403 15.9719 8.85404 15.9219C8.90405 15.8719 8.93214 15.8041 8.93214 15.7333V13.2333C8.93214 13.1626 8.90405 13.0947 8.85404 13.0447C8.80403 12.9947 8.7362 12.9666 8.66547 12.9666H7.33212C7.26139 12.9666 7.19356 12.9947 7.14355 13.0447C7.09354 13.0947 7.06545 13.1626 7.06545 13.2333V15.7333C7.06545 15.8041 7.09354 15.8719 7.14355 15.9219C7.19356 15.9719 7.26139 16 7.33212 16ZM11.3988 5.79985V15.7333C11.3988 15.8041 11.3707 15.8719 11.3207 15.9219C11.2707 15.9719 11.2029 16 11.1322 16H9.73215C9.66143 16 9.5936 15.9719 9.54359 15.9219C9.49358 15.8719 9.46548 15.8041 9.46548 15.7333V12.6999C9.46548 12.6292 9.43739 12.5614 9.38738 12.5114C9.33737 12.4614 9.26954 12.4333 9.19881 12.4333H6.79878C6.72805 12.4333 6.66022 12.4614 6.61021 12.5114C6.5602 12.5614 6.53211 12.6292 6.53211 12.6999V15.7333C6.53211 15.8041 6.50401 15.8719 6.454 15.9219C6.40399 15.9719 6.33616 16 6.26544 16H4.86542C4.79469 16 4.72686 15.9719 4.67685 15.9219C4.62684 15.8719 4.59875 15.8041 4.59875 15.7333V5.79985C4.59875 5.21074 5.07632 4.73316 5.66543 4.73316H10.3322C10.9213 4.73316 11.3988 5.21074 11.3988 5.79985ZM9.33215 10.2666C9.33215 10.1959 9.30405 10.128 9.25404 10.078C9.20403 10.028 9.1362 9.99991 9.06548 9.99991H6.93211C6.86139 9.99991 6.79356 10.028 6.74355 10.078C6.69354 10.128 6.66544 10.1959 6.66544 10.2666C6.66544 10.3373 6.69354 10.4051 6.74355 10.4551C6.79356 10.5052 6.86139 10.5332 6.93211 10.5332H9.06548C9.1362 10.5332 9.20403 10.5052 9.25404 10.4551C9.30405 10.4051 9.33215 10.3373 9.33215 10.2666ZM9.79882 7.69987C9.79882 7.62915 9.77073 7.56132 9.72072 7.51131C9.6707 7.4613 9.60288 7.4332 9.53215 7.4332H6.46544C6.39471 7.4332 6.32689 7.4613 6.27687 7.51131C6.22686 7.56132 6.19877 7.62915 6.19877 7.69987C6.19877 7.7706 6.22686 7.83843 6.27687 7.88844C6.32689 7.93845 6.39471 7.96655 6.46544 7.96655H9.53215C9.60288 7.96655 9.6707 7.93845 9.72072 7.88844C9.77073 7.83843 9.79882 7.7706 9.79882 7.69987Z" />
                                        </svg>
                                        <?php echo esc_html__('Accommodation', 'gofly-core') ?>
                                    </button>
                                </li>
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link" id="pills-transport<?php echo esc_attr($key) ?>-tab" data-bs-toggle="pill" data-bs-target="#pills-transport<?php echo esc_attr($key) ?>" type="button" role="tab" aria-controls="pills-transport<?php echo esc_attr($key) ?>" aria-selected="false">
                                        <svg width="16" height="16" viewBox="0 0 16 16" xmlns="http://www.w3.org/2000/svg">
                                            <g>
                                                <path
                                                    d="M9.05095 0.435C8.47095 -0.145 7.53095 -0.145 6.95095 0.435L0.436953 6.95C-0.143047 7.53 -0.143047 8.469 0.436953 9.048L6.95295 15.564C7.53295 16.144 8.47195 16.144 9.05095 15.564L15.567 9.048C16.147 8.468 16.147 7.529 15.567 6.95L9.05095 0.435ZM10.494 5.197L11.508 6.303L8.75095 8.83V12H7.25095V8.83L4.49395 6.303L5.50795 5.197L8.00095 7.483L10.494 5.197Z" />
                                            </g>
                                        </svg>
                                        <?php echo esc_html__('Transport', 'gofly-core') ?>
                                    </button>
                                </li>
                            </ul>
                            <div class="tab-content" id="pills-tabContent<?php echo esc_attr($uniqID) ?>">
                                <div class="tab-pane fade show active" id="pills-activities<?php echo esc_attr($key) ?>" role="tabpanel" aria-labelledby="pills-activities<?php echo esc_attr($key) ?>-tab">
                                    <?php foreach ($location['tour_sngl_activity_list'] as $sngl_activity_list): ?>
                                        <div class="single-activity">
                                            <span class="title"><?php echo esc_html($sngl_activity_list['tour_sngl_duration_lbl']) ?></span>
                                            <div class="row g-4">
                                                <?php
                                                $destination_location_ids = $sngl_activity_list['tour_destination_location_select'];
                                                $terms                    = get_terms(array(
                                                    'taxonomy'   => 'destination-location',
                                                    'include'    => $destination_location_ids,
                                                    'orderby'    => 'include',
                                                    'hide_empty' => false,
                                                ));
                                                if (! empty($terms) && ! is_wp_error($terms)) {
                                                    foreach ($terms as $term) {
                                                        $meta      = get_term_meta($term->term_id, 'egns_taxonomy_location', true);
                                                        $thumb_url = ! empty($meta['destination_location_thumb']['url']) ? $meta['destination_location_thumb']['url'] : '';
                                                ?>
                                                        <div class="col-md-4 col-sm-6">
                                                            <div class="activity-card">
                                                                <?php if ($thumb_url): ?>
                                                                    <div class="activity-img">
                                                                        <img src="<?php echo esc_url($thumb_url); ?>" alt="<?php echo esc_attr($term->name); ?>">
                                                                    </div>
                                                                <?php endif; ?>
                                                                <div class="activity-content">
                                                                    <h6><?php echo esc_html($term->name); ?></h6>
                                                                    <?php if ($term->description): ?>
                                                                        <p><?php echo wp_kses_post($term->description); ?></p>
                                                                    <?php endif; ?>
                                                                </div>
                                                            </div>
                                                        </div>
                                                <?php
                                                    }
                                                }
                                                ?>
                                            </div>
                                        </div>
                                    <?php endforeach; ?>
                                </div>
                                <div class="tab-pane fade" id="pills-accommodation<?php echo esc_attr($key) ?>" role="tabpanel" aria-labelledby="pills-accommodation<?php echo esc_attr($key) ?>-tab">
                                    <div class="content-wrapper">
                                        <div class="accommodation-wrap">
                                            <div class="accommodation-img">
                                                <img src="<?php echo esc_url($location['tour_sub_location_accommodation_img']['url']) ?>" alt="<?php echo esc_html__('thumb', 'gofly-core') ?>">
                                            </div>
                                            <div class="accommodation-content">
                                                <h6><a href="<?php echo esc_url($location['tour_sub_location_accommodation_loc']['url']) ?>"><?php echo esc_html($location['tour_sub_location_accommodation_title']) ?></a></h6>
                                                <div class="rating-and-location-area">
                                                    <!--   <div class = "rating-area">
                                            <ul    class      = "rating-star">
                                            <li><i class      = "bi bi-star-fill"></i></li>
                                            <li><i class      = "bi bi-star-fill"></i></li>
                                            <li><i class      = "bi bi-star-fill"></i></li>
                                            <li><i class      = "bi bi-star-fill"></i></li>
                                            <li><i class      = "bi bi-star-fill"></i></li>
                                                        </ul>
                                                        <span>3,354 reviews</span>
                                                    </div> -->
                                                    <a href="<?php echo esc_url($location['tour_sub_location_accommodation_loc']['url']) ?>" class="location">
                                                        <svg width="14" height="14" viewBox="0 0 14 14"
                                                            xmlns="http://www.w3.org/2000/svg">
                                                            <path
                                                                d="M7 14C7 14 12.25 9.02475 12.25 5.25C12.25 3.85761 11.6969 2.52226 10.7123 1.53769C9.72774 0.553123 8.39239 0 7 0C5.60761 0 4.27226 0.553123 3.28769 1.53769C2.30312 2.52226 1.75 3.85761 1.75 5.25C1.75 9.02475 7 14 7 14ZM7 7.875C6.30381 7.875 5.63613 7.59844 5.14384 7.10616C4.65156 6.61387 4.375 5.94619 4.375 5.25C4.375 4.55381 4.65156 3.88613 5.14384 3.39384C5.63613 2.90156 6.30381 2.625 7 2.625C7.69619 2.625 8.36387 2.90156 8.85616 3.39384C9.34844 3.88613 9.625 4.55381 9.625 5.25C9.625 5.94619 9.34844 6.61387 8.85616 7.10616C8.36387 7.59844 7.69619 7.875 7 7.875Z" />
                                                        </svg>
                                                        <?php echo esc_html($location['tour_sub_location_accommodation_loc']['text']) ?>
                                                    </a>
                                                </div>
                                                <p><?php echo wp_kses_post($location['tour_sub_location_accommodation_desc']) ?></p>
                                                <ul>
                                                    <?php
                                                    $accommodation_feature_lst = $location['tour_sub_location_accommodation_feature'];
                                                    $accommodation_feature     = explode("\n", $accommodation_feature_lst);
                                                    foreach ($accommodation_feature as $feature) {
                                                    ?>
                                                        <li>
                                                            <svg width="14" height="14" viewBox="0 0 14 14"
                                                                xmlns="http://www.w3.org/2000/svg">
                                                                <rect width="14" height="14" rx="7" />
                                                                <path
                                                                    d="M10.6947 5.45771L6.24644 9.90835C6.17556 9.97683 6.08572 10.0123 5.99596 10.0123C5.9494 10.0124 5.90328 10.0033 5.86027 9.98542C5.81727 9.96757 5.77822 9.94138 5.7454 9.90835L3.3038 7.46675C3.16436 7.32963 3.16436 7.10515 3.3038 6.96571L4.16652 6.10059C4.29892 5.96827 4.53524 5.96827 4.66764 6.10059L5.99596 7.42891L9.33092 4.09155C9.36377 4.05862 9.40278 4.03249 9.44573 4.01465C9.48868 3.9968 9.53473 3.98759 9.58124 3.98755C9.67572 3.98755 9.76556 4.02539 9.83172 4.09155L10.6944 4.95675C10.8341 5.09619 10.8341 5.32067 10.6947 5.45771Z" />
                                                            </svg>
                                                            <?php echo esc_html($feature) ?>
                                                        </li>
                                                    <?php } ?>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="pills-transport<?php echo esc_attr($key) ?>" role="tabpanel" aria-labelledby="pills-transport<?php echo esc_attr($key) ?>-tab">
                                    <div class="content-wrapper">
                                        <div class="transport-wrap">
                                            <div class="title-area">
                                                <h6>
                                                    <svg width="18" height="18" viewBox="0 0 18 18"
                                                        xmlns="http://www.w3.org/2000/svg">
                                                        <g>
                                                            <path
                                                                d="M17.2591 5.37406C17.1808 5.37406 17.1003 5.38524 17.0201 5.40743L16.1117 5.65767L15.1684 3.35986C14.9013 2.70884 14.1113 2.17928 13.4076 2.17928H4.5797C3.87596 2.17928 3.08604 2.70884 2.81889 3.35986L1.87683 5.65454L0.979856 5.40743C0.902048 5.38564 0.821662 5.37442 0.740861 5.37406C0.311619 5.37406 0 5.70198 0 6.15388V6.68949C0 7.217 0.429089 7.64608 0.956592 7.64608H1.05929L0.907079 8.01694C0.658824 8.62181 0.456868 9.64567 0.456868 10.2994V14.8644C0.456868 15.3919 0.886034 15.821 1.41346 15.821H2.66285C3.19035 15.821 3.61944 15.3919 3.61944 14.8644V13.7243H14.368V14.8644C14.368 15.3919 14.7971 15.821 15.3246 15.821H16.5739C17.1014 15.821 17.5305 15.3919 17.5305 14.8644V10.2994C17.5305 9.64575 17.3286 8.62181 17.0802 8.01694L16.928 7.64608H17.0434C17.5708 7.64608 18 7.217 18 6.68949V6.15388C18 5.70198 17.6885 5.37406 17.2591 5.37406ZM2.56282 7.12646L3.98968 3.65082C4.14954 3.26145 4.6247 2.94287 5.0456 2.94287H12.9418C13.3627 2.94287 13.8379 3.26145 13.9977 3.65082L15.4245 7.12646C15.5844 7.51583 15.3708 7.83442 14.9499 7.83442H3.03752C2.61662 7.83442 2.40304 7.51583 2.56282 7.12646ZM5.74812 11.5227C5.74812 11.7331 5.57594 11.9053 5.36549 11.9053H2.65489C2.44444 11.9053 2.27225 11.7331 2.27225 11.5227V10.2218C2.27225 10.0113 2.44444 9.83913 2.65489 9.83913H5.36549C5.57594 9.83913 5.74812 10.0113 5.74812 10.2218V11.5227ZM15.6895 11.5227C15.6895 11.7331 15.5173 11.9053 15.3069 11.9053H12.5963C12.3859 11.9053 12.2137 11.7331 12.2137 11.5227V10.2218C12.2137 10.0113 12.3859 9.83913 12.5963 9.83913H15.3069C15.5173 9.83913 15.6895 10.0113 15.6895 10.2218V11.5227Z" />
                                                        </g>
                                                    </svg>
                                                    <?php echo esc_html($location['tour_sub_location_transport_title']) ?>
                                                </h6>
                                                <?php
                                                $transport_list = $location['tour_sub_location_transport_list'];
                                                $transport_arry = explode("\n", $transport_list);
                                                foreach ($transport_arry as $transport) {
                                                ?>
                                                    <span><?php echo wp_kses_post($transport) ?></span>
                                                <?php } ?>
                                            </div>
                                            <h6><?php echo esc_html($location['tour_sub_location_transport_facilities_title']) ?></h6>
                                            <ul>
                                                <?php
                                                $transport_facilities_list = $location['tour_sub_location_transport_facilities_list'];
                                                $facilities_list           = explode("\n", $transport_facilities_list);
                                                foreach ($facilities_list as $facilities) {
                                                ?><li>
                                                        <svg width="14" height="14" viewBox="0 0 14 14"
                                                            xmlns="http://www.w3.org/2000/svg">
                                                            <rect width="14" height="14" rx="7" />
                                                            <path
                                                                d="M10.6947 5.45771L6.24644 9.90835C6.17556 9.97683 6.08572 10.0123 5.99596 10.0123C5.9494 10.0124 5.90328 10.0033 5.86027 9.98542C5.81727 9.96757 5.77822 9.94138 5.7454 9.90835L3.3038 7.46675C3.16436 7.32963 3.16436 7.10515 3.3038 6.96571L4.16652 6.10059C4.29892 5.96827 4.53524 5.96827 4.66764 6.10059L5.99596 7.42891L9.33092 4.09155C9.36377 4.05862 9.40278 4.03249 9.44573 4.01465C9.48868 3.9968 9.53473 3.98759 9.58124 3.98755C9.67572 3.98755 9.76556 4.02539 9.83172 4.09155L10.6944 4.95675C10.8341 5.09619 10.8341 5.32067 10.6947 5.45771Z" />
                                                        </svg>
                                                        <?php echo wp_kses_post($facilities) ?>
                                                    </li>
                                                <?php } ?>

                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>


<?php

    }
}

Plugin::instance()->widgets_manager->register(new Gofly_Tour_Sub_Location_Widget());
