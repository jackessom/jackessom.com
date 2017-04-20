<?php
/**
 * The main template file.
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package jackessom_theme
 */

$categories = get_categories();

$GLOBALS['currentCategory'] = "none";
foreach ($categories as $cat) {
	if (single_cat_title( '', false ) == $cat->cat_name) {
		$GLOBALS['currentCategory'] = $cat->cat_name;
	} 
}

if (is_tag()){
	$GLOBALS['currentTag'] = single_tag_title("", false);;
}
else{
	$GLOBALS['currentTag'] = "none";
}

get_header(); ?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main row" role="main">



		<?php if ( is_home() || is_category()) : ?>

			<div class="columns small-12 medium-6 filter-tagCloud">
				<?php dynamic_sidebar( 'tag-cloud' ); ?>
			</div>

			<div class="columns small-12 medium medium-6 filter-links">
				<a href="/" id="all" class="social-link filter-link <?php if ( is_home()) {echo 'active';}?>">all</a>
				<?php
					foreach (get_categories() as $cat) {
						if (single_cat_title( '', false ) == $cat->cat_name) {
							$isActive = 'active';
							$GLOBALS['currentCategory'] = $cat->cat_name;
						} else {
							$isActive = '';
						}
						echo '<a href="/category/'.$cat->cat_name.'" class="social-link '.$isActive.'">' . $cat->cat_name . '</a>';
					}
				?>
			</div>	
		<?php endif; ?>
		<?php if ( is_tag()) : ?>
			<div class="columns small-12 filter-links tag">
				<span class="social-link">everything <?php single_tag_title(); ?> </span>
			</div>	
		<?php endif; ?>
			<div class="columns small-12">
				<div id="packery-container">
					<div class="gutter-sizer"></div>
					<div class="grid-sizer"></div>

						<?php if ( have_posts() ) : ?>

							<?php /* Start the Loop */ ?>
							<?php while ( have_posts() ) : the_post(); ?>

								<?php
									/* Include the Post-Format-specific template for the content.
									 * If you want to override this in a child theme, then include a file
									 * called content-___.php (where ___ is the Post Format name) and that will be used instead.
									 */
									get_template_part( 'content', get_post_format() );
									
								?>

							<?php endwhile; ?>
							

						<?php else : ?>

							<?php get_template_part( 'content', 'none' ); ?>

						<?php endif; ?>

				</div>
			</div>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php get_footer(); ?>
