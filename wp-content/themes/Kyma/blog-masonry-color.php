<?php
/* Template Name: Blog Masonry Color */
get_header();
get_template_part('breadcrumbs');
get_template_part('news', 'bar');
the_post();
?>
    <!-- Our Blog Grids -->
<?php $kyma_theme_options = kyma_theme_options(); ?>
    <!-- Our Blog Grids -->
    <section class="content_section bg_gray">
        <div class="content row_spacer no_padding">
            <div class="main_title centered upper">
                <h2><span class="line"><i class="ico-pencil2"></i></span><?php echo the_title(); ?></h2>
            </div><?php
            $blog_layout = get_post_meta(get_the_ID(), 'content_layout', true);
            $float = "";
            $column = "three_blocks";
            if ($blog_layout == "leftsidebar") {
                $column = "two_blocks";
                $sidebar = "left_sidebar";
                $float = "col-md-9 f_right";
            } elseif ($blog_layout == "fullwidth") {
                $column = "three_blocks";
            } elseif ($blog_layout == "rightsidebar") {
                $sidebar = "right_sidebar";
                $column = "two_blocks";
                $float = "col-md-9 f_left";
            } ?>
            <!-- All Content -->
            <?php if ($float != ""){ ?>
            <div class="content_spacer clearfix">
                <div class="content_block <?php echo esc_attr($float); ?>">
                    <?php } ?>
                    <!-- Filter Content -->
                    <div class="hm_filter_wrapper masonry_posts colored_masonry <?php echo $column; ?>">
                        <ul class="hm_filter_wrapper_con"><?php
                            $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
                            $args = array('post_type' => 'post', 'paged' => $paged);
                            $wp_query = new WP_Query($args);
                            while ($wp_query->have_posts()): $wp_query->the_post();
                                if (metadata_exists('post', get_the_ID(), '_kyma_post_gallery')) {
                                    $product_image_gallery = get_post_meta(get_the_ID(), '_kyma_post_gallery', true);
                                } else {
                                    // Backwards compat
                                    $attachment_ids = get_posts('post_parent=' . get_the_ID() . '&numberposts=-1&post_type=attachment&orderby=menu_order&order=ASC&post_mime_type=image&fields=ids');
                                    $attachment_ids = array_diff($attachment_ids, array(get_post_thumbnail_id()));
                                    $product_image_gallery = implode(',', $attachment_ids);
                                }
                                $attachments = array_filter(explode(',', $product_image_gallery)); ?>
                                <li class="filter_item_block animated " data-animation-delay="300"
                                    data-animation="fadeInUp">
                                    <div class="blog_grid_block"
                                         data-bg="<?php echo get_post_meta(get_the_ID(), 'post_header_color', true); ?>">
                                        <div class="blog_grid_desc">
                                            <h6 class="title"><a
                                                    href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h6>
                                        </div>
                                        <?php
                                        $video_post_url = get_post_meta(get_the_ID(), 'video_post_url', true);
                                        ?>
                                        <div class="feature_inner <?php if ($video_post_url != '') {
                                            echo "no_corners";
                                        } ?>">
                                            <div class="feature_inner_corners">
                                                <div class="feature_inner_btns">
                                                    <a href="#" class="expand_image"><i class="ico-maximize"></i></a>
                                                    <a href="<?php the_permalink(); ?>" class="icon_link"><i
                                                            class="ico-link3"></i></a>
                                                </div>
                                                <?php if ($attachments) {
                                                    $icon = 'ico-gallery'; ?>
                                                    <div class="porto_galla">
                                                    <?php if (has_post_thumbnail()) {
                                                        $img_class = array('class' => 'img-responsive');
                                                        $post_thumb_id = get_post_thumbnail_id();
                                                        $post_thumb_url = wp_get_attachment_image_src($post_thumb_id, true);    ?>
                                                    <a href="<?php echo $post_thumb_url[0]; ?>"
                                                       class="feature_inner_ling">
                                                        <img src="<?php echo esc_url($post_thumb_url[0]); ?>"
                                                             alt="<?php the_title_attribute(); ?>"/>
                                                        </a><?php
                                                    }
                                                    foreach ($attachments as $attachment_id) {
                                                        $large_image_url = wp_get_attachment_image_src($attachment_id, 'large');
                                                        $src_img = wp_get_attachment_image_src($attachment_id, 'kyma_home_post_image');
                                                        ?>
                                                        <a href="<?php echo esc_url($large_image_url[0]); ?>"
                                                           class="feature_inner_ling">
                                                            <img src="<?php echo esc_url($src_img[0]); ?>"
                                                                 alt="<?php the_title_attribute(); ?>"/>
                                                        </a>
                                                    <?php }
                                                    if (get_post_meta(get_the_ID(), 'video_post_url', true) != "") { ?>
                                                        <div class="embed-container">
                                                            <?php echo apply_filters('the_content', get_post_meta(get_the_ID(), 'video_post_url', true)); ?>
                                                        </div>
                                                    <?php } ?>
                                                    </div><?php
                                                } elseif (has_post_thumbnail()) {
                                                    ?>
                                                    <div class="porto_galla">
                                                        <?php $icon = 'ico-image4';
                                                        $img_class = array('class' => 'img-responsive');
                                                        $post_thumb_id = get_post_thumbnail_id();
                                                        $post_thumb_url = wp_get_attachment_image_src($post_thumb_id, true); ?>
                                                        <a href="<?php echo esc_url($post_thumb_url[0]); ?>"
                                                           class="feature_inner_ling" data-rel="magnific-popup">
                                                            <img src="<?php echo esc_url($post_thumb_url[0]); ?>"
                                                                 alt="<?php the_title_attribute(); ?>"/>
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
                                                <a href="#" class="blog_grid_format"><i
                                                        class="<?php echo $icon; ?>"></i></a>
                                            <?php } ?>
                                            <span class="meta">
											<span class="meta_part">
												<a href="#">
                                                    <i class="ico-clock7"></i>
                                                    <span><?php echo get_post_time(get_option('date_format'), true); ?></span>
                                                </a>
											</span>
											<span class="meta_part">
												<a href="#">
                                                    <i class="ico-comment-o"></i>
                                                    <span><?php comments_popup_link(__('No Comments', 'kyma'), __('1 Comment', 'kyma'), __('% Comments', 'kyma')); ?> <?php edit_post_link(__('Edit', 'kyma'), ' &#124; ', ''); ?></span>
                                                </a>
											</span>
											<span class="meta_part">
												<i class="ico-folder-open-o"></i>
												<span>
													<?php echo get_the_category_list(','); ?>
												</span>
											</span>
											<span class="meta_part">
												<a href="<?php echo esc_url(get_author_posts_url(get_the_author_meta("ID"))); ?>">
                                                    <i class="ico-user5"></i>
                                                    <span><?php the_author(); ?></span>
                                                </a>
											</span>
										</span><?php the_excerpt(); ?>
                                        </div>
                                    </div>
                                </li><!-- Item --><?php
                            endwhile; ?>
                        </ul>
                    </div>
                    <div class="content">
                        <!-- Pagination -->
                        <div id="pagination" class="pagination">
                            <?php kyma_pagination(); ?>
                        </div>
                        <!-- End Pagination -->
                    </div>
                    <?php
                    if ($float != ""){
                    ?>
                </div><?php
                get_sidebar(); ?>
            </div> <?php } ?>
        </div>
    </section>
<?php get_footer(); ?>