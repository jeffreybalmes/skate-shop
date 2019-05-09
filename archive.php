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
               <h2 class="category">
                  <?php
                  if (is_category()) {
                     single_cat_title();
                  } elseif (is_tag()) {
                     single_tag_title();
                  } elseif (is_author()) {
                     the_post();
                     echo 'Author Archives: ' . get_the_author();
                     rewind_posts();
                  } elseif (is_day()) {
                     echo 'Daily Archives: ' . get_the_date();
                  } elseif (is_month()) {
                     echo 'Monthly Archives: ' . get_the_date('F Y');
                  } elseif (is_year()) {
                     echo 'Yearly Archives: ' . get_the_data('Y');
                  } else {
                     echo 'Archives:';
                  }
                  ?>
               </h2>
               <?php while (have_posts()) : the_post(); ?>

                  <?php get_template_part('template-parts/content', 'archive'); ?>

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