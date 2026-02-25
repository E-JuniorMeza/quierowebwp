
<div class="col-lg-6 wow animate fadeInDown" data-wow-delay="200ms" data-wow-duration="1500ms">
    <div class="blog-card" <?php echo has_post_thumbnail() ? '' : 'style="grid-template-columns: auto;"'; ?>>
        <?php
        Egns\Inc\Blog_Helper::egns_blog_is_sticky();
        Egns\Helper\Egns_Helper::egns_template_part('blog', 'templates/common/grid-two-column/thumbnail');
        Egns\Helper\Egns_Helper::egns_template_part('blog', 'templates/common/grid-two-column/content');
        ?>        
    </div>
</div>