<?php
/**
 * Template part for displaying post contents
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package filix
 */

?>

<div class="blog_single_item">
   <?php
   the_content();
   wp_link_pages( array(
       'before'      => '<div class="page-links"><span class="page-links-title">' . esc_html__( 'Pages:', 'filix' ) . '</span>',
       'after'       => '</div>',
       'link_before' => '<span>',
       'link_after'  => '</span>',
       'pagelink'    => '<span class="screen-reader-text">' . esc_html__( 'Page', 'filix' ) . ' </span>%',
       'separator'   => '<span class="screen-reader-text">, </span>',
   ));
   ?>
    <div class="single_post_tags post-tags">
        <?php the_tags(esc_html__('TAGS : ', 'filix'), ' '); ?>
    </div>
</div>