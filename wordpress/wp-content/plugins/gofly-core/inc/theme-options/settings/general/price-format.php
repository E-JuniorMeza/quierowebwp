<?php

use Egns_Core\Egns_Helper;

CSF::createSection($prefix, array(
    'parent' => 'theme_general_options',
    'title'  => esc_html__('Price-Format', 'gofly-core'),
    'id'     => 'price_format_options',
    'icon'   => 'fas fa-wallet',
    'fields' => array(

        array(
            'type'    => 'subheading',
            'content' => '<h3>' . esc_html__('Price-Format ', 'gofly-core') . '</h3>',
        ),

        array(
            'id'      => 'gofly_currency',
            'type'    => 'select',
            'title'   => esc_html__('Currency', 'gofly-core'),
            'chosen'  => true,
            'desc'    => esc_html__('This controls what currency symbol is used.', 'gofly-core'),
            'options' => Egns_Helper::get_all_currency(),
            'default' => 'USD',
        ),
        array(
            'id'      => 'gofly_currency_position',
            'type'    => 'select',
            'title'   => esc_html__('Currency Position', 'gofly-core'),
            'chosen'  => true,
            'desc'    => esc_html__('This controls position of currency symbol.', 'gofly-core'),
            'options' => array(
                'left'        => esc_html__('Left', 'gofly-core'),
                'right'       => esc_html__('Right', 'gofly-core'),
                'left_space'  => esc_html__('Left with Space', 'gofly-core'),
                'right_space' => esc_html__('Right with Space', 'gofly-core'),
            ),
            'default'  => 'left',
            'settings' => [
                'width' => '130px',
            ],
        ),
        array(
            'id'      => 'gofly_currency_number_of_decimals',
            'type'    => 'number',
            'title'   => esc_html__('Number of Decimals', 'gofly-core'),
            'class'   => 'egns-130',
            'desc'    => esc_html__('This sets the number of decimals point shown in displayed price.', 'gofly-core'),
            'min'     => 0,
            'max'     => 10,
            'step'    => 1,
            'default' => 2,
        ),
        array(
            'id'      => 'gofly_currency_thousand_separator',
            'type'    => 'text',
            'title'   => esc_html__('Thousand Separator', 'gofly-core'),
            'default' => ',',
            'desc'    => esc_html__('This sets the thousand separator of displayed price.', 'gofly-core'),
        ),
        array(
            'id'      => 'gofly_currency_decimal_separator',
            'type'    => 'text',
            'title'   => esc_html__('Decimal Separator', 'gofly-core'),
            'default' => '.',
            'desc'    => esc_html__('This sets the decimal separator of displayed price.', 'gofly-core'),
        ),

    ),

));
