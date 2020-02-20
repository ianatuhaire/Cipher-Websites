<?php
defined( 'ABSPATH' ) or die();

add_filter( 'glb__body_class', 'glb__blog_body_class' );
add_filter( 'glb__sidebar_id', 'glb__blog_sidebar' );
add_filter( 'glb__sidebar_position', 'glb__blog_sidebar_position' );
?>

	<?php get_header() ?>
		<?php if ( have_posts() ): ?>
			<?php get_template_part( 'tmpl/post/content-author' ) ?>
			<?php get_template_part( 'tmpl/post/loop', glb__option( 'blog__archive__style' ) ) ?>
		<?php else: ?>
			<div class="content">
				<?php get_template_part( 'tmpl/post/content', 'none' ) ?>
			</div>
		<?php endif ?>
	<?php get_footer() ?>
