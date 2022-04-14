<?php
/**
 * Add Custom Icons to Acf 
 *
 * 
 *
 * @author KR
 **/

// need to make our icon array global so the acf filter can see it
global $rwest_icons;
$rwest_icons = [];


/**
 * Get Files
 * 
 * @desc Get all file names and return array
 *
 * @param str $path The path of the Icon
 * @return array $files on success / void on failure
 */
function getFiles($path){
    $dh  = opendir($path);
    foreach(glob($path.'/*.svg') as $filename){
        $files[] = $filename;
    }
    if (isset($files)) {
        return $files;
    }
}


// this is where we are keeping the svgs currently KR 9-15-12
$dir = get_template_directory().'/src/icons/';
$it = new RecursiveDirectoryIterator($dir);


// Loop through files
foreach(new RecursiveIteratorIterator($it) as $file) {
    if ($file->getExtension() == 'svg') {
        $icon = str_replace('.svg', '',$file->getFilename());
        $rwest_icons[$icon] = $icon;
    }
}

/**
 * ACF Load Field
 *
 * @desc What does this do Kyle? Document your code.
 * 
 * @param [type] $field
 * @return $field 
 */
function my_acf_load_field( $field ) {
    global $rwest_icons;
    $field['choices'] = $rwest_icons;

    return $field;
}

// These are examples of how to apply to acf fields
// Apply to all fields.
// add_filter('acf/load_field', 'my_acf_load_field');
// Apply to select fields.
// add_filter('acf/load_field/type=select', 'my_acf_load_field');

// Apply to fields named "custom_select".
add_filter('acf/load_field/name=tab_icon', 'my_acf_load_field');