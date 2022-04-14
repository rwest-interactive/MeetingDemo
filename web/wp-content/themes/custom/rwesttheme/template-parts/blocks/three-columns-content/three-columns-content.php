<?php

/**
 * 3 Columns Content Block Template.
 *
 * @param   array $block The block settings and attributes.
 * @param   string $content The block inner HTML (empty).
 * @param   bool $is_preview True during AJAX preview.
 * @param   (int|string) $post_id The post ID this block is saved to.
 */

// Create id attribute allowing for custom "anchor" value.
$id = 'three-columns-content-' . $block['id'];
if( !empty($block['anchor']) ) {
    $id = $block['anchor'];
}
$className = 'three-columns-content block ';
if( !empty($block['className']) ) {
    $className .= ' ' . $block['className'];
}
if( !empty($block['align']) ) {
    $className .= ' align' . $block['align'];
}

if( have_rows('three_columns_content') ): 
	$cols_span = (12/$block['data']['three_columns_content']);
  // rwest_dump($cols_span);
    ?>
    <div id="<?php echo esc_attr($id); ?>" class="<?php echo esc_attr($className); ?>">
        <div class="block-inner row">
            <?php while ( have_rows('three_columns_content') ) : the_row(); ?>

                <div class="columns small-12 medium-<?php echo esc_attr($cols_span); ?> large-<?php echo esc_attr($cols_span); ?>">
                <?php the_sub_field('content'); ?>

                </div>
            <?php endwhile; ?>
        </div>
    </div>
<?php
endif;
?>
