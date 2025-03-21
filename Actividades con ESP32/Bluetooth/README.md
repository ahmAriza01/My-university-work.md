# Documentación de Códigos Bluetooth en ESP32

#### Descripción del Programa B1: Bridge entre Serial y Bluetooth

Este programa establece una comunicación bidireccional entre el puerto serie de la computadora y un dispositivo Bluetooth emparejado con el ESP32.

---

#### Funcionamiento del código

1. Inclusión de la biblioteca BluetoothSerial

El código comienza incluyendo la biblioteca BluetoothSerial.h, la cual es necesaria para manejar la comunicación Bluetooth clásica (SPP, Serial Port Profile):

    #include "BluetoothSerial.h"

Además, se verifica si el Bluetooth está habilitado en la configuración de ESP-IDF:

    #if !defined(CONFIG_BT_ENABLED) || !defined(CONFIG_BLUEDROID_ENABLED)
    #error Bluetooth is not enabled! Please run make menuconfig to and enable it
    #endif

    Si el Bluetooth no está activado en la configuración de ESP-IDF, se generará un error de compilación.

2. Creación del objeto BluetoothSerial

Se declara un objeto SerialBT de la clase BluetoothSerial, que será el encargado de manejar la comunicación:

    BluetoothSerial SerialBT;

3. Configuración inicial (setup)

La función setup() se encarga de inicializar la comunicación Serial y Bluetooth:

    void setup() {
    Serial.begin(115200);
    SerialBT.begin("ESP32test"); // Nombre del dispositivo Bluetooth
    Serial.println("The device started, now you can pair it with bluetooth!");
    }

- Serial.begin(115200); inicializa la comunicación serial con la computadora a una velocidad de 115200 baudios.

- SerialBT.begin("ESP32test"); inicia el Bluetooth del ESP32 y le asigna el nombre ESP32test para que pueda ser detectado y emparejado por otros dispositivos.

- Serial.println("The device started, now you can pair it with bluetooth!"); imprime un mensaje en la terminal indicando que el Bluetooth está listo.

4. Bucle principal (loop)

En el loop(), el código verifica si hay datos disponibles en el puerto Serial o en la conexión Bluetooth y los retransmite en la dirección opuesta:

    void loop() {
    if (Serial.available()) {
        SerialBT.write(Serial.read());
    }
    if (SerialBT.available()) {
        Serial.write(SerialBT.read());
    }
    delay(20);
    }

- if (Serial.available()) verifica si hay datos disponibles en el puerto Serial (por ejemplo, ingresados desde la terminal de Arduino IDE o cualquier otro monitor serie).

- SerialBT.write(Serial.read()); lee el dato recibido y lo envía vía Bluetooth al dispositivo emparejado.

- if (SerialBT.available()) verifica si hay datos disponibles en la conexión Bluetooth.

- Serial.write(SerialBT.read()); lee el dato recibido vía Bluetooth y lo imprime en la terminal Serial.

- delay(20); introduce una pequeña pausa para evitar la sobrecarga del procesador.

#### Flujo de datos

Este código funciona como un puente entre la comunicación serie y la comunicación Bluetooth. La interacción con el ESP32 se puede describir así:

Un usuario escribe un mensaje en la terminal Serial de Arduino IDE.

El ESP32 recibe el mensaje y lo envía por Bluetooth al dispositivo emparejado.

Si el dispositivo Bluetooth responde, el ESP32 recibe el mensaje y lo reenvía a la terminal Serial.

#### Posibles aplicaciones

Este código es útil en múltiples escenarios, como:

Depuración de dispositivos Bluetooth desde una computadora sin Bluetooth.

Comunicación con un microcontrolador a través de Bluetooth en aplicaciones de IoT.

Creación de una consola remota para enviar y recibir comandos desde un smartphone o PC.

