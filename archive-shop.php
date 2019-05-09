<?php get_header(); ?>

<section class="merch">
   <div class="wrapper">
      <div class="title-wrapper">
         <h2 class="section-title">Merch</h2>
         <div class="title-line"></div>
      </div>

      <div class="main-content">
         <?php
         $currentPage = get_query_var('paged');

         $args = array(
            'post_type' => 'shop',
            'posts_per_page' => 2,
            'order' => 'asc',
            'paged' => $currentPage
         );
         $loop = new WP_Query($args);
         ?>
         <?php if ($loop->have_posts()) : ?>
            <ul class="items">
               <?php while ($loop->have_posts()) : $loop->the_post(); ?>

                  <?php get_template_part('template-parts/content', 'item'); ?>

               <?php endwhile; ?>
            </ul>
            <?php echo paginate_links(array(
               'total' => $loop->max_num_pages
            ));
            ?>

         <?php else : ?>
            <p>No items found.</p>
         <?php endif ?>
         <?php get_sidebar(); ?>
         <?php wp_reset_postdata(); ?>
      </div>
      <!-- /.main-content -->
   </div>
</section>
<!-- /.merch -->

<?php get_footer(); ?>