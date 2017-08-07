<?php
require_once "functions.php";
require_once "../Input.php";

session_start();
var_dump($_SESSION);
$sessionID = session_id();

function pageController(){
	$username = inputGet("username", $default = "");
	$password = inputGet("password", $default = "");
	$message = "";

	if (isset($_SESSION["logged_in_user"])) {
		header("Location: authorized.php");
		die();
	}

	if (!empty($_POST)) {
		if ($username === "guest" && $password === "password") {
			$_SESSION["logged_in_user"] = $username;
			header("Location: authorized.php");
			die();
		} else {
			$message = "invalid logins, american!!!";
		}
	
	}

	$data = [

	"username" => $username,
	"password" => $password,
	"message" => $message

	];

	return $data;
}

extract(pageController());

?>

<!DOCTYPE html>
<html>
<head>
	<title>WELCOME TO FACEBOOKS</title>
</head>
<body>
	<p> session id: <?= $sessionID; ?></p>

	<h1>HELLO, POWERFUL AMERICAN MAN</h1>
	<h2>HERE TO LOG INTO YOUR FACEBOOKS?</h2>
	<h3>DO GIVE PASSWORD AND NAME OF USERS HERE</h3>

	<h4 style="color:red; "><?= $message ?></h4>
	
	<form method="POST">
		<label>Logins</label>
		<input type="text" name="username" id="username">
		<label>Passwords</label>
		<input type="password" name="password" id="password">
		<input type="submit">
	</form>
</body>
</html>