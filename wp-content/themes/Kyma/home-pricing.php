<?php $kyma_theme_options = kyma_theme_options();
$all_posts = wp_count_posts('kyma_pricing_plan')->publish;
$args = array('post_type' => 'kyma_pricing_plan', 'posts_per_page' => $all_posts);
$plan = new WP_Query($args);
switch ($kyma_theme_options['plan_style']) {
    case 1:
        $bg_color = $kyma_theme_options['plan_bg_color'] != "" ? 'white_section ' . $kyma_theme_options['feature_bg_color'] : 'bg_gray';?>
    <section class="content_section <?php echo esc_attr($bg_color); ?>">
        <div class="content row_spacer">
            <?php if ($kyma_theme_options['home_plan_heading']) { ?>
                <div class="main_title centered upper">
                <h2><span class="line"><i class="ico-wallet-travel"></i></span><span
                        class="main_title_c1"><?php echo esc_attr($kyma_theme_options['home_plan_heading']); ?></span>
                </h2>
                </div><?php
            } ?>
            <svg id="polygon_svg" xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="0px" height="0px"
                 viewBox="0 0 60 69.474" enable-background="new 0 0 60 69.474" xml:space="preserve">
				<defs>
                    <g id="hex">
                        <path d="M60.083,47.104c0,2.75-1.948,6.125-4.33,7.5L34.33,66.974c-2.382,1.375-6.279,1.375-8.66,0L4.247,54.604
									     c-2.382-1.375-4.33-4.75-4.33-7.5V22.369c0-2.75,1.948-6.125,4.33-7.5L25.67,2.5c2.381-1.375,6.278-1.375,8.659,0l21.422,12.369
									      c2.382,1.375,4.33,4.75,4.33,7.5L60.083,47.104z"></path>
                    </g>
                </defs>
			</svg>
            <div class="rows_container clearfix"><?php
                $col = $all_posts > 0 ? 12 / $all_posts : 4;
                if ($plan->have_posts()) {
                    while ($plan->have_posts()): $plan->the_post(); ?>
                        <div class="col-md-<?php echo $col; ?>">
                            <div
                                class="plan_col plan_column1 <?php echo get_post_meta(get_the_ID(), 'kyma_active_plan', true) != "" ? get_post_meta(get_the_ID(), 'kyma_active_plan', true) : ''; ?>">
                                <h6>
							<span class="plan_price_block">
								<span class="plan_price_in">
									<span
                                        class="price"><?php echo esc_attr(get_post_meta(get_the_ID(), 'kyma_plan_price', true)); ?></span>
                                    <?php if (get_post_meta(get_the_ID(), 'kyma_plan_period', true)) { ?>
                                        <span
                                            class="plan_per"><?php echo esc_attr(get_post_meta(get_the_ID(), 'kyma_plan_currency', true)) . '/' . esc_attr(get_post_meta(get_the_ID(), 'kyma_plan_period', true)); ?></span>
                                    <?php } ?>
								</span>
							</span>
							<span class="polygon_con">
								<svg viewBox="0 0 70 70" xml:space="preserve" enable-background="" height="100px"
                                     width="100px" y="0px" x="0px" xmlns="http://www.w3.org/2000/svg">
  <use y="0px" x="5px" xlink:href="#hex" class="polygon_fill" stroke-width="1"/>
</svg>
							</span>
                                    <span class="plan_price_name"><?php the_title(); ?></span>
                                </h6>
                                <ul><?php $features = unserialize(get_post_meta(get_the_ID(), 'kyma_pricing_plan_feature', true));
                                    $plan_feature_avail = unserialize(get_post_meta(get_the_ID(), 'kyma_pricing_feature_avail', true));
                                    foreach ($features as $key => $feature) {
                                        $ico = isset($plan_feature_avail[$key]) ? 'check_icon ico-check3' : 'wrong_icon ico-cross2';?>
                                        <li>
                                            <i class="<?php echo $ico; ?>"></i><span><?php echo esc_attr($feature); ?></span>
                                        </li>
                                    <?php } ?>
                                </ul>
                                <a class="plan_price_btn"
                                   href="<?php echo esc_url(get_post_meta(get_the_ID(), 'kyma_plan_btn_link', true)); ?>"><i
                                        class="ico-cart"></i><?php echo esc_attr(get_post_meta(get_the_ID(), 'kyma_plan_btn_text', true)); ?>
                                </a>
                            </div>
                        </div><!-- Grid -->
                    <?php
                    endwhile;
                } else {
                    ?>
                    <div class="col-md-4">
                        <div class="plan_col plan_column1 ">
                            <h6>
							<span class="plan_price_block">
								<span class="plan_price_in">
									<span class="price"><?php _e('234', 'kyma'); ?></span>
									<span class="plan_per"><?php _e('$/mo', 'kyma'); ?></span>
								</span>
							</span>
							<span class="polygon_con">
								<svg viewBox="0 0 70 70" xml:space="preserve" enable-background="" height="100px"
                                     width="100px" y="0px" x="0px" xmlns="http://www.w3.org/2000/svg">
  <use y="0px" x="5px" xlink:href="#hex" class="polygon_fill" stroke-width="1"/>
</svg>
							</span>
                                <span class="plan_price_name"><?php _e('Standard', 'kyma'); ?></span>
                            </h6>
                            <ul>
                                <li>
                                    <i class="check_icon ico-check3"></i><span><?php _e('Free setup', 'kyma'); ?></span>
                                </li>
                                <li>
                                    <i class="wrong_icon ico-cross2"></i><span><?php _e('50 Websites', 'kyma'); ?></span>
                                </li>
                                <li>
                                    <i class="check_icon ico-check3"></i><span><?php _e('55GBStorage', 'kyma'); ?></span>
                                </li>
                                <li>
                                    <i class="check_icon ico-check3"></i><span><?php _e('50GB Bandwidth', 'kyma'); ?></span>
                                </li>
                                <li>
                                    <i class="wrong_icon ico-cross2"></i><span><?php _e('9 months Support', 'kyma'); ?></span>
                                </li>
                                <li>
                                    <i class="check_icon ico-check3"></i><span><?php _e('Unlimited Subdomains', 'kyma'); ?></span>
                                </li>
                            </ul>
                            <a class="plan_price_btn" href="#"><i
                                    class="ico-cart"></i><?php _e('Order Now', 'kyma'); ?></a>
                        </div>
                    </div><!-- Grid -->
                    <div class="col-md-4">
                        <div class="plan_col plan_column1 active_plan">
                            <h6>
							<span class="plan_price_block">
								<span class="plan_price_in">
									<span class="price"><?php _e('1234', 'kyma'); ?></span>
									<span class="plan_per"><?php _e('$/mo', 'kyma'); ?></span>
								</span>
							</span>
							<span class="polygon_con">
								<svg viewBox="0 0 70 70" xml:space="preserve" enable-background="" height="100px"
                                     width="100px" y="0px" x="0px" xmlns="http://www.w3.org/2000/svg">
  <use y="0px" x="5px" xlink:href="#hex" class="polygon_fill" stroke-width="1"/>
</svg>
							</span>
                                <span class="plan_price_name"><?php _e('Professional', 'kyma'); ?></span>
                            </h6>
                            <ul>
                                <li>
                                    <i class="check_icon ico-check3"></i><span><?php _e('Free setup', 'kyma'); ?></span>
                                </li>
                                <li>
                                    <i class="wrong_icon ico-cross2"></i><span><?php _e('50 Websites', 'kyma'); ?></span>
                                </li>
                                <li>
                                    <i class="check_icon ico-check3"></i><span><?php _e('55GB Storage', 'kyma'); ?></span>
                                </li>
                                <li>
                                    <i class="check_icon ico-check3"></i><span><?php _e('50GB Bandwidth', 'kyma'); ?></span>
                                </li>
                                <li>
                                    <i class="wrong_icon ico-cross2"></i><span><?php _e('9 months Support', 'kyma'); ?></span>
                                </li>
                                <li>
                                    <i class="check_icon ico-check3"></i><span><?php _e('Unlimited Subdomains', 'kyma'); ?></span>
                                </li>
                            </ul>
                            <a class="plan_price_btn" href="#"><i
                                    class="ico-cart"></i><?php _e('Order Now', 'kyma'); ?></a>
                        </div>
                    </div><!-- Grid -->
                    <div class="col-md-4">
                        <div class="plan_col plan_column1">
                            <h6>
							<span class="plan_price_block">
								<span class="plan_price_in">
									<span class="price"><?php _e('234', 'kyma'); ?></span>
									<span class="plan_per"><?php _e('$/mo', 'kyma'); ?></span>
								</span>
							</span>
							<span class="polygon_con">
								<svg viewBox="0 0 70 70" xml:space="preserve" enable-background="" height="100px"
                                     width="100px" y="0px" x="0px" xmlns="http://www.w3.org/2000/svg">
  <use y="0px" x="5px" xlink:href="#hex" class="polygon_fill" stroke-width="1"/>
</svg>
							</span>
                                <span class="plan_price_name"><?php _e('Standard', 'kyma'); ?></span>
                            </h6>
                            <ul>
                                <li>
                                    <i class="check_icon ico-check3"></i><span><?php _e('Free setup', 'kyma'); ?></span>
                                </li>
                                <li>
                                    <i class="wrong_icon ico-cross2"></i><span><?php _e('50 Websites', 'kyma'); ?></span>
                                </li>
                                <li>
                                    <i class="check_icon ico-check3"></i><span><?php _e('55GB Storage', 'kyma'); ?></span>
                                </li>
                                <li>
                                    <i class="check_icon ico-check3"></i><span><?php _e('50GB Bandwidth', 'kyma'); ?></span>
                                </li>
                                <li>
                                    <i class="wrong_icon ico-cross2"></i><span><?php _e('9 months Support', 'kyma'); ?></span>
                                </li>
                                <li>
                                    <i class="check_icon ico-check3"></i><span><?php _e('Unlimited Subdomains', 'kyma'); ?></span>
                                </li>
                            </ul>
                            <a class="plan_price_btn" href="#"><i
                                    class="ico-cart"></i><?php _e('Order Now', 'kyma'); ?></a>
                        </div>
                    </div><!-- Grid -->
                <?php
                } ?>
            </div>
        </div>
        </section><?php
        break;
    case 2:
        ?>
        <section class="content_section">
            <div
                class="hm-pricing-container hm-<?php echo esc_attr($kyma_theme_options['plan_width']); ?>-width hm-<?php echo esc_attr($kyma_theme_options['plan_style_effect']); ?>-theme">
                <ul class="hm-pricing-list"><?php
                    if ($plan->have_posts()) {
                        while ($plan->have_posts()): $plan->the_post(); ?>
                        <li class="<?php echo get_post_meta(get_the_ID(), 'kyma_active_plan', true) != "" ? 'hm-popular' : ''; ?>">
                            <header class="hm-pricing-header">
                                <h2><?php the_title(); ?></h2>

                                <div class="hm-price">
                                    <span
                                        class="hm-currency"><?php echo esc_attr(get_post_meta(get_the_ID(), 'kyma_plan_currency', true)); ?></span>
                                    <span
                                        class="hm-value"><?php echo esc_attr(get_post_meta(get_the_ID(), 'kyma_plan_price', true)); ?></span><?php if (get_post_meta(get_the_ID(), 'kyma_plan_period', true)) { ?>
                                        <span
                                            class="hm-duration"><?php echo esc_attr(get_post_meta(get_the_ID(), 'kyma_plan_period', true)); ?></span>
                                    <?php } ?>
                                </div>
                            </header>
                            <!-- .hm-pricing-header -->

                            <div class="hm-pricing-body">
                                <ul class="hm-pricing-features"><?php $features = unserialize(get_post_meta(get_the_ID(), 'kyma_pricing_plan_feature', true));
                                    $plan_feature_avail = unserialize(get_post_meta(get_the_ID(), 'kyma_pricing_feature_avail', true));
                                    foreach ($features as $key => $feature) {
                                        $ico = isset($plan_feature_avail[$key]) ? 'check_icon ico-check3' : 'wrong_icon ico-cross2';?>
                                        <li>
                                            <?php echo esc_attr($feature); ?>
                                        </li>
                                    <?php } ?>
                                </ul>
                            </div>
                            <!-- .hm-pricing-body -->

                            <footer class="hm-pricing-footer">
                                <a class="hm-select"
                                   href="<?php echo esc_url(get_post_meta(get_the_ID(), 'kyma_plan_btn_link', true)); ?>"><?php echo esc_attr(get_post_meta(get_the_ID(), 'kyma_plan_btn_text', true)); ?>
                                </a>
                            </footer>
                            <!-- .hm-pricing-footer -->
                            </li><?php
                        endwhile;
                    } ?>
                </ul>
                <!-- .hm-pricing-list -->
            </div>
            <!-- .hm-pricing-container -->
        </section>
    <?php
} ?>