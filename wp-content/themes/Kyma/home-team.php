<?php $kyma_theme_options = kyma_theme_options();
$all_posts = wp_count_posts('kyma_team')->publish;
$args = array('post_type' => 'kyma_team', 'posts_per_page' => $all_posts);
$team = new WP_Query($args);
switch ($kyma_theme_options['team_style']) {
    case 1:
        ?>
        <!-- Our Team -->
        <section class="content_section">
            <div class="content row_spacer no_padding">
                <?php if ($kyma_theme_options['home_team_heading'] != "") { ?>
                    <div class="main_title centered upper">
                        <h2><span class="line"><i
                                    class="ico-user5"></i></span><?php echo esc_attr($kyma_theme_options['home_team_heading']); ?>
                        </h2>
                    </div>
                <?php } ?>
                <div class="rows_container clearfix"><?php
                    if ($team->have_posts()) {
                        while ($team->have_posts()): $team->the_post(); ?>
                            <div class="col-md-3">
                                <div class="team_block flipp_effect">
                                    <div class="f1_card">
                                        <div class="front face">
                                            <?php if (has_post_thumbnail()) { ?>
                                                <span class="team_img">
										<?php $class = array('class' => 'img-responsive');
                                        the_post_thumbnail('team_circle_thumb', $class); ?>
								</span>
                                            <?php } ?>
                                            <span class="person_name"><?php the_title(); ?></span>
                                            <span
                                                class="person_jop"><?php echo get_post_meta(get_the_ID(), 'member_designation', true); ?></span>
                                        </div>
                                        <div class="back face">
                                            <span class="person_name"><?php the_title(); ?></span>
                                            <span
                                                class="person_jop"><?php echo get_post_meta(get_the_ID(), 'member_designation', true); ?></span>
                                            <span
                                                class="person_desc"><?php echo substr(get_the_excerpt(), 0, 180); ?></span>

                                            <div class="social_media clearfix"><?php
                                                if (get_post_meta(get_the_ID(), 'twitter', true) != "") {
                                                    ?>
                                                    <a href="<?php echo esc_url(get_post_meta(get_the_ID(), 'twitter', true)); ?>"
                                                       target="_blank" class="twitter"> <i class="ico-twitter4"></i></a>
                                                <?php }
                                                if (get_post_meta(get_the_ID(), 'fb', true) != "") { ?>
                                                    <a href="<?php echo esc_url(get_post_meta(get_the_ID(), 'fb', true)); ?>"
                                                       target="_blank" class="facebook"> <i
                                                            class="ico-facebook4"></i></a>
                                                <?php }
                                                if (get_post_meta(get_the_ID(), 'gplus', true) != "") { ?>
                                                    <a href="<?php echo esc_url(get_post_meta(get_the_ID(), 'gplus', true)); ?>"
                                                       target="_blank" class="googleplus"><i
                                                            class="ico-google-plus"></i>
                                                    </a>
                                                <?php }
                                                if (get_post_meta(get_the_ID(), 'linkedIn', true) != "") { ?>
                                                    <a href="<?php echo esc_url(get_post_meta(get_the_ID(), 'linkedIn', true)); ?>"
                                                       target="_blank" class="linkedin"><i
                                                            class="ico-linkedin3"></i></a>
                                                <?php } ?>
                                            </div>
                                            <!--<a class="arrow_btn" href="#"><i class="ico-arrow-right4"></i>Full Profile</a>-->
                                        </div>
                                    </div>
                                </div>
                            </div><!-- Col --><?php
                        endwhile;
                    } else {
                        $person_name = array('John', 'Aliya', 'Maxwell', 'Mariya', 'Mr. Smith', 'Suzane', 'Morries', 'Lilly');
                        $person_job = array('Web Designer', 'Graphic Designer', 'Programmer & SEO', 'Photogropher', 'Web Designer', 'Graphic Designer', 'Programmer & SEO', 'Photogropher');
                        $j = 0;
                        for ($i = 1; $i <= 8; $i++) {
                            ?>
                            <div class="col-md-3">
                                <div class="team_block flipp_effect">
                                    <div class="f1_card">
                                        <div class="front face">
									<span class="team_img">
										<img alt="Person Name"
                                             src="<?php echo get_template_directory_uri() . '/images/clients/team1-large.jpg'; ?>">
									</span>
                                            <span class="person_name"><?php echo $person_name[$j]; ?></span>
                                            <span class="person_jop"><?php echo $person_job[$j]; ?></span>
                                        </div>
                                        <div class="back face">
                                            <span class="person_name"><?php echo $person_name[$j]; ?></span>
                                            <span class="person_jop"><?php echo $person_job[$j]; ?></span>
									<span
                                        class="person_desc"><?php _e('Lorem Ipsum is simply dummy to text of the printing and Lorem off typesetting industry, Lorems text Ipsum has been the industrys to standard dummy text . ', 'kyma'); ?></span>

                                            <div class="social_media clearfix">
                                                <a href="#" target="_blank" class="twitter">
                                                    <i class="ico-twitter4"></i>
                                                </a>
                                                <a href="#" target="_blank" class="facebook">
                                                    <i class="ico-facebook4"></i>
                                                </a>
                                                <a href="#" target="_blank" class="googleplus">
                                                    <i class="ico-google-plus"></i>
                                                </a>
                                                <a href="#" target="_blank" class="linkedin">
                                                    <i class="ico-linkedin3"></i>
                                                </a>
                                            </div>
                                            <a class="arrow_btn" href="#"><i
                                                    class="ico-arrow-right4"></i><?php _e('Full Profile', 'kyma'); ?>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div><!-- Col -->
                            <?php $j++;
                        }
                    } ?>
                </div>
            </div>
        </section>
        <?php break;
    case 2:
        ?>
        <section class="content_section">
            <div class="content row_spacer">
                <?php if ($kyma_theme_options['home_team_heading'] != "") { ?>
                    <div class="main_title centered upper">
                    <h2 id="home_team_heading"><span class="line"><i
                                class="ico-user5"></i></span><?php echo esc_attr($kyma_theme_options['home_team_heading']); ?>
                    </h2>
                    </div><?php } ?>
                <div class="team_block3 rows_container clearfix">
                    <?php $all_posts = wp_count_posts('kyma_team')->publish;
                    $args = array('post_type' => 'kyma_team', 'posts_per_page' => $all_posts);
                    $team = new WP_Query($args);
                    if ($team->have_posts()) {
                        while ($team->have_posts()): $team->the_post();
                            $url = wp_get_attachment_image_src(get_post_thumbnail_id(get_the_ID()), 'large');?>
                            <div class="team-col no_padding clearfix" data-color="#0BACB8">
                                <div class="team-col-1">
                                    <a class="member_img2" href="<?php echo esc_url($url[0]); ?>"
                                       data-rel="magnific-popup">
								<span>
									<?php if (has_post_thumbnail()) {
                                        $class = array('class' => 'img-responsive');
                                        the_post_thumbnail('team_square_thumb', $class);
                                    } ?>
								</span>
                                    </a>
                                </div>
                                <div class="team-col-2">
                                    <div class="team-col-2-con">
                                        <a href="#"><span class="person_name"><?php the_title(); ?></span></a>
                                        <span
                                            class="person_jop"><?php echo esc_attr(get_post_meta(get_the_ID(), 'member_designation', true)); ?></span>
                                        <span
                                            class="person_desc"><?php echo substr(get_the_excerpt(), 0, 180); ?></span>

                                        <div class="social_media clearfix">
                                            <?php
                                            if (get_post_meta(get_the_ID(), 'twitter', true) != "") {
                                                ?>
                                            <a href="<?php echo esc_url(get_post_meta(get_the_ID(), 'twitter', true)); ?>"
                                               target="_blank" class="twitter">
                                                    <i class="ico-twitter4"></i>
                                                </a><?php
                                            }
                                            if (get_post_meta(get_the_ID(), 'fb', true) != "") {
                                                ?>
                                            <a href="<?php echo esc_url(get_post_meta(get_the_ID(), 'fb', true)); ?>"
                                               target="_blank" class="facebook">
                                                    <i class="ico-facebook4"></i>
                                                </a><?php
                                            }
                                            if (get_post_meta(get_the_ID(), 'gplus', true) != "") {
                                                ?>
                                            <a href="<?php echo esc_url(get_post_meta(get_the_ID(), 'gplus', true)); ?>"
                                               target="_blank" class="googleplus">
                                                    <i class="ico-google-plus"></i>
                                                </a><?php
                                            }
                                            if (get_post_meta(get_the_ID(), 'linkedIn', true) != "") {
                                                ?>
                                            <a href="<?php echo esc_url(get_post_meta(get_the_ID(), 'linkedIn', true)); ?>"
                                               target="_blank" class="linkedin">
                                                    <i class="ico-linkedin3"></i>
                                                </a><?php
                                            }
                                            ?>
                                        </div>
                                    </div>
                                    <span class="arrow"></span>
                                </div>
                            </div><!-- Col --><?php
                        endwhile;
                    } else {
                        $person_name = array('John', 'Aliya', 'Maxwell', 'Mariya');
                        $person_job = array('Web Designer', 'Graphic Designer', 'Programmer & SEO', 'Photogropher');
                        $j = 0;
                        for ($i = 1; $i <= 4; $i++) {
                            ?>
                            <div class="team-col no_padding clearfix" data-color="#0BACB8">
                                <div class="team-col-1">
                                    <a class="member_img2"
                                       href="<?php echo get_template_directory_uri() . '/images/clients/team1-large.jpg'; ?>"
                                       data-rel="magnific-popup">
								<span>
									<img alt="Person Name"
                                         src="<?php echo get_template_directory_uri() . '/images/clients/team1-large.jpg'; ?>">
								</span>
                                    </a>
                                </div>
                                <div class="team-col-2">
                                    <div class="team-col-2-con">
                                        <a href="#"><span class="person_name"><?php echo $person_name[$j]; ?></span></a>
                                        <span class="person_jop"><?php echo $person_job[$j]; ?></span>
								<span
                                    class="person_desc"><?php _e('Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industrys standard dummy text .', 'kyma'); ?></span>

                                        <div class="social_media clearfix">
                                            <a href="#" target="_blank" class="twitter">
                                                <i class="ico-twitter4"></i>
                                            </a>
                                            <a href="#" target="_blank" class="facebook">
                                                <i class="ico-facebook4"></i>
                                            </a>
                                            <a href="#" target="_blank" class="googleplus">
                                                <i class="ico-google-plus"></i>
                                            </a>
                                            <a href="#" target="_blank" class="linkedin">
                                                <i class="ico-linkedin3"></i>
                                            </a>
                                        </div>
                                    </div>
                                    <span class="arrow"></span>
                                </div>
                            </div><!-- Col -->
                            <?php $j++;
                        }
                    } ?>
                </div>
            </div>
        </section>
        <?php break;
    case 3:
        ?>
        <!-- Our Team 2 -->
        <section class="content_section bg_gray">
            <div class="content row_spacer no_padding">
                <?php if ($kyma_theme_options['home_team_heading'] != "") { ?>
                    <div class="main_title centered upper">
                        <h2><span class="line"><i
                                    class="ico-user5"></i></span><?php echo esc_attr($kyma_theme_options['home_team_heading']); ?>
                        </h2>
                    </div>
                    <span class="spacer30"></span>
                <?php } ?>

                <div class="content_slider our_team_section rows_container clearfix">
                    <?php if ($team->have_posts()) { ?>
                    <div class="content_slide">
                        <?php
                        $i = 0;
                        $pages = ceil($all_posts / 2);
                        while ($team->have_posts()):
                        $team->the_post(); ?>
                        <div class="col-md-6">
                            <div class="team_block2 clearfix">
                                <?php if (has_post_thumbnail()) {
                                    $large_image_url = wp_get_attachment_image_src($attachment_id, 'large');
                                    ?>
                                    <a class="member_img" href="<?php echo esc_url($large_image_url[0]); ?>"
                                       data-rel="magnific-popup">
                                        <?php $class = array('class' => 'img-responsive');
                                        the_post_thumbnail('team_three_thumb', $class); ?>
                                    </a>
                                <?php } ?>
                                <div class="team_detail">
                                    <a href="<?php the_permalink(); ?>"><span
                                            class="person_name"><?php the_title(); ?></span></a>
                                    <span
                                        class="person_jop"><?php echo get_post_meta(get_the_ID(), 'member_designation', true); ?></span>
                                    <span class="person_desc"><?php echo substr(get_the_excerpt(), 0, 180); ?></span>

                                    <div class="social_media clearfix">
                                        <?php if (get_post_meta(get_the_ID(), 'twitter', true) != "") { ?>
                                            <a href="<?php echo esc_url(get_post_meta(get_the_ID(), 'twitter', true)); ?>"
                                               target="_blank" class="twitter">
                                                <i class="ico-twitter4"></i>
                                            </a>
                                        <?php }
                                        if (get_post_meta(get_the_ID(), 'fb', true) != "") { ?>
                                            <a href="<?php echo esc_url(get_post_meta(get_the_ID(), 'fb', true)); ?>"
                                               target="_blank" class="facebook">
                                                <i class="ico-facebook4"></i>
                                            </a>
                                        <?php }
                                        if (get_post_meta(get_the_ID(), 'gplus', true) != "") { ?>
                                            <a href="<?php echo esc_url(get_post_meta(get_the_ID(), 'gplus', true)); ?>"
                                               target="_blank" class="googleplus">
                                                <i class="ico-google-plus"></i>
                                            </a>
                                        <?php }
                                        if (get_post_meta(get_the_ID(), 'linkedIn', true) != "") { ?>
                                            <a href="<?php echo esc_url(get_post_meta(get_the_ID(), 'linkedIn', true)); ?>"
                                               target="_blank" class="linkedin">
                                                <i class="ico-linkedin3"></i>
                                            </a>
                                        <?php } ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Col -->
                        <?php $i++;
                        if ($i % 2 == 0) {
                        ?>
                    </div>
                    <?php if ($i < ($pages * 2)){ ?>
                    <div class="content_slide">
                        <?php }
                        } endwhile; ?>
                        <?php
                        } else {
                            for ($k = 1; $k <= 3; $k++) {
                                ?>
                                <div class="content_slide">
                                    <?php $persopn_name = array('John Boris', 'Nix Maxwell', 'Jack Smith', 'Jhon Deo', 'Mike', 'Jhon Smith');
                                    $persopn_job = array('CCO & Product Manager', 'Manager', 'Photographer', 'Web Developer', 'Programmer & SEO', 'Graphic Designer');
                                    $j = 0;
                                    for ($i = 1; $i <= 2; $i++) {
                                        ?>
                                        <div class="col-md-6">
                                            <div class="team_block2 clearfix">
                                                <a class="member_img"
                                                   href="<?php echo get_template_directory_uri(); ?>/images/icons/team1-large.jpg"
                                                   data-rel="magnific-popup">
                                                    <img alt="Person Name"
                                                         src="<?php echo get_template_directory_uri(); ?>/images/icons/team1-large.jpg">
                                                </a>

                                                <div class="team_detail">
                                                    <a href="#"><span
                                                            class="person_name"><?php echo $persopn_name[$j]; ?></span></a>
                                                    <span class="person_jop"><?php echo $persopn_job[$j]; ?></span>
                                                    <span
                                                        class="person_desc"><?php _e('Lorem Ipsum is simply dummy to text of the printing and Lorem off typesetting industry.', 'kyma'); ?></span>

                                                    <div class="social_media clearfix">
                                                        <a href="#" target="_blank" class="twitter">
                                                            <i class="ico-twitter4"></i>
                                                        </a>
                                                        <a href="#" target="_blank" class="facebook">
                                                            <i class="ico-facebook4"></i>
                                                        </a>
                                                        <a href="#" target="_blank" class="googleplus">
                                                            <i class="ico-google-plus"></i>
                                                        </a>
                                                        <a href="#" target="_blank" class="linkedin">
                                                            <i class="ico-linkedin3"></i>
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div><!-- Col -->
                                        <?php $j++;
                                    } ?>
                                </div>
                            <?php
                            }
                        } ?>
                    </div>
                </div>
        </section>
        <!-- End Our Team 2 -->
    <?php
} ?>