<?php
/**
 * RWP Theme Customizer
 *
 * @package RWP
 */

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */

class RWP_Customizer {
	public function __construct() {
		add_action( 'customize_register', array( $this, 'customize_register' ), 10 );
		add_action( 'customize_preview_init',  array( $this, 'customize_js' ) );
	}

	public function customize_register($wp_customize) {
		$wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
		$wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';
		$wp_customize->get_setting( 'header_textcolor' )->transport = 'postMessage';
		
		if ( isset( $wp_customize->selective_refresh ) ) {
			$wp_customize->selective_refresh->add_partial( 'blogname', array(
				'selector'        => '.site-title a',
				'render_callback' => array($this, 'get_blog_name'),
			) );
			$wp_customize->selective_refresh->add_partial( 'blogdescription', array(
				'selector'        => '.site-description',
				'render_callback' => array($this, 'get_blog_description'),
			) );

		}
	}


	function customize_js() {
		wp_enqueue_script( 'RWP-customizer', get_template_directory_uri() . '/inc/customizer/customizer.js', array( 'customize-preview' ), '20151215', true );
	}

	function get_blog_name() {
		the_custom_logo();
		bloginfo( 'name' );
	}

	function get_blog_description() {
		bloginfo( 'description' );
	}
}

return new RWP_Customizer();