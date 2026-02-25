<?php

namespace Elementor;

if (!defined('ABSPATH')) exit;  // Exit if accessed directly

use Elementor\core\Schemes;
use Egns_Core\Egns_Helper;

class Gofly_Partner_Widget extends Widget_Base
{

    public function get_name()
    {
        return 'gofly_partner';
    }

    public function get_title()
    {
        return esc_html__('EG Partner', 'gofly-core');
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
            'gofly_partner_genaral',
            [
                'label' => esc_html__('General', 'gofly-core')
            ]
        );

        $this->add_control(
            'gofly_partner_logo_genaral_title',
            [
                'label'       => esc_html__('Title', 'gofly-core'),
                'type'        => \Elementor\Controls_Manager::TEXT,
                'default'     => esc_html__('Those Company You Can Easily Trust!', 'gofly-core'),
                'placeholder' => esc_html__('write your text here', 'gofly-core'),
                'label_block' => true,
            ]
        );

        $repeater = new \Elementor\Repeater();

        $repeater->add_control(
            'gofly_partner_logo_genaral_logo',
            [
                'label'       => esc_html__('Logo', 'gofly-core'),
                'type'        => \Elementor\Controls_Manager::MEDIA,
                'media_types' => ['svg', 'image'],
                'default'     => [
                    'url' => \Elementor\Utils::get_placeholder_image_src(),
                ],

            ]
        );

        $repeater->add_control(
            'gofly_partner_logo_genaral_logo_url',
            [
                'label'       => esc_html__('Logo URL', 'gofly-core'),
                'type'        => \Elementor\Controls_Manager::URL,
                'placeholder' => esc_html__('https://your-link.com', 'gofly-core'),
                'options'     => ['url', 'is_external', 'nofollow'],
                'default'     => [
                    'url'         => '#',
                    'is_external' => true,
                    'nofollow'    => true,
                    // 'custom_attributes' => '',
                ],
                'label_block' => true,

            ]
        );

        $this->add_control(
            'gofly_partner_logo_genaral_logo_list',
            [
                'label'   => esc_html__('Logo List', 'gofly-core'),
                'type'    => \Elementor\Controls_Manager::REPEATER,
                'fields'  => $repeater->get_controls(),
                'default' => [
                    [
                        'gofly_partner_logo_genaral_logo' => [
                            'url' => \Elementor\Utils::get_placeholder_image_src(),
                        ],
                    ],
                    [
                        'gofly_partner_logo_genaral_logo' => [
                            'url' => \Elementor\Utils::get_placeholder_image_src(),
                        ],
                    ],
                    [
                        'gofly_partner_logo_genaral_logo' => [
                            'url' => \Elementor\Utils::get_placeholder_image_src(),
                        ],
                    ],
                    [
                        'gofly_partner_logo_genaral_logo' => [
                            'url' => \Elementor\Utils::get_placeholder_image_src(),
                        ],
                    ],

                ],
            ]
        );

        $this->end_controls_section();

        //=====================Style One Start=======================//

        $this->start_controls_section(
            'gofly_partner_logo_style_genaral',
            [
                'label' => esc_html__('Styles', 'gofly-core'),
                'tab'   => Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_control(
            'gofly_partner_logo_style_genaral_title',
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
                'name'     => 'gofly_partner_logo_style_genaral_title_typ',
                'selector' => '{{WRAPPER}} .partner-section .partner-title h5',

            ]
        );

        $this->add_control(
            'gofly_partner_logo_style_genaral_title_color',
            [
                'label'     => esc_html__('Color', 'gofly-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .partner-section .partner-title h5' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->end_controls_section();
    }
    protected function render()
    {

        $settings = $this->get_settings_for_display();

?>
        <div class="partner-section">
            <div class="container">
                <?php if (!empty($settings['gofly_partner_logo_genaral_title'])): ?>
                    <div class="partner-title wow animate fadeInDown" data-wow-delay="200ms" data-wow-duration="1500ms">
                        <h5><?php echo esc_html($settings['gofly_partner_logo_genaral_title']); ?></h5>
                    </div>
                <?php endif; ?>
                <div class="partner-wrap">
                    <div class="marquee">
                        <div class="marquee__group">
                            <?php foreach ($settings['gofly_partner_logo_genaral_logo_list'] as $partner): ?>
                                <?php if (!empty($partner['gofly_partner_logo_genaral_logo']['url'])) : ?>
                                    <a href="<?php echo esc_url($partner['gofly_partner_logo_genaral_logo_url']['url']); ?>"><img src="<?php echo esc_url($partner['gofly_partner_logo_genaral_logo']['url']); ?>" alt="<?php echo esc_attr__('partner-logo', 'gofly-core'); ?>"></a>
                                <?php endif; ?>
                            <?php endforeach; ?>
                        </div>
                        <div aria-hidden="true" class="marquee__group">
                            <?php foreach ($settings['gofly_partner_logo_genaral_logo_list'] as $partner): ?>
                                <a href="<?php echo esc_url($partner['gofly_partner_logo_genaral_logo_url']['url']); ?>"><img src="<?php echo esc_url($partner['gofly_partner_logo_genaral_logo']['url']); ?>" alt="<?php echo esc_attr__('partner-logo', 'gofly-core'); ?>"></a>
                            <?php endforeach; ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>


<?php

    }
}

Plugin::instance()->widgets_manager->register(new Gofly_Partner_Widget());
