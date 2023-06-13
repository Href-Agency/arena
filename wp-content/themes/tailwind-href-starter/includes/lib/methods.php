<?php
/**
 * On post types & 404 pages by default, the menu item for your blog
 * index would have a "current_page_parent" class, this removes that
 * to prevent user confusion.
 *
 * Add your custom post type keys to the array to activate this.
 */
function fix_blog_menu_css_class($classes, $item) {
  $post_types = ['custom_post_type'];
  $page_for_posts = get_option('page_for_posts');

  if (is_singular($post_types) || is_post_type_archive($post_types) || is_404()) {
    if ($item->object_id == $page_for_posts) {
      $key = array_search('current_page_parent', $classes);

      if (false !== $key) {
        unset($classes[$key]);
      }
    }
  }

  return $classes;
}

/**
 * Add the format dropdown to the WYSIWYG.
 */
function wysiwyg_add_formats_select($buttons) {
  array_unshift($buttons, 'styleselect');

  return $buttons;
}

/**
 * Allow us to add elements with classes to the format select on the WYSIWYG.
 * This can be easier than remembering shortcodes for custom classes.
 */
function wysiwyg_custom_formats($formats) {
  $custom_formats = [
    [
      'title' => 'Small',
      'block' => 'small',
      'classes' => '',
      'wrapper' => true
    ]
  ];

  $formats['style_formats'] = json_encode($custom_formats);

  return $formats;
}

/**
 * Update the "excerpt_length" value.
 */
function new_excerpt_length($length) {
  return 32;
}

/**
 * Update the "excerpt_more" value.
 */
function new_excerpt_more($more) {
  return '...';
}

/**
 * Ensures the Yoast SEO metabox is at the bottom of the page.
 */
function change_seo_metabox_priority() {
  return 'low';
}

/**
 * Neatly "print_r" an array for better debugging.
 * Can also use "var_dump" by setting "$dump" to true. 
 */
function print_a($array, $dump = false) {
  echo '<pre style="box-sizing: border-box; width: 100%; padding: 3%; background: #444; color: #F2F2F2;">';
 
  if ($dump) {
    var_dump($array);
  } else {
    print_r($array);
  }

  echo '</pre>';
}

/**
 * Return a placeholder image at a specified width / height.
 * Can also customise the background colour/text colour.
 */
function placeholder($width = 300, $height = 300, $bg = '273640', $colour = 'fff') {
  return '<img class="placeholder" src="http://placehold.it/' . $width . 'x' . $height . '/' . $bg . '/' . $colour . '/" alt="Placeholder" width="' . $width . '" height="' . $height . '"/>';
}

/**
 * Apply some styles to the head to ensure the 
 * Gutenburg layout has more space.
 */
function editor_full_width_gutenberg() {
	echo "
		<style>
			body.gutenberg-editor-page .editor-post-title__block,
			body.gutenberg-editor-page .editor-default-block-appender,
			body.gutenberg-editor-page .editor-block-list__block,
			.block-editor__container .wp-block {
				max-width: 90% !important;
			}
		</style>
	";
}

/**
 * Example of a custom action to use via admin AJAX.
 * 
 * function example_admin_ajax() {
 *   echo "working!";
 *   die();
 * }
 */


/**
 * Returns a formatted link from a supplied ACF link field.
*/
function acf_link($link = null, $classes = []) {
  if (!$link) return;

  if (!$link['target']) $link['target'] = '_self';

  $classes = (is_array($classes) && !empty($classes)) ? implode(' ', $classes) : $classes;
  $class_str = ($classes) ? ' class="' . $classes . '"' : '';

  return "
    <a href='{$link['url']}' target='{$link['target']}'${class_str}>{$link['title']}</a>
  ";
}

function acf_img($image = null, $classes = []) {
  if (!$image) return;


  $classes = (is_array($classes) && !empty($classes)) ? implode(' ', $classes) : $classes;
  $class_str = ($classes) ? ' class="' . $classes . '"' : '';

  return "
    <img href='{$image['url']}' target='{$image['alt']}'${class_str}>
  ";
}

function list_categories($cats):array {
    if (!$cats) :
        return false;
    else :
        $list = [];
        foreach ($cats as $cat) {
            array_push($list, $cat->name);
        }
        return $list;
    endif;
}


/**
 * Takes  ghostkit spacings and a block ID, 
 * creates the style tag for each breakpoint and
 * prints it via the Output Buffer
 * 
 * Doesn't return anything
 *
 * @param  array $spacings - Array of spacings from GhostKit
 * @param  mixed $block_id
 * @return void
 */
function addGhostKitSpacings($spacings, $block_id) {

    $spacings_array = [
      '50px' => [],
      '576px' => [],
      '768px' => [],
      '992px' => [],
      '1200px' => [],
    ];
  
    foreach($spacings as $key => $spacing) {
        
      /**
       * Set alla da margins to deez fault
       */
    
      if (in_array($key, ["media_xl", "media_lg", "media_md", "media_sm"])) {
        $spacing['marginLeft'] = $spacing['marginLeft'] ?? 0;
        $spacing['marginTop'] = $spacing['marginTop'] ?? 0;
        $spacing['marginRight'] = $spacing['marginRight'] ?? 0;
        $spacing['marginBottom'] = $spacing['marginBottom'] ?? 0;

        $spacing['paddingLeft'] = $spacing['paddingLeft'] ?? 0;
        $spacing['paddingTop'] = $spacing['paddingTop'] ?? 0;
        $spacing['paddingRight'] = $spacing['paddingRight'] ?? 0;
        $spacing['paddingBottom'] = $spacing['paddingBottom'] ?? 0;
      }

      switch($key) {
        case($key == "media_xl"):
          $spacings_array['1200px'] = [
            'margin' => "{$spacing['marginTop']}px {$spacing['marginRight']}px {$spacing['marginBottom']}px {$spacing['marginLeft']}px",
            'padding' => "{$spacing['paddingTop']}px {$spacing['paddingRight']}px {$spacing['paddingBottom']}px {$spacing['paddingLeft']}px"
          ];
          break;
        case("media_lg"):
          $spacings_array['992px'] = [
            'margin' => "{$spacing['marginTop']}px {$spacing['marginRight']}px {$spacing['marginBottom']}px {$spacing['marginLeft']}px",
            'padding' => "{$spacing['paddingTop']}px {$spacing['paddingRight']}px {$spacing['paddingBottom']}px {$spacing['paddingLeft']}px"
          ];
          break;
          case("media_md"):
            $spacings_array['768px'] = [
              'margin' => "{$spacing['marginTop']}px {$spacing['marginRight']}px {$spacing['marginBottom']}px {$spacing['marginLeft']}px",
              'padding' => "{$spacing['paddingTop']}px {$spacing['paddingRight']}px {$spacing['paddingBottom']}px {$spacing['paddingLeft']}px"
            ];
            break;
          case("media_sm"):
            $spacings_array['576px'] = [
              'margin' => "{$spacing['marginTop']}px {$spacing['marginRight']}px {$spacing['marginBottom']}px {$spacing['marginLeft']}px",
              'padding' => "{$spacing['paddingTop']}px {$spacing['paddingRight']}px {$spacing['paddingBottom']}px {$spacing['paddingLeft']}px"
            ];
            break;
        default:
          /**
           * Set alla da margins to deez fault
           */
          $spacings['marginLeft'] = $spacings['marginLeft'] ?? 0;
          $spacings['marginTop'] = $spacings['marginTop'] ?? 0;
          $spacings['marginRight'] = $spacings['marginRight'] ?? 0;
          $spacings['marginBottom'] = $spacings['marginBottom'] ?? 0;

          $spacings['paddingLeft'] = $spacings['paddingLeft'] ?? 0;
          $spacings['paddingTop'] = $spacings['paddingTop'] ?? 0;
          $spacings['paddingRight'] = $spacings['paddingRight'] ?? 0;
          $spacings['paddingBottom'] = $spacings['paddingBottom'] ?? 0;

          $spacings_array['50px'] = [
            'margin' => "{$spacings['marginTop']}px {$spacings['marginRight']}px {$spacings['marginBottom']}px {$spacings['marginLeft']}px",
            'padding' => "{$spacings['paddingTop']}px {$spacings['paddingRight']}px {$spacings['paddingBottom']}px {$spacings['paddingLeft']}px"
          ];
          break;
      }
      
    }

    ob_start(); ?>
      <style>
      <?php 
        foreach($spacings_array as $breakpoint => $values) :
          $margin = $values['margin'];
          $padding = $values['padding']; 
      ?>
      @media only screen and (min-width: <?php echo $breakpoint; ?>) {
        #<?php echo $block_id; ?> {
          margin: <?php echo $margin; ?>;
          padding: <?php echo $padding; ?>
        }
      }
    <?php
      endforeach;
    ?>
    </style>
    <?php
    $ob_contents = ob_get_clean();
    echo $ob_contents;
    return;
}