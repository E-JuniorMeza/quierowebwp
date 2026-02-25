<?php

namespace Elementor;

if (!defined('ABSPATH')) exit;  // Exit if accessed directly

use Elementor\core\Schemes;
use Egns_Core\Egns_Helper;

class Gofly_Location_Search_Widget extends Widget_Base
{

    public function get_name()
    {
        return 'gofly_location_search';
    }

    public function get_title()
    {
        return esc_html__('EG Location Search', 'gofly-core');
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
            'gofly_location_search_genaral',
            [
                'label' => esc_html__('General', 'gofly-core')
            ]
        );

        $this->add_control(
            'gofly_location_search_genaral_style_selection',
            [
                'label'   => esc_html__('Select Style', 'gofly-core'),
                'type'    => Controls_Manager::SELECT,
                'options' => [
                    'style_one' => esc_html__('Style One', 'gofly-core'),
                    'style_two' => esc_html__('Style Two', 'gofly-core'),
                ],
                'default' => 'style_one',
            ]
        );
        $this->add_control(
            'gofly_location_search_genaral_title',
            [
                'label'       => esc_html__('Title', 'gofly-core'),
                'type'        => \Elementor\Controls_Manager::TEXT,
                'default'     => esc_html__('Customize Your Travel Package!', 'gofly-core'),
                'placeholder' => esc_html__('Type your title here', 'gofly-core'),
                'label_block' => true,
            ]
        );
        $this->add_control(
            'gofly_location_search_genaral_filter_search',
            [
                'label'     => esc_html__('Search Area', 'gofly-core'),
                'type'      => \Elementor\Controls_Manager::HEADING,
                'separator' => 'after',
            ]
        );
        $this->add_control(
            'gofly_location_search_genaral_filter_search_button_label',
            [
                'label'       => esc_html__('Button Label', 'gofly-core'),
                'type'        => \Elementor\Controls_Manager::TEXT,
                'default'     => esc_html__('Search Now', 'gofly-core'),
                'placeholder' => esc_html__('write your label here', 'gofly-core'),
                'label_block' => true,
            ]
        );

        $repeater = new \Elementor\Repeater();

        $repeater->add_control(
            'gofly_location_search_genaral_content_title',
            [
                'label'       => esc_html__('Content Title', 'gofly-core'),
                'type'        => \Elementor\Controls_Manager::TEXT,
                'default'     => esc_html__('Make Your Favourite Package', 'gofly-core'),
                'placeholder' => esc_html__('write your text here', 'gofly-core'),
                'label_block' => true,
            ]
        );

        $this->add_control(
            'gofly_location_search_genaral_content_list',
            [
                'label'   => esc_html__('Content List', 'gofly-core'),
                'type'    => \Elementor\Controls_Manager::REPEATER,
                'fields'  => $repeater->get_controls(),
                'default' => [
                    [
                        'gofly_location_search_genaral_content_title' => esc_html('Make Your Favourite Package'),
                    ],
                    [
                        'gofly_location_search_genaral_content_title' => esc_html('Easily Customize Tours'),
                    ],
                    [
                        'gofly_location_search_genaral_content_title' => esc_html('Enjoy Your Trip'),
                    ],
                ],
                'title_field' => '{{{ gofly_location_search_genaral_content_title }}}',
            ]
        );

        $this->add_control(
            'gofly_location_search_genaral_contact_section',
            [
                'label'     => esc_html__('Contact Section', 'gofly-core'),
                'type'      => \Elementor\Controls_Manager::HEADING,
                'separator' => 'after',
            ]
        );

        $this->add_control(
            'gofly_location_search_genaral_contact_section_title',
            [
                'label'       => esc_html__('Title', 'gofly-core'),
                'type'        => \Elementor\Controls_Manager::TEXT,
                'default'     => esc_html__('Meet Our Local Tour Guider!', 'gofly-core'),
                'placeholder' => esc_html__('Type your title here', 'gofly-core'),
                'label_block' => true,
            ]
        );

        $this->add_control(
            'gofly_location_search_genaral_contact_section_button_label',
            [
                'label'       => esc_html__('Button Label', 'gofly-core'),
                'type'        => \Elementor\Controls_Manager::TEXT,
                'default'     => esc_html__('Contact Now', 'gofly-core'),
                'placeholder' => esc_html__('write your label here', 'gofly-core'),
                'label_block' => true,
            ]
        );

        $this->add_control(
            'gofly_location_search_genaral_contact_section_button_label_url',
            [
                'label'       => esc_html__('Button Link/URL', 'gofly-core'),
                'type'        => \Elementor\Controls_Manager::URL,
                'default'     => ['url' => '#'],
                'placeholder' => esc_html__('write your url here', 'gofly-core'),
                'label_block' => true,
            ]
        );

        $this->add_control(
            'gofly_location_search_genaral_contact_section_background_image',
            [
                'label'   => esc_html__('Background Image', 'gofly-core'),
                'type'    => \Elementor\Controls_Manager::MEDIA,
                'default' => [
                    'url' => \Elementor\Utils::get_placeholder_image_src(),
                ],
                'media_types' => ['image'],
            ]
        );

        $this->end_controls_section();

        //============Style One Start =============//

        $this->start_controls_section(
            'gofly_location_search_style_one_genaral',
            [
                'label'     => esc_html__('Styles', 'gofly-core'),
                'tab'       => Controls_Manager::TAB_STYLE,
                'condition' => [
                    'gofly_location_search_genaral_style_selection' => ['style_one', 'style_two'],
                ],
            ]
        );

        $this->add_control(
            'gofly_location_search_style_one_genaral_global_sec',
            [
                'label'     => esc_html__('Global Section', 'gofly-core'),
                'type'      => \Elementor\Controls_Manager::HEADING,
                'separator' => 'after',
            ]
        );

        $this->add_control(
            'gofly_location_search_style_one_genaral_global_sec_bg_color',
            [
                'label' => esc_html__('Background Color', 'gofly-core'),
                'type'  => Controls_Manager::COLOR,
            ]
        );

        $this->add_control(
            'gofly_location_search_style_one_genaral_title',
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
                'name'     => 'gofly_location_search_style_one_genaral_title_typ',
                'selector' => '{{WRAPPER}} .home1-location-search-section .location-search-wrapper .location-search-content h2',

            ]
        );

        $this->add_control(
            'gofly_location_search_style_one_genaral_title_color',
            [
                'label'     => esc_html__('Color', 'gofly-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .home1-location-search-section .location-search-wrapper .location-search-content h2' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'gofly_location_search_style_one_genaral_input_field',
            [
                'label'     => esc_html__('Input Field', 'gofly-core'),
                'type'      => \Elementor\Controls_Manager::HEADING,
                'separator' => 'before',
            ]
        );

        $this->add_control(
            'gofly_location_search_style_one_genaral_input_field_icon',
            [
                'label'     => esc_html__('Icon', 'gofly-core'),
                'type'      => \Elementor\Controls_Manager::HEADING,
                'separator' => 'after',
            ]
        );

        $this->add_control(
            'gofly_location_search_style_one_genaral_input_field_icon_color',
            [
                'label'     => esc_html__('Color', 'gofly-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .home1-location-search-section .location-search-wrapper .location-search-content .location-search-area .search-area .dropdown svg' => 'fill: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'gofly_location_search_style_one_genaral_input_text',
            [
                'label'     => esc_html__('Input Text and Field', 'gofly-core'),
                'type'      => \Elementor\Controls_Manager::HEADING,
                'separator' => 'after',
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'label'    => esc_html__('Typography', 'gofly-core'),
                'name'     => 'gofly_location_search_style_one_genaral_input_text_typ',
                'selector' => '{{WRAPPER}} .home1-location-search-section .location-search-wrapper .location-search-content .location-search-area .search-area .dropdown .dropdown-search',

            ]
        );

        $this->add_control(
            'gofly_location_search_style_one_genaral_input_text_color',
            [
                'label'     => esc_html__('Color', 'gofly-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .home1-location-search-section .location-search-wrapper .location-search-content .location-search-area .search-area .dropdown .dropdown-search' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'gofly_location_search_style_one_genaral_input_text_bg_color',
            [
                'label'     => esc_html__('Background Color', 'gofly-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .home1-location-search-section .location-search-wrapper .location-search-content .location-search-area .search-area'                             => 'background-color: {{VALUE}};',
                    '{{WRAPPER}}  .home1-location-search-section .location-search-wrapper .location-search-content .location-search-area .search-area .dropdown .dropdown-search' => 'background-color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'gofly_location_search_style_one_genaral_input_text_border_color',
            [
                'label'     => esc_html__('Border Color', 'gofly-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .home1-location-search-section .location-search-wrapper .location-search-content .location-search-area' => 'border: 1px dashed {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'gofly_location_search_style_one_genaral_input_text_border_bg_color',
            [
                'label'     => esc_html__('Border Background Color', 'gofly-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .home1-location-search-section .location-search-wrapper .location-search-content .location-search-area' => 'background-color: {{VALUE}};',
                ],
            ]
        );


        $this->add_control(
            'gofly_location_search_style_one_genaral_input_button',
            [
                'label'     => esc_html__('Input Button', 'gofly-core'),
                'type'      => \Elementor\Controls_Manager::HEADING,
                'separator' => 'after',
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'label'    => esc_html__('Typography', 'gofly-core'),
                'name'     => 'gofly_location_search_style_one_genaral_input_button_typ',
                'selector' => '{{WRAPPER}} .primary-btn1',

            ]
        );

        $this->add_control(
            'gofly_location_search_style_one_genaral_input_button_color',
            [
                'label'     => esc_html__('Color', 'gofly-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .primary-btn1' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'gofly_location_search_style_one_genaral_input_button_hover_color',
            [
                'label'     => esc_html__('Hover Color', 'gofly-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .primary-btn1:hover' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'gofly_location_search_style_one_genaral_input_button_bg_color',
            [
                'label'     => esc_html__('Background Color', 'gofly-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .primary-btn1' => 'background-color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'gofly_location_search_style_one_genaral_input_button_bg_hover_color',
            [
                'label'     => esc_html__('Hover Background Color', 'gofly-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .primary-btn1::after' => 'background-color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'gofly_location_search_style_one_genaral_content_area',
            [
                'label'     => esc_html__('Content Area', 'gofly-core'),
                'type'      => \Elementor\Controls_Manager::HEADING,
                'separator' => 'before',
            ]
        );

        $this->add_control(
            'gofly_location_search_style_one_genaral_content_area_icon',
            [
                'label'     => esc_html__('Icon', 'gofly-core'),
                'type'      => \Elementor\Controls_Manager::HEADING,
                'separator' => 'after',
            ]
        );

        $this->add_control(
            'gofly_location_search_style_one_genaral_content_area_icon_color',
            [
                'label'     => esc_html__('Color', 'gofly-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .home1-location-search-section .location-search-wrapper .location-search-content ul li svg' => 'fill: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'gofly_location_search_style_one_genaral_content_area_icon_bg_color',
            [
                'label'     => esc_html__('Background Color', 'gofly-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .home1-location-search-section .location-search-wrapper .location-search-content ul li svg circle' => 'fill: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'gofly_location_search_style_one_genaral_content_area_icon_border_color',
            [
                'label'     => esc_html__('Border Color', 'gofly-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .home1-location-search-section .location-search-wrapper .location-search-content ul li svg circle' => 'stroke: {{VALUE}};',
                ],
            ]
        );


        $this->add_control(
            'gofly_location_search_style_one_genaral_content_title',
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
                'name'     => 'gofly_location_search_style_one_genaral_content_title_typ',
                'selector' => '{{WRAPPER}} .home1-location-search-section .location-search-wrapper .location-search-content ul li',

            ]
        );

        $this->add_control(
            'gofly_location_search_style_one_genaral_content_title_color',
            [
                'label'     => esc_html__('Color', 'gofly-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .home1-location-search-section .location-search-wrapper .location-search-content ul li' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'gofly_location_search_style_one_genaral_contact_area',
            [
                'label'     => esc_html__('Contact Area', 'gofly-core'),
                'type'      => \Elementor\Controls_Manager::HEADING,
                'separator' => 'before',
            ]
        );

        $this->add_control(
            'gofly_location_search_style_one_genaral_contact_area_bg_color',
            [
                'label'     => esc_html__('Background Color', 'gofly-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .home1-location-search-section .location-search-wrapper .location-search-content .contact-area' => 'background-color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'gofly_location_search_style_one_genaral_contact_area_title',
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
                'name'     => 'gofly_location_search_style_one_genaral_contact_area_title_typ',
                'selector' => '{{WRAPPER}} .home1-location-search-section .location-search-wrapper .location-search-content .contact-area span',

            ]
        );

        $this->add_control(
            'gofly_location_search_style_one_genaral_contact_area_title_color',
            [
                'label'     => esc_html__('Color', 'gofly-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .home1-location-search-section .location-search-wrapper .location-search-content .contact-area span' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'gofly_location_search_style_one_genaral_contact_area_button',
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
                'name'     => 'gofly_location_search_style_one_genaral_contact_area_button_typ',
                'selector' => '{{WRAPPER}} .home1-location-search-section .location-search-wrapper .location-search-content .contact-area a',

            ]
        );

        $this->add_control(
            'gofly_location_search_style_one_genaral_contact_area_button_color',
            [
                'label'     => esc_html__('Color', 'gofly-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .home1-location-search-section .location-search-wrapper .location-search-content .contact-area a' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'gofly_location_search_style_one_genaral_contact_area_button_hover_color',
            [
                'label'     => esc_html__('Hover Color', 'gofly-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .home1-location-search-section .location-search-wrapper .location-search-content .contact-area a:hover' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'gofly_location_search_style_one_genaral_contact_area_button_icon_color',
            [
                'label'     => esc_html__('Icon Color', 'gofly-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .home1-location-search-section .location-search-wrapper .location-search-content .contact-area a svg' => 'stroke: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'gofly_location_search_style_one_genaral_contact_area_button_icon_hover_color',
            [
                'label'     => esc_html__('Hover Icon Color', 'gofly-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .home1-location-search-section .location-search-wrapper .location-search-content .contact-area a:hover svg' => 'stroke: {{VALUE}};',
                ],
            ]
        );


        $this->end_controls_section();
    }
    protected function render()
    {

        $settings = $this->get_settings_for_display();

?>

        <?php if ($settings['gofly_location_search_genaral_style_selection'] == 'style_one'): ?>
            <div class="home1-location-search-section">
                <div class="container">
                    <div class="location-search-wrapper" style="background-image:url(<?php echo esc_url($settings['gofly_location_search_genaral_contact_section_background_image']['url']); ?>), linear-gradient(180deg, <?php echo esc_attr($settings['gofly_location_search_style_one_genaral_global_sec_bg_color']); ?> 0%, <?php echo esc_attr($settings['gofly_location_search_style_one_genaral_global_sec_bg_color']); ?> 100%);">
                        <div class="location-search-content">
                            <?php if (!empty($settings['gofly_location_search_genaral_title'])): ?>
                                <h2><?php echo esc_html($settings['gofly_location_search_genaral_title']); ?></h2>
                            <?php endif; ?>
                            <form class="location-search-area" method="get" action="<?php echo get_post_type_archive_link('tour'); ?>">
                                <div class="search-area">
                                    <div class="dropdown" id="search_vendor">
                                        <svg width="18" height="18" viewBox="0 0 18 18" xmlns="http://www.w3.org/2000/svg">
                                            <g>
                                                <path
                                                    d="M12.5944 8.99968C12.5944 10.9878 10.9826 12.5996 8.99443 12.5996C7.00627 12.5996 5.39465 10.9878 5.39465 8.99968C5.39465 7.01152 7.00627 5.3999 8.99443 5.3999C10.9826 5.3999 12.5944 7.01152 12.5944 8.99968Z" />
                                                <path
                                                    d="M17.4601 8.4599H16.2564C15.9858 4.86535 13.1291 2.00812 9.53458 1.7372V0.539976C9.53458 0.241723 9.29268 0 8.9946 0C8.69635 0 8.45462 0.241723 8.45462 0.539976V1.7372C4.85986 2.00812 2.00297 4.86535 1.73235 8.4599H0.540018C0.241723 8.4599 0 8.7017 0 8.99987C0 9.29813 0.241723 9.53985 0.539976 9.53985H1.73239C2.00297 13.1344 4.85991 15.9916 8.45441 16.2625V17.4601C8.45441 17.7583 8.69614 18 8.99439 18C9.29251 18 9.53428 17.7583 9.53428 17.4601V16.2625C13.1289 15.9918 15.9858 13.1346 16.2564 9.53985H17.4601C17.7583 9.53985 18 9.29813 18 8.99987C18 8.70175 17.7583 8.4599 17.4601 8.4599ZM8.99443 15.2096C5.56504 15.2094 2.78509 12.4291 2.78509 8.9997C2.78522 5.57014 5.56554 2.7902 8.99494 2.7902C12.4245 2.7902 15.2046 5.57048 15.2046 8.99987C15.2005 12.428 12.4225 15.2058 8.99443 15.2096Z" />
                                            </g>
                                        </svg>
                                        <select name="tr_location" class="dropdown-search">
                                            <option value=""><?php esc_html_e('Select Your Location', 'gofly-core'); ?></option>
                                            <?php
                                            $args = [
                                                'post_type'      => 'tour',
                                                'post_status'    => 'publish',
                                                'posts_per_page' => -1,
                                            ];
                                            $query = new \WP_Query($args);

                                            $all_destination_ids = [];

                                            if ($query->have_posts()) {
                                                while ($query->have_posts()) {
                                                    $query->the_post();
                                                    $destinations = Egns_Helper::egns_get_tour_value('tour_destination_select');
                                                    if (!empty($destinations) && is_array($destinations)) {
                                                        $all_destination_ids = array_merge($all_destination_ids, $destinations);
                                                    }
                                                }
                                                wp_reset_postdata();
                                            }

                                            $all_destination_ids = array_unique($all_destination_ids);

                                            if (! empty($all_destination_ids) && ! is_wp_error($all_destination_ids)) {
                                                foreach ($all_destination_ids as $location) {
                                                    echo '<option value="' . esc_attr(($location)) . '">' . esc_html(get_the_title($location)) . '</option>';
                                                }
                                            }
                                            ?>
                                        </select>
                                    </div>
                                    <?php if (!empty($settings['gofly_location_search_genaral_filter_search_button_label'])): ?>
                                        <button type="submit" class="primary-btn1">
                                            <span>
                                                <?php echo esc_html($settings['gofly_location_search_genaral_filter_search_button_label']); ?>
                                            </span>
                                            <span>
                                                <?php echo esc_html($settings['gofly_location_search_genaral_filter_search_button_label']); ?>
                                            </span>
                                        </button>
                                    <?php endif; ?>
                                </div>
                            </form>
                            <ul>
                                <?php foreach ($settings['gofly_location_search_genaral_content_list'] as $content): ?>
                                    <?php if (!empty($content['gofly_location_search_genaral_content_title'])) : ?>
                                        <li>
                                            <svg width="18" height="18" viewBox="0 0 18 18" xmlns="http://www.w3.org/2000/svg">
                                                <circle cx="9" cy="9" r="8.5" />
                                                <path
                                                    d="M13.6193 7.07207L8.05903 12.6354C7.97043 12.721 7.85813 12.7654 7.74593 12.7654C7.68772 12.7655 7.63008 12.754 7.57632 12.7317C7.52256 12.7094 7.47376 12.6767 7.43272 12.6354L4.38073 9.58337C4.20642 9.41197 4.20642 9.13137 4.38073 8.95707L5.45912 7.87567C5.62462 7.71027 5.92002 7.71027 6.08552 7.87567L7.74593 9.53607L11.9146 5.36438C11.9557 5.32322 12.0045 5.29055 12.0581 5.26825C12.1118 5.24594 12.1694 5.23443 12.2275 5.23438C12.3456 5.23438 12.4579 5.28168 12.5406 5.36438L13.619 6.44587C13.7936 6.62017 13.7936 6.90077 13.6193 7.07207Z" />
                                            </svg>
                                            <?php echo esc_html($content['gofly_location_search_genaral_content_title']); ?>
                                        </li>
                                    <?php endif; ?>
                                <?php endforeach; ?>
                            </ul>
                            <div class="contact-area">
                                <?php if (!empty($settings['gofly_location_search_genaral_contact_section_title'])): ?>
                                    <span><?php echo esc_html($settings['gofly_location_search_genaral_contact_section_title']); ?></span>
                                <?php endif; ?>
                                <?php if (!empty($settings['gofly_location_search_genaral_contact_section_button_label'])): ?>
                                    <a href="<?php echo esc_url($settings['gofly_location_search_genaral_contact_section_button_label_url']['url']); ?>"><?php echo esc_html($settings['gofly_location_search_genaral_contact_section_button_label']); ?>
                                        <svg width="10" height="10" viewBox="0 0 10 10" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M1 9L9 1M9 1C7.22222 1.33333 3.33333 2 1 1M9 1C8.66667 2.66667 8 6.33333 9 9"
                                                stroke-width="1.5" stroke-linecap="round"></path>
                                        </svg>
                                    </a>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        <?php endif; ?>

        <?php if ($settings['gofly_location_search_genaral_style_selection'] == 'style_two'): ?>
            <div class="home1-location-search-section two">
                <div class="container">
                    <div class="location-search-wrapper wow animate fadeInUp" style="background-image:url(<?php echo esc_url($settings['gofly_location_search_genaral_contact_section_background_image']['url']); ?>), linear-gradient(180deg, <?php echo esc_attr($settings['gofly_location_search_style_one_genaral_global_sec_bg_color']); ?> 0%, <?php echo esc_attr($settings['gofly_location_search_style_one_genaral_global_sec_bg_color']); ?> 100%);" data-wow-delay="200ms" data-wow-duration="1500ms">
                        <div class="location-search-content">
                            <?php if (!empty($settings['gofly_location_search_genaral_title'])): ?>
                                <h2><?php echo esc_html($settings['gofly_location_search_genaral_title']); ?></h2>
                            <?php endif; ?>
                            <form class="location-search-area" method="get" action="<?php echo get_post_type_archive_link('tour'); ?>">
                                <div class="search-area">
                                    <div class="dropdown" id="search_vendor">
                                        <svg width="18" height="18" viewBox="0 0 18 18" xmlns="http://www.w3.org/2000/svg">
                                            <g>
                                                <path
                                                    d="M12.5944 8.99968C12.5944 10.9878 10.9826 12.5996 8.99443 12.5996C7.00627 12.5996 5.39465 10.9878 5.39465 8.99968C5.39465 7.01152 7.00627 5.3999 8.99443 5.3999C10.9826 5.3999 12.5944 7.01152 12.5944 8.99968Z" />
                                                <path
                                                    d="M17.4601 8.4599H16.2564C15.9858 4.86535 13.1291 2.00812 9.53458 1.7372V0.539976C9.53458 0.241723 9.29268 0 8.9946 0C8.69635 0 8.45462 0.241723 8.45462 0.539976V1.7372C4.85986 2.00812 2.00297 4.86535 1.73235 8.4599H0.540018C0.241723 8.4599 0 8.7017 0 8.99987C0 9.29813 0.241723 9.53985 0.539976 9.53985H1.73239C2.00297 13.1344 4.85991 15.9916 8.45441 16.2625V17.4601C8.45441 17.7583 8.69614 18 8.99439 18C9.29251 18 9.53428 17.7583 9.53428 17.4601V16.2625C13.1289 15.9918 15.9858 13.1346 16.2564 9.53985H17.4601C17.7583 9.53985 18 9.29813 18 8.99987C18 8.70175 17.7583 8.4599 17.4601 8.4599ZM8.99443 15.2096C5.56504 15.2094 2.78509 12.4291 2.78509 8.9997C2.78522 5.57014 5.56554 2.7902 8.99494 2.7902C12.4245 2.7902 15.2046 5.57048 15.2046 8.99987C15.2005 12.428 12.4225 15.2058 8.99443 15.2096Z" />
                                            </g>
                                        </svg>
                                        <select name="tr_location" class="dropdown-search">
                                            <option value=""><?php esc_html_e('Select Your Location', 'gofly-core'); ?></option>
                                            <?php
                                            $args = [
                                                'post_type'      => 'tour',
                                                'post_status'    => 'publish',
                                                'posts_per_page' => -1,
                                            ];
                                            $query = new \WP_Query($args);

                                            $all_destination_ids = [];

                                            if ($query->have_posts()) {
                                                while ($query->have_posts()) {
                                                    $query->the_post();
                                                    $destinations = Egns_Helper::egns_get_tour_value('tour_destination_select');
                                                    if (!empty($destinations) && is_array($destinations)) {
                                                        $all_destination_ids = array_merge($all_destination_ids, $destinations);
                                                    }
                                                }
                                                wp_reset_postdata();
                                            }

                                            $all_destination_ids = array_unique($all_destination_ids);

                                            if (! empty($all_destination_ids) && ! is_wp_error($all_destination_ids)) {
                                                foreach ($all_destination_ids as $location) {
                                                    echo '<option value="' . esc_attr(($location)) . '">' . esc_html(get_the_title($location)) . '</option>';
                                                }
                                            }
                                            ?>
                                        </select>
                                    </div>
                                    <?php if (!empty($settings['gofly_location_search_genaral_filter_search_button_label'])): ?>
                                        <button type="submit" class="primary-btn1 black-bg">
                                            <span>
                                                <?php echo esc_html($settings['gofly_location_search_genaral_filter_search_button_label']); ?>
                                            </span>
                                            <span>
                                                <?php echo esc_html($settings['gofly_location_search_genaral_filter_search_button_label']); ?>
                                            </span>
                                        </button>
                                    <?php endif; ?>
                                </div>
                            </form>
                            <ul>
                                <?php foreach ($settings['gofly_location_search_genaral_content_list'] as $content): ?>
                                    <?php if (!empty($content['gofly_location_search_genaral_content_title'])) : ?>
                                        <li>
                                            <svg width="18" height="18" viewBox="0 0 18 18" xmlns="http://www.w3.org/2000/svg">
                                                <circle cx="9" cy="9" r="8.5" />
                                                <path
                                                    d="M13.6193 7.07207L8.05903 12.6354C7.97043 12.721 7.85813 12.7654 7.74593 12.7654C7.68772 12.7655 7.63008 12.754 7.57632 12.7317C7.52256 12.7094 7.47376 12.6767 7.43272 12.6354L4.38073 9.58337C4.20642 9.41197 4.20642 9.13137 4.38073 8.95707L5.45912 7.87567C5.62462 7.71027 5.92002 7.71027 6.08552 7.87567L7.74593 9.53607L11.9146 5.36438C11.9557 5.32322 12.0045 5.29055 12.0581 5.26825C12.1118 5.24594 12.1694 5.23443 12.2275 5.23438C12.3456 5.23438 12.4579 5.28168 12.5406 5.36438L13.619 6.44587C13.7936 6.62017 13.7936 6.90077 13.6193 7.07207Z" />
                                            </svg>
                                            <?php echo esc_html($content['gofly_location_search_genaral_content_title']); ?>
                                        </li>
                                    <?php endif; ?>
                                <?php endforeach; ?>
                            </ul>
                            <div class="contact-area">
                                <?php if (!empty($settings['gofly_location_search_genaral_contact_section_title'])): ?>
                                    <span><?php echo esc_html($settings['gofly_location_search_genaral_contact_section_title']); ?></span>
                                <?php endif; ?>
                                <?php if (!empty($settings['gofly_location_search_genaral_contact_section_button_label'])): ?>
                                    <a href="<?php echo esc_url($settings['gofly_location_search_genaral_contact_section_button_label_url']['url']); ?>"><?php echo esc_html($settings['gofly_location_search_genaral_contact_section_button_label']); ?>
                                        <svg width="10" height="10" viewBox="0 0 10 10" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M1 9L9 1M9 1C7.22222 1.33333 3.33333 2 1 1M9 1C8.66667 2.66667 8 6.33333 9 9" stroke-width="1.5" stroke-linecap="round"></path>
                                        </svg>
                                    </a>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        <?php endif; ?>

<?php

    }
}

Plugin::instance()->widgets_manager->register(new Gofly_Location_Search_Widget());
