<?php

/**
 * Single Blog Post Hero Block Template.
 *
 * @param   array $block The block settings and attributes.
 * @param   string $content The block inner HTML (empty).
 * @param   bool $is_preview True during AJAX preview.
 * @param   (int|string) $post_id The post ID this block is saved to.
 */

// Create id attribute allowing for custom "anchor" value.
$id = 'single-post-hero' . $block['id'];
if (!empty($block['anchor'])) {
	$id = $block['anchor'];
}
$className = 'single-post-hero hero block ';
if (!empty($block['className'])) {
	$className .= ' ' . $block['className'];
}
if (!empty($block['align'])) {
	$className .= ' align' . $block['align'];
}

$post_date = get_the_date('F j, Y');
$desktop_background_image = get_field('blog_desktop_background_image');
$mobile_image = get_field('blog_mobile_image');
$title = get_field('blog_title');
$smaller_title = get_field('blog_smaller_title');
$subtitle = get_field('blog_subtitle');
$screen_color = get_field('blog_screen_color');
$screen_opacity = '.' . get_field('blog_screen_opacity');
$screen = $screen_color ? 'style=" background:' . rwest_hex2rgba($screen_color, $screen_opacity) . '" ' : '';
$text_color = get_field('blog_text_color'); ?>


<div class="hero-and-slider-mobile-content">
	<?php if ($title) { ?>
		<h1><?php echo $title; ?></h1>
	<?php } ?>
	<?php if ($subtitle) { ?>
		<p><?php echo $subtitle; ?></p>
	<?php } ?>
</div>

<div id="<?php echo esc_attr($id); ?>" class="bg-image <?php echo esc_attr($className); ?>">
	<div class=" screen" <?php echo $screen; ?>></div>

	<div class="block-inner row <?php echo $text_color; ?>">
		<div class="columns small-12 medium-12 large-10">
			<div class="content">
				<p class="date"><?php echo $post_date; ?></p>
				<?php if ($title) { ?>
					<h1 <?php if ($smaller_title) {
							echo 'class="smaller"';
						} ?>><?php echo $title; ?></h1>
				<?php } ?>
				<?php if ($subtitle) { ?>
					<p><?php echo $subtitle; ?></p>
				<?php } ?>
				<div class="share copyright">
					<p>SHARE NOW</p>
					<ul class="social">
						<li>
							<a target="_blank" href="https://twitter.com/intent/tweet?url=<?php echo get_the_permalink(); ?>" aria-label="Share on Twitter">
								<img src="<?php echo get_stylesheet_directory_uri() . '/assets/src/icons/twitter.svg'; ?>" alt="Share on Twitter">
							</a>
						</li>
						<li>
							<a target="_blank" href="https://www.facebook.com/sharer/sharer.php?u=<?php echo get_the_permalink(); ?>&src=sdkpreparse" class="fb-xfbml-parse-ignore" aria-label="Share on Facebook">
								<img src="<?php echo get_stylesheet_directory_uri() . '/assets/src/icons/facebook.svg'; ?>" alt="Share on Facebook">
							</a>
						</li>
					</ul>
				</div>
			</div>
		</div>
	</div>

</div>

<div class="hero-and-slider-mobile-content blog-share">
	<div class="share copyright">
		<!-- <p>SHARE NOW</p> -->
		<ul class="social">
			<li>
				<a target="_blank" href="https://twitter.com/intent/tweet?url=<?php echo get_the_permalink(); ?>" aria-label="Share on Twitter">
					<img src="<?php echo get_stylesheet_directory_uri() . '/assets/src/icons/twitter.svg'; ?>" alt="Share on Twitter">
				</a>
			</li>
			<li>
				<a target="_blank" href="https://www.facebook.com/sharer/sharer.php?u=<?php echo get_the_permalink(); ?>&src=sdkpreparse" class="fb-xfbml-parse-ignore" aria-label="Share on Facebook">
					<img src="<?php echo get_stylesheet_directory_uri() . '/assets/src/icons/facebook.svg'; ?>" alt="Share on Facebook">
				</a>
			</li>
		</ul>
	</div>
	<p class="date"><?php echo $post_date; ?></p>
</div>


<style type="text/css">
	<?php if (!empty($mobile_image)) { ?>
		@media screen and (max-width: 400px) {
			div#<?php echo esc_attr($id); ?> {
				background-image: url('<?php echo $mobile_image['sizes']['thumbnail']; ?>');
			}
		}

		@media screen and (max-width: 640px) {
			div#<?php echo esc_attr($id); ?> {
				background-image: url('<?php echo $mobile_image['sizes']['medium']; ?>');
			}
		}

		@media screen and (max-width: 720px) {
			div#<?php echo esc_attr($id); ?> {
				background-image: url('<?php echo $mobile_image['sizes']['medium-large']; ?>');
			}
		}

	<?php } else { ?>
		@media screen and (max-width: 400px) {
			div#<?php echo esc_attr($id); ?> {
				background-image: url('<?php echo $desktop_background_image['sizes']['thumbnail']; ?>');
			}
		}

		@media screen and (max-width: 640px) {
			div#<?php echo esc_attr($id); ?> {
				background-image: url('<?php echo $desktop_background_image['sizes']['medium']; ?>');
			}
		}

		@media screen and (max-width: 720px) {
			div#<?php echo esc_attr($id); ?> {
				background-image: url('<?php echo $desktop_background_image['sizes']['medium-large']; ?>');
			}
		}

	<?php } ?>
	@media screen and (max-width: 1440px) {
		div#<?php echo esc_attr($id); ?> {
			background-image: url('<?php echo $desktop_background_image['sizes']['large']; ?>');
		}
	}

	@media screen and (min-width: 1441px) {
		div#<?php echo esc_attr($id); ?> {
			background-image: url('<?php echo $desktop_background_image['sizes']['extra-large']; ?>');
		}
	}
</style>