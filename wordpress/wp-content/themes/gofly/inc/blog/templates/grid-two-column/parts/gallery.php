<div class="post-gallery">
    <?php
    if (Egns\Inc\Blog_Helper::has_egns_gallery()) {
        echo Egns\Inc\Blog_Helper::egns_gallery_images('100%', '100%');
    }
    ?>
</div>