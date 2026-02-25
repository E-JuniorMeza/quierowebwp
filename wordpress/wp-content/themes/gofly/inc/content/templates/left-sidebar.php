<?php

// Hook to include additional content before page content holder
do_action('egns_page_before');

?>
<div class="blog-section pt-120 pb-120" id="next">
    <div class="container">
        <div class="row gy-5">
            <?php
            // Include page content sidebar
            Egns\Helper\Egns_Helper::egns_template_part('sidebar', 'templates/sidebar');

            // Include blog template
            echo apply_filters('egns_filter_blog_template', Egns\Helper\Egns_Helper::egns_get_template_part('blog', 'templates/blog', '', $params));
            ?>
        </div>
    </div>
</div>
<?php

// Hook to include additional content after main page content holder
do_action('egns_page_after');

?>