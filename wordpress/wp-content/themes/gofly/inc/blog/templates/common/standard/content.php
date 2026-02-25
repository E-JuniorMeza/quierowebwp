<div class="blog-content">

    <?php Egns\Helper\Egns_Helper::egns_template_part('blog', 'templates/common/standard/meta'); ?>

    <h4><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h4>

    <?php echo wp_trim_words(get_the_content(), 42, '...'); ?>

</div>