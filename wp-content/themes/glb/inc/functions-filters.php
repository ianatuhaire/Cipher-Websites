<?php
defined( 'ABSPATH' ) or die();


// A filter for adding custom classes
// into the body element
add_filter( 'glb__body_class', 'glb__body_classes', 5 );


// A filter to generate the post excerpt
// automatically
add_filter( 'glb__the_content', 'glb__auto_excerpt', 5 );


add_filter( 'line-shortcodes/posts-params', 'glb__custom_posts_shortcode_params' );


/**
 * Return the classes name for the body tag
 * in array format
 * 
 * @param   array  $classes  An existing classes
 * @return  array
 * @since   1.0.0
 */
function glb__body_classes( $classes ) {
	$classes[] = sprintf( 'layout-%s', glb__option( 'global__layout__mode' ) );
	$classes[] = sprintf( 'sidebar-%s', glb__sidebar_position() );

	return $classes;
}


function glb__auto_excerpt( $content ) {
	if ( glb__option( 'blog__archive__autoExcerpt' ) === 'on' ) {
		$length = (int) glb__option( 'blog__archive__excerptLength' );
		$post   = get_post();

		if ( ! preg_match( '/<!--more(.*?)?-->/', $post->post_content ) ) {
			$content = strip_tags( strip_shortcodes( $content ) );
			$content = trim( $content );

			if ( strlen( $content ) > $length ) {
				$content = mb_substr( $content, 0, $length );
				$content.= '...';
			}

			return sprintf( '<p>%s</p>', $content );
		}
	}

	return $content;
}


function glb__custom_posts_shortcode_params( $args ) {
	$args['params'] = array(
		array(
			'type'        => 'textfield',
			'heading'     => esc_html__( 'Widget Title', 'glb' ),
			'param_name'  => 'title',
			'description' => esc_html__( 'Enter text which will be used as widget title. Leave blank if no title is needed.', 'glb' )
		),
		array(
			'type'        => 'textfield',
			'heading'     => esc_html__( 'Category', 'glb' ),
			'param_name'  => 'category',
			'description' => esc_html__( 'Enter the category\'s slug that will be used to filter posts', 'glb' )
		),
		array(
			'type'        => 'textfield',
			'heading'     => esc_html__( 'Tag', 'glb' ),
			'param_name'  => 'tag',
			'description' => esc_html__( 'Enter the tag\'s slug that will be used to filter posts', 'glb' )
		),
		array(
			'type'       => 'dropdown',
			'heading'    => esc_html__( 'Layout', 'glb' ),
			'param_name' => 'layout',
			'value'      => array(
				esc_html__( 'Grid', 'glb' ) => 'grid',
				esc_html__( 'List', 'glb' ) => 'list'
			)
		),
		array(
			'type'        => 'dropdown',
			'heading'     => esc_html__( 'Grid Columns', 'glb' ),
			'param_name'  => 'grid_columns',
			'description' => esc_html__( 'The number of columns for grid and grid masonry layout', 'glb' ),
			'value'       => array(
				esc_html__( '2 Columns', 'glb' ) => 2,
				esc_html__( '3 Columns', 'glb' ) => 3,
				esc_html__( '4 Columns', 'glb' ) => 4
			)
		),
		array(
			'type'        => 'textfield',
			'heading'     => esc_html__( 'Thumbnail Size', 'glb' ),
			'description' => esc_html__( 'Enter image size. Example: "thumbnail", "medium", "large", "full" or other sizes defined by current theme. Alternatively enter image size in pixels: 200x100 (Width x Height). Leave empty to use "thumbnail" size.', 'glb' ),
			'param_name'  => 'thumbnail_size'
		),
		array(
			'type'        => 'textfield',
			'heading'     => esc_html__( 'Limit', 'glb' ),
			'param_name'  => 'limit',
			'description' => esc_html__( 'The number of posts will be shown', 'glb' ),
			'value'       => 9
		),
		array(
			'type'        => 'textfield',
			'heading'     => esc_html__( 'Offset', 'glb' ),
			'param_name'  => 'offset',
			'description' => esc_html__( 'The number of posts to pass over', 'glb' ),
			'value'       => 0
		),
		array(
			'type'       => 'dropdown',
			'heading'    => esc_html__( 'Icon For Posts', 'glb' ),
			'param_name' => 'icon',
			'value'      => array(
				esc_html__( 'Post Thumbnail', 'glb' ) => 'post-thumbnail',
				esc_html__( 'Post Date', 'glb' ) => 'post-date'
			)
		),
		array(
			'type'       => 'checkbox',
			'heading'    => esc_html__( 'Hide Post Content', 'glb' ),
			'param_name' => 'hide_content',
			'value'      => array(
				esc_html__( 'Yes, please', 'glb' ) => 'yes'
			)
		),
		array(
			'type'       => 'textfield',
			'heading'    => esc_html__( 'Post Content Length', 'glb' ),
			'param_name' => 'content_length',
			'value'      => 40
		),
		array(
			'type'       => 'checkbox',
			'heading'    => esc_html__( 'Hide Read More', 'glb' ),
			'param_name' => 'hide_readmore',
			'value'      => array(
				esc_html__( 'Yes, please', 'glb' ) => 'yes'
			)
		),
		array(
			'type'       => 'textfield',
			'heading'    => esc_html__( 'Read More Text', 'glb' ),
			'param_name' => 'readmore_text',
			'value'      => esc_html__( 'Continue &rarr;', 'glb' )
		),

		array(
			'type'        => 'textfield',
			'heading'     => esc_html__( 'Extra class name', 'glb' ),
			'param_name'  => 'class',
			'description' => esc_html__( 'If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your css file.', 'glb' )
		),

		array(
			'type'       => 'css_editor',
			'param_name' => 'css',
			'group'      => esc_html__( 'Design Options', 'glb' )
		)
	);

	return $args;
}