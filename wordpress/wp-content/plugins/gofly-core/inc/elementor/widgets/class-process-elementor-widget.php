<?php

namespace Elementor;

if (!defined('ABSPATH')) exit;  // Exit if accessed directly

use Elementor\core\Schemes;
use Egns_Core\Egns_Helper;

class Gofly_Process_Widget extends Widget_Base
{

    public function get_name()
    {
        return 'gofly_process';
    }

    public function get_title()
    {
        return esc_html__('EG Process', 'gofly-core');
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
            'gofly_process_genaral',
            [
                'label' => esc_html__('General', 'gofly-core')
            ]
        );

        $this->add_control(
            'gofly_process_select_style',
            [
                'label'   => esc_html__('Select Style', 'gofly-core'),
                'type'    => \Elementor\Controls_Manager::SELECT,
                'options' => [
                    'one' => esc_html__('Widget Style 01', 'gofly-core'),
                    'two' => esc_html__('Widget Style 02', 'gofly-core'),
                ],
                'default' => 'one',
            ]
        );

        $this->add_control(
            'gofly_process_genaral_title',
            [
                'label'       => esc_html__('Title', 'gofly-core'),
                'type'        => \Elementor\Controls_Manager::TEXT,
                'default'     => esc_html__('Working Process', 'gofly-core'),
                'placeholder' => esc_html__('write your title text here', 'gofly-core'),
                'label_block' => true,
            ]
        );

        $this->add_control(
            'gofly_process_genaral_description',
            [
                'label'       => esc_html__('Description', 'gofly-core'),
                'type'        => \Elementor\Controls_Manager::TEXTAREA,
                'default'     => wp_kses('A curated list of the most popular travel packages based on different destinations.', wp_kses_allowed_html('post')),
                'placeholder' => esc_html__('write your title here', 'gofly-core'),
                'label_block' => true,
            ]
        );

        $repeater = new \Elementor\Repeater();

        $repeater->add_control(
            'gofly_process_genaral_content_step_icon',
            [
                'label' => esc_html__('Choose Image', 'gofly-core'),
                'type' => \Elementor\Controls_Manager::MEDIA,
                'default' => [
                    'url' => \Elementor\Utils::get_placeholder_image_src(),
                ],
            ]
        );
        $repeater->add_control(
            'gofly_process_genaral_content_step_no',
            [
                'label'       => esc_html__('Step Number', 'gofly-core'),
                'type'        => \Elementor\Controls_Manager::TEXT,
                'default'     => esc_html__('01', 'gofly-core'),
                'placeholder' => esc_html__('write your content title here', 'gofly-core'),
                'label_block' => true,
            ]
        );
        $repeater->add_control(
            'gofly_process_genaral_content_title',
            [
                'label'       => esc_html__('Content Title', 'gofly-core'),
                'type'        => \Elementor\Controls_Manager::TEXT,
                'default'     => esc_html__('Apply Online', 'gofly-core'),
                'placeholder' => esc_html__('write your content title here', 'gofly-core'),
                'label_block' => true,
            ]
        );
        $repeater->add_control(
            'gofly_process_genaral_content_description',
            [
                'label'       => esc_html__('Content Description', 'gofly-core'),
                'type'        => \Elementor\Controls_Manager::TEXTAREA,
                'default'     => wp_kses("The first step is to assess the client's needs based on the type of visa <span>(Tourist, Business, Student, etc.).</span>", wp_kses_allowed_html('post')),
                'placeholder' => esc_html__('write your content description here', 'gofly-core'),
                'label_block' => true,
            ]
        );

        $this->add_control(
            'gofly_process_genaral_content_list',
            [
                'label'   => esc_html__('Content List', 'gofly-core'),
                'type'    => \Elementor\Controls_Manager::REPEATER,
                'fields'  => $repeater->get_controls(),
                'default' => [
                    [
                        'gofly_process_genaral_content_step_no' => '01',
                        'gofly_process_genaral_content_title'   => esc_html('Apply Online'),
                    ],
                    [
                        'gofly_process_genaral_content_step_no' => '02',
                        'gofly_process_genaral_content_title'   => esc_html('Get an Appointment'),
                    ],
                    [
                        'gofly_process_genaral_content_step_no' => '03',
                        'gofly_process_genaral_content_title'   => esc_html('Submit Documents'),
                    ],
                    [
                        'gofly_process_genaral_content_step_no' => '04',
                        'gofly_process_genaral_content_title'   => esc_html('Receive Visa'),
                    ],

                ],
                'title_field' => '{{{ gofly_process_genaral_content_title }}}',
            ]
        );

        $this->add_control(
            'gofly_process_genaral_contact_and_apply_area',
            [
                'label'     => esc_html__('Contact And Apply Area', 'gofly-core'),
                'type'      => \Elementor\Controls_Manager::HEADING,
                'separator' => 'after',
                'condition' => [
                    'gofly_process_select_style' => 'one',
                ],
            ]
        );

        $this->add_control(
            'gofly_process_genaral_contact_and_apply_area_icon',
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
                    'gofly_process_select_style' => 'one',
                ],
            ]
        );

        $this->add_control(
            'gofly_process_genaral_contact_title',
            [
                'label'       => esc_html__('Title', 'gofly-core'),
                'type'        => \Elementor\Controls_Manager::TEXT,
                'default'     => esc_html__('E-Message', 'gofly-core'),
                'placeholder' => esc_html__('write your content title here', 'gofly-core'),
                'label_block' => true,
                'condition'   => [
                    'gofly_process_select_style' => 'one',
                ],
            ]
        );

        $this->add_control(
            'gofly_process_genaral_contact_email',
            [
                'label'       => esc_html__('Email', 'gofly-core'),
                'type'        => \Elementor\Controls_Manager::TEXT,
                'default'     => esc_html__('info@example.com', 'gofly-core'),
                'placeholder' => esc_html__('write your content email here', 'gofly-core'),
                'label_block' => true,
                'condition'   => [
                    'gofly_process_select_style' => 'one',
                ],
            ]
        );

        $this->add_control(
            'gofly_process_genaral_contact_divider_text',
            [
                'label'       => esc_html__('Divider Text', 'gofly-core'),
                'type'        => \Elementor\Controls_Manager::TEXT,
                'default'     => esc_html__('OR', 'gofly-core'),
                'placeholder' => esc_html__('write your divider text here', 'gofly-core'),
                'label_block' => true,
                'condition'   => [
                    'gofly_process_select_style' => 'one',
                ],
            ]
        );

        $this->add_control(
            'gofly_process_genaral_contact_button_label',
            [
                'label'       => esc_html__('Button Label', 'gofly-core'),
                'type'        => \Elementor\Controls_Manager::TEXT,
                'default'     => esc_html__('Book Now', 'gofly-core'),
                'placeholder' => esc_html__('write your label here', 'gofly-core'),
                'label_block' => true,
                'condition'   => [
                    'gofly_process_select_style' => 'one',
                ],
            ]
        );

        $this->add_control(
            'gofly_process_genaral_contact_button_label_link',
            [
                'label'       => esc_html__('Button Link/URL', 'gofly-core'),
                'type'        => \Elementor\Controls_Manager::URL,
                'default'     => ['url' => '#'],
                'placeholder' => esc_html__('write your url here', 'gofly-core'),
                'label_block' => true,
                'condition'   => [
                    'gofly_process_select_style' => 'one',
                ],
            ]
        );

        $this->add_control(
            'gofly_process_genaral_contact_vector_image',
            [
                'label'       => esc_html__('Vector Image', 'gofly-core'),
                'type'        => \Elementor\Controls_Manager::MEDIA,
                'media_types' => ['image'],
                'condition'   => [
                    'gofly_process_select_style' => 'one',
                ],
            ]
        );

        $this->end_controls_section();

        //=====================Style One Start=======================//

        $this->start_controls_section(
            'gofly_process_style_genaral',
            [
                'label' => esc_html__('Styles', 'gofly-core'),
                'tab'   => Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_control(
            'gofly_process_style_genaral_section',
            [
                'label'     => esc_html__('Section', 'gofly-core'),
                'type'      => \Elementor\Controls_Manager::HEADING,
                'separator' => 'after',
            ]
        );

        $this->add_control(
            'gofly_process_style_genaral_section_bg_color',
            [
                'label'     => esc_html__('Background Color', 'gofly-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .home8-process-section' => 'background-color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'gofly_process_style_genaral_title',
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
                'name'     => 'gofly_process_style_genaral_title_typ',
                'selector' => '{{WRAPPER}} .section-title.white h2',

            ]
        );

        $this->add_control(
            'gofly_process_style_genaral_title_color',
            [
                'label'     => esc_html__('Color', 'gofly-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .section-title.white h2' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'gofly_process_style_genaral_description',
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
                'name'     => 'gofly_process_style_genaral_description_typ',
                'selector' => '{{WRAPPER}} .section-title.white p',

            ]
        );

        $this->add_control(
            'gofly_process_style_genaral_description_color',
            [
                'label'     => esc_html__('Color', 'gofly-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .section-title.white p' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'gofly_process_style_genaral_step_number',
            [
                'label'     => esc_html__('Step Number', 'gofly-core'),
                'type'      => \Elementor\Controls_Manager::HEADING,
                'separator' => 'after',
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'label'    => esc_html__('Typography', 'gofly-core'),
                'name'     => 'gofly_process_style_genaral_step_number_typ',
                'selector' => '{{WRAPPER}} .home8-process-section .process-wrapper .process-card .process-no',

            ]
        );

        $this->add_control(
            'gofly_process_style_genaral_step_number_color',
            [
                'label'     => esc_html__('Color', 'gofly-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .home8-process-section .process-wrapper .process-card .process-no' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'gofly_process_style_genaral_step_number_hover_color',
            [
                'label'     => esc_html__('Hover Color', 'gofly-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .home8-process-section .process-wrapper .process-card:hover .process-no' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'gofly_process_style_genaral_step_number_border_color',
            [
                'label'     => esc_html__('Border Color', 'gofly-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .home8-process-section .process-wrapper .process-card .process-no' => 'border: 1px solid {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'gofly_process_style_genaral_step_number_border_hover_color',
            [
                'label'     => esc_html__('Hover Border Color', 'gofly-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .home8-process-section .process-wrapper .process-card:hover .process-no' => 'border-color: {{VALUE}};',
                ],
            ]
        );


        $this->add_control(
            'gofly_process_style_genaral_step_number_bg_color',
            [
                'label'     => esc_html__('Background Color', 'gofly-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .home8-process-section .process-wrapper .process-card .process-no' => 'background-color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'gofly_process_style_genaral_step_number_hover_bg_color',
            [
                'label'     => esc_html__('Hover Background Color', 'gofly-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .home8-process-section .process-wrapper .process-card:hover .process-no' => 'background-color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'gofly_process_style_genaral_step_number_line_color',
            [
                'label'     => esc_html__('Line Color', 'gofly-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .home8-process-section .process-wrapper .line' => 'fill: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'gofly_process_style_genaral_content_title',
            [
                'label'     => esc_html__('Content Title', 'gofly-core'),
                'type'      => \Elementor\Controls_Manager::HEADING,
                'separator' => 'after',
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'label'    => esc_html__('Typography', 'gofly-core'),
                'name'     => 'gofly_process_style_genaral_content_title_typ',
                'selector' => '{{WRAPPER}} .home8-process-section .process-wrapper .process-card h4',

            ]
        );

        $this->add_control(
            'gofly_process_style_genaral_content_title_color',
            [
                'label'     => esc_html__('Color', 'gofly-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .home8-process-section .process-wrapper .process-card h4' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'gofly_process_style_genaral_content_description',
            [
                'label'     => esc_html__('Content Description', 'gofly-core'),
                'type'      => \Elementor\Controls_Manager::HEADING,
                'separator' => 'after',
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'label'    => esc_html__('Typography', 'gofly-core'),
                'name'     => 'gofly_process_style_genaral_content_description_typ',
                'selector' => '{{WRAPPER}} .home8-process-section .process-wrapper .process-card p',

            ]
        );

        $this->add_control(
            'gofly_process_style_genaral_content_description_color',
            [
                'label'     => esc_html__('Color', 'gofly-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .home8-process-section .process-wrapper .process-card p' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'gofly_process_style_genaral_content_description_second_color',
            [
                'label'     => esc_html__('Second Color', 'gofly-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .home8-process-section .process-wrapper .process-card p span' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'gofly_process_style_genaral_contact_icon',
            [
                'label'     => esc_html__('Contact Icon', 'gofly-core'),
                'type'      => \Elementor\Controls_Manager::HEADING,
                'separator' => 'after',
            ]
        );

        $this->add_control(
            'gofly_process_style_genaral_contact_icon_color',
            [
                'label'     => esc_html__('Color', 'gofly-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .home8-process-section .apply-area .contact-area .icon svg' => 'fill: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'gofly_process_style_genaral_contact_icon_bg_color',
            [
                'label'     => esc_html__('Background Color', 'gofly-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .home8-process-section .apply-area .contact-area .icon' => 'background-color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'gofly_process_style_genaral_contact_title',
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
                'name'     => 'gofly_process_style_genaral_contact_title_typ',
                'selector' => '{{WRAPPER}} .home8-process-section .apply-area .contact-area .content span',

            ]
        );

        $this->add_control(
            'gofly_process_style_genaral_contact_title_color',
            [
                'label'     => esc_html__('Color', 'gofly-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .home8-process-section .apply-area .contact-area .content span' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'gofly_process_style_genaral_contact_email',
            [
                'label'     => esc_html__('Contact Email', 'gofly-core'),
                'type'      => \Elementor\Controls_Manager::HEADING,
                'separator' => 'after',
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'label'    => esc_html__('Typography', 'gofly-core'),
                'name'     => 'gofly_process_style_genaral_contact_email_typ',
                'selector' => '{{WRAPPER}} .home8-process-section .apply-area .contact-area .content a',

            ]
        );

        $this->add_control(
            'gofly_process_style_genaral_contact_email_color',
            [
                'label'     => esc_html__('Color', 'gofly-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .home8-process-section .apply-area .contact-area .content a' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'gofly_process_style_genaral_contact_email_hover_color',
            [
                'label'     => esc_html__('Hover Color', 'gofly-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .home8-process-section .apply-area .contact-area .content a:hover' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'gofly_process_style_genaral_contact_divider_text',
            [
                'label'     => esc_html__('Divider Text', 'gofly-core'),
                'type'      => \Elementor\Controls_Manager::HEADING,
                'separator' => 'after',
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'label'    => esc_html__('Typography', 'gofly-core'),
                'name'     => 'gofly_process_style_genaral_contact_divider_text_typ',
                'selector' => '{{WRAPPER}} .home8-process-section .apply-area strong',

            ]
        );

        $this->add_control(
            'gofly_process_style_genaral_contact_divider_text_color',
            [
                'label'     => esc_html__('Color', 'gofly-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .home8-process-section .apply-area strong' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'gofly_process_style_genaral_contact_button',
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
                'name'     => 'gofly_process_style_genaral_contact_button_typ',
                'selector' => '{{WRAPPER}} .primary-btn1',

            ]
        );

        $this->add_control(
            'gofly_process_style_genaral_contact_button_color',
            [
                'label'     => esc_html__('Color', 'gofly-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .primary-btn1' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'gofly_process_style_genaral_contact_button_hover_color',
            [
                'label'     => esc_html__('Hover Color', 'gofly-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .home8-process-section .apply-area .primary-btn1:hover' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'gofly_process_style_genaral_contact_button_icon_color',
            [
                'label'     => esc_html__('Icon Color', 'gofly-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .primary-btn1 > span svg' => 'fill: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'gofly_process_style_genaral_contact_button_icon_hover_color',
            [
                'label'     => esc_html__('Hover Icon Color', 'gofly-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .home8-process-section .apply-area .primary-btn1:hover svg' => 'fill: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'gofly_process_style_genaral_contact_button_bg_color',
            [
                'label'     => esc_html__('Background Color', 'gofly-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .primary-btn1.five' => 'background-color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'gofly_process_style_genaral_contact_button_bg_hover_color',
            [
                'label'     => esc_html__('Hover Background Color', 'gofly-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .home8-process-section .apply-area .primary-btn1::after' => 'background-color: {{VALUE}};',
                ],
            ]
        );

        $this->end_controls_section();
    }
    protected function render()
    {

        $settings = $this->get_settings_for_display();

?>

        <?php if ('one' == $settings['gofly_process_select_style']): ?>
            <div class="home8-process-section">
                <div class="container">
                    <div class="row justify-content-center mb-50 wow animate fadeInDown" data-wow-delay="200ms" data-wow-duration="1500ms">
                        <div class="col-lg-6">
                            <div class="section-title white text-center">
                                <?php if (!empty($settings['gofly_process_genaral_title'])): ?>
                                    <h2><?php echo esc_html($settings['gofly_process_genaral_title']); ?></h2>
                                <?php endif; ?>
                                <?php if (!empty($settings['gofly_process_genaral_description'])): ?>
                                    <p><?php echo wp_kses($settings['gofly_process_genaral_description'], wp_kses_allowed_html('post')); ?></p>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                    <div class="process-wrapper mb-60">
                        <div class="row gy-5">
                            <?php foreach ($settings['gofly_process_genaral_content_list'] as $process): ?>
                                <div class="col-lg-3 col-sm-6">
                                    <div class="process-card">
                                        <?php if (!empty($process['gofly_process_genaral_content_step_no'])): ?>
                                            <span class="process-no"><?php echo esc_html($process['gofly_process_genaral_content_step_no']); ?></span>
                                        <?php endif; ?>
                                        <?php if (!empty($process['gofly_process_genaral_content_title'])): ?>
                                            <h4><?php echo esc_html($process['gofly_process_genaral_content_title']); ?></h4>
                                        <?php endif; ?>
                                        <?php if (!empty($process['gofly_process_genaral_content_description'])): ?>
                                            <p><?php echo wp_kses($process['gofly_process_genaral_content_description'], wp_kses_allowed_html('post')); ?></p>
                                        <?php endif; ?>
                                    </div>
                                </div>
                            <?php endforeach; ?>
                        </div>
                        <svg class="line" height="6" viewBox="0 0 1320 6" xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M5 2.5L0 0.113249V5.88675L5 3.5V2.5ZM1315 3.5L1320 5.88675V0.113249L1315 2.5V3.5ZM4.5 3.5H1315.5V2.5H4.5V3.5Z" />
                        </svg>
                    </div>
                    <div class="apply-area wow animate fadeInUp" data-wow-delay="200ms" data-wow-duration="1500ms">
                        <div class="contact-area">
                            <div class="icon">
                                <svg width="20" height="16" viewBox="0 0 20 16" xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd" clip-rule="evenodd"
                                        d="M1.7006 1.22694L7.64404 7.17295C8.94032 8.46674 11.0593 8.46786 12.3566 7.17295L18.3001 1.22694C18.3141 1.21297 18.3249 1.19607 18.3317 1.17746C18.3385 1.15884 18.3411 1.13896 18.3394 1.11922C18.3377 1.09948 18.3316 1.08037 18.3216 1.06324C18.3117 1.0461 18.2981 1.03137 18.2818 1.02009C17.6756 0.597317 16.938 0.34668 16.1435 0.34668H3.8572C3.06267 0.34668 2.32511 0.59736 1.71891 1.02009C1.70262 1.03137 1.68901 1.0461 1.67905 1.06324C1.66909 1.08037 1.66302 1.09948 1.66128 1.11922C1.65953 1.13896 1.66215 1.15884 1.66894 1.17746C1.67574 1.19607 1.68655 1.21297 1.7006 1.22694ZM0.112306 4.09154C0.111822 3.48738 0.258646 2.89223 0.54006 2.35762C0.549884 2.33877 0.564016 2.32251 0.581309 2.31015C0.598601 2.29779 0.618565 2.28969 0.639578 2.2865C0.660591 2.28331 0.68206 2.28512 0.702241 2.29179C0.722422 2.29846 0.740745 2.30979 0.75572 2.32488L6.62392 8.19307C8.48219 10.0541 11.5174 10.0551 13.3768 8.19307L19.245 2.32488C19.26 2.30979 19.2783 2.29846 19.2985 2.29179C19.3187 2.28512 19.3401 2.28331 19.3611 2.2865C19.3822 2.28969 19.4021 2.29779 19.4194 2.31015C19.4367 2.32251 19.4508 2.33877 19.4607 2.35762C19.7421 2.89223 19.8889 3.48739 19.8884 4.09154V11.9091C19.8884 13.9756 18.2074 15.654 16.1435 15.654H3.8572C1.79333 15.654 0.112306 13.9756 0.112306 11.9091V4.09154Z" />
                                </svg>
                            </div>
                            <div class="content">
                                <?php if (!empty($settings['gofly_process_genaral_contact_title'])): ?>
                                    <span><?php echo esc_html($settings['gofly_process_genaral_contact_title']); ?></span>
                                <?php endif; ?>
                                <?php if (!empty($settings['gofly_process_genaral_contact_email'])): ?>
                                    <a href="mailto:<?php echo esc_html($settings['gofly_process_genaral_contact_email']); ?>"><?php echo esc_html($settings['gofly_process_genaral_contact_email']); ?></a>
                                <?php endif; ?>
                            </div>
                        </div>
                        <?php if (!empty($settings['gofly_process_genaral_contact_divider_text'])): ?>
                            <strong><?php echo esc_html($settings['gofly_process_genaral_contact_divider_text']); ?></strong>
                        <?php endif; ?>
                        <?php if (!empty($settings['gofly_process_genaral_contact_button_label'])): ?>
                            <a href="<?php echo esc_url($settings['gofly_process_genaral_contact_button_label_link']['url']); ?>" class="primary-btn1 two five">
                                <span>
                                    <?php echo esc_html($settings['gofly_process_genaral_contact_button_label']); ?>
                                    <svg width="10" height="10" viewBox="0 0 10 10" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M9.73535 1.14746C9.57033 1.97255 9.32924 3.26406 9.24902 4.66797C9.16817 6.08312 9.25559 7.5453 9.70214 8.73633C9.84754 9.12406 9.65129 9.55659 9.26367 9.70215C8.9001 9.83849 8.4969 9.67455 8.32812 9.33398L8.29785 9.26367L8.19921 8.98438C7.73487 7.5758 7.67054 5.98959 7.75097 4.58203C7.77875 4.09598 7.82525 3.62422 7.87988 3.17969L1.53027 9.53027C1.23738 9.82317 0.762615 9.82317 0.469722 9.53027C0.176829 9.23738 0.176829 8.76262 0.469722 8.46973L6.83593 2.10254C6.3319 2.16472 5.79596 2.21841 5.25 2.24902C3.8302 2.32862 2.2474 2.26906 0.958003 1.79102L0.704097 1.68945L0.635738 1.65527C0.303274 1.47099 0.157578 1.06102 0.310542 0.704102C0.463655 0.347333 0.860941 0.170391 1.22363 0.28418L1.29589 0.310547L1.48828 0.387695C2.47399 0.751207 3.79966 0.827571 5.16601 0.750977C6.60111 0.670504 7.97842 0.428235 8.86132 0.262695L9.95312 0.0585938L9.73535 1.14746Z"></path>
                                    </svg>
                                </span>
                                <span>
                                    <?php echo esc_html($settings['gofly_process_genaral_contact_button_label']); ?>
                                    <svg width="10" height="10" viewBox="0 0 10 10" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M9.73535 1.14746C9.57033 1.97255 9.32924 3.26406 9.24902 4.66797C9.16817 6.08312 9.25559 7.5453 9.70214 8.73633C9.84754 9.12406 9.65129 9.55659 9.26367 9.70215C8.9001 9.83849 8.4969 9.67455 8.32812 9.33398L8.29785 9.26367L8.19921 8.98438C7.73487 7.5758 7.67054 5.98959 7.75097 4.58203C7.77875 4.09598 7.82525 3.62422 7.87988 3.17969L1.53027 9.53027C1.23738 9.82317 0.762615 9.82317 0.469722 9.53027C0.176829 9.23738 0.176829 8.76262 0.469722 8.46973L6.83593 2.10254C6.3319 2.16472 5.79596 2.21841 5.25 2.24902C3.8302 2.32862 2.2474 2.26906 0.958003 1.79102L0.704097 1.68945L0.635738 1.65527C0.303274 1.47099 0.157578 1.06102 0.310542 0.704102C0.463655 0.347333 0.860941 0.170391 1.22363 0.28418L1.29589 0.310547L1.48828 0.387695C2.47399 0.751207 3.79966 0.827571 5.16601 0.750977C6.60111 0.670504 7.97842 0.428235 8.86132 0.262695L9.95312 0.0585938L9.73535 1.14746Z"></path>
                                    </svg>
                                </span>
                            </a>
                        <?php endif; ?>
                    </div>
                </div>
                <?php if (!empty($settings['gofly_process_genaral_contact_vector_image']['url'])): ?>
                    <div class="vector">
                        <img src="<?php echo esc_url($settings['gofly_process_genaral_contact_vector_image']['url']); ?>" alt="<?php echo esc_attr__('vector-image', 'gofly-core'); ?>">
                    </div>
                <?php endif; ?>
            </div>
        <?php endif; ?>

        <?php if ('two' == $settings['gofly_process_select_style']): ?>
            <div class="work-section">
                <div class="container">
                    <div class="row justify-content-center mb-60 wow animate fadeInDown" data-wow-delay="200ms"
                        data-wow-duration="1500ms">
                        <div class="col-lg-5">
                            <div class="section-title text-center">
                                <?php if (!empty($settings['gofly_process_genaral_title'])): ?>
                                    <h2><?php echo esc_html($settings['gofly_process_genaral_title']); ?></h2>
                                <?php endif; ?>
                                <?php if (!empty($settings['gofly_process_genaral_description'])): ?>
                                    <p><?php echo wp_kses($settings['gofly_process_genaral_description'], wp_kses_allowed_html('post')); ?></p>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                    <div class="row gy-5">
                        <?php foreach ($settings['gofly_process_genaral_content_list'] as $process): ?>
                            <div class="col-lg-4 col-md-6 wow animate fadeInDown" data-wow-delay="200ms" data-wow-duration="1500ms">
                                <div class="work-step-card">
                                    <div class="step-icon">
                                        <img src="<?php echo esc_url($process['gofly_process_genaral_content_step_icon']['url']); ?>" alt="<?php echo esc_attr('image') ?>">
                                    </div>
                                    <div class="content">
                                        <?php if (!empty($process['gofly_process_genaral_content_step_no'])): ?>
                                            <span class="process-no"><?php echo esc_html($process['gofly_process_genaral_content_step_no']); ?></span>
                                            <?php endif; ?><?php if (!empty($process['gofly_process_genaral_content_title'])): ?>
                                            <h4><?php echo esc_html($process['gofly_process_genaral_content_title']); ?></h4>
                                        <?php endif; ?>
                                        <?php if (!empty($process['gofly_process_genaral_content_description'])): ?>
                                            <p><?php echo $process['gofly_process_genaral_content_description']; ?></p>
                                        <?php endif; ?>
                                    </div>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    </div>
                </div>
            </div>
        <?php endif; ?>

<?php

    }
}

Plugin::instance()->widgets_manager->register(new Gofly_Process_Widget());
