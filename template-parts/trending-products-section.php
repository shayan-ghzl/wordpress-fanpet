<?php
$menu_name = $args['menu_name'];
$title = $args['title'];

$locations = get_nav_menu_locations();

if (isset($locations[$menu_name])) {
    $menu_id = $locations[$menu_name];
    $menu_items = wp_get_nav_menu_items($menu_id);
    $product_ids = [];

    if ($menu_items) {
        foreach ($menu_items as $item) {
            if ($item->object === 'product') {
                $product_ids[] = $item->object_id;
            }
        }
    }

    if (!empty($product_ids)) {
        $args = [
            'post_type'      => 'product',
            'post__in'       => $product_ids,
            'orderby'        => 'post__in',
            'posts_per_page' => -1,
            'post_status'    => 'publish',
        ];

        $query = new WP_Query($args);

        if ($query->have_posts()) :
            echo '
                <section class="trending-products">
                    <header class="section-title">
                        <h1>' . $title . '</h1>
                    </header>
                    <div class="swiper">
                        <div class="swiper-wrapper">
            ';

            while ($query->have_posts()) : $query->the_post();
                echo '<div class="swiper-slide">';

                /**
                 * Hook: woocommerce_shop_loop.
                 */
                do_action('woocommerce_shop_loop');

                wc_get_template_part('content', 'product');

                echo '</div>';
            endwhile;

            echo '
                        </div>
                    </div>
                </section>
            ';

            wp_reset_postdata();
        endif;
    }
}