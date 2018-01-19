<?php get_header(); ?>

	<section class="merch">
		<div class="wrapper">
			<div class="title-wrapper">
				<h2 class="section-title">Merch</h2>
				<div class="title-line"></div>
			</div>

			<?php query_posts('post_type=shop&order=asc'); ?>
			<?php if (have_posts()): ?>
			<ul class="items">
				<?php while(have_posts()) : the_post(); ?>

					<?php get_template_part('template-parts/content', 'item'); ?>

				<?php endwhile; ?>
			</ul>
			<?php else: ?>
				<p>No post found.</p>
			<?php endif ?>
		</div>
	</section>
	<!-- /.merch -->

<?php get_footer(); ?>