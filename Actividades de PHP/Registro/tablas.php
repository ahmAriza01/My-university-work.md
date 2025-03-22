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

$sql = "SELECT id, sensor, fecha_hora, valor FROM registro";
$result = $conn->query($sql);

echo "<table border='1'>
        <tr>
          <th>ID</th>
          <th>Sensor</th>
          <th>Fecha y Hora</th>
          <th>Valor</th>
        </tr>";

if ($result->num_rows > 0) {
  // output data of each row
  while($row = $result->fetch_assoc()) {
    echo "<tr>
            <td>" . $row["id"]. "</td>
            <td>" . $row["sensor"]. "</td>
            <td>" . $row["fecha_hora"]. "</td>
            <td>" . $row["valor"]. "</td>
          </tr>";
  }
  echo "</table>";
} else {
  echo "0 results";
}
$conn->close();
?>
