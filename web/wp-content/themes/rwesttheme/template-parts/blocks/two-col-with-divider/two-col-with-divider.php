<?php

/**
 * 2 Columns Wine Single Block Template.
 *
 * @param   array $block The block settings and attributes.
 * @param   string $content The block inner HTML (empty).
 * @param   bool $is_preview True during AJAX preview.
 * @param   (int|string) $post_id The post ID this block is saved to.
 */

// Create id attribute allowing for custom "anchor" value.
$id = 'two-col-with-divider' . $block['id'];
if( !empty($block['anchor']) ) {
	$id = $block['anchor'];
}
$className = 'two-col-with-divider block ';
if( !empty($block['className']) ) {
	$className .= ' ' . $block['className'];
}
if( !empty($block['align']) ) {
	$className .= ' align' . $block['align'];

}
?>

<?php
if( have_rows('two_column_with_divider') ):
    ?>
    <div id="<?php echo esc_attr($id); ?>" class="<?php echo esc_attr($className); ?>">
        <div class="block-inner row">
            <?php while ( have_rows('two_column_with_divider') ) : the_row(); ?>
                <div class="columns small-12 medium-12 large-6">
										<?php the_sub_field('content'); ?>
                </div>
            <?php  endwhile; ?>
        </div>
    </div>
    <?php
else :
    echo '<h1> No Rows</h1>';
endif;
?>
