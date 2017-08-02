<?php
var_dump($_POST);

function pageController(){
	$data = [];


	$username = isset($_POST["username"]) ? $_POST["username"] : "";
	$password = isset($_POST["password"]) ? $_POST["password"] : "";
	$message = "";

	if (!empty($_POST)) {
		if ($username === "guest" && $password === "password") {
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