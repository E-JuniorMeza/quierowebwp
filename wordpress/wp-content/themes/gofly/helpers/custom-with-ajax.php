<?php

use Egns\Helper\Egns_Helper;


/**
 * @since Version: 1.5.5
 * 
 * Filter Tour archive & page template
 * 
 * */

function gofly_archive_filter_tours()
{
    check_ajax_referer('gofly_nonce', 'security');

    $paged = !empty($_POST['tourData']['page_number']) ? intval($_POST['tourData']['page_number']) : 1;

    $args = [
        'post_type'      => 'tour',
        'post_status'    => 'publish',
        'posts_per_page' => 8,
        'paged'          => $paged,
    ];

    // Pagination
    if (!empty($_POST['tourData']['page_number'])) {
        $args['paged'] = intval($_POST['tourData']['page_number']);
    }

    // Tour Category
    if (!empty($_POST['tourData']['selectedCategory'])) {
        $args['tax_query'][] = [
            'taxonomy' => 'tour-category',
            'field'    => 'slug',
            'terms'    => ($_POST['tourData']['selectedCategory']),
        ];
    }

    // Tour Type
    if (!empty($_POST['tourData']['selectedTourType'])) {
        $args['tax_query'][] = [
            'taxonomy' => 'tour-type',
            'field'    => 'slug',
            'terms'    => ($_POST['tourData']['selectedTourType']),
        ];
    }

    // Ensure multiple tax queries work
    if (!empty($args['tax_query'])) {
        $args['tax_query']['relation'] = 'AND';
    }

    // Price Range
    if (! empty($_POST['tourData']['minPrice']) && isset($_POST['tourData']['maxPrice'])) {
        $min_price = intval($_POST['tourData']['minPrice']);
        $max_price = intval($_POST['tourData']['maxPrice']);
        $args['meta_query'][] = [
            'key'     => 'tour_min_price',
            'value'   => array($min_price, $max_price),
            'compare' => 'BETWEEN',
            'type'    => 'NUMERIC',
        ];
    }

    // Destinations filter (array)
    if (!empty($_POST['tourData']['selectedExperience'])) {
        $meta_query = ['relation' => 'OR'];
        foreach ($_POST['tourData']['selectedExperience'] as $dest) {
            $meta_query[] = [
                'key'     => 'EGNS_TOUR_META_ID',
                'value'   => '"' . esc_sql($dest) . '"',
                'compare' => 'LIKE',
            ];
        }
        $args['meta_query'][] = $meta_query;
    }

    // Destinations with continen filter (array)
    if (!empty($_POST['tourData']['selectedDestinations'])) {
        $meta_query = ['relation' => 'OR'];
        foreach ($_POST['tourData']['selectedDestinations'] as $dest) {
            $meta_query[] = [
                'key'     => 'EGNS_TOUR_META_ID',
                'value'   => '"' . esc_sql($dest) . '"',
                'compare' => 'LIKE',
            ];
        }
        $args['meta_query'][] = $meta_query;
    }

    // Ensure multiple meta queries work
    if (!empty($args['meta_query'])) {
        $args['meta_query']['relation'] = 'AND';
    }

    // Sorting
    if (!empty($_POST['tourData']['sortBy'])) {
        $sort_by = $_POST['tourData']['sortBy'];

        switch ($sort_by) {
            case 'latest':
                $args['orderby'] = 'date';
                $args['order']   = 'DESC';
                break;

            case 'price_high':
                $args['meta_key'] = 'tour_min_price';
                $args['orderby']  = 'meta_value_num';
                $args['order']    = 'DESC';
                break;

            case 'price_low':
                $args['meta_key'] = 'tour_min_price';
                $args['orderby']  = 'meta_value_num';
                $args['order']    = 'ASC';
                break;

            default:
                // "default" → keep WP default ordering
                break;
        }
    }

    $query = new WP_Query($args);

    ob_start();


    if ($query->have_posts()) {
        while ($query->have_posts()) {
            $query->the_post();

            $gallery_opt = Egns_Helper::egns_get_tour_value('tour_feature_image_gallery');
            $gallery_ids = explode(',', $gallery_opt);
            $tour_types  = get_the_terms(get_the_ID(), 'tour-type');
            $language    = get_the_terms(get_the_ID(), 'tour-language');
            $is_featured = get_post_meta(get_the_ID(), '_is_featured', true);
?>
            <?php if ($_POST['tourData']['layout'] == 1) : ?>
                <div class="col-md-6 item">
                    <div class="package-card">
                        <div class="package-img-wrap">
                            <?php if (!empty($gallery_opt)) : ?>
                                <div class="swiper package-card-img-slider">
                                    <div class="swiper-wrapper">
                                        <?php if (has_post_thumbnail()) : ?>
                                            <div class="swiper-slide">
                                                <a href="<?php the_permalink() ?>" class="package-img">
                                                    <?php the_post_thumbnail('card-thumb') ?>
                                                </a>
                                            </div>
                                        <?php endif; ?>
                                        <?php
                                        if (! empty($gallery_ids)) :
                                            foreach ($gallery_ids as $gallery_item_id) :
                                        ?>
                                                <div class="swiper-slide">
                                                    <a href="<?php the_permalink() ?>" class="package-img">
                                                        <?php
                                                        echo wp_get_attachment_image($gallery_item_id, 'card-thumb', false, ['alt'   => esc_attr__('image', 'gofly'), 'class' => 'my-custom-class',]);
                                                        ?>
                                                    </a>
                                                </div>
                                        <?php
                                            endforeach;
                                        endif;
                                        ?>
                                    </div>
                                </div>
                                <div class="slider-pagi-wrap">
                                    <div class="package-card-img-pagi paginations"></div>
                                </div>
                            <?php else: ?>
                                <a href="<?php the_permalink() ?>" class="package-img">
                                    <?php the_post_thumbnail('card-thumb') ?>
                                </a>
                            <?php endif; ?>
                            <div class="batch">
                                <?php if (Egns_Helper::has_sale_price(get_the_ID())): ?>
                                    <span><?php echo esc_html__('Sale on!', 'gofly') ?></span>
                                <?php endif; ?>
                                <?php if (!empty($tour_types) && !is_wp_error($tour_types)) : ?>
                                    <span class="yellow-bg"><?php echo esc_html($tour_types[0]->name) ?></span>
                                <?php endif; ?>
                                <?php if ($is_featured == 1) : ?>
                                    <span class="discount"><?php echo esc_html__('Featured', 'gofly') ?></span>
                                <?php endif; ?>
                            </div>
                        </div>
                        <div class="package-content">
                            <h5><a href="<?php the_permalink() ?>"><?php the_title() ?></a></h5>
                            <div class="location-and-time">
                                <?php
                                $locations = Egns_Helper::egns_get_tour_value('tour_destination_select');

                                if (!empty($locations)) :
                                ?>
                                    <div class="location">
                                        <svg width="14" height="14" viewBox="0 0 14 14" xmlns="http://www.w3.org/2000/svg">
                                            <path
                                                d="M6.83615 0C3.77766 0 1.28891 2.48879 1.28891 5.54892C1.28891 7.93837 4.6241 11.8351 6.05811 13.3994C6.25669 13.6175 6.54154 13.7411 6.83615 13.7411C7.13076 13.7411 7.41561 13.6175 7.6142 13.3994C9.04821 11.8351 12.3834 7.93833 12.3834 5.54892C12.3834 2.48879 9.89464 0 6.83615 0ZM7.31469 13.1243C7.18936 13.2594 7.02008 13.3342 6.83615 13.3342C6.65222 13.3342 6.48295 13.2594 6.35761 13.1243C4.95614 11.5959 1.69584 7.79515 1.69584 5.54896C1.69584 2.7134 4.00067 0.406933 6.83615 0.406933C9.67164 0.406933 11.9765 2.7134 11.9765 5.54896C11.9765 7.79515 8.71617 11.5959 7.31469 13.1243Z" />
                                            <path
                                                d="M6.83618 8.54554C8.4624 8.54554 9.7807 7.22723 9.7807 5.60102C9.7807 3.9748 8.4624 2.65649 6.83618 2.65649C5.20997 2.65649 3.89166 3.9748 3.89166 5.60102C3.89166 7.22723 5.20997 8.54554 6.83618 8.54554Z" />
                                        </svg>
                                        <?php
                                        $location_links = [];
                                        foreach ($locations as $post_id) {
                                            $destination = get_post($post_id);
                                            if ($destination) {
                                                $link = get_permalink($post_id);
                                                $location_links[] = '<a href="' . esc_url($link) . '">' . esc_html($destination->post_title) . '</a>';
                                            }
                                        }
                                        echo implode(', ', $location_links);
                                        ?>
                                    </div>
                                <?php endif; ?>
                                <?php
                                $day = Egns_Helper::egns_get_tour_value('tour_duration_day');
                                $night = Egns_Helper::egns_get_tour_value('tour_duration_night');
                                if (!empty($day || $night)) :
                                ?>
                                    <svg class="arrow" width="25" height="6" viewBox="0 0 25 6" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M0 3L5 5.88675V0.113249L0 3ZM25 3L20 0.113249V5.88675L25 3ZM4.5 3.5H20.5V2.5H4.5V3.5Z" />
                                    </svg>
                                    <span><?php echo esc_html($day . ($night ? ('/' . $night) : '')) ?></span>
                                <?php endif; ?>
                            </div>
                            <?php if (!empty(Egns_Helper::egns_get_tour_value('tour_package_info_list'))) : ?>
                                <ul class="package-info">
                                    <?php
                                    $pkg_list = Egns_Helper::egns_get_tour_value('tour_package_info_list');
                                    $data = explode("\n", $pkg_list);
                                    foreach ($data as $value) :
                                    ?>
                                        <li>
                                            <svg width="14" height="14" viewBox="0 0 14 14" xmlns="http://www.w3.org/2000/svg">
                                                <rect width="14" height="14" rx="7" />
                                                <path
                                                    d="M10.6947 5.45777L6.24644 9.90841C6.17556 9.97689 6.08572 10.0124 5.99596 10.0124C5.9494 10.0125 5.90328 10.0033 5.86027 9.98548C5.81727 9.96763 5.77822 9.94144 5.7454 9.90841L3.3038 7.46681C3.16436 7.32969 3.16436 7.10521 3.3038 6.96577L4.16652 6.10065C4.29892 5.96833 4.53524 5.96833 4.66764 6.10065L5.99596 7.42897L9.33092 4.09161C9.36377 4.05868 9.40278 4.03255 9.44573 4.01471C9.48868 3.99686 9.53473 3.98766 9.58124 3.98761C9.67572 3.98761 9.76556 4.02545 9.83172 4.09161L10.6944 4.95681C10.8341 5.09625 10.8341 5.32073 10.6947 5.45777Z" />
                                            </svg>
                                            <?php echo esc_html($value) ?>
                                        </li>
                                    <?php endforeach; ?>
                                </ul>
                            <?php endif; ?>
                            <div class="btn-and-price-area">
                                <a href="<?php the_permalink() ?>" class="primary-btn1">
                                    <span>
                                        <?php echo esc_html__('Book Now', 'gofly') ?>
                                        <svg width="10" height="10" viewBox="0 0 10 10" xmlns="http://www.w3.org/2000/svg">
                                            <path
                                                d="M9.73535 1.14746C9.57033 1.97255 9.32924 3.26406 9.24902 4.66797C9.16817 6.08312 9.25559 7.5453 9.70214 8.73633C9.84754 9.12406 9.65129 9.55659 9.26367 9.70215C8.9001 9.83849 8.4969 9.67455 8.32812 9.33398L8.29785 9.26367L8.19921 8.98438C7.73487 7.5758 7.67054 5.98959 7.75097 4.58203C7.77875 4.09598 7.82525 3.62422 7.87988 3.17969L1.53027 9.53027C1.23738 9.82317 0.762615 9.82317 0.469722 9.53027C0.176829 9.23738 0.176829 8.76262 0.469722 8.46973L6.83593 2.10254C6.3319 2.16472 5.79596 2.21841 5.25 2.24902C3.8302 2.32862 2.2474 2.26906 0.958003 1.79102L0.704097 1.68945L0.635738 1.65527C0.303274 1.47099 0.157578 1.06102 0.310542 0.704102C0.463655 0.347333 0.860941 0.170391 1.22363 0.28418L1.29589 0.310547L1.48828 0.387695C2.47399 0.751207 3.79966 0.827571 5.16601 0.750977C6.60111 0.670504 7.97842 0.428235 8.86132 0.262695L9.95312 0.0585938L9.73535 1.14746Z" />
                                        </svg>
                                    </span>
                                    <span>
                                        <?php echo esc_html__('Book Now', 'gofly') ?>
                                        <svg width="10" height="10" viewBox="0 0 10 10" xmlns="http://www.w3.org/2000/svg">
                                            <path
                                                d="M9.73535 1.14746C9.57033 1.97255 9.32924 3.26406 9.24902 4.66797C9.16817 6.08312 9.25559 7.5453 9.70214 8.73633C9.84754 9.12406 9.65129 9.55659 9.26367 9.70215C8.9001 9.83849 8.4969 9.67455 8.32812 9.33398L8.29785 9.26367L8.19921 8.98438C7.73487 7.5758 7.67054 5.98959 7.75097 4.58203C7.77875 4.09598 7.82525 3.62422 7.87988 3.17969L1.53027 9.53027C1.23738 9.82317 0.762615 9.82317 0.469722 9.53027C0.176829 9.23738 0.176829 8.76262 0.469722 8.46973L6.83593 2.10254C6.3319 2.16472 5.79596 2.21841 5.25 2.24902C3.8302 2.32862 2.2474 2.26906 0.958003 1.79102L0.704097 1.68945L0.635738 1.65527C0.303274 1.47099 0.157578 1.06102 0.310542 0.704102C0.463655 0.347333 0.860941 0.170391 1.22363 0.28418L1.29589 0.310547L1.48828 0.387695C2.47399 0.751207 3.79966 0.827571 5.16601 0.750977C6.60111 0.670504 7.97842 0.428235 8.86132 0.262695L9.95312 0.0585938L9.73535 1.14746Z" />
                                        </svg>
                                    </span>
                                </a>
                                <?php echo Egns_Helper::get_global_starting_price(get_the_ID()) ?>
                            </div>
                            <svg class="divider" height="6" viewBox="0 0 374 6" xmlns="http://www.w3.org/2000/svg">
                                <path d="M5 2.5L0 0.113249V5.88675L5 3.5V2.5ZM369 3.5L374 5.88675V0.113249L369 2.5V3.5ZM4.5 3.5H369.5V2.5H4.5V3.5Z" />
                            </svg>
                            <div class="bottom-area">
                                <ul>
                                    <li>
                                        <svg width="16" height="16" viewBox="0 0 16 16" xmlns="http://www.w3.org/2000/svg">
                                            <path
                                                d="M9.2732 12.9807H6.7268C6.68429 12.9807 6.64298 12.9666 6.60935 12.9406C6.55906 12.9018 5.36398 11.9718 4.14989 10.4857C3.43499 9.61078 2.86499 8.72565 2.45543 7.8549C1.93974 6.75846 1.67834 5.68141 1.67834 4.65329C1.67834 3.50657 2.36043 2.33394 3.54995 1.43595C4.1378 0.992226 4.81163 0.641781 5.55321 0.394396C6.33797 0.132617 7.16112 0 8 0C8.83888 0 9.66203 0.132617 10.4466 0.394396C11.1882 0.641781 11.862 0.992035 12.4499 1.43595C13.6392 2.33394 14.3215 3.50676 14.3215 4.65329C14.3215 5.63247 14.0599 6.67939 13.544 7.7647C13.1348 8.62565 12.5652 9.51367 11.8511 10.4036C10.6383 11.9148 9.40697 12.9272 9.39468 12.9371C9.36046 12.9653 9.31752 12.9807 9.2732 12.9807ZM6.79378 12.5969H9.20334C9.4465 12.3905 10.5082 11.4651 11.5563 10.1576C12.6425 8.8026 13.9374 6.74772 13.9374 4.65329C13.9374 2.63794 11.3981 0.38384 7.99981 0.38384C4.60148 0.38384 2.06238 2.63794 2.06238 4.65329C2.06238 6.85769 3.3563 8.90624 4.44199 10.2364C5.49084 11.5215 6.55311 12.4032 6.79378 12.5969Z" />
                                            <path
                                                d="M7.51886 12.7888C7.51886 12.7888 5.68372 9.03538 5.68372 4.65327C5.68372 2.43045 6.72066 0.191895 8 0.191895C9.27934 0.191895 10.3163 2.43045 10.3163 4.65327C10.3163 8.82024 8.48114 12.7888 8.48114 12.7888" />
                                            <path
                                                d="M7.34653 12.873C7.32753 12.8343 6.87594 11.9042 6.41802 10.4209C5.9956 9.05229 5.492 6.94079 5.492 4.65329C5.492 3.53843 5.74668 2.39036 6.19079 1.50312C6.67577 0.533921 7.31832 0 8.00002 0C8.68172 0 9.32426 0.53373 9.80944 1.50312C10.2535 2.39036 10.5082 3.53843 10.5082 4.65329C10.5082 6.82928 10.0048 8.94655 9.5824 10.3393C9.12505 11.8478 8.67423 12.8283 8.65542 12.8692L8.30709 12.7082C8.31169 12.6984 8.7675 11.7058 9.21717 10.2213C9.63114 8.85481 10.1246 6.77977 10.1246 4.65329C10.1246 3.5962 9.88467 2.51051 9.46648 1.67489C9.05577 0.854428 8.52146 0.38384 8.00021 0.38384C7.47895 0.38384 6.94465 0.854428 6.53394 1.67489C6.11574 2.51051 5.87584 3.5962 5.87584 4.65329C5.87584 6.893 6.37023 8.96439 6.78497 10.3076C7.23406 11.7626 7.68699 12.6951 7.6916 12.7043L7.34653 12.873ZM8.77038 16H7.22965C6.84658 16 6.5349 15.6883 6.5349 15.3052V13.9892C6.5349 13.8833 6.62088 13.7973 6.72682 13.7973H9.27321C9.37915 13.7973 9.46513 13.8833 9.46513 13.9892V15.3052C9.46513 15.6883 9.15346 16 8.77038 16ZM6.91874 14.1812V15.3052C6.91874 15.4766 7.05826 15.6162 7.22965 15.6162H8.77038C8.94177 15.6162 9.08129 15.4766 9.08129 15.3052V14.1812H6.91874Z" />
                                            <path
                                                d="M8.90952 14.1812H7.0907C7.00606 14.1812 6.93159 14.126 6.90703 14.045L6.54334 12.8445C6.52568 12.7863 6.53662 12.7232 6.5729 12.6745C6.60917 12.6257 6.66636 12.5969 6.72701 12.5969H9.2734C9.33424 12.5969 9.39143 12.6257 9.42751 12.6745C9.4454 12.6985 9.45739 12.7264 9.46252 12.756C9.46765 12.7855 9.46579 12.8158 9.45707 12.8445L9.09338 14.045C9.06862 14.1258 8.99397 14.1812 8.90952 14.1812ZM7.23291 13.7974H8.76693L9.01431 12.9808H6.98552L7.23291 13.7974Z" />
                                        </svg>
                                        <?php echo esc_html__('Experience', 'gofly') ?>
                                        <div class="info">
                                            <svg width="12" height="12" viewBox="0 0 12 12" xmlns="http://www.w3.org/2000/svg">
                                                <g>
                                                    <path
                                                        d="M6 0.375C4.88748 0.375 3.79995 0.704901 2.87492 1.32298C1.94989 1.94107 1.22892 2.81957 0.80318 3.84741C0.377437 4.87524 0.266043 6.00624 0.483085 7.09738C0.700127 8.18853 1.23586 9.19081 2.02253 9.97748C2.8092 10.7641 3.81148 11.2999 4.90262 11.5169C5.99376 11.734 7.12476 11.6226 8.1526 11.1968C9.18043 10.7711 10.0589 10.0501 10.677 9.12508C11.2951 8.20006 11.625 7.11252 11.625 6C11.6245 4.50831 11.0317 3.07786 9.97693 2.02307C8.92215 0.968289 7.49169 0.375497 6 0.375ZM6 9.375C5.85167 9.375 5.70666 9.33101 5.58333 9.2486C5.45999 9.16619 5.36386 9.04906 5.30709 8.91201C5.25033 8.77497 5.23548 8.62417 5.26441 8.47868C5.29335 8.3332 5.36478 8.19956 5.46967 8.09467C5.57456 7.98978 5.7082 7.91835 5.85369 7.88941C5.99917 7.86047 6.14997 7.87533 6.28702 7.93209C6.42406 7.98886 6.54119 8.08499 6.62361 8.20832C6.70602 8.33166 6.75 8.47666 6.75 8.625C6.74941 8.82373 6.6702 9.01415 6.52968 9.15468C6.38915 9.2952 6.19873 9.37441 6 9.375ZM6.85875 3.55875L6.6075 6.56625C6.5944 6.71834 6.52472 6.85999 6.41224 6.9632C6.29976 7.0664 6.15266 7.12367 6 7.12367C5.84735 7.12367 5.70024 7.0664 5.58776 6.9632C5.47528 6.85999 5.40561 6.71834 5.3925 6.56625L5.14125 3.55875C5.13042 3.44226 5.1434 3.32478 5.1794 3.21346C5.2154 3.10214 5.27367 2.99931 5.35067 2.91123C5.42767 2.82314 5.52178 2.75165 5.62729 2.70108C5.73279 2.65052 5.84748 2.62195 5.96437 2.61711C6.08127 2.61227 6.19793 2.63126 6.30725 2.67294C6.41657 2.71461 6.51627 2.77808 6.60029 2.8595C6.6843 2.94092 6.75087 3.03858 6.79595 3.14655C6.84103 3.25451 6.86367 3.37051 6.8625 3.4875C6.86313 3.51131 6.86187 3.53514 6.85875 3.55875Z" />
                                                </g>
                                            </svg>
                                            <div class="tooltip-text"><?php echo wp_kses_post(Egns_Helper::egns_get_tour_value('tour_experience_tip')) ?></div>
                                        </div>
                                    </li>
                                    <li>
                                        <svg width="16" height="16" viewBox="0 0 16 16" xmlns="http://www.w3.org/2000/svg">
                                            <g>
                                                <path
                                                    d="M8 0C3.58853 0 0 3.58853 0 8C0 12.4115 3.58853 16 8 16C12.4115 16 16 12.4108 16 8C16 3.58916 12.4115 0 8 0ZM8 14.7607C4.27266 14.7607 1.23934 11.728 1.23934 8C1.23934 4.27203 4.27266 1.23934 8 1.23934C11.7273 1.23934 14.7607 4.27203 14.7607 8C14.7607 11.728 11.728 14.7607 8 14.7607Z" />
                                                <path
                                                    d="M11.0984 7.32445H8.6197V4.84576C8.6197 4.5037 8.3427 4.22607 8.00001 4.22607C7.65733 4.22607 7.38033 4.5037 7.38033 4.84576V7.32445H4.90164C4.55895 7.32445 4.28195 7.60207 4.28195 7.94414C4.28195 8.2862 4.55895 8.56382 4.90164 8.56382H7.38033V11.0425C7.38033 11.3846 7.65733 11.6622 8.00001 11.6622C8.3427 11.6622 8.6197 11.3846 8.6197 11.0425V8.56382H11.0984C11.4411 8.56382 11.7181 8.2862 11.7181 7.94414C11.7181 7.60207 11.4411 7.32445 11.0984 7.32445Z" />
                                            </g>
                                        </svg>
                                        <?php echo esc_html__('Inclusion', 'gofly') ?>
                                        <div class="info">
                                            <svg width="12" height="12" viewBox="0 0 12 12" xmlns="http://www.w3.org/2000/svg">
                                                <g>
                                                    <path
                                                        d="M6 0.375C4.88748 0.375 3.79995 0.704901 2.87492 1.32298C1.94989 1.94107 1.22892 2.81957 0.80318 3.84741C0.377437 4.87524 0.266043 6.00624 0.483085 7.09738C0.700127 8.18853 1.23586 9.19081 2.02253 9.97748C2.8092 10.7641 3.81148 11.2999 4.90262 11.5169C5.99376 11.734 7.12476 11.6226 8.1526 11.1968C9.18043 10.7711 10.0589 10.0501 10.677 9.12508C11.2951 8.20006 11.625 7.11252 11.625 6C11.6245 4.50831 11.0317 3.07786 9.97693 2.02307C8.92215 0.968289 7.49169 0.375497 6 0.375ZM6 9.375C5.85167 9.375 5.70666 9.33101 5.58333 9.2486C5.45999 9.16619 5.36386 9.04906 5.30709 8.91201C5.25033 8.77497 5.23548 8.62417 5.26441 8.47868C5.29335 8.3332 5.36478 8.19956 5.46967 8.09467C5.57456 7.98978 5.7082 7.91835 5.85369 7.88941C5.99917 7.86047 6.14997 7.87533 6.28702 7.93209C6.42406 7.98886 6.54119 8.08499 6.62361 8.20832C6.70602 8.33166 6.75 8.47666 6.75 8.625C6.74941 8.82373 6.6702 9.01415 6.52968 9.15468C6.38915 9.2952 6.19873 9.37441 6 9.375ZM6.85875 3.55875L6.6075 6.56625C6.5944 6.71834 6.52472 6.85999 6.41224 6.9632C6.29976 7.0664 6.15266 7.12367 6 7.12367C5.84735 7.12367 5.70024 7.0664 5.58776 6.9632C5.47528 6.85999 5.40561 6.71834 5.3925 6.56625L5.14125 3.55875C5.13042 3.44226 5.1434 3.32478 5.1794 3.21346C5.2154 3.10214 5.27367 2.99931 5.35067 2.91123C5.42767 2.82314 5.52178 2.75165 5.62729 2.70108C5.73279 2.65052 5.84748 2.62195 5.96437 2.61711C6.08127 2.61227 6.19793 2.63126 6.30725 2.67294C6.41657 2.71461 6.51627 2.77808 6.60029 2.8595C6.6843 2.94092 6.75087 3.03858 6.79595 3.14655C6.84103 3.25451 6.86367 3.37051 6.8625 3.4875C6.86313 3.51131 6.86187 3.53514 6.85875 3.55875Z" />
                                                </g>
                                            </svg>
                                            <div class="tooltip-text"><?php echo wp_kses_post(Egns_Helper::egns_get_tour_value('tour_inclusion_tip')) ?></div>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            <?php else: ?>
                <div class="col-md-6 item">
                    <div class="package-card four">
                        <div class="package-img-wrap">
                            <?php if (!empty($gallery_opt)) : ?>
                                <div class="swiper package-card-img-slider">
                                    <div class="swiper-wrapper">
                                        <?php if (has_post_thumbnail()) : ?>
                                            <div class="swiper-slide">
                                                <a href="<?php the_permalink() ?>" class="package-img">
                                                    <?php the_post_thumbnail('card-thumb') ?>
                                                </a>
                                            </div>
                                        <?php endif; ?>
                                        <?php
                                        if (! empty($gallery_ids)) :
                                            foreach ($gallery_ids as $gallery_item_id) :
                                        ?>
                                                <div class="swiper-slide">
                                                    <a href="<?php the_permalink() ?>" class="package-img">
                                                        <?php
                                                        echo wp_get_attachment_image($gallery_item_id, 'card-thumb', false, ['alt'   => esc_attr__('image', 'gofly'), 'class' => 'my-custom-class',]);
                                                        ?>
                                                    </a>
                                                </div>
                                        <?php
                                            endforeach;
                                        endif;
                                        ?>
                                    </div>
                                </div>
                                <div class="slider-btn-grp">
                                    <div class="slider-btn package-img-slider-prev">
                                        <svg width="12" height="12" viewBox="0 0 12 12" xmlns="http://www.w3.org/2000/svg">
                                            <path
                                                d="M4.84554 6.00254L9.33471 1.51317C9.45832 1.38985 9.52632 1.22498 9.52632 1.04917C9.52632 0.873268 9.45832 0.708488 9.33471 0.584976L8.94135 0.191805C8.81793 0.0680975 8.65295 0 8.47715 0C8.30134 0 8.13656 0.0680975 8.01305 0.191805L2.66798 5.53678C2.54398 5.66068 2.47608 5.82624 2.47657 6.00224C2.47608 6.17902 2.54388 6.34439 2.66798 6.46839L8.00808 11.8082C8.13159 11.9319 8.29637 12 8.47227 12C8.64808 12 8.81286 11.9319 8.93647 11.8082L9.32973 11.415C9.58564 11.1591 9.58564 10.7425 9.32973 10.4867L4.84554 6.00254Z" />
                                        </svg>
                                    </div>
                                    <div class="slider-btn package-img-slider-next">
                                        <svg width="12" height="12" viewBox="0 0 12 12" xmlns="http://www.w3.org/2000/svg">
                                            <path
                                                d="M7.15446 6.00254L2.66529 1.51317C2.54168 1.38985 2.47368 1.22498 2.47368 1.04917C2.47368 0.873268 2.54168 0.708488 2.66529 0.584976L3.05865 0.191805C3.18207 0.0680975 3.34705 0 3.52285 0C3.69866 0 3.86344 0.0680975 3.98695 0.191805L9.33202 5.53678C9.45602 5.66068 9.52392 5.82624 9.52343 6.00224C9.52392 6.17902 9.45612 6.34439 9.33202 6.46839L3.99192 11.8082C3.86841 11.9319 3.70363 12 3.52773 12C3.35192 12 3.18714 11.9319 3.06353 11.8082L2.67027 11.415C2.41436 11.1591 2.41436 10.7425 2.67027 10.4867L7.15446 6.00254Z" />
                                        </svg>
                                    </div>
                                </div>
                            <?php else: ?>
                                <a href="<?php the_permalink() ?>" class="package-img">
                                    <?php the_post_thumbnail('card-thumb') ?>
                                </a>
                            <?php endif; ?>
                            <div class="batch">
                                <?php if (Egns_Helper::has_sale_price(get_the_ID())): ?>
                                    <span><?php echo esc_html__('Sale on!', 'gofly') ?></span>
                                <?php endif; ?>
                                <?php if (!empty($tour_types) && !is_wp_error($tour_types)) : ?>
                                    <span class="yellow-bg"><?php echo esc_html($tour_types[0]->name) ?></span>
                                <?php endif; ?>
                                <?php if ($is_featured == 1) : ?>
                                    <span class="discount"><?php echo esc_html__('Featured', 'gofly') ?></span>
                                <?php endif; ?>
                            </div>
                            <a href="#" class="map-view-btn" data-bs-toggle="modal" data-bs-target="#mapViewModal<?php echo get_the_ID() ?>">
                                <svg width="16" height="16" viewBox="0 0 16 16" xmlns="http://www.w3.org/2000/svg">
                                    <g>
                                        <path
                                            d="M13.125 3.28125C13.125 3.75238 12.9846 4.21493 12.752 4.57227L10.8125 7.55273L8.87305 4.57227C8.64043 4.21494 8.5 3.75238 8.5 3.28125C8.50001 2.00412 9.53534 0.96875 10.8125 0.96875C12.0897 0.968755 13.125 2.00412 13.125 3.28125ZM14.125 3.28125C14.125 1.45184 12.6419 -0.0312455 10.8125 -0.03125C8.98305 -0.03125 7.50001 1.45184 7.5 3.28125C7.5 3.9403 7.69305 4.59297 8.03418 5.11719L10.8125 9.38574L13.5908 5.11719C13.9319 4.59298 14.125 3.94031 14.125 3.28125Z" />
                                        <path
                                            d="M11.25 3.28125C11.25 3.54336 11.0322 3.75 10.8125 3.75C10.5928 3.75 10.375 3.54336 10.375 3.28125C10.375 3.04058 10.5718 2.84375 10.8125 2.84375C11.0532 2.84375 11.25 3.04058 11.25 3.28125ZM12.25 3.28125C12.25 2.4883 11.6055 1.84375 10.8125 1.84375C10.0195 1.84375 9.375 2.4883 9.375 3.28125C9.375 4.05277 9.99859 4.75 10.8125 4.75C11.6264 4.75 12.25 4.05276 12.25 3.28125Z" />
                                        <path
                                            d="M5.19336 14.1855L10.6562 15.9756L10.8271 16.0312L15.7129 14.1221L16.0312 13.998V3.51465L12.6914 4.83496L13.0586 5.76465L15.0312 4.98535V13.3154L10.7979 14.9697L5.34277 13.1807L5.18066 13.1279L0.96875 14.6348V6.46484L5.20215 4.7832L8.70605 5.9502L9.02246 5.00098L5.17285 3.71777L0.28418 5.66016L-0.03125 5.78613V16.0537L5.19336 14.1855Z" />
                                        <path d="M5.6875 13.6562V4.25H4.6875V13.6562H5.6875Z" />
                                        <path d="M11.3125 15.5V8.46875H10.3125V15.5H11.3125Z" />
                                    </g>
                                </svg>
                                <?php echo  esc_html__('View Map', 'gofly') ?>
                            </a>
                        </div>
                        <div class="package-content">
                            <div class="package-content-title-area">
                                <?php if (class_exists('Post_Rating_Shortcode')) : ?>
                                    <a href="<?php the_permalink() ?>" class="rating-area">
                                        <?php echo do_shortcode('[post_rating_count]'); ?>
                                    </a>
                                <?php endif; ?>
                                <h5><a href="<?php the_permalink() ?>"><?php the_title() ?></a></h5>
                                <?php if (!empty(Egns_Helper::egns_get_tour_value('tour_package_info_list'))) : ?>
                                    <ul class="package-features">
                                        <?php
                                        $pkg_list = Egns_Helper::egns_get_tour_value('tour_package_info_list');
                                        $data = explode("\n", $pkg_list);
                                        foreach ($data as $value) :
                                        ?>
                                            <li>
                                                <svg width="10" height="10" viewBox="0 0 10 10" xmlns="http://www.w3.org/2000/svg">
                                                    <path
                                                        d="M9.61933 3.0722L4.05903 8.6355C3.97043 8.7211 3.85813 8.7655 3.74593 8.7655C3.68772 8.76559 3.63008 8.75415 3.57632 8.73184C3.52256 8.70952 3.47376 8.67678 3.43272 8.6355L0.380725 5.5835C0.206425 5.4121 0.206425 5.1315 0.380725 4.9572L1.45912 3.8758C1.62462 3.7104 1.92002 3.7104 2.08552 3.8758L3.74593 5.5362L7.91463 1.3645C7.95569 1.32334 8.00445 1.29068 8.05814 1.26837C8.11183 1.24607 8.16939 1.23456 8.22753 1.2345C8.34563 1.2345 8.45792 1.2818 8.54063 1.3645L9.61903 2.446C9.79363 2.6203 9.79363 2.9009 9.61933 3.0722Z" />
                                                </svg>
                                                <?php echo esc_html($value) ?>
                                            </li>
                                        <?php endforeach; ?>
                                    </ul>
                                <?php endif; ?>
                            </div>
                            <div class="package-content-bottom-area">
                                <ul class="package-info-list">
                                    <?php if (!empty(Egns_Helper::egns_get_tour_value('tour_duration_day'))) : ?>
                                        <li><span><?php echo esc_html__('Duration', 'gofly') ?>:</span> <?php echo Egns_Helper::egns_get_tour_value('tour_duration_day') ?></li>
                                    <?php endif; ?>
                                    <?php
                                    if (!empty($language) && !is_wp_error($language)) :
                                        $language_list = [];
                                        foreach ($language as $lan) {
                                            $language_list[] = $lan->name;
                                        }
                                        $lan_data = implode(', ', $language_list);
                                    ?>
                                        <li><span><?php echo esc_html__('Operated', 'gofly') ?>:</span> <?php echo esc_html($lan_data) ?></li>
                                    <?php endif; ?>
                                </ul>
                                <div class="location-area">
                                    <?php
                                    $locations = Egns_Helper::egns_get_tour_value('tour_destination_select');
                                    $location_links = [];
                                    foreach ($locations as $post_id) {
                                        $destination = get_post($post_id);
                                        if ($destination) {
                                            $link = get_permalink($post_id);
                                            $location_links[] = $destination->post_title;
                                        }
                                    }
                                    $data = implode(' + ', $location_links);
                                    if (!empty($locations)) :
                                    ?>
                                        <span><?php echo esc_html__('Destinations', 'gofly') ?>: <strong><?php echo esc_html($data) ?>.</strong></span>
                                    <?php endif; ?>
                                </div>
                                <div class="btn-and-price-area">
                                    <a href="<?php the_permalink() ?>" class="primary-btn1">
                                        <span>
                                            <?php echo esc_html__('Book Now', 'gofly') ?>
                                            <svg width="10" height="10" viewBox="0 0 10 10" xmlns="http://www.w3.org/2000/svg">
                                                <path
                                                    d="M9.73535 1.14746C9.57033 1.97255 9.32924 3.26406 9.24902 4.66797C9.16817 6.08312 9.25559 7.5453 9.70214 8.73633C9.84754 9.12406 9.65129 9.55659 9.26367 9.70215C8.9001 9.83849 8.4969 9.67455 8.32812 9.33398L8.29785 9.26367L8.19921 8.98438C7.73487 7.5758 7.67054 5.98959 7.75097 4.58203C7.77875 4.09598 7.82525 3.62422 7.87988 3.17969L1.53027 9.53027C1.23738 9.82317 0.762615 9.82317 0.469722 9.53027C0.176829 9.23738 0.176829 8.76262 0.469722 8.46973L6.83593 2.10254C6.3319 2.16472 5.79596 2.21841 5.25 2.24902C3.8302 2.32862 2.2474 2.26906 0.958003 1.79102L0.704097 1.68945L0.635738 1.65527C0.303274 1.47099 0.157578 1.06102 0.310542 0.704102C0.463655 0.347333 0.860941 0.170391 1.22363 0.28418L1.29589 0.310547L1.48828 0.387695C2.47399 0.751207 3.79966 0.827571 5.16601 0.750977C6.60111 0.670504 7.97842 0.428235 8.86132 0.262695L9.95312 0.0585938L9.73535 1.14746Z" />
                                            </svg>
                                        </span>
                                        <span>
                                            <?php echo esc_html__('Book Now', 'gofly') ?>
                                            <svg width="10" height="10" viewBox="0 0 10 10" xmlns="http://www.w3.org/2000/svg">
                                                <path
                                                    d="M9.73535 1.14746C9.57033 1.97255 9.32924 3.26406 9.24902 4.66797C9.16817 6.08312 9.25559 7.5453 9.70214 8.73633C9.84754 9.12406 9.65129 9.55659 9.26367 9.70215C8.9001 9.83849 8.4969 9.67455 8.32812 9.33398L8.29785 9.26367L8.19921 8.98438C7.73487 7.5758 7.67054 5.98959 7.75097 4.58203C7.77875 4.09598 7.82525 3.62422 7.87988 3.17969L1.53027 9.53027C1.23738 9.82317 0.762615 9.82317 0.469722 9.53027C0.176829 9.23738 0.176829 8.76262 0.469722 8.46973L6.83593 2.10254C6.3319 2.16472 5.79596 2.21841 5.25 2.24902C3.8302 2.32862 2.2474 2.26906 0.958003 1.79102L0.704097 1.68945L0.635738 1.65527C0.303274 1.47099 0.157578 1.06102 0.310542 0.704102C0.463655 0.347333 0.860941 0.170391 1.22363 0.28418L1.29589 0.310547L1.48828 0.387695C2.47399 0.751207 3.79966 0.827571 5.16601 0.750977C6.60111 0.670504 7.97842 0.428235 8.86132 0.262695L9.95312 0.0585938L9.73535 1.14746Z" />
                                            </svg>
                                        </span>
                                    </a>
                                    <?php echo Egns_Helper::get_global_starting_price(get_the_ID()) ?>
                                </div>
                                <svg class="divider" height="6" viewBox="0 0 374 6" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M5 2.5L0 0.113249V5.88675L5 3.5V2.5ZM369 3.5L374 5.88675V0.113249L369 2.5V3.5ZM4.5 3.5H369.5V2.5H4.5V3.5Z" />
                                </svg>
                                <div class="bottom-area">
                                    <ul>
                                        <li>
                                            <svg width="16" height="16" viewBox="0 0 16 16" xmlns="http://www.w3.org/2000/svg">
                                                <path
                                                    d="M9.2732 12.9807H6.7268C6.68429 12.9807 6.64298 12.9666 6.60935 12.9406C6.55906 12.9018 5.36398 11.9718 4.14989 10.4857C3.43499 9.61078 2.86499 8.72565 2.45543 7.8549C1.93974 6.75846 1.67834 5.68141 1.67834 4.65329C1.67834 3.50657 2.36043 2.33394 3.54995 1.43595C4.1378 0.992226 4.81163 0.641781 5.55321 0.394396C6.33797 0.132617 7.16112 0 8 0C8.83888 0 9.66203 0.132617 10.4466 0.394396C11.1882 0.641781 11.862 0.992035 12.4499 1.43595C13.6392 2.33394 14.3215 3.50676 14.3215 4.65329C14.3215 5.63247 14.0599 6.67939 13.544 7.7647C13.1348 8.62565 12.5652 9.51367 11.8511 10.4036C10.6383 11.9148 9.40697 12.9272 9.39468 12.9371C9.36046 12.9653 9.31752 12.9807 9.2732 12.9807ZM6.79378 12.5969H9.20334C9.4465 12.3905 10.5082 11.4651 11.5563 10.1576C12.6425 8.8026 13.9374 6.74772 13.9374 4.65329C13.9374 2.63794 11.3981 0.38384 7.99981 0.38384C4.60148 0.38384 2.06238 2.63794 2.06238 4.65329C2.06238 6.85769 3.3563 8.90624 4.44199 10.2364C5.49084 11.5215 6.55311 12.4032 6.79378 12.5969Z" />
                                                <path
                                                    d="M7.51886 12.7888C7.51886 12.7888 5.68372 9.03538 5.68372 4.65327C5.68372 2.43045 6.72066 0.191895 8 0.191895C9.27934 0.191895 10.3163 2.43045 10.3163 4.65327C10.3163 8.82024 8.48114 12.7888 8.48114 12.7888" />
                                                <path
                                                    d="M7.34653 12.873C7.32753 12.8343 6.87594 11.9042 6.41802 10.4209C5.9956 9.05229 5.492 6.94079 5.492 4.65329C5.492 3.53843 5.74668 2.39036 6.19079 1.50312C6.67577 0.533921 7.31832 0 8.00002 0C8.68172 0 9.32426 0.53373 9.80944 1.50312C10.2535 2.39036 10.5082 3.53843 10.5082 4.65329C10.5082 6.82928 10.0048 8.94655 9.5824 10.3393C9.12505 11.8478 8.67423 12.8283 8.65542 12.8692L8.30709 12.7082C8.31169 12.6984 8.7675 11.7058 9.21717 10.2213C9.63114 8.85481 10.1246 6.77977 10.1246 4.65329C10.1246 3.5962 9.88467 2.51051 9.46648 1.67489C9.05577 0.854428 8.52146 0.38384 8.00021 0.38384C7.47895 0.38384 6.94465 0.854428 6.53394 1.67489C6.11574 2.51051 5.87584 3.5962 5.87584 4.65329C5.87584 6.893 6.37023 8.96439 6.78497 10.3076C7.23406 11.7626 7.68699 12.6951 7.6916 12.7043L7.34653 12.873ZM8.77038 16H7.22965C6.84658 16 6.5349 15.6883 6.5349 15.3052V13.9892C6.5349 13.8833 6.62088 13.7973 6.72682 13.7973H9.27321C9.37915 13.7973 9.46513 13.8833 9.46513 13.9892V15.3052C9.46513 15.6883 9.15346 16 8.77038 16ZM6.91874 14.1812V15.3052C6.91874 15.4766 7.05826 15.6162 7.22965 15.6162H8.77038C8.94177 15.6162 9.08129 15.4766 9.08129 15.3052V14.1812H6.91874Z" />
                                                <path
                                                    d="M8.90952 14.1812H7.0907C7.00606 14.1812 6.93159 14.126 6.90703 14.045L6.54334 12.8445C6.52568 12.7863 6.53662 12.7232 6.5729 12.6745C6.60917 12.6257 6.66636 12.5969 6.72701 12.5969H9.2734C9.33424 12.5969 9.39143 12.6257 9.42751 12.6745C9.4454 12.6985 9.45739 12.7264 9.46252 12.756C9.46765 12.7855 9.46579 12.8158 9.45707 12.8445L9.09338 14.045C9.06862 14.1258 8.99397 14.1812 8.90952 14.1812ZM7.23291 13.7974H8.76693L9.01431 12.9808H6.98552L7.23291 13.7974Z" />
                                            </svg>
                                            <?php echo esc_html__('Experience', 'gofly') ?>
                                            <div class="info">
                                                <svg width="12" height="12" viewBox="0 0 12 12" xmlns="http://www.w3.org/2000/svg">
                                                    <g>
                                                        <path
                                                            d="M6 0.375C4.88748 0.375 3.79995 0.704901 2.87492 1.32298C1.94989 1.94107 1.22892 2.81957 0.80318 3.84741C0.377437 4.87524 0.266043 6.00624 0.483085 7.09738C0.700127 8.18853 1.23586 9.19081 2.02253 9.97748C2.8092 10.7641 3.81148 11.2999 4.90262 11.5169C5.99376 11.734 7.12476 11.6226 8.1526 11.1968C9.18043 10.7711 10.0589 10.0501 10.677 9.12508C11.2951 8.20006 11.625 7.11252 11.625 6C11.6245 4.50831 11.0317 3.07786 9.97693 2.02307C8.92215 0.968289 7.49169 0.375497 6 0.375ZM6 9.375C5.85167 9.375 5.70666 9.33101 5.58333 9.2486C5.45999 9.16619 5.36386 9.04906 5.30709 8.91201C5.25033 8.77497 5.23548 8.62417 5.26441 8.47868C5.29335 8.3332 5.36478 8.19956 5.46967 8.09467C5.57456 7.98978 5.7082 7.91835 5.85369 7.88941C5.99917 7.86047 6.14997 7.87533 6.28702 7.93209C6.42406 7.98886 6.54119 8.08499 6.62361 8.20832C6.70602 8.33166 6.75 8.47666 6.75 8.625C6.74941 8.82373 6.6702 9.01415 6.52968 9.15468C6.38915 9.2952 6.19873 9.37441 6 9.375ZM6.85875 3.55875L6.6075 6.56625C6.5944 6.71834 6.52472 6.85999 6.41224 6.9632C6.29976 7.0664 6.15266 7.12367 6 7.12367C5.84735 7.12367 5.70024 7.0664 5.58776 6.9632C5.47528 6.85999 5.40561 6.71834 5.3925 6.56625L5.14125 3.55875C5.13042 3.44226 5.1434 3.32478 5.1794 3.21346C5.2154 3.10214 5.27367 2.99931 5.35067 2.91123C5.42767 2.82314 5.52178 2.75165 5.62729 2.70108C5.73279 2.65052 5.84748 2.62195 5.96437 2.61711C6.08127 2.61227 6.19793 2.63126 6.30725 2.67294C6.41657 2.71461 6.51627 2.77808 6.60029 2.8595C6.6843 2.94092 6.75087 3.03858 6.79595 3.14655C6.84103 3.25451 6.86367 3.37051 6.8625 3.4875C6.86313 3.51131 6.86187 3.53514 6.85875 3.55875Z" />
                                                    </g>
                                                </svg>
                                                <div class="tooltip-text"><?php echo wp_kses_post(Egns_Helper::egns_get_tour_value('tour_experience_tip')) ?></div>
                                            </div>
                                        </li>
                                        <li>
                                            <svg width="16" height="16" viewBox="0 0 16 16" xmlns="http://www.w3.org/2000/svg">
                                                <g>
                                                    <path
                                                        d="M8 0C3.58853 0 0 3.58853 0 8C0 12.4115 3.58853 16 8 16C12.4115 16 16 12.4108 16 8C16 3.58916 12.4115 0 8 0ZM8 14.7607C4.27266 14.7607 1.23934 11.728 1.23934 8C1.23934 4.27203 4.27266 1.23934 8 1.23934C11.7273 1.23934 14.7607 4.27203 14.7607 8C14.7607 11.728 11.728 14.7607 8 14.7607Z" />
                                                    <path
                                                        d="M11.0984 7.32445H8.6197V4.84576C8.6197 4.5037 8.3427 4.22607 8.00001 4.22607C7.65733 4.22607 7.38033 4.5037 7.38033 4.84576V7.32445H4.90164C4.55895 7.32445 4.28195 7.60207 4.28195 7.94414C4.28195 8.2862 4.55895 8.56382 4.90164 8.56382H7.38033V11.0425C7.38033 11.3846 7.65733 11.6622 8.00001 11.6622C8.3427 11.6622 8.6197 11.3846 8.6197 11.0425V8.56382H11.0984C11.4411 8.56382 11.7181 8.2862 11.7181 7.94414C11.7181 7.60207 11.4411 7.32445 11.0984 7.32445Z" />
                                                </g>
                                            </svg>
                                            <?php echo esc_html__('Inclusion', 'gofly') ?>
                                            <div class="info">
                                                <svg width="12" height="12" viewBox="0 0 12 12" xmlns="http://www.w3.org/2000/svg">
                                                    <g>
                                                        <path
                                                            d="M6 0.375C4.88748 0.375 3.79995 0.704901 2.87492 1.32298C1.94989 1.94107 1.22892 2.81957 0.80318 3.84741C0.377437 4.87524 0.266043 6.00624 0.483085 7.09738C0.700127 8.18853 1.23586 9.19081 2.02253 9.97748C2.8092 10.7641 3.81148 11.2999 4.90262 11.5169C5.99376 11.734 7.12476 11.6226 8.1526 11.1968C9.18043 10.7711 10.0589 10.0501 10.677 9.12508C11.2951 8.20006 11.625 7.11252 11.625 6C11.6245 4.50831 11.0317 3.07786 9.97693 2.02307C8.92215 0.968289 7.49169 0.375497 6 0.375ZM6 9.375C5.85167 9.375 5.70666 9.33101 5.58333 9.2486C5.45999 9.16619 5.36386 9.04906 5.30709 8.91201C5.25033 8.77497 5.23548 8.62417 5.26441 8.47868C5.29335 8.3332 5.36478 8.19956 5.46967 8.09467C5.57456 7.98978 5.7082 7.91835 5.85369 7.88941C5.99917 7.86047 6.14997 7.87533 6.28702 7.93209C6.42406 7.98886 6.54119 8.08499 6.62361 8.20832C6.70602 8.33166 6.75 8.47666 6.75 8.625C6.74941 8.82373 6.6702 9.01415 6.52968 9.15468C6.38915 9.2952 6.19873 9.37441 6 9.375ZM6.85875 3.55875L6.6075 6.56625C6.5944 6.71834 6.52472 6.85999 6.41224 6.9632C6.29976 7.0664 6.15266 7.12367 6 7.12367C5.84735 7.12367 5.70024 7.0664 5.58776 6.9632C5.47528 6.85999 5.40561 6.71834 5.3925 6.56625L5.14125 3.55875C5.13042 3.44226 5.1434 3.32478 5.1794 3.21346C5.2154 3.10214 5.27367 2.99931 5.35067 2.91123C5.42767 2.82314 5.52178 2.75165 5.62729 2.70108C5.73279 2.65052 5.84748 2.62195 5.96437 2.61711C6.08127 2.61227 6.19793 2.63126 6.30725 2.67294C6.41657 2.71461 6.51627 2.77808 6.60029 2.8595C6.6843 2.94092 6.75087 3.03858 6.79595 3.14655C6.84103 3.25451 6.86367 3.37051 6.8625 3.4875C6.86313 3.51131 6.86187 3.53514 6.85875 3.55875Z" />
                                                    </g>
                                                </svg>
                                                <div class="tooltip-text"><?php echo wp_kses_post(Egns_Helper::egns_get_tour_value('tour_inclusion_tip')) ?></div>
                                            </div>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Map View Modal section Start-->
                <div class="modal map-view-modal fade" id="mapViewModal<?php echo get_the_ID() ?>" tabindex="-1" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered">
                        <div class="modal-content">
                            <button type="button" class="close-btn" data-bs-dismiss="modal" aria-label="Close">
                                <svg width="10" height="10" viewBox="0 0 10 10" xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M2.00247 0.500545C1.79016 0.505525 1.58918 0.582706 1.4362 0.735547L0.694403 1.479C0.345704 1.82743 0.389689 2.43243 0.79164 2.83493L3.00694 5.05341L0.79164 7.27092C0.389689 7.67328 0.345566 8.27842 0.694403 8.62753L1.4362 9.37044C1.7849 9.71872 2.38879 9.67543 2.7913 9.27293L5.00659 7.05473L7.22189 9.27293C7.62467 9.67543 8.22898 9.71872 8.57699 9.37044L9.31989 8.62753C9.6679 8.27856 9.62461 7.67342 9.22182 7.27092L7.00653 5.05341L9.22182 2.83493C9.62461 2.43243 9.6679 1.82743 9.31989 1.479L8.57699 0.735547C8.22898 0.386433 7.62467 0.430557 7.22189 0.833614L5.00659 3.05126L2.7913 0.833753C2.56515 0.606635 2.27482 0.493906 2.00247 0.500545Z" />
                                </svg>
                            </button>
                            <div class="title-area">
                                <?php if (class_exists('Post_Rating_Shortcode')) : ?>
                                    <a href="<?php the_permalink() ?>" class="rating-area">
                                        <?php echo do_shortcode('[post_rating_count]'); ?>
                                    </a>
                                <?php endif; ?>
                                <h2 class="modal-title" id="ratingModalLabel"><?php the_title() ?></h2>
                                <?php if (!empty(Egns_Helper::egns_get_tour_value('tour_package_info_list'))) : ?>
                                    <ul class="package-features">
                                        <?php
                                        $pkg_list = Egns_Helper::egns_get_tour_value('tour_package_info_list');
                                        $data = explode("\n", $pkg_list);
                                        foreach ($data as $value) :
                                        ?>
                                            <li>
                                                <svg width="10" height="10" viewBox="0 0 10 10" xmlns="http://www.w3.org/2000/svg">
                                                    <path
                                                        d="M9.61933 3.0722L4.05903 8.6355C3.97043 8.7211 3.85813 8.7655 3.74593 8.7655C3.68772 8.76559 3.63008 8.75415 3.57632 8.73184C3.52256 8.70952 3.47376 8.67678 3.43272 8.6355L0.380725 5.5835C0.206425 5.4121 0.206425 5.1315 0.380725 4.9572L1.45912 3.8758C1.62462 3.7104 1.92002 3.7104 2.08552 3.8758L3.74593 5.5362L7.91463 1.3645C7.95569 1.32334 8.00445 1.29068 8.05814 1.26837C8.11183 1.24607 8.16939 1.23456 8.22753 1.2345C8.34563 1.2345 8.45792 1.2818 8.54063 1.3645L9.61903 2.446C9.79363 2.6203 9.79363 2.9009 9.61933 3.0722Z" />
                                                </svg>
                                                <?php echo esc_html($value) ?>
                                            </li>
                                        <?php endforeach; ?>
                                    </ul>
                                <?php endif; ?>
                            </div>
                            <div class="modal-body">
                                <div class="map-iframe">
                                    <?php echo Egns_Helper::egns_get_tour_value('tour_iframe_code') ?>
                                </div>
                                <div class="bottom-area">
                                    <?php echo Egns_Helper::card_popup_starting_price(get_the_ID()) ?>
                                    <?php
                                    $locations = Egns_Helper::egns_get_tour_value('tour_destination_select');
                                    $location_links = [];
                                    foreach ($locations as $post_id) {
                                        $destination = get_post($post_id);
                                        if ($destination) {
                                            $link = get_permalink($post_id);
                                            $location_links[] = $destination->post_title;
                                        }
                                    }
                                    $data = implode(' + ', $location_links);
                                    if (!empty($locations)) :
                                    ?>
                                        <span><?php echo esc_html($data) ?></span>
                                    <?php endif; ?>
                                    <a href="<?php the_permalink() ?>" class="primary-btn1 two">
                                        <span>
                                            <?php echo esc_html__('Book Now', 'gofly') ?>
                                            <svg width="10" height="10" viewBox="0 0 10 10" xmlns="http://www.w3.org/2000/svg">
                                                <path
                                                    d="M9.73535 1.14746C9.57033 1.97255 9.32924 3.26406 9.24902 4.66797C9.16817 6.08312 9.25559 7.5453 9.70214 8.73633C9.84754 9.12406 9.65129 9.55659 9.26367 9.70215C8.9001 9.83849 8.4969 9.67455 8.32812 9.33398L8.29785 9.26367L8.19921 8.98438C7.73487 7.5758 7.67054 5.98959 7.75097 4.58203C7.77875 4.09598 7.82525 3.62422 7.87988 3.17969L1.53027 9.53027C1.23738 9.82317 0.762615 9.82317 0.469722 9.53027C0.176829 9.23738 0.176829 8.76262 0.469722 8.46973L6.83593 2.10254C6.3319 2.16472 5.79596 2.21841 5.25 2.24902C3.8302 2.32862 2.2474 2.26906 0.958003 1.79102L0.704097 1.68945L0.635738 1.65527C0.303274 1.47099 0.157578 1.06102 0.310542 0.704102C0.463655 0.347333 0.860941 0.170391 1.22363 0.28418L1.29589 0.310547L1.48828 0.387695C2.47399 0.751207 3.79966 0.827571 5.16601 0.750977C6.60111 0.670504 7.97842 0.428235 8.86132 0.262695L9.95312 0.0585938L9.73535 1.14746Z" />
                                            </svg>
                                        </span>
                                        <span>
                                            <?php echo esc_html__('Book Now', 'gofly') ?>
                                            <svg width="10" height="10" viewBox="0 0 10 10" xmlns="http://www.w3.org/2000/svg">
                                                <path
                                                    d="M9.73535 1.14746C9.57033 1.97255 9.32924 3.26406 9.24902 4.66797C9.16817 6.08312 9.25559 7.5453 9.70214 8.73633C9.84754 9.12406 9.65129 9.55659 9.26367 9.70215C8.9001 9.83849 8.4969 9.67455 8.32812 9.33398L8.29785 9.26367L8.19921 8.98438C7.73487 7.5758 7.67054 5.98959 7.75097 4.58203C7.77875 4.09598 7.82525 3.62422 7.87988 3.17969L1.53027 9.53027C1.23738 9.82317 0.762615 9.82317 0.469722 9.53027C0.176829 9.23738 0.176829 8.76262 0.469722 8.46973L6.83593 2.10254C6.3319 2.16472 5.79596 2.21841 5.25 2.24902C3.8302 2.32862 2.2474 2.26906 0.958003 1.79102L0.704097 1.68945L0.635738 1.65527C0.303274 1.47099 0.157578 1.06102 0.310542 0.704102C0.463655 0.347333 0.860941 0.170391 1.22363 0.28418L1.29589 0.310547L1.48828 0.387695C2.47399 0.751207 3.79966 0.827571 5.16601 0.750977C6.60111 0.670504 7.97842 0.428235 8.86132 0.262695L9.95312 0.0585938L9.73535 1.14746Z" />
                                            </svg>
                                        </span>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Map View Modal section End-->
            <?php endif; ?>
        <?php
        }
        wp_reset_postdata();
    } else {
        // Include global posts not found
        Egns\Helper\Egns_Helper::egns_template_part('content', 'templates/posts-not-found');
    }

    $html = ob_get_clean();

    // === Pagination HTML === //
    ob_start();

    $total_pages = $query->max_num_pages;
    if ($total_pages > 1) {
        $current_page = max(1, $paged);

        // Manually build pagination base URL using current request
        global $wp;
        $base_url = home_url(add_query_arg([], $wp->request));
        $base_url = trailingslashit($base_url);

        $big = 999999999;
        $links = paginate_links([
            'base'      => $base_url . '%_%',
            'format'    => 'page/%#%/',
            'current'   => $current_page,
            'total'     => $total_pages,
            'type'      => 'list',
            'end_size'  => 1,
            'mid_size'  => 1,
            'prev_next' => false,
        ]);

        // === Your theme’s formatting replacements === //
        $links = str_replace("<ul class='page-numbers'>", "<ul class='paginations'>", $links);
        $links = str_replace("<li>", "<li class='page-item'>", $links);
        $links = str_replace("page-numbers", "", $links);
        $links = str_replace("&laquo; Previous</a>", '&laquo;</a>', $links);
        $links = str_replace("Next &raquo;</a>", "&raquo;</a>", $links);
        $links = str_replace("next aria-label='Next'", "page-link", $links);
        $links = str_replace("prev aria-hidden='true'", "sr-only page-link", $links);
        $links = str_replace("<li><span", " <li class='page-item active'><a", $links);
        $links = str_replace('span', 'a', $links);
        $links = preg_replace('/>([0-9])</', '>0$1<', $links);

        // Build next and previous URLs manually to avoid “page 0” issue
        $prev_link = ($current_page > 1) ? $base_url . 'page/' . ($current_page - 1) . '/' : '#';
        $next_link = ($current_page < $total_pages) ? $base_url . 'page/' . ($current_page + 1) . '/' : '#';
        ?>
        <div id="hide-ax">
            <div class="pagination-area tour wow animate fadeInUp mt-60" data-wow-delay="200ms" data-wow-duration="1500ms">
                <?php if ($current_page > 1): ?>
                    <div class="paginations-button">
                        <a href="<?php echo esc_url($prev_link); ?>">
                            <svg width="10" height="10" viewBox="0 0 10 10" xmlns="http://www.w3.org/2000/svg">
                                <g>
                                    <path
                                        d="M7.86133 9.28516C7.14704 7.49944 3.57561 5.71373 1.43276 4.99944C3.57561 4.28516 6.7899 3.21373 7.86133 0.713728"
                                        stroke-width="1.5" stroke-linecap="round" />
                                </g>
                            </svg>
                            <?php echo esc_html__('Prev', 'gofly'); ?>
                        </a>
                    </div>
                <?php endif; ?>

                <?php echo sprintf('%s', $links); ?>

                <?php if ($current_page < $total_pages): ?>
                    <div class="paginations-button">
                        <a href="<?php echo esc_url($next_link); ?>">
                            <?php echo esc_html__('Next', 'gofly'); ?>
                            <svg width="10" height="10" viewBox="0 0 10 10" xmlns="http://www.w3.org/2000/svg">
                                <g>
                                    <path
                                        d="M1.42969 9.28613C2.14397 7.50042 5.7154 5.7147 7.85826 5.00042C5.7154 4.28613 2.50112 3.21471 1.42969 0.714705"
                                        stroke-width="1.5" stroke-linecap="round" />
                                </g>
                            </svg>
                        </a>
                    </div>
                <?php endif; ?>
            </div>
        </div>
        <?php
    }

    $pagination_html = ob_get_clean();



    wp_send_json([
        'html'       => $html,
        'pagination' => $pagination_html,
    ]);

    wp_die();
}

add_action('wp_ajax_gofly_archive_filter_tours', 'gofly_archive_filter_tours');
add_action('wp_ajax_nopriv_gofly_archive_filter_tours', 'gofly_archive_filter_tours');





/**
 * @since Version: 1.5.5
 * 
 * Filter Experience archive template
 * 
 * */
function gofly_archive_filter_experience()
{
    check_ajax_referer('gofly_nonce', 'security');

    $paged = !empty($_POST['expData']['page_number']) ? intval($_POST['expData']['page_number']) : 1;

    $args = [
        'post_type'      => 'experience',
        'post_status'    => 'publish',
        'posts_per_page' => 8,
        'paged'          => $paged,
    ];

    // Pagination
    if (!empty($_POST['expData']['page_number'])) {
        $args['paged'] = intval($_POST['expData']['page_number']);
    }

    // Experience Category
    if (!empty($_POST['expData']['selectedExpCategory'])) {
        $args['tax_query'][] = [
            'taxonomy' => 'experience-category',
            'field'    => 'slug',
            'terms'    => ($_POST['expData']['selectedExpCategory']),
        ];
    }

    // Experience Type
    if (!empty($_POST['expData']['selectedExpType'])) {
        $args['tax_query'][] = [
            'taxonomy' => 'experience-type',
            'field'    => 'slug',
            'terms'    => ($_POST['expData']['selectedExpType']),
        ];
    }

    // Experience Type
    if (!empty($_POST['expData']['selectedOffer'])) {
        $args['tax_query'][] = [
            'taxonomy' => 'experience-offer',
            'field'    => 'slug',
            'terms'    => ($_POST['expData']['selectedOffer']),
        ];
    }

    // Ensure multiple tax queries work
    if (!empty($args['tax_query'])) {
        $args['tax_query']['relation'] = 'AND';
    }

    // Price Range
    if (! empty($_POST['expData']['minPrice']) && isset($_POST['expData']['maxPrice'])) {
        $min_price = intval($_POST['expData']['minPrice']);
        $max_price = intval($_POST['expData']['maxPrice']);
        $args['meta_query'][] = [
            'key'     => 'exp_min_price',
            'value'   => array($min_price, $max_price),
            'compare' => 'BETWEEN',
            'type'    => 'NUMERIC',
        ];
    }

    // Destinations with continen filter (array)
    if (!empty($_POST['expData']['selectedDestinations'])) {
        $meta_query = ['relation' => 'OR'];
        foreach ($_POST['expData']['selectedDestinations'] as $dest) {
            $meta_query[] = [
                'key'     => 'EGNS_EXPERIENCE_META_ID',
                'value'   => '"' . esc_sql($dest) . '"',
                'compare' => 'LIKE',
            ];
        }
        $args['meta_query'][] = $meta_query;
    }

    // Ensure multiple meta queries work
    if (!empty($args['meta_query'])) {
        $args['meta_query']['relation'] = 'AND';
    }

    // Sorting
    if (!empty($_POST['expData']['sortBy'])) {
        $sort_by = $_POST['expData']['sortBy'];

        switch ($sort_by) {
            case 'latest':
                $args['orderby'] = 'date';
                $args['order']   = 'DESC';
                break;

            case 'price_high':
                $args['meta_key'] = 'exp_min_price';
                $args['orderby']  = 'meta_value_num';
                $args['order']    = 'DESC';
                break;

            case 'price_low':
                $args['meta_key'] = 'exp_min_price';
                $args['orderby']  = 'meta_value_num';
                $args['order']    = 'ASC';
                break;

            default:
                // "default" → keep WP default ordering
                break;
        }
    }

    $query = new WP_Query($args);

    ob_start();

    if ($query->have_posts()) {
        while ($query->have_posts()) {
            $query->the_post();

            $gallery_opt = Egns_Helper::egns_get_exp_value('experience_featured_image_gallery');
            $gallery_ids = explode(',', $gallery_opt);
            $exp_types = get_the_terms(get_the_ID(), 'experience-type');
        ?>
            <div class="col-md-6 item">
                <div class="package-card">
                    <div class="package-img-wrap">
                        <?php if (!empty($gallery_opt)) : ?>
                            <div class="swiper package-card-img-slider">
                                <div class="swiper-wrapper">
                                    <?php if (has_post_thumbnail()) : ?>
                                        <div class="swiper-slide">
                                            <a href="<?php the_permalink() ?>" class="package-img">
                                                <?php the_post_thumbnail('card-thumb') ?>
                                            </a>
                                        </div>
                                    <?php endif; ?>
                                    <?php
                                    if (! empty($gallery_ids)) :
                                        foreach ($gallery_ids as $gallery_item_id) :
                                    ?>
                                            <div class="swiper-slide">
                                                <a href="<?php the_permalink() ?>" class="package-img">
                                                    <?php
                                                    echo wp_get_attachment_image($gallery_item_id, 'card-thumb', false, ['alt'   => esc_attr__('image', 'gofly'), 'class' => 'my-custom-class',]);
                                                    ?>
                                                </a>
                                            </div>
                                    <?php
                                        endforeach;
                                    endif;
                                    ?>
                                </div>
                            </div>
                            <div class="slider-pagi-wrap">
                                <div class="package-card-img-pagi paginations"></div>
                            </div>
                        <?php else: ?>
                            <a href="<?php the_permalink() ?>" class="package-img">
                                <?php the_post_thumbnail('card-thumb') ?>
                            </a>
                        <?php endif; ?>
                        <div class="batch">
                            <?php if (Egns_Helper::exp_has_sale_price(get_the_ID())): ?>
                                <span><?php echo esc_html__('Sale on!', 'gofly') ?></span>
                            <?php endif; ?>
                            <?php if (!empty($exp_types) && !is_wp_error($exp_types)) : ?>
                                <span class="yellow-bg"><?php echo esc_html($exp_types[0]->name) ?></span>
                            <?php endif; ?>
                        </div>
                    </div>
                    <div class="package-content">
                        <h5><a href="<?php the_permalink() ?>"><?php the_title() ?></a></h5>
                        <div class="location-and-time">
                            <?php
                            $locations = Egns_Helper::egns_get_exp_value('experience_destination_select');

                            if (!empty($locations)) :
                            ?>
                                <div class="location">
                                    <svg width="14" height="14" viewBox="0 0 14 14" xmlns="http://www.w3.org/2000/svg">
                                        <path
                                            d="M6.83615 0C3.77766 0 1.28891 2.48879 1.28891 5.54892C1.28891 7.93837 4.6241 11.8351 6.05811 13.3994C6.25669 13.6175 6.54154 13.7411 6.83615 13.7411C7.13076 13.7411 7.41561 13.6175 7.6142 13.3994C9.04821 11.8351 12.3834 7.93833 12.3834 5.54892C12.3834 2.48879 9.89464 0 6.83615 0ZM7.31469 13.1243C7.18936 13.2594 7.02008 13.3342 6.83615 13.3342C6.65222 13.3342 6.48295 13.2594 6.35761 13.1243C4.95614 11.5959 1.69584 7.79515 1.69584 5.54896C1.69584 2.7134 4.00067 0.406933 6.83615 0.406933C9.67164 0.406933 11.9765 2.7134 11.9765 5.54896C11.9765 7.79515 8.71617 11.5959 7.31469 13.1243Z" />
                                        <path
                                            d="M6.83618 8.54554C8.4624 8.54554 9.7807 7.22723 9.7807 5.60102C9.7807 3.9748 8.4624 2.65649 6.83618 2.65649C5.20997 2.65649 3.89166 3.9748 3.89166 5.60102C3.89166 7.22723 5.20997 8.54554 6.83618 8.54554Z" />
                                    </svg>
                                    <?php
                                    $location_links = [];
                                    foreach ($locations as $post_id) {
                                        $destination = get_post($post_id);
                                        if ($destination) {
                                            $link = get_permalink($post_id);
                                            $location_links[] = '<a href="' . esc_url($link) . '">' . esc_html($destination->post_title) . '</a>';
                                        }
                                    }
                                    echo implode(', ', $location_links);
                                    ?>
                                </div>
                            <?php endif; ?>
                            <?php
                            $day = Egns_Helper::egns_get_exp_value('experience_duration_hour');
                            if (!empty($day)) :
                            ?>
                                <svg class="arrow" width="25" height="6" viewBox="0 0 25 6" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M0 3L5 5.88675V0.113249L0 3ZM25 3L20 0.113249V5.88675L25 3ZM4.5 3.5H20.5V2.5H4.5V3.5Z" />
                                </svg>
                                <span><?php echo esc_html($day) ?></span>
                            <?php endif; ?>
                        </div>
                        <?php if (!empty(Egns_Helper::egns_get_exp_value('experience_pack_info_list'))) : ?>
                            <ul class="package-info">
                                <?php
                                $pkg_list = Egns_Helper::egns_get_exp_value('experience_pack_info_list');
                                $data = explode("\n", $pkg_list);
                                foreach ($data as $value) :
                                ?>
                                    <li>
                                        <svg width="14" height="14" viewBox="0 0 14 14" xmlns="http://www.w3.org/2000/svg">
                                            <rect width="14" height="14" rx="7" />
                                            <path
                                                d="M10.6947 5.45777L6.24644 9.90841C6.17556 9.97689 6.08572 10.0124 5.99596 10.0124C5.9494 10.0125 5.90328 10.0033 5.86027 9.98548C5.81727 9.96763 5.77822 9.94144 5.7454 9.90841L3.3038 7.46681C3.16436 7.32969 3.16436 7.10521 3.3038 6.96577L4.16652 6.10065C4.29892 5.96833 4.53524 5.96833 4.66764 6.10065L5.99596 7.42897L9.33092 4.09161C9.36377 4.05868 9.40278 4.03255 9.44573 4.01471C9.48868 3.99686 9.53473 3.98766 9.58124 3.98761C9.67572 3.98761 9.76556 4.02545 9.83172 4.09161L10.6944 4.95681C10.8341 5.09625 10.8341 5.32073 10.6947 5.45777Z" />
                                        </svg>
                                        <?php echo esc_html($value) ?>
                                    </li>
                                <?php endforeach; ?>
                            </ul>
                        <?php endif; ?>
                        <div class="btn-and-price-area">
                            <a href="<?php the_permalink() ?>" class="primary-btn1">
                                <span>
                                    <?php echo esc_html__('Book Now', 'gofly') ?>
                                    <svg width="10" height="10" viewBox="0 0 10 10" xmlns="http://www.w3.org/2000/svg">
                                        <path
                                            d="M9.73535 1.14746C9.57033 1.97255 9.32924 3.26406 9.24902 4.66797C9.16817 6.08312 9.25559 7.5453 9.70214 8.73633C9.84754 9.12406 9.65129 9.55659 9.26367 9.70215C8.9001 9.83849 8.4969 9.67455 8.32812 9.33398L8.29785 9.26367L8.19921 8.98438C7.73487 7.5758 7.67054 5.98959 7.75097 4.58203C7.77875 4.09598 7.82525 3.62422 7.87988 3.17969L1.53027 9.53027C1.23738 9.82317 0.762615 9.82317 0.469722 9.53027C0.176829 9.23738 0.176829 8.76262 0.469722 8.46973L6.83593 2.10254C6.3319 2.16472 5.79596 2.21841 5.25 2.24902C3.8302 2.32862 2.2474 2.26906 0.958003 1.79102L0.704097 1.68945L0.635738 1.65527C0.303274 1.47099 0.157578 1.06102 0.310542 0.704102C0.463655 0.347333 0.860941 0.170391 1.22363 0.28418L1.29589 0.310547L1.48828 0.387695C2.47399 0.751207 3.79966 0.827571 5.16601 0.750977C6.60111 0.670504 7.97842 0.428235 8.86132 0.262695L9.95312 0.0585938L9.73535 1.14746Z" />
                                    </svg>
                                </span>
                                <span>
                                    <?php echo esc_html__('Book Now', 'gofly') ?>
                                    <svg width="10" height="10" viewBox="0 0 10 10" xmlns="http://www.w3.org/2000/svg">
                                        <path
                                            d="M9.73535 1.14746C9.57033 1.97255 9.32924 3.26406 9.24902 4.66797C9.16817 6.08312 9.25559 7.5453 9.70214 8.73633C9.84754 9.12406 9.65129 9.55659 9.26367 9.70215C8.9001 9.83849 8.4969 9.67455 8.32812 9.33398L8.29785 9.26367L8.19921 8.98438C7.73487 7.5758 7.67054 5.98959 7.75097 4.58203C7.77875 4.09598 7.82525 3.62422 7.87988 3.17969L1.53027 9.53027C1.23738 9.82317 0.762615 9.82317 0.469722 9.53027C0.176829 9.23738 0.176829 8.76262 0.469722 8.46973L6.83593 2.10254C6.3319 2.16472 5.79596 2.21841 5.25 2.24902C3.8302 2.32862 2.2474 2.26906 0.958003 1.79102L0.704097 1.68945L0.635738 1.65527C0.303274 1.47099 0.157578 1.06102 0.310542 0.704102C0.463655 0.347333 0.860941 0.170391 1.22363 0.28418L1.29589 0.310547L1.48828 0.387695C2.47399 0.751207 3.79966 0.827571 5.16601 0.750977C6.60111 0.670504 7.97842 0.428235 8.86132 0.262695L9.95312 0.0585938L9.73535 1.14746Z" />
                                    </svg>
                                </span>
                            </a>
                            <?php echo Egns_Helper::exp_global_starting_price(get_the_ID()) ?>
                        </div>
                        <svg class="divider" height="6" viewBox="0 0 374 6" xmlns="http://www.w3.org/2000/svg">
                            <path d="M5 2.5L0 0.113249V5.88675L5 3.5V2.5ZM369 3.5L374 5.88675V0.113249L369 2.5V3.5ZM4.5 3.5H369.5V2.5H4.5V3.5Z" />
                        </svg>
                        <div class="bottom-area">
                            <ul>
                                <li>
                                    <svg width="16" height="16" viewBox="0 0 16 16" xmlns="http://www.w3.org/2000/svg">
                                        <path
                                            d="M9.2732 12.9807H6.7268C6.68429 12.9807 6.64298 12.9666 6.60935 12.9406C6.55906 12.9018 5.36398 11.9718 4.14989 10.4857C3.43499 9.61078 2.86499 8.72565 2.45543 7.8549C1.93974 6.75846 1.67834 5.68141 1.67834 4.65329C1.67834 3.50657 2.36043 2.33394 3.54995 1.43595C4.1378 0.992226 4.81163 0.641781 5.55321 0.394396C6.33797 0.132617 7.16112 0 8 0C8.83888 0 9.66203 0.132617 10.4466 0.394396C11.1882 0.641781 11.862 0.992035 12.4499 1.43595C13.6392 2.33394 14.3215 3.50676 14.3215 4.65329C14.3215 5.63247 14.0599 6.67939 13.544 7.7647C13.1348 8.62565 12.5652 9.51367 11.8511 10.4036C10.6383 11.9148 9.40697 12.9272 9.39468 12.9371C9.36046 12.9653 9.31752 12.9807 9.2732 12.9807ZM6.79378 12.5969H9.20334C9.4465 12.3905 10.5082 11.4651 11.5563 10.1576C12.6425 8.8026 13.9374 6.74772 13.9374 4.65329C13.9374 2.63794 11.3981 0.38384 7.99981 0.38384C4.60148 0.38384 2.06238 2.63794 2.06238 4.65329C2.06238 6.85769 3.3563 8.90624 4.44199 10.2364C5.49084 11.5215 6.55311 12.4032 6.79378 12.5969Z" />
                                        <path
                                            d="M7.51886 12.7888C7.51886 12.7888 5.68372 9.03538 5.68372 4.65327C5.68372 2.43045 6.72066 0.191895 8 0.191895C9.27934 0.191895 10.3163 2.43045 10.3163 4.65327C10.3163 8.82024 8.48114 12.7888 8.48114 12.7888" />
                                        <path
                                            d="M7.34653 12.873C7.32753 12.8343 6.87594 11.9042 6.41802 10.4209C5.9956 9.05229 5.492 6.94079 5.492 4.65329C5.492 3.53843 5.74668 2.39036 6.19079 1.50312C6.67577 0.533921 7.31832 0 8.00002 0C8.68172 0 9.32426 0.53373 9.80944 1.50312C10.2535 2.39036 10.5082 3.53843 10.5082 4.65329C10.5082 6.82928 10.0048 8.94655 9.5824 10.3393C9.12505 11.8478 8.67423 12.8283 8.65542 12.8692L8.30709 12.7082C8.31169 12.6984 8.7675 11.7058 9.21717 10.2213C9.63114 8.85481 10.1246 6.77977 10.1246 4.65329C10.1246 3.5962 9.88467 2.51051 9.46648 1.67489C9.05577 0.854428 8.52146 0.38384 8.00021 0.38384C7.47895 0.38384 6.94465 0.854428 6.53394 1.67489C6.11574 2.51051 5.87584 3.5962 5.87584 4.65329C5.87584 6.893 6.37023 8.96439 6.78497 10.3076C7.23406 11.7626 7.68699 12.6951 7.6916 12.7043L7.34653 12.873ZM8.77038 16H7.22965C6.84658 16 6.5349 15.6883 6.5349 15.3052V13.9892C6.5349 13.8833 6.62088 13.7973 6.72682 13.7973H9.27321C9.37915 13.7973 9.46513 13.8833 9.46513 13.9892V15.3052C9.46513 15.6883 9.15346 16 8.77038 16ZM6.91874 14.1812V15.3052C6.91874 15.4766 7.05826 15.6162 7.22965 15.6162H8.77038C8.94177 15.6162 9.08129 15.4766 9.08129 15.3052V14.1812H6.91874Z" />
                                        <path
                                            d="M8.90952 14.1812H7.0907C7.00606 14.1812 6.93159 14.126 6.90703 14.045L6.54334 12.8445C6.52568 12.7863 6.53662 12.7232 6.5729 12.6745C6.60917 12.6257 6.66636 12.5969 6.72701 12.5969H9.2734C9.33424 12.5969 9.39143 12.6257 9.42751 12.6745C9.4454 12.6985 9.45739 12.7264 9.46252 12.756C9.46765 12.7855 9.46579 12.8158 9.45707 12.8445L9.09338 14.045C9.06862 14.1258 8.99397 14.1812 8.90952 14.1812ZM7.23291 13.7974H8.76693L9.01431 12.9808H6.98552L7.23291 13.7974Z" />
                                    </svg>
                                    <?php echo esc_html__('Experience', 'gofly') ?>
                                    <div class="info">
                                        <svg width="12" height="12" viewBox="0 0 12 12" xmlns="http://www.w3.org/2000/svg">
                                            <g>
                                                <path
                                                    d="M6 0.375C4.88748 0.375 3.79995 0.704901 2.87492 1.32298C1.94989 1.94107 1.22892 2.81957 0.80318 3.84741C0.377437 4.87524 0.266043 6.00624 0.483085 7.09738C0.700127 8.18853 1.23586 9.19081 2.02253 9.97748C2.8092 10.7641 3.81148 11.2999 4.90262 11.5169C5.99376 11.734 7.12476 11.6226 8.1526 11.1968C9.18043 10.7711 10.0589 10.0501 10.677 9.12508C11.2951 8.20006 11.625 7.11252 11.625 6C11.6245 4.50831 11.0317 3.07786 9.97693 2.02307C8.92215 0.968289 7.49169 0.375497 6 0.375ZM6 9.375C5.85167 9.375 5.70666 9.33101 5.58333 9.2486C5.45999 9.16619 5.36386 9.04906 5.30709 8.91201C5.25033 8.77497 5.23548 8.62417 5.26441 8.47868C5.29335 8.3332 5.36478 8.19956 5.46967 8.09467C5.57456 7.98978 5.7082 7.91835 5.85369 7.88941C5.99917 7.86047 6.14997 7.87533 6.28702 7.93209C6.42406 7.98886 6.54119 8.08499 6.62361 8.20832C6.70602 8.33166 6.75 8.47666 6.75 8.625C6.74941 8.82373 6.6702 9.01415 6.52968 9.15468C6.38915 9.2952 6.19873 9.37441 6 9.375ZM6.85875 3.55875L6.6075 6.56625C6.5944 6.71834 6.52472 6.85999 6.41224 6.9632C6.29976 7.0664 6.15266 7.12367 6 7.12367C5.84735 7.12367 5.70024 7.0664 5.58776 6.9632C5.47528 6.85999 5.40561 6.71834 5.3925 6.56625L5.14125 3.55875C5.13042 3.44226 5.1434 3.32478 5.1794 3.21346C5.2154 3.10214 5.27367 2.99931 5.35067 2.91123C5.42767 2.82314 5.52178 2.75165 5.62729 2.70108C5.73279 2.65052 5.84748 2.62195 5.96437 2.61711C6.08127 2.61227 6.19793 2.63126 6.30725 2.67294C6.41657 2.71461 6.51627 2.77808 6.60029 2.8595C6.6843 2.94092 6.75087 3.03858 6.79595 3.14655C6.84103 3.25451 6.86367 3.37051 6.8625 3.4875C6.86313 3.51131 6.86187 3.53514 6.85875 3.55875Z" />
                                            </g>
                                        </svg>
                                        <div class="tooltip-text"><?php echo wp_kses_post(Egns_Helper::egns_get_exp_value('experience_tooltip_content')) ?></div>
                                    </div>
                                </li>
                                <li>
                                    <svg width="16" height="16" viewBox="0 0 16 16" xmlns="http://www.w3.org/2000/svg">
                                        <g>
                                            <path
                                                d="M8 0C3.58853 0 0 3.58853 0 8C0 12.4115 3.58853 16 8 16C12.4115 16 16 12.4108 16 8C16 3.58916 12.4115 0 8 0ZM8 14.7607C4.27266 14.7607 1.23934 11.728 1.23934 8C1.23934 4.27203 4.27266 1.23934 8 1.23934C11.7273 1.23934 14.7607 4.27203 14.7607 8C14.7607 11.728 11.728 14.7607 8 14.7607Z" />
                                            <path
                                                d="M11.0984 7.32445H8.6197V4.84576C8.6197 4.5037 8.3427 4.22607 8.00001 4.22607C7.65733 4.22607 7.38033 4.5037 7.38033 4.84576V7.32445H4.90164C4.55895 7.32445 4.28195 7.60207 4.28195 7.94414C4.28195 8.2862 4.55895 8.56382 4.90164 8.56382H7.38033V11.0425C7.38033 11.3846 7.65733 11.6622 8.00001 11.6622C8.3427 11.6622 8.6197 11.3846 8.6197 11.0425V8.56382H11.0984C11.4411 8.56382 11.7181 8.2862 11.7181 7.94414C11.7181 7.60207 11.4411 7.32445 11.0984 7.32445Z" />
                                        </g>
                                    </svg>
                                    <?php echo esc_html__('Inclusion', 'gofly') ?>
                                    <div class="info">
                                        <svg width="12" height="12" viewBox="0 0 12 12" xmlns="http://www.w3.org/2000/svg">
                                            <g>
                                                <path
                                                    d="M6 0.375C4.88748 0.375 3.79995 0.704901 2.87492 1.32298C1.94989 1.94107 1.22892 2.81957 0.80318 3.84741C0.377437 4.87524 0.266043 6.00624 0.483085 7.09738C0.700127 8.18853 1.23586 9.19081 2.02253 9.97748C2.8092 10.7641 3.81148 11.2999 4.90262 11.5169C5.99376 11.734 7.12476 11.6226 8.1526 11.1968C9.18043 10.7711 10.0589 10.0501 10.677 9.12508C11.2951 8.20006 11.625 7.11252 11.625 6C11.6245 4.50831 11.0317 3.07786 9.97693 2.02307C8.92215 0.968289 7.49169 0.375497 6 0.375ZM6 9.375C5.85167 9.375 5.70666 9.33101 5.58333 9.2486C5.45999 9.16619 5.36386 9.04906 5.30709 8.91201C5.25033 8.77497 5.23548 8.62417 5.26441 8.47868C5.29335 8.3332 5.36478 8.19956 5.46967 8.09467C5.57456 7.98978 5.7082 7.91835 5.85369 7.88941C5.99917 7.86047 6.14997 7.87533 6.28702 7.93209C6.42406 7.98886 6.54119 8.08499 6.62361 8.20832C6.70602 8.33166 6.75 8.47666 6.75 8.625C6.74941 8.82373 6.6702 9.01415 6.52968 9.15468C6.38915 9.2952 6.19873 9.37441 6 9.375ZM6.85875 3.55875L6.6075 6.56625C6.5944 6.71834 6.52472 6.85999 6.41224 6.9632C6.29976 7.0664 6.15266 7.12367 6 7.12367C5.84735 7.12367 5.70024 7.0664 5.58776 6.9632C5.47528 6.85999 5.40561 6.71834 5.3925 6.56625L5.14125 3.55875C5.13042 3.44226 5.1434 3.32478 5.1794 3.21346C5.2154 3.10214 5.27367 2.99931 5.35067 2.91123C5.42767 2.82314 5.52178 2.75165 5.62729 2.70108C5.73279 2.65052 5.84748 2.62195 5.96437 2.61711C6.08127 2.61227 6.19793 2.63126 6.30725 2.67294C6.41657 2.71461 6.51627 2.77808 6.60029 2.8595C6.6843 2.94092 6.75087 3.03858 6.79595 3.14655C6.84103 3.25451 6.86367 3.37051 6.8625 3.4875C6.86313 3.51131 6.86187 3.53514 6.85875 3.55875Z" />
                                            </g>
                                        </svg>
                                        <div class="tooltip-text"><?php echo wp_kses_post(Egns_Helper::egns_get_exp_value('inclusion_tooltip_content')) ?></div>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>

        <?php
        }
        wp_reset_postdata();
    } else {
        // Include global posts not found
        Egns\Helper\Egns_Helper::egns_template_part('content', 'templates/posts-not-found');
    }


    $html = ob_get_clean();

    // === Pagination HTML === //
    ob_start();

    $total_pages = $query->max_num_pages;
    if ($total_pages > 1) {
        $current_page = max(1, $paged);

        // Manually build pagination base URL using current request
        global $wp;
        $base_url = home_url(add_query_arg([], $wp->request));
        $base_url = trailingslashit($base_url);

        $big = 999999999;
        $links = paginate_links([
            'base'      => $base_url . '%_%',
            'format'    => 'page/%#%/',
            'current'   => $current_page,
            'total'     => $total_pages,
            'type'      => 'list',
            'end_size'  => 1,
            'mid_size'  => 1,
            'prev_next' => false,
        ]);

        // === Your theme’s formatting replacements === //
        $links = str_replace("<ul class='page-numbers'>", "<ul class='paginations'>", $links);
        $links = str_replace("<li>", "<li class='page-item'>", $links);
        $links = str_replace("page-numbers", "", $links);
        $links = str_replace("&laquo; Previous</a>", '&laquo;</a>', $links);
        $links = str_replace("Next &raquo;</a>", "&raquo;</a>", $links);
        $links = str_replace("next aria-label='Next'", "page-link", $links);
        $links = str_replace("prev aria-hidden='true'", "sr-only page-link", $links);
        $links = str_replace("<li><span", " <li class='page-item active'><a", $links);
        $links = str_replace('span', 'a', $links);
        $links = preg_replace('/>([0-9])</', '>0$1<', $links);

        // Build next and previous URLs manually to avoid “page 0” issue
        $prev_link = ($current_page > 1) ? $base_url . 'page/' . ($current_page - 1) . '/' : '#';
        $next_link = ($current_page < $total_pages) ? $base_url . 'page/' . ($current_page + 1) . '/' : '#';
        ?>
        <div id="hide-ax">
            <div class="pagination-area exp wow animate fadeInUp mt-60" data-wow-delay="200ms" data-wow-duration="1500ms">
                <?php if ($current_page > 1): ?>
                    <div class="paginations-button">
                        <a href="<?php echo esc_url($prev_link); ?>">
                            <svg width="10" height="10" viewBox="0 0 10 10" xmlns="http://www.w3.org/2000/svg">
                                <g>
                                    <path
                                        d="M7.86133 9.28516C7.14704 7.49944 3.57561 5.71373 1.43276 4.99944C3.57561 4.28516 6.7899 3.21373 7.86133 0.713728"
                                        stroke-width="1.5" stroke-linecap="round" />
                                </g>
                            </svg>
                            <?php echo esc_html__('Prev', 'gofly'); ?>
                        </a>
                    </div>
                <?php endif; ?>

                <?php echo sprintf('%s', $links); ?>

                <?php if ($current_page < $total_pages): ?>
                    <div class="paginations-button">
                        <a href="<?php echo esc_url($next_link); ?>">
                            <?php echo esc_html__('Next', 'gofly'); ?>
                            <svg width="10" height="10" viewBox="0 0 10 10" xmlns="http://www.w3.org/2000/svg">
                                <g>
                                    <path
                                        d="M1.42969 9.28613C2.14397 7.50042 5.7154 5.7147 7.85826 5.00042C5.7154 4.28613 2.50112 3.21471 1.42969 0.714705"
                                        stroke-width="1.5" stroke-linecap="round" />
                                </g>
                            </svg>
                        </a>
                    </div>
                <?php endif; ?>
            </div>
        </div>
        <?php
    }

    $pagination_html = ob_get_clean();


    wp_send_json([
        'html'       => $html,
        'pagination' => $pagination_html,
    ]);

    wp_die();
}

add_action('wp_ajax_gofly_archive_filter_experience', 'gofly_archive_filter_experience');
add_action('wp_ajax_nopriv_gofly_archive_filter_experience', 'gofly_archive_filter_experience');




/**
 * @since Version: 1.5.5
 * 
 * Filter Hotel archive template
 * 
 * */
function gofly_archive_filter_hotel()
{
    check_ajax_referer('gofly_nonce', 'security');

    $paged = !empty($_POST['hotelData']['page_number']) ? intval($_POST['hotelData']['page_number']) : 1;

    $args = [
        'post_type'      => 'hotel',
        'post_status'    => 'publish',
        'posts_per_page' => 6,
        'paged'          => $paged,
    ];

    // Pagination
    if (!empty($_POST['hotelData']['page_number'])) {
        $args['paged'] = intval($_POST['hotelData']['page_number']);
    }

    // Hotel Category
    if (!empty($_POST['hotelData']['selectedHotelCategory'])) {
        $args['tax_query'][] = [
            'taxonomy' => 'hotel-category',
            'field'    => 'slug',
            'terms'    => ($_POST['hotelData']['selectedHotelCategory']),
        ];
    }

    // Hotel Tag
    if (!empty($_POST['hotelData']['selectedHotelTag'])) {
        $args['tax_query'][] = [
            'taxonomy' => 'hotel-tag',
            'field'    => 'slug',
            'terms'    => ($_POST['hotelData']['selectedHotelTag']),
        ];
    }

    // Hotel Offer
    if (!empty($_POST['hotelData']['selectedHotelOffer'])) {
        $args['tax_query'][] = [
            'taxonomy' => 'hotel-offer-criterias',
            'field'    => 'slug',
            'terms'    => ($_POST['hotelData']['selectedHotelOffer']),
        ];
    }

    // Hotel Amenity
    if (!empty($_POST['hotelData']['selectedHotelAmenity'])) {
        $args['tax_query'][] = [
            'taxonomy' => 'hotel-amenity',
            'field'    => 'slug',
            'terms'    => ($_POST['hotelData']['selectedHotelAmenity']),
        ];
    }

    // Ensure multiple tax queries work
    if (!empty($args['tax_query'])) {
        $args['tax_query']['relation'] = 'AND';
    }

    // Price Range
    if (! empty($_POST['hotelData']['minPrice']) && isset($_POST['hotelData']['maxPrice'])) {
        $min_price = intval($_POST['hotelData']['minPrice']);
        $max_price = intval($_POST['hotelData']['maxPrice']);
        $args['meta_query'][] = [
            'key'     => 'htl_min_price',
            'value'   => array($min_price, $max_price),
            'compare' => 'BETWEEN',
            'type'    => 'NUMERIC',
        ];
    }

    // Ensure multiple meta queries work
    if (!empty($args['meta_query'])) {
        $args['meta_query']['relation'] = 'AND';
    }

    // Sorting
    if (!empty($_POST['hotelData']['sortBy'])) {
        $sort_by = $_POST['hotelData']['sortBy'];

        switch ($sort_by) {
            case 'latest':
                $args['orderby'] = 'date';
                $args['order']   = 'DESC';
                break;

            case 'price_high':
                $args['meta_key'] = 'htl_min_price';
                $args['orderby']  = 'meta_value_num';
                $args['order']    = 'DESC';
                break;

            case 'price_low':
                $args['meta_key'] = 'htl_min_price';
                $args['orderby']  = 'meta_value_num';
                $args['order']    = 'ASC';
                break;

            default:
                // "default" → keep WP default ordering
                break;
        }
    }

    $query = new WP_Query($args);

    ob_start();

    if ($query->have_posts()) {
        while ($query->have_posts()) {
            $query->the_post();

            $is_featured    = get_post_meta(get_the_ID(), '_is_featured', true);
            $hotel_location = get_the_terms(get_the_ID(), 'hotel-location');
        ?>
            <div class="col-md-6 item">
                <div class="hotel-card">
                    <?php if (has_post_thumbnail()) : ?>
                        <div class="hotel-img-wrap">
                            <a href="<?php the_permalink() ?>" class="hotel-img">
                                <?php the_post_thumbnail() ?>
                            </a>
                            <div class="batch">
                                <?php if (Egns_Helper::hotel_has_sale_price(get_the_ID())): ?>
                                    <span><?php echo esc_html__('Sale on!', 'gofly') ?></span>
                                <?php endif; ?>
                                <?php if ($is_featured == 1) : ?>
                                    <span class="yellow-bg"><?php echo esc_html__('Featured', 'gofly') ?></span>
                                <?php endif; ?>
                            </div>
                        </div>
                    <?php endif; ?>
                    <div class="hotel-content">
                        <?php if (class_exists('Post_Rating_Shortcode')) : ?>
                            <div class="rating-area">
                                <?php echo do_shortcode('[post_rating_count]'); ?>
                            </div>
                        <?php endif; ?>
                        <h5><a href="<?php the_permalink() ?>"><?php the_title() ?></a></h5>
                        <div class="location-area">
                            <?php if (!empty($hotel_location)) : ?>
                                <div class="location">
                                    <svg width="14" height="14" viewBox="0 0 14 14" xmlns="http://www.w3.org/2000/svg">
                                        <path
                                            d="M6.83615 0C3.77766 0 1.28891 2.48879 1.28891 5.54892C1.28891 7.93837 4.6241 11.8351 6.05811 13.3994C6.25669 13.6175 6.54154 13.7411 6.83615 13.7411C7.13076 13.7411 7.41561 13.6175 7.6142 13.3994C9.04821 11.8351 12.3834 7.93833 12.3834 5.54892C12.3834 2.48879 9.89464 0 6.83615 0ZM7.31469 13.1243C7.18936 13.2594 7.02008 13.3342 6.83615 13.3342C6.65222 13.3342 6.48295 13.2594 6.35761 13.1243C4.95614 11.5959 1.69584 7.79515 1.69584 5.54896C1.69584 2.7134 4.00067 0.406933 6.83615 0.406933C9.67164 0.406933 11.9765 2.7134 11.9765 5.54896C11.9765 7.79515 8.71617 11.5959 7.31469 13.1243Z" />
                                        <path
                                            d="M6.83618 8.54554C8.4624 8.54554 9.7807 7.22723 9.7807 5.60102C9.7807 3.9748 8.4624 2.65649 6.83618 2.65649C5.20997 2.65649 3.89166 3.9748 3.89166 5.60102C3.89166 7.22723 5.20997 8.54554 6.83618 8.54554Z" />
                                    </svg>
                                    <a href="<?php echo get_term_link($hotel_location[0]->term_id) ?>"><?php echo esc_html($hotel_location[0]->name) ?></a>
                                </div>
                            <?php endif ?>
                            <?php if (!empty(Egns_Helper::egns_get_hotel_value('hotel_location_link_with_lbl', 'text'))) : ?>
                                <a href=" <?php echo esc_url(Egns_Helper::egns_get_hotel_value('hotel_location_link_with_lbl', 'url')) ?>" class="map-view" target=" <?php echo esc_attr(Egns_Helper::egns_get_hotel_value('hotel_location_link_with_lbl', 'target')) ?>">
                                    <?php echo esc_html(Egns_Helper::egns_get_hotel_value('hotel_location_link_with_lbl', 'text')) ?>
                                    <svg width="9" height="9" viewBox="0 0 9 9" xmlns="http://www.w3.org/2000/svg">
                                        <path
                                            d="M4.22358 9H1.52534C1.07358 9 0.690381 8.85586 0.41792 8.5834C0.145459 8.31093 0.00131836 7.92597 0.00131836 7.47246C-0.000439453 5.51777 -0.000439453 3.75293 0.00131836 2.07597C0.00131836 1.62422 0.147217 1.24101 0.421436 0.970309C0.695654 0.699606 1.07886 0.555466 1.53237 0.555466H3.32534C3.54507 0.555466 3.72437 0.620505 3.84565 0.743552C3.95464 0.852536 4.01089 1.00371 4.00913 1.17949C4.00562 1.55215 3.74194 1.79121 3.33413 1.79297H1.5394C1.29331 1.79297 1.2353 1.85097 1.2353 2.10058V7.4584C1.2353 7.70625 1.29331 7.7625 1.54116 7.7625H6.89897C7.14683 7.7625 7.20483 7.70625 7.20483 7.45664V5.66367C7.20483 5.25586 7.44741 4.99043 7.82007 4.98867H7.82358C8.198 4.98867 8.44058 5.25058 8.44058 5.65664V5.82539C8.44233 6.37558 8.44233 6.94511 8.44058 7.5041C8.43882 7.93828 8.29292 8.31093 8.0187 8.58164C7.74448 8.85234 7.37183 8.99648 6.93589 8.99824H4.22358V9Z" />
                                        <path
                                            d="M3.89929 5.67422C3.69011 5.67422 3.48444 5.53535 3.38776 5.32969C3.26823 5.0748 3.31921 4.79883 3.52487 4.58965C3.78151 4.32949 4.04519 4.06758 4.30007 3.81445L4.57077 3.54551L5.4444 2.67715C5.91374 2.21133 6.38132 1.74551 6.8489 1.27793C6.85769 1.26914 6.86647 1.26035 6.87526 1.2498C6.5905 1.24453 5.97351 1.24102 5.63073 1.23926C5.43561 1.23926 5.27038 1.17598 5.15436 1.05645C5.04362 0.943945 4.98561 0.789258 4.98737 0.611719C4.99089 0.247852 5.24929 0.00351562 5.62897 0.00175781C6.09655 0 6.56061 0 7.02644 0C7.49929 0 7.93698 0 8.36589 0.00175781C8.74733 0.00175781 8.99519 0.246094 8.99694 0.622266C9.00046 1.5627 9.00046 2.49434 8.99694 3.39434C8.99519 3.75644 8.74206 4.01133 8.38171 4.01133C8.02136 4.01133 7.76823 3.7582 7.76472 3.39785C7.76296 3.21328 7.7612 2.92676 7.75944 2.64902C7.75769 2.44512 7.75769 2.25 7.75593 2.11992C7.74186 2.13223 7.72956 2.14453 7.71726 2.15684C7.44655 2.4293 7.17585 2.7 6.90515 2.97246C6.1071 3.77402 5.28269 4.60371 4.46706 5.41406C4.3405 5.53711 4.18229 5.62324 4.01179 5.66367C3.97312 5.6707 3.9362 5.67422 3.89929 5.67422Z" />
                                    </svg>
                                </a>
                            <?php endif ?>
                        </div>
                        <ul class="hotel-feature-list">
                            <?php
                            $feature_lists = Egns_Helper::egns_get_hotel_value('hotel_card_highlights_features');
                            $lists = explode("\n", $feature_lists);
                            foreach ((array) $lists as $list) {
                            ?>
                                <li>
                                    <svg width="14" height="14" viewBox="0 0 14 14" xmlns="http://www.w3.org/2000/svg">
                                        <rect x="0.5" y="0.5" width="13" height="13" rx="6.5" />
                                        <path
                                            d="M10.6947 5.45777L6.24644 9.90841C6.17556 9.97689 6.08572 10.0124 5.99596 10.0124C5.9494 10.0125 5.90328 10.0033 5.86027 9.98548C5.81727 9.96763 5.77822 9.94144 5.7454 9.90841L3.3038 7.46681C3.16436 7.32969 3.16436 7.10521 3.3038 6.96577L4.16652 6.10065C4.29892 5.96833 4.53524 5.96833 4.66764 6.10065L5.99596 7.42897L9.33092 4.09161C9.36377 4.05868 9.40278 4.03255 9.44573 4.01471C9.48868 3.99686 9.53473 3.98766 9.58124 3.98761C9.67572 3.98761 9.76556 4.02545 9.83172 4.09161L10.6944 4.95681C10.8341 5.09625 10.8341 5.32073 10.6947 5.45777Z" />
                                    </svg>
                                    <?php echo esc_html($list) ?>
                                </li>
                            <?php } ?>
                        </ul>
                        <div class="cancellation">
                            <svg width="14" height="14" viewBox="0 0 14 14" xmlns="http://www.w3.org/2000/svg">
                                <rect width="14" height="14" rx="7" />
                                <path
                                    d="M10.6947 5.45777L6.24644 9.90841C6.17556 9.97689 6.08572 10.0124 5.99596 10.0124C5.9494 10.0125 5.90328 10.0033 5.86027 9.98548C5.81727 9.96763 5.77822 9.94144 5.7454 9.90841L3.3038 7.46681C3.16436 7.32969 3.16436 7.10521 3.3038 6.96577L4.16652 6.10065C4.29892 5.96833 4.53524 5.96833 4.66764 6.10065L5.99596 7.42897L9.33092 4.09161C9.36377 4.05868 9.40278 4.03255 9.44573 4.01471C9.48868 3.99686 9.53473 3.98766 9.58124 3.98761C9.67572 3.98761 9.76556 4.02545 9.83172 4.09161L10.6944 4.95681C10.8341 5.09625 10.8341 5.32073 10.6947 5.45777Z" />
                            </svg>
                            <span><?php echo esc_html(Egns_Helper::egns_get_hotel_value('hotel_cancellation_label')) ?></span>
                        </div>
                        <div class="btn-and-price-area">
                            <a href="<?php the_permalink() ?>" class="primary-btn1">
                                <span>
                                    <?php echo esc_html__('Book Now', 'gofly') ?>
                                    <svg width="10" height="10" viewBox="0 0 10 10" xmlns="http://www.w3.org/2000/svg">
                                        <path
                                            d="M9.73535 1.14746C9.57033 1.97255 9.32924 3.26406 9.24902 4.66797C9.16817 6.08312 9.25559 7.5453 9.70214 8.73633C9.84754 9.12406 9.65129 9.55659 9.26367 9.70215C8.9001 9.83849 8.4969 9.67455 8.32812 9.33398L8.29785 9.26367L8.19921 8.98438C7.73487 7.5758 7.67054 5.98959 7.75097 4.58203C7.77875 4.09598 7.82525 3.62422 7.87988 3.17969L1.53027 9.53027C1.23738 9.82317 0.762615 9.82317 0.469722 9.53027C0.176829 9.23738 0.176829 8.76262 0.469722 8.46973L6.83593 2.10254C6.3319 2.16472 5.79596 2.21841 5.25 2.24902C3.8302 2.32862 2.2474 2.26906 0.958003 1.79102L0.704097 1.68945L0.635738 1.65527C0.303274 1.47099 0.157578 1.06102 0.310542 0.704102C0.463655 0.347333 0.860941 0.170391 1.22363 0.28418L1.29589 0.310547L1.48828 0.387695C2.47399 0.751207 3.79966 0.827571 5.16601 0.750977C6.60111 0.670504 7.97842 0.428235 8.86132 0.262695L9.95312 0.0585938L9.73535 1.14746Z" />
                                    </svg>
                                </span>
                                <span>
                                    <?php echo esc_html__('Book Now', 'gofly') ?>
                                    <svg width="10" height="10" viewBox="0 0 10 10" xmlns="http://www.w3.org/2000/svg">
                                        <path
                                            d="M9.73535 1.14746C9.57033 1.97255 9.32924 3.26406 9.24902 4.66797C9.16817 6.08312 9.25559 7.5453 9.70214 8.73633C9.84754 9.12406 9.65129 9.55659 9.26367 9.70215C8.9001 9.83849 8.4969 9.67455 8.32812 9.33398L8.29785 9.26367L8.19921 8.98438C7.73487 7.5758 7.67054 5.98959 7.75097 4.58203C7.77875 4.09598 7.82525 3.62422 7.87988 3.17969L1.53027 9.53027C1.23738 9.82317 0.762615 9.82317 0.469722 9.53027C0.176829 9.23738 0.176829 8.76262 0.469722 8.46973L6.83593 2.10254C6.3319 2.16472 5.79596 2.21841 5.25 2.24902C3.8302 2.32862 2.2474 2.26906 0.958003 1.79102L0.704097 1.68945L0.635738 1.65527C0.303274 1.47099 0.157578 1.06102 0.310542 0.704102C0.463655 0.347333 0.860941 0.170391 1.22363 0.28418L1.29589 0.310547L1.48828 0.387695C2.47399 0.751207 3.79966 0.827571 5.16601 0.750977C6.60111 0.670504 7.97842 0.428235 8.86132 0.262695L9.95312 0.0585938L9.73535 1.14746Z" />
                                    </svg>
                                </span>
                            </a>
                            <?php echo Egns_Helper::hotel_global_starting_price(get_the_ID()) ?>
                        </div>
                    </div>
                </div>
            </div>
        <?php
        }
        wp_reset_postdata();
    } else {
        // Include global posts not found
        Egns\Helper\Egns_Helper::egns_template_part('content', 'templates/posts-not-found');
    }


    $html = ob_get_clean();

    // === Pagination HTML === //
    ob_start();

    $total_pages = $query->max_num_pages;
    if ($total_pages > 1) {
        $current_page = max(1, $paged);

        // Manually build pagination base URL using current request
        global $wp;
        $base_url = home_url(add_query_arg([], $wp->request));
        $base_url = trailingslashit($base_url);

        $big = 999999999;
        $links = paginate_links([
            'base'      => $base_url . '%_%',
            'format'    => 'page/%#%/',
            'current'   => $current_page,
            'total'     => $total_pages,
            'type'      => 'list',
            'end_size'  => 1,
            'mid_size'  => 1,
            'prev_next' => false,
        ]);

        // === Your theme’s formatting replacements === //
        $links = str_replace("<ul class='page-numbers'>", "<ul class='paginations'>", $links);
        $links = str_replace("<li>", "<li class='page-item'>", $links);
        $links = str_replace("page-numbers", "", $links);
        $links = str_replace("&laquo; Previous</a>", '&laquo;</a>', $links);
        $links = str_replace("Next &raquo;</a>", "&raquo;</a>", $links);
        $links = str_replace("next aria-label='Next'", "page-link", $links);
        $links = str_replace("prev aria-hidden='true'", "sr-only page-link", $links);
        $links = str_replace("<li><span", " <li class='page-item active'><a", $links);
        $links = str_replace('span', 'a', $links);
        $links = preg_replace('/>([0-9])</', '>0$1<', $links);

        // Build next and previous URLs manually to avoid “page 0” issue
        $prev_link = ($current_page > 1) ? $base_url . 'page/' . ($current_page - 1) . '/' : '#';
        $next_link = ($current_page < $total_pages) ? $base_url . 'page/' . ($current_page + 1) . '/' : '#';
        ?>
        <div id="hide-ax">
            <div class="pagination-area hotel wow animate fadeInUp mt-60" data-wow-delay="200ms" data-wow-duration="1500ms">
                <?php if ($current_page > 1): ?>
                    <div class="paginations-button">
                        <a href="<?php echo esc_url($prev_link); ?>">
                            <svg width="10" height="10" viewBox="0 0 10 10" xmlns="http://www.w3.org/2000/svg">
                                <g>
                                    <path
                                        d="M7.86133 9.28516C7.14704 7.49944 3.57561 5.71373 1.43276 4.99944C3.57561 4.28516 6.7899 3.21373 7.86133 0.713728"
                                        stroke-width="1.5" stroke-linecap="round" />
                                </g>
                            </svg>
                            <?php echo esc_html__('Prev', 'gofly'); ?>
                        </a>
                    </div>
                <?php endif; ?>

                <?php echo sprintf('%s', $links); ?>

                <?php if ($current_page < $total_pages): ?>
                    <div class="paginations-button">
                        <a href="<?php echo esc_url($next_link); ?>">
                            <?php echo esc_html__('Next', 'gofly'); ?>
                            <svg width="10" height="10" viewBox="0 0 10 10" xmlns="http://www.w3.org/2000/svg">
                                <g>
                                    <path
                                        d="M1.42969 9.28613C2.14397 7.50042 5.7154 5.7147 7.85826 5.00042C5.7154 4.28613 2.50112 3.21471 1.42969 0.714705"
                                        stroke-width="1.5" stroke-linecap="round" />
                                </g>
                            </svg>
                        </a>
                    </div>
                <?php endif; ?>
            </div>
        </div>
<?php
    }

    $pagination_html = ob_get_clean();


    wp_send_json([
        'html'       => $html,
        'pagination' => $pagination_html,
    ]);

    wp_die();
}

add_action('wp_ajax_gofly_archive_filter_hotel', 'gofly_archive_filter_hotel');
add_action('wp_ajax_nopriv_gofly_archive_filter_hotel', 'gofly_archive_filter_hotel');


// Function to add a search query to recent searches
function add_recent_search($query)
{
    // Trim the search query to remove leading and trailing spaces
    $query = trim($query);

    // Check if the query is not empty
    if (!empty($query)) {
        $recent_searches = get_option('recent_searches', array());

        // Remove any existing occurrences of the query
        $recent_searches = array_diff($recent_searches, array($query));

        // Add the query to the beginning of the array
        array_unshift($recent_searches, $query);

        // Limit the number of recent searches, adjust as needed
        $max_recent_searches = 10;

        // Trim the array to the maximum allowed size
        $recent_searches = array_slice($recent_searches, 0, $max_recent_searches);

        // Update the option
        update_option('recent_searches', $recent_searches);
    }
}

// Function to get recent searches
function get_recent_searches()
{
    return get_option('recent_searches', array());
}

// Call add_recent_search whenever a search is performed
if (isset($_GET['s'])) {
    $search_query = sanitize_text_field($_GET['s']);
    add_recent_search($search_query);
}

// AJAX handler to clear search history
function clear_search_history()
{
    delete_option('recent_searches');
    wp_send_json_success();
}
add_action('wp_ajax_clear_search_history', 'clear_search_history');
