<li class="blog">
	<?php if (is_singular()): ?>
		<?php the_post_thumbnail('banner-image') ?>
	<?php else: ?>
		<?php the_post_thumbnail('blog-thumbnail'); ?>
	<?php endif ?>
	<div class="blog-body">
		<h5 class="blog-title">
			<?php if (is_singular()): ?>
				<?php the_title(); ?>
			<?php else: ?>
				<a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
			<?php endif ?>
		</h5>
		<small class="blog-date"><?php the_time('F j, Y g:i a'); ?></small>

		<?php if (is_singular()): ?>
			<p class="blog-text"><?php the_content(); ?></p>
		<?php else: ?>
			<p class="blog-text"><?php the_excerpt(); ?></p>
			<a class="read-more" href="<?php the_permalink(); ?>">Read more >></a>
		<?php endif ?>
	</div>
</li>