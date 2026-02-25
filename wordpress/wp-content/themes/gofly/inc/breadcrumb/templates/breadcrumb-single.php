<?php

use Egns\Inc\Header_Helper;
use Egns\Helper\Egns_Helper;

$enable_breadcrumb_by_theme = Egns_Helper::egns_get_theme_option('breadcrumb_enable');
$breadcrumb_enable_by_page  = Egns_Helper::egns_page_option_value('breadcrumb_enable_page');

?>

<?php if (Egns\Helper\Egns_Helper::is_enabled($enable_breadcrumb_by_theme, $breadcrumb_enable_by_page)): ?>
    <?php
    $bread_page_image = Egns_Helper::egns_page_option_value('breadcrumb_page_bg_image');
    $bread_image = Egns_Helper::egns_get_theme_option('breadcrumb_bg_image');

    $image_url = !empty($bread_page_image['url'])
        ? esc_url($bread_page_image['url'])
        : (!empty($bread_image['url']) ? esc_url($bread_image['url']) : '');

    $inline_style = $image_url
        ? 'style="background-image:linear-gradient(rgba(0,0,0,0.3), rgba(0,0,0,0.3)), url(' . esc_url($image_url) . ');"'
        : '';
    ?>

    <div class="breadcrumb-section" <?php echo sprintf('%s', $inline_style); ?>>
        <div class="container">
            <div class="banner-content">
                <h1>
                    <?php
                    if (is_category()) {
                        echo esc_html__('Category: ', 'gofly');
                        single_cat_title();
                    } elseif (is_tag()) {
                        echo esc_html__('Tag: ', 'gofly');
                        single_tag_title();
                    } elseif (is_author()) {
                        echo esc_html__('Author: ', 'gofly');
                        the_author();
                    } elseif (is_date()) {
                        echo esc_html__('Date: ', 'gofly');
                        if (is_day()) {
                            echo get_the_time('F j, Y');
                        } else if (is_month()) {
                            echo get_the_time('F, Y');
                        } else if (is_year()) {
                            echo get_the_time('Y');
                        }
                    } elseif (is_home()) {
                        Egns\Helper\Egns_Helper::egns_translate('Blog');
                    } elseif (is_singular('visa')) {
                        the_title() . esc_html_e(' Visa', 'gofly');
                    } else {
                        the_title();
                    }
                    ?>
                </h1>
                <?php echo egns_breadcrumb() ?>
            </div>
        </div>
    </div>
<?php endif; ?>