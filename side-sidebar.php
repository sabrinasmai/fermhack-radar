// the sidebar on the side in the widget area
<?php
  ?>
		<div id="sidebar-side" class="widget-area clearfix" role="complementary">
			<?php  if ( ! dynamic_sidebar( 'sidebar-2' ) ) : ?>
                <aside id="meta" class="widget">
					<div class="widget-title"><?php  _e( 'Login/out', 'fluffy' ); ?></div>
					<ul>
						<?php  wp_loginout(); ?>
					</ul>
				</aside>
                <aside id="tag_cloud" class="widget">
					<div class="widget-title"><?php  _e( 'Tags', 'fluffy' ); ?></div>
					<ul>
				
