<?php
/* Template Name: Contact Us 3 */
get_header();
get_template_part('breadcrumbs');
the_post();
$kyma_theme_options = kyma_theme_options();
?>
    <!-- Contact Us -->
    <section class="content_section">
        <?php //the_content(); ?>
        <div class="content row_spacer no_padding">
            <div class="rows_container clearfix">
                <div class="col-md-6">
                    <div class="hm_blog_list landing_content clearfix">
                        <h2 class="title1 title5 upper"><i
                                class="<?php echo esc_attr($kyma_theme_options['contact_form_icon']); ?>"></i><?php echo esc_attr($kyma_theme_options['contact_form_title']); ?>
                        </h2>
                        <div <?php post_class('blog_grid_block clearfix'); ?>>
                            <div class="blog_grid_con content_text">
                                <?php the_content(); ?>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Grid -->
                <!-- Google Map -->
                <?php if ($kyma_theme_options['contact_google_map']) { ?>
                    <div class="col-md-6">
                        <?php if ($kyma_theme_options['google_map_title'] != "") { ?>
                            <div class="title_banner t_b_color1 upper centered">
                            <div class="content">
                                <h2 id="google_map_title"><?php echo esc_attr($kyma_theme_options['google_map_title']); ?></h2>
                            </div>
                            </div><?php
                        }
                        ?>
                        <div class="contact_overlay" onclick="style.pointerEvents='none'"></div>
                        <iframe id="google_map_url" src="<?php echo esc_url($kyma_theme_options['google_map_url']); ?>" width="100%" height="350" frameborder="0" style="border:0"></iframe>
                    </div>
                <?php } ?>
                <!-- End Google Map -->
            </div>
        </div>
    </section>
    <!-- End Contact Us -->
<?php get_footer(); ?>