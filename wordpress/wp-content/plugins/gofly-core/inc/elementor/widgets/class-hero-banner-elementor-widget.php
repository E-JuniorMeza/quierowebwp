<?php

namespace Elementor;

if (!defined('ABSPATH')) exit;  // Exit if accessed directly

use Elementor\core\Schemes;
use Egns_Core\Egns_Helper;

class Gofly_Hero_Banner_Widget extends Widget_Base
{

    public function get_name()
    {
        return 'gofly_hero_banner';
    }

    public function get_title()
    {
        return esc_html__('EG Hero Banner', 'gofly-core');
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
            'gofly_hero_banner_genaral',
            [
                'label' => esc_html__('General', 'gofly-core')
            ]
        );

        $this->add_control(
            'gofly_hero_banner_genaral_style_selection',
            [
                'label'   => esc_html__('Select Style', 'gofly-core'),
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
            'gofly_hero_banner_genaral_title',
            [
                'label'       => esc_html__('Title', 'gofly-core'),
                'type'        => \Elementor\Controls_Manager::TEXT,
                'default'     => esc_html__('All-in-one Travel Booking.', 'gofly-core'),
                'placeholder' => esc_html__('write your title here', 'gofly-core'),
                'label_block' => true,
            ]
        );

        $this->add_control(
            'gofly_hero_banner_genaral_description',
            [
                'label'       => esc_html__('Description', 'gofly-core'),
                'type'        => \Elementor\Controls_Manager::WYSIWYG,
                'default'     => wp_kses('Highlights convenience and simplicity, Best for agencies with online & mobile-friendly services.', wp_kses_allowed_html('post')),
                'placeholder' => esc_html__('write your title here', 'gofly-core'),
                'label_block' => true,
                'condition'   => [
                    'gofly_hero_banner_genaral_style_selection!' => 'style_three',
                ],
            ]
        );

        $this->add_control(
            'gofly_hero_banner_genaral_background_contant',
            [
                'label'     => esc_html__('Background Content', 'gofly-core'),
                'type'      => \Elementor\Controls_Manager::HEADING,
                'separator' => 'after',
            ]
        );

        $this->add_control(
            'gofly_hero_banner_genaral_background_contant_selection',
            [
                'label'   => esc_html__('Select Type', 'gofly-core'),
                'type'    => Controls_Manager::SELECT,
                'options' => [
                    'upload_video' => esc_html__('Upload Video', 'gofly-core'),
                    'video_link'   => esc_html__('Upload Link', 'gofly-core'),
                    'image'        => esc_html__('Image', 'gofly-core'),
                ],
                'default' => 'upload_video',
            ]
        );

        $this->add_control(
            'gofly_hero_banner_genaral_background_contant_upload_video',
            [
                'label'       => esc_html__('Choose Video File', 'gofly-core'),
                'type'        => \Elementor\Controls_Manager::MEDIA,
                'media_types' => ['video'],
                'default'     => [
                    'url' => \Elementor\Utils::get_placeholder_image_src(),
                ],
                'condition' => [
                    'gofly_hero_banner_genaral_background_contant_selection' => ['upload_video'],
                ]
            ]
        );

        $this->add_control(
            'gofly_hero_banner_genaral_background_contant_video_link',
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
                    'gofly_hero_banner_genaral_background_contant_selection' => ['video_link'],
                ]
            ]
        );

        $this->add_control(
            'gofly_hero_banner_genaral_background_contant_image',
            [
                'label'   => esc_html__('Background Image', 'gofly-core'),
                'type'    => \Elementor\Controls_Manager::MEDIA,
                'default' => [
                    'url' => \Elementor\Utils::get_placeholder_image_src(),
                ],
                'media_types' => ['image'],
                'condition'   => [
                    'gofly_hero_banner_genaral_background_contant_selection' => ['image'],
                ]
            ]
        );

        // Filter options content
        $this->add_control(
            'gofly_filter_options',
            [
                'label'     => esc_html__('Filter Options', 'gofly-core'),
                'type'      => \Elementor\Controls_Manager::HEADING,
                'separator' => 'before',
                'condition' => [
                    'gofly_hero_banner_genaral_style_selection' => 'style_three',
                ],
            ]
        );

        $this->add_control(
            'gofly_filter_searchbox_title',
            [
                'label'       => esc_html__('Title', 'gofly-core'),
                'type'        => \Elementor\Controls_Manager::TEXT,
                'default'     => esc_html__('Find Your Favourite Place.', 'gofly-core'),
                'placeholder' => esc_html__('write your title here', 'gofly-core'),
                'label_block' => true,
                'condition'   => [
                    'gofly_hero_banner_genaral_style_selection' => 'style_three',
                ],
            ]
        );
        $this->add_control(
            'gofly_filter_searchbox_str_desc',
            [
                'label'       => esc_html__('Rating Description', 'gofly-core'),
                'type'        => \Elementor\Controls_Manager::TEXTAREA,
                'default'     => wp_kses_post('Rated by <strong>10,000+</strong> Travelers Worldwide'),
                'placeholder' => esc_html__('write your description here', 'gofly-core'),
                'label_block' => true,
                'condition'   => [
                    'gofly_hero_banner_genaral_style_selection' => 'style_three',
                ],
            ]
        );

        // End Filter options content


        $this->end_controls_section();

        //============Style One Start=============//

        $this->start_controls_section(
            'gofly_hero_banner_style_genaral',
            [
                'label'     => esc_html__('Styles', 'gofly-core'),
                'tab'       => Controls_Manager::TAB_STYLE,
                'condition' => [
                    'gofly_hero_banner_genaral_style_selection' => ['style_one'],
                ]
            ]
        );

        $this->add_control(
            'gofly_hero_banner_style_genaral_title',
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
                'name'     => 'gofly_hero_banner_style_genaral_title_typ',
                'selector' => '{{WRAPPER}} .home1-banner-section .banner-content-wrap .banner-content h1',

            ]
        );

        $this->add_control(
            'gofly_hero_banner_style_genaral_title_color',
            [
                'label'     => esc_html__('Color', 'gofly-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .home1-banner-section .banner-content-wrap .banner-content h1' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'gofly_hero_banner_style_genaral_subtitle',
            [
                'label'     => esc_html__('Subtitle', 'gofly-core'),
                'type'      => \Elementor\Controls_Manager::HEADING,
                'separator' => 'after',
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'label'    => esc_html__('Typography', 'gofly-core'),
                'name'     => 'gofly_hero_banner_style_genaral_subtitle_typ',
                'selector' => '{{WRAPPER}} .home1-banner-section .banner-content-wrap .banner-content p',

            ]
        );

        $this->add_control(
            'gofly_hero_banner_style_genaral_subtitle_color',
            [
                'label'     => esc_html__('Color', 'gofly-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .home1-banner-section .banner-content-wrap .banner-content p' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->end_controls_section();

        //============Style One End=============//

        //============Style Two Start=============//

        $this->start_controls_section(
            'gofly_hero_banner_style_two_genaral',
            [
                'label'     => esc_html__('Styles', 'gofly-core'),
                'tab'       => Controls_Manager::TAB_STYLE,
                'condition' => [
                    'gofly_hero_banner_genaral_style_selection' => ['style_two'],
                ]
            ]
        );

        $this->add_control(
            'gofly_hero_banner_style_two_genaral_title',
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
                'name'     => 'gofly_hero_banner_style_two_genaral_title_typ',
                'selector' => '{{WRAPPER}} .home4-banner-section .banner-content-wrap .banner-content h1',

            ]
        );

        $this->add_control(
            'gofly_hero_banner_style_two_genaral_title_color',
            [
                'label'     => esc_html__('Color', 'gofly-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .home4-banner-section .banner-content-wrap .banner-content h1' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'gofly_hero_banner_style_two_genaral_subtitle',
            [
                'label'     => esc_html__('Subtitle', 'gofly-core'),
                'type'      => \Elementor\Controls_Manager::HEADING,
                'separator' => 'after',
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'label'    => esc_html__('Typography', 'gofly-core'),
                'name'     => 'gofly_hero_banner_style_two_genaral_subtitle_typ',
                'selector' => '{{WRAPPER}} .home4-banner-section .banner-content-wrap .banner-content > p',

            ]
        );

        $this->add_control(
            'gofly_hero_banner_style_two_genaral_subtitle_color',
            [
                'label'     => esc_html__('Color', 'gofly-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .home4-banner-section .banner-content-wrap .banner-content > p' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->end_controls_section();

        //============Style Two End=============//
    }
    protected function render()
    {

        $settings = $this->get_settings_for_display();

?>

        <?php if ($settings['gofly_hero_banner_genaral_style_selection'] == 'style_one'): ?>
            <div class="home1-banner-section">
                <div class="banner-video-area">
                    <?php
                    $selection = $settings['gofly_hero_banner_genaral_background_contant_selection'] ?? '';
                    if ($selection === 'upload_video' && !empty($settings['gofly_hero_banner_genaral_background_contant_upload_video']['url'])): ?>
                        <video autoplay loop muted playsinline src="<?php echo esc_url($settings['gofly_hero_banner_genaral_background_contant_upload_video']['url']); ?>"></video>
                    <?php elseif ($selection === 'video_link' && !empty($settings['gofly_hero_banner_genaral_background_contant_video_link']['url'])): ?>
                        <video autoplay loop muted playsinline src="<?php echo esc_url($settings['gofly_hero_banner_genaral_background_contant_video_link']['url']); ?>"></video>
                    <?php elseif ($selection === 'image' && !empty($settings['gofly_hero_banner_genaral_background_contant_image']['url'])): ?>
                        <img src="<?php echo esc_url($settings['gofly_hero_banner_genaral_background_contant_image']['url']); ?>" alt="<?php echo esc_attr__('background-image', 'gofly-core'); ?>">
                    <?php endif; ?>
                </div>
                <div class="banner-content-wrap">
                    <div class="container">
                        <div class="banner-content">
                            <?php if (!empty($settings['gofly_hero_banner_genaral_title'])): ?>
                                <h1><?php echo esc_html($settings['gofly_hero_banner_genaral_title']); ?></h1>
                            <?php endif; ?>
                            <?php if (!empty($settings['gofly_hero_banner_genaral_description'])): ?>
                                <?php echo wp_kses($settings['gofly_hero_banner_genaral_description'], wp_kses_allowed_html('post'));  ?>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            </div>
        <?php endif; ?>

        <?php if ($settings['gofly_hero_banner_genaral_style_selection'] == 'style_two'): ?>
            <div class="home4-banner-section">
                <div class="banner-video-area">
                    <?php
                    $selection = $settings['gofly_hero_banner_genaral_background_contant_selection'] ?? '';
                    if ($selection === 'upload_video' && !empty($settings['gofly_hero_banner_genaral_background_contant_upload_video']['url'])): ?>
                        <video autoplay loop muted playsinline src="<?php echo esc_url($settings['gofly_hero_banner_genaral_background_contant_upload_video']['url']); ?>"></video>
                    <?php elseif ($selection === 'video_link' && !empty($settings['gofly_hero_banner_genaral_background_contant_video_link']['url'])): ?>
                        <video autoplay loop muted playsinline src="<?php echo esc_url($settings['gofly_hero_banner_genaral_background_contant_video_link']['url']); ?>"></video>
                    <?php elseif ($selection === 'image' && !empty($settings['gofly_hero_banner_genaral_background_contant_image']['url'])): ?>
                        <img src="<?php echo esc_url($settings['gofly_hero_banner_genaral_background_contant_image']['url']); ?>" alt="<?php echo esc_attr__('background-image', 'gofly-core'); ?>">
                    <?php endif; ?>
                </div>
                <div class="banner-content-wrap">
                    <div class="container">
                        <div class="banner-content">
                            <?php if (!empty($settings['gofly_hero_banner_genaral_title'])): ?>
                                <h1><?php echo esc_html($settings['gofly_hero_banner_genaral_title']); ?></h1>
                            <?php endif; ?>
                            <?php if (!empty($settings['gofly_hero_banner_genaral_description'])): ?>
                                <?php echo wp_kses($settings['gofly_hero_banner_genaral_description'], wp_kses_allowed_html('post'));  ?>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            </div>
        <?php endif; ?>

        <?php if ($settings['gofly_hero_banner_genaral_style_selection'] == 'style_three'): ?>
            <div class="home9-banner-section">
                <div class="banner-video-area">
                    <?php
                    $selection = $settings['gofly_hero_banner_genaral_background_contant_selection'] ?? '';
                    if ($selection === 'upload_video' && !empty($settings['gofly_hero_banner_genaral_background_contant_upload_video']['url'])): ?>
                        <video autoplay loop muted playsinline src="<?php echo esc_url($settings['gofly_hero_banner_genaral_background_contant_upload_video']['url']); ?>"></video>
                    <?php elseif ($selection === 'video_link' && !empty($settings['gofly_hero_banner_genaral_background_contant_video_link']['url'])): ?>
                        <video autoplay loop muted playsinline src="<?php echo esc_url($settings['gofly_hero_banner_genaral_background_contant_video_link']['url']); ?>"></video>
                    <?php elseif ($selection === 'image' && !empty($settings['gofly_hero_banner_genaral_background_contant_image']['url'])): ?>
                        <img src="<?php echo esc_url($settings['gofly_hero_banner_genaral_background_contant_image']['url']); ?>" alt="<?php echo esc_attr__('background-image', 'gofly-core'); ?>">
                    <?php endif; ?>
                </div>
                <div class="banner-content-wrap-and-filter">
                    <div class="container">
                        <?php if (!empty($settings['gofly_hero_banner_genaral_title'])): ?>
                            <div class="banner-content wow animate fadeInDown" data-wow-delay="200ms" data-wow-duration="1500ms">
                                <h1><?php echo esc_html($settings['gofly_hero_banner_genaral_title']); ?></h1>
                            </div>
                        <?php endif; ?>
                        <div class="filter-wrapper city wow animate fadeInUp" data-wow-delay="400ms" data-wow-duration="1500ms">
                            <div class="container">
                                <div class="filter-input-wrap">
                                    <h6><?php echo esc_html($settings['gofly_filter_searchbox_title']) ?></h6>
                                    <form class="filter-input show mb-10" method="get" action="<?php echo get_post_type_archive_link('tour'); ?>">
                                        <div class="single-search-box">
                                            <svg width="18" height="18" viewBox="0 0 18 18" xmlns="http://www.w3.org/2000/svg">
                                                <g>
                                                    <path
                                                        d="M12.5944 8.99987C12.5944 10.988 10.9826 12.5998 8.99443 12.5998C7.00627 12.5998 5.39465 10.988 5.39465 8.99987C5.39465 7.0117 7.00627 5.40009 8.99443 5.40009C10.9826 5.40009 12.5944 7.0117 12.5944 8.99987Z" />
                                                    <path
                                                        d="M17.4601 8.4599H16.2564C15.9858 4.86535 13.1291 2.00812 9.53458 1.7372V0.539976C9.53458 0.241723 9.29268 0 8.9946 0C8.69635 0 8.45462 0.241723 8.45462 0.539976V1.7372C4.85986 2.00812 2.00297 4.86535 1.73235 8.4599H0.540018C0.241723 8.4599 0 8.7017 0 8.99987C0 9.29813 0.241723 9.53985 0.539976 9.53985H1.73239C2.00297 13.1344 4.85991 15.9916 8.45441 16.2625V17.4601C8.45441 17.7583 8.69614 18 8.99439 18C9.29251 18 9.53428 17.7583 9.53428 17.4601V16.2625C13.1289 15.9918 15.9858 13.1346 16.2564 9.53985H17.4601C17.7583 9.53985 18 9.29813 18 8.99987C18 8.70175 17.7583 8.4599 17.4601 8.4599ZM8.99443 15.2096C5.56504 15.2094 2.78509 12.4291 2.78509 8.9997C2.78522 5.57014 5.56554 2.7902 8.99494 2.7902C12.4245 2.7902 15.2046 5.57048 15.2046 8.99987C15.2005 12.428 12.4225 15.2058 8.99443 15.2096Z" />
                                                </g>
                                            </svg>
                                            <?php
                                            $destination_counts = Egns_Helper::egns_get_counts_by_custom_meta_key('EGNS_TOUR_META_ID', 'tour_destination_select', 'tour');
                                            $args               = [
                                                'post_type'      => 'tour',
                                                'post_status'    => 'publish',
                                                'posts_per_page' => -1,
                                            ];
                                            $query = new \WP_Query($args);

                                            $all_destination_ids = [];

                                            if ($query->have_posts()) {
                                                while ($query->have_posts()) {
                                                    $query->the_post();

                                                    $destinations = Egns_Helper::egns_get_tour_value('tour_destination_select');
                                                    if (!empty($destinations) && is_array($destinations)) {
                                                        $all_destination_ids = array_merge($all_destination_ids, $destinations);
                                                    }
                                                }
                                                wp_reset_postdata();
                                            }

                                            $all_destination_ids = array_unique($all_destination_ids);

                                            ?>
                                            <div class="custom-select-dropdown destination-dropdown">
                                                <input type="text" readonly value="Where are you going?">
                                                <div class="input-field-value">
                                                    <div class="destination">
                                                        <h6><?php echo esc_html__('Select', 'gofly-core') ?></h6>
                                                        <span><?php echo esc_html__('Destination', 'gofly-core') ?></span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="custom-select-wrap">
                                                <div class="custom-select-search-area">
                                                    <i class='bx bx-search'></i>
                                                    <input type="text" name="tr_destination" value="" placeholder="<?php echo esc_html__('Type Your Destination', 'gofly-core') ?>">
                                                </div>
                                                <ul class="option-list-destination">
                                                    <?php
                                                    foreach ($all_destination_ids as $destination_id) {
                                                        $destination_name = get_the_title($destination_id);
                                                        $des_exp_count    = isset($destination_counts[$destination_id]) ? $destination_counts[$destination_id] : 0;
                                                    ?>
                                                        <li data-value="<?php echo esc_attr($destination_id) ?>">
                                                            <div class="destination">
                                                                <h6><?php echo esc_html($destination_name); ?></h6>
                                                                <span><?php echo esc_html__('Destination', 'gofly-core') ?></span>
                                                            </div>
                                                            <div class="tour">
                                                                <span><?php echo sprintf('%02d', $des_exp_count) ?> <br> <?php echo esc_html__('Tour', 'gofly-core') ?></span>
                                                            </div>
                                                        </li>
                                                    <?php
                                                    }
                                                    ?>
                                                </ul>
                                            </div>
                                        </div>
                                        <div class="single-search-box">
                                            <?php
                                            $tour_types = get_terms(array(
                                                'taxonomy'   => 'tour-type',
                                                'hide_empty' => false,
                                            ));
                                            ?>
                                            <svg width="20" height="20" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                                <path
                                                    d="M19.3023 4.186H9.99992C9.81489 4.186 9.63743 4.1125 9.50659 3.98166C9.37575 3.85082 9.30225 3.67336 9.30225 3.48833C9.30225 3.30329 9.37575 3.12583 9.50659 2.99499C9.63743 2.86415 9.81489 2.79065 9.99992 2.79065H19.3023C19.4873 2.79065 19.6648 2.86415 19.7956 2.99499C19.9265 3.12583 20 3.30329 20 3.48833C20 3.67336 19.9265 3.85082 19.7956 3.98166C19.6648 4.1125 19.4873 4.186 19.3023 4.186ZM17.4418 7.90695H9.99992C9.81489 7.90695 9.63743 7.83344 9.50659 7.7026C9.37575 7.57176 9.30225 7.39431 9.30225 7.20927C9.30225 7.02424 9.37575 6.84678 9.50659 6.71594C9.63743 6.5851 9.81489 6.5116 9.99992 6.5116H17.4418C17.6269 6.5116 17.8043 6.5851 17.9351 6.71594C18.066 6.84678 18.1395 7.02424 18.1395 7.20927C18.1395 7.39431 18.066 7.57176 17.9351 7.7026C17.8043 7.83344 17.6269 7.90695 17.4418 7.90695ZM19.3023 13.4884H9.99992C9.81489 13.4884 9.63743 13.4149 9.50659 13.284C9.37575 13.1532 9.30225 12.9757 9.30225 12.7907C9.30225 12.6057 9.37575 12.4282 9.50659 12.2974C9.63743 12.1665 9.81489 12.093 9.99992 12.093H19.3023C19.4873 12.093 19.6648 12.1665 19.7956 12.2974C19.9265 12.4282 20 12.6057 20 12.7907C20 12.9757 19.9265 13.1532 19.7956 13.284C19.6648 13.4149 19.4873 13.4884 19.3023 13.4884ZM17.4418 17.2093H9.99992C9.81489 17.2093 9.63743 17.1358 9.50659 17.005C9.37575 16.8741 9.30225 16.6967 9.30225 16.5116C9.30225 16.3266 9.37575 16.1491 9.50659 16.0183C9.63743 15.8875 9.81489 15.814 9.99992 15.814H17.4418C17.6269 15.814 17.8043 15.8875 17.9351 16.0183C18.066 16.1491 18.1395 16.3266 18.1395 16.5116C18.1395 16.6967 18.066 16.8741 17.9351 17.005C17.8043 17.1358 17.6269 17.2093 17.4418 17.2093Z" />
                                                <path
                                                    d="M3.48839 8.83719C5.41497 8.83719 6.97677 7.27538 6.97677 5.3488C6.97677 3.42222 5.41497 1.86041 3.48839 1.86041C1.5618 1.86041 0 3.42222 0 5.3488C0 7.27538 1.5618 8.83719 3.48839 8.83719Z" />
                                                <path
                                                    d="M3.48839 18.1396C5.41497 18.1396 6.97677 16.5778 6.97677 14.6512C6.97677 12.7246 5.41497 11.1628 3.48839 11.1628C1.5618 11.1628 0 12.7246 0 14.6512C0 16.5778 1.5618 18.1396 3.48839 18.1396Z" />
                                            </svg>
                                            <div class="custom-select-dropdown">
                                                <input type="text" name="tr_types" readonly value="" placeholder="<?php echo esc_attr__('Select', 'gofly-core') ?>">
                                                <span><?php echo esc_html__('Tour Types', 'gofly-core') ?></span>
                                            </div>
                                            <div class="custom-select-wrap two no-scroll">
                                                <ul class="option-list">
                                                    <?php if (!empty($tour_types) && !is_wp_error($tour_types)): ?>
                                                        <?php foreach ($tour_types as $tour_type) : ?>
                                                            <li class="single-item" data-value="<?php echo esc_attr($tour_type->slug); ?>">
                                                                <h6><?php echo esc_html($tour_type->name); ?></h6>
                                                            </li>
                                                        <?php endforeach; ?>
                                                    <?php else: ?>
                                                        <li class="single-item">
                                                            <h6><?php echo esc_html__('No tour types found', 'gofly-core') ?></h6>
                                                        </li>
                                                    <?php endif; ?>
                                                </ul>
                                            </div>
                                        </div>
                                        <div class="single-search-box date-field">
                                            <svg width="18" height="18" viewBox="0 0 18 18" xmlns="http://www.w3.org/2000/svg">
                                                <g>
                                                    <path
                                                        d="M16.125 1.28394H14.8913V2.43609C14.9509 2.57307 14.9755 2.72275 14.9629 2.87163C14.9502 3.0205 14.9007 3.16388 14.8188 3.28883C14.7368 3.41379 14.6251 3.51638 14.4936 3.58736C14.3622 3.65834 14.2151 3.69547 14.0657 3.6954C13.9163 3.69533 13.7692 3.65807 13.6378 3.58697C13.5064 3.51587 13.3948 3.41318 13.313 3.28815C13.2312 3.16312 13.1818 3.0197 13.1693 2.87081C13.1567 2.72193 13.1815 2.57227 13.2413 2.43534V1.28409H11.5136V2.43609C11.5733 2.57304 11.598 2.72272 11.5854 2.87159C11.5728 3.02047 11.5234 3.16388 11.4415 3.28887C11.3597 3.41386 11.248 3.5165 11.1165 3.58754C10.9851 3.65858 10.838 3.69577 10.6886 3.69577C10.5392 3.69577 10.3922 3.65858 10.2607 3.58754C10.1293 3.5165 10.0176 3.41386 9.93572 3.28887C9.85387 3.16388 9.80441 3.02047 9.79183 2.87159C9.77924 2.72272 9.80391 2.57304 9.86363 2.43609V1.28394H8.13638V2.43609C8.19609 2.57304 8.22076 2.72272 8.20818 2.87159C8.19559 3.02047 8.14613 3.16388 8.06428 3.28887C7.98242 3.41386 7.87073 3.5165 7.73929 3.58754C7.60784 3.65858 7.46079 3.69577 7.31138 3.69577C7.16197 3.69577 7.01491 3.65858 6.88346 3.58754C6.75202 3.5165 6.64033 3.41386 6.55848 3.28887C6.47662 3.16388 6.42716 3.02047 6.41457 2.87159C6.40199 2.72272 6.42666 2.57304 6.48638 2.43609V1.28394H4.75875V2.43519C4.81852 2.57212 4.84327 2.72178 4.83075 2.87066C4.81823 3.01955 4.76884 3.16297 4.68704 3.288C4.60524 3.41303 4.49359 3.51572 4.36219 3.58682C4.23078 3.65792 4.08373 3.69518 3.93432 3.69525C3.78491 3.69532 3.63784 3.65819 3.50636 3.58721C3.37489 3.51623 3.26315 3.41364 3.18124 3.28868C3.09932 3.16373 3.0498 3.02035 3.03715 2.87148C3.02449 2.7226 3.0491 2.57292 3.10875 2.43594V1.28394H1.875C1.37772 1.28394 0.900806 1.48148 0.549175 1.83311C0.197544 2.18474 0 2.66165 0 3.15894L0 16.0964C4.97191e-05 16.5937 0.19761 17.0706 0.54923 17.4222C0.90085 17.7738 1.37773 17.9714 1.875 17.9714H16.125C16.6223 17.9714 17.0992 17.7738 17.4508 17.4222C17.8024 17.0706 18 16.5937 18 16.0964V3.15894C18 2.66165 17.8025 2.18474 17.4508 1.83311C17.0992 1.48148 16.6223 1.28394 16.125 1.28394ZM17.25 15.9089C17.25 16.257 17.1117 16.5909 16.8656 16.837C16.6194 17.0832 16.2856 17.2214 15.9375 17.2214H2.0625C1.7144 17.2214 1.38056 17.0832 1.13442 16.837C0.888281 16.5909 0.75 16.257 0.75 15.9089V6.34644C0.75 5.99834 0.888281 5.6645 1.13442 5.41836C1.38056 5.17222 1.7144 5.03394 2.0625 5.03394H15.9375C16.2856 5.03394 16.6194 5.17222 16.8656 5.41836C17.1117 5.6645 17.25 5.99834 17.25 6.34644V15.9089Z" />
                                                    <path
                                                        d="M14.6287 0.591064C14.6287 0.280404 14.3769 0.0285645 14.0662 0.0285645C13.7556 0.0285645 13.5037 0.280404 13.5037 0.591064V2.84106C13.5037 3.15172 13.7556 3.40356 14.0662 3.40356C14.3769 3.40356 14.6287 3.15172 14.6287 2.84106V0.591064Z" />
                                                    <path
                                                        d="M11.2512 0.591064C11.2512 0.280404 10.9994 0.0285645 10.6887 0.0285645C10.3781 0.0285645 10.1262 0.280404 10.1262 0.591064V2.84106C10.1262 3.15172 10.3781 3.40356 10.6887 3.40356C10.9994 3.40356 11.2512 3.15172 11.2512 2.84106V0.591064Z" />
                                                    <path
                                                        d="M7.87378 0.591064C7.87378 0.280404 7.62194 0.0285645 7.31128 0.0285645C7.00062 0.0285645 6.74878 0.280404 6.74878 0.591064V2.84106C6.74878 3.15172 7.00062 3.40356 7.31128 3.40356C7.62194 3.40356 7.87378 3.15172 7.87378 2.84106V0.591064Z" />
                                                    <path
                                                        d="M4.49628 0.591064C4.49628 0.280404 4.24444 0.0285645 3.93378 0.0285645C3.62312 0.0285645 3.37128 0.280404 3.37128 0.591064V2.84106C3.37128 3.15172 3.62312 3.40356 3.93378 3.40356C4.24444 3.40356 4.49628 3.15172 4.49628 2.84106V0.591064Z" />
                                                    <path
                                                        d="M5.57379 12.859C5.57379 11.841 6.19393 11.266 6.94745 10.9237C6.31772 10.5738 5.93327 9.97518 5.93327 9.23362C5.93327 7.84346 7.14253 6.93768 9.03335 6.93768C10.665 6.93768 12.0754 7.71146 12.0754 9.2562C12.0754 10.0578 11.5991 10.5852 11.0117 10.8392C11.8151 11.133 12.4262 11.8054 12.4262 12.8442C12.4262 14.553 10.7024 15.3177 8.95704 15.3177C7.14785 15.3177 5.57379 14.5132 5.57379 12.859ZM10.4611 12.8062C10.4611 12.1583 10.0752 11.6429 8.99162 11.6429C7.89793 11.6429 7.50868 12.1281 7.50868 12.7625C7.50868 13.578 8.28429 13.9316 8.9993 13.9316C9.72377 13.9316 10.4611 13.636 10.4611 12.8062ZM7.83377 9.24273C7.83377 9.7755 8.13992 10.2237 9.04127 10.2237C9.88592 10.2237 10.171 9.82871 10.171 9.25623C10.171 8.62605 9.6497 8.29207 8.99612 8.29207C8.39034 8.29203 7.83377 8.57565 7.83377 9.24273Z" />
                                                </g>
                                            </svg>
                                            <div class="custom-select-dropdown">
                                                <input type="text" name="inOut" readonly value="Sep 12 - Sep 20">
                                                <div class="selected-date"></div>
                                            </div>
                                        </div>
                                        <button type="submit" class="primary-btn1">
                                            <span>
                                                <svg width="18" height="18" viewBox="0 0 18 18"
                                                    xmlns="http://www.w3.org/2000/svg">
                                                    <g>
                                                        <path
                                                            d="M17.7799 16.746L14.6861 13.7226L14.6137 13.6126C14.4774 13.4781 14.2936 13.4028 14.1022 13.4028C13.9107 13.4028 13.7269 13.4781 13.5906 13.6126C10.9613 16.0246 6.91095 16.1554 4.12376 13.9188C1.33658 11.6821 0.680209 7.7696 2.58814 4.77921C4.49607 1.78882 8.37732 0.64519 11.6585 2.10734C14.9396 3.56949 16.5993 7.18566 15.539 10.555C15.5016 10.675 15.4972 10.8029 15.5262 10.9251C15.5552 11.0474 15.6166 11.1597 15.7039 11.2501C15.7921 11.3421 15.9027 11.4097 16.0248 11.4463C16.1469 11.4829 16.2764 11.4872 16.4007 11.4589C16.5243 11.4317 16.6387 11.3725 16.7323 11.2872C16.8258 11.202 16.8954 11.0936 16.934 10.973C18.1996 6.97472 16.2878 2.6716 12.434 0.848041C8.58017 -0.975514 3.94271 0.225775 1.52009 3.67706C-0.902526 7.12835 -0.382565 11.7918 2.74388 14.6518C5.87033 17.5118 10.6646 17.7083 14.0273 15.1173L16.7667 17.7955C16.9042 17.9276 17.0875 18.0014 17.2782 18.0014C17.4689 18.0014 17.6522 17.9276 17.7897 17.7955C17.8568 17.7298 17.9101 17.6513 17.9465 17.5648C17.9829 17.4782 18.0016 17.3852 18.0016 17.2913C18.0016 17.1974 17.9829 17.1045 17.9465 17.0179C17.9101 16.9313 17.8568 16.8529 17.7897 16.7872L17.7799 16.746Z" />
                                                    </g>
                                                </svg>
                                                <?php echo esc_html__('SEARCH', 'gofly-core') ?>
                                            </span>
                                            <span>
                                                <svg width="18" height="18" viewBox="0 0 18 18"
                                                    xmlns="http://www.w3.org/2000/svg">
                                                    <g>
                                                        <path
                                                            d="M17.7799 16.746L14.6861 13.7226L14.6137 13.6126C14.4774 13.4781 14.2936 13.4028 14.1022 13.4028C13.9107 13.4028 13.7269 13.4781 13.5906 13.6126C10.9613 16.0246 6.91095 16.1554 4.12376 13.9188C1.33658 11.6821 0.680209 7.7696 2.58814 4.77921C4.49607 1.78882 8.37732 0.64519 11.6585 2.10734C14.9396 3.56949 16.5993 7.18566 15.539 10.555C15.5016 10.675 15.4972 10.8029 15.5262 10.9251C15.5552 11.0474 15.6166 11.1597 15.7039 11.2501C15.7921 11.3421 15.9027 11.4097 16.0248 11.4463C16.1469 11.4829 16.2764 11.4872 16.4007 11.4589C16.5243 11.4317 16.6387 11.3725 16.7323 11.2872C16.8258 11.202 16.8954 11.0936 16.934 10.973C18.1996 6.97472 16.2878 2.6716 12.434 0.848041C8.58017 -0.975514 3.94271 0.225775 1.52009 3.67706C-0.902526 7.12835 -0.382565 11.7918 2.74388 14.6518C5.87033 17.5118 10.6646 17.7083 14.0273 15.1173L16.7667 17.7955C16.9042 17.9276 17.0875 18.0014 17.2782 18.0014C17.4689 18.0014 17.6522 17.9276 17.7897 17.7955C17.8568 17.7298 17.9101 17.6513 17.9465 17.5648C17.9829 17.4782 18.0016 17.3852 18.0016 17.2913C18.0016 17.1974 17.9829 17.1045 17.9465 17.0179C17.9101 16.9313 17.8568 16.8529 17.7897 16.7872L17.7799 16.746Z" />
                                                    </g>
                                                </svg>
                                                <?php echo esc_html__('SEARCH', 'gofly-core') ?>
                                            </span>
                                        </button>
                                    </form>
                                    <div class="travel-rating">
                                        <?php if (class_exists('Review_Main')) { ?>
                                            <svg width="14" height="14" viewBox="0 0 14 14" xmlns="http://www.w3.org/2000/svg">
                                                <g>
                                                    <path
                                                        d="M13.9634 5.0964C13.9185 4.9579 13.8339 4.83564 13.7202 4.7448C13.6064 4.65395 13.4685 4.59852 13.3235 4.58539L9.28207 4.21848L7.6849 0.479161C7.56696 0.204433 7.29866 0.0271606 7.00001 0.0271606C6.70135 0.0271606 6.43294 0.204433 6.31577 0.479161L4.7186 4.21848L0.676572 4.58539C0.380242 4.61273 0.129331 4.81344 0.0366345 5.0964C-0.00853441 5.23501 -0.0120479 5.38383 0.0265292 5.52443C0.0651063 5.66502 0.144079 5.79121 0.253666 5.88736L3.30865 8.56611L2.4079 12.5334C2.342 12.8251 2.4552 13.1268 2.69726 13.3017C2.82403 13.394 2.97681 13.4436 3.13359 13.4435C3.26798 13.4435 3.39985 13.407 3.51512 13.3379L7.00001 11.2542L10.4843 13.3379C10.6093 13.4127 10.7534 13.4491 10.899 13.4427C11.0445 13.4363 11.1849 13.3872 11.3028 13.3017C11.5448 13.1268 11.658 12.8251 11.5921 12.5334L10.6914 8.56613L13.7463 5.88738C13.8559 5.79124 13.9349 5.66505 13.9735 5.52446C14.0121 5.38386 14.0086 5.23504 13.9634 5.09643V5.0964Z" />
                                                </g>
                                            </svg>
                                            <?php echo do_shortcode('[get_average_rating type="tour"]') ?>
                                        <?php }; ?>
                                        <p><?php echo wp_kses_post($settings['gofly_filter_searchbox_str_desc']) ?></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        <?php endif; ?>

<?php

    }
}

Plugin::instance()->widgets_manager->register(new Gofly_Hero_Banner_Widget());
