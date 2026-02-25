<?php

namespace Elementor;

if (!defined('ABSPATH')) exit;  // Exit if accessed directly

use Elementor\core\Schemes;
use Egns_Core\Egns_Helper;

class Gofly_Country_Serve_Widget extends Widget_Base
{

    public function get_name()
    {
        return 'gofly_country_serve';
    }

    public function get_title()
    {
        return esc_html__('EG Country Serve', 'gofly-core');
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
            'gofly_country_serve_genaral',
            [
                'label' => esc_html__('General', 'gofly-core')
            ]
        );

        $this->add_control(
            'gofly_country_serve_genaral_header_title',
            [
                'label'       => __('Title', 'gofly-core'),
                'type'        => \Elementor\Controls_Manager::TEXT,
                'default'     => __('Countries We Serve', 'gofly-core'),
                'label_block' => true,
            ]
        );


        $this->add_control(
            'gofly_country_serve_genaral_header_short_description',
            [
                'label'       => __('Short Description', 'gofly-core'),
                'type'        => \Elementor\Controls_Manager::TEXTAREA,
                'default'     => __('A curated list of the most popular travel packages based on different destinations.', 'gofly-core'),
                'label_block' => true,
            ]
        );

        $this->add_control(
            'gofly_country_serve_genaral_continent_icon_image',
            [
                'label'       => esc_html__('Continent Icon Image', 'gofly-core'),
                'type'        => \Elementor\Controls_Manager::MEDIA,
                'media_types' => ['svg', 'image'],
                'default'     => [
                    'url' => \Elementor\Utils::get_placeholder_image_src(),
                ]
            ]
        );

        // Post Query 
        $this->add_control(
            'gofly_country_serve_genaral_query_area',
            [
                'label'     => esc_html__('Post Query', 'gofly-core'),
                'type'      => \Elementor\Controls_Manager::HEADING,
                'separator' => 'after',
            ]
        );
        $this->add_control(
            'gofly_country_serve_genaral_query_area_order',
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
            'gofly_country_serve_genaral_query_area_orderby',
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
            'gofly_country_serve_genaral_query_area_post_per_page',
            [
                'label'   => esc_html__('Posts Per Page', 'gofly-core'),
                'type'    => Controls_Manager::NUMBER,
                'default' => 8,
            ]
        );
        $this->add_control(
            'gofly_country_serve_genaral_query_area_continent',
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
            'gofly_country_serve_genaral_query_area_lists',
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
            'gofly_country_serve_genaral_button_label',
            [
                'label'       => __('Button Label', 'gofly-core'),
                'type'        => \Elementor\Controls_Manager::TEXT,
                'default'     => __('See All Requirement', 'gofly-core'),
                'label_block' => true,
            ]
        );

        $this->end_controls_section();

        //============Style One Start=============//

        $this->start_controls_section(
            'gofly_country_serve_style_genaral',
            [
                'label' => esc_html__('Styles', 'gofly-core'),
                'tab'   => Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_control(
            'gofly_country_serve_style_genaral_global_section',
            [
                'label'     => esc_html__('Global Section', 'gofly-core'),
                'type'      => \Elementor\Controls_Manager::HEADING,
                'separator' => 'after',
            ]
        );

        $this->add_control(
            'gofly_country_serve_style_genaral_global_section_line_color',
            [
                'label'     => esc_html__('Border Line Color', 'gofly-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .home8-country-serve-section .single-item .line' => 'fill: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'gofly_country_serve_style_genaral_global_section_border_color',
            [
                'label'     => esc_html__('Border Color', 'gofly-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .home8-country-serve-section .single-item' => 'border: 1px solid {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'gofly_country_serve_style_genaral_title',
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
                'name'     => 'gofly_country_serve_style_genaral_title_typ',
                'selector' => '{{WRAPPER}} .section-title h2',

            ]
        );

        $this->add_control(
            'gofly_country_serve_style_genaral_title_color',
            [
                'label'     => esc_html__('Color', 'gofly-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .section-title h2' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'gofly_country_serve_style_genaral_short_description',
            [
                'label'     => esc_html__('Short Description', 'gofly-core'),
                'type'      => \Elementor\Controls_Manager::HEADING,
                'separator' => 'after',
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'label'    => esc_html__('Typography', 'gofly-core'),
                'name'     => 'gofly_country_serve_style_genaral_short_description',
                'selector' => '{{WRAPPER}} .section-title p',

            ]
        );

        $this->add_control(
            'gofly_country_serve_style_genaral_short_description_color',
            [
                'label'     => esc_html__('Color', 'gofly-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .section-title p' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'gofly_country_serve_style_genaral_continent_name',
            [
                'label'     => esc_html__('Continent Name', 'gofly-core'),
                'type'      => \Elementor\Controls_Manager::HEADING,
                'separator' => 'after',
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'label'    => esc_html__('Typography', 'gofly-core'),
                'name'     => 'gofly_country_serve_style_genaral_continent_name_typ',
                'selector' => '{{WRAPPER}} .home8-country-serve-section .single-item .title-area h4',

            ]
        );

        $this->add_control(
            'gofly_country_serve_style_genaral_continent_name_color',
            [
                'label'     => esc_html__('Color', 'gofly-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .home8-country-serve-section .single-item .title-area h4' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'gofly_country_serve_style_genaral_destination_name',
            [
                'label'     => esc_html__('Destination Name', 'gofly-core'),
                'type'      => \Elementor\Controls_Manager::HEADING,
                'separator' => 'after',
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'label'    => esc_html__('Typography', 'gofly-core'),
                'name'     => 'gofly_country_serve_style_genaral_destination_name_typ',
                'selector' => '{{WRAPPER}} .home8-country-serve-section .single-item ul li',

            ]
        );

        $this->add_control(
            'gofly_country_serve_style_genaral_destination_name_color',
            [
                'label'     => esc_html__('Color', 'gofly-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .home8-country-serve-section .single-item ul li' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'gofly_country_serve_style_genaral_button',
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
                'name'     => 'gofly_country_serve_style_genaral_button_typ',
                'selector' => '{{WRAPPER}} .primary-btn1',

            ]
        );

        $this->add_control(
            'gofly_country_serve_style_genaral_button_color',
            [
                'label'     => esc_html__('Color', 'gofly-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .primary-btn1' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'gofly_country_serve_style_genaral_button_hover_color',
            [
                'label'     => esc_html__('Hover Color', 'gofly-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .primary-btn1:hover' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'gofly_country_serve_style_genaral_button_icon_color',
            [
                'label'     => esc_html__('Icon Color', 'gofly-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .primary-btn1 > span svg' => 'fill: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'gofly_country_serve_style_genaral_button_icon_hover_color',
            [
                'label'     => esc_html__('Hover Icon Color', 'gofly-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .primary-btn1:hover > span svg' => 'fill: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'gofly_country_serve_style_genaral_button_bg_color',
            [
                'label'     => esc_html__('Background Color', 'gofly-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .primary-btn1.five' => 'background-color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'gofly_country_serve_style_genaral_button_hover_bg_color',
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

        $continen_ids = $settings['gofly_country_serve_genaral_query_area_continent'];

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

        <div class="home8-country-serve-section">
            <div class="container">
                <div class="row justify-content-center mb-50 wow animate fadeInDown" data-wow-delay="200ms" data-wow-duration="1500ms">
                    <div class="col-lg-6">
                        <div class="section-title text-center">
                            <?php if (!empty($settings['gofly_country_serve_genaral_header_title'])): ?>
                                <h2><?php echo esc_html($settings['gofly_country_serve_genaral_header_title']); ?></h2>
                            <?php endif; ?>
                            <?php if (!empty($settings['gofly_country_serve_genaral_header_short_description'])): ?>
                                <p><?php echo esc_html($settings['gofly_country_serve_genaral_header_short_description']); ?></p>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
                <div class="row g-xl-4 g-md-3 g-4">
                    <?php foreach ($terms as $key => $term): ?>
                        <div class="col-lg-3 col-md-4 col-sm-6 wow animate fadeInUp" data-wow-delay="200ms" data-wow-duration="1500ms">
                            <div class="single-item">
                                <?php
                                $thumb          = get_term_meta($term->term_id, 'egns_taxonomy_continen', true);
                                $continen_count = Egns_Helper::get_tour_count_by_continent($term->term_id);
                                ?>
                                <div class="title-area">
                                    <?php if (!empty($settings['gofly_country_serve_genaral_continent_icon_image']['url'])): ?>
                                        <img src="<?php echo esc_url($settings['gofly_country_serve_genaral_continent_icon_image']['url']); ?>" alt="<?php echo esc_attr__('icon-image', 'gofly-core'); ?>">
                                    <?php endif; ?>
                                    <h4><?php echo esc_html($term->name) ?></h4>
                                </div>
                                <svg class="line" height="6" viewBox="0 0 262 6" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M5 2.5L0 0.113249V5.88675L5 3.5V2.5ZM257 3.5L262 5.88675V0.113249L257 2.5V3.5ZM4.5 3.5H257.5V2.5H4.5V3.5Z" />
                                </svg>

                                <?php

                                $selected_post_ids = $settings['gofly_country_serve_genaral_query_area_lists'];

                                $args = array(
                                    'post_type'      => 'destination',
                                    'order'          => $settings['gofly_country_serve_genaral_query_area_order'],
                                    'orderby'        => $settings['gofly_country_serve_genaral_query_area_orderby'],
                                    'posts_per_page' => $settings['gofly_country_serve_genaral_query_area_post_per_page'],
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
                                <ul>
                                    <?php
                                    while ($Query->have_posts()):
                                        $Query->the_post();
                                    ?>
                                        <li>
                                            <?php if (!empty(Egns_Helper::egns_get_destination_value('destination_country_flag', 'url'))): ?>
                                                <img src="<?php echo esc_url(Egns_Helper::egns_get_destination_value('destination_country_flag', 'url')) ?>" alt="<?php echo esc_attr__('Flag', 'gofly-core') ?>">
                                            <?php endif; ?>
                                            <?php the_title() ?>
                                        </li>

                                    <?php
                                    endwhile;
                                    wp_reset_postdata();
                                    ?>
                                </ul>
                                <?php if (!empty($settings['gofly_country_serve_genaral_button_label'])): ?>
                                    <a href="<?php echo esc_url(get_term_link($term)); ?>" class="primary-btn1 two five">
                                        <span>
                                            <?php echo esc_html($settings['gofly_country_serve_genaral_button_label']); ?>
                                            <svg width="10" height="10" viewBox="0 0 10 10" xmlns="http://www.w3.org/2000/svg">
                                                <path
                                                    d="M9.73535 1.14746C9.57033 1.97255 9.32924 3.26406 9.24902 4.66797C9.16817 6.08312 9.25559 7.5453 9.70214 8.73633C9.84754 9.12406 9.65129 9.55659 9.26367 9.70215C8.9001 9.83849 8.4969 9.67455 8.32812 9.33398L8.29785 9.26367L8.19921 8.98438C7.73487 7.5758 7.67054 5.98959 7.75097 4.58203C7.77875 4.09598 7.82525 3.62422 7.87988 3.17969L1.53027 9.53027C1.23738 9.82317 0.762615 9.82317 0.469722 9.53027C0.176829 9.23738 0.176829 8.76262 0.469722 8.46973L6.83593 2.10254C6.3319 2.16472 5.79596 2.21841 5.25 2.24902C3.8302 2.32862 2.2474 2.26906 0.958003 1.79102L0.704097 1.68945L0.635738 1.65527C0.303274 1.47099 0.157578 1.06102 0.310542 0.704102C0.463655 0.347333 0.860941 0.170391 1.22363 0.28418L1.29589 0.310547L1.48828 0.387695C2.47399 0.751207 3.79966 0.827571 5.16601 0.750977C6.60111 0.670504 7.97842 0.428235 8.86132 0.262695L9.95312 0.0585938L9.73535 1.14746Z">
                                                </path>
                                            </svg>
                                        </span>
                                        <span>
                                            <?php echo esc_html($settings['gofly_country_serve_genaral_button_label']); ?>
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
                    <?php endforeach; ?>
                </div>
            </div>
        </div>

<?php

    }
}

Plugin::instance()->widgets_manager->register(new Gofly_Country_Serve_Widget());
