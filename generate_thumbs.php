<?php

function file_sync_generate_thumbs() {
  $result = db_query('SELECT fid, uri FROM {file_managed} WHERE filemime like :mime AND status = :status', array('mime' => 'image/%', 'status' => FILE_STATUS_PERMANENT));
  $styles = image_styles();
  $styles = array('square_thumbnail' => $styles['square_thumbnail']);
  foreach ($result as $delta => $img_info) {
    if (function_exists('drush_print')) {
      drush_print('Generating thumb for ' . $img_info->fid . ' - #' . $delta . '/' . count($result));
    }
    foreach($styles as $style) {
      $derivative_uri = image_style_path($style['name'], $img_info->uri);
      if (!file_exists($derivative_uri)) {
        image_style_create_derivative($style, $img_info->uri, $derivative_uri);
      }
    }
  }
}

if (function_exists('drush_print'))
  file_sync_generate_thumbs();

