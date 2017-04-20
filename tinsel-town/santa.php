<!DOCTYPE HTML5>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<title>Tin$el Town</title>
<link href="ttstyle.css" rel="stylesheet" type="text/css">

<link rel="stylesheet" href="slider/orbit-1.2.3.css">

<LINK REL="SHORTCUT ICON" HREF="images/favicon.ico">

<script type="text/javascript"  src="jquery-1.5.1.min.js"></script>

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
                                      				<h1>Are YOU our next santa?</h1>
                                                    <h3>Use the contact form to apply to be our next Santa! Email us explaining why YOU should be our next santa!</h3>
                                                   
                                                                     
                    
     <p>               
                    
                     <?php 
if ($_POST["email"]<>'') { 
	$ToEmail = 'TinsellTown@hotmail.co.uk'; 
	$EmailSubject = 'Santa Application'; 
	$mailheader = "From: ".$_POST["email"]."\r\n"; 
	$mailheader .= "Reply-To: ".$_POST["email"]."\r\n"; 
	$mailheader .= "Content-type: text/html; charset=iso-8859-1\r\n"; 
	$MESSAGE_BODY = "Name: ".$_POST["name"]."<br>"; 
	$MESSAGE_BODY .= "Email: ".$_POST["email"]."<br>"; 
	$MESSAGE_BODY .= "Message: ".nl2br($_POST["message"])."<br>"; 
	mail($ToEmail, $EmailSubject, $MESSAGE_BODY, $mailheader) or die ("Failure"); 
?> 
<br><br><br>
<h3>You have successfully sent your application to become our next Santa! Good Luck!</h3>
<?php 
} else { 
?> 
<form action="santa.php" method="post">
<h3 title="Your name">Name</h3>
					<input class="textField" type="text" name="name" size="20" autofocus><br>

					<h3 title="Contact email">Email</h3>
					<input class="textField" type="email" name="email" size="20"><br>

					<h3 title="Message">Message</h3>
					<textarea rows="8" name="message" cols="50"></textarea><br>
					<input type="submit" value="Submit" name="submit" class="submit"><br>

</form> 
<?php 
}; 
?>
                    
 </p>                   
                                     
                                     <h3>If we think your good enough, we will invite you for an interview!</h3>
                                         
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
