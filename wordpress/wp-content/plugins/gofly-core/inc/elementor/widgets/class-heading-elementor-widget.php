<?php

namespace Elementor;

if (!defined('ABSPATH')) exit;  // Exit if accessed directly

use Elementor\core\Schemes;
use Egns_Core\Egns_Helper;

class Gofly_Heading_Widget extends Widget_Base
{

    public function get_name()
    {
        return 'gofly_heading';
    }

    public function get_title()
    {
        return esc_html__('EG Heading', 'gofly-core');
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
            'gofly_heading_genaral',
            [
                'label' => esc_html__('General', 'gofly-core')
            ]
        );

        $this->add_control(
            'gofly_heading_genaral_style_selection',
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
            'gofly_heading_genaral_text_align',
            [
                'label'   => esc_html__('Alignment', 'gofly-core'),
                'type'    => \Elementor\Controls_Manager::CHOOSE,
                'options' => [
                    'left' => [
                        'title' => esc_html__('Left', 'gofly-core'),
                        'icon'  => 'eicon-text-align-left',
                    ],
                    'center' => [
                        'title' => esc_html__('Center', 'gofly-core'),
                        'icon'  => 'eicon-text-align-center',
                    ],
                    'right' => [
                        'title' => esc_html__('Right', 'gofly-core'),
                        'icon'  => 'eicon-text-align-right',
                    ],
                ],
                'default'   => 'center',
                'toggle'    => true,
                'selectors' => [
                    '{{WRAPPER}} .section-title' => 'text-align: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'gofly_heading_genaral_margin',
            [
                'label'      => esc_html__('Margin', 'gofly-core'),
                'type'       => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em', 'rem', 'custom'],
                'selectors'  => [
                    '{{WRAPPER}} .section-title p' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->add_control(
            'gofly_heading_genaral_title',
            [
                'label'       => esc_html__('Title', 'gofly-core'),
                'type'        => \Elementor\Controls_Manager::TEXT,
                'default'     => wp_kses('Popular Package', wp_kses_allowed_html('post')),
                'placeholder' => esc_html__('write your title here', 'gofly-core'),
                'label_block' => true,
            ]
        );

        $this->add_control(
            'gofly_heading_genaral_description',
            [
                'label'       => esc_html__('Description', 'gofly-core'),
                'type'        => \Elementor\Controls_Manager::TEXTAREA,
                'default'     => wp_kses('A curated list of the most popular travel packages based on different destinations.', wp_kses_allowed_html('post')),
                'placeholder' => esc_html__('write your description here', 'gofly-core'),
                'label_block' => true,
            ]
        );


        $this->end_controls_section();

        // Style Card
        $this->start_controls_section(
            'gofly_heading_style_genaral',
            [
                'label' => esc_html__("Styles", 'gofly-core'),
                'tab'   => \Elementor\Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_control(
            'gofly_heading_style_genaral_title',
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
                'name'     => 'gofly_heading_style_genaral_title_typ',
                'selector' => '{{WRAPPER}} .section-title h2',

            ]
        );

        $this->add_control(
            'gofly_heading_style_genaral_title_color',
            [
                'label'     => esc_html__('Color', 'gofly-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .section-title h2' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'gofly_heading_style_genaral_description',
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
                'name'     => 'gofly_heading_style_genaral_description_typ',
                'selector' => '{{WRAPPER}} .section-title p',

            ]
        );

        $this->add_control(
            'gofly_heading_style_genaral_description_color',
            [
                'label'     => esc_html__('Color', 'gofly-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .section-title p' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->end_controls_section();
    }
    protected function render()
    {

        $settings = $this->get_settings_for_display();

?>
        <?php if ($settings['gofly_heading_genaral_style_selection'] == 'style_one'): ?>
            <div class="home1-blog-section">
                <div class="section-title">
                    <?php if (!empty($settings['gofly_heading_genaral_title'])): ?>
                        <h2><?php echo esc_html($settings['gofly_heading_genaral_title']); ?></h2>
                    <?php endif; ?>
                    <?php if (!empty($settings['gofly_heading_genaral_description'])): ?>
                        <p><?php echo esc_html($settings['gofly_heading_genaral_description']); ?></p>
                    <?php endif; ?>
                </div>
            </div>
        <?php endif; ?>

        <?php if ($settings['gofly_heading_genaral_style_selection'] == 'style_two'): ?>
            <div class="why-choose-visa-section">
                <div class="section-title">
                    <?php if (!empty($settings['gofly_heading_genaral_title'])): ?>
                        <span><?php echo esc_html($settings['gofly_heading_genaral_title']); ?></span>
                    <?php endif; ?>
                    <?php if (!empty($settings['gofly_heading_genaral_description'])): ?>
                        <h2><?php echo esc_html($settings['gofly_heading_genaral_description']); ?></h2>
                    <?php endif; ?>
                </div>
            </div>
        <?php endif; ?>
<?php

    }
}

Plugin::instance()->widgets_manager->register(new Gofly_Heading_Widget());
