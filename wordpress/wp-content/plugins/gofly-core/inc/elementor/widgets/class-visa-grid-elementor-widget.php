<?php

namespace Elementor;

if (!defined('ABSPATH')) exit;  // Exit if accessed directly

use Elementor\core\Schemes;
use Egns_Core\Egns_Helper;

class Gofly_Visa_Grid_Widget extends Widget_Base
{

    public function get_name()
    {
        return 'gofly_visa_grid';
    }

    public function get_title()
    {
        return esc_html__('EG Visa Grid', 'gofly-core');
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
            'gofly_visa_grid_genaral',
            [
                'label' => esc_html__('General', 'gofly-core')
            ]
        );

        $this->add_control(
            'gofly_visa_grid_genaral_bg_image',
            [
                'label'   => esc_html__('Background Image', 'gofly-core'),
                'type'    => \Elementor\Controls_Manager::MEDIA,
                'default' => [
                    'url' => \Elementor\Utils::get_placeholder_image_src(),
                ],
            ]
        );

        // Post Query 
        $this->add_control(
            'gofly_visa_grid_genaral_query_area',
            [
                'label'     => esc_html__('Post Query', 'gofly-core'),
                'type'      => \Elementor\Controls_Manager::HEADING,
                'separator' => 'after',
            ]
        );

        $this->add_control(
            'gofly_visa_grid_genaral_query_area_order',
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
            'gofly_visa_grid_genaral_query_area_orderby',
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
            'gofly_visa_grid_genaral_query_area_post_per_page',
            [
                'label'   => esc_html__('Posts Per Page', 'gofly-core'),
                'type'    => Controls_Manager::NUMBER,
                'default' => 6,
            ]
        );

        $this->add_control(
            'gofly_visa_grid_genaral_query_area_selected_type',
            [
                'label'       => esc_html__('Visa Category', 'gofly-core'),
                'type'        => \Elementor\Controls_Manager::SELECT2,
                'label_block' => true,
                'multiple'    => true,
                'options'     => \Egns_Core\Egns_Helper::get_post_terms_options('visa-category'),
                'description' => esc_html__('Show experience post only selected type', 'gofly-core'),
            ]
        );

        $this->add_control(
            'gofly_visa_grid_genaral_query_area_post_list',
            [
                'label'       => esc_html__('Visa lists', 'gofly-core'),
                'type'        => \Elementor\Controls_Manager::SELECT2,
                'label_block' => true,
                'multiple'    => true,
                'options'     => \Egns_Core\Egns_Helper::get_post_list_options('visa'),
                'description' => esc_html__('Selected posts appear only when linked to an visa type. By default, all selected posts are visible.', 'gofly-core'),
            ]
        );

        $this->end_controls_section();

        // ======== Style Start ======== //
        $this->start_controls_section(
            'gofly_visa_grid_style',
            [
                'label' => esc_html__('Style', 'gofly-core'),
                'tab'   => Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_control(
            'gofly_visa_grid_style_global_area',
            [
                'label'     => esc_html__('Global Section', 'gofly-core'),
                'type'      => \Elementor\Controls_Manager::HEADING,
                'separator' => 'after',
            ]
        );

        $this->add_control(
            'gofly_visa_grid_style_global_area_bg_color',
            [
                'label' => esc_html__('Background Color', 'gofly-core'),
                'type'  => Controls_Manager::COLOR,
            ]
        );

        $this->add_control(
            'gofly_visa_grid_style_content_area',
            [
                'label'     => esc_html__('Content Area', 'gofly-core'),
                'type'      => \Elementor\Controls_Manager::HEADING,
                'separator' => 'before',
            ]
        );

        $this->add_control(
            'gofly_visa_grid_style_content_area_bg_color',
            [
                'label'     => esc_html__('Background Color', 'gofly-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .visa-package-grid-section .visa-package-card .visa-package-content' => 'background-color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'gofly_visa_grid_style_content_area_hover_bg_color',
            [
                'label'     => esc_html__('Hover Background Color', 'gofly-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .visa-package-grid-section .visa-package-card:hover .visa-package-content' => 'background-color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'gofly_visa_grid_style_title',
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
                'name'     => 'gofly_visa_grid_style_title_typ',
                'selector' => '{{WRAPPER}} .visa-package-grid-section .visa-package-card .visa-package-content h5 a',

            ]
        );

        $this->add_control(
            'gofly_visa_grid_style_title_color',
            [
                'label'     => esc_html__('Color', 'gofly-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .visa-package-grid-section .visa-package-card .visa-package-content h5 a' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'gofly_visa_grid_style_title_hover_color',
            [
                'label'     => esc_html__('Hover Color', 'gofly-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .visa-package-grid-section .visa-package-card:hover .visa-package-content h5 a' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'gofly_visa_grid_style_visa_duration',
            [
                'label'     => esc_html__('Visa Duration', 'gofly-core'),
                'type'      => \Elementor\Controls_Manager::HEADING,
                'separator' => 'after',
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'label'    => esc_html__('Typography', 'gofly-core'),
                'name'     => 'gofly_visa_grid_style_visa_duration_typ',
                'selector' => '{{WRAPPER}} .visa-package-grid-section .visa-package-card .visa-package-content h5 a',

            ]
        );

        $this->add_control(
            'gofly_visa_grid_style_visa_duration_color',
            [
                'label'     => esc_html__('Color', 'gofly-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .visa-package-grid-section .visa-package-card .visa-package-content span' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'gofly_visa_grid_style_visa_duration_hover_color',
            [
                'label'     => esc_html__('Hover Color', 'gofly-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .visa-package-grid-section .visa-package-card:hover .visa-package-content span' => 'color: {{VALUE}};',
                ],
            ]
        );


        $this->end_controls_section();
    }
    protected function render()
    {

        $settings          = $this->get_settings_for_display();
        $type_ids          = $settings['gofly_visa_grid_genaral_query_area_selected_type'];
        $selected_post_ids = $settings['gofly_visa_grid_genaral_query_area_post_list'];

        $args = array(
            'post_type'      => 'visa',
            'order'          => $settings['gofly_visa_grid_genaral_query_area_order'],
            'orderby'        => $settings['gofly_visa_grid_genaral_query_area_orderby'],
            'posts_per_page' => $settings['gofly_visa_grid_genaral_query_area_post_per_page'],
            'post_status'    => 'publish',
            'offset'         => 0,
        );

        if (!empty($type_ids)) {
            $args['tax_query'] = array(
                array(
                    'taxonomy' => 'visa-category',
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

        <div class="visa-package-grid-section" <?php if (!empty($settings['gofly_visa_grid_genaral_bg_image']['url'])) : ?> style="background-image: url(<?php echo esc_url($settings['gofly_visa_grid_genaral_bg_image']['url']); ?>), linear-gradient(180deg, <?php echo esc_attr($settings['gofly_visa_grid_style_global_area_bg_color']); ?> 0%, <?php echo esc_attr($settings['gofly_visa_grid_style_global_area_bg_color']); ?> 100%)" <?php endif; ?>>
            <div class="container">
                <div class="row gy-5">
                    <?php
                    while ($Query->have_posts()) {
                        $Query->the_post();
                        $process_time = Egns_Helper::egns_get_visa_value('visa_process_time');
                    ?>
                        <div class="col-lg-3 col-md-4 col-sm-6 wow animate fadeInDown" data-wow-delay="200ms" data-wow-duration="1500ms">
                            <div class="visa-package-card">
                                <?php if (has_post_thumbnail()): ?>
                                    <div class="visa-package-img">
                                        <?php the_post_thumbnail() ?>
                                    </div>
                                <?php endif; ?>
                                <div class="visa-package-content">
                                    <h5><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h5>
                                    <span><?php echo esc_html__('Processing Time',  'gofly-core') ?> - <strong><?php echo esc_html($process_time) ?></strong></span>
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

Plugin::instance()->widgets_manager->register(new Gofly_Visa_Grid_Widget());
