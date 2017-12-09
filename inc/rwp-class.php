<?php
/**
 * RWP Class: The main class of theme
 * 
 * @author   Mateusz Szmytko
 * @since    1.0.0
 * @package  RWP
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

class RWP {
	function __construct() {
		add_action( 'after_setup_theme',          array( $this, 'setup' ) );
		add_action( 'wp_enqueue_scripts',         array( $this, 'scripts' ),       10 );

		// After WooCommerce.
		add_filter( 'body_class',                 array( $this, 'body_classes' ) );

	}

	public function setup() {
		load_theme_textdomain( 'RWP', get_template_directory() . '/languages' );
		add_theme_support( 'automatic-feed-links' );
		add_theme_support( 'title-tag' );
		add_theme_support( 'post-thumbnails' );

		/*
		add_theme_support( 'custom-logo', array(
			'height'      => 500,
			'width'       => 500,
			'flex-width'  => false,
			'flex-height'  => false,
		) );
		*/

		register_nav_menus( array(
			'primary'   => __( 'Primary Menu', 'RWP' ),
		) );

		add_theme_support( 'html5', array(
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
		) );


		add_theme_support( 'customize-selective-refresh-widgets' );
	}

	public function scripts() {
		
		global $gnawdog_version;

		/**
		 * Styles
		 */
		wp_enqueue_style( 'rwp-style', get_template_directory_uri() . '/assets/app.css');
		

		/**
		 * Fonts
		 */
		$google_fonts = apply_filters( 'rwp_google_font_families', array(
			'lato' => 'Lato:300,400,400i,700,700i,900',
			'merriweather' => 'Merriweather:400i',
		) );

		$query_args = array(
			'family' => implode( '|', $google_fonts ),
			'subset' => urlencode( 'latin,latin-ext' ),
		);

		$fonts_url = add_query_arg( $query_args, 'https://fonts.googleapis.com/css' );

		wp_enqueue_style( 'gnawdog-fonts', $fonts_url, array(), null );

		/**
		 * Scripts
		 */
		wp_enqueue_script( 'rwp-script', get_template_directory_uri() . '/assets/app.js', null, '', true);

	}

	public function body_classes( $classes ) {
		// Adds a class of hfeed to non-singular pages.
		$classes[] = 'rwp';

		return $classes;
	}
}

return new RWP();
?>