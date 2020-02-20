<?php
defined( 'ABSPATH' ) or die();
?>
	
	<?php if ( glb__option( 'blog__archive__postMeta' ) == 'on' ): ?>
		<ul class="post-meta">
			<li class="post-date">
				<span><?php echo esc_html( get_the_date( get_option( 'date_format' ) ) ) ?></span>
			</li>

			<li class="post-categories">
				<?php the_category( _x( ' ', 'Used between list items, there is a space after the comma.', 'glb' ) ) ?>
			</li>
			
		</ul>
	<?php endif ?>
