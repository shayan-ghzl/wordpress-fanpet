<!DOCTYPE html>
<html <?php language_attributes() ?>>

<head>
    <meta charset="<?php bloginfo('charset') ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="<?php bloginfo('description') ?>">
    <meta name="keywords" content="HTML, CSS, JavaScript">
    <meta name="author" content="shayan ghazali - شایان غزالی">
    <title><?php bloginfo('name'); wp_title('|', true, 'left'); ?></title>
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.8/css/line.css">
    <?php wp_head() ?>
</head>

<body <?php body_class() ?>>
    <div id="page">
        <div id="site-content">

            <header class="site-header">
                <div class="inner-content">
                    <?php
                    the_custom_logo();

                    if (has_nav_menu('header-menu')) {
                        wp_nav_menu(array(
                            'theme_location' => 'header-menu',
                            'container'      => 'nav',
                            'fallback_cb'    => false
                        ));
                    }

                    get_template_part('template-parts/site-popups');
                    ?>
                </div>
            </header>
            