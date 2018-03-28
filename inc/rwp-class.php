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
		
		add_filter( 'body_class',                 array( $this, 'body_classes' ) );
		add_action( 'widgets_init',               array( $this, 'widgets_init' ) );
	}

	public function setup() {
		load_theme_textdomain( 'RWP', get_template_directory() . '/languages' );
		add_theme_support( 'automatic-feed-links' );
		add_theme_support( 'title-tag' );
		add_theme_support( 'post-thumbnails' );

		
		add_theme_support( 'custom-logo', array() );
		

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

		wp_enqueue_style( 'rwp-fonts', $fonts_url, array(), null );

		/**
		 * Scripts
		 */
		wp_enqueue_script( 'rwp-script', get_template_directory_uri() . '/assets/app.js', null, '', true);

	}

	public function widgets_init() {
		$sidebar_args['banner-1'] = array(
			'name'          => __( 'Banner 1', 'RWP' ),
			'id'            => 'banner-1',
			'description'   => ''
		);

		$sidebar_args['banner-2'] = array(
			'name'        => __( 'Banner 2', 'RWP' ),
			'id'          => 'banner-2',
			'description' => __( '', 'RWP' ),
		);

		$sidebar_args['banner-3'] = array(
			'name'        => __( 'Banner 3', 'RWP' ),
			'id'          => 'banner-3',
			'description' => __( '', 'RWP' ),
		);

		foreach ( $sidebar_args as $sidebar => $args ) {
			$widget_tags = array(
				'before_widget' => '<div id="%1$s" class="widget %2$s">',
				'after_widget'  => '</div>',
				'before_title'  => '<span class="gamma widget-title">',
				'after_title'   => '</span>'
			);

			$filter_hook = sprintf( 'rwp_%s_widget_tags', $sidebar );
			$widget_tags = apply_filters( $filter_hook, $widget_tags );

			if ( is_array( $widget_tags ) ) {
				register_sidebar( $args + $widget_tags );
			}
		}
	}

	public function body_classes( $classes ) {
		// Adds a class of hfeed to non-singular pages.
		$classes[] = 'rwp';

		return $classes;
	}
}

return new RWP();
?>