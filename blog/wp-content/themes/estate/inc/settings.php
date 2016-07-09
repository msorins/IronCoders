<?php
/**
 * Configure settings for the theme.
 *
 * @package estate
 * @since estate 1.0
 * @license GPL 2.0
 */

/**
 * Setup theme settings.
 * 
 * @since estate 1.0
 */
function estate_theme_settings(){

	siteorigin_settings_add_section('general', __('General', 'estate'));
	siteorigin_settings_add_section('banner', __('Home Banner', 'estate'));
	siteorigin_settings_add_section('layout', __('Layout', 'estate'));
	siteorigin_settings_add_section('text', __('Site Text', 'estate'));

	/**
	 * General Settings
	 */
	
	siteorigin_settings_add_field('general', 'logo', 'media', __('Logo', 'estate'), array(
		'choose' => __('Choose Image', 'estate'),
		'update' => __('Set Logo', 'estate'),
	));

	siteorigin_settings_add_teaser('general', 'logo_retina', __('Retina Logo', 'estate'), array(
		'choose' => __('Choose Image', 'estate'),
		'update' => __('Set Logo', 'estate'),
		'description' => __('A double sized version of your logo for retina displays. Must be used in addition to standard logo.', 'estate'),
	) );

	siteorigin_settings_add_field('general', 'site_description', 'checkbox', __('Site Description', 'estate'), array(
		'description' => __('Display your site description under your logo.', 'estate')
	));
	
	siteorigin_settings_add_field('general', 'menu_search', 'checkbox', __('Menu Search', 'estate'), array(
		'description' => __('Display a search input in the main menu.', 'estate')
	));

	siteorigin_settings_add_teaser('general', 'footer_attribution', __('Footer Attribution', 'estate'), array(
		'description' => __('Remove the SiteOrigin attribution text from your footer.','estate')
	));

	siteorigin_settings_add_teaser('general', 'ajax_comments', __('Ajax Comments', 'estate'), array(
		'description' => __('Comments are updated without reloading the page.','estate')
	));

	/**
	 * Home Page
	 */

	$options = array(
		'' => __('None', 'estate'),
		'title_banner' => __('Title Banner with Image', 'estate'),
		'title_banner_noimage' => __('Title Banner without Image', 'estate'),
	);

	if(class_exists('MetaSliderPlugin')){
		$sliders = get_posts(array(
			'post_type' => 'ml-slider',
		));

		foreach($sliders as $slider) {
			$options['meta:'.$slider->ID] = __('Slider: ', 'estate').$slider->post_title;
		}
	}

	siteorigin_settings_add_field('banner', 'type', 'select', __('Home Page Banner', 'estate'), array(
		'options' => $options,
		'description' => sprintf(
			__('This theme supports <a href="%s" target="_blank">Meta Slider</a>. <a href="%s">Install it</a> for free to create responsive, animated sliders - <a href="%s" target="_blank">More Info</a>', 'estate'),
			'http://sorig.in/metaslider',
			siteorigin_plugin_activation_install_url('ml-slider', __('Meta Slider', 'estate'), 'http://sorig.in/ml-slider'),
			'http://siteorigin.com/estate-documentation/sliders/'
		)
	));

	siteorigin_settings_add_field('banner', 'image', 'media', __('Background Image', 'estate'));
	siteorigin_settings_add_field('banner', 'color', 'color', __('Background Color', 'estate'));
	siteorigin_settings_add_field('banner', 'title', 'text', __('Banner Title', 'estate'));
	siteorigin_settings_add_field('banner', 'subtitle', 'text', __('Banner Subtitle', 'estate'));
	siteorigin_settings_add_field('banner', 'button', 'text', __('Banner Button', 'estate'));
	siteorigin_settings_add_field('banner', 'button_url', 'text', __('Banner Button URL', 'estate'));

	/**
	 * Layout
	 */

	siteorigin_settings_add_teaser( 'layout', 'responsive', __('Responsive Layout', 'estate'), array(
		'description' => __('Use a layout that adapts to mobile devices.','estate')
	) );

	siteorigin_settings_add_teaser( 'layout', 'responsive_menu', __('Responsive Menu', 'estate'), array(
		'description' => __('A single button nested menu is displayed for mobile devices.','estate')
	) );

	siteorigin_settings_add_field('text', 'footer_text', 'text', __('Footer Text', 'estate'), array(
		'description' => __('The footer text, ideal for copyright information', 'estate'),
	) );

}
add_action('admin_init', 'estate_theme_settings');

/**
 * Setup theme default settings.
 * 
 * @param $defaults
 * @return mixed
 * @since estate 1.0
 */
function estate_theme_setting_defaults($defaults){
	$defaults['general_logo'] = '';
	$defaults['general_site_description'] = true;
	$defaults['general_menu_search'] = false;
	$defaults['general_footer_attribution'] = true;
	$defaults['general_ajax_comments'] = false;

	$defaults['banner_image'] = false;
	$defaults['banner_type'] = 'title_banner';
	$defaults['banner_color'] = '#1c1c1c';
	$defaults['banner_title'] = __('Your Banner Title Goes Here', 'estate');
	$defaults['banner_subtitle'] = __('And a Subtitle, Maybe To Describe What You Do', 'estate');
	$defaults['banner_button'] = __('Action Button', 'estate');
	$defaults['banner_button_url'] = '#';

	$defaults['layout_responsive'] = true;
	$defaults['layout_responsive_menu'] = true;

	$defaults['text_footer_text'] = '';

	return $defaults;
}
add_filter('siteorigin_theme_default_settings', 'estate_theme_setting_defaults');