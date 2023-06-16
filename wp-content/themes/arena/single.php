<?php get_header(); ?>

<?php
  $ID = get_the_id();

  $category = get_the_category($ID);
  $date = get_the_date('d/m/Y', $ID);

  $posted = $category[0]->name . ' | Posted on ' . $date;

  $data_hero = array(
    'header' => '<h3>' .  get_the_title() . '</h3>',
    'copy' => $posted ?? get_the_excerpt(),
  );

  $siblings = get_post_siblings( 3 );


  $args = array(
    'post_type' => 'post',
    'posts_per_page' => 3,
    'post_status' => 'publish',
    'orderby' => 'date',
    'order' => 'DESC',
    'post__not_in' => array($ID)
);

  $query = new WP_Query($args);
  $query = $query->posts;

  $data_news = array(
    'header' => '<h3>More news <span style="color: #06A4DE;">+</span> insights</h3>',
    'link' => ['url' => '/latest', 'target' => null, 'title' => 'View all'],
    'posts' =>  $siblings['next'] ?? $query
  );
?>

<article <?php post_class('blocks'); ?> id="smooth-content">
  <div class="min-h-[100vh] single-news-page">
    
    <?php
      get_template_part(
        "includes/blocks/text-hero/template",
        null,
        array(
          'data' => $data_hero,
          'class_name' => 'text-hero',
          'block_id' => 'text-hero-projects',
        )
      );
    ?>

    <?php 
      if (have_posts()) : while (have_posts()) : the_post();
        the_content(); 

      endwhile; endif;
    ?> 

      <div class="keyline border-b-[0.5px] border-grey-100 site-container my-75 sm:my-100 xl:my-161" data-speed="0.95"></div>

    <?php

      get_template_part(
        "includes/blocks/latest-news/template",
        null,
        array(
          'data' => $data_news,
          'class_name' => 'latest-news',
          'block_id' => 'test-news-projects',
        )
      );
    ?>
  </div>

<?php get_footer(); ?>
