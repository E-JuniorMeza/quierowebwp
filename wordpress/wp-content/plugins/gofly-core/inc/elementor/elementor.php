<?php

namespace Egns_Core;

/**
 * All Elementor widget init
 * 
 * @since 1.0.0
 */

if (!defined('ABSPATH')) {
	exit();  // exit if access directly
}

if (!class_exists('Egns_Elementor')) {

	class Egns_Elementor
	{

		/*
		* $instance
		* @since 1.0.0
		* */
		private static $instance;

		/*
		* construct()
		* @since 1.0.0
		* */
		public function __construct()
		{
			//elementor widget category registered
			add_action('elementor/elements/categories_registered', array($this, '_widget_categories'));

			//elementor widget registered
			add_action('elementor/widgets/register', array($this, '_widget_registered'));

			// Enqueue stylesheets in editor page and frontend
			add_action('elementor/editor/before_enqueue_styles', array($this, 'gofly_enqueue_style'));
			add_action('elementor/frontend/before_enqueue_styles', array($this, 'gofly_enqueue_style'));
		}
		/*
	   * getInstance()
	   * @since 1.0.0
	   * */
		public static function getInstance()
		{
			if (null == self::$instance) {
				self::$instance = new self();
			}

			return self::$instance;
		}

		// Custom widgets css 
		public function gofly_enqueue_style()
		{
			wp_enqueue_style('wp-blocks-library', includes_url('css/dist/block-library/style.min.css'));
			wp_enqueue_style('gofly-widgets', EGNS_CORE_THEME_CSS . '/el-widgets.css', null, filemtime(get_template_directory() . '/assets/css/el-widgets.css'));
		}

		/**
		 * _widget_categories()
		 * @since 1.0.0
		 * */
		public function _widget_categories($elements_manager)
		{
			$elements_manager->add_category(
				'gofly_widgets',
				[
					'title' => esc_html__('GoFly Widgets', 'gofly-core'),
					'icon'  => 'fa fa-plug',
				]
			);
			$elements_manager->add_category(
				'gofly_tour',
				[
					'title' => esc_html__('GoFly Tour', 'gofly-core'),
					'icon'  => 'fa fa-plug',
				]
			);
			$elements_manager->add_category(
				'gofly_visa',
				[
					'title' => esc_html__('GoFly Visa', 'gofly-core'),
					'icon'  => 'fa fa-plug',
				]
			);
			$elements_manager->add_category(
				'gofly_hotel',
				[
					'title' => esc_html__('GoFly Hotel', 'gofly-core'),
					'icon'  => 'fa fa-plug',
				]
			);
			$elements_manager->add_category(
				'gofly_exp',
				[
					'title' => esc_html__('GoFly Experience', 'gofly-core'),
					'icon'  => 'fa fa-plug',
				]
			);
			$elements_manager->add_category(
				'gofly_destination',
				[
					'title' => esc_html__('GoFly Destination', 'gofly-core'),
					'icon'  => 'fa fa-plug',
				]
			);
		}


		/**
		 * _widget_registered()
		 * @since 1.0.0
		 * */
		public function _widget_registered()
		{

			if (!class_exists('Elementor\Widget_Base')) {
				return;
			}

			$elementor_widgets = array(
				//Elementor Widgets
				'heading',
				'button',
				'footer',
				'hero-banner',
				'hero-banner-slider',
				'visa-hero-banner',
				'testimonial',
				'blog',
				'partner',
				'counter',
				'process',
				'gallery',
				'company-intro',
				'award-banner',
				'text-slider',
				'video-with-contact',
				'banner-contact',
				'about',
				'location-search',
				'country-serve',
				'travel-package-slider',
				'search-filter',
				'refund',
				'newsletter',
				'offer-banner-two',
				'activity-tab',
				'visa-offer',
				'mega-menu',
				'visa-grid',
				'visa-country',
				'hotel-room-slider',
				// RHJ Widgets
				'faq',
				'video',
				'contact',
				'destination',
				'travel-guide',
				'travel-guide-slider',
				'destination-slider',
				'experience-destination',
				'service',
				'social-share',
				// Destination single 
				'customer-experience',
				'featured-destination',
				'popular-tourist-place',
				'destination-post-title',
				'destination-travel-seasons',
				// Tour Single 
				'featured-tour',
				'guide-details',
				'openstreetmap',
				'tour-ininerary',
				'tour-sub-location',
				'related-tour-package',
				'tour-check-avilability',
				// Visa Single 
				'visa-critaria-tab',
				// Experience Single 
				'featured-experience',
				'experience-check-availability',
				//Experience Widgets
				'experience-grid',
				'experience-slider',
				// Hotel single 
				'hotel-amenity',
				'hotel-package',
				'featured-hotel',
				'hotel-check-avilability',
				// End RHJ 
				//About page
				'about-journey',
				//Tour Widgets
				'travel-package',
				//Hotel Widgets
				'hotel-room',
				'offer-banner',
			);

			$elementor_widgets = apply_filters('gofly_widgets', $elementor_widgets);

			if (is_array($elementor_widgets) && !empty($elementor_widgets)) {

				foreach ($elementor_widgets as $widget) {

					if (file_exists(EGNS_CORE_INC . '/elementor/widgets/class-' . $widget . '-elementor-widget.php')) {
						require_once EGNS_CORE_INC . '/elementor/widgets/class-' . $widget . '-elementor-widget.php';
					}
				}
			}
		} // End _widget_registered



	}
	if (class_exists('Egns_Elementor')) {
		Egns_Elementor::getInstance();
	}
} //end if
