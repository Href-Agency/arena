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

$header = $data['header'];
$copy = $data['copy'];
$increase_width = $data['increase_width'];

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

<!-- Our front-end template -->
<section id="<?php echo $block_id; ?>" class="<?php echo $class_name; ?> pt-150 md:pt-199 xl:pt-[275px] mb-60 md:mb-80 xl:mb-128" >
    <div class="site-container text-center">
        <div class="heading mb-32 max-w-[572px] mx-auto"><?php echo $header; ?></div>
        <div class="wysywig <?php if($increase_width):?> mt-50 lg:mt-93 max-w-[1344px] text-left <?php else: ?> max-w-[990px]<?php endif; ?> mx-auto" data-speed="1.02">
            <?php echo $copy; ?>
        </div>
    </div>
</section>