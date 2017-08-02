<?php

function pageController(){
	$data=[];
	$count = (isset($_GET["count"])) ? $_GET["count"] : 0;
	$data["count"] = $count;
	$action = (isset($_GET["action"])) ? $_GET["action"] : "none";
	$data["action"] = $action;
	$turnString = "You're up! Hits: {$count}";

	if ($action == "MISS") {
		$count= 0;
		$turnString = "You lose!";
	}

	$data["turnString"] = $turnString;

	return $data;
}

extract(pageController());


?>

<!DOCTYPE html>
<html>
<head>
	<title>PONG!</title>
</head>
<body>
	<h1>PONG! Player 2! <?= $turnString ?></h1>
	<br>
	<form method="GET" action="ping.php" >
		<input type="hidden" name="action" value="HIT">
		<input type="hidden" name="count" value=<?= $count+1 ?>>
		<button type="submit">HIT</button>
	</form>
		<br>
	<form method="GET" action="ping.php" >
		<input type="hidden" name="action" value="MISS">
		<input type="hidden" name="count" value=<?= $count=0 ?>>
		<button type="submit">MISS</button>
	</form>
		
</body>
</html>