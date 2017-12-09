<?php
/**
 * RWP functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package RWP
 */

$rwp = (object) array(
	'main'       => require 'inc/rwp-class.php',
	'customizer' => require 'inc/customizer/customizer.php',
);


/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require get_template_directory() . '/inc/template-functions.php';


