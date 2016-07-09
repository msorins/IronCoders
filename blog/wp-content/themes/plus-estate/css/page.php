<div class="wrap">
	<h2><?php _e( 'Custom CSS', 'siteorigin' ) ?></h2>

	<?php if(isset($_POST['siteorigin_custom_css_save'])) : ?>
		<div class="updated settings-error">
			<p><?php _e('Custom CSS Updated', 'siteorigin') ?></p>
		</div>
	<?php endif; ?>

	<?php if(!empty($revision)) : ?>
		<div class="updated settings-error">
			<p><?php _e('Viewing a revision. Save CSS to use this revision.', 'siteorigin') ?></p>
		</div>
	<?php endif; ?>


	<div id="poststuff">
		<div id="so-custom-css-info">

			<div class="postbox" id="so-custom-css-revisions">
				<h3 class="hndle"><span><?php _e('CSS Revisions', 'siteorigin') ?></span></h3>
				<div class="inside">
					<ol data-confirm="<?php esc_attr_e('Are you sure you want to load this revision?', 'siteorigin') ?>">
						<?php
						if( is_array($custom_css_revisions) ) {
							foreach($custom_css_revisions as $time => $css) {
								?>
								<li>
									<a href="<?php echo add_query_arg(array('theme' => $theme, 'time' => $time)) ?>" class="load-css-revision"><?php echo date('j F Y @ H:i:s', $time) ?></a>
									(<?php printf(__('%d chars', 'siteorigin'), strlen($css)) ?>)
								</li>
								<?php
							}
						}
						?>
					</ol>
				</div>
			</div>

		</div>

		<form action="<?php echo esc_url( add_query_arg( array( 'theme' => false, 'time' => false ) ) ) ?>" method="POST" id="so-custom-css-form">

			<div id="custom-css-container" style="border:1px solid #D0D0D0; padding: 8px; background: #FCFCFC; cursor: text">
				<textarea name="custom_css" id="custom-css-textarea"><?php echo esc_textarea( $custom_css ) ?></textarea>
				<?php wp_nonce_field( 'custom_css', '_sononce' ) ?>
			</div>
			<p class="description">
				<?php
				$theme = basename( get_template_directory() );
				printf( __( 'Changes apply to %s and its child themes', 'siteorigin' ), ucfirst( $theme ) );
				?>
			</p>

			<p class="submit">
				<input type="submit" name="siteorigin_custom_css_save" class="button-primary" value="<?php esc_attr_e( 'Save CSS', 'siteorigin' ); ?>" />
			</p>

		</form>
	</div>

	<div class="clear"></div>

</div>