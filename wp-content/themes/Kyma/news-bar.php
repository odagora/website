<!-- News Bar -->
<section class="content_section hm_new_con">
    <div class="content clearfix">
        <div class="hm_new_title_con">
            <h4>
                <i class="ico-streetsign"></i>
                <span><span
                        class="latest_word"><?php _e('Latest', 'kyma'); ?> </span><?php _e('News', 'kyma'); ?></span>
            </h4>
        </div>
        <div class="hm_new_bar">
            <div class="hm_new_bar_slider"><?php
                $args = array('post_type' => 'post', 'posts_per_page' => -1);
                query_posts($args);
                if (query_posts($args)) {
                    while (have_posts()):the_post(); ?>
                        <div class="news_item">
                        <i class="ico-angle-right"></i>
                        <a href="<?php the_permalink(); ?>"><span><?php the_title(); ?></span></a>
                        </div><?php
                    endwhile;
                } ?>
            </div>
            <div class="hm_new_bar_controll">
                <a class="hm_new_bar_controll_btn play" href="#">
                    <i class="pause_news ico-pause2"></i>
                    <i class="play_news ico-playback-play"></i>
                </a>
            </div>
        </div>
    </div>
</section>
<?php wp_reset_query(); ?>
<!-- End News Bar -->