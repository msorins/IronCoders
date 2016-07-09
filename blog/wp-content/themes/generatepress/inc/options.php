<?php
/*
 WARNING: This is a core Generate file. DO NOT edit
 this file under any circumstances. Please do all modifications
 in the form of a child theme.
 */

/**
 * Creates the options page.
 *
 * This file is a core Generate file and should not be edited.
 *
 * @package  WordPress
 * @author   Thomas Usborne
 * @license  http://www.opensource.org/licenses/gpl-license.php GPL v2.0 (or later)
 * @link     http://www.generatepress.com
 */

// create custom plugin settings menu
add_action('admin_menu', 'generate_create_menu');
function generate_create_menu() 
{
	
	$generate_page = add_theme_page( __('GeneratePress','generate'), __('GeneratePress','generate'), 'edit_theme_options', 'generate-options', 'generate_settings_page' );
	
	add_action( "admin_print_scripts-$generate_page", 'generate_options_scripts' );
	add_action( "admin_print_styles-$generate_page", 'generate_options_styles' );
}

function generate_options_scripts() 
{
	// Something will go here one day...
}

function generate_options_styles() 
{
     wp_enqueue_style( 
        'generate-options', 
        get_template_directory_uri() . '/inc/css/style.css'
    );
}

function generate_settings_page() 
{
	?>
	<div class="wrap">
		<h2><?php _e('GeneratePress','generate');?></h2>
		<div class="metabox-holder">
			<div class="postbox-container" style="float: none;max-width: 700px;">
				<div class="meta-box-sortables">
					<form method="post" action="options.php">
						<?php settings_fields( 'generate-settings-group' ); ?>
						<?php do_settings_sections( 'generate-settings-group' ); ?>
						
						<?php
						if ( !empty($_GET['status']) && $_GET['status'] == 'imported' ) {
							echo '<div id="message" class="updated" style="max-width:670px;"><p>' . __('Import successful.','generate') . '</p></div>';
						}
						
						if ( !empty($_GET['status']) && $_GET['status'] == 'reset' ) {
							echo '<div id="message" class="updated" style="max-width:670px;"><p>' . __('Settings removed.','generate') . '</p></div>';
						}
						
						if ( !empty($_GET['settings-updated']) && $_GET['settings-updated'] == true ) {
							echo '<div id="message" class="updated" style="max-width:670px;"><p>' . __('Settings saved.','generate') . '</p></div>';
						}
						?>
								
						<div class="postbox generate-metabox" id="gen-1">
							<h3 class="hndle"><?php _e('Information','generate');?></h3>
							<div class="inside">
								<p>
									<strong style="display:inline-block;width:60px;"><?php _e('Version','generate');?>:</strong> <?php echo GENERATE_VERSION; ?><br />
									<strong style="display:inline-block;width:60px;"><?php _e('Author','generate');?>:</strong> <a href="<?php echo esc_url('http://edge22.com');?>" target="_blank">Tom Usborne</a><br />
									<strong style="display:inline-block;width:60px;"><?php _e('Website','generate');?>:</strong> <a href="<?php echo esc_url('http://generatepress.com');?>" target="_blank">GeneratePress</a>
								</p>
								<p>
									<span class="addon-title"><?php _e('Add-ons','generate');?></span>
									<?php 
									
									$addons = array(
										'1' => array(
												'name' => __('Colors','generate'),
												'version' => ( function_exists('generate_colors_setup') ) ? GENERATE_COLORS_VERSION : '',
												'id' => 'generate_colors_setup',
												'license' => 'gen_colors_license_key_status',
												'package' => 'generate_package_colors',
												'url' => esc_url('http://www.generatepress.com/downloads/generate-colors/'),
												'img' => get_template_directory_uri() . '/images/admin/colors.png'
							
										),
										'2' => array(
												'name' => __('Typography','generate'),
												'version' => ( function_exists('generate_fonts_setup') ) ? GENERATE_FONT_VERSION : '',
												'id' => 'generate_fonts_setup',
												'license' => 'gen_fonts_license_key_status',
												'package' => 'generate_package_typography',
												'url' => esc_url('http://www.generatepress.com/downloads/generate-typography/'),
												'img' => get_template_directory_uri() . '/images/admin/typography.png'
										 ),
										'3' => array(
												'name' => __('Page Header','generate'),
												'version' => ( function_exists('generate_page_header') ) ? GENERATE_PAGE_HEADER_VERSION : '',
												'id' => 'generate_page_header',
												'license' => 'gen_page_header_license_key_status',
												'package' => 'generate_package_page_header',
												'url' => esc_url('http://www.generatepress.com/downloads/generate-page-header/'),
												'img' => get_template_directory_uri() . '/images/admin/page-header.png'
										),
										'4' => array(
												'name' => __('Import / Export','generate'),
												'version' => ( function_exists('generate_insert_import_export') ) ? GENERATE_IE_VERSION : '',
												'id' => 'generate_insert_import_export',
												'license' => 'gen_ie_license_key_status',
												'package' => 'generate_package_import_export',
												'url' => esc_url('http://www.generatepress.com/downloads/generate-import-export/'),
												'img' => get_template_directory_uri() . '/images/admin/importexport.png'
										),
										'5' => array(
												'name' => __('Copyright','generate'),
												'version' => ( function_exists('generate_copyright_option') ) ? GENERATE_COPYRIGHT_VERSION : '',
												'id' => 'generate_copyright_option',
												'license' => 'gen_copyright_license_key_status',
												'package' => 'generate_package_copyright',
												'url' => esc_url('http://www.generatepress.com/downloads/generate-copyright/'),
												'img' => get_template_directory_uri() . '/images/admin/copyright.png'
										),
										'6' => array(
												'name' => __('Disable Elements','generate'),
												'version' => ( function_exists('generate_disable_elements') ) ? GENERATE_DE_VERSION : '',
												'id' => 'generate_disable_elements',
												'license' => 'gen_disable_elements_license_key_status',
												'package' => 'generate_package_disable_elements',
												'url' => esc_url('http://www.generatepress.com/downloads/generate-disable-elements/'),
												'img' => get_template_directory_uri() . '/images/admin/disable-items.png'
										),
										'7' => array(
												'name' => __('Blog','generate'),
												'version' => ( function_exists('generate_blog_get_defaults') ) ? GENERATE_BLOG_VERSION : '',
												'id' => 'generate_blog_get_defaults',
												'license' => 'gen_blog_license_key_status',
												'package' => 'generate_package_blog',
												'url' => esc_url('http://www.generatepress.com/downloads/generate-blog/'),
												'img' => get_template_directory_uri() . '/images/admin/blog.png'
										),
										'8' => array(
												'name' => __('Hooks','generate'),
												'version' => ( function_exists('generate_hooks_setup') ) ? GENERATE_HOOKS_VERSION : '',
												'id' => 'generate_hooks_setup',
												'license' => 'gen_hooks_license_key_status',
												'package' => 'generate_package_hooks',
												'url' => esc_url('http://www.generatepress.com/downloads/generate-hooks/'),
												'img' => get_template_directory_uri() . '/images/admin/hooks.png'
										),
										'9' => array(
												'name' => __('Spacing','generate'),
												'version' => ( function_exists('generate_spacing_setup') ) ? GENERATE_SPACING_VERSION : '',
												'id' => 'generate_spacing_setup',
												'license' => 'gen_spacing_license_key_status',
												'package' => 'generate_package_spacing',
												'url' => esc_url('http://www.generatepress.com/downloads/generate-spacing/'),
												'img' => get_template_directory_uri() . '/images/admin/spacing.png'
										),
										'10' => array(
												'name' => __('Backgrounds','generate'),
												'version' => ( function_exists('generate_backgrounds_setup') ) ? GENERATE_BACKGROUNDS_VERSION : '',
												'id' => 'generate_backgrounds_setup',
												'license' => 'gen_backgrounds_license_key_status',
												'package' => 'generate_package_backgrounds',
												'url' => esc_url('http://www.generatepress.com/downloads/generate-backgrounds/'),
												'img' => get_template_directory_uri() . '/images/admin/backgrounds.png'
										),
										'11' => array(
												'name' => __('Secondary Nav','generate'),
												'version' => ( function_exists('generate_secondary_nav_setup') ) ? GENERATE_SECONDARY_NAV_VERSION : '',
												'id' => 'generate_secondary_nav_setup',
												'license' => 'gen_secondary_nav_license_key_status',
												'package' => 'generate_package_secondary_nav',
												'url' => esc_url('http://www.generatepress.com/downloads/generate-secondary-nav/'),
												'img' => get_template_directory_uri() . '/images/admin/secondarynav.png'
										)
									);
									
									foreach ( $addons as $addon ) {
										// If GP Premium is installed
										if ( defined( 'GP_PREMIUM_VERSION' ) ) {
											if ( !function_exists( $addon['id'] ) ) :
												echo '<span class="addon-inactive"><a title="' . $addon['name'] . ': ' . __('Not activated.','generate') . '" href="' . $addon['url'] . '" target="_blank"><img src="' . $addon['img'] . '" alt="' . $addon['name'] . '" /></a></span>';
											else :

												if ( get_option( $addon['package'] ) !== 'activated' ) :
													echo '<span class="addon-inactive need-license"><a title="' . $addon['name'] . ': ' . __('Activated and unverified. Please activate below.','generate') . '" href="' . $addon['url'] . '" target="_blank"><img src="' . $addon['img'] . '" alt="' . $addon['name'] . '" /></a></span>';
												else :
													echo '<span class="addon-active"><a title="' . $addon['name'] . ': ' . __('Activated and verified.','generate') . '" href="' . $addon['url'] . '" target="_blank"><img src="' . $addon['img'] . '" alt="' . $addon['name'] . '" /></a></span>';
												endif;
											
											endif;
										// If GP Premium isn't installed
										} else {
											if ( !function_exists( $addon['id'] ) ) :
												echo '<span class="addon-inactive"><a title="' . $addon['name'] . ': ' . __('Not activated.','generate') . '" href="' . $addon['url'] . '" target="_blank"><img src="' . $addon['img'] . '" alt="' . $addon['name'] . '" /></a></span>';
											else :
											
												if ( get_option($addon['license']) !== 'valid' ) :
													echo '<span class="addon-inactive need-license"><a title="' . $addon['name'] . ': ' . __('Activated and unverified. Please activate below.','generate') . '" href="' . $addon['url'] . '" target="_blank"><img src="' . $addon['img'] . '" alt="' . $addon['name'] . '" /></a></span>';
												else :
													echo '<span class="addon-active"><a title="' . $addon['name'] . ': ' . __('Activated and verified.','generate') . '" href="' . $addon['url'] . '" target="_blank"><img src="' . $addon['img'] . '" alt="' . $addon['name'] . '" /></a></span>';
												endif;
											
											endif;
										}
									}
									?>
											
								</p>
										
								<div class="clear" style="margin-bottom:20px;"></div>
										
								<p>
									<a id="generate_customize_button" class="button button-primary" href="<?php echo admin_url('customize.php'); ?>"><?php _e('Customizer','generate');?></a>  
									<?php if ( generate_addons_available() ) : ?>
										<a id="generate_addon_button" class="button button-primary" href="<?php echo esc_url('http://generatepress.com/addons');?>" target="_blank"><?php _e('Add-ons','generate');?></a> 
									<?php endif; ?>
									<a title="<?php _e('Please help support development of the GeneratePress by buying me a coffee :)','generate');?>" class="button button-primary" target="_blank" href="<?php echo esc_url('https://www.paypal.com/cgi-bin/webscr?cmd=_s-xclick&hosted_button_id=UVPTY2ZJA68S6');?>"><?php _e('Buy me a coffee :)','generate');?></a>
								</p>
							</div>
						</div>

						<?php do_action('generate_inside_options_form'); ?>
						
						<div class="postbox generate-metabox" id="gen-license-keys">
							<h3 class="hndle"><?php _e('Addon Activation','generate');?></h3>
							<div class="inside">
							
								<?php
								if ( generate_no_addons() == true ) :
									echo __('Looks like you don\'t have any Add-ons! <a href="' . esc_url('http://generatepress.com/addons') . '" target="_blank">Take a look at what\'s available here</a>.','generate');
								endif;
								
								do_action('generate_license_key_items'); 
								?>

							</div>
						</div>
									
						<div style="display:block;clear:both;width:100%;"></div>
						<?php submit_button(); ?>

					</form>
								
					<?php do_action('generate_options_items'); ?>
					
					<div class="postbox generate-metabox" id="gen-delete">
						<h3 class="hndle"><?php _e('Delete Customizer Settings','generate');?></h3>
						<div class="inside">
										
							<p><?php _e( '<strong>Warning:</strong> Clicking this button will delete your settings set in the <a href="' . admin_url('customize.php') . '">Customizer</a> area.','generate' ); ?></p>
							<p><?php _e( 'You may want to export your settings before deleting them forever.','generate');?></p>
							<form method="post">
								<p><input type="hidden" name="generate_reset_customizer" value="generate_reset_customizer_settings" /></p>
								<p>
									<?php wp_nonce_field( 'generate_reset_customizer_nonce', 'generate_reset_customizer_nonce' ); ?>
									<?php submit_button( __( 'Delete Default Customizer Settings', 'generate' ), 'button', 'submit', false ); ?>
								</p>
								
							</form>
							<?php do_action('generate_delete_settings_form');?>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
<?php }

/**
 * Reset customizer settings
 */
add_action( 'admin_init', 'generate_reset_customizer_settings' );
function generate_reset_customizer_settings() {

	if( empty( $_POST['generate_reset_customizer'] ) || 'generate_reset_customizer_settings' !== $_POST['generate_reset_customizer'] )
		return;

	if( ! wp_verify_nonce( $_POST['generate_reset_customizer_nonce'], 'generate_reset_customizer_nonce' ) )
		return;

	if( ! current_user_can( 'manage_options' ) )
		return;

	delete_option('generate_settings');
	
	wp_safe_redirect( admin_url( 'admin.php?page=generate-options&status=reset' ) ); exit;

}