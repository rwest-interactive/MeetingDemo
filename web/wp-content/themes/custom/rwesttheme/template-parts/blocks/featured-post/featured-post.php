<?php

/**
 * Featured Post Block Template.
 *
 * @param   array $block The block settings and attributes.
 * @param   string $content The block inner HTML (empty).
 * @param   bool $is_preview True during AJAX preview.
 * @param   (int|string) $post_id The post ID this block is saved to.
 */

// Create id attribute allowing for custom "anchor" value.
$id = 'featured-post-' . $block['id'];
if( !empty($block['anchor']) ) {
    $id = $block['anchor'];
}
$className = 'featured-post block ';
if( !empty($block['className']) ) {
    $className .= ' ' . $block['className'];
}
if( !empty($block['align']) ) {
    $className .= ' align' . $block['align'];
}

?>

<?php
$featured_post = get_field('featured_post', 'options');
$current_page_id = get_the_ID();


if( $featured_post ): 
  
?>
    <div id="<?php echo esc_attr($id); ?>" class="<?php echo esc_attr($className); ?>">
        <?php foreach( $featured_post as $post ):
            // $featured_post_id = get_the_ID($post->ID);
            if($current_page_id != $post->ID) : ?>
                <div class="block-inner row">
                    <?php
                    // Setup this post for WP functions (variable must be named $post).
                    // setup_postdata($post);
                    $date = rw_anotherdateconverter($post->post_date);
      
                    $permalink = get_permalink( $post->ID );

                    $title = get_the_title( $post->ID );
                    ?>

                    <div class="columns small-12 medium-6 image">
                        <?php echo get_the_post_thumbnail( $post, 'featured-post-block' ); ?>
                    </div>

                    <div class="columns small-12 medium-6 content">
                        <p><?php echo $date; ?></p>
                        <h2><?php echo $title?></h2>
                        <?php
                        if ($excerpt = get_the_excerpt($post->ID )) {
                            ?>
                            <p><?php echo $excerpt; ?></p>
                            <?php
                        }
                        ?>
                        <a class="button" href="<?php echo $permalink; ?>">View Article</a>
                    </div>
                </div>
            <?php endif; ?>

        <?php endforeach; ?>
    </div>

    <?php
    // Reset the global post object so that the rest of the page works correctly.
    // wp_reset_postdata(); ?>
    </div>

<?php endif;

 ?>
