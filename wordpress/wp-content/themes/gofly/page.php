<?php

/**
 * The template for displaying all pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package gofly
 */

get_header();

if (!is_front_page()) :
    // Include breadcrumb template
    Egns\Helper\Egns_Helper::egns_template_part('breadcrumb', 'templates/breadcrumb-page');
endif;
?>

<div class="page-wrapper <?php if (! is_front_page()) {
                                echo 'sec-mar';
                            } ?>">
    <div class="page-content-wrapper">
        <?php
        // Hook to include additional content before blog post item
        do_action('egns_page_before');
        while (have_posts()) :
            the_post();

            the_content();
            // Pagination
            echo Egns\Inc\Blog_Helper::egns_pagination();

            // Comment 
            if (comments_open() || get_comments_number()) :
                comments_template();
            endif;

        endwhile;
        // Hook to include additional content after blog post item
        do_action('egns_page_after');
        ?>
    </div>
</div>




<?php get_footer(); ?>