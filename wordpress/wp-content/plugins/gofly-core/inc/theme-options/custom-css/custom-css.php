<?php
// exit if access directly
if (!defined('ABSPATH')) {
    exit();
}

use Egns_Core\Egns_Helper;

function egnsCustomStyling()
{

    $custom_css         = "";
    $egns_theme_options = get_option('egns_theme_options');
    $egns_page_options  = get_post_meta(get_the_ID(), 'egns_page_options', true);

    /**************************
     * Primary Color Start
     *************************/

    $primary_main_color = $egns_theme_options['primary_theme_color'] ?? '';
    $primary_opc_color  = $egns_theme_options['primary_theme_color_opc'] ?? '';

    // Get hex color 
    $hex = $primary_opc_color;

    // Remove the '#' if present
    $hex = ltrim($hex, '#');

    // Convert the hex to RGB values
    $r = hexdec(substr($hex, 0, 2));
    $g = hexdec(substr($hex, 2, 2));
    $b = hexdec(substr($hex, 4, 2));


    if (!empty($primary_main_color)) {
        $custom_css .= "
         :root{
                 --primary-color1: $primary_main_color !important;
                 --primary-color2: $primary_main_color !important;
                 --primary-color3: $primary_main_color !important;
                 --primary-color4: $primary_main_color !important;
              }
          ";
    }

    if (!empty($primary_opc_color)) {
        $custom_css .= "
         :root{
                 --primary-color1-opc: $r, $g, $b !important;
                 --primary-color2-opc: $r, $g, $b !important;
                 --primary-color3-opc: $r, $g, $b !important;
                 --primary-color4-opc: $r, $g, $b !important;
              }
          ";
    }

    /**************************
     * Primary Color End
     *************************/




    /**************************
     * Primary Font Start
     *************************/

    $font_manrope = $egns_theme_options['font_manrope']['font-family'] ?? '';
    if (!empty($font_manrope)) {
        $custom_css .= "
         :root{
                 --font-manrope: '$font_manrope', sans-serif !important;
              }
          ";
    }

    $font_dmsans = $egns_theme_options['font_dmsans']['font-family'] ?? '';
    if (!empty($font_dmsans)) {
        $custom_css .= "
         :root{
                 --font-dmsans: '$font_dmsans', sans-serif !important;
              }
          ";
    }

    $font_billy = $egns_theme_options['font_billy']['font-family'] ?? '';
    if (!empty($font_billy)) {
        $custom_css .= "
         :root{
                 --font-billy-ohio: '$font_billy', opentype !important;
              }
          ";
    }

    /**************************
     * Primary Font End
     *************************/



    /************************
     * Start Breadcrumb Style
     ************************/

    //Breadcrumb BG Color
    $custom_css = $custom_css ?? '';

    $breadcump_normal_color_background = '';
    $breadcump_page_color_background = '';
    $bread_page_image = '';
    $bread_image = '';

    // Only fetch if Codestar is active
    if (class_exists('CSF')) {
        $breadcump_normal_color_background = Egns_Helper::egns_get_theme_option('breadcrumb_background_color') ?? '';
        $breadcump_page_color_background = Egns_Helper::egns_page_option_value('breadcrumb_page_bg_color') ?? '';
        $bread_page_image = Egns_Helper::egns_page_option_value('breadcrumb_page_bg_image') ?? '';
        $bread_image = Egns_Helper::egns_get_theme_option('breadcrumb_bg_image') ?? '';
    }

    // Check if theme image is available
    $theme_has_image = !empty($bread_image['url']);
    $page_has_image = !empty($bread_page_image['url']);

    // Priority logic:
    if (!empty($breadcump_page_color_background)) {
        // If page color is set → show regardless of image
        $custom_css .= "
    .breadcrumb-section {
        background-color: {$breadcump_page_color_background} !important;
    }
    ";
    } elseif (!$theme_has_image && !$page_has_image && !empty($breadcump_normal_color_background)) {
        // If no image, use theme color
        $custom_css .= "
    .breadcrumb-section {
        background-color: {$breadcump_normal_color_background} !important;
    }
    ";
    }

    /*********************
     * End Breadcrumb
     *********************/

    /*********************
     * Footer Style
     *********************/

    //Footer Background image
    $footer_background_color = $egns_theme_options['footer_background_color'] ?? '';
    $footer_background_image = $egns_theme_options['footer_background_image']['url'] ?? '';


    if (!empty($footer_background_color)) {
        $custom_css .= "
        footer.footer-section{
            background-color: $footer_background_color !important;
        }
    ";
    }

    if (!empty($footer_background_image)) {
        $custom_css .= "
        footer.footer-section{
            background-image: url($footer_background_image) !important;
        }
    ";
    }




    wp_register_style('egns-stylesheet', false);
    wp_enqueue_style('egns-stylesheet', false);
    wp_add_inline_style('egns-stylesheet', $custom_css, true);
}
if (class_exists('CSF')) {
    add_action('wp_enqueue_scripts', 'egnsCustomStyling');
}
