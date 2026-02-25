<?php

use Egns\Helper\Egns_Helper;

$destination_counts = Egns_Helper::egns_get_counts_by_custom_meta_key('EGNS_TOUR_META_ID', 'tour_destination_select', 'tour');
$exp_destination_counts = Egns_Helper::egns_get_experience_counts_from_tours();

$range = Egns_Helper::get_tour_price_range();
$min = $range['min'];
$max = $range['max'];

?>
<div class="package-sidebar-area">
    <div class="sidebar-wrapper">
        <div class="title-area">
            <h5><?php echo esc_html('Filter', 'gofly') ?></h5>
            <span id="clear-filters"><?php echo esc_html('Clear All', 'gofly') ?></span>
        </div>
        <div class="single-widgets">
            <div class="widget-title">
                <h5><?php echo esc_html('Destinations', 'gofly') ?></h5>
            </div>
            <div class="checkbox-container continen">
                <ul>
                    <?php
                    $continents = get_terms([
                        'taxonomy'   => 'destination-continent',
                        'hide_empty' => false,
                    ]);

                    if (!empty($continents) && !is_wp_error($continents)) {
                        foreach ($continents as $continent) {
                    ?>
                            <li class="sidebar-category-dropdown">
                                <label class="containerss">
                                    <input type="checkbox" name="continen[]" value="<?php echo esc_attr($continent->slug); ?>">
                                    <span class="checkmark"></span>
                                    <strong><?php echo esc_html($continent->name); ?></strong>
                                </label>
                                <ul class="sub-category">
                                    <?php
                                    $args = [
                                        'post_type'      => 'destination',
                                        'posts_per_page' => -1,
                                        'tax_query'      => [
                                            [
                                                'taxonomy' => 'destination-continent',
                                                'field'    => 'term_id',
                                                'terms'    => $continent->term_id,
                                            ],
                                        ],
                                    ];
                                    $query = new WP_Query($args);

                                    if ($query->have_posts()) {
                                        while ($query->have_posts()) {
                                            $query->the_post();
                                            $des_tour_count = isset($destination_counts[get_the_ID()]) ? $destination_counts[get_the_ID()] : 0;
                                    ?>
                                            <li>
                                                <label class="containerss">
                                                    <input type="checkbox" name="continen[]" value="<?php echo esc_attr(get_the_ID()); ?>">
                                                    <span class="checkmark"></span>
                                                    <strong>
                                                        <span><?php the_title(); ?></span>
                                                        <span><?php echo sprintf('%02d', $des_tour_count) ?></span>
                                                    </strong>
                                                </label>
                                            </li>
                                    <?php
                                        }
                                        wp_reset_postdata();
                                    } else {
                                        echo '<li>No destinations found.</li>';
                                    }
                                    ?>
                                </ul>
                                <i class="bi bi-caret-right-fill sidebar-category-icon active"></i>
                            </li>
                    <?php
                        }
                    }
                    ?>
                </ul>
            </div>
        </div>
        <div class="single-widgets">
            <div class="widget-title">
                <h5><?php echo esc_html('Tour Type', 'gofly') ?></h5>
            </div>
            <ul class="tour-type tour">
                <?php
                $tour_typ = get_terms([
                    'taxonomy'   => 'tour-type',
                    'hide_empty' => false,
                ]);

                if (!empty($tour_typ) && !is_wp_error($tour_typ)) {
                    foreach ($tour_typ as $type_nm) {
                ?>
                        <li data-value="<?php echo esc_attr($type_nm->slug); ?>"><?php echo esc_html($type_nm->name); ?></li>
                <?php
                    }
                }
                ?>
            </ul>
        </div>
        <div class="single-widgets">
            <div class="widget-title">
                <h5><?php echo esc_html('Pricing', 'gofly') ?></h5>
            </div>
            <div class="range-wrap">
                <div class="row">
                    <div class="col-sm-12">
                        <form>
                            <input type="hidden" name="min-value" value="">
                            <input type="hidden" name="max-value" value="">
                        </form>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-12">
                        <div id="slider-range"></div>
                    </div>
                </div>
                <div class="slider-labels">
                    <div class="caption">
                        <span id="slider-range-value1"></span>
                    </div>
                    <div class="caption">
                        <span id="slider-range-value2"></span>
                    </div>
                </div>
            </div>
        </div>
        <div class="single-widgets">
            <div class="widget-title">
                <h5><?php echo esc_html('Experiences', 'gofly') ?></h5>
            </div>
            <div class="checkbox-container two experience">
                <ul class="experience">
                    <?php
                    $args = [
                        'post_type'      => 'experience',
                        'post_status'    => 'publish',
                        'posts_per_page' => -1,
                    ];
                    $query = new WP_Query($args);

                    if ($query->have_posts()) {
                        while ($query->have_posts()) {
                            $query->the_post();
                            $experience_count = isset($exp_destination_counts[get_the_ID()]) ? $exp_destination_counts[get_the_ID()] : 0;
                    ?>
                            <li>
                                <label class="containerss">
                                    <input type="checkbox" name="destination[]" value="<?php echo esc_attr(get_the_ID()); ?>">
                                    <span class="checkmark"></span>
                                    <strong><span><?php the_title(); ?></span> <span><?php echo sprintf('%02d', $experience_count) ?></span></strong>
                                </label>
                            </li>
                    <?php
                        }
                        wp_reset_postdata();
                    }
                    ?>
                </ul>
                <span class="expand"><?php echo esc_html('See More +', 'gofly') ?></span>
            </div>
        </div>
        <div class="single-widgets">
            <div class="widget-title">
                <h5><?php echo esc_html('Discount & Offer', 'gofly') ?></h5>
            </div>
            <div class="checkbox-container two category">
                <ul>
                    <?php
                    $tour_category = get_terms(array(
                        'taxonomy'   => 'tour-category',
                        'hide_empty' => true,
                    ));

                    if (!empty($tour_category)) {
                        foreach ($tour_category as $cat) {
                    ?>
                            <li>
                                <label class="containerss">
                                    <input type="checkbox" name="category[]" value="<?php echo esc_attr($cat->slug); ?>">
                                    <span class="checkmark"></span>
                                    <strong><span><?php echo esc_html($cat->name) ?></span> <span><?php echo sprintf("%02d", $cat->count) ?></span></strong>
                                </label>
                            </li>
                    <?php
                        }
                    } else {
                        echo '<li>No tour category found.</li>';
                    }
                    ?>
                </ul>
            </div>
        </div>
    </div>
</div>