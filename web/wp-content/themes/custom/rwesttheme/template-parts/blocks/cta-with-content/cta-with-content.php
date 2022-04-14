<?php

/**
 * Two Column CTA with Content Block Template.
 *
 * @param   array $block The block settings and attributes.
 * @param   string $content The block inner HTML (empty).
 * @param   bool $is_preview True during AJAX preview.
 * @param   (int|string) $post_id The post ID this block is saved to.
 */
// Create id attribute allowing for custom "anchor" value.
$id = 'cta-with-content-' . $block['id'];
if( !empty($block['anchor']) ) {
	$id = $block['anchor'];
}
$className = 'cta-with-content block ';
if( !empty($block['className']) ) {
	$className .= ' ' . $block['className'];
}
if( !empty($block['align']) ) {
	$className .= ' align' . $block['align'];
}
$large_text_side_choice = get_field('large_text_side_choice');
$large_text = get_field('large_text');
$content_side = ($large_text_side_choice === '1')?'2':'1';
$large_text_background_color = get_field('large_text_background_color');
$background_image = get_field('background_image');
$screen_color = get_field('screen_color');
$screen_opacity = '.' . get_field('screen_opacity');
$screen = 'style=" background:'.rwest_hex2rgba($screen_color, $screen_opacity).'" ';
$title = get_field('title');
$subtitle = get_field('subtitle');
// $content = get_field('content');
$button_link = get_field('button_link');

?>
<div id="<?php echo esc_attr($id); ?>" class="<?php echo esc_attr($className); ?>">
	<div class="block-inner row">

        <div
            class="cta bg-image columns small-12 medium-6 small-order-1 medium-order-<?php echo esc_attr($large_text_side_choice); ?>"
            style="background-image: url('<?php echo $background_image['sizes']['large']; ?>');"
        >
            <div class="screen" <?php echo $screen; ?>></div>
            <h2><?php echo $large_text; ?></h2>
        </div>

        <div
            class="cta-content columns small-12 medium-6 small-order-2 medium-order-<?php echo esc_attr($content_side); ?>"
            style="background-color: <?php echo $large_text_background_color; ?>;"
        >
            <h3><?php echo $title; ?></h3>
            <h5><?php echo $subtitle; ?></h5>
            <!-- <InnerBlocks /> -->
            <a target="<?php echo $button_link['target']; ?>" href="<?php echo $button_link['url']; ?>" class="button"><?php echo $button_link['title']; ?></a>
        </div>
	</div>

	<style type="text/css">
		#<?php echo $id; ?> .block-inner .cta{
			background: <?php echo $background_color; ?>;
		}
	</style>

</div>
