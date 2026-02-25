<?php

namespace Elementor;

if (!defined('ABSPATH')) exit;  // Exit if accessed directly

use Elementor\core\Schemes;
use Egns_Core\Egns_Helper;

class Gofly_Hero_Banner_Slider_Widget extends Widget_Base
{

    public function get_name()
    {
        return 'gofly_hero_banner_slider';
    }

    public function get_title()
    {
        return esc_html__('EG Hero Banner Slider', 'gofly-core');
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
            'gofly_hero_banner_slider_genaral',
            [
                'label' => esc_html__('General', 'gofly-core')
            ]
        );

        $this->add_control(
            'gofly_hero_banner_slider_genaral_style_selection',
            [
                'label'   => esc_html__('Select Style', 'gofly-core'),
                'type'    => Controls_Manager::SELECT,
                'options' => [
                    'style_one'   => esc_html__('Style One', 'gofly-core'),
                    'style_two'   => esc_html__('Style Two', 'gofly-core'),
                    'style_three' => esc_html__('Style Three', 'gofly-core'),
                    'style_four'  => esc_html__('Style Four', 'gofly-core'),
                    'style_five'  => esc_html__('Style Five', 'gofly-core'),
                ],
                'default' => 'style_one',
            ]
        );

        $this->add_control(
            'gofly_hero_banner_slider_genaral_show_pagination',
            [
                'label'        => esc_html__("Show Pagination?", 'gofly-core'),
                'type'         => \Elementor\Controls_Manager::SWITCHER,
                'label_on'     => esc_html__('Enable', 'gofly-core'),
                'label_off'    => esc_html__('Disable', 'gofly-core'),
                'return_value' => 'yes',
                'default'      => 'yes',
            ]
        );

        $repeater = new \Elementor\Repeater();

        $repeater->add_control(
            'gofly_hero_banner_slider_genaral_title',
            [
                'label'       => esc_html__('Title', 'gofly-core'),
                'type'        => \Elementor\Controls_Manager::TEXT,
                'default'     => esc_html__('All-in-one Travel Booking.', 'gofly-core'),
                'placeholder' => esc_html__('write your title here', 'gofly-core'),
                'label_block' => true,
            ]
        );

        $repeater->add_control(
            'gofly_hero_banner_slider_genaral_description',
            [
                'label'       => esc_html__('Description', 'gofly-core'),
                'type'        => \Elementor\Controls_Manager::WYSIWYG,
                'default'     => wp_kses('Highlights convenience and simplicity, Best for agencies with online & mobile-friendly services.', wp_kses_allowed_html('post')),
                'placeholder' => esc_html__('write your title here', 'gofly-core'),
                'label_block' => true,
            ]
        );

        $repeater->add_control(
            'gofly_hero_banner_slider_genaral_background_contant',
            [
                'label'     => esc_html__('Background Content', 'gofly-core'),
                'type'      => \Elementor\Controls_Manager::HEADING,
                'separator' => 'after',
            ]
        );

        $repeater->add_control(
            'gofly_hero_banner_slider_genaral_background_contant_selection',
            [
                'label'   => esc_html__('Select Type', 'gofly-core'),
                'type'    => Controls_Manager::SELECT,
                'options' => [
                    'upload_video' => esc_html__('Upload Video', 'gofly-core'),
                    'image'        => esc_html__('Image', 'gofly-core'),
                ],
                'default' => 'upload_video',
            ]
        );

        $repeater->add_control(
            'gofly_hero_banner_slider_genaral_background_contant_upload_video',
            [
                'label'       => esc_html__('Choose Video File', 'gofly-core'),
                'type'        => \Elementor\Controls_Manager::MEDIA,
                'media_types' => ['video'],
                'default'     => [
                    'url' => \Elementor\Utils::get_placeholder_image_src(),
                ],
                'condition' => [
                    'gofly_hero_banner_slider_genaral_background_contant_selection' => ['upload_video'],
                ]
            ]
        );

        $repeater->add_control(
            'gofly_hero_banner_slider_genaral_background_contant_image',
            [
                'label'   => esc_html__('Background Image', 'gofly-core'),
                'type'    => \Elementor\Controls_Manager::MEDIA,
                'default' => [
                    'url' => \Elementor\Utils::get_placeholder_image_src(),
                ],
                'media_types' => ['image'],
                'condition'   => [
                    'gofly_hero_banner_slider_genaral_background_contant_selection' => ['image'],
                ]
            ]
        );

        $this->add_control(
            'gofly_hero_banner_slider_genaral_content_list',
            [
                'label'   => esc_html__('Content List', 'gofly-core'),
                'type'    => \Elementor\Controls_Manager::REPEATER,
                'fields'  => $repeater->get_controls(),
                'default' => [
                    [
                        'gofly_hero_banner_slider_genaral_title'                        => esc_html('All-in-one Travel Booking.'),
                        'gofly_hero_banner_slider_genaral_background_contant_selection' => esc_html('upload_video'),
                        'gofly_hero_banner_slider_genaral_description'                  => esc_html('Highlights convenience and simplicity, Best for agencies with online & mobile-friendly services.'),
                    ],
                    [
                        'gofly_hero_banner_slider_genaral_title'                        => esc_html('Plan Your Trip, Your Way.'),
                        'gofly_hero_banner_slider_genaral_background_contant_selection' => esc_html('image'),
                        'gofly_hero_banner_slider_genaral_description'                  => esc_html('Perfect for customized travel experiences — tailored flights, stays, and tours just for you.'),

                    ],
                    [
                        'gofly_hero_banner_slider_genaral_title'                        => esc_html('Your Gateway To The World.'),
                        'gofly_hero_banner_slider_genaral_background_contant_selection' => esc_html('image'),
                        'gofly_hero_banner_slider_genaral_description'                  => esc_html('Ideal for explorers seeking seamless booking and expert travel support every step of the way.'),
                    ],
                ],
                'title_field' => '{{{ gofly_hero_banner_slider_genaral_title }}}',
                'condition'   => [
                    'gofly_hero_banner_slider_genaral_style_selection' => ['style_one'],
                ]
            ]
        );

        //========= style two slider repeater =========//

        $repeater = new \Elementor\Repeater();

        $repeater->add_control(
            'gofly_hero_banner_style_two_slider_genaral_award_rating_area',
            [
                'label'     => esc_html__('Award Rating', 'gofly-core'),
                'type'      => \Elementor\Controls_Manager::HEADING,
                'separator' => 'after',
            ]
        );

        $repeater->add_control(
            'gofly_hero_banner_style_two_slider_genaral_award_rating_icon_image',
            [
                'label'   => esc_html__('Icon Image', 'gofly-core'),
                'type'    => \Elementor\Controls_Manager::MEDIA,
                'default' => [
                    'url' => \Elementor\Utils::get_placeholder_image_src(),
                ],
                'media_types' => ['image', 'svg'],
            ]
        );

        $repeater->add_control(
            'gofly_hero_banner_style_two_slider_genaral_award_rating_area_title',
            [
                'label'       => esc_html__('Title', 'gofly-core'),
                'type'        => \Elementor\Controls_Manager::TEXT,
                'default'     => esc_html__('The World Travel Award', 'gofly-core'),
                'placeholder' => esc_html__('write your title here', 'gofly-core'),
                'label_block' => true,
            ]
        );

        $repeater->add_control(
            'gofly_hero_banner_style_two_slider_genaral_award_rating_area_rating',
            [
                'label'   => esc_html__('Rating', 'gofly-core'),
                'type'    => Controls_Manager::NUMBER,
                'min'     => 0,
                'max'     => 5,
                'step'    => 1,
                'default' => 5,
                'dynamic' => [
                    'active' => true,
                ],
            ]
        );

        $repeater->add_control(
            'gofly_hero_banner_style_two_slider_genaral_content_area',
            [
                'label'     => esc_html__('Content', 'gofly-core'),
                'type'      => \Elementor\Controls_Manager::HEADING,
                'separator' => 'after',
            ]
        );

        $repeater->add_control(
            'gofly_hero_banner_style_two_slider_genaral_title',
            [
                'label'       => esc_html__('Title', 'gofly-core'),
                'type'        => \Elementor\Controls_Manager::TEXT,
                'default'     => esc_html__('All-in-one Travel Booking.', 'gofly-core'),
                'placeholder' => esc_html__('write your title here', 'gofly-core'),
                'label_block' => true,
            ]
        );

        $repeater->add_control(
            'gofly_hero_banner_style_two_slider_genaral_description',
            [
                'label'       => esc_html__('Description', 'gofly-core'),
                'type'        => \Elementor\Controls_Manager::WYSIWYG,
                'default'     => wp_kses('Highlights convenience and simplicity, Best for agencies with online & mobile-friendly services.', wp_kses_allowed_html('post')),
                'placeholder' => esc_html__('write your title here', 'gofly-core'),
                'label_block' => true,
            ]
        );

        $repeater->add_control(
            'gofly_hero_banner_style_two_slider_genaral_background_contant',
            [
                'label'     => esc_html__('Background Content', 'gofly-core'),
                'type'      => \Elementor\Controls_Manager::HEADING,
                'separator' => 'after',
            ]
        );

        $repeater->add_control(
            'gofly_hero_banner_style_two_slider_genaral_background_contant_selection',
            [
                'label'   => esc_html__('Select Type', 'gofly-core'),
                'type'    => Controls_Manager::SELECT,
                'options' => [
                    'upload_video' => esc_html__('Upload Video', 'gofly-core'),
                    'image'        => esc_html__('Image', 'gofly-core'),
                ],
                'default' => 'upload_video',
            ]
        );

        $repeater->add_control(
            'gofly_hero_banner_style_two_slider_genaral_background_contant_upload_video',
            [
                'label'       => esc_html__('Choose Video File', 'gofly-core'),
                'type'        => \Elementor\Controls_Manager::MEDIA,
                'media_types' => ['video'],
                'default'     => [
                    'url' => \Elementor\Utils::get_placeholder_image_src(),
                ],
                'condition' => [
                    'gofly_hero_banner_style_two_slider_genaral_background_contant_selection' => ['upload_video'],
                ]
            ]
        );

        $repeater->add_control(
            'gofly_hero_banner_style_two_slider_genaral_background_contant_image',
            [
                'label'   => esc_html__('Background Image', 'gofly-core'),
                'type'    => \Elementor\Controls_Manager::MEDIA,
                'default' => [
                    'url' => \Elementor\Utils::get_placeholder_image_src(),
                ],
                'media_types' => ['image'],
                'condition'   => [
                    'gofly_hero_banner_style_two_slider_genaral_background_contant_selection' => ['image'],
                ]
            ]
        );

        $this->add_control(
            'gofly_hero_banner_style_two_slider_genaral_content_list',
            [
                'label'   => esc_html__('Content List', 'gofly-core'),
                'type'    => \Elementor\Controls_Manager::REPEATER,
                'fields'  => $repeater->get_controls(),
                'default' => [
                    [
                        'gofly_hero_banner_style_two_slider_genaral_title'                        => esc_html('All-in-one Travel Booking.'),
                        'gofly_hero_banner_style_two_slider_genaral_background_contant_selection' => esc_html('upload_video'),
                        'gofly_hero_banner_style_two_slider_genaral_description'                  => esc_html('Highlights convenience and simplicity, Best for agencies with online & mobile-friendly services.'),
                    ],
                    [
                        'gofly_hero_banner_style_two_slider_genaral_title'                        => esc_html('Plan Your Trip, Your Way.'),
                        'gofly_hero_banner_style_two_slider_genaral_background_contant_selection' => esc_html('image'),
                        'gofly_hero_banner_style_two_slider_genaral_description'                  => esc_html('Perfect for customized travel experiences — tailored flights, stays, and tours just for you.'),

                    ],
                    [
                        'gofly_hero_banner_style_two_slider_genaral_title'                        => esc_html('Your Gateway To The World.'),
                        'gofly_hero_banner_style_two_slider_genaral_background_contant_selection' => esc_html('image'),
                        'gofly_hero_banner_style_two_slider_genaral_description'                  => esc_html('Ideal for explorers seeking seamless booking and expert travel support every step of the way.'),
                    ],


                ],
                'title_field' => '{{{ gofly_hero_banner_style_two_slider_genaral_title }}}',
                'condition'   => [
                    'gofly_hero_banner_slider_genaral_style_selection' => ['style_two'],
                ]
            ]
        );

        //========= style three slider repeater =========//

        $repeater = new \Elementor\Repeater();

        $repeater->add_control(
            'gofly_hero_banner_style_three_slider_genaral_title',
            [
                'label'       => esc_html__('Title', 'gofly-core'),
                'type'        => \Elementor\Controls_Manager::TEXT,
                'default'     => esc_html__('Iceland', 'gofly-core'),
                'placeholder' => esc_html__('write your title here', 'gofly-core'),
                'label_block' => true,
            ]
        );

        $repeater->add_control(
            'gofly_hero_banner_style_three_slider_genaral_description',
            [
                'label'       => esc_html__('Description', 'gofly-core'),
                'type'        => \Elementor\Controls_Manager::WYSIWYG,
                'default'     => wp_kses('Highlights convenience and simplicity, Best for agencies with online & mobile-friendly services.', wp_kses_allowed_html('post')),
                'placeholder' => esc_html__('write your title here', 'gofly-core'),
                'label_block' => true,
            ]
        );

        $repeater->add_control(
            'gofly_hero_banner_style_three_slider_genaral_button',
            [
                'label'       => esc_html__('Button Text', 'gofly-core'),
                'type'        => \Elementor\Controls_Manager::TEXT,
                'default'     => esc_html__('View All Package', 'gofly-core'),
                'placeholder' => esc_html__('write your button text here', 'gofly-core'),
                'label_block' => true,
            ]
        );

        $repeater->add_control(
            'gofly_hero_banner_style_three_slider_genaral_button_url',
            [
                'label'   => esc_html__('Button URL/Link', 'gofly-core'),
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


        $repeater->add_control(
            'gofly_hero_banner_style_three_slider_genaral_background_contant',
            [
                'label'     => esc_html__('Background Content', 'gofly-core'),
                'type'      => \Elementor\Controls_Manager::HEADING,
                'separator' => 'after',
            ]
        );

        $repeater->add_control(
            'gofly_hero_banner_style_three_slider_genaral_background_contant_selection',
            [
                'label'   => esc_html__('Select Type', 'gofly-core'),
                'type'    => Controls_Manager::SELECT,
                'options' => [
                    'upload_video' => esc_html__('Upload Video', 'gofly-core'),
                    'image'        => esc_html__('Image', 'gofly-core'),
                ],
                'default' => 'upload_video',
            ]
        );

        $repeater->add_control(
            'gofly_hero_banner_style_three_slider_genaral_background_contant_upload_video',
            [
                'label'       => esc_html__('Choose Video File', 'gofly-core'),
                'type'        => \Elementor\Controls_Manager::MEDIA,
                'media_types' => ['video'],
                'default'     => [
                    'url' => \Elementor\Utils::get_placeholder_image_src(),
                ],
                'condition' => [
                    'gofly_hero_banner_style_three_slider_genaral_background_contant_selection' => ['upload_video'],
                ]
            ]
        );

        $repeater->add_control(
            'gofly_hero_banner_style_three_slider_genaral_background_contant_image',
            [
                'label'   => esc_html__('Background Image', 'gofly-core'),
                'type'    => \Elementor\Controls_Manager::MEDIA,
                'default' => [
                    'url' => \Elementor\Utils::get_placeholder_image_src(),
                ],
                'media_types' => ['image'],
                'condition'   => [
                    'gofly_hero_banner_style_three_slider_genaral_background_contant_selection' => ['image'],
                ]
            ]
        );

        $this->add_control(
            'gofly_hero_banner_style_three_slider_genaral_content_list',
            [
                'label'   => esc_html__('Content List', 'gofly-core'),
                'type'    => \Elementor\Controls_Manager::REPEATER,
                'fields'  => $repeater->get_controls(),
                'default' => [
                    [
                        'gofly_hero_banner_style_three_slider_genaral_title'                        => esc_html('Iceland'),
                        'gofly_hero_banner_style_three_slider_genaral_background_contant_selection' => esc_html('image'),
                        'gofly_hero_banner_style_three_slider_genaral_description'                  => esc_html('A world-famous geothermal spa with milky blue waters rich in minerals.'),
                    ],
                    [
                        'gofly_hero_banner_style_three_slider_genaral_title'                        => esc_html('Norway'),
                        'gofly_hero_banner_style_three_slider_genaral_background_contant_selection' => esc_html('image'),
                        'gofly_hero_banner_style_three_slider_genaral_description'                  => esc_html('A well-known volcanic spa with mineral-rich, milky blue waters.'),

                    ],
                    [
                        'gofly_hero_banner_style_three_slider_genaral_title'                        => esc_html('Switzerland'),
                        'gofly_hero_banner_style_three_slider_genaral_background_contant_selection' => esc_html('upload_video'),
                        'gofly_hero_banner_style_three_slider_genaral_description'                  => esc_html('An internationally renowned geothermal spa with mineral-rich, milky blue waters.'),
                    ],


                ],
                'title_field' => '{{{ gofly_hero_banner_style_three_slider_genaral_title }}}',
                'condition'   => [
                    'gofly_hero_banner_slider_genaral_style_selection' => ['style_three'],
                ]
            ]
        );

        //========= style Four slider repeater =========//

        $repeater = new \Elementor\Repeater();

        $repeater->add_control(
            'gofly_hero_banner_style_four_slider_genaral_title',
            [
                'label'       => esc_html__('Title', 'gofly-core'),
                'type'        => \Elementor\Controls_Manager::TEXT,
                'default'     => wp_kses('The Ultimate Guide to Travel Experinecs', wp_kses_allowed_html('post')),
                'placeholder' => esc_html__('write your title here', 'gofly-core'),
                'label_block' => true,
            ]
        );

        $repeater->add_control(
            'gofly_hero_banner_style_four_slider_genaral_button',
            [
                'label'       => esc_html__('Button Text', 'gofly-core'),
                'type'        => \Elementor\Controls_Manager::TEXT,
                'default'     => esc_html__('View All Tour', 'gofly-core'),
                'placeholder' => esc_html__('write your button text here', 'gofly-core'),
                'label_block' => true,
            ]
        );

        $repeater->add_control(
            'gofly_hero_banner_style_four_slider_genaral_button_url',
            [
                'label'   => esc_html__('Button URL/Link', 'gofly-core'),
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


        $repeater->add_control(
            'gofly_hero_banner_style_four_slider_genaral_background_contant',
            [
                'label'     => esc_html__('Background Content', 'gofly-core'),
                'type'      => \Elementor\Controls_Manager::HEADING,
                'separator' => 'after',
            ]
        );

        $repeater->add_control(
            'gofly_hero_banner_style_four_slider_genaral_background_contant_selection',
            [
                'label'   => esc_html__('Select Type', 'gofly-core'),
                'type'    => Controls_Manager::SELECT,
                'options' => [
                    'upload_video' => esc_html__('Upload Video', 'gofly-core'),
                    'image'        => esc_html__('Image', 'gofly-core'),
                ],
                'default' => 'upload_video',
            ]
        );

        $repeater->add_control(
            'gofly_hero_banner_style_four_slider_genaral_background_contant_upload_video',
            [
                'label'       => esc_html__('Choose Video File', 'gofly-core'),
                'type'        => \Elementor\Controls_Manager::MEDIA,
                'media_types' => ['video'],
                'default'     => [
                    'url' => \Elementor\Utils::get_placeholder_image_src(),
                ],
                'condition' => [
                    'gofly_hero_banner_style_four_slider_genaral_background_contant_selection' => ['upload_video'],
                ]
            ]
        );

        $repeater->add_control(
            'gofly_hero_banner_style_four_slider_genaral_background_contant_image',
            [
                'label'   => esc_html__('Background Image', 'gofly-core'),
                'type'    => \Elementor\Controls_Manager::MEDIA,
                'default' => [
                    'url' => \Elementor\Utils::get_placeholder_image_src(),
                ],
                'media_types' => ['image'],
                'condition'   => [
                    'gofly_hero_banner_style_four_slider_genaral_background_contant_selection' => ['image'],
                ]
            ]
        );

        $this->add_control(
            'gofly_hero_banner_style_four_slider_genaral_content_list',
            [
                'label'   => esc_html__('Content List', 'gofly-core'),
                'type'    => \Elementor\Controls_Manager::REPEATER,
                'fields'  => $repeater->get_controls(),
                'default' => [
                    [
                        'gofly_hero_banner_style_four_slider_genaral_title'                        => wp_kses("Adventure Awaits Let's Go!", wp_kses_allowed_html('post')),
                        'gofly_hero_banner_style_four_slider_genaral_background_contant_selection' => esc_html('image'),
                    ],
                    [
                        'gofly_hero_banner_style_four_slider_genaral_title'                        => wp_kses('The Ultimate Guide to Travel Experinecs', wp_kses_allowed_html('post')),
                        'gofly_hero_banner_style_four_slider_genaral_background_contant_selection' => esc_html('image'),
                    ],
                    [
                        'gofly_hero_banner_style_four_slider_genaral_title'                        => wp_kses('The Ultimate Guide to Travel Experinecs', wp_kses_allowed_html('post')),
                        'gofly_hero_banner_style_four_slider_genaral_background_contant_selection' => esc_html('upload_video'),
                    ],
                ],
                'title_field' => '{{{ gofly_hero_banner_style_four_slider_genaral_title }}}',
                'condition'   => [
                    'gofly_hero_banner_slider_genaral_style_selection' => ['style_four'],
                ]
            ]
        );


        //========= style five slider repeater =========//

        $repeater = new \Elementor\Repeater();

        $repeater->add_control(
            'gofly_hero_banner_style_five_slider_genaral_subtitle',
            [
                'label'       => esc_html__('Subtitle', 'gofly-core'),
                'type'        => \Elementor\Controls_Manager::TEXT,
                'default'     => wp_kses('Adventure Awaits', wp_kses_allowed_html('post')),
                'placeholder' => esc_html__('write your subtitle here', 'gofly-core'),
                'label_block' => true,
            ]
        );

        $repeater->add_control(
            'gofly_hero_banner_style_five_slider_genaral_title',
            [
                'label'       => esc_html__('Title', 'gofly-core'),
                'type'        => \Elementor\Controls_Manager::TEXT,
                'default'     => wp_kses('Discover. Explore. Experience', wp_kses_allowed_html('post')),
                'placeholder' => esc_html__('write your title here', 'gofly-core'),
                'label_block' => true,
            ]
        );

        $repeater->add_control(
            'gofly_hero_banner_style_five_slider_genaral_button',
            [
                'label'       => esc_html__('Button Text', 'gofly-core'),
                'type'        => \Elementor\Controls_Manager::TEXT,
                'default'     => esc_html__('View All Activities', 'gofly-core'),
                'placeholder' => esc_html__('write your button text here', 'gofly-core'),
                'label_block' => true,
            ]
        );

        $repeater->add_control(
            'gofly_hero_banner_style_five_slider_genaral_button_url',
            [
                'label'   => esc_html__('Button URL/Link', 'gofly-core'),
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


        $repeater->add_control(
            'gofly_hero_banner_style_five_slider_genaral_background_contant',
            [
                'label'     => esc_html__('Background Content', 'gofly-core'),
                'type'      => \Elementor\Controls_Manager::HEADING,
                'separator' => 'after',
            ]
        );

        $repeater->add_control(
            'gofly_hero_banner_style_five_slider_genaral_background_contant_selection',
            [
                'label'   => esc_html__('Select Type', 'gofly-core'),
                'type'    => Controls_Manager::SELECT,
                'options' => [
                    'upload_video' => esc_html__('Upload Video', 'gofly-core'),
                    'image'        => esc_html__('Image', 'gofly-core'),
                ],
                'default' => 'upload_video',
            ]
        );

        $repeater->add_control(
            'gofly_hero_banner_style_five_slider_genaral_background_contant_upload_video',
            [
                'label'       => esc_html__('Choose Video File', 'gofly-core'),
                'type'        => \Elementor\Controls_Manager::MEDIA,
                'media_types' => ['video'],
                'default'     => [
                    'url' => \Elementor\Utils::get_placeholder_image_src(),
                ],
                'condition' => [
                    'gofly_hero_banner_style_five_slider_genaral_background_contant_selection' => ['upload_video'],
                ]
            ]
        );

        $repeater->add_control(
            'gofly_hero_banner_style_five_slider_genaral_background_contant_image',
            [
                'label'   => esc_html__('Background Image', 'gofly-core'),
                'type'    => \Elementor\Controls_Manager::MEDIA,
                'default' => [
                    'url' => \Elementor\Utils::get_placeholder_image_src(),
                ],
                'media_types' => ['image'],
                'condition'   => [
                    'gofly_hero_banner_style_five_slider_genaral_background_contant_selection' => ['image'],
                ]
            ]
        );

        $this->add_control(
            'gofly_hero_banner_style_five_slider_genaral_content_list',
            [
                'label'   => esc_html__('Content List', 'gofly-core'),
                'type'    => \Elementor\Controls_Manager::REPEATER,
                'fields'  => $repeater->get_controls(),
                'default' => [
                    [
                        'gofly_hero_banner_style_five_slider_genaral_title'                        => wp_kses("Adventure Awaits Let's Go!", wp_kses_allowed_html('post')),
                        'gofly_hero_banner_style_five_slider_genaral_background_contant_selection' => esc_html('image'),
                    ],
                    [
                        'gofly_hero_banner_style_five_slider_genaral_title'                        => wp_kses('The Ultimate Guide to Travel Experinecs', wp_kses_allowed_html('post')),
                        'gofly_hero_banner_style_five_slider_genaral_background_contant_selection' => esc_html('image'),
                    ],
                    [
                        'gofly_hero_banner_style_five_slider_genaral_title'                        => wp_kses('The Ultimate Guide to Travel Experinecs', wp_kses_allowed_html('post')),
                        'gofly_hero_banner_style_five_slider_genaral_background_contant_selection' => esc_html('upload_video'),
                    ],
                ],
                'title_field' => '{{{ gofly_hero_banner_style_five_slider_genaral_title }}}',
                'condition'   => [
                    'gofly_hero_banner_slider_genaral_style_selection' => ['style_five'],
                ]
            ]
        );

        //==========style four social==========//

        $this->add_control(
            'gofly_hero_banner_style_four_slider_genaral_social_area',
            [
                'label'     => esc_html__('Social Area', 'gofly-core'),
                'type'      => \Elementor\Controls_Manager::HEADING,
                'separator' => 'after',
                'condition' => [
                    'gofly_hero_banner_slider_genaral_style_selection' => ['style_four'],
                ]
            ]
        );

        $repeater = new \Elementor\Repeater();

        $repeater->add_control(
            'gofly_hero_banner_style_four_slider_genaral_social_icon',
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
            'gofly_hero_banner_style_four_slider_genaral_social_icon_url',
            [
                'label'       => esc_html__('Social Link/URL', 'gofly-core'),
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
            'gofly_hero_banner_style_four_slider_genaral_social_icon_list',
            [
                'label'   => esc_html__('Icon List', 'gofly-core'),
                'type'    => \Elementor\Controls_Manager::REPEATER,
                'fields'  => $repeater->get_controls(),
                'default' => [
                    [
                        'gofly_hero_banner_style_four_slider_genaral_social_icon' => [
                            'value'   => 'bx bxl-facebook',
                            'library' => 'boxicons',
                        ],
                    ],
                    [
                        'gofly_hero_banner_style_four_slider_genaral_social_icon' => [
                            'value'   => 'bx bxl-linkedin',
                            'library' => 'boxicons',
                        ],
                    ],
                    [
                        'gofly_hero_banner_style_four_slider_genaral_social_icon' => [
                            'value'   => 'bx bxl-youtube',
                            'library' => 'boxicons',
                        ],
                    ],
                ],
                'condition' => [
                    'gofly_hero_banner_slider_genaral_style_selection' => ['style_four'],
                ]
            ]
        );

        $this->end_controls_section();


        //=====================Style One Start=======================//

        $this->start_controls_section(
            'gofly_hero_banner_slider_one_style_genaral',
            [
                'label'     => esc_html__('Styles', 'gofly-core'),
                'tab'       => Controls_Manager::TAB_STYLE,
                'condition' => [
                    'gofly_hero_banner_slider_genaral_style_selection' => ['style_one'],
                ]
            ]
        );

        $this->add_control(
            'gofly_hero_banner_slider_style_one_genaral_title',
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
                'name'     => 'gofly_hero_banner_slider_style_one_genaral_title_typ',
                'selector' => '{{WRAPPER}} .home2-banner-section .banner-wrapper .banner-content-wrap .banner-content h1',

            ]
        );

        $this->add_control(
            'gofly_hero_banner_slider_style_one_genaral_title_color',
            [
                'label'     => esc_html__('Color', 'gofly-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .home2-banner-section .banner-wrapper .banner-content-wrap .banner-content h1' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'gofly_hero_banner_slider_style_one_genaral_description',
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
                'name'     => 'gofly_hero_banner_slider_style_one_genaral_description_typ',
                'selector' => '{{WRAPPER}} .home2-banner-section .banner-wrapper .banner-content-wrap .banner-content p',

            ]
        );

        $this->add_control(
            'gofly_hero_banner_slider_style_one_genaral_description_color',
            [
                'label'     => esc_html__('Color', 'gofly-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .home2-banner-section .banner-wrapper .banner-content-wrap .banner-content p' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'gofly_hero_banner_slider_style_one_genaral_pagination',
            [
                'label'     => esc_html__('Pagination', 'gofly-core'),
                'type'      => \Elementor\Controls_Manager::HEADING,
                'separator' => 'after',
            ]
        );

        $this->add_control(
            'gofly_hero_banner_slider_style_one_genaral_pagination_color',
            [
                'label'     => esc_html__('Color', 'gofly-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .home2-banner-section .slider-btn-grp .slider-btn svg' => 'fill: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'gofly_hero_banner_slider_style_one_genaral_pagination_hover_color',
            [
                'label'     => esc_html__('Hover Color', 'gofly-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .slider-btn-grp .slider-btn:hover svg' => 'fill: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'gofly_hero_banner_slider_style_one_genaral_pagination_border_color',
            [
                'label'     => esc_html__('Border Color', 'gofly-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .home2-banner-section .slider-btn-grp .slider-btn' => 'border: 1px solid {{VALUE}};',
                ],
            ]
        );


        $this->add_control(
            'gofly_hero_banner_slider_style_one_genaral_pagination_hover_border_color',
            [
                'label'     => esc_html__('Hover Border Color', 'gofly-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .slider-btn-grp .slider-btn:hover' => 'border-color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'gofly_hero_banner_slider_style_one_genaral_pagination_bg_color',
            [
                'label'     => esc_html__('Background Color', 'gofly-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .home2-banner-section .slider-btn-grp .slider-btn' => 'background-color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'gofly_hero_banner_slider_style_one_genaral_pagination_bg_hover_color',
            [
                'label'     => esc_html__('Hover Background Color', 'gofly-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .home2-banner-section .slider-btn-grp .slider-btn:hover' => 'background-color: {{VALUE}};',
                ],
            ]
        );

        $this->end_controls_section();

        //=====================Style Two Start=======================//

        $this->start_controls_section(
            'gofly_hero_banner_slider_two_style_genaral',
            [
                'label'     => esc_html__('Styles', 'gofly-core'),
                'tab'       => Controls_Manager::TAB_STYLE,
                'condition' => [
                    'gofly_hero_banner_slider_genaral_style_selection' => ['style_two'],
                ]
            ]
        );

        $this->add_control(
            'gofly_hero_banner_slider_two_style_genaral_award_and_rating',
            [
                'label'     => esc_html__('Award And Rating', 'gofly-core'),
                'type'      => \Elementor\Controls_Manager::HEADING,
                'separator' => 'before',
            ]
        );

        $this->add_control(
            'gofly_hero_banner_slider_two_style_genaral_award_and_rating_title',
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
                'name'     => 'gofly_hero_banner_slider_two_style_genaral_award_and_rating_title_typ',
                'selector' => '{{WRAPPER}} .home3-banner-section .banner-wrapper .banner-content-wrap .banner-content .award-rating-area h4',

            ]
        );

        $this->add_control(
            'gofly_hero_banner_slider_two_style_genaral_award_and_rating_title_color',
            [
                'label'     => esc_html__('Color', 'gofly-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .home3-banner-section .banner-wrapper .banner-content-wrap .banner-content .award-rating-area h4' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'gofly_hero_banner_slider_two_style_genaral_award_and_rating_star',
            [
                'label'     => esc_html__('Rating Star', 'gofly-core'),
                'type'      => \Elementor\Controls_Manager::HEADING,
                'separator' => 'after',
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'label'    => esc_html__('Typography', 'gofly-core'),
                'name'     => 'gofly_hero_banner_slider_two_style_genaral_award_and_rating_star_typ',
                'selector' => '{{WRAPPER}} .home3-banner-section .banner-wrapper .banner-content-wrap .banner-content .award-rating-area .rating ul li i',

            ]
        );

        $this->add_control(
            'gofly_hero_banner_slider_two_style_genaral_award_and_rating_star_color',
            [
                'label'     => esc_html__('Color', 'gofly-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .home3-banner-section .banner-wrapper .banner-content-wrap .banner-content .award-rating-area .rating ul li i' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'gofly_hero_banner_slider_two_style_genaral_award_and_rating_star_span_color',
            [
                'label'     => esc_html__('Span Color', 'gofly-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .home3-banner-section .banner-wrapper .banner-content-wrap .banner-content .award-rating-area .rating span' => 'color: {{VALUE}};',
                ],
            ]
        );


        $this->add_control(
            'gofly_hero_banner_slider_two_style_genaral_content',
            [
                'label'     => esc_html__('Content', 'gofly-core'),
                'type'      => \Elementor\Controls_Manager::HEADING,
                'separator' => 'before',
            ]
        );

        $this->add_control(
            'gofly_hero_banner_slider_two_style_genaral_content_title',
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
                'name'     => 'gofly_hero_banner_slider_two_style_genaral_content_title_typ',
                'selector' => '{{WRAPPER}} .home3-banner-section .banner-wrapper .banner-content-wrap .banner-content h1',

            ]
        );

        $this->add_control(
            'gofly_hero_banner_slider_two_style_genaral_content_title_color',
            [
                'label'     => esc_html__('Color', 'gofly-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .home3-banner-section .banner-wrapper .banner-content-wrap .banner-content h1' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'gofly_hero_banner_slider_two_style_genaral_content_description',
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
                'name'     => 'gofly_hero_banner_slider_two_style_genaral_content_description_typ',
                'selector' => '{{WRAPPER}} .home3-banner-section .banner-wrapper .banner-content-wrap .banner-content p',

            ]
        );

        $this->add_control(
            'gofly_hero_banner_slider_two_style_genaral_content_description_color',
            [
                'label'     => esc_html__('Color', 'gofly-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .home3-banner-section .banner-wrapper .banner-content-wrap .banner-content p' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'gofly_hero_banner_slider_two_style_genaral_content_pagination',
            [
                'label'     => esc_html__('Pagination', 'gofly-core'),
                'type'      => \Elementor\Controls_Manager::HEADING,
                'separator' => 'after',
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'label'    => esc_html__('Typography', 'gofly-core'),
                'name'     => 'gofly_hero_banner_slider_two_style_genaral_content_pagination_typ',
                'selector' => '{{WRAPPER}} .home3-banner-section .paginations .swiper-pagination-bullet',

            ]
        );

        $this->add_control(
            'gofly_hero_banner_slider_two_style_genaral_content_pagination_color',
            [
                'label'     => esc_html__('Inactive Color', 'gofly-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .home3-banner-section .paginations .swiper-pagination-bullet' => 'background-color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'gofly_hero_banner_slider_two_style_genaral_content_pagination_active_color',
            [
                'label'     => esc_html__('Active Color', 'gofly-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .home3-banner-section .paginations .swiper-pagination-bullet.swiper-pagination-bullet-active' => 'background-color: {{VALUE}};',
                ],
            ]
        );

        $this->end_controls_section();


        //=====================Style Three Start=======================//

        $this->start_controls_section(
            'gofly_hero_banner_slider_three_style_genaral',
            [
                'label'     => esc_html__('Styles', 'gofly-core'),
                'tab'       => Controls_Manager::TAB_STYLE,
                'condition' => [
                    'gofly_hero_banner_slider_genaral_style_selection' => ['style_three'],
                ]
            ]
        );

        $this->add_control(
            'gofly_hero_banner_slider_three_style_genaral_title',
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
                'name'     => 'gofly_hero_banner_slider_three_style_genaral_title_typ',
                'selector' => '{{WRAPPER}} .home5-banner-section .banner-wrapper .banner-content-wrap .banner-content h1',

            ]
        );

        $this->add_control(
            'gofly_hero_banner_slider_three_style_genaral_title_color',
            [
                'label'     => esc_html__('Color', 'gofly-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .home5-banner-section .banner-wrapper .banner-content-wrap .banner-content h1' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'gofly_hero_banner_slider_three_style_genaral_description',
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
                'name'     => 'gofly_hero_banner_slider_three_style_genaral_description_typ',
                'selector' => '{{WRAPPER}} .home5-banner-section .banner-wrapper .banner-content-wrap .banner-content p',

            ]
        );

        $this->add_control(
            'gofly_hero_banner_slider_three_style_genaral_description_color',
            [
                'label'     => esc_html__('Color', 'gofly-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .home5-banner-section .banner-wrapper .banner-content-wrap .banner-content p' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'gofly_hero_banner_slider_three_style_genaral_button',
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
                'name'     => 'gofly_hero_banner_slider_three_style_genaral_button_typ',
                'selector' => '{{WRAPPER}} .primary-btn1',

            ]
        );

        $this->add_control(
            'gofly_hero_banner_slider_three_style_genaral_button_color',
            [
                'label'     => esc_html__('Color', 'gofly-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .primary-btn1' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'gofly_hero_banner_slider_three_style_genaral_button_hover_color',
            [
                'label'     => esc_html__('Hover Color', 'gofly-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .primary-btn1:hover' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'gofly_hero_banner_slider_three_style_genaral_button_icon_color',
            [
                'label'     => esc_html__('Icon Color', 'gofly-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .primary-btn1 > span svg' => 'fill: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'gofly_hero_banner_slider_three_style_genaral_button_hover_icon_color',
            [
                'label'     => esc_html__('Hover Icon Color', 'gofly-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .primary-btn1:hover > span svg' => 'fill: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'gofly_hero_banner_slider_three_style_genaral_button_bg_color',
            [
                'label'     => esc_html__('Background Color', 'gofly-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .primary-btn1' => 'background-color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'gofly_hero_banner_slider_three_style_genaral_button_hover_bg_color',
            [
                'label'     => esc_html__('Hover Background Color', 'gofly-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .primary-btn1::after' => 'background-color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'gofly_hero_banner_slider_three_style_genaral_pagination',
            [
                'label'     => esc_html__('Pagination', 'gofly-core'),
                'type'      => \Elementor\Controls_Manager::HEADING,
                'separator' => 'after',
            ]
        );

        $this->add_control(
            'gofly_hero_banner_slider_three_style_genaral_pagination_color',
            [
                'label'     => esc_html__('Icon Color', 'gofly-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .home5-banner-section .slider-btn-grp .slider-btn svg' => 'fill: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'gofly_hero_banner_slider_three_style_genaral_pagination_hover_color',
            [
                'label'     => esc_html__('Hover Icon Color', 'gofly-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .home5-banner-section .slider-btn-grp:hover .slider-btn svg' => 'fill: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'gofly_hero_banner_slider_three_style_genaral_pagination_border_color',
            [
                'label'     => esc_html__('Border Color', 'gofly-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .home5-banner-section .slider-btn-grp .slider-btn' => 'border: 1px solid {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'gofly_hero_banner_slider_three_style_genaral_pagination_border_hover_color',
            [
                'label'     => esc_html__('Hover Border Color', 'gofly-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .slider-btn-grp .slider-btn:hover' => 'border-color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'gofly_hero_banner_slider_three_style_genaral_pagination_bg_color',
            [
                'label'     => esc_html__('Background Color', 'gofly-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .home5-banner-section .slider-btn-grp .slider-btn' => 'background-color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'gofly_hero_banner_slider_three_style_genaral_pagination_hover_bg_color',
            [
                'label'     => esc_html__('Hover Background Color', 'gofly-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .home5-banner-section .slider-btn-grp .slider-btn:hover' => 'background-color: {{VALUE}};',
                ],
            ]
        );

        $this->end_controls_section();

        //=====================Style Four Start=======================//

        $this->start_controls_section(
            'gofly_hero_banner_slider_four_style_genaral',
            [
                'label'     => esc_html__('Styles', 'gofly-core'),
                'tab'       => Controls_Manager::TAB_STYLE,
                'condition' => [
                    'gofly_hero_banner_slider_genaral_style_selection' => ['style_four'],
                ]
            ]
        );

        $this->add_control(
            'gofly_hero_banner_slider_four_style_genaral_title',
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
                'name'     => 'gofly_hero_banner_slider_four_style_genaral_title_typ',
                'selector' => '{{WRAPPER}} .home6-banner-section .banner-wrapper .banner-content-wrap .banner-content h2',

            ]
        );

        $this->add_control(
            'gofly_hero_banner_slider_four_style_genaral_title_color',
            [
                'label'     => esc_html__('Color', 'gofly-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .home6-banner-section .banner-wrapper .banner-content-wrap .banner-content h2' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'gofly_hero_banner_slider_four_style_genaral_button',
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
                'name'     => 'gofly_hero_banner_slider_four_style_genaral_button_typ',
                'selector' => '{{WRAPPER}} .primary-btn1',

            ]
        );

        $this->add_control(
            'gofly_hero_banner_slider_four_style_genaral_button_color',
            [
                'label'     => esc_html__('Color', 'gofly-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .primary-btn1' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'gofly_hero_banner_slider_four_style_genaral_button_hover_color',
            [
                'label'     => esc_html__('Hover Color', 'gofly-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .primary-btn1:hover' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'gofly_hero_banner_slider_four_style_genaral_button_icon_color',
            [
                'label'     => esc_html__('Icon Color', 'gofly-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .primary-btn1 > span svg' => 'fill: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'gofly_hero_banner_slider_four_style_genaral_button_icon_hover_color',
            [
                'label'     => esc_html__('Hover Icon Color', 'gofly-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .primary-btn1:hover > span svg' => 'fill: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'gofly_hero_banner_slider_four_style_genaral_button_border_color',
            [
                'label'     => esc_html__('Border Color', 'gofly-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .home6-banner-section .banner-wrapper .banner-content-wrap .banner-content .primary-btn1' => 'border: 1px solid {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'gofly_hero_banner_slider_four_style_genaral_button_border_hover_color',
            [
                'label'     => esc_html__('Hover Border Color', 'gofly-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .home6-banner-section .banner-wrapper .banner-content-wrap .banner-content .primary-btn1:hover' => 'border: 1px solid {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'gofly_hero_banner_slider_four_style_genaral_button_bg_color',
            [
                'label'     => esc_html__('Background Color', 'gofly-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .home6-banner-section .banner-wrapper .banner-content-wrap .banner-content .primary-btn1' => 'background-color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'gofly_hero_banner_slider_four_style_genaral_button_hover_bg_color',
            [
                'label'     => esc_html__('Hover Background Color', 'gofly-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .home6-banner-section .banner-wrapper .banner-content-wrap .banner-content .primary-btn1::after' => 'background-color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'gofly_hero_banner_slider_four_style_genaral_social_icon',
            [
                'label'     => esc_html__('Social Icon', 'gofly-core'),
                'type'      => \Elementor\Controls_Manager::HEADING,
                'separator' => 'after',
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'label'    => esc_html__('Typography', 'gofly-core'),
                'name'     => 'gofly_hero_banner_slider_four_style_genaral_social_icon_typ',
                'selector' => '{{WRAPPER}} .home6-banner-section .social-list li a i',

            ]
        );

        $this->add_control(
            'gofly_hero_banner_slider_four_style_genaral_social_icon_color',
            [
                'label'     => esc_html__('Color', 'gofly-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .home6-banner-section .social-list li a i' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'gofly_hero_banner_slider_four_style_genaral_social_icon_hover_color',
            [
                'label'     => esc_html__('Hover Color', 'gofly-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .home6-banner-section .social-list li:hover a i' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'gofly_hero_banner_slider_four_style_genaral_social_icon_border_color',
            [
                'label'     => esc_html__('Border Color', 'gofly-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .home6-banner-section .social-list li a' => 'border: 1px solid {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'gofly_hero_banner_slider_four_style_genaral_social_icon_border_hover_color',
            [
                'label'     => esc_html__('Hover Border Color', 'gofly-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .home6-banner-section .social-list li a:hover' => 'border-color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'gofly_hero_banner_slider_four_style_genaral_social_icon_bg_color',
            [
                'label'     => esc_html__('Background Color', 'gofly-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .home6-banner-section .social-list li a' => 'background-color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'gofly_hero_banner_slider_four_style_genaral_social_icon_hover_bg_color',
            [
                'label'     => esc_html__('Hover Background Color', 'gofly-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .home6-banner-section .social-list li a:hover' => 'background-color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'gofly_hero_banner_slider_four_style_genaral_pagination',
            [
                'label'     => esc_html__('Pagination', 'gofly-core'),
                'type'      => \Elementor\Controls_Manager::HEADING,
                'separator' => 'after',
            ]
        );

        $this->add_control(
            'gofly_hero_banner_slider_four_style_genaral_pagination_color',
            [
                'label'     => esc_html__('Color', 'gofly-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .home6-banner-section .slider-btn-grp .slider-btn svg' => 'fill: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'gofly_hero_banner_slider_four_style_genaral_pagination_hover_color',
            [
                'label'     => esc_html__('Hover Color', 'gofly-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .home6-banner-section .slider-btn-grp .slider-btn:hover svg' => 'fill: {{VALUE}};',
                ],
            ]
        );


        $this->add_control(
            'gofly_hero_banner_slider_four_style_genaral_pagination_border_color',
            [
                'label'     => esc_html__('Border Color', 'gofly-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .home6-banner-section .slider-btn-grp .slider-btn' => 'border: 1px solid {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'gofly_hero_banner_slider_four_style_genaral_pagination_border_hover_color',
            [
                'label'     => esc_html__('Hover Border Color', 'gofly-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .home6-banner-section .slider-btn-grp .slider-btn:hover' => 'border: 1px solid {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'gofly_hero_banner_slider_four_style_genaral_pagination_bg_color',
            [
                'label'     => esc_html__('Background Color', 'gofly-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .home6-banner-section .slider-btn-grp .slider-btn' => 'background-color: {{VALUE}};',
                ],
            ]
        );


        $this->add_control(
            'gofly_hero_banner_slider_four_style_genaral_pagination_bg_hover_color',
            [
                'label'     => esc_html__('Hover Background Color', 'gofly-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .home6-banner-section .slider-btn-grp .slider-btn:hover' => 'background-color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'gofly_hero_banner_slider_four_style_genaral_pagination_counter',
            [
                'label'     => esc_html__('Pagination Counter', 'gofly-core'),
                'type'      => \Elementor\Controls_Manager::HEADING,
                'separator' => 'after',
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'label'    => esc_html__('Typography', 'gofly-core'),
                'name'     => 'gofly_hero_banner_slider_four_style_genaral_pagination_counter_typ',
                'selector' => '{{WRAPPER}} .home6-banner-section .slider-btn-grp .franctional-pagi1',

            ]
        );

        $this->add_control(
            'gofly_hero_banner_slider_four_style_genaral_pagination_counter_color',
            [
                'label'     => esc_html__('Color', 'gofly-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .home6-banner-section .slider-btn-grp .franctional-pagi1' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->end_controls_section();

        //=====================Style Five Start=======================//

        $this->start_controls_section(
            'gofly_hero_banner_slider_five_style_genaral',
            [
                'label'     => esc_html__('Styles', 'gofly-core'),
                'tab'       => Controls_Manager::TAB_STYLE,
                'condition' => [
                    'gofly_hero_banner_slider_genaral_style_selection' => ['style_five'],
                ]
            ]
        );

        $this->add_control(
            'gofly_hero_banner_slider_five_style_genaral_subtitle',
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
                'name'     => 'gofly_hero_banner_slider_five_style_genaral_subtitle_typ',
                'selector' => '{{WRAPPER}} .home7-banner-section .banner-wrapper .banner-content-wrap .banner-content > span',

            ]
        );

        $this->add_control(
            'gofly_hero_banner_slider_five_style_genaral_subtitle_color',
            [
                'label'     => esc_html__('Color', 'gofly-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .home7-banner-section .banner-wrapper .banner-content-wrap .banner-content > span' => 'color: {{VALUE}};',
                ],
            ]
        );


        $this->add_control(
            'gofly_hero_banner_slider_five_style_genaral_title',
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
                'name'     => 'gofly_hero_banner_slider_five_style_genaral_title_typ',
                'selector' => '{{WRAPPER}} .home7-banner-section .banner-wrapper .banner-content-wrap .banner-content h1',

            ]
        );

        $this->add_control(
            'gofly_hero_banner_slider_five_style_genaral_title_color',
            [
                'label'     => esc_html__('Color', 'gofly-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .home7-banner-section .banner-wrapper .banner-content-wrap .banner-content h1' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'gofly_hero_banner_slider_five_style_genaral_button',
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
                'name'     => 'gofly_hero_banner_slider_five_style_genaral_button_typ',
                'selector' => '{{WRAPPER}} .primary-btn1.four.white-bg',

            ]
        );

        $this->add_control(
            'gofly_hero_banner_slider_five_style_genaral_button_color',
            [
                'label'     => esc_html__('Color', 'gofly-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .primary-btn1.four.white-bg' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'gofly_hero_banner_slider_five_style_genaral_button_hover_color',
            [
                'label'     => esc_html__('Hover Color', 'gofly-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .primary-btn1.four.white-bg:hover' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'gofly_hero_banner_slider_five_style_genaral_button_icon_color',
            [
                'label'     => esc_html__('Icon Color', 'gofly-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .primary-btn1.four.white-bg svg' => 'fill: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'gofly_hero_banner_slider_five_style_genaral_button_hover_icon_color',
            [
                'label'     => esc_html__('Hover Icon Color', 'gofly-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .primary-btn1.four.white-bg:hover svg' => 'fill: {{VALUE}};',
                ],
            ]
        );


        $this->add_control(
            'gofly_hero_banner_slider_five_style_genaral_button_bg_color',
            [
                'label'     => esc_html__('Background Color', 'gofly-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .primary-btn1.four.white-bg' => 'background-color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'gofly_hero_banner_slider_five_style_genaral_button_hover_bg_color',
            [
                'label'     => esc_html__('Hover Background Color', 'gofly-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .primary-btn1.four.white-bg::after' => 'background-color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'gofly_hero_banner_slider_five_style_genaral_pagination',
            [
                'label'     => esc_html__('Pagination', 'gofly-core'),
                'type'      => \Elementor\Controls_Manager::HEADING,
                'separator' => 'after',
            ]
        );

        $this->add_control(
            'gofly_hero_banner_slider_five_style_genaral_pagination_color',
            [
                'label'     => esc_html__('Color', 'gofly-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .home7-banner-section .slider-btn-grp .slider-btn svg' => 'fill: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'gofly_hero_banner_slider_five_style_genaral_pagination_hover_color',
            [
                'label'     => esc_html__('Hover Color', 'gofly-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .home7-banner-section .slider-btn-grp .slider-btn:hover svg' => 'fill: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'gofly_hero_banner_slider_five_style_genaral_pagination_border_color',
            [
                'label'     => esc_html__('Border Color', 'gofly-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .home7-banner-section .slider-btn-grp .slider-btn' => 'border: 1px solid {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'gofly_hero_banner_slider_five_style_genaral_pagination_border_hover_color',
            [
                'label'     => esc_html__('Hover Border Color', 'gofly-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .home7-banner-section .slider-btn-grp .slider-btn:hover' => 'border: 1px solid {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'gofly_hero_banner_slider_five_style_genaral_pagination_background_color',
            [
                'label'     => esc_html__('Background Color', 'gofly-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .home7-banner-section .slider-btn-grp .slider-btn' => 'background-color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'gofly_hero_banner_slider_five_style_genaral_pagination_background_hover_color',
            [
                'label'     => esc_html__('Hover Background Color', 'gofly-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .home7-banner-section .slider-btn-grp .slider-btn:hover' => 'background-color: {{VALUE}};',
                ],
            ]
        );

        $this->end_controls_section();
    }
    protected function render()
    {

        $settings = $this->get_settings_for_display();

?>

        <?php if (is_admin()): ?>
            <script>
                var swiper = new Swiper(".home2-banner-slider", {
                    slidesPerView: 1,
                    speed: 1500,
                    spaceBetween: 24,
                    autoplay: {
                        delay: 3000,
                        pauseOnMouseEnter: true,
                        disableOnInteraction: false,
                    },
                    effect: "fade",
                    fadeEffect: {
                        crossFade: true,
                    },
                    navigation: {
                        nextEl: ".banner-slider-next",
                        prevEl: ".banner-slider-prev",
                    },
                    pagination: {
                        el: ".banner-pagination",
                        clickable: true,
                    },
                });

                var swiper = new Swiper(".home2-banner-slider", {
                    slidesPerView: 1,
                    speed: 1500,
                    spaceBetween: 24,
                    autoplay: {
                        delay: 3000,
                        pauseOnMouseEnter: true,
                        disableOnInteraction: false,
                    },
                    effect: "fade",
                    fadeEffect: {
                        crossFade: true,
                    },
                    navigation: {
                        nextEl: ".banner-slider-next",
                        prevEl: ".banner-slider-prev",
                    },
                    pagination: {
                        el: ".banner-pagination",
                        clickable: true,
                    },
                });

                var swiper = new Swiper(".home6-banner-slider", {
                    slidesPerView: 1,
                    speed: 1500,
                    spaceBetween: 24,
                    autoplay: {
                        delay: 3000,
                        disableOnInteraction: false,
                    },
                    effect: "fade",
                    fadeEffect: {
                        crossFade: true,
                    },
                    navigation: {
                        nextEl: ".banner-slider-next",
                        prevEl: ".banner-slider-prev",
                    },
                    pagination: {
                        el: ".franctional-pagi1",
                        type: "fraction",
                    },
                });
            </script>
        <?php endif; ?>

        <?php if ($settings['gofly_hero_banner_slider_genaral_style_selection'] == 'style_one'): ?>
            <div class="home2-banner-section">
                <div class="swiper home2-banner-slider">
                    <div class="swiper-wrapper">
                        <?php foreach ($settings['gofly_hero_banner_slider_genaral_content_list'] as $slider_data): ?>
                            <div class="swiper-slide">
                                <div class="banner-wrapper">
                                    <div class="<?php if ($slider_data['gofly_hero_banner_slider_genaral_background_contant_selection'] == 'image') : ?> banner-img-area<?php else : ?>banner-video-area<?php endif; ?>">
                                        <?php
                                        $selection = $slider_data['gofly_hero_banner_slider_genaral_background_contant_selection'] ?? '';

                                        if ($selection === 'upload_video' && !empty($slider_data['gofly_hero_banner_slider_genaral_background_contant_upload_video']['url'])): ?>
                                            <video autoplay loop muted playsinline src="<?php echo esc_url($slider_data['gofly_hero_banner_slider_genaral_background_contant_upload_video']['url']); ?>"></video>

                                        <?php elseif ($selection === 'image' && !empty($slider_data['gofly_hero_banner_slider_genaral_background_contant_image']['url'])): ?>
                                            <img src="<?php echo esc_url($slider_data['gofly_hero_banner_slider_genaral_background_contant_image']['url']); ?>" alt="<?php echo esc_attr__('background-image', 'gofly-core'); ?>">

                                        <?php endif; ?>
                                    </div>
                                    <div class="banner-content-wrap">
                                        <div class="container">
                                            <div class="banner-content">
                                                <?php if (!empty($slider_data['gofly_hero_banner_slider_genaral_title'])): ?>
                                                    <h1><?php echo esc_html($slider_data['gofly_hero_banner_slider_genaral_title']); ?></h1>
                                                <?php endif; ?>
                                                <?php if (!empty($slider_data['gofly_hero_banner_slider_genaral_description'])): ?>
                                                    <?php echo wp_kses($slider_data['gofly_hero_banner_slider_genaral_description'], wp_kses_allowed_html('post'));  ?>
                                                <?php endif; ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    </div>
                </div>
                <?php if ($settings['gofly_hero_banner_slider_genaral_show_pagination'] == 'yes'): ?>
                    <div class="slider-btn-grp">
                        <div class="slider-btn banner-slider-prev">
                            <svg width="22" height="22" viewBox="0 0 22 22" xmlns="http://www.w3.org/2000/svg">
                                <g>
                                    <path fill-rule="evenodd" clip-rule="evenodd" d="M0 10.0571H22V11.9428H0V10.0571Z" />
                                    <path fill-rule="evenodd" clip-rule="evenodd"
                                        d="M0.942857 11.9429C5.3768 11.9429 9.00115 8.0432 9.00115 3.88457V2.94171H7.11543V3.88457C7.11543 7.04251 4.29566 10.0571 0.942857 10.0571H0V11.9429H0.942857Z" />
                                    <path fill-rule="evenodd" clip-rule="evenodd"
                                        d="M0.942857 10.0571C5.3768 10.0571 9.00115 13.9568 9.00115 18.1154V19.0583H7.11543V18.1154C7.11543 14.9587 4.29566 11.9428 0.942857 11.9428H0V10.0571H0.942857Z" />
                                </g>
                            </svg>
                        </div>
                        <div class="slider-btn banner-slider-next">
                            <svg width="22" height="22" viewBox="0 0 22 22" xmlns="http://www.w3.org/2000/svg">
                                <g>
                                    <path fill-rule="evenodd" clip-rule="evenodd" d="M22 10.0571H-5.72205e-06V11.9428H22V10.0571Z" />
                                    <path fill-rule="evenodd" clip-rule="evenodd"
                                        d="M21.0571 11.9429C16.6232 11.9429 12.9989 8.0432 12.9989 3.88457V2.94171H14.8846V3.88457C14.8846 7.04251 17.7043 10.0571 21.0571 10.0571H22V11.9429H21.0571Z" />
                                    <path fill-rule="evenodd" clip-rule="evenodd"
                                        d="M21.0571 10.0571C16.6232 10.0571 12.9989 13.9568 12.9989 18.1154V19.0583H14.8846V18.1154C14.8846 14.9587 17.7043 11.9428 21.0571 11.9428H22V10.0571H21.0571Z" />
                                </g>
                            </svg>
                        </div>
                    </div>
                <?php endif; ?>
            </div>
        <?php endif; ?>

        <?php if ($settings['gofly_hero_banner_slider_genaral_style_selection'] == 'style_two'): ?>
            <div class="home3-banner-section">
                <div class="swiper home2-banner-slider">
                    <div class="swiper-wrapper">
                        <?php foreach ($settings['gofly_hero_banner_style_two_slider_genaral_content_list'] as $banner_data): ?>
                            <div class="swiper-slide">
                                <div class="banner-wrapper">
                                    <?php
                                    $banner_type = !empty($banner_data['gofly_hero_banner_style_two_slider_genaral_background_contant_selection'])
                                        ? $banner_data['gofly_hero_banner_style_two_slider_genaral_background_contant_selection']
                                        :  'image';

                                    $banner_class = ($banner_type === 'image') ? 'banner-img-area' : 'banner-video-area';
                                    ?>
                                    <div class="<?php echo esc_attr($banner_class); ?>">
                                        <?php
                                        $selection = $banner_data['gofly_hero_banner_style_two_slider_genaral_background_contant_selection'] ?? '';

                                        if ($selection === 'upload_video' && !empty($banner_data['gofly_hero_banner_style_two_slider_genaral_background_contant_upload_video']['url'])): ?>
                                            <video autoplay loop muted playsinline src="<?php echo esc_url($banner_data['gofly_hero_banner_style_two_slider_genaral_background_contant_upload_video']['url']); ?>"></video>

                                        <?php elseif ($selection === 'image' && !empty($banner_data['gofly_hero_banner_style_two_slider_genaral_background_contant_image']['url'])): ?>
                                            <img src="<?php echo esc_url($banner_data['gofly_hero_banner_style_two_slider_genaral_background_contant_image']['url']); ?>" alt="<?php echo esc_attr__('background-image', 'gofly-core'); ?>">

                                        <?php endif; ?>
                                    </div>
                                    <div class="banner-content-wrap">
                                        <div class="container">
                                            <div class="banner-content">
                                                <div class="award-rating-area">
                                                    <?php if (!empty($banner_data['gofly_hero_banner_style_two_slider_genaral_award_rating_icon_image']['url'])): ?>
                                                        <img src="<?php echo esc_url($banner_data['gofly_hero_banner_style_two_slider_genaral_award_rating_icon_image']['url']); ?>" alt="<?php echo esc_attr__('icon-image', 'gofly-core'); ?>">
                                                    <?php endif; ?>
                                                    <?php if (!empty($banner_data['gofly_hero_banner_style_two_slider_genaral_award_rating_area_title'])): ?>
                                                        <h4><?php echo esc_html($banner_data['gofly_hero_banner_style_two_slider_genaral_award_rating_area_title']); ?></h4>
                                                    <?php endif; ?>
                                                    <div class="rating">
                                                        <?php
                                                        $rank_counter = isset($banner_data['gofly_hero_banner_style_two_slider_genaral_award_rating_area_rating'])
                                                            ? intval($banner_data['gofly_hero_banner_style_two_slider_genaral_award_rating_area_rating'])
                                                            :  0;
                                                        $rank_counter = max(0, min(5, $rank_counter));
                                                        ?>
                                                        <span>(</span>
                                                        <ul class="rating-stars">
                                                            <?php for ($i = 1; $i <= 5; $i++): ?>
                                                                <li>
                                                                    <?php if ($i <= $rank_counter): ?>
                                                                        <i class="bi bi-star-fill" aria-hidden="true"></i>
                                                                    <?php else: ?>
                                                                        <i class="bi bi-star" aria-hidden="true"></i>
                                                                    <?php endif; ?>
                                                                </li>
                                                            <?php endfor; ?>
                                                        </ul>
                                                        <span>)</span>
                                                    </div>
                                                </div>
                                                <?php if (!empty($banner_data['gofly_hero_banner_style_two_slider_genaral_title'])): ?>
                                                    <h1><?php echo esc_html($banner_data['gofly_hero_banner_style_two_slider_genaral_title']); ?></h1>
                                                <?php endif; ?>
                                                <?php if (!empty($banner_data['gofly_hero_banner_style_two_slider_genaral_description'])): ?>
                                                    <?php echo wp_kses($banner_data['gofly_hero_banner_style_two_slider_genaral_description'], wp_kses_allowed_html('post'));  ?>
                                                <?php endif; ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    </div>
                </div>
                <?php if (!empty($settings['gofly_hero_banner_slider_genaral_show_pagination'] == 'yes')): ?>
                    <div class="banner-pagination paginations"></div>
                <?php endif; ?>
            </div>
        <?php endif; ?>

        <?php if ($settings['gofly_hero_banner_slider_genaral_style_selection'] == 'style_three'): ?>
            <div class="home5-banner-section">
                <div class="swiper home2-banner-slider">
                    <div class="swiper-wrapper">
                        <?php foreach ($settings['gofly_hero_banner_style_three_slider_genaral_content_list'] as $banner_data): ?>
                            <div class="swiper-slide">
                                <div class="banner-wrapper">

                                    <?php
                                    $banner_type = !empty($banner_data['gofly_hero_banner_style_three_slider_genaral_background_contant_selection'])
                                        ? $banner_data['gofly_hero_banner_style_three_slider_genaral_background_contant_selection']
                                        :  'image';

                                    $banner_class = ($banner_type === 'image') ? 'banner-img-area' : 'banner-video-area';
                                    ?>
                                    <div class="<?php echo esc_attr($banner_class); ?>">
                                        <?php
                                        $selection = $banner_data['gofly_hero_banner_style_three_slider_genaral_background_contant_selection'] ?? '';

                                        if ($selection === 'upload_video' && !empty($banner_data['gofly_hero_banner_style_three_slider_genaral_background_contant_upload_video']['url'])): ?>
                                            <video autoplay loop muted playsinline src="<?php echo esc_url($banner_data['gofly_hero_banner_style_three_slider_genaral_background_contant_upload_video']['url']); ?>"></video>

                                        <?php elseif ($selection === 'image' && !empty($banner_data['gofly_hero_banner_style_three_slider_genaral_background_contant_image']['url'])): ?>
                                            <img src="<?php echo esc_url($banner_data['gofly_hero_banner_style_three_slider_genaral_background_contant_image']['url']); ?>" alt="<?php echo esc_attr__('background-image', 'gofly-core'); ?>">

                                        <?php endif; ?>
                                    </div>
                                    <div class="banner-content-wrap">
                                        <div class="container">
                                            <div class="banner-content">
                                                <?php if (!empty($banner_data['gofly_hero_banner_style_three_slider_genaral_title'])): ?>
                                                    <h1><?php echo esc_html($banner_data['gofly_hero_banner_style_three_slider_genaral_title']); ?></h1>
                                                <?php endif; ?>
                                                <?php if (!empty($banner_data['gofly_hero_banner_style_three_slider_genaral_description'])): ?>
                                                    <?php echo wp_kses($banner_data['gofly_hero_banner_style_three_slider_genaral_description'], wp_kses_allowed_html('post'));  ?>
                                                <?php endif; ?>
                                                <?php if (!empty($banner_data['gofly_hero_banner_style_three_slider_genaral_button'])): ?>
                                                    <a href="<?php echo esc_url($banner_data['gofly_hero_banner_style_three_slider_genaral_button_url']['url']); ?>" class="primary-btn1 two">
                                                        <span>
                                                            <?php echo esc_html($banner_data['gofly_hero_banner_style_three_slider_genaral_button']); ?>
                                                            <svg width="10" height="10" viewBox="0 0 10 10" xmlns="http://www.w3.org/2000/svg">
                                                                <path d="M9.73535 1.14746C9.57033 1.97255 9.32924 3.26406 9.24902 4.66797C9.16817 6.08312 9.25559 7.5453 9.70214 8.73633C9.84754 9.12406 9.65129 9.55659 9.26367 9.70215C8.9001 9.83849 8.4969 9.67455 8.32812 9.33398L8.29785 9.26367L8.19921 8.98438C7.73487 7.5758 7.67054 5.98959 7.75097 4.58203C7.77875 4.09598 7.82525 3.62422 7.87988 3.17969L1.53027 9.53027C1.23738 9.82317 0.762615 9.82317 0.469722 9.53027C0.176829 9.23738 0.176829 8.76262 0.469722 8.46973L6.83593 2.10254C6.3319 2.16472 5.79596 2.21841 5.25 2.24902C3.8302 2.32862 2.2474 2.26906 0.958003 1.79102L0.704097 1.68945L0.635738 1.65527C0.303274 1.47099 0.157578 1.06102 0.310542 0.704102C0.463655 0.347333 0.860941 0.170391 1.22363 0.28418L1.29589 0.310547L1.48828 0.387695C2.47399 0.751207 3.79966 0.827571 5.16601 0.750977C6.60111 0.670504 7.97842 0.428235 8.86132 0.262695L9.95312 0.0585938L9.73535 1.14746Z"></path>
                                                            </svg>
                                                        </span>
                                                        <span>
                                                            <?php echo esc_html($banner_data['gofly_hero_banner_style_three_slider_genaral_button']); ?>
                                                            <svg width="10" height="10" viewBox="0 0 10 10" xmlns="http://www.w3.org/2000/svg">
                                                                <path d="M9.73535 1.14746C9.57033 1.97255 9.32924 3.26406 9.24902 4.66797C9.16817 6.08312 9.25559 7.5453 9.70214 8.73633C9.84754 9.12406 9.65129 9.55659 9.26367 9.70215C8.9001 9.83849 8.4969 9.67455 8.32812 9.33398L8.29785 9.26367L8.19921 8.98438C7.73487 7.5758 7.67054 5.98959 7.75097 4.58203C7.77875 4.09598 7.82525 3.62422 7.87988 3.17969L1.53027 9.53027C1.23738 9.82317 0.762615 9.82317 0.469722 9.53027C0.176829 9.23738 0.176829 8.76262 0.469722 8.46973L6.83593 2.10254C6.3319 2.16472 5.79596 2.21841 5.25 2.24902C3.8302 2.32862 2.2474 2.26906 0.958003 1.79102L0.704097 1.68945L0.635738 1.65527C0.303274 1.47099 0.157578 1.06102 0.310542 0.704102C0.463655 0.347333 0.860941 0.170391 1.22363 0.28418L1.29589 0.310547L1.48828 0.387695C2.47399 0.751207 3.79966 0.827571 5.16601 0.750977C6.60111 0.670504 7.97842 0.428235 8.86132 0.262695L9.95312 0.0585938L9.73535 1.14746Z"></path>
                                                            </svg>
                                                        </span>
                                                    </a>
                                                <?php endif; ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    </div>
                    <?php if ($settings['gofly_hero_banner_slider_genaral_show_pagination'] == 'yes'): ?>
                        <div class="slider-btn-grp">
                            <div class="slider-btn banner-slider-prev">
                                <svg width="22" height="22" viewBox="0 0 22 22" xmlns="http://www.w3.org/2000/svg">
                                    <g>
                                        <path fill-rule="evenodd" clip-rule="evenodd" d="M0 10.0571H22V11.9428H0V10.0571Z" />
                                        <path fill-rule="evenodd" clip-rule="evenodd"
                                            d="M0.942857 11.9429C5.3768 11.9429 9.00115 8.0432 9.00115 3.88457V2.94171H7.11543V3.88457C7.11543 7.04251 4.29566 10.0571 0.942857 10.0571H0V11.9429H0.942857Z" />
                                        <path fill-rule="evenodd" clip-rule="evenodd"
                                            d="M0.942857 10.0571C5.3768 10.0571 9.00115 13.9568 9.00115 18.1154V19.0583H7.11543V18.1154C7.11543 14.9587 4.29566 11.9428 0.942857 11.9428H0V10.0571H0.942857Z" />
                                    </g>
                                </svg>
                            </div>
                            <div class="slider-btn banner-slider-next">
                                <svg width="22" height="22" viewBox="0 0 22 22" xmlns="http://www.w3.org/2000/svg">
                                    <g>
                                        <path fill-rule="evenodd" clip-rule="evenodd" d="M22 10.0571H-5.72205e-06V11.9428H22V10.0571Z" />
                                        <path fill-rule="evenodd" clip-rule="evenodd"
                                            d="M21.0571 11.9429C16.6232 11.9429 12.9989 8.0432 12.9989 3.88457V2.94171H14.8846V3.88457C14.8846 7.04251 17.7043 10.0571 21.0571 10.0571H22V11.9429H21.0571Z" />
                                        <path fill-rule="evenodd" clip-rule="evenodd"
                                            d="M21.0571 10.0571C16.6232 10.0571 12.9989 13.9568 12.9989 18.1154V19.0583H14.8846V18.1154C14.8846 14.9587 17.7043 11.9428 21.0571 11.9428H22V10.0571H21.0571Z" />
                                    </g>
                                </svg>
                            </div>
                        </div>
                    <?php endif; ?>
                </div>
            </div>
        <?php endif; ?>

        <?php if ($settings['gofly_hero_banner_slider_genaral_style_selection'] == 'style_four'): ?>
            <div class="home6-banner-section">
                <div class="swiper home6-banner-slider">
                    <div class="swiper-wrapper">
                        <?php foreach ($settings['gofly_hero_banner_style_four_slider_genaral_content_list'] as $banner_data): ?>
                            <div class="swiper-slide">
                                <div class="banner-wrapper">
                                    <?php
                                    $banner_type = !empty($banner_data['gofly_hero_banner_style_four_slider_genaral_background_contant_selection'])
                                        ? $banner_data['gofly_hero_banner_style_four_slider_genaral_background_contant_selection']
                                        :  'image';

                                    $banner_class = ($banner_type === 'image') ? 'banner-img-area' : 'banner-video-area';
                                    ?>
                                    <div class="<?php echo esc_attr($banner_class); ?>">
                                        <?php
                                        $selection = $banner_data['gofly_hero_banner_style_four_slider_genaral_background_contant_selection'] ?? '';

                                        if ($selection === 'upload_video' && !empty($banner_data['gofly_hero_banner_style_four_slider_genaral_background_contant_upload_video']['url'])): ?>
                                            <video autoplay loop muted playsinline src="<?php echo esc_url($banner_data['gofly_hero_banner_style_four_slider_genaral_background_contant_upload_video']['url']); ?>"></video>

                                        <?php elseif ($selection === 'image' && !empty($banner_data['gofly_hero_banner_style_four_slider_genaral_background_contant_image']['url'])): ?>
                                            <img src="<?php echo esc_url($banner_data['gofly_hero_banner_style_four_slider_genaral_background_contant_image']['url']); ?>" alt="<?php echo esc_attr__('background-image', 'gofly-core'); ?>">

                                        <?php endif; ?>
                                    </div>
                                    <div class="banner-content-wrap">
                                        <div class="container">
                                            <div class="banner-content two">
                                                <?php if (!empty($banner_data['gofly_hero_banner_style_four_slider_genaral_title'])): ?>
                                                    <h2><?php echo wp_kses($banner_data['gofly_hero_banner_style_four_slider_genaral_title'], wp_kses_allowed_html('post'));  ?></h2>
                                                <?php endif; ?>
                                                <?php if (!empty($banner_data['gofly_hero_banner_style_four_slider_genaral_button'])): ?>
                                                    <a href="<?php echo esc_url($banner_data['gofly_hero_banner_style_four_slider_genaral_button_url']['url']); ?>" class="primary-btn1 two">
                                                        <span>
                                                            <?php echo esc_html($banner_data['gofly_hero_banner_style_four_slider_genaral_button']); ?>
                                                            <svg width="10" height="10" viewBox="0 0 10 10" xmlns="http://www.w3.org/2000/svg">
                                                                <path d="M9.73535 1.14746C9.57033 1.97255 9.32924 3.26406 9.24902 4.66797C9.16817 6.08312 9.25559 7.5453 9.70214 8.73633C9.84754 9.12406 9.65129 9.55659 9.26367 9.70215C8.9001 9.83849 8.4969 9.67455 8.32812 9.33398L8.29785 9.26367L8.19921 8.98438C7.73487 7.5758 7.67054 5.98959 7.75097 4.58203C7.77875 4.09598 7.82525 3.62422 7.87988 3.17969L1.53027 9.53027C1.23738 9.82317 0.762615 9.82317 0.469722 9.53027C0.176829 9.23738 0.176829 8.76262 0.469722 8.46973L6.83593 2.10254C6.3319 2.16472 5.79596 2.21841 5.25 2.24902C3.8302 2.32862 2.2474 2.26906 0.958003 1.79102L0.704097 1.68945L0.635738 1.65527C0.303274 1.47099 0.157578 1.06102 0.310542 0.704102C0.463655 0.347333 0.860941 0.170391 1.22363 0.28418L1.29589 0.310547L1.48828 0.387695C2.47399 0.751207 3.79966 0.827571 5.16601 0.750977C6.60111 0.670504 7.97842 0.428235 8.86132 0.262695L9.95312 0.0585938L9.73535 1.14746Z"></path>
                                                            </svg>
                                                        </span>
                                                        <span>
                                                            <?php echo esc_html($banner_data['gofly_hero_banner_style_four_slider_genaral_button']); ?>
                                                            <svg width="10" height="10" viewBox="0 0 10 10" xmlns="http://www.w3.org/2000/svg">
                                                                <path d="M9.73535 1.14746C9.57033 1.97255 9.32924 3.26406 9.24902 4.66797C9.16817 6.08312 9.25559 7.5453 9.70214 8.73633C9.84754 9.12406 9.65129 9.55659 9.26367 9.70215C8.9001 9.83849 8.4969 9.67455 8.32812 9.33398L8.29785 9.26367L8.19921 8.98438C7.73487 7.5758 7.67054 5.98959 7.75097 4.58203C7.77875 4.09598 7.82525 3.62422 7.87988 3.17969L1.53027 9.53027C1.23738 9.82317 0.762615 9.82317 0.469722 9.53027C0.176829 9.23738 0.176829 8.76262 0.469722 8.46973L6.83593 2.10254C6.3319 2.16472 5.79596 2.21841 5.25 2.24902C3.8302 2.32862 2.2474 2.26906 0.958003 1.79102L0.704097 1.68945L0.635738 1.65527C0.303274 1.47099 0.157578 1.06102 0.310542 0.704102C0.463655 0.347333 0.860941 0.170391 1.22363 0.28418L1.29589 0.310547L1.48828 0.387695C2.47399 0.751207 3.79966 0.827571 5.16601 0.750977C6.60111 0.670504 7.97842 0.428235 8.86132 0.262695L9.95312 0.0585938L9.73535 1.14746Z"></path>
                                                            </svg>
                                                        </span>
                                                    </a>
                                                <?php endif; ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    </div>
                    <?php if ($settings['gofly_hero_banner_slider_genaral_show_pagination'] == 'yes'): ?>
                        <div class="slider-btn-grp">
                            <div class="slider-btn banner-slider-prev">
                                <svg width="16" height="16" viewBox="0 0 16 16" xmlns="http://www.w3.org/2000/svg">
                                    <g clip-path="url(#clip0_1151_22708)">
                                        <path fill-rule="evenodd" clip-rule="evenodd" d="M8.68555 0L8.68555 16H7.31412L7.31412 0L8.68555 0Z" />
                                        <path fill-rule="evenodd" clip-rule="evenodd"
                                            d="M7.31406 0.685714C7.31406 3.9104 10.1502 6.54629 13.1746 6.54629H13.8604V5.17486H13.1746C10.878 5.17486 8.68549 3.12412 8.68549 0.685714V0L7.31406 0V0.685714Z" />
                                        <path fill-rule="evenodd" clip-rule="evenodd"
                                            d="M8.68555 0.685714C8.68555 3.9104 5.84943 6.54629 2.82497 6.54629H2.13926V5.17486H2.82497C5.12075 5.17486 7.31412 3.12412 7.31412 0.685714V0L8.68555 0V0.685714Z" />
                                    </g>
                                </svg>
                            </div>
                            <div class="franctional-pagi1"></div>
                            <div class="slider-btn banner-slider-next">
                                <svg width="16" height="16" viewBox="0 0 16 16" xmlns="http://www.w3.org/2000/svg">
                                    <g clip-path="url(#clip0_1151_22699)">
                                        <path fill-rule="evenodd" clip-rule="evenodd" d="M8.68579 16L8.68579 -3.8147e-06H7.31436L7.31436 16H8.68579Z" />
                                        <path fill-rule="evenodd" clip-rule="evenodd"
                                            d="M7.31431 15.3143C7.31431 12.0896 10.1504 9.45371 13.1749 9.45371H13.8606V10.8251H13.1749C10.8782 10.8251 8.68574 12.8759 8.68574 15.3143V16H7.31431V15.3143Z" />
                                        <path fill-rule="evenodd" clip-rule="evenodd"
                                            d="M8.68579 15.3143C8.68579 12.0896 5.84968 9.45371 2.82522 9.45371H2.1395V10.8251H2.82522C5.12099 10.8251 7.31436 12.8759 7.31436 15.3143V16H8.68579V15.3143Z" />
                                    </g>
                                </svg>
                            </div>
                        </div>
                    <?php endif; ?>
                    <ul class="social-list">
                        <?php foreach ($settings['gofly_hero_banner_style_four_slider_genaral_social_icon_list'] as $social_data): ?>
                            <?php $icon = $social_data['gofly_hero_banner_style_four_slider_genaral_social_icon']; ?>
                            <?php if (!empty($icon['value'])): ?>
                                <li><a href="<?php echo esc_url($social_data['gofly_hero_banner_style_four_slider_genaral_social_icon_url']['url']); ?>"><i class="<?php echo esc_attr($icon['value']); ?>"></i></a></li>
                            <?php endif; ?>
                        <?php endforeach; ?>
                    </ul>
                </div>
            <?php endif; ?>

            <?php if ($settings['gofly_hero_banner_slider_genaral_style_selection'] == 'style_five'): ?>
                <div class="home7-banner-section">
                    <div class="swiper home6-banner-slider">
                        <div class="swiper-wrapper">
                            <?php foreach ($settings['gofly_hero_banner_style_five_slider_genaral_content_list'] as $banner_data): ?>
                                <div class="swiper-slide">
                                    <div class="banner-wrapper">
                                        <?php
                                        $banner_type = !empty($banner_data['gofly_hero_banner_style_five_slider_genaral_background_contant_selection'])
                                            ? $banner_data['gofly_hero_banner_style_five_slider_genaral_background_contant_selection']
                                            :  'image';

                                        $banner_class = ($banner_type === 'image') ? 'banner-img-area' : 'banner-video-area';
                                        ?>
                                        <div class="<?php echo esc_attr($banner_class); ?>">
                                            <?php
                                            $selection = $banner_data['gofly_hero_banner_style_five_slider_genaral_background_contant_selection'] ?? '';

                                            if ($selection === 'upload_video' && !empty($banner_data['gofly_hero_banner_style_five_slider_genaral_background_contant_upload_video']['url'])): ?>
                                                <video autoplay loop muted playsinline src="<?php echo esc_url($banner_data['gofly_hero_banner_style_five_slider_genaral_background_contant_upload_video']['url']); ?>"></video>

                                            <?php elseif ($selection === 'image' && !empty($banner_data['gofly_hero_banner_style_five_slider_genaral_background_contant_image']['url'])): ?>
                                                <img src="<?php echo esc_url($banner_data['gofly_hero_banner_style_five_slider_genaral_background_contant_image']['url']); ?>" alt="<?php echo esc_attr__('background-image', 'gofly-core'); ?>">

                                            <?php endif; ?>
                                        </div>
                                        <div class="banner-content-wrap">
                                            <div class="container">
                                                <div class="banner-content">
                                                    <?php if (!empty($banner_data['gofly_hero_banner_style_five_slider_genaral_subtitle'])): ?>
                                                        <span><?php echo esc_html($banner_data['gofly_hero_banner_style_five_slider_genaral_subtitle']); ?></span>
                                                    <?php endif; ?>
                                                    <?php if (!empty($banner_data['gofly_hero_banner_style_five_slider_genaral_title'])): ?>
                                                        <h1><?php echo wp_kses($banner_data['gofly_hero_banner_style_five_slider_genaral_title'], wp_kses_allowed_html('post'));  ?></h1>
                                                    <?php endif; ?>
                                                    <?php if (!empty($banner_data['gofly_hero_banner_style_five_slider_genaral_button'])): ?>
                                                        <a href="<?php echo esc_url($banner_data['gofly_hero_banner_style_five_slider_genaral_button_url']['url']); ?>" class="primary-btn1 four two white-bg">
                                                            <span>
                                                                <?php echo esc_html($banner_data['gofly_hero_banner_style_five_slider_genaral_button']); ?>
                                                                <svg width="10" height="10" viewBox="0 0 10 10" xmlns="http://www.w3.org/2000/svg">
                                                                    <path d="M9.73535 1.14746C9.57033 1.97255 9.32924 3.26406 9.24902 4.66797C9.16817 6.08312 9.25559 7.5453 9.70214 8.73633C9.84754 9.12406 9.65129 9.55659 9.26367 9.70215C8.9001 9.83849 8.4969 9.67455 8.32812 9.33398L8.29785 9.26367L8.19921 8.98438C7.73487 7.5758 7.67054 5.98959 7.75097 4.58203C7.77875 4.09598 7.82525 3.62422 7.87988 3.17969L1.53027 9.53027C1.23738 9.82317 0.762615 9.82317 0.469722 9.53027C0.176829 9.23738 0.176829 8.76262 0.469722 8.46973L6.83593 2.10254C6.3319 2.16472 5.79596 2.21841 5.25 2.24902C3.8302 2.32862 2.2474 2.26906 0.958003 1.79102L0.704097 1.68945L0.635738 1.65527C0.303274 1.47099 0.157578 1.06102 0.310542 0.704102C0.463655 0.347333 0.860941 0.170391 1.22363 0.28418L1.29589 0.310547L1.48828 0.387695C2.47399 0.751207 3.79966 0.827571 5.16601 0.750977C6.60111 0.670504 7.97842 0.428235 8.86132 0.262695L9.95312 0.0585938L9.73535 1.14746Z"></path>
                                                                </svg>
                                                            </span>
                                                            <span>
                                                                <?php echo esc_html($banner_data['gofly_hero_banner_style_five_slider_genaral_button']); ?>
                                                                <svg width="10" height="10" viewBox="0 0 10 10" xmlns="http://www.w3.org/2000/svg">
                                                                    <path d="M9.73535 1.14746C9.57033 1.97255 9.32924 3.26406 9.24902 4.66797C9.16817 6.08312 9.25559 7.5453 9.70214 8.73633C9.84754 9.12406 9.65129 9.55659 9.26367 9.70215C8.9001 9.83849 8.4969 9.67455 8.32812 9.33398L8.29785 9.26367L8.19921 8.98438C7.73487 7.5758 7.67054 5.98959 7.75097 4.58203C7.77875 4.09598 7.82525 3.62422 7.87988 3.17969L1.53027 9.53027C1.23738 9.82317 0.762615 9.82317 0.469722 9.53027C0.176829 9.23738 0.176829 8.76262 0.469722 8.46973L6.83593 2.10254C6.3319 2.16472 5.79596 2.21841 5.25 2.24902C3.8302 2.32862 2.2474 2.26906 0.958003 1.79102L0.704097 1.68945L0.635738 1.65527C0.303274 1.47099 0.157578 1.06102 0.310542 0.704102C0.463655 0.347333 0.860941 0.170391 1.22363 0.28418L1.29589 0.310547L1.48828 0.387695C2.47399 0.751207 3.79966 0.827571 5.16601 0.750977C6.60111 0.670504 7.97842 0.428235 8.86132 0.262695L9.95312 0.0585938L9.73535 1.14746Z"></path>
                                                                </svg>
                                                            </span>
                                                        </a>
                                                    <?php endif; ?>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            <?php endforeach; ?>
                        </div>
                    </div>
                    <?php if ($settings['gofly_hero_banner_slider_genaral_show_pagination'] == 'yes'): ?>
                        <div class="slider-btn-grp">
                            <div class="slider-btn banner-slider-prev">
                                <svg width="22" height="22" viewBox="0 0 22 22" xmlns="http://www.w3.org/2000/svg">
                                    <g>
                                        <path fill-rule="evenodd" clip-rule="evenodd" d="M0 10.0571H22V11.9428H0V10.0571Z" />
                                        <path fill-rule="evenodd" clip-rule="evenodd"
                                            d="M0.942857 11.9429C5.3768 11.9429 9.00115 8.0432 9.00115 3.88457V2.94171H7.11543V3.88457C7.11543 7.04251 4.29566 10.0571 0.942857 10.0571H0V11.9429H0.942857Z" />
                                        <path fill-rule="evenodd" clip-rule="evenodd"
                                            d="M0.942857 10.0571C5.3768 10.0571 9.00115 13.9568 9.00115 18.1154V19.0583H7.11543V18.1154C7.11543 14.9587 4.29566 11.9428 0.942857 11.9428H0V10.0571H0.942857Z" />
                                    </g>
                                </svg>
                            </div>
                            <div class="slider-btn banner-slider-next">
                                <svg width="22" height="22" viewBox="0 0 22 22" xmlns="http://www.w3.org/2000/svg">
                                    <g clip-path="url(#clip0_1151_27911)">
                                        <path fill-rule="evenodd" clip-rule="evenodd" d="M22 10.0571H-5.72205e-06V11.9428H22V10.0571Z" />
                                        <path fill-rule="evenodd" clip-rule="evenodd"
                                            d="M21.0571 11.9429C16.6232 11.9429 12.9989 8.0432 12.9989 3.88457V2.94171H14.8846V3.88457C14.8846 7.04251 17.7043 10.0571 21.0571 10.0571H22V11.9429H21.0571Z" />
                                        <path fill-rule="evenodd" clip-rule="evenodd"
                                            d="M21.0571 10.0571C16.6232 10.0571 12.9989 13.9568 12.9989 18.1154V19.0583H14.8846V18.1154C14.8846 14.9587 17.7043 11.9428 21.0571 11.9428H22V10.0571H21.0571Z" />
                                    </g>
                                </svg>
                            </div>
                        </div>
                    <?php endif; ?>
                </div>
            <?php endif; ?>
    <?php

    }
}

Plugin::instance()->widgets_manager->register(new Gofly_Hero_Banner_Slider_Widget());
