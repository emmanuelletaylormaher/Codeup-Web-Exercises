<?php

function pageController(){
	$adjectives = [
		"angry",
		"nerdy",
		"sleepy",
		"coy",
		"inattentive",
		"anxious",
		"transient",
		"interstellar",
		"violent",
		"interrogative"
	];

	$nouns = [
		"egg",
		"scenery",
		"accordion",
		"javelin",
		"rabbit",
		"serpent",
		"moon",
		"particle",
		"android",
		"pitch"
	];

	$data = [];
	$data["adjectives"] = $adjectives;
	$data["nouns"] = $nouns;
	return $data;
}

extract(pageController());


function returnRandom($array){
	$random = array_rand($array);
	return $array[$random];
}

function randomServerName($array1, $array2){
	return returnRandom($array1) . " " . returnRandom($array2); 
}

?>

<!DOCTYPE html>
<html>
<head>
	<title>Server Name Generator</title>
</head>
<body>
	<h1>Boy, Howdy!</h1>
	<h3>This is a cool adjective: <?= returnRandom($adjectives); ?></h3>
	<h3>THIS is a cool noun: <?= returnRandom($nouns); ?></h3>
	<br>
	<br>
	<h3>The server name is: <?= randomServerName($adjectives, $nouns); ?></h3> 
</body>
</html>