<?php
defined( 'ABSPATH' ) or die();

$layout    = glb__option( 'header__titlebar' );
$alignment = glb__option( 'header__titlebar__align' );

/**
 * Override layout and alignment settings for the specific entry
 */
$_layout = get_field( 'titlebarLayout', get_the_ID() );
$_alignment = get_field( 'titlebarAlign', get_the_ID() );

if ( $_layout && $_layout != 'default' ) {
	$layout = $_layout;
}

if ( $_alignment && $_alignment != 'default' ) {
	$alignment = $_alignment;
}

if ( ( is_front_page() && glb__option( 'header__titlebar__home' ) == 'off' ) || $layout == 'none' ) {
	return;
}

$classes = array(
	"content-header",
	"content-header-{$alignment}"
);

if ( glb__option( 'header__titlebar__full' ) === 'on' ) {
	$classes[] = 'content-header-full';
}

if ( glb__option( 'header__titlebar__shadow' ) === 'on' ) {
	$classes[] = 'content-header-shadow';
}

$featured_background_types = (array) glb__option( 'header__titlebar__backgroundFeatured' );
$current_post_type         = glb__current_post_type();

if ( in_array( $current_post_type, $featured_background_types ) ) {
	$classes[] = 'content-header-featured';
}
?>

	<div class="<?php echo esc_attr( join( ' ', $classes ) ) ?> wrap">
		<div class="content-header-inner wrap">
			<div class="page-title-wrap">

				<?php if ( in_array( $layout, array( 'both', 'title' ) ) ): ?>
					<div class="page-title">
						<?php glb__header_page_title() ?>
					</div>
				<?php endif ?>

				<?php if ( function_exists( 'bcn_display' ) && in_array( $layout, array( 'both', 'breadcrumbs' ) ) ): ?>
					<div class="breadcrumbs">
						<div class="breadcrumbs-inner">
							<?php bcn_display() ?>
						</div>
					</div>
				<?php endif ?>

				<?php if ( glb__option( 'header__titlebar__scrolldown' ) == 'on' ): ?>
					<div class="down-arrow">
						<a href="javascript:;">
							<i class="ion-android-arrow-down size-48"></i>
						</a>
					</div>
				<?php endif ?>
			</div>
		</div>
	</div>
