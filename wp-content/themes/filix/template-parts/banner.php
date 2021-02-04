<?php
$opt = get_option('filix_opt');
$is_social_share = isset($opt['is_social_share']) ? $opt['is_social_share'] : '';
?>

<section class="hero_warp inner_banner contact_banner <?php echo (is_single()) ? 'blog_single_banner' : ''; ?>">
    <div class="container">
        <div class="row d-flex align-items-center">
            <div class="col-md-12 col-12">
                <div class="banner_content">
                    <h1 class="banner_title">
                        <?php filix_banner_title() ?>
                    </h1>
                    <ul class="filix_breadcrumb_link wow fadeInUp">
                        <li> <a href="<?php echo esc_url(home_url('/')) ?>"> <?php esc_html_e('Home', 'filix') ?> </a> </li>
                        <li> <a href="<?php the_permalink() ?>"> <?php echo strip_tags(get_the_title()) ?> </a> </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>

    <?php if ( $is_social_share == '1' ) : ?>
        <ul class="social_link">
           <?php filix_post_social_share(); ?>
        </ul>
    <?php endif; ?>

</section>