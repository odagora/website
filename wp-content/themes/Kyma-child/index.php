<?php
get_header();
?>
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
            <div class="content_block col-md-9 post_main <?php echo $float; ?> ">
                <?php } ?>
                <div class="hm_blog_list post_content clearfix"><?php
                    $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
                    $args = array('post_type' => 'post', 'paged' => $paged);
                    $wp_query = new WP_Query($args);
                    while ($wp_query->have_posts()):
                        $wp_query->the_post(); ?>
                        <article id="<?php echo get_the_id(); ?>" <?php post_class('clearfix');?> >
                            <div class="post_title_con">
                                <h6 class="title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h6>
                                            <span class="meta">
                                                <span class="meta_part">
                                                    <a href="#">
                                                        <i class="fa fa-clock-o"></i>
                                                        <span><?php echo esc_attr(get_the_date(get_option('date_format')), true); ?></span>
                                                    </a>
                                                </span>
                                                <span class="meta_part">
                                                    <a href="#">
                                                        <i class="fa fa-comment-o"></i>
                                                        <?php comments_popup_link('Dejar comentario &#187;', '1 Commentario', '% Commentarios'); ?> <?php edit_post_link('Editar', ' &#124; ', ''); ?>
                                                    </a>
                                                </span>
                                                <?php if (get_the_category_list() != '') { ?>
                                                    <span class="meta_part">
                                                        <i class="fa fa-folder-open-o"></i>
                                                        <span><?php echo get_the_category_list(',', '', ''); ?></span>
                                                    </span>
                                                <?php } ?>
                                                <span class="meta_part">
                                                    <a href="<?php echo esc_url(get_author_posts_url(get_the_author_meta('ID'))); ?>">
                                                        <i class="fa fa-user"></i>
                                                        <span><?php esc_attr(the_author()); ?></span>
                                                    </a>
                                                </span>
                                            </span>
                            </div>
                            <div class="blog_grid_con">
                                <?php the_content(); ?>
                            </div>
                        </article>
                        <?php
                        // get_template_part('blog', 'content');
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
