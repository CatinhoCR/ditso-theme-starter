<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Ditso
 */

?>

<?php fxm_content_after(); ?>

<?php fxm_footer_before(); ?>

<?php get_template_part('partials/blocks/footer'); ?>

<?php fxm_footer_after(); ?>

<?php fxm_body_bottom(); ?>

<?php wp_footer(); ?>
</body>
</html>
