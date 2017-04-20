<?php
/**
 * The header for our theme.
 *
 * Displays all of the <head> section and everything up till <div id="content">
 *
 * @package jackessom_theme
 */
?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">

<!--ICONS -->
<!--icons-end-->

<link rel="profile" href="http://gmpg.org/xfn/11">
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">

<script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-60150588-1', 'auto');
  ga('send', 'pageview');

</script>

<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<div id="page" class="hfeed site">

	<header class="hero">
		<div class="background" data-original="<?php echo get_template_directory_uri(); ?>/assets/images/heroBg.jpg"></div>
		<div class="inner">
			<div class="row">
				<div class="columns small-12 medium-10 medium-centered">
					<h1 class="site-title"><a href="/"><?php bloginfo( 'name' ); ?></a></h1>
				</div>
			</div>
			<div class="row">
				<div class="columns small-12 medium-8 medium-centered">
					<p><?php display_latest_tweets('jackessom'); ?></p>
				</div>
			</div>
		</div>
	</header>

	<div class="content-wrap">
	<div id="content" class="site-content">
