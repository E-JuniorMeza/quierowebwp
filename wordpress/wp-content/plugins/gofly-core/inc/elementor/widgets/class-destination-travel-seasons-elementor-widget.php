<?php

namespace Elementor;

if (!defined('ABSPATH')) exit;  // Exit if accessed directly

use Egns_Core;
use Elementor\core\Schemes;
use Egns_Core\Egns_Helper;

class Gofly_Travel_Seasons_Widget extends Widget_Base
{

    public function get_name()
    {
        return 'gofly_travel_seasons';
    }

    public function get_title()
    {
        return esc_html__('EG Travel Seasons', 'gofly-core');
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

        //===================== Seasons Content =======================//

        $this->start_controls_section(
            'gofly_travel_seasons_section',
            [
                'label' => esc_html__('Season Content', 'gofly-core')
            ]
        );

        $this->add_control(
            'gofly_travel_seasons_image',
            [
                'label'   => esc_html__('Season Image', 'gofly-core'),
                'type'    => \Elementor\Controls_Manager::MEDIA,
                'default' => [
                    'url' => \Elementor\Utils::get_placeholder_image_src(),
                ],
            ]
        );

        $this->add_control(
            'gofly_travel_seasons_name',
            [
                'label'       => esc_html__('Name', 'gofly-core'),
                'type'        => \Elementor\Controls_Manager::TEXT,
                'default'     => esc_html__('Spring (March–May)', 'gofly-core'),
                'placeholder' => esc_html__('Type your name here', 'gofly-core'),
                'label_block' => true,
            ]
        );
        $this->add_control(
            'gofly_travel_seasons_weather',
            [
                'label'   => esc_html__('Weather', 'gofly-core'),
                'type'    => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html__('Weather: 12–20°C / 53–68°F)', 'gofly-core'),
                'placeholder' => esc_html__('Type your weather details here', 'gofly-core'),
                'label_block' => true,
            ]
        );

        $this->add_control(
            'gofly_travel_seasons_highlights_options',
            [
                'label'     => esc_html__('Highlights Options', 'gofly-core'),
                'type'      => \Elementor\Controls_Manager::HEADING,
                'separator' => 'before',
            ]
        );
        $this->add_control(
            'gofly_travel_seasons_hglts_title',
            [
                'label'       => esc_html__('Title', 'gofly-core'),
                'type'        => \Elementor\Controls_Manager::TEXT,
                'default'     => esc_html__('Highlights:', 'gofly-core'),
                'placeholder' => esc_html__('Type your title here', 'gofly-core'),
                'label_block' => true,
            ]
        );
        $this->add_control(
            'gofly_travel_seasons_hglts_list',
            [
                'label'       => esc_html__('Description', 'gofly-core'),
                'type'        => \Elementor\Controls_Manager::TEXTAREA,
                'rows'        => 8,
                'default'     => esc_html__('Cherry blossoms, café culture.', 'gofly-core'),
                'placeholder' => esc_html__('Type your description here', 'gofly-core'),
                'description' => esc_html__('Press Enter to continue on a new line.', 'gofly-core')
            ]
        );
        $this->add_control(
            'gofly_travel_seasons_note',
            [
                'label'     => esc_html__('EasyGo Note', 'gofly-core'),
                'type'      => \Elementor\Controls_Manager::HEADING,
                'separator' => 'before',
            ]
        );

        $this->add_control(
            'gofly_travel_seasons_note_list',
            [
                'label'       => esc_html__('Description', 'gofly-core'),
                'type'        => \Elementor\Controls_Manager::TEXTAREA,
                'rows'        => 5,
                'default'     => esc_html__('Perfect For: First-time travelers, couples, light packers, café culture.', 'gofly-core'),
                'placeholder' => esc_html__('Type your description here', 'gofly-core'),
            ]
        );

        $this->end_controls_section();

        //===================== Seasons Content Style =======================//

        $this->start_controls_section(
            'gofly_travel_seasons_style_section',
            [
                'label' => esc_html__('Season Content', 'gofly-core'),
                'tab'   => \Elementor\Controls_Manager::TAB_STYLE,
            ]
        );
        // Image 
        $this->add_control(
            'gofly_travel_seasons_style_img_options',
            [
                'label'     => esc_html__('Image Options', 'gofly-core'),
                'type'      => \Elementor\Controls_Manager::HEADING,
                'separator' => 'before',
            ]
        );
        $this->add_control(
            'gofly_travel_seasons_image_width',
            [
                'label'      => esc_html__('Width', 'gofly-core'),
                'type'       => \Elementor\Controls_Manager::SLIDER,
                'size_units' => ['px', '%', 'rem', 'custom'],
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
                    'default' => [
                        'unit' => 'px',
                        'size' => 195,
                    ],
                ],
                'selectors' => [
                    '{{WRAPPER}} .destination-dt-travel-season-section .travel-season-card .travel-season-top-area .travel-season-img img' => 'width: {{SIZE}}{{UNIT}};',
                ],
            ]
        );
        $this->add_control(
            'gofly_travel_seasons_image_border_radius',
            [
                'label'      => esc_html__('Border-radius', 'gofly-core'),
                'type'       => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em', 'custom'],
                'selectors'  => [
                    '{{WRAPPER}} .destination-dt-travel-season-section .travel-season-card .travel-season-top-area .travel-season-img img' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        // Name 
        $this->add_control(
            'gofly_travel_seasons_name_options',
            [
                'label'     => esc_html__('Name Options', 'gofly-core'),
                'type'      => \Elementor\Controls_Manager::HEADING,
                'separator' => 'before',
            ]
        );
        $this->add_control(
            'gofly_travel_seasons_name_color',
            [
                'label'     => esc_html__('Color', 'gofly-core'),
                'type'      => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .destination-dt-travel-season-section .travel-season-card .travel-season-top-area .travel-season-content h5' => 'color: {{VALUE}}',
                ],
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name'     => 'gofly_travel_seasons_name_typography',
                'selector' => '{{WRAPPER}} .destination-dt-travel-season-section .travel-season-card .travel-season-top-area .travel-season-content h5',
            ]
        );
        // Weather 
        $this->add_control(
            'gofly_travel_seasons_weather_options',
            [
                'label'     => esc_html__('Weather Options', 'gofly-core'),
                'type'      => \Elementor\Controls_Manager::HEADING,
                'separator' => 'before',
            ]
        );
        $this->add_control(
            'gofly_travel_seasons_weather_color',
            [
                'label'     => esc_html__('Color', 'gofly-core'),
                'type'      => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .destination-dt-travel-season-section .travel-season-card .travel-season-top-area .travel-season-content span' => 'color: {{VALUE}}',
                ],
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name'     => 'gofly_travel_seasons_weather_typography',
                'selector' => '{{WRAPPER}} .destination-dt-travel-season-section .travel-season-card .travel-season-top-area .travel-season-content span',
            ]
        );
        // Highlights 
        $this->add_control(
            'gofly_travel_seasons_hglts_title_options',
            [
                'label'     => esc_html__('Highlights Options', 'gofly-core'),
                'type'      => \Elementor\Controls_Manager::HEADING,
                'separator' => 'before',
            ]
        );
        $this->add_control(
            'gofly_travel_seasons_hglts_title_color',
            [
                'label'     => esc_html__('Color', 'gofly-core'),
                'type'      => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .destination-dt-travel-season-section .travel-season-card .travel-season-top-area .travel-season-content .highlights-area h6' => 'color: {{VALUE}}',
                ],
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name'     => 'gofly_travel_seasons_hglts_title_typography',
                'selector' => '{{WRAPPER}} .destination-dt-travel-season-section .travel-season-card .travel-season-top-area .travel-season-content .highlights-area h6',
            ]
        );
        // Highlights Inner
        $this->add_control(
            'gofly_travel_seasons_hglts_inr_options',
            [
                'label'     => esc_html__('Highlights Inner Options', 'gofly-core'),
                'type'      => \Elementor\Controls_Manager::HEADING,
                'separator' => 'before',
            ]
        );
        $this->add_control(
            'gofly_travel_seasons_hglts_inr_color',
            [
                'label'     => esc_html__('Color', 'gofly-core'),
                'type'      => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .destination-dt-travel-season-section .travel-season-card .travel-season-top-area .travel-season-content .highlights-area ul li'     => 'color: {{VALUE}}',
                    '{{WRAPPER}} .destination-dt-travel-season-section .travel-season-card .travel-season-top-area .travel-season-content .highlights-area ul li svg' => 'fill: {{VALUE}}',
                ],
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name'     => 'gofly_travel_seasons_hglts_inr_typography',
                'selector' => '{{WRAPPER}} .destination-dt-travel-season-section .travel-season-card .travel-season-top-area .travel-season-content .highlights-area ul li',
            ]
        );
        $this->add_control(
            'gofly_travel_seasons_hglts_inr_bg_color',
            [
                'label'     => esc_html__('Icon BG Color', 'gofly-core'),
                'type'      => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .destination-dt-travel-season-section .travel-season-card .travel-season-top-area .travel-season-content .highlights-area ul li svg rect' => 'fill: {{VALUE}}',
                ],
            ]
        );
        // EasyGo Note 
        $this->add_control(
            'gofly_travel_seasons_note_options',
            [
                'label'     => esc_html__('EasyGo Note Options', 'gofly-core'),
                'type'      => \Elementor\Controls_Manager::HEADING,
                'separator' => 'before',
            ]
        );
        $this->add_control(
            'gofly_travel_seasons_note_color',
            [
                'label'     => esc_html__('Color', 'gofly-core'),
                'type'      => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .destination-dt-travel-season-section .travel-season-card .note' => 'color: {{VALUE}}',
                ],
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name'     => 'gofly_travel_seasons_note_typography',
                'selector' => '{{WRAPPER}} .destination-dt-travel-season-section .travel-season-card .note',
            ]
        );
        $this->add_control(
            'gofly_travel_seasons_note_border_radius',
            [
                'label'      => esc_html__('Border-radius', 'gofly-core'),
                'type'       => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em', 'custom'],
                'selectors'  => [
                    '{{WRAPPER}} .destination-dt-travel-season-section .travel-season-card .note' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->add_control(
            'gofly_travel_seasons_note_bg_color',
            [
                'label'     => esc_html__('BG Color', 'gofly-core'),
                'type'      => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .destination-dt-travel-season-section .travel-season-card .note' => 'background-color: {{VALUE}}',
                ],
            ]
        );

        $this->end_controls_section();
    }
    protected function render()
    {

        $settings = $this->get_settings_for_display();

        $lists      = $settings['gofly_travel_seasons_hglts_list'];
        $normalized = str_replace(["\r\n", "\r"], "\n", $lists);
        $array_list = explode("\n", $normalized);




?>

        <div class="destination-dt-travel-season-section">
            <div class="travel-season-card wow animate fadeInDown" data-wow-delay="200ms" data-wow-duration="1500ms">
                <div class="travel-season-top-area">
                    <?php if (!empty($settings['gofly_travel_seasons_image']['url'])): ?>
                        <div class="travel-season-img">
                            <img src="<?php echo esc_url($settings['gofly_travel_seasons_image']['url']) ?>" alt="<?php echo esc_attr__('travel-image', 'gofly-core'); ?>">
                        </div>
                    <?php endif; ?>
                    <div class="travel-season-content">
                        <?php if (!empty($settings['gofly_travel_seasons_name'])): ?>
                            <h5><?php echo esc_html($settings['gofly_travel_seasons_name']) ?></h5>
                        <?php endif; ?>
                        <?php if (!empty($settings['gofly_travel_seasons_weather'])): ?>
                            <span><?php echo esc_html($settings['gofly_travel_seasons_weather']) ?></span>
                        <?php endif; ?>
                        <div class="highlights-area">
                            <?php if (!empty($settings['gofly_travel_seasons_hglts_title'])): ?>
                                <h6><?php echo esc_html($settings['gofly_travel_seasons_hglts_title']) ?></h6>
                            <?php endif; ?>
                            <ul>
                                <?php foreach ($array_list as $normal): ?>
                                    <li>
                                        <svg width="16" height="16" viewBox="0 0 16 16" fill="none"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <rect width="16" height="16" rx="8" />
                                            <path
                                                d="M11.6947 6.45771L7.24644 10.9083C7.17556 10.9768 7.08572 11.0123 6.99596 11.0123C6.9494 11.0124 6.90328 11.0033 6.86027 10.9854C6.81727 10.9676 6.77822 10.9414 6.7454 10.9083L4.3038 8.46675C4.16436 8.32963 4.16436 8.10515 4.3038 7.96571L5.16652 7.10059C5.29892 6.96827 5.53524 6.96827 5.66764 7.10059L6.99596 8.42891L10.3309 5.09155C10.3638 5.05862 10.4028 5.03249 10.4457 5.01465C10.4887 4.9968 10.5347 4.98759 10.5812 4.98755C10.6757 4.98755 10.7656 5.02539 10.8317 5.09155L11.6944 5.95675C11.8341 6.09619 11.8341 6.32067 11.6947 6.45771Z" />
                                        </svg>
                                        <?php echo esc_html($normal) ?>
                                    </li>
                                <?php endforeach; ?>
                            </ul>
                        </div>
                    </div>
                </div>
                <?php if (!empty($settings['gofly_travel_seasons_note_list'])): ?>
                    <span class="note"><?php echo esc_html($settings['gofly_travel_seasons_note_list']) ?></span>
                <?php endif; ?>
            </div>
        </div>

<?php

    }
}

Plugin::instance()->widgets_manager->register(new Gofly_Travel_Seasons_Widget());
