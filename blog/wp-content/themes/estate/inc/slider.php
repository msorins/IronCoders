<?php

function estate_display_top_slider(){
	if( is_front_page() && $GLOBALS['wp_query']->get('paged') == 0 ) {


		if(substr(siteorigin_setting('banner_type'), 0, 5) == 'meta:' && class_exists('MetaSliderPlugin')){
			$slider_id = intval(substr(siteorigin_setting('banner_type'), 5));
			?>
			<div id="top-slider">
				<?php echo do_shortcode("[metaslider id='".$slider_id."']"); ?>
			</div>
			<?php
		}
		elseif(siteorigin_setting('banner_type') == 'title_banner' ){
			$image = siteorigin_setting('banner_image');
			if(empty($image)){
				$image = get_template_directory_uri().'/images/home.jpg';
			}
			else {
				$image = wp_get_attachment_image_src(siteorigin_setting('banner_image'), 'original');
				$image = $image[0];
			}

			?>
			<div id="top-slider">
				<div class="decoration"></div>
				<ul class="slides">
					<li class="slide" style="background-image: url(<?php echo esc_url($image) ?>); background-color: <?php echo esc_attr( siteorigin_setting('banner_color') ) ?>">
						<div class="slide-contents home-title">
							<?php if(siteorigin_setting('banner_title', '') != '') : ?><h2><?php echo esc_html(siteorigin_setting('banner_title', '')) ?></h2><?php endif; ?>
							<?php if(siteorigin_setting('banner_subtitle', '') != '') : ?><h4><?php echo esc_html(siteorigin_setting('banner_subtitle', '')) ?></h4><?php endif; ?>

							<?php if(siteorigin_setting('banner_button', '') != '') : ?>
								<div class="slide-button">
									<a href="<?php echo esc_url(siteorigin_setting('banner_button_url')) ?>" class="action-button"><?php echo esc_html(siteorigin_setting('banner_button', '')) ?></a>
								</div>
							<?php endif; ?>
						</div>
					</li>
				</ul>
			</div>
			<?php
		}
		elseif(siteorigin_setting('banner_type') == 'title_banner_noimage') {
			?>
			<div id="top-slider">
				<div class="decoration"></div>
				<ul class="slides">
					<li class="slide" style="background-color: <?php echo esc_attr( siteorigin_setting('banner_color') ) ?>">
						<div class="slide-contents home-title">
							<?php if(siteorigin_setting('banner_title', '') != '') : ?><h2><?php echo esc_html(siteorigin_setting('banner_title', '')) ?></h2><?php endif; ?>
							<?php if(siteorigin_setting('banner_subtitle', '') != '') : ?><h4><?php echo esc_html(siteorigin_setting('banner_subtitle', '')) ?></h4><?php endif; ?>

							<?php if(siteorigin_setting('banner_button', '') != '') : ?>
								<div class="slide-button">
									<a href="<?php echo esc_url(siteorigin_setting('banner_button_url')) ?>" class="action-button"><?php echo esc_html( siteorigin_setting('banner_button', '') ) ?></a>
								</div>
							<?php endif; ?>
						</div>
					</li>
				</ul>
			</div>
			<?php
		}
	}
}