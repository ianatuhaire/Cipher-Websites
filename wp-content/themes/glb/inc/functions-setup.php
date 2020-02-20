<?php
defined( 'ABSPATH' ) or die();


// Setup the theme navigation
add_action( 'after_setup_theme', 'glb__navigation' );

// Setup images dimensions
// add_action( 'after_setup_theme', 'glb__images_dimensions' );

// Setup theme supports
add_action( 'after_setup_theme', 'glb__supports' );

// Setup theme sidebars
add_action( 'widgets_init', 'glb__sidebars' );

// Add action to register the needed scripts and styles
// for the theme
add_action( 'init', 'glb__register_assets', 5 );

// We need enqueue the scripts and styles before showing
// the content
add_action( 'wp_enqueue_scripts', 'glb__enqueue_assets', 5 );

// Adding SVG support in the media library
add_filter( 'upload_mimes', 'glb__upload_mimes' );

// Adding filter to change the shortcodes path
add_filter( 'line-shortcode-path', 'glb__shortcodes_path' );

add_filter( 'vc_before_init', 'glb__shortcodes_init' );


if ( ! isset( $content_width ) ) {
	$content_width = 900;
}


/**
 * Register the theme menu locations
 * 
 * @return  void
 * @since   1.0.0
 */
function glb__navigation() {
	register_nav_menus( array(
		'primary'   => esc_html__( 'Primary Menu', 'glb' ),
		'sliding'   => esc_html__( 'Sliding Menu', 'glb' ),
		'top'       => esc_html__( 'Top Menu', 'glb' )
	) );
}


/**
 * Register the theme features support
 * 
 * @return  void
 */
function glb__supports() {
	add_theme_support( 'woocommerce' );
	add_theme_support( 'automatic-feed-links' );
	add_theme_support( 'title-tag' );
	add_theme_support( 'post-formats', array( 'gallery', 'link', 'quote', 'status', 'video', 'audio' ) );
	add_theme_support( 'html5', array( 'comment-list', 'search-form', 'comment-form', 'gallery', 'caption' ) );
	add_theme_support( 'post-thumbnails' );
}


function glb__sidebars() {
	register_sidebar( array(
		'name'          => esc_html__( 'Primary Widgets Area', 'glb' ),
		'id'            => 'primary',
		'description'   => esc_html__( 'Add widgets here to appear in your sidebar', 'glb' ),
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );
	register_sidebar( array(
		'name'          => esc_html__( 'Header Widget', 'glb' ),
		'id'            => 'header-widget',
		'description'   => esc_html__( 'Add widgets here to appear in your sidebar', 'glb' ),
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );
	register_sidebar( array(
		'name'          => esc_html__( 'Sliding Content - Left', 'glb' ),
		'id'            => 'off-canvas-left',
		'description'   => esc_html__( 'Add widgets here to appear in your sidebar', 'glb' ),
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );
	register_sidebar( array(
		'name'          => esc_html__( 'Sliding Content - Right', 'glb' ),
		'id'            => 'off-canvas-right',
		'description'   => esc_html__( 'Add widgets here to appear in your sidebar', 'glb' ),
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );

	/**
	 * Content bottom sidebars
	 */
	register_sidebar( array(
		'name'          => esc_html__( 'Content Bottom #1', 'glb' ),
		'id'            => 'content-bottom-1',
		'description'   => esc_html__( 'Add widgets here to appear in your Content Bottom #1 area', 'glb' ),
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );

	register_sidebar( array(
		'name'          => esc_html__( 'Content Bottom #2', 'glb' ),
		'id'            => 'content-bottom-2',
		'description'   => esc_html__( 'Add widgets here to appear in your Content Bottom #2 area', 'glb' ),
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );

	register_sidebar( array(
		'name'          => esc_html__( 'Content Bottom #3', 'glb' ),
		'id'            => 'content-bottom-3',
		'description'   => esc_html__( 'Add widgets here to appear in your Content Bottom #3 area', 'glb' ),
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );

	register_sidebar( array(
		'name'          => esc_html__( 'Content Bottom #4', 'glb' ),
		'id'            => 'content-bottom-4',
		'description'   => esc_html__( 'Add widgets here to appear in your Content Bottom #4 area', 'glb' ),
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );

	/**
	 * Footer sidebars
	 */
	register_sidebar( array(
		'name'          => esc_html__( 'Footer #1', 'glb' ),
		'id'            => 'footer-1',
		'description'   => esc_html__( 'Add widgets here to appear in your Footer #1 area', 'glb' ),
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );

	register_sidebar( array(
		'name'          => esc_html__( 'Footer #2', 'glb' ),
		'id'            => 'footer-2',
		'description'   => esc_html__( 'Add widgets here to appear in your Footer #2 area', 'glb' ),
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );

	register_sidebar( array(
		'name'          => esc_html__( 'Footer #3', 'glb' ),
		'id'            => 'footer-3',
		'description'   => esc_html__( 'Add widgets here to appear in your Footer #3 area', 'glb' ),
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );

	register_sidebar( array(
		'name'          => esc_html__( 'Footer #4', 'glb' ),
		'id'            => 'footer-4',
		'description'   => esc_html__( 'Add widgets here to appear in your Footer #4 area', 'glb' ),
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );
}


function glb__register_assets() {
	// Theme's styles
	wp_register_style( 'theme-components', get_template_directory_uri() . '/assets/css/components.css', array(), GLB__VERSION, 'all' );

	if (is_child_theme()) {
		wp_register_style( 'theme-parent', get_template_directory_uri() . '/assets/css/style.css', array( 'theme-components' ), GLB__VERSION, 'all' );
		wp_register_style( 'theme', get_stylesheet_uri(), array( 'theme-parent' ), GLB__VERSION, 'all' );
	} else {
		wp_register_style( 'theme', get_template_directory_uri() . '/assets/css/style.css', array( 'theme-components' ), GLB__VERSION, 'all' );
	}

	// Theme's scripts
	wp_register_script( 'theme-components', get_template_directory_uri() . '/assets/js/components.js', array( 'jquery' ), GLB__VERSION, true );
	wp_register_script( 'theme', get_template_directory_uri() . '/assets/js/theme.js', array( 'theme-components' ), GLB__VERSION, true );

	if ( $settings = get_option( 'line_settings' ) ) {
		wp_register_script( 'line-shortcode-maps-api', 'https://maps.google.com/maps/api/js?v=3&key=' . $settings['maps_api'], array(), false, true );
	}
}


function glb__enqueue_google_fonts() {
	global $_required_google_fonts;

	if ( ! empty( $_required_google_fonts ) && is_array( $_required_google_fonts ) ) {
		$fonts = array();
		$subsets = array();

		foreach ( $_required_google_fonts as $font ) {
			$fonts[] = sprintf( '%s:%s', urlencode( $font['family'] ), urlencode( $font['variants'] ) );
			$subsets = array_merge( $subsets, $font['subsets'] );
		}

		if ( ! empty( $fonts ) ) {
			$scheme = parse_url( get_site_url(), PHP_URL_SCHEME );
			$fonts_url = add_query_arg( array(
				'family' => implode( '|', array_unique( $fonts ) ),
				'subset' => implode( ',', array_unique( $subsets ) )
				), sprintf( '%s://fonts.googleapis.com/css', $scheme ) );

			wp_enqueue_style( 'theme-fonts', $fonts_url );
		}
	}
}


function glb__enqueue_assets() {
	// The dynamic styles
	if ( locate_template( 'dynamic-styles.php' ) ) {
		// Load the script that generate the dynamic
		// stylesheets
		get_template_part( 'dynamic-styles' );
	}

	glb__enqueue_google_fonts();

	// Enqueue the main styles
	wp_enqueue_style( 'theme' );

	// Enqueue the inline stylesheet
	wp_add_inline_style( 'theme', glb__styles() );
	wp_add_inline_style( 'theme', glb__scheme_styles() );

	// Enqueue the main script
	wp_enqueue_script( 'theme' );

	// Comment script
	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}


/**
 * Register custom mime types for the theme
 * 
 * @param   array  $mimes  List of mime types
 * @return  array
 */
function glb__upload_mimes( $mimes ) {
	$mimes['svg'] = 'image/svg+xml';
	$mimes['ico'] = 'image/x-icon';
	$mimes['dat'] = 'application/octet-stream';
	$mimes['txt'] = 'text/plain';

	return $mimes;
}


/**
 * Return the string that indicated the folder which contains
 * all shortcode templates
 * 
 * @param   string  $path  The original path
 * @return  string
 */
function glb__shortcodes_path( $path ) {
	return 'tmpl/shortcodes/';
}


/**
 * Initial the additional shortcodes for the theme
 * 
 * @return  void
 */
function glb__shortcodes_init() {
	require_once get_theme_file_path( 'inc/elements/locations.php' );
}


function glb__acf_fallback_init () {
	if ( ! function_exists( 'get_field' ) ) {
		function get_field () {}
	}

	if ( ! function_exists( 'the_field' ) ) {
		function the_field () {}
	}
}
add_action( 'wp', 'glb__acf_fallback_init' );
