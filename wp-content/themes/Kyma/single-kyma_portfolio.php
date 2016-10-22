<?php
get_header();
get_template_part('breadcrumbs');
the_post(); ?>
    <!-- Section -->
    <section class="content_section">
        <span class="section_icon"><i class="ico-picture"></i></span>

        <div class="content row_spacer">
            <!--<div class="main_title centered upper">
                <h2><span class="line"><span class="dot"></span></span>Project Details</h2>
            </div> -->
            <!-- Columns Container -->
            <div class="rows_container clearfix">
                <!-- grid 6-->
                <div class="col-md-6"><?php
                    if (metadata_exists('post', $post->ID, '_kyma_portfolio_gallery')) {
                        $product_image_gallery = get_post_meta($post->ID, '_kyma_portfolio_gallery', true);
                    } else {
                        // Backwards compat
                        $attachment_ids = get_posts('post_parent=' . $post->ID . '&numberposts=-1&post_type=attachment&orderby=menu_order&order=ASC&post_mime_type=image&fields=ids');
                        $attachment_ids = array_diff($attachment_ids, array(get_post_thumbnail_id()));
                        $product_image_gallery = implode(',', $attachment_ids);
                    }
                    $attachments = array_filter(explode(',', $product_image_gallery));
                    if ($attachments) {
                        ?>
                        <div class="thumbs_gall_slider_con content_thumbs_gall gall_arrow2 clearfix">
                        <div class="thumbs_gall_slider_larg owl-carousel"><?php
                            if (has_post_thumbnail()) {
                                $large_image_url = wp_get_attachment_image_src(get_post_thumbnail_id(get_the_ID()), 'large');
                                $single_port_src = wp_get_attachment_image_src(get_post_thumbnail_id(get_the_ID()), 'portfolio_single_gallery_image');
                                echo ' <div class="item"><a href="' . esc_url($large_image_url[0]) . '"><img class="img-responsive" src="' . esc_url($single_port_src[0]) . '"/></a></div>';
                            }
                            foreach ($attachments as $attachment_id) {
                                $large_image_url = wp_get_attachment_image_src($attachment_id, 'large');								;
								$single_port_src = wp_get_attachment_image_src($attachment_id, 'portfolio_single_gallery_image');
                                echo ' <div class="item"><a href="' . esc_url($large_image_url[0]) . '"><img class="img-responsive" src="' . esc_url($single_port_src[0]) . '"/></a></div>';
                            } ?>
                        </div>
                        <div class="gall_thumbs owl-carousel"><?php
                            if (has_post_thumbnail()) {	
					$port_single_thumb = wp_get_attachment_image_src(get_post_thumbnail_id(get_the_ID()), 'portfolio_single_gallery_thumb');
                                echo ' <div class="item"><img class="img-responsive" src="' .esc_url($port_single_thumb[0]) . '"/></div>';
                            }
                            foreach ($attachments as $attachment_id) {
                               $port_single_thumb = wp_get_attachment_image_src($attachment_id, 'portfolio_single_gallery_thumb');
                                echo ' <div class="item"><img class="img-responsive" src="' .esc_url($port_single_thumb[0]) . '"/></div>';
                            }?>
                        </div>
                        </div><?php
                    } else {
                        if (has_post_thumbnail()) {
                            $large_image_url = wp_get_attachment_image_src(get_post_thumbnail_id(get_the_ID()), 'large');
							$port_single_gall = wp_get_attachment_image_src(get_post_thumbnail_id(get_the_ID()), 'portfolio_single_gallery_image');
                            echo ' <div class="item"><a href="' . esc_url($large_image_url[0]) . '" class="magnific-popup img_popup"><img class="img-responsive" src="' . esc_url($port_single_gall[0]) . '"/><span>
							<i class="ico-maximize"></i>
						</span></a></div>';
                        }
                    }?>
                </div>
                <!-- End grid 6-->

                <!-- grid 6-->
                <div class="col-md-6">
                    <h2 class="title1 upper"><?php the_title(); ?></h2>
                    <span
                        class="desc"><?php echo esc_textarea(get_post_meta(get_the_ID(), 'portfolio_short_desc', true)); ?>
                        <span class="spacer20"></span>
                    <!-- Social Share-->
                    <div>
                        <div id="share_on_socials">
                            <span class="social_share_btn"><?php _e('Share :', 'kyma'); ?></span>
                            <a class="facebook" href="https://www.facebook.com/sharer/sharer.php?u=<?php echo get_permalink(); ?>" target="_blank"><i class="ico-facebook4"></i></a>
							<a class="twitter" href="http://twitter.com/home?status=<?php echo get_the_title(); ?>+<?php echo get_the_permalink(); ?>" target="_blank"><i class="ico-twitter4"></i></a>
							<a class="googleplus" href="https://plus.google.com/share?url=<?php the_permalink(); ?>" target="_blank"><i class="ico-google-plus"></i></a>
							<a class="pinterest" href="http://pinterest.com/pin/create/bookmarklet/?media=<?php echo esc_url($large_image_url[0]); ?>&amp;url=<?php echo get_the_permalink(); ?>&amp;is_video=false&amp;description=<?php echo get_the_title(); ?>" target="_blank"><i class="ico-pinterest-p"></i></a>
							<a class="linkedin" href="http://www.linkedin.com/shareArticle?mini=true&amp;url=<?php the_permalink(); ?>&amp;title=<?php echo get_the_title(); ?>&amp;source=<?php echo get_the_permalink(); ?>" target="_blank"><i class="ico-linkedin3"></i></a>
							<a class="email" href="mailto:mail@mail.com?subject=<?php echo get_the_title(); ?>&amp;body=<?php echo get_the_permalink(); ?>"><i class="ico-envelope-o"></i></a>
			
                            <a class="delicious" href="http://del.icio.us/post?url=<?php echo get_the_permalink(); ?>&amp;title=<?php echo get_the_title(); ?>&amp;notes=<?php echo get_the_excerpt(); ?>" target="_blank"><i class="ico-delicious"></i></a>
							<a class="tumblr" href="http://www.tumblr.com/share?v=3&amp;u=<?php echo get_the_permalink(); ?>&amp;t=<?php echo get_the_title(); ?>" target="_blank"><i class="ico-tumblr"></i></a>

                        </div>
                    </div>
                    <!-- End Social Share-->
                    <span class="spacer30"></span>
                        <?php if (get_post_meta(get_the_ID(), 'portfolio_button_text', true) != "") { ?>
                            <div>
                            <a class="btn_a color2 medium_btn bottom_space"
                               target="<?php echo esc_attr(get_post_meta(get_the_ID(), 'portfolio_button_target', true)); ?>"
                               href="<?php echo esc_url(get_post_meta(get_the_ID(), 'portfolio_button_link', true)); ?>">
							<span>
								<i class="in_left <?php echo esc_attr(get_post_meta(get_the_ID(), 'portfolio_button_icon', true)); ?>"></i>
								<span><?php echo esc_attr(get_post_meta(get_the_ID(), 'portfolio_button_text', true)); ?></span>
								<i class="in_right <?php echo esc_attr(get_post_meta(get_the_ID(), 'portfolio_button_icon', true)); ?>"></i>
							</span>
                            </a>
                            </div><?php
                        } ?>
                </div>
                <!-- End grid 6-->
            </div>
            <!-- End Columns Container -->
        </div>
    </section>
    <section class="content_section bg_gray">
        <span class="section_icon"><i class="ico-bargraph"></i></span>

        <div class="content row_spacer">
            <!-- Tabs Container -->
            <div class="hm-tabs tabs1 ver_tabs upper_title">
                <nav>
                    <ul class="tabs-navi">
                        <li>
                            <a data-content="details" class="selected" href="#">
                                <span><i class="ico-laptop4"></i></span><?php _e('Details', 'kyma'); ?>
                            </a>
                        </li>
                        <?php if (get_post_meta(get_the_ID(), 'portfolio_skill', true) != "") { ?>
                            <li>
                            <a data-content="features" href="#">
                                <span><i class="ico-eye3"></i></span><?php _e('Features', 'kyma'); ?>
                            </a>
                            </li><?php
                        }
                        if (get_post_meta(get_the_ID(), 'portfolio_additional_info', true) != "") {
                            ?>
                            <li>
                            <a data-content="additional" href="#">
                                <span><i
                                        class="ico-check3"></i></span><?php _e('Additional Info', 'kyma'); ?>
                            </a>
                            </li><?php
                        }
                        ?>
                    </ul>
                </nav>

                <ul class="tabs-body">
                    <li data-content="details" class="selected">
                        <!-- <h2 class="title1 title_color2 upper">Project Details</h2> -->

                        <ul class="list4">
                            <li>
                                <i class="ico-check4"></i>
                                <b><?php _e('Category:', 'kyma'); ?> </b> <?php echo custom_taxonomies_terms_links(); ?>
                            </li>
                            <?php if (get_post_meta(get_the_ID(), 'portfolio_client', true) != "") { ?>
                                <li>
                                <i class="ico-check4"></i>
                                <b><?php _e('Client:', 'kyma'); ?> </b> <?php echo esc_attr(get_post_meta(get_the_ID(), 'portfolio_client', true)); ?>
                                </li><?php
                            }
                            if (get_post_meta(get_the_ID(), 'portfolio_url', true)) {
                                ?>
                                <li>
                                <i class="ico-check4"></i>
                                <b><?php _e('URL:', 'kyma'); ?> </b> <?php echo esc_attr(get_post_meta(get_the_ID(), 'portfolio_url', true)); ?>
                                </li><?php
                            }
                            ?>
                            <li>
                                <i class="ico-check4"></i>
                                <b><?php _e('Date:', 'kyma'); ?> </b> <?php echo get_post_time(get_option('date_format')); ?>
                            </li>
                            <li>
                                <i class="ico-check4"></i>
                                <b><?php _e('Added By:', 'kyma'); ?> </b><?php the_author_link(); ?></li>
                    </li>
                </ul>

                </li>
                <li data-content="features">
                    <ul class="list1 clearfix"><?php
                        $features = explode(',', get_post_meta(get_the_ID(), 'portfolio_skill', true));
                        foreach ($features as $feature) {
                            ?>
                            <li><?php echo esc_attr($feature); ?></li><?php
                        }
                        ?>
                    </ul>
                </li>
                <li data-content="additional">
                    <div class="table-responsive">
                        <?php echo esc_textarea(get_post_meta(get_the_ID(), 'portfolio_additional_info', true)); ?>
                    </div>
                </li>

                </ul>
            </div>
            <!-- End Tabs Container -->
            <?php the_content(); ?>
        </div>
    </section>
    <!-- Related Projects -->
<?php
$terms = get_the_terms($post->ID, 'portfolio_taxonomy');
if ($terms && !is_wp_error($terms)) :
    $draught_links = array();
    foreach ($terms as $term) {
        $draught_links[] = $term->name;
    }
    $category = join(", ", $draught_links);
endif;

$all_posts = wp_count_posts('kyma_portfolio')->publish;
$post_type = 'kyma_portfolio';
$tax = 'portfolio_taxonomy';
$args = array(
    'post_type' => $post_type,
    'portfolio_taxonomy' => $category,
    'post__not_in' => array($post->ID),
    'posts_per_page' => $all_posts,
    'post_status' => 'publish'
);
$kyma_portfolio = null;
$kyma_portfolio = new WP_Query($args);
if ($kyma_portfolio->have_posts()) {
    ?>
    <section class="content_section">
        <div class="title_banner upper centered">
            <div class="content">
                <h2><?php _e('Related Projects', 'kyma'); ?></h2>
            </div>
        </div>
        <div class="featured_slider full_carousel has_hoverdir"><?php
            while ($kyma_portfolio->have_posts()) : $kyma_portfolio->the_post();?>
                <div class="featured_slide_block"><?php
                $large_image_url = wp_get_attachment_image_src(get_post_thumbnail_id(get_the_ID()), 'large');
                $thumb_url = wp_get_attachment_image_src(get_post_thumbnail_id(get_the_ID()), 'related_portfolio_thumb');
                ?>
                <a href="<?php echo esc_url($large_image_url[0]); ?>" class="featured_slide_img"
                   data-rel="magnific-popup">
						<span class="img_cart_con_normal">
							<img class="img-responsive" src="<?php echo esc_url($thumb_url[0]); ?>"
                                 alt="<?php the_title_attribute(); ?>">
						</span>
                </a>
                <div class="hoverdir_con">
                    <div class="hoverdir_meta clearfix">
                        <h6 class="proj_name"><?php the_title(); ?></h6>
                        <span class="proj_date"><?php echo get_post_time(get_option('date_format')); ?></span>
                        <a class="expand_img" href="#"><?php _e('View Larger', 'kyma'); ?></a>
                        <a href="<?php if (get_post_meta(get_the_ID(), 'portfolio_link', true) != "") {
                            echo esc_url(get_post_meta(get_the_ID(), 'portfolio_link', true));
                        } else {
                            the_permalink();
                        } ?>" class="detail_link"><?php _e('More Details', 'kyma'); ?></a>
                    </div>
                </div>
                </div><?php
            endwhile;
            ?>
        </div>
    </section>
<?php } ?>
<?php
get_template_part('home', 'client');
get_footer(); ?>