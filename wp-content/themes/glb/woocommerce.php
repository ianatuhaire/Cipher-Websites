<?php
defined( 'ABSPATH' ) or die();

add_filter( 'glb__body_class', 'glb__woocommerce_body_class' );
add_filter( 'glb__sidebar_id', 'glb__woocommerce_sidebar' );
add_filter( 'glb__sidebar_position', 'glb__woocommerce_sidebar_position' );
?>

	<?php get_header() ?>
		<div class="content">
			<?php woocommerce_content() ?>
		</div>
	<?php get_footer() ?>
