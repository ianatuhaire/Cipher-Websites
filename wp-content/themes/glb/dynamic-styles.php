<?php
defined( 'ABSPATH' ) or die();

// Generate the background styles based on the
// given options key
$background_options = array(
	'global__layout__background'      => 'body, .site, .mask::after, .mask::before',
	'global__sidebar__background'     => '.main-sidebar',
	'header__background'              => '.site-header, .site-header .site-header-inner::after',
	'header__topbar__background'      => '.site-topbar',
	'header__nav__background'         => '.site-header .navigator',

	'header__sticky__background'      => '.site-header-sticky, .site-header-sticky .widget.widget_search',
	'header__sticky__nav__background' => '.site-header-sticky .navigator',
	
	// Title bar
	'header__titlebar__background' => '.content-header'
);

foreach ( $background_options as $key => $selector ) {
	glb__define_style( $selector, glb__background_styles(
		glb__option( $key )
	) );
}

if ( is_singular() ) {
	$featured_background_types = (array) glb__option( 'header__titlebar__backgroundFeatured' );
	$current_post_type         = glb__current_post_type();
	
	if ( in_array( $current_post_type, $featured_background_types ) && has_post_thumbnail() ) {
		list($src, $width, $height, $crop) = wp_get_attachment_image_src( get_post_thumbnail_id(), 'full', false );
		
		glb__define_style( '.content-header', array(
			'background-image' => sprintf( 'url(%s)', $src )
		) );
	}
}


// Generate the typography styles based on the
// given options key
$typography_options = array(
	'global__typography__body'              => 'body',
	'global__typography__h1'                => 'h1',
	'global__typography__h2'                => 'h2',
	'global__typography__h3'                => 'h3',
	'global__typography__h4'                => 'h4',
	'global__typography__h5'                => 'h5',
	'global__typography__h6'                => 'h6',
	'global__typography__blockquote'        => 'blockquote',
	'header__topbar__typography'            => '.site-topbar',
	'header__nav__typography'               => '.site-header .navigator > .menu > li a',
	'header__sticky__nav__typography'       => '.site-header-sticky .navigator > .menu > li a',

	// Title bar
	'header__titlebar__titleFont' => '.content-header .page-title-inner',
	'header__titlebar__breadcrumbFont' => '.content-header .breadcrumbs, .content-header .down-arrow a, .page-title .subtitle',

	// Widget
	'global__widget__title'   => '.widget > .widget-title',
	'global__widget__content' => '.widget',

	// Sliding content
	'sliding__sidebarTypography'  => '.off-canvas-left .off-canvas-wrap .widget',
	'sliding__menuTypography'     => '.sliding-menu',

	// Content bottom widgets
	'contentBottom__widgets__typography'   => '.content-bottom-widgets',
	'contentBottom__widgets__title'        => '.content-bottom-widgets .widget-title',

	// Footer typography
	'footer__typography'            => '.site-footer',
	'footer__copyright__typography' => '.footer-copyright',
	'footer__widgets__typography'   => '.footer-widgets',
	'footer__widgets__title'        => '.footer-widgets .widget-title'

);

foreach ( $typography_options as $key => $selector ) {
	glb__define_style( $selector, glb__typography_styles(
		(array) glb__option( $key )
	) );
}

if ( $heading_sizes = glb__option( 'global__typography__headingSize' ) ) {
	foreach ( $heading_sizes as $tag => $size ) {
		glb__define_style( $tag, array(
			'font-size' => $size
		) );
	}
}

// Generate the text colors based on the
// given options key
$text_color_options = array( 'global__typography__colors' );

foreach ( $text_color_options as $key ) {
	$color_values = array_filter( glb__option( $key ) );
	
	foreach ( $color_values as $selector => $color ) {
		glb__define_style( $selector, array(
			'color' => $color
		) );
	}
}

$nav_colors_options = array(
	'header__topbar__colors' => array(
		'menu'        => '.site-topbar a',
		'menu-hover'  => '.site-topbar a:hover',
		'menu-active' => array(
			'.site-topbar a:active',
			'.site-topbar .current-menu-item > a',
			'.site-topbar .current_page_item > a',
			'.site-topbar .current-menu-ancestor > a',
			'.site-topbar .current-menu-parent > a'
		)
	),
	'header__nav__colors' => array(
		'menu'        => '.site-header .off-canvas-toggle, .site-header .navigator .menu > li  a, .site-header .social-icons a',
		'menu-hover'  => '.site-header .off-canvas-toggle:hover, .site-header .navigator .menu > li:hover > a, .site-header .social-icons a:hover',
		'menu-active' => array(
			'.site-header .navigator .menu > li.current-menu-item > a',
			'.site-header .navigator .menu > li.current_page_item > a',
			'.site-header .navigator .menu > li.current-menu-ancestor > a',
			'.site-header .navigator .menu > li.current-menu-parent > a',
			'.site-header .navigator .menu.menu-extras > li > a',
			'.site-header .navigator .menu.menu-extras .search-field',
			'.site-header .off-canvas-toggle',
			'.site-header .off-canvas-toggle:hover'
		)
	),
	'header__sticky__nav__colors' => array(
		'menu'        => '.site-header-sticky .off-canvas-toggle, .site-header-sticky .navigator .menu > li  a, .site-header-sticky .social-icons a',
		'menu-hover'  => '.site-header-sticky .off-canvas-toggle:hover, .site-header-sticky .navigator .menu > li:hover > a, .site-header-sticky .social-icons a:hover',
		'menu-active' => array(
			'.site-header-sticky .navigator .menu > li.current-menu-item > a',
			'.site-header-sticky .navigator .menu > li.current_page_item > a',
			'.site-header-sticky .navigator .menu > li.current-menu-ancestor > a',
			'.site-header-sticky .navigator .menu > li.current-menu-parent > a',
			'.site-header-sticky .navigator .menu.menu-extras > li > a',
			'.site-header-sticky .navigator .menu.menu-extras .search-field',
			'.site-header-sticky .off-canvas-toggle',
			'.site-header-sticky .off-canvas-toggle:hover',
		)
	),
	'header__titlebar__breadcrumbColors' => array(
		'link'      => '.breadcrumbs a',
		'linkHover' => '.breadcrumbs a:hover'
	),

	// Widget link color
	'global__widget__linkColors' => array(
		'link'      => '.main-sidebar a',
		'linkHover' => '.main-sidebar a:hover'
	),

	// Sliding content color
	'sliding__sidebarColors' => array(
		'link'      => '.off-canvas-left a',
		'linkHover' => '.off-canvas-left a:hover'
	),
	'sliding__menuColors' => array(
		'link'      => '.sliding-menu a',
		'linkHover' => '.sliding-menu a:hover'
	),

	// Content bottom widgets
	'contentBottom__widgets__colors' => array(
		'link'      => '.content-bottom-widgets a',
		'linkHover' => '.content-bottom-widgets a:hover'
	),

	// Footer
	'footer__colors' => array(
		'link'      => '.site-footer a',
		'linkHover' => '.site-footer a:hover'
	),
	'footer__widgets__colors' => array(
		'link'      => '.site-footer .footer-widgets a',
		'linkHover' => '.site-footer .footer-widgets a:hover'
	),
	'footer__copyright__colors' => array(
		'link'      => '.site-footer .footer-copyright a',
		'linkHover' => '.site-footer .footer-copyright a:hover'
	),
);

foreach ( $nav_colors_options as $option_key => $selectors ) {
	$colors = glb__option( $option_key );

	foreach ( $colors as $key => $value ) {
		$selector = is_array( $selectors[ $key ] )
			? join( ', ', $selectors[ $key ] )
			: $selectors[ $key ];

		glb__define_style( $selector, array(
			'color' => $value
		) );
	}
}

// Generate the layout width settings
glb__define_style( '.wrap',
	(array) glb__option( 'global__layout__width' )
);

// The content padding styles
glb__define_style( '.content-body-inner',
	(array) glb__option( 'global__layout__padding' )
);

/**
 * The header options
 */
glb__define_style( '.site-header .header-brand',
	(array) glb__option( 'header__logoMargin' )
);
glb__define_style( '.site-header .site-header-inner', array(
	'height' => glb__option( 'header__height' )
) );
glb__define_style( '.site-header .off-canvas-toggle, .site-header .navigator .menu, .site-header .social-icons',
	(array) glb__option( 'header__nav__margin' )
);
glb__define_style( '.site-header .off-canvas-toggle, .site-header .navigator .menu > li > a, .site-header .social-icons a',
	(array) glb__option( 'header__nav__padding' )
);

// Generate styles for the custom header border
if ( glb__option( 'header__border' ) === 'on' ) {
	glb__define_style( '.site-header, .site-header .site-header-inner::after', glb__border_styles(
		(array) glb__option( 'header__border__options' )
	) );
}

// Generate styles for the custom header title border
if ( glb__option( 'header__titlebar__border' ) === 'on' ) {
	glb__define_style( '.content-header', glb__border_styles(
		(array) glb__option( 'header__titlebar__border__options' )
	) );
}


/**
 * The header options
 */
glb__define_style( '.site-header-sticky .header-brand',
	(array) glb__option( 'header__sticky__logoMargin' )
);
glb__define_style( '.site-header-sticky .site-header-inner', array(
	'height' => glb__option( 'header__sticky__height' )
) );
glb__define_style( '.site-header-sticky .off-canvas-toggle, .site-header-sticky .navigator .menu, .site-header-sticky .social-icons',
	(array) glb__option( 'header__sticky__nav__margin' )
);
glb__define_style( '.site-header-sticky .off-canvas-toggle, .site-header-sticky .navigator .menu > li > a, .site-header-sticky .social-icons a',
	(array) glb__option( 'header__sticky__nav__padding' )
);

// Generate styles for the custom header border
if ( glb__option( 'header__sticky__border' ) === 'on' ) {
	glb__define_style( '.site-header-sticky', glb__border_styles(
		(array) glb__option( 'header__sticky__border__options' )
	) );
}


glb__define_style( '.content-header', (array) glb__option( 'header__titlebar__margin' ) );
glb__define_style( '.content-header', (array) glb__option( 'header__titlebar__padding' ) );
glb__define_style( '.content-header .content-header-inner', array( 'height' => glb__option( 'header__titlebar__height' ) ) );


/**
 * The logo size
 */
foreach ( array( 'logoDefault', 'logoLight', 'logoDark' ) as $logo_profile ) {
	$size = (array) glb__option( "{$logo_profile}__logoSize" );
	$size = array_filter( $size );

	glb__define_style( ".logo.{$logo_profile}", $size );
}

/**
 * The layout framed
 */
if ( glb__option( 'global__layout__mode' ) === 'frame' ) {
	glb__define_style( '#frame > span', array(
		'background' => glb__option( 'global__layout__frame' )
	) );
}


/**
 * The sliding content
 */
if ( is_active_sidebar( 'off-canvas-left' ) ) {
	glb__define_style( '.off-canvas-left .off-canvas-wrap', glb__background_styles(
		(array) glb__option( 'sliding__sidebarBackground' )
	) );
	glb__define_style( '.off-canvas-left .off-canvas-wrap', (array) glb__option( 'sliding__sidebarPadding' ) );
}
if ( has_nav_menu( 'sliding' ) ) {
	glb__define_style( '.sliding-menu', glb__background_styles(
		(array) glb__option( 'sliding__menuBackground' )
	) );
	glb__define_style( '.sliding-menu .off-canvas-wrap', (array) glb__option( 'sliding__menuPadding' ) );
}


/**
 * Sidebar Styles
 */
if ( glb__has_sidebar() ) {
	$layout_dimension = glb__option( 'global__layout__width' );
	$sidebar_dimension = glb__option( 'global__sidebar__dimension' );
	$padding_side = glb__sidebar_position() == 'right' ? 'padding-left' : 'padding-right';

	glb__define_style( '#main-content', array(
		'width' => sprintf( 'calc(100%% - %spx)', (int)$sidebar_dimension['width'] + (int)$sidebar_dimension['margin'] )
	) );
	glb__define_style( '.main-sidebar', array(
		'width' => sprintf( '%spx', (int)$sidebar_dimension['width'] + (int)$sidebar_dimension['margin'] ),
		$padding_side => $sidebar_dimension['margin']
	) );
	glb__define_style( '.main-sidebar', glb__background_styles(
		(array) glb__option( 'global__sidebar__background' )
	) );
}

/**
 * The widget styles
 */
glb__define_style( '.widget', glb__background_styles(
	(array) glb__option( 'global__widget__contentBackground' )
) );
glb__define_style( '.widget', (array) glb__option( 'global__widget__contentPadding' ) );
glb__define_style( '.widget', (array) glb__option( 'global__widget__contentMargin' ) );

glb__define_style( '.widget > .widget-title', glb__background_styles(
	(array) glb__option( 'global__widget__titleBackground' )
) );
glb__define_style( '.widget > .widget-title', (array) glb__option( 'global__widget__titlePadding' ) );
glb__define_style( '.widget > .widget-title', (array) glb__option( 'global__widget__titleMargin' ) );

/**
 * Button styles
 */
glb__define_style( '.button, input[type="button"], input[type="submit"], button', array(
	'background' => glb__option( 'button__background' )
) );
glb__define_style( '.button, input[type="button"], input[type="submit"], button', array( 
	'height' => glb__option( 'button__height' ) 
) );
glb__define_style( '.button, input[type="button"], input[type="submit"], button', glb__typography_styles(
	(array) glb__option( 'button__typography' )
) );
glb__define_style( '.button, input[type="button"], input[type="submit"], button',
	(array) glb__option( 'button__padding' )
);
glb__define_style( '.button, input[type="button"], input[type="submit"], button', glb__border_styles(
	(array) glb__option( 'button__border' )
) );
glb__define_style( '.button, input[type="button"], input[type="submit"], button', array(
	'border-radius' => glb__option( 'button__borderRadius' )
) );

/**
 * Input styles
 */
glb__define_style( 'input, textarea, select', array(
	'background' => glb__option( 'input__background' )
) );
glb__define_style( 'input, select', array( 
	'height' => glb__option( 'input__height' ) 
) );
glb__define_style( 'input, textarea, select', glb__typography_styles(
	(array) glb__option( 'input__typography' )
) );
glb__define_style( 'input, textarea, select',
	(array) glb__option( 'input__padding' )
);
glb__define_style( 'input, textarea, select', glb__border_styles(
	(array) glb__option( 'input__border' )
) );
glb__define_style( 'input, textarea, select', array(
	'border-radius' => glb__option( 'input__borderRadius' )
) );

// Content bottom widgets
if ( glb__option( 'contentBottom__widgets' ) == 'on' ) {
	glb__define_style( '.content-bottom-widgets', glb__background_styles(
		(array) glb__option( 'contentBottom__widgets__background' )
	) );
	glb__define_style( '.content-bottom-widgets', (array) glb__option( 'contentBottom__widgets__padding' ) );
	glb__define_style( '.content-bottom-widgets .widget', (array) glb__option( 'contentBottom__widgets__margin' ) );
}


/**
 * Footer styles
 */
glb__define_style( '.site-footer', glb__border_styles(
	(array) glb__option( 'footer__border' )
) );
glb__define_style( '.site-footer', glb__background_styles(
	(array) glb__option( 'footer__background' )
) );
glb__define_style( '.site-footer', (array) glb__option( 'footer__padding' ) );

// Footer widgets
if ( glb__option( 'footer__widgets' ) == 'on' ) {
	glb__define_style( '.footer-widgets', glb__background_styles(
		(array) glb__option( 'footer__widgets__background' )
	) );
	glb__define_style( '.footer-widgets', (array) glb__option( 'footer__widgets__padding' ) );
	glb__define_style( '.footer-widgets .widget', (array) glb__option( 'footer__widgets__margin' ) );
}

// Footer copyright
if ( glb__option( 'footer__copyright' ) == 'on' ) {
	glb__define_style( '.site-footer .footer-copyright', glb__border_styles(
		(array) glb__option( 'footer__copyright__border' )
	) );
	glb__define_style( '.site-footer .footer-copyright', glb__background_styles(
		(array) glb__option( 'footer__copyright__background' )
	) );
	glb__define_style( '.site-footer .footer-copyright', (array) glb__option( 'footer__copyright__padding' ) );
}


/**
 * Projects
 */
if ( is_post_type_archive( 'nproject' ) ||
	 is_tax( 'nproject-category' ) ||
	 is_tax( 'nproject-tag' ) ||
	 is_page_template( 'tmpl/template-projects.php' ) ) {

	$grid_spacing = abs( (int)glb__option( 'projects__gridGutter' ) );
	
	glb__define_style( '.content-inner[data-grid] .project', array(
		'padding-left'  => sprintf( '%fpx', $grid_spacing/2 ),
		'padding-right' => sprintf( '%fpx', $grid_spacing/2 ),
		'margin-bottom' => sprintf( '%dpx', $grid_spacing )
	) );

	glb__define_style( '.projects .content-inner[data-grid]', array(
		'margin-left'  => sprintf( '%dpx', -$grid_spacing/2 ),
		'margin-right' => sprintf( '%dpx', -$grid_spacing/2 )
	) );
}

/**
 * Shop
 */
if ( function_exists( 'is_woocommerce' ) && is_woocommerce() ) {
	$grid_spacing = abs( (int)glb__option( 'shop__gridGutter' ) );
	
	glb__define_style( '.content-inner.products[data-grid] .product', array(
		'padding-left'  => sprintf( '%fpx', $grid_spacing/2 ),
		'padding-right' => sprintf( '%fpx', $grid_spacing/2 ),
		'margin-bottom' => sprintf( '%dpx', $grid_spacing )
	) );

	glb__define_style( '.content-inner.products[data-grid]', array(
		'margin-left'  => sprintf( '%dpx', -$grid_spacing/2 ),
		'margin-right' => sprintf( '%dpx', -$grid_spacing/2 )
	) );
}

/**
 * Blog
 */
$grid_spacing = abs( (int)glb__option( 'blog__archive__gridGutter' ) );
	
glb__define_style( '.content-inner[data-grid] .post, .content-inner[data-grid-normal] .post', array(
	'padding-left'  => sprintf( '%fpx', $grid_spacing/2 ),
	'padding-right' => sprintf( '%fpx', $grid_spacing/2 ),
	'margin-bottom' => sprintf( '%dpx', $grid_spacing )
) );

glb__define_style( '.content-inner[data-grid], .content-inner[data-grid-normal]', array(
	'margin-left'  => sprintf( '%dpx', -$grid_spacing/2 ),
	'margin-right' => sprintf( '%dpx', -$grid_spacing/2 )
) );
