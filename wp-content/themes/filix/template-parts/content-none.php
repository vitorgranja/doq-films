<?php
/**
 * Template part for displaying a message that posts cannot be found
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package filix
 */

?>

<div class="not-found">
    <h1><?php esc_html_e('Nothing found!', 'filix'); ?></h1>
    <p><?php esc_html_e('It looks like nothing was found here. Maybe try a search?','filix'); ?></p>
    <div class="search-forms"> <?php get_search_form(); ?></div>
</div> <!-- end not-found -->