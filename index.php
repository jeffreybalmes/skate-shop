<?php get_header(); ?>

	<section class="blogs">
		<div class="wrapper">
			<div class="title-wrapper">
				<h2 class="section-title">Blog</h2>
				<div class="title-line"></div> 
			</div>

			<div class="main-content">
				<?php $blogquery = new WP_Query('order=asc'); ?>
				<?php if ($blogquery->have_posts()): ?>
				<ul class="blogs-wrapper">
					<?php while($blogquery->have_posts()) : $blogquery->the_post(); ?>

						<?php get_template_part('template-parts/content'); ?>

					<?php endwhile; ?>
				</ul>
				<?php else: ?>
					<p>No post found.</p>
				<?php endif ?>
				<?php get_sidebar(); ?>
			</div>
		</div>
	</section>
	<!-- /.blogs -->

<?php get_footer(); ?>