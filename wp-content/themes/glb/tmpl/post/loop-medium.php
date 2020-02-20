<?php
defined( 'ABSPATH' ) or die();
?>
	
	<div class="content" role="main" itemprop="mainContentOfPage">
		<?php if ( have_posts() ): ?>
			<?php while ( have_posts() ): the_post(); ?>
				<div id="post-<?php the_ID() ?>" <?php post_class( 'post' ) ?>>
					<div class="post-inner">
						<?php get_template_part( 'tmpl/post/content-featured', get_post_format() ) ?>
						
						<div class="post-right">
							<div class="post-content">
								<div class="post-header">
									<?php get_template_part( 'tmpl/post/content-title' ) ?>
									
									<?php if ( glb__option( 'blog__archive__postMeta' ) == 'on' ): ?>
										<?php get_template_part( 'tmpl/post/content-meta' ) ?>
									<?php endif ?>
								</div>
								
								<?php
									glb__the_content( false );
									wp_link_pages( array(
										'before'      => '<div class="page-links"><span class="page-links-title">' . esc_html__( 'Pages:', 'glb' ) . '</span>',
										'after'       => '</div>',
										'link_before' => '<span>',
										'link_after'  => '</span>',
									) );
								?>
							</div>
							
							<?php if ( glb__option( 'blog__archive__readmore' ) === 'on' ): ?>
								<?php get_template_part( 'tmpl/post/content-readmore' ) ?>
							<?php endif ?>

						</div>
					</div>
				</div>
			<?php endwhile ?>

			<?php glb__pagination() ?>
		<?php else: ?>
			<?php get_template_part( 'tmpl/post/content-none' ) ?>
		<?php endif ?>
	</div>
	<!-- /.content -->
