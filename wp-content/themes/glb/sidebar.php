<?php
defined( 'ABSPATH' ) or die();
?>
	
	<?php if ( glb__has_sidebar() && is_active_sidebar( glb__sidebar_id() ) ): ?>
		<aside class="main-sidebar">
			<div class="main-sidebar-inner">
				<?php dynamic_sidebar( glb__sidebar_id() ) ?>
			</div>
		</aside>
		<!-- /.sidebar -->
	<?php endif ?>
