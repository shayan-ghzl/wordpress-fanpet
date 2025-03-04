<?php
function initial_things()
{
    load_theme_textdomain('fanpet', get_template_directory() . '/languages');

    add_post_type_support('page', 'page-attributes');
    add_theme_support('woocommerce');
    add_theme_support('title-tag');
    add_theme_support('post-thumbnails');
    add_theme_support('html5', array('comment-list', 'comment-form', 'search-form', 'gallery', 'caption', 'style', 'script'));
    add_theme_support('custom-logo', array('flex-height' => true, 'flex-width' => true, 'height' => 64, 'width' => 0));
    add_theme_support('post-formats', array('aside', 'gallery', 'link',  'image', 'quote', 'status', 'video', 'audio', 'chat'));

    register_nav_menus(array(
        'header-menu' => __('Header menu', 'fanpet'),
        'footer-menu' => __('Footer menu', 'fanpet'),
        'login-menu' => __('Login menu', 'fanpet'),
        'product-categories-menu' => __('Product Categories menu', 'fanpet'),
        'trending-products-top-menu' => __('Trending Products Top menu', 'fanpet'),
        'trending-products-bottom-menu' => __('Trending Products Bottom menu', 'fanpet'),
        'latest-blogs-menu' => __('Latest Blogs  menu', 'fanpet'),
    ));
}
add_action('after_setup_theme', 'initial_things');
// redirect to home page after logout
function fanpet_redirect_after_logout()
{
    wp_redirect(get_home_url());
    exit();
}
add_action('wp_logout', 'fanpet_redirect_after_logout');
// This theme doesn't have a traditional sidebar.
remove_action('woocommerce_sidebar', 'woocommerce_get_sidebar', 10);
// remove woocomerce breadcrumb
remove_action('woocommerce_before_main_content', 'woocommerce_breadcrumb', 20);
// add reset password form in the login page
add_action('fanpet_woocommerce_reset_password', function () {
    wc_get_template('myaccount/form-lost-password.php');
});