<?php
defined( 'ABSPATH' ) or die();

// The third-party libraries
require_once GLB__PATH . 'vendor/class-tgm-plugin-activation.php';

// Classes
require_once GLB__PATH . 'admin/inc/class-plugins-activation.php';
require_once GLB__PATH . 'admin/inc/class-sample-data-worker.php';
require_once GLB__PATH . 'admin/inc/class-sample-data.php';

// Register theme's assets
add_action( 'init', 'glb__setup_admin_assets' );

// Initialize sample data installer
add_action( 'init', 'glb__setup_sample_data_installer' );


if ( ! function_exists( 'glb__setup_admin_assets' ) ):
/**
 * Register scripts and styles for the theme
 * 
 * @return  void
 */
function glb__setup_admin_assets() {
	// Font Awesome
	wp_register_style( 'font-awesome', '//cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css', array(), '4.7.0' );
	
	// Chosen
	wp_register_style( 'glb-chosen', get_theme_file_uri( 'admin/js/vendor/chosen/chosen.min.css' ), array(), GLB__VERSION );
	wp_register_script( 'glb-chosen', get_theme_file_uri( 'admin/js/vendor/chosen/chosen.jquery.min.js' ), array( 'jquery' ), GLB__VERSION, true );
	
	// Spectrum
	wp_register_style( 'glb-spectrum', get_theme_file_uri( 'admin/js/vendor/spectrum/spectrum.css' ), array(), GLB__VERSION );
	wp_register_script( 'glb-spectrum', get_theme_file_uri( 'admin/js/vendor/spectrum/spectrum.js' ), array( 'jquery' ), GLB__VERSION, true );

	// Spectrum
	wp_register_style( 'glb-iconpicker', get_theme_file_uri( 'admin/js/vendor/iconpicker/css/jquery.fonticonpicker.css' ), array(), GLB__VERSION );
	wp_register_script( 'glb-iconpicker', get_theme_file_uri( 'admin/js/vendor/iconpicker/fonticonpicker.js' ), array( 'jquery' ), GLB__VERSION, true );

	// VueJS library
	wp_register_script( 'vuejs', get_theme_file_uri( 'admin/js/vendor/vue.js' ), array(), GLB__VERSION, true );

	// Sample data installer
	wp_register_style( 'sample-data', get_theme_file_uri( 'admin/css/sample-data.css' ) );
	wp_register_script( 'sample-data', get_theme_file_uri( 'admin/js/sample-data.js' ), array( 'vuejs', 'jquery' ) );

	/**
	 * Core scripts
	 */
	wp_register_script( 'glb-options', get_theme_file_uri( 'admin/js/options.js' ), array(
		'vuejs',
		'glb-spectrum',
		'glb-chosen',
		'wp-plupload',
		'jquery-ui-resizable',
		'jquery-ui-sortable',
		'glb-iconpicker'
	), GLB__VERSION, true );

	wp_register_style( 'glb-options', get_theme_file_uri( 'admin/css/options.css' ), array(
		'font-awesome',
		'glb-chosen',
		'glb-spectrum',
		'glb-iconpicker'
	), GLB__VERSION );
	
	wp_register_style( 'glb-customize', get_theme_file_uri( 'admin/css/customize.css' ), array( 'glb-options' ), GLB__VERSION );
}
endif;



if ( ! function_exists( 'glb__setup_sample_data_installer' ) ):
function glb__setup_sample_data_installer() {
	new Glb__Sample_Data();
}
endif;

function glb__sample_data_files() {
	return array(
		array(
			'title'   => 'Sample Data',
			'file'    => 'demo.zip',
			'preview' => get_theme_file_uri( 'demo/screenshot-01.png' )
		)
	);
}
add_filter( 'glb/sample-datas', 'glb__sample_data_files' );


add_filter('acf/settings/save_json', function() {
	return get_theme_file_path( 'admin/json/' );
} );

add_filter('acf/settings/load_json', function( $paths ) {
    return array( get_theme_file_path( 'admin/json/' ) );
} );
