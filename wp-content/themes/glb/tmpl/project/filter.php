<?php
defined( 'ABSPATH' ) or die();

$classes   = array( 'projects-filter' );
$classes[] = sprintf( 'projects-filter-%s', glb__option( 'projects__filterableAlign' ) );
/**
 * Ignore fetching project terms when archive filter is
 * disabled
 */
if ( glb__option( 'projects__filterable' ) == 'on' ):
	$terms = array();
	$filter_type = glb__option( 'projects__filterableType' );

	while ( have_posts() ) {
		the_post();

		if ( $_terms = get_the_terms( get_the_ID(), $filter_type ) ) {
			foreach ( $_terms as $term ) {
				$terms[ $term->term_id ] = $term;
			}
		}
	}

	rewind_posts();
	?>

	<?php if ( ! empty( $terms ) ): ?>
		<div class="<?php echo esc_attr( join( ' ', $classes ) ) ?>">
			<ul data-filter-target=".content-inner[data-grid]">
				<li data-filter="*" class="active">
					<a href="javascript:;">
						<?php esc_html_e( 'All', 'glb' ) ?>
					</a>
				</li>
				<?php foreach ( $terms as $id => $term ): ?>
					<li data-filter="<?php printf( '.%s-%s', esc_attr( $filter_type ), esc_attr( $term->slug ) ) ?>">
						<a href="<?php echo esc_url( get_term_link( $term ) ) ?>">		
							<?php echo esc_html( $term->name ) ?><sup><?php echo esc_html( $term->count ) ?></sup>
						</a>
					</li>
				<?php endforeach ?>
			</ul>
		</div>
	<?php endif ?>
<?php endif ?>
