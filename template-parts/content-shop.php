<li class="blog">
	<?php if (is_singular()): ?>
		<div class="img-wrapper">
			<?php the_post_thumbnail('banner-image') ?>
		</div>
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
		<small class="blog-date"><?php the_meta('price'); ?></small>
		<!-- <small><?php echo shop_get_terms($post->ID, 'info'); ?></small> -->


		<?php if (is_singular()): ?>
			<p class="blog-text"><?php the_content(); ?></p>
		<?php else: ?>
			<p class="blog-text"><?php the_excerpt(); ?></p>
			<a href="<?php the_permalink(); ?>">Read more >></a>
		<?php endif ?>
	</div>
</li>