<?php
/**
 * The template for displaying all pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package filix
 */

get_header();
?>

    <!-- start blog_wrap -->
    <section class="somethings_interesting_wrap">
        <div class="container">
           <?php

            /* Start the Loop */
            while ( have_posts() ) : the_post();
                the_content();
                wp_link_pages( array(
                    'before'      => '<div class="page-links"><span class="page-links-title">' . esc_html__( 'Pages:', 'filix' ) . '</span>',
                    'after'       => '</div>',
                    'link_before' => '<span>',
                    'link_after'  => '</span>',
                    'pagelink'    => '<span class="screen-reader-text">' . esc_html__( 'Page', 'filix' ) . ' </span>%',
                    'separator'   => '<span class="screen-reader-text">, </span>',
                ));
            endwhile;

            if ( comments_open() || get_comments_number() ) :
                comments_template();
            endif;
            ?>
        </div>
    </section>
    <!-- End blog_wrap -->

<?php
get_footer();
