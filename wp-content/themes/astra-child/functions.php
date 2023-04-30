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

// Custom post types function
function create_custom_post_types() {
	//create a hero-image custom post type
	register_post_type( 'hero_image',
        array(
            'labels' => array(
                'name' => __( 'Hero Image' ),
            ),
            'public' => true,
            'has_archive' => true,
            'rewrite' => array( 'slug' => 'hero-image' ),
        )
    );
	register_post_type( 'recent_builds',
        array(
            'labels' => array(
                'name' => __( 'Recent Builds' ),
            ),
            'public' => true,
            'has_archive' => true,
            'rewrite' => array( 'slug' => 'recent-builds' ),
        )
    );
	register_post_type( 'about',
        array(
            'labels' => array(
                'name' => __( 'About' )
            ),
            'public' => true,
            'has_archive' => true,
            'rewrite' => array( 'slug' => 'about' ),
        )
    );
}
add_action( 'init', 'create_custom_post_types' );
