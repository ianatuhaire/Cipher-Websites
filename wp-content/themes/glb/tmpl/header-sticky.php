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

$header_classes = array( 'site-header-sticky' );
$header_classes[] = sprintf( 'header-brand-%s', glb__option( 'header__sticky__logoAlign' ) );

if ( glb__option( 'header__sticky__width' ) === 'on' ) {
	$header_classes[] = 'header-full';
}

if ( glb__option( 'header__sticky__shadow' ) === 'on' ) {
	$header_classes[] = 'header-shadow';
}

if ( glb__option( 'header__sticky__transparent' ) === 'on' ) {
	$header_classes[] = 'header-transparent';
}
?>

	<div id="site-header-sticky" class=" <?php echo esc_attr( join( ' ', $header_classes ) ) ?>">
		<div class="site-header-inner wrap">

			<div class="header-brand">
				<a href="<?php echo esc_attr( site_url() ) ?>">
					<?php glb__logo( glb__option( 'header__sticky__logo' ) ) ?>
				</a>
			</div>

			<?php if ( has_nav_menu( 'primary' ) ): ?>
				<nav class="navigator" itemscope="itemscope" itemtype="http://schema.org/SiteNavigationElement">

					<?php wp_nav_menu( $primary_menu_args ) ?>
					
					<div class="extras">
						<?php glb__social_icons( array( 'location' => 'sticky' ) ) ?>

						<?php if ( ! empty( $header_nav_extras ) ): ?>
							<ul class="menu menu-extras">
								<?php foreach ( $header_nav_extras as $type ): ?>
									<?php get_template_part( 'tmpl/header-icon', $type ); ?>
								<?php endforeach ?>
							</ul>
						<?php endif ?>

						<?php get_template_part( 'tmpl/header-sliding-toggle' ) ?>
					</div>

				</nav>
			<?php endif ?>

		</div>
		<!-- /.site-header-inner -->
	</div>
	<!-- /.site-header -->