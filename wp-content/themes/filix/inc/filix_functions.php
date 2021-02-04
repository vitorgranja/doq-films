<?php 

/**
 * Website Logo
 */
function filix_logo() {
    $opt = get_option('filix_opt');
    $logo = $opt['logo_select'];
    $main_img_logo = !empty($opt['main_logo']['url']) ? $opt['main_logo']['url'] : '';
    $sticky_img_logo = !empty($opt['sticky_main_logo']['url']) ? $opt['sticky_main_logo']['url'] : '';
    $main_text_logo = !empty($opt['main_text_logo']) ? $opt['main_text_logo'] : get_bloginfo('name');
    if ( $logo == '1' ) { ?>
        <span class="logo_text"> <?php echo esc_html($main_text_logo); ?> </span>
        <?php
    } elseif ($logo == '2') {
        ?>
        <img src="<?php echo esc_url($main_img_logo) ?>" alt="<?php bloginfo('name'); ?>">
        <img src="<?php echo esc_url($sticky_img_logo) ?>" alt="<?php bloginfo('name'); ?>">
        <?php
    } else { ?>
        <span class="logo_text"> <?php echo esc_html($main_text_logo); ?> </span>
        <?php
    }
}

// Banner Title
function filix_banner_title() {
    $opt = get_option('filix_options');
    if( is_home() ) {
        $blog_title = !empty($opt['blog_title']) ? $opt['blog_title'] : esc_html__('Blog', 'filix');
        echo esc_html($blog_title);
    }
    elseif( is_page() || is_single() ) {
       echo strip_tags(get_the_title());
    }
    elseif( is_category() ) {
        single_cat_title();
    }
    elseif( is_archive() ) {
        the_archive_title();
    }
    elseif ( is_search() ) {
        printf( esc_html__( 'Search Results for: %s', 'filix' ), '<span>"' . get_search_query() . '"</span>' );
    }
    else {
        echo strip_tags(get_the_title());
    }
}

// Banner Subtitle
function filix_banner_subtitle() {
    $opt = get_option('filix_options');
    if( is_home() ) {
        $blog_subtitle = !empty($opt['blog_sub_title']) ? $opt['blog_sub_title'] : get_bloginfo('description');
        echo '<p class="banner_para wow fadeInUp">';
        echo esc_html( $blog_subtitle );
        echo '</p>';
    }
    if( is_page() ) {
        if ( has_excerpt() ) {
            echo '<p class="banner_para wow fadeInUp">' . nl2br(get_the_excerpt()) . '</p>';
        }
    }
    if( is_single() ) {
        ?>
        <ul class="post_info">
            <li>
                <span class="author">
                    <?php echo get_avatar(get_the_author_meta('ID'), 36, '', get_the_author_meta('display_name')) ?>
                    <?php esc_html_e('by ', 'filix'); echo "&nbsp;"; ?>
                    <?php echo get_the_author_posts_link() ?>
                </span>
            </li>
            <li>
                <span class="post_time">
                    <img src="<?php echo FILIX_DIR_IMG ?>/svg/timetable-white.svg" alt="icon">
                    <a href="<?php filix_day_link() ?>"> <?php the_time( get_option('date_format') ); ?> </a>
                </span>
            </li>
        </ul>
        <?php
    }

}

// contact information
function filix_contact_info(){
    $opt = get_option('filix_opt');
    ?>
    <?php if(!empty($opt['bottom_email_address'])) { ?>
        <li> <a href="mailto:<?php echo esc_attr( $opt['bottom_email_address'] ); ?>">
                <span> <?php echo esc_html($opt['bottom_email_address']); ?></span>
                <span> <?php echo esc_html($opt['bottom_email_address']); ?></span>
            </a> </li>
    <?php } ?>
    <?php if(!empty($opt['bottom_phone_number'])) {
        ?>
        <li>
            <a href="tel:<?php echo esc_attr($opt['bottom_phone_number']); ?>">
                <span> <?php echo esc_html($opt['bottom_phone_number']); ?> </span>
                <span> <?php echo esc_html($opt['bottom_phone_number']); ?> </span>
            </a>
        </li>
        <?php
    }
}

// Social Links
function filix_social_links() {
    $opt = get_option('filix_opt');
    ?>
    <?php if(!empty($opt['facebook'])) { ?>
        <li> <a href="<?php echo esc_url($opt['facebook']); ?>">
            <i class="fa fa-facebook" aria-hidden="true"></i>
            <i class="fa fa-facebook" aria-hidden="true"></i>
        </a> </li>
    <?php } ?>
    <?php if(!empty($opt['twitter'])) { ?>
        <li> <a href="<?php echo esc_url($opt['twitter']); ?>">
            <i class="fa fa-twitter" aria-hidden="true"></i>
            <i class="fa fa-twitter" aria-hidden="true"></i>
        </a> </li>
    <?php } ?>
    <?php if(!empty($opt['behance'])) { ?>
        <li> <a href="<?php echo esc_url($opt['behance']); ?>">
            <i class="fa fa-behance" aria-hidden="true"></i>
            <i class="fa fa-behance" aria-hidden="true"></i>
        </a> </li>
    <?php } ?>
    <?php if(!empty($opt['instagram'])) { ?>
        <li> <a href="<?php echo esc_url($opt['instagram']); ?>">
            <i class="fa fa-instagram" aria-hidden="true"></i>
            <i class="fa fa-instagram" aria-hidden="true"></i>
        </a> </li>
    <?php } ?>
    <?php if(!empty($opt['linkedin'])) { ?>
        <li> <a href="<?php echo esc_url($opt['linkedin']); ?>">
            <i class="fa fa-linkedin" aria-hidden="true"></i>
            <i class="fa fa-linkedin" aria-hidden="true"></i>
        </a> </li>
    <?php } ?>
    <?php if(!empty($opt['youtube'])) { ?>
        <li> <a href="<?php echo esc_url($opt['youtube']); ?>">
            <i class="fa fa-youtube" aria-hidden="true"></i>
            <i class="fa fa-youtube" aria-hidden="true"></i>
        </a> </li>
    <?php } ?>
    <?php if(!empty($opt['dribbble'])) { ?>
        <li> <a href="<?php echo esc_url($opt['dribbble']); ?>">
            <i class="fa fa-dribbble" aria-hidden="true"></i>
            <i class="fa fa-dribbble" aria-hidden="true"></i>
        </a> </li>
    <?php } ?>
    <?php if (!empty($opt['pinterest'])) { ?>
        <li> <a href="<?php echo esc_url($opt['pinterest']); ?>">
            <i class="fa fa-pinterest-p" aria-hidden="true"></i>
            <i class="fa fa-pinterest-p" aria-hidden="true"></i>
        </a> </li>
    <?php } ?>
    <?php
}

// Filix Social Share Options
function filix_post_social_share() {
    $opt = get_option('filix_opt');

    if ( $opt['is_post_fb'] == '1' ) : ?>
        <li>
            <a href="//facebook.com/sharer/sharer.php?u=<?php the_permalink(); ?>">
                <i class="fa fa-facebook" aria-hidden="true"></i>
                <i class="fa fa-facebook" aria-hidden="true"></i>
            </a>
        </li>
    <?php endif; ?>

    <?php if ( $opt['is_post_twitter'] == '1' ) : ?>
        <li>
            <a href="//twitter.com/intent/tweet?text=<?php the_permalink(); ?>">
                <i class="fa fa-twitter" aria-hidden="true"></i>
                <i class="fa fa-twitter" aria-hidden="true"></i>
            </a>
        </li>
    <?php endif; ?>

    <?php if ( $opt['is_post_pinterest'] == '1' ) : ?>
        <li>
            <a href="https://www.pinterest.com/pin/create/button/?url=<?php the_permalink() ?>">
                <i class="fa fa-pinterest" aria-hidden="true"></i>
                <i class="fa fa-pinterest" aria-hidden="true"></i>
            </a>
        </li>
    <?php endif; ?>

    <?php if ( $opt['is_post_linkedin'] == '1' ) : ?>
        <li>
            <a href="//www.linkedin.com/shareArticle?mini=true&url=<?php the_permalink() ?>">
                <i class="fa fa-linkedin" aria-hidden="true"></i>
                <i class="fa fa-linkedin" aria-hidden="true"></i>
            </a>
        </li>
    <?php endif; ?>
    <?php
}


// Filix comments list
function filix_comments_items($comment, $args, $depth){
        $GLOBAL['comment'] = $comment;
        extract($args, EXTR_SKIP);
        $args['replay_text'] = esc_html__( 'Reply', 'filix' );
        $is_reply = ($depth > 1) ? ' comment-reply' : '';
        $has_children = ( !empty( $args['has_children'] ) ) ? ' has_comment_reply' : '';
        ?>
        <li <?php comment_class($is_reply.$has_children) ?> id="comment-<?php comment_ID(); ?>">
            <div class="media">
                <?php if ( get_avatar($comment) ) : ?>
                    <div class="media-left">
                        <?php echo get_avatar( $comment, 70, null, null, array( 'class' => 'media-object', )); ?>
                    </div>
                <?php endif; ?>
                <div class="media-body">
                    <div class="reply_body">
                        <h6 class="author_name"> <?php echo get_comment_author_link(); ?>
                            <span class="post_ago"><?php comment_time( get_option('date_format') ); ?></span>
                            <?php if ( ($depth < 5) ) : ?>
                                <span class="float-right comment_reply_link">
                                     <?php
                                     comment_reply_link( array_merge( $args, array(
                                        'depth' =>  $depth,
                                        'max_depth' =>  $args['max_depth'],
                                     )));
                                     ?>
                                    <i class="arrow_right"></i>
                                </span>
                            <?php endif; ?>
                        </h6>
                        <?php comment_text(); ?>
                    </div>
                </div>
            </div>
        </li>
    <?php
}

// Comment list end callback
function filix_comment_end() {
    echo '';
}

// Limit latter
function filix_limit_latter($string, $limit_length, $suffix = '...') {
    if (strlen($string) > $limit_length) {
        echo strip_shortcodes(substr($string, 0, $limit_length) . $suffix);
    }
    else {
        echo strip_shortcodes(esc_html($string));
    }
}

// Day link to archive page
function filix_day_link() {
    $archive_year   = get_the_time('Y');
    $archive_month  = get_the_time('m');
    $archive_day    = get_the_time('d');
    echo get_day_link( $archive_year, $archive_month, $archive_day);
}


// Get comment count text
function filix_comment_count($post_id) {
    $comments_number = get_comments_number($post_id);
    if($comments_number == 0) {
        $comment_text = esc_html__('0 comment', 'filix');
    }elseif($comments_number == 1) {
        $comment_text = esc_html__('1 comment', 'filix');
    }elseif($comments_number > 1) {
        $comment_text = $comments_number.esc_html__(' Comments', 'filix');
    }
    echo esc_html($comment_text);
}

// Error page search form
function filix_error_search_form( $is_button = true ) {
    ?>
    <div class="appart-search">
        <form class="form-wrapper" action="<?php echo esc_url(home_url('/')); ?>" _lpchecked="1">
            <input type="text" id="search" placeholder="<?php esc_attr_e('Search ...', 'filix'); ?>" name="s">
            <button type="submit" class="btn"><i class="fa fa-search"></i></button>
        </form>
        <?php if( $is_button == true ) { ?>
            <a href="<?php echo esc_url(home_url('/')); ?>" class="home_btn">
                <?php esc_html_e( 'Homepage', 'filix' ); ?>
            </a>
        <?php } ?>
    </div>
    <?php
}

// Pagination
function filix_pagination() {
    global $wp_query;
    if ( $wp_query->max_num_pages <= 1 ) return;
    $big = 999999999; // need an unlikely integer
    $pages = paginate_links( array(
        'base' => str_replace( $big, '%#%', esc_url( get_pagenum_link( $big ) ) ),
        'format' => '?paged=%#%',
        'current' => max( 1, get_query_var('paged') ),
        'total' => $wp_query->max_num_pages,
        'type'  => 'array',
        'prev_text' => '<i class="arrow_left"></i>',
        'next_text' => '<i class="arrow_right"></i>',
    ) );
    if( is_array( $pages ) ) {
        $paged = ( get_query_var('paged') == 0 ) ? 1 : get_query_var('paged');
        echo '<ul class="pagination text-center">';
        foreach ( $pages as $page ) {
            echo "<li>$page</li>";
        }
        echo '</ul>';
    }
}

// Get page template ID
function filix_get_page_template_id( $template = 'page-job-apply-form.php' ) {
    $pages = get_pages(array(
        'meta_key' => '_wp_page_template',
        'meta_value' => $template
    ));
    foreach($pages as $page){
        $page_id = $page->ID;
    }
    return $page_id;
}

// Color Picker Issue solution
if( is_admin() ){
    add_action( 'wp_default_scripts', 'filix_default_custom_scripts' );
    function filix_default_custom_scripts( $scripts ) {
        $scripts->add( 'wp-color-picker', "/wp-admin/js/color-picker.js", array( 'iris' ), false, 1 );
        did_action( 'init' ) && $scripts->localize(
            'wp-color-picker',
            'wpColorPickerL10n',
            array(
                'clear'            => esc_html__( 'Clear', 'filix' ),
                'clearAriaLabel'   => esc_html__( 'Clear color', 'filix' ),
                'defaultString'    => esc_html__( 'Default', 'filix' ),
                'defaultAriaLabel' => esc_html__( 'Select default color', 'filix' ),
                'pick'             => esc_html__( 'Select Color', 'filix' ),
                'defaultLabel'     => esc_html__( 'Color value', 'filix' ),
            )
        );
    }
}