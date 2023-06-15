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

$projects = $data['projects'];
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

if(!$projects){
    $args = array(
        'post_type'      => 'projects',        
        'posts_per_page' => 4,                 
        'orderby'        => 'date',          
        'order'          => 'DESC',           
    );
    
    $projects = new WP_Query( $args );
    $projects = $projects->posts;
}

?>


<section id="<?php echo $block_id; ?>"  class="<?php echo $class_name; ?>">
    <div class="site-container flex flex-col">
        <div class="grid md:grid-cols-2 gap-x-50 xl:gap-x-90 gap-40 md:gap-y-60 xl:gap-y-101">
            <?php foreach($projects as $project):
                $ID = $project->ID;
                $client = get_field('client', $ID);

                $randomNumber = rand(1, 5) / 100;
                ?>

                <div class="single-project-container overflow-hidden block">
                    <div class="aos-container" data-aos="custom-up" data-aos-offset="300">

                        <?php 
                            get_template_part('template-parts/project', 'card', ['client' => $client, 'id' => $ID]);
                        ?>

                    </div>
                </div>

            <?php endforeach; ?>
        </div>

        <?php if($link):?>
            <a class="link mt-80 ml-auto !hidden sm:!inline-block" href="<?php echo $link['title']; ?>" target="<?php echo $link['target']; ?>"><?php echo $link['title']; ?></a>
        <?php endif; ?>
    </div>
</section>