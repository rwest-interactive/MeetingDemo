<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package rwest
 */

get_header();
?>

	<main id="primary" class="site-main">

		<?php
		if ( have_posts() ) :
      //TODO
      // need to go look up how is_home and is_front_page work again
			if ( is_home() && ! is_front_page() ) :
				?>
				<header>
					<h1 class="page-title screen-reader-text"><?php single_post_title(); ?></h1>
				</header>
				<?php
			endif;

			/* Start the Loop */
			while ( have_posts() ) :
				the_post();

				/*
				 * Include the Post-Type-specific template for the content.
				 * If you want to override this in a child theme, then include a file
				 * called content-___.php (where ___ is the Post Type name) and that will be used instead.
				 */
        //TODO
        // from what i can tell this is only firing on 'post' or 'page'.'
        // need to research if there is any benifit on adding cpt's
				get_template_part( 'template-parts/content', get_post_type() );

			endwhile;
      //TODO
      // this is a WP hook
      // need to research if this is styled. my hunch is no.
			the_posts_navigation();

		else :
      //TODO
      // this is the catch all. this is good.
			get_template_part( 'template-parts/content', 'none' );

		endif;
		?>

	</main><!-- END #main -->

<?php
get_footer();
