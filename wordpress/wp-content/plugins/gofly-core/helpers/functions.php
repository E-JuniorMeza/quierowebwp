<?php

// Language static shortcode 
function language_list()
{
?>
    <div class="language-btn">
        <svg width="14" height="14" viewBox="0 0 14 14" xmlns="http://www.w3.org/2000/svg">
            <g>
                <path
                    d="M7 14C5.13023 14 3.37239 13.2719 2.05023 11.9498C0.728137 10.6276 0 8.86977 0 7C0 5.13023 0.728137 3.37239 2.05023 2.05023C3.37239 0.728137 5.13023 0 7 0C8.86977 0 10.6276 0.728137 11.9498 2.05023C13.2719 3.37239 14 5.13023 14 7C14 8.86977 13.2719 10.6276 11.9498 11.9498C10.6276 13.2719 8.86977 14 7 14ZM7 0.583324C3.46183 0.583324 0.583324 3.46183 0.583324 7C0.583324 10.5382 3.46183 13.4166 7 13.4166C10.5382 13.4166 13.4166 10.5382 13.4166 7C13.4166 3.46183 10.5382 0.583324 7 0.583324Z" />
                <path
                    d="M7 14C5.90297 14 4.8854 13.2486 4.13468 11.8841C3.41431 10.5747 3.01758 8.84018 3.01758 7C3.01758 5.15982 3.41431 3.42527 4.13468 2.11589C4.8854 0.751433 5.90297 0 7 0C8.09704 0 9.11461 0.751433 9.8653 2.11589C10.5857 3.42527 10.9824 5.15982 10.9824 7C10.9824 8.84018 10.5857 10.5747 9.8653 11.8841C9.11461 13.2486 8.09704 14 7 14ZM7 0.583324C6.12536 0.583324 5.2893 1.22746 4.64579 2.39709C3.97198 3.62179 3.6009 5.25645 3.6009 7C3.6009 8.74355 3.97198 10.3782 4.64576 11.6029C5.28927 12.7725 6.12533 13.4166 6.99998 13.4166C7.87462 13.4166 8.71068 12.7725 9.35419 11.6029C10.028 10.3782 10.3991 8.74355 10.3991 7C10.3991 5.25645 10.028 3.62179 9.35419 2.39709C8.71071 1.22746 7.87462 0.583324 7 0.583324Z" />
                <path
                    d="M6.99968 13.9573C6.8386 13.9573 6.70801 13.8267 6.70801 13.6657V0.334156C6.70801 0.173074 6.83857 0.0424805 6.99968 0.0424805C7.16077 0.0424805 7.29136 0.173074 7.29136 0.334156V13.6657C7.29136 13.8267 7.16077 13.9573 6.99968 13.9573Z" />
                <path
                    d="M13.6661 7.29147H0.334644C0.173562 7.29147 0.0429688 7.16088 0.0429688 6.99979C0.0429688 6.83871 0.173562 6.70812 0.334644 6.70812H13.6661C13.8272 6.70812 13.9578 6.83868 13.9578 6.99979C13.9578 7.16088 13.8272 7.29147 13.6661 7.29147ZM12.7022 3.81187H1.29862C1.13754 3.81187 1.00695 3.6813 1.00695 3.52019C1.00695 3.35908 1.13751 3.22852 1.29862 3.22852H12.7022C12.8633 3.22852 12.9939 3.35908 12.9939 3.52019C12.9939 3.6813 12.8632 3.81187 12.7022 3.81187ZM12.7022 10.771H1.29862C1.13754 10.771 1.00695 10.6404 1.00695 10.4794C1.00695 10.3183 1.13751 10.1877 1.29862 10.1877H12.7022C12.8633 10.1877 12.9939 10.3183 12.9939 10.4794C12.9939 10.6404 12.8632 10.771 12.7022 10.771Z" />
            </g>
        </svg>
        <span>EN</span>
        <i class="bi bi-caret-down-fill"></i>
    </div>
    <ul class="language-list">
        <li><a href="#"><img src="<?php echo get_template_directory_uri() . '/assets/img/home1/england-flag.png' ?>" alt="<?php echo esc_attr("image") ?>">English</a></li>
        <li><a href="#"><img src="<?php echo get_template_directory_uri() . '/assets/img/home1/netherlands-flag.png' ?>" alt="<?php echo esc_attr("image") ?>">Dutch</a></li>
        <li><a href="#"><img src="<?php echo get_template_directory_uri() . '/assets/img/home1/japan-flag.png' ?>" alt="<?php echo esc_attr("image") ?>">Japanese</a></li>
        <li><a href="#"><img src="<?php echo get_template_directory_uri() . '/assets/img/home1/korea-flag.png' ?>" alt="<?php echo esc_attr("image") ?>">Korean</a></li>
        <li><a href="#"><img src="<?php echo get_template_directory_uri() . '/assets/img/home1/china-flag.png' ?>" alt="<?php echo esc_attr("image") ?>">Chinese</a></li>
    </ul>
<?php
}
add_shortcode('language', 'language_list');

// Add Featured Metabox For Tour
function add_featured_meta_box()
{
    add_meta_box('featured_cpt_meta_box', __('Featured', 'gofly-core'), 'display_featured_meta_box', 'tour', 'side', 'default');
}
add_action('add_meta_boxes', 'add_featured_meta_box');

// Display Metabox 
function display_featured_meta_box($post)
{
    wp_nonce_field(basename(__FILE__), 'featured_cpt_nonce');
    $is_featured = get_post_meta($post->ID, '_is_featured', true);
?>
    <label for="is_featured">
        <input type="checkbox" name="is_featured" id="is_featured" value="1" <?php checked($is_featured, '1'); ?>>
        <?php esc_html_e('Mark as Featured', 'gofly-core'); ?>
    </label>
<?php
}

// Data save or delete 
function save_featured_meta_box_data($post_id)
{
    if (! isset($_POST['featured_cpt_nonce']) || ! wp_verify_nonce($_POST['featured_cpt_nonce'], basename(__FILE__))) {
        return;
    }
    if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) {
        return;
    }
    if (! current_user_can('edit_post', $post_id)) {
        return;
    }

    if (isset($_POST['is_featured'])) {
        update_post_meta($post_id, '_is_featured', '1');
    } else {
        delete_post_meta($post_id, '_is_featured');
    }
}
add_action('save_post', 'save_featured_meta_box_data');

// Add Featured Metabox For Hotel
function add_hotel_featured_meta_box()
{
    add_meta_box('hotel_featured_cpt_meta_box', __('Featured', 'gofly-core'), 'display_hotel_featured_meta_box', 'hotel', 'side', 'default');
}
add_action('add_meta_boxes', 'add_hotel_featured_meta_box');

// Display Metabox 
function display_hotel_featured_meta_box($post)
{
    wp_nonce_field(basename(__FILE__), 'hotel_featured_cpt_nonce');
    $is_featured = get_post_meta($post->ID, '_is_featured', true);
?>
    <label for="hotel_is_featured">
        <input type="checkbox" name="hotel_is_featured" id="hotel_is_featured" value="1" <?php checked($is_featured, '1'); ?>>
        <?php esc_html_e('Mark as Featured', 'gofly-core'); ?>
    </label>
    <?php
}

// Save Metabox Data 
function save_hotel_featured_meta_box_data($post_id)
{
    if (! isset($_POST['hotel_featured_cpt_nonce']) || ! wp_verify_nonce($_POST['hotel_featured_cpt_nonce'], basename(__FILE__))) {
        return;
    }
    if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) {
        return;
    }
    if (! current_user_can('edit_post', $post_id)) {
        return;
    }

    if (isset($_POST['hotel_is_featured'])) {
        update_post_meta($post_id, '_is_featured', '1');
    } else {
        delete_post_meta($post_id, '_is_featured');
    }
}
add_action('save_post_hotel', 'save_hotel_featured_meta_box_data');



// Helper: compute minimal numeric price from EGNS_TOUR_META_ID
function gofly_get_min_price_from_egns_meta($post_id)
{
    $meta = get_post_meta($post_id, 'EGNS_TOUR_META_ID', true);
    if (empty($meta) || ! is_array($meta)) {
        return 0;
    }

    $min_price = null;

    if (! empty($meta['tour_pricing_package']) && is_array($meta['tour_pricing_package'])) {
        foreach ($meta['tour_pricing_package'] as $pkg) {
            if (empty($pkg['trip_price_table']) || ! is_array($pkg['trip_price_table'])) {
                continue;
            }

            foreach (array('sale_price', 'regular_price') as $price_type) {
                if (empty($pkg['trip_price_table'][$price_type]) || ! is_array($pkg['trip_price_table'][$price_type])) {
                    continue;
                }

                foreach ($pkg['trip_price_table'][$price_type] as $cat => $vals) {
                    if (is_array($vals)) {
                        foreach ($vals as $v) {
                            $v = floatval(preg_replace('/[^0-9.]/', '', $v));
                            if ($v > 0 && ($min_price === null || $v < $min_price)) {
                                $min_price = $v;
                            }
                        }
                    } else {
                        $v = floatval(preg_replace('/[^0-9.]/', '', $vals));
                        if ($v > 0 && ($min_price === null || $v < $min_price)) {
                            $min_price = $v;
                        }
                    }
                }
            }
        }
    }

    return ($min_price === null) ? 0 : $min_price;
}

// Save hook: update tour_min_price on save
function gofly_update_min_price_on_save($post_id, $post, $update)
{
    // safety checks
    if (wp_is_post_revision($post_id) || wp_is_post_autosave($post_id)) {
        return;
    }
    if ($post->post_type !== 'tour') {
        return;
    }

    $min = gofly_get_min_price_from_egns_meta($post_id);
    update_post_meta($post_id, 'tour_min_price', $min);
}
add_action('save_post', 'gofly_update_min_price_on_save', 20, 3);




// Save hook: update exp_min_price on save
add_action('save_post_experience', function ($post_id) {
    if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) return;

    $meta     = get_post_meta($post_id, 'EGNS_EXPERIENCE_META_ID', true);
    $packages = $meta['experience_pricing_package'] ?? [];

    if (!is_array($packages) || empty($packages)) {
        delete_post_meta($post_id, 'exp_min_price');
        delete_post_meta($post_id, 'exp_max_price');
        return;
    }

    $prices = [];

    foreach ($packages as $package) {
        $regular = !empty($package['experience_price']) ? floatval($package['experience_price']) : null;
        $sale    = (!empty($package['experience_price_sale_check']) && !empty($package['experience_price_sale'])) ? floatval($package['experience_price_sale']) : null;

        if ($sale !== null && ($regular === null || $sale < $regular)) {
            $prices[] = $sale;
        } elseif ($regular !== null) {
            $prices[] = $regular;
        }
    }

    if (!empty($prices)) {
        update_post_meta($post_id, 'exp_min_price', min($prices));
        update_post_meta($post_id, 'exp_max_price', max($prices));
    } else {
        delete_post_meta($post_id, 'exp_min_price');
        delete_post_meta($post_id, 'exp_max_price');
    }
});



// Save hook: update htl_min_price on save
add_action('save_post_hotel', function ($post_id) {
    if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) return;

    $meta     = get_post_meta($post_id, 'EGNS_HOTEL_META_ID', true);
    $packages = $meta['hotel_pricing_package'] ?? [];

    if (!is_array($packages) || empty($packages)) {
        delete_post_meta($post_id, 'htl_min_price');
        delete_post_meta($post_id, 'htl_max_price');
        return;
    }

    $prices = [];

    foreach ($packages as $package) {
        $regular = !empty($package['hotel_price']) ? floatval($package['hotel_price']) : null;
        $sale    = (!empty($package['hotel_price_sale_check']) && !empty($package['hotel_price_sale'])) ? floatval($package['hotel_price_sale']) : null;

        if ($sale !== null && ($regular === null || $sale < $regular)) {
            $prices[] = $sale;
        } elseif ($regular !== null) {
            $prices[] = $regular;
        }
    }

    if (!empty($prices)) {
        update_post_meta($post_id, 'htl_min_price', min($prices));
        update_post_meta($post_id, 'htl_max_price', max($prices));
    } else {
        delete_post_meta($post_id, 'htl_min_price');
        delete_post_meta($post_id, 'htl_max_price');
    }
});




// Add Custom Field Codestar for tour

/**
 * Field Type: pricing_table
 * @since 1.0.0
 * @version 1.5.5
 */

if (! defined('ABSPATH')) {
    die;
}

if (! class_exists('CSF_Field_pricing_table')) {

    class CSF_Field_pricing_table extends CSF_Fields
    {

        public function __construct($field, $value = '', $unique = '', $where = '', $parent = '')
        {
            parent::__construct($field, $value, $unique, $where, $parent);
        }

        public function render()
        {
            $field_name = $this->field_name();
            $value      = $this->value;

            echo $this->field_before();

            $pricing_category = \Egns_Core\Egns_Helper::get_pricing_categories();

            if (! empty($pricing_category)) {
    ?>
                <div class="form-group">
                    <h4><?php echo esc_html__('Group Pricing', 'gofly-core'); ?></h4>
                    <br>
                    <table class="group-price">
                        <thead>
                            <tr>
                                <th><?php echo esc_html__('Title', 'gofly-core'); ?></th>
                                <th><?php echo esc_html__('Regular Price', 'gofly-core'); ?> <span class="required">*</span></th>
                                <th><?php echo esc_html__('Sale Price', 'gofly-core'); ?></th>
                            </tr>
                        </thead>
                        <tbody class="price-person">
                            <?php foreach ($pricing_category as $key => $label) {
                                $reg_price = isset($value['regular_price'][$key][0]) ? $value['regular_price'][$key][0] : '';
                                $sale_price = isset($value['sale_price'][$key][0]) ? $value['sale_price'][$key][0] : '';
                            ?>
                                <tr>
                                    <td class="group-price-title"><?php echo esc_html($label); ?></td>
                                    <td>
                                        <input type="number" name="<?php echo $this->field_name("[regular_price][$key][]"); ?>" value="<?php echo esc_attr($reg_price); ?>" min="0" placeholder="0" />
                                    </td>
                                    <td>
                                        <input type="number" name="<?php echo $this->field_name("[sale_price][$key][]"); ?>" value="<?php echo esc_attr($sale_price); ?>" min="0" placeholder="0" />
                                    </td>
                                </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
<?php
            }

            echo $this->field_after();
        }
    }
}
