<?php
/**
 * Template name: Portfolio Masonry Style2 Boxed
 */
get_header();
get_template_part('breadcrumbs');
$kyma_theme_options = kyma_theme_options(); ?>
    <!-- Isotope Filter Masonry -->
    <section class="content_section bg_gray border_t_n">
        <div class="content row_spacer_t clearfix">

            <div class="content">
                <div class="main_title centered upper">
                    <h2><span class="line"></span><?php the_title(); ?></h2>
                </div>
            </div>
            <?php $terms = get_terms('portfolio_taxonomy', 'orderby=count&hide_empty=1'); ?>
            <!-- Filter Content -->
            <div
                class="hm_filter_wrapper masonry_porto five_portos project_text_nav full_portos no_sapce_portos porto_full_desc upper_title">
                <?php if (!empty($terms) && !is_wp_error($terms)) { ?>
                    <div id="options" class="sort_options clearfix">
                        <ul data-option-key="filter" class="option-set clearfix" id="filter-by">
                            <?php foreach ($terms as $term) { ?>
                                <li><a data-option-value=".<?php echo $term->name; ?>" class=""
                                       href="#"><span><?php echo Ucfirst($term->name); ?></span><span
                                            class="num"></span></a></li>
                            <?php } ?>
                        </ul>
                        <div class="sort_list">
                            <a href="#" class="sort_selecter">
                                <span class="text"><?php _e('Sort By', 'kyma'); ?></span>
                                <span class="arrow"><i class="ico-arrow-back"></i></span>
                            </a>
                            <ul data-option-key="sortBy" class="option-set clearfix" id="sort-by">
                                <li><a data-option-value="name" href="#" class=""><span
                                            class="text"><?php _e('name', 'kyma'); ?></span></a></li>
                                <li><a data-option-value="number" href="#" class=""><span
                                            class="text"><?php _e('date', 'kyma'); ?></span></a></li>
                            </ul>
                        </div>
                        <ul data-option-key="sortAscending" class="option-set clearfix" id="sort-direction">
                            <li><a class="selected" data-option-value="true" href="#">
                                    <span><i class="ico-keyboard-arrow-up"></i></span></a>
                            </li>
                            <li><a data-option-value="false" href="#" class="">
                                    <span><i class="ico-keyboard-arrow-down"></i></span></a>
                            </li>
                        </ul>
                    </div>
                <?php } ?>
                <div class="hm_filter_wrapper_con">
                    <?php
                    $all_posts = wp_count_posts('kyma_portfolio')->publish;
                    $args = array(
                        'post_type' => 'kyma_portfolio',
                        'posts_per_page' => $all_posts,
                    );
                    $kyma_portfolio = new WP_Query($args);
                    if ($kyma_portfolio->have_posts()) {
                        $effct = array('', ' width2 ', '', ' rectangle_width ');
                        while ($kyma_portfolio->have_posts()) : $kyma_portfolio->the_post();
                            $term_list = wp_get_post_terms($post->ID, 'portfolio_taxonomy', array("fields" => "names"));
                            $terms = implode(" ", $term_list);?>
                            <div class="filter_item_block <?php echo $effct[array_rand($effct)];
                            echo esc_attr($terms); ?>">
                                <div class="porto_block porto_animate">
                                    <div class="porto_type">
                                        <?php
                                        $large_image_url = wp_get_attachment_image_src(get_post_thumbnail_id(get_the_ID()), 'large');
                                        $thumb_url = wp_get_attachment_image_src(get_post_thumbnail_id(get_the_ID()), ''); ?>
                                        <a data-rel="magnific-popup" href="<?php echo esc_url($large_image_url[0]); ?>">
                                            <img class="img-responsive" src="<?php echo esc_url($thumb_url[0]); ?>"
                                                 alt="<?php the_title_attribute(); ?>">
                                        </a>
                                    </div>
                                    <div class="porto_desc">
                                        <div class="porto_meta clearfix">
                                            <h6 class="name"><?php the_title(); ?></h6>
                                            <span class="porto_date"><span
                                                    class="number"><?php echo get_post_time('Ymd', true); ?></span><?php echo get_post_time(get_option('date_format'), true); ?></span>
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
                                </div>
                            </div><!-- Item -->
                        <?php endwhile;
                    } ?>
                </div>
            </div>
            <!-- End Filter Content -->

        </div>
    </section>
    <!-- End Isotope Filter Masonry -->
<?php the_post();
the_content(); ?>
<?php get_footer(); ?>