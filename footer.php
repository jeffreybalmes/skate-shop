	<footer>
	   <div class="wrapper">
	      <div class="site-map">
	         <h5>Site Map</h5>
	         <?php
            $args = array(
               'theme_location' => 'primary',
               'menu_id' => 'primary-menu'
            );
            ?>
	         <?php wp_nav_menu($args); ?>
	      </div>
	      <div class="help-center">
	         <h5>Help Center</h5>
	         <ul>
	            <li><a href="#">My Account</a></li>
	            <li><a href="#">Contact</a></li>
	            <li><a href="#">Chat</a></li>
	            <li><a href="#">Help</a></li>
	            <li><a href="#">Ordering</a></li>
	            <li><a href="#">Shipping Info</a></li>
	         </ul>
	      </div>
	      <div class="social">
	         <h5>Social</h5>
	         <ul>
	            <li><a href="#"><i class="fab fa-facebook"></i></a></li>
	            <li><a href="#"><i class="fab fa-twitter"></i></a></li>
	            <li><a href="#"><i class="fab fa-instagram"></i></a></li>
	            <!-- <li><a href="#"><i class="fa fa-facebook-official"></i></a></li> -->
	         </ul>
	      </div>
	   </div>
	   <div class="copyright">&copy; <?php echo '2017 - '. date('Y'); ?> <?php bloginfo('name') ?> | Designed and created by Jeffrey Balmes</div>
	</footer>

	<?php wp_footer(); ?>
	</body>
	</html>