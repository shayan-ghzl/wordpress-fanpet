<?php get_header() ?>

<?php get_template_part('template-parts/hero-section') ?>

<?php get_template_part('template-parts/features-section') ?>

<?php get_template_part('template-parts/categories-section', null, array('menu_name' => 'product-categories-menu', 'title' => 'دسته بندی')); ?>

<?php get_template_part('template-parts/trending-products-section', null, array('menu_name' => 'trending-products-top-menu', 'title' => 'محصولات پرفروش')); ?>

<?php get_template_part('template-parts/trending-products-section', null, array('menu_name' => 'trending-products-bottom-menu', 'title' => 'محصولات پرفروش')); ?>

<?php get_template_part('template-parts/selected-blogs-section', null, array('menu_name' => 'latest-blogs-menu', 'title' => 'مقالات اخیر')) ?>

<?php get_footer() ?>