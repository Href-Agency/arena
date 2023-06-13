<?php get_header(); ?>

<section class="site-page">
  <div class="site-container">
    <article <?php post_class(); ?>>
      <h1><?php the_title(); ?></h1>
      
      <?php 
        if (have_posts()) : while (have_posts()) : the_post();
          the_content(); 
        endwhile; endif;

        include THEME_DIRECTORY . '/includes/partials/post-share.php';
      ?>

      <p><a href="<?php echo get_permalink(get_option('page_for_posts')); ?>">Back</a></p>
    </article>
  </div>
</section>

<?php get_footer(); ?>
