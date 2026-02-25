<?php
if (has_post_thumbnail()) :

    $terms = get_the_terms(get_the_ID(), 'location');
?>
    <div class="inspiration-image mb-50">
        <?php the_post_thumbnail(); ?>
        <?php if (!empty($terms) && !is_wp_error($terms)) : ?>
            <span><?php echo esc_html($terms[0]->name) ?></span>
        <?php endif; ?>
    </div>
<?php endif; ?>