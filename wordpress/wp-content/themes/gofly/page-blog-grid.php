<?php

/**
 * The main template file
 *
 * Template Name: Blog Grid Template
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

?>

<div class="travel-inspiration-page pt-100 mb-100">
    <div class="container">
        <div class="row gy-5">
            <?php
            $args = array(
                'post_type'      => 'post',
                'order'          => 'DESC',
                'post_status'    => 'publish',
                'posts_per_page' => 9,
                'paged'          => (get_query_var('paged')) ? get_query_var('paged') : 1
            );
            $wp_query = new WP_Query($args);

            if ($wp_query->have_posts()) {

                while ($wp_query->have_posts()):
                    $wp_query->the_post();

                    echo apply_filters('egns_filter_blog_single_template', Egns\Helper\Egns_Helper::egns_get_template_part('blog', 'templates/grid/post/post', get_post_format() ? get_post_format() : 'default'));

                endwhile;  // End of the loop.

            } else {
                // Include global posts not found
                Egns\Helper\Egns_Helper::egns_template_part('content', 'templates/posts-not-found');
            }
            ?>
        </div>

        <?php
        Egns\Helper\Egns_Helper::egns_template_part('blog', 'templates/common/pagination');
        ?>
    </div>
</div>

<?php get_footer(); ?>