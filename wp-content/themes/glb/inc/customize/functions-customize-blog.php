<?php
defined( 'ABSPATH' ) or die();

add_filter( 'glb__customize_containers', 'glb__customize_blog_containers' );
add_filter( 'glb__customize_settings', 'glb__customize_blog_settings' );

add_filter( 'glb__customize_controls', 'glb__customize_blog_archive' );
add_filter( 'glb__customize_controls', 'glb__customize_blog_single' );
add_filter( 'glb__customize_controls', 'glb__customize_blog_related' );


function glb__customize_blog_containers( $containers ) {
	$containers['blog'] = array(
		'type'            => 'panel',
		'title'           => esc_html__( 'Blog & Post', 'glb' )
	);
	$containers['blogArchive'] = array(
		'type'        => 'section',
		'panel'       => 'blog',
		'title'       => esc_html__( 'Blog Settings', 'glb' ),
		'description' => esc_html__( 'Select the style of blog posts that will appearing on the archive page', 'glb' )
	);
	$containers['blogSingle'] = array(
		'type'        => 'section',
		'panel'       => 'blog',
		'title'       => esc_html__( 'Post Settings', 'glb' )
	);
	$containers['blogAuthor'] = array(
		'type'        => 'section',
		'panel'       => 'blog',
		'title'       => esc_html__( 'Author Box', 'glb' ),
	);
	$containers['blogRelated'] = array(
		'type'        => 'section',
		'panel'       => 'blog',
		'title'       => esc_html__( 'Related Posts', 'glb' ),
	);

	return $containers;
}


function glb__customize_blog_settings( $settings ) {
	$settings['blog__archive__style']           = array( 'default' => 'large' );
	$settings['blog__archive__columns']         = array( 'default' => 3 );
	$settings['blog__archive__gridGutter']      = array( 'default' => 60 );
	$settings['blog__archive__imagesize']       = array( 'default' => 'full' );
	$settings['blog__archive__imagesizeCrop']   = array( 'default' => 'crop' );
	$settings['blog__archive__autoExcerpt']     = array( 'default' => 'off' );
	$settings['blog__archive__excerptLength']   = array( 'default' => '40' );
	$settings['blog__archive__postMeta']        = array( 'default' => 'on' );
	$settings['blog__archive__readmore']        = array( 'default' => 'on' );
	$settings['blog__archive__sidebar']         = array( 'default' => 'primary' );
	$settings['blog__archive__sidebarPosition'] = array( 'default' => 'left' );
	
	$settings['blog__single__postMeta']        = array( 'default' => 'on' );
	$settings['blog__single__postTags']        = array( 'default' => 'on' );
	$settings['blog__single__postNav']         = array( 'default' => 'on' );
	$settings['blog__single__postAuthor']      = array( 'default' => 'on' );
	$settings['blog__single__relatedPosts']    = array( 'default' => 'on' );
	$settings['blog__single__sidebar']         = array( 'default' => 'primary' );
	$settings['blog__single__sidebarPosition'] = array( 'default' => 'left' );
	
	$settings['blog__related__title']     = array( 'default' => 'Related Posts' );
	$settings['blog__related__type']      = array( 'default' => 'category' );
	$settings['blog__related__count']     = array( 'default' => '3' );

	return $settings;
}


function glb__customize_blog_archive( $controls ) {
	$controls['blog__archive__style'] = array(
		'type' => 'radio-buttons',
		'section' => 'blogArchive',
		'default' => 'grid',
		'choices' => array(
			'grid'   => esc_html__( 'Grid', 'glb' ),
			'masonry'   => esc_html__( 'Masonry', 'glb' ),
			'medium' => esc_html__( 'Medium', 'glb' ),
			'large'  => esc_html__( 'Large', 'glb' )
		)
	);
	$controls['blog__archive__columns'] = array(
		'type' => 'radio-buttons',
		'label'   => esc_html__( 'Grid Columns', 'glb' ),
		'section' => 'blogArchive',
		'choices' => array(
			2 => 2,
			3 => 3,
			4 => 4,
			5 => 5
		)
	);
	$controls['blog__archive__gridGutter'] = array(
		'type'        => 'textfield',
		'section'     => 'blogArchive',
		'label'       => esc_html__( 'Grid Column Spacing (px)', 'glb' ),
	);
	$controls['blog__archive__imagesize'] = array(
		'type'        => 'textfield',
		'section'     => 'blogArchive',
		'label' => esc_html__( 'Image Size', 'glb' ),
		'description' => esc_html__( 'Enter image size. Example: "thumbnail", "medium", "large", "full" or other sizes defined by current theme. Alternatively enter image size in pixels: 200x100 (Width x Height). Leave empty to use "thumbnail" size.', 'glb' )
	);
	$controls['blog__archive__imagesizeCrop'] = array(
		'type'        => 'radio-buttons',
		'section'     => 'blogArchive',
		'choices'     => array(
			'crop' => esc_html__('Hard Crop', 'glb'),
			'none' => esc_html__('None', 'glb')
		)
	);
	$controls['blog__archive__postMeta'] = array(
		'type'    => 'radio-onoff',
		'label'   => esc_html__( 'Show Post Meta', 'glb' ),
		'section' => 'blogArchive',
		'default' => 'on'
	);
	$controls['blog__archive__readmore'] = array(
		'type'    => 'radio-onoff',
		'label'   => esc_html__( 'Show Read More', 'glb' ),
		'section' => 'blogArchive',
		'default' => 'on'
	);
	$controls['blog__archive__autoExcerpt'] = array(
		'type'    => 'radio-onoff',
		'label'   => esc_html__( 'Auto Post Excerpt', 'glb' ),
		'section' => 'blogArchive',
		'default' => 'off'
	);

	$controls['blog__archive__excerptLength'] = array(
		'type'    => 'textfield',
		'label'   => esc_html__( 'Post Excerpt Length', 'glb' ),
		'section' => 'blogArchive',
		'default' => 40
	);

	/**
	 * Sidebar settings
	 */
	$controls['blog__archive__sidebar'] = array(
		'type'    => 'dropdown',
		'section' => 'blogArchive',
		'label'   => esc_html__( 'Sidebar', 'glb' ),
		'choices' => 'glb__customize_dropdown_sidebars'
	);
	$controls['blog__archive__sidebarPosition'] = array(
		'type'    => 'radio-buttons',
		'section' => 'blogArchive',
		'label'   => esc_html__( 'Sidebar Position', 'glb' ),
		'choices' => array(
			'none' => esc_html__( 'No Sidebar', 'glb' ),
			'left'       => esc_html__( 'Left', 'glb' ),
			'right'      => esc_html__( 'Right', 'glb' )
		)
	);
	
	
	return $controls;
}


function glb__customize_blog_single( $controls ) {
	$controls['blog__single__postMeta'] = array(
		'type'    => 'radio-onoff',
		'label'   => esc_html__( 'Show Post Meta', 'glb' ),
		'section' => 'blogSingle',
		'default' => 'on'
	);
	$controls['blog__single__postTags'] = array(
		'type'    => 'radio-onoff',
		'label'   => esc_html__( 'Show Post Tags', 'glb' ),
		'section' => 'blogSingle',
		'default' => 'on'
	);
	$controls['blog__single__postNav'] = array(
		'type'    => 'radio-onoff',
		'label'   => esc_html__( 'Show Post Navigator', 'glb' ),
		'section' => 'blogSingle',
		'default' => 'on'
	);
	$controls['blog__single__postAuthor'] = array(
		'type'    => 'radio-onoff',
		'label'   => esc_html__( 'Show Post Author', 'glb' ),
		'section' => 'blogSingle',
		'default' => 'on'
	);
	$controls['blog__single__relatedPosts'] = array(
		'type'    => 'radio-onoff',
		'label'   => esc_html__( 'Show Related Posts', 'glb' ),
		'section' => 'blogSingle',
		'default' => 'on'
	);

	/**
	 * Sidebar settings
	 */
	$controls['blog__single__sidebar'] = array(
		'type'    => 'dropdown',
		'section' => 'blogSingle',
		'label'   => esc_html__( 'Sidebar', 'glb' ),
		'choices' => 'glb__customize_dropdown_sidebars'
	);
	$controls['blog__single__sidebarPosition'] = array(
		'type'    => 'radio-buttons',
		'section' => 'blogSingle',
		'label'   => esc_html__( 'Sidebar Position', 'glb' ),
		'choices' => array(
			'none'    => esc_html__( 'No Sidebar', 'glb' ),
			'left'  => esc_html__( 'Left', 'glb' ),
			'right' => esc_html__( 'Right', 'glb' )
		)
	);
	
	
	return $controls;
}


function glb__customize_blog_related( $controls ) {
	$controls['blog__related__title'] = array(
		'type'    => 'textfield',
		'label'   => esc_html__( 'Widget Title', 'glb' ),
		'section' => 'blogRelated',
		'default' => esc_html__( 'Related Posts', 'glb' )
	);

	$controls['blog__related__type'] = array(
		'type' => 'dropdown',
		'section' => 'blogRelated',
		'label' => esc_html__( 'Show Related Posts Based On', 'glb' ),
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
