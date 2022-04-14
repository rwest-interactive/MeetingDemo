<?php

/**
 * Grid Block Template.
 *
 * @param   array $block The block settings and attributes.
 * @param   string $content The block inner HTML (empty).
 * @param   bool $is_preview True during AJAX preview.
 * @param   (int|string) $post_id The post ID this block is saved to.
 */

// Create id attribute allowing for custom "anchor" value.
$id = 'grid' . $block['id'];
if (!empty($block['anchor'])) {
    $id = $block['anchor'];
}
$className = 'grid block ';
if (!empty($block['className'])) {
    $className .= ' ' . $block['className'];
}
if (!empty($block['align'])) {
    $className .= ' align' . $block['align'];
}

?>

<div id="<?php echo esc_attr($id); ?>" class="<?php echo esc_attr($className); ?>">
    <div class="block-inner row">

        <?php
        // Check rows exists.
        if (have_rows('grid')) :
            // Loop through rows.
            while (have_rows('grid')) : the_row();
                // Load sub field value.
                $image = get_sub_field('image');
                $title_text = get_sub_field('title_text');
                $title_link = get_sub_field('title_link');
                $category = get_sub_field('category');
                $subtitle = get_sub_field('subtitle');
                $type = get_sub_field('type');
                $button_link = get_sub_field('button_link');
                // $button_text = get_sub_field('button_text');
        ?>

                <div class="grid-item columns small-12 medium-6">
                    <div class="row grid-item-inner">
                        <div class="columns small-12 medium-4">
                            <img src="<?php echo $image['sizes']['thumbnail']; ?>" alt="<?php echo $image['alt']; ?>">
                        </div>
                        <div class="columns small-12 medium-8">

                            <?php if ($title_link) { ?>
                                <a class="title" href="<?php echo $title_link; ?>"><?php echo $title_text; ?></a>
                            <?php } else { ?>
                                <h3><?php echo $title_text; ?></h3>
                            <?php } ?>

                            <?php if ($type) { ?>
                                <p><?php echo $type; ?></p>
                            <?php } ?>

                            <?php if ($category) { ?>
                                <p class="category"><?php echo $category[0]->name; ?></p>
                            <?php } ?>

                            <?php if ($subtitle) { ?>
                                <p><?php echo $subtitle; ?></p>
                            <?php } ?>

                            <?php if ($button_link) { ?>
                                <a class="button" target="<?php echo $button_link['target']; ?>" href="<?php echo $button_link['url']; ?>"><?php echo $button_link['title']; ?></a>
                            <?php } ?>

                        </div>
                    </div>
                </div>

        <?php
            // End loop.
            endwhile;
        endif;
        ?>
    </div>
</div>