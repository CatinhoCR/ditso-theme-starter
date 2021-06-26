<?php

/**
 * Custom template tags for this theme.
 * Used for outputting content from a function call
 * This function will generally be registered to an action
 *
 * @note Search for "wp_" for built in WP's hooks
 * @see 'core/theme-hooks.php' for theme's hooks
 *
 * @package FreshXMind
 * @since 1.0.0
 */
if (!defined('ABSPATH')) {
	exit; // Exit if accessed directly.
}

/**
 * Include a skip to content link at the top of the page so that users can bypass the menu.
 */
if (!function_exists('fxm_skip_link')) {
  function fxm_skip_link()
  {
    echo '<a class="skip-link screen-reader-text" href="#content">' . __('Skip to the content', 'fxm') . '</a>';
  }
  add_action('wp_body_open', 'fxm_skip_link', 5);
}

if (!function_exists('fxm_custom_logo')) {
  function fxm_custom_logo() {
    if( has_custom_logo() ) {
      // Get Custom Logo URL
      $custom_logo_id = get_theme_mod( 'custom_logo' );
      $custom_logo_data = wp_get_attachment_image_src( $custom_logo_id , 'full' );
      $custom_logo_url = $custom_logo_data[0];
      return  $custom_logo_url;
    } else {
      return 'no';
    }
  }

}