<?php $kyma_theme_options = kyma_theme_options();
if (!$kyma_theme_options['portfolio_home']) return;
$style = $kyma_theme_options['portfolio_style'];
?>
<section id="portfolio" class="content_section <?php if ($style == "porto_masonry") {
    echo "bg_white border_b_n";
} ?>">
<div class="<?php if ($style == "porto_masonry") {
    echo "row_spacer_t";
} else {
    echo "row_spacer";
} ?> clearfix">
<div class="content">
    <div class="main_title centered upper"><?php if ($kyma_theme_options['port_heading'] != "") { ?>
            <h2 id="port_head"><span class="line"><i
                    class="fa fa fa-building-o"></i></span><?php echo esc_attr($kyma_theme_options['port_heading']); ?>
            </h2><?php
        } ?>
    </div>
</div><?php
if ($style == "") {
    $style1 = "";
} elseif ($style == "porto_animate") {
    $style1 = "porto_full_desc project_text_nav ";
} elseif ($style == "porto_masonry") {
    $style1 = "project_text_nav nav_in_center upper_title porto_hidden_title ";
}
$terms = get_terms('portfolio_taxonomy', 'orderby=name&hide_empty=1');?>
<!-- Filter Content -->
<div class="hm_filter_wrapper <?php echo $style1;
echo esc_attr($kyma_theme_options['portfolio_column'] . ' ' . $kyma_theme_options['portfolio_width'] . ' ' . $kyma_theme_options['port_has_space']); ?> project_text_nav nav_with_nums upper_title upper_title">

<div class="hm_filter_wrapper_con"><?php
$image_size = '';
switch ($kyma_theme_options['portfolio_column']) {
    case 'two_blocks':
        $image_size = $kyma_theme_options['portfolio_width'] == 'full_portos' ? 'portfolio_two_image_full' : 'portfolio_two_image';
        break;
    case 'four_blocks':
        $image_size = $kyma_theme_options['portfolio_width'] == 'full_portos' ? 'portfolio_four_image_full' : 'portfolio_four_image';
        break;
    case 'three_blocks':
        $image_size = $kyma_theme_options['portfolio_width'] == 'full_portos' ? 'portfolio_three_image_full' : 'portfolio_three_image';
}
$all_posts = wp_count_posts('kyma_portfolio')->publish;
$args = array(
    'post_type' => 'kyma_portfolio',
    'posts_per_page' => $all_posts
);
$kyma_portfolio = new WP_Query($args);
if ($kyma_portfolio->have_posts()) {
    while ($kyma_portfolio->have_posts()) : $kyma_portfolio->the_post();
        $term_list = wp_get_post_terms($post->ID, 'portfolio_taxonomy', array("fields" => "slugs"));
        $terms = implode(" ", $term_list);?>
        <div class="filter_item_block <?php echo esc_attr($terms); ?>">
            <div class="porto_block <?php echo esc_attr($style); ?>">
                <div class="porto_type"><?php
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
                        <div class="porto_galla"><?php
                        foreach ($attachments as $attachment_id) {
                            $large_image_url = wp_get_attachment_image_src($attachment_id, 'large');
                            $port_img_src = wp_get_attachment_image_src($attachment_id, $image_size);
                            echo '<a data-rel="' . get_the_title() . '" href="' . esc_url($large_image_url[0]) . '"><img class="img-responsive" src="' . $port_img_src[0] . '"/></a>';
                        }
                        $large_image_url = wp_get_attachment_image_src(get_post_thumbnail_id(get_the_ID()), 'large');
                        $thumb_url = wp_get_attachment_image_src(get_post_thumbnail_id(get_the_ID()), $image_size);?>
                        <a data-rel="<?php echo get_the_title(); ?>"
                           href="<?php echo esc_url($large_image_url[0]); ?>">
                            <img class="img-responsive" src="<?php echo esc_url($thumb_url[0]); ?>"
                                 alt="<?php the_title_attribute(); ?>">
                        </a>
                        </div><?php
                    } else {
                        $large_image_url = wp_get_attachment_image_src(get_post_thumbnail_id(get_the_ID()), 'large');
                        $thumb_url = wp_get_attachment_image_src(get_post_thumbnail_id(get_the_ID()), $image_size); ?>
                        <a data-rel="magnific-popup" href="<?php echo esc_url($large_image_url[0]); ?>">
                            <img class="img-responsive" src="<?php echo esc_url($thumb_url[0]); ?>"
                                 alt="<?php the_title_attribute(); ?>">
                        </a>
                    <?php
                    }
                    if ($style == "") {
                        ?>
                        <div class="porto_nav">
                        <a href="<?php echo esc_url($large_image_url[0]); ?>"
                           class="expand_img"><?php _e('Ver Grande', 'kyma'); ?></a>
                        </div><?php
                    } ?>
                    <?php if ($style == "porto_masonry") { ?>
                        <div class="porto_nav">
                            <a href="<?php echo esc_url($large_image_url[0]); ?>" class="icon_expand"><span><i
                                        class="ico-maximize"></i></span></a>
                            <a href="<?php if (get_post_meta(get_the_ID(), 'portfolio_link', true) != "") {
                                echo esc_url(get_post_meta(get_the_ID(), 'portfolio_link', true));
                            } else {
                                the_permalink();
                            } ?>" class="detail_link icon_expand1"><span><i class="ico-link2"></i></span></a>
                        </div>
                    <?php } ?>
                </div>
                <?php if ($style == "porto_animate" || $style == "") { ?>
                    <div class="porto_desc"><?php if ($style == "porto_animate"){ ?>
                        <div class="porto_meta clearfix"><?php
                            } ?>
                            <h6 class="name"><?php the_title(); ?></h6>
                            <?php if ($style == "porto_animate"){ ?>
                            <a href="<?php echo esc_url($large_image_url[0]); ?>"
                               class="expand_img"><?php _e('Ver Grande', 'kyma'); ?></a>
                        </div><?php
                    } ?>
                    </div>
                <?php } ?>
                <?php if ($style == "porto_masonry") { ?>
                    <div class="porto_desc">
                        <h6 class="name"><?php the_title(); ?></h6>
                    </div>
                <?php } ?>
            </div>
        </div><!-- Item --><?php
    endwhile;
} else {
?>
<!-- Filter Content -->
<div
    class="hm_filter_wrapper three_blocks project_text_nav boxed_portos has_sapce_portos nav_with_nums upper_title upper_title">

<div class="hm_filter_wrapper_con">
    <div class="filter_item_block video">
        <div class="porto_block">
            <div class="porto_type">
                <a data-rel="magnific-popup"
                   href="<?php echo get_template_directory_uri(); ?>/images/portfolio/item1.jpg">
                    <img src="<?php echo get_template_directory_uri(); ?>/images/portfolio/item1.jpg"
                         alt="Portfolio Name">
                </a>

                <div class="porto_nav">
                    <a href="#" class="expand_img"><?php _e('Ver Grande', 'kyma'); ?></a>
                    <a href="#" class="detail_link"><?php _e('More Details', 'kyma'); ?></a>
                </div>
            </div>
            <div class="porto_desc">
                <h6 class="name"><?php _e('Flat Logo Design', 'kyma'); ?></h6>

                <div class="porto_meta clearfix">
                    <span class="porto_date"><span
                            class="number"><?php _e('20141213', 'kyma'); ?></span><?php _e('December 13, 2014', 'kyma'); ?></span>
                        <span class="porto_nums">
                            <span class="comm"><i class="ico-comments"></i><span
                                    class="comm_counter"><?php _e('45', 'kyma'); ?></span></span>
                            <span class="like"><i class="ico-heart2"></i><span
                                    class="like_counter"><?php _e('120', 'kyma'); ?></span></span>
                        </span>
                </div>
            </div>
        </div>
    </div>
    <!-- Item -->
    <div class="filter_item_block design video printing wordpress">
        <div class="porto_block">
            <div class="porto_type">
                <a data-rel="magnific-popup"
                   href="<?php echo get_template_directory_uri(); ?>/images/portfolio/item2.jpg">
                    <img src="<?php echo get_template_directory_uri(); ?>/images/portfolio/item2.jpg"
                         alt="Portfolio Name">
                </a>

                <div class="porto_nav">
                    <a href="#" class="expand_img"><?php _e('Ver Grande', 'kyma'); ?></a>
                    <a href="#" class="detail_link"><?php _e('More Details', 'kyma'); ?></a>
                </div>
            </div>
            <div class="porto_desc">
                <h6 class="name"><?php _e('Dawn of Justice', 'kyma'); ?></h6>

                <div class="porto_meta clearfix">
                    <span class="porto_date"><span
                            class="number"><?php _e('20141215', 'kyma'); ?></span><?php _e('December 15, 2014', 'kyma'); ?></span>
                        <span class="porto_nums">
                            <span class="comm"><i class="ico-comments"></i><span
                                    class="comm_counter"><?php _e('12', 'kyma'); ?></span></span>
                            <span class="like"><i class="ico-heart2"></i><span
                                    class="like_counter"><?php _e('100', 'kyma'); ?></span></span>
                        </span>
                </div>
            </div>
        </div>
    </div>
    <!-- Item -->

    <div class="filter_item_block design wordpress">
        <div class="porto_block">
            <div class="porto_type">
                <a data-rel="magnific-popup"
                   href="<?php echo get_template_directory_uri(); ?>/images/portfolio/item3.jpg">
                    <img src="<?php echo get_template_directory_uri(); ?>/images/portfolio/item3.jpg"
                         alt="Portfolio Name">
                </a>

                <div class="porto_nav">
                    <a href="#" class="expand_img"><?php _e('Ver Grande', 'kyma'); ?></a>
                    <a href="#" class="detail_link"><?php _e('More Details', 'kyma'); ?></a>
                </div>
            </div>
            <div class="porto_desc">
                <h6 class="name"><?php _e('Fly On the sky', 'kyma'); ?></h6>

                <div class="porto_meta clearfix">
                    <span class="porto_date"><span
                            class="number"><?php _e('20141210', 'kyma'); ?></span><?php _e('December 10, 2014', 'kyma'); ?></span>
                        <span class="porto_nums">
                            <span class="comm"><i class="ico-comments"></i><span
                                    class="comm_counter"><?php _e('20', 'kyma'); ?></span></span>
                            <span class="like"><i class="ico-heart2"></i><span
                                    class="like_counter"><?php _e('263', 'kyma'); ?></span></span>
                        </span>
                </div>
            </div>
        </div>
    </div>
    <!-- Item -->
    <div class="filter_item_block printing wordpress">
        <div class="porto_block">
            <div class="porto_type">
                <a data-rel="magnific-popup"
                   href="<?php echo get_template_directory_uri(); ?>/images/portfolio/item4.jpg">
                    <img src="<?php echo get_template_directory_uri(); ?>/images/portfolio/item4.jpg"
                         alt="Portfolio Name">
                </a>

                <div class="porto_nav">
                    <a href="#" class="expand_img"><?php _e('Ver Grande', 'kyma'); ?></a>
                    <a href="#" class="detail_link"><?php _e('More Details', 'kyma'); ?></a>
                </div>
            </div>
            <div class="porto_desc">
                <h6 class="name"><?php _e('Dawn of Justice', 'kyma'); ?></h6>

                <div class="porto_meta clearfix">
                    <span class="porto_date"><span
                            class="number"><?php _e('20141215', 'kyma'); ?></span><?php _e('December 15, 2014', 'kyma'); ?></span>
                        <span class="porto_nums">
                            <span class="comm"><i class="ico-comments"></i><span
                                    class="comm_counter"><?php _e('12', 'kyma'); ?></span></span>
                            <span class="like"><i class="ico-heart2"></i><span
                                    class="like_counter"><?php _e('100', 'kyma'); ?></span></span>
                        </span>
                </div>
            </div>
        </div>
    </div>
    <!-- Item -->

    <div class="filter_item_block design printing">
        <div class="porto_block">
            <div class="porto_type">
                <a data-rel="magnific-popup"
                   href="<?php echo get_template_directory_uri(); ?>/images/portfolio/item5.jpg">
                    <img src="<?php echo get_template_directory_uri(); ?>/images/portfolio/item5.jpg"
                         alt="Portfolio Name">
                </a>

                <div class="porto_nav">
                    <a href="#" class="expand_img"><?php _e('Ver Grande', 'kyma'); ?></a>
                    <a href="#" class="detail_link"><?php _e('More Details', 'kyma'); ?></a>
                </div>
            </div>
            <div class="porto_desc">
                <h6 class="name"><?php _e('Retina Ready', 'kyma'); ?></h6>

                <div class="porto_meta clearfix">
                    <span class="porto_date"><span
                            class="number"><?php _e('20141210', 'kyma'); ?></span><?php _e('December 1, 2015', 'kyma'); ?></span>
                        <span class="porto_nums">
                            <span class="comm"><i class="ico-comments"></i><span
                                    class="comm_counter"><?php _e('15', 'kyma'); ?></span></span>
                            <span class="like"><i class="ico-heart2"></i><span
                                    class="like_counter"><?php _e('156', 'kyma'); ?></span></span>
                        </span>
                </div>
            </div>
        </div>
    </div>
    <!-- Item -->

    <div class="filter_item_block video wordpress" style="padding-bottom: 90px;">
        <div class="porto_block">
            <div class="porto_type">
                <a data-rel="magnific-popup"
                   href="<?php echo get_template_directory_uri(); ?>/images/portfolio/item6.jpg">
                    <img src="<?php echo get_template_directory_uri(); ?>/images/portfolio/item6.jpg"
                         alt="Portfolio Name">
                </a>

                <div class="porto_nav">
                    <a href="#" class="expand_img"><?php _e('Ver Grande', 'kyma'); ?></a>
                    <a href="#" class="detail_link"><?php _e('More Details', 'kyma'); ?></a>
                </div>
            </div>
            <div class="porto_desc">
                <h6 class="name"><?php _e('Business Purpose Theme', 'kyma'); ?></h6>

                <div class="porto_meta clearfix">
                    <span class="porto_date"><span
                            class="number"><?php _e('20141115', 'kyma'); ?></span><?php _e('December 10, 2015', 'kyma'); ?></span>
                        <span class="porto_nums">
                            <span class="comm"><i class="ico-comments"></i><span
                                    class="comm_counter"><?php _e('25', 'kyma'); ?></span></span>
                            <span class="like"><i class="ico-heart2"></i><span
                                    class="like_counter"><?php _e('221', 'kyma'); ?></span></span>
                        </span>
                </div>
            </div>
        </div>
    </div>
    <!-- Item -->
</div>
<?php } ?>
</div>
</div><?php
?>
<!-- End Filter Content -->
</div>
</section>