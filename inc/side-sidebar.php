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
						<?php  wp_tag_cloud(); ?>
					</ul>
				</aside>
			<?php  endif;
      ?> //this piece of code is where the sidebar end in the widget area
		</div> 
