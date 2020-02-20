<?php
defined( 'ABSPATH' ) or die();


add_filter( 'glb__body_class', 'glb__projects_body_class' );
add_filter( 'glb__sidebar_id', 'glb__projects_sidebar' );
add_filter( 'glb__sidebar_position', 'glb__projects_sidebar_position' );
?>

	<?php get_header() ?>
		<?php if ( have_posts() ): ?>
			<?php get_template_part( 'tmpl/project/loop', glb__option( 'projects__displayMode' ) ) ?>
		<?php else: ?>
			<div class="content">
				<?php get_template_part( 'tmpl/project/content', 'none' ) ?>
			</div>
		<?php endif ?>
	<?php get_footer(); ?>

