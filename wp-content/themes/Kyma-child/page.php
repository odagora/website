<?php get_header(); ?>
    <!-- Page Title -->
<?php get_template_part('breadcrumbs'); ?>
    <!-- End Page Title -->
    <!-- Our Blog Grids -->
    <section class="content_section">
        <div class="content">
            <div class="internal_post_con clearfix">
                <?php
                $icon = "";
                if (get_post_gallery()) {
                    $icon = "ico ico-gallery";
                } elseif (has_post_thumbnail()) {
                    $icon = "ico ico-image";
                }
                ?>
                <?php
                $page_layout = get_post_meta(get_the_ID(), 'content_layout', true);
                $imageSize = $page_layout == "fullwidth" ? 'kyma_single_post_full' : 'kyma_single_post_image';
                if ((class_exists('WooCommerce') && (is_cart() || is_checkout())) || ($page_layout == "fullwidth")) {
                    $col = '12';
                    $page_layout = "fullwidth";
                } elseif ($page_layout == "leftsidebar") {
                    get_sidebar();
                    $col = '9';
                } elseif ($page_layout == "rightsidebar") {
                    $col = '9';
                } else {
                    $page_layout = "rightsidebar";
                    $col = '9';
                } ?>
                <!-- All Content -->
                <div class="content_block col-md-<?php echo $col; ?>">
                    <div class="hm_blog_full_list hm_blog_list clearfix">
                        <!-- Post Container -->
                        <?php
                        if (have_posts()):
                        while (have_posts()):
                        the_post(); ?>
                        <div id="<?php echo get_the_id(); ?>" <?php post_class('clearfix'); ?> >
                            <div class="feature_inner">
                                <div class="feature_inner_corners">
                                    <?php $thumb = 0;
                                    $icon = "";
                                    global $imageSize;
                                    $img_class = array('class' => 'img-responsive');
                                    if (metadata_exists('post', get_the_ID(), '_kyma_page_gallery')) {
                                        $icon = "ico-gallery";
                                        $gallery = get_post_gallery(get_the_ID(), false);
                                        $product_image_gallery = get_post_meta(get_the_ID(), '_kyma_page_gallery', true);
                                    } else {
                                        // Backwards compat
                                        $attachment_ids = get_posts('post_parent=' . get_the_ID() . '&numberposts=-1&post_type=attachment&orderby=menu_order&order=ASC&post_mime_type=image&fields=ids');
                                        $attachment_ids = array_diff($attachment_ids, array(get_post_thumbnail_id()));
                                        $product_image_gallery = implode(',', $attachment_ids);
                                    }
                                    $attachments = array_filter(explode(',', $product_image_gallery));
                                    if ($attachments) {
                                        ?>
                                        <div class="porto_galla">
                                            <?php
                                            foreach ($attachments as $attachment_id) {
                                                $large_image_url = wp_get_attachment_image_src($attachment_id, 'large');
                                                $blog_img_src = wp_get_attachment_image_src($attachment_id, $imageSize);
                                                echo '<a class="feature_inner_ling" href="' . esc_url($large_image_url[0]) . '"><img class="img-responsive" src="' . $blog_img_src[0] . '"/></a>';
                                            }
                                            if (has_post_thumbnail()) {
                                                $thumb = 1;
                                                $url = wp_get_attachment_url(get_post_thumbnail_id(get_the_ID())); ?>
                                                <a href="<?php echo esc_url($url); ?>" class="feature_inner_ling">
                                                    <?php the_post_thumbnail($imageSize, 'img-responsive'); ?>
                                                </a>
                                            <?php } ?>
                                        </div>
                                    <?php
                                    } elseif (has_post_thumbnail() && $thumb != 1) {
                                        $url = wp_get_attachment_url(get_post_thumbnail_id(get_the_ID())); ?>
                                        <a href="<?php echo esc_url($url); ?>"
                                           title="<?php esc_attr(the_title_attribute()); ?>" class="feature_inner_ling">
                                            <?php the_post_thumbnail($imageSize, 'img-responsive'); ?>
                                        </a>
                                    <?php } ?>
                                </div>
                            </div>
                            <div class="blog_grid_con">
                                <?php the_content(); ?>
                            </div>
                        </div>
                        <!-- End Next / Prev and Social Share-->
                        <!-- End About the author -->
                    </div><?php
                    endwhile;
                    endif;
                    ?>
                    <!-- End Post Container -->
                    <?php comments_template('', true); ?>
                </div>
                <!-- End blog List -->
                <?php if ($page_layout == "rightsidebar") {
                    get_sidebar();
                } ?>
            </div>
    </section>
    <!-- End All Content -->
<?php get_footer(); ?>