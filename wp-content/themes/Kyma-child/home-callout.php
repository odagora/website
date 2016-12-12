<?php $kyma_theme_options = kyma_theme_options();
switch ($kyma_theme_options['home_callout_type']) {
    case 1:
        ?>
        <section id='callout' class="content_section white_section bg_color3">
            <div class="welcome_banner full_colored">
                <div class="content clearfix">
                    <?php if ($kyma_theme_options['callout_title'] != "") { ?>
                        <h3 id='callout-title'><?php echo esc_attr($kyma_theme_options['callout_title']); ?></h3>
                    <?php } ?>
                    <div class="callout_btn_a">
                        <a href="<?php echo esc_url(home_url('/'));?>cotizaciones/" class="btn_a f_right">
                    <span><i class="in_left <?php echo esc_attr($kyma_theme_options['callout_btn_icon']); ?>"></i><span
                            id='callout-btn-text'><?php echo esc_attr($kyma_theme_options['callout_btn_text']); ?></span><i
                            class="in_right <?php echo esc_attr($kyma_theme_options['callout_btn_icon']); ?>"></i></span>
                        </a>
                    </div><?php if ($kyma_theme_options['callout_description'] != "") { ?>
                            <span
                                class="intro_text"><?php echo esc_attr($kyma_theme_options['callout_description']); ?></span><?php } ?>
                </div>
            </div>
        </section>
        <?php
        break;
    case 2:
        ?>
        <!-- Intro Banner -->
        <div class="welcome_banner full_gray" style="background: #324545;">
            <div class="content clearfix">
                <?php if ($kyma_theme_options['callout_description'] != "") { ?>
                    <h3><?php echo esc_attr($kyma_theme_options['callout_description']); ?></h3>
                <?php } ?>
                <a href="<?php echo esc_url($kyma_theme_options['callout_btn_link']); ?>" <?php if($kyma_theme_options['callout_button_target']){ ?>target="_blank"<?php } ?>
                   class="btn_a f_right">
                    <span><i
                            class="in_left <?php echo esc_attr($kyma_theme_options['callout_btn_icon']); ?>"></i><span><?php echo esc_attr($kyma_theme_options['callout_btn_text']); ?></span><i
                            class="in_right <?php echo esc_attr($kyma_theme_options['callout_btn_icon']); ?>"></i></span>
                </a>
            </div>
        </div>
        <!-- End Intro Banner -->
        <?php
        break;
    case 3:
        ?>
        <!-- Intro Banner -->
        <div class="welcome_banner full_banner_colored centered">
            <div class="content clearfix">
                <?php if ($kyma_theme_options['callout_title'] != "") { ?>
                    <h3><?php echo esc_attr($kyma_theme_options['callout_title']); ?></h3>
                <?php }
                if ($kyma_theme_options['callout_description'] != "") { ?>
                    <span class="intro_text"><?php echo esc_attr($kyma_theme_options['callout_description']); ?></span>
                <?php } ?>
                <!-- <span class="rotate_icon"><i class="ico-lightbulb"></i></span> -->
            </div>
        </div>
        <!-- End Intro Banner -->
    <?php
} ?>