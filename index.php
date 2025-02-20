<?php get_header() ?>

<?php get_template_part('template-parts/hero-section') ?>

<?php get_template_part('template-parts/features-section') ?>

<?php get_template_part('template-parts/trending-products-section', null, array('menu_name' => 'trending-products-top-menu', 'title' => 'محصولات پرفروش')); ?>

<?php get_template_part('template-parts/trending-products-section', null, array('menu_name' => 'trending-products-bottom-menu', 'title' => 'محصولات پرفروش')); ?>

<?php get_template_part('template-parts/latest-posts-section') ?>

<?php get_footer() ?>