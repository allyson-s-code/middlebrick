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
					$url = get_field("shop_page_url");
					$size = "full";
				?>
				<figure class="hero-image">
					<a href="<?php echo $url ?>">
						<?php if ($image) {
							echo wp_get_attachment_image( $image, $size );
						} ?>
					</a>
				</figure>	
				<?php endwhile; // end of the loop. ?>
				<figure class="hero-image shop-entrance">
					<a href="<?php echo site_url('/middlebrick/shop/') ?>">
					<img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/img/Middlebrick-Shop-Entrance.png" alt="Enter Middlebrick shop graphic">
					<button class="btn_shop-now">Shop<br>Now</button>
					</a>
				</figure>
			</div>

			<div class="recent-builds-heading">
				<h2>Recent Builds</h2>
			</div>

			<div class="recent-builds">
				<?php query_posts('posts_per_page=2&post_type=recent_builds'); ?>
				<?php while ( have_posts() ) : the_post(); 
					$image = get_field("recent_build");
					$url = get_field("shop_page_url");
					$size = "full";
				?>
				<figure class="recent-build">
					<a href="<?php echo site_url($url) ?>">
						<?php if ($image) {
							echo wp_get_attachment_image( $image, $size );
						} ?>
					</a>
				</figure>
				<?php endwhile; ?>
				<?php wp_reset_query(); ?>
			</div>

			<div class="shop-link-heading">
				<h2 class="shop-link-h2">
					<a href="<?php echo site_url("/shop/") ?>">Visit Shop for More</a>
				</h2>
			</div>

			<div class="about">
				<h3>About</h3>
				<div class="about_text-wrapper">
					<?php query_posts('posts_per_page=1&post_type=about');?>
						<?php while ( have_posts() ) : the_post(); ?>
							<?php the_field('about_description'); ?>
						<?php endwhile; ?>
					<?php wp_reset_query(); ?>
				</div>
			</div>

			<div class="random-builds-heading">
				<h2>Build Feed</h2>
			</div>

			
			<?php echo do_shortcode('[instagram-feed feed=1]'); ?>
			
		</div><!-- .main-content -->
		

	</div><!-- #primary -->
    
	

<?php get_footer(); ?>
