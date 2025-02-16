<?php
if (empty($args['query'])) {
	$query = $wp_query;
} else {
	$query = $args['query'];
}

while ($query->have_posts()) : $query->the_post();
	$post_id = get_the_ID();
	$post_format = get_post_format();
?>
	<div class="post-card">
		<div class="post-thumbnail">
			<a href="<?php the_permalink(); ?>">
				<?php
				if ($post_format === 'video') {
					$embedUrl = get_post_meta($post_id, '_format_video_embed', true);
					$thumbnailUrl = getYouTubeThumbnailFromUrl($embedUrl, 'maxresdefault');

					if ($thumbnailUrl) {
						echo '<svg xmlns="http://www.w3.org/2000/svg" width="72" height="50.949" viewBox="0 0 72 50.949"><g transform="translate(-200 -345)"><path d="M57.046,67.393H14.954A14.954,14.954,0,0,0,0,82.347v21.042a14.954,14.954,0,0,0,14.954,14.954H57.046A14.954,14.954,0,0,0,72,103.389V82.347A14.954,14.954,0,0,0,57.046,67.393Zm-10.113,26.5-19.688,9.389a.792.792,0,0,1-1.13-.714V83.2a.792.792,0,0,1,1.152-.7l19.685,9.977a.792.792,0,0,1-.017,1.418Z" transform="translate(200 277.607)" fill="#f61c0d"/><path d="M10.607,1.774a1,1,0,0,1,1.786,0L22.27,21.388a1,1,0,0,1-.893,1.45H1.623a1,1,0,0,1-.893-1.45Z" transform="translate(248.938 358.975) rotate(90)" fill="#fff"/></g></svg>';
						echo "<img src='" . htmlspecialchars($thumbnailUrl) . "' alt='YouTube Thumbnail'>";
					}
				} else {
					if (has_post_thumbnail()) {
						echo get_the_post_thumbnail(get_the_ID(), 'full');
					}
				}
				?>
			</a>
		</div>
		<div class="post-content">
			<a class="header" href="<?php the_permalink(); ?>">
				<h3 class="line-clamp" title="<?php echo esc_attr(get_the_title()); ?>">
					<?php the_title(); ?>
				</h3>
				<span><?php the_time('j F, Y'); ?></span>
			</a>
			<div class="post-excerpt">
				<p class="line-clamp"><?php echo get_the_excerpt(); ?></p>
			</div>
		</div>
	</div>
<?php
endwhile;
wp_reset_postdata();
?>