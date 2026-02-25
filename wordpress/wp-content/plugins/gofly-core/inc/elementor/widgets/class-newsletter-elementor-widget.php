<?php

namespace Elementor;

if (!defined('ABSPATH')) exit;  // Exit if accessed directly

use Elementor\core\Schemes;
use Egns_Core\Egns_Helper;

class Gofly_Newsletter_Widget extends Widget_Base
{

    public function get_name()
    {
        return 'gofly_newsletter';
    }

    public function get_title()
    {
        return esc_html__('EG Newsletter', 'gofly-core');
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
            'gofly_newsletter_genaral',
            [
                'label' => esc_html__('General', 'gofly-core')
            ]
        );

        $this->add_control(
            'gofly_newsletter_genaral_style_selection',
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
            'gofly_newsletter_genaral_bg_image',
            [
                'label'   => esc_html__('Background Image', 'gofly-core'),
                'type'    => \Elementor\Controls_Manager::MEDIA,
                'default' => [
                    'url' => \Elementor\Utils::get_placeholder_image_src(),
                ],
            ]
        );


        $this->add_control(
            'gofly_newsletter_genaral_title',
            [
                'label'       => esc_html__('Title', 'gofly-core'),
                'type'        => \Elementor\Controls_Manager::TEXT,
                'default'     => esc_html__('Subscribe our newsletter to discount 10% all package.', 'gofly-core'),
                'placeholder' => esc_html__('write your title here', 'gofly-core'),
                'label_block' => true,
            ]
        );

        $this->add_control(
            'gofly_newsletter_genaral_shortcode',
            [
                'label'       => esc_html__('Shortcode', 'gofly-core'),
                'type'        => \Elementor\Controls_Manager::TEXT,
                'placeholder' => esc_html__('write your shortcode here', 'gofly-core'),
                'label_block' => true,
            ]
        );

        $this->add_control(
            'gofly_newsletter_genaral_description',
            [
                'label'       => esc_html__('Description', 'gofly-core'),
                'type'        => \Elementor\Controls_Manager::TEXT,
                'default'     => esc_html__('To get monthly upto 10% best offer in all package.', 'gofly-core'),
                'placeholder' => esc_html__('write your title here', 'gofly-core'),
                'label_block' => true,
            ]
        );


        $this->add_control(
            'gofly_newsletter_genaral_banner_image',
            [
                'label'   => esc_html__('Banner Image', 'gofly-core'),
                'type'    => \Elementor\Controls_Manager::MEDIA,
                'default' => [
                    'url' => \Elementor\Utils::get_placeholder_image_src(),
                ],
                'condition' => [
                    'gofly_newsletter_genaral_style_selection' => ['style_one'],
                ]
            ]
        );

        $this->add_control(
            'gofly_newsletter_genaral_vector_image',
            [
                'label'       => esc_html__('Vector Image', 'gofly-core'),
                'type'        => \Elementor\Controls_Manager::MEDIA,
                'media_types' => ['svg', 'image'],
                'default'     => [
                    'url' => \Elementor\Utils::get_placeholder_image_src(),
                ],
                'condition' => [
                    'gofly_newsletter_genaral_style_selection' => ['style_one', 'style_two', 'style_three'],
                ]
            ]
        );

        $this->add_control(
            'gofly_newsletter_genaral_vector_image_two',
            [
                'label'       => esc_html__('Vector Image Two', 'gofly-core'),
                'type'        => \Elementor\Controls_Manager::MEDIA,
                'media_types' => ['svg', 'image'],
                'default'     => [
                    'url' => \Elementor\Utils::get_placeholder_image_src(),
                ],
                'condition' => [
                    'gofly_newsletter_genaral_style_selection' => ['style_two', 'style_three'],
                ]
            ]
        );

        $this->add_control(
            'gofly_newsletter_genaral_shape_image',
            [
                'label'   => esc_html__('Shape Image', 'gofly-core'),
                'type'    => \Elementor\Controls_Manager::MEDIA,
                'default' => [
                    'url' => \Elementor\Utils::get_placeholder_image_src(),
                ],
                'condition' => [
                    'gofly_newsletter_genaral_style_selection' => ['style_three'],
                ]
            ]
        );

        $this->end_controls_section();

        //============Style One Start=============//

        $this->start_controls_section(
            'gofly_newsletter_style_one_genaral',
            [
                'label'     => esc_html__('Styles', 'gofly-core'),
                'tab'       => Controls_Manager::TAB_STYLE,
                'condition' => [
                    'gofly_newsletter_genaral_style_selection' => ['style_one'],
                ]
            ]
        );

        $this->add_control(
            'gofly_newsletter_style_one_genaral_global_section',
            [
                'label'     => esc_html__('Global Section', 'gofly-core'),
                'type'      => \Elementor\Controls_Manager::HEADING,
                'separator' => 'after',
            ]
        );

        $this->add_control(
            'gofly_newsletter_style_one_genaral_global_section_bg_color',
            [
                'label' => esc_html__('Background Color', 'gofly-core'),
                'type'  => Controls_Manager::COLOR,
            ]
        );


        $this->add_control(
            'gofly_newsletter_style_one_genaral_title',
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
                'name'     => 'gofly_newsletter_style_one_genaral_title_typ',
                'selector' => '{{WRAPPER}} .home6-newletter-section .newsletter-wrapper h3',

            ]
        );

        $this->add_control(
            'gofly_newsletter_style_one_genaral_title_color',
            [
                'label'     => esc_html__('Color', 'gofly-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .home6-newletter-section .newsletter-wrapper h3' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'gofly_newsletter_style_one_genaral_newsletter_input_field',
            [
                'label'     => esc_html__('Newsletter Input Field', 'gofly-core'),
                'type'      => \Elementor\Controls_Manager::HEADING,
                'separator' => 'after',
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'label'    => esc_html__('Typography', 'gofly-core'),
                'name'     => 'gofly_newsletter_style_one_genaral_newsletter_input_field_typ',
                'selector' => '{{WRAPPER}} .home6-newletter-section .newsletter-wrapper .newsletter-form input',

            ]
        );

        $this->add_control(
            'gofly_newsletter_style_one_genaral_newsletter_input_field_color',
            [
                'label'     => esc_html__('Color', 'gofly-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .home6-newletter-section .newsletter-wrapper .newsletter-form input' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'gofly_newsletter_style_one_genaral_newsletter_input_field_bg_color',
            [
                'label'     => esc_html__('Background Color', 'gofly-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .home6-newletter-section .newsletter-wrapper .newsletter-form input' => 'background-color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'gofly_newsletter_style_one_genaral_newsletter_button',
            [
                'label'     => esc_html__('Newsletter Button', 'gofly-core'),
                'type'      => \Elementor\Controls_Manager::HEADING,
                'separator' => 'after',
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'label'    => esc_html__('Typography', 'gofly-core'),
                'name'     => 'gofly_newsletter_style_one_genaral_newsletter_button_typ',
                'selector' => '{{WRAPPER}} .home6-newletter-section .newsletter-wrapper .newsletter-form button',

            ]
        );

        $this->add_control(
            'gofly_newsletter_style_one_genaral_newsletter_button_color',
            [
                'label'     => esc_html__('Color', 'gofly-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .home6-newletter-section .newsletter-wrapper .newsletter-form button svg ' => 'fill: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'gofly_newsletter_style_one_genaral_newsletter_button_bg_color',
            [
                'label'     => esc_html__('Background Color', 'gofly-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .home6-newletter-section .newsletter-wrapper .newsletter-form button' => 'background-color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'gofly_newsletter_style_one_genaral_description',
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
                'name'     => 'gofly_newsletter_style_one_genaral_description_typ',
                'selector' => '{{WRAPPER}} .home6-newletter-section .newsletter-wrapper span',

            ]
        );

        $this->add_control(
            'gofly_newsletter_style_one_genaral_description_color',
            [
                'label'     => esc_html__('Color', 'gofly-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .home6-newletter-section .newsletter-wrapper span ' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->end_controls_section();

        //============Style Two Start=============//

        $this->start_controls_section(
            'gofly_newsletter_style_two_genaral',
            [
                'label'     => esc_html__('Styles', 'gofly-core'),
                'tab'       => Controls_Manager::TAB_STYLE,
                'condition' => [
                    'gofly_newsletter_genaral_style_selection' => ['style_two'],
                ]
            ]
        );

        $this->add_control(
            'gofly_newsletter_style_two_genaral_global_section',
            [
                'label'     => esc_html__('Global Section', 'gofly-core'),
                'type'      => \Elementor\Controls_Manager::HEADING,
                'separator' => 'after',
            ]
        );

        $this->add_control(
            'gofly_newsletter_style_two_genaral_global_section_bg_color',
            [
                'label' => esc_html__('Background Color', 'gofly-core'),
                'type'  => Controls_Manager::COLOR,
            ]
        );


        $this->add_control(
            'gofly_newsletter_style_two_genaral_title',
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
                'name'     => 'gofly_newsletter_style_two_genaral_title_typ',
                'selector' => '{{WRAPPER}} .home7-newsletter-section .newsletter-wrapper h3',

            ]
        );

        $this->add_control(
            'gofly_newsletter_style_two_genaral_title_color',
            [
                'label'     => esc_html__('Color', 'gofly-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .home7-newsletter-section .newsletter-wrapper h3' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'gofly_newsletter_style_two_genaral_input_field',
            [
                'label'     => esc_html__('Input Field', 'gofly-core'),
                'type'      => \Elementor\Controls_Manager::HEADING,
                'separator' => 'after',
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'label'    => esc_html__('Typography', 'gofly-core'),
                'name'     => 'gofly_newsletter_style_two_genaral_input_field_typ',
                'selector' => '{{WRAPPER}} .home7-newsletter-section .newsletter-wrapper .newsletter-form input',

            ]
        );

        $this->add_control(
            'gofly_newsletter_style_two_genaral_input_field_color',
            [
                'label'     => esc_html__('Color', 'gofly-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .home7-newsletter-section .newsletter-wrapper .newsletter-form input' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'gofly_newsletter_style_two_genaral_input_field_bg_color',
            [
                'label'     => esc_html__('Background Color', 'gofly-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .home7-newsletter-section .newsletter-wrapper .newsletter-form input' => 'background-color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'gofly_newsletter_style_two_genaral_description',
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
                'name'     => 'gofly_newsletter_style_two_genaral_description_typ',
                'selector' => '{{WRAPPER}} .home7-newsletter-section .newsletter-wrapper span',

            ]
        );

        $this->add_control(
            'gofly_newsletter_style_two_genaral_description_color',
            [
                'label'     => esc_html__('Color', 'gofly-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .home7-newsletter-section .newsletter-wrapper span' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'gofly_newsletter_style_two_genaral_button',
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
                'name'     => 'gofly_newsletter_style_two_genaral_button_typ',
                'selector' => '{{WRAPPER}} .home7-newsletter-section .newsletter-wrapper .newsletter-form button svg',

            ]
        );

        $this->add_control(
            'gofly_newsletter_style_two_genaral_button_color',
            [
                'label'     => esc_html__('Color', 'gofly-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .home7-newsletter-section .newsletter-wrapper .newsletter-form button svg' => 'fill: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'gofly_newsletter_style_two_genaral_button_bg_color',
            [
                'label'     => esc_html__('Background Color', 'gofly-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .home7-newsletter-section .newsletter-wrapper .newsletter-form button' => 'background-color: {{VALUE}};',
                ],
            ]
        );

        $this->end_controls_section();

        //============Style Three Start=============//

        $this->start_controls_section(
            'gofly_newsletter_style_three_genaral',
            [
                'label'     => esc_html__('Styles', 'gofly-core'),
                'tab'       => Controls_Manager::TAB_STYLE,
                'condition' => [
                    'gofly_newsletter_genaral_style_selection' => ['style_three'],
                ]
            ]
        );

        $this->add_control(
            'gofly_newsletter_style_three_genaral_global_section',
            [
                'label'     => esc_html__('Global Section', 'gofly-core'),
                'type'      => \Elementor\Controls_Manager::HEADING,
                'separator' => 'after',
            ]
        );

        $this->add_control(
            'gofly_newsletter_style_three_genaral_global_section_bg_color',
            [
                'label' => esc_html__('Background Color', 'gofly-core'),
                'type'  => Controls_Manager::COLOR,
            ]
        );


        $this->add_control(
            'gofly_newsletter_style_three_genaral_title',
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
                'name'     => 'gofly_newsletter_style_three_genaral_title_typ',
                'selector' => '{{WRAPPER}} .section-title h2',

            ]
        );

        $this->add_control(
            'gofly_newsletter_style_three_genaral_title_color',
            [
                'label'     => esc_html__('Color', 'gofly-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .section-title h2' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'gofly_newsletter_style_three_genaral_description',
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
                'name'     => 'gofly_newsletter_style_three_genaral_description_typ',
                'selector' => '{{WRAPPER}} .blog-and-newsletter-section .newsletter-section .newsletter-wrapper span',

            ]
        );

        $this->add_control(
            'gofly_newsletter_style_three_genaral_description_color',
            [
                'label'     => esc_html__('Color', 'gofly-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .blog-and-newsletter-section .newsletter-section .newsletter-wrapper span' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->end_controls_section();
    }
    protected function render()
    {

        $settings = $this->get_settings_for_display();

?>

        <?php if ($settings['gofly_newsletter_genaral_style_selection'] == 'style_one'): ?>
            <div class="home6-newletter-section">
                <div class="container">
                    <div class="row justify-content-center wow animate fadeInUp" data-wow-delay="200ms" data-wow-duration="1500ms">
                        <div class="col-xl-10">
                            <div class="newsletter-wrapper"
                                <?php if (!empty($settings['gofly_newsletter_genaral_bg_image']['url']) || !empty($settings['gofly_newsletter_style_one_genaral_global_section_bg_color'])): ?>
                                style="background-image: 
                                           <?php
                                            if (!empty($settings['gofly_newsletter_genaral_bg_image']['url'])) {
                                                echo 'url(\'' . esc_url($settings['gofly_newsletter_genaral_bg_image']['url']) . '\')';
                                            }
                                            if (!empty($settings['gofly_newsletter_style_one_genaral_global_section_bg_color'])) {
                                                if (!empty($settings['gofly_newsletter_genaral_bg_image']['url'])) echo ', ';
                                                $color = esc_attr($settings['gofly_newsletter_style_one_genaral_global_section_bg_color']);
                                                echo "linear-gradient($color, $color)";
                                            } ?>;"
                                <?php endif; ?>>
                                <?php if (!empty($settings['gofly_newsletter_genaral_title'])): ?>
                                    <h3><?php echo esc_html($settings['gofly_newsletter_genaral_title']); ?></h3>
                                <?php endif; ?>
                                <?php if (!empty($settings['gofly_newsletter_genaral_shortcode'])): ?>
                                    <?php echo do_shortcode($settings['gofly_newsletter_genaral_shortcode']) ?>
                                <?php endif; ?>
                                <?php if (!empty($settings['gofly_newsletter_genaral_description'])): ?>
                                    <span><?php echo esc_html($settings['gofly_newsletter_genaral_description']); ?></span>
                                <?php endif; ?>
                                <?php if (!empty($settings['gofly_newsletter_genaral_banner_image']['url'])): ?>
                                    <img src="<?php echo esc_url($settings['gofly_newsletter_genaral_banner_image']['url']); ?>" alt="<?php echo esc_attr__('banner-image', 'gofly-core'); ?>" class="newsletter-img">
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                </div>
                <?php if (!empty($settings['gofly_newsletter_genaral_vector_image']['url'])): ?>
                    <img src="<?php echo esc_url($settings['gofly_newsletter_genaral_vector_image']['url']); ?>" alt="<?php echo esc_attr__('vector-image', 'gofly-core'); ?>" class="vector1">
                <?php endif; ?>
            </div>
        <?php endif; ?>

        <?php if ($settings['gofly_newsletter_genaral_style_selection'] == 'style_two'): ?>
            <div class="home7-newsletter-section" style="background-image: url(<?php echo esc_url($settings['gofly_newsletter_genaral_bg_image']['url']); ?>), linear-gradient(180deg, <?php echo esc_attr($settings['gofly_newsletter_style_two_genaral_global_section_bg_color']); ?> 0%, <?php echo esc_attr($settings['gofly_newsletter_style_two_genaral_global_section_bg_color']); ?> 100%)">
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-xl-6 col-lg-7 col-md-10">
                            <div class="newsletter-wrapper">
                                <?php if (!empty($settings['gofly_newsletter_genaral_title'])): ?>
                                    <h3><?php echo esc_html($settings['gofly_newsletter_genaral_title']); ?></h3>
                                <?php endif; ?>
                                <?php if (!empty($settings['gofly_newsletter_genaral_shortcode'])): ?>
                                    <?php echo do_shortcode($settings['gofly_newsletter_genaral_shortcode']) ?>
                                <?php endif; ?>
                                <?php if (!empty($settings['gofly_newsletter_genaral_description'])): ?>
                                    <span><?php echo esc_html($settings['gofly_newsletter_genaral_description']); ?> </span>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                </div>
                <?php if (!empty($settings['gofly_newsletter_genaral_vector_image']['url'])): ?>
                    <img src="<?php echo esc_url($settings['gofly_newsletter_genaral_vector_image']['url']); ?>" alt="<?php echo esc_attr__('vector-image', 'gofly-core'); ?>" class="img1">
                <?php endif; ?>
                <?php if (!empty($settings['gofly_newsletter_genaral_vector_image_two']['url'])): ?>
                    <img src="<?php echo esc_url($settings['gofly_newsletter_genaral_vector_image_two']['url']); ?>" alt="<?php echo esc_attr__('vector-image-two', 'gofly-core'); ?>" class="img2">
                <?php endif; ?>
            </div>
        <?php endif; ?>

        <?php if ($settings['gofly_newsletter_genaral_style_selection'] == 'style_three'): ?>
            <div class="blog-and-newsletter-section">
                <div class="newsletter-section">
                    <div class="container">
                        <div class="newsletter-wrapper" <?php if (!empty($settings['gofly_newsletter_genaral_bg_image']['url'])) : ?> style="background-image: url(<?php echo esc_url($settings['gofly_newsletter_genaral_bg_image']['url']); ?>), linear-gradient(180deg, <?php echo esc_attr($settings['gofly_newsletter_style_three_genaral_global_section_bg_color']); ?> 0%, <?php echo esc_attr($settings['gofly_newsletter_style_three_genaral_global_section_bg_color']); ?> 100%)" <?php endif; ?>>
                            <?php if (!empty($settings['gofly_newsletter_genaral_title'])): ?>
                                <div class="section-title">
                                    <h2><?php echo esc_html($settings['gofly_newsletter_genaral_title']); ?></h2>
                                </div>
                            <?php endif; ?>
                            <?php if (!empty($settings['gofly_newsletter_genaral_shortcode'])): ?>
                                <?php echo do_shortcode($settings['gofly_newsletter_genaral_shortcode']) ?>
                            <?php endif; ?>
                            <?php if (!empty($settings['gofly_newsletter_genaral_description'])): ?>
                                <span><?php echo esc_html($settings['gofly_newsletter_genaral_description']); ?></span>
                            <?php endif; ?>
                            <?php if (!empty($settings['gofly_newsletter_genaral_vector_image']['url'])): ?>
                                <img src="<?php echo esc_url($settings['gofly_newsletter_genaral_vector_image']['url']); ?>" alt="<?php echo esc_attr__('vector-image-one', 'gofly-core'); ?>" class="vector1">
                            <?php endif; ?>
                            <?php if (!empty($settings['gofly_newsletter_genaral_vector_image_two']['url'])): ?>
                                <img src="<?php echo esc_url($settings['gofly_newsletter_genaral_vector_image_two']['url']); ?>" alt="<?php echo esc_attr__('vector-image-two', 'gofly-core'); ?>" class="vector2">
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
                <?php if (!empty($settings['gofly_newsletter_genaral_shape_image']['url'])): ?>
                    <img src="<?php echo esc_url($settings['gofly_newsletter_genaral_shape_image']['url']); ?>" alt="<?php echo esc_attr__('shape-image', 'gofly-core'); ?>" class="bg-shape">
                <?php endif; ?>
            <?php endif; ?>
            </div>
    <?php

    }
}

Plugin::instance()->widgets_manager->register(new Gofly_Newsletter_Widget());
