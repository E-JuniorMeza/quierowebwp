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

if (!class_exists('Egns_Helper')) {

	class Egns_Helper
	{


		/**
		 * Helper Class constructor
		 */
		function __construct()
		{
			// call only public function here 
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
					$menu_names[$menu->slug] = $menu->name;
				}
			}

			// Return the array of menu names
			return $menu_names;
		}

		public static function sanitize_recursive($data)
		{
			if (is_array($data)) {
				foreach ($data as $key => $value) {
					$data[$key] = self::sanitize_recursive($value);
				}
			} else {
				$data = sanitize_text_field($data);
			}
			return $data;
		}

		/**
		 * Get all Elementor setting default value
		 * After that merge with custom value
		 *
		 * @since   1.0.0
		 */
		public static function return_defaul_elementor_settings(...$custom_value)
		{
			// Get default value, ensure it's an array
			$elementor = get_option('elementor_cpt_support');
			$elementor = is_array($elementor) ? $elementor : [];

			// Merge and remove duplicates
			$merged = array_unique(array_merge($elementor, $custom_value));

			// Update the option
			update_option('elementor_cpt_support', $merged);
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
		 * Return Destination Option Value Based on Given Destination Option ID.
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
		 * Get any post list with ID
		 *
		 * $post_type post type name
		 * 
		 * @return array
		 */
		public static function get_post_list_options($post_type)
		{
			$posts   = get_posts(['post_type' => $post_type, 'posts_per_page' => -1]);
			$options = [];

			foreach ($posts as $post) {
				$options[$post->ID] = get_the_title($post->ID);
			}

			return $options;
		}

		/**
		 * Get custom taxonomy list as options
		 *
		 * $taxonomy post taxonomy name
		 * 
		 * @return array 
		 */
		public static function get_post_terms_options($taxonomy)
		{
			$terms = get_terms(['taxonomy' => $taxonomy, 'hide_empty' => true,]);

			$options = [];

			if (!is_wp_error($terms) && !empty($terms)) {
				foreach ($terms as $term) {
					$options[$term->slug] = $term->name;
				}
			}

			return $options;
		}




		/**
		 * Get any post list as options
		 *
		 * $post_type post type name
		 * 
		 * @return array 
		 */
		public static function get_post_list_by_post_type($post_type)
		{
			$return_val = [];
			$args       = array(
				'post_type'      => $post_type,
				'posts_per_page' => -1,
				'post_status'    => 'publish',

			);
			$all_post = new \WP_Query($args);

			while ($all_post->have_posts()) {
				$all_post->the_post();
				$return_val[get_the_ID()] = get_the_title();
			}
			wp_reset_query();
			return $return_val;
		}

		/**
		 * Get any post list ID as options
		 *
		 * $post_type post type name
		 * 
		 * @return array as post ids
		 */
		public static function get_all_post_key($post_type)
		{
			$return_val = [];
			$args       = array(
				'post_type'      => $post_type,
				'posts_per_page' => 6,
				'post_status'    => 'publish',

			);
			$all_post = new \WP_Query($args);

			while ($all_post->have_posts()) {
				$all_post->the_post();
				$return_val[] = get_the_ID();
			}
			wp_reset_query();
			return $return_val;
		}

		public static function get_blog_categories()
		{
			$categories       = get_categories();  // Get all categories.
			$category_options = [];
			foreach ($categories as $category) {
				$category_options[$category->slug] = $category->name;
			}

			return $category_options;
		}

		/**
		 * filtering posts by title
		 *
		 * @return void
		 */
		public static function get_blog_post_options()
		{
			$posts   = get_posts(['post_type' => 'post', 'posts_per_page' => -1]);
			$options = [];

			foreach ($posts as $post) {
				$options[$post->ID] = get_the_title($post->ID);
			}

			return $options;
		}


		/**
		 * Get all post locations as options
		 *
		 * @return array
		 */
		public static function get_post_location_options()
		{
			$terms = get_terms(['taxonomy' => 'location', 'hide_empty' => false,]);

			$options = [];

			if (!is_wp_error($terms) && !empty($terms)) {
				foreach ($terms as $term) {
					$options[$term->term_id] = $term->name;
				}
			}

			return $options;
		}

		/**
		 * Filtering posts by title and multiple categories
		 *
		 * @param array|null $selected_category_ids Optional. Array of Category IDs to filter posts. Default is null (no filter).
		 * @return array Associative array of post IDs and their titles.
		 */
		public static function get_blog_post_cat_options($selected_category_ids = null)
		{
			// Initialize query arguments
			$query_args = [
				'post_type'      => 'post',
				'posts_per_page' => -1,
			];

			// If category IDs are provided, add them to the query arguments
			if (!empty($selected_category_ids)) {
				$query_args['category__in'] = $selected_category_ids;
			}

			// Get posts based on the query arguments
			$posts   = get_posts($query_args);
			$options = [];

			// Loop through posts and build options array
			foreach ($posts as $post) {
				$options[$post->ID] = get_the_title($post->ID);
			}

			return $options;
		}




		/**
		 * Return taxonomy name with link.
		 *
		 * @since 1.0.0
		 *
		 * @param string $taxonomy . give your taxonomy.
		 * 
		 * @param string $icon_class . give your icon class here.
		 * 
		 * @return mixed return taxonomy name with link.
		 */
		public static function term_with_link($icon_class, $taxonomy)
		{

			$terms = wp_get_object_terms(get_the_ID(), $taxonomy);
			if ($terms ?? ''):

				foreach ((array) $terms as $term): ?>
					<a href="<?php echo esc_url(get_term_link($term->slug, $taxonomy)) ?>"><i class="<?php echo esc_attr($icon_class) ?>"></i>
						<?php echo esc_html($term->name); ?>
					</a>
				<?php endforeach;

			endif;
		}

		/**
		 * Return taxonomy name with link.
		 *
		 * @since 1.0.0
		 *
		 * @param string $taxonomy . give your taxonomy.
		 * 
		 * @param string $icon_class . give your icon class here.
		 * 
		 * @return mixed return taxonomy name with link.
		 */
		public static function term_without_link($icon_class, $taxonomy)
		{

			$terms = wp_get_object_terms(get_the_ID(), $taxonomy);
			if ($terms ?? ''):
				?>
				<span><i class="<?php echo esc_attr($icon_class) ?>"></i>
					<?php
					foreach ((array) $terms as $term):
						echo esc_html($term->name);
					endforeach;
					?>
				</span>
			<?php
			endif;
		}

		/**
		 * Return term link value.
		 *
		 * @since 1.0.0
		 * 
		 * @return mixed Post type option value.
		 */
		public static function get_any_term_link($taxonomy)
		{
			$term = get_the_terms(get_the_ID(), $taxonomy);
			$link = get_term_link($term[0]->slug, $taxonomy);
			return esc_url($link);
		}

		/**
		 * filtering product by title
		 *
		 * @return void
		 */
		public static function get_product_lists()
		{
			$posts   = get_posts(['post_type' => 'product', 'posts_per_page' => -1]);
			$options = [];

			foreach ($posts as $post) {
				$options[$post->ID] = get_the_title($post->ID);
			}

			return $options;
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
		 * Return Elementor header footer plugin post list
		 *
		 * @return data
		 */
		public static function get_custom_footer_list()
		{
			$args = array(
				'post_type'   => 'footer-blocks',
				'order'       => 'asc',
				'numberposts' => 999,
			);

			$latest_books = get_posts($args);
			$array        = [];
			foreach ($latest_books as $value) {
				$array[$value->post_name] = $value->post_title;
			}
			return $array;
		}

		/**
		 * Return Elementor header footer post ID or default footer area
		 *
		 * @param string $slug The slug of the header/footer.
		 * @return string The shortcode for the header/footer or default footer area.
		 */
		public static function get_footer_data($slug)
		{
			$post = get_page_by_path($slug, OBJECT, 'footer-blocks');

			if ($post) {
				// Check if the post is built with Elementor
				$document = \Elementor\Plugin::$instance->documents->get($post->ID);
				if ($document && $document->is_built_with_elementor()) {
					// Render Elementor content
					return \Elementor\Plugin::$instance->frontend->get_builder_content_for_display($post->ID);
				} else {
					// Return default WordPress content (from the editor)
					return apply_filters('the_content', $post->post_content);
				}
			} else {
				// If no post is found, return a default fallback
				return self::default_footer_area_sec();
			}
		}



		/**
		 * Generate the HTML for the default footer area
		 *
		 * @return string The HTML for the default footer area.
		 */
		public static function default_footer_area_sec()
		{
			ob_start();  // Start output buffering
			?>

			<footer class="footer-section">
				<div class="container">
					<div class="footer-bottom">
						<div class="copyright-and-payment-method-area justify-content-center">
							<p><?php echo esc_html__('Copyright ',  'gofly-core') ?> <?php echo esc_html(date('Y')) ?> <a href="<?php echo esc_url('https://www.egenslab.com/') ?>"><?php echo esc_html__(' Egens Lab',  'gofly-core') ?></a> | <?php echo esc_html__('All Right Reserved.',  'gofly-core') ?></p>
						</div>
					</div>
				</div>
			</footer>

			<?php
			$output = ob_get_clean();  // Get and clean the buffered output
			return $output;
		}


		/**
		 * calculating reading times
		 *
		 * @return void
		 */
		public static function calculate_reading_time($content)
		{
			// Count the number of words in the content.
			$word_count = str_word_count(strip_tags($content));
			// Minimum reading time is 1 minute.
			$reading_time = max(1, round($word_count / 100));
			return $reading_time;
		}


		/**
		 * Get post tags for select
		 *
		 * @return array
		 */
		public static function get_tags_for_select()
		{
			$tags    = get_tags();
			$options = [];
			foreach ($tags as $tag) {
				$options[$tag->term_id] = $tag->name;
			}
			return $options;
		}


		/**
		 * filtering posts by authors
		 *
		 * @return void
		 */
		public static function get_blog_authors()
		{
			// Define an array of roles you want to include
			$roles_to_include = ['author', 'administrator', 'subscriber', 'contributor', 'editor'];

			// Retrieve users based on the defined roles
			$users          = get_users(['role__in' => $roles_to_include]);
			$author_options = ['all' => esc_html__('All Authors', 'gofly-core')];

			foreach ($users as $user) {
				$author_options[$user->ID] = $user->display_name;
			}

			return $author_options;
		}


		/**
		 * get post categories for select
		 *
		 * @return void 
		 */

		public static function get_categories_for_select()
		{
			$categories = get_categories();
			$options    = [];
			foreach ($categories as $category) {
				$options[$category->term_id] = $category->name;
			}
			return $options;
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
		 * Check if the podcast is enabled for the post.
		 *
		 * @return bool True if podcast is enabled, false otherwise.
		 */
		public static function egns_is_podcast_enabled()
		{
			return (bool) get_post_meta(get_the_ID(), 'egns_podcast', true);
		}

		/**
		 * Get the podcast audio URL.
		 *
		 * @return string The podcast audio URL.
		 */
		public static function egns_get_podcast_audio_url()
		{
			return esc_url(get_post_meta(get_the_ID(), 'egns_podcast_audio_url', true));
		}

		/**
		 * Get the podcast audio URL.
		 *
		 * @return string The podcast audio URL.
		 */
		public static function egns_get_podcast_audio__main_url()
		{
			return esc_url(get_post_meta(get_the_ID(), 'egns_audio_url', true));
		}


		/**
		 * Get the podcast video URL.
		 *
		 * @return string The podcast audio URL.
		 */
		public static function egns_get_podcast_video_url()
		{
			return esc_url(get_post_meta(get_the_ID(), 'egns_video_url', true));
		}



		/**
		 * Get the podcast platform list.
		 *
		 * @return array The list of podcast platforms.
		 */
		public static function egns_get_podcast_platform_list()
		{
			$platforms = get_post_meta(get_the_ID(), 'egns_podcast_platform', true);
			return is_array($platforms) ? $platforms : array();
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
			echo '<a href="' . esc_url(get_the_permalink()) . '"><img src="' . esc_url($image['url']) . '" alt="' . esc_attr("image") . ' "class="img-fluid wp-post-image"></a>';
		}

		/**
		 * @return [quote] text for quote post
		 */
		public static function egns_quote_content()
		{
			$text = get_post_meta(get_the_ID(), 'egns_quote_text', 1);
			if (!empty($text)) {
				return sprintf("%s", $text);
			}
		}





		/**
		 * Return tour pricing category list
		 *
		 * @since   1.0.0
		 */
		public static function get_pricing_categories()
		{
			$pricing_category = array();
			$pricing_categories = get_terms(array(
				'taxonomy'   => 'tour-pricing-category',
				'hide_empty' => false,
				'orderby'    => 'date',
				'order'      => 'ASC',
			));

			if (! empty($pricing_categories) && ! is_wp_error($pricing_categories)) {
				foreach ($pricing_categories as $value) {
					$pricing_category[$value->slug] = $value->name;
				}
			}

			return $pricing_category;
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
					echo esc_html__('Prev', 'gofly-core');
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
					echo esc_html__('Next', 'gofly-core');
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
		 * Count Tour posts under a continent term
		 *
		 * @param int $continent_term_id Term ID of the continent
		 * @return int Count of Tour posts
		 */
		public static function get_tour_count_by_continent($continent_term_id)
		{
			// Get all country post IDs under this continent
			$countries = get_posts(array(
				'post_type'      => 'destination',
				'numberposts'    => -1,
				'post_status'    => 'publish',
				'fields'         => 'ids',
				'tax_query'      => array(
					array(
						'taxonomy' => 'destination-continent',
						'field'    => 'term_id',
						'terms'    => $continent_term_id,
						'operator' => 'IN',
					),
				),
			));

			if (empty($countries)) {
				return 0;
			}

			// Get all Tour posts
			$tours = get_posts(array(
				'post_type'      => 'tour',
				'numberposts'    => -1,
				'post_status'    => 'publish',
				'fields'         => 'ids',
			));

			if (empty($tours)) {
				return 0;
			}

			$count = 0;

			foreach ($tours as $tour_id) {
				// Get the full serialized meta
				$meta = get_post_meta($tour_id, 'EGNS_TOUR_META_ID', true);
				$meta = maybe_unserialize($meta);

				if (!empty($meta['tour_destination_select']) && is_array($meta['tour_destination_select'])) {
					// Check if any country ID exists in selected destinations
					if (array_intersect($countries, $meta['tour_destination_select'])) {
						$count++;
					}
				}
			}

			return $count;
		}





		// Trip Price Related Functions

		/**
		 * Get currency symbol
		 *
		 * @return array currency list
		 */
		public static function get_all_currency()
		{
			return [
				'AED' => __('United Arab Emirates dirham (د.إ) — AED',  'gofly-core'),
				'AFN' => __('Afghan afghani (؋) — AFN',  'gofly-core'),
				'ALL' => __('Albanian lek (Lek) — ALL',  'gofly-core'),
				'AMD' => __('Armenian dram (֏) — AMD',  'gofly-core'),
				'ARS' => __('Argentine peso ($) — ARS',  'gofly-core'),
				'AUD' => __('Australian dollar ($) — AUD',  'gofly-core'),
				'AWG' => __('Aruban florin (ƒ) — AWG',  'gofly-core'),
				'AZN' => __('Azerbaijani manat (₼) — AZN',  'gofly-core'),
				'BAM' => __('Bosnia and Herzegovina convertible mark (KM) — BAM',  'gofly-core'),
				'BDT' => __('Bangladeshi taka (৳) — BDT',  'gofly-core'),
				'BGN' => __('Bulgarian lev (лв) — BGN',  'gofly-core'),
				'BHD' => __('Bahraini dinar (د.ب) — BHD',  'gofly-core'),
				'BIF' => __('Burundian franc (Fr) — BIF',  'gofly-core'),
				'BMD' => __('Bermudian dollar ($) — BMD',  'gofly-core'),
				'BND' => __('Brunei dollar ($) — BND',  'gofly-core'),
				'BOB' => __('Bolivian boliviano (Bs) — BOB',  'gofly-core'),
				'BRL' => __('Brazilian real (R$) — BRL',  'gofly-core'),
				'BSD' => __('Bahamian dollar ($) — BSD',  'gofly-core'),
				'BTN' => __('Bhutanese ngultrum (Nu) — BTN',  'gofly-core'),
				'BWP' => __('Botswana pula (P) — BWP',  'gofly-core'),
				'BYN' => __('Belarusian ruble (Br) — BYN',  'gofly-core'),
				'BZD' => __('Belize dollar ($) — BZD',  'gofly-core'),
				'CAD' => __('Canadian dollar ($) — CAD',  'gofly-core'),
				'CDF' => __('Congolese franc (Fr) — CDF',  'gofly-core'),
				'CHF' => __('Swiss franc (CHF) — CHF',  'gofly-core'),
				'CLP' => __('Chilean peso ($) — CLP',  'gofly-core'),
				'CNY' => __('Chinese yuan (¥) — CNY',  'gofly-core'),
				'COP' => __('Colombian peso ($) — COP',  'gofly-core'),
				'CRC' => __('Costa Rican colón (₡) — CRC',  'gofly-core'),
				'CUC' => __('Cuban convertible peso (CUC$) — CUC',  'gofly-core'),
				'CUP' => __('Cuban peso (₱) — CUP',  'gofly-core'),
				'CVS' => __('Cape Verdean escudo ($) — CVS',  'gofly-core'),
				'CZK' => __('Czech koruna (Kč) — CZK',  'gofly-core'),
				'DJF' => __('Djiboutian franc (Fdj) — DJF',  'gofly-core'),
				'DKK' => __('Danish krone (kr) — DKK',  'gofly-core'),
				'DOP' => __('Dominican peso ($) — DOP',  'gofly-core'),
				'DZD' => __('Algerian dinar (دج) — DZD',  'gofly-core'),
				'EGP' => __('Egyptian pound (£) — EGP',  'gofly-core'),
				'ERN' => __('Eritrean nakfa (Nfk) — ERN',  'gofly-core'),
				'ESP' => __('Spanish peseta (₧) — ESP',  'gofly-core'),
				'ETB' => __('Ethiopian birr (ታብ) — ETB',  'gofly-core'),
				'EUR' => __('Euro (€) — EUR',  'gofly-core'),
				'FJD' => __('Fijian dollar ($) — FJD',  'gofly-core'),
				'FKP' => __('Falkland Islands pound (£) — FKP',  'gofly-core'),
				'GBP' => __('British pound sterling (£) — GBP',  'gofly-core'),
				'GEL' => __('Georgian lari (₾) — GEL',  'gofly-core'),
				'GHS' => __('Ghanaian cedi (₵) — GHS',  'gofly-core'),
				'GIP' => __('Gibraltar pound (£) — GIP',  'gofly-core'),
				'GMD' => __('Gambian dalasi (D) — GMD',  'gofly-core'),
				'GNF' => __('Guinean franc (Fr) — GNF',  'gofly-core'),
				'GTQ' => __('Guatemalan quetzal (Q) — GTQ',  'gofly-core'),
				'GYD' => __('Guyanese dollar ($) — GYD',  'gofly-core'),
				'HKD' => __('Hong Kong dollar ($) — HKD',  'gofly-core'),
				'HNL' => __('Honduran lempira (L) — HNL',  'gofly-core'),
				'HRK' => __('Croatian kuna (kn) — HRK',  'gofly-core'),
				'HTG' => __('Haitian gourde (G) — HTG',  'gofly-core'),
				'HUF' => __('Hungarian forint (Ft) — HUF',  'gofly-core'),
				'IDR' => __('Indonesian rupiah (Rp) — IDR',  'gofly-core'),
				'ILS' => __('Israeli new shekel (₪) — ILS',  'gofly-core'),
				'INR' => __('Indian rupee (₹) — INR',  'gofly-core'),
				'IQD' => __('Iraqi dinar (ع.د) — IQD',  'gofly-core'),
				'IRR' => __('Iranian rial (﷼) — IRR',  'gofly-core'),
				'ISK' => __('Icelandic króna (kr) — ISK',  'gofly-core'),
				'JMD' => __('Jamaican dollar ($) — JMD',  'gofly-core'),
				'JOD' => __('Jordanian dinar (د.ا) — JOD',  'gofly-core'),
				'JPY' => __('Japanese yen (¥) — JPY',  'gofly-core'),
				'KES' => __('Kenyan shilling (Sh) — KES',  'gofly-core'),
				'KGS' => __('Kyrgyzstani som (лв) — KGS',  'gofly-core'),
				'KHR' => __('Cambodian riel (៛) — KHR',  'gofly-core'),
				'KMF' => __('Comorian franc (Fr) — KMF',  'gofly-core'),
				'KRW' => __('South Korean won (₩) — KRW',  'gofly-core'),
				'KWD' => __('Kuwaiti dinar (د.ك) — KWD',  'gofly-core'),
				'KYD' => __('Cayman Islands dollar ($) — KYD',  'gofly-core'),
				'KZT' => __('Kazakhstani tenge (₸) — KZT',  'gofly-core'),
				'LAK' => __('Laotian kip (₭) — LAK',  'gofly-core'),
				'LBP' => __('Lebanese pound (ل.ل) — LBP',  'gofly-core'),
				'LKR' => __('Sri Lankan rupee (රු) — LKR',  'gofly-core'),
				'LRD' => __('Liberian dollar ($) — LRD',  'gofly-core'),
				'LSL' => __('Lesotho loti (M) — LSL',  'gofly-core'),
				'LTL' => __('Lithuanian litas (Lt) — LTL',  'gofly-core'),
				'LVL' => __('Latvian lats (Ls) — LVL',  'gofly-core'),
				'LYD' => __('Libyan dinar (د.ل) — LYD',  'gofly-core'),
				'MAD' => __('Moroccan dirham (د.م.) — MAD',  'gofly-core'),
				'MDL' => __('Moldovan leu (Lei) — MDL',  'gofly-core'),
				'MGA' => __('Malagasy ariary (Ar) — MGA',  'gofly-core'),
				'MKD' => __('Macedonian denar (ден) — MKD',  'gofly-core'),
				'MMK' => __('Myanmar kyat (Ks) — MMK',  'gofly-core'),
				'MNT' => __('Mongolian tögrög (₮) — MNT',  'gofly-core'),
				'MOP' => __('Macanese pataca (P) — MOP',  'gofly-core'),
				'MUR' => __('Mauritian rupee (₨) — MUR',  'gofly-core'),
				'MVR' => __('Maldivian rufiyaa (Rf) — MVR',  'gofly-core'),
				'MWK' => __('Malawian kwacha (K) — MWK',  'gofly-core'),
				'MXN' => __('Mexican peso ($) — MXN',  'gofly-core'),
				'MYR' => __('Malaysian ringgit (RM) — MYR',  'gofly-core'),
				'MZN' => __('Mozambican metical (MT) — MZN',  'gofly-core'),
				'NAD' => __('Namibian dollar ($) — NAD',  'gofly-core'),
				'NGN' => __('Nigerian naira (₦) — NGN',  'gofly-core'),
				'NIO' => __('Nicaraguan córdoba (C$) — NIO',  'gofly-core'),
				'NOK' => __('Norwegian krone (kr) — NOK',  'gofly-core'),
				'NPR' => __('Nepalese rupee (₨) — NPR',  'gofly-core'),
				'NZD' => __('New Zealand dollar ($) — NZD',  'gofly-core'),
				'OMR' => __('Omani rial (ر.ع.) — OMR',  'gofly-core'),
				'PAB' => __('Panamanian balboa (B/. ) — PAB',  'gofly-core'),
				'PEN' => __('Peruvian nuevo sol (S/.) — PEN',  'gofly-core'),
				'PGK' => __('Papua New Guinean kina (K) — PGK',  'gofly-core'),
				'PHP' => __('Philippine peso (₱) — PHP',  'gofly-core'),
				'PKR' => __('Pakistani rupee (₨) — PKR',  'gofly-core'),
				'PLN' => __('Polish złoty (zł) — PLN',  'gofly-core'),
				'PYG' => __('Paraguayan guarani (Gs) — PYG',  'gofly-core'),
				'QAR' => __('Qatari riyal (ر.ق) — QAR',  'gofly-core'),
				'RON' => __('Romanian leu (lei) — RON',  'gofly-core'),
				'RSD' => __('Serbian dinar (дин) — RSD',  'gofly-core'),
				'RUB' => __('Russian ruble (₽) — RUB',  'gofly-core'),
				'RWF' => __('Rwandan franc (Fr) — RWF',  'gofly-core'),
				'SAR' => __('Saudi riyal (ر.س) — SAR',  'gofly-core'),
				'SBD' => __('Solomon Islands dollar ($) — SBD',  'gofly-core'),
				'SCR' => __('Seychellois rupee (₨) — SCR',  'gofly-core'),
				'SEK' => __('Swedish krona (kr) — SEK',  'gofly-core'),
				'SGD' => __('Singapore dollar ($) — SGD',  'gofly-core'),
				'SHP' => __('Saint Helena pound (£) — SHP',  'gofly-core'),
				'SLL' => __('Sierra Leonean leone (Le) — SLL',  'gofly-core'),
				'SOS' => __('Somali shilling (Sh) — SOS',  'gofly-core'),
				'SRD' => __('Surinamese dollar (SR$) — SRD',  'gofly-core'),
				'SSP' => __('South Sudanese pound (SS£) — SSP',  'gofly-core'),
				'STN' => __('São Tomé and Príncipe dobra (Db) — STN',  'gofly-core'),
				'SYP' => __('Syrian pound (£) — SYP',  'gofly-core'),
				'SZL' => __('Swazi lilangeni (E) — SZL',  'gofly-core'),
				'THB' => __('Thai baht (฿) — THB',  'gofly-core'),
				'TJS' => __('Tajikistani somoni (ЅМ) — TJS',  'gofly-core'),
				'TMT' => __('Turkmenistani manat (m) — TMT',  'gofly-core'),
				'TND' => __('Tunisian dinar (د.ت) — TND',  'gofly-core'),
				'TOP' => __('Tongan paʻanga (T$) — TOP',  'gofly-core'),
				'TRY' => __('Turkish lira (₺) — TRY',  'gofly-core'),
				'TTD' => __('Trinidad and Tobago dollar (TT$) — TTD',  'gofly-core'),
				'TWD' => __('New Taiwan dollar (NT$) — TWD',  'gofly-core'),
				'TZS' => __('Tanzanian shilling (Sh) — TZS',  'gofly-core'),
				'UAH' => __('Ukrainian hryvnia (₴) — UAH',  'gofly-core'),
				'UGX' => __('Ugandan shilling (Sh) — UGX',  'gofly-core'),
				'USD' => __('United States dollar ($) — USD',  'gofly-core'),
				'UYU' => __('Uruguayan peso ($) — UYU',  'gofly-core'),
				'UZS' => __('Uzbekistani som (сўм) — UZS',  'gofly-core'),
				'VEF' => __('Venezuelan bolívar (Bs.F) — VEF',  'gofly-core'),
				'VND' => __('Vietnamese đồng (₫) — VND',  'gofly-core'),
				'VUV' => __('Vanuatu vatu (Vt) — VUV',  'gofly-core'),
				'WST' => __('Samoan tala (T) — WST',  'gofly-core'),
				'XAF' => __('Central African CFA franc (Fr) — XAF',  'gofly-core'),
				'XCD' => __('East Caribbean dollar ($) — XCD',  'gofly-core'),
				'XOF' => __('West African CFA franc (Fr) — XOF',  'gofly-core'),
				'XPF' => __('CFP franc (Fr) — XPF',  'gofly-core'),
				'YER' => __('Yemeni rial (﷼) — YER',  'gofly-core'),
				'ZAR' => __('South African rand (R) — ZAR',  'gofly-core'),
				'ZMK' => __('Zambian kwacha (K) — ZMK',  'gofly-core'),
				'ZWL' => __('Zimbabwean dollar (Z$) — ZWL',  'gofly-core')
			];
		}

		/**
		 * Get currency symbol
		 *
		 * @param int $currency_code trip
		 * @return string currency code or null
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
		 * Get price format woocommerce & option panel both
		 *
		 * @param int $price trip amount
		 * @return string currency,currency position,separator etc for price
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
			$type_label = ($price_type === 'per_person') ? esc_html__('per person', 'gofly-core') : esc_html__('per group', 'gofly-core');

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
		 * @param string $layout choose HTML return structure style ('one' or 'two')
		 * @return string HTML formatted lowest price
		 */
		public static function get_single_starting_price($trip_id, $layout = 'one')
		{
			$meta = get_post_meta($trip_id, 'EGNS_TOUR_META_ID', true);
			$tour_packages = $meta['tour_pricing_package'] ?? [];

			if (!is_array($tour_packages) || empty($tour_packages)) {
				return '';
			}

			$price_type = $meta['tour_price_type'] ?? 'per_person';
			$type_label = ($price_type === 'per_person') ? ' /' . esc_html__('per person', 'gofly-core') : ' /' . esc_html__('per group', 'gofly-core');

			$lowest_regular = null;
			$lowest_sale    = null;

			foreach ($tour_packages as $package) {
				if (empty($package['trip_price_table'])) continue;

				$regular_prices = $package['trip_price_table']['regular_price'] ?? [];
				$sale_prices    = $package['trip_price_table']['sale_price'] ?? [];

				foreach ($regular_prices as $taxonomy => $reg_value) {
					$regular = !empty($reg_value[0]) ? floatval($reg_value[0]) : null;
					$sale    = !empty($sale_prices[$taxonomy][0]) ? floatval($sale_prices[$taxonomy][0]) : null;

					if ($regular === null) continue;

					// Determine the actual price to compare (sale if lower than regular)
					$effective_price = ($sale !== null && $sale < $regular) ? $sale : $regular;

					if ($lowest_regular === null || $effective_price < $lowest_regular) {
						$lowest_regular = $regular;
						$lowest_sale    = $sale;
					}
				}
			}

			if ($lowest_regular === null) return '';

			// Determine final display prices
			$show_sale = ($lowest_sale !== null && $lowest_sale < $lowest_regular);
			$final_price = $show_sale ? $lowest_sale : $lowest_regular;

			if ($layout === 'one') {
				if ($show_sale) {
					return '<span class="starting-price">' . esc_html__('Starting From ',  'gofly-core') . ' <strong>' . self::gofly_format_price($lowest_sale) . '</strong> <del>' . self::gofly_format_price($lowest_regular) . '</del>' . $type_label . '</span>';
				}
				return '<span class="starting-price">' . esc_html__('Starting From ',  'gofly-core') . ' <strong>' . self::gofly_format_price($final_price) . '</strong>' . $type_label . '</span>';
			}

			if ($layout === 'two') {
				if ($show_sale) {
					return '<div class="price-area"><h6>' . esc_html__('Starting From',  'gofly-core') . '</h6><span><del>' . self::gofly_format_price($lowest_regular) . '</del> ' . self::gofly_format_price($lowest_sale) . '<sub>' . $type_label . '</sub></span></div>';
				}
				return '<div class="price-area"><h6>' . esc_html__('Starting From',  'gofly-core') . '</h6><span>' . self::gofly_format_price($final_price) . '<sub>' . $type_label . '</sub></span></div>';
			}

			if ($layout === 'three') {
				if ($show_sale) {
					return '<div class="price-area"><h6>' . esc_html__('Starting From',  'gofly-core') . '</h6><strong><del>' . self::gofly_format_price($lowest_regular) . '</del> ' . self::gofly_format_price($lowest_sale) . '<span>' . $type_label . '</span></strong></div>';
				}
				return '<div class="price-area"><h6>' . esc_html__('Starting From',  'gofly-core') . '</h6><strong>' . self::gofly_format_price($final_price) . '<span>' . $type_label . '</span></strong></div>';
			}



			return '';
		}


		/**
		 * Check sale price across all packages
		 *
		 * @param int $trip_id Trip post ID
		 * @return int|null discount percentage or null
		 */
		public static function get_global_discount_percentage($trip_id)
		{
			$meta         = get_post_meta($trip_id, 'EGNS_TOUR_META_ID', true);
			$tour_package = $meta['tour_pricing_package'] ?? [];

			if (!is_array($tour_package)) {
				return null;
			}

			$min_discount = null;

			foreach ($tour_package as $package) {
				if (empty($package['trip_price_table'])) {
					continue;
				}

				$regular_prices = $package['trip_price_table']['regular_price'] ?? [];
				$sale_prices    = $package['trip_price_table']['sale_price'] ?? [];

				foreach ($regular_prices as $taxonomy => $reg_value) {
					$regular = !empty($reg_value[0]) ? floatval($reg_value[0]) : null;
					$sale    = !empty($sale_prices[$taxonomy][0]) ? floatval($sale_prices[$taxonomy][0]) : null;

					if ($regular !== null && $sale !== null && $sale < $regular) {
						$discount = (($regular - $sale) / $regular) * 100;
						$discount = round($discount);

						$min_discount = ($min_discount === null) ? $discount : min($min_discount, $discount);
					}
				}
			}

			return $min_discount; // return smallest discount or null
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

			$type = ($price_type === 'per_person') ? esc_html__('per person', 'gofly-core') : esc_html__('per group', 'gofly-core');

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
		 * Get the global minimum "Starting From" price across all experience packages
		 *
		 * @param int $exp_id Experience post ID
		 * @return string|null HTML formatted lowest price or null if no prices
		 *
		 * @since 1.0.0
		 */
		public static function exp_global_starting_price($exp_id, $layout = 'one')
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

			// Layout one price 
			if ($layout === 'one') {
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


			// Layout two price 
			if ($layout === 'two') {
				// If sale exists and is lower than the lowest regular -> show struck regular and sale
				if ($min_sale !== null && $min_regular !== null && $min_sale < $min_regular) {
					return '<div class="price-area"><h6>Starting From</h6><span><del>'
						. self::gofly_format_price($min_regular)
						. '</del> ' . self::gofly_format_price($min_sale) . '<sub>' . '/' . esc_html__('per person', 'gofly-core') . '</sub></span></div>';
				}

				// Otherwise show the overall lowest price
				return '<div class="price-area"><h6>Starting From</h6><span>'
					. self::gofly_format_price($overall_min) . '<sub>' . '/' . esc_html__('per person', 'gofly-core') .  '</sub></span></div>';
			}
		}

		/**
		 * Get the global minimum "Starting From" price across all experience packages
		 *
		 * @param int $exp_id Experience post ID
		 * @return string|null HTML formatted lowest price or null if no prices
		 *
		 * @since 1.0.0
		 */
		public static function exp_single_starting_price($exp_id)
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
				return '<span>' . __('Starting From ', 'gofly-core') . '<strong>'
					. self::gofly_format_price($min_regular)
					. '<del> ' . self::gofly_format_price($min_sale) . '</del></strong>/' . __('per person', 'gofly-core') . '</span>';
			}

			// Otherwise show the overall lowest price
			return '<span>' . __('Starting From ', 'gofly-core') . '<strong>'
				. self::gofly_format_price($overall_min) . '</strong>/' . __('per person', 'gofly-core') . '</span>';
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


		/**
		 * Get the discount percentage across all experience packages
		 *
		 * @param int $exp_id Experience post ID
		 * @return int|null Discount percentage (rounded) or null if no discount
		 *
		 * @since 1.0.0
		 */
		public static function exp_discount_percentage($exp_id)
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
				if (!empty($package['experience_price'])) {
					$regular = floatval($package['experience_price']);
					if ($regular > 0) {
						$min_regular = ($min_regular === null) ? $regular : min($min_regular, $regular);
					}
				}

				// Sale price
				if (!empty($package['experience_price_sale_check']) && !empty($package['experience_price_sale'])) {
					$sale = floatval($package['experience_price_sale']);
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



		// Hotel price related functions ========================================

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
						. '</del> ' . self::gofly_format_price($min_sale) . '<sub>' . '/' . esc_html__('per person', 'gofly-core') . '</sub></span></div>';
				}

				// Otherwise show the overall lowest price
				return '<div class="price-area"><h6>Starting From</h6><span>'
					. self::gofly_format_price($overall_min) . '<sub>' . '/' . esc_html__('per person', 'gofly-core') .  '</sub></span></div>';
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
				return '<span>' . __('Starting From ', 'gofly-core') . '<strong>'
					. self::gofly_format_price($min_regular)
					. '<del> ' . self::gofly_format_price($min_sale) . '</del></strong>/' . __('per person', 'gofly-core') . '</span>';
			}

			// Otherwise show the overall lowest price
			return '<span>' . __('Starting From ', 'gofly-core') . '<strong>'
				. self::gofly_format_price($overall_min) . '</strong>/' . __('per person', 'gofly-core') . '</span>';
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


		//Before End


	} //End Main Class


}//end if
