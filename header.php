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
    <header class="py-8">
        <div class="container flex space-between">
            <div class="logo-wrapper">
                Logo Here
            </div>
            <nav class="nav-wrapper flex gap-1">
                <a href="#">Home</a>
                <a href="#">About</a>
                <a href="#">Contact Us</a>
            </nav>
        </div>
    </header>