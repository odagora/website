<?php get_header(); ?>
<section class="content_section page_title">
    <div class="content clearfix">
        <h1 class="">
            <?php if (is_day()):
                printf(__('Daily Archives: %s', 'kyma'), '<span>' . get_the_date() . '</span>');
            elseif (is_month()) :
                printf(__('Monthly Archives: %s', 'kyma'), '<span>' . get_the_date(_x('F Y', 'monthly archives date format', 'kyma')) . '</span>');
            elseif (is_year()) :
                printf(__('Yearly Archives: %s', 'kyma'), '<span>' . get_the_date(_x('Y', 'yearly archives date format', 'kyma')) . '</span>');
            else :
                _e('Archives', 'kyma');
            endif; ?>
        </h1>
        <?php kyma_breadcrumbs(); ?>
    </div>
</section>
<!-- Our Blog Grids -->
<?php $kyma_theme_options = kyma_theme_options(); ?>
<section class="content_section">
    <div class="content row_spacer">
        <div class="main_title centered upper">
            <h2><span class="line"><i
                        class="fa fa-archive"></i></span><?php _e('Archives', 'kyma'); ?>
            </h2>
        </div>
        <?php
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
        <div class="content_spacer clearfix"><?php
            if ($blog_layout == "leftsidebar" || $blog_layout == "rightsidebar"){
            ?>
            <div class="content_block col-md-9 <?php echo esc_attr($float); ?> "><?php
                }?>
                <div class="hm_blog_list clearfix"><?php
                    while (have_posts()):
                        the_post();
                        get_template_part('blog', 'content');
                    endwhile; ?>
                </div>
                <!-- End blog List -->
                <!-- Pagination -->
                <div id="pagination" class="pagination">
                    <?php kyma_pagination(); ?>
                </div>
                <!-- End Pagination -->
                <?php if ($blog_layout == "leftsidebar" || $blog_layout == "rightsidebar"){ ?>
            </div>
        <?php
        }
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
