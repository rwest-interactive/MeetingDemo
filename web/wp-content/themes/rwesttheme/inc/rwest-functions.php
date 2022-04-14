<?php

// var dump something, wrapped in <pre>
// @mixed $var (the variable you want var_dumped)
function rwest_dump($var){
    echo '<pre>';
    var_dump($var);
    echo '</pre>';
}


/**
 * Hex to RGBA 
 * 
 * @desc convert a hex color and opacity level into an RGBA value
 * 
 * @param $color (string) Hex value for a color
 * @param $opacity (int) The value for the opacity level of the color
 * 
 * @return $output (string) RGBA color value
 */
function rwest_hex2rgba($color, $opacity = false) {
    $default = 'rgb(0,0,0)';

    //Return default if no color provided
    if(empty($color))
      return $default;

    //Sanitize $color if "#" is provided
    if ($color[0] == '#' ) {
      $color = substr( $color, 1 );
    }

    //Check if color has 6 or 3 characters and get values
    if (strlen($color) == 6) {
        $hex = array( $color[0] . $color[1], $color[2] . $color[3], $color[4] . $color[5] );
    } elseif ( strlen( $color ) == 3 ) {
        $hex = array( $color[0] . $color[0], $color[1] . $color[1], $color[2] . $color[2] );
    } else {
        return $default;
    }

    //Convert hexadec to rgb
    $rgb =  array_map('hexdec', $hex);

    //Check if opacity is set(rgba or rgb)
    if($opacity){
      if(abs($opacity) > 1)
        $opacity = 1.0;
      $output = 'rgba('.implode(",",$rgb).','.$opacity.')';
    } else {
      $output = 'rgb('.implode(",",$rgb).')';
    }

    //Return rgb(a) color string
    return $output;
}
/* Here's a usage example how to use this function for dynamicaly created CSS */
// $setColor =  get_field('final_section_text_background');
// $color = $setColor;
// $rgb = hex2rgba($color);
// $rgba = hex2rgba($color, 0.8);





function rwest_block_categories( $categories, $post ) {
    if ( $post->post_type !== 'post' ) {
        return $categories;
    }
    return array_merge(
        $categories,
        array(
            array(
                'slug' => 'rwest-blocks',
                'title' => __( 'Rwest Blocks', 'rwest' ),
                'icon'  => 'wordpress',
            ),
        )
    );
}
add_filter( 'block_categories', 'rwest_block_categories', 10, 2 );


// add_filter( 'body_class', 'custom_class' );
function custom_class( $classes ) {
    // global $post;
    $b = get_page_template_slug(  );
    rwest_dump($b);
    $template_file = get_post_meta( 783, '_wp_page_template', TRUE );
    rwest_dump($template_file);
    
    return $classes;
}

// function to convert string and print
function rw_convertString($date) {
    // convert date and time to seconds
    // rwest_dump(str_replace('/', '-', $date);
    $timestamp = strtotime(str_replace('/', '-', $date));
    // convert seconds into a specific format
    $date = date("F j", $timestamp);
    // print final date and time
    echo $date;
}
function rw_anotherdateconverter($date, $echo = false) {
    // convert date and time to seconds
    $timestamp = strtotime(str_replace('/', '-', $date));
    $date = date("F j, Y", $timestamp);
    if(!$echo){
        return $date;
    }
    echo $date;
}
function rw_dateconverterforfinder($date) {
    // convert date and time to seconds
    $timestamp = strtotime(str_replace('/', '-', $date));
    $date = date("m-d-y", $timestamp);
    echo $date;
}
function rw_datereturn($date) {
    // convert date and time to seconds
    $timestamp = strtotime(str_replace('/', '-', $date));
    $date = date("m/d/y", $timestamp);
    return $date;
}
function rw_datedataecho($datearr) {
    echo implode(",",$datearr);
}

// Add SVG MIME type support to WP
function rwest_custom_mime_types( $mimes ) {
    // New allowed mime types.
    $mimes['svg']  = 'image/svg+xml';
    $mimes['svgz'] = 'image/svg+xml';
    return $mimes;
}
add_filter( 'upload_mimes', 'rwest_custom_mime_types' );