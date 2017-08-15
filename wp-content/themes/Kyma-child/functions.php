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
add_action('wp_footer', 'hide_fields');

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
/*Disable automatic p tag in html content*/
function remove_the_wpautop_function() {
    remove_filter( 'the_content', 'wpautop' );
    remove_filter( 'the_excerpt', 'wpautop' );
}
add_action( 'after_setup_theme', 'remove_the_wpautop_function' );

/** Add Page Number to Title and Meta Description for SEO **/
if ( ! function_exists( 'multipage_metadesc' ) ){
   function multipage_metadesc( $s ){
      global $page;
      $paged = get_query_var( 'paged' ) ? get_query_var( 'paged' ) : 1;
      ! empty ( $page ) && 1 < $page && $paged = $page;
      $paged > 1 && $s .= ' - ' . sprintf( __( 'Parte %s' ), $paged );
      return $s;
   }
   add_filter( 'wpseo_metadesc', 'multipage_metadesc', 100, 1 );
}

if ( ! function_exists( 'multipage_title' ) ){
   function multipage_title( $title ){
      global $page;
      $paged = get_query_var( 'paged' ) ? get_query_var( 'paged' ) : 1;
      ! empty ( $page ) && 1 < $page && $paged = $page;
      $paged > 1 && $title .= ' - ' . sprintf( __( 'Parte %s' ), $paged );
      return $title;
   }
   add_filter( 'wpseo_title', 'multipage_title', 100, 1 );
}

/* Remove the "hentry" class from pages and archives (prevents structured data errors) */
function remove_hentry( $classes ) {
if (is_page() || is_archive()){
  $classes = array_diff( $classes, array('hentry'));
  }
  return $classes;
}
add_filter( 'post_class','remove_hentry' );
?>
