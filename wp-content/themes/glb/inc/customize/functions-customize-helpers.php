<?php
defined( 'ABSPATH' ) or die();


/**
 * The helper function to generate controls definition
 * for the branding section
 * 
 * @param   array  $controls   The controls list
 * @param   array  $args       The arguments to generate the controls
 * 
 * @return  array
 * @since   1.0.0
 */
function glb__customize_generate_branding_controls( array &$controls, array $args ) {
	$args = array_replace_recursive( array(
			'prefix'  => '',
			'section' => false,
			'heading' => false
		), $args );

	if ( is_array( $args['heading'] ) ) {
		$controls[ $args['prefix'] . 'logoHeading' ] = array(
			'type'        => 'heading',
			'section'     => $args['section'],
			'label'       => $args['heading']['label'],
			'description' => $args['heading']['description']
		);
	}

	$controls[ $args['prefix'] . 'logo'] = array(
		'type'        => 'media-picker',
		'section'     => $args['section'],
		'label'       => esc_html__( 'Logo', 'glb' ),
	);
	$controls[ $args['prefix'] . 'logoRetina'] = array(
		'type'        => 'media-picker',
		'section'     => $args['section'],
		'label'       => esc_html__( 'Logo Retina', 'glb' ),
	);
	$controls[ $args['prefix'] . 'logoSize'] = array(
		'type'        => 'dimension',
		'section'     => $args['section'],
		'label'       => esc_html__( 'Logo Size', 'glb' ),
		'choices'     => array(
			'width'   => esc_html__( 'Width', 'glb' ),
			'height'  => esc_html__( 'Height', 'glb' )
		)
	);
	
	return $controls;
}


/**
 * The helper function to generate controls definition
 * for the background section
 * 
 * @param   array  $controls   The controls list
 * @param   array  $args       The arguments to generate the controls
 * 
 * @since   1.0.0
 */
function glb__customize_generate_background_controls( array &$controls, array $args ) {
	$args = array_replace_recursive( array(
			'prefix'  => '',
			'section' => false,
			'heading' => false
		), $args );

	if ( is_array( $args['heading'] ) ) {
		$controls[ $args['prefix'] . 'backgroundHeading' ] = array(
			'type'        => 'heading',
			'section'     => $args['section'],
			'label'       => $args['heading']['label'],
			'description' => $args['heading']['description']
		);
	}

	// Adding the controls
	$controls[ $args['prefix'] . 'backgroundImage'] = array(
		'type'        => 'media-picker',
		'section'     => $args['section'],
		'label'       => esc_html__( 'Image', 'glb' ),
		'description' => esc_html__( 'Select an image for the background. If left empty, the background color will be used.', 'glb' )
	);
	$controls[ $args['prefix'] . 'backgroundColor'] = array(
		'type'        => 'color-picker',
		'section'     => $args['section'],
		'label'       => esc_html__( 'Color', 'glb' ),
		'description' => esc_html__( 'Select the color you want to use for the background.', 'glb' )
	);
	$controls[ $args['prefix'] . 'backgroundRepeat'] = array(
		'type'    => 'dropdown',
		'section' => $args['section'],
		'label'   => esc_html__( 'Repeat', 'glb' ),
		'choices' => array(
			'no-repeat' => esc_html__( 'No Repeat', 'glb' ),
			'repeat-x'  => esc_html__( 'Repeat X', 'glb' ),
			'repeat-y'  => esc_html__( 'Repeat Y', 'glb' ),
			'repeat'    => esc_html__( 'Repeat Both', 'glb' )
		)
	);
	$controls[ $args['prefix'] . 'backgroundPosition'] = array(
		'type'    => 'dropdown',
		'section' => $args['section'],
		'label'   => esc_html__( 'Position', 'glb' ),
		'choices' => array(
			'top left'      => esc_html__( 'Top Left', 'glb' ),
			'top center'    => esc_html__( 'Top Center', 'glb' ),
			'top right'     => esc_html__( 'Top Right', 'glb' ),
			'center left'   => esc_html__( 'Center Left', 'glb' ),
			'center center' => esc_html__( 'Center Center', 'glb' ),
			'center right'  => esc_html__( 'Center Right', 'glb' ),
			'bottom left'   => esc_html__( 'Bottom Left', 'glb' ),
			'bottom center' => esc_html__( 'Bottom Center', 'glb' ),
			'bottom right'  => esc_html__( 'Bottom Right', 'glb' ),
			'custom'        => esc_html__( 'Custom Position', 'glb' )
		)
	);
	$controls[ $args['prefix'] . 'backgroundOffset'] = array(
		'type'    => 'dimension',
		'section' => $args['section'],
		'label'   => esc_html__( 'Custom Position', 'glb' ),
		'depends' => array(
			$args['prefix'] . 'backgroundPosition' => array( 'equals', 'custom' )
		),
		'fields'  => array(
			'x' => esc_html__( 'Position X', 'glb' ),
			'y' => esc_html__( 'Position Y', 'glb' )
		)
	);
	$controls[ $args['prefix'] . 'backgroundAttachment'] = array(
		'type'    => 'dropdown',
		'section' => $args['section'],
		'label'   => esc_html__( 'Attachment', 'glb' ),
		'choices' => array(
			'fixed'      => esc_html__( 'Fixed', 'glb' ),
			'scroll'     => esc_html__( 'Scroll', 'glb' )
		)
	);
	$controls[ $args['prefix'] . 'backgroundSize'] = array(
		'type'    => 'dropdown',
		'section' => $args['section'],
		'label'   => esc_html__( 'Size', 'glb' ),
		'choices' => array(
			'auto'       => esc_html__( 'Auto', 'glb' ),
			'cover'      => esc_html__( 'Cover', 'glb' ),
			'contain'    => esc_html__( 'Contain', 'glb' ),
			'fit-width'  => esc_html__( '100% Width', 'glb' ),
			'fit-height' => esc_html__( '100% Height', 'glb' ),
			'stretch'    => esc_html__( 'Stretch', 'glb' ),
			'custom'    => esc_html__( 'Custom', 'glb' )
		)
	);

	$controls[ $args['prefix'] . 'backgroundCustomSize'] = array(
		'type'    => 'dimension',
		'section' => $args['section'],
		'label'   => esc_html__( 'Size', 'glb' ),
		'depends' => array( $args['prefix'] . 'backgroundSize' => array( 'equals', 'custom' ) ),
		'fields'  => array(
			'width'  => esc_html__( 'Width', 'glb' ),
			'height' => esc_html__( 'Height', 'glb' )
		)
	);
}


/**
 * The helper function to generate controls definition
 * for the typography section
 * 
 * @param   array  $controls   The controls list
 * @param   array  $args       The arguments to generate the controls
 * 
 * @return  array
 * @since   1.0.0
 */
function glb__customize_generate_typography_controls( &$controls, $args ) {

}


/**
 * Retrieve the menu list for using as the menu dropdown
 * 
 * @return  array
 * @since   1.0.0
 */
function glb__customize_dropdown_menus() {
	$menus   = wp_get_nav_menus();
	$choices = array( 0 => esc_html__( '-- Select Menu --', 'glb' ) );
	$choices = array_merge( $choices, wp_list_pluck( $menus, 'name', 'term_id' ) );

	return $choices;
}


/**
 * Return an array of sidebars that will be use for
 * the dropdown in the theme options
 * 
 * @return  array
 */
function glb__customize_dropdown_sidebars() {
	global $wp_registered_sidebars;
	static $sidebars;

	if ( empty( $sidebars ) ) {
		$sidebars = array();

		foreach ( $wp_registered_sidebars as $sidebar ) {
			if ( $sidebar['id'] == 'wp_inactive_widgets' || strpos( $sidebar['id'], 'orphaned_widgets' ) !== false )
				continue;
			
			$sidebars[$sidebar['id']] = $sidebar['name'];
		}
	}
	
	return $sidebars;
}


function glb__customize_post_types_options() {
	$post_types = get_post_types( array( 'public' => true ), 'objects' );

	return wp_list_pluck(
		$post_types,
		'label',
		'name'
	);
}
