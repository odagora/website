<?php global $kyma_theme_options; ?>
<section class="content_section bg_gray">
    <div class="content row_spacer no_padding">
        <div class="main_title centered upper"><?php if ($kyma_theme_options['home_map_title'] != "") { ?>
                <h2 id='blog-heading'><span class="line"><i class="fa fa-map-marker"></i></span><?php echo esc_attr($kyma_theme_options['home_map_title']); ?>
                </h2>
            <?php } ?>
        </div>
        <div class="rows_container clearfix">
            <div class="hm_blog_grid">
                <div class="overlay" onClick="style.pointerEvents='none'"></div>
				<?php echo do_shortcode($kyma_theme_options['home-map']); ?>
			</div>
		</div>
	</div>
</section>