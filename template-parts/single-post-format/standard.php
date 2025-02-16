<article id="post-<?php the_ID(); ?>" <?php post_class('single-post standard-post-format'); ?>>
    <section>
        <!-- Post Thumbnail -->
        <?php if (has_post_thumbnail()): ?>
            <div class="post-thumbnail">
                <?php the_post_thumbnail('full', [
                    'class' => 'img-responsive',
                    'alt'   => esc_attr(get_the_title()),
                ]); ?>
            </div>
        <?php endif; ?>

        <!-- Post Title -->
        <h1 class="post-title" title="<?php the_title_attribute(); ?>">
            <?php the_title(); ?>
        </h1>


        <!-- Post Content -->
        <div class="content">
            <?php the_content(); ?>
        </div>

        <!-- Post Tags -->
        <?php
        $tag_list = get_the_tag_list('<ul><li>' . __('Tags:', 'fanpet') . '</li><li>', '</li><li>', '</li></ul>');
        if ($tag_list) {
            echo '<footer>' . $tag_list . '</footer>';
        }
        ?>
    </section>
</article>

<!-- Related Posts Section -->
<?php get_template_part('template-parts/related-posts-section'); ?>

<?php
if (comments_open() || get_comments_number()) {
    comments_template();
}
?>