<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package filix
 */

?>

<div <?php post_class('blog_single_item'); ?> id="post-<?php the_ID(); ?>">
    <div class="blog_post">
         <?php
            if(is_sticky()) {
                echo '<div class="sticky-label"><span>'.esc_html__('Featured', 'filix').'</span></div>';
            }
         ?>
         <?php if ( has_post_thumbnail() ) : ?>
             <div class="post_img">
                <a href="<?php the_permalink(); ?>"> <?php the_post_thumbnail(); ?> </a>
             </div>
         <?php endif; ?>

        <div class="post_content">
            <ul class="post_info">
                <li>
                    <span class="author">
                        <?php echo get_avatar( get_the_author_meta('user_email'), $size = '50'); ?>
                        <?php esc_html_e('by &nbsp;', 'filix') ?> <?php echo get_the_author_posts_link(); ?>
                    </span>
                </li>
                <li class="float-right">
                    <span class="post_time">
                        <img src="<?php echo get_template_directory_uri(); ?>/assets/images/svg/timetable.svg" alt="icon">
                        <a href="<?php filix_day_link() ?>">
                            <?php the_time( get_option( 'date_format' ) ); ?>
                        </a>
                    </span>
                </li>
            </ul>
            <h3 class="post_title">
                <a href="<?php the_permalink(); ?>">
                    <?php the_title(); ?>
                </a>
            </h3>
            <p class="post_details">
                <?php echo wp_trim_words(get_the_content(), 40, '') ?>
            </p>
            <a href="<?php the_permalink() ?>" class="read_more">
                <?php esc_html_e( 'Explore', 'filix' ) ?>
            </a>
        </div>
    </div>
</div>