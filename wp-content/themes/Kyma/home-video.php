<!-- Video Background-->
<?php $kyma_theme_options = kyma_theme_options();
$video_url = $kyma_theme_options['background_video_url'];
$video_sound = $kyma_theme_options['video_sound'];
$video_autoplay = $kyma_theme_options['video_auto_play'];?>
<section class="content_section bg_fixed white_section bg2">
	<div class="bg_overlay">
		<!-- Video -->
		<div class="youtube_bg_video has_overlay now_pausing" data-property="{videoURL:'<?php echo $video_url; ?>',containment:'self',startAt:0,mute:<?php echo $video_sound; ?>,autoPlay:<?php echo $video_autoplay; ?>,loop:false,opacity:1,showYTLogo:false, realfullscreen:false, quality:'small'}"></div>
		<!-- End Video -->
	
		<div class="content row_spacer clearfix">								
			<!-- Video Frame-->
			<div class="video_frame centered">
				<div class="video_frame_tl">
					<div class="video_frame_br">
						<div class="video_frame_bl row_spacer2"><?php
						if($kyma_theme_options['background_video_title']!=""){?>
							<div class="main_title upper">
								<h2><span class="line"></span><?php echo esc_attr($kyma_theme_options['background_video_title']); ?></h2>
							</div><?php 
							} ?>
							<a href="#" class="play_video_btn pause_video">
								<span><i class="ico-pause2"></i></span>
							</a>
						</div>
					</div>
				</div>
			</div>
			<!-- End Video Frame-->
		</div>
	</div>
</section>
<!-- End Video Background -->