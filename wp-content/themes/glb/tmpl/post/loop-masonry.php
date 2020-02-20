<?php
defined( 'ABSPATH' ) or die();

$options = array( 'itemSelector' => '.post' );
?>
	
	<div class="content" role="main" itemprop="mainContentOfPage">
		<?php if ( have_posts() ): ?>
			<div class="content-inner" data-grid="<?php echo esc_attr( json_encode( $options ) ) ?>" data-columns="<?php echo esc_attr( glb__option( 'blog__archive__columns' ) ) ?>">
				<?php while ( have_posts() ): the_post(); ?>
					<div id="post-<?php the_ID() ?>" <?php post_class( 'post' ) ?>>
						<div class="post-inner">
							<?php get_template_part( 'tmpl/post/content-featured', get_post_format() ) ?>
							
							<div class="post-header">
								<?php if ( glb__option( 'blog__archive__postMeta' ) == 'on' ): ?>
									<?php get_template_part( 'tmpl/post/content-meta' ) ?>
								<?php endif ?>
								
								<?php get_template_part( 'tmpl/post/content-title' ) ?>
							</div>

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
				<?php endwhile ?>
			</div>

			<?php glb__pagination() ?>
		<?php else: ?>
			<?php get_template_part( 'tmpl/post/content-none' ) ?>
		<?php endif ?>
	</div>
	<!-- /.content -->

