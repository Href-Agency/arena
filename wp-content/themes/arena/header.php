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
      <header class="site-header text-white fixed pt-36 md:pt-80 2xl:pt-122 w-screen top-0 z-[99999999]">
        <div class="site-container flex flex-row justify-between z-[999999]">

          <?php if(have_rows('social_media_links', 'option')): ?>
            <div class="social-media hidden lg:flex flex-row items-center flex-grow flex-[40%]">
              <?php while(have_rows('social_media_links', 'option')) : the_row(); 
              $icon = get_sub_field('icon');
              $link = get_sub_field('link');
              ?>
              <a href="<?php echo $link['url']; ?>" target="<?php echo $link['target']; ?>" class="single-link mr-19">
                <?php if($icon): ?>
                  <div class="icon hover:scale-125 transition-all">
                    <div class="w-18 h-18 bg-white icon-image" style="mask-image: url('<?php echo $icon['url']; ?>'); --webkit-mask-image: url('<?php echo $icon['url']; ?>');"></div>
                  </div>
                <?php endif; ?>
              </a>
              <?php endwhile; ?>
            </div>
          <?php endif; ?>

          <a href="<?php echo home_url(); ?>" class="site-logo flex flex-row gap-6 lg:flex-grow justify-center relative">
            <img class="dark absolute left-1/2 -translate-x-[49%] top-0 opacity-0" src="<?php echo get_template_directory_uri(); ?>/assets/logo-split/arena-a-dark.svg" alt="">
            <img class="light" src="<?php echo get_template_directory_uri(); ?>/assets/logo-split/arena-a.svg" alt="">
            <img class="light hidden lg:block" src="<?php echo get_template_directory_uri(); ?>/assets/logo-split/arena-r.svg" alt="">
            <img class="light hidden lg:block" src="<?php echo get_template_directory_uri(); ?>/assets/logo-split/arena-e.svg" alt="">
            <img class="light hidden lg:block" src="<?php echo get_template_directory_uri(); ?>/assets/logo-split/arena-n.svg" alt="">
            <img class="light hidden lg:block" src="<?php echo get_template_directory_uri(); ?>/assets/logo-split/arena-a.svg" alt="">
          </a>

          <nav class="site-header__navigation flex-grow hidden lg:flex justify-end flex-[40%]">
            <?php
              echo wp_nav_menu([
                'theme_location' => 'header',
                'menu_class' => 'site-header__menu flex flex-row',
                'container' => false
              ]);
            ?>
          </nav>

          <div class="hamburger-container lg:hidden flex-[40%] flex-grow flex justify-end">
            <svg class="ham hamRotate ham1 z-50 " viewBox="0 0 100 100" width="104">
              <path class="line top" d="m 30,38 h 40 c 0,0 9.044436,-0.654587 9.044436,-8.508902 0,-7.854315 -8.024349,-11.958003 -14.89975,-10.85914 -6.875401,1.098863 -13.637059,4.171617 -13.637059,16.368042 v 40" />
              <path class="line middle" d="m 30,50 h 40" />
              <path class="line bottom" d="m 30,62 h 40 c 12.796276,0 15.357889,-11.717785 15.357889,-26.851538 0,-15.133752 -4.786586,-27.274118 -16.667516,-27.274118 -11.88093,0 -18.499247,6.994427 -18.435284,17.125656 l 0.252538,40" />
            </svg> 
          </div>
        </div>


        <nav class="site-header__navigation-mobile absolute w-screen h-screen bg-blue-200 left-0 top-0  z-[10] -translate-y-full flex flex-col items-center justify-center pt-40 sm:pt-80">
          <?php
            echo wp_nav_menu([
              'theme_location' => 'header',
              'menu_class' => 'site-header__menu-mobile flex flex-col',
              'container' => false
            ]);
          ?>

           <?php if(have_rows('social_media_links', 'option')): ?>
          <div class="social-media  flex-col items-center flex mt-60 lg:hidden">
            <?php while(have_rows('social_media_links', 'option')) : the_row(); 
            $icon = get_sub_field('icon');
            $link = get_sub_field('link');
            ?>
            <a href="<?php echo $link['url']; ?>" target="<?php echo $link['target']; ?>" class="single-link mb-20 last:mb-0">
              <span class="text-28 leading-1.4 tracking-wide text-grey-100"><?php echo $link['title']; ?></span>
            </a>
            <?php endwhile; ?>
          </div>
          <?php endif; ?>
        </nav>
      </header>

      <main class="site-main" id="smooth-wrapper">
