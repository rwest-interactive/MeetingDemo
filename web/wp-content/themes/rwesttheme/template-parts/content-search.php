<?php
/**
 * Template part for displaying results in search pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package rwest
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class('result-card columns small-12 medium-6 large-4'); ?>>

			<!-- <header class="entry-header">
				<?php // the_title( sprintf( '<h2 class="entry-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h2>' ); ?>

				<?php // if ( 'post' === get_post_type() ) : ?>
				<div class="entry-meta">
					<?php
					// rwest_posted_on();
					// rwest_posted_by();
					?>
				</div>
				<?php // endif; ?>
			</header>-->

			<div class="result">
				<a href="<?php echo get_post_permalink() ?>">

				<?php if ( has_post_thumbnail() ) {
					$result_bg_image = wp_get_attachment_url( get_post_thumbnail_id($post->ID) );
					echo '<div class="result-thumbnail" style="height:300px;width:auto;background-image: url('. $result_bg_image.');background-repeat: no-repeat;background-size:cover;background-position-x:center;background-position-y:center;" role="presentation"></div>';

				} else {

					$fallback_bg_image = get_template_directory_uri().'/assets/src/img/poster_bison.jpg';
					echo '<div class="result-thumbnail" style="height:300px;width:auto;background-image: url('.$fallback_bg_image.');background-repeat: no-repeat;background-size:cover;background-position-x:center;background-position-y:center;" role="presentation"></div>';
				} ?>

				<div class="result-details">
						<p class="headline-paragraph"><?php the_title(); ?></p>
				</div>
				<!-- <div class="entry-summary">
					<?php // the_excerpt(); ?>
				</div>-->
			</a>

			</div>

	<!-- <footer class="entry-footer">
		<?php // rwest_entry_footer(); ?>
	</footer> -->

</article><!-- END #post-<?php the_ID(); ?> -->
