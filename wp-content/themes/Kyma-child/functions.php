<?php
 
function dequeue_kyma_unnecessary_styles(){
	wp_dequeue_style('responsive');
	wp_deregister_style('responsive');
}
add_action('wp_print_styles', 'dequeue_kyma_unnecessary_styles');
 
function enqueue_kyma_modified_styles(){
	wp_enqueue_style('responsive-child', get_template_directory_uri() . '/../Kyma-child/css/responsive-child.css');
}
add_action('wp_enqueue_scripts', 'enqueue_kyma_modified_styles');
?>
