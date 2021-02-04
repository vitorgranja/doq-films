<?php
/**
 * The template for displaying comments
 *
 * This is the template that displays the area of the page that contains both the current comments
 * and the comment form.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package filix
 */

/*
 * If the current post is protected by a password and
 * the visitor has not yet entered the password we will
 * return early without loading the comments.
 */
if ( post_password_required() ) {
	return;
}

$filix_comment_count = get_comments_number();

?>
<?php if ($filix_comment_count >= 1): ?>
<div class="comment_reply wow fadeInUp">
        <div class="comment_text">
            <h2 class="comment-title"> <?php filix_comment_count(get_the_ID()) ?> </h2>
        </div>
        <div class="comment_reply_form">
            <ul class="comment-list">
                <?php
                the_comments_navigation();
                wp_list_comments( array(
                    'style'             => 'ul',
                    'callback'          => 'filix_comments_items',
                    'avatar_size'       => 70,
                    'end-callback'      => 'filix_comment_end'
                ));
                the_comments_navigation();
                ?>
            </ul>
        </div>
    </div>
 <?php  endif; ?>

    <div class="leave_comment wow fadeInUp">
        <div class="comment-respond">
                <?php
                $is_comment_row_start = (is_user_logged_in()) ? '<div class="row">' : '';
                $is_comment_row_end = (is_user_logged_in()) ? '</div>' : '';
                $commenter      = wp_get_current_commenter();
                $req            = get_option( 'require_name_email' );
                $aria_req       = ( $req ? " aria-required='true'" : '' );
                $fields =  array(
                    'author' => '<div class="row"> <div class="col-lg-6 col-md-6 col-sm-12 form-group wow fadeInUp" data-wow-delay="0.2s"> <input type="text" name="author"  class="form-control" id="name" value="'.esc_attr($commenter['comment_author']).'" placeholder="'.esc_attr__('Name *', 'filix').'" '.$aria_req.'> </div>',
                    'email' => '<div class="col-lg-6 col-md-6 col-sm-12 form-group wow fadeInUp" data-wow-delay="0.4s"> <input type="email" class="form-control" name="email" id="email" value="'.esc_attr($commenter['comment_author_email']).'" placeholder="'.esc_attr__('Email *', 'filix').'" '.$aria_req.'> </div> </div>',
                );
                $comments_args = array(
                    'class_form'            => 'contact_form',
                    'id_form'               => 'contactForm',
                    'fields'                => apply_filters( 'comment_form_default_fields', $fields ),
                    'title_reply_before'    => '<div class="comment_text"><h2 class="comment-title">',
                    'title_reply'           => esc_html__('Submit your comment', 'filix'),
                    'title_reply_after'     => '</h2></div>',
                    'comment_notes_before'  => !is_user_logged_in() ? '<div class="row">' : '',
                    'comment_notes_after'   => !is_user_logged_in() ? '</div>' : '',
                    'label_submit'          => esc_html__( 'Post a Comment', 'filix' ),
                    'class_submit'          => 'sibmit_btn',
                    'comment_field'         => $is_comment_row_start.'<div class="col-lg-12 col-md-12 col-sm-12 col-12 form-group wow fadeInUp" data-wow-delay="0.6s"><textarea class="form-control" name="comment" id="comment" placeholder="'.esc_attr__( 'Comment', 'filix' ).'"></textarea></div>'.$is_comment_row_end,
                );
                comment_form($comments_args);
                ?>
        </div>
    </div>
