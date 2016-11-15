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



/*
 * MyWaze shortcode
 * Register shortcode handler.
 *
 * Usage: [my_waze lat="" long="" class="" id=""]
 *
 * @since
 */
function my_waze_shortcode( $atts ) {

	// Load default options from the database
	$waze_options = get_option( 'my_waze_settings' );

	// Shortcode attributes - if not set, use default options from the database
	$atts = shortcode_atts(
		array(
			'lat'   => $waze_options['my_waze_lat'],
			'long'  => $waze_options['my_waze_long'],
			'class' => $waze_options['radio2'],
			'id'    => $waze_options['radio1'],
		), $atts
	);

	// HTML code
	$code  = '<div id="mywaze" class="' . $atts['class'] . '">';
	$code .= '<a id="' . $atts['id'] . '" class="my_waze" href="waze://?ll=' . $atts['lat'] . ',' . $atts['long'] . '&navigate=yes"></a>';
	$code .= '</div>';

	// Display and echo only on mobile device
	if ( wp_is_mobile() ) {
		return $code;
	}

}
add_shortcode( 'my_waze', 'my_waze_shortcode' );
