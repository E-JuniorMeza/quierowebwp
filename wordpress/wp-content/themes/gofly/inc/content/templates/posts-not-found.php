<div class="post-not-found text-center">
    <img src="<?php echo esc_url(get_template_directory_uri() . '/assets/img/sad.svg') ?>" alt="<?php echo esc_attr__('Image', 'gofly') ?>">
    <div class="inner-cnt mb-30">
        <h3><?php esc_html_e('Sorry, nothing found!', 'gofly'); ?></h3>
        <p><?php esc_html_e('Nothing matched your search terms. Please try again with different keywords.', 'gofly'); ?></p>
    </div>
    <?php get_template_part('searchform'); ?>
</div>