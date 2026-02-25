<?php

namespace Elementor;

if (!defined('ABSPATH')) exit;  // Exit if accessed directly

use Elementor\core\Schemes;
use Egns_Core\Egns_Helper;

class Gofly_Contact_Widget extends Widget_Base
{

    public function get_name()
    {
        return 'gofly_contact';
    }

    public function get_title()
    {
        return esc_html__('EG Contact', 'gofly-core');
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

        //===================== Contact Content =======================//

        $this->start_controls_section(
            'gofly_contact_content_section',
            [
                'label' => esc_html__('Contact Content', 'gofly-core')
            ]
        );

        $this->add_control(
            'gofly_contact_style',
            [
                'label'   => esc_html__('Choose Style', 'gofly-core'),
                'type'    => \Elementor\Controls_Manager::SELECT,
                'options' => [
                    'card' => esc_html__('Card', 'gofly-core'),
                    'form' => esc_html__('Contact Form', 'gofly-core'),
                ],
                'default' => 'card',
            ]
        );

        // Card Fields =====================
        $this->add_control(
            'gofly_contact_icon',
            [
                'label'     => esc_html__('Icon', 'gofly-core'),
                'type'      => \Elementor\Controls_Manager::ICONS,
                'condition' => [
                    'gofly_contact_style' => 'card',
                ],
            ]
        );
        $this->add_control(
            'gofly_contact_location',
            [
                'label'       => esc_html__('Location Name', 'gofly-core'),
                'type'        => \Elementor\Controls_Manager::TEXT,
                'default'     => esc_html__('United State', 'gofly-core'),
                'placeholder' => esc_html__('Type your name here', 'gofly-core'),
                'label_block' => true,
                'condition'   => [
                    'gofly_contact_style' => 'card',
                ],
            ]
        );
        $this->add_control(
            'gofly_contact_title',
            [
                'label'       => esc_html__('Contact Title', 'gofly-core'),
                'type'        => \Elementor\Controls_Manager::TEXT,
                'default'     => esc_html__('Contact:', 'gofly-core'),
                'placeholder' => esc_html__('Type your title here', 'gofly-core'),
                'label_block' => true,
                'condition'   => [
                    'gofly_contact_style' => 'card',
                ],
            ]
        );
        $this->add_control(
            'gofly_contact_value',
            [
                'label'       => wp_kses_post(__("Title Value", 'gofly-core')),
                'type'        => \Elementor\Controls_Manager::TEXT,
                'default'     => esc_html__('+1 (212) 555-7890', 'gofly-core'),
                'placeholder' => esc_html__('Type your value here', 'gofly-core'),
                'label_block' => true,
                'condition'   => [
                    'gofly_contact_style' => 'card',
                ],
            ]
        );
        $this->add_control(
            'gofly_contact_link',
            [
                'label'       => wp_kses_post(__("Link value (<sub>Email, Phone or Other's)</sub>", 'gofly-core')),
                'type'        => \Elementor\Controls_Manager::TEXT,
                'default'     => 'tel:12125557890',
                'placeholder' => esc_html__('mailto:example@gofly.com', 'gofly-core'),
                'label_block' => true,
                'condition'   => [
                    'gofly_contact_style' => 'card',
                ],
            ]
        );
        $this->add_control(
            'gofly_contact_description',
            [
                'label'       => esc_html__('Address or desciption', 'gofly-core'),
                'type'        => \Elementor\Controls_Manager::TEXTAREA,
                'default'     => esc_html__('Skyline Plaza, 5th Floor, 123 Main Street Los Angeles, CA 90001, USA', 'gofly-core'),
                'placeholder' => esc_html__('Type your value here', 'gofly-core'),
                'label_block' => true,
                'condition'   => [
                    'gofly_contact_style' => 'card',
                ],
            ]
        );

        $this->add_control(
            'gofly_contact_bg_color',
            [
                'label'     => esc_html__('Background Color', 'gofly-core'),
                'type'      => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .contact-page .single-contact' => 'background-color: {{VALUE}}',
                ],
                'condition' => [
                    'gofly_contact_style' => 'card',
                ],
            ]
        );

        // Form Fields =====================
        $this->add_control(
            'gofly_contact_form_title',
            [
                'label'       => esc_html__('Title', 'gofly-core'),
                'type'        => \Elementor\Controls_Manager::TEXT,
                'default'     => esc_html__('Get in Touch!', 'gofly-core'),
                'placeholder' => esc_html__('Type your name here', 'gofly-core'),
                'label_block' => true,
                'condition'   => [
                    'gofly_contact_style' => 'form',
                ],
            ]
        );
        $this->add_control(
            'gofly_contact_form_description',
            [
                'label'       => esc_html__('Short Desciption', 'gofly-core'),
                'type'        => \Elementor\Controls_Manager::TEXTAREA,
                'default'     => esc_html__('We’re excited to hear from you! Whether you have a question about our services, want to discuss a new project.', 'gofly-core'),
                'placeholder' => esc_html__('Type your value here', 'gofly-core'),
                'label_block' => true,
                'condition'   => [
                    'gofly_contact_style' => 'form',
                ],
            ]
        );
        $this->add_control(
            'gofly_contact_form_shortcode',
            [
                'label'       => esc_html__('Form Shortcode', 'gofly-core'),
                'type'        => \Elementor\Controls_Manager::TEXTAREA,
                'default'     => '[contact-form-7  title="Contact Page Form"]',
                'placeholder' => '[add_form_shortcode]',
                'label_block' => true,
                'condition'   => [
                    'gofly_contact_style' => 'form',
                ],
            ]
        );
        $this->add_control(
            'gofly_contact_form_bg_color',
            [
                'label'     => esc_html__('Background Color', 'gofly-core'),
                'type'      => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .contact-page .contact-form .contact-form-wrap' => 'background-color: {{VALUE}}',
                ],
                'condition' => [
                    'gofly_contact_style' => 'form',
                ],
            ]
        );

        $this->end_controls_section();


        //===================== Contact Content Style =======================//


        // Style Card =====================
        $this->start_controls_section(
            'gofly_contact_style_one_section',
            [
                'label'     => esc_html__('Card Style', 'gofly-core'),
                'tab'       => \Elementor\Controls_Manager::TAB_STYLE,
                'condition' => [
                    'gofly_contact_style' => 'card',
                ],
            ]
        );
        // Location 
        $this->add_control(
            'gofly_contact_location_options',
            [
                'label'     => esc_html__('Location Options', 'gofly-core'),
                'type'      => \Elementor\Controls_Manager::HEADING,
                'separator' => 'before',
            ]
        );
        $this->add_control(
            'gofly_contact_location_color',
            [
                'label'     => esc_html__('Color', 'gofly-core'),
                'type'      => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .contact-page .single-contact h4' => 'color: {{VALUE}}',
                ],
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name'     => 'gofly_contact_location_typography',
                'selector' => '{{WRAPPER}} .contact-page .single-contact h4',
            ]
        );
        // Contact title 
        $this->add_control(
            'gofly_contact_title_options',
            [
                'label'     => esc_html__('Title Options', 'gofly-core'),
                'type'      => \Elementor\Controls_Manager::HEADING,
                'separator' => 'before',
            ]
        );
        $this->add_control(
            'gofly_contact_title_color',
            [
                'label'     => esc_html__('Color', 'gofly-core'),
                'type'      => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .contact-page .single-contact h6 span' => 'color: {{VALUE}}',
                ],
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name'     => 'gofly_contact_title_typography',
                'selector' => '{{WRAPPER}} .contact-page .single-contact h6 span',
            ]
        );
        // Contact title value
        $this->add_control(
            'gofly_contact_value_options',
            [
                'label'     => esc_html__('Title Value Options', 'gofly-core'),
                'type'      => \Elementor\Controls_Manager::HEADING,
                'separator' => 'before',
            ]
        );
        $this->add_control(
            'gofly_contact_value_color',
            [
                'label'     => esc_html__('Color', 'gofly-core'),
                'type'      => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .contact-page .single-contact h6 a' => 'color: {{VALUE}}',
                ],
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name'     => 'gofly_contact_value_typography',
                'selector' => '{{WRAPPER}} .contact-page .single-contact h6 a',
            ]
        );
        // Contact description
        $this->add_control(
            'gofly_contact_description_options',
            [
                'label'     => esc_html__('Description Options', 'gofly-core'),
                'type'      => \Elementor\Controls_Manager::HEADING,
                'separator' => 'before',
            ]
        );
        $this->add_control(
            'gofly_contact_description_color',
            [
                'label'     => esc_html__('Color', 'gofly-core'),
                'type'      => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .contact-page .single-contact p' => 'color: {{VALUE}}',
                ],
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name'     => 'gofly_contact_description_typography',
                'selector' => '{{WRAPPER}} .contact-page .single-contact p',
            ]
        );

        // Icon 
        $this->add_control(
            'gofly_contact_icon_options',
            [
                'label'     => esc_html__('Icon Options', 'gofly-core'),
                'type'      => \Elementor\Controls_Manager::HEADING,
                'separator' => 'before',
            ]
        );
        $this->add_control(
            'gofly_contact_icon_height',
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
                    'size' => 35,
                ],
                'selectors' => [
                    '{{WRAPPER}} .contact-page .single-contact .icon svg' => 'height: {{SIZE}}{{UNIT}};',
                ],
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Border::get_type(),
            [
                'name'     => 'gofly_contact_icon_border',
                'selector' => '{{WRAPPER}} .contact-page .single-contact .icon',
            ]
        );
        $this->add_control(
            'gofly_contact_icon_border-radius',
            [
                'label'      => esc_html__('Border-radius', 'gofly-core'),
                'type'       => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'rem', 'custom'],
                'selectors'  => [
                    '{{WRAPPER}} .contact-page .single-contact .icon' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->add_control(
            'gofly_contact_icon_box_height',
            [
                'label'      => esc_html__('Icon box height', 'gofly-core'),
                'type'       => \Elementor\Controls_Manager::SLIDER,
                'size_units' => ['px', '%', 'rem', 'custom'],
                'range'      => [
                    'px' => [
                        'min'  => 0,
                        'max'  => 300,
                        'step' => 1,
                    ],
                ],
                'selectors' => [
                    '{{WRAPPER}} .contact-page .single-contact .icon' => 'height: {{SIZE}}{{UNIT}};',
                ],
            ]
        );
        $this->add_control(
            'gofly_contact_icon_box_width',
            [
                'label'      => esc_html__('Icon box width', 'gofly-core'),
                'type'       => \Elementor\Controls_Manager::SLIDER,
                'size_units' => ['px', '%', 'rem', 'custom'],
                'range'      => [
                    'px' => [
                        'min'  => 0,
                        'max'  => 300,
                        'step' => 1,
                    ],
                ],
                'selectors' => [
                    '{{WRAPPER}} .contact-page .single-contact .icon' => 'width: {{SIZE}}{{UNIT}};',
                ],
            ]
        );
        $this->add_control(
            'gofly_contact_icon_box_hover_bg',
            [
                'label'     => esc_html__('Icon BG Hover Color', 'gofly-core'),
                'type'      => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .contact-page .single-contact:hover .icon' => 'background-color: {{VALUE}}',
                ],
            ]
        );

        $this->end_controls_section();


        // Style Form =====================
        $this->start_controls_section(
            'gofly_contact_style_two_section',
            [
                'label'     => esc_html__('Form Style', 'gofly-core'),
                'tab'       => \Elementor\Controls_Manager::TAB_STYLE,
                'condition' => [
                    'gofly_contact_style' => 'form',
                ],
            ]
        );

        // Title 
        $this->add_control(
            'gofly_contact_form_title_options',
            [
                'label'     => esc_html__('Title Options', 'gofly-core'),
                'type'      => \Elementor\Controls_Manager::HEADING,
                'separator' => 'before',
            ]
        );
        $this->add_control(
            'gofly_contact_form_title_color',
            [
                'label'     => esc_html__('Color', 'gofly-core'),
                'type'      => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .contact-page .contact-form .contact-form-wrap .section-title h2' => 'color: {{VALUE}}',
                ],
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name'     => 'gofly_contact_form_title_typography',
                'selector' => '{{WRAPPER}} .contact-page .contact-form .contact-form-wrap .section-title h2',
            ]
        );
        // Description 
        $this->add_control(
            'gofly_contact_form_title_desc_options',
            [
                'label'     => esc_html__('Title description Options', 'gofly-core'),
                'type'      => \Elementor\Controls_Manager::HEADING,
                'separator' => 'before',
            ]
        );
        $this->add_control(
            'gofly_contact_form_title_desc_color',
            [
                'label'     => esc_html__('Color', 'gofly-core'),
                'type'      => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .contact-page .contact-form .contact-form-wrap .section-title p' => 'color: {{VALUE}}',
                ],
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name'     => 'gofly_contact_form_title_desc_typography',
                'selector' => '{{WRAPPER}} .contact-page .contact-form .contact-form-wrap .section-title p',
            ]
        );
        // Form label 
        $this->add_control(
            'gofly_contact_form_label_options',
            [
                'label'     => esc_html__('Form label Options', 'gofly-core'),
                'type'      => \Elementor\Controls_Manager::HEADING,
                'separator' => 'before',
            ]
        );
        $this->add_control(
            'gofly_contact_form_label_desc_color',
            [
                'label'     => esc_html__('Color', 'gofly-core'),
                'type'      => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .contact-page .contact-form .contact-form-wrap .form-inner label' => 'color: {{VALUE}}',
                ],
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name'     => 'gofly_contact_form_label_desc_typography',
                'selector' => '{{WRAPPER}} .contact-page .contact-form .contact-form-wrap .form-inner label',
            ]
        );
        // Form checkbox label 
        $this->add_control(
            'gofly_contact_form_checkbox_label_options',
            [
                'label'     => esc_html__('Checkbox label Options', 'gofly-core'),
                'type'      => \Elementor\Controls_Manager::HEADING,
                'separator' => 'before',
            ]
        );
        $this->add_control(
            'gofly_contact_form_checkbox_label_desc_color',
            [
                'label'     => esc_html__('Color', 'gofly-core'),
                'type'      => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .contact-page .contact-form .contact-form-wrap .form-inner2 .form-check .form-check-label' => 'color: {{VALUE}}',
                ],
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name'     => 'gofly_contact_form_checkbox_label_desc_typography',
                'selector' => '{{WRAPPER}} .contact-page .contact-form .contact-form-wrap .form-inner2 .form-check .form-check-label',
            ]
        );

        $this->end_controls_section();
    }
    protected function render()
    {

        $settings = $this->get_settings_for_display();

?>
        <div class="contact-page">

            <?php if ('card' == $settings['gofly_contact_style']): ?>
                <div class="single-contact">
                    <div class="icon">
                        <?php \Elementor\Icons_Manager::render_icon($settings['gofly_contact_icon']); ?>
                    </div>
                    <h4><?php echo esc_html($settings['gofly_contact_location']) ?></h4>
                    <h6><span><?php echo esc_html($settings['gofly_contact_title']) ?></span> <a href="<?php echo esc_html($settings['gofly_contact_link']) ?>"><?php echo esc_html($settings['gofly_contact_value']) ?></a></h6>
                    <p><?php echo esc_html($settings['gofly_contact_description']) ?></p>
                </div>
            <?php endif; ?>

            <?php if ('form' == $settings['gofly_contact_style']): ?>
                <div class="contact-form">
                    <div class="contact-form-wrap">
                        <div class="section-title text-center mb-60">
                            <h2><?php echo esc_html($settings['gofly_contact_form_title']) ?></h2>
                            <p><?php echo esc_html($settings['gofly_contact_form_description']) ?></p>
                        </div>
                        <?php echo do_shortcode($settings['gofly_contact_form_shortcode']) ?>
                    </div>
                </div>
            <?php endif; ?>

        </div>

<?php

    }
}

Plugin::instance()->widgets_manager->register(new Gofly_Contact_Widget());
