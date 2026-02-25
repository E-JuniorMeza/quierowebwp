<?php

namespace Elementor;

if (!defined('ABSPATH')) exit;  // Exit if accessed directly

use Egns_Core;
use Elementor\core\Schemes;
use Egns_Core\Egns_Helper;

class Gofly_Destination_Post_Title_Widget extends Widget_Base
{

    public function get_name()
    {
        return 'gofly_destination_post_title';
    }

    public function get_title()
    {
        return esc_html__('EG Destination Post Title', 'gofly-core');
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
            'gofly_destination_genaral_section',
            [
                'label' => esc_html__('General', 'gofly-core')
            ]
        );

        $this->add_control(
            'custom_panel_notice',
            [
                'type' => \Elementor\Controls_Manager::NOTICE,
                'notice_type' => 'warning',
                'dismissible' => true,
                'heading' => esc_html__('This Widgets Notice', 'gofly-core'),
                'content' => esc_html__('Only work for custom post "Destination" details page.', 'gofly-core'),
            ]
        );



        $this->end_controls_section();

        /************ Styles Start **********/
        $this->start_controls_section(
            'gofly_destination_genaral_section_style',
            [
                'label' => esc_html__('Style', 'gofly-core'),
                'tab'  => Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_control(
            'gofly_destination_general_title',
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
                'name'     => 'gofly_destination_general_title_typ',
                'selector' => '{{WRAPPER}} .destination-details-section .destination-details-content h2',

            ]
        );

        $this->add_control(
            'gofly_destination_general_title_color',
            [
                'label'     => esc_html__('Color', 'gofly-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .destination-details-section .destination-details-content h2' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->end_controls_section();
    }
    protected function render()
    {

        $settings = $this->get_settings_for_display();

        $id = get_the_ID();

?>
        <div class="destination-details-section">
            <div class="container">
                <div class="row justify-content-center wow animate fadeInDown" data-wow-delay="200ms" data-wow-duration="1500ms">
                    <div class="col-lg-10">
                        <div class="destination-details-content">
                            <h2><?php echo esc_html(get_the_title($id)) ?></h2>
                        </div>
                    </div>
                </div>

            </div>
        </div>

<?php

    }
}

Plugin::instance()->widgets_manager->register(new Gofly_Destination_Post_Title_Widget());
