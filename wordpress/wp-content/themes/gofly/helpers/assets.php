<?php

namespace Egns\Helper;

if (!class_exists('Egns_Assets')) {

    /**
     * Assets handlers class
     */
    class Egns_Assets
    {

        /**
         * Class constructor
         */
        function __construct()
        {
            // Theme setup and admin enqueue files
            add_action('admin_enqueue_scripts', array($this, 'egns_enqueue_admin_assets'));

            // Theme setup and enqueue files
            add_action('wp_enqueue_scripts', array($this, 'egns_enqueue_assets'));
        }

        /**
         * Return all available scripts
         *
         * @version 1.5.5
         * @return array
         */
        function egns_get_scripts()
        {
            return [
                'bootstrap' => [
                    'src'     => EGNS_ASSETS_ROOT . '/js/bootstrap.min.js',
                    'version' => filemtime(EGNS_ASSETS_ROOT_DIR . '/js/bootstrap.min.js'),
                    'deps'    => ['jquery']
                ],
                'popper' => [
                    'src'     => EGNS_ASSETS_ROOT . '/js/popper.min.js',
                    'version' => filemtime(EGNS_ASSETS_ROOT_DIR . '/js/popper.min.js'),
                    'deps'    => ['jquery']
                ],
                'moment' => [
                    'src'     => EGNS_ASSETS_ROOT . '/js/moment.min.js',
                    'version' => filemtime(EGNS_ASSETS_ROOT_DIR . '/js/moment.min.js'),
                    'deps'    => ['jquery']
                ],
                'daterangepicker' => [
                    'src'     => EGNS_ASSETS_ROOT . '/js/daterangepicker.min.js',
                    'version' => filemtime(EGNS_ASSETS_ROOT_DIR . '/js/daterangepicker.min.js'),
                    'deps'    => ['jquery']
                ],
                'dropzone' => [
                    'src'     => EGNS_ASSETS_ROOT . '/js/dropzone-min.js',
                    'version' => filemtime(EGNS_ASSETS_ROOT_DIR . '/js/dropzone-min.js'),
                    'deps'    => ['jquery']
                ],
                'swiper-slider' => [
                    'src'     => EGNS_ASSETS_ROOT . '/js/swiper-bundle.min.js',
                    'version' => filemtime(EGNS_ASSETS_ROOT_DIR . '/js/swiper-bundle.min.js'),
                    'deps'    => ['jquery']
                ],
                'slick-slider' => [
                    'src'     => EGNS_ASSETS_ROOT . '/js/slick.js',
                    'version' => filemtime(EGNS_ASSETS_ROOT_DIR . '/js/slick.js'),
                    'deps'    => ['jquery']
                ],
                'waypoints' => [
                    'src'     => EGNS_ASSETS_ROOT . '/js/waypoints.min.js',
                    'version' => filemtime(EGNS_ASSETS_ROOT_DIR . '/js/waypoints.min.js'),
                    'deps'    => ['jquery']
                ],
                'counterup-min' => [
                    'src'     => EGNS_ASSETS_ROOT . '/js/jquery.counterup.min.js',
                    'version' => filemtime(EGNS_ASSETS_ROOT_DIR . '/js/jquery.counterup.min.js'),
                    'deps'    => ['jquery']
                ],
                'wow' => [
                    'src'     => EGNS_ASSETS_ROOT . '/js/wow.min.js',
                    'version' => filemtime(EGNS_ASSETS_ROOT_DIR . '/js/wow.min.js'),
                    'deps'    => ['jquery']
                ],
                'range-slider' => [
                    'src'     => EGNS_ASSETS_ROOT . '/js/range-slider.js',
                    'version' => filemtime(EGNS_ASSETS_ROOT_DIR . '/js/range-slider.js'),
                    'deps'    => ['jquery']
                ],
                'gsap-min' => [
                    'src'     => EGNS_ASSETS_ROOT . '/js/gsap.min.js',
                    'version' => filemtime(EGNS_ASSETS_ROOT_DIR . '/js/gsap.min.js'),
                    'deps'    => ['jquery']
                ],
                'scroll-trigger' => [
                    'src'     => EGNS_ASSETS_ROOT . '/js/ScrollTrigger.min.js',
                    'version' => filemtime(EGNS_ASSETS_ROOT_DIR . '/js/ScrollTrigger.min.js'),
                    'deps'    => ['jquery']
                ],
                'egns-nice-select' => [
                    'src'     => EGNS_ASSETS_ROOT . '/js/jquery.nice-select.min.js',
                    'version' => filemtime(EGNS_ASSETS_ROOT_DIR . '/js/jquery.nice-select.min.js'),
                    'deps'    => ['jquery']
                ],
                'fancybox' => [
                    'src'     => EGNS_ASSETS_ROOT . '/js/jquery.fancybox.min.js',
                    'version' => filemtime(EGNS_ASSETS_ROOT_DIR . '/js/jquery.fancybox.min.js'),
                    'deps'    => ['jquery']
                ],
                'openstreetmap' => [
                    'src'     => EGNS_ASSETS_ROOT . '/js/leaflet.js',
                    'version' => filemtime(EGNS_ASSETS_ROOT_DIR . '/js/leaflet.js'),
                    'deps'    => ['jquery']
                ],
                'egns-select-dropdown' => [
                    'src'     => EGNS_ASSETS_ROOT . '/js/select-dropdown.js',
                    'version' => filemtime(EGNS_ASSETS_ROOT_DIR . '/js/select-dropdown.js'),
                    'deps'    => ['jquery']
                ],
                'custom-calendar' => [
                    'src'     => EGNS_ASSETS_ROOT . '/js/custom-calendar.js',
                    'version' => filemtime(EGNS_ASSETS_ROOT_DIR . '/js/custom-calendar.js'),
                    'deps'    => ['jquery']
                ],
                'custom-range-calendar' => [
                    'src'     => EGNS_ASSETS_ROOT . '/js/custom-range-calendar.js',
                    'version' => filemtime(EGNS_ASSETS_ROOT_DIR . '/js/custom-range-calendar.js'),
                    'deps'    => ['jquery']
                ],
                'custom-main' => [
                    'src'     => EGNS_ASSETS_ROOT . '/js/custom.js',
                    'version' => filemtime(EGNS_ASSETS_ROOT_DIR . '/js/custom.js'),
                    'deps'    => ['jquery']
                ],

            ];
        }


        /**
         * Return all available styles
         *
         * @version 1.5.5
         * @return array
         */
        function egns_get_styles()
        {

            $assets =  [
                'egns-fonts' => [
                    'src'     => 'https://fonts.googleapis.com/css2?family=Courgette&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Roboto:ital,wght@0,100..900;1,100..900&display=swap',
                    'deps'    => [],
                    'version' => null,
                ],
                'bootstrap-icons' => [
                    'src'     => EGNS_ASSETS_ROOT . '/css/bootstrap-icons.css',
                    'version' => filemtime(EGNS_ASSETS_ROOT_DIR . '/css/bootstrap-icons.css'),
                ],
                'boxicons' => [
                    'src'     => EGNS_ASSETS_ROOT . '/css/boxicons.min.css',
                    'version' => filemtime(EGNS_ASSETS_ROOT_DIR . '/css/boxicons.min.css'),
                ],
                'swiper-bundle' => [
                    'src'     => EGNS_ASSETS_ROOT . '/css/swiper-bundle.min.css',
                    'version' => filemtime(EGNS_ASSETS_ROOT_DIR . '/css/swiper-bundle.min.css'),
                ],
                'egns-nice-select' => [
                    'src'     => EGNS_ASSETS_ROOT . '/css/nice-select.css',
                    'version' => filemtime(EGNS_ASSETS_ROOT_DIR . '/css/nice-select.css'),
                ],
                'dropzone' => [
                    'src'     => EGNS_ASSETS_ROOT . '/css/dropzone.css',
                    'version' => filemtime(EGNS_ASSETS_ROOT_DIR . '/css/dropzone.css'),
                ],
                'egns-slick-theme-select' => [
                    'src'     => EGNS_ASSETS_ROOT . '/css/slick.css',
                    'version' => filemtime(EGNS_ASSETS_ROOT_DIR . '/css/slick.css'),
                ],
                'egns-slick-select' => [
                    'src'     => EGNS_ASSETS_ROOT . '/css/slick-theme.css',
                    'version' => filemtime(EGNS_ASSETS_ROOT_DIR . '/css/slick-theme.css'),
                ],
                'egns-daterangepicker' => [
                    'src'     => EGNS_ASSETS_ROOT . '/css/daterangepicker.css',
                    'version' => filemtime(EGNS_ASSETS_ROOT_DIR . '/css/daterangepicker.css'),
                ],
                'animate' => [
                    'src'     => EGNS_ASSETS_ROOT . '/css/animate.min.css',
                    'version' => filemtime(EGNS_ASSETS_ROOT_DIR . '/css/animate.min.css'),
                ],
                'fancybox' => [
                    'src'     => EGNS_ASSETS_ROOT . '/css/jquery.fancybox.min.css',
                    'version' => filemtime(EGNS_ASSETS_ROOT_DIR . '/css/jquery.fancybox.min.css'),
                ],
                'openstreetmap' => [
                    'src'     => EGNS_ASSETS_ROOT . '/css/leaflet.css',
                    'version' => filemtime(EGNS_ASSETS_ROOT_DIR . '/css/leaflet.css'),
                ],
                'egns-ui' => [
                    'src'     => EGNS_ASSETS_ROOT . '/css/jquery-ui.css',
                    'version' => filemtime(EGNS_ASSETS_ROOT_DIR . '/css/jquery-ui.css'),
                ],
                'calendar' => [
                    'src'     => EGNS_ASSETS_ROOT . '/css/calendar-css.css',
                    'version' => filemtime(EGNS_ASSETS_ROOT_DIR . '/css/calendar-css.css'),
                ],
            ];

            // Load RTL css 
            if (Egns_Helper::egns_get_theme_option('rtl_enable')) {

                $assets['bootstrap-rtl'] = [
                    'src'      => EGNS_ASSETS_ROOT . '/css/bootstrap.rtl.min.css',
                    'version'  => filemtime(EGNS_ASSETS_ROOT_DIR . '/css/bootstrap.rtl.min.css'),
                    'priority' => 20,
                ];
                $assets['blog-page'] = [
                    'src'      => EGNS_ASSETS_ROOT . '/css/blog-and-pages.css',
                    'version'  => filemtime(EGNS_ASSETS_ROOT_DIR . '/css/blog-and-pages.css'),
                    'priority' => 160,
                ];
                $assets['egns-woocommerce'] = [
                    'src'      => EGNS_ASSETS_ROOT . '/css/woocommerce-custom.css',
                    'version'  => filemtime(EGNS_ASSETS_ROOT_DIR . '/css/woocommerce-custom.css'),
                    'priority' => 170,
                ];
                $assets['egns-style'] = [
                    'src'      => EGNS_ASSETS_ROOT . '/css/style.css',
                    'version'  => filemtime(EGNS_ASSETS_ROOT_DIR . '/css/style.css'),
                    'priority' => 990,
                ];
                $assets['egns-style-rtl'] = [
                    'src'      => EGNS_ASSETS_ROOT . '/css/style-rtl.css',
                    'version'  => filemtime(EGNS_ASSETS_ROOT_DIR . '/css/style-rtl.css'),
                    'deps'     => ['egns-style'],
                    'priority' => 990,
                ];
                $assets['egns-theme'] =  [
                    'src'      => EGNS_ROOT . '/style.css',
                    'version'  => rand(10, 100),
                    'priority' => 1000,
                ];
            } else {
                $assets['bootstrap'] = [
                    'src'      => EGNS_ASSETS_ROOT . '/css/bootstrap.min.css',
                    'version'  => filemtime(EGNS_ASSETS_ROOT_DIR . '/css/bootstrap.min.css'),
                    'priority' => 20,
                ];
                $assets['blog-page'] = [
                    'src'      => EGNS_ASSETS_ROOT . '/css/blog-and-pages.css',
                    'version'  => filemtime(EGNS_ASSETS_ROOT_DIR . '/css/blog-and-pages.css'),
                    'priority' => 160,
                ];
                $assets['WooCommerce'] = [
                    'src'      => EGNS_ASSETS_ROOT . '/css/woocommerce-custom.css',
                    'version'  => filemtime(EGNS_ASSETS_ROOT_DIR . '/css/woocommerce-custom.css'),
                    'priority' => 170,
                ];
                $assets['egns-style'] = [
                    'src'      => EGNS_ASSETS_ROOT . '/css/style.css',
                    'version'  => filemtime(EGNS_ASSETS_ROOT_DIR . '/css/style.css'),
                    'priority' => 990,
                ];
                $assets['egns-theme'] =  [
                    'src'      => EGNS_ROOT . '/style.css',
                    'version'  => rand(10, 100),
                    'priority' => 1000,
                ];
            }

            return $assets;
        }


        /**
         * Egens enqueue scripts and styles 
         * 
         * @since 1.0.0
         * 
         * @return void
         */
        public function egns_enqueue_assets()
        {
            $scripts = $this->egns_get_scripts();
            $styles  = $this->egns_get_styles();


            // Applied filter hook for scripts and styles
            $scripts = apply_filters('egns_filter_scripts', $scripts);
            $styles  = apply_filters('egns_filter_styles', $styles);

            // Enqueue all styles
            foreach ($styles as $handle => $style) {
                $deps = isset($style['deps']) ? $style['deps'] : false;
                wp_enqueue_style($handle, $style['src'], $deps, $style['version'], 'all');
            }

            // Enqueue all scripts
            foreach ($scripts as $handle => $script) {
                $deps = isset($script['deps']) ? $script['deps'] : false;
                wp_enqueue_script($handle, $script['src'], $deps, $script['version'], true);
            }

            if (is_singular() && comments_open() && get_option('thread_comments')) {
                wp_enqueue_script('comment-reply');
            }


            $range = Egns_Helper::get_tour_price_range();
            $min   = $range['min'];
            $max   = $range['max'];

            $exp_range = Egns_Helper::exp_global_price_range();
            $exp_min   = $exp_range['min'];
            $exp_max   = $exp_range['max'];

            $hotel_range = Egns_Helper::hotel_global_price_range();
            $hotel_min   = $hotel_range['min'];
            $hotel_max   = $hotel_range['max'];

            // Localize script 
            $objects = array(
                'sticky_header'  => Egns_Helper::sticky_header_enable(),
                'ajaxurl'        => admin_url('admin-ajax.php'),
                'posts_per_page' => get_option('posts_per_page'),
                'author_id'      => get_the_author_meta('ID'),
                'nonce'          => wp_create_nonce('gofly_nonce'),
                'min'            => $min,
                'max'            => $max,
                'exp_min'        => $exp_min,
                'exp_max'        => $exp_max,
                'hotel_min'      => $hotel_min,
                'hotel_max'      => $hotel_max,
                'layout'         => is_post_type_archive('tour'),
                'symbol'         => Egns_Helper::gofly_price_currency(),
            );
            wp_localize_script('custom-main', 'localize_params', $objects);
        }


        /**
         * Return all available admin styles
         *
         * @version 1.5.5
         * @return array
         */
        function egns_get_admin_styles()
        {
            return [
                'egns-admin-style' => [
                    'src'     => EGNS_ASSETS_ROOT . '/css/admin.css',
                    'version' => filemtime(EGNS_ASSETS_ROOT_DIR . '/css/admin.css'),
                ],

            ];
        }


        /**
         * Egens enqueue admin scripts and styles 
         * 
         * @since 1.0.0
         * 
         * @return void
         */
        public function egns_enqueue_admin_assets()
        {
            $admin_styles = $this->egns_get_admin_styles();

            // Applied filter hook for styles
            $admin_styles = apply_filters('egns_filter_admin_styles', $admin_styles);

            // Enqueue all admin styles
            foreach ($admin_styles as $handle => $admin_style) {
                $deps = isset($admin_style['deps']) ? $admin_style['deps'] : false;

                wp_enqueue_style($handle, $admin_style['src'], $deps, $admin_style['version'], 'all');
            }
        }
    }
}
