<?php

/**
 * The template for displaying archive pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package gofly
 */

use Egns\Helper\Egns_Helper;

get_header();

if (!is_front_page()) {
    // Include breadcrumb template
    Egns\Helper\Egns_Helper::egns_template_part('breadcrumb', 'templates/breadcrumb-archive');
}


?>

<div class="destination-page pt-100 mb-100">
    <div class="container">
        <div class="row gy-md-5 gy-4">
            <?php
            $destination_counts = Egns_Helper::egns_get_counts_by_custom_meta_key('EGNS_TOUR_META_ID', 'tour_destination_select', 'tour');

            while (have_posts()) :
                the_post();

                $destination_id = get_the_ID();
                $tour_count     = isset($destination_counts[$destination_id]) ? $destination_counts[$destination_id] : 0;
            ?>
                <div class="col-lg-3 col-md-4 col-sm-6 wow animate fadeInDown" data-wow-delay="200ms" data-wow-duration="1500ms">
                    <div class="destination-card2">
                        <?php if (has_post_thumbnail()) : ?>
                            <a href="<?php the_permalink() ?>" class="destination-img">
                                <?php the_post_thumbnail() ?>
                            </a>
                        <?php endif; ?>
                        <div class="destination-content">
                            <h5><a href="<?php the_permalink() ?>"><?php the_title() ?></a></h5>
                            <span><?php echo esc_html__('Tours ', 'gofly') . esc_html('(' . $tour_count . ')') ?></span>
                        </div>
                    </div>
                </div>
            <?php endwhile; ?>
        </div>
        <?php Egns\Helper\Egns_Helper::egns_template_part('blog', 'templates/common/pagination'); ?>
    </div>
</div>

<?php

get_footer();
