<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package filix
 */

get_header();
$opt = get_option('filix_opt');
$share_options = isset( $opt['share_options'] ) ? $opt['share_options'] : '';
$blog_column = is_active_sidebar( 'blog-sidebar' ) ? '8' : '12';
?>

    <!-- start blog_wrap -->
    <section class="blog_wrap blog_single_wrap">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-<?php echo esc_attr($blog_column) ?> col-md-12 col-sm-12 col-xs-12">
                    <div class="blog_content blog_single_content">
                        <?php
                        /* Start the Loop */
                        while ( have_posts() ) : the_post();
                            get_template_part( 'template-parts/post-content' );
                        endwhile;

                        if ( $share_options == '1' ) {
                            get_template_part('template-parts/share-blog');
                        }

                        if ( comments_open() || get_comments_number() ) :
                            comments_template();
                        endif;
                        ?>
                    </div>
                </div>
                <?php get_sidebar(); ?>
            </div>
        </div>
    </section>
    <!-- End blog_wrap -->

<?php
get_footer();