<?php

/**
 * Content with Single Column Content with Background Image Block Template.
 *
 * @param   array $block The block settings and attributes.
 * @param   string $content The block inner HTML (empty).
 * @param   bool $is_preview True during AJAX preview.
 * @param   (int|string) $post_id The post ID this block is saved to.
 */
// Create id attribute allowing for custom "anchor" value.
$id = 'single-column-content-with-bg' . $block['id'];
if( !empty($block['anchor']) ) {
	$id = $block['anchor'];
}
$className = 'single-column-content-with-bg block ';
if( !empty($block['className']) ) {
	$className .= ' ' . $block['className'];
}
if( !empty($block['align']) ) {
	$className .= ' align' . $block['align'];
}
$background_image = get_field('background_image');
$screen_color = get_field('screen_color');
$screen_opacity = '.' . get_field('screen_opacity');
$screen = 'style=" background:'.rwest_hex2rgba($screen_color, $screen_opacity).'" ';
$title = get_field('title');
$subtitle = get_field('subtitle');
$buttons = have_rows('buttons');
?>

<div
    id="<?php echo esc_attr($id); ?>"
    class="bg-image <?php echo esc_attr($className); ?>"
    style="background-image: url('<?php echo $background_image['sizes']['extra-large']; ?>');"
>
<div class="screen" <?php echo $screen; ?>></div>
	<div class="block-inner row">
        <div class="columns small-12 medium-12 large-5 content">
            <h3><?php echo $title; ?></h3>
            <p><?php echo $subtitle; ?></p>
            <?php
                if( $buttons ):
                    while( have_rows('buttons') ) : the_row();
                        $button_link = get_sub_field('button_link');
                        ?>
                        <a class="button" target="<?php echo $button_link['target']; ?>" href="<?php echo $button_link['url']; ?>"><?php echo $button_link['title']; ?></a>
                        <?php
                    endwhile;
                endif;
            ?>
        </div>
        <div class="columns small-12 medium-12 hide-for-large bg-image mobile-image" style="background-image: url('<?php echo $background_image['sizes']['extra-large']; ?>');"></div>
    </div>
</div>
