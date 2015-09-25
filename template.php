<?php
/**
 * @file
 * template.php
 */

function gvj_preprocess_html(&$variables) {
  drupal_add_css('https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css', array('type' => 'external'));
}

function gvj_preprocess_region(&$variables, $hook) {
  if ($variables['region'] == "content" && arg(0) == 'contact') {
    $variables['classes_array'][] = 'container';
  }
  if ($variables['region'] == "footer"){
    $variables['classes_array'][] = 'container';
  }
}

function gvj_preprocess_block(&$vars) {
  if ($vars['block']->module == 'system' && $vars['block']->delta == 'main' && arg(0) == 'contact') {
    $vars['classes_array'] = array_merge($vars['classes_array'], array('col-sm-6'));
  }
}

function gvj_preprocess_field(&$vars) {
  /* Set shortcut variables. Hooray for less typing! */
  $name = $vars['element']['#field_name'];
  $bundle = $vars['element']['#bundle'];
  $mode = $vars['element']['#view_mode'];
  $classes = &$vars['classes_array'];
  $title_classes = &$vars['title_attributes_array']['class'];
  $content_classes = &$vars['content_attributes_array']['class'];
  $item_classes = array();

  if ($name == 'body' && $mode == 'full' && $bundle == 'work') {
    $vars['classes_array'] = array_merge($vars['classes_array'], array('container'));
  }

  if ($name == 'field_work_url' && $mode == 'full' && $bundle == 'work') {
    foreach ($vars['items'] as $delta => $item) {
      $vars['item_attributes_array'][$delta]['class'] = array('btn btn-web');
    }
    debug($vars);
  }
}
