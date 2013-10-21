<?php
/*
Plugin Name: which template file
Description: Show which php file of your theme is used to display the current page in your front office.
Version: 1.0.
Author: Gilles Dumas
Author URI: http://gillesdumas.com
*/




add_filter('template_include', 'my_template_include', 999);
function my_template_include($template) {
    if (is_admin()) return;
    define('_GWP_MY_TEMPLATE_FILE', ltrim(strrchr($template, '/'), '/'));
    return $template;
}

add_filter('admin_bar_menu', 'my_admin_bar_menu', 999);
function my_admin_bar_menu($template) {
    if (is_admin()) return;
    global $wp_admin_bar;
    $wp_admin_bar->add_menu(
        array(
            'id'      => '_gwp_my_template_file',
            'title'   => '<span style="color:gold;">Template file : '._GWP_MY_TEMPLATE_FILE.'</span>',
        )
    );
}



