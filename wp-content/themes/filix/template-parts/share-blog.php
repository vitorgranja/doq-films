<div class="blog_sing_share wow fadeInUp">
    <span class="sing_share">
        <?php
        $opt = get_option('filix_opt');
        echo !empty($opt['share_title']) ? '<b>'.esc_html($opt['share_title']) . '</b>' : esc_html__('Share on', 'filix') ?>
    </span>
    <ul class="blog_social">
        <?php filix_post_social_share(); ?>
    </ul>
</div>