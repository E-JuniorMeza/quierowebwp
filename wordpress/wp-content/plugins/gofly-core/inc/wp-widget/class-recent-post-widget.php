<?php
/**
 * Popular Posts Widget
 */
class Egns_Recent_Post_Widget extends WP_Widget {

    function __construct() {
        parent::__construct(
            'egns_recent_post',
            __('Egns Recent Post', 'gofly-core'),
            array(
                'description' => __('Displays recent posts based on comment count', 'gofly-core'),
            )
        );
    }

    public function widget($args, $instance) {
        $title = isset($instance['title']) ? apply_filters('widget_title', $instance['title']) : 'Recent Post';
        $number_of_posts = isset($instance['number_of_posts']) ? absint($instance['number_of_posts']) : 3;

        echo $args['before_widget'];
        ?>

        <?php if (!empty($title)) : ?>
            <h5 class="widget-title">
                <svg width="22" height="22" viewBox="0 0 22 22" xmlns="http://www.w3.org/2000/svg">
                    <path d="M20.9688 11C20.9726 12.1773 20.9019 13.3538 20.7569 14.5221C20.1691 19.1327 18.5625 20.9688 18.5625 20.9688H1.03125V18.9062C14.1316 17.7671 11.6596 7.89809 10.4264 4.54609C10.1607 4.50672 9.89326 4.48091 9.625 4.46875C9.625 4.46875 4.46875 4.125 4.8125 8.25C4.8125 8.25 2.0625 7.5625 2.75 4.8125C3.4375 2.0625 6.1875 2.75 6.1875 2.75C6.1875 2.75 6.875 1.03125 9.28125 1.03125C11.6875 1.03125 12.7188 3.09375 12.7188 3.09375C14.4375 1.03125 20.9688 3.78125 20.9688 11Z"/>
                    <path d="M10.9981 20.9687C10.9981 20.9687 15.4669 18.5625 15.4669 14.4375C15.4669 10.3125 13.0606 11.3437 13.0606 11.3437C13.0606 11.3437 13.4044 9.625 11.6856 8.9375C9.96688 8.25 8.93563 9.625 8.93563 9.625C8.93563 9.625 5.84188 8.25 5.15437 11C4.46688 13.75 7.56063 13.75 7.56063 13.75C7.56063 13.75 7.25692 11.7483 9.27938 11.3437C10.9981 11 15.8106 13.75 10.9981 20.9687Z"/>
                    <path d="M20.9697 11C20.9736 12.1773 20.9028 13.3538 20.7579 14.5222C18.5635 8.9375 15.9196 5.35777 10.4273 4.54609C10.1617 4.50672 9.89423 4.48091 9.62596 4.46875C9.62596 4.46875 4.46971 4.125 4.81346 8.25C4.81346 8.25 2.06346 7.5625 2.75096 4.8125C3.43846 2.0625 6.18846 2.75 6.18846 2.75C6.18846 2.75 6.87596 1.03125 9.28221 1.03125C11.6885 1.03125 12.7197 3.09375 12.7197 3.09375C14.4385 1.03125 20.9697 3.78125 20.9697 11Z"/>
                </svg>
                <?php echo esc_html($title); ?>
            </h5>
        <?php endif; ?>

        <?php
        $query = new WP_Query(array(
            'post_type'           => 'post',
            'posts_per_page'      => $number_of_posts,
            'ignore_sticky_posts' => true
        ));
        ?>

        <div class="recent-post-widgets">
            <?php
            while ($query->have_posts()) : $query->the_post();
                $post_class = ($query->current_post < $number_of_posts - 1) ? 'mb-25' : '';
            ?>
                <div class="recent-post-widget <?php echo esc_attr($post_class); ?>">
                    <div class="recent-post-img">
                        <a href="<?php the_permalink(); ?>">
                            <?php
                            if (has_post_thumbnail()) {
                                the_post_thumbnail('thumbnail', array('alt' => get_the_title()));
                            }
                            ?>
                        </a>
                    </div>
                    <div class="recent-post-content">
                        <a href="<?php echo esc_url(get_permalink()); ?>"><?php echo get_the_date('d F, Y'); ?></a>
                        <h6><a href="<?php the_permalink(); ?>"><?php echo esc_html(get_the_title()); ?></a></h6>
                    </div>
                </div>
            <?php
            endwhile;
            wp_reset_postdata();
            ?>
        </div>

        <?php
        echo $args['after_widget'];
    }

    public function form($instance) {
        $title = isset($instance['title']) ? $instance['title'] : 'Popular Post';
        $number_of_posts = isset($instance['number_of_posts']) ? absint($instance['number_of_posts']) : 3;
        ?>
        <p>
            <label for="<?php echo esc_attr($this->get_field_id('title')); ?>"><?php echo esc_html__('Title:', 'gofly-core'); ?></label>
            <input class="widefat" id="<?php echo esc_attr($this->get_field_id('title')); ?>" name="<?php echo esc_attr($this->get_field_name('title')); ?>" type="text" value="<?php echo esc_attr($title); ?>" />
        </p>
        
        <p>
            <label for="<?php echo esc_attr($this->get_field_id('number_of_posts')); ?>"><?php echo esc_html__('Number of posts to show:', 'gofly-core'); ?></label>
            <input class="tiny-text" id="<?php echo esc_attr($this->get_field_id('number_of_posts')); ?>" name="<?php echo esc_attr($this->get_field_name('number_of_posts')); ?>" type="number" step="1" min="1" value="<?php echo esc_attr($number_of_posts); ?>" size="3">
        </p>
        <?php
    }

    public function update($new_instance, $old_instance) {
        $instance = array();
        $instance['title'] = sanitize_text_field($new_instance['title']);
        $instance['number_of_posts'] = absint($new_instance['number_of_posts']);
        return $instance;
    }
}

// Register the widget
function register_egns_recent_post_widget() {
    register_widget('Egns_Recent_Post_Widget');
}
add_action('widgets_init', 'register_egns_recent_post_widget');