<?php

namespace Elementor;

if (!defined('ABSPATH')) exit;  // Exit if accessed directly

use Elementor\core\Schemes;
use Egns_Core\Egns_Helper;

class Gofly_FAQ_Widget extends Widget_Base
{

    public function get_name()
    {
        return 'gofly_faqs';
    }

    public function get_title()
    {
        return esc_html__("EG FAQ's", 'gofly-core');
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

        //===================== FAQ's Content =======================//

        $this->start_controls_section(
            'gofly_faqs_content_section',
            [
                'label' => esc_html__("FAQ's Content", 'gofly-core')
            ]
        );

        $this->add_control(
            'gofly_faqs_content_section_style_selection',
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
            'gofly_faqs_title',
            [
                'label'       => esc_html__('Title', 'gofly-core'),
                'type'        => \Elementor\Controls_Manager::TEXT,
                'default'     => esc_html__('General Questions', 'gofly-core'),
                'placeholder' => esc_html__('Type your name here', 'gofly-core'),
                'label_block' => true,
            ]
        );

        $this->add_control(
            'gofly_faqs_short_description',
            [
                'label'       => esc_html__('Short Desciption', 'gofly-core'),
                'type'        => \Elementor\Controls_Manager::TEXTAREA,
                'default'     => esc_html__('We’re committed to offering more than just products—we provide exceptional experiences.', 'gofly-core'),
                'placeholder' => esc_html__('Type your value here', 'gofly-core'),
                'label_block' => true,
            ]
        );

        $this->add_control(
            'gofly_faqs_list',
            [
                'label'  => esc_html__("FAQ's list", 'gofly-core'),
                'type'   => \Elementor\Controls_Manager::REPEATER,
                'fields' => [
                    [
                        'name'        => 'gofly_faqs_question',
                        'label'       => esc_html__('Title', 'gofly-core'),
                        'type'        => \Elementor\Controls_Manager::TEXT,
                        'default'     => esc_html__('What Services Does Your Travel Agency Provide?', 'gofly-core'),
                        'label_block' => true,
                    ],
                    [
                        'name'       => 'gofly_faqs_answer',
                        'label'      => esc_html__('Content', 'gofly-core'),
                        'type'       => \Elementor\Controls_Manager::WYSIWYG,
                        'default'    => wp_kses_post('A travel agency typically provides a wide range of services to ensure a smooth and enjoyable travel experience. As like- <span>Hotel booking, Flight Booking, Visa & Customized Travel Pakcge etc.</span>'),
                        'show_label' => false,
                    ],
                ],
                'default' => [
                    [
                        'gofly_faqs_question' => esc_html__('What Services Does Your Travel Agency Provide?', 'gofly-core'),
                        'gofly_faqs_answer'   => wp_kses_post('A travel agency typically provides a wide range of services to ensure a smooth and enjoyable travel experience. As like- <span>Hotel booking, Flight Booking, Visa & Customized Travel Pakcge etc.</span>'),
                    ],
                ],
                'title_field' => '{{{ gofly_faqs_question }}}',
            ]
        );

        $this->end_controls_section();

        //===================== Contact Content Style =======================//


        // Style Card
        $this->start_controls_section(
            'gofly_faqs_content_style_section',
            [
                'label' => esc_html__("FAQ's Style", 'gofly-core'),
                'tab'   => \Elementor\Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_control(
            'gofly_faqs_content_style_section_header_title',
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
                'name'     => 'gofly_faqs_content_style_section_header_title_typ',
                'selector' => '{{WRAPPER}} .section-title h2',

            ]
        );

        $this->add_control(
            'gofly_faqs_content_style_section_header_title_color',
            [
                'label'     => esc_html__('Color', 'gofly-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .section-title h2' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'gofly_faqs_content_style_section_header_description',
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
                'name'     => 'gofly_faqs_content_style_section_header_description_typ',
                'selector' => '{{WRAPPER}} .section-title p',

            ]
        );

        $this->add_control(
            'gofly_faqs_content_style_section_header_description_color',
            [
                'label'     => esc_html__('Color', 'gofly-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .section-title p' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'gofly_faqs_content_style_section_faq_title',
            [
                'label'     => esc_html__('FAQ Title', 'gofly-core'),
                'type'      => \Elementor\Controls_Manager::HEADING,
                'separator' => 'after',
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'label'    => esc_html__('Typography', 'gofly-core'),
                'name'     => 'gofly_faqs_content_style_section_faq_title_typ',
                'selector' => '{{WRAPPER}} .faq-wrap .accordion .accordion-item .accordion-header .accordion-button',

            ]
        );

        $this->add_control(
            'gofly_faqs_content_style_section_faq_title_color',
            [
                'label'     => esc_html__('Color', 'gofly-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .faq-wrap .accordion .accordion-item .accordion-header .accordion-button' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'gofly_faqs_content_style_section_faq_title_bg_color',
            [
                'label'     => esc_html__('Background Color', 'gofly-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .faq-wrap .accordion .accordion-item .accordion-header .accordion-button' => 'background-color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'gofly_faqs_content_style_section_faq_title_bg_colorr',
            [
                'label'     => esc_html__('Background Color ( collapse )', 'gofly-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .faq-wrap .accordion .accordion-item' => 'background-color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'gofly_faqs_content_style_section_faq_description',
            [
                'label'     => esc_html__('FAQ Description', 'gofly-core'),
                'type'      => \Elementor\Controls_Manager::HEADING,
                'separator' => 'after',
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'label'    => esc_html__('Typography', 'gofly-core'),
                'name'     => 'gofly_faqs_content_style_section_faq_description_typ',
                'selector' => '{{WRAPPER}} .faq-wrap .accordion .accordion-item .accordion-body',

            ]
        );

        $this->add_control(
            'gofly_faqs_content_style_section_faq_description_color',
            [
                'label'     => esc_html__('Color', 'gofly-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .faq-wrap .accordion .accordion-item .accordion-body' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'gofly_faqs_content_style_section_faq_collpesed_border_color',
            [
                'label'     => esc_html__('Border Color ( collapsed )', 'gofly-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .faq-wrap .accordion .accordion-item .accordion-header .accordion-button:not(.collapsed)' => 'border: 1px solid {{VALUE}};',
                    '{{WRAPPER}} .faq-wrap .accordion .accordion-item .accordion-body'                                     => 'border: 1px solid {{VALUE}};',
                ],
            ]
        );


        $this->add_control(
            'gofly_faqs_content_style_section_faq_description_bg_color',
            [
                'label'     => esc_html__('Background Color', 'gofly-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .faq-wrap .accordion .accordion-item .accordion-body' => 'background-color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'gofly_faqs_content_style_section_faq_arrow',
            [
                'label'     => esc_html__('FAQ Arrow', 'gofly-core'),
                'type'      => \Elementor\Controls_Manager::HEADING,
                'separator' => 'after',
            ]
        );

        $this->add_control(
            'gofly_faqs_content_style_section_faq_arrow_color',
            [
                'label'     => esc_html__('Color', 'gofly-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .faq-wrap .accordion .accordion-item .accordion-header .accordion-button::after' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'gofly_faqs_content_style_section_faq_arrow_color_after',
            [
                'label'     => esc_html__('Arrow After Color', 'gofly-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .faq-wrap .accordion .accordion-item .accordion-header .accordion-button:not(.collapsed)::after' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->end_controls_section();
    }
    protected function render()
    {

        $settings = $this->get_settings_for_display();

        $uniqID    = uniqid();
        $faqs_list = $settings['gofly_faqs_list'];

?>


        <?php if ($settings['gofly_faqs_content_section_style_selection'] == 'style_one'): ?>
            <div class="faq-page">
                <div class="mb-50 wow animate fadeInDown" data-wow-delay="200ms" data-wow-duration="1500ms">
                    <div class="section-title text-center">
                        <?php if (!empty($settings['gofly_faqs_title'])): ?>
                            <h2><?php echo esc_html($settings['gofly_faqs_title']) ?></h2>
                        <?php endif; ?>
                        <?php if (!empty($settings['gofly_faqs_short_description'])): ?>
                            <p><?php echo esc_html($settings['gofly_faqs_short_description']) ?></p>
                        <?php endif; ?>
                    </div>
                </div>
                <div class="faq-wrap">
                    <div class="accordion accordion-flush" id="accordionFlush<?php echo esc_attr($uniqID) ?>">
                        <?php foreach ($faqs_list as $key => $list): ?>
                            <div class="accordion-item wow animate fadeInDown" data-wow-delay="<?php echo ($key * 200) ?>ms" data-wow-duration="1500ms">
                                <h5 class="accordion-header" id="flush-heading<?php echo esc_attr($key) ?>">
                                    <button class="accordion-button <?php echo esc_attr($key == 0 ? '' : 'collapsed') ?>" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapse<?php echo esc_attr($key) ?>" aria-expanded="false" aria-controls="flush-collapse<?php echo esc_attr($key) ?>">
                                        <?php if (!empty($list['gofly_faqs_question'])): ?>
                                            <?php echo esc_html($list['gofly_faqs_question']) ?>
                                        <?php endif; ?>
                                    </button>
                                </h5>
                                <div id="flush-collapse<?php echo esc_attr($key) ?>" class="accordion-collapse collapse <?php echo esc_attr($key == 0 ? 'show' : '') ?>" aria-labelledby="flush-heading<?php echo esc_attr($key) ?>" data-bs-parent="#accordionFlush<?php echo esc_attr($uniqID) ?>">
                                    <?php if (!empty($list['gofly_faqs_answer'])): ?>
                                        <div class="accordion-body">
                                            <?php echo wp_kses_post($list['gofly_faqs_answer']) ?>
                                        </div>
                                    <?php endif; ?>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    </div>
                </div>
            </div>
        <?php endif; ?>

        <?php if ($settings['gofly_faqs_content_section_style_selection'] == 'style_two'): ?>
            <div class="home6-faq-section">
                <div class="container">
                    <div class="faq-section-wrap">
                        <div class="row justify-content-center mb-50 wow animate fadeInDown" data-wow-delay="200ms" data-wow-duration="1500ms">
                            <div class="col-xl-6 col-lg-8">
                                <div class="section-title text-center">
                                    <?php if (!empty($settings['gofly_faqs_title'])): ?>
                                        <h2><?php echo esc_html($settings['gofly_faqs_title']) ?></h2>
                                    <?php endif; ?>
                                    <?php if (!empty($settings['gofly_faqs_short_description'])): ?>
                                        <p><?php echo esc_html($settings['gofly_faqs_short_description']) ?></p>
                                    <?php endif; ?>
                                </div>
                            </div>
                        </div>
                        <div class="row justify-content-center">
                            <div class="col-xl-8 col-lg-10">
                                <div class="faq-wrap">
                                    <div class="accordion accordion-flush" id="accordionFlush<?php echo esc_attr($uniqID) ?>">
                                        <?php foreach ($faqs_list as $key => $list): ?>
                                            <div class="accordion-item wow animate fadeInDown" data-wow-delay="<?php echo ($key * 200) ?>ms" data-wow-duration="1500ms">
                                                <h5 class="accordion-header" id="flush-heading<?php echo esc_attr($key) ?>">
                                                    <button class="accordion-button <?php echo esc_attr($key == 0 ? '' : 'collapsed') ?>" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapse<?php echo esc_attr($key) ?>" aria-expanded="false" aria-controls="flush-collapse<?php echo esc_attr($key) ?>">
                                                        <?php if (!empty($list['gofly_faqs_question'])): ?>
                                                            <?php echo esc_html($list['gofly_faqs_question']) ?>
                                                        <?php endif; ?>
                                                    </button>
                                                </h5>
                                                <div id="flush-collapse<?php echo esc_attr($key) ?>" class="accordion-collapse collapse <?php echo esc_attr($key == 0 ? 'show' : '') ?>" aria-labelledby="flush-heading<?php echo esc_attr($key) ?>" data-bs-parent="#accordionFlush<?php echo esc_attr($uniqID) ?>">
                                                    <?php if (!empty($list['gofly_faqs_answer'])): ?>
                                                        <div class="accordion-body">
                                                            <?php echo wp_kses_post($list['gofly_faqs_answer']) ?>
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
            </div>
        <?php endif; ?>

        <?php if ($settings['gofly_faqs_content_section_style_selection'] == 'style_three'): ?>
            <div class="home8-faq-section">
                <div class="container">
                    <div class="row justify-content-center mb-50 wow animate fadeInDown" data-wow-delay="200ms" data-wow-duration="1500ms">
                        <div class="col-xl-6 col-lg-8">
                            <div class="section-title text-center">
                                <?php if (!empty($settings['gofly_faqs_title'])): ?>
                                    <h2><?php echo esc_html($settings['gofly_faqs_title']) ?></h2>
                                <?php endif; ?>
                                <?php if (!empty($settings['gofly_faqs_short_description'])): ?>
                                    <p><?php echo esc_html($settings['gofly_faqs_short_description']) ?></p>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                    <div class="row justify-content-center">
                        <div class="col-xl-8 col-lg-10">
                            <div class="faq-wrap three">
                                <div class="accordion accordion-flush" id="accordionFlush<?php echo esc_attr($uniqID) ?>">
                                    <?php foreach ($faqs_list as $key => $list): ?>
                                        <div class="accordion-item wow animate fadeInDown" data-wow-delay="200ms" data-wow-duration="1500ms">
                                            <h5 class="accordion-header" id="flush-heading<?php echo esc_attr($key) ?>">
                                                <button class="accordion-button <?php echo esc_attr($key == 0 ? '' : 'collapsed') ?>" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapse<?php echo esc_attr($key) ?>" aria-expanded="false" aria-controls="flush-collapse<?php echo esc_attr($key) ?>">
                                                    <?php if (!empty($list['gofly_faqs_question'])): ?>
                                                        <?php echo esc_html($list['gofly_faqs_question']) ?>
                                                    <?php endif; ?>
                                                </button>
                                            </h5>
                                            <div id="flush-collapse<?php echo esc_attr($key) ?>" class="accordion-collapse collapse <?php echo esc_attr($key == 0 ? 'show' : '') ?>" aria-labelledby="flush-heading<?php echo esc_attr($key) ?>" data-bs-parent="#accordionFlush<?php echo esc_attr($uniqID) ?>">
                                                <?php if (!empty($list['gofly_faqs_answer'])): ?>
                                                    <div class="accordion-body">
                                                        <?php echo wp_kses_post($list['gofly_faqs_answer']) ?>
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

Plugin::instance()->widgets_manager->register(new Gofly_FAQ_Widget());
