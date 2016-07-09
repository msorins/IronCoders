<?php
/**
 * Custom template tags for this theme.
 *
 * Eventually, some of the functionality here could be replaced by core features
 *
 * @package Generate
 */
if ( ! function_exists( 'generate_paging_nav' ) ) :
	function generate_paging_nav() {
		// Don't print empty markup if there's only one page.
		if ( $GLOBALS['wp_query']->max_num_pages < 2 ) {
			return;
		}

		$paged        = get_query_var( 'paged' ) ? intval( get_query_var( 'paged' ) ) : 1;
		$pagenum_link = html_entity_decode( get_pagenum_link() );
		$query_args   = array();
		$url_parts    = explode( '?', $pagenum_link );

		if ( isset( $url_parts[1] ) ) {
			wp_parse_str( $url_parts[1], $query_args );
		}

		$pagenum_link = remove_query_arg( array_keys( $query_args ), $pagenum_link );
		$pagenum_link = trailingslashit( $pagenum_link ) . '%_%';

		$format  = $GLOBALS['wp_rewrite']->using_index_permalinks() && ! strpos( $pagenum_link, 'index.php' ) ? 'index.php/' : '';
		$format .= $GLOBALS['wp_rewrite']->using_permalinks() ? user_trailingslashit( 'page/%#%', 'paged' ) : '?paged=%#%';

		// Set up paginated links.
		$links = paginate_links( array(
			'base'     => $pagenum_link,
			'format'   => $format,
			'total'    => $GLOBALS['wp_query']->max_num_pages,
			'current'  => $paged,
			'mid_size' => 1,
			'add_args' => array_map( 'urlencode', $query_args ),
			'prev_text' => __( '&larr; Previous', 'generate' ),
			'next_text' => __( 'Next &rarr;', 'generate' ),
		) );

		if ( $links ) :

			echo $links; 

		endif;
	}
endif;

if ( ! function_exists( 'generate_content_nav' ) ) :
/**
 * Display navigation to next/previous pages when applicable
 */
function generate_content_nav( $nav_id ) {

	global $wp_query, $post;

	// Don't print empty markup on single pages if there's nowhere to navigate.
	if ( is_single() ) {
		$previous = ( is_attachment() ) ? get_post( $post->post_parent ) : get_adjacent_post( false, '', true );
		$next = get_adjacent_post( false, '', false );

		if ( ! $next && ! $previous )
			return;
	}

	// Don't print empty markup in archives if there's only one page.
	if ( $wp_query->max_num_pages < 2 && ( is_home() || is_archive() || is_search() ) )
		return;

	$nav_class = ( is_single() ) ? 'post-navigation' : 'paging-navigation';

	?>
	<nav role="navigation" id="<?php echo esc_attr( $nav_id ); ?>" class="<?php echo $nav_class; ?>">
		<h6 class="screen-reader-text"><?php _e( 'Post navigation', 'generate' ); ?></h6>

	<?php if ( is_single() ) : // navigation links for single posts ?>

		<?php previous_post_link( '<div class="nav-previous"><span class="prev" title="' . __('Previous','generate') . '">%link</span></div>', '%title' ); ?>
		<?php next_post_link( '<div class="nav-next"><span class="next" title="' . __('Next','generate') . '">%link</span></div>', '%title' ); ?>

	<?php elseif ( $wp_query->max_num_pages > 1 && ( is_home() || is_archive() || is_search() ) ) : // navigation links for home, archive, and search pages ?>

		<?php if ( get_next_posts_link() ) : ?>
		<div class="nav-previous"><span class="prev" title="<?php _e('Previous','generate');?>"><?php next_posts_link( __( 'Older posts', 'generate' ) ); ?></span></div>
		<?php endif; ?>

		<?php if ( get_previous_posts_link() ) : ?>
		<div class="nav-next"><span class="next" title="<?php _e('Next','generate');?>"><?php previous_posts_link( __( 'Newer posts', 'generate' ) ); ?></span></div>
		<?php endif; ?>
		
		<?php generate_paging_nav(); ?>
		<?php do_action('generate_paging_navigation'); ?>

	<?php endif; ?>

	</nav><!-- #<?php echo esc_html( $nav_id ); ?> -->
	<?php
}
endif; // generate_content_nav

if ( ! function_exists( 'generate_comment' ) ) :
/**
 * Template for comments and pingbacks.
 *
 * Used as a callback by wp_list_comments() for displaying the comments.
 */
function generate_comment( $comment, $args, $depth ) {
	$GLOBALS['comment'] = $comment;
	$args['avatar_size'] = 50;

	if ( 'pingback' == $comment->comment_type || 'trackback' == $comment->comment_type ) : ?>

	<li id="comment-<?php comment_ID(); ?>" <?php comment_class(); ?>>
		<div class="comment-body">
			<?php _e( 'Pingback:', 'generate' ); ?> <?php comment_author_link(); ?> <?php edit_comment_link( __( 'Edit', 'generate' ), '<span class="edit-link">', '</span>' ); ?>
		</div>

	<?php else : ?>

	<li id="comment-<?php comment_ID(); ?>" <?php comment_class( empty( $args['has_children'] ) ? '' : 'parent' ); ?>>
		<article id="div-comment-<?php comment_ID(); ?>" class="comment-body">
			<footer class="comment-meta">
				<?php if ( 0 != $args['avatar_size'] ) echo get_avatar( $comment, $args['avatar_size'] ); ?>
				<div class="comment-author-info">
					<div class="comment-author vcard">
						<?php printf( __( '%s', 'generate' ), sprintf( '<cite class="fn">%s</cite>', get_comment_author_link() ) ); ?>
					</div><!-- .comment-author -->

					<div class="entry-meta comment-metadata">
						<a href="<?php echo esc_url( get_comment_link( $comment->comment_ID ) ); ?>">
							<time datetime="<?php comment_time( 'c' ); ?>">
								<?php printf( _x( '%1$s at %2$s', '1: date, 2: time', 'generate' ), get_comment_date(), get_comment_time() ); ?>
							</time>
						</a>
						<?php edit_comment_link( __( 'Edit', 'generate' ), '<span class="edit-link">| ', '</span>' ); ?>
						<?php
						comment_reply_link( array_merge( $args, array(
							'add_below' => 'div-comment',
							'depth'     => $depth,
							'max_depth' => $args['max_depth'],
							'before'    => '<span class="reply">| ',
							'after'     => '</span>',
						) ) );
						?>
					</div><!-- .comment-metadata -->
				</div><!-- .comment-author-info -->

				<?php if ( '0' == $comment->comment_approved ) : ?>
				<p class="comment-awaiting-moderation"><?php _e( 'Your comment is awaiting moderation.', 'generate' ); ?></p>
				<?php endif; ?>
			</footer><!-- .comment-meta -->

			<div class="comment-content">
				<?php comment_text(); ?>
			</div><!-- .comment-content -->

			
		</article><!-- .comment-body -->

	<?php
	endif;
}
endif; // ends check for generate_comment()

if ( ! function_exists( 'generate_the_attached_image' ) ) :
/**
 * Prints the attached image with a link to the next attached image.
 */
function generate_the_attached_image() {
	$post                = get_post();
	$attachment_size     = apply_filters( 'generate_attachment_size', array( 1200, 1200 ) );
	$next_attachment_url = wp_get_attachment_url();

	/**
	 * Grab the IDs of all the image attachments in a gallery so we can get the
	 * URL of the next adjacent image in a gallery, or the first image (if
	 * we're looking at the last image in a gallery), or, in a gallery of one,
	 * just the link to that image file.
	 */
	$attachment_ids = get_posts( array(
		'post_parent'    => $post->post_parent,
		'fields'         => 'ids',
		'numberposts'    => -1,
		'post_status'    => 'inherit',
		'post_type'      => 'attachment',
		'post_mime_type' => 'image',
		'order'          => 'ASC',
		'orderby'        => 'menu_order ID'
	) );

	// If there is more than 1 attachment in a gallery...
	if ( count( $attachment_ids ) > 1 ) {
		foreach ( $attachment_ids as $attachment_id ) {
			if ( $attachment_id == $post->ID ) {
				$next_id = current( $attachment_ids );
				break;
			}
		}

		// get the URL of the next image attachment...
		if ( $next_id )
			$next_attachment_url = get_attachment_link( $next_id );

		// or get the URL of the first image attachment.
		else
			$next_attachment_url = get_attachment_link( array_shift( $attachment_ids ) );
	}

	printf( '<a href="%1$s" title="%2$s" rel="attachment">%3$s</a>',
		esc_url( $next_attachment_url ),
		the_title_attribute( array( 'echo' => false ) ),
		wp_get_attachment_image( $post->ID, $attachment_size )
	);
}
endif;

if ( ! function_exists( 'generate_posted_on' ) ) :
/**
 * Prints HTML with meta information for the current post-date/time and author.
 */
function generate_posted_on() {

	if ( 'post' !== get_post_type() ) 
		return;
		
	$time_string = '<time class="entry-date published" datetime="%1$s" itemprop="datePublished">%2$s</time>';
	if ( get_the_time( 'U' ) !== get_the_modified_time( 'U' ) )
		$time_string .= '<time class="updated" datetime="%3$s" itemprop="dateModified">%4$s</time>';

	$time_string = sprintf( $time_string,
		esc_attr( get_the_date( 'c' ) ),
		esc_html( get_the_date() ),
		esc_attr( get_the_modified_date( 'c' ) ),
		esc_html( get_the_modified_date() )
	);

	printf( __( '<span class="posted-on">%1$s</span> <span class="byline">%2$s</span>', 'generate' ),
		sprintf( '<a href="%1$s" title="%2$s" rel="bookmark">%3$s</a>',
			esc_url( get_permalink() ),
			esc_attr( get_the_time() ),
			$time_string
		),
		sprintf( '<span class="author vcard" itemtype="http://schema.org/Person" itemscope="itemscope" itemprop="author">%1$s <a class="url fn n" href="%2$s" title="%3$s" rel="author" itemprop="url"><span class="author-name" itemprop="name">%4$s</span></a></span>',
			__( 'by','generate'),
			esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ),
			esc_attr( sprintf( __( 'View all posts by %s', 'generate' ), get_the_author() ) ),
			esc_html( get_the_author() )
		)
	);
}
endif;

if ( ! function_exists( 'generate_excerpt_more' ) ) :
/**
 * Prints the read more HTML to post excerpts
 */
	add_filter( 'excerpt_more', 'generate_excerpt_more' );
	add_filter( 'the_content_more_link', 'generate_excerpt_more' );
	function generate_excerpt_more( $more ) {
		return ' ... <a class="read-more" href="'. get_permalink( get_the_ID() ) . '">' . __('Read more', 'generate') . '</a>';
	}
endif;

if ( ! function_exists( 'generate_post_image' ) ) :
/**
 * Prints the Post Image to post excerpts
 */
add_action( 'generate_after_entry_header', 'generate_post_image' );
function generate_post_image()
{
		
	// If there's no featured image, return
	if ( ! has_post_thumbnail() )
		return;
		
	// If the post type is anything other than a page, and we're not on a single template
	if ( 'page' !== get_post_type() && !is_single() ) {
	?>
		<div class="post-image">
			<a href="<?php the_permalink();?>" title="<?php the_title(); ?>"><?php the_post_thumbnail(); ?></a>
		</div>
	<?php
	}
}
endif;

if ( ! function_exists( 'generate_navigation_search' ) ) :
/**
 * Add the search bar to the navigation
 * @since 1.1.4
 */
add_action( 'generate_inside_navigation','generate_navigation_search');
function generate_navigation_search()
{
	$generate_settings = wp_parse_args( 
		get_option( 'generate_settings', array() ), 
		generate_get_defaults() 
	);
		
	if ( 'enable' !== $generate_settings['nav_search'] )
		return;
			
	?>
	<form role="search" method="get" class="search-form navigation-search" action="<?php echo esc_url( home_url( '/' ) ); ?>">
		<input type="search" class="search-field" value="<?php echo esc_attr( get_search_query() ); ?>" name="s" title="<?php _ex( 'Search', 'label', 'generate' ); ?>">
	</form>
	
	<?php
}
endif;

if ( ! function_exists( 'generate_entry_meta' ) ) :
/**
 * Prints HTML with meta information for the categories, tags.
 *
 * @since 1.2.5
 */
function generate_entry_meta() {

	// Commented out for now - will be added later
	// if ( in_array( get_post_type(), array( 'post', 'attachment' ) ) ) {
		// $time_string = '<time class="entry-date published" datetime="%1$s" itemprop="datePublished">%2$s</time>';

		// if ( get_the_time( 'U' ) !== get_the_modified_time( 'U' ) ) {
			// $time_string = '<time class="entry-date published" datetime="%1$s" itemprop="datePublished">%2$s</time><time class="updated" datetime="%3$s" itemprop="dateModified">%4$s</time>';
		// }

		// $time_string = sprintf( $time_string,
			// esc_attr( get_the_date( 'c' ) ),
			// get_the_date(),
			// esc_attr( get_the_modified_date( 'c' ) ),
			// get_the_modified_date()
		// );

		// printf( '<span class="posted-on"><span class="screen-reader-text">%1$s </span><a href="%2$s" rel="bookmark">%3$s</a></span>',
			// _x( 'Posted on', 'Used before publish date.', 'generate' ),
			// esc_url( get_permalink() ),
			// $time_string
		// );
	// }

	if ( 'post' == get_post_type() ) {
		// if ( is_singular() || is_multi_author() ) {
			// printf( '<span class="byline"><span class="author vcard" itemtype="http://schema.org/Person" itemscope="itemscope" itemprop="author"><span class="screen-reader-text">%1$s </span><a class="url fn n" href="%2$s">%3$s</a></span></span>',
				// _x( 'Author', 'Used before post author name.', 'generate' ),
				// esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ),
				// get_the_author()
			// );
		// }

		$categories_list = get_the_category_list( _x( ', ', 'Used between list items, there is a space after the comma.', 'generate' ) );
		if ( $categories_list ) {
			printf( '<span class="cat-links"><span class="screen-reader-text">%1$s </span>%2$s</span>',
				_x( 'Categories', 'Used before category names.', 'generate' ),
				$categories_list
			);
		}

		$tags_list = get_the_tag_list( '', _x( ', ', 'Used between list items, there is a space after the comma.', 'generate' ) );
		if ( $tags_list ) {
			printf( '<span class="tags-links"><span class="screen-reader-text">%1$s </span>%2$s</span>',
				_x( 'Tags', 'Used before tag names.', 'generate' ),
				$tags_list
			);
		}
	}

	if ( is_attachment() && wp_attachment_is_image() ) {
		// Retrieve attachment metadata.
		$metadata = wp_get_attachment_metadata();

		printf( '<span class="full-size-link"><span class="screen-reader-text">%1$s </span><a href="%2$s">%3$s &times; %4$s</a></span>',
			_x( 'Full size', 'Used before full size attachment link.', 'generate' ),
			esc_url( wp_get_attachment_url() ),
			$metadata['width'],
			$metadata['height']
		);
	}

	if ( ! is_single() && ! post_password_required() && ( comments_open() || get_comments_number() ) ) {
		echo '<span class="comments-link">';
		comments_popup_link( __( 'Leave a comment', 'generate' ), __( '1 Comment', 'generate' ), __( '% Comments', 'generate' ) );
		echo '</span>';
	}
}
endif;

if ( ! function_exists( 'generate_categorized_blog' ) ) :
/**
 * Determine whether blog/site has more than one category.
 *
 * @since 1.2.5
 *
 * @return bool True of there is more than one category, false otherwise.
 */
function generate_categorized_blog() {
	if ( false === ( $all_the_cool_cats = get_transient( 'generate_categories' ) ) ) {
		// Create an array of all the categories that are attached to posts.
		$all_the_cool_cats = get_categories( array(
			'fields'     => 'ids',
			'hide_empty' => 1,

			// We only need to know if there is more than one category.
			'number'     => 2,
		) );

		// Count the number of categories that are attached to the posts.
		$all_the_cool_cats = count( $all_the_cool_cats );

		set_transient( 'generate_categories', $all_the_cool_cats );
	}

	if ( $all_the_cool_cats > 1 ) {
		// This blog has more than 1 category so twentyfifteen_categorized_blog should return true.
		return true;
	} else {
		// This blog has only 1 category so twentyfifteen_categorized_blog should return false.
		return false;
	}
}
endif;

if ( ! function_exists( 'generate_category_transient_flusher' ) ) :
/**
 * Flush out the transients used in {@see generate_categorized_blog()}.
 *
 * @since 1.2.5
 */
add_action( 'edit_category', 'generate_category_transient_flusher' );
add_action( 'save_post',     'generate_category_transient_flusher' );
function generate_category_transient_flusher() {
	// Like, beat it. Dig?
	delete_transient( 'generate_categories' );
}
endif;

if ( ! function_exists( 'generate_get_link_url' ) ) :
/**
 * Return the post URL.
 *
 * Falls back to the post permalink if no URL is found in the post.
 *
 * @since 1.2.5
 *
 * @see get_url_in_content()
 *
 * @return string The Link format URL.
 */
function generate_get_link_url() {
	$has_url = get_url_in_content( get_the_content() );

	return $has_url ? $has_url : apply_filters( 'the_permalink', get_permalink() );
}
endif;