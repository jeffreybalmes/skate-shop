<?php get_header(); ?>

	<section class="blogs">
		<div class="wrapper">
			<div class="blogs-container">
				<?php if (have_posts()): ?>
				<ul class="blogs-wrapper">
					<?php while(have_posts()) : the_post(); ?>

						<?php get_template_part('template-parts/content-shop'); ?>

					<?php endwhile; ?>
				</ul>
				<?php else: ?>
					<p>No post found.</p>
				<?php endif ?>

				<?php
								//get the taxonomy terms of custom post type
				$customTaxonomyTerms = wp_get_object_terms( $post->ID, 'product', array('fields' => 'ids') );
								//query arguments
				$args = array(
					'post_type' => 'shop',
					'post_status' => 'publish',
					'posts_per_page' => 5,
					'orderby' => 'rand',
					'tax_query' => array(
						array(
							'taxonomy' => 'product',
							'field' => 'id',
							'terms' => $customTaxonomyTerms
						)
					),
					'post__not_in' => array ($post->ID),
				);
								//the query
				$relatedPosts = new WP_Query( $args );
				?>
				<?php if ($relatedPosts->have_posts()): ?>
				<h1 class="rprod-header">You may also like..</h1>
				<ul class="items">
					<?php while($relatedPosts->have_posts()) : $relatedPosts->the_post(); ?>

						<?php get_template_part('template-parts/content', 'item'); ?>

					<?php endwhile; ?>
				</ul>
				<?php else: ?>
					<p>No post found.</p>
				<?php endif ?>

			<?php wp_reset_postdata(); ?>

			</div>

			<?php get_sidebar(); ?>
		</div>
	</section>
	<!-- /.blogs -->

<?php get_footer(); ?>