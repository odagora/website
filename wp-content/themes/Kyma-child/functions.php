<?php

/**
 * Theme core functions
 */
require get_stylesheet_directory() . '/functions/shortcodes/shortcodes.php';

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

function ddd_menus(){
  wp_enqueue_script('ddd-menus', get_template_directory_uri() . '/../Kyma-child/js/ddd-menus.js');
  wp_localize_script('ddd-menus', 'ajax_object', array('ajax_url' => admin_url( 'admin-ajax.php' ), 'home_url'  =>  home_url('/')));
}
add_action('wp_footer', 'ddd_menus');

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

/* Server side CF7 dropdown dependent menus */
function ajax_cf7_populate_values() {

        // read the CSV file in the $makes_models array

  $makes_models = array();
  $uploads_folder = wp_upload_dir()['basedir'];
  $file = fopen($uploads_folder.'/make-model.csv', 'r');

  $firstline = true;
  while (($line = fgetcsv($file)) !== FALSE) {
    if ($firstline) {
      $firstline = false;
      continue;
    }
    $makes_models[$line[0]][$line[1]][] = $line[2];

  }
  fclose($file);

        // setup the initial array that will be returned to the the client side script as a JSON object.

  $return_array = array(
            'makes' => array_keys($makes_models),
            'models' => array(),
            'current_make' => false,
            'current_model' => false
        );

        // collect the posted values from the submitted form

  $make = key_exists('senderMake', $_POST) ? $_POST['senderMake'] : false;
  $model = key_exists('senderLine', $_POST) ? $_POST['senderLine'] : false;

        // populate the $return_array with the necessary values

  if ($make) {
    $return_array['current_make'] = $make;
    $return_array['models'] = array_keys($makes_models[$make]);
      if ($model) {
        $return_array['current_model'] = $model;
      }
  }

        // encode the $return_array as a JSON object and echo it
        
        echo json_encode($return_array);
        wp_die();

}

// These action hooks are needed to tell WordPress that the cf7_populate_values() function needs to be called
// if a script is POSTing the action : 'cf7_populate_values'

add_action( 'wp_ajax_cf7_populate_values', 'ajax_cf7_populate_values' );
add_action( 'wp_ajax_nopriv_cf7_populate_values', 'ajax_cf7_populate_values' );

/* Contact Form 7 Event Handler */
add_action( 'wp_footer', 'cf7_fields_formatting' );
 
function cf7_fields_formatting() {
?>
<script type="text/javascript">
var wpcf7Elm = document.querySelector( '.wpcf7' );
if(wpcf7Elm){
  wpcf7Elm.addEventListener( 'keyup', function( event ) {
  jQuery(function($){
    $.fn.capitalize = function() {
      $(this).val($(this).val().replace(/\w\S*/g, function(txt){
        return txt.charAt(0).toUpperCase() + txt.substr(1).toLowerCase();
      }));
      return this;
    }
    $('.mc4wp-FNAME input').capitalize();
    $('.senderLastname input').capitalize();
  });
  jQuery(function($){
    $.fn.lowercase = function() {
      $(this).val($(this).val().toLowerCase());
      return this;
    }
    $('.senderEmail input').lowercase();
  });
  jQuery(function($){
    $.fn.uppercase = function() {
      $(this).val($(this).val().toUpperCase());
      return this;
    }
    $('.senderLicense input').uppercase();
  });
 }, false );
}
</script>
<?php
}
?>
