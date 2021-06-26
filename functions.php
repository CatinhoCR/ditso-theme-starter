<?php

/**
 * Ditso Theme Functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package Ditso
 * @since 1.0.0
 */

if (!defined('ABSPATH')) {
  exit; // Exit if accessed directly.
}

/**
 * Theme's functions
 */
$includes = [
  // Setup helper functions
  'inc/helpers.php',
  // Theme Setup Functions and definitions
  'inc/theme-setup.php',
  // Theme customizations, hooks and extending
  'inc/core.php',
  // Markup & Other Custom Functions
  'inc/methods.php',
];

foreach ($includes as $file) {
  if (!$filepath = locate_template($file)) {
    trigger_error(sprintf(__('Error locating %s for inclusion'), $file), E_USER_ERROR);
  }

  require_once $filepath;
}
unset($file, $filepath);
