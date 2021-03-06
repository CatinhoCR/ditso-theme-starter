<?php

/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Ditso
 */

if (!defined('ABSPATH')) {
	exit; // Exit if accessed directly.
}
?>
<!DOCTYPE html>
<?php fxm_html_before(); ?>
<html <?php language_attributes(); ?>>

<head>
	<?php fxm_head_top(); ?>
	<meta charset="<?php bloginfo('charset'); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="https://gmpg.org/xfn/11">
	<?php wp_head(); ?>
	<?php fxm_head_bottom(); ?>
</head>
<body <?php body_class(); ?>>
  <?php fxm_body_top(); ?>

  <?php wp_body_open(); ?>

  <?php fxm_header_before(); ?>

	<?php get_template_part('partials/blocks/header'); ?>

  <?php fxm_header_after(); ?>

  <?php fxm_content_before(); ?>
