<?php

namespace Elementor;

if (!defined('ABSPATH')) exit;  // Exit if accessed directly

use Elementor\core\Schemes;
use Egns_Core\Egns_Helper;

class Gofly_Banner_Contact_Widget extends Widget_Base
{

    public function get_name()
    {
        return 'gofly_banner_contact';
    }

    public function get_title()
    {
        return esc_html__('EG Banner Contact', 'gofly-core');
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
            'gofly_banner_contact_genaral',
            [
                'label' => esc_html__('General', 'gofly-core')
            ]
        );

        $this->add_control(
            'gofly_banner_contact_genaral_style_selection',
            [
                'label'   => esc_html__('Select Style', 'gofly-core'),
                'type'    => Controls_Manager::SELECT,
                'options' => [
                    'style_one'   => esc_html__('Style One', 'gofly-core'),
                    'style_two'   => esc_html__('Style Two', 'gofly-core'),
                    'style_three' => esc_html__('Style Three', 'gofly-core'),
                ],
                'default' => 'style_one',
            ]
        );

        $this->add_control(
            'gofly_banner_contact_genaral_background_image',
            [
                'label'   => esc_html__('Background Image', 'gofly-core'),
                'type'    => \Elementor\Controls_Manager::MEDIA,
                'default' => [
                    'url' => \Elementor\Utils::get_placeholder_image_src(),
                ],
                'condition'   => [
                    'gofly_banner_contact_genaral_style_selection' => 'style_three',
                ],
            ]
        );

        $this->add_control(
            'gofly_banner_contact_genaral_title_icon_image',
            [
                'label'   => esc_html__('Icon Image', 'gofly-core'),
                'type'    => \Elementor\Controls_Manager::MEDIA,
                'default' => [
                    'url' => \Elementor\Utils::get_placeholder_image_src(),
                ],
                'condition'   => [
                    'gofly_banner_contact_genaral_style_selection' => 'style_two',
                ],
            ]
        );

        $this->add_control(
            'gofly_banner_contact_genaral_three_subtitle',
            [
                'label'       => esc_html__('Subtitle', 'gofly-core'),
                'type'        => \Elementor\Controls_Manager::TEXT,
                'default'     => esc_html__('Need Visa Assitance?', 'gofly-core'),
                'placeholder' => esc_html__('write your text here', 'gofly-core'),
                'label_block' => true,
                'condition'   => [
                    'gofly_banner_contact_genaral_style_selection' => 'style_three',
                ],
            ]
        );

        $this->add_control(
            'gofly_banner_contact_genaral_three_title',
            [
                'label'       => esc_html__('Title', 'gofly-core'),
                'type'        => \Elementor\Controls_Manager::TEXT,
                'default'     => esc_html__('To Get Visa Assistance, Join Schedule a Meeting.', 'gofly-core'),
                'placeholder' => esc_html__('write your text here', 'gofly-core'),
                'label_block' => true,
                'condition'   => [
                    'gofly_banner_contact_genaral_style_selection' => 'style_three',
                ],
            ]
        );

        $this->add_control(
            'gofly_banner_contact_genaral_three_button_label',
            [
                'label'       => esc_html__('Button Label', 'gofly-core'),
                'type'        => \Elementor\Controls_Manager::TEXT,
                'default'     => esc_html__('Schedule a Consultation', 'gofly-core'),
                'placeholder' => esc_html__('write your label here', 'gofly-core'),
                'label_block' => true,
                'condition'   => [
                    'gofly_banner_contact_genaral_style_selection' => 'style_three',
                ],
            ]
        );

        $this->add_control(
            'gofly_banner_contact_genaral_three_button_label_url',
            [
                'label'       => esc_html__('Button Link/URL', 'gofly-core'),
                'type'        => \Elementor\Controls_Manager::URL,
                'default'     => ['url' => '#'],
                'placeholder' => esc_html__('write your url here', 'gofly-core'),
                'label_block' => true,
                'condition'   => [
                    'gofly_banner_contact_genaral_style_selection' => 'style_three',
                ],

            ]
        );

        $this->add_control(
            'gofly_banner_contact_genaral_three_banner_image',
            [
                'label'   => esc_html__('Banner Image', 'gofly-core'),
                'type'    => \Elementor\Controls_Manager::MEDIA,
                'default' => [
                    'url' => \Elementor\Utils::get_placeholder_image_src(),
                ],
                'media_types' => ['image'],
                'condition'   => [
                    'gofly_banner_contact_genaral_style_selection' => 'style_three',
                ],
            ]
        );


        $this->add_control(
            'gofly_banner_contact_genaral_title',
            [
                'label'       => esc_html__('Title', 'gofly-core'),
                'type'        => \Elementor\Controls_Manager::TEXT,
                'default'     => esc_html__('The World Travel Award', 'gofly-core'),
                'placeholder' => esc_html__('write your text here', 'gofly-core'),
                'label_block' => true,
                'condition'   => [
                    'gofly_banner_contact_genaral_style_selection' => 'style_two',
                ],
            ]
        );

        $this->add_control(
            'gofly_banner_contact_genaral_rating',
            [
                'label'   => esc_html__('Rating', 'gofly-core'),
                'type'    => Controls_Manager::NUMBER,
                'min'     => 0,
                'max'     => 5,
                'step'    => 1,
                'default' => 5,
                'dynamic' => [
                    'active' => true,
                ],
                'condition'   => [
                    'gofly_banner_contact_genaral_style_selection' => 'style_two',
                ],
            ]
        );

        $this->add_control(
            'gofly_banner_contact_genaral_inquiry_sec',
            [
                'label'     => esc_html__('Inquiry Section', 'gofly-core'),
                'type'      => \Elementor\Controls_Manager::HEADING,
                'separator' => 'after',
                'condition' => [
                    'gofly_banner_contact_genaral_style_selection' => 'style_one',
                ],
            ]
        );

        $this->add_control(
            'gofly_banner_contact_genaral_inquiry_sec_icon',
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
                'condition'   => [
                    'gofly_banner_contact_genaral_style_selection' => 'style_one',
                ],
            ]
        );

        $this->add_control(
            'gofly_banner_contact_genaral_inquiry_sec_title',
            [
                'label'       => esc_html__('Title', 'gofly-core'),
                'type'        => \Elementor\Controls_Manager::TEXT,
                'default'     => esc_html__('To More Inquiry', 'gofly-core'),
                'placeholder' => esc_html__('write your text here', 'gofly-core'),
                'label_block' => true,
                'condition'   => [
                    'gofly_banner_contact_genaral_style_selection' => 'style_one',
                ],
            ]
        );

        $this->add_control(
            'gofly_banner_contact_genaral_inquiry_sec_desc',
            [
                'label'       => esc_html__('Description', 'gofly-core'),
                'type'        => \Elementor\Controls_Manager::TEXT,
                'default'     => esc_html__("Don’t hesitate Call  to GoFly.", 'gofly-core'),
                'placeholder' => esc_html__('write your text here', 'gofly-core'),
                'label_block' => true,
                'condition'   => [
                    'gofly_banner_contact_genaral_style_selection' => 'style_one',
                ],
            ]
        );

        $this->add_control(
            'gofly_banner_contact_genaral_video_switcher',
            [
                'label'        => esc_html__("Show Video Section?", 'gofly-core'),
                'type'         => \Elementor\Controls_Manager::SWITCHER,
                'label_on'     => esc_html__('Enable', 'gofly-core'),
                'label_off'    => esc_html__('Disable', 'gofly-core'),
                'return_value' => 'yes',
                'default'      => 'yes',
                'condition'    => [
                    'gofly_banner_contact_genaral_style_selection' => 'style_one',
                ],
            ]
        );

        $this->add_control(
            'gofly_banner_contact_genaral_video_area',
            [
                'label'     => esc_html__('Video Area', 'gofly-core'),
                'type'      => \Elementor\Controls_Manager::HEADING,
                'separator' => 'after',
                'condition' => [
                    'gofly_banner_contact_genaral_video_switcher'  => 'yes',
                    'gofly_banner_contact_genaral_style_selection' => 'style_one'
                ],
            ]
        );

        $this->add_control(
            'gofly_banner_contact_genaral_video_area_upload',
            [
                'label'       => esc_html__('Choose Video File', 'gofly-core'),
                'type'        => \Elementor\Controls_Manager::MEDIA,
                'media_types' => ['video'],
                'condition'   => [
                    'gofly_banner_contact_genaral_video_switcher'  => 'yes',
                    'gofly_banner_contact_genaral_style_selection' => 'style_one'
                ],

            ]
        );

        $this->add_control(
            'gofly_banner_contact_genaral_contact_area',
            [
                'label'     => esc_html__('Contact Area', 'gofly-core'),
                'type'      => \Elementor\Controls_Manager::HEADING,
                'separator' => 'after',
                'condition' => [
                    'gofly_banner_contact_genaral_style_selection' => ['style_two', 'style_one']
                ],
            ]
        );

        $repeater = new \Elementor\Repeater();

        $repeater->add_control(
            'gofly_banner_contact_genaral_contact_area_icon',
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
            'gofly_banner_contact_genaral_contact_area_title',
            [
                'label'       => esc_html__('Title', 'gofly-core'),
                'type'        => \Elementor\Controls_Manager::TEXT,
                'default'     => wp_kses('Mail Us', wp_kses_allowed_html('post')),
                'placeholder' => esc_html__('write your title here', 'gofly-core'),
                'label_block' => true,
            ]
        );

        $repeater->add_control(
            'gofly_banner_contact_genaral_contact_area_selection_type',
            [
                'label'   => esc_html__('Select Type', 'gofly-core'),
                'type'    => Controls_Manager::SELECT,
                'options' => [
                    'phone' => esc_html__('Phone', 'gofly-core'),
                    'email' => esc_html__('Email', 'gofly-core'),
                ],
                'default' => 'phone',
            ]
        );

        $repeater->add_control(
            'gofly_banner_contact_genaral_contact_area_phone',
            [
                'label'       => esc_html__('Phone', 'gofly-core'),
                'type'        => \Elementor\Controls_Manager::TEXT,
                'default'     => wp_kses('+91 456 453 345', wp_kses_allowed_html('post')),
                'placeholder' => esc_html__('write your phone here', 'gofly-core'),
                'label_block' => true,
                'condition'   => [
                    'gofly_banner_contact_genaral_contact_area_selection_type' => 'phone',
                ],
            ]
        );

        $repeater->add_control(
            'gofly_banner_contact_genaral_contact_area_email',
            [
                'label'       => esc_html__('Email', 'gofly-core'),
                'type'        => \Elementor\Controls_Manager::TEXT,
                'default'     => wp_kses('info@example.com', wp_kses_allowed_html('post')),
                'placeholder' => esc_html__('write your phone here', 'gofly-core'),
                'label_block' => true,
                'condition'   => [
                    'gofly_banner_contact_genaral_contact_area_selection_type' => 'email',
                ],
            ]
        );

        $this->add_control(
            'gofly_banner_contact_genaral_contact_area_list',
            [
                'label'   => esc_html__('Content List', 'gofly-core'),
                'type'    => \Elementor\Controls_Manager::REPEATER,
                'fields'  => $repeater->get_controls(),
                'default' => [
                    [
                        'gofly_banner_contact_genaral_contact_area_title'          => esc_html('Mail Us'),
                        'gofly_banner_contact_genaral_contact_area_selection_type' => 'email',

                    ],
                    [
                        'gofly_banner_contact_genaral_contact_area_title'          => esc_html('Call Us'),
                        'gofly_banner_contact_genaral_contact_area_selection_type' => 'phone',
                    ],
                ],
                'title_field' => '{{{ gofly_banner_contact_genaral_contact_area_title }}}',
                'condition'   => [
                    'gofly_banner_contact_genaral_style_selection' => ['style_two', 'style_one']
                ],
            ]
        );

        $this->add_control(
            'gofly_banner_contact_genaral_vector_image_one',
            [
                'label'   => esc_html__('Vector Image One', 'gofly-core'),
                'type'    => \Elementor\Controls_Manager::MEDIA,
                'default' => [
                    'url' => \Elementor\Utils::get_placeholder_image_src(),
                ],
                'condition'   => [
                    'gofly_banner_contact_genaral_style_selection' => 'style_two',
                ],
            ]
        );

        $this->add_control(
            'gofly_banner_contact_genaral_vector_image_two',
            [
                'label'   => esc_html__('Vector Image Two', 'gofly-core'),
                'type'    => \Elementor\Controls_Manager::MEDIA,
                'default' => [
                    'url' => \Elementor\Utils::get_placeholder_image_src(),
                ],
                'condition'   => [
                    'gofly_banner_contact_genaral_style_selection' => 'style_two',
                ],
            ]
        );

        $this->end_controls_section();

        //============Style One Start=============//

        $this->start_controls_section(
            'gofly_banner_contact_style_genaral',
            [
                'label'     => esc_html__('Styles', 'gofly-core'),
                'tab'       => Controls_Manager::TAB_STYLE,
                'condition' => [
                    'gofly_banner_contact_genaral_style_selection' => 'style_one',
                ],
            ]
        );

        $this->add_control(
            'gofly_banner_contact_style_genaral_inquiry_sec',
            [
                'label'     => esc_html__('Inquiry Sec', 'gofly-core'),
                'type'      => \Elementor\Controls_Manager::HEADING,
                'separator' => 'after',
            ]
        );

        $this->add_control(
            'gofly_banner_contact_style_genaral_inquiry_sec_bg_color',
            [
                'label'     => esc_html__('Background Color', 'gofly-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .home5-banner-contact-wrap' => 'background-color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'gofly_banner_contact_style_genaral_inquiry_icon',
            [
                'label'     => esc_html__('Inquiry Icon', 'gofly-core'),
                'type'      => \Elementor\Controls_Manager::HEADING,
                'separator' => 'after',
            ]
        );

        $this->add_control(
            'gofly_banner_contact_style_genaral_inquiry_icon_size',
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
                'default' => [
                    'unit' => 'px',
                    'size' => 36,
                ],
                'selectors' => [
                    '{{WRAPPER}} .home5-banner-contact-wrap .banner-contact-area .inquiry-area svg' => 'width: {{SIZE}}{{UNIT}};',
                ],
            ]
        );

        $this->add_control(
            'gofly_banner_contact_style_genaral_inquiry_icon_color',
            [
                'label'     => esc_html__('Color', 'gofly-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .home5-banner-contact-wrap .banner-contact-area .inquiry-area svg' => 'fill: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'gofly_banner_contact_style_genaral_inquiry_title',
            [
                'label'     => esc_html__('Inquiry Title', 'gofly-core'),
                'type'      => \Elementor\Controls_Manager::HEADING,
                'separator' => 'after',
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'label'    => esc_html__('Typography', 'gofly-core'),
                'name'     => 'gofly_banner_contact_style_genaral_inquiry_title_typ',
                'selector' => '{{WRAPPER}} .home5-banner-contact-wrap .banner-contact-area .inquiry-area .content h6',

            ]
        );

        $this->add_control(
            'gofly_banner_contact_style_genaral_inquiry_title_color',
            [
                'label'     => esc_html__('Color', 'gofly-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .home5-banner-contact-wrap .banner-contact-area .inquiry-area .content h6' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'gofly_banner_contact_style_genaral_inquiry_description',
            [
                'label'     => esc_html__('Inquiry Description', 'gofly-core'),
                'type'      => \Elementor\Controls_Manager::HEADING,
                'separator' => 'after',
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'label'    => esc_html__('Typography', 'gofly-core'),
                'name'     => 'gofly_banner_contact_style_genaral_inquiry_description_typ',
                'selector' => '{{WRAPPER}} .home5-banner-contact-wrap .banner-contact-area .inquiry-area .content span',

            ]
        );

        $this->add_control(
            'gofly_banner_contact_style_genaral_inquiry_description_color',
            [
                'label'     => esc_html__('Color', 'gofly-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .home5-banner-contact-wrap .banner-contact-area .inquiry-area .content span' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'gofly_banner_contact_style_genaral_contact_icon',
            [
                'label'     => esc_html__('Contact Icon', 'gofly-core'),
                'type'      => \Elementor\Controls_Manager::HEADING,
                'separator' => 'after',
            ]
        );

        $this->add_control(
            'gofly_banner_contact_style_genaral_contact_icon_size',
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
                'default' => [
                    'unit' => 'px',
                    'size' => 20,
                ],
                'selectors' => [
                    '{{WRAPPER}} .banner-contact-area ul.contact-area li.single-contact .icon svg' => 'width: {{SIZE}}{{UNIT}};',
                ],
            ]
        );

        $this->add_control(
            'gofly_banner_contact_style_genaral_contact_icon_color',
            [
                'label'     => esc_html__('Color', 'gofly-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .banner-contact-area ul.contact-area li.single-contact .icon svg' => 'fill: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'gofly_banner_contact_style_genaral_contact_title',
            [
                'label'     => esc_html__('Contact Title', 'gofly-core'),
                'type'      => \Elementor\Controls_Manager::HEADING,
                'separator' => 'after',
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'label'    => esc_html__('Typography', 'gofly-core'),
                'name'     => 'gofly_banner_contact_style_genaral_contact_title_typ',
                'selector' => '{{WRAPPER}} .home5-banner-contact-wrap .banner-contact-area .contact-area .single-contact .content span',

            ]
        );

        $this->add_control(
            'gofly_banner_contact_style_genaral_contact_title_color',
            [
                'label'     => esc_html__('Color', 'gofly-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .home5-banner-contact-wrap .banner-contact-area .contact-area .single-contact .content span' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'gofly_banner_contact_style_genaral_contact_text',
            [
                'label'     => esc_html__('Contact Text', 'gofly-core'),
                'type'      => \Elementor\Controls_Manager::HEADING,
                'separator' => 'after',
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'label'    => esc_html__('Typography', 'gofly-core'),
                'name'     => 'gofly_banner_contact_style_genaral_contact_text_typ',
                'selector' => '{{WRAPPER}} .home5-banner-contact-wrap .banner-contact-area .contact-area .single-contact .content a',

            ]
        );

        $this->add_control(
            'gofly_banner_contact_style_genaral_contact_text_color',
            [
                'label'     => esc_html__('Color', 'gofly-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .home5-banner-contact-wrap .banner-contact-area .contact-area .single-contact .content a' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->end_controls_section();

        //============Style two Start=============//

        $this->start_controls_section(
            'gofly_banner_contact_style_two_genaral',
            [
                'label'     => esc_html__('Styles', 'gofly-core'),
                'tab'       => Controls_Manager::TAB_STYLE,
                'condition' => [
                    'gofly_banner_contact_genaral_style_selection' => 'style_two',
                ],
            ]
        );

        $this->add_control(
            'gofly_banner_contact_style_two_genaral_section',
            [
                'label'     => esc_html__('Section', 'gofly-core'),
                'type'      => \Elementor\Controls_Manager::HEADING,
                'separator' => 'after',
            ]
        );

        $this->add_control(
            'gofly_banner_contact_style_two_genaral_section_bg_color',
            [
                'label'     => esc_html__('Background Color', 'gofly-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .home7-banner-bottom' => 'background-color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'gofly_banner_contact_style_two_genaral_rating_title',
            [
                'label'     => esc_html__('Rating Title', 'gofly-core'),
                'type'      => \Elementor\Controls_Manager::HEADING,
                'separator' => 'after',
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'label'    => esc_html__('Typography', 'gofly-core'),
                'name'     => 'gofly_banner_contact_style_two_genaral_rating_title_typ',
                'selector' => '{{WRAPPER}} .home7-banner-bottom .award-rating-area h4',

            ]
        );

        $this->add_control(
            'gofly_banner_contact_style_two_genaral_rating_title_color',
            [
                'label'     => esc_html__('Color', 'gofly-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .home7-banner-bottom .award-rating-area h4' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'gofly_banner_contact_style_two_genaral_rating_icon',
            [
                'label'     => esc_html__('Rating Icon', 'gofly-core'),
                'type'      => \Elementor\Controls_Manager::HEADING,
                'separator' => 'after',
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'label'    => esc_html__('Typography', 'gofly-core'),
                'name'     => 'gofly_banner_contact_style_two_genaral_rating_icon_typ',
                'selector' => '{{WRAPPER}} .home7-banner-bottom .award-rating-area .rating ul li i',

            ]
        );

        $this->add_control(
            'gofly_banner_contact_style_two_genaral_rating_icon_color',
            [
                'label'     => esc_html__('Color', 'gofly-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .home7-banner-bottom .award-rating-area .rating ul li i' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'gofly_banner_contact_style_two_genaral_rating_icon_span_color',
            [
                'label'     => esc_html__('Span Color', 'gofly-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .home7-banner-bottom .award-rating-area .rating span' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'gofly_banner_contact_style_two_genaral_contact_area',
            [
                'label'     => esc_html__('Contact Area', 'gofly-core'),
                'type'      => \Elementor\Controls_Manager::HEADING,
                'separator' => 'before',
            ]
        );

        $this->add_control(
            'gofly_banner_contact_style_two_genaral_contact_area_bg_color',
            [
                'label'     => esc_html__('Background Color', 'gofly-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .home7-banner-bottom .single-contact' => 'background-color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'gofly_banner_contact_style_two_genaral_contact_area_border_color',
            [
                'label'     => esc_html__('Border Color', 'gofly-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .home7-banner-bottom .single-contact' => 'border: 1px solid {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'gofly_banner_contact_style_two_genaral_contact_area_content_icon',
            [
                'label'     => esc_html__('Icon', 'gofly-core'),
                'type'      => \Elementor\Controls_Manager::HEADING,
                'separator' => 'after',
            ]
        );

        $this->add_control(
            'gofly_banner_contact_style_two_genaral_contact_area_content_icon_size',
            [
                'label'      => esc_html__('Icon Size', 'gofly-core'),
                'type'       => \Elementor\Controls_Manager::SLIDER,
                'size_units' => ['px', '%', 'rem', 'custom'],
                'range'      => [
                    'px' => [
                        'min'  => 0,
                        'max'  => 100,
                        'step' => 1,
                    ],
                    '%' => [
                        'min' => 0,
                        'max' => 100,
                    ],
                ],
                'default' => [
                    'unit' => 'px',
                    'size' => 16,
                ],
                'selectors' => [
                    '{{WRAPPER}} .home7-banner-bottom .single-contact .icon svg' => 'width: {{SIZE}}{{UNIT}};',
                ],
            ]
        );

        $this->add_control(
            'gofly_banner_contact_style_two_genaral_contact_area_content_icon_color',
            [
                'label'     => esc_html__('Icon Color', 'gofly-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .home7-banner-bottom .single-contact .icon svg' => 'fill: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'gofly_banner_contact_style_two_genaral_contact_area_content_icon_bg_color',
            [
                'label'     => esc_html__('Icon Background Color', 'gofly-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .home7-banner-bottom .single-contact .icon' => 'background-color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'gofly_banner_contact_style_two_genaral_contact_area_title',
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
                'name'     => 'gofly_banner_contact_style_two_genaral_contact_area_title_typ',
                'selector' => '{{WRAPPER}} .home7-banner-bottom .single-contact .content span',

            ]
        );

        $this->add_control(
            'gofly_banner_contact_style_two_genaral_contact_area_title_color',
            [
                'label'     => esc_html__('Color', 'gofly-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .home7-banner-bottom .single-contact .content span' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'gofly_banner_contact_style_two_genaral_contact_area_content_lebel',
            [
                'label'     => esc_html__('Content Label', 'gofly-core'),
                'type'      => \Elementor\Controls_Manager::HEADING,
                'separator' => 'after',
            ]
        );


        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'label'    => esc_html__('Typography', 'gofly-core'),
                'name'     => 'gofly_banner_contact_style_two_genaral_contact_area_content_lebel_typ',
                'selector' => '{{WRAPPER}} .home7-banner-bottom .single-contact .content a',

            ]
        );

        $this->add_control(
            'gofly_banner_contact_style_two_genaral_contact_area_content_lebel_color',
            [
                'label'     => esc_html__('Color', 'gofly-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .home7-banner-bottom .single-contact .content a' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'gofly_banner_contact_style_two_genaral_contact_area_content_lebel_hover_color',
            [
                'label'     => esc_html__('Hover Color', 'gofly-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .home7-banner-bottom .single-contact .content a:hover' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->end_controls_section();

        //============Style three Start=============//

        $this->start_controls_section(
            'gofly_banner_contact_style_three_genaral',
            [
                'label'     => esc_html__('Styles', 'gofly-core'),
                'tab'       => Controls_Manager::TAB_STYLE,
                'condition' => [
                    'gofly_banner_contact_genaral_style_selection' => 'style_three',
                ],
            ]
        );

        $this->add_control(
            'gofly_banner_contact_style_three_genaral_global_section',
            [
                'label'     => esc_html__('Global Section', 'gofly-core'),
                'type'      => \Elementor\Controls_Manager::HEADING,
                'separator' => 'after',
            ]
        );

        $this->add_control(
            'gofly_banner_contact_style_three_genaral_global_section_color',
            [
                'label' => esc_html__('Background Color', 'gofly-core'),
                'type'  => Controls_Manager::COLOR,
            ]
        );

        $this->add_control(
            'gofly_banner_contact_style_three_genaral_subtitle',
            [
                'label'     => esc_html__('Subtitle', 'gofly-core'),
                'type'      => \Elementor\Controls_Manager::HEADING,
                'separator' => 'after',
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'label'    => esc_html__('Typography', 'gofly-core'),
                'name'     => 'gofly_banner_contact_style_three_genaral_subtitle_typ',
                'selector' => '{{WRAPPER}} .home8-contact-section .contact-wrapper .contact-content .section-title > span',

            ]
        );

        $this->add_control(
            'gofly_banner_contact_style_three_genaral_subtitle_color',
            [
                'label'     => esc_html__('Color', 'gofly-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .home8-contact-section .contact-wrapper .contact-content .section-title > span' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'gofly_banner_contact_style_three_genaral_title',
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
                'name'     => 'gofly_banner_contact_style_three_genaral_title_typ',
                'selector' => '{{WRAPPER}} .section-title h2',

            ]
        );

        $this->add_control(
            'gofly_banner_contact_style_three_genaral_title_color',
            [
                'label'     => esc_html__('Color', 'gofly-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .section-title h2' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'gofly_banner_contact_style_three_genaral_button',
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
                'name'     => 'gofly_banner_contact_style_three_genaral_button_typ',
                'selector' => '{{WRAPPER}} .primary-btn1.five',

            ]
        );

        $this->add_control(
            'gofly_banner_contact_style_three_genaral_button_color',
            [
                'label'     => esc_html__('Color', 'gofly-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .primary-btn1.five' => 'color: {{VALUE}};',
                ],
            ]
        );


        $this->add_control(
            'gofly_banner_contact_style_three_genaral_button_hover_color',
            [
                'label'     => esc_html__('Hover Color', 'gofly-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .primary-btn1:hover' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'gofly_banner_contact_style_three_genaral_button_icon_color',
            [
                'label'     => esc_html__('Icon Color', 'gofly-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .primary-btn1 > span svg' => 'fill: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'gofly_banner_contact_style_three_genaral_button_hover_icon_color',
            [
                'label'     => esc_html__('Hover Icon Color', 'gofly-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .primary-btn1:hover > span svg' => 'fill: {{VALUE}};',
                ],
            ]
        );


        $this->add_control(
            'gofly_banner_contact_style_three_genaral_button_bg_color',
            [
                'label'     => esc_html__('Background Color', 'gofly-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .primary-btn1.five' => 'background-color: {{VALUE}};',
                ],
            ]
        );


        $this->add_control(
            'gofly_banner_contact_style_three_genaral_button_hover_bg_color',
            [
                'label'     => esc_html__('Hover Background Color', 'gofly-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .primary-btn1::after' => 'background-color: {{VALUE}};',
                ],
            ]
        );

        $this->end_controls_section();
    }
    protected function render()
    {

        $settings = $this->get_settings_for_display();

?>
        <?php if ($settings['gofly_banner_contact_genaral_style_selection'] == 'style_one'): ?>
            <div class="home5-banner-contact-wrap">
                <div class="container">
                    <div class="banner-contact-area">
                        <div class="inquiry-area">
                            <?php if (!empty($settings['gofly_banner_contact_genaral_inquiry_sec_icon'])): ?>
                                <?php \Elementor\Icons_Manager::render_icon($settings['gofly_banner_contact_genaral_inquiry_sec_icon'], ['aria-hidden' => 'true']); ?>
                            <?php endif; ?>
                            <div class="content">
                                <?php if (!empty($settings['gofly_banner_contact_genaral_inquiry_sec_title'])): ?>
                                    <h6><?php echo esc_html($settings['gofly_banner_contact_genaral_inquiry_sec_title']); ?></h6>
                                <?php endif; ?>
                                <?php if (!empty($settings['gofly_banner_contact_genaral_inquiry_sec_desc'])): ?>
                                    <span><?php echo esc_html($settings['gofly_banner_contact_genaral_inquiry_sec_desc']); ?></span>
                                <?php endif; ?>
                            </div>
                        </div>
                        <?php if ($settings['gofly_banner_contact_genaral_video_switcher'] == 'yes') : ?>
                            <?php if (!empty($settings['gofly_banner_contact_genaral_video_area_upload']['url'])): ?>
                                <div class="contact-video">
                                    <video autoplay loop muted playsinline src="<?php echo esc_url($settings['gofly_banner_contact_genaral_video_area_upload']['url']); ?>"></video>
                                </div>
                            <?php endif; ?>
                        <?php endif; ?>
                        <ul class="contact-area">
                            <?php foreach ($settings['gofly_banner_contact_genaral_contact_area_list'] as $contact): ?>
                                <li class="single-contact">
                                    <?php if (!empty($contact['gofly_banner_contact_genaral_contact_area_icon'])): ?>
                                        <div class="icon">
                                            <?php \Elementor\Icons_Manager::render_icon($contact['gofly_banner_contact_genaral_contact_area_icon'], ['aria-hidden' => 'true']); ?>
                                        </div>
                                    <?php endif; ?>
                                    <div class="content">
                                        <?php if (!empty($contact['gofly_banner_contact_genaral_contact_area_title'])): ?>
                                            <span><?php echo esc_html($contact['gofly_banner_contact_genaral_contact_area_title']); ?></span>
                                        <?php endif; ?>
                                        <a href="<?php echo esc_attr($contact['gofly_banner_contact_genaral_contact_area_selection_type'] === 'email' ? 'mailto:' . $contact['gofly_banner_contact_genaral_contact_area_email'] : 'tel:' . preg_replace('/\D/', '', $contact['gofly_banner_contact_genaral_contact_area_phone'])); ?> "> <?php echo esc_html($contact['gofly_banner_contact_genaral_contact_area_selection_type'] === 'email' ? $contact['gofly_banner_contact_genaral_contact_area_email']  : $contact['gofly_banner_contact_genaral_contact_area_phone']); ?> </a>
                                    </div>
                                </li>
                            <?php endforeach; ?>
                        </ul>
                    </div>
                </div>
            </div>
        <?php endif; ?>

        <?php if ($settings['gofly_banner_contact_genaral_style_selection'] == 'style_two'): ?>
            <div class="home7-banner-bottom">
                <div class="container">
                    <div class="row gy-md-5 gy-4 align-items-center">
                        <?php if (!empty($settings['gofly_banner_contact_genaral_contact_area_list'][0])):
                            $contact = $settings['gofly_banner_contact_genaral_contact_area_list'][0]; ?>
                            <div class="col-lg-4 col-md-6 divider order-lg-1 order-2 d-flex justify-content-md-start justify-content-center">
                                <div class="single-contact">
                                    <?php if (!empty($contact['gofly_banner_contact_genaral_contact_area_icon'])): ?>
                                        <div class="icon">
                                            <?php \Elementor\Icons_Manager::render_icon($contact['gofly_banner_contact_genaral_contact_area_icon'], ['aria-hidden' => 'true']); ?>
                                        </div>
                                    <?php endif; ?>
                                    <div class="content">
                                        <?php if (!empty($contact['gofly_banner_contact_genaral_contact_area_title'])): ?>
                                            <span><?php echo esc_html($contact['gofly_banner_contact_genaral_contact_area_title']); ?></span>
                                        <?php endif; ?>
                                        <a href="<?php echo esc_attr($contact['gofly_banner_contact_genaral_contact_area_selection_type'] === 'email' ? 'mailto:' . $contact['gofly_banner_contact_genaral_contact_area_email'] : 'tel:' . preg_replace('/\D/', '', $contact['gofly_banner_contact_genaral_contact_area_phone'])); ?>"><?php echo esc_html($contact['gofly_banner_contact_genaral_contact_area_selection_type'] === 'email' ? $contact['gofly_banner_contact_genaral_contact_area_email']  : $contact['gofly_banner_contact_genaral_contact_area_phone']); ?></a>
                                    </div>
                                </div>
                            </div>
                        <?php endif; ?>

                        <div class="col-lg-4 divider order-lg-2">
                            <div class="award-rating-area">
                                <?php if (!empty($settings['gofly_banner_contact_genaral_title_icon_image']['url'])): ?>
                                    <img src="<?php echo esc_url($settings['gofly_banner_contact_genaral_title_icon_image']['url']); ?>" alt="<?php echo esc_attr__('icon-image', 'gofly-core'); ?>">
                                <?php endif; ?>
                                <?php if (!empty($settings['gofly_banner_contact_genaral_title'])): ?>
                                    <h4><?php echo esc_html($settings['gofly_banner_contact_genaral_title']); ?></h4>
                                <?php endif; ?>
                                <div class="rating">
                                    <span>(</span>
                                    <ul>
                                        <?php $rank_counter = intval($settings['gofly_banner_contact_genaral_rating']);
                                        $rank_counter = max(0, min(5, $rank_counter)); ?>
                                        <?php for ($i = 1; $i <= 5; $i++): ?>
                                            <?php if ($i <= $rank_counter) : ?>
                                                <li><i class="bi bi-star-fill"></i></li>
                                            <?php endif ?>
                                        <?php endfor; ?>
                                    </ul>
                                    <span>)</span>
                                </div>
                            </div>
                        </div>

                        <?php if (!empty($settings['gofly_banner_contact_genaral_contact_area_list'][1])):
                            $contact = $settings['gofly_banner_contact_genaral_contact_area_list'][1]; ?>
                            <div class="col-lg-4 col-md-6 d-flex justify-content-lg-end justify-content-center order-lg-3">
                                <div class="single-contact">
                                    <?php if (!empty($contact['gofly_banner_contact_genaral_contact_area_icon'])): ?>
                                        <div class="icon">
                                            <?php \Elementor\Icons_Manager::render_icon($contact['gofly_banner_contact_genaral_contact_area_icon'], ['aria-hidden' => 'true']); ?>
                                        </div>
                                    <?php endif; ?>
                                    <div class="content">
                                        <?php if (!empty($contact['gofly_banner_contact_genaral_contact_area_title'])): ?>
                                            <span><?php echo esc_html($contact['gofly_banner_contact_genaral_contact_area_title']); ?></span>
                                        <?php endif; ?>
                                        <a href="<?php echo esc_attr($contact['gofly_banner_contact_genaral_contact_area_selection_type'] === 'email' ? 'mailto:' . $contact['gofly_banner_contact_genaral_contact_area_email'] : 'tel:' . preg_replace('/\D/', '', $contact['gofly_banner_contact_genaral_contact_area_phone'])); ?>"><?php echo esc_html($contact['gofly_banner_contact_genaral_contact_area_selection_type'] === 'email' ? $contact['gofly_banner_contact_genaral_contact_area_email']  : $contact['gofly_banner_contact_genaral_contact_area_phone']); ?></a>
                                    </div>
                                </div>
                            </div>
                        <?php endif; ?>
                    </div>
                </div>
                <?php if (!empty($settings['gofly_banner_contact_genaral_vector_image_one']['url'])): ?>
                    <img src="<?php echo esc_url($settings['gofly_banner_contact_genaral_vector_image_one']['url']); ?>" alt="<?php echo esc_attr__('vector-image-one', 'gofly-core'); ?>" class="vector1">
                <?php endif; ?>
                <?php if (!empty($settings['gofly_banner_contact_genaral_vector_image_two']['url'])): ?>
                    <img src="<?php echo esc_url($settings['gofly_banner_contact_genaral_vector_image_two']['url']); ?>" alt="<?php echo esc_attr__('vector-image-two', 'gofly-core'); ?>" class="vector2">
                <?php endif; ?>
            </div>
        <?php endif; ?>

        <?php if ($settings['gofly_banner_contact_genaral_style_selection'] == 'style_three'): ?>
            <div class="home8-contact-section">
                <div class="container">
                    <div class="contact-wrapper" style="background-image: url(<?php echo esc_url($settings['gofly_banner_contact_genaral_background_image']['url']); ?>), linear-gradient(180deg, <?php echo esc_attr($settings['gofly_banner_contact_style_three_genaral_global_section_color']); ?> 0%, <?php echo esc_attr($settings['gofly_banner_contact_style_three_genaral_global_section_color']); ?> 100%)">
                        <div class="contact-content">
                            <div class="section-title">
                                <?php if (!empty($settings['gofly_banner_contact_genaral_three_subtitle'])): ?>
                                    <span><?php echo esc_html($settings['gofly_banner_contact_genaral_three_subtitle']); ?></span>
                                <?php endif; ?>
                                <?php if (!empty($settings['gofly_banner_contact_genaral_three_title'])): ?>
                                    <h2><?php echo esc_html($settings['gofly_banner_contact_genaral_three_title']); ?></h2>
                                <?php endif; ?>
                            </div>
                            <?php if (!empty($settings['gofly_banner_contact_genaral_three_button_label'])): ?>
                                <a href="<?php echo esc_url($settings['gofly_banner_contact_genaral_three_button_label_url']['url']); ?>" class="primary-btn1 five">
                                    <span>
                                        <?php echo esc_html($settings['gofly_banner_contact_genaral_three_button_label']); ?>
                                        <svg width="10" height="10" viewBox="0 0 10 10" xmlns="http://www.w3.org/2000/svg">
                                            <path
                                                d="M9.73535 1.14746C9.57033 1.97255 9.32924 3.26406 9.24902 4.66797C9.16817 6.08312 9.25559 7.5453 9.70214 8.73633C9.84754 9.12406 9.65129 9.55659 9.26367 9.70215C8.9001 9.83849 8.4969 9.67455 8.32812 9.33398L8.29785 9.26367L8.19921 8.98438C7.73487 7.5758 7.67054 5.98959 7.75097 4.58203C7.77875 4.09598 7.82525 3.62422 7.87988 3.17969L1.53027 9.53027C1.23738 9.82317 0.762615 9.82317 0.469722 9.53027C0.176829 9.23738 0.176829 8.76262 0.469722 8.46973L6.83593 2.10254C6.3319 2.16472 5.79596 2.21841 5.25 2.24902C3.8302 2.32862 2.2474 2.26906 0.958003 1.79102L0.704097 1.68945L0.635738 1.65527C0.303274 1.47099 0.157578 1.06102 0.310542 0.704102C0.463655 0.347333 0.860941 0.170391 1.22363 0.28418L1.29589 0.310547L1.48828 0.387695C2.47399 0.751207 3.79966 0.827571 5.16601 0.750977C6.60111 0.670504 7.97842 0.428235 8.86132 0.262695L9.95312 0.0585938L9.73535 1.14746Z">
                                            </path>
                                        </svg>
                                    </span>
                                    <span>
                                        <?php echo esc_html($settings['gofly_banner_contact_genaral_three_button_label']); ?>
                                        <svg width="10" height="10" viewBox="0 0 10 10" xmlns="http://www.w3.org/2000/svg">
                                            <path
                                                d="M9.73535 1.14746C9.57033 1.97255 9.32924 3.26406 9.24902 4.66797C9.16817 6.08312 9.25559 7.5453 9.70214 8.73633C9.84754 9.12406 9.65129 9.55659 9.26367 9.70215C8.9001 9.83849 8.4969 9.67455 8.32812 9.33398L8.29785 9.26367L8.19921 8.98438C7.73487 7.5758 7.67054 5.98959 7.75097 4.58203C7.77875 4.09598 7.82525 3.62422 7.87988 3.17969L1.53027 9.53027C1.23738 9.82317 0.762615 9.82317 0.469722 9.53027C0.176829 9.23738 0.176829 8.76262 0.469722 8.46973L6.83593 2.10254C6.3319 2.16472 5.79596 2.21841 5.25 2.24902C3.8302 2.32862 2.2474 2.26906 0.958003 1.79102L0.704097 1.68945L0.635738 1.65527C0.303274 1.47099 0.157578 1.06102 0.310542 0.704102C0.463655 0.347333 0.860941 0.170391 1.22363 0.28418L1.29589 0.310547L1.48828 0.387695C2.47399 0.751207 3.79966 0.827571 5.16601 0.750977C6.60111 0.670504 7.97842 0.428235 8.86132 0.262695L9.95312 0.0585938L9.73535 1.14746Z">
                                            </path>
                                        </svg>
                                    </span>
                                </a>
                            <?php endif; ?>
                        </div>
                        <?php if (!empty($settings['gofly_banner_contact_genaral_three_banner_image']['url'])): ?>
                            <div class="contact-img">
                                <img src="<?php echo esc_url($settings['gofly_banner_contact_genaral_three_banner_image']['url']); ?>" alt="<?php echo esc_attr__('banner-image', 'gofly-core'); ?>">
                            </div>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        <?php endif; ?>

<?php

    }
}

Plugin::instance()->widgets_manager->register(new Gofly_Banner_Contact_Widget());
