<?php

require_once "Model.php";
require_once "User.php";

$test = new Model();

$test->username = "pepperoni";

echo $test->username.PHP_EOL;

echo Model::getTableName().PHP_EOL;
echo User::getTableName().PHP_EOL;
