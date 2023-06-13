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
$cta = $data['cta'];
$image = $data['image'];
$reversed_layout = $data['reversed_layout'];

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
<div 
    id="<?php echo $block_id; ?>" 
    class="<?php echo $class_name; ?>"
>
    <div class="site-container flex flex-wrap justify-between items-center gap-50">
        <div class="fifty-fifty-block__left min-w-[300px] flex-1 text-brown-800">
            <?php if ($header) : ?>
                <h3 class="text-55 mb-15">
                    <?php echo $header; ?>
                </h3>
            <?php endif; ?>
            <?php if ($copy) : ?>
            <div class="fifty-fifty-block__content text-16/1.1">
                <?php echo $copy; ?>
            </div>
            <?php endif; ?>
            <?php if ($cta) : ?>
                <?php echo acf_link($cta, 'fifty-fifty-block__cta'); ?>
            <?php endif; ?>                
        </div>   
        <div class="fifty-fifty-block__right flex-1 min-w-[300px]">
            <img style="height: auto; width: 100%;" src="<?php echo $image['url'] ?>" alt="<?php echo $image['alt']; ?>"/>
        </div>
    </div>
</div>