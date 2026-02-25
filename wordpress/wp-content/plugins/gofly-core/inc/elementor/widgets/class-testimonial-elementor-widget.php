<?php

namespace Elementor;

if (!defined('ABSPATH')) exit;  // Exit if accessed directly

use Elementor\core\Schemes;
use Egns_Core\Egns_Helper;

class Gofly_Testimonial_Widget extends Widget_Base
{

    public function get_name()
    {
        return 'gofly_testimonial';
    }

    public function get_title()
    {
        return esc_html__('EG Testimonial', 'gofly-core');
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
            'gofly_testimonial_genaral',
            [
                'label' => esc_html__('General', 'gofly-core')
            ]
        );

        $this->add_control(
            'gofly_testimonial_genaral_style_selection',
            [
                'label'   => esc_html__('Select Style', 'gofly-core'),
                'type'    => Controls_Manager::SELECT,
                'options' => [
                    'style_one'   => esc_html__('Style One', 'gofly-core'),
                    'style_two'   => esc_html__('Style Two', 'gofly-core'),
                    'style_three' => esc_html__('Style Three', 'gofly-core'),
                    'style_four'  => esc_html__('Style Four', 'gofly-core'),
                    'style_five'  => esc_html__('Style Five', 'gofly-core'),
                    'style_six'   => esc_html__('Style Six', 'gofly-core'),
                    'style_seven' => esc_html__('Style Seven', 'gofly-core'),
                    'style_eight' => esc_html__('Style Eight', 'gofly-core'),
                ],
                'default' => 'style_one',
            ]
        );

        $this->add_control(
            'gofly_testimonial_genaral_testimonial_bg_image',
            [
                'label'   => esc_html__('Parallax Background Image', 'gofly-core'),
                'type'    => \Elementor\Controls_Manager::MEDIA,
                'default' => [
                    'url' => \Elementor\Utils::get_placeholder_image_src(),
                ],
                'condition' => [
                    'gofly_testimonial_genaral_style_selection' => ['style_five', 'style_six', 'style_seven', 'style_eight'],
                ]
            ]
        );

        $this->add_control(
            'gofly_testimonial_genaral_header_switcher',
            [
                'label'        => esc_html__("Show Header?", 'gofly-core'),
                'type'         => \Elementor\Controls_Manager::SWITCHER,
                'label_on'     => esc_html__('Yes', 'gofly-core'),
                'label_off'    => esc_html__('No', 'gofly-core'),
                'return_value' => 'yes',
                'default'      => 'yes',
                'condition'    => [
                    'gofly_testimonial_genaral_style_selection' => ['style_one', 'style_two', 'style_three', 'style_four', 'style_seven'],
                ]

            ]
        );

        $this->add_control(
            'gofly_testimonial_genaral_header_title',
            [
                'label'       => esc_html__('Header Title', 'gofly-core'),
                'type'        => \Elementor\Controls_Manager::TEXT,
                'default'     => esc_html__('Hear It from Travelers', 'gofly-core'),
                'placeholder' => esc_html__('write your title here', 'gofly-core'),
                'label_block' => true,
                'condition'   => [
                    'gofly_testimonial_genaral_style_selection' => ['style_one', 'style_two', 'style_three', 'style_four', 'style_seven'],
                ]
            ]
        );

        $this->add_control(
            'gofly_testimonial_genaral_header_description',
            [
                'label'       => esc_html__('Header Description', 'gofly-core'),
                'type'        => \Elementor\Controls_Manager::TEXTAREA,
                'default'     => esc_html__('We go beyond just booking trips—we create unforgettable travel experiences that match your dreams!', 'gofly-core'),
                'placeholder' => esc_html__('write your description here', 'gofly-core'),
                'label_block' => true,
                'condition'   => [
                    'gofly_testimonial_genaral_style_selection' => ['style_one', 'style_two', 'style_three', 'style_four', 'style_seven'],
                ]
            ]
        );


        $this->add_control(
            'gofly_testimonial_genaral_style_seven_testimonial_author_rating_switcher',
            [
                'label'        => esc_html__("Need Rating ?", 'gofly-core'),
                'type'         => \Elementor\Controls_Manager::SWITCHER,
                'label_on'     => esc_html__('Yes', 'gofly-core'),
                'label_off'    => esc_html__('No', 'gofly-core'),
                'return_value' => 'yes',
                'default'      => 'yes',
                'condition'    => [
                    'gofly_testimonial_genaral_style_selection' => ['style_seven'],
                ]
            ]
        );

        $this->add_control(
            'gofly_testimonial_genaral_seven_testimonial_rating',
            [
                'label'     => esc_html__('Rating Area', 'gofly-core'),
                'type'      => \Elementor\Controls_Manager::HEADING,
                'separator' => 'after',
                'condition' => [
                    'gofly_testimonial_genaral_style_selection'                                => ['style_seven'],
                    'gofly_testimonial_genaral_style_seven_testimonial_author_rating_switcher' => ['yes'],
                ]
            ]
        );

        $this->add_control(
            'gofly_testimonial_genaral_style_seven_testimonial_review_rating',
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
                'condition' => [
                    'gofly_testimonial_genaral_style_seven_testimonial_author_rating_switcher' => ['yes'],
                    'gofly_testimonial_genaral_style_selection'                                => ['style_seven'],
                ]
            ]
        );

        $this->add_control(
            'gofly_testimonial_genaral_style_seven_testimonial_review_rating_logo',
            [
                'label'       => esc_html__('Logo', 'gofly-core'),
                'type'        => \Elementor\Controls_Manager::MEDIA,
                'media_types' => ['svg', 'image'],
                'default'     => [
                    'url' => \Elementor\Utils::get_placeholder_image_src(),
                ],
                'condition' => [
                    'gofly_testimonial_genaral_style_seven_testimonial_author_rating_switcher' => ['yes'],
                    'gofly_testimonial_genaral_style_selection'                                => ['style_seven'],
                ]
            ]
        );

        $this->add_control(
            'gofly_testimonial_genaral_style_seven_testimonial_review_rating_logo_url',
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
                'condition'   => [
                    'gofly_testimonial_genaral_style_seven_testimonial_author_rating_switcher' => ['yes'],
                    'gofly_testimonial_genaral_style_selection'                                => ['style_seven'],
                ]

            ]
        );

        $this->add_control(
            'gofly_testimonial_genaral_style_seven_testimonial_review_rating_title',
            [
                'label'       => esc_html__('Rating Title', 'gofly-core'),
                'type'        => \Elementor\Controls_Manager::TEXT,
                'default'     => esc_html__('GOOGLE REVIEW', 'gofly-core'),
                'placeholder' => esc_html__('write your title here', 'gofly-core'),
                'label_block' => true,
                'condition'   => [
                    'gofly_testimonial_genaral_style_seven_testimonial_author_rating_switcher' => ['yes'],
                    'gofly_testimonial_genaral_style_selection'                                => ['style_seven'],
                ]
            ]
        );

        $this->add_control(
            'gofly_testimonial_genaral_style_seven_testimonial_review_rating_count',
            [
                'label'       => esc_html__('Rating Count', 'gofly-core'),
                'type'        => \Elementor\Controls_Manager::TEXT,
                'default'     => esc_html__('(4.5)', 'gofly-core'),
                'placeholder' => esc_html__('write your title here', 'gofly-core'),
                'label_block' => true,
                'condition'   => [
                    'gofly_testimonial_genaral_style_seven_testimonial_author_rating_switcher' => ['yes'],
                    'gofly_testimonial_genaral_style_selection'                                => ['style_seven'],
                ]
            ]
        );


        $this->add_control(
            'gofly_testimonial_genaral_testimonial',
            [
                'label'     => esc_html__('Testimonial', 'gofly-core'),
                'type'      => \Elementor\Controls_Manager::HEADING,
                'separator' => 'after',
            ]
        );

        $repeater = new \Elementor\Repeater();

        $repeater->add_control(
            'gofly_testimonial_genaral_testimonial_author_image',
            [
                'label'   => esc_html__('Author Image', 'gofly-core'),
                'type'    => \Elementor\Controls_Manager::MEDIA,
                'default' => [
                    'url' => \Elementor\Utils::get_placeholder_image_src(),
                ],
            ]
        );

        $repeater->add_control(
            'gofly_testimonial_genaral_testimonial_author_name',
            [
                'label'       => esc_html__('Author Name', 'gofly-core'),
                'type'        => \Elementor\Controls_Manager::TEXT,
                'default'     => esc_html__('Robert Kcarery', 'gofly-core'),
                'placeholder' => esc_html__('write your author name here', 'gofly-core'),
                'label_block' => true,
            ]
        );

        $repeater->add_control(
            'gofly_testimonial_genaral_testimonial_author_designation',
            [
                'label'       => esc_html__('Author Designation', 'gofly-core'),
                'type'        => \Elementor\Controls_Manager::TEXT,
                'default'     => esc_html__('GoFly Traveler', 'gofly-core'),
                'placeholder' => esc_html__('write your author designation here', 'gofly-core'),
                'label_block' => true,
            ]
        );

        $repeater->add_control(
            'gofly_testimonial_genaral_testimonial_author_video_switcher',
            [
                'label'        => esc_html__("Author have video?", 'gofly-core'),
                'type'         => \Elementor\Controls_Manager::SWITCHER,
                'label_on'     => esc_html__('Yes', 'gofly-core'),
                'label_off'    => esc_html__('No', 'gofly-core'),
                'return_value' => 'yes',
                'default'      => 'no',
            ]
        );

        $repeater->add_control(
            'gofly_testimonial_genaral_testimonial_author_video_selector',
            [
                'label'   => esc_html__('Select Type', 'gofly-core'),
                'type'    => Controls_Manager::SELECT,
                'options' => [
                    'upload_video' => esc_html__('Upload Video', 'gofly-core'),
                    'video_link'   => esc_html__('Video Link/URL', 'gofly-core'),
                ],
                'default'   => 'video_link',
                'condition' => [
                    'gofly_testimonial_genaral_testimonial_author_video_switcher' => ['yes'],

                ]
            ]
        );

        $repeater->add_control(
            'gofly_testimonial_genaral_testimonial_author_video_upload',
            [
                'label'       => esc_html__('Choose Video File', 'gofly-core'),
                'type'        => \Elementor\Controls_Manager::MEDIA,
                'media_types' => ['video'],
                'condition'   => [
                    'gofly_testimonial_genaral_testimonial_author_video_selector' => ['upload_video'],
                    'gofly_testimonial_genaral_testimonial_author_video_switcher' => ['yes'],
                ]
            ]
        );


        $repeater->add_control(
            'gofly_testimonial_genaral_testimonial_author_video_link',
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
                    'gofly_testimonial_genaral_testimonial_author_video_selector' => ['video_link'],
                    'gofly_testimonial_genaral_testimonial_author_video_switcher' => ['yes'],
                ]
            ]
        );

        $repeater->add_control(
            'gofly_testimonial_genaral_testimonial_author_rating_switcher',
            [
                'label'        => esc_html__("Need Rating ?", 'gofly-core'),
                'type'         => \Elementor\Controls_Manager::SWITCHER,
                'label_on'     => esc_html__('Yes', 'gofly-core'),
                'label_off'    => esc_html__('No', 'gofly-core'),
                'return_value' => 'yes',
                'default'      => 'yes',
            ]
        );

        $repeater->add_control(
            'gofly_testimonial_genaral_testimonial_rating_style',
            [
                'label'   => esc_html__('Select Style', 'gofly-core'),
                'type'    => Controls_Manager::SELECT,
                'options' => [
                    'trustpilot'  => esc_html__('Trustpilot', 'gofly-core'),
                    'tripadvisor' => esc_html__('Tripadvisor', 'gofly-core'),
                ],
                'default'   => 'trustpilot',
                'condition' => [
                    'gofly_testimonial_genaral_testimonial_author_rating_switcher' => ['yes'],
                ]
            ]
        );

        $repeater->add_control(
            'gofly_testimonial_genaral_testimonial_review_rating',
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
                'condition' => [
                    'gofly_testimonial_genaral_testimonial_author_rating_switcher' => ['yes'],
                ]
            ]
        );

        $repeater->add_control(
            'gofly_testimonial_genaral_testimonial_content_title',
            [
                'label'       => esc_html__('Content Title', 'gofly-core'),
                'type'        => \Elementor\Controls_Manager::TEXT,
                'default'     => esc_html__('Average Experience', 'gofly-core'),
                'placeholder' => esc_html__('write your content title here', 'gofly-core'),
                'label_block' => true,
            ]
        );

        $repeater->add_control(
            'gofly_testimonial_genaral_testimonial_content_description',
            [
                'label'       => esc_html__('Content Description', 'gofly-core'),
                'type'        => \Elementor\Controls_Manager::TEXTAREA,
                'default'     => esc_html__('The tour was well-organized, and we enjoyed every bit of it. However, I wish we had more free time to explore on our own. Overall, a great experience!', 'gofly-core'),
                'placeholder' => esc_html__('write your content description here', 'gofly-core'),
                'label_block' => true,
            ]
        );


        $this->add_control(
            'gofly_testimonial_genaral_testimonial_list',
            [
                'label'   => esc_html__('Testimonial List', 'gofly-core'),
                'type'    => \Elementor\Controls_Manager::REPEATER,
                'fields'  => $repeater->get_controls(),
                'default' => [
                    [
                        'gofly_testimonial_genaral_testimonial_author_name' => esc_html('Robert Kcarery'),
                    ],
                    [
                        'gofly_testimonial_genaral_testimonial_author_name' => esc_html('Selina Henry'),
                    ],
                    [
                        'gofly_testimonial_genaral_testimonial_author_name' => esc_html('James Bonde'),
                    ],
                ],
                'title_field' => '{{{ gofly_testimonial_genaral_testimonial_author_name }}}',
                'condition'   => [
                    'gofly_testimonial_genaral_style_selection' => ['style_one'],
                ]
            ]
        );

        //#############style two testimonial###################//

        $this->add_control(
            'gofly_testimonial_genaral_style_five_testimonial_section_bg_image',
            [
                'label'   => esc_html__('Section Background Image', 'gofly-core'),
                'type'    => \Elementor\Controls_Manager::MEDIA,
                'default' => [
                    'url' => \Elementor\Utils::get_placeholder_image_src(),
                ],
                'condition' => [
                    'gofly_testimonial_genaral_style_selection' => ['style_five'],
                ]
            ]
        );


        $repeater = new \Elementor\Repeater();

        $repeater->add_control(
            'gofly_testimonial_genaral_style_two_testimonial_author_image',
            [
                'label'   => esc_html__('Author Image', 'gofly-core'),
                'type'    => \Elementor\Controls_Manager::MEDIA,
                'default' => [
                    'url' => \Elementor\Utils::get_placeholder_image_src(),
                ],
            ]
        );

        $repeater->add_control(
            'gofly_testimonial_genaral_style_two_testimonial_author_name',
            [
                'label'       => esc_html__('Author Name', 'gofly-core'),
                'type'        => \Elementor\Controls_Manager::TEXT,
                'default'     => esc_html__('Robert Kcarery', 'gofly-core'),
                'placeholder' => esc_html__('write your author name here', 'gofly-core'),
                'label_block' => true,
            ]
        );

        $repeater->add_control(
            'gofly_testimonial_genaral_style_two_testimonial_author_designation',
            [
                'label'       => esc_html__('Author Designation', 'gofly-core'),
                'type'        => \Elementor\Controls_Manager::TEXT,
                'default'     => esc_html__('GoFly Traveler', 'gofly-core'),
                'placeholder' => esc_html__('write your author designation here', 'gofly-core'),
                'label_block' => true,
            ]
        );

        $repeater->add_control(
            'gofly_testimonial_genaral_style_two_testimonial_author_rating_switcher',
            [
                'label'        => esc_html__("Need Rating ?", 'gofly-core'),
                'type'         => \Elementor\Controls_Manager::SWITCHER,
                'label_on'     => esc_html__('Yes', 'gofly-core'),
                'label_off'    => esc_html__('No', 'gofly-core'),
                'return_value' => 'yes',
                'default'      => 'yes',
            ]
        );

        $repeater->add_control(
            'gofly_testimonial_genaral_style_two_testimonial_rating_style',
            [
                'label'   => esc_html__('Select Style', 'gofly-core'),
                'type'    => Controls_Manager::SELECT,
                'options' => [
                    'trustpilot'  => esc_html__('Trustpilot', 'gofly-core'),
                    'tripadvisor' => esc_html__('Tripadvisor', 'gofly-core'),
                ],
                'default'   => 'trustpilot',
                'condition' => [
                    'gofly_testimonial_genaral_style_two_testimonial_author_rating_switcher' => ['yes'],
                ]
            ]
        );

        $repeater->add_control(
            'gofly_testimonial_genaral_style_two_testimonial_review_rating',
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
                'condition' => [
                    'gofly_testimonial_genaral_style_two_testimonial_author_rating_switcher' => ['yes'],
                ]
            ]
        );

        $repeater->add_control(
            'gofly_testimonial_genaral_style_two_testimonial_content_title',
            [
                'label'       => esc_html__('Content Title', 'gofly-core'),
                'type'        => \Elementor\Controls_Manager::TEXT,
                'default'     => esc_html__('Average Experience', 'gofly-core'),
                'placeholder' => esc_html__('write your content title here', 'gofly-core'),
                'label_block' => true,
            ]
        );

        $repeater->add_control(
            'gofly_testimonial_genaral_style_two_testimonial_content_description',
            [
                'label'       => esc_html__('Content Description', 'gofly-core'),
                'type'        => \Elementor\Controls_Manager::TEXTAREA,
                'default'     => esc_html__('The tour was well-organized, and we enjoyed every bit of it. However, I wish we had more free time to explore on our own. Overall, a great experience!', 'gofly-core'),
                'placeholder' => esc_html__('write your content description here', 'gofly-core'),
                'label_block' => true,
            ]
        );


        $this->add_control(
            'gofly_testimonial_genaral_style_two_testimonial_list',
            [
                'label'   => esc_html__('Testimonial List', 'gofly-core'),
                'type'    => \Elementor\Controls_Manager::REPEATER,
                'fields'  => $repeater->get_controls(),
                'default' => [
                    [
                        'gofly_testimonial_genaral_style_two_testimonial_author_name' => esc_html('Robert Kcarery'),
                    ],
                    [
                        'gofly_testimonial_genaral_style_two_testimonial_author_name' => esc_html('Selina Henry'),
                    ],
                    [
                        'gofly_testimonial_genaral_style_two_testimonial_author_name' => esc_html('James Bonde'),
                    ],
                ],
                'title_field' => '{{{ gofly_testimonial_genaral_style_two_testimonial_author_name }}}',
                'condition'   => [
                    'gofly_testimonial_genaral_style_selection' => ['style_two', 'style_three', 'style_four', 'style_five', 'style_six', 'style_eight'],
                ]
            ]
        );

        $this->add_control(
            'gofly_testimonial_style_eight_rating_point',
            [
                'label'       => esc_html__('Rating point', 'gofly-core'),
                'type'        => \Elementor\Controls_Manager::TEXT,
                'default'     => '4.5',
                'placeholder' => esc_html__('Type your rating point here', 'gofly-core'),
                'condition'   => [
                    'gofly_testimonial_genaral_style_selection' => 'style_eight',
                ],
            ]
        );
        $this->add_control(
            'gofly_testimonial_style_eight_rating_logo',
            [
                'label'       => esc_html__('Rating Platform', 'gofly-core'),
                'type'        => \Elementor\Controls_Manager::MEDIA,
                'media_types' => ['image', 'svg'],
                'default'     => [
                    'url' => \Elementor\Utils::get_placeholder_image_src(),
                ],
                'condition' => [
                    'gofly_testimonial_genaral_style_selection' => 'style_eight',
                ],
            ]
        );
        $this->add_control(
            'gofly_testimonial_style_eight_rating_link',
            [
                'label'       => esc_html__('Rating Platform link', 'gofly-core'),
                'type'        => \Elementor\Controls_Manager::TEXT,
                'default'     => '#',
                'placeholder' => esc_html__('Type your link here', 'gofly-core'),
                'condition'   => [
                    'gofly_testimonial_genaral_style_selection' => 'style_eight',
                ],
            ]
        );
        $this->add_control(
            'gofly_testimonial_genaral_style_eight_inner_bg',
            [
                'label'   => esc_html__('Inner BG Image', 'gofly-core'),
                'type'    => \Elementor\Controls_Manager::MEDIA,
                'default' => [
                    'url' => \Elementor\Utils::get_placeholder_image_src(),
                ],
                'condition'   => [
                    'gofly_testimonial_genaral_style_selection' => ['style_eight'],
                ]
            ]
        );


        //#############style seven testimonial###################//

        $repeater = new \Elementor\Repeater();

        $repeater->add_control(
            'gofly_testimonial_genaral_style_seven_testimonial_author_image',
            [
                'label'   => esc_html__('Author Image', 'gofly-core'),
                'type'    => \Elementor\Controls_Manager::MEDIA,
                'default' => [
                    'url' => \Elementor\Utils::get_placeholder_image_src(),
                ],
            ]
        );

        $repeater->add_control(
            'gofly_testimonial_genaral_style_seven_testimonial_author_name',
            [
                'label'       => esc_html__('Author Name', 'gofly-core'),
                'type'        => \Elementor\Controls_Manager::TEXT,
                'default'     => esc_html__('Robert Kcarery', 'gofly-core'),
                'placeholder' => esc_html__('write your author name here', 'gofly-core'),
                'label_block' => true,
            ]
        );

        $repeater->add_control(
            'gofly_testimonial_genaral_style_seven_testimonial_author_designation',
            [
                'label'       => esc_html__('Author Designation', 'gofly-core'),
                'type'        => \Elementor\Controls_Manager::TEXT,
                'default'     => esc_html__('GoFly Traveler', 'gofly-core'),
                'placeholder' => esc_html__('write your author designation here', 'gofly-core'),
                'label_block' => true,
            ]
        );

        $repeater->add_control(
            'gofly_testimonial_genaral_style_seven_testimonial_author_content_title',
            [
                'label'       => esc_html__('Content Title', 'gofly-core'),
                'type'        => \Elementor\Controls_Manager::TEXT,
                'default'     => esc_html__('Average Experience', 'gofly-core'),
                'placeholder' => esc_html__('write your content title here', 'gofly-core'),
                'label_block' => true,
            ]
        );

        $repeater->add_control(
            'gofly_testimonial_genaral_style_seven_testimonial_author_content_description',
            [
                'label'       => esc_html__('Content Description', 'gofly-core'),
                'type'        => \Elementor\Controls_Manager::TEXTAREA,
                'default'     => esc_html__('The tour was well-organized, and we enjoyed every bit of it. However, I wish we had more free time to explore on our own. Overall, a great experience!', 'gofly-core'),
                'placeholder' => esc_html__('write your content description here', 'gofly-core'),
                'label_block' => true,
            ]
        );


        $this->add_control(
            'gofly_testimonial_genaral_style_seven_testimonial_list',
            [
                'label'   => esc_html__('Testimonial List', 'gofly-core'),
                'type'    => \Elementor\Controls_Manager::REPEATER,
                'fields'  => $repeater->get_controls(),
                'default' => [
                    [
                        'gofly_testimonial_genaral_style_seven_testimonial_author_name' => esc_html('Robert Kcarery'),


                    ],
                    [
                        'gofly_testimonial_genaral_style_seven_testimonial_author_name' => esc_html('Selina Henry'),

                    ],
                    [
                        'gofly_testimonial_genaral_style_seven_testimonial_author_name' => esc_html('James Bonde'),

                    ],
                ],
                'title_field' => '{{{ gofly_testimonial_genaral_style_seven_testimonial_author_name }}}',
                'condition'   => [
                    'gofly_testimonial_genaral_style_selection' => ['style_seven'],
                ]
            ]
        );

        $this->add_control(
            'gofly_testimonial_genaral_testimonial_review_and_rating',
            [
                'label'     => esc_html__('Review And Rating', 'gofly-core'),
                'type'      => \Elementor\Controls_Manager::HEADING,
                'separator' => 'after',
                'condition' => [
                    'gofly_testimonial_genaral_style_selection' => ['style_one', 'style_two'],
                ]
            ]
        );

        $repeater = new \Elementor\Repeater();

        $repeater->add_control(
            'gofly_testimonial_genaral_testimonial_review_and_rating_style',
            [
                'label'   => esc_html__('Select Rating Style', 'gofly-core'),
                'type'    => Controls_Manager::SELECT,
                'options' => [
                    'trustpilot'  => esc_html__('Trustpilot', 'gofly-core'),
                    'tripadvisor' => esc_html__('Tripadvisor', 'gofly-core'),
                ],
                'default' => 'tripadvisor',
            ]
        );

        $repeater->add_control(
            'gofly_testimonial_genaral_testimonial_review_and_rating_logo',
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
            'gofly_testimonial_genaral_testimonial_review_and_rating_number',
            [
                'label'       => esc_html__('Rating Number', 'gofly-core'),
                'type'        => \Elementor\Controls_Manager::TEXT,
                'default'     => esc_html__('4.5', 'gofly-core'),
                'placeholder' => esc_html__('write your rating number here', 'gofly-core'),
                'label_block' => true,
                'condition'   => [
                    'gofly_testimonial_genaral_testimonial_review_and_rating_style' => ['trustpilot'],
                ]
            ]
        );

        $repeater->add_control(
            'gofly_testimonial_genaral_testimonial_review_and_rating_title',
            [
                'label'       => esc_html__('Title', 'gofly-core'),
                'type'        => \Elementor\Controls_Manager::TEXT,
                'default'     => esc_html__('Reviews', 'gofly-core'),
                'placeholder' => esc_html__('write your title here', 'gofly-core'),
                'label_block' => true,
            ]
        );

        $repeater->add_control(
            'gofly_testimonial_genaral_testimonial_review_and_rating_rating_image',
            [
                'label'       => esc_html__('Rating Image', 'gofly-core'),
                'type'        => \Elementor\Controls_Manager::MEDIA,
                'media_types' => ['svg', 'image'],
                'default'     => [
                    'url' => \Elementor\Utils::get_placeholder_image_src(),
                ],
            ]
        );

        $repeater->add_control(
            'gofly_testimonial_genaral_testimonial_review_and_rating_rating_url',
            [
                'label'   => esc_html__('Rating URL/Link', 'gofly-core'),
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

        $this->add_control(
            'gofly_testimonial_genaral_testimonial_review_and_rating_list',
            [
                'label'   => esc_html__('Review And Rating List', 'gofly-core'),
                'type'    => \Elementor\Controls_Manager::REPEATER,
                'fields'  => $repeater->get_controls(),
                'default' => [
                    [
                        'gofly_testimonial_genaral_testimonial_review_and_rating_style' => esc_html('trustpilot'),


                    ],
                    [
                        'gofly_testimonial_genaral_testimonial_review_and_rating_style' => esc_html('tripadvisor'),

                    ],
                ],
                'title_field' => '{{{ gofly_testimonial_genaral_testimonial_review_and_rating_style }}}',
                'condition'   => [
                    'gofly_testimonial_genaral_style_selection' => ['style_one'],
                ]
            ]
        );

        $this->add_control(
            'gofly_testimonial_genaral_style_two_testimonial_review_and_rating_tripadvisor_switcher',
            [
                'label'        => esc_html__("Hide Tripadvisor Section ?", 'gofly-core'),
                'type'         => \Elementor\Controls_Manager::SWITCHER,
                'label_on'     => esc_html__('Yes', 'gofly-core'),
                'label_off'    => esc_html__('No', 'gofly-core'),
                'return_value' => 'yes',
                'default'      => 'yes',
                'condition'    => [
                    'gofly_testimonial_genaral_style_selection' => ['style_two'],
                ]
            ]
        );

        $this->add_control(
            'gofly_testimonial_genaral_style_two_testimonial_review_and_rating_tripadvisor',
            [
                'label'     => esc_html__('Tripadvisor', 'gofly-core'),
                'type'      => \Elementor\Controls_Manager::HEADING,
                'separator' => 'after',
                'condition' => [
                    'gofly_testimonial_genaral_style_selection'                                              => ['style_two'],
                    'gofly_testimonial_genaral_style_two_testimonial_review_and_rating_tripadvisor_switcher' => ['yes'],
                ]
            ]
        );

        $this->add_control(
            'gofly_testimonial_genaral_style_two_testimonial_review_and_rating_logo',
            [
                'label'       => esc_html__('Logo', 'gofly-core'),
                'type'        => \Elementor\Controls_Manager::MEDIA,
                'media_types' => ['svg', 'image'],
                'default'     => [
                    'url' => \Elementor\Utils::get_placeholder_image_src(),
                ],
                'condition' => [
                    'gofly_testimonial_genaral_style_selection'                                              => ['style_two'],
                    'gofly_testimonial_genaral_style_two_testimonial_review_and_rating_tripadvisor_switcher' => ['yes'],
                ]
            ]
        );

        $this->add_control(
            'gofly_testimonial_genaral_style_two_testimonial_review_and_rating_number',
            [
                'label'       => esc_html__('Rating Number', 'gofly-core'),
                'type'        => \Elementor\Controls_Manager::TEXT,
                'default'     => esc_html__('4.5', 'gofly-core'),
                'placeholder' => esc_html__('write your rating number here', 'gofly-core'),
                'label_block' => true,
                'condition'   => [
                    'gofly_testimonial_genaral_style_selection'                                              => ['style_two'],
                    'gofly_testimonial_genaral_style_two_testimonial_review_and_rating_tripadvisor_switcher' => ['yes'],
                ]
            ]
        );

        $this->add_control(
            'gofly_testimonial_genaral_style_two_testimonial_review_and_rating_title',
            [
                'label'       => esc_html__('Title', 'gofly-core'),
                'type'        => \Elementor\Controls_Manager::TEXT,
                'default'     => esc_html__('Reviews', 'gofly-core'),
                'placeholder' => esc_html__('write your title here', 'gofly-core'),
                'label_block' => true,
                'condition'   => [
                    'gofly_testimonial_genaral_style_selection'                                              => ['style_two'],
                    'gofly_testimonial_genaral_style_two_testimonial_review_and_rating_tripadvisor_switcher' => ['yes'],
                ]
            ]
        );

        $this->add_control(
            'gofly_testimonial_genaral_style_two_testimonial_review_and_rating_rating_image',
            [
                'label'       => esc_html__('Rating Image', 'gofly-core'),
                'type'        => \Elementor\Controls_Manager::MEDIA,
                'media_types' => ['svg', 'image'],
                'default'     => [
                    'url' => \Elementor\Utils::get_placeholder_image_src(),
                ],
                'condition' => [
                    'gofly_testimonial_genaral_style_selection'                                              => ['style_two'],
                    'gofly_testimonial_genaral_style_two_testimonial_review_and_rating_tripadvisor_switcher' => ['yes'],
                ]
            ]
        );

        $this->add_control(
            'gofly_testimonial_genaral_style_two_testimonial_review_and_rating_rating_url',
            [
                'label'   => esc_html__('Rating URL/Link', 'gofly-core'),
                'type'    => \Elementor\Controls_Manager::URL,
                'options' => ['url', 'is_external', 'nofollow'],
                'default' => [
                    'url'         => '#',
                    'is_external' => true,
                    'nofollow'    => true,
                ],
                'label_block' => true,
                'condition'   => [
                    'gofly_testimonial_genaral_style_selection'                                              => ['style_two'],
                    'gofly_testimonial_genaral_style_two_testimonial_review_and_rating_tripadvisor_switcher' => ['yes'],
                ]
            ]
        );

        //trustpilot

        $this->add_control(
            'gofly_testimonial_genaral_style_two_testimonial_review_and_rating_trustpilot_switcher',
            [
                'label'        => esc_html__("Hide Trustpilot Section ?", 'gofly-core'),
                'type'         => \Elementor\Controls_Manager::SWITCHER,
                'label_on'     => esc_html__('Yes', 'gofly-core'),
                'label_off'    => esc_html__('No', 'gofly-core'),
                'return_value' => 'yes',
                'default'      => 'yes',
                'condition'    => [
                    'gofly_testimonial_genaral_style_selection' => ['style_two'],
                ]
            ]
        );

        $this->add_control(
            'gofly_testimonial_genaral_style_two_testimonial_review_and_rating_trustpilot',
            [
                'label'     => esc_html__('Trustpilot', 'gofly-core'),
                'type'      => \Elementor\Controls_Manager::HEADING,
                'separator' => 'after',
                'condition' => [
                    'gofly_testimonial_genaral_style_selection'                                             => ['style_two'],
                    'gofly_testimonial_genaral_style_two_testimonial_review_and_rating_trustpilot_switcher' => ['yes'],
                ]
            ]
        );

        $this->add_control(
            'gofly_testimonial_genaral_style_two_testimonial_review_and_rating_trustpilot_logo',
            [
                'label'       => esc_html__('Logo', 'gofly-core'),
                'type'        => \Elementor\Controls_Manager::MEDIA,
                'media_types' => ['svg', 'image'],
                'default'     => [
                    'url' => \Elementor\Utils::get_placeholder_image_src(),
                ],
                'condition' => [
                    'gofly_testimonial_genaral_style_selection'                                             => ['style_two'],
                    'gofly_testimonial_genaral_style_two_testimonial_review_and_rating_trustpilot_switcher' => ['yes'],
                ]
            ]
        );

        $this->add_control(
            'gofly_testimonial_genaral_style_two_testimonial_review_and_rating_trustpilot_rating_number',
            [
                'label'       => esc_html__('Rating Number', 'gofly-core'),
                'type'        => \Elementor\Controls_Manager::TEXT,
                'default'     => esc_html__('4.5', 'gofly-core'),
                'placeholder' => esc_html__('write your rating number here', 'gofly-core'),
                'label_block' => true,
                'condition'   => [
                    'gofly_testimonial_genaral_style_selection'                                             => ['style_two'],
                    'gofly_testimonial_genaral_style_two_testimonial_review_and_rating_trustpilot_switcher' => ['yes'],
                ]
            ]
        );

        $this->add_control(
            'gofly_testimonial_genaral_style_two_testimonial_review_and_rating_trustpilot_title',
            [
                'label'       => esc_html__('Title', 'gofly-core'),
                'type'        => \Elementor\Controls_Manager::TEXT,
                'default'     => esc_html__('Reviews', 'gofly-core'),
                'placeholder' => esc_html__('write your title here', 'gofly-core'),
                'label_block' => true,
                'condition'   => [
                    'gofly_testimonial_genaral_style_selection'                                             => ['style_two'],
                    'gofly_testimonial_genaral_style_two_testimonial_review_and_rating_trustpilot_switcher' => ['yes'],
                ]
            ]
        );

        $this->add_control(
            'gofly_testimonial_genaral_style_two_testimonial_review_and_rating_trustpilot_rating_image',
            [
                'label'       => esc_html__('Rating Image', 'gofly-core'),
                'type'        => \Elementor\Controls_Manager::MEDIA,
                'media_types' => ['svg', 'image'],
                'default'     => [
                    'url' => \Elementor\Utils::get_placeholder_image_src(),
                ],
                'condition' => [
                    'gofly_testimonial_genaral_style_selection'                                             => ['style_two'],
                    'gofly_testimonial_genaral_style_two_testimonial_review_and_rating_trustpilot_switcher' => ['yes'],
                ]
            ]
        );

        $this->add_control(
            'gofly_testimonial_genaral_style_two_testimonial_review_and_rating_trustpilot_rating_url',
            [
                'label'   => esc_html__('Rating URL/Link', 'gofly-core'),
                'type'    => \Elementor\Controls_Manager::URL,
                'options' => ['url', 'is_external', 'nofollow'],
                'default' => [
                    'url'         => '#',
                    'is_external' => true,
                    'nofollow'    => true,
                ],
                'label_block' => true,
                'condition'   => [
                    'gofly_testimonial_genaral_style_selection'                                             => ['style_two'],
                    'gofly_testimonial_genaral_style_two_testimonial_review_and_rating_trustpilot_switcher' => ['yes'],
                ]
            ]
        );

        //testimonial image area

        $this->add_control(
            'gofly_testimonial_genaral_style_three_testimonial_image_area_switcher',
            [
                'label'        => esc_html__("Show Testimonial Image Area?", 'gofly-core'),
                'type'         => \Elementor\Controls_Manager::SWITCHER,
                'label_on'     => esc_html__('Yes', 'gofly-core'),
                'label_off'    => esc_html__('No', 'gofly-core'),
                'return_value' => 'yes',
                'default'      => 'yes',
                'condition'    => [
                    'gofly_testimonial_genaral_style_selection' => ['style_three'],
                ]
            ]
        );

        $this->add_control(
            'gofly_testimonial_genaral_style_three_testimonial_image_area',
            [
                'label'     => esc_html__('Testimonial Image Area', 'gofly-core'),
                'type'      => \Elementor\Controls_Manager::HEADING,
                'separator' => 'after',
                'condition' => [
                    'gofly_testimonial_genaral_style_selection'                             => ['style_three'],
                    'gofly_testimonial_genaral_style_three_testimonial_image_area_switcher' => ['yes'],
                ]
            ]
        );

        $this->add_control(
            'gofly_testimonial_genaral_style_three_testimonial_image_area_author_gallery',
            [
                'label'      => esc_html__('Add Images', 'gofly-core'),
                'type'       => \Elementor\Controls_Manager::GALLERY,
                'show_label' => false,
                'default'    => [],
                'condition'  => [
                    'gofly_testimonial_genaral_style_selection'                             => ['style_three'],
                    'gofly_testimonial_genaral_style_three_testimonial_image_area_switcher' => ['yes'],
                ]
            ]
        );

        //counter image area

        $this->add_control(
            'gofly_testimonial_genaral_style_three_testimonial_counter_area_switcher',
            [
                'label'        => esc_html__("Show Testimonial Counter Area?", 'gofly-core'),
                'type'         => \Elementor\Controls_Manager::SWITCHER,
                'label_on'     => esc_html__('Yes', 'gofly-core'),
                'label_off'    => esc_html__('No', 'gofly-core'),
                'return_value' => 'yes',
                'default'      => 'yes',
                'condition'    => [
                    'gofly_testimonial_genaral_style_selection' => ['style_three'],
                ]
            ]
        );

        $this->add_control(
            'gofly_testimonial_genaral_style_three_testimonial_counter_area',
            [
                'label'     => esc_html__('Counter Area', 'gofly-core'),
                'type'      => \Elementor\Controls_Manager::HEADING,
                'separator' => 'after',
                'condition' => [
                    'gofly_testimonial_genaral_style_selection'                               => ['style_three'],
                    'gofly_testimonial_genaral_style_three_testimonial_counter_area_switcher' => ['yes'],
                ]
            ]
        );

        $this->add_control(
            'gofly_testimonial_genaral_style_three_testimonial_image_area_counter_image_gallery',
            [
                'label'      => esc_html__('Add Counter Group Images', 'gofly-core'),
                'type'       => \Elementor\Controls_Manager::GALLERY,
                'show_label' => false,
                'default'    => [],
                'condition'  => [
                    'gofly_testimonial_genaral_style_selection'                               => ['style_three'],
                    'gofly_testimonial_genaral_style_three_testimonial_counter_area_switcher' => ['yes'],
                ]
            ]
        );

        $this->add_control(
            'gofly_testimonial_genaral_style_three_testimonial_image_area_counter_number',
            [
                'label'       => esc_html__('Counter Number', 'gofly-core'),
                'type'        => \Elementor\Controls_Manager::TEXT,
                'default'     => esc_html__('4', 'gofly-core'),
                'placeholder' => esc_html__('write your counter number here', 'gofly-core'),
                'label_block' => true,
                'condition'   => [
                    'gofly_testimonial_genaral_style_selection'                               => ['style_three'],
                    'gofly_testimonial_genaral_style_three_testimonial_counter_area_switcher' => ['yes'],
                ]
            ]
        );


        $this->add_control(
            'gofly_testimonial_genaral_style_three_testimonial_image_area_counter_sign',
            [
                'label'       => esc_html__('Counter Sign', 'gofly-core'),
                'type'        => \Elementor\Controls_Manager::TEXT,
                'default'     => esc_html__('k+', 'gofly-core'),
                'placeholder' => esc_html__('write your counter sign here', 'gofly-core'),
                'label_block' => true,
                'condition'   => [
                    'gofly_testimonial_genaral_style_selection'                               => ['style_three'],
                    'gofly_testimonial_genaral_style_three_testimonial_counter_area_switcher' => ['yes'],
                ]
            ]
        );

        $this->add_control(
            'gofly_testimonial_genaral_style_three_testimonial_image_area_counter_title',
            [
                'label'       => esc_html__('Counter Title', 'gofly-core'),
                'type'        => \Elementor\Controls_Manager::TEXT,
                'default'     => esc_html__('Customer in Worldwide.', 'gofly-core'),
                'placeholder' => esc_html__('write your counter title here', 'gofly-core'),
                'label_block' => true,
                'condition'   => [
                    'gofly_testimonial_genaral_style_selection'                               => ['style_three'],
                    'gofly_testimonial_genaral_style_three_testimonial_counter_area_switcher' => ['yes'],
                ]
            ]
        );

        $this->add_control(
            'gofly_testimonial_genaral_style_four_testimonial_vector_image',
            [
                'label'       => esc_html__('Vector Image', 'gofly-core'),
                'type'        => \Elementor\Controls_Manager::MEDIA,
                'media_types' => ['svg', 'image'],
                'condition'   => [
                    'gofly_testimonial_genaral_style_selection' => ['style_four', 'style_five', 'style_seven'],
                ]
            ]
        );

        $this->add_control(
            'gofly_testimonial_genaral_style_four_testimonial_vector_image_two',
            [
                'label'       => esc_html__('Vector Image Two', 'gofly-core'),
                'type'        => \Elementor\Controls_Manager::MEDIA,
                'media_types' => ['svg', 'image'],
                'condition'   => [
                    'gofly_testimonial_genaral_style_selection' => ['style_seven'],
                ]
            ]
        );

        $this->end_controls_section();


        //=====================Style One Start=======================//

        $this->start_controls_section(
            'gofly_testimonial_style_one_genaral',
            [
                'label'     => esc_html__('Styles', 'gofly-core'),
                'tab'       => Controls_Manager::TAB_STYLE,
                'condition' => [
                    'gofly_testimonial_genaral_style_selection' => ['style_one'],
                ]
            ]
        );

        $this->add_control(
            'gofly_testimonial_style_one_genaral_title',
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
                'name'     => 'gofly_testimonial_style_one_genaral_title_typ',
                'selector' => '{{WRAPPER}} .section-title h2',

            ]
        );

        $this->add_control(
            'gofly_testimonial_style_one_genaral_title_color',
            [
                'label'     => esc_html__('Color', 'gofly-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .section-title h2' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'gofly_testimonial_style_one_genaral_description',
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
                'name'     => 'gofly_testimonial_style_one_genaral_description_typ',
                'selector' => '{{WRAPPER}} .section-title p',

            ]
        );

        $this->add_control(
            'gofly_testimonial_style_one_genaral_description_color',
            [
                'label'     => esc_html__('Color', 'gofly-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .section-title p' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'gofly_testimonial_style_one_genaral_testimonial_section',
            [
                'label'     => esc_html__('Testimonial Section', 'gofly-core'),
                'type'      => \Elementor\Controls_Manager::HEADING,
                'separator' => 'before',
            ]
        );

        $this->add_control(
            'gofly_testimonial_style_one_genaral_testimonial_section_bg_color',
            [
                'label'     => esc_html__('Background Color', 'gofly-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .testimonial-card' => 'background-color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'gofly_testimonial_style_one_genaral_content_rating_icon',
            [
                'label'     => esc_html__('Rating Icon (Trustpilot)', 'gofly-core'),
                'type'      => \Elementor\Controls_Manager::HEADING,
                'separator' => 'after',
            ]
        );

        $this->add_control(
            'gofly_testimonial_style_one_genaral_content_rating_icon_color',
            [
                'label'     => esc_html__('Color', 'gofly-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .testimonial-card .rating-area.trustpilot li svg' => 'fill: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'gofly_testimonial_style_one_genaral_content_rating_icon_bg_color',
            [
                'label'     => esc_html__('Background Color', 'gofly-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .testimonial-card .rating-area.trustpilot li' => 'background-color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'gofly_testimonial_style_one_genaral_content_rating_icon_tripadvisor',
            [
                'label'     => esc_html__('Rating Icon (Tripadvisor)', 'gofly-core'),
                'type'      => \Elementor\Controls_Manager::HEADING,
                'separator' => 'after',
            ]
        );

        $this->add_control(
            'gofly_testimonial_style_one_genaral_content_rating_icon_tripadvisor_color',
            [
                'label'     => esc_html__('Color', 'gofly-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .testimonial-card .rating-area li i' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'gofly_testimonial_style_one_genaral_author_name',
            [
                'label'     => esc_html__('Author Name', 'gofly-core'),
                'type'      => \Elementor\Controls_Manager::HEADING,
                'separator' => 'after',
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'label'    => esc_html__('Typography', 'gofly-core'),
                'name'     => 'gofly_testimonial_style_one_genaral_author_name_typ',
                'selector' => '{{WRAPPER}} .testimonial-card .author-area .author-info h5',

            ]
        );

        $this->add_control(
            'gofly_testimonial_style_one_genaral_author_name_color',
            [
                'label'     => esc_html__('Color', 'gofly-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .testimonial-card .author-area .author-info h5' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'gofly_testimonial_style_one_genaral_author_designation',
            [
                'label'     => esc_html__('Author Designation', 'gofly-core'),
                'type'      => \Elementor\Controls_Manager::HEADING,
                'separator' => 'after',
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'label'    => esc_html__('Typography', 'gofly-core'),
                'name'     => 'gofly_testimonial_style_one_genaral_author_designation_typ',
                'selector' => '{{WRAPPER}} .testimonial-card .author-area .author-info span',

            ]
        );

        $this->add_control(
            'gofly_testimonial_style_one_genaral_author_designation_color',
            [
                'label'     => esc_html__('Color', 'gofly-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .testimonial-card .author-area .author-info span' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'gofly_testimonial_style_one_genaral_descriptionn_title',
            [
                'label'     => esc_html__('Description Title', 'gofly-core'),
                'type'      => \Elementor\Controls_Manager::HEADING,
                'separator' => 'after',
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'label'    => esc_html__('Typography', 'gofly-core'),
                'name'     => 'gofly_testimonial_style_one_genaral_descriptionn_title_typ',
                'selector' => '{{WRAPPER}} .testimonial-card h5',

            ]
        );

        $this->add_control(
            'gofly_testimonial_style_one_genaral_descriptionn_title_color',
            [
                'label'     => esc_html__('Color', 'gofly-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .testimonial-card h5' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'gofly_testimonial_style_one_genaral_content_description',
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
                'name'     => 'gofly_testimonial_style_one_genaral_content_description_typ',
                'selector' => '{{WRAPPER}} .testimonial-card p',

            ]
        );

        $this->add_control(
            'gofly_testimonial_style_one_genaral_content_description_color',
            [
                'label'     => esc_html__('Color', 'gofly-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .testimonial-card p' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'gofly_testimonial_style_one_genaral_content_rating_area',
            [
                'label'     => esc_html__('Rating Area', 'gofly-core'),
                'type'      => \Elementor\Controls_Manager::HEADING,
                'separator' => 'before',
            ]
        );

        $this->add_control(
            'gofly_testimonial_style_one_genaral_content_rating_area_title',
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
                'name'     => 'gofly_testimonial_style_one_genaral_content_rating_area_title_typ',
                'selector' => '{{WRAPPER}} .home1-testimonial-section .review-wrap .tripadvisor-rating-area .tripadvisor-rating .rating-area span',

            ]
        );

        $this->add_control(
            'gofly_testimonial_style_one_genaral_content_rating_area_title_color',
            [
                'label'     => esc_html__('Color', 'gofly-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .home1-testimonial-section .review-wrap .tripadvisor-rating-area .tripadvisor-rating .rating-area span' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'gofly_testimonial_style_one_genaral_content_rating_area_title_two',
            [
                'label'     => esc_html__('Title Two', 'gofly-core'),
                'type'      => \Elementor\Controls_Manager::HEADING,
                'separator' => 'after',
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'label'    => esc_html__('Typography', 'gofly-core'),
                'name'     => 'gofly_testimonial_style_one_genaral_content_rating_area_title_two_typ',
                'selector' => '{{WRAPPER}} .home1-testimonial-section .review-wrap .trustpilot-rating-area .trustpilot-rating .rating-area span',

            ]
        );

        $this->add_control(
            'gofly_testimonial_style_one_genaral_content_rating_area_title_two_color',
            [
                'label'     => esc_html__('Color', 'gofly-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .home1-testimonial-section .review-wrap .trustpilot-rating-area .trustpilot-rating .rating-area span' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'gofly_testimonial_style_one_genaral_content_rating_area_rating_text',
            [
                'label'     => esc_html__('Rating Text', 'gofly-core'),
                'type'      => \Elementor\Controls_Manager::HEADING,
                'separator' => 'after',
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'label'    => esc_html__('Typography', 'gofly-core'),
                'name'     => 'gofly_testimonial_style_one_genaral_content_rating_area_rating_text_typ',
                'selector' => '{{WRAPPER}} .home1-testimonial-section .review-wrap .trustpilot-rating-area strong',

            ]
        );

        $this->add_control(
            'gofly_testimonial_style_one_genaral_content_rating_area_rating_text_color',
            [
                'label'     => esc_html__('Color', 'gofly-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .home1-testimonial-section .review-wrap .trustpilot-rating-area strong' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'gofly_testimonial_style_one_genaral_content_rating_area_rating_divider',
            [
                'label'     => esc_html__('Divider', 'gofly-core'),
                'type'      => \Elementor\Controls_Manager::HEADING,
                'separator' => 'after',
            ]
        );

        $this->add_control(
            'gofly_testimonial_style_one_genaral_content_rating_area_rating_divider_color',
            [
                'label'     => esc_html__('Color', 'gofly-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .home1-testimonial-section .review-wrap .tripadvisor-rating-area .divider' => 'fill: {{VALUE}};',
                ],
            ]
        );

        $this->end_controls_section();

        //=====================Style Two Start=======================//

        $this->start_controls_section(
            'gofly_testimonial_style_two_genaral',
            [
                'label'     => esc_html__('Styles', 'gofly-core'),
                'tab'       => Controls_Manager::TAB_STYLE,
                'condition' => [
                    'gofly_testimonial_genaral_style_selection' => ['style_two'],
                ]
            ]
        );

        $this->add_control(
            'gofly_testimonial_style_two_genaral_title',
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
                'name'     => 'gofly_testimonial_style_two_genaral_title_typ',
                'selector' => '{{WRAPPER}} .section-title h2',

            ]
        );

        $this->add_control(
            'gofly_testimonial_style_two_genaral_title_color',
            [
                'label'     => esc_html__('Color', 'gofly-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .section-title h2' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'gofly_testimonial_style_two_genaral_subtitle',
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
                'name'     => 'gofly_testimonial_style_two_genaral_subtitle_typ',
                'selector' => '{{WRAPPER}} .section-title p',

            ]
        );

        $this->add_control(
            'gofly_testimonial_style_two_genaral_subtitle_color',
            [
                'label'     => esc_html__('Color', 'gofly-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .section-title p' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'gofly_testimonial_style_two_genaral_testimonial_section',
            [
                'label'     => esc_html__('Testimonial Section', 'gofly-core'),
                'type'      => \Elementor\Controls_Manager::HEADING,
                'separator' => 'before',
            ]
        );

        $this->add_control(
            'gofly_testimonial_style_two_genaral_testimonial_section_bg_color',
            [
                'label'     => esc_html__('Background Color', 'gofly-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .testimonial-card' => 'background-color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'gofly_testimonial_style_two_genaral_testimonial_section_description_title',
            [
                'label'     => esc_html__('Description Title', 'gofly-core'),
                'type'      => \Elementor\Controls_Manager::HEADING,
                'separator' => 'after',
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'label'    => esc_html__('Typography', 'gofly-core'),
                'name'     => 'gofly_testimonial_style_two_genaral_testimonial_section_description_title_typ',
                'selector' => '{{WRAPPER}} .testimonial-card h5',

            ]
        );

        $this->add_control(
            'gofly_testimonial_style_two_genaral_testimonial_section_description_title_color',
            [
                'label'     => esc_html__('Color', 'gofly-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .testimonial-card h5' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'gofly_testimonial_style_two_genaral_testimonial_section_description',
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
                'name'     => 'gofly_testimonial_style_two_genaral_testimonial_section_description_typ',
                'selector' => '{{WRAPPER}} .testimonial-card p',

            ]
        );

        $this->add_control(
            'gofly_testimonial_style_two_genaral_testimonial_section_description_color',
            [
                'label'     => esc_html__('Color', 'gofly-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .testimonial-card p' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'gofly_testimonial_style_two_genaral_testimonial_section_author_name',
            [
                'label'     => esc_html__('Author Name', 'gofly-core'),
                'type'      => \Elementor\Controls_Manager::HEADING,
                'separator' => 'after',
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'label'    => esc_html__('Typography', 'gofly-core'),
                'name'     => 'gofly_testimonial_style_two_genaral_testimonial_section_author_name_typ',
                'selector' => '{{WRAPPER}} .testimonial-card .author-area .author-info h5',

            ]
        );

        $this->add_control(
            'gofly_testimonial_style_two_genaral_testimonial_section_author_name_color',
            [
                'label'     => esc_html__('Color', 'gofly-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .testimonial-card .author-area .author-info h5' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'gofly_testimonial_style_two_genaral_testimonial_section_author_designation',
            [
                'label'     => esc_html__('Author Designation', 'gofly-core'),
                'type'      => \Elementor\Controls_Manager::HEADING,
                'separator' => 'after',
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'label'    => esc_html__('Typography', 'gofly-core'),
                'name'     => 'gofly_testimonial_style_two_genaral_testimonial_section_author_designation_typ',
                'selector' => '{{WRAPPER}} .testimonial-card .author-area .author-info span',

            ]
        );

        $this->add_control(
            'gofly_testimonial_style_two_genaral_testimonial_section_author_designation_color',
            [
                'label'     => esc_html__('Color', 'gofly-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .testimonial-card .author-area .author-info span' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'gofly_testimonial_style_two_genaral_testimonial_section_rating_area',
            [
                'label'     => esc_html__('Rating Area', 'gofly-core'),
                'type'      => \Elementor\Controls_Manager::HEADING,
                'separator' => 'before',
            ]
        );

        $this->add_control(
            'gofly_testimonial_style_two_genaral_testimonial_section_rating_area_rating_count',
            [
                'label'     => esc_html__('Rating Text', 'gofly-core'),
                'type'      => \Elementor\Controls_Manager::HEADING,
                'separator' => 'after',
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'label'    => esc_html__('Typography', 'gofly-core'),
                'name'     => 'gofly_testimonial_style_two_genaral_testimonial_section_rating_area_rating_count_typ',
                'selector' => '{{WRAPPER}}.home2-testimonial-section .review-and-slider-btn .single-rating strong',

            ]
        );

        $this->add_control(
            'gofly_testimonial_style_two_genaral_testimonial_section_rating_area_rating_count_color',
            [
                'label'     => esc_html__('Color', 'gofly-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .home2-testimonial-section .review-and-slider-btn .single-rating strong' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'gofly_testimonial_style_two_genaral_testimonial_section_rating_area_rating_title',
            [
                'label'     => esc_html__('Rating Title', 'gofly-core'),
                'type'      => \Elementor\Controls_Manager::HEADING,
                'separator' => 'after',
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'label'    => esc_html__('Typography', 'gofly-core'),
                'name'     => 'gofly_testimonial_style_two_genaral_testimonial_section_rating_area_rating_title_typ',
                'selector' => '{{WRAPPER}} .home2-testimonial-section .review-and-slider-btn .single-rating .trustpilot-rating .rating-area span',

            ]
        );

        $this->add_control(
            'gofly_testimonial_style_two_genaral_testimonial_section_rating_area_rating_title_color',
            [
                'label'     => esc_html__('Color', 'gofly-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .home2-testimonial-section .review-and-slider-btn .single-rating .trustpilot-rating .rating-area span' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'gofly_testimonial_style_two_genaral_testimonial_section_rating_area_rating_title_two',
            [
                'label'     => esc_html__('Rating Title Two', 'gofly-core'),
                'type'      => \Elementor\Controls_Manager::HEADING,
                'separator' => 'after',
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'label'    => esc_html__('Typography', 'gofly-core'),
                'name'     => 'gofly_testimonial_style_two_genaral_testimonial_section_rating_area_rating_title_two_typ',
                'selector' => '{{WRAPPER}} .home2-testimonial-section .review-and-slider-btn .single-rating .tripadvisor-rating .rating-area span',

            ]
        );

        $this->add_control(
            'gofly_testimonial_style_two_genaral_testimonial_section_rating_area_rating_title_two_color',
            [
                'label'     => esc_html__('Color', 'gofly-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .home2-testimonial-section .review-and-slider-btn .single-rating .tripadvisor-rating .rating-area span' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'gofly_testimonial_style_two_genaral_testimonial_section_rating_area_rating_pagination',
            [
                'label'     => esc_html__('Pagination', 'gofly-core'),
                'type'      => \Elementor\Controls_Manager::HEADING,
                'separator' => 'after',
            ]
        );

        $this->add_control(
            'gofly_testimonial_style_two_genaral_testimonial_section_rating_area_rating_pagination_color',
            [
                'label'     => esc_html__('Color', 'gofly-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .slider-btn-grp .slider-btn svg' => 'stroke: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'gofly_testimonial_style_two_genaral_testimonial_section_rating_area_rating_pagination_hover_color',
            [
                'label'     => esc_html__('Hover Color', 'gofly-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .slider-btn-grp .slider-btn:hover svg' => 'stroke: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'gofly_testimonial_style_two_genaral_testimonial_section_rating_area_rating_pagination_background_color',
            [
                'label'     => esc_html__('Background Color', 'gofly-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .home2-testimonial-section .review-and-slider-btn .slider-btn-grp .slider-btn' => 'background-color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'gofly_testimonial_style_two_genaral_testimonial_section_rating_area_rating_pagination_background_hover_color',
            [
                'label'     => esc_html__('Hover Background Color', 'gofly-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .home2-testimonial-section .review-and-slider-btn .slider-btn-grp .slider-btn:hover' => 'background-color: {{VALUE}};',
                ],
            ]
        );

        $this->end_controls_section();

        //=====================Style Three Start=======================//

        $this->start_controls_section(
            'gofly_testimonial_style_three_genaral',
            [
                'label'     => esc_html__('Styles', 'gofly-core'),
                'tab'       => Controls_Manager::TAB_STYLE,
                'condition' => [
                    'gofly_testimonial_genaral_style_selection' => ['style_three'],
                ]
            ]
        );

        $this->add_control(
            'gofly_testimonial_style_three_genaral_title',
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
                'name'     => 'gofly_testimonial_style_three_genaral_title_typ',
                'selector' => '{{WRAPPER}} .section-title h2',

            ]
        );

        $this->add_control(
            'gofly_testimonial_style_three_genaral_title_color',
            [
                'label'     => esc_html__('Color', 'gofly-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .section-title h2' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'gofly_testimonial_style_three_genaral_description',
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
                'name'     => 'gofly_testimonial_style_three_genaral_description_typ',
                'selector' => '{{WRAPPER}} .section-title p',

            ]
        );

        $this->add_control(
            'gofly_testimonial_style_three_genaral_description_color',
            [
                'label'     => esc_html__('Color', 'gofly-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .section-title p' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'gofly_testimonial_style_three_genaral_testimonial_area',
            [
                'label'     => esc_html__('Testimonial', 'gofly-core'),
                'type'      => \Elementor\Controls_Manager::HEADING,
                'separator' => 'before',
            ]
        );

        $this->add_control(
            'gofly_testimonial_style_three_genaral_testimonial_area_description_title',
            [
                'label'     => esc_html__('Description Title', 'gofly-core'),
                'type'      => \Elementor\Controls_Manager::HEADING,
                'separator' => 'after',
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'label'    => esc_html__('Typography', 'gofly-core'),
                'name'     => 'gofly_testimonial_style_three_genaral_testimonial_area_description_title_typ',
                'selector' => '{{WRAPPER}} .testimonial-card h5',

            ]
        );

        $this->add_control(
            'gofly_testimonial_style_three_genaral_testimonial_area_description_title_color',
            [
                'label'     => esc_html__('Color', 'gofly-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .testimonial-card h5' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'gofly_testimonial_style_three_genaral_testimonial_area_description',
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
                'name'     => 'gofly_testimonial_style_three_genaral_testimonial_area_description_typ',
                'selector' => '{{WRAPPER}} .testimonial-card p',

            ]
        );

        $this->add_control(
            'gofly_testimonial_style_three_genaral_testimonial_area_description_color',
            [
                'label'     => esc_html__('Color', 'gofly-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .testimonial-card p' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'gofly_testimonial_style_three_genaral_testimonial_area_author_name',
            [
                'label'     => esc_html__('Author Name', 'gofly-core'),
                'type'      => \Elementor\Controls_Manager::HEADING,
                'separator' => 'after',
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'label'    => esc_html__('Typography', 'gofly-core'),
                'name'     => 'gofly_testimonial_style_three_genaral_testimonial_area_author_name_typ',
                'selector' => '{{WRAPPER}} .testimonial-card .author-area .author-info h5',

            ]
        );

        $this->add_control(
            'gofly_testimonial_style_three_genaral_testimonial_area_author_name_color',
            [
                'label'     => esc_html__('Color', 'gofly-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .testimonial-card .author-area .author-info h5' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'gofly_testimonial_style_three_genaral_testimonial_area_author_designation',
            [
                'label'     => esc_html__('Author Designation', 'gofly-core'),
                'type'      => \Elementor\Controls_Manager::HEADING,
                'separator' => 'after',
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'label'    => esc_html__('Typography', 'gofly-core'),
                'name'     => 'gofly_testimonial_style_three_genaral_testimonial_area_author_designation_typ',
                'selector' => '{{WRAPPER}} .testimonial-card .author-area .author-info span',

            ]
        );

        $this->add_control(
            'gofly_testimonial_style_three_genaral_testimonial_area_author_designation_color',
            [
                'label'     => esc_html__('Color', 'gofly-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .testimonial-card .author-area .author-info span' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'gofly_testimonial_style_three_genaral_testimonial_pagination',
            [
                'label'     => esc_html__('Pagination', 'gofly-core'),
                'type'      => \Elementor\Controls_Manager::HEADING,
                'separator' => 'after',
            ]
        );

        $this->add_control(
            'gofly_testimonial_style_three_genaral_testimonial_pagination_color',
            [
                'label'     => esc_html__('Color', 'gofly-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .slider-btn-grp .slider-btn svg' => 'stroke: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'gofly_testimonial_style_three_genaral_testimonial_pagination_hover_color',
            [
                'label'     => esc_html__('Hover Color', 'gofly-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .slider-btn-grp .slider-btn:hover svg' => 'stroke: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'gofly_testimonial_style_three_genaral_testimonial_pagination_border_color',
            [
                'label'     => esc_html__('Border Color', 'gofly-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .home3-testimonial-section .testimonial-content .testimonial-slider-area .slider-btn-grp .slider-btn' => 'border-color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'gofly_testimonial_style_three_genaral_testimonial_pagination_background_color',
            [
                'label'     => esc_html__('Background Color', 'gofly-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .slider-btn-grp .slider-btn' => 'background-color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'gofly_testimonial_style_three_genaral_testimonial_pagination_background_hover_color',
            [
                'label'     => esc_html__('Hover Background Color', 'gofly-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .slider-btn-grp .slider-btn:hover' => 'background-color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'gofly_testimonial_style_three_genaral_testimonial_image_group',
            [
                'label'     => esc_html__('Image Group Section', 'gofly-core'),
                'type'      => \Elementor\Controls_Manager::HEADING,
                'separator' => 'before',
            ]
        );

        $this->add_control(
            'gofly_testimonial_style_three_genaral_testimonial_image_group_border_one',
            [
                'label'     => esc_html__('Border One', 'gofly-core'),
                'type'      => \Elementor\Controls_Manager::HEADING,
                'separator' => 'after',
            ]
        );

        $this->add_control(
            'gofly_testimonial_style_three_genaral_testimonial_image_group_border_one_color',
            [
                'label'     => esc_html__('Color', 'gofly-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .home3-testimonial-section .testimonial-img-area .testimonial-img-grp::before' => 'border: 1px solid {{VALUE}};',
                ],
            ]
        );


        $this->add_control(
            'gofly_testimonial_style_three_genaral_testimonial_image_group_border_two',
            [
                'label'     => esc_html__('Border Two', 'gofly-core'),
                'type'      => \Elementor\Controls_Manager::HEADING,
                'separator' => 'after',
            ]
        );

        $this->add_control(
            'gofly_testimonial_style_three_genaral_testimonial_image_group_border_two_color',
            [
                'label'     => esc_html__('Color', 'gofly-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .home3-testimonial-section .testimonial-img-area .testimonial-img-grp' => 'border: 1px solid {{VALUE}};',
                ],
            ]
        );


        $this->add_control(
            'gofly_testimonial_style_three_genaral_testimonial_area_counter_text',
            [
                'label'     => esc_html__('Counter Text', 'gofly-core'),
                'type'      => \Elementor\Controls_Manager::HEADING,
                'separator' => 'after',
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'label'    => esc_html__('Typography', 'gofly-core'),
                'name'     => 'gofly_testimonial_style_three_genaral_testimonial_area_counter_text_typ',
                'selector' => '{{WRAPPER}} .home3-testimonial-section .testimonial-img-area .testimonial-img-grp .counter-area h6',

            ]
        );

        $this->add_control(
            'gofly_testimonial_style_three_genaral_testimonial_area_counter_text_color',
            [
                'label'     => esc_html__('Color', 'gofly-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .home3-testimonial-section .testimonial-img-area .testimonial-img-grp .counter-area h6' => 'color: {{VALUE}};',
                ],
            ]
        );


        $this->end_controls_section();


        //=====================Style Four Start=======================//

        $this->start_controls_section(
            'gofly_testimonial_style_four_genaral',
            [
                'label'     => esc_html__('Styles', 'gofly-core'),
                'tab'       => Controls_Manager::TAB_STYLE,
                'condition' => [
                    'gofly_testimonial_genaral_style_selection' => ['style_four'],
                ]
            ]
        );

        $this->add_control(
            'gofly_testimonial_style_four_genaral_title',
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
                'name'     => 'gofly_testimonial_style_four_genaral_title_typ',
                'selector' => '{{WRAPPER}} .section-title h2',

            ]
        );

        $this->add_control(
            'gofly_testimonial_style_four_genaral_title_color',
            [
                'label'     => esc_html__('Color', 'gofly-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .section-title h2' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'gofly_testimonial_style_four_genaral_description',
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
                'name'     => 'gofly_testimonial_style_four_genaral_description_typ',
                'selector' => '{{WRAPPER}} .section-title p',

            ]
        );

        $this->add_control(
            'gofly_testimonial_style_four_genaral_description_color',
            [
                'label'     => esc_html__('Color', 'gofly-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .section-title p' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'gofly_testimonial_style_four_genaral_testimonial_sec',
            [
                'label'     => esc_html__('Testimonial', 'gofly-core'),
                'type'      => \Elementor\Controls_Manager::HEADING,
                'separator' => 'before',
            ]
        );

        $this->add_control(
            'gofly_testimonial_style_four_genaral_rating_icon',
            [
                'label'     => esc_html__('Rating Icon', 'gofly-core'),
                'type'      => \Elementor\Controls_Manager::HEADING,
                'separator' => 'after',
            ]
        );

        $this->add_control(
            'gofly_testimonial_style_four_genaral_rating_icon_color',
            [
                'label'     => esc_html__('Color', 'gofly-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .testimonial-card .rating-area.trustpilot li svg' => 'fill: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'gofly_testimonial_style_four_genaral_rating_icon_bg_color',
            [
                'label'     => esc_html__('Background Color', 'gofly-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .testimonial-card .rating-area.trustpilot li' => 'background-color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'gofly_testimonial_style_four_genaral_testimonial_sec_description_title',
            [
                'label'     => esc_html__('Description Title', 'gofly-core'),
                'type'      => \Elementor\Controls_Manager::HEADING,
                'separator' => 'after',
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'label'    => esc_html__('Typography', 'gofly-core'),
                'name'     => 'gofly_testimonial_style_four_genaral_testimonial_sec_description_title_typ',
                'selector' => '{{WRAPPER}} .testimonial-card h5',

            ]
        );

        $this->add_control(
            'gofly_testimonial_style_four_genaral_testimonial_sec_description_title_color',
            [
                'label'     => esc_html__('Color', 'gofly-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .testimonial-card h5' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'gofly_testimonial_style_four_genaral_testimonial_sec_description',
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
                'name'     => 'gofly_testimonial_style_four_genaral_testimonial_sec_description_typ',
                'selector' => '{{WRAPPER}} .testimonial-card.five p',

            ]
        );

        $this->add_control(
            'gofly_testimonial_style_four_genaral_testimonial_sec_description_color',
            [
                'label'     => esc_html__('Color', 'gofly-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .testimonial-card.five p' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'gofly_testimonial_style_four_genaral_testimonial_sec_author_name',
            [
                'label'     => esc_html__('Author Name', 'gofly-core'),
                'type'      => \Elementor\Controls_Manager::HEADING,
                'separator' => 'after',
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'label'    => esc_html__('Typography', 'gofly-core'),
                'name'     => 'gofly_testimonial_style_four_genaral_testimonial_sec_author_name_typ',
                'selector' => '{{WRAPPER}} .testimonial-card .author-area .author-info h5',

            ]
        );

        $this->add_control(
            'gofly_testimonial_style_four_genaral_testimonial_sec_author_name_color',
            [
                'label'     => esc_html__('Color', 'gofly-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .testimonial-card .author-area .author-info h5' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'gofly_testimonial_style_four_genaral_testimonial_sec_author_designation',
            [
                'label'     => esc_html__('Author Designation', 'gofly-core'),
                'type'      => \Elementor\Controls_Manager::HEADING,
                'separator' => 'after',
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'label'    => esc_html__('Typography', 'gofly-core'),
                'name'     => 'gofly_testimonial_style_four_genaral_testimonial_sec_author_designation_typ',
                'selector' => '{{WRAPPER}} .testimonial-card .author-area .author-info span',

            ]
        );

        $this->add_control(
            'gofly_testimonial_style_four_genaral_testimonial_sec_author_designation_color',
            [
                'label'     => esc_html__('Color', 'gofly-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .testimonial-card .author-area .author-info span' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'gofly_testimonial_style_four_genaral_testimonial_sec_pagination',
            [
                'label'     => esc_html__('Pagination', 'gofly-core'),
                'type'      => \Elementor\Controls_Manager::HEADING,
                'separator' => 'after',
            ]
        );

        $this->add_control(
            'gofly_testimonial_style_four_genaral_testimonial_sec_pagination_color',
            [
                'label'     => esc_html__('Color', 'gofly-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .slider-btn-grp .slider-btn svg' => 'stroke: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'gofly_testimonial_style_four_genaral_testimonial_sec_pagination_hover_color',
            [
                'label'     => esc_html__('Hover Color', 'gofly-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .slider-btn-grp .slider-btn:hover svg' => 'stroke: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'gofly_testimonial_style_four_genaral_testimonial_sec_pagination_border_color',
            [
                'label'     => esc_html__('Border Color', 'gofly-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .slider-btn-grp .slider-btn' => 'border: 1px solid {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'gofly_testimonial_style_four_genaral_testimonial_sec_pagination_border_hover_color',
            [
                'label'     => esc_html__('Hover Border Color', 'gofly-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .slider-btn-grp .slider-btn:hover' => 'border-color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'gofly_testimonial_style_four_genaral_testimonial_sec_pagination_bg_color',
            [
                'label'     => esc_html__('Background Color', 'gofly-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .slider-btn-grp .slider-btn' => 'background-color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'gofly_testimonial_style_four_genaral_testimonial_sec_pagination_hover_bg_color',
            [
                'label'     => esc_html__('Hover Background Color', 'gofly-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .slider-btn-grp .slider-btn:hover' => 'background-color: {{VALUE}};',
                ],
            ]
        );

        $this->end_controls_section();

        //=====================Style Five Start=======================//

        $this->start_controls_section(
            'gofly_testimonial_style_five_genaral',
            [
                'label'     => esc_html__('Styles', 'gofly-core'),
                'tab'       => Controls_Manager::TAB_STYLE,
                'condition' => [
                    'gofly_testimonial_genaral_style_selection' => ['style_five'],
                ]
            ]
        );

        $this->add_control(
            'gofly_testimonial_style_five_genaral_rating_icon',
            [
                'label'     => esc_html__('Rating Icon', 'gofly-core'),
                'type'      => \Elementor\Controls_Manager::HEADING,
                'separator' => 'after',
            ]
        );

        $this->add_control(
            'gofly_testimonial_style_five_genaral_rating_icon_color',
            [
                'label'     => esc_html__('Color', 'gofly-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .testimonial-card .rating-area.trustpilot li svg' => 'fill: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'gofly_testimonial_style_five_genaral_rating_icon_bg_color',
            [
                'label'     => esc_html__('Background Color', 'gofly-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .testimonial-card .rating-area.trustpilot li' => 'background-color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'gofly_testimonial_style_five_genaral_description_title',
            [
                'label'     => esc_html__('Description Title', 'gofly-core'),
                'type'      => \Elementor\Controls_Manager::HEADING,
                'separator' => 'after',
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'label'    => esc_html__('Typography', 'gofly-core'),
                'name'     => 'gofly_testimonial_style_five_genaral_description_title_typ',
                'selector' => '{{WRAPPER}} .testimonial-card h5',

            ]
        );

        $this->add_control(
            'gofly_testimonial_style_five_genaral_description_title_color',
            [
                'label'     => esc_html__('Color', 'gofly-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .testimonial-card h5' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'gofly_testimonial_style_five_genaral_description_t',
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
                'name'     => 'gofly_testimonial_style_five_genaral_description_t_typ',
                'selector' => '{{WRAPPER}} .testimonial-card p',

            ]
        );

        $this->add_control(
            'gofly_testimonial_style_five_genaral_description_t_color',
            [
                'label'     => esc_html__('Color', 'gofly-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .testimonial-card p' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'gofly_testimonial_style_five_genaral_author_name',
            [
                'label'     => esc_html__('Author Name', 'gofly-core'),
                'type'      => \Elementor\Controls_Manager::HEADING,
                'separator' => 'after',
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'label'    => esc_html__('Typography', 'gofly-core'),
                'name'     => 'gofly_testimonial_style_five_genaral_author_name_typ',
                'selector' => '{{WRAPPER}} .testimonial-card .author-area .author-info h5',

            ]
        );

        $this->add_control(
            'gofly_testimonial_style_five_genaral_author_name_color',
            [
                'label'     => esc_html__('Color', 'gofly-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .testimonial-card .author-area .author-info h5' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'gofly_testimonial_style_five_genaral_author_designation',
            [
                'label'     => esc_html__('Author Designation', 'gofly-core'),
                'type'      => \Elementor\Controls_Manager::HEADING,
                'separator' => 'after',
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'label'    => esc_html__('Typography', 'gofly-core'),
                'name'     => 'gofly_testimonial_style_five_genaral_author_designation_typ',
                'selector' => '{{WRAPPER}} .testimonial-card .author-area .author-info span',

            ]
        );

        $this->add_control(
            'gofly_testimonial_style_five_genaral_author_designation_color',
            [
                'label'     => esc_html__('Color', 'gofly-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .testimonial-card .author-area .author-info span' => 'color: {{VALUE}};',
                ],
            ]
        );


        $this->end_controls_section();

        //=====================Style six Start=======================//

        $this->start_controls_section(
            'gofly_testimonial_style_six_genaral',
            [
                'label'     => esc_html__('Styles', 'gofly-core'),
                'tab'       => Controls_Manager::TAB_STYLE,
                'condition' => [
                    'gofly_testimonial_genaral_style_selection' => ['style_six'],
                ]
            ]
        );

        $this->add_control(
            'gofly_testimonial_style_six_genaral_global_section',
            [
                'label'     => esc_html__('Global Card', 'gofly-core'),
                'type'      => \Elementor\Controls_Manager::HEADING,
                'separator' => 'after',
            ]
        );

        $this->add_control(
            'gofly_testimonial_style_six_genaral_global_section_border_color',
            [
                'label'     => esc_html__('Border Color', 'gofly-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .home7-testimonial-section .testimonial-wrapper' => 'border: 1px solid {{VALUE}};',
                ],
            ]
        );


        $this->add_control(
            'gofly_testimonial_style_six_genaral_global_section_bg_color',
            [
                'label'     => esc_html__('Background Color', 'gofly-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .home7-testimonial-section .testimonial-wrapper' => 'background-color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'gofly_testimonial_style_six_genaral_rating_icon',
            [
                'label'     => esc_html__('Rating Icon', 'gofly-core'),
                'type'      => \Elementor\Controls_Manager::HEADING,
                'separator' => 'after',
            ]
        );

        $this->add_control(
            'gofly_testimonial_style_six_genaral_rating_icon_color',
            [
                'label'     => esc_html__('Color', 'gofly-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .testimonial-card .rating-area.trustpilot li svg' => 'fill: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'gofly_testimonial_style_six_genaral_rating_icon_bg_color',
            [
                'label'     => esc_html__('Background Color', 'gofly-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .testimonial-card .rating-area.trustpilot li' => 'background-color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'gofly_testimonial_style_six_genaral_title',
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
                'name'     => 'gofly_testimonial_style_six_genaral_title_typ',
                'selector' => '{{WRAPPER}} .testimonial-card.five h5',

            ]
        );

        $this->add_control(
            'gofly_testimonial_style_six_genaral_title_color',
            [
                'label'     => esc_html__('Color', 'gofly-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .testimonial-card.five h5' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'gofly_testimonial_style_six_genaral_description',
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
                'name'     => 'gofly_testimonial_style_six_genaral_description_typ',
                'selector' => '{{WRAPPER}} .testimonial-card.five p',

            ]
        );

        $this->add_control(
            'gofly_testimonial_style_six_genaral_description_color',
            [
                'label'     => esc_html__('Color', 'gofly-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .testimonial-card.five p' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'gofly_testimonial_style_six_genaral_author_name',
            [
                'label'     => esc_html__('Author Name', 'gofly-core'),
                'type'      => \Elementor\Controls_Manager::HEADING,
                'separator' => 'after',
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'label'    => esc_html__('Typography', 'gofly-core'),
                'name'     => 'gofly_testimonial_style_six_genaral_author_name_typ',
                'selector' => '{{WRAPPER}} .testimonial-card.five .author-area .author-info h5',

            ]
        );

        $this->add_control(
            'gofly_testimonial_style_six_genaral_author_name_color',
            [
                'label'     => esc_html__('Color', 'gofly-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .testimonial-card.five .author-area .author-info h5' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'gofly_testimonial_style_six_genaral_author_designation',
            [
                'label'     => esc_html__('Author Designation', 'gofly-core'),
                'type'      => \Elementor\Controls_Manager::HEADING,
                'separator' => 'after',
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'label'    => esc_html__('Typography', 'gofly-core'),
                'name'     => 'gofly_testimonial_style_six_genaral_author_designation_typ',
                'selector' => '{{WRAPPER}} .testimonial-card .author-area .author-info span',

            ]
        );

        $this->add_control(
            'gofly_testimonial_style_six_genaral_author_designation_color',
            [
                'label'     => esc_html__('Color', 'gofly-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .testimonial-card .author-area .author-info span' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'gofly_testimonial_style_six_genaral_author_pagination',
            [
                'label'     => esc_html__('Pagination', 'gofly-core'),
                'type'      => \Elementor\Controls_Manager::HEADING,
                'separator' => 'after',
            ]
        );

        $this->add_control(
            'gofly_testimonial_style_six_genaral_author_pagination_color',
            [
                'label'     => esc_html__('Color', 'gofly-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .slider-btn-grp.three .slider-btn svg' => 'fill: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'gofly_testimonial_style_six_genaral_author_pagination_hover_color',
            [
                'label'     => esc_html__('Hover Color', 'gofly-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .slider-btn-grp.three .slider-btn:hover svg' => 'fill: {{VALUE}};',
                ],
            ]
        );


        $this->add_control(
            'gofly_testimonial_style_six_genaral_author_pagination_border_color',
            [
                'label'     => esc_html__('Border Color', 'gofly-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .slider-btn-grp.three .slider-btn' => 'border: 1px solid {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'gofly_testimonial_style_six_genaral_author_pagination_hover_border_color',
            [
                'label'     => esc_html__('Hover Border Color', 'gofly-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .slider-btn-grp.three .slider-btn:hover' => 'border-color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'gofly_testimonial_style_six_genaral_author_pagination_bg_color',
            [
                'label'     => esc_html__('Background Color', 'gofly-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .slider-btn-grp.three .slider-btn' => 'background-color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'gofly_testimonial_style_six_genaral_author_pagination_hover_bg_color',
            [
                'label'     => esc_html__('Hover Background Color', 'gofly-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .slider-btn-grp.three .slider-btn:hover' => 'background-color: {{VALUE}};',
                ],
            ]
        );

        $this->end_controls_section();


        //=====================Style seven Start=======================//

        $this->start_controls_section(
            'gofly_testimonial_style_seven_genaral',
            [
                'label'     => esc_html__('Styles', 'gofly-core'),
                'tab'       => Controls_Manager::TAB_STYLE,
                'condition' => [
                    'gofly_testimonial_genaral_style_selection' => ['style_seven'],
                ]
            ]
        );

        $this->add_control(
            'gofly_testimonial_style_seven_genaral_global_section',
            [
                'label'     => esc_html__('Global Card', 'gofly-core'),
                'type'      => \Elementor\Controls_Manager::HEADING,
                'separator' => 'after',
            ]
        );

        $this->add_control(
            'gofly_testimonial_style_seven_genaral_global_section_bg_color',
            [
                'label'     => esc_html__('Background Color', 'gofly-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .home8-testimoninal-section .testimonial-wrapper' => 'background-color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'gofly_testimonial_style_seven_genaral_side_title',
            [
                'label'     => esc_html__('Side Title', 'gofly-core'),
                'type'      => \Elementor\Controls_Manager::HEADING,
                'separator' => 'after',
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'label'    => esc_html__('Typography', 'gofly-core'),
                'name'     => 'gofly_testimonial_style_seven_genaral_side_title_typ',
                'selector' => '{{WRAPPER}} .section-title h2',

            ]
        );

        $this->add_control(
            'gofly_testimonial_style_seven_genaral_side_title_color',
            [
                'label'     => esc_html__('Color', 'gofly-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .section-title h2' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'gofly_testimonial_style_seven_genaral_side_description',
            [
                'label'     => esc_html__('Side Description', 'gofly-core'),
                'type'      => \Elementor\Controls_Manager::HEADING,
                'separator' => 'after',
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'label'    => esc_html__('Typography', 'gofly-core'),
                'name'     => 'gofly_testimonial_style_seven_genaral_side_description_typ',
                'selector' => '{{WRAPPER}} .section-title p',

            ]
        );

        $this->add_control(
            'gofly_testimonial_style_seven_genaral_side_description_color',
            [
                'label'     => esc_html__('Color', 'gofly-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .section-title p' => 'color: {{VALUE}};',
                ],
            ]
        );


        $this->add_control(
            'gofly_testimonial_style_seven_genaral_side_rating_area',
            [
                'label'     => esc_html__('Rating Area', 'gofly-core'),
                'type'      => \Elementor\Controls_Manager::HEADING,
                'separator' => 'before',
            ]
        );


        $this->add_control(
            'gofly_testimonial_style_seven_genaral_side_rating_area_bg_color',
            [
                'label'     => esc_html__('Background Color', 'gofly-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .home8-testimoninal-section .testimonial-wrapper .section-title .rating-area' => 'background-color: {{VALUE}};',
                ],
            ]
        );


        $this->add_control(
            'gofly_testimonial_style_seven_genaral_side_rating_area_icon',
            [
                'label'     => esc_html__('Icon', 'gofly-core'),
                'type'      => \Elementor\Controls_Manager::HEADING,
                'separator' => 'after',
            ]
        );

        $this->add_control(
            'gofly_testimonial_style_seven_genaral_side_rating_area_icon_color',
            [
                'label'     => esc_html__('Color', 'gofly-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .home8-testimoninal-section .testimonial-wrapper .section-title .rating-area .content .rating-star li i' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'gofly_testimonial_style_seven_genaral_side_rating_title',
            [
                'label'     => esc_html__('Rating Title', 'gofly-core'),
                'type'      => \Elementor\Controls_Manager::HEADING,
                'separator' => 'after',
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'label'    => esc_html__('Typography', 'gofly-core'),
                'name'     => 'gofly_testimonial_style_seven_genaral_side_rating_title_typ',
                'selector' => '{{WRAPPER}} .home8-testimoninal-section .testimonial-wrapper .section-title .rating-area .content span',

            ]
        );

        $this->add_control(
            'gofly_testimonial_style_seven_genaral_side_rating_title_color',
            [
                'label'     => esc_html__('Color', 'gofly-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .home8-testimoninal-section .testimonial-wrapper .section-title .rating-area .content span' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'gofly_testimonial_style_seven_genaral_side_review_area',
            [
                'label'     => esc_html__('Testimonial Area', 'gofly-core'),
                'type'      => \Elementor\Controls_Manager::HEADING,
                'separator' => 'before',
            ]
        );

        $this->add_control(
            'gofly_testimonial_style_seven_genaral_side_review_area_bg_color',
            [
                'label'     => esc_html__('Card Background Color', 'gofly-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .testimonial-card' => 'background-color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'gofly_testimonial_style_seven_genaral_side_review_area_title',
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
                'name'     => 'gofly_testimonial_style_seven_genaral_side_review_area_title_typ',
                'selector' => '{{WRAPPER}} .testimonial-card h5',

            ]
        );

        $this->add_control(
            'gofly_testimonial_style_seven_genaral_side_review_area_title_color',
            [
                'label'     => esc_html__('Color', 'gofly-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .testimonial-card h5' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'gofly_testimonial_style_seven_genaral_side_review_area_description',
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
                'name'     => 'gofly_testimonial_style_seven_genaral_side_review_area_description_typ',
                'selector' => '{{WRAPPER}} .testimonial-card p',

            ]
        );

        $this->add_control(
            'gofly_testimonial_style_seven_genaral_side_review_area_description_color',
            [
                'label'     => esc_html__('Color', 'gofly-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .testimonial-card p' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'gofly_testimonial_style_seven_genaral_side_review_area_author_name',
            [
                'label'     => esc_html__('Author Name', 'gofly-core'),
                'type'      => \Elementor\Controls_Manager::HEADING,
                'separator' => 'after',
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'label'    => esc_html__('Typography', 'gofly-core'),
                'name'     => 'gofly_testimonial_style_seven_genaral_side_review_area_author_name_typ',
                'selector' => '{{WRAPPER}} .testimonial-card.three .author-area .author-info h5',

            ]
        );

        $this->add_control(
            'gofly_testimonial_style_seven_genaral_side_review_area_author_name_color',
            [
                'label'     => esc_html__('Color', 'gofly-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .testimonial-card.three .author-area .author-info h5' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'gofly_testimonial_style_seven_genaral_side_review_area_author_designation',
            [
                'label'     => esc_html__('Author Designation', 'gofly-core'),
                'type'      => \Elementor\Controls_Manager::HEADING,
                'separator' => 'after',
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'label'    => esc_html__('Typography', 'gofly-core'),
                'name'     => 'gofly_testimonial_style_seven_genaral_side_review_area_author_designation_typ',
                'selector' => '{{WRAPPER}} .testimonial-card .author-area .author-info span',

            ]
        );

        $this->add_control(
            'gofly_testimonial_style_seven_genaral_side_review_area_author_designation_color',
            [
                'label'     => esc_html__('Color', 'gofly-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .testimonial-card .author-area .author-info span' => 'color: {{VALUE}};',
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
                var swiper = new Swiper(".home1-testimonial-slider", {
                    slidesPerView: 1,
                    speed: 1500,
                    spaceBetween: 24,
                    autoplay: {
                        delay: 2500, // Autoplay duration in milliseconds
                        pauseOnMouseEnter: true,
                        disableOnInteraction: false,
                    },
                    navigation: {
                        nextEl: ".testimonial-slider-next",
                        prevEl: ".testimonial-slider-prev",
                    },
                    breakpoints: {
                        280: {
                            slidesPerView: 1,
                        },
                        386: {
                            slidesPerView: 1,
                        },
                        576: {
                            slidesPerView: 1,
                        },
                        768: {
                            slidesPerView: 2,
                            spaceBetween: 15,
                        },
                        992: {
                            slidesPerView: 3,
                            spaceBetween: 15,
                        },
                        1200: {
                            slidesPerView: 3,
                            spaceBetween: 15,
                        },
                        1400: {
                            slidesPerView: 3,
                        },
                    },
                });
                var swiper = new Swiper(".home3-testimonial-slider", {
                    slidesPerView: 1,
                    speed: 1500,
                    spaceBetween: 24,
                    autoplay: {
                        delay: 2500, // Autoplay duration in milliseconds
                        disableOnInteraction: false,
                    },
                    effect: "fade",
                    fadeEffect: {
                        crossFade: true,
                    },
                    navigation: {
                        nextEl: ".testimonial-slider-next",
                        prevEl: ".testimonial-slider-prev",
                    },
                });

                var swiper = new Swiper(".home4-testimonial-slider", {
                    slidesPerView: 1,
                    speed: 1500,
                    spaceBetween: 24,
                    autoplay: {
                        delay: 2500, // Autoplay duration in milliseconds
                        disableOnInteraction: false,
                    },
                    effect: "fade",
                    fadeEffect: {
                        crossFade: true,
                    },
                    navigation: {
                        nextEl: ".testimonial-slider-next",
                        prevEl: ".testimonial-slider-prev",
                    },
                    thumbs: {
                        swiper: swiper3,
                    },
                });
                var swiper3 = new Swiper(".home4-testimonial-img-slider", {
                    spaceBetween: 30,
                    freeMode: true,
                    watchSlidesProgress: true,
                    breakpoints: {
                        280: {
                            slidesPerView: 2,
                        },
                        350: {
                            slidesPerView: 3,
                            spaceBetween: 10,
                        },
                        576: {
                            slidesPerView: 5,
                            spaceBetween: 15,
                        },
                        768: {
                            slidesPerView: 5,
                            spaceBetween: 15,
                        },
                        992: {
                            slidesPerView: 5,
                            spaceBetween: 15,
                        },
                        1200: {
                            slidesPerView: 5,
                            spaceBetween: 20,
                        },
                        1400: {
                            slidesPerView: 5,
                        },
                    },
                });
            </script>
        <?php endif; ?>

        <?php if ($settings['gofly_testimonial_genaral_style_selection'] == 'style_one'): ?>
            <div class="home1-testimonial-section">
                <div class="container">
                    <?php if ($settings['gofly_testimonial_genaral_header_switcher'] == 'yes'): ?>
                        <div class="row justify-content-center mb-50 wow animate fadeInDown" data-wow-delay="200ms"
                            data-wow-duration="1500ms">
                            <div class="col-xl-6 col-lg-8">
                                <div class="section-title text-center">
                                    <?php if (!empty($settings['gofly_testimonial_genaral_header_title'])): ?>
                                        <h2><?php echo esc_html($settings['gofly_testimonial_genaral_header_title']); ?></h2>
                                    <?php endif; ?>
                                    <?php if (!empty($settings['gofly_testimonial_genaral_header_description'])): ?>
                                        <p><?php echo esc_html($settings['gofly_testimonial_genaral_header_description']); ?></p>
                                    <?php endif; ?>
                                </div>
                            </div>
                        </div>
                    <?php endif; ?>
                    <div class="row mb-40">
                        <div class="col-lg-12">
                            <div class="swiper home1-testimonial-slider">
                                <div class="swiper-wrapper">
                                    <?php foreach ($settings['gofly_testimonial_genaral_testimonial_list'] as $testimonial): ?>
                                        <div class="swiper-slide">
                                            <div class="testimonial-card">
                                                <div class="author-area">
                                                    <div class="author-img">
                                                        <?php if (!empty($testimonial['gofly_testimonial_genaral_testimonial_author_image']['url'])): ?>
                                                            <img src="<?php echo esc_html($testimonial['gofly_testimonial_genaral_testimonial_author_image']['url']); ?>" alt="<?php echo esc_attr__('author-image', 'gofly-core'); ?>">
                                                        <?php endif; ?>
                                                        <?php if ($testimonial['gofly_testimonial_genaral_testimonial_author_video_switcher'] == 'yes') : ?>
                                                            <?php if ($testimonial['gofly_testimonial_genaral_testimonial_author_video_selector'] == 'upload_video'): ?>
                                                                <a data-fancybox="video-player"
                                                                    href="<?php echo esc_url($testimonial['gofly_testimonial_genaral_testimonial_author_video_upload']['url']); ?>" class="play-btn">
                                                                    <svg width="26" height="26" viewBox="0 0 26 26"
                                                                        xmlns="http://www.w3.org/2000/svg">
                                                                        <circle cx="13" cy="13" r="12.5" fill="white" stroke="#110F0F" />
                                                                        <g>
                                                                            <path
                                                                                d="M8.4375 13V9.7519C8.4375 8.4062 9.89453 7.5644 11.0586 8.23823L13.873 9.86323L16.6875 11.4882C17.8535 12.1601 17.8535 13.8437 16.6875 14.5156L13.873 16.1406L11.0586 17.7656C9.89453 18.4355 8.4375 17.5957 8.4375 16.25V13Z" />
                                                                        </g>
                                                                    </svg>
                                                                </a>
                                                            <?php else: ?>
                                                                <a data-fancybox="video-player"
                                                                    href="<?php echo esc_url($testimonial['gofly_testimonial_genaral_testimonial_author_video_link']['url']); ?>" class="play-btn">
                                                                    <svg width="26" height="26" viewBox="0 0 26 26"
                                                                        xmlns="http://www.w3.org/2000/svg">
                                                                        <circle cx="13" cy="13" r="12.5" fill="white" stroke="#110F0F" />
                                                                        <g>
                                                                            <path
                                                                                d="M8.4375 13V9.7519C8.4375 8.4062 9.89453 7.5644 11.0586 8.23823L13.873 9.86323L16.6875 11.4882C17.8535 12.1601 17.8535 13.8437 16.6875 14.5156L13.873 16.1406L11.0586 17.7656C9.89453 18.4355 8.4375 17.5957 8.4375 16.25V13Z" />
                                                                        </g>
                                                                    </svg>
                                                                </a>
                                                            <?php endif; ?>
                                                        <?php endif; ?>
                                                    </div>
                                                    <div class="author-info">
                                                        <?php if (!empty($testimonial['gofly_testimonial_genaral_testimonial_author_name'])): ?>
                                                            <h5><?php echo esc_html($testimonial['gofly_testimonial_genaral_testimonial_author_name']); ?></h5>
                                                        <?php endif; ?>
                                                        <?php if (!empty($testimonial['gofly_testimonial_genaral_testimonial_author_designation'])): ?>
                                                            <span><?php echo esc_html($testimonial['gofly_testimonial_genaral_testimonial_author_designation']); ?></span>
                                                        <?php endif; ?>
                                                    </div>
                                                </div>
                                                <?php if ($testimonial['gofly_testimonial_genaral_testimonial_author_rating_switcher'] == 'yes'): ?>
                                                    <ul class="rating-area <?php if ($testimonial['gofly_testimonial_genaral_testimonial_rating_style'] == 'trustpilot') : ?>trustpilot<?php endif; ?>">
                                                        <?php if ($testimonial['gofly_testimonial_genaral_testimonial_rating_style'] == 'tripadvisor'): ?>
                                                            <?php $rank_counter = intval($testimonial['gofly_testimonial_genaral_testimonial_review_rating']);
                                                            $rank_counter = max(0, min(5, $rank_counter)); ?>
                                                            <?php for ($i = 1; $i <= 5; $i++): ?>
                                                                <?php if ($i <= $rank_counter) : ?>
                                                                    <li><i class="bi bi-circle-fill"></i></li>
                                                                <?php endif ?>
                                                            <?php endfor; ?>
                                                        <?php else: ?>
                                                            <?php $rank_counter = intval($testimonial['gofly_testimonial_genaral_testimonial_review_rating']);
                                                            $rank_counter = max(0, min(5, $rank_counter)); ?>
                                                            <?php for ($i = 1; $i <= 5; $i++): ?>
                                                                <?php if ($i <= $rank_counter) : ?>
                                                                    <li>
                                                                        <svg width="11" height="10" viewBox="0 0 11 10" xmlns="http://www.w3.org/2000/svg">
                                                                            <path d="M5.25 7.57409L7.53125 6.99627L8.48437 9.93221L5.25 7.57409ZM10.5 3.77924H6.48437L5.25 0L4.01562 3.77924H0L3.25 6.12174L2.01562 9.90097L5.26562 7.55847L7.26562 6.12174L10.5 3.77924Z"></path>
                                                                        </svg>
                                                                    </li>
                                                                <?php endif ?>
                                                            <?php endfor; ?>
                                                        <?php endif; ?>
                                                    </ul>
                                                <?php endif; ?>
                                                <?php if (!empty($testimonial['gofly_testimonial_genaral_testimonial_content_title'])): ?>
                                                    <h5><?php echo esc_html($testimonial['gofly_testimonial_genaral_testimonial_content_title']); ?></h5>
                                                <?php endif; ?>
                                                <?php if (!empty($testimonial['gofly_testimonial_genaral_testimonial_content_description'])): ?>
                                                    <div class="content">
                                                        <p><?php echo esc_html($testimonial['gofly_testimonial_genaral_testimonial_content_description']); ?></p>
                                                    </div>
                                                <?php endif; ?>
                                            </div>
                                        </div>
                                    <?php endforeach; ?>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="review-wrap wow animate fadeInUp" data-wow-delay="200ms" data-wow-duration="1500ms">
                        <?php foreach ($settings['gofly_testimonial_genaral_testimonial_review_and_rating_list'] as $rating): ?>
                            <?php if ($rating['gofly_testimonial_genaral_testimonial_review_and_rating_style'] == 'tripadvisor'): ?>
                                <div class="tripadvisor-rating-area">
                                    <a href="<?php echo esc_url($rating['gofly_testimonial_genaral_testimonial_review_and_rating_rating_url']['url']); ?>" class="tripadvisor-rating">
                                        <?php if (!empty($rating['gofly_testimonial_genaral_testimonial_review_and_rating_logo']['url'])): ?>
                                            <img src="<?php echo esc_url($rating['gofly_testimonial_genaral_testimonial_review_and_rating_logo']['url']); ?>" alt="<?php echo esc_attr__('logo-image', 'gofly-core'); ?>">
                                        <?php endif; ?>
                                        <div class="rating-area">
                                            <?php if (!empty($rating['gofly_testimonial_genaral_testimonial_review_and_rating_title'])): ?>
                                                <span><?php echo esc_html($rating['gofly_testimonial_genaral_testimonial_review_and_rating_title']); ?></span>
                                            <?php endif; ?>
                                            <?php if (!empty($rating['gofly_testimonial_genaral_testimonial_review_and_rating_rating_image']['url'])): ?>
                                                <img src="<?php echo esc_url($rating['gofly_testimonial_genaral_testimonial_review_and_rating_rating_image']['url']); ?>" alt="<?php echo esc_attr__('rating-image', 'gofly-core'); ?>">
                                            <?php endif; ?>
                                        </div>
                                    </a>
                                    <svg class="divider" width="6" height="52" viewBox="0 0 6 52" xmlns="http://www.w3.org/2000/svg">
                                        <path
                                            d="M3.5 5L5.88675 0H0.113249L2.5 5H3.5ZM2.5 47L0.113249 52H5.88675L3.5 47H2.5ZM2.5 4.5V47.5H3.5V4.5H2.5Z" />
                                    </svg>
                                </div>
                            <?php else: ?>
                                <a href="<?php echo esc_url($rating['gofly_testimonial_genaral_testimonial_review_and_rating_rating_url']['url']); ?>" class="trustpilot-rating-area">
                                    <?php if (!empty($rating['gofly_testimonial_genaral_testimonial_review_and_rating_number'])): ?>
                                        <strong><?php echo esc_html($rating['gofly_testimonial_genaral_testimonial_review_and_rating_number']); ?></strong>
                                    <?php endif; ?>
                                    <div class="trustpilot-rating">
                                        <img src="<?php echo esc_url($rating['gofly_testimonial_genaral_testimonial_review_and_rating_logo']['url']); ?>" alt="<?php echo esc_attr__('logo-image', 'gofly-core'); ?>">
                                        <div class="rating-area">
                                            <?php if (!empty($rating['gofly_testimonial_genaral_testimonial_review_and_rating_rating_image']['url'])): ?>
                                                <img src="<?php echo esc_url($rating['gofly_testimonial_genaral_testimonial_review_and_rating_rating_image']['url']); ?>" alt="<?php echo esc_attr__('rating-image', 'gofly-core'); ?>">
                                            <?php endif; ?>
                                            <?php if (!empty($rating['gofly_testimonial_genaral_testimonial_review_and_rating_title'])): ?>
                                                <span><?php echo esc_html($rating['gofly_testimonial_genaral_testimonial_review_and_rating_title']); ?></span>
                                            <?php endif; ?>
                                        </div>
                                    </div>
                                </a>
                            <?php endif; ?>
                        <?php endforeach; ?>
                    </div>
                </div>
            </div>
        <?php endif; ?>

        <?php if ($settings['gofly_testimonial_genaral_style_selection'] == 'style_two'): ?>
            <div class="home2-testimonial-section">
                <div class="container">
                    <?php if ($settings['gofly_testimonial_genaral_header_switcher'] == 'yes'): ?>
                        <div class="row justify-content-center mb-50 wow animate fadeInDown" data-wow-delay="200ms" data-wow-duration="1500ms">
                            <div class="col-xl-6 col-lg-8">
                                <div class="section-title text-center">
                                    <?php if (!empty($settings['gofly_testimonial_genaral_header_title'])): ?>
                                        <h2><?php echo esc_html($settings['gofly_testimonial_genaral_header_title']); ?></h2>
                                    <?php endif; ?>
                                    <?php if (!empty($settings['gofly_testimonial_genaral_header_description'])): ?>
                                        <p><?php echo esc_html($settings['gofly_testimonial_genaral_header_description']); ?></p>
                                    <?php endif; ?>
                                </div>
                            </div>
                        </div>
                    <?php endif; ?>
                    <div class="row mb-40">
                        <div class="col-lg-12">
                            <div class="swiper home1-testimonial-slider">
                                <div class="swiper-wrapper">
                                    <?php foreach ($settings['gofly_testimonial_genaral_style_two_testimonial_list'] as $testimonial): ?>
                                        <div class="swiper-slide">
                                            <div class="testimonial-card three">
                                                <?php if ($testimonial['gofly_testimonial_genaral_style_two_testimonial_author_rating_switcher'] == 'yes'): ?>
                                                    <ul class="rating-area <?php if ($testimonial['gofly_testimonial_genaral_style_two_testimonial_rating_style'] == 'trustpilot') : ?>trustpilot<?php endif; ?>">
                                                        <?php if ($testimonial['gofly_testimonial_genaral_style_two_testimonial_rating_style'] == 'tripadvisor'): ?>
                                                            <?php $rank_counter = intval($testimonial['gofly_testimonial_genaral_style_two_testimonial_review_rating']);
                                                            $rank_counter = max(0, min(5, $rank_counter)); ?>
                                                            <?php for ($i = 1; $i <= 5; $i++): ?>
                                                                <?php if ($i <= $rank_counter) : ?>
                                                                    <li><i class="bi bi-circle-fill"></i></li>
                                                                <?php endif ?>
                                                            <?php endfor; ?>
                                                        <?php else: ?>
                                                            <?php $rank_counter = intval($testimonial['gofly_testimonial_genaral_style_two_testimonial_review_rating']);
                                                            $rank_counter = max(0, min(5, $rank_counter)); ?>
                                                            <?php for ($i = 1; $i <= 5; $i++): ?>
                                                                <?php if ($i <= $rank_counter) : ?>
                                                                    <li>
                                                                        <svg width="11" height="10" viewBox="0 0 11 10" xmlns="http://www.w3.org/2000/svg">
                                                                            <path d="M5.25 7.57409L7.53125 6.99627L8.48437 9.93221L5.25 7.57409ZM10.5 3.77924H6.48437L5.25 0L4.01562 3.77924H0L3.25 6.12174L2.01562 9.90097L5.26562 7.55847L7.26562 6.12174L10.5 3.77924Z"></path>
                                                                        </svg>
                                                                    </li>
                                                                <?php endif ?>
                                                            <?php endfor; ?>
                                                        <?php endif; ?>
                                                    </ul>
                                                <?php endif; ?>
                                                <?php if (!empty($testimonial['gofly_testimonial_genaral_style_two_testimonial_content_title'])): ?>
                                                    <h5><?php echo esc_html($testimonial['gofly_testimonial_genaral_style_two_testimonial_content_title']); ?></h5>
                                                <?php endif; ?>
                                                <?php if (!empty($testimonial['gofly_testimonial_genaral_style_two_testimonial_content_description'])): ?>
                                                    <p><?php echo esc_html($testimonial['gofly_testimonial_genaral_style_two_testimonial_content_description']); ?></p>
                                                <?php endif; ?>
                                                <div class="author-area">
                                                    <?php if (!empty($testimonial['gofly_testimonial_genaral_style_two_testimonial_author_image']['url'])): ?>
                                                        <div class="author-img">
                                                            <img src="<?php echo esc_url($testimonial['gofly_testimonial_genaral_style_two_testimonial_author_image']['url']); ?>" alt="<?php echo esc_attr__('author-image', 'gofly-core'); ?>">
                                                        </div>
                                                    <?php endif; ?>
                                                    <div class="author-info">
                                                        <?php if (!empty($testimonial['gofly_testimonial_genaral_style_two_testimonial_author_name'])): ?>
                                                            <h5><?php echo esc_html($testimonial['gofly_testimonial_genaral_style_two_testimonial_author_name']); ?></h5>
                                                        <?php endif; ?>
                                                        <?php if (!empty($testimonial['gofly_testimonial_genaral_style_two_testimonial_author_designation'])): ?>
                                                            <span><?php echo esc_html($testimonial['gofly_testimonial_genaral_style_two_testimonial_author_designation']); ?></span>
                                                        <?php endif; ?>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    <?php endforeach; ?>

                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="review-and-slider-btn wow animate fadeInUp" data-wow-delay="200ms" data-wow-duration="1500ms">
                        <?php if ($settings['gofly_testimonial_genaral_style_two_testimonial_review_and_rating_tripadvisor_switcher'] == 'yes'): ?>
                            <a href="<?php echo esc_url($settings['gofly_testimonial_genaral_style_two_testimonial_review_and_rating_rating_url']['url']); ?>" class="single-rating">
                                <?php if (!empty($settings['gofly_testimonial_genaral_style_two_testimonial_review_and_rating_number'])): ?>
                                    <strong><?php echo esc_html($settings['gofly_testimonial_genaral_style_two_testimonial_review_and_rating_number']); ?></strong>
                                <?php endif; ?>
                                <div class="trustpilot-rating">
                                    <?php if (!empty($settings['gofly_testimonial_genaral_style_two_testimonial_review_and_rating_logo']['url'])): ?>
                                        <img src="<?php echo esc_url($settings['gofly_testimonial_genaral_style_two_testimonial_review_and_rating_logo']['url']); ?>" alt="<?php echo esc_attr__('logo-image', 'gofly-core'); ?>">
                                    <?php endif; ?>
                                    <div class="rating-area">
                                        <?php if (!empty($settings['gofly_testimonial_genaral_style_two_testimonial_review_and_rating_rating_image']['url'])): ?>
                                            <img src="<?php echo esc_url($settings['gofly_testimonial_genaral_style_two_testimonial_review_and_rating_rating_image']['url']); ?>" alt="<?php echo esc_attr__('rating-image', 'gofly-core'); ?>">
                                        <?php endif; ?>
                                        <?php if (!empty($settings['gofly_testimonial_genaral_style_two_testimonial_review_and_rating_title'])): ?>
                                            <span><?php echo esc_html($settings['gofly_testimonial_genaral_style_two_testimonial_review_and_rating_title']); ?></span>
                                        <?php endif; ?>
                                    </div>
                                </div>
                            </a>
                        <?php endif; ?>

                        <div class="slider-btn-grp">
                            <div class="slider-btn testimonial-slider-prev">
                                <svg width="14" height="14" viewBox="0 0 14 14" xmlns="http://www.w3.org/2000/svg">
                                    <g>
                                        <path
                                            d="M11.002 13.0005C10.002 10.5005 5.00195 8.00049 2.00195 7.00049C5.00195 6.00049 9.50195 4.50049 11.002 1.00049" stroke-width="1.5" stroke-linecap="round" />
                                    </g>
                                </svg>
                            </div>
                            <div class="slider-btn testimonial-slider-next">
                                <svg width="14" height="14" viewBox="0 0 14 14" xmlns="http://www.w3.org/2000/svg">
                                    <g>
                                        <path
                                            d="M2.99805 13.0005C3.99805 10.5005 8.99805 8.00049 11.998 7.00049C8.99805 6.00049 4.49805 4.50049 2.99805 1.00049" stroke-width="1.5" stroke-linecap="round" />
                                    </g>
                                </svg>
                            </div>
                        </div>
                        <?php if ($settings['gofly_testimonial_genaral_style_two_testimonial_review_and_rating_trustpilot_switcher'] == 'yes'): ?>
                            <a href="<?php echo esc_url($settings['gofly_testimonial_genaral_style_two_testimonial_review_and_rating_trustpilot_rating_url']['url']); ?>" class="single-rating">
                                <?php if (!empty($settings['gofly_testimonial_genaral_style_two_testimonial_review_and_rating_trustpilot_rating_number'])): ?>
                                    <strong><?php echo esc_html($settings['gofly_testimonial_genaral_style_two_testimonial_review_and_rating_trustpilot_rating_number']); ?></strong>
                                <?php endif; ?>
                                <div class="tripadvisor-rating">
                                    <?php if (!empty($settings['gofly_testimonial_genaral_style_two_testimonial_review_and_rating_trustpilot_logo']['url'])): ?>
                                        <img src="<?php echo esc_url($settings['gofly_testimonial_genaral_style_two_testimonial_review_and_rating_trustpilot_logo']['url']); ?>" alt="<?php echo esc_attr__('logo-image', 'gofly-core'); ?>">
                                    <?php endif; ?>
                                    <div class="rating-area">
                                        <?php if (!empty($settings['gofly_testimonial_genaral_style_two_testimonial_review_and_rating_trustpilot_title'])): ?>
                                            <span><?php echo esc_html($settings['gofly_testimonial_genaral_style_two_testimonial_review_and_rating_trustpilot_title']); ?></span>
                                        <?php endif; ?>
                                        <?php if (!empty($settings['gofly_testimonial_genaral_style_two_testimonial_review_and_rating_trustpilot_rating_image']['url'])): ?>
                                            <img src="<?php echo esc_url($settings['gofly_testimonial_genaral_style_two_testimonial_review_and_rating_trustpilot_rating_image']['url']); ?>" alt="<?php echo esc_attr__('rating-image', 'gofly-core'); ?>">
                                        <?php endif; ?>
                                    </div>
                                </div>
                            </a>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        <?php endif; ?>

        <?php if ($settings['gofly_testimonial_genaral_style_selection'] == 'style_three'): ?>
            <div class="home3-testimonial-section">
                <div class="container">
                    <div class="row">
                        <?php if ($settings['gofly_testimonial_genaral_style_three_testimonial_image_area_switcher'] == 'yes'): ?>
                            <div class="col-lg-6 d-lg-block d-none">
                                <div class="testimonial-img-area wow animate zoomIn" data-wow-delay="200ms" data-wow-duration="1500ms">
                                    <div class="testimonial-img-grp">
                                        <?php
                                        $gallery = ! empty($settings['gofly_testimonial_genaral_style_three_testimonial_image_area_author_gallery']) ? $settings['gofly_testimonial_genaral_style_three_testimonial_image_area_author_gallery'] : array();

                                        if (! empty($gallery)):

                                            $first_image = $gallery[0];
                                        ?>
                                            <img src="<?php echo esc_url($first_image['url']); ?>" alt="<?php echo esc_attr($first_image['alt'] ?? ''); ?>">
                                            <?php

                                            if (count($gallery) > 1):
                                            ?>
                                                <ul class="img-list">
                                                    <?php foreach (array_slice($gallery, 1) as $image): ?>
                                                        <li>
                                                            <img src="<?php echo esc_url($image['url']); ?>" alt="<?php echo esc_attr($image['alt'] ?? ''); ?>">
                                                        </li>
                                                    <?php endforeach; ?>
                                                </ul>
                                        <?php
                                            endif;
                                        endif;
                                        ?>
                                        <?php if ($settings['gofly_testimonial_genaral_style_three_testimonial_counter_area_switcher'] == 'yes'): ?>
                                            <div class="counter-area">
                                                <ul class="counter-img-grp">
                                                    <?php foreach ($settings['gofly_testimonial_genaral_style_three_testimonial_image_area_counter_image_gallery'] as $image): ?>
                                                        <?php if (!empty($image['url'])) : ?>
                                                            <li><img src="<?php echo esc_url($image['url']); ?>" alt="<?php echo esc_attr__('counter-image', 'gofly-core'); ?>"></li>
                                                        <?php endif; ?>
                                                    <?php endforeach; ?>
                                                </ul>
                                                <h6> <strong><?php if (!empty($settings['gofly_testimonial_genaral_style_three_testimonial_image_area_counter_number'])) : ?><span class="counter"><?php echo esc_html($settings['gofly_testimonial_genaral_style_three_testimonial_image_area_counter_number']); ?></span><?php endif; ?><?php echo esc_html($settings['gofly_testimonial_genaral_style_three_testimonial_image_area_counter_sign']); ?></strong> <?php if (!empty($settings['gofly_testimonial_genaral_style_three_testimonial_image_area_counter_title'])) : ?><?php echo esc_html($settings['gofly_testimonial_genaral_style_three_testimonial_image_area_counter_title']); ?><?php endif; ?></h6>
                                            </div>
                                        <?php endif; ?>
                                    </div>
                                </div>
                            </div>
                        <?php endif; ?>
                        <div class="<?php
                                    echo esc_attr(
                                        (isset($settings['gofly_testimonial_genaral_style_three_testimonial_image_area_switcher']) && 'yes' === $settings['gofly_testimonial_genaral_style_three_testimonial_image_area_switcher'])
                                            ? 'col-lg-6'
                                            :      'col-lg-12'
                                    );
                                    ?>">
                            <div class="testimonial-content">
                                <div class="section-title wow animate fadeInDown" data-wow-delay="200ms" data-wow-duration="1500ms">
                                    <?php if (!empty($settings['gofly_testimonial_genaral_header_title'])): ?>
                                        <h2><?php echo esc_html($settings['gofly_testimonial_genaral_header_title']); ?></h2>
                                    <?php endif; ?>
                                    <?php if (!empty($settings['gofly_testimonial_genaral_header_description'])): ?>
                                        <p><?php echo esc_html($settings['gofly_testimonial_genaral_header_description']); ?></p>
                                    <?php endif; ?>
                                </div>
                                <div class="testimonial-slider-area">
                                    <div class="swiper home3-testimonial-slider">
                                        <div class="swiper-wrapper">
                                            <?php foreach ($settings['gofly_testimonial_genaral_style_two_testimonial_list'] as $testimonial): ?>
                                                <div class="swiper-slide">
                                                    <div class="testimonial-card four">
                                                        <?php if ($testimonial['gofly_testimonial_genaral_style_two_testimonial_author_rating_switcher'] == 'yes'): ?>
                                                            <ul class="rating-area <?php if ($testimonial['gofly_testimonial_genaral_style_two_testimonial_rating_style'] == 'trustpilot') : ?>trustpilot<?php endif; ?>">
                                                                <?php if ($testimonial['gofly_testimonial_genaral_style_two_testimonial_rating_style'] == 'tripadvisor'): ?>
                                                                    <?php $rank_counter = intval($testimonial['gofly_testimonial_genaral_style_two_testimonial_review_rating']);
                                                                    $rank_counter = max(0, min(5, $rank_counter)); ?>
                                                                    <?php for ($i = 1; $i <= 5; $i++): ?>
                                                                        <?php if ($i <= $rank_counter) : ?>
                                                                            <li><i class="bi bi-circle-fill"></i></li>
                                                                        <?php endif ?>
                                                                    <?php endfor; ?>
                                                                <?php else: ?>
                                                                    <?php $rank_counter = intval($testimonial['gofly_testimonial_genaral_style_two_testimonial_review_rating']);
                                                                    $rank_counter = max(0, min(5, $rank_counter)); ?>
                                                                    <?php for ($i = 1; $i <= 5; $i++): ?>
                                                                        <?php if ($i <= $rank_counter) : ?>
                                                                            <li>
                                                                                <svg width="11" height="10" viewBox="0 0 11 10" xmlns="http://www.w3.org/2000/svg">
                                                                                    <path d="M5.25 7.57409L7.53125 6.99627L8.48437 9.93221L5.25 7.57409ZM10.5 3.77924H6.48437L5.25 0L4.01562 3.77924H0L3.25 6.12174L2.01562 9.90097L5.26562 7.55847L7.26562 6.12174L10.5 3.77924Z"></path>
                                                                                </svg>
                                                                            </li>
                                                                        <?php endif ?>
                                                                    <?php endfor; ?>
                                                                <?php endif; ?>
                                                            </ul>
                                                        <?php endif; ?>
                                                        <?php if (!empty($testimonial['gofly_testimonial_genaral_style_two_testimonial_content_title'])): ?>
                                                            <h5><?php echo esc_html($testimonial['gofly_testimonial_genaral_style_two_testimonial_content_title']); ?></h5>
                                                        <?php endif; ?>
                                                        <?php if (!empty($testimonial['gofly_testimonial_genaral_style_two_testimonial_content_description'])): ?>
                                                            <p><?php echo esc_html($testimonial['gofly_testimonial_genaral_style_two_testimonial_content_description']); ?></p>
                                                        <?php endif; ?>
                                                        <div class="author-area">
                                                            <div class="author-img">
                                                                <?php if (!empty($testimonial['gofly_testimonial_genaral_style_two_testimonial_author_image']['url'])): ?>
                                                                    <img src="<?php echo esc_url($testimonial['gofly_testimonial_genaral_style_two_testimonial_author_image']['url']); ?>" alt="<?php echo esc_attr__('author-image', 'gofly-core'); ?>">
                                                                <?php endif; ?>
                                                            </div>
                                                            <div class="author-info">
                                                                <?php if (!empty($testimonial['gofly_testimonial_genaral_style_two_testimonial_author_name'])): ?>
                                                                    <h5><?php echo esc_html($testimonial['gofly_testimonial_genaral_style_two_testimonial_author_name']); ?></h5>
                                                                <?php endif; ?>
                                                                <?php if (!empty($testimonial['gofly_testimonial_genaral_style_two_testimonial_author_designation'])): ?>
                                                                    <span><?php echo esc_html($testimonial['gofly_testimonial_genaral_style_two_testimonial_author_designation']); ?></span>
                                                                <?php endif; ?>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            <?php endforeach; ?>
                                        </div>
                                    </div>

                                    <div class="slider-btn-grp">
                                        <div class="slider-btn testimonial-slider-prev">
                                            <svg width="14" height="14" viewBox="0 0 14 14" xmlns="http://www.w3.org/2000/svg">
                                                <g>
                                                    <path
                                                        d="M11.002 13.0005C10.002 10.5005 5.00195 8.00049 2.00195 7.00049C5.00195 6.00049 9.50195 4.50049 11.002 1.00049" stroke-width="1.5" stroke-linecap="round" />
                                                </g>
                                            </svg>
                                        </div>
                                        <div class="slider-btn testimonial-slider-next">
                                            <svg width="14" height="14" viewBox="0 0 14 14" xmlns="http://www.w3.org/2000/svg">
                                                <g>
                                                    <path
                                                        d="M2.99805 13.0005C3.99805 10.5005 8.99805 8.00049 11.998 7.00049C8.99805 6.00049 4.49805 4.50049 2.99805 1.00049" stroke-width="1.5" stroke-linecap="round" />
                                                </g>
                                            </svg>
                                        </div>
                                    </div>


                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        <?php endif; ?>

        <?php if ($settings['gofly_testimonial_genaral_style_selection'] == 'style_four'): ?>
            <div class="home4-testimonial-section">
                <div class="container">
                    <div class="testimonial-wrap">
                        <div class="row justify-content-center mb-50 wow animate fadeInDown" data-wow-delay="200ms" data-wow-duration="1500ms">
                            <div class="col-xl-6 col-lg-8">
                                <div class="section-title text-center">
                                    <?php if (!empty($settings['gofly_testimonial_genaral_header_title'])): ?>
                                        <h2><?php echo esc_html($settings['gofly_testimonial_genaral_header_title']); ?></h2>
                                    <?php endif; ?>
                                    <?php if (!empty($settings['gofly_testimonial_genaral_header_description'])): ?>
                                        <p><?php echo esc_html($settings['gofly_testimonial_genaral_header_description']); ?></p>
                                    <?php endif; ?>
                                </div>
                            </div>
                        </div>
                        <div class="testimonial-slider-area mb-40">
                            <div class="row justify-content-center">
                                <div class="col-lg-8">
                                    <div class="swiper home4-testimonial-slider">
                                        <div class="swiper-wrapper">
                                            <?php foreach ($settings['gofly_testimonial_genaral_style_two_testimonial_list'] as $testimonial): ?>
                                                <div class="swiper-slide">
                                                    <div class="testimonial-card five">
                                                        <?php if ($testimonial['gofly_testimonial_genaral_style_two_testimonial_author_rating_switcher'] == 'yes'): ?>
                                                            <ul class="rating-area <?php if ($testimonial['gofly_testimonial_genaral_style_two_testimonial_rating_style'] == 'trustpilot') : ?>trustpilot<?php endif; ?>">
                                                                <?php if ($testimonial['gofly_testimonial_genaral_style_two_testimonial_rating_style'] == 'tripadvisor'): ?>
                                                                    <?php $rank_counter = intval($testimonial['gofly_testimonial_genaral_style_two_testimonial_review_rating']);
                                                                    $rank_counter = max(0, min(5, $rank_counter)); ?>
                                                                    <?php for ($i = 1; $i <= 5; $i++): ?>
                                                                        <?php if ($i <= $rank_counter) : ?>
                                                                            <li><i class="bi bi-circle-fill"></i></li>
                                                                        <?php endif ?>
                                                                    <?php endfor; ?>
                                                                <?php else: ?>
                                                                    <?php $rank_counter = intval($testimonial['gofly_testimonial_genaral_style_two_testimonial_review_rating']);
                                                                    $rank_counter = max(0, min(5, $rank_counter)); ?>
                                                                    <?php for ($i = 1; $i <= 5; $i++): ?>
                                                                        <?php if ($i <= $rank_counter) : ?>
                                                                            <li>
                                                                                <svg width="11" height="10" viewBox="0 0 11 10" xmlns="http://www.w3.org/2000/svg">
                                                                                    <path d="M5.25 7.57409L7.53125 6.99627L8.48437 9.93221L5.25 7.57409ZM10.5 3.77924H6.48437L5.25 0L4.01562 3.77924H0L3.25 6.12174L2.01562 9.90097L5.26562 7.55847L7.26562 6.12174L10.5 3.77924Z"></path>
                                                                                </svg>
                                                                            </li>
                                                                        <?php endif ?>
                                                                    <?php endfor; ?>
                                                                <?php endif; ?>
                                                            </ul>
                                                        <?php endif; ?>
                                                        <?php if (!empty($testimonial['gofly_testimonial_genaral_style_two_testimonial_content_title'])): ?>
                                                            <h5><?php echo esc_html($testimonial['gofly_testimonial_genaral_style_two_testimonial_content_title']); ?></h5>
                                                        <?php endif; ?>
                                                        <?php if (!empty($testimonial['gofly_testimonial_genaral_style_two_testimonial_content_description'])): ?>
                                                            <p><?php echo esc_html($testimonial['gofly_testimonial_genaral_style_two_testimonial_content_description']); ?></p>
                                                        <?php endif; ?>
                                                        <div class="author-area">
                                                            <div class="author-info">
                                                                <?php if (!empty($testimonial['gofly_testimonial_genaral_style_two_testimonial_author_name'])): ?>
                                                                    <h5><?php echo esc_html($testimonial['gofly_testimonial_genaral_style_two_testimonial_author_name']); ?></h5>
                                                                <?php endif; ?>
                                                                <?php if (!empty($testimonial['gofly_testimonial_genaral_style_two_testimonial_author_designation'])): ?>
                                                                    <span><?php echo esc_html($testimonial['gofly_testimonial_genaral_style_two_testimonial_author_designation']); ?></span>
                                                                <?php endif; ?>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            <?php endforeach; ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="slider-btn-grp">
                                <div class="slider-btn testimonial-slider-prev">
                                    <svg width="14" height="14" viewBox="0 0 14 14" xmlns="http://www.w3.org/2000/svg">
                                        <g>
                                            <path
                                                d="M11.002 13.0005C10.002 10.5005 5.00195 8.00049 2.00195 7.00049C5.00195 6.00049 9.50195 4.50049 11.002 1.00049" stroke-width="1.5" stroke-linecap="round" />
                                        </g>
                                    </svg>
                                </div>
                                <div class="slider-btn testimonial-slider-next">
                                    <svg width="14" height="14" viewBox="0 0 14 14" xmlns="http://www.w3.org/2000/svg">
                                        <g>
                                            <path
                                                d="M2.99805 13.0005C3.99805 10.5005 8.99805 8.00049 11.998 7.00049C8.99805 6.00049 4.49805 4.50049 2.99805 1.00049" stroke-width="1.5" stroke-linecap="round" />
                                        </g>
                                    </svg>
                                </div>
                            </div>
                        </div>
                        <div class="row justify-content-center">
                            <div class="col-lg-8">
                                <div class="swiper home4-testimonial-img-slider">
                                    <div class="swiper-wrapper">
                                        <?php foreach ($settings['gofly_testimonial_genaral_style_two_testimonial_list'] as $testimonial): ?>
                                            <div class="swiper-slide">
                                                <?php if (!empty($testimonial['gofly_testimonial_genaral_style_two_testimonial_author_image']['url'])): ?>
                                                    <div class="testimonial-author-img">
                                                        <img src="<?php echo esc_url($testimonial['gofly_testimonial_genaral_style_two_testimonial_author_image']['url']); ?>" alt="<?php echo esc_attr__('author-image', 'gofly-core'); ?>">
                                                    </div>
                                                <?php endif; ?>
                                            </div>
                                        <?php endforeach; ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <?php if (!empty($settings['gofly_testimonial_genaral_style_four_testimonial_vector_image']['url'])): ?>
                    <img src="<?php echo esc_url($settings['gofly_testimonial_genaral_style_four_testimonial_vector_image']['url']); ?>" alt="<?php echo esc_attr__('vector-image', 'gofly-core'); ?>" class="vector">
                <?php endif; ?>
            </div>
        <?php endif; ?>

        <?php if ($settings['gofly_testimonial_genaral_style_selection'] == 'style_five') : ?>
            <div class="home5-testimonial-bg" <?php if (!empty($settings['gofly_testimonial_genaral_testimonial_bg_image']['url'])): ?>style="background-image: url(<?php echo esc_url($settings['gofly_testimonial_genaral_testimonial_bg_image']['url']); ?>);" <?php endif; ?>></div>
            <div class="home5-testimonial-section">
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-lg-10">
                            <div class="testimonial-wrapper" <?php if (!empty($settings['gofly_testimonial_genaral_style_five_testimonial_section_bg_image']['url'])) : ?> style="background-image: url(<?php echo esc_url($settings['gofly_testimonial_genaral_style_five_testimonial_section_bg_image']['url']); ?>), linear-gradient(180deg, #FFF 0%, #FFF 100%)" <?php endif; ?>>
                                <div class="swiper home4-testimonial-slider">
                                    <div class="swiper-wrapper">
                                        <?php foreach ($settings['gofly_testimonial_genaral_style_two_testimonial_list'] as $testimonial): ?>
                                            <div class="swiper-slide">
                                                <div class="testimonial-card five">
                                                    <?php if ($testimonial['gofly_testimonial_genaral_style_two_testimonial_author_rating_switcher'] == 'yes'): ?>
                                                        <ul class="rating-area <?php if ($testimonial['gofly_testimonial_genaral_style_two_testimonial_rating_style'] == 'trustpilot') : ?>trustpilot<?php endif; ?>">
                                                            <?php if ($testimonial['gofly_testimonial_genaral_style_two_testimonial_rating_style'] == 'tripadvisor'): ?>
                                                                <?php $rank_counter = intval($testimonial['gofly_testimonial_genaral_style_two_testimonial_review_rating']);
                                                                $rank_counter = max(0, min(5, $rank_counter)); ?>
                                                                <?php for ($i = 1; $i <= 5; $i++): ?>
                                                                    <?php if ($i <= $rank_counter) : ?>
                                                                        <li><i class="bi bi-circle-fill"></i></li>
                                                                    <?php endif ?>
                                                                <?php endfor; ?>
                                                            <?php else: ?>
                                                                <?php $rank_counter = intval($testimonial['gofly_testimonial_genaral_style_two_testimonial_review_rating']);
                                                                $rank_counter = max(0, min(5, $rank_counter)); ?>
                                                                <?php for ($i = 1; $i <= 5; $i++): ?>
                                                                    <?php if ($i <= $rank_counter) : ?>
                                                                        <li>
                                                                            <svg width="11" height="10" viewBox="0 0 11 10" xmlns="http://www.w3.org/2000/svg">
                                                                                <path d="M5.25 7.57409L7.53125 6.99627L8.48437 9.93221L5.25 7.57409ZM10.5 3.77924H6.48437L5.25 0L4.01562 3.77924H0L3.25 6.12174L2.01562 9.90097L5.26562 7.55847L7.26562 6.12174L10.5 3.77924Z"></path>
                                                                            </svg>
                                                                        </li>
                                                                    <?php endif ?>
                                                                <?php endfor; ?>
                                                            <?php endif; ?>
                                                        </ul>
                                                    <?php endif; ?>
                                                    <?php if (!empty($testimonial['gofly_testimonial_genaral_style_two_testimonial_content_title'])): ?>
                                                        <h5><?php echo esc_html($testimonial['gofly_testimonial_genaral_style_two_testimonial_content_title']); ?></h5>
                                                    <?php endif; ?>
                                                    <?php if (!empty($testimonial['gofly_testimonial_genaral_style_two_testimonial_content_description'])): ?>
                                                        <p><?php echo esc_html($testimonial['gofly_testimonial_genaral_style_two_testimonial_content_description']); ?></p>
                                                    <?php endif; ?>
                                                    <div class="author-area">
                                                        <div class="author-info">
                                                            <?php if (!empty($testimonial['gofly_testimonial_genaral_style_two_testimonial_author_name'])): ?>
                                                                <h5><?php echo esc_html($testimonial['gofly_testimonial_genaral_style_two_testimonial_author_name']); ?></h5>
                                                            <?php endif; ?>
                                                            <?php if (!empty($testimonial['gofly_testimonial_genaral_style_two_testimonial_author_designation'])): ?>
                                                                <span><?php echo esc_html($testimonial['gofly_testimonial_genaral_style_two_testimonial_author_designation']); ?></span>
                                                            <?php endif; ?>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        <?php endforeach; ?>
                                    </div>
                                </div>
                            </div>
                            <div class="testimonial-author-area">
                                <div class="swiper home4-testimonial-img-slider">
                                    <div class="swiper-wrapper">
                                        <?php foreach ($settings['gofly_testimonial_genaral_style_two_testimonial_list'] as $testimonial): ?>
                                            <div class="swiper-slide">
                                                <?php if (!empty($testimonial['gofly_testimonial_genaral_style_two_testimonial_author_image']['url'])): ?>
                                                    <div class="testimonial-author-img">
                                                        <img src="<?php echo esc_url($testimonial['gofly_testimonial_genaral_style_two_testimonial_author_image']['url']); ?>" alt="<?php echo esc_attr__('author-image', 'gofly-core'); ?>">
                                                    </div>
                                                <?php endif; ?>
                                            </div>
                                        <?php endforeach; ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <?php if (!empty($settings['gofly_testimonial_genaral_style_four_testimonial_vector_image']['url'])): ?>
                    <img src="<?php echo esc_url($settings['gofly_testimonial_genaral_style_four_testimonial_vector_image']['url']); ?>" alt="<?php echo esc_attr__('vector-image', 'gofly-core'); ?>" class="vector">
                <?php endif; ?>
            </div>
        <?php endif; ?>

        <?php if ($settings['gofly_testimonial_genaral_style_selection'] == 'style_six') : ?>
            <div class="home7-testimonial-bg" <?php if (!empty($settings['gofly_testimonial_genaral_testimonial_bg_image']['url'])): ?>style="background-image: url(<?php echo esc_url($settings['gofly_testimonial_genaral_testimonial_bg_image']['url']); ?>);" <?php endif; ?>></div>
            <div class="home7-testimonial-section">
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-lg-10">
                            <div class="testimonial-wrapper">
                                <div class="swiper home3-testimonial-slider">
                                    <div class="swiper-wrapper">
                                        <?php foreach ($settings['gofly_testimonial_genaral_style_two_testimonial_list'] as $testimonial): ?>
                                            <div class="swiper-slide">
                                                <div class="testimonial-card five">
                                                    <?php if ($testimonial['gofly_testimonial_genaral_style_two_testimonial_author_rating_switcher'] == 'yes'): ?>
                                                        <ul class="rating-area <?php if ($testimonial['gofly_testimonial_genaral_style_two_testimonial_rating_style'] == 'trustpilot') : ?>trustpilot<?php endif; ?>">
                                                            <?php if ($testimonial['gofly_testimonial_genaral_style_two_testimonial_rating_style'] == 'tripadvisor'): ?>
                                                                <?php $rank_counter = intval($testimonial['gofly_testimonial_genaral_style_two_testimonial_review_rating']);
                                                                $rank_counter = max(0, min(5, $rank_counter)); ?>
                                                                <?php for ($i = 1; $i <= 5; $i++): ?>
                                                                    <?php if ($i <= $rank_counter) : ?>
                                                                        <li><i class="bi bi-circle-fill"></i></li>
                                                                    <?php endif ?>
                                                                <?php endfor; ?>
                                                            <?php else: ?>
                                                                <?php $rank_counter = intval($testimonial['gofly_testimonial_genaral_style_two_testimonial_review_rating']);
                                                                $rank_counter = max(0, min(5, $rank_counter)); ?>
                                                                <?php for ($i = 1; $i <= 5; $i++): ?>
                                                                    <?php if ($i <= $rank_counter) : ?>
                                                                        <li>
                                                                            <svg width="11" height="10" viewBox="0 0 11 10" xmlns="http://www.w3.org/2000/svg">
                                                                                <path d="M5.25 7.57409L7.53125 6.99627L8.48437 9.93221L5.25 7.57409ZM10.5 3.77924H6.48437L5.25 0L4.01562 3.77924H0L3.25 6.12174L2.01562 9.90097L5.26562 7.55847L7.26562 6.12174L10.5 3.77924Z"></path>
                                                                            </svg>
                                                                        </li>
                                                                    <?php endif ?>
                                                                <?php endfor; ?>
                                                            <?php endif; ?>
                                                        </ul>
                                                    <?php endif; ?>
                                                    <?php if (!empty($testimonial['gofly_testimonial_genaral_style_two_testimonial_content_title'])): ?>
                                                        <h5><?php echo esc_html($testimonial['gofly_testimonial_genaral_style_two_testimonial_content_title']); ?></h5>
                                                    <?php endif; ?>
                                                    <?php if (!empty($testimonial['gofly_testimonial_genaral_style_two_testimonial_content_description'])): ?>
                                                        <p><?php echo esc_html($testimonial['gofly_testimonial_genaral_style_two_testimonial_content_description']); ?></p>
                                                    <?php endif; ?>
                                                    <div class="author-area">
                                                        <div class="author-img">
                                                            <img src="<?php echo esc_url($testimonial['gofly_testimonial_genaral_style_two_testimonial_author_image']['url']); ?>" alt="<?php echo esc_attr__('author-image', 'gofly-core'); ?>">
                                                        </div>
                                                        <div class="author-info">
                                                            <?php if (!empty($testimonial['gofly_testimonial_genaral_style_two_testimonial_author_name'])): ?>
                                                                <h5><?php echo esc_html($testimonial['gofly_testimonial_genaral_style_two_testimonial_author_name']); ?></h5>
                                                            <?php endif; ?>
                                                            <?php if (!empty($testimonial['gofly_testimonial_genaral_style_two_testimonial_author_designation'])): ?>
                                                                <span><?php echo esc_html($testimonial['gofly_testimonial_genaral_style_two_testimonial_author_designation']); ?></span>
                                                            <?php endif; ?>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        <?php endforeach; ?>
                                    </div>
                                </div>
                                <div class="slider-btn-grp three">
                                    <div class="slider-btn testimonial-slider-prev">
                                        <svg width="16" height="12" viewBox="0 0 16 12" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path fill-rule="evenodd" clip-rule="evenodd" d="M0 5.31421H16V6.68564H0V5.31421Z" />
                                            <path fill-rule="evenodd" clip-rule="evenodd"
                                                d="M0.685714 6.68569C3.9104 6.68569 6.54629 3.84958 6.54629 0.825119V0.139404H5.17486V0.825119C5.17486 3.12181 3.12412 5.31426 0.685714 5.31426H0V6.68569H0.685714Z" />
                                            <path fill-rule="evenodd" clip-rule="evenodd"
                                                d="M0.685714 5.31421C3.9104 5.31421 6.54629 8.15032 6.54629 11.1748V11.8605H5.17486V11.1748C5.17486 8.87901 3.12412 6.68564 0.685714 6.68564H0V5.31421H0.685714Z" />
                                        </svg>
                                    </div>
                                    <div class="slider-btn testimonial-slider-next">
                                        <svg width="16" height="16" viewBox="0 0 16 16" xmlns="http://www.w3.org/2000/svg">
                                            <g>
                                                <path fill-rule="evenodd" clip-rule="evenodd" d="M16 7.31421H-3.8147e-06V8.68564H16V7.31421Z" />
                                                <path fill-rule="evenodd" clip-rule="evenodd"
                                                    d="M15.3143 8.68569C12.0896 8.68569 9.45371 5.84958 9.45371 2.82512V2.1394H10.8251V2.82512C10.8251 5.12181 12.8759 7.31426 15.3143 7.31426H16V8.68569H15.3143Z" />
                                                <path fill-rule="evenodd" clip-rule="evenodd"
                                                    d="M15.3143 7.31421C12.0896 7.31421 9.45371 10.1503 9.45371 13.1748V13.8605H10.8251V13.1748C10.8251 10.879 12.8759 8.68564 15.3143 8.68564H16V7.31421H15.3143Z" />
                                            </g>
                                        </svg>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        <?php endif; ?>

        <?php if ($settings['gofly_testimonial_genaral_style_selection'] == 'style_seven'): ?>
            <div class="home8-testimoninal-section">
                <div class="testimonial-banner-img" <?php if (!empty($settings['gofly_testimonial_genaral_testimonial_bg_image']['url'])) : ?>style="background-image: url(<?php echo esc_url($settings['gofly_testimonial_genaral_testimonial_bg_image']['url']); ?>);" <?php endif; ?>></div>
                <div class="testimonial-wrapper">
                    <div class="container">
                        <div class="row gy-5">
                            <?php if ($settings['gofly_testimonial_genaral_header_switcher'] == 'yes'): ?>
                                <div class="col-xl-5 col-lg-4 wow animate fadeInLeft" data-wow-delay="200ms" data-wow-duration="1500ms">
                                    <div class="section-title">
                                        <?php if (!empty($settings['gofly_testimonial_genaral_header_title'])): ?>
                                            <h2><?php echo esc_html($settings['gofly_testimonial_genaral_header_title']); ?></h2>
                                        <?php endif; ?>
                                        <?php if (!empty($settings['gofly_testimonial_genaral_header_description'])): ?>
                                            <p><?php echo esc_html($settings['gofly_testimonial_genaral_header_description']); ?></p>
                                        <?php endif; ?>
                                        <div class="rating-area">
                                            <?php if (!empty($settings['gofly_testimonial_genaral_style_seven_testimonial_review_rating_logo']['url'])): ?>
                                                <img src="<?php echo esc_url($settings['gofly_testimonial_genaral_style_seven_testimonial_review_rating_logo']['url']); ?>" alt="<?php echo esc_attr__('logo-image', 'gofly-core'); ?>">
                                            <?php endif; ?>
                                            <a href="<?php echo esc_url($settings['gofly_testimonial_genaral_style_seven_testimonial_review_rating_logo_url']['url']); ?>" class="content">
                                                <?php if ($settings['gofly_testimonial_genaral_style_seven_testimonial_author_rating_switcher'] == 'yes'): ?>
                                                    <ul class="rating-star">
                                                        <?php $rank_counter = intval($settings['gofly_testimonial_genaral_style_seven_testimonial_review_rating']);
                                                        $rank_counter = max(0, min(5, $rank_counter)); ?>
                                                        <?php for ($i = 1; $i <= 5; $i++): ?>
                                                            <?php if ($i <= $rank_counter) : ?>
                                                                <li><i class="bi bi-star-fill"></i></li>
                                                            <?php endif ?>
                                                        <?php endfor; ?>
                                                    </ul>
                                                <?php endif; ?>
                                                <span><?php if (!empty($settings['gofly_testimonial_genaral_style_seven_testimonial_review_rating_title'])): ?><?php echo esc_html($settings['gofly_testimonial_genaral_style_seven_testimonial_review_rating_title']); ?><?php endif; ?><?php if (!empty($settings['gofly_testimonial_genaral_style_seven_testimonial_review_rating_count'])): ?><strong><?php echo esc_html($settings['gofly_testimonial_genaral_style_seven_testimonial_review_rating_count']); ?></strong><?php endif; ?></span>
                                        </div>
                                        </a>
                                    </div>
                                </div>
                            <?php endif; ?>
                            <div class="col-xl-7 col-lg-8">
                                <div class="swiper home8-testimonial-slider">
                                    <div class="swiper-wrapper">
                                        <?php foreach ($settings['gofly_testimonial_genaral_style_seven_testimonial_list'] as $testimonial): ?>
                                            <div class="swiper-slide">
                                                <div class="testimonial-card three">
                                                    <div class="content">
                                                        <?php if (!empty($testimonial['gofly_testimonial_genaral_style_seven_testimonial_author_content_title'])): ?>
                                                            <h5><?php echo esc_html($testimonial['gofly_testimonial_genaral_style_seven_testimonial_author_content_title']); ?></h5>
                                                        <?php endif; ?>
                                                        <?php if (!empty($testimonial['gofly_testimonial_genaral_style_seven_testimonial_author_content_description'])): ?>
                                                            <p><?php echo esc_html($testimonial['gofly_testimonial_genaral_style_seven_testimonial_author_content_description']); ?></p>
                                                        <?php endif; ?>
                                                    </div>
                                                    <div class="author-area">
                                                        <?php if (!empty($testimonial['gofly_testimonial_genaral_style_seven_testimonial_author_image']['url'])): ?>
                                                            <div class="author-img">
                                                                <img src="<?php echo esc_url($testimonial['gofly_testimonial_genaral_style_seven_testimonial_author_image']['url']); ?>" alt="<?php echo esc_attr__('author-image', 'gofly-core'); ?>">
                                                            </div>
                                                        <?php endif; ?>
                                                        <div class="author-info">
                                                            <?php if (!empty($testimonial['gofly_testimonial_genaral_style_seven_testimonial_author_name'])): ?>
                                                                <h5><?php echo esc_html($testimonial['gofly_testimonial_genaral_style_seven_testimonial_author_name']); ?></h5>
                                                            <?php endif; ?>
                                                            <?php if (!empty($testimonial['gofly_testimonial_genaral_style_seven_testimonial_author_designation'])): ?>
                                                                <span><?php echo esc_html($testimonial['gofly_testimonial_genaral_style_seven_testimonial_author_designation']); ?></span>
                                                            <?php endif; ?>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        <?php endforeach; ?>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php if (!empty($settings['gofly_testimonial_genaral_style_four_testimonial_vector_image']['url'])): ?>
                        <img src="<?php echo esc_url($settings['gofly_testimonial_genaral_style_four_testimonial_vector_image']['url']); ?>" alt="<?php echo esc_attr__('vector-image', 'gofly-core'); ?>" class="vector1">
                    <?php endif; ?>
                    <?php if (!empty($settings['gofly_testimonial_genaral_style_four_testimonial_vector_image_two']['url'])): ?>
                        <img src="<?php echo esc_url($settings['gofly_testimonial_genaral_style_four_testimonial_vector_image_two']['url']); ?>" alt="<?php echo esc_attr__('vector-image', 'gofly-core'); ?>" class="vector2">
                    <?php endif; ?>
                </div>
            </div>
        <?php endif; ?>


        <?php if ('style_eight' == $settings['gofly_testimonial_genaral_style_selection']): ?>

            <?php
            $bg_img_url = $settings['gofly_testimonial_genaral_testimonial_bg_image']['url'] ?? '';
            $bg_img     = 'style="background-image: url(' . esc_url($bg_img_url) . ');"';

            $bg_inner_img_url = $settings['gofly_testimonial_genaral_style_eight_inner_bg']['url'] ?? '';
            $bg_inner_img     = 'style="background-image: url(' . esc_url($bg_inner_img_url) . ');"';

            ?>

            <div class="home7-testimonial-bg" <?php echo ($bg_img); ?>></div>
            <div class="home7-testimonial-section two">
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-lg-10">
                            <div class="testimonial-wrapper" <?php echo ($bg_inner_img); ?>>
                                <div class="swiper home3-testimonial-slider mb-30">
                                    <div class="swiper-wrapper">
                                        <?php foreach ($settings['gofly_testimonial_genaral_style_two_testimonial_list'] as $testimonial): ?>
                                            <div class="swiper-slide">
                                                <div class="testimonial-card five">
                                                    <?php if ($testimonial['gofly_testimonial_genaral_style_two_testimonial_author_rating_switcher'] == 'yes'): ?>
                                                        <ul class="rating-area <?php if ($testimonial['gofly_testimonial_genaral_style_two_testimonial_rating_style'] == 'trustpilot') : ?>trustpilot<?php endif; ?>">
                                                            <?php if ($testimonial['gofly_testimonial_genaral_style_two_testimonial_rating_style'] == 'tripadvisor'): ?>
                                                                <?php $rank_counter = intval($testimonial['gofly_testimonial_genaral_style_two_testimonial_review_rating']);
                                                                $rank_counter = max(0, min(5, $rank_counter)); ?>
                                                                <?php for ($i = 1; $i <= 5; $i++): ?>
                                                                    <?php if ($i <= $rank_counter) : ?>
                                                                        <li><i class="bi bi-circle-fill"></i></li>
                                                                    <?php endif ?>
                                                                <?php endfor; ?>
                                                            <?php else: ?>
                                                                <?php $rank_counter = intval($testimonial['gofly_testimonial_genaral_style_two_testimonial_review_rating']);
                                                                $rank_counter = max(0, min(5, $rank_counter)); ?>
                                                                <?php for ($i = 1; $i <= 5; $i++): ?>
                                                                    <?php if ($i <= $rank_counter) : ?>
                                                                        <li>
                                                                            <svg width="11" height="10" viewBox="0 0 11 10" xmlns="http://www.w3.org/2000/svg">
                                                                                <path d="M5.25 7.57409L7.53125 6.99627L8.48437 9.93221L5.25 7.57409ZM10.5 3.77924H6.48437L5.25 0L4.01562 3.77924H0L3.25 6.12174L2.01562 9.90097L5.26562 7.55847L7.26562 6.12174L10.5 3.77924Z"></path>
                                                                            </svg>
                                                                        </li>
                                                                    <?php endif ?>
                                                                <?php endfor; ?>
                                                            <?php endif; ?>
                                                        </ul>
                                                    <?php endif; ?>
                                                    <?php if (!empty($testimonial['gofly_testimonial_genaral_style_two_testimonial_content_title'])): ?>
                                                        <h5><?php echo esc_html($testimonial['gofly_testimonial_genaral_style_two_testimonial_content_title']); ?></h5>
                                                    <?php endif; ?>
                                                    <?php if (!empty($testimonial['gofly_testimonial_genaral_style_two_testimonial_content_description'])): ?>
                                                        <p><?php echo esc_html($testimonial['gofly_testimonial_genaral_style_two_testimonial_content_description']); ?></p>
                                                    <?php endif; ?>
                                                    <div class="author-area">
                                                        <div class="author-img">
                                                            <img src="<?php echo esc_url($testimonial['gofly_testimonial_genaral_style_two_testimonial_author_image']['url']); ?>" alt="<?php echo esc_attr__('author-image', 'gofly-core'); ?>">
                                                        </div>
                                                        <div class="author-info">
                                                            <?php if (!empty($testimonial['gofly_testimonial_genaral_style_two_testimonial_author_name'])): ?>
                                                                <h5><?php echo esc_html($testimonial['gofly_testimonial_genaral_style_two_testimonial_author_name']); ?></h5>
                                                            <?php endif; ?>
                                                            <?php if (!empty($testimonial['gofly_testimonial_genaral_style_two_testimonial_author_designation'])): ?>
                                                                <span><?php echo esc_html($testimonial['gofly_testimonial_genaral_style_two_testimonial_author_designation']); ?></span>
                                                            <?php endif; ?>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        <?php endforeach; ?>
                                    </div>
                                </div>
                                <div class="slider-btn-grp three">
                                    <div class="slider-btn testimonial-slider-prev">
                                        <svg width="16" height="12" viewBox="0 0 16 12" fill="none"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <path fill-rule="evenodd" clip-rule="evenodd"
                                                d="M0 5.31421H16V6.68564H0V5.31421Z" />
                                            <path fill-rule="evenodd" clip-rule="evenodd"
                                                d="M0.685714 6.68569C3.9104 6.68569 6.54629 3.84958 6.54629 0.825119V0.139404H5.17486V0.825119C5.17486 3.12181 3.12412 5.31426 0.685714 5.31426H0V6.68569H0.685714Z" />
                                            <path fill-rule="evenodd" clip-rule="evenodd"
                                                d="M0.685714 5.31421C3.9104 5.31421 6.54629 8.15032 6.54629 11.1748V11.8605H5.17486V11.1748C5.17486 8.87901 3.12412 6.68564 0.685714 6.68564H0V5.31421H0.685714Z" />
                                        </svg>
                                    </div>
                                    <a href="<?php echo esc_url($settings['gofly_testimonial_style_eight_rating_link']) ?>" class="single-rating">
                                        <strong><?php echo esc_html($settings['gofly_testimonial_style_eight_rating_point']) ?></strong>
                                        <div class="tripadvisor-rating">
                                            <img src="<?php echo esc_url($settings['gofly_testimonial_style_eight_rating_logo']['url']) ?>" alt="image">
                                            <!-- <div class = "rating-area">
                                                <span>Reviews</span>
                                                <img src = "assets/img/home1/icon/tripadvisor-start.svg" alt = "">
                                            </div> -->
                                        </div>
                                    </a>
                                    <div class="slider-btn testimonial-slider-next">
                                        <svg width="16" height="16" viewBox="0 0 16 16" xmlns="http://www.w3.org/2000/svg">
                                            <g>
                                                <path fill-rule="evenodd" clip-rule="evenodd"
                                                    d="M16 7.31421H-3.8147e-06V8.68564H16V7.31421Z" />
                                                <path fill-rule="evenodd" clip-rule="evenodd"
                                                    d="M15.3143 8.68569C12.0896 8.68569 9.45371 5.84958 9.45371 2.82512V2.1394H10.8251V2.82512C10.8251 5.12181 12.8759 7.31426 15.3143 7.31426H16V8.68569H15.3143Z" />
                                                <path fill-rule="evenodd" clip-rule="evenodd"
                                                    d="M15.3143 7.31421C12.0896 7.31421 9.45371 10.1503 9.45371 13.1748V13.8605H10.8251V13.1748C10.8251 10.879 12.8759 8.68564 15.3143 8.68564H16V7.31421H15.3143Z" />
                                            </g>
                                        </svg>
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

Plugin::instance()->widgets_manager->register(new Gofly_Testimonial_Widget());
