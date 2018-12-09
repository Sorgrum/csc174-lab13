<?php

ini_set('error_reporting', E_ALL) ; ini_set('display_errors', 1);

/* Database credentials. Assuming you are running MySQL
server with default setting (user 'root' with no password) */
define('DB_SERVER', '66.147.242.186');
define('DB_USERNAME', 'urcscon3_l13edm');
define('DB_PASSWORD', 'urcscon3_l13edm');
define('DB_NAME', 'urcscon3_l13edm');

/* Attempt to connect to MySQL database */
$mysqli = new mysqli(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);
 
// Check connection
if($mysqli === false){
    die("ERROR: Could not connect. " . $mysqli->connect_error);
}
?>