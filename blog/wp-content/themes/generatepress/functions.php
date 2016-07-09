<?php
/**
 * Generate functions and definitions
 *
 * @package Generate
 */
	
define( 'GENERATE_VERSION', '1.2.8');
define( 'GENERATE_URI', get_template_directory_uri() );
define( 'GENERATE_DIR', get_template_directory() );

add_action( 'after_setup_theme', 'generate_setup' );
if ( ! function_exists( 'generate_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which runs
 * before the init hook. The init hook is too late for some features, such as indicating
 * support post thumbnails.
 */
function generate_setup() {

	/**
	 * Make theme available for translation
	 * Translations can be filed in the /languages/ directory
	 * If you're building a theme based on Generate, use a find and replace
	 * to change 'generate' to the name of your theme in all the template files
	 */
	load_theme_textdomain( 'generate', get_template_directory() . '/languages' );

	/**
	 * Add default posts and comments RSS feed links to head
	 */
	add_theme_support( 'automatic-feed-links' );

	/**
	 * Enable support for Post Thumbnails on posts and pages
	 *
	 * @link http://codex.wordpress.org/Function_Reference/add_theme_support#Post_Thumbnails
	 */
	add_theme_support( 'post-thumbnails' );
	
	/**
	  * Allow shortcodes in widgets
	  */
	add_filter('widget_text', 'do_shortcode');

	/**
	 * This theme uses wp_nav_menu() in one location.
	 */
	register_nav_menus( array(
		'primary' => __( 'Primary Menu', 'generate' ),
	) );

	/**
	 * Enable support for Post Formats
	 */
	add_theme_support( 'post-formats', array( 'aside', 'image', 'video', 'quote', 'link' ) );
	
	/**
	 * Enable support for WooCommerce
	 */
	add_theme_support( 'woocommerce' );
	
	/**
	 * Enable support for <title> tag
	 */
	add_theme_support( 'title-tag' );
	
	/**
	 * Set the content width based on the theme's design and stylesheet.
	 */
	global $content_width;
	if ( ! isset( $content_width ) )
		$content_width = 1200; /* pixels */


}
endif; // generate_setup

/**
 * Set default options
 */
function generate_get_defaults()
{
	$generate_defaults = array(
		'hide_title' => '',
		'hide_tagline' => '',
		'logo' => '',
		'container_width' => '1100',
		'header_layout_setting' => 'fluid-header',
		'nav_alignment_setting' => 'left',
		'header_alignment_setting' => 'left',
		'nav_layout_setting' => 'fluid-nav',
		'nav_position_setting' => 'nav-below-header',
		'nav_search' => 'disable',
		'content_layout_setting' => 'separate-containers',
		'layout_setting' => 'right-sidebar',
		'blog_layout_setting' => 'right-sidebar',
		'single_layout_setting' => 'right-sidebar',
		'post_content' => 'full',
		'footer_layout_setting' => 'fluid-footer',
		'footer_widget_setting' => '3',
		'background_color' => '#efefef',
		'text_color' => '#3a3a3a',
		'link_color' => '#1e73be',
		'link_color_hover' => '#000000',
		'link_color_visited' => '',
	);
	
	return apply_filters( 'generate_option_defaults', $generate_defaults );
}

/**
 * Register widgetized area and update sidebar with default widgets
 */
add_action( 'widgets_init', 'generate_widgets_init' );
function generate_widgets_init() {
	register_sidebar( array(
		'name'          => __( 'Right Sidebar', 'generate' ),
		'id'            => 'sidebar-1',
		'before_widget' => '<aside id="%1$s" class="widget inner-padding %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => apply_filters( 'generate_start_widget_title', '<h4 class="widget-title">' ),
		'after_title'   => apply_filters( 'generate_end_widget_title', '</h4>' ),
	) );
	register_sidebar( array(
		'name'          => __( 'Left Sidebar', 'generate' ),
		'id'            => 'sidebar-2',
		'before_widget' => '<aside id="%1$s" class="widget inner-padding %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => apply_filters( 'generate_start_widget_title', '<h4 class="widget-title">' ),
		'after_title'   => apply_filters( 'generate_end_widget_title', '</h4>' ),
	) );
	register_sidebar( array(
		'name'          => __( 'Header', 'generate' ),
		'id'            => 'header',
		'before_widget' => '<aside id="%1$s" class="widget inner-padding %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => apply_filters( 'generate_start_widget_title', '<h4 class="widget-title">' ),
		'after_title'   => apply_filters( 'generate_end_widget_title', '</h4>' ),
	) );
	register_sidebar( array(
		'name'          => __( 'Footer Widget 1', 'generate' ),
		'id'            => 'footer-1',
		'before_widget' => '<aside id="%1$s" class="widget inner-padding %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => apply_filters( 'generate_start_widget_title', '<h4 class="widget-title">' ),
		'after_title'   => apply_filters( 'generate_end_widget_title', '</h4>' ),
	) );
	register_sidebar( array(
		'name'          => __( 'Footer Widget 2', 'generate' ),
		'id'            => 'footer-2',
		'before_widget' => '<aside id="%1$s" class="widget inner-padding %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => apply_filters( 'generate_start_widget_title', '<h4 class="widget-title">' ),
		'after_title'   => apply_filters( 'generate_end_widget_title', '</h4>' ),
	) );
	register_sidebar( array(
		'name'          => __( 'Footer Widget 3', 'generate' ),
		'id'            => 'footer-3',
		'before_widget' => '<aside id="%1$s" class="widget inner-padding %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => apply_filters( 'generate_start_widget_title', '<h4 class="widget-title">' ),
		'after_title'   => apply_filters( 'generate_end_widget_title', '</h4>' ),
	) );
	register_sidebar( array(
		'name'          => __( 'Footer Widget 4', 'generate' ),
		'id'            => 'footer-4',
		'before_widget' => '<aside id="%1$s" class="widget inner-padding %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => apply_filters( 'generate_start_widget_title', '<h4 class="widget-title">' ),
		'after_title'   => apply_filters( 'generate_end_widget_title', '</h4>' ),
	) );
	register_sidebar( array(
		'name'          => __( 'Footer Widget 5', 'generate' ),
		'id'            => 'footer-5',
		'before_widget' => '<aside id="%1$s" class="widget inner-padding %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => apply_filters( 'generate_start_widget_title', '<h4 class="widget-title">' ),
		'after_title'   => apply_filters( 'generate_end_widget_title', '</h4>' ),
	) );
}

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Custom functions that act independently of the theme templates.
 */
require get_template_directory() . '/inc/extras.php';

/**
 * Build the navigation
 */
require get_template_directory() . '/inc/navigation.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Element Classes
 */
require get_template_directory() . '/inc/element-classes.php';

/**
 * Load Metaboxes
 */
require get_template_directory() . '/inc/metaboxes.php';

/**
 * Load Options
 */
require get_template_directory() . '/inc/options.php';

/**
 * Load Addon options
 */
require get_template_directory() . '/inc/addons.php';

/**
 * Enqueue scripts and styles
 */
add_action( 'wp_enqueue_scripts', 'generate_scripts' );
function generate_scripts() {

	$generate_settings = wp_parse_args( 
		get_option( 'generate_settings', array() ), 
		generate_get_defaults() 
	);

	// Generate stylesheets
	wp_enqueue_style( 'generate-style-grid', get_template_directory_uri() . '/css/unsemantic-grid.css', false, GENERATE_VERSION, 'all' );
	wp_enqueue_style( 'generate-style', get_template_directory_uri() . '/style.css', false, GENERATE_VERSION, 'all' );
	wp_enqueue_style( 'generate-mobile-style', get_template_directory_uri() . '/css/mobile.css', false, GENERATE_VERSION, 'all' );
	wp_add_inline_style( 'generate-style', generate_base_css() );
	if ( is_child_theme() ) :
		wp_enqueue_style( 'generate-child', get_stylesheet_uri(), true, filemtime( get_stylesheet_directory() . '/style.css' ), 'all' );
	endif;
	wp_enqueue_style( 'superfish', get_template_directory_uri() . '/css/superfish.css', false, GENERATE_VERSION, 'all' );
	wp_enqueue_style( 'fontawesome', get_template_directory_uri() . '/css/font-awesome.min.css', false, '4.2.0', 'all' );

	// Generate scripts
	wp_enqueue_script( 'generate-navigation', get_template_directory_uri() . '/js/navigation.js', array(), GENERATE_VERSION, true );
	wp_enqueue_script( 'superfish', get_template_directory_uri() . '/js/superfish.js', array('jquery'), GENERATE_VERSION, true );
	wp_enqueue_script( 'hoverIntent', get_template_directory_uri() . '/js/hoverIntent.js', array('superfish'), GENERATE_VERSION, true );

	if ( 'enable' == $generate_settings['nav_search'] ) {
		wp_enqueue_script( 'generate-navigation-search', get_template_directory_uri() . '/js/navigation-search.js', array('jquery'), GENERATE_VERSION, true );
		wp_localize_script( 'generate-navigation-search', 'generateSearch', array(
			'search' => _x( 'Search', 'submit button', 'generate' ),
		) );
	}
	
	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}

	if ( is_singular() && wp_attachment_is_image() ) {
		wp_enqueue_script( 'generate-keyboard-image-navigation', get_template_directory_uri() . '/js/keyboard-image-navigation.js', array( 'jquery' ), '20120202' );
	}
}


/**
 * Construct the sidebars
 * @since 0.1
 */
add_action('generate_sidebars','generate_contruct_sidebars');
function generate_contruct_sidebars()
{
	global $post;
	$generate_settings = wp_parse_args( 
		get_option( 'generate_settings', array() ), 
		generate_get_defaults() 
	);
	$stored_meta = '';
	
	// Prevent PHP notices
	if ( isset( $post ) ) :
		$stored_meta = get_post_meta( $post->ID, '_generate-sidebar-layout-meta', true );
	endif;
	
	// Is BuddyPress active on this page?
	$buddypress = false;
	if ( function_exists( 'is_buddypress' ) ) :
		if ( is_buddypress() ) {
			$buddypress = true;
		} else {
			$buddypress = false;
		}
	endif;

	// If we're on the single post page, use appropriate setting
	// And if we're not on a BuddyPress page - fixes a bug where BP thinks is_single() is true
	if ( is_single() && ! $buddypress ) :
		$generate_settings['layout_setting'] = null;
		$generate_settings['layout_setting'] = $generate_settings['single_layout_setting'];
	endif;

	// If the metabox is set, use it instead of the global settings
	if ( '' !== $stored_meta && false !== $stored_meta ) :
		$generate_settings['layout_setting'] = $stored_meta;
	endif;
	
	// If we're on the blog, single post etc.. replace value with the blog layout setting
	if ( is_home() ||
		is_category() || 
		is_tag() || 
		is_archive() || 
		is_tax() || 
		is_author() || 
		is_date() || 
		is_search() || 
		is_attachment() ) :
		$generate_settings['layout_setting'] = null;
		$generate_settings['layout_setting'] = $generate_settings['blog_layout_setting'];
	endif;
	
	// When to show the right sidebar
	$rs = array('right-sidebar','both-sidebars','both-right','both-left');

	// When to show the left sidebar
	$ls = array('left-sidebar','both-sidebars','both-right','both-left');
	
	// If right sidebar, show it
	if ( in_array( $generate_settings['layout_setting'], $rs ) ) :
		get_sidebar(); 
	endif;

	// If left sidebar, show it
	if ( in_array( $generate_settings['layout_setting'], $ls ) ) :
		get_sidebar('left'); 
	endif;
	
}

add_action('generate_credits','generate_add_footer_info');
function generate_add_footer_info()
{
	?>
	<span class="copyright"><?php _e('Copyright','generate');?> &copy; <?php echo date('Y'); ?></span> <?php do_action('generate_copyright_line');?>
	<?php
}

add_action('generate_copyright_line','generate_add_login_attribution');
function generate_add_login_attribution()
{
	?>
	&#x000B7; <a href="<?php echo esc_url('http://generatepress.com');?>" target="_blank" title="<?php _e('GeneratePress','generate');?>"><?php _e('GeneratePress','generate');?></a> &#x000B7; <a href="http://wordpress.org" target="_blank" title="<?php _e('Proudly powered by WordPress','generate');?>"><?php _e('WordPress','generate');?></a>
	<?php
}

/**
 * Generate the CSS in the <head> section using the Theme Customizer
 * @since 0.1
 */
function generate_base_css()
{
	
	$generate_settings = wp_parse_args( 
		get_option( 'generate_settings', array() ), 
		generate_get_defaults() 
	);
	$space = ' ';
	
	// Start the magic
	$visual_css = array (
	
		// Body CSS
		'body'  => array(
			'background-color' => $generate_settings['background_color'],
			'color' => $generate_settings['text_color']
		),
		
		// Link CSS
		'a, a:visited' => array(
			'color'				=> $generate_settings['link_color'],
			'text-decoration' 	=> 'none'
		),
		
		// Visited link color if specified
		'a:visited' => array(
			'color' 			=> ( !empty( $generate_settings['link_color_visited'] ) ) ? $generate_settings['link_color_visited'] : null,
		),
		
		// Link hover
		'a:hover, a:focus, a:active' => array(
			'color' 			=> $generate_settings['link_color_hover'],
			'text-decoration' 	=> null
		),
		
		// Grid container
		'body .grid-container' => array(
			'max-width' => $generate_settings['container_width'] . 'px'
		)
		
	);
	
	// Output the above CSS
	$output = '';
	foreach($visual_css as $k => $properties) {
		if(!count($properties))
			continue;

		$temporary_output = $k . ' {';
		$elements_added = 0;

		foreach($properties as $p => $v) {
			if(empty($v))
				continue;

			$elements_added++;
			$temporary_output .= $p . ': ' . $v . '; ';
		}

		$temporary_output .= "}";

		if($elements_added > 0)
			$output .= $temporary_output;
	}

	$output = str_replace(array("\r", "\n"), '', $output);
	return $output;
}

/**
 * Build the page header
 * @since 1.0.7
 */
function generate_featured_page_header_area($class)
{
	// Don't run the function unless we're on a page it applies to
	if ( ! is_singular() )
		return;
		
	global $post;
	$page_header_image_info = wp_get_attachment_image_src( get_post_thumbnail_id(), 'full' );
	$page_header_image = wp_get_attachment_url( get_post_thumbnail_id($post->ID, 'full') );
	$page_header_image_width = $page_header_image_info[1];
	$page_header_image_height = $page_header_image_info[2];
		
	if ( !empty($page_header_image) ) :
		echo '<div class="' . $class . ' grid-container grid-parent">';
			echo '<img src="' . $page_header_image . '" width="' . $page_header_image_width . '" height="' . $page_header_image_height . '" alt="" />';
		echo '</div>';
	endif;
}

/**
 * Add page header above content
 * @since 1.0.2
 */
add_action('generate_after_header','generate_featured_page_header', 10);
function generate_featured_page_header()
{
	if ( function_exists('generate_page_header') )
		return;

	if ( is_page() ) :
		
		generate_featured_page_header_area('page-header-image');
	
	endif;
}

/**
 * Add post header inside content
 * Only add to single post
 * @since 1.0.7
 */
add_action('generate_before_content','generate_featured_page_header_inside_single', 10);
function generate_featured_page_header_inside_single()
{
	if ( function_exists('generate_page_header') )
		return;

	if ( is_single() ) :
	
		generate_featured_page_header_area('page-header-image-single');
	
	endif;
}

/** 
 * Moving standalone db entries to generate_settings db entry
 * @since 1.0.8
 */
add_action('after_setup_theme', 'generate_update_db_entries');
function generate_update_db_entries() 
{
	$generate_settings = get_option('generate_settings');
	
	
	//Grab options
	$generate_hide_title = get_theme_mod( 'generate_title' );
	$generate_hide_tagline = get_theme_mod( 'generate_tagline' );
	$generate_logo = get_theme_mod( 'generate_logo' );
	
	if ( !empty( $generate_settings['center_nav'] ) ) :
		$generate_new_alignment = array();
		$generate_new_alignment['nav_alignment_setting'] = 'center';
		$generate_new_alignment['center_nav'] = '';
		$generate_new_alignment_settings = wp_parse_args( $generate_new_alignment, $generate_settings );
		update_option( 'generate_settings', $generate_new_alignment_settings );
	endif;
	
	if ( !empty( $generate_settings['center_header'] ) ) :
		$generate_new_alignment = array();
		$generate_new_alignment['header_alignment_setting'] = 'center';
		$generate_new_alignment['center_header'] = '';
		$generate_new_alignment_settings = wp_parse_args( $generate_new_alignment, $generate_settings );
		update_option( 'generate_settings', $generate_new_alignment_settings );
	endif;

	if ( !empty( $generate_hide_title ) || !empty( $generate_hide_tagline ) || !empty( $generate_logo ) ) {
	
		// Set up array
		$generate_new_entries = array();
		
		if ( !empty( $generate_hide_title ) ) {
			$generate_new_entries['hide_title'] = $generate_hide_title;
		}
		
		if ( !empty( $generate_hide_tagline ) ) {
			$generate_new_entries['hide_tagline'] = $generate_hide_tagline;
		}
		
		if ( !empty( $generate_logo ) ) {
			$generate_new_entries['logo'] = $generate_logo;
		}
		
		// Update options based on the above
		$generate_new_entry_settings = wp_parse_args( $generate_new_entries, $generate_settings );
		update_option( 'generate_settings', $generate_new_entry_settings );
		remove_theme_mod( 'generate_title' );
		remove_theme_mod( 'generate_tagline' );
		remove_theme_mod( 'generate_logo' );
	}
}

/** 
 * Add viewport to wp_head
 * Decide whether mobile viewport should be added or fixed width viewport
 * @since 1.1.0
 */
add_action('wp_head','generate_add_viewport');
function generate_add_viewport()
{
	$generate_settings = wp_parse_args( 
		get_option( 'generate_settings', array() ), 
		generate_get_defaults() 
	);
	
	if ( !defined( 'GENERATE_DISABLE_MOBILE' ) ) :
		echo '<meta name="viewport" content="width=device-width, initial-scale=1">';
	else :
		echo '<meta name="viewport" content="width=' . $generate_settings['container_width'] . 'px">';
	endif;
}

/** 
 * Destroy mobile responsive functionality
 * Only run if GENERATE_DISABLE_MOBILE constant is defined
 * @since 1.1.0
 */
add_action( 'wp_enqueue_scripts', 'generate_dequeue_mobile_scripts', 100 );
function generate_dequeue_mobile_scripts() {

	if ( !defined( 'GENERATE_DISABLE_MOBILE' ) )
		return;
		
	$generate_settings = wp_parse_args( 
		get_option( 'generate_settings', array() ), 
		generate_get_defaults() 
	);

	// Remove mobile stylesheets and scripts
	wp_dequeue_style( 'generate-mobile-style' );
	wp_dequeue_style( 'generate-style-grid' );
	wp_dequeue_script( 'generate-navigation' );
	
	// Add in mobile grid (no min-width on line 100)
	wp_enqueue_style( 'generate-style-grid-no-mobile', get_template_directory_uri() . '/css/unsemantic-grid-no-mobile.css', false, GENERATE_VERSION, 'all' );
  
   // Add necessary styles to kill mobile resposive features
	$styles = 'body .grid-container {width:' . $generate_settings['container_width'] . 'px;max-width:' . $generate_settings['container_width'] . 'px}';
	$styles .= '.menu-toggle {display:none;}';
	wp_add_inline_style( 'generate-style', $styles );
}

/** 
 * Add compatibility for IE8 and lower
 * @since 1.1.9
 */
add_action('wp_head','generate_ie_compatibility');
function generate_ie_compatibility()
{
?>
	<!--[if lt IE 9]>
		<script src="<?php echo get_template_directory_uri();?>/js/html5shiv.js"></script>
		<link rel="stylesheet" href="<?php echo get_template_directory_uri();?>/css/ie.css" />
	<![endif]-->
<?php
}

/**
 * Remove WordPress's default padding on images with captions
 *
 * @param int $width Default WP .wp-caption width (image width + 10px)
 * @return int Updated width to remove 10px padding
 */
if ( ! function_exists( 'generate_remove_caption_padding' ) ) :
add_filter( 'img_caption_shortcode_width', 'generate_remove_caption_padding' );
function generate_remove_caption_padding( $width ) {
	return $width - 10;
}
endif;