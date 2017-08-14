<?php

require_once "db_connect.php";
require_once "park_logins.php";

$dbc->exec("TRUNCATE national_parks");

$contents = file_get_contents("national_parks.csv");

$parks = explode("\n", trim($contents));

array_shift($parks);

$parks = array_map("trim", $parks);

$statement = 'INSERT INTO national_parks (name, location, date_established, area_in_acres, description) VALUES (:name, :location, :date_established, :area_in_acres, :description)';

$preparedStmt = $dbc->prepare($statement);

foreach ($parks as $park) {
	$park = explode(",", $park);

	$preparedStmt->bindValue(":name", $park[0], PDO::PARAM_STR);
	$preparedStmt->bindValue(":location", $park[1], PDO::PARAM_STR);
	$preparedStmt->bindValue(":date_established", $park[2], PDO::PARAM_STR);
	$preparedStmt->bindValue(":area_in_acres", $park[3], PDO::PARAM_STR);
	$preparedStmt->bindValue(":description", $park[4], PDO::PARAM_STR);

	$preparedStmt->execute();
}

echo "values added".PHP_EOL;