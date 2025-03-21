# ESP32 con WIFI
-------
## Servidor Web con ESP32 y Botones de Control

### Descripción:
Este código crea un servidor web utilizando el ESP32 que permite acceder a una página web desde un navegador. En la página web, se mostrarán cuatro botones. Cuando se haga clic en un botón, el servidor recibirá una solicitud y podrá realizar una acción dependiendo del botón presionado. En este código, solo uno de los botones está activo, pero puede modificarse para agregar más funcionalidades.

#### Objetivo:
Este código tiene como objetivo crear un servidor web básico utilizando el ESP32, conectando el dispositivo a una red Wi-Fi, y sirviendo una página web que presenta botones para interacción. Esta es una base para el desarrollo de proyectos más complejos donde se necesiten controles o monitoreo remoto mediante una interfaz web.

---------

#### Explicación del Código:

##### Definición de Variables de Red:
- ssid: El nombre de la red Wi-Fi a la que el ESP32 se conectará.
- password: La contraseña de la red Wi-Fi.
- WiFiServer server(80): Crea un servidor en el puerto 80, el puerto estándar para tráfico web HTTP.

#### Función setup():

- WiFi.begin(ssid, password): Inicia la conexión del ESP32 a la red Wi-Fi utilizando el nombre de la red (SSID) y la contraseña proporcionados.
- server.begin(): Inicia el servidor web en el ESP32, permitiendo que reciba conexiones HTTP.
- WiFi.localIP(): Obtiene la dirección IP local del ESP32 en la red Wi-Fi, la cual será utilizada para acceder al servidor desde un navegador web.

#### Función loop():

- WiFiClient client = server.available(): Verifica si hay un cliente (navegador web) conectado al servidor.
- client.readStringUntil('\r'): Lee la solicitud enviada por el cliente (navegador web). La solicitud se almacena en la variable req.
- client.println("HTTP/1.1 200 OK"): Responde al cliente con un encabezado HTTP estándar que indica que la solicitud fue exitosa.
- Generación de la Página Web: El código HTML genera una página web con un título, un mensaje y un botón que, al hacer clic, enviará la letra "a" al servidor.
- client.stop(): Cierra la conexión con el cliente después de enviar la respuesta.

>**Codigo para su consulta**
   >
   >- **[Codigo Ejemplo_Wifi1](Ejemplo_Wifi1.ino)**
-------------