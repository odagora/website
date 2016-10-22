<?php
add_action('wp_enqueue_scripts', 'enqueue_kyma_style');
function enqueue_kyma_style()
{
    global $kyma_theme_options;
    $style = $kyma_theme_options['skin_stylesheet'];
    wp_enqueue_style('Kyma', get_stylesheet_uri());
    wp_enqueue_style('custom', get_template_directory_uri() . '/css/custom.css');
    wp_enqueue_style('responsive', get_template_directory_uri() . '/css/responsive.css');
    if (!$kyma_theme_options['enable_custom_color']) {
        wp_enqueue_style('color-scheme', get_template_directory_uri() . '/css/colors/' . $style);
    }
    wp_enqueue_style('bootstrap', get_template_directory_uri() . '/css/bootstrap.css');
    wp_enqueue_style('animate', get_template_directory_uri() . '/css/animate.min.css');
    wp_enqueue_style('settings', get_template_directory_uri() . '/css/settings.css');
    wp_enqueue_style('fontawesome', get_template_directory_uri() . '/css/font-awesome.css');
    wp_enqueue_style('magnific-popup', get_template_directory_uri() . '/css/magnific-popup.css');
    wp_enqueue_style('icon-fonts', get_template_directory_uri() . '/css/icon-fonts.css');
    if (is_singular()) wp_enqueue_script("comment-reply");
    wp_enqueue_style('Oswald', 'http://fonts.googleapis.com/css?family=Oswald:400,700,300');
    wp_enqueue_style('lato', 'http://fonts.googleapis.com/css?family=Lato:300,300italic,400italic,600,600italic,700,700italic,800,800italic');
    wp_enqueue_style('open-sans', 'http://fonts.googleapis.com/css?family=Open+Sans:400,300,300italic,400italic,600,600italic,700,700italic,800,800italic');
}

add_action('wp_footer', 'enqueue_in_footer');
function enqueue_in_footer()
{
	global $kyma_theme_options;
    wp_enqueue_script('jquery');
    wp_enqueue_script('plugins', get_template_directory_uri() . '/js/plugins.js');
	if(is_page_template('contact-us.php') || is_page_template('contact_us_two.php') || is_page_template('contact_us_three.php') || is_page_template('page-career.php')){
		wp_enqueue_script('form-validation', get_template_directory_uri() . '/js/jquery.form.validation.js');
	}
    if($kyma_theme_options['home_slider_enabled'] && ($kyma_theme_options['slider_type']==1 || $kyma_theme_options['slider_type']==2) ) {
		wp_enqueue_script('themepunch.tools', get_template_directory_uri() . '/js/jquery.themepunch.tools.min.js');
		wp_enqueue_script('themepunch.revolution', get_template_directory_uri() . '/js/jquery.themepunch.revolution.min.js');
		wp_enqueue_script('custom-js', get_template_directory_uri() . '/js/custom.js');
	}
    wp_enqueue_script('isotope.pkgd.min', get_template_directory_uri() . '/js/isotope.pkgd.min.js');
    wp_enqueue_script('progressbar', get_template_directory_uri() . '/js/progressbar.min.js');
    wp_enqueue_script('functions', get_template_directory_uri() . '/js/functions.js');
    if ( is_home() || is_front_page() ) {
        /* Video Background */
		$a = $kyma_theme_options['homepage_layout']['Enabled'];
		if(array_key_exists('video',$a)){
			wp_enqueue_script('YTPlayer', get_template_directory_uri() . '/js/jquery.mb.YTPlayer.min.js');
		}
    }
    $count_posts = wp_count_posts();
    $published_posts = $count_posts->publish;
    $blog_post_count = $kyma_theme_options['blog_post_count'];
    wp_enqueue_script('load-posts', get_template_directory_uri() . '/js/load-posts.js');
    wp_localize_script('load-posts', 'load_more_posts_variable', array(
            'counts_posts' => $published_posts,
            'blog_post_count' => $blog_post_count
        )
    );
    wp_localize_script('functions', 'dir', array(
            'uri' => get_template_directory_uri(),
        )
    );
}

add_action('admin_enqueue_scripts', 'enqueue_color_picker');
function enqueue_color_picker($hook)
{
    global $post;
    wp_enqueue_style('farbtastic');
    wp_enqueue_script('farbtastic');
    wp_enqueue_style('wp-color-picker');
    wp_enqueue_script('wp-color-picker');
    if ($hook == 'post-new.php' || $hook == 'post.php') {
        if ('kyma_service' === $post->post_type || 'post' === $post->post_type || 'kyma_pricing_plan' === $post->post_type) {
            wp_enqueue_script('kyma-pricing-clone-meta', get_template_directory_uri() . '/js/kyma-color-picker.js');
        }
    }
    if ($hook == 'post-new.php' || $hook == 'post.php') {
        if ('post' === $post->post_type || $post->post_type === 'kyma_portfolio' || $post->post_type === 'kyma_pricing_plan' || 'page' === $post->post_type) {
            wp_enqueue_script('admin-js', get_template_directory_uri() . '/js/admin.js');
        }
    }
}

add_action('wp_footer', 'kyma_enqueue_inline_css_in_header');
function kyma_enqueue_inline_css_in_header()
{
	global $kyma_theme_options;
    if (($kyma_theme_options['logo_layout'] == "right") && (!$kyma_theme_options['side_header']) && ($kyma_theme_options['upload_image_logo']!='')) { ?>
	<style>
	@media only screen and (max-width: 992px){
		#navy li {
			float: left;
			margin: 0 auto;
			padding: 0 !important;
			position: relative;
			width: 100%;
		}
		.mobile_menu_trigger {
			position: relative;
			top: 22px;
		}
		#navy {
			background: #fff;
			left: 0;
			position: relative;
			top: 0px;
			width: 100%;
			border-top: 0px solid #eeeeee;
		}
		nav#main_nav {
			float: none;
		}
		.mobile_menu_trigger {
			right: -12% !important;
		}
		.top_cart {
			right: -130px !important;
		}
	}
	@media only screen and (max-width: 600px) {
		#logo {
			float: none !important;
			margin-right: 0;
			text-align: center;
			opacity: 1 !important;
		}
		nav#main_nav, #main_nav.has_mobile_menu {
			float: none !important;
			padding: 0px 0px 75px 0px !important;
			position: relative !important;
			left: 60%;
			display: block;
			margin-top: 0px;
			margin-bottom: -28px;
		}
		#navy li {
			float: left;
			margin: 0 auto;
			padding: 0 !important;
			position: relative;
			width: 100%;
		}
		#navy {
			left: -60% !important;
			top: 35px !important;
			border-top: 0px solid #eeeeee !important;
		}
		.mobile_menu_trigger {
			right: 5% !important;
		}
		#logo > a img {
			display: inline-block;
		}
		.top_cart {
			right: -40px !important;
		}
	}
	@media only screen and (max-width: 320px) {
		.mobile_menu_trigger {
			right: 1% !important;
		}
		.top_cart {
			right: 16px !important;
		}
	}
	</style>
<?php } if (($kyma_theme_options['logo_layout'] == "right") && ($kyma_theme_options['upload_image_logo'] !='') && ($kyma_theme_options['side_header'])) { ?>
	<style>
	@media only screen and (max-width: 991px){
		#navy li {
			float: left;
			margin: 0 auto;
			padding: 0 !important;
			position: relative;
			width: 100%;
		}
		.mobile_menu_trigger {
			position: relative;
			top: -38px;
			float: left;
			right: -21% !important;
		}
		#navy {
			background: #fff;
			left: 0;
			position: relative;
			top: 0px;
			width: 100%;
			border-top: 0px solid #eeeeee;
		}
		nav#main_nav {
			float: none;
		}
		.top_cart {
			float: left;
			position: relative;
			left:23%;
		}
	}
	@media only screen and (max-width: 600px) {
		#logo {
			float: none !important;
			margin-right: 0;
			text-align: center;
			opacity: 1 !important;
		}
		nav#main_nav, #main_nav.has_mobile_menu {
			float: none !important;
			padding: 0px 0px 75px 0px !important;
			position: relative !important;
			left: 60%;
			display: block;
			margin-top: 0px;
			margin-bottom: -28px;
		}
		#navy li {
			float: left;
			margin: 0 auto;
			padding: 0 !important;
			position: relative;
			width: 100%;
		}
		#navy {
			left: -60% !important;
			top: 35px !important;
			border-top: 0px solid #eeeeee !important;
		}
		.mobile_menu_trigger {
			right: 5% !important;
			position: relative;
			top: 38px;
			float: left;
		}
		#logo > a img {
			display: inline-block;
		}
		.top_cart {
			right: 0% !important;
			top: 86px;
			float: none;
			position: absolute;
			left:0%;
		}
		#top_cart + #main_nav .nav_trigger {
			right: 0px;
		}
	}
	@media only screen and (max-width: 320px) and (min-width: 220px){
		#logo + #top_cart {
			right: 50% !important;
			top: 100px;
		}
	}
	</style>
<?php }
if ($kyma_theme_options['side_header']) { ?>
	<style>
	@media only screen and (width: 992px){
		.mobile_menu_trigger{
			display: none;
		}
	}
	</style>
<?php }
} ?>