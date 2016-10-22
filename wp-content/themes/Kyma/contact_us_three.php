<?php
/* Template Name: Contact Us 3 */
get_header();
the_post();
$kyma_theme_options = kyma_theme_options();
?>
    <!-- Page Title -->
    <section class="content_section white_section page_title has_bg_image bg_header4 enar_parallax"
             style="background-image: url('<?php if (has_post_thumbnail()) {
                 echo wp_get_attachment_image_url(get_post_thumbnail_id(get_the_ID()), 'contact_us_image');
             } else {
                 echo get_template_directory_uri() . '/images/contact-header-bg.jpg';
             } ?>');">
        <div class="content clearfix">
            <h1 class=""><?php the_title(); ?></h1>
            <?php kyma_breadcrumbs(); ?>
        </div>
    </section>
    <!-- End Page Title -->
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
                                   id="contact-us-name" placeholder="Full Name" required>
                        </div>
                        <div class="form_row clearfix">
                            <label for="contact-us-mail">
                                <span class="hm_field_name"><?php _e('Email', 'kyma'); ?></span>
                                <span class="hm_requires_star">*</span>
                            </label>
                            <input class="form_fill_fields hm_input_text" type="email" name="contact-us-mail"
                                   id="contact-us-mail" placeholder="mail@sitename.com" required>
                        </div>
                        <div class="form_row clearfix">
                            <label for="contact-us-phone">
                                <span class="hm_field_name"><?php _e('Phone', 'kyma'); ?></span>
                            </label>
                            <input class="form_fill_fields hm_input_text" type="text" name="contact-us-phone"
                                   id="contact-us-phone">
                        </div>
                        <div class="form_row clearfix">
                            <label for="contact-us-subject">
                                <span class="hm_field_name"><?php _e('Subject', 'kyma'); ?></span>
                            </label>
                            <input class="form_fill_fields hm_input_text" type="text" name="contact-us-subject"
                                   id="contact-us-subject">
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
                        <div class="bordered_content">
                            <iframe id="google_map_url"
                                    src="<?php echo esc_url($kyma_theme_options['google_map_url']); ?>" width="100%"
                                    height="350" frameborder="0" style="border:0"></iframe>
                        </div>
                    </div>
                <?php } ?>
                <!-- End Google Map -->
            </div>
        </div>
    </section>
    <!-- End Contact Us -->

    <section class="content_section">
        <?php //the_content(); ?>
        <div class="content row_spacer no_padding">
            <div class="rows_container clearfix">
                <div class="col-md-12 about-address">
                    <h2 class="title1 title3 contact_title_two upper"><i
                            class="<?php if ($kyma_theme_options['address_info_icon'] != "") echo esc_attr($kyma_theme_options['address_info_icon']); ?>"></i><?php if ($kyma_theme_options['address_info_title'] != "") echo esc_attr($kyma_theme_options['address_info_title']); ?>
                    </h2>
                    <?php if (isset($kyma_theme_options['contact_info'][0]) && $kyma_theme_options['contact_info'][0] != "") {
                        foreach ($kyma_theme_options['contact_info'] as $address) {
                            ?>
                            <div class="contact_details_row clearfix contact_details_row_two">
                            <span class="icon">
							<i class="<?php echo esc_attr($address['subtitle']); ?>"></i>
						</span>

                            <div class="c_con">
                                <span class="c_title"><?php echo esc_attr($address['title']); ?></span><?php
                                if ($address['description'] != "") {
                                    ?>
                                    <span class="c_detail">
                                    <span class="c_name"><?php _e('Address :', 'kyma'); ?></span>
								<span
                                    class="c_desc"><?php echo wordwrap(esc_attr($address['description']), 45, '<br>'); ?></span>
                                    </span><?php
                                }
                                if ($address['icon'] != "") {
                                    ?>
                                    <span class="c_detail">
                                    <span class="c_name"><?php _e('Phone :', 'kyma'); ?></span>
								<span class="c_desc"><?php echo esc_attr($address['icon']); ?></span>
                                    </span><?php
                                }
                                if ($address['url'] != "") {
                                    ?>
                                    <span class="c_detail">
                                    <span class="c_name"><?php _e('Email :', 'kyma'); ?></span>
								<span class="c_desc"><?php echo esc_attr($address['url']); ?></span>
                                    </span><?php
                                }
                                ?>
                            </div>
                            </div><?php
                        }
                    } else {
                        ?>
                        <div class="contact_details_row clearfix col-md-3">
						<span class="icon">
							<i class="ico-location5"></i>
						</span>

                            <div class="c_con">
                                <span class="c_title"><?php _e('Address', 'kyma'); ?></span>
							<span class="c_detail">
								<span class="c_name"><?php _e('Main Office :', 'kyma'); ?></span>
								<span
                                    class="c_desc"><?php _e('NO.28 - 23 Street Name - City, Country', 'kyma'); ?></span>
							</span>
							<span class="c_detail">
								<span class="c_name"><?php _e('Customer Center :', 'kyma'); ?></span>
								<span
                                    class="c_desc"><?php _e('NO.123 - 45 Street Name - City, Country', 'kyma'); ?></span>
							</span>
                            </div>
                        </div>
                        <div class="contact_details_row clearfix col-md-3">
						<span class="icon">
							<i class="ico-bubble4"></i>
						</span>

                            <div class="c_con">
                                <span class="c_title"><?php _e('Phone Numbers', 'kyma'); ?></span>
							<span class="c_detail">
								<span class="c_name"><?php _e('Main Office :', 'kyma'); ?></span>
								<span class="c_desc"><?php _e('+000 123 456 789', 'kyma'); ?></span>
							</span>
							<span class="c_detail">
								<span class="c_name"><?php _e('Customer Support :', 'kyma'); ?></span>
								<span class="c_desc"><?php _e('+000 456 123 978', 'kyma'); ?></span>
							</span>
							<span class="c_detail">
								<span class="c_name"><?php _e('Sales :', 'kyma'); ?></span>
								<span class="c_desc"><?php _e('+000 123 456 789', 'kyma'); ?></span>
							</span>
                            </div>
                        </div>

                        <div class="contact_details_row clearfix col-md-3">
						<span class="icon">
							<i class="ico-paperplane"></i>
						</span>

                            <div class="c_con">
                                <span class="c_title"><?php _e('Email Address', 'kyma'); ?></span>
							<span class="c_detail">
								<span class="c_name"><?php _e('Customer support :', 'kyma'); ?></span>
								<span class="c_desc"><?php _e('info@mail.com', 'kyma'); ?></span>
							</span>
							<span class="c_detail">
								<span class="c_name"><?php _e('Technical support :', 'kyma'); ?></span>
								<span class="c_desc"><?php _e('support@mail.com', 'kyma'); ?></span>
							</span>
                            </div>
                        </div>

                        <div class="contact_details_row clearfix col-md-3">
                        <span class="icon">
							<i class="ico-pen2"></i>
						</span>

                        <div class="c_con">
                            <span class="c_title"><?php _e('Other Datails', 'kyma'); ?></span>
							<span class="c_detail">
								<span class="c_name"><?php _e('Site Name :', 'kyma'); ?></span>
								<span class="c_desc"><?php _e('www.webhuntinfotech.com', 'kyma'); ?></span>
							</span>
                        </div>
                        </div><?php
                    }
                    ?>
                </div>
                <!-- Grid -->
            </div>
        </div>
    </section>
<?php get_footer(); ?>