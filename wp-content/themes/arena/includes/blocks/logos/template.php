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

$logos = $data['logos'];

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
    <div class="site-container">
        <div class="grid grid-cols-3 sm:grid-cols-4 xl:grid-cols-5 gap-32 lg:gap-50 xl:gap-79 gap-y-37 md:gap-y-59">
            <?php if(have_rows('logos')):
                while(have_rows('logos')) : the_row();
                $logo = get_sub_field('logo');

                $number = rand(1, 3) * 100;
                ?>
                <?php if($logo):?>
                    <div class="image-container" data-aos-delay="<?php echo $number; ?>" data-aos="fade-up">
                        <img class="" src="<?php echo $logo['url']; ?>" alt="<?php echo $logo['alt']; ?>">
                    </div>
                <?php endif; ?>
                <?php endwhile;
            endif; ?>
        </div>
    </div>
</section>