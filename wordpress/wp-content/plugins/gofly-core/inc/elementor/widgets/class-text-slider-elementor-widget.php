<?php

namespace Elementor;

if (!defined('ABSPATH')) exit;  // Exit if accessed directly

use Elementor\core\Schemes;
use Egns_Core\Egns_Helper;

class Gofly_Text_Slider_Widget extends Widget_Base
{

    public function get_name()
    {
        return 'gofly_text_slider';
    }

    public function get_title()
    {
        return esc_html__('EG Text Slider', 'gofly-core');
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
            'gofly_text_slider_genaral',
            [
                'label' => esc_html__('General', 'gofly-core')
            ]
        );

        $repeater = new \Elementor\Repeater();

        $repeater->add_control(
            'gofly_text_slider_genaral_content_title',
            [
                'label'       => esc_html__('Content Title', 'gofly-core'),
                'type'        => \Elementor\Controls_Manager::TEXT,
                'default'     => wp_kses('One-Click Booking, Upto <strong>FLAT 30%</strong> Discount of Haneymoon Tours', wp_kses_allowed_html('post')),
                'placeholder' => esc_html__('write your content title here', 'gofly-core'),
                'label_block' => true,
            ]
        );

        $repeater->add_control(
            'gofly_text_slider_genaral_content_title_url',
            [
                'label'   => esc_html__('URL/Link', 'gofly-core'),
                'type'    => \Elementor\Controls_Manager::URL,
                'options' => ['url', 'is_external', 'nofollow'],
                'default' => [
                    'url'         => '#',
                    'is_external' => true,
                    'nofollow'    => true,
                ],
                'label_block' => true,
            ]
        );

        $this->add_control(
            'gofly_text_slider_genaral_content_list',
            [
                'label'   => esc_html__('Content List', 'gofly-core'),
                'type'    => \Elementor\Controls_Manager::REPEATER,
                'fields'  => $repeater->get_controls(),
                'default' => [
                    [
                        'gofly_text_slider_genaral_content_title' => wp_kses('One-Click Booking, Upto <strong>FLAT 30%</strong> Discount of Haneymoon Tours', wp_kses_allowed_html('post')),

                    ],
                    [
                        'gofly_text_slider_genaral_content_title' => wp_kses('Customize Your Trip Plan and Get <strong>Special Discounts</strong> Instantly', wp_kses_allowed_html('post')),

                    ],
                    [
                        'gofly_text_slider_genaral_content_title' => wp_kses('Enjoy Family Holiday Packages with <strong>Flexible Payment Options</strong>', wp_kses_allowed_html('post')),

                    ],

                ],
                'title_field' => '{{{ gofly_text_slider_genaral_content_title }}}',
            ]
        );

        $this->end_controls_section();

        //============Style Start=============//

        $this->start_controls_section(
            'gofly_text_slider_style_genaral',
            [
                'label' => esc_html__('Styles', 'gofly-core'),
                'tab'   => Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_control(
            'gofly_text_slider_style_genaral_section_area',
            [
                'label'     => esc_html__('Section', 'gofly-core'),
                'type'      => \Elementor\Controls_Manager::HEADING,
                'separator' => 'after',
            ]
        );

        $this->add_control(
            'gofly_text_slider_style_genaral_section_area_bg_color',
            [
                'label'     => esc_html__('Background Color', 'gofly-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .top-offer-text-slider-section' => 'background-color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'gofly_text_slider_style_genaral_title',
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
                'name'     => 'gofly_text_slider_style_genaral_title_typ',
                'selector' => '{{WRAPPER}} .top-offer-text-slider-section .top-offer-text-slider-wrap a',

            ]
        );

        $this->add_control(
            'gofly_text_slider_style_genaral_title_color',
            [
                'label'     => esc_html__('Color', 'gofly-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .top-offer-text-slider-section .top-offer-text-slider-wrap a' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'gofly_text_slider_style_genaral_pagination',
            [
                'label'     => esc_html__('Pagination', 'gofly-core'),
                'type'      => \Elementor\Controls_Manager::HEADING,
                'separator' => 'after',
            ]
        );

        $this->add_control(
            'gofly_text_slider_style_genaral_pagination_color',
            [
                'label'     => esc_html__('Color', 'gofly-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .top-offer-text-slider-section .top-offer-text-slider-wrap .slider-btn svg' => 'stroke: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'gofly_text_slider_style_genaral_pagination_border_color',
            [
                'label'     => esc_html__('Border Color', 'gofly-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .top-offer-text-slider-section .top-offer-text-slider-wrap .slider-btn' => 'border: 1px solid {{VALUE}};',
                ],
            ]
        );

        $this->end_controls_section();
    }
    protected function render()
    {

        $settings = $this->get_settings_for_display();

?>
        <?php if (is_admin()): ?>
            <script>
                var swiper = new Swiper(".top-offer-text-slider", {
                    slidesPerView: 1,
                    speed: 1500,
                    spaceBetween: 24,
                    autoplay: {
                        delay: 2500, // Autoplay duration in milliseconds
                        disableOnInteraction: false,
                    },
                    effect: "fade",
                    fadeEffect: {
                        crossFade: true,
                    },
                    navigation: {
                        nextEl: ".top-offer-text-slider-next",
                        prevEl: ".top-offer-text-slider-prev",
                    },
                });
            </script>
        <?php endif; ?>

        <div class="top-offer-text-slider-section">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-8">
                        <div class="top-offer-text-slider-wrap">
                            <div class="slider-btn top-offer-text-slider-prev">
                                <svg width="11" height="12" viewBox="0 0 11 12" xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M9.42865 10.4085C8.69396 8.57179 5.02049 6.73505 2.81641 6.00036C5.02049 5.26567 8.32661 4.16363 9.42865 1.5922" stroke-width="2" stroke-linecap="round" />
                                </svg>
                            </div>
                            <div class="swiper top-offer-text-slider">
                                <div class="swiper-wrapper">
                                    <?php foreach ($settings['gofly_text_slider_genaral_content_list'] as $data): ?>
                                        <?php if (!empty($data['gofly_text_slider_genaral_content_title'])) : ?>
                                            <div class="swiper-slide">
                                                <a href="<?php echo esc_url($data['gofly_text_slider_genaral_content_title_url']['url']); ?>"><?php echo wp_kses($data['gofly_text_slider_genaral_content_title'], wp_kses_allowed_html('post'));  ?></a>
                                            </div>
                                        <?php endif; ?>
                                    <?php endforeach; ?>
                                </div>
                            </div>
                            <div class="slider-btn top-offer-text-slider-next">
                                <svg width="11" height="12" viewBox="0 0 11 12" xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M1.57141 10.4085C2.3061 8.57179 5.97957 6.73505 8.18366 6.00036C5.97957 5.26567 2.67345 4.16363 1.57141 1.5922" stroke-width="2" stroke-linecap="round" />
                                </svg>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

<?php

    }
}

Plugin::instance()->widgets_manager->register(new Gofly_Text_Slider_Widget());
