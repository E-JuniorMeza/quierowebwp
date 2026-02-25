<?php

namespace Egns\Inc;

use Egns\Helper\Egns_Helper;

class Footer_Helper extends Egns_Helper
{

    /**
     * Initializes a singleton instance
     *
     * @return \Footer_Helper
     */
    public static function init()
    {
        static $instance = false;

        if (!$instance) {
            $instance = new self();
        }

        return $instance;
    }

    /**
     * Main construcutor 
     *
     * @return void
     */
    public function __construct() {}


    /**
     * Footer widgets function 
     *
     * @since   1.0.0
     */
    public static function egns_footer_widgets()
    { ?>

        <?php if (class_exists('Egns_Core') && (is_active_sidebar('footer_one') || is_active_sidebar('footer_two') || is_active_sidebar('footer_three'))) : ?>
            <div class="row g-lg-4 gy-5 mb-70">
                <?php if (is_active_sidebar('footer_one')) : ?>
                    <div class="col-lg-4">
                        <?php dynamic_sidebar('footer_one') ?>
                    </div>
                <?php endif; ?>
                <div class="col-lg-8">
                    <div class="footer-list">
                        <div class="row gy-4 g-6">
                            <?php if (is_active_sidebar('footer_two')) : ?>
                                <div class="col-sm-6 d-flex justify-content-lg-end">
                                    <?php dynamic_sidebar('footer_two') ?>
                                </div>
                            <?php endif; ?>
                            <?php if (is_active_sidebar('footer_three')) : ?>
                                <div class="col-sm-6 d-flex justify-content-sm-end">
                                    <?php dynamic_sidebar('footer_three') ?>
                                </div>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            </div>
        <?php endif; ?>


    <?php } // End widgets




    /**
     * Footer copyright function 
     *
     * @since   1.0.0
     */
    public static function egns_footer_copyright()
    { ?>

        <?php if (!empty(self::egns_get_theme_option('copyright_text'))) : ?>
            <div class="copyright-area">
                <p><?php echo wp_kses(self::egns_get_theme_option('copyright_text'), wp_kses_allowed_html('post')) ?></p>
            </div>
        <?php else: ?>
            <div class="copyright-area">
                <p><?php echo esc_html__('© Copyright ', 'gofly') ?> <?php echo the_date('Y') ?> <a href="<?php echo esc_url('https://gofly-wp.egenslab.com/') ?>"><?php echo esc_html__('Egens Lab', 'gofly') ?></a> | <?php echo esc_html__('All Right Reserved', 'gofly') ?></p>
            </div>
        <?php endif; ?>

<?php } // End copyright




} //end main class

Footer_Helper::init();
