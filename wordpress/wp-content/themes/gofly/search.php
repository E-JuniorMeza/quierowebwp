<?php

/**
 * The template for displaying search results pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#search-result
 *
 * @package gofly
 */

get_header();


if (!is_front_page()) :
    // Include breadcrumb template
    Egns\Helper\Egns_Helper::egns_template_part('breadcrumb', 'templates/breadcrumb-search');
endif;

// Include content template
Egns\Helper\Egns_Helper::egns_template_part('content', 'templates/standard', '', ['style' => 'standard']);

get_footer();
