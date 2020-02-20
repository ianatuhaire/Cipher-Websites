<?php
defined( 'ABSPATH' ) or die();

// Add filter to register customize containers
add_filter( 'glb__customize_containers', 'glb__customize_global_containers' );
add_filter( 'glb__customize_settings', 'glb__customize_global_settings' );


// Add filter to register customize controls
add_filter( 'glb__customize_controls', 'glb__customize_global_logo_controls' );
add_filter( 'glb__customize_controls', 'glb__customize_global_layout_controls' );
add_filter( 'glb__customize_controls', 'glb__customize_global_styles_controls' );
add_filter( 'glb__customize_controls', 'glb__customize_global_connections_controls' );
add_filter( 'glb__customize_controls', 'glb__customize_global_sliding_controls' );
add_filter( 'glb__customize_controls', 'glb__customize_global_misc_controls' );
add_filter( 'glb__customize_controls', 'glb__customize_global_content_bottom_controls' );



/**
 * Return an array of the containers that will be registered
 * into the theme customizer
 * 
 * @return  array
 * @since   1.0.0
 */
function glb__customize_global_containers( $containers ) {
	$containers['global__logo'] = array(
		'type'    => 'panel',
		'title'   => esc_html__( 'Logos', 'glb' ),
		'heading' => array(
			'title'       => esc_html__( 'Global Settings', 'glb' ),
			'description' => esc_html__( 'Controls the settings that will throughout the theme. These settings can be overridden by the specific sections.', 'glb' )
		)
	);
	$containers['global__logoDefault'] = array(
		'type'        => 'section',
		'panel'       => 'global__logo',
		'title'       => esc_html__( 'Logo Default', 'glb' ),
		'description' => esc_html__( 'Configure the logo image that will be used in overall pages', 'glb' )
	);
	$containers['global__logoDark'] = array(
		'type'        => 'section',
		'panel'       => 'global__logo',
		'title'       => esc_html__( 'Logo Dark', 'glb' ),
		'description' => esc_html__( 'Configure the logo image in the dark style that will be used in overall pages', 'glb' )
	);
	$containers['global__logoLight'] = array(
		'type'        => 'section',
		'panel'       => 'global__logo',
		'title'       => esc_html__( 'Logo Light', 'glb' ),
		'description' => esc_html__( 'Configure the logo image in the light style that will be used in overall pages', 'glb' )
	);


	$containers['global__styles'] = array(
		'type'  => 'panel',
		'title' => esc_html__( 'Layout & Styles', 'glb' )
	);
	$containers['global__layout'] = array(
		'type'        => 'section',
		'panel'       => 'global__styles',
		'title'       => esc_html__( 'Layout Settings', 'glb' ),
		'description' => esc_html__( 'Controls the settings for the overall site layout.', 'glb' )
	);
	$containers['global__sidebar'] = array(
		'type'  => 'section',
		'panel' => 'global__styles',
		'title' => esc_html__( 'Sidebar Settings', 'glb' )
	);
	$containers['global__typography'] = array(
		'type'  => 'section',
		'panel' => 'global__styles',
		'title' => esc_html__( 'Color & Typography', 'glb' )
	);
	$containers['global__connections'] = array(
		'type'     => 'section',
		'title'    => esc_html__( 'Social Networks', 'glb' )
	);
	$containers['global__slidingSidebar'] = array(
		'type'        => 'section',
		'panel'       => 'global__styles',
		'title'       => _x( 'Sliding Sidebar', 'customize', 'glb' ),
		'description' => _x( 'Configure the styles for the left content area.', 'customize', 'glb' ),
		'heading'     => array(
			'title'       => esc_html__( 'Sliding Areas', 'glb' ),
			'description' => esc_html__( 'Controls the settings for the sliding content areas.', 'glb' )
		)
	);
	$containers['global__slidingMenu'] = array(
		'type'        => 'section',
		'panel'       => 'global__styles',
		'title'       => _x( 'Sliding Menu', 'customize', 'glb' ),
		'description' => _x( 'Configure the styles for the left content area.', 'customize', 'glb' )
	);
	$containers['global__contentBottom'] = array(
		'type'  => 'section',
		'panel' => 'global__styles',
		'title' => _x( 'Content Bottom Widgets', 'customize', 'glb' )
	);

	return $containers;
}


/**
 * Return an array of the settings that will be registered
 * into the theme customizer
 * 
 * @return  array
 * @since   1.0.0
 */
function glb__customize_global_settings( $settings ) {
	$layout_width = array(
		'width'     => '1100px',
		'max-width' => '90%'
	);
	$layout_padding = array(
		'padding-top'    => '0px',
		'padding-right'  => '0px',
		'padding-bottom' => '0px',
		'padding-left'   => '0px'
	);

	$text_link_colors = array(
		'a'                 => '',
		'a:hover'           => '',
		'a:visited'         => '',
		'a:active, a:focus' => ''
	);

	$settings = array_merge( $settings, array(
		'logoDefault__logo'       => array( 'default' => array( 'url' => get_theme_file_uri( 'assets/img/logo.png' ) ) ),
		'logoDefault__logoRetina' => array( 'default' => array( 'url' => get_theme_file_uri( 'assets/img/logo@2x.png' ) ) ),
		'logoDefault__logoSize'   => array( 'default' => array( 'width' => 'auto', 'height' => 'auto' ) ),
		
		'logoDark__logo'       => array( 'default' => array( 'url' => get_theme_file_uri( 'assets/img/logo_sticky.png' ) ) ),
		'logoDark__logoRetina' => array( 'default' => array( 'url' => get_theme_file_uri( 'assets/img/logo_sticky@2x.png' ) ) ),
		'logoDark__logoSize'   => array( 'default' => array( 'width' => 'auto', 'height' => 'auto' ) ),
		
		'logoLight__logo'       => array( 'default' => array( 'id' => -1, 'url' => false ) ),
		'logoLight__logoRetina' => array( 'default' => array( 'id' => -1, 'url' => false ) ),
		'logoLight__logoSize'   => array( 'default' => array( 'width' => 'auto', 'height' => 'auto' ) ),

		'global__layout__mode'       => array( 'default' => 'wide' ),
		'global__layout__width'      => array( 'default' => $layout_width ),
		'global__layout__padding'    => array( 'default' => $layout_padding ),
		'global__layout__background' => array( 'default' => array() ),
		'global__layout__frame'      => array( 'default' => '#000' ),
		
		'global__sidebar__position'         => array( 'default' => 'right' ),
		'global__sidebar__dimension'        => array( 'default' => array( 'width' => '200px', 'margin' => '50px' ) ),
		'global__sidebar__background'       => array( 'default' => array() ),
		'global__widget__title'             => array( 'default' => array() ),
		'global__widget__titlePadding'      => array( 'default' => array(
			'padding-top'    => '0px',
			'padding-right'  => '0px',
			'padding-bottom' => '0px',
			'padding-left'   => '0px'
		) ),
		'global__widget__titleMargin'      => array( 'default' => array(
			'margin-top'    => '0px',
			'margin-right'  => '0px',
			'margin-bottom' => '0px',
			'margin-left'   => '0px'
		) ),
		'global__widget__content'           => array( 'default' => array() ),
		'global__widget__linkColors'     => array( 'default' => array() ),
		'global__widget__titleBackground'   => array( 'default' => array() ),
		'global__widget__contentBackground' => array( 'default' => array() ),
		'global__widget__contentPadding'      => array( 'default' => array(
			'padding-top'    => '0px',
			'padding-right'  => '0px',
			'padding-bottom' => '0px',
			'padding-left'   => '0px'
		) ),
		'global__widget__contentMargin'      => array( 'default' => array(
			'margin-top'    => '0px',
			'margin-right'  => '0px',
			'margin-bottom' => '0px',
			'margin-left'   => '0px'
		) ),
		'global__widget__heading'      => array( 'default' => array() ),
		'global__widget__titleHeading' => array( 'default' => array() ),
		'global__typography__scheme'       => array( 'default' => array() ),
		'global__typography__body'         => array( 'default' => array() ),
		'global__typography__colors'       => array( 'default' => $text_link_colors ),
		'global__typography__h1'           => array( 'default' => array() ),
		'global__typography__h2'           => array( 'default' => array() ),
		'global__typography__h3'           => array( 'default' => array() ),
		'global__typography__h4'           => array( 'default' => array() ),
		'global__typography__h5'           => array( 'default' => array() ),
		'global__typography__h6'           => array( 'default' => array() ),
		'global__typography__blockquote'   => array( 'default' => array() ),

		'global__social__positions' => array( 'default' => array() ),
		'global__social__icons'     => array( 'default' => array() ),

		'sliding__sidebarTypography' => array( 'default' => array() ),
		'sliding__sidebarColors'     => array( 'default' => array() ),
		'sliding__sidebarBackground' => array( 'default' => array() ),
		'sliding__sidebarPadding'    => array( 'default' => array(
			'padding-top'    => '0px', 'padding-right' => '0px',
			'padding-bottom' => '0px', 'padding-left'  => '0px'
		) ),

		
		'sliding__menuStyle'      => array( 'default' => 'overlay' ),
		'sliding__menuDesktop'    => array( 'default' => 'off' ),
		'sliding__menuTypography' => array( 'default' => array() ),
		'sliding__menuColors'     => array( 'default' => array() ),
		'sliding__menuBackground' => array( 'default' => array() ),
		'sliding__menuPadding'    => array( 'default' => array(
			'padding-top'    => '0px', 'padding-right' => '0px',
			'padding-bottom' => '0px', 'padding-left'  => '0px'
		) ),

		'global__misc__gotop'                 => array( 'default' => 'on' ),
		'sliding__menuTypographyHeading'      => array( 'default' => array() ),
		'header__backgroundHeading'           => array( 'default' => array() ),
		'header__topbar__typoHeading'         => array( 'default' => array() ),
		'header__topbar__backgroundHeading'   => array( 'default' => array() ),
		'header__nav__backgroundHeading'      => array( 'default' => array() ),
		'header__sticky'                      => array( 'default' => array() ),
		'header__sticky__backgroundHeading'   => array( 'default' => array() ),
		'header__titlebar__titleHeading'      => array( 'default' => array() ),
		'header__titlebar__breadcrumbHeading' => array( 'default' => array() ),
		'header__widgets'                     => array( 'default' => array() ),
		'footer__widgets__titleHeading'       => array( 'default' => array() ),
		'projects__sidebarHeading'            => array( 'default' => array() ),
		'project__sidebarHeading'             => array( 'default' => array() ),
		'button__background'                  => array( 'default' => array() ),
		'input__background'                   => array( 'default' => array() )
	) );

	$settings['contentBottom__widgets']         = array( 'default' => 'off' );
	$settings['contentBottom__widgets__layout'] = array( 'default' => array(
		'columns' => 4,
		'layout'  => array(
			1 => array( 12 ),
			2 => array( 6, 6 ),
			3 => array( 4, 4, 4 ),
			4 => array( 3, 3, 3, 3 ),
		)
	) );
	$settings['contentBottom__widgets__full']    = array( 'default' => 'off' );
	$settings['contentBottom__widgets__padding'] = array( 'default' => array(
		'padding-top'    => '0px',
		'padding-right'  => '0px',
		'padding-bottom' => '0px',
		'padding-left'   => '0px'
	) );
	$settings['contentBottom__widgets__background'] = array( 'default' => array() );
	$settings['contentBottom__widgets__typography'] = array( 'default' => array() );
	$settings['contentBottom__widgets__colors']     = array( 'default' => array() );
	$settings['contentBottom__widgets__title']      = array( 'default' => array() );
	$settings['contentBottom__widgets__margin']     = array( 'default' => array(
		'margin-top'    => '0px',
		'margin-right'  => '0px',
		'margin-bottom' => '0px',
		'margin-left'   => '0px'
	) );

	return $settings;
}


/**
 * Return an array of the controls which will be used
 * for customize the logo
 * 
 * @param   array  $controls  The given controls list
 * @return  array
 */
function glb__customize_global_logo_controls( $controls ) {
	glb__customize_generate_branding_controls( $controls, array(
		'prefix'  => 'logoDefault__',
		'section' => 'global__logoDefault'
	) );

	glb__customize_generate_branding_controls( $controls, array(
		'prefix'  => 'logoDark__',
		'section' => 'global__logoDark'
	) );
	
	glb__customize_generate_branding_controls( $controls, array(
		'prefix'  => 'logoLight__',
		'section' => 'global__logoLight'
	) );
	
	return $controls;
}


/**
 * Return an array of the controls which will be used
 * for customize the layout
 * 
 * @param   array  $controls  The given controls list
 * @return  array
 */
function glb__customize_global_layout_controls( $controls ) {
	$controls['global__layout__mode'] = array(
		'type'        => 'radio-buttons',
		'label'       => esc_html__( 'Site Layout', 'glb' ),
		'section'     => 'global__layout',
		'choices'     => array(
			'wide'  => esc_html__( 'Wide', 'glb' ),
			'boxed' => esc_html__( 'Boxed', 'glb' ),
			'frame' => esc_html__( 'Frame', 'glb' )
		)
	);

	$controls['global__layout__frame'] = array(
		'type'        => 'color',
		'section'     => 'global__layout',
		'label'       => esc_html__( 'Frame Color', 'glb' ),
	);

	$controls['global__layout__width'] = array(
		'type'        => 'dimension',
		'section'     => 'global__layout',
		'label'       => esc_html__( 'Layout Width', 'glb' ),
		'choices'      => array(
			'width'    => esc_html__( 'Width', 'glb' ),
			'max-width' => esc_html__( 'Max Width', 'glb' )
		)
	);

	$controls['global__layout__padding'] = array(
		'type'        => 'dimension',
		'section'     => 'global__layout',
		'label'       => esc_html__( 'Content Padding', 'glb' ),
		'choices'      => array(
			'padding-top'    => esc_html__( 'Top', 'glb' ),
			'padding-right'  => esc_html__( 'Right', 'glb' ),
			'padding-bottom' => esc_html__( 'Bottom', 'glb' ),
			'padding-left'   => esc_html__( 'Left', 'glb' )
		)
	);
	$controls['global__layout__background'] = array(
		'type'        => 'background',
		'section'     => 'global__layout',
		'label'       => esc_html__( 'Background Settings', 'glb' )
	);

	/**
	 * Sidebar options
	 */
	$controls['global__sidebar__position'] = array(
		'type'        => 'radio-buttons',
		'section'     => 'global__sidebar',
		'label'       => esc_html__( 'Sidebar Position', 'glb' ),
		'choices'     => array(
			'none'  => esc_html__( 'No Sidebar', 'glb' ),
			'left'  => esc_html__( 'Left', 'glb' ),
			'right' => esc_html__( 'Right', 'glb' )
		)
	);
	$controls['global__sidebar__dimension'] = array(
		'type'        => 'dimension',
		'section'     => 'global__sidebar',
		'label'       => esc_html__( 'Sidebar Layout', 'glb' ),
		'choices'     => array(
			'width'  => esc_html__( 'Width', 'glb' ),
			'margin' => esc_html__( 'Margin', 'glb' )
		)
	);
	$controls['global__sidebar__background'] = array(
		'type'        => 'background',
		'section'     => 'global__sidebar',
		'label'       => esc_html__( 'Sidebar Background', 'glb' ),
	);

	$controls['global__widget__heading'] = array(
		'type'        => 'heading',
		'section'     => 'global__sidebar',
		'label'       => esc_html__( 'Widget Font', 'glb' ),
	);
	$controls['global__widget__content'] = array(
		'type'        => 'typography',
		'section'     => 'global__sidebar'
	);
	$controls['global__widget__linkColors'] = array(
		'type'        => 'colors',
		'section'     => 'global__sidebar',
		'label'       => esc_html__( 'Widget Link Colors', 'glb' ),
		'choices'     => array(
			'link' => esc_html__( 'Link Color', 'glb' ),
			'linkHover'   => esc_html__( 'Hover Link Color', 'glb' )
		)
	);
	$controls['global__widget__contentPadding'] = array(
		'type'    => 'dimension',
		'section' => 'global__sidebar',
		'label'   => esc_html__( 'Widget Padding', 'glb' ),
		'choices' => array(
			'padding-top'    => esc_html__( 'Top', 'glb' ),
			'padding-right'  => esc_html__( 'Right', 'glb' ),
			'padding-bottom' => esc_html__( 'Bottom', 'glb' ),
			'padding-left'   => esc_html__( 'Left', 'glb' )
		)
	);
	$controls['global__widget__contentMargin'] = array(
		'type'    => 'dimension',
		'section' => 'global__sidebar',
		'label'   => esc_html__( 'Widget Margin', 'glb' ),
		'choices' => array(
			'margin-top'    => esc_html__( 'Top', 'glb' ),
			'margin-right'  => esc_html__( 'Right', 'glb' ),
			'margin-bottom' => esc_html__( 'Bottom', 'glb' ),
			'margin-left'   => esc_html__( 'Left', 'glb' )
		)
	);
	$controls['global__widget__contentBackground'] = array(
		'type'        => 'background',
		'section'     => 'global__sidebar',
		'label'   => esc_html__( 'Widget Background', 'glb' ),
	);

	$controls['global__widget__titleHeading'] = array(
		'type'        => 'heading',
		'section'     => 'global__sidebar',
		'label'       => esc_html__( 'Widget Title Font', 'glb' ),
	);
	$controls['global__widget__title'] = array(
		'type'        => 'typography',
		'section'     => 'global__sidebar'
	);
	$controls['global__widget__titlePadding'] = array(
		'type'    => 'dimension',
		'section' => 'global__sidebar',
		'label'   => esc_html__( 'Widget Title Padding', 'glb' ),
		'choices' => array(
			'padding-top'    => esc_html__( 'Top', 'glb' ),
			'padding-right'  => esc_html__( 'Right', 'glb' ),
			'padding-bottom' => esc_html__( 'Bottom', 'glb' ),
			'padding-left'   => esc_html__( 'Left', 'glb' )
		)
	);
	$controls['global__widget__titleMargin'] = array(
		'type'    => 'dimension',
		'section' => 'global__sidebar',
		'label'   => esc_html__( 'Widget Title Margin', 'glb' ),
		'choices' => array(
			'margin-top'    => esc_html__( 'Top', 'glb' ),
			'margin-right'  => esc_html__( 'Right', 'glb' ),
			'margin-bottom' => esc_html__( 'Bottom', 'glb' ),
			'margin-left'   => esc_html__( 'Left', 'glb' )
		)
	);
	$controls['global__widget__titleBackground'] = array(
		'type'        => 'background',
		'section'     => 'global__sidebar',
		'label'       => esc_html__( 'Widget Title Background', 'glb' ),
	);

	return $controls;
}


/**
 * Return an array of the controls which will be used
 * for customize the styles
 * 
 * @param   array  $controls  The given controls list
 * @return  array
 */
function glb__customize_global_styles_controls( $controls ) {
	$controls['global__typography__scheme'] = array(
		'type'        => 'colors',
		'section'     => 'global__typography',
		'label'       => esc_html__( 'Scheme Color', 'glb' ),
		'choices'     => array(
			'primary' => esc_html__( 'Primary Color', 'glb' ),
			'accent'  => esc_html__( 'Accent Color', 'glb' )
		)
	);

	$controls['global__typography__body'] = array(
		'type'        => 'typography',
		'section'     => 'global__typography',
		'label'       => esc_html__( 'Body Font', 'glb' ),
	);
	$controls['global__typography__colors'] = array(
		'type'        => 'colors',
		'section'     => 'global__typography',
		'label'       => esc_html__( 'Link Colors', 'glb' ),
		'choices'     => array(
			'a'         => esc_html__( 'Link Color', 'glb' ),
			'a:hover'   => esc_html__( 'Hover Color', 'glb' ),
			'a:visited' => esc_html__( 'Visited Color', 'glb' )
		)
	);

	foreach ( range( 1, 6 ) as $index ) {
		$controls["global__typography__h{$index}"] = array(
			'type'        => 'typography',
			'section'     => 'global__typography',
			'label'       => sprintf( esc_html__( 'Heading %d', 'glb' ), $index )
		);
	}

	$controls['global__typography__blockquote'] = array(
		'type'        => 'typography',
		'section'     => 'global__typography',
		'label'       => esc_html__( 'Blockquote Font', 'glb' ),
	);
	

	return $controls;
}


/**
 * Return an array of the controls which will be used
 * for customize the social network icons
 * 
 * @param   array  $controls  The given controls list
 * @return  array
 */
function glb__customize_global_connections_controls( $controls ) {
	$controls['global__social__icons'] = array(
		'type'        => 'icons',
		'section'     => 'global__connections'
	);

	$controls['global__social__positions'] = array(
		'type'        => 'checkboxes',
		'section'     => 'global__connections',
		'label'       => esc_html__( 'Position', 'glb' ),
		'choices'     => array(
			'top'    => esc_html__( 'Topbar', 'glb' ),
			'nav'    => esc_html__( 'Navigation', 'glb' ),
			'sticky' => esc_html__( 'Sticky Header', 'glb' ),
			'footer' => esc_html__( 'Footer', 'glb' )
		)
	);


	return $controls;
}



function glb__customize_global_sliding_controls( $controls ) {
	/**
	 * The content sliding from the left
	 */
	$controls['sliding__sidebarTypography'] = array(
		'type'        => 'typography',
		'section'     => 'global__slidingSidebar',
		'label'       => esc_html__( 'Sliding Area Font', 'glb' ),
	);
	$controls['sliding__sidebarColors'] = array(
		'type'        => 'colors',
		'section'     => 'global__slidingSidebar',
		'label'       => esc_html__( 'Sliding Area Link Colors', 'glb' ),
		'choices'     => array(
			'link' => esc_html__( 'Link Color', 'glb' ),
			'linkHover'   => esc_html__( 'Hover Link Color', 'glb' )
		)
	);
	$controls['sliding__sidebarBackground'] = array(
		'type'        => 'background',
		'section'     => 'global__slidingSidebar',
		'label'       => esc_html__( 'Sliding Area Background', 'glb' ),
	);
	$controls['sliding__sidebarPadding'] = array(
		'type'        => 'dimension',
		'section'     => 'global__slidingSidebar',
		'label'       => esc_html__( 'Sliding Area Padding', 'glb' ),
		'choices'     => array(
			'padding-top'    => esc_html__( 'Top', 'glb' ),
			'padding-right'  => esc_html__( 'Right', 'glb' ),
			'padding-bottom' => esc_html__( 'Bottom', 'glb' ),
			'padding-left'   => esc_html__( 'Left', 'glb' )
		)
	);


	/**
	 * The content sliding from the right
	 */
	$controls['sliding__menuStyle'] = array(
		'type'        => 'radio-buttons',
		'section'     => 'global__slidingMenu',
		'label'       => esc_html__( 'Select Styles', 'glb' ),
		'choices'     => array(
			'overlay' => _x( 'Overlay', 'customize', 'glb' ),
			'slide'   => _x( 'Slide', 'customize', 'glb' )
		)
	);
	$controls['sliding__menuDesktop'] = array(
		'type'        => 'radio-onoff',
		'section'     => 'global__slidingMenu',
		'label'       => esc_html__( 'Show On Desktop', 'glb' ),
	);


	// Typography
	$controls['sliding__menuTypographyHeading'] = array(
		'type'        => 'heading',
		'section'     => 'global__slidingMenu',
		'label'       => esc_html__( 'Sliding Menu Font', 'glb' ),
	);
	$controls['sliding__menuTypography'] = array(
		'type'        => 'typography',
		'section'     => 'global__slidingMenu'
	);
	$controls['sliding__menuColors'] = array(
		'type'        => 'colors',
		'section'     => 'global__slidingMenu',
		'label'       => esc_html__( 'Sliding Menu Color', 'glb' ),
		'choices'     => array(
			'link' => esc_html__( 'Link Color', 'glb' ),
			'linkHover'   => esc_html__( 'Hover Link Color', 'glb' )
		)
	);
	$controls['sliding__menuBackground'] = array(
		'type'        => 'background',
		'section'     => 'global__slidingMenu',
		'label'       => esc_html__( 'Sliding Menu Background', 'glb' ),
	);
	$controls['sliding__menuPadding'] = array(
		'type'        => 'dimension',
		'section'     => 'global__slidingMenu',
		'label'       => esc_html__( 'Sliding Menu Padding', 'glb' ),
		'choices'     => array(
			'padding-top'    => esc_html__( 'Top', 'glb' ),
			'padding-right'  => esc_html__( 'Right', 'glb' ),
			'padding-bottom' => esc_html__( 'Bottom', 'glb' ),
			'padding-left'   => esc_html__( 'Left', 'glb' )
		)
	);

	return $controls;
}


function glb__customize_global_misc_controls( $controls ) {
	$controls['global__misc__gotop'] = array(
		'type'        => 'radio-onoff',
		'section'     => 'global__layout',
		'label'       => esc_html__( 'Enable Go Top Button', 'glb' ),
	);

	return $controls;
}


function glb__customize_global_content_bottom_controls( $controls ) {
	$controls['contentBottom__widgets'] = array(
		'type'        => 'radio-onoff',
		'section'     => 'global__contentBottom',
		'label'       => _x( 'Enable Content Bottom Areas', 'customize', 'glb' ),
		'description' => _x( '', 'customize', 'glb' )
	);
	$controls['contentBottom__widgets__full'] = array(
		'type'        => 'radio-onoff',
		'section'     => 'global__contentBottom',
		'label'       => _x( '100% Full Width', 'customize', 'glb' ),
		'description' => _x( '', 'customize', 'glb' )
	);
	$controls['contentBottom__widgets__layout'] = array(
		'type'        => 'column-layout',
		'section'     => 'global__contentBottom',
		'label'       => _x( 'Widgetized Layout Builder', 'customize', 'glb' ),
		'description' => _x( '', 'customize', 'glb' )
	);
	$controls['contentBottom__widgets__background'] = array(
		'type'        => 'background',
		'section'     => 'global__contentBottom',
		'label'       => _x( 'Footer Widget Areas Background', 'customize', 'glb' ),
		'description' => _x( '', 'customize', 'glb' )
	);
	$controls['contentBottom__widgets__padding'] = array(
		'type'        => 'dimension',
		'section'     => 'global__contentBottom',
		'label'       => _x( 'Footer Widget Areas Padding', 'customize', 'glb' ),
		'description' => _x( '', 'customize', 'glb' ),
		'choices'     => array(
			'padding-top'    => _x( 'Top', 'customize', 'glb' ),
			'padding-right'  => _x( 'Right', 'customize', 'glb' ),
			'padding-bottom' => _x( 'Bottom', 'customize', 'glb' ),
			'padding-left'   => _x( 'Left', 'customize', 'glb' )
		)
	);
	$controls['contentBottom__widgets__typography'] = array(
		'type'        => 'typography',
		'section'     => 'global__contentBottom',
		'label'       => _x( 'Footer Widget Areas Font', 'customize', 'glb' ),
		'description' => _x( '', 'customize', 'glb' )
	);
	$controls['contentBottom__widgets__colors'] = array(
		'type'        => 'colors',
		'section'     => 'global__contentBottom',
		'label'       => _x( 'Footer Widget Areas Link Colors', 'customize', 'glb' ),
		'description' => _x( '', 'customize', 'glb' ),
		'choices'     => array(
			'link'      => _x( 'Link', 'customize', 'glb' ),
			'linkHover' => _x( 'Link Hover', 'customize', 'glb' )
		)
	);
	$controls['contentBottom__widgets__titleHeading'] = array(
		'type'        => 'heading',
		'section'     => 'global__contentBottom',
		'label'       => esc_html__( 'Footer Widget Title Font', 'glb' ),
	);
	$controls['contentBottom__widgets__title'] = array(
		'type'        => 'typography',
		'section'     => 'global__contentBottom'
	);
	$controls['contentBottom__widgets__margin'] = array(
		'type'    => 'dimension',
		'section' => 'global__contentBottom',
		'label'   => esc_html__( 'Footer Widget Margin', 'glb' ),
		'choices' => array(
			'margin-top'    => esc_html__( 'Top', 'glb' ),
			'margin-right'  => esc_html__( 'Right', 'glb' ),
			'margin-bottom' => esc_html__( 'Bottom', 'glb' ),
			'margin-left'   => esc_html__( 'Left', 'glb' )
		)
	);

	return $controls;
}


