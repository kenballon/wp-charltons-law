<?php

/**
 * Theme Functions
 * custom hooks and functions
 * clf = Charltons Law Firm
 */
function clf_enqueue_scripts()
{
    // REGISTER STYLES & SCRIPTS
    wp_register_style('tailwindcss', get_template_directory_uri() . '/assets/css/tailwind-output.css', [], filemtime(get_template_directory() . '/assets/css/tailwind-output.css'), 'all');
    wp_register_style('custom-css', get_template_directory_uri() . '/assets/css/custom-style.css', [], filemtime(get_template_directory() . '/assets/css/custom-style.css'), 'all');

    wp_enqueue_script('index-js', get_template_directory_uri() . '/assets/js/index.js', [], filemtime(get_template_directory() . '/assets/js/index.js'), true);

    // ENQUEUE STYLES & SCRIPTS
    wp_enqueue_style('tailwindcss');
    wp_enqueue_style('custom-css');
    wp_enqueue_script('index-js');
}

add_action('wp_enqueue_scripts', 'clf_enqueue_scripts');
