<?php

namespace Elementor;

if (!defined('ABSPATH')) exit;  // Exit if accessed directly

use Egns_Core;
use Elementor\core\Schemes;
use Egns_Core\Egns_Helper;

class Gofly_Exp_Availability_Widget extends Widget_Base
{

    public function get_name()
    {
        return 'gofly_exp_availability';
    }

    public function get_title()
    {
        return esc_html__('EG Experience Check Availability', 'gofly-core');
    }

    public function get_icon()
    {
        return 'egns-widget-icon';
    }

    public function get_categories()
    {
        return ['gofly_exp'];
    }

    protected function register_controls()
    {

        //===================== Content =======================//

        $this->start_controls_section(
            'gofly_exp_availability_content_section',
            [
                'label' => esc_html__('Content', 'gofly-core')
            ]
        );
        $this->add_control(
            'gofly_custom_panel_notice',
            [
                'type'        => \Elementor\Controls_Manager::NOTICE,
                'notice_type' => 'warning',
                'dismissible' => true,
                'heading'     => esc_html__('Notice', 'gofly-core'),
                'content'     => esc_html__('This Widgets only for custom post "Tour" details page.', 'gofly-core'),
            ]
        );

        $this->add_control(
            'gofly_exp_check_or_form_enable',
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
            'gofly_exp_check_availability_heading',
            [
                'label'       => esc_html__('Availability Popup Heading', 'gofly-core'),
                'type'        => \Elementor\Controls_Manager::TEXT,
                'default'     => esc_html__('Dates & Availability', 'gofly-core'),
                'placeholder' => esc_html__('Type your heading here', 'gofly-core'),
                'label_block' => true,
                'condition'   => [
                    'gofly_exp_check_or_form_enable!' => 'form',
                ],
            ]
        );
        $this->add_control(
            'gofly_exp_check_availability_desc',
            [
                'label'       => esc_html__('Availability Popup description', 'gofly-core'),
                'type'        => \Elementor\Controls_Manager::TEXTAREA,
                'default'     => esc_html__('Select your travel date & time, also minium traveller for reason easily booking a package.', 'gofly-core'),
                'placeholder' => esc_html__('Type your text here', 'gofly-core'),
                'label_block' => true,
                'condition'   => [
                    'gofly_exp_check_or_form_enable!' => 'form',
                ],
            ]
        );
        $this->add_control(
            'gofly_exp_check_availability_btn',
            [
                'label'       => esc_html__('Check Availability Button', 'gofly-core'),
                'type'        => \Elementor\Controls_Manager::TEXT,
                'default'     => esc_html__('Check Availability', 'gofly-core'),
                'placeholder' => esc_html__('Type your button label here', 'gofly-core'),
                'label_block' => true,
                'condition'   => [
                    'gofly_exp_check_or_form_enable!' => 'form',
                ],
            ]
        );
        $this->add_control(
            'gofly_exp_enquiry_btn',
            [
                'label'       => esc_html__('Enquiry Button', 'gofly-core'),
                'type'        => \Elementor\Controls_Manager::TEXT,
                'default'     => esc_html__('Submit an Enquiry', 'gofly-core'),
                'placeholder' => esc_html__('Type your button label here', 'gofly-core'),
                'label_block' => true,
                'condition'   => [
                    'gofly_exp_check_or_form_enable!' => 'check',
                ],
            ]
        );
        $this->add_control(
            'gofly_exp_bonus_lbl',
            [
                'label'       => esc_html__('Bonus label', 'gofly-core'),
                'type'        => \Elementor\Controls_Manager::TEXT,
                'default'     => esc_html__('Bonus Activity Included – Limited Time!', 'gofly-core'),
                'placeholder' => esc_html__('Type your text here', 'gofly-core'),
                'label_block' => true,
            ]
        );

        $this->add_control(
            'gofly_exp_booking_priority_list',
            [
                'label'  => esc_html__('Priority list', 'gofly-core'),
                'type'   => \Elementor\Controls_Manager::REPEATER,
                'fields' => [
                    [
                        'name'        => 'gofly_exp_priority_item',
                        'label'       => esc_html__('Priority', 'gofly-core'),
                        'type'        => \Elementor\Controls_Manager::TEXT,
                        'default'     => esc_html__('Mony Back Guarentee.', 'gofly-core'),
                        'label_block' => true,
                    ],
                ],
                'default' => [
                    [
                        'gofly_exp_priority_item' => esc_html__('Mony Back Guarentee.', 'gofly-core'),
                    ],
                    [
                        'gofly_exp_priority_item' => esc_html__('Your Safety is Our Top Priority.', 'gofly-core'),
                    ],
                ],
                'title_field' => '{{{ gofly_exp_priority_item }}}',
            ]
        );

        $this->end_controls_section();


        //===================== Content Style =======================//

        $this->start_controls_section(
            'gofly_exp_availability_style_section',
            [
                'label' => esc_html__('Style Section', 'gofly-core'),
                'tab'   => \Elementor\Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_control(
            'gofly_exp_availability_area_style',
            [
                'label'     => esc_html__('Availability Check Area', 'gofly-core'),
                'type'      => \Elementor\Controls_Manager::HEADING,
                'separator' => 'after',
            ]
        );

        $this->add_control(
            'gofly_exp_availability_area_bg_color',
            [
                'label'     => esc_html__('Card Background Color', 'gofly-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .package-details-sidebar .pricing-and-booking-area' => 'background-color: {{VALUE}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'gofly_exp_availability_area_border_radius',
            [
                'label'      => esc_html__(
                    'Card Border Radius',
                    'gofly-core'
                ),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%'],
                'selectors'  => [
                    '{{WRAPPER}} .package-details-sidebar .pricing-and-booking-area' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'
                ]
            ]
        );

        $this->add_control(
            'gofly_exp_availability_area_discout_badge_style',
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
                'name'     => 'gofly_exp_availability_area_discount_typ',
                'selector' => '{{WRAPPER}} .package-details-sidebar .pricing-and-booking-area .batch span',
            ]
        );

        $this->add_control(
            'gofly_exp_availability_area_discount_color',
            [
                'label'     => esc_html__('Color', 'gofly-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .package-details-sidebar .pricing-and-booking-area .batch span' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'gofly_exp_availability_area_discount_bg_color',
            [
                'label'     => esc_html__('Background Color', 'gofly-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .package-details-sidebar .pricing-and-booking-area .batch span' => 'background-color: {{VALUE}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'gofly_exp_availability_area_discount_border_radius',
            [
                'label'      => esc_html__(
                    'Border Radius',
                    'gofly-core'
                ),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%'],
                'selectors'  => [
                    '{{WRAPPER}} .package-details-sidebar .pricing-and-booking-area .batch span' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'
                ]
            ]
        );

        $this->add_control(
            'gofly_exp_availability_area_price_style',
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
                'name'     => 'gofly_exp_availability_area_title_typ',
                'selector' => '{{WRAPPER}} .package-details-sidebar .pricing-and-booking-area .price-area h6',

            ]
        );

        $this->add_control(
            'gofly_exp_availability_area_title_color',
            [
                'label'     => esc_html__('Pricing Title Color', 'gofly-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .package-details-sidebar .pricing-and-booking-area .price-area h6' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'label'    => esc_html__('Price Typography', 'gofly-core'),
                'name'     => 'gofly_exp_availability_price_typ',
                'selector' => '{{WRAPPER}} .package-details-sidebar .pricing-and-booking-area .price-area span',

            ]
        );

        $this->add_control(
            'gofly_exp_availability_price_color',
            [
                'label'     => esc_html__('Price Color', 'gofly-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .package-details-sidebar .pricing-and-booking-area .price-area span' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'label'    => esc_html__('Price Info Typography', 'gofly-core'),
                'name'     => 'gofly_exp_availability_price_info_typ',
                'selector' => '{{WRAPPER}} .package-details-sidebar .pricing-and-booking-area .price-area span sub',

            ]
        );

        $this->add_control(
            'gofly_exp_availability2_price_info_color',
            [
                'label'     => esc_html__('Price Info Color', 'gofly-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .package-details-sidebar .pricing-and-booking-area .price-area span sub' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'label'    => esc_html__('Pricing Features Typography', 'gofly-core'),
                'name'     => 'gofly_exp_availability2_price_info_typ',
                'selector' => '{{WRAPPER}} .package-details-sidebar .pricing-and-booking-area ul li',

            ]
        );

        $this->add_control(
            'gofly_exp_availability_price_info_color',
            [
                'label'     => esc_html__('Pricing Features Color', 'gofly-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .package-details-sidebar .pricing-and-booking-area ul li' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'gofly_exp_availability_price_info_icon_color',
            [
                'label'     => esc_html__('Pricing Features Icon Color', 'gofly-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .package-details-sidebar .pricing-and-booking-area ul li svg'      => 'fill: {{VALUE}};',
                    '{{WRAPPER}} .package-details-sidebar .pricing-and-booking-area ul li svg rect' => 'stroke: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'gofly_exp_availability_apply_button_style',
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
                'name'     => 'gofly_exp_availability_button_typ',
                'selector' => '{{WRAPPER}} .primary-btn1',

            ]
        );

        $this->add_control(
            'gofly_exp_availability_button_color',
            [
                'label'     => esc_html__('Button 1 Color', 'gofly-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .primary-btn1' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'gofly_exp_availability_button_hover_color',
            [
                'label'     => esc_html__('Button 1 Hover Color', 'gofly-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .primary-btn1:hover' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'gofly_exp_availability_button_icon_color',
            [
                'label'     => esc_html__('Button 1 Icon Color', 'gofly-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .primary-btn1 svg' => 'fill: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'gofly_exp_availability_button_icon_hover_color',
            [
                'label'     => esc_html__('Button 1 Hover Icon Color', 'gofly-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .primary-btn1 span:last-child svg' => 'fill: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'gofly_exp_availability_button_bg_color',
            [
                'label'     => esc_html__('Button 1 BG Color', 'gofly-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .primary-btn1' => 'background-color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'gofly_exp_availability_button_hover_bg_color',
            [
                'label'     => esc_html__('Button 1 Hover BG Color', 'gofly-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .primary-btn1::after' => 'background-color: {{VALUE}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'gofly_exp_availability_button_border_radius',
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
            'gofly_exp_availability_button_style',
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
                'name'     => 'gofly_exp_availability_button2_typ',
                'selector' => '{{WRAPPER}} .primary-btn1.transparent',

            ]
        );

        $this->add_control(
            'gofly_exp_availability_button2_color',
            [
                'label'     => esc_html__('Button 2 Color', 'gofly-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .primary-btn1.transparent' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'gofly_exp_availability_button2_hover_color',
            [
                'label'     => esc_html__('Button 2 Hover Color', 'gofly-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .primary-btn1.transparent:hover' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'gofly_exp_availability_button2_icon_color',
            [
                'label'     => esc_html__('Button 2 Icon Color', 'gofly-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .primary-btn1.transparent svg' => 'fill: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'gofly_exp_availability_button2_icon_hover_color',
            [
                'label'     => esc_html__('Button 2 Hover Icon Color', 'gofly-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .primary-btn1.transparent span:last-child svg' => 'fill: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'gofly_exp_availability_button2_bg_color',
            [
                'label'     => esc_html__('Button 2 BG Color', 'gofly-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .primary-btn1.transparent' => 'background-color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'gofly_exp_availability_button2_hover_bg_color',
            [
                'label'     => esc_html__('Button 2 Hover BG Color', 'gofly-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .primary-btn1.transparent::after' => 'background-color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'gofly_exp_availability_button_hover_border_color',
            [
                'label'     => esc_html__('Button 2 Border Color', 'gofly-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .primary-btn1.transparent' => 'border-color: {{VALUE}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'gofly_exp_availability_button2_border_radius',
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
            'gofly_exp_availability_offer_info_style',
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
                'name'     => 'gofly_exp_availability_offer_notice_typ',
                'selector' => '{{WRAPPER}} .package-details-sidebar .pricing-and-booking-area > span',

            ]
        );

        $this->add_control(
            'gofly_exp_availability_offer_notice_color',
            [
                'label'     => esc_html__('Offer Notice Color', 'gofly-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .package-details-sidebar .pricing-and-booking-area > span' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'gofly_exp_availability_offer_notice_icon_color',
            [
                'label'     => esc_html__('Offer Notice Icon Color', 'gofly-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .package-details-sidebar .pricing-and-booking-area > span svg' => 'fill: {{VALUE}};',
                ],
            ]
        );

        $this->end_controls_section();
    }

    protected function render()
    {

        $settings = $this->get_settings_for_display();

        $id = get_the_ID();

        $service_terms = get_the_terms($id, 'experience-service');
        $exp_package   = Egns_Helper::egns_get_exp_value('experience_pricing_package');

?>

        <div class="package-details-sidebar">
            <div class="pricing-and-booking-area">
                <?php if (Egns_Helper::exp_has_sale_price($id)): ?>
                    <div class="batch">
                        <span><?php echo Egns_Helper::exp_discount_percentage($id) . esc_html__('% Off', 'gofly-core') ?></span>
                    </div>
                <?php endif; ?>
                <?php echo Egns_Helper::exp_global_starting_price($id, 'two') ?>
                <?php if (!empty($settings['gofly_exp_booking_priority_list'])): ?>
                    <ul>
                        <?php foreach ($settings['gofly_exp_booking_priority_list'] as $item): ?>
                            <li>
                                <svg width="14" height="14" viewBox="0 0 14 14" xmlns="http://www.w3.org/2000/svg">
                                    <rect x="0.5" y="0.5" width="13" height="13" rx="6.5" />
                                    <path
                                        d="M11.0419 5.31317L6.17665 10.1811C6.09912 10.256 6.00086 10.2948 5.90268 10.2948C5.85176 10.2949 5.80132 10.2849 5.75428 10.2654C5.70724 10.2458 5.66454 10.2172 5.62863 10.1811L2.95813 7.51056C2.80562 7.36059 2.80562 7.11506 2.95813 6.96255L3.90173 6.01632C4.04655 5.8716 4.30502 5.8716 4.44983 6.01632L5.90268 7.46917L9.5503 3.81894C9.58623 3.78292 9.6289 3.75434 9.67587 3.73483C9.72285 3.71531 9.77321 3.70524 9.82408 3.70519C9.92742 3.70519 10.0257 3.74657 10.098 3.81894L11.0416 4.76525C11.1944 4.91776 11.1944 5.16329 11.0419 5.31317Z" />
                                </svg>
                                <?php echo esc_html($item['gofly_exp_priority_item']) ?>
                            </li>
                        <?php endforeach; ?>
                    </ul>
                <?php endif; ?>
                <?php if ($settings['gofly_exp_check_or_form_enable'] != 'form' && !empty($exp_package)): ?>
                    <button class="primary-btn1 mb-20" data-bs-toggle="modal" data-bs-target="#booking<?php echo esc_attr($id) ?>">
                        <span>
                            <?php echo esc_html($settings['gofly_exp_check_availability_btn']) ?>
                            <svg width="10" height="10" viewBox="0 0 10 10" xmlns="http://www.w3.org/2000/svg">
                                <path d="M9.73535 1.14746C9.57033 1.97255 9.32924 3.26406 9.24902 4.66797C9.16817 6.08312 9.25559 7.5453 9.70214 8.73633C9.84754 9.12406 9.65129 9.55659 9.26367 9.70215C8.9001 9.83849 8.4969 9.67455 8.32812 9.33398L8.29785 9.26367L8.19921 8.98438C7.73487 7.5758 7.67054 5.98959 7.75097 4.58203C7.77875 4.09598 7.82525 3.62422 7.87988 3.17969L1.53027 9.53027C1.23738 9.82317 0.762615 9.82317 0.469722 9.53027C0.176829 9.23738 0.176829 8.76262 0.469722 8.46973L6.83593 2.10254C6.3319 2.16472 5.79596 2.21841 5.25 2.24902C3.8302 2.32862 2.2474 2.26906 0.958003 1.79102L0.704097 1.68945L0.635738 1.65527C0.303274 1.47099 0.157578 1.06102 0.310542 0.704102C0.463655 0.347333 0.860941 0.170391 1.22363 0.28418L1.29589 0.310547L1.48828 0.387695C2.47399 0.751207 3.79966 0.827571 5.16601 0.750977C6.60111 0.670504 7.97842 0.428235 8.86132 0.262695L9.95312 0.0585938L9.73535 1.14746Z"></path>
                            </svg>
                        </span>
                        <span>
                            <?php echo esc_html($settings['gofly_exp_check_availability_btn']) ?>
                            <svg width="10" height="10" viewBox="0 0 10 10" xmlns="http://www.w3.org/2000/svg">
                                <path d="M9.73535 1.14746C9.57033 1.97255 9.32924 3.26406 9.24902 4.66797C9.16817 6.08312 9.25559 7.5453 9.70214 8.73633C9.84754 9.12406 9.65129 9.55659 9.26367 9.70215C8.9001 9.83849 8.4969 9.67455 8.32812 9.33398L8.29785 9.26367L8.19921 8.98438C7.73487 7.5758 7.67054 5.98959 7.75097 4.58203C7.77875 4.09598 7.82525 3.62422 7.87988 3.17969L1.53027 9.53027C1.23738 9.82317 0.762615 9.82317 0.469722 9.53027C0.176829 9.23738 0.176829 8.76262 0.469722 8.46973L6.83593 2.10254C6.3319 2.16472 5.79596 2.21841 5.25 2.24902C3.8302 2.32862 2.2474 2.26906 0.958003 1.79102L0.704097 1.68945L0.635738 1.65527C0.303274 1.47099 0.157578 1.06102 0.310542 0.704102C0.463655 0.347333 0.860941 0.170391 1.22363 0.28418L1.29589 0.310547L1.48828 0.387695C2.47399 0.751207 3.79966 0.827571 5.16601 0.750977C6.60111 0.670504 7.97842 0.428235 8.86132 0.262695L9.95312 0.0585938L9.73535 1.14746Z"></path>
                            </svg>
                        </span>
                    </button>
                <?php endif; ?>
                <?php if ($settings['gofly_exp_check_or_form_enable'] != 'check'): ?>
                    <button class="primary-btn1 transparent" data-bs-toggle="modal" data-bs-target="#enquiry<?php echo esc_attr($id) ?>">
                        <span>
                            <?php echo esc_html($settings['gofly_exp_enquiry_btn']) ?>
                            <svg width="10" height="10" viewBox="0 0 10 10" xmlns="http://www.w3.org/2000/svg">
                                <path d="M9.73535 1.14746C9.57033 1.97255 9.32924 3.26406 9.24902 4.66797C9.16817 6.08312 9.25559 7.5453 9.70214 8.73633C9.84754 9.12406 9.65129 9.55659 9.26367 9.70215C8.9001 9.83849 8.4969 9.67455 8.32812 9.33398L8.29785 9.26367L8.19921 8.98438C7.73487 7.5758 7.67054 5.98959 7.75097 4.58203C7.77875 4.09598 7.82525 3.62422 7.87988 3.17969L1.53027 9.53027C1.23738 9.82317 0.762615 9.82317 0.469722 9.53027C0.176829 9.23738 0.176829 8.76262 0.469722 8.46973L6.83593 2.10254C6.3319 2.16472 5.79596 2.21841 5.25 2.24902C3.8302 2.32862 2.2474 2.26906 0.958003 1.79102L0.704097 1.68945L0.635738 1.65527C0.303274 1.47099 0.157578 1.06102 0.310542 0.704102C0.463655 0.347333 0.860941 0.170391 1.22363 0.28418L1.29589 0.310547L1.48828 0.387695C2.47399 0.751207 3.79966 0.827571 5.16601 0.750977C6.60111 0.670504 7.97842 0.428235 8.86132 0.262695L9.95312 0.0585938L9.73535 1.14746Z"></path>
                            </svg>
                        </span>
                        <span>
                            <?php echo esc_html($settings['gofly_exp_enquiry_btn']) ?>
                            <svg width="10" height="10" viewBox="0 0 10 10" xmlns="http://www.w3.org/2000/svg">
                                <path d="M9.73535 1.14746C9.57033 1.97255 9.32924 3.26406 9.24902 4.66797C9.16817 6.08312 9.25559 7.5453 9.70214 8.73633C9.84754 9.12406 9.65129 9.55659 9.26367 9.70215C8.9001 9.83849 8.4969 9.67455 8.32812 9.33398L8.29785 9.26367L8.19921 8.98438C7.73487 7.5758 7.67054 5.98959 7.75097 4.58203C7.77875 4.09598 7.82525 3.62422 7.87988 3.17969L1.53027 9.53027C1.23738 9.82317 0.762615 9.82317 0.469722 9.53027C0.176829 9.23738 0.176829 8.76262 0.469722 8.46973L6.83593 2.10254C6.3319 2.16472 5.79596 2.21841 5.25 2.24902C3.8302 2.32862 2.2474 2.26906 0.958003 1.79102L0.704097 1.68945L0.635738 1.65527C0.303274 1.47099 0.157578 1.06102 0.310542 0.704102C0.463655 0.347333 0.860941 0.170391 1.22363 0.28418L1.29589 0.310547L1.48828 0.387695C2.47399 0.751207 3.79966 0.827571 5.16601 0.750977C6.60111 0.670504 7.97842 0.428235 8.86132 0.262695L9.95312 0.0585938L9.73535 1.14746Z"></path>
                            </svg>
                        </span>
                    </button>
                <?php endif; ?>
                <span>
                    <svg width="14" height="14" viewBox="0 0 14 14" xmlns="http://www.w3.org/2000/svg">
                        <path
                            d="M7 0C3.13423 0 0 3.13423 0 7C0 10.8662 3.13423 14 7 14C10.8662 14 14 10.8666 14 7C14 3.13423 10.8662 0 7 0ZM7 12.6875C3.85877 12.6875 1.31252 10.1412 1.31252 7C1.31252 3.85877 3.85877 1.31252 7 1.31252C10.1412 1.31252 12.6875 3.85877 12.6875 7C12.6875 10.1412 10.1412 12.6875 7 12.6875ZM7.00044 3.06992C6.49908 3.06992 6.11973 3.33157 6.11973 3.75418V7.63042C6.11973 8.05347 6.49903 8.31423 7.00044 8.31423C7.48956 8.31423 7.88115 8.04256 7.88115 7.63042V3.75418C7.8811 3.3416 7.48956 3.06992 7.00044 3.06992ZM7.00044 9.1875C6.51875 9.1875 6.12673 9.57952 6.12673 10.0616C6.12673 10.5428 6.51875 10.9349 7.00044 10.9349C7.48212 10.9349 7.87371 10.5428 7.87371 10.0616C7.87366 9.57948 7.48212 9.1875 7.00044 9.1875Z" />
                    </svg>
                    <?php echo esc_html($settings['gofly_exp_bonus_lbl']) ?>
                </span>
            </div>
        </div>


        <!-- Booking Modal section Start-->
        <div class="modal booking-modal fade" id="booking<?php echo esc_attr($id) ?>" tabindex="-1" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <button type="button" class="close-btn" data-bs-dismiss="modal" aria-label="Close">
                        <svg width="10" height="10" viewBox="0 0 10 10" xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M2.00247 0.500545C1.79016 0.505525 1.58918 0.582706 1.4362 0.735547L0.694403 1.479C0.345704 1.82743 0.389689 2.43243 0.79164 2.83493L3.00694 5.05341L0.79164 7.27092C0.389689 7.67328 0.345566 8.27842 0.694403 8.62753L1.4362 9.37044C1.7849 9.71872 2.38879 9.67543 2.7913 9.27293L5.00659 7.05473L7.22189 9.27293C7.62467 9.67543 8.22898 9.71872 8.57699 9.37044L9.31989 8.62753C9.6679 8.27856 9.62461 7.67342 9.22182 7.27092L7.00653 5.05341L9.22182 2.83493C9.62461 2.43243 9.6679 1.82743 9.31989 1.479L8.57699 0.735547C8.22898 0.386433 7.62467 0.430557 7.22189 0.833614L5.00659 3.05126L2.7913 0.833753C2.56515 0.606635 2.27482 0.493906 2.00247 0.500545Z" />
                        </svg>
                    </button>
                    <div class="modal-header">
                        <h4><?php echo esc_html($settings['gofly_exp_check_availability_heading']) ?></h4>
                        <p><?php echo esc_html($settings['gofly_exp_check_availability_desc']) ?></p>
                    </div>
                    <div class="modal-body">
                        <form>
                            <div class="row g-4 mb-50">
                                <div class="col-sm-6">
                                    <div class="single-field">
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
                                        <div class="custom-select-dropdown exp-order">
                                            <input type="text" name="inOut" readonly value="Sep 12 - Sep 20">
                                            <div class="selected-date"></div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="single-field">
                                        <svg width="18" height="18" viewBox="0 0 18 18" xmlns="http://www.w3.org/2000/svg">
                                            <path
                                                d="M9.00003 1.52136C4.02939 1.52136 0 5.55075 0 10.5214C0 12.6873 0.765549 14.6746 2.04035 16.2275C2.23702 14.6528 3.80989 13.3209 6.01543 12.6901C6.82119 13.4409 7.86199 13.8964 8.99997 13.8964C10.1112 13.8964 11.1316 13.4638 11.9292 12.7445C14.1538 13.4304 15.6928 14.8401 15.7434 16.4787C17.1465 14.8914 18 12.8067 18 10.5214C18 5.55075 13.9706 1.52136 9.00003 1.52136ZM9.00003 12.8306C8.42549 12.8306 7.88412 12.6727 7.40341 12.3993C6.24498 11.7401 5.44736 10.3912 5.44736 8.83383C5.44736 6.63003 7.04103 4.83703 9.00003 4.83703C10.9592 4.83703 12.5527 6.63003 12.5527 8.83383C12.5527 10.4151 11.7301 11.7807 10.5429 12.4284C10.0751 12.6835 9.55325 12.8306 9.00003 12.8306Z" />
                                        </svg>
                                        <div class="custom-select-dropdown">
                                            <h6><span id="ticket-qty">1</span> <?php echo esc_html__('Ticket', 'gofly-core') ?></h6>
                                            <span><?php echo esc_html__('Select tickets', 'gofly-core') ?></span>
                                        </div>
                                        <div class="custom-select-wrap">
                                            <div class="title-area">
                                                <h6><?php echo esc_html__('Travelers', 'gofly-core') ?></h6>
                                                <span><?php echo esc_html__('You can book a maximum of', 'gofly-core') . sprintf(' %02d ', Egns_Helper::egns_get_exp_value('experience_maximum_ticket')) . esc_html__('tickets.', 'gofly-core') ?></span>
                                            </div>
                                            <ul class="guest-count">
                                                <li class="single-item">
                                                    <div class="title">
                                                        <h6><?php echo esc_html__('Ticket', 'gofly-core') ?></h6>
                                                        <Span><?php echo sprintf('%02d ', Egns_Helper::egns_get_exp_value('experience_minimum_age')) . esc_html__('years+', 'gofly-core') ?></Span>
                                                    </div>
                                                    <div class="quantity-counter">
                                                        <a href="#" data-type="ticket" class="ticket-quantity__minus"><i class="bi bi-dash"></i></a>
                                                        <input name="ticket_quantity" type="text" class="quantity__input" value="1" data-type="ticket">
                                                        <a href="#" data-type="ticket" class="ticket-quantity__plus"><i class="bi bi-plus"></i></a>
                                                    </div>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                        <?php if (!empty($exp_package)): ?>
                            <div class="package-list">
                                <div class="accordion accordion-flush" id="accordionExperiencePackage">
                                    <?php foreach ($exp_package as $key => $package): ?>
                                        <div class="accordion-item exp-accordion-item">
                                            <div class="accordion-header" id="flush-package-heading<?php echo esc_attr($key) ?>">
                                                <div class="accordion-button<?php echo $key == 0 ? '' : ' collapsed' ?>" role="button" data-bs-toggle="collapse" data-bs-target="#flush-package-collapse<?php echo esc_attr($key) ?>" aria-expanded="false" aria-controls="flush-package-collapse<?php echo esc_attr($key) ?>">
                                                    <div class="batch">
                                                        <span><?php echo esc_html($package['experience_pricing_package_typ']) ?></span>
                                                    </div>
                                                    <div class="title-area">
                                                        <span class="check"></span>
                                                        <h6><?php echo esc_html($package['experience_pricing_package_title']) ?></h6>
                                                    </div>
                                                    <?php
                                                    if (isset($package['experience_price']) && $package['experience_price'] !== '') {
                                                        $regular = floatval($package['experience_price']);
                                                        if (!empty($package['experience_price_sale_check']) && isset($package['experience_price_sale']) && $package['experience_price_sale'] !== '') {
                                                            $sale = floatval($package['experience_price_sale']);
                                                            echo '<span class="total"><del>' . Egns_Helper::gofly_format_price($regular) . '</del>' . Egns_Helper::gofly_format_price($sale) . '</span>';
                                                        } else {
                                                            echo '<span class="total">' . Egns_Helper::gofly_format_price($regular) . '</span>';
                                                        }
                                                    }
                                                    ?>
                                                </div>
                                            </div>
                                            <div id="flush-package-collapse<?php echo esc_attr($key) ?>" class="accordion-collapse collapse<?php echo $key == 0 ? ' show' : '' ?>" aria-labelledby="flush-package-heading<?php echo esc_attr($key) ?>" data-bs-parent="#accordionExperiencePackage">
                                                <div class="accordion-body">
                                                    <div class="tour-info-and-calculate-area">
                                                        <div class="dsc">
                                                            <?php echo wp_kses_post($package['experience_pricing_package_desc']) ?>
                                                        </div>
                                                        <div class="price-calculate">
                                                            <?php
                                                            if (isset($package['experience_price']) && $package['experience_price'] !== '') {
                                                                $regular = floatval($package['experience_price']);
                                                                if (
                                                                    !empty($package['experience_price_sale_check'])
                                                                    && isset($package['experience_price_sale'])
                                                                    && $package['experience_price_sale'] !== ''
                                                                ) {
                                                                    $sale = floatval($package['experience_price_sale']);
                                                                    echo '<span class="ticket-price" data-type="ticket" data-price="' . esc_attr($sale) . '"><del>' . Egns_Helper::gofly_format_price($regular) . '</del>' . Egns_Helper::gofly_format_price($sale) . ' <i class="bi bi-x"></i> <b class="line-tc-qty" data-type="ticket">00</b> Per Ticket</span>';
                                                                } else {
                                                                    echo '<span class="ticket-price" data-type="ticket" data-price="' . esc_attr($regular) . '">' . Egns_Helper::gofly_format_price($regular) . ' <i class="bi bi-x"></i>  <b class="line-tc-qty" data-type="ticket">00</b>  Per Ticket</span>';
                                                                }
                                                            }
                                                            ?>
                                                        </div>
                                                    </div>
                                                    <?php if (!empty($service_terms)): ?>
                                                        <div class="additional-service-area">
                                                            <h6><?php echo esc_html('Additional Services', 'gofly-core') ?> -</h6>
                                                            <ul class="service-list">
                                                                <?php
                                                                foreach ($service_terms as $term) {
                                                                    $price_sr = get_term_meta($term->term_id, 'egns_experience_price', true);
                                                                ?>
                                                                    <li class="service" data-id="<?php echo esc_attr($term->slug); ?>" data-price="<?php echo esc_attr($price_sr['experience_service_price']); ?>">
                                                                        <div class="service-info-wrap">
                                                                            <label class="containerss">
                                                                                <input type="checkbox">
                                                                                <span class="checkmark"></span>
                                                                            </label>
                                                                            <div class="service-info">
                                                                                <h6><?php echo esc_html($term->name) ?></h6>
                                                                                <?php if (!empty($term->description)): ?>
                                                                                    <p><?php echo esc_html($term->description) ?></p>
                                                                                <?php endif; ?>
                                                                            </div>
                                                                        </div>
                                                                        <div class="pricing-and-count-area disabled">
                                                                            <span><?php echo Egns_Helper::gofly_format_price($price_sr['experience_service_price']) ?></span>
                                                                            <div class="quantity-counter">
                                                                                <a href="#" data-type="adult" class="quantity__minus"><i class="bi bi-dash"></i></a>
                                                                                <input name="quantity" type="text" class="quantity__input" value="01">
                                                                                <a href="#" data-type="adult" class="quantity__plus"><i class="bi bi-plus"></i></a>
                                                                            </div>
                                                                        </div>
                                                                    </li>
                                                                <?php }; ?>
                                                            </ul>
                                                        </div>
                                                    <?php endif; ?>
                                                    <div class="btn-area">
                                                        <a href="#" class="primary-btn1 two add-to-cart-btn">
                                                            <span>
                                                                <?php echo esc_html__('Book Now', 'gofly-core') ?>
                                                                <svg width="10" height="10" viewBox="0 0 10 10" xmlns="http://www.w3.org/2000/svg">
                                                                    <path d="M9.73535 1.14746C9.57033 1.97255 9.32924 3.26406 9.24902 4.66797C9.16817 6.08312 9.25559 7.5453 9.70214 8.73633C9.84754 9.12406 9.65129 9.55659 9.26367 9.70215C8.9001 9.83849 8.4969 9.67455 8.32812 9.33398L8.29785 9.26367L8.19921 8.98438C7.73487 7.5758 7.67054 5.98959 7.75097 4.58203C7.77875 4.09598 7.82525 3.62422 7.87988 3.17969L1.53027 9.53027C1.23738 9.82317 0.762615 9.82317 0.469722 9.53027C0.176829 9.23738 0.176829 8.76262 0.469722 8.46973L6.83593 2.10254C6.3319 2.16472 5.79596 2.21841 5.25 2.24902C3.8302 2.32862 2.2474 2.26906 0.958003 1.79102L0.704097 1.68945L0.635738 1.65527C0.303274 1.47099 0.157578 1.06102 0.310542 0.704102C0.463655 0.347333 0.860941 0.170391 1.22363 0.28418L1.29589 0.310547L1.48828 0.387695C2.47399 0.751207 3.79966 0.827571 5.16601 0.750977C6.60111 0.670504 7.97842 0.428235 8.86132 0.262695L9.95312 0.0585938L9.73535 1.14746Z"></path>
                                                                </svg>
                                                            </span>
                                                            <span>
                                                                <?php echo esc_html__('Book Now', 'gofly-core') ?>
                                                                <svg width="10" height="10" viewBox="0 0 10 10" xmlns="http://www.w3.org/2000/svg">
                                                                    <path d="M9.73535 1.14746C9.57033 1.97255 9.32924 3.26406 9.24902 4.66797C9.16817 6.08312 9.25559 7.5453 9.70214 8.73633C9.84754 9.12406 9.65129 9.55659 9.26367 9.70215C8.9001 9.83849 8.4969 9.67455 8.32812 9.33398L8.29785 9.26367L8.19921 8.98438C7.73487 7.5758 7.67054 5.98959 7.75097 4.58203C7.77875 4.09598 7.82525 3.62422 7.87988 3.17969L1.53027 9.53027C1.23738 9.82317 0.762615 9.82317 0.469722 9.53027C0.176829 9.23738 0.176829 8.76262 0.469722 8.46973L6.83593 2.10254C6.3319 2.16472 5.79596 2.21841 5.25 2.24902C3.8302 2.32862 2.2474 2.26906 0.958003 1.79102L0.704097 1.68945L0.635738 1.65527C0.303274 1.47099 0.157578 1.06102 0.310542 0.704102C0.463655 0.347333 0.860941 0.170391 1.22363 0.28418L1.29589 0.310547L1.48828 0.387695C2.47399 0.751207 3.79966 0.827571 5.16601 0.750977C6.60111 0.670504 7.97842 0.428235 8.86132 0.262695L9.95312 0.0585938L9.73535 1.14746Z"></path>
                                                                </svg>
                                                            </span>
                                                        </a>
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
        </div>
        <!-- Booking Modal section End-->

        <!-- Enquiry Modal section Start-->
        <div class="modal enquiry-modal fade" id="enquiry<?php echo esc_attr($id) ?>" tabindex="-1" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <button type="button" class="close-btn" data-bs-dismiss="modal" aria-label="Close">
                        <svg width="10" height="10" viewBox="0 0 10 10" xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M2.00247 0.500545C1.79016 0.505525 1.58918 0.582706 1.4362 0.735547L0.694403 1.479C0.345704 1.82743 0.389689 2.43243 0.79164 2.83493L3.00694 5.05341L0.79164 7.27092C0.389689 7.67328 0.345566 8.27842 0.694403 8.62753L1.4362 9.37044C1.7849 9.71872 2.38879 9.67543 2.7913 9.27293L5.00659 7.05473L7.22189 9.27293C7.62467 9.67543 8.22898 9.71872 8.57699 9.37044L9.31989 8.62753C9.6679 8.27856 9.62461 7.67342 9.22182 7.27092L7.00653 5.05341L9.22182 2.83493C9.62461 2.43243 9.6679 1.82743 9.31989 1.479L8.57699 0.735547C8.22898 0.386433 7.62467 0.430557 7.22189 0.833614L5.00659 3.05126L2.7913 0.833753C2.56515 0.606635 2.27482 0.493906 2.00247 0.500545Z" />
                        </svg>
                    </button>
                    <div class="modal-body">
                        <h4 class="modal-title" id="enquiryModalLabel"><?php echo Egns_Helper::egns_get_theme_option('exp_inquiry_form_title') ?></h4>
                        <?php echo do_shortcode(Egns_Helper::egns_get_theme_option('exp_inquiry_form_shortcode')) ?>
                    </div>
                </div>
            </div>
        </div>
        <!-- Enquiry Modal section End-->

<?php

    }
}

Plugin::instance()->widgets_manager->register(new Gofly_Exp_Availability_Widget());
