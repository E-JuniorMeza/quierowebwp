<div class="<?php echo is_active_sidebar('blog_sidebar') ? 'col-xl-7 col-lg-8' : 'col-lg-10' ?>">
    <?php
    $params = get_option('egns_theme_options');

    if (!empty($params)) {
        if ($params['blog_layout_options'] == 'standard') {
            // Include standard content loop
            Egns\Helper\Egns_Helper::egns_template_part('blog', 'templates/standard/loop');
        } else if ($params['blog_layout_options'] == 'grid') {
            // Include standard content loop
            Egns\Helper\Egns_Helper::egns_template_part('blog', 'templates/grid/loop');
        }
        
    } else {
        Egns\Helper\Egns_Helper::egns_template_part('blog', 'templates/standard/loop');
    }

    ?>
</div>