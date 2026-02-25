<?php
/**
 * The Template for displaying product archives (customized)
 * 
 * The Template for displaying product archives, including the main shop page which is a post type archive
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/archive-product.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see https://woocommerce.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 8.6.0
 */

defined('ABSPATH') || exit;

get_header();

if (!is_front_page()) {

    // Include breadcrumb template
    Egns\Helper\Egns_Helper::egns_template_part('breadcrumb', 'templates/breadcrumb-product');
}


/**
 * Hook: woocommerce_before_main_content.
 *
 * @hooked woocommerce_output_content_wrapper - 10 (outputs opening divs for the content)
 * @hooked woocommerce_breadcrumb - 20
 * @hooked WC_Structured_Data::generate_website_data() - 30
 */
do_action('woocommerce_before_main_content');

?>

<div class="shop-page" id="scroll-section">
    <div class="container">
        <div class="row">
            <div class="<?php echo Egns\Helper\Egns_Helper::egns_get_theme_option('shop_sidebar_enable') == true && is_active_sidebar('shop_sidebar') ? 'col-lg-9' : 'col-lg-12' ?> order-lg-2 order-1">
                <?php if (woocommerce_product_loop()) : ?>
                    <div class="row gy-5">
                        <?php while (have_posts()) : the_post(); ?>
                            <div class="col-xl-<?php echo Egns\Helper\Egns_Helper::egns_get_theme_option('product_column') ?> col-lg-4 col-sm-6 wow animate fadeInDown" data-wow-delay="200ms" data-wow-duration="1500ms">
                                <!-- Loop Starts -->
                                <?php do_action('egns_gofly_shop_page_product_card'); ?>
                                <!-- Loop ends -->
                            </div>
                        <?php endwhile; ?>
                    </div>
                    <?php
                    global $wp_query;
                    // Get the total number of pages.
                    $total_pages = $wp_query->max_num_pages;
                    // Only paginate if there are multiple pages.
                    if ($total_pages > 1) {
                        $current_page = max(1, get_query_var('paged'));
                    ?>

                        <div class="row">
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
                        </div>
                    <?php
                    }
                    ?>
                <?php else : ?>
                    <?php do_action('egns_gofly_shop_page_no_products'); ?>
                <?php endif; ?>
            </div>
        </div>
    </div>
</div>

<?php

/**
 * Hook: woocommerce_after_main_content.
 *
 * @hooked woocommerce_output_content_wrapper_end - 10 (outputs closing divs for the content)
 */
do_action('woocommerce_after_main_content');


get_footer();
