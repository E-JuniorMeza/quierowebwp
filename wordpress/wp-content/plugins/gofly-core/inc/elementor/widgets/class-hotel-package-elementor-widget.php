<?php

namespace Elementor;

if (!defined('ABSPATH')) exit;  // Exit if accessed directly

use Elementor\core\Schemes;
use Elementor\Group_Control_Typography;
use Egns_Core\Egns_Helper;

class Gofly_Hotel_Package_Widget extends Widget_Base
{

    public function get_name()
    {
        return 'gofly_hotel_package';
    }

    public function get_title()
    {
        return esc_html__('EG Hotel Package', 'gofly-core');
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
            'gofly_hotel_package_section',
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



        $this->end_controls_section();

        //============Style One Start=============//

        $this->start_controls_section(
            'gofly_hotel_package_styles',
            [
                'label' => esc_html__('Styles', 'gofly-core'),
                'tab'   => Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_control(
            'gofly_hotel_package_general_style',
            [
                'label'     => esc_html__('General', 'gofly-core'),
                'type'      => \Elementor\Controls_Manager::HEADING,
                'separator' => 'after',
            ]
        );

        $this->add_control(
            'gofly_hotel_package_general_area_bg',
            [
                'label'     => esc_html__('Background Color', 'gofly-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .hotel-details-page .hotel-details-wrapper .booking-area' => 'background-color: {{VALUE}};',

                ],
            ]
        );

        $this->add_control(
            'gofly_hotel_package_general_fields_border_color',
            [
                'label'     => esc_html__('Border Color', 'gofly-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .hotel-details-page .hotel-details-wrapper .booking-area .single-field'                               => 'border-color: {{VALUE}};',
                    '{{WRAPPER}} .hotel-details-page .hotel-details-wrapper .booking-area .hotel-room-list .accordion .accordion-item' => 'border-color: {{VALUE}};',

                ],
            ]
        );

        $this->add_responsive_control(
            'gofly_hotel_package_general_input_radius',
            [
                'label'      => esc_html__(
                    'Fields Border Radius',
                    'gofly-core'
                ),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%'],
                'selectors'  => [
                    '{{WRAPPER}} .hotel-details-page .hotel-details-wrapper .booking-area .single-field'                               => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                    '{{WRAPPER}} .hotel-details-page .hotel-details-wrapper .booking-area .hotel-room-list .accordion .accordion-item' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'
                ]
            ]
        );

        $this->add_control(
            'gofly_hotel_package_room_type_style',
            [
                'label'     => esc_html__('Package Type Content', 'gofly-core'),
                'type'      => \Elementor\Controls_Manager::HEADING,
                'separator' => 'after',
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'label'    => esc_html__('Room Type Title Typography', 'gofly-core'),
                'name'     => 'gofly_hotel_package_room_type_title_typ',
                'selector' => '{{WRAPPER}} .hotel-details-page .hotel-details-wrapper .booking-area .hotel-room-list .accordion .accordion-item .accordion-header .accordion-button .batch span',

            ]
        );

        $this->add_control(
            'gofly_hotel_package_room_type_color',
            [
                'label'     => esc_html__('Room Type Title Color', 'gofly-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .hotel-details-page .hotel-details-wrapper .booking-area .hotel-room-list .accordion .accordion-item .accordion-header .accordion-button .batch span' => 'color: {{VALUE}};',

                ],
            ]
        );

        $this->add_control(
            'gofly_hotel_package_room_type_title_bg',
            [
                'label'     => esc_html__('Room Type Title Background Color', 'gofly-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .hotel-details-page .hotel-details-wrapper .booking-area .hotel-room-list .accordion .accordion-item .accordion-header .accordion-button .batch span' => 'background-color: {{VALUE}};',

                ],
            ]
        );

        $this->add_control(
            'gofly_hotel_package_room_type_title_bg_2',
            [
                'label'     => esc_html__('Background Color Style 2', 'gofly-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .hotel-details-page .hotel-details-wrapper .booking-area .hotel-room-list .accordion .accordion-item:nth-child(2) .accordion-header .accordion-button .batch span' => 'background-color: {{VALUE}};',

                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'label'    => esc_html__('Package Type Title Typography', 'gofly-core'),
                'name'     => 'gofly_hotel_room_package_type_title_typ',
                'selector' => '{{WRAPPER}} .hotel-details-page .hotel-details-wrapper .booking-area .hotel-room-list .accordion .accordion-item .accordion-header .accordion-button .title-area h6',

            ]
        );

        $this->add_control(
            'gofly_hotel_room_package_type_title_color',
            [
                'label'     => esc_html__('Package Type Title Color', 'gofly-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .hotel-details-page .hotel-details-wrapper .booking-area .hotel-room-list .accordion .accordion-item .accordion-header .accordion-button .title-area h6' => 'color: {{VALUE}};',

                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'label'    => esc_html__('Package Type Price Typography', 'gofly-core'),
                'name'     => 'gofly_hotel_room_package_type_price_typ',
                'selector' => '{{WRAPPER}} .hotel-details-page .hotel-details-wrapper .booking-area .hotel-room-list .accordion .accordion-item .accordion-header .accordion-button > span',

            ]
        );

        $this->add_control(
            'gofly_hotel_room_package_type_price_color',
            [
                'label'     => esc_html__('Package Type Price Color', 'gofly-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .hotel-details-page .hotel-details-wrapper .booking-area .hotel-room-list .accordion .accordion-item .accordion-header .accordion-button > span' => 'color: {{VALUE}};',

                ],
            ]
        );

        $this->add_control(
            'gofly_hotel_room_package_type_color',
            [
                'label'     => esc_html__('Package Type Background Color', 'gofly-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .hotel-details-page .hotel-details-wrapper .booking-area .hotel-room-list .accordion .accordion-item .accordion-header .accordion-button' => 'background-color: {{VALUE}};',

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

        $hotel_package = Egns_Helper::egns_get_hotel_value('hotel_pricing_package');


?>
        <div class="hotel-details-page">
            <div class="hotel-details-wrapper">
                <div class="booking-area" id="scroll-section">
                    <form style="position: relative;">
                        <div class="row g-4 mb-50">
                            <div class="col-md-4 col-sm-6">
                                <div class="single-field date-field">
                                    <svg width="18" height="18" viewBox="0 0 18 18" xmlns="http://www.w3.org/2000/svg">
                                        <g>
                                            <path
                                                d="M16.125 1.28394H14.8913V2.43609C14.9509 2.57307 14.9755 2.72275 14.9629 2.87163C14.9502 3.0205 14.9007 3.16388 14.8188 3.28883C14.7368 3.41379 14.6251 3.51638 14.4936 3.58736C14.3622 3.65834 14.2151 3.69547 14.0657 3.6954C13.9163 3.69533 13.7692 3.65807 13.6378 3.58697C13.5064 3.51587 13.3948 3.41318 13.313 3.28815C13.2312 3.16312 13.1818 3.0197 13.1693 2.87081C13.1567 2.72193 13.1815 2.57227 13.2413 2.43534V1.28409H11.5136V2.43609C11.5733 2.57304 11.598 2.72272 11.5854 2.87159C11.5728 3.02047 11.5234 3.16388 11.4415 3.28887C11.3597 3.41386 11.248 3.5165 11.1165 3.58754C10.9851 3.65858 10.838 3.69577 10.6886 3.69577C10.5392 3.69577 10.3922 3.65858 10.2607 3.58754C10.1293 3.5165 10.0176 3.41386 9.93572 3.28887C9.85387 3.16388 9.80441 3.02047 9.79183 2.87159C9.77924 2.72272 9.80391 2.57304 9.86363 2.43609V1.28394H8.13638V2.43609C8.19609 2.57304 8.22076 2.72272 8.20818 2.87159C8.19559 3.02047 8.14613 3.16388 8.06428 3.28887C7.98242 3.41386 7.87073 3.5165 7.73929 3.58754C7.60784 3.65858 7.46079 3.69577 7.31138 3.69577C7.16197 3.69577 7.01491 3.65858 6.88346 3.58754C6.75202 3.5165 6.64033 3.41386 6.55848 3.28887C6.47662 3.16388 6.42716 3.02047 6.41457 2.87159C6.40199 2.72272 6.42666 2.57304 6.48638 2.43609V1.28394H4.75875V2.43519C4.81852 2.57212 4.84327 2.72178 4.83075 2.87066C4.81823 3.01955 4.76884 3.16297 4.68704 3.288C4.60524 3.41303 4.49359 3.51572 4.36219 3.58682C4.23078 3.65792 4.08373 3.69518 3.93432 3.69525C3.78491 3.69532 3.63784 3.65819 3.50636 3.58721C3.37489 3.51623 3.26315 3.41364 3.18124 3.28868C3.09932 3.16373 3.0498 3.02035 3.03715 2.87148C3.02449 2.7226 3.0491 2.57292 3.10875 2.43594V1.28394H1.875C1.37772 1.28394 0.900806 1.48148 0.549175 1.83311C0.197544 2.18474 0 2.66165 0 3.15894L0 16.0964C4.97191e-05 16.5937 0.19761 17.0706 0.54923 17.4222C0.90085 17.7738 1.37773 17.9714 1.875 17.9714H16.125C16.6223 17.9714 17.0992 17.7738 17.4508 17.4222C17.8024 17.0706 18 16.5937 18 16.0964V3.15894C18 2.66165 17.8025 2.18474 17.4508 1.83311C17.0992 1.48148 16.6223 1.28394 16.125 1.28394ZM17.25 15.9089C17.25 16.257 17.1117 16.5909 16.8656 16.837C16.6194 17.0832 16.2856 17.2214 15.9375 17.2214H2.0625C1.7144 17.2214 1.38056 17.0832 1.13442 16.837C0.888281 16.5909 0.75 16.257 0.75 15.9089V6.34644C0.75 5.99834 0.888281 5.6645 1.13442 5.41836C1.38056 5.17222 1.7144 5.03394 2.0625 5.03394H15.9375C16.2856 5.03394 16.6194 5.17222 16.8656 5.41836C17.1117 5.6645 17.25 5.99834 17.25 6.34644V15.9089Z" />
                                            <path
                                                d="M14.6287 0.591064C14.6287 0.280404 14.3769 0.0285645 14.0662 0.0285645C13.7556 0.0285645 13.5037 0.280404 13.5037 0.591064V2.84106C13.5037 3.15172 13.7556 3.40356 14.0662 3.40356C14.3769 3.40356 14.6287 3.15172 14.6287 2.84106V0.591064Z" />
                                            <path
                                                d="M11.2512 0.591064C11.2512 0.280404 10.9994 0.0285645 10.6887 0.0285645C10.3781 0.0285645 10.1262 0.280404 10.1262 0.591064V2.84106C10.1262 3.15172 10.3781 3.40356 10.6887 3.40356C10.9994 3.40356 11.2512 3.15172 11.2512 2.84106V0.591064Z" />
                                            <path
                                                d="M7.87378 0.591064C7.87378 0.280404 7.62194 0.0285645 7.31128 0.0285645C7.00062 0.0285645 6.74878 0.280404 6.74878 0.591064V2.84106C6.74878 3.15172 7.00062 3.40356 7.31128 3.40356C7.62194 3.40356 7.87378 3.15172 7.87378 2.84106V0.591064Z" />
                                            <path
                                                d="M4.49628 0.591064C4.49628 0.280404 4.24444 0.0285645 3.93378 0.0285645C3.62312 0.0285645 3.37128 0.280404 3.37128 0.591064V2.84106C3.37128 3.15172 3.62312 3.40356 3.93378 3.40356C4.24444 3.40356 4.49628 3.15172 4.49628 2.84106V0.591064Z" />
                                            <path
                                                d="M5.57379 12.859C5.57379 11.841 6.19393 11.266 6.94745 10.9237C6.31772 10.5738 5.93327 9.97518 5.93327 9.23362C5.93327 7.84346 7.14253 6.93768 9.03335 6.93768C10.665 6.93768 12.0754 7.71146 12.0754 9.2562C12.0754 10.0578 11.5991 10.5852 11.0117 10.8392C11.8151 11.133 12.4262 11.8054 12.4262 12.8442C12.4262 14.553 10.7024 15.3177 8.95704 15.3177C7.14785 15.3177 5.57379 14.5132 5.57379 12.859ZM10.4611 12.8062C10.4611 12.1583 10.0752 11.6429 8.99162 11.6429C7.89793 11.6429 7.50868 12.1281 7.50868 12.7625C7.50868 13.578 8.28429 13.9316 8.9993 13.9316C9.72377 13.9316 10.4611 13.636 10.4611 12.8062ZM7.83377 9.24273C7.83377 9.7755 8.13992 10.2237 9.04127 10.2237C9.88592 10.2237 10.171 9.82871 10.171 9.25623C10.171 8.62605 9.6497 8.29207 8.99612 8.29207C8.39034 8.29203 7.83377 8.57565 7.83377 9.24273Z" />
                                        </g>
                                    </svg>
                                    <div class="custom-select-dropdown">
                                        <input type="text" name="daterange" id="hotel-details-checkin" class="hotel-details-checkin" readonly value="June 16 - June 20">
                                        <div class="hotel-selected-date-checkin"></div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4 col-sm-6">
                                <div class="single-field date-field">
                                    <svg width="18" height="18" viewBox="0 0 18 18" xmlns="http://www.w3.org/2000/svg">
                                        <g>
                                            <path
                                                d="M16.125 1.28394H14.8913V2.43609C14.9509 2.57307 14.9755 2.72275 14.9629 2.87163C14.9502 3.0205 14.9007 3.16388 14.8188 3.28883C14.7368 3.41379 14.6251 3.51638 14.4936 3.58736C14.3622 3.65834 14.2151 3.69547 14.0657 3.6954C13.9163 3.69533 13.7692 3.65807 13.6378 3.58697C13.5064 3.51587 13.3948 3.41318 13.313 3.28815C13.2312 3.16312 13.1818 3.0197 13.1693 2.87081C13.1567 2.72193 13.1815 2.57227 13.2413 2.43534V1.28409H11.5136V2.43609C11.5733 2.57304 11.598 2.72272 11.5854 2.87159C11.5728 3.02047 11.5234 3.16388 11.4415 3.28887C11.3597 3.41386 11.248 3.5165 11.1165 3.58754C10.9851 3.65858 10.838 3.69577 10.6886 3.69577C10.5392 3.69577 10.3922 3.65858 10.2607 3.58754C10.1293 3.5165 10.0176 3.41386 9.93572 3.28887C9.85387 3.16388 9.80441 3.02047 9.79183 2.87159C9.77924 2.72272 9.80391 2.57304 9.86363 2.43609V1.28394H8.13638V2.43609C8.19609 2.57304 8.22076 2.72272 8.20818 2.87159C8.19559 3.02047 8.14613 3.16388 8.06428 3.28887C7.98242 3.41386 7.87073 3.5165 7.73929 3.58754C7.60784 3.65858 7.46079 3.69577 7.31138 3.69577C7.16197 3.69577 7.01491 3.65858 6.88346 3.58754C6.75202 3.5165 6.64033 3.41386 6.55848 3.28887C6.47662 3.16388 6.42716 3.02047 6.41457 2.87159C6.40199 2.72272 6.42666 2.57304 6.48638 2.43609V1.28394H4.75875V2.43519C4.81852 2.57212 4.84327 2.72178 4.83075 2.87066C4.81823 3.01955 4.76884 3.16297 4.68704 3.288C4.60524 3.41303 4.49359 3.51572 4.36219 3.58682C4.23078 3.65792 4.08373 3.69518 3.93432 3.69525C3.78491 3.69532 3.63784 3.65819 3.50636 3.58721C3.37489 3.51623 3.26315 3.41364 3.18124 3.28868C3.09932 3.16373 3.0498 3.02035 3.03715 2.87148C3.02449 2.7226 3.0491 2.57292 3.10875 2.43594V1.28394H1.875C1.37772 1.28394 0.900806 1.48148 0.549175 1.83311C0.197544 2.18474 0 2.66165 0 3.15894L0 16.0964C4.97191e-05 16.5937 0.19761 17.0706 0.54923 17.4222C0.90085 17.7738 1.37773 17.9714 1.875 17.9714H16.125C16.6223 17.9714 17.0992 17.7738 17.4508 17.4222C17.8024 17.0706 18 16.5937 18 16.0964V3.15894C18 2.66165 17.8025 2.18474 17.4508 1.83311C17.0992 1.48148 16.6223 1.28394 16.125 1.28394ZM17.25 15.9089C17.25 16.257 17.1117 16.5909 16.8656 16.837C16.6194 17.0832 16.2856 17.2214 15.9375 17.2214H2.0625C1.7144 17.2214 1.38056 17.0832 1.13442 16.837C0.888281 16.5909 0.75 16.257 0.75 15.9089V6.34644C0.75 5.99834 0.888281 5.6645 1.13442 5.41836C1.38056 5.17222 1.7144 5.03394 2.0625 5.03394H15.9375C16.2856 5.03394 16.6194 5.17222 16.8656 5.41836C17.1117 5.6645 17.25 5.99834 17.25 6.34644V15.9089Z" />
                                            <path
                                                d="M14.6287 0.591064C14.6287 0.280404 14.3769 0.0285645 14.0662 0.0285645C13.7556 0.0285645 13.5037 0.280404 13.5037 0.591064V2.84106C13.5037 3.15172 13.7556 3.40356 14.0662 3.40356C14.3769 3.40356 14.6287 3.15172 14.6287 2.84106V0.591064Z" />
                                            <path
                                                d="M11.2512 0.591064C11.2512 0.280404 10.9994 0.0285645 10.6887 0.0285645C10.3781 0.0285645 10.1262 0.280404 10.1262 0.591064V2.84106C10.1262 3.15172 10.3781 3.40356 10.6887 3.40356C10.9994 3.40356 11.2512 3.15172 11.2512 2.84106V0.591064Z" />
                                            <path
                                                d="M7.87378 0.591064C7.87378 0.280404 7.62194 0.0285645 7.31128 0.0285645C7.00062 0.0285645 6.74878 0.280404 6.74878 0.591064V2.84106C6.74878 3.15172 7.00062 3.40356 7.31128 3.40356C7.62194 3.40356 7.87378 3.15172 7.87378 2.84106V0.591064Z" />
                                            <path
                                                d="M4.49628 0.591064C4.49628 0.280404 4.24444 0.0285645 3.93378 0.0285645C3.62312 0.0285645 3.37128 0.280404 3.37128 0.591064V2.84106C3.37128 3.15172 3.62312 3.40356 3.93378 3.40356C4.24444 3.40356 4.49628 3.15172 4.49628 2.84106V0.591064Z" />
                                            <path
                                                d="M5.57379 12.859C5.57379 11.841 6.19393 11.266 6.94745 10.9237C6.31772 10.5738 5.93327 9.97518 5.93327 9.23362C5.93327 7.84346 7.14253 6.93768 9.03335 6.93768C10.665 6.93768 12.0754 7.71146 12.0754 9.2562C12.0754 10.0578 11.5991 10.5852 11.0117 10.8392C11.8151 11.133 12.4262 11.8054 12.4262 12.8442C12.4262 14.553 10.7024 15.3177 8.95704 15.3177C7.14785 15.3177 5.57379 14.5132 5.57379 12.859ZM10.4611 12.8062C10.4611 12.1583 10.0752 11.6429 8.99162 11.6429C7.89793 11.6429 7.50868 12.1281 7.50868 12.7625C7.50868 13.578 8.28429 13.9316 8.9993 13.9316C9.72377 13.9316 10.4611 13.636 10.4611 12.8062ZM7.83377 9.24273C7.83377 9.7755 8.13992 10.2237 9.04127 10.2237C9.88592 10.2237 10.171 9.82871 10.171 9.25623C10.171 8.62605 9.6497 8.29207 8.99612 8.29207C8.39034 8.29203 7.83377 8.57565 7.83377 9.24273Z" />
                                        </g>
                                    </svg>
                                    <div class="custom-select-dropdown">
                                        <input type="text" name="daterange" id="hotel-details-checkout" class="hotel-details-checkin" readonly value="June 16 - June 20">
                                        <div class="hotel-selected-date-checkout"></div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4 col-sm-6">
                                <div class="single-field">
                                    <svg width="18" height="18" viewBox="0 0 18 18" xmlns="http://www.w3.org/2000/svg">
                                        <path
                                            d="M9.00003 1.52136C4.02939 1.52136 0 5.55075 0 10.5214C0 12.6873 0.765549 14.6746 2.04035 16.2275C2.23702 14.6528 3.80989 13.3209 6.01543 12.6901C6.82119 13.4409 7.86199 13.8964 8.99997 13.8964C10.1112 13.8964 11.1316 13.4638 11.9292 12.7445C14.1538 13.4304 15.6928 14.8401 15.7434 16.4787C17.1465 14.8914 18 12.8067 18 10.5214C18 5.55075 13.9706 1.52136 9.00003 1.52136ZM9.00003 12.8306C8.42549 12.8306 7.88412 12.6727 7.40341 12.3993C6.24498 11.7401 5.44736 10.3912 5.44736 8.83383C5.44736 6.63003 7.04103 4.83703 9.00003 4.83703C10.9592 4.83703 12.5527 6.63003 12.5527 8.83383C12.5527 10.4151 11.7301 11.7807 10.5429 12.4284C10.0751 12.6835 9.55325 12.8306 9.00003 12.8306Z" />
                                    </svg>
                                    <div class="custom-select-dropdown">
                                        <h6><span id="adult-qty">1</span> Adults, <span id="child-qty">0</span> Child</h6>
                                        <span><strong>1</strong> Room</span>
                                    </div>
                                    <div class="custom-select-wrap">
                                        <div class="title-area">
                                            <h6>Guest & Room</h6>
                                            <span>Start the journey with someone special.</span>
                                        </div>
                                        <ul class="room-list">
                                            <li class="single-room">
                                                <div class="room-title">
                                                    <h6>Room-1</h6>
                                                    <div class="room-delete-btn">
                                                        <svg width="15" height="15" viewBox="0 0 15 15" xmlns="http://www.w3.org/2000/svg">
                                                            <g>
                                                                <path
                                                                    d="M10.3097 15H4.6902C4.12797 14.9919 3.58952 14.7719 3.18254 14.3839C2.77556 13.9959 2.53004 13.4686 2.49507 12.9074L1.82921 2.7805C1.8258 2.70708 1.83698 2.6337 1.86209 2.56463C1.88721 2.49555 1.92578 2.43214 1.97556 2.37806C2.02684 2.32201 2.08893 2.27691 2.15809 2.24548C2.22724 2.21404 2.30205 2.19692 2.378 2.19513H12.6219C12.6972 2.19496 12.7717 2.21027 12.8407 2.24011C12.9098 2.26995 12.972 2.31368 13.0235 2.36858C13.075 2.42348 13.1146 2.48837 13.1399 2.55924C13.1652 2.6301 13.1757 2.70541 13.1707 2.7805L12.5341 12.9074C12.4988 13.4736 12.2491 14.0051 11.8359 14.3938C11.4228 14.7825 10.877 14.9993 10.3097 15ZM2.99263 3.29269L3.55605 12.8415C3.57466 13.1294 3.70232 13.3995 3.91303 13.5966C4.12374 13.7937 4.40166 13.9031 4.6902 13.9025H10.3097C10.5978 13.9013 10.8747 13.7914 11.085 13.5946C11.2954 13.3978 11.4236 13.1288 11.4439 12.8415L12.0366 3.32928L2.99263 3.29269Z" />
                                                                <path
                                                                    d="M14.0853 3.29269H0.914505C0.768959 3.29269 0.629374 3.23488 0.526457 3.13196C0.423541 3.02904 0.365723 2.88946 0.365723 2.74391C0.365723 2.59837 0.423541 2.45878 0.526457 2.35586C0.629374 2.25295 0.768959 2.19513 0.914505 2.19513H14.0853C14.2308 2.19513 14.3704 2.25295 14.4733 2.35586C14.5762 2.45878 14.6341 2.59837 14.6341 2.74391C14.6341 2.88946 14.5762 3.02904 14.4733 3.13196C14.3704 3.23488 14.2308 3.29269 14.0853 3.29269Z" />
                                                                <path
                                                                    d="M9.69514 3.29269H5.30489C5.15993 3.2908 5.02144 3.23237 4.91893 3.12986C4.81643 3.02735 4.758 2.88887 4.7561 2.74391V1.42683C4.76538 1.05133 4.91868 0.693778 5.18428 0.428179C5.44988 0.16258 5.80744 0.00927579 6.18294 0H8.81709C9.19884 0.00954664 9.56173 0.167932 9.82831 0.441348C10.0949 0.714765 10.244 1.08155 10.2439 1.46342V2.74391C10.242 2.88887 10.1836 3.02735 10.0811 3.12986C9.97858 3.23237 9.8401 3.2908 9.69514 3.29269ZM5.85367 2.19513H9.14636V1.46342C9.14636 1.37609 9.11167 1.29234 9.04992 1.23059C8.98817 1.16884 8.90442 1.13415 8.81709 1.13415H6.18294C6.09561 1.13415 6.01186 1.16884 5.95011 1.23059C5.88836 1.29234 5.85367 1.37609 5.85367 1.46342V2.19513ZM9.69514 12.0732C9.55018 12.0713 9.4117 12.0129 9.30919 11.9104C9.20668 11.8079 9.14825 11.6694 9.14636 11.5244V5.67075C9.14636 5.5252 9.20418 5.38562 9.30709 5.2827C9.41001 5.17978 9.54959 5.12196 9.69514 5.12196C9.84069 5.12196 9.98027 5.17978 10.0832 5.2827C10.1861 5.38562 10.2439 5.5252 10.2439 5.67075V11.5244C10.242 11.6694 10.1836 11.8079 10.0811 11.9104C9.97858 12.0129 9.8401 12.0713 9.69514 12.0732ZM5.30489 12.0732C5.15993 12.0713 5.02144 12.0129 4.91893 11.9104C4.81643 11.8079 4.758 11.6694 4.7561 11.5244V5.67075C4.7561 5.5252 4.81392 5.38562 4.91684 5.2827C5.01975 5.17978 5.15934 5.12196 5.30489 5.12196C5.45043 5.12196 5.59002 5.17978 5.69293 5.2827C5.79585 5.38562 5.85367 5.5252 5.85367 5.67075V11.5244C5.85177 11.6694 5.79335 11.8079 5.69084 11.9104C5.58833 12.0129 5.44984 12.0713 5.30489 12.0732ZM7.50001 12.0732C7.35506 12.0713 7.21657 12.0129 7.11406 11.9104C7.01155 11.8079 6.95313 11.6694 6.95123 11.5244V5.67075C6.95123 5.5252 7.00905 5.38562 7.11197 5.2827C7.21488 5.17978 7.35447 5.12196 7.50001 5.12196C7.64556 5.12196 7.78514 5.17978 7.88806 5.2827C7.99098 5.38562 8.04879 5.5252 8.04879 5.67075V11.5244C8.0469 11.6694 7.98847 11.8079 7.88596 11.9104C7.78346 12.0129 7.64497 12.0713 7.50001 12.0732Z" />
                                                            </g>
                                                        </svg>
                                                    </div>
                                                </div>
                                                <ul class="guest-count">
                                                    <li class="single-item">
                                                        <div class="title">
                                                            <h6>Adult</h6>
                                                            <Span>16 years+</Span>
                                                        </div>
                                                        <div class="quantity-counter">
                                                            <a href="#" data-type="adult" class="hotel-guest-quantity__minus"><i class="bi bi-dash"></i></a>
                                                            <input name="adult_quantity" type="text" class="quantity__input"
                                                                value="1">
                                                            <a href="#" data-type="adult" class="hotel-guest-quantity__plus"><i class="bi bi-plus"></i></a>
                                                        </div>
                                                    </li>
                                                    <li class="single-item">
                                                        <div class="title">
                                                            <h6>Children</h6>
                                                            <Span>0-16 years</Span>
                                                        </div>
                                                        <div class="quantity-counter">
                                                            <a href="#" data-type="child" class="guest-quantity__minus"><i class="bi bi-dash"></i></a>
                                                            <input name="child_quantity" type="text" class="quantity__input"
                                                                value="0">
                                                            <a href="#" data-type="child" class="guest-quantity__plus"><i class="bi bi-plus"></i></a>
                                                        </div>
                                                    </li>
                                                </ul>
                                            </li>
                                        </ul>
                                        <button type="button" class="primary-btn1 two add-btn hotel-room-add">
                                            <span>
                                                <svg width="10" height="10" viewBox="0 0 10 10" xmlns="http://www.w3.org/2000/svg">
                                                    <path d="M6 4H10V6H6V10H4V6H0V4H4V0H6V4Z" />
                                                </svg>
                                                <?php echo esc_html__('Add Another Room', 'gofly-core') ?>
                                            </span>
                                            <span>
                                                <svg width="10" height="10" viewBox="0 0 10 10" xmlns="http://www.w3.org/2000/svg">
                                                    <path d="M6 4H10V6H6V10H4V6H0V4H4V0H6V4Z" />
                                                </svg>
                                                <?php echo esc_html__('Add Another Room', 'gofly-core') ?>
                                            </span>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div id="hotel-details-calendar" class="calendar-wrapper full-date"
                            data-dates=''
                            data-months-name='["January","February","March","April","May","June","July","August","September","October","November","December"]' data-start-date="hotel-details-checkin" data-end-date="hotel-details-checkout">
                            <div class="calendar-inner">
                                <div class="calendar-container">
                                    <!-- Previous Calendar -->
                                    <div class="calendar" id="calendar-prev">
                                        <div class="calendar-header">
                                            <button class="prev-month">
                                                <!-- Left chevron icon -->
                                                <svg width="16" height="16" viewBox="0 0 16 16">
                                                    <path d="M10 2L4 8l6 6" stroke="currentColor" fill="none" stroke-width="2" />
                                                </svg>
                                            </button>
                                            <h6 id="month-year-prev">August 2025</h6>
                                            <button class="next-month">
                                                <!-- Right chevron icon -->
                                                <svg width="16" height="16" viewBox="0 0 16 16">
                                                    <path d="M6 2l6 6-6 6" stroke="currentColor" fill="none" stroke-width="2" />
                                                </svg>
                                            </button>
                                        </div>
                                        <div class="calendar-days">
                                            <div class="day-name">Mon</div>
                                            <div class="day-name">Tue</div>
                                            <div class="day-name">Wed</div>
                                            <div class="day-name">Thu</div>
                                            <div class="day-name">Fri</div>
                                            <div class="day-name">Sat</div>
                                            <div class="day-name">Sun</div>
                                        </div>
                                        <div class="calendar-dates" id="calendar-dates-prev">
                                            <?php echo esc_html__('Previous month dates will be populated here', 'gofly-core') ?>
                                        </div>
                                    </div>
                                    <!-- Next Calendar -->
                                    <div class="calendar" id="calendar-next">
                                        <div class="calendar-header">
                                            <span></span>
                                            <h6 id="month-year-next">September 2025</h6>
                                            <button class="next-month">
                                                <svg width="16" height="16" viewBox="0 0 16 16">
                                                    <path d="M6 2l6 6-6 6" stroke="currentColor" fill="none" stroke-width="2" />
                                                </svg>
                                            </button>
                                        </div>
                                        <div class="calendar-days">
                                            <div class="day-name">Mon</div>
                                            <div class="day-name">Tue</div>
                                            <div class="day-name">Wed</div>
                                            <div class="day-name">Thu</div>
                                            <div class="day-name">Fri</div>
                                            <div class="day-name">Sat</div>
                                            <div class="day-name">Sun</div>
                                        </div>
                                        <div class="calendar-dates" id="calendar-dates-next">
                                            <?php echo esc_html__('Next month dates will be populated here', 'gofly-core') ?>
                                        </div>
                                    </div>
                                </div>
                                <!-- Calendar Actions -->
                                <div class="calendar-actions">
                                    <a href="#" id="hotel-calendar-check" class="calendar-check"><?php echo esc_html__('Apply', 'gofly-core') ?></a>
                                </div>
                            </div>
                        </div>
                    </form>
                    <?php if (!empty($hotel_package)): ?>
                        <div class="hotel-room-list">
                            <div class="accordion accordion-flush" id="accordionFlushPackage">
                                <?php
                                foreach ($hotel_package as $key => $package):

                                    $service_terms = $package['hotel_additional_services'];
                                    $service_data  = explode("\n", $service_terms);

                                    $gallery_images = $package['hotel_package_room_gallery'];
                                    $image_ids      = explode(',', $gallery_images);
                                ?>
                                    <div class="accordion-item">
                                        <div class="accordion-header" id="flush-package-heading<?php echo esc_attr($key) ?>">
                                            <div class="accordion-button<?php echo $key == 0 ? '' : ' collapsed' ?>" role="button" data-bs-toggle="collapse" data-bs-target="#flush-package-collapse<?php echo esc_attr($key) ?>" aria-expanded="false" aria-controls="flush-package-collapse<?php echo esc_attr($key) ?>">
                                                <div class="batch">
                                                    <span><?php echo esc_html($package['hotel_pricing_package_typ']) ?></span>
                                                </div>
                                                <div class="title-area">
                                                    <span class="check"></span>
                                                    <h6><?php echo esc_html($package['hotel_pricing_package_title']) ?></h6>
                                                </div>
                                                <?php
                                                if (isset($package['hotel_price']) && $package['hotel_price'] !== '') {
                                                    $regular = floatval($package['hotel_price']);
                                                    if (!empty($package['hotel_price_sale_check']) && isset($package['hotel_price_sale']) && $package['hotel_price_sale'] !== '') {
                                                        $sale = floatval($package['hotel_price_sale']);
                                                        echo '<div class="room-price-wrapper"><span class="room-price">' . Egns_Helper::gofly_format_price($sale) . '</span></div>';
                                                    } else {
                                                        echo '<span class="room-price">' . Egns_Helper::gofly_format_price($regular) . '</span>';
                                                    }
                                                }
                                                ?>
                                            </div>
                                        </div>
                                        <div id="flush-package-collapse<?php echo esc_attr($key) ?>" class="accordion-collapse collapse<?php echo $key == 0 ? ' show' : '' ?>" aria-labelledby="flush-package-heading<?php echo esc_attr($key) ?>" data-bs-parent="#accordionFlushPackage">
                                            <div class="accordion-body">
                                                <p><?php echo wp_kses_post($package['hotel_pricing_package_desc']) ?></p>
                                                <?php if (!empty($gallery_images)): ?>
                                                    <div class="room-gallery-area">
                                                        <div class="row g-xl-4 g-md-3 g-sm-2 g-2">
                                                            <?php foreach ($image_ids as $img) { ?>
                                                                <div class="col-lg-4 col-sm-4 col-6">
                                                                    <a data-fancybox="gallery-01" href="<?php echo wp_get_attachment_url($img); ?>">
                                                                        <?php echo wp_get_attachment_image($img, 'full'); ?>
                                                                    </a>
                                                                </div>
                                                            <?php } ?>
                                                        </div>
                                                    </div>
                                                <?php endif; ?>
                                                <?php if (!empty($service_data)): ?>
                                                    <div class="additional-service-area">
                                                        <h6><?php echo esc_html__('Additional Services', 'gofly-core') ?> -</h6>
                                                        <ul class="service-list">
                                                            <?php foreach ($service_data as $data) { ?>
                                                                <li>
                                                                    <svg width="14" height="14" viewBox="0 0 14 14" xmlns="http://www.w3.org/2000/svg">
                                                                        <rect width="14" height="14" rx="7" />
                                                                        <path
                                                                            d="M10.6947 5.45795L6.24644 9.90859C6.17556 9.97707 6.08572 10.0126 5.99596 10.0126C5.9494 10.0127 5.90328 10.0035 5.86027 9.98566C5.81727 9.96781 5.77822 9.94162 5.7454 9.90859L3.3038 7.46699C3.16436 7.32987 3.16436 7.10539 3.3038 6.96595L4.16652 6.10083C4.29892 5.96851 4.53524 5.96851 4.66764 6.10083L5.99596 7.42915L9.33092 4.09179C9.36377 4.05887 9.40278 4.03274 9.44573 4.01489C9.48868 3.99705 9.53473 3.98784 9.58124 3.98779C9.67572 3.98779 9.76556 4.02563 9.83172 4.09179L10.6944 4.95699C10.8341 5.09643 10.8341 5.32091 10.6947 5.45795Z" />
                                                                    </svg>
                                                                    <?php echo esc_html($data) ?>
                                                                </li>
                                                            <?php } ?>
                                                        </ul>
                                                    </div>
                                                <?php endif; ?>
                                                <div class="btn-area">
                                                    <button data-package-index="<?php echo esc_attr($key) ?>" type="button" class="primary-btn1 two add-to-cart-btn">
                                                        <span>
                                                            <?php echo esc_html__('Book Now', 'gofly-core') ?>
                                                            <svg width="18" height="18" viewBox="0 0 18 18" xmlns="http://www.w3.org/2000/svg">
                                                                <path d="M16.7823 8.95775C15.7387 1.49096 14.8315 0.99707 9.00454 0.99707C3.16848 0.99707 2.26028 1.48821 1.21947 8.94769C0.764911 12.2018 1.01368 14.0987 2.05175 15.2923C3.29652 16.7227 5.54095 17.0026 8.99631 17.0026C12.4581 17.0026 14.7062 16.7218 15.9509 15.2904C16.9881 14.0987 17.2369 12.2055 16.7832 8.95775H16.7823ZM14.9165 14.3905C14.0184 15.424 11.9861 15.6307 8.99723 15.6307C6.0138 15.6307 3.98522 15.4231 3.08708 14.3914C2.34625 13.5408 2.18986 11.9192 2.57856 9.13701C3.52335 2.36897 3.83339 2.36897 9.00546 2.36897C14.1675 2.36897 14.4766 2.36897 15.4241 9.14799C15.8119 11.9238 15.6555 13.5408 14.9165 14.3905Z"></path>
                                                                <path d="M11.2863 4.19824C11.1044 4.19824 10.9299 4.27051 10.8013 4.39915C10.6726 4.52779 10.6003 4.70227 10.6003 4.88419C10.6003 5.30868 10.4317 5.71579 10.1316 6.01595C9.83139 6.31611 9.42429 6.48474 8.99979 6.48474C8.5753 6.48474 8.1682 6.31611 7.86803 6.01595C7.56787 5.71579 7.39924 5.30868 7.39924 4.88419C7.39924 4.70227 7.32697 4.52779 7.19833 4.39915C7.06969 4.27051 6.89522 4.19824 6.71329 4.19824C6.53137 4.19824 6.35689 4.27051 6.22825 4.39915C6.09961 4.52779 6.02734 4.70227 6.02734 4.88419C6.02734 5.67254 6.34051 6.42859 6.89795 6.98603C7.4554 7.54347 8.21145 7.85664 8.99979 7.85664C9.78814 7.85664 10.5442 7.54347 11.1016 6.98603C11.6591 6.42859 11.9722 5.67254 11.9722 4.88419C11.9722 4.70227 11.9 4.52779 11.7713 4.39915C11.6427 4.27051 11.4682 4.19824 11.2863 4.19824Z"></path>
                                                            </svg>
                                                        </span>
                                                        <span>
                                                            <svg width="18" height="18" viewBox="0 0 18 18" xmlns="http://www.w3.org/2000/svg">
                                                                <path d="M16.7823 8.95775C15.7387 1.49096 14.8315 0.99707 9.00454 0.99707C3.16848 0.99707 2.26028 1.48821 1.21947 8.94769C0.764911 12.2018 1.01368 14.0987 2.05175 15.2923C3.29652 16.7227 5.54095 17.0026 8.99631 17.0026C12.4581 17.0026 14.7062 16.7218 15.9509 15.2904C16.9881 14.0987 17.2369 12.2055 16.7832 8.95775H16.7823ZM14.9165 14.3905C14.0184 15.424 11.9861 15.6307 8.99723 15.6307C6.0138 15.6307 3.98522 15.4231 3.08708 14.3914C2.34625 13.5408 2.18986 11.9192 2.57856 9.13701C3.52335 2.36897 3.83339 2.36897 9.00546 2.36897C14.1675 2.36897 14.4766 2.36897 15.4241 9.14799C15.8119 11.9238 15.6555 13.5408 14.9165 14.3905Z"></path>
                                                                <path d="M11.2863 4.19824C11.1044 4.19824 10.9299 4.27051 10.8013 4.39915C10.6726 4.52779 10.6003 4.70227 10.6003 4.88419C10.6003 5.30868 10.4317 5.71579 10.1316 6.01595C9.83139 6.31611 9.42429 6.48474 8.99979 6.48474C8.5753 6.48474 8.1682 6.31611 7.86803 6.01595C7.56787 5.71579 7.39924 5.30868 7.39924 4.88419C7.39924 4.70227 7.32697 4.52779 7.19833 4.39915C7.06969 4.27051 6.89522 4.19824 6.71329 4.19824C6.53137 4.19824 6.35689 4.27051 6.22825 4.39915C6.09961 4.52779 6.02734 4.70227 6.02734 4.88419C6.02734 5.67254 6.34051 6.42859 6.89795 6.98603C7.4554 7.54347 8.21145 7.85664 8.99979 7.85664C9.78814 7.85664 10.5442 7.54347 11.1016 6.98603C11.6591 6.42859 11.9722 5.67254 11.9722 4.88419C11.9722 4.70227 11.9 4.52779 11.7713 4.39915C11.6427 4.27051 11.4682 4.19824 11.2863 4.19824Z"></path>
                                                            </svg>
                                                            <?php echo esc_html__('Book Now', 'gofly-core') ?>
                                                        </span>
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                <?php endforeach ?>
                            </div>
                        </div>
                    <?php endif; ?>
                </div>
            </div>
        </div>

<?php

    }
}

Plugin::instance()->widgets_manager->register(new Gofly_Hotel_Package_Widget());
