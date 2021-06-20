<?php
/**
 * Callback functions hooked into custom Actions
 * that fetch any needed data (settings/options)
 * to render markup from a template-part or partial
 *
 * @see inc/core/theme-hooks.php
 * @link https://developer.wordpress.org/reference/functions/get_template_part/
 * @package FreshXMind
 * @since 1.0.0
 */
if (!defined('ABSPATH')) {
	exit; // Exit if accessed directly.
}

/**
 * Main Site Header Content Template Part
 */
if (!function_exists('fxm_main_site_header')) {
  function fxm_main_site_header()
  {
    // Fetch Theme Options to pass as argument to template $args
    $settings = [];
    get_template_part('partials/blocks/header', 'nav', $settings);
  }
  add_action('fxm_site_header', 'fxm_main_site_header', 10);
}
