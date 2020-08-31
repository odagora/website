<?php
add_action('widgets_init', 'kyma_footer_widget_contact_modified', 12);
function kyma_footer_widget_contact_modified()
{
    return register_widget('kyma_footer_contact_widget_modified');
}

class kyma_footer_contact_widget_modified extends WP_Widget
{
    public $kyma_theme_options;

    function __construct()
    {
        parent::__construct(
            'kyma_footer_contact_widget_modified', // Base ID
            __('Kyma Footer Contact', 'kyma'), // Name
            array('description' => __('Your contact details', 'kyma'),) // Args
        );
        $this->kyma_theme_options = kyma_theme_options();
    }

    public function widget($args, $instance)
    {
        $title = !empty($instance['title']) ? apply_filters('widget_title', $instance['title']) : 'Contact Us';
        $Contact_address = !empty($instance['Contact_address']) ? apply_filters('widget_title', $instance['Contact_address']) : '4031 Linda Lane
								Santa Monica, CA 90403';
        $Contact_phone_number = !empty($instance['Contact_phone_number']) ? apply_filters('widget_title', $instance['Contact_phone_number']) : '0664-3225569';
        $website_add = !empty($instance['website_add']) ? apply_filters('widget_title', $instance['website_add']) : 'www.example.org';
        $Contact_email_address = !empty($instance['Contact_email_address']) ? apply_filters('widget_title', $instance['Contact_email_address']) : 'youremail@gmail.com';
        $title1 = !empty($instance['title1']) ? apply_filters('widget_title', $instance['title1']) : 'Availability';
        $time_mf = !empty($instance['time_mf']) ? apply_filters('widget_title', $instance['time_mf']) : '8:00AM - 5PM';
        $time_w = !empty($instance['time_w']) ? apply_filters('widget_title', $instance['time_w']) : '8:00AM - 2PM';

        echo $args['before_widget'];
        if (!empty($title))
            echo $args['before_title'] . $title . $args['after_title'];

        ?>
        <address>
            <p><?php if ($Contact_address) { ?>
				<i class="fa fa-map-marker"></i><a href="https://bit.ly/2Xwxj2v" target="_blank"> 
                <?php echo esc_attr($Contact_address);
                } else { ?> <i class="fa fa-map-marker"></i>
                <?php echo _('25, Lorem Lis Street', 'kyma');
                } ?></a></p>
            <p><?php if ($Contact_phone_number) { ?><i class="fa fa-phone"></i> <a href="tel:+5712117943">
                <?php echo esc_attr($Contact_phone_number);
                } else { ?><i class="fa fa-phone"></i>
				<?php echo _('987-654-321', 'kyma');
				} ?></a></p>
            <p><?php if ($website_add) { ?> <i class="fa fa-mobile"></i> <a href="tel:+573184559286">
                <?php echo esc_attr($website_add);
                } else { ?> <i class="fa fa-mobile"></i>
                <?php echo esc_attr('http://www.webhuntinfotech.com');
                } ?></a></p>
            <p><?php if ($Contact_email_address) { ?><i class="fa fa-envelope"></i><a href="<?php echo esc_url(home_url('/'));?>contactanos/">
                <?php echo esc_attr($Contact_email_address);
                    } else { ?><i class="fa fa-envelope"></i>
                <?php echo _('myemail@gmail.com', 'kyma');
				} ?></a></p>
        </address>
        <?php
        /*Service Hours*/
        global $wp_locale;
        if (!empty($title1))
        echo $args['before_title'] . $title1 . $args['after_title'];
        ?>
            <ul>
                <li><?php if ($time_mf) {
                        if ($this->kyma_theme_options['enable_covid19_status'] == 1) {
                            echo _e(ucfirst($wp_locale->get_weekday(1)) . ' a ' . ucfirst($wp_locale->get_weekday(4)).': ', 'kyma-child') . esc_attr($time_mf);
                        }else {
                            echo _e(ucfirst($wp_locale->get_weekday(1)) . ' a ' . ucfirst($wp_locale->get_weekday(5)).': ', 'kyma-child') . esc_attr($time_mf);
                        }
                    } else {
                        echo _e('Monday to Friday: ', 'kyma-child') . '8AM - 5PM';
                    }?>
                </li>
                <li><?php if ($time_w) {
                    echo _e(ucfirst($wp_locale->get_weekday(6)).': ', 'kyma-child') . esc_attr($time_w);
                    } else {
                    echo _e(ucfirst($wp_locale->get_weekday(6)).': ', 'kyma-child') . '8AM - 2PM';
                    }?>
                </li>
            </ul>

        <?php echo $args['after_widget'];

    }
    public function form($instance)
    {
        if (isset($instance['title'])) {
            $title = $instance['title'];
        } else {
            $title = __('Contact Info', 'kyma');
        }

        if (isset($instance['Contact_phone_number'])) {
            $Contact_phone_number = $instance['Contact_phone_number'];
        } else {
            $Contact_phone_number = __('0764-989879', 'kyma');
        }

        if (isset($instance['Contact_email_address'])) {
            $Contact_email_address = $instance['Contact_email_address'];
        } else {
            $Contact_email_address = __('contact@me.com ', 'kyma');
        }

        if (isset($instance['website_add'])) {
            $website_add = $instance['website_add'];
        } else {
            $website_add = __('http://www.webhuntinfotech.com', 'kyma');
        }

        if (isset($instance['Contact_address'])) {
            $Contact_address = $instance['Contact_address'];
        } else {
            $Contact_address = __('NewYork', 'kyma');
        }

        if (isset($instance['title1'])) {
            $title1 = $instance['title1'];
        } else {
            $title1 = __('Availability', 'kyma');
        }

        if (isset($instance['time_mf'])) {
            $time_mf = $instance['time_mf'];
        } else {
            $time_mf = __('8:00AM - 5PM', 'kyma');
        }

        if (isset($instance['time_w'])) {
            $time_w = $instance['time_w'];
        } else {
            $time_w = __('8:00AM - 2PM', 'kyma');
        }

        ?>
        <p>
            <label for="<?php echo $this->get_field_id('title'); ?>"><?php _e('Title:', 'kyma'); ?></label>
            <input class="widefat" id="<?php echo esc_attr($this->get_field_id('title')); ?>"
                   name="<?php echo esc_attr($this->get_field_name('title')); ?>" type="text"
                   value="<?php echo esc_attr($title); ?>"/>
        </p>
        <p><label
                for="<?php echo esc_attr($this->get_field_id('Contact_phone_number')); ?>"><?php _e('Contact phone number:', 'kyma'); ?></label>
            <input class="widefat" id="<?php echo esc_attr($this->get_field_id('Contact_phone_number')); ?>"
                   name="<?php echo esc_attr($this->get_field_name('Contact_phone_number')); ?>" type="text"
                   value="<?php echo esc_attr($Contact_phone_number); ?>"/>
        </p>
        <p>
            <label
                for="<?php echo esc_attr($this->get_field_id('Contact_email_address')); ?>"><?php _e('E-mail address:', 'kyma'); ?></label>
            <input class="widefat" id="<?php echo esc_attr($this->get_field_id('Contact_email_address')); ?>"
                   name="<?php echo esc_attr($this->get_field_name('Contact_email_address')); ?>" type="text"
                   value="<?php echo esc_attr($Contact_email_address); ?>"/>
        </p>
        <p><label
                for="<?php echo esc_attr($this->get_field_id('website_add')); ?>"><?php _e('Website :', 'kyma'); ?></label>
            <input class="widefat" id="<?php echo esc_attr($this->get_field_id('website_add')); ?>"
                   name="<?php echo esc_attr($this->get_field_name('website_add')); ?>" type="text"
                   value="<?php echo esc_attr($website_add); ?>"/>
        </p>
        <p>
            <label
                for="<?php echo esc_attr($this->get_field_id('Contact_address')); ?>"><?php _e('Contact address:', 'kyma'); ?></label>
            <input class="widefat" id="<?php echo esc_attr($this->get_field_id('Contact_address')); ?>"
                   name="<?php echo esc_attr($this->get_field_name('Contact_address')); ?>" type="text"
                   value="<?php echo esc_attr($Contact_address); ?>"/>
        </p>
        <p>
            <label
                for="<?php echo esc_attr($this->get_field_id('title1')); ?>"><?php _e('Title1:', 'kyma'); ?></label>
            <input class="widefat" id="<?php echo esc_attr($this->get_field_id('title1')); ?>"
                   name="<?php echo esc_attr($this->get_field_name('title1')); ?>" type="text"
                   value="<?php echo esc_attr($title1); ?>"/>
        </p>
        <p>
            <?php if($this->kyma_theme_options['enable_covid19_status'] == 1) { ?>
            <label
                for="<?php echo esc_attr($this->get_field_id('time_mf')); ?>"><?php _e('Monday - Thursday:', 'kyma'); ?></label>
            <?php } else { ?>
            <label
                for="<?php echo esc_attr($this->get_field_id('time_mf')); ?>"><?php _e('Monday - Friday:', 'kyma'); ?></label>
            <?php } ?>
            <input class="widefat" id="<?php echo esc_attr($this->get_field_id('time_mf')); ?>"
                   name="<?php echo esc_attr($this->get_field_name('time_mf')); ?>" type="text"
                   value="<?php echo esc_attr($time_mf); ?>"/>
        </p>
        <p>
            <label
                for="<?php echo esc_attr($this->get_field_id('time_w')); ?>"><?php _e('Saturday:', 'kyma'); ?></label>
            <input class="widefat" id="<?php echo esc_attr($this->get_field_id('time_w')); ?>"
                   name="<?php echo esc_attr($this->get_field_name('time_w')); ?>" type="text"
                   value="<?php echo esc_attr($time_w); ?>"/>
        </p>

    <?php
    }

    public function update($new_instance, $old_instance)
    {
        $instance = array();
        $instance['title'] = (!empty($new_instance['title'])) ? strip_tags($new_instance['title']) : '';
        $instance['Contact_address'] = (!empty($new_instance['Contact_address'])) ? strip_tags($new_instance['Contact_address']) : '';
        $instance['timings'] = (!empty($new_instance['timings'])) ? strip_tags($new_instance['timings']) : '';
        $instance['website_add'] = (!empty($new_instance['website_add'])) ? strip_tags($new_instance['website_add']) : '';
        $instance['Contact_phone_number'] = (!empty($new_instance['Contact_phone_number'])) ? strip_tags($new_instance['Contact_phone_number']) : '';
        $instance['Contact_email_address'] = (!empty($new_instance['Contact_email_address'])) ? strip_tags($new_instance['Contact_email_address']) : '';
        $instance['title1'] = (!empty($new_instance['title1'])) ? strip_tags($new_instance['title1']) : '';
        $instance['time_mf'] = (!empty($new_instance['time_mf'])) ? strip_tags($new_instance['time_mf']) : '';
        $instance['time_w'] = (!empty($new_instance['time_w'])) ? strip_tags($new_instance['time_w']) : '';
        return $instance;
    }
}

?>