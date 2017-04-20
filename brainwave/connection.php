<?php

$connect = mysql_connect("jackessom.com.mysql", "jackessom_com", "zDiMHvdy");

if(!$connect){
	die('You failed to connect: ' . mysql_error());
}

mysql_select_db("jackessom_com", $connect);

?>