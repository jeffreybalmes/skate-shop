<li class="blog">
	<?php the_post_thumbnail('blog-thumbnail'); ?>
	<div class="blog-body">
		<h5 class="blog-title"><?php the_title(); ?></h5>
		<small class="blog-date"><?php the_time('F j, Y g:i a'); ?></small>
		<p class="blog-text"><?php the_excerpt(); ?></p>
		<a class="read-more" href="<?php the_permalink(); ?>">Read more >></a>
	</div>
</li>