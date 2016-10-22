<?php
/* Template Name: Career Template */
get_header();
get_template_part('breadcrumbs');
global $kyma_theme_options;
?>
    <!-- Section -->
    <section class="content_section">
        <div class="container row_spacer clearfix">
            <div class="content">
                <div class="main_title lato small_space">
                    <h2><span class="line"><span class="dot"></span></span><?php the_title(); ?></h2>
                </div>
                <div class="main_desc">
                    <p><?php echo get_post_meta(get_the_ID(), 'about_us_page_description', true); ?></p>
                </div>
                <span class="spacer20"></span>
            </div>
            <div class="rows_container clearfix">
                <?php if (have_posts()) {
                    the_post(); ?>
                    <div class="col-md-7">
                        <?php the_content(); ?>
                    </div>    <?php } ?>
                <div class="col-md-5">
                    <h2 class="title1 upper"><?php echo esc_attr($kyma_theme_options['career_form_title']); ?></h2>

                    <form class="hm_contact_form full_contact_form" id="careers-form" name="careers-form"
                          action="<?php echo home_url('/'); ?>" method="post">
                        <div class="form_row clearfix">
                            <label for="career-name">
                                <span class="hm_field_name"><?php _e('Name', 'kyma'); ?></span>
                                <span class="hm_requires_star">*</span>
                            </label>
                            <input class="form_fill_fields hm_input_text" type="text" name="career-name"
                                   id="career-name" placeholder="<?php _e('Full Name', 'kyma'); ?>" required>
                        </div>
                        <div class="form_row clearfix">
                            <label for="career-email">
                                <span class="hm_field_name"><?php _e('Email', 'kyma'); ?></span>
                                <span class="hm_requires_star">*</span>
                            </label>
                            <input class="form_fill_fields hm_input_text" type="email" name="career-email"
                                   id="career-email" placeholder="mail@sitename.com" required>
                        </div>
                        <div class="form_row clearfix">
                            <label for="career-address">
                                <span class="hm_field_name"><?php _e('Address', 'kyma'); ?></span>
                            </label>
                            <input class="form_fill_fields hm_input_text" type="text" name="career-address"
                                   id="career-address" placeholder="">
                        </div>
                        <div class="form_row clearfix">
                            <div class="my_col_half">
                                <label for="birth-date">
                                    <span class="hm_field_name"><?php _e('Date of birth', 'kyma'); ?></span>
                                    <span class="hm_requires_star">*</span>
                                </label>
                                <input class="form_fill_fields hm_input_text" type="date" name="birth-date"
                                       id="birth-date" placeholder="Example: 01/01/2001" required>
                            </div>
                            <div class="my_col_half">
                                <label for="experience-years">
                                    <span
                                        class="hm_field_name"><?php _e('Years of experience', 'kyma'); ?></span>
                                    <span class="hm_requires_star">*</span>
                                </label>
                                <input class="form_fill_fields hm_input_text" type="number" name="experience-years"
                                       id="experience-years" placeholder="Example: 3" required>
                            </div>
                        </div>
                        <div class="form_row clearfix">
                            <label for="career-position">
                                <span class="hm_field_name"><?php _e('Position', 'kyma'); ?></span>
                                <span class="hm_requires_star">*</span>
                            </label>
                            <label class="orderby_label" for="career-position">
                                <select class="shipping_country" id="career-position" name="career-position" required>
                                    <option value="">Select Position ---</option>
                                    <?php foreach ($kyma_theme_options['job_positions'] as $job_position) { ?>
                                        <option
                                            value="<?php echo esc_attr($job_position); ?>"><?php echo esc_attr($job_position); ?></option>
                                    <?php } ?>
                                </select>
                            </label>
                        </div>
                        <div class="form_row clearfix">
                            <label for="career-message">
                                <span class="hm_field_name"><?php _e('Message', 'kyma'); ?></span>
                            </label>
                            <textarea class="form_fill_fields hm_textarea" name="career-message"
                                      id="career-message"></textarea>
                        </div>
                        <div class="form_row clearfix">
                            <label for="cv-attachment">
                                <span class="hm_field_name"><?php _e('upload your CV', 'kyma'); ?></span>
                            </label>
                            <input type="file" id="cv-attachment" name="cv-attachment">
                        </div>
                        <div class="form_row clearfix">
                            <button type="submit" name="careers-submit" id="careers-submit"
                                    class="send_button full_button">
                                <i class="ico-check3"></i>
                                <span><?php _e('Apply Now', 'kyma'); ?></span>
                            </button>
                        </div>
                        <div class="form_row clearfix">
                            <div id="form-messages"></div>
                        </div>
                        <div class="form_loader"></div>
                    </form>
                </div>
                <!-- End Columns -->
            </div>
        </div>
    </section>
    <!-- End Section -->
<?php get_footer(); ?>