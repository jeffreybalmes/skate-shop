<?php get_header(); ?>

<section class="banner">
   <div class="banner-wrapper">
      <h1>Skate for life</h1>
      <p>A fictional website for job application purposes. All images are copyright to their respective owners</p>
   </div>
</section>
<!-- /.banner -->
<section class="merch">
   <div class="wrapper">
      <div class="title-wrapper">
         <h2 class="section-title">Merch</h2>
         <div class="title-line"></div>
      </div>
      <?php

      $args = array('post_type' => 'shop', 'posts_per_page' => 4, 'order' => 'asc');
      $loop = new WP_Query($args);

      ?>
      <?php if ($loop->have_posts()): ?>
         <ul class="items">
            <?php while($loop->have_posts()) : $loop->the_post(); ?>

               <?php get_template_part('template-parts/content', 'item'); ?>

            <?php endwhile; ?>
         </ul>
         <div class="btn-container">
            <a class="btn-primary" href="https://jeff-skateshop.000webhostapp.com/merch/">View All</a>
         </div>
      <?php else: ?>
         <p>No items found.</p>
      <?php endif ?>
      <?php wp_reset_postdata(); ?>
   </div>
</section>
<!-- /.merch -->
<section class="blogs">
   <div class="wrapper">
      <div class="title-wrapper">
         <h2 class="section-title">Blog</h2>
         <div class="title-line"></div>
      </div>
      <?php query_posts('cat=3&posts_per_page=6&order=asc'); ?>
      <?php if (have_posts()) : ?>
         <ul class="blogs-wrapper">
            <?php while(have_posts()) : the_post(); ?>

               <?php get_template_part('template-parts/content'); ?>

            <?php endwhile; ?>
         </ul>
         <div class="btn-container">
            <a class="btn-primary" href="https://jeff-skateshop.000webhostapp.com/blog/">View All</a>
         </div>
      <?php else: ?>
         <p>No post found.</p>
      <?php endif ?>
      <?php wp_reset_postdata(); ?>
   </div>
</section>
<!-- /.blogs -->
<section class="videos">
   <div class="wrapper">
      <div class="title-wrapper">
         <h2 class="section-title">Videos</h2>
         <div class="title-line"></div>
      </div>
      <ul class="videos-wrapper">
         <li class="video">
            <iframe width="347" height="201" src="https://www.youtube.com/embed/1U-cgn3cEGA" frameborder="0" allowfullscreen></iframe>
            <a href="">
               <h5 class="video-title">HELIPOP MINI RAMP NOSEGRIND.</h5>
            </a>
         </li>
         <li class="video">
            <iframe width="347" height="201" src="https://www.youtube.com/embed/gaf8zHp-iaY" frameborder="0" allowfullscreen></iframe>
            <a href="">
               <h5 class="video-title">HELIPOP MINI RAMP NOSEGRIND.</h5>
            </a>
         </li>
         <li class="video">
            <iframe width="347" height="201" src="https://www.youtube.com/embed/8og8sGKvEhs" frameborder="0" allowfullscreen></iframe>
            <a href="">
               <h5 class="video-title">HELIPOP MINI RAMP NOSEGRIND.</h5>
            </a>
         </li>
         <li class="video">
            <iframe width="347" height="201" src="https://www.youtube.com/embed/DrhySNB31Bw" frameborder="0" allowfullscreen></iframe>
            <a href="">
               <h5 class="video-title">HELIPOP MINI RAMP NOSEGRIND.</h5>
            </a>
         </li>
         <li class="video">
            <iframe width="347" height="201" src="https://www.youtube.com/embed/xYg4ertEUeo" frameborder="0" allowfullscreen></iframe>
            <a href="">
               <h5 class="video-title">HELIPOP MINI RAMP NOSEGRIND.</h5>
            </a>
         </li>
         <li class="video">
            <iframe width="347" height="201" src="https://www.youtube.com/embed/CbbHFrX6EfI" frameborder="0" allowfullscreen></iframe>
            <a href="">
               <h5 class="video-title">HELIPOP MINI RAMP NOSEGRIND.</h5>
            </a>
         </li>
      </ul>
   </div>
</section>
<!-- /.videos -->
<section class="team">
   <div class="wrapper">
      <div class="title-wrapper">
         <h2 class="section-title">Team</h2>
         <div class="title-line"></div>
      </div>
      <div class="team-wrapper">
         <ul class="img-members">
            <li class="img-member">
               <img src="<?php echo get_template_directory_uri(); ?>/src/images/member-1.jpg" alt="member-1">
               <h4 class="member-name">Rodney Mullen</h4>
            </li>
            <li class="img-member">
               <img src="<?php echo get_template_directory_uri(); ?>/src/images/member-2.jpg" alt="member-2">
               <h4 class="member-name">Rodney Mullen</h4>
            </li>
            <li class="img-member">
               <img src="<?php echo get_template_directory_uri(); ?>/src/images/member-3.jpg" alt="member-3">
               <h4 class="member-name">Rodney Mullen</h4>
            </li>
            <li class="img-member">
               <img src="<?php echo get_template_directory_uri(); ?>/src/images/member-4.jpg" alt="member-4">
               <h4 class="member-name">Rodney Mullen</h4>
            </li>
         </ul>
         <div class="team-info">
            <h3 class="team-name">Mullen's Crew</h3>
            <p class="text-bold">Skate ipsum dolor sit amet, judo air opposite footed face plant pressure flip coper nosepicker.</p>
            <p class="text-normal">Slimeballs fakie sponsored lipslide tail slam handplant. Gap rail fastplant cab flip Tod Swank carve grind. No comply concave casper slide crail slide lip coping. Downhill hospital flip airwalk lien air cab flip tailslide. 270 vert crail grab Fastplant Dustin Dollin hang ten boardslide pool. Rail Japan air skate or die skater. Carve nollie backside slob air. Masonite rails cess slide shinner. Kingpin hurricane boardslide vert. Smith grind face plant no comply nose slide. Vert slap maxwell crail slide Chet Thomas ollie. Freestyle </p>
         </div>
      </div>

      <div class="team-wrapper">
         <div class="team-info">
            <h3 class="team-name">Mullen's Crew</h3>
            <p class="text-bold">Skate ipsum dolor sit amet, judo air opposite footed face plant pressure flip coper nosepicker.</p>
            <p class="text-normal">Slimeballs fakie sponsored lipslide tail slam handplant. Gap rail fastplant cab flip Tod Swank carve grind. No comply concave casper slide crail slide lip coping. Downhill hospital flip airwalk lien air cab flip tailslide. 270 vert crail grab Fastplant Dustin Dollin hang ten boardslide pool. Rail Japan air skate or die skater. Carve nollie backside slob air. Masonite rails cess slide shinner. Kingpin hurricane boardslide vert. Smith grind face plant no comply nose slide. Vert slap maxwell crail slide Chet Thomas ollie. Freestyle </p>
         </div>
         <ul class="img-members">
            <li class="img-member">
               <img src="<?php echo get_template_directory_uri(); ?>/src/images/member-1.jpg" alt="member-1">
               <h4 class="member-name">Rodney Mullen</h4>
            </li>
            <li class="img-member">
               <img src="<?php echo get_template_directory_uri(); ?>/src/images/member-2.jpg" alt="member-2">
               <h4 class="member-name">Rodney Mullen</h4>
            </li>
            <li class="img-member">
               <img src="<?php echo get_template_directory_uri(); ?>/src/images/member-3.jpg" alt="member-3">
               <h4 class="member-name">Rodney Mullen</h4>
            </li>
            <li class="img-member">
               <img src="<?php echo get_template_directory_uri(); ?>/src/images/member-4.jpg" alt="member-4">
               <h4 class="member-name">Rodney Mullen</h4>
            </li>
         </ul>
      </div>
   </div>
</section>
<!-- /.team -->

<?php get_footer(); ?>