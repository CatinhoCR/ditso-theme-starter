<?php

/**
 * Classes
 *
 * @package FreshXMind
 * @author Cato
 * @since version 1.0.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

$class_includes = [
  // 'inc/classes/class-navigation-walker.php',
];

foreach ($class_includes as $file) {
  if (!$filepath = locate_template($file)) {
    trigger_error(sprintf(__('Error locating %s for inclusion', 'freshxmind'), $file), E_USER_ERROR);
  }
  require_once $filepath;
}
