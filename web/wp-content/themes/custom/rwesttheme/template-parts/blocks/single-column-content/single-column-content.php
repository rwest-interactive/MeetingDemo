<?php

/**
 * Single Column Content Block Template.
 *
 * @param   array $block The block settings and attributes.
 * @param   string $content The block inner HTML (empty).
 * @param   bool $is_preview True during AJAX preview.
 * @param   (int|string) $post_id The post ID this block is saved to.
 */

// Create id attribute allowing for custom "anchor" value.
$id = 'single-column-content' . $block['id'];
if( !empty($block['anchor']) ) {
	$id = $block['anchor'];
}
$className = 'single-column-content block ';
if( !empty($block['className']) ) {
	$className .= ' ' . $block['className'];
}
if( !empty($block['align']) ) {
	$className .= ' align' . $block['align'];
}

$single_column_content = get_field('single_column_content');
$single_column_buttons = have_rows('single_column_buttons');
$background_option = get_field('single_column_background');

if ($background_option === 'color') {
	$background_color = get_field('single_column_bg_color');
	$background = "background: {$background_color};";
	$overlay = "";
}
else if ($background_option === 'image') {
	$bg_url = get_field('single_column_bg_img')['sizes']['extra-large'];
	$background = "background-image: url('{$bg_url}');";
	$overlay_opacity = get_field('single_column_bg_overlay_opacity');
	$opacity = $overlay_opacity / 100;
	$overlay = "background: rgba(0,0,0,{$opacity});";
}

?>

<div id="<?php echo esc_attr($id); ?>" class="<?php echo esc_attr($className); ?>" style="<?php echo $background; ?>">
	<div class="overlay" style="<?php echo $overlay; ?>"></div>
		<div class="block-inner row">
        	<div class="columns large-9">
            	<?php echo $single_column_content; ?>
				<?php if( $single_column_buttons ):
					while( have_rows('single_column_buttons') ) : the_row();
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
