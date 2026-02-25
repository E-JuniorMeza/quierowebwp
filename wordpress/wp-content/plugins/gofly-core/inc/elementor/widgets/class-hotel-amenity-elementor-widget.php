<?php

namespace Elementor;

if (!defined('ABSPATH')) exit;  // Exit if accessed directly

use Elementor\core\Schemes;
use Elementor\Group_Control_Typography;
use Egns_Core\Egns_Helper;

class Gofly_Hotel_Amenity_Widget extends Widget_Base
{

    public function get_name()
    {
        return 'gofly_hotel_amenity';
    }

    public function get_title()
    {
        return esc_html__('EG Hotel Amenity', 'gofly-core');
    }

    public function get_icon()
    {
        return 'egns-widget-icon';
    }

    public function get_categories()
    {
        return ['gofly_hotel'];
    }

    protected function register_controls()
    {

        //=====================General=======================//

        $this->start_controls_section(
            'gofly_hotel_amenity_section',
            [
                'label' => esc_html__('General', 'gofly-core')
            ]
        );

        $this->add_control(
            'custom_panel_notice',
            [
                'type'        => \Elementor\Controls_Manager::NOTICE,
                'notice_type' => 'warning',
                'dismissible' => true,
                'heading'     => esc_html__('Notice', 'gofly-core'),
                'content'     => esc_html__('This Widgets only for custom post "Hotel" details page.', 'gofly-core'),
            ]
        );

        $this->end_controls_section();

        //============Style One Start=============//

        $this->start_controls_section(
            'gofly_hotel_amenity_styles',
            [
                'label' => esc_html__('Styles', 'gofly-core'),
                'tab'   => Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_control(
            'gofly_hotel_room_amenities_general_styles',
            [
                'label'     => esc_html__('General', 'gofly-core'),
                'type'      => \Elementor\Controls_Manager::HEADING,
                'separator' => 'after',
            ]
        );

        $this->add_responsive_control(
            'gofly_hotel_room_amenities_general_radius',
            [
                'label'      => esc_html__(
                    'Anenities Area Border Radius',
                    'gofly-core'
                ),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%'],
                'selectors'  => [
                    '{{WRAPPER}} .hotel-details-page .hotel-details-wrapper .hotel-dt-facilities-area .facilities-wrap' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'
                ]
            ]
        );

        $this->add_control(
            'gofly_hotel_room_amenities_general_bg',
            [
                'label'     => esc_html__('Background Color', 'gofly-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .hotel-details-page .hotel-details-wrapper .hotel-dt-facilities-area .facilities-wrap' => 'background-color: {{VALUE}};',

                ],
            ]
        );

        $this->add_control(
            'gofly_hotel_room_amenities_general_border_color',
            [
                'label'     => esc_html__('Border Color', 'gofly-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .hotel-details-page .hotel-details-wrapper .hotel-dt-facilities-area .facilities-wrap' => 'border-color: {{VALUE}};',

                ],
            ]
        );

        $this->add_control(
            'gofly_hotel_room_amenities_list_title_styles',
            [
                'label'     => esc_html__('Amenities List Title', 'gofly-core'),
                'type'      => \Elementor\Controls_Manager::HEADING,
                'separator' => 'after',
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'label'    => esc_html__('Typography', 'gofly-core'),
                'name'     => 'gofly_hotel_room_amenities_list_title_typ',
                'selector' => '{{WRAPPER}} .hotel-details-page .hotel-details-wrapper .hotel-dt-facilities-area .facilities-wrap .single-facilities h6',

            ]
        );

        $this->add_control(
            'gofly_hotel_room_amenities_list_title_color',
            [
                'label'     => esc_html__('Color', 'gofly-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .hotel-details-page .hotel-details-wrapper .hotel-dt-facilities-area .facilities-wrap .single-facilities h6' => 'color: {{VALUE}};',

                ],
            ]
        );

        $this->add_control(
            'gofly_hotel_room_amenities_list_items_styles',
            [
                'label'     => esc_html__('Amenities List Items', 'gofly-core'),
                'type'      => \Elementor\Controls_Manager::HEADING,
                'separator' => 'after',
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'label'    => esc_html__('Typography', 'gofly-core'),
                'name'     => 'gofly_hotel_room_amenities_list_items_typ',
                'selector' => '{{WRAPPER}} .hotel-details-page .hotel-details-wrapper .hotel-dt-facilities-area .facilities-wrap .single-facilities .facilities-list li',

            ]
        );

        $this->add_control(
            'gofly_hotel_room_amenities_list_items_color',
            [
                'label'     => esc_html__('Color', 'gofly-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .hotel-details-page .hotel-details-wrapper .hotel-dt-facilities-area .facilities-wrap .single-facilities .facilities-list li' => 'color: {{VALUE}};',

                ],
            ]
        );

        $this->add_control(
            'gofly_hotel_room_amenities_list_items_icon_color',
            [
                'label'     => esc_html__('Icon Color', 'gofly-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .hotel-details-page .hotel-details-wrapper .hotel-dt-facilities-area .facilities-wrap .single-facilities .facilities-list li svg' => 'fill: {{VALUE}};',

                ],
            ]
        );

        $this->end_controls_section();

        //============Style End=============//

    }
    protected function render()
    {

        $settings = $this->get_settings_for_display();

        $id    = get_the_ID();
        $terms = wp_get_post_terms($id, 'hotel-amenity');





?>
        <?php if ($terms && !is_wp_error($terms)): ?>
            <div class="hotel-details-page">
                <div class="hotel-details-wrapper">
                    <div class="hotel-dt-facilities-area">
                        <div class="facilities-wrap">
                            <?php
                            $amenities_by_parent = [];
                            foreach ($terms as $term) {
                                $amenities_by_parent[$term->parent][] = $term;
                            }
                            if (!empty($amenities_by_parent[0])) {
                                foreach ($amenities_by_parent[0] as $parent) {

                                    $icon = get_term_meta($parent->term_id, 'egns_hotel_icon', true);
                            ?>
                                    <div class="single-facilities">
                                        <h6>
                                            <?php if (!empty($icon)): ?>
                                                <img src="<?php echo esc_url($icon['amenity_icon']['url']) ?>" alt="<?php echo esc_attr("image") ?>">
                                            <?php endif; ?>
                                            <?php echo esc_html($parent->name); ?>
                                        </h6>
                                        <?php if (!empty($amenities_by_parent[$parent->term_id])): ?>
                                            <ul class="facilities-list">
                                                <?php foreach ($amenities_by_parent[$parent->term_id] as $child): ?>
                                                    <li>
                                                        <svg width="10" height="10" viewBox="0 0 10 10" xmlns="http://www.w3.org/2000/svg">
                                                            <path d="M9.61933 3.0722L4.05903 8.6355C3.97043 8.7211 3.85813 8.7655 3.74593 8.7655C3.68772 8.76559 3.63008 8.75415 3.57632 8.73184C3.52256 8.70952 3.47376 8.67678 3.43272 8.6355L0.380725 5.5835C0.206425 5.4121 0.206425 5.1315 0.380725 4.9572L1.45912 3.8758C1.62462 3.7104 1.92002 3.7104 2.08552 3.8758L3.74593 5.5362L7.91463 1.3645C7.95569 1.32334 8.00445 1.29068 8.05814 1.26837C8.11183 1.24606 8.16939 1.23455 8.22753 1.2345C8.34563 1.2345 8.45792 1.2818 8.54063 1.3645L9.61903 2.446C9.79363 2.6203 9.79363 2.9009 9.61933 3.0722Z" />
                                                        </svg>
                                                        <?php echo esc_html($child->name); ?>
                                                    </li>
                                                <?php endforeach; ?>
                                            </ul>
                                        <?php endif; ?>
                                    </div>
                                <?php
                                }
                            } else {
                                ?>
                                <div class="single-facilities">
                                    <ul class="facilities-list">
                                        <?php foreach ($amenities_by_parent as $parent_terms): ?>
                                            <?php foreach ($parent_terms as $term) : ?>
                                                <li>
                                                    <svg width="10" height="10" viewBox="0 0 10 10" xmlns="http://www.w3.org/2000/svg">
                                                        <path d="M9.61933 3.0722L4.05903 8.6355C3.97043 8.7211 3.85813 8.7655 3.74593 8.7655C3.68772 8.76559 3.63008 8.75415 3.57632 8.73184C3.52256 8.70952 3.47376 8.67678 3.43272 8.6355L0.380725 5.5835C0.206425 5.4121 0.206425 5.1315 0.380725 4.9572L1.45912 3.8758C1.62462 3.7104 1.92002 3.7104 2.08552 3.8758L3.74593 5.5362L7.91463 1.3645C7.95569 1.32334 8.00445 1.29068 8.05814 1.26837C8.11183 1.24606 8.16939 1.23455 8.22753 1.2345C8.34563 1.2345 8.45792 1.2818 8.54063 1.3645L9.61903 2.446C9.79363 2.6203 9.79363 2.9009 9.61933 3.0722Z" />
                                                    </svg>
                                                    <?php echo esc_html($term->name); ?>
                                                </li>
                                            <?php endforeach; ?>
                                        <?php endforeach; ?>
                                    </ul>
                                </div>
                            <?php } ?>
                        </div>
                    </div>
                </div>
            </div>
        <?php endif ?>
<?php

    }
}

Plugin::instance()->widgets_manager->register(new Gofly_Hotel_Amenity_Widget());
