<?php
defined( 'ABSPATH' ) or die();

$post = get_post();
$images = (array) get_field( 'projectGallery' );
$options = array( 'itemSelector' => '.project-media-item' );
$columns = get_field( 'projectGalleryColumns' );

if ( ! is_numeric( $columns ) || $columns === 'default' ) {
	$columns = glb__option( 'project__galleryColumns' );
}
?>

	<div class="project-gallery project-media-grid">
		<div class="project-media-inner" data-grid="<?php echo esc_attr( json_encode( $options ) ) ?>" data-columns="<?php echo esc_attr( $columns ) ?>">
			<?php foreach ( $images as $item ): ?>
				
				<div class="project-media-item project">
					<?php glb__project_media_item( $item ) ?>
				</div>

			<?php endforeach ?>
		</div>
	</div>
