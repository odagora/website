<?php get_header();
get_template_part('breadcrumbs');
?>
    <!-- Our Blog Grids -->
<?php $kyma_theme_options = kyma_theme_options(); ?>
    <section class="content_section page_title">
        <div class="content clearfix">
            <h1 class="">
                <?php printf(__("Search Results For: \"%s\"", 'kyma'), '<span>' . esc_attr(get_search_query()) . '</span>'); ?>
            </h1>
            <?php kyma_breadcrumbs(); ?>
        </div>
    </section>
    <section class="content_section">
        <div class="content row_spacer">
            <?php
            $blog_layout = $kyma_theme_options['blog_layout'];
            $imageSize = $blog_layout == "fullwidth" ? 'kyma_home_post_full_thumb' : 'kyma_home_post_thumb';
            if ($blog_layout == "leftsidebar") {
                get_sidebar();
                $float = "f_right";
            } elseif ($blog_layout == "fullwidth") {
                $float = "";
            } elseif ($blog_layout == "rightsidebar") {
                $float = "f_left";
            } ?>
            <!-- All Content -->
            <div class="content_spacer clearfix">
                <?php if ($blog_layout == "leftsidebar" || $blog_layout == "rightsidebar"){ ?>
                <div class="content_block col-md-9 <?php echo esc_attr($float); ?> ">
                    <?php
                    }
                    if (have_posts()) {
                        ?>
                        <?php while (have_posts()) {
                            the_post(); ?>
                            <div class="hm_blog_list clearfix">
                                <div <?php post_class('blog_grid_block clearfix'); ?>>
                                    <div class="feature_inner">
                                        <div class="feature_inner_corners">
                                            <div class="feature_inner_btns">
                                                <a href="#" class="expand_image"><i class="ico-maximize"></i></a>
                                                <a href="#" class="icon_link"><i class="ico-link3"></i></a>
                                            </div>
                                            <?php $thumb = 0;
                                            global $imageSize;
                                            if (get_post_gallery()) {
                                                $icon = "ico-gallery";
                                                $gallery = get_post_gallery(get_the_ID(), false);?>
                                                <div class="porto_galla">
                                                    <?php
                                                    foreach ($gallery['src'] as $src) {
                                                        ?>
                                                    <a title="<?php the_title_attribute(); ?>"
                                                       href="<?php echo $src; ?>" class="feature_inner_ling">
                                                        <img class="img-responsive" src="<?php echo esc_url($src); ?>"
                                                             alt="<?php esc_attr(the_title_attribute()); ?>">
                                                        </a><?php
                                                    }
                                                    if (has_post_thumbnail()) {
                                                        $thumb = 1;
                                                        $url = wp_get_attachment_url(get_post_thumbnail_id(get_the_ID())) ?>
                                                    <a href="<?php echo esc_url($url); ?>"
                                                       title="<?php esc_attr(the_title_attribute()); ?>"
                                                       class="feature_inner_ling">
                                                        <?php the_post_thumbnail($imageSize, 'img-responsive'); ?>
                                                        </a><?php
                                                    }?>
                                                </div>
                                            <?php
                                            } elseif (has_post_thumbnail() && $thumb != 1) {
                                                $icon = "ico-image";
                                                $url = wp_get_attachment_url(get_post_thumbnail_id(get_the_ID())); ?>
                                            <a href="<?php echo esc_url($url); ?>"
                                               title="<?php esc_attr(the_title_attribute()); ?>"
                                               class="feature_inner_ling">
                                                <?php the_post_thumbnail($imageSize, 'img-responsive'); ?>
                                                </a><?php
                                            }
                                            ?>
                                        </div>
                                    </div>
                                    <div class="blog_grid_con">
                                        <h6 class="title"><a href="<?php the_permalink(); ?>"
                                                             title="<?php esc_attr(the_title_attribute()); ?>"><?php the_title(); ?></a>
                                        </h6>
										<span
                                            class="meta"><?php if (isset($icon) && $icon == 'ico-image' || $icon == 'ico-gallery') { ?>
                                                <span class="meta_part post_type_meta">
                                                <a href="#">
                                                    <i class="ico-image4"></i>
                                                    <span><?php echo esc_attr(ucfirst(explode('-', $icon)[1])); ?></span>
                                                </a>
                                                </span><?php
                                            } ?>
                                            <span class="meta_part">
												<a href="#">
                                                    <i class="ico-clock7"></i>
                                                    <span><?php echo esc_attr(get_the_date(get_option('date_format'), true)); ?></span>
                                                </a>
											</span><?php
                                            if (get_the_category_list() != '') {
                                                ?>
                                                <span class="meta_part">
												<i class="ico-folder-open-o"></i>
												<span><?php echo get_the_category_list(','); ?></span>
											</span>
                                            <?php } ?>
                                            <span class="meta_part">
												<a href="#">
                                                    <i class="ico-user5"></i>
                                                    <span><a
                                                            href="<?php echo esc_url(get_author_posts_url(get_the_author_meta('ID'))); ?>"><?php esc_attr(the_author()); ?></a></span>
                                                </a>
											</span>
										</span>
                                        <?php the_excerpt(); ?>
                                    </div>
                                </div>
                            </div>
                        <?php } ?>
                        <!-- End blog List -->

                        <!-- Pagination -->
                        <div id="pagination" class="pagination">
                            <?php kyma_pagination(); ?>
                        </div>

                    <?php } else { ?>
                        <div class="search_error">
                            <div class="search_err_heading"><h2><?php _e("Nothing Found", 'kyma'); ?></h2>
                            </div>
                            <div class="wave_searching">
                                <p><?php _e("Sorry, but nothing matched your search criteria. Please try again with some different keywords.", 'kyma'); ?></p>
                            </div>
                        </div>
                        <?php get_search_form(); ?>
                    <?php } ?>
                    <!-- End Pagination -->
                    <?php if ($blog_layout == "leftsidebar" || $blog_layout == "rightsidebar"){ ?>
                </div>
            <?php } ?>
                <!-- End Content Block -->

                <!-- sidebar -->
                <?php
                if ($blog_layout == "rightsidebar") {
                    get_sidebar();
                } ?>
                <!-- End sidebar -->
            </div>
            <!-- All Content -->
        </div>
    </section>
    <!-- End Our Blog Grids -->
<?php get_footer(); ?>