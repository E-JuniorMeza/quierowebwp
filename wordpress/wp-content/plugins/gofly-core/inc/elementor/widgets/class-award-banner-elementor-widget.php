<?php

namespace Elementor;

if (!defined('ABSPATH')) exit;  // Exit if accessed directly

use Elementor\core\Schemes;
use Egns_Core\Egns_Helper;

class Gofly_Award_Banner_Widget extends Widget_Base
{

    public function get_name()
    {
        return 'gofly_award_banner';
    }

    public function get_title()
    {
        return esc_html__('EG Award Banner', 'gofly-core');
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
            'gofly_award_banner_genaral',
            [
                'label' => esc_html__('General', 'gofly-core')
            ]
        );
        $this->add_control(
            'gofly_award_banner_select_style',
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
            'gofly_award_banner_genaral_bg_image',
            [
                'label'   => __('Background Image', 'gofly-core'),
                'type'    => \Elementor\Controls_Manager::MEDIA,
                'default' => [
                    'url' => \Elementor\Utils::get_placeholder_image_src(),
                ],
            ]
        );

        $this->add_control(
            'gofly_award_banner_genaral_rating_area',
            [
                'label'     => esc_html__('Rating Area', 'gofly-core'),
                'type'      => \Elementor\Controls_Manager::HEADING,
                'separator' => 'after',
            ]
        );

        $this->add_control(
            'gofly_award_banner_genaral_rating_area_icon_image',
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
            'gofly_award_banner_genaral_rating_area_title',
            [
                'label'       => esc_html__('Title', 'gofly-core'),
                'type'        => \Elementor\Controls_Manager::TEXT,
                'default'     => 'The World Travel Award',
                'placeholder' => esc_html__('write your title here', 'gofly-core'),
                'label_block' => true,
            ]
        );
        $this->add_control(
            'gofly_award_banner_genaral_rating_area_desc',
            [
                'label'       => esc_html__('Description', 'gofly-core'),
                'type'        => \Elementor\Controls_Manager::TEXTAREA,
                'default'     => 'We are proud to have achieved an impressive 4.5-star rating on Tripadvisor, based on hundreds of real traveler reviews.',
                'placeholder' => esc_html__('write your description here', 'gofly-core'),
                'label_block' => true,
                'condition'   => [
                    'gofly_award_banner_select_style' => 'two',
                ],
            ]
        );

        $this->add_control(
            'gofly_award_banner_genaral_rating_area_review_rating',
            [
                'label'   => esc_html__('Rating', 'gofly-core'),
                'type'    => Controls_Manager::NUMBER,
                'min'     => 0,
                'max'     => 5,
                'step'    => 1,
                'default' => 5,
                'dynamic' => [
                    'active' => true,
                ],
                'condition' => [
                    'gofly_award_banner_select_style' => 'one',
                ],
            ]
        );

        $this->add_control(
            'gofly_award_banner_genaral_banner_area',
            [
                'label'     => esc_html__('Banner Area', 'gofly-core'),
                'type'      => \Elementor\Controls_Manager::HEADING,
                'separator' => 'after',
            ]
        );

        $this->add_control(
            'gofly_award_banner_genaral_banner_area_subtitle_one',
            [
                'label'       => esc_html__('Subtitle One', 'gofly-core'),
                'type'        => \Elementor\Controls_Manager::TEXT,
                'default'     => 'World-Wide',
                'placeholder' => esc_html__('write your subtitle here', 'gofly-core'),
                'label_block' => true,
                'condition'   => [
                    'gofly_award_banner_select_style' => 'one',
                ],
            ]
        );

        $this->add_control(
            'gofly_award_banner_genaral_banner_area_title_one',
            [
                'label'       => esc_html__('Title', 'gofly-core'),
                'type'        => \Elementor\Controls_Manager::TEXT,
                'default'     => wp_kses('BEST <span>BEST</span>', wp_kses_allowed_html('post')),
                'placeholder' => esc_html__('write your title here', 'gofly-core'),
                'label_block' => true,
                'condition'   => [
                    'gofly_award_banner_select_style' => 'one',
                ],
            ]
        );

        $this->add_control(
            'gofly_award_banner_genaral_banner_area_subtitle_two',
            [
                'label'       => esc_html__('Subtitle Two', 'gofly-core'),
                'type'        => \Elementor\Controls_Manager::TEXT,
                'default'     => 'Travel agency',
                'placeholder' => esc_html__('write your subtitle two here', 'gofly-core'),
                'label_block' => true,
                'condition'   => [
                    'gofly_award_banner_select_style' => 'one',
                ],
            ]
        );

        $this->add_control(
            'gofly_award_banner_genaral_banner_area_button_label',
            [
                'label'       => esc_html__('Button Label', 'gofly-core'),
                'type'        => \Elementor\Controls_Manager::TEXT,
                'default'     => esc_html__('View All Package', 'gofly-core'),
                'placeholder' => esc_html__('write your label here', 'gofly-core'),
                'label_block' => true,
            ]
        );

        $this->add_control(
            'gofly_award_banner_genaral_banner_area_button_label_link',
            [
                'label'       => esc_html__('Button Link/URL', 'gofly-core'),
                'type'        => \Elementor\Controls_Manager::URL,
                'default'     => ['url' => '#'],
                'placeholder' => esc_html__('write your url here', 'gofly-core'),
                'label_block' => true,
            ]
        );


        $this->end_controls_section();

        //============Style One Start=============//

        $this->start_controls_section(
            'gofly_award_banner_style_genaral',
            [
                'label' => esc_html__('Styles', 'gofly-core'),
                'tab'   => Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_control(
            'gofly_award_banner_style_genaral_award_rating_area',
            [
                'label'     => esc_html__('Award Rating Area', 'gofly-core'),
                'type'      => \Elementor\Controls_Manager::HEADING,
                'separator' => 'before',
            ]
        );

        $this->add_control(
            'gofly_award_banner_style_genaral_award_rating_area_title',
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
                'name'     => 'gofly_award_banner_style_genaral_award_rating_area_title_typ',
                'selector' => '{{WRAPPER}} .home2-award-banner-section .banner-content .award-rating-area h4',

            ]
        );

        $this->add_control(
            'gofly_award_banner_style_genaral_award_rating_area_title_color',
            [
                'label'     => esc_html__('Color', 'gofly-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .home2-award-banner-section .banner-content .award-rating-area h4' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'gofly_award_banner_style_genaral_award_rating_area_rating_icon',
            [
                'label'     => esc_html__('Rating Icon', 'gofly-core'),
                'type'      => \Elementor\Controls_Manager::HEADING,
                'separator' => 'after',
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'label'    => esc_html__('Typography', 'gofly-core'),
                'name'     => 'gofly_award_banner_style_genaral_award_rating_area_rating_icon_typ',
                'selector' => '{{WRAPPER}} .home2-award-banner-section .banner-content .award-rating-area .rating ul li i',

            ]
        );

        $this->add_control(
            'gofly_award_banner_style_genaral_award_rating_area_rating_icon_color',
            [
                'label'     => esc_html__('Color', 'gofly-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .home2-award-banner-section .banner-content .award-rating-area .rating ul li i' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'gofly_award_banner_style_genaral_award_rating_area_rating_icon_span_color',
            [
                'label'     => esc_html__('Span Color', 'gofly-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .home2-award-banner-section .banner-content .award-rating-area .rating span' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'gofly_award_banner_style_genaral_award_rating_content_area',
            [
                'label'     => esc_html__('Content Area', 'gofly-core'),
                'type'      => \Elementor\Controls_Manager::HEADING,
                'separator' => 'before',
            ]
        );


        $this->add_control(
            'gofly_award_banner_style_genaral_award_rating_content_area_border_color',
            [
                'label'     => esc_html__('Border Color', 'gofly-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .primary-btn1' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'gofly_award_banner_style_genaral_award_rating_content_area_subtitle',
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
                'name'     => 'gofly_award_banner_style_genaral_award_rating_content_area_subtitle_typ',
                'selector' => '{{WRAPPER}} .home2-award-banner-section .banner-content h3',

            ]
        );

        $this->add_control(
            'gofly_award_banner_style_genaral_award_rating_content_area_subtitle_color',
            [
                'label'     => esc_html__('Color', 'gofly-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .home2-award-banner-section .banner-content h3' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'gofly_award_banner_style_genaral_award_rating_content_area_title',
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
                'name'     => 'gofly_award_banner_style_genaral_award_rating_content_area_title_typ',
                'selector' => '{{WRAPPER}} .home2-award-banner-section .banner-content h2',

            ]
        );

        $this->add_control(
            'gofly_award_banner_style_genaral_award_rating_content_area_title_color',
            [
                'label'     => esc_html__('Color', 'gofly-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .home2-award-banner-section .banner-content h2' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'gofly_award_banner_style_genaral_award_rating_content_area_title_span_colorr',
            [
                'label'     => esc_html__('Span Color', 'gofly-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .home2-award-banner-section .banner-content h2 span' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'gofly_award_banner_style_genaral_award_rating_content_area_title_span_border_color',
            [
                'label'     => esc_html__('Span Border Color', 'gofly-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .home2-award-banner-section .banner-content h2 span' => '-webkit-text-stroke: 2px {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'gofly_award_banner_style_genaral_award_rating_content_area_subtitle_two',
            [
                'label'     => esc_html__('Subtitle Two', 'gofly-core'),
                'type'      => \Elementor\Controls_Manager::HEADING,
                'separator' => 'after',
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'label'    => esc_html__('Typography', 'gofly-core'),
                'name'     => 'gofly_award_banner_style_genaral_award_rating_content_area_subtitle_two_typ',
                'selector' => '{{WRAPPER}} .home2-award-banner-section .banner-content > span',

            ]
        );

        $this->add_control(
            'gofly_award_banner_style_genaral_award_rating_content_area_subtitle_two_color',
            [
                'label'     => esc_html__('Color', 'gofly-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .home2-award-banner-section .banner-content > span' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'gofly_award_banner_style_genaral_award_rating_content_area_button',
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
                'name'     => 'gofly_award_banner_style_genaral_award_rating_content_area_button_typ',
                'selector' => '{{WRAPPER}} .primary-btn1',

            ]
        );

        $this->add_control(
            'gofly_award_banner_style_genaral_award_rating_content_area_button_color',
            [
                'label'     => esc_html__('Color', 'gofly-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .primary-btn1' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'gofly_award_banner_style_genaral_award_rating_content_area_button_hover_color',
            [
                'label'     => esc_html__('Hover Color', 'gofly-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .primary-btn1:hover' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'gofly_award_banner_style_genaral_award_rating_content_area_button_icon_color',
            [
                'label'     => esc_html__('Icon Color', 'gofly-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .primary-btn1 > span svg' => 'fill: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'gofly_award_banner_style_genaral_award_rating_content_area_button_hover_icon_color',
            [
                'label'     => esc_html__('Hover Icon Color', 'gofly-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .primary-btn1:hover > span svg' => 'fill: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'gofly_award_banner_style_genaral_award_rating_content_area_button_bg_color',
            [
                'label'     => esc_html__('Background Color', 'gofly-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .primary-btn1' => 'background-color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'gofly_award_banner_style_genaral_award_rating_content_area_button_hover_bg_color',
            [
                'label'     => esc_html__('Hover Background Color', 'gofly-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .primary-btn1::after' => 'background-color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'gofly_award_banner_style_genaral_award_rating_content_area_vector_one',
            [
                'label'     => esc_html__('Vector Image', 'gofly-core'),
                'type'      => \Elementor\Controls_Manager::HEADING,
                'separator' => 'after',
            ]
        );

        $this->add_control(
            'gofly_award_banner_style_genaral_award_rating_content_area_vector_one_color',
            [
                'label'     => esc_html__('Border Color', 'gofly-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .home2-award-banner-section .banner-content .vector' => 'border: 1px solid {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'gofly_award_banner_style_genaral_award_rating_content_area_vector_one_dot_color',
            [
                'label'     => esc_html__('Dot Color One', 'gofly-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .home2-award-banner-section .banner-content .vector::before' => 'background-color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'gofly_award_banner_style_genaral_award_rating_content_area_vector_one_dot_color_two',
            [
                'label'     => esc_html__('Dot Color Two', 'gofly-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .home2-award-banner-section .banner-content .vector::after' => 'background-color: {{VALUE}};',
                ],
            ]
        );

        $this->end_controls_section();
    }
    protected function render()
    {

        $settings = $this->get_settings_for_display();

        $bg_img       = $settings['gofly_award_banner_genaral_bg_image']['url'] ?? '';
        $style_bg_img = 'style="background-image: linear-gradient(180deg, rgba(0, 0, 0, 0.25) 0%, rgba(0, 0, 0, 0.25) 100%), url(' . esc_url($bg_img) . ')"';

?>

        <?php if ('one' == $settings['gofly_award_banner_select_style']): ?>
            <div class="home2-award-banner-section" <?php echo ($style_bg_img) ?>>
                <div class="container">
                    <div class="banner-content">
                        <div class="award-rating-area">
                            <?php if (!empty($settings['gofly_award_banner_genaral_rating_area_icon_image']['url'])): ?>
                                <img src="<?php echo esc_url($settings['gofly_award_banner_genaral_rating_area_icon_image']['url']); ?>" alt="<?php echo esc_attr__('icon-image', 'gofly-core'); ?>">
                            <?php endif; ?>
                            <?php if (!empty($settings['gofly_award_banner_genaral_rating_area_title'])): ?>
                                <h4><?php echo esc_html($settings['gofly_award_banner_genaral_rating_area_title']); ?></h4>
                            <?php endif; ?>
                            <div class="rating">
                                <span>(</span>
                                <ul class="rating-star">
                                    <?php $rank_counter = intval($settings['gofly_award_banner_genaral_rating_area_review_rating']);
                                    $rank_counter = max(0, min(5, $rank_counter)); ?>
                                    <?php for ($i = 1; $i <= 5; $i++): ?>
                                        <?php if ($i <= $rank_counter) : ?>
                                            <li><i class="bi bi-star-fill"></i></li>
                                        <?php endif ?>
                                    <?php endfor; ?>
                                </ul>
                                <span>)</span>
                            </div>
                        </div>
                        <?php if (!empty($settings['gofly_award_banner_genaral_banner_area_subtitle_one'])): ?>
                            <h3><?php echo esc_html($settings['gofly_award_banner_genaral_banner_area_subtitle_one']); ?></h3>
                        <?php endif; ?>
                        <?php if (!empty($settings['gofly_award_banner_genaral_banner_area_title_one'])): ?>
                            <h2><?php echo wp_kses($settings['gofly_award_banner_genaral_banner_area_title_one'], wp_kses_allowed_html('post')); ?></h2>
                        <?php endif; ?>
                        <?php if (!empty($settings['gofly_award_banner_genaral_banner_area_subtitle_two'])): ?>
                            <span><?php echo esc_html($settings['gofly_award_banner_genaral_banner_area_subtitle_two']); ?></span>
                        <?php endif; ?>
                        <?php if (!empty($settings['gofly_award_banner_genaral_banner_area_button_label'])): ?>
                            <a href="<?php echo esc_url($settings['gofly_award_banner_genaral_banner_area_button_label_link']['url']); ?>" class="primary-btn1 two">
                                <span>
                                    <?php echo esc_html($settings['gofly_award_banner_genaral_banner_area_button_label']); ?>
                                    <svg width="10" height="10" viewBox="0 0 10 10" xmlns="http://www.w3.org/2000/svg">
                                        <path
                                            d="M9.73535 1.14746C9.57033 1.97255 9.32924 3.26406 9.24902 4.66797C9.16817 6.08312 9.25559 7.5453 9.70214 8.73633C9.84754 9.12406 9.65129 9.55659 9.26367 9.70215C8.9001 9.83849 8.4969 9.67455 8.32812 9.33398L8.29785 9.26367L8.19921 8.98438C7.73487 7.5758 7.67054 5.98959 7.75097 4.58203C7.77875 4.09598 7.82525 3.62422 7.87988 3.17969L1.53027 9.53027C1.23738 9.82317 0.762615 9.82317 0.469722 9.53027C0.176829 9.23738 0.176829 8.76262 0.469722 8.46973L6.83593 2.10254C6.3319 2.16472 5.79596 2.21841 5.25 2.24902C3.8302 2.32862 2.2474 2.26906 0.958003 1.79102L0.704097 1.68945L0.635738 1.65527C0.303274 1.47099 0.157578 1.06102 0.310542 0.704102C0.463655 0.347333 0.860941 0.170391 1.22363 0.28418L1.29589 0.310547L1.48828 0.387695C2.47399 0.751207 3.79966 0.827571 5.16601 0.750977C6.60111 0.670504 7.97842 0.428235 8.86132 0.262695L9.95312 0.0585938L9.73535 1.14746Z" />
                                    </svg>
                                </span>
                                <span>
                                    <?php echo esc_html($settings['gofly_award_banner_genaral_banner_area_button_label']); ?>
                                    <svg width="10" height="10" viewBox="0 0 10 10" xmlns="http://www.w3.org/2000/svg">
                                        <path
                                            d="M9.73535 1.14746C9.57033 1.97255 9.32924 3.26406 9.24902 4.66797C9.16817 6.08312 9.25559 7.5453 9.70214 8.73633C9.84754 9.12406 9.65129 9.55659 9.26367 9.70215C8.9001 9.83849 8.4969 9.67455 8.32812 9.33398L8.29785 9.26367L8.19921 8.98438C7.73487 7.5758 7.67054 5.98959 7.75097 4.58203C7.77875 4.09598 7.82525 3.62422 7.87988 3.17969L1.53027 9.53027C1.23738 9.82317 0.762615 9.82317 0.469722 9.53027C0.176829 9.23738 0.176829 8.76262 0.469722 8.46973L6.83593 2.10254C6.3319 2.16472 5.79596 2.21841 5.25 2.24902C3.8302 2.32862 2.2474 2.26906 0.958003 1.79102L0.704097 1.68945L0.635738 1.65527C0.303274 1.47099 0.157578 1.06102 0.310542 0.704102C0.463655 0.347333 0.860941 0.170391 1.22363 0.28418L1.29589 0.310547L1.48828 0.387695C2.47399 0.751207 3.79966 0.827571 5.16601 0.750977C6.60111 0.670504 7.97842 0.428235 8.86132 0.262695L9.95312 0.0585938L9.73535 1.14746Z" />
                                    </svg>
                                </span>
                            </a>
                        <?php endif; ?>
                        <span class="vector"></span>
                        <span class="vector two"></span>
                    </div>
                </div>
            </div>
        <?php endif; ?>


        <?php if ('two' == $settings['gofly_award_banner_select_style']): ?>
            <div class="home9-operator-banner-section" <?php echo ($style_bg_img) ?>>
                <div class=" container">
                    <div class="row justify-content-center">
                        <div class="col-lg-8 wow animate fadeInDown" data-wow-delay="200ms" data-wow-duration="1500ms">
                            <div class="operator-banner-wrapper">
                                <?php if (!empty($settings['gofly_award_banner_genaral_rating_area_icon_image']['url'])): ?>
                                    <img src="<?php echo esc_url($settings['gofly_award_banner_genaral_rating_area_icon_image']['url']); ?>" alt="<?php echo esc_attr__('icon-image', 'gofly-core'); ?>">
                                <?php endif; ?>
                                <div class="operator-banner-conntent">
                                    <h2><?php echo esc_html($settings['gofly_award_banner_genaral_rating_area_title']); ?></h2>
                                    <p><?php echo esc_html($settings['gofly_award_banner_genaral_rating_area_desc']) ?></p>
                                </div>
                                <?php if (!empty($settings['gofly_award_banner_genaral_banner_area_button_label'])): ?>
                                    <a class="primary-btn1 two" href="/travel-package-01">
                                        <span>
                                            <?php echo esc_html($settings['gofly_award_banner_genaral_banner_area_button_label']); ?>
                                            <svg width="10" height="10" viewBox="0 0 10 10" xmlns="http://www.w3.org/2000/svg">
                                                <path
                                                    d="M9.73535 1.14746C9.57033 1.97255 9.32924 3.26406 9.24902 4.66797C9.16817 6.08312 9.25559 7.5453 9.70214 8.73633C9.84754 9.12406 9.65129 9.55659 9.26367 9.70215C8.9001 9.83849 8.4969 9.67455 8.32812 9.33398L8.29785 9.26367L8.19921 8.98438C7.73487 7.5758 7.67054 5.98959 7.75097 4.58203C7.77875 4.09598 7.82525 3.62422 7.87988 3.17969L1.53027 9.53027C1.23738 9.82317 0.762615 9.82317 0.469722 9.53027C0.176829 9.23738 0.176829 8.76262 0.469722 8.46973L6.83593 2.10254C6.3319 2.16472 5.79596 2.21841 5.25 2.24902C3.8302 2.32862 2.2474 2.26906 0.958003 1.79102L0.704097 1.68945L0.635738 1.65527C0.303274 1.47099 0.157578 1.06102 0.310542 0.704102C0.463655 0.347333 0.860941 0.170391 1.22363 0.28418L1.29589 0.310547L1.48828 0.387695C2.47399 0.751207 3.79966 0.827571 5.16601 0.750977C6.60111 0.670504 7.97842 0.428235 8.86132 0.262695L9.95312 0.0585938L9.73535 1.14746Z">
                                                </path>
                                            </svg>
                                        </span>
                                        <span>
                                            <?php echo esc_html($settings['gofly_award_banner_genaral_banner_area_button_label']); ?>
                                            <svg width="10" height="10" viewBox="0 0 10 10" xmlns="http://www.w3.org/2000/svg">
                                                <path
                                                    d="M9.73535 1.14746C9.57033 1.97255 9.32924 3.26406 9.24902 4.66797C9.16817 6.08312 9.25559 7.5453 9.70214 8.73633C9.84754 9.12406 9.65129 9.55659 9.26367 9.70215C8.9001 9.83849 8.4969 9.67455 8.32812 9.33398L8.29785 9.26367L8.19921 8.98438C7.73487 7.5758 7.67054 5.98959 7.75097 4.58203C7.77875 4.09598 7.82525 3.62422 7.87988 3.17969L1.53027 9.53027C1.23738 9.82317 0.762615 9.82317 0.469722 9.53027C0.176829 9.23738 0.176829 8.76262 0.469722 8.46973L6.83593 2.10254C6.3319 2.16472 5.79596 2.21841 5.25 2.24902C3.8302 2.32862 2.2474 2.26906 0.958003 1.79102L0.704097 1.68945L0.635738 1.65527C0.303274 1.47099 0.157578 1.06102 0.310542 0.704102C0.463655 0.347333 0.860941 0.170391 1.22363 0.28418L1.29589 0.310547L1.48828 0.387695C2.47399 0.751207 3.79966 0.827571 5.16601 0.750977C6.60111 0.670504 7.97842 0.428235 8.86132 0.262695L9.95312 0.0585938L9.73535 1.14746Z">
                                                </path>
                                            </svg>
                                        </span>
                                    </a>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        <?php endif; ?>

<?php

    }
}

Plugin::instance()->widgets_manager->register(new Gofly_Award_Banner_Widget());
