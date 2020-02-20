<?php
defined( 'ABSPATH' ) or die();

// The menu settings
$primary_menu_args = array(
	'theme_location'  => 'primary',
	'container'       => false,
	'menu_class'      => 'menu menu-primary',
	'fallback_cb'     => false,
	'items_wrap'      => '<ul id="%1$s" class="%2$s">%3$s</ul>',
	'depth'           => 0
);


$header_nav_extras = glb__option( 'header__nav__extras' );

$header_classes = array( 'site-header site-header-classic' );
$header_classes[] = sprintf( 'header-brand-%s', glb__option( 'header__logoAlign' ) );

if ( glb__option( 'header__width' ) === 'on' ) {
	$header_classes[] = 'header-full';
}

if ( glb__option( 'header__shadow' ) === 'on' ) {
	$header_classes[] = 'header-shadow';
}

if ( glb__option( 'header__transparent' ) === 'on' ) {
	$header_classes[] = 'header-transparent';
}
?>

	<?php if ( glb__option( 'header__topbar' ) === 'on' ): ?>
		<?php get_template_part( 'tmpl/header-topbar' ); ?>
	<?php endif ?>

	<div id="site-header" class="<?php echo esc_attr( join( ' ', $header_classes ) ) ?>">
		<div class="site-header-inner wrap">

			<div class="header-content">
				<div class="header-brand">
					<a href="<?php echo esc_attr( site_url() ) ?>">
						<?php glb__logo( glb__option( 'header__logo' ) ) ?>
					</a>

					<?php if ( is_active_sidebar( 'header-widget' ) ): ?>
						<div class="header-widget">
							<?php dynamic_sidebar( 'header-widget' ) ?>
						</div>
					<?php endif ?>
				</div>

				<?php if ( has_nav_menu( 'primary' ) || ! empty( $header_nav_extras ) ): ?>
					<nav class="navigator" itemscope="itemscope" itemtype="http://schema.org/SiteNavigationElement">

						<?php wp_nav_menu( $primary_menu_args ) ?>
						
						<div class="extras">
							<?php if ( ! empty( $header_nav_extras ) ): ?>
								<ul class="menu menu-extras">
									<?php foreach ( $header_nav_extras as $type ): ?>
										<?php get_template_part( 'tmpl/header-icon', $type ); ?>
									<?php endforeach ?>
								</ul>
							<?php endif ?>

							<?php glb__social_icons( array( 'location' => 'nav' ) ) ?>
						</div>

						<?php get_template_part( 'tmpl/header-sliding-toggle' ) ?>

					</nav>
				<?php endif ?>

				
			</div>			
		</div>
		<!-- /.site-header-inner -->
	</div>
	<!-- /.site-header -->

	<?php if ( glb__option( 'header__sticky' ) === 'on' ): ?>
		<?php get_template_part( 'tmpl/header-sticky' ); ?>
	<?php endif ?>