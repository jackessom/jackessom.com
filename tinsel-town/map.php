<!DOCTYPE HTML5>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<title>Tin$el Town</title>
<link href="ttstyle.css" rel="stylesheet" type="text/css">


<LINK REL="SHORTCUT ICON" HREF="images/favicon.ico">


<script src="mobilymap/js/jquery.js" type="text/javascript"></script>
<script src="mobilymap/js/mobilymap.js" type="text/javascript"></script>

<script type="text/javascript">
$(function(){
	$('.europe_map').mobilymap({
		position: '850 1000',
		popupClass: 'bubble',
		markerClass: 'point',
		popup: true,
		cookies: false,
		caption: false,
		setCenter: true,
		navigation: true,
		navSpeed: 1000,
		navBtnClass: 'navBtn',
		outsideButtons: '.map_buttons a',
		onMarkerClick: function(){},
		onPopupClose: function(){},
		onMapLoad: function(){}
	});
});
</script>







<!-- FANCYBOX -->

<script type="text/javascript" src="./fancybox/jquery.fancybox-1.3.4.pack.js"></script>
	<link rel="stylesheet" type="text/css" href="./fancybox/jquery.fancybox-1.3.4.css" media="screen" />
	<script type="text/javascript">
	
	//FANCYBOX
	
		$(document).ready(function() {
  					
	   				 $(".extLink").fancybox({
						 'width' : '75%',
						 'height' : '75%',
						 'autoScale' : false,
        				 'transitionIn' : 'elastic',
	      				 'transitionOut' : 'elastic',
	        			 'type' : 'iframe'
						 });
					 
					$("a.gallery").fancybox({
					transitionIn : "elastic",
					transitionOut : "elastic",
					titlePosition : "over"
						});
						
					$(".swf").fancybox({
						transitionIn : "elastic",
						transitionOut : "elastic",
						height : 500,
						width : 500,	
						'type' : 'swf',
						'swf' : {
							'wmode' : 'transparent',
							'allowfullscreen' : 'true'
						}
						});
						
					$(".fancyYoutube").click(function(){
						$.fancybox({
						'transitionIn' : "fade",
						'transitionOut' : "fade",
						'width' : 680,
						'height' : 495,
						'href' : this.href.replace(new RegExp("watch\\?v=", "i"), 'v/'),
						'type' : 'swf',
						'swf' : {
							'wmode' : 'transparent',
							'allowfullscreen' : 'true'
								}
							});
							return false;
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



                                      <section id="topcontent">
                                      				<h1>Map</h1>
                                                    
                                                    <h3>Click or use the arrows to drag the map and explore the park.<br>
														You can also click on the markers to view information about the different attractions.</h3>
                                                    
                                                    <div class="europe_map">
			<img src="mobilymap/map.jpg" alt="Map" width="1431" height="1000" />
			<div class="point" id="p-310-80">
				<span><h2>Grotto</h2> </span>
				<h3><p>All The Kids Are Dead Excited To Visit Santa. (Santa May Not Be Conscious.) </p></h3>
			</div>
			<div class="point" id="p-680-121">
				<span><h2>The Hole</h2></span>
				
			</div> 
			<div class="point" id="p-290-352">
				<span><h2>The Nativity</h2></span>
				
			</div>  
			<div class="point" id="p-504-499">
				<span><h2>The Blizzard</h2></span>
				<h3><p>Strap In Tight. (Death May Occur Due To Snapping Straps.)</p></h3>
			</div>
			<div class="point" id="p-788-590">
				<span><h2>Merry Merchandise</h2></span>
			</div>
            
            <div class="point" id="p-1139-700">
				<span><h2>Security </h2></span>
			</div>
            <div class="point" id="p-1093-490">
				<span><h2>Raindear Ride </h2></span>
				<h3><p>Get To Ride Santa's Actual Raindear. (Due to Santa's Raindear being make believe we can not guarantee the species of animal.)</p></h3>
			</div>
            <div class="point" id="p-735-322">
				<span><h2>Nurse Lamy</h2></span>
				<h3><p>Everyone Who Visits Tinsell Town Has To See Nurse Lammy.</p></h3>
			</div>
            <div class="point" id="p-1275-290">
				<span><h2>Raindear Burgers</h2> </span>
			</div>
            <div class="point" id="p-1023-189">
				<span><h2>Santa's Little Helper Ride </h2></span>
				<h3><p>Help Santa Deliver His Load To All The Little Children.</p></h3>
			</div>
                                      </section>
                                      
                                      
                                      <section id="watchvid">
                                      
                                              
                                              <a href="behindscenes.php" ONMOUSEOVER='rollover.src="images/watchvidframeroll.png" ' ONMOUSEOUT='rollover.src="images/watchvidframe.png" '><img src="images/watchvidframe.png" border="0" name="rollover"></a>
                                              
                                      </section>
                                      
                                      
                                      <section id="bottomcontent">
                                      
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