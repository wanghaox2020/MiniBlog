<?php 

$host = "localhost";
$dbUsername = "root";
$dbPassword = "Whx19961007.";
$dbName = "Project";

$conn = new mysqli($host, $dbUsername, $dbPassword, $dbName);

if ($conn->connect_error) {
  header("Location: Could not connect to the database");
  exit();
}

?>