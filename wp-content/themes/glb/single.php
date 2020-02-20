<?php
defined( 'ABSPATH' ) or die();

add_filter( 'glb__sidebar_id', 'glb__single_sidebar' );
add_filter( 'glb__sidebar_position', 'glb__single_sidebar_position' );
?>
	<?php get_header() ?>
		<?php if ( have_posts() ): ?>
			<div class="content">
				<?php while ( have_posts() ): the_post(); ?>
					<?php get_template_part( 'tmpl/post/content', 'single' ) ?>
				<?php endwhile ?>
			</div>

			<?php if ( glb__option( 'blog__single__postNav' ) == 'on' ): ?>
				<?php get_template_part( 'tmpl/post/content-navigator' ) ?>
			<?php endif ?>

			<?php if ( glb__option( 'blog__single__postAuthor' ) == 'on' ): ?>
				<?php get_template_part( 'tmpl/post/content-author' ) ?>
			<?php endif ?>
			
			<?php glb__related_posts() ?>
			<?php glb__comments_list() ?>
			
		<?php endif ?>
	<?php get_footer() ?>
