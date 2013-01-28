<?php
//sidebar 1 
$args = array();
$args['name']="Side Bar 1";
$args['id']="side-bar-1";
$args['description']="Side Bar 1";
$args['before_widget']="";
$args['after_widget']="";
$args['before_title']="";
$args['after_title']="";
register_sidebar($args);

//sidebar 2 
$args = array();
$args['name']="Side Bar 2";
$args['id']="side-bar-2";
$args['description']="Side Bar 2";
$args['before_widget']="";
$args['after_widget']="";
$args['before_title']="";
$args['after_title']="";
register_sidebar($args);

//menu
$args = array();
$args['name']="Menu Bar";
$args['id']="menu-bar";
$args['description']="Menu Bar";
$args['before_widget']="";
$args['after_widget']="";
register_sidebar($args);


//add custom post types
require_once(ABSPATH  . '/wp-content/themes/biston/scripts/custom-posttypes.php');
/* enqueueing bootstrap js */

function bootstrap_scripts_method() {

	wp_enqueue_script('live-query',get_template_directory_uri() .'/js/jquery.livequery.js',array('jquery'), '1.0.0', true);
	wp_enqueue_script('jquery-form',get_template_directory_uri() .'/js/jquery.form.js',array('jquery'), '1.0.0', true);
	wp_enqueue_script('jquery-cookie',get_template_directory_uri() .'/js/jquery.cookie.js',array('jquery'), '1.0.0', true);
	wp_enqueue_script('jquery-ajaxfileupload',get_template_directory_uri() .'/js/ajaxfileupload.js',array('jquery'), '1.0.0', true);
	wp_enqueue_script('jquery-blockUI',get_template_directory_uri() .'/js/jquery.blockUI.js',array('jquery'), '1.0.0', true);
}


add_action('wp_enqueue_scripts', 'bootstrap_scripts_method');


/**adding featured thumbnail for the theme post and custom post typess**/
add_theme_support( 'post-thumbnails', array('post','slider','page') ); 

function custom_excerpt_length( $length ) {
	return 20;
}
add_filter( 'excerpt_length', 'custom_excerpt_length', 999 );

function new_excerpt_more($more) {
    global $post;
	return '...<a href="'. get_permalink($post->ID) . '">more...</a>';
}
add_filter('excerpt_more', 'new_excerpt_more');

/* Registering Theme Menu Support */
add_action( 'init', 'register_my_menus' );
function register_my_menus() {
	register_nav_menus(
		array(
			'menu-top' => __( 'Menu Top Fixed' ),
		)
	);
}
?>