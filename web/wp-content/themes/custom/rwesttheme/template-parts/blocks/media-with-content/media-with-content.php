<?php

/**
 * Media with Content Block Template.
 *
 * @param   array $block The block settings and attributes.
 * @param   string $content The block inner HTML (empty).
 * @param   bool $is_preview True during AJAX preview.
 * @param   (int|string) $post_id The post ID this block is saved to.
 */

// Create id attribute allowing for custom "anchor" value.
$id = 'media-with-content' . $block['id'];
if (!empty($block['anchor'])) {
	$id = $block['anchor'];
}
$className = 'media-with-content block ';
if (!empty($block['className'])) {
	$className .= ' ' . $block['className'];
}
if (!empty($block['align'])) {
	$className .= ' align' . $block['align'];
}

$split_options = get_field('split_options');
$media_side = get_field('media_side');
$content_side = ($media_side === '1') ? '2' : '1';
$background_color = get_field('background_color');
$image = get_field('image');
$image_fit = get_field('image_fit');
$title = get_field('title');
$subtitle = get_field('subtitle');
$detail = get_field('detail');
$content = get_field('content');
$button_link = get_field('button_link');
$media_cols_span = (12 - $split_options);
// rwest_dump($button_link);
// die;
// if( $button_link['target'] == '') {
// 	$button_link['target'] = '_self';
// }
?>

<div id="<?php echo esc_attr($id); ?>" class="<?php echo esc_attr($className); ?>">
	<div class="block-inner row">
		<div class="columns small-12 medium-<?php echo esc_attr($media_cols_span); ?> small-order-2 medium-order-<?php echo esc_attr($content_side); ?>">
			<div class="content">
				<?php if ($title) { ?>
					<h3><?php echo $title; ?></h3>
				<?php } ?>
				<?php if ($subtitle) { ?>
					<h5><?php echo $subtitle; ?></h5>
				<?php } ?>
				<?php if ($detail) { ?>
					<p class="detail"><?php echo $detail; ?></p>
				<?php } ?>
				<?php if ($content) { ?>
					<p><?php echo $content; ?></p>
				<?php } ?>
				<?php if ($button_link) { ?>
					<a href="<?php echo $button_link['url']; ?>" class="button" target="<?php echo $button_link['target']; ?>"><?php echo $button_link['title']; ?></a>
				<?php } ?>
			</div>
		</div>
		<div class="columns small-12 medium-<?php echo esc_attr($split_options); ?> small-order-1 medium-order-<?php echo esc_attr($media_side); ?> <?php if ($image_fit) {
																																						echo esc_attr($image_fit);
																																					} else {
																																						echo 'flush';
																																					} ?>">
			<?php
			$adaptiveImage = array(
				'default' => $image['sizes']['medium-large'],
				'alt' => $image['alt'],
				'400' => $image['sizes']['medium-large'],
				'640' => $image['sizes']['medium-large'],
				'720' => $image['sizes']['medium-large'] . ', ' . $image['sizes']['large'] . ' 2x'
			);
			adaptiveImage($adaptiveImage, true);
			?>

		</div>
	</div>
	<style type="text/css">
		#<?php echo $id; ?> {
			background: <?php echo $background_color; ?>;
		}
	</style>
</div>
