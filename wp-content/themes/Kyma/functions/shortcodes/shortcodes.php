<?php
//get shortcodes pop-up editor == in the dashboard only, would be silly to load on the front end
if (defined('WP_ADMIN') && WP_ADMIN) {
    require_once(get_template_directory() . '/functions/shortcodes/shortcode_popup.php');
}
/*--button--*/
function parse_shortcode_content($content)
{
    /* Parse nested shortcodes and add formatting. */
    $content = trim(do_shortcode(shortcode_unautop($content)));

    /* Remove '' from the start of the string. */
    if (substr($content, 0, 4) == '')
        $content = substr($content, 4);

    /* Remove '' from the end of the string. */
    if (substr($content, -3, 3) == '')
        $content = substr($content, 0, -3);

    /* Remove any instances of ''. */
    $content = str_replace(array('<p></p>'), '', $content);
    $content = str_replace(array('<p></p>'), '', $content);
    return $content;
}

function kyma_button_shortcode($atts, $content = null)
{
    $atts = shortcode_atts(
        array('style' => '',
            'size' => 'small',
            'target' => 'self',
            'url' => '#',
            'textdata' => __('Button', 'kyma'),
            'icon' => ''
        ), $atts);
    $size = $atts['size'];
    $style = $atts['style'];
    $url = $atts['url'];
    $icon = $atts['icon'];
    $target = $atts['target'];
    $target = ($target == 'blank') ? ' target="_blank"' : '';
    $style = ($style) ? ' ' . $style : '';
    $out = '<a' . $target . ' class="main_button bottom_space' . $style . ' ' . $size . '  " href="' . $url . '" target="' . $target . '"><i class="' . $icon . '"></i>' . do_shortcode($content) . '</a>';
    return $out;
}

add_shortcode('button', 'kyma_button_shortcode');
/*--------------------------------------------*/
/* Team Meme ber
/---------------------------------------------*/
function kyma_shortcode_team($atts, $content = null)
{
    extract($atts = shortcode_atts(array(
            'style' => '',
        ), $atts
    ));
    switch ($style) {
    case 1:
	$out = '';
    $out .= '<div class="rows_container clearfix">';
            $all_posts = wp_count_posts('kyma_team')->publish;
            $args = array('post_type' => 'kyma_team', 'posts_per_page' => $all_posts);
            $team = new WP_Query($args);
            if ($team->have_posts()) {
                while ($team->have_posts()): $team->the_post();
                    $out .= '<div class="col-md-3">
                        <div class="team_block flipp_effect">
                            <div class="f1_card">
                                <div class="front face">
								<span class="team_img">';
									if (has_post_thumbnail()){ $out .= get_the_post_thumbnail(get_the_ID(),'team_circle_thumb'); }
								$out .= '</span><span class="person_name">' . get_the_title() . '</span>
                                 <span class="person_jop">' . esc_attr(get_post_meta(get_the_ID(), 'member_designation', true)) . '</span>
                                </div>
                                <div class="back face">
                                    <span class="person_name">' . get_the_title() . '</span>
                                    <span class="person_jop">' . esc_attr(get_post_meta(get_the_ID(), 'member_designation', true)) . '</span>'
                                    . get_the_content() .
                                    '<div class="social_media clearfix">';
                                        if (get_post_meta(get_the_ID(), 'twitter', true) != "") {
                                        $out .= '<a href="' . esc_url(get_post_meta(get_the_ID(), 'twitter', true)) . '" target="_blank" class="twitter"> <i class="ico-twitter4"></i></a>';
                                        } if (get_post_meta(get_the_ID(), 'fb', true) != "") {
                                        $out .= '<a href="' . esc_url(get_post_meta(get_the_ID(), 'fb', true)) . '" target="_blank" class="facebook"> <i class="ico-facebook4"></i></a>';
										} if (get_post_meta(get_the_ID(), 'gplus', true) != "") {
                                        $out .= '<a href="' . esc_url(get_post_meta(get_the_ID(), 'gplus', true)) . '" target="_blank" class="googleplus"><i class="ico-google-plus"></i></a>';
										} if (get_post_meta(get_the_ID(), 'linkedIn', true) != "") {
                                        $out .= '<a href="' . esc_url(get_post_meta(get_the_ID(), 'linkedIn', true)) . '" target="_blank" class="linkedin"><i class="ico-linkedin3"></i></a>';
										}
                                    $out .= '</div>
                                    <!--<a class="arrow_btn" href="#"><i class="ico-arrow-right4"></i>Full Profile</a>-->
                                </div>
                            </div>
                        </div>
                    </div><!-- Col -->';
					endwhile; }
            $out .= '</div>';
			return $out;
            break;
        case 2:
			$out = '';
            $out .= '<div class="team_block3 rows_container clearfix">';
			$all_posts = wp_count_posts('kyma_team')->publish;
            $args = array('post_type' => 'kyma_team', 'posts_per_page' => $all_posts);
            $team = new WP_Query($args);
            if ($team->have_posts()) {
                while ($team->have_posts()): $team->the_post();
                    $url = wp_get_attachment_image_src(get_post_thumbnail_id(get_the_ID()), 'large');
                    $out .= '<div class="team-col no_padding clearfix" data-color="#0BACB8">
                        <div class="team-col-1">
                            <a class="member_img2" href="' . esc_url($url[0]) . '" data-rel="magnific-popup">
							<span>';
								if (has_post_thumbnail()){  $out .= get_the_post_thumbnail(get_the_ID(),'team_square_thumb');
								}
							$out .= '</span>
                            </a>
                        </div>
                        <div class="team-col-2">
                            <div class="team-col-2-con">
                                <a href="#"><span class="person_name">' . get_the_title() . '</span></a>
                                <span class="person_jop">' . esc_attr(get_post_meta(get_the_ID(), 'member_designation', true)) . '</span>'
                                . get_the_content() .
                                '<div class="social_media clearfix">';
                                    if (get_post_meta(get_the_ID(), 'twitter', true) != "") {
                                    $out .= '<a href="' . esc_url(get_post_meta(get_the_ID(), 'twitter', true)) . '" target="_blank" class="twitter"><i class="ico-twitter4"></i></a>';
                                    } if (get_post_meta(get_the_ID(), 'fb', true) != "") {
                                    $out .= '<a href="' . esc_url(get_post_meta(get_the_ID(), 'fb', true)) . '" target="_blank" class="facebook"><i class="ico-facebook4"></i></a>';
									} if (get_post_meta(get_the_ID(), 'gplus', true) != "") {
                                    $out .= '<a href="' . esc_url(get_post_meta(get_the_ID(), 'gplus', true)) . '" target="_blank" class="googleplus"><i class="ico-google-plus"></i></a>';
									} if (get_post_meta(get_the_ID(), 'linkedIn', true) != "") {
                                    $out .= '<a href="' . esc_url(get_post_meta(get_the_ID(), 'linkedIn', true)) . '" target="_blank" class="linkedin"><i class="ico-linkedin3"></i></a>';
									}
                                $out .= '</div>
                            </div>
                            <span class="arrow"></span>
                        </div>
                    </div><!-- Col -->';
                endwhile; }
            $out .= '</div>';
			return $out;
		}
}

add_shortcode('team', 'kyma_shortcode_team');
/*--------------------------------------------*/
/*	Progress bar
/--------------------------------------------*/
function kyma_shortcode_progressbar($atts, $content = null)
{
    $atts = shortcode_atts(array(
            'fields' => '1',
            'skill' => __('Wordpress', 'kyma'),
            'percent' => '95',
            'color' => 'color1',
            'bar_type' => 1,
            'echo' => false
        ), $atts
    );
    $fields = $atts['fields'];
    $percent = $atts['percent'];
    $skill = $atts['skill'];
    $color = $atts['color'];
    $skills = explode(',', $skill);
    $percents = explode(',', $percent);
    $colors = explode(',', $color);
    switch ($atts['bar_type']) {
        case 1:
            $out = '';
            for ($i = 1; $i <= $fields; $i++) {
                $out .= '<div class="prog_bar2_con"><span class="title"><i class="ico-laptop2"></i><span class="prog_bar2_title">' . $skills[$i] . '</span></span>
                <div class="progress_bar prog_bar2" data-progress-val="' . $percents[$i] . '" data-progress-animation="easeOutQuad" data-progress-delay="' . 300 * $i . '" data-progress-color="' . $colors[$i] . '">
                    <div class="fill_con2">
                        <div class="fill">
                            <span class="value"><span class="num"></span><span>%</span></span>
                        </div>
                    </div>
                    <div class="fill_con">
                        <div class="fill"></div>
                    </div>
                </div></div>';
            }

            return $out;

            break;
        case 2:
            $out = '';
            for ($i = 1; $i <= $fields; $i++) {
                $out .= '<div class="progress_bar" data-progress-val="' . $percents[$i] . '" data-progress-animation="easeOutQuad" data-progress-delay="' . 300 * $i . '" data-progress-color="' . $colors[$i] . '">
                    <div class="fill_con">
                        <div class="fill">
                            <span class="title">' . $skills[$i] . '</span>
                            <span class="value"><span class="num"></span><span>%</span></span>
                        </div>
                    </div>
                </div>';
            }
            return $out;
            break;
        case 3:
            $out = '';
            for ($i = 1; $i <= $fields; $i++) {
                $out .= '<div class="col-md-3">
					<div class="hm_circle_progressbar_con">
						<div class="hm_circle_progressbar style1" data-percentag="' . $percents[$i] . '" data-start-color="#1CCDCA" data-end-color="' . $colors[$i] . '" data-delay="' . 300 * $i . '" data-animation="easeInOut"></div>
						<span class="hm_circle_title">' . $skills[$i] . '</span>
					</div>
				</div>';
            }
            return $out;
            break;
        case 4:
            $out = '';
            for ($i = 1; $i <= $fields; $i++) {
                $out .= '<div class="col-md-3">
					<div class="hm_circle_progressbar_con">
						<div class="hm_circle_progressbar style1 square" data-percentag="' . $percents[$i] . '" data-start-color="#1CCDCA" data-end-color="' . $colors[$i] . '" data-delay="' . 300 * $i . '" data-animation="easeInOut"></div>
						<span class="hm_circle_title">' . $skills[$i] . '</span>
					</div>
				</div>';
            }
            return $out;
    }
}

add_shortcode('skills', 'kyma_shortcode_progressbar');

/*--------------------------------------*/
/*	Row
/*--------------------------------------*/

function kyma_shortcode_row($atts, $content = null)
{
    extract(shortcode_atts(array(
        'class' => '',
        'bg_color' => '',
        'font_color' => ''
    ), $atts));
    $result = '<div class="row ' . $bg_color . ' ' . $font_color . '">';
    $content = str_replace("]<br />", ']', $content);
    $content = str_replace("<br />\n[", '[', $content);
    $result .= do_shortcode($content);
    $result .= '</div>';

    return $result;
}

add_shortcode('row', 'kyma_shortcode_row');
/*--------------------------------------*/
/*	Columns
/*--------------------------------------*/
function kyma_column_shortcode($atts, $content = null)
{
    $atts = shortcode_atts(array('offset' => '', 'size' => 'col-md-6'), $atts);
    $out = '<div class="' . $atts['size'] . '">' . do_shortcode($content) . '</div>';
    return $out;
}

add_shortcode('column', 'kyma_column_shortcode');


/*--------------------------------------*/
/*	Accordian
/*--------------------------------------*/
function kyma_accordion_shortcode($atts, $content = null)
{
    $atts = shortcode_atts(array(
            'fields' => '1',
            'accordian_title' => __('hello', 'kyma'),
            'accordian_text' => __('sdsd', 'kyma'),
            'accordian_icon' => 'fa fa-desktop',
            'echo' => false,

        ), $atts
    );
    $fields = $atts['fields'];
    $accordian_icon = $atts['accordian_icon'];
    $accordian_title = $atts['accordian_title'];
    $accordian_text = $atts['accordian_text'];
    $title = explode(',', $accordian_title);
    $icon = explode(',', $accordian_icon);
    $text = explode(',', $accordian_text);
    $accordian_group = substr(md5(rand()), 0, 5);
    $out = '';
    $out .= '<div class="panel-group plus_minus_style" id="' . $accordian_group . '" role="tablist" aria-multiselectable="true">';
    for ($i = 1; $i <= $fields; $i++) {
        $title[$i] = preg_replace("/__/", ',', $title[$i]);
        $text[$i] = preg_replace("/__/", ',', $text[$i]);
        if ($i == '1') {
            $out .= ' <div class="panel panel-default">
                            <div class="panel-heading">
                              <h4 class="panel-title">
                                <a data-toggle="collapse" data-parent="#' . $accordian_group . '" href="#' . $accordian_group . '' . $i . '">
                                  <i class="fa fa-angle-up control-icon"></i><i class="' . $icon[$i] . '"></i> ' . $title[$i] . '
                                </a>
                              </h4>
                            </div>

                            <div id="' . $accordian_group . '' . $i . '" class="panel-collapse collapse in">
                              <div class="panel-body">
                                  
                                             <p>' . $text[$i] . '</p>
                                       
                              </div>
                            </div>
                          </div>';
        } else {
            $out .= ' <div class="panel panel-default">
                            <div class="panel-heading">
                              <h4 class="panel-title">
                                <a data-toggle="collapse" class="collapsed" data-parent="#' . $accordian_group . '" href="#' . $accordian_group . '' . $i . '">
                                  <i class="fa fa-angle-up control-icon"></i><i class="' . $icon[$i] . '"></i> ' . $title[$i] . '
                                </a>
                              </h4>
                            </div>

                            <div id="' . $accordian_group . '' . $i . '" class="panel-collapse collapse">
                              <div class="panel-body">
                                  
                                             <p>' . $text[$i] . '</p>
                                       
                              </div>
                            </div>
                          </div>';
        }

    }
    $out .= '</div>';
    return $out;
}

add_shortcode('accordian', 'kyma_accordion_shortcode');

/*-----------Alert short code-----------*/

function kyma_alert_shortcode($atts, $content = null)
{
    $atts = shortcode_atts(array(
            'alert_heading' => __('Please enter alert heading', 'kyma'),
            'alert_text' => __('Please enter text in alert text', 'kyma'),
            'alert_style' => '',

        ), $atts
    );
    $alert_heading = $atts['alert_heading'];
    $alert_text = $atts['alert_text'];
    $alert_style = $atts ['alert_style'];

    $out = '<div class="' . $alert_style . '">
		   <strong>' . $alert_heading . '</strong>&nbsp;&nbsp;' . $alert_text . do_shortcode($content) . '</div><div class="space-sep20"></div>';
    return $out;
}

add_shortcode('alert', 'kyma_alert_shortcode');

/*-----------Dropcap-----------*/
function kyma_dropcp_shortcode($atts, $content = null)
{
    $atts = shortcode_atts(array(
            'dropcp_style' => 'dropcap_simple_content',
            'dropcp_text' => __('hasellus leo dolor, tempus non, auctor et, hendrerit quis, nisi. Curabitur ligula sapien, tincidunt non, euismod vitae, posuere imperdiet Vix sumo ferri an. pfs adodio fugit delenit ut qu.', 'kyma'),
            'dropcp_first_letter' => 'P',
            'echo' => false,
        ),
        $atts);

    $dropcp_text = $atts['dropcp_text'];
    $dropcp_style = $atts ['dropcp_style'];
    $dropcp_first_letter = $atts ['dropcp_first_letter'];

    $out = '<div class="row"><div class=""col-md-6 col-sm-6><p class=""><span class="' . $dropcp_style . '">' . $dropcp_first_letter . '</span>&nbsp;&nbsp;' . $dropcp_text . '</p></div></div>';
    return $out;
}

add_shortcode('dropcap', 'kyma_dropcp_shortcode');
/******* heading shortcode **********/
/*Tool Tip*/
function kyma_heading_function($atts, $content = null)
{
    $atts = shortcode_atts(array(
        'heading_style' => 'Theme Standard',
        'title' => __('Heading', 'kyma')
    ), $atts);

    $heading_style = $atts['heading_style'];
    $title = $atts['title'];
    if ($heading_style == "Theme Standard") {

        $out = '<div class="main_title centered upper">
				<h2><span class="line"><span class="dot"></span></span>' . $title . '</h2>
			</div>';
    } else {
        $out = '<' . $heading_style . '>' . $title . '</' . $heading_style . '>';
    }
    return $out;
}

add_shortcode('heading', 'kyma_heading_function');
/*--------------------------------------*/
/*	Tabs
/*--------------------------------------*/
function kyma_tabs_shortcode($atts, $content = null)
{
    $atts = shortcode_atts(array(
            'fields' => '1',
            'tab_title' => __('hello', 'kyma'),
            'tab_heading' => __('This is text heading', 'kyma'),
            'tab_text' => __('sdsd', 'kyma'),
            'tab_icon' => 'fa fa-desktop',
            'tab_type' => 1,
            'tab_style' => '',
            'echo' => false,

        ), $atts
    );
    $fields = $atts['fields'];
    $tab_icon = $atts['tab_icon'];
    $tab_title = $atts['tab_title'];
    $tab_heading = $atts['tab_heading'];
    $title = explode(',', $tab_title);
    $heading = explode(',', $tab_heading);
    $icon = explode(',', $tab_icon);
    $tab_text = $atts ['tab_text'];
    $text = explode(',', $tab_text);
    $id = str_replace(' ', '_', $title[1]);
    $out = '';
    switch ($atts['tab_type']) {
        case 1:
            $out .= '<div class="hm-tabs tabs2 ' . $atts['tab_style'] . ' fill_active upper_title">
				<nav class="clearfix">
					<ul class="tabs-navi">';
            for ($i = 1; $i <= $fields; $i++) {
                $selected = '';
                if ($i == 1) {
                    $selected = 'selected';
                }
                $out .= '<li><a class="' . $selected . '" data-content="' . $id . $i . '" href="#"><i class="' . $icon[$i] . '"></i>' . $title[$i] . '</a></li>';
            }
            $out .= ' </ul></nav><ul class="tabs-body">';
            for ($i = 1; $i <= $fields; $i++) {
                $selected = '';
                $title[$i] = preg_replace("/__/", ',', $title[$i]);
                $heading[$i] = preg_replace("/__/", ',', $heading[$i]);
                $text[$i] = preg_replace("/__/", ',', $text[$i]);
                if ($i == '1') {
                    $selected = 'selected';
                }

                $out .= '<li class="' . $selected . '" data-content="' . $id . $i . '">
					<h4>' . $heading[$i] . '</h4>
					<p>' . $text[$i] . '</p>
				</li>';
            }
            $out .= '</ul></div>';
            return $out;
            break;
        case 2:
            $out .= '<div class="hm-tabs tabs1 ver_tabs upper_title">
				<nav>
					<ul class="tabs-navi">';
            for ($i = 1; $i <= $fields; $i++) {
                $selected = '';
                if ($i == 1) {
                    $selected = 'selected';
                }
                $out .= '<li><a data-content="' . $id . $i . '" class="' . $selected . '" href="#"><span><i class="' . $icon[$i] . '"></i></span>' . $title[$i] . '</a></li>';
            }
            $out .= ' </ul></nav><ul class="tabs-body">';
            for ($i = 1; $i <= $fields; $i++) {
                $selected = '';
                $title[$i] = preg_replace("/__/", ',', $title[$i]);
                $heading[$i] = preg_replace("/__/", ',', $heading[$i]);
                $text[$i] = preg_replace("/__/", ',', $text[$i]);
                if ($i == '1') {
                    $selected = 'selected';
                }

                $out .= '<li class="' . $selected . '" data-content="' . $id . $i . '">
					<h4>' . $heading[$i] . '</h4>
					<p>' . $text[$i] . '</p>
				</li>';
            }
            $out .= '</ul></div>';
            return $out;
            break;
    }
}

add_shortcode('tabs', 'kyma_tabs_shortcode');
/******* Thumbnail shortcode **********/
function kyma_thumbnail_shortcode($atts, $content = null)
{
    $atts = shortcode_atts(array(
        'style' => '',
    ), $atts);
    global $post_id;
    $style = $atts['style'];
    $url = wp_get_attachment_url(get_post_thumbnail_id($post_id));
    $out = '<a href="' . $url . '" class="magnific-popup img_popup">' .
        get_the_post_thumbnail($post_id, $style) . '
			<span>
				<i class="ico-maximize"></i>
			</span>
		</a>';
    return $out;
}

add_shortcode('thumbnail', 'kyma_thumbnail_shortcode');
/* View Demo/Purchse now button */
function kyma_purchsenow_button_shortcode($atts, $content = null)
{
    global $post;
    $out = '<div>
			<a class="btn_a color2 medium_btn bottom_space" target="_self" href="' . get_post_meta($post->ID, 'purchase_button_link', true) . '">
		<span>
			<i class="in_left ico-cart"></i>
			<span>' . get_post_meta($post->ID, 'purchase_button_text', true) . '</span>
			<i class="in_right ico-open"></i>
		</span>
	</a>
	<a class="btn_a color3 medium_btn bottom_space" target="_self" href="' . get_post_meta($post->ID, 'view_demo_link', true) . '">
		<span>
			<i class="in_left ico-open"></i>
			<span>Live Preview</span>
			<i class="in_right ico-open"></i>
		</span>
	</a>
</div>';
    return $out;
}

add_shortcode('purchasenowbutton', 'kyma_purchsenow_button_shortcode');
/*----------- tooltip code-----------*/
function kyma_tooltip_shortcode($atts, $content = null)
{
    $atts = shortcode_atts(array(
        'tooltip_text' => __('tool tip Text', 'kyma'),
        'tooltip_title' => __('tool tip Title', 'kyma'),
        'tooltip_readmore_link' => '',
        'tooltip_readmore_text' => __('Read More', 'kyma'),
        'tooltip_over_text' => __('tooltip', 'kyma'),
        'tooltip_style' => 1,
        'tooltip_effect' => 1,
    ), $atts);
    $tooltip_text = $atts['tooltip_text'];
    $tooltip_title = $atts['tooltip_title'];
    $tooltip_readmore_link = $atts['tooltip_readmore_link'];
    $tooltip_readmore_text = $atts['tooltip_readmore_text'];
    $tooltip_over_text = $atts['tooltip_over_text'];
    $tooltip_style = $atts['tooltip_style'];
    $tooltip_effect = $atts['tooltip_effect'];

    $out = '';
    switch ($tooltip_style) {
        case 1:
            $out .= '<span class="hm_tooltip1 tooltip-effect1-' . $tooltip_effect . '">
                            <span class="hm_tooltip-item1">' . $tooltip_over_text . '</span>
                            <span class="hm_tooltip-content1 clearfix">
                                <span class="hm_tooltip-text1">
                                    <strong>' . $tooltip_title . ' </strong>' . $tooltip_text;
            if ($tooltip_readmore_link != '') {
                $out .= '	<a href="' . esc_url($tooltip_readmore_link) . '">' . esc_attr($tooltip_readmore_text) . '</a>';
            }
            $out .= '</span>
                            </span>
                        </span>';
            return $out;
            break;
        case 2:
            $out .= '<span class="hm_tooltip2 tooltip-' . $tooltip_effect . '">
                <span class="tooltip-item2">' . $tooltip_over_text . '</span>
                <span class="tooltip-content2"><strong>' . $tooltip_title . '</strong>
                    ' . $tooltip_text;
            if ($tooltip_readmore_link != '') {
                $out .= '	<a href="' . esc_url($tooltip_readmore_link) . '">' . esc_attr($tooltip_readmore_text) . '</a>';
            }
            $out .= '</span>
            </span>';
            return $out;
            break;
        case 3:
            $out .= '<span class="hm_tooltip3" href="#">
                        ' . esc_attr($tooltip_over_text) . '
                        <span class="tooltip-content3">' . esc_attr($tooltip_text) . '</span>
                    </span>';
            return $out;
    }
}

add_shortcode('tooltip', 'kyma_tooltip_shortcode');
/*--------------------------------------*/
/*	Banner
/*--------------------------------------*/
function kyma_banner_shortcode($atts, $content = null)
{
    $atts = shortcode_atts(array(
            'banner_width' => 'full',
            'banner_color' => '_colored',
            'banner_centered' => '',
            'banner_title' => '',
            'banner_text' => '',
            'button_text' => '',
            'button_url' => '',
            'button_icon' => '',

        ), $atts
    );
    $banner_widht = $atts['banner_color'] != "classic_white" ? $atts['banner_width'] : "";
    $banner_color = $atts['banner_color'];
    $banner_centered = $atts['banner_centered'];

    $banner_title = preg_replace("/__/", ',', $atts['banner_title']);
    $banner_text = preg_replace("/__/", ',', $atts['banner_text']);

    $button_text = $atts['button_text'];
    $button_url = $atts['button_url'];
    $button_icon = $atts['button_icon'];

    $out = '<div class="welcome_banner ' . $banner_widht . $banner_color . ' ' . $banner_centered . '">
		    <div class="content clearfix">';
    if ($banner_title != "") {
        $out .= '<h3>' . $banner_title . '</h3>';
    }
    if ($banner_centered != "") {
        if ($banner_text != "") {
            $out .= '<span class="intro_text">' . $banner_text . '</span>';
        }
        if ($button_text != "" && $banner_color != '_banner_colored') {
            $out .= '<a href="' . esc_url($button_url) . '" target="_self" class="btn_a btn_space">
			    <span><i class="in_left ' . $button_icon . '"></i><span>' . $button_text . '</span><i class="in_right ' . $button_icon . '"></i></span>
			</a>';
        }
        if ($banner_color == '_banner_colored') {
            $out .= '<span class="rotate_icon"><i class="' . $button_icon . '"></i></span>';
        }
    } else {
        if ($button_text != "" && $banner_color != '_banner_colored') {
            $out .= '<a href="' . esc_url($button_url) . '" target="_self" class="btn_a f_right">
			    <span><i class="in_left ' . $button_icon . '"></i><span>' . $button_text . '</span><i class="in_right ' . $button_icon . '"></i></span>
			</a>';
        }
        if ($banner_text != "") {
            $out .= '<span class="intro_text">' . $banner_text . '</span>';
        }
        if ($banner_color == '_banner_colored') {
            $out .= '<span class="rotate_icon"><i class="' . $button_icon . '"></i></span>';
        }
    }
    $out .= '</div>
		</div>';

    return $out;
}

add_shortcode('banner', 'kyma_banner_shortcode');
/* Feature Shortcode */
function kyma_feature_shortcode($atts, $content = null)
{
    $atts = shortcode_atts(array(
            'fields' => '1',
            'feature_heading' => __('Theme Features', 'kyma'),
            'feature_title' => __('hello', 'kyma'),
            'feature_text' => __('sdsd', 'kyma'),
            'feature_icon' => 'fa fa-desktop',
            'feature_style' => 1,
            'echo' => false,
        ), $atts
    );
    extract($atts);
    $title = explode(',', $feature_title);
    $icon = explode(',', $feature_icon);
    $text = explode(',', $feature_text);
    $out = '';
    switch ($feature_style) {
        case 1:
            $out .= '<div class="icon_boxes_con style2 upper_title">';
            for ($i = 1; $i <= $fields; $i++) {
                $title[$i] = preg_replace("/__/", ',', $title[$i]);
                $text[$i] = preg_replace("/__/", ',', $text[$i]);
                $out .= '<div class="service_box">
                        <span class="icon circle"><i class="' . $icon[$i] . '"></i></span>
                          <div class="service_box_con">
                              <h3>' . $title[$i] . '</h3>
                              <span class="desc">' . $text[$i] . '</span>
                          </div>
                      </div>';
            }
            $out .= '</div>';
            break;
        case 2:
            $out .= '<div class="icon_boxes_con style1 circle upper_title just_icon_border solid_icon clearfix">';
            for ($i = 1; $i <= $fields; $i++) {
                $title[$i] = preg_replace("/__/", ',', $title[$i]);
                $text[$i] = preg_replace("/__/", ',', $text[$i]);
                $out .= '<div class="col-md-4">
                <div class="service_box">
                	<span class="icon circle"><i class="' . $icon[$i] . '"></i></span>
                  <div class="service_box_con centered">
                      <h3>' . $title[$i] . '</h3>
                      <span class="desc">' . $text[$i] . '</span>
                  </div>
                </div>
              </div>';
            }
            $out .= '</div>';
    }
    return $out;
}
add_shortcode('feature', 'kyma_feature_shortcode');
function kyma_portfolio_shortcode($atts, $content = null){
    extract(shortcode_atts(
        array(
            'port_cat' =>'',
            'hide_filter'=>1,
            'port_col' => 'four',
            'width' => 'boxed',
            'echo' => false,
        ), $atts
    )); 
     $imageCrop = $width=='full' ? 'portfolio_'.$port_col.'_image_full' : 'portfolio_'.$port_col.'_image';
    // Filter Content
    $out = '';
	$out .= '<div class="hm_filter_wrapper ' . esc_attr($port_col) . '_blocks ' . esc_attr($width) . '_portos has_sapce_portos project_text_nav nav_with_nums upper_title upper_title">';
        $Terms = array_search('all', explode(', ', $port_cat)) ? '' : explode(', ', $port_cat) ;
        $terms = get_terms('portfolio_taxonomy', array('orderby'=>'name', 'order'=>'asc', 'hide_empty'=>true,'slug'=>$Terms));
        if (!empty($terms) && $hide_filter=='0' && !is_wp_error($terms)) {
            $out .= '<div id="options" class="sort_options clearfix">
            <ul data-option-key="filter" class="option-set clearfix" id="filter-by">';
                foreach ($terms as $term) {
                    $out .= '<li><a data-option-value="' . '.' . $term->slug . '" class=""
                           href="#"><span>' . Ucfirst($term->name) . '</span><span
                                class="num"></span></a>
                    </li>';
                }
            $out .= '</ul>
            <div class="sort_list">
                <a href="#" class="sort_selecter">
                    <span class="text">' . __('Sort By', 'kyma') . '</span>
                    <span class="arrow"><i class="fa fa-sort"></i></span>
                </a>
                <ul data-option-key="sortBy" class="option-set clearfix" id="sort-by">
                    <!-- <li><a data-option-value="original-order" class="selected" href="#"><span class="text">original order</span></a></li> -->
                    <li><a data-option-value="name" href="#" class=""><span
                                class="text">' . __('name', 'kyma') . '</span></a></li>
                    <li><a data-option-value="number" href="#" class=""><span
                                class="text">' . __('date', 'kyma') . '</span></a></li>
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
            </div>';
			}
        $out .= '<div class="hm_filter_wrapper_con">';
            $all_posts = wp_count_posts('kyma_portfolio')->publish;
            $args = array(
                'post_type' =>'kyma_portfolio',
                'posts_per_page' => $all_posts,
                'tax_query' => array(
                    array(
                        'taxonomy' => 'portfolio_taxonomy',
                        'field' => 'slug', //can be set to ID
                        'terms' => explode(', ', $port_cat) //if field is ID you can reference by cat/term number
                    ))
            );
            $kyma_portfolio = new WP_Query($args);
            if ($kyma_portfolio->have_posts()) {
                while ($kyma_portfolio->have_posts()) : $kyma_portfolio->the_post();
                    $term_list = wp_get_post_terms(get_the_ID(), 'portfolio_taxonomy', array("fields" => "slugs"));
                    $terms = implode(" ", $term_list);
                    $out .= '<div class="filter_item_block ' . esc_attr($terms) . '">
                        <div class="porto_block">
                            <div class="porto_type">'; if (metadata_exists('post', get_the_ID(), '_kyma_portfolio_gallery')) {
                                    $product_image_gallery = get_post_meta(get_the_ID(), '_kyma_portfolio_gallery', true);
                                } else {
                                    // Backwards compat
                                    $attachment_ids = get_posts('post_parent=' . get_the_ID() . '&numberposts=-1&post_type=attachment&orderby=menu_order&order=ASC&post_mime_type=image&fields=ids');
                                    $attachment_ids = array_diff($attachment_ids, array(get_post_thumbnail_id()));
                                    $product_image_gallery = implode(',', $attachment_ids);
                                }
                                $attachments = array_filter(explode(',', $product_image_gallery));
                                if ($attachments) {
                                    $out .= '<div class="porto_galla">';
                                    foreach ($attachments as $attachment_id) {
                                        $large_image_url = wp_get_attachment_image_src($attachment_id, 'large');
                                        $port_img_src = wp_get_attachment_image_src($attachment_id, $imageCrop);
                                        $out .= '<a data-rel="' . get_the_title() . '" href="' . esc_url($large_image_url[0]) . '"><img class="img-responsive" src="' . $port_img_src[0] . '"/></a>';
                                    }
                                    $large_image_url = wp_get_attachment_image_src(get_post_thumbnail_id(get_the_ID()), 'large');
                                    $thumb_url = wp_get_attachment_image_src(get_post_thumbnail_id(get_the_ID()), $imageCrop);
                                    $out .= '<a data-rel="' . get_the_title() . '"
                                       href="' . esc_url($large_image_url[0]) . '">
                                        <img class="img-responsive" src="' . esc_url($thumb_url[0]) . '" alt="' . get_the_title() . '">
                                    </a>
                                    </div>';
                                } else {
                                    $large_image_url = wp_get_attachment_image_src(get_post_thumbnail_id(get_the_ID()), 'large');
                                    $thumb_url = wp_get_attachment_image_src(get_post_thumbnail_id(get_the_ID()), $imageCrop);
                                   $out .= '<a data-rel="magnific-popup"
                                       href="' . esc_url($large_image_url[0]) . '">
                                        <img class="img-responsive" src="' . esc_url($thumb_url[0]) . '" alt="' . get_the_title() .'">
                                    </a>';
                                }
								if (get_post_meta(get_the_ID(), 'portfolio_link', true) != "") {
                                        $permalink = esc_url(get_post_meta(get_the_ID(), 'portfolio_link', true));
                                    } else {
                                        $permalink = get_the_permalink();
                                    } 
                                $out .= '<div class="porto_nav">
                                    <a href="' . esc_url($large_image_url[0]) . '"
                                       class="expand_img">' . __('View Larger', 'kyma') . '</a>
                                    <a href="' . $permalink. '"
                                       class="detail_link">' . __('More Details', 'kyma') . '</a>
                                </div>
                            </div>
                            <div class="porto_desc">
                                <h6 class="name">' . get_the_title() . '</h6>
                                <span class="porto_date"><span
                                        class="number">' . get_post_time('Ymd', true). '</span>' . get_post_time(get_option('date_format'), true) . '</span>
                            </div>
                        </div>
                    </div><!-- Item -->';
                endwhile;
            } wp_reset_postdata();
        $out .= '</div>
    </div>';
	return $out;
}
add_shortcode('portfolio', 'kyma_portfolio_shortcode');

/* Testimonial */
function kyma_testimonial_shortcode($atts, $content = null)
{
    $atts = shortcode_atts(array(
            'testimonial_heading' => __('What Our Client Says', 'kyma'),
            'testimonial_style' => 1,
            'echo' => true,
        ), $atts
    );
    extract($atts);
    $out = '';
	switch ($testimonial_style) {
	case 1:
        $out .= '<div class="content row_spacer clearfix">';
            if ($testimonial_heading != "") {
                $out .= '<div class="main_title centered upper">
                <h2 id="testimonial_heading"><span
                        class="line"></span>' . esc_attr($testimonial_heading) . '</h2>
                </div>';
            }
            $out .= '<div class="normal_text_slider client_say_slider">';
                $all_posts = wp_count_posts('kyma_testimonial')->publish;
                $args = array(
                    'post_type' => 'kyma_testimonial',
                    'posts_per_page' => $all_posts,
                );
                $kyma_testimonial = new WP_Query($args);
                if ($kyma_testimonial->have_posts()) {
				$test_url ='';
                    while ($kyma_testimonial->have_posts()) : $kyma_testimonial->the_post();
						if (get_post_meta(get_the_ID(), 'client_site_url', true) != "") {
                              $test_url = esc_url(get_post_meta(get_the_ID(), 'client_site_url', true));
						}
                        $out .= '<div class="c_say">
                        <div class="centered">
                            <span class="client_img">
                                <span>
                                    <a href="' . esc_url($test_url) . '">';
									$class = array("class" => "img-responsive");
                                       $out .= get_the_post_thumbnail(get_the_ID(),'testimonial_circle_thumb', $class) . '</a>
                                </span>
                            </span>
                        </div>
                        <span class="client_details">
                            <span class="name">' . get_the_title() . '</span>';
                            if (get_post_meta(get_the_ID(), 'client_designation', true) != "") {
                                $out .= '/ <span
                                    class="url">' . esc_attr(get_post_meta(get_the_ID(), 'client_designation', true)) .'</span>';
                            }
                        $out .= '</span>
                        <span class="desc">' . get_the_content() . '</span>
                        </div>';
                    endwhile;
                }
            $out .= '</div>
        </div>';
        break;
    case 2:
        $out .= '<div class="content row_spacer clearfix">';
			if ($testimonial_heading!= "") {
                $out .= '<div class="main_title centered upper">
                <h2><span class="line"><i class="ico-comments-o"></i></span>' . esc_attr($testimonial_heading) .
                '</h2>
                </div>';
            }
            $out .= '<div class="content_slider">';
                $all_posts = wp_count_posts('kyma_testimonial')->publish;
                $args = array(
                    'post_type' => 'kyma_testimonial',
                    'posts_per_page' => $all_posts,
                );
                $kyma_testimonial = new WP_Query($args);
                if ($kyma_testimonial->have_posts()) {
                $out .= '<div class="content_slide clearfix">';
                    $i = 0;
                    $pages = ceil($all_posts / 2);
                    while ($kyma_testimonial->have_posts()) :
                    $kyma_testimonial->the_post();
                    $out .= '<div class="col-md-6">
                        <div class="what_say_block">
                            <span class="say_img"><a
                                    href="' . esc_url(get_post_meta(get_the_ID(), 'client_site_url', true)) . '">';
									if (has_post_thumbnail()) {
                                        $class = array('class' => 'img-responsive');
                                        $out .= get_the_post_thumbnail(get_the_ID(),'testimonial_square_thumb', $class);
                                    } $out .= '</a></span>
                            <div class="say_datils">
                                <h5>' . get_the_title() .
                                    '/<span>' . esc_attr(get_post_meta(get_the_ID(), 'client_designation', true)) . '</span>
                                </h5>' . get_the_content() . '</div>
                        </div>
                    </div>';
                    $i++;
                    if ($i % 2 == 0) {
                $out .= '</div>';
                if ($i < ($pages * 2)){
                $out .= '<div class="content_slide clearfix">';
                    }
                    }
                    endwhile;
                    }
                $out .= '</div>
                <!-- End Content Slider -->
            </div>';
		}
		return $out;
}
add_shortcode('testimonial', 'kyma_testimonial_shortcode');
?>