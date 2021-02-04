<?php
Redux::setSection('filix_opt', array(
	'title'            => esc_html__( 'Header Settings', 'filix' ),
    'id'               => 'header_options',
    'customizer_width' => '400px',
    'icon'             => 'dashicons dashicons-arrow-up-alt2',
));

// Logo
Redux::setSection('filix_opt', array(
    'title'            => esc_html__( 'Header Content', 'filix' ),
    'id'               => 'header_content_opt',
    'subsection'       => true,
    'icon'             => '',
    'fields'           => array(
        array(
            'title'     => esc_html__('Header Style', 'filix'),
            'id'        => 'header_style',
            'type'      => 'image_select',
            'default'   => '1',
            'options'   => array(
                '1' => array(
                    'alt' => esc_html__('Header Style 01', 'filix'),
                    'img' => FILIX_DIR_IMG.'/header/header-2.png',
                ),
                '2' => array(
                    'alt' => esc_html__('Header Style 02', 'filix'),
                    'img' => FILIX_DIR_IMG.'/header/header-1.png',
                ),
            )
        ),
    )
));

// Logo
Redux::setSection('filix_opt', array(
    'title'            => esc_html__( 'Logo', 'filix' ),
    'id'               => 'logo_setting',
    'subsection'       => true,
    'icon'             => '',
    'fields'           => array(
        array (
            'title'     => esc_html__( 'Select Your Logo Type', 'filix' ),
            'subtitle'  => esc_html__( 'Which type logo you want for your site?', 'filix' ),
            'id'        => 'logo_select',
            'type'      => 'select',
            'options'   => array (
                '1'  => __( 'Text', 'filix' ),
                '2' => __( 'Image', 'filix' )
            ),
            'default'  => '1',
        ),

        array (
            'title'     => esc_html__( 'Text Logo', 'filix'),
            'subtitle'  => esc_html__( 'Type your logo text , it is a text logo.', 'filix' ),
            'id'        => 'main_text_logo',
            'type'      => 'text',
            'default'   => 'Filix',
            'required'  => array('logo_select', '=', '1')
        ),

        array(
            'id'        => 'is_logo_slash',
            'type'      => 'switch',
            'title'     => esc_html__( 'Before Slash', 'filix'),
            'on'        => esc_html__( 'Show', 'filix'),
            'off'       => esc_html__( 'Hide', 'filix'),
            'default'   => true,
            'required'  => array('logo_select', '=', '1')
        ),

        array(
            'id'          => 'slash_color',
            'type'        => 'color',
            'title'       => esc_html__( 'Slash Color', 'filix' ),
            'output'      => 'header.header .navbar .logo .logo_text:before',
            'required'  => array('is_logo_slash', '=', '1')
        ),

        array(
            'id'        => 'logo_typo',
            'type'      => 'typography',
            'title'     => esc_html__( 'Logo Typography', 'filix'),
            'output'    => 'header.header .navbar .logo .logo_text'
        ),

        array (
            'title'     => esc_html__( 'Upload logo', 'filix' ),
            'subtitle'  => esc_html__( 'Upload here a image file for your logo', 'filix' ),
            'id'        => 'main_logo',
            'type'      => 'media',
            'required'  => array ('logo_select', '=', '2'),
        ),
        array (
            'title'     => esc_html__( 'Sticky Upload logo', 'filix' ),
            'subtitle'  => esc_html__( 'Upload here a image file for your logo', 'filix' ),
            'id'        => 'sticky_main_logo',
            'type'      => 'media',
            'required'  => array ('logo_select', '=', '2'),
        ),
        array (
            'title'     => esc_html__( 'Logo dimensions', 'filix' ),
            'subtitle'  => esc_html__( 'Set a custom height width for your upload logo.', 'filix' ),
            'id'        => 'logo_dimensions',
            'type'      => 'dimensions',
            'units'     => array ('em','px','%'),
            'output'    => '.navbar-brand > img',
            'required'  => array ('logo_select', '=', '2'),
        ),

    )
));


// Header Styling
Redux::setSection( 'filix_opt', array(
    'title'            => esc_html__( 'Header Styling', 'filix' ),
    'id'               => 'header_styling_sec',
    'customizer_width' => '400px',
    'icon'             => '',
    'subsection'       => true,
    'fields'           => array(
        array(
            'id'        => 'header_bg_color',
            'type'      => 'color',
            'title'     => esc_html__( 'Header Background', 'filix' ),
            'subtitle'  => esc_html__( 'Header background color', 'filix' ),
            'mode'      => 'background',
            'output'    => "header.header.header_style_one"
        ),

        array(
            'id'        => 'header_sticky_bg_color',
            'type'      => 'color',
            'title'     => esc_html__( 'Header Sticky Background', 'filix' ),
            'subtitle'  => esc_html__( 'Background color on Header sticky mode', 'filix' ),
            'mode'      => 'background',
            'output'    => "header.header.header_style_one.fixedMenu"
        ),
    )
));


// Title-bar
Redux::setSection('filix_opt', array(
    'title'            => esc_html__( 'Title-bar', 'filix' ),
    'id'               => 'title_bar_opt',
    'subsection'       => true,
    'icon'             => '',
    'fields'           => array(
        array(
            'title'     => esc_html__( 'Background Image', 'filix' ),
            'subtitle'  => esc_html__( 'Upload here the default background image', 'filix' ),
            'id'        => 'banner_bg',
            'type'      => 'media',
            'compiler'  => true,
            'default'   => array(
                'url'   => FILIX_DIR_IMG.'/contact_bg.jpg'
            ),
        ),

        array(
            'id'        => 'titlebar_title_typo',
            'type'      => 'typography',
            'title'     => esc_html__( 'Title Typography', 'filix'),
            'output'    => '.hero_warp .banner_content .banner_title'
        ),

        array(
            'title'     => esc_html__('Overlay Color', 'filix'),
            'id'        => 'banner_overlay_color',
            'type'      => 'color_rgba',
            'output'    => '.hero_warp:before',
            'mode'      => 'background'
        ),

        array(
            'title'     => esc_html__('Title-bar padding', 'filix'),
            'subtitle'  => esc_html__('Padding around the Title-bar. The default padding is 200px 0px 120px 0px', 'filix'),
            'id'        => 'title_bar_padding',
            'type'      => 'spacing',
            'output'    => array( '.hero_warp.inner_banner' ),
            'mode'      => 'padding',
            'units'     => array( 'em', 'px', '%' ),      // You can specify a unit value. Possible: px, em, %
            'units_extended' => 'true',
        ),

        array(
            'id'       => 'titlebar_align',
            'type'     => 'button_set',
            'title'    => esc_html__('Alignment', 'filix'),
            'options' => array(
                'left' => esc_html__('Left', 'filix'),
                'center' => esc_html__('Center', 'filix'),
                'right' => esc_html__('Right', 'filix')
            ),
            'default' => 'center'
        ),

        array(
            'id'        => 'is_social_share',
            'type'      => 'switch',
            'title'     => esc_html__( 'Social Share', 'filix' ),
            'subtitle'  => esc_html__( 'Show/hide the social share options', 'filix' ),
            'on'        => esc_html__( 'Show', 'filix' ),
            'off'       => esc_html__( 'Hide', 'filix' ),
            'default'   => '',
        ),
    )
));

// Action button
Redux::setSection('filix_opt', array(
    'title'            => esc_html__( 'Action Button', 'filix' ),
    'id'               => 'menu_action_btn_opt',
    'subsection'       => true,
    'icon'             => '',
    'fields'           => array(
        array(
            'title'     => esc_html__('Button Visibility', 'filix'),
            'id'        => 'is_menu_btn',
            'type'      => 'switch',
            'on'        => esc_html__('Show', 'filix'),
            'off'       => esc_html__('Hide', 'filix'),
        ),

        array(
            'title'     => esc_html__('Button label', 'filix'),
            'subtitle'  => esc_html__('Leave the button label field empty to hide the menu action button.', 'filix'),
            'id'        => 'menu_btn_label',
            'type'      => 'text',
            'default'   => esc_html__('Get Started', 'filix'),
            'required'  => array('is_menu_btn', '=', '1')
        ),

        array(
            'title'     => esc_html__('Button URL', 'filix'),
            'id'        => 'menu_btn_url',
            'type'      => 'text',
            'required'  => array('is_menu_btn', '=', '1')
        ),

        array(
            'title'     => esc_html__('Button Typography', 'filix'),
            'id'        => 'menu_btn_size',
            'type'      => 'typography',
            'color'     => false,
            'required'  => array('is_menu_btn', '=', '1'),
            'output'    => array('header.header.header_style_one .navbar .header_menu a.filix_action_btn'),
        ),


        /**
         * Button colors
         * Style will apply on the Non sticky mode and sticky mode of the header
         */
        array(
            'title'     => esc_html__('Button Colors', 'filix'),
            'subtitle'  => esc_html__('Button style attributes on normal (non sticky) mode.', 'filix'),
            'id'        => 'button_colors',
            'type'      => 'section',
            'indent'    => true,
            'required'  => array('is_menu_btn', '=', '1'),
        ),

        array(
            'title'     => esc_html__('Font color', 'filix'),
            'id'        => 'menu_btn_font_color',
            'type'      => 'color',
            'output'    => array('header.header.header_style_one .navbar .header_menu .filix_action_btn'),
        ),

        array(
            'title'     => esc_html__('Border Color', 'filix'),
            'id'        => 'menu_btn_border_color',
            'type'      => 'color',
            'mode'      => 'border-color',
            'output'    => array('header.header.header_style_one .navbar .header_menu .filix_action_btn'),
        ),

        array(
            'title'     => esc_html__('Background Color', 'filix'),
            'id'        => 'menu_btn_bg_color',
            'type'      => 'color',
            'mode'      => 'background',
            'output'    => array('header.header.header_style_one .navbar .header_menu .filix_action_btn'),
        ),

        // Button color on hover stats
        array(
            'title'     => esc_html__('Hover Font Color', 'filix'),
            'subtitle'  => esc_html__('Font color on hover stats.', 'filix'),
            'id'        => 'menu_btn_hover_font_color',
            'type'      => 'color',
            'output'    => array('header.header.header_style_one .navbar .header_menu .filix_action_btn:hover'),
        ),
        array(
            'title'     => esc_html__('Hover Border Color', 'filix'),
            'id'        => 'menu_btn_hover_border_color',
            'type'      => 'color',
            'mode'      => 'border-color',
            'output'    => array('header.header.header_style_one .navbar .header_menu .filix_action_btn:hover'),
        ),
        array(
            'title'     => esc_html__('Hover background color', 'filix'),
            'subtitle'  => esc_html__('Background color on hover stats.', 'filix'),
            'id'        => 'menu_btn_hover_bg_color',
            'type'      => 'color',
            'output'    => array(
                'background' => 'header.header.header_style_one .navbar .header_menu .filix_action_btn:hover',
            ),
        ),
        array(
            'id'     => 'button_colors-end',
            'type'   => 'section',
            'indent' => false,
        ),

        /*
         * Button colors on sticky mode
         */
        array(
            'title'     => esc_html__('Sticky Button Style', 'filix'),
            'subtitle'  => esc_html__('Button colors on sticky mode.', 'filix'),
            'id'        => 'button_colors_sticky',
            'type'      => 'section',
            'indent'    => true,
            'required'  => array('is_menu_btn', '=', '1'),
        ),
        array(
            'title'     => esc_html__('Border color', 'filix'),
            'id'        => 'menu_btn_border_color_sticky',
            'type'      => 'color',
            'mode'      => 'border-color',
            'output'    => array('header.header.header_style_one.fixedMenu .navbar .header_menu .filix_action_btn'),
        ),
        array(
            'title'     => esc_html__('Font color', 'filix'),
            'id'        => 'menu_btn_font_color_sticky',
            'type'      => 'color',
            'output'    => array('header.header.header_style_one.fixedMenu .navbar .header_menu .filix_action_btn'),
        ),
        array(
            'title'     => esc_html__('Background color', 'filix'),
            'id'        => 'menu_btn_bg_color_sticky',
            'type'      => 'color',
            'mode'      => 'background',
            'output'    => array('header.header.header_style_one.fixedMenu .navbar .header_menu .filix_action_btn'),
        ),

        // Button color on hover stats
        array(
            'title'     => esc_html__('Hover font color', 'filix'),
            'subtitle'  => esc_html__('Font color on hover stats.', 'filix'),
            'id'        => 'menu_btn_hover_font_color_sticky',
            'type'      => 'color',
            'output'    => array('header.header.header_style_one.fixedMenu .navbar .header_menu .filix_action_btn:hover'),
        ),
        array(
            'title'     => esc_html__('Hover background color', 'filix'),
            'subtitle'  => esc_html__('Background color on hover stats.', 'filix'),
            'id'        => 'menu_btn_hover_bg_color_sticky',
            'type'      => 'color',
            'output'    => array(
                'background' => 'header.header.header_style_one.fixedMenu .navbar .header_menu .filix_action_btn:hover',
            ),
        ),
        array(
            'title'     => esc_html__('Hover border color', 'filix'),
            'subtitle'  => esc_html__('Background color on hover stats.', 'filix'),
            'id'        => 'menu_btn_hover_border_color_sticky',
            'type'      => 'color',
            'output'    => array(
                'border-color' => 'header.header.header_style_one.fixedMenu .navbar .header_menu .filix_action_btn:hover',
            ),
        ),

        array(
            'id'     => 'button_colors-sticky-end',
            'type'   => 'section',
            'indent' => false,
        ),

        array(
            'title'     => esc_html__('Button padding', 'filix'),
            'subtitle'  => esc_html__('Padding around the menu action button.', 'filix'),
            'id'        => 'menu_btn_padding',
            'type'      => 'spacing',
            'output'    => array( 'header.header.header_style_one.fixedMenu .navbar .header_menu .filix_action_btn' ),
            'mode'      => 'padding',
            'units'     => array( 'em', 'px', '%' ),      // You can specify a unit value. Possible: px, em, %
            'units_extended' => 'true',
            'required'  => array('is_menu_btn', '=', '1')
        ),
    )
));
