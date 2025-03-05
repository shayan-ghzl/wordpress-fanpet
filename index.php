<?php get_header() ?>

<?php
$show_slider = (int) fanpet_get_theme_mod('show_slider_setting', 1);
if ($show_slider) {
    get_template_part('template-parts/hero-section');
}
?>

<?php
$show_feature = (int) fanpet_get_theme_mod('show_feature_setting', 1);
if ($show_feature) {
    get_template_part('template-parts/features-section');
}
?>

<?php get_template_part('template-parts/categories-section', null, array('menu_name' => 'product-categories-menu')); ?>

<?php get_template_part('template-parts/trending-products-section', null, array('menu_name' => 'trending-products-top-menu')); ?>

<?php get_template_part('template-parts/trending-products-section', null, array('menu_name' => 'trending-products-bottom-menu')); ?>

<?php get_template_part('template-parts/selected-blogs-section', null, array('menu_name' => 'latest-blogs-menu')) ?>

<?php get_footer() ?>