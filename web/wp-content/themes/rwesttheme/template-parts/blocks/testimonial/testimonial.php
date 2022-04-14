<?php

/**
 * Testimonial Block Template.
 *
 * @param   array $block The block settings and attributes.
 * @param   string $content The block inner HTML (empty).
 * @param   bool $is_preview True during AJAX preview.
 * @param   (int|string) $post_id The post ID this block is saved to.
 */

// Create id attribute allowing for custom "anchor" value.
$id = 'testimonial-' . $block['id'];
if( !empty($block['anchor']) ) {
    $id = $block['anchor'];
}

// Create class attribute allowing for custom "className" and "align" values.
$className = 'testimonial  block ';
if( !empty($block['className']) ) {
    $className .= ' ' . $block['className'];
}
if( !empty($block['align']) ) {
    $className .= ' align' . $block['align'];
}

// Load values and assign defaults.
$title = get_field('title');
$text = get_field('testimonial') ?: 'Your testimonial here...';
$author = get_field('author') ?: 'Author name';
$role = get_field('role') ?: 'Author role';
$image = get_field('image');
$background_color = get_field('background_color');
$text_color = get_field('text_color');
$columnsClassWidth = 'small-12';
if (!empty($image)) {
	$columnsClassWidth .= ' medium-6 ';
}
?>

<div id="<?php echo esc_attr($id); ?>" class="<?php echo esc_attr($className); ?>">
    <div class="block-inner row">
        <h3><?php echo $title; ?></h3>
        <p class="columns <?php echo $columnsClassWidth; ?> testimonial-blockquote">
            <q><?php echo $text; ?></q>
            <cite>-<?php echo $author; ?>,</cite> <?php echo $role; ?>
        </p>
        <?php
        if (!empty($image)) { ?>
            <div class="columns <?php echo $columnsClassWidth; ?> testimonial-image">
                <img src="<?php echo $image['sizes']['thumbnail']; ?>" alt="<?php echo $image['alt']; ?>" >
            </div>
        <?php } ?>
    </div>
    <style type="text/css">
        #<?php echo $id; ?> {
            background: <?php echo $background_color; ?>;
        }
        #<?php echo $id; ?> .block-inner *{
            color: <?php echo $text_color; ?>;
        }
    </style>
</div>
