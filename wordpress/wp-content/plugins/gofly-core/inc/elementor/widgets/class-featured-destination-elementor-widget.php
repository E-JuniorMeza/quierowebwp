<?php

namespace Elementor;

if (!defined('ABSPATH')) exit;  // Exit if accessed directly

use Egns_Core;
use Elementor\core\Schemes;
use Egns_Core\Egns_Helper;

class Gofly_Destination_Featured_Image_Widget extends Widget_Base
{

    public function get_name()
    {
        return 'gofly_destination_featured';
    }

    public function get_title()
    {
        return esc_html__('EG Destination Featured', 'gofly-core');
    }

    public function get_icon()
    {
        return 'egns-widget-icon';
    }

    public function get_categories()
    {
        return ['gofly_destination'];
    }

    protected function register_controls()
    {

        //=====================General=======================//

        $this->start_controls_section(
            'gofly_destination_featured_section',
            [
                'label' => esc_html__('General', 'gofly-core')
            ]
        );

        $this->add_control(
            'custom_panel_notice',
            [
                'type'        => \Elementor\Controls_Manager::NOTICE,
                'notice_type' => 'warning',
                'dismissible' => true,
                'heading'     => esc_html__('Notice', 'gofly-core'),
                'content'     => esc_html__('This Widgets only for custom post "Destination" details page.', 'gofly-core'),
            ]
        );



        $this->end_controls_section();

        $this->start_controls_section(
            'gofly_destination_featured_style_section',
            [
                'label' => esc_html__('Style', 'gofly-core'),
                'tab'   => \Elementor\Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_control(
            'gofly_destination_featured_gallery_style',
            [
                'label'     => esc_html__('Gallery', 'gofly-core'),
                'type'      => \Elementor\Controls_Manager::HEADING,
                'separator' => 'after',
            ]
        );

        $this->add_responsive_control(
            'gofly_destination_featured_gallery_border_radius',
            [
                'label'      => esc_html__(
                    'Image Border Radius',
                    'gofly-core'
                ),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%'],
                'selectors'  => [
                    '{{WRAPPER}} .destination-details-gallery-section .destination-details-gallery-slider .swiper-wrapper .swiper-slide img' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'
                ]
            ]
        );

        $this->add_control(
            'gofly_destination_featured_gallery_navigation_background_color',
            [
                'label'     => esc_html__('Navigation Background Color', 'gofly-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}}  .destination-details-gallery-section .slider-btn-grp .slider-btn' => 'background: {{VALUE}};',

                ],
            ]
        );

        $this->add_control(
            'gofly_destination_featured_gallery_navigation_background_hover_color',
            [
                'label'     => esc_html__('Navigation Background Hover Color', 'gofly-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}}  .destination-details-gallery-section .slider-btn-grp .slider-btn:hover' => 'background: {{VALUE}};',

                ],
            ]
        );

        $this->add_control(
            'gofly_destination_featured_gallery_navigation_border_color',
            [
                'label'     => esc_html__('Navigation Border Color', 'gofly-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}}  .destination-details-gallery-section .slider-btn-grp .slider-btn' => 'border-color: {{VALUE}};',

                ],
            ]
        );

        $this->add_control(
            'gofly_destination_featured_gallery_navigation_border_hover_color',
            [
                'label'     => esc_html__('Navigation Border Hover Color', 'gofly-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}}  .destination-details-gallery-section .slider-btn-grp .slider-btn:hover' => 'border-color: {{VALUE}};',

                ],
            ]
        );

        $this->add_control(
            'gofly_destination_featured_gallery_navigation_icon_color',
            [
                'label'     => esc_html__('Icon Color', 'gofly-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}}  .destination-details-gallery-section .slider-btn-grp .slider-btn svg' => 'fill: {{VALUE}};',

                ],
            ]
        );

        $this->add_control(
            'gofly_destination_featured_gallery_navigation_icon_hover_color',
            [
                'label'     => esc_html__('Icon Hover Color', 'gofly-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}}  .destination-details-gallery-section .slider-btn-grp .slider-btn:hover svg' => 'fill: {{VALUE}};',

                ],
            ]
        );

        $this->add_responsive_control(
            'gofly_destination_featured_gallery_navigation_border_radius',
            [
                'label'      => esc_html__(
                    'Navigation Button Border Radius',
                    'gofly-core'
                ),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%'],
                'selectors'  => [
                    '{{WRAPPER}} .destination-details-gallery-section .slider-btn-grp .slider-btn' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'
                ]
            ]
        );

        $this->end_controls_section();
    }

    protected function render()
    {

        $settings = $this->get_settings_for_display();

        $gallery_opt = Egns_Core\Egns_Helper::egns_get_destination_value('destination_feature_gallery');
        $gallery_ids = explode(',', $gallery_opt);


        $tour_feature_video_uplaod = Egns_Core\Egns_Helper::egns_get_destination_value('destination_feature_video_uplaod', 'url');
        $tour_feature_video_link   = Egns_Core\Egns_Helper::egns_get_destination_value('destination_feature_video_link');

?>
        <?php if (is_admin()): ?>
            <script>
                var swiper = new Swiper(".destination-details-gallery-slider", {
                    slidesPerView: 1,
                    speed: 1500,
                    spaceBetween: 10,
                    autoplay: {
                        delay: 2500, // Autoplay duration in milliseconds
                        pauseOnMouseEnter: true,
                        disableOnInteraction: false,
                    },
                    navigation: {
                        nextEl: ".destination-dt-gallery-slider-next",
                        prevEl: ".destination-dt-gallery-slider-prev",
                    },
                    breakpoints: {
                        280: {
                            slidesPerView: 1,
                        },
                        386: {
                            slidesPerView: 1,
                        },
                        576: {
                            slidesPerView: 1,
                        },
                        768: {
                            slidesPerView: 2,
                        },
                        992: {
                            slidesPerView: 3,
                        },
                        1200: {
                            slidesPerView: 3,
                        },
                        1400: {
                            slidesPerView: 3,
                        },
                    },
                });
            </script>
        <?php endif; ?>

        <div class="destination-details-gallery-section mb-50">
            <div class="swiper destination-details-gallery-slider">
                <div class="swiper-wrapper">
                    <?php if (has_post_thumbnail()): ?>
                        <div class="swiper-slide">
                            <img src="<?php echo get_the_post_thumbnail_url() ?>" alt="<?php echo esc_attr__('thumbnail-image', 'gofly-core'); ?>">
                        </div>
                    <?php endif; ?>
                    <?php
                    if (! empty($gallery_ids)) {
                        foreach ($gallery_ids as $gallery_item_id) {
                    ?>
                            <div class="swiper-slide">
                                <img src="<?php echo wp_get_attachment_url($gallery_item_id) ?>" alt="<?php echo esc_attr__('gallery-image', 'gofly-core'); ?>">
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
            <div class="slider-btn-grp two">
                <div class="slider-btn destination-dt-gallery-slider-prev">
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
                <div class="slider-btn destination-dt-gallery-slider-next">
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
        </div>

<?php

    }
}

Plugin::instance()->widgets_manager->register(new Gofly_Destination_Featured_Image_Widget());
