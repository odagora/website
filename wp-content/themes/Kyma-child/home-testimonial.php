<?php
$kyma_theme_options = kyma_theme_options();
switch ($kyma_theme_options['testimonial_style']) {
    case 1:
        ?>
        <section class="content_section bg_gray">
        <div id="testimonial" class="content row_spacer clearfix"><?php
            if ($kyma_theme_options['testimonial_heading'] != "") {
                ?>
                <div class="main_title centered upper">
                <h2 id="testimonial_heading"><span
                        class="line"><i
                            class="ico-comments-o"></i></span><?php echo $kyma_theme_options['testimonial_heading']; ?></h2>
                </div><?php
            } ?>
            <div class="normal_text_slider client_say_slider"><?php
                $all_posts = wp_count_posts('kyma_testimonial')->publish;
                $args = array(
                    'post_type' => 'kyma_testimonial',
                    'posts_per_page' => $all_posts,
                );
                $kyma_testimonial = new WP_Query($args);
                if ($kyma_testimonial->have_posts()) {
                    while ($kyma_testimonial->have_posts()) : $kyma_testimonial->the_post(); ?>
                        <div class="c_say">
                        <div class="centered">
                            <span class="client_img">
                                <span>
                                    <a href="<?php if (get_post_meta(get_the_ID(), 'client_site_url', true) != "") {
                                        echo esc_url(get_post_meta(get_the_ID(), 'client_site_url', true));
                                    } ?>"><?php
                                        $class = array('class' => 'img-responsive');
                                        the_post_thumbnail('testimonial_circle_thumb', $class); ?></a>
                                </span>
                            </span>
                        </div>
                        <span class="client_details">
                            <span class="name"><?php the_title(); ?></span><?php
                            if (get_post_meta(get_the_ID(), 'client_designation', true) != "") {
                                ?>
                                / <span
                                    class="url"><?php echo esc_attr(get_post_meta(get_the_ID(), 'client_designation', true)); ?> </span><?php
                            } ?>
                        </span>
                        <span class="desc">
                            <?php the_content(); ?>
                        </span>
                        </div><?php
                    endwhile;
                } else {
                    $name = array('Jhon Deo', 'Alina', 'Harry');
                    $j = 0;
                    for ($i = 1; $i <= 3; $i++) {
                        ?>
                        <div class="c_say">
                            <div class="centered">
						<span class="client_img">
							<span>
								<a href="#"><img
                                        src="<?php echo get_template_directory_uri(); ?>/images/testimonials/testi<?php echo $i; ?>.jpg"
                                        alt="client name"></a>
							</span>
						</span>
                            </div>
					<span class="client_details">
						<span class="name"><?php echo $name[$j]; ?></span> - 
						<span class="url"><?php _e('www.webhuntinfotech.com', 'kyma'); ?></span>
					</span>
					<span class="desc">
					<?php _e('There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which dont look even slightly believable.', 'kyma'); ?>
					</span>
                        </div>
                        <?php $j++;
                    }
                }
                ?>
            </div>
        </div>
        </section><?php
        break;
    case 2:
        ?>
        <section class="content_section bg_gray">
        <div class="content row_spacer clearfix"><?php
            if ($kyma_theme_options['testimonial_heading'] != "") {
                ?>
                <div class="main_title centered upper">
                <h2><span class="line"><i
                            class="ico-comments-o"></i></span><?php echo $kyma_theme_options['testimonial_heading']; ?>
                </h2>
                </div><?php
            } ?>
            <!-- Content Slider -->
            <div class="content_slider"><?php
                $all_posts = wp_count_posts('kyma_testimonial')->publish;
                $args = array(
                    'post_type' => 'kyma_testimonial',
                    'posts_per_page' => $all_posts,
                );
                $kyma_testimonial = new WP_Query($args);
                if ($kyma_testimonial->have_posts()) {
                ?>
                <div class="content_slide clearfix"><?php
                    $i = 0;
                    $pages = ceil($all_posts / 2);
                    while ($kyma_testimonial->have_posts()) :
                    $kyma_testimonial->the_post(); ?>
                    <div class="col-md-6">
                        <div class="what_say_block">
                            <span class="say_img"><a
                                    href="<?php echo esc_url(get_post_meta(get_the_ID(), 'client_site_url', true)); ?>"><?php if (has_post_thumbnail()) {
                                        $class = array('class' => 'img-responsive');
                                        the_post_thumbnail('testimonial_square_thumb', $class);
                                    } ?></a></span>

                            <div class="say_datils">
                                <h5><?php the_title(); ?>
                                    /<span><?php echo esc_attr(get_post_meta(get_the_ID(), 'client_designation', true)); ?></span>
                                </h5>
                                <?php the_content(); ?>
                            </div>
                        </div>
                    </div><?php //if ($i % 2 == 0){ echo '<div class="clearfix"></div>'; }
                    $i++;
                    if ($i % 2 == 0) {
                    ?>
                </div>
                <?php if ($i < ($pages * 2)){ ?>
                <div class="content_slide clearfix">
                    <?php
                    }
                    }
                    endwhile;
                    } else {
                        for ($k = 1; $k <= 3; $k++) {
                            ?>
                            <div class="content_slide clearfix">
                                <?php $name = array('Jhon Deo /', 'Alina /', 'Harry /', 'Saniya /');
                                $client_job = array('Director', 'CEO', 'Designer', 'Web Developer');
                                $j = 0;
                                for ($i = 1; $i <= 4; $i++) {
                                    ?>
                                    <div class="col-md-6">
                                        <div class="what_say_block">
                                        <span class="say_img"><a href="#"><img
                                                    src="<?php echo get_template_directory_uri(); ?>/images/testimonials/testimonial<?php echo $i; ?>.jpg"
                                                    alt="Client Name"></a></span>

                                            <div class="say_datils">
                                                <h5><?php echo $name[$j]; ?><span><?php echo $client_job[$j]; ?></span>
                                                </h5>
                                            <span
                                                class="text"><?php _e('There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form.', 'kyma'); ?></span>
                                            </div>
                                        </div>
                                    </div>
                                    <?php
                                    $j++;
                                } ?>
                            </div>
                        <?php
                        }
                    } ?>
                </div>
                <!-- End Content Slider -->
            </div>
        </section><?php
} ?>