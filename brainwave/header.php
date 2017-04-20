<?php
session_start();
?>
<!DOCTYPE HTML>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title>Brainwave</title>
<link href="styles.css" rel="stylesheet" type="text/css">
<LINK REL="SHORTCUT ICON" type="image/x-icon" HREF="images/favicon.ico">
</head>

<body>



<div id="header">
		<div id="headercontent">
        
			
				
				<a href="index.php"><img src="images/brainwavelogo.png" alt="Brainwave Logo" title="Brainwave" width="705" height="148" style="float:left; margin-top:20px;"></a>
				
                
                <div id="login">
                
                <?
				if ($_SERVER['PHP_SELF'] == '/uni2012/brainwave/logout.php') {
					echo "Go to homepage to login";
				} else {
					include("login_action.php");
				}
				?>
           
                </div>
                
                <div id="nav">
                
                		<ul>
                               
                          <li> <a href="index.php"  style="-moz-border-radius-topleft: 10px; border-top-left-radius: 10px;"> Home </a> </li>
                          <li> <a href="profile.php"> Profile </a> </li>
                          <li> <a href="allEntries.php"  style="-moz-border-radius-topright: 10px; border-top-right-radius: 10px;"> All questions </a></li>
                           
                        </ul>
                
                </div>

		</div>
</div>

<div id="wrapper">




<div id="section">