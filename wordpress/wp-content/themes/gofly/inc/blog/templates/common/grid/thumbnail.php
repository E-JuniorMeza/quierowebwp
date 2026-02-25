<div class="blog-img-wrap">

    <?php if (has_post_thumbnail()) : ?>
        <a href="<?php the_permalink() ?>" class="blog-img">
            <?php the_post_thumbnail('grid-thumb') ?>
        </a>
    <?php endif; ?>

    <!-- Post Location -->
    <?php
    $terms = get_the_terms(get_the_ID(), 'location');
    if ($terms && !is_wp_error($terms)) {
        $term_index = [];
        foreach ($terms as $term) {
            $term_index[$term->term_id] = $term;
        }
        $child_terms = [];
        $parent_terms = [];
        foreach ($terms as $term) {
            if ($term->parent && isset($term_index[$term->parent])) {
                $child_terms[] = $term; // term with parent
            } else {
                $parent_terms[] = $term; // top-level term
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

    <?php if (!empty($tour_location)) : ?>
        <span class="location">
            <svg width="14" height="14" viewBox="0 0 14 14" xmlns="http://www.w3.org/2000/svg">
                <path
                    d="M6.83615 0C3.77766 0 1.28891 2.48879 1.28891 5.54892C1.28891 7.93837 4.6241 11.8351 6.05811 13.3994C6.25669 13.6175 6.54154 13.7411 6.83615 13.7411C7.13076 13.7411 7.41561 13.6175 7.6142 13.3994C9.04821 11.8351 12.3834 7.93833 12.3834 5.54892C12.3834 2.48879 9.89464 0 6.83615 0ZM7.31469 13.1243C7.18936 13.2594 7.02008 13.3342 6.83615 13.3342C6.65222 13.3342 6.48295 13.2594 6.35761 13.1243C4.95614 11.5959 1.69584 7.79515 1.69584 5.54896C1.69584 2.7134 4.00067 0.406933 6.83615 0.406933C9.67164 0.406933 11.9765 2.7134 11.9765 5.54896C11.9765 7.79515 8.71617 11.5959 7.31469 13.1243Z" />
                <path
                    d="M6.83618 8.54529C8.4624 8.54529 9.7807 7.22698 9.7807 5.60077C9.7807 3.97456 8.4624 2.65625 6.83618 2.65625C5.20997 2.65625 3.89166 3.97456 3.89166 5.60077C3.89166 7.22698 5.20997 8.54529 6.83618 8.54529Z" />
            </svg>
            <?php echo sprintf('%s', $tour_location); ?>
        </span>
    <?php endif; ?>
</div>