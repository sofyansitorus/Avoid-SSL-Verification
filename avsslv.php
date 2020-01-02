<?php

/**
 * The plugin bootstrap file
 *
 * This file is read by WordPress to generate the plugin information in the plugin
 * admin area. This file also includes all of the dependencies used by the plugin,
 * registers the activation and deactivation functions, and defines a function
 * that starts the plugin.
 *
 * @link              https://github.com/sofyansitorus
 * @since             1.0.0
 * @package           Avsslv
 *
 * @wordpress-plugin
 * Plugin Name:       Avoid SSL Verification
 * Plugin URI:        https://github.com/sofyansitorus/Avoid-SSL-Verification
 * Description:       Avoid SSL connection verification when doing development in local machine.
 * Version:           1.0.0
 * Author:            Sofyan Sitorus
 * Author URI:        https://github.com/sofyansitorus
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       avsslv
 * Domain Path:       /languages
 */

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

/**
 * Add filter to perent SSL verification for CURL connection.
 */
add_action( 'http_api_curl', 'avsslv_api_curl', 10, 3 );
function avsslv_api_curl( $handle ){
    curl_setopt( $handle, CURLOPT_SSL_VERIFYHOST, 0 );
    curl_setopt( $handle, CURLOPT_SSL_VERIFYPEER, 0 );
}
