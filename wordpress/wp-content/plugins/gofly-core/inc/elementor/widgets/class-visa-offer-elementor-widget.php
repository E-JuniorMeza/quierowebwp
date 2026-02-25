<?php

namespace Elementor;

if (!defined('ABSPATH')) exit;  // Exit if accessed directly

use Elementor\core\Schemes;
use Egns_Core\Egns_Helper;

class Gofly_Visa_Offer_Widget extends Widget_Base
{

    public function get_name()
    {
        return 'gofly_visa_offer';
    }

    public function get_title()
    {
        return esc_html__('EG Visa Offer', 'gofly-core');
    }

    public function get_icon()
    {
        return 'egns-widget-icon';
    }

    public function get_categories()
    {
        return ['gofly_visa'];
    }

    protected function register_controls()
    {

        //=====================General=======================//

        $this->start_controls_section(
            'gofly_visa_offer_genaral',
            [
                'label' => esc_html__('General', 'gofly-core')
            ]
        );

        $this->add_control(
            'gofly_visa_offer_genaral_title',
            [
                'label'       => esc_html__('Title', 'gofly-core'),
                'type'        => \Elementor\Controls_Manager::TEXT,
                'default'     => wp_kses('What We Offer', wp_kses_allowed_html('post')),
                'placeholder' => esc_html__('write your title here', 'gofly-core'),
                'label_block' => true,
            ]
        );

        $this->add_control(
            'gofly_visa_offer_genaral_description',
            [
                'label'       => esc_html__('Description', 'gofly-core'),
                'type'        => \Elementor\Controls_Manager::TEXTAREA,
                'default'     => wp_kses('A curated list of the most popular travel packages based on different destinations.', wp_kses_allowed_html('post')),
                'placeholder' => esc_html__('write your short description here', 'gofly-core'),
                'label_block' => true,
            ]
        );

        $repeater = new \Elementor\Repeater();

        $repeater->add_control(
            'gofly_visa_offer_genaral_service_image',
            [
                'label'   => esc_html__('Background Image', 'gofly-core'),
                'type'    => \Elementor\Controls_Manager::MEDIA,
                'default' => [
                    'url' => \Elementor\Utils::get_placeholder_image_src(),
                ],
                'media_types' => ['image'],
            ]
        );


        $repeater->add_control(
            'gofly_visa_offer_genaral_service_title',
            [
                'label'       => esc_html__('Service Title', 'gofly-core'),
                'type'        => \Elementor\Controls_Manager::TEXT,
                'default'     => esc_html__('Tourist Visa', 'gofly-core'),
                'placeholder' => esc_html__('write your text here', 'gofly-core'),
                'label_block' => true,
            ]
        );

        $repeater->add_control(
            'gofly_visa_offer_genaral_service_title_link',
            [
                'label'       => esc_html__('Service Link/URL', 'gofly-core'),
                'type'        => \Elementor\Controls_Manager::URL,
                'default'     => ['url' => '#'],
                'placeholder' => esc_html__('write your url here', 'gofly-core'),
                'label_block' => true,
            ]
        );

        $repeater->add_control(
            'gofly_visa_offer_genaral_service_description',
            [
                'label'       => esc_html__('Service Description', 'gofly-core'),
                'type'        => \Elementor\Controls_Manager::TEXTAREA,
                'default'     => esc_html__('A Student Visa allows individuals to study at an accredited educational institution in a foreign country.', 'gofly-core'),
                'placeholder' => esc_html__('write your text here', 'gofly-core'),
                'label_block' => true,
            ]
        );


        $this->add_control(
            'gofly_visa_offer_genaral_service_list',
            [
                'label'   => esc_html__('Service List', 'gofly-core'),
                'type'    => \Elementor\Controls_Manager::REPEATER,
                'fields'  => $repeater->get_controls(),
                'default' => [
                    [
                        'gofly_visa_offer_genaral_service_title' => esc_html('Tourist Visa'),
                    ],
                    [
                        'gofly_visa_offer_genaral_service_title' => esc_html('Business Visa'),
                    ],
                    [
                        'gofly_visa_offer_genaral_service_title' => esc_html('Student Visa'),
                    ],
                    [
                        'gofly_visa_offer_genaral_service_title' => esc_html('Medical Visa'),
                    ],
                ],
                'title_field' => '{{{ gofly_visa_offer_genaral_service_title }}}',
            ]
        );

        $this->end_controls_section();


        //style start

        $this->start_controls_section(
            'gofly_visa_offer_style_genaral',
            [
                'label' => esc_html__('Styles', 'gofly-core'),
                'tab'   => Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_control(
            'gofly_visa_offer_style_genaral_global_sec',
            [
                'label'     => esc_html__('Global Section', 'gofly-core'),
                'type'      => \Elementor\Controls_Manager::HEADING,
                'separator' => 'after',
            ]
        );

        $this->add_control(
            'gofly_visa_offer_style_genaral_global_sec_card_border_color',
            [
                'label'     => esc_html__('Card Border Color', 'gofly-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .home8-visa-slider-section .visa-card' => 'border: 1px solid {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'gofly_visa_offer_style_genaral_global_sec_card_bg_color',
            [
                'label'     => esc_html__('Card Background Color', 'gofly-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .home8-visa-slider-section .visa-card' => 'background-color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'gofly_visa_offer_style_genaral_header_title',
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
                'name'     => 'gofly_visa_offer_style_genaral_header_title_typ',
                'selector' => '{{WRAPPER}} .section-title h2',

            ]
        );

        $this->add_control(
            'gofly_visa_offer_style_genaral_header_title_color',
            [
                'label'     => esc_html__('Color', 'gofly-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .section-title h2' => 'color: {{VALUE}};',
                ],
            ]
        );


        $this->add_control(
            'gofly_visa_offer_style_genaral_header_description',
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
                'name'     => 'gofly_visa_offer_style_genaral_header_description_typ',
                'selector' => '{{WRAPPER}} .section-title p',

            ]
        );

        $this->add_control(
            'gofly_visa_offer_style_genaral_header_description_color',
            [
                'label'     => esc_html__('Color', 'gofly-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .section-title p' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'gofly_visa_offer_style_genaral_visa_title',
            [
                'label'     => esc_html__('Visa Title', 'gofly-core'),
                'type'      => \Elementor\Controls_Manager::HEADING,
                'separator' => 'after',
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'label'    => esc_html__('Typography', 'gofly-core'),
                'name'     => 'gofly_visa_offer_style_genaral_visa_title_typ',
                'selector' => '{{WRAPPER}} .home8-visa-slider-section .visa-card .content h4 a',

            ]
        );

        $this->add_control(
            'gofly_visa_offer_style_genaral_visa_title_color',
            [
                'label'     => esc_html__('Color', 'gofly-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .home8-visa-slider-section .visa-card .content h4 a' => 'color: {{VALUE}};',
                ],
            ]
        );


        $this->add_control(
            'gofly_visa_offer_style_genaral_visa_except_text',
            [
                'label'     => esc_html__('Visa Excerpt Text', 'gofly-core'),
                'type'      => \Elementor\Controls_Manager::HEADING,
                'separator' => 'after',
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'label'    => esc_html__('Typography', 'gofly-core'),
                'name'     => 'gofly_visa_offer_style_genaral_visa_except_text_typ',
                'selector' => '{{WRAPPER}} .home8-visa-slider-section .visa-card .content p',

            ]
        );

        $this->add_control(
            'gofly_visa_offer_style_genaral_visa_except_text_color',
            [
                'label'     => esc_html__('Color', 'gofly-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .home8-visa-slider-section .visa-card .content p' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'gofly_visa_offer_style_genaral_visa_pagination_dot',
            [
                'label'     => esc_html__('Pagination Dot', 'gofly-core'),
                'type'      => \Elementor\Controls_Manager::HEADING,
                'separator' => 'after',
            ]
        );

        $this->add_control(
            'gofly_visa_offer_style_genaral_visa_pagination_dot_bg_color',
            [
                'label'     => esc_html__('Background Color ( Active )', 'gofly-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .paginations.two .swiper-pagination-bullet.swiper-pagination-bullet-active' => 'background-color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'gofly_visa_offer_style_genaral_visa_pagination_dot_bg_color_inactive',
            [
                'label'     => esc_html__('Background Color ( Inactive )', 'gofly-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .paginations .swiper-pagination-bullet' => 'background-color: {{VALUE}};',
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
                var swiper = new Swiper(".home8-visa-slider", {
                    slidesPerView: 1,
                    speed: 1500,
                    spaceBetween: 24,
                    autoplay: {
                        delay: 2500, // Autoplay duration in milliseconds
                        disableOnInteraction: false,
                    },
                    pagination: {
                        el: ".swiper-pagination2",
                        clickable: true,
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
                            spaceBetween: 15,
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

        <div class="home8-visa-slider-section">
            <div class="container">
                <div class="row justify-content-center mb-50 wow animate fadeInDown" data-wow-delay="200ms" data-wow-duration="1500ms">
                    <div class="col-lg-6">
                        <div class="section-title text-center">
                            <?php if (!empty($settings['gofly_visa_offer_genaral_title'])): ?>
                                <h2><?php echo esc_html($settings['gofly_visa_offer_genaral_title']); ?></h2>
                            <?php endif; ?>
                            <?php if (!empty($settings['gofly_visa_offer_genaral_description'])): ?>
                                <p><?php echo esc_html($settings['gofly_visa_offer_genaral_description']); ?></p>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
                <div class="row mb-40">
                    <div class="col-lg-12">
                        <div class="swiper home8-visa-slider">
                            <div class="swiper-wrapper">
                                <?php foreach ($settings['gofly_visa_offer_genaral_service_list'] as $service): ?>
                                    <div class="swiper-slide">
                                        <div class="visa-card">
                                            <?php if (!empty($service['gofly_visa_offer_genaral_service_image']['url'])): ?>
                                                <div class="visa-img">
                                                    <img src="<?php echo esc_url($service['gofly_visa_offer_genaral_service_image']['url']); ?>" alt="<?php echo esc_attr__('service-image', 'gofly-core'); ?>">
                                                </div>
                                            <?php endif; ?>
                                            <div class="content">
                                                <?php if (!empty($service['gofly_visa_offer_genaral_service_title'])): ?>
                                                    <h4><a href="<?php echo esc_url($service['gofly_visa_offer_genaral_service_title_link']['url']); ?>"><?php echo esc_html($service['gofly_visa_offer_genaral_service_title']); ?></a></h4>
                                                <?php endif; ?>
                                                <?php if (!empty($service['gofly_visa_offer_genaral_service_description'])): ?>
                                                    <p><?php echo esc_html($service['gofly_visa_offer_genaral_service_description']); ?></p>
                                                <?php endif; ?>
                                            </div>
                                        </div>
                                    </div>
                                <?php endforeach; ?>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-12 d-flex justify-content-center">
                        <div class="swiper-pagination2 paginations two"></div>
                    </div>
                </div>
            </div>
        </div>


<?php

    }
}

Plugin::instance()->widgets_manager->register(new Gofly_Visa_Offer_Widget());
