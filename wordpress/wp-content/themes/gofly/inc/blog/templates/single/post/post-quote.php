<?php

use Egns\Inc\Blog_Helper;

// Get the sidebar enable option
$sidebar_enabled = Egns\Helper\Egns_Helper::egns_get_theme_option('sideaber_area_enable');

?>
<div class="<?php echo is_active_sidebar('blog_sidebar') ? 'col-xl-7 col-lg-8' : 'col-lg-10' ?>">

    <div class="inspiration-details">
        <?php if (Egns\Inc\Blog_Helper::egns_quote_content()) : ?>
            <div class="post-thumb">
                <?php Egns\Helper\Egns_Helper::egns_template_part('blog', 'templates/standard/parts/quote'); ?>
            </div>
        <?php endif; ?>
        
        <?php Egns\Helper\Egns_Helper::egns_template_part('blog', 'templates/common/single/content'); ?>
        
        <!-- Page pagination -->
        <div class="page-paginate">
            <?php Egns\Helper\Egns_Helper::egns_get_post_pagination(); ?>
        </div>
        <!-- Tags & Social area -->
        <?php Egns\Helper\Egns_Helper::egns_template_part('blog', 'templates/common/single/post-tags'); ?>

        <!-- Comments Section -->
        <?php
        //If comments are open or we have at least one comment, load up the comment template.
        if (comments_open() || get_comments_number()) {
            comments_template();
        }
        ?>
    </div>
</div>

<?php
// // If the option is explicitly set to false or doesn't exist, hide the sidebar
// if ($sidebar_enabled === false || $sidebar_enabled === 'false' || empty($sidebar_enabled)) {
//     // Don't show the sidebar
// } else {
// Show the sidebar
Egns\Helper\Egns_Helper::egns_template_part('sidebar', 'templates/sidebar');
// }
