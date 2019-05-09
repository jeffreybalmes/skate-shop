<?php get_header(); ?>

<section class="blogs">
   <div class="wrapper">
      <?php if (have_posts()): ?>
         <ul class="blogs-wrapper">
            <?php while(have_posts()) : the_post(); ?>

               <?php get_template_part('template-parts/content'); ?>

            <?php endwhile; ?>

            <div class="pagination-single">
               <?php next_post_link('%link', '<i class="fas fa-arrow-circle-left"></i> %title'); ?>
               <?php previous_post_link('%link', '%title <i class="fas fa-arrow-circle-right"></i>'); ?>
            </div>

         </ul>
      <?php else: ?>
         <p>No post found.</p>
      <?php endif ?>
      <?php get_sidebar(); ?>
   </div>
</section>
<!-- /.blogs -->

<?php get_footer(); ?>