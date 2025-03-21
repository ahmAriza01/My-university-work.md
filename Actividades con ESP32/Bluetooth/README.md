# ESP32 con Bluetooth
Este repositorio contiene tres proyectos desarrollados con el microcontrolador ESP32, con un enfoque en el uso del Bluetooth para facilitar la comunicación y control de dispositivos. Los proyectos demuestran cómo utilizar la funcionalidad Bluetooth del ESP32 en diferentes aplicaciones.

--------

## Proyectos
### 1. B1 - Bridge entre Bluetooth y Serial (SPP)
Este proyecto utiliza el perfil Serial Port Protocol (SPP) de Bluetooth para crear un puente entre el puerto serie (USB) y la comunicación Bluetooth. El dispositivo ESP32 actúa como un puerto serial accesible a través de Bluetooth.

#### Descripción
- **Objetivo:** Crear un puente entre el puerto serie de la computadora y el Bluetooth clásico de ESP32. La comunicación es bidireccional, permitiendo el envío de datos desde el puerto serie a través de Bluetooth y viceversa.

- **Funcionalidad:** Permite enviar y recibir datos desde un dispositivo Bluetooth emparejado, facilitando la interacción con cualquier dispositivo compatible con Bluetooth SPP.

>**Codigo para su consulta**
   >
   >- **[Codigo B1](BT1.ino)**
---------------------------------------------------------
### 2. B2 - Control de LED mediante Bluetooth
Este proyecto utiliza Bluetooth Serial para controlar un LED conectado al pin GPIO 2 del ESP32. El dispositivo puede recibir comandos desde una aplicación Bluetooth y encender o apagar el LED en función del valor recibido.

#### Descripción
- **Objetivo:** Controlar un LED (encender/apagar) usando comandos recibidos desde un dispositivo Bluetooth emparejado.

- **Funcionalidad:** El dispositivo Bluetooth envía un '1' para encender el LED y un '0' para apagarlo. Los comandos son recibidos a través de la conexión Bluetooth serial.

>**Codigo para su consulta**
   >
   >- **[Codigo B2](BT2.ino)**
--------------------------------------------------

### 3. B3 - Inicialización y Configuración Básica de Bluetooth
Este proyecto demuestra cómo inicializar el Bluetooth en ESP32 de manera básica, configurando el dispositivo para que sea detectable y accesible para conexiones.

#### Descripción
- **Objetivo:** Iniciar y habilitar la funcionalidad Bluetooth en el ESP32, configurando el dispositivo para que sea detectable y pueda aceptar conexiones Bluetooth.

- **Funcionalidad:** Configura el ESP32 para que se pueda emparejar con dispositivos Bluetooth cercanos y permite cambiar el nombre del dispositivo.

>**Codigo para su consulta**
   >
   >- **[Codigo B3](BT3.ino)**

------------------------------
### 4. B4 - Control de LEDs con Bluetooth
Este proyecto permite controlar dos LEDs conectados a los pines GPIO 2 y GPIO 14 del ESP32 mediante comandos enviados desde un dispositivo Bluetooth. Se encienden y apagan según los caracteres "1", "2", "3" y "4".

#### Descripción

- **Objetivo:** Controlar dos LEDs utilizando Bluetooth Serial. Se envían caracteres específicos para encender y apagar los LEDs.

- **Funcionalidad:** El dispositivo Bluetooth envía caracteres:
"1" enciende el LED en el pin GPIO 2.
"2" apaga el LED en el pin GPIO 2.
"3" enciende el LED en el pin GPIO 14.
"4" apaga el LED en el pin GPIO 14.


------------------------------
## Requisitos Generales
- **Hardware:** ESP32.

- **Software:** Arduino IDE con la plataforma ESP32 instalada.

- **Configuración:** Asegúrese de habilitar el soporte de Bluetooth en make menuconfig dentro de la configuración del ESP32 en el Arduino IDE.

-------------------------

Estos proyectos demuestran las capacidades de la funcionalidad Bluetooth del ESP32 para la comunicación serial y el control de dispositivos. Se pueden extender para aplicaciones más avanzadas, como la automatización del hogar o el monitoreo remoto de dispositivos.

