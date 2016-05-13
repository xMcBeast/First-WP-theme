<?php
/**
 * Pretty sick Theme Customizer.
 *
 * @package Pretty_sick
 */

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function pretty_sick_customize_register( $wp_customize ) {
	$wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';
	$wp_customize->get_setting( 'header_textcolor' )->transport = 'postMessage';
}
add_action( 'customize_register', 'pretty_sick_customize_register' );

//stylesheets
function pretty_sick_stylescripts() {
	wp_enqueue_script( 'jquery' );
	wp_enqueue_style( 'bootstrap', get_template_directory_uri() . '/inc/css/bootstrap.min.css');
	wp_enqueue_style( 'bootstrap-theme', get_template_directory_uri() . '/inc/css/bootstrap-theme.min.css');
	wp_enqueue_script( 'bootstrap-js', get_template_directory_uri() . '/js/bootstrap.min.js');
}
add_action( 'wp_enqueue_scripts', 'pretty_sick_stylescripts' );

/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function pretty_sick_customize_preview_js() {
	wp_enqueue_script( 'pretty_sick_customizer', get_template_directory_uri() . '/js/customizer.js', array( 'customize-preview' ), '20151215', true );
}
add_action( 'customize_preview_init', 'pretty_sick_customize_preview_js' );
