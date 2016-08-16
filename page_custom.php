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
  if ($my_query->have_posts()) : while ($my_query->have_posts()) : $my_query->the_post();


          if($counter == 1) :

  	?>		<div class="gridleft">
  				<a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>"><?php the_post_thumbnail('thumbnail'); ?></a>
  			</div>
  	<?php

          elseif($counter == $grid) :

  	?>
  			<div class="gridright">
  				<a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>"><?php the_post_thumbnail('thumbnail'); ?></a>
  			</div>
  	<?php
