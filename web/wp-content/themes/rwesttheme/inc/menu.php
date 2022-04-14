<?php

/**
 * Create a Menu in the Template
 *
 * @param  $menu  (string) The name of the menu you want to use.
 *
 * Note: use a custom name to create a new menu. Otherwise use the default main|top|footer|sitemap|mobile
 *
 * @return (array)
 * @author GG
 **/
function rwest_menu($menu='main', $class='') {
    switch($menu) {
        case 'top':
            wp_nav_menu(array(
                'menu' => 'Top Menu', /* menu name */
                'menu_class' => $class,
                'theme_location' => 'top_nav', /* where in the theme it's assigned */
                'container' => '' /* no container */
            ));
        break;
        case 'footer':
            wp_nav_menu(array(
                'menu' => 'Footer Menu', /* menu name */
                'menu_class' => $class,
                'theme_location' => 'footer_links', /* where in the theme it's assigned */
                'container' => '' /* no container */
            ));
        break;
        case 'sitemap':
            wp_nav_menu(array(
                'menu' => 'SiteMap Menu', /* menu name */
                'menu_class' => $class,
                'theme_location' => 'sitemap_nav', /* where in the theme it's assigned */
                'container' => '' /* no container */
            ));
        break;
        case 'mobile':
            wp_nav_menu(array(
                'menu' => 'Mobile Menu', /* menu name */
                'menu_class' => $class,
                'theme_location' => 'mobile_nav', /* where in the theme it's assigned */
                'container' => '' /* no container */
            ));
        break;
        case 'main':
            wp_nav_menu(array(
                'menu' => 'Main Menu', /* menu name */
                'menu_class' => $class,
                'theme_location' => 'main_nav', /* where in the theme it's assigned */
                'container' => '' /* no container */
            ));
        break;
        default:
        	wp_nav_menu(array(
                'menu' => ucwords($menu), /* menu name */
                'menu_class' => $class,
                'theme_location' => $menu.'_nav', /* where in the theme it's assigned */
                'container' => '' /* no container */
            ));
        break;
    }
}
