<?php

/**
 * The template for displaying archive pages
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

// Include content template
Egns\Helper\Egns_Helper::egns_template_part('content', 'templates/standard', '', ['style' => 'standard']);


get_footer();
