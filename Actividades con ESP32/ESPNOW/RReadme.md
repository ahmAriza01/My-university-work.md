# ESP-NOW (Esclavo o Maestro)
------------

## Control de led mediante ESP-NOW (Esclavo)
El funcionamiento del código de un ESP32 configurado como dispositivo esclavo utilizando el protocolo de comunicación ESP-NOW. Este ESP32 recibe datos desde un ESP32 maestro y, en función de los valores recibidos, controla el estado de un LED.


### Explicación del Funcionamiento

Fase de configuración:

- Se inicializa ESP-NOW y el puerto serie.

- Se configura el dispositivo como esclavo y se registra la función de recepción de datos.

- Se define el pin del LED como salida.

Fase de ejecución:

- El ESP32 permanece en espera hasta recibir datos.

- Cuando llega un mensaje, se extrae la información del potenciometro.

- Si el valor es mayor a 512, el LED se enciende; de lo contrario, se apaga.

### Descripción del Código

1. Inclusión de librerías: Se incluyen las librerías WiFi.h y esp_now.h para manejar la comunicación ESP-NOW.

2. Definición de la estructura de datos: Se define una estructura ESTRUCTURA_DATOS que contiene dos variables:

- potenciometro: Valor analógico recibido del maestro (0 - 1023).

- tiempo: Marca de tiempo en milisegundos.

### Inicialización del ESP-NOW:

- Se inicializa la comunicación ESP-NOW.

- Se establece el ESP32 en modo esclavo (ESP_NOW_ROLE_SLAVE).

- Se registra una función de callback (recibirDatos) que se ejecuta al recibir datos.

>**Codigo para su consulta**
   >
   >- **[Codigo Esclavo_EspNow](Esclavo_EspNow.ino)**
   ---------------

## Recepción de Datos con ESP-NOW (Esclavo)


Este documento describe el funcionamiento del código de un ESP32 configurado como dispositivo esclavo utilizando el protocolo de comunicación ESP-NOW. Este ESP32 recibe datos desde un ESP32 maestro y los procesa para su visualización en el monitor serie.

### Descripción del Código

1. Inclusión de librerías: Se incluyen las librerías WiFi.h y esp_now.h para manejar la comunicación ESP-NOW.

2. Definición de la estructura de datos: Se define una estructura struct_message que contiene cinco variables:

- a: Cadena de caracteres de 32 bytes.

- b: Entero.

- c: Flotante.

- d: Cadena de texto String.

- e: Booleano.

3. Inicialización del ESP-NOW:

- Se inicializa la comunicación ESP-NOW.

- Se configura el ESP32 en modo WIFI_STA.

- Se registra una función de callback (OnDataRecv) que se ejecuta al recibir datos.

4. Recepción y procesamiento de datos:

- Se recibe la dirección MAC del maestro y los datos enviados.

- Se imprime en el monitor serie la información recibida.

- Se realizan operaciones sobre los datos:

- Se incrementa en 1 el valor del entero b.

- Se suma 0.22 al valor flotante c.

>**Codigo para su consulta**
   >
   >- **[Codigo EspNow_Slave_01](EspNow_Slave_01.ino)**
   --------------

   ## Envío de Datos con ESP-NOW (Maestro)

   El funcionamiento del código de un ESP32 configurado como dispositivo maestro utilizando el protocolo de comunicación ESP-NOW. Este ESP32 envía datos estructurados a un ESP32 esclavo.

### Descripción del Código

1. Inclusión de librerías: Se incluyen las librerías WiFi.h y esp_now.h para manejar la comunicación ESP-NOW.

2. Definición de la estructura de datos: Se define una estructura struct_message que contiene cinco variables:

- a: Cadena de caracteres de 32 bytes.

- b: Entero.

- c: Flotante.

- d: Cadena de texto String.

- e: Booleano.

### Inicialización del ESP-NOW:

- Se inicializa la comunicación ESP-NOW.

- Se configura el ESP32 en modo WIFI_STA.

- Se registra una función de callback (OnDataSent) que se ejecuta tras enviar datos.

- Se agrega el receptor como un peer para la comunicación.

## Envío de datos:
- Se asignan valores a la estructura myData.

- Se envía la estructura utilizando esp_now_send().

- Se imprime en el monitor serie el estado del envío.

>**Codigo para su consulta**
   >
   >- **[Codigo Maestro_EspNow](Maestro_EspNow.ino)**
   --------------

   ### Herramientas visulaes

   ESP-NOW with ESP32 EXPLAINED: Easiest Wireless Communication Between Boards (ESP8266 Compatible)
https://www.youtube.com/watch?v=qxwXwNS3Avw

Protocolo de comunicación ESP-NOW (tarjeta ESP32).
https://www.youtube.com/watch?v=sX9pH0OYbKg

Getting Started with ESP-NOW (ESP8266 NodeMCU with Arduino IDE)
https://randomnerdtutorials.com/esp-now-esp8266-nodemcu-arduino-ide/

ESP-NOW Two-Way Communication Between ESP32 Boards
https://randomnerdtutorials.com/esp-now-two-way-communication-esp32/

Que es ESP-NOW?
https://www.electrosoftcloud.com/esp-now-conecta-dos-o-mas-esp32-esp8266/
