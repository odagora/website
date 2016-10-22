<?php $kyma_theme_options = kyma_theme_options();
if (!$kyma_theme_options['home_blog']) return; ?>
<section class="content_section bg_gray">
    <div class="content row_spacer no_padding">
        <div class="main_title centered upper"><?php if ($kyma_theme_options['home_blog_title'] != "") { ?>
                <h2 id='blog-heading'><span class="line"><i
                            class="fa fa-edit"></i></span><?php echo esc_attr($kyma_theme_options['home_blog_title']); ?>
                </h2>
            <?php } ?>
        </div>
        <div class="rows_container clearfix">
            <div class="hm_blog_grid">
                <!-- Filter Content -->
                <div class="hm_filter_wrapper masonry_grid_posts three_blocks">
                    <ul class="hm_filter_wrapper_con masonry1"><?php
						$count_posts = wp_count_posts();
                        $published_posts = $count_posts->publish;
                        if(isset($kyma_theme_options['home_post_cat'])) $cat=$kyma_theme_options['home_post_cat'];
                        $args = array('post_type' => 'post', 'posts_per_page' => -1, 'category__in'=>$cat);
                        query_posts($args);
                        $icon = '';
                        if (query_posts($args)) {
                            $i = 1;
                            $j = 1;
                            while (have_posts()):the_post();
                                global $more;
                                $more = 0;
                                if (get_post_meta(get_the_ID(), '_kyma_post_gallery', true)) {
                                    $icon = "ico-gallery";
                                } elseif (has_post_thumbnail()) {
                                    $icon = "ico-image";
                                } elseif (get_post_meta(get_the_ID(), 'video_post_url', true)) {
                                    $icon = "ico-video-camera";
                                } ?>
                            <li class="filter_item_block animated" data-animation-delay="<?php echo 300 * $i; ?>"
                                data-animation="rotateInUpLeft" id="row-<?php echo $j; ?>">
                                <div class="blog_grid_block">
                                    <div class="feature_inner">
                                        <div class="feature_inner_corners">
                                            <?php
                                            if (metadata_exists('post', get_the_ID(), '_kyma_post_gallery')) {
                                                $product_image_gallery = get_post_meta(get_the_ID(), '_kyma_post_gallery', true);
                                            } else {
                                                // Backwards compat
                                                $attachment_ids = get_posts('post_parent=' . get_the_ID() . '&numberposts=-1&post_type=attachment&orderby=menu_order&order=ASC&post_mime_type=image&fields=ids');
                                                $attachment_ids = array_diff($attachment_ids, array(get_post_thumbnail_id()));
                                                $product_image_gallery = implode(',', $attachment_ids);
                                            }
                                            $attachments = array_filter(explode(',', $product_image_gallery)); ?>
                                            <?php if ($attachments) { ?>
                                                <div class="feature_inner_btns">
                                                    <a href="#" class="expand_image"><i class="fa fa-eye"></i></a>
                                                    <a href="<?php echo esc_url(get_the_permalink()); ?>" class="icon_link"><i class="fa fa-link"></i></a>
                                                </div>
                                                <div class="porto_galla">
                                                    <?php foreach ($attachments as $attachment_id) {
                                                        $large_image_url = wp_get_attachment_image_src($attachment_id, 'large');
                                                        $home_blog_src = wp_get_attachment_image_src($attachment_id, 'kyma_home_post_image');
                                                        echo '<a class="feature_inner_ling" href="' . esc_url($large_image_url[0]) . '"><img class="img-responsive" src="' . $home_blog_src[0] . '"/></a>';
                                                    }
                                                    if (has_post_thumbnail()) {
                                                        $img_class = array('class' => 'img-responsive');
                                                        $url = wp_get_attachment_url(get_post_thumbnail_id($post->ID)) ?>
                                                        <a href="<?php echo esc_url($url); ?>"
                                                           class="feature_inner_ling" data-rel="magnific-popup">
                                                            <?php the_post_thumbnail('kyma_home_post_image', $img_class); ?>
                                                        </a>
                                                    <?php }
                                                    if (get_post_meta(get_the_ID(), 'video_post_url', true) != "") { ?>
                                                        <div class="embed-container">
                                                            <?php echo apply_filters('the_content', get_post_meta(get_the_ID(), 'video_post_url', true)); ?>
                                                        </div>
                                                    <?php } ?>
                                                </div>
                                            <?php } elseif (has_post_thumbnail()) { ?>
                                                <div class="feature_inner_btns">
                                                    <a href="#" class="expand_image"><i class="fa fa-eye"></i></a>
                                                    <a href="<?php echo esc_url(get_the_permalink()); ?>" class="icon_link"><i class="fa fa-link"></i></a>
                                                </div>
                                                <div class="porto_galla">
                                                    <?php $img_class = array('class' => 'img-responsive');
                                                    $url = wp_get_attachment_url(get_post_thumbnail_id($post->ID)); ?>
                                                    <a href="<?php echo esc_url($url); ?>" class="feature_inner_ling"
                                                       data-rel="magnific-popup">
                                                        <?php the_post_thumbnail('kyma_home_post_image', $img_class); ?>
                                                    </a>
                                                    <?php if (get_post_meta(get_the_ID(), 'video_post_url', true) != "") { ?>
                                                        <div class="embed-container">
                                                            <?php echo apply_filters('the_content', get_post_meta(get_the_ID(), 'video_post_url', true)); ?>
                                                        </div>
                                                    <?php } ?>
                                                </div>
                                            <?php } elseif (get_post_meta(get_the_ID(), 'video_post_url', true) != "") { ?>
                                                <div class="embed-container">
                                                    <?php echo apply_filters('the_content', get_post_meta(get_the_ID(), 'video_post_url', true)); ?>
                                                </div>
                                            <?php } ?>
                                        </div>
                                    </div>
                                    <div class="blog_grid_con">
                                        <?php if ($icon != "") { ?>
                                            <a href="<?php the_permalink(); ?>" class="blog_grid_format"><i
                                                    class="<?php echo esc_attr($icon); ?>"></i></a>
                                        <?php } ?>
                                        <h6 class="title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                                        </h6>
								<span class="meta">
									<span
                                        class="meta_part"><?php echo get_post_time(get_option('date_format'), true); ?></span>
									<span class="meta_slash">/</span>
									<span
                                        class="meta_part"><?php esc_url(comments_popup_link('No Comments &#187;', '1 Comment', '% Comments')); ?> <?php esc_url(edit_post_link('Edit', ' &#124; ', '')); ?></span>
									<span class="meta_slash">/</span>
									<span class="meta_part"><?php echo get_the_category_list(','); ?></span>
								</span>
                                        <?php the_excerpt(); ?>
                                    </div>
                                </div>
                                </li><?php $i != 3 ? $i++ : $i = 1;
                                if ($j % 3 == 0) {
                                    echo "<div class='clearfix'></div>";
                                }
                                $j++; endwhile;
                        } ?>
                    </ul>
                </div>
                <!-- End Filter Content -->
            </div>
            <!-- End blog grid -->
        </div>
		<div class="centered post-btn1">
			<a class="btn_c append-button">
				<span class="btn_c_ic_a"><i class="fa fa-repeat"></i></span>
				<span class="btn_c_t"><?php _e('See More Posts', 'kyma'); ?></span>
				<span class="btn_c_ic_b"><i class="fa fa-repeat"></i></span>
			</a>
		</div>
    </div>
</section>