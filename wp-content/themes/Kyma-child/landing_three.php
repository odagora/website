<?php
/* Template Name: Landing Three*/
get_header();
the_post(); ?>
<!-- Landing -->
<?php $kyma_theme_options = kyma_theme_options(); ?>
<section class="content_section">
    <div class="content row_spacer blog">
        <!-- All Content -->
        <div class="content_spacer clearfix">
            <div class="landing_spacer post_main col-md-12">
                <div class="hm_blog_list landing_content landing_form clearfix">
                    <h2 class="title1 title5 upper"><i class="<?php echo esc_attr($kyma_theme_options['newsletter_form_icon']); ?>"></i><?php echo esc_attr($kyma_theme_options['newsletter_form_title']); ?>
                    </h2>
                    <div <?php post_class('blog_grid_block clearfix'); ?>>
                        <div class="blog_grid_con content_text">
                            <div class="wpcf7">
                                <?php the_content(); ?>
                            </div>
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