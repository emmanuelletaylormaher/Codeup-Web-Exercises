<?php
require_once "functions.php";
require_once "../Input.php";
require_once "../Auth.php";

session_start();

Auth::logout();
header("Location: login.php");
die();

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