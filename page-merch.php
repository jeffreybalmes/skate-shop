<?php get_header(); ?>

<section class="merch">
   <div class="wrapper">
      <div class="title-wrapper">
         <h2 class="section-title">Merch</h2>
         <div class="title-line"></div>
      </div>

      <div class="main-content">
         <div class="items-wrapper">
            <?php
            $currentPage = get_query_var('paged');

            $args = array(
               'post_type' => 'shop',
               'posts_per_page' => 3,
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
               <div class="pagination">
                  <?php
                  $args = array(
                     'total'              => $loop->max_num_pages,
                     'prev_text'          => __('<i class="fas fa-arrow-circle-left"></i>&nbsp;Previous'),
                     'next_text'          => __('Next&nbsp;<i class="fas fa-arrow-circle-right"></i>')
                  );
                  ?>
                  <?php echo paginate_links($args); ?>
               </div>
            <?php else : ?>
               <p>No items found.</p>
            <?php endif ?>

         </div>
         <!-- /.items-wrapper -->
         <?php get_sidebar(); ?>
         <?php wp_reset_postdata(); ?>
      </div>
      <!-- /.main-content -->

   </div>
</section>
<!-- /.merch -->



<?php get_footer(); ?>