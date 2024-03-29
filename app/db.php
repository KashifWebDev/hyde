<?php
session_start();


$host = "localhost";

$username = "root";
$password = "";
$database = "upwork_hyde";


$username = "u953547654_hyde";
$password = "Hyde@1234!";
$database = "u953547654_hyde";




// Connect to MySQL database
$con = $GLOBALS["con"] = new mysqli($host, $username, $password, $database);

// Check connection
if ($con->connect_error) {
    die("Connection failed: " . $con->connect_error);
}
