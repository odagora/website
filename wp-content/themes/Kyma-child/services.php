<?php
/* Template Name: Service Template */
get_header();
get_template_part('breadcrumbs');
the_post();
$kyma_theme_options = kyma_theme_options();
?>
<!-- Services Intro -->
<?php if (has_post_thumbnail() || the_content()) { ?>
<section class="content_section">
	<div class="content row_spacer no_padding">
		<div class="rows_container clearfix">
			<div class="col-md-8">
				<?php the_content(); ?>
			</div>
			<div class="col-md-4">
				<span class="spacer30"></span>
					<?php the_post_thumbnail('service_template_thumb'); ?>
			</div>
		</div>
	</div>
</section>
<!-- End Services Intro -->
<?php } get_template_part('page', 'client');
// get_template_part('page', 'testimonial');
get_footer(); ?>