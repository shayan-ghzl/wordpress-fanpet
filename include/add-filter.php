<?php
// disable woocommerce style
add_filter('woocommerce_enqueue_styles', '__return_empty_array');
// disable woocommerce flexslider for product gallery
add_filter('woocommerce_single_product_flexslider_enabled', '__return_false');
// disable woocommerce photoswipe for product gallery
add_filter( 'woocommerce_single_product_photoswipe_enabled', '__return_false' );
// disable woocommerce zoom for product gallery
add_filter( 'woocommerce_single_product_zoom_enabled', '__return_false' );
