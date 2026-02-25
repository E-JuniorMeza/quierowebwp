<?php

namespace Elementor;

if (!defined('ABSPATH')) exit;  // Exit if accessed directly

use Elementor\core\Schemes;
use Egns_Core\Egns_Helper;

class Gofly_Video_With_Contact_Widget extends Widget_Base
{

    public function get_name()
    {
        return 'gofly_video_with_contact';
    }

    public function get_title()
    {
        return esc_html__('EG Video With Contact', 'gofly-core');
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
            'gofly_video_with_contact_genaral',
            [
                'label' => esc_html__('General', 'gofly-core')
            ]
        );


        $this->add_control(
            'gofly_video_with_contact_genaral_bg_image',
            [
                'label'   => __('Background Image', 'gofly-core'),
                'type'    => \Elementor\Controls_Manager::MEDIA,
                'default' => [
                    'url' => \Elementor\Utils::get_placeholder_image_src(),
                ],
            ]
        );

        $this->add_control(
            'gofly_video_with_contact_genaral_contact_switcher',
            [
                'label'        => esc_html__("Show Contact Section?", 'gofly-core'),
                'type'         => \Elementor\Controls_Manager::SWITCHER,
                'label_on'     => esc_html__('Enable', 'gofly-core'),
                'label_off'    => esc_html__('Disable', 'gofly-core'),
                'return_value' => 'yes',
                'default'      => 'yes',
            ]
        );

        $this->add_control(
            'gofly_video_with_contact_genaral_contact_area',
            [
                'label'     => esc_html__('Contact Area', 'gofly-core'),
                'type'      => \Elementor\Controls_Manager::HEADING,
                'separator' => 'after',
                'condition' => [
                    'gofly_video_with_contact_genaral_contact_switcher' => 'yes',
                ],

            ]
        );

        $this->add_control(
            'gofly_video_with_contact_genaral_contact_title',
            [
                'label'       => esc_html__('Title', 'gofly-core'),
                'type'        => \Elementor\Controls_Manager::TEXT,
                'default'     => esc_html__('Need to Help? Don’t Hesitate Friendly Collaboarte with Experties', 'gofly-core'),
                'placeholder' => esc_html__('write your title here', 'gofly-core'),
                'label_block' => true,
                'condition'   => [
                    'gofly_video_with_contact_genaral_contact_switcher' => 'yes',
                ],
            ]
        );

        $this->add_control(
            'gofly_video_with_contact_genaral_contact_icon',
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
                'condition'   => [
                    'gofly_video_with_contact_genaral_contact_switcher' => 'yes',
                ],
            ]
        );

        $this->add_control(
            'gofly_video_with_contact_genaral_contact_content_title',
            [
                'label'       => esc_html__('Content Title', 'gofly-core'),
                'type'        => \Elementor\Controls_Manager::TEXT,
                'default'     => esc_html__('Need Help?', 'gofly-core'),
                'placeholder' => esc_html__('write your title here', 'gofly-core'),
                'label_block' => true,
                'condition'   => [
                    'gofly_video_with_contact_genaral_contact_switcher' => 'yes',
                ],
            ]
        );

        $this->add_control(
            'gofly_video_with_contact_genaral_contact_content_selection_type',
            [
                'label'   => esc_html__('Select Type', 'gofly-core'),
                'type'    => \Elementor\Controls_Manager::SELECT,
                'options' => [
                    'phone' => esc_html__('Phone', 'gofly-core'),
                    'email' => esc_html__('Email', 'gofly-core'),
                ],
                'default'   => 'phone',
                'condition' => [
                    'gofly_video_with_contact_genaral_contact_switcher' => 'yes',
                ],
            ]
        );

        $this->add_control(
            'gofly_video_with_contact_genaral_contact_content_phone',
            [
                'label'       => esc_html__('Phone', 'gofly-core'),
                'type'        => \Elementor\Controls_Manager::TEXT,
                'default'     => esc_html__('+91 345 533 865', 'gofly-core'),
                'placeholder' => esc_html__('write your phone here', 'gofly-core'),
                'label_block' => true,
                'condition'   => [
                    'gofly_video_with_contact_genaral_contact_content_selection_type' => 'phone',
                    'gofly_video_with_contact_genaral_contact_switcher'               => 'yes',
                ],
            ]
        );

        $this->add_control(
            'gofly_video_with_contact_genaral_contact_content_email',
            [
                'label'       => esc_html__('Email', 'gofly-core'),
                'type'        => \Elementor\Controls_Manager::TEXT,
                'default'     => esc_html__('example@example.com', 'gofly-core'),
                'placeholder' => esc_html__('write your email here', 'gofly-core'),
                'label_block' => true,
                'condition'   => [
                    'gofly_video_with_contact_genaral_contact_content_selection_type' => 'email',
                    'gofly_video_with_contact_genaral_contact_switcher'               => 'yes',
                ],
            ]
        );

        $this->add_control(
            'gofly_video_with_contact_genaral_video_switcher',
            [
                'label'        => esc_html__("Show Video Section?", 'gofly-core'),
                'type'         => \Elementor\Controls_Manager::SWITCHER,
                'label_on'     => esc_html__('Enable', 'gofly-core'),
                'label_off'    => esc_html__('Disable', 'gofly-core'),
                'return_value' => 'yes',
                'default'      => 'yes',
            ]
        );

        $this->add_control(
            'gofly_video_with_contact_genaral_video_area',
            [
                'label'     => esc_html__('Video Area', 'gofly-core'),
                'type'      => \Elementor\Controls_Manager::HEADING,
                'separator' => 'after',
                'condition' => [
                    'gofly_video_with_contact_genaral_video_switcher' => 'yes',
                ],
            ]
        );

        $this->add_control(
            'gofly_video_with_contact_genaral_video_area_select_type',
            [
                'label'   => esc_html__('Select Type', 'gofly-core'),
                'type'    => \Elementor\Controls_Manager::SELECT,
                'options' => [
                    'upload' => esc_html__('Upload', 'gofly-core'),
                    'url'    => esc_html__('URL/Link', 'gofly-core'),
                ],
                'default'   => 'upload',
                'condition' => [
                    'gofly_video_with_contact_genaral_video_switcher' => 'yes',
                ],

            ]
        );

        $this->add_control(
            'gofly_video_with_contact_genaral_video_area_upload',
            [
                'label'       => esc_html__('Choose Video File', 'gofly-core'),
                'type'        => \Elementor\Controls_Manager::MEDIA,
                'media_types' => ['video'],
                'condition'   => [
                    'gofly_video_with_contact_genaral_video_area_select_type' => 'upload',
                    'gofly_video_with_contact_genaral_video_switcher'         => 'yes',
                ],

            ]
        );

        $this->add_control(
            'gofly_video_with_contact_genaral_video_area_upload_link',
            [
                'label'   => esc_html__('Video URL/Link', 'gofly-core'),
                'type'    => \Elementor\Controls_Manager::URL,
                'options' => ['url', 'is_external', 'nofollow'],
                'default' => [
                    'url'         => '#',
                    'is_external' => true,
                    'nofollow'    => true,
                ],
                'label_block' => true,
                'condition'   => [
                    'gofly_video_with_contact_genaral_video_area_select_type' => 'url',
                    'gofly_video_with_contact_genaral_video_switcher'         => 'yes',
                ],

            ]
        );

        $this->end_controls_section();

        //============Style Start=============//

        $this->start_controls_section(
            'gofly_video_with_contact_style_genaral',
            [
                'label' => esc_html__('Styles', 'gofly-core'),
                'tab'   => Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_control(
            'gofly_video_with_contact_style_genaral_contact_area',
            [
                'label'     => esc_html__('Contact Area', 'gofly-core'),
                'type'      => \Elementor\Controls_Manager::HEADING,
                'separator' => 'before',
            ]
        );

        $this->add_control(
            'gofly_video_with_contact_style_genaral_contact_area_bg_color',
            [
                'label'     => esc_html__('Background Color', 'gofly-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .why-choose-video-area .why-choose-video-wrap .contact-wrap .contact-area' => 'background-color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'gofly_video_with_contact_style_genaral_contact_area_border_color',
            [
                'label'     => esc_html__('Border Color', 'gofly-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .why-choose-video-area .why-choose-video-wrap .contact-wrap' => 'background-color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'gofly_video_with_contact_style_genaral_contact_area_title',
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
                'name'     => 'gofly_video_with_contact_style_genaral_contact_area_title_typ',
                'selector' => '{{WRAPPER}} .why-choose-video-area .why-choose-video-wrap .contact-wrap .contact-area h6',

            ]
        );

        $this->add_control(
            'gofly_video_with_contact_style_genaral_contact_area_title_color',
            [
                'label'     => esc_html__('Color', 'gofly-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .why-choose-video-area .why-choose-video-wrap .contact-wrap .contact-area h6' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'gofly_video_with_contact_style_genaral_contact_area_icon',
            [
                'label'     => esc_html__('Icon', 'gofly-core'),
                'type'      => \Elementor\Controls_Manager::HEADING,
                'separator' => 'after',
            ]
        );

        $this->add_control(
            'gofly_video_with_contact_style_genaral_contact_area_icon_size',
            [
                'label'      => esc_html__('Icon Size', 'gofly-core'),
                'type'       => \Elementor\Controls_Manager::SLIDER,
                'size_units' => ['px', '%', 'em', 'rem', 'custom'],
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
                ],
                'default' => [
                    'unit' => '%',
                    'size' => 50,
                ],
                'selectors' => [
                    '{{WRAPPER}} .contact-area .single-contact .icon svg' => 'width: {{SIZE}}{{UNIT}};',
                ],
            ]
        );

        $this->add_control(
            'gofly_video_with_contact_style_genaral_contact_area_icon_color',
            [
                'label'     => esc_html__('Color', 'gofly-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .contact-area .single-contact .icon svg' => 'fill: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'gofly_video_with_contact_style_genaral_contact_area_icon_bg_color',
            [
                'label'     => esc_html__('Background Color', 'gofly-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .why-choose-video-area .why-choose-video-wrap .contact-wrap .contact-area .single-contact .icon' => 'background-color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'gofly_video_with_contact_style_genaral_contact_area_content_title',
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
                'name'     => 'gofly_video_with_contact_style_genaral_contact_area_content_title_typ',
                'selector' => '{{WRAPPER}} .why-choose-video-area .why-choose-video-wrap .contact-wrap .contact-area .single-contact .content span',

            ]
        );

        $this->add_control(
            'gofly_video_with_contact_style_genaral_contact_area_content_title_color',
            [
                'label'     => esc_html__('Color', 'gofly-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .why-choose-video-area .why-choose-video-wrap .contact-wrap .contact-area .single-contact .content span' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'gofly_video_with_contact_style_genaral_contact_area_content_text',
            [
                'label'     => esc_html__('Content Text', 'gofly-core'),
                'type'      => \Elementor\Controls_Manager::HEADING,
                'separator' => 'after',
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'label'    => esc_html__('Typography', 'gofly-core'),
                'name'     => 'gofly_video_with_contact_style_genaral_contact_area_content_text_typ',
                'selector' => '{{WRAPPER}} .why-choose-video-area .why-choose-video-wrap .contact-wrap .contact-area .single-contact .content a',

            ]
        );

        $this->add_control(
            'gofly_video_with_contact_style_genaral_contact_area_content_text_color',
            [
                'label'     => esc_html__('Color', 'gofly-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .why-choose-video-area .why-choose-video-wrap .contact-wrap .contact-area .single-contact .content a' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'gofly_video_with_contact_style_genaral_contact_area_content_text_hover_color',
            [
                'label'     => esc_html__('Hover Color', 'gofly-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .why-choose-video-area .why-choose-video-wrap .contact-wrap .contact-area .single-contact .content a:hover' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'gofly_video_with_contact_style_genaral_contact_area_video_area',
            [
                'label'     => esc_html__('Video Area', 'gofly-core'),
                'type'      => \Elementor\Controls_Manager::HEADING,
                'separator' => 'before',
            ]
        );

        $this->add_control(
            'gofly_video_with_contact_style_genaral_contact_area_video_area_video_button',
            [
                'label'     => esc_html__('Video Button', 'gofly-core'),
                'type'      => \Elementor\Controls_Manager::HEADING,
                'separator' => 'after',
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'label'    => esc_html__('Typography', 'gofly-core'),
                'name'     => 'gofly_video_with_contact_style_genaral_contact_area_video_area_video_button_typ',
                'selector' => '{{WRAPPER}} .why-choose-video-area .why-choose-video-wrap .play-btn i',

            ]
        );

        $this->add_control(
            'gofly_video_with_contact_style_genaral_contact_area_video_area_video_button_color',
            [
                'label'     => esc_html__('Color', 'gofly-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .why-choose-video-area .why-choose-video-wrap .play-btn i' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'gofly_video_with_contact_style_genaral_contact_area_video_area_video_button_bg_color',
            [
                'label'     => esc_html__('Background Color', 'gofly-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .why-choose-video-area .why-choose-video-wrap .play-btn' => 'background-color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'gofly_video_with_contact_style_genaral_contact_area_video_area_video_button_waves_color',
            [
                'label'     => esc_html__('Waves Color', 'gofly-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .why-choose-video-area .why-choose-video-wrap .play-btn .waves-block .waves' => 'background: {{VALUE}};',
                ],
            ]
        );

        $this->end_controls_section();
    }
    protected function render()
    {

        $settings = $this->get_settings_for_display();

?>

        <div class="why-choose-video-area">
            <div class="container">
                <div class="why-choose-video-wrap">
                    <?php if ($settings['gofly_video_with_contact_genaral_video_switcher'] == 'yes'): ?>
                        <?php if (!empty($settings['gofly_video_with_contact_genaral_bg_image']['url'])): ?>
                            <img src="<?php echo esc_url($settings['gofly_video_with_contact_genaral_bg_image']['url']); ?>" alt="<?php echo esc_attr__('background-image', 'gofly-core'); ?>">
                        <?php endif; ?>
                        <a data-fancybox="video-player" href="<?php echo ($settings['gofly_video_with_contact_genaral_video_area_select_type'] === 'upload') ? esc_url($settings['gofly_video_with_contact_genaral_video_area_upload']['url']) : esc_url($settings['gofly_video_with_contact_genaral_video_area_upload_link']['url']); ?>" class="play-btn">
                            <i class="bi bi-play-fill"></i>
                            <div class="waves-block">
                                <div class="waves wave-1"></div>
                                <div class="waves wave-2"></div>
                                <div class="waves wave-3"></div>
                            </div>
                        </a>
                    <?php endif; ?>
                    <?php if ($settings['gofly_video_with_contact_genaral_contact_switcher'] == 'yes'): ?>
                        <div class="contact-wrap">
                            <div class="contact-area">
                                <?php if (!empty($settings['gofly_video_with_contact_genaral_contact_title'])): ?>
                                    <h6><?php echo esc_html($settings['gofly_video_with_contact_genaral_contact_title']); ?></h6>
                                <?php endif; ?>
                                <div class="single-contact">
                                    <?php if (!empty($settings['gofly_video_with_contact_genaral_contact_icon'])): ?>
                                        <div class="icon">
                                            <?php \Elementor\Icons_Manager::render_icon($settings['gofly_video_with_contact_genaral_contact_icon'], ['aria-hidden' => 'true']); ?>
                                        </div>
                                    <?php endif; ?>
                                    <div class="content">
                                        <?php if (!empty($settings['gofly_video_with_contact_genaral_contact_content_title'])): ?>
                                            <span><?php echo esc_html($settings['gofly_video_with_contact_genaral_contact_content_title']); ?></span>
                                        <?php endif; ?>
                                        <a href="<?php echo ($settings['gofly_video_with_contact_genaral_contact_content_selection_type'] === 'phone') ? 'tel:' . preg_replace('/\D/', '', $settings['gofly_video_with_contact_genaral_contact_content_phone']) : 'mailto:' . esc_html($settings['gofly_video_with_contact_genaral_contact_content_email']); ?>">
                                            <?php echo ($settings['gofly_video_with_contact_genaral_contact_content_selection_type'] === 'phone') ? esc_html($settings['gofly_video_with_contact_genaral_contact_content_phone']) : esc_html($settings['gofly_video_with_contact_genaral_contact_content_email']);                                                                                                                                                                                                                                                                                                                 ?>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php endif; ?>
                </div>
            </div>
        </div>

<?php

    }
}

Plugin::instance()->widgets_manager->register(new Gofly_Video_With_Contact_Widget());
