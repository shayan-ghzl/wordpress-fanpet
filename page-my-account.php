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
} else {
    get_header();
}

while (have_posts()) {
    the_post();
    the_content();
}

if (!is_user_logged_in()) {
    get_footer('login');
} else {
    get_footer();
}