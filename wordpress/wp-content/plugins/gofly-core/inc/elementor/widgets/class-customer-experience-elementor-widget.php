<?php

namespace Elementor;

if (!defined('ABSPATH')) exit;  // Exit if accessed directly

use Elementor\core\Schemes;
use Egns_Core\Egns_Helper;

class Gofly_Customer_Experience_Widget extends Widget_Base
{

    public function get_name()
    {
        return 'gofly_customer_experience';
    }

    public function get_title()
    {
        return esc_html__('EG Customer Experience', 'gofly-core');
    }

    public function get_icon()
    {
        return 'egns-widget-icon';
    }

    public function get_categories()
    {
        return ['gofly_destination'];
    }

    protected function register_controls()
    {

        //=====================General=======================//

        $this->start_controls_section(
            'gofly_customer_experience_section',
            [
                'label' => esc_html__('Customer Experience Gallery', 'gofly-core')
            ]
        );

        $this->add_control(
            'gofly_customer_experience_section_style_selection',
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
            'gofly_customer_experience_title',
            [
                'label'       => esc_html__('Title', 'gofly-core'),
                'type'        => \Elementor\Controls_Manager::TEXT,
                'default'     => 'Recent Customer Experience',
                'placeholder' => esc_html__('write your title here', 'gofly-core'),
                'label_block' => true,
            ]
        );

        $this->add_control(
            'gofly_customer_experience_description',
            [
                'label'       => esc_html__('Description', 'gofly-core'),
                'type'        => \Elementor\Controls_Manager::TEXTAREA,
                'default'     => 'We’re committed to offering more than just products—we provide exceptional experiences.',
                'placeholder' => esc_html__('write your description here', 'gofly-core'),
                'label_block' => true,
                'condition'   => [
                    'gofly_customer_experience_section_style_selection' => ['style_two'],
                ]
            ]
        );

        $this->add_control(
            'gofly_customer_experience_list',
            [
                'label'  => esc_html__('Experience Gallery list', 'gofly-core'),
                'type'   => \Elementor\Controls_Manager::REPEATER,
                'fields' => [
                    [
                        'name'        => 'gofly_customer_experience_choose',
                        'label'       => esc_html__('Structure', 'gofly-core'),
                        'type'        => \Elementor\Controls_Manager::VISUAL_CHOICE,
                        'label_block' => true,
                        'options'     => [
                            'image' => [
                                'title' => esc_attr__('Image', 'gofly-core'),
                                'image' => plugins_url('assets/img/grid-3.svg', __FILE__),
                            ],
                            'video' => [
                                'title' => esc_attr__('Video', 'gofly-core'),
                                'image' => plugins_url('assets/img/masonry.svg', __FILE__),
                            ],
                        ],
                        'default'      => 'image',
                        'columns'      => 2,
                        'prefix_class' => 'some-layout-',
                    ],

                    [
                        'name'    => 'gofly_customer_experience_image',
                        'label'   => esc_html__('Choose Image', 'gofly-core'),
                        'type'    => \Elementor\Controls_Manager::MEDIA,
                        'default' => [
                            'url' => \Elementor\Utils::get_placeholder_image_src(),
                        ],
                        'condition' => [
                            'gofly_customer_experience_choose' => 'image',
                        ],
                    ],
                    [
                        'name'        => 'gofly_customer_experience_video',
                        'label'       => esc_html__('Choose Video', 'gofly-core'),
                        'type'        => \Elementor\Controls_Manager::MEDIA,
                        'media_types' => ['video'],
                        'default'     => [
                            'url' => \Elementor\Utils::get_placeholder_image_src(),
                        ],
                        'condition'   => [
                            'gofly_customer_experience_choose' => 'video',
                        ],
                    ]
                ],
                'title_field' => '{{{ "Experience Gallery" }}}',
                'condition'   => [
                    'gofly_customer_experience_section_style_selection' => ['style_one'],
                ]
            ]
        );


        $repeater = new \Elementor\Repeater();

        $repeater->add_control(
            'gofly_customer_experience_choose_story_card_style_selection',
            [
                'label'   => esc_html__('Select Card Style', 'gofly-core'),
                'type'    => Controls_Manager::SELECT,
                'options' => [
                    'one' => esc_html__('One', 'gofly-core'),
                    'two' => esc_html__('Two', 'gofly-core'),
                ],
                'default' => 'one',
            ]
        );

        $repeater->add_control(
            'gofly_customer_experience_choose_story_card_type_selection',
            [
                'label'   => esc_html__('Select Card Type', 'gofly-core'),
                'type'    => Controls_Manager::SELECT,
                'options' => [
                    'image' => esc_html__('Image', 'gofly-core'),
                    'video' => esc_html__('Video', 'gofly-core'),
                ],
                'default' => 'image',
            ]
        );


        $repeater->add_control(
            'gofly_customer_experience_choose_story_card_image',
            [
                'label'   => esc_html__('Card Image', 'gofly-core'),
                'type'    => \Elementor\Controls_Manager::MEDIA,
                'default' => [
                    'url' => \Elementor\Utils::get_placeholder_image_src(),
                ],
                'media_types' => ['image'],
                'condition'   => [
                    'gofly_customer_experience_choose_story_card_type_selection' => ['image'],
                ]
            ]
        );

        $repeater->add_control(
            'gofly_customer_experience_choose_story_card_video',
            [
                'label'   => esc_html__('Card Video', 'gofly-core'),
                'type'    => \Elementor\Controls_Manager::MEDIA,
                'default' => [
                    'url' => \Elementor\Utils::get_placeholder_image_src(),
                ],
                'media_types' => ['video'],
                'condition'   => [
                    'gofly_customer_experience_choose_story_card_type_selection' => ['video'],
                ]
            ]
        );


        $repeater->add_control(
            'gofly_customer_experience_choose_logo_image',
            [
                'label'   => esc_html__('Logo Image', 'gofly-core'),
                'type'    => \Elementor\Controls_Manager::MEDIA,
                'default' => [
                    'url' => \Elementor\Utils::get_placeholder_image_src(),
                ],
                'media_types' => ['image', 'svg'],
            ]
        );

        $repeater->add_control(
            'gofly_customer_experience_choose_author_description',
            [
                'label'       => esc_html__('Author Description', 'gofly-core'),
                'type'        => \Elementor\Controls_Manager::TEXTAREA,
                'default'     => esc_html__('Fast response, accurate documentation, & friendly service.', 'gofly-core'),
                'placeholder' => esc_html__('write your text here', 'gofly-core'),
                'label_block' => true,
                'condition'   => [
                    'gofly_customer_experience_choose_story_card_style_selection' => ['one'],
                ]
            ]
        );

        $repeater->add_control(
            'gofly_customer_experience_choose_author_name',
            [
                'label'       => esc_html__('Author Name', 'gofly-core'),
                'type'        => \Elementor\Controls_Manager::TEXT,
                'default'     => esc_html__('Mrs. Emelia Jong', 'gofly-core'),
                'placeholder' => esc_html__('write your text here', 'gofly-core'),
                'label_block' => true,
                'condition'   => [
                    'gofly_customer_experience_choose_story_card_style_selection' => ['one'],
                ]
            ]
        );

        $repeater->add_control(
            'gofly_customer_experience_choose_author_designation',
            [
                'label'       => esc_html__('Author Designation', 'gofly-core'),
                'type'        => \Elementor\Controls_Manager::TEXT,
                'default'     => esc_html__('UK Student', 'gofly-core'),
                'placeholder' => esc_html__('write your text here', 'gofly-core'),
                'label_block' => true,
                'condition'   => [
                    'gofly_customer_experience_choose_story_card_style_selection' => ['one'],
                ]
            ]
        );


        $this->add_control(
            'gofly_customer_experience_choose_author_list',
            [
                'label'   => esc_html__('Content List', 'gofly-core'),
                'type'    => \Elementor\Controls_Manager::REPEATER,
                'fields'  => $repeater->get_controls(),
                'default' => [
                    [
                        'gofly_customer_experience_choose_author_name' => esc_html('Mrs. Emily Patowary'),
                    ],
                    [
                        'gofly_customer_experience_choose_author_name' => '',
                    ],
                    [
                        'gofly_customer_experience_choose_author_name' => esc_html('Mrs. Emelia Jong'),
                    ],
                ],
                'title_field' => '{{{ gofly_customer_experience_choose_author_name }}}',
                'condition'   => [
                    'gofly_customer_experience_section_style_selection' => ['style_two'],
                ]
            ]
        );


        $this->end_controls_section();

        //============Style two Start=============//

        $this->start_controls_section(
            'gofly_customer_experience_style_section',
            [
                'label'     => esc_html__('Styles', 'gofly-core'),
                'tab'       => Controls_Manager::TAB_STYLE,
                'condition' => [
                    'gofly_customer_experience_section_style_selection' => 'style_two',
                ],
            ]
        );

        $this->add_control(
            'gofly_customer_experience_style_section_header_title',
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
                'name'     => 'gofly_customer_experience_style_section_header_title_typ',
                'selector' => '{{WRAPPER}} .section-title h2',

            ]
        );

        $this->add_control(
            'gofly_customer_experience_style_section_header_title_color',
            [
                'label'     => esc_html__('Color', 'gofly-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .section-title h2' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'gofly_customer_experience_style_section_header_description',
            [
                'label'     => esc_html__('Header Description', 'gofly-core'),
                'type'      => \Elementor\Controls_Manager::HEADING,
                'separator' => 'after',
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'label'    => esc_html__('Typography', 'gofly-core'),
                'name'     => 'gofly_customer_experience_style_section_header_description_typ',
                'selector' => '{{WRAPPER}} .section-title p',

            ]
        );

        $this->add_control(
            'gofly_customer_experience_style_section_header_description_color',
            [
                'label'     => esc_html__('Color', 'gofly-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .section-title p' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'gofly_customer_experience_style_section_content_description',
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
                'name'     => 'gofly_customer_experience_style_section_content_description_typ',
                'selector' => '{{WRAPPER}} .visa-dt-success-story-section .destionation-dt-customer-gallery-slider .success-story-card .success-story-content-wrap .success-story-content h5',

            ]
        );

        $this->add_control(
            'gofly_customer_experience_style_section_content_description_color',
            [
                'label'     => esc_html__('Color', 'gofly-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .visa-dt-success-story-section .destionation-dt-customer-gallery-slider .success-story-card .success-story-content-wrap .success-story-content h5' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'gofly_customer_experience_style_section_content_author_name',
            [
                'label'     => esc_html__('Content Author Name', 'gofly-core'),
                'type'      => \Elementor\Controls_Manager::HEADING,
                'separator' => 'after',
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'label'    => esc_html__('Typography', 'gofly-core'),
                'name'     => 'gofly_customer_experience_style_section_content_author_name_typ',
                'selector' => '{{WRAPPER}} .visa-dt-success-story-section .destionation-dt-customer-gallery-slider .success-story-card .success-story-content-wrap .success-story-content .author-info h6',

            ]
        );

        $this->add_control(
            'gofly_customer_experience_style_section_content_author_name_color',
            [
                'label'     => esc_html__('Color', 'gofly-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .visa-dt-success-story-section .destionation-dt-customer-gallery-slider .success-story-card .success-story-content-wrap .success-story-content .author-info h6' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'gofly_customer_experience_style_section_content_author_designation',
            [
                'label'     => esc_html__('Content Author Designation', 'gofly-core'),
                'type'      => \Elementor\Controls_Manager::HEADING,
                'separator' => 'after',
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'label'    => esc_html__('Typography', 'gofly-core'),
                'name'     => 'gofly_customer_experience_style_section_content_author_designation_typ',
                'selector' => '{{WRAPPER}} .visa-dt-success-story-section .destionation-dt-customer-gallery-slider .success-story-card .success-story-content-wrap .success-story-content .author-info span',

            ]
        );

        $this->add_control(
            'gofly_customer_experience_style_section_content_author_designation_color',
            [
                'label'     => esc_html__('Color', 'gofly-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .visa-dt-success-story-section .destionation-dt-customer-gallery-slider .success-story-card .success-story-content-wrap .success-story-content .author-info span' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->end_controls_section();
    }
    protected function render()
    {

        $settings = $this->get_settings_for_display();

        $gallery_list = $settings['gofly_customer_experience_list'];

?>

        <?php if (is_admin()): ?>
            <script>
                var swiper = new Swiper(".destionation-dt-customer-gallery-slider", {
                    slidesPerView: 1,
                    speed: 1500,
                    spaceBetween: 30,
                    autoplay: {
                        delay: 2500,
                        pauseOnMouseEnter: true,
                        disableOnInteraction: false,
                    },
                    breakpoints: {
                        280: {
                            slidesPerView: 1,
                        },
                        386: {
                            slidesPerView: 1,
                        },
                        576: {
                            slidesPerView: 2,
                            spaceBetween: 15,
                        },
                        768: {
                            slidesPerView: 3,
                        },
                        992: {
                            slidesPerView: 4,
                            spaceBetween: 15,
                        },
                        1200: {
                            slidesPerView: 5,
                            spaceBetween: 15,
                        },
                        1400: {
                            slidesPerView: 5,
                            spaceBetween: 24,
                        },
                    },
                });
            </script>
        <?php endif; ?>

        <?php if ($settings['gofly_customer_experience_section_style_selection'] == 'style_one'): ?>
            <div class="destionation-dt-customer-gallery-section">
                <div class="container-fluid">
                    <?php if (!empty($settings['gofly_customer_experience_title'])): ?>
                        <div class="section-title text-center mb-60 wow animate fadeInDown" data-wow-delay="200ms" data-wow-duration="1500ms">
                            <h2><?php echo esc_html($settings['gofly_customer_experience_title']); ?></h2>
                        </div>
                    <?php endif; ?>
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="swiper destionation-dt-customer-gallery-slider">
                                <div class="swiper-wrapper">
                                    <?php foreach ($gallery_list as $list): ?>
                                        <div class="swiper-slide">
                                            <?php if (!empty($list['gofly_customer_experience_choose']) && $list['gofly_customer_experience_choose'] === 'image' && !empty($list['gofly_customer_experience_image']['url'])): ?>
                                                <img src="<?php echo esc_url($list['gofly_customer_experience_image']['url']); ?>" alt="<?php echo esc_attr__('image', 'gofly-core') ?>">
                                            <?php elseif (!empty($list['gofly_customer_experience_choose']) && $list['gofly_customer_experience_choose'] === 'video' && !empty($list['gofly_customer_experience_video']['url'])): ?>
                                                <?php if (!empty($list['gofly_customer_experience_video']['url'])) : ?>
                                                    <div class="video-area">
                                                        <video autoplay loop muted playsinline>
                                                            <source src="<?php echo esc_url($list['gofly_customer_experience_video']['url']); ?>" type="video/mp4">
                                                        </video>
                                                    </div>
                                                <?php endif; ?>
                                            <?php endif; ?>
                                        </div>
                                    <?php endforeach; ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        <?php endif; ?>

        <?php if ($settings['gofly_customer_experience_section_style_selection'] == 'style_two'): ?>
            <div class="visa-dt-success-story-section">
                <div class="container">
                    <div class="section-title two mb-50 wow animate fadeInDown" data-wow-delay="200ms" data-wow-duration="1500ms">
                        <?php if (!empty($settings['gofly_customer_experience_title'])): ?>
                            <h2><?php echo esc_html($settings['gofly_customer_experience_title']); ?></h2>
                        <?php endif; ?>
                        <?php if (!empty($settings['gofly_customer_experience_description'])): ?>
                            <p><?php echo esc_html($settings['gofly_customer_experience_description']); ?></p>
                        <?php endif; ?>
                    </div>
                </div>

                <div class="container-fluid">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="swiper destionation-dt-customer-gallery-slider">
                                <div class="swiper-wrapper">
                                    <?php foreach ($settings['gofly_customer_experience_choose_author_list'] as $data): ?>
                                        <div class="swiper-slide">
                                            <div class="success-story-card">
                                                <?php if ($data['gofly_customer_experience_choose_story_card_type_selection'] == 'image'): ?>
                                                    <img src="<?php echo esc_url($data['gofly_customer_experience_choose_story_card_image']['url']); ?>" alt="<?php echo esc_attr__('card-image', 'gofly-core'); ?>">
                                                <?php elseif ($data['gofly_customer_experience_choose_story_card_type_selection'] == 'video'): ?>
                                                    <div class="video-area">
                                                        <video autoplay loop muted playsinline src="<?php echo esc_url($data['gofly_customer_experience_choose_story_card_video']['url']); ?>"></video>
                                                    </div>
                                                <?php endif; ?>

                                                <?php if ($data['gofly_customer_experience_choose_story_card_style_selection'] == 'one'): ?>
                                                    <div class="success-story-content-wrap">
                                                        <?php if (!empty($data['gofly_customer_experience_choose_logo_image']['url'])): ?>
                                                            <img src="<?php echo esc_url($data['gofly_customer_experience_choose_logo_image']['url']); ?>" alt="<?php echo esc_attr__('logo-image', 'gofly-core'); ?>">
                                                        <?php endif; ?>
                                                        <div class="success-story-content">
                                                            <?php if (!empty($data['gofly_customer_experience_choose_author_description'])): ?>
                                                                <h5><?php echo esc_html($data['gofly_customer_experience_choose_author_description']); ?></h5>
                                                            <?php endif; ?>
                                                            <div class="author-info">
                                                                <?php if (!empty($data['gofly_customer_experience_choose_author_name'])): ?>
                                                                    <h6><?php echo esc_html($data['gofly_customer_experience_choose_author_name']); ?></h6>
                                                                <?php endif; ?>
                                                                <?php if (!empty($data['gofly_customer_experience_choose_author_designation'])): ?>
                                                                    <span><?php echo esc_html($data['gofly_customer_experience_choose_author_designation']); ?></span>
                                                                <?php endif; ?>
                                                            </div>
                                                        </div>
                                                    </div>
                                                <?php else: ?>
                                                    <div class="success-story-content-wrap">
                                                        <?php if (!empty($data['gofly_customer_experience_choose_logo_image']['url'])): ?>
                                                            <img src="<?php echo esc_url($data['gofly_customer_experience_choose_logo_image']['url']); ?>" alt="<?php echo esc_attr__('logo-image', 'gofly-core'); ?>">
                                                        <?php endif; ?>
                                                    </div>
                                                <?php endif; ?>
                                            </div>
                                        </div>
                                    <?php endforeach; ?>
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

Plugin::instance()->widgets_manager->register(new Gofly_Customer_Experience_Widget());
