<?php get_header(); ?>

<?php
  $data_hero = array(
    'header' => '<h3>' . get_field('client') ?? get_the_title() . '</h3>',
    'copy' => get_the_excerpt() ?? false
  );

  $args = array(
    'post_type' => 'projects',
    'posts_per_page' => 3,
    'orderby' => 'date',
    'order' => 'DESC'
  );

  $query = new WP_Query($args);
  $query = $query->posts;

  $data_news = array(
    'header' => '<h3>More projects <span style="color: #06A4DE;">+</span></h3>',
    'link' => ['url' => '/projects', 'target' => null, 'title' => 'View all projects'],
    'posts' =>  $query
  );
?>

<article <?php post_class('blocks'); ?> id="smooth-content">
  <div class="min-h-[100vh]">
    
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
