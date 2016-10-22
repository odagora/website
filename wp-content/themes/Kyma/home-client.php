<?php $kyma_theme_options = kyma_theme_options();
$all_posts = wp_count_posts('kyma_client')->publish;
$args = array(
    'post_type' => 'kyma_client',
    'posts_per_page' => $all_posts,
);
$kyma_client = new WP_Query($args);
switch ($kyma_theme_options['home_client_type']) {
    case 1:
        ?>
        <section class="content_section white_section bg_color3">
            <div class="content row_spacer clearfix">
                <div class="our_client_slider"><?php
                    if ($kyma_client->have_posts()) {
                        while ($kyma_client->have_posts()) : $kyma_client->the_post(); ?>
                            <div class="c_logo">
                            <a href="<?php echo esc_url(get_post_meta(get_the_ID(), 'client_button_link', true)); ?>"
                               title="<?php the_title(); ?>" <?php if (get_post_meta(get_the_ID(), 'client_button_target', true)) {
                                echo "target='_blank'";
                            } ?> >
                                <?php $class = array('class' => 'img-responsive');
                                the_post_thumbnail('client_thumb', $class); ?>
                            </a>
                            </div><?php
                        endwhile;
                    } else {
                        for ($i = 1; $i <= 2; $i++) {
                            for ($j = 1; $j <= 5; $j++) {
                                ?>
                                <div class="c_logo">
                                    <img
                                        src="<?php echo get_template_directory_uri(); ?>/images/clients/logo<?php echo $j; ?>.png"
                                        alt="client name">
                                </div>
                            <?php
                            }
                        }
                    } ?>
                </div>
            </div>
        </section>
        <?php
        break;
    case 2:
        ?>
        <!-- Clients -->
        <section class="content_section bg_gray border_b_n">
            <div class="content row_spacer clearfix">
                <div class="our_client_slider">
                    <?php if ($kyma_client->have_posts()) {
                        while ($kyma_client->have_posts()) : $kyma_client->the_post(); ?>
                            <div class="c_logo">
                                <a href="<?php echo esc_url(get_post_meta(get_the_ID(), 'client_button_link', true)); ?>"
                                   title="<?php the_title(); ?>" <?php if (get_post_meta(get_the_ID(), 'client_button_target', true)) {
                                    echo "target='_blank'";
                                } ?> >
                                    <?php $class = array('class' => 'img-responsive');
                                    the_post_thumbnail('client_thumb', $class); ?>
                                </a>
                            </div>
                        <?php endwhile;
                    } else {
                        for ($i = 1; $i <= 2; $i++) {
                            for ($j = 1; $j <= 5; $j++) {
                                ?>
                                <div class="c_logo">
                                    <img
                                        src="<?php echo get_template_directory_uri(); ?>/images/clients/client<?php echo $j; ?>.png"
                                        alt="client name">
                                </div>
                            <?php
                            }
                        }
                    } ?>
                </div>
            </div>
        </section>
        <!-- End Clients  -->
    <?php
} ?>