
<?php
    $ID = $args['id'];

    $category = get_the_category($ID);
    $date = get_the_date('d/m/Y', $ID);
    $client = get_field('client');

?>

<a href="<?php echo get_the_permalink($ID); ?>" class="single-news flex flex-col h-full">
    <div class="image-container relative">
        <img class=" object-cover w-full" src="<?php echo get_the_post_thumbnail_url($ID); ?>" alt="">
    </div>
    
    <div class="main-information flex-grow my-40">
        <div class="category">
            <span class="font-monaco text-grey-100"><?php echo $category[0]->name; ?></span>
        </div>

        <div class="title flex flex-row justify-between mt-8 items-center">
            <h5 class="sm:max-w-[85%] !text-25 sm:!text-20 xl:!text-26 text-blue-300"><?php echo get_the_title($ID); ?></h5>
            <div class="arrow ml-10 flex-shrink-0 opacity-0"></div>
        </div>
    </div>

    <?php if($client): ?>
        <span class="-mt-11 sm:-mt-23 font-monaco block text-grey-100"><?php echo $client; ?></span>
    <?php else: ?>
        <div class="date text-grey-100 border-t border-grey-100 border-solid pt-11">
            <span class="font-monaco">Posted on <?php echo $date; ?></span>
        </div>
    <?php endif; ?>
</a>