<?php

define('SITEORIGIN_IS_PREMIUM', true);

include plugin_dir_path(__FILE__).'ajax-comments/ajax-comments.php';
include plugin_dir_path(__FILE__).'css/css.php';
include plugin_dir_path(__FILE__).'settings.php';

/**
 *
 */
function estate_plus_main_init() {
	if( siteorigin_setting('general_ajax_comments') ) siteorigin_ajax_comments_activate();
	if( siteorigin_setting('layout_responsive_menu') ){
		include plugin_dir_path(__FILE__).'mobilenav/mobilenav.php';
	}
}
add_action('init', 'estate_plus_main_init', 11);

/**
 * @param $text
 * @return string
 */
function estate_plus_filter_attribution($text){
	if(!siteorigin_setting('general_footer_attribution')) return '';
	else return $text;
}
add_filter('siteorigin_attribution_footer', 'estate_plus_filter_attribution');

/**
 * Add the responsive layout
 */
function estate_plus_responsive_header(){
	if( siteorigin_setting('layout_responsive') ) {
		?><meta name="viewport" content="width=device-width, minimum-scale=1.0, maximum-scale=1.0" /><?php
	}
}
add_action('wp_head', 'estate_plus_responsive_header');

/**
 * Enqueue the CSS required for the responsive layout
 */
function estate_plus_responsive_css(){
	if(siteorigin_setting('layout_responsive')) {
		wp_enqueue_style('estate-responsive', plugin_dir_url(__FILE__).'assets/responsive.css', array(), SITEORIGIN_THEME_VERSION);
	}
}
add_action('wp_enqueue_scripts', 'estate_plus_responsive_css', 11);

/**
 * Add custom body classes.
 *
 * @param $classes
 * @return array
 * @package clearly
 * @since 1.0
 */
function estate_plus_body_class($classes){
	if(siteorigin_setting('layout_responsive')) $classes[] = 'responsive';
	return $classes;
}
add_filter('body_class', 'estate_plus_body_class');

function estate_plus_mobilenav_res(){
	return 720;
}
add_filter('siteorigin_mobilenav_resolution', 'estate_plus_mobilenav_res');