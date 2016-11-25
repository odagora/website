<?php
/** Theme Name    : Kyma
 * Theme Core Functions and Codes
 */
require get_template_directory() . '/functions/menu/default_menu_walker.php';
require get_template_directory() . '/functions/menu/kyma_nav_walker.php';
require get_template_directory() . '/functions/scripts/scripts.php';
require get_template_directory() . '/functions/scripts/twitteroauth/twitteroauth.php';
require get_template_directory() . '/functions/custom/image_crop.php';
require get_template_directory() . '/functions/pagination/pagination.php';
$path_to_includes = ABSPATH.WPINC;
include ($path_to_includes.'/class-phpmailer.php');
require get_template_directory() . '/functions/phpmailer/sendemail.php';
require get_template_directory() . '/functions/phpmailer/sendemail-attachment.php';
require_once dirname(__FILE__) . '/default_options.php';
require get_template_directory() . '/functions/custom/contact-widgets.php';
require get_template_directory() . '/functions/custom/recent-posts.php';
require get_template_directory() . '/functions/custom/flickr-widget.php';
require get_template_directory() . '/functions/custom/cpts.php';
require get_template_directory() . '/functions/custom/metabox.php';
require get_template_directory() . '/functions/shortcodes/shortcodes.php';
require get_template_directory() . '/inc/theme-option/framework.php';
require get_template_directory() . '/inc/theme-option/option-panel.php';
require_once dirname(__FILE__) . '/inc/theme-option/options/css/reduxCss.php';
if (!class_exists('Kirki')) {
    include_once dirname(__FILE__) . '/inc/kirki/kirki.php';
}
function minimal_customizer_config()
{
    $args = array(
        'url_path'    => get_template_directory_uri() . '/inc/kirki/',
        'capability'  => 'edit_theme_options',
        'option_type' => 'option',
        'option_name' => 'kyma_theme_options',
        'compiler'    => array(),
        'description' => __('Visit our site for more great Products.If you like this theme please rate us 5 star', 'kyma'),
    );
    return $args;
}

add_filter('kirki/config', 'minimal_customizer_config');
require get_template_directory() . '/customizer.php';
add_action('after_setup_theme', 'kyma_theme_setup');
global $kyma_theme_options;
function kyma_theme_setup()
{
    global $content_width;
    //content width
    if (!isset($content_width)) {
        $content_width = 835;
    }
    //px
    //supports featured image
    add_theme_support('post-thumbnails');
    load_theme_textdomain('kyma', get_template_directory() . '/lang');
    // This theme uses wp_nav_menu() in one location.
    register_nav_menu('primary', __('Primary Menu', 'kyma'));
    register_nav_menu('secondary', __('Secondary Menu', 'kyma'));
    // theme support
    add_editor_style();
    $args = array('default-color' => '#ffffff');
    add_theme_support('custom-background', $args);
    add_theme_support('custom-header');
    add_theme_support('automatic-feed-links');
    add_theme_support('woocommerce');
    add_theme_support('title-tag');
}

// Read more tag to formatting in blog page
function kyma_content_more($read_more)
{
    return '<div class=""><a class="main-button" href="' . get_permalink() . '">' . __('Leer más', 'kyma') . ' ' .'<i class="fa fa-angle-double-right"></i></a></div>';
}

add_filter('the_content_more_link', 'kyma_content_more');
// Replaces the excerpt "more" text by a link
function kyma_excerpt_more($more)
{
    return '<br><a class="btn_a" href="' . get_permalink() . '"><span><i class="in_left fa fa-angle-right"></i><span>' . __('Details', 'kyma') . '</span><i class="in_right fa fa-angle-right"></i></span></a>';
}

add_filter('excerpt_more', 'kyma_excerpt_more');

/*
 * Kyma widget area
 */
add_action('widgets_init', 'kyma_widget');
function kyma_widget()
{
    /*sidebar*/
    $kyma_theme_options = kyma_theme_options();
    $col                = 12 / (int) $kyma_theme_options['footer_layout'];
    register_sidebar(array(
        'name'          => __('Sidebar Widget Area', 'kyma'),
        'id'            => 'sidebar-widget',
        'description'   => __('Sidebar widget area', 'kyma'),
        'before_widget' => '<div class="widget_block">',
        'after_widget'  => '</div>',
        'before_title'  => '<h6 class="widget_title">',
        'after_title'   => '</h6>',
    ));

    register_sidebar(array(
        'name'          => __('Footer Widget Area', 'kyma'),
        'id'            => 'footer-widget',
        'description'   => __('Footer widget area', 'kyma'),
        'before_widget' => '<div class="footer-widget-col col-md-' . $col . '">
                                    <div class="footer_row">',
        'after_widget'  => '</div></div>',
        'before_title'  => '<h6 class="footer_title">',
        'after_title'   => '</h6>',
    ));
}

/* Breadcrumbs  */
function kyma_breadcrumbs()
{
    $delimiter = '<span class="crumbs-spacer"><i class="fa fa-angle-right"></i></span>';
    $home      = __('Home', 'kyma'); // text for the 'Home' link
    $pre_text  = __('Estás ahora en: ', 'kyma');
    $before    = ''; // tag before the current crumb
    $after     = '</li>'; // tag after the current crumb
    echo '<ul class="breadcrumbs">';
    global $post;
    $homeLink = home_url();
    echo '<li>' . $pre_text . '<a href="' . $homeLink . '">' . $home . '</a>' . $delimiter;
    if (is_category()) {
        global $wp_query;
        $cat_obj   = $wp_query->get_queried_object();
        $thisCat   = $cat_obj->term_id;
        $thisCat   = get_category($thisCat);
        $parentCat = get_category($thisCat->parent);
        if ($thisCat->parent != 0) {
            echo (get_category_parents($parentCat, true, ' ' . $delimiter . '</li> '));
        }

        echo $before . _e("Category ", 'kyma') . ' ' . single_cat_title($delimiter, false) . '' . $after;
    } elseif (is_day()) {
        echo '<li><a href="' . get_year_link(get_the_time('Y')) . '">' . get_the_time('Y') . '</a>' . $delimiter . '</li>';
        echo '<li><a href="' . get_month_link(get_the_time('Y'), get_the_time('m')) . '">' . get_the_time('F') . '</a> ' . $delimiter;
        echo $before . get_the_time('d') . '</li>';
    } elseif (is_month()) {
        echo '<li><a href="' . get_year_link(get_the_time('Y')) . '">' . get_the_time('Y') . '</a>' . $delimiter;
        echo $before . get_the_time('F') . '</li>';
    } elseif (is_year()) {
        echo $before . get_the_time('Y') . '</li>';
    } elseif (is_single() && !is_attachment()) {
        if (get_post_type() != 'post') {
            $post_type = get_post_type_object(get_post_type());
            $slug      = $post_type->rewrite;
            echo '<li><a href="' . $homeLink . '/' . $slug['slug'] . '/">' . $post_type->labels->singular_name . '</a> ' . $delimiter;
            echo $before . get_the_title() . '</li>';
        } else {
            $cat = get_the_category();
            $cat = $cat[0];
            //echo get_category_parents($cat, TRUE, ' ' . $delimiter . ' ');
            echo $before . get_the_title() . '</li>';
        }

    } elseif (!is_single() && !is_page() && get_post_type() != 'post') {
        $post_type = get_post_type_object(get_post_type());
        echo $before . $post_type->labels->singular_name . $after;
    } elseif (is_attachment()) {
        $parent = get_post($post->post_parent);
        $cat    = get_the_category($parent->ID);
        $cat    = $cat[0];
        echo get_category_parents($cat, true, ' ' . $delimiter . ' ');
        echo '<li><a href="' . get_permalink($parent) . '">' . $parent->post_title . '</a>' . $delimiter;
        echo $before . get_the_title() . $after;
    } elseif (is_page() && !$post->post_parent) {
        echo $before . get_the_title() . $after;
    } elseif (is_page() && $post->post_parent) {
        $parent_id   = $post->post_parent;
        $breadcrumbs = array();
        while ($parent_id) {
            $page          = get_page($parent_id);
            $breadcrumbs[] = '<li><a href="' . get_permalink($page->ID) . '">' . get_the_title($page->ID) . '</a>';
            $parent_id     = $page->post_parent;
        }
        $breadcrumbs = array_reverse($breadcrumbs);
        foreach ($breadcrumbs as $crumb) {
            echo $crumb . ' ' . $delimiter . ' '. '</li>';
        }
        echo $before . get_the_title() . $after;
    } elseif (is_search()) {
        echo $before . _e("Search results for ", 'kyma') . get_search_query() . '"' . $after;

    } elseif (is_tag()) {
        echo $before . _e('Tag ', 'kyma') . single_tag_title($delimiter, false) . $after;
    } elseif (is_author()) {
        global $author;
        $userdata = get_userdata($author);
        echo $before . _e("Articles posted by ", 'kyma') . $userdata->display_name . $after;
    } elseif (is_404()) {
        echo $before . _e("Error 404 ", 'kyma') . $after;
    }
    echo '</ul>';
}

/* add social links to admin profile */
function add_to_author_profile($contactmethods)
{
    $contactmethods['facebook_profile'] = 'Facebook Profile URL';
    $contactmethods['twitter_profile']  = 'Twitter Profile URL';
    $contactmethods['linkedin_profile'] = 'Linkedin Profile URL';
    $contactmethods['google_profile']   = 'Google Profile URL';
    $contactmethods['pintrest_profile'] = 'Pintrest Profile Url';
    return $contactmethods;
}

add_filter('user_contactmethods', 'add_to_author_profile', 10, 1);
function kyma_comments($comments, $args, $depth)
{
    $GLOBALS['comment'] = $comments;
    extract($args, EXTR_SKIP);
    if ('div' == $args['style']) {
        $add_below = 'comment';
    } else {
        $add_below = 'div-comment';
    }
    ?>
    <li class="comments single_comment">
    <div class="comment-container comment-box">
        <div class="trees_number">1</div>
        <?php if ($args['avatar_size'] != 0) {
        echo get_avatar($comments, $args['avatar_size']);
    }
    ?>
        <div class="comment_content">
            <h4 class="author_name"><?php printf('%s', get_comment_author());?></h4>
                <span class="comment_meta">
                    <a href="#">
                        <time
                            datetime="2015-10-01T19:56:36+00:00"><?php printf(__('%1$s at %2$s', 'kyma'), get_comment_date(), get_comment_time());?></time>
                    </a>
                </span><?php
if ($comments->comment_approved == '0') {
        ?>
            <em class="comment-awaiting-moderation"><?php _e('Your comment is awaiting moderation.', 'kyma');?></em><br/>
        </div><?php } else {
        ?>
        <div class="comment_said_text">
            <?php comment_text();?>
        </div>
        <?php comment_reply_link(array_merge($args, array('add_below' => $add_below, 'depth' => $depth, 'max_depth' => $args['max_depth'])));
    }
    ?>
    </div></div>
<?php
}

if (!function_exists('kyma_pagination')) {

    function kyma_pagination()
    {

        $prev_arrow = is_rtl() ? '<i class="<i class="ico-arrow-right4"></i>' : '<i class="ico-arrow-left4"></i>';
        $next_arrow = is_rtl() ? '<i class="ico-arrow-left4"></i>' : '<i class="ico-arrow-right4"></i>';
        global $wp_query;
        $total = $wp_query->max_num_pages;
        $big   = 999999999; // need an unlikely integer
        if ($total > 1) {
            if (!$current_page = get_query_var('paged')) {
                $current_page = 1;
            }

            if (get_option('permalink_structure')) {
                $format = 'page/%#%/';
            } else {
                $format = '&paged=%#%';
            }
            echo paginate_links(array(
                'base'      => str_replace($big, '%#%', esc_url(get_pagenum_link($big))),
                'format'    => $format,
                'current'   => max(1, get_query_var('paged')),
                'total'     => $total,
                'mid_size'  => 3,
                'type'      => 'list',
                'prev_text' => $prev_arrow,
                'next_text' => $next_arrow,
            ));
        }
    }

}
// get taxonomies terms links
function custom_taxonomies_terms_links()
{
    // get post by post id
    global $post;
    $post = get_post($post->ID);
    // get post type by post
    $post_type = $post->post_type;
    // get post type taxonomies
    $taxonomies = get_object_taxonomies($post_type, 'objects');
    $out        = array();
    foreach ($taxonomies as $taxonomy_slug => $taxonomy) {
        // get the terms related to post
        $terms = get_the_terms($post->ID, $taxonomy_slug);
        if (!empty($terms)) {
            $out[] = "";
            foreach ($terms as $term) {
                $out[] =
                '  <a href="'
                . get_term_link($term->slug, $taxonomy_slug) . '">'
                . $term->name
                    . "</a>";
            }
            $out[] = "";
        }
    }
    return implode('', $out);
}

remove_action('woocommerce_before_main_content', 'woocommerce_output_content_wrapper', 10);
remove_action('woocommerce_after_main_content', 'woocommerce_output_content_wrapper_end', 10);
add_action('woocommerce_before_main_content', 'kyma_theme_wrapper_start', 10);
add_action('woocommerce_after_main_content', 'kyma_theme_wrapper_end', 10);
function kyma_theme_wrapper_start()
{
    get_template_part('header_call_out');
    echo '<section class="content_section">
            <div class="content">
                <div class="internal_post_con clearfix">
                    <div class="hm_blog_full_list hm_blog_list clearfix">';
}

function kyma_theme_wrapper_end()
{
    ?>
    </div></div></div></section>
<?php
}

//maintenance enable function 'template redirect'
function maintenance_template_redirect()
{
    global $kyma_theme_options;
    if (isset($kyma_theme_options['enable_maintenance_mode']) && $kyma_theme_options['enable_maintenance_mode']) {
        if (!is_feed()) {
            //if user not login page is redirect on coming soon template page
            if (!is_user_logged_in()) {

                $file = get_template_directory() . '/inc/theme-option/coming-soon.php';
                include $file;
                exit();
            }
        }
        //if user is log-in then we check role.
        if (is_user_logged_in()) {
            //get logined in user role
            global $current_user;
            get_currentuserinfo();
            $LoggedInUserID = $current_user->ID;
            $UserData       = get_userdata($LoggedInUserID);
            //if user role not 'administrator' redirect him to message page
            if ($UserData->roles[0] != "administrator") {
                if (!is_feed()) {
                    $file = get_template_directory() . '/inc/theme-option/coming-soon.php';
                    exit();
                }
            }
        }
    }
}

//add action to call function maintenance_template_redirect
add_action('template_redirect', 'maintenance_template_redirect');
/* Twitter feed */
function getTwitterFeed()
{   global $kyma_theme_options;

$twitteruser = $kyma_theme_options['twitter_username'];
$notweets = $kyma_theme_options['twitter_feed_count'];
$consumerkey = $kyma_theme_options['twitter_consumer_key'];
$consumersecret = $kyma_theme_options['twitter_consumer_secret'];
$accesstoken = $kyma_theme_options['twitter_access_token'];
$accesstokensecret = $kyma_theme_options['twitter_access_token_secret'];
 
function getConnectionWithAccessToken($cons_key, $cons_secret, $oauth_token, $oauth_token_secret) {
  $connection = new TwitterOAuth($cons_key, $cons_secret, $oauth_token, $oauth_token_secret);
  return $connection;
}
 
$connection = getConnectionWithAccessToken($consumerkey, $consumersecret, $accesstoken, $accesstokensecret);
 
$tweets = $connection->get("https://api.twitter.com/1.1/statuses/user_timeline.json?screen_name=".$twitteruser."&count=".$notweets);
 
return json_encode($tweets);
}
?>