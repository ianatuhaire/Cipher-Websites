<?php
defined( 'ABSPATH' ) or die();

function glb__blog_body_class( $classes ) {
	$classes[] = sprintf( 'blog-%s', glb__option( 'blog__archive__style' ) );

	return $classes;
}

function glb__blog_sidebar() {
	return glb__option( 'blog__archive__sidebar' );
}

function glb__blog_sidebar_position() {
	return glb__option( 'blog__archive__sidebarPosition' );
}

function glb__single_sidebar() {
	return glb__option( 'blog__single__sidebar' );
}

function glb__single_sidebar_position() {
	return glb__option( 'blog__single__sidebarPosition' );
}

