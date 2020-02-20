<?php
defined( 'ABSPATH' ) or die();

add_action( 'after_setup_theme', 'glb__woocommerce_supports' );
add_action( 'woocommerce_before_shop_loop_item_title', 'glb__woocommerce_template_loop_product_thumbnail', 10 );

// A filter that return an empty array
// to prevent woocommerce styles
add_filter( 'woocommerce_enqueue_styles', '__return_empty_array' );
add_filter( 'loop_shop_per_page', 'glb__woocommerce_products_per_page' );
add_filter( 'woocommerce_show_page_title', '__return_false' );

remove_action( 'woocommerce_before_shop_loop_item_title', 'woocommerce_template_loop_product_thumbnail', 10 );
//remove_action( 'woocommerce_before_shop_loop', 'woocommerce_result_count', 20 );
//remove_action( 'woocommerce_before_shop_loop', 'woocommerce_catalog_ordering', 30 );

function glb__woocommerce_supports() {
	add_theme_support( 'wc-product-gallery-zoom' );
    add_theme_support( 'wc-product-gallery-lightbox' );
    add_theme_support( 'wc-product-gallery-slider' );
}

/**
 * Register custom image sizes for WooCommerce
 */
if ( ! function_exists( 'glb__woocommerce_thumbnail_size' ) ) {
	function glb__woocommerce_thumbnail_size( $args ) {
		$sizes = glb__get_image_sizes();
		$size  = glb__option( 'product__thumbnailSize' );
		$crop  = glb__option( 'product__thumbnailSizeCrop' ) == 'crop';

		if ( preg_match( '/^([0-9]+)x([0-9]+)$/', $size, $matches ) ) {
			return array(
				'width'  => $matches[1],
				'height' => $matches[2],
				'crop'   => $crop
			);
		}
		elseif ( isset( $sizes[ $size ] ) ) {
			return array_merge( $sizes[ $size ], array(
				'crop' => $crop
			) );
		}

		return $args;
	}
}
add_filter( 'woocommerce_get_image_size_shop_thumbnail', 'glb__woocommerce_thumbnail_size' );



if ( ! function_exists( 'glb__woocommerce_catalog_size' ) ) {
	function glb__woocommerce_catalog_size( $args ) {
		$sizes = glb__get_image_sizes();
		$size  = glb__option( 'shop__productImageSize' );
		$crop  = glb__option( 'shop__productImageSizeCrop' ) == 'crop';

		if ( preg_match( '/^([0-9]+)x([0-9]+)$/', $size, $matches ) ) {
			return array(
				'width'  => $matches[1],
				'height' => $matches[2],
				'crop'   => $crop
			);
		}
		elseif ( isset( $sizes[ $size ] ) ) {
			return array_merge( $sizes[ $size ], array(
				'crop' => $crop
			) );
		}

		return $args;
	}
}
add_filter( 'woocommerce_get_image_size_shop_catalog', 'glb__woocommerce_catalog_size' );



if ( ! function_exists( 'glb__woocommerce_single_size' ) ) {
	function glb__woocommerce_single_size( $args ) {
		$sizes = glb__get_image_sizes();
		$size  = glb__option( 'product__imageSize' );
		$crop  = glb__option( 'product__imageSizeCrop' ) == 'crop';

		if ( preg_match( '/^([0-9]+)x([0-9]+)$/', $size, $matches ) ) {
			$args = array(
				'width'  => $matches[1],
				'height' => $matches[2],
				'crop'   => $crop
			);
		}
		elseif ( isset( $sizes[ $size ] ) ) {
			$args = array_merge( $sizes[ $size ], array(
				'crop' => $crop
			) );
		}

		return $args;
	}
}
add_filter( 'woocommerce_get_image_size_shop_single', 'glb__woocommerce_single_size' );

function glb__woocommerce_body_class( $classes ) {
	return $classes;
}

function glb__woocommerce_sidebar() {
	return is_shop()
		? glb__option( 'shop__sidebar' )
		: glb__option( 'product__sidebar' );
}

function glb__woocommerce_sidebar_position() {
	return is_shop()
		? glb__option( 'shop__sidebarPosition' )
		: glb__option( 'product__sidebarPosition' );
}

function glb__woocommerce_products_per_page() {
	return abs( (int) glb__option( 'shop__paginate' ) );
}

function glb__woocommerce_template_loop_product_thumbnail() {
	global $post;

	if ( has_post_thumbnail() ) {
		$props = wc_get_product_attachment_props( get_post_thumbnail_id(), $post );
		$images = glb__get_image_resized( array(
			'image_id' => get_post_thumbnail_id(),
			'size'     => glb__option( 'shop__productImageSize' ),
			'crop'     => glb__option( 'shop__productImageSizeCrop' ),
			'atts'     => array(
				'title'	 => $props['title'],
				'alt'    => $props['alt'],
			)
		) );

		echo wp_kses_post( $images['thumbnail'] );
	} elseif ( wc_placeholder_img_src() ) {
		echo wc_placeholder_img( $image_size );
	}
}