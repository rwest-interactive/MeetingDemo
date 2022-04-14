<?php

/**
 * Hero Slider Block Template.
 *
 * @param   array $block The block settings and attributes.
 * @param   string $content The block inner HTML (empty).
 * @param   bool $is_preview True during AJAX preview.
 * @param   (int|string) $post_id The post ID this block is saved to.
 */

// Create id attribute allowing for custom "anchor" value.
$id = 'hero-slider-' . $block['id'];
if (!empty($block['anchor'])) {
	$id = $block['anchor'];
}
$className = 'hero-slider block ';
if (!empty($block['className'])) {
	$className .= ' ' . $block['className'];
}
if (!empty($block['align'])) {
	$className .= ' align' . $block['align'];
}


// Check rows exists.
if (have_rows('hero_slider')) :
	$count = count(get_field('hero_slider'));
?>

	<div id="<?php echo esc_attr($id); ?>" class="<?php echo esc_attr($className); ?>">

		<?php if ($count >= 1) { ?>
			<div class="slider">
				<?php
        $counter = 0;
				// Loop through rows.
				while (have_rows('hero_slider')) : the_row();
					// Load sub field value.
					$background_options = get_sub_field('background_options');
					if ($background_options === 'image') {
						$background_image = get_sub_field('background_image');
					} else {
						$background_video = get_sub_field('background_video');
					}

					$mobile_image = get_sub_field('hero_slider_mobile_image');
					$text_color = get_sub_field('text_color');
					$screen_color = get_sub_field('screen_color');
					$screen_opacity = '.' . get_sub_field('screen_opacity');
					$screen = $screen_color ? 'style=" background:' . rwest_hex2rgba($screen_color, $screen_opacity) . '" ' : '';
					$title = get_sub_field('title');
					$smaller_title = get_sub_field('smaller_title');
					$subtitle = get_sub_field('subtitle');
					$hero_slider_buttons = get_sub_field('hero_slider_buttons');
					$alignment = 'align-' . get_sub_field('align_content');
					$options = $text_color . ' ' . $alignment;
          $counter++;

					if ($background_options === 'image') { ?>
						<div class="row bg-image slide-<?php echo $counter?> <?php echo $options; ?>">
							<style type="text/css">
								<?php /* if (!empty($mobile_image)) : ?>

								@media screen and (max-width: 767px) {
									div#<?php echo esc_attr($id); ?> .bg-image {
										background-image: url('<?php echo $mobile_image['sizes']['medium-large']; ?>');
									}
								}

								<?php else : ?>

								@media screen and (max-width: 767px) {
									div#<?php echo esc_attr($id); ?> .bg-image {
										background-image: url('<?php echo $background_image['sizes']['medium-large']; ?>');
									}
								}

								<?php endif; */ ?>

								/* @media screen and (max-width: 720px) {
									div#<?php // echo esc_attr($id); ?> .bg-image {
										background-image: url('<?php // echo $background_image['sizes']['medium-large']; ?>');
									}
								} */
                <?php 
								echo "@media screen and (min-width: 768px) {
									div#".esc_attr($id)." .bg-image.slide-".$counter."{
										background-image: url('".$background_image['sizes']['large']."');
									}
								}

								@media screen and (min-width: 1440px) {
									div#".esc_attr($id)." .bg-image.slide-".$counter." {
										background-image: url('".$background_image['sizes']['extra-large']."');
									}
								}";
                ?>

							</style>
						<?php } else { ?>
							<div class="row bg-video <?php echo $options; ?>">
								<video muted loop autoplay controls src="<?php echo $background_video['url']; ?>"></video>
							<?php } ?>

							<div class="screen" <?php echo $screen; ?>></div>

							<?php if (!empty($mobile_image)) : ?>
								<img class="mobile-only" src="<?php echo $mobile_image['sizes']['medium-large']; ?>" alt="<?php echo $mobile_image['alt']; ?>">
							<?php else : ?>
								<img class="mobile-only" src="<?php echo $background_image['sizes']['medium-large']; ?>" alt="<?php echo $background_image['alt']; ?>">
							<?php endif; ?>

							<div class="columns small-12 content">
								<?php if ($title) { ?>
									<h1 <?php if ($smaller_title) {
											echo 'class="smaller"';
										} ?>><?php echo $title; ?></h1>
								<?php } ?>

								<?php if ($subtitle) { ?>
									<p><?php echo $subtitle; ?></p>
								<?php } ?>

								<?php
								if ($hero_slider_buttons) :
									while (have_rows('hero_slider_buttons')) : the_row();
										$button_link = get_sub_field('button')['url'];
										$button_text = get_sub_field('button')['title'];
										$button_target = get_sub_field('button')['target'] ? get_sub_field('button')['target'] : '_self';
								?>
										<a class="button" target="<?php echo $button_target; ?>" href="<?php echo $button_link; ?>"><?php echo $button_text; ?></a><br>
								<?php
									endwhile;
								endif;
								?>
							</div>

							</div><!-- End .row -->



						<?php
					endwhile; // End loop.
						?>
						</div>
					<?php } ?>

			</div> <!-- End desktop -->

	</div>

<?php endif; ?>
