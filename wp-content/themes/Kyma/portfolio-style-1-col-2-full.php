<?php
/**
 * Template name: Portfolio Style-1-col-2 Full
 */
get_header();
get_template_part('breadcrumbs');
$kyma_theme_options = kyma_theme_options(); ?>
    <section id="portfolio" class="content_section">
        <div class="row_spacer clearfix">
            <div class="content">
                <div class="main_title centered upper">
                    <h2 id="port_head"><span class="line"><i
                                class="fa fa-folder-open-o"></i></span><?php the_title(); ?>
                    </h2>
                </div>
            </div><?php $terms = get_terms('portfolio_taxonomy', 'orderby=count&hide_empty=1'); ?>
            <!-- Filter Content -->
            <div
                class="hm_filter_wrapper two_blocks full_portos has_sapce_portos project_text_nav nav_with_nums upper_title upper_title"><?php
                if (!empty($terms) && !is_wp_error($terms)) {
                    ?>
                    <div id="options" class="sort_options clearfix">
                    <ul data-option-key="filter" class="option-set clearfix" id="filter-by">
                        <?php foreach ($terms as $term) { ?>
                            <li><a data-option-value=".<?php echo $term->name; ?>" class=""
                                   href="#"><span><?php echo Ucfirst($term->name); ?></span><span
                                        class="num"></span></a>
                            </li>
                        <?php } ?>
                    </ul>
                    <div class="sort_list">
                        <a href="#" class="sort_selecter">
                            <span class="text"><?php _e('Sort By', 'kyma'); ?></span>
                            <span class="arrow"><i class="fa fa-sort"></i></span>
                        </a>
                        <ul data-option-key="sortBy" class="option-set clearfix" id="sort-by">
                            <!-- <li><a data-option-value="original-order" class="selected" href="#"><span class="text">original order</span></a></li> -->
                            <li><a data-option-value="name" href="#" class=""><span
                                        class="text"><?php _e('name', 'kyma'); ?></span></a></li>
                            <li><a data-option-value="number" href="#" class=""><span
                                        class="text"><?php _e('date', 'kyma'); ?></span></a></li>
                        </ul>
                    </div>
                    <ul data-option-key="sortAscending" class="option-set clearfix" id="sort-direction">
                        <li><a class="selected" data-option-value="true" href="#">
                                <span><i class="fa fa-angle-up"></i></span></a>
                        </li>
                        <li><a data-option-value="false" href="#" class="">
                                <span><i class="fa fa-angle-down"></i></span></a>
                        </li>
                    </ul>
                    </div><?php
                } ?>

                <div class="hm_filter_wrapper_con"><?php
                    $all_posts = wp_count_posts('kyma_portfolio')->publish;
                    $args = array(
                        'post_type' => 'kyma_portfolio',
                        'posts_per_page' => $all_posts,
                    );
                    $kyma_portfolio = new WP_Query($args);
                    if ($kyma_portfolio->have_posts()) {
                        while ($kyma_portfolio->have_posts()) : $kyma_portfolio->the_post();
                            $term_list = wp_get_post_terms($post->ID, 'portfolio_taxonomy', array("fields" => "names"));
                            $terms = implode(" ", $term_list);?>
                            <div class="filter_item_block <?php echo esc_attr($terms); ?>">
                                <div class="porto_block">
                                    <div
                                        class="porto_type"><?php if (metadata_exists('post', $post->ID, '_kyma_portfolio_gallery')) {
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
                                                $port_img_src = wp_get_attachment_image_src($attachment_id, 'portfolio_two_image_full');
                                                echo '<a data-rel="' . get_the_title() . '" href="' . esc_url($large_image_url[0]) . '"><img class="img-responsive" src="' . $port_img_src[0] . '"/></a>';
                                            }
                                            $large_image_url = wp_get_attachment_image_src(get_post_thumbnail_id(get_the_ID()), 'large');
                                            $thumb_url = wp_get_attachment_image_src(get_post_thumbnail_id(get_the_ID()), 'portfolio_two_image_full');?>
                                            <a data-rel="<?php echo get_the_title(); ?>"
                                               href="<?php echo esc_url($large_image_url[0]); ?>">
                                                <img class="img-responsive" src="<?php echo esc_url($thumb_url[0]); ?>"
                                                     alt="<?php the_title_attribute(); ?>">
                                            </a>
                                            </div><?php
                                        } else {
                                            $large_image_url = wp_get_attachment_image_src(get_post_thumbnail_id(get_the_ID()), 'large');
                                            $thumb_url = wp_get_attachment_image_src(get_post_thumbnail_id(get_the_ID()), 'portfolio_two_image_full'); ?>
                                            <a data-rel="magnific-popup"
                                               href="<?php echo esc_url($large_image_url[0]); ?>">
                                                <img class="img-responsive" src="<?php echo esc_url($thumb_url[0]); ?>"
                                                     alt="<?php the_title_attribute(); ?>">
                                            </a>
                                        <?php
                                        } ?>
                                        <div class="porto_nav">
                                            <a href="<?php echo esc_url($large_image_url[0]); ?>"
                                               class="expand_img"><?php _e('View Larger', 'kyma'); ?></a>
                                            <a href="<?php if (get_post_meta(get_the_ID(), 'portfolio_link', true) != "") {
                                                echo esc_url(get_post_meta(get_the_ID(), 'portfolio_link', true));
                                            } else {
                                                the_permalink();
                                            } ?>"
                                               class="detail_link"><?php _e('More Details', 'kyma'); ?></a>
                                        </div>
                                    </div>
                                    <div class="porto_desc">
                                        <h6 class="name"><?php the_title(); ?></h6>
                                        <span class="porto_date"><span
                                                class="number"><?php echo get_post_time('Ymd', true); ?></span><?php echo get_post_time(get_option('date_format'), true); ?></span>
                                    </div>
                                </div>
                            </div><!-- Item --><?php
                        endwhile;
                    } ?>
                </div>
            </div><?php
            ?>
            <!-- End Filter Content -->
        </div>
    </section>
<?php the_post();
the_content(); ?>
<?php get_footer(); ?>