<?php 
include("header.php");
?>	




		<?php 
		if ($_SESSION['username']) { ?>
        
        			<?php
					require("connection.php");
					
					$currentuser = $_SESSION['username'];
					
					$sql = "SELECT * FROM brainwaveEntries WHERE username='$currentuser' ORDER BY timestamp DESC";
					
					$result = mysql_query($sql) or print ("Can't retrieve an entrie from database"); 
					?>
					<h2><?php echo $currentuser; ?>'s Profile</h2>

                    <div id="aside">
                                 
                                    
                            <p><a href="ask.php">Ask another question ></a></p>
                            <p>Click on each individual question to view replies</p>
                            
                            
                    </div>
					
                    <?php 
					while($row = mysql_fetch_array($result)){
						
						$date = date("l F d Y", $row['timestamp']);
						
						$entry = stripslashes($row['entry']);
						$id = $row['id'];
						
						
					?>
                    
                    <div class="article">
                    <a href="singleEntry.php?id=<?php echo $id; ?>"> <?php echo $entry; ?>  <br /><br />
                    <strong>Posted on <?php echo $date; ?>
                    <?php
					$result2 = mysql_query ("SELECT id FROM brainwaveComments WHERE entry='$id'");
					$num_rows = mysql_num_rows($result2);echo "<br />" . $num_rows . " comments";
					
					if (isset($_POST['delete'])) {
							 $id = (int)$_POST['id'];
							 $result = mysql_query("DELETE FROM brainwaveEntries WHERE id='$id'") or print ("Can't delete entry.<br />" . mysql_error());
							 echo "<meta http-equiv='refresh' content='0;URL=profile.php'>";
						}
						
					?>
                    </a>
                    <br />
                    <center>
                    <form style="margin-bottom:0; margin-top:-50px;" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
                    <input type="hidden" name="id" id="id" value="<?php echo $id; ?>" />
                    <input type="submit" name="delete" id="delete" value="Delete this question" />
					</form>
                    </center>
                    </strong>
                    </div>
                    
                    
                    
                    
                    <?php } ?>
                    
                    
                    
        
        <?php } else {
				die("<center>You must be logged in!</center>");
				include("footer.php");
				
				}
		?>
		
<?php 
include("footer.php");
?>	