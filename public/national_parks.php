<?php

require_once __DIR__ . "/../db_connect.php";

$offset = 0;
$query = "SELECT * FROM national_parks LIMIT 4 OFFSET " . $offset;
$stmt = $dbc->query($query);
var_dump($stmt);

$parks = $stmt->fetchAll(PDO::FETCH_ASSOC);
print_r($parks);

function pageController(){

}

?>

<!DOCTYPE html>
<html>
<head>
	<title>National Parks</title>
</head>
<body>
	<h1>These are some National Parks!</h1>

	<table>
		<tr>
			<th>Name</th>
			<th>Location</th>
			<th>Date Established</th>
			<th>Area in Acres</th>
		</tr>

		<?php foreach ($parks as $park): ?>
			<tr>
				<td> <?= $park["name"]; ?></td>
				<td> <?= $park["location"]; ?></td>
				<td> <?= $park["date_established"]; ?></td>
				<td> <?= $park["area_in_acres"]; ?></td>
			</tr>
		<?php endforeach ?>
	</table>


	<!-- go previous -->
	<form method="GET" action="national_parks.php">
		<input type="hidden" name="navigate" value="previous">
		<button>previous</button>
	</form>
	<!-- go next -->
	<form method="GET" action="national_parks.php">
		<input type="hidden" name="navigate" value="next">
		<button>next</button>
	</form>

</body>
</html>