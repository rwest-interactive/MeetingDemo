<?php

/**
 * Header template.
 *
 * @package rwest
 */
?>
<!doctype html>
<html <?php language_attributes(); ?>>

<head>
	<title><?php wp_title(); ?></title>
	<meta charset="<?php bloginfo('charset'); ?>">
	<meta name="viewport" content="width=device-width, user-scalable=yes, initial-scale=1.0, minimum-scale=1.0, maximum-scale=2.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<link rel="preconnect" href="https://fonts.gstatic.com">
  <?php
  //TODO
  // Is this the best way to load fonts.
  ?>
	<link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,200;0,300;0,400;0,500;0,600;0,700;1,200;1,300;1,400;1,500;1,600;1,700&family=Roboto:ital,wght@0,300;0,400;0,500;0,700;1,300;1,400;1,500;1,700&family=Unna:ital,wght@0,400;0,700;1,400;1,700&display=swap" rel="stylesheet">

	<?php wp_head(); ?>

	<?php // Add Tracking Scripts from theme customizer settings
	?>
	<?php if (get_theme_mod('rwest_tracking_script_header')) : ?>
		<?php echo get_theme_mod('rwest_tracking_script_header'); ?>
	<?php endif; ?>

</head>

<body <?php body_class(); ?>>

  <?php
  //TODO
  // I would like to make FB controled in the WP admin
  // i think this can be done with get_theme_mod
  // but if the customizer
  ?>
	<!-- Loading Facebook SDK Root for social sharing on blog post pages -->
  <?php
  //TODO
  // What script?
  ?>
	<!-- Script is being enqueued in functions.php -->
	<!-- <?php // if (is_single()) { ?>
		<div id="fb-root"></div>
		<script>
			(function(d, s, id) {
				var js, fjs = d.getElementsByTagName(s)[0];
				if (d.getElementById(id)) return;
				js = d.createElement(s);
				js.id = id;
				js.src = "https://connect.facebook.net/en_US/sdk.js#xfbml=1&version=v3.0";
				fjs.parentNode.insertBefore(js, fjs);
			}(document, 'script', 'facebook-jssdk'));
		</script>
	<?php // } ?> -->

	<?php
	if (function_exists('wp_body_open')) {
		wp_body_open();
	}

	?>
	<div id="page" class="site">

		<a class="skip-link screen-reader-text" href="#primary"><?php esc_html_e('Skip to content', 'rwest'); ?></a>

		<!-- DESKTOP HEADER/NAVIGATION -->

    <?php

    //TODO
    // This should be put into a partial file and as we built more menu system we just pick the closest for current project to start with
    /*
    ?>
		<header id="masthead" class="site-header" role="banner">

			<?php if (get_field('callout_banner_text', 'options')) : ?>
				<div class="row banner">
					<div class="columns">
						<?php echo get_field('callout_banner_text', 'options'); ?>
					</div>
				</div>
			<?php endif; ?>

			<div class="row menus">




				<!-- Right Side Menu 1 -->
				<div class="columns main-menu-container small-12 medium-3 large-3">
					<!-- <ul class="row">
						<li><a class="modal-trigger" data-modalid="batch-finder-popup" href="#">Batch Finder</a></li>
					</ul> -->
					<?php
          */
          // rwest_menu('Main Menu Right', 'main'); 
          /*
          ?>
				</div>
			</div>
		</header>


    <?php
    //TODO
    // This need to be controled better. some conditional since it is a per project basis
    ?>
		<!-- Note: c7 only allows one cart per page, so we have to load it once and position the link over both desktop and mobile cart icons, rather than having it present in both menus -->
		<?php //  echo do_shortcode("[c7wp type='cart']"); ?>

		<!-- MOBILE HEADER/NAVIGATION -->
    <?php
    //TODO
    // This should be put into a partial file and as we built more menu system we just pick the closest for current project to start with
    /*
		<header id="mobile-site-header" class="mobile-site-header">

			<?php if (get_field('callout_banner_text', 'options')) : ?>
				<div class="row banner">
					<div class="columns">
						<?php echo get_field('callout_banner_text', 'options'); ?>
					</div>
				</div>
			<?php endif; ?>

			<div class="row menus">
				<div class="columns small-4 medium-6 brand-icon">
					<ul class="row">
						<li>
							<a href="<?php echo site_url(); ?>" aria-label="homepage link">
								<?php echo file_get_contents($brand_icon_path_mobile); ?>
							</a>
						</li>
					</ul>
				</div>
				<div class="columns small-6 medium-4 right-side-icon-container">
					<ul class="row">
						<li>
							<a class="shop-link" href="<?php echo get_post_type_archive_link('wine'); ?>">
								<?php echo get_field('nav_wine_shop_cta', 'options'); ?>
							</a>
						</li>
						<li class="cart-icon">
							<?php echo file_get_contents($cart_icon_path_mobile); ?>
						</li>
						<li class="search-button-icon closed">
							<a href="#">
								<img src="<?php echo get_site_url(); ?>/wp-content/themes/1ks/assets/src/icons/search.svg" alt="search">
							</a>
						</li>
					</ul>
				</div>
				<div class="columns small-2 hamburger-icon">
					<div id="nav-icon" class="nav-icon closed">
						<span></span>
						<span></span>
						<span></span>
						<span></span>
					</div>
				</div>
			</div>
		</header>


		<nav id="mobile-nav" class="mobile-nav closed row">
			<div class="columns small-12 main-menu-mobile">

				<ul class="batch-finder">
					<li><a class="modal-trigger" data-modalid="batch-finder-popup" href="#">Batch Finder</a></li>
				</ul>
			</div>
		</nav>
*/
//TODO
// search should also have its own file so we can easily use it in multiple places and easier to extend
/*
?>
		<div class="search-container closed" id="search-container">
			<form role="search" method="get" class="search-form" action="<?php echo get_site_url(); ?>">
				<input type="search" class="search-field form-fluid no-livesearch" placeholder="Search…" value="" name="s" title="Search for:">
			</form>
		</div>
*/
?>
<header id="mobile-site-header" class="mobile-site-header"></header>
<?php //rwest_menu('Mobile Main Menu'); ?>
		<div id="content" class="site-content">
