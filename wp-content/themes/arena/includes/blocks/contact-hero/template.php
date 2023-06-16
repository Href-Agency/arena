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

$text = $data['text'];
$background_image = $data['background_image'];
$mobile_background_image = $data['mobile_background_image'];
$contact = $data['contact'];

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
    #<?php echo $block_id; ?> {
        background-size: 110%;
    }
</style>

<section id="<?php echo $block_id; ?>" class="<?php echo $class_name; ?> sm:h-[75vh] min-h-[min-content] w-screen relative overflow-hidden hero flex items-center justify-center">
    <div class="background absolute w-screen h-full z-10 scale-100">
        <img class="desktop w-full h-full object-cover <?php if($mobile_background_image) echo "hidden md:block "?>" src="<?php echo $background_image['url']; ?>" alt="">
        <?php if($mobile_background_image):?>
            <img class="desktop w-full h-full object-cover block md:hidden" src="<?php echo $mobile_background_image['url']; ?>" alt="">
        <?php endif; ?>
    </div>
    <div class="site-container flex flex-col lg:flex-row items-start justify-between h-fit relative z-50 text-white pt-120 md:pt-150 pb-120 md:pb-50" data-speed="0.9">
        <div class="text-white max-w-[583px] text-left"><?php echo $text; ?></div>

        <div class="contact-information flex flex-col md:flex-row lg:grid grid-cols-2 gap-y-30 md:gap-x-70 2xl:gap-x-112 md:gap-y-50 mt-50 lg:mt-0">
            <?php if($contact):
                for($i = 0; $i < count($contact); $i++):
                    $heading = $contact[$i]['header'];
                    $copy = $contact[$i]['copy'];
                ?>

                <div class="single-contact">
                    <div class="heading mb-14 sm:mb-24"><?php echo $heading; ?></div>
                    <div class="wysywig !text-white">
                        <?php echo $copy; ?>
                    </div>
                </div>

                <?php endfor;
            endif; ?>
        </div>
    </div>
</section>