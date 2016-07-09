<?php
/**
 * Displays a single post
 * 
 * @package estate
 * @since estate 1.0
 * @license GPL 2.0
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header class="entry-header">
		<?php if(has_post_thumbnail()) : ?>
			<div class="entry-thumbnail"><?php the_post_thumbnail(); ?></div>
		<?php endif; ?>

		<h1 class="entry-title"><?php the_title(); ?></h1>

		<div class="entry-meta">
			<?php estate_posted_on(); ?>
		</div><!-- .entry-meta -->
	</header><!-- .entry-header -->

	<div class="entry-content">
		<?php the_content(); ?>
		<?php wp_link_pages( array( 'before' => '<div class="page-links">' . __( 'Pages:', 'estate' ), 'after' => '</div>' ) ); ?>
	</div><!-- .entry-content -->

	<footer class="entry-meta">
		<?php echo estate_get_post_meta() ?>
		<?php edit_post_link( __( 'Edit', 'estate' ), '<span class="edit-link">', '</span>' ); ?>
	</footer><!-- .entry-meta -->
</article><!-- #post-<?php the_ID(); ?> -->
