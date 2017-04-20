<?php 
include("header.php");
?>	

		   
        			<?php


require("connection.php");

if (!isset($_GET['id']) || !is_numeric($_GET['id'])) {
    die("Invalid ID specified.");
}

$id = (int)$_GET['id'];
$sql = "SELECT * FROM brainwaveEntries WHERE id='$id' LIMIT 1";

$result = mysql_query($sql) or print ("Can't select entry from table.<br />" . $sql . "<br />" . mysql_error());

while($row = mysql_fetch_array($result)) {

    $date = date("l F d Y", $row['timestamp']);

    $entry = stripslashes($row['entry']);
	
	$username = $row['username']

    ?>

    <center><div class="indvidualarticle">
    <p><?php echo $entry; ?><br /><br />
    <strong>Posted on <?php echo $date; ?> by <?php echo $username; ?><br />
    
    <script>function fbs_click() {u=location.href;t=document.title;window.open('http://www.facebook.com/sharer.php?u='+encodeURIComponent(u)+'&t='+encodeURIComponent(t),'sharer','toolbar=0,status=0,width=626,height=436');return false;}</script><a rel="nofollow" href="http://www.facebook.com/share.php?u=<;url>" onclick="return fbs_click()" target="_blank" style="color:#000; text-decoration:underline;">Share on Facebook</a>
    </strong>
    </p>
	</div></center>
    
    			
    
    
    <?php
}
$commenttimestamp = strtotime("now");

$sql = "SELECT * FROM brainwaveComments WHERE entry='$id' ORDER BY timestamp";
$result = mysql_query ($sql) or print ("Can't select comments from table.<br />" . $sql . "<br />" . mysql_error());
while($row = mysql_fetch_array($result)) {
    $timestamp = date("l F d Y", $row['timestamp']);
    printf("<div class='comment'<hr />");
	print("<p>" . stripslashes($row['username']) . " says:</p>");
    print("<p>" . stripslashes($row['comment']) . "</p><hr /></div>");
}
?>

<?php 
		if ($_SESSION['username']) { ?>

<center>
<form method="post" action="commentProcess.php">

<p><input type="hidden" name="entry" id="entry" value="<?php echo $id; ?>" />

<input type="hidden" name="timestamp" id="timestamp" value="<?php echo $commenttimestamp; ?>">

<strong><label for="comment">Reply:</label></strong><br />
<textarea cols="80" rows="5" name="comment" id="comment"></textarea></p>

<p><input type="submit" name="submit_comment" id="submit_comment" value="Reply" /></p>

</form>
</center>  

<?php } else {
				die("<center>You must be logged in to comment.</center>");
				}
		?>               
                    
		
<?php 
include("footer.php");
?>	