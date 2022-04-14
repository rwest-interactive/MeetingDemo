<?php

/**
 * Large Image with Text Block Template.
 *
 * @param   array $block The block settings and attributes.
 * @param   string $content The block inner HTML (empty).
 * @param   bool $is_preview True during AJAX preview.
 * @param   (int|string) $post_id The post ID this block is saved to.
 */


// Create id attribute allowing for custom "anchor" value.
$id = 'large-image-with-text-' . $block['id'];
if (!empty($block['anchor'])) {
    $id = $block['anchor'];
}
$className = 'large-image-with-text block ';
if (!empty($block['className'])) {
    $className .= ' ' . $block['className'];
}
if (!empty($block['align'])) {
    $className .= ' align' . $block['align'];
}

$background_image = get_field('background_image');
$text = get_field('text');
$text_alignment = 'align-' . get_field('text_alignment');
$screen_color = get_field('screen_color');
$screen_opacity = '.' . get_field('screen_opacity');
$screen = 'style=" background:'.rwest_hex2rgba($screen_color, $screen_opacity).'" ';
$padding = get_field('padding');
?>

<div id="<?php echo esc_attr($id); ?>" class="bg-image <?php echo esc_attr($className); ?>">
<div class="screen" <?php echo $screen; ?>></div>
    <div class="block-inner row <?php echo esc_attr($text_alignment); ?>">
        <div class="columns small-12 large-6">
            <?php if ($text) { ?>
                <h3><?php echo $text; ?></h3>
            <?php } ?>
        </div>
    </div>

    <style type="text/css">
        #<?php echo $id; ?> {
            padding-top: <?php echo $padding; ?>px;
            padding-bottom: <?php echo $padding; ?>px;
        }
    </style>
    <style type="text/css">
        @media screen and (min-width: 1441px) {
            #<?php echo $id; ?> {
                background-image: url('<?php echo $background_image['sizes']['extra-large']; ?>') !important;
            }
        }

        @media screen and (max-width: 1440px) {
            #<?php echo $id; ?> {
                background-image: url('<?php echo $background_image['sizes']['large']; ?>') !important;
            }
        }

        @media screen and (max-width: 720px) {
            #<?php echo $id; ?> {
                background-image: url('<?php echo $background_image['sizes']['medium-large']; ?>') !important;
            }
        }
    </style>
</div>
