<?php
defined( 'ABSPATH' ) or die();
?>

	<?php get_header() ?>
		<div class="content">
			<div class="heading-404">
				<span><?php _ex( '404', 'frontend', 'glb' ) ?></span>
			</div>
			<div class="content-404">
				<h3><?php _ex( 'Looks Like Something Went Wrong!', 'frontend', 'glb' ) ?></h3>
				<p><?php _ex( 'The page you were looking for is not here. Maybe you want to perform a search?', 'frontend', 'glb' ); ?></p>
				<?php get_search_form(); ?>
			</div>
		</div>
		<!-- /.content-inner -->
	<?php get_footer() ?>
