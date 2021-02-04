<?php

// Navbar styling
Redux::setSection('filix_opt', array(
    'title'            => esc_html__( 'Menu Settings', 'filix' ),
    'id'               => 'menu_opt',
    'icon'             => 'el el-lines',
    'fields'           => array(

        array(
            'id'            => 'menu_typo',
            'type'          => 'typography',
            'title'         => esc_html__( 'Menu Typography', 'filix'),
            'subtitle'      => esc_html__( 'Menu item typography options', 'filix'),
            'color'         => false,
            'output'        => array( '
                            header.header .opnen_menu .header_main_menu .menu_item li a,
                            header.header.header_style_one .navbar .header_menu ul li.nav-item a.nav-link
                            '
            ),
        ),

        array(
            'id'            => 'submenu_typo',
            'type'          => 'typography',
            'title'         => esc_html__( 'Submenu Typography', 'filix'),
            'subtitle'      => esc_html__( 'Typography options for the submenu items.', 'filix'),
            'output'        => array ( '
                                header.header .opnen_menu .header_main_menu .menu_item li.submenu .submenu_item li a,
                                header.header.header_style_one .navbar .header_menu ul li.nav-item .dropdown-menu li a
                                '
            ),
        ),
        
        array(
            'title'     => esc_html__('Menu item margin', 'filix'),
            'subtitle'  => esc_html__('Margin around the menu items.', 'filix'),
            'id'        => 'menu_item_margin',
            'type'      => 'spacing',
            'mode'      => 'margin',
            'units'     => array( 'em', 'px', '%' ),      // You can specify a unit value. Possible: px, em, %
            'units_extended' => 'true',
            'output'    => array( '
                            header.header .opnen_menu .header_main_menu .menu_item li, 
                            header.header.header_style_one .navbar .header_menu ul li.nav-item
                            '
            ),
        ),

        // Normal menu settings section
        array(
            'id' => 'normal_menu_start',
            'type' => 'section',
            'title' => esc_html__( 'Normal menu settings', 'filix' ),
            'subtitle' => esc_html__( 'The following settings will only apply on the Normal header mode.', 'filix' ),
            'indent' => true
        ),
        array(
            'title'         => esc_html__( 'Regular Color', 'filix' ),
            'subtitle'      => esc_html__( 'Menu item font color', 'filix' ),
            'id'            => 'menu_item_regular_color',
            'type'          => 'color',
            'output'        => array (
                'color'      => 'header.header.header_style_one .navbar .header_menu ul li.nav-item a.nav-link',
            ),
        ),

        array(
            'title'         => esc_html__( 'Hover Color', 'filix' ),
            'subtitle'      => esc_html__( 'Menu item font color', 'filix' ),
            'id'            => 'menu_item_hover_color',
            'type'          => 'color',
            'output'        => array (
                'color'      => 'header.header.header_style_one .navbar .header_menu ul li.nav-item:hover a.nav-link',
            ),
        ),

        array(
            'title'         => esc_html__( 'Active Color', 'filix' ),
            'subtitle'      => esc_html__( 'Menu item font color', 'filix' ),
            'id'            => 'menu_item_active_color',
            'type'          => 'color',
            'output'        => array (
                'color'      => 'header.header.header_style_one .navbar .header_menu ul li.nav-item.active a.nav-link',
            ),
        ),

        array(
            'id'     => 'normal_menu_end',
            'type'   => 'section',
            'indent' => false,
        ),
        
        // Sticky menu settings section
        array(
            'id' => 'sticky_menu_start',
            'type' => 'section',
            'title' => esc_html__( 'Sticky menu settings', 'filix' ),
            'subtitle' => esc_html__( 'The following settings will only apply on the sticky header mode.', 'filix' ),
            'indent' => true
        ),

        array(
            'title'         => esc_html__( 'Regular Color', 'filix' ),
            'subtitle'      => esc_html__( 'Menu item font color', 'filix' ),
            'id'            => 'sticky_menu_item_regular_color',
            'type'          => 'color',
            'output'        => array (
                'color'      => 'header.header.header_style_one.fixedMenu .navbar .header_menu ul li.nav-item a.nav-link',
            ),
        ),

        array(
            'title'         => esc_html__( 'Hover Color', 'filix' ),
            'subtitle'      => esc_html__( 'Menu item font color', 'filix' ),
            'id'            => 'sticky_menu_item_hover_color',
            'type'          => 'color',
            'output'        => array (
                'color'      => 'header.header.header_style_one.fixedMenu .navbar .header_menu ul li.nav-item:hover a.nav-link',
            ),
        ),

        array(
            'title'         => esc_html__( 'Active Color', 'filix' ),
            'subtitle'      => esc_html__( 'Menu item font color', 'filix' ),
            'id'            => 'sticky_menu_item_active_color',
            'type'          => 'color',
            'output'        => array (
                'color'      => 'header.header.header_style_one.fixedMenu .navbar .header_menu ul li.nav-item.active a.nav-link',
            ),
        ),

        array(
            'id'     => 'sticky_menu_end',
            'type'   => 'section',
            'indent' => false,
        ),
    )
));