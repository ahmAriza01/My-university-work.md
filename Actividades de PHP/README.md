#  Actividades de PHP
----
##  Proyecto Tabla Registro

Este proyecto consiste en la creación de una tabla en una base de datos MySQL donde se insertan datos de sensores y se muestran en una página web. Se utiliza **PHP** y **MySQL** para gestionar la base de datos y la visualización de los datos.

---

###  Tecnologías Utilizadas

- **PHP** (para la conexión y manipulación de la base de datos)
- **MySQL** (para el almacenamiento de los datos)
- **HTML** (para la visualización de la tabla)
- **Servidor Web** (Apache o cualquier compatible con PHP y MySQL)

---


##  Configuración de la Base de Datos

Antes de ejecutar el proyecto, debes asegurarte de que la base de datos está configurada correctamente.

###  Crear la Base de Datos y la Tabla

Ejecuta el siguiente comando SQL en **phpMyAdmin** o en la consola de MySQL para crear la base de datos y la tabla:

    ```sql
    CREATE DATABASE base de datos;

    USE base de datos;

    CREATE TABLE registro (
        id INT AUTO_INCREMENT PRIMARY KEY,
        sensor VARCHAR(50) NOT NULL,
        fecha_hora TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
        valor FLOAT NOT NULL
    );


### Archivos del Proyecto
####  `db_config.php` - Configuración de la Conexión a la Base de Datos
Este archivo almacena la configuración de la conexión a MySQL.



    <?php
    $servername = "bjpgg.site";
    $username = "admin_shagy";
    $password = "Shagy123";
    $dbname = "admin_romerillo";

    // Crear conexión
    $conn = new mysqli($servername, $username, $password, $dbname);

    // Verificar conexión
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    ?>

####  `insert.php` - Insertar Datos en la Tabla
Este script permite insertar datos en la tabla registro desde PHP.

    <?php
    include 'db_config.php';

    $sql = "INSERT INTO registro (sensor, valor) VALUES ('temperatura', 22)";

    if ($conn->query($sql) === TRUE) {
        echo "Nuevo registro creado exitosamente";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();
    ?>

####  `index.php` - Mostrar Datos en una Tabla
Este script obtiene y muestra los datos almacenados en la base de datos.

    <?php
    include 'db_config.php';

    $sql = "SELECT id, sensor, fecha_hora, valor FROM registro";
    $result = $conn->query($sql);

    echo "<h2>Registro de Sensores</h2>";
    echo "<table border='1'>
            <tr>
            <th>ID</th>
            <th>Sensor</th>
            <th>Fecha y Hora</th>
            <th>Valor</th>
            </tr>";

    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            echo "<tr>
                    <td>" . $row["id"] . "</td>
                    <td>" . $row["sensor"] . "</td>
                    <td>" . $row["fecha_hora"] . "</td>
                    <td>" . $row["valor"] . "</td>
                </tr>";
        }
        echo "</table>";
    } else {
        echo "No hay registros.";
    }

    $conn->close();
    ?>

----

#  Proyecto Registro de Sensores

Este proyecto consiste en una API creada con PHP que recibe datos en formato **JSON** y los almacena en una base de datos MySQL. Es ideal para integrar con sistemas IoT o cualquier aplicación que requiera el almacenamiento de datos de sensores en tiempo real.

##  Configuración de la Base de Datos

Antes de ejecutar el proyecto, asegúrate de configurar correctamente la base de datos.

###  Crear la Base de Datos y la Tabla

Ejecuta el siguiente comando SQL en **phpMyAdmin** o en la consola de MySQL:

    
    CREATE DATABASE admin_romerillo;

    USE admin_romerillo;

    CREATE TABLE registro (
        id INT AUTO_INCREMENT PRIMARY KEY,
        sensor VARCHAR(50) NOT NULL,
        fecha_hora TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
        valor FLOAT NOT NULL
    );
    
--- 
##  Archivos del Proyecto

###  `db_config.php` - Configuración de la Conexión a la Base de Datos

Este archivo se usa para conectar PHP con MySQL.

        <?php
        $servername = "pagina web";
        $username = "nombre de acceso";
        $password = "contraseña";
        $dbname = "nombre de la base de datos";

        // Crear conexión
        $conn = new mysqli($servername, $username, $password, $dbname);

        // Verificar conexión
        if ($conn->connect_error) {
            die("Conexión fallida: " . $conn->connect_error);
        }
        ?>

###  `recibir_datos.php` - Recibir Datos y Guardarlos
Este archivo recibe datos en formato JSON a través de una solicitud POST, los procesa y los guarda en la base de datos.

    <?php
    include 'db_config.php';

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
                echo json_encode(["mensaje" => "Nuevo registro creado exitosamente"]);
            } else {
                echo json_encode(["error" => "Error al insertar: " . $conn->error]);
            }
        } else {
            echo json_encode(["error" => "Datos incompletos"]);
        }
    }

    // Cerrar conexión
    $conn->close();
    ?>


-----
#  Proyecto Dientes (Bluetooth)

Este proyecto implementa un sistema para enviar datos desde un ESP32 a un servidor PHP utilizando Bluetooth Serial. Una vez recibidos los datos por Bluetooth, estos se envían a una base de datos MySQL a través de una API en PHP mediante una conexión WiFi.

###  Tecnologías Utilizadas

- ESP32 (Placa de desarrollo)

- Bluetooth Serial (Para recibir datos de un dispositivo móvil u otro ESP32)

- WiFi (Para enviar datos a un servidor web)

- PHP (Para recibir y almacenar datos en una base de datos MySQL)

- MySQL (Para gestionar la base de datos)

- Arduino IDE (Para programar el ESP32)
---

####   Estructura del Proyecto
- 📄 db_config.php          # Configuración de la base de datos
- 📄 recibir_datos.php      # API que recibe los datos y los almacena en la BD
-  📄 ESP32_Bluetooth.ino    # Código del ESP32 para recibir datos y enviarlos
---

###  Archivos del Proyecto
#####  `db_config.php` - Configuración de la Conexión a la Base de Datos
Este archivo define la conexión entre PHP y MySQL

    <?php
    $servername = "pagina web";
    $username = "nombre de usuario";
    $password = "contraseña";
    $dbname = "nombre de la base de datos";

    $conn = new mysqli($servername, $username, $password, $dbname);

    if ($conn->connect_error) {
        die("Conexión fallida: " . $conn->connect_error);
    }
    ?>


##### `recibir_datos.php` - API para Recibir Datos y Guardarlos
Este archivo recibe los datos en JSON mediante una solicitud POST y los almacena en la base de datos.

    <?php
    include 'db_config.php';

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $datos = json_decode(file_get_contents('php://input'));

        if (isset($datos->sensor) && isset($datos->valor)) {
            $sensor = $conn->real_escape_string($datos->sensor);
            $valor = $conn->real_escape_string($datos->valor);

            $sql = "INSERT INTO registro (sensor, valor) VALUES ('$sensor', '$valor')";

            if ($conn->query($sql) === TRUE) {
                echo json_encode(["mensaje" => "Datos registrados correctamente"]);
            } else {
                echo json_encode(["error" => "Error al insertar: " . $conn->error]);
            }
        } else {
            echo json_encode(["error" => "Datos incompletos"]);
        }
    }

    $conn->close();
    ?>
----

###  Código del ESP32 con Bluetooth
Este código permite recibir datos desde Bluetooth Serial, procesarlos y enviarlos al servidor PHP.

    #include <WiFi.h>
    #include <HTTPClient.h>
    #include "DHT.h"
    #include "BluetoothSerial.h"

    #define DHTPIN 4      
    #define DHTTYPE DHT11 

    const char* ssid = "Nombre de la red";
    const char* password = "Contraseña de la red";
    const char* serverName = "Direccion de la pagina web";

    DHT dht(DHTPIN, DHTTYPE);
    BluetoothSerial SerialBT;

    void setup() {
        Serial.begin(115200);
        SerialBT.begin("ESP32_Bluetooth"); // Inicia Bluetooth con el nombre ESP32_Bluetooth
        WiFi.begin(ssid, password);

        Serial.println("Conectando a WiFi...");
        int intentos = 0;
        while (WiFi.status() != WL_CONNECTED && intentos < 20) {
            delay(500);
            Serial.print(".");
            intentos++;
        }

        if (WiFi.status() == WL_CONNECTED) {
            Serial.println("\nConectado a WiFi");
            Serial.print("Dirección IP: ");
            Serial.println(WiFi.localIP());
        } else {
            Serial.println("\nNo se pudo conectar a WiFi. Revisa SSID/contraseña.");
        }
        
        dht.begin();
    }

    void loop() {
        float temperatura = dht.readTemperature(); 

        if (isnan(temperatura)) {
            Serial.println("Error al leer el sensor DHT11");
        } else {
            Serial.print("Sensor: DHT11, Valor: ");
            Serial.print(temperatura);
            Serial.println("°C");

            SerialBT.print("Sensor: DHT11, Valor: ");
            SerialBT.println(temperatura); // Enviar datos por Bluetooth

            if (WiFi.status() == WL_CONNECTED) {
                HTTPClient http;
                http.begin(serverName);
                http.addHeader("Content-Type", "application/json");

                String jsonPayload = "{\"sensor\":\"DHT11\",\"valor\":\"" + String(temperatura) + "\"}";
                int httpResponseCode = http.POST(jsonPayload);

                if (httpResponseCode > 0) {
                    Serial.print("Respuesta del servidor: ");
                    Serial.println(http.getString());
                } else {
                    Serial.print("Error en la solicitud HTTP: ");
                    Serial.println(httpResponseCode);
                }
                http.end();
            } else {
                Serial.println("WiFi desconectado, no se pudo enviar datos.");
            }
        }

        delay(180000); // Esperar 3 minutos antes de la siguiente lectura
    }

---


##  Cómo Ejecutar los Proyecto

####  Subir los Archivos a un Servidor
- Puedes usar XAMPP, MAMP o un servidor web que soporte PHP y MySQL en este caso con el que adquirimos y de este mismo ejecutamos las pticiones con los datos directamente.

####  Acceder desde el Navegador

- Para ver la tabla con los datos registrados, accede a:

https://ahmariza.store/c3.php

---

###  Recursos Adicionales
- 🔗 Guía Oficial de PHP y MySQL
- 🔗 XAMPP - Servidor Local
- 🔗 GitHub Pages

---
### Codigos usados.

- [Proyecto Tabla Registro](./Guarde%20en%20la%20tabla%20registro/datospost%20(1).php)

- [Proyecto Registro de Sensores (Insertar)](./Registro/insertar.php)

- [Proyecto Registro de Sensores (Tablas)](./Registro/tablas.php)

- [Proyecto Diente (PHP) ](./Proyecto%20Dientes/dientesdatos%20(1).php)

- [Proyecto Diente (INO)](./Proyecto%20Dientes/mandadodedatos.ino)



-----

##  Autor

**[Abraham Isai Lara Ariza](https://github.com/ahmAriza01)**  
📧 *323030060@upjr.edu.mx*  
📅 *Última actualización: 30 de marzo de 2025*


