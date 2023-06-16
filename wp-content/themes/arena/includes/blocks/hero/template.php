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

<section id="<?php echo $block_id; ?>" class="<?php echo $class_name; ?> h-screen w-screen relative overflow-hidden">
    <div class="background absolute w-screen h-screen z-10 scale-100">
        <img class="desktop w-full h-full object-cover <?php if($mobile_background_image) echo "hidden md:block "?>" src="<?php echo $background_image['url']; ?>" alt="">
        <?php if($mobile_background_image):?>
            <img class="desktop w-full h-full object-cover block md:hidden" src="<?php echo $mobile_background_image['url']; ?>" alt="">
        <?php endif; ?>
    </div>
    <div class="site-container flex items-center justify-center text-center h-full relative z-50" data-speed="0.85">
        <div class="text-white max-w-[986px]"><?php echo $text; ?></div>
    </div>

    <a class="anchor-link" anchor-next-section="true"></a>
</section>