<div class="post-image">
    <?php
    if (Egns\Inc\Blog_Helper::has_egns_image()) {
        echo Egns\Inc\Blog_Helper::egns_thumb_image();
    } else {
    ?>
        <a class="blog-img" href="<?php the_permalink() ?>">
            <?php the_post_thumbnail() ?>
        </a>
    <?php
    }
    ?>
</div>