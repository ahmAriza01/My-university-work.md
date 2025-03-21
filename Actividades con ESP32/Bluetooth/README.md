# ESP32 con Bluetooth
Este repositorio contiene tres proyectos desarrollados con el microcontrolador ESP32, con un enfoque en el uso del Bluetooth para facilitar la comunicación y control de dispositivos. Los proyectos demuestran cómo utilizar la funcionalidad Bluetooth del ESP32 en diferentes aplicaciones.

--------

## Proyectos
### 1. B1 - Bridge entre Bluetooth y Serial (SPP)
Este proyecto utiliza el perfil Serial Port Protocol (SPP) de Bluetooth para crear un puente entre el puerto serie (USB) y la comunicación Bluetooth. El dispositivo ESP32 actúa como un puerto serial accesible a través de Bluetooth.

#### Descripción
- **Objetivo:** Crear un puente entre el puerto serie de la computadora y el Bluetooth clásico de ESP32. La comunicación es bidireccional, permitiendo el envío de datos desde el puerto serie a través de Bluetooth y viceversa.

- **Funcionalidad:** Permite enviar y recibir datos desde un dispositivo Bluetooth emparejado, facilitando la interacción con cualquier dispositivo compatible con Bluetooth SPP.

>[!Codigo para su consulta]
   >
   >- **[Codigo B1](BT1.ino)**.
---------------------------------------------------------
### 2. B2 - Control de LED mediante Bluetooth
Este proyecto utiliza Bluetooth Serial para controlar un LED conectado al pin GPIO 2 del ESP32. El dispositivo puede recibir comandos desde una aplicación Bluetooth y encender o apagar el LED en función del valor recibido.

#### Descripción
- **Objetivo:** Controlar un LED (encender/apagar) usando comandos recibidos desde un dispositivo Bluetooth emparejado.

- **Funcionalidad:** El dispositivo Bluetooth envía un '1' para encender el LED y un '0' para apagarlo. Los comandos son recibidos a través de la conexión Bluetooth serial.

>[!Codigo para su consulta]
   >
   >- **[Codigo B2](BT2.ino)**.
--------------------------------------------------


