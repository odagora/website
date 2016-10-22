<?php
get_header();
get_template_part('breadcrumbs'); ?>
<!-- Our Blog Grids -->
<?php $kyma_theme_options = kyma_theme_options(); ?>
<section class="content_section">
    <div class="content row_spacer">
        <div class="main_title centered upper">
            <h2><span class="line"><i
                        class="fa fa-pencil"></i></span><?php echo esc_attr($kyma_theme_options['home_blog_title']); ?>
            </h2>
        </div><?php
        $blog_layout = $kyma_theme_options['blog_layout'];
        global $imageSize;
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
            <div class="content_block col-md-9 <?php echo $float; ?> ">
                <?php } ?>
                <div class="hm_blog_list clearfix"><?php
                    $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
                    $args = array('post_type' => 'post', 'paged' => $paged);
                    $wp_query = new WP_Query($args);
                    while ($wp_query->have_posts()):
                        $wp_query->the_post();
                        get_template_part('blog', 'content');
                    endwhile;
                    wp_link_pages(); ?>
                    <!-- End blog List -->
                </div>
                <!-- Pagination -->
                <div id="pagination" class="pagination">
                    <?php kyma_pagination(); ?>
                </div>
                <!-- End Pagination -->
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
