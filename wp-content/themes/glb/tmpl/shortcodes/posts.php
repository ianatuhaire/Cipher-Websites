<?php
/**
 * WARNING: This file is part of the UI-Pack plugin. DO NOT edit
 * this file under any circumstances.
 */
if ( ! defined( 'ABSPATH' ) )
	exit;

$atts = shortcode_atts( array(
	'class'          => '',
	'css'            => '',
	
	'title'          => '',
	'category'       => '',
	'tag'            => '',
	'layout'         => 'grid', // grid, list
	'thumbnail_size' => 'full',
	'grid_columns'   => 3,
	'hide_content'   => '',
	'content_length' => 40,
	'exclude'        => '',
	
	'hide_readmore'  => '',
	'readmore_text'  => esc_html__( 'Continue &rarr;', 'glb' ),
	
	'icon'           => 'post-thumbnail',
	'limit'          => 9,
	'offset'         => 0,
	'class'          => '',
	'css'            => ''
), $atts );

$args = array(
	'post_type'           => 'post',
	'ignore_sticky_posts' => true,
	'offset'              => intval( '0' . $atts['offset'] ),
	'tax_query'           => array(
		'relation' => 'OR'
	)
);

if ( ! empty( $atts['category'] ) ) {
	if ( ! is_array( $atts['category'] ) )
		$atts['category'] = array_map( 'trim', explode( ',', $atts['category'] ) );

	$args['tax_query'][] = array(
		'taxonomy'         => 'category',
		'field'            => 'slug',
		'terms'            => $atts['category'],
		'include_children' => false
	);
}

if ( ! empty( $atts['tag'] ) ) {
	if ( ! is_array( $atts['tag'] ) )
		$atts['tag'] = array_map( 'trim', explode( ',', $atts['tag'] ) );

	$args['tax_query'][] = array(
		'taxonomy'         => 'post_tag',
		'field'            => 'slug',
		'terms'            => $atts['tag']
	);
}

if ( is_numeric( $atts['limit'] ) && $atts['limit'] >= 0 ) {
	$args['posts_per_page'] = $atts['limit'];
}

if ( ! empty( $atts['exclude'] ) )
	$args['post__not_in'] = explode( ',', $atts['exclude'] );

$query = new WP_Query( $args );

/**
 * Return an empty string when no posts found
 */
if ( ! $query->have_posts() ) {
	return '';
}

$class   = array( 'blog-shortcode' );
if ( function_exists('vc_shortcode_custom_css_class') ) {
	$class[] = vc_shortcode_custom_css_class( $atts['css'], ' ' );
}

if ( $atts['hide_content'] != 'yes' ) {
	$class[] = 'has-post-content';
}

if ( $atts['icon'] != 'none' && in_array( $atts['icon'], array( 'post-thumbnail', 'post-date', 'post-format' ) ) ) {
	$class[] = $atts['icon'] . '-cover';
}

if ( ! empty( $atts['class'] ) ) {
	$class[] = $atts['class'];
}

$options = array( 'itemSelector' => '.post' );
?>

	<div class="<?php echo esc_attr( implode( ' ', $class ) ) ?>">
		<?php if ( ! empty( $atts['title'] ) ): ?>
			<h3 class="widget-title"><?php echo esc_html( $atts['title'] ) ?></h3>
		<?php endif ?>

		<div class="blog-entries">
			<?php if ( $atts['layout'] == 'grid' ): ?>
				<div class="entries-wrapper content-inner blog-grid" data-grid="<?php echo esc_attr( json_encode( $options ) ) ?>" data-columns="<?php echo esc_attr( $atts['grid_columns'] ) ?>">
			<?php else: ?>
				<div class="entries-wrapper content-inner">
			<?php endif ?>
				<?php while ( $query->have_posts() ): $query->the_post(); ?>
				
				<div <?php post_class( 'post' ) ?>>
					<div class="post-inner">		
						<?php if ( in_array( $atts['icon'], array( 'post-thumbnail', 'post-date', 'post-format' ) ) ): ?>
							
							<?php if ( $atts['icon'] == 'post-thumbnail' && has_post_thumbnail() ): ?>
								
								<div class="post-image">
									<h2 class="post-title">
										<a href="<?php the_permalink() ?>"><?php the_title() ?></a>
									</h2>
									<span class="post-categories">
										<?php the_category( _x( ' ', 'Used between list items, there is a space after the comma.', 'glb' ) ) ?>
									</span>
									<a class="featured-image" href="<?php the_permalink() ?>">
										<?php
											/**
											 * Preparing the post thumbnail
											 */
											$image = wpb_getImageBySize( array( 'post_id' => get_the_ID(), 'thumb_size' => $atts['thumbnail_size'] ) );
											print( $image['thumbnail'] );
										?>
									</a>
								</div>

							<?php elseif ( $atts['icon'] == 'post-date' ): ?>

								
								<div class="post-image">
									<a class="featured-image" href="<?php the_permalink() ?>">
										<h2 class="post-title">
											<?php the_title() ?>
										</h2>
										<div class="post-date">
											<span><?php echo esc_html( get_the_date( get_option( 'date_format' ) ) ) ?></span>
										</div>
									</a>
								</div>
							

							<?php else: ?>

								<div class="post-image">
									<span class="<?php echo esc_attr( get_post_format() ) ?>">
										<?php echo esc_html( get_post_format() ) ?>
									</span>
								</div>

							<?php endif ?>

						<?php endif ?>

						
						<?php if ( $atts['hide_content'] != 'yes' ): ?>
						
							<div class="post-content">
								<p>
									<?php

										$content = get_the_content();
										$content = trim( strip_tags( $content ) );
										$length  = intval( '0' . $atts['content_length'] );
										$length  = max( $length, 1 );

										if ( mb_strlen( $content ) > $length ) {
											$content = mb_substr( $content, 0, $length );
											$content.= '...';
										}

										echo wp_kses_post( $content );
									?>
								</p>

								<?php if ( $atts['hide_readmore'] != 'yes' ): ?>
									<a class="blog-readmore" href="<?php the_permalink() ?>">			
										<span><?php echo esc_html( $atts['readmore_text'] ) ?></span>
									</a>
								<?php endif ?>
							</div>

						<?php endif ?>
					</div>		
				</div>

				<?php endwhile ?>
				<?php wp_reset_postdata() ?>
			</div>
		</div>
	</div>