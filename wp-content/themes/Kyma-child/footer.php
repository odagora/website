<?php $kyma_theme_options = kyma_theme_options();
$col = 12 / (int)$kyma_theme_options['footer_layout'];
?>
<!-- footer -->
<footer id="footer">
    <div class="container row_spacer clearfix">
        <div class="rows_container clearfix">
            <?php if (is_active_sidebar('footer-widget')) {
                dynamic_sidebar('footer-widget');
            } else {
                $args = array(
                    'before_widget' => '<div class="footer-widget-col 	col-md-' . $col . '"><div class="footer_row">',
                    'after_widget' => '</div></div>',
                    'before_title' => '<h6 class="footer_title">',
                    'after_title' => '</h6>',
                );
                the_widget('kyma_footer_contact_widget', null, $args);
                the_widget('kyma_footer_recent_posts', null, $args);
                the_widget('kyma_footer_flicker_widget', null, $args);
                the_widget('WP_Widget_Archives', null, $args);
            } ?>
        </div>
    </div>
    <div class="footer_copyright">
        <div class="container clearfix">
            <?php if ($kyma_theme_options['copyright_text_footer']) { ?>
                <div id="copyright_text_footer" class="col-md-6">
                <span
                    class="footer_copy_text"><?php echo esc_attr($kyma_theme_options['footer_copyright']); ?>
                    <a href="<?php echo esc_url($kyma_theme_options['developed_by_link']); ?>"><?php echo esc_attr($kyma_theme_options['developed_by_link_text']); ?></a></span>
                </div><?php
            }
            ?>
        </div>
    </div>
</footer>
<?php
//var_dump($kyma_theme_options['kyma_custom_css']); die;
if ($kyma_theme_options['kyma_custom_css'] != '') {
    ?>
    <style>
        <?php echo $kyma_theme_options['kyma_custom_css']; ?>
    </style>
<?php
}
//if($kyma_theme_options['google_analytics']!='') {
?>
<script type="text/javascript">
    <?php //echo $kyma_theme_options['google_analytics']; ?>
</script>
<?php //} ?>
<!-- End footer -->
<a href="#0" class="hm_go_top"></a>
</div>
<!-- End wrapper -->
<?php
if ($kyma_theme_options['enable_custom_color']) {
    include(get_template_directory() . '/functions/scripts/custom_css.php');
}
wp_footer(); ?>
</body>
</html>