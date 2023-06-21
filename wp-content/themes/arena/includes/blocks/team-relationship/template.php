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

$posts = $data['posts'];

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

<section id="<?php echo $block_id; ?>"  class="<?php echo $class_name; ?> mb-95 mt-88 md:mt-156 md:mb-130">
    <div class="site-container">

        <?php if($posts):?>
            <div class="posts grid sm:grid-cols-2 md:grid-cols-3 gap-y-66 md:gap-y-100 xl:gap-y-133 gap-x-20 xl:gap-x-69">
                <?php foreach($posts as $post):
                    
                    get_template_part('template-parts/team', 'card', ['id' => $post->ID]);

                endforeach; ?>
            </div>
        <?php endif; ?>

        <?php if($link):?>
            <a class="link mt-87 ml-auto md:!hidden !inline-block" href="<?php echo $link['url']; ?>" target="<?php echo $link['target']; ?>"><?php echo $link['title']; ?></a>
        <?php endif; ?>
    </div>
</section>