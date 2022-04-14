<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package rwest
 */

get_header();
?>

	<main id="primary" class="site-main">
		<section class="blog-content">
			<?php
			while ( have_posts() ) :
				the_post();

				get_template_part( 'template-parts/content', get_post_type() );

				echo '<section class="rwest-post-navigation"><div class="container">';
					the_post_navigation(
						array(
							'prev_text' => '<span class="nav-subtitle">' . esc_html__( 'Previous Post:', 'rwest' ) . '</span> <br> <span class="nav-title">%title</span>',
							'next_text' => '<span class="nav-subtitle">' . esc_html__( 'Next Post:', 'rwest' ) . '</span> <br> <span class="nav-title">%title</span>',
						)
					);
				echo '</div></section>';

			endwhile; // End of the loop.
			?>

		</section><!-- .blog-content -->

	</main><!-- #main -->

<?php
get_footer();
