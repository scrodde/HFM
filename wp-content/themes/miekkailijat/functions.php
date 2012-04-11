<?php

define('THEME_NAME', 'miekkailijat');
define('DISALLOW_FILE_EDIT', true);

remove_action('wp_head', 'wp_generator');

function themeSetup() {
	
	add_theme_support( 'automatic-feed-links' );

	register_nav_menu( 'primary', __( 'Primary Menu', THEME_NAME ) );
	register_nav_menu( 'secondary', __('Secondary Menu', THEME_NAME) );
	register_nav_menu( 'footer', __('Footer Menu', THEME_NAME) );

	add_theme_support( 'post-formats', array( 'aside', 'link', 'gallery', 'status', 'quote', 'image' ) );
	
	add_theme_support( 'post-thumbnails' );
	
	
	add_image_size('secondary-menu-thumbnail', 360, 202);
	
}
add_action('after_setup_theme', 'themeSetup');


function initWidgets() {
	
	register_sidebar( array(
		'name' => __( 'Main Sidebar', THEME_NAME ),
		'id' => 'sidebar-1',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget' => "</aside>",
		'before_title' => '<h3 class="widget-title">',
		'after_title' => '</h3>',
	) );

	register_sidebar( array(
		'name' => __( 'Showcase Sidebar', THEME_NAME ),
		'id' => 'sidebar-2',
		'description' => __( 'The sidebar for the optional Showcase Template', THEME_NAME ),
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget' => "</aside>",
		'before_title' => '<h3 class="widget-title">',
		'after_title' => '</h3>',
	) );

	register_sidebar( array(
		'name' => __( 'Footer Area One', THEME_NAME ),
		'id' => 'sidebar-3',
		'description' => __( 'An optional widget area for your site footer', THEME_NAME ),
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget' => "</aside>",
		'before_title' => '<h3 class="widget-title">',
		'after_title' => '</h3>',
	) );
}
add_action('widgets_init', 'initWidgets');

function enqueueScripts() {
	wp_deregister_script('jquery');
	wp_register_script('jquery', "http" . ($_SERVER['SERVER_PORT'] == 443 ? "s" : "")
						."://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js", false, null);
						
	wp_enqueue_script('jquery');
	wp_enqueue_script('bootstrap', get_template_directory_uri() . '/bootstrap/js/bootstrap.min.js', array('jquery'));
	wp_enqueue_script('theme', get_template_directory_uri() . '/js/script.js', array('bootstrap', 'jquery'));
	
	wp_localize_script('theme', 'WPAjax', array('url' => admin_url('admin-ajax.php')) );
}	
add_action('wp_enqueue_scripts', 'enqueueScripts');



?>