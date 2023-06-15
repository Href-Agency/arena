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
$link = $data['link'];
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

<section id="<?php echo $block_id; ?>"  class="<?php echo $class_name; ?> mb-95 pt-88 md:py-116">
    <div class="site-container">
        <div class="heading-section flex flex-row justify-between items-end mb-58" data-speed="1.03">
            <div class="header">
                <?php echo $header; ?>
            </div>

            
            <?php if($link):?>
                <a class="link !hidden md:!inline-block" href="<?php echo $link['url']; ?>" target="<?php echo $link['target']; ?>"><?php echo $link['title']; ?></a>
            <?php endif; ?>
        </div>

        <?php if($posts):?>
            <div class="posts grid md:grid-cols-3 gap-66 md:gap-20 xl:gap-69">
                <?php foreach($posts as $post):
                    
                    get_template_part('template-parts/news', 'card', ['id' => $post->ID]);

                endforeach; ?>
            </div>
        <?php endif; ?>

        <?php if($link):?>
            <a class="link mt-87 ml-auto md:!hidden !inline-block" href="<?php echo $link['title']; ?>" target="<?php echo $link['target']; ?>"><?php echo $link['title']; ?></a>
        <?php endif; ?>
    </div>
</section>