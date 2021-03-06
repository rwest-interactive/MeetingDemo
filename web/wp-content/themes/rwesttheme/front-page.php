<?php
/**
 * The template for displaying the front page, aka the home page
 *
 * This is the template that displays the home page content.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package rwest
 */

get_header();
?>

	<main id="primary" class="site-main">
		<?php
		while ( have_posts() ) :
			the_post();
      // echo 'test';
			get_template_part( 'template-parts/content', 'front-page' );
		endwhile; // End of the loop.
		?>
	</main><!-- END #main -->

<?php
get_footer();
