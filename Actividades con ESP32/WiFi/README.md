# ESP32 con WIFI
-------
## Servidor Web con ESP32 y Botones de Control

### Descripción:
Este código crea un servidor web utilizando el ESP32 que permite acceder a una página web desde un navegador. En la página web, se mostrarán cuatro botones. Cuando se haga clic en un botón, el servidor recibirá una solicitud y podrá realizar una acción dependiendo del botón presionado. En este código, solo uno de los botones está activo, pero puede modificarse para agregar más funcionalidades.

---------

#### Explicación del Código:

##### Definición de Variables de Red:
- `ssid`: El nombre de la red Wi-Fi a la que el ESP32 se conectará.
- `password`: La contraseña de la red Wi-Fi.
- `WiFiServer server(80)`: Crea un servidor en el puerto 80, el puerto estándar para tráfico web HTTP.

#### Función setup():

- `WiFi.begin(ssid, password)`: Inicia la conexión del ESP32 a la red Wi-Fi utilizando el nombre de la red (SSID) y la contraseña proporcionados.
- `server.begin()`: Inicia el servidor web en el ESP32, permitiendo que reciba conexiones HTTP.
- `WiFi.localIP()`: Obtiene la dirección IP local del ESP32 en la red Wi-Fi, la cual será utilizada para acceder al servidor desde un navegador web.

#### Función loop():

- `WiFiClient client = server.available()`: Verifica si hay un cliente (navegador web) conectado al servidor.
- `client.readStringUntil('\r')`: Lee la solicitud enviada por el cliente (navegador web). La solicitud se almacena en la variable req.
- `client.println("HTTP/1.1 200 OK")`: Responde al cliente con un encabezado HTTP estándar que indica que la solicitud fue exitosa.
- Generación de la Página Web: El código HTML genera una página web con un título, un mensaje y un botón que, al hacer clic, enviará la letra "a" al servidor.
- `client.stop()`: Cierra la conexión con el cliente después de enviar la respuesta.

>**Codigo para su consulta**
   >
   >- **[Codigo Ejemplo_Wifi1](Ejemplo_Wifi1.ino)**
-------------

## Control de LED con ESP32 y Servidor Web

### Descripción:

Este código crea un servidor web en el ESP32 que permite controlar un LED conectado al pin GPIO2. A través de una interfaz web, se pueden presionar botones para encender o apagar el LED. Cuando un usuario hace clic en un botón de la página web, el servidor procesa la solicitud y actualiza el estado del LED. El estado del LED (encendido o apagado) también se muestra en la página web.

### Explicación del Código:
#### Definición de Variables de Red y Hardware:

- `ssid`: El nombre de la red Wi-Fi a la que el ESP32 se conectará.

- `password`: La contraseña de la red Wi-Fi.

- `WiFiServer server(80)`: Crea un servidor que escuchará en el puerto 80 (HTTP) para solicitudes de los clientes.

- `LED2`: Definición del pin GPIO2 donde está conectado el LED.


#### Función setup():

- `WiFi.begin(ssid, password)`: Inicia la conexión del ESP32 a la red Wi-Fi utilizando las credenciales proporcionadas.

- `pinMode(LED2, OUTPUT)`: Configura el pin GPIO2 como salida para controlar el LED.

- `server.begin()`: Inicia el servidor web en el ESP32 para escuchar solicitudes HTTP entrantes.

- `WiFi.localIP()`: Muestra la dirección IP del ESP32 en la red local, la cual será utilizada para acceder al servidor desde un navegador.

#### Función loop():

- `WiFiClient client = server.available()`: Verifica si hay un cliente conectado al servidor web.

- `client.readStringUntil('\r')`: Lee la solicitud del cliente (por ejemplo, "on2" o "off2").

- `digitalWrite(LED2, HIGH)`: Enciende el LED conectado al pin GPIO2.

- `digitalWrite(LED2, LOW)`: Apaga el LED.

- Generación de la Página Web: Se crea una página HTML que muestra dos botones: uno para encender el LED y otro para apagarlo. El estado del LED (Encendido o Apagado) también se muestra en la página.

- `client.stop()`: Cierra la conexión con el cliente después de enviar la respuesta.

>**Codigo para su consulta**
   >
   >- **[Codigo Ejemplo_Wifi2](Ejemplo_Wifi2.ino)**

-----

## Control de LED con ESP32 y Servidor Web con Imágenes

### Descripción:
Este código crea un servidor web en un ESP32 que permite controlar un LED (conectado al pin GPIO2) de forma remota. El servidor web responde a solicitudes para encender, apagar o consultar el estado del LED. Además, la interfaz web incluye botones para controlar el LED y mostrar imágenes que representan el estado actual del LED (encendido o apagado).

### Explicación del Código:
#### Definición de Variables de Red y Hardware:

- `ssid`: El nombre de la red Wi-Fi a la que el ESP32 se conectará.

- `password`: La contraseña de la red Wi-Fi.

- `WiFiServer server(80)`: Crea un servidor que escuchará en el puerto 80 (HTTP) para solicitudes de los clientes.


### Función setup():

- `WiFi.begin(ssid, password)`: Inicia la conexión del ESP32 a la red Wi-Fi utilizando las credenciales proporcionadas.

- `pinMode(LED2, OUTPUT)`: Configura el pin GPIO2 como salida para controlar el LED.

- `server.begin()`: Inicia el servidor web en el ESP32 para escuchar solicitudes HTTP entrantes.

- `WiFi.localIP()`: Muestra la dirección IP del ESP32 en la red local, la cual será utilizada para acceder al servidor desde un navegador.

### Función loop():
- `WiFiClient client = server.available()`: Verifica si hay un cliente conectado al servidor web.

- `client.readStringUntil('\r')`: Lee la solicitud del cliente (por ejemplo, "on2", "off2", o "consulta").

- `digitalWrite(LED2, HIGH)`: Enciende el LED conectado al pin GPIO2.

- `digitalWrite(LED2, LOW)`: Apaga el LED.


- `client.stop()`: Cierra la conexión con el cliente después de enviar la respuesta.

>**Codigo para su consulta**
   >
   >- **[Codigo Ejemplo_Wifi3](Ejemplo_Wifi3.ino)**
----- 
## Conexión WiFi en ESP32: Obtención de Datos de Red

### Descripción:

Este código establece una conexión Wi-Fi en el ESP32, se conecta a una red especificada, y luego imprime los detalles de la conexión, como la dirección IP, la dirección MAC, la máscara de subred, la puerta de enlace y la dirección DNS. Esta información es útil para diagnosticar la conexión a la red y configurar dispositivos en la red local.

### Explicación del Código:

### Función WiFi_Setup():

- `WiFi.begin(ssid, password)`: Inicia la conexión Wi-Fi utilizando el SSID y la contraseña definidos.

- `while (WiFi.status() != WL_CONNECTED)`: La función entra en un bucle esperando hasta que el ESP32 se conecte exitosamente a la red Wi-Fi.

- `Serial.print(".")`: Mientras espera la conexión, imprime un punto en el Monitor Serial para indicar que está intentando conectarse.

- `Serial.println("WiFi connected!")`: Una vez conectados, muestra un mensaje de éxito.
### Función DatosWIFI():
- `WiFi.localIP()`: Devuelve la dirección IP local asignada al ESP32 por el router.

- `WiFi.macAddress()`: Devuelve la dirección MAC (Media Access Control) del ESP32.

- `WiFi.subnetMask()`: Obtiene la máscara de subred asociada con la red Wi-Fi.

- `WiFi.gatewayIP()`: Muestra la dirección IP de la puerta de enlace (gateway).

- `WiFi.dnsIP()`: Muestra la dirección del servidor DNS utilizado en la red.

### Función setup():

- `Serial.begin(115200)`: Inicia la comunicación serial con el Monitor Serial a una velocidad de 115200 baudios.

- `WiFi_Setup()`: Llama a la función para conectar el ESP32 a la red Wi-Fi.

- `DatosWIFI()`: Llama a la función para imprimir la información de la conexión Wi-Fi.

### Función loop():

- `loop()`: La función `loop()` está vacía en este caso, ya que el código solo realiza una vez la conexión y la obtención de los datos de la red en el `setup()`.

>**Codigo para su consulta**
   >
   >- **[Codigo Wifi_2](Wifi_2.ino)**
