<!DOCTYPE html>
<!--[if lt IE 7]>
<html class="no-js ie6 oldie" lang="en"> <![endif]-->
<!--[if IE 7]>
<html class="no-js ie7 oldie" lang="en"> <![endif]-->
<!--[if IE 8]>
<html class="no-js ie8 oldie" lang="en"> <![endif]-->
<!--[if IE 9]>
<html class="no-js ie9 oldie" lang="en"> <![endif]-->
<html class="no-js" dir="ltr" lang="en-US">
<head>
    <meta charset="utf-8">
    <!-- Set the viewport width to device width for mobile -->
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <title><?php bloginfo('name');
        $site_description = get_bloginfo('description'); ?></title>
    <?php $kyma_theme_options = kyma_theme_options();
    if (isset($kyma_theme_options['upload_custom_favicon']['url'])) {
        ?>
        <link rel="shortcut icon" href="<?php echo $kyma_theme_options['upload_custom_favicon']['url']; ?>">
    <?php
    } elseif ($kyma_theme_options['upload_custom_favicon'] != "") {
        ?>
        <link rel="shortcut icon" href="<?php echo $kyma_theme_options['upload_custom_favicon']; ?>">
    <?php } ?>

    <!-- ============ Google fonts ============ -->
    <link href='http://fonts.googleapis.com/css?family=EB+Garamond' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Open+Sans:400,600,700,300,800' rel='stylesheet' type='text/css'>

    <!-- ============ Add custom CSS here ============ -->
    <link href="<?php echo get_template_directory_uri() . '/css/bootstrap.css'; ?>" rel="stylesheet" type="text/css">
    <link href="<?php echo get_template_directory_uri() . '/css/font-awesome.css'; ?>" rel="stylesheet" type="text/css">
    <link href="<?php echo get_template_directory_uri() . '/css/coming-soon.css'; ?>" rel="stylesheet" type="text/css">

</head>
<body>

<!-- *** START HEADER *** -->
<header id="header">

    <div class="container">
        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12 text-center">

                <!-- LOGO -->
                <div class="logo" <?php if ($kyma_theme_options['logo_layout'] == "right") {
                    echo 'style="float:right;"';
                } ?>>
                    <a href="<?php echo esc_url(home_url('/')); ?>"
                       title="<?php echo esc_attr(get_bloginfo('name', 'display')); ?>" rel="home">
                        <?php
                        if (isset($kyma_theme_options['upload_image_logo']) && is_array($kyma_theme_options['upload_image_logo']) && $kyma_theme_options['upload_image_logo']['url'] != "") {
                            ?>
                            <img id="logoimg"
                                 src="<?php echo esc_url($kyma_theme_options['upload_image_logo']['url']); ?>"
                                 alt="<?php echo esc_attr(get_bloginfo('name', 'display')); ?>"
                                 style="height:<?php echo intval($kyma_theme_options['logo_height']) ?>px !important;"/>
                        <?php } else if (isset($kyma_theme_options['upload_image_logo']) && !is_array($kyma_theme_options['upload_image_logo']) && $kyma_theme_options['upload_image_logo'] != "") { ?>
                            <img id="logoimg"
                                 src="<?php echo esc_url($kyma_theme_options['upload_image_logo']); ?>"
                                 alt="<?php echo esc_attr(get_bloginfo('name', 'display')); ?>"
                                 style="height:<?php echo intval($kyma_theme_options['logo_height']) ?>px !important;" /><?php
                        } else {
                            ?>
                            <h3 <?php if ($kyma_theme_options['logo_text_width']) {
                                echo 'style="font-size:' . $kyma_theme_options['logo_text_width'] . 'px;color:#' . get_header_textcolor() . '"';
                            } ?> ><?php echo get_bloginfo('name'); ?></h3>
                        <?php } ?>
                    </a>
                </div>

            </div>
        </div>
    </div>

    <div id="center-page">
        <span id="date" style="display:none"><?php echo $kyma_theme_options['maintenance_time']; ?></span>

        <div class="col-lg-6 col-md-6 col-sm-6 col-md-offset-3 col-sm-offset-3 text-center">
            <!-- START INTRO -->
            <div class="intro">
                <h1><?php $title = explode(' ', $kyma_theme_options['maintenance_mode_title']);
                    if (isset($title[1])) {
                        $title = preg_split("/\s+/", $kyma_theme_options['maintenance_mode_title']);
                        $title[0] = "<span>" . $title[0] . "</span>";
                        $title[1] = $title[1];
                        $title = join(" ", $title);
                        echo stripslashes($title);
                    } else {
                        echo "<span>" . esc_attr(get_post_meta(get_the_ID(), 'slider_subtitle', true)) . "</span>";
                    }?></h1>

                <p><?php echo esc_attr($kyma_theme_options['maintenance_desc']); ?></p>
            </div>
            <!-- END INTRO -->

            <!-- START COUNTDOWN -->
            <div class="countdown">
                <div class="row">

                    <div id="countdown">

                        <div id="countdown_dashboard">

                            <!-- DAYS -->
                            <div class="col-md-3 col-sm-3 col-xs-3 dash-glob">
                                <div class="dash days_dash">
                                    <div class="digit">0</div>
                                    <div class="digit">0</div>
                                    <div class="digit">0</div>
                                    <span class="dash_title"><?php _e('Days', 'kyma'); ?></span>
                                </div>
                            </div>

                            <!-- HOURS -->
                            <div class="col-md-3 col-sm-3 col-xs-3 dash-glob">
                                <div class="dash hours_dash">
                                    <div class="digit">0</div>
                                    <div class="digit">0</div>
                                    <span class="dash_title"><?php _e('Hours', 'kyma'); ?></span>
                                </div>
                            </div>

                            <!-- MINUTES -->
                            <div class="col-md-3 col-sm-3 col-xs-3 dash-glob">
                                <div class="dash minutes_dash">
                                    <div class="digit">0</div>
                                    <div class="digit">0</div>
                                    <span class="dash_title"><?php _e('Minutes', 'kyma'); ?></span>
                                </div>
                            </div>

                            <!-- SECONDS -->
                            <div class="col-md-3 col-sm-3 col-xs-3 dash-glob">
                                <div class="dash seconds_dash">
                                    <div class="digit">0</div>
                                    <div class="digit">0</div>
                                    <span class="dash_title"><?php _e('Seconds', 'kyma'); ?></span>
                                </div>
                            </div>

                        </div>

                    </div>
                </div>
            </div>
            <!-- END COUNTDOWN -->

            <!-- START Subscription form
            <div class="col-md-10 col-sm-12  col-md-offset-1 text-center">
                <form id="signupForm" class="subscription" role="form" >
                    <div class="form-group-absolute-default">
                        <input type="email" class="form-control" placeholder="Email Address" required>
                        <button class="btn btn-primary right" type="button">Subscribe</button>
                    </div>
                </form>
            </div>-->
            <!-- END Subscription form  -->
        </div>

    </div>

    <!-- START COPYRIGHT SECTION -->
    <div id="copyright-header">
        <div class="container">

            <!-- *** START SOCIAL *** -->
            <div id="social">
                <ul class="list">
                    <!-- TWITTER -->
                    <?php if ($kyma_theme_options['social_facebook_link'] != '') { ?>
                        <li>
                        <a href="<?php echo esc_url($kyma_theme_options['social_facebook_link']); ?>" target="_blank">
                            <i class="fa fa-facebook"></i>
                        </a>
                        </li><?php
                    }
                    if ($kyma_theme_options['social_twitter_link'] != '') {
                        ?>
                        <li>
                        <a href="<?php echo esc_url($kyma_theme_options['social_twitter_link']); ?>" target="_blank">
                            <i class="fa fa-twitter"></i>
                        </a></li><?php
                    }
                    if ($kyma_theme_options['social_google_plus_link'] != '') {
                        ?>
                        <li>
                        <a href="<?php echo esc_url($kyma_theme_options['social_google_plus_link']); ?>"
                           target="_blank">
                            <i class="fa fa-google-plus"></i>
                        </a>
                        </li><?php
                    }
                    if ($kyma_theme_options['social_skype_link'] != '') {
                        ?>
                        <li>
                        <a href="skype:<?php echo esc_attr($kyma_theme_options['social_skype_link']); ?>">
                            <i class="fa fa-skype"></i>
                        </a>
                        </li><?php
                    }
                    if ($kyma_theme_options['social_vimeo_link'] != '') {
                        ?>
                        <li>
                        <a href="<?php echo esc_url($kyma_theme_options['social_vimeo_link']); ?>" target="_blank">
                            <i class="fa fa-vimeo-square"></i>
                        </a></li><?php
                    }
                    if ($kyma_theme_options['social_picasa_link'] != '') {
                        ?>
                        <li>
                        <a href="<?php echo esc_url($kyma_theme_options['social_picasa_link']); ?>" target="_blank">
                            <i class="ico ico-picassa"></i>
                        </a></li><?php
                    } ?>

                </ul>
            </div>
            <!-- *** END SOCIAL *** -->
            <?php if ($kyma_theme_options['copyright_text_footer']) { ?>
                <p><?php echo esc_attr($kyma_theme_options['footer_copyright'] . ' ' . $kyma_theme_options['developed_by_text']); ?>
                <a href="<?php echo esc_url($kyma_theme_options['developed_by_link']); ?>"><?php echo esc_attr($kyma_theme_options['developed_by_link_text']); ?></a>
                </p><?php
            }?>

        </div>
    </div>
    <!-- END COPYRIGHT SECTION -->

</header>
<!-- *** END HEADER *** -->

<!-- ////////////////\\\\\\\\\\\\\\\\ -->
<!-- ********** Javascript ********** -->
<!-- \\\\\\\\\\\\\\\\//////////////// -->

<script src="<?php echo get_template_directory_uri() . '/js/jquery.js'; ?>"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/modernizr-2.6.2.min.js"></script>

<!-- *** Countdown *** -->
<script type="text/javascript"
        src="<?php echo get_template_directory_uri() . '/js/coming-soon/jquery.lwtCountdown-1.0.js'; ?>"></script>

<!-- *** File used to start some plugins *** -->
<script type="text/javascript" src="<?php echo get_template_directory_uri() . '/js/coming-soon/time.js'; ?>"></script>

<!-- *** Dynamically-resized, slideshow-capable background image to any page or element *** -->
<script type="text/javascript"
        src="<?php echo get_template_directory_uri() . '/js/coming-soon/jquery.backstretch.js'; ?>"></script>

<script>
    'use strict';

    /* ========================== */
    /* ::::::: Backstrech ::::::: */
    /* ========================== */
    // You may also attach Backstretch to a block-level element
    $.backstretch(
        [
            '<?php echo $kyma_theme_options['maintenance_bg_1']['url'];?>',
            '<?php echo $kyma_theme_options['maintenance_bg_2']['url'];?>',
            '<?php echo $kyma_theme_options['maintenance_bg_3']['url'];?>',
        ],

        {
            duration: 4500,
            fade: 1500
        }
    );
</script>

</body>
</html>