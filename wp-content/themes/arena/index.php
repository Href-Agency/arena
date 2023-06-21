
<?php get_header(); ?>

<?php


  $data = array(
    'header' => get_field('news_header', 'option') ?? 'News + insights',
    'copy' => get_field('news_copy', 'option') ?? false
  );

?>

<article <?php post_class('blocks'); ?> id="smooth-content">
  <div class="min-h-[50vh] news-archive">
    
    <?php
      get_template_part(
        "includes/blocks/text-hero/template",
        null,
        array(
          'data' => $data,
          'class_name' => 'text-hero',
          'block_id' => 'text-hero-projects',
        )
      );
    ?>

    <div class="site-container mb-126">
      <?php if (have_posts()) : ?>

        <div class="grid sm:grid-cols-2 lg:grid-cols-3 gap-x-40 xl:gap-x-62 gap-y-50 md:gap-y-75 xl:gap-y-90 2xl:gap-y-120 post-list">
          <?php while (have_posts()) : the_post();
            $ID = get_the_id();
            $client = get_field('client', $ID);
            ?>

            <div class="single-project-container overflow-hidden block post-list__single">
                <div class="aos-container h-full" data-aos="fade-up" data-aos-offset="300">

                  <?php 
                      get_template_part('template-parts/news', 'card', ['client' => $client, 'id' => $ID]);
                  ?>

                </div>
            </div>

          <?php endwhile; ?>
        </div>

        <div id="load-more" class="load-more link mx-auto pt-135 !block !w-fit cursor-pointer">Load More</div>

      <?php endif; ?>
    </div>
  </div>

<?php get_footer(); ?>