<?php
if($_POST['usermail'] !=""){
	require("connection.php");
	
	$theEmail = $_POST['usermail'];
	$theUser = $_POST['username'];
	
	$checkUser = mysql_query("SELECT * FROM brainwaveUsers WHERE username = '$theUser'");
	
	if(mysql_num_rows($checkUsers) > 0){
		$result = "taken";
	} else {
		
		function createRandomPassword() { 

			$chars = "abcdefghijkmnopqrstuvwxyz023456789"; 
			srand((double)microtime()*1000000); 
			$i = 0; 
			$pass = '' ; 
		
			while ($i <= 7) { 
				$num = rand() % 33; 
				$tmp = substr($chars, $num, 1); 
				$pass = $pass . $tmp; 
				$i++; 
				} 
		
			return $pass; 

} 
		
		$thePword = createRandomPassword();
		
		
		$message = "Thankyou for registering $theUser. ";
		$message .= "Your password is: $thePword";
		
		mail($theEmail, "Subject: Thanks for registering to Brainwave!", $message, "From: Brainwave");
		
		$sql = "INSERT INTO brainwaveUsers (username, password, email) VALUES ('$theUser', '$thePword', '$theEmail')";
		
		if(!mysql_query($sql, $connect)){
			die("Error: " . mysql_error());
		}
		$result = "sent";
	}
} else{
	$result = "no email";
}
?>

<!DOCTYPE HTML>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title>Untitled Document</title>
</head>

<body>

		<?php if($result == "sent") { ?>
        	<h2> Thanks for registering <?php echo $_POST['username']; ?>
            <p>Your password will be sent to <?php echo $_POST['usermail']; ?> </p>
            <?php } else if ($result == "taken") {?>
            <h2> That username has already been taken. Please try another one. </h2>
            <?php } else if ($result == "no email") {?>
            <h2> Please enter an email address.</h2>
            <?php } ?>

</body>
</html>