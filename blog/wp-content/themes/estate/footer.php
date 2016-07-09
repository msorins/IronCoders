<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the id=main div and all content after
 *
 * @package estate
 * @since estate 1.0
 * @license GPL 2.0
 */
?>

	</div><!-- #main .site-main -->

	<footer id="colophon" class="site-footer" role="contentinfo">
		<div class="container">
			<img id="footer-shadow" src="<?php echo get_template_directory_uri() ?>/images/decoration/footer-shadow.png" width="820" height="19" />

			<div id="footer-widgets">
				<?php dynamic_sidebar( 'sidebar-footer' ) ?>
			</div>
		</div>
	</footer><!-- #colophon .site-footer -->

	<div id="site-info">
		<div class="container">
			<?php do_action( 'estate_credits' ); ?>
			<?php echo apply_filters( 'siteorigin_attribution_footer', (siteorigin_setting('text_footer_text') != '' ? ' - ' : '') . sprintf( __( 'Designed by %1$s', 'estate' ), '<a href="http://siteorigin.com/" rel="designer">SiteOrigin</a>' ) ); ?>
		</div>
	</div><!-- .site-info -->
</div><!-- #page .hfeed .site -->

<?php wp_footer(); ?>
<script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-46577566-2', 'auto');
  ga('send', 'pageview');

</script>
</body>
</html>