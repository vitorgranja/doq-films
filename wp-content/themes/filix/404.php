<?php
/**
 * The template for displaying 404 pages (not found)
 *
 */

get_header();
$opt = get_option('appart_opt');

$error_heading = isset($opt['error_heading']) ? $opt['error_heading'] : esc_html__('404', 'filix');
$error_title = isset($opt['error_title']) ? $opt['error_title'] : esc_html__('Oops, This Page Could Not Be Found!', 'filix');
$error_subtitle = isset($opt['error_subtitle']) ? $opt['error_subtitle'] : esc_html__("We can't seem to find the page you're looking for", 'filix');
?>

<section class="error_page_area">
    <div class="container">
        <div class="error_content">
            <h1> <?php echo esc_html($error_heading) ?> </h1>
            <h2> <?php echo esc_html($error_title) ?> </h2>
            <p> <?php echo esc_html($error_subtitle); ?> </p>
            <?php filix_error_search_form(); ?>
        </div>
    </div>
</section>

<?php
get_footer();