<?php
// disable woocommerce style
add_filter('woocommerce_enqueue_styles', '__return_empty_array');
// disable woocommerce flexslider for product gallery
add_filter('woocommerce_single_product_flexslider_enabled', '__return_false');
// disable woocommerce photoswipe for product gallery
add_filter('woocommerce_single_product_photoswipe_enabled', '__return_false');
// disable woocommerce zoom for product gallery
add_filter('woocommerce_single_product_zoom_enabled', '__return_false');
// show basket popup in cart & checkout page also
add_filter('woocommerce_widget_cart_is_hidden', '__return_false');
// customize showing(the way rates are displayed) rates
add_filter('woocommerce_get_star_rating_html', function ($html, $rating, $count) {
    return '
        <img src="' . get_template_directory_uri() . '/assets/images/empty-stars.png">
        <span style="width:' . (($rating / 5) * 100) . '%">
            <img src="' . get_template_directory_uri() . '/assets/images/full-stars.png">
        </span>
    ';
}, 10, 3);
// disable woocommerce single product related products section
add_filter('woocommerce_output_related_products_args', function ($args) {
    $args['posts_per_page'] = 0;
    return $args;
});
// woocommerce single product gallery image full size
add_filter('woocommerce_gallery_image_size', function ($size) {
    return 'full';
});
// woocommerce single product gallery xzoom integration
add_filter('woocommerce_gallery_image_html_attachment_image_params', function ($image_params) {
    $image_params['xoriginal'] = $image_params['data-src'];
    return $image_params;
}, 10, 1);
