<?php

/**
 * Hero Block Template.
 *
 * @param   array $block The block settings and attributes.
 * @param   string $content The block inner HTML (empty).
 * @param   bool $is_preview True during AJAX preview.
 * @param   (int|string) $post_id The post ID this block is saved to.
 */

// Create id attribute allowing for custom "anchor" value.
$id = 'hero' . $block['id'];
if (!empty($block['anchor'])) {
	$id = $block['anchor'];
}
$className = 'hero block ';
if (!empty($block['className'])) {
	$className .= ' ' . $block['className'];
}
if (!empty($block['align'])) {
	$className .= ' align' . $block['align'];
}

$desktop_background_image = get_field('hero_desktop_background_image');
$mobile_image = get_field('hero_mobile_image');
$screen_color = get_field('hero_screen_color');
$screen_opacity = '.' . get_field('hero_screen_opacity');
$screen = $screen_color ? 'style=" background:' . rwest_hex2rgba($screen_color, $screen_opacity) . '" ' : '';
$title = get_field('hero_title');
$smaller_title = get_field('hero_smaller_title');
$subtitle = get_field('hero_subtitle');
$hero_buttons = get_field('hero_buttons');
?>

<div id="<?php echo esc_attr($id); ?>" class="bg-image <?php echo esc_attr($className); ?>">
	<div class="screen" <?php echo $screen; ?>></div>

	<div class="block-inner row">
		<?php if(!empty($mobile_image)) : ?>
			<img class="mobile-only" src="<?php echo $mobile_image['sizes']['medium-large']; ?>" alt="<?php echo $mobile_image['alt']; ?>">
		<?php else : ?>
			<img class="mobile-only" src="<?php echo $desktop_background_image['sizes']['medium-large']; ?>" alt="<?php echo $desktop_background_image['alt']; ?>">
		<?php endif; ?>

    	<div class="columns small-12 medium-12 large-10">
			<div class="content">
				<?php if ($title) { ?>
					<h1 <?php if ($smaller_title) {
							echo 'class="smaller"';
						} ?>><?php echo $title; ?></h1>
				<?php } ?>
				<?php if ($subtitle) { ?>
					<p><?php echo $subtitle; ?></p>
				<?php } ?>
				<?php if ($hero_buttons) :
					while (have_rows('hero_buttons')) : the_row();
						$button_link = get_sub_field('button')['url'];
						$button_text = get_sub_field('button')['title'];
						$button_target = get_sub_field('button')['target'] ? get_sub_field('button')['target'] : '_self';
						?>
						<a class="button" target="<?php echo $button_target; ?>" href="<?php echo $button_link; ?>"><?php echo $button_text; ?></a><br>
						<?php
					endwhile;
				endif; ?>
			</div>
		</div>
	</div>

</div>


<style type="text/css">
	@media screen and (min-width: 768px) {
		div#<?php echo esc_attr($id); ?> {
			background-image: url('<?php echo $desktop_background_image['sizes']['large']; ?>') !important;
		}
	}

	@media screen and (min-width: 1441px) {
		div#<?php echo esc_attr($id); ?> {
			background-image: url('<?php echo $desktop_background_image['sizes']['extra-large']; ?>') !important;
		}
	}

</style>
