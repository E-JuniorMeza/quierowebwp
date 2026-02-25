<?php

namespace Elementor;

if (!defined('ABSPATH')) exit;  // Exit if accessed directly

use Egns_Core;
use Elementor\core\Schemes;
use Egns_Core\Egns_Helper;

class Gofly_Hotel_Check_Availability_Image_Widget extends Widget_Base
{

    public function get_name()
    {
        return 'gofly_hotel_check_availability';
    }

    public function get_title()
    {
        return esc_html__('EG Hotel Check Availability', 'gofly-core');
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

        //===================== Content =======================//

        $this->start_controls_section(
            'gofly_hotel_check_availability_content_section',
            [
                'label' => esc_html__('Content', 'gofly-core')
            ]
        );
        $this->add_control(
            'hotel_custom_panel_notice',
            [
                'type'        => \Elementor\Controls_Manager::NOTICE,
                'notice_type' => 'warning',
                'dismissible' => true,
                'heading'     => esc_html__('Notice', 'gofly-core'),
                'content'     => esc_html__('This Widgets only for custom post "Hotel" details page.', 'gofly-core'),
            ]
        );

        $this->add_control(
            'hotel_check_or_form_enable',
            [
                'label'   => esc_html__('Select Booking', 'gofly-core'),
                'type'    => \Elementor\Controls_Manager::SELECT,
                'options' => [
                    'both'  => esc_html__('Both', 'gofly-core'),
                    'form'  => esc_html__('Enquiry Form', 'gofly-core'),
                    'check' => esc_html__('Check Availability', 'gofly-core'),
                ],
                'default' => 'both',
            ]
        );
        $this->add_control(
            'hotel_check_availability_btn',
            [
                'label'       => esc_html__('Check Availability Button', 'gofly-core'),
                'type'        => \Elementor\Controls_Manager::TEXT,
                'default'     => esc_html__('Check Availability', 'gofly-core'),
                'placeholder' => esc_html__('Type your button label here', 'gofly-core'),
                'label_block' => true,
                'condition'   => [
                    'hotel_check_or_form_enable!' => 'form',
                ],
            ]
        );
        $this->add_control(
            'hotel_enquiry_btn',
            [
                'label'       => esc_html__('Enquiry Button', 'gofly-core'),
                'type'        => \Elementor\Controls_Manager::TEXT,
                'default'     => esc_html__('Submit an Enquiry', 'gofly-core'),
                'placeholder' => esc_html__('Type your button label here', 'gofly-core'),
                'label_block' => true,
                'condition'   => [
                    'hotel_check_or_form_enable!' => 'check',
                ],
            ]
        );
        $this->add_control(
            'hotel_bonus_lbl',
            [
                'label'       => esc_html__('Bonus label', 'gofly-core'),
                'type'        => \Elementor\Controls_Manager::TEXT,
                'default'     => esc_html__('Bonus Activity Included – Limited Time!', 'gofly-core'),
                'placeholder' => esc_html__('Type your text here', 'gofly-core'),
                'label_block' => true,
            ]
        );

        $this->add_control(
            'hotel_booking_priority_list',
            [
                'label'  => esc_html__('Priority list', 'gofly-core'),
                'type'   => \Elementor\Controls_Manager::REPEATER,
                'fields' => [
                    [
                        'name'        => 'hotel_priority_item',
                        'label'       => esc_html__('Priority', 'gofly-core'),
                        'type'        => \Elementor\Controls_Manager::TEXT,
                        'default'     => esc_html__('Mony Back Guarentee.', 'gofly-core'),
                        'label_block' => true,
                    ],
                ],
                'default' => [
                    [
                        'hotel_priority_item' => esc_html__('Mony Back Guarentee.', 'gofly-core'),
                    ],
                    [
                        'hotel_priority_item' => esc_html__('Your Safety is Our Top Priority.', 'gofly-core'),
                    ],
                ],
                'title_field' => '{{{ hotel_priority_item }}}',
            ]
        );


        $this->end_controls_section();


        //===================== Content Style =======================//

        $this->start_controls_section(
            'gofly_hotel_check_availability_style_section',
            [
                'label' => esc_html__('Style Section', 'gofly-core'),
                'tab'   => \Elementor\Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_control(
            'gofly_hotel_check_availability_area_style',
            [
                'label'     => esc_html__('Availability Check Area', 'gofly-core'),
                'type'      => \Elementor\Controls_Manager::HEADING,
                'separator' => 'after',
            ]
        );

        $this->add_control(
            'gofly_hotel_check_availability_area_bg_color',
            [
                'label'     => esc_html__('Card Background Color', 'gofly-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .hotel-details-page .hotel-details-sidebar .pricing-and-booking-area' => 'background-color: {{VALUE}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'gofly_hotel_check_availability_area_border_radius',
            [
                'label'      => esc_html__(
                    'Card Border Radius',
                    'gofly-core'
                ),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%'],
                'selectors'  => [
                    '{{WRAPPER}} .hotel-details-page .hotel-details-sidebar .pricing-and-booking-area' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'
                ]
            ]
        );

        $this->add_control(
            'gofly_hotel_check_availability_area_discout_badge_style',
            [
                'label'     => esc_html__('Discount Badge', 'gofly-core'),
                'type'      => \Elementor\Controls_Manager::HEADING,
                'separator' => 'after',
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'label'    => esc_html__('Typography', 'gofly-core'),
                'name'     => 'gofly_hotel_check_availability_area_discount_typ',
                'selector' => '{{WRAPPER}} .hotel-details-page .hotel-details-sidebar .pricing-and-booking-area .batch span',
            ]
        );

        $this->add_control(
            'gofly_hotel_check_availability_area_discount_color',
            [
                'label'     => esc_html__('Color', 'gofly-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .hotel-details-page .hotel-details-sidebar .pricing-and-booking-area .batch span' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'gofly_hotel_check_availability_area_discount_bg_color',
            [
                'label'     => esc_html__('Background Color', 'gofly-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .hotel-details-page .hotel-details-sidebar .pricing-and-booking-area .batch span' => 'background-color: {{VALUE}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'gofly_hotel_check_availability_area_discount_border_radius',
            [
                'label'      => esc_html__(
                    'Border Radius',
                    'gofly-core'
                ),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%'],
                'selectors'  => [
                    '{{WRAPPER}} .hotel-details-page .hotel-details-sidebar .pricing-and-booking-area .batch span' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'
                ]
            ]
        );

        $this->add_control(
            'gofly_hotel_check_availability_area_price_style',
            [
                'label'     => esc_html__('Price', 'gofly-core'),
                'type'      => \Elementor\Controls_Manager::HEADING,
                'separator' => 'after',
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'label'    => esc_html__('Pricing Title Typography', 'gofly-core'),
                'name'     => 'gofly_hotel_check_availability_area_title_typ',
                'selector' => '{{WRAPPER}} .hotel-details-page .hotel-details-sidebar .pricing-and-booking-area .price-area h6',

            ]
        );

        $this->add_control(
            'gofly_hotel_check_availability_area_title_color',
            [
                'label'     => esc_html__('Pricing Title Color', 'gofly-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .hotel-details-page .hotel-details-sidebar .pricing-and-booking-area .price-area h6' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'label'    => esc_html__('Price Typography', 'gofly-core'),
                'name'     => 'gofly_hotel_check_availability_price_typ',
                'selector' => '{{WRAPPER}} .hotel-details-page .hotel-details-sidebar .pricing-and-booking-area .price-area span',

            ]
        );

        $this->add_control(
            'gofly_hotel_check_availability_price_color',
            [
                'label'     => esc_html__('Price Color', 'gofly-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .hotel-details-page .hotel-details-sidebar .pricing-and-booking-area .price-area span' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'label'    => esc_html__('Price Info Typography', 'gofly-core'),
                'name'     => 'gofly_hotel_check_availability_price_info_typ',
                'selector' => '{{WRAPPER}} .hotel-details-page .hotel-details-sidebar .pricing-and-booking-area .price-area span sub',

            ]
        );

        $this->add_control(
            'gofly_hotel_check_availability_price_info_color',
            [
                'label'     => esc_html__('Price Info Color', 'gofly-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .hotel-details-page .hotel-details-sidebar .pricing-and-booking-area .price-area span sub' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'label'    => esc_html__('Pricing Features Typography', 'gofly-core'),
                'name'     => 'gofly_hotel_check_availability_price_fea_typ',
                'selector' => '{{WRAPPER}} .hotel-details-page .hotel-details-sidebar .pricing-and-booking-area ul li',

            ]
        );

        $this->add_control(
            'gofly_hotel_check_availability_price_fea_color',
            [
                'label'     => esc_html__('Pricing Features Color', 'gofly-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .hotel-details-page .hotel-details-sidebar .pricing-and-booking-area ul li' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'gofly_hotel_check_availability_price_info_icon_color',
            [
                'label'     => esc_html__('Pricing Features Icon Color', 'gofly-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .hotel-details-page .hotel-details-sidebar .pricing-and-booking-area ul li svg'      => 'fill: {{VALUE}};',
                    '{{WRAPPER}} .hotel-details-page .hotel-details-sidebar .pricing-and-booking-area ul li svg rect' => 'stroke: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'gofly_hotel_check_availability_apply_button_style',
            [
                'label'     => esc_html__('Button 1', 'gofly-core'),
                'type'      => \Elementor\Controls_Manager::HEADING,
                'separator' => 'after',
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'label'    => esc_html__('Button 1 Typography', 'gofly-core'),
                'name'     => 'gofly_hotel_check_availability_button_typ',
                'selector' => '{{WRAPPER}} .primary-btn1',

            ]
        );

        $this->add_control(
            'gofly_hotel_check_availability_button_color',
            [
                'label'     => esc_html__('Button 1 Color', 'gofly-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .primary-btn1' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'gofly_hotel_check_availability_button_hover_color',
            [
                'label'     => esc_html__('Button 1 Hover Color', 'gofly-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .primary-btn1:hover' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'gofly_hotel_check_availability_button_icon_color',
            [
                'label'     => esc_html__('Button 1 Icon Color', 'gofly-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .primary-btn1 svg' => 'fill: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'gofly_hotel_check_availability_button_icon_hover_color',
            [
                'label'     => esc_html__('Button 1 Hover Icon Color', 'gofly-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .primary-btn1 span:last-child svg' => 'fill: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'gofly_hotel_check_availability_button_bg_color',
            [
                'label'     => esc_html__('Button 1 BG Color', 'gofly-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .primary-btn1' => 'background-color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'gofly_hotel_check_availability_button_hover_bg_color',
            [
                'label'     => esc_html__('Button 1 Hover BG Color', 'gofly-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .primary-btn1::after' => 'background-color: {{VALUE}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'gofly_hotel_check_availability_button_border_radius',
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

        $this->add_control(
            'gofly_hotel_enquiry_button_style',
            [
                'label'     => esc_html__('Button 2', 'gofly-core'),
                'type'      => \Elementor\Controls_Manager::HEADING,
                'separator' => 'after',
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'label'    => esc_html__('Button 2 Typography', 'gofly-core'),
                'name'     => 'gofly_hotel_enquiry_button_typ',
                'selector' => '{{WRAPPER}} .primary-btn1.transparent',

            ]
        );

        $this->add_control(
            'gofly_hotel_enquiry_button_color',
            [
                'label'     => esc_html__('Button 2 Color', 'gofly-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .primary-btn1.transparent' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'gofly_hotel_enquiry_button_hover_color',
            [
                'label'     => esc_html__('Button 2 Hover Color', 'gofly-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .primary-btn1.transparent:hover' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'gofly_hotel_enquiry_button_icon_color',
            [
                'label'     => esc_html__('Button 2 Icon Color', 'gofly-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .primary-btn1.transparent svg' => 'fill: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'gofly_hotel_enquiry_button_icon_hover_color',
            [
                'label'     => esc_html__('Button 2 Hover Icon Color', 'gofly-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .primary-btn1.transparent span:last-child svg' => 'fill: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'gofly_hotel_enquiry_button_bg_color',
            [
                'label'     => esc_html__('Button 2 BG Color', 'gofly-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .primary-btn1.transparent' => 'background-color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'gofly_hotel_enquiry_button_hover_bg_color',
            [
                'label'     => esc_html__('Button 2 Hover BG Color', 'gofly-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .primary-btn1.transparent::after' => 'background-color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'gofly_hotel_enquiry_button_hover_border_color',
            [
                'label'     => esc_html__('Button 2 Border Color', 'gofly-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .primary-btn1.transparent' => 'border-color: {{VALUE}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'gofly_hotel_enquiry_button_border_radius',
            [
                'label'      => esc_html__(
                    'Border Radius',
                    'gofly-core'
                ),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%'],
                'selectors'  => [
                    '{{WRAPPER}} .primary-btn1.transparent' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'
                ]
            ]
        );

        $this->add_control(
            'gofly_hotel_enquiry_offer_info_style',
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
                'name'     => 'gofly_hotel_enquiry_offer_notice_typ',
                'selector' => '{{WRAPPER}} .hotel-details-page .hotel-details-sidebar .pricing-and-booking-area > span',

            ]
        );

        $this->add_control(
            'gofly_hotel_enquiry_offer_notice_color',
            [
                'label'     => esc_html__('Offer Notice Color', 'gofly-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .hotel-details-page .hotel-details-sidebar .pricing-and-booking-area > span' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'gofly_hotel_enquiry_offer_notice_icon_color',
            [
                'label'     => esc_html__('Offer Notice Icon Color', 'gofly-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .hotel-details-page .hotel-details-sidebar .pricing-and-booking-area > span svg' => 'fill: {{VALUE}};',
                ],
            ]
        );

        $this->end_controls_section();
    }
    protected function render()
    {

        $settings = $this->get_settings_for_display();

        $id = get_the_ID();

        $hotel_package = Egns_Helper::egns_get_hotel_value('hotel_pricing_package');




?>
        <div class="hotel-details-page">
            <div class="hotel-details-sidebar">
                <div class="pricing-and-booking-area">
                    <?php if (Egns_Helper::hotel_has_sale_price($id)): ?>
                        <div class="batch">
                            <span><?php echo Egns_Helper::hotel_discount_percentage($id) . esc_html__('% Off', 'gofly-core') ?></span>
                        </div>
                    <?php endif; ?>
                    <?php echo Egns_Helper::hotel_global_starting_price($id, 'two') ?>
                    <?php if (!empty($settings['hotel_booking_priority_list'])): ?>
                        <ul>
                            <?php foreach ($settings['hotel_booking_priority_list'] as $item): ?>
                                <li>
                                    <svg width="14" height="14" viewBox="0 0 14 14" xmlns="http://www.w3.org/2000/svg">
                                        <rect x="0.5" y="0.5" width="13" height="13" rx="6.5" />
                                        <path
                                            d="M11.0419 5.31317L6.17665 10.1811C6.09912 10.256 6.00086 10.2948 5.90268 10.2948C5.85176 10.2949 5.80132 10.2849 5.75428 10.2654C5.70724 10.2458 5.66454 10.2172 5.62863 10.1811L2.95813 7.51056C2.80562 7.36059 2.80562 7.11506 2.95813 6.96255L3.90173 6.01632C4.04655 5.8716 4.30502 5.8716 4.44983 6.01632L5.90268 7.46917L9.5503 3.81894C9.58623 3.78292 9.6289 3.75434 9.67587 3.73483C9.72285 3.71531 9.77321 3.70524 9.82408 3.70519C9.92742 3.70519 10.0257 3.74657 10.098 3.81894L11.0416 4.76525C11.1944 4.91776 11.1944 5.16329 11.0419 5.31317Z" />
                                    </svg>
                                    <?php echo esc_html($item['hotel_priority_item']) ?>
                                </li>
                            <?php endforeach; ?>
                        </ul>
                    <?php endif; ?>
                    <?php if ($settings['hotel_check_or_form_enable'] != 'form' && !empty($hotel_package)): ?>
                        <button class="primary-btn1 mb-20" id="scroll-btn">
                            <span>
                                <?php echo esc_html($settings['hotel_check_availability_btn']) ?>
                                <svg width="10" height="10" viewBox="0 0 10 10" xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M9.73535 1.14746C9.57033 1.97255 9.32924 3.26406 9.24902 4.66797C9.16817 6.08312 9.25559 7.5453 9.70214 8.73633C9.84754 9.12406 9.65129 9.55659 9.26367 9.70215C8.9001 9.83849 8.4969 9.67455 8.32812 9.33398L8.29785 9.26367L8.19921 8.98438C7.73487 7.5758 7.67054 5.98959 7.75097 4.58203C7.77875 4.09598 7.82525 3.62422 7.87988 3.17969L1.53027 9.53027C1.23738 9.82317 0.762615 9.82317 0.469722 9.53027C0.176829 9.23738 0.176829 8.76262 0.469722 8.46973L6.83593 2.10254C6.3319 2.16472 5.79596 2.21841 5.25 2.24902C3.8302 2.32862 2.2474 2.26906 0.958003 1.79102L0.704097 1.68945L0.635738 1.65527C0.303274 1.47099 0.157578 1.06102 0.310542 0.704102C0.463655 0.347333 0.860941 0.170391 1.22363 0.28418L1.29589 0.310547L1.48828 0.387695C2.47399 0.751207 3.79966 0.827571 5.16601 0.750977C6.60111 0.670504 7.97842 0.428235 8.86132 0.262695L9.95312 0.0585938L9.73535 1.14746Z">
                                    </path>
                                </svg>
                            </span>
                            <span>
                                <?php echo esc_html($settings['hotel_check_availability_btn']) ?>
                                <svg width="10" height="10" viewBox="0 0 10 10" xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M9.73535 1.14746C9.57033 1.97255 9.32924 3.26406 9.24902 4.66797C9.16817 6.08312 9.25559 7.5453 9.70214 8.73633C9.84754 9.12406 9.65129 9.55659 9.26367 9.70215C8.9001 9.83849 8.4969 9.67455 8.32812 9.33398L8.29785 9.26367L8.19921 8.98438C7.73487 7.5758 7.67054 5.98959 7.75097 4.58203C7.77875 4.09598 7.82525 3.62422 7.87988 3.17969L1.53027 9.53027C1.23738 9.82317 0.762615 9.82317 0.469722 9.53027C0.176829 9.23738 0.176829 8.76262 0.469722 8.46973L6.83593 2.10254C6.3319 2.16472 5.79596 2.21841 5.25 2.24902C3.8302 2.32862 2.2474 2.26906 0.958003 1.79102L0.704097 1.68945L0.635738 1.65527C0.303274 1.47099 0.157578 1.06102 0.310542 0.704102C0.463655 0.347333 0.860941 0.170391 1.22363 0.28418L1.29589 0.310547L1.48828 0.387695C2.47399 0.751207 3.79966 0.827571 5.16601 0.750977C6.60111 0.670504 7.97842 0.428235 8.86132 0.262695L9.95312 0.0585938L9.73535 1.14746Z">
                                    </path>
                                </svg>
                            </span>
                        </button>
                    <?php endif; ?>

                    <?php if ($settings['hotel_check_or_form_enable'] != 'check'): ?>
                        <button class="primary-btn1 transparent" data-bs-toggle="modal"
                            data-bs-target="#enquiry<?php echo esc_attr($id) ?>">
                            <span>
                                <?php echo esc_html($settings['hotel_enquiry_btn']) ?>
                                <svg width="10" height="10" viewBox="0 0 10 10" xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M9.73535 1.14746C9.57033 1.97255 9.32924 3.26406 9.24902 4.66797C9.16817 6.08312 9.25559 7.5453 9.70214 8.73633C9.84754 9.12406 9.65129 9.55659 9.26367 9.70215C8.9001 9.83849 8.4969 9.67455 8.32812 9.33398L8.29785 9.26367L8.19921 8.98438C7.73487 7.5758 7.67054 5.98959 7.75097 4.58203C7.77875 4.09598 7.82525 3.62422 7.87988 3.17969L1.53027 9.53027C1.23738 9.82317 0.762615 9.82317 0.469722 9.53027C0.176829 9.23738 0.176829 8.76262 0.469722 8.46973L6.83593 2.10254C6.3319 2.16472 5.79596 2.21841 5.25 2.24902C3.8302 2.32862 2.2474 2.26906 0.958003 1.79102L0.704097 1.68945L0.635738 1.65527C0.303274 1.47099 0.157578 1.06102 0.310542 0.704102C0.463655 0.347333 0.860941 0.170391 1.22363 0.28418L1.29589 0.310547L1.48828 0.387695C2.47399 0.751207 3.79966 0.827571 5.16601 0.750977C6.60111 0.670504 7.97842 0.428235 8.86132 0.262695L9.95312 0.0585938L9.73535 1.14746Z">
                                    </path>
                                </svg>
                            </span>
                            <span>
                                <?php echo esc_html($settings['hotel_enquiry_btn']) ?>
                                <svg width="10" height="10" viewBox="0 0 10 10" xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M9.73535 1.14746C9.57033 1.97255 9.32924 3.26406 9.24902 4.66797C9.16817 6.08312 9.25559 7.5453 9.70214 8.73633C9.84754 9.12406 9.65129 9.55659 9.26367 9.70215C8.9001 9.83849 8.4969 9.67455 8.32812 9.33398L8.29785 9.26367L8.19921 8.98438C7.73487 7.5758 7.67054 5.98959 7.75097 4.58203C7.77875 4.09598 7.82525 3.62422 7.87988 3.17969L1.53027 9.53027C1.23738 9.82317 0.762615 9.82317 0.469722 9.53027C0.176829 9.23738 0.176829 8.76262 0.469722 8.46973L6.83593 2.10254C6.3319 2.16472 5.79596 2.21841 5.25 2.24902C3.8302 2.32862 2.2474 2.26906 0.958003 1.79102L0.704097 1.68945L0.635738 1.65527C0.303274 1.47099 0.157578 1.06102 0.310542 0.704102C0.463655 0.347333 0.860941 0.170391 1.22363 0.28418L1.29589 0.310547L1.48828 0.387695C2.47399 0.751207 3.79966 0.827571 5.16601 0.750977C6.60111 0.670504 7.97842 0.428235 8.86132 0.262695L9.95312 0.0585938L9.73535 1.14746Z">
                                    </path>
                                </svg>
                            </span>
                        </button>
                    <?php endif; ?>
                    <span>
                        <svg width="14" height="14" viewBox="0 0 14 14" xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M7 0C3.13423 0 0 3.13423 0 7C0 10.8662 3.13423 14 7 14C10.8662 14 14 10.8666 14 7C14 3.13423 10.8662 0 7 0ZM7 12.6875C3.85877 12.6875 1.31252 10.1412 1.31252 7C1.31252 3.85877 3.85877 1.31252 7 1.31252C10.1412 1.31252 12.6875 3.85877 12.6875 7C12.6875 10.1412 10.1412 12.6875 7 12.6875ZM7.00044 3.06992C6.49908 3.06992 6.11973 3.33157 6.11973 3.75418V7.63042C6.11973 8.05347 6.49903 8.31423 7.00044 8.31423C7.48956 8.31423 7.88115 8.04256 7.88115 7.63042V3.75418C7.8811 3.3416 7.48956 3.06992 7.00044 3.06992ZM7.00044 9.1875C6.51875 9.1875 6.12673 9.57952 6.12673 10.0616C6.12673 10.5428 6.51875 10.9349 7.00044 10.9349C7.48212 10.9349 7.87371 10.5428 7.87371 10.0616C7.87366 9.57948 7.48212 9.1875 7.00044 9.1875Z" />
                        </svg>
                        <?php echo esc_html($settings['hotel_bonus_lbl']) ?>
                    </span>
                </div>
            </div>
        </div>

        <div class="modal enquiry-modal fade" id="enquiry<?php echo esc_attr($id) ?>" tabindex="-1" aria-labelledby="enquiryModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <button type="button" class="close-btn" data-bs-dismiss="modal" aria-label="Close">
                        <svg width="10" height="10" viewBox="0 0 10 10" xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M2.00247 0.500545C1.79016 0.505525 1.58918 0.582706 1.4362 0.735547L0.694403 1.479C0.345704 1.82743 0.389689 2.43243 0.79164 2.83493L3.00694 5.05341L0.79164 7.27092C0.389689 7.67328 0.345566 8.27842 0.694403 8.62753L1.4362 9.37044C1.7849 9.71872 2.38879 9.67543 2.7913 9.27293L5.00659 7.05473L7.22189 9.27293C7.62467 9.67543 8.22898 9.71872 8.57699 9.37044L9.31989 8.62753C9.6679 8.27856 9.62461 7.67342 9.22182 7.27092L7.00653 5.05341L9.22182 2.83493C9.62461 2.43243 9.6679 1.82743 9.31989 1.479L8.57699 0.735547C8.22898 0.386433 7.62467 0.430557 7.22189 0.833614L5.00659 3.05126L2.7913 0.833753C2.56515 0.606635 2.27482 0.493906 2.00247 0.500545Z" />
                        </svg>
                    </button>
                    <div class="modal-body">
                        <h4 class="modal-title" id="enquiryModalLabel"><?php echo Egns_Helper::egns_get_theme_option('hotel_inquiry_form_title') ?></h4>
                        <?php echo do_shortcode(Egns_Helper::egns_get_theme_option('hotel_inquiry_form_shortcode')) ?>
                    </div>
                </div>
            </div>
        </div>

<?php

    }
}

Plugin::instance()->widgets_manager->register(new Gofly_Hotel_Check_Availability_Image_Widget());
