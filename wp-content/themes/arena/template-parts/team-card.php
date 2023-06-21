
<?php
    $ID = $args['id'];

    $email = get_field('email', $ID);
    $job_title = get_field('job_title', $ID);

?>

<div class="flex flex-col h-full">
    <div class="image-container relative">
        <img class=" object-cover w-full" src="<?php echo get_the_post_thumbnail_url($ID); ?>" alt="">
    </div>
    
    <div class="main-information flex-grow my-40">
        <div class="category">
            <span class="font-monaco text-grey-100"><?php echo $job_title; ?></span>
        </div>

        <div class="title flex flex-row justify-between mt-8 items-center">
            <h5 class="max-w-[85%]"><?php echo get_the_title($ID); ?></h5>
            <!-- <div class="arrow ml-10 flex-shrink-0 opacity-0"></div> -->
        </div>
    </div>

    <div class="date text-grey-100 border-t border-grey-100 border-solid pt-11">
        <a class="font-monaco" href="mailto:<?php echo $email; ?>"><?php echo $email; ?></a>
    </div>
</div>