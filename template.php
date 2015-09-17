<?php
/**
 * @file
 * template.php
 */

function gvj_preprocess_html(&$variables) {
  drupal_add_css('https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css', array('type' => 'external'));
}

function gvj_preprocess_region(&$variables, $hook) {
  if($variables['region'] == "footer"){
    $variables['classes_array'][] = 'container';
  }
}
