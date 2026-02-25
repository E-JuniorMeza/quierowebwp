<?php

namespace Elementor;

if (!defined('ABSPATH')) exit;  // Exit if accessed directly

use Egns\Helper\Egns_Helper as HelperEgns_Helper;
use Elementor\core\Schemes;
use Egns_Core\Egns_Helper;

class Gofly_Experience_Destination_Widget extends Widget_Base
{

    public function get_name()
    {
        return 'gofly_experience_experience_destination';
    }

    public function get_title()
    {
        return esc_html__('EG Experience Destination', 'gofly-core');
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

        //===================== Destination Content =======================//

        $this->start_controls_section(
            'gofly_experience_destination_section',
            [
                'label' => esc_html__('Destination Content', 'gofly-core')
            ]
        );
        $this->add_control(
            'gofly_experience_destination_widget_style',
            [
                'label'   => esc_html__('Select Style', 'gofly-core'),
                'type'    => \Elementor\Controls_Manager::SELECT,
                'options' => [
                    'grid'   => esc_html__('Widget Style Grid', 'gofly-core'),
                    'slider' => esc_html__('Widget Style Slider', 'gofly-core'),
                ],
                'default' => 'grid',
            ]
        );
        $this->add_control(
            'hr',
            [
                'type' => \Elementor\Controls_Manager::DIVIDER,
            ]
        );

        $this->add_control(
            'gofly_experience_destination_title',
            [
                'label'       => esc_html__('Title', 'gofly-core'),
                'type'        => \Elementor\Controls_Manager::TEXT,
                'default'     => esc_html__('Popular Activities Place', 'gofly-core'),
                'placeholder' => esc_html__('Type your title here', 'gofly-core'),
                'label_block' => true,
            ]
        );

        // Post Query 
        $this->add_control(
            'gofly_experience_destination_query_area',
            [
                'label'     => esc_html__('Post Query', 'gofly-core'),
                'type'      => \Elementor\Controls_Manager::HEADING,
                'separator' => 'after',
            ]
        );

        $this->add_control(
            'gofly_experience_destination_order',
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
            'gofly_experience_destination_orderby',
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
            'gofly_experience_destination_post_per_page',
            [
                'label'   => esc_html__('Posts Per Page', 'gofly-core'),
                'type'    => Controls_Manager::NUMBER,
                'default' => 8,
            ]
        );

        $this->add_control(
            'gofly_experience_destination_selected_continen',
            [
                'label'       => esc_html__('Destination Continen', 'gofly-core'),
                'type'        => \Elementor\Controls_Manager::SELECT2,
                'label_block' => true,
                'multiple'    => true,
                'options'     => \Egns_Core\Egns_Helper::get_post_terms_options('destination-continent'),
                'description' => esc_html__('Show experience category only selected continen', 'gofly-core'),
            ]
        );
        $this->add_control(
            'gofly_experience_destination_post_list',
            [
                'label'       => esc_html__('Destination lists', 'gofly-core'),
                'type'        => \Elementor\Controls_Manager::SELECT2,
                'label_block' => true,
                'multiple'    => true,
                'options'     => \Egns_Core\Egns_Helper::get_post_list_options('destination'),
                'description' => esc_html__('Selected post only show when any listed continen have that.', 'gofly-core'),
            ]
        );

        $this->end_controls_section();


        //===================== Destination Content Style =======================//

        $this->start_controls_section(
            'gofly_experience_destination_section_style',
            [
                'label' => esc_html__('Destination Content Style', 'gofly-core'),
                'tab'   => \Elementor\Controls_Manager::TAB_STYLE,
            ]
        );

        // Section Title
        $this->add_control(
            'gofly_experience_destination_title_options',
            [
                'label'     => esc_html__('Section Title Options', 'gofly-core'),
                'type'      => \Elementor\Controls_Manager::HEADING,
                'separator' => 'before',
            ]
        );
        $this->add_control(
            'gofly_experience_destination_title_color',
            [
                'label'     => esc_html__('Color', 'gofly-core'),
                'type'      => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .section-title h2' => 'color: {{VALUE}}',
                ],
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name'     => 'gofly_experience_destination_title_typography',
                'selector' => '{{WRAPPER}} .section-title h2',
            ]
        );

        // Card Title
        $this->add_control(
            'gofly_experience_destination_sld_crd_title_options',
            [
                'label'     => esc_html__('Card Title Options', 'gofly-core'),
                'type'      => \Elementor\Controls_Manager::HEADING,
                'separator' => 'before',
            ]
        );
        $this->add_control(
            'gofly_experience_destination_sld_crd_title_color',
            [
                'label'     => esc_html__('Color', 'gofly-core'),
                'type'      => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .destination-card3 .destination-content h2 a' => 'color: {{VALUE}}',
                ],
            ]
        );
        $this->add_control(
            'gofly_experience_destination_sld_crd_hvr_title_color',
            [
                'label'     => esc_html__('Hover Color', 'gofly-core'),
                'type'      => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .destination-card3 .destination-content h2 a:hover' => 'color: {{VALUE}}',
                ],
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name'     => 'gofly_experience_destination_sld_crd_title_typography',
                'selector' => '{{WRAPPER}} .destination-card3 .destination-content h2 a',
            ]
        );

        // Card Info
        $this->add_control(
            'gofly_experience_destination_cdr_info_options',
            [
                'label'     => esc_html__('Card Info options', 'gofly-core'),
                'type'      => \Elementor\Controls_Manager::HEADING,
                'separator' => 'before',
            ]
        );
        $this->add_control(
            'gofly_experience_destination_cdr_info_color',
            [
                'label'     => esc_html__('Color', 'gofly-core'),
                'type'      => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .destination-card3 .destination-content span' => 'color: {{VALUE}}',
                ],
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name'     => 'gofly_experience_destination_cdr_info_typography',
                'selector' => '{{WRAPPER}} .destination-card3 .destination-content span',
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
                var swiper = new Swiper(".destionation4-slider", {
                    slidesPerView: 1,
                    speed: 1500,
                    spaceBetween: 30,
                    autoplay: {
                        delay: 2500, // Autoplay duration in milliseconds
                        pauseOnMouseEnter: true,
                        disableOnInteraction: false,
                    },
                    pagination: {
                        el: ".swiper-pagination1",
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
                            slidesPerView: 2,
                            spaceBetween: 15,
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
                            spaceBetween: 15,
                        },
                        1400: {
                            slidesPerView: 3,
                            spaceBetween: 24,
                        },
                    },
                });
            </script>
        <?php endif; ?>

        <?php if ('grid' == $settings['gofly_experience_destination_widget_style']): ?>
            <div class="home6-destination-section">
                <div class="container">
                    <div class="row justify-content-center mb-50 wow animate fadeInDown" data-wow-delay="200ms" data-wow-duration="1500ms">
                        <div class="col-xl-6 col-lg-8">
                            <div class="section-title text-center">
                                <h2><?php echo esc_html($settings['gofly_experience_destination_title']) ?></h2>
                            </div>
                        </div>
                    </div>
                    <div class="destination-parent">

                        <?php

                        $destination_counts = Egns_Helper::egns_get_counts_by_custom_meta_key('EGNS_EXPERIENCE_META_ID', 'experience_destination_select', 'experience');

                        $selected_post_ids = $settings['gofly_experience_destination_post_list'];
                        $continen_ids      = $settings['gofly_experience_destination_selected_continen'];

                        $args = array(
                            'post_type'      => 'destination',
                            'order'          => $settings['gofly_experience_destination_order'],
                            'orderby'        => $settings['gofly_experience_destination_orderby'],
                            'posts_per_page' => $settings['gofly_experience_destination_post_per_page'],
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

                        while ($Query->have_posts()):
                            $Query->the_post();

                            $destination_id   = get_the_ID();
                            $experience_count = isset($destination_counts[$destination_id]) ? $destination_counts[$destination_id] : 0;

                        ?>
                            <div class="destination-card3">
                                <?php the_post_thumbnail() ?>
                                <div class="destination-content">
                                    <h2><a href="<?php the_permalink() ?>"><?php the_title() ?></a></h2>
                                    <span><?php echo sprintf('%02d', $experience_count) . ' ' . esc_html__('Activities', 'gofly-core') ?> </span>
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

        <?php if ('slider' == $settings['gofly_experience_destination_widget_style']): ?>
            <div class="destination4-page">
                <div class="container">
                    <div class="swiper destionation4-slider mb-40">
                        <div class="swiper-wrapper">
                            <?php
                            $destination_counts = Egns_Helper::egns_get_counts_by_custom_meta_key('EGNS_EXPERIENCE_META_ID', 'experience_destination_select', 'experience');

                            $selected_post_ids = $settings['gofly_experience_destination_post_list'];
                            $continen_ids      = $settings['gofly_experience_destination_selected_continen'];

                            $args = array(
                                'post_type'      => 'destination',
                                'order'          => $settings['gofly_experience_destination_order'],
                                'orderby'        => $settings['gofly_experience_destination_orderby'],
                                'posts_per_page' => $settings['gofly_experience_destination_post_per_page'],
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

                            if (!empty($selected_post_ids)) {
                                $args['post__in'] = $selected_post_ids;
                            }

                            $Query = new \WP_Query($args);

                            $toggle  = 1;      // Start with 1 card
                            $current = 0;      // Track how many items are inside the current slide
                            $opened  = false;

                            while ($Query->have_posts()):
                                $Query->the_post();
                                $destination_id   = get_the_ID();
                                $experience_count = isset($destination_counts[$destination_id]) ? $destination_counts[$destination_id] : 0;

                                // Open slide if not already
                                if (!$opened) {
                                    echo '<div class="swiper-slide">';
                                    $opened  = true;
                                    $current = 0;
                                }

                                // Add sm-card only when slide contains 2 items
                                $extra_class = ($toggle === 2) ? ' sm-card' : '';
                            ?>
                                <div class="destination-card3<?php echo esc_attr($extra_class); ?>">
                                    <?php the_post_thumbnail(); ?>
                                    <div class="destination-content">
                                        <h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
                                        <span><?php echo sprintf('%02d', $experience_count) . ' ' . esc_html__('Activities', 'gofly-core'); ?></span>
                                    </div>
                                </div>
                            <?php

                                $current++;

                                // If we reached limit for this slide (1 or 2), close it
                                if ($current >= $toggle) {
                                    echo '</div>';
                                    $opened = false;
                                    $toggle = ($toggle === 1) ? 2 : 1;  // switch 1 <-> 2
                                }

                            endwhile;

                            // Close last slide if still open
                            if ($opened) {
                                echo '</div>';
                            }

                            wp_reset_postdata();
                            ?>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-12 d-flex justify-content-center">
                            <div class="swiper-pagination1 paginations"></div>
                        </div>
                    </div>
                </div>
            </div>
        <?php endif; ?>



<?php

    }
}

Plugin::instance()->widgets_manager->register(new Gofly_Experience_Destination_Widget());
