<?php
/**
 * Template part for displaying single posts.
 *
 * @package sabrina-theme
 */

?>
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header class="entry-header">
		<?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>

		<div class="entry-meta">
			<?php sabrina_theme_posted_on(); ?>
		</div><!-- .entry-meta -->
	</header><!-- .entry-header -->
