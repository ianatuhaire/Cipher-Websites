<?php
defined( 'ABSPATH' ) or die();
?>
	
	<div class="post-audio">
		<?php if ( ! is_single() ): ?>
			<div class="post-audio-thumbnail">
				<?php if ( has_post_thumbnail() ): ?>
					<a href="<?php echo esc_url( get_permalink() ) ?>">
						<?php
							$image = glb__get_image_resized( array( 'post_id' => get_the_ID(), 'size' => glb__option( 'blog__archive__imagesize' ) ) );
							echo wp_kses_post( $image['thumbnail'] );
						?>
					</a>
				<?php else: ?>
					
				<?php endif ?>
			</div>
		<?php else: ?>
			<div class="post-audio-player">
				<?php echo wp_oembed_get( get_post_meta( get_the_ID(), '_post_audio_oembed', true ), array( 'width' => '760' ) ); ?>
			</div>
		<?php endif ?>
	</div>
