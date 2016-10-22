<?php
/**
 * Single Product Image
 *
 * @author        WooThemes
 * @package    WooCommerce/Templates
 * @version     2.0.14
 */

if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly
}

global $post, $product, $woocommerce;

$attachment_ids = $product->get_gallery_attachment_ids();
    $loop = 0;
    $columns = apply_filters('woocommerce_product_thumbnails_columns', 3);
    ?>
    <div class="single_product_slider">
    <div class="thumbs_gall_slider_con content_thumbs_gall">
        <div class="thumbs_gall_slider_larg owl-carousel"><?php
            if (has_post_thumbnail()) {

                $image_title = esc_attr(get_the_title(get_post_thumbnail_id()));
                $image_caption = get_post(get_post_thumbnail_id())->post_excerpt;
                $image_link = wp_get_attachment_url(get_post_thumbnail_id());
                $image = get_the_post_thumbnail($post->ID, apply_filters('single_product_large_thumbnail_size', 'shop_single'), array(
                    'title' => $image_title,
                    'alt' => $image_title
                ));

                $attachment_count = count($product->get_gallery_attachment_ids());

                if ($attachment_count > 0) {
                    $gallery = '[product-gallery]';
                } else {
                    $gallery = '';
                } ?>
                <div
                    class="item"><?php echo apply_filters('woocommerce_single_product_image_html', sprintf('<a href="%s" itemprop="image" class="woocommerce-main-image zoom" title="%s" data-rel="prettyPhoto' . $gallery . '">%s</a>', $image_link, $image_caption, $image), $post->ID); ?>
                </div><?php

            } else {

                echo apply_filters('woocommerce_single_product_image_html', sprintf('<img src="%s" alt="%s" />', wc_placeholder_img_src(), __('Placeholder', 'woocommerce')), $post->ID);

            }
            foreach ($attachment_ids as $attachment_id) {
                $classes = array('zoom');

                if ($loop == 0 || $loop % $columns == 0)
                    $classes[] = 'first';

                if (($loop + 1) % $columns == 0)
                    $classes[] = 'last';

                $image_link = wp_get_attachment_url($attachment_id);

                if (!$image_link)
                    continue;

                $image_title = esc_attr(get_the_title($attachment_id));
                $image_caption = esc_attr(get_post_field('post_excerpt', $attachment_id));

                $image = wp_get_attachment_image($attachment_id, apply_filters('single_product_large_thumbnail_size', 'shop_single'), 0, $attr = array(
                    'title' => $image_title,
                    'alt' => $image_title
                ));

                $image_class = esc_attr(implode(' ', $classes));?>
                <div class="item "><?php
                    echo apply_filters('woocommerce_single_product_image_html', sprintf('<a href="%s" class="%s" title="%s" data-rel="prettyPhoto[product-gallery]">%s</a>', $image_link, $image_class, $image_caption, $image), $attachment_id, $post->ID, $image_class); ?>
                </div>
                <?php
                $loop++;
            }
            do_action('woocommerce_product_thumbnails'); ?>
        </div>
        <div class="gall_thumbs owl-carousel"><?php
            if (has_post_thumbnail()) {

                $image_title = esc_attr(get_the_title(get_post_thumbnail_id()));
                $image_caption = get_post(get_post_thumbnail_id())->post_excerpt;
                $image_link = wp_get_attachment_url(get_post_thumbnail_id());
                $image = get_the_post_thumbnail($post->ID, apply_filters('single_product_large_thumbnail_size', 'shop_single'), array(
                    'title' => $image_title,
                    'alt' => $image_title
                ));

                $attachment_count = count($product->get_gallery_attachment_ids());

                if ($attachment_count > 0) {
                    $gallery = '[product-gallery]';
                } else {
                    $gallery = '';
                } ?>
                <div
                    class="item"><?php echo apply_filters('woocommerce_single_product_image_thumbnail_html', sprintf('%s', $image), $post->ID); ?>
                </div><?php

            }
            foreach ($attachment_ids as $attachment_id) {
                $classes = array('zoom');

                if ($loop == 0 || $loop % $columns == 0)
                    $classes[] = 'first';

                if (($loop + 1) % $columns == 0)
                    $classes[] = 'last';

                $image_link = wp_get_attachment_url($attachment_id);

                if (!$image_link)
                    continue;

                $image_title = esc_attr(get_the_title($attachment_id));
                $image_caption = esc_attr(get_post_field('post_excerpt', $attachment_id));

                $image = wp_get_attachment_image($attachment_id, apply_filters('single_product_small_thumbnail_size', 'shop_thumbnail'), 0, $attr = array(
                    'title' => $image_title,
                    'alt' => $image_title
                ));

                $image_class = esc_attr(implode(' ', $classes));?>
                <div class="item "><?php
                    echo apply_filters('woocommerce_single_product_image_thumbnail_html', sprintf('%s', $image), $attachment_id, $post->ID, $image_class);?>
                </div>
                <?php
                $loop++;
            }
            ?>
        </div>
    </div>
    </div>