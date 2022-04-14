<?php

/**
 * Gallery Slider Block Template.
 *
 * @param   array $block The block settings and attributes.
 * @param   string $content The block inner HTML (empty).
 * @param   bool $is_preview True during AJAX preview.
 * @param   (int|string) $post_id The post ID this block is saved to.
 */
// Create id attribute allowing for custom "anchor" value.
$id = 'gallery-slider-' . $block['id'];
if (!empty($block['anchor'])) {
    $id = $block['anchor'];
}
$className = 'gallery-slider block ';
if (!empty($block['className'])) {
    $className .= ' ' . $block['className'];
}
if (!empty($block['align'])) {
    $className .= ' align' . $block['align'];
}
// $background_image = get_field('background_image');
// $title = get_field('title');
// $subtitle = get_field('subtitle');
// $buttons = have_rows('buttons');
// $slider = have_rows('slider');
// $screen_color = get_field('screen_color');
// $screen_opacity = '.' . get_field('screen_opacity');
// $screen = 'style=" background:'.rwest_hex2rgba($screen_color, $screen_opacity).'" ';



// Check rows exists.
if (have_rows('gallery_slider')) :
	$count = count(get_field('gallery_slider'));
  $gallery_slider_title = get_field('gallery_slider_title');
?>

<div id="<?php echo esc_attr($id); ?>" class="<?php echo esc_attr($className); ?>">
    
  <div class="row">
    <div class="column small-12">
		<?php 
    if($gallery_slider_title){
      echo '<h3>'.$gallery_slider_title.'</h3>';
    }
    if ($count >= 1) : ?>
			<div class="slider">
				<?php
        $counter = 0;
				// Loop through rows.
				while (have_rows('gallery_slider')) : the_row();
				

					$gallery_slider_image = get_sub_field('gallery_slider_image');
          $counter++;

					?>
						<div class="rowslide-<?php echo $counter?> <?php echo $options; ?>">

							<?php if (!empty($gallery_slider_image)) : ?>
								<img class="mobile-only" src="<?php echo $gallery_slider_image['sizes']['medium-large']; ?>" alt="<?php echo $gallery_slider_image['alt']; ?>">
							<?php endif; ?>

						</div><!-- End .rowslide-  -->



						<?php
					endwhile; // End loop. ?>
          </div> <!-- End slider -->
          <?php
				endif; 
        ?>
			
    </div><!-- End column -->
  </div><!-- End row -->
</div><!-- End block -->

<?php endif; ?>
