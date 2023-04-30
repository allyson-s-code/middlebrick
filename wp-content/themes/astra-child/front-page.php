<?php
/**
 * The template for displaying the homepage.
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Astra
 * @since 1.0.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

get_header(); ?>

	<div id="primary" class="home-page hero-content"<?php astra_primary_class(); ?>>
		<div class="main-content" role="main">

			<div class="hero-container">
				<h1 class="hero-title">Mosaics by Middlebrick</h1>
			</div>	
		
			<div class="hero-images">
				<?php query_posts('post_type=hero_image'); ?>
				<?php while ( have_posts() ) : the_post(); 
					$image = get_field("hero_image");
					$size = "full";
				?>
				<figure class="hero-image">
					<?php if ($image) {
						echo wp_get_attachment_image( $image, $size );
					} ?>
				</figure>	
				<?php endwhile; // end of the loop. ?>
				<figure class="hero-image shop-entrance animate rotate">
					<img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/img/Middlebrick-Shop-Entrance.png" alt="Enter Middlebrick shop graphic">
				
				</figure>
			</div>

			<div class="recent-builds-heading">
				<h2>Recent Builds</h2>
			</div>

			<div class="recent-builds">
				<?php query_posts('posts_per_page=2&post_type=recent_builds'); ?>
				<?php while ( have_posts() ) : the_post(); 
					$image = get_field("recent_build");
					$size = "full";
				?>
				<figure class="recent-build">
					<?php if ($image) {
						echo wp_get_attachment_image( $image, $size );
					} ?>
				</figure>
				<?php endwhile; ?>
				<?php wp_reset_query(); ?>
			</div>

			<div class="shop-link-heading">
				<h2 class="shop-link-h2">
					<a href="<?php echo site_url("/shop/") ?>">Visit Shop for More</a>
				</h2>
			</div>

			
		</div><!-- .main-content -->
		

	</div><!-- #primary -->
    
	

<?php get_footer(); ?>
