<?php

Redux::setSection('filix_opt', array(
    'title'            => esc_html__( 'Footer Setting', 'filix' ),
    'id'               => 'footer_options',
    'customizer_width' => '400px',
    'icon'             => 'dashicons dashicons-arrow-down-alt2',
    'fields'           => array(

        array(
            'id'        => 'is_footer',
            'type'      => 'switch',
            'title'     => esc_html__('Footer Visibility', 'filix'),
            'subtitle'  => esc_html__('Show/Hide the Footer.', 'filix'),
            'default'   => '',
            'on'        => esc_html__('Show', 'filix'),
            'off'       => esc_html__('Hide', 'filix'),
        ),

        array(
            'title'     => esc_html__('Footer Heading Title', 'filix'),
            'subtitle'  => esc_html__( 'Type your footer message here.', 'filix' ),
            'id'        => 'footer_heading',
            'type'      => 'editor',
            'args'   => array(
                'teeny'            => true,
                'textarea_rows'    => 4
            ),
            'required' => array('is_footer', '=', '1')
        ),

        array(
            'title'     => esc_html__( 'Copyright Text', 'filix' ),
            'subtitle'  => esc_html__( 'Type your footer copyright info here.', 'filix' ),
            'id'        => 'footer_copyright',
            'type'      => 'editor',
            'default'  => esc_html__( 'Copyright 2019 DroitThemes |  All rights reserved', 'filix' ),
            'args'   => array(
                'teeny'         => true,
                'textarea_rows' => 4
            ),
            'required' => array('is_footer', '=', '1')
        ),

        array(
            'id'    => 'bottom_email_address',
            'type'  => 'text',
            'title' => esc_html__( 'Email Address', 'filix' ),
            'required'  => array('is_footer', '=', '1')
        ),

        array(
            'id'    => 'bottom_phone_number',
            'type'  => 'text',
            'title' => esc_html__( 'Phone Number', 'filix' ),
            'required'  => array('is_footer', '=', '1')
        ),

        array(
            'title'     => esc_html__('Footer Background Image', 'filix'),
            'subtitle'  => esc_html__( 'Upload your footer background image.', 'filix' ),
            'id'        => 'footer_bg',
            'type'      => 'media',
            'default'   => array(
                'url'   => FILIX_DIR_IMG.'/footer_bg.jpg'
            ),
            'required' => array('is_footer', '=', '1')
        ),

        array(
            'title'     => esc_html__( 'Background Color', 'filix' ),
            'id'        => 'footer_bg_color',
            'output'    => 'header.header .sub_footer',
            'type'      => 'color',
            'mode'      => 'background',
            'required'  => array('is_footer', '=', '1')
        ),


    )
));

// Footer Colors
Redux::setSection('filix_opt', array(
    'title'     => esc_html__('Font colors', 'filix'),
    'id'        => 'filix_footer_font_colors',
    'icon'      => 'dashicons dashicons-admin-appearance',
    'subsection'=> true,
    'fields'    => array(
        array(
            'title'     => esc_html__('Widget Title Color', 'filix'),
            'id'        => 'widget_title_color',
            'type'      => 'color',
            'output'    => array('.footer .footer_content .footer_title')
        ),

        array(
            'title'     => esc_html__('Widget Content color', 'filix'),
            'id'        => 'widget_content_color',
            'type'      => 'color',
            'output'    => array('.footer .footer_contact li a')
        ),
    )
));

// Footer Typography
Redux::setSection('filix_opt', array(
    'title'     => esc_html__('Typography', 'filix'),
    'id'        => 'filix_footer_typography',
    'icon'      => 'dashicons dashicons-editor-textcolor',
    'subsection'=> true,
    'fields'    => array(
        array(
            'title'         => esc_html__('Widget Title', 'filix'),
            'id'            => 'footer_title_typo',
            'type'          => 'typography',
            'color'         => false,
            'output'        => '.footer .footer_content .footer_title',
        ),
        array(
            'title'         => esc_html__('Widget Contents', 'filix'),
            'id'            => 'footer_content_typo',
            'type'          => 'typography',
            'color'         => false,
            'output'        => '.footer .footer_contact li a',
        ),
    )
));
