<?php
defined( 'ABSPATH' ) or die();

$featured_background_types = (array) glb__option( 'header__titlebar__backgroundFeatured' );
$current_post_type         = glb__current_post_type();
$show_featured_image       = ! in_array( $current_post_type, $featured_background_types ) && has_post_thumbnail();
?>

	<div id="post-<?php the_ID() ?>" <?php post_class( 'post' ) ?>>
		<div class="post-inner">
			<div class="post-header">
				<h2 class="post-title" itemprop="headline">
					<?php the_title(); ?>
				</h2>

				<?php if ( glb__option( 'blog__single__postMeta' ) == 'on' ): ?>
					<div class="post-meta-group">
						<ul class="meta-header">
							<li class="author">
								<i class="ion-android-contact size-21"></i>
								<?php the_author_posts_link() ?>
							</li>
							<li class="post-date">
								<i class="ion-android-alarm-clock size-21"></i>
								<span class="post-day"><?php echo esc_html( get_the_date( get_option( 'date_format' ) ) ) ?></span>
							</li>
							<?php if ( ! post_password_required() && ( comments_open() || get_comments_number() ) ): ?>
								<li class="comments">
									<i class="ion-android-hangout size-21"></i>
									<?php comments_popup_link( esc_html__( '0 comment', 'glb' ), esc_html__( '1 Comment', 'glb' ), esc_html__( '% Comments', 'glb' ) ); ?>
								</li>
							<?php endif ?>
						</ul>
					</div>
				<?php endif ?>

				<?php glb__header_page_title() ?>	
			</div>

			<?php if ( $show_featured_image ): ?>
				<div class="post-thumbnail">
					<?php the_post_thumbnail( 'post-thumbnail' ) ?>
				</div>
				<!-- /.post-thumbnail -->
			<?php endif ?>
			
			<div class="post-content" itemprop="text">
				<div class="post-content-inner">
					<?php the_content() ?>
				</div>
				<!-- /.post-content-inner -->

				<?php
					wp_link_pages( array(
						'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'glb' ),
						'after'  => '</div>',
					) );
				?>
				
				<div class="post-meta-tag">
					<?php if ( glb__option( 'blog__single__postTags' ) == 'on' ): ?>
						<div class="post-tags"><?php the_tags( '', ' ' ); ?></div>
					<?php endif ?>
					
					<?php if ( glb__option( 'blog__single__postMeta' ) == 'on' ): ?>
						<?php get_template_part( 'tmpl/post/content-sharing' ) ?>
					<?php endif ?>
				</div>

			</div>
			<!-- /.post-content -->

		</div>
		<!-- /.post-inner -->
	</div>
	<!-- /#post-<?php echo get_the_ID() ?> -->
