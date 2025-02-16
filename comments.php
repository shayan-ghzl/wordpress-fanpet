<?php
if (post_password_required()) {
	return;
}
?>
<section id="comments">
	<?php if (have_comments()) : ?>
		<h3 class="comment-list-title">
			<?php _e('Users Comment', 'fanpet'); ?>
		</h3>
		<div class="commentlist-container">
			<ol class="commentlist">
				<?php
				wp_list_comments(
					array(
						'avatar_size' => 50,
						'style'       => 'ol',
						'walker'      => new Custom_Walker_Comment() //use our custom walker
					)
				);
				?>
			</ol>
		</div>
		<?php
		the_comments_pagination(
			array(
				'mid_size'  => 0,
				'prev_text' => __('Prev', 'fanpet'),
				'next_text' => __('Next', 'fanpet'),
			)
		);
		?>
		<?php if (!comments_open()) : ?>
			<p class="no-comments">
				<?php _e('Comments are closed.', 'fanpet'); ?>
			</p>
		<?php endif; ?>
	<?php endif; ?>
	<div id="review_form_wrapper">
		<?php
		comment_form(
			array(
				'logged_in_as'       => '',
			)
		);
		?>
	</div>
</section>