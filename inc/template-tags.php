<?php
/**
 * Custom template tags for this theme
 *
 * Eventually, some of the functionality here could be replaced by core features.
 *
 * @package RWP
 */


class WPSE_78121_Sublevel_Walker extends Walker_Nav_Menu
{
    function start_lvl( &$output, $depth = 0, $args = array() ) {
        $indent = str_repeat("\t", $depth);
        $output .= "\n$indent<div class='menu--submenu-wrapper'><ul class='menu--submenu'>\n";
    }
    function end_lvl( &$output, $depth = 0, $args = array() ) {
        $indent = str_repeat("\t", $depth);
        $output .= "$indent</ul></div>\n";
    }
}

function rwp_nav($nav_args) {
	$args = array(
		'container' 			=> 'div',
		'menu_class'			=> 'menu',
		'walker'         => new WPSE_78121_Sublevel_Walker
	);


	if(is_string($nav_args)) {
		$args['theme_location'] = $nav_args;
	} else {
		$args = array_merge($args, $nav_args) ;
	}
	wp_nav_menu( $args );
}

function image($file_dir) {
	return get_template_directory_uri() .'/assets/images/'. $file_dir;
}




