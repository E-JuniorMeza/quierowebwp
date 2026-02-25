<?php
// Exit if accessed directly
if (!defined('ABSPATH')) {
    exit;
}

if (!class_exists('CSF')) {
    return;
}

// All Settings

$includes_files = array(

    // General Settings
    array(
        'file-name' => 'general',
        'folder-name' => EGNS_CORE_INC . '/theme-options/settings/general'
    ),
    // Header Settings
    array(
        'file-name' => 'header',
        'folder-name' => EGNS_CORE_INC . '/theme-options/settings/header'
    ),
    // Breadcrumb Settings
    array(
        'file-name' => 'breadcrumbs',
        'folder-name' => EGNS_CORE_INC . '/theme-options/settings/breadcrumbs'
    ),
    // Blog Settings
    array(
        'file-name' => 'blog',
        'folder-name' => EGNS_CORE_INC . '/theme-options/settings/blog'
    ),
      // Project Settings
    array(
        'file-name' => 'custom_post',
        'folder-name' => EGNS_CORE_INC . '/theme-options/settings/custom_post'
    ),
    // WooCommerce Settings
    array(
        'file-name' => 'woocommerce',
        'folder-name' => EGNS_CORE_INC . '/theme-options/settings/woocommerce'
    ),
    // 404 Page Settings
    array(
        'file-name' => 'page',
        'folder-name' => EGNS_CORE_INC . '/theme-options/settings/404'
    ),
    // Footer Settings
    array(
        'file-name' => 'footer',
        'folder-name' => EGNS_CORE_INC . '/theme-options/settings/footer'
    ),
    // Custom Script Settings
    array(
        'file-name' => 'custom_scripts',
        'folder-name' => EGNS_CORE_INC . '/theme-options/settings/custom-scripts'
    ),
    // Backup Settings
    array(
        'file-name' => 'backup',
        'folder-name' => EGNS_CORE_INC . '/theme-options/settings/backup'
    ),
    /* ======================== End Option panel =======================*/

    // Post Settings
    array(
        'file-name' => 'post',
        'folder-name' => EGNS_CORE_INC . '/theme-options/settings/post'
    ),
);

if (is_array($includes_files) && !empty($includes_files)) {
    foreach ($includes_files as $file) {
        if (file_exists($file['folder-name'] . '/' . $file['file-name'] . '.php')) {
            require_once $file['folder-name'] . '/' . $file['file-name'] . '.php';
        }
    }
}
