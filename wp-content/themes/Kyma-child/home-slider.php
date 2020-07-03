<?php
$kyma_theme_options = kyma_theme_options();
$all_posts = wp_count_posts('kyma_slider')->publish;
$args = array('post_type' => 'kyma_slider', 'posts_per_page' => $all_posts);
$slider = new WP_Query($args);
if($kyma_theme_options['home_slider_enabled']){
switch ($kyma_theme_options['slider_type']) {
    case 1:
        ?>
        <div class="bannercontainer">
            <div class="banner">
                <ul><?php
                    if ($slider->have_posts()) {
                        while ($slider->have_posts()): $slider->the_post();
                            $url = wp_get_attachment_url(get_post_thumbnail_id(get_the_ID()));?>
                            <!-- THE BOXSLIDE EFFECT EXAMPLES  WITH LINK ON THE MAIN SLIDE EXAMPLE -->
                        <li data-transition="<?php echo esc_attr(get_post_meta(get_the_ID(), 'slide_effect', true)); ?>"
                            data-slotamount="7"
                            data-masterspeed="1000" data-saveperformance="on"
                            data-title="<?php the_title(); ?>">
                            <!-- MAIN IMAGE -->
                            <?php
                            if (has_post_thumbnail()):?>
                                <!-- MAIN IMAGE -->
                                <img class="img-responsive" src="<?php echo esc_url($url); ?>"
                                     alt="<?php echo get_the_title(); ?>"
                                     data-bgposition="<?php echo get_post_meta(get_the_ID(), 'bg_pos_start', true); ?>"
                                     data-ease="<?php echo get_post_meta(get_the_ID(), 'easing_effect', true); ?>"
                                     data-bgfit="100" data-bgfitend="150"
                                     data-bgpositionend="<?php echo get_post_meta(get_the_ID(), 'bg_pos_end', true); ?>"
                                     data-kenburns="<?php echo esc_attr($kyma_theme_options['ken_burn_effect']); ?>"
                                     data-duration="<?php echo esc_attr($kyma_theme_options['ken_burn_duration']); ?>">
                            <?php endif; ?>
                            <!-- LAYER NR. 1 -->
                            <div class="tp-caption rev_title_d rev_color2 lfb customout rs-parallaxlevel-2 rev_title_f"
                                 data-x="center"
                                 data-y="120"
                                 data-customout="x:0;y:-100;z:0;rotationX:0;rotationY:0;rotationZ:0;scaleX:0.75;scaleY:0.75;skewX:0;skewY:0;opacity:0;transformPerspective:600;transformOrigin:50% 50%;"
                                 data-endspeed="400"
                                 data-endeasing="Power4.easeIn"
                                 data-speed="800"
                                 data-start="500"
                                 data-easing="easeOutQuad"
                                 data-elementdelay="0.1"
                                 data-endelementdelay="0.1">
                                <?php the_title(); ?>
                            </div>
                            <!-- LAYER NR. 2 -->
                            <div
                                class="tp-caption oswald_font rev_title_e upper rev_color2 lfb customout tp-resizeme rs-parallaxlevel-2"
                                id="slider-2-title"
                                data-x="center"
                                data-y="170"
                                data-customout="x:0;y:-100;z:0;rotationX:0;rotationY:0;rotationZ:0;scaleX:0.75;scaleY:0.75;skewX:0;skewY:0;opacity:0;transformPerspective:600;transformOrigin:50% 50%;"
                                data-endspeed="700"
                                data-endeasing="Power4.easeIn"
                                data-speed="800"
                                data-start="800"
                                data-easing="easeOutQuad"
                                data-splitin="none"
                                data-splitout="none"
                                data-elementdelay="0.1"
                                data-endelementdelay="0.1"
                                style="z-index: 7; max-width: auto; max-height: auto; white-space: nowrap;">
                                <?php
                                $subtitle_count = explode(' ', get_post_meta(get_the_ID(), 'slider_subtitle', true));
                                if (isset($subtitle_count[1])) {
                                    $subtitle = preg_split("/\s+/", get_post_meta(get_the_ID(), 'slider_subtitle', true));
                                    // Replace the first word.
                                    $subtitle[0] = "<span class=\"rev_color4 bold\">" . $subtitle[0] . "</span>";
                                    $subtitle[1] = "<span class=\"bold\">" . $subtitle[1] . "</span>";
                                    // Re-create the string.
                                    $subtitle = join(" ", $subtitle);
                                    echo stripslashes($subtitle);
                                } else {
                                    echo "<span class=\"rev_color4 bold\">" . esc_attr(get_post_meta(get_the_ID(), 'slider_subtitle', true)) . "</span>";
                                }
                                ?>
                            </div>
                            <!-- LAYER NR. 3 -->
                            <div
                                class="tp-caption oswald_font rev_title_e upper rev_color2 lfb customout tp-resizeme rs-parallaxlevel-2"
                                id="slider-3-title"
                                data-x="center"
                                data-y="250"
                                data-customout="x:0;y:-200;z:0;rotationX:0;rotationY:0;rotationZ:0;scaleX:0.75;scaleY:0.75;skewX:0;skewY:0;opacity:0;transformPerspective:600;transformOrigin:50% 50%;"
                                data-endspeed="1000"
                                data-endeasing="Power4.easeIn"
                                data-speed="800"
                                data-start="1100"
                                data-easing="easeOutQuad"
                                data-splitin="none"
                                data-splitout="none"
                                data-elementdelay="0.1"
                                data-endelementdelay="0.1"
                                style="z-index: 7; max-width: auto; max-height: auto; white-space: nowrap;">
                                <?php echo esc_attr(get_post_meta(get_the_ID(), 'slider_description', true)); ?>
                            </div>
                            <?php if (get_post_meta(get_the_ID(), 'slider_button_text', true) != "") { ?>
                                <div
                                    class="tp-caption oswald_font rev_title_d upper rev_color2 lfb customout tp-resizeme rs-parallaxlevel-2"
                                    data-x="center"
                                    data-y="340"
                                    data-customout="x:0;y:-200;z:0;rotationX:0;rotationY:0;rotationZ:0;scaleX:0.75;scaleY:0.75;skewX:0;skewY:0;opacity:0;transformPerspective:600;transformOrigin:50% 50%;"
                                    data-speed="800"
                                    data-start="1400"
                                    data-easing="easeOutQuad"
                                    data-endeasing="Power4.easeIn"
                                    data-endspeed="1300"
                                    data-splitin="none"
                                    data-splitout="none"
                                    data-elementdelay="0.1"
                                    data-endelementdelay="0.1"
                                    style="z-index: 11;max-width: auto; max-height: auto; white-space: nowrap;">
                                <a class="main_button large_btn bottom_space"
                                   href="<?php echo esc_url(get_post_meta(get_the_ID(), 'slider_button_link', true)); ?>" <?php if (get_post_meta(get_the_ID(), 'slider_button_target', true)) {
                                    echo "target='_blank'";
                                } ?> ><i
                                        class="in_left <?php echo esc_attr(get_post_meta(get_the_ID(), 'slider_btn_icon', true)); ?>"></i><?php echo esc_attr(get_post_meta(get_the_ID(), 'slider_button_text', true)); ?>
                                </a>
                                </div><?php
                            } ?>
                            </li><?php
                        endwhile;
                    } else {
                        $j = 0;
                        for ($i = 1; $i <= 3; $i++) {
                            $slide_title = array('Responsive Theme', 'Retina Ready Theme', 'Multipurpose Theme');
                            ?>
                            <li data-transition="random"
                                data-slotamount="7"
                                data-masterspeed="1000" data-saveperformance="on"
                                data-title="Slide Title">
                                <!-- MAIN IMAGE -->
                                <img
                                    src="<?php echo get_template_directory_uri(); ?>/images/sliders/slide<?php echo $i; ?>.jpg"
                                    alt="kenburns1" data-bgposition="top right" data-kenburns="on" data-duration="14000"
                                    data-ease="Linear.easeNone" data-bgfit="100" data-bgfitend="150"
                                    data-bgpositionend="bottom left">
                                <!-- LAYER NR. 1 -->
                                <div
                                    class="tp-caption rev_title_d rev_color2 lfb customout rs-parallaxlevel-2 rev_title_f"
                                    data-x="center"
                                    data-y="120"
                                    data-customout="x:0;y:-100;z:0;rotationX:0;rotationY:0;rotationZ:0;scaleX:0.75;scaleY:0.75;skewX:0;skewY:0;opacity:0;transformPerspective:600;transformOrigin:50% 50%;"
                                    data-endspeed="400"
                                    data-endeasing="Power4.easeIn"
                                    data-speed="800"
                                    data-start="500"
                                    data-easing="easeOutQuad"
                                    data-elementdelay="0.1"
                                    data-endelementdelay="0.1">
                                    <?php echo $slide_title[$j]; ?>
                                </div>
                                <!-- LAYER NR. 2 -->
                                <div
                                    class="tp-caption oswald_font rev_title_e upper rev_color2 lfb customout tp-resizeme rs-parallaxlevel-2"
                                    id="slider-2-title"
                                    data-x="center"
                                    data-y="170"
                                    data-customout="x:0;y:-100;z:0;rotationX:0;rotationY:0;rotationZ:0;scaleX:0.75;scaleY:0.75;skewX:0;skewY:0;opacity:0;transformPerspective:600;transformOrigin:50% 50%;"
                                    data-endspeed="700"
                                    data-endeasing="Power4.easeIn"
                                    data-speed="800"
                                    data-start="800"
                                    data-easing="easeOutQuad"
                                    data-splitin="none"
                                    data-splitout="none"
                                    data-elementdelay="0.1"
                                    data-endelementdelay="0.1"
                                    style="z-index: 7; max-width: auto; max-height: auto; white-space: nowrap;">
                                    <span class="rev_color4 bol"><?php _e('Kyma', 'kyma'); ?></span><span
                                        class="bold"> <?php _e('is Everything', 'kyma'); ?> </span><?php _e('You Need', 'kyma'); ?>
                                </div>
                                <!-- LAYER NR. 3 -->
                                <div
                                    class="tp-caption oswald_font rev_title_e upper rev_color2 lfb customout tp-resizeme rs-parallaxlevel-2"
                                    id="slider-3-title"
                                    data-x="center"
                                    data-y="250"
                                    data-customout="x:0;y:-200;z:0;rotationX:0;rotationY:0;rotationZ:0;scaleX:0.75;scaleY:0.75;skewX:0;skewY:0;opacity:0;transformPerspective:600;transformOrigin:50% 50%;"
                                    data-endspeed="1000"
                                    data-endeasing="Power4.easeIn"
                                    data-speed="800"
                                    data-start="1100"
                                    data-easing="easeOutQuad"
                                    data-splitin="none"
                                    data-splitout="none"
                                    data-elementdelay="0.1"
                                    data-endelementdelay="0.1"
                                    style="z-index: 7; max-width: auto; max-height: auto; white-space: nowrap;">
                                    <?php _e('Lorem Ipsum is simply dummy text', 'kyma'); ?>
                                </div>
                                <div
                                    class="tp-caption oswald_font rev_title_d upper rev_color2 lfb customout tp-resizeme rs-parallaxlevel-2"
                                    data-x="center"
                                    data-y="340"
                                    data-customout="x:0;y:-200;z:0;rotationX:0;rotationY:0;rotationZ:0;scaleX:0.75;scaleY:0.75;skewX:0;skewY:0;opacity:0;transformPerspective:600;transformOrigin:50% 50%;"
                                    data-speed="800"
                                    data-start="1400"
                                    data-easing="easeOutQuad"
                                    data-endeasing="Power4.easeIn"
                                    data-endspeed="1300"
                                    data-splitin="none"
                                    data-splitout="none"
                                    data-elementdelay="0.1"
                                    data-endelementdelay="0.1"
                                    style="z-index: 11;max-width: auto; max-height: auto; white-space: nowrap;">
                                    <a class="main_button large_btn bottom_space color2" href="#"><i
                                            class="in_left ico-cart"></i><?php _e('Purchase Now', 'kyma'); ?>
                                    </a>
                                </div>
                            </li>
                            <?php $j++;
                        }
                    }
                    ?>
                </ul>
            </div>
        </div>
        <?php
        break;
    case 2:
        ?>
        <!-- Slider Revolution -->
        <div class="tp-banner-container">
        <div class="tp-banner-panzoom-fullwidth">
            <ul><?php
                if ($slider->have_posts()) {
                    while ($slider->have_posts()): $slider->the_post();
                        $url = wp_get_attachment_url(get_post_thumbnail_id(get_the_ID()));?>
                    <li data-transition="<?php echo esc_attr(get_post_meta(get_the_ID(), 'slide_effect', true)); ?>"
                        data-slotamount="1" data-masterspeed="1500" data-thumb="<?php echo esc_url($url); ?>"
                        data-delay="13000" data-saveperformance="off" data-title="<?php echo get_the_title(); ?>">
                        <!-- MAIN IMAGE -->
                        <img class="img-responsive" src="<?php echo esc_url($url); ?>"
                             alt="<?php echo get_the_title(); ?>"
                             data-bgposition="<?php echo get_post_meta(get_the_ID(), 'bg_pos_start', true); ?>"
                             data-ease="<?php echo get_post_meta(get_the_ID(), 'easing_effect', true); ?>"
                             data-bgfit="100" data-bgfitend="150"
                             data-bgpositionend="<?php echo get_post_meta(get_the_ID(), 'bg_pos_end', true); ?>"
                             data-kenburns="<?php echo esc_attr($kyma_theme_options['ken_burn_effect']); ?>"
                             data-duration="<?php echo esc_attr($kyma_theme_options['ken_burn_duration']); ?>">
                        <!-- LAYERS -->
                        <div
                            class="tp-caption oswald_font reddishbg_heavy_80 sfb fadeout tp-resizeme rs-parallaxlevel-2 .rev_title_f"
                            data-x="15" data-hoffset="0"
                            data-y="center" data-voffset="-110"
                            data-speed="1000"
                            data-start="1400"
                            data-easing="Power4.easeInOut"
                            data-splitin="none"
                            data-splitout="none"
                            data-elementdelay="0.05"
                            data-endelementdelay="0.1"
                            data-endspeed="1000"
                            data-endeasing="Power1.easeOut"
                            style="z-index: 4; max-width: auto; max-height: auto; white-space: nowrap;">
                            <?php the_title(); ?>
                        </div>

                        <!-- LAYER NR. 1 -->
                        <div
                            class="tp-caption oswald_font upper reddishbg_heavy_70 lfr fadeout tp-resizeme rs-parallaxlevel-2"
                            id="slider-2-title1"
                            data-x="15" data-hoffset="0"
                            data-y="center" data-voffset="-40"
                            data-speed="1000"
                            data-start="800"
                            data-easing="Power4.easeInOut"
                            data-splitin="none"
                            data-splitout="none"
                            data-elementdelay="0.05"
                            data-endelementdelay="0.1"
                            data-endspeed="1000"
                            data-endeasing="Power1.easeOut"
                            style="z-index: 2; max-width: auto; max-height: auto; white-space: nowrap;">
                            <?php echo esc_attr(get_post_meta(get_the_ID(), 'slider_subtitle', true)); ?>
                        </div>

                        <!-- LAYER NR. 2 -->
                        <div
                            class="tp-caption oswald_font upper reddishbg_heavy_30 lfr fadeout tp-resizeme rs-parallaxlevel-2"
                            id="slider-3-title1"
                            data-x="15" data-hoffset="0"
                            data-y="center" data-voffset="20"
                            data-speed="1000"
                            data-start="1000"
                            data-easing="Power4.easeInOut"
                            data-splitin="none"
                            data-splitout="none"
                            data-elementdelay="0.05"
                            data-endelementdelay="0.1"
                            data-endspeed="1000"
                            data-endeasing="Power1.easeOut"
                            style="z-index: 2; max-width: auto; max-height: auto; white-space: nowrap;">
                            <?php echo esc_attr(get_post_meta(get_the_ID(), 'slider_description', true)); ?>
                        </div>
                        <!-- LAYER NR. 3 -->
                        <?php if (get_post_meta(get_the_ID(), 'slider_button_text', true) != "") { ?>
                            <div
                                class="tp-caption oswald_font rev_title_d upper rev_color2 lfr fadeout tp-resizeme rs-parallaxlevel-2"
                                data-x="15" data-hoffset="0"
                                data-y="center" data-voffset="105"
                                data-speed="1000"
                                data-start="1200"
                                data-easing="Power4.easeInOut"
                                data-splitin="none"
                                data-splitout="none"
                                data-elementdelay="0.05"
                                data-endelementdelay="0.1"
                                data-endspeed="1000"
                                data-endeasing="Power1.easeOut"
                                style="z-index: 11;max-width: auto; max-height: auto; white-space: nowrap;">
                            <a class="main_button large_btn bottom_space "
                               href="<?php echo esc_url(get_post_meta(get_the_ID(), 'slider_button_link', true)); ?>" <?php if (get_post_meta(get_the_ID(), 'slider_button_target', true)) {
                                echo "target='_blank'";
                            } ?> ><i
                                    class="in_left <?php echo esc_attr(get_post_meta(get_the_ID(), 'slider_btn_icon', true)); ?>"></i><?php echo esc_attr(get_post_meta(get_the_ID(), 'slider_button_text', true)); ?>
                            </a>
                            </div><?php
                        } ?>

                        </li><?php
                    endwhile;
                } else {
                    for ($i = 1; $i <= 3; $i++) {
                        ?>
                        <li data-transition="fade" data-slotamount="1" data-masterspeed="1500"
                            data-thumb="<?php echo get_template_directory_uri(); ?>/images/sliders/slide<?php echo $i; ?>.jpg"
                            data-delay="13000" data-saveperformance="off" data-title="Slide Title">
                            <!-- MAIN IMAGE -->
                            <img
                                src="<?php echo get_template_directory_uri(); ?>/images/sliders/slide<?php echo $i; ?>.jpg"
                                alt="kenburns1" data-bgposition="top right" data-kenburns="on" data-duration="14000"
                                data-ease="Linear.easeNone" data-bgfit="100" data-bgfitend="150"
                                data-bgpositionend="bottom left">
                            <!-- LAYERS -->
                            <div
                                class="tp-caption oswald_font ren_num_a sfb fadeout tp-resizeme rs-parallaxlevel-2 rev_title_f"
                                data-x="15" data-hoffset="0"
                                data-y="center" data-voffset="-150"
                                data-speed="1000"
                                data-start="1400"
                                data-easing="Power4.easeInOut"
                                data-splitin="none"
                                data-splitout="none"
                                data-elementdelay="0.05"
                                data-endelementdelay="0.1"
                                data-endspeed="1000"
                                data-endeasing="Power1.easeOut"
                                style="z-index: 4; max-width: auto; max-height: auto; white-space: nowrap;">
                                <?php _e('Responsive Theme', 'kyma'); ?>
                            </div>
                            <!-- LAYER NR. 1 -->
                            <div
                                class="tp-caption oswald_font upper reddishbg_heavy_80 lfr fadeout tp-resizeme rs-parallaxlevel-2"
                                id="slider-2-title1"
                                data-x="15" data-hoffset="0"
                                data-y="center" data-voffset="-55"
                                data-speed="1000"
                                data-start="800"
                                data-easing="Power4.easeInOut"
                                data-splitin="none"
                                data-splitout="none"
                                data-elementdelay="0.05"
                                data-endelementdelay="0.1"
                                data-endspeed="1000"
                                data-endeasing="Power1.easeOut"
                                style="z-index: 2; max-width: auto; max-height: auto; white-space: nowrap;">
                                <?php _e('Kyma', 'kyma'); ?>
                            </div>
                            <!-- LAYER NR. 2 -->
                            <div
                                class="tp-caption oswald_font upper reddishbg_heavy_70 lfr fadeout tp-resizeme rs-parallaxlevel-2"
                                id="slider-3-title1"
                                data-x="15" data-hoffset="0"
                                data-y="center" data-voffset="30"
                                data-speed="1000"
                                data-start="1000"
                                data-easing="Power4.easeInOut"
                                data-splitin="none"
                                data-splitout="none"
                                data-elementdelay="0.05"
                                data-endelementdelay="0.1"
                                data-endspeed="1000"
                                data-endeasing="Power1.easeOut"
                                style="z-index: 2; max-width: auto; max-height: auto; white-space: nowrap;">
                                <?php _e('Fully Responsive', 'kyma'); ?>
                            </div>
                            <!-- LAYER NR. 3 -->
                            <div class="tp-caption reddishbg_heavy_30 italic lfr fadeout tp-resizeme rs-parallaxlevel-2"
                                 data-x="15" data-hoffset="0"
                                 data-y="center" data-voffset="105"
                                 data-speed="1000"
                                 data-start="1200"
                                 data-easing="Power4.easeInOut"
                                 data-splitin="none"
                                 data-splitout="none"
                                 data-elementdelay="0.05"
                                 data-endelementdelay="0.1"
                                 data-endspeed="1000"
                                 data-endeasing="Power1.easeOut"
                                 style="z-index: 2; max-width: auto; max-height: auto; white-space: nowrap;">
                                <?php _e('Full Responsive Multipurpose Theme', 'kyma'); ?>
                            </div>
                        </li>
                    <?php
                    }
                } ?>
            </ul>
        </div>
        </div><?php
        break;
    case 3:
        ?>
        <div id="enar_owl_slider" class="owl-carousel"><?php
            if ($slider->have_posts()) {
                while ($slider->have_posts()): $slider->the_post();
                    ?>
                    <div class="item">
                    <?php
                    if (has_post_thumbnail()):
                        $url = wp_get_attachment_image_src(get_post_thumbnail_id(get_the_ID()), 'home_slider_image');
                        $url_mobile = wp_get_attachment_image_src(get_post_thumbnail_id(get_the_ID()), 'home_slider_image_mobile');?>
                        <img class="img-responsive" src="<?php echo esc_url($url[0]); ?>"/>
                        <img class="img-responsive-mobile" src="<?php echo esc_url($url_mobile[0]); ?>"/><?php
                    endif;?>
                    <div class="owl_slider_con">
                        <?php
                        if(get_the_title()):?>
                            <span class="owl_text_a">
                            <span>
                                <span><?php the_title(); ?></span>
                            </span>
                        </span>
                        <?php
                        endif?>
                        <span
                            class="owl_text_b"><span><?php echo esc_attr(get_post_meta(get_the_ID(), 'slider_subtitle', true)); ?></span></span>
                        <span
                            class="owl_text_c"><span><?php echo esc_attr(get_post_meta(get_the_ID(), 'slider_description', true)); ?></span></span>
            <?php if(get_post_meta(get_the_ID(), 'slider_button_text', true)!=""){?>
            <span class="owl_text_d">
				<a href="<?php echo esc_url(get_post_meta(get_the_ID(), 'slider_button_link', true)); ?>" class="btn_a"><span><i class="in_left <?php echo esc_attr(get_post_meta(get_the_ID(), 'slider_btn_icon', true)); ?>"></i><span><?php echo esc_attr(get_post_meta(get_the_ID(), 'slider_button_text', true)); ?></span><i
                            class="in_right <?php echo esc_attr(get_post_meta(get_the_ID(), 'slider_btn_icon', true)); ?>"></i></span></a>
			</span><?php
            } ?>
                    </div>
                    </div><?php
                endwhile;
            } else {
                for ($i = 1; $i <= 3; $i++) {
                    ?>
                    <!-- OWL Slider -->
                    <div class="item">
                        <img src="<?php echo get_template_directory_uri(); ?>/images/sliders/slide<?php echo $i; ?>.jpg"
                             alt="Slide Title">

                        <div class="owl_slider_con">
			<span class="owl_text_a">
			    <span>
					<span><?php _e('Kyma Theme IS The Best', 'kyma'); ?></span>
				<a href="#"><span><i class="ico-angle-right"></i></span></a>
			    </span>
			</span>
                            <span
                                class="owl_text_b"><span><?php _e('Fully Responsive Design', 'kyma'); ?></span></span>
                            <span
                                class="owl_text_c"><span><?php _e('Lorem Ipsum is simply dummy text of the printing and industry', 'kyma'); ?></span></span>
			<span class="owl_text_d">
				<a href="#" target="_self" class="btn_a">
                    <span><i class="in_left ico-cart"></i><span><?php _e('Purchase Now', 'kyma'); ?></span><i
                            class="in_right ico-cart"></i></span>
                </a>
			</span>
                        </div>
                    </div>
                <?php
                }
            } ?>
        </div>
    <?php
} } ?>