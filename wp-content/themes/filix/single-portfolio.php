<?php
/**
 *  Template Name: Portfolio
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

$attributes_title = function_exists( 'get_field' ) ? get_field('attributes_title') : '';
?>

    <!-- start portfolio_single_content -->
    <section class="portfolio_single_content">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-12 single_body">
                    <?php
                    while ( have_posts() ) : the_post();
                        the_content();
                    endwhile;
                    ?>
                </div>
            </div>
        </div>
    </section>
    <!-- end portfolio_single_content -->

<?php
get_footer();