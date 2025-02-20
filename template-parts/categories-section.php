<?php
$menu_name = $args['menu_name'];
$title = $args['title'];

$locations = get_nav_menu_locations();

if (isset($locations[$menu_name])) {
    $menu_id = $locations[$menu_name];
    $menu_items = wp_get_nav_menu_items($menu_id);
    $product_categories_ids = [];

    if ($menu_items) {
        foreach ($menu_items as $item) {
            if ($item->object === 'product_cat') {
                $product_categories_ids[] = $item->object_id;
            }
        }
    }

    if (!empty($product_categories_ids)) {

        $product_categories = get_terms([
            'taxonomy'   => 'product_cat',
            'include'    => $product_categories_ids,
            'hide_empty' => false,
        ]);

        echo '
            <section class="product-categories">
                <header class="section-title">
                    <h1>' . $title . '</h1>
                </header>
                <div class="grid-container">
        ';

        foreach ($product_categories as $category) {
            $thumbnail_id = get_term_meta($category->term_id, 'thumbnail_id', true);
            $image_url = ($thumbnail_id) ? wp_get_attachment_url($thumbnail_id) : wc_placeholder_img_src();

            echo '<div>';
            echo '<a href="' . get_term_link($category) . '">';
            echo '<img src="' . esc_url($image_url) . '" alt="' . esc_attr($category->name) . '">';
            echo '<h3>' . esc_html($category->name) . '</h3>';
            echo '</a>';
            echo '</div>';
        }

        echo '
                </div>
            </section>
        ';
    }
}
