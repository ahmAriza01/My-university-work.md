# Documentación de Códigos Bluetooth en ESP32

Este documento describe y explica el funcionamiento de cuatro programas diferentes que utilizan Bluetooth en una ESP32. Los programas permiten la comunicación vía Bluetooth Clásico para diversas funcionalidades, como la transmisión de datos entre la ESP32 y un dispositivo móvil o PC, el control de LEDs y la configuración del modo de descubrimiento Bluetooth.

B1: Puente Serial-Bluetooth

    Descripción

El código B1 crea un puente entre la comunicación Serial y Bluetooth Serial (SPP, Serial Port Profile). Esto significa que cualquier dato enviado desde el puerto serie de la ESP32 se transmite por Bluetooth y viceversa.

Funcionamiento

Inicialización del Bluetooth: Se usa la biblioteca BluetoothSerial.h para habilitar el Bluetooth con el nombre de dispositivo ESP32test.

Reenvío de datos: La ESP32 actúa como un intermediario entre el puerto serie y Bluetooth:

Si hay datos disponibles en Serial, los envía por SerialBT.

Si hay datos recibidos por SerialBT, los reenvía al puerto serie.

Aplicaciones: Se puede utilizar para monitorear datos en tiempo real desde una PC o para enviar comandos desde un móvil.

if (Serial.available()) {
  SerialBT.write(Serial.read());
}
if (SerialBT.available()) {
  Serial.write(SerialBT.read());
}