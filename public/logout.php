<?php
session_start();

function clearSession(){
	session_unset();
	session_destroy();
	session_regenerate_id(true);
	session_start();
}

clearSession();
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

</body>
</html>