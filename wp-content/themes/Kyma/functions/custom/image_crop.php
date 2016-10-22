<?php
if (function_exists('add_image_size')) {
    /*** Home slider ***/
    add_image_size('home_slider_image', 1440, 550, array('top,left'));
    /*** Home service ***/
    add_image_size('kyma_home_service_image', 100, 100, true);
    /*** Home portfolio ***/
    add_image_size('home_portfolio_image', 480, 332, true);
    add_image_size('portfolio_two_image', 569, 393, true);
    add_image_size('portfolio_two_image_full', 600, 450, true);
    add_image_size('portfolio_three_image', 380, 380, true);
    add_image_size('portfolio_three_image_full', 450, 450, true);
    add_image_size('portfolio_four_image', 285, 285, true);
    add_image_size('portfolio_four_image_full', 337, 337, true);
    add_image_size('related_portfolio_thumb', 270, 270, true);
    add_image_size('portfolio_single_image', 540, 362, true);
    add_image_size('portfolio_single_gallery_image', 524, 269, true);
    add_image_size('portfolio_single_gallery_thumb', 82, 82, true);
    /* testimonial */
    add_image_size('testimonial_circle_thumb', 170, 170, true);
    add_image_size('testimonial_square_thumb', 75, 75, true);
    /* Team */
    add_image_size('team_circle_thumb', 170, 170, true);
    add_image_size('team_square_thumb', 285, 285, true);
    add_image_size('team_three_thumb', 155, 155, true);
    /* About Us */
    add_image_size('about_one_thumb', 1100, 400, true);
    add_image_size('about_two_thumb', 525, 400, true);
    add_image_size('about_port_thumb', 275, 177, true);
    /* service template */
    add_image_size('service_template_thumb', 340, 203, true);
    /* Client thumb */
    add_image_size('client_thumb', 210, 120, true);
    /*** Blog ***/
    add_image_size('kyma_home_post_image', 360, 231, true);
    add_image_size('kyma_related_post_thumb', 265, 170, true);
    add_image_size('kyma_home_post_thumb', 334, 215, true);
    add_image_size('kyma_home_post_full_thumb', 600, 400, true);
    add_image_size('kyma_single_post_image', 835, 428, array('left', 'top'));
    add_image_size('kyma_single_post_full', 1140, 585, true);
    add_image_size('kyma_recent_widget_thumb', 90, 60, true);
    add_image_size('kyma_masonry_feature_thumb', 360, 360, true);
    add_image_size('kyma_blog_timeline_thumb', 478, 307, true);
}
// code for image resize for according to image layout
add_filter('intermediate_image_sizes', 'kyma_image_presets');
function kyma_image_presets($sizes)
{
    $type = get_post_type($_REQUEST['post_id']);
    foreach ($sizes as $key => $value) {
        if ($type == 'page' && $value != 'kyma_single_post_image' && $value != 'kyma_single_post_full' && $value != 'about_one_thumb' && $value != 'about_two_thumb' && $value != 'about_port_thumb' && $value != 'service_template_thumb') {
            unset($sizes[$key]);
        } else if ($type == 'post' && $value != 'kyma_recent_widget_thumb' && $value != 'kyma_home_post_image' && $value != 'kyma_home_post_thumb' && $value != 'kyma_home_post_full_thumb' && $value != 'kyma_single_post_image' && $value != 'kyma_single_post_full' && $value != 'kyma_masonry_feature_thumb' && $value != 'kyma_blog_timeline_thumb' && $value != 'kyma_related_post_thumb') {
            unset($sizes[$key]);
        } else if ($type == 'kyma_slider' && $value != 'home_slider_image') {
            unset($sizes[$key]);
        } else if ($type == 'kyma_service' && $value != 'kyma_home_service_image') {
            unset($sizes[$key]);
        } else if ($type == 'kyma_portfolio' && $value != 'home_portfolio_image' && $value != 'portfolio_two_image' && $value != 'portfolio_three_image' && $value != 'portfolio_four_image' && $value != 'portfolio_two_image_full' && $value != 'portfolio_three_image_full' && $value != 'portfolio_four_image_full' && $value != 'related_portfolio_thumb' && $value != 'portfolio_single_gallery_image' && $value != 'portfolio_single_gallery_thumb' && $value != 'portfolio_single_image') {
            unset($sizes[$key]);
        } else if ($type == 'kyma_testimonial' && $value != 'testimonial_circle_thumb' && $value != 'testimonial_square_thumb') {
            unset($sizes[$key]);
        } else if ($type == 'kyma_client' && $value != 'client_thumb') {
            unset($sizes[$key]);
        } else if ($type == 'kyma_team' && $value != 'team_circle_thumb' && $value != 'team_square_thumb' && $value != 'team_three_thumb') {
            unset($sizes[$key]);
        }
    }
    return $sizes;
}
?>