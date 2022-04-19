<?php
/**
 * Template part for displaying post content in single.php
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package rwest
 */

?>
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<div class="container">

		<header class="entry-header">
			<?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>
			<p>Published On - <?php echo get_the_date(); ?></p>
			<p><i class="fa fa-user"></i> By <?php echo the_author(); ?></p>
		</header><!-- END .entry-header -->

		<?php rwest_post_thumbnail(); ?>

		<div class="entry-content">
			<?php
			the_content();
			?>
		</div><!-- END .entry-content -->

	</div><!-- END .container -->

</article><!-- END #post-<?php the_ID(); ?> -->
