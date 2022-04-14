<?php
add_action('acf/init', 'rwest_acf_init_block_types');
function rwest_acf_init_block_types() {

    // // Check function exists.
    // rwest_dump(get_parent_theme_file_path());
    // rwest_dump(get_template_directory());
    // rwest_dump(get_template_directory_uri());
    // rwest_dump(get_stylesheet_directory_uri());
    // die;
    if( function_exists('acf_register_block_type') ) {

        // register a block.
        acf_register_block_type(array(
          'name'              => 'gallery_slider',
          'title'             => __('Gallery Slider'),
          'description'       => __('3 column image slider. When clicked the slider will slide to the next 3 images.'),
          'render_template'   => get_template_directory() . '/template-parts/blocks/gallery-slider/gallery-slider.php',
          'enqueue_script'    => get_stylesheet_directory_uri() . '/template-parts/blocks/gallery-slider/gallery-slider.js',
          'enqueue_style'     => get_template_directory_uri() . '/template-parts/blocks/gallery-slider/gallery-slider.css',
          'category'          => 'rwest-blocks',
          'mode'              => 'edit',
          'icon'              => 'columns',
          'keywords'          => array( 'columns', 'gallery', 'blocks','rwest' ),
          'post_types'        => array('post', 'page'),
          'supports'		=> [
            // 'align'			=> false,
            'anchor'		=> true,
            'customClassName'	=> true,
            'jsx' 			=> true,
          ]
        ));
        acf_register_block_type(array(
            'name'              => 'three_columns_content',
            'title'             => __('Three Columns Content'),
            'description'       => __('Three Columns Content block.'),
            'render_template'   => get_template_directory() . '/template-parts/blocks/three-columns-content/three-columns-content.php',
            'enqueue_style'     => get_template_directory_uri() . '/template-parts/blocks/three-columns-content/three-columns-content.css',
            'category'          => 'rwest-blocks',
            'mode'              => 'edit',
            'icon'              => 'columns',
            'keywords'          => array( 'columns', 'content', 'blocks','rwest' ),
            'post_types'        => array('post', 'page'),
            'supports'		=> [
              // 'align'			=> false,
              'anchor'		=> true,
              'customClassName'	=> true,
              // 'jsx' 			=> true,
            ]
        ));
        acf_register_block_type(array(
            'name'              => 'testimonial',
            'title'             => __('Testimonial'),
            'description'       => __('A custom testimonial block.'),
            'render_template'   => get_template_directory() . '/template-parts/blocks/testimonial/testimonial.php',
            'enqueue_style'     => get_template_directory_uri() . '/template-parts/blocks/testimonial/testimonial.css',
            'category'          => 'rwest-blocks',
            'mode'              => 'edit',
            'icon'              => 'format-quote',
            'keywords'          => array( 'testimonial', 'quote', 'blocks','rwest' ),
            'post_types'        => array('post', 'page'),
        ));
        acf_register_block_type(array(
            'name'              => 'media_with_content',
            'title'             => __('Media with Content'),
            'description'       => __('A horizontal block with image and text.'),
            'render_template'   => get_template_directory() . '/template-parts/blocks/media-with-content/media-with-content.php',
            'enqueue_style'     => get_template_directory_uri() . '/template-parts/blocks/media-with-content/media-with-content.css',
            'category'          => 'rwest-blocks',
            'mode'              => 'edit',
            'icon'              => 'buddicons-activity',
            'keywords'          => array( 'media', 'content', 'blocks', 'rwest' ),
            'post_types'        => array('post', 'page'),
        ));
        acf_register_block_type(array(
            'name'              => 'cta_with_content',
            'title'             => __('Two Column CTA with Content'),
            'description'       => __('A horizontal block with image, text and a CTA.'),
            'render_template'   => get_template_directory() . '/template-parts/blocks/cta-with-content/cta-with-content.php',
            'enqueue_style'     => get_template_directory_uri() . '/template-parts/blocks/cta-with-content/cta-with-content.css',
            'category'          => 'rwest-blocks',
            'mode'              => 'edit',
            'icon'              => 'buddicons-activity',
            'keywords'          => array( 'cta', 'content', 'blocks', 'rwest' ),
            'post_types'        => array('post', 'page'),
            'supports'		=> [
              'anchor'		=> true,
              'customClassName'	=> true,
            ]
        ));
        acf_register_block_type(array(
          'name'              => 'hero',
          'title'             => __('Hero'),
          'description'       => __('Hero block with text and background image.'),
          'render_template'   => get_template_directory() . '/template-parts/blocks/hero/hero.php',
          'enqueue_style'     => get_template_directory_uri() . '/template-parts/blocks/hero/hero.css',
          'category'          => 'rwest-blocks',
          'mode'              => 'edit',
          'icon'              => 'buddicons-activity',
          'keywords'          => array( 'hero', 'blocks', 'rwest' ),
          'post_types'        => array('post', 'page'),
        ));
        acf_register_block_type(array(
          'name'              => 'content_with_image_slider',
          'title'             => __('Content with Image Slider'),
          'description'       => __('An image slider block with optional background image setting.'),
          'render_template'   => get_template_directory() . '/template-parts/blocks/content-with-image-slider/content-with-image-slider.php',
          'enqueue_script'    => get_stylesheet_directory_uri() . '/template-parts/blocks/content-with-image-slider/content-with-image-slider.js',
          'enqueue_style'     => get_template_directory_uri() . '/template-parts/blocks/content-with-image-slider/content-with-image-slider.css',
          'category'          => 'rwest-blocks',
          'mode'              => 'edit',
          'icon'              => 'buddicons-activity',
          'keywords'          => array( 'content', 'slider', 'blocks', 'rwest' ),
          'post_types'        => array('post', 'page'),
        ));
        acf_register_block_type(array(
          'name'              => 'single_column_content_with_bg',
          'title'             => __('Single Column Content with Background Image'),
          'description'       => __('A block with a background image and text and CTA in 1 column length on the left side.'),
          'render_template'   => get_template_directory() . '/template-parts/blocks/single-column-content-with-bg/single-column-content-with-bg.php',
          'enqueue_style'     => get_template_directory_uri() . '/template-parts/blocks//single-column-content-with-bg//single-column-content-with-bg.css',
          'category'          => 'rwest-blocks',
          'mode'              => 'edit',
          'icon'              => 'buddicons-activity',
          'keywords'          => array( 'content', 'single', 'one', 'column', 'blocks', 'rwest' ),
          'post_types'        => array('post', 'page'),
        ));
        acf_register_block_type(array(
          'name'              => 'grid',
          'title'             => __('Grid'),
          'description'       => __('Grid layout of content blocks with thumbnail and title text.'),
          'render_template'   => get_template_directory() . '/template-parts/blocks/grid/grid.php',
          'enqueue_style'     => get_template_directory_uri() . '/template-parts/blocks/grid/grid.css',
          'category'          => 'rwest-blocks',
          'mode'              => 'edit',
          'icon'              => 'buddicons-activity',
          'keywords'          => array( 'grid', 'blocks', 'rwest' ),
          'post_types'        => array('post', 'page'),
        ));
        // This was a block specific to 1ks. could be useful but needs to be fleshed out
        // acf_register_block_type(array(
        //   'name'              => 'grid_multi_column',
        //   'title'             => __('Grid Mutli Column'),
        //   'description'       => __('Grid layout of cards.'),
        //   'render_template'   => get_template_directory() . '/template-parts/blocks/grid-multi-column/grid-multi-column.php',
        //   'enqueue_style'     => get_template_directory_uri() . '/template-parts/blocks/grid-multi-column/grid-multi-column.css',
        //   'category'          => 'rwest-blocks',
        //   'mode'              => 'edit',
        //   'icon'              => 'buddicons-activity',
        //   'keywords'          => array( 'grid', 'blocks', 'rwest' ),
        //   'post_types'        => array('post', 'page'),
        // ));
        acf_register_block_type(array(
          'name'              => 'hero_slider',
          'title'             => __('Hero Slider'),
          'description'       => __('Hero block with slider and CTA option.'),
          'render_template'   => get_template_directory() . '/template-parts/blocks/hero-slider/hero-slider.php',
          'enqueue_script'    => get_stylesheet_directory_uri() . '/template-parts/blocks/hero-slider/hero-slider.js',
          'enqueue_style'     => get_template_directory_uri() . '/template-parts/blocks/hero-slider/hero-slider.css',
          'category'          => 'rwest-blocks',
          'mode'              => 'edit',
          'icon'              => 'buddicons-activity',
          'keywords'          => array( 'hero', 'slider', 'blocks', 'rwest' ),
          'post_types'        => array('post', 'page'),
        ));
        acf_register_block_type(array(
          'name'              => 'large_image_with_text',
          'title'             => __('Large Image with Text'),
          'description'       => __('Full width block with background image and text.'),
          'render_template'   => get_template_directory() . '/template-parts/blocks/large-image-with-text/large-image-with-text.php',
          'enqueue_style'     => get_template_directory_uri() . '/template-parts/blocks/large-image-with-text/large-image-with-text.css',
          'category'          => 'rwest-blocks',
          'mode'              => 'edit',
          'icon'              => 'buddicons-activity',
          'keywords'          => array( 'Image', 'blocks', 'rwest' ),
          'post_types'        => array('post', 'page'),
        ));
        acf_register_block_type(array(
          'name'              => 'featured_post',
          'title'             => __('Featured post'),
          'description'       => __('A block featuring a blog post with featured image, time stamp, title, description, and CTA.'),
          'render_template'   => get_template_directory() . '/template-parts/blocks/featured-post/featured-post.php',
          'enqueue_style'     => get_template_directory_uri() . '/template-parts/blocks/featured-post/featured-post.css',
          'category'          => 'rwest-blocks',
          'mode'              => 'edit',
          'icon'              => 'buddicons-activity',
          'keywords'          => array( 'featured', 'post', 'blocks', 'rwest' ),
          'post_types'        => array('post', 'page'),
        ));
        acf_register_block_type(array(
          'name'              => 'tabs',
          'title'             => __('Tabs'),
          'description'       => __('A tabs block with icon options for each tab, media, and content.'),
          'render_template'   => get_template_directory() . '/template-parts/blocks/tabs/tabs.php',
          'enqueue_script'    => get_stylesheet_directory_uri() . '/template-parts/blocks/tabs/tabs.js',
          'enqueue_style'     => get_template_directory_uri() . '/template-parts/blocks/tabs/tabs.css',
          'category'          => 'rwest-blocks',
          'mode'              => 'edit',
          'icon'              => 'buddicons-activity',
          'keywords'          => array( 'tabs', 'blocks', 'rwest' ),
          'post_types'        => array('post', 'page'),
        ));
        // acf_register_block_type(array(
        //   'name'              => 'instagram_feed',
        //   'title'             => __('Instagram Feed'),
        //   'description'       => __('A block to add the 1000 Stories Instagram link.'),
        //   'render_template'   => get_template_directory() . '/template-parts/blocks/instagram-feed/instagram-feed.php',
        //   'enqueue_style'     => get_template_directory_uri() . '/template-parts/blocks/instagram-feed/instagram-feed.css',
        //   'category'          => 'rwest-blocks',
        //   'mode'              => 'edit',
        //   'icon'              => 'buddicons-activity',
        //   'keywords'          => array( 'instagram', 'blocks', 'rwest' ),
        //   'post_types'        => array('post', 'page'),
        // ));
        acf_register_block_type(array(
          'name'              => 'download',
          'title'             => __('Download'),
          'description'       => __('A block to allow for users to download a file of your choosing.'),
          'render_template'   => get_template_directory() . '/template-parts/blocks/download/download.php',
          'enqueue_style'     => get_template_directory_uri() . '/template-parts/blocks/download/download.css',
          'category'          => 'rwest-blocks',
          'mode'              => 'edit',
          'icon'              => 'buddicons-activity',
          'keywords'          => array( 'download', 'blocks', 'rwest' ),
          'post_types'        => array('post', 'page'),
        ));
        acf_register_block_type(array(
          'name'              => 'two_column_with_divider',
          'title'             => __('Two Column Content with Divider'),
          'description'       => __(' Two wsiwygs divided by a line down the middle.'),
          'render_template'   => get_template_directory() . '/template-parts/blocks/two-col-with-divider/two-col-with-divider.php',
          'enqueue_style'     => get_template_directory_uri() . '/template-parts/blocks/two-col-with-divider/two-col-with-divider.css',
          'category'          => 'rwest-blocks',
          'mode'              => 'edit',
          'icon'              => 'buddicons-activity',
          'keywords'          => array( 'item','single','two columns' ,'blocks', 'rwest' ),
          'post_types'        => array('post', 'page'),
        ));
        //this maybe a per site basis block going to leave it commented out for now
        // acf_register_block_type(array(
        //   'name'              => 'two_col_featured_item',
        //   'title'             => __('Two Column Featured Item'),
        //   'description'       => __('A two column block that you can choose which item to feature in a grid layout.'),
        //   'render_template'   => get_template_directory() . '/template-parts/blocks/two-col-featured-item/two-col-featured-item.php',
        //   'enqueue_style'     => get_template_directory_uri() . '/template-parts/blocks/two-col-featured-item/two-col-featured-item.css',
        //   'category'          => 'rwest-blocks',
        //   'mode'              => 'edit',
        //   'icon'              => 'buddicons-activity',
        //   'keywords'          => array( 'single','two columns' ,'blocks', 'rwest', 'related' ),
        //   'post_types'        => array('post', 'page'),
        // ));
        // acf_register_block_type(array(
        //   'name'              => 'single-post-hero',
        //   'title'             => __('Blog Post Hero'),
        //   'description'       => __('A hero block to be used on blog post pages.'),
        //   'render_template'   => get_template_directory() . '/template-parts/blocks/single-post-hero/single-post-hero.php',
        //   'enqueue_style'     => get_template_directory_uri() . '/template-parts/blocks/single-post-hero/single-post-hero.css',
        //   'category'          => 'rwest-blocks',
        //   'mode'              => 'edit',
        //   'icon'              => 'buddicons-activity',
        //   'keywords'          => array( 'hero', 'blog', 'post', 'blocks', 'rwest' ),
        //   'post_types'        => array('post'),
        // ));
        acf_register_block_type(array(
          'name'              => 'single-post-content',
          'title'             => __('Single Post Content'),
          'description'       => __('The block used for blog post content.'),
          'render_template'   => get_template_directory() . '/template-parts/blocks/single-post-content/single-post-content.php',
          'enqueue_style'     => get_template_directory_uri() . '/template-parts/blocks/single-post-content/single-post-content.css',
          'category'          => 'rwest-blocks',
          'mode'              => 'preview',
          'icon'              => 'buddicons-activity',
          'keywords'          => array( 'single', 'content','blocks', 'rwest' ),
          'post_types'        => array('post'),
          'supports'		=> [
            'align'			=> false,
            'anchor'		=> true,
            'customClassName'	=> true,
            'jsx' 			=> true,
          ]
        ));
        acf_register_block_type(array(
          'name'              => 'Single Column Content',
          'title'             => __('Single Column Content'),
          'description'       => __('A single column of content with options to add CTA and background.'),
          'render_template'   => get_template_directory() . '/template-parts/blocks/single-column-content/single-column-content.php',
          'enqueue_style'     => get_template_directory_uri() . '/template-parts/blocks/single-column-content/single-column-content.css',
          'category'          => 'rwest-blocks',
          'mode'              => 'edit',
          'icon'              => 'buddicons-activity',
          'keywords'          => array( 'single', 'blocks', 'rwest', 'column', 'content' ),
          'post_types'        => array('post', 'page'),
        ));
    }
}
