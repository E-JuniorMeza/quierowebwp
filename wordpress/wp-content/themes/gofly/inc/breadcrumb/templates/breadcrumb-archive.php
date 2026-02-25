<?php

use Egns\Inc\Header_Helper;
use Egns\Helper\Egns_Helper;

$enable_breadcrumb_by_theme = Egns_Helper::egns_get_theme_option('breadcrumb_enable');
$breadcrumb_enable_by_page  = Egns_Helper::egns_page_option_value('breadcrumb_enable_page');

$term = get_queried_object();

?>

<?php if (Egns\Helper\Egns_Helper::is_enabled($enable_breadcrumb_by_theme, $breadcrumb_enable_by_page)): ?>
    <?php
    $bread_page_image = Egns_Helper::egns_page_option_value('breadcrumb_page_bg_image');
    $bread_image      = Egns_Helper::egns_get_theme_option('breadcrumb_bg_image');

    $image_url = !empty($bread_page_image['url'])
        ? esc_url($bread_page_image['url'])
        : (!empty($bread_image['url']) ? esc_url($bread_image['url']) : '');

    $inline_style = $image_url
        ? 'style="background-image:linear-gradient(rgba(0,0,0,0.3), rgba(0,0,0,0.3)), url(' . esc_url($image_url) . ');"'
        :  '';
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
                        } elseif (is_month()) {
                            echo get_the_time('F, Y');
                        } elseif (is_year()) {
                            echo get_the_time('Y');
                        }
                    } elseif (is_home()) {
                        Egns\Helper\Egns_Helper::egns_translate('Blog');
                    } elseif (is_post_type_archive('product')) {
                        Egns\Helper\Egns_Helper::egns_translate('Market Trend & Analyst Behind The Scene of Industry.');
                    } elseif (is_post_type_archive('visa')) {
                        esc_html_e('Visa', 'gofly');
                    } elseif (is_post_type_archive('tour')) {
                        esc_html_e('Tour', 'gofly');
                    } elseif (is_post_type_archive('hotel')) {
                        esc_html_e('Hotel', 'gofly');
                    } elseif (is_post_type_archive('experience')) {
                        esc_html_e('Experience', 'gofly');
                    } elseif (is_post_type_archive('destination')) {
                        esc_html_e('Destination', 'gofly');
                    } elseif (is_tax() && $term->taxonomy == 'visa-category' && $term) {
                        echo esc_html__('Category: ', 'gofly') . esc_html($term->name);
                    } elseif (is_tax() && $term->taxonomy == 'visa-citizenships' && $term) {
                        echo esc_html__('Citizen: ', 'gofly') . esc_html($term->name);
                    } elseif (is_tax() && $term->taxonomy == 'visa-countries' && $term) {
                        echo esc_html__('Country: ', 'gofly') . esc_html($term->name);
                    } elseif (is_tax() && $term->taxonomy == 'visa-residents' && $term) {
                        echo esc_html__('Resident: ', 'gofly') . esc_html($term->name);
                    } elseif (is_tax() && $term->taxonomy == 'tour-language' && $term) {
                        echo esc_html__('Tour Operated: ', 'gofly') . esc_html($term->name);
                    } elseif (is_tax() && $term->taxonomy == 'tour-type' && $term) {
                        echo esc_html__('Type: ', 'gofly') . esc_html($term->name);
                    } elseif (is_tax() && $term->taxonomy == 'tour-category' && $term) {
                        echo esc_html__('Category: ', 'gofly') . esc_html($term->name);
                    } elseif (is_tax() && $term->taxonomy == 'tour-tag' && $term) {
                        echo esc_html__('Tag: ', 'gofly') . esc_html($term->name);
                    } elseif (is_tax() && $term->taxonomy == 'tour-service' && $term) {
                        echo esc_html__('Service: ', 'gofly') . esc_html($term->name);
                    } elseif (is_tax() && $term->taxonomy == 'hotel-category' && $term) {
                        echo esc_html__('Category: ', 'gofly') . esc_html($term->name);
                    } elseif (is_tax() && $term->taxonomy == 'hotel-tag' && $term) {
                        echo esc_html__('Tag: ', 'gofly') . esc_html($term->name);
                    } elseif (is_tax() && $term->taxonomy == 'hotel-amenity' && $term) {
                        echo esc_html__('Amenity: ', 'gofly') . esc_html($term->name);
                    } elseif (is_tax() && $term->taxonomy == 'hotel-location' && $term) {
                        echo esc_html__('Location: ', 'gofly') . esc_html($term->name);
                    } elseif (is_tax() && $term->taxonomy == 'hotel-offer-criterias' && $term) {
                        echo esc_html__('Offer: ', 'gofly') . esc_html($term->name);
                    } elseif (is_tax() && $term->taxonomy == 'experience-category' && $term) {
                        echo esc_html__('Category: ', 'gofly') . esc_html($term->name);
                    } elseif (is_tax() && $term->taxonomy == 'experience-type' && $term) {
                        echo esc_html__('Type: ', 'gofly') . esc_html($term->name);
                    } elseif (is_tax() && $term->taxonomy == 'experience-offer' && $term) {
                        echo esc_html__('Offer: ', 'gofly') . esc_html($term->name);
                    } elseif (is_tax() && $term->taxonomy == 'experience-service' && $term) {
                        echo esc_html__('Service: ', 'gofly') . esc_html($term->name);
                    } elseif (is_tax() && $term->taxonomy == 'destination-continent' && $term) {
                        echo esc_html__('Continent: ', 'gofly') . esc_html($term->name);
                    } elseif (is_tax() && $term->taxonomy == 'destination-location' && $term) {
                        echo esc_html__('Location: ', 'gofly') . esc_html($term->name);
                    } elseif (is_tax() && isset($term)) {
                        echo esc_html($term->taxonomy . ': ' . $term->name);
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