<?php

namespace Elementor;

if (!defined('ABSPATH')) exit;  // Exit if accessed directly

use Elementor\core\Schemes;
use Egns_Core\Egns_Helper;

class Gofly_Service_Widget extends Widget_Base
{

    public function get_name()
    {
        return 'gofly_service';
    }

    public function get_title()
    {
        return esc_html__('EG Service', 'gofly-core');
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
            'gofly_service_genaral',
            [
                'label' => esc_html__('General', 'gofly-core')
            ]
        );

        $this->add_control(
            'gofly_service_genaral_background_image',
            [
                'label'   => esc_html__('Background Image', 'gofly-core'),
                'type'    => \Elementor\Controls_Manager::MEDIA,
                'default' => [
                    'url' => \Elementor\Utils::get_placeholder_image_src(),
                ],
            ]
        );

        $this->add_control(
            'gofly_service_genaral_title',
            [
                'label'       => esc_html__('Title', 'gofly-core'),
                'type'        => \Elementor\Controls_Manager::TEXT,
                'default'     => wp_kses('To Go Your Desire Place Through our <span>GoFLy.</span>', wp_kses_allowed_html('post')),
                'placeholder' => esc_html__('write your title here', 'gofly-core'),
                'label_block' => true,
            ]
        );

        $repeater = new \Elementor\Repeater();

        $repeater->add_control(
            'gofly_service_genaral_icon',
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
            'gofly_service_genaral_list_title',
            [
                'label'       => esc_html__('Title', 'gofly-core'),
                'type'        => \Elementor\Controls_Manager::TEXT,
                'default'     => esc_html__('One Click Booking', 'gofly-core'),
                'placeholder' => esc_html__('write your text here', 'gofly-core'),
                'label_block' => true,
            ]
        );

        $repeater->add_control(
            'gofly_service_genaral_list_description',
            [
                'label'       => esc_html__('Description', 'gofly-core'),
                'type'        => \Elementor\Controls_Manager::TEXTAREA,
                'default'     => esc_html__('You can hassle-free and fast tour & travel package booking by GoFly.', 'gofly-core'),
                'placeholder' => esc_html__('write your text here', 'gofly-core'),
                'label_block' => true,
            ]
        );

        $this->add_control(
            'gofly_service_genaral_list',
            [
                'label'   => esc_html__('Service List', 'gofly-core'),
                'type'    => \Elementor\Controls_Manager::REPEATER,
                'fields'  => $repeater->get_controls(),
                'default' => [
                    [
                        'gofly_service_genaral_list_title'       => esc_html('One Click Booking'),
                        'gofly_service_genaral_list_description' => esc_html('You can hassle-free and fast tour & travel package booking by GoFly.'),

                    ],
                    [
                        'gofly_service_genaral_list_title'       => esc_html('Deals & Discounts'),
                        'gofly_service_genaral_list_description' => esc_html('Agencies have special discounts on flights, hotels, & packages.'),
                    ],
                    [
                        'gofly_service_genaral_list_title'       => esc_html('Local Guidance'),
                        'gofly_service_genaral_list_description' => esc_html('Travel agencies have experienced professionals guidance.'),
                    ],
                ],
                'title_field' => '{{{ gofly_service_genaral_list_title }}}',
            ]
        );

        $this->add_control(
            'gofly_service_genaral_refund_area_switcher',
            [
                'label'        => esc_html__("Show Refund Section?", 'gofly-core'),
                'type'         => \Elementor\Controls_Manager::SWITCHER,
                'label_on'     => esc_html__('Enable', 'gofly-core'),
                'label_off'    => esc_html__('Disable', 'gofly-core'),
                'return_value' => 'yes',
                'default'      => 'yes',
            ]
        );


        $this->add_control(
            'gofly_service_genaral_refund_area',
            [
                'label'     => esc_html__('Refund Area', 'gofly-core'),
                'type'      => \Elementor\Controls_Manager::HEADING,
                'separator' => 'after',
                'condition' => [
                    'gofly_service_genaral_refund_area_switcher' => 'yes',
                ],
            ]
        );


        $this->add_control(
            'gofly_service_genaral_refund_area_title',
            [
                'label'       => esc_html__('Title', 'gofly-core'),
                'type'        => \Elementor\Controls_Manager::TEXT,
                'default'     => wp_kses('For only <span>Medical Purpose</span> you can get refund', wp_kses_allowed_html('post')),
                'placeholder' => esc_html__('write your title here', 'gofly-core'),
                'label_block' => true,
                'condition'   => [
                    'gofly_service_genaral_refund_area_switcher' => 'yes',
                ],
            ]
        );

        $repeater = new \Elementor\Repeater();

        $repeater->add_control(
            'gofly_service_genaral_refund_area_content_title',
            [
                'label'       => esc_html__('Content Title', 'gofly-core'),
                'type'        => \Elementor\Controls_Manager::TEXT,
                'default'     => esc_html__('Severe Illness or Injury – ', 'gofly-core'),
                'placeholder' => esc_html__('write your text here', 'gofly-core'),
                'label_block' => true,
            ]
        );

        $repeater->add_control(
            'gofly_service_genaral_refund_area_content_description',
            [
                'label'       => esc_html__('Description', 'gofly-core'),
                'type'        => \Elementor\Controls_Manager::TEXTAREA,
                'default'     => esc_html__('A serious health condition that prevents travel, confirmed by a medical certificate.', 'gofly-core'),
                'placeholder' => esc_html__('write your text here', 'gofly-core'),
                'label_block' => true,
            ]
        );

        $this->add_control(
            'gofly_service_genaral_refund_area_content_list',
            [
                'label'   => esc_html__('Content List', 'gofly-core'),
                'type'    => \Elementor\Controls_Manager::REPEATER,
                'fields'  => $repeater->get_controls(),
                'default' => [
                    [
                        'gofly_service_genaral_refund_area_content_title'       => esc_html('Severe Illness or Injury – '),
                        'gofly_service_genaral_refund_area_content_description' => esc_html('You can hassle-free and fast tour & travel package booking by GoFly.'),

                    ],
                    [
                        'gofly_service_genaral_refund_area_content_title'       => esc_html('Pregnancy-Related Complications – '),
                        'gofly_service_genaral_refund_area_content_description' => esc_html('Agencies have special discounts on flights, hotels, & packages.'),
                    ],
                    [
                        'gofly_service_genaral_refund_area_content_title' => esc_html('All regal/proof documents you could submit our GoFly agency.'),
                    ],
                ],
                'title_field' => '{{{ gofly_service_genaral_refund_area_content_title }}}',
                'condition'   => [
                    'gofly_service_genaral_refund_area_switcher' => 'yes',
                ],
            ]
        );


        $this->add_control(
            'gofly_service_genaral_refund_area_banner_image',
            [
                'label'   => esc_html__('Banner Image', 'gofly-core'),
                'type'    => \Elementor\Controls_Manager::MEDIA,
                'default' => [
                    'url' => \Elementor\Utils::get_placeholder_image_src(),
                ],
                'condition'   => [
                    'gofly_service_genaral_refund_area_switcher' => 'yes',
                ],
            ]
        );

        $this->end_controls_section();

        //============Style One Start=============//

        $this->start_controls_section(
            'gofly_service_genaral_style',
            [
                'label' => esc_html__('Styles', 'gofly-core'),
                'tab'   => Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_control(
            'gofly_service_genaral_style_global_section',
            [
                'label'     => esc_html__('Global Section', 'gofly-core'),
                'type'      => \Elementor\Controls_Manager::HEADING,
                'separator' => 'after',
            ]
        );

        $this->add_control(
            'gofly_service_genaral_style_global_section_bg_color',
            [
                'label' => esc_html__('Background Color', 'gofly-core'),
                'type'  => Controls_Manager::COLOR,
            ]
        );


        $this->add_control(
            'gofly_service_genaral_style_header_title',
            [
                'label'     => esc_html__('Header Title', 'gofly-core'),
                'type'      => \Elementor\Controls_Manager::HEADING,
                'separator' => 'after',
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'label'    => esc_html__('Typography', 'gofly-core'),
                'name'     => 'gofly_service_genaral_style_header_title_typ',
                'selector' => '{{WRAPPER}} .service-wrapper.four .section-title h2',

            ]
        );

        $this->add_control(
            'gofly_service_genaral_style_header_title_color',
            [
                'label'     => esc_html__('Color', 'gofly-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .service-wrapper.four .section-title h2' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'gofly_service_genaral_style_service_icon',
            [
                'label'     => esc_html__('Service Icon', 'gofly-core'),
                'type'      => \Elementor\Controls_Manager::HEADING,
                'separator' => 'after',
            ]
        );

        $this->add_control(
            'gofly_service_genaral_style_service_icon_size',
            [
                'label'      => esc_html__('Icon Size', 'gofly-core'),
                'type'       => \Elementor\Controls_Manager::SLIDER,
                'size_units' => ['px', '%', 'rem', 'custom'],
                'range'      => [
                    'px' => [
                        'min'  => 0,
                        'max'  => 100,
                        'step' => 1,
                    ],
                    '%' => [
                        'min' => 0,
                        'max' => 100,
                    ],
                ],
                'default' => [
                    'unit' => 'px',
                    'size' => 63,
                ],
                'selectors' => [
                    '{{WRAPPER}} .service-wrapper .service-list .single-service .icon svg' => 'width: {{SIZE}}{{UNIT}};',
                ],
            ]
        );


        $this->add_control(
            'gofly_service_genaral_style_service_icon_color',
            [
                'label'     => esc_html__('Color', 'gofly-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .service-wrapper .service-list .single-service .icon svg' => 'fill: {{VALUE}};',
                ],
            ]
        );


        $this->add_control(
            'gofly_service_genaral_style_service_title',
            [
                'label'     => esc_html__('Service Title', 'gofly-core'),
                'type'      => \Elementor\Controls_Manager::HEADING,
                'separator' => 'after',
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'label'    => esc_html__('Typography', 'gofly-core'),
                'name'     => 'gofly_service_genaral_style_service_title_typ',
                'selector' => '{{WRAPPER}} .service-wrapper .service-list .single-service .content h4',

            ]
        );

        $this->add_control(
            'gofly_service_genaral_style_service_title_color',
            [
                'label'     => esc_html__('Color', 'gofly-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .service-wrapper .service-list .single-service .content h4' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'gofly_service_genaral_style_service_description',
            [
                'label'     => esc_html__('Service Description', 'gofly-core'),
                'type'      => \Elementor\Controls_Manager::HEADING,
                'separator' => 'after',
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'label'    => esc_html__('Typography', 'gofly-core'),
                'name'     => 'gofly_service_genaral_style_service_description_typ',
                'selector' => '{{WRAPPER}} .service-wrapper .service-list .single-service .content p',

            ]
        );

        $this->add_control(
            'gofly_service_genaral_style_service_description_color',
            [
                'label'     => esc_html__('Color', 'gofly-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .service-wrapper .service-list .single-service .content p' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'gofly_service_genaral_style_refund_area',
            [
                'label'     => esc_html__('Refund Area', 'gofly-core'),
                'type'      => \Elementor\Controls_Manager::HEADING,
                'separator' => 'before',
            ]
        );

        $this->add_control(
            'gofly_service_genaral_style_refund_area_title',
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
                'name'     => 'gofly_service_genaral_style_refund_area_title_typ',
                'selector' => '{{WRAPPER}} .refund-area .refund-wrap .refund-content h4',

            ]
        );

        $this->add_control(
            'gofly_service_genaral_style_refund_area_title_color',
            [
                'label'     => esc_html__('Color', 'gofly-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .refund-area .refund-wrap .refund-content h4' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'gofly_service_genaral_style_refund_area_title_span_color',
            [
                'label'     => esc_html__('Span Color', 'gofly-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .refund-area .refund-wrap .refund-content h4 span' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'gofly_service_genaral_style_refund_area_content_icon',
            [
                'label'     => esc_html__('Content Icon', 'gofly-core'),
                'type'      => \Elementor\Controls_Manager::HEADING,
                'separator' => 'after',
            ]
        );

        $this->add_control(
            'gofly_service_genaral_style_refund_area_content_icon_color',
            [
                'label'     => esc_html__('Color', 'gofly-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .refund-area .refund-wrap .refund-content ul li svg' => 'fill: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'gofly_service_genaral_style_refund_area_content_icon_border_color',
            [
                'label'     => esc_html__('Border Color', 'gofly-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .refund-area .refund-wrap .refund-content ul li svg circle' => 'stroke: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'gofly_service_genaral_style_refund_area_content_title',
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
                'name'     => 'gofly_service_genaral_style_refund_area_content_title_typ',
                'selector' => '{{WRAPPER}} .refund-area .refund-wrap .refund-content ul li span',

            ]
        );

        $this->add_control(
            'gofly_service_genaral_style_refund_area_content_title_color',
            [
                'label'     => esc_html__('Color', 'gofly-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .refund-area .refund-wrap .refund-content ul li span' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'gofly_service_genaral_style_refund_area_content_description',
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
                'name'     => 'gofly_service_genaral_style_refund_area_content_description_typ',
                'selector' => '{{WRAPPER}} .refund-area .refund-wrap .refund-content ul li',

            ]
        );

        $this->add_control(
            'gofly_service_genaral_style_refund_area_content_description_color',
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

        <div class="home5-service-section">
            <div class="service-wrapper four" <?php if (!empty($settings['gofly_service_genaral_background_image']['url'])) : ?> style="background-image: url(<?php echo esc_url($settings['gofly_service_genaral_background_image']['url']); ?>), linear-gradient(180deg, <?php echo esc_attr($settings['gofly_service_genaral_style_global_section_bg_color']); ?> 0%, <?php echo esc_attr($settings['gofly_service_genaral_style_global_section_bg_color']); ?> 100%)" <?php endif; ?>>
                <div class="container">
                    <?php if (!empty($settings['gofly_service_genaral_title'])): ?>
                        <div class="section-title text-center wow animate fadeInDown" data-wow-delay="200ms" data-wow-duration="1500ms">
                            <h2><?php echo wp_kses($settings['gofly_service_genaral_title'], wp_kses_allowed_html('post'))  ?></h2>
                        </div>
                    <?php endif; ?>
                    <ul class="service-list wow animate fadeInDown" data-wow-delay="200ms" data-wow-duration="1500ms">

                        <?php foreach ($settings['gofly_service_genaral_list'] as $data): ?>
                            <li class="single-service">
                                <?php if (!empty($data['gofly_service_genaral_icon'])): ?>
                                    <div class="icon">
                                        <?php \Elementor\Icons_Manager::render_icon($data['gofly_service_genaral_icon'], ['aria-hidden' => 'true']); ?>
                                    </div>
                                <?php endif; ?>
                                <div class="content">
                                    <?php if (!empty($data['gofly_service_genaral_list_title'])): ?>
                                        <h4><?php echo esc_html($data['gofly_service_genaral_list_title']); ?></h4>
                                    <?php endif; ?>
                                    <?php if (!empty($data['gofly_service_genaral_list_description'])): ?>
                                        <p><?php echo esc_html($data['gofly_service_genaral_list_description']); ?></p>
                                    <?php endif; ?>
                                </div>
                            </li>
                        <?php endforeach; ?>
                    </ul>
                </div>
            </div>
            <?php if ($settings['gofly_service_genaral_refund_area_switcher'] == 'yes'): ?>
                <div class="refund-area wow animate fadeInUp" data-wow-delay="200ms" data-wow-duration="1500ms">
                    <div class="container">
                        <div class="refund-wrap">
                            <div class="refund-content">
                                <?php if (!empty($settings['gofly_service_genaral_refund_area_title'])): ?>
                                    <h4><?php echo wp_kses($settings['gofly_service_genaral_refund_area_title'], wp_kses_allowed_html('post'))  ?></h4>
                                <?php endif; ?>
                                <ul>
                                    <?php foreach ($settings['gofly_service_genaral_refund_area_content_list'] as $data): ?>
                                        <li>
                                            <svg width="18" height="18" viewBox="0 0 18 18" xmlns="http://www.w3.org/2000/svg">
                                                <circle cx="9" cy="9" r="8.5" />
                                                <path
                                                    d="M13.6193 7.07232L8.05899 12.6356C7.97039 12.7212 7.85809 12.7656 7.74589 12.7656C7.68769 12.7657 7.63004 12.7543 7.57629 12.732C7.52253 12.7096 7.47373 12.6769 7.43269 12.6356L4.38069 9.58362C4.20639 9.41222 4.20639 9.13162 4.38069 8.95732L5.45909 7.87592C5.62459 7.71052 5.91999 7.71052 6.08549 7.87592L7.74589 9.53632L11.9146 5.36462C11.9557 5.32346 12.0044 5.2908 12.0581 5.26849C12.1118 5.24619 12.1694 5.23468 12.2275 5.23462C12.3456 5.23462 12.4579 5.28192 12.5406 5.36462L13.619 6.44612C13.7936 6.62042 13.7936 6.90102 13.6193 7.07232Z" />
                                            </svg>
                                            <div class="content">
                                                <span><?php if (!empty($data['gofly_service_genaral_refund_area_content_title'])): ?> <?php echo esc_html($data['gofly_service_genaral_refund_area_content_title']); ?></span><?php endif; ?> <?php if (!empty($data['gofly_service_genaral_refund_area_content_description'])): ?> <?php echo esc_html($data['gofly_service_genaral_refund_area_content_description']); ?><?php endif; ?>
                                            </div>
                                        </li>
                                    <?php endforeach; ?>
                                </ul>
                            </div>
                            <?php if (!empty($settings['gofly_service_genaral_refund_area_banner_image']['url'])): ?>
                                <div class="refund-img">
                                    <img src="<?php echo esc_url($settings['gofly_service_genaral_refund_area_banner_image']['url']); ?>" alt="<?php echo esc_attr__('banner-image', 'gofly-core'); ?>">
                                </div>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            <?php endif; ?>
        </div>

<?php

    }
}

Plugin::instance()->widgets_manager->register(new Gofly_Service_Widget());
