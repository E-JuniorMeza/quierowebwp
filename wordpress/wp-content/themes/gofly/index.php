<?php

get_header();

if (is_home()) {
    // Include breadcrumb template
    Egns\Helper\Egns_Helper::egns_template_part('breadcrumb', 'templates/breadcrumb-archive');
}

// Include content template
Egns\Helper\Egns_Helper::egns_template_part('content', 'templates/standard', '', ['style' => 'standard']);


get_footer();
