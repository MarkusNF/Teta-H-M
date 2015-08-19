<?php
/* ------------------------- MENU --------------------------- */

/**
* Uses wp_nav_menu in header.
*/
register_nav_menus(array(
	'home' 		=> __('Home Meny'),
	'dam'		=> __('Dam Meny'),
	'herr'		=> __('Herr Meny')
));

/* ------------------- CUSTOM POST TYPE ----------------------- */
/**
* Setup for Custom Post Type.
* 
*/
function products_init(){
	$args = array(
		'public'            => true,
		'has_archive'       => true,
		'show_ui'           => true,
		'capability_type'   => 'post',
		'hierarchical'      => false,
		'rewrite'           => array('slug' => 'product'),
		'query_var'         => true,
		'menu_icon'         => 'dashicons-cart',
		'label'             => 'Product',
		'supports'          => array(
								'title',
								'editor',
								'excerpt',
								'custom-fields',
								'thumbnail',
								'page-attributes',)
		);
	register_post_type('product', $args);
}
add_action('init', 'products_init');

/* ------------------- TAXONOMY CATEGORY ----------------------- */

//Creates Taxonomy for Portfolio-projects

function gender_taxonomy(){
	$labels = array(
		'name'              => 'Gender', 
		'singular name'     => 'Gender',
		'search_items'      => 'Search gender',
		'parent_item'       => 'Parent gender',
		'edit_item'         => 'Edit gender',
		'update_item'       => 'Update Gender',
		'add_new_item'      => 'Add New Gender',
		'new_item_name'     => 'New Gender',
		'menu_name'         => 'Gender'
		);
		
	$args = array(
		'labels'            => $labels,
		'hierarchical'      => true,
		);

	register_taxonomy('gender_category', 'product', $args);
}
add_action('init', 'gender_taxonomy', 0);

/* ----------------------- IMAGES ---------------------------- */

/**
* Enable support for Post Thumbnails on posts and pages.
*/
add_theme_support( 'post-thumbnails' );
add_image_size( 'clothes-thumb', 80 );

/* ----------------------- SCRIPT ----------------------------- */

/**
* Enqueue scripts for the front end.
*
*/
function load_wp_media_files() {
	wp_enqueue_media();
}
add_action( 'admin_enqueue_scripts', 'load_wp_media_files' );

/**
* Enqueue script for the front end from jQuery library version 2.1.4.
*
*/

function modify_jquery() {
	wp_deregister_script( 'jquery' );
	wp_register_script( 'jquery', 'http://ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js', '2.1.4' );
	wp_enqueue_script( 'jquery' );
}
add_action( 'init', 'modify_jquery' );

/**
* Enqueue script for the front end from jQuery UI library version 1.11.4.
*
*/
function my_scripts_jquery_ui() {
    wp_enqueue_script( 'jquery_ui', 'http://ajax.googleapis.com/ajax/libs/jqueryui/1.11.4/jquery-ui.min.js', array( 'jquery' ), '1.11.4');
}
add_action( 'wp_enqueue_scripts', 'my_scripts_jquery_ui' );

/**
* Enqueue script for the front end from file main.js.
*
*/
function my_scripts_method() {
	wp_enqueue_script( 'main', get_stylesheet_directory_uri() . '/js/main.js', array( 'jquery', 'jquery_ui' ));
}
add_action( 'wp_enqueue_scripts', 'my_scripts_method' );