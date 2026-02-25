<?php

namespace Egns\Inc;

if (!class_exists('Blog_Helper')) {

    class Blog_Helper
    {

        /**
         * Initializes a singleton instance
         *
         * @return \Blog_Helper
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
         * Main construcutor 
         *
         * @return void
         */
        public function __construct()
        {
            // slient is golden
        }

        /**
         * blog pagination
         *
         * @return void
         */
        public static function egns_pagination()
        {
            global $wp_query;

            if ($wp_query->max_num_pages > 1) {
                $links = paginate_links(array(
                    'current'       => max(1, get_query_var('paged')),
                    'total'         => $wp_query->max_num_pages,
                    'type'          => 'list',
                    'mid_size'      => 3,
                    'prev_text'     => '<i class="bi bi-arrow-left"></i>',
                    'next_text'     => '<i class="bi bi-arrow-right"></i>',
                    'prev_next'     => false, // Disable "Next" and "Previous" links
                ));

                $links = str_replace("<ul class='page-numbers'>", "<ul class='paginations'>", $links);
                $links = str_replace("<li>", "<li class='page-item'>", $links);

                $links = str_replace("page-numbers", "", $links);
                $links = str_replace("&laquo; Previous</a>", '&laquo;</a>', $links);
                $links = str_replace("Next &raquo;</a>", "&raquo;</a>", $links);
                $links = str_replace("next aria-label='Next'", "page-link", $links);
                $links = str_replace("prev aria-hidden='true'", "sr-only page-link", $links);
                $links = str_replace("<li><span", " <li class='page-item active'><a", $links);
                $links = str_replace('span', 'a', $links);
                $links = preg_replace('/>([0-9])</', '>0$1<', $links);
                return wp_kses_post($links);
            }
        }

        /**
         * Calculate the estimated reading time for given content.
         *
         * @param string $content The post content.
         * @return int The estimated reading time in minutes.
         */
        public static function calculate_reading_time($content)
        {
            if (empty($content)) {
                return 1; // Default to 1 minute if content is empty
            }

            // Count the number of words in the content.
            $word_count = str_word_count(strip_tags($content));

            // Calculate reading time (assuming 200 words per minute).
            $reading_time = max(1, ceil($word_count / 200));

            return (int) $reading_time; // Ensure it returns an integer
        }



        /**
         * blog post pagination  
         *
         * @return void
         */
        public static function egns_post_pagination()
        {
            wp_link_pages(
                array(
                    'before'           => '<ul class="pagination d-flex justify-content-center align-items-center"><span class="page-title">' . esc_html__('Pages: ', 'gofly') . '</span><li>',
                    'after'            => '</li></ul>',
                    'link_before'      => '',
                    'link_after'       => '',
                    'next_or_number'   => 'number',
                    'separator'        => '</li><li>',
                    'pagelink'         => '%',
                    'echo'             => 1
                )
            );
        }

        /**
         * post views count format
         *
         * @return void
         */
        public static function format_post_views_count($count)
        {
            if (!empty($count) && ($count >= 1000)) {
                $count_formatted = sprintf('%.1fk', $count / 1000); // Format the count in "x.xk" format
            } else {
                $count_formatted = $count;
            }
            return $count_formatted;
        }


        /**
         * Display blog post meta information.
         */
        public static function display_blog_meta()
        {
            // Get the category of the current post.
            $categories = get_the_category();
            if (!empty($categories)) :
                $category = !empty($categories) ? esc_html($categories[0]->name) : '';

                // Get the number of comments for the current post.
                $comment_count = get_comments_number();

                // Output the meta information.
                echo '<div class="blog-meta">';
                echo '<ul class="category">';
                echo '<li><a href="' . esc_url(get_category_link($categories[0]->term_id)) . '">' . esc_html($category) . '</a></li>';
                echo '</ul>';
                echo '<div class="blog-comment">';
                echo '<span>Comment (' . esc_html($comment_count) . ')</span>';
                echo '</div>';
                echo '</div>';
            endif;
        }

        /**
         * Display the blog post date.
         */
        public static function display_blog_date()
        {
            // Get the post date.
            $post_date = get_the_date('j');
            $post_date_two = get_the_date('F');

            // Output the date.
            echo '<a href="' . esc_url(get_day_link(get_post_time('Y'), get_post_time('m'), get_post_time('j'))) . '" class="date">';
            echo '<span><strong>' . esc_html($post_date) . '</strong>' . esc_html($post_date_two) . '</span>';
            echo '</a>';
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
                echo '<a class="category" href="' . esc_url(get_category_link($categories[0]->term_id)) . '">' . esc_html($categories[0]->name) . '</a>';
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
         * @return [string] Embed gallery for the post.
         */
        public static function egns_gallery_images()
        {
            $images = get_post_meta(get_the_ID(), 'egns_gallery_images', 1);

            $images = explode(',', $images);
            if ($images && count($images) > 1) {
                $gallery_slide = '<div class="swiper blog-archive-slider">';
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
         * @return [string] Has image for image post.
         */
        public static function has_egns_image()
        {
            $image = get_post_meta(get_the_ID(), 'egns_thumb_images', 1);
            if (!empty($image)) {
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
            echo '<a href="' . get_the_permalink() . '"><img src="' . $image['url'] . '" alt="' . esc_attr("image") . ' "class="img-fluid wp-post-image"></a>';
        }

        /**
         * @return [quote] text for quote post
         */
        public static function egns_quote_content()
        {
            $text =  get_post_meta(get_the_ID(), 'egns_quote_text', 1);
            if (!empty($text)) {
                return sprintf(esc_attr__("%s", 'gofly'), $text);
            }
        }

        /**
         * Set post views count using post meta
         *
         * @return void
         */

        public static function customSetPostViews($postID)
        {
            $countKey = 'post_views_count';
            $count = get_post_meta($postID, $countKey, true);
            if ($count == '') {
                $count = 0;
                delete_post_meta($postID, $countKey);
                add_post_meta($postID, $countKey, '1');
            } else {
                $count++;
                update_post_meta($postID, $countKey, $count);
            }
        }

        /**
         * Blog Post Is Sticky
         *
         * @return void
         */

        public static function egns_blog_is_sticky()
        {
?>
            <?php if (is_sticky(get_the_ID())) { ?>
                <div class="sticky-post-icon">
                    <i class="bi bi-pin-angle"></i>
                </div>
            <?php } ?>
<?php
        }
    }

    Blog_Helper::init();
}
