<?php
Redux::setSection('filix_opt', array(
    'title'            => esc_html__( 'Job Settings', 'filix' ),
    'id'               => 'job_opt',
    'icon'             => 'dashicons dashicons-clipboard',
    'fields'           => array(
        array(
            'title'     => esc_html__('Apply Form Shortcode', 'filix'),
            'subtitle'  => __('Get the Job Apply form template from <a href="https://is.gd/N6sJVo" target="_blank">here.</a>', 'filix'),
            'id'        => 'apply_form_shortcode',
            'type'      => 'text',
        ),
        array(
            'title'     => esc_html__('Apply Button Title', 'filix'),
            'id'        => 'apply_btn_title',
            'type'      => 'text',
            'default'   => esc_html__('Apply Now', 'filix')
        ),
        array(
            'title'     => esc_html__('Before Apply Form', 'filix'),
            'subtitle'  => esc_html__('Place contents to show before the Apply Form', 'filix'),
            'id'        => 'before_form',
            'type'      => 'editor',
            'args'    => array(
                'wpautop'       => true,
                'media_buttons' => false,
                'textarea_rows' => 10,
                //'tabindex' => 1,
                //'editor_css' => '',
                'teeny'         => false,
                //'tinymce' => array(),
                'quicktags'     => false,
            )
        ),
    )
));