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
                    <form class="hm_contact_form" id="contact-us-form" name="contact-us-form" action="<?php echo home_url('/'); ?>" method="post">
                        <div class="form_row clearfix">
                            <label for="contact-us-name">
                                <span class="hm_field_name"><?php _e('Name', 'kyma'); ?></span>
                                <span class="hm_requires_star">*</span>
                            </label>
                            <input class="form_fill_fields hm_input_text" type="text" name="contact-us-name" id="contact-us-name" placeholder="Nombre Completo" required>
                        </div>
                        <div class="form_row clearfix">
                            <label for="contact-us-phone">
                                <span class="hm_field_name"><?php _e('Phone', 'kyma'); ?></span>
                                <span class="hm_requires_star">*</span>
                            </label>
                            <input class="form_fill_fields hm_input_text" type="text" name="contact-us-phone" id="contact-us-phone" placeholder="Teléfono Celular" required>
                        </div>
                        <div class="form_row clearfix">
                            <label for="contact-us-mail">
                                <span class="hm_field_name"><?php _e('Email', 'kyma'); ?></span>
                                <span class="hm_requires_star">*</span>
                            </label>
                            <input class="form_fill_fields hm_input_text" type="email" name="contact-us-mail" id="contact-us-mail" placeholder="mail@ejemplo.com" required>
                        </div>
                        <div class="form_row clearfix">
                            <label for="contact-us-subject">
                                <span class="hm_field_name"><?php _e('Subject', 'kyma'); ?></span>
                                <span class="hm_requires_star">*</span>
                            </label>
                            <input class="form_fill_fields hm_input_text" type="text" name="contact-us-subject" id="contact-us-subject" required>
                        </div>
                        <div class="form_row clearfix">
                            <label for="contact-us-message">
                                <span class="hm_field_name"><?php _e('Message', 'kyma'); ?></span>
                                <span class="hm_requires_star">*</span>
                            </label>
                            <textarea class="form_fill_fields hm_textarea" name="contact-us-message" id="contact-us-message" required></textarea>
                        </div>
                        <div class="form_row clearfix">
                            <button type="submit" class="send_button full_button" name="contact-us-submit" id="contact-us-submit" value="submit">
                                <i class="ico-check3"></i>
                                <span><?php _e('Send Your Message', 'kyma'); ?></span>
                            </button>
                        </div>
                        <div class="form_row clearfix">
                            <div id="form-messages"></div>
                        </div>
                        <div class="form_loader"></div>
                    </form>
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