<section class="newsletter">
	<div id="footer-newsletter-anchor" class="footer-newsletter-anchor"></div>
	<div class="newesletter-inner">
		<div class="newsletter row align-center">
			<div class="columns small-12 medium-8 align-center">
				<?php
				if( $newsletter_title = get_field( 'newsletter_title', 'options' ) ) {
					?>
					<h3><?php echo $newsletter_title; ?></h3>
					<?php
				}
				if( $newsletter_content = get_field( 'newsletter_content', 'options' ) ) {
					?>
					<p><?php echo $newsletter_content; ?></p>
					<?php
				}
				if( $newsletter_gform = get_field( 'newsletter_gform', 'options' ) ) {
					?>
					<?php echo do_shortcode($newsletter_gform); ?>
					<?php
				}
				?>
			</div>
		</div>
	</div>
</section>
