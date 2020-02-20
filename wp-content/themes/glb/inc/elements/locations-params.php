<?php
return array(
	'name'     => esc_html__('LineThemes: Locations', 'glb'),
	'base'     => 'locations',
	'category' => 'LineThemes',
	'params'   => array(
		array(
			'type'        => 'dropdown',
			'heading'     => esc_html__( 'Maps Type', 'glb' ),
			'description' => esc_html__( 'Select the Maps type', 'glb' ),
			'group'       => esc_html__( 'Maps Settings', 'glb' ),
			'param_name'  => 'type',
			'std'         => 'roadmap',
			'value'       => array(
				'ROADMAP'   => 'roadmap',
				'SATELLITE' => 'satellite',
				'HYBRID'    => 'hybrid',
				'TERRAIN'   => 'terrain'
			)
		),

		array(
			'type'        => 'dropdown',
			'heading'     => esc_html__( 'Maps Style', 'glb' ),
			'description' => esc_html__( 'Select style for the Maps', 'glb' ),
			'group'       => esc_html__( 'Maps Settings', 'glb' ),
			'param_name'  => 'style',
			'std'         => 'default',
			'value'       => array(
				'Default'          => 'default',
				'Subtle Grayscale' => 'subtle-grayscale',
				'Pale Dawn'        => 'pale-dawn',
				'Blue Water'       => 'blue-warter',
				'Light Monochrome' => 'light-monochrome',
				'Shades of Gray'   => 'shades-of-gray'
			)
		),

		array(
			'type'        => 'dropdown',
			'heading'     => esc_html__( 'Zoom Level', 'glb' ),
			'group'       => esc_html__( 'Maps Settings', 'glb' ),
			'param_name'  => 'zoomlevel',
			'description' => esc_html__( 'Select the default zoom level for the Maps', 'glb' ),
			'value'       => array_combine( range( 1, 24 ), range( 1, 24 ) ),
			'std'         => 15
		),

		array(
			'type'        => 'dropdown',
			'heading'     => esc_html__( 'Enable Zoom On Mouse Scroll', 'glb' ),
			'description' => esc_html__( 'If select "yes", the maps will zoom in/out when user scroll the mouse', 'glb' ),
			'group'       => esc_html__( 'Maps Settings', 'glb' ),
			'param_name'  => 'zoomable',
			'std'         => 'yes',
			'value'       => array(
				esc_html__( 'No', 'glb' )  => 'no',
				esc_html__( 'Yes', 'glb' ) => 'yes'
			)
		),

		array(
			'type'        => 'dropdown',
			'heading'     => esc_html__( 'Enable Draggable', 'glb' ),
			'group'       => esc_html__( 'Maps Settings', 'glb' ),
			'param_name'  => 'draggable',
			'std'         => 'yes',
			'value'       => array(
				esc_html__( 'No', 'glb' )  => 'no',
				esc_html__( 'Yes', 'glb' ) => 'yes'
			)
		),

		array(
			'type'       => 'textfield',
			'heading'    => esc_html__( 'Height', 'glb' ),
			'group'      => esc_html__( 'Maps Settings', 'glb' ),
			'param_name' => 'height',
			'std'        => 300
		),

		array(
			'description' => esc_html__( 'Controls the locations you want to show on the maps.', 'glb' ),
			'group'       => esc_html__( 'Locations', 'glb' ),
			'type'        => 'param_group',
			'param_name'  => 'locations',
			'params'      => array(
				array(
					'type'        => 'attach_image',
					'param_name'  => 'marker',
					'heading'     => esc_html__( 'Marker Image', 'glb' ),
					'description' => esc_html__( 'Select the image you want to show as the maps marker.', 'glb' )
		        ),

		        array(
					'type'        => 'textfield',
					'heading'     => esc_html__( 'Address', 'glb' ),
					'param_name'  => 'address',
					'description' => esc_html__( 'Enter you address that will show at the center of the Maps', 'glb' ),
					'admin_label' => true
				),

				array(
					'type'        => 'textarea',
					'heading'     => esc_html__( 'Information Content', 'glb' ),
					'param_name'  => 'content'
				)
			)
		)
	)
);
