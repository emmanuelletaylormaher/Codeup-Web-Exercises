<?php


session_start();
$sessionID = session_id();


function pageController(){
	$data = [];
	$logout = isset($_POST["logout"]) ? $_POST["logout"] : "";
	$data["logout"] = $logout;
	$username = isset($_SESSION["logged_in_user"]) ? $_SESSION["logged_in_user"]: "";
	$data["username"] = $username;
	
	if ($logout === "logout") {
		header("Location: logout.php");
		die();
	}
	
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
	<form method="POST">
		<input type="hidden" name="logout" id="logout">
		<input type="submit" value="CLICK 2 FIND SINGLES NEAR U">
	</form>
</body>
</html>