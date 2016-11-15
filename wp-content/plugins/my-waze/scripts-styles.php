<?php

/*
 * Security check
 * Prevent direct access to the file.
 *
 * @since 1.5
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}



/**
 * MyWaze stylesheet
 * Enqueue plugin front-end style.css, respects SSL.
 *
 * @since
 */
function my_waze_stylesheet() {

	wp_register_style( 'my_waze_style', plugins_url( 'style.css', __FILE__ ) );
	wp_enqueue_style( 'my_waze_style' );

}
add_action( 'wp_enqueue_scripts', 'my_waze_stylesheet' );



