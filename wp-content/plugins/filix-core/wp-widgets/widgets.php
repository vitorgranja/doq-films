<?php

// Require widget files
require plugin_dir_path(__FILE__) . 'Filix_Recent_Posts.php';
require plugin_dir_path(__FILE__) . 'Filix_author_box.php';

// Register Widgets
add_action('widgets_init', function() {
    register_widget('Filix_Recent_Posts');
    register_widget('Filix_author_box');
});
