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
    <?php wp_body_open(); ?>
    <header>
        <div>header here</div>
    </header>