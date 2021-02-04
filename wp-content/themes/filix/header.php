<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package filix
 */
$opt = get_option('filix_opt');
?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="https://gmpg.org/xfn/11">
	<?php wp_head(); ?>
</head>

<body id='top' <?php body_class(); ?>>

    <!--Nav bar Part-->
    <?php
    $header_style = !empty( $opt['header_style'] ) ? $opt['header_style'] : '2';

    get_template_part("template-parts/header-style/header-$header_style");

    $page_banner = function_exists('get_field') ? get_field('page_banner') : '1';
    if ( is_404() ) {
        $page_banner = '';
    }
    if ( is_home() ) {
        $page_banner = '1';
    }
    if ( is_single() ) {
         while ( have_posts() ) : the_post();
            get_template_part('template-parts/banner');
        endwhile;
    }
    if( $page_banner == '1' && !is_single() ) {
        get_template_part('template-parts/banner');
    }