<?php
session_start();

if (isset($_POST['submit_comment'])) {

    if (empty($_POST['comment'])) {
        die("You have forgotten to fill in one of the required fields!");
    }

    $entry = htmlspecialchars(strip_tags($_POST['entry']));
    $timestamp = htmlspecialchars(strip_tags($_POST['timestamp']));
    $comment = htmlspecialchars(strip_tags($_POST['comment']));
    $comment = nl2br($comment);
	$currentuser = $_SESSION['username'];

    if (!get_magic_quotes_gpc()) {
        $comment = addslashes($comment);
    }

    require("connection.php");

    $result = mysql_query("INSERT INTO brainwaveComments (entry, username, comment, timestamp) VALUES ('$entry','$currentuser','$comment','$timestamp')");

    header("Location: singleEntry.php?id=" . $entry);
}
else {
    die("Error: you cannot access this page directly.");
}
?>