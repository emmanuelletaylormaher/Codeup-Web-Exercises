<?php
require "functions.php";
var_dump($_POST);

session_start();
$sessionID = session_id();


function pageController(){
	$data = [];
	$username = isset($_SESSION["logged_in_user"]) ? $_SESSION["logged_in_user"]: "";
	$data["username"] = $username;
	
	if(!isset($_SESSION["logged_in_user"])){
		header:("Location: login.php");
		die();
	}

	return $data;

}

extract(pageController());

?>

<!DOCTYPE html>
<html>
<head>
	<title>AUTHORIZED</title>
</head>
<body>
	<p> session id: <?= $sessionID; ?></p>

	<h1>AUTHORIZED! welcoming to you, <?= $username ?>.</h1>
	<h2>GLORY TO THE MOTHERLAND !</h2>
	<img src="img/old_internet.gif">
	<br><br>
	<button><a href="logout.php">CLICK 2 FIND SINGLES NEAR U</a></button>
</body>
</html>