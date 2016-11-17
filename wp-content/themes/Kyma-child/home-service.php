<?php $kyma_theme_options = kyma_theme_options();
$all_posts = wp_count_posts('kyma_service')->publish;
$args = array('post_type' => 'kyma_service', 'posts_per_page' => $all_posts);
$service = new WP_Query($args);
$col = 12 / (int)$kyma_theme_options['home_service_column'];
switch ($kyma_theme_options['home_service_type']) {
    case 1:
        ?>
        <section class="content_section bg_gray">
            <div class="container icons_spacer">
                <div class="main_title centered upper"><?php if ($kyma_theme_options['home_service_heading'] != ""){ ?>
                    <h2 id="service_heading"><span class="line"><i class="fa fa-cog"></i></span><?php echo esc_attr($kyma_theme_options['home_service_heading']);
                        } ?></h2>
                </div>
                <?php
                if ($service->have_posts()) {
                    ?>
                    <div class="icon_boxes_con style1 clearfix"><?php
                        while ($service->have_posts()): $service->the_post(); ?>
                        <div class="service col-md-<?php echo esc_attr($col); ?>">
                            <div class="service_box">
                                <?php if (get_post_meta(get_the_ID(), 'service_icon', true)) { ?>
                                    <span class="icon"><i
                                            style="background-color: <?php echo esc_attr(get_post_meta(get_the_ID(), 'icon_bg_color', true)); ?>"
                                            class="<?php if (get_post_meta(get_the_ID(), 'service_icon', true) != "") {
                                                echo esc_attr(get_post_meta(get_the_ID(), 'service_icon', true));
                                            } ?>"></i></span>
                                <?php } else { ?>
                                    <span class="icon icon1">
								<?php
                                $class = array('class' => 'img-responsive');
                                echo the_post_thumbnail('kyma_home_service_image', $class); ?>
								</span>
                                <?php } ?>

                                <div class="service_box_con centered">
                                    <a href="<?php echo esc_url(get_post_meta(get_the_ID(), 'service_link', true)); ?>" <?php if (get_post_meta(get_the_ID(), 'service_button_target', true)) {
                                        echo "target='_blank'";
                                    } ?>><h3><?php the_title(); ?></h3></a>
                                    <?php if (get_post_meta(get_the_ID(), 'service_description', true) != "") { ?>
                                        <span
                                            class="desc"><?php echo esc_attr(get_post_meta(get_the_ID(), 'service_description', true)); ?></span>
                                    <?php
                                    }
                                    if (get_post_meta(get_the_ID(), 'service_link', true) != "") {
                                        ?>
                                    <a href="<?php echo esc_url(get_post_meta(get_the_ID(), 'service_link', true)); ?>" <?php if (get_post_meta(get_the_ID(), 'service_button_target', true)) {
                                        echo "target='_blank'";
                                    } ?> class="ser-box-link"><span></span><?php _e('Read More', 'kyma'); ?>
                                        </a><?php
                                    }
                                    ?>
                                </div>
                            </div>
                            </div><?php
                        endwhile; ?>
                        <div class="col-md-12">
                            <div class="more">
                                <h3><a href="<?php echo esc_url(home_url('/')).'preguntas-frecuentes'; ?>">preguntas frecuentes<i class="fa fa-chevron-circle-right"></i></a></h3>
                            </div>
                        </div>
                    </div>
                <?php
                } else {
                    ?>
                    <!-- Icon Boxes Style 1 A -->
                    <div class="icon_boxes_con style1 clearfix">
                        <?php $service_one_title = array('Redux Theme Option', 'Quick User Support', 'Unique Design', 'Easy to Customize', 'Fully Responsive', 'Retina Ready', 'Color Scheme', 'Amazing Shortcodes');
                        $service_one_icon = array('ico-tools-2', 'color1 ico-mobile4', 'color2 ico-heart5', 'color3 ico-edit2', 'ico-mobile4', 'fa fa-eye', 'ico-paintbrush', 'color6 fa fa-code');
                        $service_one_color = array('', '', '', '', '#C51737', '#B5A811', '#14946B', '');
                        $j = 0;
                        for ($i = 1; $i <= 8; $i++) {
                            ?>
                            <div class="col-md-3">
                                <div class="service_box">
                                    <span class="icon"><i class="<?php echo $service_one_icon[$j]; ?>"
                                                          style="background-color: <?php echo $service_one_color[$j]; ?> ;"></i></span>

                                    <div class="service_box_con centered">
                                        <h3><?php echo $service_one_title[$j]; ?></h3>
                            <span
                                class="desc"><?php _e('There are many variations of demo text passed sages of Lorem Ipsum available the majority.', 'kyma'); ?></span>
                                        <a href="#"
                                           class="ser-box-link"><span></span><?php _e('Read More', 'kyma'); ?>
                                        </a>
                                    </div>
                                </div>
                            </div>
                            <?php $j++;
                        } ?>
                    </div>
                    <!-- End Icon Boxes Style 1 A -->
                <?php } ?>
            </div>
        </section>
        <?php
        break;
    case 2:
        ?>
        <!-- Features 1 -->
        <section class="content_section bg_gray">
            <div class="content row_spacer">
                <div class="main_title centered upper">
                    <?php if ($kyma_theme_options['home_service_heading'] != "") { ?>
                        <h2><span class="line"><i
                                    class="ico-monitor2"></i></span><?php echo esc_attr($kyma_theme_options['home_service_heading']); ?>
                        </h2>
                    <?php } ?>
                </div>
                <span class="spacer30"></span>

                <ul class="tree_features clearfix">
                    <?php if ($service->have_posts()) {
                        while ($service->have_posts()): $service->the_post();
                            ?>
                            <li data-bgcolor="<?php echo esc_attr(get_post_meta(get_the_ID(), 'icon_bg_color', true)); ?>">
				<span class="leaf_icon">
					<?php if (get_post_meta(get_the_ID(), 'service_icon', true)) { ?>
                        <i class="<?php echo esc_attr(get_post_meta(get_the_ID(), 'service_icon', true)); ?>"></i>
                    <?php } ?>
				</span>

                                <div class="leaf_con">
                                    <a href="<?php echo esc_url(get_post_meta(get_the_ID(), 'service_link', true)); ?>" <?php if (get_post_meta(get_the_ID(), 'service_button_target', true)) {
                                        echo "target='_blank'";
                                    } ?>  class="tree_features_t"><?php the_title(); ?></a>
                                    <?php if (get_post_meta(get_the_ID(), 'service_description', true) != "") { ?>
                                        <span
                                            class="tree_features_d"><?php echo esc_attr(get_post_meta(get_the_ID(), 'service_description', true)); ?></span>
                                    <?php } ?>
                                </div>
                            </li>
                        <?php
                        endwhile;
                    } else {
                        $service_four_color = array('0072A5', '4D4294', 'F36A71', 'B853A3', '0CAEBF', '1BBC9B');
                        $service_three_icon = array('ico-mobile4', 'ico-desktop2', 'ico-pencil5', 'ico-expand3', 'ico-key4', 'ico-bargraph');
                        $service_three_title = array('Responsive Design', 'Best User Interface', 'Easy to Edit Animations', 'Browser Compatibility', 'Easy to Customize', 'Super Coding');
                        $j = 0;
                        for ($i = 1; $i <= 6; $i++) {
                            ?>
                            <li data-bgcolor="#<?php echo $service_four_color[$j]; ?>">
                                <span class="leaf_icon"><i class="<?php echo $service_three_icon[$j]; ?>"></i></span>

                                <div class="leaf_con">
                                    <a href="#" class="tree_features_t"><?php echo $service_three_title[$j]; ?></a>
                                    <span
                                        class="tree_features_d"><?php _e('There are many variations of demo text passed sages of Lorem Ipsum available the majority.', 'kyma'); ?></span>
                                </div>
                            </li>
                            <?php $j++;
                        }
                    } ?>
                </ul>
                <?php $service_bottom_image = $kyma_theme_options['service_bottom_image']['url'];
                if ($service_bottom_image) {
                    ?>
                    <div class="centered">
                        <img class="tree_features_parent" src="<?php echo $service_bottom_image; ?>" alt="Image Title">
                    </div>
                <?php } ?>
            </div>
        </section>
        <!-- End Features 1 -->
        <?php
        break;
    case 3:
        ?>
        <!-- Icon Boxes Style 2 B -->
        <section class="content_section bg_gray">
            <div class="container icons_spacer">
                <div class="main_title centered upper">
                    <?php if ($kyma_theme_options['home_service_heading'] != "") { ?>
                        <h2><span class="line"><span
                                    class="dot"></span></span><?php echo esc_attr($kyma_theme_options['home_service_heading']); ?>
                        </h2>
                    <?php } ?>
                </div>
                <div class="icon_boxes_con style2 upper_title solid_icon clearfix">
                    <?php if ($service->have_posts()) {
                        while ($service->have_posts()): $service->the_post();
                            ?>
                            <div class="col-md-<?php echo esc_attr($col); ?>">
                                <div class="service_box">
                                    <span class="icon circle"><i class="<?php echo esc_attr(get_post_meta(get_the_ID(), 'service_icon', true)); ?>"></i></span>

                                    <div class="service_box_con">
                                        <h3>
                                            <a href="<?php echo esc_url(get_post_meta(get_the_ID(), 'service_link', true)); ?>" <?php if (get_post_meta(get_the_ID(), 'service_button_target', true)) {
                                                echo "target='_blank'";
                                            } ?>><?php the_title(); ?></a></h3>
                                        <?php if (get_post_meta(get_the_ID(), 'service_description', true) != "") { ?>
                                            <span
                                                class="desc"><?php echo esc_attr(get_post_meta(get_the_ID(), 'service_description', true)); ?></span>
                                        <?php } ?>
                                    </div>
                                </div>
                            </div>
                        <?php
                        endwhile;
                    } else {
                        $service_three_title = array('Super Coding', 'Best User Interface', 'Unique Design');
                        $service_three_icon = array('ico-desktop2', 'ico-tablet3', 'ico-puzzle');
                        $j = 0;
                        for ($i = 1; $i <= 3; $i++) {
                            ?>
                            <div class="col-md-4">
                                <div class="service_box">
                                    <span class="icon circle"><i
                                            class="<?php echo $service_three_icon[$j]; ?>"></i></span>

                                    <div class="service_box_con">
                                        <h3><a href="#"><?php echo $service_three_title[$j]; ?></a></h3>
                                        <span
                                            class="desc"><?php _e('There are many variations of demo text passed sages of Lorem Ipsum available the majority There are many variations of demo.', 'kyma'); ?></span>
                                    </div>
                                </div>
                            </div>
                            <?php $j++;
                        }
                    } ?>
                </div>
            </div>
        </section>
        <!-- End Icon Boxes Style 2 B -->
        <?php
        break;
    case 4:
        ?>
        <!-- Icon Boxes Style 1 F -->
        <section class="content_section bg_gray">
            <div
                class="container icons_spacer icon_boxes_con style1 img_icon_box just_icon_border upper_title centered clearfix">
                <?php if ($service->have_posts()) {
                    while ($service->have_posts()): $service->the_post();
                        ?>
                        <div class="col-md-<?php echo esc_attr($col); ?>">
                            <div class="service_box">
				<span class="icon circle">
				<?php the_post_thumbnail('kyma_home_service_image', 'img-responsive'); ?>
				</span>

                                <div class="service_box_con">
                                    <a href="<?php echo esc_url(get_post_meta(get_the_ID(), 'service_link', true)); ?>" <?php if (get_post_meta(get_the_ID(), 'service_button_target', true)) {
                                        echo "target='_blank'";
                                    } ?>>
                                        <h3><?php the_title(); ?></h3></a>
                                    <?php if (get_post_meta(get_the_ID(), 'service_description', true) != "") { ?>
                                        <span
                                            class="desc"><?php echo esc_attr(get_post_meta(get_the_ID(), 'service_description', true)); ?></span>
                                    <?php
                                    }
                                    if (get_post_meta(get_the_ID(), 'service_link', true) != "") {
                                        ?>
                                        <a href="<?php echo esc_url(get_post_meta(get_the_ID(), 'service_link', true)); ?>" <?php if (get_post_meta(get_the_ID(), 'service_button_target', true)) {
                                            echo "target='_blank'";
                                        } ?>" class="ser-box-link"><span></span><?php _e('Read More', 'kyma'); ?></a>
					<?php } ?>
                                </div>
                            </div>
                        </div>
                    <?php
                    endwhile;
                } else {
                    $service_two_title = array('Super Coding', 'Best User Interface', 'Unique Design');
                    $j = 0;
                    for ($i = 1; $i <= 3; $i++) {
                        ?>
                        <div class="col-md-4">
                            <div class="service_box">
                                <span class="icon circle"><img
                                        src="<?php echo get_template_directory_uri(); ?>/images/icons/browser<?php echo $i; ?>.png"
                                        alt="Super Coding"></span>

                                <div class="service_box_con">
                                    <h3><?php echo $service_two_title[$j]; ?></h3>
                                    <span
                                        class="desc"><?php _e('There are many variations of demo text passed sages of Lorem Ipsum available the majority.', 'kyma'); ?></span>
                                    <a href="#"
                                       class="ser-box-link"><span></span><?php _e('Read More', 'kyma'); ?>
                                    </a>
                                </div>
                            </div>
                        </div>
                        <?php $j++;
                    }
                } ?>
            </div>
        </section>
        <!-- End Icon Boxes Style 1 F -->
    <?php
} ?>