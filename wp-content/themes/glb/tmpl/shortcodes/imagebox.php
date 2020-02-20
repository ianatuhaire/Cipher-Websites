<?php
$atts = shortcode_atts( array(
	'class'       => '',
	'css'         => '',
	'image'       => '',
	'image_size'  => 'full',
	'title'       => '',
	'subtitle'    => '',
	'link'        => '',
	'target'      => '',
	'show_button' => 'no',
	'button_text' => esc_html__( 'Continue', 'glb' )
), $atts );

// Preparing the shortcode attributes
$atts['show_button'] = $atts['show_button'] == 'yes';
$atts['button_text'] = empty( $atts['button_text'] ) ? esc_html__( 'Continue', 'glb' ) : $atts['button_text'];

// Build the element classes
$classes = array( 'imagebox' );
$classes[] = $atts['class'];

if ( function_exists( 'vc_shortcode_custom_css_class' ) ) {
	$classes[] = vc_shortcode_custom_css_class( $atts['css'], ' ' );
}

// Preparing image for the box
if ( is_numeric( $atts['image'] ) ) {
	$image = wpb_getImageBySize( array( 'attach_id' => $atts['image'], 'thumb_size' => $atts['image_size'] ) );
	$image = $image['thumbnail'];
}
elseif ( filter_var( $atts['image'], FILTER_VALIDATE_URL ) ) {
	$image = sprintf( '<img src="%s" />', esc_url( $atts['image'] ) );
}

$content = wpautop( $content );
$content = preg_replace( '/<([a-z]+)>\s*<\/\\1>/i', '', $content );
$content = wp_kses_post( $content );
?>

<!-- BEGIN .imagebox -->
<div class="<?php echo esc_attr( join( ' ', $classes ) ) ?>">
	<?php if ( ! empty( $image ) ): ?>

		<div class="box-header">
			<h3 class="box-title">
				<a href="<?php echo esc_url( $atts['link'] ) ?>" target="<?php echo empty($atts['target']) ? '_self' : esc_attr( $atts['target'] ) ?>">
					<?php echo wp_kses_post( $atts['title'] ) ?>
				</a>
			</h3>

			<?php if ( ! empty( $atts['subtitle'] ) ): ?>
				<span class="box-subtitle">
					<?php echo wp_kses_post( $atts['subtitle'] ) ?>
				</span>
			<?php endif ?>
		</div>

		<div class="box-content"><?php if ( ! empty( $content ) ): ?><?php echo wp_kses_post( $content ) ?><?php endif ?></div>

		<div class="box-image">
			<a href="<?php echo esc_url( $atts['link'] ) ?>" target="<?php echo empty($atts['target']) ? '_self' : esc_attr( $atts['target'] ) ?>">
				<?php if ( $atts['show_button'] ): ?>
					<div class="box-button button">	
						<span><?php echo esc_html( $atts['button_text'] ) ?></span><i class="ion-log-in"></i>
					</div>
				<?php endif ?>

				<?php print( $image ) ?>
			</a>
		</div>
	<?php endif ?>
</div>
<!-- End .imagebox -->
