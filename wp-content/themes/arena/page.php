<?php get_header(); ?>

<article <?php post_class('blocks'); ?> id="smooth-content">
  <div class="min-h-[200vh] bg-slate-500">
    <?php 
      if (have_posts()) : while (have_posts()) : the_post();
        the_content(); 
      endwhile; endif;
    ?> 
  </div>

<?php get_footer(); ?>
