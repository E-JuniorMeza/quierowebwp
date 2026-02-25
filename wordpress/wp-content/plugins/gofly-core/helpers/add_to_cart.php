<?php

namespace Egns_Core;

/**
 * Class EGNS_Add_To_Cart
 
 */
class EGNS_Add_To_Cart
{
     public $textdomain     = '';
     public $id             = '';
     public $is_woocommerce = false;
     public $shortcode      = 'egns-add-to-cart';
     public $is_advance     = true;
     public $prefix         = 'egns';
     public function __construct()
     {
          $this->textdomain = 'gofly-core';
          if (class_exists('WooCommerce')) {
               $this->is_woocommerce = true;
          }

          add_shortcode($this->shortcode, [$this, 'egns_add_to_cart_shortcode']);

          // AJAX action to add item into cart
          add_action('wp_ajax_' . $this->prefix . '_add_to_cart', [$this, 'egns_add_to_cart']);
          add_action('wp_ajax_nopriv_' . $this->prefix . '_add_to_cart', [$this, 'egns_add_to_cart']);

          // Calculate cart total
          add_action('woocommerce_before_calculate_totals', [$this, 'egns_calc_cart_total'], 30, 1);

          add_filter('woocommerce_get_item_data', [$this, 'egns_cart_item_custom_data'], 30, 2);

          add_action('woocommerce_add_order_item_meta', [$this, 'add_custom_data_to_order_item_meta'], 10, 2);
     }


     public function add_custom_data_to_order_item_meta($item_id, $values)
     {
          if (isset($values['egns_cart_data'])) {
               $egns_cart_data = $values['egns_cart_data'];

               // Save pricing data
               if (isset($egns_cart_data['pricing'])) {
                    foreach ($egns_cart_data['pricing'] as $pricing) {
                         $label    = isset($pricing['label']) ? $pricing['label'] : '';
                         $quantity = isset($pricing['quantity']) ? $pricing['quantity'] : '';
                         $price    = isset($pricing['price']) ? get_woocommerce_currency_symbol() . $pricing['price'] : '';

                         if (!empty($label) && !empty($quantity)) {
                              wc_add_order_item_meta($item_id, $label, $price . ' X ' . $quantity);
                         }

                         if (isset($pricing['dependency'])) {
                              foreach ($pricing['dependency'] as $dependency) {
                                   if ($dependency['visibility']) {
                                        $dependency_label = isset($dependency['label']) ? $dependency['label'] : '';
                                        $dependency_quantity = isset($dependency['quantity']) ? $dependency['quantity'] : '';
                                        $quantity_label = isset($dependency['quantity_label']) ? $dependency['quantity_label'] : '';
                                        wc_add_order_item_meta($item_id, $label . ' (' . $dependency_label . ': ' . $dependency_quantity . $quantity_label . ')', $price . ' X ' . $quantity);
                                   }
                              }
                         }
                    }
               }

               // Save services data
               if (isset($egns_cart_data['services'])) {
                    foreach ($egns_cart_data['services'] as $service) {
                         $service_label    = isset($service['label']) ? $service['label'] : '';
                         $service_price    = isset($service['price']) ? get_woocommerce_currency_symbol() . $service['price'] . ' ' : '';
                         $service_quantity = isset($service['quantity']) ? $service['quantity'] : '';

                         if (!empty($service_label) && !empty($service_price)) {
                              wc_add_order_item_meta($item_id, $service_label, $service_price . ' X ' . $service_quantity);
                         }
                    }
               }
               // Save meta data
               if (isset($egns_cart_data['meta'])) {
                    foreach ($egns_cart_data['meta'] as $single_meta) {
                         $single_meta_label = isset($single_meta['label']) ? $single_meta['label'] : '';
                         $single_meta_value = isset($single_meta['value']) ? $single_meta['value'] : '';
                         if (!empty($single_meta_label) && !empty($single_meta_value)) {
                              wc_add_order_item_meta($item_id, $single_meta_label, $single_meta_value);
                         }
                    }
               }
          }
     }


     public function egns_cart_item_custom_data($item_data, $cart_item)
     {
          if (!$this->is_woocommerce) {
               return __('Please install & activate woocommerce first!', 'gofly-core');
          }
          if (isset($cart_item['egns_cart_data'])) {
               $egns_cart_data = $cart_item['egns_cart_data'];
               $pricing        = isset($egns_cart_data['pricing']) ? $egns_cart_data['pricing'] : [];
               $services       = isset($egns_cart_data['services']) ? $egns_cart_data['services'] : [];
               $meta           = isset($egns_cart_data['meta']) ? $egns_cart_data['meta'] : [];

               // Pricing heading
               if (!empty($pricing)) {
                    $item_data[] = array(
                         'name'  => __('Pricing', 'gofly-core'),
                         'value' => '',
                         'class' => 'pricing-heading',
                    );
               }
               // Pricing items
               foreach ($pricing as $item) {
                    $label = isset($item['label']) ? $item['label'] : '';
                    $quantity = isset($item['quantity']) ? $item['quantity'] : '';
                    $price = isset($item['price']) ? get_woocommerce_currency_symbol() . $item['price'] : '';
                    // Try to get taxonomy name if label is a taxonomy slug
                    $taxonomy_name = $label;
                    if (!empty($label)) {
                         $term = get_term_by('slug', $label, 'tour-pricing-category');
                         if ($term && !is_wp_error($term)) {
                              $taxonomy_name = $term->name;
                         }
                    }
                    if (!empty($taxonomy_name) && !empty($quantity)) {
                         $item_data[] = array(
                              'name'    => $taxonomy_name,
                              'value'   => $price . ' X ' . $quantity,
                              'display' => '',
                         );
                    }
               }

               // Services heading
               if (!empty($services)) {
                    $item_data[] = array(
                         'name'  => __('Additional Services', 'gofly-core'),
                         'value' => '',
                         'class' => 'services-heading',
                    );
               }
               // Services items
               foreach ($services as $service) {
                    $service_label = isset($service['label']) ? $service['label'] : '';
                    $service_price = isset($service['price']) ? get_woocommerce_currency_symbol() . $service['price'] : '';
                    $service_qty   = isset($service['quantity']) ? $service['quantity'] : 1;
                    // Try to get service name if label is a taxonomy ID
                    $service_name = $service_label;
                    if (!empty($service_label) && is_numeric($service_label)) {
                         $term = get_term_by('id', intval($service_label), 'tour-service');
                         if ($term && !is_wp_error($term)) {
                              $service_name = $term->name;
                         }
                    }
                    if (!empty($service_name) && !empty($service_price)) {
                         $item_data[] = array(
                              'name'    => $service_name,
                              'value'   => $service_price . ' X ' . $service_qty,
                              'display' => '',
                         );
                    }
               }

               // Meta items
               if (!empty($meta)) {
                    foreach ($meta as $single_meta) {
                         $single_meta_label = isset($single_meta['label']) ? $single_meta['label'] : '';
                         $single_meta_value = isset($single_meta['value']) ? $single_meta['value'] : '';
                         if (!empty($single_meta_label) && !empty($single_meta_value)) {
                              $item_data[] = array(
                                   'name'    => $single_meta_label,
                                   'value'   => $single_meta_value,
                                   'display' => '',
                              );
                         }
                    }
               }
          }
          return $item_data;
     }

     public function egns_calc_cart_total($cart)
     {

          if (is_admin() && !defined('DOING_AJAX')) {
               return;
          }

          if (did_action('woocommerce_before_calculate_totals') >= 2) {
               return;
          }

          if (empty($cart->get_cart())) {
               return;
          }

          foreach ($cart->get_cart() as $item_values) {
               if (empty($item_values['egns_cart_data']['pricing'])) {
                    return;
               }
               $ultimatePrice = 0;
               foreach ($item_values['egns_cart_data']['pricing'] as $item) {
                    if (is_object($item) || is_array($item)) {
                         $itemPrice = $item['price'];
                         $itemQuantity = $item['quantity'];
                         if (isset($item['dependency'])) {
                              $dependency = $item['dependency'];
                              $dependencyDateQuantity = $dependency['date']['quantity'];
                              // $itemQuantity = $itemQuantity + $dependencyDateQuantity;
                         }
                         $ultimatePrice += floatval($itemPrice) * floatval($itemQuantity);
                    }
               }
               if (isset($item_values['egns_cart_data']['services'])) {
                    foreach ($item_values['egns_cart_data']['services'] as $service) {
                         $ultimatePrice += $service['price'] * $service['quantity'];
                    }
               }
               $item_values['data']->set_price($ultimatePrice);
          }
     }

     public function egns_add_to_cart()
     {
          $cart_data = array();
          $cart_data['egns_cart_data'] = \Egns_Core\Egns_Helper::sanitize_recursive($_POST['data']);
          $post_id                     = !empty(sanitize_text_field($_POST['post_id'])) ? sanitize_text_field($_POST['post_id']) : null;
          if ($post_id === null) {
               return __('Missing Post ID', 'gofly-core');
          }
          $post_id = intval($post_id);
          // Add product to cart with the custom cart item data
          WC()->cart->add_to_cart($post_id, 1, '0', array(), $cart_data);
     }


     public function egns_add_to_cart_shortcode()
     {
          if (!$this->is_woocommerce) {
               return sprintf(__('Please Install & Activate WooCommerce plugin first!', 'gofly-core'));
          }
          $this->render_cart_btn();
     }

     public function render_cart_btn()
     {
?>
          <button class="egns_add_to_cart primary-btn1 two" type="submit"><?php echo esc_html__('Book Now', 'gofly-core') ?></button>
<?php
     }
}
