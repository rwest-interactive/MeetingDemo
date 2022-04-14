<?php
/**
 * Template part for displaying a blog post grid item in the archive
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package rwest
 */

$thumbnail = get_the_post_thumbnail( $post->ID, 'medium-large' );
$postDate = date("F d, Y", strtotime($post->post_date));
?>

<li id="post-<?php the_ID(); ?>" class="blog-post columns small-12 medium-6 large-4" >
  <div class="card card-blog-post">
    <div class="image-container">
      <?php echo $thumbnail; ?>
    </div>
    <div class="content">
      <div class="meta-date">
        <i class="fa fa-clock-o"></i> <?php echo $postDate; ?>
      </div>
      <h3 class="blog-title"><a href="<?php echo get_the_permalink($post->id); ?>"><?php echo $post->post_title; ?></a></h3>
      <?php the_excerpt(); ?>
      <a href="<?php echo get_the_permalink($post->id); ?>" class="button button-dark">View Article</a>
    </div>
  </div>
</li>
