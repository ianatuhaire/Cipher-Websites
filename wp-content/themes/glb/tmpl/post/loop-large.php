<?php
defined( 'ABSPATH' ) or die();
?>
	
	<div class="content" role="main" itemprop="mainContentOfPage">
		<?php if ( have_posts() ): ?>
			<?php while ( have_posts() ): the_post(); ?>
				<div id="post-<?php the_ID() ?>" <?php post_class( 'post' ) ?>>
					<div class="post-inner">
						<?php get_template_part( 'tmpl/post/content-featured', get_post_format() ) ?>

						<div class="post-header">
							<?php get_template_part( 'tmpl/post/content-title' ) ?>

							<?php if ( glb__option( 'blog__archive__postMeta' ) == 'on' ): ?>
								<ul class="post-meta">
									<li class="post-date">
										<span class="post-day"><?php echo esc_html( get_the_date( 'd' ) ) ?></span>
										<span class="post-month"><?php echo esc_html( get_the_date( 'M' ) ) ?></span>
									    <span class="post-year"><?php echo esc_html( get_the_date( 'Y' ) ) ?></span>
									</li>

									<li class="post-categories">
										<?php the_category( _x( ' ', 'Used between list items, there is a space after the comma.', 'glb' ) ) ?>
									</li>
									
								</ul>
							<?php endif ?>
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

							<?php
								defined( 'ABSPATH' ) or die();

								$post_permalink = get_permalink();
								$post_target    = '_self';

								if ( get_post_format() == 'link' ) {
									$post_permalink = get_post_meta( get_the_ID(), '_post_link', true );
									$post_target    = get_post_meta( get_the_ID(), '_post_link_target', true );
								}
							?>

								<a class="blog-readmore button" href="<?php echo esc_url( $post_permalink ) ?>" target="<?php echo esc_attr( $post_target ) ?>">
									<span><?php echo esc_html__( 'Read More', 'glb' ) ?></span>
								</a>
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
			