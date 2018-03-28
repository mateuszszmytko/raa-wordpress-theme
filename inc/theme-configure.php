<?php
/**
 * Functions which enhance the theme by hooking into WordPress
 *
 * @package RWP
 */

function rwp_custom_nav_class( $classes, $item ) {

	//$classes = array("nav__link2");
	foreach ($classes as $key => $class) {
		if(strpos($class, 'menu-item') !== false) {
			unset($classes[$key]);
		}

		switch ($class) {
			case 'menu-item':
				$classes[$key] = 'menu__item';
				break;

			case 'menu-item-has-children':
				$classes[$key] = 'menu__item--has-children';
				break;
			case 'current-menu-item':
				$classes[$key] = 'menu__item--current';
				break;
			case 'current-menu-parent':
				$classes[$key] = 'menu__item--current-parent';
				break;
			case 'menu-item-home':
				$classes[$key] = 'menu__item--home';
				break;
		
			default:
				unset($classes[$key]);
				break;
		}
	}

	return $classes;
}

function rwp_remove_nav_id($id, $item, $args) {
	return "";
}

function my_nav_menu_submenu_css_class( $classes ) {
    $classes = array('menu', 'menu--submenu');
    return $classes;
}

add_filter( 'nav_menu_submenu_css_class', 'my_nav_menu_submenu_css_class' );
add_filter( 'nav_menu_css_class' , 'rwp_custom_nav_class' , 10, 2 );
add_filter('nav_menu_item_id', 'rwp_remove_nav_id', 10, 3);



add_filter( 'get_custom_logo', 'rwp_custom_logo' );
function rwp_custom_logo() {
    $custom_logo_id = get_theme_mod( 'custom_logo' );
    $html = sprintf( '<img src="%1$s" class="logo" alt="'.get_bloginfo().'">',
		wp_get_attachment_image_url( $custom_logo_id, 'full', false)
        );
    return $html;   
} 

if(function_exists ('acf_add_options_page')) {
	acf_add_options_page(array(
		'menu_title'	=> 'Homepage',
		'menu_slug' 	=> 'homepage-settings',
		'position'		=> 4,
		'redirect'		=> true
	));
	
	acf_add_options_sub_page(array(
		'page_title' 	=> 'Slider',
		'menu_title'	=> 'Slider',
		'parent_slug'	=> 'homepage-settings',
		'menu_slug' 	=> 'slider-settings'
	));

}
