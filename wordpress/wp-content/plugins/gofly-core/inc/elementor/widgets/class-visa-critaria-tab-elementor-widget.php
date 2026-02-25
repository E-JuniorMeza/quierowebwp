<?php

namespace Elementor;

if (!defined('ABSPATH')) exit;  // Exit if accessed directly

use Elementor\core\Schemes;
use Egns_Core\Egns_Helper;

class Gofly_Visa_Critaria_Tab_Widget extends Widget_Base
{

    public function get_name()
    {
        return 'gofly_visa_critaria';
    }

    public function get_title()
    {
        return esc_html__('EG Visa Critaria Tab', 'gofly-core');
    }

    public function get_icon()
    {
        return 'egns-widget-icon';
    }

    public function get_categories()
    {
        return ['gofly_visa'];
    }

    protected function register_controls()
    {

        //=====================General=======================//

        $this->start_controls_section(
            'gofly_visa_critaria_section',
            [
                'label' => esc_html__('General', 'gofly-core')
            ]
        );

        $this->add_control(
            'tour_custom_panel_notice',
            [
                'type'        => \Elementor\Controls_Manager::NOTICE,
                'notice_type' => 'warning',
                'dismissible' => true,
                'heading'     => esc_html__('Notice', 'gofly-core'),
                'content'     => esc_html__('This Widgets only for custom post "Visa" details page.', 'gofly-core'),
            ]
        );

        $this->end_controls_section();

        // ======== Style Start ======== //
        $this->start_controls_section(
            'gofly_visa_critaria_section_styles',
            [
                'label' => esc_html__('Style', 'gofly-core'),
                'tab'   => Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_control(
            'gofly_visa_critaria_card_title_style',
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
                'name'     => 'gofly_visa_critaria_card_title_typ',
                'selector' => '{{WRAPPER}} .visa-package-grid-section .visa-package-card .visa-package-content h5 a',

            ]
        );

        $this->add_control(
            'gofly_visa_critaria_card_title_color',
            [
                'label'     => esc_html__('Color', 'gofly-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .visa-package-grid-section .visa-package-card .visa-package-content h5 a' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'gofly_visa_critaria_card_title_hover_color',
            [
                'label'     => esc_html__('Hover Color', 'gofly-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .visa-package-grid-section .visa-package-card .visa-package-content h5 a:hover' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'gofly_visa_critaria_tab_general_style',
            [
                'label'     => esc_html__('Tab General', 'gofly-core'),
                'type'      => \Elementor\Controls_Manager::HEADING,
                'separator' => 'after',
            ]
        );

        $this->add_control(
            'gofly_visa_critaria_tab_general_bg_color',
            [
                'label'     => esc_html__('Background Color', 'gofly-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .visa-details-page .visa-list-area .single-visa' => 'background-color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'gofly_visa_critaria_tab_general_border_color',
            [
                'label'     => esc_html__('Border Color', 'gofly-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .visa-details-page .visa-list-area .single-visa' => 'border-color: {{VALUE}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'gofly_visa_critaria_tab_general_border_radius',
            [
                'label'      => esc_html__(
                    'Border Radius',
                    'gofly-core'
                ),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%'],
                'selectors'  => [
                    '{{WRAPPER}} .visa-details-page .visa-list-area .single-visa' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'
                ]
            ]
        );

        $this->add_control(
            'gofly_visa_critaria_tab_general_active_bg_color',
            [
                'label'     => esc_html__('Active Background Color', 'gofly-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .visa-details-page .visa-list-area .single-visa.active' => 'background-color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'gofly_visa_critaria_tab_general_active_border_color',
            [
                'label'     => esc_html__('Active Border Color', 'gofly-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .visa-details-page .visa-list-area .single-visa.active' => 'border-color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'gofly_visa_critaria_tab_title_style',
            [
                'label'     => esc_html__('Tab Title', 'gofly-core'),
                'type'      => \Elementor\Controls_Manager::HEADING,
                'separator' => 'after',
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'label'    => esc_html__('Typography', 'gofly-core'),
                'name'     => 'gofly_visa_critaria_tab_title_typ',
                'selector' => '{{WRAPPER}} .visa-details-page .visa-list-area .single-visa h6',

            ]
        );

        $this->add_control(
            'gofly_visa_critaria_tab_title_color',
            [
                'label'     => esc_html__('Color', 'gofly-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .visa-details-page .visa-list-area .single-visa h6' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'gofly_visa_critaria_tab_title_active_color',
            [
                'label'     => esc_html__('Active Color', 'gofly-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .visa-details-page .visa-list-area .single-visa.active h6' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'gofly_visa_critaria_documents_style',
            [
                'label'     => esc_html__('Documents Section', 'gofly-core'),
                'type'      => \Elementor\Controls_Manager::HEADING,
                'separator' => 'after',
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'label'    => esc_html__('Title Typography', 'gofly-core'),
                'name'     => 'gofly_visa_critaria_documents_title_typ',
                'selector' => '{{WRAPPER}} .visa-details-page .visa-details-wrapper h2',

            ]
        );

        $this->add_control(
            'gofly_visa_critaria_documents_title_color',
            [
                'label'     => esc_html__('Title Color', 'gofly-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .visa-details-page .visa-details-wrapper h2' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'label'    => esc_html__('Description Typography', 'gofly-core'),
                'name'     => 'gofly_visa_critaria_documents_desc_typ',
                'selector' => '{{WRAPPER}} .visa-details-page .visa-details-wrapper .single-requirement',

            ]
        );

        $this->add_control(
            'gofly_visa_critaria_documents_desc_color',
            [
                'label'     => esc_html__('Description Color', 'gofly-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .visa-details-page .visa-details-wrapper .single-requirement' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'gofly_visa_critaria_rejection_section_style',
            [
                'label'     => esc_html__('Rejection Section', 'gofly-core'),
                'type'      => \Elementor\Controls_Manager::HEADING,
                'separator' => 'after',
            ]
        );

        $this->add_control(
            'gofly_visa_critaria_rejection_section_bg_color',
            [
                'label'     => esc_html__('Background Color', 'gofly-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .visa-details-page .visa-details-wrapper .visa-rejection-area' => 'background-color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'gofly_visa_critaria_rejection_section_border_color',
            [
                'label'     => esc_html__('Border Color', 'gofly-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .visa-details-page .visa-details-wrapper .visa-rejection-area' => 'border-color: {{VALUE}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'gofly_visa_critaria_rejection_section_border_radius',
            [
                'label'      => esc_html__(
                    'Border Radius',
                    'gofly-core'
                ),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%'],
                'selectors'  => [
                    '{{WRAPPER}} .visa-details-page .visa-details-wrapper .visa-rejection-area' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'
                ]
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'label'    => esc_html__('Title Typography', 'gofly-core'),
                'name'     => 'gofly_visa_critaria_rejection_section_title_typ',
                'selector' => '{{WRAPPER}} .visa-details-page .visa-details-wrapper h2',

            ]
        );

        $this->add_control(
            'gofly_visa_critaria_rejection_section_title_color',
            [
                'label'     => esc_html__('Title Color', 'gofly-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .visa-details-page .visa-details-wrapper h2' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'label'    => esc_html__('Description Typography', 'gofly-core'),
                'name'     => 'gofly_visa_critaria_rejection_section_desc_typ',
                'selector' => '{{WRAPPER}} .visa-details-page .visa-details-wrapper .visa-rejection-content',

            ]
        );

        $this->add_control(
            'gofly_visa_critaria_rejection_section_desc_color',
            [
                'label'     => esc_html__('Description Color', 'gofly-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .visa-details-page .visa-details-wrapper .visa-rejection-content' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'label'    => esc_html__('Special Note Title Typography', 'gofly-core'),
                'name'     => 'gofly_visa_critaria_special_note_title_typ',
                'selector' => '{{WRAPPER}} .visa-details-page .visa-details-wrapper .note-area h2',

            ]
        );

        $this->add_control(
            'gofly_visa_critaria_special_note_title_color',
            [
                'label'     => esc_html__('Special Note Title Color', 'gofly-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .visa-details-page .visa-details-wrapper .note-area h2' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'label'    => esc_html__('Special Note Desc Typography', 'gofly-core'),
                'name'     => 'gofly_visa_critaria_special_note_desc_typ',
                'selector' => '{{WRAPPER}} .visa-details-page .visa-details-wrapper .note-area',

            ]
        );

        $this->add_control(
            'gofly_visa_critaria_special_note_desc_color',
            [
                'label'     => esc_html__('Special Note Desc Color', 'gofly-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .visa-details-page .visa-details-wrapper .note-area' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'gofly_visa_critaria_apply_button_area_style',
            [
                'label'     => esc_html__('Sidebar Application Area', 'gofly-core'),
                'type'      => \Elementor\Controls_Manager::HEADING,
                'separator' => 'after',
            ]
        );

        $this->add_control(
            'gofly_visa_critaria_sidebar_visa_apply_area_bg_color',
            [
                'label'     => esc_html__('Sidebar Card Background Color', 'gofly-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .visa-details-page .visa-dt-sidebar .visa-info-wrap' => 'background-color: {{VALUE}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'gofly_visa_critaria_sidebar_visa_apply_area_border_radius',
            [
                'label'      => esc_html__(
                    'Sidebar Card Border Radius',
                    'gofly-core'
                ),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%'],
                'selectors'  => [
                    '{{WRAPPER}} .visa-details-page .visa-dt-sidebar .visa-info-wrap' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'
                ]
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'label'    => esc_html__('Title Typography', 'gofly-core'),
                'name'     => 'gofly_visa_critaria_sidebar_visa_apply_area_title_typ',
                'selector' => '{{WRAPPER}} .visa-details-page .visa-dt-sidebar .visa-info-wrap .title-area h4',

            ]
        );

        $this->add_control(
            'gofly_visa_critaria_sidebar_visa_apply_area_title_color',
            [
                'label'     => esc_html__('Title Color', 'gofly-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .visa-details-page .visa-dt-sidebar .visa-info-wrap .title-area h4' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'label'    => esc_html__('Visa Info Typography', 'gofly-core'),
                'name'     => 'gofly_visa_critaria_sidebar_visa_info_typ',
                'selector' => '{{WRAPPER}} .visa-details-page .visa-dt-sidebar .visa-info-wrap .title-area span',

            ]
        );

        $this->add_control(
            'gofly_visa_critaria_sidebar_visa_info_color',
            [
                'label'     => esc_html__('Visa Info Color', 'gofly-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .visa-details-page .visa-dt-sidebar .visa-info-wrap .title-area span' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'gofly_visa_critaria_sidebar_visa_info_bg_color',
            [
                'label'     => esc_html__('Visa Info Background Color', 'gofly-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .visa-details-page .visa-dt-sidebar .visa-info-wrap .title-area span' => 'background-color: {{VALUE}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'gofly_visa_critaria_sidebar_visa_info_border_radius',
            [
                'label'      => esc_html__(
                    'Border Radius',
                    'gofly-core'
                ),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%'],
                'selectors'  => [
                    '{{WRAPPER}} .visa-details-page .visa-dt-sidebar .visa-info-wrap .title-area span' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'
                ]
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'label'    => esc_html__('Visa Price Title Typography', 'gofly-core'),
                'name'     => 'gofly_visa_critaria_sidebar_visa_price_title_typ',
                'selector' => '{{WRAPPER}} .visa-details-page .visa-dt-sidebar .visa-info-wrap .pricing-area span',

            ]
        );

        $this->add_control(
            'gofly_visa_critaria_sidebar_visa_price_title_color',
            [
                'label'     => esc_html__('Visa Price Title Color', 'gofly-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .visa-details-page .visa-dt-sidebar .visa-info-wrap .pricing-area span' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'label'    => esc_html__('Visa Price Typography', 'gofly-core'),
                'name'     => 'gofly_visa_critaria_sidebar_visa_price_typ',
                'selector' => '{{WRAPPER}} .visa-details-page .visa-dt-sidebar .visa-info-wrap .pricing-area strong',

            ]
        );

        $this->add_control(
            'gofly_visa_critaria_sidebar_visa_price_color',
            [
                'label'     => esc_html__('Visa Price Color', 'gofly-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .visa-details-page .visa-dt-sidebar .visa-info-wrap .pricing-area strong' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'label'    => esc_html__('Visa Price Info Typography', 'gofly-core'),
                'name'     => 'gofly_visa_critaria_sidebar_visa_price_info_typ',
                'selector' => '{{WRAPPER}} .visa-details-page .visa-dt-sidebar .visa-info-wrap .pricing-area strong sub',

            ]
        );

        $this->add_control(
            'gofly_visa_critaria_sidebar_visa_price_info_color',
            [
                'label'     => esc_html__('Visa Price Info Color', 'gofly-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .visa-details-page .visa-dt-sidebar .visa-info-wrap .pricing-area strong sub' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'gofly_visa_critaria_sidebar_apply_button_style',
            [
                'label'     => esc_html__('Apply Button', 'gofly-core'),
                'type'      => \Elementor\Controls_Manager::HEADING,
                'separator' => 'after',
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'label'    => esc_html__('Visa Apply Button Typography', 'gofly-core'),
                'name'     => 'gofly_visa_critaria_sidebar_visa_apply_button_typ',
                'selector' => '{{WRAPPER}} .visa-details-page .visa-dt-sidebar .visa-info-wrap .primary-btn1',

            ]
        );

        $this->add_control(
            'gofly_visa_critaria_sidebar_visa_apply_button_color',
            [
                'label'     => esc_html__('Visa Apply Button Color', 'gofly-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .visa-details-page .visa-dt-sidebar .visa-info-wrap .primary-btn1' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'gofly_visa_critaria_sidebar_visa_apply_button_hover_color',
            [
                'label'     => esc_html__('Visa Apply Button Hover Color', 'gofly-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .visa-details-page .visa-dt-sidebar .primary-btn1::after' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'gofly_visa_critaria_sidebar_visa_apply_button_icon_color',
            [
                'label'     => esc_html__('Visa Apply Button Icon Color', 'gofly-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .visa-details-page .visa-dt-sidebar .visa-info-wrap .primary-btn1 svg' => 'fill: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'gofly_visa_critaria_sidebar_visa_apply_button_icon_hover_color',
            [
                'label'     => esc_html__('Visa Apply Button Hover Icon Color', 'gofly-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .visa-details-page .visa-dt-sidebar .primary-btn1 span:last-child svg' => 'fill: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'gofly_visa_critaria_sidebar_visa_apply_button_bg_color',
            [
                'label'     => esc_html__('Visa Apply Button BG Color', 'gofly-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .visa-details-page .visa-dt-sidebar .primary-btn1' => 'background-color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'gofly_visa_critaria_sidebar_visa_apply_button_hover_bg_color',
            [
                'label'     => esc_html__('Visa Apply Button Hover BG Color', 'gofly-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .visa-details-page .visa-dt-sidebar .primary-btn1::after' => 'background-color: {{VALUE}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'gofly_visa_critaria_sidebar_visa_apply_button_border_radius',
            [
                'label'      => esc_html__(
                    'Border Radius',
                    'gofly-core'
                ),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%'],
                'selectors'  => [
                    '{{WRAPPER}} .visa-details-page .visa-dt-sidebar .primary-btn1' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'
                ]
            ]
        );

        $this->add_control(
            'gofly_visa_critaria_sidebar_apply_offer_info_style',
            [
                'label'     => esc_html__('Offer Notice', 'gofly-core'),
                'type'      => \Elementor\Controls_Manager::HEADING,
                'separator' => 'after',
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'label'    => esc_html__('Offer Notice Typography', 'gofly-core'),
                'name'     => 'gofly_visa_critaria_sidebar_visa_apply_offer_notice_typ',
                'selector' => '{{WRAPPER}} .visa-details-page .visa-dt-sidebar .visa-info-wrap > span',

            ]
        );

        $this->add_control(
            'gofly_visa_critaria_sidebar_visa_apply_offer_notice_color',
            [
                'label'     => esc_html__('Offer Notice Color', 'gofly-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .visa-details-page .visa-dt-sidebar .visa-info-wrap > span' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->end_controls_section();
    }

    protected function render()
    {

        $settings = $this->get_settings_for_display();

        $criterias_lists = Egns_Helper::egns_get_visa_value('visa_criterias_lists');


?>

        <?php if (is_admin()): ?>
            <script>
                var swiper = new Swiper(".visa-dt-visa-list-slider", {
                    slidesPerView: 1,
                    speed: 1500,
                    spaceBetween: 24,
                    autoplay: {
                        delay: 2500,
                        pauseOnMouseEnter: true,
                        disableOnInteraction: false,
                    },
                    breakpoints: {
                        280: {
                            slidesPerView: 1,
                        },
                        350: {
                            slidesPerView: 2,
                            spaceBetween: 10,
                        },
                        576: {
                            slidesPerView: 3,
                        },
                        768: {
                            slidesPerView: 4,
                            spaceBetween: 15,
                        },
                        992: {
                            slidesPerView: 5,
                            spaceBetween: 15,
                        },
                        1200: {
                            slidesPerView: 6,
                            spaceBetween: 15,
                        },
                        1400: {
                            slidesPerView: 6,
                        },
                    },
                });
            </script>
        <?php endif; ?>

        <!-- Visa Apply Modal section Start-->
        <div class="modal visa-apply-modal fade" id="visaApplyModal" tabindex="-1" aria-labelledby="visaApplyModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <button type="button" class="close-btn" data-bs-dismiss="modal" aria-label="Close">
                        <svg width="10" height="10" viewBox="0 0 10 10" xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M2.00247 0.500545C1.79016 0.505525 1.58918 0.582706 1.4362 0.735547L0.694403 1.479C0.345704 1.82743 0.389689 2.43243 0.79164 2.83493L3.00694 5.05341L0.79164 7.27092C0.389689 7.67328 0.345566 8.27842 0.694403 8.62753L1.4362 9.37044C1.7849 9.71872 2.38879 9.67543 2.7913 9.27293L5.00659 7.05473L7.22189 9.27293C7.62467 9.67543 8.22898 9.71872 8.57699 9.37044L9.31989 8.62753C9.6679 8.27856 9.62461 7.67342 9.22182 7.27092L7.00653 5.05341L9.22182 2.83493C9.62461 2.43243 9.6679 1.82743 9.31989 1.479L8.57699 0.735547C8.22898 0.386433 7.62467 0.430557 7.22189 0.833614L5.00659 3.05126L2.7913 0.833753C2.56515 0.606635 2.27482 0.493906 2.00247 0.500545Z" />
                        </svg>
                    </button>
                    <div class="modal-body">
                        <h4 class="modal-title" id="visaApplyModalLabel">Apply for Visa</h4>
                        <?php echo do_shortcode(Egns_Helper::egns_get_visa_value('visa_apply_form_shortcode')); ?>
                        <!-- <form class = "visa-form-wrapper">
                        <div class       = "row g-4 mb-50">
                        <div class       = "col-md-6">
                        <div class       = "form-inner">
                                        <label>Your Name</label>
                                        <input type = "text" placeholder = "Enter Your Name">
                                    </div>
                                </div>
                                <div class = "col-md-6">
                                <div class = "form-inner">
                                        <label>Date of Birth</label>
                                        <div   class = "date-field-area">
                                        <input type  = "text" name           = "inOut2" readonly = "" value     = "Sep 12 - Sep 20">
                                        <svg   class = "calender-icon" width = "14" height       = "14" viewBox = "0 0 14 14" xmlns = "http://www.w3.org/2000/svg">
                                                <g>
                                                    <path
                                                        d = "M12.1953 1.09375H10.9375V0.4375C10.9375 0.195891 10.7416 0 10.5 0C10.2584 0 10.0625 0.195891 10.0625 0.4375V1.09375H3.9375V0.4375C3.9375 0.195891 3.74164 0 3.5 0C3.25836 0 3.0625 0.195891 3.0625 0.4375V1.09375H1.80469C0.809566 1.09375 0 1.90332 0 2.89844V12.1953C0 13.1904 0.809566 14 1.80469 14H12.1953C13.1904 14 14 13.1904 14 12.1953V2.89844C14 1.90332 13.1904 1.09375 12.1953 1.09375ZM13.125 12.1953C13.125 12.7088 12.7088 13.125 12.1953 13.125H1.80469C1.29123 13.125 0.875 12.7088 0.875 12.1953V4.94922C0.875 4.91296 0.889404 4.87818 0.915044 4.85254C0.940684 4.8269 0.975459 4.8125 1.01172 4.8125H12.9883C13.0245 4.8125 13.0593 4.8269 13.085 4.85254C13.1106 4.87818 13.125 4.91296 13.125 4.94922V12.1953Z" />
                                                </g>
                                            </svg>
                                        </div>
                                    </div>
                                </div>
                                <div class = "col-md-6">
                                <div class = "form-inner">
                                        <label>Phone Number</label>
                                        <input type = "text" placeholder = "Enter Your Name">
                                    </div>
                                </div>
                                <div class = "col-md-6">
                                <div class = "form-inner">
                                        <label>Email Address</label>
                                        <input type = "email" placeholder = "Email Address">
                                    </div>
                                </div>
                                <div class = "col-lg-12">
                                <div class = "form-inner">
                                        <label>Attached Documents</label>
                                        <div class = "image-drop-area">
                                        <div class = "dropzone dropzone-1 text-center">
                                        <div class = "icon">
                                        <img src   = "assets/img/innerpages/icon/file-icon.svg" alt = "">
                                                </div>
                                                <div class = "content">
                                                    <h6>Drag & Drop File Here To Upload</h6>
                                                    <p><span>Format: </span> PNG, JPG, JPEG, PDF, DOCX</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class = "col-lg-12">
                                <div class = "form-inner">
                                        <label>Short Notes</label>
                                        <textarea placeholder = "Type your short feedback…"></textarea>
                                    </div>
                                </div>
                            </div>
                            <div    class = "form-inner">
                            <button type  = "submit" class = "primary-btn1 black-bg">
                                    <span>
                                        Submit Now
                                        <svg  width = "10" height = "10" viewBox = "0 0 10 10" xmlns = "http://www.w3.org/2000/svg">
                                        <path d     = "M9.73535 1.14746C9.57033 1.97255 9.32924 3.26406 9.24902 4.66797C9.16817 6.08312 9.25559 7.5453 9.70214 8.73633C9.84754 9.12406 9.65129 9.55659 9.26367 9.70215C8.9001 9.83849 8.4969 9.67455 8.32812 9.33398L8.29785 9.26367L8.19921 8.98438C7.73487 7.5758 7.67054 5.98959 7.75097 4.58203C7.77875 4.09598 7.82525 3.62422 7.87988 3.17969L1.53027 9.53027C1.23738 9.82317 0.762615 9.82317 0.469722 9.53027C0.176829 9.23738 0.176829 8.76262 0.469722 8.46973L6.83593 2.10254C6.3319 2.16472 5.79596 2.21841 5.25 2.24902C3.8302 2.32862 2.2474 2.26906 0.958003 1.79102L0.704097 1.68945L0.635738 1.65527C0.303274 1.47099 0.157578 1.06102 0.310542 0.704102C0.463655 0.347333 0.860941 0.170391 1.22363 0.28418L1.29589 0.310547L1.48828 0.387695C2.47399 0.751207 3.79966 0.827571 5.16601 0.750977C6.60111 0.670504 7.97842 0.428235 8.86132 0.262695L9.95312 0.0585938L9.73535 1.14746Z"></path>
                                        </svg>
                                    </span>
                                    <span>
                                        Submit Now
                                        <svg  width = "10" height = "10" viewBox = "0 0 10 10" xmlns = "http://www.w3.org/2000/svg">
                                        <path d     = "M9.73535 1.14746C9.57033 1.97255 9.32924 3.26406 9.24902 4.66797C9.16817 6.08312 9.25559 7.5453 9.70214 8.73633C9.84754 9.12406 9.65129 9.55659 9.26367 9.70215C8.9001 9.83849 8.4969 9.67455 8.32812 9.33398L8.29785 9.26367L8.19921 8.98438C7.73487 7.5758 7.67054 5.98959 7.75097 4.58203C7.77875 4.09598 7.82525 3.62422 7.87988 3.17969L1.53027 9.53027C1.23738 9.82317 0.762615 9.82317 0.469722 9.53027C0.176829 9.23738 0.176829 8.76262 0.469722 8.46973L6.83593 2.10254C6.3319 2.16472 5.79596 2.21841 5.25 2.24902C3.8302 2.32862 2.2474 2.26906 0.958003 1.79102L0.704097 1.68945L0.635738 1.65527C0.303274 1.47099 0.157578 1.06102 0.310542 0.704102C0.463655 0.347333 0.860941 0.170391 1.22363 0.28418L1.29589 0.310547L1.48828 0.387695C2.47399 0.751207 3.79966 0.827571 5.16601 0.750977C6.60111 0.670504 7.97842 0.428235 8.86132 0.262695L9.95312 0.0585938L9.73535 1.14746Z"></path>
                                        </svg>
                                    </span>
                                </button>
                            </div>
                        </form> -->
                    </div>
                </div>
            </div>
        </div>
        <!-- <div style = "display:none;" class                 = "my-template">
        <div id         = "mytmp" class                         = "dz-preview dz-file-preview">
        <div class      = "dz-image"><img data-dz-thumbnail src = "assets/img/fav-icon.svg" alt = ""></div>
        <div class      = "dz-details">
        <div class      = "dz-size"><span data-dz-size></span></div>
        <div class      = "dz-filename"><span data-dz-name></span></div>
                </div>
                <div  class = "dz-progress">
                <span class = "dz-upload" data-dz-uploadprogress></span>
                </div>
                <div class = "dz-error-message"><span data-dz-errormessage></span></div>
                <div class = "dz-success-mark">
                <svg width = "24" height = "24" viewBox = "0 0 24 24" xmlns = "http://www.w3.org/2000/svg">
                        <path
                            d = "M8.99991 16.1698L4.82991 11.9998L3.40991 13.4098L8.99991 18.9998L20.9999 6.99984L19.5899 5.58984L8.99991 16.1698Z" />
                    </svg>

                </div>
                <div    class = "dz-error-mark">
                <svg    xmlns = "http://www.w3.org/2000/svg" height = "24px" viewBox = "0 0 24 24" width = "24px" fill = "#000000">
                <path   d     = "M0 0h24v24H0z" fill                = "none" />
                <circle cx    = "12" cy                             = "19" r         = "2" />
                <path   d     = "M10 3h4v12h-4z" />
                    </svg>
                </div>
                <div  class = "dz-remove" data-dz-remove>
                <svg  xmlns = "http://www.w3.org/2000/svg" height = "24px" viewBox = "0 0 24 24" width = "24px" fill = "#000000">
                <path d     = "M0 0h24v24H0z" fill                = "none" />
                <path d     = "M14.59 8L12 10.59 9.41 8 8 9.41 10.59 12 8 14.59 9.41 16 12 13.41 14.59 16 16 14.59 13.41 12 16 9.41 14.59 8zM12 2C6.47 2 2 6.47 2 12s4.47 10 10 10 10-4.47 10-10S17.53 2 12 2zm0 18c-4.41 0-8-3.59-8-8s3.59-8 8-8 8 3.59 8 8-3.59 8-8 8z" />
                    </svg>
                </div>
            </div>
        </div> -->
        <!-- Visa Apply Modal section End-->




        <div class="visa-details-page">
            <div class="container">
                <div class="visa-list-area mb-60">
                    <div class="swiper visa-dt-visa-list-slider">
                        <div class="swiper-wrapper">
                            <?php
                            foreach ($criterias_lists as $key => $criterias):
                                $name            = $criterias['visa_criterias_name'] ?? '';
                                $icon            = $criterias['visa_criterias_icon']['url'] ?? '';
                                $regular_price   = !empty($criterias['visa_processing_price']) ? $criterias['visa_processing_price'] : null;
                                $sale_price      = !empty($criterias['visa_processing_price_sale']) ? $criterias['visa_processing_price_sale'] : null;
                                $applicant_type  = $criterias['visa_applicant_type'] ?? '';
                                $applicant_limit = $criterias['visa_applicant_limit'] ?? '';
                                $sale_check      = !empty($criterias['visa_processing_price_sale_check']) ? $criterias['visa_processing_price_sale_check'] : false;

                                $final_price       = null;
                                $formatted_price   = '';
                                $formatted_regular = '';

                                // Choose display price based on $sale_check
                                if ($sale_check && $sale_price !== null) {
                                    $final_price       = $sale_price;
                                    $formatted_price   = Egns_Helper::gofly_format_price($sale_price);
                                    $formatted_regular = ($regular_price !== null && $sale_price < $regular_price)
                                        ? '<del>' . Egns_Helper::gofly_format_price($regular_price) . '</del>'
                                        :   '';
                                } elseif ($regular_price !== null) {
                                    $final_price     = $regular_price;
                                    $formatted_price = Egns_Helper::gofly_format_price($regular_price);
                                }

                                $type = '';
                                if (!empty($applicant_type) && $applicant_type == 'group') {
                                    $type = 'group';
                                } elseif ((!empty($applicant_type) && $applicant_type == 'spouse')) {
                                    $type = 'family';
                                } else {
                                    $type = 'per person';
                                }
                            ?>
                                <div class="swiper-slide">
                                    <div class="single-visa<?php echo esc_attr($key == 0 ? ' active' : '') ?>">
                                        <?php
                                        if (! empty($icon)) {
                                            $ext = strtolower(pathinfo(parse_url($icon, PHP_URL_PATH), PATHINFO_EXTENSION));

                                            if ($ext === 'svg') {
                                                // Try to load the file from uploads
                                                $upload_dir = wp_upload_dir();
                                                $baseurl    = untrailingslashit($upload_dir['baseurl']);
                                                $basedir    = untrailingslashit($upload_dir['basedir']);

                                                if (strpos($icon, $baseurl) === 0) {
                                                    $relative = ltrim(substr($icon, strlen($baseurl)), '/\\');
                                                    $file     = $basedir . '/' . $relative;

                                                    if (file_exists($file)) {
                                                        echo file_get_contents($file);  // show inline svg
                                                    }
                                                }
                                            } else {
                                        ?>
                                                <img src="<?php echo esc_url($icon); ?>" alt="<?php echo esc_attr("image") ?>">
                                        <?php
                                            }
                                        }
                                        ?>

                                        <h6><?php echo esc_html($name) ?></h6>
                                        <?php if ($final_price !== null): ?>
                                            <span>
                                                <?php echo $formatted_price . $formatted_regular ?>
                                                <?php if (!empty($applicant_type)): ?>
                                                    <sub>/
                                                        <?php echo esc_html($type) ?>
                                                        <?php if (in_array($applicant_type, ['group', 'spouse']) && !empty($applicant_limit)): ?>
                                                            (<?php echo esc_html($applicant_limit) ?>)
                                                        <?php endif; ?>
                                                    </sub>
                                                <?php endif; ?>
                                            </span>
                                        <?php endif; ?>
                                    </div>
                                </div>
                            <?php endforeach; ?>
                        </div>
                    </div>
                </div>
                <div class="row gy-5 justify-content-between">
                    <div class="col-xl-7 col-lg-8">
                        <?php
                        foreach ($criterias_lists as $key => $criterias):
                            $requirments = $criterias['visa_requirment_list'] ?? '';
                        ?>
                            <div class="visa-details-wrapper<?php echo esc_attr($key == 0 ? ' active' : '') ?>">
                                <?php foreach ($requirments as $key => $requirment): ?>
                                    <div class="single-requirement mb-50">
                                        <h2><?php echo esc_html($requirment['visa_requirment_title']) ?></h2>
                                        <?php echo wp_kses_post($requirment['visa_requirment_details']) ?>
                                    </div>
                                <?php endforeach; ?>
                                <div class="visa-rejection-area mb-50">
                                    <h2>
                                        <svg width="25" height="25" viewBox="0 0 25 25" xmlns="http://www.w3.org/2000/svg">
                                            <path
                                                d="M13.2688 0.265331C13.0489 0.0934036 12.7779 0 12.4988 0C12.2196 0 11.9486 0.0934036 11.7287 0.265331L9.6536 1.88792L7.04846 1.5204C6.77243 1.48163 6.49135 1.53623 6.24991 1.67552C6.00846 1.81482 5.8205 2.03082 5.71589 2.28919L4.72959 4.73057L2.28821 5.71687C2.02984 5.82148 1.81384 6.00944 1.67455 6.25088C1.53525 6.49233 1.48065 6.7734 1.51942 7.04944L1.88569 9.65708L0.264355 11.7322C0.093041 11.9518 0 12.2224 0 12.501C0 12.7795 0.093041 13.0501 0.264355 13.2698L1.88569 15.3449L1.51942 17.9525C1.48065 18.2285 1.53525 18.5096 1.67455 18.7511C1.81384 18.9925 2.02984 19.1805 2.28821 19.2851L4.72959 20.2714L5.71589 22.7128C5.82029 22.9714 6.00816 23.1876 6.24962 23.3272C6.49109 23.4667 6.77228 23.5215 7.04846 23.4828L9.6561 23.1153L11.7312 24.7366C11.9509 24.9079 12.2214 25.001 12.5 25.001C12.7786 25.001 13.0491 24.9079 13.2688 24.7366L15.3439 23.1153L17.9515 23.4828C18.2277 23.5215 18.5089 23.4667 18.7504 23.3272C18.9918 23.1876 19.1797 22.9714 19.2841 22.7128L20.2704 20.2714L22.7118 19.2851C22.9704 19.1807 23.1867 18.9928 23.3262 18.7514C23.4657 18.5099 23.5205 18.2287 23.4818 17.9525L23.1143 15.3449L24.7356 13.2698C24.907 13.0501 25 12.7795 25 12.501C25 12.2224 24.907 11.9518 24.7356 11.7322L23.1143 9.65708L23.4818 7.04944C23.5205 6.77325 23.4657 6.49206 23.3262 6.2506C23.1867 6.00913 22.9704 5.82126 22.7118 5.71687L20.2704 4.73057L19.2841 2.28919C19.1795 2.03082 18.9915 1.81482 18.7501 1.67552C18.5086 1.53623 18.2276 1.48163 17.9515 1.5204L15.3439 1.88667L13.2688 0.265331Z" />
                                            <path fill-rule="evenodd" clip-rule="evenodd"
                                                d="M10.7234 8.96565C10.4877 8.73794 10.1719 8.61195 9.84414 8.61479C9.51638 8.61764 9.20285 8.74911 8.97108 8.98088C8.7393 9.21265 8.60784 9.52619 8.60499 9.85395C8.60214 10.1817 8.72814 10.4975 8.95585 10.7332L10.7234 12.5008L8.95585 14.2684C8.83645 14.3837 8.74122 14.5217 8.67571 14.6742C8.61019 14.8267 8.57571 14.9907 8.57427 15.1567C8.57282 15.3227 8.60445 15.4873 8.66731 15.6409C8.73016 15.7946 8.82298 15.9341 8.94035 16.0515C9.05773 16.1689 9.1973 16.2617 9.35093 16.3246C9.50456 16.3874 9.66916 16.419 9.83515 16.4176C10.0011 16.4162 10.1652 16.3817 10.3177 16.3162C10.4702 16.2507 10.6081 16.1554 10.7234 16.036L12.491 14.2684L14.2586 16.036C14.3739 16.1554 14.5119 16.2507 14.6644 16.3162C14.8169 16.3817 14.9809 16.4162 15.1469 16.4176C15.3129 16.419 15.4775 16.3874 15.6311 16.3246C15.7848 16.2617 15.9243 16.1689 16.0417 16.0515C16.1591 15.9341 16.2519 15.7946 16.3148 15.6409C16.3776 15.4873 16.4092 15.3227 16.4078 15.1567C16.4064 14.9907 16.3719 14.8267 16.3064 14.6742C16.2408 14.5217 16.1456 14.3837 16.0262 14.2684L14.2586 12.5008L16.0262 10.7332C16.2539 10.4975 16.3799 10.1817 16.3771 9.85395C16.3742 9.52619 16.2428 9.21265 16.011 8.98088C15.7792 8.74911 15.4657 8.61764 15.1379 8.61479C14.8102 8.61195 14.4944 8.73794 14.2586 8.96565L12.491 10.7332L10.7234 8.96565Z" />
                                        </svg>
                                        <?php echo esc_html($criterias['visa_rejection_title']) ?>
                                    </h2>
                                    <div class="visa-rejection-wrapper">
                                        <div class="visa-rejection-content">
                                            <?php echo wp_kses_post($criterias['visa_rejection_details']) ?>
                                        </div>
                                        <div class="visa-rejection-img">
                                            <img src="<?php echo esc_url($criterias['visa_rejection_image']['url']) ?>" alt="<?php echo esc_attr("image") ?>">
                                        </div>
                                    </div>
                                </div>
                                <div class="note-area">
                                    <h2>
                                        <svg width="25" height="25" viewBox="0 0 25 25" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <g>
                                                <path
                                                    d="M10.703 1.76462L1.01685 21.1557C0.215093 22.5421 1.21548 24.2764 2.81704 24.2764H22.1892C23.7908 24.2764 24.7912 22.5421 23.9894 21.1557L14.3033 1.76462C13.5026 0.380003 11.5037 0.380003 10.703 1.76462Z" />
                                                <path
                                                    d="M11.3466 2.11398L1.67152 21.483C1.66485 21.4963 1.65778 21.5094 1.65032 21.5223C1.40638 21.9441 1.40614 22.4479 1.64959 22.8699C1.89305 23.2919 2.32928 23.5439 2.81648 23.5439H22.1886C22.6759 23.5439 23.1121 23.2919 23.3556 22.8699C23.599 22.4479 23.5987 21.9441 23.3548 21.5224C23.3474 21.5095 23.3403 21.4963 23.3337 21.483L13.6586 2.11398C13.4131 1.70314 12.9825 1.45856 12.5025 1.45856C12.0227 1.45856 11.592 1.70314 11.3466 2.11398ZM22.1886 25.0088H2.81648C1.79949 25.0088 0.88895 24.4829 0.380748 23.6019C-0.12345 22.7279 -0.126868 21.686 0.370348 20.8099L10.0472 1.43727C10.0539 1.42394 10.0609 1.41081 10.0684 1.39792C10.5769 0.518625 11.4868 -0.00627518 12.5025 -0.00627518C13.5183 -0.00627518 14.4283 0.518625 14.9368 1.39792C14.9442 1.41081 14.9513 1.42394 14.958 1.43727L24.6348 20.8098C25.132 21.6858 25.1286 22.7278 24.6244 23.6019C24.1163 24.4828 23.2057 25.0088 22.1886 25.0088Z" />
                                                <path
                                                    d="M13.545 14.9436L14.1 8.67504C14.1752 7.73955 13.4353 6.9394 12.4969 6.94116C11.5561 6.94297 10.8184 7.74975 10.9008 8.68696L11.5072 14.9512C11.5538 15.4821 12.0004 15.8882 12.5333 15.8842C13.0634 15.8803 13.5026 15.472 13.545 14.9436Z" />
                                                <path
                                                    d="M13.8863 20.0458C13.8863 20.8104 13.2664 21.4303 12.5018 21.4303C11.7371 21.4303 11.1172 20.8104 11.1172 20.0458C11.1172 19.2811 11.7371 18.6613 12.5018 18.6613C13.2664 18.6613 13.8863 19.2811 13.8863 20.0458Z" />
                                                <path
                                                    d="M12.4983 6.94118L12.4961 6.94123V15.8827C12.509 15.8831 12.5217 15.8844 12.5348 15.8843C13.0648 15.8803 13.504 15.472 13.5465 14.9437L14.1014 8.67506C14.1766 7.73962 13.4368 6.93942 12.4983 6.94118Z" />
                                            </g>
                                        </svg>
                                        <?php echo esc_html($criterias['visa_note_title']) ?>
                                    </h2>
                                    <?php echo wp_kses_post($criterias['visa_note_details']) ?>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    </div>
                    <div class="col-lg-4 col-md-8">
                        <div class="visa-dt-sidebar mb-40">
                            <?php
                            foreach ($criterias_lists as $key => $criterias):
                                $name            = $criterias['visa_criterias_name'] ?? '';
                                $icon            = $criterias['visa_criterias_icon']['url'] ?? '';
                                $regular_price   = !empty($criterias['visa_processing_price']) ? $criterias['visa_processing_price'] : null;
                                $sale_price      = !empty($criterias['visa_processing_price_sale']) ? $criterias['visa_processing_price_sale'] : null;
                                $applicant_type  = $criterias['visa_applicant_type'] ?? '';
                                $applicant_limit = $criterias['visa_applicant_limit'] ?? '';
                                $sale_check      = !empty($criterias['visa_processing_price_sale_check']) ? $criterias['visa_processing_price_sale_check'] : false;

                                $final_price       = null;
                                $formatted_price   = '';
                                $formatted_regular = '';

                                // Choose display price based on $sale_check
                                if ($sale_check && $sale_price !== null) {
                                    $final_price       = $sale_price;
                                    $formatted_price   = Egns_Helper::gofly_format_price($sale_price);
                                    $formatted_regular = ($regular_price !== null && $sale_price < $regular_price)
                                        ? '<del>' . Egns_Helper::gofly_format_price($regular_price) . '</del>'
                                        :   '';
                                } elseif ($regular_price !== null) {
                                    $final_price     = $regular_price;
                                    $formatted_price = Egns_Helper::gofly_format_price($regular_price);
                                }

                                $type = '';
                                if (!empty($applicant_type) && $applicant_type == 'group') {
                                    $type = 'group';
                                } elseif ((!empty($applicant_type) && $applicant_type == 'spouse')) {
                                    $type = 'family';
                                } else {
                                    $type = 'per person';
                                }

                                $validity_time = $criterias['visa_validity_time'];
                                $entry_type    = $criterias['visa_entry_type'];
                                $entry         = '';
                                if (!empty($entry_type) && $entry_type == 'single') {
                                    $entry = 'Single entry';
                                } elseif ((!empty($entry_type) && $entry_type == 'double')) {
                                    $entry = 'Double entry';
                                } else {
                                    $entry = 'Multiple';
                                }
                            ?>
                                <div class="visa-info-wrap<?php echo esc_attr($key == 0 ? ' active' : '') ?>">
                                    <div class="title-area">
                                        <h4><?php echo esc_html($name) ?></h4>
                                        <span><?php echo esc_html__('Validity', 'gofly-core') . ' - ' . esc_html($validity_time) . ' / ' .  esc_html($entry) ?></span>
                                    </div>
                                    <div class="pricing-area">
                                        <span>Visa Pricing</span>
                                        <?php if ($final_price !== null): ?>
                                            <strong>
                                                <?php echo $formatted_price . $formatted_regular ?>
                                                <?php if (!empty($applicant_type)): ?>
                                                    <sub>/
                                                        <?php echo esc_html($type) ?>
                                                        <?php if (in_array($applicant_type, ['group', 'spouse']) && !empty($applicant_limit)): ?>
                                                            (<?php echo esc_html($applicant_limit) ?>)
                                                        <?php endif; ?>
                                                    </sub>
                                                <?php endif; ?>
                                            </strong>
                                        <?php endif; ?>
                                    </div>
                                    <a href="#" class="primary-btn1" data-bs-toggle="modal" data-bs-target="#visaApplyModal">
                                        <span>
                                            <?php echo esc_html__('Apply Online', 'gofly-core') ?>
                                            <svg width="10" height="10" viewBox="0 0 10 10" xmlns="http://www.w3.org/2000/svg">
                                                <path d="M9.73535 1.14746C9.57033 1.97255 9.32924 3.26406 9.24902 4.66797C9.16817 6.08312 9.25559 7.5453 9.70214 8.73633C9.84754 9.12406 9.65129 9.55659 9.26367 9.70215C8.9001 9.83849 8.4969 9.67455 8.32812 9.33398L8.29785 9.26367L8.19921 8.98438C7.73487 7.5758 7.67054 5.98959 7.75097 4.58203C7.77875 4.09598 7.82525 3.62422 7.87988 3.17969L1.53027 9.53027C1.23738 9.82317 0.762615 9.82317 0.469722 9.53027C0.176829 9.23738 0.176829 8.76262 0.469722 8.46973L6.83593 2.10254C6.3319 2.16472 5.79596 2.21841 5.25 2.24902C3.8302 2.32862 2.2474 2.26906 0.958003 1.79102L0.704097 1.68945L0.635738 1.65527C0.303274 1.47099 0.157578 1.06102 0.310542 0.704102C0.463655 0.347333 0.860941 0.170391 1.22363 0.28418L1.29589 0.310547L1.48828 0.387695C2.47399 0.751207 3.79966 0.827571 5.16601 0.750977C6.60111 0.670504 7.97842 0.428235 8.86132 0.262695L9.95312 0.0585938L9.73535 1.14746Z"></path>
                                            </svg>
                                        </span>
                                        <span>
                                            <?php echo esc_html__('Apply Online', 'gofly-core') ?>
                                            <svg width="10" height="10" viewBox="0 0 10 10" xmlns="http://www.w3.org/2000/svg">
                                                <path d="M9.73535 1.14746C9.57033 1.97255 9.32924 3.26406 9.24902 4.66797C9.16817 6.08312 9.25559 7.5453 9.70214 8.73633C9.84754 9.12406 9.65129 9.55659 9.26367 9.70215C8.9001 9.83849 8.4969 9.67455 8.32812 9.33398L8.29785 9.26367L8.19921 8.98438C7.73487 7.5758 7.67054 5.98959 7.75097 4.58203C7.77875 4.09598 7.82525 3.62422 7.87988 3.17969L1.53027 9.53027C1.23738 9.82317 0.762615 9.82317 0.469722 9.53027C0.176829 9.23738 0.176829 8.76262 0.469722 8.46973L6.83593 2.10254C6.3319 2.16472 5.79596 2.21841 5.25 2.24902C3.8302 2.32862 2.2474 2.26906 0.958003 1.79102L0.704097 1.68945L0.635738 1.65527C0.303274 1.47099 0.157578 1.06102 0.310542 0.704102C0.463655 0.347333 0.860941 0.170391 1.22363 0.28418L1.29589 0.310547L1.48828 0.387695C2.47399 0.751207 3.79966 0.827571 5.16601 0.750977C6.60111 0.670504 7.97842 0.428235 8.86132 0.262695L9.95312 0.0585938L9.73535 1.14746Z"></path>
                                            </svg>
                                        </span>
                                    </a>
                                    <span>
                                        <svg width="14" height="14" viewBox="0 0 14 14" xmlns="http://www.w3.org/2000/svg">
                                            <path
                                                d="M7 0C3.13423 0 0 3.13423 0 7C0 10.8662 3.13423 14 7 14C10.8662 14 14 10.8666 14 7C14 3.13423 10.8662 0 7 0ZM7 12.6875C3.85877 12.6875 1.31252 10.1412 1.31252 7C1.31252 3.85877 3.85877 1.31252 7 1.31252C10.1412 1.31252 12.6875 3.85877 12.6875 7C12.6875 10.1412 10.1412 12.6875 7 12.6875ZM7.00044 3.06992C6.49908 3.06992 6.11973 3.33157 6.11973 3.75418V7.63042C6.11973 8.05347 6.49903 8.31423 7.00044 8.31423C7.48956 8.31423 7.88115 8.04256 7.88115 7.63042V3.75418C7.8811 3.3416 7.48956 3.06992 7.00044 3.06992ZM7.00044 9.1875C6.51875 9.1875 6.12673 9.57952 6.12673 10.0616C6.12673 10.5428 6.51875 10.9349 7.00044 10.9349C7.48212 10.9349 7.87371 10.5428 7.87371 10.0616C7.87366 9.57948 7.48212 9.1875 7.00044 9.1875Z" />
                                        </svg>
                                        <?php echo esc_html($criterias['visa_exclusives']) ?>
                                    </span>
                                </div>
                            <?php endforeach; ?>
                            <?php if (Egns_Helper::egns_get_visa_value('visa_advertisement_btn') == false && !empty(Egns_Helper::egns_get_visa_value('visa_advertisement_img', 'url'))): ?>
                                <div class="visa-assistance mt-40">
                                    <img src="<?php echo esc_url(Egns_Helper::egns_get_visa_value('visa_advertisement_img', 'url'));  ?>" alt="<?php echo esc_attr("image") ?>">
                                </div>
                            <?php else: ?>
                                <div class="visa-assistance mt-40">
                                    <?php echo wp_kses_post(Egns_Helper::egns_get_visa_value('visa_advertisement_code'));  ?>
                                </div>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>

<?php

    }
}

Plugin::instance()->widgets_manager->register(new Gofly_Visa_Critaria_Tab_Widget());
