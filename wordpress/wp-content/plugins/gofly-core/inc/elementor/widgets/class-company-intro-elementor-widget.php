<?php

namespace Elementor;

if (!defined('ABSPATH')) exit;  // Exit if accessed directly

use Elementor\core\Schemes;
use Egns_Core\Egns_Helper;

class Gofly_Company_Intro_Widget extends Widget_Base
{

    public function get_name()
    {
        return 'gofly_company_intro';
    }

    public function get_title()
    {
        return esc_html__('EG Company Intro', 'gofly-core');
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
            'gofly_company_intro_genaral',
            [
                'label' => esc_html__('General', 'gofly-core')
            ]
        );

        $this->add_control(
            'gofly_company_intro_bg_image_genaral',
            [
                'label'   => __('Background Image', 'gofly-core'),
                'type'    => \Elementor\Controls_Manager::MEDIA,
                'default' => [
                    'url' => \Elementor\Utils::get_placeholder_image_src(),
                ],
            ]
        );

        $this->add_control(
            'gofly_company_intro_general_content_area',
            [
                'label'     => esc_html__('Content Area', 'gofly-core'),
                'type'      => \Elementor\Controls_Manager::HEADING,
                'separator' => 'after',
            ]
        );

        $this->add_control(
            'gofly_company_intro_general_content_area_icon',
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
            'gofly_company_intro_general_content_area_video_title',
            [
                'label'       => esc_html__('Title', 'gofly-core'),
                'type'        => \Elementor\Controls_Manager::TEXT,
                'default'     => 'Watch Video',
                'placeholder' => esc_html__('write your title here', 'gofly-core'),
                'label_block' => true,
            ]
        );

        $this->add_control(
            'gofly_company_intro_general_content_area_video_type',
            [
                'label'   => esc_html__('Select Type', 'gofly-core'),
                'type'    => Controls_Manager::SELECT,
                'options' => [
                    'upload' => esc_html__('Upload', 'gofly-core'),
                    'link'   => esc_html__('Link/URL', 'gofly-core'),
                ],
                'default' => 'upload',
            ]
        );

        $this->add_control(
            'gofly_company_intro_general_content_area_video_upload',
            [
                'label'       => esc_html__('Choose Video File', 'gofly-core'),
                'type'        => \Elementor\Controls_Manager::MEDIA,
                'media_types' => ['video'],
                'condition'   => [
                    'gofly_company_intro_general_content_area_video_type' => ['upload'],
                ]
            ]
        );

        $this->add_control(
            'gofly_company_intro_general_content_area_video_link',
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
                    'gofly_company_intro_general_content_area_video_type' => ['link'],
                ]
            ]
        );

        $this->add_control(
            'gofly_company_intro_general_content_area_video_description',
            [
                'label'       => esc_html__('Description', 'gofly-core'),
                'type'        => \Elementor\Controls_Manager::TEXTAREA,
                'default'     => 'Visa assistance for 100+ countries across various categories.',
                'placeholder' => esc_html__('write your description here', 'gofly-core'),
                'label_block' => true,
            ]
        );


        $this->add_control(
            'gofly_company_intro_general_content_area_video_description_signature_image',
            [
                'label'       => esc_html__('Signature Image', 'gofly-core'),
                'type'        => \Elementor\Controls_Manager::MEDIA,
                'media_types' => ['svg', 'image'],
                'default'     => [
                    'url' => \Elementor\Utils::get_placeholder_image_src(),
                ],
            ]
        );

        $this->add_control(
            'gofly_company_intro_general_content_area_video_designation',
            [
                'label'       => esc_html__('Designation', 'gofly-core'),
                'type'        => \Elementor\Controls_Manager::TEXT,
                'default'     => 'CEO, at GoFly',
                'placeholder' => esc_html__('write your designation here', 'gofly-core'),
                'label_block' => true,
            ]
        );

        $this->end_controls_section();

        //============Style Start=============//

        $this->start_controls_section(
            'gofly_company_intro_style_general',
            [
                'label' => esc_html__('Styles', 'gofly-core'),
                'tab'   => Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_control(
            'gofly_company_intro_style_general_card',
            [
                'label'     => esc_html__('Card', 'gofly-core'),
                'type'      => \Elementor\Controls_Manager::HEADING,
                'separator' => 'after',
            ]
        );

        $this->add_control(
            'gofly_company_intro_style_general_card_bg_color',
            [
                'label'     => esc_html__('Background Color', 'gofly-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .home8-company-intro-section .company-intro-content' => 'background-color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'gofly_company_intro_style_general_video_icon',
            [
                'label'     => esc_html__('Video Icon', 'gofly-core'),
                'type'      => \Elementor\Controls_Manager::HEADING,
                'separator' => 'after',
            ]
        );

        $this->add_control(
            'width',
            [
                'label'      => esc_html__('Width', 'gofly-core'),
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
                    'unit' => 'px',
                    'size' => 16,
                ],
                'selectors' => [
                    '{{WRAPPER}} .home8-company-intro-section .company-intro-content .video-area .play-btn svg' => 'width: {{SIZE}}{{UNIT}};',
                ],
            ]
        );

        $this->add_control(
            'gofly_company_intro_style_general_video_icon_color',
            [
                'label'     => esc_html__('Color', 'gofly-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .home8-company-intro-section .company-intro-content .video-area .play-btn svg' => 'fill: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'gofly_company_intro_style_general_video_icon_bg_color',
            [
                'label'     => esc_html__('Background Color', 'gofly-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .home8-company-intro-section .company-intro-content .video-area .play-btn' => 'background-color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'gofly_company_intro_style_general_video_title',
            [
                'label'     => esc_html__('Video Title', 'gofly-core'),
                'type'      => \Elementor\Controls_Manager::HEADING,
                'separator' => 'after',
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'label'    => esc_html__('Typography', 'gofly-core'),
                'name'     => 'gofly_company_intro_style_general_video_title_typ',
                'selector' => '{{WRAPPER}} .home8-company-intro-section .company-intro-content .video-area span',

            ]
        );

        $this->add_control(
            'gofly_company_intro_style_general_video_title_color',
            [
                'label'     => esc_html__('Color', 'gofly-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .home8-company-intro-section .company-intro-content .video-area span' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'gofly_company_intro_style_general_line',
            [
                'label'     => esc_html__('Line', 'gofly-core'),
                'type'      => \Elementor\Controls_Manager::HEADING,
                'separator' => 'after',
            ]
        );

        $this->add_control(
            'gofly_company_intro_style_general_line_color',
            [
                'label'     => esc_html__('Color', 'gofly-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .home8-company-intro-section .company-intro-content .line' => 'fill: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'gofly_company_intro_style_general_video_description',
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
                'name'     => 'gofly_company_intro_style_general_video_description_typ',
                'selector' => '{{WRAPPER}} .home8-company-intro-section .company-intro-content p',

            ]
        );

        $this->add_control(
            'gofly_company_intro_style_general_video_description_color',
            [
                'label'     => esc_html__('Color', 'gofly-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .home8-company-intro-section .company-intro-content p' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'gofly_company_intro_style_general_video_designation',
            [
                'label'     => esc_html__('Designation', 'gofly-core'),
                'type'      => \Elementor\Controls_Manager::HEADING,
                'separator' => 'after',
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'label'    => esc_html__('Typography', 'gofly-core'),
                'name'     => 'gofly_company_intro_style_general_video_designation_typ',
                'selector' => '{{WRAPPER}} .home8-company-intro-section .company-intro-content .signature-area span',

            ]
        );

        $this->add_control(
            'gofly_company_intro_style_general_video_designation_color',
            [
                'label'     => esc_html__('Color', 'gofly-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .home8-company-intro-section .company-intro-content .signature-area span' => 'color: {{VALUE}};',
                ],
            ]
        );


        $this->end_controls_section();
    }
    protected function render()
    {

        $settings = $this->get_settings_for_display();

?>

        <div class="home8-company-intro-section" <?php if (!empty($settings['gofly_company_intro_bg_image_genaral']['url'])) : ?> style="background-image: url(<?php echo esc_url($settings['gofly_company_intro_bg_image_genaral']['url']); ?>);" <?php endif; ?>>
            <div class="container">
                <div class="row">
                    <div class="col-xl-4 col-lg-5 col-md-7 col-sm-9">
                        <div class="company-intro-content">
                            <a data-fancybox="video-player" href="<?php if ($settings['gofly_company_intro_general_content_area_video_type'] == 'upload') : ?><?php echo esc_url($settings['gofly_company_intro_general_content_area_video_upload']['url']); ?><?php else : ?><?php echo esc_url($settings['gofly_company_intro_general_content_area_video_link']['url']); ?><?php endif; ?>" class="video-area">
                                <?php if (!empty($settings['gofly_company_intro_general_content_area_icon'])): ?>
                                    <div class="play-btn">
                                        <?php \Elementor\Icons_Manager::render_icon($settings['gofly_company_intro_general_content_area_icon'], ['aria-hidden' => 'true']); ?>
                                    </div>
                                <?php endif; ?>
                                <?php if (!empty($settings['gofly_company_intro_general_content_area_video_title'])): ?>
                                    <span><?php echo esc_html($settings['gofly_company_intro_general_content_area_video_title']); ?></span>
                                <?php endif; ?>
                            </a>
                            <svg class="line" height="6" viewBox="0 0 344 6" xmlns="http://www.w3.org/2000/svg">
                                <path d="M5 2.5L0 0.113249V5.88675L5 3.5V2.5ZM339 3.5L344 5.88675V0.113249L339 2.5V3.5ZM4.5 3.5H339.5V2.5H4.5V3.5Z" />
                            </svg>
                            <?php if (!empty($settings['gofly_company_intro_general_content_area_video_description'])): ?>
                                <p><?php echo esc_html($settings['gofly_company_intro_general_content_area_video_description']); ?></p>
                            <?php endif; ?>
                            <div class="signature-area">
                                <?php if (!empty($settings['gofly_company_intro_general_content_area_video_description_signature_image']['url'])): ?>
                                    <img src="<?php echo esc_url($settings['gofly_company_intro_general_content_area_video_description_signature_image']['url']); ?>" alt="<?php echo esc_attr__('signature-image', 'gofly-core'); ?>">
                                <?php endif; ?>
                                <?php if (!empty($settings['gofly_company_intro_general_content_area_video_designation'])): ?>
                                    <span><?php echo esc_html($settings['gofly_company_intro_general_content_area_video_designation']); ?></span>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

<?php

    }
}

Plugin::instance()->widgets_manager->register(new Gofly_Company_Intro_Widget());
