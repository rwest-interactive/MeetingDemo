<?php

/**
 * Content with Image Slider Block Template.
 *
 * @param   array $block The block settings and attributes.
 * @param   string $content The block inner HTML (empty).
 * @param   bool $is_preview True during AJAX preview.
 * @param   (int|string) $post_id The post ID this block is saved to.
 */
// Create id attribute allowing for custom "anchor" value.
$id = 'content-with-image-slider' . $block['id'];
if (!empty($block['anchor'])) {
    $id = $block['anchor'];
}
$className = 'content-with-image-slider block ';
if (!empty($block['className'])) {
    $className .= ' ' . $block['className'];
}
if (!empty($block['align'])) {
    $className .= ' align' . $block['align'];
}
$background_image = get_field('background_image');
$title = get_field('title');
$subtitle = get_field('subtitle');
$buttons = have_rows('buttons');
$slider = have_rows('slider');
$screen_color = get_field('screen_color');
$screen_opacity = '.' . get_field('screen_opacity');
$screen = 'style=" background:'.rwest_hex2rgba($screen_color, $screen_opacity).'" ';
?>

<div id="<?php echo esc_attr($id); ?>" class="bg-image <?php echo esc_attr($className); ?>" style="background-image: url('<?php echo $background_image['sizes']['large']; ?>');">
  <div class="screen" <?php echo $screen; ?>></div>
    <div class="block-inner row">
        <div class="columns small-12 medium-12 large-5 content small-order-2 medium-order-2 large-order-1">
            <h3><?php echo $title; ?></h3>
            <p><?php echo $subtitle; ?></p>
            <?php
            // Check rows exists.
            if ($buttons) :
                // Loop through rows.
                while (have_rows('buttons')) : the_row();
                    // Load sub field value.
                    $button_link = get_sub_field('button_link');
                    if ($button_link) {
                    ?>
                        <a class="button" target="<?php echo $button_link['target']; ?>" href="<?php echo $button_link['url']; ?>"><?php echo $button_link['title']; ?></a>
                    <?php
                    }
                // End loop.
                endwhile;
            endif;
            ?>
        </div>

        <div class="columns small-12 medium-12 large-7 small-order-1 medium-order-1 large-order-2">
            <div class="slider-container">
                <div class="responsive">
                    <?php
                    // Check rows exists.
                    if ($slider) :
                        // Loop through rows.
                        while (have_rows('slider')) : the_row();
                            // Load sub field value.
                            $image = get_sub_field('image');
                            $text = get_sub_field('text');
                            $link = get_sub_field('link');
                            ?>

                            <div class="slide">

                                <?php if ($link) { ?>
                                    <a href="<?php echo $link['url']; ?>">
                                <?php } ?>

                                    <?php if($text) { ?>
                                        <h6 class="desktop-label hide-for-small-only"><?php echo $text; ?></h6>
                                    <?php } ?>

                                    <?php if($image) { ?>
                                        <img src="<?php echo $image['url']; ?>" alt="<?php echo $image['alt']; ?>">
                                    <?php } ?>

                                <?php if ($link) { ?>
                                    </a>
                                <?php } ?>


                                <?php if($text) { ?>
                                    <h6 class="mobile-label show-for-small-only"><?php echo $text; ?></h6>
                                <?php } ?>

                            </div>

                        <?php
                        // End loop.
                        endwhile;
                    endif;
                    ?>
                </div>
            </div>
        </div>
    </div>
</div>
