<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after
 *
 * @package jackessom_theme
 */

//Getting flickr feed

$xml = simplexml_load_file('http://api.flickr.com/services/feeds/photos_public.gne?id=60468403@N04&lang=en-us&format=rss_200');
$namespaces = $xml->getNamespaces(true); // get namespaces

// iterate items and store in an array of objects
$flickrFeed = array();
foreach ($xml->channel->item as $item) {

  $tmp = new stdClass();
  $tmp->title = trim((string) $item->title);
  $tmp->link  = trim((string) $item->link);
  // etc...
  // now for the url in media:content
  //
  $tmp->media_url = trim((string)
                    $item->children($namespaces['media'])->content->attributes()->url);

  // add parsed data to the array
  $flickrFeed[] = $tmp;
}

?>

	</div><!-- #content -->
	</div><!--#content-wrap(diagonal)-->
	<div class="footer-module-wrap">
		<?php if ( !is_single() && $wp_query->max_num_pages > 1 ) : ?>
			<div class="load-more-square"
				onclick="load_posts('<?php echo admin_url( "admin-ajax.php" ); ?>',
						<?php echo get_option("posts_per_page"); ?>,
						<?php echo $wp_query->max_num_pages; ?>,
						'<?php echo $GLOBALS["currentCategory"]; ?>',
						'<?php echo $GLOBALS["currentTag"]; ?>'
						);">
				<div class="inner">Load more</div>
			</div>
		<?php endif ?>
		<div class="columns small-12 medium-6 large-6 footer-module bio" data-original="<?php echo get_template_directory_uri(); ?>/assets/images/bioBg.jpg">
			<div class="inner-wrap">
				<div class="inner">
					<h1>Just a little bio</h1>
					<?php
						$id = get_user_by('login', 'jackessom')->ID;
						$bio = get_the_author_meta('description', $id);
						echo $bio;
					?>
				</div>
			</div>
		</div>
		<div class="columns small-12 medium-6 large-6 footer-module">
			<div class="inner-wrap flickr-wrap">
				<?php foreach ($flickrFeed as $item) { ?>
					<a href="<?php echo $item->link; ?>" target="_blank">
						<div class="flickrImg" <?php/*style="background-image: url('<?php echo $item->media_url; ?>');"*/?>>
							<img data-lazy="<?php echo $item->media_url; ?>"/>
						</div>
					</a>
				<?php } ?>
			</div>
		</div>
	</div>

	<div class="row">
		<div class="columns small-12 instagram-title">
			<h1>I was recently at <i class="icon-location"></i><?php echo getLocation(); ?></h1>
		</div>
	</div>

	<div class="instagram">
		<?php foreach (getFeed() as $item) {?>

			<a href="<?php echo $item['link']; ?>" target="_blank" class="img-wrap" data-original="<?php echo $item['image'];?>" <?php /* style="background-image: url(<?php echo $item['image'];?>);" */?>></a>

		<?php } ?>
	</div>

	<footer class="footer">
		<div class="row">
			<div class="columns small-12">
				<a class="social-link" href="https://twitter.com/jackessom" target="_blank">Twitter</a>
				<a class="social-link" href="http://uk.linkedin.com/in/jackessom/en" target="_blank">LinkedIn</a>
				<a class="social-link" href="http://instagram.com/jackessom" target="_blank">Instagram</a>
				<a class="social-link" href="https://www.flickr.com/photos/jackessom/" target="_blank">flickr</a>
				<a class="social-link" href="https://github.com/jackessom" target="_blank">Github</a>
				<a class="social-link" href="/feed/" target="_blank">RSS</a>
				<a class="social-link" href="mailto:jackessom@hotmail.co.uk">Email</a>
			</div>
		</div>
	</footer>
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
