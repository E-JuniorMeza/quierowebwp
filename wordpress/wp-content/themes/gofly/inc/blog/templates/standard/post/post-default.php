
<div id="post-<?php the_ID(); ?>" <?php post_class('col-lg-12'); ?>>
    <div class="blog-card2 six">
        <?php
        Egns\Inc\Blog_Helper::egns_blog_is_sticky();
        Egns\Helper\Egns_Helper::egns_template_part('blog', 'templates/common/standard/thumbnail');
        Egns\Helper\Egns_Helper::egns_template_part('blog', 'templates/common/standard/content');
        ?>
            
    </div>
</div>