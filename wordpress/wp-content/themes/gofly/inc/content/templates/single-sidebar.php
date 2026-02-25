<div class="inspiration-details-page pt-100 mb-100">
    <?php
    // Hook to include additional content before blog post item
    do_action('egns_page_before');
    ?>

    <?php
    // Include blog template
    echo apply_filters('egns_filter_blog_template', Egns\Helper\Egns_Helper::egns_get_template_part('blog', 'templates/standard/loop', '', $params));
    ?>

    <?php
    // Hook to include additional content after blog post item
    do_action('egns_page_after');

    $categories = wp_get_post_categories(get_the_ID());

    $args = array(
        'category__in'   => $categories,
        'post__not_in'   => array(get_the_ID()),
        'posts_per_page' => 8, // Number of related posts to display
        'orderby'        => 'rand' // Random order
    );
    $related_posts = new \WP_Query($args);
    ?>

    <?php if ($related_posts->have_posts()) { ?>
        <div class="related-inspiration-section pt-100 mt-100">
            <div class="container">
                <?php if (!empty(Egns\Helper\Egns_Helper::egns_get_theme_option('single_post_related_post_section_title'))) : ?>
                    <div class="row justify-content-center mb-50 wow animate fadeInDown" data-wow-delay="200ms" data-wow-duration="1500ms">
                        <div class="col-xl-6 col-lg-8">
                            <div class="section-title text-center">
                                <h2><?php echo esc_html(Egns\Helper\Egns_Helper::egns_get_theme_option('single_post_related_post_section_title')); ?></h2>
                                <p><?php echo esc_html(Egns\Helper\Egns_Helper::egns_get_theme_option('single_post_related_post_sec_desc')); ?></p>
                            </div>
                        </div>
                    </div>
                <?php endif; ?>
                <div class="swiper home7-blog-slider">
                    <div class="swiper-wrapper">
                        <?php
                        while ($related_posts->have_posts()) {
                            $related_posts->the_post();
                        ?>
                            <div class="swiper-slide">
                                <div class="blog-card2 two">
                                    <div class="blog-img-wrap">
                                        <?php if (has_post_thumbnail()): ?>
                                            <a href="<?php the_permalink(); ?>" class="blog-img">
                                                <?php the_post_thumbnail('card-thumb'); ?>
                                            </a>
                                        <?php endif; ?>
                                        <?php
                                        $terms = get_the_terms(get_the_ID(), 'location');

                                        if ($terms && !is_wp_error($terms)) {
                                            $term_index = [];
                                            foreach ($terms as $term) {
                                                $term_index[$term->term_id] = $term;
                                            }
                                            $child_terms  = [];
                                            $parent_terms = [];

                                            foreach ($terms as $term) {
                                                if ($term->parent && isset($term_index[$term->parent])) {
                                                    $child_terms[] = $term;  // term with parent
                                                } else {
                                                    $parent_terms[] = $term;  // top-level term
                                                }
                                            }
                                            $sorted_terms = array_merge($child_terms, $parent_terms);

                                            $location_links = [];
                                            foreach ($sorted_terms as $term) {
                                                $term_link = get_term_link($term);
                                                if (!is_wp_error($term_link)) {
                                                    $location_links[] = '<a href="' . esc_url($term_link) . '" class="location-link">' . esc_html($term->name) . '</a>';
                                                }
                                            }

                                            $tour_location = implode(', ', $location_links);
                                        }
                                        ?>
                                        <?php if (!empty($tour_location)): ?>
                                            <span class="location">
                                                <svg width="16" height="16" viewBox="0 0 16 16" xmlns="http://www.w3.org/2000/svg">
                                                    <path d="M7.81273 0C4.31731 0 1.47302 2.84433 1.47302 6.34163C1.47302 9.07242 5.28467 13.5258 6.92353 15.3136C7.15049 15.5628 7.47603 15.7042 7.81273 15.7042C8.14943 15.7042 8.47497 15.5628 8.70193 15.3136C10.3408 13.5258 14.1524 9.07238 14.1524 6.34163C14.1524 2.84433 11.3081 0 7.81273 0ZM8.35963 14.9991C8.21639 15.1535 8.02294 15.2391 7.81273 15.2391C7.60252 15.2391 7.40907 15.1536 7.26583 14.9991C5.66414 13.2525 1.93809 8.90875 1.93809 6.34167C1.93809 3.10103 4.57218 0.465067 7.81273 0.465067C11.0533 0.465067 13.6874 3.10103 13.6874 6.34167C13.6874 8.90875 9.96132 13.2524 8.35963 14.9991Z" />
                                                    <path d="M7.81274 9.76647C9.67127 9.76647 11.1779 8.25983 11.1779 6.4013C11.1779 4.54277 9.67127 3.03613 7.81274 3.03613C5.95421 3.03613 4.44757 4.54277 4.44757 6.4013C4.44757 8.25983 5.95421 9.76647 7.81274 9.76647Z" />
                                                </svg>
                                                <?php echo sprintf('%s', $tour_location); ?>
                                            </span>
                                        <?php endif; ?>
                                    </div>
                                    <div class="blog-content">
                                        <a href="<?php echo esc_url(home_url(get_the_date('Y/m/d'))) ?>" class="blog-date"><?php echo get_the_date("j M, Y"); ?></a>
                                        <h4><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h4>
                                        <?php the_excerpt(); ?>
                                    </div>
                                </div>
                            </div>

                        <?php
                        }
                        wp_reset_postdata();
                        ?>
                    </div>
                </div>
            </div>
        </div>
    <?php  } ?>
</div>