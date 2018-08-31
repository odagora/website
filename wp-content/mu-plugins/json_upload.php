<?php
function custom_myme_types($mime_types){
  $mime_types['json'] = 'application/json';
  return $mime_types;
}
add_filter('upload_mimes', 'custom_myme_types', 1, 1);