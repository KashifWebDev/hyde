<?php
session_start();


$host = "localhost"; // MySQL host
$username = "root"; // MySQL username
$password = ""; // MySQL password
$database = "upwork_hyde"; // MySQL database name




// Connect to MySQL database
$con = $GLOBALS["con"] = new mysqli($host, $username, $password, $database);

// Check connection
if ($con->connect_error) {
    die("Connection failed: " . $con->connect_error);
}
