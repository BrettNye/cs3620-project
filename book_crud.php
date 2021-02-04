<?php
session_start();

$servername = "nyecs3620database.mysql.database.azure.com";
//$username =  (isset($_SESSION["SQLUSER"]) ? $_SESSION["SQLUSER"] : $_ENV['SQLUSER']);
//$password = (isset($_SESSION["SQLPW"]) ? $_SESSION["SQLPW"] : $_ENV['SQLPW']);
$username = "nyeAdmin@nyecs3620database";
$password = "Combustioniskey9";
$dbname = "cs3620_proj";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

$sql = "INSERT INTO books(book_id, Title, Author)
VALUES ( 1, 'My side of the Mountain', 'Jean Craighead George')";

if ($conn->query($sql) === TRUE) {
  echo "New record created successfully";
} else {
  echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT book_id, Title, Author FROM books WHERE book_id = 1";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
  // output data of each row
  while($row = $result->fetch_assoc()) {
    echo "<br>id: " . $row["book_id"]. " Title: " . $row["Title"]. " Author " . $row["Author"]. "<br>";
  }
} else {
  echo "0 results";
}
$conn->close();

//echo $result;

$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

// sql to delete a record
$sql = "DELETE FROM books WHERE book_id=1";

if ($conn->query($sql) === TRUE) {
  echo "Record deleted successfully";
} else {
  echo "Error deleting record: " . $conn->error;
}

$conn->close();
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

// sql to delete a record
$sql = "DELETE FROM books";

if ($conn->query($sql) === TRUE) {
  echo "<br>Record deleted successfully";
} else {
  echo "<br>Error deleting record: " . $conn->error;
}

$conn->close();
?>