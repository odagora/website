(function ($) {
    wp.customize('kyma_theme_options[upload_image_logo]', function (value) {
        value.bind(function (to) {
            $('img#logoimg').attr('src', to);
        });
    });
    wp.customize('kyma_theme_options[logo_height]', function (value) {
        value.bind(function (to) {
            $('img#logoimg').attr('height', to + 'px');
        });
    });
    wp.customize('kyma_theme_options[logo_width]', function (value) {
        value.bind(function (to) {
            $('img#logoimg').attr('width', to + 'px');
        });
    });
    wp.customize('kyma_theme_options[logo_text_width]', function (value) {
        value.bind(function (to) {
            $('#logo h3').css('font-size', to + 'px');
        });
    });
    wp.customize('kyma_theme_options[logo_spacing]', function (value) {
        value.bind(function (to) {
            $('#logo h3,#logo img').css('margin-top', to + 'px');
        });
    });
    wp.customize('kyma_theme_options[logo_layout]', function (value) {
        value.bind(function (to) {
            $('#logo').css('float', to);
        });
    });
    wp.customize('kyma_theme_options[topbarcolor]', function (value) {
        value.bind(function (to) {
            if (to != '') {
                $('.topbar').addClass(to);
            } else {
                $('.topbar').removeClass('topbar_colored');
            }
        });
    });
    wp.customize('kyma_theme_options[side_header]', function (value) {
        value.bind(function (to) {
            if (to) {
                $('body').addClass('header_on_side');
            } else {
                $('body').removeClass('header_on_side');
            }
        });
    });
    /* layout option */
    wp.customize('kyma_theme_options[headercolorscheme]', function (value) {
        value.bind(function (to) {
            if (to == 'light_header') {
                $('body').addClass(to);
                $('body').removeClass('transparent_header');
            } else if (to == 'transparent_header') {
                $('body').addClass(to);
                $('body').removeClass('light_header');
            } else if (to == '') {
                $('body').removeClass('light_header transparent_header');
            }
        });
    });
    wp.customize('kyma_theme_options[topbar]', function (value) {
        value.bind(function (to) {
            if (to) {
                $('.topbar').show();
            } else {
                $('.topbar').hide();
            }
        });
    });
    wp.customize('kyma_theme_options[show_cartcount]', function (value) {
        value.bind(function (to) {
            if (to) {
                $('#top_cart').show();
            } else {
                $('#top_cart').hide();
            }
        });
    });
    wp.customize('kyma_theme_options[topbar_layout]', function (value) {
        value.bind(function (to) {
            if (to) {
                $('.top_details').css('float', 'right');
                $('.top-socials').css('float', 'left');
            } else {
                $('.top_details').css('float', 'left');
                $('.top-socials').css('float', 'right');
            }
        });
    });
    wp.customize('kyma_theme_options[site_layout]', function (value) {
        value.bind(function (to) {
            if (to != '') {
                $('body').addClass(to);
            } else {
                $('body').removeClass('site_boxed');
            }
        });
    });
    wp.customize('kyma_theme_options[footer_layout]', function (value) {
        value.bind(function (to) {
            var col = 12 / parseInt(to);
            $('footer .container .rows_container').children().attr('class', 'col-md-' + col);
        });
    });

    /* Service Options */
    wp.customize('kyma_theme_options[home_service_heading]', function (value) {
        value.bind(function (to) {
            $('h2#service_heading').html('<span class="line"><i class="fa fa-folder-open-o"></i></span>' + to);
        });
    });
    wp.customize('kyma_theme_options[home_service_column]', function (value) {
        value.bind(function (to) {
            if (2 == to) {
                $('.service').removeClass('col-md-4');
                $('.service').removeClass('col-md-3');
                $('.service').addClass('col-md-6');
            } else if (3 == to) {
                $('.service').removeClass('col-md-6');
                $('.service').removeClass('col-md-3');
                $('.service').addClass('col-md-4');
            } else {
                $('.service').removeClass('col-md-4');
                $('.service').removeClass('col-md-6');
                $('.service').addClass('col-md-3');
            }
        });
    });
    /* Portfolio Options */
    wp.customize('kyma_theme_options[portfolio_filter]', function (value) {
        value.bind(function (to) {
            if (!to) {
                $('.hm_filter_wrapper #options').hide();
            } else {
                $('.hm_filter_wrapper #options').show();
            }
        });
    });
    wp.customize('kyma_theme_options[port_heading]', function (value) {
        value.bind(function (to) {
            $('#port_head').html('<span class="line"><i class="fa fa-folder-open-o"></i></span>' + to);
        });
    });


    wp.customize('kyma_theme_options[home_blog_title]', function (value) {
        value.bind(function (to) {
            $('h2#blog-heading').html('<span class="line"><i class="fa fa-edit"></i></span>' + to);
        });
    });
    /* HOme team */
    wp.customize('kyma_theme_options[home_team_heading]', function (value) {
        value.bind(function (to) {
            $('h2#home_team_heading').html('<span class="line"><i class="ico-user5"></i></span>' + to);
        });
    });
    /* Home eetestimonial */
    wp.customize('kyma_theme_options[testimonial_heading]', function (value) {
        value.bind(function (to) {
            $('h2#testimonial_heading').html('<span class="line"></span>' + to);
        });
    });
    /* Footer Callout */
    wp.customize('kyma_theme_options[callout_home]', function (value) {
        value.bind(function (to) {
            if (!to)
                $('#callout').hide();
            else
                $('#callout').show();
        });
    });
    wp.customize('kyma_theme_options[callout_title]', function (value) {
        value.bind(function (to) {
            $('h3#callout-title').html(to);
        });
    });
    wp.customize('kyma_theme_options[callout_description]', function (value) {
        value.bind(function (to) {
            $('.welcome_banner .intro_text').html(to);
        });
    });

    wp.customize('kyma_theme_options[callout_btn_link]', function (value) {
        value.bind(function (to) {
            $('a#call_out_link').attr('href', to);
        });
    });
    wp.customize('kyma_theme_options[callout_btn_text]', function (value) {
        value.bind(function (to) {
            $('#callout-btn-text').html(to);
        });
    });
    /* social options */
    wp.customize('kyma_theme_options[contact_info_header]', function (value) {
        value.bind(function (to) {
            if (to) {
                $('.top_details').show();
            } else {
                $('.top_details').hide();
            }
        });
    });
    wp.customize('kyma_theme_options[social_media_header]', function (value) {
        value.bind(function (to) {
            if (to) {
                $('.top-socials').show();
            } else {
                $('.top-socials').hide();
            }
        });
    });
    /* contact us page google map */
    wp.customize('kyma_theme_options[contact_google_map]', function (value) {
        value.bind(function (to) {
            if (to) {
                $('#google_map').show();
            } else {
                $('#google_map').hide();
            }
        });
    });
    wp.customize('kyma_theme_options[google_map_title]', function (value) {
        value.bind(function (to) {
            $('#google_map_title').html(to);
        });
    });
    wp.customize('kyma_theme_options[google_map_url]', function (value) {
        value.bind(function (to) {
            $('#google_map_url').attr('src', to);
        });
    });
    /* copyright info */
    wp.customize('kyma_theme_options[copyright_text_footer]', function (value) {
        value.bind(function (to) {
            if (to) {
                $('#copyright_text_footer').show();
            } else {
                $('#copyright_text_footer').hide();
            }
        });
    });
})(jQuery);