<?php $kyma_theme_options = kyma_theme_options();
$bg_color = $kyma_theme_options['funfact_bg_color'] == '' ? '' : 'white_section ' . $kyma_theme_options['funfact_bg_color'];
switch ($kyma_theme_options['home_fun_fact_style']) {
    case 1:
        ?>
        <section class="content_section <?php if (is_page_template('about_us_one.php')) {
            echo 'white_section';
        } else {
            echo $bg_color;
        } ?>">
            <?php if (!is_page_template('about_us_one.php')) { ?>
                <span class="section_icon"><i class="ico-tools"></i></span>
            <?php } ?>
            <div class="content row_spacer">
                <?php if (!is_page_template('about_us_one.php')) { ?>
                    <?php if ($kyma_theme_options['funfact_title'] != "") { ?>
                        <div class="main_title centered upper">
                            <h2><span class="line"></span><?php echo esc_attr($kyma_theme_options['funfact_title']); ?>
                            </h2>
                        </div>
                    <?php
                    }
                } ?>
                <div class="counter_a clearfix"><?php
                    if (is_array($kyma_theme_options['kyma_funfacts']) && $kyma_theme_options['kyma_funfacts'][0]['title'] != '' || $kyma_theme_options['kyma_funfacts'][0]['subtitle'] != '' || $kyma_theme_options['kyma_funfacts'][0]['icon'] != '') {
                        $i = 1;
                        foreach ($kyma_theme_options['kyma_funfacts'] as $funfact) {
                            ?>
                            <div class="col-md-3">
                            <div class="counter animated" data-animation="fadeInDown"
                                 data-animation-delay="<?php echo 300 * $i; ?>">
                                <span class="icon"><i class="<?php echo esc_attr($funfact['icon']); ?>"></i></span>
						<span class="value" data-speed="4000" data-from="0"
                              data-to="<?php echo esc_attr($funfact['subtitle']); ?>"><?php echo esc_attr($funfact['subtitle']); ?></span>
                                <span class="title"><?php echo esc_attr($funfact['title']); ?></span>
                            </div>
                            </div><?php $i++;
                        }
                    } else {
                        $fact_number = array(1500, 13, 94785, 358);
                        $fact_title = array('clients', 'Awards', 'Line Of Code', 'Projects');
                        $fact_icons = array('ico-profile-male', 'ico-trophy4', 'ico-map4', 'ico-toolbox');
                        $j = 0;
                        for ($i = 1; $i <= 4; $i++) {
                            ?>
                            <div class="col-md-3">
                                <div class="counter animated" data-animation="fadeInDown"
                                     data-animation-delay="<?php echo 300 * $i; ?>">
                                    <span class="icon"><i class="<?php echo $fact_icons[$j]; ?>"></i></span>
								<span class="value" data-speed="4000" data-from="0"
                                      data-to="<?php echo $fact_number[$j]; ?>"><?php echo $fact_number[$j]; ?></span>
                                    <span class="title"><?php echo $fact_title[$j]; ?></span>
                                </div>
                            </div>
                            <?php $j++;
                        }
                    } ?>
                </div>
            </div>
        </section>
        <!-- End Counter 1 -->
        <?php
        break;
    case 2:
        ?>
        <!-- Counter 2 -->
        <section class="content_section <?php if (is_page_template('about_us_one.php')) {
            echo 'white_section';
        } else {
            echo $bg_color;
        } ?>">
            <?php if (!is_page_template('about_us_one.php')) { ?>
                <span class="section_icon"><i class="ico-bargraph"></i></span>
            <?php } ?>
            <div class="content row_spacer">
                <div class="counter_b clearfix">
                    <?php
                    if (is_array($kyma_theme_options['kyma_funfacts']) && $kyma_theme_options['kyma_funfacts'][0]['title'] != '' || $kyma_theme_options['kyma_funfacts'][0]['subtitle'] != '' || $kyma_theme_options['kyma_funfacts'][0]['icon'] != '') {
                        $i = 1;
                        foreach ($kyma_theme_options['kyma_funfacts'] as $funfact) {
                            ?>
                            <div class="col-md-3">
                                <div class="counter animated" data-animation="fadeInDown"
                                     data-animation-delay="<?php echo 300 * $i; ?>">
                                    <span class="icon"><i class="<?php echo esc_attr($funfact['icon']); ?>"></i></span>
                                    <span class="value" data-speed="4000" data-from="0"
                                          data-to="<?php echo esc_attr($funfact['subtitle']); ?>"><?php echo esc_attr($funfact['subtitle']); ?></span>
                                    <span class="title"><?php echo esc_attr($funfact['title']); ?></span>
                                </div>
                            </div>
                            <?php $i++;
                        }
                    } else {
                        $fact_number = array(1500, 13, 94785, 358);
                        $fact_title = array('clients', 'Awards', 'Line Of Code', 'Projects');
                        $fact_icons = array('ico-profile-male', 'ico-trophy4', 'ico-map4', 'ico-toolbox');
                        $j = 0;
                        for ($i = 1; $i <= 4; $i++) {
                            ?>
                            <div class="col-md-3">
                                <div class="counter animated" data-animation="fadeInDown"
                                     data-animation-delay="<?php echo 300 * $i; ?>">
                                    <span class="icon"><i class="<?php echo $fact_icons[$j]; ?>"></i></span>
                                    <span class="value" data-speed="4000" data-from="0"
                                          data-to="<?php echo $fact_number[$j]; ?>"><?php echo $fact_number[$j]; ?></span>
                                    <span class="title"><?php echo $fact_title[$j]; ?></span>
                                </div>
                            </div>
                            <?php $j++;
                        }
                    } ?>
                </div>
            </div>
        </section>
        <!-- End Counter 2 -->
        <?php
        break;
    case 3:
        ?>
        <!-- Counter 1 -->
        <section class="content_section <?php if (is_page_template('about_us_one.php')) {
            echo "bg_gray";
        } ?>">
            <div class="content row_spacer">
                <?php if ($kyma_theme_options['funfact_title'] != "") { ?>
                    <div class="main_title centered upper">
                        <h2><span class="line"></span><?php echo esc_attr($kyma_theme_options['funfact_title']); ?></h2>
                    </div>
                <?php } ?>
                <div class="counter_a clearfix">
                    <?php
                    if (is_array($kyma_theme_options['kyma_funfacts']) && $kyma_theme_options['kyma_funfacts'][0]['title'] != '' || $kyma_theme_options['kyma_funfacts'][0]['subtitle'] != '' || $kyma_theme_options['kyma_funfacts'][0]['icon'] != '') {
                        $i = 1;
                        foreach ($kyma_theme_options['kyma_funfacts'] as $funfact) {
                            ?>
                            <div class="col-md-3">
                                <div class="counter animated" data-animation="fadeInDown"
                                     data-animation-delay="<?php echo 300 * $i; ?>">
                                    <span class="icon"><i class="<?php echo esc_attr($funfact['icon']); ?>"></i></span>
                                    <span class="value" data-speed="4000" data-from="0"
                                          data-to="<?php echo esc_attr($funfact['subtitle']); ?>"><?php echo esc_attr($funfact['subtitle']); ?></span>
                                    <span class="title"><?php echo esc_attr($funfact['title']); ?></span>
                                </div>
                            </div>
                            <?php $i++;
                        }
                    } else {
                        $fact_number = array(1500, 13, 94785, 358);
                        $fact_title = array('clients', 'Awards', 'Line Of Code', 'Projects');
                        $fact_icons = array('ico-profile-male', 'ico-trophy4', 'ico-map4', 'ico-toolbox');
                        $j = 0;
                        for ($i = 1; $i <= 4; $i++) {
                            ?>
                            <div class="col-md-3">
                                <div class="counter animated" data-animation="fadeInDown"
                                     data-animation-delay="<?php echo 300 * $i; ?>">
                                    <span class="icon"><i class="<?php echo $fact_icons[$j]; ?>"></i></span>
                                    <span class="value" data-speed="4000" data-from="0"
                                          data-to="<?php echo $fact_number[$j]; ?>"><?php echo $fact_number[$j]; ?></span>
                                    <span class="title"><?php echo $fact_title[$j]; ?></span>
                                </div>
                            </div>
                            <?php $j++;
                        }
                    } ?>
                </div>
            </div>
        </section>
        <!-- End Counter 1 -->
    <?php
} ?>