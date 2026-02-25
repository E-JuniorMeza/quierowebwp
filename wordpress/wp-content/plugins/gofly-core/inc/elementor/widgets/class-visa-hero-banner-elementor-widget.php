<?php

namespace Elementor;

if (!defined('ABSPATH')) exit;  // Exit if accessed directly

use Elementor\core\Schemes;
use Egns_Core\Egns_Helper;

class Gofly_Visa_Hero_Banner_Widget extends Widget_Base
{

    public function get_name()
    {
        return 'gofly_visa_hero_banner';
    }

    public function get_title()
    {
        return esc_html__('EG Visa Hero Banner', 'gofly-core');
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
            'gofly_visa_hero_banner_genaral',
            [
                'label' => esc_html__('General', 'gofly-core')
            ]
        );

        $this->add_control(
            'gofly_visa_hero_banner_genaral_subtitle',
            [
                'label'       => esc_html__('Subtitle', 'gofly-core'),
                'type'        => \Elementor\Controls_Manager::TEXT,
                'default'     => esc_html__('#1 Visa Processing Agency.', 'gofly-core'),
                'placeholder' => esc_html__('write your subtitle here', 'gofly-core'),
                'label_block' => true,
            ]
        );

        $this->add_control(
            'gofly_visa_hero_banner_genaral_title',
            [
                'label'       => esc_html__('Title', 'gofly-core'),
                'type'        => \Elementor\Controls_Manager::TEXT,
                'default'     => wp_kses('Fast &amp; Hassle- <br> Free Visa Processing.', wp_kses_allowed_html('post')),
                'placeholder' => esc_html__('write your title here', 'gofly-core'),
                'label_block' => true,
            ]
        );

        $this->add_control(
            'gofly_hero_banner_slider_genaral_description',
            [
                'label'       => esc_html__('Description', 'gofly-core'),
                'type'        => \Elementor\Controls_Manager::TEXTAREA,
                'default'     => wp_kses("We’re Expert Assistance for Smooth Visa Approvals to <span>100+ Destinations.</span>", wp_kses_allowed_html('post')),
                'placeholder' => esc_html__('write your title here', 'gofly-core'),
                'label_block' => true,
            ]
        );

        $this->add_control(
            'gofly_hero_banner_slider_genaral_award_btn_content',
            [
                'label'     => esc_html__('Award And Button', 'gofly-core'),
                'type'      => \Elementor\Controls_Manager::HEADING,
                'separator' => 'after',
            ]
        );

        $this->add_control(
            'gofly_hero_banner_slider_genaral_award_btn_content_icon_image',
            [
                'label'   => esc_html__('Icon Image', 'gofly-core'),
                'type'    => \Elementor\Controls_Manager::MEDIA,
                'default' => [
                    'url' => \Elementor\Utils::get_placeholder_image_src(),
                ],
                'media_types' => ['image', 'svg'],
            ]
        );


        $this->add_control(
            'gofly_hero_banner_slider_genaral_award_button',
            [
                'label'       => esc_html__('Button Text', 'gofly-core'),
                'type'        => \Elementor\Controls_Manager::TEXT,
                'default'     => esc_html__('Schedule a Consultation', 'gofly-core'),
                'placeholder' => esc_html__('write your button text here', 'gofly-core'),
                'label_block' => true,
            ]
        );

        $this->add_control(
            'gofly_hero_banner_slider_genaral_award_button_url',
            [
                'label'   => esc_html__('Button URL/Link', 'gofly-core'),
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
            'gofly_hero_banner_slider_genaral_award_button_note',
            [
                'label'       => esc_html__('Button Note', 'gofly-core'),
                'type'        => \Elementor\Controls_Manager::TEXT,
                'default'     => esc_html__('** 30 mints free consultation with GoFly', 'gofly-core'),
                'placeholder' => esc_html__('write your note text here', 'gofly-core'),
                'label_block' => true,
            ]
        );

        $this->add_control(
            'gofly_hero_banner_slider_genaral_award_btn_content_vector_image',
            [
                'label'   => esc_html__('Vector Image', 'gofly-core'),
                'type'    => \Elementor\Controls_Manager::MEDIA,
                'default' => [
                    'url' => \Elementor\Utils::get_placeholder_image_src(),
                ],
                'media_types' => ['image', 'svg'],
            ]
        );


        $this->add_control(
            'gofly_hero_banner_slider_genaral_award_btn_content_banner_image',
            [
                'label'   => esc_html__('Banner Image', 'gofly-core'),
                'type'    => \Elementor\Controls_Manager::MEDIA,
                'default' => [
                    'url' => \Elementor\Utils::get_placeholder_image_src(),
                ],
                'media_types' => ['image'],
            ]
        );

        $this->end_controls_section();

        //=====================Style Start=======================//

        $this->start_controls_section(
            'gofly_hero_banner_slider_style_genaral',
            [
                'label' => esc_html__('Styles', 'gofly-core'),
                'tab'   => Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_control(
            'gofly_hero_banner_slider_style_genaral_subtitle',
            [
                'label'     => esc_html__('Subtitle', 'gofly-core'),
                'type'      => \Elementor\Controls_Manager::HEADING,
                'separator' => 'after',
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'label'    => esc_html__('Typography', 'gofly-core'),
                'name'     => 'gofly_hero_banner_slider_style_genaral_subtitle_typ',
                'selector' => '{{WRAPPER}} .home8-banner-section .banner-content-wrapper .banner-title-area > span',

            ]
        );

        $this->add_control(
            'gofly_hero_banner_slider_style_genaral_subtitle_color',
            [
                'label'     => esc_html__('Color', 'gofly-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .home8-banner-section .banner-content-wrapper .banner-title-area > span' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'gofly_hero_banner_slider_style_genaral_title',
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
                'name'     => 'gofly_hero_banner_slider_style_genaral_title_typ',
                'selector' => '{{WRAPPER}} .home8-banner-section .banner-content-wrapper .banner-title-area h1',

            ]
        );

        $this->add_control(
            'gofly_hero_banner_slider_style_genaral_title_color',
            [
                'label'     => esc_html__('Color', 'gofly-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .home8-banner-section .banner-content-wrapper .banner-title-area h1' => 'color: {{VALUE}};',
                ],
            ]
        );


        $this->add_control(
            'gofly_hero_banner_slider_style_genaral_description',
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
                'name'     => 'gofly_hero_banner_slider_style_genaral_description_typ',
                'selector' => '{{WRAPPER}} .home8-banner-section .banner-content-wrapper .banner-title-area p',

            ]
        );

        $this->add_control(
            'gofly_hero_banner_slider_style_genaral_description_color',
            [
                'label'     => esc_html__('Color', 'gofly-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .home8-banner-section .banner-content-wrapper .banner-title-area p' => 'color: {{VALUE}};',
                ],
            ]
        );


        $this->add_control(
            'gofly_hero_banner_slider_style_genaral_award_btn_area',
            [
                'label'     => esc_html__('Award And Button', 'gofly-core'),
                'type'      => \Elementor\Controls_Manager::HEADING,
                'separator' => 'before',
            ]
        );


        $this->add_control(
            'gofly_hero_banner_slider_style_genaral_award_btn_area_btn',
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
                'name'     => 'gofly_hero_banner_slider_style_genaral_award_btn_area_btn_typ',
                'selector' => '{{WRAPPER}} .primary-btn1',

            ]
        );

        $this->add_control(
            'gofly_hero_banner_slider_style_genaral_award_btn_area_btn_color',
            [
                'label'     => esc_html__('Color', 'gofly-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .primary-btn1' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'gofly_hero_banner_slider_style_genaral_award_btn_area_btn_hover_color',
            [
                'label'     => esc_html__('Hover Color', 'gofly-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .primary-btn1:hover' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'gofly_hero_banner_slider_style_genaral_award_btn_area_btn_icon_color',
            [
                'label'     => esc_html__('Icon Color', 'gofly-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .primary-btn1 > span svg' => 'fill: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'gofly_hero_banner_slider_style_genaral_award_btn_area_btn_icon_hover_color',
            [
                'label'     => esc_html__('Hover Icon Color', 'gofly-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .primary-btn1:hover > span svg' => 'fill: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'gofly_hero_banner_slider_style_genaral_award_btn_area_btn_bg_color',
            [
                'label'     => esc_html__('Background Color', 'gofly-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .primary-btn1.five' => 'background-color: {{VALUE}};',
                ],
            ]
        );


        $this->add_control(
            'gofly_hero_banner_slider_style_genaral_award_btn_area_btn_bg_hover_color',
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

        $settings = $this->get_settings_for_display();

?>
        <div class="home8-banner-section">
            <div class="banner-content-wrapper">
                <div class="container">
                    <div class="row gy-5 justify-content-between">
                        <div class="col-xl-6 col-lg-8">
                            <div class="banner-title-area">
                                <?php if (!empty($settings['gofly_visa_hero_banner_genaral_subtitle'])): ?>
                                    <span><?php echo esc_html($settings['gofly_visa_hero_banner_genaral_subtitle']); ?></span>
                                <?php endif; ?>
                                <?php if (!empty($settings['gofly_visa_hero_banner_genaral_title'])): ?>
                                    <h1><?php echo wp_kses($settings['gofly_visa_hero_banner_genaral_title'], wp_kses_allowed_html('post'));  ?></h1>
                                <?php endif; ?>
                                <?php if (!empty($settings['gofly_hero_banner_slider_genaral_description'])): ?>
                                    <p><?php echo wp_kses($settings['gofly_hero_banner_slider_genaral_description'], wp_kses_allowed_html('post'));  ?></p>
                                <?php endif; ?>
                            </div>
                        </div>
                        <div class="col-lg-3 d-flex justify-content-lg-end">
                            <div class="award-and-btn-area">
                                <?php if (!empty($settings['gofly_hero_banner_slider_genaral_award_btn_content_icon_image']['url'])): ?>
                                    <img src="<?php echo esc_url($settings['gofly_hero_banner_slider_genaral_award_btn_content_icon_image']['url']); ?>" alt="<?php echo esc_attr__('icon-image', 'gofly-core'); ?>">
                                <?php endif; ?>
                                <?php if (!empty($settings['gofly_hero_banner_slider_genaral_award_button'])): ?>
                                    <a href="<?php echo esc_url($settings['gofly_hero_banner_slider_genaral_award_button_url']['url']); ?>" class="primary-btn1 five">
                                        <span>
                                            <?php echo esc_html($settings['gofly_hero_banner_slider_genaral_award_button']); ?>
                                            <svg width="10" height="10" viewBox="0 0 10 10" xmlns="http://www.w3.org/2000/svg">
                                                <path d="M9.73535 1.14746C9.57033 1.97255 9.32924 3.26406 9.24902 4.66797C9.16817 6.08312 9.25559 7.5453 9.70214 8.73633C9.84754 9.12406 9.65129 9.55659 9.26367 9.70215C8.9001 9.83849 8.4969 9.67455 8.32812 9.33398L8.29785 9.26367L8.19921 8.98438C7.73487 7.5758 7.67054 5.98959 7.75097 4.58203C7.77875 4.09598 7.82525 3.62422 7.87988 3.17969L1.53027 9.53027C1.23738 9.82317 0.762615 9.82317 0.469722 9.53027C0.176829 9.23738 0.176829 8.76262 0.469722 8.46973L6.83593 2.10254C6.3319 2.16472 5.79596 2.21841 5.25 2.24902C3.8302 2.32862 2.2474 2.26906 0.958003 1.79102L0.704097 1.68945L0.635738 1.65527C0.303274 1.47099 0.157578 1.06102 0.310542 0.704102C0.463655 0.347333 0.860941 0.170391 1.22363 0.28418L1.29589 0.310547L1.48828 0.387695C2.47399 0.751207 3.79966 0.827571 5.16601 0.750977C6.60111 0.670504 7.97842 0.428235 8.86132 0.262695L9.95312 0.0585938L9.73535 1.14746Z"></path>
                                            </svg>
                                        </span>
                                        <span>
                                            <?php echo esc_html($settings['gofly_hero_banner_slider_genaral_award_button']); ?>
                                            <svg width="10" height="10" viewBox="0 0 10 10" xmlns="http://www.w3.org/2000/svg">
                                                <path d="M9.73535 1.14746C9.57033 1.97255 9.32924 3.26406 9.24902 4.66797C9.16817 6.08312 9.25559 7.5453 9.70214 8.73633C9.84754 9.12406 9.65129 9.55659 9.26367 9.70215C8.9001 9.83849 8.4969 9.67455 8.32812 9.33398L8.29785 9.26367L8.19921 8.98438C7.73487 7.5758 7.67054 5.98959 7.75097 4.58203C7.77875 4.09598 7.82525 3.62422 7.87988 3.17969L1.53027 9.53027C1.23738 9.82317 0.762615 9.82317 0.469722 9.53027C0.176829 9.23738 0.176829 8.76262 0.469722 8.46973L6.83593 2.10254C6.3319 2.16472 5.79596 2.21841 5.25 2.24902C3.8302 2.32862 2.2474 2.26906 0.958003 1.79102L0.704097 1.68945L0.635738 1.65527C0.303274 1.47099 0.157578 1.06102 0.310542 0.704102C0.463655 0.347333 0.860941 0.170391 1.22363 0.28418L1.29589 0.310547L1.48828 0.387695C2.47399 0.751207 3.79966 0.827571 5.16601 0.750977C6.60111 0.670504 7.97842 0.428235 8.86132 0.262695L9.95312 0.0585938L9.73535 1.14746Z"></path>
                                            </svg>
                                        </span>
                                    </a>
                                <?php endif; ?>
                                <?php if (!empty($settings['gofly_hero_banner_slider_genaral_award_button_note'])): ?>
                                    <span><?php echo esc_html($settings['gofly_hero_banner_slider_genaral_award_button_note']); ?></span>
                                <?php endif; ?>
                                <?php if (!empty($settings['gofly_hero_banner_slider_genaral_award_btn_content_vector_image']['url'])): ?>
                                    <img src="<?php echo esc_url($settings['gofly_hero_banner_slider_genaral_award_btn_content_vector_image']['url']); ?>" alt="<?php echo esc_attr__('vector-image', 'gofly-core'); ?>" class="vector">
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <?php if (!empty($settings['gofly_hero_banner_slider_genaral_award_btn_content_banner_image']['url'])): ?>
                <div class="banner-img" style="background-image: url(<?php echo esc_url($settings['gofly_hero_banner_slider_genaral_award_btn_content_banner_image']['url']); ?>);"></div>
            <?php endif; ?>
        </div>

<?php

    }
}

Plugin::instance()->widgets_manager->register(new Gofly_Visa_Hero_Banner_Widget());
