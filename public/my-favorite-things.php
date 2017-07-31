<?php

function pageController(){
	$favoriteThings = [
		"bicycles",
		"steamed rice",
		"eggs",
		"pointy shoes",
		"touristy tshirts"
		];

	$data = [];	
	$data["favoriteThings"] = $favoriteThings;
	return $data;
}

extract(pageController());

?>

<!DOCTYPE html>
<html>
<head>
	<style type="text/css">
		tr:nth-child(even) {
			background-color: #808080;
			color: white;
		}
	</style>
	<title>My favorite things!</title>
</head>
<body>
	<h1>Boooooooooy, HOWDY!</h1>
	<h2>These are my goshdarn-favorite things!</h2>
	<table>
		<?php foreach ($favoriteThings as $thing): ?>
			<tr>
				<td> <?= $thing; ?></td>
			</tr>
		<?php endforeach ?>
	</table>
</body>
</html>