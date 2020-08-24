<?php function kyma_custom_css()
{
    global $kyma_theme_options;
    $css = "";
    if ($kyma_theme_options['footer_layout'] == 3) {
        $css = 'footer .container .row .col-md-3{  width:33.33333333%; }';
    } elseif ($kyma_theme_options['footer_layout'] == 2) {
        $css = 'footer .container .row .col-md-3{ width:50%;} ';
    }
    if ($kyma_theme_options['logo_layout'] == 'right') {
        $css .= '#logo{  float:right; } nav#main_nav{float:left}';
    }
    if ($kyma_theme_options['topbar_layout']) {
        $css .= '.top_details{float:right} .top-socials{float:left} ';
    }
    if(isset($kyma_theme_options['font_home_style']['color'])){
        $css.='.main_title span >span{border: 1px solid '.$kyma_theme_options['font_home_style']['color'].' !important} .main_title .line i{color:'.$kyma_theme_options['font_home_style']['color'].'}.main_title .line:before {background:'.$kyma_theme_options['font_home_style']['color'].' !important}';
    }
    echo '<style id="reduxCss type="text/css">' . $css . '</style>';
}

add_action('wp_head', 'kyma_custom_css');
