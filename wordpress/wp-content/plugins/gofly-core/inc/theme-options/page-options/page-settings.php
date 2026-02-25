<?php
// Exit if accessed directly
if (!defined('ABSPATH')) {
    exit;
}

if (!class_exists('CSF')) {
    return;
}

// Set a unique slug-like ID
$prefix = 'egns_page_options';

/*-----------------------------------
	    PAGE METABOX SECTION
------------------------------------*/

CSF::createMetabox(
    $prefix,
    array(
        'title'           => esc_html__('Page Settings', 'gofly-core'),
        'post_type'       => ['post', 'page', 'visa'],
        'context'         => 'normal',
        'priority'        => 'high',
        'show_restore'    => true,
        'enqueue_webfont' => true,
        'async_ bwebfont' => false,
        'output_css'      => true,
        'theme'           => 'dark',
        'id'              => 'page_meta_option',
    )
);

// All Page Settings

$includes_files = array(

    // Genarel Page Settings
    array(
        'file-name'   => 'genarel',
        'folder-name' => EGNS_CORE_INC . '/theme-options/page-options/genarel'
    ),

    // Breadcrumb Page Settings
    array(
        'file-name'   => 'page-breadcrumbs',
        'folder-name' => EGNS_CORE_INC . '/theme-options/page-options/breadcrumbs'
    ),

    // User Settings
    array(
        'file-name'   => 'user-data',
        'folder-name' => EGNS_CORE_INC . '/theme-options/page-options/user'
    ),

);

if (is_array($includes_files) && !empty($includes_files)) {
    foreach ($includes_files as $file) {
        if (file_exists($file['folder-name'] . '/' . $file['file-name'] . '.php')) {
            require_once $file['folder-name'] . '/' . $file['file-name'] . '.php';
        }
    }
}
