<?php

use Egns\Helper\Egns_Helper;

?>
<div class="package-sidebar-area">
    <div class="sidebar-wrapper">
        <div class="title-area">
            <h5><?php echo esc_html('Filter', 'gofly') ?></h5>
            <span id="clear-filters"><?php echo esc_html('Clear All', 'gofly') ?></span>
        </div>

        <div class="single-widgets">
            <div class="widget-title">
                <h5><?php echo esc_html('Category', 'gofly') ?></h5>
            </div>
            <div class="checkbox-container two hotel-category">
                <ul>
                    <?php
                    $categories = get_terms(array(
                        'taxonomy'   => 'hotel-category',
                        'hide_empty' => true,
                    ));
                    if (!empty($categories)) {
                        foreach ($categories as $cat) {
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
                        echo '<li>No Category found.</li>';
                    }
                    ?>
                </ul>
            </div>
        </div>

        <div class="single-widgets">
            <div class="widget-title">
                <h5><?php echo esc_html__('Tags', 'gofly') ?></h5>
            </div>
            <ul class="tour-type hotel">
                <?php
                $tags = get_terms(array(
                    'taxonomy'   => 'hotel-tag',
                    'hide_empty' => true,
                ));
                if (!empty($tags)) {
                    foreach ($tags as $tag) {
                ?>
                        <li data-value="<?php echo esc_attr($tag->slug); ?>"><?php echo esc_html($tag->name); ?></li>
                <?php
                    }
                } else {
                    echo '<li>No tags found.</li>';
                }
                ?>
            </ul>
        </div>

        <div class="single-widgets">
            <div class="widget-title">
                <h5><?php echo esc_html__('Pricing', 'gofly') ?></h5>
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
                        <div id="slider-range-hotel"></div>
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
                <h5><?php echo esc_html__('Amenities', 'gofly') ?></h5>
            </div>
            <div class="checkbox-container two hotel-amenity">
                <ul class="experience">
                    <?php
                    $amenities = get_terms(array(
                        'taxonomy'   => 'hotel-amenity',
                        'hide_empty' => true,
                    ));
                    if (!empty($amenities)) {
                        foreach ($amenities as $amenity) {
                    ?>
                            <li>
                                <label class="containerss">
                                    <input type="checkbox" name="amenity[]" value="<?php echo esc_attr($amenity->slug); ?>">
                                    <span class="checkmark"></span>
                                    <strong><span><?php echo esc_html($amenity->name) ?></span> <span><?php echo sprintf("%02d", $amenity->count) ?></span></strong>
                                </label>
                            </li>
                    <?php
                        }
                    } else {
                        echo '<li>No Amenities found.</li>';
                    }
                    ?>
                </ul>
                <span class="expand"><?php echo esc_html('See More +', 'gofly') ?></span>
            </div>
        </div>

        <div class="single-widgets">
            <div class="widget-title">
                <h5><?php echo esc_html__('Discount & Offer', 'gofly') ?></h5>
            </div>
            <div class="checkbox-container two hotel-offer">
                <ul>
                    <?php
                    $offers = get_terms(array(
                        'taxonomy'   => 'hotel-offer-criterias',
                        'hide_empty' => true,
                    ));
                    if (!empty($offers)) {
                        foreach ($offers as $offer) {
                    ?>
                            <li>
                                <label class="containerss">
                                    <input type="checkbox" name="offer[]" value="<?php echo esc_attr($offer->slug); ?>">
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