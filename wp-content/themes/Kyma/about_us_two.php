<?php
//Template Name: About Us Two
get_header();
get_template_part('breadcrumbs');
$kyma_theme_options = kyma_theme_options();
?>
    <section class="content_section">
        <div class="content">
            <div class="internal_post_con about_margin_two  clearfix">
                <!-- All Content -->
                <div class="content_block col-md-12">
                    <div class="hm_blog_full_list hm_blog_list clearfix">
                        <!-- Post Container -->
                        <?php
                        if (have_posts()):
                        while (have_posts()):
                        the_post(); ?>
                        <div class="clearfix">
                            <div class="feature_inner">
                                <div class="feature_inner_corners">
                                    <div class="porto_galla1 col-md-12">
                                        <?php if (has_post_thumbnail()) { ?>
                                            <?php the_post_thumbnail('about_two_thumb', 'img-responsive'); ?>
                                        <?php
                                        }
                                        if (get_the_title()) {
                                            ?>
                                            <div class="post_title_con">
                                                <h6 class="title"><?php the_title(); ?></a></h6>
                                            </div>
                                        <?php } ?>
                                        <?php echo get_post_meta(get_the_ID(), 'about_us_page_description', true); ?>
                                    </div>
                                    <div class="blog_grid_con col-md-12">
                                        <?php the_content(); ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- End Next / Prev and Social Share-->
                        <!-- End About the author -->
                    </div><?php
                    endwhile;
                    endif;
                    ?>
                    <!-- End Post Container -->
                </div>
                <!-- End blog List -->
            </div>
    </section>
    <!-- Client Say -->
    <section class="content_section white_section enar_parallax bg5">
        <div class="bg_overlay">
            <div class="content row_spacer clearfix">
                <?php if ($kyma_theme_options['testimonial_heading'] != "") { ?>
                    <div class="main_title centered upper">
                        <h2><span
                                class="line"></span><?php echo esc_attr($kyma_theme_options['testimonial_heading']); ?>
                        </h2>
                    </div>
                <?php } ?>
                <div class="normal_text_slider client_say_slider">
                    <?php $args = array(
                        'post_type' => 'kyma_testimonial',
                    );
                    $kyma_testimonial = new WP_Query($args);
                    if ($kyma_testimonial->have_posts()) {
                        while ($kyma_testimonial->have_posts()) : $kyma_testimonial->the_post(); ?>
                            <div class="c_say">
                                <div class="centered">
						<span class="client_img">
							<span>
								<?php the_post_thumbnail('testimonial_circle_thumb', 'img-responsive'); ?>
							</span>
						</span>
                                </div>
					<span class="client_details">
						<span class="name"><?php the_title(); ?></span> -
                        <?php if (get_post_meta(get_the_ID(), 'client_designation', true) != "") { ?>
                            <span
                                class="url"><?php echo esc_attr(get_post_meta(get_the_ID(), 'client_designation', true)); ?></span>
                        <?php } ?>
					</span>
					<span class="desc">
						<?php the_content(); ?>
					</span>
                            </div>
                        <?php
                        endwhile;
                    } else {
                        ?>
                        <div class="c_say">
                            <div class="centered">
						<span class="client_img">
							<span>
								<img src="<?php echo get_template_directory_uri(); ?>/images/clients/client2.jpg"
                                     alt="client name">
							</span>
						</span>
                            </div>
					<span class="client_details">
						<span class="name"><?php _e('John Doe', 'kyma'); ?></span> - 
						<span class="url"><?php _e('www.yourwebsite.com', 'kyma'); ?></span>
					</span>
					<span class="desc">
						<?php _e('There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which dont look even slightly believable . ', 'kyma'); ?>
					</span>
                        </div>
                        <div class="c_say">
                            <div class="centered">
						<span class="client_img">
							<span>
								<img src="<?php echo get_template_directory_uri(); ?>/images/clients/client2.jpg"
                                     alt="client name">
							</span>
						</span>
                            </div>
					<span class="client_details">
						<span class="name"><?php _e('Herryson', 'kyma'); ?></span> - 
						<span class="url"><?php _e('www . yourwebsite . com', 'kyma'); ?></span>
					</span>
					<span class="desc">
						<?php _e('There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which dont look even slightly believable.', 'kyma'); ?>
					</span>
                        </div>
                    <?php } ?>
                </div>
            </div>
        </div>
    </section>
    <!-- End Client Say  -->

    <!-- Works -->
    <section class="content_section">

        <div class="content row_spacer">
            <?php if ($kyma_theme_options['port_heading'] != "") { ?>
                <div class="main_title centered upper">
                    <h2><span class="line"><span
                                class="dot"></span></span><?php echo esc_attr($kyma_theme_options['port_heading']); ?>
                    </h2>
                </div>
            <?php } ?>
            <div class="related_posts">
                <div class="related_posts_con">
                    <?php
                    $all_posts = wp_count_posts('kyma_portfolio')->publish;
                    $args = array(
                        'post_type' => 'kyma_portfolio',
                        'posts_per_page' => $all_posts
                    );
                    $kyma_portfolio = new WP_Query($args);
                    if ($kyma_portfolio->have_posts()) {
                        while ($kyma_portfolio->have_posts()) : $kyma_portfolio->the_post();
                            if (get_post_meta(get_the_ID(), 'portfolio_link', true) != "") {
                                $portfolio_link = get_post_meta(get_the_ID(), 'portfolio_link', true);
                            } else {
                                $portfolio_link = get_the_permalink();
                            }
                            ?>
                            <div class="related_posts_slide">
                                <?php if (has_post_thumbnail()) {
                                    $post_thumbnail_id = get_post_thumbnail_id();
                                    $post_image_url = wp_get_attachment_url($post_thumbnail_id); ?>
                                    <div class="related_img_con">
                                        <a href="<?php echo esc_url($post_image_url); ?>" class="related_img">
                                            <?php $class = array('class' => 'img-responsive');
                                            the_post_thumbnail('related_portfolio_thumb', $class); ?>
                                            <span><i class="ico-pencil4"></i></span>
                                        </a>
                                    </div>
                                <?php } ?>
                                <a class="related_title"
                                   href="<?php echo esc_url($portfolio_link); ?>"><?php the_title(); ?></a>
                                <span class="post_date"><?php echo get_post_time('Y', true);
                                    _e('/', 'kyma');
                                    echo get_post_time('m', true);
                                    _e('/', 'kyma');
                                    echo get_post_time('d', true); ?></span>
                            </div>
                        <?php endwhile;
                    } else {
                        ?>
                        <div class="related_posts_slide">
                            <div class="related_img_con">
                                <a href="<?php echo get_template_directory_uri(); ?>/images/portfolio/item1.jpg"
                                   class="related_img">
                                    <img alt=""
                                         src="<?php echo get_template_directory_uri(); ?>/images/portfolio/item1.jpg">
                                    <span><i class="ico-image4"></i></span>
                                </a>
                            </div>
                            <a class="related_title" href="#"><?php _e('Train Your Self', 'kyma'); ?></a>
                            <span class="post_date"><?php _e('2015/04/13', 'kyma'); ?></span>
                        </div>
                        <div class="related_posts_slide">
                            <div class="related_img_con">
                                <a href="<?php echo get_template_directory_uri(); ?>/images/portfolio/item2.jpg"
                                   class="related_img">
                                    <img alt=""
                                         src="<?php echo get_template_directory_uri(); ?>/images/portfolio/item2.jpg">
                                    <span><i class="ico-sound3"></i></span>
                                </a>
                            </div>
                            <a class="related_title" href="#"><?php _e('Most Beautiful Girl', 'kyma'); ?></a>
                            <span class="post_date"><?php _e('2015/04/14', 'kyma'); ?></span>
                        </div>
                        <div class="related_posts_slide">
                            <div class="related_img_con">
                                <a href="<?php echo get_template_directory_uri(); ?>/images/portfolio/item3.jpg"
                                   class="related_img">
                                    <img alt=""
                                         src="<?php echo get_template_directory_uri(); ?>/images/portfolio/item3.jpg">
                                    <span><i class="ico-quote-right"></i></span>
                                </a>
                            </div>
                            <a class="related_title" href="#"><?php _e('Fly Into The Future', 'kyma'); ?></a>
                            <span class="post_date"><?php _e('2015/04/15', 'kyma'); ?></span>
                        </div>
                        <div class="related_posts_slide">
                            <div class="related_img_con">
                                <a href="<?php echo get_template_directory_uri(); ?>/images/portfolio/item4.jpg"
                                   class="related_img">
                                    <img alt=""
                                         src="<?php echo get_template_directory_uri(); ?>/images/portfolio/item4.jpg">
                                    <span><i class="ico-gallery"></i></span>
                                </a>
                            </div>
                            <a class="related_title" href="#"><?php _e('Dawn of Justice', 'kyma'); ?></a>
                            <span class="post_date"><?php _e('2015/04/16', 'kyma'); ?></span>
                        </div>
                        <div class="related_posts_slide">
                            <div class="related_img_con">
                                <a href="<?php echo get_template_directory_uri(); ?>/images/portfolio/item1.jpg"
                                   class="related_img">
                                    <img alt=""
                                         src="<?php echo get_template_directory_uri(); ?>/images/portfolio/item1.jpg">
                                    <span><i class="ico-comment2"></i></span>
                                </a>
                            </div>
                            <a class="related_title"
                               href="#"><?php _e('Guardians of the Earth', 'kyma'); ?></a>
                            <span class="post_date"><?php _e('2015/04/17', 'kyma'); ?></span>
                        </div>
                    <?php } ?>
                </div>
            </div>
        </div>
    </section>
    <!-- End Works -->
<?php get_template_part('home', 'client'); ?>
<?php get_footer(); ?>