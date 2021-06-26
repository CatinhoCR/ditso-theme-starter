<?php

/**
 * Main Site Header Navbar
 */
if (!defined('ABSPATH')) {
  exit; // Exit if accessed directly.
}
?>
<header id="masthead" class="header">
  <div class="header__toolbar">
    <div class="header__inner justify-content-end">
      <?php
      $args = array(
        'theme_location' => 'utilities',
        'container' => 'ul',
        'menu_class' => 'toolbar__menu'
      );
      wp_nav_menu($args);
      ?>
    </div>
  </div>
  <nav class="header__navbar nav">
    <div class="header__inner">
      <div class="header__brand">
        <!-- logo -->
        <?php if (has_custom_logo()) :  ?>
          <?php
          // Get Custom Logo URL
          $custom_logo_id = get_theme_mod('custom_logo');
          $custom_logo_data = wp_get_attachment_image_src($custom_logo_id, 'full');
          $custom_logo_url = $custom_logo_data[0];
          ?>

          <a href="<?php echo esc_url(home_url('/')); ?>" title="<?php echo esc_attr(get_bloginfo('name')); ?>" rel="home">

            <img src="<?php echo esc_url($custom_logo_url); ?>" alt="<?php echo esc_attr(get_bloginfo('name')); ?>" />

          </a>
        <?php else : ?>
          <div class="site-name"><?php bloginfo('name'); ?></div>
        <?php endif; ?>
      </div>
      <div class="nav__menu-wrapper">
        <?php
        $args = array(
          'theme_location' => 'primary',
          'container' => 'ul',
          'menu_class' => 'header__nav',
          // 'walker' => new FxM_Custom_Megamenu()
        );
        wp_nav_menu($args);
        ?>
      </div>
    </div>
  </nav>
</header>