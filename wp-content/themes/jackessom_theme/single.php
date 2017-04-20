<?php
/**
 * The template for displaying all single posts.
 *
 * @package jackessom_theme
 */
$thumbnail = wp_get_attachment_image_src(get_post_thumbnail_id(), 'entryThumb');

get_header(); ?>

	<div class="entry-wrap">
		<?php while ( have_posts() ) : the_post(); ?>
			<div class="row">
				<div class="columns small-12 medium-8 medium-centered">
					<?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>
				</div>
			</div>
			<div class="row">
				<div class="columns small-12 medium-8 medium-centered">
					<div class="entry-meta">
						<div class="meta">
							<p>
								<?php the_date('M d Y', 'Posted on <span>', '</span>', true); ?> 
								<span> | </span>
								About&nbsp;
								<?php $tags_list = get_the_tag_list( '', __( ', ', 'jackessom_theme' ) );
								if ( $tags_list ) {
									printf( '<span class="tags-links">' . __( '%1$s', 'jackessom_theme' ) . '</span>', $tags_list );
								} ?>
							</p>
						</div>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="columns small-12">
					<img class="entry-header" src="<?php echo $thumbnail[0]; ?>">
				</div>
			</div>

			<div class="row">
				<div class="columns small-12 medium-8 medium-centered">
					<div id="primary" class="content-area">
						<main id="main" class="site-main" role="main">

							<?php get_template_part( 'content', 'single' ); ?>

						</main><!-- #main -->
					</div><!-- #primary -->
				</div>
			</div>

		<?php endwhile; // end of the loop. ?>
	</div>


<?php get_footer(); ?>
