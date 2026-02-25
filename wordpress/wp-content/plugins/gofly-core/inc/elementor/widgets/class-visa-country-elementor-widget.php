<?php

namespace Elementor;

if (!defined('ABSPATH')) exit;  // Exit if accessed directly

use Elementor\core\Schemes;
use Egns_Core\Egns_Helper;

class Gofly_Visa_Country_Widget extends Widget_Base
{

    public function get_name()
    {
        return 'gofly_country';
    }

    public function get_title()
    {
        return esc_html__('EG Visa Country', 'gofly-core');
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
            'gofly_visa_country_genaral',
            [
                'label' => esc_html__('General', 'gofly-core')
            ]
        );

        $this->add_control(
            'gofly_visa_country_genaral_continent_icon',
            [
                'label'       => esc_html__('Continent Icon Image', 'gofly-core'),
                'type'        => \Elementor\Controls_Manager::MEDIA,
                'media_types' => ['svg', 'image'],
                'default'     => [
                    'url' => \Elementor\Utils::get_placeholder_image_src(),
                ]
            ]
        );

        $this->add_control(
            'gofly_visa_country_genaral_continent_title',
            [
                'label'       => esc_html__('Continent Title', 'gofly-core'),
                'type'        => \Elementor\Controls_Manager::TEXT,
                'default'     => esc_html__('North America', 'gofly-core'),
                'placeholder' => esc_html__('write your continent title here', 'gofly-core'),
                'label_block' => true,
            ]
        );

        $repeater = new \Elementor\Repeater();

        $repeater->add_control(
            'gofly_visa_country_genaral_country_image',
            [
                'label'       => esc_html__('Country Icon Image', 'gofly-core'),
                'type'        => \Elementor\Controls_Manager::MEDIA,
                'media_types' => ['svg', 'image'],
                'default'     => [
                    'url' => \Elementor\Utils::get_placeholder_image_src(),
                ]
            ]
        );

        $repeater->add_control(
            'gofly_visa_country_genaral_country_name',
            [
                'label'       => esc_html__('Country Name', 'gofly-core'),
                'type'        => \Elementor\Controls_Manager::TEXT,
                'default'     => wp_kses('United States', wp_kses_allowed_html('post')),
                'placeholder' => esc_html__('write your title here', 'gofly-core'),
                'label_block' => true,
            ]
        );

        $repeater->add_control(
            'gofly_visa_country_genaral_country_name_link',
            [
                'label'       => esc_html__('URL/Link', 'gofly-core'),
                'type'        => \Elementor\Controls_Manager::URL,
                'default'     => ['url' => '#'],
                'placeholder' => esc_html__('write your url here', 'gofly-core'),
                'label_block' => true,
            ]
        );

        $this->add_control(
            'gofly_visa_country_genaral_country_list',
            [
                'label'   => esc_html__('Country List', 'gofly-core'),
                'type'    => \Elementor\Controls_Manager::REPEATER,
                'fields'  => $repeater->get_controls(),
                'default' => [
                    [
                        'gofly_visa_country_genaral_country_name' => wp_kses('United States', wp_kses_allowed_html('post')),
                    ],
                    [
                        'gofly_visa_country_genaral_country_name' => wp_kses('Canada', wp_kses_allowed_html('post')),
                    ],
                    [
                        'gofly_visa_country_genaral_country_name' => wp_kses('Mexico', wp_kses_allowed_html('post')),
                    ],
                ],
                'title_field' => '{{{ gofly_visa_country_genaral_country_name }}}',
            ]
        );

        $this->add_control(
            'gofly_visa_country_genaral_country_button_label',
            [
                'label'       => esc_html__('Button Label', 'gofly-core'),
                'type'        => \Elementor\Controls_Manager::TEXT,
                'default'     => esc_html__('Free Consultation', 'gofly-core'),
                'placeholder' => esc_html__('write your label here', 'gofly-core'),
                'label_block' => true,
            ]
        );

        $this->add_control(
            'gofly_visa_country_genaral_country_button_label_url',
            [
                'label'       => esc_html__('Button Link/URL', 'gofly-core'),
                'type'        => \Elementor\Controls_Manager::URL,
                'default'     => ['url' => '#'],
                'placeholder' => esc_html__('write your url here', 'gofly-core'),
                'label_block' => true,
            ]
        );

        $this->end_controls_section();

        // ======== Style Start ======== //
        $this->start_controls_section(
            'gofly_visa_country_style',
            [
                'label' => esc_html__('Style', 'gofly-core'),
                'tab'   => Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_control(
            'gofly_visa_country_style_global_section',
            [
                'label'     => esc_html__('Global Section', 'gofly-core'),
                'type'      => \Elementor\Controls_Manager::HEADING,
                'separator' => 'after',
            ]
        );

        $this->add_control(
            'gofly_visa_country_style_global_section_border_color',
            [
                'label'     => esc_html__('Border Color', 'gofly-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .home8-country-serve-section .single-item' => 'border: 1px solid {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'gofly_visa_country_style_continent_title',
            [
                'label'     => esc_html__('Continent Title', 'gofly-core'),
                'type'      => \Elementor\Controls_Manager::HEADING,
                'separator' => 'after',
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'label'    => esc_html__('Typography', 'gofly-core'),
                'name'     => 'gofly_visa_country_style_continent_title_typ',
                'selector' => '{{WRAPPER}} .home8-country-serve-section .single-item .title-area h4',

            ]
        );

        $this->add_control(
            'gofly_visa_country_style_continent_title_color',
            [
                'label'     => esc_html__('Color', 'gofly-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .home8-country-serve-section .single-item .title-area h4' => 'color: {{VALUE}};',
                ],
            ]
        );


        $this->add_control(
            'gofly_visa_country_style_continent_title_border_line_color',
            [
                'label'     => esc_html__('Border Line Color', 'gofly-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .home8-country-serve-section .single-item .line' => 'fill: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'gofly_visa_country_style_country_name',
            [
                'label'     => esc_html__('Country Name', 'gofly-core'),
                'type'      => \Elementor\Controls_Manager::HEADING,
                'separator' => 'after',
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'label'    => esc_html__('Typography', 'gofly-core'),
                'name'     => 'gofly_visa_country_style_country_name_typ',
                'selector' => '{{WRAPPER}} .home8-country-serve-section .single-item ul li',

            ]
        );

        $this->add_control(
            'gofly_visa_country_style_country_name_color',
            [
                'label'     => esc_html__('Color', 'gofly-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .home8-country-serve-section .single-item ul li' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'gofly_visa_country_style_country_button',
            [
                'label'     => esc_html__('Country Button', 'gofly-core'),
                'type'      => \Elementor\Controls_Manager::HEADING,
                'separator' => 'after',
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'label'    => esc_html__('Typography', 'gofly-core'),
                'name'     => 'gofly_visa_country_style_country_button_typ',
                'selector' => '{{WRAPPER}} .primary-btn1',

            ]
        );

        $this->add_control(
            'gofly_visa_country_style_country_button_color',
            [
                'label'     => esc_html__('Color', 'gofly-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .primary-btn1' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'gofly_visa_country_style_country_button_hover_color',
            [
                'label'     => esc_html__('Hover Color', 'gofly-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .primary-btn1:hover' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'gofly_visa_country_style_country_button_icon_color',
            [
                'label'     => esc_html__('Icon Color', 'gofly-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .primary-btn1 > span svg' => 'fill: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'gofly_visa_country_style_country_button_bg_color',
            [
                'label'     => esc_html__('Background Color', 'gofly-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .primary-btn1.five' => 'background-color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'gofly_visa_country_style_country_button_hover_bg_color',
            [
                'label'     => esc_html__('Hover Background Color', 'gofly-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .primary-btn1::after' => 'background-color: {{VALUE}};',
                ],
            ]
        );

        $this->end_controls_section();
    }
    protected function render()
    {

        $settings = $this->get_settings_for_display();

?>

        <div class="home8-country-serve-section">
            <div class="row g-xl-4 g-md-3 g-4">
                <div class="col-lg-12 wow animate fadeInUp animated" data-wow-delay="200ms" data-wow-duration="1500ms" style="visibility: visible; animation-duration: 1500ms; animation-delay: 200ms; animation-name: fadeInUp;">
                    <div class="single-item">
                        <div class="title-area">
                            <?php if (!empty($settings['gofly_visa_country_genaral_continent_icon']['url'])) : ?>
                                <img src="<?php echo esc_url($settings['gofly_visa_country_genaral_continent_icon']['url']); ?>" alt="<?php echo esc_attr__('continent Icon Image', 'gofly-core'); ?>">
                            <?php endif; ?>
                            <?php if (!empty($settings['gofly_visa_country_genaral_continent_title'])) : ?>
                                <h4><?php echo esc_html($settings['gofly_visa_country_genaral_continent_title']); ?></h4>
                            <?php endif; ?>
                        </div>
                        <svg class="line" height="6" viewBox="0 0 262 6" xmlns="http://www.w3.org/2000/svg">
                            <path d="M5 2.5L0 0.113249V5.88675L5 3.5V2.5ZM257 3.5L262 5.88675V0.113249L257 2.5V3.5ZM4.5 3.5H257.5V2.5H4.5V3.5Z"></path>
                        </svg>
                        <ul>
                            <?php foreach ($settings['gofly_visa_country_genaral_country_list'] as $data) : ?>
                                <a href="<?php echo esc_url($data['gofly_visa_country_genaral_country_name_link']['url']); ?>" target="_blank">
                                    <li>
                                        <?php if (!empty($data['gofly_visa_country_genaral_country_image']['url'])) : ?>
                                            <img src="<?php echo esc_url($data['gofly_visa_country_genaral_country_image']['url']); ?>" alt="<?php echo esc_attr__('country-image', 'gofly-core'); ?>">
                                        <?php endif; ?>
                                        <?php if (!empty($data['gofly_visa_country_genaral_country_name'])) : ?>
                                            <?php echo esc_html($data['gofly_visa_country_genaral_country_name']); ?>
                                        <?php endif; ?>
                                    </li>
                                </a>
                            <?php endforeach; ?>
                        </ul>
                        <?php if (!empty($settings['gofly_visa_country_genaral_country_button_label'])) : ?>
                            <a class="primary-btn1 two five" href="<?php echo esc_url($settings['gofly_visa_country_genaral_country_button_label_url']['url']); ?>">
                                <span>
                                    <?php echo esc_html($settings['gofly_visa_country_genaral_country_button_label']); ?>
                                    <svg width="10" height="10" viewBox="0 0 10 10" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M9.73535 1.14746C9.57033 1.97255 9.32924 3.26406 9.24902 4.66797C9.16817 6.08312 9.25559 7.5453 9.70214 8.73633C9.84754 9.12406 9.65129 9.55659 9.26367 9.70215C8.9001 9.83849 8.4969 9.67455 8.32812 9.33398L8.29785 9.26367L8.19921 8.98438C7.73487 7.5758 7.67054 5.98959 7.75097 4.58203C7.77875 4.09598 7.82525 3.62422 7.87988 3.17969L1.53027 9.53027C1.23738 9.82317 0.762615 9.82317 0.469722 9.53027C0.176829 9.23738 0.176829 8.76262 0.469722 8.46973L6.83593 2.10254C6.3319 2.16472 5.79596 2.21841 5.25 2.24902C3.8302 2.32862 2.2474 2.26906 0.958003 1.79102L0.704097 1.68945L0.635738 1.65527C0.303274 1.47099 0.157578 1.06102 0.310542 0.704102C0.463655 0.347333 0.860941 0.170391 1.22363 0.28418L1.29589 0.310547L1.48828 0.387695C2.47399 0.751207 3.79966 0.827571 5.16601 0.750977C6.60111 0.670504 7.97842 0.428235 8.86132 0.262695L9.95312 0.0585938L9.73535 1.14746Z">
                                        </path>
                                    </svg>
                                </span>
                                <span>
                                    <?php echo esc_html($settings['gofly_visa_country_genaral_country_button_label']); ?>
                                    <svg width="10" height="10" viewBox="0 0 10 10" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M9.73535 1.14746C9.57033 1.97255 9.32924 3.26406 9.24902 4.66797C9.16817 6.08312 9.25559 7.5453 9.70214 8.73633C9.84754 9.12406 9.65129 9.55659 9.26367 9.70215C8.9001 9.83849 8.4969 9.67455 8.32812 9.33398L8.29785 9.26367L8.19921 8.98438C7.73487 7.5758 7.67054 5.98959 7.75097 4.58203C7.77875 4.09598 7.82525 3.62422 7.87988 3.17969L1.53027 9.53027C1.23738 9.82317 0.762615 9.82317 0.469722 9.53027C0.176829 9.23738 0.176829 8.76262 0.469722 8.46973L6.83593 2.10254C6.3319 2.16472 5.79596 2.21841 5.25 2.24902C3.8302 2.32862 2.2474 2.26906 0.958003 1.79102L0.704097 1.68945L0.635738 1.65527C0.303274 1.47099 0.157578 1.06102 0.310542 0.704102C0.463655 0.347333 0.860941 0.170391 1.22363 0.28418L1.29589 0.310547L1.48828 0.387695C2.47399 0.751207 3.79966 0.827571 5.16601 0.750977C6.60111 0.670504 7.97842 0.428235 8.86132 0.262695L9.95312 0.0585938L9.73535 1.14746Z">
                                        </path>
                                    </svg>
                                </span>
                            </a>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>

<?php

    }
}

Plugin::instance()->widgets_manager->register(new Gofly_Visa_Country_Widget());
