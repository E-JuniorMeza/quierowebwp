<?php

namespace Elementor;

if (!defined('ABSPATH')) exit;  // Exit if accessed directly

use Elementor\core\Schemes;
use Egns_Core\Egns_Helper;

class Gofly_Blog_Widget extends Widget_Base
{

    public function get_name()
    {
        return 'gofly_blogs';
    }

    public function get_title()
    {
        return esc_html__('EG Blog', 'gofly-core');
    }

    public function get_icon()
    {
        return 'egns-widget-icon';
    }

    public function get_categories()
    {
        return ['gofly_widgets'];
    }

    protected function register_controls()
    {

        //=====================General=======================//

        $this->start_controls_section(
            'gofly_blog_genaral',
            [
                'label' => esc_html__('General', 'gofly-core')
            ]
        );

        $this->add_control(
            'gofly_blog_general_style_selection',
            [
                'label'   => esc_html__('Select Style', 'gofly-core'),
                'type'    => Controls_Manager::SELECT,
                'options' => [
                    'style_one'   => esc_html__('Style One', 'gofly-core'),
                    'style_two'   => esc_html__('Style Two', 'gofly-core'),
                    'style_three' => esc_html__('Style Three', 'gofly-core'),
                    'style_four'  => esc_html__('Style Four', 'gofly-core'),
                    'style_five'  => esc_html__('Style Five', 'gofly-core'),
                    'style_six'   => esc_html__('Style Six', 'gofly-core'),
                    'style_seven' => esc_html__('Style Seven', 'gofly-core'),
                    'style_eight' => esc_html__('Style Eight', 'gofly-core'),
                    'style_nine'  => esc_html__('Style Nine', 'gofly-core'),
                ],
                'default' => 'style_one',
            ]
        );

        $this->add_control(
            'gofly_blog_general_header_switcher',
            [
                'label'        => esc_html__("Show Header Area?", 'gofly-core'),
                'type'         => \Elementor\Controls_Manager::SWITCHER,
                'label_on'     => esc_html__('Enable', 'gofly-core'),
                'label_off'    => esc_html__('Disable', 'gofly-core'),
                'return_value' => 'yes',
                'default'      => 'yes',
            ]
        );

        $this->add_control(
            'gofly_blog_general_title',
            [
                'label'       => esc_html__('Title', 'gofly-core'),
                'type'        => \Elementor\Controls_Manager::TEXT,
                'default'     => wp_kses('Travel Inspirations', wp_kses_allowed_html('post')),
                'placeholder' => esc_html__('write your title here', 'gofly-core'),
                'label_block' => true,
                'condition'   => [
                    'gofly_blog_general_header_switcher' => ['yes'],
                ]
            ]
        );

        $this->add_control(
            'gofly_blog_genaral_desc',
            [
                'label'       => esc_html__('Description', 'gofly-core'),
                'type'        => \Elementor\Controls_Manager::TEXT,
                'default'     => wp_kses('A curated list of inspiration the most tour & travel based on different destinations.', wp_kses_allowed_html('post')),
                'placeholder' => esc_html__('write your title here', 'gofly-core'),
                'label_block' => true,
                'condition'   => [
                    'gofly_blog_general_header_switcher' => ['yes'],
                ]
            ]
        );

        $this->add_control(
            'gofly_blog_genaral_show_pagination_switcher',
            [
                'label'        => esc_html__("Show Pagination?", 'gofly-core'),
                'type'         => \Elementor\Controls_Manager::SWITCHER,
                'label_on'     => esc_html__('Enable', 'gofly-core'),
                'label_off'    => esc_html__('Disable', 'gofly-core'),
                'return_value' => 'yes',
                'default'      => 'yes',
                'condition'    => [
                    'gofly_blog_general_style_selection' => ['style_one', 'style_three', 'style_four', 'style_five', 'style_six', 'style_seven'],
                ]
            ]
        );

        $this->add_control(
            'gofly_blog_genaral_vector_image',
            [
                'label'   => esc_html__('Image', 'gofly-core'),
                'type'    => \Elementor\Controls_Manager::MEDIA,
                'default' => [
                    'url' => \Elementor\Utils::get_placeholder_image_src(),
                ],
                'media_types' => ['svg'],
                'condition'   => [
                    'gofly_blog_general_style_selection' => ['style_five', 'style_eight'],
                ]
            ]
        );

        $repeater = new \Elementor\Repeater();

        $repeater->add_control(
            'gofly_blog_seven_genaral_vector_images',
            [
                'label'   => esc_html__('Images', 'gofly-core'),
                'type'    => \Elementor\Controls_Manager::MEDIA,
                'default' => [
                    'url' => \Elementor\Utils::get_placeholder_image_src(),
                ],
                'media_types' => ['svg', 'jpg', 'png'],
            ]
        );

        $this->add_control(
            'gofly_blog_seven_image_list',
            [
                'label'     => esc_html__('Image', 'gofly-core'),
                'type'      => \Elementor\Controls_Manager::REPEATER,
                'fields'    => $repeater->get_controls(),
                'condition' => [
                    'gofly_blog_general_style_selection' => ['style_seven'],
                ]
            ]
        );

        $this->add_control(
            'gofly_blog_genaral_query_area',
            [
                'label'     => esc_html__('Query Area', 'gofly-core'),
                'type'      => \Elementor\Controls_Manager::HEADING,
                'separator' => 'after',
            ]
        );

        $this->add_control(
            'gofly_blog_genaral_query_post_per_page',
            [
                'label'       => esc_html__('Posts Per Page', 'gofly-core'),
                'type'        => Controls_Manager::NUMBER,
                'default'     => 6,
                'label_block' => false,
            ]
        );

        $this->add_control(
            'gofly_blog_post_list',
            [
                'label'       => __('Post Lists', 'gofly-core'),
                'type'        => \Elementor\Controls_Manager::SELECT2,
                'label_block' => true,
                'multiple'    => true,
                'options'     => \Egns_Core\Egns_Helper::get_blog_post_options(),
            ]
        );

        $this->add_control(
            'gofly_selected_categories',
            [
                'label'       => __('Categories', 'gofly-core'),
                'type'        => \Elementor\Controls_Manager::SELECT2,
                'label_block' => true,
                'multiple'    => true,
                'options'     => \Egns_Core\Egns_Helper::get_blog_categories(),
                'condition'   => [
                    'gofly_blog_general_style_selection' => ['style_six'],
                ]
            ]
        );

        $this->add_control(
            'gofly_selected_locations',
            [
                'label'       => __('Locations', 'gofly-core'),
                'type'        => \Elementor\Controls_Manager::SELECT2,
                'label_block' => true,
                'multiple'    => true,
                'options'     => \Egns_Core\Egns_Helper::get_post_location_options(),
                'condition'   => [
                    'gofly_blog_general_style_selection' => ['style_one', 'style_two', 'style_three', 'style_four', 'style_five'],
                ]
            ]
        );

        $this->add_control(
            'gofly_blog_genaral_query_orderby',
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
            'gofly_blog_genaral_query_template_order',
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
            'gofly_blog_genaral_button_text',
            [
                'label'       => esc_html__('Button Text', 'gofly-core'),
                'type'        => \Elementor\Controls_Manager::TEXT,
                'default'     => esc_html__('View All Inspiration', 'gofly-core'),
                'placeholder' => esc_html__('write your button text here', 'gofly-core'),
                'label_block' => true,
                'condition'   => [
                    'gofly_blog_general_header_switcher' => ['yes'],
                    'gofly_blog_general_style_selection' => ['style_one', 'style_two', 'style_three', 'style_four', 'style_six', 'style_eight'],
                ]
            ]
        );

        $this->add_control(
            'gofly_blog_genaral_button_text_url',
            [
                'label'   => esc_html__('Button URL/Link', 'gofly-core'),
                'type'    => \Elementor\Controls_Manager::URL,
                'options' => ['url', 'is_external', 'nofollow'],
                'default' => [
                    'url'         => '#',
                    'is_external' => true,
                    'nofollow'    => true,
                ],
                'label_block' => true,
                'condition'   => [
                    'gofly_blog_general_header_switcher' => ['yes'],
                    'gofly_blog_general_style_selection' => ['style_one', 'style_two', 'style_three', 'style_four', 'style_six', 'style_eight'],
                ]
            ]
        );

        $this->end_controls_section();

        //============Style One Start=============//

        $this->start_controls_section(
            'gofly_blog_styles_one_genaral',
            [
                'label'     => esc_html__('Styles', 'gofly-core'),
                'tab'       => Controls_Manager::TAB_STYLE,
                'condition' => [
                    'gofly_blog_general_style_selection' => ['style_one'],
                ]
            ]
        );

        $this->add_control(
            'gofly_blog_style_genaral_header_title',
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
                'name'     => 'gofly_blog_style_genaral_header_title_typ',
                'selector' => '{{WRAPPER}} .home1-blog-section .section-title h2',

            ]
        );

        $this->add_control(
            'gofly_blog_style_genaral_header_title_color',
            [
                'label'     => esc_html__('Color', 'gofly-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .home1-blog-section .section-title h2' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'gofly_blog_style_genaral_desc',
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
                'name'     => 'gofly_blog_style_genaral_desc_typ',
                'selector' => '{{WRAPPER}} .home1-blog-section .section-title p',

            ]
        );

        $this->add_control(
            'gofly_blog_style_genaral_desc_color',
            [
                'label'     => esc_html__('Color', 'gofly-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .home1-blog-section .section-title p' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'gofly_blog_posts_card_style',
            [
                'label'     => esc_html__('Post Card', 'gofly-core'),
                'type'      => \Elementor\Controls_Manager::HEADING,
                'separator' => 'after',
            ]
        );

        $this->add_control(
            'gofly_blog_style_post_card_bg_color',
            [
                'label'     => esc_html__('Background Color', 'gofly-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .home1-blog-section .blog-card' => 'background-color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'gofly_blog_style_post_card_border_color',
            [
                'label'     => esc_html__('Border Color', 'gofly-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .home1-blog-section .blog-card' => 'border-color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'gofly_blog_posts_title_style',
            [
                'label'     => esc_html__('Post Title', 'gofly-core'),
                'type'      => \Elementor\Controls_Manager::HEADING,
                'separator' => 'after',
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'label'    => esc_html__('Typography', 'gofly-core'),
                'name'     => 'gofly_blog_style_post_title_typ',
                'selector' => '{{WRAPPER}} .home1-blog-section .blog-card .blog-content .blog-content-top h4 a',

            ]
        );

        $this->add_control(
            'gofly_blog_style_post_title_color',
            [
                'label'     => esc_html__('Color', 'gofly-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .home1-blog-section .blog-card .blog-content .blog-content-top h4 a' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'gofly_blog_posts_desc_style',
            [
                'label'     => esc_html__('Post Description', 'gofly-core'),
                'type'      => \Elementor\Controls_Manager::HEADING,
                'separator' => 'after',
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'label'    => esc_html__('Typography', 'gofly-core'),
                'name'     => 'gofly_blog_style_post_desc_typ',
                'selector' => '{{WRAPPER}} .home1-blog-section .blog-card .blog-content p',

            ]
        );

        $this->add_control(
            'gofly_blog_style_post_desc_color',
            [
                'label'     => esc_html__('Color', 'gofly-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .home1-blog-section .blog-card .blog-content p' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'gofly_blog_posts_taxonomy_style',
            [
                'label'     => esc_html__('Post Location', 'gofly-core'),
                'type'      => \Elementor\Controls_Manager::HEADING,
                'separator' => 'after',
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'label'    => esc_html__('Typography', 'gofly-core'),
                'name'     => 'gofly_blog_style_post_djjiesc_typ',
                'selector' => '{{WRAPPER}} .home1-blog-section .blog-card .blog-content .blog-content-top .location-link',

            ]
        );

        $this->add_control(
            'gofly_blog_style_post_taxonomy_color',
            [
                'label'     => esc_html__('Color', 'gofly-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .home1-blog-section .blog-card .blog-content .blog-content-top .location-link' => 'color: {{VALUE}};',
                    '{{WRAPPER}} .home1-blog-section .blog-card .blog-content .blog-content-top span'           => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'gofly_blog_style_post_taxonomy_icon_color',
            [
                'label'     => esc_html__('Icon Color', 'gofly-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .home1-blog-section .blog-card .blog-content .blog-content-top .location svg' => 'fill: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'gofly_blog_posts_info_style',
            [
                'label'     => esc_html__('Post Date', 'gofly-core'),
                'type'      => \Elementor\Controls_Manager::HEADING,
                'separator' => 'after',
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'label'    => esc_html__('Typography', 'gofly-core'),
                'name'     => 'gofly_blog_style_post_info_typ',
                'selector' => '{{WRAPPER}} .home1-blog-section .blog-card .blog-content .blog-content-top .blog-date',
            ]
        );

        $this->add_control(
            'gofly_blog_style_post_info_color',
            [
                'label'     => esc_html__('Color', 'gofly-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .home1-blog-section .blog-card .blog-content .blog-content-top .blog-date' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'gofly_blog_style_post_info_icon_color',
            [
                'label'     => esc_html__('Icon Color', 'gofly-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .home1-blog-section .blog-card .blog-content .blog-content-top .blog-date svg' => 'fill: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'gofly_blog_style_post_content_divider_color',
            [
                'label'     => esc_html__('Divider Color', 'gofly-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .home1-blog-section .blog-card .blog-content svg.divider' => 'fill: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'gofly_blog_posts_general_button_style',
            [
                'label'     => esc_html__('Bottom Button', 'gofly-core'),
                'type'      => \Elementor\Controls_Manager::HEADING,
                'separator' => 'after',
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'label'    => esc_html__('Typography', 'gofly-core'),
                'name'     => 'gofly_blog_style_post_general_button_typ',
                'selector' => '{{WRAPPER}} .home1-blog-section .primary-btn1 > span',
            ]
        );

        $this->add_control(
            'gofly_blog_style_post_general_button_color',
            [
                'label'     => esc_html__('Color', 'gofly-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .home1-blog-section .primary-btn1 > span' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'gofly_blog_style_post_general_button_hover_color',
            [
                'label'     => esc_html__('Hover Color', 'gofly-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .home1-blog-section .primary-btn1:hover > span' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'gofly_blog_style_post_general_button_bg_color',
            [
                'label'     => esc_html__('Button Background Color', 'gofly-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .home1-blog-section .primary-btn1.transparent' => 'background-color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'gofly_blog_style_post_general_button_hover_bg_color',
            [
                'label'     => esc_html__('Button Hover BG Color', 'gofly-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .home1-blog-section .primary-btn1.transparent::after' => 'background-color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'gofly_blog_style_post_general_button_icon_color',
            [
                'label'     => esc_html__('Icon Color', 'gofly-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .home1-blog-section .primary-btn1.transparent span svg' => 'fill: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'gofly_blog_style_post_general_button_hover_icon_color',
            [
                'label'     => esc_html__('Hover Icon Color', 'gofly-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .home1-blog-section .primary-btn1.transparent span:last-child svg' => 'fill: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'gofly_blog_style_post_general_button_border_color',
            [
                'label'     => esc_html__('Button Border Color', 'gofly-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .home1-blog-section .primary-btn1' => 'border-color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'gofly_blog_style_post_general_button_hover_border_color',
            [
                'label'     => esc_html__('Button Hover Border Color', 'gofly-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .home1-blog-section .primary-btn1:hover' => 'border-color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'gofly_blog_posts_general_navigation_style',
            [
                'label'     => esc_html__('Navigation', 'gofly-core'),
                'type'      => \Elementor\Controls_Manager::HEADING,
                'separator' => 'after',
            ]
        );

        $this->add_control(
            'gofly_blog_style_post_general_navigation_bg_color',
            [
                'label'     => esc_html__('Background Color', 'gofly-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .home1-blog-section .slider-btn-grp .slider-btn' => 'background-color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'gofly_blog_style_post_general_navigation_hover_bg_color',
            [
                'label'     => esc_html__('Hover BG Color', 'gofly-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .home1-blog-section .slider-btn-grp .slider-btn:hover' => 'background-color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'gofly_blog_style_post_general_navigation_border_color',
            [
                'label'     => esc_html__('Border Color', 'gofly-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .home1-blog-section .slider-btn-grp .slider-btn' => 'border-color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'gofly_blog_style_post_general_navigation_hover_border_color',
            [
                'label'     => esc_html__('Hover Border Color', 'gofly-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .home1-blog-section .slider-btn-grp .slider-btn:hover' => 'border-color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'gofly_blog_style_post_general_navigation_icon_color',
            [
                'label'     => esc_html__('Icon Color', 'gofly-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .home1-blog-section .slider-btn-grp .slider-btn svg' => 'stroke: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'gofly_blog_style_post_general_navigation_hover_icon_color',
            [
                'label'     => esc_html__('Hover Icon Color', 'gofly-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .home1-blog-section .slider-btn-grp .slider-btn:hover svg' => 'stroke: {{VALUE}};',
                ],
            ]
        );

        $this->end_controls_section();

        //============Style One End=============//

        //============Style Two Start=============//

        $this->start_controls_section(
            'gofly_blog_styles_two_general',
            [
                'label'     => esc_html__('Styles', 'gofly-core'),
                'tab'       => Controls_Manager::TAB_STYLE,
                'condition' => [
                    'gofly_blog_general_style_selection' => ['style_two'],
                ]
            ]
        );

        $this->add_control(
            'gofly_blog_style_two_general_header_title',
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
                'name'     => 'gofly_blog_style_two_genaral_header_title_typ',
                'selector' => '{{WRAPPER}} .home2-blog-section .section-title h2',

            ]
        );

        $this->add_control(
            'gofly_blog_style_two_genaral_header_title_color',
            [
                'label'     => esc_html__('Color', 'gofly-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .home2-blog-section .section-title h2' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'gofly_blog_style_two_genaral_desc',
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
                'name'     => 'gofly_blog_style_two_genaral_desc_typ',
                'selector' => '{{WRAPPER}} .home2-blog-section .section-title p',

            ]
        );

        $this->add_control(
            'gofly_blog_style_two_genaral_desc_color',
            [
                'label'     => esc_html__('Color', 'gofly-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .home2-blog-section .section-title p' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'gofly_blog_posts_card_two_style',
            [
                'label'     => esc_html__('Post Card', 'gofly-core'),
                'type'      => \Elementor\Controls_Manager::HEADING,
                'separator' => 'after',
            ]
        );

        $this->add_control(
            'gofly_blog_style_post_card_two_bg_color',
            [
                'label'     => esc_html__('Background Color', 'gofly-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .home2-blog-section .blog-card2' => 'background-color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'gofly_blog_style_post_card_two_border_color',
            [
                'label'     => esc_html__('Border Color', 'gofly-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .home2-blog-section .blog-card2' => 'border-color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'gofly_blog_two_posts_title_style',
            [
                'label'     => esc_html__('Post Title', 'gofly-core'),
                'type'      => \Elementor\Controls_Manager::HEADING,
                'separator' => 'after',
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'label'    => esc_html__('Typography', 'gofly-core'),
                'name'     => 'gofly_blog_two_style_post_title_typ',
                'selector' => '{{WRAPPER}} .home2-blog-section .blog-card2 .blog-content h4 a',

            ]
        );

        $this->add_control(
            'gofly_blog_two_style_post_title_color',
            [
                'label'     => esc_html__('Color', 'gofly-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .home2-blog-section .blog-card2 .blog-content h4 a' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'gofly_blog_two_posts_taxonomy_style',
            [
                'label'     => esc_html__('Post Location', 'gofly-core'),
                'type'      => \Elementor\Controls_Manager::HEADING,
                'separator' => 'after',
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'label'    => esc_html__('Typography', 'gofly-core'),
                'name'     => 'gofly_blog_two_style_post_taxonomy_typ',
                'selector' => '{{WRAPPER}} .home2-blog-section .blog-card2 .location-link',

            ]
        );

        $this->add_control(
            'gofly_blog_two_style_post_taxonomy_color',
            [
                'label'     => esc_html__('Color', 'gofly-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .home2-blog-section .blog-card2 .location-link' => 'color: {{VALUE}};',
                    '{{WRAPPER}} .home2-blog-section .blog-card2 .location'      => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'gofly_blog_two_style_post_taxonomy_icon_color',
            [
                'label'     => esc_html__('Icon Color', 'gofly-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .home2-blog-section .blog-card2 .location svg' => 'fill: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'gofly_blog_two_style_post_taxonomy_bg_color',
            [
                'label'     => esc_html__('Background Color', 'gofly-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .home2-blog-section .blog-card2 .location' => 'background-color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'gofly_blog_two_posts_info_style',
            [
                'label'     => esc_html__('Post Date', 'gofly-core'),
                'type'      => \Elementor\Controls_Manager::HEADING,
                'separator' => 'after',
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'label'    => esc_html__('Typography', 'gofly-core'),
                'name'     => 'gofly_blog_two_style_post_info_typ',
                'selector' => '{{WRAPPER}} .home2-blog-section .blog-card2 .blog-date',
            ]
        );

        $this->add_control(
            'gofly_blog_two_style_post_info_color',
            [
                'label'     => esc_html__('Color', 'gofly-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .home2-blog-section .blog-card2 .blog-date' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'gofly_blog_two_style_post_info_border_color',
            [
                'label'     => esc_html__('Border Color', 'gofly-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .home2-blog-section .blog-card2 .blog-date' => 'border-color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'gofly_blog_two_style_post_info_bg_color',
            [
                'label'     => esc_html__('Background Color', 'gofly-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .home2-blog-section .blog-card2 .blog-date' => 'background-color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'gofly_blog_two_posts_general_button_style',
            [
                'label'     => esc_html__('Bottom Button', 'gofly-core'),
                'type'      => \Elementor\Controls_Manager::HEADING,
                'separator' => 'after',
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'label'    => esc_html__('Typography', 'gofly-core'),
                'name'     => 'gofly_blog_two_style_post_general_button_typ',
                'selector' => '{{WRAPPER}} .home2-blog-section .primary-btn1 > span',
            ]
        );

        $this->add_control(
            'gofly_blog_two_style_post_general_button_color',
            [
                'label'     => esc_html__('Color', 'gofly-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .home2-blog-section .primary-btn1 > span' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'gofly_blog_two_style_post_general_button_hover_color',
            [
                'label'     => esc_html__('Hover Color', 'gofly-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .home2-blog-section .primary-btn1:hover > span' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'gofly_blog_two_style_post_general_button_bg_color',
            [
                'label'     => esc_html__('Button Background Color', 'gofly-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .home2-blog-section .primary-btn1.transparent' => 'background-color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'gofly_blog_two_style_post_general_button_hover_bg_color',
            [
                'label'     => esc_html__('Button Hover BG Color', 'gofly-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .home2-blog-section .primary-btn1.transparent::after' => 'background-color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'gofly_blog_two_style_post_general_button_border_color',
            [
                'label'     => esc_html__('Button Border Color', 'gofly-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .home2-blog-section .primary-btn1.transparent' => 'border-color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'gofly_blog_two_style_post_general_button_hover_border_color',
            [
                'label'     => esc_html__('Button Hover Border Color', 'gofly-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .home2-blog-section .primary-btn1.transparent:hover' => 'border-color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'gofly_blog_two_style_post_general_button_icon_color',
            [
                'label'     => esc_html__('Icon Color', 'gofly-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .home2-blog-section .primary-btn1.transparent span svg' => 'fill: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'gofly_blog_two_style_post_general_button_hover_icon_color',
            [
                'label'     => esc_html__('Hover Icon Color', 'gofly-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .home2-blog-section .primary-btn1.transparent span:last-child svg' => 'fill: {{VALUE}};',
                ],
            ]
        );

        $this->end_controls_section();

        //============Style Three and Four Start=============//

        $this->start_controls_section(
            'gofly_blog_styles_three_general',
            [
                'label'     => esc_html__('Styles', 'gofly-core'),
                'tab'       => Controls_Manager::TAB_STYLE,
                'condition' => [
                    'gofly_blog_general_style_selection' => ['style_three', 'style_four'],
                ]
            ]
        );

        $this->add_control(
            'gofly_blog_style_three_general_header_title',
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
                'name'     => 'gofly_blog_style_three_genaral_header_title_typ',
                'selector' => '{{WRAPPER}} .home3-blog-section .section-title h2',

            ]
        );

        $this->add_control(
            'gofly_blog_style_three_genaral_header_title_color',
            [
                'label'     => esc_html__('Color', 'gofly-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .home3-blog-section .section-title h2' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'gofly_blog_style_three_genaral_desc',
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
                'name'     => 'gofly_blog_style_three_genaral_desc_typ',
                'selector' => '{{WRAPPER}} .home3-blog-section .section-title p',

            ]
        );

        $this->add_control(
            'gofly_blog_style_three_genaral_desc_color',
            [
                'label'     => esc_html__('Color', 'gofly-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .home3-blog-section .section-title p' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'gofly_blog_posts_card_three_style',
            [
                'label'     => esc_html__('Post Card', 'gofly-core'),
                'type'      => \Elementor\Controls_Manager::HEADING,
                'separator' => 'after',
            ]
        );

        $this->add_control(
            'gofly_blog_style_post_card_three_bg_color',
            [
                'label'     => esc_html__('Background Color', 'gofly-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .home3-blog-section .blog-card2.two' => 'background-color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'gofly_blog_style_post_card_three_border_color',
            [
                'label'     => esc_html__('Border Color', 'gofly-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .home3-blog-section .blog-card2.two' => 'border-color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'gofly_blog_three_posts_title_style',
            [
                'label'     => esc_html__('Post Title', 'gofly-core'),
                'type'      => \Elementor\Controls_Manager::HEADING,
                'separator' => 'after',
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'label'    => esc_html__('Typography', 'gofly-core'),
                'name'     => 'gofly_blog_three_style_post_title_typ',
                'selector' => '{{WRAPPER}} .home3-blog-section .blog-card2.two .blog-content h4 a',

            ]
        );

        $this->add_control(
            'gofly_blog_three_style_post_title_color',
            [
                'label'     => esc_html__('Color', 'gofly-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .home3-blog-section .blog-card2.two .blog-content h4 a' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'gofly_blog_three_posts_desc_style',
            [
                'label'     => esc_html__('Post Description', 'gofly-core'),
                'type'      => \Elementor\Controls_Manager::HEADING,
                'separator' => 'after',
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'label'    => esc_html__('Typography', 'gofly-core'),
                'name'     => 'gofly_blog_three_style_post_desc_typ',
                'selector' => '{{WRAPPER}} .home3-blog-section .blog-card2 .blog-content p',

            ]
        );

        $this->add_control(
            'gofly_blog_three_style_post_desc_color',
            [
                'label'     => esc_html__('Color', 'gofly-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .home3-blog-section .blog-card2 .blog-content p' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'gofly_blog_three_posts_taxonomy_style',
            [
                'label'     => esc_html__('Post Location', 'gofly-core'),
                'type'      => \Elementor\Controls_Manager::HEADING,
                'separator' => 'after',
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'label'    => esc_html__('Typography', 'gofly-core'),
                'name'     => 'gofly_blog_three_style_post_taxonomy_typ',
                'selector' => '{{WRAPPER}} .home3-blog-section .blog-card2.two .location-link',

            ]
        );

        $this->add_control(
            'gofly_blog_three_style_post_taxonomy_color',
            [
                'label'     => esc_html__('Color', 'gofly-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .home3-blog-section .blog-card2.two .location-link' => 'color: {{VALUE}};',
                    '{{WRAPPER}} .home3-blog-section .blog-card2.two .location'      => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'gofly_blog_three_style_post_taxonomy_icon_color',
            [
                'label'     => esc_html__('Icon Color', 'gofly-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .home3-blog-section .blog-card2.two .location svg' => 'fill: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'gofly_blog_three_style_post_taxonomy_bg_color',
            [
                'label'     => esc_html__('Background Color', 'gofly-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .home3-blog-section .blog-card2.two .location' => 'background-color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'gofly_blog_three_posts_info_style',
            [
                'label'     => esc_html__('Post Date', 'gofly-core'),
                'type'      => \Elementor\Controls_Manager::HEADING,
                'separator' => 'after',
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'label'    => esc_html__('Typography', 'gofly-core'),
                'name'     => 'gofly_blog_three_style_post_info_typ',
                'selector' => '{{WRAPPER}} .home3-blog-section .blog-card2.two .blog-content .blog-date',
            ]
        );

        $this->add_control(
            'gofly_blog_three_style_post_info_color',
            [
                'label'     => esc_html__('Color', 'gofly-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .home3-blog-section .blog-card2.two .blog-content .blog-date' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'gofly_blog_three_style_post_info_border_color',
            [
                'label'     => esc_html__('Border Color', 'gofly-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .home3-blog-section .blog-card2.two .blog-content .blog-date' => 'border-color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'gofly_blog_three_style_post_info_bg_color',
            [
                'label'     => esc_html__('Background Color', 'gofly-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .home3-blog-section .blog-card2.two .blog-content .blog-date' => 'background-color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'gofly_blog_three_posts_general_button_style',
            [
                'label'     => esc_html__('Bottom Button', 'gofly-core'),
                'type'      => \Elementor\Controls_Manager::HEADING,
                'separator' => 'after',
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'label'    => esc_html__('Typography', 'gofly-core'),
                'name'     => 'gofly_blog_three_style_post_general_button_typ',
                'selector' => '{{WRAPPER}} .home3-blog-section .primary-btn1 > span',
            ]
        );

        $this->add_control(
            'gofly_blog_three_style_post_general_button_color',
            [
                'label'     => esc_html__('Color', 'gofly-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .home3-blog-section .primary-btn1 > span' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'gofly_blog_three_style_post_general_button_hover_color',
            [
                'label'     => esc_html__('Hover Color', 'gofly-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .home3-blog-section .primary-btn1:hover > span' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'gofly_blog_three_style_post_general_button_bg_color',
            [
                'label'     => esc_html__('Button Background Color', 'gofly-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .home3-blog-section .primary-btn1.black-bg' => 'background-color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'gofly_blog_three_style_post_general_button_hover_bg_color',
            [
                'label'     => esc_html__('Button Hover BG Color', 'gofly-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .home3-blog-section .primary-btn1.black-bg::after' => 'background-color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'gofly_blog_three_style_post_general_button_border_color',
            [
                'label'     => esc_html__('Button Border Color', 'gofly-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .home4-blog-section .primary-btn1.transparent' => 'border-color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'gofly_blog_three_style_post_general_button_hover_border_color',
            [
                'label'     => esc_html__('Button Hover Border Color', 'gofly-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .home4-blog-section .primary-btn1.transparent:hover' => 'border-color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'gofly_blog_three_style_post_general_button_icon_color',
            [
                'label'     => esc_html__('Icon Color', 'gofly-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .home3-blog-section .primary-btn1.black-bg span svg' => 'fill: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'gofly_blog_three_style_post_general_button_hover_icon_color',
            [
                'label'     => esc_html__('Hover Icon Color', 'gofly-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .home3-blog-section .primary-btn1.black-bg span:last-child svg' => 'fill: {{VALUE}};',
                ],
            ]
        );

        $this->end_controls_section();

        //============Style Three and Four End=============//

        //============Style Five Start=============//

        $this->start_controls_section(
            'gofly_blog_styles_five_general',
            [
                'label'     => esc_html__('Styles', 'gofly-core'),
                'tab'       => Controls_Manager::TAB_STYLE,
                'condition' => [
                    'gofly_blog_general_style_selection' => ['style_five'],
                ]
            ]
        );

        $this->add_control(
            'gofly_blog_style_five_general_header_title',
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
                'name'     => 'gofly_blog_style_five_genaral_header_title_typ',
                'selector' => '{{WRAPPER}} .home5-blog-section .section-title h2',

            ]
        );

        $this->add_control(
            'gofly_blog_style_five_genaral_header_title_color',
            [
                'label'     => esc_html__('Color', 'gofly-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .home5-blog-section .section-title h2' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'gofly_blog_style_five_genaral_desc',
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
                'name'     => 'gofly_blog_style_five_genaral_desc_typ',
                'selector' => '{{WRAPPER}} .home5-blog-section .section-title p',

            ]
        );

        $this->add_control(
            'gofly_blog_style_five_genaral_desc_color',
            [
                'label'     => esc_html__('Color', 'gofly-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .home5-blog-section .section-title p' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'gofly_blog_posts_card_five_style',
            [
                'label'     => esc_html__('Post Card', 'gofly-core'),
                'type'      => \Elementor\Controls_Manager::HEADING,
                'separator' => 'after',
            ]
        );

        $this->add_control(
            'gofly_blog_style_post_card_five_bg_color',
            [
                'label'     => esc_html__('Background Color', 'gofly-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .home5-blog-section .blog-card' => 'background-color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'gofly_blog_style_post_card_five_border_color',
            [
                'label'     => esc_html__('Border Color', 'gofly-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .home5-blog-section .blog-card' => 'border-color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'gofly_blog_five_posts_title_style',
            [
                'label'     => esc_html__('Post Title', 'gofly-core'),
                'type'      => \Elementor\Controls_Manager::HEADING,
                'separator' => 'after',
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'label'    => esc_html__('Typography', 'gofly-core'),
                'name'     => 'gofly_blog_five_style_post_title_typ',
                'selector' => '{{WRAPPER}} .home5-blog-section .blog-card .blog-content h4 a',

            ]
        );

        $this->add_control(
            'gofly_blog_five_style_post_title_color',
            [
                'label'     => esc_html__('Color', 'gofly-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .home5-blog-section .blog-card .blog-content h4 a' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'gofly_blog_five_posts_desc_style',
            [
                'label'     => esc_html__('Post Description', 'gofly-core'),
                'type'      => \Elementor\Controls_Manager::HEADING,
                'separator' => 'after',
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'label'    => esc_html__('Typography', 'gofly-core'),
                'name'     => 'gofly_blog_five_style_post_desc_typ',
                'selector' => '{{WRAPPER}} .home5-blog-section .blog-card .blog-content p',

            ]
        );

        $this->add_control(
            'gofly_blog_five_style_post_desc_color',
            [
                'label'     => esc_html__('Color', 'gofly-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .home5-blog-section .blog-card .blog-content p' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'gofly_blog_five_posts_taxonomy_style',
            [
                'label'     => esc_html__('Post Location', 'gofly-core'),
                'type'      => \Elementor\Controls_Manager::HEADING,
                'separator' => 'after',
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'label'    => esc_html__('Typography', 'gofly-core'),
                'name'     => 'gofly_blog_five_style_post_taxonomy_typ',
                'selector' => '{{WRAPPER}} .blog-card .blog-content .blog-content-top .location-link',

            ]
        );

        $this->add_control(
            'gofly_blog_five_style_post_taxonomy_color',
            [
                'label'     => esc_html__('Color', 'gofly-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .home5-blog-section .blog-card .blog-content .blog-content-top .location-link' => 'color: {{VALUE}};',
                    '{{WRAPPER}} .home5-blog-section .blog-card .blog-content .blog-content-top .location'      => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'gofly_blog_five_style_post_taxonomy_icon_color',
            [
                'label'     => esc_html__('Icon Color', 'gofly-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .home5-blog-section .blog-card .location svg' => 'fill: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'gofly_blog_five_posts_info_style',
            [
                'label'     => esc_html__('Post Date', 'gofly-core'),
                'type'      => \Elementor\Controls_Manager::HEADING,
                'separator' => 'after',
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'label'    => esc_html__('Typography', 'gofly-core'),
                'name'     => 'gofly_blog_five_style_post_info_typ',
                'selector' => '{{WRAPPER}} .home5-blog-section .blog-card .blog-content .blog-date',
            ]
        );

        $this->add_control(
            'gofly_blog_five_style_post_info_color',
            [
                'label'     => esc_html__('Color', 'gofly-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .home5-blog-section .blog-card .blog-content .blog-date' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'gofly_blog_five_style_post_info_icon_color',
            [
                'label'     => esc_html__('Icon Color', 'gofly-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .home5-blog-section .blog-card .blog-content .blog-date svg' => 'fill: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'gofly_blog_five_style_post_info_separator_color',
            [
                'label'     => esc_html__('Separator Color', 'gofly-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .home5-blog-section .blog-card .blog-content svg' => 'fill: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'gofly_blog_five_posts_general_button_style',
            [
                'label'     => esc_html__('Bottom Button', 'gofly-core'),
                'type'      => \Elementor\Controls_Manager::HEADING,
                'separator' => 'after',
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'label'    => esc_html__('Typography', 'gofly-core'),
                'name'     => 'gofly_blog_five_style_post_general_button_typ',
                'selector' => '{{WRAPPER}} .home5-blog-section .primary-btn1 > span',
            ]
        );

        $this->add_control(
            'gofly_blog_five_style_post_general_button_color',
            [
                'label'     => esc_html__('Color', 'gofly-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .home5-blog-section .primary-btn1 > span' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'gofly_blog_five_style_post_general_button_hover_color',
            [
                'label'     => esc_html__('Hover Color', 'gofly-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .home5-blog-section .primary-btn1:hover > span' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'gofly_blog_five_style_post_general_button_bg_color',
            [
                'label'     => esc_html__('Button Background Color', 'gofly-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .home5-blog-section .primary-btn1.black-bg' => 'background-color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'gofly_blog_five_style_post_general_button_hover_bg_color',
            [
                'label'     => esc_html__('Button Hover BG Color', 'gofly-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .home5-blog-section .primary-btn1.black-bg::after' => 'background-color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'gofly_blog_five_style_post_general_button_border_color',
            [
                'label'     => esc_html__('Button Border Color', 'gofly-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .home4-blog-section .primary-btn1.transparent' => 'border-color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'gofly_blog_five_style_post_general_button_hover_border_color',
            [
                'label'     => esc_html__('Button Hover Border Color', 'gofly-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .home4-blog-section .primary-btn1.transparent:hover' => 'border-color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'gofly_blog_five_style_post_general_button_icon_color',
            [
                'label'     => esc_html__('Icon Color', 'gofly-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .home5-blog-section .primary-btn1.black-bg span svg' => 'fill: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'gofly_blog_five_style_post_general_button_hover_icon_color',
            [
                'label'     => esc_html__('Hover Icon Color', 'gofly-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .home5-blog-section .primary-btn1.black-bg span:last-child svg' => 'fill: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'gofly_blog_five_posts_general_pagination_style',
            [
                'label'     => esc_html__('Navigation', 'gofly-core'),
                'type'      => \Elementor\Controls_Manager::HEADING,
                'separator' => 'after',
            ]
        );

        $this->add_control(
            'gofly_blog_five_style_post_general_pagination_bg_color',
            [
                'label'     => esc_html__('Background Color', 'gofly-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .home5-blog-section .slider-btn-grp.two .slider-btn' => 'background-color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'gofly_blog_five_style_post_general_pagination_hover_bg_color',
            [
                'label'     => esc_html__('Hover BG Color', 'gofly-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .home5-blog-section .slider-btn-grp.two .slider-btn:hover' => 'background-color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'gofly_blog_five_style_post_general_pagination_border_color',
            [
                'label'     => esc_html__('Border Color', 'gofly-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .home5-blog-section .slider-btn-grp.two .slider-btn' => 'border-color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'gofly_blog_five_style_post_general_pagination_hover_border_color',
            [
                'label'     => esc_html__('Hover Border Color', 'gofly-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .home5-blog-section .slider-btn-grp.two .slider-btn:hover' => 'border-color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'gofly_blog_five_style_post_general_pagination_icon_color',
            [
                'label'     => esc_html__('Icon Color', 'gofly-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .home5-blog-section .slider-btn-grp.two .slider-btn svg' => 'fill: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'gofly_blog_five_style_post_general_pagination_hover_icon_color',
            [
                'label'     => esc_html__('Hover Icon Color', 'gofly-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .home5-blog-section .slider-btn-grp.two .slider-btn:hover svg' => 'fill: {{VALUE}};',
                ],
            ]
        );

        $this->end_controls_section();

        //============Style Five End=============//

        //============Style Six Start=============//

        $this->start_controls_section(
            'gofly_blog_styles_six_general',
            [
                'label'     => esc_html__('Styles', 'gofly-core'),
                'tab'       => Controls_Manager::TAB_STYLE,
                'condition' => [
                    'gofly_blog_general_style_selection' => ['style_six'],
                ]
            ]
        );

        $this->add_control(
            'gofly_blog_style_six_general_header_title',
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
                'name'     => 'gofly_blog_style_six_genaral_header_title_typ',
                'selector' => '{{WRAPPER}} .home6-blog-section .section-title h2',

            ]
        );

        $this->add_control(
            'gofly_blog_style_six_genaral_header_title_color',
            [
                'label'     => esc_html__('Color', 'gofly-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .home6-blog-section .section-title h2' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'gofly_blog_style_six_genaral_desc',
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
                'name'     => 'gofly_blog_style_six_genaral_desc_typ',
                'selector' => '{{WRAPPER}} .home6-blog-section .section-title p',

            ]
        );

        $this->add_control(
            'gofly_blog_style_six_genaral_desc_color',
            [
                'label'     => esc_html__('Color', 'gofly-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .home6-blog-section .section-title p' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'gofly_blog_posts_card_six_style',
            [
                'label'     => esc_html__('Post Card', 'gofly-core'),
                'type'      => \Elementor\Controls_Manager::HEADING,
                'separator' => 'after',
            ]
        );

        $this->add_control(
            'gofly_blog_style_post_card_six_bg_color',
            [
                'label'     => esc_html__('Background Color', 'gofly-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .home6-blog-section .blog-card2' => 'background-color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'gofly_blog_style_post_card_six_border_color',
            [
                'label'     => esc_html__('Border Color', 'gofly-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .home6-blog-section .blog-card2' => 'border-color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'gofly_blog_six_posts_title_style',
            [
                'label'     => esc_html__('Post Title', 'gofly-core'),
                'type'      => \Elementor\Controls_Manager::HEADING,
                'separator' => 'after',
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'label'    => esc_html__('Typography', 'gofly-core'),
                'name'     => 'gofly_blog_six_style_post_title_typ',
                'selector' => '{{WRAPPER}} .home6-blog-section .blog-card2 .blog-content h4 a',

            ]
        );

        $this->add_control(
            'gofly_blog_six_style_post_title_color',
            [
                'label'     => esc_html__('Color', 'gofly-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .home6-blog-section .blog-card2 .blog-content h4 a' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'gofly_blog_six_posts_taxonomy_style',
            [
                'label'     => esc_html__('Post Category', 'gofly-core'),
                'type'      => \Elementor\Controls_Manager::HEADING,
                'separator' => 'after',
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'label'     => esc_html__('Typography', 'gofly-core'),
                'name'      => 'gofly_blog_six_style_post_taxonomy_typ',
                'selectors' => [
                    '{{WRAPPER}} .home6-blog-section .blog-card2.three .blog-content .batch',
                ]

            ]
        );

        $this->add_control(
            'gofly_blog_six_style_post_taxonomy_color',
            [
                'label'     => esc_html__('Color', 'gofly-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .home6-blog-section .blog-card2.three .blog-content .batch' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'gofly_blog_six_style_post_taxonomy_hover_color',
            [
                'label'     => esc_html__('Hover Color', 'gofly-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .home6-blog-section .blog-card2.three .blog-content .batch:hover' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'gofly_blog_six_style_post_taxonomy_bg_color',
            [
                'label'     => esc_html__('Background Color', 'gofly-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .home6-blog-section .blog-card2.three .blog-content .batch' => 'background-color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'gofly_blog_six_style_post_taxonomy_hover_bg_color',
            [
                'label'     => esc_html__('Hover Background Color', 'gofly-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .home6-blog-section .blog-card2.three .blog-content .batch:hover' => 'background-color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'gofly_blog_six_posts_info_style',
            [
                'label'     => esc_html__('Post Date', 'gofly-core'),
                'type'      => \Elementor\Controls_Manager::HEADING,
                'separator' => 'after',
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'label'    => esc_html__('Typography', 'gofly-core'),
                'name'     => 'gofly_blog_six_style_post_info_typ',
                'selector' => '{{WRAPPER}} .home6-blog-section .blog-card2.three .blog-content .blog-meta li a',
            ]
        );

        $this->add_control(
            'gofly_blog_six_style_post_info_color',
            [
                'label'     => esc_html__('Color', 'gofly-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .home6-blog-section .blog-card2.three .blog-content .blog-meta li a' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'gofly_blog_six_style_post_info_hover_color',
            [
                'label'     => esc_html__('Hover Color', 'gofly-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .home6-blog-section .blog-card2.three .blog-content .blog-meta li a:hover' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'gofly_blog_six_style_post_info_separator_color',
            [
                'label'     => esc_html__('Separator Color', 'gofly-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .home6-blog-section .blog-card2.three .blog-content .blog-meta li::after' => 'background-color: {{VALUE}};',
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'label'    => esc_html__('Visitor Time Typography', 'gofly-core'),
                'name'     => 'gofly_blog_six_style_post_info_visit_time_typ',
                'selector' => '{{WRAPPER}} .home6-blog-section .blog-card2.three .blog-content .blog-meta li:last-child',
            ]
        );

        $this->add_control(
            'gofly_blog_six_style_post_info_visit_time_color',
            [
                'label'     => esc_html__('Visitor Time Color', 'gofly-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .home6-blog-section .blog-card2.three .blog-content .blog-meta li:last-child' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'gofly_blog_six_posts_general_button_style',
            [
                'label'     => esc_html__('Bottom Button', 'gofly-core'),
                'type'      => \Elementor\Controls_Manager::HEADING,
                'separator' => 'after',
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'label'    => esc_html__('Typography', 'gofly-core'),
                'name'     => 'gofly_blog_six_style_post_general_button_typ',
                'selector' => '{{WRAPPER}} .home6-blog-section .primary-btn1 > span',
            ]
        );

        $this->add_control(
            'gofly_blog_six_style_post_general_button_color',
            [
                'label'     => esc_html__('Color', 'gofly-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .home6-blog-section .primary-btn1 > span' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'gofly_blog_six_style_post_general_button_hover_color',
            [
                'label'     => esc_html__('Hover Color', 'gofly-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .home6-blog-section .primary-btn1:hover > span' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'gofly_blog_six_style_post_general_button_bg_color',
            [
                'label'     => esc_html__('Button Background Color', 'gofly-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .home6-blog-section .primary-btn1' => 'background-color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'gofly_blog_six_style_post_general_button_hover_bg_color',
            [
                'label'     => esc_html__('Button Hover BG Color', 'gofly-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .home6-blog-section .primary-btn1::after' => 'background-color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'gofly_blog_six_style_post_general_button_border_color',
            [
                'label'     => esc_html__('Button Border Color', 'gofly-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .home6-blog-section .primary-btn1' => 'border-color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'gofly_blog_six_style_post_general_button_hover_border_color',
            [
                'label'     => esc_html__('Button Hover Border Color', 'gofly-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .home6-blog-section .primary-btn1:hover' => 'border-color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'gofly_blog_six_style_post_general_button_icon_color',
            [
                'label'     => esc_html__('Icon Color', 'gofly-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .home6-blog-section .primary-btn1 span svg' => 'fill: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'gofly_blog_six_style_post_general_button_hover_icon_color',
            [
                'label'     => esc_html__('Hover Icon Color', 'gofly-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .home6-blog-section .primary-btn1 span:last-child svg' => 'fill: {{VALUE}};',
                ],
            ]
        );

        $this->end_controls_section();

        //============Style Six End=============//

        //============Style Seven Start=============//

        $this->start_controls_section(
            'gofly_blog_styles_seven_general',
            [
                'label'     => esc_html__('Styles', 'gofly-core'),
                'tab'       => Controls_Manager::TAB_STYLE,
                'condition' => [
                    'gofly_blog_general_style_selection' => ['style_seven'],
                ]
            ]
        );

        $this->add_control(
            'gofly_blog_style_seven_general_header_title',
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
                'name'     => 'gofly_blog_style_seven_genaral_header_title_typ',
                'selector' => '{{WRAPPER}} .home7-blog-section .section-title h2',

            ]
        );

        $this->add_control(
            'gofly_blog_style_seven_genaral_header_title_color',
            [
                'label'     => esc_html__('Color', 'gofly-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .home7-blog-section .section-title h2' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'gofly_blog_style_seven_genaral_desc',
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
                'name'     => 'gofly_blog_style_seven_genaral_desc_typ',
                'selector' => '{{WRAPPER}} .home7-blog-section .section-title p',

            ]
        );

        $this->add_control(
            'gofly_blog_style_seven_genaral_desc_color',
            [
                'label'     => esc_html__('Color', 'gofly-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .home7-blog-section .section-title p' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'gofly_blog_posts_card_seven_style',
            [
                'label'     => esc_html__('Post Card', 'gofly-core'),
                'type'      => \Elementor\Controls_Manager::HEADING,
                'separator' => 'after',
            ]
        );

        $this->add_control(
            'gofly_blog_style_post_card_seven_bg_color',
            [
                'label'     => esc_html__('Background Color', 'gofly-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .home7-blog-section .blog-card2' => 'background-color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'gofly_blog_style_post_card_seven_border_color',
            [
                'label'     => esc_html__('Border Color', 'gofly-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .home7-blog-section .blog-card2' => 'border-color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'gofly_blog_seven_posts_title_style',
            [
                'label'     => esc_html__('Post Title', 'gofly-core'),
                'type'      => \Elementor\Controls_Manager::HEADING,
                'separator' => 'after',
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'label'    => esc_html__('Typography', 'gofly-core'),
                'name'     => 'gofly_blog_seven_style_post_title_typ',
                'selector' => '{{WRAPPER}} .home7-blog-section .blog-card2 .blog-content h4 a',

            ]
        );

        $this->add_control(
            'gofly_blog_seven_style_post_title_color',
            [
                'label'     => esc_html__('Color', 'gofly-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .home7-blog-section .blog-card2 .blog-content h4 a' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'gofly_blog_seven_posts_info_style',
            [
                'label'     => esc_html__('Post Date', 'gofly-core'),
                'type'      => \Elementor\Controls_Manager::HEADING,
                'separator' => 'after',
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'label'    => esc_html__('Typography', 'gofly-core'),
                'name'     => 'gofly_blog_seven_style_post_info_typ',
                'selector' => '{{WRAPPER}} .home7-blog-section .blog-card2.five .blog-content .blog-date',
            ]
        );

        $this->add_control(
            'gofly_blog_seven_style_post_info_color',
            [
                'label'     => esc_html__('Color', 'gofly-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .home7-blog-section .blog-card2.five .blog-content .blog-date' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'gofly_blog_seven_style_post_info_hover_color',
            [
                'label'     => esc_html__('Hover Color', 'gofly-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .home7-blog-section .blog-card2.five .blog-content .blog-date:hover' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'gofly_blog_seven_style_post_info_border_color',
            [
                'label'     => esc_html__('Border Color', 'gofly-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .home7-blog-section .blog-card2.five .blog-content .blog-date' => 'border-color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'gofly_blog_seven_style_post_info_border_hover_color',
            [
                'label'     => esc_html__('Hover Border Color', 'gofly-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .home7-blog-section .blog-card2.five .blog-content .blog-date:hover' => 'border-color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'gofly_blog_seven_posts_general_button_style',
            [
                'label'     => esc_html__('Pagination Bullet', 'gofly-core'),
                'type'      => \Elementor\Controls_Manager::HEADING,
                'separator' => 'after',
            ]
        );

        $this->add_control(
            'gofly_blog_seven_style_post_general_pagination_bg_color',
            [
                'label'     => esc_html__('Pagination Color', 'gofly-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .home7-blog-section .paginations .swiper-pagination-bullet' => 'background-color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'gofly_blog_seven_style_post_general_pagination_active_bg_color',
            [
                'label'     => esc_html__('Pagination Active Color', 'gofly-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .home7-blog-section .paginations.three .swiper-pagination-bullet.swiper-pagination-bullet-active' => 'background-color: {{VALUE}};',
                ],
            ]
        );

        $this->end_controls_section();

        //============Style Seven End=============//

        //============Style Eight Start=============//

        $this->start_controls_section(
            'gofly_blog_styles_eight_general',
            [
                'label'     => esc_html__('Styles', 'gofly-core'),
                'tab'       => Controls_Manager::TAB_STYLE,
                'condition' => [
                    'gofly_blog_general_style_selection' => ['style_eight'],
                ]
            ]
        );

        $this->add_control(
            'gofly_blog_style_eight_general_header_title',
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
                'name'     => 'gofly_blog_style_eight_genaral_header_title_typ',
                'selector' => '{{WRAPPER}} .home4-blog-section .section-title h2',

            ]
        );

        $this->add_control(
            'gofly_blog_style_eight_genaral_header_title_color',
            [
                'label'     => esc_html__('Color', 'gofly-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .home4-blog-section .section-title h2' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'gofly_blog_style_eight_genaral_desc',
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
                'name'     => 'gofly_blog_style_eight_genaral_desc_typ',
                'selector' => '{{WRAPPER}} .home4-blog-section .section-title p',

            ]
        );

        $this->add_control(
            'gofly_blog_style_eight_genaral_desc_color',
            [
                'label'     => esc_html__('Color', 'gofly-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .home4-blog-section .section-title p' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'gofly_blog_posts_card_eight_style',
            [
                'label'     => esc_html__('Post Card', 'gofly-core'),
                'type'      => \Elementor\Controls_Manager::HEADING,
                'separator' => 'after',
            ]
        );

        $this->add_control(
            'gofly_blog_style_post_card_eight_bg_color',
            [
                'label'     => esc_html__('Background Color', 'gofly-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .home4-blog-section .blog-card2' => 'background-color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'gofly_blog_style_post_card_eight_border_color',
            [
                'label'     => esc_html__('Border Color', 'gofly-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .home4-blog-section .blog-card2' => 'border-color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'gofly_blog_eight_posts_title_style',
            [
                'label'     => esc_html__('Post Title', 'gofly-core'),
                'type'      => \Elementor\Controls_Manager::HEADING,
                'separator' => 'after',
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'label'    => esc_html__('Typography', 'gofly-core'),
                'name'     => 'gofly_blog_eight_style_post_title_typ',
                'selector' => '{{WRAPPER}} .home4-blog-section .blog-card2 .blog-content h4 a',

            ]
        );

        $this->add_control(
            'gofly_blog_eight_style_post_title_color',
            [
                'label'     => esc_html__('Color', 'gofly-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .home4-blog-section .blog-card2 .blog-content h4 a' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'gofly_blog_eight_posts_desc_style',
            [
                'label'     => esc_html__('Post Description', 'gofly-core'),
                'type'      => \Elementor\Controls_Manager::HEADING,
                'separator' => 'after',
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'label'    => esc_html__('Typography', 'gofly-core'),
                'name'     => 'gofly_blog_eight_style_post_desc_typ',
                'selector' => '{{WRAPPER}} .home4-blog-section .blog-card2 .blog-content p',

            ]
        );

        $this->add_control(
            'gofly_blog_eight_style_post_desc_color',
            [
                'label'     => esc_html__('Color', 'gofly-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .home4-blog-section .blog-card2 .blog-content p' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'gofly_blog_eight_posts_info_style',
            [
                'label'     => esc_html__('Post Date', 'gofly-core'),
                'type'      => \Elementor\Controls_Manager::HEADING,
                'separator' => 'after',
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'label'    => esc_html__('Typography', 'gofly-core'),
                'name'     => 'gofly_blog_eight_style_post_info_typ',
                'selector' => '{{WRAPPER}} .home4-blog-section .blog-card2.four .blog-content .blog-date',
            ]
        );

        $this->add_control(
            'gofly_blog_eight_style_post_info_color',
            [
                'label'     => esc_html__('Color', 'gofly-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .home4-blog-section .blog-card2.four .blog-content .blog-date' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'gofly_blog_eight_style_post_info_hover_color',
            [
                'label'     => esc_html__('Hover Color', 'gofly-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .home4-blog-section .blog-card2.four .blog-content .blog-date:hover' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'gofly_blog_eight_style_post_info_border_color',
            [
                'label'     => esc_html__('Border Color', 'gofly-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .home4-blog-section .blog-card2.four .blog-content .blog-date' => 'border-color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'gofly_blog_eight_style_post_info_border_hover_color',
            [
                'label'     => esc_html__('Hover Border Color', 'gofly-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .home4-blog-section .blog-card2.four .blog-content .blog-date:hover' => 'border-color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'gofly_blog_eight_posts_general_button_style',
            [
                'label'     => esc_html__('Bottom Button', 'gofly-core'),
                'type'      => \Elementor\Controls_Manager::HEADING,
                'separator' => 'after',
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'label'    => esc_html__('Typography', 'gofly-core'),
                'name'     => 'gofly_blog_eight_style_post_general_button_typ',
                'selector' => '{{WRAPPER}} .home4-blog-section .primary-btn1 > span',
            ]
        );

        $this->add_control(
            'gofly_blog_eight_style_post_general_button_color',
            [
                'label'     => esc_html__('Color', 'gofly-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .home4-blog-section .primary-btn1 > span' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'gofly_blog_eight_style_post_general_button_hover_color',
            [
                'label'     => esc_html__('Hover Color', 'gofly-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .home4-blog-section .primary-btn1:hover > span' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'gofly_blog_eight_style_post_general_button_bg_color',
            [
                'label'     => esc_html__('Button Background Color', 'gofly-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .home4-blog-section .primary-btn1' => 'background-color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'gofly_blog_eight_style_post_general_button_hover_bg_color',
            [
                'label'     => esc_html__('Button Hover BG Color', 'gofly-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .home4-blog-section .primary-btn1::after' => 'background-color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'gofly_blog_eight_style_post_general_button_border_color',
            [
                'label'     => esc_html__('Button Border Color', 'gofly-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .home4-blog-section .primary-btn1' => 'border-color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'gofly_blog_eight_style_post_general_button_hover_border_color',
            [
                'label'     => esc_html__('Button Hover Border Color', 'gofly-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .home4-blog-section .primary-btn1:hover' => 'border-color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'gofly_blog_eight_style_post_general_button_icon_color',
            [
                'label'     => esc_html__('Icon Color', 'gofly-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .home4-blog-section .primary-btn1 span svg' => 'fill: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'gofly_blog_eight_style_post_general_button_hover_icon_color',
            [
                'label'     => esc_html__('Hover Icon Color', 'gofly-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .home4-blog-section .primary-btn1 span:last-child svg' => 'fill: {{VALUE}};',
                ],
            ]
        );

        $this->end_controls_section();

        //============Style Eight End=============//

    }

    // Display Contents
    protected function render()
    {

        $settings              = $this->get_settings_for_display();
        $selected_category_ids = $settings['gofly_selected_categories'];
        $selected_location_ids = $settings['gofly_selected_locations'];

        $selected_post_ids = $settings['gofly_blog_post_list'];
        $args              = array(
            'post_type'           => 'post',
            'posts_per_page'      => $settings['gofly_blog_genaral_query_post_per_page'],
            'orderby'             => $settings['gofly_blog_genaral_query_orderby'],
            'order'               => $settings['gofly_blog_genaral_query_template_order'],
            'offset'              => 0,
            'post_status'         => 'publish',
            'ignore_sticky_posts' => true,
        );

        if (!empty($selected_category_ids)) {
            $args['tax_query'] = array(
                array(
                    'taxonomy' => 'category',
                    'field'    => 'slug',
                    'terms'    => $selected_category_ids,
                    'operator' => 'IN',
                ),
            );
        } elseif (!empty($selected_location_ids)) {
            $args['tax_query'] = array(
                array(
                    'taxonomy' => 'location',
                    'field'    => 'term_id',
                    'terms'    => $selected_location_ids,
                    'operator' => 'IN',
                ),
            );
        }
        if (!empty($selected_post_ids)) {
            $args['post__in'] = $selected_post_ids;
        }
        $query = new \WP_Query($args);
        $num   = 0;

?>
        <?php if (is_admin()): ?>
            <script>
                var swiper = new Swiper(".home1-blog-slider", {
                    slidesPerView: 1,
                    speed: 1500,
                    spaceBetween: 24,
                    autoplay: {
                        delay: 2500,
                        pauseOnMouseEnter: true,
                        disableOnInteraction: false,
                    },
                    navigation: {
                        nextEl: ".blog-slider-next",
                        prevEl: ".blog-slider-prev",
                    },
                    breakpoints: {
                        280: {
                            slidesPerView: 1,
                        },
                        386: {
                            slidesPerView: 1,
                        },
                        576: {
                            slidesPerView: 1,
                        },
                        768: {
                            slidesPerView: 1,
                        },
                        992: {
                            slidesPerView: 2,
                        },
                        1200: {
                            slidesPerView: 2,
                        },
                        1400: {
                            slidesPerView: 2,
                        },
                    },
                });

                var swiper = new Swiper(".home3-blog-slider", {
                    slidesPerView: 1,
                    speed: 1500,
                    spaceBetween: 24,
                    autoplay: {
                        delay: 2500,
                        disableOnInteraction: false,
                    },
                    navigation: {
                        nextEl: ".blog-slider-next",
                        prevEl: ".blog-slider-prev",
                    },
                    breakpoints: {
                        280: {
                            slidesPerView: 1,
                        },
                        386: {
                            slidesPerView: 1,
                        },
                        576: {
                            slidesPerView: 1,
                        },
                        768: {
                            slidesPerView: 2,
                        },
                        992: {
                            slidesPerView: 2,
                            spaceBetween: 15,
                        },
                        1200: {
                            slidesPerView: 2,
                            spaceBetween: 20,
                        },
                        1400: {
                            slidesPerView: 2,
                        },
                    },
                });
                var swiper = new Swiper(".home7-blog-slider", {
                    slidesPerView: 1,
                    speed: 1500,
                    spaceBetween: 24,
                    autoplay: {
                        delay: 2500,
                        disableOnInteraction: false,
                    },
                    navigation: {
                        nextEl: ".blog-slider-next",
                        prevEl: ".blog-slider-prev",
                    },
                    pagination: {
                        el: ".blog-pagination",
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
                            slidesPerView: 1,
                        },
                        768: {
                            slidesPerView: 2,
                        },
                        992: {
                            slidesPerView: 3,
                            spaceBetween: 15,
                        },
                        1200: {
                            slidesPerView: 3,
                        },
                        1400: {
                            slidesPerView: 3,
                        },
                    },
                });
            </script>
        <?php endif; ?>

        <!-- home1 blog Section Start-->
        <?php if ($settings['gofly_blog_general_style_selection'] == 'style_one'): ?>
            <div class="home1-blog-section">
                <div class="container">
                    <div class="row justify-content-center mb-50 wow animate fadeInDown" data-wow-delay="200ms" data-wow-duration="1500ms">
                        <?php if ($settings['gofly_blog_general_header_switcher'] == 'yes'): ?>
                            <div class="col-xl-6 col-lg-8">
                                <div class="section-title text-center">
                                    <?php if (!empty($settings['gofly_blog_general_title'])): ?>
                                        <h2><?php echo wp_kses($settings['gofly_blog_general_title'], wp_kses_allowed_html('post')); ?></h2>
                                    <?php endif; ?>
                                    <?php if (!empty($settings['gofly_blog_genaral_desc'])): ?>
                                        <p><?php echo wp_kses($settings['gofly_blog_genaral_desc'], wp_kses_allowed_html('post')); ?></p>
                                    <?php endif; ?>
                                </div>
                            </div>
                        <?php endif; ?>
                    </div>
                    <div class="blog-slider-area mb-50">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="swiper home1-blog-slider">
                                    <div class="swiper-wrapper">
                                        <?php
                                        while ($query->have_posts()):
                                            $query->the_post();
                                        ?>
                                            <div class="swiper-slide">
                                                <div class="blog-card" <?php echo has_post_thumbnail() ? '' : 'style="grid-template-columns: auto;"'; ?>>
                                                    <?php if (has_post_thumbnail()): ?>
                                                        <a href="<?php the_permalink(); ?>" class="blog-img">
                                                            <?php the_post_thumbnail('grid2-thumb'); ?>
                                                        </a>
                                                    <?php endif; ?>
                                                    <div class="blog-content">
                                                        <div class="blog-content-top">
                                                            <?php
                                                            $terms = get_the_terms(get_the_ID(), 'location');
                                                            if ($terms && !is_wp_error($terms)) {
                                                                $term_index = [];
                                                                foreach ($terms as $term) {
                                                                    $term_index[$term->term_id] = $term;
                                                                }
                                                                $child_terms  = [];
                                                                $parent_terms = [];

                                                                foreach ($terms as $term) {
                                                                    if ($term->parent && isset($term_index[$term->parent])) {
                                                                        $child_terms[] = $term;  // term with parent
                                                                    } else {
                                                                        $parent_terms[] = $term;  // top-level term
                                                                    }
                                                                }
                                                                $sorted_terms = array_merge($child_terms, $parent_terms);

                                                                $location_links = [];
                                                                foreach ($sorted_terms as $term) {
                                                                    $term_link = get_term_link($term);
                                                                    if (!is_wp_error($term_link)) {
                                                                        $location_links[] = '<a href="' . esc_url($term_link) . '" class="location-link">' . esc_html($term->name) . '</a>';
                                                                    }
                                                                }
                                                                $tour_location = implode(', ', $location_links);
                                                            }
                                                            ?>
                                                            <?php if (!empty($tour_location)): ?>
                                                                <span class="location">
                                                                    <svg width="16" height="16" viewBox="0 0 16 16" xmlns="http://www.w3.org/2000/svg">
                                                                        <path d="M7.81273 0C4.31731 0 1.47302 2.84433 1.47302 6.34163C1.47302 9.07242 5.28467 13.5258 6.92353 15.3136C7.15049 15.5628 7.47603 15.7042 7.81273 15.7042C8.14943 15.7042 8.47497 15.5628 8.70193 15.3136C10.3408 13.5258 14.1524 9.07238 14.1524 6.34163C14.1524 2.84433 11.3081 0 7.81273 0ZM8.35963 14.9991C8.21639 15.1535 8.02294 15.2391 7.81273 15.2391C7.60252 15.2391 7.40907 15.1536 7.26583 14.9991C5.66414 13.2525 1.93809 8.90875 1.93809 6.34167C1.93809 3.10103 4.57218 0.465067 7.81273 0.465067C11.0533 0.465067 13.6874 3.10103 13.6874 6.34167C13.6874 8.90875 9.96132 13.2524 8.35963 14.9991Z" />
                                                                        <path d="M7.81274 9.76647C9.67127 9.76647 11.1779 8.25983 11.1779 6.4013C11.1779 4.54277 9.67127 3.03613 7.81274 3.03613C5.95421 3.03613 4.44757 4.54277 4.44757 6.4013C4.44757 8.25983 5.95421 9.76647 7.81274 9.76647Z" />
                                                                    </svg>
                                                                    <?php echo $tour_location; ?>
                                                                </span>
                                                            <?php endif; ?>
                                                            <h4><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h4>
                                                            <a href="<?php echo esc_url(home_url(get_the_date('Y/m/d'))) ?>" class="blog-date">
                                                                <svg width="16" height="16" viewBox="0 0 16 16" xmlns="http://www.w3.org/2000/svg">
                                                                    <g>
                                                                        <path
                                                                            d="M5.33329 9.66683C5.70148 9.66683 5.99996 9.36835 5.99996 9.00016C5.99996 8.63197 5.70148 8.3335 5.33329 8.3335C4.9651 8.3335 4.66663 8.63197 4.66663 9.00016C4.66663 9.36835 4.9651 9.66683 5.33329 9.66683Z" />
                                                                        <path
                                                                            d="M5.33329 12.3333C5.70148 12.3333 5.99996 12.0349 5.99996 11.6667C5.99996 11.2985 5.70148 11 5.33329 11C4.9651 11 4.66663 11.2985 4.66663 11.6667C4.66663 12.0349 4.9651 12.3333 5.33329 12.3333Z" />
                                                                        <path
                                                                            d="M7.99998 9.66683C8.36817 9.66683 8.66665 9.36835 8.66665 9.00016C8.66665 8.63197 8.36817 8.3335 7.99998 8.3335C7.63179 8.3335 7.33331 8.63197 7.33331 9.00016C7.33331 9.36835 7.63179 9.66683 7.99998 9.66683Z" />
                                                                        <path
                                                                            d="M7.99998 12.3333C8.36817 12.3333 8.66665 12.0349 8.66665 11.6667C8.66665 11.2985 8.36817 11 7.99998 11C7.63179 11 7.33331 11.2985 7.33331 11.6667C7.33331 12.0349 7.63179 12.3333 7.99998 12.3333Z" />
                                                                        <path
                                                                            d="M10.6667 9.66683C11.0349 9.66683 11.3333 9.36835 11.3333 9.00016C11.3333 8.63197 11.0349 8.3335 10.6667 8.3335C10.2985 8.3335 10 8.63197 10 9.00016C10 9.36835 10.2985 9.66683 10.6667 9.66683Z" />
                                                                        <path
                                                                            d="M10.6667 12.3333C11.0349 12.3333 11.3333 12.0349 11.3333 11.6667C11.3333 11.2985 11.0349 11 10.6667 11C10.2985 11 10 11.2985 10 11.6667C10 12.0349 10.2985 12.3333 10.6667 12.3333Z" />
                                                                        <path fill-rule="evenodd" clip-rule="evenodd"
                                                                            d="M0.833313 13.0002V4.3335C0.833666 3.67056 1.09717 3.03488 1.56594 2.56612C2.0347 2.09735 2.67038 1.83385 3.33331 1.8335H5.49998V3.66683C5.49998 3.79944 5.55266 3.92661 5.64643 4.02038C5.74019 4.11415 5.86737 4.16683 5.99998 4.16683C6.13259 4.16683 6.25976 4.11415 6.35353 4.02038C6.4473 3.92661 6.49998 3.79944 6.49998 3.66683V1.8335H10.8333V3.66683C10.8333 3.79944 10.886 3.92661 10.9798 4.02038C11.0735 4.11415 11.2007 4.16683 11.3333 4.16683C11.4659 4.16683 11.5931 4.11415 11.6869 4.02038C11.7806 3.92661 11.8333 3.79944 11.8333 3.66683V1.8335H12.6666C13.3296 1.83385 13.9653 2.09735 14.434 2.56612C14.9028 3.03488 15.1663 3.67056 15.1666 4.3335V13.0002C15.1663 13.6631 14.9028 14.2988 14.434 14.7675C13.9653 15.2363 13.3296 15.4998 12.6666 15.5002H3.33331C2.67038 15.4998 2.0347 15.2363 1.56594 14.7675C1.09717 14.2988 0.833666 13.6631 0.833313 13.0002ZM1.83331 6.50016V13.0002C1.83331 13.398 1.99135 13.7795 2.27265 14.0608C2.55396 14.3421 2.93549 14.5002 3.33331 14.5002H12.6666C13.0645 14.5002 13.446 14.3421 13.7273 14.0608C14.0086 13.7795 14.1666 13.398 14.1666 13.0002V6.50016H1.83331Z" />
                                                                        <path fill-rule="evenodd" clip-rule="evenodd"
                                                                            d="M10.1666 1C10.1666 0.867392 10.2193 0.740215 10.3131 0.646447C10.4069 0.552678 10.534 0.5 10.6666 0.5C10.7993 0.5 10.9264 0.552678 11.0202 0.646447C11.114 0.740215 11.1666 0.867392 11.1666 1V3.66667C11.1666 3.79927 11.114 3.92645 11.0202 4.02022C10.9264 4.11399 10.7993 4.16667 10.6666 4.16667C10.534 4.16667 10.4069 4.11399 10.3131 4.02022C10.2193 3.92645 10.1666 3.79927 10.1666 3.66667V1ZM4.83331 1C4.83331 0.867392 4.88599 0.740215 4.97976 0.646447C5.07353 0.552678 5.2007 0.5 5.33331 0.5C5.46592 0.5 5.5931 0.552678 5.68687 0.646447C5.78063 0.740215 5.83331 0.867392 5.83331 1V3.66667C5.83331 3.79927 5.78063 3.92645 5.68687 4.02022C5.5931 4.11399 5.46592 4.16667 5.33331 4.16667C5.2007 4.16667 5.07353 4.11399 4.97976 4.02022C4.88599 3.92645 4.83331 3.79927 4.83331 3.66667V1Z" />
                                                                    </g>
                                                                </svg>
                                                                <?php echo get_the_date("j M, Y"); ?>
                                                            </a>
                                                        </div>
                                                        <svg class="divider" height="6" viewBox="0 0 288 6" xmlns="http://www.w3.org/2000/svg">
                                                            <path d="M5 2.5L0 0.113249V5.88675L5 3.5V2.5ZM283 3.5L288 5.88675V0.113249L283 2.5V3.5ZM4.5 3.5H283.5V2.5H4.5V3.5Z" />
                                                        </svg>
                                                        <p><?php the_excerpt(); ?></p>
                                                    </div>
                                                </div>
                                            </div>
                                        <?php endwhile;
                                        wp_reset_postdata();
                                        ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <?php if ($settings['gofly_blog_genaral_show_pagination_switcher'] == 'yes'): ?>
                            <div class="slider-btn-grp">
                                <div class="slider-btn blog-slider-prev">
                                    <svg width="14" height="14" viewBox="0 0 14 14" xmlns="http://www.w3.org/2000/svg">
                                        <g>
                                            <path
                                                d="M11.002 13.0005C10.002 10.5005 5.00195 8.00049 2.00195 7.00049C5.00195 6.00049 9.50195 4.50049 11.002 1.00049" stroke-width="1.5" stroke-linecap="round" />
                                        </g>
                                    </svg>
                                </div>
                                <div class="slider-btn blog-slider-next">
                                    <svg width="14" height="14" viewBox="0 0 14 14" xmlns="http://www.w3.org/2000/svg">
                                        <g>
                                            <path
                                                d="M2.99805 13.0005C3.99805 10.5005 8.99805 8.00049 11.998 7.00049C8.99805 6.00049 4.49805 4.50049 2.99805 1.00049" stroke-width="1.5" stroke-linecap="round" />
                                        </g>
                                    </svg>
                                </div>
                            </div>
                        <?php endif; ?>
                    </div>
                    <?php if (! empty($settings['gofly_blog_genaral_button_text'])): ?>
                        <div class="row wow animate fadeInUp" data-wow-delay="200ms" data-wow-duration="1500ms">
                            <div class="col-lg-12 d-flex justify-content-center">
                                <a href="<?php echo esc_url($settings['gofly_blog_genaral_button_text_url']['url']); ?>" class="primary-btn1 transparent">
                                    <span>
                                        <?php echo esc_html($settings['gofly_blog_genaral_button_text']); ?>
                                        <svg width="10" height="10" viewBox="0 0 10 10" xmlns="http://www.w3.org/2000/svg">
                                            <path
                                                d="M9.73535 1.14746C9.57033 1.97255 9.32924 3.26406 9.24902 4.66797C9.16817 6.08312 9.25559 7.5453 9.70214 8.73633C9.84754 9.12406 9.65129 9.55659 9.26367 9.70215C8.9001 9.83849 8.4969 9.67455 8.32812 9.33398L8.29785 9.26367L8.19921 8.98438C7.73487 7.5758 7.67054 5.98959 7.75097 4.58203C7.77875 4.09598 7.82525 3.62422 7.87988 3.17969L1.53027 9.53027C1.23738 9.82317 0.762615 9.82317 0.469722 9.53027C0.176829 9.23738 0.176829 8.76262 0.469722 8.46973L6.83593 2.10254C6.3319 2.16472 5.79596 2.21841 5.25 2.24902C3.8302 2.32862 2.2474 2.26906 0.958003 1.79102L0.704097 1.68945L0.635738 1.65527C0.303274 1.47099 0.157578 1.06102 0.310542 0.704102C0.463655 0.347333 0.860941 0.170391 1.22363 0.28418L1.29589 0.310547L1.48828 0.387695C2.47399 0.751207 3.79966 0.827571 5.16601 0.750977C6.60111 0.670504 7.97842 0.428235 8.86132 0.262695L9.95312 0.0585938L9.73535 1.14746Z" />
                                        </svg>
                                    </span>
                                    <span>
                                        <?php echo esc_html($settings['gofly_blog_genaral_button_text']); ?>
                                        <svg width="10" height="10" viewBox="0 0 10 10" xmlns="http://www.w3.org/2000/svg">
                                            <path
                                                d="M9.73535 1.14746C9.57033 1.97255 9.32924 3.26406 9.24902 4.66797C9.16817 6.08312 9.25559 7.5453 9.70214 8.73633C9.84754 9.12406 9.65129 9.55659 9.26367 9.70215C8.9001 9.83849 8.4969 9.67455 8.32812 9.33398L8.29785 9.26367L8.19921 8.98438C7.73487 7.5758 7.67054 5.98959 7.75097 4.58203C7.77875 4.09598 7.82525 3.62422 7.87988 3.17969L1.53027 9.53027C1.23738 9.82317 0.762615 9.82317 0.469722 9.53027C0.176829 9.23738 0.176829 8.76262 0.469722 8.46973L6.83593 2.10254C6.3319 2.16472 5.79596 2.21841 5.25 2.24902C3.8302 2.32862 2.2474 2.26906 0.958003 1.79102L0.704097 1.68945L0.635738 1.65527C0.303274 1.47099 0.157578 1.06102 0.310542 0.704102C0.463655 0.347333 0.860941 0.170391 1.22363 0.28418L1.29589 0.310547L1.48828 0.387695C2.47399 0.751207 3.79966 0.827571 5.16601 0.750977C6.60111 0.670504 7.97842 0.428235 8.86132 0.262695L9.95312 0.0585938L9.73535 1.14746Z" />
                                        </svg>
                                    </span>
                                </a>
                            </div>
                        </div>
                    <?php endif; ?>
                </div>
            </div>
        <?php endif; ?>
        <!-- home1 blog Section End-->

        <!-- home2 blog Section-->
        <?php if ($settings['gofly_blog_general_style_selection'] == 'style_two'): ?>
            <div class="home2-blog-section">
                <div class="container">
                    <?php if ($settings['gofly_blog_general_header_switcher'] == 'yes'): ?>
                        <div class="row justify-content-center mb-50 wow animate fadeInDown" data-wow-delay="200ms" data-wow-duration="1500ms">
                            <div class="col-xl-6 col-lg-8">
                                <div class="section-title text-center">
                                    <?php if (!empty($settings['gofly_blog_general_title'])): ?>
                                        <h2><?php echo wp_kses($settings['gofly_blog_general_title'], wp_kses_allowed_html('post')); ?></h2>
                                    <?php endif; ?>
                                    <?php if (!empty($settings['gofly_blog_genaral_desc'])): ?>
                                        <p><?php echo wp_kses($settings['gofly_blog_genaral_desc'], wp_kses_allowed_html('post')); ?></p>
                                    <?php endif; ?>
                                </div>
                            </div>
                        </div>
                    <?php endif; ?>
                    <div class="row g-4 mb-40">
                        <?php
                        while ($query->have_posts()):
                            $query->the_post();
                        ?>
                            <div class="col-lg-4 col-md-6 wow animate fadeInDown" data-wow-delay="200ms" data-wow-duration="1500ms">
                                <div class="blog-card2">
                                    <div class="blog-img-wrap">
                                        <?php if (has_post_thumbnail()): ?>
                                            <a href="<?php the_permalink(); ?>" class="blog-img">
                                                <?php the_post_thumbnail('card-thumb'); ?>
                                            </a>
                                        <?php endif; ?>
                                        <a href="<?php echo esc_url(home_url(get_the_date('Y/m/d'))) ?>" class="blog-date">
                                            <?php echo get_the_date("j"); ?> <span><?php echo get_the_date("M") . esc_html('.'); ?></span>
                                        </a>
                                    </div>
                                    <div class="blog-content">
                                        <?php
                                        $terms = get_the_terms(get_the_ID(), 'location');

                                        if ($terms && !is_wp_error($terms)) {
                                            $term_index = [];
                                            foreach ($terms as $term) {
                                                $term_index[$term->term_id] = $term;
                                            }
                                            $child_terms  = [];
                                            $parent_terms = [];

                                            foreach ($terms as $term) {
                                                if ($term->parent && isset($term_index[$term->parent])) {
                                                    $child_terms[] = $term;  // term with parent
                                                } else {
                                                    $parent_terms[] = $term;  // top-level term
                                                }
                                            }
                                            $sorted_terms = array_merge($child_terms, $parent_terms);

                                            $location_links = [];
                                            foreach ($sorted_terms as $term) {
                                                $term_link = get_term_link($term);
                                                if (!is_wp_error($term_link)) {
                                                    $location_links[] = '<a href="' . esc_url($term_link) . '" class="location-link">' . esc_html($term->name) . '</a>';
                                                }
                                            }

                                            $tour_location = implode(', ', $location_links);
                                        }
                                        ?>
                                        <?php if (!empty($tour_location)): ?>
                                            <span class="location">
                                                <svg width="16" height="16" viewBox="0 0 16 16" xmlns="http://www.w3.org/2000/svg">
                                                    <path d="M7.81273 0C4.31731 0 1.47302 2.84433 1.47302 6.34163C1.47302 9.07242 5.28467 13.5258 6.92353 15.3136C7.15049 15.5628 7.47603 15.7042 7.81273 15.7042C8.14943 15.7042 8.47497 15.5628 8.70193 15.3136C10.3408 13.5258 14.1524 9.07238 14.1524 6.34163C14.1524 2.84433 11.3081 0 7.81273 0ZM8.35963 14.9991C8.21639 15.1535 8.02294 15.2391 7.81273 15.2391C7.60252 15.2391 7.40907 15.1536 7.26583 14.9991C5.66414 13.2525 1.93809 8.90875 1.93809 6.34167C1.93809 3.10103 4.57218 0.465067 7.81273 0.465067C11.0533 0.465067 13.6874 3.10103 13.6874 6.34167C13.6874 8.90875 9.96132 13.2524 8.35963 14.9991Z" />
                                                    <path d="M7.81274 9.76647C9.67127 9.76647 11.1779 8.25983 11.1779 6.4013C11.1779 4.54277 9.67127 3.03613 7.81274 3.03613C5.95421 3.03613 4.44757 4.54277 4.44757 6.4013C4.44757 8.25983 5.95421 9.76647 7.81274 9.76647Z" />
                                                </svg>
                                                <?php echo $tour_location; ?>
                                            </span>
                                        <?php endif; ?>
                                        <h4><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h4>
                                    </div>
                                </div>
                            </div>
                        <?php endwhile;
                        wp_reset_postdata();
                        ?>
                    </div>
                    <?php if (! empty($settings['gofly_blog_genaral_button_text'])): ?>
                        <div class="row wow animate fadeInUp" data-wow-delay="200ms" data-wow-duration="1500ms">
                            <div class="col-lg-12 d-flex justify-content-center">
                                <a href="<?php echo esc_url($settings['gofly_blog_genaral_button_text_url']['url']); ?>" class="primary-btn1 transparent">
                                    <span>
                                        <?php echo esc_html($settings['gofly_blog_genaral_button_text']); ?>
                                        <svg width="10" height="10" viewBox="0 0 10 10" xmlns="http://www.w3.org/2000/svg">
                                            <path
                                                d="M9.73535 1.14746C9.57033 1.97255 9.32924 3.26406 9.24902 4.66797C9.16817 6.08312 9.25559 7.5453 9.70214 8.73633C9.84754 9.12406 9.65129 9.55659 9.26367 9.70215C8.9001 9.83849 8.4969 9.67455 8.32812 9.33398L8.29785 9.26367L8.19921 8.98438C7.73487 7.5758 7.67054 5.98959 7.75097 4.58203C7.77875 4.09598 7.82525 3.62422 7.87988 3.17969L1.53027 9.53027C1.23738 9.82317 0.762615 9.82317 0.469722 9.53027C0.176829 9.23738 0.176829 8.76262 0.469722 8.46973L6.83593 2.10254C6.3319 2.16472 5.79596 2.21841 5.25 2.24902C3.8302 2.32862 2.2474 2.26906 0.958003 1.79102L0.704097 1.68945L0.635738 1.65527C0.303274 1.47099 0.157578 1.06102 0.310542 0.704102C0.463655 0.347333 0.860941 0.170391 1.22363 0.28418L1.29589 0.310547L1.48828 0.387695C2.47399 0.751207 3.79966 0.827571 5.16601 0.750977C6.60111 0.670504 7.97842 0.428235 8.86132 0.262695L9.95312 0.0585938L9.73535 1.14746Z" />
                                        </svg>
                                    </span>
                                    <span>
                                        <?php echo esc_html($settings['gofly_blog_genaral_button_text']); ?>
                                        <svg width="10" height="10" viewBox="0 0 10 10" xmlns="http://www.w3.org/2000/svg">
                                            <path
                                                d="M9.73535 1.14746C9.57033 1.97255 9.32924 3.26406 9.24902 4.66797C9.16817 6.08312 9.25559 7.5453 9.70214 8.73633C9.84754 9.12406 9.65129 9.55659 9.26367 9.70215C8.9001 9.83849 8.4969 9.67455 8.32812 9.33398L8.29785 9.26367L8.19921 8.98438C7.73487 7.5758 7.67054 5.98959 7.75097 4.58203C7.77875 4.09598 7.82525 3.62422 7.87988 3.17969L1.53027 9.53027C1.23738 9.82317 0.762615 9.82317 0.469722 9.53027C0.176829 9.23738 0.176829 8.76262 0.469722 8.46973L6.83593 2.10254C6.3319 2.16472 5.79596 2.21841 5.25 2.24902C3.8302 2.32862 2.2474 2.26906 0.958003 1.79102L0.704097 1.68945L0.635738 1.65527C0.303274 1.47099 0.157578 1.06102 0.310542 0.704102C0.463655 0.347333 0.860941 0.170391 1.22363 0.28418L1.29589 0.310547L1.48828 0.387695C2.47399 0.751207 3.79966 0.827571 5.16601 0.750977C6.60111 0.670504 7.97842 0.428235 8.86132 0.262695L9.95312 0.0585938L9.73535 1.14746Z" />
                                        </svg>
                                    </span>
                                </a>
                            </div>
                        </div>
                    <?php endif; ?>
                </div>
            </div>
        <?php endif; ?>

        <!-- home3 blog Section-->
        <?php if ($settings['gofly_blog_general_style_selection'] == 'style_three'): ?>
            <div class="blog-and-newsletter-section">
                <div class="home3-blog-section">
                    <div class="container">
                        <?php if ($settings['gofly_blog_general_header_switcher'] == 'yes'): ?>
                            <div class="row justify-content-center mb-50 wow animate fadeInDown" data-wow-delay="200ms" data-wow-duration="1500ms">
                                <div class="col-xl-6 col-lg-8">
                                    <div class="section-title text-center">
                                        <?php if (!empty($settings['gofly_blog_general_title'])): ?>
                                            <h2><?php echo wp_kses($settings['gofly_blog_general_title'], wp_kses_allowed_html('post')); ?></h2>
                                        <?php endif; ?>
                                        <?php if (!empty($settings['gofly_blog_genaral_desc'])): ?>
                                            <p><?php echo wp_kses($settings['gofly_blog_genaral_desc'], wp_kses_allowed_html('post')); ?></p>
                                        <?php endif; ?>
                                    </div>
                                </div>
                            </div>
                        <?php endif; ?>
                        <div class="row g-4 mb-40">
                            <?php
                            while ($query->have_posts()):
                                $query->the_post();
                            ?>
                                <div class="col-lg-4 col-md-6 wow animate fadeInDown" data-wow-delay="200ms" data-wow-duration="1500ms">
                                    <div class="blog-card2 two">
                                        <div class="blog-img-wrap">
                                            <?php if (has_post_thumbnail()): ?>
                                                <a href="<?php the_permalink(); ?>" class="blog-img">
                                                    <?php the_post_thumbnail('card-thumb'); ?>
                                                </a>
                                            <?php endif; ?>
                                            <?php
                                            $terms = get_the_terms(get_the_ID(), 'location');

                                            if ($terms && !is_wp_error($terms)) {
                                                $term_index = [];
                                                foreach ($terms as $term) {
                                                    $term_index[$term->term_id] = $term;
                                                }
                                                $child_terms  = [];
                                                $parent_terms = [];

                                                foreach ($terms as $term) {
                                                    if ($term->parent && isset($term_index[$term->parent])) {
                                                        $child_terms[] = $term;  // term with parent
                                                    } else {
                                                        $parent_terms[] = $term;  // top-level term
                                                    }
                                                }
                                                $sorted_terms = array_merge($child_terms, $parent_terms);

                                                $location_links = [];
                                                foreach ($sorted_terms as $term) {
                                                    $term_link = get_term_link($term);
                                                    if (!is_wp_error($term_link)) {
                                                        $location_links[] = '<a href="' . esc_url($term_link) . '" class="location-link">' . esc_html($term->name) . '</a>';
                                                    }
                                                }

                                                $tour_location = implode(', ', $location_links);
                                            }
                                            ?>
                                            <?php if (!empty($tour_location)): ?>
                                                <span class="location">
                                                    <svg width="16" height="16" viewBox="0 0 16 16" xmlns="http://www.w3.org/2000/svg">
                                                        <path d="M7.81273 0C4.31731 0 1.47302 2.84433 1.47302 6.34163C1.47302 9.07242 5.28467 13.5258 6.92353 15.3136C7.15049 15.5628 7.47603 15.7042 7.81273 15.7042C8.14943 15.7042 8.47497 15.5628 8.70193 15.3136C10.3408 13.5258 14.1524 9.07238 14.1524 6.34163C14.1524 2.84433 11.3081 0 7.81273 0ZM8.35963 14.9991C8.21639 15.1535 8.02294 15.2391 7.81273 15.2391C7.60252 15.2391 7.40907 15.1536 7.26583 14.9991C5.66414 13.2525 1.93809 8.90875 1.93809 6.34167C1.93809 3.10103 4.57218 0.465067 7.81273 0.465067C11.0533 0.465067 13.6874 3.10103 13.6874 6.34167C13.6874 8.90875 9.96132 13.2524 8.35963 14.9991Z" />
                                                        <path d="M7.81274 9.76647C9.67127 9.76647 11.1779 8.25983 11.1779 6.4013C11.1779 4.54277 9.67127 3.03613 7.81274 3.03613C5.95421 3.03613 4.44757 4.54277 4.44757 6.4013C4.44757 8.25983 5.95421 9.76647 7.81274 9.76647Z" />
                                                    </svg>
                                                    <?php echo $tour_location; ?>
                                                </span>
                                            <?php endif; ?>
                                        </div>
                                        <div class="blog-content">
                                            <a href="<?php echo esc_url(home_url(get_the_date('Y/m/d'))) ?>" class="blog-date"><?php echo get_the_date("j M, Y"); ?></a>
                                            <h4><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h4>
                                            <?php the_excerpt(); ?>
                                        </div>
                                    </div>
                                </div>
                            <?php endwhile;
                            wp_reset_postdata(); ?>
                        </div>
                        <?php if (! empty($settings['gofly_blog_genaral_button_text'])): ?>
                            <div class="row wow animate fadeInUp" data-wow-delay="200ms" data-wow-duration="1500ms">
                                <div class="col-lg-12 d-flex justify-content-center">
                                    <a href="<?php echo esc_url($settings['gofly_blog_genaral_button_text_url']['url']); ?>" class="primary-btn1 two black-bg">
                                        <span>
                                            <?php echo esc_html($settings['gofly_blog_genaral_button_text']); ?>
                                            <svg width="10" height="10" viewBox="0 0 10 10" xmlns="http://www.w3.org/2000/svg">
                                                <path
                                                    d="M9.73535 1.14746C9.57033 1.97255 9.32924 3.26406 9.24902 4.66797C9.16817 6.08312 9.25559 7.5453 9.70214 8.73633C9.84754 9.12406 9.65129 9.55659 9.26367 9.70215C8.9001 9.83849 8.4969 9.67455 8.32812 9.33398L8.29785 9.26367L8.19921 8.98438C7.73487 7.5758 7.67054 5.98959 7.75097 4.58203C7.77875 4.09598 7.82525 3.62422 7.87988 3.17969L1.53027 9.53027C1.23738 9.82317 0.762615 9.82317 0.469722 9.53027C0.176829 9.23738 0.176829 8.76262 0.469722 8.46973L6.83593 2.10254C6.3319 2.16472 5.79596 2.21841 5.25 2.24902C3.8302 2.32862 2.2474 2.26906 0.958003 1.79102L0.704097 1.68945L0.635738 1.65527C0.303274 1.47099 0.157578 1.06102 0.310542 0.704102C0.463655 0.347333 0.860941 0.170391 1.22363 0.28418L1.29589 0.310547L1.48828 0.387695C2.47399 0.751207 3.79966 0.827571 5.16601 0.750977C6.60111 0.670504 7.97842 0.428235 8.86132 0.262695L9.95312 0.0585938L9.73535 1.14746Z" />
                                            </svg>
                                        </span>
                                        <span>
                                            <?php echo esc_html($settings['gofly_blog_genaral_button_text']); ?>
                                            <svg width="10" height="10" viewBox="0 0 10 10" xmlns="http://www.w3.org/2000/svg">
                                                <path
                                                    d="M9.73535 1.14746C9.57033 1.97255 9.32924 3.26406 9.24902 4.66797C9.16817 6.08312 9.25559 7.5453 9.70214 8.73633C9.84754 9.12406 9.65129 9.55659 9.26367 9.70215C8.9001 9.83849 8.4969 9.67455 8.32812 9.33398L8.29785 9.26367L8.19921 8.98438C7.73487 7.5758 7.67054 5.98959 7.75097 4.58203C7.77875 4.09598 7.82525 3.62422 7.87988 3.17969L1.53027 9.53027C1.23738 9.82317 0.762615 9.82317 0.469722 9.53027C0.176829 9.23738 0.176829 8.76262 0.469722 8.46973L6.83593 2.10254C6.3319 2.16472 5.79596 2.21841 5.25 2.24902C3.8302 2.32862 2.2474 2.26906 0.958003 1.79102L0.704097 1.68945L0.635738 1.65527C0.303274 1.47099 0.157578 1.06102 0.310542 0.704102C0.463655 0.347333 0.860941 0.170391 1.22363 0.28418L1.29589 0.310547L1.48828 0.387695C2.47399 0.751207 3.79966 0.827571 5.16601 0.750977C6.60111 0.670504 7.97842 0.428235 8.86132 0.262695L9.95312 0.0585938L9.73535 1.14746Z" />
                                            </svg>
                                        </span>
                                    </a>
                                </div>
                            </div>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        <?php endif; ?>
        <!-- home3 blog Section End-->

        <!-- home4 blog Section-->
        <?php if ($settings['gofly_blog_general_style_selection'] == 'style_four'): ?>
            <div class="home4-blog-section">
                <div class="container">
                    <?php if ($settings['gofly_blog_general_header_switcher'] == 'yes'): ?>
                        <div class="row justify-content-center mb-50 wow animate fadeInDown" data-wow-delay="200ms" data-wow-duration="1500ms">
                            <div class="col-xl-6 col-lg-8">
                                <div class="section-title text-center">
                                    <?php if (!empty($settings['gofly_blog_general_title'])): ?>
                                        <h2><?php echo wp_kses($settings['gofly_blog_general_title'], wp_kses_allowed_html('post')); ?></h2>
                                    <?php endif; ?>
                                    <?php if (!empty($settings['gofly_blog_genaral_desc'])): ?>
                                        <p><?php echo wp_kses($settings['gofly_blog_genaral_desc'], wp_kses_allowed_html('post')); ?></p>
                                    <?php endif; ?>
                                </div>
                            </div>
                        </div>
                    <?php endif; ?>
                    <div class="row g-4 mb-40">
                        <?php
                        while ($query->have_posts()):
                            $query->the_post();
                        ?>
                            <div class="col-lg-4 col-md-6 wow animate fadeInDown" data-wow-delay="200ms" data-wow-duration="1500ms">
                                <div class="blog-card2 two">
                                    <div class="blog-img-wrap">
                                        <?php if (has_post_thumbnail()): ?>
                                            <a href="<?php the_permalink(); ?>" class="blog-img">
                                                <?php the_post_thumbnail('card-thumb'); ?>
                                            </a>
                                        <?php endif; ?>
                                        <?php
                                        $terms = get_the_terms(get_the_ID(), 'location');

                                        if ($terms && !is_wp_error($terms)) {
                                            $term_index = [];
                                            foreach ($terms as $term) {
                                                $term_index[$term->term_id] = $term;
                                            }
                                            $child_terms  = [];
                                            $parent_terms = [];

                                            foreach ($terms as $term) {
                                                if ($term->parent && isset($term_index[$term->parent])) {
                                                    $child_terms[] = $term;  // term with parent
                                                } else {
                                                    $parent_terms[] = $term;  // top-level term
                                                }
                                            }
                                            $sorted_terms = array_merge($child_terms, $parent_terms);

                                            $location_links = [];
                                            foreach ($sorted_terms as $term) {
                                                $term_link = get_term_link($term);
                                                if (!is_wp_error($term_link)) {
                                                    $location_links[] = '<a href="' . esc_url($term_link) . '" class="location-link">' . esc_html($term->name) . '</a>';
                                                }
                                            }

                                            $tour_location = implode(', ', $location_links);
                                        }
                                        ?>
                                        <?php if (!empty($tour_location)): ?>
                                            <span class="location">
                                                <svg width="16" height="16" viewBox="0 0 16 16" xmlns="http://www.w3.org/2000/svg">
                                                    <path d="M7.81273 0C4.31731 0 1.47302 2.84433 1.47302 6.34163C1.47302 9.07242 5.28467 13.5258 6.92353 15.3136C7.15049 15.5628 7.47603 15.7042 7.81273 15.7042C8.14943 15.7042 8.47497 15.5628 8.70193 15.3136C10.3408 13.5258 14.1524 9.07238 14.1524 6.34163C14.1524 2.84433 11.3081 0 7.81273 0ZM8.35963 14.9991C8.21639 15.1535 8.02294 15.2391 7.81273 15.2391C7.60252 15.2391 7.40907 15.1536 7.26583 14.9991C5.66414 13.2525 1.93809 8.90875 1.93809 6.34167C1.93809 3.10103 4.57218 0.465067 7.81273 0.465067C11.0533 0.465067 13.6874 3.10103 13.6874 6.34167C13.6874 8.90875 9.96132 13.2524 8.35963 14.9991Z" />
                                                    <path d="M7.81274 9.76647C9.67127 9.76647 11.1779 8.25983 11.1779 6.4013C11.1779 4.54277 9.67127 3.03613 7.81274 3.03613C5.95421 3.03613 4.44757 4.54277 4.44757 6.4013C4.44757 8.25983 5.95421 9.76647 7.81274 9.76647Z" />
                                                </svg>
                                                <?php echo $tour_location; ?>
                                            </span>
                                        <?php endif; ?>
                                    </div>
                                    <div class="blog-content">
                                        <a href="<?php echo esc_url(home_url(get_the_date('Y/m/d'))) ?>" class="blog-date"><?php echo get_the_date("j M, Y"); ?></a>
                                        <h4><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h4>
                                        <?php the_excerpt(); ?>
                                    </div>
                                </div>
                            </div>
                        <?php endwhile;
                        wp_reset_postdata(); ?>
                    </div>
                    <?php if (! empty($settings['gofly_blog_genaral_button_text'])): ?>
                        <div class="row wow animate fadeInUp" data-wow-delay="200ms" data-wow-duration="1500ms">
                            <div class="col-lg-12 d-flex justify-content-center">
                                <a href="<?php echo esc_url($settings['gofly_blog_genaral_button_text_url']['url']); ?>" class="primary-btn1 two transparent">
                                    <span>
                                        <?php echo esc_html($settings['gofly_blog_genaral_button_text']); ?>
                                        <svg width="10" height="10" viewBox="0 0 10 10" xmlns="http://www.w3.org/2000/svg">
                                            <path
                                                d="M9.73535 1.14746C9.57033 1.97255 9.32924 3.26406 9.24902 4.66797C9.16817 6.08312 9.25559 7.5453 9.70214 8.73633C9.84754 9.12406 9.65129 9.55659 9.26367 9.70215C8.9001 9.83849 8.4969 9.67455 8.32812 9.33398L8.29785 9.26367L8.19921 8.98438C7.73487 7.5758 7.67054 5.98959 7.75097 4.58203C7.77875 4.09598 7.82525 3.62422 7.87988 3.17969L1.53027 9.53027C1.23738 9.82317 0.762615 9.82317 0.469722 9.53027C0.176829 9.23738 0.176829 8.76262 0.469722 8.46973L6.83593 2.10254C6.3319 2.16472 5.79596 2.21841 5.25 2.24902C3.8302 2.32862 2.2474 2.26906 0.958003 1.79102L0.704097 1.68945L0.635738 1.65527C0.303274 1.47099 0.157578 1.06102 0.310542 0.704102C0.463655 0.347333 0.860941 0.170391 1.22363 0.28418L1.29589 0.310547L1.48828 0.387695C2.47399 0.751207 3.79966 0.827571 5.16601 0.750977C6.60111 0.670504 7.97842 0.428235 8.86132 0.262695L9.95312 0.0585938L9.73535 1.14746Z" />
                                        </svg>
                                    </span>
                                    <span>
                                        <?php echo esc_html($settings['gofly_blog_genaral_button_text']); ?>
                                        <svg width="10" height="10" viewBox="0 0 10 10" xmlns="http://www.w3.org/2000/svg">
                                            <path
                                                d="M9.73535 1.14746C9.57033 1.97255 9.32924 3.26406 9.24902 4.66797C9.16817 6.08312 9.25559 7.5453 9.70214 8.73633C9.84754 9.12406 9.65129 9.55659 9.26367 9.70215C8.9001 9.83849 8.4969 9.67455 8.32812 9.33398L8.29785 9.26367L8.19921 8.98438C7.73487 7.5758 7.67054 5.98959 7.75097 4.58203C7.77875 4.09598 7.82525 3.62422 7.87988 3.17969L1.53027 9.53027C1.23738 9.82317 0.762615 9.82317 0.469722 9.53027C0.176829 9.23738 0.176829 8.76262 0.469722 8.46973L6.83593 2.10254C6.3319 2.16472 5.79596 2.21841 5.25 2.24902C3.8302 2.32862 2.2474 2.26906 0.958003 1.79102L0.704097 1.68945L0.635738 1.65527C0.303274 1.47099 0.157578 1.06102 0.310542 0.704102C0.463655 0.347333 0.860941 0.170391 1.22363 0.28418L1.29589 0.310547L1.48828 0.387695C2.47399 0.751207 3.79966 0.827571 5.16601 0.750977C6.60111 0.670504 7.97842 0.428235 8.86132 0.262695L9.95312 0.0585938L9.73535 1.14746Z" />
                                        </svg>
                                    </span>
                                </a>
                            </div>
                        </div>
                    <?php endif; ?>
                </div>
                <?php if (! empty($settings['gofly_blog_genaral_vector_image'])): ?>
                    <img src="<?php echo esc_url($settings['gofly_blog_genaral_vector_image']['url']); ?>" alt="<?php echo esc_attr__('image', 'gofly-core'); ?>" class="vector">
                <?php endif; ?>
            </div>
        <?php endif; ?>
        <!-- home4 blog Section End-->

        <!-- home5 blog Section-->
        <?php if ($settings['gofly_blog_general_style_selection'] == 'style_five'): ?>
            <div class="home5-blog-section">
                <div class="container">
                    <div class="row align-items-md-end justify-content-between g-4 mb-60 wow animate fadeInDown" data-wow-delay="200ms" data-wow-duration="1500ms">
                        <?php if ($settings['gofly_blog_general_header_switcher'] == 'yes'): ?>
                            <div class="col-xl-5 col-md-7">
                                <div class="section-title">
                                    <?php if (!empty($settings['gofly_blog_general_title'])): ?>
                                        <h2><?php echo wp_kses($settings['gofly_blog_general_title'], wp_kses_allowed_html('post')); ?></h2>
                                    <?php endif; ?>
                                    <?php if (!empty($settings['gofly_blog_genaral_desc'])): ?>
                                        <p><?php echo wp_kses($settings['gofly_blog_genaral_desc'], wp_kses_allowed_html('post')); ?></p>
                                    <?php endif; ?>
                                </div>
                            </div>
                        <?php endif; ?>
                        <?php if ($settings['gofly_blog_genaral_show_pagination_switcher'] == 'yes'): ?>
                            <div class="col-lg-3 col-md-4 d-flex justify-content-md-end">
                                <div class="slider-btn-grp two">
                                    <div class="slider-btn blog-slider-prev">
                                        <svg width="16" height="12" viewBox="0 0 16 12" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path fill-rule="evenodd" clip-rule="evenodd" d="M0 5.31421H16V6.68564H0V5.31421Z" />
                                            <path fill-rule="evenodd" clip-rule="evenodd"
                                                d="M0.685714 6.68569C3.9104 6.68569 6.54629 3.84958 6.54629 0.825119V0.139404H5.17486V0.825119C5.17486 3.12181 3.12412 5.31426 0.685714 5.31426H0V6.68569H0.685714Z" />
                                            <path fill-rule="evenodd" clip-rule="evenodd"
                                                d="M0.685714 5.31421C3.9104 5.31421 6.54629 8.15032 6.54629 11.1748V11.8605H5.17486V11.1748C5.17486 8.87901 3.12412 6.68564 0.685714 6.68564H0V5.31421H0.685714Z" />
                                        </svg>
                                    </div>
                                    <div class="slider-btn blog-slider-next">
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
                        <?php endif; ?>
                    </div>
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="swiper home1-blog-slider">
                                <div class="swiper-wrapper">
                                    <?php
                                    while ($query->have_posts()):
                                        $query->the_post();
                                    ?>
                                        <div class="swiper-slide">
                                            <div class="blog-card" <?php echo has_post_thumbnail() ? '' : 'style="grid-template-columns: auto"'; ?>>
                                                <?php if (has_post_thumbnail()): ?>
                                                    <a href="<?php the_permalink(); ?>" class="blog-img">
                                                        <?php the_post_thumbnail('grid2-thumb'); ?>
                                                    </a>
                                                <?php endif; ?>
                                                <div class="blog-content">
                                                    <div class="blog-content-top">
                                                        <?php
                                                        $terms = get_the_terms(get_the_ID(), 'location');

                                                        if ($terms && !is_wp_error($terms)) {
                                                            $term_index = [];
                                                            foreach ($terms as $term) {
                                                                $term_index[$term->term_id] = $term;
                                                            }
                                                            $child_terms  = [];
                                                            $parent_terms = [];

                                                            foreach ($terms as $term) {
                                                                if ($term->parent && isset($term_index[$term->parent])) {
                                                                    $child_terms[] = $term;  // term with parent
                                                                } else {
                                                                    $parent_terms[] = $term;  // top-level term
                                                                }
                                                            }
                                                            $sorted_terms = array_merge($child_terms, $parent_terms);

                                                            $location_links = [];
                                                            foreach ($sorted_terms as $term) {
                                                                $term_link = get_term_link($term);
                                                                if (!is_wp_error($term_link)) {
                                                                    $location_links[] = '<a href="' . esc_url($term_link) . '" class="location-link">' . esc_html($term->name) . '</a>';
                                                                }
                                                            }

                                                            $tour_location = implode(', ', $location_links);
                                                        }
                                                        ?>
                                                        <?php if (!empty($tour_location)): ?>
                                                            <span class="location">
                                                                <svg width="16" height="16" viewBox="0 0 16 16" xmlns="http://www.w3.org/2000/svg">
                                                                    <path d="M7.81273 0C4.31731 0 1.47302 2.84433 1.47302 6.34163C1.47302 9.07242 5.28467 13.5258 6.92353 15.3136C7.15049 15.5628 7.47603 15.7042 7.81273 15.7042C8.14943 15.7042 8.47497 15.5628 8.70193 15.3136C10.3408 13.5258 14.1524 9.07238 14.1524 6.34163C14.1524 2.84433 11.3081 0 7.81273 0ZM8.35963 14.9991C8.21639 15.1535 8.02294 15.2391 7.81273 15.2391C7.60252 15.2391 7.40907 15.1536 7.26583 14.9991C5.66414 13.2525 1.93809 8.90875 1.93809 6.34167C1.93809 3.10103 4.57218 0.465067 7.81273 0.465067C11.0533 0.465067 13.6874 3.10103 13.6874 6.34167C13.6874 8.90875 9.96132 13.2524 8.35963 14.9991Z" />
                                                                    <path d="M7.81274 9.76647C9.67127 9.76647 11.1779 8.25983 11.1779 6.4013C11.1779 4.54277 9.67127 3.03613 7.81274 3.03613C5.95421 3.03613 4.44757 4.54277 4.44757 6.4013C4.44757 8.25983 5.95421 9.76647 7.81274 9.76647Z" />
                                                                </svg>
                                                                <?php echo $tour_location; ?>
                                                            </span>
                                                        <?php endif; ?>
                                                        <h4><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h4>
                                                        <a href="<?php echo esc_url(home_url(get_the_date('Y/m/d'))) ?>" class="blog-date">
                                                            <svg width="16" height="16" viewBox="0 0 16 16" xmlns="http://www.w3.org/2000/svg">
                                                                <g>
                                                                    <path
                                                                        d="M5.33329 9.66683C5.70148 9.66683 5.99996 9.36835 5.99996 9.00016C5.99996 8.63197 5.70148 8.3335 5.33329 8.3335C4.9651 8.3335 4.66663 8.63197 4.66663 9.00016C4.66663 9.36835 4.9651 9.66683 5.33329 9.66683Z" />
                                                                    <path
                                                                        d="M5.33329 12.3333C5.70148 12.3333 5.99996 12.0349 5.99996 11.6667C5.99996 11.2985 5.70148 11 5.33329 11C4.9651 11 4.66663 11.2985 4.66663 11.6667C4.66663 12.0349 4.9651 12.3333 5.33329 12.3333Z" />
                                                                    <path
                                                                        d="M7.99998 9.66683C8.36817 9.66683 8.66665 9.36835 8.66665 9.00016C8.66665 8.63197 8.36817 8.3335 7.99998 8.3335C7.63179 8.3335 7.33331 8.63197 7.33331 9.00016C7.33331 9.36835 7.63179 9.66683 7.99998 9.66683Z" />
                                                                    <path
                                                                        d="M7.99998 12.3333C8.36817 12.3333 8.66665 12.0349 8.66665 11.6667C8.66665 11.2985 8.36817 11 7.99998 11C7.63179 11 7.33331 11.2985 7.33331 11.6667C7.33331 12.0349 7.63179 12.3333 7.99998 12.3333Z" />
                                                                    <path
                                                                        d="M10.6667 9.66683C11.0349 9.66683 11.3333 9.36835 11.3333 9.00016C11.3333 8.63197 11.0349 8.3335 10.6667 8.3335C10.2985 8.3335 10 8.63197 10 9.00016C10 9.36835 10.2985 9.66683 10.6667 9.66683Z" />
                                                                    <path
                                                                        d="M10.6667 12.3333C11.0349 12.3333 11.3333 12.0349 11.3333 11.6667C11.3333 11.2985 11.0349 11 10.6667 11C10.2985 11 10 11.2985 10 11.6667C10 12.0349 10.2985 12.3333 10.6667 12.3333Z" />
                                                                    <path fill-rule="evenodd" clip-rule="evenodd"
                                                                        d="M0.833313 13.0002V4.3335C0.833666 3.67056 1.09717 3.03488 1.56594 2.56612C2.0347 2.09735 2.67038 1.83385 3.33331 1.8335H5.49998V3.66683C5.49998 3.79944 5.55266 3.92661 5.64643 4.02038C5.74019 4.11415 5.86737 4.16683 5.99998 4.16683C6.13259 4.16683 6.25976 4.11415 6.35353 4.02038C6.4473 3.92661 6.49998 3.79944 6.49998 3.66683V1.8335H10.8333V3.66683C10.8333 3.79944 10.886 3.92661 10.9798 4.02038C11.0735 4.11415 11.2007 4.16683 11.3333 4.16683C11.4659 4.16683 11.5931 4.11415 11.6869 4.02038C11.7806 3.92661 11.8333 3.79944 11.8333 3.66683V1.8335H12.6666C13.3296 1.83385 13.9653 2.09735 14.434 2.56612C14.9028 3.03488 15.1663 3.67056 15.1666 4.3335V13.0002C15.1663 13.6631 14.9028 14.2988 14.434 14.7675C13.9653 15.2363 13.3296 15.4998 12.6666 15.5002H3.33331C2.67038 15.4998 2.0347 15.2363 1.56594 14.7675C1.09717 14.2988 0.833666 13.6631 0.833313 13.0002ZM1.83331 6.50016V13.0002C1.83331 13.398 1.99135 13.7795 2.27265 14.0608C2.55396 14.3421 2.93549 14.5002 3.33331 14.5002H12.6666C13.0645 14.5002 13.446 14.3421 13.7273 14.0608C14.0086 13.7795 14.1666 13.398 14.1666 13.0002V6.50016H1.83331Z" />
                                                                    <path fill-rule="evenodd" clip-rule="evenodd"
                                                                        d="M10.1666 1C10.1666 0.867392 10.2193 0.740215 10.3131 0.646447C10.4069 0.552678 10.534 0.5 10.6666 0.5C10.7993 0.5 10.9264 0.552678 11.0202 0.646447C11.114 0.740215 11.1666 0.867392 11.1666 1V3.66667C11.1666 3.79927 11.114 3.92645 11.0202 4.02022C10.9264 4.11399 10.7993 4.16667 10.6666 4.16667C10.534 4.16667 10.4069 4.11399 10.3131 4.02022C10.2193 3.92645 10.1666 3.79927 10.1666 3.66667V1ZM4.83331 1C4.83331 0.867392 4.88599 0.740215 4.97976 0.646447C5.07353 0.552678 5.2007 0.5 5.33331 0.5C5.46592 0.5 5.5931 0.552678 5.68687 0.646447C5.78063 0.740215 5.83331 0.867392 5.83331 1V3.66667C5.83331 3.79927 5.78063 3.92645 5.68687 4.02022C5.5931 4.11399 5.46592 4.16667 5.33331 4.16667C5.2007 4.16667 5.07353 4.11399 4.97976 4.02022C4.88599 3.92645 4.83331 3.79927 4.83331 3.66667V1Z" />
                                                                </g>
                                                            </svg>
                                                            <?php echo get_the_date("j M, Y"); ?>
                                                        </a>
                                                    </div>
                                                    <svg class="divider" height="6" viewBox="0 0 288 6" xmlns="http://www.w3.org/2000/svg">
                                                        <path d="M5 2.5L0 0.113249V5.88675L5 3.5V2.5ZM283 3.5L288 5.88675V0.113249L283 2.5V3.5ZM4.5 3.5H283.5V2.5H4.5V3.5Z" />
                                                    </svg>
                                                    <?php the_excerpt(); ?>
                                                </div>
                                            </div>
                                        </div>
                                    <?php endwhile;
                                    wp_reset_postdata(); ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <?php if (! empty($settings['gofly_blog_genaral_vector_image'])): ?>
                    <img src="<?php echo esc_url($settings['gofly_blog_genaral_vector_image']['url']); ?>" alt="<?php echo esc_attr__('image', 'gofly-core'); ?>" class="vector">
                <?php endif; ?>
            </div>
        <?php endif; ?>


        <!-- home5 blog Section-->
        <?php if ($settings['gofly_blog_general_style_selection'] == 'style_six'): ?>
            <div class="home6-blog-section">
                <div class="container">
                    <?php if ($settings['gofly_blog_general_header_switcher'] == 'yes'): ?>
                        <div class="row justify-content-center mb-50 wow animate fadeInDown" data-wow-delay="200ms" data-wow-duration="1500ms">
                            <div class="col-xl-6 col-lg-8">
                                <div class="section-title text-center">
                                    <?php if (!empty($settings['gofly_blog_general_title'])): ?>
                                        <h2><?php echo wp_kses($settings['gofly_blog_general_title'], wp_kses_allowed_html('post')); ?></h2>
                                    <?php endif; ?>
                                    <?php if (!empty($settings['gofly_blog_genaral_desc'])): ?>
                                        <p><?php echo wp_kses($settings['gofly_blog_genaral_desc'], wp_kses_allowed_html('post')); ?></p>
                                    <?php endif; ?>
                                </div>
                            </div>
                        </div>
                    <?php endif; ?>
                    <div class="row g-4 mb-40">
                        <?php
                        while ($query->have_posts()):
                            $query->the_post();
                            $post_category = get_the_category()[0]->name;

                        ?>
                            <div class="col-lg-4 col-md-6 wow animate fadeInDown" data-wow-delay="200ms" data-wow-duration="1500ms">
                                <div class="blog-card2 three">
                                    <div class="blog-img-wrap">
                                        <?php if (has_post_thumbnail()): ?>
                                            <a href="<?php the_permalink(); ?>" class="blog-img">
                                                <?php the_post_thumbnail('card-thumb'); ?>
                                            </a>
                                        <?php endif; ?>
                                    </div>
                                    <div class="blog-content">
                                        <?php $categories = get_the_category(); ?>
                                        <?php if (!empty($categories)): ?>
                                            <a href="<?php echo esc_url(get_category_link($categories[0]->cat_ID)) ?>" class="batch"><?php echo esc_html($post_category); ?></a>
                                        <?php endif; ?>
                                        <h4><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h4>
                                        <ul class="blog-meta">
                                            <li><a href="<?php echo esc_url(home_url(get_the_date('Y/m/d'))) ?>"><?php echo get_the_date("j M, Y"); ?></a></li>
                                            <?php
                                            $content      = get_the_content();
                                            $reading_time = Egns_Helper::calculate_reading_time($content);
                                            ?>
                                            <li><?php echo sprintf('%s', $reading_time) . esc_html__(' Min reads', 'gofly-core'); ?></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        <?php endwhile;
                        wp_reset_postdata(); ?>
                    </div>
                    <?php if (! empty($settings['gofly_blog_genaral_button_text'])): ?>
                        <div class="row wow animate fadeInUp" data-wow-delay="200ms" data-wow-duration="1500ms">
                            <div class="col-lg-12 d-flex justify-content-center">
                                <a href="<?php echo esc_url($settings['gofly_blog_genaral_button_text_url']['url']); ?>" class="primary-btn1 two three transparent">
                                    <span>
                                        <?php echo esc_html($settings['gofly_blog_genaral_button_text']); ?>
                                        <svg width="10" height="10" viewBox="0 0 10 10" xmlns="http://www.w3.org/2000/svg">
                                            <path
                                                d="M9.73535 1.14746C9.57033 1.97255 9.32924 3.26406 9.24902 4.66797C9.16817 6.08312 9.25559 7.5453 9.70214 8.73633C9.84754 9.12406 9.65129 9.55659 9.26367 9.70215C8.9001 9.83849 8.4969 9.67455 8.32812 9.33398L8.29785 9.26367L8.19921 8.98438C7.73487 7.5758 7.67054 5.98959 7.75097 4.58203C7.77875 4.09598 7.82525 3.62422 7.87988 3.17969L1.53027 9.53027C1.23738 9.82317 0.762615 9.82317 0.469722 9.53027C0.176829 9.23738 0.176829 8.76262 0.469722 8.46973L6.83593 2.10254C6.3319 2.16472 5.79596 2.21841 5.25 2.24902C3.8302 2.32862 2.2474 2.26906 0.958003 1.79102L0.704097 1.68945L0.635738 1.65527C0.303274 1.47099 0.157578 1.06102 0.310542 0.704102C0.463655 0.347333 0.860941 0.170391 1.22363 0.28418L1.29589 0.310547L1.48828 0.387695C2.47399 0.751207 3.79966 0.827571 5.16601 0.750977C6.60111 0.670504 7.97842 0.428235 8.86132 0.262695L9.95312 0.0585938L9.73535 1.14746Z" />
                                        </svg>
                                    </span>
                                    <span>
                                        <?php echo esc_html($settings['gofly_blog_genaral_button_text']); ?>
                                        <svg width="10" height="10" viewBox="0 0 10 10" xmlns="http://www.w3.org/2000/svg">
                                            <path
                                                d="M9.73535 1.14746C9.57033 1.97255 9.32924 3.26406 9.24902 4.66797C9.16817 6.08312 9.25559 7.5453 9.70214 8.73633C9.84754 9.12406 9.65129 9.55659 9.26367 9.70215C8.9001 9.83849 8.4969 9.67455 8.32812 9.33398L8.29785 9.26367L8.19921 8.98438C7.73487 7.5758 7.67054 5.98959 7.75097 4.58203C7.77875 4.09598 7.82525 3.62422 7.87988 3.17969L1.53027 9.53027C1.23738 9.82317 0.762615 9.82317 0.469722 9.53027C0.176829 9.23738 0.176829 8.76262 0.469722 8.46973L6.83593 2.10254C6.3319 2.16472 5.79596 2.21841 5.25 2.24902C3.8302 2.32862 2.2474 2.26906 0.958003 1.79102L0.704097 1.68945L0.635738 1.65527C0.303274 1.47099 0.157578 1.06102 0.310542 0.704102C0.463655 0.347333 0.860941 0.170391 1.22363 0.28418L1.29589 0.310547L1.48828 0.387695C2.47399 0.751207 3.79966 0.827571 5.16601 0.750977C6.60111 0.670504 7.97842 0.428235 8.86132 0.262695L9.95312 0.0585938L9.73535 1.14746Z" />
                                        </svg>
                                    </span>
                                </a>
                            </div>
                        </div>
                    <?php endif; ?>
                </div>
            </div>
        <?php endif; ?>

        <!-- home7 blog Section-->
        <?php if ($settings['gofly_blog_general_style_selection'] == 'style_seven'): ?>
            <div class="home7-blog-section">
                <div class="container">
                    <div class="row justify-content-center mb-60 wow animate fadeInDown" data-wow-delay="200ms" data-wow-duration="1500ms">
                        <div class="col-xl-6 col-lg-8">
                            <div class="section-title text-center">
                                <?php if (!empty($settings['gofly_blog_general_title'])): ?>
                                    <h2><?php echo wp_kses($settings['gofly_blog_general_title'], wp_kses_allowed_html('post')); ?></h2>
                                <?php endif; ?>
                                <?php if (!empty($settings['gofly_blog_genaral_desc'])): ?>
                                    <p><?php echo wp_kses($settings['gofly_blog_genaral_desc'], wp_kses_allowed_html('post')); ?></p>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                    <div class="row mb-40">
                        <div class="col-lg-12">
                            <div class="swiper home7-blog-slider">
                                <div class="swiper-wrapper">
                                    <?php
                                    while ($query->have_posts()):
                                        $query->the_post();
                                    ?>
                                        <div class="swiper-slide">
                                            <div class="blog-card2 five">
                                                <div class="blog-img-wrap">
                                                    <?php if (has_post_thumbnail()): ?>
                                                        <a href="<?php the_permalink(); ?>" class="blog-img">
                                                            <?php the_post_thumbnail('card-thumb'); ?>
                                                        </a>
                                                    <?php endif; ?>
                                                </div>
                                                <div class="blog-content">
                                                    <a href="<?php echo esc_url(home_url(get_the_date('Y/m/d'))) ?>" class="blog-date"><?php echo get_the_date("j M, Y"); ?></a>
                                                    <h4><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h4>
                                                    <?php the_excerpt(); ?>
                                                </div>
                                            </div>
                                        </div>
                                    <?php endwhile;
                                    wp_reset_postdata(); ?>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-12 d-flex justify-content-center">
                            <div class="blog-pagination paginations three"></div>
                        </div>
                    </div>
                </div>
                <?php
                if (! empty($settings['gofly_blog_seven_image_list'])):
                    $index = 1;
                    foreach ($settings['gofly_blog_seven_image_list'] as $image):
                ?>
                        <img src="<?php echo esc_url($image['gofly_blog_seven_genaral_vector_images']['url']); ?>" alt="<?php echo esc_attr__('image', 'gofly-core'); ?>" class="vector<?php echo esc_attr($index); ?>">
                <?php $index++;
                    endforeach;
                endif; ?>
            </div>
        <?php endif; ?>

        <!-- home8 blog Section-->
        <?php if ($settings['gofly_blog_general_style_selection'] == 'style_eight'): ?>
            <div class="home4-blog-section">
                <div class="container">
                    <div class="row justify-content-center mb-50 wow animate fadeInDown" data-wow-delay="200ms" data-wow-duration="1500ms">
                        <div class="col-xl-6 col-lg-8">
                            <div class="section-title text-center">
                                <?php if (!empty($settings['gofly_blog_general_title'])): ?>
                                    <h2><?php echo wp_kses($settings['gofly_blog_general_title'], wp_kses_allowed_html('post')); ?></h2>
                                <?php endif; ?>
                                <?php if (!empty($settings['gofly_blog_genaral_desc'])): ?>
                                    <p><?php echo wp_kses($settings['gofly_blog_genaral_desc'], wp_kses_allowed_html('post')); ?></p>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                    <div class="row g-4 mb-40">
                        <?php
                        while ($query->have_posts()):
                            $query->the_post();
                        ?>
                            <div class="col-lg-4 col-md-6 wow animate fadeInDown" data-wow-delay="200ms" data-wow-duration="1500ms">
                                <div class="blog-card2 four">
                                    <div class="blog-img-wrap">
                                        <?php if (has_post_thumbnail()): ?>
                                            <a href="<?php the_permalink(); ?>" class="blog-img">
                                                <?php the_post_thumbnail('card-thumb'); ?>
                                            </a>
                                        <?php endif; ?>
                                    </div>
                                    <div class="blog-content">
                                        <a href="<?php echo esc_url(home_url(get_the_date('Y/m/d'))) ?>" class="blog-date"><?php echo get_the_date("j M, Y"); ?></a>
                                        <h4><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h4>
                                        <?php the_excerpt(); ?>
                                    </div>
                                </div>
                            </div>
                        <?php endwhile;
                        wp_reset_postdata(); ?>
                    </div>
                    <?php if (! empty($settings['gofly_blog_genaral_button_text'])): ?>
                        <div class="row wow animate fadeInUp" data-wow-delay="200ms" data-wow-duration="1500ms">
                            <div class="col-lg-12 d-flex justify-content-center">
                                <a href="<?php echo esc_url($settings['gofly_blog_genaral_button_text_url']['url']); ?>" class="primary-btn1 two five transparent">
                                    <span>
                                        <?php echo esc_html($settings['gofly_blog_genaral_button_text']); ?>
                                        <svg width="10" height="10" viewBox="0 0 10 10" xmlns="http://www.w3.org/2000/svg">
                                            <path
                                                d="M9.73535 1.14746C9.57033 1.97255 9.32924 3.26406 9.24902 4.66797C9.16817 6.08312 9.25559 7.5453 9.70214 8.73633C9.84754 9.12406 9.65129 9.55659 9.26367 9.70215C8.9001 9.83849 8.4969 9.67455 8.32812 9.33398L8.29785 9.26367L8.19921 8.98438C7.73487 7.5758 7.67054 5.98959 7.75097 4.58203C7.77875 4.09598 7.82525 3.62422 7.87988 3.17969L1.53027 9.53027C1.23738 9.82317 0.762615 9.82317 0.469722 9.53027C0.176829 9.23738 0.176829 8.76262 0.469722 8.46973L6.83593 2.10254C6.3319 2.16472 5.79596 2.21841 5.25 2.24902C3.8302 2.32862 2.2474 2.26906 0.958003 1.79102L0.704097 1.68945L0.635738 1.65527C0.303274 1.47099 0.157578 1.06102 0.310542 0.704102C0.463655 0.347333 0.860941 0.170391 1.22363 0.28418L1.29589 0.310547L1.48828 0.387695C2.47399 0.751207 3.79966 0.827571 5.16601 0.750977C6.60111 0.670504 7.97842 0.428235 8.86132 0.262695L9.95312 0.0585938L9.73535 1.14746Z" />
                                        </svg>
                                    </span>
                                    <span>
                                        <?php echo esc_html($settings['gofly_blog_genaral_button_text']); ?>
                                        <svg width="10" height="10" viewBox="0 0 10 10" xmlns="http://www.w3.org/2000/svg">
                                            <path
                                                d="M9.73535 1.14746C9.57033 1.97255 9.32924 3.26406 9.24902 4.66797C9.16817 6.08312 9.25559 7.5453 9.70214 8.73633C9.84754 9.12406 9.65129 9.55659 9.26367 9.70215C8.9001 9.83849 8.4969 9.67455 8.32812 9.33398L8.29785 9.26367L8.19921 8.98438C7.73487 7.5758 7.67054 5.98959 7.75097 4.58203C7.77875 4.09598 7.82525 3.62422 7.87988 3.17969L1.53027 9.53027C1.23738 9.82317 0.762615 9.82317 0.469722 9.53027C0.176829 9.23738 0.176829 8.76262 0.469722 8.46973L6.83593 2.10254C6.3319 2.16472 5.79596 2.21841 5.25 2.24902C3.8302 2.32862 2.2474 2.26906 0.958003 1.79102L0.704097 1.68945L0.635738 1.65527C0.303274 1.47099 0.157578 1.06102 0.310542 0.704102C0.463655 0.347333 0.860941 0.170391 1.22363 0.28418L1.29589 0.310547L1.48828 0.387695C2.47399 0.751207 3.79966 0.827571 5.16601 0.750977C6.60111 0.670504 7.97842 0.428235 8.86132 0.262695L9.95312 0.0585938L9.73535 1.14746Z" />
                                        </svg>
                                    </span>
                                </a>
                            </div>
                        </div>
                    <?php endif; ?>
                </div>
                <?php if (! empty($settings['gofly_blog_genaral_vector_image'])): ?>
                    <img src="<?php echo esc_url($settings['gofly_blog_genaral_vector_image']['url']); ?>" alt="<?php echo esc_attr__('image', 'gofly-core'); ?>" class="vector">
                <?php endif; ?>
            </div>
        <?php endif; ?>

        <!-- home9 blog Section-->
        <?php if ('style_nine' == $settings['gofly_blog_general_style_selection']): ?>
            <div class="home9-blog-section">
                <div class="container">
                    <div class="row justify-content-center mb-50 wow animate fadeInDown" data-wow-delay="200ms" data-wow-duration="1500ms">
                        <div class="col-xl-6 col-lg-8">
                            <div class="section-title text-center">
                                <?php if (!empty($settings['gofly_blog_general_title'])): ?>
                                    <h2><?php echo wp_kses($settings['gofly_blog_general_title'], wp_kses_allowed_html('post')); ?></h2>
                                <?php endif; ?>
                                <?php if (!empty($settings['gofly_blog_genaral_desc'])): ?>
                                    <p><?php echo wp_kses($settings['gofly_blog_genaral_desc'], wp_kses_allowed_html('post')); ?></p>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                    <div class="row g-4 mb-40">
                        <?php
                        while ($query->have_posts()):
                            $query->the_post();
                        ?>
                            <div class="col-lg-4 col-md-6 wow animate fadeInDown" data-wow-delay="200ms" data-wow-duration="1500ms">
                                <div class="blog-card2 seven">
                                    <?php if (has_post_thumbnail()): ?>
                                        <div class="blog-img-wrap">
                                            <a href="<?php the_permalink(); ?>" class="blog-img">
                                                <?php the_post_thumbnail('card-thumb'); ?>
                                            </a>
                                        </div>
                                    <?php endif; ?>
                                    <div class="blog-content">
                                        <a href="<?php echo esc_url(home_url(get_the_date('Y/m/d'))) ?>" class="blog-date"><?php echo get_the_date("j M, Y"); ?></a>
                                        <h4><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h4>
                                        <?php the_excerpt(); ?>
                                    </div>
                                </div>
                            </div>
                        <?php
                        endwhile;
                        wp_reset_postdata();
                        ?>
                    </div>
                </div>
            </div>
        <?php endif; ?>


<?php

    }
}

Plugin::instance()->widgets_manager->register(new Gofly_Blog_Widget());
