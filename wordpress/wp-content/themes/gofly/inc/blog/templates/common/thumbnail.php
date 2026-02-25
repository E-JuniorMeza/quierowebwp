<?php if (has_post_thumbnail()) : ?>
    <div class="blog-img-wrap">
        <a class="blog-img" href="<?php the_permalink() ?>">
            <?php the_post_thumbnail('egns-thumb') ?>
        </a>
        <?php
        $categories = get_the_category();
        if (! empty($categories)) : ?>
            <div class="blog-tag">
                <a href="<?php echo esc_url(get_category_link($categories[0]->term_id)); ?>"><?php echo esc_html($categories[0]->name); ?></a>
            </div>
        <?php endif;
        ?>
    </div>
<?php endif; ?>