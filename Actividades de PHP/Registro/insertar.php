<?php
$servername = "";
$username = "";
$password = "";
$dbname = "";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

$sql = "INSERT INTO registro (sensor, valor)
VALUES ('temperatura', 22)";

if ($conn->query($sql) === TRUE) {
  echo "Nuevo registro creado exitosamente";
} else {
  echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>
