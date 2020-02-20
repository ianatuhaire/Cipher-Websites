<?php
defined( 'ABSPATH' ) or die();

$featured_background_types = (array) glb__option( 'header__titlebar__backgroundFeatured' );
$current_post_type         = glb__current_post_type();
$show_featured_image       = ! in_array( $current_post_type, $featured_background_types ) && has_post_thumbnail();

$gallery_position = get_field( 'projectGalleryPosition' );
$gallery_style = get_field( 'projectGalleryStyle' );

if ( $gallery_position === 'default' ) {
	$gallery_position = glb__option( 'project__galleryPosition' );
}

if ( $gallery_style === 'default' ) {
	$gallery_style = glb__option( 'project__galerryMode' );
}

add_filter( 'glb__body_class', 'glb__single_project_body_classes' );
add_filter( 'glb__sidebar_id', 'glb__single_project_sidebar' );
add_filter( 'glb__sidebar_position', 'glb__single_project_sidebar_position' );
?>
	<?php get_header() ?>
		<?php if ( have_posts() ): the_post(); ?>

			<div class="content">
				<div class="content-inner">
					
					<div class="project-detail">
						<div class="project-header">
							<h2 class="post-title" itemprop="headline">
								<?php the_title(); ?>
							</h2>
							
							<div class="post-meta-group">
								<ul class="meta-header">
									<li class="project-date">
										<i class="ion-android-alarm-clock size-21"></i>
										<span><?php echo esc_html( get_the_date( get_option( 'date_format' ) ) ) ?></span>
									</li>
									<li class="project-category">
										<i class="ion-android-wifi size-21"></i>
										<?php echo get_the_term_list( get_the_ID(), 'nproject-category' ) ?>
									</li>
									<li class="project-print">
										<i class="ion-printer size-21"></i>
										<a class="print" href="javascript:window.print();"><?php esc_html_e( 'Print', 'glb' ) ?></a>
									</li>
								</ul>
							</div>

							<?php glb__header_page_title() ?>
						</div>

						<div class="project-featured-image"><?php the_post_thumbnail( 'post-thumbnail' ) ?></div>

						<?php if ( in_array( $gallery_position, array( 'top', 'left' ) ) ): ?>
							<?php get_template_part( 'tmpl/project/gallery', $gallery_style ) ?>
						<?php endif ?>

						<div class="project-content">
							<div class="project-content-inner">
								<?php the_content() ?>
							</div>
							
							<div class="project-meta-tag">
								<?php if ( glb__option( 'project__tags' ) == 'on' ): ?>
									<div class="project-tags"><?php echo get_the_term_list( get_the_ID(), 'nproject-tag' ) ?></div>
								<?php endif ?>

								<?php get_template_part( 'tmpl/post/content-sharing' ) ?>
							</div>
						</div>

						<?php if ( in_array( $gallery_position, array( 'bottom', 'right' ) ) ): ?>
							<?php get_template_part( 'tmpl/project/gallery', $gallery_style ) ?>
						<?php endif ?>
					</div>

					<?php if ( glb__option( 'project__author' ) == 'on' ): ?>
						<?php get_template_part( 'tmpl/post/content-author' ) ?>
					<?php endif ?>

					<?php if ( glb__option( 'project__pagination' ) == 'on' ): ?>
						<?php get_template_part( 'tmpl/post/content-navigator' ) ?>
					<?php endif ?>

					<?php if ( glb__option( 'project__related' ) == 'on' ): ?>
						<?php get_template_part( 'tmpl/project/related' ) ?>
					<?php endif ?>

				</div>
			</div>
		<?php endif ?>
	<?php get_footer() ?>
