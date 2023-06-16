<?php get_header(); ?>

<article <?php post_class('blocks'); ?> id="smooth-content">
  <div class="pt-[275px] pb-[200px]">
    <div class="site-container text-center">
        <h3 class="mb-32">404 - Page not found</h3>
        <div class="wysywig">
          <p class="text-md md:text-md-large">Sorry, we couldn’t find the page you were looking for.</p>
        </div>
        <a class="link mt-110" href="<?php echo home_url(); ?>">Return to Home page</a>
    </div>
  </div>

<?php get_footer(); ?>
