<?php

use Egns\Inc\Blog_Helper;

?>
<?php if (has_post_thumbnail()) : ?>
    <a href="<?php the_permalink() ?>" class="blog-img">
        <?php the_post_thumbnail('grid2-thumb') ?>
    </a>
<?php endif; ?>