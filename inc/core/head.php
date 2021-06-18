<?php

/**
 * Hook into wp_head for awesomeness
 * This is a TODO: and will become relevant for production hooks into the wp_head tags
 * Examples of things that may be added here:
 * GA tag, SEO tags, Social Media tags
 *
 * @link https://www.intelliwolf.com/clean-up-wordpress-head-code/
 * @link https://crunchify.com/how-to-clean-up-wordpress-header-section-without-any-plugin/
 */

function add_ga_script() {
  $ga_tracking_id = get_field('ga_tracking_id', 'option');
?>
  <script>
    (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
    (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
    m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
    })(window,document,'script','https://www.google-analytics.com/analytics.js','ga');

    ga('create', '<?= $ga_tracking_id ?>', 'auto');
    ga('send', 'pageview');
  </script>
<?php
}
add_action('wp_head', 'add_ga_script');

/**
 * Disable Admin Bar to non editors or admins
 *
 */
// show admin bar only for admins and editors
if (!current_user_can('edit_posts') || !current_user_can('activate_plugins')) {
  add_filter('show_admin_bar', '__return_false');
}

/**
 * Hide Admin Post & Comments Section
 */
add_action('admin_menu', 'remove_options');

function remove_options()
{
  remove_menu_page('edit.php');
  remove_menu_page('edit-comments.php');
}

/**
 * Removes the wordpress version from meta (rss too)
 */
remove_action('wp_head', 'wp_generator');
add_filter('the_generator', 'remove_wp_version_rss');
function remove_wp_version_rss()
{
  return '';
}


/**
 * Wordpress meta tags version generators
 */
function crunchify_remove_version()
{
  return '';
}
// add_filter('the_generator', 'crunchify_remove_version');

/**
 * REST API
 */
// remove_action('wp_head', 'rest_output_link_wp_head', 10);
// remove_action('wp_head', 'wp_oembed_add_discovery_links', 10);
// remove_action('template_redirect', 'rest_output_link_header', 11, 0);


/**
 * WP default EditURI to your site header
 * required if you are publishing post by third party tool
 */
// remove_action ('wp_head', 'rsd_link');
// remove_action( 'wp_head', 'wlwmanifest_link');
// remove_action( 'wp_head', 'wp_shortlink_wp_head');

/**
 * Style and Scripts version query string for static 3rd party assets
 */
// function crunchify_cleanup_query_string( $src ){
// 	$parts = explode( '?', $src );
// 	return $parts[0];
// }
// add_filter( 'script_loader_src', 'crunchify_cleanup_query_string', 15, 1 );
// add_filter( 'style_loader_src', 'crunchify_cleanup_query_string', 15, 1 );

/**
 * Disable the emoji's
 *
 */
function disable_emojis()
{
  remove_action('wp_head', 'print_emoji_detection_script', 7);
  remove_action('admin_print_scripts', 'print_emoji_detection_script');
  remove_action('wp_print_styles', 'print_emoji_styles');
  remove_action('admin_print_styles', 'print_emoji_styles');
  remove_filter('the_content_feed', 'wp_staticize_emoji');
  remove_filter('comment_text_rss', 'wp_staticize_emoji');
  remove_filter('wp_mail', 'wp_staticize_emoji_for_email');
  add_filter('tiny_mce_plugins', 'disable_emojis_tinymce');
  add_filter('wp_resource_hints', 'disable_emojis_remove_dns_prefetch', 10, 2);
}
add_action('init', 'disable_emojis');


/**
 * Filter function used to remove the tinymce emoji plugin.*
 * @param array $plugins
 * @return array Difference betwen the two arrays
 */
function disable_emojis_tinymce($plugins)
{
  if (is_array($plugins)) {
    return array_diff($plugins, array('wpemoji'));
  } else {
    return array();
  }
}
/**
 * Remove emoji CDN hostname from DNS prefetching hints. *
 * @param array $urls URLs to print for resource hints.
 * @param string $relation_type The relation type the URLs are printed for.
 * @return array Difference between the two arrays.
 */
function disable_emojis_remove_dns_prefetch($urls, $relation_type)
{
  if ('dns-prefetch' == $relation_type) {
    /** This filter is documented in wp-includes/formatting.php */
    $emoji_svg_url = apply_filters('emoji_svg_url', 'https://s.w.org/images/core/emoji/2.3/svg/');
    $urls = array_diff($urls, array($emoji_svg_url));
  }
  return $urls;
}

/**
 * Remove unsafe rest endpoints
 */
// add_filter( 'rest_endpoints', 'remove_rest_endpoints');
// function remove_rest_endpoints( $endpoints ){
// 	$unsafe_endpoints = [
// 		'/wp/v2/users',
// 		'/wp/v2/users/(?P<id>[\d]+)',
// 	];

// 	foreach($unsafe_endpoints as $unsafe_endpoint){
// 		if ( isset( $endpoints[$unsafe_endpoint] ) ) {
// 			unset( $endpoints[$unsafe_endpoint] );
// 		}
// 	}

// 	return $endpoints;
// }

// add_filter('wp_die_handler', 'get_custom_die_handler');
// function get_custom_die_handler() {
//   return 'custom_die_handler';
// }

/**
 * Kills WordPress execution and displays a custom page when is not in admin.
 *
 * @param string|WP_Error $message Error message or WP_Error object.
 * @param string          $title   Optional. Error title. Default empty.
 * @param string|array    $args    Optional. Arguments to control behavior. Default empty array.
 */
// function custom_die_handler($message, $title='', $args=array()) {
//   $errorTemplate = get_theme_root().'/'.get_template().'/500.php';
//   if(!is_admin() && file_exists($errorTemplate)) {
//     require_once($errorTemplate);
//     die();
//   } else {
//     _default_wp_die_handler($message, $title, $args);
//   }
// }