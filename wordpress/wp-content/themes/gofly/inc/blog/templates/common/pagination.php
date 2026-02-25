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
            <?php if ($current_page <= $total_pages): ?>
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