<?php

/**
 * Prevent direct access to this file
 */
defined( 'ABSPATH' ) or die();

$options          = array( 'itemSelector' => '.project' );
$meta_information = (array)glb__option( 'projects__meta' );

/**
 * Ignore render related box when it's disabled
 */
if ( ! is_singular( 'nproject' ) ) {
	return;
}

// Query args
$args = array(
	'post_type'      => 'nproject',
	'posts_per_page' => glb__option( 'project__related__count', 4 ),
	'post__not_in'   => array( get_the_ID() )
);

$related_item_type = glb__option( 'project__related__type' );

// Filter by tags
if ( 'tag' == $related_item_type ) {
	if ( ! ( $terms = get_the_terms( get_the_ID(), nProjects::TYPE_TAG ) ) )
		return;

	$args['tax_query'] = array(
		'taxonomy' => nProjects::TYPE_TAG,
		'field'    => 'term_id',
		'terms'    => wp_list_pluck( $terms, 'term_id' )
	);
}
// Filter by categories
elseif ( 'category' == $related_item_type ) {
	if ( ! ( $terms = get_the_terms( get_the_ID(), nProjects::TYPE_CATEGORY ) ) )
		return;

	$args['tax_query'] = array(
		'taxonomy' => nProjects::TYPE_CATEGORY,
		'field'    => 'term_id',
		'terms'    => wp_list_pluck( $terms, 'term_id' )
	);
}
// Show random items
elseif ( 'random' == $related_item_type ) {
	$args['orderby'] = 'rand';
}
// Show latest items
elseif ( 'recent' == $related_item_type ) {
	$args['order'] = 'DESC';
	$args['orderby'] = 'date';
}

// Create the query instance
$query = new WP_Query( $args );
$widget_title = glb__option( 'project__related__title' );

if ( $query->have_posts() ): ?>

	<div class="projects-related projects projects-grid">
		<div class="projects-related-inner">
			<?php if ( ! empty( $widget_title ) ): ?>

				<h2 class="projects-related-title">
					<?php echo esc_html( $widget_title ) ?>
				</h2>

			<?php endif ?>

			<div class="projects-related-wrap" data-grid="<?php echo esc_attr( json_encode( $options ) ) ?>" data-columns="<?php echo esc_attr( glb__option( 'projects__related__gridColumns' ) ) ?>">
				<?php while ( $query->have_posts() ): $query->the_post(); ?>

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
	</div>

<?php endif ?>
