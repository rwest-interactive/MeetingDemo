<?php

/**
 * 2 Columns Featured Item Block Template.
 *
 * @param   array $block The block settings and attributes.
 * @param   string $content The block inner HTML (empty).
 * @param   bool $is_preview True during AJAX preview.
 * @param   (int|string) $post_id The post ID this block is saved to.
 */

// Create id attribute allowing for custom "anchor" value.
$id = 'two-columns-featured-item' . $block['id'];
if( !empty($block['anchor']) ) {
	$id = $block['anchor'];
}
$className = 'two-columns-featured-item block ';
if( !empty($block['className']) ) {
	$className .= ' ' . $block['className'];
}
if( !empty($block['align']) ) {
	$className .= ' align' . $block['align'];
}
?>

<?php
$items = get_field('two_column_featured_item');
if( $items ):
    ?>
    <div id="<?php echo esc_attr($id); ?>" class="<?php echo esc_attr($className); ?>">
        <div class="block-inner row align-center">
          <h2>2 Columns Featured Item Block Template requires a target cpt i think. and I am not sure how the relationship field is going to work in the block system. I think this is not for Generations though.</h2>
            <?php foreach ( $items as $post ) :
                setup_postdata($post);
                // rwest_dump($post);
								$tcfi_teaser = get_the_excerpt($post->ID);
                // echo $tcfi_teaser;
								?>

								<div class="two-col-ft-item columns small-12 medium-3">

										<div class="two-col-ft-item-inner">

												<div class="tcfi-thumbnail">
													<img class="tcfi-thumbnail-img" src="<?php echo $tcfi_image_url; ?>" alt="<?php echo $tcfi_image_url['alt']; ?>">
												</div>

												<div class="tcfi-details">
														<div class="tcfi-details-inner">
																<h3><?php get_the_title($post->ID); ?></h3>
																<p class="description"><?php echo $tcfi_teaser; ?></p>
																<a  href="<?php echo get_the_permalink($post->ID);?>">LEARN MORE</a>
																<!-- <p>taxonomies</p> -->
														</div>
												</div>

										</div>

								</div>

              
					<?php 
          wp_reset_postdata();
          endforeach;
            
            ?>
        </div>
    </div>

    <?php
else :
    echo '<h1> No Rows</h1>';
endif;
