<?php
//Template Name: About Us One
get_header();
the_post();
if (has_post_thumbnail()) {
    $url = wp_get_attachment_image_src(get_post_thumbnail_id(get_the_ID()), 'about_one_thumb');
} ?>
    <section class="content_section white_section page_title has_bg_image member_header bg_header2 enar_parallax"
             style="background-image: url('<?php echo esc_url($url[0]); ?>');">
        <div class="content clearfix">
            <h1 class=""><?php the_title(); ?></h1>
            <?php kyma_breadcrumbs(); ?>
        </div>
    </section>
    <section class="content_section bg_gray">
        <div class="content row_spacer">
            <div class="rows_container clearfix">
                <?php the_content(); ?>
            </div>
        </div>
    </section>
    <!-- Icon Boxes Style 1 D -->
    <section class="content_section">
        <div class="container icons_spacer">
            <?php $kyma_theme_options = kyma_theme_options();
            $all_posts = wp_count_posts('kyma_service')->publish;
            $args = array('post_type' => 'kyma_service', 'posts_per_page' => $all_posts);
            $service = new WP_Query($args); ?>
            <?php if ($kyma_theme_options['home_service_heading'] != "") { ?>
                <div class="main_title centered upper">
                    <h2><span class="line"><span class="dot"></span></span>
                        <?php echo esc_attr($kyma_theme_options['home_service_heading']); ?>
                    </h2>
                </div>
            <?php
            }
            $col = 12 / (int)$kyma_theme_options['home_service_column'];
            if ($service->have_posts()) {
            ?>
            <div class="icon_boxes_con style1 circle upper_title just_icon_border solid_icon clearfix">
                <?php while ($service->have_posts()): $service->the_post(); ?>
                    <div class="col-md-4">
                        <div class="service_box">
						<span class="icon"><i
                                style="background-color: <?php echo esc_attr(get_post_meta(get_the_ID(), 'icon_bg_color', true)); ?>"
                                class="<?php if (get_post_meta(get_the_ID(), 'service_icon', true) != "") {
                                    echo esc_attr(get_post_meta(get_the_ID(), 'service_icon', true));
                                } ?>"></i></span>

                            <div class="service_box_con centered">
                                <h3><?php the_title(); ?></h3>
                                <?php if (get_post_meta(get_the_ID(), 'service_description', true) != "") { ?>
                                    <span
                                        class="desc"><?php echo esc_attr(get_post_meta(get_the_ID(), 'service_description', true)); ?></span>
                                <?php
                                }
                                if (get_post_meta(get_the_ID(), 'service_link', true) != "") {
                                    ?>
                                    <a href="<?php echo esc_url(get_post_meta(get_the_ID(), 'service_link', true)); ?>"
                                       class="ser-box-link"><span></span><?php _e('Read More', 'kyma'); ?>
                                    </a>
                                <?php } ?>
                            </div>
                        </div>
                    </div>
                <?php
                endwhile;
                } else {
                    ?>
                    <div class="icon_boxes_con style1 circle upper_title just_icon_border solid_icon clearfix">
                        <?php
                        $j = 0;
                        for ($i = 1; $i <= 3; $i++) {
                            $about_service_icon = array('fa fa-users', 'fa fa-heart', 'fa fa-key');
                            $about_service_title = array('Retina Ready', 'Business Theme', 'Great Support');
                            ?>
                            <div class="col-md-4">
                                <div class="service_box">
                                    <span class="icon"><i class="<?php echo $about_service_icon[$j]; ?>"></i></span>

                                    <div class="service_box_con centered">
                                        <h3><?php echo $about_service_title[$j]; ?></h3>
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
                <?php } ?>
            </div>
        </div>
    </section>
    <!-- End Icon Boxes Style 1 D -->
<?php get_template_part('home', 'funfacts'); ?>
<?php
$bg_color = $kyma_theme_options['feature_bg_color'] != "" ? 'white_section ' . $kyma_theme_options['feature_bg_color'] : ''; ?>
    <section class="content_section <?php echo esc_attr($bg_color); ?>">
        <div class="content row_spacer clearfix">
            <?php if ($kyma_theme_options['home_feature_heading']) { ?>
                <div class="main_title centered upper">
                <h2><span class="line"><span
                            class="dot"></span></span><?php echo esc_attr($kyma_theme_options['home_feature_heading']); ?>
                </h2>
                </div><?php
            } ?>
            <!-- Rows Container -->
            <div class="icon_boxes_con style2 icon_box_no_border upper_title clearfix">
                <div class="col-md-6"><?php
                    $all_posts = wp_count_posts('kyma_feature')->publish;
                    $args = array('post_type' => 'kyma_feature', 'posts_per_page' => $all_posts);
                    $feature = new WP_Query($args);
                    if ($feature->have_posts()) {
                        while ($feature->have_posts()): $feature->the_post(); ?>
                            <div class="service_box">
                            <a href="#"><span class="icon circle"><i
                                        class="<?php if (get_post_meta(get_the_ID(), 'feature_icon', true) != "") {
                                            echo esc_attr(get_post_meta(get_the_ID(), 'feature_icon', true));
                                        }?>"></i></span></a>

                            <div class="service_box_con">
                                <h3><?php the_title(); ?></h3>
                                    <span
                                        class="desc"><?php if (get_post_meta(get_the_ID(), 'feature_description', true) != "") {
                                            echo esc_attr(get_post_meta(get_the_ID(), 'feature_description', true));
                                        }?></span>
                            </div>
                            </div><?php
                        endwhile;
                    } else {
                        ?>
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
                        </div><?php
                    }
                    ?>
                </div>
                <div class="col-md-6">
                    <?php
                    if (isset($kyma_theme_options['feature_bg_image']) && is_array($kyma_theme_options['feature_bg_image']) && $kyma_theme_options['feature_bg_image']['url'] != "") {
                        ?>
                        <img src="<?php echo esc_url($kyma_theme_options['feature_bg_image']['url']); ?>"
                             alt="<?php the_title(); ?>">
                    <?php } ?>
                </div>
            </div>
            <!-- End Rows Container -->
        </div>
    </section>
<?php //} ?>
<?php get_template_part('home', 'client'); ?>
<?php get_footer(); ?>