<?php
/* Template Name: Landing */
get_header();
the_post(); ?>
<!-- Landing -->
<?php $kyma_theme_options = kyma_theme_options(); ?>
<section class="content_section">
    <div class="content row_spacer blog">
        <!-- All Content -->
        <h2 class="title1 title5"><?php echo esc_attr($kyma_theme_options['landing_title']); ?></h2>
        <div class="content_spacer clearfix">

            <div class="landing_spacer col-md-6">
                <div class="hm_blog_list landing_content clearfix">
                    <div class="blog_grid_con post_text">
                        <?php echo do_shortcode($kyma_theme_options['landing_description']);
                        if (isset($kyma_theme_options['landing_bg_image']) && is_array($kyma_theme_options['landing_bg_image']) && $kyma_theme_options['landing_bg_image']['url'] != "") {
                        ?>
                        <img class="img-responsive"
                                src="<?php echo esc_url($kyma_theme_options['landing_bg_image']['url']); ?>"
                                alt="<?php the_title(); ?>">
                        <?php } ?>
                    </div>
                </div>
            </div>
            <div class="landing_spacer post_main col-md-6">
                <div class="hm_blog_list landing_content landing_form clearfix">
                    <h2 class="title1 title5 upper"><i class="<?php echo esc_attr($kyma_theme_options['contact_form_icon']); ?>"></i><?php echo esc_attr($kyma_theme_options['contact_form_title']); ?>
                    </h2>
                    <div <?php post_class('blog_grid_block clearfix'); ?>>
                        <div class="blog_grid_con content_text">
                            <?php the_content(); ?>
                        </div>
                    </div>
                </div>
            </div>
            <!-- End All Content -->
        </div>
    </div>
</section>
<!-- End Landing -->
<?php
get_template_part('page', 'testimonial');
get_template_part('page', 'client');
get_footer();
?>