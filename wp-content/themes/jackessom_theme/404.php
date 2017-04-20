<?php
/**
 * The template for displaying 404 pages (not found).
 *
 * @package jackessom_theme
 */

get_header(); ?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main row" role="main">

			<div class="columns small-12 not-found">
				<h1>404</h1>
				<p><img src="<?php echo get_bloginfo('template_directory'); ?>/images/404Img.jpg"></p>
				<p><a href="/">Try going to the hompage? Most stuff is there anyway.</a></p>
			</div>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php get_footer(); ?>
