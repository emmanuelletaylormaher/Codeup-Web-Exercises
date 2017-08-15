<?php

require_once "db_connect.php";
require_once "park_logins.php";
require_once "Park.php";

$dbc->exec("TRUNCATE national_parks");

$contents = file_get_contents("national_parks.csv");

$parks = explode("\n", trim($contents));

array_shift($parks);

$parks = array_map("trim", $parks);

$statement = 'INSERT INTO national_parks (name, location, date_established, area_in_acres, description) VALUES (:name, :location, :date_established, :area_in_acres, :description)';

$preparedStmt = $dbc->prepare($statement);

foreach ($parks as $park) {
	$park = explode(",", $park);

	$newPark = new Park();
	$newPark->name = $park[0];
	$newPark->location = $park[1];
	$newPark->dateEstablished = $park[2];
	$newPark->areaInAcres = $park[3];
	$newPark->description = $park[4];
	$newPark->insert();
}

echo "values added".PHP_EOL;