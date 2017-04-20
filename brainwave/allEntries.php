<?php 
include("header.php");
?>	


<h2>All Questions</h2>

<div id="aside">
             
         <?php
		 if ($_SESSION['username']) {?>       		
        <p><a href="ask.php">Ask your own question ></a></p>
        <?php } else {?>
        <p>Log in to ask your own question</p>
        <?php } ?>
        <p>Click on each individual question to add your own reply</p>
        
        
</div>
		   
        			<?php
					require("connection.php");
					
					$postnumber = 5;
					
					if(!isset($_GET['page'])){
						$page = 1;
					} else {
						$page = (int)$_GET['page'];
					}
					$from = (($page * $postnumber) - $postnumber);
					
					
					$currentuser = $_SESSION['username'];
					
					$sql = "SELECT * FROM brainwaveEntries ORDER BY timestamp DESC LIMIT $from, $postnumber";
					
					$result = mysql_query($sql) or print ("Can't retrieve an entrie from database"); 
					
					while($row = mysql_fetch_array($result)){
						
						$date = date("l F d Y", $row['timestamp']);
						
						$entry = stripslashes($row['entry']);
						$id = $row['id'];
						
						$username = $row['username'];
						
					?>
                    
                                     
                    
                    <div class="article"> 
                    <a href="singleEntry.php?id=<?php echo $id; ?>"><?php echo $entry; ?> <br /><br />
                    <strong>Posted on <?php echo $date; ?> by <?php echo $username; ?>
                    
                    <?php
					$result2 = mysql_query ("SELECT id FROM brainwaveComments WHERE entry='$id'");
					$num_rows = mysql_num_rows($result2);echo "<br />" . $num_rows . " comments";
					?></strong>
                    </a>
                    </div>
                    
                    <?php } ?>
                    
                    
                    <?php
					$total_results = mysql_fetch_array(mysql_query("SELECT COUNT(*) as num FROM brainwaveEntries"));
					$total_pages = ceil($total_results['num'] / $postnumber);
					if ($page > 1){
						$prev = ($page - 1);
						echo "<a href=\"allEntries.php?page=$prev\">&lt;&lt;  Newer</a> ";
					}
					if ($page < $total_pages) {
					   $next = ($page + 1);
					   echo "<a href=\"allEntries.php?page=$next\">Older &gt;&gt;</a>";
					}
					?>
		
<?php 
include("footer.php");
?>	