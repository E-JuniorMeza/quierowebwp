<?php

/**
 * Search Posts Widget
 */
class Egns_Search_Post_Widget extends WP_Widget
{

    function __construct()
    {
        parent::__construct(
            'egns_search_post',
            __('Egns Search', 'gofly-core'),
            array(
                'description' => __('Displays search posts based on result.', 'gofly-core'),
            )
        );
    }

    public function widget($args, $instance)
    {
        $title = isset($instance['title']) ? apply_filters('widget_title', $instance['title']) : 'Search';
?>

        <div class="search-widget mb-40">
            <?php if (!empty($title)) : ?>
                <h5 class="widget-title">
                    <svg width="22" height="22" viewBox="0 0 22 22" xmlns="http://www.w3.org/2000/svg">
                        <path d="M20.9688 11C20.9726 12.1773 20.9019 13.3538 20.7569 14.5221C20.1691 19.1327 18.5625 20.9688 18.5625 20.9688H1.03125V18.9062C14.1316 17.7671 11.6596 7.89809 10.4264 4.54609C10.1607 4.50672 9.89326 4.48091 9.625 4.46875C9.625 4.46875 4.46875 4.125 4.8125 8.25C4.8125 8.25 2.0625 7.5625 2.75 4.8125C3.4375 2.0625 6.1875 2.75 6.1875 2.75C6.1875 2.75 6.875 1.03125 9.28125 1.03125C11.6875 1.03125 12.7188 3.09375 12.7188 3.09375C14.4375 1.03125 20.9688 3.78125 20.9688 11Z"></path>
                        <path d="M10.9981 20.9687C10.9981 20.9687 15.4669 18.5625 15.4669 14.4375C15.4669 10.3125 13.0606 11.3437 13.0606 11.3437C13.0606 11.3437 13.4044 9.625 11.6856 8.9375C9.96688 8.25 8.93563 9.625 8.93563 9.625C8.93563 9.625 5.84188 8.25 5.15437 11C4.46688 13.75 7.56063 13.75 7.56063 13.75C7.56063 13.75 7.25692 11.7483 9.27938 11.3437C10.9981 11 15.8106 13.75 10.9981 20.9687Z"></path>
                        <path d="M20.9697 11C20.9736 12.1773 20.9028 13.3538 20.7579 14.5222C18.5635 8.9375 15.9196 5.35777 10.4273 4.54609C10.1617 4.50672 9.89423 4.48091 9.62596 4.46875C9.62596 4.46875 4.46971 4.125 4.81346 8.25C4.81346 8.25 2.06346 7.5625 2.75096 4.8125C3.43846 2.0625 6.18846 2.75 6.18846 2.75C6.18846 2.75 6.87596 1.03125 9.28221 1.03125C11.6885 1.03125 12.7197 3.09375 12.7197 3.09375C14.4385 1.03125 20.9697 3.78125 20.9697 11Z"></path>
                    </svg>
                    <?php echo esc_html($title) ?>
                </h5>
            <?php endif ?>
            <form method="get" id="searchform" action="<?php echo esc_url(home_url('/')); ?>" role="search">
                <div class="search-box">
                    <svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M15.8044 14.8845L13.0544 12.197L12.9901 12.0992C12.8689 11.9797 12.7055 11.9127 12.5354 11.9127C12.3652 11.9127 12.2018 11.9797 12.0807 12.0992C9.74349 14.2433 6.14318 14.3595 3.66568 12.3714C1.18818 10.3833 0.604738 6.90545 2.30068 4.24732C3.99661 1.5892 7.44661 0.572634 10.3632 1.87232C13.2797 3.17201 14.7551 6.38638 13.8126 9.38138C13.7793 9.48804 13.7754 9.60167 13.8012 9.71037C13.827 9.81907 13.8815 9.91883 13.9591 9.9992C14.0375 10.081 14.1358 10.1411 14.2444 10.1736C14.3529 10.2061 14.468 10.21 14.5785 10.1848C14.6884 10.1606 14.79 10.108 14.8732 10.0322C14.9564 9.95643 15.0183 9.86013 15.0526 9.75295C16.1776 6.19888 14.4782 2.37388 11.0526 0.752946C7.62693 -0.867991 3.50474 0.199821 1.3513 3.26763C-0.802137 6.33545 -0.339949 10.4808 2.43911 13.0229C5.21818 15.5651 9.47974 15.7398 12.4688 13.4367L14.9038 15.8173C15.026 15.9348 15.189 16.0004 15.3585 16.0004C15.528 16.0004 15.6909 15.9348 15.8132 15.8173C15.8728 15.7589 15.9202 15.6892 15.9525 15.6123C15.9849 15.5353 16.0016 15.4527 16.0016 15.3692C16.0016 15.2857 15.9849 15.2031 15.9525 15.1261C15.9202 15.0492 15.8728 14.9795 15.8132 14.9211L15.8044 14.8845Z" fill="#110F0F" />
                    </svg>
                    <input type="text" id="s" name="s" placeholder="<?php echo esc_attr__('Tag: adveture, beach, activities etc.', 'gofly-core'); ?>">
                </div>
            </form>
        </div>

    <?php
    }

    public function form($instance)
    {
        $title = isset($instance['title']) ? $instance['title'] : 'Search';
    ?>
        <p>
            <label for="<?php echo esc_attr($this->get_field_id('title')); ?>"><?php echo esc_html__('Title:', 'gofly-core'); ?></label>
            <input class="widefat" id="<?php echo esc_attr($this->get_field_id('title')); ?>" name="<?php echo esc_attr($this->get_field_name('title')); ?>" type="text" value="<?php echo esc_attr($title); ?>" />
        </p>

<?php
    }

    public function update($new_instance, $old_instance)
    {
        $instance = array();
        $instance['title'] = sanitize_text_field($new_instance['title']);
        return $instance;
    }
}

// Register the widget
function register_egns_search_post_widget()
{
    register_widget('Egns_Search_Post_Widget');
}
add_action('widgets_init', 'register_egns_search_post_widget');
