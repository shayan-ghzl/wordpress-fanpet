<?php
function enqueue_style()
{
    $suffix = false ? '.min' : '';
    $theme_ver = wp_get_theme()->get('Version');
    // -------------------------
    wp_register_style('fanpet-style', get_template_directory_uri() . '/assets/css/style' . $suffix . '.css', array(), $theme_ver, 'all');
    wp_enqueue_style('fanpet-style');

    $inline_styles = include get_template_directory() . '/include/inline-css.php';
    wp_add_inline_style('fanpet-style', $inline_styles);

    if (is_front_page()) {
        wp_enqueue_style('fanpet-swiper-css', 'https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css', array(), null);
    }

    if (is_product()) {
        wp_register_style('xzoom-style', get_template_directory_uri() . '/assets/css/xzoom.min.css', array(), $theme_ver, 'all');
        wp_enqueue_style('xzoom-style');
    }
}
add_action('wp_enqueue_scripts', 'enqueue_style');
function enqueue_script()
{
    $suffix = false ? '.min' : '';
    $theme_ver = wp_get_theme()->get('Version');
    // -------------------------
    wp_enqueue_script('jquery');
    wp_enqueue_script('fanpet-layout-pages', get_template_directory_uri() . '/assets/js/fanpet-layout-pages' . $suffix . '.js', array('jquery'), $theme_ver, true);

    if (is_front_page()) {
        wp_enqueue_script('fanpet-swiper-js', 'https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js', array(), null, true);
    }

    if (is_product()) {
        wp_register_script('xzoom-script', get_template_directory_uri() . '/assets/js/xzoom.min.js', array('jquery'), $theme_ver, true);
        wp_enqueue_script('xzoom-script');
        wp_register_script('fanpet-single-product-functions', get_template_directory_uri() . '/assets/js/single-product-functions' . $suffix . '.js', array('jquery', 'xzoom-script'), $theme_ver, true);
        wp_enqueue_script('fanpet-single-product-functions');
    }
}
add_action('wp_enqueue_scripts', 'enqueue_script');
