<?php get_header(); ?>
    <!-- Page Title -->
    <!-- End Page Title -->
    <!-- Our Blog Grids -->
    <section class="content_section">
    <div class="content">
    <div class="internal_post_con clearfix"><?php
    $kyma_theme_options = kyma_theme_options();
    $icon = '';
    $post_layout = get_post_meta(get_the_ID(), 'content_layout', true);
    $imageSize = $post_layout == "fullwidth" ? 'kyma_single_post_full' : 'kyma_single_post_image';
    if ($post_layout == "leftsidebar") {
        get_sidebar();
        $float = "f_right";
    } elseif ($post_layout == "fullwidth") {
        $float = "";
    } elseif ($post_layout == "postright") {
        $float = "f_left";
        $imageSize = 'kyma_single_post_image';
    } else {
        $post_layout = "rightsidebar";
        $float = "f_left";
    }?>
    <!-- All Content --><?php
    if (get_post_meta(get_the_ID(), '_kyma_post_gallery', true)) {
        $icon = "ico-gallery";
    } elseif (has_post_thumbnail()) {
        $icon = "ico-image";
    } elseif (get_post_meta(get_the_ID(), 'video_post_url', true)) {
        $icon = "ico-video-camera";
    }
    if ($post_layout == "rightsidebar" || $post_layout == "leftsidebar"){
    ?>
    <div class="content_block col-md-9 post_main <?php echo esc_attr($float); ?> "><?php
    } ?>
    <div class="hm_blog_full_list hm_blog_list post_content clearfix">
    <!-- Post Container --><?php
    if (have_posts()):
        while (have_posts()): the_post(); ?>
        <div id="<?php echo get_the_id(); ?>" <?php post_class('clearfix'); ?> >
            <div class="post_title_con">
                <h6 class="title entry-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h6>
							<span class="meta">
								<span class="meta_part">
									<a href="#">
                                        <i class="fa fa-clock-o"></i>
                                        <span class="post-date updated"><?php echo esc_attr(get_the_date(get_option('date_format')), true); ?></span>
                                    </a>
								</span>
								<span class="meta_part">
									<a href="#">
                                        <i class="fa fa-comment-o"></i>
                                        <?php comments_popup_link('Dejar comentario &#187;', '1 Comentario', '% Comentarios'); ?> <?php edit_post_link('Editar', ' &#124; ', ''); ?>
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
                                        <span class="vcard author post-author"><span class="fn"><?php esc_attr(the_author()); ?></span>
                                        </span>
                                    </a>
								</span>
							</span>
            </div>
            <div class="blog_grid_con post_text">
                <?php the_content(); ?>
            </div>

            <!-- Next / Prev and Social Share-->
            <div class="post_next_prev_con clearfix">
                <!-- Next and Prev Post-->
                <div class="post_next_prev clearfix">
                    <?php next_post_link('%link', '<i class="fa fa-long-arrow-left"></i><span class="t">' . __('Previous Post', 'kyma') . '</span>'); ?>
                    <?php previous_post_link('%link', '<span class="t">' . __('Next', 'kyma') . '</span><i class="fa fa-long-arrow-right"></i>'); ?>
                </div>
                <!-- End Next and Prev Post-->

                <!-- Social Share-->
                <div class="single_pro_row">
                     <div id="share_on_socials">
                        <!-- <h6>Share:</h6> -->
                        <a class="facebook" 
                           href="https://www.facebook.com/dialog/feed?app_id=184683071273&link=<?php echo get_the_permalink();?>&picture=<?php echo esc_url($url); ?>&name=<?php echo get_the_title(); ?>&description=<?php echo esc_attr(wp_trim_words(get_the_excerpt(),40));?>&redirect_uri=https://www.facebook.com"
                           target="_blank"><i class="fa fa-facebook"></i></a>
                        <a class="twitter"
                           href="http://twitter.com/home?status=<?php echo get_the_title(); ?>+<?php echo get_the_permalink(); ?>"
                           target="_blank"><i class="fa fa-twitter"></i></a>
                        <a class="googleplus" href="https://plus.google.com/share?url=<?php echo get_the_permalink(); ?>"
                           target="_blank"><i class="fa fa-google-plus"></i></a>
                        <a class="pinterest"
                           href="https://pinterest.com/pin/create/button/?url=<?php echo get_the_permalink(); ?>&media=<?PHP echo esc_url($url); ?>&description=<?php echo get_the_title(); ?>"
                           target="_blank"><i class="fa fa-pinterest"></i></a>
                        <a class="linkedin" 
                           href="https://www.linkedin.com/shareArticle?mini=true&url=<?php echo get_the_permalink(); ?>&title=<?php echo get_the_title(); ?>&summary<?php get_the_excerpt(); ?>"
                           target="_blank"><i class="fa fa-linkedin"></i></a>

                    </div>
                </div>
                <!-- End Social Share-->
            </div>
            <!-- End Next / Prev and Social Share-->

            <!-- Tags -->
            <?php if (get_the_tag_list() != '') { ?>
                <div class="small_title">
							<span class="small_title_con">
								<span class="s_icon"><i class="fa fa-tags"></i></span>
								<span class="s_text"><?php _e('Tags', 'kyma'); ?></span>
							</span>
                </div>
                <div class="tags_con">
                    <?php esc_attr(the_tags('', '', '')); ?>
                </div>
            <?php } ?>
            <!-- End Tags -->
            </div><?php
        endwhile;
    endif;                    ?>
    <!-- End Post Container -->

    <!-- Related Posts --><?php
    $tags = wp_get_post_tags(get_the_ID());
    $num = sizeOf($tags);
    $tagarr = array();
    for ($i = 0; $i < $num; $i++) {
        $tagarr[$i] = $tags[$i]->term_id;
    }
    if ($tags) {
        $args = array(
            'tag__in' => $tagarr,
            'post__not_in' => array(get_the_ID()),
            'ignore_sticky_posts' => 1
        );
        $query = new WP_Query($args);
        if ($query->have_posts()) {
            ?>
            <div class="related_posts">
            <div class="small_title">
							<span class="small_title_con">
								<span class="s_icon"><i class="ico-laptop4"></i></span>
								<span
                                    class="s_text"><?php echo esc_attr($kyma_theme_options['related_post_text']); ?></span>
							</span>
            </div>

            <div class="related_posts_con"><?php
                while ($query->have_posts()) {
                    $query->the_post();
                    if (get_post_meta(get_the_ID(), '_kyma_post_gallery', true)) {
                        $icon = "ico-gallery";
                    } elseif (has_post_thumbnail()) {
                        $icon = "ico-image";
                    } elseif (get_post_meta(get_the_ID(), 'video_post_url', true)) {
                        $icon = "ico-video-camera";
                    } ?>
                    <div class="related_posts_slide">
                    <div class="related_img_con">
                        <a href="<?php the_permalink(); ?>" class="related_img">
                            <?php
                            $img_class = array('class' => 'img-responsive');
                            the_post_thumbnail('kyma_related_post_thumb', $img_class); ?>
                            <span><i class="<?php echo esc_attr($icon); ?>"></i></span>
                        </a>
                    </div>
                    <a class="related_title" href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                    <span
                        class="post_date"><?php echo esc_attr(get_the_date(get_option('date_format'), true)); ?></span>
                    </div><?php
                } ?>
            </div>
            </div><?php
        }
    } ?>
    <!-- End Related Posts -->

    <!-- Comments Container -->
    <?php comments_template('', true); ?>
    <!-- End Comments Container -->
    </div>
    <?php if ($post_layout == "rightsidebar" || $post_layout == "leftsidebar"){ ?>
    </div>
    <?php } ?>
    <!-- End blog List -->
    <?php if ($post_layout == "rightsidebar") {
        get_sidebar();
    } ?>
    </div>
    </div>
    </section>
    <!-- End All Content -->
<?php get_footer(); ?>