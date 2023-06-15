
<?php get_header(); ?>

<?php

  $block_directory_name = 'text-hero';
  $block_id = $block_directory_name . '-projects';

  $data = array(
    'header' => get_field('projects_header', 'option') ?? 'Projects',
    'copy' => get_field('projects_copy', 'option') ?? false
  );

  $data_testimonial = array(
    'background_image' => get_field('projects_testimonials_background_image', 'option'),
    'testimonial' => get_field('projects_testimonial', 'option')
  );

  $args = array(
    'post_type' => 'post',
    'posts_per_page' => 3,
    'orderby' => 'date',
    'order' => 'DESC'
  );

  $query = new WP_Query($args);
  $query = $query->posts;

  $data_news = array(
    'header' => '<h3>News <span style="color: #06A4DE;">+</span> insights</h3>',
    'link' => ['url' => '/latest', 'target' => null, 'title' => 'View all stories'],
    'posts' =>  $query
  );


?>

<article <?php post_class('blocks'); ?> id="smooth-content">
  <div class="min-h-[50vh] projects-archive">
    
    <?php

      get_template_part(
        "includes/blocks/" . $block_directory_name . "/template",
        null,
        array(
          'data' => $data,
          'class_name' => 'text-hero',
          'block_id' => $block_id,
        )
      );
    ?>

    <div class="site-container mb-126">
      <?php if (have_posts()) : ?>

        <div class="grid md:grid-cols-2 gap-x-50 xl:gap-x-90 gap-40 md:gap-y-60 xl:gap-y-101 post-list">
          <?php while (have_posts()) : the_post();
            $ID = get_the_id();
            $client = get_field('client', $ID);
            ?>

            <div class="single-project-container overflow-hidden block post-list__single">
                <div class="aos-container" data-aos="custom-up" data-aos-offset="300">

                  <?php 
                      get_template_part('template-parts/project', 'card', ['client' => $client, 'id' => $ID]);
                  ?>

                </div>
            </div>

          <?php endwhile; ?>
        </div>

        <div id="load-more" class="load-more link mx-auto pt-135 !block !w-fit cursor-pointer">Load More</div>

      <?php endif; ?>
    </div>

    <?php
      get_template_part(
        "includes/blocks/testimonial/template",
        null,
        array(
          'data' => $data_testimonial,
          'class_name' => 'testimonial',
          'block_id' => 'testimonial-projects',
        )
      );
    ?>

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