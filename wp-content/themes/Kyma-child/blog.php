<?php
/* Template Name: Blog */
get_header();
get_template_part('breadcrumbs');
the_post(); ?>
    <!-- Our Blog Grids -->
<?php $kyma_theme_options = kyma_theme_options(); ?>
    <section class="content_section">
        <div class="content row_spacer blog">
            <?php
            $blog_layout = get_post_meta(get_the_ID(), 'content_layout', true);
            $imageSize = $blog_layout == "fullwidth" ? 'kyma_home_post_full_thumb' : 'kyma_home_post_thumb';
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
                <div class="content_block col-md-9 <?php echo esc_attr($float); ?> ">
                    <?php } ?>
                    <div class="hm_blog_list clearfix"><?php
                        get_template_part('blog', 'content');
                        ?>
                        <!-- End blog post detail -->
                    </div>
                    <!-- End Content Block -->
                    <?php if ($blog_layout == "leftsidebar" || $blog_layout == "rightsidebar"){ ?>
                </div>
            <?php
            }
            if ($blog_layout == "rightsidebar") {
                get_sidebar();
            } ?>
                <!-- All Content -->
            </div>
        </div>
    </section>
    <!-- End Our Blog Grids -->
<?php get_footer(); ?>