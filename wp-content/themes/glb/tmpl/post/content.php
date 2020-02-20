<?php
defined( 'ABSPATH' ) or die();
?>

	<div id="post-<?php the_ID() ?>" <?php post_class( 'post' ) ?>>
		<div class="post-inner">
			<div class="post-header">
				<?php get_template_part( 'tmpl/post/content-title' ) ?>
			</div>

			<?php get_template_part( 'tmpl/post/content-featured', get_post_format() ) ?>

			<div class="post-content">
				<?php
					glb__the_content( false );
					wp_link_pages( array(
						'before'      => '<div class="page-links"><span class="page-links-title">' . esc_html__( 'Pages:', 'glb' ) . '</span>',
						'after'       => '</div>',
						'link_before' => '<span>',
						'link_after'  => '</span>',
					) );
				?>

				<?php if ( glb__option( 'blog__archive__readmore' ) === 'on' ): ?>
					<?php get_template_part( 'tmpl/post/content-readmore' ) ?>
				<?php endif ?>

				<?php if ( ! post_password_required() && ( comments_open() || get_comments_number() ) ): ?>
					<span class="post-comments">
						<?php comments_popup_link( esc_html__( '0', 'glb' ), esc_html__( '1', 'glb' ), esc_html__( '%', 'glb' ) ); ?>
					</span>
				<?php endif ?>
			</div>
			
		</div>
	</div>
