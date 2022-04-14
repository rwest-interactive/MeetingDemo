<?php

/**
 * Grid Multi Column Block Template.
 *
 * @param   array $block The block settings and attributes.
 * @param   string $content The block inner HTML (empty).
 * @param   bool $is_preview True during AJAX preview.
 * @param   (int|string) $post_id The post ID this block is saved to.
 */

// Create id attribute allowing for custom "anchor" value.
$id = 'grid-multi-column' . $block['id'];
if( !empty($block['anchor']) ) {
	$id = $block['anchor'];
}
$className = 'grid-multi-column block ';
if( !empty($block['className']) ) {
	$className .= ' ' . $block['className'];
}
if( !empty($block['align']) ) {
	$className .= ' align' . $block['align'];
}

if( $grid_multi_column = get_field('grid_multi_column') ) :
    ?>

    <div id="<?php echo esc_attr($id); ?>" class="<?php echo esc_attr($className); ?>">

        <div class="block-inner row">

            <div class="grid-item grid-multi-column-col columns small-12 medium-6">

                <div class="row grid-item-inner">

                    <div class="columns small-centered small-12 medium-5 gmc-thumbnail">
											<img class="gmc-thumbnail-img" src="<?php echo $gmc_image_url; ?>" alt="<?php echo $gmc_image_url['alt']; ?>">
                    </div>

                    <div class="columns small-12 medium-7 gmc-details">
                        <div class="content">

														<h3><?php the_title(); ?></h3>
														<h4><?php echo $subtitle; ?></h4>
														<p class="description"><?php echo $teaser; ?></p>
														<a class="button-gold-solid" href="<?php echo get_the_permalink($post->ID);?>">LEARN MORE</a>

                        </div>

                    </div>

            		</div>

            </div>

        </div>

    </div>

<?php
endif;
