<?php

namespace Elementor;

if (!defined('ABSPATH')) exit;  // Exit if accessed directly

use Elementor\core\Schemes;
use Egns_Core\Egns_Helper;

class Gofly_Popular_Tourist_Place_Widget extends Widget_Base
{

    public function get_name()
    {
        return 'gofly_popular_tourist_place';
    }

    public function get_title()
    {
        return esc_html__('EG Popular Place', 'gofly-core');
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
            'gofly_popular_tourist_place_genaral',
            [
                'label' => esc_html__('General', 'gofly-core')
            ]
        );

        $this->add_control(
            'gofly_popular_tourist_place_title',
            [
                'label'       => esc_html__('Title', 'gofly-core'),
                'type'        => \Elementor\Controls_Manager::TEXT,
                'default'     => esc_html__('Popular Tourist Place', 'gofly-core'),
                'placeholder' => esc_html__('write your title here', 'gofly-core'),
                'label_block' => true,
            ]
        );

        $repeater = new Repeater();

        $repeater->add_control(
            'gofly_popular_tourist_place_slide_image',
            [
                'label'   => __('Main Image', 'gofly-core'),
                'type'    => Controls_Manager::MEDIA,
                'default' => [
                    'url' => \Elementor\Utils::get_placeholder_image_src(),
                ],
            ]
        );

        $repeater->add_control(
            'gofly_popular_tourist_place_location_title',
            [
                'label'   => __('Title', 'gofly-core'),
                'type'    => Controls_Manager::TEXT,
                'default' => __('Eiffel Tower', 'gofly-core'),
            ]
        );

        $repeater->add_control(
            'gofly_popular_tourist_place_location_link',
            [
                'label'   => __('Link', 'gofly-core'),
                'type'    => Controls_Manager::URL,
                'default' => [
                    'url'         => 'https://www.google.com/maps',
                    'is_external' => true,
                ],
            ]
        );

        $repeater->add_control(
            'gofly_popular_tourist_place_album_images',
            [
                'label'       => __('Album Images', 'gofly-core'),
                'type'        => Controls_Manager::GALLERY,
                'description' => __('Gallery Images', 'gofly-core'),
            ]
        );

        $this->add_control(
            'gofly_popular_tourist_place_slides',
            [
                'label'       => __('Slides', 'gofly-core'),
                'type'        => Controls_Manager::REPEATER,
                'fields'      => $repeater->get_controls(),
                'title_field' => '{{{ gofly_popular_tourist_place_location_title }}}',
            ]
        );

        $this->end_controls_section();

        //============Style Start=============//

        $this->start_controls_section(
            'gofly_popular_tourist_place_styles',
            [
                'label' => esc_html__('Styles', 'gofly-core'),
                'tab'   => Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_control(
            'gofly_popular_tourist_place_area_style',
            [
                'label'     => esc_html__('General', 'gofly-core'),
                'type'      => \Elementor\Controls_Manager::HEADING,
                'separator' => 'after',
            ]
        );

        $this->add_control(
            'gofly_popular_tourist_place_area_bg_color',
            [
                'label'     => esc_html__('Background Color', 'gofly-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .location-slider-wrap' => 'background-color: {{VALUE}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'gofly_popular_tourist_place_area_padding',
            [
                'label'      => esc_html__(
                    'Padding',
                    'gofly-core'
                ),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%'],
                'selectors'  => [
                    '{{WRAPPER}} .location-slider-wrap' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'
                ]
            ]
        );

        $this->add_control(
            'gofly_popular_tourist_place_title_style',
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
                'name'     => 'gofly_popular_tourist_place_title_typ',
                'selector' => '{{WRAPPER}} .location-slider-wrap h4',

            ]
        );

        $this->add_control(
            'gofly_popular_tourist_place_title_color',
            [
                'label'     => esc_html__('Color', 'gofly-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .location-slider-wrap h4' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'gofly_popular_tourist_place_slider',
            [
                'label'     => esc_html__('Slider', 'gofly-core'),
                'type'      => \Elementor\Controls_Manager::HEADING,
                'separator' => 'after',
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'label'    => esc_html__('Image Title Typography', 'gofly-core'),
                'name'     => 'gofly_popular_tourist_place_image_title_typ',
                'selector' => '{{WRAPPER}} .location-card .location-content h6 a',

            ]
        );

        $this->add_control(
            'gofly_popular_tourist_place_image_title_color',
            [
                'label'     => esc_html__('Image Title Color', 'gofly-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .location-card .location-content h6 a' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'gofly_popular_tourist_place_image_title_hover_color',
            [
                'label'     => esc_html__('Title Hover Color', 'gofly-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .location-card .location-content h6 a:hover' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'gofly_popular_tourist_place_slider_image_radius',
            [
                'label'      => esc_html__(
                    'Padding',
                    'gofly-core'
                ),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%'],
                'selectors'  => [
                    '{{WRAPPER}} .location-card .location-img'     => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                    '{{WRAPPER}} .location-card .location-img img' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'
                ]
            ]
        );

        $this->add_control(
            'gofly_popular_tourist_place_slider_navigation',
            [
                'label'     => esc_html__('Navigation', 'gofly-core'),
                'type'      => \Elementor\Controls_Manager::HEADING,
                'separator' => 'after',
            ]
        );

        $this->add_control(
            'gofly_popular_tourist_place_slider_navigation_bg_color',
            [
                'label'     => esc_html__('Background Color', 'gofly-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .location-slider-wrap .location-slider-area .slider-btn-grp .slider-btn' => 'background-color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'gofly_popular_tourist_place_slider_navigation_hover_bg_color',
            [
                'label'     => esc_html__('Hover BG Color', 'gofly-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .location-slider-wrap .location-slider-area .slider-btn-grp .slider-btn:hover' => 'background-color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'gofly_popular_tourist_place_slider_navigation_border_color',
            [
                'label'     => esc_html__('Border Color', 'gofly-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .location-slider-wrap .location-slider-area .slider-btn-grp .slider-btn' => 'border-color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'gofly_popular_tourist_place_slider_navigation_hover_border_color',
            [
                'label'     => esc_html__('Hover Border Color', 'gofly-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .location-slider-wrap .location-slider-area .slider-btn-grp .slider-btn:hover' => 'border-color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'gofly_popular_tourist_place_slider_navigation_icon_color',
            [
                'label'     => esc_html__('Icon Color', 'gofly-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .location-slider-wrap .location-slider-area .slider-btn-grp .slider-btn svg' => 'fill: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'gofly_popular_tourist_place_slider_navigation_hover_icon_color',
            [
                'label'     => esc_html__('Hover Icon Color', 'gofly-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .location-slider-wrap .location-slider-area .slider-btn-grp .slider-btn:hover svg' => 'fill: {{VALUE}};',
                ],
            ]
        );

        $this->end_controls_section();

        //============Style End=============//
    }

    protected function render()
    {
        if (is_admin()): ?>
            <script>
                var swiper = new Swiper(".destination-dt-location-slider", {
                    slidesPerView: 1,
                    speed: 1500,
                    spaceBetween: 24,
                    autoplay: {
                        delay: 2500, // Autoplay duration in milliseconds
                        pauseOnMouseEnter: true,
                        disableOnInteraction: false,
                    },
                    navigation: {
                        nextEl: ".location-slider-next",
                        prevEl: ".location-slider-prev",
                    },
                    breakpoints: {
                        280: {
                            slidesPerView: 1,
                        },
                        386: {
                            slidesPerView: 1,
                        },
                        576: {
                            slidesPerView: 3,
                            spaceBetween: 15,
                        },
                        768: {
                            slidesPerView: 4,
                        },
                        992: {
                            slidesPerView: 5,
                            spaceBetween: 15,
                        },
                        1200: {
                            slidesPerView: 6,
                            spaceBetween: 15,
                        },
                        1400: {
                            slidesPerView: 6,
                        },
                    },
                });
            </script>
        <?php endif;

        $settings = $this->get_settings_for_display();
        if (empty($settings['gofly_popular_tourist_place_slides'])) return;
        ?>

        <div class="location-slider-wrap">
            <?php if (! empty($settings['gofly_popular_tourist_place_title'])): ?>
                <h4 class="mb-20">
                    <?php echo esc_html($settings['gofly_popular_tourist_place_title']); ?>
                </h4>
            <?php endif; ?>
            <div class="location-slider-area">
                <div class="swiper destination-dt-location-slider">
                    <div class="swiper-wrapper">
                        <?php foreach ($settings['gofly_popular_tourist_place_slides'] as $slide):
                            $has_album = !empty($slide['gofly_popular_tourist_place_album_images']);
                        ?>
                            <div class="swiper-slide">
                                <div class="location-card">
                                    <div class="location-img">
                                        <?php if (!empty($slide['gofly_popular_tourist_place_slide_image']['url'])): ?>
                                            <img src="<?php echo esc_url($slide['gofly_popular_tourist_place_slide_image']['url']); ?>" alt="<?php echo esc_attr("image") ?>">
                                        <?php endif; ?>

                                        <?php if ($has_album): ?>
                                            <button class="img-album-btn">
                                                <svg width="14" height="14" viewBox="0 0 14 14" xmlns="http://www.w3.org/2000/svg">
                                                    <g>
                                                        <path
                                                            d="M3.93766 8.00088C4.2858 8.00088 4.61969 7.86258 4.86586 7.61641C5.11203 7.37023 5.25033 7.03635 5.25033 6.68821C5.25033 6.34007 5.11203 6.00619 4.86586 5.76002C4.61969 5.51385 4.2858 5.37555 3.93766 5.37555C3.58952 5.37555 3.25564 5.51385 3.00947 5.76002C2.7633 6.00619 2.625 6.34007 2.625 6.68821C2.625 7.03635 2.7633 7.37023 3.00947 7.61641C3.25564 7.86258 3.58952 8.00088 3.93766 8.00088Z" />
                                                        <path
                                                            d="M12.2515 11.5013C12.2515 11.9655 12.0671 12.4107 11.7389 12.7389C11.4107 13.0671 10.9655 13.2515 10.5013 13.2515H1.75022C1.28603 13.2515 0.840857 13.0671 0.512627 12.7389C0.184398 12.4107 0 11.9655 0 11.5013V4.50044C-2.31942e-07 4.03655 0.184157 3.59164 0.512008 3.26346C0.83986 2.93528 1.28458 2.75068 1.74847 2.75022C1.74847 2.28603 1.93287 1.84086 2.2611 1.51263C2.58933 1.1844 3.0345 1 3.49869 1H12.2498C12.714 1 13.1591 1.1844 13.4874 1.51263C13.8156 1.84086 14 2.28603 14 2.75022V9.75109C14 10.215 13.8158 10.6599 13.488 10.9881C13.1601 11.3162 12.7154 11.5008 12.2515 11.5013ZM12.2498 1.87511H3.49869C3.26659 1.87511 3.04401 1.96731 2.87989 2.13142C2.71578 2.29554 2.62358 2.51813 2.62358 2.75022H10.5013C10.9655 2.75022 11.4107 2.93462 11.7389 3.26285C12.0671 3.59108 12.2515 4.03625 12.2515 4.50044V10.6262C12.4833 10.6257 12.7055 10.5333 12.8692 10.3693C13.0329 10.2052 13.1249 9.98288 13.1249 9.75109V2.75022C13.1249 2.51813 13.0327 2.29554 12.8686 2.13142C12.7045 1.96731 12.4819 1.87511 12.2498 1.87511ZM1.75022 3.62533C1.51813 3.62533 1.29554 3.71753 1.13142 3.88164C0.967308 4.04576 0.875109 4.26834 0.875109 4.50044V11.5013L3.19065 9.44131C3.26217 9.37004 3.35615 9.3257 3.45663 9.31581C3.55711 9.30593 3.65792 9.33109 3.74197 9.38705L6.06976 10.9386L9.31641 7.69196C9.38131 7.62701 9.46499 7.58411 9.55561 7.56935C9.64623 7.55458 9.7392 7.5687 9.82135 7.6097L11.3764 9.31354V4.50044C11.3764 4.26834 11.2842 4.04576 11.1201 3.88164C10.956 3.71753 10.7334 3.62533 10.5013 3.62533H1.75022Z" />
                                                    </g>
                                                </svg>
                                                <?php echo count($slide['gofly_popular_tourist_place_album_images']); ?>
                                            </button>
                                            <div class="image-album-wrap d-none">
                                                <?php foreach ($slide['gofly_popular_tourist_place_album_images'] as $album_img): ?>
                                                    <a href="<?php echo esc_url($album_img['url']); ?>" data-fancybox="images"></a>
                                                <?php endforeach; ?>
                                            </div>
                                        <?php endif; ?>
                                    </div>
                                    <?php if (!empty($slide['gofly_popular_tourist_place_location_title'])): ?>
                                        <div class="location-content">
                                            <h6>
                                                <a href="<?php echo esc_url($slide['gofly_popular_tourist_place_location_link']['url']); ?>" target="<?php echo $slide['gofly_popular_tourist_place_location_link']['is_external'] ? '_blank' : '_self'; ?>">
                                                    <?php echo esc_html($slide['gofly_popular_tourist_place_location_title']); ?>
                                                </a>
                                            </h6>
                                        </div>
                                    <?php endif; ?>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    </div>
                </div>

                <div class="slider-btn-grp two">
                    <div class="slider-btn location-slider-prev">
                        <svg width="12" height="14" viewBox="0 0 12 14" xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M10.3125 0.704152C10.4758 0.323658 10.9172 0.147472 11.2979 0.310597C11.6784 0.473872 11.8545 0.915329 11.6914 1.29595C10.8482 3.26297 9.18494 4.61712 7.42871 5.59282C6.36908 6.1815 5.24241 6.64833 4.18848 7.03618C5.31592 7.51881 6.52685 8.12012 7.6416 8.79693C8.54322 9.34436 9.39912 9.95095 10.1025 10.5958C10.7986 11.2338 11.3891 11.9489 11.6982 12.7217C11.852 13.1063 11.6648 13.5425 11.2803 13.6963C10.8957 13.85 10.4595 13.6629 10.3057 13.2784C10.1148 12.8013 9.70522 12.2662 9.08887 11.7012C8.47993 11.1431 7.71047 10.5931 6.8623 10.0782C5.16463 9.04752 3.21635 8.19586 1.76465 7.71196L-0.370117 7.00005L1.76465 6.28814C3.27361 5.78515 5.08312 5.18062 6.7002 4.28228C8.31881 3.38305 9.6556 2.23687 10.3125 0.704152Z" />
                        </svg>
                    </div>
                    <div class="slider-btn location-slider-next">
                        <svg width="12" height="14" viewBox="0 0 12 14" xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M0.719771 13.6962C1.10432 13.85 1.54057 13.6628 1.69438 13.2783C1.88527 12.8012 2.29482 12.2661 2.91118 11.7011C3.52012 11.1429 4.28957 10.593 5.13774 10.0781C6.83541 9.04741 8.78369 8.19576 10.2354 7.71186L12.3702 6.99995L10.2354 6.28803C8.72643 5.78505 6.91691 5.18052 5.29985 4.28218C3.68124 3.38295 2.34442 2.23677 1.68754 0.70405C1.52426 0.323573 1.0828 0.147379 0.702193 0.310495C0.321714 0.473783 0.145522 0.915242 0.308638 1.29585C1.15178 3.26288 2.81511 4.61702 4.57133 5.59272C5.63078 6.1813 6.75681 6.64924 7.81059 7.03706C6.68348 7.5196 5.4728 8.12025 4.35844 8.79682C3.45684 9.34426 2.60092 9.95086 1.89751 10.5957C1.20147 11.2337 0.610934 11.9488 0.301802 12.7216C0.148089 13.1062 0.33524 13.5424 0.719771 13.6962Z" />
                        </svg>
                    </div>
                </div>
            </div>
        </div>

<?php

    }
}

Plugin::instance()->widgets_manager->register(new Gofly_Popular_Tourist_Place_Widget());
