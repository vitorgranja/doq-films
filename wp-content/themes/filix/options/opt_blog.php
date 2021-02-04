<?php 

Redux::setSection('filix_opt', array(
    'title'            => esc_html__( 'Blog', 'filix' ),
    'id'               => 'blog_options',
    'icon'             => ' dashicons dashicons-admin-post',
    'fields'           => array(
        array(
            'id'      => 'blog_title',
            'type'    => 'text',
            'title'   => esc_html__( 'Blog Page Title', 'filix' ),
            'default' => 'Blog',
        ),
        array(
            'id'      => 'blog_sub_title',
            'type'    => 'text',
            'title'   => esc_html__( 'Blog Page SubTitle', 'filix' ),
            'default' => 'read our latest posts',
        ),

    )
));


// blog Share Options
Redux::setSection('filix_opt', array(
    'title'     => esc_html__('Blog Social Share', 'filix'),
    'id'        => 'blog_share_opt',
    'subsection'=> true,
    'icon'      => 'dashicons dashicons-share',
    'fields'    => array(

        array(
            'id'       => 'share_options',
            'type'     => 'switch',
            'title'    => esc_html__('Share Options', 'filix'),
            'default'  => '',
            'on'       => esc_html__('Enable', 'filix'),
            'off'      => esc_html__('Disable', 'filix'),
        ),

        array(
            'id' => 'blog_share_start',
            'type' => 'section',
            'title' => __('Share Options', 'filix'),
            'subtitle' => __('Enable/Disable social media share options as you want.', 'filix'),
            'indent' => true,
            'required' => array('share_options','=','1'),
        ),

        array(
            'id'       => 'share_title',
            'type'     => 'text',
            'title'    => esc_html__('Title', 'filix'),
            'default'  => esc_html__('Share on', 'filix'),
        ),
        array(
            'id'       => 'is_post_fb',
            'type'     => 'switch',
            'title'    => esc_html__('Facebook', 'filix'),
            'default'  => true,
            'on'       => esc_html__('Show', 'filix'),
            'off'      => esc_html__('Hide', 'filix'),
        ),
        array(
            'id'       => 'is_post_twitter',
            'type'     => 'switch',
            'title'    => esc_html__('Twitter', 'filix'),
            'default'  => true,
            'on'       => esc_html__('Show', 'filix'),
            'off'      => esc_html__('Hide', 'filix'),
        ),
        array(
            'id'       => 'is_post_pinterest',
            'type'     => 'switch',
            'title'    => esc_html__('Pinterest', 'filix'),
            'default'  => true,
            'on'       => esc_html__('Show', 'filix'),
            'off'      => esc_html__('Hide', 'filix'),
        ),
        array(
            'id'       => 'is_post_linkedin',
            'type'     => 'switch',
            'title'    => esc_html__('Linkedin', 'filix'),
            'on'       => esc_html__('Show', 'filix'),
            'off'      => esc_html__('Hide', 'filix'),
        ),
        array(
            'id'     => 'post_share_end',
            'type'   => 'section',
            'indent' => false,
        ),
    )
));


