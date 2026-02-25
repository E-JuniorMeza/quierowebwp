<?php
/*
Plugin Name: Gofly Core
Plugin URI: https://themeforest.net/user/egenslab/portfolio
Description: Gofly core plugin is a elementor widget based plugin. 
Author: Egens Lab
Author URI: https://themeforest.net/user/egenslab/
License: GNU General Public License v2 or later
License URI: http://www.gnu.org/licenses/gpl-2.0.html
Version: 1.5.5
Text Domain: gofly-core
*/

use Egns_Core\Egns_Helper;

if (!defined('ABSPATH')) {
    exit;
}

/**
 * The main plugin class
 */
final class Egns_Core
{

    /**
     * Plugin version
     *
     * @var string
     */
    const version = '1.5.5';

    /**
     * Class construcotr
     */
    private function __construct()
    {
        $this->egns_core_define_constants();
        $this->egns_core_require_files();

        register_activation_hook(__FILE__, [$this, 'egns_core_activate']);

        add_action('plugins_loaded', [$this, 'egns_core_init']);
        add_action('wp_enqueue_scripts', [$this, 'egns_core_enqueue_assets']);
    }

    /**
     * Enqueue plugin assets
     *
     * @return void
     */
    public function egns_core_enqueue_assets()
    {
        // JS
        if (is_singular('tour')) {
            wp_enqueue_script(
                'gofly-core-tour-functions', // handle name
                EGNS_CORE_ROOT_URL . 'assets/js/tour-functions.js', // path to file
                array('jquery'), // dependencies
                EGNS_CORE_VERSION, // version
                true // load in footer
            );
            $tour_package = self::get_tour_package_info();
            // Localize ajax URL & nonce
            wp_localize_script('gofly-core-tour-functions', 'gofly_core_ajax', array(
                'ajax_url'     => admin_url('admin-ajax.php'),
                'nonce'        => wp_create_nonce('gofly_core_nonce'),
                'packages'     => $tour_package,
                'post_id'      => get_the_ID(),
                'checkout_url' => class_exists('WooCommerce') ? wc_get_checkout_url() : '#',
                'date_label'   => esc_html__('Booking Date', 'gofly-core'),
            ));
        } elseif (is_singular('experience')) {
            wp_enqueue_script(
                'gofly-core-exp-functions', // handle name
                EGNS_CORE_ROOT_URL . 'assets/js/exp-functions.js', // path to file
                array('jquery'), // dependencies
                EGNS_CORE_VERSION, // version
                true // load in footer
            );
            $exp_package = self::get_exp_package_info();
            // Localize ajax URL & nonce
            wp_localize_script('gofly-core-exp-functions', 'gofly_exp_core_ajax', array(
                'ajax_url'     => admin_url('admin-ajax.php'),
                'nonce'        => wp_create_nonce('gofly_core_nonce'),
                'packages'     => $exp_package,
                'post_id'      => get_the_ID(),
                'checkout_url' => class_exists('WooCommerce') ? wc_get_checkout_url() : '#',
                'date_label'   => esc_html__('Booking Date', 'gofly-core'),
            ));
        } elseif (is_singular('hotel')) {
            wp_enqueue_script(
                'gofly-core-hotel-functions', // handle name
                EGNS_CORE_ROOT_URL . 'assets/js/hotel-functions.js', // path to file
                array('jquery'), // dependencies
                EGNS_CORE_VERSION, // version
                true // load in footer
            );
            $hotel_package = self::get_hotel_package_info();
            // Localize ajax URL & nonce
            wp_localize_script('gofly-core-hotel-functions', 'gofly_core_hotel_ajax', array(
                'ajax_url'        => admin_url('admin-ajax.php'),
                'nonce'           => wp_create_nonce('gofly_core_nonce'),
                'packages'        => $hotel_package,
                'post_id'         => get_the_ID(),
                'currency_symbol' => class_exists('WooCommerce') ? get_woocommerce_currency_symbol() : '$',
                'checkout_url'    => class_exists('WooCommerce') ? wc_get_checkout_url() : '#',
            ));
        }
    }

    public static function get_tour_package_info()
    {
        $packages_data = [];
        $tour_package  = Egns_Helper::egns_get_tour_value('tour_pricing_package');


        if (!empty($tour_package)) {
            foreach ($tour_package as $key => $package) {
                $pkg_item = [
                    'title'              => $package['tour_pricing_package_title'] ?? '',
                    'pricing_categories' => [],
                    'services'           => [],
                ];

                // Pricing categories
                $regular_prices = $package['trip_price_table']['regular_price'] ?? [];
                $sale_prices    = $package['trip_price_table']['sale_price'] ?? [];
                if (!empty($regular_prices)) {
                    foreach ($regular_prices as $slug => $reg_val) {
                        $regular = floatval($reg_val[0] ?? 0);
                        $sale    = floatval($sale_prices[$slug][0] ?? 0);
                        $active  = ($sale && $sale < $regular) ? $sale : $regular;

                        $pkg_item['pricing_categories'][] = [
                            'slug'  => $slug,
                            'price' => $active,
                        ];
                    }
                }

                // Services
                if (!empty($package['services'])) {
                    foreach ($package['services'] as $svc) {
                        $pkg_item['services'][] = [
                            'name'  => $svc['name'] ?? '',
                            'price' => floatval($svc['price'] ?? 0)
                        ];
                    }
                }

                $packages_data[] = $pkg_item;
            }
        }
        return $packages_data;
    }

    public static function get_exp_package_info()
    {
        $packages_data = [];
        $exp_package  = Egns_Helper::egns_get_exp_value('experience_pricing_package');


        if (!empty($exp_package)) {
            foreach ($exp_package as $key => $package) {

                $pkg_item = [
                    'title'              => $package['tour_pricing_package_title'] ?? '',
                    'pricing_categories' => [],
                    'services'           => [],
                ];

                // Pricing
                $regular_prices = $package['experience_price'] ?? '';
                $sale_prices    = !empty($package['experience_price_sale_check']) && isset($package['experience_price_sale']) && $package['experience_price_sale'] !== '' ? $package['experience_price_sale'] : '';
                if (!empty($regular_prices)) {
                    foreach ((array)$regular_prices as $reg_val) {
                        $regular = floatval($reg_val ?? 0);
                        $sale    = floatval($sale_prices ?? 0);
                        $active  = ($sale && $sale < $regular) ? $sale : $regular;

                        $pkg_item['pricing_categories'][] = [
                            'slug'  => 'ticket',
                            'price' => $active,
                        ];
                    }
                }

                // Services
                if (!empty($package['services'])) {
                    foreach ($package['services'] as $svc) {
                        $pkg_item['services'][] = [
                            'name'  => $svc['name'] ?? '',
                            'price' => floatval($svc['price'] ?? 0)
                        ];
                    }
                }

                $packages_data[] = $pkg_item;
            }
        }
        return $packages_data;
    }

    public static function get_hotel_package_info()
    {
        $packages_data = [];
        $hotel_package = Egns_Helper::egns_get_hotel_value('hotel_pricing_package');

        if (!empty($hotel_package)) {
            foreach ($hotel_package as $key => $package) {
                $pkg_item = [
                    'type'          => $package['hotel_pricing_package_typ'] ?? '',
                    'price'         => $package['hotel_price'] ?? 0,
                    'price_sale'    => $package['hotel_price_sale'] ?? 0,
                    'price_sale_on' => !empty($package['hotel_price_sale_check']) ? true : false,
                    'booking_date'  => $package['hotel_booking_date'] ?? [],
                ];
                $packages_data[] = $pkg_item;
            }
        }
        return $packages_data;
    }
    /**
     * Initializes a singleton instance
     *
     * @return \Egns_Core
     */
    public static function init()
    {
        static $instance = false;

        if (!$instance) {
            $instance = new self();
        }

        return $instance;
    }

    /**
     * Define the required plugin constants
     *
     * @return void
     */
    public function egns_core_define_constants()
    {
        define('EGNS_CORE_ENV', true);
        define('EGNS_CORE_ROOT_PATH', plugin_dir_path(__FILE__));
        define('EGNS_CORE_ROOT_URL', plugin_dir_url(__FILE__));
        define('EGNS_CORE_VERSION', '1.5.5');
        define('EGNS_CORE_INC', EGNS_CORE_ROOT_PATH . '/inc');
        define('EGNS_CORE_LIB', EGNS_CORE_ROOT_PATH . '/lib');
        define('EGNS_CORE_THEME_OPTIONS', EGNS_CORE_INC . '/theme-options');
        define('EGNS_CORE_DEMO_IMPORT', EGNS_CORE_ROOT_PATH . '/demo-data-import');
        define('EGNS_CORE_THEME_OPTIONS_IMAGES', EGNS_CORE_ROOT_URL . '/inc/theme-options/images');

        // Include the theme stylesheets
        define('EGNS_CORE_THEME_CSS', get_template_directory_uri() . '/assets/css');
    }

    /**
     * Include all require files
     *
     * @return void
     */
    public function egns_core_require_files()
    {

        $includes_files = array(

            // Codestar Framework
            array(
                'file-name'   => 'codestar-framework',
                'folder-name' => EGNS_CORE_LIB . '/codestar-framework'
            ),

            // Egns Functions
            array(
                'file-name'   => 'functions',
                'folder-name' => EGNS_CORE_ROOT_PATH . '/helpers'
            ),

            // Egns Helper
            array(
                'file-name'   => 'helper',
                'folder-name' => EGNS_CORE_ROOT_PATH . '/helpers'
            ),

            // Elementor Widgets
            array(
                'file-name'   => 'elementor',
                'folder-name' => EGNS_CORE_INC . '/elementor',
            ),

            // Custom Post Type
            array(
                'file-name'   => 'cpt',
                'folder-name' => EGNS_CORE_INC . '/custom-post',
            ),

            // Theme Options
            array(
                'file-name'   => 'theme-options',
                'folder-name' => EGNS_CORE_INC . '/theme-options',
            ),

            // Menu Options
            array(
                'file-name'   => 'menu',
                'folder-name' => EGNS_CORE_INC . '/theme-options/megamenu',
            ),

            // Start Meta Options

            // Visa
            array(
                'file-name'   => 'visa',
                'folder-name' => EGNS_CORE_INC . '/theme-options/meta/visa',
            ),

            // Tour
            array(
                'file-name'   => 'tour',
                'folder-name' => EGNS_CORE_INC . '/theme-options/meta/tour',
            ),

            // Hotel
            array(
                'file-name'   => 'hotel',
                'folder-name' => EGNS_CORE_INC . '/theme-options/meta/hotel',
            ),

            // Experience
            array(
                'file-name'   => 'experience',
                'folder-name' => EGNS_CORE_INC . '/theme-options/meta/experience',
            ),

            // Destination
            array(
                'file-name'   => 'destination',
                'folder-name' => EGNS_CORE_INC . '/theme-options/meta/destination',
            ),
            // End Meta Options ==========


            // Start Taxonomy Options

            // Visa
            array(
                'file-name'   => 'taxonomy',
                'folder-name' => EGNS_CORE_INC . '/theme-options/taxonomy/visa',
            ),

            // Tour
            array(
                'file-name'   => 'taxonomy',
                'folder-name' => EGNS_CORE_INC . '/theme-options/taxonomy/tour',
            ),

            // Hotel
            array(
                'file-name'   => 'taxonomy',
                'folder-name' => EGNS_CORE_INC . '/theme-options/taxonomy/hotel',
            ),

            // Experience
            array(
                'file-name'   => 'taxonomy',
                'folder-name' => EGNS_CORE_INC . '/theme-options/taxonomy/experience',
            ),

            // Destination
            array(
                'file-name'   => 'taxonomy',
                'folder-name' => EGNS_CORE_INC . '/theme-options/taxonomy/destination',
            ),
            // End Taxonomy Options ==========

            // Custom CSS
            array(
                'file-name'   => 'custom-css',
                'folder-name' => EGNS_CORE_THEME_OPTIONS . '/custom-css',
            ),

            // Custom Widget
            array(
                'file-name'   => 'class-search-post-widget',
                'folder-name' => EGNS_CORE_INC . '/wp-widget',
            ),
            array(
                'file-name'   => 'class-recent-post-widget',
                'folder-name' => EGNS_CORE_INC . '/wp-widget',
            ),
            array(
                'file-name'   => 'class-category-widget',
                'folder-name' => EGNS_CORE_INC . '/wp-widget',
            ),
            array(
                'file-name'   => 'class-blog-tag-widget',
                'folder-name' => EGNS_CORE_INC . '/wp-widget',
            ),

            // Register Widget
            array(
                'file-name'   => 'widget',
                'folder-name' => EGNS_CORE_INC . '/widget',
            ),

            // Demo Import Data
            array(
                'file-name'   => 'demo-importer',
                'folder-name' => EGNS_CORE_DEMO_IMPORT,
            ),

        );

        if (is_array($includes_files) && !empty($includes_files)) {
            foreach ($includes_files as $file) {
                if (file_exists($file['folder-name'] . '/' . $file['file-name'] . '.php')) {
                    require_once $file['folder-name'] . '/' . $file['file-name'] . '.php';
                }
            }
        }
    }

    /**
     * Initialize the plugin
     *
     * @return void
     */
    public function egns_core_init()
    {
        new Egns_Core\Egns_Elementor();
        $this->load_inside_init();
        if (class_exists('\WooCommerce')) {
            new EGNS_Product_Extend();
        }
        new Egns_Core\EGNS_Add_To_Cart();
        new Egns_Core\EGNS_Hotel_Add_To_Cart();
    }

    public function load_inside_init()
    {
        $includes_files = array(
            // add to cart
            array(
                'file-name' => 'add_to_cart',
                'folder-name' => EGNS_CORE_ROOT_PATH . '/helpers'
            ),
            array(
                'file-name' => 'hotel_add_to_cart',
                'folder-name' => EGNS_CORE_ROOT_PATH . '/helpers'
            ),
        );
        if (class_exists('WooCommerce')) {
            $includes_files[]   =  array(
                'file-name' => 'wc_product_extend',
                'folder-name' => EGNS_CORE_ROOT_PATH . '/helpers'
            );
        }

        if (is_array($includes_files) && !empty($includes_files)) {
            foreach ($includes_files as $file) {
                if (file_exists($file['folder-name'] . '/' . $file['file-name'] . '.php')) {
                    require_once $file['folder-name'] . '/' . $file['file-name'] . '.php';
                }
            }
        }
    }

    /**
     * Do stuff upon plugin activation
     *
     * @return void
     */
    public function egns_core_activate()
    {
        // do something when activate this plugin
    }
}

/**
 * Initializes the main plugin
 *
 * @return \Egns_Core
 */
function egns_core()
{
    return Egns_Core::init();
}

// start doing amazing things
egns_core();
