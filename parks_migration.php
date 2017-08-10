 <?php

// Set up the connection parameters for parks_db and parks_user.
require_once "park_logins.php";
// Require db_connect.php
require_once "db_connect.php";

// Use exec() to delete a table named national_parks using DROP TABLE IF EXISTS
$dbc->exec("DROP TABLE IF EXISTS national_parks");

$statement = "CREATE TABLE IF NOT EXISTS national_parks (
	id INT NOT NULL AUTO_INCREMENT,
	name VARCHAR(128),
	location VARCHAR(128),
	date_established DATE,
	area_in_acres FLOAT,
	PRIMARY KEY (id)
	);";

$dbc->exec($statement);