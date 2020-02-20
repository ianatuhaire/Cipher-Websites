<?php
defined( 'ABSPATH' ) or die();

add_filter( 'glb__customize_containers', 'glb__customize_header_containers' );
add_filter( 'glb__customize_controls', 'glb__customize_header_controls' );
add_filter( 'glb__customize_settings', 'glb__customize_header_settings' );

function glb__customize_header_containers( $containers ) {
	$containers['headerAndFooter'] = array(
		'type'        => 'panel',
		'title'       => _x( 'Header & Footer Builder', 'customize', 'glb' ),
		'description' => _x( 'Controls the settings for customizing the header and footer styles', 'customize', 'glb' )
	);

	$containers['headerGeneral'] = array(
		'type'        => 'section',
		'panel'       => 'headerAndFooter',
		'title'       => _x( 'General', 'customize', 'glb' ),
		'parent'      => _x( 'Header Settings', 'customize', 'glb' ),
		'description' => _x( 'Controls the general settings for the header.', 'customize', 'glb' ),
		'heading'     => array(
			'title'       => esc_html__( 'Header Settings', 'glb' ),
		)
	);
	$containers['headerTopbar'] = array(
		'type'        => 'section',
		'panel'       => 'headerAndFooter',
		'title'       => _x( 'Topbar Settings', 'customize', 'glb' ),
		'parent'      => _x( 'Header Settings', 'customize', 'glb' ),
		'description' => _x( 'Configure the settings for the header topbar area.', 'customize', 'glb' )
	);
	$containers['headerNavigator'] = array(
		'type'        => 'section',
		'panel'       => 'headerAndFooter',
		'title'       => _x( 'Navigation Bar', 'customize', 'glb' ),
		'parent'      => _x( 'Header Settings', 'customize', 'glb' ),
		'description' => _x( 'Configure the settings for the header navigation bar area.', 'customize', 'glb' )
	);

	$containers['headerTitle'] = array(
		'type'        => 'section',
		'panel'       => 'headerAndFooter',
		'title'       => _x( 'Title Bar', 'customize', 'glb' ),
		'parent'      => _x( 'Header Settings', 'customize', 'glb' )
	);

	$containers['headerSticky'] = array(
		'type'        => 'section',
		'panel'       => 'headerAndFooter',
		'title'       => _x( 'General Settings', 'customize', 'glb' ),
		'description' => _x( 'Configure the settings for the sticky header.', 'customize', 'glb' ),
		'heading'     => array(
			'title'       => esc_html__( 'Header Sticky Setting', 'glb' ),
		)
	);
	$containers['headerStickyNav'] = array(
		'type'        => 'section',
		'panel'       => 'headerAndFooter',
		'title'       => _x( 'Navigation Bar', 'customize', 'glb' ),
		'description' => _x( '', 'customize', 'glb' )
	);

	return $containers;
}

function glb__customize_header_controls( $controls ) {
	$controls['header__position'] = array(
		'type'        => 'radio-buttons',
		'section'     => 'headerGeneral',
		'label'       => _x( 'Header Position', 'customize', 'glb' ),
		'description' => _x( '', 'customize', 'glb' ),
		'choices'     => array(
			'top'   => _x( 'Top', 'customize', 'glb' ),
			'right' => _x( 'Right', 'customize', 'glb' ),
			'bottom' => _x( 'Bottom', 'customize', 'glb' ),
			'left' => _x( 'Left', 'customize', 'glb' )
		)
	);

	/**
	 * The logo profile
	 */
	$controls['header__logo'] = array(
		'type'        => 'dropdown',
		'section'     => 'headerGeneral',
		'label'       => _x( 'logo that will be shown', 'customize', 'glb' ),
		'description' => _x( '', 'customize', 'glb' ),
		'choices'     => array(
			'logoDefault' => _x( 'Logo Default', 'customize', 'glb' ),
			'logoDark'    => _x( 'Logo Dark', 'customize', 'glb' ),
			'logoLight'   => _x( 'Logo Light', 'customize', 'glb' )
		)
	);
	$controls['header__logoAlign'] = array(
		'type'        => 'radio-buttons',
		'section'     => 'headerGeneral',
		'label'       => _x( 'Logo Alignment', 'customize', 'glb' ),
		'description' => _x( '', 'customize', 'glb' ),
		'choices'     => array(
			'left'   => _x( 'Left', 'customize', 'glb' ),
			'center' => _x( 'Center', 'customize', 'glb' ),
			'right'  => _x( 'Right', 'customize', 'glb' )
		)
	);
	$controls[ 'header__logoMargin'] = array(
		'type'        => 'dimension',
		'section'     => 'headerGeneral',
		'label'       => esc_html__( 'Logo Margin (px)', 'glb' ),
		'choices'     => array(
			'margin-top'    => esc_html__( 'Top', 'glb' ),
			'margin-right'  => esc_html__( 'Right', 'glb' ),
			'margin-bottom' => esc_html__( 'Bottom', 'glb' ),
			'margin-left'   => esc_html__( 'Left', 'glb' )
		)
	);

	/**
	 * Header Settings
	 */
	$controls['header__height'] = array(
		'type'        => 'textfield',
		'section'     => 'headerGeneral',
		'label'       => _x( 'Header Height', 'customize', 'glb' ),
		'description' => _x( '', 'customize', 'glb' )
	);
	$controls['header__width'] = array(
		'type'        => 'radio-onoff',
		'section'     => 'headerGeneral',
		'label'       => _x( '100% Header Full Width', 'customize', 'glb' ),
		'description' => _x( '', 'customize', 'glb' )
	);
	$controls['header__shadow'] = array(
		'type'        => 'radio-onoff',
		'section'     => 'headerGeneral',
		'label'       => esc_html__( 'Enable Shadow', 'glb' ),
	);
	$controls['header__transparent'] = array(
		'type'        => 'radio-onoff',
		'section'     => 'headerGeneral',
		'label'       => esc_html__( 'Enable Header Transparent', 'glb' ),
	);

	$controls['header__border'] = array(
		'type'        => 'radio-onoff',
		'section'     => 'headerGeneral',
		'label'       => esc_html__( 'Header Border', 'glb' ),
	);
	$controls[ 'header__border__options'] = array(
		'type'        => 'border',
		'section'     => 'headerGeneral',
		'choices'     => array(
			'top'    => esc_html__( 'Top', 'glb' ),
			'right'  => esc_html__( 'Right', 'glb' ),
			'bottom' => esc_html__( 'Bottom', 'glb' ),
			'left'   => esc_html__( 'Left', 'glb' )
		)
	);

	$controls['header__backgroundHeading'] = array(
		'type'        => 'heading',
		'section'     => 'headerGeneral',
		'label'       => _x( 'Header Background', 'customize', 'glb' ),
		'description' => _x( '', 'customize', 'glb' )
	);
	$controls['header__background'] = array(
		'type'        => 'background',
		'section'     => 'headerGeneral'
	);


	/**
	 * Topbar Settings
	 */
	$controls['header__topbar'] = array(
		'type'        => 'radio-onoff',
		'section'     => 'headerTopbar',
		'label'       => _x( 'Enable Topbar', 'customize', 'glb' ),
		'description' => _x( '', 'customize', 'glb' )
	);
	$controls['header__topbar__height'] = array(
		'type'        => 'text',
		'section'     => 'headerTopbar',
		'label'       => _x( 'Topbar Height', 'customize', 'glb' ),
		'description' => _x( '', 'customize', 'glb' )
	);

	// Topbar content
	$controls['header__topbar__text'] = array(
		'type'        => 'textareafield',
		'section'     => 'headerTopbar',
		'label'       => _x( 'Topbar Content', 'customize', 'glb' ),
		'description' => _x( '', 'customize', 'glb' )
	);

	$controls['header__topbar__typoHeading'] = array(
		'type'        => 'heading',
		'section'     => 'headerTopbar',
		'label'       => esc_html__( 'Topbar Font', 'glb' ),
	);
	$controls['header__topbar__typography'] = array(
		'type'        => 'typography',
		'section'     => 'headerTopbar'
	);
	$controls['header__topbar__colors'] = array(
		'type'        => 'colors',
		'section'     => 'headerTopbar',
		'label'       => esc_html__( 'Topbar Link Colors', 'glb' ),
		'choices'     => array(
			'menu'        => esc_html__( 'Link Color', 'glb' ),
			'menu-hover'  => esc_html__( 'Hover Color', 'glb' ),
			'menu-active' => esc_html__( 'Active Color', 'glb' )
		)
	);

	$controls['header__topbar__backgroundHeading'] = array(
		'type'        => 'heading',
		'section'     => 'headerTopbar',
		'label'       => _x( 'Topbar Background', 'customize', 'glb' ),
		'description' => _x( '', 'customize', 'glb' )
	);
	$controls['header__topbar__background'] = array(
		'type'        => 'background',
		'section'     => 'headerTopbar'
	);


	/**
	 * Navigation Bar Settings
	 */
	$controls['header__nav__typography'] = array(
		'type'        => 'typography',
		'section'     => 'headerNavigator',
		'label'       => esc_html__( 'Menu Font', 'glb' ),
	);
	$controls['header__nav__colors'] = array(
		'type'        => 'colors',
		'section'     => 'headerNavigator',
		'label'       => esc_html__( 'Menu Colors', 'glb' ),
		'choices'     => array(
			'menu'        => esc_html__( 'Menu Color', 'glb' ),
			'menu-hover'  => esc_html__( 'Hover Color', 'glb' ),
			'menu-active' => esc_html__( 'Active Color', 'glb' )
		)
	);
	$controls[ 'header__nav__margin'] = array(
		'type'        => 'dimension',
		'section'     => 'headerNavigator',
		'label'       => esc_html__( 'Menu Margin', 'glb' ),
		'choices'     => array(
			'margin-top'    => esc_html__( 'Top', 'glb' ),
			'margin-right'  => esc_html__( 'Right', 'glb' ),
			'margin-bottom' => esc_html__( 'Bottom', 'glb' ),
			'margin-left'   => esc_html__( 'Left', 'glb' )
		)
	);
	$controls['header__nav__padding'] = array(
		'type'        => 'dimension',
		'section'     => 'headerNavigator',
		'label'       => esc_html__( 'Menu Padding', 'glb' ),
		'choices'     => array(
			'padding-top'    => esc_html__( 'Top', 'glb' ),
			'padding-right'  => esc_html__( 'Right', 'glb' ),
			'padding-bottom' => esc_html__( 'Bottom', 'glb' ),
			'padding-left'   => esc_html__( 'Left', 'glb' )
		)
	);
	$controls['header__nav__extras'] = array(
		'type'        => 'checkboxes',
		'section'     => 'headerNavigator',
		'label'       => esc_html__( 'Show Extra Items On The Header', 'glb' ),
		'choices'     => array(
			'cart'      => _x( 'Shopping Cart', 'customize', 'glb' ),
			'search'    => _x( 'Search Box', 'customize', 'glb' )
		)
	);

	$controls['header__nav__backgroundHeading'] = array(
		'type'        => 'heading',
		'section'     => 'headerNavigator',
		'label'       => _x( 'Navigator Background', 'customize', 'glb' ),
		'description' => _x( '', 'customize', 'glb' )
	);
	$controls['header__nav__background'] = array(
		'type'        => 'background',
		'section'     => 'headerNavigator'
	);

	/**
	 * Sticky Header Settings
	 */
	$controls['header__sticky'] = array(
		'type'        => 'radio-onoff',
		'section'     => 'headerSticky',
		'label'       => _x( 'Enable Sticky Header', 'customize', 'glb' ),
		'description' => _x( '', 'customize', 'glb' ),
		'default'     => 'on'
	);
	$controls['header__sticky__logo'] = array(
		'type'        => 'dropdown',
		'section'     => 'headerSticky',
		'label'       => _x( 'logo that will be shown', 'customize', 'glb' ),
		'description' => _x( '', 'customize', 'glb' ),
		'choices'     => array(
			'logoDefault' => _x( 'Logo Default', 'customize', 'glb' ),
			'logoDark'    => _x( 'Logo Dark', 'customize', 'glb' ),
			'logoLight'   => _x( 'Logo Light', 'customize', 'glb' )
		)
	);
	$controls['header__sticky__logoAlign'] = array(
		'type'        => 'radio-buttons',
		'section'     => 'headerSticky',
		'label'       => _x( 'Logo Alignment', 'customize', 'glb' ),
		'description' => _x( '', 'customize', 'glb' ),
		'choices'     => array(
			'left'   => _x( 'Left', 'customize', 'glb' ),
			'center' => _x( 'Center', 'customize', 'glb' ),
			'right'  => _x( 'Right', 'customize', 'glb' )
		)
	);
	$controls[ 'header__sticky__logoMargin'] = array(
		'type'        => 'dimension',
		'section'     => 'headerSticky',
		'label'       => esc_html__( 'Logo Margin', 'glb' ),
		'choices'     => array(
			'margin-top'    => esc_html__( 'Top', 'glb' ),
			'margin-right'  => esc_html__( 'Right', 'glb' ),
			'margin-bottom' => esc_html__( 'Bottom', 'glb' ),
			'margin-left'   => esc_html__( 'Left', 'glb' )
		)
	);

	/**
	 * Header Settings
	 */
	$controls['header__sticky__height'] = array(
		'type'        => 'textfield',
		'section'     => 'headerSticky',
		'label'       => _x( 'Header Sticky Height', 'customize', 'glb' ),
		'description' => _x( '', 'customize', 'glb' )
	);
	$controls['header__sticky__width'] = array(
		'type'        => 'radio-onoff',
		'section'     => 'headerSticky',
		'label'       => _x( '100% Full Width', 'customize', 'glb' ),
		'description' => _x( '', 'customize', 'glb' )
	);
	
	$controls['header__sticky__shadow'] = array(
		'type'        => 'radio-onoff',
		'section'     => 'headerSticky',
		'label'       => esc_html__( 'Enable Shadow', 'glb' ),
	);

	$controls['header__sticky__border'] = array(
		'type'        => 'radio-onoff',
		'section'     => 'headerSticky',
		'label'       => esc_html__( 'Header Sticky Border', 'glb' ),
	);
	$controls[ 'header__sticky__border__options'] = array(
		'type'        => 'border',
		'section'     => 'headerSticky',
		'choices'     => array(
			'top'    => esc_html__( 'Top', 'glb' ),
			'right'  => esc_html__( 'Right', 'glb' ),
			'bottom' => esc_html__( 'Bottom', 'glb' ),
			'left'   => esc_html__( 'Left', 'glb' )
		)
	);

	$controls['header__sticky__backgroundHeading'] = array(
		'type'        => 'heading',
		'section'     => 'headerSticky',
		'label'       => _x( 'Header Sticky Background', 'customize', 'glb' ),
		'description' => _x( '', 'customize', 'glb' )
	);
	$controls['header__sticky__background'] = array(
		'type'        => 'background',
		'section'     => 'headerSticky'
	);

	$controls['header__sticky__nav__typography'] = array(
		'type'        => 'typography',
		'section'     => 'headerStickyNav',
		'label'       => esc_html__( 'Menu Sticky Font', 'glb' ),
	);
	$controls['header__sticky__nav__colors'] = array(
		'type'        => 'colors',
		'section'     => 'headerStickyNav',
		'label'       => esc_html__( 'Menu Sticky Colors', 'glb' ),
		'choices'     => array(
			'menu'        => esc_html__( 'Menu Color', 'glb' ),
			'menu-hover'  => esc_html__( 'Hover Color', 'glb' ),
			'menu-active' => esc_html__( 'Active Color', 'glb' )
		)
	);
	$controls[ 'header__sticky__nav__margin'] = array(
		'type'        => 'dimension',
		'section'     => 'headerStickyNav',
		'label'       => esc_html__( 'Menu Sticky Margin', 'glb' ),
		'choices'     => array(
			'margin-top'    => esc_html__( 'Top', 'glb' ),
			'margin-right'  => esc_html__( 'Right', 'glb' ),
			'margin-bottom' => esc_html__( 'Bottom', 'glb' ),
			'margin-left'   => esc_html__( 'Left', 'glb' )
		)
	);
	$controls['header__sticky__nav__padding'] = array(
		'type'        => 'dimension',
		'section'     => 'headerStickyNav',
		'label'       => esc_html__( 'Menu Sticky Padding', 'glb' ),
		'choices'     => array(
			'padding-top'    => esc_html__( 'Top', 'glb' ),
			'padding-right'  => esc_html__( 'Right', 'glb' ),
			'padding-bottom' => esc_html__( 'Bottom', 'glb' ),
			'padding-left'   => esc_html__( 'Left', 'glb' )
		)
	);


	/**
	 * Title bar
	 */
	$controls['header__titlebar'] = array(
		'type'        => 'dropdown',
		'section'     => 'headerTitle',
		'label'       => _x( 'Title Bar Displays', 'customize', 'glb' ),
		'description' => _x( '', 'customize', 'glb' ),
		'choices'     => array(
			'both'        => _x( 'Page Title and Breadcrumbs', 'customize', 'glb' ),
			'title'       => _x( 'Page Title Only', 'customize', 'glb' ),
			'breadcrumbs' => _x( 'Breadcrumbs Only', 'customize', 'glb' ),
			'none'        => _x( 'None', 'customize', 'glb' )
		)
	);
	$controls['header__titlebar__align'] = array(
		'type'        => 'radio-buttons',
		'section'     => 'headerTitle',
		'label'       => _x( 'Title Bar Alignment', 'customize', 'glb' ),
		'description' => _x( '', 'customize', 'glb' ),
		'choices'     => array(
			'left'   => _x( 'Left', 'customize', 'glb' ),
			'center' => _x( 'Center', 'customize', 'glb' ),
			'right'  => _x( 'Right', 'customize', 'glb' ),
			'inline' => _x( 'Inline', 'customize', 'glb' )
		)
	);
	$controls['header__titlebar__height'] = array(
		'type'        => 'textfield',
		'section'     => 'headerTitle',
		'label'       => _x( 'Title Bar Height', 'customize', 'glb' ),
		'description' => _x( '', 'customize', 'glb' )
	);
	$controls['header__titlebar__full'] = array(
		'type'        => 'radio-onoff',
		'section'     => 'headerTitle',
		'label'       => _x( 'Title Bar Full Width', 'customize', 'glb' ),
		'description' => _x( '', 'customize', 'glb' )
	);
	$controls['header__titlebar__home'] = array(
		'type'        => 'radio-onoff',
		'section'     => 'headerTitle',
		'label'       => _x( 'Display On The Homepage', 'customize', 'glb' ),
		'description' => _x( '', 'customize', 'glb' )
	);
	
	$controls['header__titlebar__shadow'] = array(
		'type'        => 'radio-onoff',
		'section'     => 'headerTitle',
		'label'       => esc_html__( 'Enable Shadow', 'glb' ),
	);

	$controls['header__titlebar__scrolldown'] = array(
		'type'        => 'radio-onoff',
		'section'     => 'headerTitle',
		'label'       => esc_html__( 'Enable Scroll Down Button', 'glb' ),
	);

	$controls['header__titlebar__border'] = array(
		'type'        => 'radio-onoff',
		'section'     => 'headerTitle',
		'label'       => esc_html__( 'Title Bar Border', 'glb' ),
	);
	$controls[ 'header__titlebar__border__options'] = array(
		'type'        => 'border',
		'section'     => 'headerTitle',
		'choices'     => array(
			'top'    => esc_html__( 'Top', 'glb' ),
			'right'  => esc_html__( 'Right', 'glb' ),
			'bottom' => esc_html__( 'Bottom', 'glb' ),
			'left'   => esc_html__( 'Left', 'glb' )
		)
	);
	$controls['header__titlebar__background'] = array(
		'type'        => 'background',
		'section'     => 'headerTitle',
		'label'   => _x( 'Title Bar Background', 'customize', 'glb' ),
		'description' => _x( '', 'customize', 'glb' )
	);
	$controls[ 'header__titlebar__margin'] = array(
		'type'        => 'dimension',
		'section'     => 'headerTitle',
		'label'       => esc_html__( 'Title Bar Margin', 'glb' ),
		'choices'     => array(
			'margin-top'    => esc_html__( 'Top', 'glb' ),
			'margin-right'  => esc_html__( 'Right', 'glb' ),
			'margin-bottom' => esc_html__( 'Bottom', 'glb' ),
			'margin-left'   => esc_html__( 'Left', 'glb' )
		)
	);
	$controls['header__titlebar__padding'] = array(
		'type'        => 'dimension',
		'section'     => 'headerTitle',
		'label'       => esc_html__( 'Title Bar Padding', 'glb' ),
		'choices'     => array(
			'padding-top'    => esc_html__( 'Top', 'glb' ),
			'padding-right'  => esc_html__( 'Right', 'glb' ),
			'padding-bottom' => esc_html__( 'Bottom', 'glb' ),
			'padding-left'   => esc_html__( 'Left', 'glb' )
		)
	);
	$controls['header__titlebar__backgroundFeatured'] = array(
		'type'        => 'checkboxes',
		'section'     => 'headerTitle',
		'label'       => _x( 'Use Featured Image As Background in', 'customize', 'glb' ),
		'description' => _x( '', 'customize', 'glb' ),
		'choices'     => 'glb__customize_post_types_options'
	);

	$controls['header__titlebar__titleHeading'] = array(
		'type'        => 'heading',
		'section'     => 'headerTitle',
		'label'       => _x( 'Page Title Font', 'customize', 'glb' ),
		'description' => _x( '', 'customize', 'glb' )
	);
	$controls['header__titlebar__titleFont'] = array(
		'type'        => 'typography',
		'section'     => 'headerTitle'
	);

	$controls['header__titlebar__breadcrumbHeading'] = array(
		'type'        => 'heading',
		'section'     => 'headerTitle',
		'label'       => _x( 'Breadcrumbs Font', 'customize', 'glb' ),
		'description' => _x( '', 'customize', 'glb' )
	);
	$controls['header__titlebar__breadcrumbFont'] = array(
		'type'        => 'typography',
		'section'     => 'headerTitle'
	);
	$controls['header__titlebar__breadcrumbColors'] = array(
		'type'        => 'colors',
		'section'     => 'headerTitle',
		'label'       => _x( 'Breadcrumbs Link Color', 'customize', 'glb' ),
		'choices'     => array(
			'link' => _x( 'Link Color', 'customize', 'glb' ),
			'linkHover' => _x( 'Hover Color', 'customize', 'glb' )
		)
	);


	/**
	 * Sticky Header Settings
	 */
	$controls['header__widgets'] = array(
		'type'        => 'radio-onoff',
		'section'     => 'header__widgets',
		'label'       => _x( 'Enable Sticky Header', 'customize', 'glb' ),
		'description' => _x( 'Turn ON to enable the header widgets area', 'customize', 'glb' ),
		'default'     => 'on'
	);

	return $controls;
}



function glb__customize_header_settings( $settings ) {
	$border_default = array( 'size' => '0px', 'style' => 'none', 'color' => '#000000' );
	$settings = array_merge( $settings, array(
		'header__position'  => array( 'default' => 'top' ),
		'header__logo'       => array( 'default' => 'logoDefault' ),
		'header__logoAlign'  => array( 'default' => 'left' ),
		'header__logoMargin' => array( 'default' => array(
			'margin-top'    => '0px', 'margin-right'  => '0px',
			'margin-bottom' => '0px', 'margin-left'   => '0px'
		) ),

		'header__width'      => array( 'default' => 'on' ),
		'header__height'     => array( 'default' => '80px' ),
		'header__background' => array( 'default' => array() ),
		'header__shadow'     => array( 'default' => 'off' ),
		'header__border'     => array( 'default' => 'off' ),
		'header__border__options'     => array( 'default' => array(
			'all'  => $border_default, 'top'   => $border_default, 'bottom' => $border_default,
			'left' => $border_default, 'right' => $border_default
		) ),
		'header__transparent' => array( 'default' => 'off' ),

		'header__topbar'             => array( 'default' => 'on' ),
		'header__topbar__width'      => array( 'default' => 'on' ),
		'header__topbar__height'     => array( 'default' => '40px' ),
		'header__topbar__text'       => array( 'default' => '' ),
		'header__topbar__icons'      => array( 'default' => '' ),
		'header__topbar__background' => array( 'default' => array() ),
		'header__topbar__typography' => array( 'default' => array() ),
		'header__topbar__colors'     => array( 'default' => array() ),

		'header__nav__typography' => array( 'default' => array() ),
		'header__nav__colors'     => array( 'default' => array() ),
		'header__nav__margin'     => array( 'default' => array(
			'margin-top'    => '0px', 'margin-right' => '0px',
			'margin-bottom' => '0px', 'margin-left'  => '0px'
		) ),
		'header__nav__padding' => array( 'default' => array(
			'padding-top'    => '0px', 'padding-right' => '0px',
			'padding-bottom' => '0px', 'padding-left'  => '0px'
		) ),
		'header__nav__background' => array( 'default' => array() ),
		'header__nav__extras'     => array( 'default' => array() ),


		'header__sticky__logo'       => array( 'default' => 'logoDefault' ),
		'header__sticky__logoAlign'  => array( 'default' => 'left' ),
		'header__sticky__logoMargin' => array( 'default' => array(
			'margin-top'    => '0px', 'margin-right'  => '0px',
			'margin-bottom' => '0px', 'margin-left'   => '0px'
		) ),

		'header__sticky__width'      => array( 'default' => 'on' ),
		'header__sticky__height'     => array( 'default' => '80px' ),
		'header__sticky__background' => array( 'default' => array() ),
		'header__sticky__shadow'     => array( 'default' => 'off' ),
		'header__sticky__border'     => array( 'default' => 'off' ),
		'header__sticky__border__options'     => array( 'default' => array(
			'all'  => $border_default, 'top'   => $border_default, 'bottom' => $border_default,
			'left' => $border_default, 'right' => $border_default
		) ),
		'header__sticky__transparent' => array( 'default' => 'off' ),
		'header__sticky__nav__typography' => array( 'default' => array() ),
		'header__sticky__nav__colors'     => array( 'default' => array() ),
		'header__sticky__nav__margin'     => array( 'default' => array(
			'margin-top'    => '0px', 'margin-right' => '0px',
			'margin-bottom' => '0px', 'margin-left'  => '0px'
		) ),
		'header__sticky__nav__padding'    => array( 'default' => array(
			'padding-top'    => '0px', 'padding-right' => '0px',
			'padding-bottom' => '0px', 'padding-left'  => '0px'
		) ),

		'header__titlebar'         => array( 'default' => 'both' ),
		'header__titlebar__home'   => array( 'default' => 'on' ),
		'header__titlebar__align'  => array( 'default' => 'left' ),
		'header__titlebar__full'   => array( 'default' => 'off' ),
		'header__titlebar__height' => array( 'default' => '80px' ),
		'header__titlebar__margin' => array( 'default' => array(
			'margin-top'    => '0px', 'margin-right' => '0px',
			'margin-bottom' => '0px', 'margin-left'  => '0px'
		) ),
		'header__titlebar__padding' => array( 'default' => array(
			'padding-top'    => '0px', 'padding-right' => '0px',
			'padding-bottom' => '0px', 'padding-left'  => '0px'
		) ),
		'header__titlebar__shadow' => array( 'default' => 'off' ),
		'header__titlebar__scrolldown' => array( 'default' => 'on' ),
		'header__titlebar__border' => array( 'default' => 'off' ),
		'header__titlebar__border__options' => array( 'default' => array(
			'all'  => $border_default, 'top'   => $border_default, 'bottom' => $border_default,
			'left' => $border_default, 'right' => $border_default
		) ),
		'header__titlebar__background'         => array( 'default' => array() ),
		'header__titlebar__backgroundFeatured' => array( 'default' => array() ),
		'header__titlebar__titleFont'          => array( 'default' => array() ),
		'header__titlebar__breadcrumbFont'     => array( 'default' => array() ),
		'header__titlebar__breadcrumbColors'   => array( 'default' => array() ),
	) );

	return $settings;
}
