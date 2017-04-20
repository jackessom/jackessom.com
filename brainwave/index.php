<?php

$error = $_GET['e'];

?>

		<?php 
        include("header.php");
        ?>		
        
        <div id="description">
        
        		<img src="images/description.png" alt="Got a Mental Block? Get inspiration, all you need to do is ask!" />
                
                <center>
                Ask people on the worldwide web for ideas for projects you have or wish to create. The ideas you are given could be that little bit of inspiration that you needed!</center>

        
        </div>
        			

					<?php
					require("connection.php");
					
					
					$currentuser = $_SESSION['username'];
					
					$sql = "SELECT * FROM brainwaveEntries ORDER BY timestamp DESC LIMIT 1";
					
					$result = mysql_query($sql) or print ("Can't retrieve an entrie from database"); 
					
					while($row = mysql_fetch_array($result)){
						
						$date = date("l F d Y", $row['timestamp']);
						
						$entry = stripslashes($row['entry']);
						
						$username = $row['username'];
						$id = $row['id'];
						
					?>
                    
                    <div id="latest">
                    <h6>Latest Question </h6>
                    <p> <a href="singleEntry.php?id=<?php echo $id; ?>"><?php echo $entry; ?>
                    <center><strong>Posted on <?php echo $date; ?> by <?php echo $username; ?>
                    <?php
					$result2 = mysql_query ("SELECT id FROM brainwaveComments WHERE entry='$id'");
					$num_rows = mysql_num_rows($result2);echo "<br />" . $num_rows . " comments";?>
                    </strong></center>
                    </a>
                    </p>
                    </div>
                    <?php } ?>
                    
                    
<?php 
include("footer.php");
?>