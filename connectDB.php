<?php 

$host = "localhost";
$dbUsername = "root";
$dbPassword = "wtx20150914";
$dbName = "Project";

$conn = new mysqli($host, $dbUsername, $dbPassword, $dbName);

if ($conn->connect_error) {
  header("Location: Could not connect to the database");
  exit();
}

?>