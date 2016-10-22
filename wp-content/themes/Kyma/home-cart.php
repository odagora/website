<!-- Add To Cart -->
<?php
if (!class_exists('WooCommerce')) return;
$kyma_theme_options = kyma_theme_options(); ?>
<section class="content_section">
    <div class="content row_spacer no_padding clearfix"><?php
        if ($kyma_theme_options['home_product_title'] != "") {
            ?>
            <div class="main_title centered upper">
            <h2><span class="line"><i
                        class="ico-cart2"></i></span><?php echo esc_attr($kyma_theme_options['home_product_title']); ?>
            </h2>
            </div><?php
        }
        $all_posts = wp_count_posts('product')->publish;
        $args = array('post_type' => 'product', 'posts_per_page' => $all_posts);
        $prod = new WP_Query($args); ?>
        <div class="shop_slider"><?php
            if ($prod->have_posts()) {
                while ($prod->have_posts()): $prod->the_post();
                    global $product;

                    ?>
                    <div class="add2cart_slide centered">
                        <div class="add2cart_image">
                            <a href="<?php the_permalink(); ?>" class="pro_add2cart_details">
                                <span class="text"><i
                                        class="ico-angle-right"></i><span><?php _e('View Details', 'kyma'); ?></span></span>
                            </a>
                            <?php if (has_post_thumbnail()) {

                                $image_title = esc_attr(get_the_title(get_post_thumbnail_id()));
                                $image_link = wp_get_attachment_url(get_post_thumbnail_id());
                                $image = get_the_post_thumbnail($post->ID, apply_filters('single_product_large_thumbnail_size', 'shop_single'), array(
                                    'title' => $image_title
                                ));?>
                            <a data-rel="magnific-popup" href="<?php echo esc_url($image_link); ?>"
                               class="add2cart_img">
                                <span class="sale_new">
							<span class="text"><?php _e('Sale', 'kyma'); ?></span><span
                                        class="circle sale"></span>
						</span>
                                <span class="add2cart_zoom"><i class="ico-plus3"></i></span>
                                <?php echo woocommerce_get_product_thumbnail(); ?>
                                </a><?php
                            } ?>
                        </div>
                        <div class="add2cart_details">
                            <div class="con_cont">
                                <a href="<?php the_permalink(); ?>" class="add2cart_prod_name"><?php the_title(); ?></a>
						<span
                            class="add2cart_prod_cat"><?php $categories = wp_get_post_terms($post->ID, 'product_cat', array("fields" => "names"));
                            echo implode(", ", $categories);?></span>
						<span class="add2cart_prod_price">
							<?php echo $product->get_price_html(); ?>
						</span>

                                <?php echo $product->get_rating_html();
                                echo apply_filters('woocommerce_loop_add_to_cart_link',
                                    sprintf('<a href="%s" rel="nofollow" data-product_id="%s" data-product_sku="%s" data-quantity="%s" class="add2cart_btn button %s product_type_%s"><i class="ico-cart"></i><span>%s</span></a>',
                                        esc_url($product->add_to_cart_url()),
                                        esc_attr($product->id),
                                        esc_attr($product->get_sku()),
                                        esc_attr(isset($quantity) ? $quantity : 1),
                                        $product->is_purchasable() && $product->is_in_stock() ? '' : '',
                                        esc_attr($product->product_type),
                                        esc_html($product->add_to_cart_text())
                                    ),
                                    $product);
                                ?>
                            </div>
                        </div>
                    </div>
                <?php
                endwhile;
            } ?>
        </div>
    </div>
</section>
<!-- End Add To Cart  -->