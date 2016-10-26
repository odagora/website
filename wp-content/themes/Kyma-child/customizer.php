<?php
function kyma_customizer_preview_js()
{
    wp_enqueue_script('custom_css_preview', get_template_directory_uri() . '/js/customize-preview.js', array('customize-preview', 'jquery'));
}
add_action('customize_preview_init', 'kyma_customizer_preview_js');
/* Add Customizer Panel */
$kyma_theme_options = kyma_theme_options();
Kirki::add_config('kyma_theme', array(
    'capability' => 'edit_theme_options',
    'option_type' => 'option',
    'option_name' => 'kyma_theme_options',
    'color_accent' => '#00bcd4',
    'color_back' => '#1CCDCA',
));
Kirki::add_panel('kyma_option_panel', array(
    'priority' => 10,
    'title' => __('Kyma Options', 'kyma'),
    'description' => __('Here you can customize all your site contents', 'kyma'),
));
/* General section */
Kirki::add_section('general_sec', array(
    'title' => __('General Options', 'kyma'),
    'description' => __('Here you can change basic settings of your site', 'kyma'),
    'panel' => 'kyma_option_panel',
    'priority' => 160,
    'capability' => 'edit_theme_options',
));
Kirki::add_field('kyma_theme', array(
    'settings' => '_frontpage',
    'label' => __('Show default home page', 'kyma'),
    'section' => 'general_sec',
    'type' => 'checkbox',
    'priority' => 10,
    'default' => '',
    'sanitize_callback' => 'kyma_sanitize_checkbox'
));

Kirki::add_field('kyma_theme', array(
    'settings' => 'logo_width',
    'label' => __('Image Logo Width', 'kyma'),
    'section' => 'general_sec',
    'type' => 'slider',
    'priority' => 10,
    'default' => $kyma_theme_options['logo_width'],
    'choices' => array(
        'max' => 300,
        'min' => 35,
        'step' => 1
    ),
    'output' => array(
        array(
            'element' => '#logo img',
            'property' => 'width',
            'units' => 'px'
        )
    ),
    'sanitize_callback' => 'kyma_sanitize_number'
));
Kirki::add_field('kyma_theme', array(
    'settings' => 'logo_height',
    'label' => __('Image Logo Height', 'kyma'),
    'section' => 'general_sec',
    'type' => 'slider',
    'priority' => 10,
    'default' => $kyma_theme_options['logo_height'],
    'choices' => array(
        'max' => 250,
        'min' => 30,
        'step' => 1
    ),
    'output' => array(
        array(
            'element' => '#logo img',
            'property' => 'height',
            'units' => 'px'
        )
    ),
    'sanitize_callback' => 'kyma_sanitize_number'
));
Kirki::add_field('kyma_theme', array(
    'settings' => 'logo_text_width',
    'label' => __('Logo Font Size', 'kyma'),
    'section' => 'general_sec',
    'type' => 'slider',
    'priority' => 10,
    'default' => $kyma_theme_options['logo_text_width'],
    'choices' => array(
        'max' => 50,
        'min' => 10,
        'step' => 1
    ),
    'transport' => 'postMessage',
    'output' => array(
        array(
            'element' => '#logo h3',
            'property' => 'font-size',
            'units' => 'px'
        )
    ),
    'sanitize_callback' => 'kyma_sanitize_number'
));
Kirki::add_field('kyma_theme', array(
    'settings' => 'logo_spacing',
    'label' => __('Logo Spacing', 'kyma'),
    'section' => 'general_sec',
    'type' => 'slider',
    'priority' => 10,
    'default' => $kyma_theme_options['logo_spacing'],
    'choices' => array(
        'max' => 20,
        'min' => -20,
        'step' => 1
    ),
    'transport' => 'postMessage',
    'output' => array(
        array(
            'element' => '#logo h3',
            'property' => 'margin-top',
            'units' => 'px'
        ),
        array(
            'element' => '#logo img',
            'property' => 'margin-top',
            'units' => 'px'
        )
    ),
    'sanitize_callback' => 'kyma_sanitize_number'
));
Kirki::add_field('kyma_theme', array(
    'settings' => 'logo_layout',
    'label' => __('Logo Align', 'kyma'),
    'section' => 'general_sec',
    'type' => 'radio-image',
    'priority' => 10,
    'default' => $kyma_theme_options['logo_layout'],
    'choices' => array(
        'left' => admin_url() . '/images/align-left-2x.png',
        'right' => admin_url() . '/images/align-right-2x.png',
    ),
    'transport' => 'postMessage',
    'sanitize_callback' => 'kyma_sanitize_text'
));

Kirki::add_field('kyma_theme', array(
    'settings' => 'kyma_custom_css',
    'label' => __('Custom Css Editor', 'kyma'),
    'section' => 'general_sec',
    'type' => 'textarea',
    'priority' => 10,
    'sanitize_callback'    => 'wp_filter_nohtml_kses',
    'sanitize_js_callback' => 'wp_filter_nohtml_kses',
));
/* Header Options */
Kirki::add_section('header_sec', array(
    'title' => __('Header Options', 'kyma'),
    'panel' => 'kyma_option_panel',
    'priority' => 160,
    'capability' => 'edit_theme_options',
));
Kirki::add_field('kyma_theme', array(
    'type' => 'radio-buttonset',
    'settings' => 'topbarcolor',
    'label' => __('Header Top Bar', 'kyma'),
    'description' => __('Select colored or default top bar', 'kyma'),
    'section' => 'header_sec',
    'priority' => 10,
    'transport' => 'postMessage',
    'default' => $kyma_theme_options['topbarcolor'],
    'choices' => array(
        'topbar_colored' => 'Colored',
        '' => 'Default',
    ),
    'sanitize_callback' => 'kyma_sanitize_text'
));
Kirki::add_field('kyma_theme', array(
    'type' => 'switch',
    'settings' => 'side_header',
    'label' => __('Header on left Side', 'kyma'),
    'description' => __('Shift header on left side', 'kyma'),
    'section' => 'header_sec',
    'priority' => 10,
    'transport' => 'postMessage',
    'default' => 0,
    'sanitize_callback' => 'kyma_sanitize_checkbox'
));
Kirki::add_field('kyma_theme', array(
    'type' => 'switch',
    'settings' => 'headersticky',
    'label' => __('Fixed Header', 'kyma'),
    'description' => __('Switch between fixed and static header', 'kyma'),
    'section' => 'header_sec',
    'default' => $kyma_theme_options['headersticky'],
    'priority' => 10,
    'sanitize_callback' => 'kyma_sanitize_checkbox',
));
Kirki::add_field('kyma_theme', array(
    'settings' => 'headercolorscheme',
    'label' => __('Header Style', 'kyma'),
    'section' => 'header_sec',
    'type' => 'radio-buttonset',
    'priority' => 10,
    'transport' => 'postMessage',
    'default' => $kyma_theme_options['headercolorscheme'],
    'choices' => array(
        'light_header' => 'Light Header',
        '' => 'Dark Header',
        'transparent_header' => 'Transparent Header',
    ),
    'sanitize_callback' => 'color'
));

/* Layout section */
Kirki::add_section('layout_sec', array(
    'title' => __('Layout Options', 'kyma'),
    'description' => __('Here you can change Layout and basic design of your site', 'kyma'),
    'panel' => 'kyma_option_panel',
    'priority' => 160,
    'capability' => 'edit_theme_options',
    'transport' => 'postMessage',
));
Kirki::add_field('kyma_theme', array(
    'settings' => 'site_layout',
    'label' => __('Site Layout', 'kyma'),
    'description' => __('Change your site layout to full width or boxed size.', 'kyma'),
    'section' => 'layout_sec',
    'type' => 'radio-image',
    'priority' => 10,
    'transport' => 'postMessage',
    'default' => '',
    'choices' => array(
        '' => get_template_directory_uri() . '/images/layout/1c.png',
        'site_boxed' => get_template_directory_uri() . '/images/layout/3cm.png',
    ),
));
Kirki::add_field('kyma_theme', array(
    'settings' => 'footer_layout',
    'label' => __('Footer Layout', 'kyma'),
    'description' => __('Change footer into 2, 3 or 4 column', 'kyma'),
    'section' => 'layout_sec',
    'type' => 'radio-image',
    'priority' => 10,
    'default' => $kyma_theme_options['footer_layout'],
    'transport' => 'postMessage',
    'choices' => array(
        2 => get_template_directory_uri() . '/images/layout/footer-widgets-2.png',
        3 => get_template_directory_uri() . '/images/layout/footer-widgets-3.png',
        4 => get_template_directory_uri() . '/images/layout/footer-widgets-4.png',
    ),
    'sanitize_callback' => 'kyma_sanitize_number'
));
/* Topbar section */
Kirki::add_section('topbar_sec', array(
    'title' => __('Topbar Options', 'kyma'),
    'description' => __('Here you can change topbar of your site', 'kyma'),
    'panel' => 'kyma_option_panel',
    'priority' => 160,
    'capability' => 'edit_theme_options',
));
Kirki::add_field('kyma_theme', array(
    'settings' => 'topbar',
    'label' => __('Show Topbar', 'kyma'),
    'section' => 'topbar_sec',
    'type' => 'checkbox',
    'priority' => 10,
    'default' => '',
    'transport' => 'postMessage',
    'sanitize_callback' => 'kyma_sanitize_checkbox'
));
Kirki::add_field('kyma_theme', array(
    'settings' => 'show_cartcount',
    'label' => __('Show Cart in header', 'kyma'),
    'section' => 'topbar_sec',
    'type' => 'checkbox',
    'priority' => 10,
    'default' => '',
    'transport' => 'postMessage',
    'sanitize_callback' => 'kyma_sanitize_checkbox'
));
Kirki::add_field('kyma_theme', array(
    'settings' => 'topbar_layout',
    'label' => __('Topbar Layout Switch', 'kyma'),
    'section' => 'topbar_sec',
    'type' => 'checkbox',
    'priority' => 10,
    'default' => '',
    'transport' => 'postMessage',
    'sanitize_callback' => 'kyma_sanitize_checkbox'
));
/* Slider */
Kirki::add_section('slider_sec', array(
    'title' => __('Slider Options', 'kyma'),
    'description' => __('Change slider text(s) and images', 'kyma'),
    'panel' => 'kyma_option_panel',
    'priority' => 160,
    'capability' => 'edit_theme_options',
));
Kirki::add_field('kyma_theme', array(
    'settings' => 'home_slider_enabled',
    'label' => __('Enabled Home Slider', 'kyma'),
    'section' => 'slider_sec',
    'type' => 'checkbox',
    'priority' => 10,
    'default' => '',
    'sanitize_callback' => 'kyma_sanitize_checkbox'
));
Kirki::add_field('kyma_theme', array(
    'settings' => 'slider_type',
    'label' => __('Choose a Home Image Slider', 'kyma'),
    'section' => 'slider_sec',
    'type' => 'select',
    'priority' => 10,
    'transport' => 'postMessage',
    'default' => 1,
    'choices' => array(
        1 => __('Revolution Slider 1', 'kyma'),
        2 => __('Revolution Slider 2', 'kyma'),
        3 => __('Owl Slider', 'kyma'),
    ),
    'sanitize_callback' => 'kyma_sanitize_number'
));
/* Service Options */
Kirki::add_section('service_sec', array(
    'title' => __('Service Options', 'kyma'),
    'panel' => 'kyma_option_panel',
    'priority' => 160,
    'capability' => 'edit_theme_options',
));
Kirki::add_field('kyma_theme', array(
    'settings' => 'home_service_type',
    'label' => __('Home Service Type', 'kyma'),
    'section' => 'service_sec',
    'type' => 'select',
    'priority' => 10,
    'default' => $kyma_theme_options['home_service_type'],
    'choices' => array(1 => 'Style One (Default)', 2 => 'Style Two', 3 => 'Style Three', 4 => 'Style Four'),
    'sanitize_callback' => 'kyma_sanitize_number'
));
Kirki::add_field('kyma_theme', array(
    'settings' => 'home_service_heading',
    'label' => __('Home Service Heading', 'kyma'),
    'section' => 'service_sec',
    'type' => 'text',
    'priority' => 10,
    'transport' => 'postMessage',
    'default' => $kyma_theme_options['home_service_heading'],
    'sanitize_callback' => 'kyma_sanitize_text'
));
Kirki::add_field('kyma_theme', array(
    'settings' => 'home_service_column',
    'label' => __('Service Layout', 'kyma'),
    'section' => 'service_sec',
    'type' => 'select',
    'priority' => 10,
    'transport' => 'postMessage',
    'default' => $kyma_theme_options['home_service_column'],
    'choices' => array(
        2 => __('Two Column', 'kyma'),
        3 => __('Three Column', 'kyma'),
        4 => __('Four Column', 'kyma'),
    ),
    'sanitize_callback' => 'kyma_sanitize_number'
));
/* Feature Section */
Kirki::add_section('feature_sec', array(
    'title' => __('Feature Options', 'kyma'),
    'description' => __('Change feature text(s) and images', 'kyma'),
    'panel' => 'kyma_option_panel',
    'priority' => 160,
    'capability' => 'edit_theme_options',
));
Kirki::add_field('kyma_theme', array(
    'settings' => 'home_feature_heading',
    'label' => __('Home Feature Heading', 'kyma'),
    'section' => 'feature_sec',
    'type' => 'text',
    'priority' => 10,
    'transport' => 'postMessage',
    'default' => $kyma_theme_options['home_feature_heading'],
    'sanitize_callback' => 'kyma_sanitize_text'
));
Kirki::add_field('kyma_theme', array(
    'settings' => 'feature_style',
    'label' => __('Feature Style', 'kyma'),
    'section' => 'feature_sec',
    'type' => 'select',
    'priority' => 10,
    'default' => 1,
    'choices' => array(
        1 => __('Style 1', 'kyma'),
        2 => __('Style 2', 'kyma'),
        3 => __('Style 3', 'kyma'),
    ),
    'sanitize_callback' => 'kyma_sanitize_number'
));
Kirki::add_field('kyma_theme', array(
    'settings' => 'feature_bg_color',
    'label' => __('Background Color', 'kyma'),
    'section' => 'feature_sec',
    'type' => 'select',
    'priority' => 10,
    'default' => 1,
    'choices' => array(
        '' => __('None', 'kyma'),
        'bg_color1' => __('Color 1', 'kyma'),
        'bg_color2' => __('Color 2', 'kyma'),
        'bg_color3' => __('Color 3', 'kyma'),
        'bg_color4' => __('Color 4', 'kyma'),
        'bg_color5' => __('Color 5', 'kyma'),
        'bg_color7' => __('Color 6', 'kyma'),
    ),
    'sanitize_callback' => 'kyma_sanitize_number'
));

/* Portfolio */
Kirki::add_section('portfolio_sec', array(
    'title' => __('Portfolio Options', 'kyma'),
    'panel' => 'kyma_option_panel',
    'priority' => 160,
    'capability' => 'edit_theme_options',
));
Kirki::add_field('kyma_theme', array(
    'settings' => 'portfolio_filter',
    'label' => __('Show Portfolio Filter', 'kyma'),
    'description' => __('Show/Hide Portfolio Filter on Home', 'kyma'),
    'section' => 'portfolio_sec',
    'type' => 'radio-buttonset',
    'priority' => 10,
    'transport' => 'postMessage',
    'default' => $kyma_theme_options['portfolio_filter'],
	'choices'=>array(0=>'No',1=>'Yes'),
    'sanitize_callback' => 'kyma_sanitize_checkbox'
));
Kirki::add_field('kyma_theme', array(
    'settings' => 'port_heading',
    'label' => __('Home Portfolio Title', 'kyma'),
    'section' => 'portfolio_sec',
    'type' => 'text',
    'priority' => 10,
    'transport' => 'postMessage',
    'default' => $kyma_theme_options['port_heading'],
    'sanitize_callback' => 'kyma_sanitize_checkbox'
));
Kirki::add_field('kyma_theme', array(
    'settings' => 'portfolio_style',
    'label' => __('Home Portfolio Style', 'kyma'),
    'section' => 'portfolio_sec',
    'type' => 'select',
    'priority' => 10,
    'default' => '',
    'choices' => array(
        '' => __('Style 1', 'kyma'),
        'porto_animate' => __('Style 2', 'kyma'),
        'porto_masonry' => __('Style Three', 'kyma'),
    ),
    'sanitize_callback' => 'kyma_sanitize_text'
));
Kirki::add_field('kyma_theme', array(
    'settings' => 'portfolio_width',
    'label' => __('Home Portfolio Width', 'kyma'),
    'section' => 'portfolio_sec',
    'type' => 'radio-buttonset',
    'priority' => 10,
    'default' => 'boxed_portos',
    'choices' => array(
        'full_portos' => __('Full Width', 'kyma'),
        'boxed_portos' => __('Boxed Width', 'kyma'),
    ),
    'sanitize_callback' => 'kyma_sanitize_number'
));
Kirki::add_field('kyma_theme', array(
    'settings' => 'port_has_space',
    'label' => __('Portfolio has space', 'kyma'),
    'section' => 'portfolio_sec',
    'type' => 'radio-buttonset',
    'priority' => 10,
    'default' => 'has_sapce_portos',
    'choices' => array(
        'has_sapce_portos' => __('Yes', 'kyma'),
        'no_sapce_portos' => __('No', 'kyma'),
    ),
    'sanitize_callback' => 'kyma_sanitize_number'
));
Kirki::add_field('kyma_theme', array(
    'settings' => 'portfolio_column',
    'label' => __('Home Portfolio Column', 'kyma'),
    'section' => 'portfolio_sec',
    'type' => 'select',
    'priority' => 10,
    'default' => 'three_blocks',
    'choices' => array(
        'two_blocks' => __('Two Column', 'kyma'),
        'three_blocks' => __('Three Column', 'kyma'),
        'four_blocks' => __('Four Column', 'kyma'),
    ),
    'sanitize_callback' => 'kyma_sanitize_number'
));
/* Blog Options */
Kirki::add_section('blog_sec', array(
    'title' => __('Blog Options', 'kyma'),
    'panel' => 'kyma_option_panel',
    'priority' => 160,
    'capability' => 'edit_theme_options',
));
Kirki::add_field('kyma_theme', array(
    'settings' => 'home_blog_title',
    'label' => __('Home Blog Title', 'kyma'),
    'section' => 'blog_sec',
    'type' => 'text',
    'priority' => 10,
    'transport' => 'postMessage',
    'default' => $kyma_theme_options['home_blog_title'],
    'sanitize_callback' => 'kyma_sanitize_text'
));
Kirki::add_field('kyma_theme', array(
    'settings' => 'about_author_text',
    'label' => __('About Author Title', 'kyma'),
    'description' => __('This will be displayed on single post', 'kyma'),
    'section' => 'blog_sec',
    'type' => 'text',
    'priority' => 10,
    'default' => $kyma_theme_options['about_author_text'],
    'sanitize_callback' => 'kyma_sanitize_text'
));
Kirki::add_field('kyma_theme', array(
    'settings' => 'related_post_text',
    'label' => __('Related Post Title', 'kyma'),
    'description' => __('This will be displayed on single post', 'kyma'),
    'section' => 'blog_sec',
    'type' => 'text',
    'priority' => 10,
    'default' => $kyma_theme_options['related_post_text'],
    'sanitize_callback' => 'kyma_sanitize_text'
));
$count_posts = wp_count_posts();
$published_posts = $count_posts->publish;
Kirki::add_field('kyma_theme', array(
    'settings' => 'blog_post_count',
    'label' => __('Posts On Home', 'kyma'),
    'description' => __('How many posts want to show on Home', 'kyma'),
    'help' => __('With this option you can show blog posts according your requirement', 'kyma'),
    'section' => 'blog_sec',
    'type' => 'select',
    'priority' => 10,
    'default' => 3,
    'choices' => array(
        '3' => '3',
        '6' => '6',
        '9' => '9',
        '12' => '12',
        '15' => '15',
        $published_posts => 'Show All Posts',
    ),
));

/* Team Options */
Kirki::add_section('team_sec', array(
    'title' => __('Team Options', 'kyma'),
    'panel' => 'kyma_option_panel',
    'priority' => 160,
    'capability' => 'edit_theme_options',
));
Kirki::add_field('kyma_theme', array(
    'settings' => 'home_team_heading',
    'label' => __('Home Team Title', 'kyma'),
    'section' => 'team_sec',
    'type' => 'text',
    'priority' => 10,
    'transport' => 'postMessage',
    'default' => $kyma_theme_options['home_team_heading'],
    'sanitize_callback' => 'kyma_sanitize_text'
));
Kirki::add_field('kyma_theme', array(
    'settings' => 'team_style',
    'label' => __('Team Section Style', 'kyma'),
    'section' => 'team_sec',
    'type' => 'select',
    'priority' => 10,
    'transport' => 'postMessage',
    'default' => 1,
    'choices' => array(
        1 => __('Style 1', 'kyma'),
        2 => __('Style 2', 'kyma'),
        3 => __('Style 3', 'kyma'),
    ),
    'sanitize_callback' => 'kyma_sanitize_number'
));
/* Testimonial Options */
Kirki::add_section('testimonial_sec', array(
    'title' => __('Testimonial Options', 'kyma'),
    'panel' => 'kyma_option_panel',
    'priority' => 160,
    'capability' => 'edit_theme_options',
));
Kirki::add_field('kyma_theme', array(
    'settings' => 'testimonial_heading',
    'label' => __('Home Testimonial Title', 'kyma'),
    'section' => 'testimonial_sec',
    'type' => 'text',
    'priority' => 10,
    'transport' => 'postMessage',
    'default' => $kyma_theme_options['testimonial_heading'],
    'sanitize_callback' => 'kyma_sanitize_text'
));
Kirki::add_field('kyma_theme', array(
    'settings' => 'testimonial_style',
    'label' => __('Testimonial Section Style', 'kyma'),
    'section' => 'testimonial_sec',
    'type' => 'select',
    'priority' => 10,
    'transport' => 'postMessage',
    'default' => 1,
    'choices' => array(
        1 => __('Style 1', 'kyma'),
        2 => __('Style 2', 'kyma'),
    ),
    'sanitize_callback' => 'kyma_sanitize_number'
));
/* Home Product Options */
Kirki::add_section('product_sec', array(
    'title' => __('Product Options', 'kyma'),
    'panel' => 'kyma_option_panel',
    'priority' => 160,
    'capability' => 'edit_theme_options',
));
Kirki::add_field('kyma_theme', array(
    'settings' => 'home_product_title',
    'label' => __('Home Product Section Title', 'kyma'),
    'section' => 'product_sec',
    'type' => 'text',
    'priority' => 10,
    'transport' => 'postMessage',
    'default' => $kyma_theme_options['home_product_title'],
    'sanitize_callback' => 'kyma_sanitize_text'
));
/* Client Options */
Kirki::add_section('client_sec', array(
    'title' => __('Client Options', 'kyma'),
    'panel' => 'kyma_option_panel',
    'priority' => 160,
    'capability' => 'edit_theme_options',
));
Kirki::add_field('kyma_theme', array(
    'settings' => 'home_client_type',
    'label' => __('Choose a Home Client Style', 'kyma'),
    'section' => 'client_sec',
    'type' => 'radio-buttonset',
    'priority' => 10,
    'default' => 1,
    'choices' => array(1 => 'Light(Default)', 2 => 'Colored'),
    'sanitize_callback' => 'kyma_sanitize_number'
));
Kirki::add_field('kyma_theme', array(
    'settings' => 'home_client_title',
    'label' => __('Home Client Title', 'kyma'),
    'section' => 'client_sec',
    'type' => 'text',
    'priority' => 10,
    'transport' => 'postMessage',
    'default' => $kyma_theme_options['home_client_title'],
    'sanitize_callback' => 'kyma_sanitize_text'
));
Kirki::add_field('kyma_theme', array(
    'settings' => 'home_client_description',
    'label' => __('Home Client Description', 'kyma'),
    'section' => 'client_sec',
    'type' => 'textarea',
    'priority' => 10,
    'transport' => 'postMessage',
    'default' => $kyma_theme_options['home_client_description'],
    'sanitize_callback' => 'kyma_sanitize_text'
));
/* Footer Callout */
Kirki::add_section('callout_sec', array(
    'title' => __('Callout Options', 'kyma'),
    'panel' => 'kyma_option_panel',
    'priority' => 160,
    'capability' => 'edit_theme_options',
));
Kirki::add_field('kyma_theme', array(
    'settings' => 'home_callout_type',
    'type' => 'radio-buttonset',
    'section' => 'callout_sec',
    'label' => __('Choose a Home Call Out Style', 'kyma'),
    'description' => __("to change your home call out style", 'kyma'),
    'choices' => array(1 => 'Style One', 2 => 'Style Two', 3 => 'Style Three'),
    'default' => 1,
));
Kirki::add_field('kyma_theme', array(
    'settings' => 'callout_title',
    'label' => __('Callout Title', 'kyma'),
    'section' => 'callout_sec',
    'type' => 'text',
    'priority' => 10,
    'transport' => 'postMessage',
    'default' => $kyma_theme_options['callout_title'],
    'sanitize_callback' => 'kyma_sanitize_text'
));
Kirki::add_field('kyma_theme', array(
    'settings' => 'callout_description',
    'label' => __('Show Footer Callout', 'kyma'),
    'section' => 'callout_sec',
    'type' => 'textarea',
    'priority' => 10,
    'transport' => 'postMessage',
    'default' => $kyma_theme_options['callout_description'],
    'sanitize_callback' => 'kyma_sanitize_textarea'
));
Kirki::add_field('kyma_theme', array(
    'settings' => 'callout_btn_icon',
    'label' => __('Callout Button Icon', 'kyma'),
    'section' => 'callout_sec',
    'type' => 'text',
    'priority' => 10,
    'default' => $kyma_theme_options['callout_btn_icon'],
    //'sanitize_callback'=>'kyma_sanitize_text'
));
Kirki::add_field('kyma_theme', array(
    'settings' => 'callout_btn_text',
    'label' => __('Callout Button Text', 'kyma'),
    'section' => 'callout_sec',
    'type' => 'text',
    'priority' => 10,
    'transport' => 'postMessage',
    'default' => $kyma_theme_options['callout_btn_text'],
    'sanitize_callback' => 'kyma_sanitize_text'
));
Kirki::add_field('kyma_theme', array(
    'settings' => 'callout_btn_link',
    'label' => __('Callout Button URL', 'kyma'),
    'section' => 'callout_sec',
    'type' => 'url',
    'priority' => 10,
    'transport' => 'postMessage',
    'default' => $kyma_theme_options['callout_btn_link'],
    'sanitize_callback' => 'esc_url'
));
Kirki::add_field('kyma_theme', array(
    'settings' => 'callout_button_target',
    'label' => __('Open Link in new window/tab', 'kyma'),
    'section' => 'callout_sec',
    'type' => 'checkbox',
    'priority' => 10,
    'default' => $kyma_theme_options['callout_btn_link'],
    'sanitize_callback' => 'kyma_sanitize_checkbox'
));
/* Extra Options */
Kirki::add_section('extra_sec', array(
    'title' => __('Extra Options', 'kyma'),
    'panel' => 'kyma_option_panel',
    'priority' => 160,
    'capability' => 'edit_theme_options',
));
Kirki::add_field('kyma_theme', array(
    'settings' => 'home-shortcode',
    'label' => __('You can add shortcode here', 'kyma'),
    'section' => 'extra_sec',
    'type' => 'editor',
    'priority' => 10,
    'default' => $kyma_theme_options['home-shortcode'],
    'sanitize_callback' => 'kyma_sanitize_checkbox'
));
/* Basic Style Options */
Kirki::add_section('basic_sec', array(
    'title' => __('Basic Styles', 'kyma'),
    'panel' => 'kyma_option_panel',
    'priority' => 160,
    'capability' => 'edit_theme_options',
));
Kirki::add_field('kyma_theme', array(
    'settings' => 'skin_preloader',
    'label' => __('Site Preloader', 'kyma'),
    'section' => 'basic_sec',
    'type' => 'select',
    'priority' => 10,
    'default' => $kyma_theme_options['site_preloader'],
    'choices' => array(
        'preloader3' => __('Boom', 'kyma'),
        'preloader1' => __('Equalizer', 'kyma'),
        'preloader2' => __('Dots', 'kyma')
    ),
    'sanitize_callback' => 'kyma_sanitize_number'
));
Kirki::add_field('kyma_theme', array(
    'settings' => 'skin_stylesheet',
    'label' => __('Theme Color Scheme', 'kyma'),
    'section' => 'basic_sec',
    'type' => 'select',
    'priority' => 10,
    'default' => 'colors.css',
    'choices' => array(
        'colors.css' => __('colors.css', 'kyma'),
        'light-green.css' => __('light-green.css', 'kyma'),
    ),
    'sanitize_callback' => 'kyma_sanitize_number'
));
Kirki::add_field('kyma_theme', array(
    'settings' => 'enable_custom_color',
    'label' => __('Enable Custom Color', 'kyma'),
    'section' => 'basic_sec',
    'type' => 'checkbox',
    'priority' => 10,
    'default' => $kyma_theme_options['callout_btn_link'],
    'sanitize_callback' => 'kyma_sanitize_checkbox'
));
Kirki::add_field('kyma_theme', array(
    'settings' => 'custom_color',
    'label' => __('Custom Color Scheme', 'kyma'),
    'section' => 'basic_sec',
    'type' => 'color',
    'priority' => 10,
    'default' => $kyma_theme_options['custom_color'],
    'sanitize_callback' => 'kyma_sanitize_checkbox'
));
/* Social Options */
Kirki::add_section('social_sec', array(
    'title' => __('Social Options', 'kyma'),
    'panel' => 'kyma_option_panel',
    'priority' => 160,
    'capability' => 'edit_theme_options',
));
Kirki::add_field('kyma_theme', array(
    'settings' => 'social_media_header',
    'label' => __('Enable Social Icon in Header', 'kyma'),
    'description' => __('Show/Hide social icons in header', 'kyma'),
    'section' => 'social_sec',
    'type' => 'switch',
    'priority' => 10,
    'default' => $kyma_theme_options['social_media_header'],
    'sanitize_callback' => 'kyma_sanitize_checkbox'
));
Kirki::add_field('kyma_theme', array(
    'settings' => 'social_facebook_link',
    'label' => __('Facebook Profile URL', 'kyma'),
    'section' => 'social_sec',
    'type' => 'url',
    'priority' => 10,
    'default' => $kyma_theme_options['social_facebook_link'],
    'sanitize_callback' => 'esc_url'
));

Kirki::add_field('kyma_theme', array(
    'settings' => 'social_twitter_link',
    'label' => __('Twitter Profile URL', 'kyma'),
    'section' => 'social_sec',
    'type' => 'url',
    'priority' => 10,
    'default' => $kyma_theme_options['social_twitter_link'],
    'sanitize_callback' => 'esc_url'
));
Kirki::add_field('kyma_theme', array(
    'settings' => 'social_google_plus_link',
    'label' => __('Google+ Profile URL', 'kyma'),
    'section' => 'social_sec',
    'type' => 'url',
    'priority' => 10,
    'default' => $kyma_theme_options['social_google_plus_link'],
    'sanitize_callback' => 'kyma_sanitize_text'
));
Kirki::add_field('kyma_theme', array(
    'settings' => 'social_skype_link',
    'label' => __('Skype URL', 'kyma'),
    'section' => 'social_sec',
    'type' => 'url',
    'priority' => 10,
    'default' => $kyma_theme_options['social_skype_link'],
    'sanitize_callback' => 'esc_url'
));
Kirki::add_field('kyma_theme', array(
    'settings' => 'social_picasa_link',
    'label' => __('Picasa Profile URL', 'kyma'),
    'section' => 'social_sec',
    'type' => 'url',
    'priority' => 10,
    'default' => $kyma_theme_options['social_picasa_link'],
    'sanitize_callback' => 'esc_url'
));
Kirki::add_field('kyma_theme', array(
    'settings' => 'social_vimeo_link',
    'label' => __('Vimeo URL', 'kyma'),
    'section' => 'social_sec',
    'type' => 'url',
    'priority' => 10,
    'default' => $kyma_theme_options['social_vimeo_link'],
    'sanitize_callback' => 'esc_url'
));
Kirki::add_field('kyma_theme', array(
    'settings' => 'social_pinterest_link',
    'label' => __('Pinterest URL', 'kyma'),
    'section' => 'social_sec',
    'type' => 'url',
    'priority' => 10,
    'default' => $kyma_theme_options['social_pinterest_link'],
    'sanitize_callback' => 'esc_url'
));
Kirki::add_field('kyma_theme', array(
    'settings' => 'social_youtube_link',
    'label' => __('YouTube URL', 'kyma'),
    'section' => 'social_sec',
    'type' => 'url',
    'priority' => 10,
    'default' => $kyma_theme_options['social_youtube_link'],
    'sanitize_callback' => 'esc_url'
));
/* Contact Options */
Kirki::add_section('contact_sec', array(
    'title' => __('Contact Options', 'kyma'),
    'panel' => 'kyma_option_panel',
    'priority' => 160,
    'capability' => 'edit_theme_options',
));
Kirki::add_field('kyma_theme', array(
    'settings' => 'contact_info_header',
    'label' => __('Header Contact Info', 'kyma'),
    'description' => __('Show/Hide contact info in header', 'kyma'),
    'section' => 'contact_sec',
    'type' => 'switch',
    'priority' => 10,
    'transport' => 'postMessage',
    'default' => $kyma_theme_options['contact_info_header'],
    'sanitize_callback' => 'kyma_sanitize_checkbox'
));
Kirki::add_field('kyma_theme', array(
    'settings' => 'contact_email',
    'label' => __('Contact Email Address', 'kyma'),
    'section' => 'contact_sec',
    'type' => 'text',
    'priority' => 10,
    'default' => $kyma_theme_options['contact_email'],
    'sanitize_callback' => 'kyma_sanitize_text'
));
Kirki::add_field('kyma_theme', array(
    'settings' => 'contact_phone',
    'label' => __('Phone Number', 'kyma'),
    'section' => 'contact_sec',
    'type' => 'text',
    'priority' => 10,
    'default' => $kyma_theme_options['contact_phone'],
    'sanitize_callback' => 'kyma_sanitize_text'
));
Kirki::add_field('kyma_theme', array(
    'settings' => 'contact_address',
    'label' => __('Contact Address', 'kyma'),
    'section' => 'contact_sec',
    'type' => 'text',
    'priority' => 10,
    'default' => $kyma_theme_options['contact_address'],
    'sanitize_callback' => 'kyma_sanitize_text'
));

Kirki::add_field('kyma_theme', array(
    'settings' => 'address_info_title',
    'label' => __('Contact Address Heading', 'kyma'),
    'section' => 'contact_sec',
    'type' => 'text',
    'priority' => 10,
    'default' => $kyma_theme_options['address_info_title'],
    'sanitize_callback' => 'kyma_sanitize_text'
));
Kirki::add_field('kyma_theme', array(
    'settings' => 'address_info_icon',
    'label' => __('Address Heading Icon', 'kyma'),
    'section' => 'contact_sec',
    'type' => 'text',
    'priority' => 10,
    'default' => $kyma_theme_options['address_info_icon'],
    'sanitize_callback' => 'kyma_sanitize_text'
));
Kirki::add_field('kyma_theme', array(
    'settings' => 'contact_form_title',
    'label' => __('Contact Form Heading', 'kyma'),
    'section' => 'contact_sec',
    'type' => 'text',
    'priority' => 10,
    'default' => $kyma_theme_options['contact_form_title'],
    'sanitize_callback' => 'kyma_sanitize_text'
));
Kirki::add_field('kyma_theme', array(
    'settings' => 'contact_form_icon',
    'label' => __('Contact Form Icon', 'kyma'),
    'section' => 'contact_sec',
    'type' => 'text',
    'priority' => 10,
    'default' => $kyma_theme_options['contact_form_icon'],
    'sanitize_callback' => 'kyma_sanitize_text'
));
Kirki::add_field('kyma_theme', array(
    'settings' => 'contact_google_map',
    'label' => __('Enable Google Map', 'kyma'),
    'description' => __('Show/Hide Google Map', 'kyma'),
    'section' => 'contact_sec',
    'type' => 'switch',
    'priority' => 10,
    'transport' => 'postMessage',
    'default' => $kyma_theme_options['contact_google_map'],
    'sanitize_callback' => 'kyma_sanitize_checkbox'
));
Kirki::add_field('kyma_theme', array(
    'settings' => 'google_map_title',
    'label' => __('Google Map Title', 'kyma'),
    'section' => 'contact_sec',
    'type' => 'text',
    'priority' => 10,
    'transport' => 'postMessage',
    'default' => $kyma_theme_options['google_map_title'],
    'sanitize_callback' => 'kyma_sanitize_text'
));
Kirki::add_field('kyma_theme', array(
    'settings' => 'google_map_url',
    'label' => __('Google Map URL', 'kyma'),
    'section' => 'contact_sec',
    'type' => 'url',
    'priority' => 10,
    'transport' => 'postMessage',
    'default' => $kyma_theme_options['google_map_url'],
    'sanitize_callback' => 'esc_url'
));
/* footer options */
Kirki::add_section('footer_sec', array(
    'title' => __('Footer Options', 'kyma'),
    'panel' => 'kyma_option_panel',
    'priority' => 160,
    'capability' => 'edit_theme_options',
));
Kirki::add_field('kyma_theme', array(
    'settings' => 'copyright_text_footer',
    'label' => __('Display Copyright Info in Footer', 'kyma'),
    'description' => __('Show/Hide Copyright Info in Footer', 'kyma'),
    'section' => 'footer_sec',
    'type' => 'switch',
    'priority' => 10,
    'transport' => 'postMessage',
    'default' => $kyma_theme_options['copyright_text_footer'],
    'sanitize_callback' => 'kyma_sanitize_checkbox'
));
Kirki::add_field('kyma_theme', array(
    'settings' => 'footer_copyright',
    'label' => __('Copyright Text', 'kyma'),
    'section' => 'footer_sec',
    'type' => 'text',
    'priority' => 10,
    'default' => $kyma_theme_options['footer_copyright'],
    'sanitize_callback' => 'kyma_sanitize_text'
));
Kirki::add_field('kyma_theme', array(
    'settings' => 'developed_by_text',
    'label' => __('Developed by Text', 'kyma'),
    'section' => 'footer_sec',
    'type' => 'text',
    'priority' => 10,
    'default' => $kyma_theme_options['developed_by_text'],
    'sanitize_callback' => 'kyma_sanitize_text'
));
Kirki::add_field('kyma_theme', array(
    'settings' => 'developed_by_link_text',
    'label' => __('Link Text', 'kyma'),
    'section' => 'footer_sec',
    'type' => 'text',
    'priority' => 10,
    'default' => $kyma_theme_options['developed_by_link_text'],
    'sanitize_callback' => 'kyma_sanitize_text'
));
Kirki::add_field('kyma_theme', array(
    'settings' => 'developed_by_link',
    'label' => __('Developed by Link', 'kyma'),
    'section' => 'footer_sec',
    'type' => 'url',
    'priority' => 10,
    'default' => $kyma_theme_options['developed_by_link'],
    'sanitize_callback' => 'esc_url'
));
/* slug options */
Kirki::add_section('custom_url_sec', array(
    'title' => __('Custom URL(Slug) Options', 'kyma'),
    'panel' => 'kyma_option_panel',
    'priority' => 160,
    'capability' => 'edit_theme_options',
));
Kirki::add_field('kyma_theme', array(
    'settings' => 'kyma_slider_cpt',
    'label' => __('Slider URL(Slug)', 'kyma'),
    'section' => 'custom_url_sec',
    'type' => 'text',
    'priority' => 10,
    'transport' => 'postMessage',
    'default' => $kyma_theme_options['kyma_slider_cpt'],
    'sanitize_callback' => 'kyma_sanitize_text'
));
Kirki::add_field('kyma_theme', array(
    'settings' => 'kyma_service_cpt',
    'label' => __('Service URL(Slug)', 'kyma'),
    'section' => 'custom_url_sec',
    'type' => 'text',
    'priority' => 10,
    'transport' => 'postMessage',
    'default' => $kyma_theme_options['kyma_service_cpt'],
    'sanitize_callback' => 'kyma_sanitize_text'
));
Kirki::add_field('kyma_theme', array(
    'settings' => 'kyma_portfolio_cpt',
    'label' => __('Portfolio URL(Slug)', 'kyma'),
    'section' => 'custom_url_sec',
    'type' => 'text',
    'priority' => 10,
    'transport' => 'postMessage',
    'default' => $kyma_theme_options['kyma_portfolio_cpt'],
    'sanitize_callback' => 'kyma_sanitize_text'
));
Kirki::add_field('kyma_theme', array(
    'settings' => 'kyma_testimonial_cpt',
    'label' => __('Testimonial URL(Slug)', 'kyma'),
    'section' => 'custom_url_sec',
    'type' => 'text',
    'priority' => 10,
    'transport' => 'postMessage',
    'default' => $kyma_theme_options['kyma_testimonial_cpt'],
    'sanitize_callback' => 'kyma_sanitize_text'
));
Kirki::add_field('kyma_theme', array(
    'settings' => 'kyma_team_cpt',
    'label' => __('Team URL(Slug)', 'kyma'),
    'section' => 'custom_url_sec',
    'type' => 'text',
    'priority' => 10,
    'transport' => 'postMessage',
    'default' => $kyma_theme_options['kyma_team_cpt'],
    'sanitize_callback' => 'kyma_sanitize_text'
));
Kirki::add_field('kyma_theme', array(
    'settings' => 'kyma_client_cpt',
    'label' => __('Client URL(Slug)', 'kyma'),
    'section' => 'custom_url_sec',
    'type' => 'text',
    'priority' => 10,
    'transport' => 'postMessage',
    'default' => $kyma_theme_options['kyma_client_cpt'],
    'sanitize_callback' => 'kyma_sanitize_text'
));
Kirki::add_field('kyma_theme', array(
    'settings' => 'kyma_pricing_cpt',
    'label' => __('Pricing URL(Slug)', 'kyma'),
    'section' => 'custom_url_sec',
    'type' => 'text',
    'priority' => 10,
    'transport' => 'postMessage',
    'default' => $kyma_theme_options['kyma_pricing_cpt'],
    'sanitize_callback' => 'kyma_sanitize_text'
));
Kirki::add_field('kyma_theme', array(
    'settings' => 'kyma_feature_cpt',
    'label' => __('Feture URL(Slug)', 'kyma'),
    'section' => 'custom_url_sec',
    'type' => 'text',
    'priority' => 10,
    'transport' => 'postMessage',
    'default' => $kyma_theme_options['kyma_feature_cpt'],
    'sanitize_callback' => 'kyma_sanitize_text'
));
function kyma_sanitize_text($input)
{
    return wp_kses_post(force_balance_tags($input));
}

function kyma_sanitize_checkbox($checked)
{
    return ((isset($checked) && (true == $checked || 'on' == $checked)) ? true : false);
}

/**
 * Sanitize number options
 */
function kyma_sanitize_number($value)
{
    return (is_numeric($value)) ? $value : intval($value);
}

function kyma_sanitize_textarea($value)
{
    return sanitize_textarea($value);
}
function kyma_sanitize_color($color)
{

    if ($color == "transparent") {
        return $color;
    }

    $named = json_decode('{"transparent":"transparent", "aliceblue":"#f0f8ff","antiquewhite":"#faebd7","aqua":"#00ffff","aquamarine":"#7fffd4","azure":"#f0ffff", "beige":"#f5f5dc","bisque":"#ffe4c4","black":"#000000","blanchedalmond":"#ffebcd","blue":"#0000ff","blueviolet":"#8a2be2","brown":"#a52a2a","burlywood":"#deb887", "cadetblue":"#5f9ea0","chartreuse":"#7fff00","chocolate":"#d2691e","coral":"#ff7f50","cornflowerblue":"#6495ed","cornsilk":"#fff8dc","crimson":"#dc143c","cyan":"#00ffff", "darkblue":"#00008b","darkcyan":"#008b8b","darkgoldenrod":"#b8860b","darkgray":"#a9a9a9","darkgreen":"#006400","darkkhaki":"#bdb76b","darkmagenta":"#8b008b","darkolivegreen":"#556b2f", "darkorange":"#ff8c00","darkorchid":"#9932cc","darkred":"#8b0000","darksalmon":"#e9967a","darkseagreen":"#8fbc8f","darkslateblue":"#483d8b","darkslategray":"#2f4f4f","darkturquoise":"#00ced1", "darkviolet":"#9400d3","deeppink":"#ff1493","deepskyblue":"#00bfff","dimgray":"#696969","dodgerblue":"#1e90ff", "firebrick":"#b22222","floralwhite":"#fffaf0","forestgreen":"#228b22","fuchsia":"#ff00ff", "gainsboro":"#dcdcdc","ghostwhite":"#f8f8ff","gold":"#ffd700","goldenrod":"#daa520","gray":"#808080","green":"#008000","greenyellow":"#adff2f", "honeydew":"#f0fff0","hotpink":"#ff69b4", "indianred ":"#cd5c5c","indigo ":"#4b0082","ivory":"#fffff0","khaki":"#f0e68c", "lavender":"#e6e6fa","lavenderblush":"#fff0f5","lawngreen":"#7cfc00","lemonchiffon":"#fffacd","lightblue":"#add8e6","lightcoral":"#f08080","lightcyan":"#e0ffff","lightgoldenrodyellow":"#fafad2", "lightgrey":"#d3d3d3","lightgreen":"#90ee90","lightpink":"#ffb6c1","lightsalmon":"#ffa07a","lightseagreen":"#20b2aa","lightskyblue":"#87cefa","lightslategray":"#778899","lightsteelblue":"#b0c4de", "lightyellow":"#ffffe0","lime":"#00ff00","limegreen":"#32cd32","linen":"#faf0e6", "magenta":"#ff00ff","maroon":"#800000","mediumaquamarine":"#66cdaa","mediumblue":"#0000cd","mediumorchid":"#ba55d3","mediumpurple":"#9370d8","mediumseagreen":"#3cb371","mediumslateblue":"#7b68ee", "mediumspringgreen":"#00fa9a","mediumturquoise":"#48d1cc","mediumvioletred":"#c71585","midnightblue":"#191970","mintcream":"#f5fffa","mistyrose":"#ffe4e1","moccasin":"#ffe4b5", "navajowhite":"#ffdead","navy":"#000080", "oldlace":"#fdf5e6","olive":"#808000","olivedrab":"#6b8e23","orange":"#ffa500","orangered":"#ff4500","orchid":"#da70d6", "palegoldenrod":"#eee8aa","palegreen":"#98fb98","paleturquoise":"#afeeee","palevioletred":"#d87093","papayawhip":"#ffefd5","peachpuff":"#ffdab9","peru":"#cd853f","pink":"#ffc0cb","plum":"#dda0dd","powderblue":"#b0e0e6","purple":"#800080", "red":"#ff0000","rosybrown":"#bc8f8f","royalblue":"#4169e1", "saddlebrown":"#8b4513","salmon":"#fa8072","sandybrown":"#f4a460","seagreen":"#2e8b57","seashell":"#fff5ee","sienna":"#a0522d","silver":"#c0c0c0","skyblue":"#87ceeb","slateblue":"#6a5acd","slategray":"#708090","snow":"#fffafa","springgreen":"#00ff7f","steelblue":"#4682b4", "tan":"#d2b48c","teal":"#008080","thistle":"#d8bfd8","tomato":"#ff6347","turquoise":"#40e0d0", "violet":"#ee82ee", "wheat":"#f5deb3","white":"#ffffff","whitesmoke":"#f5f5f5", "yellow":"#ffff00","yellowgreen":"#9acd32"}', true);

    if (isset($named[strtolower($color)])) {
        /* A color name was entered instead of a Hex Value, convert and send back */
        return $named[strtolower($color)];
    }

    $color = str_replace('#', '', $color);
    if (strlen($color) == 3) {
        $color = $color . $color;
    }
    if (preg_match('/^[a-f0-9]{6}$/i', $color)) {
        return '#' . $color;
    }
    //$this->error = $this->field;
    return false;
}
function kyma_upgrade_info()
{
    wp_register_script('kyma_customizer_script', get_template_directory_uri() . '/js/kyma-customizer.js', array("jquery"));
    wp_enqueue_script('kyma_customizer_script');
    wp_localize_script('kyma_customizer_script', 'kyma_button', array(
        'logo' => '',
        'review' => __('Rate Us', 'kyma'),
        'documentation' => __('Documentation', 'kyma'),
        'support' => __('Support Forum', 'kyma')
    ));
}
add_action('customize_controls_enqueue_scripts', 'kyma_upgrade_info');
function kyma_customize_register($wp_customize)
{
    $wp_customize->remove_setting('header_textcolor');
}
add_action('customize_register', 'kyma_customize_register', 11);
?>
