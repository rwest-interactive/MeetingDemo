<?php

/**
 * The main template file - Used for Blog Archive page
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package R\west
 */

get_header();
?>

<main id="primary" class="site-main">
  <!-- TODO this need to be controlled in the admin -->
	<!-- <header class="row blog-header no-max">
		<div class="columns">
			<h2>OUR STORIES</h2>
		</div>
	</header> -->

	<?php
  //TODO 
  // I would like to make this more modular
  /*

	if  ($featured_post = get_field('featured_post', 'options')) {
		foreach ($featured_post as $post) {
			setup_postdata($post);
			$thumbnail = get_the_post_thumbnail($post->ID, 'medium-large');
			$postDate = date("F d, Y", strtotime($post->post_date));
	?>
			<section class="featured-post">
				<div class="block-inner row">
					<div class="columns medium-6 small-12 image-col">
						<?php echo $thumbnail; ?>
					</div>
					<div class="columns medium-6 small-12">
						<div class="content">
							<div class="meta-date">
								<i class="fa fa-clock-o"></i> <?php echo $postDate; ?>
							</div>
							<h2 class="blog-title"><a href="<?php echo get_the_permalink($post->id); ?>"><?php echo $post->post_title; ?></a></h2>
							<?php the_excerpt(); ?>
							<a href="<?php echo get_the_permalink($post->id); ?>" class="button">View Article</a>
						</div>
					</div>
				</div>
			</section>
	<?php
		}
		wp_reset_postdata();
	}
  */
	?>

	<?php
  //TODO
  // Does post_type have to be declared on the home page if it is 'post' which is the default
  // I think this should be handeled in the pre_get_post function.  definitly if the default is being used.
	$post_query = new WP_Query(
		array(
			'post_type' => 'post',
			'posts_per_page' => 9
		) // additional posts added in load more
	);
  //TODO
  // most of this seems fine. But need to not add text in the template. 
	if ($post_query->have_posts()) : ?>
		<div class="container blog-grid">\
      test
			<div class="row blog-heading">
				<div class="columns">
					<h5>All Articles</h5>
				</div>
			</div>
			<ul id="ajax-posts" class="recent-blog-posts row">

				<?php while ($post_query->have_posts()) : $post_query->the_post();

					get_template_part('template-parts/content', 'blog-grid-item');

				endwhile; ?>

			</ul><!-- END .recent-blog-posts -->

			<!-- <div class="row blog-load-more">
				<div class="columns text-center">
					<a id="more_posts" class="button button-dark-solid" role="button" tabindex="0">Load More</a>
				</div>
			</div> -->

		</div><!-- END .container -->

	<?php
	else :

		get_template_part('template-parts/content', 'none');

	endif;
	?>
</main><!-- #main -->
<?php
get_footer();