<?php
require_once "../Input.php";
require_once "functions.php";

function pageController(){
	$count=Input::get("count");
	$action= Input::get("action");
	$turnString = "You're up! Hits: {$count}";
	
	$data = array(
		"count" => $count,
		"action" => $action
	);

	if ($action == "MISS") {
		$count = 0;
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
	<title>PING!</title>
</head>
<body>
	<h1>PING! Player 1! <?= $turnString ?></h1>
	<br>
	<form method="GET" action="pong.php" >
		<input type="hidden" name="action" value="HIT">
		<input type="hidden" name="count" value=<?= escape($count)+1 ?>>
		<button type="submit">HIT</button>
	</form>
		<br>
	<form method="GET" action="pong.php" >
		<input type="hidden" name="action" value="MISS">
		<input type="hidden" name="count" value=<?= $count ?>>
		<button type="submit">MISS</button>
	</form>

</body>
</html>