<?php
/**
 * @package jackessom_theme
 */

if ( has_post_format( 'wide' )) {
	$extraClass = 'w2';
	$thumbnail = wp_get_attachment_image_src(get_post_thumbnail_id(), 'wideThumb');
} else if ( has_post_format( 'high' )) {
	$extraClass = 'h2';
	$thumbnail = wp_get_attachment_image_src(get_post_thumbnail_id(), 'highThumb');
} else {
	$extraClass = 'standard';
	$thumbnail = wp_get_attachment_image_src(get_post_thumbnail_id(), 'standardThumb');
}

$categories = " ";
 foreach((get_the_category()) as $category) {
 $categories .= $category->cat_name . ' ';
 }

?>

	<article id="post-<?php the_ID(); ?>" <?php //post_class(); ?> class="standard-block standard <?php echo $categories; ?>" data-original="<?php echo $thumbnail[0]; ?>" <?php /*style="background-image:url('<?php echo $thumbnail[0]; ?>');"*/ ?>>
		<a href="<?php the_permalink(); ?>">
			
			<div class="hover-state">
				
				<div class="entry-header">
					<?php the_title( '<h1>', '</h1>' ); ?>
					
				</div><!-- .entry-header -->
				<div class="entry-footer">
					<?php $tags_list = get_the_tag_list( '', __( ', ', 'jackessom_theme' ) );
					if ( $tags_list ) {
						printf( '<span class="tags-links">' . __( '%1$s', 'jackessom_theme' ) . '</span>', $tags_list );
					} ?>
				</div><!-- .entry-footer -->

			</div>
		</a>
	</article><!-- #post-## -->