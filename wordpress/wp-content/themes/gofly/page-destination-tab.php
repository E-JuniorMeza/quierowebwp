<?php

/**
 * The main template file
 *
 * Template Name: Destination Tab Template
 *
 * @link https:   //developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package gofly
 * @since 1.0.0
 * 
 */

get_header();

if (!is_front_page()):
    // Include breadcrumb template
    Egns\Helper\Egns_Helper::egns_template_part('breadcrumb', 'templates/breadcrumb-archive');
endif;

$tax_args = array(
    'taxonomy'   => 'destination-continent',
    'hide_empty' => true,
);
$terms = get_terms($tax_args);
// Reindex the array
$terms = array_values($terms);

?>

<div class="destination-page pt-100 mb-100">
    <div class="container">
        <ul class="nav nav-pills mb-60" id="pills-tab" role="tablist">
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
                        $args = array(
                            'post_type'      => 'destination',
                            'order'          => 'desc',
                            'orderby'        => 'ID',
                            'posts_per_page' => -1,
                            'post_status'    => 'publish',
                            'offset'         => 0,
                            'tax_query'      => array(
                                array(
                                    'taxonomy' => 'destination-continent',
                                    'field'    => 'slug',
                                    'terms'    => $term->slug,
                                    'operator' => 'IN',
                                ),
                            )
                        );
                        $Query = new \WP_Query($args);
                        ?>
                        <?php

                        $destination_counts = Egns\Helper\Egns_Helper::egns_get_counts_by_custom_meta_key('EGNS_TOUR_META_ID', 'tour_destination_select', 'tour');

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
                                            <p><?php echo !empty($tour_count) ? sprintf('%02d', $tour_count) . esc_html__(' tours', 'gofly') . ' | ' . Egns\Helper\Egns_Helper::egns_get_destination_value('destination_departure') . ' ' . Egns\Helper\Egns_Helper::egns_get_destination_value('destination_guest_travelled') : Egns\Helper\Egns_Helper::egns_get_destination_value('destination_departure') . ' ' . Egns\Helper\Egns_Helper::egns_get_destination_value('destination_guest_travelled') ?></p>
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

<?php

get_footer();
