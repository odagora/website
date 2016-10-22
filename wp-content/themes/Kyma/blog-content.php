<div <?php post_class('blog_grid_block clearfix'); ?>>
    <div class="feature_inner">
        <!-- <a href="#" class="blog_list_format">
            <i class="ico-image4"></i>
        </a> -->
        <div class="feature_inner_corners">
            <?php $icon = "";
            global $imageSize;
            $img_class = array('class' => 'img-responsive');
            if (metadata_exists('post', get_the_ID(), '_kyma_post_gallery')) {
                $icon = "ico-gallery";
                $gallery = get_post_gallery(get_the_ID(), false);
                $product_image_gallery = get_post_meta(get_the_ID(), '_kyma_post_gallery', true);
            } else {
                // Backwards compat
                $attachment_ids = get_posts('post_parent=' . get_the_ID() . '&numberposts=-1&post_type=attachment&orderby=menu_order&order=ASC&post_mime_type=image&fields=ids');
                $attachment_ids = array_diff($attachment_ids, array(get_post_thumbnail_id()));
                $product_image_gallery = implode(',', $attachment_ids);
            }
            $attachments = array_filter(explode(',', $product_image_gallery)); ?>
            <div class="feature_inner_btns">
                <a href="#" class="expand_image"><i class="ico-maximize"></i></a>
                <a href="<?php echo esc_url(get_the_permalink()); ?>" class="icon_link"><i class="fa fa-link"></i></a>
            </div>
            <?php if ($attachments) { ?>
                <div class="porto_galla">
                <?php if (has_post_thumbnail()) {
                    $url = wp_get_attachment_url(get_post_thumbnail_id(get_the_ID())); ?>
                <a href="<?php echo esc_url($url); ?>" title="<?php the_title_attribute(); ?>"
                   class="feature_inner_ling">
                    <?php the_post_thumbnail($imageSize, $img_class); ?>
                    </a><?php
                }
                foreach ($attachments as $attachment_id) {
                    $large_image_url = wp_get_attachment_image_src($attachment_id, 'large');
                    $blog_img_src = wp_get_attachment_image_src($attachment_id, $imageSize);
                    echo '<a class="feature_inner_ling" href="' . esc_url($large_image_url[0]) . '"><img class="img-responsive" src="' . $blog_img_src[0] . '"/></a>';
                }
                if (get_post_meta(get_the_ID(), 'video_post_url', true) != "") {
                    ?>
                    <div class="feature_inner">
                        <div class="feature_inner_corners">
                            <div class="embed-container">
                                <a href="<?php echo esc_url(get_post_meta(get_the_ID(), 'video_post_url', true)); ?>"
                                   data-rel="magnific-popup"></a>
                                <?php echo apply_filters('the_content', get_post_meta(get_the_ID(), 'video_post_url', true)); ?>
                            </div>
                        </div>
                    </div>
                <?php } ?>
                </div><?php
            } elseif (has_post_thumbnail()) {
                ?>
                <div class="porto_galla">
                    <?php $icon = "ico-image";
                    $url = wp_get_attachment_url(get_post_thumbnail_id(get_the_ID())); ?>
                    <a href="<?php echo esc_url($url); ?>" title="<?php the_title_attribute(); ?>"
                       class="feature_inner_ling" data-rel="magnific-popup">
                        <?php the_post_thumbnail($imageSize, $img_class); ?>
                    </a><?php
                    if (get_post_meta(get_the_ID(), 'video_post_url', true) != "") {
                        ?>
                        <div class="feature_inner">
                            <div class="feature_inner_corners">
                                <div class="embed-container">
                                    <a href="<?php echo esc_url(get_post_meta(get_the_ID(), 'video_post_url', true)); ?>"
                                       data-rel="magnific-popup"></a>
                                    <?php echo apply_filters('the_content', get_post_meta(get_the_ID(), 'video_post_url', true)); ?>
                                </div>
                            </div>
                        </div>
                    <?php } ?>
                </div>
            <?php
            } elseif (get_post_meta(get_the_ID(), 'video_post_url', true) != "") {
                $icon = "ico-video-camera"; ?>
                <div class="feature_inner">
                    <div class="feature_inner_corners">
                        <div class="embed-container">
                            <a href="<?php echo esc_url(get_post_meta(get_the_ID(), 'video_post_url', true)); ?>"
                               data-rel="magnific-popup"></a>
                            <?php echo apply_filters('the_content', get_post_meta(get_the_ID(), 'video_post_url', true)); ?>
                        </div>
                    </div>
                </div>
            <?php } ?>
        </div>
    </div>
    <div class="blog_grid_con">
        <h6 class="title"><a href="<?php the_permalink(); ?>"
                             title="<?php esc_attr(the_title_attribute()); ?>"><?php the_title(); ?></a></h6>
		<span class="meta"><?php
            if (isset($icon) && $icon == 'ico-image' || $icon == 'ico-gallery') {
                ?>
                <span class="meta_part">
                <a href="#">
                    <i class="<?php echo esc_attr($icon); ?>"></i>
                    <span><?php $ico = explode('-', $icon);
                        echo esc_attr(ucfirst($ico[1])); ?></span>
                </a>
                </span><?php
            } ?>
            <span class="meta_part">
				<a href="#">
                    <i class="fa fa-clock-o"></i>
                    <span><?php echo get_the_date(get_option('date_format'), get_the_ID()); ?></span>
                </a>
			</span><?php
            if (get_the_category_list() != '') {
                ?>
                <span class="meta_part">
                <i class="fa fa-folder-open-o"></i>
					<span><?php echo get_the_category_list(','); ?></span>
                </span><?php
            } ?>
            <span class="meta_part">
					<a href="<?php echo esc_url(get_author_posts_url(get_the_author_meta('ID'))); ?>">
                        <i class="fa fa-user"></i>
                        <span><?php esc_attr(the_author()); ?></span>
                    </a>
			</span>
		</span>
        <?php the_excerpt(); ?>
    </div>
</div>