<?php

namespace Elementor;

if (!defined('ABSPATH')) exit;  // Exit if accessed directly

use Elementor\core\Schemes;
use Egns_Core\Egns_Helper;

class Gofly_Travel_Guide_Slider_Widget extends Widget_Base
{

    public function get_name()
    {
        return 'gofly_travel_guide_slider';
    }

    public function get_title()
    {
        return esc_html__('EG Travel Guide Slider', 'gofly-core');
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

        //===================== Travel Guide Content =======================//

        $this->start_controls_section(
            'gofly_travel_guide_section',
            [
                'label' => esc_html__('Travel Guide', 'gofly-core')
            ]
        );

        $this->add_control(
            'gofly_travel_guide_widget_style',
            [
                'label'   => esc_html__('Select Style', 'gofly-core'),
                'type'    => \Elementor\Controls_Manager::SELECT,
                'options' => [
                    'one'   => esc_html__('Widget One', 'gofly-core'),
                    'two'   => esc_html__('Widget Two', 'gofly-core'),
                    'three' => esc_html__('Widget Three', 'gofly-core'),
                    'four'  => esc_html__('Widget Four', 'gofly-core'),
                ],
                'default' => 'one',
            ]
        );

        $this->add_control(
            'hr',
            [
                'type' => \Elementor\Controls_Manager::DIVIDER,
            ]
        );

        $this->add_control(
            'gofly_travel_guide_title',
            [
                'label'       => esc_html__('Title', 'gofly-core'),
                'type'        => \Elementor\Controls_Manager::TEXT,
                'default'     => esc_html__('GoFly More Experties', 'gofly-core'),
                'placeholder' => esc_html__('Type your title here', 'gofly-core'),
                'label_block' => true,
            ]
        );
        $this->add_control(
            'gofly_travel_guide_title_desc',
            [
                'label'       => esc_html__('Short description', 'gofly-core'),
                'type'        => \Elementor\Controls_Manager::TEXTAREA,
                'default'     => esc_html__('We’ve 200+ friendly tour experties in worldwide.', 'gofly-core'),
                'placeholder' => esc_html__('Type your description here', 'gofly-core'),
                'label_block' => true,
            ]
        );

        $repeater = new \Elementor\Repeater();

        $repeater->add_control(
            'gofly_travel_guide_img',
            [
                'label'   => esc_html__('Guide Image', 'gofly-core'),
                'type'    => \Elementor\Controls_Manager::MEDIA,
                'default' => [
                    'url' => \Elementor\Utils::get_placeholder_image_src(),
                ],
            ],
        );
        $repeater->add_control(
            'gofly_travel_guide_name',
            [
                'label'       => esc_html__('Name', 'gofly-core'),
                'type'        => \Elementor\Controls_Manager::TEXT,
                'default'     => esc_html__('Mrs. Emelia Jong', 'gofly-core'),
                'placeholder' => esc_html__('write your name here', 'gofly-core'),
                'label_block' => true,
            ]
        );
        $repeater->add_control(
            'gofly_travel_guide_designation',
            [
                'label'       => esc_html__('Designation', 'gofly-core'),
                'type'        => \Elementor\Controls_Manager::TEXT,
                'default'     => esc_html__('GoFly Guider', 'gofly-core'),
                'placeholder' => esc_html__('write your designation here', 'gofly-core'),
                'label_block' => true,
            ]
        );
        $repeater->add_control(
            'gofly_travel_guide_link',
            [
                'label'   => esc_html__('Travel Guide link', 'gofly-core'),
                'type'    => \Elementor\Controls_Manager::URL,
                'options' => ['url', 'is_external', 'nofollow'],
                'default' => [
                    'url'         => '#',
                    'is_external' => true,
                    'nofollow'    => true,
                ],
                'label_block' => true,
            ]
        );
        // social media 
        $repeater->add_control(
            'gofly_travel_guide_social_popover_toggle',
            [
                'label'        => esc_html__('Social Media', 'gofly-core'),
                'type'         => \Elementor\Controls_Manager::POPOVER_TOGGLE,
                'label_off'    => esc_html__('Default', 'gofly-core'),
                'label_on'     => esc_html__('Custom', 'gofly-core'),
                'return_value' => 'yes',
                'default'      => 'yes',
            ]
        );

        $repeater->start_popover();
        $repeater->add_control(
            'website_link_facebook',
            [
                'label'       => esc_html__('Facebook', 'gofly-core'),
                'type'        => \Elementor\Controls_Manager::URL,
                'placeholder' => esc_html__('https://your-link.com', 'gofly-core'),
                'default'     => [
                    'url'         => 'https://www.facebook.com/',
                    'is_external' => true,
                    'nofollow'    => true,
                ],
                'label_block' => true,
            ]
        );
        $repeater->add_control(
            'website_link_twitter',
            [
                'label'       => esc_html__('Twitter', 'gofly-core'),
                'type'        => \Elementor\Controls_Manager::URL,
                'placeholder' => esc_html__('https://your-link.com', 'gofly-core'),
                'default'     => [
                    'url'         => 'https://twitter.com/',
                    'is_external' => true,
                    'nofollow'    => true,
                ],
                'label_block' => true,
            ]
        );
        $repeater->add_control(
            'website_link_pinterest',
            [
                'label'       => esc_html__('Pinterest', 'gofly-core'),
                'type'        => \Elementor\Controls_Manager::URL,
                'placeholder' => esc_html__('https://your-link.com', 'gofly-core'),
                'default'     => [
                    'url'         => 'https://www.pinterest.com/',
                    'is_external' => true,
                    'nofollow'    => true,
                ],
                'label_block' => true,
            ]
        );
        $repeater->add_control(
            'website_link_instagram',
            [
                'label'       => esc_html__('Instagram', 'gofly-core'),
                'type'        => \Elementor\Controls_Manager::URL,
                'placeholder' => esc_html__('https://your-link.com', 'gofly-core'),
                'default'     => [
                    'url'         => 'https://www.instagram.com/',
                    'is_external' => true,
                    'nofollow'    => true,
                ],
                'label_block' => true,
            ]
        );
        $repeater->add_control(
            'website_link_linkedin',
            [
                'label'       => esc_html__('Linkedin', 'gofly-core'),
                'type'        => \Elementor\Controls_Manager::URL,
                'placeholder' => esc_html__('https://your-link.com', 'gofly-core'),
                'default'     => [
                    'url'         => '',
                    'is_external' => true,
                    'nofollow'    => true,
                ],
                'label_block' => true,
            ]
        );
        $repeater->add_control(
            'website_link_reddit',
            [
                'label'       => esc_html__('Reddit', 'gofly-core'),
                'type'        => \Elementor\Controls_Manager::URL,
                'placeholder' => esc_html__('https://your-link.com', 'gofly-core'),
                'default'     => [
                    'url'         => '',
                    'is_external' => true,
                    'nofollow'    => true,
                ],
                'label_block' => true,
            ]
        );
        $repeater->add_control(
            'website_link_behance',
            [
                'label'       => esc_html__('Behance', 'gofly-core'),
                'type'        => \Elementor\Controls_Manager::URL,
                'placeholder' => esc_html__('https://your-link.com', 'gofly-core'),
                'default'     => [
                    'url'         => '',
                    'is_external' => true,
                    'nofollow'    => true,
                ],
                'label_block' => true,
            ]
        );
        $repeater->add_control(
            'website_link_stackoverflow',
            [
                'label'       => esc_html__('Stackoverflow', 'gofly-core'),
                'type'        => \Elementor\Controls_Manager::URL,
                'placeholder' => esc_html__('https://your-link.com', 'gofly-core'),
                'default'     => [
                    'url'         => '',
                    'is_external' => true,
                    'nofollow'    => true,
                ],
                'label_block' => true,
            ]
        );
        $repeater->end_popover();

        $this->add_control(
            'gofly_travel_guide_slider_list',
            [
                'label'   => esc_html__('Guide lists', 'gofly-core'),
                'type'    => \Elementor\Controls_Manager::REPEATER,
                'fields'  => $repeater->get_controls(),
                'default' => [
                    [
                        'gofly_travel_guide_name'        => 'Oliver Liam',
                        'gofly_travel_guide_designation' => 'GoFly Guider',
                    ],
                    [
                        'gofly_travel_guide_name'        => 'Mrs. Emelia Jong',
                        'gofly_travel_guide_designation' => 'GoFly Guider',
                    ],
                    [
                        'gofly_travel_guide_name'        => 'Alexander Benjamin',
                        'gofly_travel_guide_designation' => 'GoFly Guider',
                    ],
                    [
                        'gofly_travel_guide_name'        => 'Samuel Henry',
                        'gofly_travel_guide_designation' => 'GoFly Guider',
                    ],
                    [
                        'gofly_travel_guide_name'        => 'David Reynolds',
                        'gofly_travel_guide_designation' => 'GoFly Guider',
                    ],
                    [
                        'gofly_travel_guide_name'        => 'Thomas Mitchell',
                        'gofly_travel_guide_designation' => 'GoFly Guider',
                    ],
                    [
                        'gofly_travel_guide_name'        => 'James Carter',
                        'gofly_travel_guide_designation' => 'GoFly Guider',
                    ],
                    [
                        'gofly_travel_guide_name'        => 'Jorche Milton',
                        'gofly_travel_guide_designation' => 'GoFly Guider',
                    ],
                ],
                'title_field' => '{{{ gofly_travel_guide_name }}}',
            ]
        );


        // Bottom fields
        $this->add_control(
            'gofly_travel_guide_widget_ext_options',
            [
                'label'     => esc_html__('Widget Additional', 'gofly-core'),
                'type'      => \Elementor\Controls_Manager::HEADING,
                'separator' => 'before',
                'condition' => [
                    'gofly_travel_guide_widget_style' => ['one', 'two', 'four'],
                ],
            ]
        );
        $this->add_control(
            'gofly_travel_guide_widget_animation',
            [
                'label'   => esc_html__('Animate Image', 'gofly-core'),
                'type'    => \Elementor\Controls_Manager::MEDIA,
                'default' => [
                    'url' => \Elementor\Utils::get_placeholder_image_src(),
                ],
                'condition'   => [
                    'gofly_travel_guide_widget_style' => 'four',
                ],
            ]
        );
        $this->add_control(
            'gofly_travel_guide_widget_batch',
            [
                'label'       => esc_html__('Batch label', 'gofly-core'),
                'type'        => \Elementor\Controls_Manager::TEXT,
                'default'     => 'Need to Help? Don’t Hesitate Friendly Collaboarte with Experties',
                'placeholder' => esc_html__('Type your text here', 'gofly-core'),
                'label_block' => true,
                'condition'   => [
                    'gofly_travel_guide_widget_style' => 'one',
                ],
            ]
        );
        $this->add_control(
            'gofly_travel_guide_widget_btn_label',
            [
                'label'       => esc_html__('Button label', 'gofly-core'),
                'type'        => \Elementor\Controls_Manager::TEXT,
                'default'     => 'Meet Our Team',
                'placeholder' => esc_html__('Type your text here', 'gofly-core'),
                'label_block' => true,
                'condition'   => [
                    'gofly_travel_guide_widget_style' => ['one', 'two'],
                ],
            ]
        );
        $this->add_control(
            'gofly_travel_guide_widget_btn_link',
            [
                'label'       => esc_html__('Button link', 'gofly-core'),
                'type'        => \Elementor\Controls_Manager::TEXT,
                'default'     => '#',
                'placeholder' => 'www.example.com',
                'label_block' => true,
                'condition'   => [
                    'gofly_travel_guide_widget_style'      => ['one', 'two'],
                    'gofly_travel_guide_widget_btn_label!' => '',
                ],
            ]
        );

        $this->end_controls_section();


        //=====================  Travel Guide Style =======================//

        $this->start_controls_section(
            'gofly_travel_guide_style_section',
            [
                'label' => esc_html__("Travel Guide Style", 'gofly-core'),
                'tab'   => \Elementor\Controls_Manager::TAB_STYLE,
            ]
        );

        // Section Title & Short description 
        $this->add_control(
            'gofly_travel_guide_sec_options',
            [
                'label'     => esc_html__('Section Title Options', 'gofly-core'),
                'type'      => \Elementor\Controls_Manager::HEADING,
                'separator' => 'before',
            ]
        );
        $this->add_control(
            'gofly_travel_guide_sec_title_color',
            [
                'label'     => esc_html__('Title Color', 'gofly-core'),
                'type'      => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .section-title h2' => 'color: {{VALUE}}',
                ],
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name'     => 'gofly_travel_guide_sec_title_typography',
                'label'    => esc_html__('Title Typography', 'gofly-core'),
                'selector' => '{{WRAPPER}} .section-title h2',
            ]
        );
        $this->add_control(
            'gofly_travel_guide_sec_desc_color',
            [
                'label'     => esc_html__('Description Color', 'gofly-core'),
                'type'      => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .section-title p' => 'color: {{VALUE}}',
                ],
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name'     => 'gofly_travel_guide_sec_desc_typography',
                'label'    => esc_html__('Description Typography', 'gofly-core'),
                'selector' => '{{WRAPPER}} .section-title p',
            ]
        );

        // Image 
        $this->add_control(
            'gofly_travel_guide_img_options',
            [
                'label'     => esc_html__('Image Options', 'gofly-core'),
                'type'      => \Elementor\Controls_Manager::HEADING,
                'separator' => 'before',
                'condition' => [
                    'gofly_travel_guide_widget_style' => ['one', 'two', 'three'],
                ],
            ]
        );
        $this->add_control(
            'gofly_travel_guide_img_radius',
            [
                'label'      => esc_html__('Border radius', 'gofly-core'),
                'type'       => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'rem', 'custom'],
                'selectors'  => [
                    // one 
                    '{{WRAPPER}} .tour-guide-card .guide-img-wrap .guide-img'     => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                    '{{WRAPPER}} .tour-guide-card .guide-img-wrap .guide-img img' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                    //two
                    '{{WRAPPER}} .tour-guide-card.two .guide-img-wrap .guide-img'     => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                    '{{WRAPPER}} .tour-guide-card.two .guide-img-wrap .guide-img img' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                    // three 
                    '{{WRAPPER}} .tour-guide-card.three .guide-img-wrap .guide-img'     => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                    '{{WRAPPER}} .tour-guide-card.three .guide-img-wrap .guide-img img' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
                'condition'   => [
                    'gofly_travel_guide_widget_style' => ['one', 'two', 'three'],
                ],
            ]
        );
        $this->add_control(
            'gofly_travel_guide_img_radius_hover',
            [
                'label'      => esc_html__('Border radius hover', 'gofly-core'),
                'type'       => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'rem', 'custom'],
                'selectors'  => [
                    // three 
                    '{{WRAPPER}} .tour-guide-card.three .guide-img-wrap .guide-img:hover'     => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                    '{{WRAPPER}} .tour-guide-card.three .guide-img-wrap .guide-img:hover img' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
                'condition'   => [
                    'gofly_travel_guide_widget_style' => ['three'],
                ],
            ]
        );
        // Name 
        $this->add_control(
            'gofly_travel_guide_name_options',
            [
                'label'     => esc_html__('Name Options', 'gofly-core'),
                'type'      => \Elementor\Controls_Manager::HEADING,
                'separator' => 'before',
            ]
        );
        $this->add_control(
            'gofly_travel_guide_name_color',
            [
                'label'     => esc_html__('Color', 'gofly-core'),
                'type'      => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .tour-guide-card .guide-info h5 a' => 'color: {{VALUE}}',
                ],
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name'     => 'gofly_travel_guide_name_typography',
                'selector' => '{{WRAPPER}} .tour-guide-card .guide-info h5 a',
            ]
        );
        // Designation
        $this->add_control(
            'gofly_travel_guide_designation_options',
            [
                'label'     => esc_html__('Designation Options', 'gofly-core'),
                'type'      => \Elementor\Controls_Manager::HEADING,
                'separator' => 'before',
            ]
        );
        $this->add_control(
            'gofly_travel_guide_designation_color',
            [
                'label'     => esc_html__('Color', 'gofly-core'),
                'type'      => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .tour-guide-card .guide-info span' => 'color: {{VALUE}}',
                ],
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name'     => 'gofly_travel_guide_designation_typography',
                'selector' => '{{WRAPPER}} .tour-guide-card .guide-info span',
            ]
        );
        // Social Media
        $this->add_control(
            'gofly_travel_guide_social_options',
            [
                'label'     => esc_html__('Social Media Options', 'gofly-core'),
                'type'      => \Elementor\Controls_Manager::HEADING,
                'separator' => 'before',
            ]
        );

        //Start main tabs
        $this->start_controls_tabs(
            'gofly_travel_guide_social_button_style_tabs',
        );

        // Normal style 
        $this->start_controls_tab(
            'gofly_travel_guide_social_style_normal_tab',
            [
                'label' => esc_html__('Normal', 'gofly-core'),
            ]
        );
        $this->add_control(
            'gofly_travel_guide_social_icon_color',
            [
                'label'     => esc_html__('Color', 'gofly-core'),
                'type'      => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .tour-guide-card .guide-img-wrap .social-list li a i' => 'color: {{VALUE}}',
                ],
            ]
        );
        $this->add_control(
            'gofly_travel_guide_social_icon_bg_color',
            [
                'label'     => esc_html__('BG Color', 'gofly-core'),
                'type'      => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .tour-guide-card .guide-img-wrap .social-list li a' => 'background-color: {{VALUE}}',
                ],
            ]
        );
        $this->add_control(
            'gofly_travel_guide_social_icon_size',
            [
                'label'      => esc_html__('Icon size', 'gofly-core'),
                'type'       => \Elementor\Controls_Manager::SLIDER,
                'size_units' => ['px', 'rem', 'custom'],
                'range'      => [
                    'px' => [
                        'min'  => 0,
                        'max'  => 100,
                        'step' => 1,
                    ],
                ],
                'selectors' => [
                    '{{WRAPPER}} .tour-guide-card .guide-img-wrap .social-list li a i' => 'font-size: {{SIZE}}{{UNIT}};',
                ],
            ]
        );
        $this->add_control(
            'gofly_travel_guide_social_icon_radius',
            [
                'label'      => esc_html__('Border Radius', 'gofly-core'),
                'type'       => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'rem', 'custom'],
                'selectors'  => [
                    '{{WRAPPER}} .tour-guide-card .guide-img-wrap .social-list li a' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->add_control(
            'gofly_travel_guide_social_icon_box_height',
            [
                'label'      => esc_html__('Box height', 'gofly-core'),
                'type'       => \Elementor\Controls_Manager::SLIDER,
                'size_units' => ['px', 'rem', 'custom'],
                'range'      => [
                    'px' => [
                        'min'  => 0,
                        'max'  => 100,
                        'step' => 1,
                    ],
                ],
                'selectors' => [
                    '{{WRAPPER}} .tour-guide-card .guide-img-wrap .social-list li a' => 'height: {{SIZE}}{{UNIT}};',
                ],
            ]
        );
        $this->add_control(
            'gofly_travel_guide_social_icon_box_width',
            [
                'label'      => esc_html__('Box width', 'gofly-core'),
                'type'       => \Elementor\Controls_Manager::SLIDER,
                'size_units' => ['px', 'rem', 'custom'],
                'range'      => [
                    'px' => [
                        'min'  => 0,
                        'max'  => 100,
                        'step' => 1,
                    ],
                ],
                'selectors' => [
                    '{{WRAPPER}} .tour-guide-card .guide-img-wrap .social-list li a' => 'width: {{SIZE}}{{UNIT}};',
                ],
            ]
        );
        $this->end_controls_tab();  //end normal

        // Hover style 
        $this->start_controls_tab(
            'gofly_travel_guide_social_style_hover_tab',
            [
                'label' => esc_html__('Hover', 'gofly-core'),
            ]
        );
        $this->add_control(
            'gofly_travel_guide_social_icon_color_hover',
            [
                'label'     => esc_html__('Color', 'gofly-core'),
                'type'      => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .tour-guide-card .guide-img-wrap .social-list li a:hover i' => 'color: {{VALUE}}',
                ],
            ]
        );
        $this->add_control(
            'gofly_travel_guide_social_icon_bg_color_hover',
            [
                'label'     => esc_html__('BG Color', 'gofly-core'),
                'type'      => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .tour-guide-card .guide-img-wrap .social-list li a:hover' => 'background-color: {{VALUE}}',
                ],
            ]
        );
        $this->add_control(
            'gofly_travel_guide_social_icon_size_hover',
            [
                'label'      => esc_html__('Icon size', 'gofly-core'),
                'type'       => \Elementor\Controls_Manager::SLIDER,
                'size_units' => ['px', 'rem', 'custom'],
                'range'      => [
                    'px' => [
                        'min'  => 0,
                        'max'  => 100,
                        'step' => 1,
                    ],
                ],
                'selectors' => [
                    '{{WRAPPER}} .tour-guide-card .guide-img-wrap .social-list li a:hover i' => 'font-size: {{SIZE}}{{UNIT}};',
                ],
            ]
        );
        $this->add_control(
            'gofly_travel_guide_social_icon_radius_hover',
            [
                'label'      => esc_html__('Border Radius', 'gofly-core'),
                'type'       => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'rem', 'custom'],
                'selectors'  => [
                    '{{WRAPPER}} .tour-guide-card .guide-img-wrap .social-list li a:hover' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->add_control(
            'gofly_travel_guide_social_icon_box_height_hover',
            [
                'label'      => esc_html__('Box height', 'gofly-core'),
                'type'       => \Elementor\Controls_Manager::SLIDER,
                'size_units' => ['px', 'rem', 'custom'],
                'range'      => [
                    'px' => [
                        'min'  => 0,
                        'max'  => 100,
                        'step' => 1,
                    ],
                ],
                'selectors' => [
                    '{{WRAPPER}} .tour-guide-card .guide-img-wrap .social-list li a:hover' => 'height: {{SIZE}}{{UNIT}};',
                ],
            ]
        );
        $this->add_control(
            'gofly_travel_guide_social_icon_box_width_hover',
            [
                'label'      => esc_html__('Box width', 'gofly-core'),
                'type'       => \Elementor\Controls_Manager::SLIDER,
                'size_units' => ['px', 'rem', 'custom'],
                'range'      => [
                    'px' => [
                        'min'  => 0,
                        'max'  => 100,
                        'step' => 1,
                    ],
                ],
                'selectors' => [
                    '{{WRAPPER}} .tour-guide-card .guide-img-wrap .social-list li a:hover' => 'width: {{SIZE}}{{UNIT}};',
                ],
            ]
        );
        $this->end_controls_tab();  //end hover


        $this->end_controls_tabs();
        //End main tabs

        // Section BG
        $this->add_control(
            'gofly_travel_guide_section_options',
            [
                'label'     => esc_html__('Section Options', 'gofly-core'),
                'type'      => \Elementor\Controls_Manager::HEADING,
                'separator' => 'before',
                'condition' => [
                    'gofly_travel_guide_widget_style' => ['one', 'two'],
                ],
            ]
        );
        $this->add_control(
            'gofly_travel_guide_section_padding',
            [
                'label'      => esc_html__('Padding', 'gofly-core'),
                'type'       => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'rem', 'custom'],
                'selectors'  => [
                    '{{WRAPPER}} .home3-tour-guide-section,.home5-tour-guide-section.two' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
                'condition'   => [
                    'gofly_travel_guide_widget_style' => ['one', 'two'],
                ],
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Background::get_type(),
            [
                'name'      => 'gofly_travel_guide_section_background',
                'types'     => ['classic', 'gradient', 'video'],
                'selector'  => '{{WRAPPER}} .home3-tour-guide-section,.home5-tour-guide-section.two',
                'condition' => [
                    'gofly_travel_guide_widget_style' => ['one', 'two'],
                ],
            ]
        );

        $this->end_controls_section();
    }
    protected function render()
    {

        $settings = $this->get_settings_for_display();

        $guide_list = $settings['gofly_travel_guide_slider_list'];

?>

        <?php if (is_admin()): ?>
            <script>
                var swiper = new Swiper(".home3-guide-slider", {
                    slidesPerView: 1,
                    speed: 1500,
                    spaceBetween: 24,
                    autoplay: {
                        delay: 2500,
                        pauseOnMouseEnter: true,
                        disableOnInteraction: false,
                    },
                    navigation: {
                        nextEl: ".guide-slider-next",
                        prevEl: ".guide-slider-prev",
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
                            slidesPerView: 4,
                            spaceBetween: 15,
                        },
                        1200: {
                            slidesPerView: 4,
                            spaceBetween: 15,
                        },
                        1400: {
                            slidesPerView: 4,
                        },
                    },
                });

                var swiper = new Swiper(".home7-guide-slider", {
                    slidesPerView: 1,
                    speed: 1500,
                    spaceBetween: 24,
                    autoplay: {
                        delay: 2500,
                        disableOnInteraction: false,
                    },
                    navigation: {
                        nextEl: ".guide-slider-next",
                        prevEl: ".guide-slider-prev",
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
                            spaceBetween: 15,
                        },
                        768: {
                            slidesPerView: 2,
                        },
                        992: {
                            slidesPerView: 3,
                            spaceBetween: 15,
                        },
                        1200: {
                            slidesPerView: 4,
                            spaceBetween: 15,
                        },
                        1400: {
                            slidesPerView: 4,
                        },
                    },
                });
            </script>
        <?php endif; ?>

        <?php if ('one' == $settings['gofly_travel_guide_widget_style']): ?>
            <div class="home3-tour-guide-section">
                <div class="container">
                    <div class="row justify-content-center mb-50 wow animate fadeInDown" data-wow-delay="200ms" data-wow-duration="1500ms">
                        <div class="col-xl-6 col-lg-8">
                            <div class="section-title text-center">
                                <h2><?php echo esc_html($settings['gofly_travel_guide_title']) ?></h2>
                                <p><?php echo esc_html($settings['gofly_travel_guide_title_desc']) ?></p>
                            </div>
                        </div>
                    </div>
                    <div class="team-slider-area mb-60">
                        <div class="swiper home3-guide-slider">
                            <div class="swiper-wrapper">
                                <?php foreach ($guide_list as $key => $guide):

                                    $link_key = 'gofly_travel_guide_link_' . $key;  // unique key per guide

                                    if (! empty($guide['gofly_travel_guide_link']['url'])) {
                                        $this->add_link_attributes($link_key, $guide['gofly_travel_guide_link']);
                                    }
                                ?>
                                    <div class="swiper-slide">
                                        <div class="tour-guide-card">
                                            <div class="guide-img-wrap">
                                                <a <?php $this->print_render_attribute_string($link_key); ?> class="guide-img">
                                                    <img src="<?php echo esc_url($guide['gofly_travel_guide_img']['url']) ?>" alt="<?php echo esc_attr("image") ?>">
                                                </a>
                                                <ul class="social-list">
                                                    <?php if (!empty($guide['website_link_facebook']['url'])): ?>
                                                        <li>
                                                            <a href="<?php echo esc_url($guide['website_link_facebook']['url']); ?>"><i class="bx bxl-facebook"></i></a>
                                                        </li>
                                                    <?php endif; ?>
                                                    <?php if (!empty($guide['website_link_twitter']['url'])): ?>
                                                        <li>
                                                            <a href="<?php echo esc_url($guide['website_link_twitter']['url']); ?>"><i class="bi bi-twitter-x"></i></a>
                                                        </li>
                                                    <?php endif; ?>
                                                    <?php if (!empty($guide['website_link_pinterest']['url'])): ?>
                                                        <li>
                                                            <a href="<?php echo esc_url($guide['website_link_pinterest']['url']); ?>"><i class="bx bxl-pinterest-alt"></i></a>
                                                        </li>
                                                    <?php endif; ?>
                                                    <?php if (!empty($guide['website_link_instagram']['url'])): ?>
                                                        <li>
                                                            <a href="<?php echo esc_url($guide['website_link_instagram']['url']); ?>"><i class="bx bxl-instagram"></i></a>
                                                        </li>
                                                    <?php endif; ?>
                                                    <?php if (!empty($guide['website_link_linkedin']['url'])): ?>
                                                        <li>
                                                            <a href="<?php echo esc_url($guide['website_link_linkedin']['url']) ?>"><i class='bx bxl-linkedin'></i></a>
                                                        </li>
                                                    <?php endif; ?>
                                                    <?php if (!empty($guide['website_link_stackoverflow']['url'])): ?>
                                                        <li>
                                                            <a href="<?php echo esc_url($guide['website_link_stackoverflow']['url']) ?>"><i class='bx bxl-stack-overflow'></i></a>
                                                        </li>
                                                    <?php endif; ?>
                                                    <?php if (!empty($guide['website_link_behance']['url'])): ?>
                                                        <li>
                                                            <a href="<?php echo esc_url($guide['website_link_behance']['url']) ?>"><i class='bx bxl-behance'></i></a>
                                                        </li>
                                                    <?php endif; ?>
                                                    <?php if (!empty($guide['website_link_reddit']['url'])): ?>
                                                        <li>
                                                            <a href="<?php echo esc_url($guide['website_link_reddit']['url']) ?>"><i class='bx bxl-reddit'></i></a>
                                                        </li>
                                                    <?php endif; ?>
                                                </ul>
                                            </div>
                                            <div class="guide-info">
                                                <h5><a <?php $this->print_render_attribute_string($link_key); ?>><?php echo esc_html($guide['gofly_travel_guide_name']) ?></a></h5>
                                                <span><?php echo esc_html($guide['gofly_travel_guide_designation']) ?></span>
                                            </div>
                                        </div>
                                    </div>
                                <?php endforeach; ?>
                            </div>
                        </div>
                        <div class="slider-btn-grp two">
                            <div class="slider-btn guide-slider-prev">
                                <svg width="16" height="12" viewBox="0 0 16 12" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd" clip-rule="evenodd" d="M0 5.31421H16V6.68564H0V5.31421Z" />
                                    <path fill-rule="evenodd" clip-rule="evenodd"
                                        d="M0.685714 6.68569C3.9104 6.68569 6.54629 3.84958 6.54629 0.825119V0.139404H5.17486V0.825119C5.17486 3.12181 3.12412 5.31426 0.685714 5.31426H0V6.68569H0.685714Z" />
                                    <path fill-rule="evenodd" clip-rule="evenodd"
                                        d="M0.685714 5.31421C3.9104 5.31421 6.54629 8.15032 6.54629 11.1748V11.8605H5.17486V11.1748C5.17486 8.87901 3.12412 6.68564 0.685714 6.68564H0V5.31421H0.685714Z" />
                                </svg>
                            </div>
                            <div class="slider-btn guide-slider-next">
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
                    <div class="bottom-area d-flex justify-content-center wow animate fadeInUp" data-wow-delay="200ms" data-wow-duration="1500ms">
                        <div class="batch">
                            <span><?php echo esc_html($settings['gofly_travel_guide_widget_batch']) ?></span>
                        </div>
                        <div class="batch two">
                            <a href="<?php echo esc_url($settings['gofly_travel_guide_widget_btn_link']) ?>"><?php echo esc_html($settings['gofly_travel_guide_widget_btn_label']) ?>
                                <svg width="10" height="10" viewBox="0 0 10 10" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M1 9L9 1M9 1C7.22222 1.33333 3.33333 2 1 1M9 1C8.66667 2.66667 8 6.33333 9 9" stroke-width="1.5" stroke-linecap="round" />
                                </svg>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        <?php endif; ?>

        <?php if ('two' == $settings['gofly_travel_guide_widget_style']): ?>
            <div class="home5-tour-guide-section two">
                <div class="container">
                    <div class="row justify-content-center mb-50 wow animate fadeInDown" data-wow-delay="200ms" data-wow-duration="1500ms">
                        <div class="col-xl-6 col-lg-8">
                            <div class="section-title text-center">
                                <h2><?php echo esc_html($settings['gofly_travel_guide_title']) ?></h2>
                                <p><?php echo esc_html($settings['gofly_travel_guide_title_desc']) ?></p>
                            </div>
                        </div>
                    </div>
                    <div class="team-slider-area">
                        <div class="swiper home3-guide-slider">
                            <div class="swiper-wrapper">
                                <?php foreach ($guide_list as $key => $guide):

                                    $link_key = 'gofly_travel_guide_link_' . $key;  // unique key per guide

                                    if (! empty($guide['gofly_travel_guide_link']['url'])) {
                                        $this->add_link_attributes($link_key, $guide['gofly_travel_guide_link']);
                                    }
                                ?>
                                    <div class="swiper-slide">
                                        <div class="tour-guide-card two">
                                            <div class="guide-img-wrap">
                                                <a <?php $this->print_render_attribute_string($link_key); ?> class="guide-img">
                                                    <img src="<?php echo esc_url($guide['gofly_travel_guide_img']['url']) ?>" alt="<?php echo esc_attr("image") ?>">
                                                </a>
                                                <ul class="social-list">
                                                    <?php if (!empty($guide['website_link_facebook']['url'])): ?>
                                                        <li>
                                                            <a href="<?php echo esc_url($guide['website_link_facebook']['url']); ?>"><i class="bx bxl-facebook"></i></a>
                                                        </li>
                                                    <?php endif; ?>
                                                    <?php if (!empty($guide['website_link_twitter']['url'])): ?>
                                                        <li>
                                                            <a href="<?php echo esc_url($guide['website_link_twitter']['url']); ?>"><i class="bi bi-twitter-x"></i></a>
                                                        </li>
                                                    <?php endif; ?>
                                                    <?php if (!empty($guide['website_link_pinterest']['url'])): ?>
                                                        <li>
                                                            <a href="<?php echo esc_url($guide['website_link_pinterest']['url']); ?>"><i class="bx bxl-pinterest-alt"></i></a>
                                                        </li>
                                                    <?php endif; ?>
                                                    <?php if (!empty($guide['website_link_instagram']['url'])): ?>
                                                        <li>
                                                            <a href="<?php echo esc_url($guide['website_link_instagram']['url']); ?>"><i class="bx bxl-instagram"></i></a>
                                                        </li>
                                                    <?php endif; ?>
                                                    <?php if (!empty($guide['website_link_linkedin']['url'])): ?>
                                                        <li>
                                                            <a href="<?php echo esc_url($guide['website_link_linkedin']['url']) ?>"><i class='bx bxl-linkedin'></i></a>
                                                        </li>
                                                    <?php endif; ?>
                                                    <?php if (!empty($guide['website_link_stackoverflow']['url'])): ?>
                                                        <li>
                                                            <a href="<?php echo esc_url($guide['website_link_stackoverflow']['url']) ?>"><i class='bx bxl-stack-overflow'></i></a>
                                                        </li>
                                                    <?php endif; ?>
                                                    <?php if (!empty($guide['website_link_behance']['url'])): ?>
                                                        <li>
                                                            <a href="<?php echo esc_url($guide['website_link_behance']['url']) ?>"><i class='bx bxl-behance'></i></a>
                                                        </li>
                                                    <?php endif; ?>
                                                    <?php if (!empty($guide['website_link_reddit']['url'])): ?>
                                                        <li>
                                                            <a href="<?php echo esc_url($guide['website_link_reddit']['url']) ?>"><i class='bx bxl-reddit'></i></a>
                                                        </li>
                                                    <?php endif; ?>
                                                </ul>
                                            </div>
                                            <div class="guide-info">
                                                <h5><a <?php $this->print_render_attribute_string($link_key); ?>><?php echo esc_html($guide['gofly_travel_guide_name']); ?></a></h5>
                                                <?php if (!empty($guide['gofly_travel_guide_designation'])): ?>
                                                    <span><?php echo esc_html($guide['gofly_travel_guide_designation']); ?></span>
                                                <?php endif; ?>
                                            </div>
                                        </div>
                                    </div>
                                <?php endforeach; ?>
                            </div>
                        </div>
                        <div class="slider-btn-grp two">
                            <div class="slider-btn guide-slider-prev">
                                <svg width="16" height="12" viewBox="0 0 16 12" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd" clip-rule="evenodd" d="M0 5.31421H16V6.68564H0V5.31421Z" />
                                    <path fill-rule="evenodd" clip-rule="evenodd"
                                        d="M0.685714 6.68569C3.9104 6.68569 6.54629 3.84958 6.54629 0.825119V0.139404H5.17486V0.825119C5.17486 3.12181 3.12412 5.31426 0.685714 5.31426H0V6.68569H0.685714Z" />
                                    <path fill-rule="evenodd" clip-rule="evenodd"
                                        d="M0.685714 5.31421C3.9104 5.31421 6.54629 8.15032 6.54629 11.1748V11.8605H5.17486V11.1748C5.17486 8.87901 3.12412 6.68564 0.685714 6.68564H0V5.31421H0.685714Z" />
                                </svg>
                            </div>
                            <div class="slider-btn guide-slider-next">
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
                    <?php if (!empty($settings['gofly_travel_guide_widget_btn_label'])): ?>
                        <div class="row mt-40 wow animate fadeInUp" data-wow-delay="200ms" data-wow-duration="1500ms">
                            <div class="col-lg-12 d-flex justify-content-center">
                                <a href="<?php echo esc_url($settings['gofly_travel_guide_widget_btn_link']) ?>" class="primary-btn1 two transparent">
                                    <span>
                                        <?php echo esc_html($settings['gofly_travel_guide_widget_btn_label']) ?>
                                        <svg width="10" height="10" viewBox="0 0 10 10" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M9.73535 1.14746C9.57033 1.97255 9.32924 3.26406 9.24902 4.66797C9.16817 6.08312 9.25559 7.5453 9.70214 8.73633C9.84754 9.12406 9.65129 9.55659 9.26367 9.70215C8.9001 9.83849 8.4969 9.67455 8.32812 9.33398L8.29785 9.26367L8.19921 8.98438C7.73487 7.5758 7.67054 5.98959 7.75097 4.58203C7.77875 4.09598 7.82525 3.62422 7.87988 3.17969L1.53027 9.53027C1.23738 9.82317 0.762615 9.82317 0.469722 9.53027C0.176829 9.23738 0.176829 8.76262 0.469722 8.46973L6.83593 2.10254C6.3319 2.16472 5.79596 2.21841 5.25 2.24902C3.8302 2.32862 2.2474 2.26906 0.958003 1.79102L0.704097 1.68945L0.635738 1.65527C0.303274 1.47099 0.157578 1.06102 0.310542 0.704102C0.463655 0.347333 0.860941 0.170391 1.22363 0.28418L1.29589 0.310547L1.48828 0.387695C2.47399 0.751207 3.79966 0.827571 5.16601 0.750977C6.60111 0.670504 7.97842 0.428235 8.86132 0.262695L9.95312 0.0585938L9.73535 1.14746Z"></path>
                                        </svg>
                                    </span>
                                    <span>
                                        <?php echo esc_html($settings['gofly_travel_guide_widget_btn_label']) ?>
                                        <svg width="10" height="10" viewBox="0 0 10 10" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M9.73535 1.14746C9.57033 1.97255 9.32924 3.26406 9.24902 4.66797C9.16817 6.08312 9.25559 7.5453 9.70214 8.73633C9.84754 9.12406 9.65129 9.55659 9.26367 9.70215C8.9001 9.83849 8.4969 9.67455 8.32812 9.33398L8.29785 9.26367L8.19921 8.98438C7.73487 7.5758 7.67054 5.98959 7.75097 4.58203C7.77875 4.09598 7.82525 3.62422 7.87988 3.17969L1.53027 9.53027C1.23738 9.82317 0.762615 9.82317 0.469722 9.53027C0.176829 9.23738 0.176829 8.76262 0.469722 8.46973L6.83593 2.10254C6.3319 2.16472 5.79596 2.21841 5.25 2.24902C3.8302 2.32862 2.2474 2.26906 0.958003 1.79102L0.704097 1.68945L0.635738 1.65527C0.303274 1.47099 0.157578 1.06102 0.310542 0.704102C0.463655 0.347333 0.860941 0.170391 1.22363 0.28418L1.29589 0.310547L1.48828 0.387695C2.47399 0.751207 3.79966 0.827571 5.16601 0.750977C6.60111 0.670504 7.97842 0.428235 8.86132 0.262695L9.95312 0.0585938L9.73535 1.14746Z"></path>
                                        </svg>
                                    </span>
                                </a>
                            </div>
                        </div>
                    <?php endif; ?>
                </div>
            </div>
        <?php endif; ?>

        <?php if ('three' == $settings['gofly_travel_guide_widget_style']): ?>
            <div class="home6-tour-guide-section">
                <div class="container">
                    <div class="row justify-content-center mb-50 wow animate fadeInDown" data-wow-delay="200ms" data-wow-duration="1500ms">
                        <div class="col-xl-6 col-lg-8">
                            <div class="section-title text-center">
                                <?php if (!empty($settings['gofly_travel_guide_title'])): ?>
                                    <h2><?php echo esc_html($settings['gofly_travel_guide_title']); ?></h2>
                                <?php endif; ?>
                                <?php if (!empty($settings['gofly_travel_guide_title_desc'])): ?>
                                    <p><?php echo esc_html($settings['gofly_travel_guide_title_desc']); ?></p>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                    <div class="team-slider-area mb-40">
                        <div class="swiper home3-guide-slider">
                            <div class="swiper-wrapper">
                                <?php foreach ($guide_list as $key => $guide):

                                    $link_key = 'gofly_travel_guide_link_' . $key;  // unique key per guide

                                    if (! empty($guide['gofly_travel_guide_link']['url'])) {
                                        $this->add_link_attributes($link_key, $guide['gofly_travel_guide_link']);
                                    }
                                ?>
                                    <div class="swiper-slide">
                                        <div class="tour-guide-card three">
                                            <div class="guide-img-wrap">
                                                <a <?php $this->print_render_attribute_string($link_key); ?> class="guide-img">
                                                    <img src="<?php echo esc_url($guide['gofly_travel_guide_img']['url']) ?>" alt="<?php echo esc_attr__('travel-guide-image', 'gofly-core'); ?>">
                                                </a>
                                                <ul class="social-list">
                                                    <?php if (!empty($guide['website_link_facebook']['url'])): ?>
                                                        <li>
                                                            <a href="<?php echo esc_url($guide['website_link_facebook']['url']); ?>"><i class="bx bxl-facebook"></i></a>
                                                        </li>
                                                    <?php endif; ?>
                                                    <?php if (!empty($guide['website_link_twitter']['url'])): ?>
                                                        <li>
                                                            <a href="<?php echo esc_url($guide['website_link_twitter']['url']); ?>"><i class="bi bi-twitter-x"></i></a>
                                                        </li>
                                                    <?php endif; ?>
                                                    <?php if (!empty($guide['website_link_pinterest']['url'])): ?>
                                                        <li>
                                                            <a href="<?php echo esc_url($guide['website_link_pinterest']['url']); ?>"><i class="bx bxl-pinterest-alt"></i></a>
                                                        </li>
                                                    <?php endif; ?>
                                                    <?php if (!empty($guide['website_link_instagram']['url'])): ?>
                                                        <li>
                                                            <a href="<?php echo esc_url($guide['website_link_instagram']['url']); ?>"><i class="bx bxl-instagram"></i></a>
                                                        </li>
                                                    <?php endif; ?>
                                                    <?php if (!empty($guide['website_link_linkedin']['url'])): ?>
                                                        <li>
                                                            <a href="<?php echo esc_url($guide['website_link_linkedin']['url']) ?>"><i class='bx bxl-linkedin'></i></a>
                                                        </li>
                                                    <?php endif; ?>
                                                    <?php if (!empty($guide['website_link_stackoverflow']['url'])): ?>
                                                        <li>
                                                            <a href="<?php echo esc_url($guide['website_link_stackoverflow']['url']) ?>"><i class='bx bxl-stack-overflow'></i></a>
                                                        </li>
                                                    <?php endif; ?>
                                                    <?php if (!empty($guide['website_link_behance']['url'])): ?>
                                                        <li>
                                                            <a href="<?php echo esc_url($guide['website_link_behance']['url']) ?>"><i class='bx bxl-behance'></i></a>
                                                        </li>
                                                    <?php endif; ?>
                                                    <?php if (!empty($guide['website_link_reddit']['url'])): ?>
                                                        <li>
                                                            <a href="<?php echo esc_url($guide['website_link_reddit']['url']) ?>"><i class='bx bxl-reddit'></i></a>
                                                        </li>
                                                    <?php endif; ?>
                                                </ul>
                                            </div>
                                            <div class="guide-info">
                                                <h5><a <?php $this->print_render_attribute_string($link_key); ?>><?php echo esc_html($guide['gofly_travel_guide_name']) ?></a></h5>
                                                <span><?php echo esc_html($guide['gofly_travel_guide_designation']) ?></span>
                                            </div>
                                        </div>
                                    </div>
                                <?php endforeach; ?>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-12 d-flex justify-content-center">
                            <div class="swiper-pagination1 paginations two"></div>
                        </div>
                    </div>
                </div>
            </div>
        <?php endif; ?>

        <?php if ('four' == $settings['gofly_travel_guide_widget_style']): ?>
            <div class="home7-tour-guide-section">
                <div class="container">
                    <div class="row justify-content-center mb-50 wow animate fadeInDown" data-wow-delay="200ms" data-wow-duration="1500ms">
                        <div class="col-xl-6 col-lg-8">
                            <div class="section-title text-center">
                                <?php if (!empty($settings['gofly_travel_guide_title'])): ?>
                                    <h2><?php echo esc_html($settings['gofly_travel_guide_title']); ?></h2>
                                <?php endif; ?>
                                <?php if (!empty($settings['gofly_travel_guide_title_desc'])): ?>
                                    <p><?php echo esc_html($settings['gofly_travel_guide_title_desc']); ?></p>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                    <div class="team-slider-area mb-40">
                        <div class="swiper home7-guide-slider">
                            <div class="swiper-wrapper">
                                <?php foreach ($guide_list as $key => $guide):

                                    $link_key = 'gofly_travel_guide_link_' . $key;  // unique key per guide

                                    if (! empty($guide['gofly_travel_guide_link']['url'])) {
                                        $this->add_link_attributes($link_key, $guide['gofly_travel_guide_link']);
                                    }
                                ?>
                                    <div class="swiper-slide">
                                        <div class="tour-guide-card four">
                                            <div class="guide-img-wrap">
                                                <?php if (!empty($guide['gofly_travel_guide_img']['url'])): ?>
                                                    <a <?php $this->print_render_attribute_string($link_key); ?> class="guide-img">
                                                        <img src="<?php echo esc_url($guide['gofly_travel_guide_img']['url']) ?>" alt="<?php echo esc_attr__('guide-image', 'gofly-core'); ?>">
                                                    </a>
                                                <?php endif; ?>
                                                <ul class="social-list">
                                                    <?php if (!empty($guide['website_link_facebook']['url'])): ?>
                                                        <li>
                                                            <a href="<?php echo esc_url($guide['website_link_facebook']['url']); ?>"><i class="bx bxl-facebook"></i></a>
                                                        </li>
                                                    <?php endif; ?>
                                                    <?php if (!empty($guide['website_link_twitter']['url'])): ?>
                                                        <li>
                                                            <a href="<?php echo esc_url($guide['website_link_twitter']['url']); ?>"><i class="bi bi-twitter-x"></i></a>
                                                        </li>
                                                    <?php endif; ?>
                                                    <?php if (!empty($guide['website_link_pinterest']['url'])): ?>
                                                        <li>
                                                            <a href="<?php echo esc_url($guide['website_link_pinterest']['url']); ?>"><i class="bx bxl-pinterest-alt"></i></a>
                                                        </li>
                                                    <?php endif; ?>
                                                    <?php if (!empty($guide['website_link_instagram']['url'])): ?>
                                                        <li>
                                                            <a href="<?php echo esc_url($guide['website_link_instagram']['url']); ?>"><i class="bx bxl-instagram"></i></a>
                                                        </li>
                                                    <?php endif; ?>
                                                    <?php if (!empty($guide['website_link_linkedin']['url'])): ?>
                                                        <li>
                                                            <a href="<?php echo esc_url($guide['website_link_linkedin']['url']) ?>"><i class='bx bxl-linkedin'></i></a>
                                                        </li>
                                                    <?php endif; ?>
                                                    <?php if (!empty($guide['website_link_stackoverflow']['url'])): ?>
                                                        <li>
                                                            <a href="<?php echo esc_url($guide['website_link_stackoverflow']['url']) ?>"><i class='bx bxl-stack-overflow'></i></a>
                                                        </li>
                                                    <?php endif; ?>
                                                    <?php if (!empty($guide['website_link_behance']['url'])): ?>
                                                        <li>
                                                            <a href="<?php echo esc_url($guide['website_link_behance']['url']) ?>"><i class='bx bxl-behance'></i></a>
                                                        </li>
                                                    <?php endif; ?>
                                                    <?php if (!empty($guide['website_link_reddit']['url'])): ?>
                                                        <li>
                                                            <a href="<?php echo esc_url($guide['website_link_reddit']['url']) ?>"><i class='bx bxl-reddit'></i></a>
                                                        </li>
                                                    <?php endif; ?>
                                                </ul>
                                            </div>
                                            <div class="guide-info">
                                                <?php if (!empty($guide['gofly_travel_guide_name'])): ?>
                                                    <h5><a <?php $this->print_render_attribute_string($link_key); ?>><?php echo esc_html($guide['gofly_travel_guide_name']); ?></a></h5>
                                                <?php endif; ?>
                                                <?php if (!empty($guide['gofly_travel_guide_designation'])): ?>
                                                    <span><?php echo esc_html($guide['gofly_travel_guide_designation']); ?></span>
                                                <?php endif; ?>
                                            </div>
                                        </div>
                                    </div>
                                <?php endforeach; ?>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-12 d-flex justify-content-center">
                            <div class="swiper-pagination1 paginations three"></div>
                        </div>
                    </div>
                </div>
                <?php if (!empty($settings['gofly_travel_guide_widget_animation']['url'])): ?>
                    <img src="<?php echo esc_url($settings['gofly_travel_guide_widget_animation']['url']) ?>" alt="<?php echo esc_attr__('vector-image', 'gofly-core'); ?>" class="vector">
                <?php endif; ?>
            </div>
        <?php endif; ?>


<?php

    }
}

Plugin::instance()->widgets_manager->register(new Gofly_Travel_Guide_Slider_Widget());
