<?php
/**
 * Block Name: My First Block
 *
 * Description: Displays my very first block.
 */

/**
 * Block object provided by Wordpress
 */
$block = $args['block'] ?? false;

/**
 * Data passed to the block template as an arg and extracted
 * into variables
 */
$data = $args['data'];

$testimonial = $data['testimonial'];
$background_image = $data['background_image'];
$mobile_background_image = $data['mobile_background_image'];

$quote = get_field('quote', $testimonial);
$name = get_field('name', $testimonial);
$job_info = get_field('job_info', $testimonial);
$image = get_field('image', $testimonial);

/**
 * Unique block identifier added to the block
 */
$block_id = $args['block_id'] ?? false;

/**
 * The block class names we passed to the
 * argument for the block
 */
$class_name = $args['class_name'];


if ($block && $block_id && $spacings = $block['ghostkitSpacings']) {
    addGhostKitSpacings($spacings, $block_id);
}

?>

<style>
    #<?php echo $block_id; ?>{
        background-image: url('<?php echo $background_image['url']; ?>');
    }

    @media only screen and (max-width: 768px){
        #<?php echo $block_id; ?>{
            background-image: url('<?php echo $mobile_background_image['url']; ?>');
        }
    }
</style>

<section id="<?php echo $block_id; ?>" class="<?php echo $class_name; ?> bg-cover bg-no-repeat bg-center relative overflow-hidden">

    <div class="background-image absolute w-full h-full left-0 top-0 z-[1]" data-aos="bg-image-fade-in" data-aos-offset="400" data-aos-delay="200">
        <img class="<?php if($mobile_background_image) echo "hidden md:block" ?> w-full h-full object-cover" src="<?php echo $background_image['url']; ?>" alt="">
        <?php if($mobile_background_image): ?>
            <div class="bg-blue-200 opacity-[46%] absolute w-full h-full z-10 left-0 top-0 block md:hidden"></div>
            <img class="block md:hidden w-full h-full object-cover" src="<?php echo $background_image['url']; ?>" alt="">
        <?php endif; ?>
    </div>

    <div class="site-container pt-59 md:pt-90 lg:pt-138 pb-61 md:pb-85 lg:pb-128 relative z-10">
        <div class="testimonial-content text-center text-white flex flex-col items-center justify-center" data-speed="1.05">
            <div class="quote-img" data-aos="fade-up">
                <img src="<?php echo get_template_directory_uri() . '/assets/icons/quote.svg'; ?>" alt="">
            </div>

            <div class="mt-55 sm:mt-45 max-w-[1128px]" data-aos="fade-up"><?php echo $quote; ?></div>
            <h4 class="mt-70 sm:mt-58 !text-20 sm:!text-25 xl:!text-30 font-semibold" data-aos="fade-up"><?php echo $name; ?></h4>
            <span class="font-monaco block text-grey-50 mt-7 sm:mt-12" data-aos="fade-up"><?php echo $job_info; ?></span>
            <img class="mt-26 sm:mt-31 w-61 h-61 sm:w-102 sm:h-102 rounded-full overflow-hidden" src="<?php echo $image['url']; ?>" alt="" data-aos="fade-up">
        </div>
    </div>
</section>