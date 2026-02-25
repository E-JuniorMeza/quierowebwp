<?php

namespace Elementor;

if (!defined('ABSPATH')) exit;  // Exit if accessed directly

use Egns_Core;
use Elementor\core\Schemes;
use Egns_Core\Egns_Helper;

class Gofly_Tour_Itinerary_Image_Widget extends Widget_Base
{

    public function get_name()
    {
        return 'gofly_tour_itinerary';
    }

    public function get_title()
    {
        return esc_html__('EG Tour Itinerary', 'gofly-core');
    }

    public function get_icon()
    {
        return 'egns-widget-icon';
    }

    public function get_categories()
    {
        return ['gofly_tour'];
    }

    protected function register_controls()
    {

        //===================== Content =======================//

        $this->start_controls_section(
            'gofly_tour_itinerary_content_section',
            [
                'label' => esc_html__('Content', 'gofly-core')
            ]
        );
        $this->add_control(
            'tour_custom_panel_notice',
            [
                'type'        => \Elementor\Controls_Manager::NOTICE,
                'notice_type' => 'warning',
                'dismissible' => true,
                'heading'     => esc_html__('Notice', 'gofly-core'),
                'content'     => esc_html__('This Widgets only for custom post "Tour" details page.', 'gofly-core'),
            ]
        );

        $this->end_controls_section();


        //===================== Content Style =======================//

        $this->start_controls_section(
            'gofly_tour_itinerary_style_section',
            [
                'label' => esc_html__('Style Section', 'gofly-core'),
                'tab'   => \Elementor\Controls_Manager::TAB_STYLE,
            ]
        );

        $this->end_controls_section();
    }
    protected function render()
    {

        $settings = $this->get_settings_for_display();

        $id = get_the_ID();

        $tour_itinerary_group = Egns_Helper::egns_get_tour_value('tour_itinerary_group');

?>

        <div class="tour-itinerary-area mb-60">
            <div class="itinerary-title">
                <h4><?php echo Egns_Helper::egns_get_tour_value('tour_itinerary_title') ?></h4>
                <?php if (Egns_Helper::egns_get_tour_value('tour_itinerary_expand_btn') == true): ?>
                    <a href="#" class="expand-btn">
                        <?php echo esc_html__('Expand All +',  'gofly-core') ?>
                    </a>
                <?php endif; ?>
            </div>
            <?php if (!empty($tour_itinerary_group)): ?>
                <ul class="itinerary-list">
                    <?php foreach ($tour_itinerary_group as $index => $tour_itinerary): ?>
                        <li class="single-itinerary">
                            <div class="location-title">
                                <div class="icon">
                                    <img src="<?php echo esc_url($tour_itinerary['tour_itinerary_location_icon']['url']) ?>" alt="<?php echo esc_attr__('icon',  'gofly-core') ?>">
                                </div>
                                <h5><?php echo wp_kses_post($tour_itinerary['tour_itinerary_location_name']) ?></h5>
                            </div>
                            <?php if (!empty($tour_itinerary['tour_itinerary_steps'])): ?>
                                <div class="tour-plan-wrap">
                                    <div class="accordion accordion-flush" id="accordionTour<?php echo esc_attr($index) ?>">
                                        <?php
                                        foreach ($tour_itinerary['tour_itinerary_steps'] as $key => $tour_steps):
                                            $uniqid = uniqid();
                                        ?>
                                            <div class="accordion-item">
                                                <div class="accordion-header" id="flush-headingTourPlan<?php echo esc_attr($uniqid) ?>">
                                                    <div class="accordion-button <?php echo esc_attr($key == 0 ? '' : 'collapsed') ?>" role="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseTourPlan<?php echo esc_attr($uniqid) ?>" aria-expanded="false" aria-controls="flush-collapseTourPlan<?php echo esc_attr($uniqid) ?>">
                                                        <h6>
                                                            <span>
                                                                <svg width="14" height="14" viewBox="0 0 14 14"
                                                                    xmlns="http://www.w3.org/2000/svg">
                                                                    <path
                                                                        d="M7 14C7 14 12.25 9.02475 12.25 5.25C12.25 3.85761 11.6969 2.52226 10.7123 1.53769C9.72774 0.553123 8.39239 0 7 0C5.60761 0 4.27226 0.553123 3.28769 1.53769C2.30312 2.52226 1.75 3.85761 1.75 5.25C1.75 9.02475 7 14 7 14ZM7 7.875C6.30381 7.875 5.63613 7.59844 5.14384 7.10616C4.65156 6.61387 4.375 5.94619 4.375 5.25C4.375 4.55381 4.65156 3.88613 5.14384 3.39384C5.63613 2.90156 6.30381 2.625 7 2.625C7.69619 2.625 8.36387 2.90156 8.85616 3.39384C9.34844 3.88613 9.625 4.55381 9.625 5.25C9.625 5.94619 9.34844 6.61387 8.85616 7.10616C8.36387 7.59844 7.69619 7.875 7 7.875Z" />
                                                                </svg>
                                                            </span>
                                                            <?php echo wp_kses_post($tour_steps['itinerary_step_label']) ?>
                                                        </h6>
                                                    </div>
                                                </div>
                                                <div id="flush-collapseTourPlan<?php echo esc_attr($uniqid) ?>" class="accordion-collapse collapse <?php echo esc_attr($key == 0 ? 'show' : '') ?>" aria-labelledby="flush-headingTourPlan<?php echo esc_attr($uniqid) ?>">
                                                    <div class="accordion-body">
                                                        <?php echo wp_kses_post($tour_steps['itinerary_content']) ?>
                                                        <?php if (!empty($tour_steps['tour_itinerary_steps_facility'])): ?>
                                                            <ul class="facilities-list">
                                                                <?php foreach ($tour_steps['tour_itinerary_steps_facility'] as $tour_facility): ?>
                                                                    <li>
                                                                        <div class="single-item">
                                                                            <div class="facilities-title">
                                                                                <img src="<?php echo esc_url($tour_facility['tour_itinerary_steps_facility_icon']['url']) ?>" alt="<?php echo esc_attr__('icon',  'gofly-core') ?>">
                                                                                <h6><span><?php echo esc_html($tour_facility['tour_itinerary_steps_facility_label']) ?></span><span>: </span></h6>
                                                                            </div>
                                                                            <?php echo esc_html($tour_facility['tour_itinerary_steps_facility_content']) ?>
                                                                        </div>
                                                                        <?php if (!empty($tour_facility['tour_itinerary_steps_facility_btn']['text'])): ?>
                                                                            <a href="<?php echo esc_url($tour_facility['tour_itinerary_steps_facility_btn']['url']) ?>" target="<?php echo esc_attr($tour_facility['tour_itinerary_steps_facility_btn']['target']) ?>"><?php echo esc_html($tour_facility['tour_itinerary_steps_facility_btn']['text']) ?></a>
                                                                        <?php endif; ?>
                                                                    </li>
                                                                <?php endforeach; ?>
                                                            </ul>
                                                        <?php endif; ?>
                                                    </div>
                                                </div>
                                            </div>
                                        <?php endforeach; ?>
                                    </div>
                                </div>
                            <?php endif; ?>
                        </li>
                    <?php endforeach; ?>
                </ul>
            <?php endif; ?>
        </div>

<?php

    }
}

Plugin::instance()->widgets_manager->register(new Gofly_Tour_Itinerary_Image_Widget());
