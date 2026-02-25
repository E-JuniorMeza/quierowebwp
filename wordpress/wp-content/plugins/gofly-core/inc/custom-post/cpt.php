<?php
/**
 * Custom Post Type
 * Author EgensLab
 * @since 1.0.0
 * */

if (!defined('ABSPATH')) {
	exit();  //exit if access directly
}
if (!class_exists('Gofly_Custom_Post_Type')) {
	class Gofly_Custom_Post_Type
	{

		//$instance variable
		private static $instance;

		public function __construct()
		{
			//register post type
			add_action('init', array($this, 'register_custom_post_type'));
		}

		/**
		 * get Instance
		 * @since  1.0.0
		 * */
		public static function getInstance()
		{
			if (null == self::$instance) {
				self::$instance = new self();
			}

			return self::$instance;
		}

		/**
		 * Register Custom Post Type
		 * @since  1.0.0
		 * */
		public function register_custom_post_type()
		{
			$all_post_type = array(

				// Custom Post Visa
				[
					'post_type' => 'visa',
					'args'      => array(
						'label'       => esc_html__('Visa', 'gofly-core'),
						'description' => esc_html__('Visa', 'gofly-core'),
						'menu_icon'   => esc_url(EGNS_CORE_THEME_OPTIONS_IMAGES . '/go-icon.svg'),
						'labels'      => array(
							'name'               => esc_html_x('Visa', 'Post Type General Name', 'gofly-core'),
							'singular_name'      => esc_html_x('Visa', 'Post Type Singular Name', 'gofly-core'),
							'menu_name'          => esc_html__('Visa', 'gofly-core'),
							'all_items'          => esc_html__('All Visa', 'gofly-core'),
							'view_item'          => esc_html__('View Visa', 'gofly-core'),
							'add_new_item'       => esc_html__('Add New Visa', 'gofly-core'),
							'add_new'            => esc_html__('Add New Visa', 'gofly-core'),
							'edit_item'          => esc_html__('Edit Visa', 'gofly-core'),
							'update_item'        => esc_html__('Update Visa', 'gofly-core'),
							'search_items'       => esc_html__('Search Visa', 'gofly-core'),
							'not_found'          => esc_html__('Not Found', 'gofly-core'),
							'not_found_in_trash' => esc_html__('Not found in Trash', 'gofly-core'),
						),
						'supports'            => array('title', 'editor', 'excerpt', 'thumbnail'),
						'hierarchical'        => true,
						'public'              => true,
						'has_archive'         => true,
						"publicly_queryable"  => true,
						'show_ui'             => true,
						"rewrite"             => array('slug' => 'visa', 'with_front' => true),
						'exclude_from_search' => false,
						'can_export'          => true,
						'capability_type'     => 'post',
						'query_var'           => true,
						"show_in_rest"        => true,
						'menu_position'       => 35,
					)
				],

				// Custom Post Tour
				[
					'post_type' => 'tour',
					'args'      => array(
						'label'       => esc_html__('Tours', 'gofly-core'),
						'description' => esc_html__('Tours', 'gofly-core'),
						'menu_icon'   => esc_url(EGNS_CORE_THEME_OPTIONS_IMAGES . '/go-icon.svg'),
						'labels'      => array(
							'name'               => esc_html_x('Tours', 'Post Type General Name', 'gofly-core'),
							'singular_name'      => esc_html_x('Tour', 'Post Type Singular Name', 'gofly-core'),
							'menu_name'          => esc_html__('Tours', 'gofly-core'),
							'all_items'          => esc_html__('All Tours', 'gofly-core'),
							'view_item'          => esc_html__('View Tour', 'gofly-core'),
							'add_new_item'       => esc_html__('Add Tour', 'gofly-core'),
							'add_new'            => esc_html__('Add Tour', 'gofly-core'),
							'edit_item'          => esc_html__('Edit Tour', 'gofly-core'),
							'update_item'        => esc_html__('Update Tour', 'gofly-core'),
							'search_items'       => esc_html__('Search Tour', 'gofly-core'),
							'not_found'          => esc_html__('Not Found', 'gofly-core'),
							'not_found_in_trash' => esc_html__('Not found in Trash', 'gofly-core'),
						),
						'supports'            => array('title', 'editor', 'excerpt', 'thumbnail'),
						'hierarchical'        => true,
						'public'              => true,
						'has_archive'         => true,
						"publicly_queryable"  => true,
						'show_ui'             => true,
						"rewrite"             => array('slug' => 'tour', 'with_front' => true),
						'exclude_from_search' => false,
						'can_export'          => true,
						'capability_type'     => 'post',
						'query_var'           => true,
						"show_in_rest"        => true,
						'menu_position'       => 36,
					)
				],

				// Custom Post Hotel
				[
					'post_type' => 'hotel',
					'args'      => array(
						'label'       => esc_html__('Hotels', 'gofly-core'),
						'description' => esc_html__('Hotels', 'gofly-core'),
						'menu_icon'   => esc_url(EGNS_CORE_THEME_OPTIONS_IMAGES . '/go-icon.svg'),
						'labels'      => array(
							'name'               => esc_html_x('Hotels', 'Post Type General Name', 'gofly-core'),
							'singular_name'      => esc_html_x('Hotels', 'Post Type Singular Name', 'gofly-core'),
							'menu_name'          => esc_html__('Hotels', 'gofly-core'),
							'all_items'          => esc_html__('All Hotels', 'gofly-core'),
							'view_item'          => esc_html__('View Hotels', 'gofly-core'),
							'add_new_item'       => esc_html__('Add New Hotels', 'gofly-core'),
							'add_new'            => esc_html__('Add New Hotels', 'gofly-core'),
							'edit_item'          => esc_html__('Edit Hotels', 'gofly-core'),
							'update_item'        => esc_html__('Update Hotels', 'gofly-core'),
							'search_items'       => esc_html__('Search Hotels', 'gofly-core'),
							'not_found'          => esc_html__('Not Found', 'gofly-core'),
							'not_found_in_trash' => esc_html__('Not found in Trash', 'gofly-core'),
						),
						'supports'            => array('title', 'editor', 'excerpt', 'thumbnail'),
						'hierarchical'        => true,
						'public'              => true,
						'has_archive'         => true,
						"publicly_queryable"  => true,
						'show_ui'             => true,
						"rewrite"             => array('slug' => 'hotel', 'with_front' => true),
						'exclude_from_search' => false,
						'can_export'          => true,
						'capability_type'     => 'post',
						'query_var'           => true,
						"show_in_rest"        => true,
						'menu_position'       => 37,
					)
				],

				// Custom Post Experience
				[
					'post_type' => 'experience',
					'args'      => array(
						'label'       => esc_html__('Experience', 'gofly-core'),
						'description' => esc_html__('Experience', 'gofly-core'),
						'menu_icon'   => esc_url(EGNS_CORE_THEME_OPTIONS_IMAGES . '/go-icon.svg'),
						'labels'      => array(
							'name'               => esc_html_x('Experience', 'Post Type General Name', 'gofly-core'),
							'singular_name'      => esc_html_x('Experience', 'Post Type Singular Name', 'gofly-core'),
							'menu_name'          => esc_html__('Experience', 'gofly-core'),
							'all_items'          => esc_html__('All Experience', 'gofly-core'),
							'view_item'          => esc_html__('View Experience', 'gofly-core'),
							'add_new_item'       => esc_html__('Add New Experience', 'gofly-core'),
							'add_new'            => esc_html__('Add New Experience', 'gofly-core'),
							'edit_item'          => esc_html__('Edit Experience', 'gofly-core'),
							'update_item'        => esc_html__('Update Experience', 'gofly-core'),
							'search_items'       => esc_html__('Search Experience', 'gofly-core'),
							'not_found'          => esc_html__('Not Found', 'gofly-core'),
							'not_found_in_trash' => esc_html__('Not found in Trash', 'gofly-core'),
						),
						'supports'            => array('title', 'editor', 'excerpt', 'thumbnail'),
						'hierarchical'        => true,
						'public'              => true,
						'has_archive'         => true,
						"publicly_queryable"  => true,
						'show_ui'             => true,
						"rewrite"             => array('slug' => 'experience', 'with_front' => true),
						'exclude_from_search' => false,
						'can_export'          => true,
						'capability_type'     => 'post',
						'query_var'           => true,
						"show_in_rest"        => true,
						'menu_position'       => 38,
					)
				],

				// Custom Post Destination
				[
					'post_type' => 'destination',
					'args'      => array(
						'label'       => esc_html__('Destination', 'gofly-core'),
						'description' => esc_html__('Destination', 'gofly-core'),
						'menu_icon'   => esc_url(EGNS_CORE_THEME_OPTIONS_IMAGES . '/go-icon.svg'),
						'labels'      => array(
							'name'               => esc_html_x('Destination', 'Post Type General Name', 'gofly-core'),
							'singular_name'      => esc_html_x('Destination', 'Post Type Singular Name', 'gofly-core'),
							'menu_name'          => esc_html__('Destination', 'gofly-core'),
							'all_items'          => esc_html__('All Destination', 'gofly-core'),
							'view_item'          => esc_html__('View Destination', 'gofly-core'),
							'add_new_item'       => esc_html__('Add New Destination', 'gofly-core'),
							'add_new'            => esc_html__('Add New Destination', 'gofly-core'),
							'edit_item'          => esc_html__('Edit Destination', 'gofly-core'),
							'update_item'        => esc_html__('Update Destination', 'gofly-core'),
							'search_items'       => esc_html__('Search Destination', 'gofly-core'),
							'not_found'          => esc_html__('Not Found', 'gofly-core'),
							'not_found_in_trash' => esc_html__('Not found in Trash', 'gofly-core'),
						),
						'supports'            => array('title', 'editor', 'excerpt', 'thumbnail'),
						'hierarchical'        => true,
						'public'              => true,
						'has_archive'         => true,
						"publicly_queryable"  => true,
						'show_ui'             => true,
						"rewrite"             => array('slug' => 'destination', 'with_front' => true),
						'exclude_from_search' => false,
						'can_export'          => true,
						'capability_type'     => 'post',
						'query_var'           => true,
						"show_in_rest"        => true,
						'menu_position'       => 39,
					)
				],

				// Custom post Mega Menu
				[
					'post_type' => 'mega-menu',
					'args'      => array(
						'label'       => esc_html__('Mega Menu', 'gofly-core'),
						'description' => esc_html__('Mega Menu', 'gofly-core'),
						'menu_icon'   => esc_url(EGNS_CORE_THEME_OPTIONS_IMAGES . '/go-icon.svg'),
						'labels'      => array(
							'name'               => esc_html_x('Mega Menus', 'Post Type General Name', 'gofly-core'),
							'singular_name'      => esc_html_x('Mega Menu', 'Post Type Singular Name', 'gofly-core'),
							'menu_name'          => esc_html__('Mega Menu', 'gofly-core'),
							'all_items'          => esc_html__('All Mega Menu', 'gofly-core'),
							'view_item'          => esc_html__('View', 'gofly-core'),
							'add_new_item'       => esc_html__('Add New', 'gofly-core'),
							'add_new'            => esc_html__('Add New', 'gofly-core'),
							'edit_item'          => esc_html__('Edit', 'gofly-core'),
							'update_item'        => esc_html__('Update', 'gofly-core'),
							'search_items'       => esc_html__('Search', 'gofly-core'),
							'not_found'          => esc_html__('Not Found', 'gofly-core'),
							'not_found_in_trash' => esc_html__('Not found in Trash', 'gofly-core'),
						),
						'supports'            => array('title', 'editor'),
						'hierarchical'        => true,
						'public'              => true,
						'has_archive'         => false,
						"publicly_queryable"  => true,
						'show_ui'             => true,
						"rewrite"             => array('slug' => 'mega-menu', 'with_front' => true),
						'exclude_from_search' => false,
						'can_export'          => true,
						'capability_type'     => 'post',
						'query_var'           => true,
						"show_in_rest"        => false,
						'menu_position'       => 39,
					)
				],

				// Custom Footer Block
				[
					'post_type' => 'footer-blocks',
					'args'      => array(
						'label'         => esc_html__('Footer Templates GoFly', 'gofly-core'),
						'description'   => esc_html__('Add gofly footer block here', 'gofly-core'),
						'menu_icon'     => esc_url(EGNS_CORE_THEME_OPTIONS_IMAGES . '/go-icon.svg'),
						"menu_position" => 60,
						'labels'        => array(
							'name'               => esc_html_x('Footer Templates', 'Post Type General Name', 'gofly-core'),
							'singular_name'      => esc_html_x('Footer Template', 'Post Type Singular Name', 'gofly-core'),
							'menu_name'          => esc_html__('Footer Template', 'gofly-core'),
							'all_items'          => esc_html__('All Footer Templates', 'gofly-core'),
							'view_item'          => esc_html__('View Footer', 'gofly-core'),
							'add_new_item'       => esc_html__('Add Footer', 'gofly-core'),
							'add_new'            => esc_html__('Add Footer', 'gofly-core'),
							'edit_item'          => esc_html__('Edit Footer', 'gofly-core'),
							'update_item'        => esc_html__('Update Footer', 'gofly-core'),
							'search_items'       => esc_html__('Search Footer', 'gofly-core'),
							'not_found'          => esc_html__('Not Found', 'gofly-core'),
							'not_found_in_trash' => esc_html__('Not found in Trash', 'gofly-core'),
						),
						'supports'            => array('title', 'editor'),
						'hierarchical'        => true,
						'public'              => true,
						'has_archive'         => false,
						"publicly_queryable"  => true,
						'show_ui'             => true,
						"rewrite"             => array('slug' => 'footer-blocks', 'with_front' => true),
						'exclude_from_search' => false,
						'can_export'          => true,
						'capability_type'     => 'post',
						'query_var'           => true,
						"show_in_rest"        => true,
						'menu_position'       => 40,
					)
				],


			);

			if (!empty($all_post_type) && is_array($all_post_type)) {
				foreach ($all_post_type as $post_type) {
					call_user_func_array('register_post_type', $post_type);
				}
			}

			/**
			 * Custom Taxonomy Register
			 */
			$all_custom_taxonmy = array(

				//Default Post Taxonomy Location
				array(
					'taxonomy'    => 'location',
					'object_type' => 'post',
					'args'        => array(
						"labels"  => array(
							'name'              => _x('Locations', 'taxonomy general name', 'gofly-core'),
							'singular_name'     => _x('Location', 'taxonomy singular name', 'gofly-core'),
							'search_items'      => __('Search Locations', 'gofly-core'),
							'all_items'         => __('All Locations', 'gofly-core'),
							'parent_item'       => __('Parent Location', 'gofly-core'),
							'parent_item_colon' => __('Parent Location:', 'gofly-core'),
							'edit_item'         => __('Edit Location', 'gofly-core'),
							'update_item'       => __('Update Location', 'gofly-core'),
							'add_new_item'      => __('Add Location', 'gofly-core'),
							'new_item_name'     => __('New Location Name', 'gofly-core'),
							'menu_name'         => __('Location', 'gofly-core'),
						),
						"public"             => true,
						"hierarchical"       => true,
						'has_archive'        => true,
						"show_ui"            => true,
						"show_in_menu"       => true,
						"show_in_nav_menus"  => true,
						"rewrite"            => array('slug' => 'post-location', 'with_front' => true),
						"query_var"          => true,
						"show_admin_column"  => true,
						"show_in_rest"       => true,
						"show_in_quick_edit" => true,
					)
				),

				/*======================== Visa Post type ======================== */

				//Post Visa taxonomy Category
				array(
					'taxonomy'    => 'visa-category',
					'object_type' => 'visa',
					'args'        => array(
						"labels"  => array(
							'name'              => _x('Categories', 'taxonomy general name', 'gofly-core'),
							'singular_name'     => _x('Category', 'taxonomy singular name', 'gofly-core'),
							'search_items'      => __('Search Categories', 'gofly-core'),
							'all_items'         => __('All Categories', 'gofly-core'),
							'parent_item'       => __('Parent Category', 'gofly-core'),
							'parent_item_colon' => __('Parent Category:', 'gofly-core'),
							'edit_item'         => __('Edit Category', 'gofly-core'),
							'update_item'       => __('Update Category', 'gofly-core'),
							'add_new_item'      => __('Add Category', 'gofly-core'),
							'new_item_name'     => __('New Category Name', 'gofly-core'),
							'menu_name'         => __('Category', 'gofly-core'),
						),
						"public"             => true,
						"hierarchical"       => true,
						'has_archive'        => true,
						"show_ui"            => true,
						"show_in_menu"       => true,
						"show_in_nav_menus"  => true,
						"rewrite"            => array('slug' => 'visa-category', 'with_front' => true),
						"query_var"          => true,
						"show_admin_column"  => true,
						"show_in_rest"       => true,
						"show_in_quick_edit" => true,
					)
				),

				//Post Visa taxonomy Citizenships
				array(
					'taxonomy'    => 'visa-citizenships',
					'object_type' => 'visa',
					'args'        => array(
						"labels"  => array(
							'name'              => _x('Citizenships', 'taxonomy general name', 'gofly-core'),
							'singular_name'     => _x('Citizenship', 'taxonomy singular name', 'gofly-core'),
							'search_items'      => __('Search Citizenships', 'gofly-core'),
							'all_items'         => __('All Citizenships', 'gofly-core'),
							'parent_item'       => __('Parent Citizenship', 'gofly-core'),
							'parent_item_colon' => __('Parent Citizenship:', 'gofly-core'),
							'edit_item'         => __('Edit Citizenship', 'gofly-core'),
							'update_item'       => __('Update Citizenship', 'gofly-core'),
							'add_new_item'      => __('Add Citizenship', 'gofly-core'),
							'new_item_name'     => __('New Citizenship Name', 'gofly-core'),
							'menu_name'         => __('Citizenship', 'gofly-core'),
						),
						"public"             => true,
						"hierarchical"       => true,
						'has_archive'        => true,
						"show_ui"            => true,
						"show_in_menu"       => true,
						"show_in_nav_menus"  => true,
						"rewrite"            => array('slug' => 'visa-citizenships', 'with_front' => true),
						"query_var"          => true,
						"show_admin_column"  => true,
						"show_in_rest"       => true,
						"show_in_quick_edit" => true,
					)
				),

				//Post Visa taxonomy Destination Country
				array(
					'taxonomy'    => 'visa-countries',
					'object_type' => 'visa',
					'args'        => array(
						"labels"  => array(
							'name'              => _x('Countries', 'taxonomy general name', 'gofly-core'),
							'singular_name'     => _x('Country', 'taxonomy singular name', 'gofly-core'),
							'search_items'      => __('Search Countries', 'gofly-core'),
							'all_items'         => __('All Countries', 'gofly-core'),
							'parent_item'       => __('Parent Country', 'gofly-core'),
							'parent_item_colon' => __('Parent Country:', 'gofly-core'),
							'edit_item'         => __('Edit Country', 'gofly-core'),
							'update_item'       => __('Update Country', 'gofly-core'),
							'add_new_item'      => __('Add Country', 'gofly-core'),
							'new_item_name'     => __('New Country Name', 'gofly-core'),
							'menu_name'         => __('Country', 'gofly-core'),
						),
						"public"             => true,
						"hierarchical"       => true,
						'has_archive'        => true,
						"show_ui"            => true,
						"show_in_menu"       => true,
						"show_in_nav_menus"  => true,
						"rewrite"            => array('slug' => 'visa-countries', 'with_front' => true),
						"query_var"          => true,
						"show_admin_column"  => true,
						"show_in_rest"       => true,
						"show_in_quick_edit" => true,
					)
				),

				//Post Visa taxonomy Live in (Resident)
				array(
					'taxonomy'    => 'visa-residents',
					'object_type' => 'visa',
					'args'        => array(
						"labels"  => array(
							'name'              => _x('Residents', 'taxonomy general name', 'gofly-core'),
							'singular_name'     => _x('Resident', 'taxonomy singular name', 'gofly-core'),
							'search_items'      => __('Search Residents', 'gofly-core'),
							'all_items'         => __('All Residents', 'gofly-core'),
							'parent_item'       => __('Parent Resident', 'gofly-core'),
							'parent_item_colon' => __('Parent Resident:', 'gofly-core'),
							'edit_item'         => __('Edit Resident', 'gofly-core'),
							'update_item'       => __('Update Resident', 'gofly-core'),
							'add_new_item'      => __('Add Resident', 'gofly-core'),
							'new_item_name'     => __('New Resident Name', 'gofly-core'),
							'menu_name'         => __('Resident', 'gofly-core'),
						),
						"public"             => true,
						"hierarchical"       => true,
						'has_archive'        => true,
						"show_ui"            => true,
						"show_in_menu"       => true,
						"show_in_nav_menus"  => true,
						"rewrite"            => array('slug' => 'visa-residents', 'with_front' => true),
						"query_var"          => true,
						"show_admin_column"  => true,
						"show_in_rest"       => true,
						"show_in_quick_edit" => true,
					)
				),

				/*======================== Tour Post type ======================== */

				//Post Tour taxonomy Pricing Category
				array(
					'taxonomy'    => 'tour-pricing-category',
					'object_type' => 'tour',
					'args'        => array(
						"labels"  => array(
							'name'              => _x('Pricing Categories', 'taxonomy general name', 'gofly-core'),
							'singular_name'     => _x('Pricing Category', 'taxonomy singular name', 'gofly-core'),
							'search_items'      => __('Search Pricing Categories', 'gofly-core'),
							'all_items'         => __('All Pricing Categories', 'gofly-core'),
							'parent_item'       => __('Parent Pricing Category', 'gofly-core'),
							'parent_item_colon' => __('Parent Pricing Category:', 'gofly-core'),
							'edit_item'         => __('Edit Pricing Category', 'gofly-core'),
							'update_item'       => __('Update Pricing Category', 'gofly-core'),
							'add_new_item'      => __('Add Pricing Category', 'gofly-core'),
							'new_item_name'     => __('New Pricing Category Name', 'gofly-core'),
							'menu_name'         => __('Pricing Category', 'gofly-core'),
						),
						"public"             => true,
						"hierarchical"       => true,
						'has_archive'        => false,
						"show_ui"            => true,
						"show_in_menu"       => true,
						"show_in_nav_menus"  => true,
						"rewrite"            => array('slug' => 'tour-pricing-category', 'with_front' => true),
						"query_var"          => true,
						"show_admin_column"  => true,
						"show_in_rest"       => false,
						"show_in_quick_edit" => false,
					)
				),
				//Post Tour taxonomy Tour Category
				array(
					'taxonomy'    => 'tour-language',
					'object_type' => 'tour',
					'args'        => array(
						"labels"  => array(
							'name'              => _x('Languages', 'taxonomy general name', 'gofly-core'),
							'singular_name'     => _x('Language', 'taxonomy singular name', 'gofly-core'),
							'search_items'      => __('Search Languages', 'gofly-core'),
							'all_items'         => __('All Languages', 'gofly-core'),
							'parent_item'       => __('Parent Language', 'gofly-core'),
							'parent_item_colon' => __('Parent Language:', 'gofly-core'),
							'edit_item'         => __('Edit Language', 'gofly-core'),
							'update_item'       => __('Update Language', 'gofly-core'),
							'add_new_item'      => __('Add Language', 'gofly-core'),
							'new_item_name'     => __('New Language Name', 'gofly-core'),
							'menu_name'         => __('Language', 'gofly-core'),
						),
						"public"             => true,
						"hierarchical"       => true,
						'has_archive'        => true,
						"show_ui"            => true,
						"show_in_menu"       => true,
						"show_in_nav_menus"  => true,
						"rewrite"            => array('slug' => 'tour-language', 'with_front' => true),
						"query_var"          => true,
						"show_admin_column"  => true,
						"show_in_rest"       => true,
						"show_in_quick_edit" => true,
					)
				),
				//Post Tour taxonomy Tour Type
				array(
					'taxonomy'    => 'tour-type',
					'object_type' => 'tour',
					'args'        => array(
						"labels"  => array(
							'name'              => _x('Types', 'taxonomy general name', 'gofly-core'),
							'singular_name'     => _x('Type', 'taxonomy singular name', 'gofly-core'),
							'search_items'      => __('Search Types', 'gofly-core'),
							'all_items'         => __('All Types', 'gofly-core'),
							'parent_item'       => __('Parent Type', 'gofly-core'),
							'parent_item_colon' => __('Parent Type:', 'gofly-core'),
							'edit_item'         => __('Edit Type', 'gofly-core'),
							'update_item'       => __('Update Type', 'gofly-core'),
							'add_new_item'      => __('Add Type', 'gofly-core'),
							'new_item_name'     => __('New Type Name', 'gofly-core'),
							'menu_name'         => __('Type', 'gofly-core'),
						),
						"public"             => true,
						"hierarchical"       => true,
						'has_archive'        => true,
						"show_ui"            => true,
						"show_in_menu"       => true,
						"show_in_nav_menus"  => true,
						"rewrite"            => array('slug' => 'tour-type', 'with_front' => true),
						"query_var"          => true,
						"show_admin_column"  => true,
						"show_in_rest"       => true,
						"show_in_quick_edit" => true,
					)
				),
				//Post Tour taxonomy Tour Category
				array(
					'taxonomy'    => 'tour-category',
					'object_type' => 'tour',
					'args'        => array(
						"labels"  => array(
							'name'              => _x('Categories', 'taxonomy general name', 'gofly-core'),
							'singular_name'     => _x('Category', 'taxonomy singular name', 'gofly-core'),
							'search_items'      => __('Search Categories', 'gofly-core'),
							'all_items'         => __('All Categories', 'gofly-core'),
							'parent_item'       => __('Parent Category', 'gofly-core'),
							'parent_item_colon' => __('Parent Category:', 'gofly-core'),
							'edit_item'         => __('Edit Category', 'gofly-core'),
							'update_item'       => __('Update Category', 'gofly-core'),
							'add_new_item'      => __('Add Category', 'gofly-core'),
							'new_item_name'     => __('New Category Name', 'gofly-core'),
							'menu_name'         => __('Category', 'gofly-core'),
						),
						"public"             => true,
						"hierarchical"       => true,
						'has_archive'        => true,
						"show_ui"            => true,
						"show_in_menu"       => true,
						"show_in_nav_menus"  => true,
						"rewrite"            => array('slug' => 'tour-category', 'with_front' => true),
						"query_var"          => true,
						"show_admin_column"  => true,
						"show_in_rest"       => true,
						"show_in_quick_edit" => true,
					)
				),
				//Post Tour taxonomy Tour Tags
				array(
					'taxonomy'    => 'tour-tag',
					'object_type' => 'tour',
					'args'        => array(
						"labels"  => array(
							'name'              => _x('Tags', 'taxonomy general name', 'gofly-core'),
							'singular_name'     => _x('Tag', 'taxonomy singular name', 'gofly-core'),
							'search_items'      => __('Search Tags', 'gofly-core'),
							'all_items'         => __('All Tags', 'gofly-core'),
							'parent_item'       => __('Parent Tag', 'gofly-core'),
							'parent_item_colon' => __('Parent Tag:', 'gofly-core'),
							'edit_item'         => __('Edit Tag', 'gofly-core'),
							'update_item'       => __('Update Tag', 'gofly-core'),
							'add_new_item'      => __('Add Tag', 'gofly-core'),
							'new_item_name'     => __('New Tag Name', 'gofly-core'),
							'menu_name'         => __('Tag', 'gofly-core'),
						),
						"public"             => true,
						"hierarchical"       => false,
						'has_archive'        => true,
						"show_ui"            => true,
						"show_in_menu"       => true,
						"show_in_nav_menus"  => true,
						"rewrite"            => array('slug' => 'tour-tag', 'with_front' => true),
						"query_var"          => true,
						"show_admin_column"  => true,
						"show_in_rest"       => true,
						"show_in_quick_edit" => true,
					)
				),
				//Post Tour taxonomy Tour Services
				array(
					'taxonomy'    => 'tour-service',
					'object_type' => 'tour',
					'args'        => array(
						"labels"  => array(
							'name'              => _x('Services', 'taxonomy general name', 'gofly-core'),
							'singular_name'     => _x('Service', 'taxonomy singular name', 'gofly-core'),
							'search_items'      => __('Search Services', 'gofly-core'),
							'all_items'         => __('All Services', 'gofly-core'),
							'parent_item'       => __('Parent Service', 'gofly-core'),
							'parent_item_colon' => __('Parent Service:', 'gofly-core'),
							'edit_item'         => __('Edit Service', 'gofly-core'),
							'update_item'       => __('Update Service', 'gofly-core'),
							'add_new_item'      => __('Add Service', 'gofly-core'),
							'new_item_name'     => __('New Service Name', 'gofly-core'),
							'menu_name'         => __('Services', 'gofly-core'),
						),
						"public"             => true,
						"hierarchical"       => true,
						'has_archive'        => true,
						"show_ui"            => true,
						"show_in_menu"       => true,
						"show_in_nav_menus"  => true,
						"rewrite"            => array('slug' => 'tour-service', 'with_front' => true),
						"query_var"          => true,
						"show_admin_column"  => true,
						"show_in_rest"       => true,
						"show_in_quick_edit" => true,
					)
				),


				/*======================== Hotel Post type ======================== */

				//Post Hotel taxonomy Hotel Category
				array(
					'taxonomy'    => 'hotel-category',
					'object_type' => 'hotel',
					'args'        => array(
						"labels"  => array(
							'name'              => _x('Categories', 'taxonomy general name', 'gofly-core'),
							'singular_name'     => _x('Category', 'taxonomy singular name', 'gofly-core'),
							'search_items'      => __('Search Categories', 'gofly-core'),
							'all_items'         => __('All Categories', 'gofly-core'),
							'parent_item'       => __('Parent Category', 'gofly-core'),
							'parent_item_colon' => __('Parent Category:', 'gofly-core'),
							'edit_item'         => __('Edit Category', 'gofly-core'),
							'update_item'       => __('Update Category', 'gofly-core'),
							'add_new_item'      => __('Add Category', 'gofly-core'),
							'new_item_name'     => __('New Category Name', 'gofly-core'),
							'menu_name'         => __('Category', 'gofly-core'),
						),
						"public"             => true,
						"hierarchical"       => true,
						'has_archive'        => true,
						"show_ui"            => true,
						"show_in_menu"       => true,
						"show_in_nav_menus"  => true,
						"rewrite"            => array('slug' => 'hotel-category', 'with_front' => true),
						"query_var"          => true,
						"show_admin_column"  => true,
						"show_in_rest"       => true,
						"show_in_quick_edit" => true,
					)
				),

				//Post Hotel taxonomy Hotel Tags
				array(
					'taxonomy'    => 'hotel-tag',
					'object_type' => 'hotel',
					'args'        => array(
						"labels"  => array(
							'name'              => _x('Tags', 'taxonomy general name', 'gofly-core'),
							'singular_name'     => _x('Tag', 'taxonomy singular name', 'gofly-core'),
							'search_items'      => __('Search Tags', 'gofly-core'),
							'all_items'         => __('All Tags', 'gofly-core'),
							'parent_item'       => __('Parent Tag', 'gofly-core'),
							'parent_item_colon' => __('Parent Tag:', 'gofly-core'),
							'edit_item'         => __('Edit Tag', 'gofly-core'),
							'update_item'       => __('Update Tag', 'gofly-core'),
							'add_new_item'      => __('Add Tag', 'gofly-core'),
							'new_item_name'     => __('New Tag Name', 'gofly-core'),
							'menu_name'         => __('Tags', 'gofly-core'),
						),
						"public"             => true,
						"hierarchical"       => false,
						'has_archive'        => true,
						"show_ui"            => true,
						"show_in_menu"       => true,
						"show_in_nav_menus"  => true,
						"rewrite"            => array('slug' => 'hotel-tag', 'with_front' => true),
						"query_var"          => true,
						"show_admin_column"  => true,
						"show_in_rest"       => true,
						"show_in_quick_edit" => true,
					)
				),

				//Post Hotel taxonomy Hotel Amenity
				array(
					'taxonomy'    => 'hotel-amenity',
					'object_type' => 'hotel',
					'args'        => array(
						"labels"  => array(
							'name'              => _x('Amenities', 'taxonomy general name', 'gofly-core'),
							'singular_name'     => _x('Amenity', 'taxonomy singular name', 'gofly-core'),
							'search_items'      => __('Search Amenities', 'gofly-core'),
							'all_items'         => __('All Amenities', 'gofly-core'),
							'parent_item'       => __('Parent Amenity', 'gofly-core'),
							'parent_item_colon' => __('Parent Amenity:', 'gofly-core'),
							'edit_item'         => __('Edit Amenity', 'gofly-core'),
							'update_item'       => __('Update Amenity', 'gofly-core'),
							'add_new_item'      => __('Add Amenity', 'gofly-core'),
							'new_item_name'     => __('New Amenity Name', 'gofly-core'),
							'menu_name'         => __('Amenity', 'gofly-core'),
						),
						"public"             => true,
						"hierarchical"       => true,
						'has_archive'        => true,
						"show_ui"            => true,
						"show_in_menu"       => true,
						"show_in_nav_menus"  => true,
						"rewrite"            => array('slug' => 'hotel-amenity', 'with_front' => true),
						"query_var"          => true,
						"show_admin_column"  => true,
						"show_in_rest"       => true,
						"show_in_quick_edit" => true,
					)
				),

				//Post Hotel Taxonomy Location
				array(
					'taxonomy'    => 'hotel-location',
					'object_type' => 'hotel',
					'args'        => array(
						"labels"  => array(
							'name'              => _x('Locations', 'taxonomy general name', 'gofly-core'),
							'singular_name'     => _x('Location', 'taxonomy singular name', 'gofly-core'),
							'search_items'      => __('Search Locations', 'gofly-core'),
							'all_items'         => __('All Locations', 'gofly-core'),
							'parent_item'       => __('Parent Location', 'gofly-core'),
							'parent_item_colon' => __('Parent Location:', 'gofly-core'),
							'edit_item'         => __('Edit Location', 'gofly-core'),
							'update_item'       => __('Update Location', 'gofly-core'),
							'add_new_item'      => __('Add Location', 'gofly-core'),
							'new_item_name'     => __('New Location Name', 'gofly-core'),
							'menu_name'         => __('Location', 'gofly-core'),
						),
						"public"             => true,
						"hierarchical"       => true,
						'has_archive'        => true,
						"show_ui"            => true,
						"show_in_menu"       => true,
						"show_in_nav_menus"  => true,
						"rewrite"            => array('slug' => 'hotel-location', 'with_front' => true),
						"query_var"          => true,
						"show_admin_column"  => true,
						"show_in_rest"       => true,
						"show_in_quick_edit" => true,
					)
				),

				//Post Hotel Taxonomy Offer Criterias
				array(
					'taxonomy'    => 'hotel-offer-criterias',
					'object_type' => 'hotel',
					'args'        => array(
						"labels"  => array(
							'name'              => _x('Offer Criterias', 'taxonomy general name', 'gofly-core'),
							'singular_name'     => _x('Offer Criteria', 'taxonomy singular name', 'gofly-core'),
							'search_items'      => __('Search Offer Criterias', 'gofly-core'),
							'all_items'         => __('All Offer Criterias', 'gofly-core'),
							'parent_item'       => __('Parent Offer Criteria', 'gofly-core'),
							'parent_item_colon' => __('Parent Offer Criteria:', 'gofly-core'),
							'edit_item'         => __('Edit Offer Criteria', 'gofly-core'),
							'update_item'       => __('Update Offer Criteria', 'gofly-core'),
							'add_new_item'      => __('Add Offer Criteria', 'gofly-core'),
							'new_item_name'     => __('New Offer Criteria Name', 'gofly-core'),
							'menu_name'         => __('Offer Criteria', 'gofly-core'),
						),
						"public"             => true,
						"hierarchical"       => true,
						'has_archive'        => true,
						"show_ui"            => true,
						"show_in_menu"       => true,
						"show_in_nav_menus"  => true,
						"rewrite"            => array('slug' => 'hotel-offer-criterias', 'with_front' => true),
						"query_var"          => true,
						"show_admin_column"  => true,
						"show_in_rest"       => true,
						"show_in_quick_edit" => true,
					)
				),

				/*======================== Experience Post type ======================== */

				//Post Experience taxonomy Experience Category
				array(
					'taxonomy'    => 'experience-category',
					'object_type' => 'experience',
					'args'        => array(
						"labels"  => array(
							'name'              => _x('Categories', 'taxonomy general name', 'gofly-core'),
							'singular_name'     => _x('Category', 'taxonomy singular name', 'gofly-core'),
							'search_items'      => __('Search Categories', 'gofly-core'),
							'all_items'         => __('All Categories', 'gofly-core'),
							'parent_item'       => __('Parent Category', 'gofly-core'),
							'parent_item_colon' => __('Parent Category:', 'gofly-core'),
							'edit_item'         => __('Edit Category', 'gofly-core'),
							'update_item'       => __('Update Category', 'gofly-core'),
							'add_new_item'      => __('Add Category', 'gofly-core'),
							'new_item_name'     => __('New Category Name', 'gofly-core'),
							'menu_name'         => __('Category', 'gofly-core'),
						),
						"public"             => true,
						"hierarchical"       => true,
						'has_archive'        => true,
						"show_ui"            => true,
						"show_in_menu"       => true,
						"show_in_nav_menus"  => true,
						"rewrite"            => array('slug' => 'experience-category', 'with_front' => true),
						"query_var"          => true,
						"show_admin_column"  => true,
						"show_in_rest"       => true,
						"show_in_quick_edit" => true,
					)
				),

				//Post Experience Taxonomy Type
				array(
					'taxonomy'    => 'experience-type',
					'object_type' => 'experience',
					'args'        => array(
						"labels"  => array(
							'name'              => _x('Types', 'taxonomy general name', 'gofly-core'),
							'singular_name'     => _x('Type', 'taxonomy singular name', 'gofly-core'),
							'search_items'      => __('Search Types', 'gofly-core'),
							'all_items'         => __('All Types', 'gofly-core'),
							'parent_item'       => __('Parent Type', 'gofly-core'),
							'parent_item_colon' => __('Parent Type:', 'gofly-core'),
							'edit_item'         => __('Edit Type', 'gofly-core'),
							'update_item'       => __('Update Type', 'gofly-core'),
							'add_new_item'      => __('Add Type', 'gofly-core'),
							'new_item_name'     => __('New Type Name', 'gofly-core'),
							'menu_name'         => __('Type', 'gofly-core'),
						),
						"public"             => true,
						"hierarchical"       => true,
						'has_archive'        => true,
						"show_ui"            => true,
						"show_in_menu"       => true,
						"show_in_nav_menus"  => true,
						"rewrite"            => array('slug' => 'experience-type', 'with_front' => true),
						"query_var"          => true,
						"show_admin_column"  => true,
						"show_in_rest"       => true,
						"show_in_quick_edit" => true,
					)
				),

				//Post Experience Taxonomy Offer Criterias
				array(
					'taxonomy'    => 'experience-offer',
					'object_type' => 'experience',
					'args'        => array(
						"labels"  => array(
							'name'              => _x('Offers', 'taxonomy general name', 'gofly-core'),
							'singular_name'     => _x('Offer', 'taxonomy singular name', 'gofly-core'),
							'search_items'      => __('Search Offers', 'gofly-core'),
							'all_items'         => __('All Offers', 'gofly-core'),
							'parent_item'       => __('Parent Offer', 'gofly-core'),
							'parent_item_colon' => __('Parent Offer:', 'gofly-core'),
							'edit_item'         => __('Edit Offer', 'gofly-core'),
							'update_item'       => __('Update Offer', 'gofly-core'),
							'add_new_item'      => __('Add Offer', 'gofly-core'),
							'new_item_name'     => __('New Offer Name', 'gofly-core'),
							'menu_name'         => __('Offer', 'gofly-core'),
						),
						"public"             => true,
						"hierarchical"       => true,
						'has_archive'        => true,
						"show_ui"            => true,
						"show_in_menu"       => true,
						"show_in_nav_menus"  => true,
						"rewrite"            => array('slug' => 'experience-offer', 'with_front' => true),
						"query_var"          => true,
						"show_admin_column"  => true,
						"show_in_rest"       => true,
						"show_in_quick_edit" => true,
					)
				),

				//Post Experience Taxonomy Experience Services
				array(
					'taxonomy'    => 'experience-service',
					'object_type' => 'experience',
					'args'        => array(
						"labels"  => array(
							'name'              => _x('Services', 'taxonomy general name', 'gofly-core'),
							'singular_name'     => _x('Service', 'taxonomy singular name', 'gofly-core'),
							'search_items'      => __('Search Services', 'gofly-core'),
							'all_items'         => __('All Services', 'gofly-core'),
							'parent_item'       => __('Parent Service', 'gofly-core'),
							'parent_item_colon' => __('Parent Service:', 'gofly-core'),
							'edit_item'         => __('Edit Service', 'gofly-core'),
							'update_item'       => __('Update Service', 'gofly-core'),
							'add_new_item'      => __('Add Service', 'gofly-core'),
							'new_item_name'     => __('New Service Name', 'gofly-core'),
							'menu_name'         => __('Services', 'gofly-core'),
						),
						"public"             => true,
						"hierarchical"       => true,
						'has_archive'        => true,
						"show_ui"            => true,
						"show_in_menu"       => true,
						"show_in_nav_menus"  => true,
						"rewrite"            => array('slug' => 'experience-service', 'with_front' => true),
						"query_var"          => true,
						"show_admin_column"  => true,
						"show_in_rest"       => true,
						"show_in_quick_edit" => true,
					)
				),

				/*======================== Destination Post type ======================== */

				//Post Destination taxonomy Destination Continent
				array(
					'taxonomy'    => 'destination-continent',
					'object_type' => 'destination',
					'args'        => array(
						"labels"  => array(
							'name'              => _x('Continents', 'taxonomy general name', 'gofly-core'),
							'singular_name'     => _x('Continent', 'taxonomy singular name', 'gofly-core'),
							'search_items'      => __('Search Continent', 'gofly-core'),
							'all_items'         => __('All Continent', 'gofly-core'),
							'parent_item'       => __('Parent Continent', 'gofly-core'),
							'parent_item_colon' => __('Parent Continent:', 'gofly-core'),
							'edit_item'         => __('Edit Continent', 'gofly-core'),
							'update_item'       => __('Update Continent', 'gofly-core'),
							'add_new_item'      => __('Add Continent', 'gofly-core'),
							'new_item_name'     => __('New Continent Name', 'gofly-core'),
							'menu_name'         => __('Continent', 'gofly-core'),
						),
						"public"             => true,
						"hierarchical"       => true,
						'has_archive'        => true,
						"show_ui"            => true,
						"show_in_menu"       => true,
						"show_in_nav_menus"  => true,
						"rewrite"            => array('slug' => 'destination-continent', 'with_front' => true),
						"query_var"          => true,
						"show_admin_column"  => true,
						"show_in_rest"       => true,
						"show_in_quick_edit" => true,
					)
				),

				//Post Destination taxonomy Destination Location
				array(
					'taxonomy'    => 'destination-location',
					'object_type' => 'destination',
					'args'        => array(
						"labels"  => array(
							'name'              => _x('Locations', 'taxonomy general name', 'gofly-core'),
							'singular_name'     => _x('Location', 'taxonomy singular name', 'gofly-core'),
							'search_items'      => __('Search Locations', 'gofly-core'),
							'all_items'         => __('All Locations', 'gofly-core'),
							'parent_item'       => __('Parent Location', 'gofly-core'),
							'parent_item_colon' => __('Parent Location:', 'gofly-core'),
							'edit_item'         => __('Edit Location', 'gofly-core'),
							'update_item'       => __('Update Location', 'gofly-core'),
							'add_new_item'      => __('Add Location', 'gofly-core'),
							'new_item_name'     => __('New Location Name', 'gofly-core'),
							'menu_name'         => __('Location', 'gofly-core'),
						),
						"public"             => true,
						"hierarchical"       => true,
						'has_archive'        => true,
						"show_ui"            => true,
						"show_in_menu"       => true,
						"show_in_nav_menus"  => true,
						"rewrite"            => array('slug' => 'destination-location', 'with_front' => true),
						"query_var"          => true,
						"show_admin_column"  => true,
						"show_in_rest"       => true,
						"show_in_quick_edit" => true,
					)
				),


			);
			if (is_array($all_custom_taxonmy) && !empty($all_custom_taxonmy)) {
				foreach ($all_custom_taxonmy as $taxonomy) {
					call_user_func_array('register_taxonomy', $taxonomy);
				}
			}

			flush_rewrite_rules();
		}
	} //end class

	if (class_exists('Gofly_Custom_Post_Type')) {
		Gofly_Custom_Post_Type::getInstance();
	}
}
