<?php
/*
Plugin Name: MyWaze
Plugin URI:  https://wordpress.org/plugins/my-waze/
Description: Add a Waze navigation button to your mobile WordPress site and get visitors navigate to your location in a click!
Version:     1.6
Author:      Savvy Wordpress Development
Author URI:  http://savvy.co.il
License:     GPL2
Text Domain: my-waze
*/



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
 * Include plugin files
 *
 * @since 1.5
 */
include_once ( plugin_dir_path( __FILE__ ) . 'shortcodes.php' );     // Add Shortcodes
include_once ( plugin_dir_path( __FILE__ ) . 'admin.php' );          // Add Admin Page
include_once ( plugin_dir_path( __FILE__ ) . 'scripts-styles.php' ); // Load Scripts and Styles
include_once ( plugin_dir_path( __FILE__ ) . 'i18n.php' );           // Load translation strings



/*
 * Add settings link on plugin page
 *
 * @since 1.5
 */
function my_waze_settings_link( $links ) {
	$links[] = '<a href="' . admin_url( 'admin.php?page=my_waze-settings' ) . '">' . __( 'Settings' ) . '</a>';
	return $links;
}
add_filter( 'plugin_action_links_' . plugin_basename( __FILE__ ), 'my_waze_settings_link' );
