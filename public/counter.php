<?php

function pageController(){
	$data = [];
	$count = (isset($_GET["count"])) ? $_GET["count"] : 0;
	$direction = (isset($_GET["direction"])) ? $_GET["direction"] : "none";
	if ($direction == "up"){
		$count++;
	} else if ($direction == "down"){
		$count--;
	}
	$data["count"] = $count;
	return $data;
}

extract(pageController());

?>
<!DOCTYPE html>
<html>
<head>
	<title>Counter!</title>
</head>
<body>
	<h1><?= $count ?> and counting!</h1>

	<form method="GET" action=""> 
		<input type="hidden" name="count" value=<?= $count ?> >
		<input type="hidden" name="direction" value="up">
		<button type="submit">Count UP</button>
	</form>
	<br>
	<form method="GET" action="" >
		<input type="hidden" name="count" value=<?= $count ?> >
		<input type="hidden" name="direction" value="down">
		<button type="submit">Count Down</button>
	</form>

</body>
</html>