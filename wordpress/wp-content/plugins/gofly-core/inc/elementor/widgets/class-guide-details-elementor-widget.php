<?php

namespace Elementor;

if (!defined('ABSPATH')) exit;  // Exit if accessed directly

use Elementor\core\Schemes;
use Egns_Core\Egns_Helper;

class Gofly_Guide_Details_Widget extends Widget_Base
{

    public function get_name()
    {
        return 'gofly_guide_details';
    }

    public function get_title()
    {
        return esc_html__('EG Guide Details', 'gofly-core');
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
            'gofly_guide_details_genaral',
            [
                'label' => esc_html__('General', 'gofly-core')
            ]
        );

        $this->add_control(
            'gofly_guide_details_guide_image',
            [
                'label'         => esc_html__('Guide Image', 'gofly-core'),
                'type'          => \Elementor\Controls_Manager::MEDIA,
                'default'       => [
                    'url'       => \Elementor\Utils::get_placeholder_image_src(),
                ]
            ]
        );

        $this->add_control(
            'gofly_guide_details_social_title',
            [
                'label'       => esc_html__('Social Title', 'gofly-core'),
                'type'        => \Elementor\Controls_Manager::TEXT,
                'default'     => wp_kses('-Follow Me On-', wp_kses_allowed_html('post')),
                'placeholder' => esc_html__('write your title here', 'gofly-core'),
                'label_block' => true,
            ]
        );

        $this->add_control(
            'gofly_guide_details_social_popover_toggle',
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
            'guide_details_website_link_facebook',
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
            'guide_details_website_link_twitter',
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
            'guide_details_website_link_pinterest',
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
            'guide_details_website_link_instagram',
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
            'guide_details_website_link_linkedin',
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
            'guide_details_website_link_reddit',
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
            'guide_details_website_link_behance',
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
            'guide_details_website_link_stackoverflow',
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

        $this->add_control(
            'gofly_guide_details_guide_name',
            [
                'label'       => esc_html__('Guide Name', 'gofly-core'),
                'type'        => \Elementor\Controls_Manager::TEXT,
                'default'     => wp_kses('Mr. Jorche Milton', wp_kses_allowed_html('post')),
                'placeholder' => esc_html__('write your name here', 'gofly-core'),
                'label_block' => true,
            ]
        );

        $this->add_control(
            'gofly_guide_details_guide_skill',
            [
                'label'       => esc_html__('Skill', 'gofly-core'),
                'type'        => \Elementor\Controls_Manager::TEXT,
                'default'     => esc_html__('Skydiving Expert', 'gofly-core'),
                'placeholder' => esc_html__('write your skill here', 'gofly-core'),
                'label_block' => true,
            ]
        );

        $this->add_control(
            'gofly_guide_details_quote_line',
            [
                'label'       => esc_html__('Quote', 'gofly-core'),
                'type'        => \Elementor\Controls_Manager::TEXTAREA,
                'default'     => esc_html__('“To Achieve Customer Satisfaction with Serve Quality Guide for Any Destionation with Friendly”', 'gofly-core'),
                'placeholder' => esc_html__('write your quote here', 'gofly-core'),
                'label_block' => true,
            ]
        );

        $this->add_control(
            'gofly_guide_details_guide_description',
            [
                'label'       => esc_html__('Description', 'gofly-core'),
                'type'        => \Elementor\Controls_Manager::WYSIWYG,
                'default'     => wp_kses('With 10 years of experience, I am a passionate travel guide dedicated to creating unforgettable journeys. Specializing in Adventure/Cultural/Historical/Wildlife tours, I have explored the hidden gems and iconic landmarks of Egypt. Fluent in English, Spanish. I ensure smooth communication and a rich storytelling experience for travelers.', wp_kses_allowed_html('post')),
                'placeholder' => esc_html__('write your description here', 'gofly-core'),
                'label_block' => true,
            ]
        );

        $this->add_control(
            'gofly_guide_details_guide_list_title',
            [
                'label'       => esc_html__('Title', 'gofly-core'),
                'type'        => \Elementor\Controls_Manager::TEXT,
                'default'     => esc_html__('My Experties-', 'gofly-core'),
                'placeholder' => esc_html__('write your title here', 'gofly-core'),
                'label_block' => true,
            ]
        );

        $repeater = new \Elementor\Repeater();

        $repeater->add_control(
            'gofly_guide_details_guide_expertise_icon_image',
            [
                'label' => esc_html__('Icon', 'gofly-core'),
                'type' => \Elementor\Controls_Manager::ICONS,
                'default' => [
                    'value' => 'fas fa-circle',
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
            'gofly_guide_details_guide_expertise_title',
            [
                'label'         => esc_html__('Expertise Title', 'gofly-core'),
                'type'        => \Elementor\Controls_Manager::TEXT,
                'default'     => wp_kses('Adventure <br> Tours', wp_kses_allowed_html('post')),
                'placeholder' => esc_html__('write your title here', 'gofly-core'),
                'label_block' => true,
            ]
        );

        $this->add_control(
            'gofly_guide_details_expertise_list',
            [
                'label'         => esc_html__('Expertise', 'gofly-core'),
                'type'          => \Elementor\Controls_Manager::REPEATER,
                'fields'        => $repeater->get_controls(),
                'default'        => [
                    [
                        'gofly_guide_details_guide_expertise_title' => wp_kses('Adventure <br> Tours', wp_kses_allowed_html('post')),
                    ],
                    [
                        'gofly_guide_details_guide_expertise_title' => wp_kses('Cultural & <br > Historical', wp_kses_allowed_html('post')),
                    ],
                    [
                        'gofly_guide_details_guide_expertise_title' => wp_kses('Safari  <br > & Wildlife', wp_kses_allowed_html('post')),
                    ]
                ],
                'title_field' => '{{{ gofly_guide_details_guide_expertise_title }}}',
            ]
        );

        $this->add_control(
            'gofly_guide_details_guide_languages',
            [
                'label'       => esc_html__('Guide Languages', 'gofly-core'),
                'type'        => \Elementor\Controls_Manager::TEXTAREA,
                'default'     => wp_kses('Guide Operator- <strong>English, Spanish, Portogize </strong>', wp_kses_allowed_html('post')),
                'placeholder' => esc_html__('write your languages here', 'gofly-core'),
                'label_block' => true,
            ]
        );

        $this->add_control(
            'gofly_guide_details_guide_contact_list_title',
            [
                'label'       => esc_html__('Title', 'gofly-core'),
                'type'        => \Elementor\Controls_Manager::TEXT,
                'default'     => esc_html__('Contact Info', 'gofly-core'),
                'placeholder' => esc_html__('write your title here', 'gofly-core'),
                'label_block' => true,
            ]
        );

        $contacts = new \Elementor\Repeater();

        $contacts->add_control(
            'gofly_guide_details_guide_contact_icon_image',
            [
                'label' => esc_html__('Icon', 'gofly-core'),
                'type' => \Elementor\Controls_Manager::ICONS,
                'default' => [
                    'value' => 'fas fa-circle',
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

        $contacts->add_control(
            'gofly_guide_details_guide_contact',
            [
                'label'         => esc_html__('Contact Title', 'gofly-core'),
                'type'          => \Elementor\Controls_Manager::TEXT,
                'default'     => esc_html__('Whatsapp', 'gofly-core'),
                'placeholder' => esc_html__('write your contact title here', 'gofly-core'),
                'label_block' => true,
            ]
        );

        $contacts->add_control(
            'gofly_guide_details_guide_contact_number',
            [
                'label'         => esc_html__('Contact Number', 'gofly-core'),
                'type'          => \Elementor\Controls_Manager::TEXT,
                'default'     => esc_html__('+91 345 533 865', 'gofly-core'),
                'placeholder' => esc_html__('write your contact number here', 'gofly-core'),
                'label_block' => true,
            ]
        );

        $contacts->add_control(
            'gofly_guide_details_guide_contact_link',
            [
                'label'         => esc_html__('Contact Link', 'gofly-core'),
                'type'          => \Elementor\Controls_Manager::URL,
                'default'     => ['url' => '#'],
                'placeholder' => esc_html__('write your contact url here', 'gofly-core'),
                'label_block' => true,
            ]
        );

        $this->add_control(
            'gofly_guide_details_guide_contact_list',
            [
                'label'         => esc_html__('Contacts', 'gofly-core'),
                'type'          => \Elementor\Controls_Manager::REPEATER,
                'fields'        => $contacts->get_controls(),
                'default'        => [
                    [
                        'gofly_guide_details_guide_contact' => wp_kses('WhatsApp', wp_kses_allowed_html('post')),
                        'gofly_guide_details_guide_contact_number' => esc_html__('+91 345 533 865', 'gofly-core'),
                    ],
                    [
                        'gofly_guide_details_guide_contact' => wp_kses('Email Address', wp_kses_allowed_html('post')),
                        'gofly_guide_details_guide_contact_number' => esc_html__('info@example.com', 'gofly-core'),
                    ],
                ],
                'title_field' => '{{{ gofly_guide_details_guide_contact }}}',
            ]
        );

        $this->end_controls_section();

        //============Style Start=============//

        $this->start_controls_section(
            'gofly_guide_details_styles',
            [
                'label'     => esc_html__('Styles', 'gofly-core'),
                'tab'       => Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_control(
            'gofly_guide_details_social_area_style',
            [
                'label'     => esc_html__('Social Area Background', 'gofly-core'),
                'type'      => \Elementor\Controls_Manager::HEADING,
                'separator' => 'after',
            ]
        );

        $this->add_control(
            'gofly_guide_details_social_area_bg_color',
            [
                'label'     => esc_html__('Social Area BG Color', 'gofly-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .guider-details-page .guider-img-wrap .guider-social-area' => 'background-color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'gofly_guide_details_social_title_style',
            [
                'label'     => esc_html__('Social Title', 'gofly-core'),
                'type'      => \Elementor\Controls_Manager::HEADING,
                'separator' => 'after',
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'label'    => esc_html__('Typography', 'gofly-core'),
                'name'     => 'gofly_guide_details_social_title_typ',
                'selector' => '{{WRAPPER}} .guider-details-page .guider-img-wrap .guider-social-area span',

            ]
        );

        $this->add_control(
            'gofly_guide_details_social_title_color',
            [
                'label'     => esc_html__('Color', 'gofly-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .guider-details-page .guider-img-wrap .guider-social-area span' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'gofly_guide_details_social_button',
            [
                'label'     => esc_html__('Social Buttons', 'gofly-core'),
                'type'      => \Elementor\Controls_Manager::HEADING,
                'separator' => 'after',
            ]
        );

        $this->add_control(
            'gofly_guide_details_social_button_bg_color',
            [
                'label'     => esc_html__('Background Color', 'gofly-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .guider-details-page .guider-img-wrap .guider-social-area .social-list li a' => 'background-color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'gofly_guide_details_social_button_hover_bg_color',
            [
                'label'     => esc_html__('Hover Background Color', 'gofly-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .guider-details-page .guider-img-wrap .guider-social-area .social-list li a:hover' => 'background-color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'gofly_guide_details_social_button_border_color',
            [
                'label'     => esc_html__('Border Color', 'gofly-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .guider-details-page .guider-img-wrap .guider-social-area .social-list li a' => 'border-color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'gofly_guide_details_social_button_hover_border_color',
            [
                'label'     => esc_html__('Hover Border Color', 'gofly-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .guider-details-page .guider-img-wrap .guider-social-area .social-list li a:hover' => 'border-color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'gofly_guide_details_content_style',
            [
                'label'     => esc_html__('Guide Name', 'gofly-core'),
                'type'      => \Elementor\Controls_Manager::HEADING,
                'separator' => 'after',
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'label'    => esc_html__('Typography', 'gofly-core'),
                'name'     => 'gofly_guide_name_typ',
                'selector' => '{{WRAPPER}} .guider-details-page .guider-details-content .guider-name-desig h2',

            ]
        );

        $this->add_control(
            'gofly_guide_name_color',
            [
                'label'     => esc_html__('Color', 'gofly-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .guider-details-page .guider-details-content .guider-name-desig h2' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'gofly_guide_skill_style',
            [
                'label'     => esc_html__('Guide Skill', 'gofly-core'),
                'type'      => \Elementor\Controls_Manager::HEADING,
                'separator' => 'after',
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'label'    => esc_html__('Typography', 'gofly-core'),
                'name'     => 'gofly_guide_skill_typ',
                'selector' => '{{WRAPPER}} .guider-details-page .guider-details-content .guider-name-desig span',

            ]
        );

        $this->add_control(
            'gofly_guide_skill_color',
            [
                'label'     => esc_html__('Color', 'gofly-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .guider-details-page .guider-details-content .guider-name-desig span' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'gofly_guide_desc_style',
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
                'name'     => 'gofly_blog_style_post_desc_typ',
                'selector' => '{{WRAPPER}} .guider-details-page .guider-details-content .guider-info p',

            ]
        );

        $this->add_control(
            'gofly_blog_style_post_desc_color',
            [
                'label'     => esc_html__('Color', 'gofly-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .guider-details-page .guider-details-content .guider-info p' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'gofly_guide_expertise_area_style',
            [
                'label'     => esc_html__('Expertise', 'gofly-core'),
                'type'      => \Elementor\Controls_Manager::HEADING,
                'separator' => 'after',
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'label'    => esc_html__('List Title Typography', 'gofly-core'),
                'name'     => 'gofly_guide_details_expertise_list_title_typ',
                'selector' => '{{WRAPPER}} .guider-details-page .guider-details-content h4',

            ]
        );

        $this->add_control(
            'gofly_guide_details_expertise_list_title_color',
            [
                'label'     => esc_html__('List Title Color', 'gofly-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .guider-details-page .guider-details-content h4' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'gofly_guide_details_expertise_item_bg_color',
            [
                'label'     => esc_html__('Background Color', 'gofly-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .guider-details-page .guider-details-content .single-experties' => 'background-color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'gofly_guide_details_expertise_item_style',
            [
                'label'     => esc_html__('Expertise Card', 'gofly-core'),
                'type'      => \Elementor\Controls_Manager::HEADING,
                'separator' => 'after',
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'label'    => esc_html__('Typography', 'gofly-core'),
                'name'     => 'gofly_guide_details_expertise_typ',
                'selector' => '{{WRAPPER}} .guider-details-page .guider-details-content .single-experties h6',
            ]
        );

        $this->add_control(
            'gofly_guide_details_expertise_color',
            [
                'label'     => esc_html__('Color', 'gofly-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .guider-details-page .guider-details-content .single-experties h6' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->end_controls_section();

        //============Style End=============//
    }

    protected function render()
    {

        $settings = $this->get_settings_for_display();
?>

        <div class="guider-details-page">
            <div class="container">
                <div class="row gy-5 justify-content-between">
                    <div class="col-lg-5 col-md-8">
                        <div class="guider-img-wrap">
                            <?php if (! empty($settings['gofly_guide_details_guide_image']['url'])) : ?>
                                <img src="<?php echo esc_url($settings['gofly_guide_details_guide_image']['url']); ?>" alt="<?php echo esc_attr__('image', 'gofly-core'); ?>">
                            <?php endif; ?>
                            <div class="guider-social-area">
                                <?php if (! empty($settings['gofly_guide_details_social_title'])) : ?>
                                    <span><?php echo esc_html($settings['gofly_guide_details_social_title']); ?></span>
                                <?php endif; ?>
                                <ul class="social-list">
                                    <?php if (!empty($settings['guide_details_website_link_facebook']['url'])): ?>
                                        <li>
                                            <a href="<?php echo esc_url($settings['guide_details_website_link_facebook']['url']); ?>"><i class="bx bxl-facebook"></i></a>
                                        </li>
                                    <?php endif; ?>
                                    <?php if (!empty($settings['guide_details_website_link_twitter']['url'])): ?>
                                        <li>
                                            <a href="<?php echo esc_url($settings['guide_details_website_link_twitter']['url']); ?>"><i class="bi bi-twitter-x"></i></a>
                                        </li>
                                    <?php endif; ?>
                                    <?php if (!empty($settings['guide_details_website_link_pinterest']['url'])): ?>
                                        <li>
                                            <a href="<?php echo esc_url($settings['guide_details_website_link_pinterest']['url']); ?>"><i class="bx bxl-pinterest-alt"></i></a>
                                        </li>
                                    <?php endif; ?>
                                    <?php if (!empty($settings['guide_details_website_link_instagram']['url'])): ?>
                                        <li>
                                            <a href="<?php echo esc_url($settings['guide_details_website_link_instagram']['url']); ?>"><i class="bx bxl-instagram"></i></a>
                                        </li>
                                    <?php endif; ?>
                                    <?php if (!empty($settings['guide_details_website_link_linkedin']['url'])): ?>
                                        <li>
                                            <a href="<?php echo esc_url($settings['guide_details_website_link_linkedin']['url']) ?>"><i class='bx bxl-linkedin'></i></a>
                                        </li>
                                    <?php endif; ?>
                                    <?php if (!empty($settings['guide_details_website_link_stackoverflow']['url'])): ?>
                                        <li>
                                            <a href="<?php echo esc_url($settings['guide_details_website_link_stackoverflow']['url']) ?>"><i class='bx bxl-stack-overflow'></i></a>
                                        </li>
                                    <?php endif; ?>
                                    <?php if (!empty($settings['guide_details_website_link_behance']['url'])): ?>
                                        <li>
                                            <a href="<?php echo esc_url($settings['guide_details_website_link_behance']['url']) ?>"><i class='bx bxl-behance'></i></a>
                                        </li>
                                    <?php endif; ?>
                                    <?php if (!empty($settings['guide_details_website_link_reddit']['url'])): ?>
                                        <li>
                                            <a href="<?php echo esc_url($settings['guide_details_website_link_reddit']['url']) ?>"><i class='bx bxl-reddit'></i></a>
                                        </li>
                                    <?php endif; ?>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-6 col-lg-7">
                        <div class="guider-details-content">
                            <div class="guider-name-desig">
                                <?php if (! empty($settings['gofly_guide_details_guide_name'])): ?>
                                    <h2><?php echo esc_html($settings['gofly_guide_details_guide_name']); ?></h2>
                                <?php endif; ?>
                                <?php if (! empty($settings['gofly_guide_details_guide_skill'])): ?>
                                    <span><?php echo esc_html($settings['gofly_guide_details_guide_skill']); ?></span>
                                <?php endif; ?>
                            </div>
                            <div class="guider-info">
                                <?php if (! empty($settings['gofly_guide_details_quote_line'])) : ?>
                                    <h5><?php echo esc_html($settings['gofly_guide_details_quote_line']); ?></h5>
                                <?php endif; ?>
                                <?php if (!empty($settings['gofly_guide_details_guide_description'])) {
                                    echo wp_kses($settings['gofly_guide_details_guide_description'], wp_kses_allowed_html('post'));
                                }
                                ?>
                            </div>
                            <div class="guider-experties mb-50">
                                <?php if (! empty($settings['gofly_guide_details_guide_list_title'])): ?>
                                    <h4><?php echo esc_html($settings['gofly_guide_details_guide_list_title']); ?></h4>
                                <?php endif; ?>
                                <div class="row g-md-4 g-3">
                                    <?php
                                    if (!empty($settings['gofly_guide_details_expertise_list'])):
                                        foreach ($settings['gofly_guide_details_expertise_list'] as $expertise) :
                                    ?>
                                            <div class="col-md-4 col-6">
                                                <div class="single-experties">
                                                    <?php if (!empty($expertise['gofly_guide_details_guide_expertise_icon_image']['url'])) : ?>
                                                        <?php \Elementor\Icons_Manager::render_icon($expertise['gofly_guide_details_guide_expertise_icon_image'], ['aria-hidden' => 'true']); ?>
                                                    <?php endif; ?>
                                                    <?php if (!empty($expertise['gofly_guide_details_guide_expertise_title'])) : ?>
                                                        <h6><?php echo wp_kses($expertise['gofly_guide_details_guide_expertise_title'], wp_kses_allowed_html('post')); ?></h6>
                                                    <?php endif; ?>
                                                </div>
                                            </div>
                                    <?php endforeach;
                                    endif; ?>
                                </div>
                                <?php if (!empty($settings['gofly_guide_details_guide_languages'])) : ?>
                                    <div class="guider-operator-area">
                                        <svg width="24" height="24" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                            <g>
                                                <path
                                                    d="M22.8112 19.92C20.4112 18.6568 18.576 17.956 16.946 17.6792L17.1232 17.4352C17.1577 17.3879 17.1813 17.3336 17.1925 17.2762C17.2036 17.2187 17.2019 17.1595 17.1876 17.1028L16.8164 15.618C16.9526 15.4258 17.0809 15.228 17.2008 15.0252C18.6956 14.518 19.4532 13.66 19.578 12.392C20.2581 12.3508 20.8 11.79 20.8 11.1V8.1C20.8 7.41441 20.2648 6.8572 19.5916 6.8092C19.4972 4.48561 18.4748 0 12 0C5.52478 0 4.50239 4.48561 4.40841 6.8092C3.73481 6.8572 3.20002 7.41441 3.20002 8.1V11.1C3.20002 11.8168 3.78323 12.4 4.5 12.4H5.1C5.3332 12.4 5.5492 12.3332 5.73839 12.2252C5.96681 13.428 6.47039 14.6124 7.18317 15.618L6.81197 17.1028C6.79774 17.1596 6.79613 17.2187 6.80726 17.2762C6.81839 17.3336 6.84198 17.3879 6.87638 17.4352L7.05398 17.6792C5.424 17.956 3.5888 18.6568 1.18837 19.92C0.455203 20.306 2.47399e-08 21.0608 2.47399e-08 21.89V23.6C-1.8454e-05 23.6525 0.0103148 23.7046 0.0304094 23.7531C0.0505039 23.8016 0.0799659 23.8457 0.117112 23.8829C0.154257 23.92 0.198358 23.9495 0.246895 23.9696C0.295432 23.9897 0.347453 24 0.399984 24H10.1504L13.832 23.9964C13.8384 23.9968 13.844 24 13.8504 24H23.6C23.7061 24 23.8078 23.9578 23.8828 23.8828C23.9578 23.8078 24 23.7061 24 23.6V21.89C24 21.0608 23.5444 20.306 22.8112 19.92ZM17.7528 13.9184C17.98 13.3696 18.152 12.7996 18.2612 12.2252C18.4199 12.3156 18.5961 12.371 18.778 12.3876C18.7088 12.96 18.4544 13.4968 17.7528 13.9184ZM5.69358 6.95039C5.54266 6.87224 5.37775 6.82479 5.20837 6.8108C5.30681 4.39959 6.39319 0.800016 12 0.800016C17.6064 0.800016 18.6928 4.39964 18.7912 6.8108C18.6218 6.82479 18.4569 6.87224 18.306 6.95039C17.8028 3.92002 15.1704 1.59998 12 1.59998C8.82919 1.59998 6.19678 3.92002 5.69358 6.95039ZM7.63322 17.1156L7.8128 16.398C7.81439 16.4 7.81598 16.4012 7.81758 16.4028C8.784 17.4532 10.0128 18.1932 11.3984 18.3616C11.3992 18.3616 11.4 18.362 11.4012 18.362L11.22 18.7692L10.3155 20.804L7.63322 17.1156ZM12 18.9852L12.9844 21.2H11.0156L12 18.9852ZM10.488 23.1996L10.7276 22H13.272L13.512 23.1968L10.488 23.1996ZM13.684 20.804L12.7796 18.7692L12.5988 18.362C12.5996 18.362 12.6004 18.3616 12.6012 18.3616C13.9868 18.1932 15.216 17.4532 16.182 16.4028C16.1835 16.4012 16.1856 16.4 16.1867 16.398L16.3667 17.1156L13.684 20.804ZM12.4 14.8C12.3475 14.8 12.2954 14.8103 12.2469 14.8304C12.1984 14.8505 12.1543 14.88 12.1171 14.9171C12.08 14.9542 12.0505 14.9983 12.0304 15.0469C12.0103 15.0954 12 15.1474 12 15.2C12 15.2525 12.0103 15.3045 12.0304 15.3531C12.0505 15.4016 12.08 15.4457 12.1171 15.4828C12.1543 15.52 12.1984 15.5494 12.2469 15.5695C12.2954 15.5896 12.3475 15.6 12.4 15.6C13.8616 15.6 15.0732 15.5063 16.0672 15.3167C16.052 15.3367 16.0356 15.3555 16.02 15.3755C16.006 15.3887 15.9876 15.3975 15.9756 15.4131C15.8413 15.5853 15.6991 15.7512 15.5496 15.9103L15.546 15.9139C15.4496 16.0163 15.3484 16.1075 15.2484 16.2011C14.2704 17.0831 13.1088 17.5999 12 17.5999C10.8908 17.5999 9.72919 17.0831 8.75161 16.2015C8.6512 16.1075 8.55 16.0163 8.45362 15.9135C8.45241 15.9127 8.45161 15.9115 8.45044 15.9107C8.301 15.7512 8.15872 15.5852 8.02402 15.4131C8.01202 15.3975 7.99402 15.3887 7.97962 15.3755C7.0372 14.1863 6.40003 12.6011 6.40003 10.7999V7.99992C6.39998 4.91198 8.91202 2.4 12 2.4C15.0876 2.4 17.6 4.91198 17.6 8.00002V10.8C17.6 12.1284 17.25 13.3372 16.6916 14.3596C15.7364 14.6352 14.3648 14.8 12.4 14.8Z" />
                                            </g>
                                        </svg>
                                        <span><?php echo wp_kses($settings['gofly_guide_details_guide_languages'], wp_kses_allowed_html('post')); ?></span>
                                    </div>
                                <?php endif; ?>
                            </div>
                            <div class="contact-info">
                                <?php if (!empty($settings['gofly_guide_details_guide_contact_list_title'])) : ?>
                                    <h4><?php echo esc_html($settings['gofly_guide_details_guide_contact_list_title']); ?></h4>
                                <?php endif; ?>
                                <div class="row g-xxl-4 g-lg-3 g-4">
                                    <?php if (!empty($settings['gofly_guide_details_guide_contact_list'])):
                                        foreach ($settings['gofly_guide_details_guide_contact_list'] as $contact) :
                                    ?>
                                            <div class="col-md-6">
                                                <div class="single-contact">
                                                    <?php if (!empty($contact['gofly_guide_details_guide_contact_icon_image'])) : ?>
                                                        <div class="icon">
                                                            <?php \Elementor\Icons_Manager::render_icon($contact['gofly_guide_details_guide_contact_icon_image'], ['aria-hidden' => 'true']); ?>
                                                        </div>
                                                    <?php endif; ?>
                                                    <div class="content">
                                                        <?php if (!empty($contact['gofly_guide_details_guide_contact'])) : ?>
                                                            <span><?php echo esc_html($contact['gofly_guide_details_guide_contact']); ?></span>
                                                        <?php endif; ?>
                                                        <?php if (!empty($contact['gofly_guide_details_guide_contact_link']['url'])) : ?>
                                                            <a href="<?php echo esc_url($contact['gofly_guide_details_guide_contact_link']['url']); ?>"><?php echo esc_html($contact['gofly_guide_details_guide_contact_number']) ?></a>
                                                        <?php endif; ?>
                                                    </div>
                                                </div>
                                            </div>
                                    <?php endforeach;
                                    endif; ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

<?php

    }
}

Plugin::instance()->widgets_manager->register(new Gofly_Guide_Details_Widget());
