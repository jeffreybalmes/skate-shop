<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo('charset'); ?>">
	<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<title><?php bloginfo('name'); ?></title>
	<link rel="stylesheet" href="css/style.css">
	<link href="https://fonts.googleapis.com/css?family=Amiri:400,700|Muli:400,600,700" rel="stylesheet">
	<?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>

	<header>
		<div class="wrapper">
			<h1 class="logo">A-CORE</h1>
			<nav class="main-nav">
				<a href="#" class="burger-nav">test</a>
				<h1>Skateboard</h1>

				<?php
					$args = array(
						'theme_location' => 'primary',
						'menu_id' => 'primary-menu'
					);
				?>
				<?php wp_nav_menu($args); ?>

			</nav>
		</div>
	</header>