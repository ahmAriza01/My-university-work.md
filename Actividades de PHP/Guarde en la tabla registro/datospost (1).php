<?php
$servername = "";
$username = "";
$password = "";
$dbname = "";

// Crear conexión
$conn = new mysqli($servername, $username, $password, $dbname);

// Verificar conexión
if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

// Verificar si la solicitud es POST
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Obtener los datos JSON recibidos
    $datos = json_decode(file_get_contents('php://input'));

    if (isset($datos->sensor) && isset($datos->valor)) {
        $sensor = $conn->real_escape_string($datos->sensor);
        $valor = $conn->real_escape_string($datos->valor);

        // Insertar datos en la base de datos
        $sql = "INSERT INTO registro (sensor, valor) VALUES ('$sensor', '$valor')";

        if ($conn->query($sql) === TRUE) {
            echo "Nuevo registro creado exitosamente";
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
    } else {
        echo "Error: Datos incompletos";
    }
}

$conn->close();
?>