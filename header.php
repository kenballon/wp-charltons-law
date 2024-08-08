<?php

/**
 * Header Template
 * @package charltons law firm
 */
?>

<!DOCTYPE html>
<html lang="<?= language_attributes() ?>">

<head>
    <meta charset="<?= bloginfo('charset') ?>">
    <meta name="description" content="<?= bloginfo('description') ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
    <?php
        if (function_exists('wp_body_open')) {
            wp_body_open();
        }
    ?>
    <header class="p-5 md:p-8 bg-gray-900 text-gray-50">
        <div class="container mx-auto flex justify-between">
            <div class="logo-wrapper uppercase font-medium tracking-wider">
                Logo Here
            </div>
            <?php
                wp_nav_menu([
                    'theme_location' => 'primary-menu',
                    'container' => '',
                    'fallback_cb' => '',
                    'echo' =>
                        false, 'items_wrap' => '%3$s'
                ]);
            ?>
            <nav class="nav-wrapper flex gap-2">
                <a href="#">Home</a>
                <a href="#">About</a>
                <a href="#">Contact Us</a>
            </nav>
        </div>
    </header>