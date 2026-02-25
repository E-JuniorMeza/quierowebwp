<?php

namespace Elementor;

if (!defined('ABSPATH')) exit;  // Exit if accessed directly

use Elementor\core\Schemes;
use Elementor\Group_Control_Typography;
use Egns_Core\Egns_Helper;

class Gofly_Gallery_Widget extends Widget_Base
{

    public function get_name()
    {
        return 'gofly_gallery';
    }

    public function get_title()
    {
        return esc_html__('EG Gallery', 'gofly-core');
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
            'gofly_gallery_genaral',
            [
                'label' => esc_html__('General', 'gofly-core')
            ]
        );

        $this->add_control(
            'gofly_gallery_genaral_title',
            [
                'label'       => __('Title', 'gofly-core'),
                'type'        => \Elementor\Controls_Manager::TEXT,
                'default'     => __('GoFly Gallery', 'gofly-core'),
                'label_block' => true,
            ]
        );

        $this->add_control(
            'gofly_gallery_genaral_desc',
            [
                'label'       => __('Description', 'gofly-core'),
                'type'        => \Elementor\Controls_Manager::TEXTAREA,
                'default'     => __('We go beyond just booking trips—we create unforgettable travel experiences that match your dreams!', 'gofly-core'),
                'label_block' => true,
            ]
        );

        $this->add_control(
            'gofly_gallery_genaral_desc_button',
            [
                'label'       => esc_html__('Button Label', 'gofly-core'),
                'type'        => \Elementor\Controls_Manager::TEXT,
                'default'     => esc_html__('View All Package.', 'gofly-core'),
                'placeholder' => esc_html__('write your label here', 'gofly-core'),
                'label_block' => true,
            ]
        );

        $this->add_control(
            'gofly_gallery_genaral_desc_button_link',
            [
                'label'       => esc_html__('Button URL', 'gofly-core'),
                'type'        => \Elementor\Controls_Manager::URL,
                'default'     => ['#'],
                'placeholder' => esc_html__('https://yourlink.com', 'gofly-core'),
                'label_block' => true,
            ]
        );

        $this->add_control(
            'gofly_gallery_genaral_counter_sec_gallery_icon',
            [
                'label'   => esc_html__('Gallery Icon', 'gofly-core'),
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
            'gofly_gallery_genaral_images',
            [
                'label'      => esc_html__('Add Images', 'gofly-core'),
                'type'       => \Elementor\Controls_Manager::GALLERY,
                'show_label' => false,
                'default'    => [],
            ]
        );

        $this->add_control(
            'gofly_gallery_genaral_images_notice',
            [
                'type'        => \Elementor\Controls_Manager::NOTICE,
                'notice_type' => 'warning',
                'dismissible' => true,
                'heading'     => esc_html__('Custom Notice', 'gofly-core'),
                'content'     => esc_html__('The design supports a maximum of 6 photos. If more than 6 photos are uploaded, only the first 6 will be displayed.', 'gofly-core'),
            ]
        );

        $this->add_control(
            'gofly_gallery_genaral_counter_sec_switcher',
            [
                'label'        => esc_html__("Show Counter Section?", 'gofly-core'),
                'type'         => \Elementor\Controls_Manager::SWITCHER,
                'label_on'     => esc_html__('Enable', 'gofly-core'),
                'label_off'    => esc_html__('Disable', 'gofly-core'),
                'return_value' => 'yes',
                'default'      => 'yes',
            ]
        );

        $this->add_control(
            'gofly_gallery_genaral_counter_sec',
            [
                'label'     => esc_html__('Counter Section', 'gofly-core'),
                'type'      => \Elementor\Controls_Manager::HEADING,
                'separator' => 'after',
                'condition' => [
                    'gofly_gallery_genaral_counter_sec_switcher' => 'yes',
                ],
            ]
        );

        $this->add_control(
            'gofly_gallery_genaral_counter_sec_icon',
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
                    'gofly_gallery_genaral_counter_sec_switcher' => 'yes',
                ],
            ]
        );

        $this->add_control(
            'gofly_gallery_genaral_counter_sec_number',
            [
                'label'       => esc_html__('Counter Number', 'gofly-core'),
                'type'        => \Elementor\Controls_Manager::TEXT,
                'default'     => esc_html__('5', 'gofly-core'),
                'placeholder' => esc_html__('write your text here', 'gofly-core'),
                'label_block' => true,
                'condition'   => [
                    'gofly_gallery_genaral_counter_sec_switcher' => 'yes',
                ],
            ]
        );

        $this->add_control(
            'gofly_gallery_genaral_counter_sec_sign',
            [
                'label'       => esc_html__('Counter Sign', 'gofly-core'),
                'type'        => \Elementor\Controls_Manager::TEXT,
                'default'     => esc_html__('K+', 'gofly-core'),
                'placeholder' => esc_html__('write your text here', 'gofly-core'),
                'label_block' => true,
                'condition'   => [
                    'gofly_gallery_genaral_counter_sec_switcher' => 'yes',
                ],
            ]
        );

        $this->add_control(
            'gofly_gallery_genaral_counter_title',
            [
                'label'       => esc_html__('Counter Title', 'gofly-core'),
                'type'        => \Elementor\Controls_Manager::TEXT,
                'default'     => esc_html__('Tour Completed', 'gofly-core'),
                'placeholder' => esc_html__('write your text here', 'gofly-core'),
                'label_block' => true,
                'condition'   => [
                    'gofly_gallery_genaral_counter_sec_switcher' => 'yes',
                ],
            ]
        );

        $this->end_controls_section();

        //============Style One Start=============//

        $this->start_controls_section(
            'gofly_gallery_style_genaral',
            [
                'label' => esc_html__('Styles', 'gofly-core'),
                'tab'   => Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_control(
            'gofly_gallery_style_genaral_title',
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
                'name'     => 'gofly_gallery_style_genaral_title_typ',
                'selector' => '{{WRAPPER}} .section-title h2',

            ]
        );

        $this->add_control(
            'gofly_gallery_style_genaral_title_color',
            [
                'label'     => esc_html__('Color', 'gofly-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .section-title h2' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'gofly_gallery_style_genaral_description',
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
                'name'     => 'gofly_gallery_style_genaral_description_typ',
                'selector' => '{{WRAPPER}} .section-title p',

            ]
        );

        $this->add_control(
            'gofly_gallery_style_genaral_description_color',
            [
                'label'     => esc_html__('Color', 'gofly-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .section-title p' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'gofly_gallery_style_genaral_button',
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
                'name'     => 'gofly_gallery_style_genaral_button_typ',
                'selector' => '{{WRAPPER}} .primary-btn1.black-bg',

            ]
        );

        $this->add_control(
            'gofly_gallery_style_genaral_button_color',
            [
                'label'     => esc_html__('Color', 'gofly-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .primary-btn1.black-bg' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'gofly_gallery_style_genaral_button_hover_color',
            [
                'label'     => esc_html__('Hover Color', 'gofly-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .primary-btn1.black-bg:hover' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'gofly_gallery_style_genaral_button_icon_color',
            [
                'label'     => esc_html__('Icon Color', 'gofly-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .primary-btn1 > span svg' => 'fill: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'gofly_gallery_style_genaral_button_icon_hover_color',
            [
                'label'     => esc_html__('Hover Icon Color', 'gofly-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .primary-btn1:hover > span svg' => 'fill: {{VALUE}};',
                ],
            ]
        );


        $this->add_control(
            'gofly_gallery_style_genaral_button_bg_color',
            [
                'label'     => esc_html__('Background Color', 'gofly-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .primary-btn1.black-bg' => 'background-color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'gofly_gallery_style_genaral_button_bg_hover_color',
            [
                'label'     => esc_html__('Hover Background Color', 'gofly-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .primary-btn1.black-bg::after' => 'background-color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'gofly_gallery_style_genaral_gallery_icon',
            [
                'label'     => esc_html__('Gallery Icon', 'gofly-core'),
                'type'      => \Elementor\Controls_Manager::HEADING,
                'separator' => 'after',
            ]
        );

        $this->add_control(
            'gofly_gallery_style_genaral_gallery_icon_size',
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
                    'size' => 50,
                ],
                'selectors' => [
                    '{{WRAPPER}} .home2-gallery-section .gallery-img-grp > .icon svg' => 'width: {{SIZE}}{{UNIT}};',
                ],
            ]
        );

        $this->add_control(
            'gofly_gallery_style_genaral_gallery_icon_color',
            [
                'label'     => esc_html__('Color', 'gofly-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .home2-gallery-section .gallery-img-grp > .icon svg' => 'fill: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'gofly_gallery_style_genaral_gallery_icon_border_color',
            [
                'label'     => esc_html__('Border Color', 'gofly-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .home2-gallery-section .gallery-img-grp > .icon' => 'background-color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'gofly_gallery_style_genaral_gallery_icon_bg_color',
            [
                'label'     => esc_html__('Background Color', 'gofly-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .home2-gallery-section .gallery-img-grp > .icon::before' => 'background-color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'gofly_gallery_style_genaral_counter_icon',
            [
                'label'     => esc_html__('Counter Icon', 'gofly-core'),
                'type'      => \Elementor\Controls_Manager::HEADING,
                'separator' => 'after',
            ]
        );

        $this->add_control(
            'gofly_gallery_style_genaral_counter_icon_size',
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
                    'size' => 50,
                ],
                'selectors' => [
                    '{{WRAPPER}} .home2-gallery-section .gallery-img-grp .counter-area .icon svg' => 'width: {{SIZE}}{{UNIT}};',
                ],
            ]
        );

        $this->add_control(
            'gofly_gallery_style_genaral_counter_icon_color',
            [
                'label'     => esc_html__('Color', 'gofly-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .home2-gallery-section .gallery-img-grp .counter-area .icon svg' => 'fill: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'gofly_gallery_style_genaral_counter_number',
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
                'name'     => 'gofly_gallery_style_genaral_counter_number_typ',
                'selector' => '{{WRAPPER}} .home2-gallery-section .gallery-img-grp .counter-area .content .number h2',

            ]
        );

        $this->add_control(
            'gofly_gallery_style_genaral_counter_number_color',
            [
                'label'     => esc_html__('Color', 'gofly-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .home2-gallery-section .gallery-img-grp .counter-area .content .number h2' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'gofly_gallery_style_genaral_counter_sign',
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
                'name'     => 'gofly_gallery_style_genaral_counter_sign_typ',
                'selector' => '{{WRAPPER}} .home2-gallery-section .gallery-img-grp .counter-area .content .number span',

            ]
        );

        $this->add_control(
            'gofly_gallery_style_genaral_counter_sign_color',
            [
                'label'     => esc_html__('Color', 'gofly-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .home2-gallery-section .gallery-img-grp .counter-area .content .number span' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'gofly_gallery_style_genaral_counter_title',
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
                'name'     => 'gofly_gallery_style_genaral_counter_title_typ',
                'selector' => '{{WRAPPER}} .home2-gallery-section .gallery-img-grp .counter-area .content span',

            ]
        );

        $this->add_control(
            'gofly_gallery_style_genaral_counter_title_color',
            [
                'label'     => esc_html__('Color', 'gofly-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .home2-gallery-section .gallery-img-grp .counter-area .content span' => 'color: {{VALUE}};',
                ],
            ]
        );


        $this->end_controls_section();

        //============Style Two End=============//

    }

    protected function render()
    {
        $settings = $this->get_settings_for_display();

?>

        <div class="home2-gallery-section">
            <div class="container">
                <div class="row gy-md-4 gy-5">
                    <div class="col-lg-3 wow animate fadeInLeft" data-wow-delay="200ms" data-wow-duration="1500ms">
                        <div class="section-title">
                            <?php if (!empty($settings['gofly_gallery_genaral_title'])): ?>
                                <h2><?php echo esc_html($settings['gofly_gallery_genaral_title']); ?></h2>
                            <?php endif; ?>

                            <?php if (!empty($settings['gofly_gallery_genaral_desc'])): ?>
                                <p><?php echo esc_html($settings['gofly_gallery_genaral_desc']); ?></p>
                            <?php endif; ?>

                            <?php if (!empty($settings['gofly_gallery_genaral_desc_button'])): ?>
                                <a href="<?php echo esc_url($settings['gofly_gallery_genaral_desc_button_link']['url']); ?>" class="primary-btn1 two black-bg">
                                    <span>
                                        <?php echo esc_html($settings['gofly_gallery_genaral_desc_button']); ?>
                                        <svg width="10" height="10" viewBox="0 0 10 10" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M9.73535 1.14746C9.57033 1.97255 9.32924 3.26406 9.24902 4.66797C9.16817 6.08312 9.25559 7.5453 9.70214 8.73633C9.84754 9.12406 9.65129 9.55659 9.26367 9.70215C8.9001 9.83849 8.4969 9.67455 8.32812 9.33398L8.29785 9.26367L8.19921 8.98438C7.73487 7.5758 7.67054 5.98959 7.75097 4.58203C7.77875 4.09598 7.82525 3.62422 7.87988 3.17969L1.53027 9.53027C1.23738 9.82317 0.762615 9.82317 0.469722 9.53027C0.176829 9.23738 0.176829 8.76262 0.469722 8.46973L6.83593 2.10254C6.3319 2.16472 5.79596 2.21841 5.25 2.24902C3.8302 2.32862 2.2474 2.26906 0.958003 1.79102L0.704097 1.68945L0.635738 1.65527C0.303274 1.47099 0.157578 1.06102 0.310542 0.704102C0.463655 0.347333 0.860941 0.170391 1.22363 0.28418L1.29589 0.310547L1.48828 0.387695C2.47399 0.751207 3.79966 0.827571 5.16601 0.750977C6.60111 0.670504 7.97842 0.428235 8.86132 0.262695L9.95312 0.0585938L9.73535 1.14746Z" />
                                        </svg>
                                    </span>
                                    <span>
                                        <?php echo esc_html($settings['gofly_gallery_genaral_desc_button']); ?>
                                        <svg width="10" height="10" viewBox="0 0 10 10" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M9.73535 1.14746C9.57033 1.97255 9.32924 3.26406 9.24902 4.66797C9.16817 6.08312 9.25559 7.5453 9.70214 8.73633C9.84754 9.12406 9.65129 9.55659 9.26367 9.70215C8.9001 9.83849 8.4969 9.67455 8.32812 9.33398L8.29785 9.26367L8.19921 8.98438C7.73487 7.5758 7.67054 5.98959 7.75097 4.58203C7.77875 4.09598 7.82525 3.62422 7.87988 3.17969L1.53027 9.53027C1.23738 9.82317 0.762615 9.82317 0.469722 9.53027C0.176829 9.23738 0.176829 8.76262 0.469722 8.46973L6.83593 2.10254C6.3319 2.16472 5.79596 2.21841 5.25 2.24902C3.8302 2.32862 2.2474 2.26906 0.958003 1.79102L0.704097 1.68945L0.635738 1.65527C0.303274 1.47099 0.157578 1.06102 0.310542 0.704102C0.463655 0.347333 0.860941 0.170391 1.22363 0.28418L1.29589 0.310547L1.48828 0.387695C2.47399 0.751207 3.79966 0.827571 5.16601 0.750977C6.60111 0.670504 7.97842 0.428235 8.86132 0.262695L9.95312 0.0585938L9.73535 1.14746Z" />
                                        </svg>
                                    </span>
                                </a>
                            <?php endif; ?>
                        </div>
                    </div>

                    <div class="col-lg-9 col-md-12">
                        <div class="gallery-img-grp">
                            <div class="row g-2">
                                <?php $gallery_image = $settings['gofly_gallery_genaral_images']; ?>

                                <div class="col-md-7 mt-70">
                                    <?php if (!empty($gallery_image[0])): ?>
                                        <div class="single-img justify-content-md-end">
                                            <a data-fancybox="gallery-01" href="<?php echo esc_url($gallery_image[0]['url']); ?>">
                                                <img src="<?php echo esc_url($gallery_image[0]['url']); ?>" alt="<?php echo esc_attr__('gallery-image', 'gofly-core'); ?>">
                                            </a>
                                        </div>
                                    <?php endif; ?>

                                    <?php if (!empty($gallery_image[1])): ?>
                                        <div class="single-img justify-content-md-end">
                                            <a data-fancybox="gallery-01" href="<?php echo esc_url($gallery_image[1]['url']); ?>">
                                                <img src="<?php echo esc_url($gallery_image[1]['url']); ?>" alt="<?php echo esc_attr__('gallery-image', 'gofly-core'); ?>">
                                            </a>
                                        </div>
                                    <?php endif; ?>

                                    <?php if (!empty($gallery_image[2])): ?>
                                        <div class="single-img justify-content-md-between">
                                            <?php if (!empty($settings['gofly_gallery_genaral_counter_sec_switcher']) && $settings['gofly_gallery_genaral_counter_sec_switcher'] == 'yes'): ?>
                                                <div class="counter-area">
                                                    <?php if (!empty($settings['gofly_gallery_genaral_counter_sec_icon'])): ?>
                                                        <div class="icon">
                                                            <?php \Elementor\Icons_Manager::render_icon($settings['gofly_gallery_genaral_counter_sec_icon'], ['aria-hidden' => 'true']); ?>
                                                        </div>
                                                    <?php endif; ?>
                                                    <div class="content">
                                                        <div class="number">
                                                            <?php if (!empty($settings['gofly_gallery_genaral_counter_sec_number'])): ?>
                                                                <h2 class="counter"><?php echo esc_html($settings['gofly_gallery_genaral_counter_sec_number']); ?></h2>
                                                            <?php endif; ?>
                                                            <?php if (!empty($settings['gofly_gallery_genaral_counter_sec_sign'])): ?>
                                                                <span><?php echo esc_html($settings['gofly_gallery_genaral_counter_sec_sign']); ?></span>
                                                            <?php endif; ?>
                                                        </div>
                                                        <?php if (!empty($settings['gofly_gallery_genaral_counter_title'])): ?>
                                                            <span><?php echo esc_html($settings['gofly_gallery_genaral_counter_title']); ?></span>
                                                        <?php endif; ?>
                                                    </div>
                                                </div>
                                            <?php endif; ?>

                                            <a data-fancybox="gallery-01" href="<?php echo esc_url($gallery_image[2]['url']); ?>">
                                                <img src="<?php echo esc_url($gallery_image[2]['url']); ?>" alt="<?php echo esc_attr__('gallery-image', 'gofly-core'); ?>">
                                            </a>
                                        </div>
                                    <?php endif; ?>
                                </div>

                                <div class="col-md-5">
                                    <div class="single-img grp-img">
                                        <?php if (!empty($gallery_image[3])): ?>
                                            <a data-fancybox="gallery-01" href="<?php echo esc_url($gallery_image[3]['url']); ?>">
                                                <img src="<?php echo esc_url($gallery_image[3]['url']); ?>" alt="<?php echo esc_attr__('gallery-image', 'gofly-core'); ?>">
                                            </a>
                                        <?php endif; ?>

                                        <?php if (!empty($gallery_image[4])): ?>
                                            <a data-fancybox="gallery-01" href="<?php echo esc_url($gallery_image[4]['url']); ?>">
                                                <img src="<?php echo esc_url($gallery_image[4]['url']); ?>" alt="<?php echo esc_attr__('gallery-image', 'gofly-core'); ?>">
                                            </a>
                                        <?php endif; ?>
                                    </div>

                                    <?php if (!empty($gallery_image[5])): ?>
                                        <div class="single-img">
                                            <a data-fancybox="gallery-01" href="<?php echo esc_url($gallery_image[5]['url']); ?>">
                                                <img src="<?php echo esc_url($gallery_image[5]['url']); ?>" alt="<?php echo esc_attr__('gallery-image', 'gofly-core'); ?>">
                                            </a>
                                        </div>
                                    <?php endif; ?>
                                </div>
                            </div>

                            <?php if (!empty($settings['gofly_gallery_genaral_counter_sec_gallery_icon'])): ?>
                                <div class="icon">
                                    <?php \Elementor\Icons_Manager::render_icon($settings['gofly_gallery_genaral_counter_sec_gallery_icon'], ['aria-hidden' => 'true']); ?>
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

Plugin::instance()->widgets_manager->register(new Gofly_Gallery_Widget());
