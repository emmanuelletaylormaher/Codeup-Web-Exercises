<?php

require_once __DIR__ . "/../db_connect.php";

$query = "SELECT * FROM national_parks LIMIT 4";
$stmt = $dbc->query($query);
var_dump($stmt);

do {
	$result = $stmt->fetch();
	print_r($result);
} while ($result);

?>

<!DOCTYPE html>
<html>
<head>
	<title>National Parks</title>
</head>
<body>
	<h1>These are some National Parks!</h1>


	<!-- go previous -->
	<!-- go next -->

</body>
</html>