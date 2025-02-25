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

    <div>
        <?php
        $my_picture_setting = hooshang_get_theme_mod("my_picture_setting");
        if ($my_picture_setting) :
        ?>
            <div class="image-wrapper">
                <img src="<?php echo esc_url($my_picture_setting); ?>" alt="about me">
            </div>
        <?php endif; ?>

        <?php
        echo do_shortcode('[wpforms id="99" title="false"]');
        ?>
    </div>
</section>

<?php get_footer(); ?>