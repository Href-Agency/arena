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
<section id="<?php echo $block_id; ?>" class="<?php echo $class_name; ?> my-80 md:my-100 xl:my-127">
    <div class="site-container">
        <?php if ($content): ?>
            <div class="grid md:grid-cols-2 gap-x-40 xl:gap-x-88 gap-y-35 sm:gap-y-60 xl:gap-y-105">
                <?php for ($i = 0; $i < count($content); $i++):

                    if ($content[$i]['acf_fc_layout'] == 'text'):
                        $header = $content[$i]['header'];
                        $copy = $content[$i]['copy'];
                        ?>

                        <div class="text-container">
                            <?php if ($header): ?>
                                <div class="header <?php if ($copy)
                                    echo ' mb-50'; ?>" data-speed="0.98">
                                    <?php echo $header; ?>
                                </div>
                            <?php endif;
                            if ($copy): ?>
                                <div class="wysywig">
                                    <?php echo $copy; ?>
                                </div>
                            <?php endif; ?>
                        </div>

                    <?php elseif ($content[$i]['acf_fc_layout'] == 'image'):
                        $image = $content[$i]['image'];
                        $image_size = $content[$i]['image_size'] ?? 'small';
                        ?>

                        <?php if ($image): ?>
                            <div class="image-container <?php echo $image_size; ?>" <?php if ($image_size == 'small'): ?>
                                    data-speed="1.03" <?php else: ?> data-speed="0.98" <?php endif; ?>>
                                <img src="<?php echo $image['url']; ?>" alt="">
                            </div>
                        <?php endif; ?>
                    <?php 
                        elseif($content[$i]['acf_fc_layout'] == 'video') :
                            $video = $content[$i]['video'];
                            $image_poster = $content[$i]['image_poster'];
                            $size = $content[$i]['size'] ?? 'full'; 
                    ?>
                    <?php if ($video) : ?>
                        <div class="video-container image-container <?php echo $size; ?>" <?php if ($size == 'small'): ?> data-speed="1.03" <?php else : ?> data-speed="0.98" <?php endif; ?>>
                            <video style="width: 100%" src="<?php echo $video; ?>" poster="<?php echo $image_poster['url']; ?>" playsinline="true" controls="true"></video>
                        </div>
                    <?php endif; ?>
                    <?php endif; endfor; ?>
            </div>
        <?php endif; ?>
    </div>
</section>