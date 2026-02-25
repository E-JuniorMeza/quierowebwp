<?php

use Egns\Inc\Header_Helper;
use Egns\Helper\Egns_Helper;

$enable_breadcrumb_by_theme = Egns_Helper::egns_get_theme_option('breadcrumb_enable');
$breadcrumb_enable_by_page  = Egns_Helper::egns_page_option_value('breadcrumb_enable_page');

$user_id   = get_current_user_id();
$user_meta = get_user_meta($user_id, 'egns_profile_options', true);

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
                    if (is_author()) {
                        echo esc_html__('Author: ', 'gofly');
                        the_author();
                    } else {
                        the_title();
                    }
                    ?>
                </h1>
                <p><?php echo get_the_author_meta('description') ?></p>
                <ul class="social-link">
                    <li><a href="<?php esc_url($user_meta['user_facebook_url']) ?>"><i class="bi bi-facebook"></i></a></li>
                    <li><a href="<?php esc_url($user_meta['user_twitter_url']) ?>"><i class="bi bi-twitter-x"></i></a></li>
                    <li><a href="<?php esc_url($user_meta['user_linkedin_url']) ?>"><i class="bi bi-linkedin"></i></a></li>
                    <li><a href="<?php esc_url($user_meta['user_instagram_url']) ?>"><i class="bi bi-instagram"></i></a></li>
                    <li><a href="<?php esc_url($user_meta['user_pinterest_url']) ?>"><i class="bi bi-pinterest"></i></a></li>
                </ul>
                <?php echo egns_breadcrumb() ?>
            </div>
        </div>
    </div>
<?php endif; ?>