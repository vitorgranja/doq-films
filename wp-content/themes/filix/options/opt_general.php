<?php
Redux::setSection('filix_opt', array(
    'title'            => esc_html__( 'General Settings', 'filix' ),
    'id'               => 'general_opt',
    'icon'             => 'dashicons dashicons-admin-tools',
    'fields'           => array(

        array(
            'id'        => 'scrolltop_up',
            'type'      => 'switch',
            'title'     => esc_html__('Page Scroll Up Option', 'filix'),
            'subtitle'  => esc_html__('Page scroll bottom to up button.', 'filix'),
            'default'   => true,
            'on'        => esc_html__('Show', 'filix'),
            'off'       => esc_html__('Hide', 'filix'),
        ),

    )
));