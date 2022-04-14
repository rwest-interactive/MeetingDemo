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
			while ( have_posts() ) : the_post();
      	the_content();
			endwhile;
			wp_reset_postdata();
			?>

		</section>

		<!-- ******* Featured post block ******* -->
		<!-- Leaving here in case we decide to add to blog posts by default -->

		<?php /*
		$id = 'single-post-featured-post';
		$className = 'featured-post block ';

		$featured_post = get_field('featured_post', 'options');
		$current_page_id = get_the_ID();

		if( $featured_post ): ?>
		    <div id="<?php echo esc_attr($id); ?>" class="<?php echo esc_attr($className); ?>">

						<?php foreach( $featured_post as $post ):
		            $featured_post_id = get_the_ID($post->ID);

								if($current_page_id != $featured_post_id) : ?>

									<div class="block-inner row">
											<?php
		                  // Setup this post for WP functions (variable must be named $post).
		                  // setup_postdata($post);
		                  $date = rw_anotherdateconverter($post->post_date);
		                  $permalink = get_permalink( $post->ID );
		                  $title = get_the_title( $post->ID );
		                  ?>

		                  <div class="columns small-12 medium-6 image">
		                      <?php echo get_the_post_thumbnail( $post, 'featured-post-block' ); ?>
		                  </div>

		                  <div class="columns small-12 medium-6 content">
		                      <p><?php echo $date; ?></p>
		                      <h2><?php echo $title?></h2>
		                      <?php
		                      if ($excerpt = get_the_excerpt($post->ID )) {
		                          ?>
		                          <p><?php echo $excerpt; ?></p>
		                          <?php
		                      }
		                      ?>
		                      <a class="button" href="<?php echo $permalink; ?>">View Article</a>
		                  </div>
										</div>
		            <?php endif; ?>

		        <?php endforeach; ?>
		    </div>

		    <?php
		    // Reset the global post object so that the rest of the page works correctly.
		    // wp_reset_postdata(); ?>
		    </div>

		<?php endif; */ ?>
		<!-- End Featured post block -->

		<?php

		$args = array(
		    'posts_per_page'   => 3,
		    'post_type'        => 'post',
				'post__not_in' => array(get_the_ID()),
		);
		$the_query = new WP_Query( $args );

		// Blog Post Grid
		if ( $the_query->have_posts() ) : ?>
		<div class="site-main">
			<div class="container blog-grid">

				<ul class="recent-blog-posts row">
					<?php
					while ( $the_query->have_posts() ) : $the_query->the_post();
						$thumbnail = get_the_post_thumbnail( $post->ID, 'medium-large' );
						$postDate = date("F d, Y", strtotime($post->post_date));
						?>

						<li id="post-<?php the_ID(); ?>" class="blog-post columns small-12 medium-6 large-4" >
							<div class="card card-blog-post">
								<div class="image-container">
									<?php echo $thumbnail; ?>
								</div>

								<div class="content">
									<div class="meta-date">
										<i class="fa fa-clock-o"></i> <?php echo $postDate; ?>
									</div>
									<h3 class="blog-title"><a href="<?php echo get_the_permalink($post->id); ?>"><?php echo $post->post_title; ?></a></h3>
									<?php the_excerpt(); ?>
									<a href="<?php echo get_the_permalink($post->id); ?>" class="button button-dark">View Article</a>
								</div>
							</div>
						</li>
						<?php
					endwhile;
					?>
				</ul><!-- END .recent-blog-posts -->
			</div><!-- END .container -->
		</div>

		<?php endif;
		?>

	</main><!-- #main -->

<?php
get_footer();
