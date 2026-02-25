<?php

namespace Elementor;

if (!defined('ABSPATH')) exit;  // Exit if accessed directly

use Elementor\core\Schemes;
use Egns_Core\Egns_Helper;

class Gofly_Experience_Grid_Widget extends Widget_Base
{

    public function get_name()
    {
        return 'gofly_experience_grid';
    }

    public function get_title()
    {
        return esc_html__('EG Experience Grid', 'gofly-core');
    }

    public function get_icon()
    {
        return 'egns-widget-icon';
    }

    public function get_categories()
    {
        return ['gofly_exp'];
    }

    protected function register_controls()
    {

        //=====================General=======================//

        $this->start_controls_section(
            'gofly_exp_grid_cnt_section',
            [
                'label' => esc_html__('General', 'gofly-core')
            ]
        );

        $this->add_control(
            'gofly_exp_grid_title',
            [
                'label'       => esc_html__('Title', 'gofly-core'),
                'type'        => \Elementor\Controls_Manager::TEXT,
                'default'     => esc_html__('Popular Activities', 'gofly-core'),
                'placeholder' => esc_html__('Type your title here', 'gofly-core'),
                'label_block' => true,
            ]
        );
        $this->add_control(
            'gofly_exp_grid_short_desc',
            [
                'label'       => esc_html__('Short Description', 'gofly-core'),
                'type'        => \Elementor\Controls_Manager::TEXTAREA,
                'default'     => esc_html__('A curated list of the most popular travel packages based on different destinations.', 'gofly-core'),
                'placeholder' => esc_html__('Type your description here', 'gofly-core'),
                'label_block' => true,
            ]
        );

        // Post Query 
        $this->add_control(
            'gofly_exp_grid_query_area',
            [
                'label'     => esc_html__('Post Query', 'gofly-core'),
                'type'      => \Elementor\Controls_Manager::HEADING,
                'separator' => 'after',
            ]
        );
        $this->add_control(
            'gofly_exp_grid_order',
            [
                'label'   => esc_html__('Order', 'gofly-core'),
                'type'    => Controls_Manager::SELECT,
                'options' => [
                    'asc'  => esc_html__('Ascending', 'gofly-core'),
                    'desc' => esc_html__('Descending', 'gofly-core')
                ],
                'default' => 'desc',
            ]
        );
        $this->add_control(
            'gofly_exp_grid_orderby',
            [
                'label'   => esc_html__('Order By', 'gofly-core'),
                'type'    => Controls_Manager::SELECT,
                'default' => 'ID',
                'options' => [
                    'ID'         => esc_html__('Post Id', 'gofly-core'),
                    'author'     => esc_html__('Post Author', 'gofly-core'),
                    'title'      => esc_html__('Title', 'gofly-core'),
                    'post_date'  => esc_html__('Date', 'gofly-core'),
                    'rand'       => esc_html__('Random', 'gofly-core'),
                    'menu_order' => esc_html__('Menu Order', 'gofly-core'),
                ],
            ]
        );
        $this->add_control(
            'gofly_exp_grid_post_per_page',
            [
                'label'   => esc_html__('Posts Per Page', 'gofly-core'),
                'type'    => Controls_Manager::NUMBER,
                'default' => 6,
            ]
        );
        $this->add_control(
            'gofly_exp_grid_selected_type',
            [
                'label'       => esc_html__('Experience Type', 'gofly-core'),
                'type'        => \Elementor\Controls_Manager::SELECT2,
                'label_block' => true,
                'multiple'    => true,
                'options'     => \Egns_Core\Egns_Helper::get_post_terms_options('experience-type'),
                'description' => esc_html__('Show experience post only selected type', 'gofly-core'),
            ]
        );
        $this->add_control(
            'gofly_exp_grid_post_list',
            [
                'label'       => esc_html__('Experience lists', 'gofly-core'),
                'type'        => \Elementor\Controls_Manager::SELECT2,
                'label_block' => true,
                'multiple'    => true,
                'options'     => \Egns_Core\Egns_Helper::get_post_list_options('experience'),
                'description' => esc_html__('Selected posts appear only when linked to an experience type. By default, all selected posts are visible.', 'gofly-core'),
            ]
        );


        $this->end_controls_section();

        // Style Card
        $this->start_controls_section(
            'gofly_experience_grid_cnt_style',
            [
                'label' => esc_html__("Styles", 'gofly-core'),
                'tab'   => \Elementor\Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_control(
            'gofly_experience_grid_cnt_header_style',
            [
                'label'     => esc_html__('Header Area', 'gofly-core'),
                'type'      => \Elementor\Controls_Manager::HEADING,
                'separator' => 'after',
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'label'    => esc_html__('Title Typography', 'gofly-core'),
                'name'     => 'gofly_experience_grid_cnt_header_title_typ',
                'selector' => '{{WRAPPER}} .section-title h2',

            ]
        );

        $this->add_control(
            'gofly_experience_grid_cnt_header_title_color',
            [
                'label'     => esc_html__('Title Color', 'gofly-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .section-title h2' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'label'    => esc_html__('Description Typography', 'gofly-core'),
                'name'     => 'gofly_experience_grid_cnt_header_desc_typ',
                'selector' => '{{WRAPPER}} .section-title p',

            ]
        );

        $this->add_control(
            'gofly_experience_grid_cnt_header_desc_color',
            [
                'label'     => esc_html__('Description Color', 'gofly-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .section-title p' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'gofly_experience_grid_cnt_card_general_style',
            [
                'label'     => esc_html__('Card General', 'gofly-core'),
                'type'      => \Elementor\Controls_Manager::HEADING,
                'separator' => 'after',
            ]
        );

        $this->add_control(
            'gofly_experience_grid_cnt_card_bg_color',
            [
                'label'     => esc_html__('Background Color', 'gofly-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}}  .package-card' => 'background-color: {{VALUE}};',

                ],
            ]
        );
        $this->add_control(
            'gofly_experience_grid_cnt_card_border_color',
            [
                'label'     => esc_html__('Border Color', 'gofly-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}}  .package-card' => 'border-color: {{VALUE}};',

                ],
            ]
        );
        $this->add_responsive_control(
            'gofly_experience_grid_cnt_card_border_radius',
            [
                'label'      => esc_html__('Border Radius', 'gofly-core'),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%'],
                'selectors'  => [
                    '{{WRAPPER}} .package-card' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'
                ]
            ]
        );

        $this->add_control(
            'gofly_experience_grid_cnt_card_style',
            [
                'label'     => esc_html__('Card Content', 'gofly-core'),
                'type'      => \Elementor\Controls_Manager::HEADING,
                'separator' => 'after',
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'label'    => esc_html__('Title Typography', 'gofly-core'),
                'name'     => 'gofly_experience_grid_cnt_card_title_typ',
                'selector' => '{{WRAPPER}} .package-card .package-content h5 a',

            ]
        );

        $this->add_control(
            'gofly_experience_grid_cnt_card_title_color',
            [
                'label'     => esc_html__('Title Color', 'gofly-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .package-card .package-content h5 a' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'gofly_experience_grid_cnt_card_title_hover_color',
            [
                'label'     => esc_html__('Title Hover Color', 'gofly-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .package-card .package-content h5 a:hover' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'gofly_experience_grid_cnt_card_info_style',
            [
                'label'     => esc_html__('Package Info', 'gofly-core'),
                'type'      => \Elementor\Controls_Manager::HEADING,
                'separator' => 'after',
            ]
        );
        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'label'    => esc_html__('Location Typography', 'gofly-core'),
                'name'     => 'gofly_experience_grid_cnt_card_location_typ',
                'selector' => '{{WRAPPER}} .package-card .package-content .location-and-time .location a',

            ]
        );
        $this->add_control(
            'gofly_experience_grid_cnt_card_location_color',
            [
                'label'     => esc_html__('Location Color', 'gofly-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}}  .package-card .package-content .location-and-time .location a' => 'color: {{VALUE}};',

                ],
            ]
        );
        $this->add_control(
            'gofly_experience_grid_cnt_card_location_hover_color',
            [
                'label'     => esc_html__('Location Hover Color', 'gofly-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}}  .package-card .package-content .location-and-time .location a:hover' => 'color: {{VALUE}};',

                ],
            ]
        );
        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'label'    => esc_html__('Time Typography', 'gofly-core'),
                'name'     => 'gofly_experience_grid_cnt_card_days_typ',
                'selector' => '{{WRAPPER}} .package-card .package-content .location-and-time span',

            ]
        );
        $this->add_control(
            'gofly_experience_grid_cnt_card_days_color',
            [
                'label'     => esc_html__('Time Color', 'gofly-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}}  .package-card .package-content .location-and-time span' => 'color: {{VALUE}};',

                ],
            ]
        );
        $this->add_control(
            'gofly_experience_grid_cnt_card_info_separator_color',
            [
                'label'     => esc_html__('Separator Color', 'gofly-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}}  .package-card .package-content .location-and-time .arrow' => 'fill: {{VALUE}};',

                ],
            ]
        );
        $this->add_control(
            'gofly_experience_grid_cnt_card_price_style',
            [
                'label'     => esc_html__('Package Price', 'gofly-core'),
                'type'      => \Elementor\Controls_Manager::HEADING,
                'separator' => 'after',
            ]
        );
        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'label'    => esc_html__('Text Typography', 'gofly-core'),
                'name'     => 'gofly_experience_grid_cnt_card_price_lbl_typ',
                'selector' => '{{WRAPPER}} .package-card .package-content .btn-and-price-area .price-area h6',
            ]
        );
        $this->add_control(
            'gofly_experience_grid_cnt_card_price_lbl_color',
            [
                'label'     => esc_html__('Text Color', 'gofly-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}}  .package-card .package-content .btn-and-price-area .price-area h6' => 'color: {{VALUE}};',
                ],
            ]
        );
        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'label'    => esc_html__('Price Typography', 'gofly-core'),
                'name'     => 'gofly_experience_grid_cnt_card_price_typ',
                'selector' => '{{WRAPPER}} .package-card .package-content .btn-and-price-area .price-area span',

            ]
        );
        $this->add_control(
            'gofly_experience_grid_cnt_card_price_color',
            [
                'label'     => esc_html__('Price Color', 'gofly-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}}  .package-card .package-content .btn-and-price-area .price-area span' => 'color: {{VALUE}};',
                ],
            ]
        );
        $this->add_control(
            'gofly_experience_grid_cnt_card_price_area_separator_color',
            [
                'label'     => esc_html__('Separator Color', 'gofly-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}}  .package-card .package-content .divider' => 'fill: {{VALUE}};',
                ],
            ]
        );
        $this->add_control(
            'gofly_experience_grid_cnt_card_card_bottom_style',
            [
                'label'     => esc_html__('Card Bottom', 'gofly-core'),
                'type'      => \Elementor\Controls_Manager::HEADING,
                'separator' => 'after',
            ]
        );
        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'label'    => esc_html__('Typography', 'gofly-core'),
                'name'     => 'gofly_experience_grid_cnt_card_card_bottom_typ',
                'selector' => '{{WRAPPER}} .package-card .package-content .bottom-area ul li',
            ]
        );
        $this->add_control(
            'gofly_experience_grid_cnt_card_card_bottom_color',
            [
                'label'     => esc_html__('Color', 'gofly-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}}  .package-card .package-content .bottom-area ul li' => 'color: {{VALUE}};',
                ],
            ]
        );
        $this->add_control(
            'gofly_experience_grid_cnt_card_card_bottom_experience_icon_color',
            [
                'label'     => esc_html__('Left Icon Color', 'gofly-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}}  .package-card .package-content .bottom-area ul li svg' => 'fill: {{VALUE}};',
                ],
            ]
        );
        $this->add_control(
            'gofly_experience_grid_cnt_card_card_bottom_tool_tip_icon_color',
            [
                'label'     => esc_html__('Right Icon Color', 'gofly-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}}  .package-card .package-content .bottom-area ul li .info svg' => 'fill: {{VALUE}};',
                ],
            ]
        );

        $this->end_controls_section();

        // Card Image Style
        $this->start_controls_section(
            'gofly_experience_grid_cnt_card_card_image_styles',
            [
                'label' => esc_html__('Thumbnail', 'gofly-core'),
                'tab'   => Controls_Manager::TAB_STYLE,
            ]
        );
        $this->add_responsive_control(
            'gofly_experience_grid_cnt_card_card_image_radius',
            [
                'label'      => esc_html__('Border Radius', 'gofly-core'),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%'],
                'selectors'  => [
                    '{{WRAPPER}} .package-card .package-img-wrap .package-img'     => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                    '{{WRAPPER}} .package-card .package-img-wrap .package-img img' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'
                ]
            ]
        );

        $this->end_controls_section();

        // Card Buttons Style
        $this->start_controls_section(
            'gofly_experience_grid_cnt_card_buttons_styles',
            [
                'label' => esc_html__('Book Button', 'gofly-core'),
                'tab'   => Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_control(
            'gofly_experience_grid_cnt_card_main_button',
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
                'name'     => 'gofly_experience_grid_cnt_card_button_typ',
                'selector' => '{{WRAPPER}} .package-card .package-content .btn-and-price-area .primary-btn1',

            ]
        );
        $this->add_control(
            'gofly_experience_grid_cnt_card_button_color',
            [
                'label'     => esc_html__('Color', 'gofly-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}}  .package-card .package-content .btn-and-price-area .primary-btn1' => 'color: {{VALUE}};',

                ],
            ]
        );
        $this->add_control(
            'gofly_experience_grid_cnt_card_button_hover_color',
            [
                'label'     => esc_html__('Hover Color', 'gofly-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}}  .package-card .package-content .btn-and-price-area .primary-btn1:hover' => 'color: {{VALUE}};',

                ],
            ]
        );
        $this->add_control(
            'gofly_experience_grid_cnt_card_button_icon_color',
            [
                'label'     => esc_html__('Icon Color', 'gofly-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}}  .primary-btn1 > span svg' => 'fill: {{VALUE}};',

                ],
            ]
        );
        $this->add_control(
            'gofly_experience_grid_cnt_card_button_hover_icon_color',
            [
                'label'     => esc_html__('Hover Icon Color', 'gofly-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}}  .primary-btn1:hover > span svg' => 'fill: {{VALUE}};',

                ],
            ]
        );
        $this->add_control(
            'gofly_experience_grid_cnt_card_button_bg_color',
            [
                'label'     => esc_html__('Background Color', 'gofly-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}}  .package-card .package-content .btn-and-price-area .primary-btn1' => 'background-color: {{VALUE}};',

                ],
            ]
        );
        $this->add_control(
            'gofly_experience_grid_cnt_card_button_hover_bg_color',
            [
                'label'     => esc_html__('Hover BG Color', 'gofly-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}}  .primary-btn1::after' => 'background-color: {{VALUE}};',

                ],
            ]
        );
        $this->add_responsive_control(
            'gofly_experience_grid_cnt_card_button_radius',
            [
                'label'      => esc_html__(
                    'Border Radius',
                    'gofly-core'
                ),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%'],
                'selectors'  => [
                    '{{WRAPPER}} .package-card .package-content .btn-and-price-area .primary-btn1' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'
                ]
            ]
        );
        $this->add_control(
            'gofly_experience_grid_cnt_card_badge',
            [
                'label'     => esc_html__('Badge Style', 'gofly-core'),
                'type'      => \Elementor\Controls_Manager::HEADING,
                'separator' => 'after',
            ]
        );
        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'label'    => esc_html__('Typography', 'gofly-core'),
                'name'     => 'gofly_experience_grid_cnt_card_badge_typ',
                'selector' => '{{WRAPPER}} .package-card .package-img-wrap .batch span',

            ]
        );
        $this->add_control(
            'gofly_experience_grid_cnt_card_badge_color',
            [
                'label'     => esc_html__('Color', 'gofly-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}}  .package-card .package-img-wrap .batch span' => 'color: {{VALUE}};',

                ],
            ]
        );
        $this->add_control(
            'gofly_experience_grid_cnt_card_badge_bg_color',
            [
                'label'     => esc_html__('Background Color', 'gofly-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}}  .package-card .package-img-wrap .batch span' => 'background-color: {{VALUE}};',

                ],
            ]
        );
        $this->add_responsive_control(
            'gofly_experience_grid_cnt_card_badge_radius',
            [
                'label'      => esc_html__(
                    'Border Radius',
                    'gofly-core'
                ),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%'],
                'selectors'  => [
                    '{{WRAPPER}} .package-card .package-img-wrap .batch span' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'
                ]
            ]
        );



        $this->end_controls_section();
    }
    protected function render()
    {

        $settings = $this->get_settings_for_display();

        $type_ids          = $settings['gofly_exp_grid_selected_type'];
        $selected_post_ids = $settings['gofly_exp_grid_post_list'];

        $args = array(
            'post_type'      => 'experience',
            'order'          => $settings['gofly_exp_grid_order'],
            'orderby'        => $settings['gofly_exp_grid_orderby'],
            'posts_per_page' => $settings['gofly_exp_grid_post_per_page'],
            'post_status'    => 'publish',
            'offset'         => 0,
        );

        if (!empty($type_ids)) {
            $args['tax_query'] = array(
                array(
                    'taxonomy' => 'experience-type',
                    'field'    => 'slug',
                    'terms'    => $type_ids,
                    'operator' => 'IN',
                ),
            );
        }

        // Add Included posts
        if (!empty($selected_post_ids)) {
            $args['post__in'] = $selected_post_ids;
        }

        $Query = new \WP_Query($args);

?>

        <div class="home6-travel-package-section">
            <div class="container">
                <div class="row justify-content-center mb-50 wow animate fadeInDown" data-wow-delay="200ms" data-wow-duration="1500ms">
                    <div class="col-xl-6 col-lg-8">
                        <div class="section-title text-center">
                            <h2><?php echo esc_html($settings['gofly_exp_grid_title']) ?></h2>
                            <p><?php echo esc_html($settings['gofly_exp_grid_short_desc']) ?></p>
                        </div>
                    </div>
                </div>
                <div class="row gy-lg-5 gy-4">
                    <?php
                    while ($Query->have_posts()) {
                        $Query->the_post();

                        $gallery_opt = Egns_Helper::egns_get_exp_value('experience_featured_image_gallery');
                        $gallery_ids = explode(',', $gallery_opt);
                        $exp_types   = get_the_terms(get_the_ID(), 'experience-type');
                    ?>
                        <div class="col-lg-4 col-md-6 wow animate fadeInDown" data-wow-delay="200ms" data-wow-duration="1500ms">
                            <div class="package-card two">
                                <div class="package-img-wrap">
                                    <?php if (!empty($gallery_opt)): ?>
                                        <div class="swiper package-card-img-grid">
                                            <div class="swiper-wrapper">
                                                <?php if (has_post_thumbnail()): ?>
                                                    <div class="swiper-slide">
                                                        <a href="<?php the_permalink() ?>" class="package-img">
                                                            <?php the_post_thumbnail('card-thumb') ?>
                                                        </a>
                                                    </div>
                                                <?php endif; ?>
                                                <?php
                                                if (! empty($gallery_ids)) :
                                                    foreach ($gallery_ids as $gallery_item_id):
                                                ?>
                                                        <div class="swiper-slide">
                                                            <a href="<?php the_permalink() ?>" class="package-img">
                                                                <?php
                                                                echo wp_get_attachment_image(
                                                                    $gallery_item_id,
                                                                    'card-thumb',
                                                                    false,
                                                                    [
                                                                        'alt'   => esc_attr__('image', 'gofly-core'),
                                                                        'class' => 'my-custom-class'
                                                                    ]
                                                                );
                                                                ?>
                                                            </a>
                                                        </div>
                                                <?php
                                                    endforeach;
                                                endif;
                                                ?>
                                            </div>
                                        </div>
                                        <div class="grid-pagi-wrap">
                                            <div class="package-card-img-pagi paginations"></div>
                                        </div>
                                    <?php else: ?>
                                        <a href="<?php the_permalink() ?>" class="package-img">
                                            <?php the_post_thumbnail('card-thumb') ?>
                                        </a>
                                    <?php endif; ?>
                                    <div class="batch">
                                        <?php if (Egns_Helper::exp_has_sale_price(get_the_ID())): ?>
                                            <span><?php echo esc_html__('Sale on!',  'gofly-core') ?></span>
                                        <?php endif; ?>
                                        <?php if (!empty($exp_types) && !is_wp_error($exp_types)): ?>
                                            <span class="yellow-bg"><?php echo esc_html($exp_types[0]->name) ?></span>
                                        <?php endif; ?>
                                    </div>
                                </div>
                                <div class="package-content">
                                    <h5><a href="<?php the_permalink() ?>"><?php the_title() ?></a></h5>
                                    <div class="location-and-time">
                                        <?php
                                        $locations = Egns_Helper::egns_get_exp_value('experience_destination_select');

                                        if (!empty($locations)):
                                        ?>
                                            <div class="location">
                                                <svg width="14" height="14" viewBox="0 0 14 14" xmlns="http://www.w3.org/2000/svg">
                                                    <path
                                                        d="M6.83615 0C3.77766 0 1.28891 2.48879 1.28891 5.54892C1.28891 7.93837 4.6241 11.8351 6.05811 13.3994C6.25669 13.6175 6.54154 13.7411 6.83615 13.7411C7.13076 13.7411 7.41561 13.6175 7.6142 13.3994C9.04821 11.8351 12.3834 7.93833 12.3834 5.54892C12.3834 2.48879 9.89464 0 6.83615 0ZM7.31469 13.1243C7.18936 13.2594 7.02008 13.3342 6.83615 13.3342C6.65222 13.3342 6.48295 13.2594 6.35761 13.1243C4.95614 11.5959 1.69584 7.79515 1.69584 5.54896C1.69584 2.7134 4.00067 0.406933 6.83615 0.406933C9.67164 0.406933 11.9765 2.7134 11.9765 5.54896C11.9765 7.79515 8.71617 11.5959 7.31469 13.1243Z" />
                                                    <path
                                                        d="M6.83618 8.54554C8.4624 8.54554 9.7807 7.22723 9.7807 5.60102C9.7807 3.9748 8.4624 2.65649 6.83618 2.65649C5.20997 2.65649 3.89166 3.9748 3.89166 5.60102C3.89166 7.22723 5.20997 8.54554 6.83618 8.54554Z" />
                                                </svg>
                                                <?php
                                                $location_links = [];
                                                foreach ($locations as $post_id) {
                                                    $destination = get_post($post_id);
                                                    if ($destination) {
                                                        $link             = get_permalink($post_id);
                                                        $location_links[] = '<a href="' . esc_url($link) . '">' . esc_html($destination->post_title) . '</a>';
                                                    }
                                                }
                                                echo implode(', ', $location_links);
                                                ?>
                                            </div>
                                        <?php endif; ?>
                                        <?php
                                        $day = Egns_Helper::egns_get_exp_value('experience_duration_hour');
                                        if (!empty($day)):
                                        ?>
                                            <svg class="arrow" width="25" height="6" viewBox="0 0 25 6" xmlns="http://www.w3.org/2000/svg">
                                                <path d="M0 3L5 5.88675V0.113249L0 3ZM25 3L20 0.113249V5.88675L25 3ZM4.5 3.5H20.5V2.5H4.5V3.5Z" />
                                            </svg>
                                            <span><?php echo $day ?></span>
                                        <?php endif; ?>
                                    </div>
                                    <div class="btn-and-price-area">
                                        <a href="experience-details.html" class="primary-btn1 four">
                                            <span>
                                                <?php echo esc_html__('Book Now',  'gofly-core') ?>
                                                <svg width="10" height="10" viewBox="0 0 10 10" xmlns="http://www.w3.org/2000/svg">
                                                    <path
                                                        d="M9.73535 1.14746C9.57033 1.97255 9.32924 3.26406 9.24902 4.66797C9.16817 6.08312 9.25559 7.5453 9.70214 8.73633C9.84754 9.12406 9.65129 9.55659 9.26367 9.70215C8.9001 9.83849 8.4969 9.67455 8.32812 9.33398L8.29785 9.26367L8.19921 8.98438C7.73487 7.5758 7.67054 5.98959 7.75097 4.58203C7.77875 4.09598 7.82525 3.62422 7.87988 3.17969L1.53027 9.53027C1.23738 9.82317 0.762615 9.82317 0.469722 9.53027C0.176829 9.23738 0.176829 8.76262 0.469722 8.46973L6.83593 2.10254C6.3319 2.16472 5.79596 2.21841 5.25 2.24902C3.8302 2.32862 2.2474 2.26906 0.958003 1.79102L0.704097 1.68945L0.635738 1.65527C0.303274 1.47099 0.157578 1.06102 0.310542 0.704102C0.463655 0.347333 0.860941 0.170391 1.22363 0.28418L1.29589 0.310547L1.48828 0.387695C2.47399 0.751207 3.79966 0.827571 5.16601 0.750977C6.60111 0.670504 7.97842 0.428235 8.86132 0.262695L9.95312 0.0585938L9.73535 1.14746Z" />
                                                </svg>
                                            </span>
                                            <span>
                                                <?php echo esc_html__('Book Now',  'gofly-core') ?>
                                                <svg width="10" height="10" viewBox="0 0 10 10" xmlns="http://www.w3.org/2000/svg">
                                                    <path
                                                        d="M9.73535 1.14746C9.57033 1.97255 9.32924 3.26406 9.24902 4.66797C9.16817 6.08312 9.25559 7.5453 9.70214 8.73633C9.84754 9.12406 9.65129 9.55659 9.26367 9.70215C8.9001 9.83849 8.4969 9.67455 8.32812 9.33398L8.29785 9.26367L8.19921 8.98438C7.73487 7.5758 7.67054 5.98959 7.75097 4.58203C7.77875 4.09598 7.82525 3.62422 7.87988 3.17969L1.53027 9.53027C1.23738 9.82317 0.762615 9.82317 0.469722 9.53027C0.176829 9.23738 0.176829 8.76262 0.469722 8.46973L6.83593 2.10254C6.3319 2.16472 5.79596 2.21841 5.25 2.24902C3.8302 2.32862 2.2474 2.26906 0.958003 1.79102L0.704097 1.68945L0.635738 1.65527C0.303274 1.47099 0.157578 1.06102 0.310542 0.704102C0.463655 0.347333 0.860941 0.170391 1.22363 0.28418L1.29589 0.310547L1.48828 0.387695C2.47399 0.751207 3.79966 0.827571 5.16601 0.750977C6.60111 0.670504 7.97842 0.428235 8.86132 0.262695L9.95312 0.0585938L9.73535 1.14746Z" />
                                                </svg>
                                            </span>
                                        </a>
                                        <?php echo Egns_Helper::exp_global_starting_price(get_the_ID()) ?>
                                    </div>
                                    <svg class="divider" height="6" viewBox="0 0 374 6" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M5 2.5L0 0.113249V5.88675L5 3.5V2.5ZM369 3.5L374 5.88675V0.113249L369 2.5V3.5ZM4.5 3.5H369.5V2.5H4.5V3.5Z" />
                                    </svg>
                                    <div class="bottom-area">
                                        <ul>
                                            <li>
                                                <svg width="16" height="16" viewBox="0 0 16 16" xmlns="http://www.w3.org/2000/svg">
                                                    <path
                                                        d="M9.2732 12.9807H6.7268C6.68429 12.9807 6.64298 12.9666 6.60935 12.9406C6.55906 12.9018 5.36398 11.9718 4.14989 10.4857C3.43499 9.61078 2.86499 8.72565 2.45543 7.8549C1.93974 6.75846 1.67834 5.68141 1.67834 4.65329C1.67834 3.50657 2.36043 2.33394 3.54995 1.43595C4.1378 0.992226 4.81163 0.641781 5.55321 0.394396C6.33797 0.132617 7.16112 0 8 0C8.83888 0 9.66203 0.132617 10.4466 0.394396C11.1882 0.641781 11.862 0.992035 12.4499 1.43595C13.6392 2.33394 14.3215 3.50676 14.3215 4.65329C14.3215 5.63247 14.0599 6.67939 13.544 7.7647C13.1348 8.62565 12.5652 9.51367 11.8511 10.4036C10.6383 11.9148 9.40697 12.9272 9.39468 12.9371C9.36046 12.9653 9.31752 12.9807 9.2732 12.9807ZM6.79378 12.5969H9.20334C9.4465 12.3905 10.5082 11.4651 11.5563 10.1576C12.6425 8.8026 13.9374 6.74772 13.9374 4.65329C13.9374 2.63794 11.3981 0.38384 7.99981 0.38384C4.60148 0.38384 2.06238 2.63794 2.06238 4.65329C2.06238 6.85769 3.3563 8.90624 4.44199 10.2364C5.49084 11.5215 6.55311 12.4032 6.79378 12.5969Z" />
                                                    <path
                                                        d="M7.51886 12.7888C7.51886 12.7888 5.68372 9.03538 5.68372 4.65327C5.68372 2.43045 6.72066 0.191895 8 0.191895C9.27934 0.191895 10.3163 2.43045 10.3163 4.65327C10.3163 8.82024 8.48114 12.7888 8.48114 12.7888" />
                                                    <path
                                                        d="M7.34653 12.873C7.32753 12.8343 6.87594 11.9042 6.41802 10.4209C5.9956 9.05229 5.492 6.94079 5.492 4.65329C5.492 3.53843 5.74668 2.39036 6.19079 1.50312C6.67577 0.533921 7.31832 0 8.00002 0C8.68172 0 9.32426 0.53373 9.80944 1.50312C10.2535 2.39036 10.5082 3.53843 10.5082 4.65329C10.5082 6.82928 10.0048 8.94655 9.5824 10.3393C9.12505 11.8478 8.67423 12.8283 8.65542 12.8692L8.30709 12.7082C8.31169 12.6984 8.7675 11.7058 9.21717 10.2213C9.63114 8.85481 10.1246 6.77977 10.1246 4.65329C10.1246 3.5962 9.88467 2.51051 9.46648 1.67489C9.05577 0.854428 8.52146 0.38384 8.00021 0.38384C7.47895 0.38384 6.94465 0.854428 6.53394 1.67489C6.11574 2.51051 5.87584 3.5962 5.87584 4.65329C5.87584 6.893 6.37023 8.96439 6.78497 10.3076C7.23406 11.7626 7.68699 12.6951 7.6916 12.7043L7.34653 12.873ZM8.77038 16H7.22965C6.84658 16 6.5349 15.6883 6.5349 15.3052V13.9892C6.5349 13.8833 6.62088 13.7973 6.72682 13.7973H9.27321C9.37915 13.7973 9.46513 13.8833 9.46513 13.9892V15.3052C9.46513 15.6883 9.15346 16 8.77038 16ZM6.91874 14.1812V15.3052C6.91874 15.4766 7.05826 15.6162 7.22965 15.6162H8.77038C8.94177 15.6162 9.08129 15.4766 9.08129 15.3052V14.1812H6.91874Z" />
                                                    <path
                                                        d="M8.90952 14.1812H7.0907C7.00606 14.1812 6.93159 14.126 6.90703 14.045L6.54334 12.8445C6.52568 12.7863 6.53662 12.7232 6.5729 12.6745C6.60917 12.6257 6.66636 12.5969 6.72701 12.5969H9.2734C9.33424 12.5969 9.39143 12.6257 9.42751 12.6745C9.4454 12.6985 9.45739 12.7264 9.46252 12.756C9.46765 12.7855 9.46579 12.8158 9.45707 12.8445L9.09338 14.045C9.06862 14.1258 8.99397 14.1812 8.90952 14.1812ZM7.23291 13.7974H8.76693L9.01431 12.9808H6.98552L7.23291 13.7974Z" />
                                                </svg>
                                                <?php echo esc_html__('Experience',  'gofly-core') ?>
                                                <div class="info">
                                                    <svg width="12" height="12" viewBox="0 0 12 12" xmlns="http://www.w3.org/2000/svg">
                                                        <g>
                                                            <path
                                                                d="M6 0.375C4.88748 0.375 3.79995 0.704901 2.87492 1.32298C1.94989 1.94107 1.22892 2.81957 0.80318 3.84741C0.377437 4.87524 0.266043 6.00624 0.483085 7.09738C0.700127 8.18853 1.23586 9.19081 2.02253 9.97748C2.8092 10.7641 3.81148 11.2999 4.90262 11.5169C5.99376 11.734 7.12476 11.6226 8.1526 11.1968C9.18043 10.7711 10.0589 10.0501 10.677 9.12508C11.2951 8.20006 11.625 7.11252 11.625 6C11.6245 4.50831 11.0317 3.07786 9.97693 2.02307C8.92215 0.968289 7.49169 0.375497 6 0.375ZM6 9.375C5.85167 9.375 5.70666 9.33101 5.58333 9.2486C5.45999 9.16619 5.36386 9.04906 5.30709 8.91201C5.25033 8.77497 5.23548 8.62417 5.26441 8.47868C5.29335 8.3332 5.36478 8.19956 5.46967 8.09467C5.57456 7.98978 5.7082 7.91835 5.85369 7.88941C5.99917 7.86047 6.14997 7.87533 6.28702 7.93209C6.42406 7.98886 6.54119 8.08499 6.62361 8.20832C6.70602 8.33166 6.75 8.47666 6.75 8.625C6.74941 8.82373 6.6702 9.01415 6.52968 9.15468C6.38915 9.2952 6.19873 9.37441 6 9.375ZM6.85875 3.55875L6.6075 6.56625C6.5944 6.71834 6.52472 6.85999 6.41224 6.9632C6.29976 7.0664 6.15266 7.12367 6 7.12367C5.84735 7.12367 5.70024 7.0664 5.58776 6.9632C5.47528 6.85999 5.40561 6.71834 5.3925 6.56625L5.14125 3.55875C5.13042 3.44226 5.1434 3.32478 5.1794 3.21346C5.2154 3.10214 5.27367 2.99931 5.35067 2.91123C5.42767 2.82314 5.52178 2.75165 5.62729 2.70108C5.73279 2.65052 5.84748 2.62195 5.96437 2.61711C6.08127 2.61227 6.19793 2.63126 6.30725 2.67294C6.41657 2.71461 6.51627 2.77808 6.60029 2.8595C6.6843 2.94092 6.75087 3.03858 6.79595 3.14655C6.84103 3.25451 6.86367 3.37051 6.8625 3.4875C6.86313 3.51131 6.86187 3.53514 6.85875 3.55875Z" />
                                                        </g>
                                                    </svg>
                                                    <div class="tooltip-text"><?php echo wp_kses_post(Egns_Helper::egns_get_exp_value('experience_tooltip_content')) ?></div>
                                                </div>
                                            </li>
                                            <li>
                                                <svg width="16" height="16" viewBox="0 0 16 16" xmlns="http://www.w3.org/2000/svg">
                                                    <g>
                                                        <path
                                                            d="M8 0C3.58853 0 0 3.58853 0 8C0 12.4115 3.58853 16 8 16C12.4115 16 16 12.4108 16 8C16 3.58916 12.4115 0 8 0ZM8 14.7607C4.27266 14.7607 1.23934 11.728 1.23934 8C1.23934 4.27203 4.27266 1.23934 8 1.23934C11.7273 1.23934 14.7607 4.27203 14.7607 8C14.7607 11.728 11.728 14.7607 8 14.7607Z" />
                                                        <path
                                                            d="M11.0984 7.32445H8.6197V4.84576C8.6197 4.5037 8.3427 4.22607 8.00001 4.22607C7.65733 4.22607 7.38033 4.5037 7.38033 4.84576V7.32445H4.90164C4.55895 7.32445 4.28195 7.60207 4.28195 7.94414C4.28195 8.2862 4.55895 8.56382 4.90164 8.56382H7.38033V11.0425C7.38033 11.3846 7.65733 11.6622 8.00001 11.6622C8.3427 11.6622 8.6197 11.3846 8.6197 11.0425V8.56382H11.0984C11.4411 8.56382 11.7181 8.2862 11.7181 7.94414C11.7181 7.60207 11.4411 7.32445 11.0984 7.32445Z" />
                                                    </g>
                                                </svg>
                                                <?php echo esc_html__('Inclusion',  'gofly-core') ?>
                                                <div class="info">
                                                    <svg width="12" height="12" viewBox="0 0 12 12" xmlns="http://www.w3.org/2000/svg">
                                                        <g>
                                                            <path
                                                                d="M6 0.375C4.88748 0.375 3.79995 0.704901 2.87492 1.32298C1.94989 1.94107 1.22892 2.81957 0.80318 3.84741C0.377437 4.87524 0.266043 6.00624 0.483085 7.09738C0.700127 8.18853 1.23586 9.19081 2.02253 9.97748C2.8092 10.7641 3.81148 11.2999 4.90262 11.5169C5.99376 11.734 7.12476 11.6226 8.1526 11.1968C9.18043 10.7711 10.0589 10.0501 10.677 9.12508C11.2951 8.20006 11.625 7.11252 11.625 6C11.6245 4.50831 11.0317 3.07786 9.97693 2.02307C8.92215 0.968289 7.49169 0.375497 6 0.375ZM6 9.375C5.85167 9.375 5.70666 9.33101 5.58333 9.2486C5.45999 9.16619 5.36386 9.04906 5.30709 8.91201C5.25033 8.77497 5.23548 8.62417 5.26441 8.47868C5.29335 8.3332 5.36478 8.19956 5.46967 8.09467C5.57456 7.98978 5.7082 7.91835 5.85369 7.88941C5.99917 7.86047 6.14997 7.87533 6.28702 7.93209C6.42406 7.98886 6.54119 8.08499 6.62361 8.20832C6.70602 8.33166 6.75 8.47666 6.75 8.625C6.74941 8.82373 6.6702 9.01415 6.52968 9.15468C6.38915 9.2952 6.19873 9.37441 6 9.375ZM6.85875 3.55875L6.6075 6.56625C6.5944 6.71834 6.52472 6.85999 6.41224 6.9632C6.29976 7.0664 6.15266 7.12367 6 7.12367C5.84735 7.12367 5.70024 7.0664 5.58776 6.9632C5.47528 6.85999 5.40561 6.71834 5.3925 6.56625L5.14125 3.55875C5.13042 3.44226 5.1434 3.32478 5.1794 3.21346C5.2154 3.10214 5.27367 2.99931 5.35067 2.91123C5.42767 2.82314 5.52178 2.75165 5.62729 2.70108C5.73279 2.65052 5.84748 2.62195 5.96437 2.61711C6.08127 2.61227 6.19793 2.63126 6.30725 2.67294C6.41657 2.71461 6.51627 2.77808 6.60029 2.8595C6.6843 2.94092 6.75087 3.03858 6.79595 3.14655C6.84103 3.25451 6.86367 3.37051 6.8625 3.4875C6.86313 3.51131 6.86187 3.53514 6.85875 3.55875Z" />
                                                        </g>
                                                    </svg>
                                                    <div class="tooltip-text"><?php echo wp_kses_post(Egns_Helper::egns_get_exp_value('inclusion_tooltip_content')) ?></div>
                                                </div>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php
                    };
                    wp_reset_postdata();
                    ?>
                </div>
            </div>
        </div>

<?php

    }
}

Plugin::instance()->widgets_manager->register(new Gofly_Experience_Grid_Widget());
