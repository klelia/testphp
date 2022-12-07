<?php 
session_start();

define("DB_SERVERNAME", "localhost");
define("DB_USERNAME","root");
define("DB_PASSWORD", "admincle");
define("DB_NAME", "db_university");

// Connect
$conn = new mysqli(DB_SERVERNAME, DB_USERNAME, DB_PASSWORD, DB_NAME);

if ($conn && $conn->connect_error) {
    echo "Connection failed: " . $conn->connect_error;
}


