<?php
defined( 'ABSPATH' ) or die();


add_filter( 'nprojects/shortcode_template', 'glb__project_shortcode_template' );
add_filter( 'nprojects/shortcode_parameters', 'glb__project_shortcode_params' );
add_filter( 'line-shortcode-unsupported', 'glb__project_disable_justify_shortcode' );
add_filter( 'the_excerpt', 'glb__project_auto_excerpt', 99 );

add_action( 'after_setup_theme', function () {
	if ( class_exists( 'nProjects_Admin' ) ) {
		$admin = nProjects_Admin::instance();
		
		remove_action( 'admin_enqueue_scripts', array( $admin, 'enqueue_styles' ) );
		remove_action( 'admin_enqueue_scripts', array( $admin, 'enqueue_scripts' ) );
		remove_action( 'add_meta_boxes', array( $admin, 'add_metabox' ) );
		remove_action( 'save_post', array( $admin, 'update_media_items' ) );
	}
} );

function glb__project_auto_excerpt( $excerpt ) {
	if ( glb__current_post_type() == 'nproject' && mb_strlen( $excerpt ) > glb__option( 'projects__autoExcerptLength' ) ) {
		$excerpt = mb_substr( $excerpt, 0, glb__option( 'projects__autoExcerptLength' ) );
	}

	return $excerpt;
}

function glb__project_disable_justify_shortcode( $unsupported ) {
	$unsupported[] = 'projects_justify';
	return $unsupported;
}


function glb__projects_body_class( $classes ) {
	$classes[] = sprintf( 'projects projects-%s', glb__option( 'projects__displayMode' ) );

	return $classes;
}

function glb__projects_sidebar() {
	return glb__option( 'projects__sidebar' );
}

function glb__projects_sidebar_position() {
	return glb__option( 'projects__sidebarPosition' );
}


function glb__single_project_body_classes( $classes ) {
	$gallery_position = get_field( 'projectGalleryPosition' );
	
	if ( $gallery_position === 'default' ) {
		$gallery_position = glb__option( 'project__galleryPosition' );
	}

	$classes[] = sprintf( 'project-gallery-%s', $gallery_position );
	
	return $classes;
}

function glb__single_project_sidebar() {
	return glb__option( 'project__sidebar' );
}

function glb__single_project_sidebar_position() {
	return glb__option( 'project__sidebarPosition' );
}


function glb__project_media_item( $item, $size = 'full', $crop = false, $lightbox = true ) {
	$attachment_image = glb__get_image_resized( [
		'image_id' => is_array( $item ) ? $item['id'] : $item,
		'size'     => $size,
		'crop'     => $crop
	] );

	$attachment_image_src = $attachment_image['thumbnail_raw'][0];
	$attachment_image_large = $attachment_image['large'];

	if ( $lightbox ) {
		printf( '<a href="%s" rel="prettyPhoto[gallery]"><img src="%s" /></a>',
			$attachment_image_src,
			$attachment_image_large[0]
		);
	}
	else {
		echo wp_kses_post( $attachment_image['thumbnail'] );
	}
}



function glb__project_shortcode_params( $params ) {
	// General tab
	$params[] = array(
		'type'        => 'textfield',
		'heading'     => esc_html__( 'Widget Title', 'glb' ),
		'description' => esc_html__( 'Enter text which will be used as widget title. Leave blank if no title is needed.', 'glb' ),
		'param_name'  => 'widget_title'
	);

	$params[] = array(
		'type'        => 'textfield',
		'heading'     => esc_html__( 'Categories', 'glb' ),
		'description' => esc_html__( 'If you want to narrow output, enter category names here. Note: Only listed categories will be included.', 'glb' ),
		'param_name'  => 'categories'
	);

	$params[] = array(
		'type'        => 'textfield',
		'heading'     => esc_html__( 'Tags', 'glb' ),
		'description' => esc_html__( 'If you want to narrow output, enter tag names here. Note: Only listed tags will be included.', 'glb' ),
		'param_name'  => 'tags'
	);

	$params[] = array(
		'type'       => 'dropdown',
		'heading'    => esc_html__( 'Display Mode', 'glb' ),
		'param_name' => 'mode',
		'std'        => 3,
		'value'      => array(
			esc_html__( 'Grid Classic', 'glb' )   => 'grid',
			esc_html__( 'Grid Masonry', 'glb' )   => 'masonry',
			esc_html__( 'Grid Alt', 'glb' ) => 'grid-alt'
		)
	);

	$params[] = array(
		'type'        => 'dropdown',
		'heading'     => esc_html__( 'Columns', 'glb' ),
		'description' => esc_html__( 'The number of columns will be shown', 'glb' ),
		'param_name'  => 'columns',
		'std'         => 3,
		'value'       => array(
			esc_html__( '1 Column', 'glb' )  => 1,
			esc_html__( '2 Columns', 'glb' ) => 2,
			esc_html__( '3 Columns', 'glb' ) => 3,
			esc_html__( '4 Columns', 'glb' ) => 4,
			esc_html__( '5 Columns', 'glb' ) => 5,
		)
	);

	$params[] = array(
		'type'       => 'dropdown',
		'heading'    => esc_html__( 'Show Items Filter', 'glb' ),
		'param_name' => 'filter',
		'std'        => 'yes',
		'value'      => array(
			esc_html__( 'Yes', 'glb' ) => 'yes',
			esc_html__( 'No', 'glb' )  => 'no'
		)
	);

	$params[] = array(
		'type'       => 'dropdown',
		'heading'    => esc_html__( 'Filter By', 'glb' ),
		'param_name' => 'filter_by',
		'std'        => 'category',
		'value'      => array(
			esc_html__( 'Categories', 'glb' ) => 'category',
			esc_html__( 'Tags', 'glb' )       => 'tag'
		)
	);

	$params[] = array(
		'type'        => 'textfield',
		'heading'     => esc_html__( 'Limit', 'glb' ),
		'description' => esc_html__( 'The number of posts will be shown', 'glb' ),
		'param_name'  => 'limit',
		'value'       => 9
	);

	$params[] = array(
		'type'        => 'textfield',
		'heading'     => esc_html__( 'Offset', 'glb' ),
		'description' => esc_html__( 'The number of posts to pass over', 'glb' ),
		'param_name'  => 'offset',
		'value'       => 0
	);

	$params[] = array(
		'type'        => 'textfield',
		'heading'     => esc_html__( 'Thumbnail Size', 'glb' ),
		'description' => esc_html__( 'Enter image size. Example: "thumbnail", "medium", "large", "full" or other sizes defined by current theme. Alternatively enter image size in pixels: 200x100 (Width x Height). Leave empty to use "thumbnail" size.', 'glb' ),
		'param_name'  => 'thumbnail_size'
	);

	$params[] = array(
		'type'       => 'dropdown',
		'heading'    => esc_html__( 'Show Read More', 'glb' ),
		'param_name' => 'readmore',
		'std'        => 'yes',
		'value'      => array(
			esc_html__( 'Yes', 'glb' ) => 'yes',
			esc_html__( 'No', 'glb' )  => 'no'
		)
	);
	$params[] = array(
		'type'        => 'textfield',
		'heading'     => esc_html__( 'Readmore Text', 'glb' ),
		'param_name'  => 'readmore_text'
	);

	$params[] = array(
		'type'        => 'dropdown',
		'heading'     => esc_html__( 'Order By', 'glb' ),
		'description' => esc_html__( 'Select how to sort retrieved posts.', 'glb' ),
		'param_name'  => 'order',
		'std'         => 'date',
		'value'       => array(
			esc_html__( 'Date', 'glb' )          => 'date',
			esc_html__( 'ID', 'glb' )            => 'ID',
			esc_html__( 'Author', 'glb' )        => 'author',
			esc_html__( 'Title', 'glb' )         => 'title',
			esc_html__( 'Modified', 'glb' )      => 'modified',
			esc_html__( 'Random', 'glb' )        => 'rand',
			esc_html__( 'Comment count', 'glb' ) => 'comment_count',
			esc_html__( 'Menu order', 'glb' )    => 'menu_order'
		)
	);

	$params[] = array(
		'type'        => 'dropdown',
		'heading'     => esc_html__( 'Order Direction', 'glb' ),
		'description' => esc_html__( 'Designates the ascending or descending order.', 'glb' ),
		'param_name'  => 'direction',
		'std'         => 'DESC',
		'value'       => array(
			esc_html__( 'Ascending', 'glb' )          => 'ASC',
			esc_html__( 'Descending', 'glb' )            => 'DESC'
		)
	);

	$params[] = array(
		'type'        => 'textfield',
		'heading'     => esc_html__( 'Extra Class', 'glb' ),
		'description' => esc_html__( 'If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your css file.', 'glb' ),
		'param_name'  => 'class'
	);

	$params[] = array(
		'type' => 'css_editor',
		'param_name' => 'css',
		'group' => esc_html__( 'Design Options', 'glb' )
	);

	return $params;
}



function glb__project_shortcode_template() {
	return 'tmpl/shortcodes/projects.php';
}
