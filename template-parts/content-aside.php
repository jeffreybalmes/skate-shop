<li class="item">
   <a href="<?php the_permalink(); ?>">
      <div class="image-container">
         <?php the_post_thumbnail('merch-thumbnail'); ?>
         <div class="product-overlay">
            <span class="view-link">View</span>
         </div>
      </div>
      <div class="item-body">
         <h4 class="item-name"><?php the_title(); ?></h4>
         <h6 class="item-price"><?php the_meta('price'); ?></h6>
      </div>
   </a>
</li>