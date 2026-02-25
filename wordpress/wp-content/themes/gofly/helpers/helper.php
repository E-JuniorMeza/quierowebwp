<?php

namespace Egns\Helper;

use Egns_Helpers as GlobalEgns_Helpers;
use Elementor\Plugin;

if (!class_exists('Egns_Helper')) {

	/**
	 * Helper handlers class
	 */
	class Egns_Helper
	{

		/**
		 * Helper Class constructor
		 */
		function __construct()
		{
			// Before, After page load
			$this->actions();

			// Fire hook to include main header template
			add_action('egns_action_page_header_template', array($this, 'egns_load_page_header'));

			// Fire hook to include main footer template
			add_action('egns_action_page_footer_template', array($this, 'egns_load_page_footer'));
		}

		public function egns_load_page_header()
		{
			// Include header template
			echo apply_filters('egns_filter_header_template', self::egns_header_template());
		}


		public function egns_load_page_footer()
		{
			// Include Footer template
			echo apply_filters('egns_filter_footer_template', self::egns_footer_template());
		}


		/**
		 * Method that echo module template part.
		 *
		 * @param string $module name of the module from inc folder
		 * @param string $template full path of the template to load
		 * @param string $slug
		 * @param array  $params array of parameters to pass to template
		 */
		public static function egns_template_part($module, $template, $slug = '', $params = array())
		{
			echo self::egns_get_template_part($module, $template, $slug, $params);
		}

		/**
		 * Method that load module template part.
		 *
		 * @param string $module name of the module from inc folder
		 * @param string $template full path of the template to load
		 * @param string $slug
		 * @param array  $params array of parameters to pass to template
		 *
		 * @return string - string containing html of template
		 */
		public static function egns_get_template_part($module, $template, $slug = '', $params = array())
		{

			//HTML Content from template
			$html          = '';
			$template_path = EGNS_INC_ROOT_DIR . '/' . $module;

			$temp = $template_path . '/' . $template;
			if (is_array($params) && count($params)) {
				extract($params);
			}

			$template = '';

			if (!empty($temp)) {
				if (!empty($slug)) {
					$template = "{$temp}-{$slug}.php";

					if (!file_exists($template)) {
						$template = $temp . '.php';
					}
				} else {
					$template = $temp . '.php';
				}
			}

			if ($template) {
				ob_start();
				include($template);
				$html = ob_get_clean();
			}

			return $html;
		}

		/**
		 * Method that check file exists or not.
		 *
		 * @param string $module name of the module from inc folder
		 * @param string $template full path of the template to load
		 * @param string $slug
		 *
		 * @return boolean - if exists then return true or false
		 */
		public static function egns_check_template_part($module, $template, $slug = '', $params = array())
		{

			//HTML Content from template
			$html          = '';
			$template_path = EGNS_INC_ROOT_DIR . '/' . $module;

			$temp = $template_path . '/' . $template;
			if (is_array($params) && count($params)) {
				extract($params);
			}

			$template = '';

			if (!empty($temp)) {
				if (!empty($slug)) {
					$template = "{$temp}-{$slug}.php";

					if (!file_exists($template)) {
						return false;
					} else {
						return true;
					}
				} else {
					$template = $temp . '.php';
					if (!file_exists($template)) {
						return false;
					} else {
						return true;
					}
				}
			}
		}


		/**
		 * Method that checks if forward plugin installed
		 *
		 * @param string $plugin - plugin name
		 *
		 * @return bool
		 */
		public static function egns_is_installed($plugin)
		{

			switch ($plugin) {
				case 'egns-core';
					return class_exists('Egns_Core');
					break;
				case 'woocommerce';
					return class_exists('WooCommerce');
					break;
				default:
					return false;
			}
		}


		/**
		 * Overwrite the theme option when page option is available.
		 *
		 * @param mixed theme option value.
		 * @param mixed page option value.
		 * @since   1.0.0
		 * @return bool 
		 */
		public static function is_enabled($theme_option, $page_option)
		{

			if (class_exists('CSF')) {

				if ($theme_option == 1) {

					if ($page_option == 1) {
						return true;
					} elseif (is_singular('product') || is_singular('portfolio') ||  is_singular('post') || is_single('post') || self::gofly_is_blog_pages() || is_404()) {
						return true;
					} elseif ($theme_option == 1 && empty($page_option) && $page_option != 0) {
						return true;
					} else {
						return false;
					}
				} else {
					return false;
				}
			} else {
				return true;
			}
		}
		/**
		 * Get all created menus with ID
		 *
		 * @since   1.0.0
		 */
		public static function list_all_menus()
		{
			// Get all registered menus
			$menus = get_terms('nav_menu', array('hide_empty' => true));

			// Initialize an empty array to store menu names with ID
			$menu_names = array();

			// Check if there are any menus
			if (!empty($menus)) {
				// Loop through each menu and add its name to the array
				foreach ($menus as $menu) {
					$menu_names[$menu->term_id] = $menu->name;
				}
			}

			// Return the array of menu names
			return $menu_names;
		}


		public static function display_related_posts_by_category($post_id)
		{
			$categories = wp_get_post_categories($post_id);

			if ($categories) {
				$args = array(
					'category__in'   => $categories,
					'post__not_in'   => array($post_id),
					'posts_per_page' => 4, // Number of related posts to display
					'orderby'        => 'rand' // Random order
				);

				$related_posts = new \WP_Query($args);

				if ($related_posts->have_posts()) { ?>
					<div class="blog-post-area pt-90">
						<h6><?php echo esc_html__('You May Also Like', 'gofly') ?></h6>
						<span class="line-break3"></span>
						<span class="line-break"></span>
						<div class="row gy-5">
							<?php while ($related_posts->have_posts()) {
								$related_posts->the_post();
							?>
								<div class="col-md-6">
									<div class="blog-card2 two">
										<?php
										self::egns_template_part('blog', 'templates/common/grid/thumbnail');
										self::egns_template_part('blog', 'templates/common/content');
										?>
									</div>
								</div>
							<?php
							}
							wp_reset_postdata();
							?>

						</div>
					</div>
				<?php
				}
			}
		}


		public static function  egns_project_value($key1, $key2 = '', $key3 = '', $default = '')
		{

			$page_options = get_post_meta(get_the_ID(), 'EGNS_PROJECT_META_ID', true);

			if (isset($page_options[$key1][$key2][$key3])) {
				return $page_options[$key1][$key2][$key3];
			} elseif (isset($page_options[$key1][$key2])) {
				return $page_options[$key1][$key2];
			} elseif (isset($page_options[$key1])) {
				return $page_options[$key1];
			} else {
				return $default;
			}
		}


		public static function  egns_career_value($key1, $key2 = '', $key3 = '', $default = '')
		{

			$page_options = get_post_meta(get_the_ID(), 'EGNS_CAREER_META_ID', true);

			if (isset($page_options[$key1][$key2][$key3])) {
				return $page_options[$key1][$key2][$key3];
			} elseif (isset($page_options[$key1][$key2])) {
				return $page_options[$key1][$key2];
			} elseif (isset($page_options[$key1])) {
				return $page_options[$key1];
			} else {
				return $default;
			}
		}

		/**
		 * clean special chars, spaces with hyphens
		 *
		 * @since   1.0.0
		 */
		public static function clean($string)
		{
			$string = str_replace(' ', '', $string);                  // Replaces all spaces with hyphens.
			$string = preg_replace('/[^A-Za-z0-9\-]/', '', $string);  // Removes special chars.

			return preg_replace('/-+/', '', $string);  // Replaces multiple hyphens with single one.
		}

		/**
		 * Get first category with link
		 *
		 * @since   1.0.0
		 */
		public static function the_first_category()
		{
			$categories = get_the_category();
			if (!empty($categories)) {
				echo '<a href="' . esc_url(get_category_link($categories[0]->term_id)) . '">' . esc_html($categories[0]->name) . '</a>';
			}
		}

		/**
		 * Option Dynamic Styles (Header)
		 *
		 * @since   1.0.0
		 */
		public function egns_header_template()
		{
			$egns_scrolltop = self::egns_get_theme_option('header_scroll_enable');

			if (1 == $egns_scrolltop) {
				get_template_part('inc/common/templates/scroll-top');
			}

			$get_header_style        = self::egns_get_theme_option('header_menu_style');
			$get_page_header_style   = self::egns_page_option_value('page_header_menu_style');
			$page_main_header_enable = self::egns_page_option_value('page_main_header_enable');

			// Get page header layout
			if (!empty($page_main_header_enable) && ($page_main_header_enable == 'disable') && class_exists('CSF')) {
				$get_header_style = 'no_header';
			} else {
				if (!empty($get_page_header_style) && $get_page_header_style == 'header_one' && class_exists('CSF')) {
					$get_header_style = 'header_one';
				}
				if (!empty($get_page_header_style) && $get_page_header_style == 'header_two' && class_exists('CSF')) {
					$get_header_style = 'header_two';
				}
				if (!empty($get_page_header_style) && $get_page_header_style == 'header_three' && class_exists('CSF')) {
					$get_header_style = 'header_three';
				}
				if (!empty($get_page_header_style) && $get_page_header_style == 'header_four' && class_exists('CSF')) {
					$get_header_style = 'header_four';
				}
				if (!empty($get_page_header_style) && $get_page_header_style == 'header_five' && class_exists('CSF')) {
					$get_header_style = 'header_five';
				}
				if (!empty($get_page_header_style) && $get_page_header_style == 'header_six' && class_exists('CSF')) {
					$get_header_style = 'header_six';
				}
				if (!empty($get_page_header_style) && $get_page_header_style == 'header_seven' && class_exists('CSF')) {
					$get_header_style = 'header_seven';
				}
				if (!empty($get_page_header_style) && $get_page_header_style == 'header_eight' && class_exists('CSF')) {
					$get_header_style = 'header_eight';
				}
			}

			switch ($get_header_style) {
				case 'header_one':
					get_template_part('inc/header/templates/parts/header_one');
					break;
				case 'header_two':
					get_template_part('inc/header/templates/parts/header_two');
					break;
				case 'header_three':
					get_template_part('inc/header/templates/parts/header_three');
					break;
				case 'header_four':
					get_template_part('inc/header/templates/parts/header_four');
					break;
				case 'header_five':
					get_template_part('inc/header/templates/parts/header_five');
					break;
				case 'header_six':
					get_template_part('inc/header/templates/parts/header_six');
					break;
				case 'header_seven':
					get_template_part('inc/header/templates/parts/header_seven');
					break;
				case 'header_eight':
					get_template_part('inc/header/templates/parts/header_eight');
					break;
				case 'no_header':
					break;
				default:
					get_template_part('inc/header/templates/parts/header_one');
					break;
			}
		}



		/**
		 * Option Dynamic Styles (Footer)
		 *
		 * @since   1.2.0
		 */
		public function egns_footer_template()
		{
			$get_footer_style 	  	 	= self::egns_get_theme_option('footer_layout_style');
			$get_page_footer_style 		= self::egns_page_option_value('page_footer_layout');
			$page_main_footer_enable 	= self::egns_page_option_value('page_main_footer_enable');

			// Page Header Layout
			if (!empty($page_main_footer_enable) && ($page_main_footer_enable == 'disable') && class_exists('CSF')) {
				$get_footer_style = 'no_footer';
			} else {
				if (!empty($get_page_footer_style) && $get_page_footer_style == 'footer_one' && class_exists('CSF')) {
					$get_footer_style = 'footer_one';
				}
				if (!empty($get_page_footer_style) && $get_page_footer_style == 'footer_two' && class_exists('CSF')) {
					$get_footer_style = 'footer_two';
				}
				if (!empty($get_page_footer_style) && $get_page_footer_style == 'footer_three' && class_exists('CSF')) {
					$get_footer_style = 'footer_three';
				}
				if (!empty($get_page_footer_style) && $get_page_footer_style == 'footer_four' && class_exists('CSF')) {
					$get_footer_style = 'footer_four';
				}
				if (!empty($get_page_footer_style) && $get_page_footer_style == 'footer_five' && class_exists('CSF')) {
					$get_footer_style = 'footer_five';
				}
				if (!empty($get_page_footer_style) && $get_page_footer_style == 'footer_six' && class_exists('CSF')) {
					$get_footer_style = 'footer_six';
				}
				if (!empty($get_page_footer_style) && $get_page_footer_style == 'footer_seven' && class_exists('CSF')) {
					$get_footer_style = 'footer_seven';
				}
				if (!empty($get_page_footer_style) && $get_page_footer_style == 'footer_eight' && class_exists('CSF')) {
					$get_footer_style = 'footer_eight';
				}
			}

			switch ($get_footer_style) {
				case 'footer_one':
					get_template_part('inc/footer/templates/parts/footer_one');
					break;
				case 'footer_two':
					get_template_part('inc/footer/templates/parts/footer_two');
					break;
				case 'footer_three':
					get_template_part('inc/footer/templates/parts/footer_three');
					break;
				case 'footer_four':
					get_template_part('inc/footer/templates/parts/footer_four');
					break;
				case 'footer_five':
					get_template_part('inc/footer/templates/parts/footer_five');
					break;
				case 'footer_six':
					get_template_part('inc/footer/templates/parts/footer_six');
					break;
				case 'footer_seven':
					get_template_part('inc/footer/templates/parts/footer_seven');
					break;
				case 'footer_eight':
					get_template_part('inc/footer/templates/parts/footer_eight');
					break;
				case 'no_footer':
					break;
				default:
					get_template_part('inc/footer/templates/parts/footer_one');
					break;
			}
		}


		/**
		 * Is Pages
		 *
		 * @since   1.0.0
		 */
		public static function egns_is_blog_pages()
		{
			return ((((is_search()) || (is_404()) || is_archive()) || (is_single()) || (is_singular())  ||  (is_author()) || (is_category()) || (is_home()) || (is_tag()))) ? true : false;
		}

		/**
		 * Is Blog Pages
		 *
		 * @since   1.2.0
		 */
		public static function gofly_is_blog_pages()
		{
			return ((((is_search()) || is_archive()) ||  (is_author()) || (is_category()) || (is_home())  || (is_tag()))) ? true : false;
		}

		/**
		 * Get theme options.
		 *
		 * @param string $opts Required. Option name.
		 * @param string $key Required. Option key.
		 * @param string $default Optional. Default value.
		 * @since   1.0.0
		 */

		public static function egns_get_theme_option($key, $key2 = '', $default = '')
		{
			$egns_theme_options = get_option('egns_theme_options');

			if (!empty($key2)) {
				return isset($egns_theme_options[$key][$key2]) ? $egns_theme_options[$key][$key2] : $default;
			} else {
				return isset($egns_theme_options[$key]) ? $egns_theme_options[$key] : $default;
			}
		}

		/**
		 * Css Minifier.
		 * @param $css get css
		 * @since   1.0.0
		 */
		public static function cssminifier($css)
		{
			$css = str_replace(
				["\r\n", "\r", "\n", "\t", '    '],
				'',
				preg_replace('!/\*[^*]*\*+([^/][^*]*\*+)*/!', '', trim($css))
			);
			return str_replace(
				['{ ', ' }', ' {', '} ', ' screen and '],
				['{', '}', '{', '}', ''],
				$css
			);
		}

		/**
		 * Return Page Option Value Based on Given Page Option ID.
		 *
		 * @since 1.0.0
		 *
		 * @param string $page_option_key Optional. Page Option id. By Default It will return all value.
		 * 
		 * @return mixed Page Option Value.
		 */
		public static function  egns_page_option_value($key1, $key2 = '', $default = '')
		{

			$page_options = get_post_meta(get_the_ID(), 'egns_page_options', true);

			if (isset($page_options[$key1][$key2])) {

				return $page_options[$key1][$key2];
			} else {
				if (isset($page_options[$key1])) {

					return  $page_options[$key1];
				} else {
					return $default;
				}
			}
		}


		/**
		 * Return Tour Option Value Based on Given Tour Option ID.
		 *
		 * @since 1.0.0
		 * 
		 * @return mixed Tour Option Value.
		 */
		public static function  egns_get_tour_value($key1, $key2 = '', $key3 = '', $default = '')
		{

			$tour_options = get_post_meta(get_the_ID(), 'EGNS_TOUR_META_ID', true);

			if (isset($tour_options[$key1][$key2][$key3])) {
				return $tour_options[$key1][$key2][$key3];
			} elseif (isset($tour_options[$key1][$key2])) {
				return $tour_options[$key1][$key2];
			} elseif (isset($tour_options[$key1])) {
				return $tour_options[$key1];
			} else {
				return $default;
			}
		}

		/**
		 * Return Visa Option Value Based on Given Visa Option ID.
		 *
		 * @since 1.0.0
		 * 
		 * @return mixed Visa Option Value.
		 */
		public static function  egns_get_visa_value($key1, $key2 = '', $key3 = '', $default = '')
		{

			$visa_options = get_post_meta(get_the_ID(), 'EGNS_VISA_META_ID', true);

			if (isset($visa_options[$key1][$key2][$key3])) {
				return $visa_options[$key1][$key2][$key3];
			} elseif (isset($visa_options[$key1][$key2])) {
				return $visa_options[$key1][$key2];
			} elseif (isset($visa_options[$key1])) {
				return $visa_options[$key1];
			} else {
				return $default;
			}
		}

		/**
		 * Return Experience Option Value Based on Given Experience Option ID.
		 *
		 * @since 1.0.0
		 * 
		 * @return mixed Experience Option Value.
		 */
		public static function  egns_get_exp_value($key1, $key2 = '', $key3 = '', $default = '')
		{

			$exp_options = get_post_meta(get_the_ID(), 'EGNS_EXPERIENCE_META_ID', true);

			if (isset($exp_options[$key1][$key2][$key3])) {
				return $exp_options[$key1][$key2][$key3];
			} elseif (isset($exp_options[$key1][$key2])) {
				return $exp_options[$key1][$key2];
			} elseif (isset($exp_options[$key1])) {
				return $exp_options[$key1];
			} else {
				return $default;
			}
		}


		/**
		 * Return Hotel Option Value Based on Given Hotel Option ID.
		 *
		 * @since 1.0.0
		 * 
		 * @return mixed Hotel Option Value.
		 */
		public static function  egns_get_hotel_value($key1, $key2 = '', $key3 = '', $default = '')
		{

			$hotel_options = get_post_meta(get_the_ID(), 'EGNS_HOTEL_META_ID', true);

			if (isset($hotel_options[$key1][$key2][$key3])) {
				return $hotel_options[$key1][$key2][$key3];
			} elseif (isset($hotel_options[$key1][$key2])) {
				return $hotel_options[$key1][$key2];
			} elseif (isset($hotel_options[$key1])) {
				return $hotel_options[$key1];
			} else {
				return $default;
			}
		}

		/**
		 * Return Destination Option Value Based on Given Hotel Option ID.
		 *
		 * @since 1.0.0
		 * 
		 * @return mixed Destination Option Value.
		 */
		public static function  egns_get_destination_value($key1, $key2 = '', $key3 = '', $default = '')
		{

			$destination_options = get_post_meta(get_the_ID(), 'EGNS_DESTINATION_META_ID', true);

			if (isset($destination_options[$key1][$key2][$key3])) {
				return $destination_options[$key1][$key2][$key3];
			} elseif (isset($destination_options[$key1][$key2])) {
				return $destination_options[$key1][$key2];
			} elseif (isset($destination_options[$key1])) {
				return $destination_options[$key1];
			} else {
				return $default;
			}
		}


		/**
		 * Get Blog layout
		 *
		 * @since   1.0.0
		 */
		public static function egns_post_layout()
		{
			$egns_theme_options = get_option('egns_theme_options');

			$blog_layout = !empty($egns_theme_options['blog_layout_options']) ? $egns_theme_options['blog_layout_options'] : 'default';

			return $blog_layout;
		}

		/**
		 * Escape any String with Translation
		 *
		 * @since   1.0.0
		 */

		public static function egns_translate($value)
		{
			echo sprintf(__('%s', 'gofly'), $value);
		}
		/**
		 * Escape any String with Translation
		 *
		 * @since   1.0.0
		 */

		public static function egns_translate_with_escape_($value)
		{
			$value = esc_html($value);
			echo sprintf(__('%s', 'gofly'), $value);
		}

		/**
		 * Dynamic blog layout for post archive pages.
		 *
		 * @since   1.0.0
		 */
		public static function egns_dynamic_blog_layout()
		{
			$blog_layout = self::egns_post_layout();
			if (!empty($blog_layout)) {
				if ('default' == $blog_layout) {
					get_template_part('template-parts/blog/blog-standard');
				} elseif ($blog_layout == 'layout-01') {
					get_template_part('template-parts/blog/blog-grid-sidebar');
				}
			} else {
				get_template_part('template-parts/blog/blog-standard');
			}
		}

		/**
		 * 
		 * @return [string] audio url for audio post
		 */
		public static function egns_embeded_audio($width, $height)
		{
			$url = esc_url(get_post_meta(get_the_ID(), 'egns_audio_url', 1));
			if (!empty($url)) {
				return '<div class="post-media">' . wp_oembed_get($url, array('width' => $width, 'height' => $height)) . '</div>';
			}
		}

		/**
		 * @return [string] Checks For Embed Audio In The Post.
		 */
		public static function egns_has_embeded_audio()
		{
			$url = esc_url(get_post_meta(get_the_ID(), 'egns_audio_url', 1));
			if (!empty($url)) {
				return true;
			} else {
				return false;
			}
		}

		/**
		 * Post Meta Box Key Information
		 *
		 * @param  String $meta_key
		 */

		public static function egns_post_meta_box_value($meta_key, $meta_key_value)
		{
			return get_post_meta(get_the_ID(), $meta_key, true)[$meta_key_value];
		}

		/**
		 * Find Related Project
		 *
		 * @param  int $post_id
		 * @param  String $post_type
		 * @param  String $custom_post_taxonomy
		 * 
		 */

		public static function egns_find_related_project($post_id, $post_type, $custom_post_taxonomy)
		{
			//get the taxonomy terms of custom post type
			$customTaxonomyTerms = wp_get_object_terms($post_id, $custom_post_taxonomy, array('fields' => 'ids'));

			//query arguments
			$args = array(
				'post_type'      => $post_type,
				'post_status'    => 'publish',
				'posts_per_page' => 5,
				'orderby'        => 'rand',
				'tax_query'      => array(
					array(
						'taxonomy' => $custom_post_taxonomy,
						'field'    => 'id',
						'terms'    => $customTaxonomyTerms
					)
				),
				'post__not_in' => array($post_id),
			);
			return $args;
		}


		/**
		 * @return [string] Embed gallery for the post.
		 */
		public static function egns_gallery_images()
		{
			$images = get_post_meta(get_the_ID(), 'egns_gallery_images', 1);

			$images = explode(',', $images);
			if ($images && count($images) > 1) {
				$gallery_slide  = '<div class="swiper blog-archive-slider">';
				$gallery_slide .= '<div class="swiper-wrapper">';
				foreach ($images as $image) {
					$gallery_slide .= '<div class="swiper-slide"><a href="' . get_the_permalink() . '"><img src="' . wp_get_attachment_image_url($image, 'full') . '" alt="' . esc_attr(get_the_title()) . '"></a></div>';
				}
				$gallery_slide .= '</div>';
				$gallery_slide .= '</div>';

				$gallery_slide .= '<div class="slider-arrows arrows-style-2 sibling-3 text-center d-flex flex-row justify-content-between align-items-center w-100">';
				$gallery_slide .= '<div class="blog1-prev swiper-prev-arrow" tabindex="0" role="button" aria-label="' . esc_html('Previous slide') . '"> <i class="bi bi-arrow-left"></i> </div>';

				$gallery_slide .= '<div class="blog1-next swiper-next-arrow" tabindex="0" role="button" aria-label="' . esc_html('Next slide') . '"><i class="bi bi-arrow-right"></i></div>';
				$gallery_slide .= '</div>';

				return $gallery_slide;
			}
		}

		/**
		 * @return [string] Has Gallery for Gallery post.
		 */
		public static function has_egns_gallery()
		{
			$images = get_post_meta(get_the_ID(), 'egns_gallery_images', 1);
			if (!empty($images)) {
				return true;
			} else {
				return false;
			}
		}

		/**
		 * @return string get the attachment image.
		 */
		public static function egns_thumb_image()
		{
			$image = get_post_meta(get_the_ID(), 'egns_thumb_images', 1);
			echo '<a href="' . get_the_permalink() . '"><img src="' . isset($image['url']) . '" alt="' . esc_attr(get_the_title()) . ' "class="img-fluid wp-post-image"></a>';
		}

		/**
		 * @return [quote] text for quote post
		 */
		public static function egns_quote_content()
		{
			$text = get_post_meta(get_the_ID(), 'egns_quote_text', 1);
			if (!empty($text)) {
				return sprintf(esc_attr__("%s", 'gofly'), $text);
			}
		}

		/**
		 * @return [string] video url for video post
		 */
		public static function egns_embeded_video($width = '', $height = '')
		{
			$url = esc_url(get_post_meta(get_the_ID(), 'egns_video_url', 1));
			if (!empty($url)) {
				return wp_oembed_get($url, array('width' => $width, 'height' => $height));
			}
		}

		/**
		 * @return [string] Has embed video for video post.
		 */
		public static function has_egns_embeded_video()
		{
			$url = esc_url(get_post_meta(get_the_ID(), 'egns_video_url', 1));
			if (!empty($url)) {
				return true;
			} else {
				return false;
			}
		}


		public static function get_theme_logo($logo_url, $echo = true)
		{
			if (has_custom_logo()):
				the_custom_logo();

			elseif (!empty($logo_url)):
				?>
				<?php if (!empty($logo_url)): ?>
					<a href="<?php echo esc_url(home_url('/')); ?>">
						<img class="img-fluid" src="<?php echo esc_url($logo_url); ?>" alt="<?php echo esc_attr(get_bloginfo('name', 'display')); ?>">
					</a>
				<?php endif ?>

				<?php
			else : {
				?>
					<div class="site-title">
						<h3><a href="<?php echo esc_url(home_url('/')) ?>"><?php echo esc_html(get_bloginfo('name')); ?></a></h3>
					</div>

				<?php
				}
			endif;
		}

		public static function get_theme_logo_mobile($logo_url, $echo = true)
		{
			if (has_custom_logo()):
				the_custom_logo();

			elseif (!empty($logo_url)):
				?>
				<?php if (!empty($logo_url)): ?>
					<a href="<?php echo esc_url(home_url('/')); ?>">
						<img class="img-fluid" src="<?php echo esc_url($logo_url); ?>" alt="<?php echo esc_attr(get_bloginfo('name', 'display')); ?>">
					</a>
				<?php endif ?>

				<?php
			else : {
				?>
					<div class="site-title d-lg-none d-block">
						<h3><a href="<?php echo esc_url(home_url('/')) ?>"><?php echo esc_html(get_bloginfo('name')); ?></a></h3>
					</div>

				<?php
				}
			endif;
		}



		public static function get_copyright_theme_logo($logo_url, $echo = true)
		{
			if (has_custom_logo()):
				the_custom_logo();
			elseif (!empty($logo_url)):
				?>
				<a href="<?php echo esc_url(home_url('/')); ?>" title="<?php echo esc_attr(get_bloginfo('name', 'display')); ?>">
					<?php if (!empty($logo_url)): ?>
						<img class="img-fluid" src="<?php echo esc_url($logo_url); ?>" alt="<?php echo esc_attr(get_bloginfo('name', 'display')); ?>"></a>
			<?php endif ?>
			<?php
			endif;
		}

		/**
		 * Menu links.
		 *
		 * @param   string $theme_location menu type.
		 * @param   string $container_class main class.
		 * @param   string $after icon tag.
		 * @param   string $menu_class .
		 * @param   string $depth.
		 * @since   1.0.0
		 */
		public static function egns_get_theme_menu($theme_location = 'primary-menu', $container_class = '', $link_after = '', $after = '<i class="bi bi-plus dropdown-icon"></i>', $menu_class = 'menu-list', $depth = 3, $echo = true)
		{
			if (has_nav_menu('primary-menu')) {
				wp_nav_menu(
					array(
						'theme_location'  => $theme_location,
						'container'       => false, // This will prevent any container div from being added
						'container_class' => $container_class,
						'link_before'     => '', // Add opening span tag
						'link_after'      => $link_after, // Add closing span tag
						'after'           => $after,
						'container_id'    => '',
						'menu_class'      => $menu_class,
						'fallback_cb'     => '',
						'menu_id'         => '',
						'depth'           => $depth,
						// Conditionally add the walker
						'walker'          => class_exists('CSF') ? new \Egns_Menu_Walker() : null,
					)
				);
			} else {
				if (is_user_logged_in()) { ?>
				<div class="set-menu">
					<h4>
						<a href="<?php echo admin_url(); ?>nav-menus.php">
							<?php echo esc_html('Set Menu Here...', 'gofly'); ?>
						</a>
					</h4>
				</div>
			<?php }
			}
		}


		/**
		 * Menu links.
		 *
		 * @param   string $theme_location menu type.
		 * @param   string $container_class main class.
		 * @param   string $after icon a tag.
		 * @param   string $after icon tag.
		 * @param   string $menu_class .
		 * @param   string $depth.
		 * @since   1.0.0
		 */
		public static function egns_get_theme_side_menu($theme_location = 'side-menu', $container_class = '', $link_after = '', $after = '<i class="bi bi-plus dropdown-icon"></i>', $menu_class = 'menu-list', $depth = 3, $echo = true)
		{
			if (has_nav_menu('side-menu')) {
				wp_nav_menu(
					array(
						'theme_location'  => $theme_location,
						'container'       => false,              // This will prevent any container div from being added
						'container_class' => $container_class,
						'link_before'     => '',
						'link_after'      => $link_after,
						'after'           => $after,
						'container_id'    => '',
						'menu_class'      => $menu_class,
						'fallback_cb'     => '',
						'menu_id'         => '',
						'depth'           => $depth,
					)
				);
			} else {
				if (is_user_logged_in()) { ?>
				<div class="set-menu">
					<h4>
						<a href="<?php echo admin_url(); ?>nav-menus.php">
							<?php echo esc_html('Set Menu Here...', 'vernex'); ?>
						</a>
					</h4>
				</div>
			<?php }
			}
		}

		/**
		 * Output WordPress theme menu with custom parameters.
		 *
		 * @param string $theme_location  Menu location slug (registered in theme).
		 * @param string $container_class Class for the container.
		 * @param string $link_after      HTML to add after each menu link.
		 * @param string $after           HTML to add after each menu item.
		 * @param string $menu_class      Class for the <ul> element.
		 * @param int    $depth           Depth of menu levels.
		 * @param bool   $echo            Whether to echo the menu.
		 *
		 * @since 1.0.0
		 */
		public static function egns_get_theme_menu_two(
			$theme_location = 'primary-menu',
			$container_class = '',
			$link_after = '',
			$after = '<span class="dropdown-icon2"><i class="bi bi-plus"></i></span>',
			$menu_class = 'main-menu',
			$depth = 3,
			$echo = true
		) {
			if (has_nav_menu($theme_location)) {
				$args = array(
					'theme_location'  => $theme_location,
					'container'       => false,
					'container_class' => $container_class,
					'link_before'     => '',
					'link_after'      => $link_after,
					'after'           => $after,
					'container_id'    => '',
					'menu_class'      => $menu_class,
					'fallback_cb'     => '',
					'menu_id'         => '',
					'depth'           => $depth,
					'walker'          => class_exists('CSF') ? new \Egns_Menu_Walker() : null,
					'items_wrap'      => '<ul class="%2$s">%3$s</ul>',
					'echo'            => $echo,
				);
				wp_nav_menu($args);
			} else {
				if (is_user_logged_in() && $echo) {
					echo '<div class="set-menu">';
					echo '<h4><a href="' . esc_url(admin_url('nav-menus.php')) . '">';
					echo esc_html__('Set Menu Here...', 'gofly');
					echo '</a></h4>';
					echo '</div>';
				}
			}
		}


		/**

		 * Displays SVG content.

		 * This function retrieves SVG content from a file URL and displays it. If a filesystem object

		 * is provided, it uses it to fetch the file contents. Otherwise, it uses WordPress functions

		 * to fetch the contents remotely. The SVG content is then echoed directly.

		 * @since 1.0.0

		 * @param string $file_url The URL of the SVG file.

		 * @param object $filesystem Optional. The filesystem object. Defaults to null.
		 */

		public static function display_svg($file_url, $filesystem = null)
		{
			if (is_null($filesystem) && function_exists('WP_Filesystem')) {
				global $wp_filesystem;
				$filesystem = $wp_filesystem;
			} elseif (is_null($filesystem)) {
				include_once ABSPATH . 'wp-admin/includes/file.php';
			}

			$file_contents = '';
			if ($filesystem) {
				$file_contents = $filesystem->get_contents($file_url);
			} else {
				$response = wp_remote_get($file_url);
				if (!is_wp_error($response) && $response['response']['code'] === 200) {
					$file_contents = wp_remote_retrieve_body($response);
				}
			}

			if (!empty($file_contents)) {
				echo sprintf('%s', $file_contents);
			}
		}

		/**
		 * Post Details Pagination
		 * @since   1.0.0
		 */

		public static function egns_get_post_pagination()
		{
			wp_link_pages(
				array(
					'before'         => '<ul class="page-paginations d-flex justify-content-center align-items-center">' . esc_html__('Pages: ', 'gofly') . '<li class="page-item">',
					'after'          => '</li></ul>',
					'link_before'    => '',
					'link_after'     => '',
					'next_or_number' => 'number',
					'separator'      => '</li><li>',
					'pagelink'       => '%',
					'echo'           => 1
				)
			);
		}


		public static function egns_get_archive_pagination($custom_query = null)
		{
			if (is_null($custom_query)) {
				global $wp_query;
				$custom_query = $wp_query;
			}

			$big = 999999999; // dummy value for pagination base replacement
			$current_page = max(1, get_query_var('paged'));

			$pagination_links = paginate_links(array(
				'base'      => str_replace($big, '%#%', esc_url(get_pagenum_link($big))),
				'format'    => '?paged=%#%',
				'current'   => $current_page,
				'total'     => $custom_query->max_num_pages,
				'type'      => 'array',
				'prev_text' => '',
				'next_text' => '',
			));

			if ($pagination_links) {
				echo '<div class="paginations-button">';

				if ($current_page > 1) {
					echo '<a href="' . esc_url(get_pagenum_link($current_page - 1)) . '">';
			?>
				<svg width="10" height="10" viewBox="0 0 10 10" xmlns="http://www.w3.org/2000/svg">
					<g>
						<path d="M7.86133 9.28516C7.14704 7.49944 3.57561 5.71373 1.43276 4.99944C3.57561 4.28516 6.7899 3.21373 7.86133 0.713728" stroke-width="1.5" stroke-linecap="round"></path>
					</g>
				</svg>
			<?php
					echo esc_html__('Prev', 'gofly');
					echo '</a>';
				}

				echo '</div>';

				echo '<ul class="paginations">';
				foreach ($pagination_links as $link) {
					if (strpos($link, 'prev') !== false || strpos($link, 'next') !== false) {
						continue;
					}
					echo '<li class="page-item' . (strpos($link, 'current') !== false ? ' active' : '') . '">';
					echo sprintf('%s', $link); // OUTPUT FIXED HERE
					echo '</li>';
				}
				echo '</ul>';

				echo '<div class="paginations-button">';

				if ($current_page < $custom_query->max_num_pages) {
					echo '<a href="' . esc_url(get_pagenum_link($current_page + 1)) . '">';
					echo esc_html__('Next', 'gofly');
			?>
				<svg width="10" height="10" viewBox="0 0 10 10" xmlns="http://www.w3.org/2000/svg">
					<g>
						<path d="M1.42969 9.28613C2.14397 7.50042 5.7154 5.7147 7.85826 5.00042C5.7154 4.28613 2.50112 3.21471 1.42969 0.714705" stroke-width="1.5" stroke-linecap="round"></path>
					</g>
				</svg>
			<?php
					echo '</a>';
				}

				echo '</div>';
			}
		}


		/**
		 * Display an image or inline SVG.
		 *
		 * @param string 
		 * @param string 
		 */
		public static function gofly_display_icon_image($image_url, $alt = '')
		{
			if (!empty($image_url) && pathinfo($image_url, PATHINFO_EXTENSION) === 'svg') {
				$relative_path = str_replace(site_url('/'), '', $image_url);
				$svg_path = ABSPATH . $relative_path;

				if (file_exists($svg_path)) {
					$svg_content = file_get_contents($svg_path);

					if ($svg_content !== false) {
						// Allow only safe SVG tags/attributes
						$allowed_svg_tags = array(
							'svg'      => array(
								'class'       => true,
								'xmlns'       => true,
								'width'       => true,
								'height'      => true,
								'viewBox'     => true,
								'aria-hidden' => true,
								'role'        => true,
								'focusable'   => true,
								'fill'        => true,
							),
							'g'        => array('fill' => true),
							'path'     => array('d' => true, 'fill' => true),
							'rect'     => array('width' => true, 'height' => true, 'fill' => true, 'x' => true, 'y' => true),
							'circle'   => array('cx' => true, 'cy' => true, 'r' => true, 'fill' => true),
							'title'    => array(),
							'desc'     => array(),
							'use'      => array('xlink:href' => true, 'href' => true),
							'defs'     => array(),
							'linearGradient' => array('id' => true, 'x1' => true, 'y1' => true, 'x2' => true, 'y2' => true),
							'stop'     => array('offset' => true, 'stop-color' => true),
						);

						echo wp_kses($svg_content, $allowed_svg_tags);
						return;
					}
				}
			}

			echo '<img src="' . esc_url($image_url) . '" alt="' . esc_attr($alt) . '">';
		}


		/**
		 * Option Dynamic Styles.
		 *
		 * @since   1.0.0
		 */
		public function egns_enqueue_scripts()
		{
			$objects = array(
				'sticky_header_enable' => self::sticky_header_enable(),
				'animation_enable'     => self::animation_enable(),
				'is_egns_core_enable'  => class_exists('CSF') ? true : false,
			);
			wp_localize_script('custom-main', 'theme_options', $objects);
		}

		public static function sticky_header_enable()
		{
			$page_sticky_option = Egns_Helper::egns_page_option_value('sticky_header_enable');
			$sticky_header      = Egns_Helper::egns_get_theme_option('header_sticky_enable');

			if (Egns_Helper::is_enabled($sticky_header, $page_sticky_option)) {
				return true;
			} else {
				return false;
			}
		}

		public static function animation_enable()
		{
			$animation_enable = Egns_Helper::egns_get_theme_option('animation_enable');

			if ($animation_enable == 1) {
				return true;
			} else {
				return false;
			}
		}

		/**
		 * Get Page Options Value
		 *
		 * @since   1.0.0
		 */

		public static function egns_get_options_value($theme_option, $page_option)
		{
			if (!empty($page_option)) {
				return $page_option;
			} else {
				return $theme_option;
			}
		}



		/**
		 * Post layout for post formet.
		 *
		 * @since   1.0.0
		 */
		public static function dynamic_post_format()
		{
			$format = get_post_format(get_the_ID());

			switch ($format) {
				case 'video';
					self::egns_template_part('post-thumb', 'video');
					break;
				case 'audio';
					self::egns_template_part('post-thumb', 'audio');
					break;
				case 'gallery';
					self::egns_template_part('post-thumb', 'gallery');
					break;
				case 'quote';
					self::egns_template_part('post-thumb', 'quote');
					break;
				case 'image';
					self::egns_template_part('post-thumb', 'image');
					break;
				default:
					break;
			}
		}


		/**
		 * Define the core functionality of the.
		 *
		 * @since   1.0.0
		 */
		public function actions()
		{
			add_action('egns_page_before', array($this, 'open_container'));
			add_action('egns_page_after', array($this, 'close_container'));
			add_action('egns_post_before', array($this, 'post_open_container'));
			add_action('egns_post_after', array($this, 'post_close_container'));
			add_action('egns_header_template', array($this, 'egns_header_template'));
		}


		/**
		 * Is elementor.
		 *
		 * @since   1.0.0
		 */
		public static function is_elementor()
		{
			if (self::gofly_is_blog_pages()) {
				return false;
			}

			if (did_action('elementor/loaded')) {
				return Plugin::$instance->documents->get(get_the_ID())->is_built_with_elementor();
			} else {
				return false;
			}
		}

		/**
		 * Open Page Container.
		 *
		 * @since   1.0.0
		 */
		public function open_container()
		{
			if (!self::is_elementor()): ?>
			<div class="container">
			<?php
			endif;
		}

		/**
		 * Close Page Container.
		 *
		 * @since   1.0.0
		 */
		public function close_container()
		{
			if (!self::is_elementor()):
			?>
			</div> <!-- End Main Content Area  -->
		<?php endif;
		}

		/**
		 * Post Open Container.
		 *
		 * @since   1.0.0
		 */
		public function post_open_container()
		{
			if (is_single()) {
		?>
			<div class="blog-details">
			<?php
			} else {
			?>
				<div>
				<?php
			}
		}

		/**
		 * Post Close Container.
		 *
		 * @since   1.0.0
		 */
		public function post_close_container()
		{
				?>
				</div>
	<?php
		}




		/**
		 * Get count using WPBD Query
		 *
		 * @since   1.0.0
		 */
		public static function egns_get_counts_by_custom_meta_key($meta_key, $meta_value, $post_type)
		{
			global $wpdb;

			$tours_meta = $wpdb->get_results($wpdb->prepare("
				SELECT meta_value
				FROM {$wpdb->postmeta} pm
				INNER JOIN {$wpdb->posts} p ON p.ID = pm.post_id
				WHERE pm.meta_key = %s
				AND p.post_type = '$post_type'
				AND p.post_status = 'publish'
			", $meta_key));

			$counts = [];

			foreach ($tours_meta as $row) {
				// First unserialize the entire Codestar meta array
				$all_meta = maybe_unserialize($row->meta_value);

				if (is_array($all_meta) && ! empty($all_meta[$meta_value])) {
					$destinations = $all_meta[$meta_value];

					if (is_array($destinations)) {
						foreach ($destinations as $dest_id) {
							$dest_id = intval($dest_id);
							if ($dest_id > 0) {
								if (! isset($counts[$dest_id])) {
									$counts[$dest_id] = 0;
								}
								$counts[$dest_id]++;
							}
						}
					}
				}
			}

			return $counts;
		}


		/**
		 * Get how many tours selected each experience
		 *
		 * @param string $meta_key   The meta key in Tours.
		 * @param string $meta_value The sub-field key inside that meta.
		 * @param string $post_type  The post type where the meta is stored.
		 * @return array Associative array [ experience_id => count ]
		 * 
		 * @since   1.0.0
		 */
		public static function egns_get_experience_counts_from_tours($meta_key = 'EGNS_TOUR_META_ID', $meta_value = 'tour_experience_select', $post_type = 'tour')
		{
			global $wpdb;

			$tours_meta = $wpdb->get_results($wpdb->prepare("
				SELECT meta_value
				FROM {$wpdb->postmeta} pm
				INNER JOIN {$wpdb->posts} p ON p.ID = pm.post_id
				WHERE pm.meta_key = %s
				AND p.post_type = %s
				AND p.post_status = 'publish'
			", $meta_key, $post_type));

			$counts = [];

			foreach ($tours_meta as $row) {
				$all_meta = maybe_unserialize($row->meta_value);

				if (is_array($all_meta) && !empty($all_meta[$meta_value])) {
					$experiences = $all_meta[$meta_value];

					if (is_array($experiences)) {
						foreach ($experiences as $exp_id) {
							$exp_id = intval($exp_id);
							if ($exp_id > 0) {
								if (!isset($counts[$exp_id])) {
									$counts[$exp_id] = 0;
								}
								$counts[$exp_id]++;
							}
						}
					}
				}
			}

			return $counts;
		}





		// Price Related Functions


		/**
		 * Get currency symbol
		 *
		 * @return array currency list
		 * 
		 * @since 1.0.0
		 */
		public static function get_all_currency()
		{
			return [
				'AED' => __('United Arab Emirates dirham (د.إ) — AED', 'gofly'),
				'AFN' => __('Afghan afghani (؋) — AFN', 'gofly'),
				'ALL' => __('Albanian lek (Lek) — ALL', 'gofly'),
				'AMD' => __('Armenian dram (֏) — AMD', 'gofly'),
				'ARS' => __('Argentine peso ($) — ARS', 'gofly'),
				'AUD' => __('Australian dollar ($) — AUD', 'gofly'),
				'AWG' => __('Aruban florin (ƒ) — AWG', 'gofly'),
				'AZN' => __('Azerbaijani manat (₼) — AZN', 'gofly'),
				'BAM' => __('Bosnia and Herzegovina convertible mark (KM) — BAM', 'gofly'),
				'BDT' => __('Bangladeshi taka (৳) — BDT', 'gofly'),
				'BGN' => __('Bulgarian lev (лв) — BGN', 'gofly'),
				'BHD' => __('Bahraini dinar (د.ب) — BHD', 'gofly'),
				'BIF' => __('Burundian franc (Fr) — BIF', 'gofly'),
				'BMD' => __('Bermudian dollar ($) — BMD', 'gofly'),
				'BND' => __('Brunei dollar ($) — BND', 'gofly'),
				'BOB' => __('Bolivian boliviano (Bs) — BOB', 'gofly'),
				'BRL' => __('Brazilian real (R$) — BRL', 'gofly'),
				'BSD' => __('Bahamian dollar ($) — BSD', 'gofly'),
				'BTN' => __('Bhutanese ngultrum (Nu) — BTN', 'gofly'),
				'BWP' => __('Botswana pula (P) — BWP', 'gofly'),
				'BYN' => __('Belarusian ruble (Br) — BYN', 'gofly'),
				'BZD' => __('Belize dollar ($) — BZD', 'gofly'),
				'CAD' => __('Canadian dollar ($) — CAD', 'gofly'),
				'CDF' => __('Congolese franc (Fr) — CDF', 'gofly'),
				'CHF' => __('Swiss franc (CHF) — CHF', 'gofly'),
				'CLP' => __('Chilean peso ($) — CLP', 'gofly'),
				'CNY' => __('Chinese yuan (¥) — CNY', 'gofly'),
				'COP' => __('Colombian peso ($) — COP', 'gofly'),
				'CRC' => __('Costa Rican colón (₡) — CRC', 'gofly'),
				'CUC' => __('Cuban convertible peso (CUC$) — CUC', 'gofly'),
				'CUP' => __('Cuban peso (₱) — CUP', 'gofly'),
				'CVS' => __('Cape Verdean escudo ($) — CVS', 'gofly'),
				'CZK' => __('Czech koruna (Kč) — CZK', 'gofly'),
				'DJF' => __('Djiboutian franc (Fdj) — DJF', 'gofly'),
				'DKK' => __('Danish krone (kr) — DKK', 'gofly'),
				'DOP' => __('Dominican peso ($) — DOP', 'gofly'),
				'DZD' => __('Algerian dinar (دج) — DZD', 'gofly'),
				'EGP' => __('Egyptian pound (£) — EGP', 'gofly'),
				'ERN' => __('Eritrean nakfa (Nfk) — ERN', 'gofly'),
				'ESP' => __('Spanish peseta (₧) — ESP', 'gofly'),
				'ETB' => __('Ethiopian birr (ታብ) — ETB', 'gofly'),
				'EUR' => __('Euro (€) — EUR', 'gofly'),
				'FJD' => __('Fijian dollar ($) — FJD', 'gofly'),
				'FKP' => __('Falkland Islands pound (£) — FKP', 'gofly'),
				'GBP' => __('British pound sterling (£) — GBP', 'gofly'),
				'GEL' => __('Georgian lari (₾) — GEL', 'gofly'),
				'GHS' => __('Ghanaian cedi (₵) — GHS', 'gofly'),
				'GIP' => __('Gibraltar pound (£) — GIP', 'gofly'),
				'GMD' => __('Gambian dalasi (D) — GMD', 'gofly'),
				'GNF' => __('Guinean franc (Fr) — GNF', 'gofly'),
				'GTQ' => __('Guatemalan quetzal (Q) — GTQ', 'gofly'),
				'GYD' => __('Guyanese dollar ($) — GYD', 'gofly'),
				'HKD' => __('Hong Kong dollar ($) — HKD', 'gofly'),
				'HNL' => __('Honduran lempira (L) — HNL', 'gofly'),
				'HRK' => __('Croatian kuna (kn) — HRK', 'gofly'),
				'HTG' => __('Haitian gourde (G) — HTG', 'gofly'),
				'HUF' => __('Hungarian forint (Ft) — HUF', 'gofly'),
				'IDR' => __('Indonesian rupiah (Rp) — IDR', 'gofly'),
				'ILS' => __('Israeli new shekel (₪) — ILS', 'gofly'),
				'INR' => __('Indian rupee (₹) — INR', 'gofly'),
				'IQD' => __('Iraqi dinar (ع.د) — IQD', 'gofly'),
				'IRR' => __('Iranian rial (﷼) — IRR', 'gofly'),
				'ISK' => __('Icelandic króna (kr) — ISK', 'gofly'),
				'JMD' => __('Jamaican dollar ($) — JMD', 'gofly'),
				'JOD' => __('Jordanian dinar (د.ا) — JOD', 'gofly'),
				'JPY' => __('Japanese yen (¥) — JPY', 'gofly'),
				'KES' => __('Kenyan shilling (Sh) — KES', 'gofly'),
				'KGS' => __('Kyrgyzstani som (лв) — KGS', 'gofly'),
				'KHR' => __('Cambodian riel (៛) — KHR', 'gofly'),
				'KMF' => __('Comorian franc (Fr) — KMF', 'gofly'),
				'KRW' => __('South Korean won (₩) — KRW', 'gofly'),
				'KWD' => __('Kuwaiti dinar (د.ك) — KWD', 'gofly'),
				'KYD' => __('Cayman Islands dollar ($) — KYD', 'gofly'),
				'KZT' => __('Kazakhstani tenge (₸) — KZT', 'gofly'),
				'LAK' => __('Laotian kip (₭) — LAK', 'gofly'),
				'LBP' => __('Lebanese pound (ل.ل) — LBP', 'gofly'),
				'LKR' => __('Sri Lankan rupee (රු) — LKR', 'gofly'),
				'LRD' => __('Liberian dollar ($) — LRD', 'gofly'),
				'LSL' => __('Lesotho loti (M) — LSL', 'gofly'),
				'LTL' => __('Lithuanian litas (Lt) — LTL', 'gofly'),
				'LVL' => __('Latvian lats (Ls) — LVL', 'gofly'),
				'LYD' => __('Libyan dinar (د.ل) — LYD', 'gofly'),
				'MAD' => __('Moroccan dirham (د.م.) — MAD', 'gofly'),
				'MDL' => __('Moldovan leu (Lei) — MDL', 'gofly'),
				'MGA' => __('Malagasy ariary (Ar) — MGA', 'gofly'),
				'MKD' => __('Macedonian denar (ден) — MKD', 'gofly'),
				'MMK' => __('Myanmar kyat (Ks) — MMK', 'gofly'),
				'MNT' => __('Mongolian tögrög (₮) — MNT', 'gofly'),
				'MOP' => __('Macanese pataca (P) — MOP', 'gofly'),
				'MUR' => __('Mauritian rupee (₨) — MUR', 'gofly'),
				'MVR' => __('Maldivian rufiyaa (Rf) — MVR', 'gofly'),
				'MWK' => __('Malawian kwacha (K) — MWK', 'gofly'),
				'MXN' => __('Mexican peso ($) — MXN', 'gofly'),
				'MYR' => __('Malaysian ringgit (RM) — MYR', 'gofly'),
				'MZN' => __('Mozambican metical (MT) — MZN', 'gofly'),
				'NAD' => __('Namibian dollar ($) — NAD', 'gofly'),
				'NGN' => __('Nigerian naira (₦) — NGN', 'gofly'),
				'NIO' => __('Nicaraguan córdoba (C$) — NIO', 'gofly'),
				'NOK' => __('Norwegian krone (kr) — NOK', 'gofly'),
				'NPR' => __('Nepalese rupee (₨) — NPR', 'gofly'),
				'NZD' => __('New Zealand dollar ($) — NZD', 'gofly'),
				'OMR' => __('Omani rial (ر.ع.) — OMR', 'gofly'),
				'PAB' => __('Panamanian balboa (B/. ) — PAB', 'gofly'),
				'PEN' => __('Peruvian nuevo sol (S/.) — PEN', 'gofly'),
				'PGK' => __('Papua New Guinean kina (K) — PGK', 'gofly'),
				'PHP' => __('Philippine peso (₱) — PHP', 'gofly'),
				'PKR' => __('Pakistani rupee (₨) — PKR', 'gofly'),
				'PLN' => __('Polish złoty (zł) — PLN', 'gofly'),
				'PYG' => __('Paraguayan guarani (Gs) — PYG', 'gofly'),
				'QAR' => __('Qatari riyal (ر.ق) — QAR', 'gofly'),
				'RON' => __('Romanian leu (lei) — RON', 'gofly'),
				'RSD' => __('Serbian dinar (дин) — RSD', 'gofly'),
				'RUB' => __('Russian ruble (₽) — RUB', 'gofly'),
				'RWF' => __('Rwandan franc (Fr) — RWF', 'gofly'),
				'SAR' => __('Saudi riyal (ر.س) — SAR', 'gofly'),
				'SBD' => __('Solomon Islands dollar ($) — SBD', 'gofly'),
				'SCR' => __('Seychellois rupee (₨) — SCR', 'gofly'),
				'SEK' => __('Swedish krona (kr) — SEK', 'gofly'),
				'SGD' => __('Singapore dollar ($) — SGD', 'gofly'),
				'SHP' => __('Saint Helena pound (£) — SHP', 'gofly'),
				'SLL' => __('Sierra Leonean leone (Le) — SLL', 'gofly'),
				'SOS' => __('Somali shilling (Sh) — SOS', 'gofly'),
				'SRD' => __('Surinamese dollar (SR$) — SRD', 'gofly'),
				'SSP' => __('South Sudanese pound (SS£) — SSP', 'gofly'),
				'STN' => __('São Tomé and Príncipe dobra (Db) — STN', 'gofly'),
				'SYP' => __('Syrian pound (£) — SYP', 'gofly'),
				'SZL' => __('Swazi lilangeni (E) — SZL', 'gofly'),
				'THB' => __('Thai baht (฿) — THB', 'gofly'),
				'TJS' => __('Tajikistani somoni (ЅМ) — TJS', 'gofly'),
				'TMT' => __('Turkmenistani manat (m) — TMT', 'gofly'),
				'TND' => __('Tunisian dinar (د.ت) — TND', 'gofly'),
				'TOP' => __('Tongan paʻanga (T$) — TOP', 'gofly'),
				'TRY' => __('Turkish lira (₺) — TRY', 'gofly'),
				'TTD' => __('Trinidad and Tobago dollar (TT$) — TTD', 'gofly'),
				'TWD' => __('New Taiwan dollar (NT$) — TWD', 'gofly'),
				'TZS' => __('Tanzanian shilling (Sh) — TZS', 'gofly'),
				'UAH' => __('Ukrainian hryvnia (₴) — UAH', 'gofly'),
				'UGX' => __('Ugandan shilling (Sh) — UGX', 'gofly'),
				'USD' => __('United States dollar ($) — USD', 'gofly'),
				'UYU' => __('Uruguayan peso ($) — UYU', 'gofly'),
				'UZS' => __('Uzbekistani som (сўм) — UZS', 'gofly'),
				'VEF' => __('Venezuelan bolívar (Bs.F) — VEF', 'gofly'),
				'VND' => __('Vietnamese đồng (₫) — VND', 'gofly'),
				'VUV' => __('Vanuatu vatu (Vt) — VUV', 'gofly'),
				'WST' => __('Samoan tala (T) — WST', 'gofly'),
				'XAF' => __('Central African CFA franc (Fr) — XAF', 'gofly'),
				'XCD' => __('East Caribbean dollar ($) — XCD', 'gofly'),
				'XOF' => __('West African CFA franc (Fr) — XOF', 'gofly'),
				'XPF' => __('CFP franc (Fr) — XPF', 'gofly'),
				'YER' => __('Yemeni rial (﷼) — YER', 'gofly'),
				'ZAR' => __('South African rand (R) — ZAR', 'gofly'),
				'ZMK' => __('Zambian kwacha (K) — ZMK', 'gofly'),
				'ZWL' => __('Zimbabwean dollar (Z$) — ZWL', 'gofly')
			];
		}


		/**
		 * Get currency symbol
		 *
		 * @param int $currency_code trip
		 * @return string currency code or null
		 * 
		 * @since 1.0.0
		 */
		public static function get_currency_symbol($currency_code)
		{
			// Define the currency array
			$currencies = self::get_all_currency();

			// Check if the currency code exists in the array
			if (isset($currencies[$currency_code])) {
				// Extract and return only the symbol part
				preg_match('/\((.*?)\)/', $currencies[$currency_code], $matches);
				return $matches[1] ?? null; // Return the symbol if matched, otherwise null
			}

			// Return null if the currency code is not found
			return null;
		}

		/**
		 * Return price currency symbol woocommerce & option panel both
		 *
		 * @return string currency symbol for price
		 * 
		 * @since 1.0.0
		 */
		public static function gofly_price_currency()
		{
			if (class_exists('WooCommerce')) {
				return get_woocommerce_currency_symbol();
			} else {
				$currency = self::egns_get_theme_option('gofly_currency');
				return self::get_currency_symbol($currency);
			}
		}


		/**
		 * Get price format woocommerce & option panel both
		 *
		 * @param int $price trip amount
		 * @return string currency,currency position,separator etc for price
		 * 
		 * @since 1.0.0
		 */
		public static function gofly_format_price($price)
		{
			if ($price === null || $price === '' || !is_numeric($price)) {
				return;
			}
			if (class_exists('WooCommerce')) {
				$currency = get_woocommerce_currency();
				$symbol = get_woocommerce_currency_symbol();
				$currency_position = get_option('woocommerce_currency_pos', 'left');
				$currency_thousand_separator = get_option('woocommerce_price_thousand_sep', ',');
				$currency_decimal_separator = get_option('woocommerce_price_decimal_sep', '.');
				$currency_number_of_decimals = get_option('woocommerce_price_num_decimals', 0);
			} else {
				$currency = self::egns_get_theme_option('gofly_currency');
				$symbol = self::get_currency_symbol($currency);
				$currency_position = self::egns_get_theme_option('gofly_currency_position');
				$currency_thousand_separator = self::egns_get_theme_option('gofly_currency_thousand_separator');
				$currency_decimal_separator = self::egns_get_theme_option('gofly_currency_decimal_separator');
				$currency_number_of_decimals = self::egns_get_theme_option('gofly_currency_number_of_decimals') ? self::egns_get_theme_option('gofly_currency_number_of_decimals') : 0;
			}
			if ($currency_position == 'right') {
				return number_format($price, $currency_number_of_decimals, $currency_decimal_separator, $currency_thousand_separator) . $symbol;
			} elseif ($currency_position == 'right_space') {
				return number_format($price, $currency_number_of_decimals, $currency_decimal_separator, $currency_thousand_separator) . ' ' . $symbol;
			} elseif ($currency_position == 'left') {
				return $symbol . number_format($price, $currency_number_of_decimals, $currency_decimal_separator, $currency_thousand_separator);
			} elseif ($currency_position == 'left_space') {
				return $symbol . ' ' . number_format($price, $currency_number_of_decimals, $currency_decimal_separator, $currency_thousand_separator);
			}
		}


		/**
		 * Get global min & max "Starting From" prices across all tours
		 * (uses the same per-tour lowest logic as get_global_starting_price)
		 *
		 * @return array ['min' => float, 'max' => float]
		 * 
		 * @since 1.0.0
		 */
		public static function get_tour_price_range()
		{
			// Get all tour IDs
			$tour_ids = get_posts([
				'post_type'      => 'tour',
				'posts_per_page' => -1,
				'post_status'    => 'publish',
				'fields'         => 'ids',
			]);

			$prices = [];

			foreach ($tour_ids as $tour_id) {
				$meta         = get_post_meta($tour_id, 'EGNS_TOUR_META_ID', true);
				$tour_package = $meta['tour_pricing_package'] ?? [];

				if (!is_array($tour_package)) {
					continue;
				}

				$min_sale    = null;
				$min_regular = null;

				foreach ($tour_package as $package) {
					if (empty($package['trip_price_table'])) {
						continue;
					}

					$regular_prices = $package['trip_price_table']['regular_price'] ?? [];
					$sale_prices    = $package['trip_price_table']['sale_price'] ?? [];

					foreach ($regular_prices as $taxonomy => $reg_value) {
						$regular = !empty($reg_value[0]) ? floatval($reg_value[0]) : null;
						$sale    = !empty($sale_prices[$taxonomy][0]) ? floatval($sale_prices[$taxonomy][0]) : null;

						// Track min regular
						if ($regular !== null) {
							$min_regular = ($min_regular === null) ? $regular : min($min_regular, $regular);
						}

						// Track min sale
						if ($sale !== null) {
							$min_sale = ($min_sale === null) ? $sale : min($min_sale, $sale);
						}
					}
				}

				// Decide the "starting from" price for this tour (same logic as get_global_starting_price)
				$starting_price = null;

				if ($min_sale !== null && ($min_regular === null || $min_sale < $min_regular)) {
					$starting_price = $min_sale;
				} elseif ($min_regular !== null) {
					$starting_price = $min_regular;
				}

				if ($starting_price !== null) {
					$prices[] = $starting_price;
				}
			}

			if (empty($prices)) {
				return ['min' => 0, 'max' => 0];
			}

			return [
				'min' => min($prices),
				'max' => max($prices),
			];
		}


		/**
		 * Get the global minimum "Starting From" price across all packages
		 *
		 * @param int $trip_id Trip post ID
		 * @return string HTML formatted lowest price
		 */
		public static function get_global_starting_price($trip_id)
		{
			$meta = get_post_meta($trip_id, 'EGNS_TOUR_META_ID', true);
			$tour_packages = $meta['tour_pricing_package'] ?? [];

			if (!is_array($tour_packages) || empty($tour_packages)) return '';

			$price_type = $meta['tour_price_type'] ?? 'per_person';
			$type_label = ($price_type === 'per_person') ? esc_html__('per person', 'gofly') : esc_html__('per group', 'gofly');

			$lowest_regular = null;
			$lowest_sale = null;

			foreach ($tour_packages as $package) {
				if (empty($package['trip_price_table'])) continue;

				$regular_prices = $package['trip_price_table']['regular_price'] ?? [];
				$sale_prices = $package['trip_price_table']['sale_price'] ?? [];

				foreach ($regular_prices as $taxonomy => $reg_value) {
					$regular = !empty($reg_value[0]) ? floatval($reg_value[0]) : null;
					$sale = !empty($sale_prices[$taxonomy][0]) ? floatval($sale_prices[$taxonomy][0]) : null;

					if ($regular === null) continue;

					$effective_price = ($sale !== null && $sale < $regular) ? $sale : $regular;

					// Track lowest effective price
					if ($lowest_regular === null || $effective_price < ($lowest_sale !== null && $lowest_sale < $lowest_regular ? $lowest_sale : $lowest_regular)) {
						$lowest_regular = $regular;
						$lowest_sale = $sale;
					}
				}
			}

			if ($lowest_regular === null) return '';

			$show_sale = ($lowest_sale !== null && $lowest_sale < $lowest_regular);
			$final_price = $show_sale ? $lowest_sale : $lowest_regular;

			if ($show_sale) {
				return '<div class="price-area"><h6>' . $type_label . '</h6><span><del>' . self::gofly_format_price($lowest_regular) . '</del>' . self::gofly_format_price($lowest_sale) . '</span></div>';
			}

			return '<div class="price-area"><h6>' . $type_label . '</h6><span>' . self::gofly_format_price($final_price) . '</span></div>';
		}



		/**
		 * Get the global minimum "Starting From" price across all packages
		 *
		 * @param int $trip_id Trip post ID
		 * @return string HTML formatted lowest price
		 * 
		 * @since 1.0.0
		 */
		public static function card_popup_starting_price($trip_id)
		{
			$meta         = get_post_meta($trip_id, 'EGNS_TOUR_META_ID', true);
			$tour_package = $meta['tour_pricing_package'] ?? [];

			$price_type = $meta['tour_price_type'] ?? 'per_person'; // fallback

			if (!is_array($tour_package) || empty($tour_package)) {
				return null;
			}

			$type = ($price_type === 'per_person') ? esc_html__('per person', 'gofly') : esc_html__('per group', 'gofly');

			$min_price = null; // track global minimum across sale & regular

			foreach ($tour_package as $package) {
				if (empty($package['trip_price_table']) || !is_array($package['trip_price_table'])) {
					continue;
				}

				$regular_prices = $package['trip_price_table']['regular_price'] ?? [];
				$sale_prices    = $package['trip_price_table']['sale_price'] ?? [];

				foreach ($regular_prices as $taxonomy => $reg_value) {
					$regular = (!empty($reg_value[0])) ? floatval($reg_value[0]) : null;
					$sale    = (!empty($sale_prices[$taxonomy][0])) ? floatval($sale_prices[$taxonomy][0]) : null;

					$current_min = $regular;

					// If sale exists and is lower than regular, use sale
					if ($sale !== null && ($regular === null || $sale < $regular)) {
						$current_min = $sale;
					}

					if ($current_min !== null) {
						$min_price = ($min_price === null) ? $current_min : min($min_price, $current_min);
					}
				}
			}

			if ($min_price === null) {
				return null;
			}

			// Check if a sale exists lower than regular for HTML display
			$display_price = '';
			if (!empty($sale_prices) && isset($min_price)) {
				// find the original regular price for the min sale
				$min_regular_for_display = null;
				foreach ($tour_package as $package) {
					if (empty($package['trip_price_table'])) continue;

					$regular_prices = $package['trip_price_table']['regular_price'] ?? [];
					$sale_prices    = $package['trip_price_table']['sale_price'] ?? [];

					foreach ($regular_prices as $taxonomy => $reg_value) {
						$regular = !empty($reg_value[0]) ? floatval($reg_value[0]) : null;
						$sale    = !empty($sale_prices[$taxonomy][0]) ? floatval($sale_prices[$taxonomy][0]) : null;

						if ($sale === $min_price && $regular !== null) {
							$min_regular_for_display = $regular;
							break 2;
						}
					}
				}

				if ($min_regular_for_display && $min_price < $min_regular_for_display) {
					$display_price = '<strong><del>' . self::gofly_format_price($min_regular_for_display) . '</del> '
						. self::gofly_format_price($min_price) . '<span>/' . $type . '</span></strong>';
				}
			}

			if (empty($display_price)) {
				$display_price = '<strong>' . self::gofly_format_price($min_price) . '<span>/' . $type . '</span></strong>';
			}

			return $display_price;
		}


		/**
		 * Check sale price across all packages
		 *
		 * @param int $trip_id Trip post ID
		 * @return boolean true or false
		 * 
		 * @since 1.0.0
		 */
		public static function has_sale_price($trip_id)
		{
			$meta         = get_post_meta($trip_id, 'EGNS_TOUR_META_ID', true);
			$tour_package = $meta['tour_pricing_package'] ?? [];

			// Ensure $tour_package is always an array
			if (!is_array($tour_package)) {
				return false;
			}

			foreach ($tour_package as $package) {
				if (empty($package['trip_price_table']['sale_price'])) {
					continue;
				}

				$sale_prices = $package['trip_price_table']['sale_price'];

				foreach ($sale_prices as $taxonomy => $sale_value) {
					if (!empty($sale_value[0]) && floatval($sale_value[0]) > 0) {
						return true; // Found a valid sale price
					}
				}
			}

			return false; // No sale prices found
		}




		// Experience price related functions 

		/**
		 * Get global min and max price across all experiences
		 *
		 * @return array|null Array with 'min' and 'max' or null if no prices found
		 * 
		 * @since 1.0.0
		 */
		public static function exp_global_price_range()
		{
			$args = [
				'post_type'      => 'experience',
				'posts_per_page' => -1,
				'post_status'    => 'publish',
				'fields'         => 'ids',
			];

			$query  = new \WP_Query($args);
			$prices = [];

			if ($query->have_posts()) {
				foreach ($query->posts as $exp_id) {
					$meta     = get_post_meta($exp_id, 'EGNS_EXPERIENCE_META_ID', true);
					$packages = $meta['experience_pricing_package'] ?? [];

					if (!is_array($packages) || empty($packages)) {
						continue;
					}

					foreach ($packages as $package) {
						$regular = !empty($package['experience_price']) ? floatval($package['experience_price']) : null;
						$sale    = (!empty($package['experience_price_sale_check']) && !empty($package['experience_price_sale'])) ? floatval($package['experience_price_sale']) : null;

						// If sale exists and is lower, use sale, otherwise regular
						if ($sale !== null && ($regular === null || $sale < $regular)) {
							$prices[] = $sale;
						} elseif ($regular !== null) {
							$prices[] = $regular;
						}
					}
				}
			}

			wp_reset_postdata();

			if (empty($prices)) {
				return ['min' => 0, 'max' => 0];
			}

			return [
				'min' => min($prices),
				'max' => max($prices),
			];
		}



		/**
		 * Get the global minimum "Starting From" price across all experience packages
		 *
		 * @param int $exp_id Experience post ID
		 * @return string|null HTML formatted lowest price or null if no prices
		 *
		 * @since 1.0.0
		 */
		public static function exp_global_starting_price($exp_id)
		{
			$meta     = get_post_meta($exp_id, 'EGNS_EXPERIENCE_META_ID', true);
			$packages = $meta['experience_pricing_package'] ?? [];

			if (!is_array($packages) || empty($packages)) {
				return null;
			}

			$min_regular = null;
			$min_sale    = null;

			foreach ($packages as $package) {
				// Regular price
				if (isset($package['experience_price']) && $package['experience_price'] !== '') {
					$regular = floatval($package['experience_price']);
					if ($regular > 0) {
						$min_regular = ($min_regular === null) ? $regular : min($min_regular, $regular);
					}
				}

				// Sale price (only when sale check is present)
				if (
					!empty($package['experience_price_sale_check'])
					&& isset($package['experience_price_sale'])
					&& $package['experience_price_sale'] !== ''
				) {

					$sale = floatval($package['experience_price_sale']);
					if ($sale > 0) {
						$min_sale = ($min_sale === null) ? $sale : min($min_sale, $sale);
					}
				}
			}

			// Nothing found
			if ($min_regular === null && $min_sale === null) {
				return null;
			}

			// Determine the overall lowest price
			if ($min_regular !== null && $min_sale !== null) {
				$overall_min = min($min_regular, $min_sale);
			} else {
				$overall_min = $min_regular ?? $min_sale;
			}

			// If sale exists and is lower than the lowest regular -> show struck regular and sale
			if ($min_sale !== null && $min_regular !== null && $min_sale < $min_regular) {
				return '<div class="price-area"><h6>Starting From</h6><span><del>'
					. self::gofly_format_price($min_regular)
					. '</del> ' . self::gofly_format_price($min_sale) . '</span></div>';
			}

			// Otherwise show the overall lowest price
			return '<div class="price-area"><h6>Starting From</h6><span>'
				. self::gofly_format_price($overall_min) . '</span></div>';
		}


		/**
		 * Check if an experience has any sale price
		 *
		 * @param int $exp_id Experience post ID
		 * @return bool True if at least one package has sale price, false otherwise
		 * 
		 * @since 1.0.0
		 */
		public static function exp_has_sale_price($exp_id)
		{
			$meta     = get_post_meta($exp_id, 'EGNS_EXPERIENCE_META_ID', true);
			$packages = $meta['experience_pricing_package'] ?? [];

			if (!is_array($packages) || empty($packages)) {
				return false;
			}

			foreach ($packages as $package) {
				$sale_check = !empty($package['experience_price_sale_check']);
				$sale_price = !empty($package['experience_price_sale']) ? floatval($package['experience_price_sale']) : null;

				if ($sale_check && $sale_price !== null && $sale_price > 0) {
					return true; // Found at least one valid sale
				}
			}

			return false;
		}



		// Hotel price related functions ========================================


		/**
		 * Get global min and max price across all hotel
		 *
		 * @return array|null Array with 'min' and 'max' or null if no prices found
		 * 
		 * @since 1.0.0
		 */
		public static function hotel_global_price_range()
		{
			$args = [
				'post_type'      => 'hotel',
				'posts_per_page' => -1,
				'post_status'    => 'publish',
				'fields'         => 'ids',
			];

			$query  = new \WP_Query($args);
			$prices = [];

			if ($query->have_posts()) {
				foreach ($query->posts as $hotel_id) {
					$meta     = get_post_meta($hotel_id, 'EGNS_HOTEL_META_ID', true);
					$packages = $meta['hotel_pricing_package'] ?? [];

					if (!is_array($packages) || empty($packages)) {
						continue;
					}

					foreach ($packages as $package) {
						$regular = !empty($package['hotel_price']) ? floatval($package['hotel_price']) : null;
						$sale    = (!empty($package['hotel_price_sale_check']) && !empty($package['hotel_price_sale'])) ? floatval($package['hotel_price_sale']) : null;

						// If sale exists and is lower, use sale, otherwise regular
						if ($sale !== null && ($regular === null || $sale < $regular)) {
							$prices[] = $sale;
						} elseif ($regular !== null) {
							$prices[] = $regular;
						}
					}
				}
			}

			wp_reset_postdata();

			if (empty($prices)) {
				return ['min' => 0, 'max' => 0];
			}

			return [
				'min' => min($prices),
				'max' => max($prices),
			];
		}




		/**
		 * Get the global minimum "Starting From" price across all hotel packages
		 *
		 * @param int $hotel_id Hotel post ID
		 * @return string|null HTML formatted lowest price or null if no prices
		 *
		 * @since 1.0.0
		 */
		public static function hotel_global_starting_price($hotel_id, $layout = 'one')
		{
			$meta     = get_post_meta($hotel_id, 'EGNS_HOTEL_META_ID', true);
			$packages = $meta['hotel_pricing_package'] ?? [];

			if (!is_array($packages) || empty($packages)) {
				return null;
			}

			$min_regular = null;
			$min_sale    = null;

			foreach ($packages as $package) {
				// Regular price
				if (isset($package['hotel_price']) && $package['hotel_price'] !== '') {
					$regular = floatval($package['hotel_price']);
					if ($regular > 0) {
						$min_regular = ($min_regular === null) ? $regular : min($min_regular, $regular);
					}
				}

				// Sale price (only when sale check is present)
				if (
					!empty($package['hotel_price_sale_check'])
					&& isset($package['hotel_price_sale'])
					&& $package['hotel_price_sale'] !== ''
				) {

					$sale = floatval($package['hotel_price_sale']);
					if ($sale > 0) {
						$min_sale = ($min_sale === null) ? $sale : min($min_sale, $sale);
					}
				}
			}

			// Nothing found
			if ($min_regular === null && $min_sale === null) {
				return null;
			}

			// Determine the overall lowest price
			if ($min_regular !== null && $min_sale !== null) {
				$overall_min = min($min_regular, $min_sale);
			} else {
				$overall_min = $min_regular ?? $min_sale;
			}

			// Layout one price 
			if ($layout === 'one') {
				// If sale exists and is lower than the lowest regular -> show struck regular and sale
				if ($min_sale !== null && $min_regular !== null && $min_sale < $min_regular) {
					return '<div class="price-area"><h6>Starting From</h6><span><del>' . self::gofly_format_price($min_regular) . '</del> ' . self::gofly_format_price($min_sale) . '</span></div>';
				}

				// Otherwise show the overall lowest price
				return '<div class="price-area"><h6>Starting From</h6><span>' . self::gofly_format_price($overall_min) . '</span></div>';
			}


			// Layout two price 
			if ($layout === 'two') {
				// If sale exists and is lower than the lowest regular -> show struck regular and sale
				if ($min_sale !== null && $min_regular !== null && $min_sale < $min_regular) {
					return '<div class="price-area"><h6>Starting From</h6><span><del>'
						. self::gofly_format_price($min_regular)
						. '</del> ' . self::gofly_format_price($min_sale) . '<sub>' . '/' . esc_html__('per person', 'gofly') . '</sub></span></div>';
				}

				// Otherwise show the overall lowest price
				return '<div class="price-area"><h6>Starting From</h6><span>'
					. self::gofly_format_price($overall_min) . '<sub>' . '/' . esc_html__('per person', 'gofly') .  '</sub></span></div>';
			}
		}

		/**
		 * Get the global minimum "Starting From" price across all hotel packages
		 *
		 * @param int $hotel_id Hotel post ID
		 * @return string|null HTML formatted lowest price or null if no prices
		 *
		 * @since 1.0.0
		 */
		public static function hotel_single_starting_price($hotel_id)
		{
			$meta     = get_post_meta($hotel_id, 'EGNS_HOTEL_META_ID', true);
			$packages = $meta['hotel_pricing_package'] ?? [];

			if (!is_array($packages) || empty($packages)) {
				return null;
			}

			$min_regular = null;
			$min_sale    = null;

			foreach ($packages as $package) {
				// Regular price
				if (isset($package['hotel_price']) && $package['hotel_price'] !== '') {
					$regular = floatval($package['hotel_price']);
					if ($regular > 0) {
						$min_regular = ($min_regular === null) ? $regular : min($min_regular, $regular);
					}
				}

				// Sale price (only when sale check is present)
				if (
					!empty($package['hotel_price_sale_check'])
					&& isset($package['hotel_price_sale'])
					&& $package['hotel_price_sale'] !== ''
				) {

					$sale = floatval($package['hotel_price_sale']);
					if ($sale > 0) {
						$min_sale = ($min_sale === null) ? $sale : min($min_sale, $sale);
					}
				}
			}

			// Nothing found
			if ($min_regular === null && $min_sale === null) {
				return null;
			}

			// Determine the overall lowest price
			if ($min_regular !== null && $min_sale !== null) {
				$overall_min = min($min_regular, $min_sale);
			} else {
				$overall_min = $min_regular ?? $min_sale;
			}
			// If sale exists and is lower than the lowest regular -> show struck regular and sale
			if ($min_sale !== null && $min_regular !== null && $min_sale < $min_regular) {
				return '<span>' . __('Starting From ', 'gofly') . '<strong>'
					. self::gofly_format_price($min_regular)
					. '<del> ' . self::gofly_format_price($min_sale) . '</del></strong>/' . __('per person', 'gofly') . '</span>';
			}

			// Otherwise show the overall lowest price
			return '<span>' . __('Starting From ', 'gofly') . '<strong>'
				. self::gofly_format_price($overall_min) . '</strong>/' . __('per person', 'gofly') . '</span>';
		}


		/**
		 * Check if an hotel has any sale price
		 *
		 * @param int $hotel_id Hotel post ID
		 * @return bool True if at least one package has sale price, false otherwise
		 * 
		 * @since 1.0.0
		 */
		public static function hotel_has_sale_price($hotel_id)
		{
			$meta     = get_post_meta($hotel_id, 'EGNS_HOTEL_META_ID', true);
			$packages = $meta['hotel_pricing_package'] ?? [];

			if (!is_array($packages) || empty($packages)) {
				return false;
			}

			foreach ($packages as $package) {
				$sale_check = !empty($package['hotel_price_sale_check']);
				$sale_price = !empty($package['hotel_price_sale']) ? floatval($package['hotel_price_sale']) : null;

				if ($sale_check && $sale_price !== null && $sale_price > 0) {
					return true; // Found at least one valid sale
				}
			}

			return false;
		}


		/**
		 * Get the discount percentage across all hotel packages
		 *
		 * @param int $hotel_id Hotel post ID
		 * @return int|null Discount percentage (rounded) or null if no discount
		 *
		 * @since 1.0.0
		 */
		public static function hotel_discount_percentage($hotel_id)
		{
			$meta     = get_post_meta($hotel_id, 'EGNS_HOTEL_META_ID', true);
			$packages = $meta['hotel_pricing_package'] ?? [];

			if (!is_array($packages) || empty($packages)) {
				return null;
			}

			$min_regular = null;
			$min_sale    = null;

			foreach ($packages as $package) {
				// Regular price
				if (!empty($package['hotel_price'])) {
					$regular = floatval($package['hotel_price']);
					if ($regular > 0) {
						$min_regular = ($min_regular === null) ? $regular : min($min_regular, $regular);
					}
				}

				// Sale price
				if (!empty($package['hotel_price_sale_check']) && !empty($package['hotel_price_sale'])) {
					$sale = floatval($package['hotel_price_sale']);
					if ($sale > 0) {
						$min_sale = ($min_sale === null) ? $sale : min($min_sale, $sale);
					}
				}
			}

			// No valid sale and regular combination
			if ($min_regular === null || $min_sale === null) {
				return null;
			}

			// Only return percentage if sale < regular
			if ($min_sale < $min_regular) {
				$discount = (($min_regular - $min_sale) / $min_regular) * 100;
				return round($discount); // return as integer percentage
			}

			return null;
		}


		// Before main 

	} // end Main Egns Helper class






}
