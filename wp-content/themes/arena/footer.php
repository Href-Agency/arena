
<?php 
  $contact_heading = get_field('contact_heading', 'option');
  $link = get_field('contact_link', 'option');
  $site_logo = get_field('site_logo', 'option');
  $copyright_text = get_field('copyright_text', 'option');
  $contact_information = get_field('contact_information', 'option');
  $policy_link = get_field('policy_link', 'option');

  $remove_contact = get_field('remove_contact')
      
?>              
        
        <footer class="site-footer bg-blue-200 text-white pb-33 sm:pb-53">
          <div class="site-container pt-85 sm:pt-110 xl:pt-173">
            <?php if(($contact_heading || $contact_link) && !$remove_contact) :?>
              <div class="contact-block mb-125 md:mb-150 xl:mb-[222px]" data-speed="1.05">
                <div class="heading max-w-[920px]"><?php echo $contact_heading; ?></div>

                <?php if($link):?>
                    <a class="link mt-28 sm:mt-32 !text-white" href="<?php echo $link['url']; ?>" target="<?php echo $link['target']; ?>"><?php echo $link['title']; ?></a>
                <?php endif; ?>
              </div>
            <?php endif; ?>

            <div class="main-footer mb-38 sm:mb-60 xl:mb-78 flex flex-col md:flex-row justify-between items-start">
              <div class="left-col mb-60 md:mb-0">
                <a href="<?php echo home_url(); ?>" class="site-logo">
                  <img src="<?php echo $site_logo['url']; ?>" alt="">
                </a>

                <nav class="site-footer__navigation mt-32 sm:mt-36">
                  <?php
                    echo wp_nav_menu([
                      'theme_location' => 'header',
                      'menu_class' => 'site-footer__menu flex flex-col',
                      'container' => false
                    ]);
                  ?>
                </nav>
              </div>

              <div class="right-col flex flex-col sm:flex-row gap-50 xl:gap-99">
                <?php if($contact_information):?>
                  <div class="contact-us min-w-[256px]">
                    <h6 class="mb-12 sm:mb-31 text-20">Contact us</h6>
                    <div class="wysywig">
                      <?php echo $contact_information; ?>
                    </div>
                  </div>
                <?php endif; ?>

                <?php if(get_field('social_media_links', 'option')):?>
                  <div class="follow-us xl:min-w-[256px] flex flex-col">
                    <h6 class="mb-12 sm:mb-31 text-20">Follow us</h6>
                    <?php while(have_rows('social_media_links', 'option')) : the_row(); 
                      $icon = get_sub_field('icon');
                      $link = get_sub_field('link');
                      ?>
                      <a href="<?php echo $link['url']; ?>" target="<?php echo $link['target']; ?>" class="single-link mb-5 last:mb-0">
                        <span class="text-18 md:text-20 leading-1.4 tracking-wide text-grey-100 underline"><?php echo $link['title']; ?></span>
                      </a>
                    <?php endwhile; ?>
                  </div>
                <?php endif; ?>
              </div>
            </div>

            <div class="copyright-info text-16 leading-1.3 text-grey-100 flex flex-col sm:flex-row">
              <span><?php echo $copyright_text; ?></span>
              <a class="sm:ml-20 block" href="<?php echo $policy_link['url']; ?>" target="<?php echo $policy_link['target']; ?>"><?php echo $policy_link['title']; ?></a>
            </div>
          </div>
        </footer>
    </article>
    
    </main>
    

    <?php wp_footer(); ?>
  </body>
</html>
