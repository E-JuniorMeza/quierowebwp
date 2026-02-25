<?php

namespace Elementor;

if (!defined('ABSPATH')) exit;  // Exit if accessed directly

use Egns_Core;
use Elementor\core\Schemes;
use Egns_Core\Egns_Helper;

class Gofly_Video_With_Poster_Widget extends Widget_Base
{

    public function get_name()
    {
        return 'gofly_video_with_poster';
    }

    public function get_title()
    {
        return esc_html__('EG Video With Poster', 'gofly-core');
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
            'gofly_video_poster_section',
            [
                'label' => esc_html__('Content', 'gofly-core')
            ]
        );
        $this->add_control(
            'gofly_video_poster_image',
            [
                'label'   => esc_html__('Video poster Image', 'gofly-core'),
                'type'    => \Elementor\Controls_Manager::MEDIA,
                'default' => [
                    'url' => \Elementor\Utils::get_placeholder_image_src(),
                ],
            ]
        );
        $this->add_control(
            'gofly_video_source',
            [
                'label'   => esc_html__('Video Source', 'gofly-core'),
                'type'    => \Elementor\Controls_Manager::SELECT,
                'options' => [
                    'link'   => esc_html__('Link', 'gofly-core'),
                    'upload' => esc_html__('Upload', 'gofly-core'),
                ],
                'default' => 'link',
            ]
        );
        $this->add_control(
            'gofly_video_url',
            [
                'label'       => esc_html__('Video link', 'gofly-core'),
                'type'        => \Elementor\Controls_Manager::TEXT,
                'default'     => 'www.example.com',
                'placeholder' => esc_html__('paste your link here', 'gofly-core'),
                'label_block' => true,
                'condition'   => [
                    'gofly_video_source' => 'link',
                ],
            ]
        );
        $this->add_control(
            'gofly_video_upload',
            [
                'label'       => esc_html__('Upload Video', 'gofly-core'),
                'type'        => \Elementor\Controls_Manager::MEDIA,
                'media_types' => ['video'],
                'default'     => [
                    'url' => \Elementor\Utils::get_placeholder_image_src(),
                ],
                'label_block' => true,
                'condition'   => [
                    'gofly_video_source' => 'upload',
                ],
            ]
        );



        $this->end_controls_section();
    }
    protected function render()
    {

        $settings = $this->get_settings_for_display();

        $video_url = '';

        if ($settings['gofly_video_source'] === 'link' && !empty($settings['gofly_video_url'])) {
            $video_url = $settings['gofly_video_url'];
        } elseif ($settings['gofly_video_source'] === 'upload' && !empty($settings['gofly_video_upload']['url'])) {
            $video_url = $settings['gofly_video_upload']['url'];
        }


?>

        <div class="destination-dt-faq-video-area">
            <div class="video-wrap">
                <?php if (!empty($settings['gofly_video_poster_image']['url'])): ?>
                    <img src="<?php echo esc_url($settings['gofly_video_poster_image']['url']) ?>" alt="<?php echo esc_attr__('video-banner-image', 'gofly-core'); ?>">
                <?php endif; ?>
                <a data-fancybox="video-player" href="<?php echo esc_url($video_url) ?>" class="play-btn">
                    <i class="bi bi-play-fill"></i>
                    <div class="waves-block">
                        <div class="waves wave-1"></div>
                        <div class="waves wave-2"></div>
                        <div class="waves wave-3"></div>
                    </div>
                </a>
            </div>
        </div>

<?php

    }
}

Plugin::instance()->widgets_manager->register(new Gofly_Video_With_Poster_Widget());
