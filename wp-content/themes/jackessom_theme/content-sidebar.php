<?php
/**
 * @package jackessom_theme
 */
?>
<div class="entry-meta">
		<div class="meta">
			<p>
				<?php the_date('M d Y', 'Posted on <span>', '</span>', true); ?> 
			<br>
				About&nbsp;
				<?php $tags_list = get_the_tag_list( '', __( ', ', 'jackessom_theme' ) );
				if ( $tags_list ) {
					printf( '<span class="tags-links">' . __( '%1$s', 'jackessom_theme' ) . '</span>', $tags_list );
				} ?>
			</p>
		</div>
		<!--<h2>share</h2>
		<p class="share"><i class="icon-twitter"></i><i class="icon-facebook"></i><i class="icon-google"></i></p>-->
</div>

<?php get_sidebar(); ?>
