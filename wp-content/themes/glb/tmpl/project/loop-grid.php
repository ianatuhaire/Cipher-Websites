<?php
defined( 'ABSPATH' ) or die();

$options          = array( 'itemSelector' => '.project' );
$meta_information = (array)glb__option( 'projects__meta' );
?>

	<?php if ( have_posts() ): ?>
		<div class="content" role="main" itemprop="mainContentOfPage">
			<?php get_template_part( 'tmpl/project/filter' ) ?>

			<div class="content-inner" data-grid="<?php echo esc_attr( json_encode( $options ) ) ?>" data-columns="<?php echo esc_attr( glb__option( 'projects__gridColumns' ) ) ?>">
				<?php while ( have_posts() ): the_post(); ?>

					<div <?php post_class( 'project' ) ?> itemscope="itemscope" itemtype="http://schema.org/CreativeWork">
						<div class="project-inner">
							<figure class="project-thumbnail">
								<?php if ( glb__option( 'projects__readmore' ) == 'on' ): ?>
									<div class="project-readmore">
										<a href="<?php the_permalink() ?>"><span><?php esc_html_e( 'View Detail', 'glb' ) ?></span></a>
									</div>
								<?php endif ?>
								<a class="featured-image" href="<?php the_permalink() ?>">
									<?php
										$image = glb__get_image_resized( array(
											'post_id' => get_the_ID(),
											'size'    => glb__option( 'projects__imagesize' ),
											'crop'    => glb__option( 'projects__imagesizeCrop' ) == true
										) );

										echo wp_kses_post( $image['thumbnail'] );
									?>
								</a>
							</figure>

							<div class="project-info">
								<div class="project-info-inner">

									<h2 class="project-title" itemprop="name headline">
										<a href="<?php the_permalink() ?>">
											<?php the_title() ?>
										</a>
									</h2>

									<?php if ( glb__option( 'projects__excerpt' ) == 'on' ): ?>
										<div class="project-summary">
											<?php the_excerpt() ?>
										</div>

										<div class="project-meta">
											<?php echo get_the_term_list( get_the_ID(), 'nproject-category' ) ?>
										</div>
									<?php endif ?>

								</div>
							</div>
						</div>
					</div>

				<?php endwhile ?>
			</div>
		</div>

		<?php glb__pagination() ?>
	<?php else: ?>
		<!-- Show empty message -->
	<?php endif ?>
