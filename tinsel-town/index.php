<?php
if(strstr($_SERVER['HTTP_USER_AGENT'],'iPhone') || strstr($_SERVER['HTTP_USER_AGENT'],'iPod'))
{
  header('Location: http://impserver.bournemouth.ac.uk/~group7/mobile/');
  exit();
}
?>
<!DOCTYPE HTML5>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<title>Tin$el Town</title>
<link href="ttstyle.css" rel="stylesheet" type="text/css">

<link rel="stylesheet" href="slider/orbit-1.2.3.css">

<LINK REL="SHORTCUT ICON" HREF="images/favicon.ico">

<script type="text/javascript"  src="jquery-1.5.1.min.js"></script>
<script type="text/javascript" src="slider/jquery.orbit-1.2.3.min.js"></script>	

		<script type="text/javascript">
			$(window).load(function() {
				$('#featured').orbit({
     animation: 'horizontal-slide',                  // fade, horizontal-slide, vertical-slide, horizontal-push
     animationSpeed: 800,                // how fast animtions are
     timer: true, 			 // true or false to have the timer
     advanceSpeed: 12000, 		 // if timer is enabled, time between transitions 
     pauseOnHover: true, 		 // if you hover pauses the slider
     startClockOnMouseOut: true, 	 // if clock should start on MouseOut
     startClockOnMouseOutAfter: 1000, 	 // how long after MouseOut should the timer start again
     directionalNav: true, 		 // manual advancing directional navs
     captions: false, 			 // do you want captions?
     captionAnimation: 'fade', 		 // fade, slideOpen, none
     captionAnimationSpeed: 800, 	 // if so how quickly should they animate in
     bullets: false,			 // true or false to activate the bullet navigation
     bulletThumbs: false,		 // thumbnails for the bullets
     bulletThumbLocation: '',		 // location from this file where thumbs will be
     afterSlideChange: function(){} 	 // empty function 
});
			});
		</script>
</head>

<body>


<div id="wrapper">

<nav>
			   <ul>
               
              	<li> <a href="index.php" style="margin-right:30px;"> Home </a> </li>   
                <li> <a href="attractions.php" style="margin-right:60px;"> Attractions </a> </li>
                <li> <a href="map.php" style="margin-right:45px;"> Map </a></li>
                <li> <a href="prices.php" style="margin-right:35px;"> Prices </a> </li>
                <li> <a href="staff.php" style="margin-right:35px;"> Staff </a> </li>
                <li> <a href="game.php"> Game </a> </li>
              
              </ul>

	</nav>


<header>


	<a href="http://impserver.bournemouth.ac.uk/~group7/index.php"><img src="images/ttsignheader.png" alt="Welcome to Tinsel Town" border="0">	</a>



	
</header>





<section id="slider">

			<div id="featured"> 
            
                  <a href="behindscenes.php"><img src="images/poster_sketchshow.jpg" /></a>
                  <a href="merchandise.php"><img src="images/merry merchandise.png" /></a> 
                  <a href="prices.php"><img src="images/ticketad.jpg" /></a>
                  <a href="attractions.php"><img src="images/santagrottoad.jpg" /></a>
                  
            </div>
            
</section>

<section id="watchvid">

        
        <a href="behindscenes.php" ONMOUSEOVER='rollover.src="images/watchvidframeroll.png" ' ONMOUSEOUT='rollover.src="images/watchvidframe.png" '><img src="images/watchvidframe.png" border="0" name="rollover"></a>
		
</section>

<section id="xmastree">

</section>

<section id="welcometxt">

		<h2> Welcome to the Tinsel Town!</h2>
        <h3>Where Santa and His Elf's are working Hard on making all the little boys and girls of the world there christmas gifts. So come on down and pay him a visit!

			<p>We at Tinsel Town are Striving for your safety and have been fatality free since 2003.</p>
		</h3>


</section>





<footer>

<center>
		<!-- AddThis Button BEGIN -->
        <a class="addthis_button" href="http://www.addthis.com/bookmark.php?v=250&amp;pubid=xa-4ddd9872326cdbe3"><img src="http://s7.addthis.com/static/btn/sm-share-en.gif" width="83" height="16" alt="Bookmark and Share" style="border:0"/></a>
        <script type="text/javascript" src="http://s7.addthis.com/js/250/addthis_widget.js#pubid=xa-4ddd9872326cdbe3"></script>
        <!-- AddThis Button END -->
Copyright 2011   </center>  
</footer>






</div>


</body>
</html>