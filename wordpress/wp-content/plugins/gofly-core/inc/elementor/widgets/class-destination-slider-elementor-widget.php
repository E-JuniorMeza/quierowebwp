<?php

namespace Elementor;

if (!defined('ABSPATH')) exit;  // Exit if accessed directly

use Egns\Helper\Egns_Helper as HelperEgns_Helper;
use Elementor\core\Schemes;
use Egns_Core\Egns_Helper;

class Gofly_Destination_Slider_Widget extends Widget_Base
{

    public function get_name()
    {
        return 'gofly_destination_slider';
    }

    public function get_title()
    {
        return esc_html__('EG Destination Slider', 'gofly-core');
    }

    public function get_icon()
    {
        return 'egns-widget-icon';
    }

    public function get_categories()
    {
        return ['gofly_destination'];
    }

    protected function register_controls()
    {

        //===================== Destination Content =======================//

        $this->start_controls_section(
            'gofly_destination_slider_section',
            [
                'label' => esc_html__('Destination Content', 'gofly-core')
            ]
        );

        $this->add_control(
            'gofly_destination_slider_widget_style',
            [
                'label'   => esc_html__('Select Style', 'gofly-core'),
                'type'    => \Elementor\Controls_Manager::SELECT,
                'options' => [
                    'one'   => esc_html__('Widget Style 01', 'gofly-core'),
                    'two'   => esc_html__('Widget Style 02', 'gofly-core'),
                    'three' => esc_html__('Widget Style 03', 'gofly-core'),
                    'four'  => esc_html__('Widget Style 04', 'gofly-core'),
                    'five'  => esc_html__('Widget Style 05', 'gofly-core'),
                    'six'   => esc_html__('Widget Style 06', 'gofly-core'),
                ],
                'default' => 'one',
            ]
        );
        $this->add_control(
            'hr',
            [
                'type' => \Elementor\Controls_Manager::DIVIDER,
            ]
        );

        $this->add_control(
            'gofly_destination_slider_destination_switcher',
            [
                'label'        => esc_html__("Show Destination Area?", 'gofly-core'),
                'type'         => \Elementor\Controls_Manager::SWITCHER,
                'label_on'     => esc_html__('Enable', 'gofly-core'),
                'label_off'    => esc_html__('Disable', 'gofly-core'),
                'return_value' => 'yes',
                'default'      => 'yes',
                'condition'    => [
                    'gofly_destination_slider_widget_style' => ['five'],
                ]
            ]
        );

        $this->add_control(
            'gofly_destination_slider_background_image',
            [
                'label'       => esc_html__('Background Image', 'gofly-core'),
                'type'        => \Elementor\Controls_Manager::MEDIA,
                'media_types' => ['image'],
                'default'     => [
                    'url' => \Elementor\Utils::get_placeholder_image_src(),
                ],
                'condition' => [
                    'gofly_destination_slider_widget_style' => ['four', 'five'],
                ]
            ]
        );

        $this->add_control(
            'gofly_destination_slider_subtitle',
            [
                'label'       => esc_html__('Subtitle', 'gofly-core'),
                'type'        => \Elementor\Controls_Manager::TEXT,
                'default'     => esc_html__('Best Agency Ever!', 'gofly-core'),
                'placeholder' => esc_html__('Type your subtitle here', 'gofly-core'),
                'label_block' => true,
                'condition'   => [
                    'gofly_destination_slider_widget_style' => ['four'],
                ]
            ]
        );

        $this->add_control(
            'gofly_destination_slider_title',
            [
                'label'       => esc_html__('Title', 'gofly-core'),
                'type'        => \Elementor\Controls_Manager::TEXT,
                'default'     => esc_html__('Featured Destinations', 'gofly-core'),
                'placeholder' => esc_html__('Type your title here', 'gofly-core'),
                'label_block' => true,
            ]
        );

        $this->add_control(
            'gofly_destination_slider_description',
            [
                'label'       => esc_html__('Description', 'gofly-core'),
                'type'        => \Elementor\Controls_Manager::TEXTAREA,
                'default'     => esc_html__('A curated list of the most popular travel packages based on different destinations.', 'gofly-core'),
                'placeholder' => esc_html__('Type your description here', 'gofly-core'),
                'label_block' => true,
                'condition'   => [
                    'gofly_destination_slider_widget_style' => ['four', 'five'],
                ]
            ]
        );


        $repeater = new \Elementor\Repeater();

        $repeater->add_control(
            'gofly_destination_slider_feature_icon_image',
            [
                'label'       => esc_html__('Icon Image', 'gofly-core'),
                'type'        => \Elementor\Controls_Manager::MEDIA,
                'media_types' => ['svg', 'image'],
                'default'     => [
                    'url' => \Elementor\Utils::get_placeholder_image_src(),
                ]
            ]
        );

        $repeater->add_control(
            'gofly_destination_slider_feature_title',
            [
                'label'       => esc_html__('Feature Title', 'gofly-core'),
                'type'        => \Elementor\Controls_Manager::TEXT,
                'default'     => esc_html__('Featured Destinations', 'gofly-core'),
                'placeholder' => esc_html__('Type your feature title here', 'gofly-core'),
                'label_block' => true,
            ]
        );

        $this->add_control(
            'gofly_destination_slider_feature_list',
            [
                'label'   => esc_html__('Feature List', 'gofly-core'),
                'type'    => \Elementor\Controls_Manager::REPEATER,
                'fields'  => $repeater->get_controls(),
                'default' => [
                    [
                        'gofly_destination_slider_feature_title' => wp_kses('Customizable Package.', wp_kses_allowed_html('post')),

                    ],
                    [
                        'gofly_destination_slider_feature_title' => wp_kses('24/7 Support', wp_kses_allowed_html('post')),

                    ],
                    [
                        'gofly_destination_slider_feature_title' => wp_kses('Trusted by Thousands', wp_kses_allowed_html('post')),

                    ],
                    [
                        'gofly_destination_slider_feature_title' => wp_kses('Local Experties', wp_kses_allowed_html('post')),

                    ],


                ],
                'title_field' => '{{{ gofly_destination_slider_feature_title }}}',
                'condition'   => [
                    'gofly_destination_slider_widget_style' => ['four'],
                ]
            ]
        );

        $this->add_control(
            'gofly_destination_slider_rating_icon',
            [
                'label'       => esc_html__('Rating Icon', 'gofly-core'),
                'type'        => \Elementor\Controls_Manager::MEDIA,
                'media_types' => ['svg', 'image'],
                'condition'   => [
                    'gofly_destination_slider_widget_style' => ['four'],
                ]
            ]
        );

        $this->add_control(
            'gofly_destination_slider_rating_title',
            [
                'label'       => esc_html__('Rating Title', 'gofly-core'),
                'type'        => \Elementor\Controls_Manager::TEXT,
                'default'     => esc_html__('5.0 Rating out of 5.0 based on 24,000 reviews', 'gofly-core'),
                'placeholder' => esc_html__('Type your title here', 'gofly-core'),
                'label_block' => true,
                'condition'   => [
                    'gofly_destination_slider_widget_style' => ['four'],
                ]
            ]
        );

        $this->add_control(
            'gofly_destination_slider_rating_company_logo',
            [
                'label'       => esc_html__('Company Logo', 'gofly-core'),
                'type'        => \Elementor\Controls_Manager::MEDIA,
                'media_types' => ['svg', 'image'],
                'condition'   => [
                    'gofly_destination_slider_widget_style' => ['four'],
                ]
            ]
        );

        $this->add_control(
            'gofly_destination_slider_rating_company_logo_url',
            [
                'label'       => esc_html__('Company Logo URL/Link', 'gofly-core'),
                'type'        => \Elementor\Controls_Manager::URL,
                'default'     => ['url' => '#'],
                'placeholder' => esc_html__('write your url here', 'gofly-core'),
                'label_block' => true,
                'condition'   => [
                    'gofly_destination_slider_widget_style' => ['four'],
                ]
            ]
        );

        // Post Query 
        $this->add_control(
            'gofly_destination_query_area',
            [
                'label'     => esc_html__('Post Query', 'gofly-core'),
                'type'      => \Elementor\Controls_Manager::HEADING,
                'separator' => 'after',
            ]
        );
        $this->add_control(
            'gofly_destination_order',
            [
                'label'   => esc_html__('Order', 'gofly-core'),
                'type'    => Controls_Manager::SELECT,
                'options' => [
                    'asc'  => esc_html__('Ascending', 'gofly-core'),
                    'desc' => esc_html__('Descending', 'gofly-core')
                ],
                'default' => 'desc',
            ]
        );
        $this->add_control(
            'gofly_destination_orderby',
            [
                'label'   => esc_html__('Order By', 'gofly-core'),
                'type'    => Controls_Manager::SELECT,
                'default' => 'ID',
                'options' => [
                    'ID'         => esc_html__('Post Id', 'gofly-core'),
                    'author'     => esc_html__('Post Author', 'gofly-core'),
                    'title'      => esc_html__('Title', 'gofly-core'),
                    'post_date'  => esc_html__('Date', 'gofly-core'),
                    'rand'       => esc_html__('Random', 'gofly-core'),
                    'menu_order' => esc_html__('Menu Order', 'gofly-core'),
                ],
            ]
        );
        $this->add_control(
            'gofly_destination_post_per_page',
            [
                'label'   => esc_html__('Posts Per Page', 'gofly-core'),
                'type'    => Controls_Manager::NUMBER,
                'default' => 8,
            ]
        );
        $this->add_control(
            'gofly_destination_selected_continen',
            [
                'label'       => esc_html__('Destination Continent', 'gofly-core'),
                'type'        => \Elementor\Controls_Manager::SELECT2,
                'label_block' => true,
                'multiple'    => true,
                'options'     => \Egns_Core\Egns_Helper::get_post_terms_options('destination-continent'),
                'description' => esc_html__('Show destination only selected continent', 'gofly-core'),
            ]
        );
        $this->add_control(
            'gofly_destination_post_list',
            [
                'label'       => esc_html__('Destination lists', 'gofly-core'),
                'type'        => \Elementor\Controls_Manager::SELECT2,
                'label_block' => true,
                'multiple'    => true,
                'options'     => \Egns_Core\Egns_Helper::get_post_list_options('destination'),
                'description' => esc_html__('Selected post only show when any listed continen have that.', 'gofly-core'),
            ]
        );

        $this->add_control(
            'gofly_destination_slider_style_three_featued_section_vector_image_one',
            [
                'label'       => esc_html__('Vector Image', 'gofly-core'),
                'type'        => \Elementor\Controls_Manager::MEDIA,
                'media_types' => ['svg', 'image'],
                'default'     => [
                    'url' => \Elementor\Utils::get_placeholder_image_src(),
                ]
            ]
        );


        $this->end_controls_section();


        $this->start_controls_section(
            'gofly_destination_slider_featued_section',
            [
                'label'     => esc_html__('Features Section', 'gofly-core'),
                'condition' => [
                    'gofly_destination_slider_widget_style' => ['five'],
                ]
            ]
        );

        $this->add_control(
            'gofly_destination_slider_featued_section_switcher',
            [
                'label'        => esc_html__("Show Feature Area?", 'gofly-core'),
                'type'         => \Elementor\Controls_Manager::SWITCHER,
                'label_on'     => esc_html__('Enable', 'gofly-core'),
                'label_off'    => esc_html__('Disable', 'gofly-core'),
                'return_value' => 'yes',
                'default'      => 'yes',
            ]
        );


        $this->add_control(
            'gofly_destination_slider_featued_section_title',
            [
                'label'       => esc_html__('Title', 'gofly-core'),
                'type'        => \Elementor\Controls_Manager::TEXT,
                'default'     => esc_html__('Ensure Trust & Reliability.', 'gofly-core'),
                'placeholder' => esc_html__('Type your title here', 'gofly-core'),
                'label_block' => true,
            ]
        );


        $repeater = new \Elementor\Repeater();


        $repeater->add_control(
            'gofly_destination_slider_featued_section_icon',
            [
                'label'   => esc_html__('Icon', 'gofly-core'),
                'type'    => \Elementor\Controls_Manager::ICONS,
                'default' => [
                    'value'   => 'fas fa-circle',
                    'library' => 'fa-solid',
                ],
                'recommended' => [
                    'fa-solid' => [
                        'circle',
                        'dot-circle',
                        'square-full',
                    ],
                    'fa-regular' => [
                        'circle',
                        'dot-circle',
                        'square-full',
                    ],
                ],
            ]
        );

        $repeater->add_control(
            'gofly_destination_slider_featued_section_content_title',
            [
                'label'       => esc_html__('Content Title', 'gofly-core'),
                'type'        => \Elementor\Controls_Manager::TEXT,
                'default'     => wp_kses('100% Verified & <br> Safe Adventures', wp_kses_allowed_html('post')),
                'placeholder' => esc_html__('write your text here', 'gofly-core'),
                'label_block' => true,
            ]
        );

        $repeater->add_control(
            'gofly_destination_slider_featued_section_content_description',
            [
                'label'       => esc_html__('Description', 'gofly-core'),
                'type'        => \Elementor\Controls_Manager::TEXTAREA,
                'default'     => esc_html__('We prioritize your safety and ensure that every adventure meets the highest standards.', 'gofly-core'),
                'placeholder' => esc_html__('write your text here', 'gofly-core'),
                'label_block' => true,
            ]
        );

        $this->add_control(
            'gofly_destination_slider_featued_section_content_list',
            [
                'label'   => esc_html__('Content List', 'gofly-core'),
                'type'    => \Elementor\Controls_Manager::REPEATER,
                'fields'  => $repeater->get_controls(),
                'default' => [
                    [
                        'gofly_destination_slider_featued_section_content_title' => wp_kses('100% Verified & <br> Safe Adventures', wp_kses_allowed_html('post')),
                    ],
                    [
                        'gofly_destination_slider_featued_section_content_title' => wp_kses('Certified &amp; <br> Experienced Guides', wp_kses_allowed_html('post')),
                    ],
                    [
                        'gofly_destination_slider_featued_section_content_title' => wp_kses('24/7 Customer <br> Supports', wp_kses_allowed_html('post')),
                    ],
                ],
                'title_field' => '{{{ gofly_destination_slider_featued_section_content_title }}}',

            ]
        );

        $this->add_control(
            'gofly_destination_slider_featued_section_review_area',
            [
                'label'     => esc_html__('Review Area', 'gofly-core'),
                'type'      => \Elementor\Controls_Manager::HEADING,
                'separator' => 'after',
            ]
        );

        $this->add_control(
            'gofly_destination_slider_featued_section_review_area_rating_image',
            [
                'label'       => esc_html__('Rating Image', 'gofly-core'),
                'type'        => \Elementor\Controls_Manager::MEDIA,
                'media_types' => ['svg', 'image'],
                'default'     => [
                    'url' => \Elementor\Utils::get_placeholder_image_src(),
                ]
            ]
        );

        $this->add_control(
            'gofly_destination_slider_featued_section_review_area_rating_title',
            [
                'label'       => esc_html__('Title', 'gofly-core'),
                'type'        => \Elementor\Controls_Manager::TEXT,
                'default'     => esc_html__('5.0 Rating out of 5.0 based on 24,000 reviews.', 'gofly-core'),
                'placeholder' => esc_html__('write your text here', 'gofly-core'),
                'label_block' => true,
            ]
        );


        $this->add_control(
            'gofly_destination_slider_featued_section_review_area_logo_image',
            [
                'label'       => esc_html__('Logo Image', 'gofly-core'),
                'type'        => \Elementor\Controls_Manager::MEDIA,
                'media_types' => ['svg', 'image'],
                'default'     => [
                    'url' => \Elementor\Utils::get_placeholder_image_src(),
                ]
            ]
        );

        $this->add_control(
            'gofly_destination_slider_featued_section_review_area_logo_image_url',
            [
                'label'       => esc_html__('Logo Image Link/URL', 'gofly-core'),
                'type'        => \Elementor\Controls_Manager::URL,
                'default'     => ['url' => '#'],
                'placeholder' => esc_html__('write your url here', 'gofly-core'),
                'label_block' => true,

            ]
        );

        $this->add_control(
            'gofly_destination_slider_featued_section_review_area_button_label',
            [
                'label'       => esc_html__('Button Label', 'gofly-core'),
                'type'        => \Elementor\Controls_Manager::TEXT,
                'default'     => esc_html__('Customize Package', 'gofly-core'),
                'placeholder' => esc_html__('write your label here', 'gofly-core'),
                'label_block' => true,

            ]
        );

        $this->add_control(
            'gofly_destination_slider_featued_section_review_area_button_label_url',
            [
                'label'       => esc_html__('Button Link/URL', 'gofly-core'),
                'type'        => \Elementor\Controls_Manager::URL,
                'default'     => ['url' => '#'],
                'placeholder' => esc_html__('write your url here', 'gofly-core'),
                'label_block' => true,

            ]
        );

        $this->add_control(
            'gofly_destination_slider_featued_section_vector_image_one',
            [
                'label'       => esc_html__('Vector Image One', 'gofly-core'),
                'type'        => \Elementor\Controls_Manager::MEDIA,
                'media_types' => ['svg', 'image'],
                'default'     => [
                    'url' => \Elementor\Utils::get_placeholder_image_src(),
                ]
            ]
        );


        $this->add_control(
            'gofly_destination_slider_featued_section_vector_image_two',
            [
                'label'       => esc_html__('Vector Image Two', 'gofly-core'),
                'type'        => \Elementor\Controls_Manager::MEDIA,
                'media_types' => ['svg', 'image'],
                'default'     => [
                    'url' => \Elementor\Utils::get_placeholder_image_src(),
                ]
            ]
        );

        $this->end_controls_section();


        //===================== Destination Content Style =======================//

        $this->start_controls_section(
            'gofly_destination_slider_section_style',
            [
                'label'     => esc_html__('Destination Content Style', 'gofly-core'),
                'tab'       => \Elementor\Controls_Manager::TAB_STYLE,
                'condition' => [
                    'gofly_destination_slider_widget_style' => ['one', 'two', 'three'],
                ]
            ]
        );

        // Section Title
        $this->add_control(
            'gofly_destination_slider_title_options',
            [
                'label'     => esc_html__('Section Title Options', 'gofly-core'),
                'type'      => \Elementor\Controls_Manager::HEADING,
                'separator' => 'before',
            ]
        );
        $this->add_control(
            'gofly_destination_slider_title_color',
            [
                'label'     => esc_html__('Color', 'gofly-core'),
                'type'      => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .section-title h2' => 'color: {{VALUE}}',
                ],
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name'     => 'gofly_destination_slider_title_typography',
                'selector' => '{{WRAPPER}} .section-title h2',
            ]
        );

        // Tab Menu
        $this->add_control(
            'gofly_destination_tab_menu_options',
            [
                'label'     => esc_html__('Tab Menu Options', 'gofly-core'),
                'type'      => \Elementor\Controls_Manager::HEADING,
                'separator' => 'before',
                'condition' => [
                    'gofly_destination_slider_widget_style' => 'one',
                ],
            ]
        );
        $this->add_control(
            'gofly_destination_tab_menu_color',
            [
                'label'     => esc_html__('Color', 'gofly-core'),
                'type'      => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .home1-destination-section .nav-pills .nav-item .nav-link' => 'color: {{VALUE}}',
                ],
                'condition' => [
                    'gofly_destination_slider_widget_style' => 'one',
                ],
            ]
        );
        $this->add_control(
            'gofly_destination_tab_menu_bdr_color',
            [
                'label'     => esc_html__('Border Color', 'gofly-core'),
                'type'      => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .home1-destination-section .nav-pills .nav-item .nav-link' => 'border-color: {{VALUE}}',
                ],
                'condition' => [
                    'gofly_destination_slider_widget_style' => 'one',
                ],
            ]
        );
        $this->add_control(
            'gofly_destination_tab_menu_bg_color',
            [
                'label'     => esc_html__('Active BG Color', 'gofly-core'),
                'type'      => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .home1-destination-section .nav-pills .nav-item .nav-link.active' => 'background-color: {{VALUE}}',
                    '{{WRAPPER}} .home1-destination-section .nav-pills .nav-item .nav-link:hover'  => 'background-color: {{VALUE}}',
                ],
                'condition' => [
                    'gofly_destination_slider_widget_style' => 'one',
                ],
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name'      => 'gofly_destination_tab_menu_typography',
                'selector'  => '{{WRAPPER}} .home1-destination-section .nav-pills .nav-item .nav-link',
                'condition' => [
                    'gofly_destination_slider_widget_style' => 'one',
                ],
            ]
        );

        // Card Title
        $this->add_control(
            'gofly_destination_sld_crd_title_options',
            [
                'label'     => esc_html__('Card Title Options', 'gofly-core'),
                'type'      => \Elementor\Controls_Manager::HEADING,
                'separator' => 'before',
            ]
        );
        $this->add_control(
            'gofly_destination_sld_crd_title_color',
            [
                'label'     => esc_html__('Color', 'gofly-core'),
                'type'      => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .destination-card .destination-content .title-area'     => 'color: {{VALUE}}',
                    '{{WRAPPER}} .destination-card .destination-content .title-area svg' => 'fill: {{VALUE}}',
                    // two 
                    '{{WRAPPER}} .destination-card2 .destination-content h5 a' => 'color: {{VALUE}}',
                ],
            ]
        );
        $this->add_control(
            'gofly_destination_sld_crd_hvr_title_color',
            [
                'label'     => esc_html__('Hover Color', 'gofly-core'),
                'type'      => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .destination-card .destination-content .title-area:hover'     => 'color: {{VALUE}}',
                    '{{WRAPPER}} .destination-card .destination-content .title-area:hover svg' => 'fill: {{VALUE}}',
                    // two
                    '{{WRAPPER}} .destination-card2 .destination-content h5 a:hover' => 'color: {{VALUE}}',
                ],
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name'     => 'gofly_destination_sld_crd_title_typography',
                'selector' => '{{WRAPPER}} .destination-card .destination-content .title-area,.destination-card2 .destination-content h5 a',
            ]
        );

        // Card Info
        $this->add_control(
            'gofly_destination_cdr_info_options',
            [
                'label'     => esc_html__('Card Info options', 'gofly-core'),
                'type'      => \Elementor\Controls_Manager::HEADING,
                'separator' => 'before',
            ]
        );
        $this->add_control(
            'gofly_destination_cdr_info_color',
            [
                'label'     => esc_html__('Color', 'gofly-core'),
                'type'      => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .destination-card .destination-content .content p' => 'color: {{VALUE}}',
                    '{{WRAPPER}} .destination-card2 .destination-content span'      => 'color: {{VALUE}}',
                ],
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name'     => 'gofly_destination_cdr_info_typography',
                'selector' => '{{WRAPPER}} .destination-card .destination-content .content p,.destination-card2 .destination-content span',
            ]
        );

        // Arrow btn
        $this->add_control(
            'gofly_destination_arrow_btn_options',
            [
                'label'     => esc_html__('Arrow Button Options', 'gofly-core'),
                'type'      => \Elementor\Controls_Manager::HEADING,
                'separator' => 'before',
                'condition' => [
                    'gofly_destination_slider_widget_style' => 'three',
                ],
            ]
        );
        $this->add_control(
            'gofly_destination_arrow_btn_color',
            [
                'label'     => esc_html__('Color', 'gofly-core'),
                'type'      => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .destination-card2.three .destination-img .arrow svg' => 'stroke: {{VALUE}}',
                ],
                'condition' => [
                    'gofly_destination_slider_widget_style' => 'three',
                ],
            ]
        );
        $this->add_control(
            'gofly_destination_arrow_btn_bg_color',
            [
                'label'     => esc_html__('BG Color', 'gofly-core'),
                'type'      => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .destination-card2.three .destination-img .arrow' => 'background-color: {{VALUE}}',
                ],
                'condition' => [
                    'gofly_destination_slider_widget_style' => 'three',
                ],
            ]
        );
        $this->add_control(
            'gofly_destination_arrow_btn_hvr_bg_color',
            [
                'label'     => esc_html__('Hover BG Color', 'gofly-core'),
                'type'      => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .destination-card2.three .destination-img .arrow:hover' => 'background-color: {{VALUE}}',
                ],
                'condition' => [
                    'gofly_destination_slider_widget_style' => 'three',
                ],
            ]
        );


        $this->end_controls_section();

        //===================== Destination Style Four Start =======================//

        $this->start_controls_section(
            'gofly_destination_slider_style_four_general',
            [
                'label'     => esc_html__('Styles', 'gofly-core'),
                'tab'       => Controls_Manager::TAB_STYLE,
                'condition' => [
                    'gofly_destination_slider_widget_style' => 'four',
                ],
            ]
        );

        $this->add_control(
            'gofly_destination_slider_style_four_general_section_bg_color',
            [
                'label' => esc_html__('Background Color', 'gofly-core'),
                'type'  => Controls_Manager::COLOR,
            ]
        );

        $this->add_control(
            'gofly_destination_slider_style_four_general_header_subtitle',
            [
                'label'     => esc_html__('Header Subtitle', 'gofly-core'),
                'type'      => \Elementor\Controls_Manager::HEADING,
                'separator' => 'after',
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'label'    => esc_html__('Typography', 'gofly-core'),
                'name'     => 'gofly_destination_slider_style_four_general_header_subtitle_typ',
                'selector' => '{{WRAPPER}} .home3-destination-section .section-title span',

            ]
        );

        $this->add_control(
            'gofly_destination_slider_style_four_general_header_subtitle_color',
            [
                'label'     => esc_html__('Color', 'gofly-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .home3-destination-section .section-title span' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'gofly_destination_slider_style_four_general_header_subtitle_bg_color',
            [
                'label'     => esc_html__('Background Color', 'gofly-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .home3-destination-section .section-title span' => 'background-color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'gofly_destination_slider_style_four_general_header_title',
            [
                'label'     => esc_html__('Title', 'gofly-core'),
                'type'      => \Elementor\Controls_Manager::HEADING,
                'separator' => 'after',
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'label'    => esc_html__('Typography', 'gofly-core'),
                'name'     => 'gofly_destination_slider_style_four_general_header_title_typ',
                'selector' => '{{WRAPPER}} .section-title h2',

            ]
        );

        $this->add_control(
            'gofly_destination_slider_style_four_general_header_title_color',
            [
                'label'     => esc_html__('Color', 'gofly-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .section-title h2' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'gofly_destination_slider_style_four_general_header_description',
            [
                'label'     => esc_html__('Description', 'gofly-core'),
                'type'      => \Elementor\Controls_Manager::HEADING,
                'separator' => 'after',
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'label'    => esc_html__('Typography', 'gofly-core'),
                'name'     => 'gofly_destination_slider_style_four_general_header_description_typ',
                'selector' => '{{WRAPPER}} .section-title p',

            ]
        );

        $this->add_control(
            'gofly_destination_slider_style_four_general_header_description_color',
            [
                'label'     => esc_html__('Color', 'gofly-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .section-title p' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'gofly_destination_slider_style_four_general_feature_list',
            [
                'label'     => esc_html__('Feature List', 'gofly-core'),
                'type'      => \Elementor\Controls_Manager::HEADING,
                'separator' => 'Before',
            ]
        );

        $this->add_control(
            'gofly_destination_slider_style_four_general_feature_card_bg_color',
            [
                'label'     => esc_html__('Card Color', 'gofly-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .home3-destination-section .feature-and-rating-area .single-feature' => 'backgorund-color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'gofly_destination_slider_style_four_general_feature_icon',
            [
                'label'     => esc_html__('Feature Icon', 'gofly-core'),
                'type'      => \Elementor\Controls_Manager::HEADING,
                'separator' => 'after',
            ]
        );

        $this->add_control(
            'gofly_destination_slider_style_four_general_feature_icon_size',
            [
                'label'      => esc_html__('Icon Size', 'gofly-core'),
                'type'       => \Elementor\Controls_Manager::SLIDER,
                'size_units' => ['px', '%', 'em', 'rem', 'custom'],
                'range'      => [
                    'px' => [
                        'min'  => 0,
                        'max'  => 1000,
                        'step' => 5,
                    ],
                    '%' => [
                        'min' => 0,
                        'max' => 100,
                    ],
                ],
                'default' => [
                    'unit' => 'px',
                    'size' => 60,
                ],
                'selectors' => [
                    '{{WRAPPER}} .home3-destination-section .feature-and-rating-area .single-feature .icon img' => 'width: {{SIZE}}{{UNIT}};',
                ],
            ]
        );

        $this->add_control(
            'gofly_destination_slider_style_four_general_feature_title',
            [
                'label'     => esc_html__('Feature Title', 'gofly-core'),
                'type'      => \Elementor\Controls_Manager::HEADING,
                'separator' => 'after',
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'label'    => esc_html__('Typography', 'gofly-core'),
                'name'     => 'gofly_destination_slider_style_four_general_feature_title_typ',
                'selector' => '{{WRAPPER}} .home3-destination-section .feature-and-rating-area .single-feature h5',

            ]
        );

        $this->add_control(
            'gofly_destination_slider_style_four_general_feature_title_color',
            [
                'label'     => esc_html__('Color', 'gofly-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .home3-destination-section .feature-and-rating-area .single-feature h5' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'gofly_destination_slider_style_four_general_feature_rating_title',
            [
                'label'     => esc_html__('Rating Title', 'gofly-core'),
                'type'      => \Elementor\Controls_Manager::HEADING,
                'separator' => 'after',
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'label'    => esc_html__('Typography', 'gofly-core'),
                'name'     => 'gofly_destination_slider_style_four_general_feature_rating_title_typ',
                'selector' => '{{WRAPPER}} .home3-destination-section .feature-and-rating-area .rating-area p',

            ]
        );

        $this->add_control(
            'gofly_destination_slider_style_four_general_feature_rating_title_color',
            [
                'label'     => esc_html__('Color', 'gofly-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .home3-destination-section .feature-and-rating-area .rating-area p' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'gofly_destination_slider_style_four_general_destination_title',
            [
                'label'     => esc_html__('Destination Title', 'gofly-core'),
                'type'      => \Elementor\Controls_Manager::HEADING,
                'separator' => 'after',
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'label'    => esc_html__('Typography', 'gofly-core'),
                'name'     => 'gofly_destination_slider_style_four_general_destination_title_typ',
                'selector' => '{{WRAPPER}} .destination-card2.two .destination-content h5 a',

            ]
        );

        $this->add_control(
            'gofly_destination_slider_style_four_general_destination_title_color',
            [
                'label'     => esc_html__('Color', 'gofly-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .destination-card2.two .destination-content h5 a' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'gofly_destination_slider_style_four_general_destination_counter',
            [
                'label'     => esc_html__('Destination Counter', 'gofly-core'),
                'type'      => \Elementor\Controls_Manager::HEADING,
                'separator' => 'after',
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'label'    => esc_html__('Typography', 'gofly-core'),
                'name'     => 'gofly_destination_slider_style_four_general_destination_counter_typ',
                'selector' => '{{WRAPPER}} .destination-card2 .destination-content span',

            ]
        );

        $this->add_control(
            'gofly_destination_slider_style_four_general_destination_counter_color',
            [
                'label'     => esc_html__('Color', 'gofly-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .destination-card2 .destination-content span' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'gofly_destination_slider_style_four_general_destination_pagination',
            [
                'label'     => esc_html__('Destination pagination', 'gofly-core'),
                'type'      => \Elementor\Controls_Manager::HEADING,
                'separator' => 'after',
            ]
        );

        $this->add_control(
            'gofly_destination_slider_style_four_general_destination_pagination_color',
            [
                'label'     => esc_html__('Color', 'gofly-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .slider-btn-grp.two .slider-btn svg' => 'fill: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'gofly_destination_slider_style_four_general_destination_pagination_hover_color',
            [
                'label'     => esc_html__('Hover Color', 'gofly-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .slider-btn-grp.two .slider-btn:hover svg' => 'fill: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'gofly_destination_slider_style_four_general_destination_pagination_border_color',
            [
                'label'     => esc_html__('Border Color', 'gofly-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .slider-btn-grp.two .slider-btn' => 'border-color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'gofly_destination_slider_style_four_general_destination_pagination_hover_border_color',
            [
                'label'     => esc_html__('Hover Border Color', 'gofly-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .slider-btn-grp.two .slider-btn:hover' => 'border-color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'gofly_destination_slider_style_four_general_destination_pagination_bg_color',
            [
                'label'     => esc_html__('Background Color', 'gofly-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .slider-btn-grp.two .slider-btn' => 'background-color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'gofly_destination_slider_style_four_general_destination_pagination_hover_bg_color',
            [
                'label'     => esc_html__('Hover Background Color', 'gofly-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .slider-btn-grp.two .slider-btn:hover' => 'background-color: {{VALUE}};',
                ],
            ]
        );


        $this->end_controls_section();

        //===================== Destination Style Five Start =======================//

        $this->start_controls_section(
            'gofly_destination_slider_style_five_general',
            [
                'label'     => esc_html__('Styles', 'gofly-core'),
                'tab'       => Controls_Manager::TAB_STYLE,
                'condition' => [
                    'gofly_destination_slider_widget_style' => 'five',
                ],
            ]
        );

        $this->add_control(
            'gofly_destination_slider_style_five_general_title',
            [
                'label'     => esc_html__('Title', 'gofly-core'),
                'type'      => \Elementor\Controls_Manager::HEADING,
                'separator' => 'after',
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'label'    => esc_html__('Typography', 'gofly-core'),
                'name'     => 'gofly_destination_slider_style_five_general_title_typ',
                'selector' => '{{WRAPPER}} .section-title h2',

            ]
        );

        $this->add_control(
            'gofly_destination_slider_style_five_general_title_color',
            [
                'label'     => esc_html__('Color', 'gofly-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .section-title h2' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'gofly_destination_slider_style_five_general_description',
            [
                'label'     => esc_html__('Description', 'gofly-core'),
                'type'      => \Elementor\Controls_Manager::HEADING,
                'separator' => 'after',
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'label'    => esc_html__('Typography', 'gofly-core'),
                'name'     => 'gofly_destination_slider_style_five_general_description_typ',
                'selector' => '{{WRAPPER}} .section-title p',

            ]
        );

        $this->add_control(
            'gofly_destination_slider_style_five_general_description_color',
            [
                'label'     => esc_html__('Color', 'gofly-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .section-title p' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'gofly_destination_slider_style_five_general_destination_title',
            [
                'label'     => esc_html__('Destination Title', 'gofly-core'),
                'type'      => \Elementor\Controls_Manager::HEADING,
                'separator' => 'after',
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'label'    => esc_html__('Typography', 'gofly-core'),
                'name'     => 'gofly_destination_slider_style_five_general_destination_title_typ',
                'selector' => '{{WRAPPER}} .destination-card2.two .destination-content h5 a',

            ]
        );

        $this->add_control(
            'gofly_destination_slider_style_five_general_destination_title_color',
            [
                'label'     => esc_html__('Color', 'gofly-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .destination-card2.two .destination-content h5 a' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'gofly_destination_slider_style_five_general_destination_title_border_bottom_color',
            [
                'label'     => esc_html__('Border Bottom Color', 'gofly-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .destination-card2.two .destination-content h5 a' => 'background: linear-gradient(to bottom, {{VALUE}} 0%, {{VALUE}} 98%);',
                ],
            ]
        );

        $this->add_control(
            'gofly_destination_slider_style_five_general_destination_activities_count',
            [
                'label'     => esc_html__('Activities', 'gofly-core'),
                'type'      => \Elementor\Controls_Manager::HEADING,
                'separator' => 'after',
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'label'    => esc_html__('Typography', 'gofly-core'),
                'name'     => 'gofly_destination_slider_style_five_general_destination_activities_count_typ',
                'selector' => '{{WRAPPER}} .destination-card2 .destination-content span',

            ]
        );

        $this->add_control(
            'gofly_destination_slider_style_five_general_destination_activities_count_color',
            [
                'label'     => esc_html__('Color', 'gofly-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .destination-card2 .destination-content span' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->end_controls_section();

        //features style
        $this->start_controls_section(
            'gofly_destination_slider_style_five_features',
            [
                'label'     => esc_html__('Feature Styles', 'gofly-core'),
                'tab'       => Controls_Manager::TAB_STYLE,
                'condition' => [
                    'gofly_destination_slider_widget_style' => 'five',
                ],
            ]
        );

        $this->add_control(
            'gofly_destination_slider_style_five_features_bg_color',
            [
                'label'     => esc_html__('Background Color', 'gofly-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .home7-destination-section .feature-wrapper' => 'background-color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'gofly_destination_slider_style_five_features_section_title',
            [
                'label'     => esc_html__('Section Title', 'gofly-core'),
                'type'      => \Elementor\Controls_Manager::HEADING,
                'separator' => 'after',
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'label'    => esc_html__('Typography', 'gofly-core'),
                'name'     => 'gofly_destination_slider_style_five_features_section_title_typ',
                'selector' => '{{WRAPPER}} .home7-destination-section .feature-wrapper .section-title h2',

            ]
        );

        $this->add_control(
            'gofly_destination_slider_style_five_features_section_title_color',
            [
                'label'     => esc_html__('Color', 'gofly-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .home7-destination-section .feature-wrapper .section-title h2' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'gofly_destination_slider_style_five_features_content_title',
            [
                'label'     => esc_html__('Content Title', 'gofly-core'),
                'type'      => \Elementor\Controls_Manager::HEADING,
                'separator' => 'after',
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'label'    => esc_html__('Typography', 'gofly-core'),
                'name'     => 'gofly_destination_slider_style_five_features_content_title_typ',
                'selector' => '{{WRAPPER}} .home7-destination-section .feature-wrapper .feature-list .single-feature .content h5',

            ]
        );

        $this->add_control(
            'gofly_destination_slider_style_five_features_content_title_color',
            [
                'label'     => esc_html__('Color', 'gofly-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .home7-destination-section .feature-wrapper .feature-list .single-feature .content h5' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'gofly_destination_slider_style_five_features_content_description',
            [
                'label'     => esc_html__('Content Description', 'gofly-core'),
                'type'      => \Elementor\Controls_Manager::HEADING,
                'separator' => 'after',
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'label'    => esc_html__('Typography', 'gofly-core'),
                'name'     => 'gofly_destination_slider_style_five_features_content_description_typ',
                'selector' => '{{WRAPPER}} .home7-destination-section .feature-wrapper .feature-list .single-feature .content p',

            ]
        );

        $this->add_control(
            'gofly_destination_slider_style_five_features_content_description_color',
            [
                'label'     => esc_html__('Color', 'gofly-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .home7-destination-section .feature-wrapper .feature-list .single-feature .content p' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'gofly_destination_slider_style_five_features_content_line',
            [
                'label'     => esc_html__('Line', 'gofly-core'),
                'type'      => \Elementor\Controls_Manager::HEADING,
                'separator' => 'after',
            ]
        );

        $this->add_control(
            'gofly_destination_slider_style_five_features_content_color_line',
            [
                'label'     => esc_html__('Color', 'gofly-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .home7-destination-section .feature-wrapper .line' => 'fill: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'gofly_destination_slider_style_five_features_rating_title',
            [
                'label'     => esc_html__('Rating Title', 'gofly-core'),
                'type'      => \Elementor\Controls_Manager::HEADING,
                'separator' => 'after',
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'label'    => esc_html__('Typography', 'gofly-core'),
                'name'     => 'gofly_destination_slider_style_five_features_rating_title_typ',
                'selector' => '{{WRAPPER}} .home7-destination-section .feature-wrapper .rating-and-btn-area .rating-area p',

            ]
        );

        $this->add_control(
            'gofly_destination_slider_style_five_features_rating_title_color',
            [
                'label'     => esc_html__('Color', 'gofly-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .home7-destination-section .feature-wrapper .rating-and-btn-area .rating-area p' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'gofly_destination_slider_style_five_features_rating_button',
            [
                'label'     => esc_html__('Button', 'gofly-core'),
                'type'      => \Elementor\Controls_Manager::HEADING,
                'separator' => 'after',
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'label'    => esc_html__('Typography', 'gofly-core'),
                'name'     => 'gofly_destination_slider_style_five_features_rating_button_typ',
                'selector' => '{{WRAPPER}} .home7-destination-section .feature-wrapper .rating-and-btn-area a',

            ]
        );

        $this->add_control(
            'gofly_destination_slider_style_five_features_rating_button_color',
            [
                'label'     => esc_html__('Color', 'gofly-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .home7-destination-section .feature-wrapper .rating-and-btn-area a' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'gofly_destination_slider_style_five_features_rating_button_hover_color',
            [
                'label'     => esc_html__('Hover Color', 'gofly-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .home7-destination-section .feature-wrapper .rating-and-btn-area a:hover' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'gofly_destination_slider_style_five_features_rating_button_icon_color',
            [
                'label'     => esc_html__('Icon Color', 'gofly-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .home7-destination-section .feature-wrapper .rating-and-btn-area a svg' => 'stroke: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'gofly_destination_slider_style_five_features_rating_button_icon_hover_color',
            [
                'label'     => esc_html__('Hover Icon Color', 'gofly-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .home7-destination-section .feature-wrapper .rating-and-btn-area a:hover svg' => 'stroke: {{VALUE}};',
                ],
            ]
        );

        $this->end_controls_section();
    }
    protected function render()
    {

        $settings = $this->get_settings_for_display();

        $continen_ids = $settings['gofly_destination_selected_continen'];

        $tax_args = array(
            'taxonomy'   => 'destination-continent',
            'hide_empty' => true,
        );

        if (! empty($continen_ids)) {
            // Ensure it's an array
            $tax_args['slug'] = (array) $continen_ids;
        }

        $terms = get_terms($tax_args);
        // Reindex the array
        $terms = array_values($terms);


?>

        <?php if (is_admin()): ?>
            <script>
                document.querySelectorAll(".home1-destination-slider").forEach((slider, index) => {
                    // Add unique pagination class
                    jQuery(slider)
                        .next(".slider-pagi-wrap")
                        .children(".home1-destination-pagi")
                        .addClass(`home1-destination-pagi-${index}`);
                    setTimeout(() => {
                        new Swiper(slider, {
                            slidesPerView: 1,
                            speed: 1500,
                            spaceBetween: 24,
                            autoplay: {
                                delay: 2500,
                                disableOnInteraction: false,
                                pauseOnMouseEnter: true,
                            },
                            pagination: {
                                el: `.home1-destination-pagi-${index}`,
                                clickable: true,
                            },
                            breakpoints: {
                                280: {
                                    slidesPerView: 1,
                                },
                                386: {
                                    slidesPerView: 1,
                                },
                                576: {
                                    slidesPerView: 2,
                                },
                                768: {
                                    slidesPerView: 3,
                                    spaceBetween: 15,
                                },
                                992: {
                                    slidesPerView: 4,
                                    spaceBetween: 15,
                                },
                                1200: {
                                    slidesPerView: 4,
                                },
                                1400: {
                                    slidesPerView: 4,
                                },
                            },
                        });
                    }, 0);
                });

                var swiper = new Swiper(".home2-destination-slider", {
                    slidesPerView: 1,
                    speed: 1500,
                    spaceBetween: 24,
                    autoplay: {
                        delay: 2500, // Autoplay duration in milliseconds
                        pauseOnMouseEnter: true,
                        disableOnInteraction: false,
                    },
                    navigation: {
                        nextEl: ".destination-slider-next",
                        prevEl: ".destination-slider-prev",
                    },
                    breakpoints: {
                        280: {
                            slidesPerView: 1,
                        },
                        386: {
                            slidesPerView: 1,
                        },
                        576: {
                            slidesPerView: 2,
                        },
                        768: {
                            slidesPerView: 3,
                        },
                        992: {
                            slidesPerView: 4,
                            spaceBetween: 15,
                        },
                        1200: {
                            slidesPerView: 4,
                        },
                        1400: {
                            slidesPerView: 4,
                        },
                    },
                });

                var swiper = new Swiper(".home3-destination-slider", {
                    slidesPerView: 1,
                    speed: 1500,
                    spaceBetween: 24,
                    autoplay: {
                        delay: 2500, // Autoplay duration in milliseconds
                        pauseOnMouseEnter: true,
                        disableOnInteraction: false,
                    },
                    navigation: {
                        nextEl: ".destination-slider-next",
                        prevEl: ".destination-slider-prev",
                    },
                    pagination: {
                        el: ".swiper-pagination1",
                        clickable: true,
                    },
                    breakpoints: {
                        280: {
                            slidesPerView: 1,
                        },
                        386: {
                            slidesPerView: 1,
                        },
                        576: {
                            slidesPerView: 2,
                        },
                        768: {
                            slidesPerView: 3,
                        },
                        992: {
                            slidesPerView: 4,
                            spaceBetween: 15,
                        },
                        1200: {
                            slidesPerView: 4,
                            spaceBetween: 15,
                        },
                        1400: {
                            slidesPerView: 4,
                        },
                    },
                });

                var swiper = new Swiper('.home9-destination-slider', {
                    loop: true,
                    effect: "coverflow",
                    autoHeight: true,
                    speed: 1500,
                    slidesPerView: 1,
                    spaceBetween: 0,
                    centeredSlides: true,
                    grabCursor: true,
                    loopedSlides: 3,
                    keyboard: {
                        enabled: true,
                    },
                    autoplay: {
                        delay: 1500,
                    },
                    coverflowEffect: {
                        rotate: 42,
                        stretch: 0,
                        depth: 100,
                        modifier: 1,
                        slideShadows: false,
                    },
                    navigation: {
                        nextEl: '.destination-slider-next',
                        prevEl: '.destination-slider-prev',
                        clickable: true,
                    },
                    breakpoints: {
                        350: {
                            slidesPerView: 1,
                        },
                        577: {
                            slidesPerView: 1,
                        },
                        768: {
                            slidesPerView: 3,
                        },
                        991: {
                            slidesPerView: 3,
                        },
                        1200: {
                            slidesPerView: 4,
                        },
                        1400: {
                            slidesPerView: 4,
                        },
                    }
                });
            </script>
        <?php endif; ?>

        <?php if ('one' == $settings['gofly_destination_slider_widget_style']): ?>
            <div class="home1-destination-section">
                <div class="container">
                    <div class="row justify-content-center mb-60 wow animate fadeInDown" data-wow-delay="200ms" data-wow-duration="1500ms">
                        <div class="col-lg-10">
                            <div class="section-title text-center">
                                <h2><?php echo esc_html($settings['gofly_destination_slider_title']) ?></h2>
                            </div>
                            <ul class="nav nav-pills" id="pills-tab" role="tablist">
                                <?php foreach ($terms as $key => $term): ?>
                                    <li class="nav-item" role="presentation">
                                        <button class="nav-link <?php echo esc_attr($key == 0 ? 'active' : '') ?>" id="pills-<?php echo esc_attr($term->slug); ?>-tab" data-bs-toggle="pill" data-bs-target="#pills-<?php echo esc_attr($term->slug); ?>" type="button" role="tab" aria-controls="pills-<?php echo esc_attr($term->slug); ?>" aria-selected="true">
                                            <?php echo esc_html($term->name) ?>
                                        </button>
                                    </li>
                                <?php endforeach; ?>
                            </ul>
                        </div>
                    </div>
                    <div class="tab-content" id="pills-tabContent">
                        <?php foreach ($terms as $key => $term): ?>
                            <div class="tab-pane fade <?php echo esc_attr($key == 0 ? 'show active' : '') ?>" id="pills-<?php echo esc_attr($term->slug); ?>" role="tabpanel" aria-labelledby="pills-<?php echo esc_attr($term->slug); ?>-tab">
                                <div class="swiper home1-destination-slider mb-40">
                                    <div class="swiper-wrapper">
                                        <?php

                                        $selected_post_ids = $settings['gofly_destination_post_list'];

                                        $args = array(
                                            'post_type'      => 'destination',
                                            'order'          => $settings['gofly_destination_order'],
                                            'orderby'        => $settings['gofly_destination_orderby'],
                                            'posts_per_page' => $settings['gofly_destination_post_per_page'],
                                            'post_status'    => 'publish',
                                            'offset'         => 0,
                                        );

                                        if (!empty($term->slug)) {
                                            $args['tax_query'] = array(
                                                array(
                                                    'taxonomy' => 'destination-continent',
                                                    'field'    => 'slug',
                                                    'terms'    => $term->slug,
                                                    'operator' => 'IN',
                                                ),
                                            );
                                        }

                                        // Add Included posts
                                        if (!empty($selected_post_ids)) {
                                            $args['post__in'] = $selected_post_ids;
                                        }

                                        $Query = new \WP_Query($args);

                                        ?>
                                        <?php

                                        $destination_counts = Egns_Helper::egns_get_counts_by_custom_meta_key('EGNS_TOUR_META_ID', 'tour_destination_select', 'tour');

                                        while ($Query->have_posts()):
                                            $Query->the_post();

                                            $destination_id = get_the_ID();
                                            $tour_count     = isset($destination_counts[$destination_id]) ? $destination_counts[$destination_id] : 0;
                                        ?>
                                            <div class="swiper-slide">
                                                <div class="destination-card">
                                                    <?php if (has_post_thumbnail()): ?>
                                                        <a href="<?php the_permalink() ?>" class="destination-img">
                                                            <?php the_post_thumbnail() ?>
                                                        </a>
                                                    <?php endif; ?>
                                                    <div class="destination-content">
                                                        <a href="<?php the_permalink() ?>" class="title-area">
                                                            <svg width="16" height="16" viewBox="0 0 16 16" xmlns="http://www.w3.org/2000/svg">
                                                                <path
                                                                    d="M7.81276 0C4.31734 0 1.47305 2.84433 1.47305 6.34163C1.47305 9.07242 5.2847 13.5258 6.92356 15.3136C7.15052 15.5628 7.47606 15.7042 7.81276 15.7042C8.14946 15.7042 8.475 15.5628 8.70196 15.3136C10.3408 13.5258 14.1525 9.07238 14.1525 6.34163C14.1525 2.84433 11.3082 0 7.81276 0ZM8.35966 14.9991C8.21642 15.1535 8.02297 15.2391 7.81276 15.2391C7.60255 15.2391 7.4091 15.1536 7.26586 14.9991C5.66417 13.2525 1.93812 8.90875 1.93812 6.34167C1.93812 3.10103 4.57221 0.465067 7.81276 0.465067C11.0533 0.465067 13.6874 3.10103 13.6874 6.34167C13.6874 8.90875 9.96135 13.2524 8.35966 14.9991Z" />
                                                                <path
                                                                    d="M7.81277 9.76634C9.6713 9.76634 11.1779 8.25971 11.1779 6.40118C11.1779 4.54265 9.6713 3.03601 7.81277 3.03601C5.95424 3.03601 4.4476 4.54265 4.4476 6.40118C4.4476 8.25971 5.95424 9.76634 7.81277 9.76634Z" />
                                                            </svg>
                                                            <?php the_title() ?>
                                                        </a>
                                                        <div class="content">
                                                            <p><?php echo !empty($tour_count) ? sprintf('%02d', $tour_count) . esc_html__(' tours', 'gofly-core') . ' | ' . Egns_Helper::egns_get_destination_value('destination_departure') . ' ' . Egns_Helper::egns_get_destination_value('destination_guest_travelled') : Egns_Helper::egns_get_destination_value('destination_departure') . ' ' . Egns_Helper::egns_get_destination_value('destination_guest_travelled') ?></p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        <?php
                                        endwhile;
                                        wp_reset_postdata();
                                        ?>
                                    </div>
                                </div>
                                <div class="slider-pagi-wrap">
                                    <div class="home1-destination-pagi paginations"></div>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    </div>
                </div>
            </div>
        <?php endif; ?>

        <?php if ('two' == $settings['gofly_destination_slider_widget_style']): ?>
            <div class="home2-destination-section">
                <div class="container">
                    <?php if (!empty($settings['gofly_destination_slider_title'])): ?>
                        <div class="section-title text-center mb-50 wow animate fadeInDown" data-wow-delay="200ms" data-wow-duration="1500ms">
                            <h2><?php echo esc_html($settings['gofly_destination_slider_title']) ?></h2>
                        </div>
                    <?php endif; ?>
                    <div class="destination-slider-area">
                        <div class="swiper home2-destination-slider">
                            <div class="swiper-wrapper">
                                <?php

                                $destination_counts = Egns_Helper::egns_get_counts_by_custom_meta_key('EGNS_TOUR_META_ID', 'tour_destination_select', 'tour');
                                $selected_post_ids  = $settings['gofly_destination_post_list'];

                                $args = array(
                                    'post_type'      => 'destination',
                                    'order'          => $settings['gofly_destination_order'],
                                    'orderby'        => $settings['gofly_destination_orderby'],
                                    'posts_per_page' => $settings['gofly_destination_post_per_page'],
                                    'post_status'    => 'publish',
                                    'offset'         => 0,
                                );

                                if (!empty($continen_ids)) {
                                    $args['tax_query'] = array(
                                        array(
                                            'taxonomy' => 'destination-continent',
                                            'field'    => 'slug',
                                            'terms'    => $continen_ids,
                                            'operator' => 'IN',
                                        ),
                                    );
                                }

                                // Add Included posts
                                if (!empty($selected_post_ids)) {
                                    $args['post__in'] = $selected_post_ids;
                                }

                                $Query = new \WP_Query($args);

                                while ($Query->have_posts()):
                                    $Query->the_post();

                                    $destination_id = get_the_ID();
                                    $tour_count     = isset($destination_counts[$destination_id]) ? $destination_counts[$destination_id] : 0;
                                ?>
                                    <div class="swiper-slide">
                                        <div class="destination-card2">
                                            <?php if (has_post_thumbnail()): ?>
                                                <a href="<?php the_permalink() ?>" class="destination-img">
                                                    <?php the_post_thumbnail() ?>
                                                </a>
                                            <?php endif; ?>
                                            <div class="destination-content">
                                                <h5><a href="<?php the_permalink() ?>"><?php the_title() ?></a></h5>
                                                <span><?php echo esc_html__('Tours ',  'gofly-core') . '(' . sprintf('%02d', $tour_count) . ')' ?></span>
                                            </div>
                                        </div>
                                    </div>
                                <?php
                                endwhile;
                                wp_reset_postdata();
                                ?>
                            </div>
                        </div>
                        <div class="slider-btn-grp two">
                            <div class="slider-btn destination-slider-prev">
                                <svg width="16" height="12" viewBox="0 0 16 12" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd" clip-rule="evenodd" d="M0 5.31421H16V6.68564H0V5.31421Z" />
                                    <path fill-rule="evenodd" clip-rule="evenodd"
                                        d="M0.685714 6.68569C3.9104 6.68569 6.54629 3.84958 6.54629 0.825119V0.139404H5.17486V0.825119C5.17486 3.12181 3.12412 5.31426 0.685714 5.31426H0V6.68569H0.685714Z" />
                                    <path fill-rule="evenodd" clip-rule="evenodd"
                                        d="M0.685714 5.31421C3.9104 5.31421 6.54629 8.15032 6.54629 11.1748V11.8605H5.17486V11.1748C5.17486 8.87901 3.12412 6.68564 0.685714 6.68564H0V5.31421H0.685714Z" />
                                </svg>
                            </div>
                            <div class="slider-btn destination-slider-next">
                                <svg width="16" height="16" viewBox="0 0 16 16" xmlns="http://www.w3.org/2000/svg">
                                    <g>
                                        <path fill-rule="evenodd" clip-rule="evenodd" d="M16 7.31421H-3.8147e-06V8.68564H16V7.31421Z" />
                                        <path fill-rule="evenodd" clip-rule="evenodd"
                                            d="M15.3143 8.68569C12.0896 8.68569 9.45371 5.84958 9.45371 2.82512V2.1394H10.8251V2.82512C10.8251 5.12181 12.8759 7.31426 15.3143 7.31426H16V8.68569H15.3143Z" />
                                        <path fill-rule="evenodd" clip-rule="evenodd"
                                            d="M15.3143 7.31421C12.0896 7.31421 9.45371 10.1503 9.45371 13.1748V13.8605H10.8251V13.1748C10.8251 10.879 12.8759 8.68564 15.3143 8.68564H16V7.31421H15.3143Z" />
                                    </g>
                                </svg>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        <?php endif; ?>

        <?php if ('three' == $settings['gofly_destination_slider_widget_style']): ?>
            <div class="home4-destination-section">
                <div class="container">
                    <?php if (!empty($settings['gofly_destination_slider_title'])): ?>
                        <div class="row justify-content-center mb-50 wow animate fadeInDown" data-wow-delay="200ms" data-wow-duration="1500ms">
                            <div class="col-xl-6 col-lg-8">
                                <div class="section-title text-center">
                                    <h2><?php echo esc_html($settings['gofly_destination_slider_title']) ?></h2>
                                </div>
                            </div>
                        </div>
                    <?php endif; ?>
                    <div class="destination-slider-area mb-40">
                        <div class="swiper home3-destination-slider">
                            <div class="swiper-wrapper">
                                <?php
                                $destination_counts = Egns_Helper::egns_get_counts_by_custom_meta_key('EGNS_TOUR_META_ID', 'tour_destination_select', 'tour');
                                $selected_post_ids  = $settings['gofly_destination_post_list'];

                                $args = array(
                                    'post_type'      => 'destination',
                                    'order'          => $settings['gofly_destination_order'],
                                    'orderby'        => $settings['gofly_destination_orderby'],
                                    'posts_per_page' => $settings['gofly_destination_post_per_page'],
                                    'post_status'    => 'publish',
                                    'offset'         => 0,
                                );

                                if (!empty($continen_ids)) {
                                    $args['tax_query'] = array(
                                        array(
                                            'taxonomy' => 'destination-continent',
                                            'field'    => 'slug',
                                            'terms'    => $continen_ids,
                                            'operator' => 'IN',
                                        ),
                                    );
                                }

                                // Add Included posts
                                if (!empty($selected_post_ids)) {
                                    $args['post__in'] = $selected_post_ids;
                                }

                                $Query = new \WP_Query($args);

                                while ($Query->have_posts()):
                                    $Query->the_post();

                                    $destination_id = get_the_ID();
                                    $tour_count     = isset($destination_counts[$destination_id]) ? $destination_counts[$destination_id] : 0;
                                ?>
                                    <div class="swiper-slide">
                                        <div class="destination-card2 three">
                                            <?php if (has_post_thumbnail()): ?>
                                                <div class="destination-img">
                                                    <?php the_post_thumbnail() ?>
                                                    <a href="<?php the_permalink() ?>" class="arrow">
                                                        <svg width="14" height="14" viewBox="0 0 14 14" xmlns="http://www.w3.org/2000/svg">
                                                            <path
                                                                d="M1 13C5.94664 8.05336 13 1 13 1M13 1C10.1852 1.52778 6.69444 2.58333 3 1M13 1C12.4722 3.63889 11.4167 6.77778 13 11" stroke-width="1.5" stroke-linecap="round" />
                                                        </svg>
                                                    </a>
                                                </div>
                                            <?php endif; ?>
                                            <div class="destination-content">
                                                <h5><a href="<?php the_permalink() ?>"><?php the_title() ?></a></h5>
                                                <span><?php echo esc_html__('Tours ',  'gofly-core') . '(' . sprintf('%02d', $tour_count) . ')' ?></span>
                                            </div>
                                        </div>
                                    </div>
                                <?php
                                endwhile;
                                wp_reset_postdata();
                                ?>
                            </div>
                        </div>
                        <div class="slider-btn-grp two">
                            <div class="slider-btn destination-slider-prev">
                                <svg width="16" height="12" viewBox="0 0 16 12" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd" clip-rule="evenodd" d="M0 5.31421H16V6.68564H0V5.31421Z" />
                                    <path fill-rule="evenodd" clip-rule="evenodd"
                                        d="M0.685714 6.68569C3.9104 6.68569 6.54629 3.84958 6.54629 0.825119V0.139404H5.17486V0.825119C5.17486 3.12181 3.12412 5.31426 0.685714 5.31426H0V6.68569H0.685714Z" />
                                    <path fill-rule="evenodd" clip-rule="evenodd"
                                        d="M0.685714 5.31421C3.9104 5.31421 6.54629 8.15032 6.54629 11.1748V11.8605H5.17486V11.1748C5.17486 8.87901 3.12412 6.68564 0.685714 6.68564H0V5.31421H0.685714Z" />
                                </svg>
                            </div>
                            <div class="slider-btn destination-slider-next">
                                <svg width="16" height="16" viewBox="0 0 16 16" xmlns="http://www.w3.org/2000/svg">
                                    <g>
                                        <path fill-rule="evenodd" clip-rule="evenodd" d="M16 7.31421H-3.8147e-06V8.68564H16V7.31421Z" />
                                        <path fill-rule="evenodd" clip-rule="evenodd"
                                            d="M15.3143 8.68569C12.0896 8.68569 9.45371 5.84958 9.45371 2.82512V2.1394H10.8251V2.82512C10.8251 5.12181 12.8759 7.31426 15.3143 7.31426H16V8.68569H15.3143Z" />
                                        <path fill-rule="evenodd" clip-rule="evenodd"
                                            d="M15.3143 7.31421C12.0896 7.31421 9.45371 10.1503 9.45371 13.1748V13.8605H10.8251V13.1748C10.8251 10.879 12.8759 8.68564 15.3143 8.68564H16V7.31421H15.3143Z" />
                                    </g>
                                </svg>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-12 d-flex justify-content-center">
                            <div class="swiper-pagination1 paginations two"></div>
                        </div>
                    </div>
                </div>
                <?php if (!empty($settings['gofly_destination_slider_style_three_featued_section_vector_image_one']['url'])): ?>
                    <img src="<?php echo esc_url($settings['gofly_destination_slider_style_three_featued_section_vector_image_one']['url']); ?>" alt="<?php echo esc_attr("image") ?>" class="vector">
                <?php endif; ?>
            </div>
        <?php endif; ?>

        <?php if ('four' == $settings['gofly_destination_slider_widget_style']) : ?>
            <div class="home3-destination-section" <?php if (!empty($settings['gofly_destination_slider_background_image']['url'])): ?> style="background-image: url(<?php echo esc_url($settings['gofly_destination_slider_background_image']['url']); ?>), linear-gradient(180deg, <?php echo esc_attr($settings['gofly_destination_slider_style_four_general_section_bg_color']); ?> 0%, <?php echo esc_attr($settings['gofly_destination_slider_style_four_general_section_bg_color']); ?> 100%)" <?php endif; ?>>
                <div class="container">
                    <div class="row justify-content-center mb-50 wow animate fadeInDown" data-wow-delay="200ms" data-wow-duration="1500ms">
                        <div class="col-lg-8">
                            <div class="section-title text-center">
                                <?php if (!empty($settings['gofly_destination_slider_subtitle'])): ?>
                                    <span><?php echo esc_html($settings['gofly_destination_slider_subtitle']); ?></span>
                                <?php endif; ?>
                                <?php if (!empty($settings['gofly_destination_slider_title'])): ?>
                                    <h2><?php echo esc_html($settings['gofly_destination_slider_title']); ?></h2>
                                <?php endif; ?>
                                <?php if (!empty($settings['gofly_destination_slider_description'])): ?>
                                    <p><?php echo esc_html($settings['gofly_destination_slider_description']); ?></p>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                    <div class="feature-and-rating-area mb-60">
                        <div class="row g-4">
                            <?php foreach ($settings['gofly_destination_slider_feature_list'] as $feature_data): ?>
                                <div class="col-lg-3 col-md-4 col-sm-6">
                                    <div class="single-feature">
                                        <?php if (!empty($feature_data['gofly_destination_slider_feature_icon_image']['url'])): ?>
                                            <div class="icon">
                                                <img src="<?php echo esc_url($feature_data['gofly_destination_slider_feature_icon_image']['url']); ?>" alt="<?php echo esc_attr__('feature-icon-image', 'gofly-core'); ?>">
                                            </div>
                                        <?php endif; ?>
                                        <?php if (!empty($feature_data['gofly_destination_slider_feature_title'])): ?>
                                            <h5><?php echo esc_html($feature_data['gofly_destination_slider_feature_title']); ?></h5>
                                        <?php endif; ?>
                                    </div>
                                </div>
                            <?php endforeach; ?>
                        </div>
                        <div class="rating-area wow animate fadeInUp" data-wow-delay="200ms" data-wow-duration="1500ms">
                            <?php if (!empty($settings['gofly_destination_slider_rating_icon']['url'])): ?>
                                <img src="<?php echo esc_url($settings['gofly_destination_slider_rating_icon']['url']); ?>" alt="<?php echo esc_attr__('rating-star-icon', 'gofly-core'); ?>">
                            <?php endif; ?>
                            <div class="text-and-logo">
                                <?php if (!empty($settings['gofly_destination_slider_rating_title'])): ?>
                                    <p><?php echo esc_html($settings['gofly_destination_slider_rating_title']); ?></p>
                                <?php endif; ?>
                                <?php if (!empty($settings['gofly_destination_slider_rating_company_logo']['url'])): ?>
                                    <a href="<?php echo esc_url($settings['gofly_destination_slider_rating_company_logo_url']['url']); ?>"><img src="<?php echo esc_url($settings['gofly_destination_slider_rating_company_logo']['url']); ?>" alt="<?php echo esc_attr__('rating-star-icon', 'gofly-core'); ?>"></a>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                    <div class="destination-slider-area">
                        <div class="swiper home3-destination-slider">
                            <div class="swiper-wrapper">
                                <?php
                                $destination_counts = Egns_Helper::egns_get_counts_by_custom_meta_key('EGNS_TOUR_META_ID', 'tour_destination_select', 'tour');
                                $selected_post_ids  = $settings['gofly_destination_post_list'];

                                $args = array(
                                    'post_type'      => 'destination',
                                    'order'          => $settings['gofly_destination_order'],
                                    'orderby'        => $settings['gofly_destination_orderby'],
                                    'posts_per_page' => $settings['gofly_destination_post_per_page'],
                                    'post_status'    => 'publish',
                                    'offset'         => 0,
                                );

                                if (!empty($continen_ids)) {
                                    $args['tax_query'] = array(
                                        array(
                                            'taxonomy' => 'destination-continent',
                                            'field'    => 'slug',
                                            'terms'    => $continen_ids,
                                            'operator' => 'IN',
                                        ),
                                    );
                                }

                                // Add Included posts
                                if (!empty($selected_post_ids)) {
                                    $args['post__in'] = $selected_post_ids;
                                }

                                $Query = new \WP_Query($args);

                                while ($Query->have_posts()):
                                    $Query->the_post();

                                    $destination_id = get_the_ID();
                                    $tour_count     = isset($destination_counts[$destination_id]) ? $destination_counts[$destination_id] : 0;
                                ?>

                                    <div class="swiper-slide">
                                        <div class="destination-card2 two">
                                            <?php if (has_post_thumbnail()): ?>
                                                <div class="destination-img">
                                                    <?php the_post_thumbnail(); ?>
                                                    <a href="<?php the_permalink(); ?>" class="arrow">
                                                        <svg width="14" height="14" viewBox="0 0 14 14" xmlns="http://www.w3.org/2000/svg">
                                                            <path
                                                                d="M1 13C5.94664 8.05336 13 1 13 1M13 1C10.1852 1.52778 6.69444 2.58333 3 1M13 1C12.4722 3.63889 11.4167 6.77778 13 11" stroke-width="1.5" stroke-linecap="round" />
                                                        </svg>
                                                    </a>
                                                </div>
                                            <?php endif; ?>
                                            <div class="destination-content">
                                                <h5><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h5>
                                                <span><?php echo esc_html__('Tours ',  'gofly-core') . '(' . sprintf('%02d', $tour_count) . ')' ?></span>
                                            </div>
                                        </div>
                                    </div>

                                <?php
                                endwhile;
                                wp_reset_postdata();
                                ?>
                            </div>
                        </div>
                        <div class="slider-btn-grp two">
                            <div class="slider-btn destination-slider-prev">
                                <svg width="16" height="12" viewBox="0 0 16 12" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd" clip-rule="evenodd" d="M0 5.31421H16V6.68564H0V5.31421Z" />
                                    <path fill-rule="evenodd" clip-rule="evenodd"
                                        d="M0.685714 6.68569C3.9104 6.68569 6.54629 3.84958 6.54629 0.825119V0.139404H5.17486V0.825119C5.17486 3.12181 3.12412 5.31426 0.685714 5.31426H0V6.68569H0.685714Z" />
                                    <path fill-rule="evenodd" clip-rule="evenodd"
                                        d="M0.685714 5.31421C3.9104 5.31421 6.54629 8.15032 6.54629 11.1748V11.8605H5.17486V11.1748C5.17486 8.87901 3.12412 6.68564 0.685714 6.68564H0V5.31421H0.685714Z" />
                                </svg>
                            </div>
                            <div class="slider-btn destination-slider-next">
                                <svg width="16" height="16" viewBox="0 0 16 16" xmlns="http://www.w3.org/2000/svg">
                                    <g>
                                        <path fill-rule="evenodd" clip-rule="evenodd" d="M16 7.31421H-3.8147e-06V8.68564H16V7.31421Z" />
                                        <path fill-rule="evenodd" clip-rule="evenodd"
                                            d="M15.3143 8.68569C12.0896 8.68569 9.45371 5.84958 9.45371 2.82512V2.1394H10.8251V2.82512C10.8251 5.12181 12.8759 7.31426 15.3143 7.31426H16V8.68569H15.3143Z" />
                                        <path fill-rule="evenodd" clip-rule="evenodd"
                                            d="M15.3143 7.31421C12.0896 7.31421 9.45371 10.1503 9.45371 13.1748V13.8605H10.8251V13.1748C10.8251 10.879 12.8759 8.68564 15.3143 8.68564H16V7.31421H15.3143Z" />
                                    </g>
                                </svg>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        <?php endif; ?>

        <?php if ('five' == $settings['gofly_destination_slider_widget_style']) : ?>
            <div class="home7-destination-section" <?php if (!empty($settings['gofly_destination_slider_background_image']['url'])): ?> style="background-image: url(<?php echo esc_url($settings['gofly_destination_slider_background_image']['url']); ?>)" <?php endif; ?>>
                <div class="container">
                    <?php if ($settings['gofly_destination_slider_destination_switcher'] == 'yes'): ?>
                        <div class="destination-wrapper mb-60">
                            <div class="row justify-content-center mb-50 wow animate fadeInDown" data-wow-delay="200ms" data-wow-duration="1500ms">
                                <div class="col-xl-6 col-lg-8">
                                    <div class="section-title text-center">
                                        <?php if (!empty($settings['gofly_destination_slider_title'])): ?>
                                            <h2><?php echo esc_html($settings['gofly_destination_slider_title']); ?></h2>
                                        <?php endif; ?>
                                        <?php if (!empty($settings['gofly_destination_slider_description'])): ?>
                                            <p><?php echo esc_html($settings['gofly_destination_slider_description']); ?></p>
                                        <?php endif; ?>
                                    </div>
                                </div>
                            </div>
                            <div class="destination-slider-area">
                                <div class="swiper home3-destination-slider">
                                    <div class="swiper-wrapper">
                                        <?php
                                        $destination_counts = Egns_Helper::egns_get_counts_by_custom_meta_key('EGNS_TOUR_META_ID', 'tour_destination_select', 'tour');
                                        $selected_post_ids  = $settings['gofly_destination_post_list'];

                                        $args = array(
                                            'post_type'      => 'destination',
                                            'order'          => $settings['gofly_destination_order'],
                                            'orderby'        => $settings['gofly_destination_orderby'],
                                            'posts_per_page' => $settings['gofly_destination_post_per_page'],
                                            'post_status'    => 'publish',
                                            'offset'         => 0,
                                        );

                                        if (!empty($continen_ids)) {
                                            $args['tax_query'] = array(
                                                array(
                                                    'taxonomy' => 'destination-continen',
                                                    'field'    => 'slug',
                                                    'terms'    => $continen_ids,
                                                    'operator' => 'IN',
                                                ),
                                            );
                                        }

                                        // Add Included posts
                                        if (!empty($selected_post_ids)) {
                                            $args['post__in'] = $selected_post_ids;
                                        }

                                        $Query = new \WP_Query($args);

                                        while ($Query->have_posts()):
                                            $Query->the_post();

                                            $destination_id   = get_the_ID();
                                            $experience_count = isset($destination_counts[$destination_id]) ? $destination_counts[$destination_id] : 0;
                                            $tour_count       = isset($destination_counts[$destination_id]) ? $destination_counts[$destination_id] : 0;
                                        ?>
                                            <div class="swiper-slide">
                                                <div class="destination-card2 two">
                                                    <?php if (has_post_thumbnail()): ?>
                                                        <a href="<?php the_permalink(); ?>" class="destination-img">
                                                            <?php the_post_thumbnail(); ?>
                                                        </a>
                                                    <?php endif; ?>
                                                    <div class="destination-content">
                                                        <h5><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h5>
                                                        <span><?php echo sprintf('%02d', $experience_count) . ' ' . esc_html__('Activities', 'gofly-core'); ?></span>
                                                    </div>
                                                </div>
                                            </div>
                                        <?php
                                        endwhile;
                                        wp_reset_postdata();
                                        ?>
                                    </div>
                                </div>
                                <div class="slider-btn-grp three">
                                    <div class="slider-btn destination-slider-prev">
                                        <svg width="16" height="12" viewBox="0 0 16 12" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path fill-rule="evenodd" clip-rule="evenodd" d="M0 5.31421H16V6.68564H0V5.31421Z" />
                                            <path fill-rule="evenodd" clip-rule="evenodd"
                                                d="M0.685714 6.68569C3.9104 6.68569 6.54629 3.84958 6.54629 0.825119V0.139404H5.17486V0.825119C5.17486 3.12181 3.12412 5.31426 0.685714 5.31426H0V6.68569H0.685714Z" />
                                            <path fill-rule="evenodd" clip-rule="evenodd"
                                                d="M0.685714 5.31421C3.9104 5.31421 6.54629 8.15032 6.54629 11.1748V11.8605H5.17486V11.1748C5.17486 8.87901 3.12412 6.68564 0.685714 6.68564H0V5.31421H0.685714Z" />
                                        </svg>
                                    </div>
                                    <div class="slider-btn destination-slider-next">
                                        <svg width="16" height="16" viewBox="0 0 16 16" xmlns="http://www.w3.org/2000/svg">
                                            <g>
                                                <path fill-rule="evenodd" clip-rule="evenodd" d="M16 7.31421H-3.8147e-06V8.68564H16V7.31421Z" />
                                                <path fill-rule="evenodd" clip-rule="evenodd"
                                                    d="M15.3143 8.68569C12.0896 8.68569 9.45371 5.84958 9.45371 2.82512V2.1394H10.8251V2.82512C10.8251 5.12181 12.8759 7.31426 15.3143 7.31426H16V8.68569H15.3143Z" />
                                                <path fill-rule="evenodd" clip-rule="evenodd"
                                                    d="M15.3143 7.31421C12.0896 7.31421 9.45371 10.1503 9.45371 13.1748V13.8605H10.8251V13.1748C10.8251 10.879 12.8759 8.68564 15.3143 8.68564H16V7.31421H15.3143Z" />
                                            </g>
                                        </svg>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php endif; ?>
                    <?php if ($settings['gofly_destination_slider_featued_section_switcher'] == 'yes'): ?>
                        <div class="feature-wrapper wow animate fadeInUp" data-wow-delay="200ms" data-wow-duration="1500ms">
                            <?php if (!empty($settings['gofly_destination_slider_featued_section_title'])): ?>
                                <div class="section-title text-center mb-50">
                                    <h2><?php echo esc_html($settings['gofly_destination_slider_featued_section_title']); ?></h2>
                                </div>
                            <?php endif; ?>
                            <ul class="feature-list">
                                <?php foreach ($settings['gofly_destination_slider_featued_section_content_list'] as $data): ?>
                                    <li class="single-feature">
                                        <?php if (!empty($data['gofly_destination_slider_featued_section_icon'])): ?>
                                            <div class="icon">
                                                <?php \Elementor\Icons_Manager::render_icon($data['gofly_destination_slider_featued_section_icon'], ['aria-hidden' => 'true']); ?>
                                            </div>
                                        <?php endif; ?>
                                        <div class="content">
                                            <?php if (!empty($data['gofly_destination_slider_featued_section_content_title'])): ?>
                                                <h5><?php echo wp_kses($data['gofly_destination_slider_featued_section_content_title'], wp_kses_allowed_html('post')); ?></h5>
                                            <?php endif; ?>
                                            <?php if (!empty($data['gofly_destination_slider_featued_section_content_description'])): ?>
                                                <p><?php echo esc_html($data['gofly_destination_slider_featued_section_content_description']); ?></p>
                                            <?php endif; ?>
                                        </div>
                                    </li>
                                <?php endforeach; ?>
                            </ul>
                            <svg class="line" height="6" viewBox="0 0 1220 6" xmlns="http://www.w3.org/2000/svg">
                                <path
                                    d="M5 2.5L0 0.113249V5.88675L5 3.5V2.5ZM1215 3.5L1220 5.88675V0.113249L1215 2.5V3.5ZM4.5 3.5H1215.5V2.5H4.5V3.5Z" />
                            </svg>
                            <div class="rating-and-btn-area">
                                <div class="rating-area">
                                    <?php if (!empty($settings['gofly_destination_slider_featued_section_review_area_rating_image']['url'])): ?>
                                        <img src="<?php echo esc_url($settings['gofly_destination_slider_featued_section_review_area_rating_image']['url']); ?>" alt="<?php echo esc_attr__('rating-icon-image', 'gofly-core'); ?>">
                                    <?php endif; ?>
                                    <div class="text-and-logo">
                                        <?php if (!empty($settings['gofly_destination_slider_featued_section_review_area_rating_title'])): ?>
                                            <p><?php echo esc_html($settings['gofly_destination_slider_featued_section_review_area_rating_title']); ?></p>
                                        <?php endif; ?>
                                        <?php if (!empty($settings['gofly_destination_slider_featued_section_review_area_logo_image']['url'])): ?>
                                            <a href="<?php echo esc_url($settings['gofly_destination_slider_featued_section_review_area_logo_image_url']['url']); ?>">
                                                <img src="<?php echo esc_url($settings['gofly_destination_slider_featued_section_review_area_logo_image']['url']); ?>" alt="<?php echo esc_attr__('logo-image', 'gofly-core'); ?>">
                                            </a>
                                        <?php endif; ?>
                                    </div>
                                </div>
                                <?php if (!empty($settings['gofly_destination_slider_featued_section_review_area_button_label'])): ?>
                                    <a href="<?php echo esc_url($settings['gofly_destination_slider_featued_section_review_area_button_label_url']['url']); ?>"><?php echo esc_html($settings['gofly_destination_slider_featued_section_review_area_button_label']); ?>
                                        <svg width="10" height="10" viewBox="0 0 10 10" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M1 9L9 1M9 1C7.22222 1.33333 3.33333 2 1 1M9 1C8.66667 2.66667 8 6.33333 9 9" stroke-width="1.5" stroke-linecap="round"></path>
                                        </svg>
                                    </a>
                                <?php endif; ?>
                            </div>
                        </div>
                    <?php endif; ?>
                </div>
                <?php if (!empty($settings['gofly_destination_slider_featued_section_vector_image_one']['url'])): ?>
                    <img src="<?php echo esc_url($settings['gofly_destination_slider_featued_section_vector_image_one']['url']); ?>" alt="<?php echo esc_attr__('vector-image-one', 'gofly-core'); ?>" class="vector1">
                <?php endif; ?>
                <?php if (!empty($settings['gofly_destination_slider_featued_section_vector_image_two']['url'])): ?>
                    <img src="<?php echo esc_url($settings['gofly_destination_slider_featued_section_vector_image_two']['url']); ?>" alt="<?php echo esc_attr__('vector-image-two', 'gofly-core'); ?>" class="vector2">
                <?php endif; ?>
            </div>
        <?php endif; ?>

        <?php if ('six' == $settings['gofly_destination_slider_widget_style']) : ?>
            <div class="home9-destination-section">
                <div class="container">
                    <div class="section-title text-center mb-70">
                        <?php if (!empty($settings['gofly_destination_slider_title'])): ?>
                            <h2><?php echo esc_html($settings['gofly_destination_slider_title']); ?></h2>
                        <?php endif; ?>
                    </div>
                    <div class="destination-slider-wrapper">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="swiper home9-destination-slider">
                                    <div class="swiper-wrapper">
                                        <?php
                                        $selected_post_ids = $settings['gofly_destination_post_list'];
                                        $args = array(
                                            'post_type'      => 'destination',
                                            'order'          => $settings['gofly_destination_order'],
                                            'orderby'        => $settings['gofly_destination_orderby'],
                                            'posts_per_page' => $settings['gofly_destination_post_per_page'],
                                            'post_status'    => 'publish',
                                            'offset'         => 0,
                                        );
                                        if (!empty($term->slug)) {
                                            $args['tax_query'] = array(
                                                array(
                                                    'taxonomy' => 'destination-continent',
                                                    'field'    => 'slug',
                                                    'terms'    => $term->slug,
                                                    'operator' => 'IN',
                                                ),
                                            );
                                        }
                                        // Add Included posts
                                        if (!empty($selected_post_ids)) {
                                            $args['post__in'] = $selected_post_ids;
                                        }
                                        $Query = new \WP_Query($args);
                                        ?>
                                        <?php

                                        $destination_counts = Egns_Helper::egns_get_counts_by_custom_meta_key('EGNS_TOUR_META_ID', 'tour_destination_select', 'tour');

                                        while ($Query->have_posts()):
                                            $Query->the_post();
                                            $destination_id = get_the_ID();
                                            $tour_count     = isset($destination_counts[$destination_id]) ? $destination_counts[$destination_id] : 0;
                                        ?>
                                            <div class="swiper-slide">
                                                <div class="destination-card2 five">
                                                    <?php if (has_post_thumbnail()): ?>
                                                        <a href="<?php the_permalink(); ?>" class="destination-img">
                                                            <?php the_post_thumbnail(); ?>
                                                        </a>
                                                    <?php endif; ?>
                                                    <div class="destination-content">
                                                        <h5><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h5>
                                                        <span><?php echo !empty($tour_count) ? esc_html__('Tours', 'gofly-core') . sprintf(' (%02d)', $tour_count) : esc_html__('Tours not found', 'gofly-core'); ?></span>
                                                    </div>
                                                </div>
                                            </div>
                                        <?php
                                        endwhile;
                                        wp_reset_postdata();
                                        ?>
                                    </div>
                                </div>
                                <div class="slider-btn-grp">
                                    <div class="slider-btn destination-slider-prev">
                                        <svg width="14" height="14" viewBox="0 0 14 14" xmlns="http://www.w3.org/2000/svg">
                                            <g>
                                                <path
                                                    d="M11.002 13.0005C10.002 10.5005 5.00195 8.00049 2.00195 7.00049C5.00195 6.00049 9.50195 4.50049 11.002 1.00049"
                                                    stroke-width="1.5" stroke-linecap="round"></path>
                                            </g>
                                        </svg>
                                    </div>
                                    <div class="slider-btn destination-slider-next">
                                        <svg width="14" height="14" viewBox="0 0 14 14" xmlns="http://www.w3.org/2000/svg">
                                            <g>
                                                <path
                                                    d="M2.99805 13.0005C3.99805 10.5005 8.99805 8.00049 11.998 7.00049C8.99805 6.00049 4.49805 4.50049 2.99805 1.00049"
                                                    stroke-width="1.5" stroke-linecap="round"></path>
                                            </g>
                                        </svg>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        <?php endif; ?>

<?php

    }
}

Plugin::instance()->widgets_manager->register(new Gofly_Destination_Slider_Widget());
