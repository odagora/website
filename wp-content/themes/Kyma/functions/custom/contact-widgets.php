<?php
add_action('widgets_init', 'kyma_footer_widget_contact');
function kyma_footer_widget_contact()
{
    return register_widget('kyma_footer_contact_widget');
}

class kyma_footer_contact_widget extends WP_Widget
{

    function __construct()
    {
        parent::__construct(
            'kyma_footer_contact_widget', // Base ID
            __('Kyma Footer Contact', 'kyma'), // Name
            array('description' => __('Your contact details', 'kyma'),) // Args
        );
    }

    public function widget($args, $instance)
    {
        $title = !empty($instance['title']) ? apply_filters('widget_title', $instance['title']) : 'Contact Us';
        $Contact_address = !empty($instance['Contact_address']) ? apply_filters('widget_title', $instance['Contact_address']) : '4031 Linda Lane
								Santa Monica, CA 90403';
        $Contact_phone_number = !empty($instance['Contact_phone_number']) ? apply_filters('widget_title', $instance['Contact_phone_number']) : '0664-3225569';
        $website_add = !empty($instance['website_add']) ? apply_filters('widget_title', $instance['website_add']) : 'www.example.org';
        $Contact_email_address = !empty($instance['Contact_email_address']) ? apply_filters('widget_title', $instance['Contact_email_address']) : 'youremail@gmail.com';

        echo $args['before_widget'];
        if (!empty($title))
            echo $args['before_title'] . $title . $args['after_title'];

        ?>
        <address>
            <p><?php if ($Contact_address) { ?>
				<i class="fa fa-map-marker"></i><a href="https://www.google.com/maps/place/Cra.+22+%2376-57,+Bogot%C3%A1,+Colombia/@4.6660696,-74.0653563,17z/data=!3m1!4b1!4m5!3m4!1s0x8e3f9a5870e9d397:0x5c15f49ec4807d29!8m2!3d4.6660696!4d-74.0631676" target="_blank"> 
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
                } ?></p>
            <p><?php if ($Contact_email_address) { ?><i class="fa fa-envelope"></i> <a href="mailto:<?php if ($Contact_email_address) {
                    echo sanitize_email($Contact_email_address);
                } else {
                    echo _('mail@me.com', 'kyma');
                } ?>">
                <?php echo sanitize_email($Contact_email_address);
                    } else { ?><i class="fa fa-envelope"></i>
                <?php echo _('myemail@gmail.com', 'kyma');
				} ?></a></p>
        </address>
        <?php
        /*Service Hours*/

        echo "<h6 class='footer_title'>Horario de Atención</h6>
            <ul>
                <li class='page_item'>Lunes a Viernes: 8:00 a.m. a 5:15 p.m.</li>
                <li class='page_item'>Sábado: 8:00 a.m. a 2:00 p.m.</li>
            </ul>
                    ";
        echo $args['after_widget'];

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
        return $instance;
    }
}

?>