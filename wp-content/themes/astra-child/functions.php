<?php
/**
* Middlebrick Child functions and definitions
*
* @link http://codex.wordpress.org/Theme_Development
* @link http://codex.wordpress.org/Child_Themes
*
* @package WordPress
* @subpackage Middlebrick
* @since Astra 3.8.5
*/

// Enqueue scripts and styles
function astra_child_scripts(){
	wp_enqueue_style( 'astra-style', get_template_directory_uri() . '/style.css' );
	wp_enqueue_style( 'child-style', get_stylesheet_directory_uri() . '/style.css', array( 'astra-style' ));
}
add_action( 'wp_enqueue_scripts', 'astra_child_scripts' );


