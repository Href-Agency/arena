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

$gallery = $data['gallery'];

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
<section id="<?php echo $block_id; ?>" class="<?php echo $class_name; ?> bg-blue-200 py-90 md:py-100 xl:py-123 overflow-hidden">
    <div class="gallery-container">
        <div class="swiper-wrapper items-stretch">
            <?php if($gallery):
                for($i = 0; $i < count($gallery); $i++):
                    $image = $gallery[$i]['image'];

                    if($image):
                ?>
                <div class="swiper-slide !w-fit flex items-center justify-center !h-[unset] mr-50 sm:mr-70 md:mr-100 xl:mr-160">
                    <img src="<?php echo $image['url']; ?>" alt="">
                </div>

                <?php endif; endfor;
            endif; ?>
        </div>
    </div>
</section>