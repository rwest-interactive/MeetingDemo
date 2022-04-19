<?php

/**
 * dynamic icons
 */
require get_template_directory() . '/inc/acf_icons.php';
/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Rwest Functions
 */
require get_template_directory() . '/inc/rwest-functions.php';

/**
 * Menu Walker
 */
require get_template_directory() . '/inc/menu-walker.php';

/**
 * Menu
 */
require get_template_directory() . '/inc/menu.php';

/**
 * Blocks
 */
require get_template_directory() . '/inc/blocks.php';

/**
 * Instagram Feed
 */
// require get_template_directory() . '/inc/instagram-feed.php';

/**
 * Batch Finder Form Submit
 */
// require get_template_directory() . '/inc/batch-form.php';



/**
 * Add Theme Support
 */
add_theme_support( 'post-thumbnails' );

// /**
//  * Register Image Sizes
//  */
// //TODO
// // we should create a way to add the image sizes on a per block basis. the adaptiveImage funciton below is very interesting
add_image_size('grid-multi-column-block', 268, 441, true);
add_image_size('medium-large', 720, 720, false);
add_image_size('extra-large', 2880, 2880, false);


/**
 * Add ACF Options Page
 */
if( function_exists('acf_add_options_page') ) {
    acf_add_options_page();
}



/**
 * Enqueue Styles & Scripts
 */
function rwest_load_scripts($hook) {
    wp_register_script( 'rwest-main-js', get_template_directory_uri() . '/build/main.js', array( 'jquery' ), filemtime( get_parent_theme_file_path().'/build/main.js' ) ,true );
    wp_enqueue_script( 'rwest-main-js' );
    wp_enqueue_style( 'rwest-main-css', get_template_directory_uri() . '/build/main.css', false, filemtime(get_parent_theme_file_path() . '/build/main.css') );
}
add_action('wp_enqueue_scripts', 'rwest_load_scripts');

/**
 * Admin Enqueue Styles & Scripts
 */
function rwest_enqueue_in_admin() {
    $current_screen = get_current_screen();
    wp_register_script( 'rwest-main-js', get_template_directory_uri() . '/build/main.js', array( 'jquery' ), filemtime( get_parent_theme_file_path().'/build/main.js' ) ,true );
    wp_enqueue_script( 'rwest-main-js' );
    wp_enqueue_style( 'rwest-editor-css', get_template_directory_uri() . '/build/editor.css', false, filemtime(get_parent_theme_file_path() . '/build/editor.css') );
}
add_action( 'admin_enqueue_scripts', 'rwest_enqueue_in_admin' );


//TODO
// what is wpb? should we change this to rwest
function wpb_hidetitle_class($classes) {
  // if ( is_single() || is_page() ) :
    $classes[] = 'hide-title';
    return $classes;
  // endif;
// return $classes;
}
add_filter('post_class', 'wpb_hidetitle_class');


//TODO
// 'xxx'=archive placeholder, rename or delete function as needed
add_action( 'pre_get_posts', 'rwest_pre_get_post' );
// Show all Projects on Projects Archive Page
function rwest_pre_get_post( $query ) {
    if ( !is_admin() && $query->is_main_query() && is_post_type_archive( 'xxx' ) ) {
            $query->set( 'posts_per_page', '-1' );
    }
}

// function rwest_more_post_ajax(){

//     $ppp = (isset($_POST["ppp"])) ? $_POST["ppp"] : 9;
//     $page = (isset($_POST['pageNumber'])) ? $_POST['pageNumber'] : 0;

//     header("Content-Type: text/html");

//     $args = array(
//         'suppress_filters' => true,
//         'post_type' => 'post',
//         'posts_per_page' => $ppp,
//         'paged'    => $page,
//     );

//     $loop = new WP_Query($args);

//     $out = '';

//     if ($loop -> have_posts()) :  while ($loop -> have_posts()) : $loop -> the_post();

//         $out .= get_template_part( 'template-parts/content', 'blog-grid-item' );

//     endwhile;
//     endif;
//     wp_reset_postdata();
//     die($out);
// }

// add_action('wp_ajax_nopriv_rwest_more_post_ajax', 'rwest_more_post_ajax');
// add_action('wp_ajax_rwest_more_post_ajax', 'rwest_more_post_ajax');


//TODO
// need to research why we are trying to change the YOAST plugin. probably fine though
// need to make sure we are using it in the right way. does not look like it is wrapped in a conditional to check if the yoast plugin even exist.
// shove YOAST settings panel in editor to bottom
// add_filter( 'wpseo_metabox_prio', function() { return 'low'; } );
// add_filter('wpseo_metabox_prio', function () {
//     return 'low';
// });

//TODO
// research <picture> tag, how usable it is, how it works.
/**
 * Create Adaptive Image
 *
 * @desc Create an adaptive image. Use a default WP image object or use a custom image object that includes a set of image sizes
 * @param $image_object object The Default WordPress Image Object
 * @param $is_custom bool If true, use a custom $image_object instead
 *
 * @return echo The HTML picture object
 */
function adaptiveImage($image_object, $is_custom=false)
{
    if($is_custom) {
        $picture = '<picture>';

        foreach ($image_object as $key => $value) {

            if($key != 'default' && $key != 'alt') {
                $picture .= '<source media="(max-width: ' . $key . 'px)" srcset="' . $value . '">';
            } else {
                // $picture .= '<img src="'. $value .'" alt="'. $image_object['alt'].'">';
            }
        }

        $picture .= '<img src="'.$image_object['default']. '" alt="' . $image_object['alt'] . '">';
        $picture .= '</picture>';
    } else {
        $picture = '
            <picture>
                <source media="(max-width: 400px)" srcset="' . $image_object['sizes']['medium'] . '">
                <source media="(max-width: 640px)" srcset="' . $image_object['sizes']['medium-large'] . '">
                <source media="(max-width: 720px)" srcset="' . $image_object['sizes']['medium-large'] . ', '.$image_object['sizes']['large'].' 2x">
                <source media="(max-width: 1440px)" srcset="' . $image_object['sizes']['large'] . ', ' . $image_object['sizes']['extra-large'] . ' 2x">
                <img src="' . $image_object['sizes']['extra-large'] . '" alt="' . $image_object['alt'] . '">
            </picture>';
    }

    echo $picture;
}



//TODO
// need to see what this and the newsletter one do
/* Plugin Name: Simple Block Type Search
 * Plugin URI: https://wordpress.stackexchange.com/a/392175/26350
 */
// add_action( 'restrict_manage_posts', 'simple_block_type_search', 10, 2 );

// function simple_block_type_search ( $post_type, $which ) {
//     if ( ! use_block_editor_for_post_type ( $post_type ) ) {
//         return;
//     }
//     $block_types = \WP_Block_Type_Registry::get_instance()->get_all_registered();
//     $options = array_reduce( $block_types, function( $options, $block_type ) {
//         $val = '!-- wp:' . str_replace( 'core/', '', $block_type->name ) . ' ';
//         return $options . sprintf ( '<option value="%s" %s>%s</option>',
//             esc_attr( $val ),
//             selected( get_query_var( 's' ), $val, false ),
//             esc_html( $block_type->name )
//         );
//     }, '' );
//     printf ( '<select name="s"><option value="">%s</option>%s</select>
//               <input type="hidden" name="sentence" value="1"/>',
//          esc_html__( 'Block Type Search', 'simple_block_type_search' ),
//          $options
//     );
// }


/**
 * Hide Newsletter Popup If the user already subscribed
 *
 * @desc Hide Newsletter Popup If the user already subscribed
 *
 */
// add_action( 'gform_confirmation_2', 'setNewsletterPopupCookie', 10, 2 );

// function setNewsletterPopupCookie( $entry, $form ) {
//     setcookie( 'oneks_exit_popup', 'hide_popup', time()+60*60*24*30, '/');
// }
add_action( 'restrict_manage_posts', 'simple_block_type_search', 10, 2 );

function simple_block_type_search ( $post_type, $which ) {
    if ( ! use_block_editor_for_post_type ( $post_type ) ) {
        return;
    }
    $block_types = \WP_Block_Type_Registry::get_instance()->get_all_registered();
    $options = array_reduce( $block_types, function( $options, $block_type ) {
        $val = '!-- wp:' . str_replace( 'core/', '', $block_type->name ) . ' ';
        return $options . sprintf ( '<option value="%s" %s>%s</option>',
            esc_attr( $val ),
            selected( get_query_var( 's' ), $val, false ),
            esc_html( $block_type->name )
        );
    }, '' );
    printf ( '<select name="s"><option value="">%s</option>%s</select>
              <input type="hidden" name="sentence" value="1"/>',
         esc_html__( 'Block Type Search', 'simple_block_type_search' ),
         $options
    );
}
