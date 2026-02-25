<?php

namespace Elementor;

if (!defined('ABSPATH')) exit;  // Exit if accessed directly

use Egns\Helper\Egns_Helper as HelperEgns_Helper;
use Elementor\core\Schemes;
use Egns_Core\Egns_Helper;

class Gofly_Destination_Widget extends Widget_Base
{

    public function get_name()
    {
        return 'gofly_destination';
    }

    public function get_title()
    {
        return esc_html__('EG Destination', 'gofly-core');
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

        //===================== Destination Content =======================//

        $this->start_controls_section(
            'gofly_destination_section',
            [
                'label' => esc_html__('Destination Content', 'gofly-core')
            ]
        );
        $this->add_control(
            'gofly_destination_widget_style',
            [
                'label'   => esc_html__('Select Style', 'gofly-core'),
                'type'    => \Elementor\Controls_Manager::SELECT,
                'options' => [
                    'one'   => esc_html__('Widget Style 01', 'gofly-core'),
                    'two'   => esc_html__('Widget Style 02', 'gofly-core'),
                    'three' => esc_html__('Widget Style 03', 'gofly-core'),
                    'four'  => esc_html__('Widget Style 04', 'gofly-core'),
                    'five'  => esc_html__('Widget Style 05', 'gofly-core'),
                    'six'   => esc_html__('Widget Style 06', 'gofly-core'),
                ],
                'default' => 'one',
            ]
        );
        $this->add_control(
            'hr',
            [
                'type' => \Elementor\Controls_Manager::DIVIDER,
            ]
        );

        $this->add_control(
            'gofly_destination_title',
            [
                'label'       => esc_html__('Title', 'gofly-core'),
                'type'        => \Elementor\Controls_Manager::TEXT,
                'default'     => esc_html__('Top Destinations', 'gofly-core'),
                'placeholder' => esc_html__('Type your title here', 'gofly-core'),
                'label_block' => true,
                'condition'   => [
                    'gofly_destination_widget_style' => ['six'],
                ]
            ]
        );

        // Post Query 
        $this->add_control(
            'gofly_destination_query_area',
            [
                'label'     => esc_html__('Post Query', 'gofly-core'),
                'type'      => \Elementor\Controls_Manager::HEADING,
                'separator' => 'after',
            ]
        );
        $this->add_control(
            'gofly_destination_order',
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
            'gofly_destination_orderby',
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
            'gofly_destination_post_per_page',
            [
                'label'   => esc_html__('Posts Per Page', 'gofly-core'),
                'type'    => Controls_Manager::NUMBER,
                'default' => 8,
            ]
        );
        $this->add_control(
            'gofly_destination_selected_continen',
            [
                'label'       => esc_html__('Destination Continen', 'gofly-core'),
                'type'        => \Elementor\Controls_Manager::SELECT2,
                'label_block' => true,
                'multiple'    => true,
                'options'     => \Egns_Core\Egns_Helper::get_post_terms_options('destination-continent'),
                'description' => esc_html__('Show destination only selected continen', 'gofly-core'),
            ]
        );
        $this->add_control(
            'gofly_destination_post_list',
            [
                'label'       => esc_html__('Destination lists', 'gofly-core'),
                'type'        => \Elementor\Controls_Manager::SELECT2,
                'label_block' => true,
                'multiple'    => true,
                'options'     => \Egns_Core\Egns_Helper::get_post_list_options('destination'),
                'description' => esc_html__('Selected post only show when any listed continen have that.', 'gofly-core'),
            ]
        );

        $this->add_control(
            'gofly_destination_vector_image',
            [
                'label' => esc_html__('Vector Image', 'gofly-core'),
                'type' => \Elementor\Controls_Manager::MEDIA,
                'default' => [
                    'url' => \Elementor\Utils::get_placeholder_image_src(),
                ],
                'media_types' => ['image', 'svg'],
                'condition' => [
                    'gofly_destination_widget_style' => ['six'],
                ]
            ]
        );

        $this->end_controls_section();


        //===================== Destination Content Style =======================//

        $this->start_controls_section(
            'gofly_destination_section_style',
            [
                'label' => esc_html__('Destination Content Style', 'gofly-core'),
                'tab'   => \Elementor\Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_control(
            'gofly_destination_title_options',
            [
                'label'     => esc_html__('Section Title Options', 'gofly-core'),
                'type'      => \Elementor\Controls_Manager::HEADING,
                'separator' => 'before',
                'condition' => [
                    'gofly_destination_widget_style' => ['six'],
                ]
            ]
        );
        $this->add_control(
            'gofly_destination_title_color',
            [
                'label'     => esc_html__('Color', 'gofly-core'),
                'type'      => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .section-title h2' => 'color: {{VALUE}}',
                ],
                'condition' => [
                    'gofly_destination_widget_style' => ['six'],
                ]
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name'      => 'gofly_destination_title_typography',
                'selector'  => '{{WRAPPER}} .section-title h2',
                'condition' => [
                    'gofly_destination_widget_style' => ['six'],
                ]
            ]
        );

        // Tab Menu
        $this->add_control(
            'gofly_destination_tab_menu_options',
            [
                'label'     => esc_html__('Tab Menu Options', 'gofly-core'),
                'type'      => \Elementor\Controls_Manager::HEADING,
                'separator' => 'before',
                'condition' => [
                    'gofly_destination_widget_style' => 'one',
                ],
            ]
        );

        $this->add_control(
            'gofly_destination_tab_menu_color',
            [
                'label'     => esc_html__('Color', 'gofly-core'),
                'type'      => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .destination-page .nav-pills .nav-item .nav-link' => 'color: {{VALUE}}',
                ],
                'condition' => [
                    'gofly_destination_widget_style' => 'one',
                ],
            ]
        );

        $this->add_control(
            'gofly_destination_tab_menu_bdr_color',
            [
                'label'     => esc_html__('Border Color', 'gofly-core'),
                'type'      => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .destination-page .nav-pills .nav-item .nav-link' => 'border-color: {{VALUE}}',
                ],
                'condition' => [
                    'gofly_destination_widget_style' => 'one',
                ],
            ]
        );

        $this->add_responsive_control(
            'gofly_destination_tab_menu_bdr_radius',
            [
                'label'      => esc_html__(
                    'Border Radius',
                    'gofly-core'
                ),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%'],
                'selectors'  => [
                    '{{WRAPPER}} .destination-page .nav-pills .nav-item .nav-link' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'
                ]
            ]
        );

        $this->add_control(
            'gofly_destination_tab_menu_bg_color',
            [
                'label'     => esc_html__('Active BG Color', 'gofly-core'),
                'type'      => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .destination-page .nav-pills .nav-item .nav-link.active' => 'background-color: {{VALUE}}',
                    '{{WRAPPER}} .destination-page .nav-pills .nav-item .nav-link:hover'  => 'background-color: {{VALUE}}',
                ],
                'condition' => [
                    'gofly_destination_widget_style' => 'one',
                ],
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name'      => 'gofly_destination_tab_menu_typography',
                'selector'  => '{{WRAPPER}} .destination-page .nav-pills .nav-item .nav-link',
                'condition' => [
                    'gofly_destination_widget_style' => 'one',
                ],
            ]
        );

        // Card Title
        $this->add_control(
            'gofly_destination_sld_crd_title_options',
            [
                'label'     => esc_html__('Card Title Options', 'gofly-core'),
                'type'      => \Elementor\Controls_Manager::HEADING,
                'separator' => 'before',
            ]
        );
        $this->add_control(
            'gofly_destination_sld_crd_title_color',
            [
                'label'     => esc_html__('Color', 'gofly-core'),
                'type'      => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .destination-card .destination-content .title-area'     => 'color: {{VALUE}}',
                    '{{WRAPPER}} .destination-card .destination-content .title-area svg' => 'fill: {{VALUE}}',
                    // two 
                    '{{WRAPPER}} .destination-card2 .destination-content h5 a' => 'color: {{VALUE}}',
                ],
            ]
        );
        $this->add_control(
            'gofly_destination_sld_crd_hvr_title_color',
            [
                'label'     => esc_html__('Hover Color', 'gofly-core'),
                'type'      => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .destination-card .destination-content .title-area:hover'     => 'color: {{VALUE}}',
                    '{{WRAPPER}} .destination-card .destination-content .title-area:hover svg' => 'fill: {{VALUE}}',
                    // two
                    '{{WRAPPER}} .destination-card2 .destination-content h5 a:hover' => 'color: {{VALUE}}',
                ],
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name'     => 'gofly_destination_sld_crd_title_typography',
                'selector' => '{{WRAPPER}} .destination-card .destination-content .title-area,.destination-card2 .destination-content h5 a',
            ]
        );

        // Card Info
        $this->add_control(
            'gofly_destination_cdr_info_options',
            [
                'label'     => esc_html__('Card Info options', 'gofly-core'),
                'type'      => \Elementor\Controls_Manager::HEADING,
                'separator' => 'before',
            ]
        );
        $this->add_control(
            'gofly_destination_cdr_info_color',
            [
                'label'     => esc_html__('Color', 'gofly-core'),
                'type'      => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .destination-card .destination-content .content p' => 'color: {{VALUE}}',
                    '{{WRAPPER}} .destination-card2 .destination-content span'      => 'color: {{VALUE}}',
                ],
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name'     => 'gofly_destination_cdr_info_typography',
                'selector' => '{{WRAPPER}} .destination-card .destination-content .content p,.destination-card2 .destination-content span',
            ]
        );

        // Arrow btn
        $this->add_control(
            'gofly_destination_arrow_btn_options',
            [
                'label'     => esc_html__('Arrow Button Options', 'gofly-core'),
                'type'      => \Elementor\Controls_Manager::HEADING,
                'separator' => 'before',
                'condition' => [
                    'gofly_destination_widget_style' => 'three',
                ],
            ]
        );
        $this->add_control(
            'gofly_destination_arrow_btn_color',
            [
                'label'     => esc_html__('Color', 'gofly-core'),
                'type'      => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .destination-card2.three .destination-img .arrow svg' => 'stroke: {{VALUE}}',
                ],
                'condition' => [
                    'gofly_destination_widget_style' => 'three',
                ],
            ]
        );
        $this->add_control(
            'gofly_destination_arrow_btn_bg_color',
            [
                'label'     => esc_html__('BG Color', 'gofly-core'),
                'type'      => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .destination-card2.three .destination-img .arrow' => 'background-color: {{VALUE}}',
                ],
                'condition' => [
                    'gofly_destination_widget_style' => 'three',
                ],
            ]
        );
        $this->add_control(
            'gofly_destination_arrow_btn_hvr_bg_color',
            [
                'label'     => esc_html__('Hover BG Color', 'gofly-core'),
                'type'      => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .destination-card2.three .destination-img .arrow:hover' => 'background-color: {{VALUE}}',
                ],
                'condition' => [
                    'gofly_destination_widget_style' => 'three',
                ],
            ]
        );


        $this->end_controls_section();
    }
    protected function render()
    {

        $settings = $this->get_settings_for_display();

        $continen_ids = $settings['gofly_destination_selected_continen'];

        $tax_args = array(
            'taxonomy'   => 'destination-continent',
            'hide_empty' => true,
        );

        if (! empty($continen_ids)) {
            // Ensure it's an array
            $tax_args['slug'] = (array) $continen_ids;
        }

        $terms = get_terms($tax_args);
        // Reindex the array
        $terms = array_values($terms);


?>

        <?php if ('one' == $settings['gofly_destination_widget_style']): ?>
            <div class="destination-page">
                <div class="container">
                    <ul class="nav nav-pills" id="pills-tab" role="tablist">
                        <?php foreach ($terms as $key => $term): ?>
                            <li class="nav-item" role="presentation">
                                <button class="nav-link <?php echo esc_attr($key == 0 ? 'active' : '') ?>" id="pills-<?php echo esc_attr($term->slug); ?>-tab" data-bs-toggle="pill" data-bs-target="#pills-<?php echo esc_attr($term->slug); ?>" type="button" role="tab" aria-controls="pills-<?php echo esc_attr($term->slug); ?>" aria-selected="true">
                                    <?php echo esc_html($term->name) ?>
                                </button>
                            </li>
                        <?php endforeach; ?>
                    </ul>
                    <div class="tab-content" id="pills-tabContent">
                        <?php foreach ($terms as $key => $term): ?>
                            <div class="tab-pane fade <?php echo esc_attr($key == 0 ? 'show active' : '') ?>" id="pills-<?php echo esc_attr($term->slug); ?>" role="tabpanel" aria-labelledby="pills-<?php echo esc_attr($term->slug); ?>-tab">
                                <div class="row gy-md-5 gy-4">
                                    <?php

                                    $selected_post_ids = $settings['gofly_destination_post_list'];

                                    $args = array(
                                        'post_type'      => 'destination',
                                        'order'          => $settings['gofly_destination_order'],
                                        'orderby'        => $settings['gofly_destination_orderby'],
                                        'posts_per_page' => $settings['gofly_destination_post_per_page'],
                                        'post_status'    => 'publish',
                                        'offset'         => 0,
                                    );

                                    if (!empty($term->slug)) {
                                        $args['tax_query'] = array(
                                            array(
                                                'taxonomy' => 'destination-continent',
                                                'field'    => 'slug',
                                                'terms'    => $term->slug,
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
                                    <?php

                                    $destination_counts = Egns_Helper::egns_get_counts_by_custom_meta_key('EGNS_TOUR_META_ID', 'tour_destination_select', 'tour');

                                    while ($Query->have_posts()):
                                        $Query->the_post();

                                        $destination_id = get_the_ID();
                                        $tour_count     = isset($destination_counts[$destination_id]) ? $destination_counts[$destination_id] : 0;
                                    ?>
                                        <div class="col-lg-3 col-md-4 col-sm-6">
                                            <div class="destination-card">
                                                <?php if (has_post_thumbnail()): ?>
                                                    <a href="<?php the_permalink() ?>" class="destination-img">
                                                        <?php the_post_thumbnail() ?>
                                                    </a>
                                                <?php endif; ?>
                                                <div class="destination-content">
                                                    <a href="<?php the_permalink() ?>" class="title-area">
                                                        <svg width="16" height="16" viewBox="0 0 16 16" xmlns="http://www.w3.org/2000/svg">
                                                            <path
                                                                d="M7.81276 0C4.31734 0 1.47305 2.84433 1.47305 6.34163C1.47305 9.07242 5.2847 13.5258 6.92356 15.3136C7.15052 15.5628 7.47606 15.7042 7.81276 15.7042C8.14946 15.7042 8.475 15.5628 8.70196 15.3136C10.3408 13.5258 14.1525 9.07238 14.1525 6.34163C14.1525 2.84433 11.3082 0 7.81276 0ZM8.35966 14.9991C8.21642 15.1535 8.02297 15.2391 7.81276 15.2391C7.60255 15.2391 7.4091 15.1536 7.26586 14.9991C5.66417 13.2525 1.93812 8.90875 1.93812 6.34167C1.93812 3.10103 4.57221 0.465067 7.81276 0.465067C11.0533 0.465067 13.6874 3.10103 13.6874 6.34167C13.6874 8.90875 9.96135 13.2524 8.35966 14.9991Z" />
                                                            <path
                                                                d="M7.81277 9.76634C9.6713 9.76634 11.1779 8.25971 11.1779 6.40118C11.1779 4.54265 9.6713 3.03601 7.81277 3.03601C5.95424 3.03601 4.4476 4.54265 4.4476 6.40118C4.4476 8.25971 5.95424 9.76634 7.81277 9.76634Z" />
                                                        </svg>
                                                        <?php the_title() ?>
                                                    </a>
                                                    <div class="content">
                                                        <p><?php echo !empty($tour_count) ? sprintf('%02d', $tour_count) . esc_html__(' tours', 'gofly-core') . ' | ' . Egns_Helper::egns_get_destination_value('destination_departure') . ' ' . Egns_Helper::egns_get_destination_value('destination_guest_travelled') : Egns_Helper::egns_get_destination_value('destination_departure') . ' ' . Egns_Helper::egns_get_destination_value('destination_guest_travelled') ?></p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    <?php
                                    endwhile;
                                    wp_reset_postdata();
                                    ?>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    </div>
                </div>
            </div>
        <?php endif; ?>

        <?php if ('two' == $settings['gofly_destination_widget_style']): ?>
            <div class="destination-page">
                <div class="container">
                    <div class="row gy-md-5 gy-4">
                        <?php
                        $destination_counts = Egns_Helper::egns_get_counts_by_custom_meta_key('EGNS_TOUR_META_ID', 'tour_destination_select', 'tour');
                        $selected_post_ids  = $settings['gofly_destination_post_list'];

                        $args = array(
                            'post_type'      => 'destination',
                            'order'          => $settings['gofly_destination_order'],
                            'orderby'        => $settings['gofly_destination_orderby'],
                            'posts_per_page' => $settings['gofly_destination_post_per_page'],
                            'post_status'    => 'publish',
                            'offset'         => 0,
                        );

                        if (!empty($continen_ids)) {
                            $args['tax_query'] = array(
                                array(
                                    'taxonomy' => 'destination-continent',
                                    'field'    => 'slug',
                                    'terms'    => $continen_ids,
                                    'operator' => 'IN',
                                ),
                            );
                        }

                        // Add Included posts
                        if (!empty($selected_post_ids)) {
                            $args['post__in'] = $selected_post_ids;
                        }

                        $Query = new \WP_Query($args);

                        while ($Query->have_posts()):
                            $Query->the_post();

                            $destination_id = get_the_ID();
                            $tour_count     = isset($destination_counts[$destination_id]) ? $destination_counts[$destination_id] : 0;
                        ?>

                            <div class="col-lg-3 col-md-4 col-sm-6 wow animate fadeInDown" data-wow-delay="200ms" data-wow-duration="1500ms">
                                <div class="destination-card2">
                                    <?php if (has_post_thumbnail()): ?>
                                        <a href="<?php the_permalink() ?>" class="destination-img">
                                            <?php the_post_thumbnail() ?>
                                        </a>
                                    <?php endif; ?>
                                    <div class="destination-content">
                                        <h5><a href="<?php the_permalink() ?>"><?php the_title() ?></a></h5>
                                        <span><?php echo esc_html__('Tours ',  'gofly-core') . '(' . sprintf('%02d', $tour_count) . ')' ?></span>
                                    </div>
                                </div>
                            </div>
                        <?php
                        endwhile;
                        wp_reset_postdata();
                        ?>
                    </div>
                </div>
            </div>
        <?php endif; ?>

        <?php if ('three' == $settings['gofly_destination_widget_style']): ?>
            <div class="destination-page">
                <div class="container">
                    <div class="row gy-md-5 gy-4">
                        <?php
                        $destination_counts = Egns_Helper::egns_get_counts_by_custom_meta_key('EGNS_TOUR_META_ID', 'tour_destination_select', 'tour');
                        $selected_post_ids  = $settings['gofly_destination_post_list'];

                        $args = array(
                            'post_type'      => 'destination',
                            'order'          => $settings['gofly_destination_order'],
                            'orderby'        => $settings['gofly_destination_orderby'],
                            'posts_per_page' => $settings['gofly_destination_post_per_page'],
                            'post_status'    => 'publish',
                            'offset'         => 0,
                        );

                        if (!empty($continen_ids)) {
                            $args['tax_query'] = array(
                                array(
                                    'taxonomy' => 'destination-continent',
                                    'field'    => 'slug',
                                    'terms'    => $continen_ids,
                                    'operator' => 'IN',
                                ),
                            );
                        }

                        // Add Included posts
                        if (!empty($selected_post_ids)) {
                            $args['post__in'] = $selected_post_ids;
                        }

                        $Query = new \WP_Query($args);

                        while ($Query->have_posts()):
                            $Query->the_post();

                            $destination_id = get_the_ID();
                            $tour_count     = isset($destination_counts[$destination_id]) ? $destination_counts[$destination_id] : 0;
                        ?>
                            <div class="col-lg-3 col-md-4 col-sm-6">
                                <div class="destination-card2 two">
                                    <?php if (has_post_thumbnail()): ?>
                                        <div class="destination-img">
                                            <?php the_post_thumbnail() ?>
                                            <a href="<?php the_permalink() ?>" class="arrow">
                                                <svg width="14" height="14" viewBox="0 0 14 14" xmlns="http://www.w3.org/2000/svg">
                                                    <path
                                                        d="M1 13C5.94664 8.05336 13 1 13 1M13 1C10.1852 1.52778 6.69444 2.58333 3 1M13 1C12.4722 3.63889 11.4167 6.77778 13 11" stroke-width="1.5" stroke-linecap="round" />
                                                </svg>
                                            </a>
                                        </div>
                                    <?php endif; ?>
                                    <div class="destination-content">
                                        <h5><a href="<?php the_permalink() ?>"><?php the_title() ?></a></h5>
                                        <span><?php echo esc_html__('Tours ',  'gofly-core') . esc_html('(' . sprintf('%02d', $tour_count) . ')') ?></span>
                                    </div>
                                </div>
                            </div>
                        <?php
                        endwhile;
                        wp_reset_postdata();
                        ?>
                    </div>
                </div>
            </div>
        <?php endif; ?>

        <?php if ('four' == $settings['gofly_destination_widget_style']): ?>
            <div class="destination-page">
                <div class="container">
                    <div class="row g-xl-4 g-lg-3 gy-4">
                        <?php

                        $destination_counts = Egns_Helper::egns_get_counts_by_custom_meta_key('EGNS_TOUR_META_ID', 'tour_destination_select', 'tour');
                        $selected_post_ids  = $settings['gofly_destination_post_list'];

                        $args = array(
                            'post_type'      => 'destination',
                            'order'          => $settings['gofly_destination_order'],
                            'orderby'        => $settings['gofly_destination_orderby'],
                            'posts_per_page' => $settings['gofly_destination_post_per_page'],
                            'post_status'    => 'publish',
                            'offset'         => 0,
                        );

                        if (!empty($continen_ids)) {
                            $args['tax_query'] = array(
                                array(
                                    'taxonomy' => 'destination-continent',
                                    'field'    => 'slug',
                                    'terms'    => $continen_ids,
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
                        <?php
                        $pattern = ['col-lg-5 col-md-7', 'col-lg-3 col-md-5', 'col-lg-4 col-md-7', 'col-lg-4 col-md-5', 'col-lg-3 col-md-7', 'col-lg-5 col-md-5'];
                        $i       = 0;

                        while ($Query->have_posts()):
                            $Query->the_post();

                            $column_value = $pattern[$i % count($pattern)];

                            $destination_id = get_the_ID();
                            $tour_count     = isset($destination_counts[$destination_id]) ? $destination_counts[$destination_id] : 0;

                        ?>
                            <div class="<?php echo esc_attr($column_value); ?> wow animate fadeInDown" data-wow-delay="200ms" data-wow-duration="1500ms">
                                <div class="destination-card2 four">
                                    <?php if (has_post_thumbnail()): ?>
                                        <div class="destination-img">
                                            <?php the_post_thumbnail() ?>
                                        </div>
                                    <?php endif; ?>
                                    <div class="destination-content-wrap">
                                        <div class="destination-content">
                                            <span><?php echo esc_html__('Tours ',  'gofly-core') . esc_html('(' . sprintf('%02d', $tour_count) . ')') ?></span>
                                            <h5><a href="<?php the_permalink() ?>"><?php the_title() ?></a></h5>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <?php
                            $i++;
                        endwhile;
                        wp_reset_postdata();
                        ?>
                    </div>
                </div>
            </div>
        <?php endif; ?>

        <?php if ('five' == $settings['gofly_destination_widget_style']): ?>
            <div class="destination-page">
                <div class="container">
                    <div class="row gy-md-5 gy-4">
                        <?php foreach ($terms as $key => $term): ?>
                            <div class="col-lg-6 wow animate fadeInDown" data-wow-delay="200ms" data-wow-duration="1500ms">
                                <div class="destination-card4">
                                    <?php
                                    $thumb          = get_term_meta($term->term_id, 'egns_taxonomy_continen', true);
                                    $continen_count = Egns_Helper::get_tour_count_by_continent($term->term_id);
                                    ?>
                                    <div class="destination-img-wrap" style="background-image: linear-gradient(180deg, rgba(0, 0, 0, 0.25) 0%, rgba(0, 0, 0, 0.25) 100%), url(<?php echo !empty($thumb)  ? esc_url($thumb['destination_continen_thumb']['url']) : '' ?>);">
                                        <div class="destination-title-area">
                                            <h2> <?php echo esc_html($term->name) ?></h2>
                                            <span> <?php echo sprintf('%02d', $continen_count) . ' ' . esc_html__('Tour', 'gofly-core'); ?> </span>
                                        </div>
                                    </div>
                                    <div class="destination-wrapper">
                                        <?php

                                        $selected_post_ids = $settings['gofly_destination_post_list'];

                                        $args = array(
                                            'post_type'      => 'destination',
                                            'order'          => $settings['gofly_destination_order'],
                                            'orderby'        => $settings['gofly_destination_orderby'],
                                            'posts_per_page' => $settings['gofly_destination_post_per_page'],
                                            'post_status'    => 'publish',
                                            'offset'         => 0,
                                        );

                                        if (!empty($term->slug)) {
                                            $args['tax_query'] = array(
                                                array(
                                                    'taxonomy' => 'destination-continent',
                                                    'field'    => 'slug',
                                                    'terms'    => $term->slug,
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
                                        <ul class="destination-list">
                                            <?php
                                            while ($Query->have_posts()):
                                                $Query->the_post();
                                            ?>
                                                <li>
                                                    <a href="<?php the_permalink() ?>">
                                                        <img src="<?php echo esc_url(Egns_Helper::egns_get_destination_value('destination_country_flag', 'url')) ?>" alt="<?php echo esc_attr__('Flag', 'gofly-core') ?>">
                                                        <?php the_title() ?>
                                                    </a>
                                                </li>
                                            <?php
                                            endwhile;
                                            wp_reset_postdata();
                                            ?>
                                        </ul>

                                    </div>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    </div>
                </div>
            </div>
        <?php endif; ?>

        <?php if ('six' == $settings['gofly_destination_widget_style']): ?>
            <div class="home5-destination-section">
                <div class="container">
                    <?php if (!empty($settings['gofly_destination_title'])): ?>
                        <div class="row justify-content-center mb-50 wow animate fadeInDown" data-wow-delay="200ms" data-wow-duration="1500ms">
                            <div class="col-xl-6 col-lg-8">
                                <div class="section-title text-center">
                                    <h2><?php echo esc_html($settings['gofly_destination_title']); ?></h2>
                                </div>
                            </div>
                        </div>
                    <?php endif; ?>
                    <div class="row g-xl-4 g-lg-3 gy-4">

                        <?php
                        $destination_counts = Egns_Helper::egns_get_counts_by_custom_meta_key('EGNS_TOUR_META_ID', 'tour_destination_select', 'tour');
                        $selected_post_ids  = $settings['gofly_destination_post_list'];

                        $args = array(
                            'post_type'      => 'destination',
                            'order'          => $settings['gofly_destination_order'],
                            'orderby'        => $settings['gofly_destination_orderby'],
                            'posts_per_page' => $settings['gofly_destination_post_per_page'],
                            'post_status'    => 'publish',
                            'offset'         => 0,
                        );

                        if (!empty($continen_ids)) {
                            $args['tax_query'] = array(
                                array(
                                    'taxonomy' => 'destination-continent',
                                    'field'    => 'slug',
                                    'terms'    => $continen_ids,
                                    'operator' => 'IN',
                                ),
                            );
                        }

                        // Add Included posts
                        if (!empty($selected_post_ids)) {
                            $args['post__in'] = $selected_post_ids;
                        }

                        $classes     = array('col-lg-5 col-md-7', 'col-lg-3 col-md-5', 'col-lg-4 col-md-7', 'col-lg-4 col-md-5', 'col-lg-3 col-md-7', 'col-lg-5 col-md-5');  // your classes
                        $class_count = count($classes);

                        $Query = new \WP_Query($args);
                        $index = 0;                     // initialize index

                        while ($Query->have_posts()):
                            $Query->the_post();

                            $class = $classes[$index % $class_count];  // rotate classes
                            $index++;                           // increment index

                            $destination_id = get_the_ID();
                            $tour_count     = isset($destination_counts[$destination_id]) ? $destination_counts[$destination_id] : 0;
                        ?>
                            <div class="<?php echo esc_attr($class); ?> wow animate fadeInDown" data-wow-delay="200ms" data-wow-duration="1500ms">
                                <div class="destination-card2 four">
                                    <?php if (has_post_thumbnail()): ?>
                                        <div class="destination-img">
                                            <?php the_post_thumbnail() ?>
                                        </div>
                                    <?php endif; ?>
                                    <div class="destination-content-wrap">
                                        <div class="destination-content">
                                            <span><?php echo esc_html__('Tours ',  'gofly-core') . esc_html('(' . sprintf('%02d', $tour_count) . ')') ?></span>
                                            <h5><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h5>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <?php
                        endwhile;
                        wp_reset_postdata();
                        ?>
                    </div>
                </div>
                <?php if (!empty($settings['gofly_destination_vector_image']['url'])) : ?>
                    <img src="<?php echo esc_url($settings['gofly_destination_vector_image']['url']); ?>" alt="<?php echo esc_attr__('vector-image', 'gofly-core'); ?>" class="vector1">
                <?php endif; ?>
            </div>
        <?php endif; ?>
<?php

    }
}

Plugin::instance()->widgets_manager->register(new Gofly_Destination_Widget());
