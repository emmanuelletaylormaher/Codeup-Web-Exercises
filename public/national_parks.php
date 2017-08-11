<?php

require_once __DIR__ . "/../db_connect.php";
require_once "../Input.php";



function pageController($dbc){
	$page=Input::getNumeric("page", 1);
	$offset = (($page - 1)*4);
	$query = "SELECT * FROM national_parks LIMIT 4 OFFSET " . $offset;
	$stmt = $dbc->query($query);

	$parks = $stmt->fetchAll(PDO::FETCH_ASSOC);
	$navigate=Input::get("navigate");


	$data = array(
			"navigate" => $navigate,
			"parks" => $parks,
			"page" => $page
	);

	return $data;
}

// offset = (n-1)*4

extract(pageController($dbc));

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
		<input type="hidden" name="page" value=<?= $page - 1 ?>>
		<button <?php if ($page == 1) {?> style="display:none;" <?php }else {?> style="display:initial;" <?php } ?> >previous</button>
	</form>
	<!-- go next -->
	<form method="GET" action="national_parks.php">
		<input type="hidden" name="page" value=<?= $page + 1 ?>>
		<button <?php if ($page == 15) {?> style="display:none;" <?php }else {?> style="display:initial;" <?php } ?>>next</button>
	</form>

</body>
</html>