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

$content = $data['content'];

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
<section id="<?php echo $block_id; ?>" class="<?php echo $class_name; ?> py-60 sm:py-80 lg:py-100 xl:py-120">
    <div class="site-container">
        <?php if($content): ?>
        <div class="grid sm:grid-cols-2 lg:grid-cols-3 gap-66 md:gap-20 xl:gap-69">
            <?php for($i = 0; $i < count($content); $i++):
            $image = $content[$i]['image'];
            $header = $content[$i]['header'];
            $copy = $content[$i]['copy'];
            ?>

            <div class="grid-column overflow-hidden ">
                <div class="single-column" data-aos="custom-up" data-offset="200">
                    <?php if($image): ?>
                    <div class="image-container mb-32 sm:mb-40 md:mb-67">
                        <img src="<?php echo $image['url']; ?>" alt="">
                    </div>
                    <?php endif; ?>
                    <h5 class="mb-20 md:mb-37"><?php echo $header; ?></h5>
                    <div class="wysywig">
                        <?php echo $copy; ?>
                    </div>
                </div>
            </div>

            <?php endfor; ?>
        </div>
        <?php endif; ?>
    </div>
</section>