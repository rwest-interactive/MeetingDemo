<?php

/**
 * Download Block Template.
 *
 * @param   array $block The block settings and attributes.
 * @param   string $content The block inner HTML (empty).
 * @param   bool $is_preview True during AJAX preview.
 * @param   (int|string) $post_id The post ID this block is saved to.
 */

// Create id attribute allowing for custom "anchor" value.
$id = 'download' . $block['id'];
if( !empty($block['anchor']) ) {
	$id = $block['anchor'];
}
$className = 'download block ';
if( !empty($block['className']) ) {
	$className .= ' ' . $block['className'];
}
if( !empty($block['align']) ) {
	$className .= ' align' . $block['align'];
}

$title = get_field('title');
$file = get_field('file');
$button_text = get_field('button_text');
$background_color = get_field('background_color');

?>

<div id="<?php echo esc_attr($id); ?>" class="<?php echo esc_attr($className); ?>">

<div class="block-inner row">
        <div class="columns">
            <h3><?php echo $title; ?></h3>
            <a href="<?php echo $file['url']; ?>" class="button" download><?php echo $button_text; ?></a>
        </div>
    </div>

	<style type="text/css">
		#<?php echo $id; ?> {
			background: <?php echo $background_color; ?>;

		}
	</style>
</div>
