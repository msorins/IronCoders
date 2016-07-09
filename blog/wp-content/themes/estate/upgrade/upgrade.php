<?php

function estate_premium_upgrade_content($content){
	$content['premium_title'] = __('Upgrade To Estate Plus', 'estate');
	$content['premium_summary'] = __("If you've enjoyed using Estate, you're going to love Estate Plus. It's a robust upgrade to Estate that gives you loads of cool features. All you need to do is sign up to our newsletter and we'll send you the Plus plugin.", 'estate');

	$content['free_download'] = true;
	$content['buy_url'] = 'http://siteorigin.com/theme/estate/?action=plus';
	$content['premium_video_poster'] = get_template_directory_uri().'/upgrade/poster.jpg';

	$content['features'] = array();

	$content['features'][] = array(
		'heading' => __("Responsive Features", 'estate'),
		'content' => __("The final puzzle pieces in making Estate fully responsive. Estate Plus has footer widgets that collapse below each other on small screen devices. Its menu collapses into a single navigate button which activates an intuitive nested menu system and site search.", 'estate'),
	);

	$content['features'][] = array(
		'heading' => __('Remove Attribution Links', 'estate'),
		'content' => __('Estate Plus gives you the option to easily remove the "Powered by WordPress, Theme by SiteOrigin" text from your footer. ', 'estate'),
	);

	$content['features'][] = array(
		'heading' => __("Ajax Comments", 'estate'),
		'content' => __("Want to keep the conversation flowing? Ajax comments means your visitors can comment without reloading your page. So commenting wont interrupt a video or lose their position in one of your galleries.", 'estate'),
	);

	$content['features'][] = array(
		'heading' => __("CSS Editor", 'estate'),
		'content' => __("A simple CSS editor that lets you easily add code that changes the look of Estate. You can count on our support staff to help you with CSS snippets to get the look you're after. Best of all, your changes will persist across updates.", 'estate'),
	);

	$content['features'][] = array(
		'heading' => __('Free Forum Support', 'estate'),
		'content' => __("Need help setting up Estate? We provide free forum support for all our users.", 'estate'),
	);

	$content['features'][] = array(
		'heading' => __("Newsletter Updates", 'estate'),
		'content' => __("By signing up to our newsletter, we'll keep you up to date with our free theme and plugin releases.", 'estate'),
	);

	$content['testimonials'] = array(
		array(
			'gravatar' => 'e75bc3547b215cb0e305176e111ce828',
			'name' => 'SamaraI',
			'content' => __("When I found out this was made by the SiteOrigin folks, who also make the very powerful Page Builder, it was a no-brainer. Greg, Andrew, and SiteOrigin are amazing, and the Estate theme is solid.", 'snapshot'),
		),
	);

	return $content;
}
add_filter('siteorigin_premium_content', 'estate_premium_upgrade_content');