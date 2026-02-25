<?php

namespace Elementor;

if (!defined('ABSPATH')) exit;  // Exit if accessed directly

use Elementor\core\Schemes;
use Egns_Core\Egns_Helper;

class Gofly_Refund_Widget extends Widget_Base
{

    public function get_name()
    {
        return 'gofly_refund';
    }

    public function get_title()
    {
        return esc_html__('EG Refund', 'gofly-core');
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
            'gofly_refund_genaral',
            [
                'label' => esc_html__('General', 'gofly-core')
            ]
        );

        $this->add_control(
            'gofly_refund_genaral_title',
            [
                'label'       => esc_html__('Title', 'gofly-core'),
                'type'        => \Elementor\Controls_Manager::TEXT,
                'default'     => wp_kses('For only <span>Medical Purpose</span> you can get refund', wp_kses_allowed_html('post')),
                'placeholder' => esc_html__('write your title here', 'gofly-core'),
                'label_block' => true,
            ]
        );

        $repeater = new \Elementor\Repeater();

        $repeater->add_control(
            'gofly_refund_genaral_content_title',
            [
                'label'       => esc_html__('Content Title', 'gofly-core'),
                'type'        => \Elementor\Controls_Manager::TEXT,
                'default'     => esc_html__('Severe Illness or Injury – ', 'gofly-core'),
                'placeholder' => esc_html__('write your text here', 'gofly-core'),
                'label_block' => true,
            ]
        );

        $repeater->add_control(
            'gofly_refund_genaral_content_description',
            [
                'label'       => esc_html__('Description', 'gofly-core'),
                'type'        => \Elementor\Controls_Manager::TEXTAREA,
                'default'     => esc_html__('A serious health condition that prevents travel, confirmed by a medical certificate.', 'gofly-core'),
                'placeholder' => esc_html__('write your text here', 'gofly-core'),
                'label_block' => true,
            ]
        );

        $this->add_control(
            'gofly_refund_genaral_content_list',
            [
                'label'   => esc_html__('Content List', 'gofly-core'),
                'type'    => \Elementor\Controls_Manager::REPEATER,
                'fields'  => $repeater->get_controls(),
                'default' => [
                    [
                        'gofly_refund_genaral_content_title'                    => esc_html('Severe Illness or Injury – '),
                        'gofly_service_genaral_refund_area_content_description' => esc_html('You can hassle-free and fast tour & travel package booking by GoFly.'),

                    ],
                    [
                        'gofly_refund_genaral_content_title'                    => esc_html('Pregnancy-Related Complications – '),
                        'gofly_service_genaral_refund_area_content_description' => esc_html('Agencies have special discounts on flights, hotels, & packages.'),
                    ],
                    [
                        'gofly_refund_genaral_content_title' => esc_html('All regal/proof documents you could submit our GoFly agency.'),
                    ],
                ],
                'title_field' => '{{{ gofly_refund_genaral_content_title }}}',
            ]
        );


        $this->add_control(
            'gofly_refund_genaral_banner_image',
            [
                'label'   => esc_html__('Banner Image', 'gofly-core'),
                'type'    => \Elementor\Controls_Manager::MEDIA,
                'default' => [
                    'url' => \Elementor\Utils::get_placeholder_image_src(),
                ],
            ]
        );

        $this->add_control(
            'gofly_refund_genaral_vector_image',
            [
                'label'   => esc_html__('Vector Image', 'gofly-core'),
                'type'    => \Elementor\Controls_Manager::MEDIA,
                'default' => [
                    'url' => \Elementor\Utils::get_placeholder_image_src(),
                ],
            ]
        );

        $this->end_controls_section();

        //=====================Style One Start=======================//

        $this->start_controls_section(
            'gofly_refund_style_genaral',
            [
                'label' => esc_html__('Styles', 'gofly-core'),
                'tab'   => Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_control(
            'gofly_refund_style_genaral_section',
            [
                'label'     => esc_html__('Section', 'gofly-core'),
                'type'      => \Elementor\Controls_Manager::HEADING,
                'separator' => 'after',
            ]
        );

        $this->add_control(
            'gofly_refund_style_genaral_section_bg_color',
            [
                'label'     => esc_html__('Background Color', 'gofly-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .home8-process-section' => 'background-color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'gofly_refund_style_genaral_section_icon',
            [
                'label'     => esc_html__('Icon', 'gofly-core'),
                'type'      => \Elementor\Controls_Manager::HEADING,
                'separator' => 'after',
            ]
        );

        $this->add_control(
            'gofly_refund_style_genaral_section_icon_color',
            [
                'label'     => esc_html__('Icon Color', 'gofly-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .refund-area .refund-wrap .refund-content ul li svg' => 'fill: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'gofly_refund_style_genaral_section_icon_border_color',
            [
                'label'     => esc_html__('Icon Border Color', 'gofly-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .refund-area .refund-wrap .refund-content ul li svg circle' => 'stroke: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'gofly_refund_style_genaral_section_title',
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
                'name'     => 'gofly_refund_style_genaral_section_title_typ',
                'selector' => '{{WRAPPER}} .refund-area .refund-wrap .refund-content ul li span',

            ]
        );

        $this->add_control(
            'gofly_refund_style_genaral_section_title_color',
            [
                'label'     => esc_html__('Color', 'gofly-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .refund-area .refund-wrap .refund-content ul li span' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'gofly_refund_style_genaral_section_description',
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
                'name'     => 'gofly_refund_style_genaral_section_description_typ',
                'selector' => '{{WRAPPER}} .refund-area .refund-wrap .refund-content ul li',

            ]
        );

        $this->add_control(
            'gofly_refund_style_genaral_section_description_color',
            [
                'label'     => esc_html__('Color', 'gofly-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .refund-area .refund-wrap .refund-content ul li' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->end_controls_section();
    }
    protected function render()
    {

        $settings = $this->get_settings_for_display();
?>

        <div class="refund-area two wow animate fadeInUp" data-wow-delay="200ms" data-wow-duration="1500ms">
            <div class="container">
                <div class="refund-wrap">
                    <div class="refund-content">
                        <?php if (!empty($settings['gofly_refund_genaral_title'])): ?>
                            <h4><?php echo wp_kses($settings['gofly_refund_genaral_title'], wp_kses_allowed_html('post'))  ?></h4>
                        <?php endif; ?>
                        <ul>
                            <?php foreach ($settings['gofly_refund_genaral_content_list'] as $data): ?>
                                <li>
                                    <svg width="18" height="18" viewBox="0 0 18 18" xmlns="http://www.w3.org/2000/svg">
                                        <circle cx="9" cy="9" r="8.5" />
                                        <path
                                            d="M13.6193 7.07232L8.05899 12.6356C7.97039 12.7212 7.85809 12.7656 7.74589 12.7656C7.68769 12.7657 7.63004 12.7543 7.57629 12.732C7.52253 12.7096 7.47373 12.6769 7.43269 12.6356L4.38069 9.58362C4.20639 9.41222 4.20639 9.13162 4.38069 8.95732L5.45909 7.87592C5.62459 7.71052 5.91999 7.71052 6.08549 7.87592L7.74589 9.53632L11.9146 5.36462C11.9557 5.32346 12.0044 5.2908 12.0581 5.26849C12.1118 5.24619 12.1694 5.23468 12.2275 5.23462C12.3456 5.23462 12.4579 5.28192 12.5406 5.36462L13.619 6.44612C13.7936 6.62042 13.7936 6.90102 13.6193 7.07232Z" />
                                    </svg>
                                    <div class="content">
                                        <?php if (!empty($data['gofly_refund_genaral_content_title'])): ?><span><?php echo esc_html($data['gofly_refund_genaral_content_title']); ?></span><?php endif; ?> <?php if (!empty($data['gofly_refund_genaral_content_description'])): ?> <?php echo esc_html($data['gofly_refund_genaral_content_description']); ?> <?php endif; ?>
                                    </div>
                                </li>
                            <?php endforeach; ?>
                        </ul>
                    </div>
                    <?php if (!empty($settings['gofly_refund_genaral_banner_image']['url'])): ?>
                        <div class="refund-img">
                            <img src="<?php echo esc_url($settings['gofly_refund_genaral_banner_image']['url']); ?>" alt="<?php echo esc_attr__('banner-image', 'gofly-core'); ?>">
                        </div>
                    <?php endif; ?>
                </div>
            </div>
            <?php if (!empty($settings['gofly_refund_genaral_vector_image']['url'])): ?>
                <img src="<?php echo esc_url($settings['gofly_refund_genaral_vector_image']['url']); ?>" alt="<?php echo esc_attr__('vector-image', 'gofly-core'); ?>" class="vector1">
            <?php endif; ?>
        </div>

<?php

    }
}

Plugin::instance()->widgets_manager->register(new Gofly_Refund_Widget());
