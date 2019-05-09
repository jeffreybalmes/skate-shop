<?php get_header(); ?>

<section class="blogs">
   <div class="wrapper">
      <div class="title-wrapper">
         <h2 class="section-title">Blog</h2>
         <div class="title-line"></div>
      </div>

      <div class="main-content">
         <?php if (have_posts()) : ?>
            <ul class="blogs-wrapper">
               <h2 class="category">Search result for: <?php the_search_query(); ?></h2>

               <?php while (have_posts()) : the_post(); ?>

                  <?php get_template_part('template-parts/content', get_post_format()); ?>

               <?php endwhile; ?>
               <div class="pagination">
                  <?php
                  $args = array(
                     'prev_text'          => __('<i class="fas fa-arrow-circle-left"></i>&nbsp;Previous'),
                     'next_text'          => __('Next&nbsp;<i class="fas fa-arrow-circle-right"></i>'),
                  );
                  ?>
                  <?php echo paginate_links($args); ?>
               </div>

            </ul>
         <?php else : ?>
            <p>No post found.</p>
         <?php endif ?>
         <?php get_sidebar(); ?>
      </div>
   </div>
</section>
<!-- /.blogs -->

<?php get_footer(); ?>