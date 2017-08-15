 <?php

// Set up the connection parameters for parks_db and parks_user.
require_once "park_logins.php";
// Require db_connect.php
require_once "db_connect.php";
require_once "Park.php";

$dbc->exec("DROP TABLE IF EXISTS national_parks");

$statement = "CREATE TABLE IF NOT EXISTS national_parks (
	id INT NOT NULL AUTO_INCREMENT,
	name VARCHAR(128) NOT NULL,
	location VARCHAR(128) NOT NULL,
	date_established DATE NOT NULL,
	area_in_acres FLOAT NOT NULL,
	description TEXT NOT NULL,
	PRIMARY KEY (id)
	);";

$dbc->exec($statement);
echo "table created".PHP_EOL;