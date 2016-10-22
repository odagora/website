<?php global $kyma_theme_options;
if($kyma_theme_options['twitter_consumer_key']=='') return; ?>
<!-- Tweets -->
<section class="content_section white_section bg_color4 bg12 bg_fixed">
	<span class="section_icon"><i class="ico-twitter4"></i></span>
		<div class="bg_overlay">
			<div class="content row_spacer"><?php
				if ($kyma_theme_options['twitter_feed_title'] != "") { ?>
					<div class="main_title centered upper">
						<h2><span class="line"></span><?php echo esc_attr($kyma_theme_options['twitter_feed_title']); ?></h2>
					</div><?php
				}
			$tweets = json_decode(getTwitterFeed()); ?>
			<div class="normal_text_slider centered">
			<?php foreach($tweets as $tweet){?>
				<div class="text_slide">
					<span class="desc">
						<?php echo esc_attr($tweet->text); ?>
					</span>
					<a class="btn_a" target="_self" href="https://twitter.com/intent/user?screen_name=<?php echo esc_attr($kyma_theme_options['twitter_username']);?>">
						<span>
							<i class="in_left ico-arrow-right4"></i>
							<span><?php _e('Follow Us','kyma'); ?></span>
							<i class="in_right ico-arrow-right4"></i>
						</span>
					</a>
				</div><?php
				} ?>
			</div>
		
		</div>
	</div>
</section>
<!-- End Tweets -->