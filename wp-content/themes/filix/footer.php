<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package filix
 */

$opt = get_option('filix_opt');
$is_footer = isset($opt['is_footer']) ? $opt['is_footer'] : '';

if ( !is_404() ) :
    if ( $is_footer == '1' ) :
        ?>
        <footer class="footer">
            <div class="container">
                <div class="row">
                    <div class="col-md-12 col-12">
                        <div class="footer_content">
                            <div class="footer_logo text-center wow fadeInUp">
                                <a href="<?php echo esc_url( home_url( '/' ) ); ?>">
                                    <?php filix_logo(); ?>
                                </a>
                            </div>
                            <?php if( !empty($opt['footer_heading']) ) : ?>
                                <h2 class="footer_title text-center wow fadeInUp">
                                    <?php echo wp_specialchars_decode ( wp_kses_post( $opt['footer_heading'] ) ); ?>
                                </h2>
                            <?php endif; ?>
                            <ul class="footer_contact text-center wow fadeInUp">
                                <?php filix_contact_info(); ?>
                            </ul>
                            <ul class="footer_social text-center wow fadeInUp">
                                <?php filix_social_links(); ?>
                            </ul>
                            <?php if ( !empty( $opt['footer_copyright'] ) ) : ?>
                                <p class="footer_copy_right text-center wow fadeInUp">
                                    <?php echo wp_specialchars_decode ( wp_kses_post( $opt['footer_copyright'] ) ); ?>
                                </p>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            </div>
        </footer>
        <?php
    endif;
    ?>

    <!-- end footer -->
    <?php
    $scrolltop_up = isset($opt['scrolltop_up']) ? $opt['scrolltop_up'] : '';
    if( $scrolltop_up == '1' ) : ?>
        <div class="go_to_top">
            <a href="#top">
                <i class="fa fa-angle-up"></i>
                <i class="fa fa-angle-up"></i>
            </a>
        </div>
    <?php endif; ?>

<?php endif; ?>

<?php wp_footer(); ?>
</body>
</html>