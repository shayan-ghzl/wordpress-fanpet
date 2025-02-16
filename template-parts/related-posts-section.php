<?php
$post_id            = get_the_ID();
$posts_grid_columns = fanpet_get_theme_mod('posts_grid_columns_settings', 6);
$args               = array();
$categories         = get_the_category($post_id);

if ($categories) {
    $category_ids = array();

    foreach ($categories as $individual_category) {
        $category_ids[] = $individual_category->term_id;
    }

    $args = array(
        'category__in'        => $category_ids,
        'post__not_in'        => array($post_id),
        'posts_per_page'      => $posts_grid_columns,
        'orderby'             => 'rand',
        'ignore_sticky_posts' => 1,
    );
}

$related_query = new WP_Query($args);

if ($related_query->have_posts()) {
?>

<section class="related-posts">
    <header class="section-title">
        <h1><?php _e('مقالات مرتبط', 'fanpet'); ?></h1>
    </header>
    <div class="post-cards-grid-container">
        <?php get_template_part('template-parts/post-cards-loop', null, array('query' => $related_query)); ?>
    </div>
</section>

<?php
}