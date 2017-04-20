<?php include("header.php"); ?>

		<center><h2> Register below </h2>
        
        <form action="registerProcess.php" method="post">
        Name: <input type="text" name="username" />
        Email: <input type="text" name="usermail" />
        <input type="submit" name="submit" value="Register" />
        </form>
        
       <p> An email will be sent to your email address provided with your password in it.</p>
        </center>

<?php include("footer.php"); ?>
