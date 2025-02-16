<?php get_header(); ?>

<?php if (have_posts()) : ?>
    <section class="post-archive">
        <!-- Section Title -->
        <header class="section-title">
            <h1><?php _e('Articles', 'fanpet'); ?></h1>
            <h3><?php the_archive_title(); ?></h3>
        </header>
        
        <!-- Post Cards Grid -->
        <div class="post-cards-grid-container">
            <?php get_template_part('template-parts/post-cards-loop'); ?>
        </div>

        <!-- Pagination -->
        <div class="pagination-container">
            <?php
            the_posts_pagination([
                'prev_text' => __('Previous', 'fanpet'),
                'next_text' => __('Next', 'fanpet'),
                'screen_reader_text' => __('Posts navigation', 'fanpet'),
            ]);
            ?>
        </div>
    </section>
<?php endif; ?>

<?php get_footer(); ?>
