<?php
/**
 * RWest Theme Customizer
 *
 * @package rwest
 */

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function rwest_customize_register( $wp_customize ) {
	$wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';
	$wp_customize->get_setting( 'header_textcolor' )->transport = 'postMessage';

	if ( isset( $wp_customize->selective_refresh ) ) {
		$wp_customize->selective_refresh->add_partial(
			'blogname',
			array(
				'selector'        => '.site-title a',
				'render_callback' => 'rwest_customize_partial_blogname',
			)
		);
		$wp_customize->selective_refresh->add_partial(
			'blogdescription',
			array(
				'selector'        => '.site-description',
				'render_callback' => 'rwest_customize_partial_blogdescription',
			)
		);
	}



	/*
	 ** Site Logo
	 */
	// add a setting for the site logo
	$wp_customize->add_setting('rwest_theme_logo');
	// Add a control to upload the logo
	$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'rwest_theme_logo',
		array(
			'label' => 'Upload Logo',
			'section' => 'title_tagline',
			'settings' => 'rwest_theme_logo',
		)
	));


	/*
	 ** RWest Theme Settings Section
	 */
	$wp_customize->add_section('rwest_tracking_scripts', array(
		'title' => 'Tracking Scripts',
		'description' => '',
		'priority' => 120,
	));
	$wp_customize->add_section('rwest_social_links', array(
		'title' => 'Social Links',
		'description' => '',
		'priority' => 130,
		'description' => __( 'Add URLs to your social profiles.' ),
	));


	/*
	 ** Tracking Codes
	 */
	$wp_customize->add_setting('rwest_tracking_script_header');
	// Add a control to upload the Facebook
    $wp_customize->add_control('rwest_tracking_script_header', array(
        'label'       => 'Header',
        'section'     => 'rwest_tracking_scripts',
        'settings'    => 'rwest_tracking_script_header',
        'type' 		  => 'textarea',
        'description' => __( 'Add tracking codes that need to go in the header of the website.' ),
    ));
    $wp_customize->add_setting('rwest_tracking_script_body');
	// Add a control to upload the Facebook
    $wp_customize->add_control('rwest_tracking_script_body', array(
        'label'       => 'Body',
        'section'     => 'rwest_tracking_scripts',
        'settings'    => 'rwest_tracking_script_body',
        'type'		  => 'textarea',
        'description' => __( 'Add tracking codes that need to go in the body of the website. This should mostly be used for no-script elements.' ),
    ));
    $wp_customize->add_setting('rwest_tracking_script_footer');
	// Add a control to upload the Facebook
    $wp_customize->add_control('rwest_tracking_script_footer', array(
        'label'       => 'Footer',
        'section'     => 'rwest_tracking_scripts',
        'settings'    => 'rwest_tracking_script_footer',
        'type' 		  => 'textarea',
        'description' => __( 'Add tracking codes that need to go in the footer of the website.' ),
    ));


	/*
	 ** Social Links
	 */
	// Add a setting for Facebook
	$wp_customize->add_setting('rwest_social_link_facebook');
	// Add a control to upload the Facebook
    $wp_customize->add_control('rwest_social_link_facebook', array(
        'label'      => 'Facebook',
        'section'    => 'rwest_social_links',
        'settings'   => 'rwest_social_link_facebook',
    ));
    // Add a setting for Twitter
	$wp_customize->add_setting('rwest_social_link_twitter');
	// Add a control to upload the Twitter
    $wp_customize->add_control('rwest_social_link_twitter', array(
        'label'      => 'Twitter',
        'section'    => 'rwest_social_links',
        'settings'   => 'rwest_social_link_twitter',
    ));
    // Add a setting for Instagram
	$wp_customize->add_setting('rwest_social_link_instagram');
	// Add a control to upload the Instagram
    $wp_customize->add_control('rwest_social_link_instagram', array(
        'label'      => 'Instagram',
        'section'    => 'rwest_social_links',
        'settings'   => 'rwest_social_link_instagram',
    ));


}
add_action( 'customize_register', 'rwest_customize_register' );

/**
 * Render the site title for the selective refresh partial.
 *
 * @return void
 */
function rwest_customize_partial_blogname() {
	bloginfo( 'name' );
}

/**
 * Render the site tagline for the selective refresh partial.
 *
 * @return void
 */
function rwest_customize_partial_blogdescription() {
	bloginfo( 'description' );
}

/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function rwest_customize_preview_js() {
	wp_enqueue_script( 'rwest-customizer', get_template_directory_uri() . '/js/customizer.js', array( 'customize-preview' ), _S_VERSION, true );
}
// add_action( 'customize_preview_init', 'rwest_customize_preview_js' );
