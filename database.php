<?php
// Hiding credentials doesnt allow you to run the website locally
$host = "pospizza.mysql.database.azure.com";
$username = "danielgarza";
$password = "#drgarza8";
$dbname = "pos";
// $host = getenv("DB_HOST");
// $username = getenv("DB_USER");
// $password = getenv("DB_PASS");
// $dbname = getenv("DB_NAME");
$port = 3306;
$mysqli = mysqli_init();
mysqli_ssl_set($mysqli, NULL, NULL, "./DigiCertGlobalRootCA.crt.pem", NULL, NULL);
if (!$mysqli->real_connect($host, $username, $password, $dbname, $port, NULL, MYSQLI_CLIENT_SSL)) {
    die("Connection error: " . $mysqli->connect_error);
}