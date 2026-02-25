<?php

namespace Elementor;

if (!defined('ABSPATH')) exit;  // Exit if accessed directly

use Elementor\core\Schemes;
use Elementor\Group_Control_Typography;
use Egns_Core\Egns_Helper;

class Gofly_About_Journey_Widget extends Widget_Base
{

    public function get_name()
    {
        return 'gofly_about_journy';
    }

    public function get_title()
    {
        return esc_html__('EG About Company', 'gofly-core');
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
            'gofly_about_journey_genaral',
            [
                'label' => esc_html__('General', 'gofly-core')
            ]
        );

        $this->add_control(
            'gofly_about_journey_select_style',
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
            'gofly_about_journey_general_title',
            [
                'label'       => __('Title', 'gofly-core'),
                'type'        => \Elementor\Controls_Manager::TEXT,
                'default'     => __('Behind The Journey', 'gofly-core'),
                'label_block' => true,
            ]
        );

        $this->add_control(
            'gofly_about_journey_general_desc',
            [
                'label'       => __('Description', 'gofly-core'),
                'type'        => \Elementor\Controls_Manager::TEXTAREA,
                'default'     => __('With years of experience in the travel industry, we specialize in crafting personalized journeys.', 'gofly-core'),
                'label_block' => true,
            ]
        );

        $repeater = new \Elementor\Repeater();

        $repeater->add_control(
            'gofly_about_journey_tab_image',
            [
                'label'   => __('Image', 'gofly-core'),
                'type'    => \Elementor\Controls_Manager::MEDIA,
                'default' => [
                    'url' => \Elementor\Utils::get_placeholder_image_src(),
                ],
            ]
        );
        $repeater->add_control(
            'gofly_about_journey_tab_year',
            [
                'label'   => __('Year', 'gofly-core'),
                'type'    => \Elementor\Controls_Manager::TEXT,
                'default' => __('1996', 'gofly-core'),
            ]
        );
        $repeater->add_control(
            'gofly_about_journey_tab_title',
            [
                'label'   => __('Title', 'gofly-core'),
                'type'    => \Elementor\Controls_Manager::TEXT,
                'default' => __('2023 - Expanding Our Global Footprint', 'gofly-core'),
            ]
        );
        $repeater->add_control(
            'gofly_about_journey_tab_desc',
            [
                'label'   => __('Description', 'gofly-core'),
                'type'    => \Elementor\Controls_Manager::WYSIWYG,
                'default' => wp_kses('The first-ever travel agency was founded by <span>Thomas Cook</span> in England. He organized group trips, starting with a railway excursion for <span>500 people </span>. Thomas Cook expanded his services internationally, arranging trips to Paris and beyond. He introduced the <span>first-ever travel brochure, guiding travelers on destinations &amp; routes.</span> Luxury cruises and organized tours gained popularity, especially among the elite.', wp_kses_allowed_html('post')),
            ]
        );

        $this->add_control(
            'gofly_about_journey_tab_items',
            [
                'label'       => __('Tab Items', 'gofly-core'),
                'type'        => \Elementor\Controls_Manager::REPEATER,
                'fields'      => $repeater->get_controls(),
                'title_field' => '{{{ gofly_about_journey_tab_title }}}',
                'condition'   => [
                    'gofly_about_journey_select_style' => 'one',
                ],
            ]
        );

        $this->add_control(
            'gofly_about_journey_background_image',
            [
                'label'   => esc_html__('Background Image', 'gofly-core'),
                'type'    => \Elementor\Controls_Manager::MEDIA,
                'default' => [
                    'url' => \Elementor\Utils::get_placeholder_image_src(),
                ],
                'media_types' => ['image'],
                'condition'   => [
                    'gofly_about_journey_select_style' => 'one',
                ],
            ]
        );

        // two content
        $this->add_control(
            'gofly_about_journey_btn_lbl',
            [
                'label'       => esc_html__('Button label', 'gofly-core'),
                'type'        => \Elementor\Controls_Manager::TEXT,
                'default'     => esc_html__('Explore Gofly', 'gofly-core'),
                'placeholder' => esc_html__('Type your label here', 'gofly-core'),
                'condition'   => [
                    'gofly_about_journey_select_style' => 'two',
                ],
            ]
        );
        $this->add_control(
            'gofly_about_journey_btn_link',
            [
                'label'     => esc_html__('Button link', 'gofly-core'),
                'type'      => \Elementor\Controls_Manager::TEXT,
                'default'   => '#',
                'condition' => [
                    'gofly_about_journey_select_style' => 'two',
                ],
            ]
        );
        $this->add_control(
            'gofly_about_journey_rating_point',
            [
                'label'     => esc_html__('Rating Point', 'gofly-core'),
                'type'      => \Elementor\Controls_Manager::TEXT,
                'default'   => '4.5',
                'condition' => [
                    'gofly_about_journey_select_style' => 'two',
                ],
            ]
        );
        $this->add_control(
            'gofly_about_journey_review_platform',
            [
                'label'       => esc_html__('Platform Icon', 'gofly-core'),
                'type'        => \Elementor\Controls_Manager::MEDIA,
                'media_types' => ['image', 'svg'],
                'default'     => [
                    'url' => \Elementor\Utils::get_placeholder_image_src(),
                ],
                'condition' => [
                    'gofly_about_journey_select_style' => 'two',
                ],
            ]
        );
        $this->add_control(
            'gofly_about_journey_review_star',
            [
                'label'       => esc_html__('Star Icon', 'gofly-core'),
                'type'        => \Elementor\Controls_Manager::MEDIA,
                'media_types' => ['image', 'svg'],
                'default'     => [
                    'url' => \Elementor\Utils::get_placeholder_image_src(),
                ],
                'condition' => [
                    'gofly_about_journey_select_style' => 'two',
                ],
            ]
        );
        $this->add_control(
            'gofly_about_journey_rating_lbl',
            [
                'label'     => esc_html__('Rating label', 'gofly-core'),
                'type'      => \Elementor\Controls_Manager::TEXT,
                'default'   => '(2K reviews)',
                'condition' => [
                    'gofly_about_journey_select_style' => 'two',
                ],
            ]
        );
        $this->add_control(
            'gofly_about_journey_rightside_cnt',
            [
                'label'     => esc_html__('Right Side Options', 'gofly-core'),
                'type'      => \Elementor\Controls_Manager::HEADING,
                'separator' => 'before',
                'condition' => [
                    'gofly_about_journey_select_style' => 'two',
                ],
            ]
        );
        $this->add_control(
            'gofly_about_journey_rightside_icon',
            [
                'label'   => esc_html__('Icon', 'gofly-core'),
                'type'    => \Elementor\Controls_Manager::ICONS,
                'default' => [
                    'value'   => 'fas fa-circle',
                    'library' => 'fa-solid',
                ],
                'condition' => [
                    'gofly_about_journey_select_style' => 'two',
                ],
            ]
        );
        $this->add_control(
            'gofly_about_journey_img1',
            [
                'label'   => esc_html__('Image 1', 'gofly-core'),
                'type'    => \Elementor\Controls_Manager::MEDIA,
                'default' => [
                    'url' => \Elementor\Utils::get_placeholder_image_src(),
                ],
                'condition' => [
                    'gofly_about_journey_select_style' => 'two',
                ],
            ]
        );
        $this->add_control(
            'gofly_about_journey_img2',
            [
                'label'   => esc_html__('Image 2', 'gofly-core'),
                'type'    => \Elementor\Controls_Manager::MEDIA,
                'default' => [
                    'url' => \Elementor\Utils::get_placeholder_image_src(),
                ],
                'condition' => [
                    'gofly_about_journey_select_style' => 'two',
                ],
            ]
        );
        $this->add_control(
            'gofly_about_journey_img3',
            [
                'label'   => esc_html__('Image 3', 'gofly-core'),
                'type'    => \Elementor\Controls_Manager::MEDIA,
                'default' => [
                    'url' => \Elementor\Utils::get_placeholder_image_src(),
                ],
                'condition' => [
                    'gofly_about_journey_select_style' => 'two',
                ],
            ]
        );





        $this->end_controls_section();

        //============Style One Start=============//
        $this->start_controls_section(
            'gofly_about_journey_styles',
            [
                'label' => esc_html__('Styles', 'gofly-core'),
                'tab'   => Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_control(
            'gofly_about_journey_area_style_global_section',
            [
                'label'     => esc_html__('General Section', 'gofly-core'),
                'type'      => \Elementor\Controls_Manager::HEADING,
                'separator' => 'after',
            ]
        );

        $this->add_control(
            'gofly_about_journey_area_style_global_section_color',
            [
                'label' => esc_html__('Background Color', 'gofly-core'),
                'type'  => Controls_Manager::COLOR,
            ]
        );

        $this->add_control(
            'gofly_about_journey_area_style',
            [
                'label'     => esc_html__('General', 'gofly-core'),
                'type'      => \Elementor\Controls_Manager::HEADING,
                'separator' => 'after',
            ]
        );

        $this->add_control(
            'gofly_about_journey_general_title_style',
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
                'name'     => 'gofly_about_journey_general_title_typ',
                'selector' => '{{WRAPPER}} .section-title h2',

            ]
        );

        $this->add_control(
            'gofly_about_journey_title_color',
            [
                'label'     => esc_html__('Color', 'gofly-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .section-title h2' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'gofly_about_journey_general_desc_style',
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
                'name'     => 'gofly_about_journey_general_desc_typ',
                'selector' => '{{WRAPPER}} .section-title p',

            ]
        );

        $this->add_control(
            'gofly_about_journey_desc_color',
            [
                'label'     => esc_html__('Color', 'gofly-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .section-title p' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'gofly_about_journey_slider',
            [
                'label'     => esc_html__('Slider', 'gofly-core'),
                'type'      => \Elementor\Controls_Manager::HEADING,
                'separator' => 'after',
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'label'    => esc_html__('Year Typography', 'gofly-core'),
                'name'     => 'gofly_about_journey_year_typ',
                'selector' => '{{WRAPPER}} .about-page-journey-section .jouney-content-wrapper .nav-area .nav-pills .nav-item .nav-link h4',

            ]
        );

        $this->add_control(
            'gofly_about_journey_year_color',
            [
                'label'     => esc_html__('Year Color', 'gofly-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .about-page-journey-section .jouney-content-wrapper .nav-area .nav-pills .nav-item .nav-link h4' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'gofly_about_journey_year_hover_color',
            [
                'label'     => esc_html__('Year Active Color', 'gofly-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .about-page-journey-section .jouney-content-wrapper .nav-area .nav-pills .nav-item .nav-link.active h4' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'gofly_about_journey_image_radius',
            [
                'label'      => esc_html__('Image Border Radius', 'gofly-core'),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%'],
                'selectors'  => [
                    '{{WRAPPER}} .about-page-journey-section .jouney-content-wrapper .nav-area .nav-pills .nav-item .nav-link img' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'
                ]
            ]
        );

        $this->add_control(
            'gofly_about_journey_tab_body',
            [
                'label'     => esc_html__('Tab Body', 'gofly-core'),
                'type'      => \Elementor\Controls_Manager::HEADING,
                'separator' => 'after',
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'label'    => esc_html__('Title Typography', 'gofly-core'),
                'name'     => 'gofly_about_journey_tab_body_title_typ',
                'selector' => '{{WRAPPER}} .about-page-journey-section .jouney-content-wrapper .tab-content .tab-pane h4',

            ]
        );

        $this->add_control(
            'gofly_about_journey_tab_body_title_color',
            [
                'label'     => esc_html__('Title Color', 'gofly-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .about-page-journey-section .jouney-content-wrapper .tab-content .tab-pane h4' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'label'    => esc_html__('Description Typography', 'gofly-core'),
                'name'     => 'gofly_about_journey_tab_body_desc_typ',
                'selector' => '{{WRAPPER}} .about-page-journey-section .jouney-content-wrapper .tab-content .tab-pane',

            ]
        );

        $this->add_control(
            'gofly_about_journey_tab_body_desc_color',
            [
                'label'     => esc_html__('Description Color', 'gofly-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .about-page-journey-section .jouney-content-wrapper .tab-content .tab-pane' => 'color: {{VALUE}};',
                ],
            ]
        );

        //============Style End=============//

    }

    protected function render()
    {
        $settings = $this->get_settings_for_display();

        $journey_list = $settings['gofly_about_journey_tab_items'];
?>

        <?php if (is_admin()): ?>
            <script>
                var swiper = new Swiper(".about-page-journey-slider", {
                    slidesPerView: 1,
                    speed: 1500,
                    spaceBetween: 24,
                    autoplay: {
                        delay: 2500, // Autoplay duration in milliseconds
                        pauseOnMouseEnter: true,
                        disableOnInteraction: false,
                    },
                    breakpoints: {
                        280: {
                            slidesPerView: 1,
                        },
                        350: {
                            slidesPerView: 2,
                            spaceBetween: 10,
                        },
                        576: {
                            slidesPerView: 3,
                        },
                        768: {
                            slidesPerView: 4,
                            spaceBetween: 10,
                        },
                        992: {
                            slidesPerView: 5,
                            spaceBetween: 15,
                        },
                        1200: {
                            slidesPerView: 6,
                            spaceBetween: 10,
                        },
                        1400: {
                            slidesPerView: 6,
                        },
                    },
                });
            </script>
        <?php endif; ?>

        <?php if ('one' == $settings['gofly_about_journey_select_style']): ?>
            <div class="about-page-journey-section" style="background-image: url(<?php echo esc_url($settings['gofly_about_journey_background_image']['url']); ?>), linear-gradient(180deg, <?php echo esc_attr($settings['gofly_about_journey_area_style_global_section_color']); ?> 0%, <?php echo esc_attr($settings['gofly_about_journey_area_style_global_section_color']); ?> 100%)">
                <div class="container">
                    <div class="row justify-content-center mb-50 wow animate fadeInDown" data-wow-delay="200ms" data-wow-duration="1500ms">
                        <div class="col-lg-8">
                            <div class="section-title text-center">
                                <?php if (! empty($settings['gofly_about_journey_general_title'])): ?>
                                    <h2><?php echo esc_html($settings['gofly_about_journey_general_title']); ?></h2>
                                <?php endif; ?>
                                <?php if (!empty($settings['gofly_about_journey_general_desc'])): ?>
                                    <p><?php echo esc_html($settings['gofly_about_journey_general_desc']); ?></p>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                    <div class="jouney-content-wrapper">
                        <div class="nav-area mb-50">
                            <div class="nav nav-pills" id="pills-tab" role="tablist">
                                <div class="swiper about-page-journey-slider">
                                    <div class="swiper-wrapper">
                                        <?php foreach ($journey_list as $key => $list): ?>
                                            <div class="swiper-slide">
                                                <div class="nav-item" role="presentation">
                                                    <div class="nav-link <?php echo esc_attr($key == 0 ? 'active' : '') ?>" id="pills-<?php echo esc_attr($key) ?>-tab" data-bs-toggle="pill" data-bs-target="#pills-<?php echo esc_attr($key) ?>" role="tab" aria-controls="pills-<?php echo esc_attr($key) ?>" aria-selected="true">
                                                        <img src="<?php echo esc_url($list['gofly_about_journey_tab_image']['url']) ?>" alt="<?php echo esc_attr__('image', 'gofly-core'); ?>">
                                                        <?php if (!empty($list['gofly_about_journey_tab_year'])): ?>
                                                            <h4><?php echo esc_html($list['gofly_about_journey_tab_year']); ?></h4>
                                                        <?php endif; ?>
                                                    </div>
                                                    <span class="dot"></span>
                                                </div>
                                            </div>
                                        <?php endforeach; ?>
                                    </div>
                                </div>
                            </div>
                            <svg class="line" height="6" viewBox="0 0 1320 6" xmlns="http://www.w3.org/2000/svg">
                                <path
                                    d="M5 2.5L0 0.113249V5.88675L5 3.5V2.5ZM1315 3.5L1320 5.88675V0.113249L1315 2.5V3.5ZM4.5 3.5H1315.5V2.5H4.5V3.5Z" />
                            </svg>
                        </div>
                        <div class="row justify-content-center">
                            <div class="col-xl-8 col-lg-10">
                                <div class="tab-content" id="pills-tabContent">
                                    <?php foreach ($journey_list as $key => $list): ?>
                                        <div class="tab-pane fade  <?php echo esc_attr($key == 0 ? 'show active' : '') ?>" id="pills-<?php echo esc_attr($key) ?>" role="tabpanel" aria-labelledby="pills-<?php echo esc_attr($key) ?>-tab">
                                            <?php if (!empty($list['gofly_about_journey_tab_title'])): ?>
                                                <h4><?php echo esc_html($list['gofly_about_journey_tab_title']); ?></h4>
                                            <?php endif; ?>
                                            <?php if (!empty($list['gofly_about_journey_tab_desc'])): ?>
                                                <p><?php echo wp_kses_post($list['gofly_about_journey_tab_desc']); ?></p>
                                            <?php endif; ?>
                                        </div>
                                    <?php endforeach; ?>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        <?php endif; ?>

        <?php if ('two' == $settings['gofly_about_journey_select_style']): ?>
            <div class="home9-about-section">
                <div class="container">
                    <div class="row justify-content-between">
                        <div class="col-xl-6 col-lg-6 wow animate fadeInLeft" data-wow-delay="200ms" data-wow-duration="1500ms">
                            <div class="about-content">
                                <div class="section-title mb-45">
                                    <?php if (! empty($settings['gofly_about_journey_general_title'])): ?>
                                        <h2><?php echo esc_html($settings['gofly_about_journey_general_title']); ?></h2>
                                    <?php endif; ?>
                                    <?php if (!empty($settings['gofly_about_journey_general_desc'])): ?>
                                        <p><?php echo wp_kses_post($settings['gofly_about_journey_general_desc']); ?></p>
                                    <?php endif; ?>
                                </div>
                                <div class="btn-and-review">
                                    <a class="primary-btn1 transparent" href="<?php echo esc_url($settings['gofly_about_journey_btn_link']); ?>">
                                        <span>
                                            <?php echo esc_html($settings['gofly_about_journey_btn_lbl']); ?>
                                        </span>
                                        <span>
                                            <?php echo esc_html($settings['gofly_about_journey_btn_lbl']); ?>
                                        </span>
                                    </a>
                                    <a href="https://www.trustpilot.com/" class="single-rating">
                                        <strong><?php echo esc_html($settings['gofly_about_journey_rating_point']); ?></strong>
                                        <div class="trustpilot-rating">
                                            <img src="<?php echo esc_url($settings['gofly_about_journey_review_platform']['url']); ?>" alt="">
                                            <div class="rating-area">
                                                <img src="<?php echo esc_url($settings['gofly_about_journey_review_star']['url']); ?>" alt="">
                                                <span><?php echo esc_html($settings['gofly_about_journey_rating_lbl']); ?></span>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6 d-lg-flex d-none justify-content-lg-end wow animate fadeInRight" data-wow-delay="200ms" data-wow-duration="1500ms">
                            <div class="about-img-wrapper">
                                <div class="about-img-grp">
                                    <div class="single-grp">
                                        <div class="single-img">
                                            <img src="<?php echo esc_url($settings['gofly_about_journey_img1']['url']); ?>" alt="">
                                        </div>
                                        <div class="single-img two">
                                            <img src="<?php echo esc_url($settings['gofly_about_journey_img2']['url']); ?>" alt="">
                                        </div>
                                    </div>
                                    <div class="last-img">
                                        <img src="<?php echo esc_url($settings['gofly_about_journey_img3']['url']); ?>" alt="">
                                    </div>
                                </div>
                                <div class="icon">
                                    <?php \Elementor\Icons_Manager::render_icon($settings['gofly_about_journey_rightside_icon']); ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        <?php endif; ?>

<?php
    }
}

Plugin::instance()->widgets_manager->register(new Gofly_About_Journey_Widget());
