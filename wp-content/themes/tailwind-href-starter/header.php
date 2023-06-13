<!DOCTYPE html>
<html <?php language_attributes(); ?>>
  <head>
    <title><?php wp_title(); ?></title>
    <meta charset="<?php bloginfo('charset'); ?>"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no"/>
    <link rel="pingback" href="<?php bloginfo('pingback_url'); ?>"/>

    <?php wp_head(); ?>
  </head>

  <body <?php body_class(); ?>>
    <?php wp_body_open(); ?>
    
    <div class="site-wrapper">
      <header class="site-header">
        <div class="site-container">
          <a href="<?php echo home_url(); ?>" class="site-logo">
            <span class="text-replace"><?php bloginfo('name'); ?></span>
          </a>

          <nav class="site-header__navigation">
            <?php
              echo wp_nav_menu([
                'theme_location' => 'header',
                'menu_class' => 'site-header__menu',
                'container' => false
              ]);
            ?>
          </nav>
        </div>
      </header>

      <main class="site-main">
