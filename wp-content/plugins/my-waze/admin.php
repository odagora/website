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
 * Add the admin page
 *
 * @since
 */
function my_waze_admin_page() {

	add_menu_page(
		__( 'MyWaze Settings', 'my-waze' ),
		__( 'MyWaze Settings', 'my-waze' ),
		'administrator',
		'my_waze-settings',
		'my_waze_admin_page_callback'
	);

}
add_action( 'admin_menu', 'my_waze_admin_page' );



/*
 * Register settings
 * Use the settings API to save MyWaze option in the 'wp_options'
 *
 * @since
 */
function my_waze_register_settings() {

	register_setting(
		'my_waze_settings',
		'my_waze_settings',
		'my_waze_settings_validate'
	);

}
add_action( 'admin_init', 'my_waze_register_settings' );



/*
 * Validate MyWaze settings
 *
 * @since
 */
function my_waze_settings_validate( $args ){

	// $args will contain the values posted in your settings form.
	if ( !isset( $args['my_waze_long'] ) || !isset( $args['my_waze_lat'] ) || !isset( $args['my_waze_address'] ) ) {

		// add a settings error because the form fields blank, so that the user can enter again
		$args['my_waze_long']    = '';
		$args['my_waze_lat']     = '';
		$args['my_waze_address'] = '';
		$args['my_waze_icon']    = '';
		$args['my_waze_align']   = '';

		add_settings_error(
			'my_waze_settings',
			'my_waze_no_data',
			__( 'Please make sure all the settings are configured.', 'my-waze' ),
			$type = 'error'
		);

	}

	// Return $args
	return $args;

}



/*
 * Admin notices
 * Display the validation errors and update messages
 *
 * @since
 */
function my_waze_admin_notices() {
	settings_errors();
}
add_action( 'admin_notices', 'my_waze_admin_notices' );



/*
 * Admin notices
 * The markup for your plugin settings page
 *
 * @since
 */
function my_waze_admin_page_callback() {
?>
<style>
	legend {
		padding: 1em 0;
	}
	#map {
		height: 360px;
		width: 100%;
	}
	#pac-input {
		width: 300px;
		height: 32px;
		margin: 10px 12px;
		padding: 0 12px;
		border: 1px solid transparent;
		border-radius: 2px 0 0 2px;
		box-sizing: border-box;
		-moz-box-sizing: border-box;
		box-shadow: 0 2px 6px rgba(0, 0, 0, 0.3);
		outline: none;
		background-color: #fff;
		font-family: Roboto;
		font-size: 15px;
		font-weight: 300;
		text-overflow: ellipsis;
	}
	#pac-input:focus {
		border-color: #4d90fe;
	}
	.pac-container {
		font-family: Roboto;
	}
	#my_waze_address {
		width: 100%;
		max-width: 400px;
	}
	#type-selector {
		color: #fff;
		background-color: #4d90fe;
		padding: 5px 11px 0px 11px;
	}
	#type-selector label {
		font-family: Roboto;
		font-size: 12px;
		font-weight: 300;
	}
	.waze_icon,
	.waze_align {
		margin-right: 40px;
		display: inline-block;
	}
	.waze_icon input,
	.waze_icon img {
		display: inline-block;
		vertical-align: middle;
	}
</style>
<script>
	function initMap() {
		var opts = '<?php echo json_encode( $waze_options ); ?>';
		// console.log('OPTS:', opts);
		var lat = <?php echo ( isset($options['my_waze_lat']  ) && $options['my_waze_lat']  != '' ) ? $options['my_waze_lat']  : '0'; ?>;
		var lng = <?php echo ( isset($options['my_waze_long'] ) && $options['my_waze_long'] != '' ) ? $options['my_waze_long'] : '0'; ?>;
		var map = new google.maps.Map(document.getElementById('map'), {
			center: {lat: lat, lng: lng},
			zoom: 13
		});
		var input = /** @type {!HTMLInputElement} */( document.getElementById('pac-input') );

		var types = document.getElementById('type-selector');
		map.controls[google.maps.ControlPosition.TOP_LEFT].push(input);
		map.controls[google.maps.ControlPosition.TOP_LEFT].push(types);

		var autocomplete = new google.maps.places.Autocomplete(input);
		autocomplete.bindTo('bounds', map);

		var infowindow = new google.maps.InfoWindow();
		var marker = new google.maps.Marker({
			map: map,
			anchorPoint: new google.maps.Point(0, -29)
		});

		autocomplete.addListener('place_changed', function() {
			infowindow.close();
			marker.setVisible(false);
			var place = autocomplete.getPlace();
			if (!place.geometry) {
				window.alert("<?php esc_html_e( 'Autocomplete\'s returned place contains no geometry', 'my-waze' ); ?>");
				return;
			}

			// If the place has a geometry, then present it on a map.
			if (place.geometry.viewport) {
				map.fitBounds(place.geometry.viewport);
			} else {
				map.setCenter(place.geometry.location);
				map.setZoom(17); // Why 17? Because it looks good.
			}
			marker.setIcon(/** @type {google.maps.Icon} */({
				url: place.icon,
				size: new google.maps.Size(71, 71),
				origin: new google.maps.Point(0, 0),
				anchor: new google.maps.Point(17, 34),
				scaledSize: new google.maps.Size(35, 35)
			}));
			marker.setPosition(place.geometry.location);
			marker.setVisible(true);

			var address = '';
			if (place.address_components) {
				address = [
					(place.address_components[0] && place.address_components[0].short_name || ''),
					(place.address_components[1] && place.address_components[1].short_name || ''),
					(place.address_components[2] && place.address_components[2].short_name || '')
				].join(' ');
			}

			infowindow.setContent('<div><strong>' + place.name + '</strong><br>' + address);
			infowindow.open(map, marker);

			var place = autocomplete.getPlace();
			jQuery('#my_waze_long').val(place.geometry.location.lng());
			jQuery('#my_waze_lat').val(place.geometry.location.lat());
			jQuery('#my_waze_address').val(place.formatted_address);
			console.log(place.formatted_address);
		});

		// Sets a listener on a radio button to change the filter type on Places
		// Autocomplete.
	}
</script>

<div class="wrap">
	<h1><?php esc_html_e( 'Waze Button Settings', 'my-waze' ); ?></h1>

	<h2><?php esc_html_e( 'Please enter the desired location:', 'my-waze' ); ?></h2>
	<?php $options = get_option( 'my_waze_settings' ); ?>

	<input id="pac-input" class="controls" type="text" placeholder="<?php echo esc_attr( 'Enter a location', 'my-waze' ); ?>">
	<div id="map"></div>

	<form action="options.php" method="post">
		<?php
		settings_fields( 'my_waze_settings' );

		do_settings_sections( __FILE__ );
		$dir = plugins_url();
		?>

		<h2><?php esc_html_e( 'Current Location:', 'my-waze' ); ?></h2>
		<input type="text" readonly name="my_waze_settings[my_waze_long]"    id="my_waze_long"    value="<?php echo ( isset( $options['my_waze_long']    ) && $options['my_waze_long']    != '') ? $options['my_waze_long']    : ''; ?>" />
		<input type="text" readonly name="my_waze_settings[my_waze_lat]"     id="my_waze_lat"     value="<?php echo ( isset( $options['my_waze_lat']     ) && $options['my_waze_lat']     != '') ? $options['my_waze_lat']     : ''; ?>" />
		<input type="text" readonly name="my_waze_settings[my_waze_address]" id="my_waze_address" value="<?php echo ( isset( $options['my_waze_address'] ) && $options['my_waze_address'] != '') ? $options['my_waze_address'] : ''; ?>" />

		<fieldset>
			<legend>
				<h2><?php esc_html_e( 'Please select one of the following icons:', 'my-waze' ); ?></h2>
			</legend>
			<div class="waze_icon">
				<input type="radio" name="my_waze_settings[radio1]" id="item1" value="item1" <?php checked('item1', $options['radio1']); ?> />
				<label for="item1"><img src="<?php echo $dir ?>/my-waze/img/icon1.png"></label>
			</div>
			<div class="waze_icon">
				<input type="radio" name="my_waze_settings[radio1]" id="item2" value="item2" <?php checked('item2', $options['radio1']); ?> />
				<label for="item2"><img src="<?php echo $dir ?>/my-waze/img/icon2.png"></label>
			</div>
			<div class="waze_icon">
				<input type="radio" name="my_waze_settings[radio1]" id="item3" value="item3" <?php checked('item3', $options['radio1']); ?> />
				<label for="item3"><img src="<?php echo $dir ?>/my-waze/img/icon3.png"></label>
			</div>
			<div class="waze_icon">
				<input type="radio" name="my_waze_settings[radio1]" id="item4" value="item4" <?php checked('item4', $options['radio1']); ?> />
				<label for="item4"><img src="<?php echo $dir ?>/my-waze/img/icon4.png"></label>
			</div>
		</fieldset>

		<fieldset>
			<legend>
				<h2><?php esc_html_e( 'Please select the icon alignment:', 'my-waze' ); ?></h2>
			</legend>
			<div class="waze_align">
				<input type="radio" name="my_waze_settings[radio2]" id="left" value="left" <?php checked( 'left', $options['radio2'] ); ?> />
				<label for="left"><?php esc_html_e( 'Left', 'my-waze' ); ?></label>
			</div>
			<div class="waze_align">
				<input type="radio" id="center" name="my_waze_settings[radio2]" value="center" <?php checked( 'center', $options['radio2'] ); ?> />
				<label for="center"><?php esc_html_e( 'Center', 'my-waze' ); ?></label>
			</div>
			<div class="waze_align">
				<input type="radio" id="right" name="my_waze_settings[radio2]" value="right" <?php checked( 'right', $options['radio2'] ); ?> />
				<label for="right"><?php esc_html_e( 'Right', 'my-waze' ); ?></label>
			</div>
		</fieldset>

		<?php submit_button( __( 'Save', 'my-waze' ) ); ?>
	</form>

	<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyD06iUyqFzxx63m-hFewtXmAILuBGQadO8&signed_in=true&libraries=places&callback=initMap" async defer></script>
</div>
<?php
}
