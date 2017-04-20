<?php

$error = $_GET['e'];

?>


<!DOCTYPE HTML>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title>Untitled Document</title>
</head>

<body>


<!-- register or login -->

<p><h2> Log In </h2>

		<form action="login_action.php" method="post">
        Username: <input type="text" name="username">
        Password: <input type="password" name="password">
        <input type="submit" name="submit" value="Log In">
        </form>
        
        <?php if($error == "notFound") { ?>
        <h2>There has been an error, Please try again.</h2>
        <?php } ?>

</p>

<p> or </p>


<p> <a href="register.php"> <h2> Register Here </h2> </a> </p>


</body>
</html>