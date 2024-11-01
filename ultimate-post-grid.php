<?php
	/*
	Plugin Name: Ultimate Post Grid
	Plugin URI: https://github.com/beyond88/ultimate-post-grid
	Description: Ultimate Post Grid is a WordPress plugin. Ultimate Post Grid helps to display post and custom post type with grid system anywhere in the website. Responsive and has strong backend controlly system so user can make changes easily.
	Version: 1.0.0
	Author: Mohiuddin Abdul Kader
	Author URI: https://profiles.wordpress.org/hossain88/
	TextDomain: ultimate-post-grid
	License: copyright@domain.com
	*/

	if( !defined( 'ABSPATH' ) ){
	    exit;
	}

	define('ULTPGRID_PLUGIN_PATH', WP_PLUGIN_URL . '/' . plugin_basename( dirname(__FILE__) ) . '/' );
	define('ULTPGRID_PLUGIN_DIR', plugin_dir_path(__FILE__) );

	function ultpgrid_init() {

		wp_enqueue_script( 'jquery' );
		wp_enqueue_style( 'ultpgrid-font', ULTPGRID_PLUGIN_PATH . 'assets/css/font-awesome.min.css' );
		wp_enqueue_style( 'ultpgrid-animate', ULTPGRID_PLUGIN_PATH . 'assets/css/animate.css' );
		wp_enqueue_style( 'ultpgrid-app', ULTPGRID_PLUGIN_PATH . 'assets/css/ultpgrid-app.css' );
		wp_enqueue_script( 'ultimate_post_grid_ajax_js', plugins_url( 'assets/js/script.js', __FILE__), array( 'jquery' ), '1.0.0', true );
		wp_localize_script( 'ultimate_post_grid_ajax_js', 'ultimate_post_grid_ajax', array( 'ultimate_post_grid_ajaxurl' => admin_url( 'admin-ajax.php')));
		wp_enqueue_script( 'ultpgrid_picker_js', plugins_url( '/assets/js/jscolor.js' , __FILE__ ) , array( 'jquery' ) );
		wp_enqueue_script( 'ultpgrid_isotop_js', plugins_url( '/assets/js/isotope.pkgd.min.js' , __FILE__ ) , array( 'jquery' ) );		
	}
	add_action( 'init', 'ultpgrid_init' );

	# Load plugin Translations
	function ultpgrid_load_textdomain() {
		load_plugin_textdomain( 'ultpgrid', false, dirname( plugin_basename( __FILE__ ) ) .'/languages/' );
	}
	add_action( 'plugins_loaded', 'ultpgrid_load_textdomain' );

	# Post Type
	require_once( 'lib/post-type/ultpgrid-post-type.php' );

	# Metabox
	require_once( 'lib/metaboxes/ultpgrid-metaboxes.php' );

	# Core
	require_once( 'lib/core/ultpgrid-core.php' );	

	#Shortcode
	require_once( 'lib/shortcodes/ultpgrid-shortcode.php' );
?>