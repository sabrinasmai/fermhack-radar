<?php
/**
 * Template Name: Category Image
 *
 *
 *
 */

 ?>
 <?php get_header(); ?>


	<div id="gridcontainer">
		<?php

			$counter = 1;
			$grid = 2;

			$paged = ( get_query_var('page') ) ? get_query_var('page') : 1;

			$args = array('post_type' => 'locations', 'showposts' => 4, 'order' => 'ASC', 'paged' => $paged );
			$my_query = new WP_Query($args);
		?>

	<?php
