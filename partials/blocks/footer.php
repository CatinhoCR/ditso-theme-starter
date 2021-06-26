<?php

/**
 * Footer Template Partial Layout Sample
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Ditso
 */

if (!defined('ABSPATH')) {
  exit; // Exit if accessed directly.
}
?>

<footer id="colophon" class="site-footer">
  <div class="site-info">
    <a href="<?php echo esc_url(__('https://wordpress.org/', 'fxm')); ?>">
      <?php
      /* translators: %s: CMS name, i.e. WordPress. */
      printf(esc_html__('Proudly powered by %s', 'fxm'), 'WordPress');
      ?>
    </a>
    <span class="sep"> | </span>
    <?php
    /* translators: 1: Theme name, 2: Theme author. */
    printf(esc_html__('Theme: %1$s by %2$s.', 'fxm'), 'fxm', '<a href="http://cato.castilloquesada.com">Andres Castillo Quesada</a>');
    ?>
  </div>
</footer>