<div class="travel-inspiration-page pt-100 mb-100">
    <?php
    do_action('egns_page_before');
    ?>
    <?php
    // Get the sidebar enable option
    ?>
    <div class="row gy-5 <?php echo is_active_sidebar('blog_sidebar') ? 'justify-content-between' : 'justify-content-center' ?>">
        <?php

        echo apply_filters('egns_filter_blog_template', Egns\Helper\Egns_Helper::egns_get_template_part('blog', 'templates/blog', '', $params));

        // Include page content sidebar
        Egns\Helper\Egns_Helper::egns_template_part('sidebar', 'templates/sidebar');
        ?>

    </div>
    <?php
    do_action('egns_page_after');
    ?>
</div>