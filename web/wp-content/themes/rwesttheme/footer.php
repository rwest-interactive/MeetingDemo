<?php
/**
 * Footer template
 *
 * @package rwest
 */
?>

			<?php
      //TODO
      // I think this is probably in a good spot. but we need to consider how to fold it into the fullsite system eventually
      // get_template_part('template-parts/newsletter');?>

			<footer class="main-footer">

				<?php
        //TODO
        // need to generalize this script name.
        // need to research what this does.
        // Add Footer Tracking Tags from theme customizer settings
        // this is not great code. there is no reason to close and open php each time.
        // however small the benefit may be, I still think we should do it
        // https://stackoverflow.com/questions/2437144/opening-closing-tags-performance
        // /*
        ?>
				<?php
        if ( get_theme_mod( 'rwest_tracking_script_footer' ) ) :
					 echo get_theme_mod( 'rwest_tracking_script_footer' );
				 endif;
        // */

        //TODO
        // field
        ?>

				<div class="footer-inner">
					<div class="row footer-bottom">

					</div>
				</div>
			</footer>

		</div><!-- END #content -->
	</div><!-- END #page -->

	<?php
  wp_footer();
  ?>

</body>
</html>
