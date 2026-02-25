<?php

namespace Elementor;

if (!defined('ABSPATH')) exit;  // Exit if accessed directly

use Elementor\core\Schemes;
use Elementor\Group_Control_Typography;
use Egns_Core\Egns_Helper;

class Gofly_Button_Widget extends Widget_Base
{

    public function get_name()
    {
        return 'gofly_button';
    }

    public function get_title()
    {
        return esc_html__('EG Button', 'gofly-core');
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
            'gofly_button_genaral',
            [
                'label' => esc_html__('General', 'gofly-core')
            ]
        );

        $this->add_control(
            'gofly_buttons_style_selection',
            [
                'label'   => esc_html__('Button Style', 'gofly-core'),
                'type'    => Controls_Manager::SELECT,
                'options' => [
                    'style_one'   => esc_html__('Style One', 'gofly-core'),
                    'style_two'   => esc_html__('Style Two', 'gofly-core'),
                    'style_three' => esc_html__('Style Three', 'gofly-core'),
                ],
                'default' => 'style_one',
            ]
        );

        $this->add_control(
            'gofly_button_label',
            [
                'label'       => esc_html__('Label', 'gofly-core'),
                'type'        => \Elementor\Controls_Manager::TEXT,
                'default'     => esc_html__('Book Now', 'gofly-core'),
                'placeholder' => esc_html__('write your label here', 'gofly-core'),
                'label_block' => true,
            ]
        );

        $this->add_control(
            'gofly_button_icon',
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

        $this->add_control(
            'gofly_button_link',
            [
                'label'       => esc_html__('Link', 'gofly-core'),
                'type'        => \Elementor\Controls_Manager::URL,
                'default'     => ['url' => '#'],
                'placeholder' => esc_html__('write your url here', 'gofly-core'),
                'label_block' => true,
                'condition'   => [
                    'gofly_buttons_style_selection' => ['style_one', 'style_three']
                ]
            ]
        );

        $this->add_control(
            'gofly_button_id',
            [
                'label'       => esc_html__('Button ID', 'gofly-core'),
                'type'        => \Elementor\Controls_Manager::TEXT,
                'placeholder' => esc_html__('myid', 'gofly-core'),
                'label_block' => true,
            ]
        );


        $this->end_controls_section();

        //============Style One Start=============//

        $this->start_controls_section(
            'gofly_button_styles',
            [
                'label'     => esc_html__('Styles', 'gofly-core'),
                'tab'       => Controls_Manager::TAB_STYLE,
                'condition' => [
                    'gofly_buttons_style_selection' => ['style_one'],
                ]
            ]
        );

        $this->add_control(
            'gofly_button_general_style',
            [
                'label'     => esc_html__('General Style', 'gofly-core'),
                'type'      => \Elementor\Controls_Manager::HEADING,
                'separator' => 'after',
            ]
        );

        // Tabs
        $this->start_controls_tabs(
            'gofly_button_tabs'
        );

        $this->start_controls_tab(
            'gofly_button_normal_style_tab',
            [
                'label' => esc_html__(
                    'Normal',
                    'gofly-core'
                ),
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'label'    => esc_html__('Typography', 'gofly-core'),
                'name'     => 'gofly_button_normal_label_typ',
                'selector' => '{{WRAPPER}} .primary-btn1',

            ]
        );

        $this->add_control(
            'gofly_button_normal_label_color',
            [
                'label'     => esc_html__('Color', 'gofly-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}}  .primary-btn1' => 'color: {{VALUE}};',

                ],
            ]
        );

        $this->add_control(
            'gofly_button_normal_icon_color',
            [
                'label'     => esc_html__('Icon Color', 'gofly-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}}  .primary-btn1 svg' => 'fill: {{VALUE}};',

                ],
            ]
        );

        $this->add_control(
            'gofly_button_normal_background_color',
            [
                'label'     => esc_html__('Background Color', 'gofly-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}}  .primary-btn1' => 'background: {{VALUE}};',

                ],
            ]
        );

        $this->add_responsive_control(
            'gofly_button_normal_margin',
            [
                'label' => esc_html__(
                    'Margin',
                    'gofly-core'
                ),
                'type'       => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors'  => [
                    '{{WRAPPER}} .primary-btn1' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'gofly_button_normal_padding',
            [
                'label'      => esc_html__(
                    'Padding',
                    'gofly-core'
                ),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%'],
                'selectors'  => [
                    '{{WRAPPER}} .primary-btn1' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'
                ]
            ]
        );

        $this->add_group_control(
            \Elementor\Group_Control_Border::get_type(),
            [
                'name'     => 'gofly_button_one_border',
                'selector' => '{{WRAPPER}} .primary-btn1',
            ]
        );

        $this->add_responsive_control(
            'gofly_button_normal_border_radius',
            [
                'label'      => esc_html__(
                    'Border Radius',
                    'gofly-core'
                ),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%'],
                'selectors'  => [
                    '{{WRAPPER}} .primary-btn1' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'
                ]
            ]
        );

        $this->end_controls_tab();

        // Hover start
        $this->start_controls_tab(
            'gofly_button_one_hover_tab',
            [
                'label' => esc_html__('Hover', 'gofly-core'),
            ]
        );

        $this->add_control(
            'gofly_button_one_hover_tab_color',
            [
                'label'     => esc_html__('Color', 'gofly-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}}  .primary-btn1:hover' => 'color: {{VALUE}};',

                ],
            ]
        );

        $this->add_control(
            'gofly_button_one_hover_tab_icon_color',
            [
                'label'     => esc_html__('Icon Color', 'gofly-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}}  .primary-btn1:hover svg' => 'fill: {{VALUE}};',

                ],
            ]
        );

        $this->add_control(
            'gofly_button_one_hover_tab_background_color',
            [
                'label'     => esc_html__('Background Color', 'gofly-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .primary-btn1::after' => 'background-color: {{VALUE}};',
                ],
            ]
        );

        $this->end_controls_tab();
        $this->end_controls_tabs();

        $this->end_controls_section();

        //============Style One End=============//

        //============Style Two Start=============//

        $this->start_controls_section(
            'gofly_button_two_styles',
            [
                'label'     => esc_html__('Styles', 'gofly-core'),
                'tab'       => Controls_Manager::TAB_STYLE,
                'condition' => [
                    'gofly_buttons_style_selection' => ['style_two'],
                ]
            ]
        );

        $this->add_control(
            'gofly_button_two_general_style',
            [
                'label'     => esc_html__('General Style', 'gofly-core'),
                'type'      => \Elementor\Controls_Manager::HEADING,
                'separator' => 'after',
            ]
        );

        // Tabs
        $this->start_controls_tabs(
            'gofly_button_two_tabs'
        );

        $this->start_controls_tab(
            'gofly_button_two_normal_style_tab',
            [
                'label' => esc_html__(
                    'Normal',
                    'gofly-core'
                ),
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'label'    => esc_html__('Typography', 'gofly-core'),
                'name'     => 'gofly_button_two_normal_label_typ',
                'selector' => '{{WRAPPER}} .primary-btn1',

            ]
        );

        $this->add_control(
            'gofly_button_two_normal_label_color',
            [
                'label'     => esc_html__('Color', 'gofly-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}}  .primary-btn1' => 'color: {{VALUE}};',

                ],
            ]
        );

        $this->add_control(
            'gofly_button_two_normal_icon_color',
            [
                'label'     => esc_html__('Icon Color', 'gofly-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}}  .primary-btn1 svg' => 'fill: {{VALUE}};',

                ],
            ]
        );

        $this->add_control(
            'gofly_button_two_normal_background_color',
            [
                'label'     => esc_html__('Background Color', 'gofly-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}}  .primary-btn1' => 'background: {{VALUE}};',

                ],
            ]
        );

        $this->add_responsive_control(
            'gofly_button_two_normal_margin',
            [
                'label' => esc_html__(
                    'Margin',
                    'gofly-core'
                ),
                'type'       => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors'  => [
                    '{{WRAPPER}} .primary-btn1' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'gofly_button_two_normal_padding',
            [
                'label'      => esc_html__(
                    'Padding',
                    'gofly-core'
                ),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%'],
                'selectors'  => [
                    '{{WRAPPER}} .primary-btn1' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'
                ]
            ]
        );

        $this->add_group_control(
            \Elementor\Group_Control_Border::get_type(),
            [
                'name'     => 'border',
                'selector' => '{{WRAPPER}} .primary-btn1',
            ]
        );

        $this->add_responsive_control(
            'gofly_button_two_normal_border_radius',
            [
                'label'      => esc_html__(
                    'Border Radius',
                    'gofly-core'
                ),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%'],
                'selectors'  => [
                    '{{WRAPPER}} .primary-btn1' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'
                ]
            ]
        );

        $this->end_controls_tab();

        // Hover start
        $this->start_controls_tab(
            'gofly_button_two_hover_tab',
            [
                'label' => esc_html__('Hover', 'gofly-core'),
            ]
        );

        $this->add_control(
            'gofly_button_two_hover_tab_color',
            [
                'label'     => esc_html__('Color', 'gofly-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}}  .primary-btn1:hover' => 'color: {{VALUE}};',

                ],
            ]
        );

        $this->add_control(
            'gofly_button_two_hover_tab_icon_color',
            [
                'label'     => esc_html__('Icon Color', 'gofly-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}}  .primary-btn1:hover svg' => 'fill: {{VALUE}};',

                ],
            ]
        );

        $this->add_control(
            'gofly_button_two_hover_tab_background_color',
            [
                'label'     => esc_html__('Background Color', 'gofly-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .primary-btn1::after' => 'background-color: {{VALUE}};',
                ],
            ]
        );

        $this->end_controls_tab();
        $this->end_controls_tabs();

        $this->end_controls_section();

        $this->start_controls_section(
            'gofly_button_icon_styles',
            [
                'label' => esc_html__('Icon', 'gofly-core'),
                'tab'   => Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_control(
            'gofly_button_icon_style',
            [
                'label'     => esc_html__('General Style', 'gofly-core'),
                'type'      => \Elementor\Controls_Manager::HEADING,
                'separator' => 'after',
            ]
        );
        $this->add_control(
            'gofly_button_icon_size',
            [
                'label'      => esc_html__('Size', 'gofly-core'),
                'type'       => \Elementor\Controls_Manager::SLIDER,
                'size_units' => ['px', '%', 'em', 'rem', 'custom'],
                'range'      => [
                    'px' => [
                        'min'  => 0,
                        'max'  => 1000,
                        'step' => 1,
                    ],
                    '%' => [
                        'min' => 0,
                        'max' => 100,
                    ],
                ],
                'default' => [
                    'unit' => 'px',
                    'size' => 20,
                ],
                'selectors' => [
                    '{{WRAPPER}} .primary-btn1 svg' => 'width: {{SIZE}}{{UNIT}};',
                    '{{WRAPPER}} .primary-btn1 svg' => 'height: {{SIZE}}{{UNIT}};',
                ],
            ]
        );

        $this->end_controls_section();

        // Style Three starts

        $this->start_controls_section(
            'gofly_button_styles_three',
            [
                'label'     => esc_html__('Styles', 'gofly-core'),
                'tab'       => Controls_Manager::TAB_STYLE,
                'condition' => [
                    'gofly_buttons_style_selection' => ['style_three'],
                ]
            ]
        );

        $this->add_control(
            'gofly_button_styles_three_button',
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
                'name'     => 'gofly_button_styles_three_button_typ',
                'selector' => '{{WRAPPER}} .custom-btn a',

            ]
        );

        $this->add_control(
            'gofly_button_styles_three_button_icon_color',
            [
                'label'     => esc_html__('Icon Color', 'gofly-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .custom-btn a svg' => 'stroke: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'gofly_button_styles_three_button_hover_icon_color',
            [
                'label'     => esc_html__('Hover Icon Color', 'gofly-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .custom-btn:hover a svg' => 'stroke: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'gofly_button_styles_three_button_color',
            [
                'label'     => esc_html__('Color', 'gofly-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .custom-btn a' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'gofly_button_styles_three_button_hover_color',
            [
                'label'     => esc_html__('Hover Color', 'gofly-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .custom-btn:hover a' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'gofly_button_three_normal_padding',
            [
                'label'      => esc_html__(
                    'Padding',
                    'gofly-core'
                ),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%'],
                'selectors'  => [
                    '{{WRAPPER}} .primary-btn1' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'
                ]
            ]
        );

        $this->add_group_control(
            \Elementor\Group_Control_Border::get_type(),
            [
                'name'     => 'gofly_button_three_normal_border',
                'selector' => '{{WRAPPER}} .primary-btn1',
            ]
        );

        $this->add_responsive_control(
            'gofly_button_three_normal_border_radius',
            [
                'label'      => esc_html__(
                    'Border Radius',
                    'gofly-core'
                ),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%'],
                'selectors'  => [
                    '{{WRAPPER}} .primary-btn1' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'
                ]
            ]
        );

        $this->end_controls_section();



        //============Style Two End=============//

    }
    protected function render()
    {

        $settings = $this->get_settings_for_display();
?>


        <?php
        if ($settings['gofly_buttons_style_selection'] == 'style_one' && ! empty($settings['gofly_button_label'])):
        ?>
            <a href="<?php echo esc_url($settings['gofly_button_link']['url']); ?>" class="primary-btn1" <?php echo !empty($settings['gofly_button_id']) ? 'id="' . esc_attr($settings['gofly_button_id']) . '"' : ''; ?>>
                <span>
                    <?php echo esc_html($settings['gofly_button_label']); ?>
                    <?php \Elementor\Icons_Manager::render_icon($settings['gofly_button_icon'], ['aria-hidden' => 'true']); ?>
                </span>
                <span>
                    <?php echo esc_html($settings['gofly_button_label']); ?>
                    <?php \Elementor\Icons_Manager::render_icon($settings['gofly_button_icon'], ['aria-hidden' => 'true']); ?>
                </span>
            </a>
        <?php endif; ?>

        <?php
        if ($settings['gofly_buttons_style_selection'] == 'style_two' && ! empty($settings['gofly_button_label'])):
        ?>
            <button type="submit" class="primary-btn1" <?php echo !empty($settings['gofly_button_id']) ? 'id="' . esc_attr($settings['gofly_button_id']) . '"' : ''; ?>>
                <span>
                    <?php \Elementor\Icons_Manager::render_icon($settings['gofly_button_icon'], ['aria-hidden' => 'true']); ?>
                    <?php echo esc_html($settings['gofly_button_label']); ?>
                </span>
                <span>
                    <?php \Elementor\Icons_Manager::render_icon($settings['gofly_button_icon'], ['aria-hidden' => 'true']); ?>
                    <?php echo esc_html($settings['gofly_button_label']); ?>
                </span>
            </button>
        <?php endif; ?>

        <?php
        if ($settings['gofly_buttons_style_selection'] == 'style_three' && ! empty($settings['gofly_button_label'])):
        ?>
            <div class="custom-btn">
                <a href="<?php echo esc_url($settings['gofly_button_link']['url']); ?>"><?php echo esc_html($settings['gofly_button_label']); ?>
                    <svg width="10" height="10" viewBox="0 0 10 10" xmlns="http://www.w3.org/2000/svg">
                        <path d="M1 9L9 1M9 1C7.22222 1.33333 3.33333 2 1 1M9 1C8.66667 2.66667 8 6.33333 9 9" stroke-width="1.5" stroke-linecap="round"></path>
                    </svg>
                </a>
            </div>

        <?php endif; ?>

<?php

    }
}

Plugin::instance()->widgets_manager->register(new Gofly_Button_Widget());
