<?php

namespace Elementor;

if (!defined('ABSPATH')) exit;  // Exit if accessed directly

use Elementor\core\Schemes;
use Egns_Core\Egns_Helper;

class Gofly_Mega_Menu_Widget extends Widget_Base
{

    public function get_name()
    {
        return 'gofly_mega_menu';
    }

    public function get_title()
    {
        return esc_html__('EG Mega Menu', 'gofly-core');
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
            'gofly_mega_menu_genaral',
            [
                'label' => esc_html__('General', 'gofly-core')
            ]
        );

        // Post Query 
        $this->add_control(
            'gofly_mega_menu_genaral_query_area',
            [
                'label'     => esc_html__('Post Query', 'gofly-core'),
                'type'      => \Elementor\Controls_Manager::HEADING,
                'separator' => 'after',
            ]
        );
        $this->add_control(
            'gofly_mega_menu_genaral_query_area_order',
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
            'gofly_mega_menu_genaral_query_area_orderby',
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
            'gofly_mega_menu_genaral_query_area_post_per_page',
            [
                'label'   => esc_html__('Posts Per Page', 'gofly-core'),
                'type'    => Controls_Manager::NUMBER,
                'default' => 8,
            ]
        );
        $this->add_control(
            'gofly_mega_menu_genaral_query_area_continent',
            [
                'label'       => esc_html__('Destination Continent', 'gofly-core'),
                'type'        => \Elementor\Controls_Manager::SELECT2,
                'label_block' => true,
                'multiple'    => true,
                'options'     => \Egns_Core\Egns_Helper::get_post_terms_options('destination-continent'),
                'description' => esc_html__('Show destination only selected continen', 'gofly-core'),
            ]
        );
        $this->add_control(
            'gofly_mega_menu_genaral_query_area_lists',
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
            'gofly_mega_menu_genaral_vector_image_one',
            [
                'label'   => esc_html__('Vector Image One', 'gofly-core'),
                'type'    => \Elementor\Controls_Manager::MEDIA,
                'default' => [
                    'url' => \Elementor\Utils::get_placeholder_image_src(),
                ],
                'media_types' => ['image', 'svg'],
            ]
        );

        $this->add_control(
            'gofly_mega_menu_genaral_vector_image_two',
            [
                'label'   => esc_html__('Vector Image Two', 'gofly-core'),
                'type'    => \Elementor\Controls_Manager::MEDIA,
                'default' => [
                    'url' => \Elementor\Utils::get_placeholder_image_src(),
                ],
                'media_types' => ['image', 'svg'],
            ]
        );

        $this->end_controls_section();
    }
    protected function render()
    {

        $settings = $this->get_settings_for_display();

        $continen_ids = $settings['gofly_mega_menu_genaral_query_area_continent'];

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

        <div class="menu-row">
            <?php foreach ($terms as $key => $term): ?>
                <div class="menu-single-item">
                    <?php
                    $thumb          = get_term_meta($term->term_id, 'egns_taxonomy_continen', true);
                    $continen_count = Egns_Helper::get_tour_count_by_continent($term->term_id);
                    ?>
                    <div class="menu-title">
                        <h5><?php echo esc_html($term->name) ?></h5>
                    </div>
                    <i class="bi bi-plus dropdown-icon"></i>
                    <?php

                    $selected_post_ids = $settings['gofly_mega_menu_genaral_query_area_lists'];

                    $args = array(
                        'post_type'      => 'destination',
                        'order'          => $settings['gofly_mega_menu_genaral_query_area_order'],
                        'orderby'        => $settings['gofly_mega_menu_genaral_query_area_orderby'],
                        'posts_per_page' => $settings['gofly_mega_menu_genaral_query_area_post_per_page'],
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
                                <a href="<?php echo esc_url(get_permalink()); ?>">
                                    <?php if (!empty(Egns_Helper::egns_get_destination_value('destination_country_flag', 'url'))): ?>
                                        <img src="<?php echo esc_url(Egns_Helper::egns_get_destination_value('destination_country_flag', 'url')) ?>" alt="<?php echo esc_attr__('Flag', 'gofly-core') ?>">
                                    <?php endif; ?>
                                    <?php the_title() ?>
                                </a>
                            </li>
                        <?php
                        endwhile;
                        wp_reset_postdata();
                        ?>

                    </ul>
                </div>
            <?php endforeach; ?>
        </div>
        <?php if (!empty($settings['gofly_mega_menu_genaral_vector_image_one']['url'])): ?>
            <img src="<?php echo esc_url($settings['gofly_mega_menu_genaral_vector_image_one']['url']); ?>" alt="<?php echo esc_attr__('vector-image-one', 'gofly-core'); ?>" class="vector1">
        <?php endif; ?>
        <?php if (!empty($settings['gofly_mega_menu_genaral_vector_image_two']['url'])): ?>
            <img src="<?php echo esc_url($settings['gofly_mega_menu_genaral_vector_image_two']['url']); ?>" alt="<?php echo esc_attr__('vector-image-one', 'gofly-core'); ?>" class="vector2">
        <?php endif; ?>

<?php

    }
}

Plugin::instance()->widgets_manager->register(new Gofly_Mega_Menu_Widget());
