<?php
defined( 'ABSPATH' ) or die();

// Query args
$args = array(
	'post_type'           => 'post',
	'posts_per_page'      => glb__option( 'blog__related__count', 5 ),
	'post__not_in'        => array( get_the_ID() ),
	'ignore_sticky_posts' => true
);

$related_item_type = glb__option( 'blog__related__type', 'category' );

// Filter by tags
if ( 'tag' == $related_item_type ) {
	if ( ! ( $terms = get_the_tags() ) )
		return;

	$args['tag__in'] = wp_list_pluck( $terms, 'term_id' );
}
// Filter by categories
elseif ( 'category' == $related_item_type ) {
	if ( ! ( $terms = get_the_category() ) )
		return;

	$args['category__in'] = wp_list_pluck( $terms, 'term_id' );
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
$widget_title   = glb__option( 'blog__related__title' );

if ( $query->have_posts() ):
?>

	<?php if ( glb__option( 'blog__single__relatedPosts' ) == 'on' ): ?>
		<div id="related-posts" class="related-posts">
			<div class="related-posts-inner">
				<?php if ( ! empty( $widget_title ) ): ?>

					<h3 class="related-posts-title">
						<?php echo esc_html( $widget_title ) ?>
					</h3>

				<?php endif ?>

					<div class="grid-posts" data-grid="normal" data-columns="3">
						<?php while ( $query->have_posts() ): $query->the_post(); ?>
							<div <?php post_class() ?> >
								<div class="post-inner">
									<div class="post-image">
										<?php if ( has_post_thumbnail() ): ?>
											<a class="featured-image" href="<?php echo esc_url( get_permalink() ) ?>">
												<div class="post-date">
													<span><?php echo esc_html( get_the_date( get_option( 'date_format' ) ) ) ?></span>
												</div>		
												<?php
													$image = glb__get_image_resized( array( 'post_id' => get_the_ID(), 'size' => glb__option( 'blog__archive__imagesize' ) ) );
													echo wp_kses_post( $image['thumbnail'] );
												?>
											</a>
										<?php endif ?>
									</div>

									<div class="post-header">
										<?php get_template_part( 'tmpl/post/content-title' ) ?>
									</div>

								</div>
							</div>					

						<?php endwhile ?>
				    </div>
				<?php wp_reset_postdata() ?>
			</div>
		</div>

	<?php endif ?>
<?php endif ?>
