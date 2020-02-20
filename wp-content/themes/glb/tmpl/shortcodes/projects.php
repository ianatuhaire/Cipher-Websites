<?php
$original_atts = $atts;
$atts = shortcode_atts( array(
	'widget_title'       => '',
	'categories'         => '',
	'tags'               => '',
	'filter'             => 'yes',
	'filter_by'          => 'category',
	'filter_title'       => '',
	'filter_subtitle'    => '',
	'filter_description' => '',
	'filter_as_item'     => 'no',
	'filter_content'     => '',
	'mode'               => 'carousel',
	'columns'            => 3,
	'limit'              => 9,
	'offset'             => 0,
	'thumbnail_size'     => 'full',
	'readmore'           => 'yes',
	'readmore_text'      => '',
	'order'              => 'date',
	'direction'          => 'DESC',
	'class'              => '',
	'css'                => ''
), $atts );

// Remove attribute "class" from origial attributes
if ( isset( $original_atts['class'] ) ) unset( $original_atts['class'] );
if ( isset( $original_atts['css'] ) )   unset( $original_atts['css'] );

// Santinize the shortcode attributes
$atts['limit']  = abs( (int) $atts['limit'] );
$atts['limit']  = max( 1, $atts['limit']);
$atts['offset'] = abs( (int) $atts['offset'] );

// Santinize categories
$atts['categories'] = explode( ',', $atts['categories'] );
$atts['categories'] = array_map( 'trim', $atts['categories'] );
$atts['categories'] = array_filter( $atts['categories'] );

// Sanitize tags
$atts['tags'] = explode( ',', $atts['tags'] );
$atts['tags'] = array_map( 'trim', $atts['tags'] );
$atts['tags'] = array_filter( $atts['tags'] );

$atts['filter'] = $atts['filter'] == 'yes' && $atts['mode'] != 'carousel';

if ( ! in_array( $atts['order'], array( 'date', 'ID', 'author', 'title', 'modified', 'rand', 'comment_count', 'menu_order' ) ) )
	$atts['order'] = 'date';

if ( ! in_array( $atts['direction'], array( 'ASC', 'DESC' ) ) )
	$atts['order'] = 'DESC';

// Begin build post type query
$args = array(
	'post_type'      => nProjects::TYPE_NAME,
	'posts_per_page' => $atts['limit'],
	'offset'         => $atts['offset'],
	'orderby'        => $atts['order'],
	'order'          => $atts['direction'],
	'tax_query'      => array(
		'relation'   => 'AND'
	)
);

if ( ! empty( $atts['categories'] ) ) {
	$args['tax_query'][] = array(
		'taxonomy' => nProjects::TYPE_CATEGORY,
		'field'    => 'slug',
		'terms'    => $atts['categories']
	);
}

if ( ! empty( $atts['tags'] ) ) {
	$args['tax_query'][] = array(
		'taxonomy' => nProjects::TYPE_TAG,
		'field'    => 'slug',
		'terms'    => $atts['tags']
	);
}

$query = new WP_Query( $args );
$decoder = 'base64' . '_decode';

// Start output the carousel
if ( $query->have_posts() ):
	$classes = array( 'projects projects-shortcode' );
	$classes[] = "projects-{$atts['mode']}";

	if ( $atts['filter'] )
		$classes[] = 'projects-has-filter';

	if ( $atts['filter_as_item'] == 'yes' )
		$classes[] = 'projects-filter-as-grid';

	$classes[] = $atts['class'];

	if ( function_exists('vc_shortcode_custom_css_class') ) {
		$classes[] = vc_shortcode_custom_css_class( $atts['css'], ' ' );
	}

	$options = array( 'itemSelector' => '.project' );
?>
	<!-- BEGIN: .projects -->
	<div class="<?php echo esc_attr( join( ' ', $classes ) ) ?>">
		<div class="projects-wrap">

			<?php if ( ! empty( $atts['widget_title'] ) ): ?>
				<h3 class="widget-title"><?php echo esc_html( $atts['widget_title'] ) ?></h3>
			<?php endif ?>

			<?php
			if ( $atts['filter'] ):
				$filter_terms = array();
				$filter_type = array( 'category' => nProjects::TYPE_CATEGORY, 'tag' => nProjects::TYPE_TAG );

				while ( $query->have_posts() ):
					$query->the_post();

					if ( $categories = get_the_terms( get_the_ID(), $filter_type[ $atts['filter_by'] ] ) )
						foreach ( $categories as $term )
							$filter_terms[ $term->term_id ] = $term;
				endwhile;

				// Reset the posts pointer
				$query->rewind_posts();
				?>

				<?php if ( ! empty( $filter_terms ) ): ?>
					<div class="projects-filter">
						<ul data-filter-target=".projects-items[data-grid]">
							<li data-filter="*" class="active">
								<a href="javascript:;">
									<?php esc_html_e( 'All', 'glb' ) ?>
								</a>
							</li>
							<?php foreach ( $filter_terms as $id => $term ): ?>
								<li data-filter="<?php printf( '.%s-%s', esc_attr( $filter_type[ $atts['filter_by'] ] ), esc_attr( $term->slug ) ) ?>">
									<a href="<?php echo esc_url( get_term_link( $term ) ) ?>">
										<?php echo esc_html( $term->name ) ?><sup><?php echo esc_html( $term->count ) ?></sup>
									</a>
								</li>
							<?php endforeach ?>
						</ul>
					</div>
				<?php endif ?>
			<?php endif ?>

			<div class="projects-items" data-grid="<?php echo esc_attr( json_encode( $options ) ) ?>" data-columns="<?php echo esc_attr( $atts['columns'] ) ?>">

				<?php while ( $query->have_posts() ): $query->the_post(); ?>
					<!-- Project -->
					<div class="<?php echo esc_attr( join( ' ', get_post_class( 'project' ) ) ) ?>">
						<div class="project-inner">
							<figure class="project-thumbnail">
								<?php if ( $atts['readmore'] == 'yes' ): ?>
									<div class="project-readmore">
										<a href="<?php the_permalink() ?>"><span><?php echo esc_html( $atts['readmore_text'] ) ?></span></a>
									</div>
								<?php endif ?>
								<a class="featured-image" href="<?php the_permalink() ?>">
									<span><?php the_title() ?></span>
									<?php
										/**
										 * Preparing the post thumbnail
										 */
										$image = glb__get_image_resized( array( 'post_id' => get_the_ID(), 'size' => $atts['thumbnail_size'], 'crop' => true ) );
										print( $image['thumbnail'] );
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
									<?php endif ?>

									<div class="project-meta">
										<?php echo get_the_term_list( get_the_ID(), 'nproject-category' ) ?>
									</div>
								</div>
							</div>
						</div>
					</div>
					<!-- /Project -->

				<?php endwhile ?>
				<?php wp_reset_postdata() ?>

			</div>
		</div>
	</div>
	<!-- END: .projects -->
<?php endif ?>
