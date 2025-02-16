<?php
function initial_things()
{
    load_theme_textdomain('fanpet', get_template_directory() . '/languages');

    add_post_type_support('page', 'page-attributes');

    add_theme_support('title-tag');
    add_theme_support('post-thumbnails');
    add_theme_support('html5', array('comment-list', 'comment-form', 'search-form', 'gallery', 'caption', 'style', 'script'));
    add_theme_support('custom-logo', array('flex-height' => true, 'flex-width' => true, 'height' => 64, 'width' => 0));
    add_theme_support('post-formats', array('aside', 'gallery', 'link',  'image', 'quote', 'status', 'video', 'audio', 'chat'));
}
add_action('after_setup_theme', 'initial_things');
// --------------------------------
function register_menus()
{
    register_nav_menus(array(
        'header-menu' => __('Header menu', 'fanpet'),
        'footer-menu' => __('Footer menu', 'fanpet'),
        'login-menu' => __('Login menu', 'fanpet'),
    ));
}
add_action('after_setup_theme', 'register_menus');
// --------------------------------
// redirect to home page after logout
function fanpet_redirect_after_logout()
{
    wp_redirect(get_home_url());
    exit();
}
add_action('wp_logout', 'fanpet_redirect_after_logout');
