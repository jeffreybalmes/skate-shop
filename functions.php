<?php

function shop_theme_resources(){
	wp_enqueue_style('style', get_stylesheet_uri());
   wp_enqueue_style('customstyle', get_template_directory_uri() . '/dist/css/style.min.css', array(), '', 'all');
   wp_enqueue_style('font-awesome', 'https://use.fontawesome.com/releases/v5.8.1/css/all.css');
	wp_enqueue_script('customjs', get_template_directory_uri() . '/dist/js/app.min.js', array(), '1.0.0', true);
}

add_action('wp_enqueue_scripts', 'shop_theme_resources');

//Customize excerpt word count length
function custom_excerpt_length() {
	return 20;
}

add_filter('excerpt_length', 'custom_excerpt_length');


//Theme setup
function shop_theme_setup()
{
	//Navigation Menus
	register_nav_menus(array(
		'primary' => __('Primary Menu'),
		'products' => __('Products Menu')
	));

	//Add featured image support
	add_theme_support('post-thumbnails');
	add_image_size('merch-thumbnail', 252, 245, true);
	add_image_size('blog-thumbnail', 155, 155, true);
	add_image_size('sidebar-thumbnail', 90, 90, true);
	add_image_size('banner-image', 1000, 300, array('left', 'top'));

	//Add post format support
	add_theme_support('post-formats', array('aside', 'gallery', 'link'));

}

add_action('after_setup_theme', 'shop_theme_setup');


//Add Widget Locations
function shop_theme_widgets() {
	register_sidebar( array(
		'name' => 'Sidebar',
		'id' => 'sidebar1',
		'before_widget' => '<div class="widget-item">',
		'after_widget' => '</div>',
		'before_title' => '<h4 class="my-special-class">',
		'after_title' => '</h4>'
	));
}

add_action('widgets_init','shop_theme_widgets');


/*
	==========================================
	Custom Post Type
	==========================================
*/
function shop_custom_post_type (){

	$labels = array(
		'name' => 'Shop',
		'singular_name' => 'Shop',
		'add_new' => 'Add Item',
		'all_items' => 'All Items',
		'add_new_item' => 'Add Item',
		'edit_item' => 'Edit Item',
		'new_item' => 'New Item',
		'view_item' => 'View Item',
		'search_item' => 'Search Item',
		'not_found' => 'No items found',
		'not_found_in_trash' => 'No items found in trash',
		'parent_item_colon' => 'Parent Item'
	);
	$args = array(
		'labels' => $labels,
		'public' => true,
		'has_archive' => true,
		'publicly_queryable' => true,
		'query_var' => true,
		'rewrite' => true,
		'capability_type' => 'post',
		'hierarchical' => false,
		'supports' => array(
			'title',
			'editor',
			'excerpt',
			'thumbnail',
			'revisions',
			'custom-fields'
		),
		// 'taxonomies' => array('category', 'post_tag'),
		'menu_position' => 5,
      'exclude_from_search' => false,
      'supports' => array('title', 'editor', 'post-formats', 'custom-fields', 'thumbnail')
	);
	register_post_type('shop',$args);
}
add_action('init','shop_custom_post_type');


function shop_custom_taxonomies() {

	//Add new taxonomy hierarchical
	$labels = array(
		'name' => 'Products',
		'singular_name' => 'Product',
		'search_items' => 'Search Products',
		'all_items' => 'All Products',
		'parent_item' => 'Parent Product',
		'parent_item_colon' => 'Parent Product:',
		'edit_item' => 'Edit Product',
		'update_item' => 'Update Product',
		'add_new_item' => 'Add New Product',
		'new_item_name' => 'New Product Name',
		'menu_name' => 'Products'
	);

	$args = array(
		'hierarchical' => true,
		'labels' => $labels,
		'show_ui' => true,
		'show_admin_column' => true,
		'query_var' => true,
		'rewrite' => array('slug' => 'product')
	);

	register_taxonomy('product', array('shop'), $args);

	// Add new Taxonomy NOT hierarchical
	register_taxonomy('info', 'shop', array(
		'label' => 'Info',
		'rewrite' => array('slug' => 'info'),
		'hierarchical' => false
	));
}

add_action('init', 'shop_custom_taxonomies');

// Custom Post Term Function

function shop_get_terms($postID, $term) {
	$terms_list = wp_get_post_terms($postID, $term);
	$output = '';

	$i = 0;
	foreach ($terms_list as $term) {
		$i++;
		if ($i > 1) { $output .= ' | '; }
		$output .= '<a href="'.get_term_link($term).'">'.$term->name.'</a>';
	}
	return $output;
}






?>