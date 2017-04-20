<?php 
        include("header.php");

if ($_SESSION['username']) {

if ($result != false){
		print "Your question was successfully asked!";
	} else {

if(isset($_POST['submit'])){
	
	$date = htmlspecialchars(strip_tags($_POST['date']));
	$month = htmlspecialchars(strip_tags($_POST['month']));
	$year = htmlspecialchars(strip_tags($_POST['year']));
	$time = htmlspecialchars(strip_tags($_POST['time']));
	$entry = $_POST['entry'];
	$currentuser = $_SESSION['username'];
	
	$timestamp = strtotime($date . " " . $month . " " . $year . " " . $time);
	
	$entry = nl2br($entry);
	
	if (!get_magic_quotes_gpc()){
		$entry = addslashes($entry);
	}
	
	require("connection.php");
	
	$sql = "INSERT INTO brainwaveEntries (timestamp,entry,username) VALUES ('$timestamp','$entry','$currentuser')";
	
	$result = mysql_query($sql) or print("Can't insert into database.<br />" . $sql . "<br />" . mysql_error());
	
	if ($result != false){
		print "<p><center>Your question was successfully asked! <br />
		Ask another one below.</center></p>";
	}
	
	mysql_close();
}
	}
?>




		<?php
		date_default_timezone_set('Europe/London');
		
		$cmonth = date("F");
		$cdate = date("d");
		$cyear = date("Y");
		$ctime = date("H:i");
		?>
        
        <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
        
        <input type="hidden" name="date" id="date" value="<?php echo $cdate; ?>" />
        <input type="hidden" name="month" id="month" value="<?php echo $cmonth; ?>" />
        <input type="hidden" name="year" id="year" value="<?php echo $cyear; ?>" />
        <input type="hidden" name="time" id="time" value="<?php echo $ctime; ?>" />
        
        <center>
        Ask for inspiration:
        
        <p><textarea cols="80" rows="20" name="entry" id="entry"></textarea></p>
        
        <p><input type="submit" name="submit" id="submit" value="Submit"></p>
        
        </form>
        </center>
        
        <?php

}
else {
	die("<center>You must be logged in!</center> ");
}

?>

<?php 
include("footer.php");
?>	