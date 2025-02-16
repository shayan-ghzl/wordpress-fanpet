<?php
get_header();

if (have_posts()) {
    while (have_posts()) {
        the_post();
        $classes = []; // Additional classes can be added here if needed
?>
        <section id="post-<?php the_ID(); ?>" <?php post_class($classes); ?>>
            <?php the_content(); ?>
        </section>
<?php
    }
}

get_footer();
?>