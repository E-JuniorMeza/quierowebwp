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
    Egns\Helper\Egns_Helper::egns_template_part('breadcrumb', 'templates/breadcrumb-search');
}
?>

<div class="visa-package-grid-section pt-100 pb-100">
    <div class="container">
        <div class="row gy-5">
            <?php
            if (have_posts()) {
                while (have_posts()) : the_post();
                    $process_time = Egns_Helper::egns_get_visa_value('visa_process_time');
            ?>
                    <div class="col-lg-3 col-md-4 col-sm-6 wow animate fadeInDown" data-wow-delay="200ms" data-wow-duration="1500ms">
                        <div class="visa-package-card">
                            <?php if (has_post_thumbnail()) : ?>
                                <div class="visa-package-img">
                                    <?php the_post_thumbnail() ?>
                                </div>
                            <?php endif; ?>
                            <div class="visa-package-content">
                                <h5><a href="<?php the_permalink() ?>"><?php the_title() ?></a></h5>
                                <span><?php echo esc_html__('Processing Time', 'gofly') ?> - <strong><?php echo esc_html($process_time) ?></strong></span>
                            </div>
                        </div>
                    </div><?php
                        endwhile;
                    } else {
                        // Include global posts not found
                        Egns\Helper\Egns_Helper::egns_template_part('content', 'templates/posts-not-found');
                    }
                    wp_reset_postdata();
                            ?>
            <?php
            global $wp_query;
            // Get the total number of pages.
            $total_pages = $wp_query->max_num_pages;
            // Only paginate if there are multiple pages.
            if ($total_pages > 1) {
                $current_page = max(1, get_query_var('paged'));
            ?>
                <div class="pagination-area wow animate fadeInUp mt-60" data-wow-delay="200ms" data-wow-duration="1500ms">
                    <?php if ($current_page >= 1): ?>
                        <div class="paginations-button">
                            <a href="<?php echo get_pagenum_link($current_page - 1); ?>">
                                <svg width="10" height="10" viewBox="0 0 10 10" xmlns="http://www.w3.org/2000/svg">
                                    <g>
                                        <path
                                            d="M7.86133 9.28516C7.14704 7.49944 3.57561 5.71373 1.43276 4.99944C3.57561 4.28516 6.7899 3.21373 7.86133 0.713728" stroke-width="1.5" stroke-linecap="round" />
                                    </g>
                                </svg>
                                <?php echo esc_html__('Prev', 'gofly') ?>
                            </a>
                        </div>
                    <?php endif; ?>
                    <?php
                    // Pagination
                    echo Egns\Inc\Blog_Helper::egns_pagination();
                    ?>
                    <?php if ($current_page < $total_pages): ?>
                        <div class="paginations-button">
                            <a href="<?php echo get_pagenum_link($current_page + 1); ?>">
                                <?php echo esc_html__('Next', 'gofly') ?>
                                <svg width="10" height="10" viewBox="0 0 10 10" xmlns="http://www.w3.org/2000/svg">
                                    <g>
                                        <path
                                            d="M1.42969 9.28613C2.14397 7.50042 5.7154 5.7147 7.85826 5.00042C5.7154 4.28613 2.50112 3.21471 1.42969 0.714705" stroke-width="1.5" stroke-linecap="round" />
                                    </g>
                                </svg>
                            </a>
                        </div>
                    <?php endif; ?>
                </div>
            <?php
            }
            ?>
        </div>
    </div>
</div>

<?php
get_footer();
