<?php

use Egns\Helper\Egns_Helper;

$destination_counts = Egns_Helper::egns_get_counts_by_custom_meta_key('EGNS_EXPERIENCE_META_ID', 'experience_destination_select', 'experience');

$range = Egns_Helper::exp_global_price_range();
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
            <div class="checkbox-container exp-continen">
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
                                            $des_exp_count = isset($destination_counts[get_the_ID()]) ? $destination_counts[get_the_ID()] : 0;
                                    ?>
                                            <li>
                                                <label class="containerss">
                                                    <input type="checkbox" name="continen[]" value="<?php echo esc_attr(get_the_ID()); ?>">
                                                    <span class="checkmark"></span>
                                                    <strong>
                                                        <span><?php the_title(); ?></span>
                                                        <span><?php echo sprintf('%02d', $des_exp_count) ?></span>
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
                <h5><?php echo esc_html('Experience Type', 'gofly') ?></h5>
            </div>
            <ul class="tour-type experience">
                <?php
                $exp_type = get_terms([
                    'taxonomy'   => 'experience-type',
                    'hide_empty' => false,
                ]);

                if (!empty($exp_type) && !is_wp_error($exp_type)) {
                    foreach ($exp_type as $type_nm) {
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
                        <div id="slider-range-two"></div>
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
                <h5><?php echo esc_html('Categories', 'gofly') ?></h5>
            </div>
            <div class="checkbox-container two exp-category">

                <ul class="experience">
                    <?php
                    $exp_type = get_terms([
                        'taxonomy'   => 'experience-category',
                        'hide_empty' => false,
                    ]);

                    if (!empty($exp_type) && !is_wp_error($exp_type)) {
                        foreach ($exp_type as $type_nm) {
                    ?>
                            <li>
                                <label class="containerss">
                                    <input type="checkbox" name="categories[]" value="<?php echo esc_attr($type_nm->slug); ?>">
                                    <span class="checkmark"></span>
                                    <strong><span><?php echo esc_html($type_nm->name); ?></span> <span><?php echo sprintf('%02d', $type_nm->count); ?></span></strong>
                                </label>
                            </li>
                    <?php
                        }
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
            <div class="checkbox-container two exp-offer">
                <ul>
                    <?php
                    $exp_offer = get_terms(array(
                        'taxonomy'   => 'experience-offer',
                        'hide_empty' => true,
                    ));

                    if (!empty($exp_offer)) {
                        foreach ($exp_offer as $offer) {
                    ?>
                            <li>
                                <label class="containerss">
                                    <input type="checkbox" name="category[]" value="<?php echo esc_attr($offer->slug); ?>">
                                    <span class="checkmark"></span>
                                    <strong><span><?php echo esc_html($offer->name) ?></span> <span><?php echo sprintf("%02d", $offer->count) ?></span></strong>
                                </label>
                            </li>
                    <?php
                        }
                    } else {
                        echo '<li>No Offer found.</li>';
                    }
                    ?>
                </ul>
            </div>
        </div>

    </div>
</div>