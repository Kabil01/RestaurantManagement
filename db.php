<?php
$dsn = 'pgsql:host=localhost;dbname=restaurant';
$username = 'postgres';
$password = 'root';
$options = [];
try {
$connection = new PDO($dsn, $username, $password, $options);
} catch(PDOException $e) {
	echo $e;
}
