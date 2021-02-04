<?php
/**
 * The sidebar containing the main widget area
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package filix
 */

if ( ! is_active_sidebar( 'blog-sidebar' ) ) {
	return;
}
?>

<div class="col-lg-4 col-md-12 col-sm-12 col-xs-12">
    <div class="blog_sidebar">
        <?php dynamic_sidebar('blog-sidebar') ?>
    </div>
</div>