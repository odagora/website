<?php
add_action('admin_init', 'kyama_metabox_init');
function kyama_metabox_init()
{
    add_meta_box('kyma_slider', 'Slider Detail', 'kyma_meta_slider', 'kyma_slider', 'normal', 'high');
    add_meta_box('kyma_portfolio', 'Portfolio Detail', 'kyma_meta_portfolio', 'kyma_portfolio', 'normal', 'low');
    add_meta_box('kyma_pricing_plan', 'Pricing Table Feature', 'kyma_meta_pricing_plan', 'kyma_pricing_plan', 'normal', 'low');
    add_meta_box('kyma_pricing_info', 'Pricing Plan General Info', 'kyma_meta_pricing_plan_info', 'kyma_pricing_plan', 'normal', 'high');
    add_meta_box('kyma_portfolio_gallery', 'Portfolio Gallery', 'kyma_meta_image_gallery', 'kyma_portfolio', 'side', 'low', array('field_name' => 'kyma_portfolio_gallery', 'link_title' => __('Add images to portfolio gallery', 'kyma')));
    add_meta_box('kyma_portfolio_desc', 'Short Description', 'kyma_meta_portfolio_desc', 'kyma_portfolio', 'normal', 'high');
    add_meta_box('kyma_service', 'Service Detail', 'kyma_meta_service', 'kyma_service', 'normal', 'high');
    add_meta_box('kyma_feature', 'Feature Detail', 'kyma_meta_feature', 'kyma_feature', 'normal', 'high');
    add_meta_box('kyma_testimonial', 'Testimonial Info', 'kyma_meta_testimonial', 'kyma_testimonial', 'normal', 'high');
    add_meta_box('kyma_team', 'Details', 'kyma_meta_team', 'kyma_team', 'normal', 'high');
    add_meta_box('kyma_client', 'Client URL', 'kyma_meta_client', 'kyma_client', 'normal', 'high');
    add_meta_box('post_image_gallery', 'Post Gallery', 'kyma_meta_image_gallery', 'post', 'normal', 'high', array('field_name' => 'kyma_post_gallery', 'link_title' => __('Add images to post gallery', 'kyma')));
    add_meta_box('page_image_gallery', 'Page Gallery', 'kyma_meta_image_gallery', 'page', 'normal', 'high', array('field_name' => 'kyma_page_gallery', 'link_title' => __('Add images to page gallery', 'kyma')));
    add_meta_box('kyma_page', 'Page layout', 'page_layout_meta', 'page', 'normal', 'high');
    add_meta_box('kyma_Post', 'Post layout', 'post_layout_meta', 'post', 'normal', 'high');
    add_meta_box('kyma_video_Post', 'Video Post layout', 'video_post_layout_meta', 'post', 'normal', 'high');
    add_meta_box('kyma_page_header', 'Post Header Background color', 'post_color_header', 'post', 'normal', 'high');
    add_meta_box('about_us_page_description', 'Page Description', 'about_us_page_meta', 'page', 'normal', 'high');
    add_action('save_post', 'kyma_meta_save');
}

function post_color_header()
{
    $post_header_color = sanitize_text_field(get_post_meta(get_the_ID(), 'post_header_color', true));?>
    <script>
        jQuery(document).ready(function ($) {
            jQuery('#colorpicker').hide();
            jQuery('#colorpicker').farbtastic('#color');

            jQuery('#color').click(function () {
                jQuery('#colorpicker').fadeIn();
            });

            jQuery(document).mousedown(function () {
                jQuery('#colorpicker').each(function () {
                    var display = jQuery(this).css('display');
                    if (display == 'block')
                        jQuery(this).fadeOut();
                });
            });
        });
    </script>
    <div class="color-picker" style="position: relative;">
        <label><?php _e('Post Header Background Color', 'kyma'); ?></label>
        <input type="text" name="post_header_color" id="color"
               value="<?php echo $post_header_color != "" ? $post_header_color : "#1ccdca"; ?>"/>

        <div style="position: absolute;" id="colorpicker"></div>
        <span><?php _e('This color will be display in "Masonry Blog Color" Template', 'kyma'); ?></span>
    </div>
<?php
}

function page_layout_meta()
{
    global $post;
    $content_layout = sanitize_text_field(get_post_meta(get_the_ID(), 'content_layout', true));
    if (!$content_layout) {
        $content_layout = "fullwidth";
    }
    ?>
    <input id="radio3" <?php if ($content_layout == "rightsidebar") {
        echo "checked";
    } ?> type="radio" name="content_layout" value="rightsidebar">
    <label for="radio3" <?php if ($content_layout == "rightsidebar") {
        echo "checked";
    } ?> ><img src="<?php echo get_template_directory_uri(); ?>/images/layout/right-sidebar.jpg"></label>
    <input id="radio2" <?php if ($content_layout == "leftsidebar") {
        echo "checked";
    } ?> type="radio" name="content_layout" value="leftsidebar">
    <label for="radio2" <?php if ($content_layout == "leftsidebar") {
        echo "checked";
    } ?> ><img src="<?php echo get_template_directory_uri(); ?>/images/layout/left-sidebar.jpg"></label>
    <input id="radio1"    <?php if ($content_layout == "fullwidth") {
        echo "checked";
    } ?> type="radio" name="content_layout" value="fullwidth">
    <label for="radio1" <?php if ($content_layout == "fullwidth") {
        echo "checked";
    } ?> ><img src="<?php echo get_template_directory_uri(); ?>/images/layout/full-width.jpg"></label>
    </p>
<?php
}

function post_layout_meta()
{
    global $post;
    $content_layout = sanitize_text_field(get_post_meta(get_the_ID(), 'content_layout', true));
    if (!$content_layout) {
        $content_layout = "fullwidth";
    }
    ?>
    <input id="radio3" <?php if ($content_layout == "rightsidebar") {
        echo "checked";
    } ?> type="radio" name="content_layout" value="rightsidebar">
    <label for="radio3" <?php if ($content_layout == "rightsidebar") {
        echo "checked";
    } ?> ><img src="<?php echo get_template_directory_uri(); ?>/images/layout/right-sidebar.jpg"></label>
    <input id="radio2" <?php if ($content_layout == "leftsidebar") {
        echo "checked";
    } ?> type="radio" name="content_layout" value="leftsidebar">
    <label for="radio2" <?php if ($content_layout == "leftsidebar") {
        echo "checked";
    } ?> ><img src="<?php echo get_template_directory_uri(); ?>/images/layout/left-sidebar.jpg"></label>
    <input id="radio1"    <?php if ($content_layout == "fullwidth") {
        echo "checked";
    } ?> type="radio" name="content_layout" value="fullwidth">
    <label for="radio1" <?php if ($content_layout == "fullwidth") {
        echo "checked";
    } ?> ><img src="<?php echo get_template_directory_uri(); ?>/images/layout/full-width.jpg"></label>
    </p>
<?php
}

function video_post_layout_meta()
{
    $video_post_url = esc_url(get_post_meta(get_the_ID(), 'video_post_url', true));
    ?>
    <p><label><?php _e('Add Your Video (youTube, Vimeo) Post URL', 'kyma'); ?></label></p>
    <p><input type="text" name="video_post_url" id="video_post_url" value="<?php echo esc_attr($video_post_url); ?>">
    </p>
<?php
}

function about_us_page_meta()
{
    $about_us_page_description = sanitize_text_field(get_post_meta(get_the_ID(), 'about_us_page_description', true));
    ?>
    <p><label><?php _e('About Us Two and Career Page Description', 'kyma'); ?></label></p>
    <textarea name="about_us_page_description" id="about_us_page_description" rows="4" style="width: 100%"
              placeholder="Here you can add short description on about us two and career page"><?php if (!empty($about_us_page_description)) echo esc_attr($about_us_page_description); ?></textarea>
    <p class="description"><?php _e('This description will work only on About Us Two and Career Page Template', 'kyma'); ?></p>
    </p>
<?php
}

/* Pricing plan */
function kyma_meta_pricing_plan_info()
{
    $kyma_plan_price = get_post_meta(get_the_ID(), 'kyma_plan_price', true);
    $kyma_plan_currency = get_post_meta(get_the_ID(), 'kyma_plan_currency', true);
    $kyma_plan_period = get_post_meta(get_the_ID(), 'kyma_plan_period', true);
    $kyma_active_plan = get_post_meta(get_the_ID(), 'kyma_active_plan', true);
    $kyma_plan_btn_text = get_post_meta(get_the_ID(), 'kyma_plan_btn_text', true);
    $kyma_plan_btn_link = get_post_meta(get_the_ID(), 'kyma_plan_btn_link', true);
    ?>
    <p><label for="kyma_plan_price"><b><?php _e('Plan Price:', 'kyma'); ?></b></label>
        <input type="text" name="kyma_plan_price" id="kyma_plan_price"
               value="<?php echo esc_attr($kyma_plan_price); ?>">
        <label for="c_symbol"><b><?php _e('Currency:', 'kyma'); ?></b>
            <input type="text" value="<?php echo $kyma_plan_currency != "" ? $kyma_plan_currency : ''; ?>"
                   name="kyma_plan_currency" size="6">
        </label>
    </p>
    <p><label for="kyma_plan_period"><b><?php _e('Plan Period:', 'kyma'); ?></b></label></p>
    <p><label for="kyma_monthly_period"><?php _e('Monhtly: ', 'kyma'); ?>
            <input <?php echo $kyma_plan_period == "monthly" ? "checked" : ""; ?> type="radio" name="kyma_plan_period"
                                                                                  id="kyma_monthly_period"
                                                                                  value="monthly"></label>
        <label for="kyma_yearly_period"><?php _e('Yearly: ', 'kyma'); ?>
            <input <?php echo $kyma_plan_period == "yearly" ? "checked" : ""; ?> type="radio" name="kyma_plan_period"
                                                                                 id="kyma_yearly_period" value="yearly"></label>
        <label for="kyma_unlimited_period"><?php _e('Unlimited: ', 'kyma'); ?>
            <input <?php echo $kyma_plan_period == "unlimited" ? "checked" : ""; ?> type="radio" name="kyma_plan_period"
                                                                                    id="kyma_unlimited_period"
                                                                                    value="unlimited"></label>
    </p>
    <p><label for="kyma_active_plan"><b><?php _e('Active Plan', 'kyma'); ?></b></label></p>
    <p><input type="checkbox" name="kyma_active_plan" <?php echo $kyma_active_plan != "" ? 'checked' : ''; ?>
              id="kyma_active_plan" value="active_plan">
        <span
            class="description"><?php _e('Check this checkbox to highlite this plan as active plan.', 'kyma'); ?></span>
    </p>
    <p><label for="kyma_plan_btn_text"><b><?php _e('Order Now Button Text', 'kyma'); ?></b></label></p>
    <p><input type="text" name="kyma_plan_btn_text" id="kyma_plan_btn_text"
              value="<?php echo esc_attr($kyma_plan_btn_text); ?>"></p>
    <p><label for="kyma_plan_btn_link"><b><?php _e('Order Now Button Link', 'kyma'); ?></b></label></p>
    <p><input type="text" name="kyma_plan_btn_link" id="kyma_plan_btn_link"
              value="<?php echo esc_url($kyma_plan_btn_link); ?>"></p>
<?php
}

function kyma_meta_pricing_plan()
{
    ?>
    <style>
        .rwmb-input {
            width: 75%;
            display: inline-block;
            vertical-align: top;
            margin-left: 15%;
        }

        .rwmb-clone {
            min-height: 24px;
            margin-bottom: 5px;
            position: relative;
            clear: both;
        }

        .rwmb-button.remove-clone {
            position: absolute;
            top: 0;
            right: 0;
        }

        .rwmb-button {
            float: right;
        }

        input.kyma_pricing_feature_avail {
            margin-left: -29px;
            position: relative;
            height: 24px;
            width: 24px;
        }

        .rwmb-label {
            width: 24%;
        }

        input[type=checkbox].kyma_pricing_feature_avail:checked:before {
            content: '\f147';
            margin: -4px 0 0 -6px;
            color: #1e8cbe;
            font-size: 32px;
        }
    </style>

    <div class="rwmb-meta-box" data-autosave="false">
        <div class="rwmb-field rwmb-text-wrapper">
            <div class="rwmb-label">
                <label for="kyma_pricing_plan_feature"><?php _e('Plan Features', 'kyma'); ?> </label>
            </div>
            <div class="rwmb-input ui-sortable">
                <?php $plan_feature = unserialize(get_post_meta(get_the_ID(), 'kyma_pricing_plan_feature', true));
                $plan_feature_avail = unserialize(get_post_meta(get_the_ID(), 'kyma_pricing_feature_avail', true));
                if ($plan_feature) {
                    foreach ($plan_feature as $key => $value) {
                        $checked = isset($plan_feature_avail[$key]) ? 'checked' : '';?>
                        <div class="rwmb-clone">
                        <input class="rwmb-text" type="text" name="kyma_pricing_plan_feature[<?php echo $key; ?>]"
                               id="kyma_pricing_plan_feature" value="<?php echo $value; ?>" size="50">
                        <input class="rwmb-checkbox kyma_pricing_feature_avail" type="checkbox"
                               name="kyma_pricing_feature_avail[<?php echo $key; ?>]" <?php echo $checked; ?>
                               id="kyma_pricing_feature_avail">
                        <a href="#" class="rwmb-button button remove-clone">–</a>
                        <a href="#" class="rwmb-clone-icon"><?php echo '&#36'; ?></a>
                        </div><?php
                    }
                } else {
                    ?>
                    <div class="rwmb-clone">
                    <input class="rwmb-text" type="text" name="kyma_pricing_plan_feature[0]"
                           id="kyma_pricing_plan_feature" value="" size="50">
                    <input class="rwmb-checkbox kyma_pricing_feature_avail" type="checkbox"
                           name="kyma_pricing_feature_avail[0]" id="kyma_pricing_feature_avail">
                    <a href="#" class="rwmb-button button remove-clone">–</a>
                    <a href="#" class="rwmb-clone-icon"><?php echo '&#x21c5'; ?></a>
                    </div><?php
                } ?>
                <a href="#" class="rwmb-button button-primary add-clone">+</a>

                <p id="kymapricing_table_feature_description"
                   class="description"><?php _e('If feature is available in this plan Check the checkbox inside text field', 'kyma'); ?> </p>
            </div>
        </div>
    </div>
<?php
}

/*Client URL */
function kyma_meta_client()
{
    $client_button_link = sanitize_text_field(get_post_meta(get_the_ID(), 'client_button_link', true));
    $client_button_target = sanitize_text_field(get_post_meta(get_the_ID(), 'client_button_target', true)); ?>
    <p><input name="client_button_link" id="client_button_link" style="width: 480px" placeholder="Enter the button link"
              type="text"
              value="<?php if (!empty($client_button_link)) echo esc_attr($client_button_link); ?>"> </input></p>
    <p><input type="checkbox" id="client_button_target"
              name="client_button_target" <?php if ($client_button_target) echo "checked"; ?> ><?php _e('Open link in a new window/tab', 'kyma'); ?>
    </p>
<?php
}

/*Slider Meta Fields*/
function kyma_meta_slider()
{
    $slider_subtitle = sanitize_text_field(get_post_meta(get_the_ID(), 'slider_subtitle', true));
    $slider_description = sanitize_text_field(get_post_meta(get_the_ID(), 'slider_description', true));
    $slider_button_text = sanitize_text_field(get_post_meta(get_the_ID(), 'slider_button_text', true));
    $slider_button_link = sanitize_text_field(get_post_meta(get_the_ID(), 'slider_button_link', true));
    $slider_btn_icon = sanitize_text_field(get_post_meta(get_the_ID(), 'slider_btn_icon', true));
    $slider_button_target = sanitize_text_field(get_post_meta(get_the_ID(), 'slider_button_target', true));
    $slide_effect = sanitize_text_field(get_post_meta(get_the_ID(), 'slide_effect', true));
    $easing_effect = sanitize_text_field(get_post_meta(get_the_ID(), 'easing_effect', true));
    $bg_pos_start = sanitize_text_field(get_post_meta(get_the_ID(), 'bg_pos_start', true));
    $bg_pos_end = sanitize_text_field(get_post_meta(get_the_ID(), 'bg_pos_end', true));

    ?>

    <p><label><?php _e('Slider Subtitle', 'kyma'); ?></label></p><p><input type="text" style="width: 480px"
                                                                                      name="slider_subtitle"
                                                                                      placeholder="<?php _e('Enter slider subtitle', 'kyma'); ?>"
                                                                                      value="<?php if (!empty($slider_subtitle)) echo esc_attr($slider_subtitle); ?>">
</p>
    <p><label><?php _e('Slider Description', 'kyma'); ?></label></p><p><input type="text"
                                                                                         style="width: 480px"
                                                                                         name="slider_description"
                                                                                         placeholder="<?php _e('Enter slider description', 'kyma'); ?>"
                                                                                         value="<?php if (!empty($slider_description)) echo esc_attr($slider_description); ?>">
</p>
    <p><label><?php _e('Slide Effect', 'kyma'); ?></label></p>
    <p><select name="slide_effect" id="slide_effect">
            <option <?php if ($slide_effect == "slideup") {
                echo 'selected="selected"';
            } ?> value="slideup"><?php _e('Slide To Top', 'kyma'); ?>
            </option>
            <option <?php if ($slide_effect == "slidedown") {
                echo 'selected="selected"';
            } ?> value="slidedown"><?php _e('Slide To Bottom', 'kyma'); ?>
            </option>
            <option <?php if ($slide_effect == "slideright") {
                echo 'selected="selected"';
            } ?> value="slideright"><?php _e('Slide To Right', 'kyma'); ?>
            </option>
            <option <?php if ($slide_effect == "slideleft") {
                echo 'selected="selected"';
            } ?> value="slideleft"><?php _e('Slide To Left', 'kyma'); ?>
            </option>
            <option <?php if ($slide_effect == "slidehorizontal") {
                echo 'selected="selected"';
            } ?> value="slidehorizontal"><?php _e('Slide Horizontal', 'kyma'); ?>
            </option>
            <option <?php if ($slide_effect == "slidevertical") {
                echo 'selected="selected"';
            } ?> value="slidevertical"><?php _e('Slide Vertical', 'kyma'); ?>
            </option>
            <option <?php if ($slide_effect == "boxslide") {
                echo 'selected="selected"';
            } ?> value="boxslide"><?php _e('Slide Boxes', 'kyma'); ?>
            </option>
            <option <?php if ($slide_effect == "slotslide-horizontal") {
                echo 'selected="selected"';
            } ?> value="slotslide-horizontal"><?php _e('Slide Slots Horizontal', 'kyma'); ?>
            </option>
            <option <?php if ($slide_effect == "slotslide-vertical") {
                echo 'selected="selected"';
            } ?> value="slotslide-vertical"><?php _e('Slide Slots Vertical', 'kyma'); ?>
            </option>
            <option <?php if ($slide_effect == "booxfade") {
                echo 'selected="selected"';
            } ?> value="booxfade"><?php _e('Fade Boxes', 'kyma'); ?>
            </option>
            <option <?php if ($slide_effect == "slotfade-horizontal") {
                echo 'selected="selected"';
            } ?> value="slotfade-horizontal"><?php _e('Fade Slots Horizontal', 'kyma'); ?>
            </option>
            <option <?php if ($slide_effect == "slotfade-vertical") {
                echo 'selected="selected"';
            } ?> value="slotfade-vertical"><?php _e('Fade Slots Vertical', 'kyma'); ?>
            </option>
            <option <?php if ($slide_effect == "fadefromright") {
                echo 'selected="selected"';
            } ?> value='fadefromright'><?php _e('Fade and Slide from Right', 'kyma'); ?>
            </option>
            <option <?php if ($slide_effect == "fadefromleft") {
                echo 'selected="selected"';
            } ?> value='fadefromleft'><?php _e('Fade and Slide from Left', 'kyma'); ?>
            </option>
            <option <?php if ($slide_effect == "fadefromtop") {
                echo 'selected="selected"';
            } ?> value='fadefromtop'><?php _e('Fade and Slide from Top', 'kyma'); ?>
            </option>
            <option <?php if ($slide_effect == "fadefrombottom") {
                echo 'selected="selected"';
            } ?> value='fadefrombottom'><?php _e('Fade and Slide from Bottom', 'kyma'); ?>
            </option>
            <option <?php if ($slide_effect == "fadetobottomfadefromtop") {
                echo 'selected="selected"';
            } ?> value='fadetobottomfadefromtop'><?php _e('Fade To Bottom and Fade From Top', 'kyma'); ?>
            </option>
            <option <?php if ($slide_effect == "parallaxtoright") {
                echo 'selected="selected"';
            } ?> value='parallaxtoright'><?php _e('Parallax to Right', 'kyma'); ?>
            </option>
            <option <?php if ($slide_effect == "fadetoleftfadefromright") {
                echo 'selected="selected"';
            } ?> value='fadetoleftfadefromright'><?php _e('Fade To Left and Fade From Right', 'kyma'); ?>
            </option>
            <option <?php if ($slide_effect == "fadetorightfadefromleft") {
                echo 'selected="selected"';
            } ?> value='fadetorightfadefromleft'><?php _e('Fade To Right and Fade From Left', 'kyma'); ?>
            </option>
            <option <?php if ($slide_effect == "fadetotopfadefrombottom") {
                echo 'selected="selected"';
            } ?> value='fadetotopfadefrombottom'><?php _e('Fade To Top and Fade From Bottom', 'kyma'); ?>
            </option>
            <option <?php if ($slide_effect == "parallaxtoleft") {
                echo 'selected="selected"';
            } ?> value='parallaxtoleft'><?php _e('Parallax to Left', 'kyma'); ?>
            </option>
            <option <?php if ($slide_effect == "parallaxtotop") {
                echo 'selected="selected"';
            } ?> value='parallaxtotop'><?php _e('Parallax to Top', 'kyma'); ?>
            </option>
            <option <?php if ($slide_effect == "parallaxtobottom") {
                echo 'selected="selected"';
            } ?> value='parallaxtobottom'><?php _e('Parallax to Bottom', 'kyma'); ?>
            </option>
            <option <?php if ($slide_effect == "scaledownfromright") {
                echo 'selected="selected"';
            } ?> value='scaledownfromright'><?php _e('Zoom Out and Fade From Right', 'kyma'); ?>
            </option>
            <option <?php if ($slide_effect == "scaledownfromleft") {
                echo 'selected="selected"';
            } ?> value='scaledownfromleft'><?php _e('Zoom Out and Fade From Left', 'kyma'); ?>
            </option>
            <option <?php if ($slide_effect == "scaledownfromtop") {
                echo 'selected="selected"';
            } ?> value='scaledownfromtop'><?php _e('Zoom Out and Fade From Top', 'kyma'); ?>
            </option>
            <option <?php if ($slide_effect == "scaledownfrombottom") {
                echo 'selected="selected"';
            } ?> value='scaledownfrombottom'><?php _e('Zoom Out and Fade From Bottom', 'kyma'); ?>
            </option>
            <option <?php if ($slide_effect == "zoomout") {
                echo 'selected="selected"';
            } ?> value='zoomout'><?php _e('ZoomOut', 'kyma'); ?>
            </option>
            <option <?php if ($slide_effect == "zoomin") {
                echo 'selected="selected"';
            } ?> value='zoomin'><?php _e('ZoomIn', 'kyma'); ?>
            </option>
        </select> <span
            class="notice"><?php _e('These effects will Works with only REVOLUTION slider', 'kyma'); ?></span>
    </p>

    <!-- Easing Effect For Slider */ -->
    <p><label><?php _e('Slide Easing Effect', 'kyma'); ?></label></p>
    <p><select name="easing_effect" id="easing_effect">
            <option <?php if ($easing_effect == "Linear.easeNone") {
                echo 'selected="selected"';
            } ?> value="Linear.easeNone"><?php _e('Linear.easeNone (linear)', 'kyma'); ?>
            </option>
            <option <?php if ($easing_effect == "Power0.easeInOut") {
                echo 'selected="selected"';
            } ?> value="Power0.easeInOut"><?php _e('Power0.easeInOut (linear)', 'kyma'); ?>
            </option>
            <option <?php if ($easing_effect == "Power0.easeOut") {
                echo 'selected="selected"';
            } ?> value="Power0.easeOut"><?php _e('Power0.easeOut (linear)', 'kyma'); ?>
            </option>
            <option <?php if ($easing_effect == "Power1.easeI") {
                echo 'selected="selected"';
            } ?> value="Power1.easeI"><?php _e('Power1.easeI', 'kyma'); ?>
            </option>
            <option <?php if ($easing_effect == "Power1.easeInOut") {
                echo 'selected="selected"';
            } ?> value="Power1.easeInOut"><?php _e('Power1.easeInOut', 'kyma'); ?>
            </option>
            <option <?php if ($easing_effect == "Power1.easeOut") {
                echo 'selected="selected"';
            } ?> value="Power1.easeOut"><?php _e('Power1.easeOut', 'kyma'); ?>
            </option>
            <option <?php if ($easing_effect == "Power2.easeIn") {
                echo 'selected="selected"';
            } ?> value="Power2.easeIn"><?php _e('Power2.easeIn', 'kyma'); ?>
            </option>
            <option <?php if ($easing_effect == "Power2.easeInOut") {
                echo 'selected="selected"';
            } ?> value="Power2.easeInOut"><?php _e('Power2.easeInOut', 'kyma'); ?>
            </option>
            <option <?php if ($easing_effect == "Power2.easeOut") {
                echo 'selected="selected"';
            } ?> value="Power2.easeOut"><?php _e('Power2.easeOut', 'kyma'); ?>
            </option>
            <option <?php if ($easing_effect == "Power3.easeI") {
                echo 'selected="selected"';
            } ?> value="Power3.easeI"><?php _e('Power3.easeI', 'kyma'); ?>
            </option>
            <option <?php if ($easing_effect == "Power3.easeInOut") {
                echo 'selected="selected"';
            } ?> value="Power3.easeInOut"><?php _e('Power3.easeInOut', 'kyma'); ?>
            </option>
            <option <?php if ($easing_effect == "Power3.easeOut") {
                echo 'selected="selected"';
            } ?> value="Power3.easeOut"><?php _e('Power3.easeOut', 'kyma'); ?>
            </option>
            <option <?php if ($easing_effect == "Power4.easeIn") {
                echo 'selected="selected"';
            } ?> value="Power4.easeIn"><?php _e('Power4.easeIn', 'kyma'); ?>
            </option>
            <option <?php if ($easing_effect == "Power4.easeInOut") {
                echo 'selected="selected"';
            } ?> value="Power4.easeInOut"><?php _e('Power4.easeInOut', 'kyma'); ?>
            </option>
            <option <?php if ($easing_effect == "Power4.easeOut") {
                echo 'selected="selected"';
            } ?> value="Power4.easeOut"><?php _e('Power4.easeOut', 'kyma'); ?>
            </option>
            <option <?php if ($easing_effect == "Quad.easeIn") {
                echo 'selected="selected"';
            } ?> value="Quad.easeIn"><?php _e('Quad.easeIn (same as Power1.easeIn)', 'kyma'); ?>
            </option>
            <option <?php if ($easing_effect == "Quad.easeInOut") {
                echo 'selected="selected"';
            } ?> value="Quad.easeInOut"><?php _e('Quad.easeInOut (same as Power1.easeInOut)', 'kyma'); ?>
            </option>
            <option <?php if ($easing_effect == "Quad.easeOut") {
                echo 'selected="selected"';
            } ?> value="Quad.easeOut"><?php _e('Quad.easeOut (same as Power1.easeOut)', 'kyma'); ?>
            </option>
            <option <?php if ($easing_effect == "Cubic.easeIn") {
                echo 'selected="selected"';
            } ?> value="Cubic.easeIn"><?php _e('Cubic.easeIn (same as Power2.easeIn)', 'kyma'); ?>
            </option>
            <option <?php if ($easing_effect == "Cubic.easeInOut") {
                echo 'selected="selected"';
            } ?> value="Cubic.easeInOut"><?php _e('Cubic.easeInOut (same as Power2.easeInOut)', 'kyma'); ?>
            </option>
            <option <?php if ($easing_effect == "Cubic.easeOut") {
                echo 'selected="selected"';
            } ?> value="Cubic.easeOut"><?php _e('Cubic.easeOut (same as Power2.easeOut)', 'kyma'); ?>
            </option>
            <option <?php if ($easing_effect == "Quart.easeIn") {
                echo 'selected="selected"';
            } ?> value="Quart.easeIn"> <?php _e('Quart.easeIn (same as Power3.easeIn)', 'kyma'); ?>
            </option>
            <option <?php if ($easing_effect == "Quart.easeInOut") {
                echo 'selected="selected"';
            } ?> value="Quart.easeInOut"> <?php _e('Quart.easeInOut (same as Power3.easeInOut)', 'kyma'); ?>
            </option>
            <option <?php if ($easing_effect == "Quart.easeOut") {
                echo 'selected="selected"';
            } ?> value="Quart.easeOut"> <?php _e('Quart.easeOut (same as Power3.easeOut)', 'kyma'); ?>
            </option>
            <option <?php if ($easing_effect == "Quint.easeIn") {
                echo 'selected="selected"';
            } ?> value="Quint.easeIn"> <?php _e('Quint.easeIn (same as Power4.easeIn)', 'kyma'); ?>
            </option>
            <option <?php if ($easing_effect == "Quint.easeInOut") {
                echo 'selected="selected"';
            } ?> value="Quint.easeInOut"> <?php _e('Quint.easeInOut (same as Power4.easeInOut)', 'kyma'); ?>
            </option>
            <option <?php if ($easing_effect == "Quint.easeOut") {
                echo 'selected="selected"';
            } ?> value="Quint.easeOut"> <?php _e('Quint.easeOut (same as Power4.easeOut)', 'kyma'); ?>
            </option>
            <option <?php if ($easing_effect == "Strong.easeIn") {
                echo 'selected="selected"';
            } ?> value="Strong.easeIn"> <?php _e('Strong.easeIn (same as Power4.easeIn)', 'kyma'); ?>
            </option>
            <option <?php if ($easing_effect == "Strong.easeInOut") {
                echo 'selected="selected"';
            } ?> value="Strong.easeInOut"> <?php _e('Strong.easeInOut (same as Power4.easeInOut)', 'kyma'); ?>
            </option>
            <option <?php if ($easing_effect == "Strong.easeOut") {
                echo 'selected="selected"';
            } ?> value="Strong.easeOut"> <?php _e('Strong.easeOut (same as Power4.easeOut)', 'kyma'); ?>
            </option>
            <option <?php if ($easing_effect == "Back.easeIn") {
                echo 'selected="selected"';
            } ?> value="Back.easeIn"> <?php _e('Back.easeIn', 'kyma'); ?>
            </option>
            <option <?php if ($easing_effect == "Back.easeInOut") {
                echo 'selected="selected"';
            } ?> value="Back.easeInOut"> <?php _e('Back.easeInOut', 'kyma'); ?>
            </option>
            <option <?php if ($easing_effect == "Back.easeOut") {
                echo 'selected="selected"';
            } ?> value="Back.easeOut"> <?php _e('Back.easeOut', 'kyma'); ?>
            </option>
            <option <?php if ($easing_effect == "Bounce.easeIn") {
                echo 'selected="selected"';
            } ?> value="Bounce.easeIn"> <?php _e('Bounce.easeIn', 'kyma'); ?>
            </option>
            <option <?php if ($easing_effect == "Bounce.easeInOut") {
                echo 'selected="selected"';
            } ?> value="Bounce.easeInOut"> <?php _e('Bounce.easeInOut', 'kyma'); ?>
            </option>
            <option <?php if ($easing_effect == "Bounce.easeOut") {
                echo 'selected="selected"';
            } ?> value="Bounce.easeOut"> <?php _e('Bounce.easeOut', 'kyma'); ?>
            </option>
            <option <?php if ($easing_effect == "Circ.easeIn") {
                echo 'selected="selected"';
            } ?> value="Circ.easeIn"> <?php _e('Circ.easeIn', 'kyma'); ?>
            </option>
            <option <?php if ($easing_effect == "Circ.easeInOut") {
                echo 'selected="selected"';
            } ?> value="Circ.easeInOut"> <?php _e('Circ.easeInOut', 'kyma'); ?>
            </option>
            <option <?php if ($easing_effect == "Circ.easeOut") {
                echo 'selected="selected"';
            } ?> value="Circ.easeOut"> <?php _e('Circ.easeOut', 'kyma'); ?>
            </option>
            <option <?php if ($easing_effect == "Elastic.easeIn") {
                echo 'selected="selected"';
            } ?> value="Elastic.easeIn"> <?php _e('Elastic.easeIn', 'kyma'); ?>
            </option>
            <option <?php if ($easing_effect == "Elastic.easeInOut") {
                echo 'selected="selected"';
            } ?> value="Elastic.easeInOut"> <?php _e('Elastic.easeInOut', 'kyma'); ?>
            </option>
            <option <?php if ($easing_effect == "Elastic.easeOut") {
                echo 'selected="selected"';
            } ?> value="Elastic.easeOut"> <?php _e('Elastic.easeOut', 'kyma'); ?>
            </option>
            <option <?php if ($easing_effect == "Expo.easeIn") {
                echo 'selected="selected"';
            } ?> value="Expo.easeIn"> <?php _e('Expo.easeIn', 'kyma'); ?>
            </option>
            <option <?php if ($easing_effect == "Expo.easeInOut") {
                echo 'selected="selected"';
            } ?> value="Expo.easeInOut"> <?php _e('Expo.easeInOut', 'kyma'); ?>
            </option>
            <option <?php if ($easing_effect == "Expo.easeOut") {
                echo 'selected="selected"';
            } ?> value="Expo.easeOut"> <?php _e('Expo.easeOut', 'kyma'); ?>
            </option>
            <option <?php if ($easing_effect == "Sine.easeIn") {
                echo 'selected="selected"';
            } ?> value="Sine.easeIn"> <?php _e('Sine.easeIn', 'kyma'); ?>
            </option>
            <option <?php if ($easing_effect == "Sine.easeInOut") {
                echo 'selected="selected"';
            } ?> value="Sine.easeInOut"> <?php _e('Sine.easeInOut', 'kyma'); ?>
            </option>
            <option <?php if ($easing_effect == "Sine.easeOut") {
                echo 'selected="selected"';
            } ?> value="Sine.easeOut"> <?php _e('Sine.easeOut', 'kyma'); ?>
            </option>
            <option <?php if ($easing_effect == "SlowMo.ease") {
                echo 'selected="selected"';
            } ?> value="SlowMo.ease"> <?php _e('SlowMo.ease', 'kyma'); ?>
            </option>
        </select>
        <span
            class="notice"><?php _e('These effects will Works with only REVOLUTION slider', 'kyma'); ?></span>
    </p>
    <!--- Bg Pos Start --->
    <p><label><?php _e('Slide Ken burns Effect Start Position', 'kyma'); ?></label></p>
    <p><select name="bg_pos_start" id="bg_pos_start">
            <option <?php if ($bg_pos_start == "left top") {
                echo 'selected="selected"';
            } ?> value="left top"><?php _e('left top', 'kyma'); ?>
            </option>
            <option <?php if ($bg_pos_start == "left center") {
                echo 'selected="selected"';
            } ?> value="left center"><?php _e('left center', 'kyma'); ?>
            </option>
            <option <?php if ($bg_pos_start == "left bottom") {
                echo 'selected="selected"';
            } ?> value="left bottom"><?php _e('left bottom', 'kyma'); ?>
            </option>
            <option <?php if ($bg_pos_start == "center top") {
                echo 'selected="selected"';
            } ?> value="center top"><?php _e('center top', 'kyma'); ?>
            </option>
            <option <?php if ($bg_pos_start == "center center") {
                echo 'selected="selected"';
            } ?> value="center center"><?php _e('center center', 'kyma'); ?>
            </option>
            <option <?php if ($bg_pos_start == "center bottom") {
                echo 'selected="selected"';
            } ?> value="center bottom"><?php _e('center bottom', 'kyma'); ?>
            </option>
            <option <?php if ($bg_pos_start == "right top") {
                echo 'selected="selected"';
            } ?> value="right top"><?php _e('right top', 'kyma'); ?>
            </option>
            <option <?php if ($bg_pos_start == "right center") {
                echo 'selected="selected"';
            } ?> value="right center"><?php _e('right center', 'kyma'); ?>
            </option>
            <option <?php if ($bg_pos_start == "right bottom") {
                echo 'selected="selected"';
            } ?> value="right bottom"><?php _e('right bottom', 'kyma'); ?>
            </option>
        </select>
        <!--- Bg Pos End --->
    <p><label><?php _e('Slide Ken burns Effect End Position', 'kyma'); ?></label></p>
    <p><select name="bg_pos_end" id="bg_pos_end">
            <option <?php if ($bg_pos_end == "right bottom") {
                echo 'selected="selected"';
            } ?> value="right bottom"><?php _e('right bottom', 'kyma'); ?>
            </option>
            <option <?php if ($bg_pos_end == "left top") {
                echo 'selected="selected"';
            } ?> value="left top"><?php _e('left top', 'kyma'); ?>
            </option>
            <option <?php if ($bg_pos_end == "left center") {
                echo 'selected="selected"';
            } ?> value="left center"><?php _e('left center', 'kyma'); ?>
            </option>
            <option <?php if ($bg_pos_end == "left bottom") {
                echo 'selected="selected"';
            } ?> value="left bottom"><?php _e('left bottom', 'kyma'); ?>
            </option>
            <option <?php if ($bg_pos_end == "center top") {
                echo 'selected="selected"';
            } ?> value="center top"><?php _e('center top', 'kyma'); ?>
            </option>
            <option <?php if ($bg_pos_end == "center center") {
                echo 'selected="selected"';
            } ?> value="center center"><?php _e('center center', 'kyma'); ?>
            </option>
            <option <?php if ($bg_pos_end == "center bottom") {
                echo 'selected="selected"';
            } ?> value="center bottom"><?php _e('center bottom', 'kyma'); ?>
            </option>
            <option <?php if ($bg_pos_end == "right top") {
                echo 'selected="selected"';
            } ?> value="right top"><?php _e('right top', 'kyma'); ?>
            </option>
            <option <?php if ($bg_pos_end == "right center") {
                echo 'selected="selected"';
            } ?> value="right center"><?php _e('right center', 'kyma'); ?>
            </option>
        </select>
    <p><h4><?php _e('Slider Button', 'kyma'); ?></h4></p>
    <p><input type="checkbox" id="slider_button_target"
              name="slider_button_target" <?php if ($slider_button_target) echo "checked"; ?> ><?php _e('Open link in a new window/tab', 'kyma'); ?>
    </p>
    <p><input name="slider_button_link" style="width: 480px" placeholder="Enter button link" type="text"
              value="<?php if (!empty($slider_button_link)) echo esc_attr($slider_button_link); ?>"> </input></p>
    <p><input name="slider_button_text" style="width: 480px" placeholder="Enter button text" type="text"
              value="<?php if (!empty($slider_button_text)) echo esc_attr($slider_button_text); ?>"> </input></p>
    <p><input name="slider_btn_icon" style="width: 480px" placeholder="Button icon" type="text"
              value="<?php if (!empty($slider_btn_icon)) echo esc_attr($slider_btn_icon); ?>"> </input></p>
<?php
}

/*Portfolio Meta Fields*/
function kyma_meta_portfolio()
{
    $portfolio_client = sanitize_text_field(get_post_meta(get_the_ID(), 'portfolio_client', true));
    $portfolio_url = sanitize_text_field(get_post_meta(get_the_ID(), 'portfolio_url', true));
    $portfolio_skill = sanitize_text_field(get_post_meta(get_the_ID(), 'portfolio_skill', true));
    $portfolio_button_text = sanitize_text_field(get_post_meta(get_the_ID(), 'portfolio_button_text', true));
    $portfolio_button_link = sanitize_text_field(get_post_meta(get_the_ID(), 'portfolio_button_link', true));
    $portfolio_button_target = sanitize_text_field(get_post_meta(get_the_ID(), 'portfolio_button_target', true));
    $portfolio_button_icon = sanitize_text_field(get_post_meta(get_the_ID(), 'portfolio_button_icon', true));
    ?>
    <p>
        <label><?php _e('Portfolio Client', 'kyma'); ?></label>
    </p>
    <p>
        <input name="portfolio_client"
               id="portfolio_client"
               style="width: 480px"
               placeholder="Enter the Portfolio client"
               type="text"
               value="<?php if (!empty($portfolio_client)) echo esc_attr($portfolio_client); ?>"> </input>
    </p>
    <p>
        <label><?php _e('Portfolio Skill', 'kyma'); ?></label>
    </p>
    <p><input name="portfolio_skill"
              id="portfolio_skill"
              style="width: 480px"
              placeholder="Enter the Portfolio skill"
              type="text"
              value="<?php if (!empty($portfolio_skill)) echo esc_attr($portfolio_skill); ?>"> </input>
    </p>
    <p>
        <label><?php _e('Portfolio URL', 'kyma'); ?></label>
    </p>
    </p>
    <p><h4><?php _e('Portfolio Button', 'kyma'); ?></h4></p>
    <p><input type="checkbox" id="portfolio_button_target"
              name="portfolio_button_target" <?php if ($portfolio_button_target) echo "checked"; ?> ><?php _e('Open link in a new window/tab', 'kyma'); ?>
    </p>
    <p><input name="portfolio_button_text" id="portfolio_button_text" style="width: 480px"
              placeholder="Enter the button text" type="text"
              value="<?php if (!empty($portfolio_button_text)) echo esc_attr($portfolio_button_text); ?>"> </input></p>
    <p><input name="portfolio_button_link" id="portfolio_button_link" style="width: 480px"
              placeholder="Enter the button link" type="text"
              value="<?php if (!empty($portfolio_button_link)) echo esc_attr($portfolio_button_link); ?>"> </input></p>
    <p><input name="portfolio_button_icon" id="portfolio_button_text" style="width: 480px" placeholder="Button icon"
              type="text"
              value="<?php if (!empty($portfolio_button_icon)) echo esc_attr($portfolio_button_icon); ?>"> </input></p>
<?php
}

/* portfolio short description */
function kyma_meta_portfolio_desc()
{
    $portfolio_short_desc = sanitize_text_field(get_post_meta(get_the_ID(), 'portfolio_short_desc', true));
    $portfolio_additional_info = sanitize_text_field(get_post_meta(get_the_ID(), 'portfolio_additional_info', true)); ?>
    <p><label><?php _e('Portfolio Short Description', 'kyma'); ?></label></p><p><textarea
        name="portfolio_short_desc" id="portfolio_short_desc" rows="8" style="width: 480px"
        placeholder="Short description about portfolio"><?php if (!empty($portfolio_short_desc)) echo esc_attr($portfolio_short_desc); ?></textarea>
</p>
    <p><label><?php _e('Portfolio Additional info', 'kyma'); ?></label></p><p><textarea
        name="portfolio_additional_info" id="portfolio_additional_info" style="width: 480px"
        placeholder="Additional Info"><?php if (!empty($portfolio_additional_info)) echo esc_attr($portfolio_additional_info); ?></textarea>
</p>
<?php
}

/******** Kyma meta service ***********/
function kyma_meta_service()
{
    global $post;
    $service_font_awesome_icons = sanitize_text_field(get_post_meta(get_the_ID(), 'service_icon', true));
    $service_description = sanitize_text_field(get_post_meta(get_the_ID(), 'service_description', true));
    $icon_bg_color = sanitize_text_field(get_post_meta(get_the_ID(), 'icon_bg_color', true));
    $icon_bg_color = $icon_bg_color == "" ? "#1ccdca" : $icon_bg_color;
    $service_button_target = sanitize_text_field(get_post_meta(get_the_ID(), 'service_button_target', true));
    $service_button_link = sanitize_text_field(get_post_meta(get_the_ID(), 'service_link', true));
    ?>
    <script>
        jQuery(document).ready(function ($) {
            jQuery('#colorpicker').hide();
            jQuery('#colorpicker').farbtastic('#color');

            jQuery('#color').click(function () {
                jQuery('#colorpicker').fadeIn();
            });

            jQuery(document).mousedown(function () {
                jQuery('#colorpicker').each(function () {
                    var display = jQuery(this).css('display');
                    if (display == 'block')
                        jQuery(this).fadeOut();
                });
            });
        });
    </script>
    <p><label><?php _e('Service Icon', 'kyma'); ?></label></p><p><input name="service_icon" id="service_icon"
                                                                                   style="width: 480px"
                                                                                   placeholder="Enter Service font-awesome icons"
                                                                                   type="text"
                                                                                   value="<?php if (!empty($service_font_awesome_icons)) echo esc_attr($service_font_awesome_icons); ?>">
    <span class="description" style="font-size:14px;"><?php _e('Click here for Service', 'kyma'); ?> <a
            href="http://fortawesome.github.io/Font-Awesome/icons/" style="text-decoration:none;" target="_blank"><?php _e('Font-Awesome icons', 'kyma'); ?></a></span>
</p>
    <div class="color-picker" style="position: relative;">
        <label><?php _e('Icon Background Color', 'kyma'); ?></label>
        <input type="text" name="icon_bg_color" id="color" value="<?php echo $icon_bg_color; ?>"/>

        <div style="position: absolute;" id="colorpicker"></div>
    </div>
    <p><label><?php _e('Service Description', 'kyma'); ?></label></p><p>
    <textarea name="service_description" id="service_description" style="width: 480px; height: 56px; padding: 0px;"
              placeholder="Enter service description here " rows="3"
              cols="10"><?php if (!empty($service_description)) echo esc_textarea($service_description); ?></textarea>
</p>
    <p><input type="checkbox" id="service_button_target"
              name="service_button_target" <?php if ($service_button_target) echo "checked"; ?> ><?php _e('Open link in a new window/tab', 'kyma'); ?>
    </p>
    <p><input name="service_link" id="service_link" style="width: 480px" placeholder="Enter the service link"
              type="text" value="<?php if (!empty($service_button_link)) echo esc_attr($service_button_link); ?>"></p>
<?php
}

/******** Kyma meta Features ***********/
function kyma_meta_feature()
{
    global $post;
    $feature_font_awesome_icons = sanitize_text_field(get_post_meta(get_the_ID(), 'feature_icon', true));
    $feature_description = sanitize_text_field(get_post_meta(get_the_ID(), 'feature_description', true));
    $feature_button_target = sanitize_text_field(get_post_meta(get_the_ID(), 'feature_link_target', true));
    $feature_button_link = sanitize_text_field(get_post_meta(get_the_ID(), 'feature_link', true));
    ?>
    <p><h4></h4></p>
    <p><label><?php _e('Feature Icon', 'kyma'); ?></label></p><p><input name="feature_icon" id="feature_icon"
                                                                                   style="width: 480px"
                                                                                   placeholder="Enter feature font-awesome icons"
                                                                                   type="text"
                                                                                   value="<?php if (!empty($feature_font_awesome_icons)) echo esc_attr($feature_font_awesome_icons); ?>">
    <span style="font-size:14px;" class="description"><?php _e('Click here for Service', 'kyma'); ?> <a
            href="http://fortawesome.github.io/Font-Awesome/icons/" style="text-decoration:none;" target="_blank"><?php _e('Font-Awesome icons', 'kyma'); ?></a></span>
</p>
    <p><label><?php _e('Feature Description', 'kyma'); ?></label></p>
    <p><textarea name="feature_description" id="feature_description" style="width: 480px; height: 56px; padding: 0px;"
                 placeholder="Enter feature description here " rows="3"
                 cols="10"><?php if (!empty($feature_description)) echo esc_textarea($feature_description); ?></textarea>
    </p>
    <p><input type="checkbox" id="feature_link_target"
              name="feature_link_target" <?php if ($feature_button_target) echo "checked"; ?> ><?php _e('Open link in a new window/tab', 'kyma'); ?>
    </p>
    <p><label><?php _e('Feature URL', 'kyma'); ?></label></p><p><input name="feature_link" id="feature_link"
                                                                                  style="width: 480px"
                                                                                  placeholder="Enter the feature link"
                                                                                  type="text"
                                                                                  value="<?php if (!empty($feature_button_link)) echo esc_attr($feature_button_link); ?>">
</p>
<?php
}

/*Testimonial Meta Fields*/
function kyma_meta_testimonial()
{
    global $post;
    $client_designation = sanitize_text_field(get_post_meta(get_the_ID(), 'client_designation', true));
    $client_site_url = sanitize_text_field(get_post_meta(get_the_ID(), 'client_site_url', true));
    ?>
    <p><label><?php _e('Client Designation', 'kyma'); ?></label></p><p><input type="text"
                                                                                         name="client_designation"
                                                                                         id="client_designation"
                                                                                         value="<?php if (!empty($client_designation)) echo esc_attr($client_designation); ?>"
                                                                                         style="width: 480px;"
                                                                                         placeholder="Enter Client Designation">
</p>    <p><h4><?php _e('Client Site URL', 'kyma'); ?></h4></p>
    <p><label><?php _e('Client URL', 'kyma'); ?></label></p><p><input name="client_site_url"
                                                                                 id="client_site_url"
                                                                                 style="width: 480px"
                                                                                 placeholder="Enter Client's Site URL"
                                                                                 type="text"
                                                                                 value="<?php if (!empty($client_site_url)) echo esc_attr($client_site_url); ?>">
</p>
<?php
}

/* Team meta */
function kyma_meta_team()
{
    $member_designation = sanitize_text_field(get_post_meta(get_the_ID(), 'member_designation', true));
    $fb_link = sanitize_text_field(get_post_meta(get_the_ID(), 'fb', true));
    $twitter_link = sanitize_text_field(get_post_meta(get_the_ID(), 'twitter', true));
    $gplus_link = sanitize_text_field(get_post_meta(get_the_ID(), 'gplus', true));
    $linkedIn_link = sanitize_text_field(get_post_meta(get_the_ID(), 'linkedIn', true));

    echo '<p><label>' . __('Member Designation', 'kyma') . '</label></p><p><input type="text" name="member_designation" value="' . $member_designation . '" size="30"><span class="description">' . __('Enter Here Member Desgination', 'kyma') . '</span></p>';
    echo '<p><label><i class="el-facebook"></i>' . __('Facebook Link', 'kyma') . '</label></p><p><input type="text" name="fb" value="' . $fb_link . '" size="30"><span class="description">' . __('Facebook Profile Link', 'kyma') . '</span></p>';
    echo '<p><label>' . __('Twitter Link', 'kyma') . '</label></p><p><input type="text" name="twitter" value="' . $twitter_link . '" size="30"><span class="description">' . __('Twitter Profile Link', 'kyma') . '</span></p>';
    echo '<p><label>' . __('Google+ Link', 'kyma') . '</label></p><p><input type="text" name="gplus" value="' . $gplus_link . '" size="30"><span class="description">' . __('Google+ Profile Link', 'kyma') . '</span></p>';
    echo '<p><label>' . __('LinkedIn Link', 'kyma') . '</label></p><p><input type="text" name="linkedIn" value="' . $linkedIn_link . '" size="30"><span class="description">' . __('LinkedIn Profile Link', 'kyma') . '</span></p>';
}

function kyma_meta_image_gallery($post, $args)
{
    ?>
    <style>
    #kyma_portfolio_gallery .inside {
        margin: 0;
        padding: 0
    }

    .inside .add_product_images {
        padding: 0 12px 12px
    }

    #product_images_container {
        padding: 0 0 0 9px
    }

    #product_images_container ul {
        margin: 0;
        padding: 0
    }

    #product_images_container ul:after, #product_images_container ul:before {
        content: " ";
        display: table
    }

    #product_images_container ul:after {
        clear: both
    }

    #product_images_container ul li.add, #product_images_container ul li.image, #product_images_container ul li.wc-metabox-sortable-placeholder {
        width: 80px;
        float: left;
        cursor: move;
        border: 1px solid #d5d5d5;
        margin: 9px 9px 0 0;
        background: #f7f7f7;
        border-radius: 2px;
        position: relative;
        -webkit-box-sizing: border-box;
        -moz-box-sizing: border-box;
        box-sizing: border-box
    }

    #product_images_container ul li.add img, #product_images_container ul li.image img, #product_images_container ul li.wc-metabox-sortable-placeholder img {
        width: 100%;
        height: auto;
        display: block
    }

    #product_images_container ul li.wc-metabox-sortable-placeholder {
        border: 3px dashed #ddd;
        position: relative
    }

    #product_images_container ul li.wc-metabox-sortable-placeholder:after {
        font-family: WooCommerce;
        speak: none;
        font-weight: 400;
        font-variant: normal;
        text-transform: none;
        -webkit-font-smoothing: antialiased;
        margin: 0;
        text-indent: 0;
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        text-align: center;
        content: "";
        font-size: 2.618em;
        line-height: 72px;
        color: #ddd
    }

    #product_images_container ul ul.actions {
        position: absolute;
        top: -8px;
        right: -8px;
        padding: 2px;
        display: none
    }

    #product_images_container ul ul.actions li {
        float: right;
        margin: 0 0 0 2px
    }

    #product_images_container ul ul.actions li a {
        width: 1em;
        margin: 0;
        height: 0;
        display: block;
        overflow: hidden
    }

    #product_images_container ul ul.actions li a.tips {
        cursor: pointer
    }

    #product_images_container ul ul.actions li a.view {
        display: block;
        text-indent: -9999px;
        position: relative;
        height: 1em;
        width: 1em;
        font-size: 1.4em
    }

    #product_images_container ul ul.actions li a.view:before {
        font-family: WooCommerce;
        speak: none;
        font-weight: 400;
        font-variant: normal;
        text-transform: none;
        line-height: 1;
        -webkit-font-smoothing: antialiased;
        margin: 0;
        text-indent: 0;
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        text-align: center;
        content: "";
        background-color: #000;
        color: #fff
    }

    #product_images_container ul ul.actions li a.delete {
        display: block;
        text-indent: -9999px;
        position: relative;
        height: 1em;
        width: 1em;
        font-size: 1.4em
    }

    #product_images_container ul ul.actions li a.delete:before {
        font-family: WooCommerce;
        speak: none;
        font-weight: 400;
        font-variant: normal;
        text-transform: none;
        line-height: 1;
        -webkit-font-smoothing: antialiased;
        margin: 0;
        text-indent: 0;
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        text-align: center;
        content: "";
        color: #fff;
        background-color: #000;
        border-radius: 100%;
        box-shadow: 0 1px 2px rgba(0, 0, 0, .2)
    }

    #product_images_container ul ul.actions li a.delete:hover before {
        background-color: #a00
    }

    #product_images_container ul li:hover ul.actions {
        display: block
    }

    #woocommerce-product-data h3.hndle {
        padding: 10px
    }

    #woocommerce-product-data h3.hndle span {
        display: block;
        vertical-align: middle;
        line-height: 24px
    }

    #woocommerce-product-data h3.hndle span span {
        display: inline;
        line-height: inherit;
        vertical-align: baseline
    }

    #woocommerce-product-data h3.hndle label {
        padding-right: 1em;
        font-size: 12px;
        vertical-align: baseline
    }

    #woocommerce-product-data h3.hndle label:first-child {
        margin-right: 1em;
        border-right: 1px solid #dfdfdf
    }

    #woocommerce-product-data h3.hndle input, #woocommerce-product-data h3.hndle select {
        margin: -3px 0 0 .5em;
        vertical-align: middle
    }

    #woocommerce-product-data > .handlediv {
        margin-top: 4px
    }

    #woocommerce-product-data .wrap {
        margin: 0
    }
    </style>
    <div id="product_images_container">
        <ul class="product_images">
            <?php
            if (metadata_exists('post', $post->ID, '_' . $args['args']['field_name'])) {
                $product_image_gallery = get_post_meta($post->ID, '_' . $args['args']['field_name'], true);
            } else {
                // Backwards compat
                $attachment_ids = get_posts('post_parent=' . $post->ID . '&numberposts=-1&post_type=attachment&orderby=menu_order&order=ASC&post_mime_type=image&fields=ids');
                $attachment_ids = array_diff($attachment_ids, array(get_post_thumbnail_id()));
                $product_image_gallery = implode(',', $attachment_ids);
            }

            $attachments = array_filter(explode(',', $product_image_gallery));

            if ($attachments) {
                foreach ($attachments as $attachment_id) {
                    echo '<li class="image" data-attachment_id="' . esc_attr($attachment_id) . '">
								' . wp_get_attachment_image($attachment_id, 'thumbnail') . '
								<ul class="actions">
									<li><a href="#" class="delete tips" data-tip="' . __('Delete image', 'kyma') . '">' . __('Delete', 'kyma') . '</a></li>
								</ul>
							</li>';
                }
            }
            ?>
        </ul>

        <input type="hidden" class="multiuploader" id="<?php echo esc_attr($args['args']['field_name']); ?>"
               name="<?php echo esc_attr($args['args']['field_name']); ?>"
               value="<?php echo esc_attr($product_image_gallery); ?>"/>

    </div>
    <p class="add_product_images hide-if-no-js">
        <a href="#" data-choose="<?php _e('Add Images to Gallery', 'kyma'); ?>"
           data-update="<?php _e('Add to gallery', 'kyma'); ?>"
           data-delete="<?php _e('Delete image', 'kyma'); ?>"
           data-text="<?php _e('Delete', 'kyma'); ?>"><?php echo esc_attr($args['args']['link_title']); ?></a>
    </p>
<?php
}

function kyma_meta_save($post_id)
{
    if ((defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) || (defined('DOING_AJAX') && DOING_AJAX) || isset($_REQUEST['bulk_edit']))
        return;

    if (!current_user_can('edit_page', $post_id)) {
        return;
    }
    if (isset($_POST['post_ID'])) {
        $post_ID = $_POST['post_ID'];
        $post_type = get_post_type($post_ID);

        if ($post_type == 'kyma_slider') {
            update_post_meta($post_ID, 'slider_subtitle', sanitize_text_field($_POST['slider_subtitle']));
            update_post_meta($post_ID, 'slider_description', sanitize_text_field($_POST['slider_description']));
            update_post_meta($post_ID, 'slider_button_text', sanitize_text_field($_POST['slider_button_text']));
            update_post_meta($post_ID, 'slider_button_link', sanitize_text_field($_POST['slider_button_link']));
            update_post_meta($post_ID, 'slider_btn_icon', sanitize_text_field($_POST['slider_btn_icon']));
            update_post_meta($post_ID, 'slider_button_target', sanitize_text_field($_POST['slider_button_target']));
            update_post_meta($post_ID, 'slide_effect', sanitize_text_field($_POST['slide_effect']));
            update_post_meta($post_ID, 'easing_effect', sanitize_text_field($_POST['easing_effect']));
            update_post_meta($post_ID, 'bg_pos_start', sanitize_text_field($_POST['bg_pos_start']));
            update_post_meta($post_ID, 'bg_pos_end', sanitize_text_field($_POST['bg_pos_end']));
        } else if ($post_type == 'kyma_portfolio') {
            update_post_meta($post_ID, 'portfolio_short_desc', sanitize_text_field($_POST['portfolio_short_desc']));
            update_post_meta($post_ID, 'portfolio_additional_info', sanitize_text_field($_POST['portfolio_additional_info']));
            update_post_meta($post_ID, 'portfolio_skill', sanitize_text_field($_POST['portfolio_skill']));
            update_post_meta($post_ID, 'portfolio_client', sanitize_text_field($_POST['portfolio_client']));
            update_post_meta($post_ID, 'portfolio_url', sanitize_text_field($_POST['portfolio_url']));
            update_post_meta($post_ID, 'portfolio_button_text', sanitize_text_field($_POST['portfolio_button_text']));
            update_post_meta($post_ID, 'portfolio_button_link', sanitize_text_field($_POST['portfolio_button_link']));
            update_post_meta($post_ID, 'portfolio_button_target', sanitize_text_field($_POST['portfolio_button_target']));
            update_post_meta($post_ID, 'portfolio_button_icon', sanitize_text_field($_POST['portfolio_button_icon']));
            $attachment_ids = isset($_POST['kyma_portfolio_gallery']) ? array_filter(explode(',', $_POST['kyma_portfolio_gallery'])) : array();
            update_post_meta($post_id, '_kyma_portfolio_gallery', implode(',', $attachment_ids));
        } else if ($post_type == 'kyma_service') {
            update_post_meta($post_ID, 'service_icon', sanitize_text_field($_POST['service_icon']));
            update_post_meta($post_ID, 'service_description', sanitize_text_field($_POST['service_description']));
            update_post_meta($post_ID, 'icon_bg_color', sanitize_text_field($_POST['icon_bg_color']));
            update_post_meta($post_ID, 'service_link', sanitize_text_field($_POST['service_link']));
            update_post_meta($post_ID, 'service_button_target', sanitize_text_field($_POST['service_button_target']));
        } else if ($post_type == 'kyma_feature') {
            update_post_meta($post_ID, 'feature_icon', sanitize_text_field($_POST['feature_icon']));
            update_post_meta($post_ID, 'feature_description', sanitize_text_field($_POST['feature_description']));
            update_post_meta($post_ID, 'feature_link', sanitize_text_field($_POST['feature_link']));
            update_post_meta($post_ID, 'feature_link_target', sanitize_text_field($_POST['feature_link_target']));
        } else if ($post_type == 'kyma_testimonial') {
            update_post_meta($post_ID, 'client_designation', sanitize_text_field($_POST['client_designation']));
            update_post_meta($post_ID, 'client_site_url', sanitize_text_field($_POST['client_site_url']));
        } else if ($post_type == 'kyma_client') {
            update_post_meta($post_ID, 'client_button_link', sanitize_text_field($_POST['client_button_link']));
            update_post_meta($post_ID, 'client_button_target', sanitize_text_field($_POST['client_button_target']));
        } elseif ($post_type == 'kyma_team') {
            update_post_meta($post_ID, "member_designation", sanitize_text_field($_POST["member_designation"]));
            update_post_meta($post_ID, "fb", sanitize_text_field($_POST["fb"]));
            update_post_meta($post_ID, "twitter", sanitize_text_field($_POST["twitter"]));
            update_post_meta($post_ID, "gplus", sanitize_text_field($_POST["gplus"]));
            update_post_meta($post_ID, "linkedIn", sanitize_text_field($_POST["linkedIn"]));
        } elseif ($post_type == 'kyma_pricing_plan') {
            update_post_meta($post_ID, "kyma_plan_price", sanitize_text_field($_POST["kyma_plan_price"]));
            update_post_meta($post_ID, "kyma_plan_currency", sanitize_text_field($_POST["kyma_plan_currency"]));
            update_post_meta($post_ID, "kyma_plan_period", sanitize_text_field($_POST["kyma_plan_period"]));
            update_post_meta($post_ID, "kyma_active_plan", $_POST["kyma_active_plan"]);
            update_post_meta($post_ID, "kyma_plan_btn_text", sanitize_text_field($_POST["kyma_plan_btn_text"]));
            update_post_meta($post_ID, "kyma_plan_btn_link", esc_url($_POST["kyma_plan_btn_link"]));
            $plan_feature = serialize($_POST["kyma_pricing_plan_feature"]);
            $avail = serialize($_POST["kyma_pricing_feature_avail"]);
            update_post_meta($post_ID, "kyma_pricing_plan_feature", $plan_feature);
            update_post_meta($post_ID, "kyma_pricing_feature_avail", $avail);
        } elseif ($post_type == 'post') {
            $attachment_ids = isset($_POST['kyma_post_gallery']) ? array_filter(explode(',', $_POST['kyma_post_gallery'])) : array();
            update_post_meta($post_id, '_kyma_post_gallery', implode(',', $attachment_ids));
            update_post_meta($post_id, 'post_header_color', sanitize_text_field($_POST["post_header_color"]));
            update_post_meta($post_id, 'content_layout', sanitize_text_field($_POST["content_layout"]));
            update_post_meta($post_id, 'video_post_url', esc_url($_POST["video_post_url"]));
        } elseif ($post_type == 'page') {
            $attachment_ids = isset($_POST['kyma_page_gallery']) ? array_filter(explode(',', $_POST['kyma_page_gallery'])) : array();
            update_post_meta($post_id, '_kyma_page_gallery', implode(',', $attachment_ids));
            update_post_meta($post_id, 'about_us_page_description', sanitize_text_field($_POST["about_us_page_description"]));
            update_post_meta($post_id, 'content_layout', sanitize_text_field($_POST["content_layout"]));
        }
    }
}