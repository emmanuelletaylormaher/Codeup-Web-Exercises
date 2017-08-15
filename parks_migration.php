 <?php

require_once "Park.php";

Park::dbConnect();

Park::$dbc->exec("DROP TABLE IF EXISTS national_parks");

$statement = "CREATE TABLE IF NOT EXISTS national_parks (
	id INT NOT NULL AUTO_INCREMENT,
	name VARCHAR(128) NOT NULL,
	location VARCHAR(128) NOT NULL,
	date_established DATE NOT NULL,
	area_in_acres FLOAT NOT NULL,
	description TEXT NOT NULL,
	PRIMARY KEY (id)
	);";

Park::$dbc->exec($statement);
echo "table created".PHP_EOL;