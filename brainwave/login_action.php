<?php
require("connection.php");

$theUser = $_POST['username'];
$thePword = $_POST['password'];

$check = "SELECT username, password FROM brainwaveUsers WHERE username = '$theUser' AND password = '$thePword'";

$login = mysql_query($check, $connect) or die(mysql_error());

if(mysql_num_rows($login) == 1){
	$_SESSION['username'] = $theUser;
} else {
	
	
	if (!isset($_POST['logout'])){
		$e = "notFound";
	}
}

mysql_close($connect);
?>

		<?php
		if(isset($_SESSION['username'])) {
			?>
            <p>Hi <?php echo $_SESSION['username']; ?> !
             <form action="logout.php" method="post">
            <input type="submit" name="logout" value="Log out" />
            </form>
            </p>
            <?php } else {
			
			?>
            
            <!-- register or login -->

		<p>
		<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
        <LABEL for="username">Username:</LABEL>  <input type="text" name="username"><br />
        <LABEL for="password">Password:</LABEL>  <input type="password" name="password" style="margin-left:5px;"><br />
        <input type="submit" name="submit" value="Log In"> or <a href="register.php"> Register Here </a> 
        </form>
        </p>
        <?php if($error == "notFound") { ?>
        <h2>There has been an error, Please try again.</h2>
        <?php } ?>

            
            <?php } ?>
           
            
