<?php get_header(); ?>

<?php
$tax_query = array(
    array(
        'taxonomy' => 'post_format',
        'field'    => 'slug',
        'terms'    => array(
            'post-format-quote',
        ),
        'operator' => 'NOT IN',
    ),
);

get_template_part('template-parts/latest-posts-section', null, array('tax_query' => $tax_query, 'count' => 12, 'view_all_href' => false, 'section_title' => __('Blogs', 'hooshang')));
?>

<?php get_footer(); ?>
