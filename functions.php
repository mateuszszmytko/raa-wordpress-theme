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



require get_template_directory() . '/inc/template-tags.php';
require get_template_directory() . '/inc/theme-configure.php';


