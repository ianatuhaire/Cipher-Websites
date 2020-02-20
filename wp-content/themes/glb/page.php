<?php
defined( 'ABSPATH' ) or die();
?>

	<?php get_header() ?>
		<?php if ( have_posts() ): the_post(); ?>
			<div class="content">
				<?php the_content() ?>
			</div>
			<!-- /.content -->

			<?php glb__comments_list() ?>
		<?php endif ?>
	<?php get_footer() ?>
