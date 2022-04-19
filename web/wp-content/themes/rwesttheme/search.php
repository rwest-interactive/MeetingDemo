<?php
/**
 * The template for displaying search results pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#search-result
 *
 * @package rwest
 */

get_header();
?>

	<main id="primary" class="site-main">

		<section id="search-results">

			<div class="container">

					<header class="page-header">
						<?php if ( have_posts() ) : ?>

							<h1>
								<?php /* translators: %s: search query. */
									printf( esc_html__( 'Search Results for: %s', 'abm' ), '<span>' . get_search_query() . '</span>' );
								?>
							</h1>

						<?php endif; ?>
					</header><!-- .page-header -->

					<div class="wrapper">
						<div class="inner-wrapper row row-section align-center small-collapse">
							<?php if ( have_posts() ) : ?>
							<?php
							/* Start the Loop */
							while ( have_posts() ) :
								the_post();

									/**
									 * Run the loop for the search to output the results.
									 * If you want to overload this in a child theme then include a file
									 * called content-search.php and that will be used instead.
									 */
									get_template_part( 'template-parts/content', 'search' );

								endwhile;

								// the_posts_navigation();

							else :

								get_template_part( 'template-parts/content', 'none' ); ?>

							<?php endif; ?>
						</div>
					</div>

			</div><!-- END .container -->

		</section><!-- END #search-results -->

	</main><!-- #main -->

<?php
get_footer();
