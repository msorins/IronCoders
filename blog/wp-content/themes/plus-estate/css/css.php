<?php

/**
 * Add the custom CSS editor to the admin menu.
 */
function siteorigin_custom_css_admin_menu() {
	add_theme_page( __( 'Custom CSS', 'siteorigin' ), __( 'Custom CSS', 'siteorigin' ), 'edit_theme_options', 'siteorigin_custom_css', 'siteorigin_custom_css_page' );

	if ( current_user_can('edit_theme_options') && isset( $_POST['siteorigin_custom_css_save'] ) ) {
		check_admin_referer( 'custom_css', '_sononce' );
		$theme = basename( get_template_directory() );

		$current = get_option('siteorigin_custom_css[' . $theme . ']');
		if( $current === false ) {
			add_option( 'siteorigin_custom_css[' . $theme . ']', stripslashes( $_POST['custom_css'] ), '', 'no' );
		}
		else {
			update_option( 'siteorigin_custom_css[' . $theme . ']', stripslashes( $_POST['custom_css'] ) );
		}

		// If this has changed, then add a revision.
		if($current != stripslashes( $_POST['custom_css'] )) {
			$revisions = get_option( 'siteorigin_custom_css_revisions[' . $theme . ']' );
			if ( empty( $revisions ) ) {
				add_option( 'siteorigin_custom_css_revisions[' . $theme . ']', array(), '', 'no' );
				$revisions = array();
			}
			$revisions[ time() ] = stripslashes( $_POST['custom_css'] );

			// Sort the revisions and cut off any old ones.
			krsort($revisions);
			$revisions = array_slice($revisions, 0, 15, true);

			update_option( 'siteorigin_custom_css_revisions[' . $theme . ']', $revisions );
		}
	}

}
add_action( 'admin_menu', 'siteorigin_custom_css_admin_menu' );

/**
 * Add the help tab for custom CSS page.
 */
function siteorigin_custom_css_help() {
	$screen = get_current_screen();
	$theme = basename( get_template_directory() );
	$screen->add_help_tab( array(
		'id' => 'custom-css',
		'title' => __( 'Custom CSS', 'siteorigin' ),
		'content' => '<p>'
			. sprintf( __( "%s adds any custom CSS you enter here into your site's header. ", 'siteorigin' ), ucfirst( $theme ) )
			. __( "These changes will persist across updates so it's best to make all your changes here. ", 'siteorigin' )
			. sprintf( __( "Post on <a href='%s' target='_blank'>our support forum</a> for help with making edits. ", 'siteorigin' ), 'http://siteorigin.com/thread/' )
			. '</p>'
	) );
}
add_action( 'load-appearance_page_siteorigin_custom_css', 'siteorigin_custom_css_help' );


/**
 *
 * @param $page
 * @return mixed
 */
function siteorigin_custom_css_enqueue( $page ) {
	if ( $page != 'appearance_page_siteorigin_custom_css' ) return;

	$root_uri = apply_filters('siteorigin_extras_premium_root_uri', get_template_directory_uri() . '/premium/extras/' );

	wp_enqueue_script( 'codemirror', $root_uri . 'css/codemirror/lib/codemirror.min.js', array(), '4.2.0' );
	wp_enqueue_script( 'codemirror-mode-css', $root_uri . 'css/codemirror/mode/css/css.min.js', array(), '4.2.0' );

	wp_enqueue_style( 'codemirror', $root_uri . 'css/codemirror/lib/codemirror.css', array(), '4.2.0' );
	wp_enqueue_style( 'codemirror-theme-neat', $root_uri . 'css/codemirror/theme/neat.css', array(), '4.2.0' );

	wp_enqueue_script( 'siteorigin-custom-css', $root_uri . 'css/admin.min.js', array( 'jquery' ), SITEORIGIN_THEME_VERSION );
	wp_enqueue_style( 'siteorigin-custom-css', $root_uri . 'css/admin.css', array( ), SITEORIGIN_THEME_VERSION );
}
add_action( 'admin_enqueue_scripts', 'siteorigin_custom_css_enqueue' );


/**
 * Render the custom CSS page
 */
function siteorigin_custom_css_page() {
	$theme = basename( get_template_directory() );

	$custom_css = get_option( 'siteorigin_custom_css[' . $theme . ']', '' );
	$custom_css_revisions = get_option('siteorigin_custom_css_revisions[' . $theme . ']');

	if(!empty($_GET['theme']) && $_GET['theme'] == $theme && !empty($_GET['time']) && !empty($custom_css_revisions[$_GET['time']])) {
		$custom_css = $custom_css_revisions[$_GET['time']];
		$revision = true;
	}

	include dirname(__FILE__).'/page.php';
}


/**
 * Display the custom CSS.
 *
 * @return mixed
 */
function siteorigin_custom_css_display() {
	$theme = basename( get_template_directory() );
	$custom_css = get_option( 'siteorigin_custom_css[' . $theme . ']', '' );
	if ( empty( $custom_css ) ) return;

	// We just need to enqueue a dummy style
	echo "<style type='text/css'>\n";
	echo "$custom_css\n";
	echo "</style>\n";
}
add_action( 'wp_head', 'siteorigin_custom_css_display', 15 );