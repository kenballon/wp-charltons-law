<?php

/**
 * Theme Functions
 * custom hooks and functions
 * clf = Charltons Law Firm
 */
function clf_enqueue_scripts()
{
    // REGISTER STYLES & SCRIPTS
    wp_register_style('index-core-style', get_template_directory_uri() . '/assets/css/index.css', [], filemtime(get_template_directory() . '/assets/css/index.css'), 'all');

    wp_enqueue_script('index-js', get_template_directory_uri() . '/assets/js/index.js', [], filemtime(get_template_directory() . '/assets/js/index.js'), true);

    // ENQUEUE STYLES & SCRIPTS
    wp_enqueue_style('index-core-style');
    wp_enqueue_script('index-js');
}

add_action('wp_enqueue_scripts', 'clf_enqueue_scripts');
