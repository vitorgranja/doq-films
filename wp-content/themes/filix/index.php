<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package filix
 */

get_header();
$blog_column = is_active_sidebar( 'blog-sidebar' ) ? '8' : '12';
?>

	<!-- start blog_wrap -->
	<section class="blog_wrap pd_120">
	    <div class="container">
	        <div class="row justify-content-center">
	            <div class="col-lg-<?php echo esc_attr($blog_column) ?> col-md-12 col-sm-12 col-xs-12">
	                <div class="blog_content">
                        <?php
                        if ( have_posts() ) :
                            /* Start the Loop */
                            while ( have_posts() ) :
                                the_post();
                                if( has_post_format('video') ) {
                                    wp_enqueue_style( 'fancybox' );
                                    wp_enqueue_script( 'fancybox' );
                                }
                                get_template_part( 'template-parts/content', get_post_type() );
                            endwhile;
                        else :
                            get_template_part( 'template-parts/content', 'none' );
                        endif;
                        ?>
                    </div>
                    <div class="pagination_content wow fadeInUp">
                        <nav class="navigation">
                            <?php filix_pagination(); ?>
                        </nav>
                    </div>
                </div>

                <?php get_sidebar(); ?>

            </div>
        </div>
    </section>

<?php
get_footer();