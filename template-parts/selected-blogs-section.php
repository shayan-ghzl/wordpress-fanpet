<?php
$menu_name = $args['menu_name'];
$title = $args['title'];

$locations = get_nav_menu_locations();

if (isset($locations[$menu_name])) {
    $menu_id = $locations[$menu_name];
    $menu_items = wp_get_nav_menu_items($menu_id);
    $posts_ids = [];

    if ($menu_items) {
        foreach ($menu_items as $item) {
            if ($item->object === 'post') {
                $posts_ids[] = $item->object_id;
            }
        }
    }

    if (!empty($posts_ids)) {
        $args = [
            'post_type'      => 'post',
            'post__in'       => $posts_ids,
            'orderby'        => 'post__in',
            'posts_per_page' => -1,
            'post_status'    => 'publish',
        ];

        $query = new WP_Query($args);

        if ($query->have_posts()) :
            echo '
                <section class="latest-posts">
                    <header class="section-title">
                        <h1>' . $title . '</h1>
                    </header>
                    <div class="post-cards-grid-container">
            ';

            get_template_part('template-parts/post-cards-loop', null, array('query' => $query));

            echo '
                    </div>
                </section>
            ';
            wp_reset_postdata();
        endif;
    }
}