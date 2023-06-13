<?php get_header(); ?>

<section class="site-page">
  <div class="site-container">
    <?php if (have_posts()) : ?>
      <ul class="post-list">
        <?php while (have_posts()) : the_post(); ?>
          <li class="post-list__entry">
            <h2 class="post-list__title"><?php the_title(); ?></h2>
            <div class="post-list__excerpt"><?php the_excerpt(); ?></div>
            <a class="post-list__anchor" href="<?php the_permalink(); ?>">Read more</a>
          </li>
        <?php endwhile; ?>
      </ul>
    <?php else : ?>
      <article>
        <h1>Sorry, there's nothing here yet!</h1>
        <p>Please check again at a later date.</p>
      </article>
    <?php endif; ?>
  </div>
</section>

<?php get_footer(); ?>
