<?php

namespace Elementor;

if (!defined('ABSPATH')) exit;  // Exit if accessed directly

use Elementor\core\Schemes;
use Egns_Core\Egns_Helper;

class Gofly_Activity_Tab_Widget extends Widget_Base
{

    public function get_name()
    {
        return 'gofly_activity_tab';
    }

    public function get_title()
    {
        return esc_html__('EG Activity Tab', 'gofly-core');
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
            'gofly_activity_tab_genaral',
            [
                'label' => esc_html__('General', 'gofly-core')
            ]
        );

        $this->add_control(
            'gofly_activity_tab_genaral_background_image',
            [
                'label'   => esc_html__('Background Image', 'gofly-core'),
                'type'    => \Elementor\Controls_Manager::MEDIA,
                'default' => [
                    'url' => \Elementor\Utils::get_placeholder_image_src(),
                ],
                'media_types' => ['image'],
            ]
        );

        $this->add_control(
            'gofly_activity_tab_genaral_header_title',
            [
                'label'       => esc_html__('Title', 'gofly-core'),
                'type'        => \Elementor\Controls_Manager::TEXT,
                'default'     => esc_html__('All Tour Activities', 'gofly-core'),
                'placeholder' => esc_html__('Type your title here', 'gofly-core'),
            ]
        );


        $this->add_control(
            'gofly_activity_tab_genaral_header_description',
            [
                'label'       => esc_html__('Description', 'gofly-core'),
                'type'        => \Elementor\Controls_Manager::TEXTAREA,
                'default'     => esc_html__('A curated list of the most popular travel packages based on different destinations.', 'gofly-core'),
                'placeholder' => esc_html__('Type your description here', 'gofly-core'),
            ]
        );

        $repeater = new \Elementor\Repeater();

        $repeater->add_control(
            'gofly_activity_tab_genaral_tab_icon',
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

        $repeater->add_control(
            'gofly_activity_tab_genaral_tab_title',
            [
                'label'       => esc_html__('Tab Title', 'gofly-core'),
                'type'        => \Elementor\Controls_Manager::TEXT,
                'default'     => esc_html__('Scuba diving', 'gofly-core'),
                'placeholder' => esc_html__('write your text here', 'gofly-core'),
                'label_block' => true,
            ]
        );

        $repeater->add_control(
            'gofly_activity_tab_genaral_content_activity_image',
            [
                'label'   => esc_html__('Activity Image', 'gofly-core'),
                'type'    => \Elementor\Controls_Manager::MEDIA,
                'default' => [
                    'url' => \Elementor\Utils::get_placeholder_image_src(),
                ],
                'media_types' => ['image'],
            ]
        );

        $repeater->add_control(
            'gofly_activity_tab_genaral_tab_activity_title',
            [
                'label'       => esc_html__('Activity Title', 'gofly-core'),
                'type'        => \Elementor\Controls_Manager::TEXT,
                'default'     => esc_html__('Adventure Scuba diving', 'gofly-core'),
                'placeholder' => esc_html__('write your text here', 'gofly-core'),
                'label_block' => true,
            ]
        );

        $repeater->add_control(
            'gofly_activity_tab_genaral_tab_activity_description',
            [
                'label'       => esc_html__('Activity Description', 'gofly-core'),
                'type'        => \Elementor\Controls_Manager::TEXTAREA,
                'default'     => wp_kses('Experience the breathtaking beauty of the ocean like never before! With <span>35% OFF</span> on scuba diving experiences across all destinations', wp_kses_allowed_html('post')),
                'placeholder' => esc_html__('write your text here', 'gofly-core'),
                'label_block' => true,
            ]
        );

        $repeater->add_control(
            'gofly_activity_tab_genaral_tab_activity_button_label',
            [
                'label'       => esc_html__('Button Label', 'gofly-core'),
                'type'        => \Elementor\Controls_Manager::TEXT,
                'default'     => esc_html__('Book Now', 'gofly-core'),
                'placeholder' => esc_html__('write your label here', 'gofly-core'),
                'label_block' => true,
            ]
        );

        $repeater->add_control(
            'gofly_activity_tab_genaral_tab_activity_button_label_url',
            [
                'label'       => esc_html__('Button Link/URL', 'gofly-core'),
                'type'        => \Elementor\Controls_Manager::URL,
                'default'     => ['url' => '#'],
                'placeholder' => esc_html__('write your url here', 'gofly-core'),
                'label_block' => true,

            ]
        );

        $this->add_control(
            'gofly_activity_tab_genaral_tab_content_list',
            [
                'label'   => esc_html__('Content List', 'gofly-core'),
                'type'    => \Elementor\Controls_Manager::REPEATER,
                'fields'  => $repeater->get_controls(),
                'default' => [
                    [
                        'gofly_activity_tab_genaral_tab_title' => esc_html('Scuba diving'),

                    ],
                    [
                        'gofly_activity_tab_genaral_tab_title' => esc_html('Paragliding'),
                    ],
                    [
                        'gofly_activity_tab_genaral_tab_title' => esc_html('Rafting'),
                    ],
                    [
                        'gofly_activity_tab_genaral_tab_title' => esc_html('Bungee Jump'),
                    ],
                ],
                'title_field' => '{{{ gofly_activity_tab_genaral_tab_title }}}',
            ]
        );

        $this->add_control(
            'gofly_activity_tab_genaral_vector_image_one',
            [
                'label'   => esc_html__('Vector Image One', 'gofly-core'),
                'type'    => \Elementor\Controls_Manager::MEDIA,
                'default' => [
                    'url' => \Elementor\Utils::get_placeholder_image_src(),
                ],
                'media_types' => ['image', 'svg'],
            ]
        );

        $this->add_control(
            'gofly_activity_tab_genaral_vector_image_two',
            [
                'label'   => esc_html__('Vector Image Two', 'gofly-core'),
                'type'    => \Elementor\Controls_Manager::MEDIA,
                'default' => [
                    'url' => \Elementor\Utils::get_placeholder_image_src(),
                ],
                'media_types' => ['image', 'svg'],
            ]
        );

        $this->end_controls_section();

        //style start

        $this->start_controls_section(
            'gofly_activity_tab_style_genaral',
            [
                'label' => esc_html__('Styles', 'gofly-core'),
                'tab'   => Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_control(
            'gofly_activity_tab_style_genaral_header_title',
            [
                'label'     => esc_html__('Header Title', 'gofly-core'),
                'type'      => \Elementor\Controls_Manager::HEADING,
                'separator' => 'after',
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'label'    => esc_html__('Typography', 'gofly-core'),
                'name'     => 'gofly_activity_tab_style_genaral_header_title_typ',
                'selector' => '{{WRAPPER}} .section-title h2',

            ]
        );

        $this->add_control(
            'gofly_activity_tab_style_genaral_header_title_color',
            [
                'label'     => esc_html__('Color', 'gofly-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .section-title h2' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'gofly_activity_tab_style_genaral_header_description',
            [
                'label'     => esc_html__('Header Description', 'gofly-core'),
                'type'      => \Elementor\Controls_Manager::HEADING,
                'separator' => 'after',
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'label'    => esc_html__('Typography', 'gofly-core'),
                'name'     => 'gofly_activity_tab_style_genaral_header_description_typ',
                'selector' => '{{WRAPPER}} .section-title p',

            ]
        );

        $this->add_control(
            'gofly_activity_tab_style_genaral_header_description_color',
            [
                'label'     => esc_html__('Color', 'gofly-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .section-title p' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'gofly_activity_tab_style_genaral_tab_area',
            [
                'label'     => esc_html__('Tab Area', 'gofly-core'),
                'type'      => \Elementor\Controls_Manager::HEADING,
                'separator' => 'before',
            ]
        );

        $this->add_control(
            'gofly_activity_tab_style_genaral_tab_area_border_color',
            [
                'label'     => esc_html__('Border Color (Active)', 'gofly-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .home7-activity-tab-section .nav-pills .nav-item .nav-link.active' => 'border-color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'gofly_activity_tab_style_genaral_tab_area_bg_color',
            [
                'label'     => esc_html__('Background Color', 'gofly-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .home7-activity-tab-section .nav-pills .nav-item .nav-link' => 'background-color: {{VALUE}};',
                ],
            ]
        );


        $this->add_control(
            'gofly_activity_tab_style_genaral_tab_icon',
            [
                'label'     => esc_html__('Tab Icon', 'gofly-core'),
                'type'      => \Elementor\Controls_Manager::HEADING,
                'separator' => 'after',
            ]
        );

        $this->add_control(
            'gofly_activity_tab_style_genaral_tab_icon_size',
            [
                'label'      => esc_html__('Width', 'gofly-core'),
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
                    'size' => 55,
                ],
                'selectors' => [
                    '{{WRAPPER}} .home7-activity-tab-section .nav-pills .nav-item .nav-link svg' => 'width: {{SIZE}}{{UNIT}};',
                ],
            ]
        );

        $this->add_control(
            'gofly_activity_tab_style_genaral_tab_icon_color',
            [
                'label'     => esc_html__('Color', 'gofly-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .home7-activity-tab-section .nav-pills .nav-item .nav-link svg' => 'fill: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'gofly_activity_tab_style_genaral_tab_title',
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
                'name'     => 'gofly_activity_tab_style_genaral_tab_title_typ',
                'selector' => '{{WRAPPER}} .home7-activity-tab-section .nav-pills .nav-item .nav-link h6',

            ]
        );

        $this->add_control(
            'gofly_activity_tab_style_genaral_tab_title_color',
            [
                'label'     => esc_html__('Color', 'gofly-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .home7-activity-tab-section .nav-pills .nav-item .nav-link h6' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'gofly_activity_tab_style_genaral_tab_content_area',
            [
                'label'     => esc_html__('Tab Content Area', 'gofly-core'),
                'type'      => \Elementor\Controls_Manager::HEADING,
                'separator' => 'before',
            ]
        );

        $this->add_control(
            'gofly_activity_tab_style_genaral_tab_content_area_bg_color',
            [
                'label'     => esc_html__('Background Color', 'gofly-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .home7-activity-tab-section .activity-tab-wrapper .single-activity .activity-content' => 'background-color: {{VALUE}};',
                ],
            ]
        );


        $this->add_control(
            'gofly_activity_tab_style_genaral_tab_content_area_title',
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
                'name'     => 'gofly_activity_tab_style_genaral_tab_content_area_title_typ',
                'selector' => '{{WRAPPER}} .home7-activity-tab-section .activity-tab-wrapper .single-activity .activity-content h4',

            ]
        );

        $this->add_control(
            'gofly_activity_tab_style_genaral_tab_content_area_title_color',
            [
                'label'     => esc_html__('Color', 'gofly-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .home7-activity-tab-section .activity-tab-wrapper .single-activity .activity-content h4' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'gofly_activity_tab_style_genaral_tab_content_area_description',
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
                'name'     => 'gofly_activity_tab_style_genaral_tab_content_area_description_typ',
                'selector' => '{{WRAPPER}} .home7-activity-tab-section .activity-tab-wrapper .single-activity .activity-content p',

            ]
        );

        $this->add_control(
            'gofly_activity_tab_style_genaral_tab_content_area_description_color',
            [
                'label'     => esc_html__('Color', 'gofly-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .home7-activity-tab-section .activity-tab-wrapper .single-activity .activity-content p' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'gofly_activity_tab_style_genaral_tab_content_area_button',
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
                'name'     => 'gofly_activity_tab_style_genaral_tab_content_area_button_typ',
                'selector' => '{{WRAPPER}} .primary-btn1.four',

            ]
        );

        $this->add_control(
            'gofly_activity_tab_style_genaral_tab_content_area_button_color',
            [
                'label'     => esc_html__('Color', 'gofly-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .primary-btn1.four' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'gofly_activity_tab_style_genaral_tab_content_area_button_hover_color',
            [
                'label'     => esc_html__('Hover Color', 'gofly-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .primary-btn1.four:hover' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'gofly_activity_tab_style_genaral_tab_content_area_button_icon_color',
            [
                'label'     => esc_html__('Icon Color', 'gofly-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .primary-btn1.four svg' => 'fill: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'gofly_activity_tab_style_genaral_tab_content_area_button_icon_hover_color',
            [
                'label'     => esc_html__('Hover Icon Color', 'gofly-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .primary-btn1.four:hover svg' => 'fill: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'gofly_activity_tab_style_genaral_tab_content_area_button_bg_color',
            [
                'label'     => esc_html__('Background Color', 'gofly-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .primary-btn1.four' => 'background-color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'gofly_activity_tab_style_genaral_tab_content_area_button_bg_hover_color',
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

        $settings   = $this->get_settings_for_display();
        $activities = $settings['gofly_activity_tab_genaral_tab_content_list'];
?>


        <?php if (is_admin()): ?>
            <script>
                var swiper = new Swiper(".home7-activity-tab-slider", {
                    slidesPerView: 1,
                    speed: 1500,
                    spaceBetween: 20,
                    autoplay: {
                        delay: 2500, // Autoplay duration in milliseconds
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
                        350: {
                            slidesPerView: 2,
                            spaceBetween: 15,
                        },
                        576: {
                            slidesPerView: 3,
                        },
                        768: {
                            slidesPerView: 4,
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
            </script>
        <?php endif; ?>

        <div class="home7-activity-tab-section" <?php if (!empty($settings['gofly_activity_tab_genaral_background_image']['url'])) : ?> style="background-image: url(<?php echo esc_url($settings['gofly_activity_tab_genaral_background_image']['url']); ?>)" <?php endif; ?>>
            <div class="container">
                <div class="row justify-content-center mb-60 wow animate fadeInDown" data-wow-delay="200ms" data-wow-duration="1500ms">
                    <div class="col-xl-6 col-lg-8">
                        <div class="section-title text-center">
                            <?php if (!empty($settings['gofly_activity_tab_genaral_header_title'])): ?>
                                <h2><?php echo esc_html($settings['gofly_activity_tab_genaral_header_title']); ?></h2>
                            <?php endif; ?>
                            <?php if (!empty($settings['gofly_activity_tab_genaral_header_description'])): ?>
                                <p><?php echo esc_html($settings['gofly_activity_tab_genaral_header_description']); ?></p>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
                <div class="row justify-content-center mb-60">
                    <div class="col-xl-8 col-lg-10">
                        <div class="nav nav-pills wow animate fadeInDown" data-wow-delay="200ms" data-wow-duration="1500ms" id="pills-tab" role="tablist">
                            <div class="swiper home7-activity-tab-slider">
                                <div class="swiper-wrapper">
                                    <?php foreach ($activities as $index => $activity): ?>
                                        <div class="swiper-slide">
                                            <?php
                                            $extra_classes = ['', 'two', 'three', 'four'];
                                            $class_suffix  = $extra_classes[$index % 4];
                                            ?>
                                            <div class="nav-item <?php echo esc_attr($class_suffix); ?>" role="presentation">
                                                <div class="nav-link <?php echo $index === 0 ? 'active' : ''; ?>"
                                                    id="pills-<?php echo esc_attr($index); ?>-tab"
                                                    data-bs-toggle="pill"
                                                    data-bs-target="#pills-<?php echo esc_attr($index); ?>"
                                                    role="tab"
                                                    aria-controls="pills-<?php echo esc_attr($index); ?>"
                                                    aria-selected="<?php echo $index === 0 ? 'true' : 'false'; ?>">
                                                    <?php \Elementor\Icons_Manager::render_icon($activity['gofly_activity_tab_genaral_tab_icon'], ['aria-hidden' => 'true']); ?>
                                                    <?php if (!empty($activity['gofly_activity_tab_genaral_tab_title'])): ?>
                                                        <h6><?php echo esc_html($activity['gofly_activity_tab_genaral_tab_title']); ?></h6>
                                                    <?php endif; ?>
                                                </div>
                                            </div>
                                        </div>
                                    <?php endforeach; ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row justify-content-center">
                    <div class="col-xl-10">
                        <div class="activity-tab-wrapper">
                            <div class="tab-content" id="pills-tabContent">
                                <?php foreach ($activities as $index => $activity): ?>
                                    <div class="tab-pane fade <?php echo $index === 0 ? 'show active' : ''; ?>"
                                        id="pills-<?php echo esc_attr($index); ?>"
                                        role="tabpanel"
                                        aria-labelledby="pills-<?php echo esc_attr($index); ?>-tab">
                                        <div class="single-activity">
                                            <?php if (!empty($activity['gofly_activity_tab_genaral_content_activity_image']['url'])): ?>
                                                <div class="activity-img">
                                                    <img src="<?php echo esc_url($activity['gofly_activity_tab_genaral_content_activity_image']['url']); ?>" alt="<?php echo esc_attr__('activity-image', 'gofly-core'); ?>">
                                                </div>
                                            <?php endif; ?>
                                            <div class="activity-content">
                                                <?php if (!empty($activity['gofly_activity_tab_genaral_tab_activity_title'])): ?>
                                                    <h4><?php echo esc_html($activity['gofly_activity_tab_genaral_tab_activity_title']); ?></h4>
                                                <?php endif; ?>
                                                <?php if (!empty($activity['gofly_activity_tab_genaral_tab_activity_description'])): ?>
                                                    <p><?php echo wp_kses($activity['gofly_activity_tab_genaral_tab_activity_description'], wp_kses_allowed_html('post')); ?></p>
                                                <?php endif; ?>
                                                <?php if (!empty($activity['gofly_activity_tab_genaral_tab_activity_button_label'])): ?>
                                                    <a href="<?php echo esc_url($activity['gofly_activity_tab_genaral_tab_activity_button_label_url']['url']); ?>" class="primary-btn1 two four">
                                                        <span>
                                                            <?php echo esc_html($activity['gofly_activity_tab_genaral_tab_activity_button_label']); ?>
                                                            <svg width="10" height="10" viewBox="0 0 10 10" xmlns="http://www.w3.org/2000/svg">
                                                                <path d="M9.73535 1.14746C9.57033 1.97255 9.32924 3.26406 9.24902 4.66797C9.16817 6.08312 9.25559 7.5453 9.70214 8.73633C9.84754 9.12406 9.65129 9.55659 9.26367 9.70215C8.9001 9.83849 8.4969 9.67455 8.32812 9.33398L8.29785 9.26367L8.19921 8.98438C7.73487 7.5758 7.67054 5.98959 7.75097 4.58203C7.77875 4.09598 7.82525 3.62422 7.87988 3.17969L1.53027 9.53027C1.23738 9.82317 0.762615 9.82317 0.469722 9.53027C0.176829 9.23738 0.176829 8.76262 0.469722 8.46973L6.83593 2.10254C6.3319 2.16472 5.79596 2.21841 5.25 2.24902C3.8302 2.32862 2.2474 2.26906 0.958003 1.79102L0.704097 1.68945L0.635738 1.65527C0.303274 1.47099 0.157578 1.06102 0.310542 0.704102C0.463655 0.347333 0.860941 0.170391 1.22363 0.28418L1.29589 0.310547L1.48828 0.387695C2.47399 0.751207 3.79966 0.827571 5.16601 0.750977C6.60111 0.670504 7.97842 0.428235 8.86132 0.262695L9.95312 0.0585938L9.73535 1.14746Z"></path>
                                                            </svg>
                                                        </span>
                                                        <span>
                                                            <?php echo esc_html($activity['gofly_activity_tab_genaral_tab_activity_button_label']); ?>
                                                            <svg width="10" height="10" viewBox="0 0 10 10" xmlns="http://www.w3.org/2000/svg">
                                                                <path d="M9.73535 1.14746C9.57033 1.97255 9.32924 3.26406 9.24902 4.66797C9.16817 6.08312 9.25559 7.5453 9.70214 8.73633C9.84754 9.12406 9.65129 9.55659 9.26367 9.70215C8.9001 9.83849 8.4969 9.67455 8.32812 9.33398L8.29785 9.26367L8.19921 8.98438C7.73487 7.5758 7.67054 5.98959 7.75097 4.58203C7.77875 4.09598 7.82525 3.62422 7.87988 3.17969L1.53027 9.53027C1.23738 9.82317 0.762615 9.82317 0.469722 9.53027C0.176829 9.23738 0.176829 8.76262 0.469722 8.46973L6.83593 2.10254C6.3319 2.16472 5.79596 2.21841 5.25 2.24902C3.8302 2.32862 2.2474 2.26906 0.958003 1.79102L0.704097 1.68945L0.635738 1.65527C0.303274 1.47099 0.157578 1.06102 0.310542 0.704102C0.463655 0.347333 0.860941 0.170391 1.22363 0.28418L1.29589 0.310547L1.48828 0.387695C2.47399 0.751207 3.79966 0.827571 5.16601 0.750977C6.60111 0.670504 7.97842 0.428235 8.86132 0.262695L9.95312 0.0585938L9.73535 1.14746Z"></path>
                                                            </svg>
                                                        </span>
                                                    </a>
                                                <?php endif; ?>
                                            </div>
                                        </div>
                                    </div>
                                <?php endforeach; ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <?php if (!empty($settings['gofly_activity_tab_genaral_vector_image_one']['url'])): ?>
                <img src="<?php echo esc_url($settings['gofly_activity_tab_genaral_vector_image_one']['url']); ?>" alt="<?php echo esc_attr__('vector-image-one', 'gofly-core'); ?>" class="vector1">
            <?php endif; ?>
            <?php if (!empty($settings['gofly_activity_tab_genaral_vector_image_two']['url'])): ?>
                <img src="<?php echo esc_url($settings['gofly_activity_tab_genaral_vector_image_two']['url']); ?>" alt="<?php echo esc_attr__('vector-image-two', 'gofly-core'); ?>" class="vector2">
            <?php endif; ?>
        </div>


<?php

    }
}

Plugin::instance()->widgets_manager->register(new Gofly_Activity_Tab_Widget());
