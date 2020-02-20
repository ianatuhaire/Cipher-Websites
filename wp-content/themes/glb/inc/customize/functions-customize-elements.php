<?php
defined( 'ABSPATH' ) or die();


// Add filter to register customize containers
add_filter( 'glb__customize_containers', 'glb__customize_elements_containers' );
add_filter( 'glb__customize_settings', 'glb__customize_elements_settings' );


// Add filter to register customize controls
add_filter( 'glb__customize_controls', 'glb__customize_elements_button_controls' );
add_filter( 'glb__customize_controls', 'glb__customize_elements_input_controls' );
// add_filter( 'glb__customize_controls', 'glb__customize_elements_layout_controls' );
// add_filter( 'glb__customize_controls', 'glb__customize_elements_styles_controls' );
// add_filter( 'glb__customize_controls', 'glb__customize_elements_connections_controls' );


function glb__customize_elements_containers( $containers ) {
	$containers['elementButton'] = array(
		'type'  => 'section',
		'panel' => 'global__styles',
		'title' => esc_html__( 'Button', 'glb' ),
		'heading'     => array(
			'title'       => esc_html__( 'Element Settings', 'glb' ),
			'description' => esc_html__( 'Controls the settings for customizing the element styles.', 'glb' )
		)
	);
	$containers['elementInput'] = array(
		'type'  => 'section',
		'panel' => 'global__styles',
		'title' => esc_html__( 'Input, Textarea & Select', 'glb' )
	);

	return $containers;
}

function glb__customize_elements_settings( $settings ) {
	// The default settings for the button
	$settings['button__height'] = array( 'default' => '50px' );
	$settings['button__border'] = array( 'default' => array(
		'all'    => array( 'size' => '0px', 'style' => 'none', 'color' => '#000000' ),
		'top'    => array( 'size' => '0px', 'style' => 'none', 'color' => '#000000' ),
		'right'  => array( 'size' => '0px', 'style' => 'none', 'color' => '#000000' ),
		'bottom' => array( 'size' => '0px', 'style' => 'none', 'color' => '#000000' ),
		'left'   => array( 'size' => '0px', 'style' => 'none', 'color' => '#000000' )
	) );
	$settings['button__borderRadius'] = array( 'default' => '0px' );
	$settings['button_colors'] = array( 'default' => array(
		'default' => '',
		'hover'   => '',
		'pressed' => ''
	) );
	$settings['button__typography'] = array( 'default' => array() );
	$settings['button__padding']    = array( 'default' => array(
		'padding-top' => '0px', 'padding-right' => '0px', 'padding-bottom' => '0px', 'padding-left' => '0px'
	) );

	// The default settings for the input
	$settings['input__height'] = array( 'default' => '50px' );
	$settings['input__border'] = array( 'default' => array(
		'all'    => array( 'size' => '0px', 'style' => 'none', 'color' => '#000000' ),
		'top'    => array( 'size' => '0px', 'style' => 'none', 'color' => '#000000' ),
		'right'  => array( 'size' => '0px', 'style' => 'none', 'color' => '#000000' ),
		'bottom' => array( 'size' => '0px', 'style' => 'none', 'color' => '#000000' ),
		'left'   => array( 'size' => '0px', 'style' => 'none', 'color' => '#000000' )
	) );
	$settings['input__borderRadius'] = array( 'default' => '0px' );
	$settings['input_colors'] = array( 'default' => array(
		'default' => '',
		'hover'   => '',
		'pressed' => ''
	) );
	$settings['input__typography'] = array( 'default' => array() );
	$settings['input__padding']    = array( 'default' => array(
		'padding-top' => '0px', 'padding-right' => '0px', 'padding-bottom' => '0px', 'padding-left' => '0px'
	) );

	return $settings;
}

function glb__customize_elements_button_controls( $controls ) {
	$controls['button__background'] = array(
		'type'        => 'color',
		'section'     => 'elementButton',
		'label'       => esc_html__( 'Button Background Color', 'glb' ),
	);

	$controls['button__height'] = array(
		'type'        => 'textfield',
		'section'     => 'elementButton',
		'label'       => esc_html__( 'Button Height (px)', 'glb' ),
	);

	$controls['button__typography'] = array(
		'type'        => 'typography',
		'section'     => 'elementButton',
		'label'       => esc_html__( 'Button Font', 'glb' ),
	);

	$controls['button__padding'] = array(
		'type'        => 'dimension',
		'section'     => 'elementButton',
		'label'       => esc_html__( 'Button Padding', 'glb' ),
		'choices'     => array(
			'padding-top'    => esc_html__( 'Top', 'glb' ),
			'padding-right'  => esc_html__( 'Right', 'glb' ),
			'padding-bottom' => esc_html__( 'Bottom', 'glb' ),
			'padding-left'   => esc_html__( 'Left', 'glb' )
		)
	);

	$controls['button__border'] = array(
		'type'        => 'border',
		'section'     => 'elementButton',
		'label'       => esc_html__( 'Button Border', 'glb' ),
		'choices'     => array(
			'top'    => esc_html__( 'Top', 'glb' ),
			'right'  => esc_html__( 'Right', 'glb' ),
			'bottom' => esc_html__( 'Bottom', 'glb' ),
			'left'   => esc_html__( 'Left', 'glb' )
		)
	);
	$controls['button__borderRadius'] = array(
		'type'        => 'textfield',
		'section'     => 'elementButton',
		'label'       => esc_html__( 'Button Border Radius', 'glb' ),
	);

	return $controls;
}

function glb__customize_elements_input_controls( $controls ) {
	$controls['input__background'] = array(
		'type'        => 'color',
		'section'     => 'elementInput',
		'label'       => esc_html__( 'Background Color', 'glb' ),
	);

	$controls['input__height'] = array(
		'type'        => 'textfield',
		'section'     => 'elementInput',
		'label'       => esc_html__( 'Height (px)', 'glb' ),
	);

	$controls['input__typography'] = array(
		'type'        => 'typography',
		'section'     => 'elementInput',
		'label'       => esc_html__( 'Font', 'glb' ),
	);

	$controls['input__padding'] = array(
		'type'        => 'dimension',
		'section'     => 'elementInput',
		'label'       => esc_html__( 'Padding', 'glb' ),
		'choices'     => array(
			'padding-top'    => esc_html__( 'Top', 'glb' ),
			'padding-right'  => esc_html__( 'Right', 'glb' ),
			'padding-bottom' => esc_html__( 'Bottom', 'glb' ),
			'padding-left'   => esc_html__( 'Left', 'glb' )
		)
	);

	$controls['input__border'] = array(
		'type'        => 'border',
		'section'     => 'elementInput',
		'label'       => esc_html__( 'Border', 'glb' ),
		'choices'     => array(
			'top'    => esc_html__( 'Top', 'glb' ),
			'right'  => esc_html__( 'Right', 'glb' ),
			'bottom' => esc_html__( 'Bottom', 'glb' ),
			'left'   => esc_html__( 'Left', 'glb' )
		)
	);
	$controls['input__borderRadius'] = array(
		'type'        => 'textfield',
		'section'     => 'elementInput',
		'label'       => esc_html__( 'Border Radius', 'glb' ),
	);

	return $controls;
}
