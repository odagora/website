<?php
add_action('widgets_init', 'kyma_recent_posts_widgets');
function kyma_recent_posts_widgets()
{
    register_widget('kyma_footer_recent_posts');
    register_widget('kymaArchieveWidget');
    register_widget('kymaCategoryWidget');
    register_widget('kymaMultiWidget');
}

/**
 * Adds widget for recent Post in footer.
 */
class kyma_footer_recent_posts extends WP_Widget
{
    function __construct()
    {
        parent::__construct(
            'kyma_footer_recent_posts', //ID
            __('Kyma Recent Posts', 'kyma'), // Name
            array('description' => __('Display Recent posts on your sites', 'kyma'),) // Args
        );
    }

    public function widget($args, $instance)
    {
        $title = !empty($instance['title']) ? apply_filters('widget_title', $instance['title']) : 'Receent Posts';
        $number_of_posts = !empty($instance['number_of_posts']) ? apply_filters('widget_title', $instance['number_of_posts']) : 5;
        $rmp_url = !empty($instance['rmp_url']) ? apply_filters('rmp_url', $instance['rmp_url']) : '#';

        echo $args['before_widget'];
        if (!empty($title))
            echo $args['before_title'] . $title . $args['after_title']; ?>
        <?php $loop = new WP_Query(array('post_type' => 'post', 'showposts' => $number_of_posts, 'ignore_sticky_posts' => 1));
        if ($loop->have_posts()) : ?>
            <ul class="recent_posts_list">
            <?php while ($loop->have_posts()) : $loop->the_post(); ?>
                <li class="clearfix">
                    <a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>">
                        <span class="recent_posts_img"><?php the_post_thumbnail('kyma_recent_widget_thumb'); ?></span>
                        <span><?php the_title(); ?></span>
                    </a>
                    <span
                        class="recent_post_detail"><?php echo esc_attr(get_the_date(get_option('date_format'))); ?></span>
                    <span class="recent_post_detail"><?php esc_attr(the_tags('')); ?></span>
                </li>
            <?php endwhile; ?>
            <a href="<?php echo esc_url($rmp_url); ?>" class="arrow_button full_width">
				<span>
					<i class="ico-arrow-forward"></i>
					<span><?php _e('Read More Posts', 'kyma'); ?></span>
					<i class="ico-arrow-forward"></i>
				</span>
            </a>
        <?php endif; ?>
        <?php
        echo $args['after_widget'];
    }

    public function form($instance)
    {
        if (isset($instance['title']) && isset($instance['number_of_posts'])) {
            $title = $instance['title'];
            $number_of_posts = $instance['number_of_posts'];
        } else {
            $title = __('Recent Post', 'kyma');
            $number_of_posts = 4;
        }
        $rmp_url = '';
        if (isset($instance['rmp_url']))
            $rmp_url = $instance['rmp_url'];
        ?>
        <p>
            <label for="<?php echo $this->get_field_id('title'); ?>"><?php _e('Title:', 'kyma'); ?></label>
            <input class="widefat" id="<?php echo esc_attr($this->get_field_id('title')); ?>"
                   name="<?php echo esc_attr($this->get_field_name('title')); ?>" type="text"
                   value="<?php echo esc_attr($title); ?>"/>
        </p>
        <p>
            <label
                for="<?php echo esc_attr($this->get_field_id('number_of_posts')); ?>"><?php _e('Number of pages to show:', 'kyma'); ?></label>
            <input size="3" maxlength="2" id="<?php echo esc_attr($this->get_field_id('number_of_posts')); ?>"
                   name="<?php echo esc_attr($this->get_field_name('number_of_posts')); ?>" type="text"
                   value="<?php echo esc_attr($number_of_posts); ?>"/>
        </p>
        <p>
            <label
                for="<?php echo $this->get_field_id('rmp_url'); ?>"><?php _e('Read More Posts URL:', 'kyma'); ?></label>
            <input class="widefat" id="<?php echo esc_attr($this->get_field_id('rmp_url')); ?>"
                   name="<?php echo esc_attr($this->get_field_name('rmp_url')); ?>" type="text"
                   value="<?php echo $rmp_url != "" ? esc_url($rmp_url) : ''; ?>"/>
        </p>
    <?php
    }

    public function update($new_instance, $old_instance)
    {
        $instance = array();
        $instance['title'] = (!empty($new_instance['title'])) ? strip_tags($new_instance['title']) : '';
        $instance['rmp_url'] = (!empty($new_instance['rmp_url'])) ? strip_tags($new_instance['rmp_url']) : '';
        $instance['number_of_posts'] = (!empty($new_instance['number_of_posts'])) ? strip_tags($new_instance['number_of_posts']) : '';
        return $instance;
    }

}

class kymaArchieveWidget extends WP_Widget
{
    function __construct()
    {
        parent::__construct(
            'kyma_archieves',
            __('Kyma Archieves', 'kyma'),
            array('description' => __('Kyma Archieves Widget', 'kyma'))
        );
    }

    function widget($args, $instance)
    {
        extract($args);
        $title = apply_filters('widget_title', $instance['title']);
        $number = apply_filters('widget_title', $instance['number']);

        if ($title != "") {
            echo $before_title . $title . $after_title;
        } else {
            echo $before_title . 'Archives' . $after_title;
        }
        echo $before_widget; ?>
        <ul class="cat_list_widget"><?php
            $html = wp_get_archives(array(
                'show_post_count' => true,
                'echo' => false,
                'before' => '',
                'limit' => $number
            ));
            // Wrap the post count in a span element
            $html = preg_replace('~(&nbsp;)(\(\d++\))~', '$1<span class="num_posts">$2</span>', $html);
            // Output the result
            echo $html; ?>
        </ul>
        <?php echo $after_widget;
    }

    function update($new_instance, $old_instance)
    {
        $instance = $old_instance;
        $instance['title'] = strip_tags($new_instance['title']);
        $instance['number'] = strip_tags($new_instance['number']);
        return $instance;
    }

    function form($instance)
    {
        if (isset($instance['title'])) {
            $title = esc_attr($instance['title']);
        } else {
            $title = 'Archives';
        }
        if (isset($instance['number'])) {
            $number = esc_attr($instance['number']);
        } else {
            $number = 5;
        }
        ?>
        <p>
            <label for='<?php echo $this->get_field_id('title'); ?>'><?php _e('Title:', 'kyma'); ?></label>
            <input type="text" id='<?php echo $this->get_field_id("title"); ?>'
                   name='<?php echo $this->get_field_name("title"); ?>' value="<?php echo $title; ?>" class="widefat">
        </p>
        <p>
        <label
            for='<?php echo $this->get_field_id('number'); ?>'><?php _e('Number Of Archives:', 'kyma'); ?></label>
        <input type="text" id='<?php echo $this->get_field_id("number"); ?>'
               name='<?php echo $this->get_field_name("number"); ?>' value="<?php echo $number; ?>" class="widefat">
        </p><?php
    }
}

/* Category Widget */

class kymaCategoryWidget extends WP_Widget
{
    function __construct()
    {
        parent::__construct(
            'kyma_categories',
            __('Kyma Categories', 'kyma'),
            array('description' => __('Kyma Category Widget', 'kyma'))
        );
    }

    function widget($args, $instance)
    {
        extract($args);
        $title = apply_filters('widget_title', $instance['title']);
        $number = apply_filters('widget_title', $instance['number']);

        if ($title != "") {
            echo $before_title . $title . $after_title;
        } else {
            echo $before_title . 'Categories' . $after_title;
        }
        echo $before_widget; ?>
        <ul class="cat_list_widget"><?php
            $args = array(
                'show_count' => 1,
                'hide_empty' => 1,
                'title_li' => '',
                'number' => $number,
                'echo' => false,
            );
            $html = wp_list_categories($args);
            // Wrap the post count in a span element
            $html = preg_replace('~( )(\(\d++\))~', '$1<span class="num_posts">$2</span>', $html);
            // Output the result
            echo $html; ?>
        </ul>
        <?php echo $after_widget;
    }

    function update($new_instance, $old_instance)
    {
        $instance = $old_instance;
        $instance['title'] = strip_tags($new_instance['title']);
        $instance['number'] = strip_tags($new_instance['number']);
        return $instance;
    }

    function form($instance)
    {
        if (isset($instance['title'])) {
            $title = esc_attr($instance['title']);
        } else {
            $title = 'Categories';
        }
        if (isset($instance['number'])) {
            $number = esc_attr($instance['number']);
        } else {
            $number = 5;
        }
        ?>
        <p>
            <label for='<?php echo $this->get_field_id('title'); ?>'><?php _e('Title:', 'kyma'); ?></label>
            <input type="text" id='<?php echo $this->get_field_id("title"); ?>'
                   name='<?php echo $this->get_field_name("title"); ?>' value="<?php echo $title; ?>" class="widefat">
        </p>
        <p>
        <label
            for='<?php echo $this->get_field_id('number'); ?>'><?php _e('Number Of Categories:', 'kyma'); ?></label>
        <input type="text" id='<?php echo $this->get_field_id("number"); ?>'
               name='<?php echo $this->get_field_name("number"); ?>' value="<?php echo $number; ?>" class="widefat">
        </p><?php
    }
}

/* multi-widget */

class kymaMultiWidget extends WP_Widget
{
    function __construct()
    {
        parent::__construct(
            'kyma_multi_widget',
            __('Kyma Multi-Widget', 'kyma'),
            array('description' => __('This widget shows Recent Posts,Recent Comments0 & Popular Posts', 'kyma'))
        );
    }

    function widget($args, $instance)
    {
        extract($args);
        $popular_posts_num = apply_filters('widget_title', $instance['popular_posts_num']);
        $recent_posts_num = apply_filters('widget_title', $instance['recent_posts_num']);
        $recent_comment_num = apply_filters('widget_title', $instance['recent_comment_num']);
        echo $before_widget; ?>
        <div class="hm-tabs tabs1 is-ended">
            <nav>
                <ul class="tabs-navi">
                    <li class=""><a data-content="inbox" class=""
                                    href="#"><span></span><?php _e('Popular', 'kyma'); ?></a></li>
                    <li class="prev_selected"><a data-content="new" href="#"
                                                 class=""><span></span><?php _e('Recent', 'kyma'); ?></a>
                    </li>
                    <li><a data-content="gallery" href="#" class="selected"><i class="icon_alone ico-comment-o"></i></a>
                    </li>
                </ul>
            </nav>
            <?php $pop = new WP_Query(array('post_type' => 'post', 'showposts' => $popular_posts_num, 'orderby' => 'comment_count', 'ignore_sticky_posts' => 1)); ?>
            <ul class="tabs-body" style="height: 375px;">
                <li data-content="inbox" class="">
                    <?php if ($pop->have_posts()): ?>
                        <ul class="posts_widget_list2">
                        <?php while ($pop->have_posts()) : $pop->the_post(); ?>
                            <li class="clearfix">
                                <a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>">
                                    <?php the_post_thumbnail('kyma_recent_widget_thumb'); ?>
                                    <span><?php the_title(); ?></span>
                                </a>
                                <span class="post_date"><i
                                        class="ico-comments-o"></i><?php comments_popup_link('No Comments &#187;', '1 Comment', '% Comments'); ?></span>
                            </li>
                        <?php endwhile; ?>
                        </ul><?php
                        wp_reset_query();
                    endif; ?>
                </li>

                <li data-content="new" class=""><?php
                    $loop = new WP_Query(array('post_type' => 'post', 'showposts' => $recent_posts_num));
                    if ($loop->have_posts()) :?>
                        <ul class="posts_widget_list2">
                            <?php while ($loop->have_posts()) : $loop->the_post(); ?>
                                <li class="clearfix">
                                    <a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>">
                                        <?php the_post_thumbnail('kyma_recent_widget_thumb'); ?>
                                        <span><?php the_title(); ?></span>
                                    </a>
                                    <span
                                        class="post_date"><?php echo esc_attr(get_the_date(get_option('date_format'))); ?></span>
                                </li>
                            <?php endwhile; ?>
                        </ul>
                        <?php wp_reset_query(); endif; ?>
                </li>

                <li data-content="gallery" class="selected">
                    <ul class="posts_widget_list2"><?php
                        $args = array(
                            'number' => $recent_comment_num,
                        );
                        $comments = get_comments($args);
                        foreach ($comments as $comment) {
                            ?>
                            <li class="clearfix">
                            <a href="<?php echo $comment->comment_author_url; ?>">
                                <?php echo get_avatar($comment, 64); ?>
                                <span><?php echo $comment->comment_author; ?>:</span>
                            </a>
                            <span class="post_comment"><?php echo comment_excerpt($comment); ?></span>
                            </li><?php
                        }
                        wp_reset_query();?>
                    </ul>
                </li>
            </ul>
        </div>
        <?php echo $before_widget;
    }

    function update($new_instance, $old_instance)
    {
        $instance = $old_instance;
        $instance['recent_posts_num'] = strip_tags($new_instance['recent_posts_num']);
        $instance['popular_posts_num'] = strip_tags($new_instance['popular_posts_num']);
        $instance['recent_comment_num'] = strip_tags($new_instance['recent_comment_num']);
        return $instance;
    }

    function form($instance)
    {
        if (isset($instance['recent_posts_num'])) {
            $recent_posts_num = esc_attr($instance['recent_posts_num']);
        } else {
            $recent_posts_num = 4;
        }
        if (isset($instance['popular_posts_num'])) {
            $popular_posts_num = esc_attr($instance['popular_posts_num']);
        } else {
            $popular_posts_num = 4;
        }
        if (isset($instance['recent_comment_num'])) {
            $recent_comment_num = esc_attr($instance['recent_comment_num']);
        } else {
            $recent_comment_num = 4;
        }
        ?>
        <p>
            <label
                for='<?php echo $this->get_field_id('title'); ?>'><?php _e('NUmber of recent posts:', 'kyma'); ?></label>
            <input type="text" id='<?php echo $this->get_field_id("recent_posts_num"); ?>'
                   name='<?php echo $this->get_field_name("title"); ?>' value="<?php echo $recent_posts_num; ?>"
                   class="widefat">
        </p>
        <p>
            <label
                for='<?php echo $this->get_field_id('popular_posts_num'); ?>'><?php _e('Number Of Popular Posts:', 'kyma'); ?></label>
            <input type="text" id='<?php echo $this->get_field_id("popular_posts_num"); ?>'
                   name='<?php echo $this->get_field_name("popular_posts_num"); ?>'
                   value="<?php echo $popular_posts_num; ?>" class="widefat">
        </p>
        <p>
        <label
            for='<?php echo $this->get_field_id('recent_comment_num'); ?>'><?php _e('Number Of Recent Comments:', 'kyma'); ?></label>
        <input type="text" id='<?php echo $this->get_field_id("recent_comment_num"); ?>'
               name='<?php echo $this->get_field_name("recent_comment_num"); ?>'
               value="<?php echo $recent_comment_num; ?>" class="widefat">
        </p><?php
    }
}

?>