<?php

/**
 * The template for displaying tag archive pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package gofly
 */

get_header();

if (!is_front_page()) {
    // Include breadcrumb template
    Egns\Helper\Egns_Helper::egns_template_part('breadcrumb', 'templates/breadcrumb-archive');
}

?>
<div class="blog-grid-section sec-mar" id="page-wrapper">
    <div class="container">
        <div class="row g-4 mb-60">
            <?php
            if (have_posts()) {
                while (have_posts()) :
                    the_post();
                    echo Egns\Helper\Egns_Helper::egns_get_template_part('blog', 'templates/grid/post/post', get_post_format() ? get_post_format() : 'default');
                endwhile; // End of the loop.
            } else {
                // Include global posts not found
                Egns\Helper\Egns_Helper::egns_template_part('content', 'templates/posts-not-found');
            }
            ?>
        </div>
        <?php
        global $wp_query;
        // Get the total number of pages.
        $total_pages = $wp_query->max_num_pages;
        // Only paginate if there are multiple pages.
        if ($total_pages > 1) {
            $current_page = max(1, get_query_var('paged'));
        ?>
            <div class="row wow animate fadeInUp" data-wow-delay="200ms" data-wow-duration="1500ms">
                <div class="col-lg-12">
                    <div class="page-navigation-area d-flex flex-wrap align-items-center justify-content-between">
                        <?php if ($current_page > 1): ?>
                            <div class="prev-next-btn">
                                <a href="<?php echo get_pagenum_link($current_page - 1); ?>">
                                    <svg width="7" height="14" viewBox="0 0 7 14" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M0 7.00008L7 0L2.54545 7.00008L7 14L0 7.00008Z"></path>
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
                            <div class="prev-next-btn">
                                <a href="<?php echo get_pagenum_link($current_page + 1); ?>">
                                    <?php echo esc_html__('Next', 'gofly') ?>
                                    <svg width="7" height="14" viewBox="0 0 7 14" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M7 7.00008L0 0L4.45455 7.00008L0 14L7 7.00008Z"></path>
                                    </svg>
                                </a>
                            </div>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        <?php
        }
        ?>
    </div>
</div>
<?php
get_footer();
?>