<?php
add_action('widgets_init', 'kyma_flicker_widget');
function kyma_flicker_widget()
{
    return register_widget('kyma_footer_flicker_widget');
}

class kyma_footer_flicker_widget extends WP_Widget
{
    function __construct()
    {
        parent::__construct(
            'kyma_footer_flicker_widget', // Base
            __('Kyma Flicker widget', 'kyma'), // Name
            array('description' => __('Displays your latest Flicker photos.', 'kyma'),) // Args
        );
    }

    public function widget($args, $instance)
    {
        $title = !empty($instance['title']) ? apply_filters('widget_title', $instance['title']) : 'Fliker Gallery';

        $number_of_image = !empty($instance['title']) ? apply_filters('widget_title', $instance['number_of_image']) : 9;

        $flicker_id = !empty($instance['flicker_id']) ? apply_filters('widget_title', $instance['flicker_id']) : '97210399@N05';

        echo $args['before_widget'];
        if (!empty($title))
            echo $args['before_title'] . $title . $args['after_title']; ?>
        <div class="flickr-container">
            <script type="text/javascript"
                    src="http://www.flickr.com/badge_code_v2.gne?count=<?php echo $number_of_image; ?>&amp;display=latest&amp;size=s&amp;layout=x&amp;source=user&amp;user=<?php echo $flicker_id; ?>"></script>
        </div>
        <?php
        echo $args['after_widget'];
    }

    public function form($instance)
    {
        if (isset($instance['title']) && isset($instance['number_of_image']) && isset($instance['flicker_id'])) {
            $title = $instance['title'];
            $number_of_image = $instance['number_of_image'];
            $flicker_id = $instance['flicker_id'];
        } else {
            $title = __('Fliker PhotoStream', 'kyma');
            $number_of_image = 6;
            $flicker_id = "";
        }
        ?>
        <p>
            <label
                for="<?php echo esc_attr($this->get_field_id('title')); ?>"><?php _e('Title:', 'kyma'); ?></label>
            <input class="widefat" id="<?php echo esc_attr($this->get_field_id('title')); ?>"
                   name="<?php echo esc_attr($this->get_field_name('title')); ?>" type="text"
                   value="<?php echo esc_attr($title); ?>"/>
        </p>
        <p>
            <label
                for="<?php echo $this->get_field_id('flicker_id'); ?>"><?php _e('Flickr ID (use <a target="_blank" href="http://www.idgettr.com">idGettr</a>):', ''); ?>
                <input class="widefat" id="<?php echo esc_attr($this->get_field_id('flicker_id')); ?>"
                       name="<?php echo esc_attr($this->get_field_name('flicker_id')); ?>" type="text"
                       value="<?php echo esc_attr($flicker_id); ?>"/>
        </p>
        <p>
            <label
                for="<?php echo esc_attr($this->get_field_id('number_of_image')); ?>"><?php _e('Number of images to display:', 'kyma'); ?></label>
            <input size="3" maxlength="2" id="<?php echo intval($this->get_field_id('number_of_image')); ?>"
                   name="<?php echo esc_attr($this->get_field_name('number_of_image')); ?>" type="text"
                   value="<?php echo intval($number_of_image); ?>"/>
        </p>
    <?php
    }

    public function update($new_instance, $old_instance)
    {
        $instance = array();
        $instance['title'] = (!empty($new_instance['title'])) ? strip_tags($new_instance['title']) : '';
        $instance['number_of_image'] = (!empty($new_instance['number_of_image'])) ? strip_tags($new_instance['number_of_image']) : '';
        $instance['flicker_id'] = (!empty($new_instance['flicker_id'])) ? strip_tags($new_instance['flicker_id']) : '';
        return $instance;
    }
}

?>