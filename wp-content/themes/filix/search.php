<?php
/**
 * The template for displaying search results pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#search-result
 *
 * @package filix
 */

get_header();
?>

<!-- start blog_wrap -->
	<section class="blog_wrap pd_120">
	    <div class="container">
	        <div class="row justify-content-center">
	            <div class="col-lg-8 col-md-12 col-sm-12 col-xs-12">
	                <div class="blog_content">
					<?php
					if ( have_posts() ) :
						/* Start the Loop */
						while ( have_posts() ) :
							the_post();

							if( has_post_format('video') ) {
	                            wp_enqueue_style('fancybox');
	                            wp_enqueue_script('fancybox');
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
                    <ul class="pagination text-center">
						<?php $args = array(
							'base'               => '%_%',
							'format'             => '?paged=%#%',
							'prev_next'          => true,
							'prev_text'          => '<i class="arrow_left"></i>',
							'next_text'          => '<i class="arrow_right"></i>',
							'type'               => 'list',
						); 

						echo paginate_links( $args );
						?>
                    </ul>
                </nav>
            </div>
        </div>
		</div>
    </div>
</section>

<?php
get_footer();
