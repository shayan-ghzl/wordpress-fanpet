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
}
add_action('wp_enqueue_scripts', 'enqueue_style');
function enqueue_script()
{
    $suffix = false ? '.min' : '';
    $theme_ver = wp_get_theme()->get('Version');
    // -------------------------
    wp_enqueue_script('jquery');
    wp_enqueue_script('fanpet-layout-pages', get_template_directory_uri() . '/assets/js/fanpet-layout-pages' . $suffix . '.js', array('jquery'), $theme_ver, true);
}
add_action('wp_enqueue_scripts', 'enqueue_script');
