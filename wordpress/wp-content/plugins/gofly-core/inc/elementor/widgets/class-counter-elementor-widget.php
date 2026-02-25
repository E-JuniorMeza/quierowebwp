<?php

namespace Elementor;

if (!defined('ABSPATH')) exit;  // Exit if accessed directly

use Elementor\core\Schemes;
use Egns_Core\Egns_Helper;

class Gofly_Counter_Widget extends Widget_Base
{

    public function get_name()
    {
        return 'gofly_counter';
    }

    public function get_title()
    {
        return esc_html__('EG Counter', 'gofly-core');
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
            'gofly_counter_genaral',
            [
                'label' => esc_html__('General', 'gofly-core')
            ]
        );

        $this->add_control(
            'gofly_counter_genaral_style_selection',
            [
                'label'   => esc_html__('Select Style', 'gofly-core'),
                'type'    => Controls_Manager::SELECT,
                'options' => [
                    'style_one'   => esc_html__('Style One', 'gofly-core'),
                    'style_two'   => esc_html__('Style Two', 'gofly-core'),
                    'style_three' => esc_html__('Style Three', 'gofly-core'),
                    'style_four'  => esc_html__('Style Four', 'gofly-core'),
                ],
                'default' => 'style_one',
            ]
        );

        $this->add_control(
            'gofly_counter_genaral_show_divider_switcher',
            [
                'label'        => esc_html__("Show Devider Image?", 'gofly-core'),
                'type'         => \Elementor\Controls_Manager::SWITCHER,
                'label_on'     => esc_html__('Enable', 'gofly-core'),
                'label_off'    => esc_html__('Disable', 'gofly-core'),
                'return_value' => 'yes',
                'default'      => 'yes',
            ]
        );

        $this->add_control(
            'gofly_counter_genaral_icon_image',
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

        $this->add_control(
            'gofly_counter_genaral_counter_number',
            [
                'label'       => esc_html__('Counter Number', 'gofly-core'),
                'type'        => \Elementor\Controls_Manager::TEXT,
                'default'     => '26',
                'placeholder' => esc_html__('write your number here', 'gofly-core'),
                'label_block' => true,
            ]
        );

        $this->add_control(
            'gofly_counter_genaral_counter_sign',
            [
                'label'       => esc_html__('Counter Sign', 'gofly-core'),
                'type'        => \Elementor\Controls_Manager::TEXT,
                'default'     => 'K+',
                'placeholder' => esc_html__('write your sign here', 'gofly-core'),
                'label_block' => true,
            ]
        );

        $this->add_control(
            'gofly_counter_genaral_counter_title',
            [
                'label'       => esc_html__('Counter Title', 'gofly-core'),
                'type'        => \Elementor\Controls_Manager::TEXT,
                'default'     => 'Tour Completed',
                'placeholder' => esc_html__('write your title here', 'gofly-core'),
                'label_block' => true,
            ]
        );

        $this->end_controls_section();

        //============Style One Start=============//

        $this->start_controls_section(
            'gofly_counter_style_one_genaral',
            [
                'label'     => esc_html__('Styles', 'gofly-core'),
                'tab'       => Controls_Manager::TAB_STYLE,
                'condition' => [
                    'gofly_counter_genaral_style_selection' => ['style_one'],
                ]
            ]
        );

        $this->add_control(
            'gofly_counter_style_one_genaral_area_style',
            [
                'label'     => esc_html__('General', 'gofly-core'),
                'type'      => \Elementor\Controls_Manager::HEADING,
                'separator' => 'after',
            ]
        );

        $this->add_control(
            'gofly_counter_style_one_genaral_bg_color',
            [
                'label'     => esc_html__('Card Background Color', 'gofly-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .counter-section' => 'background-color: {{VALUE}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'gofly_counter_style_one_genaral_padding',
            [
                'label'      => esc_html__(
                    'Padding',
                    'gofly-core'
                ),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%'],
                'selectors'  => [
                    '{{WRAPPER}} .counter-section' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'
                ]
            ]
        );

        $this->add_control(
            'gofly_counter_style_one_genaral_icon',
            [
                'label'     => esc_html__('Icon', 'gofly-core'),
                'type'      => \Elementor\Controls_Manager::HEADING,
                'separator' => 'after',
            ]
        );

        $this->add_control(
            'gofly_counter_style_one_genaral_icon_color',
            [
                'label'     => esc_html__('Color', 'gofly-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .counter-section .single-counter .icon svg' => 'fill: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'gofly_counter_style_one_genaral_icon_size',
            [
                'label'      => esc_html__('Icon Size', 'gofly-core'),
                'type'       => \Elementor\Controls_Manager::SLIDER,
                'size_units' => ['px', '%', 'em', 'rem', 'custom'],
                'range'      => [
                    'px' => [
                        'min'  => 0,
                        'max'  => 1000,
                        'step' => 5,
                    ],
                    '%' => [
                        'min' => 0,
                        'max' => 100,
                    ],
                ],
                'selectors' => [
                    '{{WRAPPER}} .counter-section .single-counter .icon svg' => 'width: {{SIZE}}{{UNIT}};',
                ],
            ]
        );

        $this->add_group_control(
            \Elementor\Group_Control_Border::get_type(),
            [
                'name'     => 'cnt_sec_icon_border',
                'selector' => '{{WRAPPER}} .counter-section .single-counter .icon',
            ]
        );

        $this->add_control(
            'gofly_counter_style_one_genaral_counter_number',
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
                'name'     => 'gofly_counter_style_one_genaral_counter_number_typ',
                'selector' => '{{WRAPPER}} .counter-section .single-counter .content .number h2',

            ]
        );

        $this->add_control(
            'gofly_counter_style_one_genaral_counter_number_color',
            [
                'label'     => esc_html__('Color', 'gofly-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .counter-section .single-counter .content .number h2' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'gofly_counter_style_one_genaral_counter_sign',
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
                'name'     => 'gofly_counter_style_one_genaral_counter_sign_typ',
                'selector' => '{{WRAPPER}} .counter-section .single-counter .content .number span',

            ]
        );

        $this->add_control(
            'gofly_counter_style_one_genaral_counter_sign_color',
            [
                'label'     => esc_html__('Color', 'gofly-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .counter-section .single-counter .content .number span' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'gofly_counter_style_one_genaral_counter_title',
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
                'name'     => 'gofly_counter_style_one_genaral_counter_title_typ',
                'selector' => '{{WRAPPER}} .counter-section .single-counter .content span',

            ]
        );

        $this->add_control(
            'gofly_counter_style_one_genaral_counter_title_color',
            [
                'label'     => esc_html__('Color', 'gofly-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .counter-section .single-counter .content span' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->end_controls_section();
        //============Style Two Start=============//

        $this->start_controls_section(
            'gofly_counter_style_two_genaral',
            [
                'label'     => esc_html__('Styles', 'gofly-core'),
                'tab'       => Controls_Manager::TAB_STYLE,
                'condition' => [
                    'gofly_counter_genaral_style_selection' => ['style_two'],
                ]
            ]
        );

        $this->add_control(
            'gofly_counter_style_two_genaral_area_style',
            [
                'label'     => esc_html__('General', 'gofly-core'),
                'type'      => \Elementor\Controls_Manager::HEADING,
                'separator' => 'after',
            ]
        );

        $this->add_control(
            'gofly_counter_style_two_genaral_bg_color',
            [
                'label'     => esc_html__('Card Background Color', 'gofly-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .counter-section.two' => 'background-color: {{VALUE}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'gofly_counter_style_two_genaral_padding',
            [
                'label'      => esc_html__(
                    'Padding',
                    'gofly-core'
                ),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%'],
                'selectors'  => [
                    '{{WRAPPER}} .counter-section.two' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'
                ]
            ]
        );

        $this->add_control(
            'gofly_counter_style_two_genaral_icon',
            [
                'label'     => esc_html__('Icon', 'gofly-core'),
                'type'      => \Elementor\Controls_Manager::HEADING,
                'separator' => 'after',
            ]
        );

        $this->add_control(
            'gofly_counter_style_two_genaral_icon_color',
            [
                'label'     => esc_html__('Color', 'gofly-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .counter-section .single-counter .icon svg' => 'fill: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'gofly_counter_style_two_genaral_icon_size',
            [
                'label'      => esc_html__('Icon Size', 'gofly-core'),
                'type'       => \Elementor\Controls_Manager::SLIDER,
                'size_units' => ['px', '%', 'em', 'rem', 'custom'],
                'range'      => [
                    'px' => [
                        'min'  => 0,
                        'max'  => 1000,
                        'step' => 5,
                    ],
                    '%' => [
                        'min' => 0,
                        'max' => 100,
                    ],
                ],
                'selectors' => [
                    '{{WRAPPER}} .counter-section .single-counter .icon svg' => 'width: {{SIZE}}{{UNIT}};',
                ],
            ]
        );

        $this->add_group_control(
            \Elementor\Group_Control_Border::get_type(),
            [
                'name'     => 'cnt_sec2_icon_border',
                'selector' => '{{WRAPPER}} .counter-section .single-counter .icon',
            ]
        );

        $this->add_control(
            'gofly_counter_style_two_genaral_counter_number',
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
                'name'     => 'gofly_counter_style_two_genaral_counter_number_typ',
                'selector' => '{{WRAPPER}} .counter-section .single-counter .content .number h2',

            ]
        );

        $this->add_control(
            'gofly_counter_style_two_genaral_counter_number_color',
            [
                'label'     => esc_html__('Color', 'gofly-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .counter-section .single-counter .content .number h2' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'gofly_counter_style_two_genaral_counter_sign',
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
                'name'     => 'gofly_counter_style_two_genaral_counter_sign_typ',
                'selector' => '{{WRAPPER}} .counter-section .single-counter .content .number span',

            ]
        );

        $this->add_control(
            'gofly_counter_style_two_genaral_counter_sign_color',
            [
                'label'     => esc_html__('Color', 'gofly-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .counter-section .single-counter .content .number span' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'gofly_counter_style_two_genaral_counter_title',
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
                'name'     => 'gofly_counter_style_two_genaral_counter_title_typ',
                'selector' => '{{WRAPPER}} .counter-section .single-counter .content span',

            ]
        );

        $this->add_control(
            'gofly_counter_style_two_genaral_counter_title_color',
            [
                'label'     => esc_html__('Color', 'gofly-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .counter-section .single-counter .content span' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->end_controls_section();

        //============Style Three Start=============//

        $this->start_controls_section(
            'gofly_counter_style_three_genaral',
            [
                'label'     => esc_html__('Styles', 'gofly-core'),
                'tab'       => Controls_Manager::TAB_STYLE,
                'condition' => [
                    'gofly_counter_genaral_style_selection' => ['style_three'],
                ]
            ]
        );

        $this->add_control(
            'gofly_counter_style_three_genaral_icon',
            [
                'label'     => esc_html__('Icon', 'gofly-core'),
                'type'      => \Elementor\Controls_Manager::HEADING,
                'separator' => 'after',
            ]
        );

        $this->add_control(
            'gofly_counter_style_three_genaral_icon_color',
            [
                'label'     => esc_html__('Color', 'gofly-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .counter-section .single-counter .icon svg' => 'fill: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'gofly_counter_style_three_genaral_icon_bg_color',
            [
                'label'     => esc_html__('Background Color', 'gofly-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .counter-section.three .single-counter .icon' => 'background-color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'gofly_counter_style_three_genaral_icon_size',
            [
                'label'      => esc_html__('Icon Size', 'gofly-core'),
                'type'       => \Elementor\Controls_Manager::SLIDER,
                'size_units' => ['px', '%', 'em', 'rem', 'custom'],
                'range'      => [
                    'px' => [
                        'min'  => 0,
                        'max'  => 1000,
                        'step' => 5,
                    ],
                    '%' => [
                        'min' => 0,
                        'max' => 100,
                    ],
                ],
                'selectors' => [
                    '{{WRAPPER}} .counter-section .single-counter .icon svg' => 'width: {{SIZE}}{{UNIT}};',
                ],
            ]
        );

        $this->add_group_control(
            \Elementor\Group_Control_Border::get_type(),
            [
                'name'     => 'cnt_sec3_icon_border',
                'selector' => '{{WRAPPER}} .counter-section .single-counter .icon',
            ]
        );

        $this->add_control(
            'gofly_counter_style_three_genaral_counter_number',
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
                'name'     => 'gofly_counter_style_three_genaral_counter_number_typ',
                'selector' => '{{WRAPPER}} .counter-section .single-counter .content .number h2',

            ]
        );

        $this->add_control(
            'gofly_counter_style_three_genaral_counter_number_color',
            [
                'label'     => esc_html__('Color', 'gofly-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .counter-section .single-counter .content .number h2' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'gofly_counter_style_three_genaral_counter_sign',
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
                'name'     => 'gofly_counter_style_three_genaral_counter_sign_typ',
                'selector' => '{{WRAPPER}} .counter-section .single-counter .content .number span',

            ]
        );

        $this->add_control(
            'gofly_counter_style_three_genaral_counter_sign_color',
            [
                'label'     => esc_html__('Color', 'gofly-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .counter-section .single-counter .content .number span' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'gofly_counter_style_three_genaral_counter_title',
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
                'name'     => 'gofly_counter_style_three_genaral_counter_title_typ',
                'selector' => '{{WRAPPER}} .counter-section .single-counter .content span',

            ]
        );

        $this->add_control(
            'gofly_counter_style_three_genaral_counter_title_color',
            [
                'label'     => esc_html__('Color', 'gofly-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .counter-section .single-counter .content span' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->end_controls_section();

        //============Style Four/Five Start=============//

        $this->start_controls_section(
            'gofly_counter_style_four_genaral',
            [
                'label'     => esc_html__('Styles', 'gofly-core'),
                'tab'       => Controls_Manager::TAB_STYLE,
                'condition' => [
                    'gofly_counter_genaral_style_selection' => ['style_four', 'style_five'],
                ]
            ]
        );

        $this->add_control(
            'gofly_counter_style_four_genaral_section',
            [
                'label'     => esc_html__('Section', 'gofly-core'),
                'type'      => \Elementor\Controls_Manager::HEADING,
                'separator' => 'after',
            ]
        );

        $this->add_control(
            'gofly_counter_style_four_genaral_section_bg_color',
            [
                'label'     => esc_html__('Background Color', 'gofly-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .home4-counter-section .counter-wrapper .single-counter' => 'background-color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'gofly_counter_style_four_genaral_section_border_color',
            [
                'label'     => esc_html__('Border Color', 'gofly-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .home4-counter-section .counter-wrapper .single-counter' => 'border: 1px solid {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'gofly_counter_style_four_genaral_icon',
            [
                'label'     => esc_html__('Icon', 'gofly-core'),
                'type'      => \Elementor\Controls_Manager::HEADING,
                'separator' => 'after',
            ]
        );

        $this->add_control(
            'gofly_counter_style_four_genaral_icon_color',
            [
                'label'     => esc_html__('Color', 'gofly-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .home4-counter-section .counter-wrapper .single-counter .content svg' => 'fill: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'gofly_counter_style_four_genaral_icon_size',
            [
                'label'      => esc_html__('Icon Size', 'gofly-core'),
                'type'       => \Elementor\Controls_Manager::SLIDER,
                'size_units' => ['px', '%', 'em', 'rem', 'custom'],
                'range'      => [
                    'px' => [
                        'min'  => 0,
                        'max'  => 1000,
                        'step' => 5,
                    ],
                    '%' => [
                        'min' => 0,
                        'max' => 100,
                    ],
                ],
                'selectors' => [
                    '{{WRAPPER}} .home4-counter-section .counter-wrapper .single-counter .content svg' => 'width: {{SIZE}}{{UNIT}};',
                ],
            ]
        );

        $this->add_control(
            'gofly_counter_style_four_genaral_counter_number',
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
                'name'     => 'gofly_counter_style_four_genaral_counter_number_typ',
                'selector' => '{{WRAPPER}} .home4-counter-section .counter-wrapper .single-counter .content h2 strong',

            ]
        );

        $this->add_control(
            'gofly_counter_style_four_genaral_counter_number_color',
            [
                'label'     => esc_html__('Color', 'gofly-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .home4-counter-section .counter-wrapper .single-counter .content h2 strong' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'gofly_counter_style_four_genaral_counter_sign',
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
                'name'     => 'gofly_counter_style_four_genaral_counter_sign_typ',
                'selector' => '{{WRAPPER}} .home4-counter-section .counter-wrapper .single-counter .content h2',

            ]
        );

        $this->add_control(
            'gofly_counter_style_four_genaral_counter_sign_color',
            [
                'label'     => esc_html__('Color', 'gofly-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .home4-counter-section .counter-wrapper .single-counter .content h2' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'gofly_counter_style_four_genaral_counter_title',
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
                'name'     => 'gofly_counter_style_four_genaral_counter_title_typ',
                'selector' => '{{WRAPPER}} .home4-counter-section .counter-wrapper .single-counter .content span',

            ]
        );

        $this->add_control(
            'gofly_counter_style_four_genaral_counter_title_color',
            [
                'label'     => esc_html__('Color', 'gofly-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .home4-counter-section .counter-wrapper .single-counter .content span' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->end_controls_section();
    }
    protected function render()
    {

        $settings = $this->get_settings_for_display();

?>

        <?php if ($settings['gofly_counter_genaral_style_selection'] == 'style_one'): ?>
            <div class="counter-section">
                <div class="single-counter <?php if ($settings['gofly_counter_genaral_show_divider_switcher'] == 'yes') : ?>divider<?php endif; ?>">
                    <?php if (!empty($settings['gofly_counter_genaral_icon_image'])): ?>
                        <div class="icon">
                            <?php \Elementor\Icons_Manager::render_icon($settings['gofly_counter_genaral_icon_image'], ['aria-hidden' => 'true']); ?>
                        </div>
                    <?php endif; ?>
                    <div class="content">
                        <div class="number">
                            <?php if (!empty($settings['gofly_counter_genaral_counter_number'])): ?>
                                <h2 class="counter"><?php echo esc_html($settings['gofly_counter_genaral_counter_number']); ?></h2>
                            <?php endif; ?>
                            <?php if (!empty($settings['gofly_counter_genaral_counter_sign'])): ?>
                                <span><?php echo esc_html($settings['gofly_counter_genaral_counter_sign']); ?></span>
                            <?php endif; ?>
                        </div>
                        <?php if (!empty($settings['gofly_counter_genaral_counter_title'])): ?>
                            <span><?php echo esc_html($settings['gofly_counter_genaral_counter_title']); ?></span>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        <?php endif; ?>

        <?php if ($settings['gofly_counter_genaral_style_selection'] == 'style_two'): ?>
            <div class="counter-section two">
                <div class="single-counter <?php if ($settings['gofly_counter_genaral_show_divider_switcher'] == 'yes') : ?>divider<?php endif; ?>">
                    <?php if (!empty($settings['gofly_counter_genaral_icon_image'])): ?>
                        <div class="icon">
                            <?php \Elementor\Icons_Manager::render_icon($settings['gofly_counter_genaral_icon_image'], ['aria-hidden' => 'true']); ?>
                        </div>
                    <?php endif; ?>
                    <div class="content">
                        <div class="number">
                            <?php if (!empty($settings['gofly_counter_genaral_counter_number'])): ?>
                                <h2 class="counter"><?php echo esc_html($settings['gofly_counter_genaral_counter_number']); ?></h2>
                            <?php endif; ?>
                            <?php if (!empty($settings['gofly_counter_genaral_counter_sign'])): ?>
                                <span><?php echo esc_html($settings['gofly_counter_genaral_counter_sign']); ?></span>
                            <?php endif; ?>
                        </div>
                        <?php if (!empty($settings['gofly_counter_genaral_counter_title'])): ?>
                            <span><?php echo esc_html($settings['gofly_counter_genaral_counter_title']); ?></span>
                        <?php endif; ?>
                    </div>
                    <svg class="line" width="6" height="215" viewBox="0 0 6 215" xmlns="http://www.w3.org/2000/svg">
                        <path d="M3.5 5L5.88675 0H0.113249L2.5 5H3.5ZM2.5 210L0.113249 215H5.88675L3.5 210H2.5ZM2.5 4.5V210.5H3.5V4.5H2.5Z"></path>
                    </svg>
                </div>
            </div>
        <?php endif; ?>

        <?php if ($settings['gofly_counter_genaral_style_selection'] == 'style_three'): ?>
            <div class="counter-section three">
                <div class="single-counter <?php if ($settings['gofly_counter_genaral_show_divider_switcher'] == 'yes') : ?>divider<?php endif; ?>">
                    <?php if (!empty($settings['gofly_counter_genaral_icon_image'])): ?>
                        <div class="icon">
                            <?php \Elementor\Icons_Manager::render_icon($settings['gofly_counter_genaral_icon_image'], ['aria-hidden' => 'true']); ?>
                        </div>
                    <?php endif; ?>
                    <div class="content">
                        <div class="number">
                            <?php if (!empty($settings['gofly_counter_genaral_counter_number'])): ?>
                                <h2 class="counter"><?php echo esc_html($settings['gofly_counter_genaral_counter_number']); ?></h2>
                            <?php endif; ?>
                            <?php if (!empty($settings['gofly_counter_genaral_counter_sign'])): ?>
                                <span><?php echo esc_html($settings['gofly_counter_genaral_counter_sign']); ?></span>
                            <?php endif; ?>
                        </div>
                        <?php if (!empty($settings['gofly_counter_genaral_counter_title'])): ?>
                            <span><?php echo esc_html($settings['gofly_counter_genaral_counter_title']); ?></span>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        <?php endif; ?>

        <?php if ($settings['gofly_counter_genaral_style_selection'] == 'style_four'): ?>
            <div class="home4-counter-section">
                <div class="counter-wrapper">
                    <div class="single-counter">
                        <div class="content">
                            <?php \Elementor\Icons_Manager::render_icon($settings['gofly_counter_genaral_icon_image'], ['aria-hidden' => 'true']); ?>
                            <span><?php echo esc_html($settings['gofly_counter_genaral_counter_title']); ?></span>
                            <h2><strong class="counter"><?php echo esc_html($settings['gofly_counter_genaral_counter_number']); ?></strong><?php echo esc_html($settings['gofly_counter_genaral_counter_sign']); ?></h2>
                        </div>
                    </div>
                </div>
            </div>
        <?php endif; ?>

<?php

    }
}

Plugin::instance()->widgets_manager->register(new Gofly_Counter_Widget());
