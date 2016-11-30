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
                    <h2 class="title1 title4 upper"><i
                            class="<?php echo esc_attr($kyma_theme_options['contact_form_icon']); ?>"></i><?php echo esc_attr($kyma_theme_options['contact_form_title']); ?>
                    </h2>

                    <form class="hm_contact_form" id="contact-us-form" name="contact-us-form"
                          action="<?php echo home_url('/'); ?>" method="post">
                        <div class="form_row clearfix">
                            <label for="contact-us-name">
                                <span class="hm_field_name"><?php _e('Name', 'kyma'); ?></span>
                                <span class="hm_requires_star">*</span>
                            </label>
                            <input class="form_fill_fields hm_input_text" type="text" name="contact-us-name"
                                   id="contact-us-name" placeholder="Nombre Completo" required>
                        </div>
                        <div class="form_row clearfix">
                            <label for="contact-us-phone">
                                <span class="hm_field_name"><?php _e('Phone', 'kyma'); ?></span>
                                <span class="hm_requires_star">*</span>
                            </label>
                            <input class="form_fill_fields hm_input_text" type="text" name="contact-us-phone"
                                   id="contact-us-phone" placeholder="Teléfono Celular" required>
                        </div>
                        <div class="form_row clearfix">
                            <label for="contact-us-mail">
                                <span class="hm_field_name"><?php _e('Email', 'kyma'); ?></span>
                                <span class="hm_requires_star">*</span>
                            </label>
                            <input class="form_fill_fields hm_input_text" type="email" name="contact-us-mail"
                                   id="contact-us-mail" placeholder="mail@ejemplo.com" required>
                        </div>
                        <div class="form_row clearfix">
                            <label for="contact-us-subject">
                                <span class="hm_field_name"><?php _e('Subject', 'kyma'); ?></span>
                                <span class="hm_requires_star">*</span>
                            </label>
                            <input class="form_fill_fields hm_input_text" type="text" name="contact-us-subject"
                                   id="contact-us-subject" required>
                        </div>
                        <div class="form_row clearfix">
                            <label for="contact-us-message">
                                <span class="hm_field_name"><?php _e('Message', 'kyma'); ?></span>
                                <span class="hm_requires_star">*</span>
                            </label>
                            <textarea class="form_fill_fields hm_textarea" name="contact-us-message"
                                      id="contact-us-message"
                                      required></textarea>
                        </div>
                        <div class="form_row clearfix">
                            <button type="submit" class="send_button full_button" name="contact-us-submit"
                                    id="contact-us-submit" value="submit">
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