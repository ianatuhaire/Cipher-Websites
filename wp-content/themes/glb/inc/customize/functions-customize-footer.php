<?php
defined( 'ABSPATH' ) or die();


// Add filter to register customize containers
add_filter( 'glb__customize_containers', 'glb__customize_footer_containers' );
add_filter( 'glb__customize_settings', 'glb__customize_footer_settings' );


// Add filter to register customize controls
add_filter( 'glb__customize_controls', 'glb__customize_footer_controls' );
add_filter( 'glb__customize_controls', 'glb__customize_footer_widgets_controls' );
add_filter( 'glb__customize_controls', 'glb__customize_footer_copyright_controls' );


function glb__customize_footer_containers( $containers ) {
	$containers['footerGeneral'] = array(
		'type'    => 'section',
		'panel'   => 'headerAndFooter',
		'title'   => _x( 'General Settings', 'customize', 'glb' ),
		'heading' => array(
			'title'       => _x( 'Footer Settings', 'customize', 'glb' ),
			'description' => _x( '', 'customize', 'glb' )
		)
	);
	$containers['footerWidgets'] = array(
		'type'  => 'section',
		'panel' => 'headerAndFooter',
		'title' => _x( 'Widget Areas', 'customize', 'glb' )
	);
	$containers['footerCopyright'] = array(
		'type'  => 'section',
		'panel' => 'headerAndFooter',
		'title' => _x( 'Copyright Settings', 'customize', 'glb' )
	);

	return $containers;
}


function glb__customize_footer_settings( $settings ) {
	$settings['footer__background'] = array( 'default' => array() );
	$settings['footer__typography'] = array( 'default' => array() );
	$settings['footer__colors']     = array( 'default' => array() );
	$settings['footer__border']     = array( 'default' => array(
		'all'    => array( 'size' => '0px', 'style' => 'none', 'color' => '#000000' ),
		'top'    => array( 'size' => '0px', 'style' => 'none', 'color' => '#000000' ),
		'right'  => array( 'size' => '0px', 'style' => 'none', 'color' => '#000000' ),
		'bottom' => array( 'size' => '0px', 'style' => 'none', 'color' => '#000000' ),
		'left'   => array( 'size' => '0px', 'style' => 'none', 'color' => '#000000' )
	) );
	$settings['footer__padding']    = array( 'default' => array(
		'padding-top'    => '0px',
		'padding-right'  => '0px',
		'padding-bottom' => '0px',
		'padding-left'   => '0px'
	) );


	$settings['footer__copyright']             = array( 'default' => 'on' );
	$settings['footer__copyright__content']    = array( 'default' => 'Copyright &copy; 2017 LineThemes.' );
	$settings['footer__copyright__align']      = array( 'default' => 'center' );
	$settings['footer__copyright__full']         = array( 'default' => 'off' );
	$settings['footer__copyright__typography'] = array( 'default' => array() );
	$settings['footer__copyright__colors'] = array( 'default' => array() );
	$settings['footer__copyright__border']     = array( 'default' => array(
		'all'    => array( 'size' => '0px', 'style' => 'none', 'color' => '#000000' ),
		'top'    => array( 'size' => '0px', 'style' => 'none', 'color' => '#000000' ),
		'right'  => array( 'size' => '0px', 'style' => 'none', 'color' => '#000000' ),
		'bottom' => array( 'size' => '0px', 'style' => 'none', 'color' => '#000000' ),
		'left'   => array( 'size' => '0px', 'style' => 'none', 'color' => '#000000' )
	) );
	$settings['footer__copyright__padding'] = array( 'default' => array(
		'padding-top'    => '0px',
		'padding-right'  => '0px',
		'padding-bottom' => '0px',
		'padding-left'   => '0px'
	) );
	$settings['footer__copyright__background'] = array( 'default' => array() );


	$settings['footer__widgets']                  = array( 'default' => 'off' );
	$settings['footer__widgets__layout']          = array( 'default' => array(
		'columns' => 4,
		'layout'  => array(
			1 => array( 12 ),
			2 => array( 6, 6 ),
			3 => array( 4, 4, 4 ),
			4 => array( 3, 3, 3, 3 ),
		)
	) );
	$settings['footer__widgets__full']            = array( 'default' => 'off' );
	$settings['footer__widgets__padding']         = array( 'default' => array(
		'padding-top'    => '0px',
		'padding-right'  => '0px',
		'padding-bottom' => '0px',
		'padding-left'   => '0px'
	) );
	$settings['footer__widgets__background']      = array( 'default' => array() );
	$settings['footer__widgets__typography']      = array( 'default' => array() );
	$settings['footer__widgets__colors']          = array( 'default' => array() );
	$settings['footer__widgets__title']           = array( 'default' => array() );
	$settings['footer__widgets__margin']          = array( 'default' => array(
		'margin-top'    => '0px',
		'margin-right'  => '0px',
		'margin-bottom' => '0px',
		'margin-left'   => '0px'
	) );

	return $settings;
}



function glb__customize_footer_controls( $controls ) {
	$controls['footer__background'] = array(
		'type'        => 'background',
		'section'     => 'footerGeneral',
		'label'       => _x( 'Footer Background', 'customize', 'glb' ),
		'description' => _x( '', 'customize', 'glb' )
	);

	$controls['footer__typography'] = array(
		'type'        => 'typography',
		'section'     => 'footerGeneral',
		'label'       => _x( 'Footer Font', 'customize', 'glb' ),
		'description' => _x( '', 'customize', 'glb' )
	);
	$controls['footer__colors'] = array(
		'type'        => 'colors',
		'section'     => 'footerGeneral',
		'label'       => _x( 'Footer Link Colors', 'customize', 'glb' ),
		'description' => _x( '', 'customize', 'glb' ),
		'choices'     => array(
			'link'      => _x( 'Link', 'customize', 'glb' ),
			'linkHover' => _x( 'Link Hover', 'customize', 'glb' )
		)
	);
	$controls['footer__padding'] = array(
		'type'        => 'dimension',
		'section'     => 'footerGeneral',
		'label'       => _x( 'Footer Padding', 'customize', 'glb' ),
		'description' => _x( '', 'customize', 'glb' ),
		'choices'     => array(
			'padding-top'    => _x( 'Top', 'customize', 'glb' ),
			'padding-right'  => _x( 'Right', 'customize', 'glb' ),
			'padding-bottom' => _x( 'Bottom', 'customize', 'glb' ),
			'padding-left'   => _x( 'Left', 'customize', 'glb' )
		)
	);
	$controls['footer__border'] = array(
		'type'        => 'border',
		'section'     => 'footerGeneral',
		'label'       => _x( 'Footer Border', 'customize', 'glb' ),
		'description' => _x( '', 'customize', 'glb' ),
		'choices'     => array(
			'top'    => esc_html__( 'Top', 'glb' ),
			'right'  => esc_html__( 'Right', 'glb' ),
			'bottom' => esc_html__( 'Bottom', 'glb' ),
			'left'   => esc_html__( 'Left', 'glb' )
		)
	);

	return $controls;
}



function glb__customize_footer_copyright_controls( $controls ) {
	$controls['footer__copyright'] = array(
		'type'        => 'radio-onoff',
		'section'     => 'footerCopyright',
		'label'       => _x( 'Enable Copyright Bar', 'customize', 'glb' ),
		'description' => _x( '', 'customize', 'glb' )
	);
	$controls['footer__copyright__full'] = array(
		'type'        => 'radio-onoff',
		'section'     => 'footerCopyright',
		'label'       => _x( '100% Full Width', 'customize', 'glb' ),
		'description' => _x( '', 'customize', 'glb' )
	);
	$controls['footer__copyright__content'] = array(
		'type'        => 'textareafield',
		'section'     => 'footerCopyright',
		'label'       => _x( 'Copyright Content', 'customize', 'glb' ),
		'description' => _x( '', 'customize', 'glb' )
	);
	$controls['footer__copyright__align'] = array(
		'type'        => 'radio-buttons',
		'section'     => 'footerCopyright',
		'label'       => _x( 'Copyright Bar Alignment', 'customize', 'glb' ),
		'description' => _x( '', 'customize', 'glb' ),
		'choices'     => array(
			'left'   => _x( 'Left', 'customize', 'glb' ),
			'center' => _x( 'Center', 'customize', 'glb' ),
			'right'  => _x( 'Right', 'customize', 'glb' )
		)
	);
	$controls['footer__copyright__background'] = array(
		'type'        => 'background',
		'section'     => 'footerCopyright',
		'label'       => _x( 'Copyright Bar Background', 'customize', 'glb' )
	);

	$controls['footer__copyright__typography'] = array(
		'type'        => 'typography',
		'section'     => 'footerCopyright',
		'label'       => _x( 'Typography', 'customize', 'glb' ),
		'description' => _x( '', 'customize', 'glb' )
	);
	$controls['footer__copyright__colors'] = array(
		'type'        => 'colors',
		'section'     => 'footerCopyright',
		'label'       => _x( 'Link Colors', 'customize', 'glb' ),
		'description' => _x( '', 'customize', 'glb' ),
		'choices'     => array(
			'link'      => _x( 'Link', 'customize', 'glb' ),
			'linkHover' => _x( 'Link Hover', 'customize', 'glb' )
		)
	);

	$controls['footer__copyright__border'] = array(
		'type'        => 'border',
		'section'     => 'footerCopyright',
		'label'       => _x( 'Border', 'customize', 'glb' ),
		'description' => _x( '', 'customize', 'glb' ),
		'choices'     => array(
			'top'    => esc_html__( 'Top', 'glb' ),
			'right'  => esc_html__( 'Right', 'glb' ),
			'bottom' => esc_html__( 'Bottom', 'glb' ),
			'left'   => esc_html__( 'Left', 'glb' )
		)
	);
	$controls['footer__copyright__padding'] = array(
		'type'        => 'dimension',
		'section'     => 'footerCopyright',
		'label'       => _x( 'Padding', 'customize', 'glb' ),
		'description' => _x( '', 'customize', 'glb' ),
		'choices'     => array(
			'padding-top'    => _x( 'Top', 'customize', 'glb' ),
			'padding-right'  => _x( 'Right', 'customize', 'glb' ),
			'padding-bottom' => _x( 'Bottom', 'customize', 'glb' ),
			'padding-left'   => _x( 'Left', 'customize', 'glb' )
		)
	);

	return $controls;
}



function glb__customize_footer_widgets_controls( $controls ) {
	$controls['footer__widgets'] = array(
		'type'        => 'radio-onoff',
		'section'     => 'footerWidgets',
		'label'       => _x( 'Enable Footer Widget Areas', 'customize', 'glb' ),
		'description' => _x( '', 'customize', 'glb' )
	);
	$controls['footer__widgets__full'] = array(
		'type'        => 'radio-onoff',
		'section'     => 'footerWidgets',
		'label'       => _x( '100% Full Width', 'customize', 'glb' ),
		'description' => _x( '', 'customize', 'glb' )
	);
	$controls['footer__widgets__layout'] = array(
		'type'        => 'column-layout',
		'section'     => 'footerWidgets',
		'label'       => _x( 'Widgetized Layout Builder', 'customize', 'glb' ),
		'description' => _x( '', 'customize', 'glb' )
	);
	$controls['footer__widgets__background'] = array(
		'type'        => 'background',
		'section'     => 'footerWidgets',
		'label'       => _x( 'Footer Widget Areas Background', 'customize', 'glb' ),
		'description' => _x( '', 'customize', 'glb' )
	);
	$controls['footer__widgets__padding'] = array(
		'type'        => 'dimension',
		'section'     => 'footerWidgets',
		'label'       => _x( 'Footer Widget Areas Padding', 'customize', 'glb' ),
		'description' => _x( '', 'customize', 'glb' ),
		'choices'     => array(
			'padding-top'    => _x( 'Top', 'customize', 'glb' ),
			'padding-right'  => _x( 'Right', 'customize', 'glb' ),
			'padding-bottom' => _x( 'Bottom', 'customize', 'glb' ),
			'padding-left'   => _x( 'Left', 'customize', 'glb' )
		)
	);
	$controls['footer__widgets__typography'] = array(
		'type'        => 'typography',
		'section'     => 'footerWidgets',
		'label'       => _x( 'Footer Widget Areas Font', 'customize', 'glb' ),
		'description' => _x( '', 'customize', 'glb' )
	);
	$controls['footer__widgets__colors'] = array(
		'type'        => 'colors',
		'section'     => 'footerWidgets',
		'label'       => _x( 'Footer Widget Areas Link Colors', 'customize', 'glb' ),
		'description' => _x( '', 'customize', 'glb' ),
		'choices'     => array(
			'link'      => _x( 'Link', 'customize', 'glb' ),
			'linkHover' => _x( 'Link Hover', 'customize', 'glb' )
		)
	);
	$controls['footer__widgets__titleHeading'] = array(
		'type'        => 'heading',
		'section'     => 'footerWidgets',
		'label'       => esc_html__( 'Footer Widget Title Font', 'glb' ),
	);
	$controls['footer__widgets__title'] = array(
		'type'        => 'typography',
		'section'     => 'footerWidgets'
	);
	$controls['footer__widgets__margin'] = array(
		'type'    => 'dimension',
		'section' => 'footerWidgets',
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

