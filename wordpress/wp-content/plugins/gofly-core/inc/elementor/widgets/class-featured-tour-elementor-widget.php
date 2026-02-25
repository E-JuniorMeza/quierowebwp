<?php

namespace Elementor;

if (!defined('ABSPATH')) exit;  // Exit if accessed directly

use Egns_Core;
use Elementor\core\Schemes;
use Egns_Core\Egns_Helper;

class Gofly_Tour_Featured_Image_Widget extends Widget_Base
{

    public function get_name()
    {
        return 'gofly_tour_featured';
    }

    public function get_title()
    {
        return esc_html__('EG Tour Featured', 'gofly-core');
    }

    public function get_icon()
    {
        return 'egns-widget-icon';
    }

    public function get_categories()
    {
        return ['gofly_tour'];
    }

    protected function register_controls()
    {

        //===================== Content =======================//

        $this->start_controls_section(
            'gofly_tour_featured_content_section',
            [
                'label' => esc_html__('Content', 'gofly-core')
            ]
        );
        $this->add_control(
            'tour_custom_panel_notice',
            [
                'type'        => \Elementor\Controls_Manager::NOTICE,
                'notice_type' => 'warning',
                'dismissible' => true,
                'heading'     => esc_html__('Notice', 'gofly-core'),
                'content'     => esc_html__('This Widgets only for custom post "Tour" details page.', 'gofly-core'),
            ]
        );

        $this->end_controls_section();


        //===================== Content Style =======================//

        $this->start_controls_section(
            'gofly_tour_featured_style_section',
            [
                'label' => esc_html__('Style Section', 'gofly-core'),
                'tab'   => \Elementor\Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_control(
            'gofly_tour_single_hero_title_style',
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
                'name'     => 'gofly_tour_single_hero_title_typ',
                'selector' => '{{WRAPPER}} .breadcrumb-section .banner-content h1',

            ]
        );

        $this->add_control(
            'gofly_tour_single_hero_title_color',
            [
                'label'     => esc_html__('Color', 'gofly-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .breadcrumb-section .banner-content h1' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'gofly_tour_single_hero_price_text_style',
            [
                'label'     => esc_html__('Price Text', 'gofly-core'),
                'type'      => \Elementor\Controls_Manager::HEADING,
                'separator' => 'after',
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'label'    => esc_html__('Typography', 'gofly-core'),
                'name'     => 'gofly_tour_single_hero_price_text_typ',
                'selector' => '{{WRAPPER}} .breadcrumb-section .banner-content > span',

            ]
        );

        $this->add_control(
            'gofly_tour_single_hero_price_text_color',
            [
                'label'     => esc_html__('Color', 'gofly-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .breadcrumb-section .banner-content > span' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'gofly_tour_single_hero_price_style',
            [
                'label'     => esc_html__('Price', 'gofly-core'),
                'type'      => \Elementor\Controls_Manager::HEADING,
                'separator' => 'after',
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'label'    => esc_html__('Typography', 'gofly-core'),
                'name'     => 'gofly_tour_single_hero_price_typ',
                'selector' => '{{WRAPPER}} .breadcrumb-section .banner-content > span strong',

            ]
        );

        $this->add_control(
            'gofly_tour_single_hero_price_color',
            [
                'label'     => esc_html__('Color', 'gofly-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .breadcrumb-section .banner-content > span strong' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'gofly_tour_single_hero_duration_nd_location_style',
            [
                'label'     => esc_html__('Duration & Location', 'gofly-core'),
                'type'      => \Elementor\Controls_Manager::HEADING,
                'separator' => 'after',
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'label'    => esc_html__('Typography', 'gofly-core'),
                'name'     => 'gofly_tour_single_hero_duration_nd_location_typ',
                'selector' => '{{WRAPPER}} .breadcrumb-section .banner-content .batch span',

            ]
        );

        $this->add_control(
            'gofly_tour_single_hero_duration_nd_location_color',
            [
                'label'     => esc_html__('Color', 'gofly-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .breadcrumb-section .banner-content .batch span' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'gofly_tour_single_hero_duration_nd_location_bg_color',
            [
                'label'     => esc_html__('Background Color', 'gofly-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .breadcrumb-section .banner-content .batch span' => 'background-color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'gofly_tour_single_hero_duration_nd_location_border_color',
            [
                'label'     => esc_html__('Border Color', 'gofly-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .breadcrumb-section .banner-content .batch span' => 'border-color: {{VALUE}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'gofly_tour_single_hero_duration_nd_location_border_radius',
            [
                'label'      => esc_html__(
                    'Border Radius',
                    'gofly-core'
                ),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%'],
                'selectors'  => [
                    '{{WRAPPER}} .breadcrumb-section .banner-content .batch span' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'
                ]
            ]
        );

        $this->add_control(
            'gofly_tour_single_hero_slider_button_style',
            [
                'label'     => esc_html__('Slider Button', 'gofly-core'),
                'type'      => \Elementor\Controls_Manager::HEADING,
                'separator' => 'after',
            ]
        );

        $this->add_control(
            'gofly_tour_single_hero_slider_button_icon_color',
            [
                'label'     => esc_html__('Icon Color', 'gofly-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .breadcrumb-section .slider-btn-grp .slider-btn svg' => 'fill: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'gofly_tour_single_hero_slider_button_icon_hover_color',
            [
                'label'     => esc_html__('Icon Hover Color', 'gofly-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .breadcrumb-section .slider-btn-grp .slider-btn:hover svg' => 'fill: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'gofly_tour_single_hero_slider_button_bg_color',
            [
                'label'     => esc_html__('Background Color', 'gofly-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .breadcrumb-section .slider-btn-grp .slider-btn' => 'background-color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'gofly_tour_single_hero_slider_button_bg_hover_color',
            [
                'label'     => esc_html__('Background Hover Color', 'gofly-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .breadcrumb-section .slider-btn-grp .slider-btn:hover' => 'background-color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'gofly_tour_single_hero_slider_button_border_color',
            [
                'label'     => esc_html__('Border Color', 'gofly-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .breadcrumb-section .slider-btn-grp .slider-btn' => 'border-color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'gofly_tour_single_hero_slider_button_border_hover_color',
            [
                'label'     => esc_html__('Border Hover Color', 'gofly-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .breadcrumb-section .slider-btn-grp .slider-btn:hover' => 'border-color: {{VALUE}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'gofly_tour_single_hero_slider_button_border_radius',
            [
                'label'      => esc_html__(
                    'Border Radius',
                    'gofly-core'
                ),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%'],
                'selectors'  => [
                    '{{WRAPPER}} .breadcrumb-section .slider-btn-grp .slider-btn' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'
                ]
            ]
        );

        $this->end_controls_section();
    }
    protected function render()
    {

        $settings = $this->get_settings_for_display();

        $id = get_the_ID();

        $gallery_opt = Egns_Helper::egns_get_tour_value('tour_feature_image_gallery');
        $gallery_ids = explode(',', $gallery_opt);

        $tour_feature_video_uplaod = Egns_Helper::egns_get_tour_value('tour_feature_video_uplaod', 'url');
        $tour_feature_video_link   = Egns_Helper::egns_get_tour_value('tour_feature_video_link');

?>

        <?php if (is_admin()): ?>
            <script>
                var swiper = new Swiper(".home2-banner-slider", {
                    slidesPerView: 1,
                    speed: 1500,
                    spaceBetween: 24,
                    autoplay: {
                        delay: 3000,
                        pauseOnMouseEnter: true,
                        disableOnInteraction: false,
                    },
                    effect: "fade",
                    fadeEffect: {
                        crossFade: true,
                    },
                    navigation: {
                        nextEl: ".banner-slider-next",
                        prevEl: ".banner-slider-prev",
                    },
                    pagination: {
                        el: ".banner-pagination",
                        clickable: true,
                    },
                });
            </script>
        <?php endif; ?>

        <div class="breadcrumb-section two">
            <?php if (!empty($gallery_opt)): ?>
                <div class="swiper home2-banner-slider">
                    <div class="swiper-wrapper">
                        <?php if (has_post_thumbnail()): ?>
                            <div class="swiper-slide">
                                <div class="banner-bg" style="background-image:linear-gradient(rgba(0, 0, 0, 0.3), rgba(0, 0, 0, 0.3)), url(<?php echo get_the_post_thumbnail_url() ?>);"></div>
                            </div>
                        <?php endif; ?>
                        <?php
                        if (! empty($gallery_ids)) {
                            foreach ($gallery_ids as $gallery_item_id) {
                        ?>
                                <div class="swiper-slide">
                                    <div class="banner-bg" style="background-image:linear-gradient(rgba(0, 0, 0, 0.3), rgba(0, 0, 0, 0.3)), url(<?php echo wp_get_attachment_url($gallery_item_id) ?>);">
                                    </div>
                                </div>
                        <?php
                            }
                        }
                        ?>
                        <?php if (!empty($tour_feature_video_uplaod)): ?>
                            <div class="swiper-slide">
                                <video autoplay loop muted playsinline src="<?php echo esc_url($tour_feature_video_uplaod); ?>"></video>
                            </div>
                        <?php elseif (!empty($tour_feature_video_link)): ?>
                            <div class="swiper-slide">
                                <video autoplay loop muted playsinline src="<?php echo esc_url($tour_feature_video_link); ?>"></video>
                            </div>
                        <?php endif; ?>
                    </div>
                </div>
            <?php else : ?>
                <?php if (has_post_thumbnail()): ?>
                    <div class="home2-banner-thumb">
                        <div class="thumb-wrapper">
                            <div class="banner-bg" style="background-image:linear-gradient(rgba(0, 0, 0, 0.3), rgba(0, 0, 0, 0.3)), url(<?php echo get_the_post_thumbnail_url() ?>);">
                            </div>
                        </div>
                    </div>
                <?php endif; ?>
            <?php endif; ?>
            <div class="banner-content-wrap">
                <div class="container">
                    <div class="banner-content">
                        <?php echo Egns_Helper::get_single_starting_price($id, 'one') ?>
                        <h1><?php echo esc_html(get_the_title($id)) ?></h1>
                        <?php if (!empty(Egns_Helper::egns_get_tour_value('tour_duration_day') || Egns_Helper::egns_get_tour_value('tour_duration_night') || Egns_Helper::egns_get_tour_value('tour_destination_select'))): ?>
                            <div class="batch">
                                <span>
                                    <?php
                                    if (!empty(Egns_Helper::egns_get_tour_value('tour_duration_day'))) {
                                        echo Egns_Helper::egns_get_tour_value('tour_duration_day') . ' | ';
                                    }
                                    ?>
                                    <?php
                                    if (!empty(Egns_Helper::egns_get_tour_value('tour_duration_night'))) {
                                        echo Egns_Helper::egns_get_tour_value('tour_duration_night') . ' | ';
                                    }
                                    ?>
                                    <?php
                                    if (!empty(Egns_Helper::egns_get_tour_value('tour_destination_select'))) {
                                        echo count(Egns_Helper::egns_get_tour_value('tour_destination_select')) . ' ' . esc_html__('Destinations', 'gofly-core');
                                    }
                                    ?>
                                </span>
                            </div>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
            <?php if (!empty($gallery_opt)): ?>
                <div class="slider-btn-grp">
                    <div class="slider-btn banner-slider-prev">
                        <svg width="22" height="22" viewBox="0 0 22 22" xmlns="http://www.w3.org/2000/svg">
                            <g>
                                <path fill-rule="evenodd" clip-rule="evenodd" d="M0 10.0571H22V11.9428H0V10.0571Z" />
                                <path fill-rule="evenodd" clip-rule="evenodd"
                                    d="M0.942857 11.9429C5.3768 11.9429 9.00115 8.0432 9.00115 3.88457V2.94171H7.11543V3.88457C7.11543 7.04251 4.29566 10.0571 0.942857 10.0571H0V11.9429H0.942857Z" />
                                <path fill-rule="evenodd" clip-rule="evenodd"
                                    d="M0.942857 10.0571C5.3768 10.0571 9.00115 13.9568 9.00115 18.1154V19.0583H7.11543V18.1154C7.11543 14.9587 4.29566 11.9428 0.942857 11.9428H0V10.0571H0.942857Z" />
                            </g>
                        </svg>
                    </div>
                    <div class="slider-btn banner-slider-next">
                        <svg width="22" height="22" viewBox="0 0 22 22" xmlns="http://www.w3.org/2000/svg">
                            <g>
                                <path fill-rule="evenodd" clip-rule="evenodd" d="M22 10.0571H-5.72205e-06V11.9428H22V10.0571Z" />
                                <path fill-rule="evenodd" clip-rule="evenodd"
                                    d="M21.0571 11.9429C16.6232 11.9429 12.9989 8.0432 12.9989 3.88457V2.94171H14.8846V3.88457C14.8846 7.04251 17.7043 10.0571 21.0571 10.0571H22V11.9429H21.0571Z" />
                                <path fill-rule="evenodd" clip-rule="evenodd"
                                    d="M21.0571 10.0571C16.6232 10.0571 12.9989 13.9568 12.9989 18.1154V19.0583H14.8846V18.1154C14.8846 14.9587 17.7043 11.9428 21.0571 11.9428H22V10.0571H21.0571Z" />
                            </g>
                        </svg>
                    </div>
                </div>
            <?php endif; ?>
        </div>

<?php

    }
}

Plugin::instance()->widgets_manager->register(new Gofly_Tour_Featured_Image_Widget());
