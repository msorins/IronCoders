<?php
/*
Plugin Name: Estate Plus
Description: Extensions and enhancements to the Estate WordPress theme.
Version: 1.0
Author: Greg Priday
Author URI: http://siteorigin.com
Plugin URI: http://siteorigin.com/theme/estate/
License: GPL3
License URI: http://www.gnu.org/licenses/gpl.html
*/

function estate_plus_extras_premium_folder(){
	return plugin_dir_url(__FILE__);
}

function estate_plus_init(){

	if( get_option('template') != 'estate' || is_dir( get_template_directory() . '/premium/' ) ) {
		// Disable the plugin
		return;
	}

	if( defined( 'SITEORIGIN_THEME_VERSION' ) ) {

		// We're using Estate and that it's definitely the SiteOrigin version

		add_filter('siteorigin_extras_premium_root_uri', 'estate_plus_extras_premium_folder');

		require_once plugin_dir_path(__FILE__) . '/main.php';

		// Add the updates plugin
		include plugin_dir_path(__FILE__) . '/wp-updates-plugin.php';
		new WPUpdatesPluginUpdater_678( 'http://wp-updates.com/api/2/plugin', plugin_basename(__FILE__));
	}
}
add_action('init', 'estate_plus_init', 1);