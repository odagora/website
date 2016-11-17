<?php $kyma_theme_options = kyma_theme_options();
switch ($kyma_theme_options['feature_style']) {
    case 1:
		$bg_color = $kyma_theme_options['feature_bg_color'] != "" ? 'white_section ' . $kyma_theme_options['feature_bg_color'] : '';   ?>
        <section class="content_section <?php echo esc_attr($bg_color); ?>">
            <div id="features" class="content row_spacer clearfix">
                <?php if ($kyma_theme_options['home_feature_heading']) { ?>
                    <div class="main_title centered upper">
                    <h2><span class="line"><i class="fa fa-check-circle"></i></span><?php echo esc_attr($kyma_theme_options['home_feature_heading']); ?>
                    </h2>
                    </div><?php
                } ?>
                <!-- Rows Container -->
                <div class="icon_boxes_con style2 icon_box_no_border upper_title clearfix">
                <?php
                    $all_posts = wp_count_posts('kyma_feature')->publish;
                    $args = array('post_type' => 'kyma_feature', 'posts_per_page' => $all_posts);
                    $feature = new WP_Query($args);
                    if ($feature->have_posts()) {
                        while ($feature->have_posts()): $feature->the_post(); ?>
                        <div class="col-md-6">
                            <div class="service_box">
                            <div><span class="icon circle"><i
                                        class="<?php if (get_post_meta(get_the_ID(), 'feature_icon', true) != "") {
                                            echo esc_attr(get_post_meta(get_the_ID(), 'feature_icon', true));
                                        }?>"></i></span></div>

                            <div class="service_box_con">
                                <h3><?php the_title(); ?></h3>
                                <span
                                    class="desc"><?php if (get_post_meta(get_the_ID(), 'feature_description', true) != "") {
                                        echo esc_attr(get_post_meta(get_the_ID(), 'feature_description', true));
                                    }?></span>
                            </div>
                            </div>
                        </div>
                        <?php
                        endwhile;
                        ?>
                        <div class="col-md-12">
                            <div class="more">
                                <h3><a href="<?php echo esc_url(home_url('/')).'quienes-somos'; ?>">más sobre nosotros<i class="fa fa-chevron-circle-right"></i></a></h3>
                            </div>
                        </div>
                        <?php
                        } else {
                            ?>
                            <div class="col-md-6">
                                <div class="service_box">
                                    <a href="#"><span class="icon circle"><i class="ico-desktop2"></i></span></a>

                                    <div class="service_box_con">
                                        <h3><?php _e('Premium Sliders Included', 'kyma'); ?></h3>
                                            <span
                                                class="desc"><?php _e('There are many variations of demo text passed sages of Lorem Ipsum available the majority.', 'kyma'); ?></span>
                                    </div>
                                </div>
                                <div class="service_box">
                                    <a href="#"><span class="icon circle"><i class="ico-tablet3"></i></span></a>

                                    <div class="service_box_con">
                                        <h3><?php _e('100% Responsive Layout', 'kyma'); ?></h3>
                                            <span
                                                class="desc"><?php _e('There are many variations of demo text passed sages of Lorem Ipsum available the majority.', 'kyma'); ?></span>
                                    </div>
                                </div>
                                <div class="service_box">
                                <a href="#"><span class="icon circle"><i class="ico-beaker"></i></span></a>

                                <div class="service_box_con">
                                    <h3><?php _e('Powerful Performance', 'kyma'); ?></h3>
                                        <span
                                            class="desc"><?php _e('There are many variations of demo text passed sages of Lorem Ipsum available the majority.', 'kyma'); ?></span>
                                </div>
                                </div>
                            </div><?php
                            }
                        ?>
                    </div>
                </div>
                <!-- End Rows Container -->
        </section>
        <?php
        break;
    case 2:
	$bg_color = $kyma_theme_options['feature_bg_color'] != "" ? 'white_section ' . $kyma_theme_options['feature_bg_color'] : 'bg_gray'; ?>
    <section id="features_section" class="content_section <?php echo esc_attr($bg_color); ?>">
        <?php if ($kyma_theme_options['home_feature_heading']) { ?>
        <div class="title_banner upper centered">
        <div class="content">
            <h2><?php echo esc_attr($kyma_theme_options['home_feature_heading']); ?></h2>
        </div>
        </div><?php
    } ?>
        <div class="container icons_spacer">
            <div class="icon_boxes_con style2 upper_title solid_icon clearfix"><?php
                $all_posts = wp_count_posts('kyma_feature')->publish;
                $args = array('post_type' => 'kyma_feature', 'posts_per_page' => $all_posts);
                $feature = new WP_Query($args);
                if ($feature->have_posts()) {
                    while ($feature->have_posts()): $feature->the_post(); ?>
                        <div class="col-md-4">
                        <div class="service_box">
                            <span class="icon circle"><i
                                    class="<?php if (get_post_meta(get_the_ID(), 'feature_icon', true) != "") {
                                        echo esc_attr(get_post_meta(get_the_ID(), 'feature_icon', true));
                                    } ?>"></i></span>

                            <div class="service_box_con">
                                <h3><?php the_title(); ?></h3>
                                <?php
                                if (get_post_meta(get_the_ID(), 'feature_description', true) != "") {
                                    ?>
                                    <span
                                        class="desc"><?php echo esc_attr(get_post_meta(get_the_ID(), 'feature_description', true)); ?></span><?php
                                }
                                if (get_post_meta(get_the_ID(), 'feature_link', true) != "") {
                                    ?>
                                <a href="<?php echo esc_url(get_post_meta(get_the_ID(), 'feature_link', true)); ?>"
                                   class="ser-box-link"><span></span><?php _e('Read More', 'kyma'); ?>
                                    </a><?php
                                }
                                ?>
                            </div>
                        </div>
                        </div><?php
                    endwhile;
                } else {
                    ?>
                    <div class="col-md-4">
                        <div class="service_box">
                            <span class="icon circle"><i class="ico-beaker"></i></span>

                            <div class="service_box_con">
                                <h3><?php _e('Super Coding', 'kyma'); ?></h3>
                                <span
                                    class="desc"><?php _e('There are many variations of demo text passed sages of Lorem Ipsum available the majority.', 'kyma'); ?></span>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="service_box">
                            <span class="icon circle"><i class="ico-desktop2"></i></span>

                            <div class="service_box_con">
                                <h3><?php _e('Best User Interface', 'kyma'); ?></h3>
                                <span
                                    class="desc"><?php _e('There are many variations of demo text passed sages of Lorem Ipsum available the majority.', 'kyma'); ?></span>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="service_box">
                            <span class="icon circle"><i class="ico-picture"></i></span>

                            <div class="service_box_con">
                                <h3><?php _e('Parallax Support', 'kyma'); ?></h3>
                                <span
                                    class="desc"><?php _e('There are many variations of demo text passed sages of Lorem Ipsum available the majority.', 'kyma'); ?></span>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="service_box">
                            <span class="icon circle"><i class="ico-streetsign"></i></span>

                            <div class="service_box_con">
                                <h3><?php _e('Free Font Icons', 'kyma'); ?></h3>
                                <span
                                    class="desc"><?php _e('There are many variations of demo text passed sages of Lorem Ipsum available the majority.', 'kyma'); ?></span>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="service_box">
                            <span class="icon circle"><i class="ico-layers2"></i></span>

                            <div class="service_box_con">
                                <h3><?php _e('Awesome Mega menu', 'kyma'); ?></h3>
                                <span
                                    class="desc"><?php _e('There are many variations of demo text passed sages of Lorem Ipsum available the majority.', 'kyma'); ?></span>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                    <div class="service_box">
                        <span class="icon circle"><i class="ico-paintbrush"></i></span>

                        <div class="service_box_con">
                            <h3><?php _e('Unlimited Color Options', 'kyma'); ?></h3>
                            <span
                                class="desc"><?php _e('There are many variations of demo text passed sages of Lorem Ipsum available the majority.', 'kyma'); ?></span>
                        </div>
                    </div>
                    </div><?php
                }
                ?>
            </div>
        </div>
        </section>
        <?php
        break;
    case 3:
        $bg_color = $kyma_theme_options['feature_bg_color'] != "" ? 'white_section ' . $kyma_theme_options['feature_bg_color'] : '';?>
    <section class="content_section <?php echo esc_attr($bg_color); ?>">

        <div class="container icons_spacer">
            <div class="main_title centered upper"><?php
                if ($kyma_theme_options['home_feature_heading']) {
                    ?>
                    <h2 id="home_feature_heading"><?php echo esc_attr($kyma_theme_options['home_feature_heading']); ?></h2><?php
                } ?>
            </div>

            <!-- Icon Boxes Con -->
            <div class="icon_boxes_con style2 icon_left_right upper_title clearfix"><?php
                $all_posts = wp_count_posts('kyma_feature')->publish;
                $args = array('post_type' => 'kyma_feature', 'posts_per_page' => $all_posts);
                $feature = new WP_Query($args);
                if ($feature->have_posts()) {
                    while ($feature->have_posts()): $feature->the_post(); ?>
                        <div class="col-md-6">
                        <div class="service_box">
                            <a href="#"><span class="icon circle"><i
                                        class="<?php if (get_post_meta(get_the_ID(), 'feature_icon', true) != "") {
                                            echo esc_attr(get_post_meta(get_the_ID(), 'feature_icon', true));
                                        } ?>"></i></span></a>

                            <div class="service_box_con">
                                <h3><?php the_title(); ?></h3>
                                <?php
                                if (get_post_meta(get_the_ID(), 'feature_description', true) != "") {
                                    ?>
                                    <span
                                        class="desc"><?php echo esc_attr(get_post_meta(get_the_ID(), 'feature_description', true)); ?></span><?php
                                }
                                if (get_post_meta(get_the_ID(), 'feature_link', true) != "") {
                                    ?>
                                <a href="<?php echo esc_url(get_post_meta(get_the_ID(), 'feature_link', true)); ?>"
                                   class="ser-box-link"><span></span><?php _e('Read More', 'kyma'); ?>
                                    </a><?php
                                }
                                ?>
                            </div>
                        </div>
                        </div><?php
                    endwhile;
                } else {
                    ?>
                    <div class="col-md-6">
                        <div class="service_box">
                            <a href="#"><span class="icon circle"><i class="ico-desktop2"></i></span></a>

                            <div class="service_box_con">
                                <h3><?php _e('Premium Sliders Included', 'kyma'); ?></h3>
                                <span
                                    class="desc"><?php _e('There are many variations of demo text passed sages of Lorem Ipsum available the majority.', 'kyma'); ?></span>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="service_box">
                            <a href="#"><span class="icon circle"><i class="ico-tablet3"></i></span></a>

                            <div class="service_box_con">
                                <h3><?php _e('100% Responsive Layout', 'kyma'); ?></h3>
                                <span
                                    class="desc"><?php _e('There are many variations of demo text passed sages of Lorem Ipsum available the majority.', 'kyma'); ?></span>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="service_box">
                            <a href="#"><span class="icon circle"><i class="ico-beaker"></i></span></a>

                            <div class="service_box_con">
                                <h3><?php _e('Powerful Performance', 'kyma'); ?></h3>
                                <span
                                    class="desc"><?php _e('There are many variations of demo text passed sages of Lorem Ipsum available the majority.', 'kyma'); ?></span>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                    <div class="service_box">
                        <a href="#"><span class="icon circle"><i class="ico-streetsign"></i></span></a>

                        <div class="service_box_con">
                            <h3><?php _e('Awesome Mega menu', 'kyma'); ?></h3>
                            <span
                                class="desc"><?php _e('There are many variations of demo text passed sages of Lorem Ipsum available the majority.', 'kyma'); ?></span>
                        </div>
                    </div>
                    </div><?php
                } ?>
            </div>
            <!-- End Icon Boxes Con -->
        </div>
        </section>
    <?php
} ?>