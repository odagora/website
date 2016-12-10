<?php

/*Styles*/ 
function dequeue_kyma_unnecessary_styles(){
	wp_dequeue_style('responsive');
	wp_deregister_style('responsive');
}
add_action('wp_print_styles', 'dequeue_kyma_unnecessary_styles');
 
function enqueue_kyma_modified_styles(){
	wp_enqueue_style('responsive-child', get_template_directory_uri() . '/../Kyma-child/css/responsive-child.css');
	wp_enqueue_style('icomoon-icon-fonts', get_template_directory_uri() . '/../Kyma-child/css/icomoon-icon-fonts.css');
}
add_action('wp_enqueue_scripts', 'enqueue_kyma_modified_styles');

/*Scripts*/
function dequeue_kyma_unnecessary_scripts(){
	wp_dequeue_script('functions');
	wp_deregister_script('functions');
}
add_action('wp_print_scripts', 'dequeue_kyma_unnecessary_scripts');

function enqueue_kyma_modified_script(){
	wp_enqueue_script('jquery');
	wp_enqueue_script('functions', get_template_directory_uri() . '/../Kyma-child/js/functions.js');
}
add_action('wp_footer', 'enqueue_kyma_modified_script');

function hide_fields(){
	wp_enqueue_script('hide-fields', get_template_directory_uri() . '/../Kyma-child/js/hide-fields.js');
}
add_action('wp_enqueue_scripts', 'hide_fields');

/*Allow parse php code to text widgets*/
add_filter('widget_text','execute_php',100);
function execute_php($html){
     if(strpos($html,"<"."?php")!==false){
          ob_start();
          eval("?".">".$html);
          $html=ob_get_contents();
          ob_end_clean();
     }
     return $html;
}
?>
