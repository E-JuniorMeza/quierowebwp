
<div class="blog-content">
    <?php
    Egns\Helper\Egns_Helper::egns_template_part('blog', 'templates/common/grid/meta');
    ?>
    
    <h4><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h4>
    <?php the_excerpt(); ?>
</div>