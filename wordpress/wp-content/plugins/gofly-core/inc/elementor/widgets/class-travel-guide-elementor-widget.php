<?php

namespace Elementor;

if (!defined('ABSPATH')) exit;  // Exit if accessed directly

use Elementor\core\Schemes;
use Egns_Core\Egns_Helper;

class Gofly_Travel_Guide_Widget extends Widget_Base
{

    public function get_name()
    {
        return 'gofly_travel_guide';
    }

    public function get_title()
    {
        return esc_html__('EG Travel Guide', 'gofly-core');
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

        //===================== Travel Guide Content =======================//

        $this->start_controls_section(
            'gofly_travel_guide_section',
            [
                'label' => esc_html__('Travel Guide', 'gofly-core')
            ]
        );
        $this->add_control(
            'gofly_travel_guide_img',
            [
                'label'   => esc_html__('Guide Image', 'gofly-core'),
                'type'    => \Elementor\Controls_Manager::MEDIA,
                'default' => [
                    'url' => \Elementor\Utils::get_placeholder_image_src(),
                ],
            ],
        );
        $this->add_control(
            'gofly_travel_guide_name',
            [
                'label'       => esc_html__('Name', 'gofly-core'),
                'type'        => \Elementor\Controls_Manager::TEXT,
                'default'     => esc_html__('Mrs. Emelia Jong', 'gofly-core'),
                'placeholder' => esc_html__('write your name here', 'gofly-core'),
                'label_block' => true,
            ]
        );
        $this->add_control(
            'gofly_travel_guide_designation',
            [
                'label'       => esc_html__('Designation', 'gofly-core'),
                'type'        => \Elementor\Controls_Manager::TEXT,
                'default'     => esc_html__('GoFly Guider', 'gofly-core'),
                'placeholder' => esc_html__('write your designation here', 'gofly-core'),
                'label_block' => true,
            ]
        );
        $this->add_control(
            'gofly_travel_guide_link',
            [
                'label'   => esc_html__('Travel Guide link', 'gofly-core'),
                'type'    => \Elementor\Controls_Manager::URL,
                'options' => ['url', 'is_external', 'nofollow'],
                'default' => [
                    'url'         => '#',
                    'is_external' => true,
                    'nofollow'    => true,
                ],
                'label_block' => true,
            ]
        );
        // social media 
        $this->add_control(
            'gofly_travel_guide_social_popover_toggle',
            [
                'label'        => esc_html__('Social Media', 'gofly-core'),
                'type'         => \Elementor\Controls_Manager::POPOVER_TOGGLE,
                'label_off'    => esc_html__('Default', 'gofly-core'),
                'label_on'     => esc_html__('Custom', 'gofly-core'),
                'return_value' => 'yes',
                'default'      => 'yes',
            ]
        );

        $this->start_popover();
        $this->add_control(
            'website_link_facebook',
            [
                'label'       => esc_html__('Facebook', 'gofly-core'),
                'type'        => \Elementor\Controls_Manager::URL,
                'placeholder' => esc_html__('https://your-link.com', 'gofly-core'),
                'default'     => [
                    'url'         => 'https://www.facebook.com/',
                    'is_external' => true,
                    'nofollow'    => true,
                ],
                'label_block' => true,
            ]
        );
        $this->add_control(
            'website_link_twitter',
            [
                'label'       => esc_html__('Twitter', 'gofly-core'),
                'type'        => \Elementor\Controls_Manager::URL,
                'placeholder' => esc_html__('https://your-link.com', 'gofly-core'),
                'default'     => [
                    'url'         => 'https://twitter.com/',
                    'is_external' => true,
                    'nofollow'    => true,
                ],
                'label_block' => true,
            ]
        );
        $this->add_control(
            'website_link_pinterest',
            [
                'label'       => esc_html__('Pinterest', 'gofly-core'),
                'type'        => \Elementor\Controls_Manager::URL,
                'placeholder' => esc_html__('https://your-link.com', 'gofly-core'),
                'default'     => [
                    'url'         => 'https://www.pinterest.com/',
                    'is_external' => true,
                    'nofollow'    => true,
                ],
                'label_block' => true,
            ]
        );
        $this->add_control(
            'website_link_instagram',
            [
                'label'       => esc_html__('Instagram', 'gofly-core'),
                'type'        => \Elementor\Controls_Manager::URL,
                'placeholder' => esc_html__('https://your-link.com', 'gofly-core'),
                'default'     => [
                    'url'         => 'https://www.instagram.com/',
                    'is_external' => true,
                    'nofollow'    => true,
                ],
                'label_block' => true,
            ]
        );
        $this->add_control(
            'website_link_linkedin',
            [
                'label'       => esc_html__('Linkedin', 'gofly-core'),
                'type'        => \Elementor\Controls_Manager::URL,
                'placeholder' => esc_html__('https://your-link.com', 'gofly-core'),
                'default'     => [
                    'url'         => '',
                    'is_external' => true,
                    'nofollow'    => true,
                ],
                'label_block' => true,
            ]
        );
        $this->add_control(
            'website_link_reddit',
            [
                'label'       => esc_html__('Reddit', 'gofly-core'),
                'type'        => \Elementor\Controls_Manager::URL,
                'placeholder' => esc_html__('https://your-link.com', 'gofly-core'),
                'default'     => [
                    'url'         => '',
                    'is_external' => true,
                    'nofollow'    => true,
                ],
                'label_block' => true,
            ]
        );
        $this->add_control(
            'website_link_behance',
            [
                'label'       => esc_html__('Behance', 'gofly-core'),
                'type'        => \Elementor\Controls_Manager::URL,
                'placeholder' => esc_html__('https://your-link.com', 'gofly-core'),
                'default'     => [
                    'url'         => '',
                    'is_external' => true,
                    'nofollow'    => true,
                ],
                'label_block' => true,
            ]
        );
        $this->add_control(
            'website_link_stackoverflow',
            [
                'label'       => esc_html__('Stackoverflow', 'gofly-core'),
                'type'        => \Elementor\Controls_Manager::URL,
                'placeholder' => esc_html__('https://your-link.com', 'gofly-core'),
                'default'     => [
                    'url'         => '',
                    'is_external' => true,
                    'nofollow'    => true,
                ],
                'label_block' => true,
            ]
        );
        $this->end_popover();


        $this->end_controls_section();


        //=====================  Travel Guide Style =======================//

        $this->start_controls_section(
            'gofly_travel_guide_style_section',
            [
                'label' => esc_html__("Travel Guide Style", 'gofly-core'),
                'tab'   => \Elementor\Controls_Manager::TAB_STYLE,
            ]
        );
        // Image 
        $this->add_control(
            'gofly_travel_guide_img_options',
            [
                'label' => esc_html__('Image Options', 'gofly-core'),
                'type'  => \Elementor\Controls_Manager::HEADING,
            ]
        );
        $this->add_control(
            'gofly_travel_guide_img_radius',
            [
                'label'      => esc_html__('Border Radius', 'gofly-core'),
                'type'       => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'rem', 'custom'],
                'selectors'  => [
                    '{{WRAPPER}} .tour-guide-card.two .guide-img-wrap .guide-img'     => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                    '{{WRAPPER}} .tour-guide-card.two .guide-img-wrap .guide-img img' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        // Name 
        $this->add_control(
            'gofly_travel_guide_name_options',
            [
                'label'     => esc_html__('Name Options', 'gofly-core'),
                'type'      => \Elementor\Controls_Manager::HEADING,
                'separator' => 'before',
            ]
        );
        $this->add_control(
            'gofly_travel_guide_name_color',
            [
                'label'     => esc_html__('Color', 'gofly-core'),
                'type'      => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .tour-guide-card .guide-info h5 a' => 'color: {{VALUE}}',
                ],
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name'     => 'gofly_travel_guide_name_typography',
                'selector' => '{{WRAPPER}} .tour-guide-card .guide-info h5 a',
            ]
        );
        // Designation
        $this->add_control(
            'gofly_travel_guide_designation_options',
            [
                'label'     => esc_html__('Designation Options', 'gofly-core'),
                'type'      => \Elementor\Controls_Manager::HEADING,
                'separator' => 'before',
            ]
        );
        $this->add_control(
            'gofly_travel_guide_designation_color',
            [
                'label'     => esc_html__('Color', 'gofly-core'),
                'type'      => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .tour-guide-card .guide-info span' => 'color: {{VALUE}}',
                ],
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name'     => 'gofly_travel_guide_designation_typography',
                'selector' => '{{WRAPPER}} .tour-guide-card .guide-info span',
            ]
        );
        // Social Media
        $this->add_control(
            'gofly_travel_guide_social_options',
            [
                'label'     => esc_html__('Social Media Options', 'gofly-core'),
                'type'      => \Elementor\Controls_Manager::HEADING,
                'separator' => 'before',
            ]
        );

        //Start main tabs
        $this->start_controls_tabs(
            'gofly_travel_guide_social_button_style_tabs',
        );

        // Normal style 
        $this->start_controls_tab(
            'gofly_travel_guide_social_style_normal_tab',
            [
                'label' => esc_html__('Normal', 'gofly-core'),
            ]
        );
        $this->add_control(
            'gofly_travel_guide_social_icon_color',
            [
                'label'     => esc_html__('Color', 'gofly-core'),
                'type'      => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .tour-guide-card .guide-img-wrap .social-list li a i' => 'color: {{VALUE}}',
                ],
            ]
        );
        $this->add_control(
            'gofly_travel_guide_social_icon_bg_color',
            [
                'label'     => esc_html__('BG Color', 'gofly-core'),
                'type'      => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .tour-guide-card .guide-img-wrap .social-list li a' => 'background-color: {{VALUE}}',
                ],
            ]
        );
        $this->add_control(
            'gofly_travel_guide_social_icon_size',
            [
                'label'      => esc_html__('Icon size', 'gofly-core'),
                'type'       => \Elementor\Controls_Manager::SLIDER,
                'size_units' => ['px', 'rem', 'custom'],
                'range'      => [
                    'px' => [
                        'min'  => 0,
                        'max'  => 100,
                        'step' => 1,
                    ],
                ],
                'selectors' => [
                    '{{WRAPPER}} .tour-guide-card .guide-img-wrap .social-list li a i' => 'font-size: {{SIZE}}{{UNIT}};',
                ],
            ]
        );
        $this->add_control(
            'gofly_travel_guide_social_icon_radius',
            [
                'label'      => esc_html__('Border Radius', 'gofly-core'),
                'type'       => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'rem', 'custom'],
                'selectors'  => [
                    '{{WRAPPER}} .tour-guide-card .guide-img-wrap .social-list li a' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->add_control(
            'gofly_travel_guide_social_icon_box_height',
            [
                'label'      => esc_html__('Box height', 'gofly-core'),
                'type'       => \Elementor\Controls_Manager::SLIDER,
                'size_units' => ['px', 'rem', 'custom'],
                'range'      => [
                    'px' => [
                        'min'  => 0,
                        'max'  => 100,
                        'step' => 1,
                    ],
                ],
                'selectors' => [
                    '{{WRAPPER}} .tour-guide-card .guide-img-wrap .social-list li a' => 'height: {{SIZE}}{{UNIT}};',
                ],
            ]
        );
        $this->add_control(
            'gofly_travel_guide_social_icon_box_width',
            [
                'label'      => esc_html__('Box width', 'gofly-core'),
                'type'       => \Elementor\Controls_Manager::SLIDER,
                'size_units' => ['px', 'rem', 'custom'],
                'range'      => [
                    'px' => [
                        'min'  => 0,
                        'max'  => 100,
                        'step' => 1,
                    ],
                ],
                'selectors' => [
                    '{{WRAPPER}} .tour-guide-card .guide-img-wrap .social-list li a' => 'width: {{SIZE}}{{UNIT}};',
                ],
            ]
        );
        $this->end_controls_tab();  //end normal

        // Hover style 
        $this->start_controls_tab(
            'gofly_travel_guide_social_style_hover_tab',
            [
                'label' => esc_html__('Hover', 'gofly-core'),
            ]
        );
        $this->add_control(
            'gofly_travel_guide_social_icon_color_hover',
            [
                'label'     => esc_html__('Color', 'gofly-core'),
                'type'      => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .tour-guide-card .guide-img-wrap .social-list li a:hover i' => 'color: {{VALUE}}',
                ],
            ]
        );
        $this->add_control(
            'gofly_travel_guide_social_icon_bg_color_hover',
            [
                'label'     => esc_html__('BG Color', 'gofly-core'),
                'type'      => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .tour-guide-card .guide-img-wrap .social-list li a:hover' => 'background-color: {{VALUE}}',
                ],
            ]
        );
        $this->add_control(
            'gofly_travel_guide_social_icon_size_hover',
            [
                'label'      => esc_html__('Icon size', 'gofly-core'),
                'type'       => \Elementor\Controls_Manager::SLIDER,
                'size_units' => ['px', 'rem', 'custom'],
                'range'      => [
                    'px' => [
                        'min'  => 0,
                        'max'  => 100,
                        'step' => 1,
                    ],
                ],
                'selectors' => [
                    '{{WRAPPER}} .tour-guide-card .guide-img-wrap .social-list li a:hover i' => 'font-size: {{SIZE}}{{UNIT}};',
                ],
            ]
        );
        $this->add_control(
            'gofly_travel_guide_social_icon_radius_hover',
            [
                'label'      => esc_html__('Border Radius', 'gofly-core'),
                'type'       => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'rem', 'custom'],
                'selectors'  => [
                    '{{WRAPPER}} .tour-guide-card .guide-img-wrap .social-list li a:hover' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->add_control(
            'gofly_travel_guide_social_icon_box_height_hover',
            [
                'label'      => esc_html__('Box height', 'gofly-core'),
                'type'       => \Elementor\Controls_Manager::SLIDER,
                'size_units' => ['px', 'rem', 'custom'],
                'range'      => [
                    'px' => [
                        'min'  => 0,
                        'max'  => 100,
                        'step' => 1,
                    ],
                ],
                'selectors' => [
                    '{{WRAPPER}} .tour-guide-card .guide-img-wrap .social-list li a:hover' => 'height: {{SIZE}}{{UNIT}};',
                ],
            ]
        );
        $this->add_control(
            'gofly_travel_guide_social_icon_box_width_hover',
            [
                'label'      => esc_html__('Box width', 'gofly-core'),
                'type'       => \Elementor\Controls_Manager::SLIDER,
                'size_units' => ['px', 'rem', 'custom'],
                'range'      => [
                    'px' => [
                        'min'  => 0,
                        'max'  => 100,
                        'step' => 1,
                    ],
                ],
                'selectors' => [
                    '{{WRAPPER}} .tour-guide-card .guide-img-wrap .social-list li a:hover' => 'width: {{SIZE}}{{UNIT}};',
                ],
            ]
        );
        $this->end_controls_tab();  //end hover


        $this->end_controls_tabs();
        //End main tabs

        $this->end_controls_section();
    }
    protected function render()
    {

        $settings = $this->get_settings_for_display();

        if (! empty($settings['gofly_travel_guide_link']['url'])) {
            $this->add_link_attributes('gofly_travel_guide_link', $settings['gofly_travel_guide_link']);
        }
?>

        <div class="guider-page">
            <div class="tour-guide-card two wow animate fadeInDown" data-wow-delay="200ms" data-wow-duration="1500ms">
                <div class="guide-img-wrap">
                    <a <?php $this->print_render_attribute_string('gofly_travel_guide_link'); ?> class="guide-img">
                        <img src="<?php echo esc_url($settings['gofly_travel_guide_img']['url']) ?>" alt="<?php echo esc_attr__('travel-guide-image', 'gofly-core'); ?>">
                    </a>
                    <ul class="social-list">
                        <?php if (!empty($settings['website_link_facebook']['url'])): ?>
                            <li>
                                <a href="<?php echo esc_url($settings['website_link_facebook']['url']); ?>"><i class="bx bxl-facebook"></i></a>
                            </li>
                        <?php endif; ?>
                        <?php if (!empty($settings['website_link_twitter']['url'])): ?>
                            <li>
                                <a href="<?php echo esc_url($settings['website_link_twitter']['url']); ?>"><i class="bi bi-twitter-x"></i></a>
                            </li>
                        <?php endif; ?>
                        <?php if (!empty($settings['website_link_pinterest']['url'])): ?>
                            <li>
                                <a href="<?php echo esc_url($settings['website_link_pinterest']['url']); ?>"><i class="bx bxl-pinterest-alt"></i></a>
                            </li>
                        <?php endif; ?>
                        <?php if (!empty($settings['website_link_instagram']['url'])): ?>
                            <li>
                                <a href="<?php echo esc_url($settings['website_link_instagram']['url']); ?>"><i class="bx bxl-instagram"></i></a>
                            </li>
                        <?php endif; ?>
                        <?php if (!empty($settings['website_link_linkedin']['url'])): ?>
                            <li>
                                <a href="<?php echo esc_url($settings['website_link_linkedin']['url']) ?>"><i class='bx bxl-linkedin'></i></a>
                            </li>
                        <?php endif; ?>
                        <?php if (!empty($settings['website_link_stackoverflow']['url'])): ?>
                            <li>
                                <a href="<?php echo esc_url($settings['website_link_stackoverflow']['url']) ?>"><i class='bx bxl-stack-overflow'></i></a>
                            </li>
                        <?php endif; ?>
                        <?php if (!empty($settings['website_link_behance']['url'])): ?>
                            <li>
                                <a href="<?php echo esc_url($settings['website_link_behance']['url']) ?>"><i class='bx bxl-behance'></i></a>
                            </li>
                        <?php endif; ?>
                        <?php if (!empty($settings['website_link_reddit']['url'])): ?>
                            <li>
                                <a href="<?php echo esc_url($settings['website_link_reddit']['url']) ?>"><i class='bx bxl-reddit'></i></a>
                            </li>
                        <?php endif; ?>
                    </ul>
                </div>
                <div class="guide-info">
                    <?php if (!empty($settings['gofly_travel_guide_name'])): ?>
                        <h5><a <?php $this->print_render_attribute_string('gofly_travel_guide_link'); ?>><?php echo esc_html($settings['gofly_travel_guide_name']); ?></a></h5>
                    <?php endif; ?>
                    <?php if (!empty($settings['gofly_travel_guide_designation'])): ?>
                        <span><?php echo esc_html($settings['gofly_travel_guide_designation']); ?></span>
                    <?php endif; ?>
                </div>
            </div>
        </div>

<?php

    }
}

Plugin::instance()->widgets_manager->register(new Gofly_Travel_Guide_Widget());
