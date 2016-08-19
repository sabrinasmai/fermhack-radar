<?php
/**
 * The sidebar containing the main widget area.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package sabrinas-theme
 */
 if (!is_page()) { ?>
 <div id="sidebar" class="widget-area side-widget-area" role="complementary">
 <?php  if ( is_active_sidebar( 'the_sidebar' ) ) : ?>
 <div class="sidebar-widgets">
 <?php  dynamic_sidebar( 'the_sidebar' ); ?>
 </div>
 <?php  endif; ?>
 </div>
 <?php
 	}


 	if ( ! is_active_sidebar( 'sidebar-1' ) && ! is_active_sidebar( 'sidebar-2' ) && ! is_active_sidebar( 'sidebar-3' ) ) {
 		return;
 	}

 	?>
	//The Sidebar containing the area of widget.
         <?php
 	get_sidebar('side');

 	?>
