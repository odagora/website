<?php
/* Template Name: Landing One*/
get_header();
the_post(); ?>
    <!-- Our Blog Grids -->
<?php $kyma_theme_options = kyma_theme_options(); ?>
    <section class="content_section">
        <div class="content row_spacer blog">
            <!-- All Content -->
            <h2 class="title1 title5"><?php echo esc_attr($kyma_theme_options['landing_one_title']); ?></h2>
            <div class="content_spacer centered clearfix">
                <div class="landing_spacer col-md-6">
                    <div class="hm_blog_list landing_content centered clearfix">
                    <?php echo do_shortcode($kyma_theme_options['landing_one_description']);
                    ?>
                        <div class="landing_box centered">
                            <p><?php echo esc_attr($kyma_theme_options['landing_one_subtitle']);?></p>
                            <?php if(($kyma_theme_options['landing_one_text']) != ""){
                                echo do_shortcode($kyma_theme_options['landing_one_text']);
                            } ?>
                            <div id="follow_on_socials" class="landing_social">
                                <?php if($kyma_theme_options['social_facebook_link'] != ''){ ?>
                                    <a class="facebook" href="<?php echo esc_url($kyma_theme_options['social_facebook_link']); ?>" target="_blank">
                                        <span class="soc_icon_bg"></span>
                                        <i class="fa fa-facebook-square fa-3x"></i>
                                    </a>
                                <?php }
                                if ($kyma_theme_options['social_twitter_link'] != '') { ?>
                                    <a class="twitter" href="<?php echo esc_url($kyma_theme_options['social_twitter_link']); ?>" target="_blank">
                                        <span class="soc_icon_bg"></span>
                                        <i class="fa fa-twitter fa-3x"></i>
                                    </a>
                                <?php }
                                if ($kyma_theme_options['social_google_plus_link'] != '') { ?>
                                    <a class="google-plus" href="<?php echo esc_url($kyma_theme_options['social_google_plus_link']); ?>" target="_blank">
                                        <span class="soc_icon_bg"></span>
                                        <i class="fa fa-google-plus fa-3x"></i>
                                    </a>
                                <?php }
                                if ($kyma_theme_options['social_skype_link'] != '') { ?>
                                    <a class="skype" href="skype:<?php echo esc_attr($kyma_theme_options['social_skype_link']); ?>?call">
                                        <span class="soc_icon_bg"></span>
                                        <i class="fa fa-skype fa-3x"></i>
                                    </a><?php
                                }
                                if ($kyma_theme_options['social_vimeo_link'] != '') { ?>
                                    <a class="vimeo" href="<?php echo esc_url($kyma_theme_options['social_vimeo_link']); ?>" target="_blank">
                                        <span class="soc_icon_bg"></span>
                                        <i class="fa fa-vimeo-square fa-3x"></i>
                                    </a><?php
                                }
                                if ($kyma_theme_options['social_picasa_link'] != '') { ?>
                                    <a class="picasa" href="<?php echo esc_url($kyma_theme_options['social_picasa_link']); ?>" target="_blank">
                                        <span class="soc_icon_bg"></span>
                                        <i class="fa fa-picassa fa-3x"></i>
                                    </a><?php
                                }
                                if ($kyma_theme_options['social_instagram_link'] != '') { ?>
                                    <a class="instagram" href="<?php echo esc_url($kyma_theme_options['social_instagram_link']); ?>" target="_blank">
                                        <span class="soc_icon_bg"></span>
                                        <i class="fa fa-instagram fa-3x"></i>
                                    </a><?php
                                }
                                if ($kyma_theme_options['social_pinterest_link'] != '') { ?>
                                    <a href="<?php echo esc_url($kyma_theme_options['social_pinterest_link']); ?>" target="_blank">
                                        <span class="soc_icon_bg"></span>
                                        <i class="fa fa-pinterest fa-3x"></i>
                                    </a><?php
                                }
                                if ($kyma_theme_options['social_youtube_link'] != '') { ?>
                                    <a class="youtube" href="<?php echo esc_url($kyma_theme_options['social_youtube_link']); ?>" target="_blank">
                                        <span class="soc_icon_bg"></span>
                                        <i class="fa fa-youtube-play fa-3x"></i>
                                    </a><?php
                                }
                                ?>
                            </div>
                        </div>
                        <!-- End blog post detail -->
                    </div>
                </div>
                <div class="landing_spacer col-md-6">
                    <div class="hm_blog_list landing_content clearfix">
                        <div class="blog_grid_con post_text">
                            <?php if (isset($kyma_theme_options['landing_one_bg_image']) && is_array($kyma_theme_options['landing_one_bg_image']) && $kyma_theme_options['landing_one_bg_image']['url'] != "") {
                            ?>
                            <img class="img-responsive" src="<?php echo esc_url($kyma_theme_options['landing_one_bg_image']['url']); ?>" alt="<?php the_title(); ?>">
                            <?php } ?>
                        </div>
                    </div>
                </div>
                <!-- End Content Block -->
            </div>
            <!-- All Content -->
        </div>
    </section>
    <!-- End Our Blog Grids -->
<?php
    get_template_part('page', 'testimonial');
    get_template_part('page', 'client');
    get_footer();
?>