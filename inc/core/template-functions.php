<?php

/**
 * Functions which enhance the theme by hooking into WordPress
 *
 * @package FreshXMind
 * @since 1.0.0
 */

if (!defined('ABSPATH')) {
  exit; // Exit if accessed directly.
}

/**
 * Adds custom classes to the array of body classes.
 *
 * @param array $classes Classes for the body element.
 * @return array
 */
if (!function_exists('fxm_body_classes')) :
  function fxm_body_classes($classes)
  {
    // Adds a class of '' to non-singular pages.
    if (!is_singular()) {
      // $classes[] = '';
    }

    // Adds a class of no-sidebar when there is no sidebar present.
    // todo Use Sidebar Manager
    if (!is_active_sidebar('sidebar-1')) {
      // $classes[] = 'no-sidebar';
    }

    return $classes;
  }
  add_filter('body_class', 'fxm_body_classes');
endif;

/**
 * Print formatted Strings to be added as CSS classes
 * @param string Base_Class to be added before variations (OPTIONAL)
 * @param array variations, strings with each new class to be added
 * @return strings CSS classes ready
 */
if (!function_exists('fxm_variation_classes')) :
  function fxm_variation_classes($base_class = '', $variations = [])
  {
    if (empty($variations)) {
      return;
    }
    $classes = [];
    foreach ($variations as $value) {
      // Check if multiple word string coming from DB, make sure values on ACF make sense to CSS
      if (strpos($value, '_') !== false) {
        $vals = explode("_", $value);
        foreach ($vals as $val) {
          $classes[] = !empty($base_class) ? $base_class . '--' . $val : $val;
        }
      } else {
        $classes[] = !empty($base_class) ? $base_class . '--' . $value : $value;
      }
    }
    echo implode(' ', $classes);
    // return $classes;
  }
endif;

/**
 * Print formatted Strings to be added as CSS classes
 * @param string Block_Class to be added before variations (REQUIRED)
 * @param array variations, strings with each new class to be added
 * @return strings CSS classes ready
 */
if (!function_exists('fxm_print_block_classes')) :
  function fxm_print_block_classes($base_class, $variations)
  {
    if (empty($base_class) || empty($variations)) {
      return;
    }
    $classes = [];
    foreach ($variations as $value) {
      // Check if multiple word string coming from DB, make sure values on ACF make sense to CSS
      if (strpos($value, '_') !== false) {
        $vals = explode("_", $value);
        foreach ($vals as $val) {
          $classes[] = !empty($base_class) ? $base_class . '__' . $val : $val;
        }
      } else {
        $classes[] = !empty($base_class) ? $base_class . '__' . $value : $value;
      }
    }
    echo implode(' ', $classes);
    // return $classes;
  }

endif;