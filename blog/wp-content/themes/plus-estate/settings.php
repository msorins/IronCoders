<?php

/**
 * Add all the premium settings.
 */
function estate_plus_settings_init(){
	siteorigin_settings_add_field('general', 'footer_attribution', 'checkbox');
	siteorigin_settings_add_field('general', 'logo_retina', 'media');
	siteorigin_settings_add_field('general', 'ajax_comments', 'checkbox');
	siteorigin_settings_add_field('layout', 'responsive', 'checkbox');
	siteorigin_settings_add_field('layout', 'responsive_menu', 'checkbox');
}
add_action('admin_init', 'estate_plus_settings_init');