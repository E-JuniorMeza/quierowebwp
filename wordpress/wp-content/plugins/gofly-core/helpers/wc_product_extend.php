<?php

/**
 * Enable tour and hotel add to cart
 * 
 * Extend WooCommerce Product data
 *
 * @since 1.3.5
 */

if (!defined('ABSPATH')) {
    exit(); // exit if access directly
}

class EGNS_Product_Extend extends \WC_Product_Data_Store_CPT implements \WC_Object_Data_Store_Interface, \WC_Product_Data_Store_Interface
{
    /**
     * Method to read a product from the database.
     * @param WC_Product
     */
    public function read(&$product)
    {
        $product->set_defaults();
        $post_object  = get_post($product->get_id());
        if ((! $product->get_id() || ! ($post_object = get_post($product->get_id())) || 'product' !== $post_object->post_type) && 'tour' !== $post_object->post_type && 'visa' !== $post_object->post_type && 'hotel' !== $post_object->post_type  && 'experience' !== $post_object->post_type) {
            throw new \Exception(__('Invalid product.',  'gofly-core'));
        }

        $product->set_props(array(
            'name'              => $post_object->post_title,
            'slug'              => $post_object->post_name,
            'date_created'      => 0 < $post_object->post_date_gmt ? wc_string_to_timestamp($post_object->post_date_gmt) : null,
            'date_modified'     => 0 < $post_object->post_modified_gmt ? wc_string_to_timestamp($post_object->post_modified_gmt) : null,
            'status'            => $post_object->post_status,
            'description'       => $post_object->post_content,
            'short_description' => $post_object->post_excerpt,
            'parent_id'         => $post_object->post_parent,
            'menu_order'        => $post_object->menu_order,
            'reviews_allowed'   => 'open' === $post_object->comment_status,
        ));

        $this->read_attributes($product);
        $this->read_downloads($product);
        $this->read_visibility($product);
        $this->read_product_data($product);
        $this->read_extra_data($product);
        $product->set_object_read(true);
    }
}

add_filter('woocommerce_data_stores', function ($stores) {
    require_once WP_PLUGIN_DIR . '/woocommerce/includes/class-wc-data-store.php';
    $stores['product'] = 'EGNS_Product_Extend';
    return $stores;
});

add_action('save_post', function () {
    update_post_meta(get_the_ID(), '_price', '0');
}, 10, 2);
