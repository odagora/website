<?php
/* Template Name: Blog Timeline */
get_header();
get_template_part('breadcrumbs');
get_template_part('news', 'bar');
the_post(); ?>
    <!-- Our Blog Grids -->
<?php $kyma_theme_options = kyma_theme_options(); ?>
    <section class="content_section bg_color6">
        <div class="content row_spacer no_padding">
            <?php if ($kyma_theme_options['home_blog_title']) { ?>
                <div class="main_title centered upper">
                    <h2><span class="line"><i
                                class="ico-pencil2"></i></span><?php echo esc_attr($kyma_theme_options['home_blog_title']); ?>
                    </h2>
                </div>
            <?php }
            $imageSize = "kyma_blog_timeline_thumb"; ?>
            <!-- Filter Content -->
            <div class="hm_filter_wrapper timeline">
                <ul class="hm_filter_wrapper_con timeline">
                    <?php $count_posts = wp_count_posts();
                    $published_posts = $count_posts->publish;
                    $args = array('post_type' => 'post', 'posts_per_page' => -1);
                    query_posts($args);
                    if (query_posts($args)) {
                        $i = 1;
                        while (have_posts()):the_post();
                            global $more;
                            $more = 0;
                            if ($i % 2 == 0) {
                                $i = 2;
                            } else {
                                $i = 1;
                            }
                            ?>
                            <!-- Item -->
                            <li <?php post_class('filter_item_block animated'); ?>
                                data-animation-delay="<?php echo $i * 300; ?>" data-animation="bounceInUp">
                                <div class="timeline_block clearfix">
                                    <?php
                                    $icon = "";
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
                                    $attachments = array_filter(explode(',', $product_image_gallery));
                                    if ($attachments) {
                                        ?>
                                        <a href="<?php echo esc_url(get_the_permalink()); ?>"
                                           class="timeline_post_format image gallery">
                                            <?php if (isset($icon) && $icon == 'ico-image' || $icon == 'ico-gallery') { ?>
                                                <i class="<?php echo esc_attr($icon); ?>"></i>
                                            <?php } ?>
                                        </a>
                                        <div class="timeline_feature timeline_gallery porto_galla">
                                            <?php if (has_post_thumbnail()) {
                                                $url = wp_get_attachment_url(get_post_thumbnail_id(get_the_ID())); ?>
                                                <a data-rel="magnific-popup" href="<?php echo esc_url($url); ?>">
                                                    <span class="image-zoom"><i class="ico-plus3"></i></span>
                                                    <?php the_post_thumbnail($imageSize, $img_class); ?>
                                                </a>
                                            <?php
                                            }
                                            foreach ($attachments as $attachment_id) {
                                                $large_image_url = wp_get_attachment_image_src($attachment_id, 'large');
                                                $blog_img_src = wp_get_attachment_image_src($attachment_id, $imageSize);
                                                echo '<a href="' . esc_url($large_image_url[0]) . '">
								<span class="image-zoom"><i class="ico-plus3"></i></span> 
								<img class="img-responsive" src="' . $blog_img_src[0] . '"> 
							</a>';
                                            }
                                            if (get_post_meta(get_the_ID(), 'video_post_url', true) != "") {
                                                ?>
                                                <div class="timeline_feature">
                                                    <div class="embed-container">
                                                        <?php echo apply_filters('the_content', get_post_meta(get_the_ID(), 'video_post_url', true)); ?>
                                                    </div>
                                                </div>
                                            <?php } ?>
                                        </div>
                                    <?php } elseif (has_post_thumbnail()) { ?>
                                        <div class="timeline_feature timeline_gallery porto_galla"><?php
                                            $icon = "ico-image";
                                            $url = wp_get_attachment_url(get_post_thumbnail_id(get_the_ID())); ?>
                                            <div class="timeline_feature">
                                                <a data-rel="magnific-popup" href="<?php echo esc_url($url); ?>">
                                                    <span class="image-zoom"><i class="ico-plus3"></i></span>
                                                    <?php the_post_thumbnail($imageSize, $img_class); ?>
                                                </a>
                                            </div>
                                            <?php if (get_post_meta(get_the_ID(), 'video_post_url', true) != "") { ?>
                                                <div class="timeline_feature">
                                                    <div class="embed-container">
                                                        <?php echo apply_filters('the_content', get_post_meta(get_the_ID(), 'video_post_url', true)); ?>
                                                    </div>
                                                </div>
                                            <?php } ?>
                                        </div>
                                    <?php
                                    } elseif (get_post_meta(get_the_ID(), 'video_post_url', true) != "") {
                                        $icon = "ico-video-camera"; ?>
                                        <a href="<?php echo esc_url(get_the_permalink()); ?>"
                                           class="timeline_post_format gallery">
                                            <?php if (isset($icon) && $icon == 'ico-video-camera') { ?>
                                                <i class="<?php echo esc_attr($icon); ?>"></i>
                                            <?php } ?>
                                        </a>
                                        <div class="timeline_feature">
                                            <div class="embed-container">
                                                <?php echo apply_filters('the_content', get_post_meta(get_the_ID(), 'video_post_url', true)); ?>
                                            </div>
                                        </div>
                                    <?php } ?>

                                    <h6 class="timeline_title"><a
                                            href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h6>
							<span class="meta">
								<span class="meta_part">
									<a href="#">
                                        <i class="ico-clock7"></i>
                                        <span><?php echo get_the_date(get_option('date_format'), true); ?></span>
                                    </a>
								</span>
                                <?php if (get_the_category_list() != '') { ?>
                                    <span class="meta_part">
									<i class="ico-folder-open-o"></i>
									<span><?php echo get_the_category_list(','); ?></span>
								</span>
                                <?php } ?>
                                <span class="meta_part">
									<a href="#">
                                        <i class="ico-comment-o"></i>
                                        <span><?php comments_popup_link('No Comments &#187;', '1 Comment', '% Comments'); ?> <?php edit_post_link('Edit', ' &#124; ', ''); ?></span>
                                    </a>
								</span>
							</span>
                                    <?php the_excerpt(); ?>
                                </div>
                            </li>
                            <?php $i++;
                        endwhile;
                    } ?>
                </ul>
            </div>
            <!-- End Filter Content -->
        </div>
    </section>
    <!-- End Our Blog Grids -->
<?php get_footer(); ?>