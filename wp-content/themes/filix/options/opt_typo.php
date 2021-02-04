<?php

Redux::setSection('filix_opt', array(
    'title'            => esc_html__( 'Typography Settings', 'filix' ),
    'id'               => 'filix_typo_opt',
    'icon'             => 'dashicons dashicons-editor-textcolor',
    'fields'           => array(

        array(
            'id'        => 'typo_note',
            'type'      => 'info',
            'style'     => 'success',
            'title'     => esc_html__( 'Important Note:', 'filix'),
            'icon'      => 'dashicons dashicons-info',
            'desc'      => esc_html__( 'This tab contains general typography options. Additional typography options for specific areas can be found within other tabs. Example: For menu typography options go to the Menu Settings tab.', 'filix')
        ),

        array(
            'id'        => 'body_typo',
            'type'      => 'typography',
            'title'     => esc_html__( 'Body Typography', 'filix'),
            'subtitle'  => esc_html__( 'These settings control the typography for all body text.', 'filix'),
            'output'    => 'body, .f_p'
        ),
    )
));
