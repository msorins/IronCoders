<?php
/**
 * Displays 
 * 
 * @package estate
 * @since estate 1.0
 * @license GPL 2.0
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header class="entry-header">
		<?php if(has_post_thumbnail()) : ?>
			<div class="entry-thumbnail">
				<a href="<?php the_permalink(); ?>" title="<?php echo esc_attr( sprintf( __( 'Permalink to %s', 'estate' ), the_title_attribute( 'echo=0' ) ) ); ?>" rel="bookmark">
					<?php the_post_thumbnail(); ?>
				</a>
			</div>
		<?php endif; ?>

		<h1 class="entry-title"><a href="<?php the_permalink(); ?>" title="<?php echo esc_attr( sprintf( __( 'Permalink to %s', 'estate' ), the_title_attribute( 'echo=0' ) ) ); ?>" rel="bookmark"><?php the_title(); ?></a></h1>

		<?php if ( 'post' == get_post_type() ) : ?>
			<div class="entry-meta">
				<?php estate_posted_on(); ?>
			</div><!-- .entry-meta -->
		<?php endif; ?>

	</header><!-- .entry-header -->

	<?php if ( is_search() ) : // Only display Excerpts for Search ?>
		<div class="entry-summary">
			<?php the_excerpt(); ?>
		</div><!-- .entry-summary -->
	<?php else : ?>
		<div class="entry-content">
			<?php the_content( __( 'Continue reading <span class="meta-nav">&rarr;</span>', 'estate' ) ); ?>
			<?php wp_link_pages( array( 'before' => '<div class="page-links">' . __( 'Pages:', 'estate' ), 'after' => '</div>' ) ); ?>
		</div><!-- .entry-content -->
	<?php endif; ?>

	<?php if( is_single() ) : ?>
		<footer class="entry-meta">
			<?php echo estate_get_post_meta() ?>
			<?php edit_post_link( __( 'Edit', 'estate' ), '<span class="edit-link">', '</span>' ); ?>
		</footer><!-- .entry-meta -->
	<?php endif; ?>
</article><!-- #post-<?php the_ID(); ?> -->
