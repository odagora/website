<?php

/*
 * Security check
 * Prevent direct access to the file.
 *
 * @since 1.6
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}



/*
 * Internationalization
 * Load plugin translation files.
 *
 * @since 1.6
 */
class MyWazei18n {

	/*
	 * Constructor
	 */
	public function __construct() {

		// Load textdomain
		add_action( 'plugins_loaded', array( $this, 'load_textdomain' ) );

	}

	/*
	 * Load the text domain for translation
	 */
	public function load_textdomain() {

		load_plugin_textdomain( 'my-waze' );

	}

}
new MyWazei18n();
