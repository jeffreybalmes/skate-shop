<aside class="sidebar">
   <div class="search">
      <?php get_search_form(); ?>
   </div>

   <h4 class="my-special-class">Latest Posts</h4>
   <ul class="blogs-wrapper">
      <?php query_posts('posts_per_page=3') ?>
      <?php while(have_posts()) : the_post(); ?>

         <li class="blog">
            <?php the_post_thumbnail('sidebar-thumbnail'); ?>
            <div class="blog-body">
               <small class="blog-date"><?php the_time('F j, Y'); ?></small>
               <h5 class="blog-title">
                  <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
               </h5>
            </div>
         </li>

      <?php endwhile; ?>
   </ul>
   <?php if (is_active_sidebar('sidebar1')) : ?>
      <?php dynamic_sidebar('sidebar1'); ?>
   <?php endif; ?>
</aside>