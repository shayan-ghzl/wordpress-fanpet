<?php get_header(); ?>

<section class="contact-page">
    <div class="content">
        <?php
        if (have_posts()) :
            while (have_posts()) : the_post();
                the_content();
            endwhile;
        endif;
        ?>
    </div>
    <?php echo do_shortcode('[wpforms id="184" title="false"]'); ?>
</section>

<?php get_footer(); ?>