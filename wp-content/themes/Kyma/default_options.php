<?php
/* General Options */
function kyma_theme_options()
{
    $ImageUrl7 = get_template_directory_uri() . "/images/webhunt_infotech_logo.jpg";
    $ImageUrl = get_template_directory_uri() . "/images/sliders/slide1.jpg";
    $ImageUrl2 = get_template_directory_uri() . "/images/sliders/slide2.jpg";
    $ImageUrl3 = get_template_directory_uri() . "/images/sliders/slide3.jpg";
    $ImageUrl4 = get_template_directory_uri() . "/images/portfolio/item1.jpg";
    $ImageUrl5 = get_template_directory_uri() . "/images/portfolio/item2.jpg";
    $ImageUrl6 = get_template_directory_uri() . "/images/portfolio/item3.jpg";
    $ImageUrl9 = get_template_directory_uri() . "/images/partners/partner1.png";
    $ImageUrl10 = get_template_directory_uri() . "/images/partners/partner2.png";
    $ImageUrl11 = get_template_directory_uri() . "/images/partners/partner3.png";
    $ImageUrl12 = get_template_directory_uri() . "/images/partners/partner4.png";
    $ImageUrl13 = get_template_directory_uri() . "/images/partners/partner5.png";
    $kyma_theme_options = array(
        '_frontpage' => 1,
        'site_layout' => '',
        'site_color' => 0,
        'upload_image_logo' => '',
        'logo_height' => 40,
        'logo_width' => 250,
        'logo_text_width' => 35,
        'logo_layout' => 'left',
        'logo_spacing' => 0,
        'topbarcolor' => 'topbar_colored',
        'side_header' => 0,
        'headercolorscheme' => 'light_header',
        'headersticky' => 0,
        'upload_custom_favicon' => '',
        'kyma_custom_css' => '',
        /* Features */
        'feature_style' => 1,
        'home_feature_heading' => __('Theme Features', 'kyma'),
        'feature_bg_image' => $ImageUrl,
        /* About Us Feature Section */
        'home_feature_heading1' => __('Our Key Features', 'kyma'),
        'feature_bg_color1' => '',
        'feature_bg_image1' => $ImageUrl,
        /* Service */
        'home_service_heading' => __('Our Services', 'kyma'),
        'home_service_column' => 4,
        'home_service_type'=>1,
        /* Slide */
		'home_slider_enabled' => 1,
        'ken_burn_effect' => 'on',
        'ken_burn_duration' => 2000,
        'slide_image_1' => $ImageUrl,
        //Portfolio Settings:
        'portfolio_home' => 1,
        'portfolio_filter' => 1,
        'port_heading' => __('Our Amazing Works', 'kyma'),
        'portfolio_width' => 'boxed_portos',
        /* Testimonial */
        'testimonial_heading' => __('What Our Clients Says?', 'kyma'),
        //partners settings
        'home_client_title' => __('Our partners', 'kyma'),
        'partners_home' => 'off',
        'home_client_description' => __('Lorem ipsum dolor sit amet, consectetur adipisicing elit, <br>sed do eiusmod tempor incididunt ut
et dolore magna aliqua. Ut enim ad minim veniam', 'kyma'),
        /* Footer Latyout */
        'footer_layout' => 4,
        /* blog option */
        'blog_title' => __('Blog', 'kyma'),
        'home_blog' => 1,
        'blog_layout' => 'rightsidebar',
        'post_layout' => 'postright',
        'blog_post_count' => 3,
        'home_blog_title' => __('Latest Posts', 'kyma'),
        'related_post_text' => __('Posts You might like', 'kyma'),
        'about_author_text' => __('About The Author', 'kyma'),
        /* Team */
        'home_team_heading' => __('Meet Our Team', 'kyma'),
        'team_style' => 1,
        /* footer callout */
        'callout_title' => __('Best Wordpress Resposnive Theme Ever!', 'kyma'),
        'callout_description' => __('There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour of this randomised words which don\'t look even slightly believable If you are going to use a passage of Lorem Ipsum.', 'kyma'),
        'callout_btn_text' => __('Purchase Now', 'kyma'),
        'callout_btn_icon' => 'ico-cart',
        'callout_btn_link' => 'http://www.webhuntinfotech.com',
        'callout_button_target' => 1,
        /* Social media icons */
        'topbar' => 1,
        'show_cartcount' => 0,
        'social_media_header' => 1,
        'social_media_footer' => 1,
        'social_facebook_link' => 'https://www.facebook.com',
        'social_twitter_link' => 'https://www.twitter.com/',
        'social_picasa_link' => 'https://www.picasa.com/',
        'social_vimeo_link' => 'https://www.vimeo.com/',
        'social_instagram_link' => 'https://www.instagram.com/',
        'social_google_plus_link' => 'https://www.plus.google.com/',
        'social_skype_link' => 'https://www.skype.com/',
		'social_pinterest_link' => 'https://www.pinterest.com/',
		'social_youtube_link' => 'https://www.youtube.com/',
        /* CPT rewrite URL */
        'kyma_slider_cpt' => 'kyma_slider',
        'kyma_service_cpt' => 'kyma_service',
        'kyma_portfolio_cpt' => 'kyma_portfolio',
        'kyma_client_cpt' => 'kyma_client',
        'kyma_testimonial_cpt' => 'kyma_testimonial',
        'kyma_feature_cpt' => 'kyma_feature',
        'kyma_pricing_cpt' => 'kyma_pricing_plan',
        /* Extra */
        'home_extra_title' => __('Extra Content', 'kyma'),
		'home-shortcode' => __('Show your extra content here', 'kyma'),
        /* Basic Style */
        'skin_stylesheet' => 'red.css',
        'enable_custom_color' => 1,
        'custom_color' => '#eee',
        'site_preloader' => 'preloader3',
        /* Contact */
        'contact_info_header' => 1,
        'contact_info_page' => 1,
        'contact_phone' => '+0744-44447',
        'contact_email' => 'webhuntinfotech@gmail.com',
        'contact_page_image' => '',
        'address_info_title' => __('Contact Information', 'kyma'),
        'address_info_icon' => 'ico-pencil5',
        'contact_form_title' => __('Leave your mesaage', 'kyma'),
        'contact_form_icon' => 'ico-envelope3',
        //'contact_info'=>'',
        'contact_google_map' => 0,
        'google_map_title' => __('How to reach us?', 'kyma'),
        'google_map_url' => '',
        /* Footer Copyright */
        'copyright_text_footer' => 1,
        'footer_copyright' => __('&copy; 2015 Kyma Theme', 'kyma'),
        'developed_by_text' => __('Developed By', 'kyma'),
        'developed_by_link_text' => __('Webhunt Infotech', 'kyma'),
        'developed_by_link' => 'http://www.webhuntinfotech.com/',
        /* home cart titile */
        'home_product_title' => __('Our Products', 'kyma'),
        //Post Type slug Options
        'kyma_slider_cpt' => 'kyma_slider',
		'kyma_service_cpt' => 'kyma_service',
		'kyma_portfolio_cpt' => 'kyma_portfolio',
		'kyma_testimonial_cpt' => 'kyma_testimonial',
		'kyma_team_cpt' => 'kyma_team',
		'kyma_client_cpt' => 'kyma_client',
		'kyma_pricing_cpt' => 'kyma_price',
		'kyma_feature_cpt' => 'kyma_feature',
		/* home pricing plan */
        'home_plan_heading' => __('Our Plans', 'kyma'),
        'plan_style' => 1,
        'plan_style_effect' => 'secondary',
        'plan_width' => 'full',
        'plan_bg_color' => ''
    );
    return wp_parse_args(get_option('kyma_theme_options', array()), $kyma_theme_options);
}
?>