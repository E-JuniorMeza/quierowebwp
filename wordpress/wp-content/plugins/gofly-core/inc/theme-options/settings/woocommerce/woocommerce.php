<?php
if (class_exists('CSF')) {

    /*-------------------------------------------------------
	   ** WooCommerce  Options
   --------------------------------------------------------*/
    CSF::createSection($prefix, array(
        'id'     => 'woocommerce_options',
        'title'  => esc_html__('WooCommerce', 'gofly-core'),
        'icon'   => 'fa fa-shopping-bag',
        'fields' => array(
            array(
                'type'    => 'subheading',
                'content' => '<h4>' . esc_html__('WooCommerce Options', 'gofly-core') . '</h4>',
            ),
            array(
                'id'          => 'product_column',
                'type'        => 'radio',
                // 'inline'      => true,
                'title'       => esc_html__('Product column', 'gofly-core'),
                'placeholder' => esc_html__('Select an option', 'gofly-core'),
                'options'     => array(
                    '6' => 'Two Column',
                    '4' => 'Three Column',
                    '3' => 'Four Column',
                ),
                'default' => '3',
            ),
            array(
                'id'      => 'product_per_page',
                'type'    => 'number',
                'title'   => esc_html__('Products per page', 'gofly-core'),
                'default' => 8,
            ),
        ),
    ));
    /*-----------------------------------
		REQUIRE Woocommerce FILES
	------------------------------------*/
}
