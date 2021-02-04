<?php
// Add image sizes
add_action( 'after_setup_theme', function() {
    add_image_size( 'filix_100x90', 100, 90, true);
});


// Elementor is anchor external target
function filix_is_external($settings_key) {
    if(isset($settings_key['is_external'])) {
        echo $settings_key['is_external'] == true ? 'target="_blank"' : '';
    }
}

// Elementor is anchor nofollow
function filix_is_nofollow($settings_key) {
    if(isset($settings_key['nofollow'])) {
        echo $settings_key['nofollow'] == true ? 'rel="nofollow"' : '';
    }
}


function filix_icon_array($k, $replace = 'icon', $separator = '-') {
    $v = array();
    foreach ($k as $kv) {
        $kv = str_replace($separator, ' ', $kv);
        $kv = str_replace($replace, '', $kv);
        $v[] = array_push($v, ucwords($kv));
    }
    foreach($v as $key => $value) if($key&1) unset($v[$key]);
    return array_combine($k, $v);
}


// Social Share
function filix_social_share() { ?>
    <ul class="share-icon">
        <li> <?php esc_html_e('Share: ', 'filix-core') ?> </li>
        <li><a href="https://facebook.com/sharer/sharer.php?u=<?php the_permalink(); ?>"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
        <li><a href="https://twitter.com/intent/tweet?text=<?php the_permalink(); ?>"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
        <li><a href="https://www.pinterest.com/pin/create/button/?url=<?php the_permalink() ?>"><i class="fa fa-pinterest" aria-hidden="true"></i></a></li>
        <li><a href="https://www.linkedin.com/shareArticle?mini=true&url=<?php the_permalink() ?>"><i class="fa fa-linkedin" aria-hidden="true"></i></a></li>
    </ul>
    <?php
}

add_filter('gettext','filix_enter_title');
function filix_enter_title( $input ) {
    global $post_type;
    if( is_admin() && 'Enter title here' == $input && 'team' == $post_type )
        return 'Enter here the team member name';
    return $input;
}


// Category array
function filix_cat_array($term = 'category') {
    $cats = get_terms( array(
        'taxonomy' => $term,
        'hide_empty' => true
    ));
    $cat_array = array();
    $cat_array['all'] = esc_html__('All', 'filix');
    foreach ($cats as $cat) {
        $cat_array[$cat->slug] = $cat->name;
    }
    return $cat_array;
}


// Get the first category name
function filix_first_category($term = 'category') {
    $cats = get_the_terms(get_the_ID(), $term);
    $cat  = is_array($cats) ? $cats[0]->name : '';
    echo esc_html($cat);
}


// Get the first category link
function filix_first_category_link($term='category') {
    $cats = get_the_terms(get_the_ID(), $term);
    $cat  = is_array($cats) ? get_category_link($cats[0]->term_id) : '';
    echo esc_url($cat);
}


// Post title array
function filix_get_postTitleArray($postType = 'post') {
    $post_type_query  = new WP_Query(
        array (
            'post_type'      => $postType,
            'posts_per_page' => -1
        )
    );
    // we need the array of posts
    $posts_array      = $post_type_query->posts;
    // create a list with needed information
    // the key equals the ID, the value is the post_title
    $post_title_array = wp_list_pluck( $posts_array, 'post_title', 'ID' );

    return array_flip($post_title_array);
}


// Support SVG file format. Allow .svg file to upload
function karpartz_add_svg_to_upload_mimes( $upload_mimes )
{
    $upload_mimes['svg'] = 'image/svg+xml';
    $upload_mimes['svgz'] = 'image/svg+xml';
    return $upload_mimes;
}
add_filter( 'upload_mimes', 'karpartz_add_svg_to_upload_mimes', 10, 1 );


// Limit latter
function filix_core_limit_latter($string, $limit_length, $suffix = '...') {
    if (strlen($string) > $limit_length) {
        echo strip_shortcodes(substr($string, 0, $limit_length) . $suffix);
    }
    else {
        echo strip_shortcodes(esc_html($string));
    }
}

// Get page template ID
function filix_core_get_page_template_id( $template = 'page-job-apply-form.php' ) {
    $pages = get_pages(array(
        'meta_key' => '_wp_page_template',
        'meta_value' => $template
    ));
    foreach($pages as $page){
        $page_id = $page->ID;
    }
    return $page_id;
}