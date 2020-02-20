<?php
defined( 'ABSPATH' ) or die();

$classes = array( 'footer-copyright' );
$classes[] = sprintf( 'footer-copyright-%s', glb__option( 'footer__copyright__align' ) );

if ( glb__option( 'footer__copyright__full' ) == 'on' ) {
	$classes[] = 'footer-copyright-full';
}
?>

	<?php if ( glb__option( 'footer__copyright' ) == 'on' ): ?>
		<div class="<?php echo esc_attr( join( ' ', $classes ) ) ?>">
			<div class="footer-copyright-inner wrap">
				<div class="copyright-content">
					<?php echo wp_kses_post( glb__option( 'footer__copyright__content' ) ) ?>
				</div>

				<div class="footer-meta">
					<?php glb__social_icons( array( 'location' => 'footer' ) ) ?>
					<?php if ( glb__option( 'global__misc__gotop' ) == 'on' ): ?>
						<div class="go-to-top">
							<a href="javascript:;"><span><?php echo esc_html__( 'Go to Top', 'glb' ) ?></span><i class="fa fa-level-up"></i></a>
						</div>
					<?php endif ?>
				</div>
			</div>
		</div>
	<?php endif ?>