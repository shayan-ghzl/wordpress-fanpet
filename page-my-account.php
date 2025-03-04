<?php
if (!defined('ABSPATH')) {
    exit;
}

if (isset($_GET['action']) && $_GET['action'] === 'lostpassword') {
    wp_redirect(home_url());
    exit;
}

if (!is_user_logged_in()) {
    get_header('login');

    echo '<section class="login-page">';
    the_custom_logo();

    while (have_posts()) {
        the_post();
        the_content();
    }

    if (has_nav_menu('login-menu')) {
        wp_nav_menu(array(
            'theme_location' => 'login-menu',
            'container'      => 'nav',
            'fallback_cb'    => false
        ));
    }
    echo '</section>';

    get_footer('login');
} else {
    get_header();

    echo '<section class="my-account-page">';
    while (have_posts()) {
        the_post();
        the_content();
    }
    echo '</section>';

    get_footer();
}