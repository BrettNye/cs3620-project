<?php
$servername = "nyecs3620database.mysql.database.azure.com";
$username = "nyeAdmin@nyecs3620database";
$password = "Combustioniskey9";
$dbname = "cs3620_proj";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

$sql = "INSERT INTO testTable(testId)
VALUES ('Thisisatest')";

if ($conn->query($sql) === TRUE) {
  echo "New record created successfully";
} else {
  echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>