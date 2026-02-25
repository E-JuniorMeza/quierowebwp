<?php

if (class_exists('CSF') && !empty(Egns\Helper\Egns_Helper::egns_get_theme_option('footer_one_template'))) {

    echo \Egns_Core\Egns_Helper::get_footer_data(Egns\Helper\Egns_Helper::egns_get_theme_option('footer_one_template'));
} else { ?>

    <footer class="footer-section">
        <div class="container">
            <div class="footer-bottom">
                <div class="copyright-and-payment-method-area justify-content-center">
                    <p><?php echo esc_html__('Copyright ', 'gofly') ?> <?php echo the_date('Y') ?> <a href="<?php echo esc_url('https://gofly-wp.egenstheme.com/') ?>"><?php echo esc_html__('Gofly', 'gofly') ?></a> | <?php echo esc_html__('Design By', 'gofly') ?> <a href="<?php echo esc_url('https://www.egenslab.com/') ?>"><?php echo esc_html__(' Egens Lab', 'gofly') ?></a></p>
                </div>
            </div>
        </div>
    </footer>
<?php } ?>