<?php
/**
 * Register Google fonts.
 *
 * @return string Google fonts URL for the theme.
 */
function filix_fonts_url() {
    $fonts_url = '';
    $fonts     = array();
    $subsets   = '';

    /* Body font */
    if ( 'off' !== 'on' ) {
        $fonts[] = "Poppins:300,400,500,600,700,900";
    }

    $is_ssl = is_ssl() ? 'https' : 'http';

    if ( $fonts ) {
        $fonts_url = add_query_arg( array(
            'family' => urlencode( implode( '|', $fonts ) ),
            'subset' => urlencode( $subsets ),
        ), "$is_ssl://fonts.googleapis.com/css" );
    }

    return $fonts_url;
}


/**
 * Enqueue scripts and styles.
 */
function filix_scripts() {

    $opt = get_option('filix_option');

    $dynamic_css = '';

    wp_enqueue_style( 'filix-fonts', filix_fonts_url(), array(), null );

    wp_enqueue_style( 'bootstrap',  FILIX_DIR_CSS.'/bootstrap.css' );

    wp_enqueue_style( 'slick',  FILIX_DIR_CSS.'/slick.css' );

    wp_enqueue_style( 'slick-theme',  FILIX_DIR_CSS.'/slick-theme.css' );

    wp_enqueue_style( 'particle',  FILIX_DIR_CSS.'/particle.css' );

    wp_enqueue_style( 'animated',  FILIX_DIR_CSS.'/animated.css' );

    wp_enqueue_style( 'font-awesome-animation',  FILIX_DIR_CSS.'/font-awesome-animation.min.css' );

    wp_enqueue_style( 'YTPlayer',  FILIX_DIR_CSS.'/jquery.mb.YTPlayer.min.css' );

    wp_enqueue_style( 'themify',  FILIX_DIR_CSS.'/themify-icons.css' );

    wp_enqueue_style( 'elegant-icon-style',  FILIX_DIR_CSS.'/elegant-icon-style.css' );

    wp_enqueue_style( 'font-awesome',  FILIX_DIR_CSS.'/font-awesome.min.css' );

    wp_enqueue_style( 'filix-gutenberg',  FILIX_DIR_CSS . '/filix-gutenberg.css' );

    if ( is_404() ) {
        wp_enqueue_style('filix-404', FILIX_DIR_CSS . '/404.css');
    }

    wp_enqueue_style( 'filix-wpd-style',  FILIX_DIR_CSS . '/wp-defualt.css' );

    wp_enqueue_style( 'filix-main',  FILIX_DIR_CSS . '/style.css' );

    wp_enqueue_style( 'filix-extra',  FILIX_DIR_CSS . '/style1.css' );

    wp_enqueue_style( 'filix-responsive', FILIX_DIR_CSS . '/responsive.css' );

    wp_enqueue_style( 'filix-responsive2', FILIX_DIR_CSS . '/responsive2.css' );

    wp_enqueue_style( 'filix-style', get_stylesheet_uri() );

    if ( is_single() || is_page() ) {
        if ( has_post_thumbnail() ) {
            $dynamic_css .= "
            .hero_warp.inner_banner {
                background-image: url(" . get_the_post_thumbnail_url() . ");
            }";
        }
    }

    $is_logo_slash = isset($opt['is_logo_slash']) ? $opt['is_logo_slash'] : '1';
    if ( $is_logo_slash != '1' ) {
        $dynamic_css .= "header.header .navbar .logo .logo_text:before {display: none;} ";
    }

    if ( !empty( $opt['footer_bg']['url'] )) {
        $dynamic_css .= "
            .footer {
                 background: url({$opt['footer_bg']['url']}) no-repeat scroll top left/cover;
            }";
    }

    if ( function_exists('get_field') ) {
        $overlay_color = get_field('overlay_color');
        $page_banner_bg_img = get_field('background_image');
        if ( !empty($overlay_color) ) {
            $dynamic_css .= ".hero_warp::before { background: $overlay_color;}";
        }

        if ( !empty($page_banner_bg_img) ) {
            $dynamic_css .= ".hero_warp.inner_banner { background: url({$page_banner_bg_img['url']}); background-size: cover; background-attachment: scroll; }";
        }
    }

    wp_add_inline_style( 'filix-style', $dynamic_css );


    $dynamic_js = '';

    wp_enqueue_script( 'bootstrap', FILIX_DIR_JS.'/bootstrap.min.js', array('jquery'), '4.0', true );

    wp_enqueue_script( 'isotope', FILIX_DIR_JS.'/isotope.pkgd.min.js', array('jquery'), '3.0.6', true );

    wp_enqueue_script( 'slick', FILIX_DIR_JS.'/slick.min.js', array('jquery'), '1.6', true );

    wp_register_script( 'particles', FILIX_DIR_JS.'/particles.js', array('jquery'), '1.0', true );

    wp_enqueue_script( 'YTPlayer', FILIX_DIR_JS.'/jquery.mb.YTPlayer.js', array('jquery'), '1.0', true );

    wp_enqueue_script( 'parallax-scroll', FILIX_DIR_JS.'/parallax-scroll.js', array('jquery'), '1.0', true );

    wp_enqueue_script( 'filix-main', FILIX_DIR_JS.'/main.js', array('jquery'), '1.0', true );

    wp_add_inline_script('filix-custom-wp', $dynamic_js);

    if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
        wp_enqueue_script( 'comment-reply' );
    }
}
add_action( 'wp_enqueue_scripts', 'filix_scripts' );


add_action('admin_enqueue_scripts', function() {
    wp_enqueue_style('filix-admin', FILIX_DIR_CSS.'/filix-admin.css');
});


// Gutenberg editor assets
add_action( 'enqueue_block_assets', function() {
    wp_enqueue_style( 'filix-fonts', filix_fonts_url(), array(), null );
    wp_enqueue_style( 'bootstrap',  FILIX_DIR_CSS.'/bootstrap.css' );
    wp_enqueue_style( 'wp-block-library-theme' );
});