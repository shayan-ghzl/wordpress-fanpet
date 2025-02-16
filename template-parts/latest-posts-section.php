<?php
$args = array(
    'post_type' => 'post',
    'posts_per_page' => 10,
    'paged' => 1
);

$the_query = new WP_Query($args);

if ($the_query->have_posts()):
?>
    <section class="latest-posts">
        <header class="section-title">
            <h1><?php _e('مقالات اخیر', 'fanpet'); ?></h1>
        </header>

        <div class="post-cards-grid-container">
            <?php get_template_part('template-parts/post-cards-loop', null, array('query' => $the_query)); ?>
        </div>
    </section>
<?php endif; ?>