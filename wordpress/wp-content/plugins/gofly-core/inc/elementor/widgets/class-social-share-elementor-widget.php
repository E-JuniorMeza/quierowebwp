<?php

namespace Elementor;

if (!defined('ABSPATH')) exit;  // Exit if accessed directly

use Elementor\core\Schemes;
use Egns_Core\Egns_Helper;

class Gofly_Social_Share_Widget extends Widget_Base
{

    public function get_name()
    {
        return 'gofly_headings';
    }

    public function get_title()
    {
        return esc_html__('EG Social Share', 'gofly-core');
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
            'gofly_share_section',
            [
                'label' => esc_html__('Socials Content', 'gofly-core')
            ]
        );

        $this->add_control(
            'gofly_share_list',
            [
                'label'       => esc_html__('Share Elements', 'gofly-core'),
                'type'        => \Elementor\Controls_Manager::SELECT2,
                'label_block' => true,
                'multiple'    => true,
                'options'     => [
                    'facebook'  => esc_html__('Facebook', 'gofly-core'),
                    'linkedin'  => esc_html__('Linkedin', 'gofly-core'),
                    'twitter'   => esc_html__('Twitter', 'gofly-core'),
                    'pinterest' => esc_html__('Pinterest', 'gofly-core'),
                    'telegram'  => esc_html__('Telegram', 'gofly-core'),
                    'whatsapp'  => esc_html__('Whatsapp', 'gofly-core'),
                    'messenger' => esc_html__('Messenger', 'gofly-core'),
                    'reddit'    => esc_html__('Reddit', 'gofly-core'),
                    'tumblr'    => esc_html__('Tumblr', 'gofly-core'),
                    'vk'        => esc_html__('Vk', 'gofly-core'),
                    'skype'     => esc_html__('Skype', 'gofly-core'),
                    'email'     => esc_html__('Email', 'gofly-core'),
                ],
                'default' => ['facebook', 'linkedin', 'twitter', 'instagram', 'pinterest'],
            ]
        );

        $this->end_controls_section();

        // Social Icon Style tab
        $this->start_controls_section(
            'gofly_style_section',
            [
                'label' => esc_html__('Style Section', 'gofly-core'),
                'tab'   => \Elementor\Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_control(
            'gofly_share_icon_color',
            [
                'label'     => esc_html__('Share Icon Color', 'gofly-core'),
                'type'      => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .share-btn .share-icon svg' => 'fill: {{VALUE}}',
                ],
            ]
        );
        $this->add_control(
            'gofly_share_icon_bg_color',
            [
                'label'     => esc_html__('Share Icon BG Color', 'gofly-core'),
                'type'      => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .share-btn .share-icon' => 'background-color: {{VALUE}}',
                ],
            ]
        );
        $this->add_control(
            'gofly_share_icon_rds',
            [
                'label'      => esc_html__('Share Icon Border-radius', 'gofly-core'),
                'type'       => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'rem', 'custom'],
                'selectors'  => [
                    '{{WRAPPER}} .share-btn .share-icon' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        // button with hover
        $this->add_control(
            'gofly_share_style_options',
            [
                'label'     => esc_html__('Icons Style', 'gofly-core'),
                'type'      => \Elementor\Controls_Manager::HEADING,
                'separator' => 'before',
            ]
        );
        //Start main tabs
        $this->start_controls_tabs(
            'button_style_tabs',
        );

        // default style 
        $this->start_controls_tab(
            'style_normal_tab',
            [
                'label' => esc_html__('Normal', 'gofly-core'),
            ]
        );

        $this->add_control(
            'gofly_social_icon_color',
            [
                'label'     => esc_html__('Social Icon Color', 'gofly-core'),
                'type'      => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .share-btn .social-list li a i' => 'color: {{VALUE}}',
                ],
            ]
        );
        $this->add_control(
            'gofly_social_icon_bg_color',
            [
                'label'     => esc_html__('Social Icon BG Color', 'gofly-core'),
                'type'      => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .share-btn .social-list li a' => 'background-color: {{VALUE}}',
                ],
            ]
        );
        $this->add_control(
            'gofly_social_icon_rds',
            [
                'label'      => esc_html__('Social Icon Border-radius', 'gofly-core'),
                'type'       => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'rem', 'custom'],
                'selectors'  => [
                    '{{WRAPPER}} .share-btn .social-list li a' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->end_controls_tab();

        // hover style 
        $this->start_controls_tab(
            'style_hover_tab',
            [
                'label' => esc_html__('Hover', 'gofly-core'),
            ]
        );

        $this->add_control(
            'gofly_social_icon_hvr_color',
            [
                'label'     => esc_html__('Social Icon Color', 'gofly-core'),
                'type'      => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .share-btn .social-list li a:hover i' => 'color: {{VALUE}}',
                ],
            ]
        );
        $this->add_control(
            'gofly_social_icon_hvr_bg_color',
            [
                'label'     => esc_html__('Social Icon BG Color', 'gofly-core'),
                'type'      => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .share-btn .social-list li a:hover' => 'background-color: {{VALUE}}',
                ],
            ]
        );
        $this->add_control(
            'gofly_social_icon_hvr_rds',
            [
                'label'      => esc_html__('Social Icon Border-radius', 'gofly-core'),
                'type'       => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'rem', 'custom'],
                'selectors'  => [
                    '{{WRAPPER}} .share-btn .social-list li a:hover' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->end_controls_tab();

        $this->end_controls_tabs();  //End main tabs


        $this->end_controls_section();
    }
    protected function render()
    {

        $settings = $this->get_settings_for_display();

        $socials = $settings['gofly_share_list'];

?>

        <div class="share-btn">
            <div class="share-icon">
                <svg width="14" height="14" viewBox="0 0 14 14" xmlns="http://www.w3.org/2000/svg">
                    <g>
                        <path
                            d="M11.1016 9.07812C10.2911 9.07812 9.57685 9.47682 9.12825 10.0831L5.24973 8.09714C5.31412 7.87765 5.35938 7.65018 5.35938 7.41016C5.35938 7.0846 5.29263 6.7751 5.17732 6.49042L9.23636 4.04786C9.68808 4.578 10.352 4.92188 11.1016 4.92188C12.4586 4.92188 13.5625 3.81798 13.5625 2.46094C13.5625 1.10389 12.4586 0 11.1016 0C9.74452 0 8.64062 1.10389 8.64062 2.46094C8.64062 2.77367 8.70502 3.07032 8.81185 3.34573L4.74072 5.79545C4.28939 5.28106 3.635 4.94922 2.89844 4.94922C1.54139 4.94922 0.4375 6.05311 0.4375 7.41016C0.4375 8.7672 1.54139 9.87109 2.89844 9.87109C3.7223 9.87109 4.44858 9.46069 4.89549 8.83734L8.76124 10.8169C8.69004 11.0467 8.64062 11.2861 8.64062 11.5391C8.64062 12.8961 9.74452 14 11.1016 14C12.4586 14 13.5625 12.8961 13.5625 11.5391C13.5625 10.182 12.4586 9.07812 11.1016 9.07812Z" />
                    </g>
                </svg>
            </div>
            <ul class="social-list">
                <?php if (in_array("facebook", $socials)): ?>
                    <li>
                        <a href="https://www.facebook.com/sharer/sharer.php?u=<?php the_permalink(); ?>" target="_blank" rel="noopener">
                            <i class="bx bxl-facebook"></i>
                        </a>
                    </li>
                <?php endif; ?>
                <?php if (in_array("linkedin", $socials)): ?>
                    <li>
                        <a href="https://www.linkedin.com/shareArticle?mini=true&url=<?php the_permalink(); ?>" target="_blank" rel="noopener">
                            <i class="bx bxl-linkedin"></i>
                        </a>
                    </li>
                <?php endif; ?>
                <?php if (in_array("twitter", $socials)): ?>
                    <li>
                        <a href="https://twitter.com/intent/tweet?url=<?php the_permalink(); ?>&text=<?php the_title(); ?>" target="_blank" rel="noopener">
                            <i class="bx bxl-twitter"></i>
                        </a>
                    </li>
                <?php endif; ?>
                <?php if (in_array("whatsapp", $socials)): ?>
                    <li>
                        <a href="https://api.whatsapp.com/send?text=<?php the_title(); ?>%20<?php the_permalink(); ?>" target="_blank" rel="noopener">
                            <i class="bx bxl-whatsapp"></i>
                        </a>
                    </li>
                <?php endif; ?>
                <?php if (in_array("telegram", $socials)): ?>
                    <li>
                        <a href="https://t.me/share/url?url=<?php the_permalink(); ?>&text=<?php the_title(); ?>" target="_blank" rel="noopener">
                            <i class="bx bxl-telegram"></i>
                        </a>
                    </li>
                <?php endif; ?>
                <?php if (in_array("reddit", $socials)): ?>
                    <li>
                        <a href="https://www.reddit.com/submit?url=<?php the_permalink(); ?>&title=<?php the_title(); ?>" target="_blank" rel="noopener">
                            <i class="bx bxl-reddit"></i>
                        </a>
                    </li>
                <?php endif; ?>
                <?php if (in_array("pinterest", $socials)): ?>
                    <li>
                        <a href="https://pinterest.com/pin/create/button/?url=<?php the_permalink(); ?>&description=<?php the_title(); ?>" target="_blank" rel="noopener">
                            <i class="bx bxl-pinterest"></i>
                        </a>
                    </li>
                <?php endif; ?>
                <?php if (in_array("tumblr", $socials)): ?>
                    <li>
                        <a href="https://www.tumblr.com/widgets/share/tool?canonicalUrl=<?php the_permalink(); ?>&title=<?php the_title(); ?>" target="_blank" rel="noopener">
                            <i class="bx bxl-tumblr"></i>
                        </a>
                    </li>
                <?php endif; ?>
                <?php if (in_array("vk", $socials)): ?>
                    <li>
                        <a href="https://vk.com/share.php?url=<?php the_permalink(); ?>" target="_blank" rel="noopener">
                            <i class="bx bxl-vk"></i>
                        </a>
                    </li>
                <?php endif; ?>
                <?php if (in_array("skype", $socials)): ?>
                    <li>
                        <a href="https://web.skype.com/share?url=<?php the_permalink(); ?>" target="_blank" rel="noopener">
                            <i class="bx bxl-skype"></i>
                        </a>
                    </li>
                <?php endif; ?>
                <?php if (in_array("email", $socials)): ?>
                    <li>
                        <a href="mailto:?subject=<?php the_title(); ?>&body=<?php the_permalink(); ?>" target="_blank" rel="noopener">
                            <i class="bx bx-envelope"></i>
                        </a>
                    </li>
                <?php endif; ?>
                <?php if (in_array("messenger", $socials)): ?>
                    <li>
                        <a href="fb-messenger://share/?link=<?php the_permalink(); ?>" target="_blank" rel="noopener">
                            <i class="bx bxl-messenger"></i>
                        </a>
                    </li>
                <?php endif; ?>
            </ul>
        </div>

<?php

    }
}

Plugin::instance()->widgets_manager->register(new Gofly_Social_Share_Widget());
