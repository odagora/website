<?php
/* Template Name: Blog Standard */
get_header();
get_template_part('breadcrumbs');
get_template_part('news', 'bar');
?>
    <!-- Our Blog Grids -->
<?php $kyma_theme_options = kyma_theme_options(); ?>
    <section class="content_section">
        <div class="content row_spacer">
            <?php if ($kyma_theme_options['home_blog_title']) { ?>
                <div class="main_title centered upper">
                    <h2><span class="line"><i
                                class="ico-pencil2"></i></span><?php echo esc_attr($kyma_theme_options['home_blog_title']); ?>
                    </h2>
                </div>
            <?php
            }
            the_post();
            $blog_layout = get_post_meta(get_the_ID(), 'content_layout', true);
            $imageSize = $blog_layout == "fullwidth" ? 'kyma_single_post_full' : 'kyma_single_post_image';
            if ($blog_layout == "leftsidebar") {
                get_sidebar();
                $float = "f_right";
            } elseif ($blog_layout == "fullwidth") {
                $float = "";
            } elseif ($blog_layout == "rightsidebar") {
                $float = "f_left";
            } else {
                $blog_layout = "rightsidebar";
                $float = "f_right";
            } ?>
            <!-- All Content -->
            <div class="content_spacer clearfix">
                <?php if ($blog_layout == "leftsidebar" || $blog_layout == "rightsidebar"){ ?>
                <div class="content_block col-md-9 <?php echo esc_attr($float); ?>">
                    <?php } ?>
                    <div class="hm_blog_full_list hm_blog_list clearfix">
                        <?php
                        $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
                        $args = array('post_type' => 'post', 'paged' => $paged);
                        $wp_query = new WP_Query($args);
                        while ($wp_query->have_posts()):
                            $wp_query->the_post();
                            get_template_part('blog', 'content');
                        endwhile;
                        wp_link_pages(); ?>
                    </div>
                    <!-- End blog List -->

                    <!-- Pagination -->
                    <div id="pagination" class="pagination">
                        <?php kyma_pagination(); ?>
                    </div>
                    <!-- End Pagination -->
                    <?php if ($blog_layout == "leftsidebar" || $blog_layout == "rightsidebar"){ ?>
                </div>
                <!-- End Content Block -->
            <?php
            }
            if ($blog_layout == "rightsidebar") {
                get_sidebar();
            } ?>
            </div>
            <!-- End All Content -->
        </div>
    </section>
    <!-- End Our Blog Grids -->
<?php get_footer(); ?>