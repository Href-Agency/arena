
<?php
    $client = $args['client'];
    $ID = $args['id']
?>

<a href="<?php echo get_the_permalink($ID); ?>" class="single-project">
    <div class="image-container relative">
        <img class=" object-cover w-full" src="<?php echo get_the_post_thumbnail_url($ID); ?>" alt="">
    </div>

    <div class="title flex flex-row justify-between mt-16 md:mt-27 items-center">
        <h5 class="max-w-[85%]"><?php echo get_the_title($ID); ?></h5>
        <div class="arrow ml-10 flex-shrink-0 opacity-0"></div>
    </div>

    <?php if($client):?>
        <span class="mt-11 sm:mt-23 font-monaco block text-grey-100"><?php echo $client; ?></span>
    <?php endif; ?>
</a>