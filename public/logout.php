<?php
require "functions.php";
session_start();

function clearSession(){
	session_unset();
	session_destroy();
	session_regenerate_id();
	session_start();
}

function endMe(){
	clearSession();
	header("Location: login.php");
	die();
}

endMe();

?>

<!DOCTYPE html>
<html>
<head>
	<title>LOGOUT</title>
</head>
<body>
	<p> <?= $sessionID ?> </p>
	<h1>YOU HAVE BEEN LEGGED OUT,,,,,,,,GOODBYE COMRADE</h1>

	<a href="login.php">return to login</a>
</body>
</html>