<?php
defined( 'ABSPATH' ) or die();

add_filter( 'glb__customize_containers', 'glb__customize_projects_containers' );
add_filter( 'glb__customize_controls', 'glb__customize_projects_controls' );
add_filter( 'glb__customize_controls', 'glb__customize_single_project_controls' );
add_filter( 'glb__customize_controls', 'glb__customize_project_related' );
add_filter( 'glb__customize_settings', 'glb__customize_projects_settings' );


function glb__customize_projects_containers( $containers ) {
	$containers['projects'] = array(
		'type'        => 'panel',
		'title'       => esc_html__( 'Projects', 'glb' ),
		'description' => ''
	);

	$containers[ 'projectsList' ] = array(
		'type'  => 'section',
		'title'       => esc_html__( 'Project Archive', 'glb' ),
		'description' => '',
		'panel'       => 'projects'
	);

	$containers[ 'projectsSingle' ] = array(
		'type'  => 'section',
		'title'       => esc_html__( 'Project Single', 'glb' ),
		'description' => '',
		'panel'       => 'projects'
	);

	$containers[ 'projectsRelated' ] = array(
		'type'  => 'section',
		'title'       => esc_html__( 'Related Projects', 'glb' ),
		'description' => '',
		'panel'       => 'projects'
	);

	return $containers;
}


function glb__customize_projects_controls( $controls ) {
	$controls['projects__displayMode'] = array(
		'type'        => 'radio-buttons',
		'section'     => 'projectsList',
		'description' => esc_html__( 'Controls the layout for the projects pages.', 'glb' ),
		'choices'     => array(
			'grid-alt'  => esc_html__( 'Grid Titte', 'glb' ),
			'grid'      => esc_html__( 'Grid', 'glb' ),
			'masonry'   => esc_html__( 'Masonry', 'glb' )
		)
	);

	$controls['projects__gridColumns'] = array(
		'type'        => 'radio-buttons',
		'section'     => 'projectsList',
		'label'       => esc_html__( 'Grid Columns', 'glb' ),
		'choices'     => array( 2 => 2, 3 => 3, 4 => 4, 5 => 5 )
	);
	$controls['projects__gridGutter'] = array(
		'type'        => 'textfield',
		'section'     => 'projectsList',
		'label'       => esc_html__( 'Grid Column Spacing (px)', 'glb' ),
	);
	$controls['projects__imagesize'] = array(
		'type'        => 'textfield',
		'section'     => 'projectsList',
		'label' => esc_html__( 'Image Size', 'glb' ),
		'description' => esc_html__( 'Enter image size. Example: "thumbnail", "medium", "large", "full" or other sizes defined by current theme. Alternatively enter image size in pixels: 200x100 (Width x Height). Leave empty to use "thumbnail" size.', 'glb' )
	);
	$controls['projects__imagesizeCrop'] = array(
		'type'        => 'radio-buttons',
		'section'     => 'projectsList',
		'choices'     => array(
			'crop' => esc_html__('Hard Crop', 'glb'),
			'none' => esc_html__('None', 'glb')
		)
	);

	$controls['projects__filterable'] = array(
		'type'        => 'radio-onoff',
		'section'     => 'projectsList',
		'label'       => esc_html__( 'Enable Projects Filterable', 'glb' ),
	);
	$controls['projects__filterableType'] = array(
		'type'        => 'radio-buttons',
		'section'     => 'projectsList',
		'label'       => esc_html__( 'Filterable Type', 'glb' ),
		'choices'     => array(
			'nproject-tag'      => esc_html__( 'Tag', 'glb' ),
			'nproject-category' => esc_html__( 'Category', 'glb' )
		)
	);
	$controls['projects__filterableAlign'] = array(
		'type'        => 'radio-buttons',
		'section'     => 'projectsList',
		'label'       => _x( 'Filterable Alignment', 'customize', 'glb' ),
		'description' => _x( '', 'customize', 'glb' ),
		'choices'     => array(
			'left'    => _x( 'Left', 'customize', 'glb' ),
			'center'  => _x( 'Center', 'customize', 'glb' ),
			'right'   => _x( 'Right', 'customize', 'glb' )
		)
	);

	$controls['projects__excerpt'] = array(
		'type'        => 'radio-onoff',
		'section'     => 'projectsList',
		'label'       => esc_html__( 'Show Summary Text', 'glb' ),
	);
	$controls['projects__autoExcerptLength'] = array(
		'type'        => 'textfield',
		'section'     => 'projectsList',
		'label'       => esc_html__( 'Summary Text Length', 'glb' ),
	);

	$controls['projects__readmore'] = array(
		'type'        => 'radio-onoff',
		'section'     => 'projectsList',
		'label'       => esc_html__( 'Show Readmore Button', 'glb' ),
	);


	// Sidebar section
	$controls['projects__sidebarHeading'] = array(
		'type'        => 'heading',
		'section'     => 'projectsList',
		'label'       => esc_html__( 'Sidebar', 'glb' ),
	);
	$controls['projects__sidebar'] = array(
		'type'        => 'dropdown',
		'section'     => 'projectsList',
		'choices'     => 'glb__customize_dropdown_sidebars'
	);

	$controls['projects__sidebarPosition'] = array(
		'type'    => 'radio-buttons',
		'section' => 'projectsList',
		'label'   => esc_html__( 'Sidebar Position', 'glb' ),
		'choices' => array(
			'none'  => esc_html__( 'No Sidebar', 'glb' ),
			'left'  => esc_html__( 'Left', 'glb' ),
			'right' => esc_html__( 'Right', 'glb' )
		)
	);

	return $controls;
}


function glb__customize_single_project_controls( $controls ) {
	$controls['project__pagination'] = array(
		'type'        => 'radio-onoff',
		'section'     => 'projectsSingle',
		'label'       => esc_html__( 'Show Post Navigator', 'glb' ),
	);
	$controls['project__author'] = array(
		'type'        => 'radio-onoff',
		'section'     => 'projectsSingle',
		'label'       => esc_html__( 'Show Post Author', 'glb' ),
	);
	$controls['project__tags'] = array(
		'type'        => 'radio-onoff',
		'section'     => 'projectsSingle',
		'label'       => esc_html__( 'Show Project Tags', 'glb' ),
	);
	$controls['project__related'] = array(
		'type'        => 'radio-onoff',
		'section'     => 'projectsSingle',
		'label'       => esc_html__( 'Show Related Posts', 'glb' ),
	);
	$controls['project__galerryMode'] = array(
		'type'        => 'radio-buttons',
		'section'     => 'projectsSingle',
		'label'       => esc_html__( 'Gallery Styles', 'glb' ),
		'choices'     => array(
			'list'   => esc_html__( 'List', 'glb' ),
			'slider' => esc_html__( 'Slider', 'glb' ),
			'grid'   => esc_html__( 'Grid', 'glb' )
		)
	);

	$controls['project__galleryColumns'] = array(
		'type'        => 'radio-buttons',
		'section'     => 'projectsSingle',
		'label'       => esc_html__( 'Gallery Columns', 'glb' ),
		'choices'     => array(
			2 => 2,
			3 => 3,
			4 => 4,
			5 => 5,
		)
	);
	$controls['project__galleryPosition'] = array(
		'type'        => 'radio-buttons',
		'section'     => 'projectsSingle',
		'label'       => esc_html__( 'Gallery Position', 'glb' ),
		'choices'     => array(
			'top'    => esc_html__( 'Top', 'glb' ),
			'right'  => esc_html__( 'Right', 'glb' ),
			'bottom' => esc_html__( 'Bottom', 'glb' ),
			'left'   => esc_html__( 'Left', 'glb' )
		)
	);

	// Sidebar section
	$controls['project__sidebarHeading'] = array(
		'type'        => 'heading',
		'section'     => 'projectsSingle',
		'label'       => esc_html__( 'Sidebar', 'glb' ),
	);
	$controls['project__sidebar'] = array(
		'type'        => 'dropdown',
		'section'     => 'projectsSingle',
		'choices'     => 'glb__customize_dropdown_sidebars'
	);

	$controls['project__sidebarPosition'] = array(
		'type'    => 'radio-buttons',
		'section' => 'projectsSingle',
		'label'   => esc_html__( 'Sidebar Position', 'glb' ),
		'choices' => array(
			'none'  => esc_html__( 'No Sidebar', 'glb' ),
			'left'  => esc_html__( 'Left', 'glb' ),
			'right' => esc_html__( 'Right', 'glb' )
		)
	);

	return $controls;
}


function glb__customize_projects_settings( $settings ) {
	$settings['projects__displayMode']     = array( 'default' => 'grid' );
	$settings['projects__gridColumns']     = array( 'default' => 3 );
	$settings['projects__gridGutter']      = array( 'default' => 20 );
	$settings['projects__imagesize']       = array( 'default' => 'full' );
	$settings['projects__imagesizeCrop']   = array( 'default' => 'crop' );
	
	$settings['projects__filterable']        = array( 'default' => 'on' );
	$settings['projects__filterableAlign']   = array( 'default' => 'left' );
	$settings['projects__filterableType']    = array( 'default' => 'nproject-tag' );
	$settings['projects__excerpt']           = array( 'default' => 'on' );
	$settings['projects__autoExcerpt']       = array( 'default' => 'on' );
	$settings['projects__autoExcerptLength'] = array( 'default' => '12' );
	$settings['projects__readmore']          = array( 'default' => 'on' );
	$settings['projects__sidebar']           = array( 'default' => 'primary' );
	$settings['projects__sidebarPosition']   = array( 'default' => 'right' );

	$settings['project__pagination']      = array( 'default' => 'on' );
	$settings['project__author']          = array( 'default' => 'on' );
	$settings['project__related']         = array( 'default' => 'on' );
	$settings['project__galerryMode']     = array( 'default' => 'grid' );
	$settings['project__galleryColumns']  = array( 'default' => 3 );
	$settings['project__galleryPosition'] = array( 'default' => 'top' );
	$settings['project__sidebar']         = array( 'default' => 'primary' );
	$settings['project__sidebarPosition'] = array( 'default' => 'left' );
	$settings['project__tags']            = array( 'default' => 'on' );

	$settings['project__related__title']            = array( 'default' => 'Related Posts' );
	$settings['project__related__count']            = array( 'default' => '4' );
	$settings['projects__related__gridColumns']     = array( 'default' => 4 );
	$settings['project__related__type']             = array( 'default' => 'category' );

	return $settings;
}

function glb__customize_project_related( $controls ) {
	$controls['project__related__title'] = array(
		'type'    => 'textfield',
		'label'   => esc_html__( 'Widget Title', 'glb' ),
		'section' => 'projectsRelated',
		'default' => esc_html__( 'Related Projects', 'glb' )
	);

	$controls['project__related__count'] = array(
		'type'    => 'textfield',
		'label'   => esc_html__( 'Number of Related Projects', 'glb' ),
		'section' => 'projectsRelated',
		'default' => esc_html__( '4', 'glb' )
	);

	$controls['projects__related__gridColumns'] = array(
		'type'        => 'radio-buttons',
		'section'     => 'projectsRelated',
		'label'       => esc_html__( 'Grid Columns', 'glb' ),
		'choices'     => array( 2 => 2, 3 => 3, 4 => 4, 5 => 5 )
	);

	$controls['project__related__type'] = array(
		'type' => 'dropdown',
		'section' => 'projectsRelated',
		'label' => esc_html__( 'Show Related Projects Based On', 'glb' ),
		'default' => 'tag',
		'choices' => array(
			'tag'      => esc_html__( 'Tag', 'glb' ),
			'category' => esc_html__( 'Category', 'glb' ),
			'random'   => esc_html__( 'Random', 'glb' ),
			'recent'   => esc_html__( 'Recent', 'glb' )
		)
	);

	return $controls;
}
