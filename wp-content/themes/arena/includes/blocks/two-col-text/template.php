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
$link = $data['link'];

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

<section id="<?php echo $block_id; ?>" class="<?php echo $class_name; ?>">
    <div class="site-container grid md:grid-cols-2  gap-40 md:gap-60 xl:gap-101">
        <div class="left-column">
            <div class="heading max-w-[650px]">
                <?php echo $header; ?>
            </div>
            <?php if($link):?>
                <a class="link mt-40 !hidden md:!inline-block" href="<?php echo $link['title']; ?>" target="<?php echo $link['target']; ?>"><?php echo $link['title']; ?></a>
            <?php endif; ?>
        </div>

        <div class="right-column">
            <div class="wysywig">
                <?php echo $copy; ?>
            </div>
        </div>
        <?php if($link):?>
            <a class="link md:!hidden !inline-block w-fit" href="<?php echo $link['title']; ?>" target="<?php echo $link['target']; ?>"><?php echo $link['title']; ?></a>
        <?php endif; ?>
    </div>
</section>