<?php

/*--------------------------------------*/
/*	Banner
/*--------------------------------------*/
function kyma_custom_banner_shortcode($atts, $content = null)
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
            'banner_id' => 'track_link'

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
    $banner_id = $atts['banner_id'];

    $out = '<div class="welcome_banner white_section inner_page ' . $banner_widht . $banner_color . ' ' . $banner_centered . '">
		    <div class="content clearfix">';
    if ($banner_title != "") {
        $out .= '<h3>' . $banner_title . '</h3>';
    }
    if ($banner_centered != "") {
        if ($banner_text != "") {
            $out .= '<span class="intro_text">' . $banner_text . '</span>';
        }
        if ($button_text != "" && $banner_color != '_banner_colored') {
            $out .= '<a href="' . esc_url($button_url) . '" class="btn_a" id="'.$banner_id.'">
			    <span><i class="in_left ' . $button_icon . '"></i><span>' . $button_text . '</span><i class="in_right ' . $button_icon . '"></i></span>
			</a>';
        }
        if ($banner_color == '_banner_colored') {
            $out .= '<span class="rotate_icon"><i class="' . $button_icon . '"></i></span>';
        }
    } else {
        if ($button_text != "" && $banner_color != '_banner_colored') {
            $out .= '<a href="' . esc_url($button_url) . '" target="_self" class="btn_a f_right" id="'.$banner_id.'">
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

add_shortcode('bannercustom', 'kyma_custom_banner_shortcode');